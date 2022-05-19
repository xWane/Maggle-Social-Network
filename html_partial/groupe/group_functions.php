<?php

/* 
Récupérer grâce à session mon id / prénom / nom / adresse mail
Nouvelle query pour :  UPDATE `group_user` SET group_user.user_id = (SELECT user_id FROM `user` WHERE userMail = :userMail); 
*/
function createGroup()
{
    require "database\pdo.php";

    $group_name = $_POST['group_name'];
    $admins = $_POST['admins'];

    // Vérifie si le groupe est privé ou public
    if (
        isset($_POST['checkbox']) == '1'
    ) {
        $private = 1;
    } else {
        $private = 0;
    }

    // Vérifie si le groupe existe déjà dans la database ou non
    $groupListRequest = $pdo->prepare("SELECT group_name FROM `group` WHERE group_name=? ");
    $groupListRequest->execute(
        [$group_name]
    );

    $groupExist = $groupListRequest->fetch();

    if ($pdo and $groupExist === false) {
        $ins = $pdo->prepare("INSERT INTO `group` (group_name, private) VALUES (:group_name, :private)");
        $ins->execute(array(
            ":group_name" => $group_name,
            ":private" => $private
        ));
    }
}

function addMember()
{
    require "database\pdo.php";

    $userName = $_POST['userName'];
    $userSurname = $_POST['userSurname'];
    $group_name = $_POST['group_name'];

    // Vérifie si le user sera admin ou membre
    if (
        isset($_POST['checkbox']) == '1'
    ) {
        $admin = 1;
    } else {
        $admin = 0;
    }

    if ($pdo) {
        //
        $addInfo = $pdo->prepare(
            "INSERT INTO `group_user` (group_id) SELECT group_id FROM `group` WHERE group_name = :group_name;
            UPDATE `group_user` SET group_user.user_id = (SELECT userId FROM `user` WHERE userName = :userName AND userSurname = :userSurname);
            UPDATE `group_user` SET admin = :admin"
        );
        $addInfo->execute(array(
            ":group_name" => $group_name,
            ":userName" => $userName,
            ":userSurname" => $userSurname,
            ":admin" => $admin
        ));
    }

    /*  INSERT INTO group_user (group_id)
        SELECT group_id
        FROM group
        WHERE group_name = :group_name
        
        INSERT INTO group_user (userId)
        SELECT userId
        FROM user
        WHERE userName = :userName, userSurname = :userSurname
    */

    /*  SELECT group_id FROM `group` INNER JOIN `group_user` ON group.group_id = group_user.group_id WHERE group.group_name = :group_name;
        SELECT userId FROM `user` INNER JOIN `group_user` ON user.userId = group_user.user_id WHERE user.userName = :userName, user.userSurname = :userSurname; 
    */
}

function showGroup()
{
    require "database\pdo.php";

    if ($pdo) {
        $groupList = $pdo->prepare("SELECT * from `group`");
        $groupList->execute();
    }

    echo "<table border='1'>
    <tr>
        <th> ID Group </th>
        <th> Group Name </th>
        <th> Members </th>
        <th> Private </th>
    </tr>";


    while ($row = $groupList->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['group_id'] . "</td>";
        echo "<td>" . $row['group_name'] . "</td>";
        echo "<td>" . $row['members'] . "</td>";
        echo "<td>" . str_replace(['0', '1'], ['Public', 'Privé'], $row['private']) . "</td>";
        echo "</tr>";
    }
}

function showGroup_user()
{
    require "database\pdo.php";

    if ($pdo) {
        // Fonctionne plus ou moins, affiche que le 1er SELECT
        $List = $pdo->prepare("SELECT group_name FROM `group` INNER JOIN group_user WHERE group_user.group_id = group.group_id;
        SELECT userName, userSurname FROM `user` INNER JOIN group_user WHERE group_user.user_id = user.userId; 
        SELECT admin FROM group_user");
        $List->execute([]);
    }

    echo "<table border='1'>
    <tr>
        <th> Nom du groupe </th>
        <th> Nom de l'utilisateur </th>
        <th> Prénom de l'utilisateur </th>
        <th> Admin </th>
    </tr>";


    while ($row = $List->fetch()) {
        echo "<tr>";
        echo "<td>" . $row['group_name'] . "</td>";
        echo "<td>" . $row['userName'] . "</td>";
        echo "<td>" . $row['userSurname'] . "</td>";
        echo "<td>" . str_replace(['0', '1'], ['Membre', 'Admin'], $row['admin']) . "</td>";
        echo "</tr>";
    }
}

function privateGroup()
{
    require "database\pdo.php";

    if ($pdo) {
        $private = $pdo->prepare("SELECT private from `group` WHERE group_id = 1 /* à remplacer le where par truc du genre 'WHERE group_id = groupe_loaded' */ ");
        $private->execute();
    }

    while ($row = $private->fetch()) {
        echo str_replace(['0', '1'], ['Public', 'Privé'], $row['private']);
    }
}

function membersGroup()
{
    require "database\pdo.php";

    if ($pdo) {
        $members = $pdo->prepare("SELECT members from `group` WHERE group_id = 1 /* à remplacer le where par truc du genre 'WHERE group_id = groupe_loaded' */ ");
        $members->execute();
    }

    while ($row = $members->fetch()) {
        echo $row['members'];
    }
}

// On join = add +1 to members count
/* $ins = $pdo->prepare("UPDATE `group` SET members = members+1");
$ins->execute(); */
