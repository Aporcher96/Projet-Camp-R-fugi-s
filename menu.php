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
							// on ouvre la session avec $_SESSION:
							
								$_SESSION['connexion'] ='ok';
								$_SESSION['pseudo'] = $Pseudo ;// la session peut "être appelée différemment et son contenu aussi peut être autre chose que le pseudo

							}
							}
						}
				}

?>

<?php include 'header.php'; ?>
<?php echo'vous etes connecté en tant que ';echo $_SESSION['pseudo']; ?>