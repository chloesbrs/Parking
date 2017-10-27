<!DOCTYPE html>
<html>
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
                <a class="navbar-brand" href="index.php?p=accueil">Home</a>
            </div>
 <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="page-scroll">
                       <a href="index.php?p=accueil">Accueil</a>
                    </li>
                    <li class="page-scroll">
                        <a href="#about">à propos</a>
                    </li>
                     <?php if (isset($_SESSION['connecte']))
                            {
                                echo "<li class='compte'><a href='index.php?p=logout'>Déconnexion</a></li>";
                            }
                            else
                            {
                                echo "<li class='page-scroll'>
                                        <a href='index.php?p=login'>Connexion</a>
                                      </li>
                                      <li class='page-scroll'>
                                        <a href='index.php?p=inscription'>Inscription</a>
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



    <div>
        <?php echo $content; ?>
    </div>
  <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>à propos</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-lg-offset-2">
                    <p>Notre auto-école a été créer dans le but de servir les stars et uniquement les stars, vous vous demandez si c'est possible de passer le permis de conduire avec une Porshe et un personnage connu n'est-ce pas ? Et bien NOUS le faisons !</p>
                </div>
                <div class="col-lg-4">
                    <p>Créer en 1980, l'auto-école STEFANOVIC vous donne plusieur aspect de la vie que vous devez savourez avec plaisir durant votre formation.</p>
                </div>
            </div>
        </div>
    </section>
     <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>Paris 15</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Nous contacter</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>auto-école STEFANOVIC</h3>
                        <p>Inventé, crée et construit par Marko STEFANOVIC.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright &copy; Your Website 2016
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

    	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
			<script type="text/javascript" src="zoombox.js"></script>
		<script>
        jQuery(function($){

            $('a.zoombox').zoombox({
                theme       : 'zoombox',        //available themes : zoombox,lightbox, prettyphoto, darkprettyphoto, simple
                opacity     : 0.8,              // Black overlay opacity
                duration    : 800,              // Animation duration
                animation   : true,             // Do we have to animate the box ?
                width       : 600,              // Default width
                height      : 400,              // Default height
                gallery     : true,             // Allow gallery thumb view
                autoplay : false                // Autoplay for video
            });

        });
        </script>

    </body>
</html>
