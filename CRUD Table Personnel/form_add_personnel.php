<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Titre</title>
	</head>
	
	<body>
						
						<?php include 'database_connexion.php';
						$pdo = Database::connect();
						$sql = 'SELECT * FROM centrale';
						$rep = $pdo->query($sql);
						$sql2 = 'SELECT * FROM camp';
						$res = $pdo->query($sql2);
						?>
						
			<form name="Ajouter un membre du personnel" action="send_data_add_personnel.php" method="post">
				Login:<br/>
				<input type="text" name="Login" value=""/>
				<p>
				
				Mdp:<br/>
				<input type="text" name="Mdp" value=""/>
				<p>
				
				Role:<br/>
				<input type="text" name"Role" value=""/>
				<p>
				
				Centrale:<br/>
				<select name="Centrale">
				<?php
				foreach ($pdo->query($sql) as $row) {
					echo ('<option value='.$row['IdCentrale'].'>'.$row['NomCentrale'].'</option><br/>');
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