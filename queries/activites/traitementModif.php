<?php

require_once("../../config/connexion.php");

if(isset($_POST["id_activite"])){
    $req = $bdd->query("SELECT * FROM activites WHERE id_activite = '".$_POST["id_activite"]."' LIMIT 1");
    $result = $req->fetchAll();

    foreach($result as $row){
        $data = '
        
        <input type="hidden" name="id_act" value="'.$row['id_activite'].'"/>
        <div class="form-group row">
            <div class="col-md-12 text-center">
                <label>DESCRIPTION DE L\'ACTIVITE (<span class="text-danger">*</span>)</label>
                <div class="col-sm-12">
                    <textarea rows="6" cols="6" id="mod_libelle_activite" name="mod_libelle_activite" class="form-control" required>'.$row['libelle_activite'].'</textarea>
                </div>
            </div>
        </div>
        ';
    }
    echo $data;
}

?> 