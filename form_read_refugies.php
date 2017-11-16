<?php require('database_connexion.php');
	$id = null;
	if (!empty($_GET['id'])
	{
		$id = $_REQUEST['id'];
	}
	if (null==$id)
	{
		header("location:refugies_crud.php");
	} else
	{
		$pdo = Database::connect();
		$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM Refugies where IdRefugies=$id";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		
		$pdo_camp=Database::connect();
		$pdo_natio=Database::connect();
		$camp_sql='SELECT * FROM camp';
		$rep_camp= $pdo->query($camp_sql);
		$nationalite_sql='SELECT * FROM nationalite';
		$rep_natio = $pdo->query($nationalite_sql);
		
		Database::disconnect();
	}

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRA
A7" data-wp- preserve="%3Cscript%20src%3D%22js%2Fbootstrap.min.js%22%3E%3C%2Fscript%3E" data-mce- resize="false" data-mce-placeholder="1" class="mce-object" width="20" height="20" alt="<script>" title="<script>" />
</head>

<body>
    <br />
    <div class="container">

        <br />
        <div class="span10 offset1">
            <br />
            <div class="row">
                <br />
                <h3>Edition</h3>
                <p>
            </div>
            <p>

                <br/>
                <div class="form-horizontal">
                    <br/>
                    <div class="control-group">
                        <label class="control-label">Nom</label>
                        <br/>
                        <div class="controls">
                            <label class="checkbox">
                                <?php echo $data['Nom']; ?>
                            </label>
                        </div>
                        <p>
                    </div>
                    <p>
                        <br/>
                        <div class="control-group">
                            <label class="control-label">Prenom</label>
                            <br/>
                            <div class="controls">
                                <label class="checkbox">
                                    <?php echo $data['Prenom']; ?>
                                </label>
                            </div>
                            <p>
                        </div>
                        <p>
                            <br/>
                            <div class="control-group">
                                <label class="control-label">DateNaiss</label>
                                <br/>
                                <div class="controls">
                                    <label class="checkbox">
                                        <?php echo $data['DateNaiss']; ?>
                                    </label>
                                </div>
                                <p>
                            </div>
                            <p>
                                <br/>
                                <div class="control-group">
                                    <label class="control-label">Illetré</label>
                                    <br/>
                                    <div class="controls">
                                        <label class="checkbox">
                                            <?php 
												if ($data['Illetre']==1)
												{
													echo('Oui');
												}else{
													echo('Non');
												}
											?>
                                        </label>
                                    </div>
                                    <p>
                                </div>
                                <p>
                                    <br/>
                                    <div class="control-group">
                                        <label class="control-label">Blessé</label>
                                        <br/>
                                        <div class="controls">
                                            <label class="checkbox">
                                                <?php 
													if ($data['Blesse']==1)
													{
														echo('Oui');
													}else{
														echo('Non');
													}
												?>
                                            </label>
                                        </div>
                                        <p>
                                    </div>
                                    <p>
                                        <br/>
                                        <div class="control-group">
                                            <label class="control-label">Conscient</label>
                                            <br/>
                                            <div class="controls">
                                                <label class="checkbox">
                                                    <?php 
	if ($data['Conscient']==1)
	{
		echo('Oui');
	}else{
		echo('Non');
	}
	?>
                                                </label>
                                            </div>
                                            <p>
                                        </div>
                                        <p>
                                            <br/>
                                            <div class="control-group">
                                                <label class="control-label">Nationalité</label>
                                                <br/>
                                                <div class="controls">
                                                    <label class="checkbox">
                                                        <?php
	foreach($pdo_natio->query($nationalite_sql) as $row_natio)
	{
		If ($row_natio['IdNationalite']==$data['idNationalite'])
		{
			$nom_natio=$row_natio['NomPays'];
		}
	}
	echo $nom_natio;
	?>
                                                    </label>
                                                </div>
                                                <p>
                                            </div>
                                            <p>
                                                <br/>
                                                <div class="control-group">
                                                    <label class="control-label">Camp</label>
                                                    <br/>
                                                    <div class="controls">
                                                        <label class="checkbox">
                                                            <?php 
	foreach($pdo_camp->query($camp_sql) as $row_camp)
	{
		If ($row_camp['IdCamp']==$data['idCamp'])
		{
			$ville_camp=$row_camp['Ville'];
		}
	}
	echo $ville_camp;
	?>
                                                        </label>
                                                    </div>
                                                    <p>
                                                </div>
                                                <p>
                                                    <br/>
                                                    <div class="form-actions">
                                                        <a class="btn" href="refugies_crud.php">Retour</a>
                                                    </div>
                                                    <p>
                </div>
                <p>
        </div>
        <p>
</body>

</html>