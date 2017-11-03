<?php
    require "modele/adminModel.php";
    $id_p = $_GET['id'];
    $id_u = $_SESSION['id'];

    acceptPlace($id_p);

    header("location:".BASE_URL."/adminController");
?>