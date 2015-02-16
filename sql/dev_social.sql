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
-- Database: `dev_social`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `user_id_1` int(10) unsigned NOT NULL,
  `user_id_2` int(10) unsigned NOT NULL,
  `status_1` int(10) unsigned NOT NULL,
  `status_2` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(10) unsigned NOT NULL,
  `user_type` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `target_type` int(10) unsigned NOT NULL,
  `target_id` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `attach_type` int(10) unsigned NOT NULL,
  `attach_data` text NOT NULL,
  `privacy` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE IF NOT EXISTS `post_comment` (
`id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `user_type` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE IF NOT EXISTS `post_like` (
  `post_id` int(10) unsigned NOT NULL,
  `user_type` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE IF NOT EXISTS `subscription` (
  `user_id` int(10) unsigned NOT NULL,
  `physician_id` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_albums`
--

CREATE TABLE IF NOT EXISTS `user_albums` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_photos`
--

CREATE TABLE IF NOT EXISTS `user_photos` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `album_id` int(10) unsigned NOT NULL,
  `caption` text NOT NULL,
  `filename` text NOT NULL,
  `date_taken` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`user_id_1`,`user_id_2`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comment`
--
ALTER TABLE `post_comment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
 ADD PRIMARY KEY (`post_id`,`user_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
 ADD PRIMARY KEY (`user_id`,`physician_id`);

--
-- Indexes for table `user_albums`
--
ALTER TABLE `user_albums`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_photos`
--
ALTER TABLE `user_photos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post_comment`
--
ALTER TABLE `post_comment`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_albums`
--
ALTER TABLE `user_albums`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_photos`
--
ALTER TABLE `user_photos`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
