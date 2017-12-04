<?php
	require ('database_connexion.php');
	$pdo= Database::connect();
	$stmt = $pdo->prepare("INSERT INTO refugies (Nom, Prenom, DateNaiss, Illetre, Blesse, Conscient, IdNationalite, IdCamp) VALUES (:Nom, :Prenom, :DatenNaiss, :Illetre, :Blesse, :Conscient, :IdNationalite, :IdCamp)");
	$stmt->bindParam(':Nom', $nom);
	$stmt->bindParam(':Prenom', $prenom);
	$stmt->bindParam(':DateNaiss', $date_naiss);
	$stmt->bindParam(':Illetre', $illetre);
	$stmt->bindParam(':Blesse', $blesse);
	$stmt->bindParam(':Conscient', $conscient);
	$stmt->bindParam(':IdNationalite', $idnationalite);
	$stmt->bindParam(':IdCamp', $idCamp);
	
	
	$nom=$_POST['Nom'];
	$prenom=$_POST['Prenom'];
	$date_naiss=$_POST['DateNaiss'];
	$illetre=$_POST['Illetre'];
	$blesse=$_POST['Blesse'];
	$conscient=$_POST['Conscient'];
	$idnationalite=$_POST['Nationalite'];
	$idCamp=$_POST['Camp'];
	
	try {
		$stmt-> execute();
	}catch(Exception $e){
		echo $e->getMessage;
	}
	echo"<div align='center'>";
	echo"<font face='Verdana' size='3' > L'élément a bien été inséré !</font>";
	echo"</div>";
?>