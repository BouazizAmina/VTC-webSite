<?php
require_once('model.php');
class modelContact{
    function contactModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `contact`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $diapo = $stmt->fetch();
        return $diapo;
    }
}
?>