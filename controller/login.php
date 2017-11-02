<?php 
$page = "login";

if(isset($_POST['submit']))
{
    $mail = $_POST['mail'];
    $mdp = sha1($_POST['mdp']);

    $requete = $bdd->prepare("SELECT * FROM user WHERE mail = :mail AND mdp = :mdp");
    $requete->bindValue(":mail",$mail,PDO::PARAM_STR);
    $requete->bindValue(":mdp",$mdp,PDO::PARAM_STR);
    $requete->execute();

    if($reponse = $requete->fetch())
    {
        $_SESSION['connecte'] = true;
        $_SESSION['id_u'] = $reponse['id_u'];
        if(isset($_POST['remember']))
        {
            setcookie('auth',$reponse['id_u']."-----".sha1($reponse['mail'].$reponse['mdp'].$_SERVER['REMOTE_ADDR']),time()+(3600*24*3),'/','localhost',false,true); //le dernier argument evite que le cookie soit editable en javascript
        }

        header("Location:index.php?p=accueil");
    }
    else
    {
        echo "Mauvais identifiant";
    }
}
?>


<div class="container">
      <form class="form-signin" action="#" method="post">
        <h2 class="form-signin-heading">connectez-vous</h2>
        <label for="inputEmail" class="sr-only">Mail</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Mail" name="mail">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="mdp">         
        Se souvenir de moi <input value="" type="checkbox" name="remember">

        <button class="btn btn-lg btn-primary btn-block signbtn" type="submit" name="submit">Connexion</button>
      </form>
    </div> 