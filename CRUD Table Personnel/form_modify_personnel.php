<?php require 'database_connexion.php';
$id = null;
if (!empty($_GET['id']))
{
	$id = $_REQUEST['id'];
}
if ( null==$id )
{
	header("Location: personnel_crud.php");
}

		$pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Personnel where IdPersonnel = $id";
		$sql_centrale = "SELECT * FROM Centrale";
		$sql_camp = "SELECT * FROM Camp";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$login = $data['Login'];
		$mdp = $data['Mdp'];
		$role = $data['Role'];
		// $nom_centrale = $data['idCentrale'];
		// $ville_camp = $data['idCamp'];
		Database::disconnect();
	// }

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Mofication d'un Personnel</title>
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
<h3>Modifier un Personnel</h3>
<p>

</div>
<p>

<br />

<br />
<form method="post" action="send_data_modify_personnel?id=<?php echo $id ;?>">

<br />
<div class="control-group ">
	<label class="control-label">Login:</label>

<br />
<div class="controls">
	<input name="Login" type="text" placeholder="Login" value="<?php echo!empty($login) ? $login : ''; ?>">

</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Mdp:</label>

<br />
<div class="controls">
	<input name="Mdp" type="text" value="<?php echo!empty($mdp) ? $mdp : ''; ?>">

</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Role:</label>

<br />
<div class="controls">
	<input name="Role" type="text" value="<?php echo!empty($role) ? $role : ''; ?>">

</div>
<p>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Centrale:</label>
	<select name="Centrale">
		<?php
		foreach ($pdo->query($sql_centrale) as $row)
		{
			if ($data['idcentrale']!=$row['IdCentrale'])
			{
				echo('<option value='.$row['IdCentrale'].'>'.$row['NomCentrale'].'</option>');
			}else
			{
				echo ('<option value='.$row['IdCentrale'].' selected>'.$row['NomCentrale'].'</option>');
			}
		}
		echo('<option value='.vide.'>'." ".'</option>');
		?>
	</select>

</div>
<p>

<br />
<div class="control-group">
	<label class="control-label">Camp:</label>
	<select name="Camp">
		<?php
		foreach ($pdo->query($sql_camp) as $row)
		{
			if ($data['idCamp']!=$row['IdCamp'])
			{
				echo('<option value='.$row['IdCamp'].'>'.$row['Ville'].'</option>');
			}else
			{
				echo ('<option value='.$row['IdCamp'].' selected>'.$row['Ville'].'</option>');
			}
		}
		echo('<option value='.vide.'>'." ".'</option>');
		?>
	</select>

</div>
<p>

<br />
<div class="form-actions">
	<input type="submit" class="btn btn-success" name="submit" value="Envoyer">
	<a class="btn" href="personnel_crud.php">Retour</a>
</div>
<p>

</form>

</div>
<p>

</body>
</html>
