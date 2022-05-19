<?php require '../head.php'; ?>
<?php require '../left.php';?> 
<?php require '../publication/search_get_user_post.php';?> 
<?php 
  require '../../search_form.php';
  $userId = $id;
  $profilBanner = $row->profil_banner;
  $profilPic = $row->profil_pic;
  $name =  ucfirst($row->userName);
  $surname = ucfirst($row->userSurname);
  $bio = ucfirst($row->biograph);
?>

<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

<!-- Info profil -->
<div class="bg">
    <img src="../../public/img/<?php echo $profilBanner ?>" alt="Banière de profil" class="bg-img img-vide">
</div>

<div class="info">
    <img src="../../public/img/<?php echo $profilPic ?>" alt="Image de profil" class="pp img-vide">
    <div></div>
    <h2 class="profil"><?php echo $name ?> <?php echo $surname ?></h2>
    <?php 
    $you = true;
    if($you == false) {
        if($ami == false) {
            $ing = "un";
            $sui = "Suivre";
        } else {
            $ing = "deux";
            $sui = "Suivie";
        }
        echo "<a href='' class='btn-bio $ing '><span class='text-bio'>$sui</span></a>";
    } else {
        echo "<a class='btn-bio un'><span class='text-bio'>Suivre</span></a>";
    }
    ?>
</div>

<!-- Description -->
<div class="border">
    <span class="title-bio">Bio</span>
    <p class="text-bio"><?= $bio ?></p>
</div>

<?php
// if($you == true) {
//     require 'post-profil.php';}
?>

<!-- publication -->

<?php foreach($publications as $publication){
    $user = $pdo->prepare("SELECT userName, userSurname, profil_pic FROM `user` WHERE `user_id` = :id");
    $user->execute(array(
    ":id" => $publication['userId'] ,
    ));
    $name = $user->fetch()
    ?>
    <div class="border publication">
        <div class="align">
            <a href="" class="align"> <img src="../../public/img/<?= ucfirst($profilPic) ?>" class="pic profile-picture img-vide"> </a>
            <div class="user-publication">
                <span class="name-publication"><?= ucfirst($name) ?> <?= ucfirst($surname) ?></span>
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

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>