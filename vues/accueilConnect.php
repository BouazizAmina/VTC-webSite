<!DOCTYPE html>
<html lang="en">
<?php
    // session_start();
    require_once('views/vue.php');
    require_once('views/vueAccueil.php');
    
    $vue = new vue();
    $vue -> entete_page();
    $vueAccueil = new vueAccueil();
    $err = $vueAccueil -> setAjoutAnnonceVue();
    // echo $_SESSION["id"];
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
                            <a class="dropdown-item" href="profilHistorique.php">Gérer l'historique</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="signalement.php">Signalement</a>
                        </div>
                    </div>
                </div>
            </div>         
        </div>
    </nav>


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

    <div class="container p-sm-5 ml-sm-3">
        <div class="row ">
            <div class="col-12">
               <h3 >Ajouter une annonce </h3>
               <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <p style="color:red;"><?php echo "$err";?></p>
                <form class="mb-5" method="POST" enctype="multipart/form-data">
                
                    <div class="form-group row ">
                        
                        <label class="col-sm-3 col-form-label" for="titre"><strong>Titre de l'annonce</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'annonce" required >
                        </div>   
                    </div> 

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="desc"><strong>Description de l'annonce</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="desc" name="desc" placeholder="Description de l'annonce" required >
                        </div>   
                    </div>


                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="image"><strong>Image de l'annonce</strong></label>
                        <div class="col-sm-5 ">
                            <input type="file" class="form-control" id="image" name="image" placeholder="Image de l'annonce" >
                        </div>   
                    </div>

                    <div class="form-group row">
                        <label for="departC" class="col-sm-3 col-form-label"><strong>Wilaya de départ</strong></label>
                        <div class="col-sm-5"> 
                            <select name="departC[ ]" id="departC" class="form-control" required>
                                <option value="">L’emplacement de départ</option>
                                <?php  $vue -> getWialayVue();?>
                        </select>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="arriveC" class="col-sm-3 col-form-label"><strong>Wilaya de d'arrive</strong></label>
                        <div class="col-sm-5"> 
                            <select name="arriveC[ ]" id="arriveC" class="form-control" required>
                                <option value="">L’emplacement d’arriver</option>
                                <?php  $vue -> getWialayVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="tTran" class="col-sm-3 col-form-label"><strong>Type de transport</strong></label>
                        <div class="col-sm-5"> 
                            <select name="tTran[ ]" id="tTran" class="form-control" required>
                                <option value="">Type de transport</option>
                                <?php  $vueAccueil -> getTTransportVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="mTran" class="col-sm-3 col-form-label"><strong>Moyen de transport</strong></label>
                        <div class="col-sm-5"> 
                            <select name="mTran[ ]" id="mTran" class="form-control" required>
                                <option value="">Moyen de transport</option>
                                <?php  $vueAccueil -> getMTransportVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="poid" class="col-sm-3 col-form-label"><strong>Fourchette de poids</strong></label>
                        <div class="col-sm-5"> 
                            <select name="poid[ ]" id="poid" class="form-control" required>
                                <option value="">Fourchette de poids</option>
                                <?php  $vueAccueil -> getPoidVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="volume" class="col-sm-3 col-form-label"><strong>Fourchette de volume</strong></label>
                        <div class="col-sm-5"> 
                            <select name="volume[ ]" id="volume" class="form-control" required>
                                <option value="">Fourchette de volume</option>
                                <?php  $vueAccueil -> getVolumeVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label"><strong>Date d'ajout</strong></label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control" id="date" name="date" placeholder="Date d'ajout" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-10">
                            <button type="submit" name="ajoutAnnonce" class="btn btn-primary" >Soumettre</button>
                        </div>
                    </div>

                </form>
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
                <a class="btn btn-lg btn-primary" href="presentation.html">Comment cela fonctionne</a>
            </div>
        </div>
    </div>

    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>