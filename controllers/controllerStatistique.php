<?php
require_once('../models/modelStatistique.php');
class ControllerStatistique{
    function NumberusersModel(){
        $model = new modelStatistique();
        $nb1 = $model ->NumberClientsModel();
        $nb2 = $nb1 + $model ->NumberTranspsModel();
        return $nb2;
    }

    function NumberAnnModel(){
        $model = new modelStatistique();
        $nb1 = $model ->NumberAnnModel();
        return $nb1;
    }

    function getCardController(){
        $model = new modelStatistique();
        $card = $model ->getCardModel();
        return $card;
    }
}
?>