<?php
session_start();
require_once('../controllers/controllerAccueil.php');
class vuePresentation{
    function getDiapoVue(){
        $first=true;
        $model = new controllerAccueil();
        $diapos = $model ->getDiapoController();
        foreach((array) $diapos as $diapo){
            if($first == true){?>
                <div class="carousel-item mx-0 active">
                    <div class="d-flex  w-100 h-100">
                    <a href="vueNewsDetails.php?id=<?= $diapo['id_news'] ?>">
                        <img class="d-none d-sm-block img-fluid" src= "<?=$diapo ['image']?>" alt="<?=$diapo ['titre']?>">
                        <img class="d-block d-sm-none img-fluid" src= "<?=$diapo ['xs_image']?>" alt="<?=$diapo ['titre']?>">
                    </a>
                    </div>
                </div><?php
                $first = false;
            }else{?>
                <div class="carousel-item mx-0 ">
                    <div class="d-flex  w-100 h-100">
                        <a  href="vueNewsDetails.php?id=<?= $diapo['id_news'] ?>">
                            <img class="d-none d-sm-block img-fluid" src= "<?=$diapo ['image']?>" alt="<?=$diapo ['titre']?>">
                            <img class="d-block d-sm-none img-fluid" src= "<?=$diapo ['xs_image']?>" alt="<?=$diapo ['titre']?>">
                        </a>
                    </div>
                </div><?php
            }
        }
    }
}
?>