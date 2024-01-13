<?php


require_once './config/connexion.php';
include './partial/header.php';

$prepareRequest = $connexion->prepare('SELECT * FROM `User` ORDER BY `User`.`id` ASC');
$prepareRequest->execute();

$listUser = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);

    

?>
<section class="form">
    <div class="row bg-info-subtle">
        <div class="col-6 container border border-3 border-primary-subtle rounded-3 mt-5 mb-5 chat-scroll">
            <h3 class="text-center mt-5">Discution</h3>
            <div id="scroll">
                <ul class="container" id="listUser">

                </ul>
            </div>
        <?php if(!empty($_COOKIE['PseudoCookie'])){ 
            
            ?>
            <form action="./process/addUserAndMessage.php" method="post" class="flex-column mt-5" id="form">
                <div class="mb-3 chat-scroll">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" placeholder="KarimDu69" name='pseudo' value="<?=$_COOKIE['PseudoCookie']?>" id='pseudo'>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="3" name='message' placeholder='blablabla blabla blabla' id='message'></textarea>
                    <input type="hidden" name='ipUser' value=" <?= $_SERVER['REMOTE_ADDR'] ?>" id='ipUser'>

                    <button id='button' class="btn btn-dark mt-3">envoyer</button>
                </div>
            </form>
            <?php }else{ ?>

            <form action="./process/addUserAndMessage.php" method="post" class="flex-column mt-5" id ='form'>
                <div class="mb-3 chat-scroll">
                    <label for="pseudo" class="form-label">Pseudo</label>
                    <input type="text" class="form-control" id="pseudo" placeholder="KarimDu69" name='pseudo' id='pseudo'>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" rows="3" name='message' placeholder='blablabla blabla blabla'id = 'message'></textarea>
                    <input type="hidden" name='ipUser' value=" <?= $_SERVER['REMOTE_ADDR'] ?>"id='ipUser'>

                    <button id="button" class="btn btn-dark mt-3">envoyer</button>
                </div>
            </form>
            <?php } ?>
        </div>
        <div class='col-2 bg-white m-5 user rounded-3 border border-3 border-primary-subtle ' id="scroll-list">
            
        
                <ul id="list">
                   
                </ul>
          
        
        </div>
        <div class="col-1"></div>


    </div>
</section>









<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="./script.js"></script>



</body>
</html>