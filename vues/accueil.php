<?php
$m=new accueil();
$m->afficher_site();
class accueil{
    function afficher_site(){?>
        <!DOCTYPE html>
        <html lang="en">
        <?php
            session_start();
            session_destroy();
            require_once('views/vue.php');
            require_once('views/vueAccueil.php');
            require_once('views/vueInscription.php');

            $vue = new vue();
            $vue -> entete_page();

            $vueAccueil = new vueAccueil();

            $vueInscription = new vueInscription();
            $errLC= $vueInscription -> loginCVue(); 
            $errLT= $vueInscription -> loginTVue(); 
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
                            <li class="nav-item"><a class="nav-link" href="presentation.php"><span class="fa fa-info fa-lg"></span> Presentation</a></li>
                            <li class="nav-item"><a class="nav-link" href="news.php"><i class="fa fa-newspaper-o fa-lg"></i> News</a></li>
                            <li class="nav-item"><a class="nav-link" href="inscription.php"><span class="fa fa-sign-in fa-lg"></span> Inscription</a></li>
                            <li class="nav-item"><a class="nav-link" href="statistique.php"><i class="fa fa-bar-chart"></i> Statistique</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.php"><span class="fa fa-address-card fa-lg"></span> Contact</a></li>
                        </ul>
                        <div>
                            <a class="btn btn-sm" href="#" id="login" role="button">Connexion</a>
                            <a class="btn btn-sm" href="inscription.php" role="button">Inscription</a>
                        </div>
                    </div>         
                </div>
            </nav>

           
            <?php $vueInscription -> login();?>
            
            <div class="container mb-3">
                <p style="color:red;"><?php echo $errLC ;?></p>
                <p style="color:red;"><?php echo $errLT ;?></p>
            </div>

            <div class="container">
                <div class="row row-content">
                    <div class="col">
                        <div id="mycarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <?php $vueAccueil ->getDiapoVue();?>
                            </div>
                            <ol class="carousel-indicators">
                                <?php  $vueAccueil ->getIndicatorDiapo();?>
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

            <div class="container ">
                <div class="row row-content search d-flex justify-content-center">
                    <div class="col-12 col-sm-7 titleAnnonce" >
                        <h4 class="text-center d-block d-sm-none">Rechercher une annonce</h4>
                        <h2 class="text-center d-none d-sm-block">Rechercher une annonce</h2>
                    </div>
                    <div>
                        <form class="form-inline " method="post">
                            <div class="form-group row mr-4 d-flex justify-content-center">
                                <div class="col-12 col-md-7 pl-5 "> 
                                    <select name="flower[ ]" id="depart" class="form-control" >
                                        <option value="">L’emplacement de départ</option>
                                        <?php  $vue -> getWialayVue();?>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row mr-4 d-flex justify-content-center">
                                <div class="col-12 col-md-7 pl-5 "> 
                                    <select name="flower2[ ]" id="arrive" class="form-control" placeholder="L’emplacement d’arriver">
                                        <option value="">L’emplacement d’arriver</option>
                                        <?php  $vue -> getWialayVue();?>
                                </select>
                                </div>
                            </div> 
                            <div class="form-group row mr-4 d-flex justify-content-center">
                                <div class="col-12 col-md-7 pl-5 ">
                                    <input type="submit" class="btn" role="button" name="searchNC" value="Rechercher"></input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php  $vueAccueil ->searchNonCVue();?>

            <div class="container">
            <?php  $vueAccueil ->getCardVue();?>
            </div>

            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-auto">
                        <a class="btn btn-lg btn-primary" href="presentation.php">Comment cela fonctionne</a>
                    </div>
                </div>
            </div>

            <?php
                $vue -> footer();
                $vue -> scripts();
            ?>
        </body>
        </html><?php
}
}
?>
