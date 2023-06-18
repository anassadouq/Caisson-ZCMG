@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        table, th, td {
            border: 1px solid black;  
        }
    </style>
    <a href="{{ route('detail_pointage.create', ['salarierId' => $salarier->id]) }}" >
        <button class="btn btn-primary mx-4" style="width:85px">
            <span class="material-symbols-outlined">add</span>
        </button>
    </a>
    @if (Auth::user()->email == "younes@gmail.com")
        <label>Debut : </label>
            <input type="date" id="debut">
        <label>Fin : </label>
            <input type="date" id="fin">
        <button id="filterButton">Clicker</button>
    @endif

    <div class="mx-3">
        <h1 class="text-center">{{ $salarier->prenom }} {{ $salarier->nom }}</h1>
        @if (Auth::user()->email == "younes@gmail.com")
            <h1 class="text-center">{{ $salarier->salaire }}dh/jrs</h1>
        @endif
        <table class="text-center" id="show">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>presentAbsent</th>
                    <th>heureSupp / heureMoin</th>
                    <th>avance</th>
                    <th>montantAjouter</th>
                    <th>remarque</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $totaleSalaire = 0;
                    $totalSalaireInitial = 0;
                @endphp

                @foreach ($detail_pointages as $detail_pointage)
                    <tr class="dataRow" data-salaire="{{ $salarier->salaire }}" @if(date('D', strtotime($detail_pointage->date)) === 'Sun') style="background-color: #333; color: #fff;" @endif >
                        <td>{{ $detail_pointage->date }}</td>
                        <td>{{ $detail_pointage->presentAbsent }}</td>
                        <td>
                            @if ($detail_pointage->heureSupp || $detail_pointage->heureMoin)
                                @if ($detail_pointage->heureSupp)
                                    +
                                    {{ substr($detail_pointage->heureSupp, 0, 2) }}h{{ substr($detail_pointage->heureSupp, 2, 3) }}
                                @endif
                                @if ($detail_pointage->heureMoin)
                                    -
                                    {{ substr($detail_pointage->heureMoin, 0, 2) }}h{{ substr($detail_pointage->heureMoin, 2, 3) }}
                                @endif
                            @endif
                        </td>
                        <td>{{ $detail_pointage->avance }}</td>
                        <td>{{ $detail_pointage->montantAjouter }}</td>
                        <td>{{ $detail_pointage->remarque }}</td>
                        <td>
                        <form action="{{ route('detail_pointage.destroy', $detail_pointage['id']) }}" method="POST" id="deletedetail_pointageForm{{ $detail_pointage['id'] }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('detail_pointage.edit' ,$detail_pointage['id']) }}" class="btn btn-secondary">
                                <span class="material-symbols-outlined">edit</span>                                
                            Modifier</a>
                            <button type="button" class="btn btn-danger mx-3" onclick="confirmDeletedetail_pointage('{{ $detail_pointage['id'] }}')">
                                <span class="material-symbols-outlined">delete</span>
                            Supprimer</button>
                        </form>
                        </td>
                    </tr>
                    @php
                        if ($detail_pointage->presentAbsent === 'P') {
                            $totaleSalaire += $salarier->salaire;
                        }
                        if ($detail_pointage->heureSupp) {
                            $tableHourSupp = explode(':', $detail_pointage->heureSupp);
                            $overtimeHours = (int)$tableHourSupp[0];
                            $overtimeMinutes = (int)$tableHourSupp[1];
                            $overtimeHours += $overtimeMinutes / 60;
                            $overtimeSalary = ($salarier->salaire / 8) * $overtimeHours;
                            $totaleSalaire += $overtimeSalary;
                        }

                        if ($detail_pointage->heureMoin) {
                            $tableHourMoin = explode(':', $detail_pointage->heureMoin);
                            $deductedHours = (int)$tableHourMoin[0];
                            $deductedMinutes = (int)$tableHourMoin[1];
                            $deductedHours += $deductedMinutes / 60;
                            $deductedSalary = ($salarier->salaire / 8) * $deductedHours;
                            $totaleSalaire -= $deductedSalary;
                        }

                        if ($detail_pointage->avance) {
                            $totaleSalaire -= $detail_pointage->avance;
                        }
                    @endphp
                @endforeach

                @php
                    $totalSalaire = $totalSalaireInitial;
                @endphp
            </tbody>
        </table>
        @if (Auth::user()->email == "younes@gmail.com")
            <table width="15%" class="text-center">
                <tr>
                    <th>Total Solde</th>
                </tr>
                <tr>
                    <td id="cellTotalSalaire"></td>
                </tr>
            </table>
        @endif
    </div>

    <script>
        function confirmDeletedetail_pointage(id) {
            if (confirm("Are you sure you want to delete this detail_pointage?")) {
                document.getElementById("deletedetail_pointageForm" + id).submit();
            }
        }

        document.getElementById("filterButton").addEventListener("click", function() {
            var debut = document.getElementById("debut").value;
            var fin = document.getElementById("fin").value;
            var dateDebut = new Date(debut);
            var dateFin = new Date(fin);
            var rows = document.getElementsByClassName("dataRow");
            var filteredTotalSalaire = 0;

            // Perform filtering and calculate the filtered total salaire
            for (var i = 0; i < rows.length; i++) {
                var date = new Date(rows[i].querySelector("td:nth-child(1)").textContent);
                var salaire = parseInt(rows[i].dataset.salaire);
                var presentAbsent = rows[i].querySelector("td:nth-child(2)").textContent;
                var heureSupp = rows[i].querySelector("td:nth-child(3)").textContent;
                var avance = parseInt(rows[i].querySelector("td:nth-child(4)").textContent);

                if (date >= dateDebut && date <= dateFin) {
                    rows[i].style.display = "";
                    if (presentAbsent === 'P') {
                        filteredTotalSalaire += salaire;
                    }
                    if (heureSupp.includes('+') || heureSupp.includes('-')) {
                        var regex = /([-+]?\d+)h(\d+)/;
                        var matches = heureSupp.match(regex);
                        if (matches && matches.length === 3) {
                            var hourSign = matches[1].startsWith('-') ? -1 : 1;
                            var overtimeHours = parseInt(matches[1]) * hourSign;
                            var overtimeMinutes = parseInt(matches[2]);
                            if (!isNaN(overtimeHours) && !isNaN(overtimeMinutes)) {
                                var overtimeSalary = (salaire / 8) * (overtimeHours + overtimeMinutes / 60);
                                filteredTotalSalaire += overtimeSalary;
                            }
                        }
                    }
                    if (avance) {
                        filteredTotalSalaire -= avance;
                    }
                } else {
                    rows[i].style.display = "none";
                }
            }
            document.getElementById("cellTotalSalaire").textContent = filteredTotalSalaire + "DH";
        });
    </script>
    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#show').DataTable( {
                dom: 'Blfrtip',
                lengthChange: false,
                paging: false,
                buttons: [],
                language: {
                    info: "",
                    infoEmpty: ""
                }
            });
        });
    </script>
@endsection