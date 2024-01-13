<?php
session_start();
require_once '../config/connexion.php';
$preparerequest = $connexion->prepare("SELECT * FROM `User` WHERE `pseudo` = ? ");
$preparerequest->execute([
    $_POST['idInscription']
]);
$user = $preparerequest->fetch();
if ($user['pseudo'] == $_POST['idInscription'] || $user ) {
    
if (!empty($_POST['idInscription']) && !empty($_POST['password'])) {
    $preparedRequest = $connexion->prepare('INSERT INTO `User`(`pseudo`, `password`) VALUES (?,?)');
    $preparedRequest->execute([
        $_POST['idInscription'],
        $_POST['password']
    ]);

    header("Location: ./connexionChat");
}


}else{
    header("Location: ../sign.php");
}

?>
