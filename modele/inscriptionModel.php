<?php

function inscription($nom, $prenom, $adresse, $cp, $ville, $mail, $mdp)
    
    {
            global $bdd;

		    $bdd->exec("INSERT INTO user(nom,prenom,adresse,cp,ville,mail,mdp,attente,lvl) VALUES('".$nom."','".$prenom."','".$adresse."','".$cp."','".$ville."','".$mail."','".sha1($mdp)."',1,1)");

			$_SESSION["connecte"]= true;
			$_SESSION["lvl"]= 1;
			$_SESSION["id_u"]= $bdd->lastInsertId();
    }

?>