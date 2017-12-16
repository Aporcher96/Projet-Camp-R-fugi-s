<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="content-type" content="text/hmtl; charset=UTF-8" >
    <title>Liste des camps</title>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/responsive.css">
      <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
A7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E"
data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20"
alt="<script>" title="<script>" />

  </head>
  <body>
    <br />
    <div class="container">


    <br />
    <div class="row">

    <br />
    <h2>Camps de la centrale .. inserer var centrale du personnel .. </h2>
    </div>


    <br />
    <div class="row">

              <a href="form_add_camp.php" class ="btn btn-sucess">Ajouter un camp</a>

    <br />
    <div class="table-responsive">

    <br />
    <table class="table table-hover table-bordered">

    <br/>

    <thead>

    <th>Capacité maximale</th>
    <p>

    <th>Places disponibles</th>
    <p>

    <th>Ville</th>
    <p>

    <th>Pays</th>
    <p>

    <th>Nom Centrale</th>
    <p>

    <th>Alerte Surpop</th>
    <p>

    <th>Alerte Stock</th>
    <p>

      <th></th>
      <p>

      <th></th>
      <p>
        <th></th>
<p>

      <th></th>
      <p>

      </thead>
      <p>


<br />
<tbody>

    <?php include 'database_connexion.php';
      $pdo = Database::connect();
      $pdo_centrale = Database::connect();
      $pdo_natio =Database::connect();
      $sql = 'SELECT * FROM camp ORDER BY idcamp';
      $rep = $pdo->query($sql);
      $centrale_sql = 'SELECT * FROM centrale ';
      $rep_centrale = $pdo->query($centrale_sql);
      $natio_sql = 'SELECT * FROM nationalite';
      $rep_natio = $pdo->query($natio_sql);




      foreach ($pdo->query($sql) as $row)
       {

        foreach($pdo_centrale->query($centrale_sql) as $row_centrale)
        {
          if ($row_centrale['IdCentrale']==$row['IdCentrale'])
          {
            $nom_centrale = $row_centrale['NomCentrale'];
          }
        }

        foreach ($pdo_natio->query($natio_sql) as $row_natio)
        {
          if ($row_natio['IdNationalite']==$row['IdNationalite'])
          {
            $nom_natio = $row_natio['NomPays'];
          }
        }

        if ($row['Alerte_Stock']==1) {
          $Alerte_Stock='oui';
        }else{
          $Alerte_Stock='non';
        }

        if ($row['Alerte_Surpop']==1) {
          $Alerte_Surpop='oui';
        }else{
          $Alerte_Surpop='non';
        }


        echo

'<tr>' ;

        echo '

<td>' . $row['NbPlacesMax'] . '</td>
<p> ';

        echo '

<td>' . $row['NbPlacesDispo'] .  '</td>
<p> ';

        echo '

<td>' . $row['Ville'] . '</td>
<p> ';

        echo '

<td>' . $nom_natio . '</td>
<p> ';

        echo '

<td>' . $nom_centrale . '</td>
<p> ';

        echo '

<td>' . $Alerte_Stock . '</td>
<p> ';

        echo '

<td>' . $Alerte_Surpop . '</td>
<p> ';


        echo '

<td>';


        echo '<a class="btn" href="form_read_camp.php?id=' . $row['IdCamp'] . '">Afficher</a>';
        echo '</td>

<p>
';
        echo '

<td>';

        echo '<a class="btn btn-success" href="form_modify_camp.php?id=' . $row['IdCamp'] .  '">Modifier</a>';
        echo '</td>

<p>
';

        echo'

<td>';

        echo '<a class="btn btn-danger" href="form_delete_camp.php?id=' . $row['IdCamp']  . ' ">Supprimer</a>';
        echo '</td>

<p>
';


        echo'

<td>';
        if ($Alerte_Stock=='oui'){
          echo '<a class="btn btn-warning" href="form_commande_stock_centrale.php?id=' . $row['IdCamp'] . ' ">Commande</a>';
      }
          echo '</td>

<p>';

echo '</tr>
<p>
';

}


          Database::disconnect();



     ?>
</tbody>
<p>

</table>
<p>

</div>
<p>

</div>
<p>

</div>
<p>

    </body>
</html>
