<?php require 'database_connexion.php';


  $id_ville_camp = $_POST['Ville'];
  $_SESSION['id_ville_camp']=   $id_ville_camp;

$pdo = Database::connect();
$sql = 'SELECT * FROM quantitecamp'; // Notre requête de base qui recherche la table quantite camp_sql
$rep = $pdo->query($sql);
// Requête servant à rechercher exclusivement le matériel qui n'existe pas dans le camp précédemment sélectionné.
$mat_camp_sql= "SELECT * FROM materiel WHERE materiel.NomMateriel Not in(Select NomMateriel from materiel, quantitecamp, camp where materiel.IdMateriel = quantitecamp.IdMateriel and quantitecamp.IdCamp = $id_ville_camp )";
$res_mat_camp= $pdo->query($mat_camp_sql);?>

<form name="MaterielForm" action="send_data_add_stock_camp.php" method="post">

<?php echo '<input type="text" name="id_ville_camp" value="'.$id_ville_camp.'" /> <br/>'; ?>

Nom du Matériel:<br/>
<select name="NomMateriel">
  <?php foreach ($pdo->query($mat_camp_sql) as $row){
    echo('<option value ='.$row['IdMateriel'].'>'.$row['NomMateriel'].'</option><br/>');
  }?>

</select>
  <p>

Quantité maximale: <br/>
  <input type="text" name="QuantiteMax" value="">
  <p>

  <input type="submit" name="" value="Valider">
  <input type="reset" name="" value="Annuler">
</form>
