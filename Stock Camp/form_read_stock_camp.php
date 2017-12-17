<?php require ('database_connexion.php');

$id_camp = null;
$id_materiel = null;

if (!empty($_GET['id']))
{

  $chiffre=str_split($_GET['id']);
  $id_camp = $chiffre[0];

}

if (!empty($_GET['id']))
{
  $chiffre=str_split($_GET['id']);
  $id_materiel = $chiffre[1];

}

/*  $pdo = Database::connect();
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM quantitecamp where IdCamp = $id_camp and IdMateriel = $id_materiel";
  $q = $pdo->prepare($sql);
  $q->execute(array($id_camp, $idmateriel));
  $data = $q-> fetch(PDO::FETCH_ASSOC);

  $pdo_*/
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM quantitecamp , materiel Where quantitecamp.IdMateriel = :id_materiel and IdCamp = :id_camp";
  $q= $pdo->prepare($sql);
  $q->bindParam(':id_materiel',$id_materiel);
  $q->bindParam(':id_camp',$id_camp);
  $q->execute();


  $sql_camp= "SELECT * FROM camp, quantitecamp where camp.Idcamp=quantitecamp.Idcamp and camp.IdCamp=:id_camp";
  $q_camp= $pdo->prepare($sql_camp);
  $q_camp->bindParam(':id_camp',$id_camp);
  $q_camp->execute();



  $data= $q->fetch(PDO::FETCH_ASSOC);
  $data_camp = $q_camp->fetch(PDO::FETCH_ASSOC);

  $nom_materiel= $data['IdMateriel'];
  $quantiteMax = $data['QuantiteMax'];
  Database::disconnect();

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

<br/>
<div class="form-horizontal">

  <br/>
  <div class="control-group">
    <label class="control-label">Ville</label>

  <br/>
  <div class="controls">
          <label class="checkbox">
              <?php echo $data_camp['Ville']; ?>
          </label>

  </div>
  <p>


    </div>



    <br/>
    <div class="control-group">
      <label class="control-label">Nom du materiel</label>

    <br/>
    <div class="controls">
            <label class="checkbox">
                <?php echo $data['NomMateriel']; ?>
            </label>

    </div>
    <p>


      </div>


      <br/>
      <div class="control-group">
        <label class="control-label">Quantite actuelle</label>

      <br/>
      <div class="controls">
              <label class="checkbox">
                  <?php echo $data['QtCamp']; ?>
              </label>

      </div>
      <p>


        </div>


        <br/>
        <div class="control-group">
          <label class="control-label">Quantite max</label>

        <br/>
        <div class="controls">
                <label class="checkbox">
                    <?php echo $data['QuantiteMax']; ?>
                </label>

        </div>
        <p>


          </div>

          <br/>
          <div class="control-group">
            <label class="control-label">Alerte</label>

          <br/>
          <div class="controls">
                  <label class="checkbox">
                      <?php if ($data['AlerteQtCamp']==0) {echo "non";} else {echo "oui";} ?>
                  </label>

          </div>
          <p>


            </div>



















    <p>

      <br/>
      <div class="control-group">
              <label class="checkbox"></label>

      </div>
  </div>