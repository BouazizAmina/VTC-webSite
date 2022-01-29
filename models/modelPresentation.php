<?php
require_once('model.php');
class modelPresentation{
    function presModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `presentation`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $diapo = $stmt->fetch();
        return $diapo;
    }
}
?>