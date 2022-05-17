<?php

if ($pot[6] == "profil") {
    $blockOne = "Amis";
    $blockTwo = "Groupes";
  } else {
    $blockOne = "Admins";
    $blockTwo = "Membres";
  }
?>

<!-- SECTION : Right Container -->
<main class="container-right">

<div class="sticky">

    <div class="research align">

        <a href="" class="align"> <img src="../../public/icon/search.svg" alt="Rechercher" class="little-icon"> </a>
        <input type="search" name="" class="search" placeholder="Recherche">

    </div>


    <div class="block">
<?php
    if ($pot[6] == "profil") {
    echo "<a href='../ami/ami.php'><span class='title-block'>$blockOne</span></a>";
  } else {
    echo "<a href=''><span class='title-block'><$blockOne</span></a>";
  }
?>


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

    <span class="more">Voir plus</span>

</div>

</div>

<div class="block">

<?php
    if ($pot[6] == "profil") {
        echo "<a href='../list/list-g.php'><span class='title-block'>$blockTwo</span></a>";
  } else {
    echo "<a href=''><span class='title-block'><$blockTwo</span></a>";
  }
?>

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

    <span class="more">Voir plus</span>

</div>

</div>

</div>

</main>