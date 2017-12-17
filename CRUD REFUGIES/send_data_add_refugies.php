<?php
	require ('database_connexion.php');
	$pdo= Database::connect();
	$stmt = $pdo->prepare("INSERT INTO refugies (Nom, Prenom, DateNaiss, Illetre, Blesse, Conscient, IdNationalite, IdCamp) VALUES (:Nom, :Prenom, :DateNaiss, :Illetre, :Blesse, :Conscient, :IdNationalite, :IdCamp)");
	$stmt->bindParam(':Nom', $nom);
	$stmt->bindParam(':Prenom', $prenom);
	$stmt->bindParam(':DateNaiss', $date_naiss);
	$stmt->bindParam(':Illetre', $illetre);
	$stmt->bindParam(':Blesse', $blesse);
	$stmt->bindParam(':Conscient', $conscient);
	$stmt->bindParam(':IdNationalite', $idnationalite);
	$stmt->bindParam(':IdCamp', $idCamp);
	$errornom=0;
	$errorprenom=0;


	$nom=$_POST['Nom'];
	$prenom=$_POST['Prenom'];
	$date_naiss=$_POST['DateNaiss'];
	$illetre=$_POST['Illetre'];
	$blesse=$_POST['Blesse'];
	$conscient=$_POST['Conscient'];
	$idnationalite=$_POST['Nationalite'];
	$idCamp=$_POST['Camp'];

	if (((ctype_alpha($_POST['Nom']))==false) || (empty($_POST['Nom'])) || (strlen($_POST['Nom'])>25))
	{
		$errornom=1;
	}
	if (((ctype_alpha($_POST['Prenom']))==false) || (empty($_POST['Prenom'])) || (strlen($_POST['Prenom'])>25))
	{
		$errorprenom=1;
	}



	if (($errornom == 1) || ($errorprenom == 1))
	{?>
		<div class="alert alert-warning">
  <strong>ATTENTION!</strong> Format de saisie incorrecte, merci de respecter la casse. <a href="form_add_refugies.php" class="alert-link"> Cliquez ici pour retourner en arrière.</a>.
</div>
<?php
	}
	else{
		try {
			$stmt-> execute();
		}catch(Exception $e){
			echo $e->getMessage;
		}

			header('Location: refugies_crud.php');

	}

?>
