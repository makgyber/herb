-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2015 at 12:29 AM
-- Server version: 5.6.22
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `herb`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `FillCalendar`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `FillCalendar`(IN `start_date` DATE, IN `end_date` DATE)
    NO SQL
BEGIN
    DECLARE crt_date DATE;
    SET crt_date = start_date;
    WHILE crt_date <= end_date DO
        INSERT IGNORE INTO all_dates VALUES(crt_date);
        SET crt_date = ADDDATE(crt_date, INTERVAL 1 DAY);
    END WHILE;
	END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `card_types`
--

DROP TABLE IF EXISTS `card_types`;
CREATE TABLE IF NOT EXISTS `card_types` (
`id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_types`
--

INSERT INTO `card_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AMEX', '2015-12-07 07:32:48', '2015-12-07 07:32:48'),
(2, 'JBC', '2015-12-07 07:33:37', '2015-12-07 07:33:37'),
(3, 'Visa', '2015-12-07 07:33:44', '2015-12-07 07:33:44'),
(4, 'Mastercard', '2015-12-07 07:33:51', '2015-12-07 07:33:51'),
(5, 'BDO Card', '2015-12-07 07:34:00', '2015-12-07 07:34:00'),
(6, 'Express Net', '2015-12-07 07:34:09', '2015-12-07 07:34:09'),
(7, 'Megalink', '2015-12-07 07:34:18', '2015-12-07 07:34:18'),
(8, 'BancNet', '2015-12-07 07:34:25', '2015-12-07 07:34:25'),
(9, 'BPI', '2015-12-07 15:44:26', '2015-12-07 07:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `finance_charges`
--

DROP TABLE IF EXISTS `finance_charges`;
CREATE TABLE IF NOT EXISTS `finance_charges` (
`id` int(11) NOT NULL,
  `card_type_id` int(11) NOT NULL,
  `account_type` varchar(10) NOT NULL,
  `charge` decimal(11,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance_charges`
--

INSERT INTO `finance_charges` (`id`, `card_type_id`, `account_type`, `charge`, `created_at`, `updated_at`) VALUES
(1, 5, 'credit', '3.50', '2015-12-07 08:05:08', '2015-12-07 08:05:08'),
(2, 5, 'debit', '2.00', '2015-12-07 08:05:29', '2015-12-07 08:05:29'),
(3, 9, 'credit', '2.80', '2015-12-07 08:05:51', '2015-12-07 08:05:51'),
(4, 9, 'credit', '2.20', '2015-12-07 08:06:07', '2015-12-07 08:06:07'),
(5, 9, 'debit', '2.73', '2015-12-07 08:06:24', '2015-12-07 08:06:24'),
(6, 9, 'debit', '2.00', '2015-12-07 08:06:34', '2015-12-07 08:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `partner_discounts`
--

DROP TABLE IF EXISTS `partner_discounts`;
CREATE TABLE IF NOT EXISTS `partner_discounts` (
`id` mediumint(9) NOT NULL,
  `partner_id` int(11) NOT NULL,
  `discount` decimal(11,2) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `partner_discounts`
--

INSERT INTO `partner_discounts` (`id`, `partner_id`, `discount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, '10.00', 'Regular Discount', '2015-12-07 08:15:14', '2015-12-07 08:15:14'),
(2, 2, '20.00', 'Special Discount', '2015-12-07 08:15:29', '2015-12-07 08:15:29'),
(3, 3, '25.00', 'Holiday Discount', '2015-12-07 08:15:43', '2015-12-07 08:15:43'),
(4, 4, '15.00', 'Online Discount', '2015-12-07 08:16:04', '2015-12-07 08:16:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_types`
--
ALTER TABLE `card_types`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_charges`
--
ALTER TABLE `finance_charges`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_discounts`
--
ALTER TABLE `partner_discounts`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_types`
--
ALTER TABLE `card_types`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `finance_charges`
--
ALTER TABLE `finance_charges`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `partner_discounts`
--
ALTER TABLE `partner_discounts`
MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

ALTER TABLE `occupancy` ADD `discount_rate` DECIMAL(11,2) NOT NULL DEFAULT '0.00' ;
ALTER TABLE `occupancy` CHANGE `actual_checkout` `actual_checkout` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00';
ALTER TABLE `guests` ADD `created_at` TIMESTAMP NOT NULL , ADD `updated_at` TIMESTAMP NOT NULL ;
ALTER TABLE `room_sales` CHANGE `order_code` `order_code` BIGINT(11) NOT NULL DEFAULT '0';
ALTER TABLE `fnb_sales` CHANGE `order_code` `order_code` BIGINT(11) NOT NULL DEFAULT '0';
ALTER TABLE `room_sales` CHANGE `post_shift` `post_shift` INT(11) NULL;
ALTER TABLE `room_sales` CHANGE `regflag` `regflag` BIGINT(20) NULL, CHANGE `regdate` `regdate` DATE NULL, CHANGE `regshift` `regshift` INT(11) NULL;
ALTER TABLE `salesreceipts` CHANGE `sas_cat_id` `sas_cat_id` INT(11) NULL, CHANGE `reference_id` `reference_id` INT(11) NULL, CHANGE `update_by` `update_by` INT(11) NULL;
ALTER TABLE `partner_transactions` ADD `created_at` TIMESTAMP NOT NULL , ADD `updated_at` TIMESTAMP NOT NULL ;
ALTER TABLE `partner_transactions` ADD `discount` DECIMAL(10,2) NOT NULL DEFAULT '0.00' AFTER `result_status`;
ALTER TABLE `occupancy_log` CHANGE `update_by` `update_by` INT(11) NULL, CHANGE `remarks` `remarks` VARCHAR(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, CHANGE `transaction_type` `transaction_type` VARCHAR(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `room_sales` CHANGE `remarks` `remarks` TEXT CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL;
ALTER TABLE `reserve_rooms` ADD `created_at` TIMESTAMP NOT NULL , ADD `updated_at` TIMESTAMP NOT NULL ;
ALTER TABLE `temp_occupancy` ADD `discount_rate` DECIMAL(11,2) NOT NULL DEFAULT '0.00' ;
