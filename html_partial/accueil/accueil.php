<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<?php require_once '../../database/create_db.php'; ?>
<?php require '../publication/get_post.php';?> 

<style>
<?php 
    include '../../public/css/style.css';

?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">
    <!-- User text -->
    <div class="border">
        <div class="user-text">
                <img src="../../public/img/<?php echo $profilPic ?>" class="pic profile-picture img-vide">

            <form method="POST" action="../publication/post_home.php"> 
                <textarea minlength="1" name="publi-content" class="read-text" placeholder="Écrire une publication ..."></textarea>
                <div class="user-send align">
                    <input type="submit" class="btn-send" value="Envoyer">
                </div>
            </form>
        </div>
    </div>

    <!-- Create publication -->
    <?php foreach($publications as $publication){

        $user = $pdo->prepare("SELECT userName, userSurname, profil_pic FROM `user` WHERE `user_id` = :id");
        $user->execute(array(
        ":id" => $publication['userId'] ,
        ));
        $name = $user->fetch()
    
        ?>
        <div class="border publication">
            <div class="align">
                <a href="" class="align"> <img src="../../public/img/<?= ucfirst($name['profil_pic']) ?>" class="pic profile-picture img-vide"> </a>
                <div class="user-publication">
                    <span class="name-publication"><?= ucfirst($name['userName']) ?> <?= ucfirst($name['userSurname']) ?></span>
                    <span class="date-publication"><?= $publication['creation_date'] ?></span>
                </div>
                <a href="" class="align"> <img src="../../public/icon/more-horiz.svg" alt="Image" class="more"> </a>
            </div>

            <div class="text-publication">
                <p class="text-user"><?= $publication['content'] ?></p>
            </div>
            <div class="react">

                <div class="react-like flex-end">
                    <div class="all-react align">
                        <div class="border-react"><img src="../../public/icon/like.svg" alt="Like" class="react-list"></div>
                        <div class="border-react"><img src="../../public/icon/love.svg" alt="Love" class="react-list"></div>
                        <div class="border-react"><img src="../../public/icon/wow.svg" alt="Wow" class="react-list"></div>
                        <span class="nb-react"><?= $publication['reaction_nb'] ?></span>
                    </div>
                </div>

                <div class="comment flex-end">
                    <p><span class="nb-comment">0 </span> Commentaires</p>
                </div>
            </div> 
        </div>
    <?php } ?>
</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>