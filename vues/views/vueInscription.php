<?php
require_once('../controllers/controllerInscription.php');
class vueInscription{
    function setFormInscriptionClientVue(){
        $model = new controllerInscription();
        $err = $model ->setFormInscriptionClientController();
        return $err;
    }

    function setFormInscriptionTransporteurVue(){
        $model = new controllerInscription();
        $err = $model ->setFormInscriptionTransporteurController();
        return $err;
    }

    function loginCVue(){
        $model = new controllerInscription();
        $err = $model ->loginCController();
        return $err;
    }

    function loginTVue(){
        $model = new controllerInscription();
        $err = $model ->loginTController();
        return $err;
    }

    function login(){?>
        <div id="loginModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md" role="content">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Se connecter </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="form-group col-12">
                                <div class="btn-group btn-group-toggle col-sm-5 d-flex justify-content-center">
                                    <label class="btn btn-outline-danger">
                                        <input type="radio" name="options" id="client" value="client" required > Client  
                                    </label>
                                    <label class="btn btn-outline-success">
                                        <input type="radio" name="options" id="transporteur" value="transporteur" > Transporteur
                                    </label>
                                </div> 
                            </div>
                            <div class="form-group col-12">
                                    <label class="sr-only" for="logemail">Email</label>
                                    <input type="email" class="form-control form-control mr-1" name="logemail" id="logemail" placeholder="Enter email">
                            </div>
                            <div class="form-group col-12">
                                <label class="sr-only" for="logmdp">Mot de passe</label>
                                <input type="password" class="form-control form-control mr-1" name="logmdp" id="logmdp" placeholder="Mot de passe">
                            </div>
                            <div class="form-group col-12">
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary btn-sm ml-auto" data-dismiss="modal">Annuler</button>
                                    <button type="submit" name="formLogin" class="btn btn-primary btn-sm ml-1">Se connecter</button> 
                                </div>
                            </div> 
                            <div class="form-group col-12">
                                <p>Vous n'avez pas un compte?<a href="inscription.php"> s'inscrire</a></p>  
                            </div> 
                        </form>
                    </div>
                </div>
            </div>
        </div><?php
    }
}
?>