<?php


    require "modele/gestionmembreModel.php";
if(isset($_SESSION['connecte']))
{
    

    $id_u = $_SESSION['id'];

    $reponse = displayReservedPlace($id_u);
    $info = displayInfo($id_u);



    if(isset($_POST['submit']))
    {
        
        $deb = $_POST['deb'];
        $fin = $_POST['fin'];
        
        reservePlace($id_u, $deb, $fin);
        
        var_dump($_POST);
        
        header("location:".BASE_URL."/userController");
    }
}
else
{
    header("Location:index.php?p=accueil");
}
    require "view/gestionmembreView.php";

?>



