-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000312083.hosting-data.io
-- Generation Time: Apr 14, 2020 at 02:37 PM
-- Server version: 5.7.28-log
-- PHP Version: 7.0.33-0+deb9u7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs304646`
--
CREATE DATABASE IF NOT EXISTS `dbs304646` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dbs304646`;

-- --------------------------------------------------------

--
-- Table structure for table `cms_footer`
--

CREATE TABLE `cms_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_header`
--

CREATE TABLE `cms_header` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_menu`
--

CREATE TABLE `cms_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci,
  `page_url` longtext COLLATE utf8_unicode_ci,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_09_09_022155_create_table_sellers', 1),
(2, '2019_09_09_070928_create_table_products', 1),
(3, '2019_09_09_074208_create_table_product_images', 1),
(4, '2019_11_17_020800_create_table_cms_pages', 1),
(5, '2019_11_17_020849_create_table_cms_header', 1),
(6, '2019_11_17_020935_create_table_cms_menu', 1),
(7, '2019_11_17_120044_create_table_cms_footer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `request_id` int(10) NOT NULL,
  `product_title` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upc_product_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `make` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `seller_original_quantity` int(100) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `special_deal_price` double DEFAULT NULL,
  `lowest_price` double DEFAULT NULL,
  `deal_expiry_date` date DEFAULT NULL,
  `product_description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `request_id`, `product_title`, `upc_product_code`, `make`, `model`, `condition`, `color`, `size`, `url`, `price`, `seller_original_quantity`, `category`, `special_deal_price`, `lowest_price`, `deal_expiry_date`, `product_description`, `created_at`, `updated_at`) VALUES
(20, 17, 1, 'Samsung Tab 10.1', '49', 'Samsung', 'Tab', '10.1\"', 'New', 'WiFi enabled', NULL, 241.99, 10, 'Electronics', 225, 220, '2020-03-31', 'Samsung (49)', '2020-03-22 10:07:28', '2020-03-22 10:07:28'),
(21, 17, 4, 'Shirt for Sale', 'SH001', 'Zodiac', 'Blue', 'Chex', 'Small Size', 'New', NULL, 90, 10, 'Miscellaneous', 80, 70, '2020-12-12', 'Shirt for WooCommerce', '2020-03-22 10:40:59', '2020-03-22 10:40:59'),
(22, 17, 5, 'Shirt from ZenCart', '1', 'Van Hussen', 'Shirt', 'Chex', 'Blue', 'New', NULL, 2000, 10, 'Miscellaneous', 1900, 1800, '2020-12-12', 'Xencart Shirt = Product Code 1', '2020-03-22 10:43:07', '2020-03-22 10:43:07'),
(23, 18, 17, 'Phone', '12345678', 'wq', 'qw', 'qw', 'wq', 'aqw', NULL, 100, 10, 'Electronics', 90, 0, '2020-03-31', 'Phone', '2020-03-23 09:48:11', '2020-03-23 09:48:11'),
(24, 17, 18, 'BMW 328i For Sale', 'BMW_328i_White', 'BMW', '328i', '65000', '2012', 'White', NULL, 20000, 10, 'Automobiles', 19000, 18000, '2020-08-31', 'Amazing BMW for Sale.. With M Package\r\nAll maintenance records well kept. Second owner\r\nConvirtible', '2020-03-25 02:21:08', '2020-03-25 02:21:08'),
(25, 17, 21, 'Instant Pot Smart WiFi', 'instant_pot_wifi7', 'InstantPot', 'SmartWifi', '6 qt', 'Silver', 'New', NULL, 229, 10, 'Appliances', 215, 205, '2020-03-31', 'Instant Pot WiFi7', '2020-03-27 09:10:06', '2020-03-27 09:10:06'),
(26, 19, 26, 'LG Referigertaor', 'LG_121L_Grey', 'Referigerator', 'LG', '121L', 'New', NULL, NULL, 100, 0, 'Electronics', 124, 110, '2020-03-31', 'A refrigerator is a machine for keeping things cold. It is sometimes called a fridge or an icebox. People put food and drinks in it, to keep those items cold or good (unspoiled) for a longer time. A refrigerator has a heat pump. ... The heat gets added to the air outside.', '2020-03-27 12:43:33', '2020-03-27 12:43:33'),
(27, 19, 27, 'Alto', '343445454', 'suzuki', 'Alto', '132', '2006', 'red', NULL, 1000, 0, 'Automobiles', 1200, 900, '2020-12-03', 'The Alto is a 5 seater Hatchback and has a length of 3495mm, width of 1475mm and a wheelbase of 2360mm', '2020-03-27 12:55:11', '2020-03-27 12:55:11'),
(28, 19, 28, 'Alto k10', '7676777', 'suzuki', 'Alto k10', '132', '2006', 'Grey', NULL, 1290, 0, 'Automobiles', 1400, 1200, '2020-12-03', 'Maruti Alto K10 LX', '2020-03-27 14:23:46', '2020-03-27 14:23:46'),
(29, 19, 29, 'Alto', '12121212', 'suzuki', 'alto', '12km/hr', '20008', 'multi', NULL, 125, 0, 'Automobiles', 170, 165, '2020-03-31', 'Maruti Alto K10 LX', '2020-03-27 14:41:10', '2020-03-27 14:41:10'),
(30, 19, 30, 'samsung', '56776554', 'Galaxy', 'samsung', 'Note', 'New', NULL, NULL, 155, 0, 'Electronics', 178, 166, '2020-03-31', 'galaxy m21', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(31, 19, 31, 'sony TV', '1234567', 'sony', 'Bravia', '42', 'black', 'new', NULL, 155, 200, 'Appliances', 119, 157, '0000-00-00', 'Best Of sony', '2020-03-27 15:29:09', '2020-03-27 19:04:31'),
(32, 19, 33, 'Alto', '5656566677', 'suzuki', 'alto', '1500', '2008', NULL, NULL, 350, 8, 'Automobiles', 167, 109, '2020-03-31', 'LXI998 cc, Manual, Petrol, 23.95 kmpl1 month waiting', '2020-03-27 19:17:02', '2020-03-27 19:17:02'),
(33, 19, 34, 'HP Nptebook', '988782732', 'HP', 'HP Note book', '15.60', 'black', 'New', NULL, 500, 20, 'Appliances', 450, 300, '2030-11-01', 'HP NoteBook is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixels.', '2020-03-27 19:32:24', '2020-03-27 19:38:02'),
(34, 19, 35, 'samsung  Referigertaor', '45656566', 'hp', 'hp', 'hp', 'new', NULL, NULL, 533, 1, 'Electronics', 321, 321, '2020-04-01', 'HP NoteBook is a Windows 10 laptop with a 15.60-inch display that has a resolution of 1366x768 pixels.', '2020-03-27 19:46:12', '2020-03-27 19:46:12'),
(35, 20, 36, '2019 Toyota Camry L', 'Toyota_Camry_White', 'Toyota', 'Camry', '29583', '2019', 'White', 'https://www.youtube.com/watch?v=RP3pyUMJkeM', 19900, 10, 'Automobiles', 19000, 18500, '0000-00-00', 'Recent Arrival!\r\nOdometer is 1466 miles below market average! Wind Chill Pearl 2019 Toyota Camry SE FWD 8-Speed Automatic 2.5L I4 DOHC 16V\r\n\r\nPriced below KBB Fair Purchase Price! 29/41 City/Highway MPG ABS brakes, Active Cruise Control, Alloy wheels, Electronic Stability Control, Illuminated entry, Low tire pressure warning, Navigation System, Remote keyless entry, Traction control.', '2020-03-27 21:12:30', '2020-03-27 21:19:45'),
(36, 19, 63, 'T-shirts', '67430900', 'color', 'size', 'black', 'small', 'medium', NULL, 109, 10, 'Miscellaneous', 100, 99, '2020-03-31', 'Round neck T-shirt', '2020-03-30 12:00:10', '2020-03-30 12:00:10'),
(37, 19, 64, 'T-shirts', '19999', 'Black', 'medium', 'small', 'large', 'X-small', NULL, 75.41, 1, 'Miscellaneous', 100, 99.58, '2020-03-31', 'Round T-shirts', '2020-03-30 12:04:59', '2020-03-30 12:04:59'),
(38, 19, 0, 'Laptop', 'lapthopg_h0110', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 09:38:23', '2020-03-31 09:38:23'),
(39, 19, 0, 'Laptop', 'laphghthjopt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:24', '2020-03-31 09:38:24'),
(40, 19, 0, 'Laptop', 'lapththjopt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:25', '2020-03-31 09:38:25'),
(41, 19, 0, 'Laptop', 'lapghthjopt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:25', '2020-03-31 09:38:25'),
(42, 19, 0, 'Laptop', 'laphthhjopt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:26', '2020-03-31 09:38:26'),
(43, 19, 0, 'Laptop', 'lapfffhhhthjopt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:27', '2020-03-31 09:38:27'),
(44, 19, 0, 'Laptop', 'laphthhghjopt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:27', '2020-03-31 09:38:27'),
(45, 19, 0, 'Laptop', 'laphthhgjttt_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:28', '2020-03-31 09:38:28'),
(46, 19, 0, 'Laptop', 'laphthhgggpt_0120', 'new', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:28', '2020-03-31 09:38:28'),
(47, 19, 0, 'Laptop', 'laphthhhhopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:29', '2020-03-31 09:38:29'),
(48, 19, 0, 'Laptop', 'lappphhgjopt_0120', 'new', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:30', '2020-03-31 09:38:30'),
(49, 19, 0, 'Laptop', 'laaathhgjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:30', '2020-03-31 09:38:30'),
(50, 19, 0, 'Laptop', 'lappphhjopt_0120', 'new', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:31', '2020-03-31 09:38:31'),
(51, 19, 0, 'Laptop', 'laphtttgjott_0120', 'new', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:31', '2020-03-31 09:38:31'),
(52, 19, 0, 'Laptop', 'lapptphgjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:32', '2020-03-31 09:38:32'),
(53, 19, 0, 'Laptop', 'laphtgggjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:33', '2020-03-31 09:38:33'),
(54, 19, 0, 'Laptop', 'laphhhhtjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:34', '2020-03-31 09:38:34'),
(55, 19, 0, 'Laptop', 'laphghggjjpt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:34', '2020-03-31 09:38:34'),
(56, 19, 0, 'Laptop', 'laphtthtjjpt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:35', '2020-03-31 09:38:35'),
(57, 19, 0, 'Laptop', 'lapttptgjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:35', '2020-03-31 09:38:35'),
(58, 19, 0, 'Laptop', 'lappathgjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:36', '2020-03-31 09:38:36'),
(59, 19, 0, 'Laptop', 'laptopogjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:37', '2020-03-31 09:38:37'),
(60, 19, 0, 'Laptop', 'lapotohojopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:37', '2020-03-31 09:38:37'),
(61, 19, 0, 'Laptop', 'lapttghgjopg_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:38', '2020-03-31 09:38:38'),
(62, 19, 0, 'Laptop', 'lapgttogjott_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:38', '2020-03-31 09:38:38'),
(63, 19, 0, 'Laptop', 'lapgtooghopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:39', '2020-03-31 09:38:39'),
(64, 19, 0, 'Laptop', 'lapththjjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:39', '2020-03-31 09:38:39'),
(65, 19, 0, 'Laptop', 'lapgtghgjopp_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:40', '2020-03-31 09:38:40'),
(66, 19, 0, 'Laptop', 'laphopopjopt_0120', 'old', '19 inch', 'black', '', '', '', 310, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:38:41', '2020-03-31 09:38:41'),
(67, 19, 0, 'Laptop', 'laptop_h0110', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 09:54:29', '2020-03-31 09:54:29'),
(68, 19, 0, 'Laptop', 'laptopp_0120', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 09:54:29', '2020-03-31 09:54:29'),
(69, 19, 0, 'Laptop', 'laptop_0123', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 10:08:14', '2020-03-31 10:08:14'),
(70, 19, 0, 'Laptop', 'laptopp_0123', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:08:15', '2020-03-31 10:08:15'),
(71, 19, 0, 'Laptop', 'laptopp_0124', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 10:42:11', '2020-03-31 10:42:11'),
(72, 19, 0, 'Laptop', 'laptopp_0125', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:12', '2020-03-31 10:42:12'),
(73, 19, 0, 'Laptop', 'laptopp_0126', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:12', '2020-03-31 10:42:12'),
(74, 19, 0, 'Laptop', 'laptopp_0127', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:13', '2020-03-31 10:42:13'),
(75, 19, 0, 'Laptop', 'laptopp_0128', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:13', '2020-03-31 10:42:13'),
(76, 19, 0, 'Laptop', 'laptopp_0129', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:14', '2020-03-31 10:42:14'),
(77, 19, 0, 'Laptop', 'laptopp_0130', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:15', '2020-03-31 10:42:15'),
(78, 19, 0, 'Laptop', 'laptopp_0131', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:42:15', '2020-03-31 10:42:15'),
(79, 19, 0, 'Laptop', 'laptopp_0132', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 10:48:08', '2020-03-31 10:48:08'),
(80, 19, 0, 'Laptop', 'laptopp_0133', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:09', '2020-03-31 10:48:09'),
(81, 19, 0, 'Laptop', 'laptopp_0134', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:09', '2020-03-31 10:48:09'),
(82, 19, 0, 'Laptop', 'laptopp_0135', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:10', '2020-03-31 10:48:10'),
(83, 19, 0, 'Laptop', 'laptopp_0136', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:11', '2020-03-31 10:48:11'),
(84, 19, 0, 'Laptop', 'laptopp_0137', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:11', '2020-03-31 10:48:11'),
(85, 19, 0, 'Laptop', 'laptopp_0138', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:12', '2020-03-31 10:48:12'),
(86, 19, 0, 'Laptop', 'laptopp_0139', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:48:12', '2020-03-31 10:48:12'),
(87, 19, 0, 'Laptop', 'laptopp_0150', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 10:55:21', '2020-03-31 10:55:21'),
(88, 19, 0, 'Laptop', 'laptopp_0151', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:21', '2020-03-31 10:55:21'),
(89, 19, 0, 'Laptop', 'laptopp_0152', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:22', '2020-03-31 10:55:22'),
(90, 19, 0, 'Laptop', 'laptopp_0153', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:22', '2020-03-31 10:55:22'),
(91, 19, 0, 'Laptop', 'laptopp_0154', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:23', '2020-03-31 10:55:23'),
(92, 19, 0, 'Laptop', 'laptopp_0155', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:23', '2020-03-31 10:55:23'),
(93, 19, 0, 'Laptop', 'laptopp_0156', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:24', '2020-03-31 10:55:24'),
(94, 19, 0, 'Laptop', 'laptopp_0157', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:55:25', '2020-03-31 10:55:25'),
(95, 19, 0, 'Laptop', 'laptop_160', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 10:59:02', '2020-03-31 10:59:02'),
(96, 19, 0, 'Laptop', 'laptopp_0161', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:02', '2020-03-31 10:59:02'),
(97, 19, 0, 'Laptop', 'laptopp_0162', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:03', '2020-03-31 10:59:03'),
(98, 19, 0, 'Laptop', 'laptopp_0163', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:03', '2020-03-31 10:59:03'),
(99, 19, 0, 'Laptop', 'laptopp_0164', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:04', '2020-03-31 10:59:04'),
(100, 19, 0, 'Laptop', 'laptopp_0165', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:04', '2020-03-31 10:59:04'),
(101, 19, 0, 'Laptop', 'laptopp_0166', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:05', '2020-03-31 10:59:05'),
(102, 19, 0, 'Laptop', 'laptopp_0167', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:05', '2020-03-31 10:59:05'),
(103, 19, 0, 'Laptop', 'laptopp_0168', 'new', '19 inch', 'black', '', '', '', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 10:59:06', '2020-03-31 10:59:06'),
(104, 19, 0, 'Laptop', 'laptopp_0182', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 11:29:04', '2020-03-31 11:29:04'),
(105, 19, 0, 'Laptop', 'laptopp_0183', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:05', '2020-03-31 11:29:05'),
(106, 19, 0, 'Laptop', 'laptopp_0184', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:05', '2020-03-31 11:29:05'),
(107, 19, 0, 'Laptop', 'laptopp_0185', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:06', '2020-03-31 11:29:06'),
(108, 19, 0, 'Laptop', 'laptopp_0186', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:06', '2020-03-31 11:29:06'),
(109, 19, 0, 'Laptop', 'laptopp_0187', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:07', '2020-03-31 11:29:07'),
(110, 19, 0, 'Laptop', 'laptopp_0188', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:07', '2020-03-31 11:29:07'),
(111, 19, 0, 'Laptop', 'laptopp_0189', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:29:08', '2020-03-31 11:29:08'),
(112, 19, 0, 'Laptop', 'laptop_h0190', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 11:58:14', '2020-03-31 11:58:14'),
(113, 19, 0, 'Laptop', 'laptopp_0191', 'old', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 0, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 11:58:15', '2020-03-31 11:58:15'),
(114, 19, 0, 'Laptop', 'laptopp_0200', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 500, 0, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 12:29:45', '2020-03-31 12:29:45'),
(115, 19, 0, 'Laptop', 'laptopp_0208', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 2, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 12:42:02', '2020-03-31 12:42:02'),
(116, 19, 0, 'Laptop', 'laptopp_0209', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:02', '2020-03-31 12:42:02'),
(117, 19, 0, 'Laptop', 'laptopp_0210', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:03', '2020-03-31 12:42:03'),
(118, 19, 0, 'Laptop', 'laptopp_0211', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:03', '2020-03-31 12:42:03'),
(119, 19, 0, 'Laptop', 'laptopp_0212', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:04', '2020-03-31 12:42:04'),
(120, 19, 0, 'Laptop', 'laptopp_0213', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:04', '2020-03-31 12:42:04'),
(121, 19, 0, 'Laptop', 'laptopp_0214', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:05', '2020-03-31 12:42:05'),
(122, 19, 0, 'Laptop', 'laptopp_0215', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 12:42:06', '2020-03-31 12:42:06'),
(123, 19, 0, 'Laptop', 'laptopp_0218', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 500, 2, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 12:53:25', '2020-03-31 12:53:25'),
(124, 19, 0, 'Laptop', 'laptopp_0219', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:11', '2020-03-31 13:05:11'),
(125, 19, 0, 'Laptop', 'laptopp_0220', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:11', '2020-03-31 13:05:11'),
(126, 19, 0, 'Laptop', 'laptopp_0221', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:12', '2020-03-31 13:05:12'),
(127, 19, 0, 'Laptop', 'laptopp_0222', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:13', '2020-03-31 13:05:13'),
(128, 19, 0, 'Laptop', 'laptopp_0223', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:13', '2020-03-31 13:05:13'),
(129, 19, 0, 'Laptop', 'laptopp_0224', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:14', '2020-03-31 13:05:14'),
(130, 19, 0, 'Laptop', 'laptopp_0225', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:05:14', '2020-03-31 13:05:14'),
(131, 19, 0, 'Laptop', 'laptopp_0228', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 2, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 13:07:52', '2020-03-31 13:07:52'),
(132, 19, 0, 'Laptop', 'laptopp_0229', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:52', '2020-03-31 13:07:52'),
(133, 19, 0, 'Laptop', 'laptopp_0230', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:53', '2020-03-31 13:07:53'),
(134, 19, 0, 'Laptop', 'laptopp_0231', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:54', '2020-03-31 13:07:54'),
(135, 19, 0, 'Laptop', 'laptopp_0232', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:54', '2020-03-31 13:07:54'),
(136, 19, 0, 'Laptop', 'laptopp_0233', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:55', '2020-03-31 13:07:55'),
(137, 19, 0, 'Laptop', 'laptopp_0234', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:56', '2020-03-31 13:07:56'),
(138, 19, 0, 'Laptop', 'laptopp_0235', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:07:56', '2020-03-31 13:07:56'),
(139, 19, 0, 'Laptop', 'laptopp_0237', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 2, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 13:12:25', '2020-03-31 13:12:25'),
(140, 19, 0, 'Laptop', 'laptopp_0238', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:26', '2020-03-31 13:12:26'),
(141, 19, 0, 'Laptop', 'laptopp_0239', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:26', '2020-03-31 13:12:26'),
(142, 19, 0, 'Laptop', 'laptopp_0240', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:27', '2020-03-31 13:12:27'),
(143, 19, 0, 'Laptop', 'laptopp_0241', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:28', '2020-03-31 13:12:28'),
(144, 19, 0, 'Laptop', 'laptopp_0242', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:28', '2020-03-31 13:12:28'),
(145, 19, 0, 'Laptop', 'laptopp_0243', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:29', '2020-03-31 13:12:29'),
(146, 19, 0, 'Laptop', 'laptopp_0244', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 0, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:12:29', '2020-03-31 13:12:29'),
(147, 19, 0, 'Laptop', 'laptopp_0246', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 2, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 13:50:06', '2020-03-31 13:50:06'),
(148, 19, 0, 'Laptop', 'laptopp_0247', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:07', '2020-03-31 13:50:07'),
(149, 19, 0, 'Laptop', 'laptopp_0248', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:08', '2020-03-31 13:50:08'),
(150, 19, 0, 'Laptop', 'laptopp_0249', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:08', '2020-03-31 13:50:08'),
(151, 19, 0, 'Laptop', 'laptopp_0250', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:09', '2020-03-31 13:50:09'),
(152, 19, 0, 'Laptop', 'laptopp_0251', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:10', '2020-03-31 13:50:10'),
(153, 19, 0, 'Laptop', 'laptopp_0252', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:10', '2020-03-31 13:50:10'),
(154, 19, 0, 'Laptop', 'laptopp_0253', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:50:12', '2020-03-31 13:50:12'),
(155, 19, 0, 'Laptop', 'laptopp_0255', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 400, 2, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 13:57:21', '2020-03-31 13:57:21'),
(156, 19, 0, 'Laptop', 'laptopp_0256', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:21', '2020-03-31 13:57:21'),
(157, 19, 0, 'Laptop', 'laptopp_0257', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 200, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:22', '2020-03-31 13:57:22'),
(158, 19, 0, 'Laptop', 'laptopp_0258', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 100, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:23', '2020-03-31 13:57:23'),
(159, 19, 0, 'Laptop', 'laptopp_0259', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 150, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:23', '2020-03-31 13:57:23'),
(160, 19, 0, 'Laptop', 'laptopp_0260', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 250, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:24', '2020-03-31 13:57:24'),
(161, 19, 0, 'Laptop', 'laptopp_0261', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 210, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:25', '2020-03-31 13:57:25'),
(162, 19, 0, 'Laptop', 'laptopp_0262', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 203, 5, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 13:57:25', '2020-03-31 13:57:25'),
(163, 19, 0, 'Laptop', 'laptopp_0280', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 18:34:22', '2020-03-31 18:34:22'),
(164, 19, 0, 'Laptop', 'laptopp_0281', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:23', '2020-03-31 18:34:23'),
(165, 19, 0, 'Laptop', 'laptopp_0282', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:23', '2020-03-31 18:34:23'),
(166, 19, 0, 'Laptop', 'laptopp_0283', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 200, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:24', '2020-03-31 18:34:24'),
(167, 19, 0, 'Laptop', 'laptopp_0284', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:24', '2020-03-31 18:34:24'),
(168, 19, 0, 'Laptop', 'laptopp_0285', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:25', '2020-03-31 18:34:25'),
(169, 19, 0, 'Laptop', 'laptopp_0286', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 250, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:26', '2020-03-31 18:34:26'),
(170, 19, 0, 'Laptop', 'laptopp_0287', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:34:26', '2020-03-31 18:34:26'),
(171, 19, 0, 'Laptop', 'laptopp_0288', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.67, 3, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 18:37:52', '2020-03-31 18:37:52'),
(172, 19, 0, 'Laptop', 'laptopp_0289', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.87, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:53', '2020-03-31 18:37:53'),
(173, 19, 0, 'Laptop', 'laptopp_0290', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:54', '2020-03-31 18:37:54'),
(174, 19, 0, 'Laptop', 'laptopp_0291', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 200, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:54', '2020-03-31 18:37:54'),
(175, 19, 0, 'Laptop', 'laptopp_0292', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.76, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:55', '2020-03-31 18:37:55'),
(176, 19, 0, 'Laptop', 'laptopp_0293', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.5, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:56', '2020-03-31 18:37:56'),
(177, 19, 0, 'Laptop', 'laptopp_0294', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 250, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:57', '2020-03-31 18:37:57'),
(178, 19, 0, 'Laptop', 'laptopp_0295', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:37:57', '2020-03-31 18:37:57'),
(179, 19, 0, 'Laptop', 'laptopp_0297', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.671, 3, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 18:41:05', '2020-03-31 18:41:05'),
(180, 19, 0, 'Laptop', 'laptopp_0298', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.872, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:05', '2020-03-31 18:41:05'),
(181, 19, 0, 'Laptop', 'laptopp_0299', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:06', '2020-03-31 18:41:06'),
(182, 19, 0, 'Laptop', 'laptopp_0300', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 200, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:06', '2020-03-31 18:41:06'),
(183, 19, 0, 'Laptop', 'laptopp_0301', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.762, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:07', '2020-03-31 18:41:07'),
(184, 19, 0, 'Laptop', 'laptopp_0302', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.5, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:08', '2020-03-31 18:41:08'),
(185, 19, 0, 'Laptop', 'laptopp_0303', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 250, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:08', '2020-03-31 18:41:08'),
(186, 19, 0, 'Laptop', 'laptopp_0304', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:41:09', '2020-03-31 18:41:09'),
(187, 19, 0, 'Laptop', 'laptopp_0305', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', -300.671, 3, 'Electronics', 250, 220, '2020-03-31', '', '2020-03-31 18:42:47', '2020-03-31 18:42:47'),
(188, 19, 0, 'Laptop', 'laptopp_0306', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.872, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:47', '2020-03-31 18:42:47'),
(189, 19, 0, 'Laptop', 'laptopp_0307', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:48', '2020-03-31 18:42:48'),
(190, 19, 0, 'Laptop', 'laptopp_0308', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 200, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:49', '2020-03-31 18:42:49'),
(191, 19, 0, 'Laptop', 'laptopp_0309', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.762, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:49', '2020-03-31 18:42:49'),
(192, 19, 0, 'Laptop', 'laptopp_0310', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300.5, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:50', '2020-03-31 18:42:50'),
(193, 19, 0, 'Laptop', 'laptopp_0311', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 250, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:50', '2020-03-31 18:42:50'),
(194, 19, 0, 'Laptop', 'laptopp_0312', 'new', '19 inch', 'black', '', '', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', 300, 3, 'Electronics', 280, 250, '2020-03-31', '', '2020-03-31 18:42:51', '2020-03-31 18:42:51'),
(195, 19, 260, 'cars2222', '5555555', 'suzuki', 'Alto', '4500mm', 'red', 'new', NULL, 105, 1, 'Automobiles', 110, 90, '2020-04-06', 'The Average car length is around 4500mm or 14,7 feet. For example, this is the length of a car in the mid-size class like Audi A4, which should give you a perspective of the length of any car models. Of course, some vehicles are both much more extended and shorter.', '2020-04-03 17:26:32', '2020-04-03 17:26:32'),
(196, 19, 261, 'Alto', '66778889', 'suzuki', 'alto', '150', '2009', 'red', NULL, 103, 44, 'Automobiles', 120, 100, '2020-04-20', 'The Average car length is around 4500mm or 14,7 feet. For example, this is the length of a car in the mid-size class like Audi A4, which should give you a perspective of the length of any car models. Of course, some vehicles are both much more extended and shorter.', '2020-04-03 17:37:30', '2020-04-03 17:37:30'),
(197, 19, 265, 'Alto', '67666999', 'suzuki', 'Alto', '45000', '2009', 'black', NULL, 111, 6, 'Automobiles', 222, 101, '2020-04-03', 'The Average car length is around 4500mm or 14,7 feet. For example, this is the length of a car in the mid-size class like Audi A4, which should give you a perspective of the length of any car models. Of course, some vehicles are both much more extended and shorter.', '2020-04-03 18:40:39', '2020-04-03 18:40:39'),
(198, 43, 283, 'New car 2020', 'new2020', 'new', '2020', '10', '2020', 'black', NULL, 10000, 10, 'Automobiles', 12000, 11000, '2020-04-15', 'new car 2020', '2020-04-07 14:25:57', '2020-04-07 14:25:57'),
(199, 41, 284, 'car 2020', 'new 202021', 'BMW', 's', '65000', '2012', 'balck', NULL, 10000, 10, 'Automobiles', 12000, 11000, '2020-04-09', 'new 0202', '2020-04-07 14:40:12', '2020-04-07 14:40:12'),
(200, 19, 310, 'refrigerator', '345456565', 'cooling', 'samsung', 'sam12345', 'new', 'double door', NULL, 25000, 1, 'Electronics', 22000, 20000, '2020-04-10', 'KG refrigetrator', '2020-04-09 10:47:15', '2020-04-09 10:47:15'),
(201, 19, 312, 'microwave  oven', 'LG MC2886SFU', 'LG', 'LG MC2886BRUM', '28L', 'maronnew', 'new', NULL, 10000, 1, 'Appliances', 10000, 9000, '2020-04-10', 'The  All In One Microwave Oven gives you the perfect reason to have your dream kitchen', '2020-04-09 12:40:02', '2020-04-09 12:40:02'),
(202, 17, 342, 'Vyas Anil Honda Accord', 'Honda_Accord_Red1', 'Honda', 'Accord', '45000', '2010', 'Red', NULL, 15000, 20, 'Automobiles', 14000, 13500, '2020-12-31', 'Honda Accord Red1', '2020-04-11 10:18:06', '2020-04-11 10:18:06'),
(203, 19, 353, 'refrigerator', '787878787', 'cooling', 'LG', 'LG1234', 'new', 'double door', NULL, 120, 1, 'Electronics', 100, 100, '2020-04-15', 'Refrigerator model', '2020-04-14 18:24:14', '2020-04-14 18:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_upc_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `product_upc_code`, `file_path`, `created_at`, `updated_at`) VALUES
(24, 20, '49', '1584857248samsung_tab_1-228x228.jpg/WOXuzQQ5kuYOUxMVsyByJ53rk611PYWr13KsLlNK.jpeg', '2020-03-22 10:07:28', '2020-03-22 10:07:28'),
(25, 21, 'SH001', '1584859259Shirt.jpg/80DpHCMop2Tt53fJekgpEjVfRnnsDgZZX9Q8JO0c.jpeg', '2020-03-22 10:40:59', '2020-03-22 10:40:59'),
(26, 22, '1', '1584859387Shirt.jpg/CgsYsM2HyRsfbujXnyEQ5DLccmwFnVe59pSExnWK.jpeg', '2020-03-22 10:43:08', '2020-03-22 10:43:08'),
(27, 23, '12345678', '1584942491img.jpeg/hx3JyLkuW5qoXH5QXYeDcxwnNrNYg8QrnWs46K7g.jpeg', '2020-03-23 09:48:11', '2020-03-23 09:48:11'),
(28, 24, 'BMW_328i_White', '1585088469BMW328i.jpg/xLxyS1e8F4NypX6sPRTAAYg6EEf5PiF49f9WVfGb.jpeg', '2020-03-25 02:21:09', '2020-03-25 02:21:09'),
(29, 25, 'instant_pot_wifi7', '1585285807smart-wifi-1-705x705.jpg/wmwh6xj21KcfMuW2s1YXAm3r4ZWlUh3Gu6PCCLBX.jpeg', '2020-03-27 09:10:07', '2020-03-27 09:10:07'),
(30, 25, 'instant_pot_wifi7', '1585285807Smart-Wifi-Badge-705x705.jpg/EUGeBTM0EmE8nse0vmHmdrdkdtoEvODmuYsrOSag.jpeg', '2020-03-27 09:10:07', '2020-03-27 09:10:07'),
(31, 25, 'instant_pot_wifi7', '1585285807Smart-Wifi-Facia-705x705.jpg/y25ZExcCo0BkHwJqYxpyGk97vEQ01ksfvGJBS8v8.jpeg', '2020-03-27 09:10:07', '2020-03-27 09:10:07'),
(32, 25, 'instant_pot_wifi7', '1585285807Smart-Wifi-Lifestyle-2-705x705.jpg/VJQx0wq1mc6E6JVEApEhaNo9V4RkuOhqNqMLA3ix.jpeg', '2020-03-27 09:10:07', '2020-03-27 09:10:07'),
(33, 26, 'LG_121L_Grey', '1585298613download.jpg/Ecnzgu4eDOpOyCmYocRRiml05wbHjke36CbUnUgp.jpeg', '2020-03-27 12:43:33', '2020-03-27 12:43:33'),
(34, 26, 'LG_121L_Grey', '1585298613godrej-refrigerator.jpg/Ww5VtGHQK7YySlbpIdHEY1DChHEv9CfWqZSBhGx8.jpeg', '2020-03-27 12:43:33', '2020-03-27 12:43:33'),
(35, 27, '343445454', '1585299311download (1).jpg/XK7IturSt0apbUqjzypsItbpUx7g5U9aWG5x76X3.jpeg', '2020-03-27 12:55:11', '2020-03-27 12:55:11'),
(36, 28, '7676777', '1585304626granite-grey-500x500.png/VwGqpwa8qAKTjszT4KHGkLmqgWkbJ1kp3XasNlJt.png', '2020-03-27 14:23:46', '2020-03-27 14:23:46'),
(37, 29, '12121212', '1585305670download (1) - Copy.jpg/zX7fD0nxyOnrX4midYoMZ6JqfUfAOq3kQ0xi9s6l.jpeg', '2020-03-27 14:41:10', '2020-03-27 14:41:10'),
(38, 29, '12121212', '1585305670granite-grey-500x500.png/LNxwiEdj1NLpTkPi7zPJDkUlxNIsnMbukkFBp4AT.png', '2020-03-27 14:41:10', '2020-03-27 14:41:10'),
(39, 30, '56776554', '1585306475download (2).jpg/adpHiV4xBActqmwoeqPx2VHz29mgCMyUtOjPcjm5.jpeg', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(40, 30, '56776554', '1585306475download (3).jpg/3xWC2fAsXI2zJltVoxIVNYtPumnjNNLbpijTPShg.jpeg', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(41, 30, '56776554', '1585306475download (4).jpg/eYtBMIagapIP6knqXfDOt93m5T3GZHYGQ5CrrUhO.jpeg', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(42, 30, '56776554', '1585306475download (5).jpg/qrHFPRxPGP2s2pkVF1dRUFe43n726gtuj3lF8hoD.jpeg', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(43, 30, '56776554', '1585306475download (6).jpg/B8YKQVKXo4XgxuowGID3pfCrt8Qe3aYBSGLQXY0J.jpeg', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(44, 30, '56776554', '1585306475download (7).jpg/dQaZ7RFT2SjRn1uAxSGPDZGhrGXUNabbUhisn6vy.jpeg', '2020-03-27 14:54:35', '2020-03-27 14:54:35'),
(45, 31, '1234567', '1585308549download (9).jpg/c2n2Nfc13cVTJnk5UtEcpDdW1WAVGip4Ao02eQ3d.jpeg', '2020-03-27 15:29:09', '2020-03-27 15:29:09'),
(46, 32, '5656566677', '1585322222download (1) - Copy.jpg/X4m04Ii7KO2Na2Ty0vDExMtfDGpv66BlCMozWNmQ.jpeg', '2020-03-27 19:17:02', '2020-03-27 19:17:02'),
(47, 32, '5656566677', '1585322222granite-grey-500x500.png/9NPsUGCqxItqg6d0y0WnNXPcrbZEEAOwk0ZgzTec.png', '2020-03-27 19:17:02', '2020-03-27 19:17:02'),
(50, 33, '988782732', '15853233035beca52f8c35ab06bb70d534.jpg/JLFITQdILnPEiqst3N5jFBkaj9ZX2khgUy8ZxInz.jpeg', '2020-03-27 19:35:03', '2020-03-27 19:35:03'),
(51, 34, '45656566', '15853239725beca52f8c35ab06bb70d534.jpg/S3acy8ZWSYz2etx8mncO4AG5GCYpS96D4G5HCf94.jpeg', '2020-03-27 19:46:12', '2020-03-27 19:46:12'),
(52, 35, 'Toyota_Camry_White', '1585329150Toyota_Camry_White.jpg/NYjsukokZ3uERm1pePLoz2SWN5n4tlOpqFsll4lC.jpeg', '2020-03-27 21:12:30', '2020-03-27 21:12:30'),
(53, 36, '67430900', '1585555210images.jpg/4kFTZbeXLKlWVaBjmIpOoTLmfRovQvXkSkPJ2K25.jpeg', '2020-03-30 12:00:10', '2020-03-30 12:00:10'),
(54, 37, '19999', '1585555499hmgoepprod - Copy.jpg/Xfeeay3zOcwgDAHj5Lq4Utf2ZrsjRiNAIRHriEvv.jpeg', '2020-03-30 12:04:59', '2020-03-30 12:04:59'),
(55, 37, '19999', '1585555499hmgoepprod.jpg/K4U0DDdsjmePd8egRvYeWR91nRxjvu3F0SvtZNMJ.jpeg', '2020-03-30 12:04:59', '2020-03-30 12:04:59'),
(56, 37, '19999', '1585555499images.jpg/TrC1n9iJIi3umFZhGzBUw9QJYUcyQgq71svZ309E.jpeg', '2020-03-30 12:04:59', '2020-03-30 12:04:59'),
(57, 38, 'lapthopg_h0110', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 09:38:23', '2020-03-31 09:38:23'),
(58, 38, 'lapthopg_h0110', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 09:38:23', '2020-03-31 09:38:23'),
(59, 39, 'laphghthjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:24', '2020-03-31 09:38:24'),
(60, 39, 'laphghthjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:24', '2020-03-31 09:38:24'),
(61, 40, 'lapththjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:25', '2020-03-31 09:38:25'),
(62, 40, 'lapththjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:25', '2020-03-31 09:38:25'),
(63, 41, 'lapghthjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:25', '2020-03-31 09:38:25'),
(64, 41, 'lapghthjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:25', '2020-03-31 09:38:25'),
(65, 42, 'laphthhjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:26', '2020-03-31 09:38:26'),
(66, 42, 'laphthhjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:26', '2020-03-31 09:38:26'),
(67, 43, 'lapfffhhhthjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:27', '2020-03-31 09:38:27'),
(68, 43, 'lapfffhhhthjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:27', '2020-03-31 09:38:27'),
(69, 44, 'laphthhghjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:27', '2020-03-31 09:38:27'),
(70, 44, 'laphthhghjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:27', '2020-03-31 09:38:27'),
(71, 45, 'laphthhgjttt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:28', '2020-03-31 09:38:28'),
(72, 45, 'laphthhgjttt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:28', '2020-03-31 09:38:28'),
(73, 46, 'laphthhgggpt_0120', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 09:38:28', '2020-03-31 09:38:28'),
(74, 46, 'laphthhgggpt_0120', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 09:38:28', '2020-03-31 09:38:28'),
(75, 47, 'laphthhhhopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:29', '2020-03-31 09:38:29'),
(76, 47, 'laphthhhhopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:29', '2020-03-31 09:38:29'),
(77, 48, 'lappphhgjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:30', '2020-03-31 09:38:30'),
(78, 48, 'lappphhgjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:30', '2020-03-31 09:38:30'),
(79, 49, 'laaathhgjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:30', '2020-03-31 09:38:30'),
(80, 49, 'laaathhgjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:30', '2020-03-31 09:38:30'),
(81, 50, 'lappphhjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:31', '2020-03-31 09:38:31'),
(82, 50, 'lappphhjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:31', '2020-03-31 09:38:31'),
(83, 51, 'laphtttgjott_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:32', '2020-03-31 09:38:32'),
(84, 51, 'laphtttgjott_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:32', '2020-03-31 09:38:32'),
(85, 52, 'lapptphgjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:32', '2020-03-31 09:38:32'),
(86, 52, 'lapptphgjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:32', '2020-03-31 09:38:32'),
(87, 53, 'laphtgggjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:33', '2020-03-31 09:38:33'),
(88, 53, 'laphtgggjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:33', '2020-03-31 09:38:33'),
(89, 54, 'laphhhhtjopt_0120', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 09:38:34', '2020-03-31 09:38:34'),
(90, 54, 'laphhhhtjopt_0120', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 09:38:34', '2020-03-31 09:38:34'),
(91, 55, 'laphghggjjpt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:34', '2020-03-31 09:38:34'),
(92, 55, 'laphghggjjpt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:34', '2020-03-31 09:38:34'),
(93, 56, 'laphtthtjjpt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:35', '2020-03-31 09:38:35'),
(94, 56, 'laphtthtjjpt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:35', '2020-03-31 09:38:35'),
(95, 57, 'lapttptgjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:35', '2020-03-31 09:38:35'),
(96, 57, 'lapttptgjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:35', '2020-03-31 09:38:35'),
(97, 58, 'lappathgjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:36', '2020-03-31 09:38:36'),
(98, 58, 'lappathgjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:36', '2020-03-31 09:38:36'),
(99, 59, 'laptopogjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:37', '2020-03-31 09:38:37'),
(100, 59, 'laptopogjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:37', '2020-03-31 09:38:37'),
(101, 60, 'lapotohojopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:37', '2020-03-31 09:38:37'),
(102, 60, 'lapotohojopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:37', '2020-03-31 09:38:37'),
(103, 61, 'lapttghgjopg_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:38', '2020-03-31 09:38:38'),
(104, 61, 'lapttghgjopg_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:38', '2020-03-31 09:38:38'),
(105, 62, 'lapgttogjott_0120', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 09:38:38', '2020-03-31 09:38:38'),
(106, 62, 'lapgttogjott_0120', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 09:38:38', '2020-03-31 09:38:38'),
(107, 63, 'lapgtooghopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:39', '2020-03-31 09:38:39'),
(108, 63, 'lapgtooghopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:39', '2020-03-31 09:38:39'),
(109, 64, 'lapththjjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:39', '2020-03-31 09:38:39'),
(110, 64, 'lapththjjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:39', '2020-03-31 09:38:39'),
(111, 65, 'lapgtghgjopp_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:40', '2020-03-31 09:38:40'),
(112, 65, 'lapgtghgjopp_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:40', '2020-03-31 09:38:40'),
(113, 66, 'laphopopjopt_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:38:41', '2020-03-31 09:38:41'),
(114, 66, 'laphopopjopt_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:38:41', '2020-03-31 09:38:41'),
(115, 67, 'laptop_h0110', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 09:54:29', '2020-03-31 09:54:29'),
(116, 67, 'laptop_h0110', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 09:54:29', '2020-03-31 09:54:29'),
(117, 68, 'laptopp_0120', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 09:54:29', '2020-03-31 09:54:29'),
(118, 68, 'laptopp_0120', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 09:54:29', '2020-03-31 09:54:29'),
(119, 69, 'laptop_0123', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 10:08:14', '2020-03-31 10:08:14'),
(120, 69, 'laptop_0123', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 10:08:14', '2020-03-31 10:08:14'),
(121, 70, 'laptopp_0123', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:08:15', '2020-03-31 10:08:15'),
(122, 70, 'laptopp_0123', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:08:15', '2020-03-31 10:08:15'),
(123, 71, 'laptopp_0124', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:11', '2020-03-31 10:42:11'),
(124, 72, 'laptopp_0125', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:12', '2020-03-31 10:42:12'),
(125, 73, 'laptopp_0126', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:12', '2020-03-31 10:42:12'),
(126, 74, 'laptopp_0127', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:13', '2020-03-31 10:42:13'),
(127, 75, 'laptopp_0128', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:13', '2020-03-31 10:42:13'),
(128, 76, 'laptopp_0129', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:14', '2020-03-31 10:42:14'),
(129, 77, 'laptopp_0130', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:15', '2020-03-31 10:42:15'),
(130, 78, 'laptopp_0131', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:42:15', '2020-03-31 10:42:15'),
(131, 79, 'laptopp_0132', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:08', '2020-03-31 10:48:08'),
(132, 80, 'laptopp_0133', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:09', '2020-03-31 10:48:09'),
(133, 81, 'laptopp_0134', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:09', '2020-03-31 10:48:09'),
(134, 82, 'laptopp_0135', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:10', '2020-03-31 10:48:10'),
(135, 83, 'laptopp_0136', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:11', '2020-03-31 10:48:11'),
(136, 84, 'laptopp_0137', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:11', '2020-03-31 10:48:11'),
(137, 85, 'laptopp_0138', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:12', '2020-03-31 10:48:12'),
(138, 86, 'laptopp_0139', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 10:48:12', '2020-03-31 10:48:12'),
(139, 87, 'laptopp_0150', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:55:21', '2020-03-31 10:55:21'),
(140, 88, 'laptopp_0151', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 10:55:21', '2020-03-31 10:55:21'),
(141, 89, 'laptopp_0152', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 10:55:22', '2020-03-31 10:55:22'),
(142, 90, 'laptopp_0153', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:55:22', '2020-03-31 10:55:22'),
(143, 91, 'laptopp_0154', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:55:23', '2020-03-31 10:55:23'),
(144, 92, 'laptopp_0155', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:55:23', '2020-03-31 10:55:23'),
(145, 93, 'laptopp_0156', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:55:24', '2020-03-31 10:55:24'),
(146, 94, 'laptopp_0157', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:55:25', '2020-03-31 10:55:25'),
(147, 95, 'laptop_160', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 10:59:02', '2020-03-31 10:59:02'),
(148, 95, 'laptop_160', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 10:59:02', '2020-03-31 10:59:02'),
(149, 96, 'laptopp_0161', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:02', '2020-03-31 10:59:02'),
(150, 96, 'laptopp_0161', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:02', '2020-03-31 10:59:02'),
(151, 97, 'laptopp_0162', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:03', '2020-03-31 10:59:03'),
(152, 97, 'laptopp_0162', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:03', '2020-03-31 10:59:03'),
(153, 98, 'laptopp_0163', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:03', '2020-03-31 10:59:03'),
(154, 98, 'laptopp_0163', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:03', '2020-03-31 10:59:03'),
(155, 99, 'laptopp_0164', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:04', '2020-03-31 10:59:04'),
(156, 99, 'laptopp_0164', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:04', '2020-03-31 10:59:04'),
(157, 100, 'laptopp_0165', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:04', '2020-03-31 10:59:04'),
(158, 100, 'laptopp_0165', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:04', '2020-03-31 10:59:04'),
(159, 101, 'laptopp_0166', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:05', '2020-03-31 10:59:05'),
(160, 101, 'laptopp_0166', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:05', '2020-03-31 10:59:05'),
(161, 102, 'laptopp_0167', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:05', '2020-03-31 10:59:05'),
(162, 102, 'laptopp_0167', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:05', '2020-03-31 10:59:05'),
(163, 103, 'laptopp_0168', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 10:59:06', '2020-03-31 10:59:06'),
(164, 103, 'laptopp_0168', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 10:59:06', '2020-03-31 10:59:06'),
(165, 104, 'laptopp_0182', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:29:04', '2020-03-31 11:29:04'),
(166, 105, 'laptopp_0183', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 11:29:05', '2020-03-31 11:29:05'),
(167, 106, 'laptopp_0184', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 11:29:05', '2020-03-31 11:29:05'),
(168, 107, 'laptopp_0185', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:29:06', '2020-03-31 11:29:06'),
(169, 108, 'laptopp_0186', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:29:06', '2020-03-31 11:29:06'),
(170, 109, 'laptopp_0187', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:29:07', '2020-03-31 11:29:07'),
(171, 110, 'laptopp_0188', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:29:07', '2020-03-31 11:29:07'),
(172, 111, 'laptopp_0189', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:29:08', '2020-03-31 11:29:08'),
(173, 112, 'laptop_h0190', 'http://i.dell.com/sites/csimages/Video_Imagery/all/xps_7590_touch.png', '2020-03-31 11:58:14', '2020-03-31 11:58:14'),
(174, 112, 'laptop_h0190', 'https://media.4rgos.it/i/Argos/8684576_R_Z001A?w=750&h=440&qlt=70', '2020-03-31 11:58:14', '2020-03-31 11:58:14'),
(175, 113, 'laptopp_0191', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg ', '2020-03-31 11:58:15', '2020-03-31 11:58:15'),
(176, 113, 'laptopp_0191', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 11:58:15', '2020-03-31 11:58:15'),
(177, 114, 'laptopp_0200', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 12:29:45', '2020-03-31 12:29:45'),
(178, 115, 'laptopp_0208', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:02', '2020-03-31 12:42:02'),
(179, 116, 'laptopp_0209', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:02', '2020-03-31 12:42:02'),
(180, 117, 'laptopp_0210', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:03', '2020-03-31 12:42:03'),
(181, 118, 'laptopp_0211', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:03', '2020-03-31 12:42:03'),
(182, 119, 'laptopp_0212', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:04', '2020-03-31 12:42:04'),
(183, 120, 'laptopp_0213', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:04', '2020-03-31 12:42:04'),
(184, 121, 'laptopp_0214', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:05', '2020-03-31 12:42:05'),
(185, 122, 'laptopp_0215', 'https://www.amazon.com/dp/B0863D4XJW/ref=fs_a_mb_1', '2020-03-31 12:42:06', '2020-03-31 12:42:06'),
(186, 123, 'laptopp_0218', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 12:53:25', '2020-03-31 12:53:25'),
(187, 124, 'laptopp_0219', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 13:05:11', '2020-03-31 13:05:11'),
(188, 125, 'laptopp_0220', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 13:05:11', '2020-03-31 13:05:11'),
(189, 126, 'laptopp_0221', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:05:12', '2020-03-31 13:05:12'),
(190, 127, 'laptopp_0222', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:05:13', '2020-03-31 13:05:13'),
(191, 128, 'laptopp_0223', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:05:13', '2020-03-31 13:05:13'),
(192, 129, 'laptopp_0224', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:05:14', '2020-03-31 13:05:14'),
(193, 130, 'laptopp_0225', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:05:14', '2020-03-31 13:05:14'),
(194, 131, 'laptopp_0228', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:07:52', '2020-03-31 13:07:52'),
(195, 132, 'laptopp_0229', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 13:07:52', '2020-03-31 13:07:52'),
(196, 133, 'laptopp_0230', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 13:07:53', '2020-03-31 13:07:53'),
(197, 134, 'laptopp_0231', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:07:54', '2020-03-31 13:07:54'),
(198, 135, 'laptopp_0232', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:07:54', '2020-03-31 13:07:54'),
(199, 136, 'laptopp_0233', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:07:55', '2020-03-31 13:07:55'),
(200, 137, 'laptopp_0234', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:07:56', '2020-03-31 13:07:56'),
(201, 138, 'laptopp_0235', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:07:56', '2020-03-31 13:07:56'),
(202, 139, 'laptopp_0237', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:12:25', '2020-03-31 13:12:25'),
(203, 140, 'laptopp_0238', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 13:12:26', '2020-03-31 13:12:26'),
(204, 141, 'laptopp_0239', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 13:12:26', '2020-03-31 13:12:26'),
(205, 142, 'laptopp_0240', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:12:27', '2020-03-31 13:12:27'),
(206, 143, 'laptopp_0241', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:12:28', '2020-03-31 13:12:28'),
(207, 144, 'laptopp_0242', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:12:28', '2020-03-31 13:12:28'),
(208, 145, 'laptopp_0243', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:12:29', '2020-03-31 13:12:29'),
(209, 146, 'laptopp_0244', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:12:29', '2020-03-31 13:12:29'),
(210, 147, 'laptopp_0246', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:50:06', '2020-03-31 13:50:06'),
(211, 148, 'laptopp_0247', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.png', '2020-03-31 13:50:07', '2020-03-31 13:50:07'),
(212, 149, 'laptopp_0248', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.png', '2020-03-31 13:50:08', '2020-03-31 13:50:08'),
(213, 150, 'laptopp_0249', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:50:08', '2020-03-31 13:50:08'),
(214, 151, 'laptopp_0250', '0', '2020-03-31 13:50:09', '2020-03-31 13:50:09'),
(215, 152, 'laptopp_0251', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:50:10', '2020-03-31 13:50:10'),
(216, 153, 'laptopp_0252', '0', '2020-03-31 13:50:10', '2020-03-31 13:50:10'),
(217, 154, 'laptopp_0253', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 13:50:12', '2020-03-31 13:50:12'),
(218, 155, 'laptopp_0255', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/', '2020-03-31 13:57:21', '2020-03-31 13:57:21'),
(219, 156, 'laptopp_0256', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.png', '2020-03-31 13:57:21', '2020-03-31 13:57:21'),
(220, 157, 'laptopp_0257', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.png', '2020-03-31 13:57:22', '2020-03-31 13:57:22'),
(221, 158, 'laptopp_0258', '0', '2020-03-31 13:57:23', '2020-03-31 13:57:23'),
(222, 159, 'laptopp_0259', '0', '2020-03-31 13:57:23', '2020-03-31 13:57:23'),
(223, 160, 'laptopp_0260', '0', '2020-03-31 13:57:24', '2020-03-31 13:57:24'),
(224, 161, 'laptopp_0261', '0', '2020-03-31 13:57:25', '2020-03-31 13:57:25'),
(225, 162, 'laptopp_0262', '0', '2020-03-31 13:57:25', '2020-03-31 13:57:25'),
(226, 163, 'laptopp_0280', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:34:22', '2020-03-31 18:34:22'),
(227, 164, 'laptopp_0281', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:34:23', '2020-03-31 18:34:23'),
(228, 165, 'laptopp_0282', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:34:23', '2020-03-31 18:34:23'),
(229, 166, 'laptopp_0283', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:34:24', '2020-03-31 18:34:24'),
(230, 167, 'laptopp_0284', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:34:24', '2020-03-31 18:34:24'),
(231, 168, 'laptopp_0285', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:34:25', '2020-03-31 18:34:25'),
(232, 169, 'laptopp_0286', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:34:26', '2020-03-31 18:34:26'),
(233, 170, 'laptopp_0287', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:34:26', '2020-03-31 18:34:26'),
(234, 171, 'laptopp_0288', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:37:52', '2020-03-31 18:37:52'),
(235, 172, 'laptopp_0289', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:37:53', '2020-03-31 18:37:53'),
(236, 173, 'laptopp_0290', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:37:54', '2020-03-31 18:37:54'),
(237, 174, 'laptopp_0291', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:37:54', '2020-03-31 18:37:54'),
(238, 175, 'laptopp_0292', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:37:55', '2020-03-31 18:37:55'),
(239, 176, 'laptopp_0293', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:37:56', '2020-03-31 18:37:56'),
(240, 177, 'laptopp_0294', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:37:57', '2020-03-31 18:37:57'),
(241, 178, 'laptopp_0295', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:37:57', '2020-03-31 18:37:57'),
(242, 179, 'laptopp_0297', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:41:05', '2020-03-31 18:41:05'),
(243, 180, 'laptopp_0298', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:41:05', '2020-03-31 18:41:05'),
(244, 181, 'laptopp_0299', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:41:06', '2020-03-31 18:41:06'),
(245, 182, 'laptopp_0300', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:41:06', '2020-03-31 18:41:06'),
(246, 183, 'laptopp_0301', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:41:07', '2020-03-31 18:41:07'),
(247, 184, 'laptopp_0302', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:41:08', '2020-03-31 18:41:08'),
(248, 185, 'laptopp_0303', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:41:08', '2020-03-31 18:41:08'),
(249, 186, 'laptopp_0304', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:41:09', '2020-03-31 18:41:09'),
(250, 187, 'laptopp_0305', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:42:47', '2020-03-31 18:42:47'),
(251, 188, 'laptopp_0306', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:42:47', '2020-03-31 18:42:47'),
(252, 189, 'laptopp_0307', 'https://images-na.ssl-images-amazon.com/images/I/81ilQYt8wkL._SL1500_.jpg', '2020-03-31 18:42:48', '2020-03-31 18:42:48'),
(253, 190, 'laptopp_0308', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:42:49', '2020-03-31 18:42:49'),
(254, 191, 'laptopp_0309', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:42:49', '2020-03-31 18:42:49'),
(255, 192, 'laptopp_0310', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:42:50', '2020-03-31 18:42:50'),
(256, 193, 'laptopp_0311', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:42:50', '2020-03-31 18:42:50'),
(257, 194, 'laptopp_0312', ' https://img-prod-cms-rt-microsoft-com.akamaized.net/cms/api/am/imageFileData/RE3oYj5?ver=0b43&q=90&m=6&h=200&w=200&b=%23FFFFFFFF&o=f&aim=true', '2020-03-31 18:42:51', '2020-03-31 18:42:51'),
(258, 195, '5555555', '1585920392download (1) - Copy.jpg/NdQ2812u2ydwHCHFO6msKUSGcEnCETGHP2cdAvST.jpeg', '2020-04-03 17:26:32', '2020-04-03 17:26:32'),
(259, 196, '66778889', '1585921050download (1) - Copy.jpg/KGNnAS5dJxBzdrqShmryLmHNwVKcC7JSvtom20UM.jpeg', '2020-04-03 17:37:30', '2020-04-03 17:37:30'),
(260, 197, '67666999', '1585924839download (1) - Copy.jpg/NYkAItoTL2srpd0ouKIBbbMVYM3TZNAPlNKhKq4a.jpeg', '2020-04-03 18:40:39', '2020-04-03 18:40:39'),
(261, 198, 'new2020', '1586255157download.jpg/Vg5KexECy3VR4I9wn2EJIsiaLRpWx4zmtKvSqu6n.jpeg', '2020-04-07 14:25:57', '2020-04-07 14:25:57'),
(262, 199, 'new 202021', '1586256012download.jpg/BUqF9FzTJAEA9GumstdhH8mnp8CsiMqQhDsFHn3G.jpeg', '2020-04-07 14:40:12', '2020-04-07 14:40:12'),
(263, 200, '345456565', '1586414835download.jpg/0Vq8FtezWlf17WoiPsbKzKhR7cgb9QLThuMeUvNv.jpeg', '2020-04-09 10:47:15', '2020-04-09 10:47:15'),
(264, 201, 'LG MC2886SFU', '158642160236878958-lg-mc2886brum-28l-convection-microwave-oven-maroon-picture-large.jpg/cSZ7iO9WdazWHv8O2dtxFiUrSTCqKlKQxgsHbZDi.jpeg', '2020-04-09 12:40:02', '2020-04-09 12:40:02'),
(265, 202, 'Honda_Accord_Red1', '15865858862018-honda-accord-interior-review-car-and-driver-photo-692670-s-original.jpg/YSZRogRYAjQmD9Iw6x61Rr41cnFvAwWwO0DN2Ez7.jpeg', '2020-04-11 10:18:07', '2020-04-11 10:18:07'),
(266, 203, '787878787', '1586874254godrej-refrigerator.jpg/9aM4G5M3YRrpr3wY4diSGP7h5ZX50VfIWA6YQIRw.jpeg', '2020-04-14 18:24:14', '2020-04-14 18:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cell_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `negotiation` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `first_name`, `last_name`, `company_name`, `zip_code`, `email_address`, `password`, `cell_no`, `negotiation`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Anil', 'Vyas', 'HindHope', '90001', 'vyasanil@rediffmail.com', '$2y$10$xKV0iMqukoFavaIakS9a.O6oFDTeEVmfuFCga2rlWKzAt9vrDGYZS', '9998887777', 'auto', '', '2020-03-22 10:05:26', '2020-03-22 10:05:26'),
(18, 'Raman', 'Bajwa', 'Bajwa Infotech Pvt Ltd.', '134109', 'dbajwa763@gmail.com', '$2y$10$P7NYXJR4/e6RnQaXyKYNkupfsK97Op7YWdw.ywZP.THxD2yeGTKHG', '07341111171', 'auto', 'TXCjVDryhr9x19qsA48jtqq6Av1FjroVTH30lRnba4E5bdztA7', '2020-03-23 09:22:42', '2020-03-23 09:22:42'),
(19, 'archana', NULL, NULL, '700070', 'archanapandit21@gmail.com', '$2y$10$HKbJIu0p8gUE57ZDXUk54u9BPi6ajb2qIJxaMLPm.yW8kBsX6ZVVK', '9654266557', 'auto', '8vluCNnRXk1t2y8iib3OCag31pwj5ys0WoClcZXVM0eBqJuF8i', '2020-03-27 07:33:52', '2020-03-27 07:33:52'),
(20, 'David', 'Headley', 'Robo Sales', '98001', 'headley.david@gmail.com', '$2y$10$XP3NMkKXx/2QBy/27iPcGuee6gxOE.O7cjH0xdh6o86zk33C7dUuK', '972-325-8967', 'auto', 'JdT9w8MlACdF23gp3E5suyaaRI9DxndYWBrXFMiIkc3QBJ3mXl', '2020-03-27 21:08:07', '2020-03-27 21:08:07'),
(21, 'robo', NULL, NULL, 'gdgsgdhsgh', 'robo@gmail.com', '$2y$10$W2sFsKuvcnXqWkNQtFY0yOAfZLRq6SQ6d.nktFQueq21MAxf6P7Bu', '98654345678', 'auto', 'rIvsFYbUzecD0TZ6Uc2yChHMJ5o1ApSAdPZ0Dpxh0VGS9tL3zN', '2020-03-30 07:29:02', '2020-03-30 07:29:02'),
(22, 'aaaa', NULL, NULL, '123', 'a.b@gmail.com', '$2y$10$NvKSxJUrhB/9zeLsc7Nzeu8fwfiPTBRg1ivft8wEk.j3w7/Y3sCwm', '8765434567', 'auto', '', '2020-03-30 07:52:01', '2020-03-30 07:52:01'),
(23, 'aaaa', NULL, NULL, '5687888', 'a@gmail.co.in', '$2y$10$tKLyBvXwujL.EPb7Jhj4QufkXUVquW/wt4ej7THh8ZATzgrpulKc6', '6767878787878', 'auto', 'ZCEPiM0BEsc3pqm67apKWPZ7BdM5lox5C1KRAH5oeY10TJcNyj', '2020-03-30 07:53:27', '2020-03-30 07:53:27'),
(24, 'bbb', NULL, NULL, '5556566', 'a+b@g.com', '$2y$10$KZ.C2OkZfHmk2Stof5MgYOB7DU4w8aRgJWfrtODEvvMPa7Ip4jV7G', '67878788889', 'auto', 'wrJouocIc45effzSWIQ0icMGhP12FKvzhPwdvA3aGfCvYmaulf', '2020-03-30 07:54:52', '2020-03-30 07:54:52'),
(25, 'cccc', NULL, NULL, '98999', 'abc@123.123.123.123', '$2y$10$NQDMuzzJPzOxMeX6zr/vA.KCmhLjHo5yyWUCuQSzi/sc/gbDKDxHC', '877676767677', 'auto', 'yoOOPzNUYmzjHnnK0dXpi53qswdavUkNNLEkbO1Srrn4yM6uV3', '2020-03-30 07:56:45', '2020-03-30 07:56:45'),
(26, 'dddd', NULL, NULL, '88989', '12345678@gmail.com', '$2y$10$Wvl5ayYAaukyYmurOedOOeF9UdhaKiKQBvEKr46zWY5./qMmoDx7K', '8787878878', 'auto', 'ukZug3GL2Rk5SSgPNHfMkiFYJf3PkHIvvCcHlTSLwOtAQHENlh', '2020-03-30 07:58:42', '2020-03-30 07:58:42'),
(27, 'eeee', NULL, NULL, '676787', 'email@gmail-one.com', '$2y$10$l.CWcqvJw55TQzNTEvLRVeaowtVGMJ1zyUFlbkIOmFbeBMZFSV1im', '8789898989', 'auto', 'totSSnJpkooaL3EFixETuKl5uPQzAhQS4qlHlMZuhz9xgkvLLi', '2020-03-30 08:00:34', '2020-03-30 08:00:34'),
(28, 'yyyy', NULL, NULL, '5456566', '---------------@gmail.com', '$2y$10$EEwPiGYEkcs9VSeoDMf5BuA.KjySN39y6L2dAWtXOPH0fbqx6slZW', '987787799677', 'auto', 'rSllDrBUl5UC4RzsarpcLpLWuwXU42gS7jmcb9TpSnkC62fpuT', '2020-03-30 08:02:04', '2020-03-30 08:02:04'),
(29, 'rrrr', NULL, NULL, '7787878', 'abc-cde@gmail.com', '$2y$10$Vtpp0RX9bc97WpNNWOlV.uvnDffEea3SEwRv4dxoMsNij/1dXFuZi', '78788787788888', 'auto', 'T62ekg8m2vAPFoxejewoJ7xySnAm1MK6ks1xwes6hjT3h0Pff2', '2020-03-30 08:04:02', '2020-03-30 08:04:02'),
(30, 'jjjj', NULL, NULL, '787878', 'email@domain.comhhjhj', '$2y$10$/7TQcQT7CWiFXzHkBxWnC.LWUOTcJoH8vDl6Ra2YTW1zagehtGvxm', '88989899989', 'auto', 'Oeluom2XQbxe4VyOK0G07XqUz4QW994aI2gDMfm6RD2T3VDLEG', '2020-03-30 08:07:39', '2020-03-30 08:07:39'),
(31, 'tttt', NULL, NULL, '888989', 'email@domain', '$2y$10$mUPC5jYDiRu40S4u3unznub26HeBX7AuHxdjYcFkoyv6qMNXTLt9W', '888989898989', 'auto', 'zK9etBdWLBPSTWXPXIxKCjBi9VeNYXtQKqtl57n1NxQcqtS9YR', '2020-03-30 08:10:17', '2020-03-30 08:10:17'),
(32, 'jjjjjj', NULL, NULL, '777878', 'archana@gmail', '$2y$10$LMz7OHVp7ctV2KuYoUNlM.2bXz9K02uWhoRmBV5SIrl/2k/r3pNrq', '8989898996767', 'auto', 'loXSAv6D8U3iLjUFt7WNpMSRGMx3OByn2sBVbDrnmp87SkwEWP', '2020-03-30 08:12:03', '2020-03-30 08:12:03'),
(33, 'lllll', NULL, NULL, '898989', 'arc@gmail.com', '$2y$10$/9N1hRlIjyWHvDLHjb0hDu1te8cdkD6BAP4BJVxn/XSWZmAN8exSy', '7676767777788', 'auto', 'ptcJ14BuKmHxaIhZYXvlqFvt8W5G3zeJHxvJMm69LXRklW2GOS', '2020-03-30 08:58:38', '2020-03-30 08:58:38'),
(34, 'ubinium', NULL, NULL, '88989', 'ab@gmail.com', '$2y$10$xEVaFR0T92MKjHAQsDhXx.YWoxG7lUj0n.of8aPwOaBZEqzsZxaN6', '98989898989', 'auto', 'MiHlcXP3cnze3j44HlPrLQfBkpBxTyomYEiLVGruI3vI8o0RAa', '2020-03-30 09:02:06', '2020-03-30 09:02:06'),
(35, 'hhhh', NULL, NULL, '88899', 'u@gmail.com', '$2y$10$0aA/vQsnxA9KvyebKzjqx.w.mBLvlGmRBOiqBszfARa3KqeGnfANq', '98989899999999', 'auto', 'yXY8aZAumGtaXVbgxkm1Qgun5n7sDSLKn7xlcW1nfV2wGWfSi0', '2020-03-30 09:09:34', '2020-03-30 09:09:34'),
(36, 'tuu', NULL, NULL, '99990', 'art@gmail.com', '$2y$10$6zD8qCasRG9X3by0Y/lL4O/0l9GjUd2MTUJZAs1cIALIKwDKrXGCG', '889898989899', 'auto', 'Uorj2r0rlb6sX5KRkUbze6wngUaAsWYkHe7IPsjDIeA3n0qgKA', '2020-03-30 09:44:33', '2020-03-30 09:44:33'),
(37, 'Aakash', 'Sirdhana', 'gd', '560066', 'aakashsirdhana@ongraph.com', '$2y$10$nmVxjxfZ/xCRxOW8kU//IeDoP0cMQfipsP/3gbKgIY6QwIMHvld6K', '1231231234', 'auto', '', '2020-03-31 10:06:34', '2020-03-31 10:06:34'),
(38, 'lakhvir', 'singh', 'Adatsoftsolutation', '144216', 'lakhvirsingh22@gmail.com', '$2y$10$qKwZqZItw0QBngzS8DZfQ.CHxBbvwdN4xr/SWjrFznTEYBVrHVX86', '98887773254', 'auto', '', '2020-04-01 20:43:14', '2020-04-01 20:43:14'),
(39, 'archanasmdnsdnksmkwsksjkqwnqiwjqwkqgwshjs', NULL, NULL, 'jsnjkswqwjkj', 'abc@gmail.com', '$2y$10$CDf/hQ8bX36/hmRFX0pBce9MJxdGNkH2iYfZR4CEt4qnmVDl0NhHO', '9887665578', 'auto', 'MnNbezNTqmCEkd65aK5aWOM4jXuoh7vVlWENDMwWpwvXB4qTgU', '2020-04-03 11:44:22', '2020-04-03 11:44:22'),
(40, 'dfdfdgfgfg', NULL, NULL, '344534', 'arch@gmail.com', '$2y$10$MdWNEwD02PPT2CvKR5IxYO3p1LLu.V89O0ZBFwK0NgUJOWZf5CncK', '87665432445', 'auto', 'ejbuB0L6zLN616lFrfCyjzdiqJPpqRvsz7QIwum3zKbcYDskpL', '2020-04-03 12:45:26', '2020-04-03 12:45:26'),
(41, 'Prminder', 'Kaur', 'Adatsoftsolutation', '144216', 'lakhvir.dhariwal@gmail.com', '$2y$10$2OAYWRWmm30bYcoDnkuNf.TeRuyJTZMTR1PpVDXDbPIIco/5dPoxC', '9877762616', 'auto', '', '2020-04-06 22:17:37', '2020-04-06 22:17:37'),
(42, 'Prminder', 'Kaur', 'Adatsoftsolutation', '144216', 'lakhbirsingh.iiil.in@gmail.com', '$2y$10$EnzTr9cAJEzsbE.01hZuGeUecMgEdZjXOxthNcGIUVjrTM1H2voKK', '8427129343', 'auto', 'RpZNjltFiPfCuzmTupXUwPIYWnUuDfv78F1bQL4TR4Dg1gEKHG', '2020-04-07 08:51:03', '2020-04-07 08:51:03'),
(43, 'aman', NULL, NULL, '160055', 'amangoyal470@gmail.com', '$2y$10$YVSE9EOyUim3MR7XsW5q4OEKpZAsORE/nzNhVD0qabBZXbQzI8R8y', '8968898989', 'auto', '', '2020-04-07 14:20:34', '2020-04-07 14:20:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_footer`
--
ALTER TABLE `cms_footer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_header`
--
ALTER TABLE `cms_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_menu`
--
ALTER TABLE `cms_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_footer`
--
ALTER TABLE `cms_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_header`
--
ALTER TABLE `cms_header`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_menu`
--
ALTER TABLE `cms_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
