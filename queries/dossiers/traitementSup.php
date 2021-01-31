<?php

require_once("../../config/connexion.php");

if(isset($_POST["id_dossup"])){
    $req = $bdd->query("SELECT * FROM dossiers WHERE id_dos = '".$_POST["id_dossup"]."' LIMIT 1");
    $result = $req->fetchAll();

    foreach($result as $row){
        $data = '
        
        <input type="hidden" name="id_dos" value="'.$row['id_dos'].'"/>
        <h6 class="text-center">
            Etes-vous sûr de vouloir supprimer le dossier <span class="text-danger font-weight-bold">'.$row["ref_dos"].'</span> ?
        </h6>
        ';
    }
    echo $data;
}

?> 