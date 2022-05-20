<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">
<h3 class="marg-bot">Amis</h3>
<div class="u">
<?php
$reqe = $pdo->prepare('SELECT user_id, friend_id, id FROM friends WHERE status = 2');
    $reqe->execute();
    $datass = $reqe->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($datass as $datass) {

            if($datass['user_id'] == $userId or $datass['friend_id'] == $userId) {
                $ide = $datass['id'];

                if($datass['user_id'] !== $userId){

                    $reqe = $pdo->prepare('SELECT user_id, profil_pic, userName, userSurname, visibility FROM user WHERE user_id = :id');
                    $reqe->execute([':id' => $datass['user_id']]);
                    $datas = $reqe->fetch();

                    $user_ids = $datas['user_id'];
                    $user_pics = $datas['profil_pic'];
                    $user_names = $datas['userName'];
                    $user_surnames = $datas['userSurname'];
                    $user_visibilis = $datas['visibility'];
                    if ($user_visibilis == 1) {
                    echo    "
                            <div class='user align'>
                            <a href='../profil/profil.php?reg_err=$user_ids'><img src='../../public/img/$user_pics' alt='' class='img-use'></a>
                            <div class='text-user'>
                            <a href='../profil/profil.php?reg_err=$user_ids'><span class='t-u'>$user_names $user_surnames</span></a>
                            <form method='POST' action='../demande/refuse.php?reg_err=$ide'>
                            <button class='btn-user deux'>Retirer</button>
                            </form
                            </div>
                            </div>
                            ";
                    }
                } else {
                    $reqe = $pdo->prepare('SELECT user_id, profil_pic, userName, userSurname, visibility FROM user WHERE user_id = :id');
                    $reqe->execute([':id' => $datass['friend_id']]);
                    $datas = $reqe->fetch();

                    $user_ids = $datas['user_id'];
                    $user_pics = $datas['profil_pic'];
                    $user_names = $datas['userName'];
                    $user_surnames = $datas['userSurname'];
                    $user_visibilis = $datas['visibility'];
                    if ($user_visibilis == 1) {
                    echo    "
                    <div class='user align'>
                    <a href='../profil/profil.php?reg_err=$user_ids'><img src='../../public/img/$user_pics' alt='' class='img-use'></a>
                    <div class='text-user'>
                    <a href='../profil/profil.php?reg_err=$user_ids'><span class='t-u'>$user_names $user_surnames</span></a>
                    <form method='POST' action='../demande/refuse.php?reg_err=$ide'>
                    <button class='btn-user deux'>Retirer</button>
                    </form>
                    </div>
                    </div>
                    ";
                    }
                }
            }
        }
?>

</div>

</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>