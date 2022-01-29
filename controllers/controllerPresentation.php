<?php
require_once('../models/modelPresentation.php');
class controllerPresentation{
    function texteController(){
        $model = new modelPresentation();
        $card = $model ->presModel();
        echo $card['texte'];
    }

    function imageController(){
        $model = new modelPresentation();
        $card = $model ->presModel();
        echo $card['image'];
    }

    function videoController(){
        $model = new modelPresentation();
        $card = $model ->presModel();
        echo $card['video'];
    }
}
?>