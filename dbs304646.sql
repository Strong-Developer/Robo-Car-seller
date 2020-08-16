-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000312083.hosting-data.io
-- Generation Time: May 23, 2020 at 06:03 PM
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
  `negotiation_mode` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `seller_id`, `request_id`, `product_title`, `upc_product_code`, `make`, `model`, `condition`, `color`, `size`, `url`, `price`, `seller_original_quantity`, `category`, `special_deal_price`, `lowest_price`, `deal_expiry_date`, `product_description`, `negotiation_mode`, `created_at`, `updated_at`) VALUES
(245, 57, 1, '2019 Ford Edge Titanium', '2FMPK4K99KBB70365', 'Ford', 'Edge', '10000', '2019', 'Blue', 'https://www.caranddriver.com/ford/edge-2019', 50000, 25, 'Automobiles', 45000, 44000, '2020-05-31', 'Automatic\r\n50000/45000/44000/25', 'auto', '2020-05-10 00:04:35', '2020-05-10 00:04:35'),
(246, 57, 3, '2020 Ford Expedition', '1FMJU1JT3LEA02531', 'Ford', 'Expedition', '500', '2020', 'Red', 'https://www.caranddriver.com/ford/expedition-expedition-max', 45000, 25, 'Automobiles', 44000, 43500, '2020-12-31', 'Classic Mode .. Relay back and forth\r\n45000/40000', 'classic', '2020-05-10 03:06:31', '2020-05-10 03:06:31'),
(247, 57, 9, 'Acura Integra for Sale', 'JH4DB1670LS801802', 'Acura', 'Integra', '56000', '2015', 'White', NULL, 50000, 25, 'Automobiles', 45000, 44500, '2020-12-31', 'Automatic Mode\r\n50000/45000/44500', 'auto', '2020-05-11 02:04:38', '2020-05-11 02:04:38'),
(248, 57, 17, 'Ford Edge Titanium', '2FMPK4K95LBA24501', 'Ford', 'Edge Titanium', '400', '2020', 'Red', 'https://www.caranddriver.com/ford/edge-2019', 40000, 25, 'Automobiles', 39500, 39000, '2020-12-31', '25 cars\r\nList Price: $40000\r\nDiscounts - $1000+$500+100\r\nProfit Margin - Sell Price - $39500/$39000', 'auto', '2020-05-11 22:39:29', '2020-05-11 22:39:29'),
(249, 57, 19, 'Jeep Wrangler', '2J4FY59TXLJ552055', 'Jeep', 'Wrangler', '500', '2020', 'White', 'https://www.caranddriver.com/jeep/wrangler', 29850, 25, 'Automobiles', 28000, 27000, '2020-12-31', 'Classic\r\nListed Price: $29850\r\nQuantity: 25 \r\nSell Above  - $28000\r\nNegotiation Margin - 10%-25%', 'classic', '2020-05-11 23:01:32', '2020-05-11 23:01:32'),
(257, 57, 37, '2016 Lexus RX450H', '2T2ZFMCA2GC001437', 'Lexus', 'RX450H', '65000', '2016', 'White', NULL, 50000, 25, 'Automobiles', 45000, 44000, '2020-12-31', 'Lexus \r\nAutomatic/25/50000\r\n45000/44000', 'auto', '2020-05-13 02:26:18', '2020-05-13 02:26:18'),
(258, 57, 38, 'Instant Pot', 'instant_pot_wifi', 'Instant Pot', 'Smart WiFi', '6 Qt', 'Silver', 'New', NULL, 175, 25, 'Appliances', 160, 150, '2020-12-31', 'Automatic\r\n$175/$160/$150\r\n25', 'auto', '2020-05-13 02:30:24', '2020-05-13 02:30:24'),
(279, 61, 0, 'Acura RDX', '5J8TB4H56DL803805', 'Acura', 'EDX', '199', '2013', '', '', 47000, 12, 'Automobiles', 46500, 45000, '2020-12-12', '', 'auto', '2020-05-15 00:51:31', '2020-05-15 00:51:31'),
(280, 61, 0, '2004 Jeep Grand Cherokee', '1JCBS7820G0015186', 'Jeep', 'Grand', '1222', '', '', '', 30000, 3, 'Automobiles', 29000, 28500, '2020-12-12', '', 'auto', '2020-05-15 00:51:32', '2020-05-15 00:51:32'),
(281, 61, 0, '2002 Lexus LX 470', 'JTJHT00W123662764', 'Lexus', 'LX', '222', '', '', '', 44000, 5, 'Automobiles', 43500, 43000, '2020-12-12', '', 'auto', '2020-05-15 00:51:32', '2020-05-15 00:51:32'),
(282, 57, 73, 'Camping Tent', 'IK-581627', 'Tent', 'Camping Site', 'Self Setup', 'New', 'Screen', 'http://integrate.robonegotiator.com/product.html', 499, 10, 'Miscellaneous', 450, 425, '2020-12-12', 'For demo purpose', 'auto', '2020-05-16 23:22:45', '2020-05-16 23:22:45'),
(283, 57, 80, 'BMW 328i for Sale', '2012_BMW_White', 'BMW', '328i', '65000', '2012', 'White', NULL, 33000, 25, 'Automobiles', 25000, 24000, '2020-12-31', 'BMW', 'auto', '2020-05-18 23:48:52', '2020-05-18 23:48:52'),
(284, 57, 86, 'Ford Edge - Amazing Car', 'WBADE6322VBW51982', 'Ford', 'Edge', '30000', '2019', 'Silver', NULL, 35000, 10, 'Automobiles', 33000, 32000, '2020-12-31', 'Amazing car for sale\r\n1 owner\r\n....', 'auto', '2020-05-20 23:31:31', '2020-05-20 23:31:31'),
(285, 57, 87, 'Ford Expedition Red', 'ford_expedition_red', 'Ford', 'Expedition', '10000', '2019', 'Red', NULL, 45000, 5, 'Automobiles', 40000, 39000, '2020-12-12', 'Classic mode -- seller wants to negotiate himself/herself', 'classic', '2020-05-20 23:39:37', '2020-05-20 23:39:37');

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
(330, 245, '2FMPK4K99KBB70365', '1589054675Ford-Edge1.jpg/Dob7fo9iNecS44KyeJWHdDcdgegzO8LIRxMMm9Lt.jpeg', '2020-05-10 00:04:35', '2020-05-10 00:04:35'),
(331, 245, '2FMPK4K99KBB70365', '1589054675Ford-Edge2.jpg/dyYbjRBzLayDWD0xI1LeQl95nxdi5UuxK80GZpVc.jpeg', '2020-05-10 00:04:35', '2020-05-10 00:04:35'),
(332, 245, '2FMPK4K99KBB70365', '1589054675Ford-Edge3.jpg/zd2b1bFEgYE7DLgaVdXG5Yk7xhwhmmQXRO7L5nAa.jpeg', '2020-05-10 00:04:35', '2020-05-10 00:04:35'),
(333, 246, '1FMJU1JT3LEA02531', '1589065591Expedition1.jpg/fujCZFZhW7Oy0XLov1whBkIRJMurRzbZQZieVtAe.jpeg', '2020-05-10 03:06:31', '2020-05-10 03:06:31'),
(334, 246, '1FMJU1JT3LEA02531', '1589065591Expedition3.jpg/dj4DHNnqQq2mpZ8CMu4pBR40cbSRUCrMSU7bsc1p.jpeg', '2020-05-10 03:06:31', '2020-05-10 03:06:31'),
(335, 247, 'JH4DB1670LS801802', '1589148279AcuraIntegra1.jpg/KFQMRBi3hhBLD7MRMilrymlQakckEw68WAkvAUgs.jpeg', '2020-05-11 02:04:39', '2020-05-11 02:04:39'),
(336, 247, 'JH4DB1670LS801802', '1589148279AcuraIntegra2.jpg/v2NBiV974Yspq0hmdXxnLeaG0Ob40aoOEYIOVpNe.jpeg', '2020-05-11 02:04:39', '2020-05-11 02:04:39'),
(337, 248, '2FMPK4K95LBA24501', '1589222370Ford-Edge-Titanium1.jpg/yLCSSXexeYiQCJMVhxth6S0PU1aEHwXN2Ej8EE8s.jpeg', '2020-05-11 22:39:30', '2020-05-11 22:39:30'),
(338, 248, '2FMPK4K95LBA24501', '1589222370Ford-Edge-Titanium2.jpg/zET0zGTJvFJQzEScDVFToHGEeK2otLIb3zCSXSnh.jpeg', '2020-05-11 22:39:30', '2020-05-11 22:39:30'),
(339, 248, '2FMPK4K95LBA24501', '1589222370Ford-Edge-Titanium3.jpg/UaqGrb6WBveXtElTv0FWyJGr0OzxWtxpGhhPviVu.jpeg', '2020-05-11 22:39:30', '2020-05-11 22:39:30'),
(340, 249, '2J4FY59TXLJ552055', '1589223692Jeep1.jpg/ker3JJIdBoFsu6GBlq8hSI8neZHvS3ixXVTkGX9e.jpeg', '2020-05-11 23:01:32', '2020-05-11 23:01:32'),
(341, 249, '2J4FY59TXLJ552055', '1589223692Jeep2.jpg/13DxSMyyKML2yUe6J4bMQU6XIVswLZwwWGAePQrS.jpeg', '2020-05-11 23:01:32', '2020-05-11 23:01:32'),
(342, 249, '2J4FY59TXLJ552055', '1589223692Jeep3.jpg/ZsYe8x5qVHmGboWYrYNCDSuwNz05wQrWH7XLLq8U.jpeg', '2020-05-11 23:01:32', '2020-05-11 23:01:32'),
(354, 257, '2T2ZFMCA2GC001437', '1589322378RX450H-1.jpg/s7BAzHMnOoB9Vs3dW4PyRk0QyLFZ6xwp3JqgKuGH.jpeg', '2020-05-13 02:26:18', '2020-05-13 02:26:18'),
(355, 257, '2T2ZFMCA2GC001437', '1589322378RX450H-2.jpg/vYjUUeBl40mdOMYLSPT8IW87Vg8hJDXa6I0BKQqy.jpeg', '2020-05-13 02:26:18', '2020-05-13 02:26:18'),
(356, 257, '2T2ZFMCA2GC001437', '1589322378RX450H-3.jpg/3UzpHE3FnFLWZ5bOfhdNh1guVwfNJTTdDzOtR5zH.jpeg', '2020-05-13 02:26:18', '2020-05-13 02:26:18'),
(357, 257, '2T2ZFMCA2GC001437', '1589322378RX450H-4.jpg/R1AWzThjRQOGPy7V2t2GVFj6p2GTHubhN385ldWk.jpeg', '2020-05-13 02:26:18', '2020-05-13 02:26:18'),
(358, 258, 'instant_pot_wifi', '1589322624smart-wifi-1-705x705.jpg/txd4B2uG9jJ6cWj0Y5aRoyjeDziRu4SZRAzO299L.jpeg', '2020-05-13 02:30:24', '2020-05-13 02:30:24'),
(359, 258, 'instant_pot_wifi', '1589322624Smart-Wifi-Badge-705x705.jpg/EK2ZGIqtbP1h3QQJ9W5pPtY8mF0EqZV0ZXt91L6Y.jpeg', '2020-05-13 02:30:24', '2020-05-13 02:30:24'),
(360, 258, 'instant_pot_wifi', '1589322624Smart-Wifi-Facia-705x705.jpg/TqhYosmyI12LOUik0gtXqneZ4ofAJzH8xvnGOod9.jpeg', '2020-05-13 02:30:24', '2020-05-13 02:30:24'),
(361, 258, 'instant_pot_wifi', '1589322624Smart-Wifi-Lifestyle-2-705x705.jpg/LWHFgRv1ByfQYdvfNDrlRwdyTsEbuwtDE696gn4H.jpeg', '2020-05-13 02:30:24', '2020-05-13 02:30:24'),
(382, 279, '5J8TB4H56DL803805', 'https://images.hgmsites.net/med/2009-volvo-s40-2-4l_100181579_m.jpg', '2020-05-15 00:51:31', '2020-05-15 00:51:31'),
(383, 280, '1JCBS7820G0015186', 'https://invimg.autofunds.net/InventoryImages/2017/09/28/177_592646_4309881_8404128402017.jpg', '2020-05-15 00:51:32', '2020-05-15 00:51:32'),
(384, 281, 'JTJHT00W123662764', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2020-lexus-lx570-mmp-1-1575565861.jpg', '2020-05-15 00:51:32', '2020-05-15 00:51:32'),
(385, 282, 'IK-581627', '1589656965carousel001.png/lonvP55H1NtvumRXcavm9vBHSVjJNzUQb58CNeVz.png', '2020-05-16 23:22:45', '2020-05-16 23:22:45'),
(386, 283, '2012_BMW_White', '1589831332BMW328i.jpg/d96vDBpyMiMRK8vXfWleLOe0VdUEw52e4nkho9BD.jpeg', '2020-05-18 23:48:53', '2020-05-18 23:48:53'),
(387, 284, 'WBADE6322VBW51982', '15900030922019-ford-edge-1388386180.jpg/DgjmUvDu5MatFMObghRga4lrKzkCzTQT8drIi728.jpeg', '2020-05-20 23:31:32', '2020-05-20 23:31:32'),
(388, 284, 'WBADE6322VBW51982', '15900030922019-ford-edge-1388386181.jpg/MmCxSXQAvYyMGMrSMY1jL6na3r4NhSpRpG0WW82c.jpeg', '2020-05-20 23:31:32', '2020-05-20 23:31:32'),
(389, 284, 'WBADE6322VBW51982', '15900030932019-ford-edge-1388386182.jpg/omKNCljyPM948DzN6W922zGWmorvXJoBeGUacsR8.jpeg', '2020-05-20 23:31:33', '2020-05-20 23:31:33'),
(390, 284, 'WBADE6322VBW51982', '15900030932019-ford-edge-1388386183.jpg/cyl0by3sNVD43iXgqI5Wgc4hBB0M2q1BYCoXu21n.jpeg', '2020-05-20 23:31:33', '2020-05-20 23:31:33'),
(391, 285, 'ford_expedition_red', '1590003577Expedition1.jpg/Cenrvyx4v7IjiVCLJdUj4QgkPkHua5sQ0wulSiKH.jpeg', '2020-05-20 23:39:37', '2020-05-20 23:39:37');

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
(57, 'seller', 'shah', 'RoboNegotiator', '91362', 'seller@robonegotiator.com', '$2y$10$6m0ehFZy1r6XTq9PMAY2N.Zx8HMqvcovF0tnjgfkyYkLm/vSMW2mu', '3108894304', 'auto', 'Rqy5XJnjxZz3sfxTSAIL17gLQsdkYvG2MTU6qFSLZoUy0syy2W', '2020-05-09 23:55:44', '2020-05-09 23:55:44'),
(58, 'raji', 'nanni', NULL, '600061', 'rajarajeshwari.zerosoft@gmail.com', '$2y$10$q34v52Lv3PqBQYaPUJf4AOokEVq60MjMeoVQboRpjmWuW/RVgWt4S', '7686768345', 'auto', '', '2020-05-11 07:27:18', '2020-05-11 07:27:18'),
(60, 'Bala', 'Gunasingh', NULL, '628003', 'balagunasingh.zerosoft@gmail.com', '$2y$10$GK/ndJ37Oj/gX82ih.b5POFfT.CymV7yKXseRStysnFl7L6DE0lym', '9874563110', 'auto', 'xze6uCJXs0CAfkPqrJMI1IDddvqDwykUU11XOwc0EJrXti0aYo', '2020-05-13 11:59:28', '2020-05-13 11:59:28'),
(61, 'Khan', 'Sab', 'Khan', '2345', 'sardar@mailinator.com', '$2y$10$eP4Y84.TJqaWJZY.y48PNuuaFIyQSoxn59RQa2Z1HWvRYhRDBbTjy', '2014623175', 'auto', '0pNWu895xkn16SxX5gKeS9588OM6vzI7pxj2Jo9fHAIiXBaaFO', '2020-05-15 00:39:48', '2020-05-15 00:39:48'),
(62, 'Zain', 'Ul Abidin', 'Roam', '44000', 'zaiiin381@gmail.com', '$2y$10$d6S39nilZrQogWycEAwyGuAf6ccvp/qLtwh35jMtSStV4PPSFaFPK', '+923115359081', 'auto', '', '2020-05-18 10:56:24', '2020-05-18 10:56:24');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=392;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
