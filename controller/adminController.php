
<?php
    //Controller Supprimer user
    require "modele/adminModel.php";

    if($_SESSION['lvl'] == 3)
    {
        $titre = "Gestion Admin";
        $r = afficherUser();

        if(isset($_GET['id']))
        {
            deleteUser($_GET['id']);
            header("location:".BASE_URL."/adminController");
        }
    }
    else
    {
        header("location: index.php");
    }
    // Bannir User
    if (isset($_GET['id_p']))
    {
         banUser($_GET['id_p']);
        header("location:".BASE_URL."/adminController");
    }

    if(isset($_POST['submit_place']))
    {
        $nom_p = $_POST['nom_p'];
        ajoutPlace($nom_p);
        header("location:".BASE_URL."/adminController");
    }
    
    $req = waitList();

    $usedPlace = displayUsedPlace();
    
    require "view/adminView.php";
?>
