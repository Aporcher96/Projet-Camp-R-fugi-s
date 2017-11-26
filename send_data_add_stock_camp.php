<?php

include 'database_connexion.php';

$pdo = Database::connect();


$stmt = $pdo->prepare("INSERT INTO quantitecamp (IdCamp, IdMateriel, AlerteQtCamp, QtCamp, QuantiteMax) Values (:IdCamp, :IdMateriel, :AlerteQtCamp, :QtCamp, :QuantiteMax)");
$stmt->bindParam(':IdCamp', $IdCamp);
$stmt->bindParam(':IdMateriel', $IdMateriel);
$stmt-> bindParam(':AlerteQtCamp', $AlerteQtCamp);
$stmt-> bindParam(':QtCamp', $QtCamp);
$stmt-> bindParam(':QuantiteMax', $QuantiteMax);

$IdCamp=$_POST['id_ville_camp'];
$IdMateriel=$_POST['NomMateriel'];
$QtCamp=0;
$QuantiteMax=$_POST['QuantiteMax'];
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

/*


echo"<div align='center'>";
echo"<font face ='Verdana' size='3' > L'élément a bien été inséré!</font>";
echo"</div>";*/



 ?>
