<?php

include 'config/connexion.php';

$request = 0;

if(isset($_POST['request'])){
   $request = $_POST['request'];
}

// Fetch liste des services par id sd
if($request == 1){
   $sdid = $_POST['sdid'];

   $stmt = $bdd->prepare("SELECT * FROM services WHERE sd_id=:sd_id ORDER BY libelle_service");
   $stmt->bindValue(':sd_id', (int)$sdid, PDO::PARAM_INT);

   $stmt->execute();
   $servicesList = $stmt->fetchAll();

   $response = array();
   foreach($servicesList as $service){
      $response[] = array(
        "id_service" => $service['id_service'],
        "libelle_service" => $service['libelle_service']
      );
   }
   header('Content-type: application/json');
   echo json_encode($response);
   exit;
}

// liste des agents par id service
if($request == 2){
   $servid = $_POST['servid'];

   $stmt = $bdd->prepare("SELECT * FROM users INNER JOIN users_roles ON users_roles.user_id=users.id_user  WHERE users_roles.role_id=5 AND service_id=:service_id ORDER BY fullname_user");
   $stmt->bindValue(':service_id', (int)$servid, PDO::PARAM_INT);

   $stmt->execute();
   $agentsList = $stmt->fetchAll();

   $response = array();
   foreach($agentsList as $agent){
      $response[] = array(
         "id_user" => $agent['id_user'],
         "fullname_user" => $agent['fullname_user']
      );
   }
   header('Content-type: application/json');
   echo json_encode($response);
   exit;
}