<!DOCTYPE html>
<html>
	<head>
		<title>PC de Léo</title>
        	<link rel=stylesheet href="../css/main.css" type="text/css">
		<meta charset="utf-8"/>
	</head>
	<body>
	  <?php include("connexion.php") ?>
		<div id="header">
			<div id="titre">
				<h1 class="recherche">PC de Léo</h1>
			</div>
			<div id="recherche">
				<p class="recherche">Rechercher un pokémon</p>
				<form id="search" method="post">
					<input class="barre" name="name" type="text" placeholder="nom du pokémon" /></br>
					<input class="barre" name="type" type="text" placeholder="nom du type" /></br>
					<input class="bouton" type="submit" value="rechercher" />
				</form>
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
				  <?php include("requete.php"); ?>
            			</tbody>
			</table>
		</div>
        <?php include("close.php"); ?>
	</body>
</html>
