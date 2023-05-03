@auth

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<form action="{{ route('detail_placard.update',$detail_placard) }}" class="container" method="post" enctype="multipart/form-data">
    <center>
        <table>
            @csrf
            @method('PUT')
            <tr>
                <td><b>Image</b></td>
                <td> : <input type="file" name="image" class="my-3"></td> 
            </tr>
            <tr>
                <td><b>Hauteur</b></td>
                <td> : <input type="text" name="hauteur" value="{{ $detail_placard->hauteur }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>Largeur</b></td>
                <td> : <input type="text" name="largeur" value="{{ $detail_placard->largeur }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>Profondeur</b></td>
                <td> : <input type="text" name="profondeur" value="{{ $detail_placard->profondeur }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>Qte</b></td>
                <td> : <input type="text" name="qte" value="{{ $detail_placard->qte }}" class="my-3"></td> 
            </tr>
            <tr>
                <td><b>Num App</b></td>
                <td> : 
                    <input type="text" name="appartement" value="{{ $detail_placard->appartement }}" class="my-3">
                    <input type="submit" class="btn btn-secondary mx-2" value="Modifier Placard" href="{{ route('detail_placard.index') }}">
                </td> 
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </table>
    </center>         
</form>

@endauth