<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<form action="{{ route('detail_devis.update', $detail_devis->id) }}" method="POST">
    <center>
        <table>
            @csrf
            @method('PUT')
            <tr>
                <td><b>Article</b></td>
                <input type="hidden" name="id_client" value="{{ $detail_devis->id_client }}">
                <td><textarea name="article" cols="60" rows="3" class="my-3">{{ $detail_devis->article }}</textarea></td>
            </tr>
            <tr>
                <td><b>Qte</b></td>
                <td> : <input type="text" name="qte" value="{{ $detail_devis->qte }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>Unite</b></td>
                <td> : <input type="text" name="unite" value="{{ $detail_devis->unite }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>Pu</b></td>
                <td> : 
                    <input type="text" name="pu" value="{{ $detail_devis->pu }}" class="my-3">
                    <button class="btn btn-secondary mx-2">
                        <span class="material-symbols-outlined">edit</span>    
                    Modifier</button>
                </td> 
            </tr>
        </table>
    </center>         
</form>