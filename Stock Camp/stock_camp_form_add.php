<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire d'Ajout Stock Camp</title>
  </head>
  <body>

        <?php include 'database_connexion.php';
        $pdo = Database::connect();
        $camp_sql= 'SELECT * FROM camp'; // Requête pour les camps
        $res_camp= $pdo->query($camp_sql);

        ?>
        <title>Choisissez une ville.</title>
        <form name="ChoixVille" action="Form_camp_add_fct_ville.php" method="post">
          Ville du camp:<br/>
          <select name="Ville">
            <?php foreach ($pdo->query($camp_sql) as $row){
              echo('<option value ='.$row['IdCamp'].'>'.$row['Ville'].'</option><br/>');
            }?>
          </select>
          <p>
          <input type="submit" name="" value="Valider">
          <input type="reset" name="" value="Annuler">
        </form>


  </body>
</html>
