<!DOCTYPE html>
<html>
	<head>
		<title>PC de Léo</title>
        	<link rel=stylesheet href="../css/main.css" type="text/css">
		<meta charset="utf-8"/>
	</head>
	<body>
		<h1>liste de pokemons</h1>
		<form method="post" action="">
			<select id="tri_select">
				<option name="nom">Nom</option>
				<option name="niveau"> Niveau</option>
				<option name="espece">Espece</option>

			</select>
			<input type="submit" value="Envoyer"/>
		</form>
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
        <?php include("close.php"); ?>
	</body>
</html>
