<?php require('database_connexion.php');
$id = null ;
if (!empty($_GET['id']))
{
  $id = $_REQUEST['id'];
}
if (null == $id)
 {
  header('location:camp_crud.php');
}else{
  $pdo = Database::connect();
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql ="SELECT * FROM camp where IdCamp=$id";
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    $data = $q->fetch(PDO::FETCH_ASSOC);

    $pdo_centrale = Database::connect();
    $pdo_natio = Database::connect();
    $nation_sql = 'SELECT * FROM nationalite';
    $rep_natio = $pdo->query($nation_sql);
    $centrale_sql = 'SELECT * FROM centrale';
    $rep_centrale = $pdo->query($centrale_sql);

  Database::disconnect();
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
         class="mce-object"
         width="20" height="20"
         alt="<script>"
           title="<script>" />
  </head>

  <body>


<br/>
<div class="container">

<br/>
<div class="span10 offset1">

<br/>
<div class="row">

<br/>
<?php echo '<h3>Affichage du camp de la ville de: ' . $data['Ville']. '</h3>'; ?>
<p>

</div>
<p>

<br/>
<div class="from-horizontal">

<br/>
<div class = "control-group">
        <label class = "control-label">NbPlacesMax:</label>

<br/>
<div class = "controls">
        <label class ="checkbox">
            <?php echo $data['NbPlacesMax'] ?>
        </label>
</div>
<p>

</div>
<p>


  <br/>
  <div class = "control-group">
          <label class = "control-label">NbPlacesDispo:</label>

  <br/>
  <div class = "controls">
          <label class ="checkbox">
              <?php echo $data['NbPlacesDispo'] ?>
          </label>
</div>
<p>

</div>
<p>

    <br/>
    <div class = "control-group">
            <label class = "control-label">Ville:</label>

    <br/>
    <div class = "controls">
            <label class ="checkbox">
                <?php echo $data['Ville'] ?>
            </label>
</div>
<p>

</div>
<p>

<br/>
<div class = "control-group">
          <label class = "control-label">Centrale:</label>

<br/>
<div class = "controls">
          <label class ="checkbox">
              <?php
                foreach ($pdo_centrale->query($centrale_sql) as $row_centrale)
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

  <br/>
  <div class = "control-group">
          <label class = "control-label">AlerteStock:</label>

  <br/>
  <div class = "controls">
          <label class ="checkbox">
              <?php
                  if ($data['Alerte_Stock']==1)
                  {
                    echo ('Oui');
                  }else {
                    echo('Non');
                  }
              ?>
          </label>
  </div>
  <p>

  </div>
  <p>

    <br/>
    <div class = "control-group">
            <label class = "control-label">AlerteSurpop:</label>

    <br/>
    <div class = "controls">
            <label class ="checkbox">
                <?php
                    if ($data['Alerte_Surpop']==1)
                    {
                      echo ('Oui');
                    }else {
                      echo('Non');
                    }
                ?>
            </label>
    </div>
    <p>

    </div>
    <p>

<br/>
<div class = "control-group">
          <label class = "control-label">Pays:</label>

<br/>
<div class = "controls">
          <label class ="checkbox">
              <?php
                foreach ($pdo_natio->query($nation_sql) as $row_natio)
                {
                  if ($row_natio['IdNationalite']==$data['IdNationalite'])
                  {
                    $nom_natio=$row_natio['NomPays'];
                  }
                }
                echo $nom_natio;

              ?>
          </label>
</div>
<p>

</div>
<p>


 <br/>
 <div class ="form-actions">
                <a class = "btn" href="camp_crud.php">Retour</a>

</div>
<p>

</div>
<p>

</div>
<p>


  </body>
</html>
