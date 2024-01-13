<?php
session_start();
require_once '../config/connexion.php';
$preparerequest = $connexion->prepare("SELECT * FROM `User` WHERE `pseudo` = ? ");
$preparerequest->execute([
    $_POST['connexionID']
]);
$user = $preparerequest->fetch();
if(!empty($_POST['connexionID']) &&  !empty($_POST['passwordConnect']) && $_POST['connexionID'] == $user['pseudo'] && $_POST['passwordConnect'] == $_POST['passwordConnect'] ){
    $_SESSION['id']= $_POST['connexionID'];

    header('Location: ../index.php');
}else{
    header('Location: www.google.com');
}












?>