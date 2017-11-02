<?php 

require "modele/inscriptionModel.php";

    
$page = "inscriptionController";


	if(isset($_POST['submit']))
	{
			$i = 0;
            $nom = htmlentities($_POST["nom"]);
            $prenom = htmlentities($_POST["prenom"]);
            $adresse = htmlentities($_POST["adresse"]);
            $cp = htmlentities($_POST["cp"]);
            $ville = htmlentities($_POST["ville"]);
			$mail = htmlentities($_POST["mail"]);
			$mdp = htmlentities($_POST["mdp"]);
			$confirm = htmlentities($_POST["confirm"]);
			
        if(empty($nom))
			{
				$i++;
				$message .= "Votre nom est vide <br/>";
			}
        if(empty($prenom))
			{
				$i++;
				$message .= "Votre prenom est vide <br/>";
			}
        if(empty($adresse))
			{
				$i++;
				$message .= "Votre adresse est vide <br/>";
			}
        if(empty($cp))
			{
				$i++;
				$message .= "Votre code postal est vide <br/>";
			}
        if(empty($ville))
			{
				$i++;
				$message .= "Votre ville est vide <br/>";
			}
			if(empty($mail))
			{
				$i++;
				$message .= "Votre email est vide";
			}
			if (empty($mdp))
			{
				$i++;
				$message .="Votre mdp est vide <br/>";
			}
			if (empty($confirm))
			{
				$i++;
				$message .="Votre confirmation est vide <br/>";
			}
			
			
			if($i>0)
			{
				echo "Vous avez ".$i." erreurs<br/>";
				echo $message;
			}
			
        
        if(sha1($_POST['mdp']) != (sha1($_POST['confirm'])))
          {
            echo "Vos mots de passe ne correspondent pas. <br />";
          }
        else
        {
            header('Location: index.php?p=accueil');
        }
	}

require "view/inscriptionView.php";
?>

	