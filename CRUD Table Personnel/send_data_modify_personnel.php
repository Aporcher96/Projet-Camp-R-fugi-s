<?php

require 'database_connexion.php';
$id = null;
$flagcamp =false;
$flagCentral =false;

if ( !empty($_GET['id']))
{
	$id = $_REQUEST['id'];
}

if ( null==$id )
{

	header("Location: personnel_crud.php");
}

//include 'database_connexion.php';

$pdo = Database::connect();
$pdo1 = Database::connect();
$pdo2 = Database::connect();
$pdo_postcamp = Database::connect();
$pdo_posycentrale = Database::connect();



$postcampsql ='SELECT * from postecamp';
$postcamprep = $pdo_postcamp->query($postcampsql);

$postcentralsql ='SELECT * from postecentrale';
$postcentralrep = $pdo_posycentrale->query($postcentralsql);

foreach ($pdo_postcamp->query($postcampsql) as $row_postcamp) {
if($row_postcamp['IdPersonnel']==$id){
	$flagcamp=true;
	break;
}}

foreach ($pdo_posycentrale->query($postcentralsql) as $row_postcentral) {
if($row_postcentral['IdPersonnel']==$id){
	$flagCentral=true;
	break;
}}




$login = $_POST['Login'];
$mdp= $_POST['Mdp'];
$role= $_POST['Role'];
$idcentrale= $_POST['Centrale'];
$idcamp= $_POST['Camp'];


$stmt = $pdo->prepare("UPDATE personnel SET Login = :Login, Mdp = :Mdp, Role = :Role, WHERE IdPersonnel = $id");
$stmt->bindParam(':Login', $login);
$stmt->bindParam(':Mdp', $mdp);
$stmt->bindParam(':Role', $role);

if($idcentrale!="vide"){
	if($flagCentral){

		echo($id);
		echo($idcentrale);
		$stmt1 = $pdo1->prepare("UPDATE postecentrale SET IdCentrale=:idcentrale WHERE IdPersonnel = $id");
		$stmt1->bindParam(':idcentrale', $idcentrale);
	}else{
		$stmt1 = $pdo1->prepare("INSERT INTO postecentrale(IdCentrale ,IdPersonnel) VALUES(:idcentrale,:id)");
		$stmt1->bindParam(':idcentrale', $idcentrale);
		$stmt1->bindParam(':id',$id);}
}else{
	$stmt1 = $pdo1->prepare("DELETE FROM postecentrale where IdPersonnel = $id");
}


if($idcamp!="vide"){
	if($flagcamp){
		$stmt2 = $pdo2->prepare("UPDATE postecamp SET IdCamp=:idcamp WHERE IdPersonnel = $id");
		$stmt2->bindParam(':idcamp', $idcamp);
	}else{
		$stmt2 = $pdo2->prepare("INSERT INTO postecamp(IdCamp,idPersonnel) VALUES(:idcamp,:id) ");
		$stmt2->bindParam(':idcamp', $idcamp);
		$stmt2->bindParam(':id', $id);}
}else{
	$stmt2 = $pdo2->prepare("DELETE FROM postecamp where IdPersonnel = $id");
}


try{
$stmt-> execute();

	  $stmt1-> execute();


		  $stmt2-> execute();

			header("Location: personnel_crud.php");


}catch(Exception $e){
  echo $e->getMessage;
}


?>
