<?php

require_once("../../config/connexion.php");

    if(isset($_POST['modifier_activite'])){
        $id = $_POST['id_act'];

         $req_actv = $bdd->query("SELECT * FROM activites WHERE id_activite = '$id'");
         $actv = $req_actv->fetch();

         $statut_act_ce_actuel = $actv['statut_activite_ce'];
         $statut_act_cs_actuel = $actv['statut_activite_cs'];
         $statut_act_sd_actuel = $actv['statut_activite_sd'];

         if(isset($_POST['mod_libelle_activite'])){
            $libelle_activite = $_POST['mod_libelle_activite'];
         }
         if(isset($_POST['statut_activite_ce'])){
            $statut_activite_ce = $_POST['statut_activite_ce'];
         }
         if(isset($_POST['statut_activite_cs'])){
            $statut_activite_cs = $_POST['statut_activite_cs'];
         }
         if(isset($_POST['statut_activite_sd'])){
            $statut_activite_sd = $_POST['statut_activite_sd'];
         }

         //

         if(!isset($_POST['statut_activite_ce'])){
            $statut_activite_ce = $statut_act_ce_actuel;
         }
         if(!isset($_POST['statut_activite_cs'])){
            $statut_activite_cs = $statut_act_cs_actuel;
         }
         if(!isset($_POST['statut_activite_sd'])){
            $statut_activite_sd = $statut_act_sd_actuel;
         }

         if($statut_activite_sd==5){
            $date_fin_activite = date('Y-m-d H:i:s', time());

            $req=$bdd->prepare("UPDATE activites SET libelle_activite=:a, statut_activite_ce=:b, statut_activite_cs=:c, statut_activite_sd=:d, date_fin_activite=:e WHERE id_activite=:f");
        
            $req->execute(array(
                  'a'=>$libelle_activite,
                  'b'=>$statut_activite_ce,
                  'c'=>$statut_activite_cs,
                  'd'=>$statut_activite_sd,
                  'e'=>$date_fin_activite,
                  'f'=>$id
            ));
         }
         else{
            $req=$bdd->prepare("UPDATE activites SET libelle_activite=:a, statut_activite_ce=:b, statut_activite_cs=:c, statut_activite_sd=:d WHERE id_activite=:e");
        
            $req->execute(array(
                  'a'=>$libelle_activite,
                  'b'=>$statut_activite_ce,
                  'c'=>$statut_activite_cs,
                  'd'=>$statut_activite_sd,
                  'e'=>$id
            ));
         }

         $dos = $actv["dossier_activite"];
         $req_dossier = $bdd->query("SELECT * FROM dossiers INNER JOIN activites ON dossiers.id_dos=activites.dossier_activite WHERE dossiers.id_dos=$dos");
         $leDosX = $req_dossier->fetch();
         $leDos = $leDosX['id_dos'];

          //nbre d'activites du dossier
          $recherche_activites_dossier = $bdd->query("SELECT * FROM activites INNER JOIN dossiers ON dossiers.id_dos=activites.dossier_activite WHERE dossiers.id_dos='$leDos' AND activites.deleted=0");
          $activites_dossier = $recherche_activites_dossier->fetchAll();
          $ActivitesDossier =$recherche_activites_dossier->rowCount();

          //nbre d'activites terminees du dossier
          $recherche_activites_dossier_termines = $bdd->query("SELECT * FROM activites INNER JOIN dossiers ON dossiers.id_dos=activites.dossier_activite WHERE dossiers.id_dos='$leDos' AND activites.deleted=0 AND date_fin_activite IS NOT NULL");
          $activites_dossier_termines = $recherche_activites_dossier_termines->fetchAll();
         $ActivitesDossierTermines =$recherche_activites_dossier_termines->rowCount();

          //mettre le dossier en cours si au moins une activite non terminee
          if($ActivitesDossierTermines<$ActivitesDossier):
              $req_fin_dossier=$bdd->prepare("UPDATE dossiers SET statut_dos=2 WHERE dossiers.id_dos='$leDos'");        
              $req_fin_dossier->execute();
          endif;

          //finaliser le dossier si toutes les activites sont terminees
          if($ActivitesDossierTermines===$ActivitesDossier):

            
              //derniere activite terminée :
              $recherche_last_activite_dossier_termine = $bdd->query("SELECT * FROM activites INNER JOIN dossiers ON dossiers.id_dos=activites.dossier_activite WHERE dossiers.id_dos='$leDos' AND activites.deleted=0 AND activites.date_fin_activite IS NOT NULL ORDER BY activites.date_fin_activite desc LIMIT 1");
              $last_activite_dossier_termine = $recherche_last_activite_dossier_termine->fetch();

              $date_fin_reelle_dos = $last_activite_dossier_termine['date_fin_activite'];
              $req_fin_dossier=$bdd->prepare("UPDATE dossiers SET statut_dos=3, date_fin_reelle_dos='$date_fin_reelle_dos' WHERE dossiers.id_dos='$leDos'");        
              $req_fin_dossier->execute();
          endif;

        
}
header("Location: ../../activites.php");
    

?>