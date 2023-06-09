<html>
<head>
	<title>Create Designation</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<style>
		label{
			font-weight:bold;
		}
	</style>
    <form method="post" action="{{ route('detail_bl.store') }}">
		<center> 
			<table>
				@csrf
				<tr>
					<input type="hidden" name="id_bl" value="{{ $bl->id }}">
					<input type="hidden" name="id_fournisseur" value="{{ $bl->id_fournisseur }}">
				</tr>
				<tr>
					<td><label>Code : </label></td>
					<td><input type="text" name="code" class="my-3"></td>
				</tr>
				<tr>
					<td><label for="designation">Désignation : </label></td>
					<td>
						<textarea name="designation" cols="60" rows="3" class="my-3"></textarea>
					</td>
				</tr>
				<tr>
					<td><label>Qte</label></td>
					<td><input type="text" name="qte" class="my-3"></td>
				</tr>
				<tr>
					<td><label for="eppDer">Unite : </label></td>
					<td>
						<input type="radio" name="unite" value="Unité " class="my-4 mx-1">Unité 
						<input type="radio" name="unite" value="m2" class="mx-1">m2  
						<input type="radio" name="unite" value="ml" class="mx-1">ml 
						<input type="radio" name="unite" value="m3" class="mx-1">m3  
						<input type="radio" name="unite" value="Forfait" class="mx-1">Forfait 
					</td>
				</tr>
				<tr>
					<td><label>PU</label></td>
					<td>
						<input type="text" name="pu" class="my-3">
						<button type="submit" class="btn btn-primary mx-2">Créer Désignation</button>
					</td>
				</tr>
			</table>
		</center>
	</form>
</body>
</html>