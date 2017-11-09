<!doctype html> 
<html> 
	<head> 
	<?php include("connexion.php");?>
		<meta charset="utf-8"> 
		<title>Connexion</title> 
		<style type="text/css"> 
			body,td,th {font-family: Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif;} 
		</style> 
	</head> 

	<body bgcolor="#D4D0D0" style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif"> 
		<?php
			if(isset($_SESSION['pseudo']) && !empty($_SESSION['pseudo'])) 
			{ 
				if (!isset($_SESSION['non']))
				{
		?>

		<form action="formulaire.php" method="post" name="form1" id="form1"> 
			<h1 align="center"><strong><u style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif">FORMULAIRE D’INSCRIPTION</u></strong></h1> 
			<p align="center"> 
			<label for="date"> 
				<div align="left">DATE D’INSCRIPTION: 
					<input name="date" type="date" id="dateinscption"> 
				</div> 
			</label> 
			<p> 
				<label for="textfield2">NOM :</label> 
				<input type="text" name="textfield2" id="nom"> 
				<label for="textfield3">PRENOM:</label> 
				<input type="text" name="textfield3" id="prenom"> 
			</p> 
			<p> 
				<label for="number">DATE DE NAISSANCE (Y/M/D) : </label> 
				<input type="date" name="date" id="datenaissance"> 
			</p> 

			<p>SEXE : 
			<input type="radio" name="radio" id="masculin" value="radio"> 
			<label for="radio">MASCULIN </label> 
			<input type="radio" name="radio2" id="feminin" value="radio2"> 
			FEMININ</p> 

			<p>BLAISSE : 
			<input type="radio" name="radio" id="masculin" value="radio"> 
			<label for="radio">BLAISSE </label> 
			<input type="radio" name="radio2" id="feminin" value="radio2"> 
			SAIN</p> 

			NATIONALITE 
			<label for="textfield6">:</label> 
			<input type="text" name="textfield6" id="nationalite"> 
			<label for="textfield7"><br> 
			<br>  

			ID DU CAMPS D'ACCEUIL
			<label for="textfield6">:</label> 
			<input type="text" name="textfield6" id="nationalite"> 
			<label for="textfield7"><br> 
			<br> 

			ID DU REFUGIER
			<label for="textfield6">:</label> 
			<input type="text" name="textfield6" id="nationalite"> 
			<label for="textfield7"><br> 
			<br> 
			<center>
				<input type="submit" value="Envoyer" />
			</center>
		</form> 

			<?php
				}
				else
				{
					INSERT INTO TABLE VALUES (&nom, &prenom)
				}
				}
				else
				{ 
					echo "Zone protégée";
				}
			?>
	</body> 
</html> 