<?php
	include("fonction_table.php");
/*	function first_free_id($id_numerical_attribute,$query){
		$query .= " ORDER BY ".$id_numerical_attribute." ASC";
		$pt = 0; $cpt = 1; $exclude[];
		if(!mysql_data_seek($query,$pt))continue;
		while($pt = mysql_fetch_assoc($query))
		{
			if($cpt == $pt["".$id_numerical_attribute.""]){
				$cpt;
				foreach($value in $exclude)
			} else {
				
			}
		}
	}
	
	function max_free_id($id_numerical_attribute,$query){
		$query .= " ORDER BY ".$id_numerical_attribute." ASC";
		$pt = 0; $cpt = 1; $exclude[];
		if(!mysql_data_seek($query,$pt))continue;
		while($pt = mysql_fetch_assoc($query))
		{
			
		}
	}
*/	
	$name = $_POST['Nom'];
	if ($name == "")
		header("Location: index.php");
	$niveau = $_POST['Niveau'];
	$espece = $_POST['Espece'];
	$type = str_split($_POST['Types']);
	$legendaire = $_POST['Legendaire'];
	if (!$legendaire)
		$legendaire = 0;
	else
		$legendaire = 1;
	$taille = $_POST['Taille'];
	$poids = $_POST['Poids'];
	$AS = $_POST['AS'];
	$PV = $_POST['PV'];
	ajout_pokemon($name, $niveau, $espece, $type, $taille, $poids, $legendaire, $AS, $PV);
?>
