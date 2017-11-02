<?php 

require "modele/inscriptionModel.php";

    
$page = "inscriptionController";


	if(isset($_POST['submit']))
	{
			$i = 0;
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
			$mail = $_POST["mail"];
			$mdp = $_POST["mdp"];
			$confirm = $_POST["confirm"];
			
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
						
			if($mdp != $confirm)
			{
				$i++;
				$message .="Vos mdps ne correspondent pas <br/>";
			}
			
			
			if($i>0)
			{
				echo "Vous avez ".$i." erreurs<br/>";
				echo $message;
			}

        	else{
             $reponse = inscription($nom, $prenom, $mail, $mdp, $confirm);
        
             $_SESSION['connecte'] = true;
             $_SESSION['id_u'] = $bdd->lastInsertId();
             $_SESSION['nom'] = $nom;
             $_SESSION['prenom'] = $prenom;
             $_SESSION['mail'] = $mail;
             $_SESSION['lvl'] = 1;   
            
            header("location: index.php");
            }
            
	}

require "view/inscriptionView.php";
?>

	