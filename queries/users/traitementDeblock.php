<?php

require_once("../../config/connexion.php");

if(isset($_POST["id_user"])){
    $req = $bdd->query("SELECT * FROM users WHERE id_user = '".$_POST["id_user"]."' LIMIT 1");
    $result = $req->fetchAll();

    foreach($result as $row){
        $data = '
        
        <input type="hidden" name="id_us" value="'.$row['id_user'].'"/>
        <h6 class="text-center">
            Etes-vous sûr de vouloir déverrouiller le compte de l\'utilisateur : <br><span class="text-primary font-weight-bold">'.$row["username_user"].' ( '.$row["fullname_user"].' )</span> ?
        </h6>
        ';
    }
    echo $data;
}

?> 