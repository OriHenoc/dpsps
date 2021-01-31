<?php
    require_once("../../config/connexion.php");

if(isset($_POST["modifier_info"])){

    $user=($_POST['user']);
    $username=($_POST['username']);
    $fullname=($_POST['fullname']);
    $telephone=($_POST['telephone']);
    $email=($_POST['email']);

    $req=$bdd->prepare("UPDATE users SET username_user=:A, fullname_user=:B, email_user=:C, telephone_user=:D WHERE id_user=:E");
    $req->execute(array('A' => $username, 'B' => $fullname, 'C' => $email, 'D' => $telephone, 'E' => $user)); 

}
header("location: ../../profil.php");

?>