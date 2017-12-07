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
	
	$pdo_camp = Database::connect();
	$pdo_centrale = Database::connect();
	$camp_sql = 'SELECT * FROM camp';
	$rep_camp = $pdo->query($camp_sql);
	$centrale_sql = 'SELECT * FROM centrale';
	$rep_centrale = $pdo->query($nationalite_sql);
	
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
		foreach($pdo_centrale->query($centrale_sql) as $row_centrale)
		{
			if ($row_centrale['IdCentrale']==$data['IdCentrale'])
			{
				$nom_centrale=$row_centrale['NomCentrale'];
			}
		}
		echo $nom_centrale;
		?>
	</label>
	
</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Camp:"</label>
	
</div>
<div class="controls">
	<label class="checkbox">
		<?php
		foreach($pdo_camp->query($camp_sql) as $row_camp)
		{
			if ($row_camp['IdCamp']==$data['IdCamp'])
			{
				$ville_camp=$row_camp['Ville'];
			}
		}
		echo $ville_camp;
		?>
	</label>
	
</div>
<p>

</div>
<p>

<br />
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
			
		
			
			
			
			
			