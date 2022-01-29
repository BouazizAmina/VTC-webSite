<?php
require_once('model.php');
class modelAccueil{
    function getCardNewsModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `news`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $card = $stmt->fetchAll();
        return $card;
    }

    function getNewsModel($id){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `news` where `id_news` = $id";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $news = $stmt->fetch();
        return $news;
    }
}
?>