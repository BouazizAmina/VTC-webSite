<!DOCTYPE html>
<html lang="en">
<?php
    // session_start();
    require_once('views/vue.php');
    require_once('views/vueAccueil.php');
    require_once('views/vueInscription.php');
    
    $vue = new vue();
    $vue -> entete_page();
    $vueInscription = new vueInscription();

    $errLC= $vueInscription -> loginCVue(); 
    $errLT= $vueInscription -> loginTVue(); 

    $vueAnnonce = new vueAccueil();
    $id=$_GET['id'];
    $type=$_GET['type'];
?>
<body>
    <?php $vue-> nav();?>

    <?php $vueInscription -> login();?>

    <div class="container mb-3">
        <p style="color:red;"><?php echo $errLC ;?></p>
        <p style="color:red;"><?php echo $errLT ;?></p>
    </div>

    <div class="container">
        <div class="row pt-5 pt-sm-0">
            <ol class="col-12 breadcrumb"><?php
            if($type == 1){?>
                <li class="breadcrumb-item"><a href="profilHistorique.php">Gérer votre profil</a></li><?php
            }else {if(isset($_SESSION["id"])){?>
                <li class="breadcrumb-item"><a href="accueilConnect.php">Accueil</a></li>
            <?php }else {?>
                <li class="breadcrumb-item"><a href="accueil.php">Accueil</a></li>
            <?php }}?>
                <?php $vueAnnonce ->getTitre1Annonce($id);?>
            </ol>
            <div class="col-12">
                <?php $vueAnnonce ->getTitre2Annonce($id);?>
               <hr>
            </div>
        </div>

        <div class="row row-content">
            <div class="col-12 col-sm-6 d-flex justify-content-center">
                <div>
                    <?php $vueAnnonce ->infoAnnonce($id);?>
                </div>
            </div><?php
            if(isset($_SESSION["id"])){?>
            <div class="col-12 col-sm-6 justify-content-center">
                <div class="card ">
                    <?php $vueAnnonce ->descAnnonceC($id);?>
                </div>
            </div>
            <?php }?>
        </div> 
    </div>

    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>