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
    $info = $vueProfil -> getInfo();
    $docs = $vueProfil -> getDocs();
    $err = $vueProfil -> modifProfil();
?>
<body>
    <?php $vue-> navProfil();?>

    <div class="container">
        <div class="row mt-5 mt-sm-0">
            <div class="col-12">
               <h3 >Gérer votre profil</h3>
               <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p style="color:red;"><?php echo "$err";?></p>
                <form class="mb-5" method="POST" enctype="multipart/form-data">
                
                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="nom"><strong>nom</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" value="<?= $info['nom']?>" >
                        </div>   
                    </div> 
                    
                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="prenom"><strong>Prenom</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom" value="<?= $info['prenom']?>" >
                        </div>   
                    </div> 

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="tel"><strong>Numero de telephone</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="tel" name="tel" placeholder="Numero de telephone" value="<?= $info['tel']?>" >
                        </div>   
                    </div> 

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="adresse"><strong>Adresse</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse" value="<?= $info['adresse']?>" >
                        </div>   
                    </div> 
                    <?php if($_SESSION['user'] == 0){?>

                        <div class="form-group row">
                            <label for="wilayas" class="col-sm-3 col-form-label"><strong>Wilayas de départs</strong></label>
                            <div class="col-sm-5"> 
                                <select name="flower[ ]" id="wilaya" class="form-control" multiple required>
                                <?php  $vue -> getWialayVue();?>
                            </select>
                            </div>
                        </div> 

                        <div class="form-group row">
                            <label for="wilayas" class="col-sm-3 col-form-label"><strong>Wilayas d'arrivées</strong></label>
                            <div class="col-sm-5"> 
                                <select name="flower1[ ]" id="wilaya1" class="form-control"  multiple required>
                                <?php  $vue -> getWialayVue();?>
                            </select>
                            </div>
                        </div> 

                    <?php } ?>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-10">
                            <button type="submit" name="modifProfil" class="btn btn-primary" >Modifier</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php if($_SESSION['user'] == 0){?>
        <div class="container">
            <div class="row mt-5 mt-sm-0">
                <div class="col-12">
                <h3 >Status de votre demande</h3>
                <hr>
                </div>
            </div>
            <div class="row mt-5 mt-sm-0 ml-3 mb-5">
                <div class="d-inline-flex p-2 border status">
                <h4> <?= $info['status']?> </h4>
                </div>
            </div>
        </div>
        
        <?php if($info['status'] == 'valide'){?>
        <div class="container mt-5 mt-sm-0">
            <div class="row mt-5 mt-sm-0">
                <div class="col-12">
                <h3 >La liste de documents à rapporter au bureau de l’entreprise</h3>
                <hr>
                </div>
            </div>
            <div class="row mt-5 mt-sm-0 ml-3">
                <div class="d-inline-flex p-2 border ">
                <?= $docs['docsValide']?>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if($info['status'] == 'refus'){?>
        <div class="container mt-5 mt-sm-0">
            <div class="row mt-5 mt-sm-0">
                <div class="col-12">
                <h3 >Un justificatif</h3>
                <hr>
                </div>
            </div>
            <div class="row mt-5 mt-sm-0 ml-3">
                <div class="d-inline-flex p-2 border">
                <?= $docs['docsRefus']?> 
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="container">
            <div class="row mt-5 mt-sm-0">
                <div class="col-12">
                <h3 >Le note</h3>
                <hr>
                </div>
            </div>
            <div class="row mt-5 mt-sm-0 ml-3 mb-5">
                <div class="d-inline-flex p-2 border status">
                <h4> <?php  $vueProfil -> noter(); ?></h4>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row mt-5 mt-sm-0">
                <div class="col-12">
                <h3 >Le gain</h3>
                <hr>
                </div>
            </div>
            <div class="row mt-5 mt-sm-0 ml-3 mb-5">
                <div class="d-inline-flex p-2 border status">
                <h4> <?php  $vueProfil -> gain(); ?></h4>
                </div>
            </div>
        </div>
        
        

    <?php } ?>

    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>