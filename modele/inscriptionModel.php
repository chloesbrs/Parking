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

?>