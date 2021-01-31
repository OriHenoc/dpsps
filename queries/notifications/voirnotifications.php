<?php
session_start();
require_once '../../config/connexion.php';
if (isset($_SESSION['id_user']) && $_SESSION['id_user']!=''):
    $id=$_SESSION['id_user'];

    //Marquer toutes les notifications lues
    $lues = "UPDATE notifications SET statut_notif='1' WHERE cible_notif=?";
    $bdd->prepare($lues)->execute([$id]);

    header('location: ../../notifications.php');
endif;