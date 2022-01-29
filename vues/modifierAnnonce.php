<?php
require_once('../models/model.php');
require_once('views/vueProfil.php');
require_once('views/vue.php');
require_once('views/vueAccueil.php');
$vueAccueil = new vueAccueil();
$vueProfil = new vueProfil();
$vue = new vue();
$id=$_GET['id'];
try{
    $model = new model();
    $conn = $model -> connexion();
    
    // echo $id;
    $sql = "SELECT * FROM annonce WHERE `id_annonce` =  $id ";
    $stm=$conn->query($sql); 
    $cultures = $stm->fetch();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}   
$msg = $vueProfil -> modifAnnonce($id);

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-social/bootstrap-social.css">
    <link rel="stylesheet" href="../node_modules/bootstrap-select/dist/css/bootstrap-select.min.css">
    <title>VTC</title>
</head>
<body>
<h3 class="offset-2" style="color: #8ca9d3;">Modification d'une annonce</h3>
<!-- <h1>MODIFICATION D'UNE NEWS</h1> -->
<form class="mb-5" method="POST" enctype="multipart/form-data">
                
    <div class="form-group row ">
        
        <label class="col-sm-2 col-form-label" for="titre"><strong>Titre de l'annonce</strong></label>
        <div class="col-sm-5 ">
            <input type="text" class="form-control" id="titre" name="titre" value="<?= $cultures['titre'] ?>" >
        </div>   
    </div> 

    <div class="form-group row ">
        <label class="col-sm-2 col-form-label" for="desc"><strong>Description de l'annonce</strong></label>
        <div class="col-sm-5 ">
            <input type="text" class="form-control" id="desc" name="desc" value="<?= $cultures['texte'] ?>" >
        </div>   
    </div>

    <div class="form-group row ">
        <label class="col-sm-2 col-form-label" for="image"><strong>Image de l'annonce</strong></label>
        <div class="col-sm-5 ">
            <input type="file" class="form-control" id="image" name="image" placeholder="Image de l'annonce" >
        </div>   
    </div>

    <div class="form-group row">
        <label for="departC" class="col-sm-2 col-form-label"><strong>Wilaya de départ</strong></label>
        <div class="col-sm-5"> 
            <select name="departC[ ]" id="departC" class="form-control" required>
                <option value="">L’emplacement de départ</option>
                <?php  $vue -> getWialayVue();?>
            </select>
        </div>
    </div> 
    <div class="form-group row">
        <label for="arriveC" class="col-sm-2 col-form-label"><strong>Wilaya de d'arrive</strong></label>
        <div class="col-sm-5"> 
            <select name="arriveC[ ]" id="arriveC" class="form-control" required>
                <option value="">L’emplacement d’arriver</option>
                <?php  $vue -> getWialayVue();?>
        </select>
        </div>
    </div> 

    <div class="form-group row">
        <label for="tTran" class="col-sm-2 col-form-label"><strong>Type de transport</strong></label>
        <div class="col-sm-5"> 
            <select name="tTran[ ]" id="tTran" class="form-control" required>
                <option value="">Type de transport</option>
                <?php  $vueAccueil -> getTTransportVue();?>
        </select>
        </div>
    </div> 

    <div class="form-group row">
        <label for="mTran" class="col-sm-2 col-form-label"><strong>Moyen de transport</strong></label>
        <div class="col-sm-5"> 
            <select name="mTran[ ]" id="mTran" class="form-control" required>
                <option value="">Moyen de transport</option>
                <?php  $vueAccueil -> getMTransportVue();?>
        </select>
        </div>
    </div> 

    <div class="form-group row">
        <label for="poid" class="col-sm-2 col-form-label"><strong>Fourchette de poids</strong></label>
        <div class="col-sm-5"> 
            <select name="poid[ ]" id="poid" class="form-control" required>
                <option value="">Fourchette de poids</option>
                <?php  $vueAccueil -> getPoidVue();?>
        </select>
        </div>
    </div> 

    <div class="form-group row">
        <label for="volume" class="col-sm-2 col-form-label"><strong>Fourchette de volume</strong></label>
        <div class="col-sm-5"> 
            <select name="volume[ ]" id="volume" class="form-control" required>
                <option value="">Fourchette de volume</option>
                <?php  $vueAccueil -> getVolumeVue();?>
        </select>
        </div>
    </div> 

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" name="modifAnnonce" class="btn btn-primary" >Modifier</button>
        </div>
    </div>

</form>

<?php 
    if($msg=='Done'){
        echo"
        <script>
        alert('Annonce a été bien modifié ');
        location.href = 'profilHistorique.php';
        </script>";
    }
 ?>
     <?php
        $vue -> scripts();
    ?>

<body>
<html>