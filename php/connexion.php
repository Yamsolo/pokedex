<?php
	$link = mysql_connect("mysql.ensinfo.sciences.univ-nantes.prive", "e139157H", "45eb1f62") or die("Impossible de se connecter à la base");
	mysql_select_db("e139157H", $link) or die("Impossible de selectionner la base de donnée");
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
