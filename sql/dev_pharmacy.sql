-- phpMyAdmin SQL Dump
-- version 4.2.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 07, 2015 at 07:52 PM
-- Server version: 5.6.19
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dev_pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `pharmacies`
--

CREATE TABLE IF NOT EXISTS `pharmacies` (
`pharma_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `date_created` int(32) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`pharma_id`, `code`, `name`, `address`, `phone_number`, `email_address`, `status`, `date_created`) VALUES
(1, 'PHARMA', 'CheckPharmacy', 'Makati City, Philippines', '2341123', 'pharmacy@checkapp.asia', 1, 1420573135),
(2, 'GENPHARMA', 'Checkapp Generic Pharmacy', 'Makati City, Philippines', '23411232', 'pharmacy_generics@checkapp.asia', 1, 1420573135);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_branches`
--

CREATE TABLE IF NOT EXISTS `pharmacy_branches` (
`branch_id` int(11) NOT NULL,
  `pharma_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `email_address` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `date_created` int(32) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pharmacy_branches`
--

INSERT INTO `pharmacy_branches` (`branch_id`, `pharma_id`, `code`, `name`, `address`, `phone_number`, `email_address`, `status`, `date_created`) VALUES
(1, 1, 'GILPUYAT1', 'Gil Puyat', 'Testing address, Gil Puyat Ave, Pasay City', '1234567', 'gilpuyat@pharma.com', 1, 1420573135),
(2, 2, 'GENERIC1', 'Mayapis Generics', 'Cityland Tower 1, Mayapis, Makati City', '1234567', 'mayapis@genericpharma.com', 1, 1420573135);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_branch_products`
--

CREATE TABLE IF NOT EXISTS `pharmacy_branch_products` (
`branch_product_id` int(32) NOT NULL,
  `pharma_branch_id` int(32) NOT NULL,
  `product_type` int(2) NOT NULL,
  `medicine_id` int(32) NOT NULL,
  `stock_code` varchar(255) NOT NULL,
  `stock_name` varchar(255) NOT NULL,
  `stock_count` int(32) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` int(32) NOT NULL,
  `created_by` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_medicines`
--

CREATE TABLE IF NOT EXISTS `pharmacy_medicines` (
`pharma_medic_id` int(11) NOT NULL,
  `pharma_id` int(11) NOT NULL,
  `medicine_id` int(11) NOT NULL,
  `status` int(2) DEFAULT '0',
  `date_created` int(32) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_transactions`
--

CREATE TABLE IF NOT EXISTS `pharmacy_transactions` (
`txn_id` int(11) NOT NULL,
  `pharma_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `order_ref_no` varchar(100) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `total_qty` int(32) NOT NULL,
  `total_amt` decimal(10,2) NOT NULL,
  `status` int(2) DEFAULT '99',
  `date_created` int(32) DEFAULT NULL,
  `date_processed` int(32) DEFAULT NULL,
  `processed_by` int(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_transaction_details`
--

CREATE TABLE IF NOT EXISTS `pharmacy_transaction_details` (
`pharma_txn_detail_id` int(32) NOT NULL,
  `reference_no` varchar(255) NOT NULL,
  `date_created` int(32) DEFAULT NULL,
  `product_id` int(32) NOT NULL,
  `product_type` int(2) NOT NULL,
  `qty` int(32) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_users`
--

CREATE TABLE IF NOT EXISTS `pharmacy_users` (
`user_id` int(32) NOT NULL,
  `pharma_id` int(11) NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `user_type` int(2) DEFAULT NULL,
  `main_user_id` int(32) NOT NULL,
  `status` int(2) DEFAULT '0',
  `date_created` int(32) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pharmacy_users`
--

INSERT INTO `pharmacy_users` (`user_id`, `pharma_id`, `branch_id`, `fname`, `lname`, `user_type`, `main_user_id`, `status`, `date_created`) VALUES
(1, 1, 1, 'Rellmon', 'Ponce de Leon', 1, 133, 1, 1420573135),
(2, 1, 1, 'Rare', 'Mon', 1, 134, 2, 1420659097),
(3, 1, 0, 'Admin', 'Pharmacy', 1, 135, 1, 1420573135),
(4, 2, 0, 'Admin', 'Generic Pharmacy', 1, 136, 1, 1420573135),
(5, 2, 2, 'Maya', 'Pis', 1, 137, 2, 1420660059);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
 ADD PRIMARY KEY (`pharma_id`);

--
-- Indexes for table `pharmacy_branches`
--
ALTER TABLE `pharmacy_branches`
 ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `pharmacy_branch_products`
--
ALTER TABLE `pharmacy_branch_products`
 ADD PRIMARY KEY (`branch_product_id`);

--
-- Indexes for table `pharmacy_medicines`
--
ALTER TABLE `pharmacy_medicines`
 ADD PRIMARY KEY (`pharma_medic_id`);

--
-- Indexes for table `pharmacy_transactions`
--
ALTER TABLE `pharmacy_transactions`
 ADD PRIMARY KEY (`txn_id`), ADD UNIQUE KEY `order_ref_no` (`order_ref_no`);

--
-- Indexes for table `pharmacy_transaction_details`
--
ALTER TABLE `pharmacy_transaction_details`
 ADD PRIMARY KEY (`pharma_txn_detail_id`);

--
-- Indexes for table `pharmacy_users`
--
ALTER TABLE `pharmacy_users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
MODIFY `pharma_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacy_branches`
--
ALTER TABLE `pharmacy_branches`
MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pharmacy_branch_products`
--
ALTER TABLE `pharmacy_branch_products`
MODIFY `branch_product_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_medicines`
--
ALTER TABLE `pharmacy_medicines`
MODIFY `pharma_medic_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_transactions`
--
ALTER TABLE `pharmacy_transactions`
MODIFY `txn_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_transaction_details`
--
ALTER TABLE `pharmacy_transaction_details`
MODIFY `pharma_txn_detail_id` int(32) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pharmacy_users`
--
ALTER TABLE `pharmacy_users`
MODIFY `user_id` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
