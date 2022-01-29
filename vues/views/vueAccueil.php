<?php
session_start();
require_once('../controllers/controllerAccueil.php');
class vueAccueil{
    function getDiapoVue(){
        $first=true;
        $model = new controllerAccueil();
        $diapos = $model ->getDiapoController();
        foreach((array) $diapos as $diapo){
            if($first == true){?>
                <div class="carousel-item mx-0 active">
                    <div class="d-flex  w-100 h-100">
                    <a href="vueNewsDetails.php?id=<?= $diapo['id_news'] ?>">
                        <img class=" img-fluid" src= "<?=$diapo ['image']?>" alt="<?=$diapo ['titre']?>">
                    </a>
                    </div>
                </div><?php
                $first = false;
            }else{?>
                <div class="carousel-item mx-0 ">
                    <div class="d-flex  w-100 h-100">
                        <a  href="vueNewsDetails.php?id=<?= $diapo['id_news'] ?>">
                            <img class="img-fluid" src= "<?=$diapo ['image']?>" alt="<?=$diapo ['titre']?>">
                        </a>
                    </div>
                </div><?php
            }
        }
    }

    function getIndicatorDiapo(){
        $i = 0;
        $model = new controllerAccueil();
        $diapos = $model ->getDiapoController();
        foreach((array) $diapos as $diapo){
            if($i == 0){?>
                <li data-target="#mycarousel" data-slide-to="0" class="active"></li><?php
                $i++;
            }else{?>
                <li data-target="#mycarousel" data-slide-to="<?=$i?>"></li><?php
                $i++;
            }
        }
    }
    
    function getCardVue(){
        $model = new controllerAccueil();
        $cards = $model ->getCardController();
        $x = $model ->getController();
        if($x == 1){$msg = 'Les annonces les plus récentes';}
        if($x == 2){$msg = 'Les annonces les meilleures notées';}
        if($x == 3){$msg = 'Les annonces validées';}
        $i=0;?>
        <div class="row mt-5">
            <div class="col titleCard">
                <h4 class="text-center d-block d-sm-none"><?= $msg ?></h4>
                <h1 class="d-none d-sm-block"><?= $msg ?></h1>
            </div>
        </div>  
        <div class="row mt-2"><?php
        foreach($cards as $card){
            if($i<8 && $card["archive"] != 1){
                $i=$i+1;?>
                <div class="col-6 col-sm-3 mb-3">
                    <div class="card bg-light"  >
                        <img class="card-img-top" src="<?=$card ['image']?>" alt="<?=$card ['titre']?>" style="max-height: 10rem;">
                        <div class="card-body" style="min-height: 13rem;">
                            <h5 class="card-title"><?=$card ['titre']?></h5>
                            <p class="card-text"><?= substr($card ['texte'],0,40);?> <a href="vueAnnonceDetails.php?id=<?= $card['id_annonce'] ?>&type=0">lire la suite</a></p>
                            <?php if(!empty($_SESSION)){
                            if($_SESSION['user'] == 0){?>
                                <a href="postuler.php?id=<?= $card['id_annonce']?>&idT=<?=$_SESSION['id']?>" class="btn btn-primary">Postuler</a>
                            <?php }}?>
                        </div>
                    </div>
                </div><?php
            }
        }?>
        </div>
        <?php
            

    }

    function searchNonCVue(){
        $model = new ControllerAccueil();
        $cards = $model ->searchNonCController();
        if($cards != NULL){?>
            <div class="container">
                <div class="row mt-5">
                    <div class="col titleCard">
                        <h6 class="text-center d-block d-sm-none">Le resultat de la recherche</h6>
                        <h1 class="d-none d-sm-block">Le resultat de la recherche</h1>
                    </div>
                </div>  
                <div class="row mt-2"><?php
                    foreach($cards as $card){?>
                        <div class="col-6 col-sm-3 mb-3">
                            <div class="card bg-light"  >
                                <img class="card-img-top" src="<?=$card ['image']?>" alt="<?=$card['titre']?>" style="max-height: 10rem;">
                                <div class="card-body" style="min-height: 13rem;">
                                    <h5 class="card-title"><?=$card ['titre']?></h5>
                                    <p class="card-text"><?=substr($card ['texte'],0,40);?> <a href="vueAnnonceDetails.php?id=<?= $card['id_annonce']?>&type=0">lire la suite</a></p>
                                </div>
                            </div>
                        </div><?php
                    }?>
                </div>
            </div><?php
        }
    }
    
    
    function getTTransportVue(){
        $model = new controllerAccueil();
        $transp = $model ->getTTransportController();
        foreach($transp as $trans){?>
            <option value="<?=$trans ['nom']?>"><?=$trans ['nom']?></option><?php
        }
    }

    function getMTransportVue(){
        $model = new controllerAccueil();
        $transp = $model ->getMTransportController();
        foreach($transp as $trans){?>
            <option value="<?=$trans ['nom']?>"><?=$trans ['nom']?></option><?php
        }
    }

    function getPoidVue(){
        $model = new controllerAccueil();
        $transp = $model ->getPoidController();
        foreach($transp as $trans){?>
            <option value="<?php echo "entre ". $trans ['min']?> <?php echo "et". $trans ['max'];?>"><?php echo "entre ". $trans ['min']?> <?php echo "et". $trans ['max'];?></option><?php
        }
    }

    function getVolumeVue(){
        $model = new controllerAccueil();
        $transp = $model ->getVolumeController();
        foreach($transp as $trans){?>
            <option value="<?php echo "entre ". $trans ['min']?> <?php echo "et". $trans ['max'];?>"><?php echo "entre ". $trans ['min']?> <?php echo "et". $trans ['max'];?></option><?php
        }
    }

    function setAjoutAnnonceVue(){
        $model = new controllerAccueil();
        $err = $model ->setAjoutAnnonceController();
        return $err;
    }

    function getTitre1Annonce($id){
        $model = new controllerAccueil();
        $news = $model ->getAnnonceController($id);?>
        <li class="breadcrumb-item active"><?=$news ['titre']?></li><?php
    }

    function getTitre2Annonce($id){
        $model = new controllerAccueil();
        $news = $model ->getAnnonceController($id);?>
        <h3><?=$news ['titre']?></h3><?php
    }

    function infoAnnonce($id){
        $model = new controllerAccueil();
        $news = $model ->getAnnonceController($id);?>
        <table class="table table-striped"><?php
        //session_start();
        if(isset($_SESSION["id"])){?>
            <tr>
                <td>
                    <h6>Moyen de transport</h6>
                </td>
                <td>
                    <h6 style="color:#f26659"><?=$news ['moyen_transport']?></h6>
                </td>
            </tr>
            <?php }?>
            <tr>
                <td>
                    <h6>Points de départ</h6>
                </td>
                <td>
                    <h6 style="color:#f26659"><?=$news ['depart']?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Points d’arrivée</h6>
                </td>
                <td>
                    <h6 style="color:#f26659"><?=$news ['arrive']?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Type de transport</h6>
                </td>
                <td>
                    <h6 style="color:#f26659"><?=$news ['type_transport']?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Poid</h6>
                </td>
                <td>
                    <h6 style="color:#f26659"><?=$news ['poid']?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Volume</h6>
                </td>
                <td>
                    <h6 style="color:#f26659"><?=$news ['volume']?></h6>
                </td>
            </tr>
            
        </table><?php
    }
    
    

    function descAnnonceC($id){
        $model = new controllerAccueil();
        $news = $model ->getAnnonceController($id);?>
        <div class="card-body">
            <h4>Description de l'annonce</h4>
            <p ><?=$news ['texte']?></p>
        </div><?php
    }
}
?>