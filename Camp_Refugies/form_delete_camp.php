<?php require'database_connexion.php';
$id=0;

if (!empty($_GET['id']))
{
  echo($_GET['id']);
  $id = $_REQUEST['id'];
}
if (!empty($_POST))
{
  $id= $_POST['id'];
  $pdo=Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "DELETE FROM camp WHERE IdCamp=$id";
  $q = $pdo->prepare($sql);
  $q->execute(array($id));
  Database::disconnect();
  header("Location : camp_crud.php");
}
 ?>

 <!DOCTYPE html>
 <html lang="fr">
   <head>
     <meta charset="utf-8">
          <link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
    data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E"
    data-mce-resize="false"
    data-mce-placeholder="1"
    class="mce-object" width="20" height="20" alt="<script>" title="<script>" />

   </head>
   <body>

<br/>
<div class="container">

<br/>
<div class = "span10 offset1">

<br/>
<div class = "row">

<br/>
<h3>Supprimer un camp</h3>
<p>

</div>
<p>

<br/>
<form class="form-horizontal" action="form_delete_camp.php" method="post">
        <input type ="hidden" name="id" value="<?php echo $id;?>"/>

        Voulez vous vraiment supprimer un camp ?

<br/>
<div class="form-actions">
                          <button type="submit" class="btn btn-danger">Oui</button>
                          <a class ="btn" href="camp_crud.php">Non</a>

</div>
<p>

</form>

<p>
</div>
<p>

</div>
<p>

   </body>
 </html>
