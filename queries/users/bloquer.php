<?php

require_once("../../config/connexion.php");

if(isset($_POST['bloquer_user'])){
    $id = $_POST['id_us'];

    $req=$bdd->prepare("UPDATE users SET statut_user=0 WHERE id_user='$id'");        
    $req->execute();
}

header("location: ../../utilisateurs.php");
    

?>