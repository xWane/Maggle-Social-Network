<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<?php require '../data.php'; ?>

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
    <a href='change-img-profil.php' class='btn-bio un visibility-none'><span class='text-bio'>Retour</span></a>
</div>

<!-- Description -->
<div class="border">
<span class="title-bio">Bio</span>
<p class="text-bio"><?php echo $bio ?></p>

</div>

<?php 
if($visi == 1) {
    $vis = "checked";
} else {
    $vis = "";
}
?>

<form class="modif-profil g5" method="POST" action="change-img-profil.php" enctype="multipart/form-data">

    <label class="custom-file-upload deux">
        <input type="file" name="avatar" id=""/>
        <p>Profil</p> 
    </label>
    <label class="custom-file-upload deux">
        <input type="file" name="back" id=""/>
        <p>Bannière</p> 
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="name" placeholder="Prénom">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="surname" placeholder="Nom">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="bio" placeholder="Bio">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="email" name="mail" placeholder="Mail">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="password" name="oldpwd" placeholder="Ancien mdp">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="password" name="newpwd" placeholder="Nouveau mdp">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="password" name="rptpwd" placeholder="Répéter mdp">
    </label>

    <!-- <span>Email</span>
    <input type="email" name="mail" placeholder="<?php echo $mail ?>">
    <span>Mot de passe</span>
    <input type="password" name="oldpwd" placeholder="Ancien mot de passe">
    <input type="password" name="newpwd" placeholder="Nouveau mot de passe">
    <input type="password" name="rptpwd" name="" placeholder="Répéter nouveau mot de passe"> -->


    <!-- <span>Visible</span>
    <input type="checkbox" name="visibility" <?php echo $vis ?>>
    <span>Supprimer le compte</span>
    <input type="checkbox" name="sup"> -->

    <label class="custom-file-upload un">
        <input type="submit" class="hidden"/>
        <p>Retour</p> 
    </label>
</form>


</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>



