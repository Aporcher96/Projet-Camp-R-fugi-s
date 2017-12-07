<?php
require ('database_connexion.php');
$id = null;
$errornom = 0;
$errorprenom=1;
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

$stmt = $pdo->prepare("UPDATE refugies SET Nom = :Nom, Prenom= :Prenom, DateNaiss= :DateNaiss, Illetre= :Illetre, Blesse= :Blesse, Conscient= :Conscient, IdNationalite= :IdNationalite, IdCamp= :IdCamp WHERE IdRefugies = $id");

