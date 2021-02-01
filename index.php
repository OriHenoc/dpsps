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
                    <li class="active">
                        <a href="./">
                            <span class="pcoded-micon"><i class="ti-home"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Tableau de Bord</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                </ul>
                <?php if($role!=='SA'): ?>
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
                <?php endif; ?>

                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Consultation</div>
                <ul class="pcoded-item pcoded-left-item">
                <?php if($role!=='SA'): ?>
                    <li>
                        <a href="notifications.php">
                            <span class="pcoded-micon"><i class="ti-bell"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.form-components.main">Notifications</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    <?php endif; ?>
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
                <?php if($role==='SA'): ?>
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
                <?php endif; ?>

            </div>
        </nav>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <div class="row">
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-folder-open bg-c-blue card1-icon"></i>
                                            <span class="text-c-blue f-w-600">Total Dossiers</span>
                                            <h4><?= $totalDossiers ?></h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <?php if($totalDossiersFinalises < $totalDossiers): ?>
                                                    <i class="text-c-yellow f-16 icofont icofont-warning m-r-10"></i>
                                                    <?php endif; ?>
                                                    <?php if($totalDossiersFinalises == $totalDossiers): ?>
                                                    <i class="text-c-green f-16 icofont icofont-checked m-r-10"></i>
                                                    <?php endif; ?>
                                                    Finalisés : <?= $totalDossiersFinalises ?> / <?= $totalDossiers ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-tack-pin bg-c-green card1-icon"></i>
                                            <span class="text-c-green f-w-600">Total Activités</span>
                                            <h4><?= $totalActivites ?></h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-green f-16 icofont icofont-automation m-r-10"></i>
                                                    En cours de traitement : <?= $totalActivitesEnCours?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-4">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-warning-alt bg-c-pink card1-icon"></i>
                                            <span class="text-c-pink f-w-600">Dernier delai</span>
                                            <h4>
                                                <?php 
                                                    if($delaiJoursDosProche>1):
                                                    echo $delaiJoursDosProche.' jours';
                                                    endif;
                                                    if($delaiJoursDosProche==1):
                                                    echo 'Demain';
                                                    endif;
                                                    if($delaiJoursDosProche==0):
                                                    echo 'Aujourd\'hui';
                                                    endif;
                                                    if($delaiJoursDosProche<0):
                                                    echo 'Dépassé';
                                                    endif;
                                                ?>
                                            </h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-pink f-16 icofont icofont-tag m-r-10"></i>
                                                    Dossier : <a href="dossiers.php"><?= $dossier_fin_proche['ref_dos'] ?></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Statestics Start -->
                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Statistiques (2020)</h5>
                                            <div class="card-header-left ">
                                            </div>
                                            <div class="card-header-right">
                                                <ul class="list-unstyled card-option">
                                                    <li><i class="icofont icofont-simple-left "></i></li>
                                                    <li><i class="icofont icofont-maximize full-card"></i></li>
                                                    <li><i class="icofont icofont-minus minimize-card"></i></li>
                                                    <li><i class="icofont icofont-refresh reload-card"></i></li>
                                                    <li><i class="icofont icofont-error close-card"></i></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div id="statestics-chart" style="height:200px;"></div>
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