<?php require 'database_connexion.php';


  $id_nom_centrale = $_POST['NomCentrale'];


$pdo = Database::connect();
$sql = 'SELECT * FROM quantitecentrale'; // Notre requête de base qui recherche la table quantite centrale_sql
$rep = $pdo->query($sql);
// Requête servant à rechercher exclusivement le matériel qui n'existe pas dans la centrale précédemment sélectionné.
$mat_centrale_sql= "SELECT * FROM materiel WHERE materiel.NomMateriel Not in(Select NomMateriel from materiel, quantitecentrale, centrale where materiel.IdMateriel = quantitecentrale.IdMateriel and quantitecentrale.IdCentrale = $id_nom_centrale )";
$res_mat_centrale= $pdo->query($mat_centrale_sql);?>

<form name="MaterielForm" action="send_data_add_stock_centrale.php" method="post">

<?php echo '<input type="text" name="NomCentrale" value="'.$id_nom_centrale.'" /> <br/>'; ?>

Nom du Matériel:<br/>
<select name="NomMateriel">
  <?php foreach ($pdo->query($mat_centrale_sql) as $row){
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
