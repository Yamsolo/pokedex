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
				<h1 class="recherche"><a href="<?php echo $_SERVER['php_self'] ?>">PC de Léo</a></h1>
			</div>
			<div id="fond_recherche"></div>
			<form id="search" method="post" action="<?php echo $_SERVER['php_self'] ?>">
			<div id="recherche">
				
				
				<div id="bloc_texte">
					<p class="recherche">Rechercher un pokémon</p>
					
						<input class="barre" name="name" type="text" placeholder="nom du pokemon" 
						<?php if(isset($_POST['name']))
						{ echo "value=\"".$_POST['name']."\"";} ?> /></br>
				</div>
				
				<div id="bloc_check">
					<p class="recherche">Options</p>
					<div>
						<input type='checkbox' value='true' id='check_legend' name='check_legend' 
						<?php if(isset($_POST['check_legend']) && $_POST['check_legend']=="true")
						{ echo "checked=\"checked\"";} ?>/>
						restreindre aux légendaires</br>
						<input type='checkbox' value='true' id='check_csv' name='check_csv' 
						<?php if(isset($_POST['check_csv']) && $_POST['check_csv']=="true")
						{ echo "checked=\"checked\"";} ?>/>
						télécharger au format .csv
					</div>
				</div>
				
				
			</div>
			<input class="bouton" type="submit" value="rechercher" />
			</form>
			
		</div>
		<div id="content">
			<div id="avatar"></div>
			<div id="bulle"></div>
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
		<?php include("csv.php"); ?>
        <?php include("close.php"); ?>
	</body>
</html>
