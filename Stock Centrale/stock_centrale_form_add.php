<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire d'Ajout Stock Centrale</title>
  </head>
  <body>

        <?php include 'database_connexion.php';
        $pdo = Database::connect();
        $centrale_sql= 'SELECT * FROM centrale'; // Requête pour les centrales
        $res_centrale= $pdo->query($centrale_sql);

        ?>
        <title>Choisissez une centrale</title>
        <form name="ChoixVille" action="Form_centrale_add_fct_ville.php" method="post">
          Nom de la Centrale:<br/>
          <select name="NomCentrale">
            <?php foreach ($pdo->query($centrale_sql) as $row){
              echo('<option value ='.$row['IdCentrale'].'>'.$row['NomCentrale'].'</option><br/>');
            }?>
          </select>
          <p>
          <input type="submit" name="" value="Valider">
          <input type="reset" name="" value="Annuler">
        </form>


  </body>
</html>
