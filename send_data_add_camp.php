<?php

include 'database_connexion.php';

$pdo = Database::connect();

$stmt = $pdo->prepare("INSERT INTO Camp (IdCamp, NbPlacesMax, NbPlacesDispo, Ville, IdCentrale, Alerte_Stock, Alerte_Surpop, IdNationalite) VALUES(:IdCamp, :NbPlacesMax, :NbPlacesDispo, :Ville, :IdCentrale,  :Alerte_Stock,:Alerte_Surpop, :IdNationalite) ");
$stmt->bindParam(':IdCamp', $IdCamp);
$stmt->bindParam(':NbPlacesMax', $NbPlacesMax);
$stmt->bindParam(':NbPlacesDispo', $NbPlacesDispo);
$stmt->bindParam(':Ville', $Ville);
$stmt->bindParam(':IdCentrale', $IdCentrale);
$stmt->bindParam(':Alerte_Stock', $Alerte_Stock);
$stmt->bindParam(':Alerte_Surpop', $Alerte_Surpop);
$stmt->bindParam(':IdNationalite', $IdNationalite);
//$stmt->bindParam(':Nom_Centrale', $Nom_Centrale);

$NbPlacesMax = $_POST['NbPlacesMax'];
$NbPlacesDispo = $NbPlacesMax;
$Ville = $_POST['Ville'];
$IdNationalite = $_POST['Pays'];
$Alerte_Stock = 1;
$Alerte_Surpop = 1;
$IdCentrale = $_POST['NomCentrale'];

try {
  $stmt->execute();
  echo 'coucou';
} catch (Exception $e) {
  echo $e->getMessage;
}

header('Location: camp_crud.php');
 ?>
