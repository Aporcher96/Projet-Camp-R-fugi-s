<?php session_start(); ?>
<?php

				// on vérifie que le champ "Pseudo" n'est pas vide
				// empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
if(!isset($_SESSION['connexion'])){
				if(empty($_POST['pseudo']))
				{
					echo "Le champ Pseudo est vide.";echo'</br>';
					
				}
				if(empty($_POST['pass'])) 
				{
					echo "Le champ Mot de passe est vide.";echo'</br>';
					
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
							echo "Erreur de connexion à la base de données.";echo'</br>';
						} 
						else 
						{
							
							// on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:

							$Requete = mysqli_query($mysqli,"SELECT * FROM personnel WHERE login = '".$Pseudo."' AND mdp = '". $MotDePasse."'");

							// si il y a un résultat, mysqli_num_rows() nous donnera alors 1

							// si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat

							if(mysqli_num_rows($Requete) != 0) {
							
						            $reponse = $mysqli->query("SELECT * FROM personnel WHERE login = '".$Pseudo."' AND mdp = '". $MotDePasse."'");

									while ($donnees = $reponse->fetch_array(MYSQLI_ASSOC))
									{	
									$_SESSION['connexion']	='ok';
									 $_SESSION['pseudo']=$donnees['Login'];
									 $_SESSION['Role']=$donnees['Role'];
								
										
									}
								

									
							}else{
							
							 echo "Les identifiants sont incorrecte"."</br>";
							}
							
								
							}
						}
	
	

}
			include 'header.php';

 			if(!isset($_SESSION['connexion'])){
	
					echo "retourner a la page de connexion";
	
			}else{
				
				echo'vous etes connecté en tant que ';echo $_SESSION['Role'];}?>
			

