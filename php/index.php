<!DOCTYPE html>
<html>
	<head>
		<title>PC de Léo</title>
        <link rel=stylesheet href="../css/main.css" type="text/css">
		<meta charset="utf-8"/>
	</head>
	<body>
		<?php include("connexion.php"); ?>
		<table border=2>
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
            <tbody>
			<?php include("requete.php") ?>
            </tbody>
		</table>
        <?php include("close.php"); ?>
	</body>
</html>
