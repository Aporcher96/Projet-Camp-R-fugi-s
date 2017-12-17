<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Listes des réfugiés</title>

			<link href="css/bootstrap.min.css" rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
		<img
src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
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
<h2>Liste du personnel</h2>
</div>


<br />
<div class="row">

							<a href="form_add_personnel.php" class="btn btn-success">Ajouter du personnel</a>


<br />
<div class="table-responsive">

<br />
<table class="table table-hover table-bordered">

<br />

<thead>

<th>Login</th>
<p>

<th>Mots de passe </th>
<p>

<th>Role</th>
<p>

	<th>Ville camp</th>
	<p>

		<p>

			<th>Nom centrale</th>
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
									$pdo_camp = Database::connect();
									$pdo_centrale = Database::connect();
									$pdo_postcamp= Database::connect();
									$pdo_posycentrale = Database::connect();


									$sql = 'SELECT * FROM personnel ORDER BY idPersonnel';
									$rep = $pdo->query($sql);

									$postcampsql ='SELECT * from postecamp ,camp ,personnel where camp.IdCamp=postecamp.Idcamp and postecamp.IdPersonnel=personnel.IdPersonnel  ';
									$postcamprep = $pdo_postcamp->query($postcampsql);

									$postcentralsql ='SELECT * from postecentrale ,centrale ,personnel where centrale.IdCentrale=postecentrale.IdCentrale and postecentrale.IdPersonnel=personnel.IdPersonnel';
									$postcentralrep = $pdo_posycentrale->query($postcentralsql);



									$camp_sql = 'SELECT * FROM camp';
									$rep_camp = $pdo->query($camp_sql);
									$centrale_sql = 'SELECT * FROM centrale';
									$rep_centrale = $pdo->query($centrale_sql);

									foreach ($pdo->query($sql) as $row)
									{
											foreach ($pdo_postcamp->query($postcampsql) as $row_postcamp) {



											if ($row_postcamp['IdPersonnel']==$row['IdPersonnel'])
											{
												$ville_camp=$row_postcamp['Ville'];
												break;
											}else{
													$ville_camp="";

											}
										}


										foreach ($pdo_posycentrale->query($postcentralsql) as $row_postecentrale) {



										if ($row_postecentrale['IdPersonnel']==$row['IdPersonnel'])
										{

											$centrale=$row_postecentrale['NomCentrale'];
											break;
										}else{
												$centrale="";

										}
									}

													echo '
									<tr>';
													echo '
									<td>' . $row['Login'] . '</td>
									<p>
									';
													echo '
									<td>' . $row['Mdp'] . '</td>
									<p>
									';
													echo '
									<td>' . $row['Role'] . '</td>
									<p>
									';


									echo '
					<td>' . $ville_camp. '</td>
					<p>
					';

					echo '
	<td>' . $centrale. '</td>
	<p>
	';

													echo '
									<td>';
													echo '<a class="btn" href="form_read_personnel.php?id=' . $row['IdPersonnel'] . '">Afficher</a>';
													echo '</td>
									<p>
									';
													echo '
									<td>';
													echo '<a class="btn btn-success" href="form_modify_personnel.php?id=' . $row['IdPersonnel'] . '">Modifier</a>';
													echo '</td>
									<p>
									';
									echo'

<td>';
													echo '<a class="btn btn-danger" href="file_delete_personnel.php?id=' . $row['IdPersonnel'] . '">Supprimer</a>';
													echo '</td>
									<p>
									';
													echo '</tr>
									<p>
									';
									}

									Database::disconnect();




								?>
				</tbody>
				<p>


			</thead>




	</body>

</html>
