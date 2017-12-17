<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html">
        <meta charset="UTF-8">
        <title>Listes des Stocks</title> <!--A modifier en Stock du 'nomDeLaVilleDuCamp'-->

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
<h2>Stock du camp</h2>
</div>


<br />
<div class="row">

                <a href="stock_camp_form_add.php" class="btn btn-success">Ajouter un stock</a>


<br />
<div class="table-responsive">

<br />
<table class="table table-hover table-bordered">

<br />

<thead>

<th>Ville du camp</th>
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

</thead>
<p>


<br />
<tbody>
                        <?php include 'database_connexion.php';
                          $pdo = Database::connect();
                          $pdo_camp =Database::connect();
                          $pdo_mat_camp=Database::connect();

                          $sql = 'SELECT * FROM quantitecamp ORDER BY IdCamp, IdMateriel ';
                          $rep = $pdo->query($sql);
                          $camp_sql= 'SELECT * FROM camp';
                          $rep_camp= $pdo_camp->query($camp_sql);
                          $mat_camp_sql='SELECT * FROM materiel';
                          $rep_mat_camp = $pdo_mat_camp->query($mat_camp_sql);



                          foreach ($pdo->query($sql) as $row)
                          {

                            foreach($pdo_camp->query($camp_sql) as $row_camp)
                            {
                              If ($row_camp['IdCamp']==$row['IdCamp'])
                              {
                                $ville_camp=$row_camp['Ville'];
                              }
                            }

                            foreach($pdo_mat_camp->query($mat_camp_sql) as $row_mat_camp)
                            {
                              If ($row_mat_camp['IdMateriel']==$row['IdMateriel'])
                              {
                                $nommateriel=$row_mat_camp['NomMateriel'];


                              }
                            }

                            If ( $row['AlerteQtCamp']==1){
                              $alerte_camp="oui";
                            }else{
                              $alerte_camp="non";
                            }

                            //Nous sommes toujours dans le premier foreach
                            echo '

<tr>';
                            echo'

<td>' . $ville_camp . '</td>
<p>
';
                            echo'

<td>' . $nommateriel . '</td>
<p>
';
                            echo'

<td>' . $row['QtCamp'] . '</td>
<p>
';
                            echo'

<td>'. $row['QuantiteMax'] . '</td>
<p>
';
                            echo'

<td>' . $alerte_camp . '</td>
<p>
';

                            echo '

<td>';
                            echo '<a class="btn" href="form_read_stock_camp.php?id=' . $row['IdCamp'] . $row['IdMateriel'] . '">Afficher</a>';
                            echo '</td>
<p>
';
                            echo '

<td>';
                            echo '<a class="btn btn-success" href="form_camp_modify.php?id=' . $row['IdCamp'] . $row['IdMateriel'] . '">Modifier</a>';
                            echo '</td>
<p>
';
                            echo'

<td>';
                            echo '<a class="btn btn-danger" href="file_delete_stock_camp.php?id=' . $row['IdCamp'] . $row['IdMateriel'] . ' ">Supprimer</a>';
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
