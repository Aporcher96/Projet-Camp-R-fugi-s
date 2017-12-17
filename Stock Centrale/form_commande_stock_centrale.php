<?php require 'database_connexion.php';
$id_centrale = null;
$id_materiel = null;

if (!empty($_GET['id']))
{

  $chiffre=str_split($_GET['id']);
  $id_centrale = $chiffre[0];

}

/*if (null==$id_camp)
{

  header("Location: stock_camp_crud.php");
  echo 'coucou';
}*/

if (!empty($_GET['id']))
{
  $chiffre=str_split($_GET['id']);
  $id_materiel = $chiffre[1];

}




/*
if (null==$id_materiel)
{
  header("Location: stock_camp_crud.php");
}*/

      $pdo = Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "SELECT * FROM quantitecentrale Where IdMateriel = :id_materiel and IdCentrale = :id_centrale";
      $q= $pdo->prepare($sql);
      $q->bindParam(':id_materiel',$id_materiel);
      $q->bindParam(':id_centrale',$id_centrale);
      $q->execute();

      $sql_materiel =" SELECT * FROM materiel, quantitecentrale Where materiel.IdMateriel=quantitecentrale.IdMateriel";
      $mat_centrale_sql= $pdo->query($sql_materiel);
      $sql_centrale= "SELECT * FROM centrale, quantitecentrale where centrale.IdCentrale=quantitecentrale.IdCentrale";
      $centrale= $pdo->query($sql_centrale);

      $data= $q->fetch(PDO::FETCH_ASSOC);
      $nom_materiel= $data['IdMateriel'];
      $quantiteMax = $data['QuantiteMax'];
      Database::disconnect();

 ?>

<!DOCTYPE html>
<html>
 <head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
 <title>Mofication du stock</title>
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
<?php foreach($pdo->query($sql_centrale) as $row_centrale)
{
  If ($row_centrale['IdCentrale']==$data['IdCentrale'])
  {
    $nomdelacentrale=$row_centrale['NomCentrale'];}}

     echo '<h3>Confirmation de commande de la centrale: ' .$nomdelacentrale.'</h3>';
 ?>
<?php
foreach($pdo->query($sql_materiel) as $row_mat_centrale)
{
  If ($row_mat_centrale['IdMateriel']==$data['IdMateriel'])
  {
    $nommateriel=$row_mat_centrale['NomMateriel'];}}

     echo 'Vous souhaitez commander le matériel suivant: ' .$nommateriel;
 ?>

</div>
<br />

<form action="send_data_commande_centrale.php" method="post">

  <?php echo '<input type="hidden" name="id_ville_centrale" value="'.$data['IdCentrale'].'" /> '; ?>


  <?php echo '<input type="hidden" name="id_materiel_centrale" value="'.$data['IdMateriel'].'" /> '; ?>



    <div class="control-group">



    <div class="controls">
          <?php echo '<input type="hidden" name="Qt_possede" value="'.$data['QtCentrale'].'"readonly="readonly">  '; ?>
    </div>

    </div>


  <div class="control-group">


  <div class="controls">
        <input type="hidden" name="Quantite_retire" value="">
  </div>

  </div>

      <div class="control-group">

          <div class="controls">
                <input type="hidden" name="QuantiteMax" value="<?php echo!empty ($quantiteMax) ? $quantiteMax : '';?>">

  <div class="form-actions">
    <input type="submit" class="btn btn-success" name="submit" value="Valider votre commande">
    <a class="btn btn-danger" href="stock_centrale_crud.php">Retour</a>

  </div>

</form>


</div>

</body>
</html>
