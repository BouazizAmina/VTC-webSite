<!DOCTYPE html>
<html lang="en">
<?php
session_start();
    require_once('views/vue.php');
    require_once('views/vueInscription.php');
    require_once('../controllers/controllerContact.php');
    
    $vue = new vue();
    $vue -> entete_page();
    $vueInscription = new vueInscription();
    $cnt = new controllerContact();

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
        <div class="row mt-5  mt-sm-0">
            <div class="col-12">
               <h3>Contactez nous</h3>
               <hr>
            </div>
        </div>
        <div class="row row-content mb-5">
           <div class="col-12">
              <h3>Information</h3>
           </div>
            <div class="col-12 col-sm-4 offset-sm-1 mt-3">
                <h5>Notre Adresse</h5>
                <address>
                <?php $cnt->adresseController(); ?><br>
                    ALGERIE<br>
                    <i class="fa fa-phone fa-lg"></i>: <?php $cnt->telController();?><br>
                    <i class="fa fa-envelope fa-lg"></i>:  <a href="mailto:<?php $cnt->mailController();?>">vtc@gmail.con</a>
                  </address>
            </div>
            <div class="col-12 col-sm-11 offset-sm-1 ">
                <div class="btn-group" role="button">
                    <a role="button" class="btn btn-primary" href="tel:<?php $cnt->telController();?>"><i class="fa fa-phone"></i> Call</a>
                    <a role="button" class="btn btn-info" href="tel:<?php $cnt->skypeController();?>"><i class="fa fa-skype"></i> Skype</a>
                    <a role="button" class="btn btn-success" href="mailto:<?php $cnt->mailController();?>"><i class="fa fa-envelope-o"></i> Email</a>
                </div>
            </div>
        </div>

    </div>


    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>