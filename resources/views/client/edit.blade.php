@auth
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<form action="{{ route('client.update',$client) }}" class="container" method="post">
    <center> 
        <table>
            @csrf
            @method('PUT')
            <tr>
                <td><b>Nom</b></td>
                <td> : <input type="text" name="nom" value="{{ $client->nom }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>Lieu</b></td>
                <td> : <input type="text" name="lieu" value="{{ $client->lieu }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>Eppesseur Matiere</b></td>
                <td> : <input type="text" name="eppMat" value="{{ $client->eppMat }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>Eppesseur Dérriere</b></td>
                <td> : <input type="text" name="eppDer" value="{{ $client->eppDer }}" class="my-4"></td> 
                <td><input type="submit" class="btn btn-secondary mx-2" value="Update Client" href="{{ route('client.index') }}"></td>
            </tr>
        </table>  
    </center>      
</form>
@endauth