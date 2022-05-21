<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

    <div class="name-section">
        <h3>Groupes</h3>
        <a href="../groupe/create_grp_public.php" class="btn-bio deux .btn-cursor">Créer un groupe public</a>
        <a href="../groupe/create_grp_privee.php" class="btn-bio deux .btn-cursor">Créer un groupe privée</a>
    </div>

    <div class="g">

    <?php
    $inserte = $pdo->prepare('SELECT group_id, group_name, group_pic, group_banner, private FROM `group`');
    $inserte->execute();
    $dat = $inserte->fetchAll(PDO::FETCH_ASSOC);

    foreach($dat as $dat) {
        $pid = $dat['group_id'];
        $pna = $dat['group_name'];
        $ppi = $dat['group_pic'];
        $pba = $dat['group_banner'];
        $pri = $dat['private'];

        if ($pri == 0) {
            echo "<div class='list'>
            <a href='../groupe/groupe.php?reg_err=$pid'>
            <div class='back-list'><img src='../../public/img/$pba' alt='' class='bg-list'><img src='../../public/img/$ppi' alt='' class='pp-list'></div>
            <span class='text-list'>$pna</span><img src='../../public/icon/lock.svg' alt='' class='icon-lock'>
            </a>
        </div>";

        } else {
            echo "<div class='list'>
            <a href='../groupe/groupe.php?reg_err=$pid'>
            <div class='back-list'><img src='../../public/img/$pba' alt='' class='bg-list'><img src='../../public/img/$ppi' alt='' class='pp-list'></div>
            <span class='text-list'>$pna</span>
            </a>
        </div>";
        }

        
    }

?>

    <div>
</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>