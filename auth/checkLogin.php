<?php
    session_start();
    require_once '../config/connexion.php';

    $username=($_POST['username']);
    $mdp=($_POST['password']);

    $pass = hash('sha512', $mdp);
    
    $recherche_users=$bdd->prepare("SELECT * FROM users WHERE username_user=:username AND mdp_user=:mdp"); 
    $recherche_users->execute(array('username' => $username, 'mdp' => $pass));
    $user=$recherche_users->fetch();
    $id = $user['id_user'];

    if($id){
        if($user['statut_user']==='0') { 
            echo 'erreur_valide'; 
        }
        else{
            $online = "UPDATE users SET online=true WHERE id_user=?";
                $bdd->prepare($online)->execute([$id]);

                $_SESSION['id_user']=$id;
                echo 'connect';
        }
    }
    else{
        echo 'erreur_param';
    }