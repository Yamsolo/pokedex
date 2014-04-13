<?php
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');
	
	// output the column headings
	fputcsv($output, array('Nom','Niveau','Espece','Type','Taille','Poids',
							'Legendaire','AttaqueSpe','PV'));
	
	// fetch the data
	$tab = 0;
	if(!mysql_data_seek($query,$tab))continue;
	
	// loop over the rows, outputting them
	while($tab = mysql_fetch_assoc($query))
	{
		$tab['Legendaire'] = ($tab['Legendaire'] == 1) ? "oui" : "non";
		$tab['Taille'] .= " m";
		$tab['Poids'] .= " kg";
		fputcsv($output, $tab);
	}
	
?>
