<?php
require 'html_partial/head.php';
require 'group_functions.php';

if (isset($_POST['create_group'])) {
    echo createGroup();
}

if (isset($_POST['add_member'])) {
    echo addMember();
}

echo showGroup();

echo showGroup_user();

echo privateGroup()
?>

<div class="group-form">
    <section class="create-group">
        <form method="post">

            <div class="group_name">
                <input type="text" name="group_name" placeholder="Nom du groupe">
            </div>

            <div class="private">
                <input type="checkbox" name="checkbox" value="1"> Privé ? ( Laissez vide si public )
            </div>

            <div class="create_group">
                <input type="submit" name="create_group" value="Créer le groupe">
            </div>

        </form>
    </section>
    <br>
</div>

<div class="add-member">
    <section class="add-member">
        <form method="post">

            <div class="name">
                <input type="text" name="userName" placeholder="Nom">
            </div>

            <div class="surname">
                <input type="text" name="userSurname" placeholder="Prénom">
            </div>

            <div class="group_name">
                <input type="text" name="group_name" placeholder="Nom du groupe">
            </div>

            <div class="admin">
                <input type="checkbox" name="checkbox" value="1"> Admin ? ( Laissez vide si membre )
            </div>

            <div class="add_member">
                <input type="submit" name="add_member" value="Ajouter le membre">
            </div>

        </form>
    </section>
    <br>

</div>

<?php require 'html_partial/footer.php'; ?>