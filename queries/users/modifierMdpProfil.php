<?php
require_once("../../config/connexion.php");

if(isset($_POST["modifier_mdp"])){

    $id=($_POST['user']);

    $oldPassword=($_POST['oldPassword']);
    $newPassword=($_POST['newPassword']);
    $newPassword2=($_POST['newPassword2']);

    $pass1 = hash('sha512', $oldPassword);
    $pass2 = hash('sha512', $newPassword);
    
    if($newPassword2 === $newPassword){

        $recherche_mdp=$bdd->prepare("SELECT * FROM users WHERE mdp_user=:mdp AND id_user=:id"); 
        $recherche_mdp->execute(array('mdp' => $pass1, 'id' => $id));
        $mdp=$recherche_mdp->fetch();

        if($mdp){
            $req=$bdd->prepare("UPDATE users SET mdp_user=:A WHERE id_user=:id");
            $req->execute(array('A' => $pass2, 'id' => $id));
        }
    }
}
header("location: ../../profil.php");

?>