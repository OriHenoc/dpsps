<?php

require_once("../../config/connexion.php");

if(isset($_POST['supprimer_dossier'])){
    $id = $_POST['id_dos'];

    $req=$bdd->prepare("UPDATE dossiers SET deleted=1 WHERE id_dos='$id'");        
    $req->execute();
}

header("location: ../../dossiers.php");
    

?>