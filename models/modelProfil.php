<?php
require_once('model.php');
class modelProfil{
    function getHistorique(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_SESSION["id"])){
                $request = "SELECT * FROM `annonce` WHERE `id_user`= ? AND `type_user`= ?";
                $stmt = $conn->prepare($request);
                $stmt->execute(array($_SESSION["id"], $_SESSION["user"]));
                $cards = $stmt->fetchAll();
                return $cards;
            }
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getTransporteur($id){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_SESSION["id"])){
                $request1 = "SELECT * FROM `annonce` WHERE `id_annonce`= ?" ;
                $stmt1 = $conn->prepare($request1);
                $stmt1->execute(array($id));
                $card = $stmt1->fetch();
                $d=$card['depart'];
                $a=$card['arrive'];

                // AND `wilayasA`= '%$a%'
                $request = "SELECT * FROM `transporteur` WHERE `wilayasD` LIKE '%$d%' AND `wilayasA` LIKE '%$a%' AND banir is null";
                $stmt = $conn->prepare($request);
                $stmt->execute();
                $cards = $stmt->fetchAll();
                return $cards;
            }
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getInfo(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if($_SESSION["user"] == 1){$request = "SELECT * FROM `client` where `id_client` = ?";}
            if($_SESSION["user"] == 0){$request = "SELECT * FROM `transporteur` where id_transporteur = ?";}
            $stmt = $conn->prepare($request);
            $stmt->execute(array($_SESSION["id"]));
            $card = $stmt->fetch();
            return $card;
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function modifProfil(){
        $model = new model();
        $conn = $model -> connexion();
        $msg="";
        try{
            if(isset($_POST["modifProfil"])){
                $nom=$_POST["nom"];
                $prenom=$_POST["prenom"];
                $tel=$_POST["tel"];
                $adresse=$_POST["adresse"];
                $wilaya = '';
                $wilaya1 = '';
                if($_SESSION["user"] == 1){$request= "UPDATE client SET nom= '$nom', prenom= '$prenom', tel= '$tel', adresse= '$adresse' where id_client= ? LIMIT 1";}
                if($_SESSION["user"] == 0){
                    foreach ($_POST['flower'] as $names){
                        $wilaya = "$wilaya $names";
                    }
                    foreach ($_POST['flower1'] as $names1){
                        $wilaya1 = "$wilaya1 $names1";
                    }
                    $request= "UPDATE transporteur SET nom= '$nom', prenom= '$prenom', tel= '$tel', adresse= '$adresse', wilayasD = '$wilaya', wilayasA= '$wilaya1' where id_transporteur= ? LIMIT 1";
                }
                $stmt = $conn->prepare($request);
                $stmt->execute(array($_SESSION["id"]));
                $msg="Vous avez modifié vos informations";
                return $msg;
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        
    }

    function getDocs(){
        $model = new model();
        $conn = $model -> connexion();
        $request = "SELECT * FROM `docs`";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $card = $stmt->fetch();
        return $card;
    }

    function getDemande(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_SESSION["id"])){
                $request = "SELECT * FROM `transporteur` WHERE `id_transporteur`= ? ";
                $stmt = $conn->prepare($request);
                $stmt->execute(array($_SESSION["id"]));
                $card = $stmt->fetch();
                $m=preg_split("/[\s,]+/",$card['id_annonce']);
                $a='';
                for($i=1;$i<count($m);$i++){
                    $a = "$m[0] , $m[$i]";
                }
                // echo "($a)";


                // $m=preg_split("/[\s,]+/",$card['id_annonce']);
                // $n=preg_split("/[\s,]+/",$card['trans_effectue']);
                // $a='';
                // for($i=1;$i<count($m);$i++){
                //     $a = "$m[0] , $m[$i]";
                // }

                $request1 = "SELECT * FROM `annonce` WHERE `id_annonce` IN ($a) ";
                $stmt1 = $conn->prepare($request1);

                $stmt1->execute();
                $cards = $stmt1->fetchAll();
                return $cards;
            }
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getTransaction(){
        $model = new model();
        $conn = $model -> connexion();

        $request0 = "SELECT * FROM `transporteur` WHERE `id_transporteur`= ? ";
        $stmt0 = $conn->prepare($request0);
        $stmt0->execute(array($_SESSION["id"]));
        $card = $stmt0->fetch();

        $m=preg_split("/[\s,]+/",$card['trans_effectue']);
        $a='';
        for($i=1;$i<count($m);$i++){
            $a = "$m[0] , $m[$i]";
        }
        // echo $a;

        $request = "SELECT * FROM `annonce` where id_annonce IN ($a)";
        $stmt = $conn->prepare($request);
        $stmt->execute();
        $cards = $stmt->fetchAll();
        // foreach($cards as $c){echo $c['titre'];}
        return $cards;
    }

    function modifAnnonce($id){
        $model = new model();
        $conn = $model -> connexion();
        $msg ='';
        try{
            // echo $_POST['titre'];
            if(isset($_POST["modifAnnonce"])){
                $titre = htmlspecialchars($_POST['titre']);
                $desc = htmlspecialchars($_POST['desc']);
                foreach ($_POST['departC'] as $names1){
                    foreach ($_POST['arriveC'] as $names2){
                        foreach ($_POST['tTran'] as $names3){
                            foreach ($_POST['poid'] as $names4){
                                foreach ($_POST['volume'] as $names5){
                                    foreach ($_POST['mTran'] as $names6){
                                        if(isset($_FILES['file'])){
                                        $filename = $_FILES["image"]["name"];
                                        $tempname = $_FILES["image"]["tmp_name"];  
                                        $folder = "../assets/annonces/".$filename;
                                        }else{
                                            $folder = "../assets/annonces/colis.jpg";
                                        }
                                        $request= "UPDATE annonce SET depart= ?, arrive= ?, titre= ?, image= ?, texte = ?, type_transport= ?,poid= ?,volume= ?,moyen_transport= ? where id_annonce= ? LIMIT 1";
                                        $stmt = $conn->prepare($request);
                                        $stmt->execute(array($names1, $names2, $titre, $folder, $desc, $names3, $names4, $names5, $names6,$id));
                                        $msg = 'Done';
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
        return $msg;
    }

    function note(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_POST["ok"])){
                $id = ($_POST['id']);
                $idT = ($_POST['idT']);
                foreach ($_POST['note'] as $names1){
                    $request= "UPDATE annonce SET note= ? where id_annonce= ? LIMIT 1";
                    $stmt = $conn->prepare($request);
                    $stmt->execute(array($names1,$id));

                    $request1= "SELECT * FROM `transporteur` where id_transporteur = ?";
                    $stmt1 = $conn->prepare($request1);
                    $stmt1->execute(array($idT));
                    $card = $stmt1->fetch();
                    $card = ($names1+$card['note'])/2;
                   
                    $request2= "UPDATE transporteur SET note= ? where id_transporteur= ? LIMIT 1";
                    $stmt2 = $conn->prepare($request2);
                    $stmt2->execute(array($card,$idT));
                   
                }

            }
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function noter(){
        $model = new model();
        $conn = $model -> connexion();
        try{

            $request1= "SELECT * FROM `transporteur` where id_transporteur = ?";
            $stmt1 = $conn->prepare($request1);
            $stmt1->execute(array($_SESSION['id']));
            $card = $stmt1->fetch();
            echo $card['note'];echo '/5';
            return $card['note'];
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function gain(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            $request = "SELECT * FROM `transporteur` WHERE `id_transporteur`= ? ";
            $stmt = $conn->prepare($request);
            $stmt->execute(array($_SESSION['id']));
            $card = $stmt->fetch();
            if($card['status'] == 'certifie'){$pourcentage= 0.02 ;}
            else{$pourcentage= 0;}
            if($card['trans_effectue'] == null){
                echo 0;
            }
            else{
                $m=preg_split("/[\s,]+/",$card['trans_effectue']);
                $a='';
                if(count($m) == 1){
                    $v=$m[0];
                    $request1 = "SELECT * FROM `annonce` WHERE `id_annonce` =  $v";
                }if(count($m) > 1){
                    for($i=1;$i<count($m);$i++){
                        $a = "$m[0] , $m[$i]";
                    }
                    $request1 = "SELECT * FROM `annonce` WHERE `id_annonce` IN ($a) ";
                }
                $stmt1 = $conn->prepare($request1);
                $stmt1->execute();
                $cards = $stmt1->fetchAll();
                $tarif='';
                
                
                foreach($cards as $c){
                $tarif = $tarif + ($c['tarif']-($c['tarif']*$pourcentage));
                }

                echo $tarif;

                $request2= "UPDATE transporteur SET gain= ? where id_transporteur= ? LIMIT 1";
                $stmt2 = $conn->prepare($request2);
                $stmt2->execute(array($tarif,$_SESSION["id"]));

            } 
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function getDemTrans($id){
        $model = new model();
        $conn = $model -> connexion();
        try{
            $request = "SELECT * FROM `annonce` WHERE `id_annonce`= ? ";
            $stmt = $conn->prepare($request);
            $stmt->execute(array($id));
            $card = $stmt->fetch();
            if($card['trans_postuler'] == null){
                
            }
            else{
                $m=preg_split("/[\s,]+/",$card['trans_postuler']);
                $a='';
                if(count($m) == 1){
                    $v=$m[0];
                    $request1 = "SELECT * FROM `transporteur` WHERE `id_transporteur` =  $v";
                }if(count($m) > 1){
                    for($i=1;$i<count($m);$i++){
                        $a = "$m[0] , $m[$i]";
                    }
                    $request1 = "SELECT * FROM `transporteur` WHERE `id_transporteur` IN ($a) ";
                }
                $stmt1 = $conn->prepare($request1);
                $stmt1->execute();
                $cards = $stmt1->fetchAll();
                return $cards;

            } 
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }
}
?>