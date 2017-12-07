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


include 'database_connexion.php';



$stmt = $pdo->prepare("UPDATE Camp SET NbPlacesMax = :NbPlacesMax, NbPlacesDispo = :NbPlacesDispo, Pays= :Pays, Ville = :Ville, Alerte_Stock = :Alerte_Stock, Alerte_Surpop= :Alerte_Surpop, Nom_Centrale: =Nom_Centrale
                      WHERE IdCamp = $id ");

$stmt->bindParam(':NbPlacesMax', $NbPlacesMax);
$stmt->bindParam(':NbPlacesDispo', $NbPlacesDispo);
$stmt->bindParam(':Ville', $Ville);
$stmt->bindParam(':Pays', $Pays);
$stmt->bindParam(':Alerte_Stock', $Alerte_Stock);
$stmt->bindParam(':Alerte_Surpop', $Alerte_Surpop);
$stmt->bindParam(':Nom_Centrale', $Nom_Centrale);

$NbPlacesMax = $post['NbPlacesMax'];
$NbPlacesDispo = $post['NbPlacesDispo'];
$Ville = $post['Ville'];
$Pays = $post['Pays'];
$Alerte_Stock = $post['Alerte_Stock'];
$Alerte_Surpop = $post['Alerte_Surpop'];
$Nom_Centrale = $post['Nom_Centrale'];

try {
  $stmt->execute();
} catch (Exception $e) {
  echo $e->getMessage;
}
echo "<div align='center'>";
echo "<font face='Verdana' siez='3' >Le camp a bien été rajouté ! </font> ";
echo"</div>";


 ?>
