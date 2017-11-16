<?php
require 'database_conneion.php';
$id = null;
if (!empty($_GET["id"]))
{
	$id = $_REQUEST["id"];
}
if(null==$id)
{
	header("Location: refugies_crud.php");
}

$pdo = Database::connect();

$stmt = $pdo->prepare("UPDATE refugies SET Nom = :Nom, Prenom= :Prenom, DateNaiss= :DateNaiss, Illetre= :Illetre, Blesse= :Blesse, Conscient= :Conscient, IdNationalite= :IdNationalite, IdCamp= :IdCamp WHERE IdRefugies = $id");
