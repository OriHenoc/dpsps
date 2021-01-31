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
                    <li class="active">
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
                                                        <h4>Utilisateurs</h4>
                                                        <span>Consultez et Ajoutez des utilisateurs à l'application</span>
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
                                                        <li class="breadcrumb-item"><a href="utilisateurs.php">Utilisateurs</a>
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
                                                        <h5>Liste des utilisateurs</h5>
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
                                                                <button data-toggle="modal" data-target="#modalajouter" class="btn btn-primary btn-round btnadd"><i class="ti-plus"></i> Nouveau Utilisateur</button>
                                                            </div>
                                                        </div>
                                                        <table id="tableauUsers" class="table table-hover table-bordered table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Nom Utilisateur</th>
                                                                    <th>Date Inscription</th>
                                                                    <th>Nom & Prénom(s)</th>
                                                                    <th>Email</th>
                                                                    <th>Téléphone</th>
                                                                    <th>Service</th>
                                                                    <th>Poste</th>
                                                                    <th>Compte Actif</th>
                                                                    <th>En ligne</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $i=1; foreach($personnel as $personne): ?>
                                                                <td scope="row"><?= $i++ ?></td>
                                                                <td><?= $personne['username_user'] ?></td>
                                                                <td><?= $personne['date_creation_user'] ?></td>
                                                                <td><?= $personne['fullname_user'] ?></td>
                                                                <td><?= $personne['email_user'] ?></td>
                                                                <td><?= $personne['telephone_user'] ?></td>
                                                                <td><?= $personne['libelle_service'] ?></td>
                                                                <td><?= $personne['libelle_role'] ?></td>
                                                                <td><?php $s = ''; $personne['statut_user']==1 ? $s = 'OUI' : $s = 'NON'; echo $s; ?></td>
                                                                <td><?php $l = ''; $personne['online']==1 ? $l = 'OUI' : $l = 'NON'; echo $l; ?></td>
                                                                <td>
                                                                <button id="<?= $personne["id_user"] ?>" data-toggle="modal" data-target="#modalmodifier" class="btn btn-success btn-round btnedit"><i class="ti-pencil"></i></button>
                                                                <button id="<?= $personne["id_user"] ?>" data-toggle="modal" data-target="#modalsupprimer" class="btn btn-danger btn-round btndelete"><i class="ti-lock"></i></button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">CREATION D'UN UTILISATEUR - DPSPS </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="queries/users/traitementAjout.php" method="post">
      <div class="modal-body">
            <h5 class="bg-info text-dark p-1">INFORMATIONS PERSONNELLES</h5>                                                      
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>NOM ET PRENOM(S) (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control form-control-round" required id="fullname_user" name="fullname_user">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>EMAIL (<span class="text-danger">*</span>)</label>
                    <input type="email" class="form-control form-control-round" required id="email_user" name="email_user">
                </div>
                <div class="col-md-6 text-center">
                    <label>NUMERO DE TELEPHONE (<span class="text-danger">*</span>)</label>
                    <input type="tel" class="form-control form-control-round" required id="telephone_user" name="telephone_user">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">INFORMATIONS PROFESSIONNELLES</h5> 
                <div class="form-group row">
                    <div class="col-md-6 text-center">
                        <label>SERVICE</label>
                        <select id="service_id" name="service_id" class="form-control">
                            <option selected disabled value="">-- Choisir Service --</option>
                            <?php foreach($services as $s): ?>
                                    <option value="<?= $s['id_service'] ?>"><?= $s['libelle_service'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6 text-center">
                        <label>POSTE / RÔLE (<span class="text-danger">*</span>)</label>
                        <select required id="role" name="role" class="form-control">
                            <option selected disabled value="">-- Choisir Poste --</option>
                            <?php foreach($roles as $r): ?>
                                    <option value="<?= $r['id_role'] ?>"><?= $r['libelle_role'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <h5 class="bg-info text-dark p-1">INFORMATIONS DU COMPTE</h5>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>NOM UTILISATEUR (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control form-control-round" id="username_user" name="username_user">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>MOT DE PASSE (<span class="text-danger">*</span>)</label>
                    <input type="password" class="form-control form-control-round" id="mdp_user" name="mdp_user">
                </div>
                <div class="col-md-6 text-center">
                    <label>CONFIRMER MOT DE PASSE (<span class="text-danger">*</span>)</label>
                    <input type="password" class="form-control form-control-round" id="mdp2_user" name="mdp2_user">
                </div>
            </div>                                         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="ajout_user" id="ajout_user" class="btn btn-primary btn-round">Ajouter</button>
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

<script src="treatments/imputation.js"></script>