<!DOCTYPE html>
<html lang="en">
<?php
session_start();
    require_once('views/vue.php');
    require_once('views/vueNews.php');
    require_once('views/vueInscription.php');
    $vue = new vue();
    $vue -> entete_page();
    $vueNews = new vueNews();

    $vueInscription = new vueInscription();
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
        <div class="row mt-5 mt-sm-0">
            <div class="col titleCard">
                <h4 class="text-center d-block d-sm-none">Les actualités les plus récentes</h4>
                <h1 class="d-none d-sm-block">Les actualités les plus récentes</h1>
            </div>
        </div>  
        <div class="row mt-2">
            <?php  $vueNews ->getCardNewsVue();?>
        </div>
    </div>


    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>