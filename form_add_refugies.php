<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ajout d'un réfugié</title>
	</head>
	
	<body>
		<?php require ('database_connexion.php');
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
			<?php
				/*if ((ctype_alpha($_POST['Nom']))==false)
				{
					echo("Le nom entré n'est pas valable ! ");
				}
				if (empty($_POST['Nom']))
				{
					echo('Le champ nom est vide ! ');
				}				 
				if (strlen($_POST['Nom'])>25)
				{
					echo('Votre nom est trop long ! ');
				}*/
			?>
			Prenom:<br/>
			<input type="text" name="Prenom" value=""/>
			<p>
			<?php
				/*if ((ctype_alpha($_POST['Prenom']))==false)
				{
					echo("Le prénom entré n'est pas valable ! ");
				}
				if (empty($_POST['Prenom']))
				{
					echo('Le champ prénom est vide ! ');
				}				 
				if (strlen($_POST['Prenom'])>25)
				{
					echo('Votre prénom est trop long ! ');
				}*/
			?> 
		
			Date de naissance:<br/>
			<input type="date" max=date() name="DateNaiss" value=""/>
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

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		