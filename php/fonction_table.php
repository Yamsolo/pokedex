<?php
	// cette fonction ajout un pokemon dans la table pokedex
	function ajout_pokemon_table($nom, $taille, $poids, $legendaire, $AS, $PV, $idEsp) 
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		mysql_query("INSERT INTO Pokedex (Nom, Taille, Poids, Legendaire, AttaqueSpe, PV, idEsp) 
						VALUES (\"".$nom."\", ".$taille.",".$poids.",".$legendaire.",\"".$AS."\",".$PV.", ".$idEsp.")") or die ("Error ajout table poke");
		mysql_close($link);
	}
	// celle ci ajoute un type dans la table
	function ajout_type($type)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		mysql_query("INSERT INTO Types (PokeType) VALUES (\"$type\")");
		mysql_close($link);
	}
	// ici on rajoute une espece
	function ajout_espece($espece)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		mysql_query("INSERT INTO Especes (Espece) VALUES (\"$espece\")") or die ("Erreur lors de l'ajout de l'espece");
		mysql_close($link);
	}
	// la on cherche l'ID d'une espece
	function search_espece($request, $espece)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = mysql_query("SELECT * FROM Especes");
		$i = 0;
		while ($tab = mysql_fetch_array($request))
			if ($i < $tab['idEsp'])
				$i = $tab['idEsp'];
		mysql_close($link);
		return $i;
	}
	// la on cherche l'ID d'un type
	function search_type($request, $type)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = mysql_query("SELECT * FROM Types");
		$i = 0;
		while ($tab = mysql_fetch_array($request))
			if ($i < $tab['idType'])
				$i = $tab['idType'];
		mysql_close($link);
		return $i;
	}
	// On cherche l'ID dans le pokedex
	function search_pokedex($request, $idName)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = mysql_query("SELECT * FROM Pokedex");
		$i = 0;
		while ($tab = mysql_fetch_array($request))
			if ($i < $tab['idPokedex'])
				$i = $tab['idPokedex'];
		mysql_close($link);
		return $i;
	}
	
	// ajout d'un pokemon dans toutes les différentes tables
	function ajout_pokemon($nom, $niveau, $espece, $type, $taille, $poids, $legendaire, $AS, $PV)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = mysql_query("SELECT * FROM Especes");
		$idEsp = "";
		$idType = "";
		while ($tab = mysql_fetch_array($request)) // Ici on chgerche si l'espèce existe déjà
				if (!strcmp($espece, $tab['Espece']))
					$idEsp = $tab['idEsp'];
		if ($idEsp == "") // si non, on l'ajoute
		{
			ajout_espece($espece);
			$idEsp = search_espece($request, $espece);
		}
		$request = mysql_query("SELECT * FROM Types"); // de même pour le type
		while ($tab = mysql_fetch_array($request))
				if (!strcmp($type, $tab['PokeType']))
					$idType = $tab['idType'];
		if ($idType == "")
		 {
			ajout_type($type);
			$idType = search_type($request, $type);
		 }
		 $request = mysql_query("SELECT * FROM Pokedex");
		 while ($tab = mysql_fetch_array($request)) // et Ici pour sa présence dans le pokédex.
				if (!strcmp($nom, $tab['Nom']))
					$idName = $tab['idPokedex'];
		 if ($idName == "")
		 {
			ajout_pokemon_table($nom, $taille, $poids, $legendaire, $AS, $PV, $idEsp);
			$idName = search_pokedex($request, $idName);
			ajout_pokemon($nom, $niveau, $espece, $type, $taille, $poids, $legendaire, $AS, $PV); // On utilise la recursivité.
		 }
		mysql_query("INSERT INTO TypesPokemon (idPokedex, idType) VALUES (".$idName.", ".$idType.")");
		mysql_query("INSERT INTO Pokemon (idPokedex, niveau, surnom) VALUES (".$idName.", ".$niveau.", \"".$nom."\")");
		mysql_close($link); // On ferme la connexion initiatlisée dans cette fonction.
		header("Location: index.php");
	}
	// Fonction pour supprimer un pokemon de la table !!
	function delete_pokemon($id)
	{
		include("../config.php");
		$link = mysql_connect($connect, $login, $password) or die("Impossible de se connecter à la base");
		mysql_select_db($database, $link) or die("Impossible de selectionner la base de donnée");
		mysql_set_charset("utf8", $link);
		$request = "DELETE FROM Pokemon WHERE idNumero = $id"; // écriture de la requete
		mysql_query($request) or die("Erreur lors de la supression du Pokemon"); // execution de la requete
		mysql_close($link);
	}
	
?>
