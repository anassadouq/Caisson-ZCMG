@extends('layouts.app')
@section('content')
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
            <title>Liste Articles</title>
        </head>
        <body>
            <style>
                .black-cell {
                    background-color: #333;
                    color: white;
                }
                table, th, td {
                    border: 1px solid;
                }
            </style>    

            <label>Debut : </label>
            <input type="date" id="debut">
            <label>Fin : </label>
            <input type="date" id="fin">
            <button id="filterButton">Clicker</button> <br><br>

            <table class="text-center mx-2" width="98%">
                <thead>
                    <tr>
                        <th>Salarie</th>
                        @php
                            $dates = [];
                        @endphp
                        @foreach ($pointages as $pointage)
                            @if (!in_array($pointage->date, $dates))
                            <th data-date="{{ date('Y-m-d', strtotime($pointage->date)) }}" id="date">{{ date('d/m/y', strtotime($pointage->date)) }}</th>                                @php
                                    $dates[] = $pointage->date;
                                @endphp
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salariers as $salarier)
                        @if($salarier->active =="Oui")
                            <tr>
                                <td class="nom-salarier">{{ $salarier->prenom }} {{ $salarier->nom }}</td>
                                @php
                                    $dates = [];
                                @endphp
                                @foreach ($pointages as $pointage)
                                    @if ($pointage->id_salarier == $salarier->id && !in_array($pointage->date, $dates))
                                        @php
                                            $cellDate = date('Y-m-d', strtotime($pointage->date));
                                        @endphp
                                        <td data-date="{{ $cellDate }}" @if (date('N', strtotime($pointage->date)) == 7) class="black-cell" @endif>
                                            {{ $pointage->presentAbsent }}
                                            <br>
                                            @if ($pointage->heureSupp > 0)
                                                +
                                            @endif
                                            {{ $pointage->heureSupp }}
                                            @if ($pointage->heureMoin > 0)
                                                -
                                            @endif
                                            {{ $pointage->heureMoin }}  
                                            <br> 
                                            @if ($pointage->avance)
                                                avance : {{ $pointage->avance }} 
                                            @endif
                                            <br>
                                            {{ $pointage->montantAjouter }}
                                        </td>
                                        @php
                                            $dates[] = $pointage->date;
                                        @endphp
                                    @endif
                                @endforeach

                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </body>
    </html>

    <script>
        document.getElementById("filterButton").addEventListener("click", function() {
            var debut = new Date(document.getElementById("debut").value);
            var fin = new Date(document.getElementById("fin").value);
            filterData(debut, fin);
        });

        function filterData(debut, fin) {
            var rows = document.querySelectorAll("tr");

            for (var i = 0; i < rows.length; i++) {
                var row = rows[i];
                var salarierCell = row.querySelector(".nom-salarier");
                var cells = row.querySelectorAll("td");

                if (salarierCell) {
                var salarier = salarierCell.textContent;

                if (salarier) {
                    if (row.style.display === "none") {
                    row.style.display = "table-row";
                    }

                    if (cells.length > 0) {
                    var showRow = false;

                    for (var j = 0; j < cells.length; j++) {
                        var cell = cells[j];
                        var cellDate = new Date(cell.getAttribute("data-date"));

                        if (cellDate >= debut && cellDate <= fin) {
                        cell.style.display = "table-cell";
                        showRow = true;
                        } else {
                        cell.style.display = "none";
                        }
                    }

                    if (showRow) {
                        salarierCell.style.display = "table-cell";
                    } else {
                        salarierCell.style.display = "none";
                        row.style.display = "none";
                    }
                    }
                }
                }
            }

            var headers = document.querySelectorAll("th[data-date]");

            for (var k = 0; k < headers.length; k++) {
                var header = headers[k];
                var headerDate = new Date(header.getAttribute("data-date"));

                if (headerDate >= debut && headerDate <= fin) {
                header.style.display = "table-cell";
                } else {
                header.style.display = "none";
                }
            }
        }
    </script>
@endsection