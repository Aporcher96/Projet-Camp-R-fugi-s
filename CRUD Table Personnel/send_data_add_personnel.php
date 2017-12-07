<?php

include 'database_connexion.php';

$pdo = Database::connect();

$stmt = $pdo->prepare("INSERT INTO personnel (Login, Mdp, Role) VALUES (:Login, :Mdp, :Role)")
$stmt->bindParam(':Login', $login);
$stmt->bindParam(':Mdp', $mdp);
$stmt->bindParam(':Role', $role);

$login=$_POST['Login'];
$mdp=$_POST['Mdp'];
$role=$_POST['Role'];

try {
	$stmt->execute();
} catch(Exception $e) {
	echo $e->getMessage;
}
echo "<div align'center'>";
echo "<font face='Verdana' size='3' >L'élément a bien été inséré !</font>";
echo "</div>";

?>