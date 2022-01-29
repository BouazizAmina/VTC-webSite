<?php
require_once('../models/model.php');
try{
    $model = new model();
    $conn = $model -> connexion();
    $id=$_GET['id'];

    $request1= "UPDATE annonce set etat = 'terminee' where id_annonce= $id LIMIT 1";
    $stmt1 = $conn->prepare($request1);
    $stmt1->execute();
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>


<!DOCTYPE html>
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
<?php 
    $message = "La transition a été bien terminé";
    echo "<script type='text/javascript'>alert('$message');location.href = 'profilHistorique.php';</script>";
?>
<body>
<html>