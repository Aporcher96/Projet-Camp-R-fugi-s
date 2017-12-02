<?php require 'database_connexion.php';
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

$pdo = Database::connect();

$sql = "SELECT * FROM quantitecamp Where IdMateriel = :id_materiel and IdCamp = :id_camp";
$q= $pdo->prepare($sql);
$q->bindParam(':id_materiel',$id_materiel);
$q->bindParam(':id_camp',$id_camp);
$data= $q->execute();

$v_quantite= $data['QtCamp'];
$v_quantite= $v_quantite - $_POST['Quantite_retire'];


$stmt = $pdo->prepare("UPDATE quantitecamp Set AlerteQtCamp=:AlerteQtCamp, QtCamp = :QtCamp, QuantiteMax=:QuantiteMax WHERE IdCamp=:IdCamp and IdMateriel = :IdMateriel");
$stmt->bindParam(':IdCamp', $IdCamp);
$stmt->bindParam(':IdMateriel', $IdMateriel);
$stmt-> bindParam(':AlerteQtCamp', $AlerteQtCamp);
$stmt-> bindParam(':QtCamp', $v_quantite);
$stmt-> bindParam(':QuantiteMax', $QuantiteMax);


$IdCamp=$_POST['id_ville_camp'];
$IdMateriel=$_POST['id_materiel_camp'];
$QuantiteMax=$_POST['QuantiteMax'];

$calcul_percent = (($QuantiteMax*10)/100);

if ($v_quantite <= $calcul_percent)
{
  $AlerteQtCamp=1;
}else{
  $AlerteQtCamp=0;
}

try{
  $stmt-> execute();
}catch(Exception $e){
  echo $e->getMessage;
}




  //header('Location: stock_camp_crud.php');





?>
