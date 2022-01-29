<?php
require_once('../models/model.php');
require_once('views/vueProfil.php');
require_once('views/vue.php');
require_once('views/vueAccueil.php');
$vueAccueil = new vueAccueil();
$vueProfil = new vueProfil();
$vue = new vue();
$idA=$_GET['idA'];
$idT=$_GET['idT'];
$type=$_GET['type'];
$nom=$_GET['nom'];
$x=$_GET['x'];
$msg= '';
try{
    if(isset($_POST['sign'])){
        $model = new model();
        $conn = $model -> connexion();

        if($_SESSION["user"] == 1){$request1 = "SELECT * FROM `client` where `id_client` = ?";}
        if($_SESSION["user"] == 0){$request1 = "SELECT * FROM `transporteur` where id_transporteur = ?";}
        $stmt1 = $conn->prepare($request1);
        $stmt1->execute(array($_SESSION["id"]));
        $card = $stmt1->fetch();
        $nomm = $card['nom'];
        $prenom = $card['prenom'];
        $name = "$nomm $prenom";
        
        $texte = $_POST['titre'];
        if($x==1){
            $request = "INSERT INTO signalement (id_utilisateur, nom_utilisateur, type_user, id_transporteur, nom_transporteur,texte_signalement,id_annonce)VALUES (?,?,?,?,?,?,?); ";
            $stmt = $conn->prepare($request);
            $stmt->execute(array($_SESSION["id"],$name,$type,$idT,$nom,$texte,$idA));
        }else{
            $request = "INSERT INTO signalement (id_utilisateur, nom_utilisateur, type_user, id_client,texte_signalement,id_annonce)VALUES (?,?,?,?,?,?); ";
            $stmt = $conn->prepare($request);
            $stmt->execute(array($_SESSION["id"],$name,$type,$idT,$texte,$idA));
        }
        $msg= 'Done';
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}   

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
<h3 class="offset-2" style="color: #8ca9d3;">Signaler le transporteur</h3>
<!-- <h1>MODIFICATION D'UNE NEWS</h1> -->
<form class="mb-5" method="POST" enctype="multipart/form-data">
                
    <div class="form-group row ">
        <label class="col-sm-2 col-form-label" for="titre"><strong>Texte de signalement</strong></label>
        <div class="col-sm-5 ">
            <textarea   type="text" class="form-control" id="titre" name="titre"></textarea >
        </div>   
    </div> 

    <div class="form-group row">
        <div class="offset-sm-2 col-sm-10">
            <button type="submit" name="sign" class="btn btn-primary" >Envoyer</button>
        </div>
    </div>

</form>

<?php 
    if($msg=='Done'){
        echo"
        <script>
        alert('Signalement a été envoyé ');
        location.href = 'profilHistorique.php';
        </script>";
    }
 ?>
     <?php
        $vue -> scripts();
    ?>

<body>
<html>