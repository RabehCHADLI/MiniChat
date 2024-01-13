<?php

include './partial/header.php';
?>  
    <div class="container mt-5">
        <div class="row" >
            <form class="col-5 me-5 border border-end-2 p-5" action="../process/login.php" method="post">
                <h3 class="text-center">Inscription</h3>
                <label class='m-2' for="idInscription">Identifiant</label>
                <input class="form-control" type="text" placeholder="Identifiant/Pseudo d'inscription"name='idInscription'id='idInscription'>
                <label class='m-2' for="password">Mot de passe</label>
                <input class="form-control" type="password" placeholder="MDP"name='password'id='password'>
                <input type="hidden" name="ipInscription" id="ipInscription" value='<?=$_SERVER['REMOTE_ADDR']?>'>
                <button class="btn btn-danger mt-3">S'inscrire</button>
            </form>

            <form class="col-5 ms-5 border border-end-2 p-5" action="./process/connexionChat.php" method="post">
                <h3 class="text-center">Connexion</h3>
                <label class="m-2" for="connextionID">Identifiant</label>
                <input class='form-control' type="text" name='connexionID'id='connexionID'placeholder='Identifiant de connexion'>
                <label class="m-2" for="passwordConnect">Mot de passe</label>
                <input  class='form-control' type="text" name='passwordConnect'id='passwordConnect' placeholder="Mot de passe de Connexion" >
                <input type="hidden" name="connexionIP" id="ipInscription" value='<?=$_SERVER['REMOTE_ADDR']?>'>
                <button class="btn btn-primary mt-3">Se connecter</button>
            </form>
        </div>

    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="./script.js"></script>

</body>
</html>