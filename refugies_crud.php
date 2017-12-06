<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type"content="text/html;charset=UTF-8">
		<title>Liste des réfugiés</title>
	
			<link href="css/bootstrap.min.css"rel="stylesheet">
			<link href="css/responsive.css" rel="stylesheet">
		<img
		src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
A7" data-wp-preserve="%3Cscript%20src%3D%22js%2Fbootstrap.js%22%3E%3C%2Fscript%3E" data-mce-resize="false" data-mce-placeholder="1"class="mce-object"width="20" height="20" alt="<script>" title="<script>"/>
	</head>
	
	<body>
		<br />
		<div class="container">
	
			<br/>
			<div class="row">
	
				<br/>
				<h2>Crud en Php</h2>
			</div>
	
			<br/>
			<div class="row">
	
				<a href="form_add_refugies.php" class="btn btn-success">Ajouter un réfugié</a>
	
				<br/>
				<div class="table-responsive">
	
					<br/>
					<table class="table table-hover table-bordered">
	
						<br/>
		
						<thread>
		
							<th>Nom</th>
							<p>
			
							<th>Prenom</th>
							<p>
		
							<th>DateNaiss</th>
							<p>
		
							<th>Illetre</th>
							<p>
		
							<th>Blesse</th>
							<p>
		
							<th>Conscient</th>
							<p>
		
							<th>Nationalité</th>
							<p>
		
							<th>Camp</th>
							<p>
		
						</thread>
						<p>
		
						<br />
						<tbody>
							<?php include 'database_connexion.php';
								$pdo = Database::connect();
								$pdo_camp = Database::connect();
								$pdo_natio = Database::connect();
								$sql = 'SELECT * FROM refugies ORDER BY idRefugies ';
								$rep = $pdo->query($sql);
								$camp_sql= 'SELECT * FROM camp';
								$rep_camp= $pdo->query($camp_sql);
								$nationalite_sql='SELECT * FROM nationalite';
								$rep_natio=$pdo->query($nationalite_sql);
					
					
								foreach($pdo->query($sql) as $row)
								{
									foreach($pdo_camp->query($camp_sql) as $row_camp)
									{
										If ($row_camp["IdCamp"]==$row["idCamp"])
											{
											$ville_camp=$row_camp['Ville'];
											}
									}
									foreach($pdo_natio->query($nationalite_sql) as $row_natio0)
									{
										If ($row_natio['IdNationalite']==$row['idNationalite'])
										{
											$nom_natio=$row_natio['NomPays'];
										}
									}
									If ($row['Illetre']==1){
										$illetre="oui";
									}else{
										$illetre="non";
									}
						
									If ($row['Blesse']==1){
										$blesse="oui";
									}else{
										$blesse="non";
									}
						
									If ($row['Conscient']==1){
										$conscient="oui";
									}else{
										$conscient="non";
									}
						
									echo '<tr>';
									echo '<td>' . $row['Nom'] . '</td> <p>';
									echo '<td>' . $row['Prenom'] . '</td> <p>';
									echo '<td>' . $row['DateNaiss'] . '</td> <p>';
									echo '<td>' . $illetre . '</td> <p>';
									echo '<td>' . $blesse . '</td> <p>';
									echo '<td>' . $conscient . '</td> <p>';
									echo '<td>' . $nom_natio . '</td> <p>';
									echo '<td>' . $ville_camp . '</td> <p>';
						
									echo '<td>';
									echo '<a class="btn" href="form_read_refugies.php?id=' . $row['IdRefugies'] . '">Afficher</a>';
									echo '</td> <p>';
						
									echo '<td>';
									echo '<a class=" btn-success" href="form_modify_refugies.php?id=' . $row['IdRefugies'] . '">Modifier</a>';
									echo '</td> <p>';
						
									echo '<td>';
									echo '<a class="btn btn-danger" href="file_delete_refugies.php?id=' . $row['IdRefugies'] . '">Supprimer</a>';
									echo '</td> <p>';
						
									echo'</tr> <p>';
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
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
	
	
	
	
	
	
	
	
	
	
	