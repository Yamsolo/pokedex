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
				<h1 class="recherche"><a href="#">PC de Léo</a></h1>
			</div>
			<form id="search" method="post" action="requete.php">
			<div id="recherche">
				
				
				<div id="bloc_texte">
					<p class="recherche">Rechercher un pokémon</p>
					
						<input class="barre" name="name" type="text" placeholder="nom du pokémon" /></br>
						<input class="barre" name="type" type="text" placeholder="nom du type" /></br>
											
				</div>
				
				<div id="bloc_check">
					<p class="recherche">Options</p>
					<div>
						<input type="checkbox" value="true" id="check_legend" name="check_legend" />
						<label for="squaredThree"></label>
						restreindre aux légendaires
					</div>
				</div>
				
				
			</div>
			<input class="bouton" type="submit" value="rechercher" />
			</form>
			
			<div id="avatar"></div>
			<div id="bulle"></div>
		</div>
		<div id="content">
			<table id="tableau">
				<thead>
					<tr class="ligne">
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
				  <?php include("requete.php"); ?>
            	</tbody>
			</table>
		</div>
        <?php include("close.php"); ?>
	</body>
</html>
