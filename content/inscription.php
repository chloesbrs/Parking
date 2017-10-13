<?php 

$page = "inscription";


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
			
		    $bdd->exec("INSERT INTO user(nom,prenom,adresse,cp,ville,mail,mdp,attente,lvl) VALUES('".$nom."','".$prenom."','".$adresse."','".$cp."','".$ville."','".$mail."','".sha1($mdp)."',1,1)");
			$_SESSION["connecte"]= true;
			$_SESSION["lvl"]= 1;
			$_SESSION["id"]= $bdd->lastInsertId();
        
        if(sha1($_POST['mdp']) != (sha1($_POST['confirm'])))
          {
            echo "Vos mots de passe ne correspondent pas. <br />";
          }
        else
        {
            header('Location: index.php?p=accueil');
        }
	}

?>
<div class="container">
      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">Inscrivez-vous</h2>
        <label for="inputLogin" class="sr-only">Prénom</label>
        <input type="text" id="inputPrenom" class="form-control" placeholder="Prénom" name="prenom" autofocus>
        <label for="inputNom" class="sr-only">Nom</label>
        <input type="text" id="inputNom" class="form-control" placeholder="Nom" name="nom">
        <label for="inputAdresse" class="sr-only">Adresse</label>
        <input type="text" id="inputAdresse" class="form-control" placeholder="Adresse" name="adresse">
        <label for="inputcp" class="sr-only">Code postal</label>
        <input type="number" id="inputcp" class="form-control" placeholder="Code postal" name="cp">
        <label for="inputVille" class="sr-only">Ville</label>
        <input type="text" id="inputVille" class="form-control" placeholder="Ville" name="v ille">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Adresse Email" name="mail">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="mdp">
        <label for="inputComfirm" class="sr-only">Password</label>
        <input type="password" id="inputComfirm" class="form-control" placeholder="Confirmez" name ="confirm">

        <button class="btn btn-lg btn-primary btn-block signbtn" type="submit" name="submit">S'inscrire</button>
      </form>
    </div> 
	