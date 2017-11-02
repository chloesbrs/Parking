<?php
    function reservePlace($id_u, $debut, $fin)
    {
        global $bdd;

        $req1 = $bdd->query("CREATE VIEW mini_place AS SELECT MIN(id_p) FROM place WHERE id_p NOT IN (SELECT id_p FROM reserver)");
        
        $req = $bdd->prepare("INSERT INTO reserver(id_u, id_p, date_deb, date_fin, lvl, timestamp) VALUES (:id_u, (SELECT * FROM mini_place), :debut, :fin, 0, NOW())");

        $req->bindValue(":id_u", $id_u, PDO::PARAM_INT);
        $req->bindValue(":debut", $debut, PDO::PARAM_STR);
        $req->bindValue(":fin", $fin, PDO::PARAM_STR);
        $req->execute();

        $req2 = $bdd->query("DROP VIEW mini_place");
        
        return $req;
    }

    function displayReservedPlace($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("SELECT p.nom_p, r.lvl, r.date_deb FROM place p, user u, reserver r WHERE r.id_p = p.id_p AND r.id_u = u.id_u AND u.id_u=".$id_u);
        $req->execute();

        return $req->fetch();
    }

    function displayInfo($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("SELECT * FROM user WHERE id_u =".$id_u);
        $req->execute();

        return $req->fetch();
    }


    function displayPlaceAttente($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("SELECT p.nom_p, r.date_deb FROM place p, user u, reserver r WHERE r.id_p = p.id_p AND r.id_u = u.id_u AND u.id_u = :id_u AND r.lvl = 0");
        $req->bindValue("id_u", $id_u, PDO::PARAM_INT);
        $req->execute();

        return $req;
    }

    function displayPlaceValide($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("SELECT p.nom_p, r.date_deb FROM place p, user u, reserver r WHERE r.id_p = p.id_p AND r.id_u = u.id_u AND u.id_u = :id_u AND r.lvl = 1");
        $req->bindValue("id_u", $id_u, PDO::PARAM_INT);
        $req->execute();

        return $req;
    }

    function displayPlaceDeny($id_u)
    {
        global $bdd;

        $req = $bdd->prepare("SELECT p.nom_p, r.date_deb FROM place p, user u, reserver r WHERE r.id_p = p.id_p AND r.id_u = u.id_u AND u.id_u = :id_u AND r.lvl = 2");
        $req->bindValue("id_u", $id_u, PDO::PARAM_INT);
        $req->execute();

        return $req;
    }

?>
