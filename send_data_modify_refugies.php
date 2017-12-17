<?php
require ('database_connexion.php');
$id = null;
$errornom = 0;
$errorprenom=0;

if (!empty($_GET["id"]))
{
	$id = $_REQUEST["id"];
}
if(null==$id)
{
	header("Location: refugies_crud.php");
}
if (((ctype_alpha($_POST['Nom']))==false) || (empty($_POST['Nom'])) || (strlen($_POST['Nom'])>25))
{
	$errornom=1;
}
if (((ctype_alpha($_POST['Prenom']))==false) || (empty($_POST['Prenom'])) || (strlen($_POST['Prenom'])>25))
{
	$errorprenom=1;
}
if (($errornom == 1) || ($errorprenom == 1))
{
	echo"L'élément n'a pas été modifié, veuillez respecter la casse !<br/>";
	echo"<input type='button' value='Retour' onClick='form_modify_refugies.php'>";
}
$pdo = Database::connect();

$stmt = $pdo->prepare("UPDATE refugies SET Nom = :Nom, Prenom= :Prenom, DateNaiss= :DateNaiss, Illetre= :Illetre, Blesse= :Blesse, Conscient= :Conscient, IdNationalite= :Nationalite, IdCamp= :Camp WHERE IdRefugies = $id");

$stmt->bindParam(':Nom', $nom);
$stmt->bindParam(':Prenom', $prenom);
$stmt->bindParam(':DateNaiss', $datenaiss);
$stmt->bindParam(':Illetre', $illetre);
$stmt->bindParam(':Blesse', $blesse);
$stmt->bindParam(':Conscient', $conscient);
$stmt->bindParam(':Nationalite', $idnationalite);
$stmt->bindParam(':Camp', $idcamp);

$nom=$_POST['Nom'];
$prenom=$_POST['Prenom'];
$datenaiss=$_POST['DateNaiss'];
$illetre=$_POST['Illetre'];
$blesse=$_POST['Blesse'];
$conscient=$_POST['Conscient'];
$idnationalite=$_POST['Nationalite'];
$idcamp=$_POST['Camp'];

try {
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage;
}
header("Location: refugies_crud.php");
?>
