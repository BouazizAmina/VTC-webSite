<?php
require_once('../models/modelAccueil.php');
class controllerAccueil{
    function getDiapoController(){
        $model = new modelAccueil();
        $diapo = $model ->getDiapoModel();
        return $diapo;
    }
}
?>