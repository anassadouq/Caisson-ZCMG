<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<h1 class="text-center">Update</h1>
<form action="{{ route('detail.update',$detail) }}" class="container" method="post">
    <table>
        @csrf
        @method('PUT')
        <tr>
            <td><b>Position</b></td>
            <td> : <input type="text" name="position" value="{{ $detail->position }}" class="my-3"></td>
        </tr>
        <tr>
            <td><b>Hauteur</b></td>
            <td> : <input type="text" name="hauteur" value="{{ $detail->hauteur }}" class="my-3"></td>
        </tr>
        <tr>
            <td><b>Largeur</b></td>
            <td> : <input type="text" name="largeur" value="{{ $detail->largeur }}" class="my-3"></td>
        </tr>
        <tr>
            <td><b>Profondeur</b></td>
            <td> : <input type="text" name="profondeur" value="{{ $detail->profondeur }}" class="my-3"></td>
        </tr>
        <tr>
            <td><b>Qte</b></td>
            <td> : <input type="text" name="qte" value="{{ $detail->qte }}" class="my-3"></td> 
            <td><input type="submit" class="btn btn-secondary" value="Update" href="{{ route('detail.index') }}"></td>
        </tr>
    </table>        
</form>