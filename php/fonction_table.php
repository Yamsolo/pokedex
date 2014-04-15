<?php

	function ajout_pokemon_table($nom, $taille, $poids, $legendaire, $AS, $PV, $idEsp)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		mysql_query("INSERT INTO Pokedex (Nom, Taille, Poids, Legendaire, AttaqueSpe, PV, idEsp) 
						VALUES (\"".$nom."\", ".$taille.",".$poids.",".$legendaire.",\"".$AS."\",".$PV.", ".$idEsp.")") or die ("not workin");
		mysql_close($link);
	}

	function ajout_type($type)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		mysql_query("INSERT INTO Types (PokeType) VALUES (\"$type\")");
		mysql_close($link);
	}

	function ajout_espece($espece)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		mysql_query("INSERT INTO Especes (Espece) VALUES (\"$espece\")") or die ("Erreur lors de l'ajout de l'espece");
		mysql_close($link);
	}

	function ajout_pokemon($nom, $niveau, $espece, $type, $taille, $poids, $legendaire, $AS, $PV)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = mysql_query("SELECT * FROM Especes");
		$idEsp = "";
		
		while ($tab = mysql_fetch_array($request))
				if (!strcmp($espece, $tab['Espece']))
					$idEsp = $tab['idEsp'];
		$idType = "";
				 echo "tpto";
		if ($idEsp == "")
		{
			ajout_espece($espece);
			while ($tab = mysql_fetch_array($request))
				if (!strcmp($espece, $tab['Espece']))
					$idEsp = $tab['idEsp'];
		}
				 echo "tpto";
		$request = mysql_query("SELECT * FROM Types");
		while ($tab = mysql_fetch_array($request))
				if (!strcmp($type, $tab['PokeType']))
					$idType = $tab['idType'];
		if ($idType == "")
		 {
			ajout_type($type);
			while ($tab = mysql_fetch_array($request))
				if (!strcmp($type, $tab['PokeType']))
					$idType = $tab['idType'];
		 }
		 echo "tpto";
		 $request = mysql_query("SELECT * FROM Pokedex");
		 while ($tab = mysql_fetch_array($request))
				if (!strcmp($nom, $tab['Nom']))
					$idName = $tab['idPokedex'];
		 if ($idName == "")
		 {
			ajout_pokemon_table($nom, $taille, $poids, $legendaire, $AS, $PV, $idEsp);
			while ($tab = mysql_fetch_array($request))
				if (!strcmp($nom, $tab['Nom']))
					$idName = $tab['idPokedex'];
		 }
		mysql_query("INSERT INTO TypesPokemon (idPokedex, idType) VALUES (".$idName.", ".$idType.")");
		mysql_query("INSERT INTO Pokemon (idPokedex, niveau, surnom) VALUES (".$idName.", ".$niveau.", \"".$nom."\")");
		mysql_close($link);
		header("Location: index.php");
	}

	function delete_pokemon($id)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = "DELETE FROM Pokemon WHERE idNumero = $id";
		mysql_query($request) or die("Erreur lors de la supression du Pokemon");
		mysql_close($link);
	}
	
?>
