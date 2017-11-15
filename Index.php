<?php session_start(); ?>


<!DOCTYPE html>

<html lang ="fr">
<head>
<meta charset ="utf-8">

<title> refugee </title>
</head>



<body>

		
		<?php if(isset($_SESSION['connexion'])){
		echo'Bienvenue';
		echo '<br>';
		echo'<a href="menu.php">menu principal</a>';
		}else{
	
		echo '<a href="form_connexion.php" >connexion</a>';} ?>

		
		
		<p> ca dépend de vous ! </p>
		<a href = "don.php"><h3>faire un don</h3></a>



</body>
</html>