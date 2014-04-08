<?php
	include("../config.php");
	$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
?>

<!-- ne pas oublier de fermer la connexion -->
