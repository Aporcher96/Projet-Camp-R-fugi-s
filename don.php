<!DOCTYPE html>
<html lang ="fr">
	<head>
		<meta charset ="utf-8">

		<title> refugee </title>
	</head>
	<?php include("header.php");?>
	<?php include("connexion.php");?>


	<body>
		<form method="post" action="merci.php">
			<p> 
				<label for="textfield2">NOM :</label> 
				<input type="text" name="textfield2" id="nom"> 
				<label for="textfield2">PRENOM:</label> 
				<input type="text" name="textfield2" id="prenom"> 
				
				<br />
				
				<label for="textfield2">Montant de votre don en euro(€) :</label>
				<input type="text" name="textfield2" id="don">
				<input type="submit" value="Valider" />
				
			</p>

		</form>



	</body>
</html>