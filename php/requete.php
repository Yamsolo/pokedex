<?php
	include("connexion.php");
	mysql_select_db($login, $link) or die("Impossible de selectionner la base de donnée");
	$query = mysql_query("SELECT Surnom, Niveau, Espece FROM Pokemon NATURAL JOIN Pokedex NATURAL JOIN Especes");
	while($tab = mysql_fetch_array($query))
	{
		echo "<tr class='ligne'>
				<td>".$tab['Surnom']."</td>
				<td>".$tab['Niveau']."</td>
				<td>".$tab['Espece']."</td>
			</tr>";
	}
?>
