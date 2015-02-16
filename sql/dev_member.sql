-- MySQL dump 10.13  Distrib 5.6.21, for Linux (x86_64)
--
-- Host: localhost    Database: dev_member
-- ------------------------------------------------------
-- Server version	5.6.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `username` varchar(32) NOT NULL,
  `activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'jetriconew@gmail.com','dragonjet','2014-08-05 03:28:33'),(3,'rare@rare.com','rarepat','2014-08-05 03:28:33'),(4,'ruelminds@me.com','ruelminds','2014-08-05 03:28:33'),(5,'jreyes@yahoo.com','jreyes','2014-08-05 03:28:33'),(8,'jaycu@gmail.com','jaycu','2014-08-05 03:28:33'),(9,'ilyas@gmail.com','ilyas','2014-08-05 03:28:33'),(10,'sbederi@gmail.com','sbederi','2014-08-05 03:28:33'),(11,'da.vibe@hotmail.com','DBederi','2014-08-05 03:28:33'),(12,'jasper_frederick02@yahoo.com','jasper_frederick02','2014-08-05 03:28:33'),(13,'3conceptz@gmail.com','Z3mama','2014-08-05 03:28:33'),(14,'ilyas@checkapp.asia','ilyas2','2014-08-05 03:28:33'),(15,'zach.bederi@gmail.com','zach bederi','2014-08-05 03:28:33'),(16,'mel_ranola@yahoo.com','mel_ranola','2014-08-05 03:28:33'),(17,'ruelminds@mac.com','Leur','2014-08-05 03:28:33'),(18,'gapragudo2@gmail.com','Gabriel Phillip Ragudo','2014-08-05 03:28:33'),(19,'phillip_ragudo@yahoo.com','Felipe W. Ragudo','2014-08-05 03:28:33'),(20,'p_ragudo@yahoo.com','lipip','2014-08-05 03:28:33'),(21,'bederi.stella@gmail.com','chinbederi87','2014-08-05 03:28:33'),(22,'bbederi@gmail.com','buck bederi II','2014-08-05 03:28:33'),(23,'simple_days2000@yahoo.com','dairan03','2014-08-05 03:28:33'),(24,'winnie.ragudo@gmail.com','Winnie Ragudo','2014-08-05 03:28:33'),(25,'Marifler@yahoo.com','Fler','2014-08-05 03:28:33'),(26,'alex.azurin@yahoo.com','Alex Azurin','2014-08-05 03:28:33'),(27,'heschlx@yahoo.com','Jeff Michael de la rosa ','2014-08-05 03:28:33'),(28,'emz_lyn18@yahoo.com','em bernardino','2014-08-05 03:28:33'),(29,'qwert@qwet.com','qwert','2014-08-05 03:28:33'),(30,'lgcale@gmail.com','louie','2014-08-05 03:28:33'),(31,'rai_perjes08@yahoo.com','Raia Isabella','2014-08-05 03:28:33'),(32,'rinnamariee@gmail.com','rinnamarie','2014-08-05 03:28:33'),(33,'infantelalaine@gmail.com','Lala09','2014-08-05 03:28:33'),(34,'myatsq@yahoo.com','ana q','2014-08-05 03:28:33'),(35,'dermcorner@yahoo.com','bertex','2014-08-05 03:28:33'),(36,'jabber.janna@gmail.com','janna17','2014-08-05 03:28:33'),(37,'ryan.escarez@gmail.com','ryan.escarez','2014-08-05 03:28:33'),(38,'salivatears@gmail.com','salivatears','2014-08-05 03:28:33'),(39,'juan@me.com','juan','2014-08-05 03:28:33'),(40,'juan@me.de','juanthree','2014-08-05 03:28:33'),(41,'menardjaycu2@gmail.com','menard69','2014-08-05 03:28:33'),(42,'carla@pat.com','carlapat','2014-08-05 03:28:33'),(43,'dardsmindworks@gmail.com','patient01','2014-08-05 03:28:33'),(44,'menardjaycu@gmail.com','whattest','2014-08-05 03:28:33'),(45,'edmark_sanchez@yahoo.com','!superuser','2014-08-05 03:28:33'),(46,'edmarkharold@gmail.com','edsss','2014-08-05 03:28:33'),(47,'fb.japajarillo@gmail.com','fb.japajarillo','2014-08-05 03:28:33'),(48,'bryanroymendoza@gmail.com','lastroy','2014-08-05 03:28:33'),(49,'dontwanncloseyoureyes@gmail.com','dontwanna','2014-08-05 03:28:33'),(50,'patient@admin.com','patient@admin.com','2014-08-05 03:28:33'),(66,'raremonpat@gmail.com','raremonpat','2014-08-05 03:28:33'),(67,'raremonpat2@gmail.com','raremonpat2','2014-08-05 03:28:33'),(68,'ruelminds@gmail.com','leurminds','2014-08-05 03:28:33'),(71,'sunny@webhoop.com','sunnyzimm','2014-08-05 03:28:33'),(72,'abet@checkapp.asia','abetuson','2014-08-05 03:28:33'),(73,'jsantos@yahoo.com','jsantos','2014-08-05 03:28:33'),(77,'patientedmark@yopmail.com','patientedmark','2014-08-05 03:28:33'),(79,'babalama3@gmail.com','babalams','2014-08-05 03:28:33'),(80,'tokageru@gmail.com','raremonpat3','2014-08-05 03:28:33'),(82,'liamparungao@gmail.com','liamparungao','2014-08-05 03:28:33'),(84,'bryan@yopmail.com','bryan','2014-08-05 03:28:33'),(86,'melchorkenneth@gmail.com','melchorkenneth','2014-08-05 03:28:33'),(87,'','','2014-08-05 03:28:33'),(89,'mail.vurmz@gmail.com','vpatient1','2014-11-21 08:39:54'),(91,'asdf@asdf.com','asdfasdf','2014-11-27 08:54:09'),(107,'test@mail.com','testinglang','2014-12-06 17:12:54'),(108,'bonryan@gmail.com','BonBon','2014-12-06 17:21:22'),(109,'test@mail.com','testinglang','2014-12-06 17:27:06'),(111,'bonryan@gmail.com','p660963','2014-12-07 14:55:58'),(112,'bonryan@gmail.com','p522823','2014-12-07 15:01:59'),(113,'bonryan@gmail.com','p809741','2014-12-07 15:16:37'),(114,'bonryan@gmail.com','p323782','2014-12-07 15:24:19'),(115,'karlene_abainza@yahoo.com','abainzakarlene','2014-12-17 06:18:54');
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_detail`
--

DROP TABLE IF EXISTS `contact_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `label` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_detail`
--

LOCK TABLES `contact_detail` WRITE;
/*!40000 ALTER TABLE `contact_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emergency_contact`
--

DROP TABLE IF EXISTS `emergency_contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emergency_contact` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `relation` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `phonenum1` varchar(30) NOT NULL,
  `phonenum2` varchar(30) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emergency_contact`
--

LOCK TABLES `emergency_contact` WRITE;
/*!40000 ALTER TABLE `emergency_contact` DISABLE KEYS */;
/*!40000 ALTER TABLE `emergency_contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `health`
--

DROP TABLE IF EXISTS `health`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `health` (
  `user_id` int(10) unsigned NOT NULL,
  `hair` varchar(100) NOT NULL,
  `eyes` varchar(100) NOT NULL,
  `complexion` varchar(100) NOT NULL,
  `marks` varchar(200) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `blood_type` varchar(20) NOT NULL,
  `history` text NOT NULL,
  `allergies` text NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `health`
--

LOCK TABLES `health` WRITE;
/*!40000 ALTER TABLE `health` DISABLE KEYS */;
INSERT INTO `health` VALUES (89,'','','','','','','','','','','2014-11-21 08:39:54','0000-00-00 00:00:00'),(91,'','','','','','','','','','','2014-11-27 08:54:09','0000-00-00 00:00:00'),(107,'','','','','','','','','','','2014-12-06 17:12:54','0000-00-00 00:00:00'),(108,'','','','','','','','','','','2014-12-06 17:21:22','0000-00-00 00:00:00'),(109,'','','','','','','','','','','2014-12-06 17:27:06','0000-00-00 00:00:00'),(111,'','','','','','','','','','','2014-12-07 14:55:58','0000-00-00 00:00:00'),(112,'','','','','','','','','','','2014-12-07 15:01:59','0000-00-00 00:00:00'),(113,'','','','','','','','','','','2014-12-07 15:16:37','0000-00-00 00:00:00'),(114,'','','','','','','','','','','2014-12-07 15:24:19','0000-00-00 00:00:00'),(115,'','','','','','','','asdf','asdf','asdf','2014-12-17 06:18:54','2014-12-26 11:19:23');
/*!40000 ALTER TABLE `health` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `birthdate` datetime NOT NULL,
  `gender` int(10) unsigned NOT NULL,
  `language` text NOT NULL,
  `ethnicity` text NOT NULL,
  `race` text NOT NULL,
  `religion` text NOT NULL,
  `marital` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` int(3) NOT NULL,
  `location` int(10) unsigned NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Mr.','Jet Rico','Pollicar','Bañas','1990-06-07 00:00:00',1,'','','','','','P41-12, 6-11th Street, Villamor','','',0,0,14.5269243,121.0149097,'53b6190907626.jpeg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(3,'','rarepat','','rarepat','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(4,'','Ruel','','Minds','0000-00-00 00:00:00',1,'','','','','','','','',0,0,0,0,'539d9103c6de4.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(5,'','Jose','','Reyes','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'539d9103d3ad5.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(8,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,14.641809463501,121.022964477539,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(9,'2','','','','2014-02-11 00:00:00',0,'','','','','','here star','','',0,0,14.641809463501,121.022964477539,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(10,'2','','','','2014-02-11 00:00:00',1,'','','','','','Kuala Lumpur','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(11,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(12,'2','','','','2014-02-11 00:00:00',1,'','','','','','Cagayan de Oro City','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(13,'2','','','','2014-02-11 00:00:00',2,'','','','','','Aston Kiara 3 Jalan kiara, Kuala Lumpur','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(14,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(15,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(16,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(17,'Mr.','Ruel','','Minds','1980-02-14 00:00:00',1,'','','','','','#1 Ayala Avenue','','',0,0,14.5564882,121.0216932,'53b0ec9f9760c.jpeg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(18,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(19,'Mr.','Phillip','Wee','Ragudo','1965-12-22 00:00:00',1,'','','','','','Lot 20 Block 11 Oak St., Multinational Village','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(20,'2','','','','2014-02-11 00:00:00',1,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(21,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(22,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(23,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(24,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(25,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(26,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(27,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(28,'2','','','','2014-02-11 00:00:00',2,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(29,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(30,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(31,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(32,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(33,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(34,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(35,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(36,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(37,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(38,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(39,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(40,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(41,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(42,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(43,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(44,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(45,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(46,'2','','','','2014-02-11 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(47,'Mr.','John','','Pajarillo','1990-08-15 00:00:00',1,'','','','','','46 Kalakhan St., Calumpang','','',0,0,14.6133639,121.0861841,'53b4d54e5a805.jpeg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(48,'2','','','','0000-00-00 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(49,'2','Dont','','Wanna','1989-12-31 00:00:00',1,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(50,'2','','','','0000-00-00 00:00:00',0,'','','','','','','','',0,0,100,100,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(66,'asdf','raremonpat','asdf','raremonpat','0000-00-00 00:00:00',1,'','','','','','','','',0,0,0,0,'539d91045c737.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(67,'','raremon','pat','second','0000-00-00 00:00:00',1,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(68,'','Ruel','','Minds','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(71,'','Sunny','','Khiani','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(72,'','Abet','','Uson','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(73,'','Jose','','Santos','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(77,'','patient','','edmark','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(79,'Mr.','Baba','','Lams','1971-03-13 00:00:00',1,'','','','','','','','',0,0,0,0,'53be06ae51edc.jpeg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(80,'','RellmonPat','','PoncedeleonPat','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(82,'','liam','','parungao','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(84,'Mr.','Bryan Roy','','Mendoza','1990-06-20 00:00:00',1,'','','','','','P11-06 12th 5th Villamor','','',0,0,0,0,'53b4f0bf12348.jpeg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(86,'','Melchor Kenneth','','Mersado','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(87,'','','','','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-08-05 03:28:45','0000-00-00 00:00:00'),(89,'','Vilmer','','Morales','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-11-21 08:39:54','0000-00-00 00:00:00'),(91,'','asdfasdf','','lasdasdfds','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-11-27 08:54:09','0000-00-00 00:00:00'),(107,'','Test','','Ting','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-06 17:12:54','0000-00-00 00:00:00'),(108,'','Bon Ryan','','Benaojan','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-06 17:21:22','0000-00-00 00:00:00'),(109,'','Test','','Ting','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-06 17:27:06','0000-00-00 00:00:00'),(111,'','Bon Ryan','','Benaojan','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-07 14:55:58','0000-00-00 00:00:00'),(112,'','Bon Ryan','','Benaojan','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-07 15:01:59','0000-00-00 00:00:00'),(113,'','Bon Ryan','','Benaojan','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-07 15:16:37','0000-00-00 00:00:00'),(114,'','Bon Ryan','','Benaojan','0000-00-00 00:00:00',0,'','','','','','','','',0,0,0,0,'default.jpg','2014-12-07 15:24:19','0000-00-00 00:00:00'),(115,'Ms.','karlene','de jesus','abainza','1981-06-04 00:00:00',2,'','','','','','BFRV','Las Pinas','NCR',0,0,0,0,'default.jpg','2014-12-17 06:18:54','2014-12-26 09:07:53');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `user_id` int(10) unsigned NOT NULL,
  `setting_id` int(10) unsigned NOT NULL,
  `value` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verification`
--

DROP TABLE IF EXISTS `verification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verification` (
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(500) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verification`
--

LOCK TABLES `verification` WRITE;
/*!40000 ALTER TABLE `verification` DISABLE KEYS */;
INSERT INTO `verification` VALUES (89,'502aecf22bcdb218185eb6e828ea14b8',1,'2014-11-21 16:39:54','2014-11-21 08:40:53'),(91,'7982a7dac29af7afe12ae4b6abdd8793',0,'2014-11-27 16:54:09','2014-11-27 16:54:09'),(107,'8342dcb9bdf6f76c1de8c96a933c0df6',0,'2014-12-07 01:12:54','2014-12-07 01:12:54'),(108,'06a06b609ae07c7356d91ad4ba2ae521',0,'2014-12-07 01:21:22','2014-12-07 01:21:22'),(109,'76d082681308729e4dd1ffffee51e7dd',0,'2014-12-07 01:27:06','2014-12-07 01:27:06'),(111,'c3c633583b5d833eb209f17bc9e166ca',0,'2014-12-07 22:55:58','2014-12-07 22:55:58'),(112,'ff979747b07c5a4bb07cda23df6da9ac',0,'2014-12-07 23:01:59','2014-12-07 23:01:59'),(113,'d7215e5f3405f8077e862ac5151e057c',0,'2014-12-07 23:16:37','2014-12-07 23:16:37'),(114,'053ff644a604e161b0ac70d8fbe6c04e',0,'2014-12-07 23:24:19','2014-12-07 23:24:19'),(115,'acde5f2631251144fdd087a3ad24daa3',1,'2014-12-17 06:18:54','2014-12-17 06:20:02');
/*!40000 ALTER TABLE `verification` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-26 21:44:37
