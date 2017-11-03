
<?php
    //Controller Supprimer user
    require "modele/adminModel.php";

    if($_SESSION['lvl'] == 3)
    {
        $r = afficherUser();
        
        if(isset($_GET['id']))
        {
            suppUser($_GET['id']);
            header("location:".BASE_URL."/adminController");
        }
    }
    else
    {
        header("location: index.php");
    }

    if(isset($_POST['submit_place']))
    {
        $nom_p = $_POST['nom_p'];
        ajoutPlace($nom_p);
        header("location:".BASE_URL."/adminController");
    }
    
    $req = waitList();

    $usedPlace = displayUsedPlace();
    $usedPlaceRefus = displayUsedPlaceRefus();
    $acceptme = afficherInscrit();

    require "view/adminView.php";


?>
