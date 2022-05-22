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

$inserte = $pdo->prepare('SELECT * FROM `group` WHERE group_id = :id');
$inserte->execute(array(':id' => $pos[1]));
$groupess = $inserte->fetch();

$pname = $groupess['group_name'];
$ppic = $groupess['group_pic'];
$pbanner = $groupess['group_banner'];
$biog = $groupess['bio_g'];
$pv = $groupess['private'];


?>

<!-- Info groupe -->

<div class="bg">
    <img src="../../public/img/<?php echo $pbanner ?>" alt="Banière de groupe" class="bg-img img-vide">
</div>

<div class="info">

    <img src="../../public/img/<?php echo $ppic ?>" alt="Image de groupe" class="pp img-vide">
    <h2 class="profil"><?php echo $pname ?></h2>
    <?php 

$inserte = $pdo->prepare('SELECT admin FROM `group_user` WHERE group_id = :gname AND user_id = :gusr');
$inserte->execute(array(
    ':gname' => $pos[1],
    ':gusr' => $userId
));
$adm = $inserte->fetch();
$row = $inserte->rowCount();

$admin = false;
$statut = false;

if($row > 0) {
if($adm["admin"] == 1) {
    $admin = true;
}

if($adm["admin"] == 0) {
    $statut = true;
} else if($admin == true) {
    if($pv == 0) {
    echo "<form class='' method='POST' action='demande_groupe.php?reg_err=$pos[1]'>
        <button class='btn-bio deux text-bio' style='margin: 0 10px 0 0'>Demandes</button>
        </form>";
    }
    echo "<form class='' method='POST' action='droit_group.php?reg_err=$pos[1]'>
        <button class='btn-bio un text-bio' style='margin: 0'>Droits</button>
        </form>";
    echo "<form class='' method='POST' action='del_groupe.php?reg_err=$pos[1]'>
        <button class='btn-bio deux text-bio' style='margin: 0 10px'>Quitter</button>
        </form>";
    echo "<a href='groupe_modif.php?reg_err=$pos[1]' class='align'> <img src='../../public/icon/more-horiz-black.svg' alt='Image' class='mod-icon'> </a>";
}
}
    
    if($statut == true) {
        echo "<form class='' method='POST' action='del_groupe.php?reg_err=$pos[1]'>
        <button class='btn-bio deux text-bio'>Suivie</button>
        </form>";
    } else if($pv == 0 AND $admin == false) {
        echo "<form class='' method='POST' action='addpv_groupe.php?reg_err=$pos[1]'>
        <button class='btn-bio un text-bio'>Suivre groupe privée</button>
        </form>";
    } else if($admin == false AND $statut == false){
        echo "<form class='' method='POST' action='add_groupe.php?reg_err=$pos[1]'>
        <button class='btn-bio un text-bio'>Suivre</button>
        </form>";
}
    
    ?>
</div>

<!-- Description -->
<div class="border">
<span class="title-bio">Bio</span>
<p class="text-bio"><?php $biog ?></p>

</div>

<?php 
if($row > 0) {
    if($adm["admin"] == 0 or $adm["admin"] == 1) {
        require 'in-groupe.php';
    }
}
?>

</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>