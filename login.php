<?php include ("includes/head.php");


	if(isset($_POST['submit']))
	{
		$login = $_POST['login'];
		$mdp = sha1($_POST['mdp']);
		
		$requete = $bdd->query("SELECT * FROM user WHERE login = '".$login."' 
								AND mdp = '".$mdp."'");
		
		if($reponse = $requete->fetch())
		{
			$_SESSION["connecte"]= true;
			$_SESSION['id'] = $reponse['id_u'];
            $_SESSION['lvl'] = $reponse['lvl'];
			header("location:index.php");
		}
		else
		{
			echo "<center><h4>mauvais identifiant</h4></center>";
		}
	}
?>

<div id="connexion"></div>

<div class="container">
      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">connectez-vous</h2>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Login" name="login">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="mdp">

        <button class="btn btn-lg btn-primary btn-block signbtn" type="submit" name="submit">Connexion</button>
      </form>
    </div> 



<?php include ("includes/footer.php"); ?>