<?php
require_once('model.php');
class modelAccueil{
    function getDiapoModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `news`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $diapo = $stmt->fetchAll();
        return $diapo;
    }
}
?>