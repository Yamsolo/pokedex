<?php
	// VARIABLES
	$nombre_de_pokemon = 0;
	$plus_de_pv = 0;
	$plus_name = "";
	$nombre_de_legendaire = 0;
	$poids_total = 0;
	$moyenne_poids = 0;
	$where = "WHERE "; // utilisé pour le "where" de la requête principale.
	$asc = ""; // utilisé pour le "order by" de la requête principale.
	$cpt = 0; 
	
	// TESTS
		// Gestion des champs de recherche pour le nom et le type du pokémon.
	if (isset($_POST['name']) && ($_POST['name'] != ''))
		{
			$where .= "Nom='".mysql_real_escape_string(htmlspecialchars(stripcslashes($_POST['name'])))."'";
			$cpt++;
		}
	if (isset($_POST['poketype']) && ($_POST['poketype'] != ''))
		{
			$where .= ($cpt == 0) ? "PokeType='".mysql_real_escape_string(htmlspecialchars(stripcslashes($_POST['poketype'])))."'" : " AND PokeType='".mysql_real_escape_string(htmlspecialchars(stripcslashes($_POST['poketype'])))."'";
			$cpt++;
		}
		// Gestion du critère légendaire ou non.
	if (isset($_POST['check_legend']) && ($_POST['check_legend'] == true))
		{
			$where .= ($cpt == 0) ? "Legendaire=1" : " AND Legendaire=1";
			$cpt++;
		}
	if ($cpt == 0)
		$where = "";
		
		// Gestion des options de tri
	if (isset($_POST['select_order']) && ($_POST['select_order'] == "select_alpha"))
		{
			$asc .= "ORDER BY Nom ASC";
		}
	if (isset($_POST['select_order']) && ($_POST['select_order'] == "select_pv"))
		{
			$asc .= "ORDER BY PV ASC";
		}
	if (isset($_POST['select_order']) && ($_POST['select_order'] == "select_poids"))
		{
			$asc .= "ORDER BY Poids ASC";
		}
	
	// REQUÊTE PRINCIPALE
	$query = mysql_query("SELECT DISTINCT idNumero, Nom, Niveau, Espece, GROUP_CONCAT(`PokeType` SEPARATOR ' ') AS Type, Taille, Poids, Legendaire, AttaqueSpe, PV
						FROM Pokemon NATURAL JOIN TypesPokemon NATURAL JOIN Types NATURAL JOIN Pokedex NATURAL JOIN Especes
						".$where."
						GROUP BY idNumero
						".$asc."");
	
	while($tab = mysql_fetch_assoc($query))
	{
		// On prépare la reqête avant affichage.
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
				<td><a href=delete.php?id=".$tab['idNumero']."><input class=\"bouton\" type=\"submit\" value=\"X\" /></a></td>
			</tr>"; // la dernière ligne est pour le bouton supprimer.
			
		// MaJ des statistiques pour à chaque tuple.
		$nombre_de_pokemon++;
		if ($plus_de_pv < $tab['PV']){
			$plus_de_pv = $tab['PV'];
			$plus_name = $tab['Nom'];
		}
		$poids_total = $poids_total + $tab['Poids'];
	}
?>
