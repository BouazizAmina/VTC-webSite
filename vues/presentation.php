<!DOCTYPE html>
<html lang="en">
<?php
session_start();
    require_once('views/vue.php');
    require_once('../controllers/controllerPresentation.php');
    require_once('views/vueInscription.php');
    $vue = new vue();
    $vue -> entete_page();

    $vueInscription = new vueInscription();
    $pres = new controllerPresentation();

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

    <div class="container ">
        <div class="row about">
            <div class="col-12 about mt-5 mt-md-0">
                <img src="<?php $pres->imageController(); ?>" alt="Snow" style="width:100%;">
                <div class="centered d-none d-sm-block ">
                    <h1>VTC </h1>
                    <h6>Véhicule de Transport avec Chauffeur</h6>
                    <a class="btn btn-sm" href="#video" role="button">Voir une vidéo détaliée</a>
                </div>
            </div>
        </div>

    </div>

    <div class="container">
        <div class="row description">
            <div class="col-9 offset-2 mt-5 mb-5 col-sm-8">
                <div class="text-center">
                    <h3 style="color: #8ca9d3;" >Une description de VTC</h3>
                </div>
                <p class="text-justify">
                    <?php $pres->texteController(); ?>
                </p>
            </div>
        </div>
        <div class="container">
            <center><video id="video" src="<?php $pres->videoController(); ?>" controls preload="auto" playauto loop width="100%"></video></center>
        </div>
    </div>
    
    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>