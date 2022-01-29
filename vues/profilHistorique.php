<!DOCTYPE html>
<html lang="en">
<?php
    require_once('views/vue.php');
    require_once('views/vueAccueil.php');
    require_once('views/vueProfil.php');
    
    $vue = new vue();
    $vue -> entete_page();
    $vueAccueil = new vueAccueil();
    $vueProfil = new vueProfil();
    $vueProfil-> note();
    
?>
<body>
    <?php $vue-> navProfil();?>

    <div class="container">
        <div class="row mt-5 mt-sm-0">
            <div class="col-12">
               <h3 >Gérer l'historique des annonces</h3>
               <hr>
            </div>
        </div>
        <div class="row">
            <?php $vueProfil -> getHistorique();?>
        </div>
    </div>

    <?php if($_SESSION['user'] == 0){?>
    <div class="container mt-5">
        <div class="row mt-5 mt-sm-0">
            <div class="col-12">
                <h3 >Les transactions effectuées</h3>
                <hr>
            </div>
        </div>
        <div class="row">
            <?php $vueProfil -> getTransaction();?>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row mt-5 mt-sm-0">
            <div class="col-12">
               <h3 >La liste des demandes</h3>
               <hr>
            </div>
        </div>
        <div class="row">
            <?php $vueProfil -> getDemande();?>
        </div>
    </div>

    <?php } ?>
    
    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>