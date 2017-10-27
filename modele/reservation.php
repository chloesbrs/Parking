<?php
  $req = $bdd->prepare("SELECT * FROM ajouter a, user u WHERE a.id_u2 = :session AND u.id_u = a.id_u1");
  $req->bindValue(':session', $_SESSION['id_u'], PDO::PARAM_INT);
  $req->execute();
while($rep = $req->fetch())
{
    require "modele/reservation.php";
}



?>