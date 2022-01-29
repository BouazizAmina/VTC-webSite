<?php
require_once('../controllers/controllerNews.php');
class vueNews{
    function getCardNewsVue(){
        $model = new controllerNews();
        $cards = $model ->getCardNewsController();
        foreach(array_reverse($cards) as $card){?>
            <div class="col-6 col-sm-3 mb-3">
                <div class="card bg-light"  >
                    <img class="card-img-top" src="<?=$card ['image']?>" alt="<?=$card ['titre']?>" style="max-height: 10rem;">
                    <div class="card-body" style="min-height: 15rem;">
                        <h5 class="card-title"><?=$card ['titre']?></h5>
                        <p class="card-text"><?=substr($card ['texte'],0,40);?> <a href="vueNewsDetails.php?id=<?= $card['id_news'] ?>">lire la suite</a></p>
                    </div>
                </div>
            </div><?php
        }
    }

    function getTitre1News($id){
        $model = new controllerNews();
        $news = $model ->getNewsController($id);?>
        <li class="breadcrumb-item active"><?=$news ['titre']?></li><?php
    }

    function getTitre2News($id){
        $model = new controllerNews();
        $news = $model ->getNewsController($id);?>
        <h3><?=$news ['titre']?></h3><?php
    }

    function getTexteNews($id){
        $model = new controllerNews();
        $news = $model ->getNewsController($id);?>
        <p class="text-justify"><?=$news ['texte']?></p><?php
    }

    function getLinkNews($id){
        $model = new controllerNews();
        $news = $model ->getNewsController($id);
        if($news ['lien'] != null){?>
        <h4 class="card-header bg-primary text-white">Pour plus d'inforamtion <a target="blank" style="color:white; font-size:70%;" href="<?=$news ['lien']?>">Cliquez ici</a></h4>
        <?php }?>
        <div class="card-body">
            <img class="card-img-bottom" src="<?=$news ['image']?>" alt="<?=$news ['titre']?>">
        </div><?php
    }

}
?>