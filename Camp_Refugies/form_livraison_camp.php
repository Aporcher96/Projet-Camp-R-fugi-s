<?php require 'database_connexion.php';
$id = null;
if ( !empty($_GET['id']))
{
  $id = $_REQUEST['id'];
  }
  if (null==$id)
  {
    header("location: camp_crud.php");
  }


    $pdo2 = Database::connect();
    $pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql2 = "SELECT * FROM camp Where  IdCamp = :id_camp";
    $q= $pdo2->prepare($sql2);
    $q->bindParam(':id_camp',$id);
    $q->execute();
    $data= $q->fetch(PDO::FETCH_ASSOC);






        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM quantitecamp, materiel, camp Where materiel.idmateriel = quantitecamp.idmateriel and camp.idcamp = quantitecamp.idcamp and camp.IdCamp = $id and quantitecamp.alerteqtcamp = 1";
        $rep= $pdo->query($sql);

 ?>

<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <?php echo('<div class="alert alert-info">
  <strong>Info!</strong> Le camp de ' . $data['Ville'] . ' est à moins de 10% de sa quantité maximale pour le(s) ressource(s) suivante(s))
</div>');?>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
A7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E"
data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20"
alt="<script>" title="<script>" />
 </head>
 <body>
<br />
<div class="container">
<br />

  <form name="livraison" action="send_data_livraison_camp.php" method="post">

    <?php foreach($pdo ->query($sql) as $row_mat)
      {
        $nommateriel=$row_mat['NomMateriel'];
        echo('<input type="text" class="input" disabled name="'.$row_mat['IdMateriel'].'" value="' . $nommateriel . '"><br />') ;

        // $nommateriel=$row_mat['NomMateriel'];
        // echo('<input type="text" class="input" disabled name="'.$row_mat['IdMateriel'].'" value="' . $nommateriel . '"><br />') ;
        //
}
     ?>
      <div class="form-actions">
        <input type="submit" class="btn btn-success" name="submit" value="Valider votre commande">
        <a class="btn btn-danger" href="stock_centrale_crud.php">Retour</a>

</form>
  </div>

</form>


</div>

</body>
</html>
