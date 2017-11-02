<?php

    function afficherUser()
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM user where lvl < 3");
        $req->execute();

        return $req->fetchAll();
    }

    function suppUser($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("DELETE FROM user WHERE id_u =".$id_u);
        $req->execute();

        return $req->fetch();
    }


// voir la liste d'attente des places pour accepter ou refuser les places
    function waitList()
    {
        global $bdd;

        $req = $bdd->query("SELECT u.nom, u.prenom, r.lvl, p.nom_p, p.id_p, r.date_deb FROM reserver r, user u, place p WHERE r.lvl = 0 AND r.id_p = p.id_p AND u.id_u = r.id_u ORDER BY r.timestamp DESC");

        return $req;
    }
// Accepter la place
    function acceptPlace($id_p)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE reserver SET lvl = 1 WHERE id_p = :id_p");
        $req->bindValue(":id_p", $id_p,  PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }
// Refuser La place
    function denyPlace($id_p)
    {
        global $bdd;

        $req = $bdd->prepare("UPDATE reserver SET lvl = 2 WHERE id_p = :id_p");
        $req->bindValue(":id_p", $id_p, PDO::PARAM_INT);
        $req->execute();

        return $req->fetch();
    }

    function ajoutPlace($nom_p)
    {
        global $bdd;

        $requete = $bdd->prepare("INSERT INTO place(nom_p) VALUES (:nom_p)");

        $requete->bindValue(":nom_p", $nom_p,PDO::PARAM_STR);
        $requete->execute();

        return $requete->fetch();
    }


    function displayUsedPlace()
    {
        global $bdd;
        
        $req = $bdd->prepare("SELECT p.id_p, p.nom_p, u.nom, u.prenom FROM reserver r, place p, user u WHERE p.id_p = o.id_p AND r.id_u = u.id_u AND r.lvl > 0");
        $req->execute();
        
        return $req;
    }

    function deleteUsedPlace($id_p)
    {
        global $bdd;
        
        $req = $bdd->prepare("DELETE FROM reserver WHERE id_p=".$id_p);
        
        $req->execute();

        return $req->fetch();
    }













?>
