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
-- Database: `dev_messaging`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL,
  `from` varchar(255) NOT NULL,
  `from_fullname` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `to_fullname` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `thread`
--

CREATE TABLE IF NOT EXISTS `thread` (
`id` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `user_id_1` int(10) unsigned NOT NULL,
  `user_type_1` int(10) unsigned NOT NULL,
  `user_id_2` int(10) unsigned NOT NULL,
  `user_type_2` int(10) unsigned NOT NULL,
  `subject` text NOT NULL,
  `user_read_1` int(11) NOT NULL,
  `user_read_2` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `thread_message`
--

CREATE TABLE IF NOT EXISTS `thread_message` (
`id` int(10) unsigned NOT NULL,
  `thread_id` int(10) unsigned NOT NULL,
  `user_from` int(10) unsigned NOT NULL,
  `user_from_type` int(10) unsigned NOT NULL,
  `user_to` int(10) unsigned NOT NULL,
  `user_to_type` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `status` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread`
--
ALTER TABLE `thread`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thread_message`
--
ALTER TABLE `thread_message`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thread`
--
ALTER TABLE `thread`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `thread_message`
--
ALTER TABLE `thread_message`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
