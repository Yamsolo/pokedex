<?php
	$name = $_POST['nom'];
	$niveau = $_POST['niveau'];
	$espece = $_POST['espece'];
	$type = $_POST['type'];
	$taille = $_POST['taille'];
	$poids = $_POST['poids'];
	$legendaire = $_POST['legendaire'];
	$AS = $_POST['AS'];
	$PV = $_POST['PV'];
	ajout_pokemon($name, $niveau, $espece, $type, $taille, $poids, $legendaire, $AS, $PV);
?>
