<?php

require_once("../../config/connexion.php");

if(isset($_POST['supprimer_activite'])){
    $id = $_POST['id_act'];

    $req=$bdd->prepare("UPDATE activites SET deleted=1 WHERE id_activite='$id'");        
    $req->execute();
}

header("location: ../../activites.php");
    

?>