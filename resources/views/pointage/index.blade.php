@auth
@extends('layouts.app')
@section('content')
<html>
<head>
	<title>Salarier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.4/datatables.min.css"/>
</head>
<body>
    <div>
        <h1 class="text-center">Pointage</h1>
        <a href="{{url('/liste_pointage')}}" class="mx-3 btn btn-info">Liste Pointage</a>
        <table class="container text-center my-5" width="100%" id="pointage">
            <thead>
                <tr>
                    <th>Nom</th>
                    @if (Auth::user()->email == "younes@gmail.com")
                        <th>Salaire</th>
                    @endif
                    <th>Show</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salariers as $salarier)
                    @if ( $salarier->active =="Oui" )
                        <tr>
                            <td>{{ $salarier->prenom }} {{ $salarier->nom }}</td>
                            @if (Auth::user()->email == "younes@gmail.com")
                                <td>{{ $salarier->salaire }}DH</td>
                            @endif
                            <td>
                                <a href="{{ route('detail_pointage.show', $salarier->id) }}">
                                    <span class="material-symbols-outlined">ads_click</span>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('salarier.destroy', $salarier->id) }}" method="POST" id="deleteSalarierForm{{ $salarier->id }}">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <a href="{{ route('salarier.edit' ,$salarier->id) }}" class="btn btn-secondary">
                                        <span class="material-symbols-outlined">edit</span>    
                                    Modifier</a>
                                    <button type="button" class="btn btn-danger mx-3" onclick="confirmDeleteSalarier('{{ $salarier->id }}')">
                                        <span class="material-symbols-outlined">delete</span>
                                    Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>    
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

    <script>
        function confirmDeleteSalarier(salarierId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce salarié ?')) {
                document.getElementById('deleteSalarierForm' + salarierId).submit();
            }
        }

        $(document).ready(function() {
            $('#pointage').DataTable( {
                dom: 'Blfrtip',
                lengthChange: false, // disable length change dropdown
                paging: false, // disable pagination
                buttons: [],
                language: {
                    info: "", // hide "Showing" text
                    infoEmpty: "" // hide "Showing 0 to 0 of 0 entries" text
                }
            });
        });
    </script>
</body>
</html>
@endsection
@endauth