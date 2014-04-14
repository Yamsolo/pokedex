<?php
	include("../config.php");
	$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
	mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
	mysql_set_charset("utf8", $link);
/*
	function ajout_pokemon($nom, $niveau, $espece, $type, $taille, $poids, $legendaire, $AS, $PV)
	{
		$request = mysql_query("SELECT * FROM Especes WHERE Espece");
		$idEsp = "";
		$idType = "";
		while ($tab = mysql_fetch_array($request))
			if (strstr(strtoupper($tab['Espece']), strtoupper($espece)))
				$idEsp = $tab['idEsp'];
		if ($idEsp == "")
		{
			mysql_query("INSERT INTO Especes (Espece) VALUES ($espece)");
			while ($tab = mysql_fetch_array($request))
				if (strstr(strtoupper($tab['Espece']), strtoupper($espece)))
					$idEsp = $tab['idEsp'];
		}
		$request = mysql_query("SELECT * FROM Types");
			while ($tab = mysql_fetch_array($request))
				if (strstr(strtoupper($tab['PokeType']), strtoupper($type)))
					$type_name = $tab['PokeType'];
			if ($type_name == "")
			mysql_query("INSERT INTO Type (PokeType) VALUES ($type)");		
		if ($idEsp == "")
		{
			mysql_query("INSERT INTO Especes (Espece) VALUES ($espece)");
			while ($tab = mysql_fetch_array($request))
				if (strstr(strtoupper($tab['Espece']), strtoupper($espece)))
					$idEsp = $tab['idEsp'];
		}
		//echo "INSERT INTO Pokedex (Nom, Taille, Poids, Legendaire, AttaqueSpe, PV, idEsp) 
		//				VALUES (".$nom.", ".$taille.",".$poids.",".$legendaire.",".$AS.",".$PV.", ".$idEsp.")";
}
*/
function delete_pokemon($id)
{
	$request = "DELETE FROM Pokemon WHERE idNumero = $id";
	mysql_query($request) or die("Erreur lors de la supression du Pokemon");
}

mysql_free_result($query);
mysql_close($link);

?>
