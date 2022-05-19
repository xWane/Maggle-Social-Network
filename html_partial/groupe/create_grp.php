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
    <img src="../../public/img/chevre.webp" alt="Banière de profil" class="bg-img img-vide">
</div>

<div class="info">
    <img src="../../public/img/img-test.jpg" alt="Image de profil" class="pp img-vide">
    <div></div>
    <h2 class="profil">Nom du Groupe</h2>
    <a href='change-img-profil.php' class='btn-bio un visibility-none'><span class='text-bio'>Créer</span></a>
</div>

<!-- Description -->
<div class="border">
<span class="title-bio">Bio</span>
<p class="text-bio">Ajouter bio du groupe</p>

</div>

<?php 
if($visi == 1) {
    $vis = "checked";
} else {
    $vis = "";
}
?>

<form class="modif-profil g4" method="POST" action="change-img-profil.php" enctype="multipart/form-data">

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
    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="admins" placeholder="Admins">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box" type="text" name="members" placeholder="Expulser">
    </label>
    <label class="custom-file-upload deux">
        <input class="modif-box btn-cursor" type="button" name="confidentiality" value="Public">
    </label>

    <label class="custom-file-upload un">
        <input type="submit" class="hidden"/>
        <p>Créer</p> 
    </label>

</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>

