<?php
	include("../config.php");
	$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
	mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
	mysql_set_charset("utf8", $link);
?>

<!-- ne pas oublier de fermer la connexion -->
