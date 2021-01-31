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
                    <li>
                        <a href="dossiers.php">
                            <span class="pcoded-micon"><i class="ti-folder"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Dossiers</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li class="active">
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
                                                    <i class="icofont icofont icofont icofont-layers bg-danger"></i>
                                                    <div class="d-inline">
                                                        <h4>Activités</h4>
                                                        <span>Consultez et Ajoutez des activités qui seront liées à un dossier.</span>
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
                                                        <li class="breadcrumb-item"><a href="activites.php">Activités</a>
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
                                                        <h5>Liste des activités</h5>
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
                                                                <button data-toggle="modal" data-target="#modalajouter" class="btn btn-primary btn-round btnadd"><i class="ti-plus"></i> Nouvelle Activité</button>
                                                            </div>
                                                        </div>
                                                        <table id="tableauActivites" class="table table-hover table-bordered table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Date début</th>
                                                                    <th>Description</th>
                                                                    <th>Dossier Concerné</th>
                                                                    <th>Position</th>
                                                                    <th>Date fin</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($activites as $act): ?>
                                                                <tr>
                                                                <td><?= $i++ ?></td>
                                                                <td><?= $act["date_debut_activite"] ?></td>
                                                                <td><?= $act["libelle_activite"] ?></td>
                                                                <td>
                                                                    <?php 
                                                                        $dos = $act["dossier_activite"];
                                                                        $req_dossier = $bdd->query("SELECT * FROM dossiers INNER JOIN activites ON dossiers.id_dos=activites.dossier_activite WHERE dossiers.id_dos=$dos");
                                                                        $dossier = $req_dossier->fetch();

                                                                        echo "<a href='dossiers.php'>".$dossier["ref_dos"]."</a>";
                                                                    ?>
                                                                </td>
                                                                <td>
                                                                    <?php
                                                                        if($role=='CE'):
                                                                            $stat = $act["statut_activite_ce"];
                                                                            $req_statut = $bdd->query("SELECT * FROM statut_activite_ce WHERE id_statut_activite_ce=$stat");
                                                                            $statut = $req_statut->fetch();
                                                                            echo $statut['lib_statut_activite_ce'];
                                                                        endif;
                                                                        if($role=='CS'):
                                                                            $stat = $act["statut_activite_cs"];
                                                                            $req_statut = $bdd->query("SELECT * FROM statut_activite_cs WHERE id_statut_activite_cs=$stat");
                                                                            $statut = $req_statut->fetch();
                                                                            echo $statut['lib_statut_activite_cs'];
                                                                        endif;
                                                                        if($role=='SD'):
                                                                            $stat = $act["statut_activite_sd"];
                                                                            $req_statut = $bdd->query("SELECT * FROM statut_activite_sd WHERE id_statut_activite_sd=$stat");
                                                                            $statut = $req_statut->fetch();
                                                                            echo $statut['lib_statut_activite_sd'];
                                                                        endif;
                                                                        if($role=='DR'):
                                                                            $statCE = $act["statut_activite_ce"];
                                                                            $req_statutCE = $bdd->query("SELECT * FROM statut_activite_ce WHERE id_statut_activite_ce=$statCE");
                                                                            $statutCE = $req_statutCE->fetch();

                                                                            $statCS = $act["statut_activite_cs"];
                                                                            $req_statutCS = $bdd->query("SELECT * FROM statut_activite_cs WHERE id_statut_activite_cs=$statCS");
                                                                            $statutCS = $req_statutCS->fetch();

                                                                            $statSD = $act["statut_activite_sd"];
                                                                            $req_statutSD = $bdd->query("SELECT * FROM statut_activite_sd WHERE id_statut_activite_sd=$statSD");
                                                                            $statutSD = $req_statutSD->fetch();

                                                                            echo 
                                                                                "Au niveau du CE : <br>".$statutCE['lib_statut_activite_ce'].
                                                                                "<br><br>Au niveau du CS : <br>".$statutCS['lib_statut_activite_cs'].
                                                                                "<br><br>Au niveau du SD : <br>".$statutSD['lib_statut_activite_sd'];
                                                                        endif;
                                                                    ?>
                                                                </td>
                                                                <td><?= $act["date_fin_activite"] ?></td>
                                                                <td>
                                                                <button id="<?=  $act["id_activite"] ?>" data-toggle="modal" data-target="#modalmodifier" class="btn btn-success btn-round btnedit"><i class="ti-pencil"></i></button>
                                                                <button id="<?=  $act["id_activite"] ?>" data-toggle="modal" data-target="#modalsupprimer" class="btn btn-danger btn-round btndelete"><i class="ti-trash"></i></button>
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
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une activité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="queries/activites/traitementAjout.php" method="post">
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>DESCRIPTION DE L'ACTIVITE (<span class="text-danger">*</span>)</label>
                    <div class="col-sm-12">
                        <textarea rows="6" cols="6" id="libelle_activite" name="libelle_activite" class="form-control" required></textarea>
                    </div>
                </div>
            </div> 
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>LIER AU DOSSIER (<span class="text-danger">*</span>)</label>
                    <select id="dossier_activite" name="dossier_activite" class="form-control" required>
                        <option selected disabled value="">-- Choisir DOSSIER --</option>
                        <?php foreach($dossiers as $d): ?>
                                <option value="<?= $d['id_dos'] ?>"><?= $d['ref_dos'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>                                                       
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
            <button type="submit" name="ajout_activite" id="ajout_activite" class="btn btn-primary btn-round">Ajouter</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalmodifier" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modifier une activité </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="form_mod" action="queries/activites/modifier.php" method="post">
            <div class="affiche"></div>
            <?php if($role==='CE'): ?>
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <label>STATUT</label>
                        <select id="statut_activite_ce" name="statut_activite_ce" class="form-control" required>
                            <option selected value="">-- Modifier statut --</option>
                            <?php foreach($statut_activite_ce as $stce): ?>
                                    <option value="<?= $stce['id_statut_activite_ce'] ?>"><?= $stce['lib_statut_activite_ce'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> 
            <?php endif; ?>
            <?php if($role==='CS'): ?>
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <label>STATUT</label>
                        <select id="statut_activite_cs" name="statut_activite_cs" class="form-control" required>
                            <option selected disabled value="">-- Choisir statut --</option>
                            <?php foreach($statut_activite_cs as $stcs): ?>
                                    <option value="<?= $stcs['id_statut_activite_cs'] ?>"><?= $stcs['lib_statut_activite_cs'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> 
            <?php endif; ?>  
            <?php if($role==='SD'): ?>
                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <label>STATUT</label>
                        <select id="statut_activite_sd" name="statut_activite_sd" class="form-control" required>
                            <option selected disabled value="">-- Choisir statut --</option>
                            <?php foreach($statut_activite_sd as $stsd): ?>
                                    <option value="<?= $stsd['id_statut_activite_sd'] ?>"><?= $stsd['lib_statut_activite_sd'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div> 
            <?php endif; ?>                                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="modifier_activite" id="modifier_activite" class="btn btn-success btn-round">Modifier</button>
      </div>
      </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="modalsupprimer" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Supprimer une activité </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="form_sup" action="queries/activites/supprimer.php" method="post">
            <div class="affichage"></div>                                     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="supprimer_activite" id="supprimer_activite" class="btn btn-danger btn-round">Supprimer</button>
      </div>
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

            var id_activite = $(this).attr("id");
        
            $.ajax({
                url: "queries/activites/traitementModif.php",
                method: "POST",
                data: {id_activite:id_activite},
                success:function(data){
                    $(".affiche").html(data);
                }
            })
            
            
        });
            
        $(document).on('click', '#modifier_activite', function(){
        
            $("#form_mod").submit();
        
        });


        //supprimer
        $(document).on('click', '.btndelete', function(){

        var id_actsup = $(this).attr("id");

        $.ajax({
            url: "queries/activites/traitementSup.php",
            method: "POST",
            data: {id_actsup:id_actsup},
            success:function(data){
                $(".affichage").html(data);
            }
        })


        });
        $(document).on('click', '#supprimer_activite', function(){

        $("#form_sup").submit();

        });
    });
    
</script>