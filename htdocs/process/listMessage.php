<?php
require_once '../config/connexion.php';

$prepareRequest = $connexion->prepare("SELECT User.pseudo, MessageUser.message, MessageUser.dateHour FROM `MessageUser` LEFT JOIN User ON MessageUser.idUser = User.id ORDER BY `MessageUser`.`dateHour` ASC;");
$prepareRequest->execute();
$data = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);

