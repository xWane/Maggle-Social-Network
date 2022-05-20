<?php 
    $statut = false;
    $idGroupe = "...";
    $nameGroupe = ucfirst("the pomme groupe");
    $admin = true;
    $bannerg = "bg.jpg";
    $ppg = "pp-g.jpg"
?>

<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

<?php

$pos = $url;
$pos = explode("err=",$pos);

$inserte = $pdo->prepare('SELECT * FROM `page` WHERE page_id = :id');
$inserte->execute(array(':id' => $pos[1]));
$groupess = $inserte->fetch();

$pname = $groupess['page_name'];
$ppic = $groupess['page_pic'];
$pbanner = $groupess['pager_banner'];

?>

<!-- Info groupe -->

<div class="bg">
    <img src="../../public/img/<?php echo $pbanner ?>" alt="Banière de groupe" class="bg-img img-vide">
</div>

<div class="info">

    <img src="../../public/img/<?php echo $ppic ?>" alt="Image de groupe" class="pp img-vide">
    <h2 class="profil"><?php echo $pname ?></h2>
    <?php 

$inserte = $pdo->prepare('SELECT admin FROM `page_member` WHERE page_id = :gname AND user_id = :gusr');
$inserte->execute(array(
    ':gname' => $pos[1],
    ':gusr' => $userId
));
$adm = $inserte->fetch();

    if($adm["admin"] == 0) {
        if($statut == true) {
            $ing = "un";
            $sui = "Suivre";
        } else {
            $ing = "deux";
            $sui = "Suivie";
        }
        echo "<a href='' class='btn-bio $ing '><span class='text-bio'> $sui </span></a>";
    } else {
        echo "<a href='' class='align'> <img src='../../public/icon/more-horiz-black.svg' alt='Image' class='mod-icon'> </a>";
    }
    ?>
</div>

<!-- Description -->
<div class="border">
<span class="title-bio">Desciption</span>
<p class="text-bio">Lorem ipsum dolor sit amet consectetur adipisicing elit. A mollitia soluta qui, maxime, libero voluptatibus id dolor ad placeat necessitatibus voluptatem expedita quas nihil exercitationem. Iste quis exercitationem velit quos?</p>

</div>

<?php 

    if($statut == false) {
        require 'in-groupe.php';
    }

?>

</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>