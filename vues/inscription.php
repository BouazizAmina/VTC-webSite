<!DOCTYPE html>
<html lang="en">
<?php
    require_once('views/vue.php');
    require_once('views/vueInscription.php');
    session_start();
    $vue = new vue();
    $vue -> entete_page();
    $vueInscription = new vueInscription();
    $errC = $vueInscription -> setFormInscriptionClientVue();
    $errT = $vueInscription -> setFormInscriptionTransporteurVue();
    
    $errLC= $vueInscription -> loginCVue(); 
    $errLT= $vueInscription -> loginTVue(); 
    echo $errLC;
    

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
            <div class="col-12">
               <h3 >S'inscrire </h3>
               <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p style="color:red;"><?php echo "$errC";?></p>
                <p style="color:red;"><?php echo "$errT";?></p>
                <form class="mb-5" method="POST">
                
                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="nom"><strong>Nom</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required value="<?php if(isset($_POST['nom'])){echo $_POST['nom'];}?>" >
                        </div>   
                    </div> 

                     <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="prenom"><strong>Prénom</strong></label>
                        <div class="col-sm-5 ">
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required value="<?php if(isset($_POST['prenom'])){echo $_POST['prenom'];}?>">
                        </div>   
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="email"><strong>Email</strong></label>
                        <div class="col-sm-5 ">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                        </div>   
                    </div>

                    <div class="form-group row">
                        <label for="telnum" class="col-sm-3 col-form-label"><strong>Numéro de téléphone</strong></label>
                        <div class="col-sm-5">
                            <input type="tel" class="form-control" id="telnum" name="telnum" placeholder="Numéro de téléphone" required value="<?php if(isset($_POST['telnum'])){echo $_POST['telnum'];}?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="adresse" class="col-sm-3 col-form-label"><strong>Adresse principale</strong></label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse principale" required value="<?php if(isset($_POST['adresse'])){echo $_POST['adresse'];}?>">
                        </div>
                    </div>

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="password"><strong>Mot de passe</strong></label>
                        <div class="col-sm-5 ">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                        </div>   
                    </div> 

                    <div class="form-group row ">
                        <label class="col-sm-3 col-form-label" for="password2"><strong>Confirmation du mot de passe</strong></label>
                        <div class="col-sm-5 ">
                            <input type="password" class="form-control" id="password2" name="password2" placeholder="Confirmer votre mot de passe" required>
                        </div>   
                    </div> 

                    <div class="form-group row">
                        <label for="transporteur" class="col-sm-3 col-form-label">Voulez vous être transporteur?     </label>
                         <div class="btn-group btn-group-toggle col-sm-5 ">
                            <label class="btn btn-outline-danger">
                                <input type="radio" name="options1" id="oui1" value="oui" onclick="showTransOui();" > Oui  
                            </label>
                            <label class="btn btn-outline-success">
                                <input type="radio" name="options1" id="non1" value="non" onclick="showTransNon(); required"> Non
                            </label>
                        </div> 
                    </div>
                    <div id="trans" class="collapse">
                    <div class="form-group row">
                        <label for="wilayas" class="col-sm-3 col-form-label"><strong>Wilayas de départs</strong></label>
                        <div class="col-sm-5"> 
                            <select name="flower[ ]" id="wilaya" class="form-control" multiple >
                            <?php  $vue -> getWialayVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="wilayas" class="col-sm-3 col-form-label"><strong>Wilayas d'arrivées</strong></label>
                        <div class="col-sm-5"> 
                            <select name="flower1[ ]" id="wilaya1" class="form-control"  multiple >
                            <?php  $vue -> getWialayVue();?>
                        </select>
                        </div>
                    </div> 

                    <div class="form-group row">
                        <label for="certifie" class="col-sm-3 col-form-label">Voulez vous être certifié?     </label>
                        <div class="btn-group btn-group-toggle col-sm-5 " >
                            <label class="btn btn-outline-danger" >
                                <input type="radio" name="options2" id="oui2" value="oui"  onclick="showDemOui();"> Oui  
                            </label>
                            <label class="btn btn-outline-success">
                                <input type="radio" name="options2" id="non2" value="non" onclick="showDemNon();"> Non
                            </label>
                        </div>
                        

                    </div>
                    </div>

                    <div class="form-group row">
                        <label for="formInscription" class="col-sm-3 col-form-label">Si vous cliquez sur le boutton la demande va être envoyée</label>
                        <div class="col-sm-5">
                            <button type="submit" name="formInscription" class="btn btn-primary" >Soumettre</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php
        $vue -> footer();
        $vue -> scripts();
    ?>
</body>
</html>