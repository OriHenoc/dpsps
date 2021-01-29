<!DOCTYPE html>
<html lang="fr">

<?php require_once 'head.php'; ?>

  <body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">

                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a href="./">
                            <h5><?= $infos_app['nom_application'] ?></h5>
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>

                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <?php if ($nbre_notifications_non_lues !== 0): ?>
                                    <span class="badge bg-danger"></span> 
                                    <?php endif ?>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger"><?= $nbre_notifications_non_lues ?> Nouvelle<?php if($nbre_notifications_non_lues > 1):?>x<?php endif ?></label>
                                    </li>
                                    <?php
                                        if($nbre_notifications_non_lues === 0) : echo '<li class="text-center">Aucune nouvelle notification</li>'; endif ; 
                                        foreach($notifications_non_lues as $notifs): 
                                    ?>
                                    <li>
                                        <a href="consultation/notifications.php/#<?= $notifs['id_notif'] ?>">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="notification-user"><?= $notifs['libelle_notif'] ?></h5>
                                                    <p class="notification-msg"><?= $notifs['description_notif'] ?></p>
                                                    <span class="notification-time"><?= time2str($notifs['date_notif']) ?></span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endforeach ?>
                                    <li><a href="consultation/notifications.php">Voir toutes les notifications</a></li>
                                </ul>
                            </li>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="assets/images/user.png" class="img-radius" alt="User-Profile-Image">
                                    <span><?= $user['username_user'] ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="profil.php">
                                            <i class="ti-user"></i> Mon Profil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="auth/logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Déconnexion
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <nav class="pcoded-navbar">
            <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
            <div class="pcoded-inner-navbar main-menu">
                <div class="">
                    <div class="main-menu-header">
                        <img class="img-40 img-radius" src="assets/images/user.png" alt="User-Profile-Image">
                        <div class="user-details">
                            <span><?= $user['username_user'] ?></span>
                            <span id="more-details"><?= $role_user['libelle_role'] ?> (<?= $role_user['abr_role'] ?>)<i class="ti-angle-down"></i></span>
                        </div>
                    </div>

                    <div class="main-menu-content">
                        <ul>
                            <li class="more-details">
                                <a href="profil.php"><i class="ti-user"></i>Mon Profil</a>
                                <a href="auth/logout.php"><i class="ti-layout-sidebar-left"></i>Déconnexion</a>
                            </li>
                        </ul>
                    </div>
                </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      