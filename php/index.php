<!DOCTYPE html>
<html>
	<head>
		<title>PC de Léo</title>
        	<link rel=stylesheet href="../css/main.css" type="text/css">
		<meta charset="utf-8"/>
	</head>
	<body>
		<div id="header">
			<div id="titre">
				<h1>liste de pokemons</h1>
			</div>
			<div id="recherche">
			</div>
		</div>
		<div id="content">
			<table border=2 id="tableau">
				<thead>
					<tr class="ligne">
					<th>Nom</th>
						<th>Niveau</th>
					<th>Espèce</th>
					<!--<th>Types</th>
					<th>Taille</th>
					<th>Poids</th>
					<th>Légendaire</th>
					<th>Attaque signature</th>
					<th>PV</th> !-->
				</tr>
				</thead>
            			<tbody>
					<?php include("connexion.php") ?>
            			</tbody>
			</table>
		</div>
        <?php include("close.php"); ?>
	</body>
</html>
