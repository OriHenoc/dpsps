<?php

require_once("../../config/connexion.php");

if(isset($_POST["id_actsup"])){
    $req = $bdd->query("SELECT * FROM activites WHERE id_activite = '".$_POST["id_actsup"]."' LIMIT 1");
    $result = $req->fetchAll();

    foreach($result as $row){
        $data = '
        
        <input type="hidden" name="id_act" value="'.$row['id_activite'].'"/>
        <h6 class="text-center">
            Etes-vous sûr de vouloir supprimer l\'activité <br><span class="text-danger font-weight-bold">'.$row["libelle_activite"].'</span> ?
        </h6>
        ';
    }
    echo $data;
}

?> 