<?php
require_once('../models/model.php');
class controller{
    function getwilayaController(){
        $model = new model();
        $wil = $model ->getWilayaModel();
        return $wil;
    }
}
?>