<?php
require_once('../models/modelContact.php');
class controllerContact{
    function mailController(){
        $model = new modelContact();
        $card = $model ->contactModel();
        echo $card['mail'];
    }

    function skypeController(){
        $model = new modelContact();
        $card = $model ->contactModel();
        echo $card['skype'];
    }

    function telController(){
        $model = new modelContact();
        $card = $model ->contactModel();
        echo $card['tel'];
    }

    function adresseController(){
        $model = new modelContact();
        $card = $model ->contactModel();
        echo $card['adresse'];
    }
}
?>