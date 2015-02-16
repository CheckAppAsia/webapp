-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 16, 2014 at 04:00 PM
-- Server version: 5.6.19
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_institution`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
`id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `schedule` datetime NOT NULL,
  `start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_log`
--

CREATE TABLE IF NOT EXISTS `appointment_log` (
`id` int(10) unsigned NOT NULL,
  `appointment_id` int(10) unsigned NOT NULL,
  `staff_from` int(10) unsigned NOT NULL,
  `staff_to` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE IF NOT EXISTS `availability` (
`id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `day` int(10) unsigned NOT NULL,
  `hour_start` int(10) unsigned NOT NULL,
  `hour_end` int(10) unsigned NOT NULL,
  `by_provider` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `label` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `remarks` text NOT NULL,
  `by_staff_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_lab`
--

CREATE TABLE IF NOT EXISTS `diagnostic_lab` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `contents` text NOT NULL,
  `date_taken` datetime NOT NULL,
  `attachment` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_radiology`
--

CREATE TABLE IF NOT EXISTS `diagnostic_radiology` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `summary` varchar(200) NOT NULL,
  `contents` text NOT NULL,
  `date_taken` datetime NOT NULL,
  `attachment` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
`id` int(10) unsigned NOT NULL,
  `appointment_id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_emr`
--

CREATE TABLE IF NOT EXISTS `document_emr` (
  `document_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `document_simple`
--

CREATE TABLE IF NOT EXISTS `document_simple` (
  `document_id` int(10) unsigned NOT NULL,
  `chief_complaint` text NOT NULL,
  `assessment` text NOT NULL,
  `plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emr_assessment`
--

CREATE TABLE IF NOT EXISTS `emr_assessment` (
`id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `disease_name` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emr_diagnostic`
--

CREATE TABLE IF NOT EXISTS `emr_diagnostic` (
  `document_id` int(10) unsigned NOT NULL,
  `diagnostic_type` int(10) unsigned NOT NULL,
  `diagnostic_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emr_plan`
--

CREATE TABLE IF NOT EXISTS `emr_plan` (
`id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `contents` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `emr_subjective`
--

CREATE TABLE IF NOT EXISTS `emr_subjective` (
  `document_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `contents` text NOT NULL,
  `source` int(10) unsigned NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emr_system_based`
--

CREATE TABLE IF NOT EXISTS `emr_system_based` (
  `document_id` int(10) unsigned NOT NULL,
  `body_system` int(10) unsigned NOT NULL,
  `content` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `institution`
--

CREATE TABLE IF NOT EXISTS `institution` (
  `id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `location` int(10) unsigned NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `institution_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `by_provider` int(10) unsigned NOT NULL,
  `remarks` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE IF NOT EXISTS `prescription` (
`id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `member_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `med_brand` text NOT NULL,
  `med_generic` text NOT NULL,
  `med_type` int(10) unsigned NOT NULL,
  `med_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `instructions` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referral_diagnostic`
--

CREATE TABLE IF NOT EXISTS `referral_diagnostic` (
`id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `diagnostic_name` text NOT NULL,
  `diagnostic_type` int(10) unsigned NOT NULL,
  `remarks` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referral_institution`
--

CREATE TABLE IF NOT EXISTS `referral_institution` (
`id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `institution_name` text NOT NULL,
  `admission` tinyint(1) NOT NULL,
  `remarks` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `referral_provider`
--

CREATE TABLE IF NOT EXISTS `referral_provider` (
`id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `physician_name` text NOT NULL,
  `remarks` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
`id` int(10) unsigned NOT NULL,
  `institution_id` int(10) unsigned NOT NULL,
  `name` text NOT NULL,
  `remarks` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `institution_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `role` varchar(200) NOT NULL,
  `date_started` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` text NOT NULL,
  `by_provider` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_access`
--

CREATE TABLE IF NOT EXISTS `staff_access` (
  `institution_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `access_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `by_provider` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_schedule`
--

CREATE TABLE IF NOT EXISTS `staff_schedule` (
  `institution_id` int(10) unsigned NOT NULL,
  `provider_id` int(10) unsigned NOT NULL,
  `day` int(10) unsigned NOT NULL,
  `shift_start` int(10) unsigned NOT NULL,
  `shift_end` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_log`
--
ALTER TABLE `appointment_log`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_lab`
--
ALTER TABLE `diagnostic_lab`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_radiology`
--
ALTER TABLE `diagnostic_radiology`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
 ADD PRIMARY KEY (`id`,`institution_id`);

--
-- Indexes for table `document_emr`
--
ALTER TABLE `document_emr`
 ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_simple`
--
ALTER TABLE `document_simple`
 ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `emr_assessment`
--
ALTER TABLE `emr_assessment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emr_diagnostic`
--
ALTER TABLE `emr_diagnostic`
 ADD PRIMARY KEY (`document_id`,`diagnostic_id`);

--
-- Indexes for table `emr_plan`
--
ALTER TABLE `emr_plan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emr_subjective`
--
ALTER TABLE `emr_subjective`
 ADD PRIMARY KEY (`document_id`,`type`);

--
-- Indexes for table `emr_system_based`
--
ALTER TABLE `emr_system_based`
 ADD PRIMARY KEY (`document_id`,`body_system`);

--
-- Indexes for table `institution`
--
ALTER TABLE `institution`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
 ADD PRIMARY KEY (`institution_id`,`member_id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_diagnostic`
--
ALTER TABLE `referral_diagnostic`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_institution`
--
ALTER TABLE `referral_institution`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_provider`
--
ALTER TABLE `referral_provider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`institution_id`,`provider_id`);

--
-- Indexes for table `staff_access`
--
ALTER TABLE `staff_access`
 ADD PRIMARY KEY (`institution_id`,`provider_id`,`access_id`);

--
-- Indexes for table `staff_schedule`
--
ALTER TABLE `staff_schedule`
 ADD PRIMARY KEY (`institution_id`,`provider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `appointment_log`
--
ALTER TABLE `appointment_log`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagnostic_lab`
--
ALTER TABLE `diagnostic_lab`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diagnostic_radiology`
--
ALTER TABLE `diagnostic_radiology`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emr_assessment`
--
ALTER TABLE `emr_assessment`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emr_plan`
--
ALTER TABLE `emr_plan`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referral_diagnostic`
--
ALTER TABLE `referral_diagnostic`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referral_institution`
--
ALTER TABLE `referral_institution`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `referral_provider`
--
ALTER TABLE `referral_provider`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
