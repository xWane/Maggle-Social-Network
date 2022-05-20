<?php
$engine = "mysql";
$host = "localhost";
$port = 3306;
$dbname = "db_maggle";
$username = "root";
$password = "root";

$pdo = new PDO("$engine:host=$host:$port;", $username, $password);

  $maRequete = $pdo->prepare("CREATE DATABASE IF NOT EXISTS `db_maggle`
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
  $maRequete->execute();
  $maRequete->closeCursor();

  $pdo = new PDO("$engine:host=$host:$port;dbname=$dbname", $username, $password);

  $maRequete = $pdo->prepare(

    "CREATE TABLE IF NOT EXISTS `user` (
      `user_id` INT NOT NULL AUTO_INCREMENT,
      `userMail` VARCHAR(255) NOT NULL,
      `userPwd` VARCHAR(256) NOT NULL,
      `userName` VARCHAR(255) NOT NULL,
      `userSurname` VARCHAR(255),
      `profil_pic` VARCHAR(255),
      `profil_banner` VARCHAR(255),
      `visibility` TINYINT(1) NOT NULL,
      `biograph` VARCHAR(255),
      PRIMARY KEY (`user_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `publication`(
      `publi_id` INT NOT NULL AUTO_INCREMENT,
      `userId` INT NOT NULL,
      `content` VARCHAR(255),
      `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
      `reaction_nb` INT,
      PRIMARY KEY (`publi_id`),
      FOREIGN KEY (`userId`) REFERENCES `user`(`user_id`)
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
      `members` INT,
      `private` INT NOT NULL,
      `publi_id` INT,
      `group_name` VARCHAR(255) NOT NULL,
      `group_pic` VARCHAR(255) NOT NULL,
      `group_banner` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`group_id`),
      FOREIGN KEY (`publi_id`) REFERENCES `publication`(`publi_id`)
      ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `group_user`(
      `group_id` INT NOT NULL,
      `user_id` INT NOT NULL,
      `admin` INT,
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`),
      FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`)
      ) ENGINE=InnoDB;

    -- CREATE TABLE IF NOT EXISTS `group_list`(
    --   `group_id` INT NOT NULL,
    --   FOREIGN KEY (`group_id`) REFERENCES `group`(`group_id`)
    --   )ENGINE=InnoDB;
    
    -- CREATE TABLE IF NOT EXISTS `page_admin`(
    --   `page_id` INT NOT NULL AUTO_INCREMENT,
    --   `user_id` INT NOT NULL,
    --   PRIMARY KEY (`page_id`),
    --   FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
    --   ) ENGINE=InnoDB;

    -- CREATE TABLE IF NOT EXISTS `group_admin`(
    --   `groupe_id` INT NOT NULL AUTO_INCREMENT,
    --   `user_id` INT NOT NULL,
    --   PRIMARY KEY (`groupe_id`),
    --   FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
    --   ) ENGINE=InnoDB;

    CREATE TABLE IF NOT EXISTS `page`(
      `page_id` INT NOT NULL AUTO_INCREMENT,
      `member` INT,
      `publi_id` INT,
      `page_name` VARCHAR(255) NOT NULL,
      `page_pic` VARCHAR(255) NOT NULL,
      `pager_banner` VARCHAR(255) NOT NULL,
      PRIMARY KEY (`page_id`),
      FOREIGN KEY (`publi_id`) REFERENCES `publication`(`publi_id`),
      FOREIGN KEY (`member`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;
    
    -- CREATE TABLE IF NOT EXISTS `page_list`(
    --   `page_id`  INT NOT NULL AUTO_INCREMENT,
    --   PRIMARY KEY (`page_id`),
    --   FOREIGN KEY (`page_id`) REFERENCES `page`(`page_id`)
    --   ) ENGINE=InnoDB;
    
    CREATE TABLE IF NOT EXISTS `page_member`(
      `page_id`  INT NOT NULL AUTO_INCREMENT,
      `user_id` INT NOT NULL,
      `admin` INT,
      PRIMARY KEY (`page_id`),
      FOREIGN KEY (`page_id`) REFERENCES `page`(`page_id`),
      FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
      ) ENGINE=InnoDB;

      CREATE TABLE IF NOT EXISTS `message`(
      `message_id`  INT AUTO_INCREMENT,
      `userId` INT,
      `userIdAmi` INT,
      `text` VARCHAR(255) NOT NULL,
      `creation_date` DATETIME DEFAULT CURRENT_TIMESTAMP,
      FOREIGN KEY (`userId`) REFERENCES `user`(`user_id`),
      FOREIGN KEY (`userIdAmi`) REFERENCES `user`(`user_id`),
      PRIMARY KEY(`message_id`)
      ) ENGINE=InnoDB;

  ");
  $maRequete->execute();
  $maRequete->closeCursor();
?>