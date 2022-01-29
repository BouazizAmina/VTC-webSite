<!DOCTYPE html>
<html lang="en">
<?php
    require_once('views/vue.php');
    require_once('views/vueNews.php');
    require_once('views/vueInscription.php');

    $vue = new vue();
    $vue -> entete_page();
    $vueInscription = new vueInscription();

    $errLC= $vueInscription -> loginCVue(); 
    $errLT= $vueInscription -> loginTVue(); 

    $vueNews = new vueNews();
    $id=$_GET['id'];
?>
<body>
    <?php $vue-> nav();?>

    <?php $vueInscription -> login();?>

     <div class="container mb-3 ">
        <p style="color:red;"><?php echo $errLC ;?></p>
        <p style="color:red;"><?php echo $errLT ;?></p>
    </div>

    <div class="container">
        <div class="row pt-5 pt-sm-0">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="news.php">News</a></li>
                <?php $vueNews ->getTitre1News($id);?>
            </ol>
            <div class="col-12">
                <?php $vueNews ->getTitre2News($id);?>
               <hr>
            </div>
        </div>

        <div class="row row-content">
            <div class="col-12 col-sm-6">
                <h2>Actualité</h2>
                <?php $vueNews ->getTexteNews($id);?>
            </div>
            <div class="col-12 pt-sm-5 col-sm-6">
                <div class="card">
                    <?php $vueNews ->getLinkNews($id);?>

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