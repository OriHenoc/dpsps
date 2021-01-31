<?php

require_once '../../config/connexion.php';

if(isset($_POST['ajout_activite'])){
    if(isset($_POST['libelle_activite'])){
        $libelle_activite = $_POST['libelle_activite'];
    }
    
    if(isset($_POST['dossier_activite'])){
        $dossier_activite = $_POST['dossier_activite'];
    }

    $req=$bdd->prepare("INSERT INTO activites(libelle_activite, dossier_activite) VALUES (:A, :B)");
    
    $req->execute(array(
        'A'=>$libelle_activite, 
        'B'=>$dossier_activite
    ));

    header('location: ../../activites.php');
}