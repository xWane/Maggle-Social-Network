<?php 
    $statut = true;
    $idPage = "...";
    $namePage = ucfirst("the pug page");
    $admin = true;
    $bannerpa = "bg.jpg";
    $pppa = "pp-g.jpg"
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

<!-- User text -->
<div class="border marg-top">

    <div class="user-text align">

        <div class="align">
            <img src="../../public/img/pp.jpg" alt="Profile" class="pic profile-picture img-vide">
        </div>
        <input type="text" name="" class="read-text" placeholder="Écrire une publication ...">

    </div>

    <div class="user-send align">

        <input type="file" name="" id="">
        <a href="" class="align"> <img src="../../public/icon/image.svg" alt="Image" class="icon img"> </a>
        <button type="button" class="btn-send"><a href="" class="btn">Envoyer</a></button>

    </div>
</div>

<!-- publication -->
<div class="border publication">

    <div class="align">

        <a href="" class="align"> <img src="../../public/img/jh.jpg" alt="Profile" class="pic profile-picture img-vide"> </a>
        <div class="user-publication">
            <span class="name-publication">Jhon Doe</span>
            <span class="date-publication">10/05/2022</span>
        </div>
        <a href="" class="align"> <img src="../../public/icon/more-horiz.svg" alt="Image" class="icon img"> </a>
    </div>

    <div class="text-publication">

        <p class="text-user">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repellendus repellat, iusto id sit repudiandae enim illum beatae quos officiis, expedita ad nesciunt! Ipsam illo, nihil vel soluta voluptatibus vitae harum reprehenderit sint exercitationem unde, dolorem doloremque corporis quidem. Voluptatum atque error in esse! Voluptas nobis sed assumenda quis nihil molestiae!
        </p>
        <div class="img-publication">

            <img src="../../public/img/img-random.jpg" alt="" class="img-user img-vide">
        </div>
        
    </div>

    <!-- Reaction -->
    <div class="react">

        <div class="react-like flex-end">
                <div class="all-react align">
                    <div class="border-react"><img src="../../public/icon/like.svg" alt="Like" class="react-list"></div>
                    <div class="border-react"><img src="../../public/icon/love.svg" alt="Love" class="react-list"></div>
                    <div class="border-react"><img src="../../public/icon/wow.svg" alt="Wow" class="react-list"></div>

                    <span class="nb-react">18 567</span>
                    
                </div>
                <button type="button" class="btn-react"><a href="" class=" align"> <img src="../../public/icon/like-r.svg" alt="Like" class="icon"> <span class="text-nav-bar">J'aime</span> </a></button>
        </div>

        <div class="react-share flex-end">
            <button type="button" class="btn-react"><a href="" class=" align"> <img src="../../public/icon/share.svg" alt="Partager" class="icon"> <span class="text-nav-bar">Partager</span> </a></button>
        </div>

        <div class="comment flex-end">
            
                <span class="nb-comment">4 287 Commentaires</span>
            <button type="button" class="btn-react"><a href="" class="end"> <img src="../../public/icon/comment.svg" alt="Commenter" class="icon"> <span class="text-nav-bar">Commenter</span> </a></button>
        </div>

    </div>

</div>


<div class="border publication">

    <div class="align">

        <a href="" class="align"> <img src="../../public/img/br.jpg" alt="Profile" class="pic profile-picture img-vide"> </a>
        <div class="user-publication">
            <span class="name-publication">Brontis</span>
            <span class="date-publication">08/05/2022</span>
        </div>
        <a href="" class="align"> <img src="../../public/icon/more-horiz.svg" alt="Image" class="icon"> </a>
    </div>

    <div class="text-publication">

        <p class="text-user">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolorem dolorum quae provident nesciunt atque tempore molestiae laboriosam eveniet, soluta incidunt voluptatibus facere repudiandae. Debitis distinctio natus numquam veniam, sapiente perspiciatis provident quo voluptate obcaecati autem dolore explicabo voluptas eligendi culpa a quas amet dignissimos quis. Ad error est rem facilis voluptatum placeat quo unde quaerat doloremque necessitatibus. Maiores mollitia at hic, inventore soluta consequuntur est rem ut consectetur quia temporibus sunt! Veniam voluptas, veritatis soluta aliquam alias obcaecati dignissimos iure. Dolores, tempore. Aut adipisci saepe numquam culpa ex libero! Illo id iste eius magnam ex consequatur tempore sequi eligendi!
        </p>
        <div class="img-publication">

        </div>
        
    </div>


    <div class="react">

        <div class="react-like flex-end">
                <div class="all-react align">
                    <div class="border-react"><img src="../../public/icon/like.svg" alt="Like" class="react-list"></div>
                    <div class="border-react"><img src="../../public/icon/love.svg" alt="Love" class="react-list"></div>
                    <div class="border-react"><img src="../../public/icon/wow.svg" alt="Wow" class="react-list"></div>

                    <span class="nb-react">25 123</span>
                    
                </div>
                <button type="button" class="btn-react"><a href="" class=" align"> <img src="../../public/icon/like-r.svg" alt="Like" class="icon"> <span class="text-nav-bar">J'aime</span> </a></button>
        </div>

        <div class="react-share flex-end">
            <button type="button" class="btn-react"><a href="" class=" align"> <img src="../../public/icon/share.svg" alt="Partager" class="icon"> <span class="text-nav-bar">Partager</span> </a></button>
        </div>

        <div class="comment flex-end">
            
                <span class="nb-comment">7 456 Commentaires</span>
            <button type="button" class="btn-react"><a href="" class="end"> <img src="../../public/icon/comment.svg" alt="Commenter" class="icon"> <span class="text-nav-bar">Commenter</span> </a></button>
        </div>

    </div>

</div>


<div class="border publication">

    <div class="align">

        <a href="" class="align"> <img src="../../public/img/fa.jpg" alt="Profile" class="pic profile-picture img-vide"> </a>
        <div class="user-publication">
            <span class="name-publication">Fabien</span>
            <span class="date-publication">07/05/2022</span>
        </div>
        <a href="" class="align"> <img src="../../public/icon/more-horiz.svg" alt="Image" class="icon"> </a>
    </div>

    <div class="text-publication">

        <p class="text-user">
           
        </p>
        <div class="img-publication">

            <img src="../../public/img/img-test.jpg" alt="" class="img-user img-vide">
        </div>
        
    </div>

    <div class="react">

        <div class="react-like flex-end">
                <div class="all-react align">
                    <div class="border-react"><img src="../../public/icon/like.svg" alt="Like" class="react-list"></div>
                    <div class="border-react"><img src="../../public/icon/love.svg" alt="Love" class="react-list"></div>
                    <div class="border-react"><img src="../../public/icon/wow.svg" alt="Wow" class="react-list"></div>

                    <span class="nb-react">180 789</span>
                    
                </div>
                <button type="button" class="btn-react"><a href="" class=" align"> <img src="../../public/icon/like-r.svg" alt="Like" class="icon"> <span class="text-nav-bar">J'aime</span> </a></button>
        </div>

        <div class="react-share flex-end">
            <button type="button" class="btn-react"><a href="" class=" align"> <img src="../../public/icon/share.svg" alt="Partager" class="icon"> <span class="text-nav-bar">Partager</span> </a></button>
        </div>

        <div class="comment flex-end">
            
                <span class="nb-comment">12 903 Commentaires</span>
            <button type="button" class="btn-react"><a href="" class="end"> <img src="../../public/icon/comment.svg" alt="Commenter" class="icon"> <span class="text-nav-bar">Commenter</span> </a></button>
        </div>

    </div>

</div>

</main>

<?php require '../right.php'; ?>
<?php require '../footer.php'; ?>