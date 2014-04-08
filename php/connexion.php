<?php
	include("../config.php");
	$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
	mysql_select_db($login, $link) or die("Impossible de selectionner la base de donnée");
	$query = mysql_query("SELECT * FROM pokedex");
	while($tab = mysql_fetch_array($query))
{
			
		echo "<tr class='ligne'>
				<td>".$tab['Nom']."</td>
				<td>".$tab['Niveau']."</td>
				<td>".$tab['espece']."</td>
			</tr>";
}
?>

<!-- ne pas oublier de fermer la connexion -->
