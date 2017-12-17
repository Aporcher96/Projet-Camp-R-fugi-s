<?php

require 'database_connexion.php';
$id = null;
if (!empty($_GET['id']))
{
  $id = $_REQUEST['id'];
}
 if (null==$id)
  {
   header("Location: camp_crud.php");
 }

$pdo = Database::connect();


$stmt = $pdo->prepare("UPDATE Camp SET NbPlacesMax = :NbPlacesMax, NbPlacesDispo = :NbPlacesDispo WHERE IdCamp = $id ");


$stmt->bindParam(':NbPlacesMax', $NbPlacesMax);
$stmt->bindParam(':NbPlacesDispo', $NbPlacesDispo);


$NbPlacesMax = $_POST['NbPlacesMax'];
$NbPlacesDispo = $_POST['NbPlacesDispo'];



try {
  $stmt->execute();
} catch (Exception $e) {
  echo $e->getMessage;
}

   header("Location: camp_crud.php");

 ?>
