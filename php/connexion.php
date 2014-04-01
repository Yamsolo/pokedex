<?php
	$link = mysql_connect("mysql_server", "user", "mdp") or die("Impossible de se connecter à la base");
	mysql_select_db("pokedex", $link) or die("Impossible de selectionner la base de donnée");
?>

<!-- ne pas oublier de fermer la connexion -->
