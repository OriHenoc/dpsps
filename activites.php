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
                        <a href="consultation/notifications.php">
                            <span class="pcoded-micon"><i class="ti-bell"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Notifications</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="chart.html">
                            <span class="pcoded-micon"><i class="ti-stats-up"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Rapports et Suivis</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="map-google.html">
                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Liste du personnel</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="map-google.html">
                            <span class="pcoded-micon"><i class="ti-briefcase"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Liste des services</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <!-- liste du personnel (et leur service respectifs)
                liste des services (nombre de personnel dans le service) -->
                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Administration</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="chart.html">
                            <span class="pcoded-micon"><i class="ti-user"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Utilisateurs</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="map-google.html">
                            <span class="pcoded-micon"><i class="ti-check-box"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Rôles</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>

                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Configurations</div>
                <ul class="pcoded-item pcoded-left-item">
                    <li>
                        <a href="map-google.html">
                            <span class="pcoded-micon"><i class="ti-view-grid"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">L' Application</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <li>
                        <a href="map-google.html">
                            <span class="pcoded-micon"><i class="ti-palette"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Thème</span>
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
                                                    <i class="icofont icofont icofont icofont-file-document bg-secondary"></i>
                                                    <div class="d-inline">
                                                        <h4>Activités</h4>
                                                        <span>Consultez et Ajoutez des activités qui seront ajoutées au dossier.</span>
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
                                                                <button data-toggle="modal" data-target="#modalajouter" class="btn btn-primary btn-round btnadd"><i class="ti-plus"></i> Nouveau Dossier</button>
                                                            </div>
                                                        </div>
                                                        <table id="tableauDossiers" class="table table-hover table-bordered table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Date</th>
                                                                    <th>Intitulé</th>
                                                                    <th>Instructions</th>
                                                                    <th>Imputation</th>
                                                                    <th>Fin Prévue</th>
                                                                    <th>Fin Réelle</th>
                                                                    <th>Activités</th>
                                                                    <th>Statut</th>
                                                                    <th>Observations</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($dossiers as $dos): ?>
                                                                <tr>
                                                                <td><?= $i++ ?></td>
                                                                <td><?= $dos["date_creat_dos"]; ?></td>
                                                                <td><?= $dos["intitule_dos"]; ?></td>
                                                                <td><?= $dos["instructions_dos"]; ?></td>
                                                                <td>
                                                                    Service Projet
                                                                </td>
                                                                <td><?= $dos["date_fin_prevue_dos"]; ?></td>
                                                                <td><?= $dos["date_fin_effective_dos"]; ?></td>
                                                                <td>
                                                                    <ul>
                                                                        <li>Reunion</li>
                                                                        <li>Discussion</li>
                                                                        <li>Débat</li>
                                                                    </ul>
                                                                </td>
                                                                <td>Débuté</td>
                                                                <td><?= $dos["observations_dos"]; ?></td>
                                                                <td>
                                                                <button id="<?= $dos["reference_dos"] ?>" data-toggle="modal" data-target="#modalmodifier" class="btn btn-success btn-round btnedit"><i class="ti-pencil"></i></button>
                                                                <button id="<?= $dos["reference_dos"] ?>" data-toggle="modal" data-target="#modalsupprimer" class="btn btn-danger btn-round btndelete"><i class="ti-trash"></i></button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Imputation d'un Nouveau Dossier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Intitulé :</label>
                <div class="col-sm-8">
                    <input type="text"
                    class="form-control form-control-round" id="intitule" name="intitule">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Instructions :</label>
                <div class="col-sm-8">
                    <textarea rows="5" cols="5" id="instructions" name="instructions" class="form-control" placeholder="Vous instructions ici ! Vous pouvez les lister sous forme de tiret."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Imputation à:</label>
                <div class="col-sm-8">
                    <select name="select" class="form-control">
                        <option value="opt1">Un Service</option>
                        <option value="opt2">Un Agent</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Service cible :</label>
                <div class="col-sm-8">
                    <select name="select" class="form-control">
                        <option value="opt1">Service Informatique</option>
                        <option value="opt2">Service Projet</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Date de début :</label>
                <div class="col-sm-8">
                    <input type="date"
                    class="form-control form-control-round datepicker" id="dateCreat" name="dateCreat">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Date de fin :</label>
                <div class="col-sm-8">
                    <input type="date"
                    class="form-control form-control-round datepicker" id="dateFin" name="dateFin">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-4 col-form-label">Observations :</label>
                <div class="col-sm-8">
                    <textarea rows="4" cols="4" id="observations" name="observations" class="form-control" placeholder=""></textarea>
                </div>
            </div>
        </form>                                                         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="ajout_dossier" id="ajout_dossier" class="btn btn-primary btn-round">Ajouter</button>
      </div>
    </div>
  </div>
</div>


<?php 
require_once 'layout/footer.php'; 
else : header('location: login.php');
endif;
?>