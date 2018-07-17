-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2016 at 05:02 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `make` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registration_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mileage` bigint(20) NOT NULL,
  `location_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `car_location_id_foreign` (`location_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `make`, `model`, `registration_num`, `mileage`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'Ford', 'Mustang', 'AB 1 CD', 1000, 1, '2014-06-10 20:43:14', '2014-06-10 20:43:14'),
(2, 'Humve', 'Hummer', 'HH 11 HH', 5, 1, '2014-06-11 02:14:17', '2014-06-11 02:14:17'),
(3, 'Toyota', 'Toyota', 'ASL93', 5, 2, '2016-09-10 08:01:28', '2016-09-10 08:01:39'),
(4, 'ABC', 'ABC', 'ABCDWF', 5, 3, '2016-09-10 08:02:10', '2016-09-10 08:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `car_type`
--

CREATE TABLE IF NOT EXISTS `car_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_id` int(10) unsigned NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `car_type_car_id_foreign` (`car_id`),
  KEY `car_type_type_id_foreign` (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `car_type`
--

INSERT INTO `car_type` (`id`, `car_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 23, '2014-06-10 20:43:14', '2014-06-10 20:43:14'),
(2, 2, 23, '2014-06-11 02:14:17', '2014-06-11 02:14:17'),
(3, 2, 24, '2014-06-13 01:01:18', '2014-06-13 01:01:18'),
(5, 3, 24, '2016-09-10 08:01:39', '2016-09-10 08:01:39'),
(6, 4, 23, '2016-09-10 08:02:10', '2016-09-10 08:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `checkout_form_settings`
--

CREATE TABLE IF NOT EXISTS `checkout_form_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values` enum('no','yes','required') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `checkout_form_settings`
--

INSERT INTO `checkout_form_settings` (`id`, `options`, `values`, `created_at`, `updated_at`) VALUES
(21, 'Title', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(22, 'Name', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(23, 'Email', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(24, 'Phone', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(25, 'Company', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(26, 'Address', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(27, 'Country', 'yes', '2014-06-18 22:00:56', '2014-06-18 22:00:56'),
(28, 'State', 'yes', '2014-06-18 22:00:57', '2014-06-18 22:00:57'),
(29, 'City', 'yes', '2014-06-18 22:00:57', '2014-06-18 22:00:57'),
(30, 'Zip', 'yes', '2014-06-18 22:00:57', '2014-06-18 22:00:57');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` enum('Dr','Mr','Mrs','Ms','Other','Prof','Rev') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Dr',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `title`, `name`, `email`, `telephone`, `country`, `state`, `city`, `address`, `zip`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Telo', 'telo@kaspo.com', '1234567', 'Indonesia', '12', '12', '12', '12', '2014-06-20 01:03:05', '2014-06-20 01:03:05'),
(2, 'Mr', 'Telo', 'telo@kaspo.com', '1234567', 'Indonesia', '12', '12', '12', '12', '2014-06-20 01:03:37', '2014-06-20 01:03:37'),
(3, 'Mr', 'Telo', 'telo@kaspo.com', '1234567', 'Indonesia', '12', '12', '12', '12', '2014-06-20 01:03:59', '2014-06-20 01:03:59'),
(4, 'Mrs', '1231', 'admin@admin.com', '1902', 'Indonesia', '1', '1', '1', '1', '2014-11-16 23:44:14', '2014-11-16 23:44:14'),
(5, 'Mr', '1231', 'admin@admin.com', '2', 'Indonesia', '1', '2', '1', '2', '2014-11-16 23:45:02', '2014-11-16 23:58:34'),
(6, 'Mr', 'About Me', 'admin@admin.com', '1902', 'Indonesia', 'a', 'a', 'a', '1', '2014-11-16 23:46:09', '2014-11-16 23:46:09'),
(7, 'Mr', '1231', 'admin@admin.com', '2', 'Indonesia', '1', '2', '1', '2', '2014-11-16 23:55:58', '2014-11-16 23:55:58'),
(8, 'Mrs', 'David Pras', 'davidpras1994@gmail.com', '+628645536737', 'Indonesia', 'Jakarta', 'Jakarta', 'HJJJJ', '17415', '2016-03-01 19:30:57', '2016-03-01 19:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `extra`
--

CREATE TABLE IF NOT EXISTS `extra` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('day','reservation') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'day',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `extra`
--

INSERT INTO `extra` (`id`, `name`, `price`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GPS', '50', 'day', 1, '2014-06-11 21:19:23', '2014-06-12 21:43:09'),
(2, 'Child Seat', '100', 'reservation', 1, '2014-06-13 01:02:07', '2014-06-13 01:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2014-11-16 17:00:00', '2014-11-16 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `name`, `email`, `phone`, `country`, `state`, `city`, `address`, `zip`, `lat`, `lng`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Semarang', '123@123.com', '1234567', 'Indonesia', 'AK', 'Semarang', 'Semarang', '23211', '', '', 1, '2014-06-09 22:29:05', '2014-06-09 22:29:05'),
(2, 'Jakarta', 'davidpras1994@gmail.com', '0374837', 'Jakarta', 'Jakarta', 'Jakarta', 'Jakarta', '24311', '', '', 1, '2016-09-09 17:00:00', '2016-09-09 17:00:00'),
(3, 'Jogjakarta', 'davithace@gmail.com', '09376272', 'Indonesia', 'Jogjakarta', 'Jogjakarta', 'Jogjakarta', '32892', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_06_07_042922_create_location_table', 1),
('2014_06_07_043156_create_car-extra_table', 1),
('2014_06_09_015708_create_type_table', 1),
('2014_06_09_020737_create_type_extra_table', 1),
('2014_06_10_074323_create_table_car', 2),
('2014_06_10_135529_create_car_type_table', 3),
('2014_06_11_072717_create_reservation_table', 4),
('2012_12_06_225921_migration_cartalyst_sentry_install_users', 5),
('2012_12_06_225929_migration_cartalyst_sentry_install_groups', 5),
('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot', 5),
('2012_12_06_225988_migration_cartalyst_sentry_install_throttle', 5),
('2014_06_17_035218_create_checkout_form_settings', 6),
('2014_06_17_051229_create_payment_settings', 7),
('2014_06_19_045253_create_rental_settings', 8),
('2014_06_20_064406_crate_customers_table', 9),
('2014_06_20_065843_create_payment_detail', 10);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reservation_id` int(10) unsigned DEFAULT NULL,
  `days` int(11) NOT NULL,
  `hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_per_day` float(8,2) NOT NULL,
  `price_per_day_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_per_hour` float(8,2) NOT NULL,
  `price_per_hour_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rental_fee` float(8,2) NOT NULL,
  `extra_fee` float DEFAULT '0',
  `insurance_val` float(8,2) NOT NULL,
  `sub_total` float(8,2) NOT NULL,
  `tax_val` float(8,2) NOT NULL,
  `total_price` float(8,2) NOT NULL,
  `deposit_payment` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`id`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `reservation_id`, `days`, `hours`, `price_per_day`, `price_per_day_details`, `price_per_hour`, `price_per_hour_details`, `rental_fee`, `extra_fee`, `insurance_val`, `sub_total`, `tax_val`, `total_price`, `deposit_payment`, `created_at`, `updated_at`) VALUES
(1, 2, 6, '1', 354.00, '6 x Rp.59', 50.00, '1 x Rp.50', 404.00, 300, 300.00, 1004.00, 50.20, 1054.20, 527.10, '2014-06-20 01:03:59', '2014-09-09 20:06:10'),
(3, 5, 1, '0', 59.00, '1 x Rp.59', 0.00, '0 x Rp.50', 59.00, 50, 50.00, 159.00, 7.95, 166.95, 83.47, '2014-11-16 23:55:58', '2014-11-16 23:58:34'),
(4, 6, 45, '0', 2655.00, '45 x Rp.2655', 0.00, '0 x Rp.0', 2655.00, 0, 0.00, 2655.00, 0.00, 2655.00, 1327.50, '2016-03-01 19:30:57', '2016-03-01 19:30:57');

-- --------------------------------------------------------

--
-- Table structure for table `payment_settings`
--

CREATE TABLE IF NOT EXISTS `payment_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `values_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `payment_settings`
--

INSERT INTO `payment_settings` (`id`, `options`, `values`, `values_2`, `created_at`, `updated_at`) VALUES
(9, 'deposit_payment[]', '50', '$', '2014-06-18 01:57:32', '2014-06-19 22:47:45'),
(10, 'tax_payment[]', '5', '%', '2014-06-18 01:57:32', '2014-06-19 22:47:45'),
(11, 'insurance_payment[]', '50', 'd', '2014-06-18 01:57:32', '2014-06-19 22:47:46'),
(12, 'bank_account[]', 'Make your payment to HSBC bank Account: ABCD123456666', NULL, '2014-06-18 01:57:32', '2014-06-19 22:47:46'),
(13, 'cash_payment[]', 'no', NULL, '2014-06-18 01:57:32', '2014-06-19 22:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `rental_settings`
--

CREATE TABLE IF NOT EXISTS `rental_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `options` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `values` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rental_settings`
--

INSERT INTO `rental_settings` (`id`, `options`, `values`, `created_at`, `updated_at`) VALUES
(1, 'calculate_rental_fee', 'dh', '2014-06-18 22:11:41', '2014-06-19 00:50:58'),
(2, 'min_booking_length', '5', '2014-06-18 22:11:41', '2014-06-19 00:50:58'),
(3, 'on_hold_pending', '5', '2014-06-18 22:11:42', '2014-06-19 00:50:58'),
(4, 'rental_terms', 'dd your Booking Terms here.Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\nLorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2014-06-18 22:11:42', '2014-06-19 00:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('cancelled','collected','complete','confirmed','pending') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `type_id` int(10) unsigned NOT NULL,
  `car_id` int(10) unsigned DEFAULT NULL,
  `extras` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loc_pick` int(10) unsigned NOT NULL,
  `loc_return` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `payment_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `status`, `start`, `end`, `type_id`, `car_id`, `extras`, `loc_pick`, `loc_return`, `user_id`, `created_at`, `updated_at`, `payment_type`) VALUES
(2, 'cancelled', '2014-06-18 03:30:00', '2014-06-24 05:00:00', 24, 2, '[{"id":1,"name":"GPS"}]', 1, 1, 3, '2014-06-20 01:03:59', '2014-09-09 20:06:11', 0),
(5, 'pending', '2014-11-17 01:55:00', '2014-11-18 01:55:00', 24, 2, '[{"id":1,"name":"GPS"}]', 1, 1, 7, '2014-11-16 23:55:58', '2014-11-16 23:58:34', 0),
(6, 'pending', '2016-03-08 09:29:00', '2016-04-22 09:29:00', 23, 2, NULL, 1, 1, 8, '2016-03-01 19:30:57', '2016-03-01 19:30:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE IF NOT EXISTS `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `ip_address`, `attempts`, `suspended`, `banned`, `last_attempt_at`, `suspended_at`, `banned_at`) VALUES
(1, 1, '127.0.0.1', 0, 0, 0, NULL, NULL, NULL),
(2, 1, '::1', 0, 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE IF NOT EXISTS `type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price_hour` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passengers` int(11) NOT NULL,
  `bags` int(11) NOT NULL,
  `doors` int(11) NOT NULL,
  `transmission` enum('auto','manual') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'auto',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `type`, `description`, `image`, `price_day`, `price_hour`, `passengers`, `bags`, `doors`, `transmission`, `status`, `created_at`, `updated_at`) VALUES
(23, '123456', NULL, 'S5W6PZcr8VXK.jpg', '59', '50', 1, 1, 1, 'auto', 1, '2014-06-09 22:59:59', '2014-06-09 23:13:00'),
(24, 'Horasah', NULL, '0Vtwh41Z07Vn.jpg', '500', '500', 4, 4, 4, 'auto', 1, '2014-06-11 01:56:45', '2014-06-13 01:02:37');

-- --------------------------------------------------------

--
-- Table structure for table `type_extra`
--

CREATE TABLE IF NOT EXISTS `type_extra` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(10) unsigned NOT NULL,
  `extra_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `type_extra_type_id_foreign` (`type_id`),
  KEY `type_extra_extra_id_foreign` (`extra_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `type_extra`
--

INSERT INTO `type_extra` (`id`, `type_id`, `extra_id`, `created_at`, `updated_at`) VALUES
(15, 24, 1, '2014-09-09 20:09:18', '2014-09-09 20:09:18'),
(16, 24, 2, '2014-09-09 20:09:18', '2014-09-09 20:09:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `activated`, `activation_code`, `activated_at`, `last_login`, `persist_code`, `reset_password_code`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', '$2y$10$o7S0MxRno1E8m48aL.4rcuPcL6UGan27YbbZEK2X6wUYjz5RQZFd2', NULL, 1, NULL, NULL, '2016-09-10 07:59:37', '$2y$10$6hJnBbqBBG41htpla24UI.dH3TnJ8T0IEYoTVtY5WkhLZtwsYGJgq', NULL, 'admin', 'admin', '2014-11-17 00:19:17', '2016-09-10 07:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_id`, `group_id`) VALUES
(1, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `car_type`
--
ALTER TABLE `car_type`
  ADD CONSTRAINT `car_type_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `car_type_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`reservation_id`) REFERENCES `reservation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `type_extra`
--
ALTER TABLE `type_extra`
  ADD CONSTRAINT `type_extra_extra_id_foreign` FOREIGN KEY (`extra_id`) REFERENCES `extra` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `type_extra_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
