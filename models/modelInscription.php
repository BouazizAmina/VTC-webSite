<?php
require_once('model.php');
class modelInscription{
    function setFormInscriptionClientModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_POST["formInscription"])){
                if(isset($_POST['options1'])){
                    // echo $_POST['options1'];
                    if($_POST['options1'] == "non"){
                        // echo "fghj";
                        $nom = htmlspecialchars($_POST['nom']);
                        $prenom = htmlspecialchars($_POST['prenom']);
                        $email = htmlspecialchars($_POST['email']);
                        $tel = htmlspecialchars($_POST['telnum']);
                        $adresse = htmlspecialchars($_POST['adresse']);
                        $mdp1 = sha1($_POST['password']);
                        $mdp2 = sha1($_POST['password2']);
                        if(strlen($nom) > 30){
                            $erreur = "Votre nom ne doit pas dépasser 30 caractères !";
                        }else{
                            if(strlen($prenom) > 30){
                                $erreur = "Votre prénom ne doit pas dépasser 30 caractères !";
                            }else{
                                $request = "SELECT * FROM `client` WHERE `email`= ?";
                                $stmt = $conn->prepare($request);
                                $stmt->execute(array($email));
                                $count = $stmt->rowCount();
                                if($count == 0){
                                    if($mdp1 == $mdp2){
                                        $request = "INSERT INTO client(nom,prenom,email,tel,adresse,mdp) VALUES (?,?,?,?,?,?)";
                                        $stmt = $conn->prepare($request);
                                        $stmt->execute(array($nom, $prenom, $email, $tel, $adresse, $mdp1));
                                        $erreur = "Votre compte client a bien été crée ! Vous pouvez vous connecter !";
                                        
                                    
                                    }else {
                                        $erreur = "Vos motes de passes ne correspondent pas !";
                                    }
                                }else{
                                    $erreur = "Adresse mail déjà utilisée !";
                                }
                            }
                        }
                        return $erreur;
                    }
                }
                
            }
            
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function setFormInscriptionTransporteurModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_POST["formInscription"])){
                if(isset($_POST['options1'])){
                    if($_POST['options1'] == "oui"){
                        $nom = htmlspecialchars($_POST['nom']);
                        $prenom = htmlspecialchars($_POST['prenom']);
                        $email = htmlspecialchars($_POST['email']);
                        $tel = htmlspecialchars($_POST['telnum']);
                        $adresse = htmlspecialchars($_POST['adresse']);
                        $mdp1 = sha1($_POST['password']);
                        $mdp2 = sha1($_POST['password2']);
                        $certifie = htmlspecialchars($_POST['options2']);
                        $wilaya = '';
                        $wilaya1 = '';
                        if(strlen($nom) > 30){
                            $erreur = "Votre nom ne doit pas dépasser 30 caractères !";
                        }else{
                            if(strlen($prenom) > 30){
                                $erreur = "Votre prénom ne doit pas dépasser 30 caractères !";
                            }else{
                                $request = "SELECT * FROM `transporteur` WHERE `email`= ?";
                                $stmt = $conn->prepare($request);
                                $stmt->execute(array($email));
                                $count = $stmt->rowCount();
                                if($count == 0){
                                    if($mdp1 == $mdp2){
                                        foreach ($_POST['flower'] as $names){
                                            $wilaya = "$wilaya $names";
                                        }
                                        foreach ($_POST['flower1'] as $names1){
                                            $wilaya1 = "$wilaya1 $names1";
                                        }
                                        $request = "INSERT INTO transporteur(nom,prenom,email,tel,adresse,mdp,wilayasD,WilayasA,certifie,status,gain,note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
                                        $stmt = $conn->prepare($request);
                                        $stmt->execute(array($nom, $prenom, $email, $tel, $adresse, $mdp1, $wilaya,$wilaya1, $certifie, "en attente",0,0));
                                        $erreur = "Votre compte transporteur a bien été crée ! Vous pouvez vous connecter !";
                                        
                                       
                                    }else {
                                        $erreur = "Vos motes de passes ne correspondent pas !";
                                    }
                                }else{
                                    $erreur = "Adresse mail déjà utilisée !";
                                }
                               
                            }
                        }
                        return $erreur;
                    }
                }
                
            }
            
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        }
    }

    function loginCModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_POST["formLogin"])){
                if(isset($_POST['options'])){
                    if($_POST['options'] == "client"){
                        $msg = "";
                        $request = "SELECT * FROM `client` WHERE `email`= :email AND `mdp`= :mdp AND `banir` IS NULL ";
                        $stmt = $conn->prepare($request);
                        $stmt->bindValue( ":email", $_POST["logemail"], PDO::PARAM_STR );
                        $stmt->bindValue( ":mdp", sha1($_POST["logmdp"]), PDO::PARAM_STR );
                        $stmt->execute();
                        $user=$stmt->fetch();
                        $count = $stmt->rowCount();
                        // echo $user;
                        echo $count;
                        if($count == 1){
                            $_SESSION["user"] = "1";
                            $_SESSION["id"]= $user['id_client'];
                            // session_start();

                            //echo $user['id_client'];
                            if(isset($_SESSION["id"])){       
                                header("location:accueilConnect.php");
                            }
                        }
                        else{
                            $msg="Informations erronées";
                        }
                        return $msg;
                    }
                }
                
            }
            
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        } 
    }

    function loginTModel(){
        $model = new model();
        $conn = $model -> connexion();
        try{
            if(isset($_POST["formLogin"])){
                if(isset($_POST['options'])){
                    if($_POST['options'] == "transporteur"){
                        $msg = "";
                        $request = "SELECT * FROM `transporteur` WHERE `email`= :email AND `mdp`= :mdp AND banir IS NULL";
                        $stmt = $conn->prepare($request);
                        $stmt->bindValue( ":email", $_POST["logemail"], PDO::PARAM_STR );
                        $stmt->bindValue( ":mdp", sha1($_POST["logmdp"]), PDO::PARAM_STR );
                        $stmt->execute();
                        $user=$stmt->fetch();
                        $count = $stmt->rowCount();
                        if($count == 1){
                            $_SESSION["user"] = "0";
                            $_SESSION["id"]=$user["id_transporteur"];
                            // session_start();
                            // echo $user["id"];
                            if(isset($_SESSION["id"])){       
                                header("location:accueilConnect.php");
                            }
                        }
                        else{
                            $msg="Informations erronées";
                        }
                        return $msg;
                    }
                }
                
            }
            
        }catch (PDOException $e) {
            echo "Error : ".$e->getMessage();
        } 
    }
}
?>