<?php
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
                    <a target="blank" href="<?=$diapo ['lien']?>">
                        <img class="d-none d-sm-block img-fluid" src= "<?=$diapo ['image']?>" alt="<?=$diapo ['titre']?>">
                        <img class="d-block d-sm-none img-fluid" src= "<?=$diapo ['xs_image']?>" alt="<?=$diapo ['titre']?>">
                    </a>
                    </div>
                </div><?php
                $first = false;
            }else{?>
                <div class="carousel-item mx-0 ">
                    <div class="d-flex  w-100 h-100">
                        <a target="blank" href="<?=$diapo ['lien']?>">
                            <img class="d-none d-sm-block img-fluid" src= "<?=$diapo ['image']?>" alt="<?=$diapo ['titre']?>">
                            <img class="d-block d-sm-none img-fluid" src= "<?=$diapo ['xs_image']?>" alt="<?=$diapo ['titre']?>">
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
    
}
?>