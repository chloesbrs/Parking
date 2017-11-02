<?php

    require "modele/gestionmembreModel.php";
if(isset($_SESSION['connecte']))
{
    

    $id_u = $_SESSION['id_u'];

    $reponse = displayReservedPlace($id_u);
    $info = displayInfo($id_u);



    if(isset($_POST['submit']))
    {
        
        $debut = $_POST['debut'];
        $fin = $_POST['fin'];
        
        reservePlace($id_u, $debut, $fin);
        
       
        header("location:index.php?p=gestionmembreController");
    }
}
else
{
    header("location:index.php?p=accueil");
}
    require "view/gestionmembreView.php";

?>