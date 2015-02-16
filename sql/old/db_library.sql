CREATE TABLE `country` (
	`id` int(10) unsigned NOT NULL,
	`name` varchar(50) NOT NULL,
	`active` boolean NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `specialization` (
	`specialization_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`specialization` text NOT NULL,
	`active` int(10) unsigned DEFAULT '1',
	PRIMARY KEY (`specialization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `icd10_ph` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`description` varchar(255) NOT NULL,
	`code` varchar(10) NOT NULL,
	`remarks` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `icd10_who` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`description` varchar(255) NOT NULL,
	`code` varchar(10) NOT NULL,
	`remarks` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `medicines_ph` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`dr_no` varchar(20) NOT NULL,
	`generic_name` text NOT NULL,
	`strength` varchar(255) NOT NULL,
	`form` varchar(255) NOT NULL,
	`brand_name` varchar(255) NOT NULL,
	`company` varchar(255) NOT NULL,
	`type` varchar(20) NOT NULL,
	`version` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# ------------------------------------------------------------
# INITIAL VALUES
# ------------------------------------------------------------

INSERT INTO `specialization` (`specialization_id`, `specialization`, `active`) VALUES
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