<?php 
    $statut = true;
    $prive = false;
    $nbMember = "70";

    if($prive == true) {
        $groupe = "Privé";
    } else {
        $groupe = "Public";
    }
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
    <img src="../../public/img/bg.jpg" alt="Banière de groupe" class="bg-img">
</div>

<div class="info">

    <img src="../../public/img/pp-g.jpg" alt="Image de groupe" class="pp">

    <h2 class="profil">The pomme groupe</h2>

    <div class="stats">
        <span> Groupe <?php echo $groupe ?></span>
        <span><?php echo $nbMember ?> Membres</span>

    </div>
</div>

<!-- Description -->
<div class="border">
<span class="title-bio">Desciption</span>
<p class="text-bio">Lorem ipsum dolor sit amet consectetur adipisicing elit. A mollitia soluta qui, maxime, libero voluptatibus id dolor ad placeat necessitatibus voluptatem expedita quas nihil exercitationem. Iste quis exercitationem velit quos?</p>

</div>

<?php 

    if($statut == true) {
        require 'not-groupe.php';
    } else {
        require 'in-groupe.php';
    }

?>


</main>

<?php require 'right-gro.php'; ?>
<?php require '../footer.php'; ?>