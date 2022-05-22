<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

<div class="demande">
<h3 class="marg-bot">Demande de groupe</h3>
<div class="u">

    <?php

$pos = $url;
$pos = explode("err=",$pos);

    $check = $pdo->prepare('SELECT user_id FROM group_user WHERE admin = 2 AND group_id = :gid');
    $check->execute([':gid' => $pos[1]]);
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
            echo "
            <div class='user align'>
            <a href='../profil/profil.php?reg_err=$useridf'><img src='../../public/img/$pic' alt='' class='img-use'></a>
            <div class='text-user'>
            <a href='../profil/profil.php?reg_err=$useridf'><span class='t-u'>$nam $surnam</span></a>
            <div class='hor'>
            <form method='POST' action='accept_pv.php?reg_err=$pos[1]_$useridf'>
                <button class='btn-user un'>Accepter</button>
            </form>
            <form method='POST' action='refuse_pv.php?reg_err=$pos[1]_$useridf'>
                <button class='btn-user deux'>Refuser</button>
            </form>
            </div>
            </div>
            </div>
            
            ";
            }
        }
    }

    ?>

</div>
</div>

</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>