<?php
require_once '../config/connexion.php';
$preparerequest = $connexion->prepare("SELECT * FROM `User` WHERE `pseudo` = " . "'" . $_POST['pseudo'] . "'");
$preparerequest->execute();
$user = $preparerequest->fetch();
date_default_timezone_set('Europe/Paris');
if (!empty($user) && !empty($_POST['message']) && !empty($_POST['pseudo']) ) {
    $userId = $user['id'];
    $preparedRequest = $connexion->prepare(
        "INSERT INTO MessageUser ( idUser , ipUser , dateHour , `message`) VALUES (?,?,?,?)"
    );

    $preparedRequest->execute([
        $userId,
        $_POST['ipUser'],
        date('d-m-y h:i:s'),
        $_POST['message']
        
    ]);
    if($_COOKIE['PseudoCookie'] == $_POST['pseudo']){
    unset($_COOKIE['PseudoCookie']);
    $valeurcookie = $_POST['pseudo'];
    setcookie("PseudoCookie", $valeurcookie, time()+3600 ,"/");
    }
    
 header("Location: ../index.php?pseudo=" . $_POST['pseudo']);
}else if (!empty($_POST['message']) && !empty($_POST['pseudo'])){
    $preparedRequest = $connexion->prepare("INSERT INTO User (pseudo) VALUES (?)");
    $preparedRequest->execute([$_POST['pseudo']]);

    $userID = $connexion->lastInsertId();

    $preparedRequest = $connexion->prepare(
        "INSERT INTO MessageUser (idUser, ipUser, dateHour, `message`) VALUES (?, ?, ?, ?)"
    );

    $preparedRequest->execute([
        $userID,
        $_POST['ipUser'],
        date('d-m-y h:i:s'),
        $_POST['message']
    ]);
    if (!empty($_POST ['idConnexion']) && $_POST['password']) {
        $preparedRequest = $connexion->prepare(
            "INSERT INTO login (ipConnexion, idConnexion, password, idUserConnexion) VALUES (?, ?, ?, ?)"
        );
        $preparedRequest->execute([
            $_POST['ipConnexion'],
            $_POST['idConnexion'],
            $_POST['password'],
            $userID,
        ]);
    }
    unset($_COOKIE['PseudoCookie']);
    $valeurcookie = $_POST['pseudo'];
    setcookie("PseudoCookie", $valeurcookie, time()+3600 ,"/");
    header("Location: ../index.php?pseudo=" . $_POST['pseudo']);
}else{
 header("Location: ../index.php?pseudo=" . $_POST['pseudo']);
}

