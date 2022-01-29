<!DOCTYPE html>
<html lang="en">
<?php
    require_once('views/vue.php');
    require_once('views/vueAccueil.php');
    require_once('views/vueProfil.php');
    $id=$_GET['id'];
    $vue = new vue();
    $vue -> entete_page();
    $vueAccueil = new vueAccueil();
    $vueProfil = new vueProfil();
    
?>
<body>
    <?php $vue-> navProfil();?>

    <div class="container">
        <div class="row pt-5 pt-sm-0">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="profilHistorique.php">Gérer l'historique de votre profil</a></li>
                <li class="breadcrumb-item active">La liste des demandes des transporteurs</li>
            </ol>
            <div class="col-12">
                <h3>La liste des demandes</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <?php $vueProfil -> getDemTrans($id);?>
        </div>
    </div>
    
    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>