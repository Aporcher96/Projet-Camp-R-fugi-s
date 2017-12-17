<?php require 'database_connexion.php';
$id_centrale = null;
$id_materiel = null;

if (!empty($_GET['id']))
{

  $chiffre=str_split($_GET['id']);
  $id_centrale = $chiffre[0];

}

if (!empty($_GET['id']))
{
  $chiffre=str_split($_GET['id']);
  $id_materiel = $chiffre[1];
}
if(!empty($_POST))
{
$id_materiel= $_POST['id_materiel_centrale'];
$id_centrale=$_POST['id_nom_centrale'];


$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="DELETE FROM quantitecentrale WHERE IdCentrale = $id_centrale and IdMateriel = $id_materiel";
$q=$pdo->prepare($sql);
//$q->bindParam(':id_materiel',$id_materiel);
//$q->bindParam(':id_camp', $id_camp);
$q->execute(array($id_centrale.$id_materiel));
Database::disconnect();
header("Location: stock_centrale_crud.php");

}?>

<!DOCTYPE html>

 <html lang="fr">
 <head>
     <meta charset="utf-8">
     	<link href="css/bootstrap.min.css" rel="stylesheet">
     <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
 </head>

 <body>

 <br />
 <div class="container">

 <br />
 <div class="span10 offset1">

 <br />
 <div class="row">

 <br />
 <h3>Supprimer un stock</h3>
 <p>
 </div>
 <p>

<br/>
<form class="form-horizontal" action="file_delete_stock_centrale.php" method="post">
  <input type="hidden" name="id_nom_centrale" value="<?php echo $id_centrale;?>"/>

<input type="hidden" name="id_materiel_centrale" value="<?php echo $id_materiel;?>"/>

Êtes-vous sûre de vouloir supprimer ce stock ?

<br/>
<div class="form-actions">
  <button type="submit" class="btn btn-danger">Oui</button>
  <a class="btn" href="stock_centrale_crud.php">Non</a>
</div>
<p>

</form>

  <p>
</div>
<p>

  </body>


  </html>
