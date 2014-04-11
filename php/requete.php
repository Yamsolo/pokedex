<?php
	mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
	mysql_set_charset("utf8", $link);
	$where = "WHERE ";
	$count_where = 0;
	if (isset($_POST['name']))
		{
			$where += "Surnom='".$_POST['name']."'";
			$count_where++;
		}
	if (isset($_POST['type']))
		{
			$where += ($count_where == 0) ? "Type='".$_POST['type']."'" : " AND Type='".$_POST['type']."'";
		}
	if (isset($_POST['check_legend']) && ($_POST['check_legend'] == true))
		{
			$where += ($count_where == 0) ? "Legendaire=1" : " AND Legendaire=1";
		}
	if ($count_where == 0)
		$where = "";
	
	$query = mysql_query("SELECT DISTINCT Nom, Niveau, Espece, PokeType, Taille, Poids, Legendaire, AttaqueSpe, PV
						FROM Pokemon NATURAL JOIN TypesPokemon NATURAL JOIN Types NATURAL JOIN Pokedex NATURAL JOIN Especes
						$where");
	
	while($tab = mysql_fetch_array($query))
	{
		$tab['Legendaire'] = ($tab['Legendaire'] == 1) ? "oui" : "non";
		echo "<tr class='ligne'>
				<td>".$tab['Nom']."</td>
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
