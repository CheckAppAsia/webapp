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
-- Database: `dev_documents`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE IF NOT EXISTS `document` (
  `document_id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `member_profile` int(10) unsigned NOT NULL,
  `provider_profile` int(10) unsigned NOT NULL,
  `institution_profile` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `emr`
--

CREATE TABLE IF NOT EXISTS `emr` (
  `document_id` int(10) unsigned NOT NULL
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
-- Table structure for table `institution_profile`
--

CREATE TABLE IF NOT EXISTS `institution_profile` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Table structure for table `simple`
--

CREATE TABLE IF NOT EXISTS `simple` (
  `document_id` int(10) unsigned NOT NULL,
  `chief_complaint` text NOT NULL,
  `assessment` text NOT NULL,
  `plan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE IF NOT EXISTS `user_profile` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_type` int(10) unsigned NOT NULL,
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
  `street` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `coord_lat` double NOT NULL,
  `coord_lng` double NOT NULL,
  `profile_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
 ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `emr`
--
ALTER TABLE `emr`
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
-- Indexes for table `institution_profile`
--
ALTER TABLE `institution_profile`
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
-- Indexes for table `simple`
--
ALTER TABLE `simple`
 ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

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
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
