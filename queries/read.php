<?php

//Tous le personnel

$recherche_personnel = $bdd->query("SELECT * FROM users INNER JOIN users_roles ON users.id_user=users_roles.user_id INNER JOIN roles ON roles.id_role=users_roles.role_id LEFT JOIN services ON users.service_id=services.id_service");
$personnel = $recherche_personnel->fetchAll();

//Infos Utilisateur Connecté

$recherche_user = $bdd->query("SELECT * FROM users WHERE id_user='$id'");
$user = $recherche_user->fetch();

//Rôle Utilisateur Connecté
$recherche_role_user = $bdd->query("SELECT * FROM users_roles INNER JOIN users ON users.id_user=users_roles.user_id INNER JOIN roles ON roles.id_role=users_roles.role_id WHERE user_id='$id'");
$role_user = $recherche_role_user->fetch();
$role = $role_user['abr_role'];

//Infos Application
$req_infos_app = $bdd->query("SELECT * FROM application");
$infos_app = $req_infos_app->fetch();

//Tous les dossiers
$recherche_dossiers = $bdd->query("SELECT * FROM dossiers WHERE deleted=0 ORDER BY id_dos desc");

//Tous les dossiers que je peux voir si je ne suis ni directeur ni superadmin
$recherche_dossiersConcernes = $bdd->query("SELECT * FROM notifications INNER JOIN dossiers ON dossiers.id_dos=notifications.dossier_notif WHERE deleted=0 AND cible_notif='$id' ORDER BY id_dos desc");

if($role==='DR' || $role==='SA'):
    $dossiers = $recherche_dossiers->fetchAll();
endif;

if($role!=='DR' && $role!=='SA'):
    $dossiers = $recherche_dossiersConcernes->fetchAll();
endif;
$totalDossiers =$recherche_dossiers->rowCount();

//Tous les dossiers en cours
$recherche_dossiers_encours = $bdd->query("SELECT * FROM dossiers INNER JOIN statut_dossier ON statut_dossier.id_statut_dos=dossiers.statut_dos WHERE deleted=0 AND dossiers.statut_dos=2");
$dossiers_encours = $recherche_dossiers_encours->fetchAll();
$totalDossiersEnCours =$recherche_dossiers_encours->rowCount();

//Tous les dossiers terminés
$recherche_dossiers_finalises = $bdd->query("SELECT * FROM dossiers INNER JOIN statut_dossier ON statut_dossier.id_statut_dos=dossiers.statut_dos WHERE deleted=0 AND dossiers.statut_dos=3");
$dossiers_finalises = $recherche_dossiers_finalises->fetchAll();
$totalDossiersFinalises =$recherche_dossiers_finalises->rowCount();

//DOSSIER DELAI PROCHE
$recherche_dossier_fin_proche = $bdd->query("SELECT * FROM dossiers WHERE deleted=0 ORDER BY ABS( DATEDIFF( date_fin_prevue_dos, NOW() ) ) LIMIT 1");
$dossier_fin_proche = $recherche_dossier_fin_proche->fetch();

//JOURS AVANT ARRIVE DELAI DOSSIER PROCHE

$now = time();
$datefindos = $dossier_fin_proche['date_fin_prevue_dos'];
$datefindos = strtotime($datefindos);
$delaidos = $datefindos - $now;

$delaiJoursDosProche = round($delaidos / (60 * 60 * 24));


//Toutes les activites
$recherche_activites = $bdd->query("SELECT * FROM activites WHERE deleted=0 ORDER BY id_activite desc");
$activites = $recherche_activites->fetchAll();


//Toutes les activités que je peux voir si je ne suis ni directeur ni superadmin
$recherche_activitesConcernes = $bdd->query("SELECT * FROM activites INNER JOIN dossiers ON dossiers.id_dos=activites.dossier_activite INNER JOIN services ON services.id_service=dossiers.imputation_service_dos INNER JOIN users ON users.service_id=services.id_service WHERE users.id_user='$id'");

if($role==='DR' || $role==='SA'):
    $activites = $recherche_activites->fetchAll();
endif;

if($role!=='DR' && $role!=='SA'):
    $activites = $recherche_activitesConcernes->fetchAll();
endif;
$totalActivites =$recherche_activites->rowCount();

//Toutes les activites en cours
$recherche_activites_encours = $bdd->query("SELECT * FROM activites WHERE deleted=0 AND date_fin_activite IS NULL");
$activites_encours = $recherche_activites_encours->fetchAll();
$totalActivitesEnCours =$recherche_activites_encours->rowCount();

//Toutes les sousdirections
$recherche_sousdirections = $bdd->query("SELECT * FROM sousdirections");
$sousdirections = $recherche_sousdirections->fetchAll();

//Tous les services et leurs sous directions
$recherche_services = $bdd->query("SELECT * FROM services INNER JOIN sousdirections ON sousdirections.id_sd=services.sd_id");
$services = $recherche_services->fetchAll();

//Tous les rôles
$recherche_roles = $bdd->query("SELECT * FROM roles");
$roles = $recherche_roles->fetchAll();

//Toutes les notifs de l'utilisateur connecté
$recherche_notifications = $bdd->query("SELECT * FROM notifications INNER JOIN users ON users.id_user=notifications.cible_notif WHERE cible_notif='$id' ORDER BY date_notif DESC");
$notifications = $recherche_notifications->fetchAll();
$nbre_notifications = $recherche_notifications->rowCount();

//notifs lues par l'utilisateur connecté
$recherche_notifications_lues = $bdd->query("SELECT * FROM notifications INNER JOIN users ON users.id_user=notifications.cible_notif WHERE cible_notif='$id' and statut_notif='1' ORDER BY date_notif DESC");
$notifications_lues = $recherche_notifications_lues->fetchAll();
$nbre_notifications_lues = $recherche_notifications_lues->rowCount();

//Notifications non lues par l'utilisateur connecté
$recherche_notifications_non_lues = $bdd->query("SELECT * FROM notifications INNER JOIN users ON users.id_user=notifications.cible_notif WHERE cible_notif='$id' and statut_notif='0' ORDER BY date_notif DESC");
$notifications_non_lues = $recherche_notifications_non_lues->fetchAll();
$nbre_notifications_non_lues = $recherche_notifications_non_lues->rowCount();

//Tous les statut activite pour CE
$recherche_statut_activite_ce = $bdd->query("SELECT * FROM statut_activite_ce");
$statut_activite_ce = $recherche_statut_activite_ce->fetchAll();

//Tous les statut activite pour CS
$recherche_statut_activite_cs = $bdd->query("SELECT * FROM statut_activite_cs");
$statut_activite_cs = $recherche_statut_activite_cs->fetchAll();

//Tous les statut activite pour SD
$recherche_statut_activite_sd = $bdd->query("SELECT * FROM statut_activite_sd");
$statut_activite_sd = $recherche_statut_activite_sd->fetchAll();
