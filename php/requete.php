<?php
	mysql_select_db($login, $link) or die("Impossible de selectionner la base de donnée");
	mysql_set_charset("utf8", $link);
	$query = mysql_query("SELECT DISTINCT Surnom, Niveau, Espece, PokeType, Taille, Poids, Legendaire, AttaqueSpe, PV
					FROM Pokemon NATURAL JOIN TypesPokemon NATURAL JOIN Types NATURAL JOIN Pokedex NATURAL JOIN Especes");
	while($tab = mysql_fetch_array($query))
	{
		echo "<tr class='ligne'>
				<td>".$tab['Surnom']."</td>
				<td>".$tab['Niveau']."</td>
				<td>".$tab['Espece']."</td>
				<td>".$tab['PokeType']."</td>
				<td>".$tab['Taille']."</td>
				<td>".$tab['Poids']."</td>
				<td>".$tab['Legendaire']."</td>
				<td>".$tab['AttaqueSpe']."</td>
				<td>".$tab['PV']."</td>
			</tr>";
	}
?>
