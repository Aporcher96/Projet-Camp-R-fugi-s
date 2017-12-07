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
          NbPlacesMax:<br/>
          <input type="text" name="NbPlacesMax" value="">
          <p>

          NbPlacesDispo:<br/>
          <input type="text" name="NbPlacesDispo" value="">
          <p>

          Ville:<br/>
          <input type="text" name="Ville" value="">
          <p>

          Pays:<br/>
          <select name="Pays">
          <?php
          foreach ($pdo->query($sql) as $row) {
            echo ('<option value='.$row['IdNationalite'].'>'.$row['NomPays'].'</option><br/>');
          } ?>

          </select>
          <p>

          Alerte_Stock ?:<br/>
          <select name="Alerte_Stock">
              <option value="1">Oui</option>
              <option value="0">Non</option>
          </select>
          <p>

          Alerte_Surpop ?:<br/>
            <select name="Alerte_Surpop">
                <option value="1">Oui</option>
                <option value="0">Non</option>
            </select>
            <p>

          Nom_Centrale:<br/>
            <select name="Nom_Centrale">
              <?php foreach ($pdo->query($sql2) as $row) {
                echo('<option value='.$row['IdCentrale'].'>'.$row['Centrale'].'</option><br/>'
              }
               ?>
            </select>
            <p>

            <input type="submit" value="Envoyer"/>
            <input type="reset"  value="Annuler"/>

        </form>

  </body>
</html>
