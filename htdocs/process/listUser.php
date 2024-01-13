<?php
require_once '../config/connexion.php';

$prepareRequest = $connexion->prepare("SELECT * FROM `User` ORDER BY `User`.`id` ASC");
$prepareRequest->execute();
$data = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);



?>