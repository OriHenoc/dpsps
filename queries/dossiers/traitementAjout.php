<?php

require_once '../../config/connexion.php';

    if(isset($_POST['ajout_dossier'])){
        if(isset($_POST['instructDGPE_dos'])){
            $instructDGPE_dos = $_POST['instructDGPE_dos'];
         }
         if(isset($_POST['expediteur_dos'])){
            $expediteur_dos = $_POST['expediteur_dos'];
         }
         if(isset($_POST['ref_dos'])){
            $ref_dos = $_POST['ref_dos'];
         }
         if(isset($_POST['objet_dos'])){
            $objet_dos = $_POST['objet_dos'];
         }
         if(isset($_POST['date_dos'])){
            $date_dos = $_POST['date_dos'];
         }
         if(isset($_POST['date_recep_dos'])){
            $date_recep_dos = $_POST['date_recep_dos'];
         }
         if(isset($_POST['imputation_sd_dos'])){
            $imputation_sd_dos = $_POST['imputation_sd_dos'];
         }
         if(isset($_POST['imputation_service_dos'])){
            $imputation_service_dos = $_POST['imputation_service_dos'];
         }
         if(isset($_POST['imputation_agent_dos'])){
            $imputation_agent_dos = $_POST['imputation_agent_dos'];
         }
         if(isset($_POST['imputation_autres'])){
            $imputation_autres = $_POST['imputation_autres'];
         }
         if(isset($_POST['instructions'])){
            $instructions = $_POST['instructions'];
            $instructions = implode(" , ", $instructions);
         }
         if(isset($_POST['date_debut_dos'])){
            $date_debut_dos = $_POST['date_debut_dos'];
         }
         if(isset($_POST['date_fin_prevue_dos'])){
            $date_fin_prevue_dos = $_POST['date_fin_prevue_dos'];
         }
         if(isset($_POST['observations_dos'])){
            $observations_dos = $_POST['observations_dos'];
         }
         if(isset($_POST['user'])){
            $user = $_POST['user'];
         }


         //

         if(!isset($_POST['instructDGPE_dos'])){
            $instructDGPE_dos = '';
         }
         if(!isset($_POST['expediteur_dos'])){
            $expediteur_dos = '';
         }
         if(!isset($_POST['ref_dos'])){
            $ref_dos = '';
         }
         if(!isset($_POST['date_dos'])){
            $date_dos = '';
         }
         if(!isset($_POST['date_recep_dos'])){
            $date_recep_dos = '';
         }
         if(!isset($_POST['imputation_sd_dos'])){
            $imputation_sd_dos = '';
         }
         if(!isset($_POST['imputation_service_dos'])){
            $imputation_service_dos = '';
         }
         if(!isset($_POST['imputation_agent_dos'])){
            $imputation_agent_dos = '';
         }
         if(!isset($_POST['imputation_autres'])){
            $imputation_autres = '';
         }
         if(!isset($_POST['instructions'])){
            $instructions = '';
         }
         if(!isset($_POST['date_debut_dos'])){
            $date_debut_dos = '';
         }
         if(!isset($_POST['date_fin_prevue_dos'])){
            $date_fin_prevue_dos = '';
         }
         if(!isset($_POST['observations_dos'])){
            $observations_dos = '';
         }

        $req=$bdd->prepare("INSERT INTO dossiers(instructDGPE_dos, expediteur_dos, ref_dos, objet_dos, date_dos, date_recep_dos, imputation_sd_dos, imputation_service_dos, imputation_agent_dos, imputation_autres, instructions_dos, date_debut_dos, date_fin_prevue_dos, observations_dos, made_by) VALUES (:A, :B, :C, :D, :E, :F, :G, :H, :I, :J, :K, :L, :M, :N, :O)");
        
        $req->execute(array(
            'A'=>$instructDGPE_dos, 
            'B'=>$expediteur_dos, 
            'C'=>$ref_dos, 
            'D'=>$objet_dos, 
            'E'=>$date_dos, 
            'F'=>$date_recep_dos, 
            'G'=>$imputation_sd_dos, 
            'H'=>$imputation_service_dos, 
            'I'=>$imputation_agent_dos, 
            'J'=>$imputation_autres,
            'K'=>$instructions,
            'L'=>$date_debut_dos,
            'M'=>$date_fin_prevue_dos,
            'N'=>$observations_dos,
            'O'=>$user
        ));
        
         $recherche_new_dossier=$bdd->prepare("SELECT * FROM dossiers WHERE ref_dos=:ref_dos AND objet_dos=:objet_dos"); 
         $recherche_new_dossier->execute(array('ref_dos' => $ref_dos, 'objet_dos' => $objet_dos));
         $newdossier=$recherche_new_dossier->fetch();
         $doss = $newdossier['id_dos'];

         $recherche_madeby = $bdd->query("SELECT * FROM users WHERE id_user='$user'");
         $madeby = $recherche_madeby->fetch();
         $initiateur = $madeby['fullname_user'];

         $libelle_notif = 'Nouveau Dossier';
         $description_notif = 'Le nouveau dossier <a href="dossiers.php">'.$ref_dos.'</a> créé par '.$initiateur.' vous concerne.';

         //si imputé à une sd uniquement alors envoi notif au sd
         if($imputation_sd_dos!=='' && $imputation_service_dos=='' && $imputation_agent_dos==''){
            //cherche le sd de la sdirection imputée
            $recherche_sdConcerne1 = $bdd->query("SELECT * FROM users INNER JOIN sous_directeurs ON sous_directeurs.sous_directeur=users.id_user WHERE sous_directeurs.sous_direction='$imputation_sd_dos'");
            $sdConcerne1 = $recherche_sdConcerne1->fetch();
            $sd1 = $sdConcerne1['id_user'];

            //envoi notif au sd
            $req_notif_sd1=$bdd->prepare("INSERT INTO notifications(libelle_notif, description_notif, dossier_notif, cible_notif) VALUES (?, ?, ?, ?)");
            $req_notif_sd1->execute(array($libelle_notif, $description_notif, $doss, $sd1));
         }

         //si imputé à un service mais pas imputé à un agent alors envoi notif au sd et au cs
         if($imputation_service_dos!=='' && $imputation_agent_dos==''){
            //cherche le chef de service du service imputé
            $recherche_csConcerne = $bdd->query("SELECT * FROM chefs_de_services WHERE service_cds='$imputation_service_dos'");
            $csConcerne = $recherche_csConcerne->fetch();
            $cs = $csConcerne['chef_cds'];

            //envoi notif au cs
            $req_notif_cs=$bdd->prepare("INSERT INTO notifications(libelle_notif, description_notif, dossier_notif, cible_notif) VALUES (?, ?, ?, ?)");
            $req_notif_cs->execute(array($libelle_notif, $description_notif, $doss, $cs));

            //cherche le sd du service imputé
            $recherche_sdConcerne2 = $bdd->query("SELECT * FROM users INNER JOIN users_roles ON users_roles.user_id=users.id_user WHERE users_roles.role_id=3 AND users.service_id='$imputation_service_dos'");
            $sdConcerne2 = $recherche_sdConcerne2->fetch();
            $sd2 = $sdConcerne2['id_user'];
            
            //envoi notif au sd
            $req_notif_sd2=$bdd->prepare("INSERT INTO notifications(libelle_notif, description_notif, dossier_notif, cible_notif) VALUES (?, ?, ?, ?)");
            $req_notif_sd2->execute(array($libelle_notif, $description_notif, $doss, $sd2));
         }
        
         //si imputé à agent alors envoi notif au sd, au cs et a agent
         if($imputation_agent_dos!==''){
            //cherche le ce imputé
            $recherche_ceConcerne = $bdd->query("SELECT * FROM users WHERE id_user='$imputation_agent_dos'");
            $ceConcerne = $recherche_ceConcerne->fetch();
            $ce = $ceConcerne['id_user'];

            //envoi notif au ce
            $req_notif_ce=$bdd->prepare("INSERT INTO notifications(libelle_notif, description_notif, dossier_notif, cible_notif) VALUES (?, ?, ?, ?)");
            $req_notif_ce->execute(array($libelle_notif, $description_notif, $doss, $ce));

            //cherche le cs du ce imputé
               
               //cherche le service du ce
               $recherche_servCE = $bdd->query("SELECT * FROM services INNER JOIN users ON users.service_id=services.id_service WHERE id_user='$ce'");
               $servCE = $recherche_servCE->fetch();
               $svCE = $servCE['id_service'];

               //cherche le cs
               $recherche_csConcerne2 = $bdd->query("SELECT * FROM chefs_de_services WHERE service_cds='$svCE'");
               $csConcerne2 = $recherche_csConcerne2->fetch();
               $cs2 = $csConcerne2['chef_cds'];

            //envoi de notif au cs
            $req_notif_cs2=$bdd->prepare("INSERT INTO notifications(libelle_notif, description_notif, dossier_notif, cible_notif) VALUES (?, ?, ?, ?)");
            $req_notif_cs2->execute(array($libelle_notif, $description_notif, $doss, $cs2));

            //cherche le sd du ce imputé = sd qui est du meme service que le service du ce
            $recherche_sdConcerne3 = $bdd->query("SELECT * FROM users INNER JOIN sous_directeurs ON sous_directeurs.sous_directeur=users.id_user WHERE users.service_id='$svCE'");
            $sdConcerne3 = $recherche_sdConcerne3->fetch();
            $sd3 = $sdConcerne3['id_user'];

            //envoi notif au sd
            $req_notif_sd3=$bdd->prepare("INSERT INTO notifications(libelle_notif, description_notif, dossier_notif, cible_notif) VALUES (?, ?, ?, ?)");
            $req_notif_sd3->execute(array($libelle_notif, $description_notif, $doss, $sd3));

         }


        header('location: ../../dossiers.php');
    }