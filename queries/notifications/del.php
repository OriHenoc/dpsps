<?php

session_start();
require_once '../../config/connexion.php';
if (isset($_SESSION['id_user']) && $_SESSION['id_user']!=''):
    $id=$_SESSION['id_user'];

$req=$bdd->prepare("DELETE * FROM notifications WHERE cible_notif='$id'");        
$req->execute();

header('location: ../../notifications.php');
endif;