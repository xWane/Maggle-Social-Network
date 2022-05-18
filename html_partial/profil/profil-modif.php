<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
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
    <a href='change-img-profil.php' class='btn-bio deux'><span class='text-bio'>Retour</span></a>
</div>
<!-- Description -->
<div class="border">
<span class="title-bio">Bio</span>
<p class="text-bio"><?php echo $bio ?></p>

</div>

<form class="modif-profil" method="POST" action="change-img-profil.php" enctype="multipart/form-data">
    <a href='' class='btn-bio un'><input type="file" name="avatar" id=""><span class='text-bio'>Photo</span></a>
    <a href='' class='btn-bio un'><input type="file" name="back" id=""><span class='text-bio'>Bannière</span></a>
    <span>Prénom</span>
    <input type="text" placeholder="<?php echo $name ?>">
    <span>Nom</span>
    <input type="text" placeholder="<?php echo $surname ?>">
    <span>Bio</span>
    <textarea type="text" placeholder="<?php echo $bio ?>"></textarea>
    <span>Email</span>
    <input type="email" placeholder="<?php echo $mail ?>">
    <span>Mot de passe</span>
    <input type="password" placeholder="Ancien mot de passe">
    <input type="password" placeholder="Nouveau mot de passe">
    <input type="password" name="" id="Répéter nouveau mot de passe">
    inpu
    <button type="submit">Ajouter</button>
</form>


</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>