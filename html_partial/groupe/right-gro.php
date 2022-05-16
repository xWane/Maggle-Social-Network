<!-- SECTION : Right Container -->
<main class="container-right">

<div class="sticky">

    <div class="research align">

        <a href="" class="align"> <img src="../../public/icon/search.svg" alt="Rechercher" class="little-icon"> </a>
        <input type="search" name="" class="search" placeholder="Recherche">

    </div>


    <?php 
        if ($statut == false or $prive == false) {
            require 'member-gro.php';
        }
    ?>

</div>

</main>