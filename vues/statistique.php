<!DOCTYPE html>
<html lang="en">
<?php
// session_start();
    require_once('views/vue.php');
    require_once('views/vueInscription.php');
    require_once('views/vueStatistique.php');
    require_once('views/vueAccueil.php');
    // session_start();
    $vue = new vue();
    $vue -> entete_page();
    $vueInscription = new vueInscription();
    $vueStatistique = new vueStatistique();
    $vueAccueil = new vueAccueil();

    $errLC= $vueInscription -> loginCVue(); 
    $errLT= $vueInscription -> loginTVue(); 
    

?>
<body>
    <?php $vue-> nav();?>

    <?php $vueInscription -> login();?>

    <div class="container mb-3">
        <p style="color:red;"><?php echo $errLC ;?></p>
        <p style="color:red;"><?php echo $errLT ;?></p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 mt-sm-0 mt-5">
                <?php $vueStatistique ->NumberusersVue();?>
            </div>
            <div class="col-12 col-sm-6 ">
                <?php $vueStatistique ->NumberAnnVue();?>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col titleCard">
                <h4 class="text-center d-block d-sm-none">Les 4 annonces les plus récentes</h4>
                <h1 class="text-center d-none d-sm-block">Les 4 annonces les plus récentes</h1>
            </div>
        </div>  
        <div class="row mt-2">
            <?php  $vueStatistique ->getCardVue();?>
        </div>
    </div>
</div>

    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>