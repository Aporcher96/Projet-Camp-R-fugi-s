<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html">
        <meta charset="UTF-8">
        <title>Listes des Stocks Centrale</title>

        	<link href="css/bootstrap.min.css" rel="stylesheet">
        	<link href="css/responsive.css" rel="stylesheet">
        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />


    </head>

    <body>

<br />
<div class="container">

<br />
<div class="row">

<br />
<h2>Stock de la Centrale</h2>
</div>


<br />
<div class="row">

                <a href="stock_centrale_form_add.php" class="btn btn-success">Ajouter un stock</a>


<br />
<div class="table-responsive">

<br />
<table class="table table-hover table-bordered">

<br />

<thead>

<th>Nom de la centrale</th>
<p>

<th>Nom du matériel</th>
<p>

<th>Quantité actuelle</th>
<p>

<th>Quantité Max</th>
<p>

<th>Alerte</th>
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
                          $pdo_centrale =Database::connect();
                          $pdo_mat_camp=Database::connect();

                          $sql = 'SELECT * FROM quantitecentrale ORDER BY IdCentrale, IdMateriel ';
                          $rep = $pdo->query($sql);


                          $centrale_sql= 'SELECT * FROM centrale';
                          $rep_centrale= $pdo_centrale->query($centrale_sql);

                          $mat_camp_sql='SELECT * FROM materiel';
                          $rep_mat_camp = $pdo_mat_camp->query($mat_camp_sql);


                          foreach ($pdo->query($sql) as $row)
                          {

                            foreach($pdo_centrale->query($centrale_sql) as $row_centrale)
                            {
                              If ($row_centrale['IdCentrale']==$row['IdCentrale'])
                              {
                                $nom_centrale=$row_centrale['NomCentrale'];
                              }
                            }

                            foreach($pdo_mat_camp->query($mat_camp_sql) as $row_mat_camp)
                            {
                              If ($row_mat_camp['IdMateriel']==$row['IdMateriel'])
                              {
                                $nommateriel=$row_mat_camp['NomMateriel'];
                              }
                            }

                            If ( $row['AlerteQtCentrale']==1){
                              $alerte_centrale="oui";
                            }else{
                              $alerte_centrale="non";
                            }


                            echo '

<tr>';
                            echo'

<td>' . $nom_centrale . '</td>
<p>
';

            echo'

<td>' . $nommateriel . '</td>
<p>
';
                            echo'

<td>' . $row['QtCentrale'] . '</td>
<p>
';
                            echo'

<td>'. $row['QuantiteMax'] . '</td>
<p>
';
                            echo'

<td>' . $alerte_centrale . '</td>
<p>
';

                            echo '

<td>';
                            echo '<a class="btn" href="form_read_stock_centrale.php?id=' . $row['IdCentrale'] . $row['IdMateriel'] . '">Afficher</a>';
                            echo '</td>
<p>
';
                            echo '

<td>';
                            echo '<a class="btn btn-success" href="form_centrale_modify.php?id=' . $row['IdCentrale'] . $row['IdMateriel'] . '">Modifier</a>';
                            echo '</td>
<p>
';
                            echo'

<td>';
                            echo '<a class="btn btn-danger" href="file_delete_stock_centrale.php?id=' . $row['IdCentrale'] . $row['IdMateriel'] . ' ">Supprimer</a>';
                            echo '</td>
<p>
';


                            echo'

<td>';
                          if ($alerte_centrale=='oui'){
                            echo '<a class="btn btn-warning" href="form_commande_stock_centrale.php?id=' . $row['IdCentrale'] . $row['IdMateriel'] . ' ">Commande</a>';
                          }
                            echo '</td>

<p>
';

echo '</tr>
<p>
';
}
                                                Database::disconnect(); //on se deconnecte de la base

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
