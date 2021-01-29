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
                        <a href="bs-basic-table.html">
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

                        <div class="page-body">
                            <div class="row">
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-folder-open bg-c-blue card1-icon"></i>
                                            <span class="text-c-blue f-w-600">Total Dossiers</span>
                                            <h4>228</h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-yellow f-16 icofont icofont-warning m-r-10"></i>
                                                    D'autres en cours...
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-tack-pin bg-c-green card1-icon"></i>
                                            <span class="text-c-green f-w-600">Total Activités</span>
                                            <h4>11</h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-green f-16 icofont icofont-calendar m-r-10"></i>Ce mois (Janvier 2021)
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-warning-alt bg-c-pink card1-icon"></i>
                                            <span class="text-c-pink f-w-600">Dernier delai</span>
                                            <h4>5 jours</h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-pink f-16 icofont icofont-tag m-r-10"></i>Activité Prioritaire
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
                                <!-- card1 start -->
                                <div class="col-md-6 col-xl-3">
                                    <div class="card widget-card-1">
                                        <div class="card-block-small">
                                            <i class="icofont icofont-trophy-alt bg-c-yellow card1-icon"></i>
                                            <span class="text-c-yellow f-w-600">Agent du Mois</span>
                                            <h4>4 fois</h4>
                                            <div>
                                                <span class="f-left m-t-10 text-muted">
                                                    <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>2<sup>ème</sup> au classement
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- card1 end -->
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
                                            <div id="statestics-chart" style="height:517px;"></div>
                                        </div>
                                    </div>
                                </div>



                                <!-- <div class="col-md-12 col-xl-4"> -->
                                        <!-- <div class="card fb-card">
                                            <div class="card-header">
                                                <i class="icofont icofont-social-facebook"></i>
                                                <div class="d-inline-block">
                                                    <h5>facebook</h5>
                                                    <span>blog page timeline</span>
                                                </div>
                                            </div>
                                            <div class="card-block text-center">
                                                <div class="row">
                                                    <div class="col-6 b-r-default">
                                                        <h2>23</h2>
                                                        <p class="text-muted">Active</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2>23</h2>
                                                        <p class="text-muted">Comment</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card dribble-card">
                                            <div class="card-header">
                                                <i class="icofont icofont-social-dribbble"></i>
                                                <div class="d-inline-block">
                                                    <h5>dribble</h5>
                                                    <span>Product page analysis</span>
                                                </div>
                                            </div>
                                            <div class="card-block text-center">
                                                <div class="row">
                                                    <div class="col-6 b-r-default">
                                                        <h2>23</h2>
                                                        <p class="text-muted">Live</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2>23</h2>
                                                        <p class="text-muted">Message</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card twitter-card">
                                            <div class="card-header">
                                                <i class="icofont icofont-social-twitter"></i>
                                                <div class="d-inline-block">
                                                    <h5>twitter</h5>
                                                    <span>current new timeline</span>
                                                </div>
                                            </div>
                                            <div class="card-block text-center">
                                                <div class="row">
                                                    <div class="col-6 b-r-default">
                                                        <h2>25</h2>
                                                        <p class="text-muted">new tweet</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h2>450+</h2>
                                                        <p class="text-muted">Follower</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                
                                <!-- Email Sent End -->
                                <!-- Data widget start -->
                                <div class="col-md-12 col-xl-6">
                                    <div class="card project-task">
                                        <div class="card-header">
                                            <div class="card-header-left ">
                                                <h5>Gestion de temps : Activités / tâches</h5>
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
                                        <div class="card-block p-b-10">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Activités</th>
                                                            <th>Exécution</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <div class="task-contain">
                                                                    <h6 class="bg-c-blue d-inline-block text-center">B</h6>
                                                                    <p class="d-inline-block m-l-20">Boire du café</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="d-inline-block m-r-20">5 minutes</p>
                                                                <div class="progress d-inline-block">
                                                                    <div class="progress-bar bg-c-blue" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:60%">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="task-contain">
                                                                    <h6 class="bg-c-pink d-inline-block text-center">M</h6>
                                                                    <p class="d-inline-block m-l-20">Manger du Garba</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="d-inline-block m-r-20">20 minutes</p>
                                                                <div class="progress d-inline-block">
                                                                    <div class="progress-bar bg-c-pink" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <div class="task-contain">
                                                                    <h6 class="bg-c-yellow d-inline-block text-center">L</h6>
                                                                    <p class="d-inline-block m-l-20">Faire du sport</p>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="d-inline-block m-r-20">2 heures</p>
                                                                <div class="progress d-inline-block">
                                                                    <div class="progress-bar bg-c-yellow" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:50%">
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-xl-6">
                                    <div class="card add-task-card">
                                        <div class="card-header">
                                            <div class="card-header-left">
                                                <h5>To do list</h5>
                                            </div>
                                            <div class="card-header-right">
                                                <button class="btn btn-card btn-primary">Ajouter une tâche </button>
                                            </div>
                                        </div>
                                        <div class="card-block">
                                            <div class="to-do-list">
                                                <div class="checkbox-fade fade-in-primary d-block">
                                                    <label class="check-task d-block">
                                                        <input type="checkbox" value="">
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                                        </span>
                                                        <span><h6>Présenter une application</h6><p class="text-muted m-l-40">28 Janvier 2021</p></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="to-do-list">
                                                <div class="checkbox-fade fade-in-primary d-block">
                                                    <label class="check-task d-block">
                                                        <input type="checkbox" value="">
                                                        <span class="cr">
                                                            <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                                        </span>
                                                        <span><h6>Rencontrer le DG</h6><p class="text-muted m-l-40">05 Février 2021</p></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Data widget End -->
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