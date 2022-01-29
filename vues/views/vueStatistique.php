<?php
require_once('../controllers/controllerStatistique.php');
class vueStatistique{
    function NumberusersVue(){
        $model = new controllerStatistique();
        $nb = $model ->NumberusersModel();?>
        <div class="card border border-warning shadow p-3 mb-5 bg-light rounded"  >
            <div class="card-body" style="min-height: 10rem;"> 
            <h5 class="text-center card-title">Nombre d’utilisateurs</h5></br>
            <h1 style="color:#f26659;" class="text-center card-text"><?=$nb?> utilisateurs</h1>
            </div>
        </div><?php
        
    }
    function NumberAnnVue(){
        $model = new controllerStatistique();
        $nb = $model ->NumberAnnModel();?>
        <div class="card border border-warning shadow p-3 mb-5 bg-light rounded"  >
            <div class="card-body" style="min-height: 10rem;"> 
            <h5 class="text-center card-title">Nombre d’annonces</h5></br>
            <h1 style="color:#f26659;" class="text-center card-text"><?=$nb?> annonces</h1>
            </div>
        </div><?php
        
    }

    function getCardVue(){
        $model = new controllerStatistique();
        $cards = $model ->getCardController();
        $i=0;?>
        <div class="row mt-2"><?php
        foreach($cards as $card){
            if($i<4 && $card["archive"] != 1){
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
}
?>