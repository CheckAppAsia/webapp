-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 04:01 PM
-- Server version: 5.6.19
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_provider`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
`id` int(10) unsigned NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(32) NOT NULL,
  `activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `email`, `username`, `activity`) VALUES
(2, 'airzakura@gmail.com', 'airzakura', '2014-08-05 03:28:57'),
(6, 'heisenberg@gmail.com', 'heisenberg', '2014-08-05 03:28:57'),
(7, 'areyes@yahoo.com', 'areyes', '2014-08-05 03:28:57'),
(51, 'menardjaycu1@gmail.com', 'menardcu', '2014-08-05 03:28:57'),
(52, 'salivatzxzxz', 'rafael', '2014-08-05 03:28:57'),
(53, 'syed@checkapp.asia', 'checkapp', '2014-08-05 03:28:57'),
(54, 'stella.bederi@hotmail.com', 'DrBederi', '2014-08-05 03:28:57'),
(55, 'raremon@gmail.com', 'raremon', '2014-08-05 03:28:57'),
(56, 'drteh@medicine.com.my', 'Alan Teh', '2014-08-05 03:28:57'),
(57, 'ooi.clinic@gmail.com', 'doc001', '2014-08-05 03:28:57'),
(58, 'rescarez@gmail.com', 'rescarez', '2014-08-05 03:28:57'),
(59, 'juan@me.me', 'juanto', '2014-08-05 03:28:57'),
(60, 'carla@carla.com', 'carla', '2014-08-05 03:28:57'),
(61, 'salivatears@yahoo.com', 'drrafael', '2014-08-05 03:28:57'),
(62, 'dardsmindworks@yahoo.com', 'Physician01', '2014-08-05 03:28:57'),
(63, 'edmarkharolds@gmail.com', 'dev', '2014-08-05 03:28:57'),
(64, 'git.japajarillo@gmail.com', 'git.japajarillo', '2014-08-05 03:28:57'),
(65, 'raremon2@gmail.com', 'raremon2', '2014-08-05 03:28:57'),
(69, 'ruelminds@yahoo.com', 'drjohn', '2014-08-05 03:28:57'),
(70, 'ruel@checkapp.asia', 'drken', '2014-08-05 03:28:57'),
(74, 'jtorres@yahoo.com', 'jtorres', '2014-08-05 03:28:57'),
(75, 'raremondoc2@docdoc.com', 'raremondoc2', '2014-08-05 03:28:57'),
(76, 'doctoredmark@yopmail.com', 'doctoredmark', '2014-08-05 03:28:57'),
(78, 'jmpajarillo@gmail.com', 'dpajarillo', '2014-08-05 03:28:57'),
(81, 'rellmon@doc.com', 'rellmondoc', '2014-08-05 03:28:57'),
(83, 'rianparungao@gmail.com', 'gabrielparungao', '2014-08-05 03:28:57'),
(85, 'lastroyy@gmail.com', 'lastroyy', '2014-08-05 03:28:57'),
(88, 'rizalnevado@yahoo.com', 'rizalnevado', '2014-11-20 15:50:38'),
(90, 'mail.vurmz@gmail.com', 'vdoctor1', '2014-11-21 08:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_detail`
--

CREATE TABLE IF NOT EXISTS `contact_detail` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `label` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `license_number`
--

CREATE TABLE IF NOT EXISTS `license_number` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `medical_school`
--

CREATE TABLE IF NOT EXISTS `medical_school` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `course` varchar(200) NOT NULL,
  `school_name` varchar(200) NOT NULL,
  `year_start` varchar(4) NOT NULL,
  `year_end` varchar(4) NOT NULL,
  `comments` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `data` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `label` text NOT NULL,
  `data` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
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
  `location` int(10) unsigned NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `title`, `first_name`, `middle_name`, `last_name`, `birthdate`, `gender`, `language`, `ethnicity`, `race`, `religion`, `marital`, `address`, `location`, `coord_lat`, `coord_lng`, `profile_pic`, `created`, `updated`) VALUES
(2, 'Prof.', 'Kenny', 'Ray', 'Rogers', '1985-07-04 00:00:00', 1, 'English, Filipino', 'Filipino', 'Nord', 'Septim', '1', 'P41-12, 6-11th Street, Villamor', 1, 14.5269243, 121.0149097, '53b61fa4bc1f3.jpeg', '2014-08-05 03:29:07', '2014-08-06 13:11:59'),
(6, 'Mr.', 'Walter', 'Hartwell', 'White', '1959-09-07 00:00:00', 1, '', '', '', '', '', '308 Negra Arroyo Lane', 0, 0, 0, '53b22241f2dd2.jpeg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(7, '', 'antonio', '', 'reyes', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(51, '2', 'Jane', '', 'Doe', '2014-01-28 00:00:00', 1, '', '', '', '', '', '', 0, 14.641809463501, 121.022964477539, '539d91040f3ed.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(52, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 14.641809463501, 121.022964477539, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(53, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 1, 40.0638163, -80.7231896, '54363634e7a9f.jpeg', '2014-08-05 03:29:07', '2014-10-09 07:16:07'),
(54, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(55, 'Mr.', 'Rellmon', 'P.', 'Ponce de Leon', '2012-09-03 00:00:00', 0, '', '', '', '', '', 'asdf asdf', 0, 37.7794841, -122.4295797, '53ad150ff3368.jpeg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(56, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(57, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(58, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(59, '2', 'Ruel Michael', '', 'Delfin', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(60, '2', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(61, '2', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(62, '2', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(63, '2', '', '', '', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 100, 100, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(64, 'Mr.', 'John Aldrin', '', 'Pajarillo', '1990-08-15 00:00:00', 1, '', '', '', '', '', '46 Kalakhan St., Calumpang', 0, 14.6133639, 121.0861841, '53b4e3171cf8b.jpeg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(65, '', 'raremon2', '', 'raremon2', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(69, '', 'John', '', 'Castro', '0000-00-00 00:00:00', 1, '', '', '', '', '', '', 0, 0, 0, '53b268eba1e76.png', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(70, '', 'Ken', '', 'Doe', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(74, '', 'Jose', '', 'Torres', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(75, '', 'raremon', '', 'doc', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(76, 'mr', 'Doctor', 'r', 'Edmark', '1987-06-09 00:00:00', 1, '', '', '', '', '', 'r', 0, 49.0134297, 49.0134297, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(78, '', 'drin', '', 'Pajarillo', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, '53b215afb6e42.jpeg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(81, '', 'RellmonDoc', '', 'PoncedeleonDoc', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(83, 'Mr.', 'gabriel', '', 'parungao', '1930-04-17 00:00:00', 0, '', '', '', '', '', 'Manggahan Village', 0, 14.5132218, 121.0403226, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(85, 'Mr.', '', '', '', '1990-06-20 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-08-05 03:29:07', '0000-00-00 00:00:00'),
(88, '', 'Rizal', '', 'Nevado', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-11-20 15:50:38', '0000-00-00 00:00:00'),
(90, '', 'Vilmer', '', 'Morales', '0000-00-00 00:00:00', 0, '', '', '', '', '', '', 0, 0, 0, 'default.jpg', '2014-11-21 08:43:03', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `user_id` int(10) unsigned NOT NULL,
  `setting_id` int(10) unsigned NOT NULL,
  `value` varchar(100) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE IF NOT EXISTS `specialization` (
  `user_id` int(10) unsigned NOT NULL,
  `specialization_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `verification`
--

CREATE TABLE IF NOT EXISTS `verification` (
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(500) NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verification`
--

INSERT INTO `verification` (`user_id`, `code`, `status`, `created`, `updated`) VALUES
(88, '67c7fdf72d530ade9ad9926667ed21cf', 1, '2014-11-20 23:50:38', '2014-11-20 15:58:56'),
(90, '95dc4cccb42bc5d1e3dac2ecf04e09fe', 1, '2014-11-21 16:43:03', '2014-11-21 08:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `verification_document`
--

CREATE TABLE IF NOT EXISTS `verification_document` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `file` text NOT NULL,
  `status` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_detail`
--
ALTER TABLE `contact_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license_number`
--
ALTER TABLE `license_number`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_school`
--
ALTER TABLE `medical_school`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`user_id`,`setting_id`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
 ADD PRIMARY KEY (`user_id`,`specialization_id`);

--
-- Indexes for table `verification`
--
ALTER TABLE `verification`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `verification_document`
--
ALTER TABLE `verification_document`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `contact_detail`
--
ALTER TABLE `contact_detail`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `license_number`
--
ALTER TABLE `license_number`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_school`
--
ALTER TABLE `medical_school`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `verification_document`
--
ALTER TABLE `verification_document`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
