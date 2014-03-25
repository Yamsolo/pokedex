<!DOCTYPE html>
<html>
	<head>
		<title>PC de léo</title>
		<meta charset="utf-8"/>
	</head>
	<body>
		<!-- <?php include("connexion.php"); ?> !-->
		<table>
			<thead>
			<tr>
				<th>Nom</th>
				<th>Niveau</th>
				<th>Espèce</th>
				<th>Types</th>
				<th>Taille</th>
				<th>Poids</th>
				<th>Légendaire</th>
				<th>Attaque signature</th>
				<th>PV</th>
			</tr>
			</thead>
			<?php include("requete.php") ?>
		</table>
	</body>
</html>
