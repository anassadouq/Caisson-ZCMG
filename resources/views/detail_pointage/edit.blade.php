<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<style>
    #t{
        width: 350px;
    }
</style>
<form action="{{ route('detail_pointage.update',$detail_pointage) }}" class="container" method="post">
    <center>
        <table>
            @csrf
            @method('PUT')
            <tr>
                <td><b>date</b></td>
                <td> : <input type="date" id="t" name="date" value="{{ $detail_pointage->date }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>presentAbsent</b></td>
                <td>
                    <input type="radio" name="presentAbsent" value="P" class="my-4"> P 
                    <input type="radio" name="presentAbsent" value="A" class="my-4"> A
                </td>
            </tr>
            <tr>
                <td><b>heureSupp</b></td>
                <td> : <input type="time" id="t" name="heureSupp" value="{{ $detail_pointage->heureSupp }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>heureMoin</b></td>
                <td> : <input type="time" id="t" name="heureMoin" value="{{ $detail_pointage->heureMoin }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>avance</b></td>
                <td> : <input type="text" id="t" name="avance" value="{{ $detail_pointage->avance }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>montantAjouter</b></td>
                <td> : <input type="text" id="t" name="montantAjouter" value="{{ $detail_pointage->montantAjouter }}" class="my-4"></td>
            </tr>
            <tr>
                <td><b>remarque</b></td>
                <td> : <input type="text" id="t" name="remarque" value="{{ $detail_pointage->remarque }}" class="my-4">            
                <button class="btn btn-secondary mx-2">
                    <span class="material-symbols-outlined">edit</span>    
                Modifier</button>        
                </td>
            </tr>
        </table>      
    </center>   
</form>