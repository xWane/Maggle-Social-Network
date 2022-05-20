<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<?php require '../data.php'; ?>
<?php require __DIR__ . './group_functions.php'; ?>

<style>
    <?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

    <div class="bg">
        <img src="../../public/img/chevre.webp" alt="Banière de profil" class="bg-img img-vide">
    </div>

    <div class="info">
        <img src="../../public/img/img-test.jpg" alt="Image de profil" class="pp img-vide">
        <div></div>
        <h2 class="profil">Nom du Groupe</h2>
        <a href='change-img-profil.php' class='btn-bio un visibility-none'><span class='text-bio'>Créer</span></a>
    </div>

    <form class="modif-profil g4" method="POST">

        <label class="custom-file-upload deux">
            <input type="file" name="group_pic" id="" />
            <p>Image de profil</p>
        </label>
        <label class="custom-file-upload deux">
            <input type="file" name="group_banner" id="" />
            <p>Bannière</p>
        </label>

        <label class="custom-file-upload deux">
            <input class="modif-box" type="text" name="group_name" placeholder="Nom du groupe">
        </label>

        <div>
            Public <label class="switch">
                <input type="checkbox" name="checkbox" value="1">
                <span class=" slider"></span>
            </label> Privé
        </div>

        <label class="custom-file-upload un">
            <input type="submit" name="createGroup" class=" hidden">
            <p>Créer</p>
        </label>

</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>