<?php

session_start();
require_once '../config/connexion.php';

$offline = "UPDATE users SET online='0' WHERE id_user=?";
$bdd->prepare($offline)->execute([$_SESSION["id_user"]]);

if($offline){
    if(isset($_SESSION["id_user"])){
        unset($_SESSION["id_user"]);
    }
    
    if(isset($_SESSION["username_user"])){
        unset($_SESSION["username_user"]);
    }
}

session_destroy();
header("Location: ../");   