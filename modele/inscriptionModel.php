<<<<<<< HEAD
<?php

function inscription($nom, $prenom, $adresse, $cp, $ville, $mail, $mdp)
    
    {
            global $bdd;

		    $bdd->exec("INSERT INTO user(nom,prenom,adresse,cp,ville,mail,mdp,attente,lvl) VALUES('".$nom."','".$prenom."','".$adresse."','".$cp."','".$ville."','".$mail."','".sha1($mdp)."',1,1)");

			$_SESSION["connecte"]= true;
			$_SESSION["lvl"]= 1;
			$_SESSION["id_u"]= $bdd->lastInsertId();
    }

=======
<?php

function inscription($nom, $prenom, $mail, $mdp)
    
    {
        global $bdd;
        
          $crypt = sha1($mdp);

          $req = $bdd->prepare("INSERT INTO user(id_u, nom, prenom, mail, mdp, lvl) VALUES (NULL, :nom, :prenom, :mail, :mdp, 1)");
          $req->bindValue(':nom', $nom, PDO::PARAM_STR);
          $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
          $req->bindValue(':mail', $mail, PDO::PARAM_STR);
          $req->bindValue(':mdp', $crypt, PDO::PARAM_STR);
          $req->execute();

          return $req;  
        
        header('Location: index.php?p=accueil');
    }

>>>>>>> a4396901f93a30cbd78152ca77cf3325c1db828e
?>