<?php

require 'database_connexion.php';
$id = null;

if ( !empty($_GET['id']))
{
	$id = $_REQUEST['id'];
}

if ( null=$id )
{
	header("Location: personnel_crud.php");
}

//include 'database_connexion.php';

$pdo = Database::connect();

$stmt = $pdo->prepare("UPDATE personnel SET Login = :Login, Mdp = :Mdp, Role = :Role, IdPersonnel = :IdPersonnel, IdCamp = :IdCamp WHERE IdPersonnel = $id")
$stmt->bindParam(':Login', $login);
$stmt->bindParam(':Mdp', $mdp);
$stmt->bindParam(':Role', $role);
$stmt->bindParam(':IdCentrale', $idcentrale);
$stmt->bindParam(':IdCamp', $idcamp);

?>
