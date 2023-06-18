<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<html>
<head>
	<title>Create detail_pointage</title>
</head>
<body>
	<style>
		label{
			font-weight: bold;
		}
		#input{
			width: 350px;
		}
	</style>
    <center>
		<form method="post" action="{{ route('detail_pointage.store') }}">
			<table>
				@csrf
				<input type="hidden" name="id_salarier" value="{{ $salarier->id }}">
				<tr>
					<td><label for="date">date: </label></td>
					<td><input type="date" name="date" required class="my-4" id="input"></td>
				</tr>
				<tr>
					<td><label>presentAbsent</label></td>
					<td>
						<input type="radio" name="presentAbsent" value="P" class="my-4"> P 
						<input type="radio" name="presentAbsent" value="A" class="my-4 mx-2"> A
					</td>
				</tr>
				<tr>
					<td><label for="heureSupp">heureSupp : </label></td>
					<td><input type="time" name="heureSupp" class="my-4" id="input"></td>
				</tr>
				<tr>
					<td><label for="heureMoin">heureMoin : </label></td>
					<td><input type="time" name="heureMoin" class="my-4" id="input"></td>
				</tr>
				<tr>
					<td><label for="avance">avance : </label></td>
					<td><input type="text" name="avance" class="my-4" id="input"></td>
				</tr>
				<tr>
					<td><label for="montantAjouter">montantAjouter : </label></td>
					<td><input type="text" name="montantAjouter" class="my-4" id="input"></td>
				</tr>
				<tr>
					<td><label for="remarque">remarque : </label></td>
					<td>
						<input type="text" name="remarque" class="my-4" id="input">
						<button type="submit" class="btn btn-primary mx-2">Create</button>
					</td>
				</tr>
			</table>
		</form>
	</center> 
</body>
</html>
