<?php require('database_connexion.php');
$id = null;
if (!empty($_GET['id']))
{
	$id = $_REQUEST['id'];
}
if (null == $id)
{
	header("location:personnel_crud.php");
} else
{
	$pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
	$sql = "SELECT * FROM personnel WHERE IdPersonnel=$id";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);

	$pdo_postcamp= Database::connect();
	$pdo_posycentrale = Database::connect();



	$postcampsql ='SELECT * from postecamp ,camp ,personnel where camp.IdCamp=postecamp.Idcamp and postecamp.IdPersonnel=personnel.IdPersonnel  ';
	$postcamprep = $pdo_postcamp->query($postcampsql);

	$postcentralsql ='SELECT * from postecentrale ,centrale ,personnel where centrale.IdCentrale=postecentrale.IdCentrale and postecentrale.IdPersonnel=personnel.IdPersonnel';
	$postcentralrep = $pdo_posycentrale->query($postcentralsql);


	foreach ($pdo_postcamp->query($postcampsql) as $row_postcamp) {



	if ($row_postcamp['IdPersonnel']==$data['IdPersonnel'])
	{
		$ville_camp=$row_postcamp['Ville'];
		break;
	}else{
			$ville_camp="";

	}
	}

foreach ($pdo_posycentrale->query($postcentralsql) as $row_postecentrale) {
	if ($row_postecentrale['IdPersonnel']==$data['IdPersonnel'])
					{

							$centrale=$row_postecentrale['NomCentrale'];
								break;
							}else{
									$centrale="";
							}
						}




	Database::disconnect();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<link href="css/bootstrap.min.css" rel="stylesheet">
<img
src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA

A7" data-wp-
preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-
resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20"

alt="<script>" title="<script>" />
</head>
<body>
<br />
<div class="container">

<br />
<div class="span10 offset1">
<br />
<div class="row">
<br />
<h3>Edition</h3>
<p>
</div>
<p>

<br />
<div class="form-horizontal" >

<br />
<div class="control-group">
	<label class="control-label">Login:</label>

<br />
<div class="controls">
	<label class="checkbox">
		<?php echo $data['Login']; ?>
	</label>

</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Mdp:</label>

<br />
<div class="controls">
	<label class="checkbox">
		<?php echo $data['Mdp']; ?>
	</label>

</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Role:</label>

<br />
<div class="controls">
	<label class="checkbox">
		<?php echo $data['Role']; ?>
	</label>

</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Centrale:"</label>

</div>
<div class="controls">
	<label class="checkbox">
		<?php
		echo $centrale;
		?>
	</label>

</div>
<p>


<p>

<br />
<div class="control-group">
	<label class="control-label">Ville du camp:"</label>

</div>
<div class="controls">
	<label class="checkbox">
		<?php
		echo $ville_camp;
		?>
	</label>

</div>
<p>

</div>
<p>

<br />
</div>
<div class="form-actions">
	<a class="btn" href="personnel_crud.php">Retour</a>
</div>
<p>

</div>
<p>

</div>
<p>

</div>
<p>

</body>
</html>
