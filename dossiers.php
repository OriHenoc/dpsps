<?php 
    session_start();
    require_once 'config/connexion.php';
    if (isset($_SESSION['id_user']) && $_SESSION['id_user']!=''):
    $id=$_SESSION['id_user'];

    require_once 'functions.php';
    require_once 'queries/read.php';
    require_once 'layout/header.php';
?>                           
                            <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="./">
                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tableau de Bord</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Gestion</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li class="active">
                        <a href="dossiers.php">
                            <span class="pcoded-micon"><i class="ti-folder"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dossiers</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="activites.php">
                            <span class="pcoded-micon"><i class="ti-layers-alt"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Activités</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>

                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Consultation</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="notifications.php">
                            <span class="pcoded-micon"><i class="ti-bell"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Notifications</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="suivi.php">
                            <span class="pcoded-micon"><i class="ti-stats-up"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Rapports et Suivis</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="personnel.php">
                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Liste du personnel</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="services.php">
                            <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Liste des services</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Administration</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="utilisateurs.php">
                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Utilisateurs</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>

                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont icofont icofont-folder-open bg-primary"></i>
                                                    <div class="d-inline">
                                                        <h4>Dossiers</h4>
                                                        <span>Consultez et Ajoutez des dossiers</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="./">
                                                                <i class="icofont icofont-home"></i>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="dossiers.php">Dossiers</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Liste des dossiers</h5>
                                                        <div class="card-header-right">
                                                            <ul class="list-unstyled card-option" style="width: 35px;">
                                                                <li class=""><i class="icofont icofont-simple-left"></i></li>
                                                                <li><i class="icofont icofont-maximize full-card"></i></li>
                                                                <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                                <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                                <li><i class="icofont icofont-error close-card"></i></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="row mb-4">
                                                            <div class="col-sm-12">
                                                                <button data-toggle="modal" data-target="#modalajouter" class="btn btn-primary btn-round btnadd"><i class="ti-plus"></i> Nouveau Dossier</button>
                                                            </div>
                                                        </div>
                                                        <table id="tableauDossiers" class="table table-hover table-bordered table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Reference</th>
                                                                    <th>Date Dossier</th>
                                                                    <th>Date Réception</th>
                                                                    <th>Instructions DGPE</th>
                                                                    <th>Expediteur</th>
                                                                    <th>Objet</th>
                                                                    <th>Instructions</th>
                                                                    <th>Imputation</th>
                                                                    <th>Début</th>
                                                                    <th>Fin Prévue</th>
                                                                    <th>Fin Réelle</th>
                                                                    <th>Statut</th>
                                                                    <th>Observations</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($dossiers as $dos): 
                                                                
                                                                //check & update dossier

                                                                $leDos = $dos['id_dos'];

                                                                   
                                                                                                                                        
                                                                ?>
                                                                <tr>
                                                                <td><?= $i++ ?></td>
                                                                <td><?= $dos["ref_dos"] ?></td>
                                                                <td><?= $dos["date_dos"] ?></td>
                                                                <td><?= $dos["date_recep_dos"] ?></td>
                                                                <td><?= $dos["instructDGPE_dos"] ?></td>
                                                                <td><?= $dos["expediteur_dos"] ?></td>
                                                                <td><?= $dos["objet_dos"] ?></td>
                                                                <td><?= $dos["instructions_dos"] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        if($dos["imputation_sd_dos"]):
                                                                            $sd_dos = $dos["imputation_sd_dos"];
                                                                            $req_sd = $bdd->query("SELECT * FROM sousdirections INNER JOIN dossiers ON dossiers.imputation_sd_dos=sousdirections.id_sd WHERE dossiers.imputation_sd_dos=$sd_dos");
                                                                            $sd = $req_sd->fetch();

                                                                            echo "- Imputé à la Sous-Direction : <br>".$sd["libelle_sd"];
                                                                        endif;
                                                                    ?> 
                                                                    <?php 
                                                                        if($dos["imputation_service_dos"]):
                                                                            $serv_dos = $dos["imputation_service_dos"];
                                                                            $req_serv = $bdd->query("SELECT * FROM services INNER JOIN dossiers ON dossiers.imputation_service_dos=services.id_service WHERE dossiers.imputation_service_dos=$serv_dos");
                                                                            $serv = $req_serv->fetch();

                                                                            echo "<br><br> - Imputé au Service : <br>".$serv["libelle_service"];
                                                                        endif;
                                                                    ?>
                                                                    <?php 
                                                                        if($dos["imputation_agent_dos"]):
                                                                            $agt_dos = $dos["imputation_agent_dos"];
                                                                            $req_agt = $bdd->query("SELECT * FROM users INNER JOIN dossiers ON dossiers.imputation_agent_dos=users.id_user WHERE dossiers.imputation_agent_dos=$agt_dos");
                                                                            $ag = $req_agt->fetch();

                                                                            echo "<br><br> - Imputé à l'agent : <br>".$ag["fullname_user"];
                                                                        endif;
                                                                    ?>
                                                                    <?php
                                                                        if($dos["imputation_autres"]):
                                                                            echo "<br><br> - Autres Imputations : <br>".$dos["imputation_autres"];
                                                                        endif;
                                                                    ?>
                                                                </td>
                                                                <td><?= $dos["date_debut_dos"]; ?></td>
                                                                <td><?= $dos["date_fin_prevue_dos"] ?></td>
                                                                <td><?= $dos["date_fin_reelle_dos"] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        //Statut du dossier
                                                                        $req_statut = $bdd->query("SELECT * FROM statut_dossier INNER JOIN dossiers ON statut_dossier.id_statut_dos=dossiers.statut_dos WHERE dossiers.id_dos=$leDos");
                                                                        $statut = $req_statut->fetch();

                                                                        echo $statut["lib_statut_dos"];
                                                                    ?>
                                                                </td>
                                                                <td><?= $dos["observations_dos"] ?></td>
                                                                <td>
                                                                <button id="<?= $dos["id_dos"] ?>" data-toggle="modal" data-target="#modalmodifier" class="btn btn-success btn-round btnedit"><i class="ti-pencil"></i></button>
                                                                <button id="<?= $dos["id_dos"] ?>" data-toggle="modal" data-target="#modalsupprimer" class="btn btn-danger btn-round btndelete"><i class="ti-trash"></i></button>
                                                                </td>
                                                                </tr>
                                                            <?php  endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODALS -->

<div class="modal fade" id="modalajouter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">FICHE D'IMPUTATION DE COURRIER - DPSPS </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="queries/dossiers/traitementAjout.php" method="post">
      <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label class="col-sm-4 col-form-label">INSTRUCTIONS DU DGPE :</label>
                    <input type="text" class="form-control form-control-round" id="instructDGPE_dos" name="instructDGPE_dos">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">INFORMATIONS DU COURRIER</h5>                                                      
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>EXPEDITEUR</label>
                    <input type="text" class="form-control form-control-round" id="expediteur_dos" name="expediteur_dos">
                </div>
                <div class="col-md-6 text-center">
                    <label>REFERENCE (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control form-control-round" id="ref_dos" name="ref_dos" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>OBJET (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control form-control-round" id="objet_dos" name="objet_dos" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>DATE DU DOSSIER</label>
                    <input type="date" class="form-control form-control-round" id="date_dos" name="date_dos">
                </div>
                <div class="col-md-6 text-center">
                    <label>DATE DE RECEPTION</label>
                    <input type="date" class="form-control form-control-round" id="date_recep_dos" name="date_recep_dos">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">IMPUTATIONS</h5> 
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>SOUS DIRECTION</label>
                    <select id="imputation_sd_dos" name="imputation_sd_dos" class="form-control">
                        <option selected disabled value="0">-- Choisir SD --</option>
                        <?php foreach($sousdirections as $sd): ?>
                                <option value="<?= $sd['id_sd'] ?>"><?= $sd['libelle_sd'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                </div>
                <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>SERVICE</label>
                    <select id="imputation_service_dos" name="imputation_service_dos" class="form-control">
                        <option selected disabled value="0">-- Choisir Service --</option>
                    </select>
                </div>
                <div class="col-md-6 text-center">
                    <label>AGENT</label>
                    <select id="imputation_agent_dos" name="imputation_agent_dos" class="form-control">
                        <option selected disabled value="0">-- Choisir Agent --</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>AUTRES</label>
                    <input type="text" class="form-control form-control-round" id="imputation_autres" name="imputation_autres">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">INSTRUCTIONS</h5> 
            <div class="form-group row">
                <div class="col-md-4 ml-4 mr-2">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Examen" id="instruction1" name="instructions[]">
                        <label class="form-check-label" for="instruction1">
                            Pour Examen
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Suivi" id="instruction2" name="instructions[]">
                        <label class="form-check-label" for="instruction2">
                            Pour Suivi
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Disposition à Prendre" id="instruction3" name="instructions[]">
                        <label class="form-check-label" for="instruction3">
                            Pour Disposition à Prendre
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Diffusion" id="instruction4"  name="instructions[]">
                        <label class="form-check-label" for="instruction4">
                            Pour Diffusion  
                        </label>
                    </div>
                </div>  
                <div class="col-md-3 mr-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="A Classer" id="instruction5" name="instructions[]">
                        <label class="form-check-label" for="instruction5">
                            A Classer
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour note de Synthèse" id="instruction6" name="instructions[]">
                        <label class="form-check-label" for="instruction6">
                            Pour note de Synthèse
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Avis" id="instruction7" name="instructions[]">
                        <label class="form-check-label" for="instruction7">
                            Pour Avis
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Accord" id="instruction8" name="instructions[]">
                        <label class="form-check-label" for="instruction8">
                            Pour Accord
                        </label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Instruction" id="instruction9" name="instructions[]">
                        <label class="form-check-label" for="instruction9">
                            Pour Instruction
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Me Voir" id="instruction10" name="instructions[]">
                        <label class="form-check-label" for="instruction10">
                            Me Voir
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Pour Information" id="instruction11" name="instructions[]">
                        <label class="form-check-label" for="instruction11">
                            Pour Information
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>AUTRES</label>
                    <input type="text" class="form-control form-control-round" id="instructionAutre" name="instructions[]">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">DELAI</h5> 
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>DATE DE DEBUT</label>
                    <input type="date" class="form-control form-control-round" id="date_debut_dos" name="date_debut_dos">
                </div>
                <div class="col-md-6 text-center">
                    <label>DATE DE FIN</label>
                    <input type="date" class="form-control form-control-round" id="date_fin_prevue_dos" name="date_fin_prevue_dos">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">OBSERVATIONS</h5> 
            <div class="form-group row">
                <div class="col-sm-12">
                    <textarea rows="5" cols="5" id="observations_dos" name="observations_dos" class="form-control"></textarea>
                </div>
            </div>                                              
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="ajout_dossier" id="ajout_dossier" class="btn btn-primary btn-round">Ajouter</button>
      </div>
      <input type="hidden" name="user" value="<?= $id; ?>">
      </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="modalmodifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">MODIFICATION DE DOSSIER - DPSPS </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="form_mod" action="queries/dossiers/modifier.php" method="post">
            <div class="affiche"></div>                                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="modifier_dossier" id="modifier_dossier" class="btn btn-success btn-round">Modifier</button>
      </div>
      <input type="hidden" name="user" value="<?= $id; ?>">
      </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="modalsupprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">SUPPRESSION DE DOSSIER - DPSPS </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="form_sup" action="queries/dossiers/supprimer.php" method="post">
            <div class="affichage"></div>                                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="supprimer_dossier" id="supprimer_dossier" class="btn btn-danger btn-round">Supprimer</button>
      </div>
      <input type="hidden" name="user" value="<?= $id; ?>">
      </form> 
    </div>
  </div>
</div>

<?php 
require_once 'layout/footer.php'; 
else : header('location: login.php');
endif;
?>
<script>
    $(document).ready(function(){

        //modifier
        $(document).on('click', '.btnedit', function(){

            var id_dossier = $(this).attr("id");
        
            $.ajax({
                url: "queries/dossiers/traitementModif.php",
                method: "POST",
                data: {id_dossier:id_dossier},
                success:function(data){
                    $(".affiche").html(data);
                }
            })
            
            
        });
            
        $(document).on('click', '#modifier_dossier', function(){
        
            $("#form_mod").submit();
        
        });


        //supprimer
        $(document).on('click', '.btndelete', function(){

        var id_dossup = $(this).attr("id");

        $.ajax({
            url: "queries/dossiers/traitementSup.php",
            method: "POST",
            data: {id_dossup:id_dossup},
            success:function(data){
                $(".affichage").html(data);
            }
        })


        });
        $(document).on('click', '#supprimer_dossier', function(){

        $("#form_sup").submit();

        });
    });
    
</script>
<script src="treatments/imputation.js"></script>