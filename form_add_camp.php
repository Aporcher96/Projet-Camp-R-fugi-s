<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Titre</title>
  </head>
  <body>

        <?php include 'database_connexion.php';
        $pdo = Database::connect();
        $sql = 'SELECT * FROM nationalite';
        $rep = $pdo->query($sql);
        $sql2 = 'SELECT * FROM centrale';
        $rep = $pdo->query($sql2) ?>

        <form name="Ajout d'un camp" action="send_data_add_camp.php" method="post">

          Nom_Centrale:<br/>
            <select name="NomCentrale">
              <?php foreach ($pdo->query($sql2) as $row) {
                echo('<option value='.$row['IdCentrale'].'>'.$row['NomCentrale'].'</option><br/>');
              }
               ?>
            </select>
            <p>

          Pays:<br/>
          <select name="Pays">
          <?php
          foreach ($pdo->query($sql) as $row)
          {
            echo ('<option value='.$row['IdNationalite'].'>'.$row['NomPays'].'</option><br/>');
          } ?>

          </select>
          <p>
          Ville:<br/>
          <input type="text" name="Ville" value="">
          <p>


          NbPlacesMax:<br/>
          <input type="text" name="NbPlacesMax" value="">
          <p>





            <input type="submit" value="Envoyer"/>
            <input type="reset"  value="Annuler"/>

        </form>

  </body>
</html>
