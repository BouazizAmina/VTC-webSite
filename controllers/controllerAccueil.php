<?php
require_once('../models/modelAccueil.php');
require_once('../models/model.php');
class controllerAccueil{
    function getDiapoController(){
        $model = new modelAccueil();
        $diapo = $model ->getDiapoModel();
        return $diapo;
    }

    function getCardController(){
        $model = new modelAccueil();
        $card = $model ->getCardModel();
        return $card;
    }

    function getController(){
        $model = new modelAccueil();
        $card = $model ->getModel();
        return $card;
    }

    function searchNonCController(){
        $model = new modelAccueil();
        $card = $model ->searchNonCModel();
        return $card;
    }

    function getTTransportController(){
        $model = new modelAccueil();
        $trans = $model ->getTTransportModel();
        return $trans;
    }

    function getMTransportController(){
        $model = new modelAccueil();
        $trans = $model ->getMTransportModel();
        return $trans;
    }

    function getPoidController(){
        $model = new modelAccueil();
        $trans = $model ->getPoidModel();
        return $trans;
    }

    function getVolumeController(){
        $model = new modelAccueil();
        $trans = $model ->getVolumeModel();
        return $trans;
    }

    function setAjoutAnnonceController(){
        $model = new modelAccueil();
        $err = $model ->setAjoutAnnonceModel();
        return $err;
    }

    function getAnnonceController($id){
        $model = new modelAccueil();
        $ann = $model ->getAnnonceModel($id);
        return $ann;
    }
}
?>