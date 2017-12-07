<?php

include 'database_connexion.php';

$pdo = Database::connect();

$stmt = $pdo->prepare("INSERT INTO Camp (NbPlacesMax, NbPlacesDispo, Pays, Ville, Alerte_Stock, Alerte_Surpop, Nom_Centrale) VALUES(:NbPlacesMax, :NbPlacesDispo, :Pays, :Ville, :, :Conscient, :IdNationalite, :IdCamp) ")
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
