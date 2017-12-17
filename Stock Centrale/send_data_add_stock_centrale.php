<?php

include 'database_connexion.php';

$pdo = Database::connect();


$stmt = $pdo->prepare("INSERT INTO quantitecentrale (IdCentrale, IdMateriel, AlerteQtCentrale, QtCentrale, QuantiteMax) Values (:IdCentrale, :IdMateriel, :AlerteQtCentrale, :QtCentrale, :QuantiteMax)");
$stmt->bindParam(':IdCentrale', $IdCentrale);
$stmt->bindParam(':IdMateriel', $IdMateriel);
$stmt-> bindParam(':AlerteQtCentrale', $AlerteQtCentrale);
$stmt-> bindParam(':QtCentrale', $QtCentrale);
$stmt-> bindParam(':QuantiteMax', $QuantiteMax);

$IdCentrale=$_POST['NomCentrale'];
$IdMateriel=$_POST['NomMateriel'];
$QtCentrale=0;
$QuantiteMax=$_POST['QuantiteMax'];
$calcul_percent = (($QuantiteMax*10)/100);



if ($QtCentrale <= $calcul_percent)
{
  $AlerteQtCentrale=1;
}else{
  $AlerteQtCentrale=0;
}
echo 'coucou';
try{
  $stmt-> execute();
  echo 'coucou';
}catch(Exception $e){
  echo $e->getMessage;
}


header('Location: stock_centrale_crud.php');


/*


echo"<div align='center'>";
echo"<font face ='Verdana' size='3' > L'élément a bien été inséré!</font>";
echo"</div>";*/



 ?>
