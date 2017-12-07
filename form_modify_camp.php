<?php require 'database_connexion.php';
$id = null;
if ( !empty($get['id']))
{
  $id = $_request['id'];
  }
  if (null==$id)
  {
    header("location: camp_crud.php");
  }

        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM camp WHERE Idcamp = $id";
        $sql_natio ="SELECT * FROM nationalite";
        $sql_camp = "SELECT * FROM centrale";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        $NbPlacesMax = $data['NbPlacesMax'];
        $NbPlacesDispo = $data['NbPlacesDispo'];
        $Pays = $data['Pays'];
        $Ville = $data['Ville'];
        $Alerte_Stock = $data['Alerte_Stock'];
        $Alerte_Surpop = $data['Alerte_Surpop'];
        $Nom_Centrale = $data['Nom_Centrale'];
        Database::disconnect();



 ?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta http-equiv="content-type" content="text/html;charset=UTF-8">
     <title>Modification d'un Camp</title>
     <link rel="stylesheet" href="/css/bootstrapmin.css">
     <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
A7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E"
data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20"
alt="<script>" title="<script>" />

   </head>
   <body>

<br/>
<div class="container">

  <br/>
  <div class = "span10 offset1">

  <br/>
  <div class = "row">

<br/>
<h3>Modifier un Camp</h3>
<p>

</div>
<p>

<br/>
<form method="post" action="send_data_modify_camp.php?id=<?php echo $id.;?>">

<br/>
<div class="control-group">
                <label class="control-label">NbPlacesMax:</label>

<br/>
<div class="controls">
            <input type="text" name="NbPlacesMax" placeholder="NbPlacesMax" value="<?php  echo!empty($NbPlacesMax) ? $NbPlacesMax : '';  ?>">

</div>
<p>


</div>
<p>

<br/>
<div class="control-group">
                  <label class="control-label">NbPlacesDispo:</label>

<br/>
<div class="controls">
              <input type="text" name="NbPlacesDispo" placeholder="NbPlacesDispo" value="<?php  echo!empty($NbPlacesDispo) ? $NbPlacesDispo : '';  ?>">

</div>
  <p>


</div>
  <p>

<br/>
<div class="control-group">
                    <label class="control-label">Ville:</label>

<br/>
<div class="controls">
                <input type="text" name="Ville" placeholder="Ville" value="<?php  echo!empty($Ville) ? $Ville : '';  ?>">

</div>
<p>


</div>
<p>

<br/>
<div class="control-group">
                  <label class="control-label">Pays:</label>

<br/>
<div class="controls">
              <input type="text" name="Pays" placeholder="Pays" value="<?php  echo!empty($Pays) ? $Pays : '';  ?>">

</div>
<p>


</div>
<p>

<br/>
<div class="control-group">
                  <label class="control-label">Alerte_Stock:</label>

<br/>
<div class="controls">
              <select name="Alerte_Stock">
              <?php if ($data['Alerte_Stock']==){ ?>
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

  <br/>
  <div class="control-group">
                    <label class="control-label">Alerte_Surpop:</label>

  <br/>
  <div class="controls">
                <select name="Alerte_Surpop">
                <?php if ($data['Alerte_Surpop']==){ ?>
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

<br/>
<div class="form-actions">

          <input type="submit" class="btn btn-success" href="camp_crud.php" name="submit" value="Envoyer">
          <a class="btn" href="camp_crud.php">Retour</a>

</div>
<p>

          </form>
<p>



</div>
<p>



   </body>
 </html>
