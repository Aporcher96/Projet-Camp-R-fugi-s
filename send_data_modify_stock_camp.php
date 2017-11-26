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
$v_quantite=

$stmt = $pdo->prepare("UPDATE quantitecamp Set AlerteQtCamp=:AlerteQtCamp, QtCamp = :QtCamp, QuantiteMax=:QuantiteMax WHERE IdCamp=$id_camp and IdMateriel = $id_materiel");
$stmt->bindParam(':IdCamp', $IdCamp);
$stmt->bindParam(':IdMateriel', $IdMateriel);
$stmt-> bindParam(':AlerteQtCamp', $AlerteQtCamp);
$stmt-> bindParam(':QtCamp', $QtCamp);
$stmt-> bindParam(':QuantiteMax', $QuantiteMax);

$IdCamp=$_POST['id_ville_camp'];
$IdMateriel=$_POST['id_materiel_camp'];
$QuantiteMax=$_POST['QuantiteMax'];
while ($_POST['Quantite']>$_POST['QuantiteMax']){

}
$QtCamp=$_POST['Quantite'];

$calcul_percent = (($QuantiteMax*10)/100);



if ($QtCamp <= $calcul_percent)
{
  $AlerteQtCamp=1;
}else{
  $AlerteQtCamp=0;
}

try{
  $stmt-> execute();
  echo 'coucou';
}catch(Exception $e){
  echo $e->getMessage;
}

echo $IdCamp;
echo $IdMateriel;
echo $QtCamp;
echo $QuantiteMax;
echo $AlerteQtCamp;


  header('Location: stock_camp_crud.php');





?>
