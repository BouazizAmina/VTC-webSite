<!DOCTYPE html>
<html lang="en">
<?php
    require_once('views/vue.php');
    require_once('views/vueAccueil.php');
    require_once('views/vueInscription.php');
    
    $vue = new vue();
    $vue -> entete_page();
    $vueAccueil = new vueAccueil();
?>
<body>
    <?php $vue-> navProfil();?>

    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>