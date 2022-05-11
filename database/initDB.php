<?php
require_once '../database/pdo.php';

$pdo = new PDO("$engine:host=$host:$port;", $username, $password);

$maRequete = $pdo->prepare("CREATE DATABASE IF NOT EXISTS `db_maggle`
CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
$maRequete->execute();

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete = $pdo->prepare(
"CREATE TABLE IF NOT EXISTS `User`(
        `user_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
        `mail` VARCHAR(255) NOT NULL,
        `password` VARCHAR(256) NOT NULL,
        `name` VARCHAR(255) NOT NULL,
        `surname` VARCHAR(255) NOT NULL,
        `profil_pic` VARCHAR(255) NOT NULL,
        `profil_banner` VARCHAR(255) NOT NULL,
        `visibility` TINYINT(1) NOT NULL,
        `biograph` LONGTEXT NOT NULL
    );

CREATE TABLE IF NOT EXISTS `publication`(
    `publi_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `content` LONGTEXT NOT NULL,
    `publi_pic` VARCHAR(255) NOT NULL,
    `creation_date` DATETIME NOT NULL,
    `reaction_nb` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `comment`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `publi_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `com_content` LONGTEXT NOT NULL,
    `creation_date` DATETIME NOT NULL
);

CREATE TABLE IF NOT EXISTS `reaction`(
    `react_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `publi_id` INT NOT NULL,
    `emoji` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `friends`(
    `friend_request` TINYINT(1) NOT NULL,
    `user_id` INT NOT NULL,
    `friend_id` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `group_liste`(`group_id` INT NOT NULL);

CREATE TABLE IF NOT EXISTS `group`(
    `group_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `members` INT NOT NULL,
    `private` TINYINT(1) NOT NULL,
    `publi_id` INT NOT NULL,
    `group_name` VARCHAR(255) NOT NULL,
    `group_pic` VARCHAR(255) NOT NULL,
    `group_ banner` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `page_liste`(`pages` VARCHAR(255) NOT NULL);

CREATE TABLE IF NOT EXISTS `page`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `member` INT NOT NULL,
    `publi_id` INT NOT NULL,
    `page_name` VARCHAR(255) NOT NULL,
    `page_pic` VARCHAR(255) NOT NULL,
    `pager_banner` VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS `group_member`(
    `group_id` VARCHAR(255) NOT NULL,
    `user_id` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `page_member`(
    `page_id` VARCHAR(255) NOT NULL,
    `user_id` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `page_admin`(
    `page_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL
);

CREATE TABLE IF NOT EXISTS `group_admin`(
    `groupe_id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL
)"
);
$maRequete->execute();

$pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
$maRequete = $pdo->prepare(
"ALTER TABLE
    `comment`
ADD
    CONSTRAINT `comment_publi_id_foreign` FOREIGN KEY(`publi_id`) REFERENCES `publication`(`publi_id`);

ALTER TABLE
    `page`
ADD
    CONSTRAINT `page_publi_id_foreign` FOREIGN KEY(`publi_id`) REFERENCES `publication`(`publi_id`);

ALTER TABLE
    `group`
ADD
    CONSTRAINT `group_publi_id_foreign` FOREIGN KEY(`publi_id`) REFERENCES `publication`(`publi_id`);

ALTER TABLE
    `publication`
ADD
    CONSTRAINT `publication_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `comment`
ADD
    CONSTRAINT `comment_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `reaction`
ADD
    CONSTRAINT `reaction_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `group`
ADD
    CONSTRAINT `group_members_foreign` FOREIGN KEY(`members`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `group_member`
ADD
    CONSTRAINT `group_member_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `group_admin`
ADD
    CONSTRAINT `group_admin_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `page_liste`
ADD
    CONSTRAINT `page_liste_pages_foreign` FOREIGN KEY(`pages`) REFERENCES `page`(`id`);

ALTER TABLE
    `page`
ADD
    CONSTRAINT `page_member_foreign` FOREIGN KEY(`member`) REFERENCES `page_member`(`page_id`);

ALTER TABLE
    `page`
ADD
    CONSTRAINT `page_member_foreign` FOREIGN KEY(`member`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `friends`
ADD
    CONSTRAINT `friends_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `friends`
ADD
    CONSTRAINT `friends_friend_id_foreign` FOREIGN KEY(`friend_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `reaction`
ADD
    CONSTRAINT `reaction_publi_id_foreign` FOREIGN KEY(`publi_id`) REFERENCES `publication`(`publi_id`);

ALTER TABLE
    `group_liste`
ADD
    CONSTRAINT `group_liste_group_id_foreign` FOREIGN KEY(`group_id`) REFERENCES `group`(`group_id`);

ALTER TABLE
    `page_member`
ADD
    CONSTRAINT `page_member_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);

ALTER TABLE
    `page_admin`
ADD
    CONSTRAINT `page_admin_user_id_foreign` FOREIGN KEY(`user_id`) REFERENCES `User`(`user_id`);"
);
$maRequete->execute();

echo "la database a été créé.";
?>