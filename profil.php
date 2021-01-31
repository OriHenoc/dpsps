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
                                                    <i class="icofont icofont icofont icofont-file-document bg-secondary"></i>
                                                    <div class="d-inline">
                                                        <h4>Mon Profil</h4>
                                                        <span>Consultez vos informations et modifiez-les si vous le souhaitez.</span>
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
                                                        <li class="breadcrumb-item"><a href="profil.php">Profil</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Informations</h5>
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
                                                        <form action="">
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Nom d'utilisateur :</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                    class="form-control form-control-round" id="username" name="username" value="<?= $user['username_user'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Nom Complet :</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                    class="form-control form-control-round" id="fullname" name="fullname" value="<?= $user['fullname_user'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Email :</label>
                                                                <div class="col-sm-9">
                                                                    <input type="email"
                                                                    class="form-control form-control-round" id="email" name="email" value="<?= $user['email_user'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Téléphone :</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text"
                                                                    class="form-control form-control-round" id="telephone" name="telephone" value="<?= $user['telephone_user'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Poste :</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" readonly
                                                                    class="form-control form-control-round" value="<?= $role_user['libelle_role'] ?>">
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-12 text-center">
                                                                    <button class="btn btn-primary btn-round">Enregistrer</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Mot de Passe</h5>
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
                                                        <form action="">
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Mot de Passe Actuel :</label>
                                                                <div class="col-sm-12">
                                                                    <input type="password" id="oldPassword" name="oldPassword"
                                                                    class="form-control form-control-round" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Nouveau Mot de Passe :</label>
                                                                <div class="col-sm-12">
                                                                    <input type="password" id="newPassword" name="newPassword"
                                                                    class="form-control form-control-round" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-form-label">Confirmer Nouveau Mot de Passe :</label>
                                                                <div class="col-sm-12">
                                                                    <input type="password" id="newPassword2" name="newPassword2"
                                                                    class="form-control form-control-round" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <hr />
                                                            <div class="row">
                                                                <div class="col-sm-12 text-center">
                                                                    <button class="btn btn-danger btn-round">Modifier</button>
                                                                </div>
                                                            </div>
                                                        </form>
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

<?php 
require_once 'layout/footer.php'; 
else : header('location: login.php');
endif;
?>