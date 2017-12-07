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
			<h2> CRUD en PHP</h2>
			</div>
			
			<br />
			<div class="row">
			
			
						<a href="form_add_personnel.php" class="btn btn-success">Ajouter un membre du personnel</a>
						
			<br />
			<div class="table-responsive">
			
			<br />
			<div class="table table-hover table-bordered">
			
			<br />
			
			<br />
			
			<thead>
			
			<th>Login Personnel</th>
			<p>
			
			<th>Mot de passe</th>
			<p>
			
			<th>Rôle</th>
			<p>
			
			<br />
			<tbody>
			
								<?php include 'database_connexion.php';
									$pdo = Database::connect();
									$pdo_camp = Database::connect();
									$pdo_centrale = Database::connect();
									
									$sql = 'SELECT * FROM personnel ORDER BY idPersonnel';
									$rep = $pdo->query($sql);
									$camp_sql = 'SELECT * FROM camp';
									$rep_camp = $pdo->query($camp_sql);
									$centrale_sql = 'SELECT * FROM centrale';
									$rep_centrale = $pdo->query($centrale_sql);
									
									foreach ($pdo->query($sql) as $row)
									{
										
										foreach($pdo_camp->query($camp_sql) as $row_camp
										{
											if ($row_camp['idCamp']==$row['idCamp'])
											{
												$ville_camp=$row_camp['Ville'];
											}
										}
									
										foreach($pdo_centrale->query($centrale_sql as $row_centrale)
										{
											if (row_centrale['idCentrale']==$row['idcentrale'])
											{
												$nom_centrale=$row_centrale['NomCentrale'];
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
													echo '<a class="btn btn-danger" href="form_delete_personnel.php?id=' . $row['IdPersonnel'] . '">Supprimer</a>';
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