<?php

// // EN LIGNE
// try {
//     $user = 'committe_admin';
//     $pass = 'committe_password';
//     $bdd = new PDO('mysql:host=67.211.221.178;dbname=committe_dpsps', $user, $pass);
//  } catch (PDOException $e) {
//     print "Erreur : " . $e->getMessage() . "<br/>";
//     die();
//  }
 
// EN LOCAL
try {
    $user = 'root';
    $pass = '';
    $bdd = new PDO('mysql:host=localhost:3308;dbname=dpsps', $user, $pass);
} catch (PDOException $e) {
    print "Erreur : " . $e->getMessage() . "<br/>";
    die();
}