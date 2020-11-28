-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Nov 28, 2020 at 04:22 AM
-- Server version: 10.1.44-MariaDB-1~bionic
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `simplecishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
                              `category_id` int(11) UNSIGNED NOT NULL,
                              `parent_category_id` int(11) UNSIGNED DEFAULT NULL,
                              `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(1, NULL, 'all');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(2, 1, 'cooling');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(3, 1, 'clean');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(4, 1, 'quiet');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(5, 1, 'cpu');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(6, 1, 'hard_disk');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(7, 1, 'system');
INSERT INTO `categories` (`category_id`, `parent_category_id`, `slug`) VALUES(8, 1, 'discounts');

-- --------------------------------------------------------

--
-- Table structure for table `category_texts`
--

DROP TABLE IF EXISTS `category_texts`;
CREATE TABLE `category_texts` (
                                  `category_text_id` int(11) UNSIGNED NOT NULL,
                                  `category_id` int(11) UNSIGNED NOT NULL,
                                  `language` varchar(20) NOT NULL,
                                  `name` varchar(50) NOT NULL,
                                  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_texts`
--

INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(1, 2, 'greek', 'Δροσιστικό', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(2, 2, 'german', 'Kühl', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(3, 2, 'english', 'Cooling', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(4, 3, 'greek', 'Καθαρό', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(5, 3, 'german', 'Sauber', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(6, 3, 'english', 'Clean', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(7, 4, 'greek', 'Ήσυχο', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(8, 4, 'german', 'Ruhig', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(9, 4, 'english', 'Quiet', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(10, 5, 'greek', 'Για Επεξεργαστή', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(11, 5, 'german', 'Für CPU', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(12, 5, 'english', 'For CPU', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(13, 6, 'greek', 'Για Σκληρό Δίσκο', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(14, 6, 'german', 'Für HDD', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(15, 6, 'english', 'For HDD', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(16, 7, 'greek', 'Για το Κουτί', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(17, 7, 'german', 'Für das Gehäuse', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(18, 7, 'english', 'For the Chassis', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(19, 8, 'greek', '*Προσφορές*', 'Οι Προσφορές είναι προσωρινές και ανανεώνονται συνεχώς. Μείνετε συντονισμένοι !');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(20, 8, 'german', '*Angebote*', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(21, 8, 'english', '*Discounts*', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(22, 1, 'english', 'All', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(23, 1, 'greek', 'Όλα', '');
INSERT INTO `category_texts` (`category_text_id`, `category_id`, `language`, `name`, `description`) VALUES(24, 1, 'german', 'Alle', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_migrations`
--

DROP TABLE IF EXISTS `ci_migrations`;
CREATE TABLE `ci_migrations` (
                                 `module` varchar(100) DEFAULT NULL,
                                 `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_migrations`
--

INSERT INTO `ci_migrations` (`module`, `version`) VALUES(NULL, 0);
INSERT INTO `ci_migrations` (`module`, `version`) VALUES('ci_system', 20190227203700);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
                           `coupon_id` int(11) UNSIGNED NOT NULL,
                           `coupon_number` varchar(100) DEFAULT NULL,
                           `used` int(1) NOT NULL DEFAULT '0',
                           `type` int(1) NOT NULL DEFAULT '0',
                           `discount` int(5) NOT NULL DEFAULT '0',
                           `expires` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
                        `news_id` int(11) UNSIGNED NOT NULL,
                        `published` int(10) DEFAULT NULL,
                        `updated` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `news_texts`
--

DROP TABLE IF EXISTS `news_texts`;
CREATE TABLE `news_texts` (
                              `news_text_id` int(11) UNSIGNED NOT NULL,
                              `news_id` int(11) UNSIGNED NOT NULL,
                              `language` varchar(20) NOT NULL,
                              `title` varchar(50) NOT NULL,
                              `body` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
                          `order_id` int(11) UNSIGNED NOT NULL,
                          `user_id` int(11) UNSIGNED NOT NULL,
                          `created` int(10) DEFAULT NULL,
                          `status` int(11) DEFAULT NULL,
                          `shipment_express` int(1) NOT NULL DEFAULT '0',
                          `shipment_to_door` int(1) NOT NULL DEFAULT '0',
                          `shipment_cash_on_delivery` int(1) NOT NULL DEFAULT '0',
                          `price` decimal(11,2) DEFAULT NULL,
                          `coupon_id` int(11) UNSIGNED DEFAULT NULL,
                          `questionnaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `created`, `status`, `shipment_express`, `shipment_to_door`, `shipment_cash_on_delivery`, `price`, `coupon_id`, `questionnaire`) VALUES(1, 1, 1181491136, 1, 0, 0, 1, '14.00', NULL, 'Σχόλια<br />\nΑπο που μας βρήκες<br />\n<br />\n');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
CREATE TABLE `order_products` (
                                  `relation_id` int(11) UNSIGNED NOT NULL,
                                  `order_id` int(11) UNSIGNED NOT NULL,
                                  `product_id` int(11) UNSIGNED NOT NULL,
                                  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`relation_id`, `order_id`, `product_id`, `quantity`) VALUES(1, 1, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
                            `product_id` int(11) UNSIGNED NOT NULL,
                            `slug` varchar(100) NOT NULL,
                            `stock` int(11) NOT NULL,
                            `published` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(2, 'intel-cpu-cooler-lga775', 3, 1177401770);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(3, 'real-silent-case-fan-80mm', 1, 1177403210);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(4, 'real-silent-case-fan-92mm', 1, 1177404749);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(5, 'real-silent-case-fan-120mm-orange', 1, 1177405042);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(6, 'real-silent-case-fan-120mm-black-white', 1, 1177405149);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(7, 'frizzbee-inaudible-hdd-cooler', 4, 1177406104);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(8, 'memory-heatspreader-nickel', 1, 1177427455);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(9, 'memory-heatspreader-blue', 5, 1177428448);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(10, 'memory-heatspreader-copper', 1, 1177428593);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(12, 'real-soft-silicon-fan-mounts', 1, 1177429648);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(13, 'thermal-compound', 1, 1177430035);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(14, 'disktwin-stop-hdd-vibration-aluminium', 1, 1177440076);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(15, 'disktwin-stop-hdd-vibration-black', 1, 1177440197);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(16, 'ultimate-noise-absorption-material', 6, 1177492585);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(17, 'anti-vibration-mounting-kit', 3, 1177496191);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(18, 'summer-offer-cool', 2, 1182421239);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(19, 'summer-offer-cool-2', 22, 1182498274);
INSERT INTO `products` (`product_id`, `slug`, `stock`, `published`) VALUES(20, 'summer-offer-quiet', 8, 1182502595);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
                                      `relation_id` int(11) UNSIGNED NOT NULL,
                                      `product_id` int(11) UNSIGNED NOT NULL,
                                      `category_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(235, 2, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(236, 2, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(237, 2, 5);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(187, 3, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(188, 3, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(189, 3, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(193, 4, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(194, 4, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(195, 4, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(196, 5, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(197, 5, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(198, 5, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(199, 6, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(200, 6, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(201, 6, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(225, 7, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(226, 7, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(227, 7, 6);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(207, 8, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(206, 9, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(208, 10, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(211, 12, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(212, 12, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(165, 13, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(166, 13, 5);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(216, 14, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(217, 14, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(218, 14, 6);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(213, 15, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(214, 15, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(215, 15, 6);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(228, 16, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(229, 16, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(221, 17, 4);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(222, 17, 5);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(223, 17, 6);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(224, 17, 7);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(186, 18, 8);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(240, 19, 8);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(238, 20, 2);
INSERT INTO `product_categories` (`relation_id`, `product_id`, `category_id`) VALUES(239, 20, 8);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
                                  `product_image_id` int(11) UNSIGNED NOT NULL,
                                  `product_id` int(11) UNSIGNED NOT NULL,
                                  `title` varchar(50) DEFAULT NULL,
                                  `thumb` varchar(250) DEFAULT NULL,
                                  `big` varchar(250) DEFAULT NULL,
                                  `main` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(6, 2, 'pht7750_c', 'images/11774017701_thumb.gif', 'images/11774017701.gif', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(7, 2, 'pht7750_a', 'images/11774017702_thumb.gif', 'images/11774017702.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(8, 2, 'pht7750_b', 'images/11774017713_thumb.gif', 'images/11774017713.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(9, 2, 'pht7750_top2', 'images/11774017714_thumb.gif', 'images/11774017714.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(10, 2, 'pht7750_illustration', 'images/11774017715_thumb.jpg', 'images/11774017715.jpg', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(11, 3, 'Nexus-80mmcasefan', 'images/11774032111_thumb.gif', 'images/11774032111.gif', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(12, 3, '80mm_casefan_connectors', 'images/11774032112_thumb.gif', 'images/11774032112.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(13, 4, 'Nexus-92mmcasefan', 'images/11774047491_thumb.jpg', 'images/11774047491.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(14, 4, '80mm_casefan_connectors', 'images/11774047502_thumb.gif', 'images/11774047502.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(15, 5, 'Nexus-120mmcasefanORANGE', 'images/11774050421_thumb.jpg', 'images/11774050421.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(16, 5, '80mm_casefan_connectors', 'images/11774050432_thumb.gif', 'images/11774050432.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(17, 6, 'Nexus-120mmcasefanBlackANDW', 'images/11774051491_thumb.jpg', 'images/11774051491.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(18, 6, '80mm_casefan_connectors', 'images/11774051502_thumb.gif', 'images/11774051502.gif', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(19, 7, 'frizzbee', 'images/11774061041_thumb.jpg', 'images/11774061041.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(20, 7, 'Frizzbee_Pack', 'images/11774061052_thumb.jpg', 'images/11774061052.jpg', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(21, 8, 'Nexus-heatspreader-CU-nicke', 'images/11774274561_thumb.jpg', 'images/11774274561.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(22, 9, 'Nexus-heatspreader-alublue', 'images/11774284481_thumb.jpg', 'images/11774284481.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(23, 10, 'Nexus-heatspreader-CU', 'images/11774285941_thumb.jpg', 'images/11774285941.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(25, 12, 'sfm1000_topimage', 'images/11774296491_thumb.jpg', 'images/11774296491.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(26, 12, 'sfm_installation', 'images/11774296492_thumb.jpg', 'images/11774296492.jpg', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(27, 13, 'thermal_compound', 'images/11774300351_thumb.jpg', 'images/11774300351.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(28, 14, 'Nexus-DiskTwin-Alu', 'images/11774400761_thumb.jpg', 'images/11774400761.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(29, 14, 'disktwin2', 'images/11774400772_thumb.jpg', 'images/11774400772.jpg', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(30, 15, 'Nexus-DiskTwin-Black', 'images/11774401971_thumb.jpg', 'images/11774401971.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(31, 15, 'disktwin2', 'images/11774401982_thumb.jpg', 'images/11774401982.jpg', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(32, 16, 'damptek_mats', 'images/11774925861_thumb.jpg', 'images/11774925861.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(33, 16, 'damptek_graph', 'images/11774925862_thumb.jpg', 'images/11774925862.jpg', 0);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(34, 17, 'Nexus-mountingkit', 'images/11775768271_thumb.jpg', 'images/11775768271.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(37, 18, 'summer_offer_cool1', 'images/11824216741_thumb.jpg', 'images/11824216741.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(38, 19, 'summer_offer_cool2', 'images/11824982751_thumb.jpg', 'images/11824982751.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(39, 20, 'summer_offer_quiet', 'images/11825025951_thumb.jpg', 'images/11825025951.jpg', 1);
INSERT INTO `product_images` (`product_image_id`, `product_id`, `title`, `thumb`, `big`, `main`) VALUES(48, 20, 'foo', 'images/15887693851_thumb.jpg', 'images/15887693851.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_meta`
--

DROP TABLE IF EXISTS `product_meta`;
CREATE TABLE `product_meta` (
                                `meta_id` int(11) UNSIGNED NOT NULL,
                                `product_id` int(11) UNSIGNED NOT NULL,
                                `meta_key` varchar(255) NOT NULL,
                                `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_meta`
--

INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(178, 17, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(179, 16, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(180, 15, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(181, 15, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(182, 14, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(183, 14, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(184, 13, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(185, 12, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(186, 10, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(188, 8, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(189, 7, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(190, 7, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(191, 5, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(192, 5, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(193, 4, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(194, 4, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(195, 3, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(196, 3, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(197, 2, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(198, 2, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(199, 20, 'cooling', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(200, 20, 'quiet', '1');
INSERT INTO `product_meta` (`meta_id`, `product_id`, `meta_key`, `meta_value`) VALUES(202, 9, 'cooling', '1');

-- --------------------------------------------------------

--
-- Table structure for table `product_texts`
--

DROP TABLE IF EXISTS `product_texts`;
CREATE TABLE `product_texts` (
                                 `product_text_id` int(11) UNSIGNED NOT NULL,
                                 `product_id` int(11) UNSIGNED NOT NULL,
                                 `language` varchar(20) NOT NULL,
                                 `title` varchar(150) NOT NULL,
                                 `description` text,
                                 `price` decimal(11,2) DEFAULT NULL,
                                 `price_old` decimal(11,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_texts`
--

INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(4, 2, 'greek', 'Ψύκτρα για επεξεργαστές Intel - LGA775', '<h3>Intel CPU Cooler - Ψύκτρα για επεξεργαστές Intel </h3>\r\n<p>Η ψύκτρα PHT-7750 SkiveTek&#160; Radial της Nexus είναι όλη από <strong>χαλκό</strong>, με την τεχνολογία SkiveTek και πυρήνα επίσης από <strong>χαλκό</strong>. </p>\r\n<p> Η ψύκτρα παράγεται χρησιμοποιώντας την τεχνολογία <strong>SkiveTek </strong> για να επιτευχθεί η <strong>καλύτερη δυνατή ψύξη</strong>. Η βάση του SkiveTek είναι λυγισμένη γύρω από τον χάλκινο πυρήνα για να δημιουργεί το Ακτινωτό αποτέλεσμα και να βελτιστοποιεί την επιφάνεια ψύξης.</p>\r\n<p>Ο ανεμιστήρας της PHT-7750 είναι πραγματικά αθόρυβος 4-καλωδίων ελεγχόμενος από PWM (pulse width modulation). Η ταχύτητα του μπορεί να ρυθμιστεί μέσω της μητρικής πλακέτας και μπορεί να κυμανθεί ανάμεσα στις <strong>800 και 2600 στροφές ανα λεπτό </strong>. </p>\r\n<p> Λόγω της εξαιρετικά καλής επίδοσης της ψύκτρας ο ανεμιστήρας χρειάζεται πολύ λιγότερη ροή αέρα/ταχύτητα για να ψύξει επαρκώς τον επεξεργαστή. Ως αποτέλεσμα <strong>πολύ ήσυχη λειτουργία</strong>.</p>\r\n<h4>Χαρακτηριστικα:</h4>\r\n<p>Κατάλληλη για  Intel Socket T LGA775 Ο ανεμιστήρας της PHT-7750 είναι πραγματικά αθόρυβος, μετριέται ανάμεσα στα 17 dB(A) και 28db(A). Η ροή αέρα (airflow) κυμαίνεται ανάμεσα σε 8.29 CFM - 43.15 CFM</p>\r\n<h4>Προδιαγραφές ανεμστήρα:</h4>\r\n<p> Ο ανεμιστήρας που είναι ενσωματωμένος στην PHT-7750 είναι 4-καλωδίων με μεταβλητή ταχύτητα. Ο ανεμιστήρας ελέγχεται από τη μητρική του υπολογιστή σου και γυρνά με 30% περίπου της μέγιστης ταχύτητας στην εκκίνηση του συστήματος. Αυτές οι στροφές/λεπτό συνεχίζουν για περίπου 2 δεύτερα και μετά η μητρική αναλαμβάνει τον έλεγχο.</p>\r\n<h4> Βελτιωμένη έκδοση Intel 1.2</h4>\r\n<p>Ο ανεμιστήρας φτιάχνεται σύμφωνα με τις προδιαγραφές της Intel σχετικά με τους 4-καλωδίων PWM ελεγχόμενων ανεμιστήρων έκδοσης 1.2. Η βελτιωμένη έκδοση σημαίνει πως αν ο ανεμιστήρας δεν λάβει καμία πληροφορία σχετικά με τον έλεγχο των στροφών, τότε θα γυρίζει με τη μέγιστη ταχύτητα για λόγους ασφαλείας.</p>\r\n<h4>Προδιαγραφές:</h4>\r\n<p>- Μοντέλο: PHT-7750<br />\r\n- Socket: LGA775 <br />\r\n- Βάρος: 850 γραμμάρια<br />\r\n</p>\r\n<h4>Ανεμιστήρας:</h4>\r\n<p> - Διαστάσεις: 80x80x25 mm <br />\r\n- Ταχύτητα περιστροφής: 800~2600 στροφές/λεπτό (+/-10%) <br />\r\n- Επίπεδο θορύβου: 17~28 dB(A) <br />\r\n- Ροή αέρα: 8.29~43.15CFM <br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><strong></strong></p>', '35.00', '50.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(5, 2, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(6, 2, 'english', '', '', '0.00', '50.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(7, 3, 'greek', 'Πραγματικά Ήσυχος Ανεμιστήρας - 80mm', 'Ο ανεμιστήρας των 80mm της Nexus είναι η απόλυτη λύση για να δώσεις εξτρά πνοή αέρα στο ήσυχο σύστημά σου. Δε απεχθάνεσαι τη στιγμή που όταν φτιάξεις ένα ωραίο και ήσυχο σύστημα τελικά αποδεικνύεται πως η θερμότητα που παράγει το hardware είναι τόση πολή που οι θερμοκρασίες στο σύστημά σου φτάνουν στα ύψη; Τότε ο ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι η λύση για σένα. Παρέχει αυτή την έξτρα ροή αέρα που χρειάζεται ο υπολογιστής σου, χωρίς να καταλαβαίνεις πως λειτουργεί.\r\n<p>Ο 80mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι εξοπλισμένος με 4-pin καλώδιο δύο πλευρών και ένα συνδετήρα 3-pin για σύνδεση με την μητρική. Αυτό σου επιτρέπει να συνδέσεις τον ανεμιστήρα στο κουτί απ\' ευθείας στο τροφοδοτικό ή στη μητρική.<br />\r\n</p>\r\n<h4>   Χαρακτηριστικά:</h4>\r\n<p> 1500 στροφές/λεπτό <br />\r\n<br />\r\nΜεγάλο επίπεδο ροής αέρα, 20.2 CFM <br />\r\n<br />\r\nΟ 80mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, παράγει μονάχα 17.6 dB(A) θόρυβο. Η τιμή αυτή είναι αποτέλεσμα αρκετών τεστ σε ειδικό θάλαμο ακολουθώντας τα υψηλότερα στάνταρ. Συγκρίναμε τον συγκεκριμένο ανεμιστήρα με τους πιο ήσυχους της αγοράς και δεν βρήκαμε άλλον πιο ήσυχο!</p>\r\n<h4>Προδιαγραφές: </h4>\r\n<p> </p>\r\n<p>- Μοντέλο: SP802512L-03<br />\r\n<br />\r\n- Διαστάσεις: 80x80x25mm <br />\r\n- Εκδόσεις: Μαύρο <br />\r\n- Βάρος: 85 γραμμάρια <br />\r\n- Τροφοδοσία: 12 Volt<br />\r\n- Ταχύτητα περιστροφής: 1500 στροφές/λεπτό <br />\r\n- Ακουστικός θόρυβος: <strong>17.6 dB(A)</strong> <br />\r\n- Ροή αέρα: 20.2CFM <br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><strong></strong> </p>', '4.00', '8.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(8, 3, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(9, 3, 'english', '', '', '0.00', '8.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(10, 4, 'greek', 'Πραγματικά Ήσυχος Ανεμιστήρας - 92mm', 'Ο ανεμιστήρας των 92mm της Nexus είναι η απόλυτη λύση για να δώσεις εξτρά πνοή αέρα στο ήσυχο σύστημά σου. Δε απεχθάνεσαι τη στιγμή που όταν φτιάξεις ένα ωραίο και ήσυχο σύστημα τελικά αποδεικνύεται πως η θερμότητα που παράγει το hardware είναι τόση πολή που οι θερμοκρασίες στο σύστημά σου φτάνουν στα ύψη; Τότε ο ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι η λύση για σένα. Ο ανεμιστήρας των 92mm παρέχει τεράστια ροή αέρα, χωρίς να καταλαβαίνεις πως λειτουργεί.\r\n<p>Ο 92mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι εξοπλισμένος με 4-pin καλώδιο δύο πλευρών και ένα συνδετήρα 3-pin για σύνδεση με την μητρική. Αυτό σου επιτρέπει να συνδέσεις τον ανεμιστήρα στο κουτί απ\' ευθείας, στο τροφοδοτικό ή στη μητρική.</p>\r\n<h4>Χαρακτηριστικά:</h4>\r\n<p>   1500 στροφές/λεπτό <br />\r\n<br />\r\nΜεγάλο επίπεδο ροής αέρα, 27 CFM <br />\r\n<br />\r\nΟ 92mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, παράγει μονάχα 19.2 dB(A) θόρυβο. Η τιμή αυτή είναι αποτέλεσμα αρκετών τεστ σε ειδικό θάλαμο ακολουθώντας τα υψηλότερα στάνταρ. Συγκρίναμε τον συγκεκριμένο ανεμιστήρα με τους πιο ήσυχους της αγοράς και δεν βρήκαμε άλλον πιο ήσυχο!<br />\r\n</p>\r\n<h4>   Προδιαγραφές: </h4>\r\n<p> </p>\r\n<p>- Μοντέλο: DF1209SL-3<br />\r\n<br />\r\n- Διαστάσεις: 92x92x25mm <br />\r\n- Εκδόσεις: Μαύρο <br />\r\n- Βάρος: 98.5 γραμμάρια <br />\r\n- Τροφοδοσία: 12 Volt<br />\r\n- Ταχύτητα περιστροφής: 1500 στροφές/λεπτό <br />\r\n- Ακουστικός θόρυβος: <strong>19.2 dB(A)</strong><br />\r\n- Ροή αέρα: 27CFM <br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><strong></strong></p>', '7.00', '10.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(11, 4, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(12, 4, 'english', '', '', '0.00', '10.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(13, 5, 'greek', 'Πραγματικά Ήσυχος Ανεμιστήρας - 120mm - Πορτοκαλί', '<p> Ο ανεμιστήρας των 120mm της Nexus είναι η απόλυτη λύση για να δώσεις εξτρά πνοή αέρα στο ήσυχο σύστημά σου. Δε απεχθάνεσαι τη στιγμή που όταν φτιάξεις ένα ωραίο και ήσυχο σύστημα τελικά αποδεικνύεται πως η θερμότητα που παράγει το hardware είναι τόση πολή που οι θερμοκρασίες στο σύστημά σου φτάνουν στα ύψη; Τότε ο ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι η λύση για σένα. Ο ανεμιστήρας των 120mm παρέχει <strong>μαζική </strong>ροή αέρα, χωρίς να καταλαβαίνεις πως λειτουργεί.</p>\r\n<p>Ο 120mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι εξοπλισμένος με 4-pin καλώδιο δύο πλευρών και ένα συνδετήρα 3-pin για σύνδεση με την μητρική. Αυτό σου επιτρέπει να συνδέσεις τον ανεμιστήρα στο κουτί απ\' ευθείας στο τροφοδοτικό ή στη μητρική.</p>\r\n<h4>Χαρακτηριστικά:</h4>\r\n<p><br />\r\n1000 στροφές/λεπτό <br />\r\n<br />\r\nΜεγάλο επίπεδο ροής αέρα, <strong>36.87 CFM </strong><br />\r\n<br />\r\nΟ 120mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, παράγει μονάχα 22.98 dB(A) θόρυβο. Η τιμή αυτή είναι αποτέλεσμα αρκετών τεστ σε ειδικό θάλαμο ακολουθώντας τα υψηλότερα στάνταρ. Συγκρίναμε τον συγκεκριμένο ανεμιστήρα με τους πιο ήσυχους της αγοράς και δεν βρήκαμε άλλον πιο ήσυχο!<br />\r\n<br />\r\n</p>\r\n<h4>   Προδιαγραφές: </h4>\r\n<p> </p>\r\n<p>- Μοντέλο: D12SL-12 OR<br />\r\n<br />\r\n- Διαστάσεις: 120x120x25mm <br />\r\n- Βάρος: 123 γραμμάρια <br />\r\n- Τροφοδοσία: 12 Volt<br />\r\n- Ταχύτητα περιστροφής: 1000 στροφές/λεπτό <br />\r\n- Ακουστικός θόρυβος: <strong>22.98 dB(A) </strong><br />\r\n- Ροή αέρα: <strong>36.87CFM</strong> <br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><strong></strong></p>', '9.00', '12.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(14, 5, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(15, 5, 'english', '', '', '0.00', '12.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(16, 6, 'greek', 'Πραγματικά Ήσυχος Ανεμιστήρας - 120mm - Μαύρο/Άσπρο', '<p> Ο ανεμιστήρας των 120mm της Nexus είναι η απόλυτη λύση για να δώσεις εξτρά πνοή αέρα στο ήσυχο σύστημά σου. Δε απεχθάνεσαι τη στιγμή που όταν φτιάξεις ένα ωραίο και ήσυχο σύστημα τελικά αποδεικνύεται πως η θερμότητα που παράγει το hardware είναι τόση πολή που οι θερμοκρασίες στο σύστημά σου φτάνουν στα ύψη; Τότε ο ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι η λύση για σένα. Ο ανεμιστήρας των 120mm παρέχει <strong>μαζική </strong>ροή αέρα, χωρίς να καταλαβαίνεις πως λειτουργεί.</p>\r\n<p>Ο 120mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, είναι εξοπλισμένος με 4-pin καλώδιο δύο πλευρών και ένα συνδετήρα 3-pin για σύνδεση με την μητρική. Αυτό σου επιτρέπει να συνδέσεις τον ανεμιστήρα στο κουτί απ\' ευθείας στο τροφοδοτικό ή στη μητρική.</p>\r\n<h4>Χαρακτηριστικά:<br />\r\n</h4>\r\n<p> 1000 στροφές/λεπτό <br />\r\n<br />\r\nΜεγάλο επίπεδο ροής αέρα, <strong>36.87 CFM </strong><br />\r\n<br />\r\nΟ 120mm ανεμιστήρας της Nexus, Πραγματικά Αθόρυβος ανεμιστήρας, παράγει μονάχα 22.98 dB(A) θόρυβο. Η τιμή αυτή είναι αποτέλεσμα αρκετών τεστ σε ειδικό θάλαμο ακολουθώντας τα υψηλότερα στάνταρ. Συγκρίναμε τον συγκεκριμένο ανεμιστήρα με τους πιο ήσυχους της αγοράς και δεν βρήκαμε άλλον πιο ήσυχο!<br />\r\n</p>\r\n<h4>   Προδιαγραφές: </h4>\r\n<p> </p>\r\n<p>- Μοντέλο: D12SL-12 BW<br />\r\n<br />\r\n- Διαστάσεις: 120x120x25mm <br />\r\n- Βάρος: 123 γραμμάρια <br />\r\n- Τροφοδοσία: 12 Volt<br />\r\n- Ταχύτητα περιστροφής: 1000 στροφές/λεπτό <br />\r\n- Ακουστικός θόρυβος: <strong>22.98 dB(A) </strong><br />\r\n- Ροή αέρα: <strong>36.87CFM</strong> <br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><strong></strong></p>', '9.00', '13.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(17, 6, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(18, 6, 'english', '', '', '0.00', '13.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(19, 7, 'greek', 'Frizzbee - ΔΕΝ ΑΚΟΥΓΕΤΑΙ !', '<h3>Ψύξη Σκληρού Δίσκου</h3>\r\n<p>Ο ΑΘΟΡΥΒΟΣ ανεμιστήρας Frizzbee της Nexus για σκληρούς δίσκους είναι η απόλυτη λύση για να ρίξεις τη θερμοκρασίες του σκληρού σου δίσκου, χωρίς να κάνεις το σύστημά σου θορυβώδες. Γιαυτό ο Frizzbee είναι εντελώς αθόρυβος.</p>\r\n<p>Οι σύγχρονοι σκληροί δίσκοι τρέχουν γρηγορότερα και παράγουν έτσι περισσότερη θερμότητα. Η εξτρά ψύξη μπορεί να γίνει απαραίτητη, αλλά δεν χρειάζεται να κάνεις το σύστημά σου θορυβώδες.</p>\r\n<p>Ο Frizzbee είναι τελείως αθόρυβος ανεμιστήρας για σκληρούς δίσκους που παρέχει εξαιρετική ροή αέρα και ψύξη για το δίσκο σου. Η χαμηλότερη θερμοκρασία του δίσκου σημαίνει και μεγαλύτερη διάρκεια ζωής του καθώς και άψογη λειτουργία.</p>\r\n<h4>Χαρακτηριστικά:<br />\r\n</h4>\r\n<p>   ΔΕΝ ΑΚΟΥΓΕΤΑΙ ! </p>\r\n<p>Ο Frizzbee είναι τόσο ήσυχος που είναι αδύνατο να δείξει η συσκευή τα dB(A) .... Απλά δεν ακούγεται!*</p>\r\n<p>* Σημείωσε:<br />\r\nΌταν ο Frizzbee πέρασε από έλεγχο θορύβου, αυτό έγινε σε ένα θάλαμο με πιστοποίηση ISO για ελέγχους θορύβων. Είναι σημαντικό να ξέρεις πως ο θόρυβος του περιβάλλοντος σε ένα τέτοιο δωμάτιο είναι λίγο πάνω από 15 dB(A). Αυτές είναι οι καλύτερες δυνατές συνθήκες για τα τεστ. Οι τιμές που παρέχουμε είναι από πραγματικά τεστ. Μπορούμε να είμαστε περισσότερο αξιόπιστοι; Κρίνε το εσύ. </p>\r\n<h4> Εύκολη εγκατάσταση:</h4>\r\n<p>Η εγκατάσταση του Frizzbee είναι πανεύκολη, χρειάζονται μόνο 2 βίδες για να τον στερεώσεις στον σκληρό σου δίσκου, βυσμάτωσε το καλώδιο στο τροφοδοτικό και έτοιμος.</p>\r\n<h4>Προδιαγραφές:<br />\r\n</h4>\r\n<p>- Μοντέλο: FRZ-3500<br />\r\n<br />\r\n- Διαστάσεις: 101.6x94.6x17.8mm<br />\r\n- Διαστάσεις ανεμιστήρα: 60x60x15 mm<br />\r\n- Τύπος ρουλεμάν: Sleeve Bearing<br />\r\n- Τροφοδοσία: 12 Volt<br />\r\n- Ταχύτητα περιστροφής: 1500 στροφές/λεπτό <br />\r\n- Ακουστικός θόρυβος: <strong>Δεν ακούγεται! (&lt;15 dB(A))</strong><br />\r\n- Ροή αέρα: 6.4CFM <br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><strong></strong></p>', '10.00', '18.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(20, 7, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(21, 7, 'english', '', '', '0.00', '18.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(22, 8, 'greek', 'Heatspreader (ψύκτρα) μνήμης νίκελ', 'Με το heatspreader, δηλαδή απλωτής θερμότητας (ελεύθερη μετάφραση) ή αλλιώς ψύκτρα μνήμης, βελτιώνεις την απώλεια της θερμότητας που παράγουν τα τσιπάκια της μνήμης. Λιγότερη θερμότητα σημαίνει πιο σταθερή λειτουργία και λιγότερα σφάλματα. Η ψύκτρα μνημών της Nexus είναι διαθέσιμη σε πολλά χρώματα.\r\n<p>Συμβατή με όλα τα στάνταρ    SDR / DDR SDRAM. </p>\r\n<p>Έρχεται σε διάφορα χρώματα σε αλουμινίο και ολόχαλκη.</p>\r\n<h4>Προδιαγραφές:<br />\r\n</h4>\r\n<p>   - Αριθμός μοντέλου: HSP-350NI (Χάλκινη, νικελωμένη που καθρεφτίζει) <br />\r\n- Διαστάσεις: 125x25 mm<br />\r\n- Μνήμη: SDRAM και DDR<br />\r\n- Βάρος: 70 γραμμάρια<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong> </p>', '6.00', '11.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(23, 8, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(24, 8, 'english', '', '', '0.00', '11.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(25, 9, 'greek', 'Heatspreader (ψύκτρα) μνήμης μπλε', 'Με το heatspreader, δηλαδή απλωτής θερμότητας (ελεύθερη μετάφραση) ή αλλιώς ψύκτρα μνήμης, βελτιώνεις την απώλεια της θερμότητας που παράγουν τα τσιπάκια της μνήμης. Λιγότερη θερμότητα σημαίνει πιο σταθερή λειτουργία και λιγότερα σφάλματα. Η ψύκτρα μνημών της Nexus είναι διαθέσιμη σε πολλά χρώματα.\r\n<p>Συμβατή με όλα τα στάνταρ    SDR / DDR SDRAM. </p>\r\n<p>Έρχεται σε διάφορα χρώματα σε αλουμινίο και ολόχαλκη.</p>\r\n<h4>Προδιαγραφές:<br />\r\n</h4>\r\n<p>   - Αριθμός μοντέλου: HSP-230BU (Μπλε αλουμινίου) <br />\r\n- Διαστάσεις: 125x25 mm<br />\r\n- Μνήμη: SDRAM και DDR <br />\r\n- Βάρος: 70 γραμμάρια<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong> </p>', '5.00', '9.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(26, 9, 'german', 'Heatspreader', 'dfdsfsdf', '12.00', '111.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(27, 9, 'english', '', '', '0.00', '9.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(28, 10, 'greek', 'Heatspreader (ψύκτρα) μνήμης χάλκινη', '<p> Με το heatspreader, δηλαδή απλωτής θερμότητας (ελεύθερη μετάφραση) ή αλλιώς ψύκτρα μνήμης, βελτιώνεις την απώλεια της θερμότητας που παράγουν τα τσιπάκια της μνήμης. Λιγότερη θερμότητα σημαίνει πιο σταθερή λειτουργία και λιγότερα σφάλματα. Η ψύκτρα μνημών της Nexus είναι διαθέσιμη σε πολλά χρώματα.</p>\r\n<p>Συμβατή με όλα τα στάνταρ    SDR / DDR SDRAM. </p>\r\n<p>Έρχεται σε διάφορα χρώματα σε αλουμινίο και ολόχαλκη.</p>\r\n<h4>Προδιαγραφές:</h4>\r\n<p>- Αριθμός μοντέλου: HSP-350CU (Χάλκινη)<br />\r\n- Διαστάσεις: 125x25 mm<br />\r\n- Μνήμη: SDRAM και DDR <br />\r\n- Βάρος: 70 γραμμάρια<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong></p>', '6.00', '11.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(29, 10, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(30, 10, 'english', '', '', '0.00', '11.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(34, 12, 'greek', 'Στηρίγματα Σιλικόνης για Ανεμιστήρες', '<h3>Απορρόφηση δονήσεων των ανεμιστήρων</h3>\r\n<p>Τα πολύ μαλακά στηρίγματα από σιλικόνη σχεδιάστηκαν για να εξαλείφουν το θόρυβο που παράγεται από της δονήσεις των ανεμιστήρων που βρίσκονται στερεωμένα στο σασί του υπολογιστή.</p>\r\n<p>Ένας ανεμιστήρας που έρχεται σε επαφή με το σασί του υπολογιστή δημιουργεί δονήσεις κατά τη διάρκεια της λειτουργίας του. Αυτές οι δονήσεις προκαλούν αρκετά ενοχλητικούς ήχους και θορύβους. Αντικαθιστώντας τις βίδες με τα πολύ μαλακά στηρίγματα σιλικόνης σταματάτε απλά και αποτελεσματικά τις δονήσεις.</p>\r\n<p>Τα στηρίγματα αυτά έχουν κατασκευαστεί από την καλύτερη σιλικόνη και εγγυώνται αποτελεσματικότητα και αντοχή.</p>\r\n<p>Τα στηρίγματα είναι γενικής χρήσεως και ταιριάζουν με τους περισσότερους ανεμιστήρες και σασί υπολογιστών.<br />\r\n</p>\r\n<h4>   Χαρακτηριστικά:</h4>\r\n<p>   - περιέχονται 4 κομμάτια<br />\r\n- Πολύ μαλακή και εύκαμπτη σιλικόνη<br />\r\n- Έξοχη ποιότητα, μεγάλη διάρκεια ζωής<br />\r\n- Γενική χρήση <br />\r\n- Σταματά τις δονήσεις αποτελεσματικά<br />\r\n- Είναι φιλικά προς το περιβάλλον σύμφωνα με τις οδηγίες των WEEE &amp; RoHS<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><br />\r\n<br />\r\nΓρήγορα, αποτελεσματικά και εύκολα στην εγκατάσταση!</p>', '1.50', '2.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(35, 12, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(36, 12, 'english', '', '', '0.00', '2.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(37, 13, 'greek', 'Θερμοαγώγιμη Πάστα με 10% ασήμι', '<p>Ποτέ δεν μπορείς να έχεις αρκετή θερμοαγώγιμη πάστα ... τουλάχιστον όταν αλλάζεις ή αφαιρείς την ψύκτρα του επεξεργαστή σου. Ή όταν συναρμολογείς υπολογιστές σε συχνή βάση.</p>\r\n<p>Για να σε βοηθήσουμε προσφέρουμε σύριγγα 1.0 γραμμαρίου θερμοαγώγιμης πάστας με 10% ασήμι.</p>\r\n<p>Καλή, στέρεη θερμοαγώγιμη πάστα με εξαιρετικές επιδόσεις και σε λογική τιμή. </p>\r\n<h4>   Χαρακτηριστικά:</h4>\r\n<p>   - Θερμική αγωγιμότητα: &gt;7.5W/m-k <br />\r\n- Θερμική αντίσταση: &lt;0.06°C-in²/W <br />\r\n- Περιέχει 10% ασήμι <br />\r\n- για ψύκτρες επεξεργαστών</p>', '2.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(38, 13, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(39, 13, 'english', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(40, 14, 'greek', 'DiskTwin - Αντικραδασμικό HDD - Αλουμίνιο', '<p>Το DiskTwin της Nexus είναι η ιδανική λύση για να γλιτώσεις από κάθε δόνηση και θόρυβο από αντιχήσεις του σκληρού δίσκου. Έχεις βαρεθεί το βουητό που κάνει ο δίσκος; Ή μήπως κάνει ο δίσκος σου κραδασμούς πάνω στο σασί; Το DiskTwin θα σε βγάλει από τη δυστυχία σου.</p>\r\n<p>Το DiskTwin είναι φτιαγμένο από δύο κομμάτια από στέρεο αλουμίνιο που αυξάνει την θερμική επιφάνεια του σκληρού δίσκου καθώς και κάθε κομμάτι είναι εξοπλισμένο με δύο τμήματα υψηλής ποιότητας λαστιχένια μπλοκ που απορροφούν τους κραδασμούς. Απλά αφαίρεσε τον σκληρό σου δίσκο από τον υπολογιστή και στερέωσε το DiskTwin στις δύο πλευρές του 3.5 ιντζών δίσκου. Έπειτα επανατοποθέτησε τον δίσκο σε μία ελεύθερη φατνία των 5.25 ιντζών και είσαι έτοιμος!</p>\r\n<p>Το DiskTwin θα σταματήσει οποιοδήποτε θόρυβο από κραδασμό του σκληρού δίσκου και θα μεγιστοποιήσει την ψύξη του.</p>\r\n<p>Υψηλή ποιότητα λαστιχένιων αντικραδασμικών μπλοκ.<br />\r\n</p>\r\n<p>Ψύκτρα αλουμινίου με θερμικά pad για ακόμη πιο αποδοτική ψύξη.</p>\r\n<p>Ο 3.5 ιντζών σκληρός δίσκος εφοδιασμένος με το DiskTwin χωρά σε φατνία των 5.25 ιντζών.</p>\r\n<h4>Προδιαγραφές:<br />\r\n</h4>\r\n- Αριθμός μοντέλου:                 DTW-2300A<br />\r\n- Διαστάσεις:                      146.81x26.15x18.8 mm 	 <br />\r\n- Συμβατότητα:&#160;                 σκληρός δίσκος 3.5 ιντζών<br />\r\n- Βάρος:                       105 γραμμάρια (ανά μονάδα) 	 <br />\r\n- Υλικά:                    Αλουμίνιο, Λάστιχο, Θερμικά Pad, Βίδες Στερέωσης<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><br />\r\n<br />\r\n<h4>Οδηγίες εγκατάστασης:</h4>\r\n<br />\r\n1)  Καθάρισε τις δύο επιφάνειες του σκληρού δίσκου όπου θα τοποθετηθεί το DiskTwin, αφαιρώντας σκόνη και λίπος από δακτυλιές.<br />\r\n<br />\r\n2)  Στερέωσε το DiskTwin στις πλευρές του σκληρού δίσκου χρησιμοποιώντας τις βίδες που περιλαμβάνονται (των 14mm). Πίεσε τις βίδες ώστε να περάσουν το λαστιχένιο μπλοκ μέχρι τις τρύπες στήριξης του σκληρού δίσκου και βίδωσέ τες.<br />\r\n<br />\r\n3)  Στερέωσε το σκληρό δίσκο με το DiskTwin σε μία φατνία των 5.25 ιντζών στο σύστημά σου χρησιμοποιώντας τις βίδες που περιέχονται (των 7,5mm)<br />\r\n<br />\r\n4)  Επανατοποθέτησε τους συνδετήρες και τα καλώδια του σκληρού σου.', '11.00', '17.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(41, 14, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(42, 14, 'english', '', '', '0.00', '17.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(43, 15, 'greek', 'DiskTwin - Αντικραδασμικό HDD - Μαύρο', '<p>Το DiskTwin της Nexus είναι η ιδανική λύση για να γλιτώσεις από κάθε δόνηση και θόρυβο από αντιχήσεις του σκληρού δίσκου. Έχεις βαρεθεί το βουητό που κάνει ο δίσκος; Ή μήπως κάνει ο δίσκος σου κραδασμούς πάνω στο σασί; Το DiskTwin θα σε βγάλει από τη δυστυχία σου.</p>\r\n<p>Το DiskTwin είναι φτιαγμένο από δύο κομμάτια από στέρεο αλουμίνιο που αυξάνει την θερμική επιφάνεια του σκληρού δίσκου καθώς και κάθε κομμάτι είναι εξοπλισμένο με δύο τμήματα υψηλής ποιότητας λαστιχένια μπλοκ που απορροφούν τους κραδασμούς. Απλά αφαίρεσε τον σκληρό σου δίσκο από τον υπολογιστή και στερέωσε το DiskTwin στις δύο πλευρές του 3.5 ιντζών δίσκου. Έπειτα επανατοποθέτησε τον δίσκο σε μία ελεύθερη φατνία των 5.25 ιντζών και είσαι έτοιμος!</p>\r\n<p>Το DiskTwin θα σταματήσει οποιοδήποτε θόρυβο από κραδασμό του σκληρού δίσκου και θα μεγιστοποιήσει την ψύξη του.</p>\r\n<p>Υψηλή ποιότητα λαστιχένιων αντικραδασμικών μπλοκ.<br />\r\n</p>\r\n<p>Ψύκτρα αλουμινίου με θερμικά pad για ακόμη πιο αποδοτική ψύξη.</p>\r\n<p>Ο 3.5 ιντζών σκληρός δίσκος εφοδιασμένος με το DiskTwin χωρά σε φατνία των 5.25 ιντζών.</p>\r\n<h4>Προδιαγραφές:<br />\r\n</h4>\r\n- Αριθμός μοντέλου:                 DTW-2300Β<br />\r\n- Διαστάσεις:                      146.81x26.15x18.8 mm 	 <br />\r\n- Συμβατότητα:&#160;                 σκληρός δίσκος 3.5 ιντζών<br />\r\n- Βάρος:                       105 γραμμάρια (ανά μονάδα) 	 <br />\r\n- Υλικά:                    Αλουμίνιο, Λάστιχο, Θερμικά Pad, Βίδες Στερέωσης<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><br />\r\n<br />\r\n<h4>Οδηγίες εγκατάστασης:</h4>\r\n<br />\r\n1)  Καθάρισε τις δύο επιφάνειες του σκληρού δίσκου όπου θα τοποθετηθεί το DiskTwin, αφαιρώντας σκόνη και λίπος από δακτυλιές.<br />\r\n<br />\r\n2) Στερέωσε το DiskTwin στις πλευρές του σκληρού δίσκου χρησιμοποιώντας τις βίδες που περιλαμβάνονται (των 14mm). Πίεσε τις βίδες ώστε να περάσουν το λαστιχένιο μπλοκ μέχρι τις τρύπες στήριξης του σκληρού δίσκου και βίδωσέ τες.<br />\r\n<br />\r\n3) Στερέωσε το σκληρό δίσκο με το DiskTwin σε μία φατνία των 5.25 ιντζών στο σύστημά σου χρησιμοποιώντας τις βίδες που περιέχονται (των 7,5mm)<br />\r\n<br />\r\n4)  Επανατοποθέτησε τους συνδετήρες και τα καλώδια του σκληρού σου.', '11.00', '17.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(44, 15, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(45, 15, 'english', '', '', '0.00', '17.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(46, 16, 'greek', 'DampTek - εξαιρετικό στην απορρόφηση θορύβων', 'Το DampTek® της Nexus είναι υλικό απορρόφησης θορύβων τελευταίας τεχνολογίας. Τα υλικά από τα οποία αποτελείται είναι τα πιο αποδοτικά, στην μόνωση και στην απορρόφηση των συχνοτήτων που βγαίνουν από το σύστημά σου. Το DampTek® αποτελείται από ένα εμπόδιο μάζας 1.5mm για να μονώνει το θόρυβο και από 6mm αφρώδους στρώματος για να απορροφά πολλαπλές συχνότητες.<br />\r\n<br />\r\nΤο πακέτο του DampTek® περιλαμβάνει <strong>τρία</strong> από αυτά τα φύλλα που είναι υψηλής ποιότητας υλικά με αυτοκόλλητη πλάτη. Το φύλλο είναι εύκολο στο κόψιμο έτσι ώστε να το κόψεις στα μέτρα σου, καθώς και πολύ εύκολο στην εγκατάσταση αφού η αυτοκόλλητη πλάτη σου επιτρέπει να το επανατοποθείσεις αν δεν ταίριαξε καλά. Αυτά τα τρία φύλλα είναι υπεραρκετά για να φτάσουν για την πλειοψηφία των κουτιών που κυκλοφορούν στην αγορά από midi tower έως και τα πιο μεγάλα full tower.<br />\r\n<br />\r\nΕίναι ένα υπέροχο προϊόν για να μετατρέψεις το σύστημά σου από θορυβώδες σε <strong>ήσυχο </strong>που θα σε αφήνει να κοιμάσαι το βράδυ και να δουλεύεις χωρίς πονοκεφάλους!<br />\r\n<h4>Λεπτομέρειες Αφρώδους στρώματος:</h4>\r\nΤο αφρώδες στρώμα του DampTek® απορροφά τους ήχους με ανοικτά κελιά. Παρασκευάζεται με βάση συνθετικής μελαμίνης και μπορεί να αντέξει υψηλές θερμοκρασίες καθώς και φωτιά! Έχει εξαιρετικές ιδιότητες στην απορρόφηση του ήχου. Το αφρώδες υλικό σε συνδυασμό με το εμπόδιο στην πλάτη προορίζονται για το εσωτερικό του κουτιού.<br />\r\n<h4>Λεπτομέρειες στρώματος Εμποδίου:</h4>\r\nΤο στρώμα \"εμποδίου\" είναι ένα εύκαμπτο συνθετικό ηχο-μονωτικό υλικό φτιαγμένο από θερμοπλαστικό, μη-βουλκανισμένο λάστιχο και ορυκτά σε μορφή σκόνης. Η μικρή σχετικά μάζα του κάνει το στρώμα \"εμποδίου\" του DampTek® είναι εξαιρετικός μονωτής θορύβου στο PC. Ακριβώς από πίσω από αυτό το στρώμα βρίσκεται η αυτοκόλλητη πλάτη.<br />\r\n<h4>Με μια ματιά:</h4>\r\nΤο στρώμα αφρού είναι ανθεκτικό στη φωτιά, και σβήνει μόνο του.<br />\r\n<br />\r\nΑυτοκόλλητο<br />\r\n<br />\r\nΕύκολο στο κόψιμο και στη διαμόρφωση<br />\r\n<h4>  	Προδιαγραφές:</h4>\r\n- Αριθμός Μοντέλου:                 Damptek Mats<br />\r\n- Το πακέτο περιλαμβάνει:               <strong>3 φύλλα</strong> απορρόφησης θορύβου<br />\r\n- Διαστάσεις ανά φύλλο: 40 x 50 cm (πίστεψέ με είναι αρκετά μεγάλο !)<br />\r\n- Πάχος:                        7.5 mm περίπου (1.5 mm στρώμα εμποδίου και 6 mm αφρώδες στρώμα) 	 <br />\r\n- Βάρος:                       <strong>3 κιλά!</strong>', '35.00', '50.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(47, 16, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(48, 16, 'english', '', '', '0.00', '50.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(49, 17, 'greek', 'Αντικραδασμικό Κιτ 60 τεμαχίων!', 'Το αντικραδασμικό κιτ στερέωσης της Nexus είναι ένα εύκολο στη χρήση όλα σε ένα κιτ που θα ελαχιστοποιήσει τους κραδασμούς και τους θορύβους που παράγονται από τους ανεμιστήρες του επεξεργαστή, ανεμιστήρες κουτιού, και του σκληρού δίσκου. Επίσης περιλαμβάνει 4 μαλακά ποδαράκια για το κουτί σου.<br />\r\n<h4> 12 Ελαστικά Τεμάχια στερέωσης ανεμιστήρων για ανεμιστήρες ανοικτού σασί και άλλα 12 για ανεμιστήρες κλειστού σασί</h4>\r\n* Αποτρέπουν τη μετήχηση, απορροφούν τους κραδασμούς που σε διαφορετική περίπτωση θα μεταφερόταν από τον ανεμιστήρα στο κουτί του υπολογιστή.<br />\r\n* 12 κομμάτια για τη χρήση σε ανεμιστήρες ανοικτού σασί (βλέπε εικόνα).<br />\r\n* 12 κομμάτια για τη χρήση σε ανεμιστήρες κλειστού σασί (βλέπε εικόνα).<br />\r\n* 4 κομμάτια για κάθε ανεμιστήρα που σημαίνει πως φτάνουν για τη στερέωση 3 ανεμιστήρων.\r\n<h4>12 κομμάτια ροδέλων από λάστιχο μαζί με τις βίδες για τη στερέωση σκληρού δίσκου</h4>\r\n* Βοηθούν στη μείωση της μεταφοράς του θορύβου που παράγεται από τις δονήσεις του σκληρού δίσκου. Απομονώνει το σκληρό δίσκο από το σασί.<br />\r\n* Κατάλληλο για δίσκους 3.5 καθώς και 2.5 ιντζών.<br />\r\n* 4 κομμάτια για κάθε σκληρό δίσκο, επομένως φτάνουν για συνολικά 3 σκληρούς δίσκους.<br />\r\n<h4> 4 κομμάτια λαστιχένια αυτοκόλλητα πόδια</h4>\r\n* Υπέροχα μαλακά λαστιχένια πόδια για να αντικαταστήσετε τα πλαστικά σκληρά του κουτιού σου.<br />\r\n* Αποτρέπουν την μεταφορά κραδασμών από το pc στο γραφείο ή στο πάτωμα.<br />\r\n* Με αυτοκόλλητη ταινία.<br />\r\n* Μπορεί επίσης να χρησιμοποιηθεί για εκτυπωτές, ηχεία κλπ.<br />\r\n<h4> 20 κομμάτια tie wrap (δετήρες)</h4>\r\n* Διάφανοι πλαστικοί δετήρες.<br />\r\n* Για να δέσεις και να συμμαζέψεις τα σκόρπια καλώδια. Έτσι δεν θα χτυπούν τους ανεμιστήρες και θα γλιτώνεις από ενοχλητικούς θορύβους. Επίσης θα βελτιωθεί και η ροή αέρα αφού δεν θα βρίσκει εμπόδια στα καλώδια.<br />\r\n* 9 εκατοστά μήκος.<br />\r\n<h4>Προδιαγραφές:</h4>\r\n- Αριθμός μοντέλου:                 MTK-6000<br />\r\n- Εγγύηση:                    <strong>3 Χρόνια</strong><br />\r\n- Το πακέτο περιέχει:                       <br />\r\n<br />\r\n12 Ελαστικά Τεμάχια στερέωσης ανεμιστήρων για ανεμιστήρες ανοικτού σασί και άλλα 12 για ανεμιστήρες κλειστού σασί<br />\r\n<img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_rmounts.jpg\" /><img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_rmountsdrw.jpg\" /><img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_rmountsl.jpg\" /><img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_rmountsldr.jpg\" /><br />\r\n<br />\r\nΕδώ μπορείτε να δείτε τη διαφορά ενός ανεμιστήρα ανοικτού σασί και ενός κλειστού σασί.<br />\r\n<img src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_fans.jpg\" alt=\"\" /><br />\r\n12 κομμάτια ροδέλων από λάστιχο μαζί με τις βίδες για τη στερέωση σκληρού δίσκου<br />\r\n<img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_hddmounts.jpg\" /><img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_hddmountsdrw.jpg\" /><br />\r\nΜπορούν να χρησιμοποιηθούν και σε άλλα στοιχεία (hardware)!<br />\r\n<br />\r\n4 κομμάτια λαστιχένια αυτοκόλλητα πόδια<br />\r\n<img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_feet.jpg\" /><img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_feetdrw.jpg\" /><br />\r\n20 κομμάτια tie wrap (δετήρες)<br />\r\n<img alt=\"\" src=\"http://www.cool-clean-quiet.com/uploads/Image/products/nexus_mounting_kit/mountingkit_tierap.jpg\" />', '13.00', '18.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(50, 17, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(51, 17, 'english', '', '', '0.00', '18.50');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(52, 18, 'greek', '2x Ανεμιστήρας - 80mm + Αντικραδασμικό Κιτ + Frizzbee', '<h3>Καλοκαιρινή Π Ρ Ο Σ Φ Ο Ρ Α !</h3>\r\n<h3>&#160;</h3>\r\nΔροσιστικό πακέτο με:<br />\r\n<br />\r\n<strong>Δύο</strong> Πραγματικά Ήσυχους Ανεμιστήρες - 80 mm (πληροφορίες <a href=\"http://www.cool-clean-quiet.com/product/index/greek/real-silent-case-fan-80mm\">εδώ</a>)<br />\r\n<strong>+ Frizzbee</strong> (πληροφορίες <a href=\"http://www.cool-clean-quiet.com/product/index/greek/frizzbee-inaudible-hdd-cooler\">εδώ</a>)<br />\r\n+ <strong>Αντικραδασμικό Κιτ 60 τεμαχίων!</strong> (πληροφορίες <a href=\"http://www.cool-clean-quiet.com/product/index/greek/anti-vibration-mounting-kit\">εδώ</a>)<br />\r\n<br />\r\n<strong>Σε τιμή έκπληξη!</strong>', '42.00', '52.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(53, 18, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(54, 18, 'english', '', '', '0.00', '52.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(55, 19, 'greek', '2x Heatspreader μπλε + Πραγματικά Ήσυχος Ανεμιστήρας - 120mm + DiskTwin', '<h3>Καλοκαιρινή Π Ρ Ο Σ Φ Ο Ρ Α !</h3>\r\n<h3>&#160;</h3>\r\nΔροσιστικό &amp; Ήσυχο πακέτο με:<br />\r\n<br />\r\n<strong>Δύο</strong> Heatspreader (ψύκτρα) μνήμης μπλε<br />\r\n+ Πραγματικά Ήσυχος Ανεμιστήρας - 120 mm (<a href=\"http://www.cool-clean-quiet.com/product/index/greek/real-silent-case-fan-120mm-orange\">πορτοκαλί</a> ή <a href=\"http://www.cool-clean-quiet.com/product/index/greek/real-silent-case-fan-80mm\">άσπρο/μαύρο</a>)<br />\r\n+ DiskTwin - Αντικραδασμικό σκληρού δίσκου (<a href=\"http://www.cool-clean-quiet.com/product/index/greek/disktwin-stop-hdd-vibration-black\">μαύρο</a> ή <a href=\"http://www.cool-clean-quiet.com/product/index/greek/disktwin-stop-hdd-vibration-aluminium\">αλουμίνιο</a>)<br />\r\n<br />\r\n<strong>Σε τιμή έκπληξη!</strong>', '40.00', '50.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(56, 19, 'german', '', '', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(57, 19, 'english', '', '', '0.00', '50.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(58, 20, 'greek', 'DampTek + DiskTwin + Στηρίγματα Σιλικόνης + Καλώδιο μείωσης θορύβου', '<h3>Καλοκαιρινή Π Ρ Ο Σ Φ Ο Ρ Α !</h3>\r\n<h3> </h3>\r\nΤελείως <strong>Αθόρυβο</strong> πακέτο με:<br />\r\n<br />\r\n<strong>DampTek</strong> - εξαιρετικό στην απορρόφηση θορύβων<br />\r\n+ <strong>DiskTwin</strong> - Αντικραδασμικό σκληρού δίσκου (<a href=\"http://www.cool-clean-quiet.com/product/index/greek/disktwin-stop-hdd-vibration-black\">μαύρο</a> ή <a href=\"http://www.cool-clean-quiet.com/product/index/greek/disktwin-stop-hdd-vibration-aluminium\">αλουμίνιο</a>)<br />\r\n+ Στηρίγματα Σιλικόνης για Ανεμιστήρες (πληροφορίες <a href=\"http://www.cool-clean-quiet.com/product/index/greek/real-soft-silicon-fan-mounts\">εδώ</a>)<br />\r\n+ Καλώδιο μείωσης θορύβου (πληροφορίες <a href=\"http://www.cool-clean-quiet.com/product/index/greek/noise-reduction-cable\">εδώ</a>)<br />\r\n<strong><br />\r\nΣε τιμή έκπληξη!</strong>\r\nTest', '58.00', '72.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(59, 20, 'german', 'Test', 'Test', '0.00', '0.00');
INSERT INTO `product_texts` (`product_text_id`, `product_id`, `language`, `title`, `description`, `price`, `price_old`) VALUES(60, 20, 'english', 'Test', 'Test', '0.00', '72.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `user_id` int(11) UNSIGNED NOT NULL,
                         `password` varchar(60) NOT NULL,
                         `first_name` varchar(50) DEFAULT NULL,
                         `last_name` varchar(100) DEFAULT NULL,
                         `email` varchar(200) NOT NULL,
                         `url` varchar(250) DEFAULT NULL,
                         `birthdate` date DEFAULT NULL,
                         `city` varchar(100) DEFAULT NULL,
                         `street` varchar(250) DEFAULT NULL,
                         `zip` varchar(20) DEFAULT NULL,
                         `country` varchar(50) DEFAULT NULL,
                         `phone` varchar(50) DEFAULT NULL,
                         `language` varchar(20) NOT NULL,
                         `registered` datetime DEFAULT NULL,
                         `credits` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `password`, `first_name`, `last_name`, `email`, `url`, `birthdate`, `city`, `street`, `zip`, `country`, `phone`, `language`, `registered`, `credits`) VALUES(1, 'RSZKjBc7a5kblUh9', 'John', 'Doe', 'john@doe', 'http://', '1970-01-01', 'Some City', 'Address', '1234567', 'Greece', '694', 'greek', '2011-11-11 11:11:11', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
    ADD PRIMARY KEY (`category_id`),
    ADD UNIQUE KEY `slug` (`slug`),
    ADD KEY `parent_category_id` (`parent_category_id`);

--
-- Indexes for table `category_texts`
--
ALTER TABLE `category_texts`
    ADD PRIMARY KEY (`category_text_id`),
    ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
    ADD PRIMARY KEY (`coupon_id`),
    ADD KEY `coupon_number` (`coupon_number`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
    ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_texts`
--
ALTER TABLE `news_texts`
    ADD PRIMARY KEY (`news_text_id`),
    ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
    ADD PRIMARY KEY (`order_id`),
    ADD KEY `user_id` (`user_id`),
    ADD KEY `fk_orders_coupon` (`coupon_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
    ADD PRIMARY KEY (`relation_id`),
    ADD KEY `order_id` (`order_id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
    ADD PRIMARY KEY (`product_id`),
    ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
    ADD PRIMARY KEY (`relation_id`),
    ADD KEY `product_id_category_id` (`product_id`,`category_id`),
    ADD KEY `fk_product_categories_category` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
    ADD PRIMARY KEY (`product_image_id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_meta`
--
ALTER TABLE `product_meta`
    ADD PRIMARY KEY (`meta_id`),
    ADD KEY `product_id` (`product_id`),
    ADD KEY `meta_key` (`meta_key`);

--
-- Indexes for table `product_texts`
--
ALTER TABLE `product_texts`
    ADD PRIMARY KEY (`product_text_id`),
    ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`user_id`),
    ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
    MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_texts`
--
ALTER TABLE `category_texts`
    MODIFY `category_text_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
    MODIFY `coupon_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
    MODIFY `news_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_texts`
--
ALTER TABLE `news_texts`
    MODIFY `news_text_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
    MODIFY `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
    MODIFY `relation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
    MODIFY `product_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
    MODIFY `relation_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
    MODIFY `product_image_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_meta`
--
ALTER TABLE `product_meta`
    MODIFY `meta_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_texts`
--
ALTER TABLE `product_texts`
    MODIFY `product_text_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
    MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
    ADD CONSTRAINT `fk_categories_parent_category` FOREIGN KEY (`parent_category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_texts`
--
ALTER TABLE `category_texts`
    ADD CONSTRAINT `fk_category_texts_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news_texts`
--
ALTER TABLE `news_texts`
    ADD CONSTRAINT `fk_news_texts_news` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
    ADD CONSTRAINT `fk_orders_coupon` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`coupon_id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
    ADD CONSTRAINT `fk_order_products_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_order_products_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
    ADD CONSTRAINT `fk_product_categories_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON UPDATE CASCADE,
    ADD CONSTRAINT `fk_product_categories_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
    ADD CONSTRAINT `fk_product_images_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_meta`
--
ALTER TABLE `product_meta`
    ADD CONSTRAINT `fk_product_meta_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_texts`
--
ALTER TABLE `product_texts`
    ADD CONSTRAINT `fk_product_texts_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
