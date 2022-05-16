<?php 
    $statut = false;
    $idGroupe = "...";
    $nameGroupe = "The pomme groupe";
    $admin = false;
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

<!-- Info groupe -->

<div class="bg">
    <img src="../../public/img/<?php echo $bannerg ?>" alt="Banière de groupe" class="bg-img">
</div>

<div class="info">

    <img src="../../public/img/<?php echo $ppg ?>" alt="Image de groupe" class="pp">
    <div></div>
    <h2 class="profil"><?php echo $nameGroupe ?></h2>
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

    if($statut == false) {
        require 'in-groupe.php';
    }

?>

</main>

<?php require 'right-gro.php'; ?>
<?php require '../footer.php'; ?>