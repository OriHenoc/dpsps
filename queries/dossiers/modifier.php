<?php

require_once("../../config/connexion.php");

    if(isset($_POST['modifier_dossier'])){
        $id = $_POST['id_dos'];

        if(isset($_POST['mod_instructDGPE_dos'])){
            $instructDGPE_dos = $_POST['mod_instructDGPE_dos'];
         }
         if(isset($_POST['mod_expediteur_dos'])){
            $expediteur_dos = $_POST['mod_expediteur_dos'];
         }
         if(isset($_POST['mod_objet_dos'])){
            $objet_dos = $_POST['mod_objet_dos'];
         }
         if(isset($_POST['mod_date_fin_prevue_dos'])){
            $date_fin_prevue_dos = $_POST['mod_date_fin_prevue_dos'];
         }
         if(isset($_POST['mod_observations_dos'])){
            $observations_dos = $_POST['mod_observations_dos'];
         }
         if(isset($_POST['user'])){
            $user = $_POST['user'];
         }
         //

         if(!isset($_POST['mod_instructDGPE_dos'])){
            $instructDGPE_dos = '';
         }
         if(!isset($_POST['mod_expediteur_dos'])){
            $expediteur_dos = '';
         }
         if(!isset($_POST['mod_date_fin_prevue_dos'])){
            $date_fin_prevue_dos = '';
         }
         if(!isset($_POST['mod_observations_dos'])){
            $observations_dos = '';
         }

        $req=$bdd->prepare("UPDATE dossiers SET instructDGPE_dos=:a, expediteur_dos=:b, date_fin_prevue_dos=:c, observations_dos=:d, made_by=:e WHERE id_dos=:f");
        
        $req->execute(array(
            'a'=>$instructDGPE_dos,
            'b'=>$expediteur_dos,
            'c'=>$date_fin_prevue_dos,
            'd'=>$observations_dos,
            'e'=>$user,
            'f'=>$id
        ));
}
header("Location: ../../dossiers.php");
    

?>