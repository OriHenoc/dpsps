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
                    <li class="active">
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
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-9">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-users-alt-5 bg-success"></i>
                                                    <div class="d-inline">
                                                        <h4>Liste du personnel</h4>
                                                        <span>Ici vous pouvez avoir un regard sur la liste du personnel de la DPSPS utilisant l'application.</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="page-header-breadcrumb">
                                                    <ul class="breadcrumb-title">
                                                        <li class="breadcrumb-item">
                                                            <a href="./">
                                                                <i class="icofont icofont-home"></i>
                                                            </a>
                                                        </li>
                                                        <li class="breadcrumb-item"><a href="#!">Liste du personnel</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-header end -->

                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="card">
                                        <div class="card-header">
                                            <h5>EFFECTIF DPSPS (utilisant l'application)</h5>
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
                                        <div class="card-block table-border-style">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Nom Utilisateur</th>
                                                            <th>Nom & Prénom(s)</th>
                                                            <th>Email</th>
                                                            <th>Téléphone</th>
                                                            <th>Service</th>
                                                            <th>Poste</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i=1; foreach($personnel as $personne): ?>
                                                            <tr>
                                                                <td scope="row"><?= $i++ ?></td>
                                                                <td><?= $personne['username_user'] ?></td>
                                                                <td><?= $personne['fullname_user'] ?></td>
                                                                <td><?= $personne['email_user'] ?></td>
                                                                <td><?= $personne['telephone_user'] ?></td>
                                                                <td><?= $personne['libelle_service'] ?></td>
                                                                <td><?= $personne['libelle_role'] ?></td>
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
    </div>

<?php 
require_once 'layout/footer.php'; 
else : header('location: login.php');
endif;
?>