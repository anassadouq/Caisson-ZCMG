@auth

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<form action="{{ route('detail_devis.update',$detail_devis) }}" class="container" method="post">
    <center>
        <table>
            @csrf
            @method('PUT')
            <tr>
                <td><b>article</b></td>
                <td> : <input type="text" name="article" value="{{ $detail_devis->article }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>qte</b></td>
                <td> : <input type="text" name="qte" value="{{ $detail_devis->qte }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>unite</b></td>
                <td> : <input type="text" name="unite" value="{{ $detail_devis->unite }}" class="my-3"></td>
            </tr>
            <tr>
                <td><b>pu</b></td>
                <td> : <input type="text" name="pu" value="{{ $detail_devis->pu }}" class="my-3"></td> 
            </tr>
            <tr>
                <td>
                    <input type="submit" class="btn btn-secondary mx-2" value="Modifier Article" href="{{ route('detail_devis.index') }}">
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