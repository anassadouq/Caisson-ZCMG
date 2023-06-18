@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<Link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"/>
<style>
    table, th, td {
        border: 1px solid black;  
    }
</style>
<a href="{{ route('contrat.create', ['salarierId' => $salarier->id]) }}" >
        <button class="btn btn-primary my-4 mx-4" style="width:85px">
            <span class="material-symbols-outlined">add</span>
        </button>
    </a>

<div class="mx-3 my-3">
    <table class="text-center" width="100%">
        <thead>
            <tr>
                <th>Nom Salarier</th>
                <th>Nom Sociéte</th>
                <th>Adresse Sociéte</th>
                <th>Date Départ</th>
                <th>Date Finale</th>
                <th>Contrat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contrats as $contrat)
                <tr>
                    <td>{{ $salarier->prenom }} {{ $salarier->nom }}</td>
                    <td>{{ $contrat->nomSociéte }}</td>
                    <td>{{ $contrat->adresseSociéte }}</td>
                    <td>{{ $contrat->dateDepart }}</td>
                    <td>{{ $contrat->dateFinale }}</td>
                    <td>
                        <a class="btn btn-warning my-2 mx-2" href="{{ route('attestation', ['salarierId' => $salarier->id, 'contratId' => $contrat->id]) }}" style="text-decoration: none">
                            <span class="material-symbols-outlined">
                                download
                            </span> Contrat
                        </a>

                        <a class="btn btn-success" href="{{ route('soldett', ['salarierId' => $salarier->id, 'contratId' => $contrat->id]) }}" style="text-decoration: none">
                            <span class="material-symbols-outlined">
                                download
                            </span> Solde de tt compte
                        </a>
                    </td>
                    <td>
                        <form action="{{ route('contrat.destroy', $contrat['id']) }}" method="POST" id="deleteContratForm{{ $contrat['id'] }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ route('contrat.edit' ,$contrat['id']) }}" class="btn btn-secondary">
                                <span class="material-symbols-outlined">edit</span>    
                            Modifier</a>
                            <button type="button" class="btn btn-danger mx-3" onclick="confirmDeleteContrat('{{ $contrat['id'] }}')">
                                <span class="material-symbols-outlined">delete</span>
                            Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
        function confirmDeleteContrat(contratId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer ce contrat ?')) {
                document.getElementById('deleteContratForm' + contratId).submit();
            }
        }
    </script>
@endsection