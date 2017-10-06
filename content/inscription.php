<?php 

$page = "inscription";

	if(isset($_POST['submit']))
	{
			$i = 0;
			$login = $_POST["login"];
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
			$email = $_POST["email"];
			$mdp = $_POST["mdp"];
			$confirm = $_POST["confirm"];
			
			if(empty($login))
			{
				$i++;
				$message .= "Votre login est vide <br/>";
			}
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
			if(empty($email))
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
			
		    $bdd->exec("INSERT INTO user(login,nom,prenom,email,mdp,lvl) VALUES('".$login."','".$nom."','".$prenom."','".$email."','".sha1($mdp)."',1)");
			$_SESSION["connecte"]= true;
			$_SESSION["lvl"]= 1;
			$_SESSION["id"]= $bdd->lastInsertId();
	
			header ("location:index.php");
	}

?>
<div class="container">
      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">Inscrivez-vous</h2>
        <label for="inputLogin" class="sr-only">login</label>
        <input type="text" id="inputLogin" class="form-control" placeholder="Login" name="login" autofocus>
        <label for="inputLogin" class="sr-only">Prénom</label>
        <input type="text" id="inputPrenom" class="form-control" placeholder="Prénom" name="prenom" autofocus>
        <label for="inputNom" class="sr-only">Nom</label>
        <input type="text" id="inputNom" class="form-control" placeholder="Nom" name="nom">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Adresse Email" name="email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="mdp">
        <label for="inputComfirm" class="sr-only">Password</label>
        <input type="password" id="inputComfirm" class="form-control" placeholder="Confirmez" name ="confirm">

        <button class="btn btn-lg btn-primary btn-block signbtn" type="submit" name="submit">S'inscrire</button>
      </form>
    </div> 
	