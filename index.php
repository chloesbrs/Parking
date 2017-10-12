<?php
session_start();
    try
            {
                $bdd = new PDO("mysql:host=localhost;dbname=parking;charset=utf8","root","");
            }
            catch(Exception $e)
            {
				die("Erreur bdd non trouvée");
            }

if(!isset($_GET['p']) || $_GET['p'] == "")
{
        $page = "accueil";
}
else
{
    if(!file_exists("content/".$_GET['p'].".php"))
        {
            $page = 404;
        }
        else
            $page = $_GET['p'];
    }
    ob_start();//suspend l'affichage
    require "content/".$page.".php";
    $content = ob_get_contents();//recuperer ce qui n'a pas ete affiché
    ob_end_clean();//reprend l'affichage

require "layout.php";
?>
