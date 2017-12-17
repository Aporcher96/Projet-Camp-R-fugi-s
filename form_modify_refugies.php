<?php
	require ('database_connexion.php');
	$id = null;
	if(!empty($_GET['id']))
	{
		$id = $_REQUEST['id'];
	}
	if(null==$id)
	{
		header("Location: refugies_crud.php");
	}

	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM Refugies where IdRefugies = $id";
	$sql_natio="SELECT * FROM Nationalite";
	$sql_camp="SELECT * FROM Camp";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	$nom = $data['Nom'];
	$prenom = $data['Prenom'];
	$date_naiss = $data['DateNaiss'];
	$illetre = $data['Illetre'];
	$blesse = $data['Blesse'];
	$conscient = $data['Conscient'];
	$nom_natio = $data['idNationalite'];
	$ville_camp = $data['idCamp'];
	Database::disconnect();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Mofication d'un Refugié</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<img
src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
A7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E"
data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20"
alt="<script>" title="<script>" />
	</head>
	<body>

		<br />
		<div class="container">
			<br />
			<div class="row">
				<br />
				<h3>Modifier un Réfugié</h3>
				<p>
			</div>
			<p>
			<br />

			<form method="post" action="send_data_modify_refugies.php?id=<?php echo $id ;?>">
				<br/>
				<div class="control-group">
					<label class="control-label">Nom</label>
					<br/>
					<div class="controls">
						<input name ="Nom" type="text" placeholder="Nom" value="<?php echo!empty($nom) ? $nom : ''; ?>">
					</div>
					<p>

				</div>
				<p>

				<br/>
				<div class="control-group">
					<label class="control-label">Prenom:</label>
					<br/>
					<div class="controls">
						<input type="text" name="Prenom" value="<?php echo!empty($prenom) ? $prenom : '';?>">
					</div>
					<p>
				</div>
				<p>

				<br/>
				<div class="control-group">
					<label class="control-label">Date de Naissance:</label>
					<br/>
					<div class="controls">
						<input type="date" name="DateNaiss" value="<?php echo!empty($date_naiss) ? $date_naiss : ''; ?>">
					</div>
					<p>

				</div>
				<p>
				</br>
				<div class="control-group">
					<label class="control-label">Illetre</label>
					<br/>
					<div class="controls">
						<select name="Illetre">
							<?php if( $data['Illetre']==0){?>
								<option value="0">Non</option>
								<option value="1">Oui</option>
							<?php }else{ ?>
								<option value ="1">Oui</option>
								<option value ="0">Non</option>
							<?php } ?>

						</select>
					</div>
					<p>
				</div>
				<p>
				<br/>
				<div class="control-group ">
					<label class="control-label">Blesse</label>
					<br/>
					<div class="controls">
						<select name="Blesse">
							<?php if($data['Blesse']==0){?>
								<option value="0">Non</option>
								<option value="1">Oui</option>
							<?php }else{ ?>
								<option value="1">Oui</option>
								<option value="0">Non</option>
							<?php } ?>
						</select>
					</div>
					<p>

				</div>
				<p>
				</br>
				<div class="control-group">
					<label class="control-label">Conscient</label>
					<select name="Conscient">
						<?php if($data['Conscient']==0){?>
							<option value="0">Non</option>
							<option value="1">Oui</option>
						<?php }else{ ?>
							<option value="0">Oui</option>
							<option value="1">Non</option>
						<?php } ?>
					</select>
				</div>
				<p>
				<br/>
				<div class="control-group">
					<label class="control-label">Nationalité</label>
					<select name="Nationalite">
						<?php
							foreach ($pdo->query($sql_natio) as $row)
							{
								if ($data['idNationalite']!=$row['IdNationalite'])
								{
									echo('<option value='.$row['IdNationalite'].'>'.$row['NomPays'].'</option>');
								}else{
									echo('<option value='.$row['IdNationalite'].' selected>'.$row['NomPays'].'</option>');
								}
							}
						?>
					</select>
				</div>
				<p>
				<br/>
				<div class="control-group">
					<label class="control-label">Camp</label>
					<select name="Camp">
						<?php
							foreach ($pdo->query($sql_camp) as $row)
							{
								if ($data['idCamp']!=$row['IdCamp'])
								{
									echo('<option value='.$row['IdCamp'].'>'.$row['Ville'].'</option>');
								}else{
									echo('<option value='.$row['IdCamp'].' selected>'.$row['Ville'].'</option>');
								}
							}
						?>
					</select>
				</div>
				<p>
				<br/>
				<div class="form-actions">
					<input type="submit" class="btn btn-success" name="submit" value="Envoyer">
					<a class="btn" href="refugies_crud.php">Retour</a>
				</div>
				<p>
			</form>
			<p>
		</div>
		<p>
	</body>
</html>
