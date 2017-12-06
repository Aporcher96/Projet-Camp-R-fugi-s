<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Titre</title>
	</head>
	
	<body>
		<?php include 'database_connexion.php';
		$pdo = Database::connect();
		$sql = 'SELECT * FROM nationalite';
		$rep = $pdo->query($sql);
		$sql2= 'SELECT * FROM camp';
		$res = $pdo->query($sql2);
		?>
		
		<form name= "Ajout d'un réfugié" action="send_data_add_refugies.php" method="post">
			Nom:<br/>
			<input type="text" name="Nom" value=""/>
			<p>
		
			Prenom:<br/>
			<input type="text" name="Prenom" value=""/>
			<p>
		
			Date de naissance:<br/>
			<input type="date" name="DateNaiss" value=""/>
			<p>
		
			Illetrisme ?:<br/>
			<select name="Illetre">
				<option value="1">Oui</option>
				<option value="0">Non</option>
			</select>
			<p>
		
			Blessé(e) ?:<br/>
			<select name="Blesse">
				<option value="1">Oui</option>
				<option value="0">Non</option>
			</select>
			<p>
			
			Conscient(e) ?:<br/>
			<select name="Conscient">
				<option value="1">Oui</option>
				<option value="0">Non</option>
			</select>
			<p>
		
			Nationalité:<br/>
			<select name="Nationalite">
				<?php
				foreach ($pdo->query($sql) as $row){
					echo ('<option value='.$row['IdNationalite'].'>'.$row['NomPays'].'</option><br/>');
				}?>
		
			</select>
			<p>
		
			Camp:<br/>
			<select name="Camp">
				<?php foreach ($pdo->query($sql2) as $row){
					echo ('<option value='.$row['IdCamp'].'>'.$row['Ville'].'</option><br/>');		
				}?>
			</select>
			<p>
			<input type="submit" value="Envoyer"/>
			<input type="reset" value="Annuler"/>
		</form>
	</body>
</html>

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		