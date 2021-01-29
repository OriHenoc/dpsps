<?php

//Infos Utilisateur Connecté
$id=1;
$recherche_user = $bdd->query("SELECT * FROM users WHERE id_user='$id'");
$user = $recherche_user->fetch();

//Rôle Utilisateur Connecté
$recherche_role_user = $bdd->query("SELECT * FROM users_roles INNER JOIN users ON users.id_user=users_roles.user_id INNER JOIN roles ON roles.id_role=users_roles.role_id WHERE user_id='$id'");
$role_user = $recherche_role_user->fetch();

//Infos Application
$req_infos_app = $bdd->query("SELECT * FROM application");
$infos_app = $req_infos_app->fetch();

//Notifications non lues par l'utilisateur connecté
$recherche_notifications_non_lues = $bdd->query("SELECT * FROM notifications INNER JOIN users ON users.id_user=notifications.cible_notif WHERE cible_notif='$id' and statut_notif='0' ORDER BY date_notif DESC");
$notifications_non_lues = $recherche_notifications_non_lues->fetchAll();
$nbre_notifications_non_lues = $recherche_notifications_non_lues->rowCount();

//Tous les dossiers
$recherche_dossiers = $bdd->query("SELECT * FROM dossiers");
$dossiers = $recherche_dossiers->fetchAll();
