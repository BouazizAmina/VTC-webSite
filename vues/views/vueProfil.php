<?php
require_once('../controllers/controllerProfil.php');
class vueProfil{
    function getHistorique(){
        $model = new controllerProfil();
        $cards = $model ->getHistorique();
        $i=1;?>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Type </th>
                    <th scope="col">Moyen de transport</th>
                    <th scope="col">Poid</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Etat</th>
                    <th scope="col">Tranporteur</th>
                    <th></th>
                    <th scope="col">Note</th>
                    
                </tr>
            </thead>
            <tbody><?php
            foreach($cards as $card){
                if($card["archive"] != 1){?>
                    <tr>
                        <th scope="row">
                            <h6><?php echo $i; $i++;?></h6>
                        </th>
                        <td>
                            <h6><?=$card ['titre']?></h6>
                        </td>
                        <td>
                            <h6><?=$card ['type_transport']?></h6>
                        </td>
                        <td>
                            <h6><?=$card ['moyen_transport']?></h6>
                        </td>
                        <td>
                            <h6><?=$card ['poid']?></h6>
                        </td>
                        <td>
                            <h6><?=$card ['volume']?></h6>
                        </td>
                        <td>
                            <h6><?=$card ['tarif']?></h6>
                        </td>
                        <td>
                            <h6><?=$card ['etat']?></h6>
                        </td>
                        <?php if($card ['etat'] == 'en cours'){?>
                            <td>
                                <h6><?=$card ['trans']?></h6>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <h6><a class="btn btn-sm" href="terminerAnnonce.php?id=<?= $card['id_annonce'] ?>" role="button">Terminer</a></h6>
                            </td>
                        <?php } ?>

                        <?php if($card ['etat'] == 'terminee'){?>
                            <td>
                                <h6><?=$card ['trans']?></h6>
                            </td>
                            <td></td>
                            <?php if($card ['note'] == null){?>
                                <td>
                                    <form method="POST">
                                        <input type="hidden" name="idT" value="<?= $card['id_transporteur'] ?>"/>
                                        <input type="hidden" name="id" value="<?= $card['id_annonce'] ?>"/>
                                        <select name="note[ ]" id="departC" class="form-control" required>
                                            <option value="">Noter le transport</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                        <button type="submit" name="ok" class="btn btn-sm btn-primary" >OK</button>
                                    </form>
                                </td>
                            <?php }else{ ?>
                                <td>
                                    <h6><?=$card ['note']?></h6>
                                </td>
                            <?php } ?>
                            <td>
                                <h6><a class="btn btn-sm" href="signalerT.php?idA=<?= $card['id_annonce'] ?>&idT=<?= $card['id_transporteur'] ?>&type=<?= $card['type_user'] ?>&nom=<?= $card['trans'] ?>&x=1" role="button">Signaler</a></h6>
                            </td>
                        <?php } ?>

                        <?php if(($card ['valide'] == 1)&&($card ['etat'] != 'en cours')&&($card ['etat'] != 'terminee')){?>
                            <td>
                                <h6><a href="listeTransporteur?id=<?= $card['id_annonce']?>">Liste Transporteurs</a></h6>
                            </td>
                        <?php } ?>

                        <?php if($card ['etat'] == 'en attente'){?>
                            <?php if($card ['valide'] != 1){?>
                            <td></td>
                            <td></td>
                            <td></td>
                            <?php } ?>
                            <?php if($card ['valide'] == 1){?>
                                
                                <td>
                                    <h6><a href="listeDemande?id=<?= $card['id_annonce']?>">Liste Demandes</a></h6>
                                </td>
                                <td></td>
                            <?php } ?>
                            <td>
                                <h6><a class="btn btn-sm" href="supprimerAnnonce.php?id=<?= $card['id_annonce'] ?>" role="button">supprimer</a></h6>
                            </td>
                            <td>
                                <h6><a class="btn btn-sm" href="modifierAnnonce.php?id=<?= $card['id_annonce'] ?>" role="button">modifier</a></h6>
                            </td>
                        <?php } ?>

                    </tr><?php 
                }
            } ?>
            </tbody>
        </table><?php 
    }

    function getTransporteur($id){
        $model = new controllerProfil();
        $cards = $model ->getTransporteur($id);
        $i=1;?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom </th>
                </tr>
            </thead>
            <tbody><?php
            foreach($cards as $c){
                if(($c["status"] == 'valide') || ($c["status"] == 'certifie')){?>
                    <tr>
                        <th scope="row">
                            <h6><?php echo $i; $i++;?></h6>
                        </th>
                        <td>
                            <h6><?=$c['nom']?></h6>
                        </td>
                        <td>
                            <h6><?=$c['prenom']?></h6>
                        </td>
                        <td>
                            <h6><a class="btn btn-sm" href="demanderTransporteur.php?idA=<?= $id?>&idT=<?= $c['id_transporteur']?>" role="button">Demander</a></h6>
                        </td>
                    </tr><?php 
                }
            } ?>
            </tbody>
        </table><?php 
    }

    function getDemTrans($id){
        $model = new controllerProfil();
        $cards = $model ->getDemTrans($id);
        $i=1;?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom </th>
                </tr>
            </thead>
            <tbody><?php
            foreach($cards as $c){?>
                <tr>
                    <th scope="row">
                        <h6><?php echo $i; $i++;?></h6>
                    </th>
                    <td>
                        <h6><?=$c['nom']?></h6>
                    </td>
                    <td>
                        <h6><?=$c['prenom']?></h6>
                    </td>
                    <td>
                        <h6><a class="btn btn-sm" href="accepterTransporteur.php?idA=<?= $id?>&idT=<?= $c['id_transporteur']?>" role="button">Accepter</a></h6>
                    </td>
                </tr>
                <?php 
            } ?>
            </tbody>
        </table><?php 
    }

    function getInfo(){
        $model = new modelProfil();
        $diapo = $model ->getInfo();
        return $diapo;
    }

    function modifProfil(){
        $model = new controllerProfil();
        $diapo = $model ->modifProfil();
        return $diapo;
    }

    function getDocs(){
        $model = new controllerProfil();
        $diapo = $model ->getDocs();
        return $diapo;
    }

    function getDemande(){
        $model = new controllerProfil();
        $cards = $model ->getDemande();?>
        <div class="row mt-2"><?php
        foreach($cards as $card){?>
            <div class="col-6 col-sm-3 mb-3">
                <div class="card bg-light"  >
                    <img class="card-img-top" src="<?=$card ['image']?>" alt="<?=$card ['titre']?>" style="max-height: 10rem;">
                    <div class="card-body" style="min-height: 15rem;">
                        <h5 class="card-title"><?=$card ['titre']?></h5>
                        <p class="card-text"><?= substr($card ['texte'],0,40);?> <a href="vueAnnonceDetails.php?id=<?= $card['id_annonce']?>&type=1">lire la suite</a></p>
                        <a href="accepterAnnonce.php?id=<?= $card['id_annonce']?>&idT=<?=$_SESSION['id']?>" class="btn btn-primary">Accepter</a>
                    </div>
                </div>
            </div><?php
        }?>
        </div>
        <?php   
    }

    function getTransaction(){
        $model = new controllerProfil();
        $cards = $model ->getTransaction();
        $i=1;?>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Type </th>
                    <th scope="col">Moyen de transport</th>
                    <th scope="col">Poid</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Tarif</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody><?php
            foreach($cards as $card){?>
                <tr>
                    <th scope="row">
                        <h6><?php echo $i; $i++;?></h6>
                    </th>
                    <td>
                        <h6><?=$card['titre']?></h6>
                    </td>
                    <td>
                        <h6><?=$card ['type_transport']?></h6>
                    </td>
                    <td>
                        <h6><?=$card ['moyen_transport']?></h6>
                    </td>
                    <td>
                        <h6><?=$card ['poid']?></h6>
                    </td>
                    <td>
                        <h6><?=$card ['volume']?></h6>
                    </td>
                    <td>
                        <h6><?=$card ['tarif']?></h6>
                    </td>
                    <td>
                        <h6><?=$card ['note']?></h6>
                    </td>
                    <td>
                        <h6><a class="btn btn-sm" href="signalerT.php?idA=<?= $card['id_annonce'] ?>&idT=<?= $card['id_user'] ?>&type=0&nom=<?= $card['trans'] ?>&x=0" role="button">Signaler</a></h6>
                    </td>
                </tr><?php 
            } ?>
            </tbody>
        </table><?php 
    }

    function modifAnnonce($id){
        $model = new controllerProfil();
        $diapo = $model ->modifAnnonce($id);
        return $diapo;
    }

    function noter(){
        $model = new controllerProfil();
        $diapo = $model ->noter();
        return $diapo;
    }

    function note(){
        $model = new modelProfil();
        $model ->note();
    }

    function gain(){
        $model = new modelProfil();
        $model ->gain();
    }

}
?>