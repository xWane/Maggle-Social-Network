<?php require '../head.php'; ?>
<?php require '../left.php'; ?>
<style>
<?php include '../../public/css/style.css' ?>
</style>

<!-- SECTION : Center Container -->
<main class="container-center">

    <div class="name-section">
            <h3>Pages</h3>
            <a href="../page/create_page.php" class="btn-bio deux .btn-cursor">Créer une page</a>
    </div>

    <div class="g"> 
<?php
    $inserte = $pdo->prepare('SELECT page_id, page_name, page_pic, pager_banner FROM `page`');
    $inserte->execute();
    $dat = $inserte->fetchAll(PDO::FETCH_ASSOC);

    foreach($dat as $dat) {
        $pid = $dat['page_id'];
        $pna = $dat['page_name'];
        $ppi = $dat['page_pic'];
        $pba = $dat['pager_banner'];

        echo "<div class='list'>
            <a href='../page/page.php?reg_err=$pid'>
            <div class='back-list'><img src='../../public/img/$pba' alt='' class='bg-list'><img src='../../public/img/$ppi' alt='' class='pp-list'></div>
            <span class='text-list'>$pna</span>
            </a>
        </div>";
    }

?>
    </div>
</main>

<?php require '../right-fovoris.php'; ?>
<?php require '../footer.php'; ?>