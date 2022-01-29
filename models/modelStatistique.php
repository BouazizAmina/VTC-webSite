<?php
require_once('model.php');
class modelStatistique{
    function NumberClientsModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `client`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        $count = $stmt->rowCount();
        return $count;
    }

    function NumberTranspsModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `transporteur`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        $count = $stmt->rowCount();
        return $count;
    }

    function NumberAnnModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `annonce`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        $count = $stmt->rowCount();
        return $count;
    }

    function getCardModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            $request = "SELECT * FROM `annonce` where etat IN ('en attente','en cours') ORDER BY  `date` DESC";
            $stmt = $conn->prepare($request);
            $stmt->execute();
            $cards = $stmt->fetchAll();
            return $cards;
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }
}
?>