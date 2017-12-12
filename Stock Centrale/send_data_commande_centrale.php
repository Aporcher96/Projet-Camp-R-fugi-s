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

$pdo = Database::connect();

$sql = "SELECT * FROM quantitecentrale Where IdMateriel = :id_materiel and IdCentrale = :id_centrale";
$q= $pdo->prepare($sql);
$q->bindParam(':id_materiel',$id_materiel);
$q->bindParam(':id_centrale',$id_centrale);
$data= $q->execute();

$v_quantite= $_POST['Qt_possede'];
$v_quantite= $v_quantite - $_POST['Quantite_retire'];


$stmt = $pdo->prepare("UPDATE quantitecentrale Set AlerteQtCentrale=:AlerteQtCentrale, QtCentrale = :QuantiteMax, QuantiteMax=:QuantiteMax WHERE IdCentrale=:IdCentrale and IdMateriel = :IdMateriel");
$stmt->bindParam(':IdCentrale', $IdCentrale);
$stmt->bindParam(':IdMateriel', $IdMateriel);
$stmt-> bindParam(':AlerteQtCentrale', $AlerteQtCentrale);
$stmt-> bindParam(':QtCentrale', $v_quantite);
$stmt-> bindParam(':QuantiteMax', $QuantiteMax);


$IdCentrale=$_POST['id_ville_centrale'];
$IdMateriel=$_POST['id_materiel_centrale'];
$QuantiteMax=$_POST['QuantiteMax'];

$calcul_percent = (($QuantiteMax*10)/100);

$AlerteQtCentrale = 0;

try{
  $stmt-> execute();
}catch(Exception $e){
  echo $e->getMessage;
}





  header('Location: stock_centrale_crud.php');





?>
