<?php
require_once('../models/modelNews.php');
class controllerNews{
    function getCardNewsController(){
        $model = new modelAccueil();
        $card = $model ->getCardNewsModel();
        return $card;
    }

    function getNewsController($id){
        $model = new modelAccueil();
        $news = $model ->getNewsModel($id);
        return $news;
    }
}
?>