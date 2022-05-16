

<!-- SECTION : Right Container -->
<main class="container-right">

<div class="sticky">

    <div class="research align">

        <a href="" class="align"> <img src="../../public/icon/search.svg" alt="Rechercher" class="little-icon"> </a>
        <input type="search" name="" class="search" placeholder="Recherche">

    </div>

    <?php

    if ($pot[6] == "accueil") {
        require 'accueil/tendance.php';
    }

    ?>

    <div class="block">

        <span class="title-block">Favoris</span>

        <div class="item-block">
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Fabien</span> </a>
            </div>
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Martin</span> </a>
            </div>
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Ewan</span> </a>
            </div>
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Vitomir</span> </a>
            </div>
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Clément</span> </a>
            </div>
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Steven</span> </a>
            </div>
            <div class="fovoris">
                <a href="" class=" align"> <img src="../../public/img/pp.jpg" alt="Profile" class="icon profile-picture img-vide"> <span class="text-fovoris">Anthony</span> </a>
            </div>

        </div>

    </div>
</div>

</main>