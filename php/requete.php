<?php
	mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
	mysql_set_charset("utf8", $link);
	$where = "WHERE ";
	$cpt = 0;
	if (isset($_POST['name']) && ($_POST['name'] != ''))
		{
			$where .= "Nom='".$_POST['name']."'";
			$cpt++;
		}
	if (isset($_POST['type']))
		{
			$where .= ($cpt == 0) ? "Type='".$_POST['type']."'" : " AND Type='".$_POST['type']."'";
			$cpt++;
		}
	if (isset($_POST['check_legend']) && ($_POST['check_legend'] == true))
		{
			$where .= ($cpt == 0) ? "Legendaire=1" : " AND Legendaire=1";
			$cpt++;
		}
	if ($cpt == 0)
		$where = "";
	
	$query = mysql_query("SELECT DISTINCT idNumero, Nom, Niveau, Espece, GROUP_CONCAT(`PokeType` SEPARATOR ' ') AS Type, Taille, Poids, Legendaire, AttaqueSpe, PV
						FROM Pokemon NATURAL JOIN TypesPokemon NATURAL JOIN Types NATURAL JOIN Pokedex NATURAL JOIN Especes
						".$where."
						GROUP BY idNumero");
	
	while($tab = mysql_fetch_assoc($query))
	{
		$tab['Legendaire'] = ($tab['Legendaire'] == 1) ? "oui" : "non";
		$tab['Taille'] .= " m";
		$tab['Poids'] .= " kg";
		echo "<tr class='ligne'>
				<td>".$tab['Nom']."</td>
				<td>".$tab['Niveau']."</td>
				<td>".$tab['Espece']."</td>
				<td>".$tab['Type']."</td>
				<td>".$tab['Taille']."</td>
				<td>".$tab['Poids']."</td>
				<td>".$tab['Legendaire']."</td>
				<td>".$tab['AttaqueSpe']."</td>
				<td>".$tab['PV']."</td>
			</tr>";
	}
?>
