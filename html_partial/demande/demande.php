<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

<div class="demande">
<h3 class="marg-bot">Demande d'amis</h3>
<div class="u">

    <?php

    $check = $pdo->prepare('SELECT user_id, id FROM friends WHERE status = 1');
    $check->execute();
    $friendss = $check->fetchAll(PDO::FETCH_ASSOC);
    $row = $check->rowCount();

    
if($row > 0) {

        foreach($friendss as $friendss) {

            $check = $pdo->prepare('SELECT user_id, userName, userSurname, profil_pic, visibility FROM user WHERE user_id = :id');
            $check->execute([':id' => $friendss['user_id']]);
            $userDemF = $check->fetch();

            $pic = $userDemF['profil_pic'];
            $nam = $userDemF['userName'];
            $surnam = $userDemF['userSurname'];
            $visibi = $userDemF['visibility'];
            $useridf = $userDemF['user_id'];

            if($visibi == 1){
            if($friendss['user_id'] !== $userId) {
            $ids = $friendss['id'];
            echo "
            <div class='user align'>
            <a href='../profil/profil.php?reg_err=$useridf'><img src='../../public/img/$pic' alt='' class='img-use'></a>
            <div class='text-user'>
            <a href='../profil/profil.php?reg_err=$useridf'><span class='t-u'>$nam $surnam</span></a>
            <div class='hor'>
            <form method='POST' action='accept.php?reg_err=$ids'>
                <button class='btn-user un'>Accepter</button>
            </form>
            <form method='POST' action='refuse.php?reg_err=$ids'>
                <button class='btn-user deux'>Refuser</button>
            </form>
            </div>
            </div>
            </div>
            
            ";
            }
        }
    }
}

    ?>

</div>
</div>



<!-- <div class="demande">
<h3 class="marg-bot">Demande ajout "Les patates"</h3>
<div class="u">
<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

</div>
</div>



<div class="demande">
<h3 class="marg-bot">Demande ajout "Wanned"</h3>
<div class="u">
<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

<div class="user align">
    <a href=""><img src="../../public/img/fa.jpg" alt="" class="img-use"></a>
    <div class="text-user">
    <a href=""><span class="t-u">Anthony Ringressi</span></a>
    <div class="hor">
        <a href="" class="btn-user un m"><span>Accepter</span></a>
        <a href="" class="btn-user deux"><span>Refuser</span></a>
    </div>
    </div>
</div>

</div>
</div> -->

</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>