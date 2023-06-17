<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                <td> : <input type="text" id="t" name="presentAbsent" value="{{ $detail_pointage->presentAbsent }}" class="my-4"></td>
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
                <td><b>remarque</b></td>
                <td> : <input type="text" id="t" name="remarque" value="{{ $detail_pointage->remarque }}" class="my-4">
                    <input type="submit" class="btn btn-secondary mx-2" value="Update" href="{{ route('detail_pointage.index') }}">
                </td>
            </tr>
        </table>      
    </center>   
</form>