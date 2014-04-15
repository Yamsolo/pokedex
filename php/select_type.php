<?php
	$query2 = mysql_query("SELECT DISTINCT PokeType
						FROM Types
						ORDER BY PokeType");
	$i = 0;
	echo "<select name='select_type'>";
	while($tab2 = mysql_fetch_assoc($query2))
	{
		echo "<option value='select_".$i++."'>".$tab['PokeType']."</option>";
	}
	echo "</select>";
?>
