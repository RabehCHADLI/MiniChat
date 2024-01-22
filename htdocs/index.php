<?php

require_once './config/connexion.php';
include './partial/header.php';

$prepareRequest = $connexion->prepare('SELECT * FROM `User` ORDER BY `User`.`id` ASC');
$prepareRequest->execute();

$listUser = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);

?>
<section class="form">
    <div class="row bg-gradient h-100 ">
        <div class="col-6 container border border-3 border-warning rounded-5 mt-5 mb-5 chat-scroll bg-light bg-gradient">
            <?php if(!empty($_SESSION['id'])){

            ?> <h3 class="text-center mt-5">Discution</h3> 
            <div id="scroll">
                <ul class="container" id="listUser">

                </ul>
            </div>

            
            <form action="./process/addUserAndMessage.php" method="post" class="flex-column mt-5" id="form">
                <div class="mb-3 chat-scroll">
                    <label for="pseudo" class="form-label">Pseudo : <span class="fw-bold"><?= $_SESSION['id'] ?></span> </label>                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="3" name='message' placeholder='blablabla blabla blabla' id='message'></textarea>
                    <input type="hidden" name='ipUser' value=" <?= $_SERVER['REMOTE_ADDR'] ?>" id='ipUser'>
                    <input type="hidden" class="form-control" id="pseudo" name='pseudo' value='<?= $_SESSION['id'] ?>'>

                    <button id='button' class="btn btn-warning mt-3">envoyer</button>
                </div>
            </form>
            <?php }else{
                header('Location: ./sign.php');
                 ?>
                <h2 class="text-center ">Pas Inscrit</h2>
                
            <?php } ?>
        </div>
        <div class='col-2 bg-white m-5 user rounded-3 border border-3 border-warning ' id="scroll-list">
            
        
                <ul id="list">
                   
                </ul>
          <div>
            
          </div>
        
        </div>
        <div class="col-1"></div>


    </div>
</section>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="./script.js"></script>



</body>
</html>