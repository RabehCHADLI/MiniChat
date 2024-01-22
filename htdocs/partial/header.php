<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TCHATTE</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body id="bg-image">
    <nav class="container-fluid d-flex navbar navbar-dark"id='bg-header'>
        <div class="  p-4">
            <a class="text-dark mb-3" href="../sign.php">Inscription/Connexion</a>

        </div>
        <div>
            <h2 class="text-dark fw-bold font-titre mt-1">TCHATTE</h2>
        </div>
    <div>
    <?php
    if(!empty($_SESSION['id'])){ ?>
        <h3 class="text-dark m-5"><?= $_SESSION['id'] ?> <a class="btn btn-dark" href="../process/logOut.php">Log-Out</a>
   <?php } ?>
    </div>
    </nav>
