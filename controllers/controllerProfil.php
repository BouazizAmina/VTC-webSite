<?php
require_once('../models/modelProfil.php');
class controllerProfil{
    function getHistorique(){
        $model = new modelProfil();
        $diapo = $model ->getHistorique();
        return $diapo;
    }

    function getInfo(){
        $model = new modelProfil();
        $diapo = $model ->getInfo();
        return $diapo;
    }

    function modifProfil(){
        $model = new modelProfil();
        $diapo = $model ->modifProfil();
        return $diapo;
    }

    function getDocs(){
        $model = new modelProfil();
        $diapo = $model ->getDocs();
        return $diapo;
    }
    
    function getTransporteur($id){
        $model = new modelProfil();
        $diapo = $model ->getTransporteur($id);
        return $diapo;
    }

    function getDemTrans($id){
        $model = new modelProfil();
        $diapo = $model ->getDemTrans($id);
        return $diapo;
    }

    function getDemande(){
        $model = new modelProfil();
        $diapo = $model ->getDemande();
        return $diapo;
    }

    function getTransaction(){
        $model = new modelProfil();
        $diapo = $model ->getTransaction();
        return $diapo;
    }
    function modifAnnonce($id){
        $model = new modelProfil();
        $diapo = $model ->modifAnnonce($id);
        return $diapo;
    }

    function noter(){
        $model = new modelProfil();
        $diapo = $model ->noter();
        return $diapo;
    }

    function note(){
        $model = new modelProfil();
        $model ->note();
    }

    function gain(){
        $model = new modelProfil();
        $model ->gain();
    }
}
?>