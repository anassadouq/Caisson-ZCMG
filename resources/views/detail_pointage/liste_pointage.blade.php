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
        <div class="mx-2">
            <table class="text-center my-3">
                <thead>
                    <tr>
                        <th>Salarie</th>
                        @foreach ($pointages as $pointage)
                            <th>{{ $pointage->date}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salariers as $salarier)
                        <tr>
                            <td>{{ $salarier->prenom }} {{ $salarier->nom }}</td>
                            @foreach ($pointages as $pointage)
                                <td @if (date('N', strtotime($pointage->date)) == 7) class="black-cell" @endif>
                                    {{ $pointage->presentAbsent }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
    </html>
@endsection