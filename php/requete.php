<?php
    $sql_ = ''; // requête sql

    $req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br
    />'.mysql_error());

    /* doing things */

    while ($data = mysql_fetch_array($req))
      { // on affiche les résultats
        echo 'Nom : '.$data['nom'].'<br />';
        echo 'Son tél : '.$data['telephone'].'<br /><br />';
      }

    mysql_free_result ($req); // libération de la mémoire pour $req
?>
