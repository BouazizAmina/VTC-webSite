<?php
require_once('../controllers/controller.php');
class vue{
    function entete_page(){?>
       <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/style.css" type="text/css">
            <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
            <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
            <link rel="stylesheet" href="../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
            <title>VTC</title>
        </head><?php 
    }

    function scripts(){?>
        <script src="../node_modules/jquery/dist/jquery.slim.min.js"></script>
        <script src="../node_modules/jquery/dist/jquery.min.js"></script>
        <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="../node_modules/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
        <script src="../js/scripts.js"></script><?php
    }

    function footer(){?>
        <footer>
            <div class="container">
                <div class="row mt-5"> 
                    <div class="col-4 offset-1 col-sm-2">
                        <h5>Liens</h5>
                        <ul class="list-unstyled links"><?php
                            if(isset($_SESSION["id"])){?>
                                <li><a href="accueilConnect.php">Accueil</a></li><?php
                            }else{?>
                                <li><a href="accueil.php">Accueil</a></li><?php
                            }?>
                            <li><a href="presentation.php">Presentation</a></li>
                            <li><a href="news.php">News</a></li><?php
                            if(isset($_SESSION["id"])){
                            }else{?>
                            <li><a href="inscription.php">Inscription</a></li><?php
                            }?>
                            <li><a href="statistique.php">Statistique</a></li>
                            <li><a href="contact.php">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-7 col-sm-5">
                        <h5>Adresse</h5>
                        <address>
                        121, Alger Centre<br>
                        ALGERIE<br>
                        <i class="fa fa-phone fa-lg"></i>: +216 665812520<br>
                        <i class="fa fa-envelope fa-lg"></i>:  <a href="mailto:vtc@gmail.con">vtc@gmail.con</a>
                    </address>
                    </div>
                    <div class="col-12 col-sm-4 align-self-center">
                        <div class="text-center">
                            <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                            <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                            <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                            <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                            <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
            </div>
            <div class="row justify-content-center">             
                    <div class="col-auto">
                        <p>© Copyright 2022 VTC</p>
                    </div>
            </div>
            </div>
        </footer><?php
    }

    function getWialayVue(){
        $model = new controller();
        $wil = $model ->getWilayaController();
        foreach($wil as $wilaya){?>
            <option value="<?=$wilaya ['nom']?>"><?=$wilaya ['nom']?></option><?php
        }
    }

    function nav(){?>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto offset-1 offset-sm-0" href="#"><img src="../assets/logo3.png"  width="100px"></a>
            <div class="collapse navbar-collapse offset-1" id="Navbar">
                <ul class="navbar-nav mr-auto"><?php
                if(isset($_SESSION["id"])){?>
                    <li class="nav-item "><a class="nav-link" href="accueilConnect.php"><span class="fa fa-home fa-lg"></span> Accueil</a></li><?php
                }else{?>
                    <li class="nav-item "><a class="nav-link" href="accueil.php"><span class="fa fa-home fa-lg"></span> Accueil</a></li><?php
                }?>
                    <li class="nav-item"><a class="nav-link" href="presentation.php"><span class="fa fa-info fa-lg"></span> Presentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="news.php"><i class="fa fa-newspaper-o fa-lg"></i> News</a></li><?php
                if(isset($_SESSION["id"])){
                }else{?>
                    <li class="nav-item "><a class="nav-link" href="inscription.php"><span class="fa fa-sign-in fa-lg"></span> Inscription</a></li><?php
                }?>
                    <li class="nav-item"><a class="nav-link" href="statistique.php"><i class="fa fa-bar-chart"></i> Statistique</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                </ul>
                <div><?php
                if(isset($_SESSION["id"])){?>
                    <div class="nav-item dropdown">
                        <a class="nav-link profil dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user fa-lg"></i>Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="profil.php">Gérer votre profil</a>
                            <a class="dropdown-item" href="profilHistorique.php">Gérer l'historique</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signalement.php">Signalement</a>
                        </div>
                    </div>  <?php              
                }else{?>
                    <a class="btn btn-sm" href="#" id="login" role="button">Connexion</a>
                    <a class="btn btn-sm" href="inscription.php" role="button">Inscription</a>                
               <?php }?>
                    
                    
                </div>
            </div>         
        </div>
    </nav><?php
    }

    function navProfil(){?>
        <nav class="navbar navbar-dark navbar-expand-md fixed-top">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand mr-auto offset-1 offset-sm-0" href="#"><img src="../assets/logo3.png"  width="100px"></a>
                <div class="collapse navbar-collapse offset-1" id="Navbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="accueilConnect.php"><span class="fa fa-home fa-lg"></span> Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="presentation.php"><span class="fa fa-info fa-lg"></span> Presentation</a></li>
                        <li class="nav-item"><a class="nav-link" href="news.php"><i class="fa fa-newspaper-o fa-lg"></i> News</a></li>
                        <li class="nav-item"><a class="nav-link" href="statistique.php"><i class="fa fa-bar-chart"></i> Statistique</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                    </ul>
                    <div>
                        <div class="nav-item dropdown">
                            <a class="nav-link profil dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user fa-lg"></i>Profil
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="profil.php">Gérer votre profil</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="profilHistorique.php">Gérer l'historique</a>
                                
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </nav><?php
    }

}  
?>