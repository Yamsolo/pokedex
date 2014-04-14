	<?php include("header.php") ?>
	  <?php include("connexion.php") ?>
		<div id="header">
			<div id="titre">
				<h1 class="recherche"><a href="<?php echo $_SERVER['php_self'] ?>">PC de Léo</a></h1>
			</div>
			<div id="fond_recherche"></div>
			<form id="search" method="post" action="<?php echo $_SERVER['php_self'] ?>">
			<div id="recherche">
								
				<div id="bloc_texte">
					<p class="recherche">Rechercher un pokémon</p>
					
					<input class="barre" name="name" type="text" placeholder="nom du pokemon" 
					<?php if(isset($_POST['name']))
					{ echo "value=\"".$_POST['name']."\"";} ?> /></br>
					<?php include("select_type.php"); ?>
				</div>
				
				<div id="bloc_check">
					<p class="recherche">Options</p>
					<div>
						<input type='checkbox' value='true' id='check_legend' name='check_legend' 
						<?php if(isset($_POST['check_legend']) && $_POST['check_legend']=="true")
						{ echo "checked=\"checked\"";} ?>/>
						restreindre aux légendaires</br>
						<select name='select_order'>
							<option value="select_alpha" <?php if(isset($_POST['select_order']) && ($_POST['select_order'] =="select_alpha")){ echo "selected";} ?>>trier par ordre alphabétique</option>
							<option value="select_pv" <?php if(isset($_POST['select_order']) && ($_POST['select_order'] =="select_pv")){ echo "selected";} ?>>trier par ordre de pv</option>
							<option value="select_poids" <?php if(isset($_POST['select_order']) && ($_POST['select_order'] =="select_poids")){ echo "selected";} ?>>trier par ordre de poids</option>
						</select></br>
						<input class="bouton" type="submit" value="télécharger .csv" />
					</div>
				</div>
				
				
			</div>
			<input class="bouton" type="submit" value="rechercher" />
			</form>
			
		</div>
		<div id="content">
			<div id="avatar"></div>
			<div id="bulle"></div>
			<table id="tableau">
				<thead>
					<tr class="ligne">
					<th>Nom</th>
					<th>Niveau</th>
					<th>Espèce</th>
					<th>Types</th>
					<th>Taille</th>
					<th>Poids</th>
					<th>Légendaire</th>
					<th>Attaque signature</th>
					<th>PV</th>
					<th>Supprimer</th>
					</tr>
				</thead>
            	<tbody>
				  <?php include("requete.php"); ?>
			<!--<form method="post" action="ajout_pokemon.php">
				<tr class='ligne'>
					<td><input type="text" name="Nom" placeholder="Nom du Pokémon"/></td>
					<td><input type="text" name="Niveau" placeholder="Nom du Pokémon"/></td>
					<td><input type="text" name="Espece" placeholder="Nom du Pokémon"/></td>
					<td><input type="text" name="Types" placeholder="Nom du Pokémon"/></td>
					<td><input type="text" name="Taille" placeholder="Nom du Pokémon"/></td>
					<td><input type="text" name="Poids" placeholder="Nom du Pokémon"/></td>
					<td><input type="checkbox"name="Légendaire" placeholder="Nom du Pokémon"/></td>
					<td><input type="text" name="Attaque signature" placeholder="Nom du Pokémon"/></td>
					<td><input type="submit" value="Envoyer"/></td>
				</tr>
			</form> -->
            	</tbody>
			</table>
			<?php include("close.php");
	        if($nombre_de_pokemon > 0)
				$moyenne_poids = $poids_total / $nombre_de_pokemon;
			echo "<div id='stats'>";
			echo "<h3>Statistiques pour cette recherche:</h3>
				Nombre de pokémons : $nombre_de_pokemon </br>
				Pokémon avec le plus de PV : </br> $plus_name ($plus_de_pv PV)</br>
				Poids total : $poids_total kg</br>
				Moyenne des poids : $moyenne_poids kg
				";
			echo "</div>";
			?>
		</div>
	</body>
</html>
