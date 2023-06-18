<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<form action="{{ route('fournisseur.update',$fournisseur) }}" class="container" method="post">
    <center> 
        <table>
            @csrf
            @method('PUT')
            <tr>
                <td><b>Nom</b></td>
                <td> : <input type="text" name="nom" value="{{ $fournisseur->nom }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>Adresse</b></td>
                <td> : <input type="text" name="adresse" value="{{ $fournisseur->adresse }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>Telephone</b></td>
                <td> : 
                    <input type="text" name="tel" value="{{ $fournisseur->tel }}" class="my-4">
                    <button class="btn btn-secondary mx-2">
                        <span class="material-symbols-outlined">edit</span>
                    Modifier</button>
                </td>
            </tr>
        </table>  
    </center>      
</form>