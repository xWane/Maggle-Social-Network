<?php 
    $statut = true;
    $idPage = "...";
    $namePage = ucfirst("the pug community");
    $admin = true;
    $bannerpa = "backpa.jpg";
    $pppa = "pppa.jpg"
?>

<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

<!-- Info page -->

<div class="bg">
    <img src="../../public/img/<?php echo $bannerpa ?>" alt="Banière de page" class="bg-img img-vide">
</div>

<div class="info">

    <img src="../../public/img/<?php echo $pppa ?>" alt="Image de page" class="pp img-vide">
    <h2 class="profil"><?php echo $namePage ?></h2>
    <?php 
    if($admin == false) {
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

    if($admin == true) {
        require 'in-page.php';
    }

?>


</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>