	<?php include("header.php"); // On inclut les header classiques?>
	  <?php include("connexion.php") // On débute les connexions?>
		<!-- DEBUT DU HEADER -->
		<div id="header">
			<div id="titre">
				<h1 class="recherche"><a href="<?php echo $_SERVER['php_self'] ?>">PC de Léo</a></h1>
			</div>
			<div id="fond_recherche"></div>
			<form id="search" method="post" action="<?php echo $_SERVER['php_self'] ?>">
			<div id="recherche">
				<!-- BLOC DE GAUCHE -->				
				<div id="bloc_texte">
					<p class="recherche">Rechercher un pokémon</p>
					
					<input class="barre" name="name" type="text" placeholder="nom du pokemon" 
					<?php if(isset($_POST['name']))
					{ echo "value=\"".$_POST['name']."\"";} ?> /></br>
					<input class="barre" name="poketype" type="text" placeholder="type du pokemon" 
					<?php if(isset($_POST['poketype']))
					{ echo "value=\"".$_POST['poketype']."\"";} ?> /></br>
				</div>
				<!-- BLOC DE DROITE -->
				<div id="bloc_check">
					<p class="recherche">Options</p>
					<div>
						<input type='checkbox' value='true' id='check_legend' name='check_legend' 
						<?php if(isset($_POST['check_legend']) && $_POST['check_legend']=="true")
						{ echo "checked=\"checked\"";} ?>/>
						restreindre aux légendaires</br>
						<select name='select_order'>
							<option>options de tri</option>
							<option value="select_alpha" <?php if(isset($_POST['select_order']) && ($_POST['select_order'] =="select_alpha")){ echo "selected";} ?>>trier par ordre alphabétique</option>
							<option value="select_pv" <?php if(isset($_POST['select_order']) && ($_POST['select_order'] =="select_pv")){ echo "selected";} ?>>trier par ordre de pv</option>
							<option value="select_poids" <?php if(isset($_POST['select_order']) && ($_POST['select_order'] =="select_poids")){ echo "selected";} ?>>trier par ordre de poids</option>
						</select></br>
					</div>
				</div>
			</div>
			<input class="bouton" type="submit" value="rechercher" />
			</form>
		</div>
		
		<!-- DEBUT DU CONTENU -->
		<div id="content">
			<div id="avatar"></div>
			<div id="bulle"></div>
			
			<table id="tableau">
				<!-- 1ère ligne, avec les titres -->
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
					</tr>
				</thead>
				
            	<tbody> 
            	<!-- Lignes des pokémons affichés -->
				<?php include("requete.php"); ?>
				
				<!-- Ligne d'ajout d'un pokémon -->
				<form method="post" action="ajout_pokemon.php">
					<tr class='ligne'>
						<td><input class="champ" type="text" name="Nom" placeholder="Nom" required/></td>
						<td><input class="nombre" type="number" name="Niveau" placeholder="Lv" required/></td>
						<td><input class="champ" type="text" name="Espece" placeholder="Espèce" required/></td>
						<td><input class="champ" type="text" name="Types" placeholder="type1,type2" required/></td>
						<td><input class="nombre" type="number" name="Taille" placeholder="Taille" required/></td>
						<td><input class="nombre" type="number" name="Poids" placeholder="Poids" required/></td>
						<td><input type="checkbox"name="Legendaire"/></td>
						<td><input class="champ" type="text" name="AS" placeholder="Attaque signature" required/></td>
						<td><input class="nombre" type="number" name="PV" placeholder="Pv" required/></td>
						<td><input type="submit" value="Ajouter" required/></td>
					</tr>
				</form>
            	</tbody>
			</table>
			
			<!-- Partie statistiqes -->
			<?php 
				// fermeture des requêtes.
				include("close.php");
				// affichage des statistiques avec les variables non-purgées
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
