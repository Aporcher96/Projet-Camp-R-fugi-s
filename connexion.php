<!DOCTYPE html>
<?php session_start(); ?>

<html lang ="fr">
	<head>
	<meta charset ="utf-8">
	<title> Connection </title>
	</head>
	<?php include("header.php");?>
	<body>
	
	<?php if(!isset($_POST['pseudo'])) { // si le bouton "Connexion" est appuyé ?>
			
		<form method="post" action="connexion.php">
		   <p>
		       <label for="pseudo">Votre pseudo :</label>
		       <input type="text" name="pseudo" id="pseudo" />
		       
		       <br />
		       <label for="pass">mot de passe :</label>
		       <input type="password" name="pass" id="pass" />
		       <input type="submit" value="Envoyer" />
		       
		   </p>
		</form>
		   
		<p> ca dépend de vous ! </p>
		<a href = "don.php"><h3>faire un don</h3></a>
		
		<?php
			}
			else
			{
				// on vérifie que le champ "Pseudo" n'est pas vide
				// empty vérifie à la fois si le champ est vide et si le champ existe belle et bien (is set)
				if(empty($_POST['pseudo']))
				{
					echo "Le champ Pseudo est vide.";
				}
				else
				{
						
					// on vérifie maintenant si le champ "Mot de passe" n'est pas vide"

					if(empty($_POST['pass'])) 
					{
						echo "Le champ Mot de passe est vide.";
					}
					else
					{
						// les champs sont bien posté et pas vide, on sécurise les données entrées par le membre:

						$Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "ISO-8859-1"); // le htmlentities() passera les guillemets en entités HTML, ce qui empêchera les injections SQL

						$MotDePasse = htmlentities($_POST['pass'],

						ENT_QUOTES, "ISO-8859-1");

						//on se connecte à la base de données:
						$mysqli = mysqli_connect("localhost", "root", "", "refugies_project");

						//on vérifie que la connexion s'effectue correctement:
						if(!$mysqli)
						{
							echo "Erreur de connexion à la base de données.";
						} 
						else 
						{
							// on fait maintenant la requête dans la base de données pour rechercher si ces données existe et correspondent:

							$Requete = mysqli_query($mysqli,"SELECT * FROM personnel WHERE login = '".$Pseudo."' AND mdp = '". $MotDePasse."'");

							// si il y a un résultat, mysqli_num_rows() nous donnera alors 1

							// si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat

							if(mysqli_num_rows($Requete) == 0) 
							{
								echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
							} 
							else 
							{
								// on ouvre la session avec $_SESSION:
								$_SESSION['pseudo'] = $Pseudo; // la session peut "être appelée différemment et son contenu aussi peut être autre chose que le pseudo

								echo "Vous êtes à présent connecté !";
							}
						}
					}
				}
			}
		?>
		   

	</body>
</html>