<?php session_start();
	try
	{
		$bdd = new PDO("mysql:host=localhost;
		               dbname=auto_ecole;charset=utf8","root","");
	}
	catch(Exception $e)
	{
		die("erreur de connexion");
	}
?>
<html lang="fr">

<head>
    <link href="zoombox.css" rel="stylesheet" type="text/css" media="screen"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Parking</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/style.css" rel="stylesheet">
   

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
  <body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
 <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                       <a href="#portfolio">Accueil</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">à propos</a>
                    </li>
                     <?php if (isset($_SESSION['connecte']))
                            {
                                echo "<li class='compte'><a href='logout.php'>Déconnexion</a></li>";
                            }
                            else
                            {
                                echo "<li class='page-scroll'>
                                        <a href='login.php#connexion'>Connexion</a>
                                      </li>
                                      <li class='page-scroll'>
                                        <a href='inscription.php'>Inscription</a>
                                      </li>";
                            }
                    ?>
                    
                    <?php
                    
                     if(isset($_SESSION['connecte']))
                            {
                                if($_SESSION['lvl']>2)
                                  {
                                    echo '<li class="page-scroll">
                                            <a href="gestionadmin.php">Gestion-admin</a>
                                          </li>';
                                  }
                                    elseif ($_SESSION['lvl']==2)
                                  {
                                     echo '<li class="page-scroll">
                                                <a href="gestionmoni.php?id='.$_SESSION['id'].'">Gestion-Moniteur</a>
                                            </li>';
                                  }
                                    else
                                  {
                                     echo '<li class="page-scroll">
                                                <a href="gestionmembre.php?id='.$_SESSION['id'].'">Gestion-Membres</a>
                                            </li>';
                                  }
                                                
                            }
                    ?>
                    
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">Parking</span>
                        <hr class="star-light">
                        <span class="skills" id="connexion">Uniquement pour les Membres</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

