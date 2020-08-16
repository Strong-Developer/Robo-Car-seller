-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: db5000457389.hosting-data.io
-- Generation Time: May 23, 2020 at 05:58 PM
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
-- Database: `dbs437988`
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
(215, 52, 1, 'Acura Integra', 'JH4DB1670LS801802', 'Acura', 'Integra', '3000', '2013', 'White', NULL, 50000, 25, 'Automobiles', 45000, 44500, '2020-12-31', 'Automated/25\r\n$50000/$45000/$44500', 'auto', '2020-05-16 07:30:41', '2020-05-16 07:30:41'),
(216, 53, 0, 'Laptop', 'DPS_Laptop_001', 'Dell', 'Latitude', '7400', '14\"', 'New', ' https://static.bhphoto.com/images/images500x500/dell_4hvjn_latitude_7400_i5_8365u_8gb_1559136193_1479977.jpg', 1499, 10, 'Electronics', 1400, 1350, '2020-12-11', '', 'auto', '2020-05-16 18:57:46', '2020-05-16 18:57:46'),
(217, 54, 5, 'BMW X5 2012 Series', '5UXZW0C55CL672697', 'BMW', 'X5', '100', '2012', 'Black', NULL, 50000, 25, 'Automobiles', 45000, 44000, '2020-12-31', 'Automobile\r\nBMW X5 2012 Series\r\n$50000/$45000/$44000/25', 'auto', '2020-05-18 22:48:48', '2020-05-18 22:48:48'),
(218, 54, 13, '2008 Ford F-150', '1FTRW14W78KA88345', 'Ford', 'Expedition', '100', '2003', 'White', NULL, 30000, 25, 'Automobiles', 27000, 25000, '2020-05-31', 'Automobile\r\n2008 Ford F-150\r\n$30000/$25000/25', 'classic', '2020-05-19 00:00:03', '2020-05-19 00:00:03'),
(219, 54, 0, 'Acura RDX', '5J8TB4H56DL803805', 'Acura', 'EDX', '199', '2013', '', '', 47000, 12, 'Automobiles', 46500, 45000, '2020-12-12', '', 'auto', '2020-05-19 00:26:09', '2020-05-19 00:26:09'),
(220, 54, 0, '2004 Jeep Grand Cherokee', '1JCBS7820G0015186', 'Jeep', 'Grand', '1222', '', '', '', 30000, 3, 'Automobiles', 29000, 28500, '2020-12-12', '', 'auto', '2020-05-19 00:26:10', '2020-05-19 00:26:10'),
(221, 54, 0, '2002 Lexus LX 470', 'JTJHT00W123662764', 'Lexus', 'LX', '222', '', '', '', 44000, 5, 'Automobiles', 43500, 43000, '2020-12-12', '', 'auto', '2020-05-19 00:26:11', '2020-05-19 00:26:11'),
(222, 54, 23, 'Panasonic MJ-M176P 3-in-1 Juicer/Blender/Grinder Machine', 'MJM176P3', 'Panasoic', 'MJ', 'Large', 'White', 'New', NULL, 499, 100, 'Appliances', 450, 400, '2020-07-16', 'Appliances\r\nPanasonic MJ-M176P 3-in-1 Juicer/Blender/Grinder Machine\r\n$499/$440/$400/100', 'auto', '2020-05-19 00:39:32', '2020-05-19 00:39:32'),
(223, 54, 24, 'Stainless steel Juicers', 'Stainless', 'Stainless steel', 'Juicers', '14 inch', 'black', 'New', NULL, 499, 100, 'Appliances', 450, 400, '2020-05-30', 'Stainless steel Juicers', 'auto', '2020-05-19 00:51:03', '2020-05-19 00:51:03'),
(224, 52, 25, 'Lexus RX450H', '2T2ZFMCA2GC001437', 'Lexus', 'RX450H', '50000', '2016', 'White', NULL, 50000, 25, 'Automobiles', 45000, 44000, '2020-12-31', '50000/45000/44000/25', 'auto', '2020-05-19 03:43:19', '2020-05-19 03:43:19'),
(225, 54, 28, 'Microwave Ovens XME', 'XME250L', 'Xpert', 'XME', '12 inch', 'White', 'New', NULL, 499, 100, 'Appliances', 450, 400, '2020-05-31', 'Appliances\r\nMicrowave Ovens XME\r\n$499/$450/$400/100', 'auto', '2020-05-19 13:25:48', '2020-05-19 13:25:48'),
(226, 52, 34, 'carousel', 'carousel_classic', 'Cabelas', 'Screen Saver', 'Outdoor', 'New', '8 people', NULL, 600, 12, 'Miscellaneous', 550, 500, '2020-12-12', 'classic $600', 'classic', '2020-05-21 23:35:31', '2020-05-21 23:35:31');

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
(282, 209, '456556ashwini', '1587657524macos-sierra-homescreen-100724980-large.jpg/lsd04Kcd39t3UHANO72OikbyodJBDeE1txzGr08c.jpeg', '2020-04-23 10:28:44', '2020-04-23 10:28:44'),
(283, 210, 'VIN6776', '1587834022Screen Shot 2563-04-25 at 10.15.12 PM.png/Kt9IZPXMezCKk8ztiRQWQkrhFvrG6IlHbf2Vt8Lj.png', '2020-04-25 11:30:22', '2020-04-25 11:30:22'),
(290, 215, 'JH4DB1670LS801802', '1589599841AcuraIntegra1.jpg/N0KfaJrv16m4HNlrsUvHBCiA13eQU8DvMUTrOXif.jpeg', '2020-05-16 07:30:41', '2020-05-16 07:30:41'),
(291, 215, 'JH4DB1670LS801802', '1589599841AcuraIntegra2.jpg/DQFQhCKg8Du0kSS4ihRFFSLLpGw0VQyeNwuJ7s1Y.jpeg', '2020-05-16 07:30:41', '2020-05-16 07:30:41'),
(292, 216, 'DPS_Laptop_001', ' https://static.bhphoto.com/images/images500x500/dell_4hvjn_latitude_7400_i5_8365u_8gb_1559136193_1479977.jpg', '2020-05-16 18:57:46', '2020-05-16 18:57:46'),
(293, 217, '5UXZW0C55CL672697', '1589827728BMW X5 2012 Series 2.jpg/vYlKdxo3QR5w4OJ3IAcOODY8zzlyu5u18nTVrt3T.jpeg', '2020-05-18 22:48:48', '2020-05-18 22:48:48'),
(294, 217, '5UXZW0C55CL672697', '1589827728BMW X5 2012 Series1.jpg/M0VJ18W4Jh8cLXbf2GFMYMb82ECcj55pqRx7SFqz.jpeg', '2020-05-18 22:48:48', '2020-05-18 22:48:48'),
(295, 218, '1FTRW14W78KA88345', '1589832003maxresdefault.jpg/IwVKD5PhyEDmcySYsEQEiXDAjVf0PWHuTTOnFgKh.jpeg', '2020-05-19 00:00:03', '2020-05-19 00:00:03'),
(296, 219, '5J8TB4H56DL803805', 'https://images.hgmsites.net/med/2009-volvo-s40-2-4l_100181579_m.jpg', '2020-05-19 00:26:09', '2020-05-19 00:26:09'),
(297, 220, '1JCBS7820G0015186', 'https://invimg.autofunds.net/InventoryImages/2017/09/28/177_592646_4309881_8404128402017.jpg', '2020-05-19 00:26:10', '2020-05-19 00:26:10'),
(298, 221, 'JTJHT00W123662764', 'https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/2020-lexus-lx570-mmp-1-1575565861.jpg', '2020-05-19 00:26:11', '2020-05-19 00:26:11'),
(299, 222, 'MJM176P3', '158983437294bff41b66fd2b0dba88e360217c9756.jpg/Cz5Uh2ubWOonkm1zABGh1oI5L3l24rekpGAfWTWq.jpeg', '2020-05-19 00:39:32', '2020-05-19 00:39:32'),
(300, 223, 'Stainless', '1589835063IMG_1301-scaled.jpg/aWkpm4jYa2tMTUTjt694UZ6RimlAR41noEsWum1c.jpeg', '2020-05-19 00:51:03', '2020-05-19 00:51:03'),
(301, 224, '2T2ZFMCA2GC001437', '1589845399RX450H-1.jpg/bD6LUFIAQvABFuSO4rzy5eoAxRhF2nnoHODytRjq.jpeg', '2020-05-19 03:43:20', '2020-05-19 03:43:20'),
(302, 224, '2T2ZFMCA2GC001437', '1589845400RX450H-2.jpg/iXUbUTiMJl8Yyi1oC2qY5VWPo8RcpiiyV3zNW3kB.jpeg', '2020-05-19 03:43:20', '2020-05-19 03:43:20'),
(303, 224, '2T2ZFMCA2GC001437', '1589845400RX450H-3.jpg/K5M6VYS7syuzUin5YSpEIFFqW89MSOx3LfBmvxJT.jpeg', '2020-05-19 03:43:20', '2020-05-19 03:43:20'),
(304, 224, '2T2ZFMCA2GC001437', '1589845400RX450H-4.jpg/9jt5CJPjAhxwfxrEYnfmsBJNT7b0UI1Ccy0pUqM8.jpeg', '2020-05-19 03:43:20', '2020-05-19 03:43:20'),
(305, 225, 'XME250L', '1589880348Xpert-Kitchen-Appliances-Built-In-Microwave-Ovens-XME-25L.jpg/HYPgukcqavR4QhjBZa2y7QujUXdEmeZPBemdFBia.jpeg', '2020-05-19 13:25:48', '2020-05-19 13:25:48'),
(306, 226, 'carousel_classic', '1590089731carousel001.png/zmMPUB90RZJVehNFXdIFnGXtJSBG2snwVjDJtZi0.png', '2020-05-21 23:35:31', '2020-05-21 23:35:31');

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
(51, 'indi', 'seller', 'Test', '201001', 'indiseller23@mailinator.com', '$2y$10$7jmPrce8TH80TsFPj2GOMO1yVABSPBV2c6h7F1EVxVdtVRKVOqCKi', '8786756546', 'auto', 'BNRlMO8kq9Crdr8cdMuXhISKMW1loSW8mtlBnx9b67MK4c5vO8', '2020-05-16 07:11:54', '2020-05-16 07:11:54'),
(52, 'seller', 'shah', 'RoboNegotiator', '91362', 'seller@robonegotiator.com', '$2y$10$wWeWC5sG5E1pxBs2f.PYyOQt5I7LfbejCqByWLmf2LqNG8fitd.4S', '8053656693', 'auto', '8yPUHaPUBBNzL20XK3xYEF0y4SCvXcBOjlV2ReyAY88CaR6R66', '2020-05-16 07:28:52', '2020-05-16 07:28:52'),
(53, 'sandbox', 'seller', NULL, '201001', 'sandboxseller@mailinator.com', '$2y$10$Ymf/EXqlbE1VEONF/.hNUuEcLMyKMAFe8NESWpilaPOWOFLP7nNs6', '6758767876', 'auto', '', '2020-05-16 18:37:17', '2020-05-16 18:37:17'),
(54, 'Moin', 'Akhtar', 'Khan', '12304', 'moin@mailinator.com', '$2y$10$7jmPrce8TH80TsFPj2GOMO1yVABSPBV2c6h7F1EVxVdtVRKVOqCKi', '2014623422', 'auto', 'pxT7nTbwdNmxdc2XKBkf2h77kqFQkpZx9IboOhy4EFfg5iiK8p', '2020-05-18 22:38:11', '2020-05-18 22:38:11');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=307;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
