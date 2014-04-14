<?php
	include("fonction_table.php");
	if ($_GET['id'] == "" || empty($_GET['id']) || !isset($_GET['id']))
		header('Location: index.php');
	else
	{
		$id = (int)$_GET['id'];
		delete_pokemon($id);
		header('Location: index.php');
	}
?>
