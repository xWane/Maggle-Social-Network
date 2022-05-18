<?php

  require_once 'pdo.php';

  $pdo = new PDO("$engine:host=$host:$port;", $username, $password);

  $maRequete = $pdo->prepare("CREATE DATABASE IF NOT EXISTS `db_maggle`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
  $maRequete->execute();
  $maRequete->closeCursor();

  $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);
  $maRequete = $pdo->prepare(

    "CREATE TABLE IF NOT EXISTS `user` (
      `user_id` INT NOT NULL AUTO_INCREMENT,
      `mail` VARCHAR(255) NOT NULL,
      `password` VARCHAR(256) NOT NULL,
      `name` VARCHAR(255) NOT NULL,
      `surname` VARCHAR(255) NOT NULL,
      `profil_pic` VARCHAR(255) NOT NULL,
      `profil_banner` VARCHAR(255) NOT NULL,
      `visibility` TINYINT(1) NOT NULL,
      `biograph` LONGTEXT NOT NULL,
      PRIMARY KEY (`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `publication`(
      `publi_id` INT NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      `content` LONGTEXT NOT NULL,
      `publi_pic` VARCHAR(255),
      `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
      `reaction_nb` INT NOT NULL,
      PRIMARY KEY (`publi_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `comment`(
      `id` INT NOT NULL AUTO_INCREMENT,
      `publi_id` INT NOT NULL,
      `user_id` INT NOT NULL,
      `com_content` LONGTEXT NOT NULL,
      `creation_date` DATETIME NOT NULL,
      PRIMARY KEY (`id`),
      FOREIGN KEY (`publi_id`) REFERENCES `publication`(`publi_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `reaction`(
      `react_id` INT NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      `publi_id` INT NOT NULL,
      `emoji` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`react_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
      FOREIGN KEY (`publi_id`) REFERENCES `publication`(`publi_id`)
      ) ENGINE=InnoDB;

      CREATE TABLE IF NOT EXISTS `friends`(
      `id` INT(255) NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      `friend_id` INT NOT NULL,
      `status` INT(255) NOT NULL,
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
      FOREIGN KEY (`friend_id`) REFERENCES `user`(`user_id`),
      PRIMARY KEY(`id`)
      )ENGINE=InnoDB;
    
    CREATE TABLE IF NOT EXISTS `group`(
      `group_id` INT NOT NULL AUTO_INCREMENT,
      `members` INT NOT NULL,
      `private` TINYINT(1) NOT NULL,
      `publi_id` INT NOT NULL,
      `group_name` VARCHAR(255) NOT NULL,
      `group_pic` VARCHAR(255) NOT NULL,
      `group_ banner` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`group_id`),
      FOREIGN KEY (`publi_id`) REFERENCES `publication`(`publi_id`),
      FOREIGN KEY (`members`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `group_list`(
      `group_id` INT NOT NULL,
      FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`)
      )ENGINE=InnoDB;
    
    CREATE TABLE IF NOT EXISTS `page_admin`(
      `page_id` INT NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      PRIMARY KEY (`page_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `group_admin`(
      `groupe_id` INT NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      PRIMARY KEY (`groupe_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `group_member`(
      `group_id` VARCHAR(255) NOT NULL,
      `user_id` INT NOT NULL,
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `page`(
      `page_id` INT NOT NULL AUTO_INCREMENT,
      `member` INT NOT NULL,
      `publi_id` INT NOT NULL,
      `page_name` VARCHAR(255) NOT NULL,
      `page_pic` VARCHAR(255) NOT NULL,
      `pager_banner` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`page_id`),
      FOREIGN KEY (`publi_id`) REFERENCES `publication`(`publi_id`),
      FOREIGN KEY (`member`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;
    
    CREATE TABLE IF NOT EXISTS `page_list`(
      `page_id`  INT NOT NULL AUTO_INCREMENT,
      FOREIGN KEY (`page_id`) REFERENCES `page`(`page_id`)
      ) ENGINE=InnoDB;
    
    CREATE TABLE IF NOT EXISTS `page_member`(
      `page_id`  INT NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      FOREIGN KEY (`page_id`) REFERENCES `page`(`page_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

  ");
  $maRequete->execute();
  $maRequete->closeCursor();
?>