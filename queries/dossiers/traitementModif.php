<?php

require_once("../../config/connexion.php");

if(isset($_POST["id_dossier"])){
    $req = $bdd->query("SELECT * FROM dossiers WHERE id_dos = '".$_POST["id_dossier"]."' LIMIT 1");
    $result = $req->fetchAll();

    foreach($result as $row){
        $data = '
        
        <input type="hidden" name="id_dos" value="'.$row['id_dos'].'"/>
        <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label class="col-sm-4 col-form-label">INSTRUCTIONS DU DGPE :</label>
                    <input type="text" class="form-control form-control-round" id="mod_instructDGPE_dos" name="mod_instructDGPE_dos" value="'.$row['instructDGPE_dos'].'">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">INFORMATIONS DU COURRIER</h5>                                                      
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>EXPEDITEUR</label>
                    <input type="text" class="form-control form-control-round" id="mod_expediteur_dos" name="mod_expediteur_dos" value="'.$row['expediteur_dos'].'">
                </div>
                <div class="col-md-6 text-center">
                    <label>REFERENCE (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control form-control-round" value="'.$row['ref_dos'].'" readonly required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-12 text-center">
                    <label>OBJET (<span class="text-danger">*</span>)</label>
                    <input type="text" class="form-control form-control-round" id="mod_objet_dos" name="mod_objet_dos" value="'.$row['objet_dos'].'" required>
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">DELAI</h5> 
            <div class="form-group row">
                <div class="col-md-6 text-center">
                    <label>DATE DE DEBUT</label>
                    <input type="text" class="form-control form-control-round" value="'.$row['date_debut_dos'].'" readonly>
                </div>
                <div class="col-md-6 text-center">
                    <label>DATE DE FIN</label>
                    <input type="text" class="form-control form-control-round" id="mod_date_fin_prevue_dos" name="mod_date_fin_prevue_dos" value="'.$row['date_fin_prevue_dos'].'">
                </div>
            </div>
            <h5 class="bg-info text-dark p-1">OBSERVATIONS</h5> 
            <div class="form-group row">
                <div class="col-sm-12">
                    <textarea rows="5" cols="5" id="mod_observations_dos" name="mod_observations_dos" class="form-control">'.$row['observations_dos'].'</textarea>
                </div>
            </div>
        ';
    }
    echo $data;
}

?> 