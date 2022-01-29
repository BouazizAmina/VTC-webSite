<?php
require_once('../models/modelInscription.php');
class controllerInscription{
    function setFormInscriptionClientController(){
        $model = new modelInscription();
        $err = $model ->setFormInscriptionClientModel();
        return $err;
    }

    function setFormInscriptionTransporteurController(){
        $model = new modelInscription();
        $err = $model ->setFormInscriptionTransporteurModel();
        return $err;
    }

    function loginCController(){
        $model = new modelInscription();
        $err = $model -> loginCModel();
        return $err;
    }

    function loginTController(){
        $model = new modelInscription();
        $err = $model -> loginTModel();
        return $err;
    }
}
?>