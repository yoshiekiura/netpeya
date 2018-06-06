-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2018 at 03:47 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xannia`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_types`
--

CREATE TABLE IF NOT EXISTS `account_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `ts_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `account_types`
--

INSERT INTO `account_types` (`id`, `name`, `ts_created`, `ts_modified`) VALUES
(1, 'Business', '2018-01-13 01:31:05', '2018-01-13 01:31:05'),
(2, 'Personal', '2018-01-13 01:31:05', '2018-01-13 01:31:05');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dial_code` varchar(5) NOT NULL,
  `cell_mumber_length` int(11) NOT NULL,
  `code` varchar(5) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `flag_image` varchar(255) NOT NULL,
  `ts_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `dial_code`, `cell_mumber_length`, `code`, `currency_code`, `flag_image`, `ts_created`, `ts_modified`) VALUES
(1, 'South Africa', '+27', 10, 'ZA', 'ZAR', '', '2018-01-13 01:41:06', '2018-01-13 01:41:06'),
(2, 'Zimbabwe', '+263', 9, 'ZW', 'USD', '', '2018-01-13 01:41:39', '2018-01-13 01:41:39');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(5) NOT NULL,
  `simbol` varchar(2) NOT NULL,
  `ts_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `simbol`, `ts_created`, `ts_modified`) VALUES
(1, 'US Dollar', 'USD', '$', '2018-01-13 01:39:39', '2018-01-13 01:39:39'),
(2, 'European Union', 'EUR', '€', '2018-01-13 01:39:39', '2018-01-13 01:39:39'),
(3, 'British Pound', 'GBP', '£', '2018-01-13 01:39:39', '2018-01-13 01:39:39'),
(4, 'South African Rand', 'ZAR', 'R', '2018-01-13 01:39:39', '2018-01-13 01:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `exchange_rates`
--

CREATE TABLE IF NOT EXISTS `exchange_rates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(5) NOT NULL,
  `to` varchar(5) NOT NULL,
  `rates` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `exchange_rates`
--

INSERT INTO `exchange_rates` (`id`, `from`, `to`, `rates`, `created`, `modified`) VALUES
(1, 'USD', 'EUR', '0.81162', '2018-04-02 09:15:45', '2018-04-02 09:15:45'),
(2, 'EUR', 'USD', '1.2321', '2018-04-02 09:32:23', '2018-04-02 10:35:47'),
(3, 'USD', 'ZAR', '11.823', '2018-04-02 12:50:21', '2018-04-04 09:18:41'),
(4, 'USD', 'GBP', '0.71111', '2018-04-02 14:53:01', '2018-04-04 09:35:42'),
(5, 'GBP', 'USD', '1.4063', '2018-04-02 14:53:39', '2018-04-03 23:07:44'),
(6, 'ZAR', 'USD', '0.084579', '2018-04-03 21:15:42', '2018-04-03 22:25:04'),
(7, 'ZAR', 'GBP', '0.060145', '2018-04-03 23:08:14', '2018-04-03 23:08:14'),
(8, 'GBP', 'ZAR', '16.626', '2018-04-03 23:43:21', '2018-04-04 09:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(1, '197.184.180.222', 'sipunzisikha@gmail.com', '2018-03-22 09:13:03'),
(2, '197.184.180.222', 'sipunzisikha@gmail.com', '2018-03-22 09:17:29'),
(3, '197.184.180.222', 'jaysip2009@gmail.com', '2018-03-22 10:00:55'),
(4, '197.184.180.222', 'jaysip2009@gmail.com', '2018-03-22 10:01:07'),
(5, '197.184.180.222', 'jaysip2009@gmail.com', '2018-03-22 10:01:23'),
(6, '197.184.63.118', 'sikhasipunzi@gmail.com', '2018-03-26 20:38:46'),
(7, '197.184.63.118', 'sikhasipunzi@gmail.com', '2018-03-26 20:40:21'),
(8, '197.184.63.118', 'sikhasipunzi@gmail.com', '2018-03-26 20:40:35'),
(9, '196.22.244.102', 'xanniapay@gmail.com', '2018-03-27 11:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `name` varchar(100) NOT NULL,
  `slag` varchar(100) NOT NULL,
  `html_form` varchar(20) NOT NULL,
  `external_fee` decimal(15,2) NOT NULL,
  `internal_fee` decimal(15,2) NOT NULL,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `is_active`, `name`, `slag`, `html_form`, `external_fee`, `internal_fee`, `ts_created`, `ts_modified`) VALUES
(1, 1, 'Neteller', 'neteller', 'neteller', '0.00', '1.25', '2018-03-18 15:06:23', '2018-03-18 15:06:23'),
(2, 1, 'Visa Card', 'visa', 'card', '1.25', '2.25', '2018-03-18 15:07:49', '2018-03-18 15:07:49'),
(3, 1, 'Bank Transfer', 'bank-transfer', 'banktransfer', '0.00', '0.00', '2018-03-18 15:07:49', '2018-03-18 15:07:49'),
(4, 1, 'Mastercard', 'mastercard', 'card', '1.25', '2.25', '2018-03-18 15:08:10', '2018-03-18 15:08:10');

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE IF NOT EXISTS `payment_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` tinyint(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `status_code`, `name`) VALUES
(1, 1, 'Pending'),
(2, 2, 'Approved'),
(3, 3, 'Declined');

-- --------------------------------------------------------

--
-- Table structure for table `recipients`
--

CREATE TABLE IF NOT EXISTS `recipients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `recipients`
--

INSERT INTO `recipients` (`id`, `user_id`, `recipient_id`, `ts_created`, `ts_modified`) VALUES
(4, 1, 3, '2018-04-02 14:01:34', '2018-04-02 14:01:34'),
(5, 1, 4, '2018-04-02 14:46:13', '2018-04-02 14:46:13'),
(6, 43, 45, '2018-04-02 07:54:13', '2018-04-02 07:54:13'),
(7, 43, 53, '2018-04-02 09:01:53', '2018-04-02 09:01:53'),
(8, 43, 47, '2018-04-04 02:36:06', '2018-04-04 02:36:06');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `name`, `ts_created`, `ts_modified`) VALUES
(1, 'Money In', '2018-02-05 22:34:12', '2018-02-05 22:34:12'),
(2, 'Money Out', '2018-02-05 22:34:12', '2018-02-05 22:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `account_type` int(2) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `xannia_number` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email_address` varchar(254) NOT NULL,
  `bt_id` varchar(100) DEFAULT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` datetime DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company_name` varchar(100) DEFAULT NULL,
  `cell_number` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `address_verified` tinyint(1) NOT NULL DEFAULT '0',
  `bank_account_verified` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `account_type`, `ip_address`, `xannia_number`, `password`, `salt`, `email_address`, `bt_id`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `is_active`, `first_name`, `last_name`, `company_name`, `cell_number`, `date_of_birth`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `email_verified`, `address_verified`, `bank_account_verified`, `last_login`, `ts_created`, `ts_modified`) VALUES
(43, 1, 2, '197.184.21.239', 'XP103452431842', '$2y$08$kFVTfQj9ItupTooCxbyfgOK6ZGFDMJcKqYNtWBTUXXYzKeuPYIake', NULL, 'ati2ude1@gmail.com', '262840601', NULL, NULL, NULL, NULL, 1, 'Emmanuel', 'Mahaso', NULL, NULL, NULL, '84 On Parklands main Rd', '16', 'Cape Town', 'Western Cape', '7441', 0, 0, 0, '2018-04-04 07:24:57', '2018-03-18 07:43:24', '2018-03-18 07:43:24'),
(44, 1, 0, '197.184.117.55', 'XP409124164546', '$2y$08$9r.RaEde6222c7L2TTDiPu2dMUL4i2AQzduXQgJKBxHTH1lBrEMBC', NULL, 'sipunzisikha@gmail.com', '285575396', NULL, NULL, NULL, NULL, 1, 'sikha', 'sipunzi', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-18 21:29:09', '2018-03-18 13:54:29', '2018-03-18 13:54:29'),
(45, 1, 0, '196.22.244.102', 'XP115024554549', '$2y$08$eu.d8ToMrBJn3Yn2AoMKwe2uOhLn5YJn2IoxE3wfNIXz1qdh9/Cpm', NULL, 'maka@gmail.com', '184790536', NULL, NULL, NULL, NULL, 1, 'Makanaka', 'Mahaso', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-22 08:20:04', '2018-03-20 04:08:15', '2018-03-20 04:08:15'),
(46, 1, 0, '197.184.180.222', 'XP150472175641', '$2y$08$fIp8aNcQhMzjQ3/SpzvsfuXVV.LB2AqbnQVMUtD1iFAOXS5GDS0yW', NULL, 'sikhasipunzi@gmail.com', '553380249', NULL, NULL, NULL, NULL, 1, 'Sikhanyiso', 'Sipunzi', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-22 09:21:15', '2018-03-22 02:21:15', '2018-03-22 02:21:15'),
(47, 1, 2, '196.22.244.102', 'XP054172164761', '$2y$08$kzG8ewakTjTvV63ilK69gOXwDnPa7dFnzY3oJdTL34qRT.H2HBZK.', NULL, 'thuthuhlatshwayo@gmail.com', '510945736', NULL, NULL, NULL, NULL, 1, 'Thuthu', 'Hlatshwayo', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-22 09:24:24', '2018-03-22 02:24:24', '2018-03-22 02:24:24'),
(48, 1, 0, '197.184.180.222', 'XP122179249581', '$2y$08$HZzgU4T4E3QjHwyos.uJnOMJvvUHTlah9Nw.H/OjNFd55fMspTNA6', NULL, 'jaysip2009@gmail.com', '535728681', NULL, NULL, NULL, NULL, 1, 'sikha', 'sipu', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-22 03:02:09', '2018-03-22 03:02:09', '2018-03-22 03:02:09'),
(49, 1, 0, '197.184.180.222', 'XP719349922151', '$2y$08$wzY/HZY/TJn3gTVcN5/IUO.EIh35Om9BqCSiL4cJ4wv.dd6LhASZi', NULL, 'makerealmoney01@gmail.com', '259935346', NULL, NULL, NULL, NULL, 1, 'sikha', 'sipu', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-22 10:03:13', '2018-03-22 03:03:13', '2018-03-22 03:03:13'),
(50, 1, 0, '41.151.109.148', 'XP041570155782', '$2y$08$wisSyl2BbKFIP2O2cyrzIuDLLblp1sx6.7BeI56gi85BjBkjJ8.3m', NULL, 'suekondowe@gmail.com', '659765419', NULL, NULL, NULL, NULL, 1, 'Susan', 'Kondowe', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-23 11:29:37', '2018-03-23 04:29:37', '2018-03-23 04:29:37'),
(51, 1, 0, '197.184.63.118', 'XP221517569209', '$2y$08$Zy9EPti/Mp8WtK6zJ6gFeOh0ed2e3AAO6rF6iSdaWg/X6p4elp.PC', NULL, 'happysipunzi@gmail.com', '241714216', NULL, NULL, NULL, NULL, 1, 'sikha', 'Sipunzi', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-03-26 20:42:07', '2018-03-26 13:42:07', '2018-03-26 13:42:07'),
(52, 1, 2, '197.184.58.199', 'XP567757215222', '$2y$08$CDyLv/H98WmYteOd9cXhx.pcUO7r5zoA60mycQD.nRQQtD/PvD7pa', NULL, 'oleen@gmail.com', '853152251', NULL, NULL, NULL, NULL, 1, 'Oleen', 'Chitewo', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-04-01 06:06:17', '2018-03-31 23:06:17', '2018-03-31 23:06:17'),
(53, 0, 0, '197.184.58.199', 'XP432156180592', '0', NULL, 'mugo@gmail.com', '623467883', '33125f3f9a0ba4dc4f01493825c89ad812b21838', NULL, NULL, NULL, 0, '', '', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 0, 0, 0, '2018-04-02 09:01:50', '2018-04-02 09:01:50', '2018-04-02 09:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(17, 43, 2),
(18, 44, 2),
(19, 45, 2),
(20, 46, 2),
(21, 47, 2),
(22, 48, 2),
(23, 49, 2),
(24, 50, 2),
(25, 51, 2),
(26, 52, 2),
(27, 53, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_transactions`
--

CREATE TABLE IF NOT EXISTS `user_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `user_transactions`
--

INSERT INTO `user_transactions` (`id`, `transaction_type_id`, `user_id`, `wallet_id`, `description`, `amount`, `status`, `ts_created`, `ts_modified`) VALUES
(95, 1, 45, 80, 'Transfer from Emmanuel Mahaso', '200.00', 2, '2018-03-21 22:12:13', '2018-03-22 05:12:13'),
(94, 1, 43, 72, 'Card Deposit to USD - US Dollar', '200.00', 2, '2018-03-21 22:11:48', '2018-03-22 05:11:48'),
(92, 1, 45, 81, 'Transfer from Emmanuel Mahaso', '2700.00', 2, '2018-03-21 21:59:26', '2018-03-22 04:59:26'),
(91, 2, 43, 79, 'Transfer to Makanaka Mahaso', '400.00', 2, '2018-03-21 21:54:25', '2018-03-22 04:54:25'),
(90, 1, 45, 86, 'Transfer from Emmanuel Mahaso', '400.00', 2, '2018-03-21 21:54:25', '2018-03-22 04:54:25'),
(89, 2, 43, 72, 'Transfer to Makanaka Mahaso', '300.00', 2, '2018-03-21 21:53:25', '2018-03-22 04:53:25'),
(102, 2, 43, 72, 'Transfer to Makanaka Mahaso', '124.21', 2, '2018-04-02 02:34:15', '2018-04-02 09:34:15'),
(88, 1, 45, 80, 'Transfer from Emmanuel Mahaso', '300.00', 2, '2018-03-21 21:53:25', '2018-03-22 04:53:25'),
(103, 1, 45, 81, 'Transfer from Emmanuel Mahaso', '99.00', 2, '2018-04-02 03:36:07', '2018-04-02 10:36:07'),
(101, 1, 45, 81, 'Transfer from Emmanuel Mahaso', '99.00', 2, '2018-04-02 02:34:15', '2018-04-02 09:34:15'),
(86, 1, 45, 80, 'Transfer from Emmanuel Mahaso', '300.00', 2, '2018-03-21 21:48:19', '2018-03-22 04:48:19'),
(84, 1, 45, 81, 'Transfer from Emmanuel Mahaso', '1000.00', 2, '2018-03-21 10:50:24', '2018-03-21 17:50:24'),
(100, 1, 52, 102, 'Card Deposit to USD - US Dollar', '500.00', 2, '2018-03-31 23:41:20', '2018-04-01 06:41:20'),
(83, 1, 45, 81, 'Card Deposit to EUR - European Union', '5000.00', 2, '2018-03-21 09:49:42', '2018-03-21 16:49:42'),
(81, 2, 45, 80, 'Transfer to Emmanuel Mahaso', '50.00', 2, '2018-03-21 09:39:56', '2018-03-21 16:39:56'),
(80, 1, 43, 72, 'Transfer from Makanaka Mahaso', '50.00', 2, '2018-03-21 09:39:56', '2018-03-21 16:39:56'),
(79, 2, 45, 80, 'Transfer to Emmanuel Mahaso', '50.00', 2, '2018-03-21 09:39:56', '2018-03-21 16:39:56'),
(78, 1, 43, 72, 'Transfer from Makanaka Mahaso', '50.00', 2, '2018-03-21 09:39:56', '2018-03-21 16:39:56'),
(77, 2, 43, 72, 'Transfer to Makanaka Mahaso', '320.00', 2, '2018-03-21 07:04:16', '2018-03-21 14:04:16'),
(76, 1, 45, 80, 'Transfer from Emmanuel Mahaso', '320.00', 2, '2018-03-21 07:04:16', '2018-03-21 14:04:16'),
(75, 1, 43, 72, 'Card Deposit to USD - US Dollar', '500.00', 2, '2018-03-21 07:02:32', '2018-03-21 14:02:32'),
(74, 1, 43, 79, 'Card Deposit to ZAR - South African Rand', '400.00', 2, '2018-03-20 04:13:56', '2018-03-20 11:13:56'),
(73, 2, 43, 72, 'Transfer to Makanaka Mahaso', '30.00', 2, '2018-03-20 04:09:56', '2018-03-20 11:09:56'),
(72, 1, 45, 80, 'Transfer from Emmanuel Mahaso', '30.00', 2, '2018-03-20 04:09:56', '2018-03-20 11:09:56'),
(71, 2, 44, 75, 'Transfer to Emmanuel Mahaso', '50.00', 2, '2018-03-18 14:14:24', '2018-03-18 21:14:24'),
(70, 1, 43, 72, 'Transfer from sikha sipunzi', '50.00', 2, '2018-03-18 14:14:24', '2018-03-18 21:14:24'),
(69, 1, 44, 75, 'Card Deposit to GBP - British Pound', '100.95', 2, '2018-03-18 14:07:14', '2018-03-18 21:07:14'),
(55, 1, 37, 58, 'Card Deposit to USD - US Dollar', '30.67', 2, '2018-03-04 12:05:59', '2018-03-04 19:05:59'),
(56, 1, 38, 61, 'Transfer from Emmanuel Mahaso', '23.00', 2, '2018-03-04 12:47:57', '2018-03-04 19:47:57'),
(57, 2, 37, 58, 'Transfer to Makanaka Mahaso', '23.00', 2, '2018-03-04 12:47:57', '2018-03-04 19:47:57'),
(58, 1, 37, 60, 'Card Deposit to GBP - British Pound', '2000000.00', 2, '2018-03-04 22:03:46', '2018-03-05 05:03:46'),
(59, 1, 37, 59, 'Card Deposit to EUR - European Union', '500000.00', 2, '2018-03-04 22:05:10', '2018-03-05 05:05:10'),
(60, 1, 38, 63, 'Transfer from Emmanuel Mahaso', '500000.00', 2, '2018-03-04 22:08:01', '2018-03-05 05:08:01'),
(61, 2, 37, 60, 'Transfer to Makanaka Mahaso', '500000.00', 2, '2018-03-04 22:08:01', '2018-03-05 05:08:01'),
(62, 1, 37, 59, 'Card Deposit to EUR - European Union', '500000.00', 2, '2018-03-07 03:19:01', '2018-03-07 10:19:01'),
(63, 1, 37, 59, 'Card Deposit to EUR - European Union', '500000.00', 2, '2018-03-08 08:50:46', '2018-03-08 15:50:46'),
(64, 1, 38, 63, 'Transfer from Emmanuel Mahaso', '6299981.32', 2, '2018-03-08 08:51:26', '2018-03-08 15:51:26'),
(65, 2, 37, 60, 'Transfer to Makanaka Mahaso', '6299981.32', 2, '2018-03-08 08:51:26', '2018-03-08 15:51:26'),
(66, 1, 37, 60, 'Card Deposit to GBP - British Pound', '4000000.00', 2, '2018-03-08 09:07:27', '2018-03-08 16:07:27'),
(67, 1, 37, 59, 'Card Deposit to EUR - European Union', '700000.00', 2, '2018-03-10 00:02:56', '2018-03-10 07:02:56'),
(68, 1, 37, 58, 'Card Deposit to USD - US Dollar', '600000.00', 2, '2018-03-12 02:56:51', '2018-03-12 09:56:51'),
(96, 2, 43, 72, 'Transfer to Makanaka Mahaso', '200.00', 2, '2018-03-21 22:12:13', '2018-03-22 05:12:13'),
(97, 1, 43, 72, 'Card Deposit to USD - US Dollar', '20000.00', 2, '2018-03-22 01:42:35', '2018-03-22 08:42:35'),
(98, 1, 50, 95, 'Transfer from Emmanuel Mahaso', '10000.00', 2, '2018-03-23 04:52:45', '2018-03-23 11:52:45'),
(99, 2, 43, 72, 'Transfer to Susan Kondowe', '10000.00', 2, '2018-03-23 04:52:45', '2018-03-23 11:52:45'),
(104, 2, 43, 72, 'Transfer to Makanaka Mahaso', '124.21', 2, '2018-04-02 03:36:07', '2018-04-02 10:36:07'),
(105, 1, 45, 85, 'Transfer from Emmanuel Mahaso', '297.00', 2, '2018-04-02 07:54:03', '2018-04-02 14:54:03'),
(106, 2, 43, 72, 'Transfer to Makanaka Mahaso', '425.49', 2, '2018-04-02 07:54:03', '2018-04-02 14:54:03'),
(107, 1, 53, 104, 'Transfer from Emmanuel Mahaso', '300.00', 1, '2018-04-02 09:01:50', '2018-04-02 16:01:50'),
(108, 2, 43, 72, 'Transfer to mugo@gmail.com ', '303.00', 1, '2018-04-02 09:01:50', '2018-04-02 16:01:50'),
(109, 1, 43, 84, 'Card Deposit to GBP - British Pound', '10000.00', 2, '2018-04-03 16:07:43', '2018-04-03 23:07:43'),
(110, 1, 45, 85, 'Transfer from Emmanuel Mahaso', '99.00', 2, '2018-04-03 23:21:54', '2018-04-04 06:21:54'),
(111, 2, 43, 84, 'Transfer to Makanaka Mahaso', '100.00', 2, '2018-04-03 23:21:54', '2018-04-04 06:21:54'),
(112, 1, 47, 88, 'Transfer from Emmanuel Mahaso', '500.00', 2, '2018-04-04 02:36:04', '2018-04-04 09:36:04'),
(113, 2, 43, 84, 'Transfer to Thuthu Hlatshwayo', '365.56', 2, '2018-04-04 02:36:04', '2018-04-04 09:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_wallets`
--

CREATE TABLE IF NOT EXISTS `user_wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `balance` decimal(15,2) NOT NULL DEFAULT '0.00',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=106 ;

--
-- Dumping data for table `user_wallets`
--

INSERT INTO `user_wallets` (`id`, `user_id`, `currency_id`, `name`, `code`, `balance`, `is_active`, `is_default`, `ts_created`, `ts_modified`) VALUES
(90, 46, 4, '', 'ZARXP150472175641', '0.00', 1, 0, '2018-03-22 02:25:08', '2018-03-22 02:25:08'),
(89, 46, 2, '', 'EURXP150472175641', '0.00', 1, 0, '2018-03-22 02:24:48', '2018-03-22 02:24:48'),
(88, 47, 1, '', 'USD', '500.00', 1, 1, '2018-03-22 02:24:24', '2018-03-22 02:24:24'),
(87, 46, 1, '', 'USD', '0.00', 1, 1, '2018-03-22 02:21:15', '2018-03-22 02:21:15'),
(86, 45, 4, '', 'ZARXP115024554549', '400.00', 1, 0, '2018-03-21 09:53:00', '2018-03-21 09:53:00'),
(85, 45, 3, '', 'GBPXP115024554549', '396.00', 1, 0, '2018-03-21 09:52:15', '2018-03-21 09:52:15'),
(81, 45, 2, '', 'EURXP115024554549', '8898.00', 1, 0, '2018-03-20 04:08:32', '2018-03-20 04:08:32'),
(80, 45, 1, '', 'USD', '1050.00', 1, 1, '2018-03-20 04:08:15', '2018-03-20 04:08:15'),
(77, 44, 2, 'eur', 'EURXP409124164546', '0.00', 1, 1, '2018-03-18 13:58:45', '2018-03-18 13:58:45'),
(84, 43, 3, '', 'GBPXP103452431842', '9534.45', 1, 0, '2018-03-21 07:05:49', '2018-03-21 07:05:49'),
(79, 43, 4, '', 'ZARXP103452431842', '0.00', 1, 1, '2018-03-18 22:17:11', '2018-03-18 22:17:11'),
(75, 44, 3, '', 'GBP', '50.95', 1, 0, '2018-03-18 13:54:29', '2018-03-18 13:54:29'),
(97, 51, 1, '', 'USD', '0.00', 1, 1, '2018-03-26 13:42:07', '2018-03-26 13:42:07'),
(72, 43, 1, '', 'USD', '9023.09', 1, 0, '2018-03-18 07:43:24', '2018-03-18 07:43:24'),
(91, 47, 2, 'My Euro', 'EURXP054172164761', '0.00', 1, 0, '2018-03-22 02:25:32', '2018-03-22 02:25:32'),
(92, 46, 3, '', 'GBPXP150472175641', '0.00', 1, 0, '2018-03-22 02:29:56', '2018-03-22 02:29:56'),
(93, 48, 1, '', 'USD', '0.00', 1, 1, '2018-03-22 03:02:09', '2018-03-22 03:02:09'),
(94, 49, 1, '', 'USD', '0.00', 1, 1, '2018-03-22 03:03:13', '2018-03-22 03:03:13'),
(95, 50, 4, '', 'ZAR', '10000.00', 1, 1, '2018-03-23 04:29:37', '2018-03-23 04:29:37'),
(96, 50, 1, 'My USD$', 'USDXP041570155782', '0.00', 1, 0, '2018-03-23 04:57:38', '2018-03-23 04:57:38'),
(98, 51, 2, '', 'EURXP221517569209', '0.00', 1, 0, '2018-03-26 13:42:30', '2018-03-26 13:42:30'),
(99, 51, 4, '', 'ZARXP221517569209', '0.00', 1, 0, '2018-03-26 13:42:43', '2018-03-26 13:42:43'),
(100, 51, 3, '', 'GBPXP221517569209', '0.00', 1, 0, '2018-03-26 13:49:48', '2018-03-26 13:49:48'),
(101, 52, 4, '', 'ZAR', '0.00', 1, 1, '2018-03-31 23:06:17', '2018-03-31 23:06:17'),
(102, 52, 1, '', 'USDXP567757215222', '500.00', 1, 0, '2018-03-31 23:18:24', '2018-03-31 23:18:24'),
(103, 52, 2, '', 'EURXP567757215222', '0.00', 1, 0, '2018-03-31 23:18:30', '2018-03-31 23:18:30'),
(104, 53, 1, '', 'USDXP103452431842', '300.00', 1, 1, '2018-04-02 09:01:50', '2018-04-02 09:01:50'),
(105, 54, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 01:31:56', '2018-04-04 01:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `xannia_cards`
--

CREATE TABLE IF NOT EXISTS `xannia_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `wallet_id` int(11) NOT NULL,
  `card_number` varchar(20) NOT NULL,
  `expiry_year` varchar(10) NOT NULL,
  `expiry_month` varchar(10) NOT NULL,
  `cvv` varchar(4) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `xannia_cards`
--

INSERT INTO `xannia_cards` (`id`, `user_id`, `wallet_id`, `card_number`, `expiry_year`, `expiry_month`, `cvv`, `is_active`, `is_deleted`, `ts_created`, `ts_modified`) VALUES
(3, 37, 59, '7707630390687265', '2019', '03', '6187', 1, 0, '2018-03-22 09:52:41', '2018-03-22 09:52:41'),
(4, 37, 59, '2411629550533257', '2019', '03', '8172', 1, 0, '2018-03-22 09:53:30', '2018-03-22 09:53:30'),
(5, 37, 60, '5714150519003056', '2019', '03', '0873', 1, 0, '2018-03-22 09:53:37', '2018-03-22 09:53:37'),
(6, 37, 58, '6577448999511972', '2019', '03', '3666', 1, 0, '2018-03-22 09:53:44', '2018-03-22 09:53:44'),
(7, 37, 59, '3156688866280458', '2019', '03', '6862', 1, 0, '2018-03-22 10:11:47', '2018-03-22 10:11:47'),
(8, 43, 79, '8476288258494996', '2019', '03', '2553', 1, 1, '2018-03-22 01:15:48', '2018-03-22 01:15:48'),
(9, 45, 80, '9250884608613180', '2019', '03', '1847', 1, 0, '2018-03-22 01:20:24', '2018-03-22 01:20:24'),
(10, 45, 81, '3913544293074700', '2019', '03', '9147', 1, 0, '2018-03-22 01:20:32', '2018-03-22 01:20:32'),
(11, 45, 86, '3697025969698062', '2019', '03', '4370', 1, 0, '2018-03-22 01:20:39', '2018-03-22 01:20:39'),
(12, 43, 72, '8580836270279914', '2019', '03', '1601', 1, 1, '2018-03-22 01:43:11', '2018-03-22 01:43:11'),
(13, 46, 87, '4862040998875243', '2019', '03', '4790', 1, 0, '2018-03-22 02:22:21', '2018-03-22 02:22:21'),
(14, 46, 87, '4692358449187813', '2019', '03', '7399', 1, 1, '2018-03-22 02:23:27', '2018-03-22 02:23:27'),
(15, 46, 90, '4247624488600054', '2019', '03', '3775', 1, 1, '2018-03-22 02:25:35', '2018-03-22 02:25:35'),
(16, 46, 89, '4229260463817671', '2019', '03', '7349', 1, 1, '2018-03-22 02:26:02', '2018-03-22 02:26:02'),
(17, 43, 72, '8341278144960435', '2019', '03', '4977', 1, 1, '2018-03-22 02:45:40', '2018-03-22 02:45:40'),
(18, 46, 92, '1538096185973101', '2019', '03', '2629', 1, 0, '2018-03-22 02:46:02', '2018-03-22 02:46:02'),
(19, 46, 90, '8075718870638645', '2019', '03', '9097', 1, 0, '2018-03-22 02:46:24', '2018-03-22 02:46:24'),
(20, 49, 94, '6533365544601765', '2019', '03', '9226', 1, 0, '2018-03-22 03:04:13', '2018-03-22 03:04:13'),
(21, 43, 84, '0449924996935496', '2019', '03', '3383', 1, 1, '2018-03-22 03:32:47', '2018-03-22 03:32:47'),
(22, 43, 72, '3576251060951104', '2019', '03', '8982', 1, 0, '2018-03-26 00:45:49', '2018-03-26 00:45:49'),
(23, 51, 97, '2059608795472613', '2019', '03', '3180', 1, 1, '2018-03-26 13:49:57', '2018-03-26 13:49:57'),
(24, 51, 97, '1613167007943386', '2019', '03', '6903', 1, 0, '2018-03-26 13:50:05', '2018-03-26 13:50:05'),
(25, 51, 100, '2887216806937036', '2019', '03', '3124', 1, 0, '2018-03-26 13:50:24', '2018-03-26 13:50:24'),
(26, 51, 98, '3895582028062793', '2019', '03', '2763', 1, 0, '2018-03-26 13:50:35', '2018-03-26 13:50:35'),
(27, 51, 99, '7433866528994346', '2019', '03', '3353', 1, 0, '2018-03-26 13:50:46', '2018-03-26 13:50:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
