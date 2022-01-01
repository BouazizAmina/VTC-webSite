<!DOCTYPE html>
<html lang="en">
<?php
    require_once('views/vue.php');
    require_once('views/vueAccueil.php');
    $vue = new vue();
    $vue -> entete_page();
?>
<body>
    <nav class="navbar navbar-dark navbar-expand-md fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand mr-auto offset-1 offset-sm-0" href="#"><img src="../assets/logo3.png"  width="100px"></a>
            <div class="collapse navbar-collapse offset-1" id="Navbar">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="#"><span class="fa fa-home fa-lg"></span> Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="presentation.html"><span class="fa fa-info fa-lg"></span> Presentation</a></li>
                    <li class="nav-item"><a class="nav-link" href="news.html"><i class="fa fa-newspaper-o fa-lg"></i> News</a></li>
                    <li class="nav-item"><a class="nav-link" href="inscription.html"><span class="fa fa-sign-in fa-lg"></span> Inscription</a></li>
                    <li class="nav-item"><a class="nav-link" href="statistique.html"><i class="fa fa-bar-chart"></i> Statistique</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                </ul>
                <div>
                    <a class="btn btn-sm" href="#" role="button">Connexion</a>
                    <a class="btn btn-sm" href="#" role="button">Inscription</a>
                </div>
            </div>         
        </div>
    </nav>

    <div class="container">
        <div class="row row-content">
            <div class="col">
                <div id="mycarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <?php 
                            $diapo = new vueAccueil();
                            $diapo ->getDiapoVue();?>
                    </div>
                    <ol class="carousel-indicators">
                    <?php 
                            $diapo = new vueAccueil();
                            $diapo ->getIndicatorDiapo();?>
                    </ol>
                    <a class="carousel-control-prev" href="#mycarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#mycarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                    <button class="btn btn-danger btn-sm" id="carouselButton">
                        <span id="carousel-button-icon" class="fa fa-pause"></span>
                    </button>
                </div>
             </div>
        </div>

    </div>

    <div class="container search">
        <div class="row row-content d-flex justify-content-center">
            <div class="col-12 col-sm-7 titreAnnonce" >
                <h4 class="text-center d-block d-sm-none">Rechercher une annonce</h4>
                <h1 class="text-center d-none d-sm-block">Rechercher une annonce</h1>
            </div>
            <div>
                <form class="form-inline ">
                    <div class="form-group row mr-4 d-flex justify-content-center">
                        <div class="col-12 col-md-7 pl-5 pl-sm-0">
                            <input type="text" class="form-control" id="depart" name="depart" placeholder="L’emplacement de départ">
                        </div>   
                    </div>
                    <div class="form-group row mr-4 d-flex justify-content-center">
                        <div class="col-12 col-md-7 pl-5 pl-sm-0">
                            <input type="text" class="form-control" id="arrive" name="arrive" placeholder="L’emplacement d’arriver">
                        </div>   
                    </div>
                    <div class="form-group row mr-4 d-flex justify-content-center">
                        <div class="col-12 col-md-7 pl-5 ">
                            <input type="submit" class="btn" role="button" value="Rechercher"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-5">
            <div class="col-6 col-sm-3">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="../assets/annonces/colis.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="row mt-5"> 
                <div class="col-4 offset-1 col-sm-2">
                    <h5>Liens</h5>
                    <ul class="list-unstyled links">
                        <li><a href="#">Accueil</a></li>
                        <li><a href="presentation.html">Presentation</a></li>
                        <li><a href="news.html">News</a></li>
                        <li><a href="inscription.html">Inscription</a></li>
                        <li><a href="statistique.html">Statistique</a></li>
                        <li><a href="contact.html">Contact</a></li>
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
    </footer>

    <?php
        $vue -> scripts();
    ?>
</body>
</html>