<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<?php 

$pos = $url;
$pos = explode("err=",$pos);


    $inserte = $pdo->prepare('SELECT group_name, group_pic, group_banner, bio_g FROM `group` WHERE group_id = :id');
    $inserte->execute([':id' => $pos[1]]);
    $dat = $inserte->fetch();
    
        $namePage = $dat['group_name'];
        $bannerpa = $dat['group_banner'];
        $pppa = $dat['group_pic'];
        $biog = $dat['bio_g'];

?>

<!-- SECTION : Center Container -->
<main class="container-center">

<!-- Info page -->

<div class="bg">
    <img src="../../public/img/<?php echo $bannerpa ?>" alt="Banière de page" class="bg-img img-vide">
</div>

<div class="info">

    <img src="../../public/img/<?php echo $pppa ?>" alt="Image de page" class="pp img-vide">
    <h2 class="profil"><?php echo $namePage ?></h2>
</div>

<!-- Description -->
<div class="border">
<span class="title-bio">Bio</span>
<p class="text-bio"><?php $biog ?></p>

</div>


<form class="modif-profil g4" method="POST" action="change_groupe.php?reg_err=<?php echo $pos[1] ?>" enctype="multipart/form-data">

    <label class="custom-file-upload deux">
        <input type="file" name="avatar" id=""/>
        <p>Profil</p> 
    </label>
    <label class="custom-file-upload deux">
        <input type="file" name="back" id=""/>
        <p>Bannière</p> 
    </label>

    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="surname" placeholder="Nom">
    </label>

    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="bio" placeholder="Bio">
    </label>

    <label class="custom-file-upload un">
        <input type="submit" class="hidden"/>
        <p>Modifier</p> 
    </label> 
</form>



</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>




