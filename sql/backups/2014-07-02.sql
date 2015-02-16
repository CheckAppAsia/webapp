-- phpMyAdmin SQL Dump
-- version 4.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 02, 2014 at 08:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `checkapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `physician_id` int(10) unsigned NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `schedule` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `patient_note` text NOT NULL,
  `diagnosis` text NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `physician_id`, `patient_id`, `schedule`, `end_time`, `patient_note`, `diagnosis`, `status`, `created`, `updated`) VALUES
(19, 88, 106, '2014-06-06 12:30:00', '0000-00-00 00:00:00', '', 'dfsjljfkdalksj lksajdflksaj ', 1, '2014-06-07 01:49:41', '2014-06-07 01:49:41'),
(20, 2, 1, '2014-06-12 10:30:00', '0000-00-00 00:00:00', '', 'lel', 1, '2014-06-12 23:16:35', '2014-06-12 23:16:35'),
(21, 88, 106, '2014-06-14 16:00:00', '0000-00-00 00:00:00', '', 'love bug', 1, '2014-06-13 17:00:24', '2014-06-13 17:00:24'),
(22, 2, 1, '2014-06-15 16:30:00', '0000-00-00 00:00:00', 'HUEHUEHUE', 'wat', 1, '2014-06-15 22:12:52', '2014-06-15 10:13:38'),
(23, 2, 1, '2014-06-16 14:00:00', '0000-00-00 00:00:00', 'XD', 'niiiiii', 1, '2014-06-15 22:13:28', '2014-06-15 10:13:51'),
(24, 2, 1, '2014-06-16 13:30:00', '0000-00-00 00:00:00', 'ASDASDASD', '', 2, '2014-06-15 22:14:15', '2014-06-15 10:14:25'),
(25, 2, 1, '2014-06-18 10:30:00', '0000-00-00 00:00:00', '', '', 1, '2014-06-18 03:05:27', '2014-06-17 15:05:58'),
(26, 88, 106, '2014-06-27 20:00:00', '0000-00-00 00:00:00', '', '', 1, '2014-06-24 03:03:33', '2014-06-23 15:04:00'),
(27, 2, 1, '2014-06-27 16:00:00', '0000-00-00 00:00:00', 'a', '', 2, '2014-06-27 18:54:27', '2014-06-27 09:50:37'),
(28, 2, 1, '2014-06-27 16:00:00', '0000-00-00 00:00:00', '', '', 2, '2014-06-27 18:54:35', '2014-06-27 09:50:38'),
(29, 20, 1, '2014-06-27 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-06-27 18:56:07', '2014-06-27 18:56:07'),
(30, 2, 1, '2014-06-27 08:00:00', '0000-00-00 00:00:00', '', '', 2, '2014-06-27 20:34:30', '2014-06-27 09:50:40'),
(31, 2, 1, '2014-06-27 08:00:00', '0000-00-00 00:00:00', '', '', 2, '2014-06-27 20:34:37', '2014-06-27 09:50:41'),
(32, 2, 1, '2014-06-27 08:00:00', '0000-00-00 00:00:00', '', '', 2, '2014-06-27 20:34:50', '2014-06-27 09:50:42'),
(33, 2, 1, '2014-06-27 08:00:00', '0000-00-00 00:00:00', '', '', 2, '2014-06-27 20:34:57', '2014-06-27 09:50:43'),
(34, 2, 1, '2014-07-01 10:30:00', '0000-00-00 00:00:00', '', 'uheuhuehue', 1, '2014-06-27 20:35:07', '2014-06-27 10:22:23'),
(35, 2, 1, '2014-06-27 17:30:00', '0000-00-00 00:00:00', 'ABC', '', 1, '2014-06-27 21:46:40', '2014-06-27 09:50:24'),
(36, 2, 1, '2014-06-28 10:00:00', '0000-00-00 00:00:00', 'from profile', '', 1, '2014-06-27 21:46:55', '2014-06-27 09:50:19'),
(37, 2, 1, '2014-06-28 17:30:00', '0000-00-00 00:00:00', 'medical', '', 1, '2014-06-27 21:47:12', '2014-06-27 09:50:17'),
(38, 2, 1, '2014-06-29 08:00:00', '0000-00-00 00:00:00', 'COLLEAGUES', '', 1, '2014-06-27 21:47:27', '2014-06-27 09:50:15'),
(39, 2, 44, '2014-07-02 08:00:00', '0000-00-00 00:00:00', 'test', '', 1, '2014-06-30 17:22:27', '2014-06-30 17:16:44'),
(40, 2, 1, '2014-08-02 11:30:00', '0000-00-00 00:00:00', '', '', 1, '2014-07-01 05:12:11', '2014-06-30 17:16:22'),
(41, 88, 106, '2014-07-05 08:00:00', '0000-00-00 00:00:00', '', '', 1, '2014-07-01 15:21:24', '2014-07-01 03:21:53'),
(42, 88, 106, '2014-07-06 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 15:22:48', '2014-07-01 15:22:48'),
(43, 88, 106, '2014-07-06 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 15:22:48', '2014-07-01 15:22:48'),
(44, 131, 130, '2014-07-05 08:00:00', '0000-00-00 00:00:00', 'asdf', '', 2, '2014-07-01 16:00:23', '2014-07-01 04:02:10'),
(45, 2, 44, '2014-07-17 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 16:02:28', '2014-07-01 16:02:28'),
(46, 2, 44, '2014-07-17 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 16:02:28', '2014-07-01 16:02:28'),
(47, 2, 1, '2014-07-03 10:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 16:33:18', '2014-07-01 16:33:18'),
(48, 2, 1, '2014-07-03 10:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 16:33:18', '2014-07-01 16:33:18'),
(49, 2, 1, '2014-07-03 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 16:34:24', '2014-07-01 16:34:24'),
(50, 2, 1, '2014-07-03 08:00:00', '0000-00-00 00:00:00', '', '', 0, '2014-07-01 16:34:24', '2014-07-01 16:34:24'),
(51, 109, 44, '2014-07-10 23:00:00', '0000-00-00 00:00:00', 'Having frequent fever', '', 1, '2014-07-01 20:29:05', '2014-07-01 08:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_meds`
--

CREATE TABLE IF NOT EXISTS `appointment_meds` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` int(10) unsigned NOT NULL,
  `medicine` text NOT NULL,
  `notes` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointment_meds`
--

INSERT INTO `appointment_meds` (`id`, `appointment_id`, `medicine`, `notes`, `created`, `updated`) VALUES
(1, 34, 'Bonamine', 'take 5 tablets', '2014-06-27 10:22:23', '0000-00-00 00:00:00'),
(2, 34, 'Berocca', 'Dissolve on water', '2014-06-27 10:22:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_record`
--

CREATE TABLE IF NOT EXISTS `appointment_record` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `appointment_id` int(10) unsigned NOT NULL,
  `record` text NOT NULL,
  `notes` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointment_record`
--

INSERT INTO `appointment_record` (`id`, `appointment_id`, `record`, `notes`, `created`, `updated`) VALUES
(1, 34, 'X-ray', 'i think you need this', '2014-06-27 10:22:23', '0000-00-00 00:00:00'),
(2, 34, 'MRI', 'just checking', '2014-06-27 10:22:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `landline1` varchar(30) NOT NULL,
  `landline2` varchar(30) NOT NULL,
  `mobile1` varchar(30) NOT NULL,
  `mobile2` varchar(30) NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institution`
--

INSERT INTO `institution` (`id`, `name`, `description`, `address`, `landline1`, `landline2`, `mobile1`, `mobile2`, `coord_lat`, `coord_lng`, `profile_pic`, `updated`) VALUES
(27, 'Akashi Med. Co.', 'I''m Akashi, the only dedicated repair ship in the combined fleet. I was in charge of repairing ships damaged in the front lines when I was stationed in the Truk Anchorage. I supported the fleet from behind right up until the destruction of the Anchorage. Pleased to meet you.', 'Sukumo Bay', '778-34-56', '778-34-57', '09271234455', '009229876655', 100, 100, '', '2014-05-25 10:45:19');

-- --------------------------------------------------------

--
-- Table structure for table `institution_admin`
--

CREATE TABLE IF NOT EXISTS `institution_admin` (
  `user_id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institution_admin`
--

INSERT INTO `institution_admin` (`user_id`, `institution_id`) VALUES
(27, 27);

-- --------------------------------------------------------

--
-- Table structure for table `institution_labs`
--

CREATE TABLE IF NOT EXISTS `institution_labs` (
  `institution_id` int(10) unsigned NOT NULL,
  `record_type` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`institution_id`,`record_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institution_labs`
--

INSERT INTO `institution_labs` (`institution_id`, `record_type`, `created`) VALUES
(27, 1, '2014-05-27 09:13:23'),
(27, 2, '2014-05-27 09:13:23'),
(27, 3, '2014-05-27 09:13:23'),
(27, 4, '2014-05-27 09:13:23'),
(27, 8, '2014-05-27 09:13:23'),
(27, 9, '2014-05-27 09:13:23'),
(27, 15, '2014-05-27 09:13:23'),
(27, 17, '2014-05-27 09:13:23'),
(27, 18, '2014-05-27 09:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `institution_physicians`
--

CREATE TABLE IF NOT EXISTS `institution_physicians` (
  `institution_id` int(10) unsigned NOT NULL,
  `physician_id` int(10) unsigned NOT NULL,
  `approver_id` int(10) unsigned NOT NULL,
  `since` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `visible_name` varchar(100) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`institution_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `institution_physicians`
--

INSERT INTO `institution_physicians` (`institution_id`, `physician_id`, `approver_id`, `since`, `position`, `visible_name`, `status`, `created`, `updated`) VALUES
(27, 2, 27, '', 'Med Tech', '', 1, '2014-05-23 16:16:30', '0000-00-00 00:00:00'),
(27, 14, 27, '', '', '', 0, '2014-05-27 09:16:20', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `institution_services`
--

CREATE TABLE IF NOT EXISTS `institution_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `institution_id` int(10) unsigned NOT NULL,
  `name` varchar(200) CHARACTER SET latin1 NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `institution_services`
--

INSERT INTO `institution_services` (`id`, `institution_id`, `name`, `created`) VALUES
(1, 27, 'Hospital Admission', '2014-05-27 09:13:38'),
(2, 27, '24/7 Ambulance', '2014-05-27 09:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `patient_exams`
--

CREATE TABLE IF NOT EXISTS `patient_exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `contents` text NOT NULL,
  `date_taken` datetime NOT NULL,
  `attachment` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_health`
--

CREATE TABLE IF NOT EXISTS `patient_health` (
  `user_id` int(10) unsigned NOT NULL,
  `health_id` int(10) unsigned NOT NULL,
  `value` varchar(200) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`,`health_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_profile`
--

CREATE TABLE IF NOT EXISTS `patient_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `family_history` text NOT NULL,
  `known_allergies` text NOT NULL,
  `other` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_profile`
--

INSERT INTO `patient_profile` (`user_id`, `family_history`, `known_allergies`, `other`, `updated`) VALUES
(1, 'Q', 'W', 'E', '2014-06-30 09:32:33'),
(4, '', '', '', '0000-00-00 00:00:00'),
(5, '', '', '', '0000-00-00 00:00:00'),
(7, '', '', '', '0000-00-00 00:00:00'),
(8, '', '', '', '0000-00-00 00:00:00'),
(9, '', '', '', '0000-00-00 00:00:00'),
(10, '', '', '', '0000-00-00 00:00:00'),
(11, '', '', '', '0000-00-00 00:00:00'),
(12, '', '', '', '0000-00-00 00:00:00'),
(13, '', '', '', '0000-00-00 00:00:00'),
(15, '', '', '', '0000-00-00 00:00:00'),
(16, '', '', '', '2014-05-18 16:01:28'),
(17, '', '', '', '0000-00-00 00:00:00'),
(18, '', '', '', '0000-00-00 00:00:00'),
(30, '', '', '', '2014-03-05 14:21:09'),
(31, '', '', '', '0000-00-00 00:00:00'),
(32, '', '', '', '0000-00-00 00:00:00'),
(33, '', '', '', '0000-00-00 00:00:00'),
(34, '', '', '', '2013-12-15 17:25:09'),
(35, '', '', '', '0000-00-00 00:00:00'),
(36, '', '', '', '0000-00-00 00:00:00'),
(37, '', '', '', '2014-01-07 23:39:12'),
(38, '', '', '', '0000-00-00 00:00:00'),
(39, '', '', '', '2014-01-07 17:28:37'),
(40, '', '', '', '2014-01-07 08:30:16'),
(41, '', '', '', '0000-00-00 00:00:00'),
(42, '', '', '', '0000-00-00 00:00:00'),
(43, '', '', '', '0000-00-00 00:00:00'),
(44, '', '', '', '0000-00-00 00:00:00'),
(45, '', '', '', '0000-00-00 00:00:00'),
(46, '', '', '', '0000-00-00 00:00:00'),
(47, '', '', '', '2014-01-07 17:12:15'),
(48, '', '', '', '0000-00-00 00:00:00'),
(49, '', '', '', '0000-00-00 00:00:00'),
(50, '', '', '', '0000-00-00 00:00:00'),
(51, '', '', '', '0000-00-00 00:00:00'),
(52, '', '', '', '0000-00-00 00:00:00'),
(53, '', '', '', '0000-00-00 00:00:00'),
(54, '', '', '', '0000-00-00 00:00:00'),
(55, '', '', '', '2014-01-09 16:27:24'),
(56, '', '', '', '2014-01-09 20:50:16'),
(57, '', '', '', '0000-00-00 00:00:00'),
(58, '', '', '', '0000-00-00 00:00:00'),
(59, '', '', '', '0000-00-00 00:00:00'),
(60, '', '', '', '0000-00-00 00:00:00'),
(61, '', '', '', '0000-00-00 00:00:00'),
(62, '', '', '', '0000-00-00 00:00:00'),
(63, '', '', '', '0000-00-00 00:00:00'),
(64, '', '', '', '0000-00-00 00:00:00'),
(65, '', '', '', '0000-00-00 00:00:00'),
(66, '', '', '', '0000-00-00 00:00:00'),
(67, '', '', '', '0000-00-00 00:00:00'),
(68, '', '', '', '0000-00-00 00:00:00'),
(69, '', '', '', '0000-00-00 00:00:00'),
(70, '', '', '', '0000-00-00 00:00:00'),
(71, '', '', '', '0000-00-00 00:00:00'),
(72, '', '', '', '0000-00-00 00:00:00'),
(73, '', '', '', '0000-00-00 00:00:00'),
(74, '', '', '', '0000-00-00 00:00:00'),
(75, '', '', '', '0000-00-00 00:00:00'),
(76, '', '', '', '0000-00-00 00:00:00'),
(77, '', '', '', '0000-00-00 00:00:00'),
(78, '', '', '', '0000-00-00 00:00:00'),
(79, '', '', '', '2014-03-06 04:45:24'),
(80, '', '', '', '0000-00-00 00:00:00'),
(81, '', '', '', '0000-00-00 00:00:00'),
(82, '', '', '', '0000-00-00 00:00:00'),
(83, '', '', '', '0000-00-00 00:00:00'),
(106, '', '', '', '0000-00-00 00:00:00'),
(107, '', '', '', '0000-00-00 00:00:00'),
(108, '', '', '', '0000-00-00 00:00:00'),
(111, '', '', '', '0000-00-00 00:00:00'),
(112, '', '', '', '0000-00-00 00:00:00'),
(118, '', '', '', '0000-00-00 00:00:00'),
(120, '', '', '', '0000-00-00 00:00:00'),
(121, '', '', '', '0000-00-00 00:00:00'),
(126, '', '', '', '0000-00-00 00:00:00'),
(127, '', '', '', '0000-00-00 00:00:00'),
(129, '', '', '', '0000-00-00 00:00:00'),
(130, '', '', '', '0000-00-00 00:00:00'),
(132, '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `physician_clinic`
--

CREATE TABLE IF NOT EXISTS `physician_clinic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `physician_id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `num_landline` varchar(30) NOT NULL,
  `num_phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `physician_clinic_labs`
--

CREATE TABLE IF NOT EXISTS `physician_clinic_labs` (
  `clinic_id` int(10) unsigned NOT NULL,
  `record_type` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`clinic_id`,`record_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `physician_documents`
--

CREATE TABLE IF NOT EXISTS `physician_documents` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `physician_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `physician_documents`
--

INSERT INTO `physician_documents` (`id`, `physician_id`, `type`, `file`, `status`, `created`, `updated`) VALUES
(1, 88, 1, '53ad152041b64.jpeg', 0, '2014-06-27 06:54:24', '0000-00-00 00:00:00'),
(2, 2, 1, '', 1, '2014-06-27 09:43:05', '0000-00-00 00:00:00'),
(3, 19, 1, '53b22fcd8be6b.jpeg', 0, '2014-07-01 03:49:33', '0000-00-00 00:00:00'),
(4, 6, 1, '53b25f2812041.jpeg', 0, '2014-07-01 07:11:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `physician_patients`
--

CREATE TABLE IF NOT EXISTS `physician_patients` (
  `physician_id` int(10) unsigned NOT NULL,
  `patient_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`physician_id`,`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physician_patients`
--

INSERT INTO `physician_patients` (`physician_id`, `patient_id`, `created`) VALUES
(2, 1, '2014-06-30 17:16:22'),
(2, 44, '2014-06-30 17:16:44'),
(88, 106, '2014-07-01 03:21:53'),
(109, 44, '2014-07-01 08:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `physician_profile`
--

CREATE TABLE IF NOT EXISTS `physician_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `about` text NOT NULL,
  `specializations` text NOT NULL,
  `license_no` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `physician_profile`
--

INSERT INTO `physician_profile` (`user_id`, `about`, `specializations`, `license_no`, `updated`) VALUES
(2, 'd', 'e', 'F', '2014-06-30 09:33:17'),
(3, '', '', '', '0000-00-00 00:00:00'),
(6, 'Cook', 'Cook', 'Coook', '2014-07-01 07:12:20'),
(14, '', '', '', '0000-00-00 00:00:00'),
(19, 'You clearly don''t know who you''re talking to, so let me clue you in: I am not in danger. I am the danger. A guy opens his door and gets shot, and you think that of me? No! I am the one who knocks!', 'X-ray crystallography', '332697-6201', '2014-07-01 10:51:35'),
(20, '', '', '', '0000-00-00 00:00:00'),
(21, '', '', '', '0000-00-00 00:00:00'),
(22, '', '', '', '0000-00-00 00:00:00'),
(23, '', '', '', '0000-00-00 00:00:00'),
(24, '', '', '', '0000-00-00 00:00:00'),
(25, '', '', '', '0000-00-00 00:00:00'),
(26, '', '', '', '0000-00-00 00:00:00'),
(27, '', '', '', '0000-00-00 00:00:00'),
(84, '', '', '', '0000-00-00 00:00:00'),
(85, '', '', '', '0000-00-00 00:00:00'),
(86, '', '', '', '0000-00-00 00:00:00'),
(87, '', '', '', '0000-00-00 00:00:00'),
(88, 'sadfas asf', 'asdfasd', 'asdfasdf', '2014-06-02 15:31:35'),
(89, '', '', '', '0000-00-00 00:00:00'),
(90, '', '', '', '0000-00-00 00:00:00'),
(91, '', '', '', '0000-00-00 00:00:00'),
(92, '', '', '', '0000-00-00 00:00:00'),
(93, '', '', '', '0000-00-00 00:00:00'),
(94, '', '', '', '0000-00-00 00:00:00'),
(95, '', '', '', '0000-00-00 00:00:00'),
(96, '', '', '', '0000-00-00 00:00:00'),
(97, '', '', '', '0000-00-00 00:00:00'),
(98, '', '', '', '0000-00-00 00:00:00'),
(99, '', '', '', '0000-00-00 00:00:00'),
(100, '', '', '', '0000-00-00 00:00:00'),
(101, '', '', '', '0000-00-00 00:00:00'),
(102, '', '', '', '0000-00-00 00:00:00'),
(103, '', '', '', '0000-00-00 00:00:00'),
(104, '', '', '', '0000-00-00 00:00:00'),
(105, '', '', '', '0000-00-00 00:00:00'),
(109, 'I''m a young doctor specialize in Family Medicine', 'Family Medicine', '0123456789', '2014-07-01 08:06:47'),
(110, '', '', '', '0000-00-00 00:00:00'),
(113, '', '', '', '0000-00-00 00:00:00'),
(114, '', '', '', '0000-00-00 00:00:00'),
(115, '', '', '', '0000-00-00 00:00:00'),
(116, '', '', '', '0000-00-00 00:00:00'),
(117, '', '', '', '0000-00-00 00:00:00'),
(119, '', '', '', '0000-00-00 00:00:00'),
(122, '', '', '', '0000-00-00 00:00:00'),
(125, 'f', 'f', 'f', '2014-06-30 04:49:49'),
(128, '', '', '', '0000-00-00 00:00:00'),
(131, '', '', '', '0000-00-00 00:00:00'),
(133, '', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `physician_school`
--

CREATE TABLE IF NOT EXISTS `physician_school` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `course` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `year_start` varchar(4) NOT NULL,
  `year_end` varchar(4) NOT NULL,
  `comments` text NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `physician_school`
--

INSERT INTO `physician_school` (`id`, `user_id`, `course`, `school_name`, `year_start`, `year_end`, `comments`, `updated`, `created`) VALUES
(1, 2, 'Medicine', 'UST', '2001', '2009', 'uehuehuehue', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `physician_secretary`
--

CREATE TABLE IF NOT EXISTS `physician_secretary` (
  `user_id` int(10) unsigned NOT NULL,
  `physician_id` int(10) unsigned NOT NULL,
  `clinic_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `physician_settings`
--

CREATE TABLE IF NOT EXISTS `physician_settings` (
  `physician_id` int(10) unsigned NOT NULL,
  `avail_sun` tinyint(1) NOT NULL,
  `avail_mon` tinyint(1) NOT NULL,
  `avail_tue` tinyint(1) NOT NULL,
  `avail_wed` tinyint(1) NOT NULL,
  `avail_thu` tinyint(1) NOT NULL,
  `avail_fri` tinyint(1) NOT NULL,
  `avail_sat` tinyint(1) NOT NULL,
  `hour_start` int(10) unsigned NOT NULL,
  `hour_end` int(10) unsigned NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `target_type` int(10) unsigned NOT NULL,
  `target_id` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `attach_type` int(10) unsigned NOT NULL,
  `attach_data` text NOT NULL,
  `privacy` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `target_type`, `target_id`, `message`, `attach_type`, `attach_data`, `privacy`, `created`, `updated`) VALUES
(1, 5, 0, 0, 'test!', 0, '', 0, '2014-05-15 05:43:28', '0000-00-00 00:00:00'),
(2, 6, 0, 0, 'Hi everyone! :D', 0, '', 0, '2014-05-15 05:46:17', '0000-00-00 00:00:00'),
(3, 6, 0, 0, 'Hello there. XD', 0, '', 0, '2014-05-15 05:48:15', '0000-00-00 00:00:00'),
(4, 6, 0, 0, 'hohoho', 0, '', 0, '2014-05-15 05:48:39', '0000-00-00 00:00:00'),
(5, 1, 0, 0, 'hue hue hue', 0, '', 0, '2014-05-15 05:54:33', '0000-00-00 00:00:00'),
(6, 1, 0, 0, 'yyo', 0, '', 0, '2014-05-15 05:54:51', '0000-00-00 00:00:00'),
(7, 17, 0, 0, 'test', 0, '', 0, '2014-05-16 05:58:21', '0000-00-00 00:00:00'),
(8, 19, 0, 0, '...', 0, '', 0, '2014-05-16 06:04:14', '0000-00-00 00:00:00'),
(9, 19, 0, 0, 'I have some crystals, do you want an ounce?', 0, '', 0, '2014-05-16 06:08:37', '0000-00-00 00:00:00'),
(10, 1, 0, 0, 'POST hue hue hue', 0, '', 0, '2014-05-22 05:19:48', '0000-00-00 00:00:00'),
(11, 1, 0, 0, 'POST just now', 0, '', 0, '2014-05-22 05:20:15', '0000-00-00 00:00:00'),
(12, 1, 0, 0, 'MMD', 0, '', 0, '2014-05-22 05:42:32', '0000-00-00 00:00:00'),
(13, 9, 0, 0, 'test', 0, '', 0, '2014-05-22 14:28:22', '0000-00-00 00:00:00'),
(14, 1, 0, 0, 'test post', 0, '', 0, '2014-05-23 13:54:29', '0000-00-00 00:00:00'),
(15, 1, 1, 2, 'hi', 0, '', 0, '2014-05-23 13:55:04', '0000-00-00 00:00:00'),
(16, 27, 0, 0, 'Greetings! this is the Yamato Medical Center :)', 0, '', 0, '2014-05-23 14:40:58', '0000-00-00 00:00:00'),
(17, 27, 0, 0, 'we''re introducing new laboratory equipment', 0, '', 0, '2014-05-23 14:56:34', '0000-00-00 00:00:00'),
(18, 27, 0, 0, 'Lat-shiki Rin', 1, 'post_27_537f6a7126102.jpg', 0, '2014-05-23 15:34:09', '0000-00-00 00:00:00'),
(19, 27, 0, 0, 'VIDEO ATTACHMENT!', 2, 'post_27_537f6c5e9dfda.mp4', 0, '2014-05-23 15:42:22', '0000-00-00 00:00:00'),
(21, 27, 0, 0, 'external link :P', 3, 'https://www.youtube.com/watch?v=x_s186eboi0', 0, '2014-05-23 16:05:23', '0000-00-00 00:00:00'),
(22, 86, 0, 0, 'test', 0, '', 0, '2014-05-24 02:11:05', '0000-00-00 00:00:00'),
(24, 88, 0, 0, 'testign tseting', 0, '', 0, '2014-05-29 05:39:24', '0000-00-00 00:00:00'),
(25, 88, 0, 0, 'testing testing', 0, '', 0, '2014-05-29 05:40:16', '0000-00-00 00:00:00'),
(26, 88, 0, 0, 'testing google', 3, 'http://google.com', 0, '2014-05-29 05:40:58', '0000-00-00 00:00:00'),
(27, 107, 0, 0, 'dev raremon pat2', 0, '', 0, '2014-05-29 06:22:46', '0000-00-00 00:00:00'),
(28, 108, 0, 0, 'this is sa sample test', 0, '', 0, '2014-05-29 09:42:19', '0000-00-00 00:00:00'),
(29, 108, 0, 0, '', 1, 'post_108_53870131ab318.png', 0, '2014-05-29 09:43:13', '0000-00-00 00:00:00'),
(30, 110, 0, 0, 'this doctor sample post', 0, '', 0, '2014-05-29 09:45:16', '0000-00-00 00:00:00'),
(31, 1, 0, 0, 'test photo', 0, '', 0, '2014-05-29 15:02:01', '0000-00-00 00:00:00'),
(32, 1, 0, 0, 'photo from timeline', 1, 'post_1_53874c8c9ab5d.png', 0, '2014-05-29 15:04:44', '0000-00-00 00:00:00'),
(33, 1, 0, 0, 'photof rom newsfeed', 0, '', 0, '2014-05-29 15:05:08', '0000-00-00 00:00:00'),
(34, 111, 0, 0, 'lala\n', 0, '', 0, '2014-05-30 16:41:17', '0000-00-00 00:00:00'),
(35, 111, 0, 0, 'what the fuck ???\n', 0, '', 0, '2014-05-30 16:41:27', '0000-00-00 00:00:00'),
(36, 112, 0, 0, 'testestesting', 0, '', 0, '2014-06-02 14:27:40', '0000-00-00 00:00:00'),
(37, 88, 0, 0, 'fasdfas', 0, '', 0, '2014-06-02 14:41:58', '0000-00-00 00:00:00'),
(38, 88, 0, 0, 'testjgasd fads;lkfj', 0, '', 0, '2014-06-03 12:55:04', '0000-00-00 00:00:00'),
(40, 106, 0, 0, 'asdfasdfas sa fsa', 1, 'post_106_5391c7b02e188.jpg', 0, '2014-06-06 13:52:48', '0000-00-00 00:00:00'),
(41, 1, 0, 0, 'ENTERPRISE CV-6', 1, 'post_1_539d97b77c8c0.jpg', 0, '2014-06-15 12:55:19', '0000-00-00 00:00:00'),
(42, 1, 0, 0, 'Vocaloid... Neru...', 3, '{"title":"\\u3010MMD\\u3011Dream Fighter Lat Model\\u3010HD720p\\u3011","desc":"\\u30cb\\u30b3\\u30cb\\u30b3\\u306e\\u4e00\\u90e8\\u4fee\\u6b63\\u7248 niconico video \\u3010MMD\\u3011\\u3046\\u3061\\u306eLat\\u5f0f\\u3055\\u3093\\u9054\\u304cDream Fighter\\u3092\\u8e0a\\u3063\\u3066\\u304f\\u308c\\u305f http:\\/\\/www.nicovideo.jp\\/watch\\/sm15578117 Blue(twin tail) :Hatsune Miku (\\u521d\\u97f3\\u30df\\u30af) Yellow(short) :K...","image":"https:\\/\\/i1.ytimg.com\\/vi\\/Fc0Ae3i8nEQ\\/maxresdefault.jpg","url":"http:\\/\\/www.youtube.com\\/watch?v=Fc0Ae3i8nEQ"}', 0, '2014-06-18 14:53:44', '2014-06-18 14:53:44'),
(43, 7, 0, 0, 'test', 0, '', 0, '2014-06-24 09:48:18', '0000-00-00 00:00:00'),
(44, 106, 0, 0, 'asdf', 0, '', 0, '2014-06-25 02:48:27', '0000-00-00 00:00:00'),
(45, 106, 0, 0, 'asdf', 3, '{"title":"","desc":"","image":"","url":""}', 0, '2014-06-25 02:48:39', '0000-00-00 00:00:00'),
(47, 7, 0, 0, 'asdasdasdasdas', 0, '', 0, '2014-06-27 08:57:55', '0000-00-00 00:00:00'),
(52, 44, 1, 7, 'test', 0, '', 0, '2014-07-01 03:59:16', '0000-00-00 00:00:00'),
(53, 130, 0, 0, 'testing', 0, '', 0, '2014-07-01 04:05:18', '0000-00-00 00:00:00'),
(54, 19, 0, 0, 'Who wants some glass?!  >:-)', 1, 'post_53b23458b752c.jpeg', 0, '2014-07-01 04:08:57', '0000-00-00 00:00:00'),
(55, 6, 1, 19, 'do you have some more of that blue sky, that you are making?', 0, '', 0, '2014-07-01 07:04:00', '0000-00-00 00:00:00'),
(56, 109, 0, 0, 'GE Healthcare’s New Discovery IQ PET/CT Scanner Sports New Detector for Greatest Sensitivity and Coverage.\n\nGE Healthcare has announced its new Discovery IQ PET/CT scanner. The system offers the greatest sensitivity (up to 22 cps/kBq) and the largest axial field-of-view (up to 26 cm) of any available PET/CT device. This should allow radiologists to visualize smaller lesions while delivering smaller radiation doses.\n\nThe system is powered by the new GE LightBurst PET detector that the company promises can perform scans at half the dose and in half the time compared to conventional systems. The system can correct for motion, as when performing visualization of the thoracic cavity.', 1, 'post_53b26cc91cd59.jpeg', 0, '2014-07-01 08:09:45', '0000-00-00 00:00:00'),
(58, 19, 1, 6, 'still want some glass?', 0, '', 0, '2014-07-02 07:55:14', '0000-00-00 00:00:00'),
(59, 6, 1, 19, 'dude, 150 is too much. how bout 1G for 15', 0, '', 0, '2014-07-02 08:24:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE IF NOT EXISTS `post_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`id`, `post_id`, `user_id`, `message`, `created`, `updated`) VALUES
(1, 2, 6, 'I''m talking to myself. :<', '2014-05-15 05:46:41', '0000-00-00 00:00:00'),
(2, 2, 6, 'I''m like getting crazy over here. :<', '2014-05-15 05:47:03', '0000-00-00 00:00:00'),
(3, 2, 6, 'need a psych, ASAP! :<', '2014-05-15 05:47:17', '0000-00-00 00:00:00'),
(4, 3, 1, 'XD XD', '2014-05-15 05:55:13', '0000-00-00 00:00:00'),
(5, 3, 1, 'pag nag-comment ako sa post ng iba to a wall ng iba, nagre-redirect to my own timline', '2014-05-15 05:56:04', '0000-00-00 00:00:00'),
(6, 9, 1, 'hi walt :P', '2014-05-22 03:16:24', '0000-00-00 00:00:00'),
(7, 2, 1, 'yo yo yo', '2014-05-22 03:16:38', '0000-00-00 00:00:00'),
(8, 11, 1, 'test comment', '2014-05-22 05:20:32', '0000-00-00 00:00:00'),
(9, 11, 1, 'test 2', '2014-05-22 05:41:33', '0000-00-00 00:00:00'),
(10, 12, 26, 'eeh~', '2014-05-22 05:44:10', '0000-00-00 00:00:00'),
(11, 12, 2, 'who are you anon?', '2014-05-22 05:45:04', '0000-00-00 00:00:00'),
(12, 4, 2, 'hue hue hue', '2014-05-22 05:47:17', '0000-00-00 00:00:00'),
(13, 13, 1, 'test comment', '2014-05-23 13:54:21', '0000-00-00 00:00:00'),
(14, 16, 1, 'welcome to the community yamato :P', '2014-05-23 14:47:12', '0000-00-00 00:00:00'),
(15, 16, 2, 'hi yama-jii', '2014-05-23 14:48:03', '0000-00-00 00:00:00'),
(16, 16, 2, 'hush you two. I''m supposed to be a hospital here', '2014-05-23 14:53:04', '0000-00-00 00:00:00'),
(17, 16, 27, 'I''m pretty sure I was supposed to say that', '2014-05-23 14:53:26', '0000-00-00 00:00:00'),
(18, 17, 27, 'hey I attached a photo, where is it?', '2014-05-23 14:57:15', '0000-00-00 00:00:00'),
(19, 17, 2, 'ah sorry yama-ji, let me check on it', '2014-05-23 14:57:47', '0000-00-00 00:00:00'),
(20, 19, 1, 'kumano ftw', '2014-05-23 15:56:57', '0000-00-00 00:00:00'),
(21, 18, 1, 'lat-shikis doesnt come with a groove bone built-in.', '2014-05-23 15:57:43', '0000-00-00 00:00:00'),
(22, 18, 2, 'don''t*', '2014-05-23 15:58:08', '0000-00-00 00:00:00'),
(23, 11, 2, 'view all comments doesn''t work.', '2014-05-23 15:59:18', '0000-00-00 00:00:00'),
(24, 18, 1, 'Ru is a grammar nazi >_<', '2014-05-26 01:46:05', '0000-00-00 00:00:00'),
(25, 21, 86, 'test', '2014-05-27 08:54:37', '0000-00-00 00:00:00'),
(26, 26, 88, 'buwahahaha', '2014-05-29 05:41:33', '0000-00-00 00:00:00'),
(27, 26, 88, 'lalala', '2014-05-29 05:41:37', '0000-00-00 00:00:00'),
(28, 27, 106, 'asdf asdf', '2014-05-29 06:23:05', '0000-00-00 00:00:00'),
(29, 37, 88, 'asdfasdf asdfasdf', '2014-06-02 15:32:07', '0000-00-00 00:00:00'),
(30, 42, 1, 'test comment', '2014-06-18 14:52:49', '0000-00-00 00:00:00'),
(31, 50, 44, 'test', '2014-07-01 04:06:44', '0000-00-00 00:00:00'),
(32, 53, 130, 'test uli', '2014-07-01 04:08:04', '0000-00-00 00:00:00'),
(33, 54, 6, 'how much per ounce?', '2014-07-01 07:03:04', '0000-00-00 00:00:00'),
(34, 54, 19, '150', '2014-07-02 07:53:37', '0000-00-00 00:00:00'),
(35, 54, 6, '150? how about 90?', '2014-07-02 08:22:38', '0000-00-00 00:00:00'),
(36, 55, 6, 'i can give you 90 for an ounce', '2014-07-02 08:23:31', '0000-00-00 00:00:00'),
(37, 59, 19, 'my product is the purest you can find on the market, take it, or leave it. 150 an ounce, last price', '2014-07-02 08:27:39', '0000-00-00 00:00:00'),
(38, 59, 6, 'fine, whatever man. get me a pound, i''ll get you your cash', '2014-07-02 08:28:36', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE IF NOT EXISTS `post_like` (
  `post_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`post_id`, `user_id`, `created`) VALUES
(42, 1, '2014-06-18 14:53:27'),
(50, 44, '2014-07-01 04:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire`
--

CREATE TABLE IF NOT EXISTS `questionnaire` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `physician_id` int(10) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `questionnaire`
--

INSERT INTO `questionnaire` (`id`, `physician_id`, `name`, `type`, `created`, `updated`) VALUES
(1, 2, 'Default Questionnaire for Physician #2', 0, '2014-06-19 17:37:09', '0000-00-00 00:00:00'),
(6, 86, 'Default Questionnaire for Physician #86', 0, '2014-06-20 10:44:43', '0000-00-00 00:00:00'),
(7, 109, 'Default Questionnaire for Physician #109', 0, '2014-06-30 15:08:16', '0000-00-00 00:00:00'),
(8, 19, 'Default Questionnaire for Physician #19', 0, '2014-07-01 04:05:00', '0000-00-00 00:00:00'),
(9, 88, 'Default Questionnaire for Physician #88', 0, '2014-07-01 14:45:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_answer`
--

CREATE TABLE IF NOT EXISTS `questionnaire_answer` (
  `user_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `answer` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_item`
--

CREATE TABLE IF NOT EXISTS `questionnaire_item` (
  `questionnaire_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`questionnaire_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questionnaire_item`
--

INSERT INTO `questionnaire_item` (`questionnaire_id`, `question_id`) VALUES
(1, 46),
(1, 47),
(1, 48),
(1, 49),
(1, 50),
(1, 51),
(1, 52),
(1, 53),
(1, 54),
(8, 55);

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_question`
--

CREATE TABLE IF NOT EXISTS `questionnaire_question` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `isDefault` tinyint(1) NOT NULL,
  `question` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `questionnaire_question`
--

INSERT INTO `questionnaire_question` (`id`, `type`, `isDefault`, `question`, `created`) VALUES
(1, 1, 0, 'what?', '2014-06-19 17:46:33'),
(2, 2, 0, 'who?', '2014-06-19 17:46:33'),
(3, 1, 0, 'why?', '2014-06-19 17:46:33'),
(4, 2, 0, 'where?', '2014-06-19 17:46:33'),
(5, 1, 0, 'when?', '2014-06-19 17:46:33'),
(6, 2, 0, 'how?', '2014-06-19 17:46:33'),
(7, 1, 0, 'eh??', '2014-06-19 17:46:33'),
(8, 2, 0, '[removed]alert&#40;1&#41;;[removed]', '2014-06-19 17:46:33'),
(9, 1, 0, '!@#$%^&*()-=_+[]{}''\\"|,./<>?南西諸島海域', '2014-06-19 17:46:33'),
(10, 1, 0, 'what?', '2014-07-01 04:41:09'),
(11, 2, 0, 'who?', '2014-07-01 04:41:09'),
(12, 1, 0, 'why?', '2014-07-01 04:41:09'),
(13, 2, 0, 'where?', '2014-07-01 04:41:09'),
(14, 1, 0, 'when?', '2014-07-01 04:41:09'),
(15, 2, 0, 'how?', '2014-07-01 04:41:09'),
(16, 1, 0, 'eh??', '2014-07-01 04:41:09'),
(17, 2, 0, '[removed]alert&#40;1&#41;;[removed]', '2014-07-01 04:41:09'),
(18, 1, 0, 'a', '2014-07-01 04:41:09'),
(19, 1, 0, 'what?', '2014-07-01 04:41:22'),
(20, 2, 0, 'who?', '2014-07-01 04:41:22'),
(21, 1, 0, 'why?', '2014-07-01 04:41:22'),
(22, 2, 0, 'where?', '2014-07-01 04:41:22'),
(23, 1, 0, 'when?', '2014-07-01 04:41:22'),
(24, 2, 0, 'how?', '2014-07-01 04:41:22'),
(25, 1, 0, 'eh??', '2014-07-01 04:41:22'),
(26, 2, 0, '[removed]alert&#40;1&#41;;[removed]', '2014-07-01 04:41:22'),
(27, 1, 0, 'a>11111', '2014-07-01 04:41:22'),
(28, 1, 0, 'what?', '2014-07-01 04:41:26'),
(29, 2, 0, 'who?', '2014-07-01 04:41:26'),
(30, 1, 0, 'why?', '2014-07-01 04:41:26'),
(31, 2, 0, 'where?', '2014-07-01 04:41:26'),
(32, 1, 0, 'when?', '2014-07-01 04:41:26'),
(33, 2, 0, 'how?', '2014-07-01 04:41:26'),
(34, 1, 0, 'eh??', '2014-07-01 04:41:26'),
(35, 2, 0, '[removed]alert&#40;1&#41;;[removed]', '2014-07-01 04:41:26'),
(36, 1, 0, 'a">11111', '2014-07-01 04:41:26'),
(37, 1, 0, 'what?', '2014-07-01 04:41:37'),
(38, 2, 0, 'who?', '2014-07-01 04:41:37'),
(39, 1, 0, 'why?', '2014-07-01 04:41:37'),
(40, 2, 0, 'where?', '2014-07-01 04:41:37'),
(41, 1, 0, 'when?', '2014-07-01 04:41:37'),
(42, 2, 0, 'how?', '2014-07-01 04:41:37'),
(43, 1, 0, 'eh??', '2014-07-01 04:41:37'),
(44, 2, 0, '[removed]alert&#40;1&#41;;[removed]', '2014-07-01 04:41:37'),
(45, 1, 0, 'gf', '2014-07-01 04:41:37'),
(46, 1, 0, 'what?', '2014-07-01 04:41:42'),
(47, 2, 0, 'who?', '2014-07-01 04:41:42'),
(48, 1, 0, 'why?', '2014-07-01 04:41:42'),
(49, 2, 0, 'where?', '2014-07-01 04:41:42'),
(50, 1, 0, 'when?', '2014-07-01 04:41:42'),
(51, 2, 0, 'how?', '2014-07-01 04:41:42'),
(52, 1, 0, 'eh??', '2014-07-01 04:41:42'),
(53, 2, 0, '[removed]alert&#40;1&#41;;[removed]', '2014-07-01 04:41:42'),
(54, 1, 0, 'asd', '2014-07-01 04:41:42'),
(55, 1, 0, 'How much do you earn on a monthly basis?', '2014-07-02 07:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `user_id_1` int(10) unsigned NOT NULL,
  `user_id_2` int(10) unsigned NOT NULL,
  `subject` text NOT NULL,
  `user_read_1` int(11) NOT NULL,
  `user_read_2` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `thread`
--

INSERT INTO `thread` (`id`, `type`, `type_id`, `user_id_1`, `user_id_2`, `subject`, `user_read_1`, `user_read_2`, `created`, `updated`) VALUES
(1, 1, 1, 6, 5, 'hello', 0, 0, '2014-05-15 05:49:10', '2014-05-15 05:49:10'),
(2, 1, 1, 6, 3, 'Herrro', 1, 0, '2014-05-16 05:57:59', '2014-05-16 05:57:59'),
(3, 1, 1, 88, 105, 'test', 1, 1, '2014-05-29 06:03:48', '2014-05-29 06:03:48'),
(4, 1, 1, 106, 107, 'testing uli', 1, 1, '2014-05-29 06:22:08', '2014-05-29 06:22:08'),
(5, 1, 1, 106, 88, 'raremons raredmson', 1, 1, '2014-05-29 06:32:39', '2014-05-29 06:32:39'),
(6, 1, 1, 1, 10, 'test', 1, 0, '2014-05-30 03:53:41', '0000-00-00 00:00:00'),
(7, 1, 1, 6, 2, 'pa check up naman', 1, 0, '2014-06-04 05:53:08', '0000-00-00 00:00:00'),
(8, 1, 1, 6, 2, 'dasd', 1, 1, '2014-06-27 11:30:27', '2014-06-27 11:30:27'),
(9, 1, 1, 44, 74, 'test', 1, 0, '2014-06-26 04:46:27', '0000-00-00 00:00:00'),
(10, 1, 1, 19, 1, 'the bomb', 1, 0, '2014-07-01 04:11:50', '0000-00-00 00:00:00'),
(11, 1, 1, 19, 6, 'meth', 1, 0, '2014-07-01 06:23:16', '0000-00-00 00:00:00'),
(12, 1, 1, 88, 106, 'testing testing', 1, 1, '2014-07-01 16:20:34', '2014-07-01 16:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `thread_message`
--

CREATE TABLE IF NOT EXISTS `thread_message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) unsigned NOT NULL,
  `user_from` int(10) unsigned NOT NULL,
  `user_to` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `thread_message`
--

INSERT INTO `thread_message` (`id`, `thread_id`, `user_from`, `user_to`, `message`, `status`, `created`) VALUES
(1, 1, 6, 5, 'hahahahahha', 0, '2014-05-15 05:49:10'),
(2, 1, 6, 6, 'herro. XD', 0, '2014-05-15 05:49:23'),
(3, 2, 6, 3, 'Herro there. XD', 0, '2014-05-15 05:50:03'),
(4, 3, 88, 105, 'test', 0, '2014-05-29 06:03:26'),
(5, 3, 105, 88, '', 0, '2014-05-29 06:04:40'),
(6, 3, 105, 88, 'asdfasfas dalf', 0, '2014-05-29 06:04:49'),
(7, 4, 106, 107, 'testing tesitng ', 0, '2014-05-29 06:21:53'),
(8, 5, 106, 88, 'hi sir', 0, '2014-05-29 06:28:32'),
(9, 5, 88, 106, 'hello patient', 0, '2014-05-29 06:32:47'),
(10, 6, 1, 10, 'a', 0, '2014-05-30 03:53:41'),
(11, 6, 1, 1, 'b', 0, '2014-05-30 03:53:49'),
(12, 7, 6, 2, 'zzzzzzz', 0, '2014-06-04 05:53:08'),
(13, 8, 6, 2, 'asdads', 0, '2014-06-04 05:55:19'),
(14, 9, 44, 74, 'test', 0, '2014-06-26 04:46:27'),
(15, 10, 19, 1, 'asdddasd asd asd asd', 0, '2014-07-01 04:11:50'),
(16, 11, 19, 6, 'i sell meth', 0, '2014-07-01 06:23:16'),
(17, 12, 88, 106, 'testing testing', 0, '2014-07-01 16:20:34'),
(18, 12, 106, 88, 'testing reply', 0, '2014-07-01 16:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `type`, `email`, `username`, `password`, `activity`, `created`, `updated`) VALUES
(1, 1, 'jetriconew@gmail.com', 'dragonjet', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-07-01 21:11:25', '0000-00-00 00:00:00', '2014-07-01 09:11:25'),
(2, 2, 'airzakura@gmail.com', 'airzakura', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-07-01 22:06:13', '0000-00-00 00:00:00', '2014-07-01 10:06:13'),
(3, 2, '!raremon@gmail.com', '!raremon', 'f0486e61fc13548597b9ba09941f8ac8', '2014-05-24 01:37:21', '0000-00-00 00:00:00', '2014-05-24 01:37:21'),
(4, 1, 'rare@rare.com', 'rarepat', '1185dd71b0fe452712afaecb6cf3529e', '2014-05-15 05:39:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 2, '!git.japajarillo@gmail.com', 'jpajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-07-02 20:31:26', '0000-00-00 00:00:00', '2014-07-02 08:31:26'),
(7, 1, 'qqq@qqq.qqq', 'qqq', 'b2ca678b4c936f905fb82f2733f5297f', '2014-07-02 19:40:46', '0000-00-00 00:00:00', '2014-07-02 07:40:46'),
(8, 1, 'me@me.com', 'john', '94cc51084dc6603fbc09042055a3a11c', '2014-05-15 09:03:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, '!ruelminds@mac.com', 'john.doe', '94cc51084dc6603fbc09042055a3a11c', '2014-05-24 01:35:54', '0000-00-00 00:00:00', '2014-05-24 01:35:54'),
(10, 1, 'edmark@yopmail.com', 'superuser', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-24 01:38:02', '0000-00-00 00:00:00', '2014-05-24 01:38:02'),
(11, 1, 'qwerty@yopmail.com', 'superuser2', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-15 09:18:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 1, 'qwerty1@yopmail.com', 'ww', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-15 10:42:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 1, 'superpatient@yopmail.com', 'superpatient', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-15 10:45:29', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 'superdoctor@yopmail.com', 'superdoctor', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-15 10:48:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 1, '!edmark_sanchez@yahoo.com', 'superpatients', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-24 01:35:27', '0000-00-00 00:00:00', '2014-05-24 01:35:27'),
(16, 1, '!edmarkharold@gmail.com', 'superpatientss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-24 01:35:17', '0000-00-00 00:00:00', '2014-05-24 01:35:17'),
(17, 1, 'ruelminds@me.com', 'ruelminds', '94cc51084dc6603fbc09042055a3a11c', '2014-05-16 04:35:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 1, 'jreyes@yahoo.com', 'jreyes', 'ed05465ecf7121c255b32e7f1ffbf124', '2014-05-16 05:52:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 'heisenberg@gmail.com', 'heisenberg', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-07-02 20:31:37', '0000-00-00 00:00:00', '2014-07-02 08:31:37'),
(20, 2, 'areyes@yahoo.com', 'areyes', '1f64c94fab7bec7f52c33309efce6266', '2014-05-18 15:00:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 3, 'yamato@test.com', 'yamato', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-23 14:38:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, 1, 'sample@email.tst', 'menard', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-05-14 06:39:43', '2013-12-10 04:25:48', '2014-03-05 14:21:09'),
(31, 1, 'jaycu@gmail.com', 'jaycu', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-05-14 06:39:43', '2013-12-11 04:59:17', '0000-00-00 00:00:00'),
(32, 1, 'test@test.com', 'test', 'ae2b1fca515949e5d54fb22b8ed95575', '2014-05-14 06:39:43', '2013-12-14 18:18:10', '0000-00-00 00:00:00'),
(33, 1, 'test2@test.com', '', '', '2014-05-24 01:34:56', '2013-12-15 05:02:01', '2014-05-24 01:34:56'),
(34, 1, 'ilyas@gmail.com', 'ilyas', '3ea4a8e4d7a95ace878f907ab8b72d1b', '2014-05-14 06:39:43', '2013-12-15 22:44:22', '2013-12-15 17:25:09'),
(35, 1, 'asd@asd123.com', 'pepe', '06c8a0bc3c1c0d0456341fc892039fc8', '2014-05-14 06:39:43', '2013-12-19 09:13:50', '0000-00-00 00:00:00'),
(36, 1, 'abc@yahoo.com', 'abc', '900150983cd24fb0d6963f7d28e17f72', '2014-05-14 06:39:43', '2013-12-20 21:00:48', '0000-00-00 00:00:00'),
(37, 1, 'sbederi@gmail.com', 'sbederi', 'e9d02936f996ec2768dcf1989e1d42eb', '2014-07-01 13:31:22', '2014-01-06 12:39:32', '2014-07-01 01:31:22'),
(38, 1, 'da.vibe@hotmail.com', 'DBederi', 'e8f7b8b18c541378c54bfa30f7947829', '2014-05-14 06:39:43', '2014-01-06 13:56:06', '0000-00-00 00:00:00'),
(39, 1, 'jasper_frederick02@yahoo.com', 'jasper_frederick02', '347efb63414eb263159a736543aad653', '2014-05-14 06:39:43', '2014-01-06 15:45:14', '2014-01-07 17:28:37'),
(40, 1, '3conceptz@gmail.com', 'Z3mama', 'dff5b99208914dadad6c839d2de0b6ac', '2014-05-14 06:39:43', '2014-01-06 19:27:01', '2014-01-07 08:30:16'),
(41, 1, 'ilyas@checkapp.asia', 'ilyas2', '0d58cb6d6eca88f59cba3799de36b372', '2014-05-14 06:39:43', '2014-01-06 20:59:57', '0000-00-00 00:00:00'),
(42, 1, 'zach.bederi@gmail.com', 'zach bederi', '5741d2fa6ff34e6c0118994e7fd9f5a9', '2014-05-14 06:39:43', '2014-01-07 01:01:14', '0000-00-00 00:00:00'),
(43, 1, 'mel_ranola@yahoo.com', 'mel_ranola', '5d76beffe761403531a6eb339e0f0231', '2014-05-14 06:39:43', '2014-01-07 01:49:04', '0000-00-00 00:00:00'),
(44, 1, 'ruelminds@mac.com', 'Leur', '9e7fa2e06725093c93c885b37036317c', '2014-07-02 20:31:33', '2014-01-07 01:52:53', '2014-07-02 08:31:33'),
(45, 1, 'gapragudo2@gmail.com', 'Gabriel Phillip Ragudo', 'a3dcb4d229de6fde0db5686dee47145d', '2014-05-14 06:39:43', '2014-01-07 03:55:07', '0000-00-00 00:00:00'),
(46, 1, 'phillip_ragudo@yahoo.com', 'Felipe W. Ragudo', '63dff83e4483dc088ad94a3de8943835', '2014-05-14 06:39:43', '2014-01-07 03:55:27', '0000-00-00 00:00:00'),
(47, 1, 'p_ragudo@yahoo.com', 'lipip', 'a8f5f167f44f4964e6c998dee827110c', '2014-05-14 06:39:43', '2014-01-07 04:04:49', '2014-01-07 17:12:15'),
(48, 1, 'bederi.stella@gmail.com', 'chinbederi87', '1f9fca1feed543ff0fd981a157e159cd', '2014-05-14 06:39:43', '2014-01-07 06:51:27', '0000-00-00 00:00:00'),
(49, 1, 'bbederi@gmail.com', 'buck bederi II', '02ae80d3ed12356cb95f3e15d28dda34', '2014-05-14 06:39:43', '2014-01-07 18:41:06', '0000-00-00 00:00:00'),
(50, 1, 'simple_days2000@yahoo.com', 'dairan03', 'fc721c07de307ab6e6285c3ec9bb54b3', '2014-05-14 06:39:43', '2014-01-07 21:45:22', '0000-00-00 00:00:00'),
(51, 1, 'winnie.ragudo@gmail.com', 'Winnie Ragudo', 'c2fc3ef12f5e28f3b4bec1705eb73359', '2014-05-14 06:39:43', '2014-01-08 03:45:46', '0000-00-00 00:00:00'),
(52, 1, 'Marifler@yahoo.com', 'Fler', 'a4b02c4a8e64c13e22a7b4bee76d14ff', '2014-05-14 06:39:43', '2014-01-08 11:29:20', '0000-00-00 00:00:00'),
(53, 1, 'alex.azurin@yahoo.com', 'Alex Azurin', 'c6dad9264fb53a668b4ee0659213f8c4', '2014-05-14 06:39:43', '2014-01-08 13:27:46', '0000-00-00 00:00:00'),
(54, 1, 'heschlx@yahoo.com', 'Jeff Michael de la rosa ', '331f84902e94f8eba9b77bb149126a1f', '2014-05-14 06:39:43', '2014-01-09 01:09:03', '0000-00-00 00:00:00'),
(55, 1, 'emz_lyn18@yahoo.com', 'em bernardino', '7d42fafd80e159be88fc06367265fd9f', '2014-05-14 06:39:43', '2014-01-09 03:13:37', '2014-01-09 16:27:24'),
(56, 1, 'qwert@qwet.com', 'qwert', 'a384b6463fc216a5f8ecb6670f86456a', '2014-05-14 06:39:43', '2014-01-09 06:28:17', '2014-01-09 20:50:16'),
(57, 1, 'lgcale@gmail.com', 'louie', '0f359740bd1cda994f8b55330c86d845', '2014-05-14 06:39:43', '2014-01-09 14:03:31', '0000-00-00 00:00:00'),
(58, 1, 'rai_perjes08@yahoo.com', 'Raia Isabella', 'c3b6bf5f1d2f4b48b12865bfa07bc4ad', '2014-05-14 06:39:43', '2014-01-10 19:08:17', '0000-00-00 00:00:00'),
(59, 1, 'rinnamariee@gmail.com', 'rinnamarie', 'dd5c678d88c2d3a34402cff150fb1ef0', '2014-05-14 06:39:43', '2014-01-10 19:37:01', '0000-00-00 00:00:00'),
(60, 1, 'infantelalaine@gmail.com', 'Lala09', '917cefd8ae06bae259538a9b022e4bca', '2014-05-14 06:39:43', '2014-01-11 07:53:22', '0000-00-00 00:00:00'),
(61, 1, 'myatsq@yahoo.com', 'ana q', '5cb15f68c6b7b7bced9079f27d880ec5', '2014-05-14 06:39:43', '2014-01-11 17:40:58', '0000-00-00 00:00:00'),
(62, 1, 'dermcorner@yahoo.com', 'bertex', '5c101884a49c50f03ca3e6a01ef529c7', '2014-05-14 06:39:43', '2014-01-11 19:06:54', '0000-00-00 00:00:00'),
(63, 1, 'jabber.janna@gmail.com', 'janna17', '6ff1f49f186b15df83533f6b87d395c8', '2014-05-14 06:39:43', '2014-01-11 22:41:08', '0000-00-00 00:00:00'),
(64, 1, 'ryan.escarez@gmail.com', 'ryan.escarez', '2ffbb2526fa74d25b9f5a2a273b8b355', '2014-05-14 06:39:43', '2014-01-13 04:48:31', '0000-00-00 00:00:00'),
(65, 1, 'salivatears@gmail.com', 'salivatears', 'c2c566e0e866d55fafb43f9ea3723600', '2014-05-14 06:39:43', '2014-01-13 04:48:53', '0000-00-00 00:00:00'),
(66, 1, 'juan@me.com', 'juan', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-05-14 06:39:43', '2014-01-13 04:49:00', '0000-00-00 00:00:00'),
(67, 1, 'juan@me.de', 'juanthree', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-05-14 06:39:43', '2014-01-13 04:52:34', '0000-00-00 00:00:00'),
(68, 1, 'menardjaycu2@gmail.com', 'menard69', 'a8f5f167f44f4964e6c998dee827110c', '2014-05-14 06:39:43', '2014-02-10 18:26:12', '0000-00-00 00:00:00'),
(69, 1, 'carla@pat.com', 'carlapat', '1fa4a2211b4e290f2a066de6b84187ec', '2014-05-14 06:39:43', '2014-02-11 21:51:11', '0000-00-00 00:00:00'),
(70, 1, 'dardsmindworks@gmail.com', 'patient01', '3c386dcc8e8cb6edddb864fd71d46375', '2014-05-14 06:39:43', '2014-02-12 15:40:09', '0000-00-00 00:00:00'),
(71, 1, 'menardjaycu@gmail.com', 'whattest', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-05-14 06:39:43', '2014-02-16 14:37:13', '0000-00-00 00:00:00'),
(72, 1, 'joshua.martizano@gmail.com', 'joshmarty', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-25 11:28:35', '0000-00-00 00:00:00'),
(73, 1, 'edmark_sanchez@yahoo.com', '!superuser', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-24 01:37:48', '2014-02-25 15:38:22', '2014-05-24 01:37:48'),
(74, 1, '!jetriconew@gmail.com', '!dragonjet', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-24 01:37:07', '2014-02-25 15:46:45', '2014-05-24 01:37:07'),
(75, 1, 'ken.mersado@gmail.com', 'agentk', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-26 09:08:17', '0000-00-00 00:00:00'),
(76, 1, 'edmarkharold@gmail.com', 'edsss', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-28 15:31:30', '0000-00-00 00:00:00'),
(77, 1, 'test1@test.com', '!superuser!', '0074d849a5ced07d7f58249ebf7eee9d', '2014-05-24 01:38:24', '2014-02-28 15:39:04', '2014-05-24 01:38:24'),
(78, 1, 'e@o.com', 'nnn', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-01 13:23:02', '0000-00-00 00:00:00'),
(79, 1, 'fb.japajarillo@gmail.com', 'fb.japajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-01 16:44:49', '2014-03-06 04:45:24'),
(80, 1, 'bryanroymendoza@gmail.com', 'lastroy', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-01 19:01:28', '0000-00-00 00:00:00'),
(81, 1, 'superuser@s.com', 'superuser@s.u', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-01 19:19:21', '0000-00-00 00:00:00'),
(82, 1, 'dontwanncloseyoureyes@gmail.com', 'dontwanna', '742a2d5b4726f2fad1136a40c6e5736a', '2014-05-14 06:39:43', '2014-03-05 09:24:33', '0000-00-00 00:00:00'),
(83, 1, 'patient@admin.com', 'patient@admin.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-06 05:38:06', '0000-00-00 00:00:00'),
(84, 2, 'menardjaycu1@gmail.com', 'menardcu', '9f5ab0cd889e06d101d3e45e0296ed23', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(85, 2, 'salivatzxzxz', 'rafael', '9135d8523ad3da99d8a4eb83afac13d1', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 2, 'syed@checkapp.asia', 'checkapp', 'e9d02936f996ec2768dcf1989e1d42eb', '2014-07-01 13:25:49', '0000-00-00 00:00:00', '2014-07-01 01:25:49'),
(87, 2, 'stella.bederi@hotmail.com', 'DrBederi', '1f9fca1feed543ff0fd981a157e159cd', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 2, 'raremon@gmail.com', 'raremon', '2e972b14c2eb71db8828b89cfad77e0a', '2014-07-02 06:29:17', '0000-00-00 00:00:00', '2014-07-01 18:29:17'),
(89, 2, 'drteh@medicine.com.my', 'Alan Teh', 'c559fc9be2e3fe04d4a42dd6b9b63435', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(90, 2, 'ooi.clinic@gmail.com', 'doc001', 'c8581f2a7e4d2fec82b15548962c0b0f', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(91, 2, 'rescarez@gmail.com', 'rescarez', '2ffbb2526fa74d25b9f5a2a273b8b355', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 2, 'juan@me.me', 'juanto', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 2, 'abc1@yahoo.com', 'abc1', '23734cd52ad4a4fb877d8a1e26e5df5f', '2014-05-14 06:39:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 2, 'asdf@asdf.com', 'asdf', '912ec803b2ce49e4a541068d495ab570', '2014-05-14 06:39:43', '2014-01-30 20:31:10', '0000-00-00 00:00:00'),
(95, 2, 'carla@carla.com', 'carla', '1fa4a2211b4e290f2a066de6b84187ec', '2014-05-14 06:39:43', '2014-02-11 21:49:56', '0000-00-00 00:00:00'),
(96, 2, 'salivatears@yahoo.com', 'drrafael', '156c0d646e0e7704a443f9fd9bff08da', '2014-05-14 06:39:43', '2014-02-12 01:30:16', '0000-00-00 00:00:00'),
(97, 2, 'dardsmindworks@yahoo.com', 'Physician01', '28a76f841ed138bc9a718e205992081e', '2014-05-14 06:39:43', '2014-02-12 15:36:06', '0000-00-00 00:00:00'),
(98, 2, 'ledoctor@lels.com', 'ledoctor', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-22 21:15:07', '0000-00-00 00:00:00'),
(99, 2, 'ken_mersado@yahoo.com', 'melchorm', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-25 10:49:44', '0000-00-00 00:00:00'),
(100, 2, 'joshua.martizano@yahoo.com', 'angelo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-25 11:22:06', '0000-00-00 00:00:00'),
(101, 2, 'edmarkharolds@gmail.com', 'dev', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-02-28 15:32:44', '0000-00-00 00:00:00'),
(102, 2, 'git.japajarillo@gmail.com', 'git.japajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-01 16:55:06', '0000-00-00 00:00:00'),
(103, 2, 's@yahoo.com', 'tansler', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-05 06:26:02', '0000-00-00 00:00:00'),
(104, 2, 'testing@test.test', 'testing_', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-05-14 06:39:43', '2014-03-10 08:29:51', '0000-00-00 00:00:00'),
(105, 2, 'raremon2@gmail.com', 'raremon2', '3833490ca05b6a86163b6f355b4b5a3e', '2014-05-29 05:58:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 1, 'raremonpat@gmail.com', 'raremonpat', '793c1b184b7a211b3f6a021547941cfc', '2014-07-02 06:08:03', '0000-00-00 00:00:00', '2014-07-01 18:08:03'),
(107, 1, 'raremonpat2@gmail.com', 'raremonpat2', 'a0ca2912690254d0c694073d64a82398', '2014-05-29 06:15:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 1, 'ruelminds@gmail.com', 'leurminds', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-05-29 09:22:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 2, 'ruelminds@yahoo.com', 'drjohn', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-07-02 06:53:46', '0000-00-00 00:00:00', '2014-07-01 18:53:46'),
(110, 2, 'ruel@checkapp.asia', 'drken', 'c62d929e7b7e7b6165923a5dfc60cb56', '2014-05-29 09:36:07', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 1, 'sunny@webhoop.com', 'sunnyzimm', 'fb97cfe93e8e8d526916df4aec8171ed', '2014-05-30 16:38:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 1, 'abet@checkapp.asia', 'abetuson', '0182b73961bcff96aeaa6ee6ab8d7ffd', '2014-06-02 14:21:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 2, 'www@www.www', 'www', '4eae35f1b35977a00ebd8086c259d4c9', '2014-06-12 07:29:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 0, '0', 'j', 'cfcd208495d565ef66e7dff9f98764da', '2014-06-13 01:40:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 0, '0', 'j', 'cfcd208495d565ef66e7dff9f98764da', '2014-06-13 01:40:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 0, '', '0', 'cfcd208495d565ef66e7dff9f98764da', '2014-06-13 01:40:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 0, '', '0', 'cfcd208495d565ef66e7dff9f98764da', '2014-06-13 01:40:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 1, 'jsantos@yahoo.com', 'jsantos', 'e85c7fd8e4c79c1c3ced59dd9db3534f', '2014-06-13 01:45:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 2, 'jtorres@yahoo.com', 'jtorres', '7bf239eb3f20e10a56cc866b8e5a7197', '2014-06-13 01:56:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 1, 'haruna@yopmail.com', 'haruna', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-06-14 13:37:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 1, 'kumano@yopmail.com', 'kumano', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-06-14 13:57:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 2, 'raremondoc2@docdoc.com', 'raremondoc2', '160a053d5ce569744621a3955848c985', '2014-06-23 15:07:35', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 99, 'admin@checkapp.asia', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2014-06-26 18:16:57', '2014-06-26 18:16:57', '0000-00-00 00:00:00'),
(124, 99, 'test@admin.com', 'testadmin', 'bf1e9f23eb413488bbb829dcce979c6d', '2014-06-26 18:20:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 2, 'doctoredmark@yopmail.com', 'doctoredmark', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-06-30 04:47:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 1, 'patientedmark@yopmail.com', 'patientedmark', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-06-30 04:52:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 1, 'qqq@gmail.com', 'qqqq', '3bad6af0fa4b8b330d162e19938ee981', '2014-06-30 23:41:06', '0000-00-00 00:00:00', '2014-06-30 11:41:06'),
(128, 2, 'jmpajarillo@gmail.com', 'dpajarillo', 'd8578edf8458ce06fbc5bb76a58c5ca4', '2014-07-01 14:50:27', '0000-00-00 00:00:00', '2014-07-01 02:50:27'),
(129, 1, 'babalama3@gmail.com', 'babalams', 'e9d02936f996ec2768dcf1989e1d42eb', '2014-07-01 14:06:53', '0000-00-00 00:00:00', '2014-07-01 02:06:53'),
(130, 1, 'tokageru@gmail.com', 'raremonpat3', '3b921b0aac6c302e17a4f2efbf3df5cb', '2014-07-01 17:34:23', '0000-00-00 00:00:00', '2014-07-01 05:34:23'),
(131, 2, 'rellmon@doc.com', 'rellmondoc', '4b1dcbc485a81c6e7933ffa7fe6c5bf4', '2014-07-01 17:34:17', '0000-00-00 00:00:00', '2014-07-01 05:34:17'),
(132, 1, 'liamparungao@gmail.com', 'liamparungao', 'e5b0aaf5578aac9ee499b36cf6830d84', '2014-07-02 07:47:41', '0000-00-00 00:00:00', '2014-07-01 19:47:41'),
(133, 2, 'rianparungao@gmail.com', 'gabrielparungao', '647431b5ca55b04fdf3c2fce31ef1915', '2014-07-02 07:57:56', '0000-00-00 00:00:00', '2014-07-01 19:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_friends`
--

CREATE TABLE IF NOT EXISTS `user_friends` (
  `user_id_1` int(10) unsigned NOT NULL,
  `user_id_2` int(10) unsigned NOT NULL,
  `status_1` int(10) unsigned NOT NULL DEFAULT '0',
  `status_2` int(10) unsigned NOT NULL DEFAULT '0',
  `type` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id_1`,`user_id_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_friends`
--

INSERT INTO `user_friends` (`user_id_1`, `user_id_2`, `status_1`, `status_2`, `type`, `created`, `updated`) VALUES
(1, 9, 1, 0, 1, '2014-05-26 05:05:50', '2014-05-25 17:05:50'),
(6, 102, 1, 1, 2, '2014-05-30 05:25:11', '2014-05-30 05:23:07'),
(19, 6, 1, 1, 2, '2014-07-01 18:22:49', '2014-07-01 19:10:14'),
(44, 7, 1, 0, 1, '2014-06-30 17:30:15', '2014-06-30 17:30:15'),
(88, 122, 1, 0, 2, '2014-07-02 04:22:46', '2014-07-02 04:22:46'),
(105, 88, 1, 1, 2, '2014-05-29 06:01:59', '2014-05-29 06:00:14'),
(106, 107, 1, 1, 1, '2014-06-06 13:24:25', '2014-05-29 06:16:49'),
(109, 88, 1, 0, 2, '2014-07-01 20:38:21', '2014-07-01 20:38:21'),
(126, 10, 1, 1, 1, '2014-06-30 04:55:06', '2014-06-30 16:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE IF NOT EXISTS `user_notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `user_notifications`
--

INSERT INTO `user_notifications` (`id`, `user_id`, `type`, `data`, `created`, `is_read`) VALUES
(1, 2, 5, '1', '2014-05-23 13:55:04', 0),
(2, 27, 4, '24', '2014-05-26 01:46:05', 0),
(3, 27, 4, '25', '2014-05-27 08:54:37', 0),
(4, 0, 1, '0', '2014-05-29 06:00:14', 0),
(5, 105, 2, '88', '2014-05-29 06:01:59', 0),
(6, 0, 1, '0', '2014-05-29 06:16:49', 0),
(7, 106, 2, '107', '2014-06-06 13:19:13', 1),
(8, 107, 4, '28', '2014-05-29 06:23:05', 0),
(9, 0, 1, '0', '2014-05-30 05:23:07', 0),
(10, 6, 2, '102', '2014-06-03 07:05:25', 1),
(11, 109, 3, '44', '2014-06-06 10:23:38', 1),
(12, 107, 1, '106', '2014-06-06 13:19:03', 0),
(13, 106, 2, '107', '2014-06-06 13:33:37', 1),
(14, 107, 1, '106', '2014-06-06 13:24:17', 0),
(15, 106, 2, '107', '2014-06-06 13:24:25', 0),
(16, 88, 3, '107', '2014-06-06 13:29:29', 0),
(17, 2, 1, '1', '2014-06-06 13:32:35', 0),
(18, 2, 1, '1', '2014-06-06 13:32:44', 0),
(19, 88, 1, '106', '2014-06-06 13:33:31', 0),
(20, 88, 1, '106', '2014-06-06 13:35:52', 0),
(21, 88, 1, '106', '2014-06-06 13:35:59', 0),
(22, 88, 1, '106', '2014-06-06 13:37:00', 0),
(23, 88, 7, '106', '2014-06-06 13:44:11', 0),
(24, 88, 7, '106', '2014-06-06 13:44:48', 0),
(25, 88, 7, '106', '2014-06-13 16:58:47', 1),
(26, 2, 7, '1', '2014-06-12 11:16:35', 0),
(27, 88, 7, '106', '2014-06-13 16:58:39', 0),
(28, 2, 7, '1', '2014-06-15 10:12:52', 0),
(29, 2, 7, '1', '2014-06-15 10:13:28', 0),
(30, 2, 7, '1', '2014-06-15 10:14:15', 0),
(31, 2, 7, '1', '2014-06-17 15:05:27', 0),
(32, 0, 5, '1', '2014-06-18 14:52:16', 0),
(33, 88, 7, '106', '2014-06-23 15:03:47', 1),
(34, 2, 7, '1', '2014-06-27 06:54:27', 0),
(35, 2, 7, '1', '2014-06-27 06:54:35', 0),
(36, 20, 7, '1', '2014-06-27 06:56:07', 0),
(37, 2, 7, '1', '2014-06-27 08:34:30', 0),
(38, 2, 7, '1', '2014-06-27 08:34:37', 0),
(39, 2, 7, '1', '2014-06-27 08:34:50', 0),
(40, 2, 7, '1', '2014-06-27 08:34:57', 0),
(41, 2, 7, '1', '2014-06-27 08:35:07', 0),
(42, 2, 7, '1', '2014-06-27 09:46:40', 0),
(43, 2, 7, '1', '2014-06-27 09:46:55', 0),
(44, 2, 7, '1', '2014-06-27 09:47:12', 0),
(45, 2, 7, '1', '2014-06-27 09:47:27', 0),
(46, 2, 7, '44', '2014-06-30 05:22:27', 0),
(47, 2, 7, '1', '2014-06-30 17:12:11', 0),
(48, 88, 7, '106', '2014-07-01 03:21:24', 1),
(49, 88, 7, '106', '2014-07-01 03:22:48', 0),
(50, 88, 7, '106', '2014-07-01 03:22:48', 0),
(51, 7, 5, '44', '2014-07-01 03:59:16', 0),
(52, 131, 7, '130', '2014-07-01 04:00:23', 0),
(53, 2, 7, '44', '2014-07-01 04:02:28', 0),
(54, 2, 7, '44', '2014-07-01 04:02:28', 0),
(55, 0, 5, '19', '2014-07-01 04:08:57', 0),
(56, 2, 7, '1', '2014-07-01 04:33:18', 0),
(57, 2, 7, '1', '2014-07-01 04:33:18', 0),
(58, 2, 7, '1', '2014-07-01 04:34:24', 0),
(59, 2, 7, '1', '2014-07-01 04:34:24', 0),
(60, 19, 4, '33', '2014-07-01 07:03:04', 1),
(61, 19, 5, '6', '2014-07-01 07:04:00', 1),
(62, 6, 1, '19', '2014-07-01 07:09:10', 1),
(63, 19, 2, '6', '2014-07-01 07:10:14', 0),
(64, 109, 7, '44', '2014-07-01 08:29:05', 1),
(65, 88, 1, '109', '2014-07-01 08:38:21', 0),
(66, 0, 5, '2', '2014-07-01 09:28:31', 0),
(67, 122, 1, '88', '2014-07-01 16:22:46', 0),
(68, 6, 5, '19', '2014-07-02 07:55:14', 1),
(69, 19, 4, '35', '2014-07-02 08:22:38', 0),
(70, 19, 5, '59', '2014-07-02 08:24:40', 1),
(71, 6, 4, '37', '2014-07-02 08:27:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `gender` int(10) unsigned NOT NULL,
  `birthdate` datetime NOT NULL,
  `num_landline` varchar(30) NOT NULL,
  `num_phone1` varchar(30) NOT NULL,
  `num_phone2` varchar(30) NOT NULL,
  `c_skype` varchar(100) NOT NULL,
  `c_msn` varchar(100) NOT NULL,
  `c_yahoo` varchar(100) NOT NULL,
  `c_gtalk` varchar(100) NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`user_id`, `title`, `first_name`, `middle_name`, `last_name`, `address1`, `address2`, `gender`, `birthdate`, `num_landline`, `num_phone1`, `num_phone2`, `c_skype`, `c_msn`, `c_yahoo`, `c_gtalk`, `coord_lat`, `coord_lng`, `profile_pic`, `updated`) VALUES
(1, 'Rear-Admiral', 'Jet Rico', '', 'Bañas', 'A', 'B', 2, '2014-07-04 00:00:00', '0', 'a', 'b', 'c', 'd', 'e', 'f', 48.3705449, 10.89779, '53b1086336297.png', '2014-07-01 09:11:24'),
(2, 'SAV', 'Taigei', '', 'Ryuuhou', 'G', 'H', 2, '1991-09-28 00:00:00', '0', '1234567', '9876543', 'wotamin.', 'asd', 'qwe', 'rty', 50.8850706, 50.8850706, '53ad3cdce575e.jpeg', '2014-06-30 11:01:27'),
(3, '', 'raremon', '', 'raremon', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '539d9103614fd.jpg', '2014-06-15 12:26:43'),
(4, '', 'rarepat', '', 'rarepat', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(6, 'Mr.', 'John', '', 'Pajarillo', 'Calumpang', 'Marikina City', 1, '1990-08-15 00:00:00', '0', '', '', '', '', '', '', 14.6249216, 121.0865346, '53b182262ff61.jpeg', '2014-07-01 07:11:06'),
(7, '', 'bryan', '', 'bryan', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '53b180df66367.png', '2014-06-30 15:23:12'),
(8, '', 'John', '', 'Doe', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(9, '', 'John', '', 'Doe', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(10, '', 'Edmark', '', 'Sanchez', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(11, '', 'edmark 2', '', 'sanchez', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(12, '', 'Edmark', '', 'sanchez', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(13, '', 'Edmark', '', 'Sanchez', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(14, '', 'Marki', '', 'sanchez', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(15, '', 'Edmark', '', 'sanchez', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(16, '', 'Edmarkb', '', 'sanchez', '', '', 1, '0000-00-00 00:00:00', '0', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(17, '', 'Ruel', '', 'Minds', '', '', 1, '0000-00-00 00:00:00', '0', '', '', '', '', '', '', 0, 0, '539d9103c6de4.jpg', '2014-06-15 12:26:43'),
(18, '', 'Jose', '', 'Reyes', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '539d9103d3ad5.jpg', '2014-06-15 12:26:43'),
(19, 'Mr.', 'Walter', 'Hartwell', 'White', '308 Negra Arroyo Lane, ', 'Albuquerque, New Mexico, 87104', 1, '1959-09-07 00:00:00', '0', '', '', '', '', '', '', 35.0971089, -106.7560375, '53b22241f2dd2.jpeg', '2014-07-01 06:19:45'),
(20, '', 'antonio', '', 'reyes', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(27, '', 'Akashi Med. Co.', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '539d9103eb9cd.jpg', '2014-06-15 12:26:44'),
(30, '2', 'rypoohqj', '', 'ggjiretn', '3137 Laguna Street', 'DZ', 1, '2014-02-11 00:00:00', '', '555-666-0606', 'W', '1', '', 'sample@email.tst', '1', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(31, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(32, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(33, '2', 'gg', '', 'jjj', 'akjsdjaklsd a', 'AL', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(34, '2', 'gg', '', 'jjj', 'here star', 'AO', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(35, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(36, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(37, '2', 'gg', '', 'jjj', 'Kuala Lumpur', 'MY', 1, '2014-02-11 00:00:00', '', '0193801733', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(38, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(39, '2', 'gg', '', 'jjj', 'Cagayan de Oro City', 'PH', 1, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(40, '2', 'gg', '', 'jjj', 'Aston Kiara 3 Jalan kiara, Kuala Lumpur', 'MY', 2, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(41, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(42, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(43, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(44, '', 'Ruel', '', 'Minds', '', '', 1, '2014-02-11 00:00:00', '0', '', 'W', '', '', '', '', 0, 0, '53b0ec9f9760c.jpeg', '2014-06-30 04:50:40'),
(45, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(46, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(47, '2', 'gg', '', 'jjj', '', 'Select you', 1, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(48, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(49, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(50, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(51, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(52, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(53, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(54, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(55, '2', 'gg', '', 'jjj', '', 'PH', 2, '2014-02-11 00:00:00', '', '', 'W', '', '', 'emz_lyn18@yahoo.com', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(56, '2', 'gg', '', 'jjj', '', 'Select you', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(57, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(58, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(59, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(60, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(61, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(62, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(63, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(64, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(65, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(66, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(67, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(68, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(69, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(70, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(71, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(72, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(73, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(74, '2', 'Jet', '', 'Rico', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(75, '2', 'gg', '', 'jjj', 'San Pedro', '', 0, '2014-02-11 00:00:00', '', '9297497570', 'W', 'agent.kenken_onSkype', '', '', 'agent.kenken_onGoogle', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(76, '2', 'gg', '', 'jjj', '', '', 0, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(77, '2', 'gg', '', 'jjj', '', '', 1, '2014-02-11 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(78, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(79, '2', 'john', '', 'pajarillo', 'Marikina City', 'Select you', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(80, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(81, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(82, '2', 'Dont', '', 'Wanna', '', '', 1, '1989-12-31 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(83, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(84, '2', 'Jane', '', 'Doe', '', '', 1, '2014-01-28 00:00:00', '', '', 'W', '', '', '', '', 14.641809463501, 121.022964477539, '539d91040f3ed.jpg', '2014-06-15 12:26:44'),
(85, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '0', 'W', '', '', '', '', 14.641809463501, 121.022964477539, 'default.jpg', '2014-06-15 12:01:02'),
(86, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(87, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(88, '', 'Rellmon', 'P.', 'Ponce de Leon', '', '', 0, '2012-09-03 00:00:00', '0', '234', '57675', 'raremon', 'asdf', '', '', 0, 0, '53ad150ff3368.jpeg', '2014-06-27 06:54:08'),
(89, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(90, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(91, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(92, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(93, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(94, '2', 'Ruel Michael', '', 'Delfin', '', '', 1, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(95, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(96, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(97, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(98, '2', 'Le', '', 'Docta', '', '', 0, '0000-00-00 00:00:00', '', '0', 'W', 'E', '', '', 'F', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(99, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(100, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(101, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(102, '2', 'John', '', 'Pajarillo', '', '', 1, '2014-03-07 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(103, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(104, '2', '', '', '', '', '', 0, '0000-00-00 00:00:00', '', '', 'W', '', '', '', '', 100, 100, 'default.jpg', '2014-06-15 12:01:02'),
(105, '', 'raremon2', '', 'raremon2', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(106, 'asdf', 'raremonpat', 'asdf', 'raremonpat', '', '', 1, '0000-00-00 00:00:00', '0', '2342423', '', '', '', '', '', 0, 0, '539d91045c737.jpg', '2014-06-25 02:49:47'),
(107, '', 'raremon', 'pat', 'second', '', '', 1, '0000-00-00 00:00:00', '0', '12345', '', 'raremon2', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(108, '', 'Ruel', '', 'Minds', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(109, '', 'John', '', 'Castro', '', '', 1, '0000-00-00 00:00:00', '0', '', '', '', '', '', '', 0, 0, '53b268eba1e76.png', '2014-07-01 08:01:43'),
(110, '', 'Ken', '', 'Doe', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(111, '', 'Sunny', '', 'Khiani', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(112, '', 'Abet', '', 'Uson', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(113, '', 'www', '', 'www', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(114, '', '0', '', '0', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(115, '', '0', '', '0', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(116, '', '0', '', '0', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(117, '', '0', '', '0', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(118, '', 'Jose', '', 'Santos', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(119, '', 'Jose', '', 'Torres', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(120, '', 'Haruna', '', 'Kirishima', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(121, '', 'Kumano', '', 'Mogami', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '2014-06-15 12:01:02'),
(122, '', 'raremon', '', 'doc', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(125, 'mr', 'Doctor', 'r', 'Edmark', 'r', 'r', 1, '1987-06-09 00:00:00', '0', '123', '123', '222', 'd', 'd', 'd', 49.0134297, 49.0134297, 'default.jpg', '2014-06-30 04:51:09'),
(126, '', 'patient', '', 'edmark', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(127, '', 'bryan', '', 'testtest', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(128, '', 'drin', '', 'Pajarillo', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, '53b215afb6e42.jpeg', '2014-07-01 01:58:08'),
(129, '', 'Baba', '', 'Lams', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(130, '', 'RellmonPat', '', 'PoncedeleonPat', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(131, '', 'RellmonDoc', '', 'PoncedeleonDoc', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(132, '', 'liam', '', 'parungao', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00'),
(133, '', 'gabriel', '', 'parungao', '', '', 0, '0000-00-00 00:00:00', '', '', '', '', '', '', '', 0, 0, 'default.jpg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_settings`
--

CREATE TABLE IF NOT EXISTS `user_settings` (
  `user_id` int(10) unsigned NOT NULL,
  `setting_id` int(10) unsigned NOT NULL,
  `value` varchar(10) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_subscribe`
--

CREATE TABLE IF NOT EXISTS `user_subscribe` (
  `user_id` int(10) unsigned NOT NULL,
  `physician_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_subscribe`
--

INSERT INTO `user_subscribe` (`user_id`, `physician_id`, `created`) VALUES
(1, 2, '2014-05-29 09:56:55'),
(44, 2, '2014-07-01 14:27:39'),
(44, 109, '2014-06-06 10:23:38'),
(106, 88, '2014-05-29 06:06:31'),
(107, 88, '2014-06-06 13:29:29'),
(108, 110, '2014-05-29 09:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_verifications`
--

CREATE TABLE IF NOT EXISTS `user_verifications` (
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `code` varchar(500) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_verifications`
--

INSERT INTO `user_verifications` (`user_id`, `type`, `code`, `status`, `created`, `updated`) VALUES
(1, 1, 'bcd9a9044875219831d91cb8d847ef36_b5d1d71291604a7caf1d266bcb79be3c', 0, '2014-05-15 14:16:15', '2014-05-15 14:16:15'),
(2, 1, '0c3a3b4ac23738a316a8bae7622ca7be_1506b5fd9f016b93eed4fbde5ca4712e', 0, '2014-05-15 14:23:00', '2014-05-15 14:23:00'),
(3, 1, '8200cacf5201dea788a1df65a33b85fc_f0486e61fc13548597b9ba09941f8ac8', 0, '2014-05-15 17:37:59', '2014-05-15 17:37:59'),
(4, 1, '7e0563c4a673549c854dc2d46962a76f_1185dd71b0fe452712afaecb6cf3529e', 0, '2014-05-15 17:39:50', '2014-05-15 17:39:50'),
(5, 1, '0bcc44d928b4a42cc1a80b4d1b83b4c4_28fd470a1ca38f1b9d2ab7fa6e9beb6e', 0, '2014-05-15 17:42:00', '2014-05-15 17:42:00'),
(6, 1, 'c546cc906b5c10f6066c9dacf084b164_5e6ef1dfa98e987e36e75756f7b19cd4', 0, '2014-05-15 17:42:15', '2014-05-15 17:42:15'),
(7, 1, 'b154c092473ed43d77b6146af11a17ed_b2ca678b4c936f905fb82f2733f5297f', 0, '2014-05-15 17:46:54', '2014-05-15 17:46:54'),
(8, 1, '9f172c51a2d6c67cb609e2efaf34c6eb_527bd5b5d689e2c32ae974c6229ff785', 0, '2014-05-15 21:03:26', '2014-05-15 21:03:26'),
(9, 1, '007fb55af9b2bcca620def0db8d871f2_abba0b6ff456806bab66baed93e6d9c4', 0, '2014-05-15 21:10:43', '2014-05-15 21:10:43'),
(10, 1, 'ac99de53e037cdc668cdb4dd204e2658_0baea2f0ae20150db78f58cddac442a9', 0, '2014-05-15 21:15:54', '2014-05-15 21:15:54'),
(11, 1, 'e16989b8a67de0f119f92aa9f61842bf_263d1a3588b3da5c2c48735d83814259', 0, '2014-05-15 21:18:52', '2014-05-15 21:18:52'),
(12, 1, 'abda35f8d4c6b2dad862c0c9c9a2b9e1_ad57484016654da87125db86f4227ea3', 0, '2014-05-15 22:42:36', '2014-05-15 22:42:36'),
(13, 1, 'fd2c4f82bafe925778d2736839d31c69_9ba31263234d423a79a6d740704c31af', 0, '2014-05-15 22:45:29', '2014-05-15 22:45:29'),
(14, 1, 'e9a9fe2e4adcd42aa6416acf68032a7c_20f8b592ff646801a68425016a6ae730', 0, '2014-05-15 22:48:43', '2014-05-15 22:48:43'),
(15, 1, 'd96c84b7ac952a82c35486c7f389b76a_7747178a8f861486b0ae2a5a57141317', 0, '2014-05-16 01:58:21', '2014-05-16 01:58:21'),
(16, 1, '1de430d749bef7ef996c7b8470b6760d_c02eefefd86aacc59a81c1e09b8429a6', 0, '2014-05-16 01:59:17', '2014-05-16 01:59:17'),
(17, 1, '1b1e7252beef6cedf0af15c9de9b599b_d76e83f6a4fd55516fe21d5af9aa8b1e', 1, '2014-05-16 04:40:01', '2014-05-16 04:40:01'),
(18, 1, '341c14ad0b3a44cedf62b54c8ea88b0c_590447f01cf544232d78d080ee501ef6', 0, '2014-05-16 17:52:38', '2014-05-16 17:52:38'),
(19, 1, '2b8cd56277157fb5dd6d9f0c982c7a8f_49360ba4cbe27a1b900df25b247315d7', 0, '2014-05-16 18:00:54', '2014-05-16 18:00:54'),
(20, 1, '14cfbad12319d6a3ea09e7285eede0f3_37eb2563babd65b9269d95af24d667e1', 0, '2014-05-19 03:00:11', '2014-05-19 03:00:11'),
(27, 1, '5d53dc7b0d4654c40c12532791abb9a8_349d0eb50c6742d31e33b6f69722a00d', 0, '2014-05-24 02:38:42', '2014-05-24 02:38:42'),
(88, 99, '', 1, '2014-06-27 09:04:20', '2014-06-27 09:04:20'),
(105, 1, '47b8f5c1d4c4fd971ad4a7e4753d2cec_3833490ca05b6a86163b6f355b4b5a3e', 0, '2014-05-29 17:58:44', '2014-05-29 17:58:44'),
(106, 1, '4f6913914c4e64ce7417d935a62215b4_793c1b184b7a211b3f6a021547941cfc', 0, '2014-05-29 18:05:52', '2014-05-29 18:05:52'),
(107, 1, 'e718c4bb85b19b703d627f56805236ee_a0ca2912690254d0c694073d64a82398', 0, '2014-05-29 18:15:47', '2014-05-29 18:15:47'),
(108, 1, '39dcbaf58db73b237262c0d62bfaedf6_6ec4dfd65de403f1701e633125728f66', 1, '2014-05-29 09:23:20', '2014-05-29 09:23:20'),
(109, 1, 'd07cbcfaf42ecf98c8bb770066314721_6d33a1ff8bf3f23f31e97bb08f7ac5cd', 0, '2014-05-29 21:33:44', '2014-05-29 21:33:44'),
(110, 1, '580a92155f2b19ab76a28f4a6a8254f7_6970bf2018442116a14328fee72dc7e8', 1, '2014-05-29 09:36:22', '2014-05-29 09:36:22'),
(111, 1, '7749803b7f159048c43f78deaea5131e_120a39df421659996a066657849d60cb', 1, '2014-05-30 16:39:50', '2014-05-30 16:39:50'),
(112, 1, '76fb1a28a60cb5cd43690d8f7e86c370_2717bf91afa73264615a3dd1e83c50e8', 1, '2014-06-02 14:23:32', '2014-06-02 14:23:32'),
(113, 1, 'fc602206c2b20b5afea31c6bfc4ea552_4eae35f1b35977a00ebd8086c259d4c9', 0, '2014-06-12 19:29:18', '2014-06-12 19:29:18'),
(114, 1, '52120190ad895d14d7ea350e42c992cd_363b122c528f54df4a0446b6bab05515', 0, '2014-06-13 13:40:15', '2014-06-13 13:40:15'),
(115, 1, '52120190ad895d14d7ea350e42c992cd_363b122c528f54df4a0446b6bab05515', 0, '2014-06-13 13:40:15', '2014-06-13 13:40:15'),
(116, 1, '9f5fc2851dfef38500cb7dfaffb279a8_cfcd208495d565ef66e7dff9f98764da', 0, '2014-06-13 13:40:18', '2014-06-13 13:40:18'),
(117, 1, '9f5fc2851dfef38500cb7dfaffb279a8_cfcd208495d565ef66e7dff9f98764da', 0, '2014-06-13 13:40:18', '2014-06-13 13:40:18'),
(118, 1, 'fc601719e2a5c2c4824c8670de248d85_3b4a5903e8316179a6c81dfea08107f9', 0, '2014-06-13 13:45:13', '2014-06-13 13:45:13'),
(119, 1, '39eaf35d9746f07320c1e9c633b29bbf_e0d19269056a4c83397ad84a8423874a', 0, '2014-06-13 13:56:51', '2014-06-13 13:56:51'),
(120, 1, 'c13e660f99808ff3132d324f1a15fabd_c82cfc524aa9a7e402d7a508b491b57b', 1, '2014-06-14 13:38:19', '2014-06-14 13:38:19'),
(121, 1, '71bf4f599d4b886766c8fe97f26ee91b', 1, '2014-06-14 13:57:33', '2014-06-14 13:57:33'),
(122, 2, 'cadb5da3bd13c53097d86c33e9a23cc4', 0, '2014-06-24 03:07:35', '2014-06-24 03:07:35'),
(125, 2, 'dade082b8ca8ba180515b694e48475dc', 2, '2014-06-30 04:48:01', '2014-06-30 04:48:01'),
(126, 1, 'b0f91135a15492b91e18270f70c5f2e2', 0, '2014-06-30 16:52:17', '2014-06-30 16:52:17'),
(127, 1, '5e285607f1bcb52bf77c9f388ed59bc3', 0, '2014-06-30 18:18:44', '2014-06-30 18:18:44'),
(128, 2, 'e90ed34690aedb005a9bf886eafe80b9', 0, '2014-06-30 19:33:09', '2014-06-30 19:33:09'),
(129, 1, '92c46ebfab1723d483b1087ddf3c18ff', 1, '2014-07-01 13:32:50', '2014-07-01 01:33:55'),
(130, 1, '96fe643aa51c8c2bb0383906f659e091', 0, '2014-07-01 15:58:22', '2014-07-01 15:58:22'),
(131, 2, 'c08b2da577adb8b2536299ae8f4d3954', 0, '2014-07-01 15:59:20', '2014-07-01 15:59:20'),
(132, 1, '861573fd14f2fbfdcdf23e61746b1b4d', 0, '2014-07-02 06:45:07', '2014-07-02 06:45:07'),
(133, 2, '9913f992d0925a61d4c7646a175e5e15', 0, '2014-07-02 07:03:53', '2014-07-02 07:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `user_widgets`
--

CREATE TABLE IF NOT EXISTS `user_widgets` (
  `user_id` int(10) unsigned NOT NULL,
  `widget_id` int(10) unsigned NOT NULL,
  `sort_num` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`,`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_widgets`
--

INSERT INTO `user_widgets` (`user_id`, `widget_id`, `sort_num`, `created`, `updated`) VALUES
(2, 1, 0, '2014-07-01 06:05:11', '0000-00-00 00:00:00'),
(2, 2, 0, '2014-07-01 06:05:11', '0000-00-00 00:00:00'),
(88, 1, 0, '2014-07-01 14:45:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `var_exams`
--

CREATE TABLE IF NOT EXISTS `var_exams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `var_exams`
--

INSERT INTO `var_exams` (`id`, `type`, `name`, `updated`, `created`) VALUES
(1, 0, 'X-rays', '0000-00-00 00:00:00', '2014-05-26 18:41:22'),
(2, 0, 'Ultrasound', '0000-00-00 00:00:00', '2014-05-26 18:41:22'),
(3, 0, 'CT-Scan', '0000-00-00 00:00:00', '2014-05-26 18:41:31'),
(4, 0, 'MRI', '0000-00-00 00:00:00', '2014-05-26 18:41:31'),
(5, 0, 'Upper GI', '0000-00-00 00:00:00', '2014-05-26 18:41:42'),
(6, 0, 'VCUG', '0000-00-00 00:00:00', '2014-05-26 18:41:42'),
(7, 0, 'Throat culture', '0000-00-00 00:00:00', '2014-05-26 18:42:01'),
(8, 0, 'Stool test', '0000-00-00 00:00:00', '2014-05-26 18:42:01'),
(9, 0, 'Urine test', '0000-00-00 00:00:00', '2014-05-26 18:42:10'),
(10, 0, 'Lumbar puncture', '0000-00-00 00:00:00', '2014-05-26 18:42:10'),
(11, 0, 'EEG', '0000-00-00 00:00:00', '2014-05-26 18:42:18'),
(12, 0, 'EKG', '0000-00-00 00:00:00', '2014-05-26 18:42:18'),
(13, 0, 'EMG', '0000-00-00 00:00:00', '2014-05-26 18:42:26'),
(14, 0, 'Biopsies', '0000-00-00 00:00:00', '2014-05-26 18:42:26'),
(15, 0, 'CBC', '0000-00-00 00:00:00', '2014-05-26 18:42:39'),
(16, 0, 'Blood chemistry test', '0000-00-00 00:00:00', '2014-05-26 18:42:39'),
(17, 0, 'Blood culture', '0000-00-00 00:00:00', '2014-05-26 18:42:47'),
(18, 0, 'Lead test', '0000-00-00 00:00:00', '2014-05-26 18:42:47'),
(19, 0, 'Liver function test', '0000-00-00 00:00:00', '2014-05-26 18:42:58'),
(20, 0, 'Prenatal tests', '0000-00-00 00:00:00', '2014-05-26 18:42:58'),
(21, 0, 'Bilirubin level', '0000-00-00 00:00:00', '2014-05-26 18:43:10'),
(22, 0, 'Hearing screen', '0000-00-00 00:00:00', '2014-05-26 18:43:10');

-- --------------------------------------------------------

--
-- Table structure for table `var_health`
--

CREATE TABLE IF NOT EXISTS `var_health` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `var_questionnaire`
--

CREATE TABLE IF NOT EXISTS `var_questionnaire` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `var_settings`
--

CREATE TABLE IF NOT EXISTS `var_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `var_widgets`
--

CREATE TABLE IF NOT EXISTS `var_widgets` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `var_widgets`
--

INSERT INTO `var_widgets` (`id`, `type`, `name`, `created`, `updated`) VALUES
(1, 2, 'Next Appointment', '2014-07-01 04:59:31', '0000-00-00 00:00:00'),
(2, 2, 'Earnings', '2014-07-01 04:59:31', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
