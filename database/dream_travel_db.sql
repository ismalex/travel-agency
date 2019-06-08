/* SQL Manager Lite for MySQL                              5.6.3.49012 */
/* ------------------------------------------------------------------- */
/* Host     : localhost                                                */
/* Port     : 3306                                                     */
/* Database : dream_travel_db                                          */


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES 'utf8' */;

SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `dream_travel_db`;

CREATE DATABASE `dream_travel_db`
    CHARACTER SET 'utf8'
    COLLATE 'utf8_general_ci';

USE `dream_travel_db`;

/* Dropping database objects */

DROP TABLE IF EXISTS `dt.user_book_features`;
DROP TABLE IF EXISTS `dt.messages`;
DROP TABLE IF EXISTS `dt.features`;
DROP TABLE IF EXISTS `dt.chat`;
DROP TABLE IF EXISTS `dt.user_book`;
DROP TABLE IF EXISTS `dt.users`;
DROP TABLE IF EXISTS `dt.booking`;

/* Structure for the `dt.booking` table :  */

CREATE TABLE `dt.booking` (
  `book_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(120) COLLATE utf8_general_ci DEFAULT NULL,
  `available` TINYINT(1) DEFAULT NULL,
  `location` VARCHAR(40) COLLATE utf8_general_ci DEFAULT NULL,
  `company` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `representative` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`book_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=2 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dt.users` table :  */

CREATE TABLE `dt.users` (
  `user_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `userName` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `password` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  `firstName` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
  `lastName` VARCHAR(30) COLLATE utf8_general_ci DEFAULT NULL,
  /*telefono*/
  `type` VARCHAR(20) COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY USING BTREE (`user_id`)
) ENGINE=InnoDB
AUTO_INCREMENT=3 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dt.user_book` table :  */
CREATE TABLE `dt.user_book` (
  `ub_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `user_id` INTEGER(11) DEFAULT NULL,
  `book_id` INTEGER(11) DEFAULT NULL,
  /*HOW MANY PEOPLE*/
  `start_date` DATE DEFAULT NULL,
  `end_date` DATE DEFAULT NULL,
  `state` TINYINT(1) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`ub_id`),
  KEY `user_id` USING BTREE (`user_id`),
  CONSTRAINT `dt.user_book_fk1` FOREIGN KEY (`user_id`) REFERENCES `dt.users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=2 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dt.chat` table :  */

CREATE TABLE `dt.chat` (
  `chat_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `ub_id` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`chat_id`),
  KEY `ub_id` USING BTREE (`ub_id`),
  CONSTRAINT `dt.chat_fk1` FOREIGN KEY (`ub_id`) REFERENCES `dt.user_book` (`ub_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=2 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dt.features` table :  */

CREATE TABLE `dt.features` (
  `feature_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `description` VARCHAR(120) COLLATE utf8_general_ci DEFAULT NULL,
  `available` TINYINT(1) DEFAULT NULL,
  `book_id` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`feature_id`),
  KEY `book_id` USING BTREE (`book_id`),
  CONSTRAINT `dt.features_fk1` FOREIGN KEY (`book_id`) REFERENCES `dt.booking` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=6 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dt.messages` table :  */

CREATE TABLE `dt.messages` (
  `message_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `chat_id` INTEGER(11) DEFAULT NULL,
  `message` VARCHAR(200) COLLATE utf8_general_ci DEFAULT NULL,
  `send_date` DATE DEFAULT NULL,
  PRIMARY KEY USING BTREE (`message_id`),
  KEY `chat_id` USING BTREE (`chat_id`),
  CONSTRAINT `dt.messages_fk1` FOREIGN KEY (`chat_id`) REFERENCES `dt.chat` (`chat_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=2 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Structure for the `dt.user_book_features` table :  */

CREATE TABLE `dt.user_book_features` (
  `ubf_id` INTEGER(11) NOT NULL AUTO_INCREMENT,
  `feature_id` INTEGER(11) DEFAULT NULL,
  `ub_id` INTEGER(11) DEFAULT NULL,
  PRIMARY KEY USING BTREE (`ubf_id`),
  KEY `feature_id` USING BTREE (`feature_id`),
  KEY `ub_id` USING BTREE (`ub_id`),
  CONSTRAINT `dt.user_book_features_fk1` FOREIGN KEY (`ub_id`) REFERENCES `dt.user_book` (`ub_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB
AUTO_INCREMENT=3 ROW_FORMAT=DYNAMIC CHARACTER SET 'utf8' COLLATE 'utf8_general_ci'
;

/* Data for the `dt.booking` table  (LIMIT 0,500) */

INSERT INTO `dt.booking` (`book_id`, `description`, `available`, `location`, `company`, `representative`) VALUES
  (1,'Description 1',1,'England','ABCD',2);
COMMIT;

/* Data for the `dt.users` table  (LIMIT 0,500) */

INSERT INTO `dt.users` (`user_id`, `userName`, `password`, `firstName`, `lastName`, `type`) VALUES
  (1,'setabango','123','Steven','Tabango','user'),
  (2,'aiaragon','123','Alex','Aragon','representative');
COMMIT;

/* Data for the `dt.user_book` table  (LIMIT 0,500) */

INSERT INTO `dt.user_book` (`ub_id`, `user_id`, `book_id`, `start_date`, `end_date`, `state`) VALUES
  (1,1,1,'2019-01-30','0201-02-07',1);
COMMIT;

/* Data for the `dt.chat` table  (LIMIT 0,500) */

INSERT INTO `dt.chat` (`chat_id`, `ub_id`) VALUES
  (1,1);
COMMIT;

/* Data for the `dt.features` table  (LIMIT 0,500) */

INSERT INTO `dt.features` (`feature_id`, `description`, `available`, `book_id`) VALUES
  (1,'Feature 1',1,1),
  (2,'Feature 2',1,1),
  (4,'Feature 3',0,1),
  (5,'Feature 4',1,1);
COMMIT;

/* Data for the `dt.messages` table  (LIMIT 0,500) */

INSERT INTO `dt.messages` (`message_id`, `chat_id`, `message`, `send_date`) VALUES
  (1,1,'zxczxczcxc','2019-01-31');
COMMIT;

/* Data for the `dt.user_book_features` table  (LIMIT 0,500) */

INSERT INTO `dt.user_book_features` (`ubf_id`, `feature_id`, `ub_id`) VALUES
  (1,1,1),
  (2,2,1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;