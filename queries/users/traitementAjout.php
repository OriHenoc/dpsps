<?php

require_once '../../config/connexion.php';

    if(isset($_POST['ajout_user'])){
        if(isset($_POST['fullname_user'])){
            $fullname_user = $_POST['fullname_user'];
         }
         if(isset($_POST['email_user'])){
            $email_user = $_POST['email_user'];
         }
         if(isset($_POST['telephone_user'])){
            $telephone_user = $_POST['telephone_user'];
         }
         if(isset($_POST['service_id'])){
            $service_id = $_POST['service_id'];
         }
         if(isset($_POST['role'])){
            $role = $_POST['role'];
         }
         if(isset($_POST['username_user'])){
            $username_user = htmlspecialchars($_POST['username_user']);
         }
         if(isset($_POST['mdp_user'])){
            $mdp_user = htmlspecialchars($_POST['mdp_user']);
            $pass = hash('sha512', $mdp_user);
         }
         if(isset($_POST['mdp2_user'])){
            $mdp2_user = htmlspecialchars($_POST['mdp2_user']);
            $pass2 = hash('sha512', $mdp2_user);
         }

         //

         if(!isset($_POST['service_id'])){
            $service_id = '';
         }
         
         if (filter_var($email_user, FILTER_VALIDATE_EMAIL)){

            $reqemail = $bdd->prepare ("SELECT * FROM users WHERE email_user = ?");
            $reqemail->execute(array($email_user));
            $emailexist = $reqemail->rowCount();

            if ($emailexist == 0){

               if($pass === $pass2){
                  $req_user=$bdd->prepare("INSERT INTO users(fullname_user, email_user, telephone_user, service_id, username_user, mdp_user) VALUES (?, ?, ?, ?, ?, ?)");
                  $req_user->execute(array($fullname_user, $email_user, $telephone_user, $service_id, $username_user, $pass));
                  
                  $recherche_new_user=$bdd->prepare("SELECT * FROM users WHERE username_user=:username AND mdp_user=:mdp"); 
                  $recherche_new_user->execute(array('username' => $username_user, 'mdp' => $pass));
                  $newuser=$recherche_new_user->fetch();
                  $id = $newuser['id_user'];

                  $req_role=$bdd->prepare("INSERT INTO users_roles(user_id, role_id) VALUES (?, ?)");
                  $req_role->execute(array($id, $role));

                  if($role==3){
                     $recherche_sousdirection = $bdd->query("SELECT * FROM services INNER JOIN sousdirections ON sousdirections.id_sd=services.sd_id WHERE id_service='$service_id'");
                     $sousdirection = $recherche_sousdirection->fetch();
                     $sdir = $sousdirection['id_sd'];

                     $req_role=$bdd->prepare("INSERT INTO sous_directeurs(sous_directeur, sous_direction) VALUES (?, ?)");
                     $req_role->execute(array($id, $sdir));
                  }

                  if($role==4){
                     $req_role=$bdd->prepare("INSERT INTO chefs_de_services(chef_cds, service_cds) VALUES (?, ?)");
                     $req_role->execute(array($id, $service_id));
                  }
               }

            }

         }
      }
      header('location: ../../utilisateurs.php');