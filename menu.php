<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta http-equiv="pragma" content="no-cache" />
		<title>Projet Réfugiés</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

		<!-- Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/animate.css" rel="stylesheet" >
		<!-- Squad theme CSS -->
		<link href="css/style.css" rel="stylesheet">
		<link href="color/default.css" rel="stylesheet">
		<link href="style index.css" rel="stylesheet">
		 
	</head>


	<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
	<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
					
						<h1>Projet Migrant</h1>
					
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
				  <ul class="nav navbar-nav">
					<li class="active"> <a href="Index.php">Acceuil</a></li>
					<li> <a href="Index.php">Déconnexion</a></li>


				  </ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

				
		<!-- Section: intro -->
		<section id="intro" class="intro">
	<?php	if(!isset($_SESSION['connexion'])){
		
				echo('<div class="slogan">
				<h4>Vous êtes connecté en tant que :  </h4>
	
			</div>');
	}
	else { 			
				echo('<div class="slogan">
				<h4>identifiant incorrecte </h4>
	
			</div>');
		
	}?>
			<center>




			
			
			
			
			
			
			

				<?php

							// on vérifie que le champ "Pseudo" n'est pas vide
							// empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
				if(!isset($_SESSION['connexion'])){
							if(empty($_POST['pseudo']))
							{
								echo '<p class="couleur_texte">Le champ Pseudo est vide.</p>';
							}
							if(empty($_POST['pass']))
							{
								echo '<p class="couleur_texte">Le champ Mot de passe est vide.</p>';
								

							}else{

									// les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:

									$Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL

									$MotDePasse = htmlentities($_POST['pass'],

									ENT_QUOTES, "ISO-8859-1");

									//on se connecte à la base de données:
									$mysqli = mysqli_connect("localhost", "root", "", "refugies_project");

									//on vérifie que la connexion s'effectue correctement:
									if(!$mysqli)
									{
										echo '<p class="couleur_texte">Erreur de connexion à la base de données.</p>';
										echo'</br>';
										
									}
									else
									{

										// on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:

										$Requete = mysqli_query($mysqli,"SELECT * FROM personnel WHERE Login = '".$Pseudo."' AND Mdp = '". $MotDePasse."'");

										// si il y a un résultat, mysqli_num_rows() nous donnera alors 1

										// si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat

										if(mysqli_num_rows($Requete) != 0) {

												$reponse = $mysqli->query("SELECT * FROM personnel WHERE Login = '".$Pseudo."' AND Mdp = '". $MotDePasse."'");

												while ($donnees = $reponse->fetch_array(MYSQLI_ASSOC))
												{
												$_SESSION['connexion']	='ok';
												 $_SESSION['pseudo']=$donnees['Login'];
												 $_SESSION['Role']=$donnees['Role'];
												}



										}else{
										
										echo '<p class="couleur_texte">Les identifiants sont incorrecte.</p>';
										 
										}


									}
								}



				}
						//include 'header.php';

						if(!isset($_SESSION['connexion'])){

								echo '<p class="couleur_texte">Veuillez retourner à la page de connexion.</p>';
				

						}else{

							
							echo $_SESSION['Role'];
							
							// Vérification du rôle de l'utilisateur et affichage du menu en fonction de ce dernier
							switch(Trim($_SESSION['Role'])){
								case "Personnel administratif" :
										?>
									<FORM>
										<h4><br><INPUT TYPE="button" NAME="Refugies" VALUE="ACCÉDEZ A LA GESTION DES RÉFUGIÉS DE VOTRE CAMP"></h4>										
									</FORM>
									<?php
								break;
							
								case "Administrateur" :
										?>
									<FORM>
										<h4><br><INPUT TYPE="button" NAME="Refugies" VALUE="ACCÉDEZ A LA GESTION DU PERSONNEL"></h4>
									</FORM>
									<?php
								break;
								
								case "Gestionnaire Camp" :
										?>
									<FORM>
										<h4><br><INPUT TYPE="button" NAME="Refugies" VALUE="ACCÉDEZ A LA GESTION DU STOCK DE VOTRE CAMP"></h4>
									</FORM>
									<?php
								break;
															
								case "Gestionnaire centrale" :
										?>
									<FORM>
										<h4><br><INPUT TYPE="button" NAME="Refugies" VALUE="ACCÉDEZ A LA GESTION DU STOCK DE VOTRE CENTRALE"></h4>
									</FORM>
									<?php
								break;
							
							}
						}	?>
			</center>
		</section>
		<!-- /Section: intro -->
		
		
				<!-- Core JavaScript Files -->
				<script src="js/jquery.min.js"></script>
				<script src="js/bootstrap.min.js"></script>
				<script src="js/jquery.easing.min.js"></script>
				<script src="js/jquery.scrollTo.js"></script>
				<script src="js/wow.min.js"></script>
				<!-- Custom Theme JavaScript -->
				<script src="js/custom.js"></script>
				

</body>
</html>