<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

<div class="demande">
<h3 class="marg-bot">Droit</h3>
<div class="u">

    <?php

$pos = $url;
$pos = explode("err=",$pos);

    $check = $pdo->prepare('SELECT user_id FROM group_user WHERE admin = 1 OR admin = 0 AND group_id = :gid');
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

            $check = $pdo->prepare('SELECT admin FROM group_user WHERE user_id = :id AND group_id = :gid');
            $check->execute([':id' => $userDemF['user_id'],
                             ':gid' => $pos[1]]);
            $friend = $check->fetch();

            if($visibi == 1){
            if($friend['admin'] == 0) {
            echo "
            <div class='user align'>
            <a href='../profil/profil.php?reg_err=$useridf'><img src='../../public/img/$pic' alt='' class='img-use'></a>
            <div class='text-user'>
            <a href='../profil/profil.php?reg_err=$useridf'><span class='t-u'>$nam $surnam</span></a>
            <div class='hor'>
            <form method='POST' action='up_admin.php?reg_err=$pos[1]_$useridf'>
                <button class='btn-user un'>Passer Admin</button>
            </form>
            <form method='POST' action='exclure.php?reg_err=$pos[1]_$useridf'>
                <button class='btn-user deux'>Exculre</button>
            </form>
            </div>
            </div>
            </div>
            
            ";
            } else if($friend['admin'] == 1) {
                    echo "
                    <div class='user align'>
                    <a href='../profil/profil.php?reg_err=$useridf'><img src='../../public/img/$pic' alt='' class='img-use'></a>
                    <div class='text-user'>
                    <a href='../profil/profil.php?reg_err=$useridf'><span class='t-u'>$nam $surnam</span></a>
                    <div class='hor'>
                    <form method='POST' action='up_member.php?reg_err=$pos[1]_$useridf'>
                        <button class='btn-user un'>Passer Membre</button>
                    </form>
                    <form method='POST' action='exclure.php?reg_err=$pos[1]_$useridf'>
                        <button class='btn-user deux'>Exculre</button>
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

</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>