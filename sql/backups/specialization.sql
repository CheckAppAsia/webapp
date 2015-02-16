# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.15)
# Database: checkapp
# Generation Time: 2014-07-24 01:29:53 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table physician_specialization
# ------------------------------------------------------------

DROP TABLE IF EXISTS `physician_specialization`;

CREATE TABLE `physician_specialization` (
  `physician_id` int(10) unsigned NOT NULL,
  `specialization_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`physician_id`,`specialization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table specialization
# ------------------------------------------------------------

DROP TABLE IF EXISTS `specialization`;

CREATE TABLE `specialization` (
  `specialization_id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `specialization` text NOT NULL,
  `active` int(1) unsigned DEFAULT '1',
  PRIMARY KEY (`specialization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `specialization` WRITE;
/*!40000 ALTER TABLE `specialization` DISABLE KEYS */;

INSERT INTO `specialization` (`specialization_id`, `specialization`, `active`)
VALUES
	(1,'Acupuncturist',1),
	(2,'Allergist',1),
	(3,'Anesthesiologist',1),
	(4,'Audiologist',1),
	(5,'Bariatric Physician',1),
	(6,'Cardiac Electrophysiologist',1),
	(7,'Cardiologist',1),
	(8,'Cardiothoracic Surgeon',1),
	(9,'Chiropractor',1),
	(10,'Colorectal Surgeon',1),
	(11,'Dentist',1),
	(12,'Dermatologist',1),
	(13,'Dietitian',1),
	(14,'Ear, Nose &amp; Throat Doctor',1),
	(15,'Emergency Medicine Physician',1),
	(16,'Endocrinologist',1),
	(17,'Endodontist',1),
	(18,'Family Physician',1),
	(19,'Gastroenterologist',1),
	(20,'Geneticist',1),
	(21,'Hand Surgeon',1),
	(22,'Hematologist',1),
	(23,'Immunologist',1),
	(24,'Infectious Disease Specialist',1),
	(25,'Internist',1),
	(26,'Medical Ethicist',1),
	(27,'Microbiologist',1),
	(28,'Midwife',1),
	(29,'Naturopathic Doctor',1),
	(30,'Nephrologist',1),
	(31,'Neurologist',1),
	(32,'Neuropsychiatrist',1),
	(33,'Neurosurgeon',1),
	(34,'Nurse Practitioner',1),
	(35,'Nutritionist',1),
	(36,'OB-GYN',1),
	(37,'Occupational Medicine Specialist',1),
	(38,'Oncologist',1),
	(39,'Ophthalmologist',1),
	(40,'Optometrist',1),
	(41,'Oral Surgeon',1),
	(42,'Orthodontist',1),
	(43,'Orthopedic Surgeon',1),
	(44,'Pain Management Specialist',1),
	(45,'Pathologist',1),
	(46,'Pediatric Dentist',1),
	(47,'Pediatrician',1),
	(48,'Periodontist',1),
	(49,'Physiatrist',1),
	(50,'Physical Therapist',1),
	(51,'Plastic Surgeon',1),
	(52,'Podiatrist',1),
	(53,'Preventive Medicine Specialist',1),
	(54,'Primary Care Doctor',1),
	(55,'Prosthodontist',1),
	(56,'Psychiatrist',1),
	(57,'Psychologist',1),
	(58,'Psychosomatic Medicine Specialist',1),
	(59,'Psychotherapist',1),
	(60,'Pulmonologist',1),
	(61,'Radiation Oncologist',1),
	(62,'Radiologist',1),
	(63,'Reproductive Endocrinologist',1),
	(64,'Rheumatologist',1),
	(65,'Sleep Medicine Specialist',1),
	(66,'Sports Medicine Specialist',1),
	(67,'Surgeon',1),
	(68,'Travel Medicine Specialist',1),
	(69,'Urgent Care Doctor',1),
	(70,'Urological Surgeon',1),
	(71,'Urologist',1),
	(72,'Vascular Surgeon',1);

/*!40000 ALTER TABLE `specialization` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
