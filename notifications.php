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
                    <li class="active">
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
                                    <!-- Page-header start -->
                                    <div class="page-header card">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <i class="icofont icofont-notification bg-primary"></i>
                                                    <div class="d-inline">
                                                        <h4>Centre de notifications</h4>
                                                        <span>Ici vous pouvez consulter toutes vos notifications</span>
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
                                                        <li class="breadcrumb-item"><a href="#!">Notifications</a>
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
                                                        <?php if($nbre_notifications!==0): ?>
                                                            <div class="pull-right">
                                                                <button type="button" data-toggle="modal" data-target="#delall" class="btn btn-danger btn-outline btn-round margin-0">Supprimer tout (<?= $nbre_notifications ?>)</button>
                                                            </div>
                                                        <?php else: echo 'Aucune Notification'; endif; ?>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="notification-list mail-list not-list small-slimscroll-style">
                                                            <?php foreach($notifications as $n): ?>
                                                                <div class="media bg-light rounded p-2">
                                                                    <div class="media-body">
                                                                        <h5 class="notification-user"><?= $n['libelle_notif'] ?></h5>
                                                                        <p class="notification-msg"><?= $n['description_notif'] ?></p>
                                                                        <span class="notification-time">Action réalisée <?= time2str($n['date_notif']) ?></span>
                                                                    </div>
                                                                </div>
                                                                <hr />
                                                            <?php endforeach; ?>
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

<div class="modal fade" id="delall" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Supprimer une activité </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="queries/notifications/del.php" method="post">
            <h6 class="text-center">
                Etes-vous sûr de vouloir supprimer toutes les notifications ? <br><br>
                <span class="small">Action Irrémédiable</span>
            </h6>                                   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-round" data-dismiss="modal">Annuler</button>
        <button type="submit" name="supprimer_notifs" id="supprimer_notifs" class="btn btn-danger btn-round">Supprimer</button>
      </div>
      <input type="hidden" name="userx" value="<?= $id; ?>"/>
      </form> 
    </div>
  </div>
</div>

<?php 
require_once 'layout/footer.php'; 
else : header('location: login.php');
endif;
?>