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

    function getModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
        $request = "SELECT * FROM `critere`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $diapo = $stmt->fetch();
        return $diapo['annonce'];
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getCardModel(){
        $model = new model();
        $conn = $model -> connexion();
        $card = $this->getModel();
        try{
        if($card == 1){
            $request = "SELECT * FROM `annonce` where etat IN ('en attente','en cours') ORDER BY  `date` DESC";
        }
        if($card == 3){
            $request = "SELECT * FROM `annonce` WHERE `valide` = 1 AND etat IN ('en attente','en cours')";
        }
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $cards = $stmt->fetchAll();
        return $cards;
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function searchNonCModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_POST["searchNC"])){
                foreach ($_POST['flower'] as $names1){
                    // echo $names1;
                    foreach ($_POST['flower2'] as $names2){
                        // echo $names2;
                        $request = "SELECT * FROM `annonce` WHERE `depart`= ? AND `arrive`= ?";
                        $stmt = $conn->prepare($request);
                        $stmt->execute(array($names1, $names2));
                        $card = $stmt->fetchAll();
                        return $card;
                    }
                }
            }
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getTTransportModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `type_transport`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        return $tran;
    }

    function getMTransportModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `moyen_transport`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        return $tran;
    }

    function getPoidModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `poid`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        return $tran;
    }

    function getVolumeModel(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `volume`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $tran = $stmt->fetchAll();
        return $tran;
    }

    function setAjoutAnnonceModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            // echo $_POST['titre'];
            if(isset($_POST["ajoutAnnonce"])){
                $titre = htmlspecialchars($_POST['titre']);
                $desc = htmlspecialchars($_POST['desc']);
                $date = ($_POST['date']);
                foreach ($_POST['departC'] as $names1){
                    foreach ($_POST['arriveC'] as $names2){
                        foreach ($_POST['tTran'] as $names3){
                            foreach ($_POST['poid'] as $names4){
                                foreach ($_POST['volume'] as $names5){
                                    foreach ($_POST['mTran'] as $names6){
                                        $filename = $_FILES["image"]["name"]; 
                                        if($filename != ''){
                                        $folder = "../assets/annonces/".$filename;
                                        
                                        }else{
                                            $folder = "../assets/annonces/colis.jpg";
                                        }
                                        $request = "INSERT INTO `annonce`(`depart`, `arrive`, `titre`, `image`, `texte`, `type_transport`, `poid`,`volume`, `moyen_transport`, `id_user`, `type_user`,`tarif`,etat,date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                                        $stmt = $conn->prepare($request);
                                        $stmt->execute(array($names1, $names2, $titre, $folder, $desc, $names3, $names4, $names5, $names6,$_SESSION["id"],$_SESSION["user"],0,'en attente',$date));
                                        $erreur = "Votre annonce a bien été ajoutée !";
                                        return $erreur;
                                            // }
                                        
                                    }
                                }
                            }
                        }
                    }
                }

            }
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getAnnonceModel($id){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `annonce` where`id_annonce` = $id";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $ann = $stmt->fetch();
        return $ann;
    }
}
?>