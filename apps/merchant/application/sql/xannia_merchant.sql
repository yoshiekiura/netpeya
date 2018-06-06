-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2018 at 12:46 AM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `xannia_merchant`
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
-- Table structure for table `allowed_ips`
--

CREATE TABLE IF NOT EXISTS `allowed_ips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `allowed_ips`
--

INSERT INTO `allowed_ips` (`id`, `user_id`, `ip`, `is_active`, `ts_created`, `ts_modified`) VALUES
(16, 87, 'fe80::f54f:63f8:e816:99bb', 1, '2018-04-18 21:07:45', '2018-04-18 21:07:45'),
(18, 87, '127.0.01', 1, '2018-04-20 22:56:39', '2018-04-20 22:56:39');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

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
(9, '196.22.244.102', 'xanniapay@gmail.com', '2018-03-27 11:25:24'),
(10, '::1', 'emmanuel@xannia.com', '2018-04-06 11:29:15'),
(11, '::1', 'emmanuel@xannia.com', '2018-04-06 11:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_accounts`
--

CREATE TABLE IF NOT EXISTS `merchant_accounts` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=139 ;

--
-- Dumping data for table `merchant_accounts`
--

INSERT INTO `merchant_accounts` (`id`, `user_id`, `currency_id`, `name`, `code`, `balance`, `is_active`, `is_default`, `ts_created`, `ts_modified`) VALUES
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
(105, 54, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 01:31:56', '2018-04-04 01:31:56'),
(106, 55, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:08:51', '2018-04-04 12:08:51'),
(107, 56, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:22:09', '2018-04-04 12:22:09'),
(108, 57, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:23:30', '2018-04-04 12:23:30'),
(109, 58, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:25:54', '2018-04-04 12:25:54'),
(110, 59, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:28:22', '2018-04-04 12:28:22'),
(111, 60, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:35:32', '2018-04-04 12:35:32'),
(112, 61, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:45:27', '2018-04-04 12:45:27'),
(113, 62, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:47:12', '2018-04-04 12:47:12'),
(114, 63, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:49:14', '2018-04-04 12:49:14'),
(115, 64, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:46:34', '2018-04-05 09:46:34'),
(116, 65, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:47:07', '2018-04-05 09:47:07'),
(117, 66, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:48:49', '2018-04-05 09:48:49'),
(118, 67, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:49:44', '2018-04-05 09:49:44'),
(119, 68, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:57:39', '2018-04-05 09:57:39'),
(120, 69, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:58:51', '2018-04-05 09:58:51'),
(121, 70, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:00:47', '2018-04-05 10:00:47'),
(122, 71, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:01:38', '2018-04-05 10:01:38'),
(123, 72, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:02:21', '2018-04-05 10:02:21'),
(124, 73, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:03:30', '2018-04-05 10:03:30'),
(125, 74, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:04:42', '2018-04-05 10:04:42'),
(126, 75, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:05:13', '2018-04-05 10:05:13'),
(127, 76, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:17:13', '2018-04-05 10:17:13'),
(128, 77, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:19:51', '2018-04-05 10:19:51'),
(129, 78, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 12:08:53', '2018-04-05 12:08:53'),
(130, 79, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 12:14:20', '2018-04-05 12:14:20'),
(131, 80, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 12:24:12', '2018-04-05 12:24:12'),
(132, 81, 1, '', 'USD', '0.00', 1, 1, '2018-04-06 08:08:44', '2018-04-06 08:08:44'),
(133, 82, 1, '', 'USD', '30000.00', 1, 1, '2018-04-06 08:17:05', '2018-04-06 08:17:05'),
(134, 83, 3, '', 'GBP', '0.00', 1, 1, '2018-04-06 13:32:58', '2018-04-06 13:32:58'),
(135, 84, 3, '', 'GBP', '0.00', 1, 1, '2018-04-06 13:35:00', '2018-04-06 13:35:00'),
(137, 87, 2, 'Test merchant account', 'EURXP543885172870', '0.00', 1, 0, '2018-04-11 20:35:09', '2018-04-11 20:35:09'),
(138, 87, 4, 'Test Account', 'ZARXP543885172870', '0.00', 1, 0, '2018-04-12 11:06:14', '2018-04-12 11:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `name` varchar(100) NOT NULL,
  `external_processor` varchar(100) DEFAULT NULL,
  `slag` varchar(100) NOT NULL,
  `html_form` varchar(20) NOT NULL,
  `external_fee` decimal(15,2) NOT NULL,
  `internal_fee` decimal(15,2) NOT NULL,
  `can_refund` tinyint(4) NOT NULL DEFAULT '0',
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `is_active`, `name`, `external_processor`, `slag`, `html_form`, `external_fee`, `internal_fee`, `can_refund`, `ts_created`, `ts_modified`) VALUES
(1, 1, 'Neteller', 'neteller', 'neteller', 'neteller', '0.00', '1.25', 0, '2018-03-18 15:06:23', '2018-03-18 15:06:23'),
(2, 1, 'Visa Card', 'braintree', 'visa', 'card', '1.25', '2.25', 1, '2018-03-18 15:07:49', '2018-03-18 15:07:49'),
(3, 1, 'Bank Transfer', NULL, 'bank_transfer', 'banktransfer', '0.00', '0.00', 0, '2018-03-18 15:07:49', '2018-03-18 15:07:49'),
(4, 1, 'Mastercard', 'braintree', 'mastercard', 'card', '1.25', '2.25', 1, '2018-03-18 15:08:10', '2018-03-18 15:08:10'),
(5, 1, 'Xannia Wallet', 'xannia', 'xannia', 'xannia', '0.00', '1.20', 1, '2018-04-22 13:26:03', '2018-04-22 13:26:03'),
(6, 1, 'JCB Card', 'braintree', 'jcb', 'jcb', '1.25', '2.25', 1, '2018-04-22 14:35:39', '2018-04-22 14:35:39');

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
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(10) unsigned NOT NULL,
  `external_transaction_id` varchar(200) DEFAULT NULL,
  `order_reference` varchar(100) NOT NULL,
  `is_refunded` tinyint(4) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `amount_before_charges` decimal(15,2) NOT NULL,
  `total_charges` decimal(15,2) NOT NULL,
  `amount_after_charges` decimal(15,2) NOT NULL,
  `sale_status_id` tinyint(4) NOT NULL DEFAULT '1',
  `processor_response` varchar(20) DEFAULT NULL,
  `card_type` varchar(20) DEFAULT NULL,
  `card_bin` varchar(10) DEFAULT NULL,
  `card_last_4` varchar(4) DEFAULT NULL,
  `card_exp_month` varchar(2) DEFAULT NULL,
  `card_exp_year` varchar(4) DEFAULT NULL,
  `cardholder_name` varchar(100) NOT NULL,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `payment_method_id`, `external_transaction_id`, `order_reference`, `is_refunded`, `description`, `amount_before_charges`, `total_charges`, `amount_after_charges`, `sale_status_id`, `processor_response`, `card_type`, `card_bin`, `card_last_4`, `card_exp_month`, `card_exp_year`, `cardholder_name`, `ts_created`, `ts_modified`) VALUES
(64, 87, 5, '139', '4fb7-3e0d-221c', 1, '', '6673.88', '80.09', '6593.79', 4, '', '', '', '', '', '', '', '2018-04-22 18:39:36', '2018-04-22 16:39:36'),
(65, 87, 6, '2njnp43m', '148c-6c8d-ec66', NULL, '', '601.25', '21.04', '580.21', 2, 'Approved', 'JCB', '353011', '0000', '02', '2018', 'Sikhanyiso Sipunzi', '2018-04-22 18:40:59', '2018-04-22 16:40:59'),
(66, 87, 6, '0y43r5q5', '1121-5b2c-5dbe', NULL, '', '601.25', '21.04', '580.21', 2, 'Approved', 'JCB', '353011', '0000', '02', '2018', 'Sikhanyiso Sipunzi', '2018-04-22 09:55:15', '2018-04-22 16:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `sale_statuses`
--

CREATE TABLE IF NOT EXISTS `sale_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` tinyint(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sale_statuses`
--

INSERT INTO `sale_statuses` (`id`, `status_code`, `name`) VALUES
(1, 1, 'Pending'),
(2, 2, 'Approved'),
(3, 3, 'Declined'),
(4, 4, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_type_id` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(10) unsigned NOT NULL,
  `external_transaction_id` varchar(200) DEFAULT NULL,
  `order_reference` varchar(100) NOT NULL,
  `is_refunded` tinyint(4) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `amount_before_charges` decimal(15,2) NOT NULL,
  `total_charges` decimal(15,2) NOT NULL,
  `amount_after_charges` decimal(15,2) NOT NULL,
  `transaction_status_id` tinyint(4) NOT NULL DEFAULT '1',
  `processor_response` varchar(20) DEFAULT NULL,
  `card_type` varchar(20) DEFAULT NULL,
  `card_bin` varchar(10) DEFAULT NULL,
  `card_last_4` varchar(4) DEFAULT NULL,
  `card_exp_month` varchar(2) DEFAULT NULL,
  `card_exp_year` varchar(4) DEFAULT NULL,
  `cardholder_name` varchar(100) DEFAULT NULL,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_type_id`, `user_id`, `payment_method_id`, `external_transaction_id`, `order_reference`, `is_refunded`, `description`, `amount_before_charges`, `total_charges`, `amount_after_charges`, `transaction_status_id`, `processor_response`, `card_type`, `card_bin`, `card_last_4`, `card_exp_month`, `card_exp_year`, `cardholder_name`, `ts_created`, `ts_modified`) VALUES
(99, 1, 87, 4, 'j6wv43g9', '5fa9-b03f-eb58', NULL, '', '6112.00', '213.92', '5898.08', 2, 'Approved', 'MasterCard', '555555', '4444', '02', '2018', 'Sikhanyiso Sipunzi', '2018-04-24 08:06:47', '2018-04-24 06:06:47'),
(97, 2, 87, 5, '159', '0f92-56ed-9b99', NULL, '', '366.72', '4.40', '371.12', 2, '', '', '', '', '', '', '', '2018-04-23 22:58:22', '2018-04-23 20:58:22'),
(98, 1, 87, 2, 'atmrq0bb', '9598-6006-169c', NULL, '', '611200.00', '21392.00', '589808.00', 2, 'Approved', 'Visa', '400551', '0004', '02', '2018', 'Sikhanyiso Sipunzi', '2018-04-23 23:17:06', '2018-04-23 21:17:06'),
(96, 2, 87, 5, '158', '7158-8324-052a', NULL, '', '3000.00', '36.00', '3036.00', 2, '', '', '', '', '', '', '', '2018-04-23 22:52:51', '2018-04-23 20:52:51'),
(89, 2, 87, 5, '151', '4bf9-03cd-cb87', NULL, '', '1833.60', '22.00', '1855.60', 2, '', '', '', '', '', '', '', '2018-04-23 22:32:32', '2018-04-23 20:32:32'),
(90, 2, 87, 5, '152', '76fc-3b58-88fd', NULL, '', '1833.60', '22.00', '1855.60', 2, '', '', '', '', '', '', '', '2018-04-23 22:35:17', '2018-04-23 20:35:17'),
(91, 2, 87, 5, '153', '7531-4c93-189b', NULL, '', '3667.20', '44.01', '3711.21', 2, '', '', '', '', '', '', '', '2018-04-23 22:36:59', '2018-04-23 20:36:59'),
(92, 2, 87, 5, '154', 'c340-c54a-c807', NULL, '', '3000.00', '36.00', '3036.00', 2, '', '', '', '', '', '', '', '2018-04-23 22:38:03', '2018-04-23 20:38:03'),
(93, 1, 87, 5, '155', '05e4-7288-3d9b', NULL, '', '3000.00', '36.00', '2964.00', 2, '', '', '', '', '', '', '', '2018-04-23 22:38:28', '2018-04-23 20:38:28'),
(94, 1, 87, 5, '156', '0a9f-15f9-e730', NULL, '', '300.00', '3.60', '296.40', 2, '', '', '', '', '', '', '', '2018-04-23 22:45:13', '2018-04-23 20:45:13'),
(95, 2, 87, 5, '157', '229e-101d-c9aa', NULL, '', '300.00', '3.60', '303.60', 2, '', '', '', '', '', '', '', '2018-04-23 22:52:04', '2018-04-23 20:52:04');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_statuses`
--

CREATE TABLE IF NOT EXISTS `transaction_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_code` tinyint(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `transaction_statuses`
--

INSERT INTO `transaction_statuses` (`id`, `status_code`, `name`) VALUES
(1, 1, 'Pending'),
(2, 2, 'Approved'),
(3, 3, 'Declined'),
(4, 4, 'Refunded');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_type`
--

CREATE TABLE IF NOT EXISTS `transaction_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transaction_type`
--

INSERT INTO `transaction_type` (`id`, `name`) VALUES
(1, 'Sale'),
(2, 'Payout');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `xannia_number` varchar(100) DEFAULT NULL,
  `account_balance` decimal(15,2) unsigned NOT NULL,
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
  `business_name` varchar(100) DEFAULT NULL,
  `business_phone` varchar(20) DEFAULT NULL,
  `cell_number` varchar(20) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address_1` varchar(255) DEFAULT NULL,
  `address_2` varchar(255) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `bank_beneficiary_name` varchar(100) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_account_number` varchar(100) NOT NULL,
  `bank_swift_code` varchar(50) NOT NULL,
  `bank_country_code` varchar(4) NOT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT '0',
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=88 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `country_id`, `currency_id`, `ip_address`, `xannia_number`, `account_balance`, `password`, `salt`, `email_address`, `bt_id`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `is_active`, `first_name`, `last_name`, `business_name`, `business_phone`, `cell_number`, `date_of_birth`, `address_1`, `address_2`, `city`, `province`, `postal_code`, `bank_beneficiary_name`, `bank_name`, `bank_account_number`, `bank_swift_code`, `bank_country_code`, `email_verified`, `is_verified`, `last_login`, `ts_created`, `ts_modified`) VALUES
(82, 1, 3, '::1', 'XP492895125225', '0.00', '$2y$08$7EasFnxXyM4tqquV8yZrg.t7QmHYrkL9mToE5PvrXmUR7ZQywIsku', NULL, 'ati2ude1@gmail.com', '499966223', NULL, NULL, NULL, NULL, 1, 'Emmanuel', 'Mahaso', 'Xannia Pay Global', '721755340', '0831982154', NULL, '84 On Parklands main Rd', 'Parklands', 'Cape Town', NULL, '7442', 'Xannia Pay Global', 'ABSA LTD', '0123456789', 'ABJ508932', 'ZW', 1, 1, '2018-04-18 17:43:06', '2018-04-06 08:17:05', '2018-04-06 08:17:05'),
(87, 1, 4, 'fe80::f54f:63f8:e816:99bb', 'XP543885172870', '605714.17', '$2y$08$.EGduzGZKwpK4ZvlITi5v.LxWOwXssf7kVqw92xyBkexGbsWvOXgG', NULL, 'emmanuel@xannia.com', '854143673', NULL, NULL, NULL, NULL, 1, 'Emmanuel', 'Mahaso', 'Coslo Accounting', '721755340', NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '', '', '', 1, 2, '2018-04-24 06:44:54', '2018-04-11 20:16:28', '2018-04-11 20:16:28');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(2, 82, 2),
(3, 83, 2),
(4, 84, 2),
(5, 85, 2),
(6, 86, 2),
(7, 87, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_api_keys`
--

CREATE TABLE IF NOT EXISTS `user_api_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `api_key` varchar(100) NOT NULL,
  `secret_key` varchar(100) NOT NULL,
  `ts_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ts_modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `user_api_keys`
--

INSERT INTO `user_api_keys` (`id`, `user_id`, `api_key`, `secret_key`, `ts_created`, `ts_modified`) VALUES
(57, 87, 'b8b92b8250191637', 'b9af1700a24f26511d0bb6fd48f9', '2018-04-22 01:10:33', '2018-04-22 01:10:33');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

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
(105, 54, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 01:31:56', '2018-04-04 01:31:56'),
(106, 55, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:08:51', '2018-04-04 12:08:51'),
(107, 56, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:22:09', '2018-04-04 12:22:09'),
(108, 57, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:23:30', '2018-04-04 12:23:30'),
(109, 58, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:25:54', '2018-04-04 12:25:54'),
(110, 59, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:28:22', '2018-04-04 12:28:22'),
(111, 60, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:35:32', '2018-04-04 12:35:32'),
(112, 61, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:45:27', '2018-04-04 12:45:27'),
(113, 62, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:47:12', '2018-04-04 12:47:12'),
(114, 63, 1, '', 'USD', '0.00', 1, 1, '2018-04-04 12:49:14', '2018-04-04 12:49:14'),
(115, 64, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:46:34', '2018-04-05 09:46:34'),
(116, 65, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:47:07', '2018-04-05 09:47:07'),
(117, 66, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:48:49', '2018-04-05 09:48:49'),
(118, 67, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:49:44', '2018-04-05 09:49:44'),
(119, 68, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:57:39', '2018-04-05 09:57:39'),
(120, 69, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 09:58:51', '2018-04-05 09:58:51'),
(121, 70, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:00:47', '2018-04-05 10:00:47'),
(122, 71, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:01:38', '2018-04-05 10:01:38'),
(123, 72, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:02:21', '2018-04-05 10:02:21'),
(124, 73, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:03:30', '2018-04-05 10:03:30'),
(125, 74, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:04:42', '2018-04-05 10:04:42'),
(126, 75, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:05:13', '2018-04-05 10:05:13'),
(127, 76, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:17:13', '2018-04-05 10:17:13'),
(128, 77, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 10:19:51', '2018-04-05 10:19:51'),
(129, 78, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 12:08:53', '2018-04-05 12:08:53'),
(130, 79, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 12:14:20', '2018-04-05 12:14:20'),
(131, 80, 1, '', 'USD', '0.00', 1, 1, '2018-04-05 12:24:12', '2018-04-05 12:24:12'),
(132, 81, 1, '', 'USD', '0.00', 1, 1, '2018-04-06 08:08:44', '2018-04-06 08:08:44'),
(133, 82, 1, '', 'USD', '30000.00', 1, 1, '2018-04-06 08:17:05', '2018-04-06 08:17:05'),
(134, 83, 3, '', 'GBP', '0.00', 1, 1, '2018-04-06 13:32:58', '2018-04-06 13:32:58'),
(135, 84, 3, '', 'GBP', '0.00', 1, 1, '2018-04-06 13:35:00', '2018-04-06 13:35:00'),
(136, 83, 1, '', 'USD', '0.00', 1, 1, '2018-04-11 20:03:29', '2018-04-11 20:03:29'),
(137, 84, 1, '', 'USD', '0.00', 1, 1, '2018-04-11 20:04:39', '2018-04-11 20:04:39'),
(138, 85, 1, '', 'USD', '0.00', 1, 1, '2018-04-11 20:06:52', '2018-04-11 20:06:52'),
(139, 86, 1, '', 'USD', '0.00', 1, 1, '2018-04-11 20:10:48', '2018-04-11 20:10:48'),
(140, 87, 1, '', 'USD', '0.00', 1, 1, '2018-04-11 20:16:28', '2018-04-11 20:16:28');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
