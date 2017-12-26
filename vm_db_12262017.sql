-- phpMyAdmin SQL Dump
-- version 4.0.10.8
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 03:11 AM
-- Server version: 5.6.14
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `meta_title` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` text CHARACTER SET latin1 NOT NULL,
  `meta_description` text CHARACTER SET latin1 NOT NULL,
  `is_publish` smallint(2) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `is_publish`, `sorting`, `created`, `modified`) VALUES
(1, 'Sample About A', '<p>Sample About A</p>\r\n', 'Sample About A', 'Sample About A', 'Sample About A', 1, 1, '2017-07-21 02:03:03', '2017-07-21 02:03:03');

-- --------------------------------------------------------

--
-- Table structure for table `accreditations`
--

DROP TABLE IF EXISTS `accreditations`;
CREATE TABLE IF NOT EXISTS `accreditations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `file` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `accreditations`
--

INSERT INTO `accreditations` (`id`, `name`, `file`, `created`) VALUES
(1, 'API-1', '/webroot/upload/files/files/accreditations/API-1.pdf', '2017-08-15 12:06:47'),
(2, 'API-2', '/webroot/upload/files/files/accreditations/API-2.pdf', '2017-08-16 10:45:08'),
(3, 'API-3', '/webroot/upload/files/files/accreditations/API-3.pdf', '2017-08-16 10:45:19'),
(4, 'ISO CERT', '/webroot/upload/files/files/accreditations/ISO%20CERT.pdf', '2017-08-16 10:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `acl_phinxlog`
--

DROP TABLE IF EXISTS `acl_phinxlog`;
CREATE TABLE IF NOT EXISTS `acl_phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `acl_phinxlog`
--

INSERT INTO `acl_phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20141229162641, '2016-01-07 18:56:40', '2016-01-07 18:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 296),
(2, 1, NULL, NULL, 'Groups', 2, 15),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 2, NULL, NULL, 'isAuthorized', 13, 14),
(9, 1, NULL, NULL, 'Main', 16, 25),
(10, 9, NULL, NULL, 'index', 17, 18),
(11, 9, NULL, NULL, 'filter', 19, 20),
(12, 9, NULL, NULL, 'isAuthorized', 21, 22),
(13, 9, NULL, NULL, 'cell', 23, 24),
(14, 1, NULL, NULL, 'Users', 26, 47),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'dashboard', 29, 30),
(17, 14, NULL, NULL, 'view', 31, 32),
(18, 14, NULL, NULL, 'add', 33, 34),
(19, 14, NULL, NULL, 'edit', 35, 36),
(20, 14, NULL, NULL, 'delete', 37, 38),
(21, 14, NULL, NULL, 'login', 39, 40),
(22, 14, NULL, NULL, 'logout', 41, 42),
(23, 14, NULL, NULL, 'isAuthorized', 43, 44),
(24, 1, NULL, NULL, 'Acl', 48, 49),
(25, 1, NULL, NULL, 'Bake', 50, 51),
(26, 1, NULL, NULL, 'DebugKit', 52, 67),
(27, 26, NULL, NULL, 'Panels', 53, 58),
(28, 27, NULL, NULL, 'index', 54, 55),
(29, 27, NULL, NULL, 'view', 56, 57),
(30, 26, NULL, NULL, 'Requests', 59, 62),
(31, 30, NULL, NULL, 'view', 60, 61),
(32, 26, NULL, NULL, 'Toolbar', 63, 66),
(33, 32, NULL, NULL, 'clearCache', 64, 65),
(34, 1, NULL, NULL, 'Migrations', 68, 69),
(35, 1, NULL, NULL, 'Pages', 70, 89),
(36, 35, NULL, NULL, 'index', 71, 72),
(37, 35, NULL, NULL, 'view', 73, 74),
(38, 35, NULL, NULL, 'add', 75, 76),
(39, 35, NULL, NULL, 'edit', 77, 78),
(40, 35, NULL, NULL, 'delete', 79, 80),
(41, 35, NULL, NULL, 'isAuthorized', 81, 82),
(42, 1, NULL, NULL, 'Slides', 90, 109),
(43, 42, NULL, NULL, 'index', 91, 92),
(44, 42, NULL, NULL, 'view', 93, 94),
(45, 42, NULL, NULL, 'add', 95, 96),
(46, 42, NULL, NULL, 'edit', 97, 98),
(47, 42, NULL, NULL, 'delete', 99, 100),
(48, 42, NULL, NULL, 'isAuthorized', 101, 102),
(58, 1, NULL, NULL, 'Debug', 110, 117),
(59, 58, NULL, NULL, 'debugFtpGet', 111, 112),
(60, 58, NULL, NULL, 'debugThreaded', 113, 114),
(61, 58, NULL, NULL, 'isAuthorized', 115, 116),
(62, 1, NULL, NULL, 'Profile', 118, 129),
(63, 62, NULL, NULL, 'index', 119, 120),
(64, 62, NULL, NULL, 'edit', 121, 122),
(65, 62, NULL, NULL, 'change_profile_photo', 123, 124),
(66, 62, NULL, NULL, 'isAuthorized', 125, 126),
(67, 1, NULL, NULL, 'ResetPassword', 130, 135),
(68, 67, NULL, NULL, 'index', 131, 132),
(69, 67, NULL, NULL, 'isAuthorized', 133, 134),
(88, 35, NULL, NULL, 'publish', 83, 84),
(89, 35, NULL, NULL, 'unpublish', 85, 86),
(106, 42, NULL, NULL, 'jsonUpdateSort', 103, 104),
(107, 42, NULL, NULL, 'publish', 105, 106),
(108, 42, NULL, NULL, 'unpublish', 107, 108),
(112, 35, NULL, NULL, 'frontview', 87, 88),
(147, 62, NULL, NULL, 'change_password', 127, 128),
(149, 14, NULL, NULL, 'request_forgot_password', 45, 46),
(158, 1, NULL, NULL, 'Search', 136, 141),
(159, 158, NULL, NULL, 'index', 137, 138),
(160, 158, NULL, NULL, 'isAuthorized', 139, 140),
(161, 1, NULL, NULL, 'Abouts', 142, 155),
(162, 161, NULL, NULL, 'index', 143, 144),
(163, 161, NULL, NULL, 'view', 145, 146),
(164, 161, NULL, NULL, 'add', 147, 148),
(165, 161, NULL, NULL, 'edit', 149, 150),
(166, 161, NULL, NULL, 'delete', 151, 152),
(167, 161, NULL, NULL, 'isAuthorized', 153, 154),
(168, 1, NULL, NULL, 'News', 156, 175),
(169, 168, NULL, NULL, 'index', 157, 158),
(170, 168, NULL, NULL, 'view', 159, 160),
(171, 168, NULL, NULL, 'add', 161, 162),
(172, 168, NULL, NULL, 'edit', 163, 164),
(173, 168, NULL, NULL, 'delete', 165, 166),
(174, 168, NULL, NULL, 'isAuthorized', 167, 168),
(175, 168, NULL, NULL, 'publish', 169, 170),
(176, 168, NULL, NULL, 'unpublish', 171, 172),
(177, 168, NULL, NULL, 'frontview', 173, 174),
(178, 1, NULL, NULL, 'Technicals', 176, 195),
(179, 178, NULL, NULL, 'index', 177, 178),
(180, 178, NULL, NULL, 'view', 179, 180),
(181, 178, NULL, NULL, 'add', 181, 182),
(182, 178, NULL, NULL, 'edit', 183, 184),
(183, 178, NULL, NULL, 'delete', 185, 186),
(184, 178, NULL, NULL, 'isAuthorized', 187, 188),
(185, 1, NULL, NULL, 'TechnicalAttachments', 196, 209),
(186, 185, NULL, NULL, 'index', 197, 198),
(187, 185, NULL, NULL, 'view', 199, 200),
(188, 185, NULL, NULL, 'add', 201, 202),
(189, 185, NULL, NULL, 'edit', 203, 204),
(190, 185, NULL, NULL, 'delete', 205, 206),
(191, 185, NULL, NULL, 'isAuthorized', 207, 208),
(192, 178, NULL, NULL, 'publish', 189, 190),
(193, 178, NULL, NULL, 'unpublish', 191, 192),
(194, 178, NULL, NULL, 'frontview', 193, 194),
(195, 1, NULL, NULL, 'ProductCategories', 210, 223),
(196, 195, NULL, NULL, 'index', 211, 212),
(197, 195, NULL, NULL, 'view', 213, 214),
(198, 195, NULL, NULL, 'add', 215, 216),
(199, 195, NULL, NULL, 'edit', 217, 218),
(200, 195, NULL, NULL, 'delete', 219, 220),
(201, 195, NULL, NULL, 'isAuthorized', 221, 222),
(202, 1, NULL, NULL, 'Products', 224, 247),
(203, 202, NULL, NULL, 'index', 225, 226),
(204, 202, NULL, NULL, 'view', 227, 228),
(205, 202, NULL, NULL, 'add', 229, 230),
(206, 202, NULL, NULL, 'edit', 231, 232),
(207, 202, NULL, NULL, 'delete', 233, 234),
(208, 202, NULL, NULL, 'isAuthorized', 235, 236),
(209, 202, NULL, NULL, 'publish', 237, 238),
(210, 202, NULL, NULL, 'unpublish', 239, 240),
(211, 202, NULL, NULL, 'frontview', 241, 242),
(212, 202, NULL, NULL, 'add_featured', 243, 244),
(213, 202, NULL, NULL, 'remove_featured', 245, 246),
(214, 1, NULL, NULL, 'ProductAttachments', 248, 261),
(215, 214, NULL, NULL, 'index', 249, 250),
(216, 214, NULL, NULL, 'view', 251, 252),
(217, 214, NULL, NULL, 'add', 253, 254),
(218, 214, NULL, NULL, 'edit', 255, 256),
(219, 214, NULL, NULL, 'delete', 257, 258),
(220, 214, NULL, NULL, 'isAuthorized', 259, 260),
(221, 1, NULL, NULL, 'Services', 262, 281),
(222, 221, NULL, NULL, 'index', 263, 264),
(223, 221, NULL, NULL, 'view', 265, 266),
(224, 221, NULL, NULL, 'add', 267, 268),
(225, 221, NULL, NULL, 'edit', 269, 270),
(226, 221, NULL, NULL, 'delete', 271, 272),
(227, 221, NULL, NULL, 'publish', 273, 274),
(228, 221, NULL, NULL, 'unpublish', 275, 276),
(229, 221, NULL, NULL, 'frontview', 277, 278),
(230, 221, NULL, NULL, 'isAuthorized', 279, 280),
(231, 1, NULL, NULL, 'CompanyDetails', 282, 295),
(232, 231, NULL, NULL, 'index', 283, 284),
(233, 231, NULL, NULL, 'view', 285, 286),
(234, 231, NULL, NULL, 'add', 287, 288),
(235, 231, NULL, NULL, 'edit', 289, 290),
(236, 231, NULL, NULL, 'delete', 291, 292),
(237, 231, NULL, NULL, 'isAuthorized', 293, 294);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(11) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lft` (`lft`,`rght`),
  KEY `alias` (`alias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Groups', 1, NULL, 1, 8),
(2, NULL, 'Groups', 2, NULL, 9, 12),
(3, 1, 'Users', 1, NULL, 6, 7),
(4, NULL, 'Groups', 3, NULL, 13, 14),
(5, NULL, 'Groups', 4, NULL, 15, 16),
(6, 2, 'Users', 2, NULL, 10, 11),
(7, 1, 'Users', 3, NULL, 2, 3),
(8, 1, 'Users', 4, NULL, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aro_id` int(11) NOT NULL,
  `aco_id` int(11) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `aro_id` (`aro_id`,`aco_id`),
  KEY `aco_id` (`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

DROP TABLE IF EXISTS `company_details`;
CREATE TABLE IF NOT EXISTS `company_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `inquiry_recipient` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` text COLLATE utf8_unicode_ci,
  `twitter` text COLLATE utf8_unicode_ci,
  `longtitude` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`id`, `name`, `logo`, `email`, `address`, `inquiry_recipient`, `contact_number`, `fax`, `facebook`, `twitter`, `longtitude`, `latitude`, `created`, `modified`) VALUES
(1, 'VM Liwanag', '/vmliwanag/webroot/upload/files/images/company/logo.jpg', 'feliwanag_vmle@yahoo.com / vmle.corp@gmail.com', '<p>Blk 5, Lot 23, Phase 1-B, Holland<br />\r\nStreet, San Lorenzo South, Sta.Rosa<br />\r\nCity,Laguna</p>\r\n', 'sales@vmliwanag.com', '09228835994-95 / 09228638681', '(02) 5194859  / (049) 530 1856 / (02) 519 4860', '#', '#', '103.68137554498298', '1.6274206453281097', '2017-05-18 01:26:05', '2017-12-15 06:01:30');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(180) CHARACTER SET latin1 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Master Admin', '2016-01-08 03:01:24', '2016-07-24 19:53:52'),
(2, 'User', '2016-01-08 03:01:33', '2016-07-24 19:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET latin1 NOT NULL,
  `excerpt` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `meta_title` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` text CHARACTER SET latin1 NOT NULL,
  `meta_description` text CHARACTER SET latin1 NOT NULL,
  `thumb` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `is_publish` smallint(2) NOT NULL,
  `sorting` int(11) NOT NULL,
  `posted_by` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `excerpt`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `thumb`, `is_publish`, `sorting`, `posted_by`, `created`, `modified`) VALUES
(1, 'Sample News A', 'Lorem ipsum dolor sit amet, cu sumo instructior his. Vim congue libris invidunt te, falli sententiae sit ex, elitr philosophia ei duo. Nec eu dicat timeam constituto. Justo instruc', '<p>Lorem ipsum dolor sit amet, cu sumo instructior his. Vim congue libris invidunt te, falli sententiae sit ex, elitr philosophia ei duo. Nec eu dicat timeam constituto. Justo instructior mei ea, enim commune consequat vim at. Mei ne duis scaevola insolens, integre iuvaret nonumes est no.</p>\r\n\r\n<p>Ut zril vocibus mel, ex qui suas zril, nec te assum molestie. His an insolens scribentur, et qui atqui gubergren, mel id aliquam consequuntur. Ea quo soluta adipisci. Posse euripidis reformidans sit ex, ei summo alienum usu. Id vim nisl sapientem voluptatibus, debet causae aeterno mel ut, nec ut partem atomorum erroribus.</p>\r\n', 'Sample News A', 'Sample News A', 'Sample News A', '/vmliwanag/webroot/upload/files/images/news/1.jpg', 1, 1, ' Admin', '2017-12-13 05:23:54', '2017-12-13 05:23:54');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `meta_title` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` text CHARACTER SET latin1 NOT NULL,
  `meta_description` text CHARACTER SET latin1 NOT NULL,
  `is_publish` smallint(2) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `is_publish`, `sorting`, `created`, `modified`) VALUES
(1, 'Home', '<p>Sample ABC</p>\r\n', 'Sample ABC', 'Sample ABC', 'Sample ABC', 1, 1, '2017-05-13 05:10:30', '2017-05-13 05:10:30'),
(2, 'About', '<p>Lorem ipsum dolor sit amet, novum definitionem sea eu, sea summo lucilius tincidunt ad. Vide veritus mei et. Sea enim detraxit ex. Cibo petentium has ad, etiam dictas facilis te eos. Facilisi tractatos eos te. Vim ei lorem lucilius contentiones, eum te sumo eius singulis. Cum id tollit percipitur, eum paulo oratio nostrud ut. Numquam detraxit tincidunt pri id, ea paulo sadipscing eum. Te per nisl omnes constituto. Rebum persius qui an, sed in nobis partem postulant. At per tation primis, dolorum blandit singulis mei at, falli sententiae persequeris ea eam. Enim audiam ne vix, nam in tale graeco. Ad ius unum autem delenit. No nominati antiopam usu, cum graece iisque te. An graeco adipiscing qui. Ut regione volumus mea, vel blandit platonem cu, sea dicunt everti luptatum ex. Ne justo reprehendunt eum. Habeo fugit accusata ei duo. Eu sea duis prima cetero, ex sea minim gloriatur. Cum quot consetetur adipiscing ei, ad vim modus sonet suscipit. Dicant referrentur sea ex, mandamus salutatus sed ex.</p>\r\n', 'About', 'About', 'About', 1, 2, '2017-05-13 05:10:46', '2017-12-15 06:34:42'),
(3, 'Sample Page', '<p>test</p>\r\n', 'test', 'test', 'test', 1, 3, '2017-06-07 03:53:02', '2017-06-13 09:25:09'),
(4, 'Where to buy', '<h1><strong>Coming soon</strong></h1>\r\n', 'Enigne Oil Supplier, Hydraulic Oil Supplier and Engine Oil Supplier In Malaysia', 'AIMA Marketing Sdn Bhd', 'We are the engine oil supplier, hydraulic oil supplier and engine oil supplier in Malaysia to customers throughout the region', 1, 3, '2017-07-29 04:17:14', '2017-08-10 15:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `excerpt` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `body` text CHARACTER SET latin1 NOT NULL,
  `meta_title` text CHARACTER SET latin1 NOT NULL,
  `meta_keyword` text CHARACTER SET latin1 NOT NULL,
  `meta_description` text CHARACTER SET latin1 NOT NULL,
  `cover_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `is_publish` smallint(2) NOT NULL,
  `is_featured` smallint(2) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_category_id`, `name`, `excerpt`, `body`, `meta_title`, `meta_keyword`, `meta_description`, `cover_image`, `is_publish`, `is_featured`, `sorting`, `created`, `modified`) VALUES
(1, 1, 'Product A', ' Ex justo ancillae accusamus est, ius modo luptatum maiestatis ex. Dicat verterem consectetuer eam in. Nam et dicant commodo alienum.', '<p>Lorem ipsum dolor sit amet, per at delenit habemus nusquam, eu mei movet semper tibique. Prompta sanctus contentiones ex nec. Ex sit quodsi convenire incorrupte. Pri ad habeo vocent, ex novum invenire dignissim mea, quo at sumo facete. Solet mentitum pericula usu ut. Liber meliore mel ne, his audire eripuit explicari ut, cu lobortis accommodare sea. Est consulatu forensibus referrentur no.</p>\r\n\r\n<p>Ex justo ancillae accusamus est, ius modo luptatum maiestatis ex. Dicat verterem consectetuer eam in. Nam et dicant commodo alienum. An his augue iudico dolore, pri aeque voluptatum omittantur ex, et dolor fabellas pro.</p>\r\n', 'Product A', 'Product A', 'Product A', '/vmliwanag/webroot/upload/files/images/products/product-8.jpg', 1, 1, 0, '2017-12-15 05:44:16', '2017-12-15 05:49:59'),
(2, 1, 'Product B', 'Has legendos assentior expetendis ut, vide nullam constituto per cu. Adipiscing contentiones qui eu, vel nonumy doming latine ut.', '<p>Ut novum latine docendi vim. Ea pro quis sale debitis. Usu quando posidonium in. Omnis delicatissimi eu has, malorum discere persequeris qui ne. Eum et omnium efficiendi necessitatibus, nemore fuisset at usu. Eos ei tantas feugiat similique, duo eu dolores reprimique. Ut vim modo eros persius.</p>\r\n\r\n<p>Has legendos assentior expetendis ut, vide nullam constituto per cu. Adipiscing contentiones qui eu, vel nonumy doming latine ut, usu homero contentiones eu. Commodo persius his cu. Mea atqui altera perpetua cu, modus nobis mel an. Idque delectus lobortis an has, per cu ubique facilis singulis, at sanctus patrioque his. No duo ignota assentior, eum atqui mucius ex, ad sale adolescens per. Mei ut dicat soleat hendrerit, et habemus delectus partiendo eam.</p>\r\n', 'Product B', 'Product B', 'Product B', '/vmliwanag/webroot/upload/files/images/products/product-5.jpg', 1, 1, 0, '2017-12-15 05:44:40', '2017-12-15 05:49:40'),
(3, 1, 'Product C', 'Lorem ipsum dolor sit amet', '<p>Lorem ipsum dolor sit amet, per at delenit habemus nusquam, eu mei movet semper tibique. Prompta sanctus contentiones ex nec. Ex sit quodsi convenire incorrupte. Pri ad habeo vocent, ex novum invenire dignissim mea, quo at sumo facete. Solet mentitum pericula usu ut. Liber meliore mel ne, his audire eripuit explicari ut, cu lobortis accommodare sea. Est consulatu forensibus referrentur no.</p>\r\n', 'Product C', 'Product C', 'Product C', '/vmliwanag/webroot/upload/files/images/products/product-4.jpg', 1, 1, 0, '2017-12-15 05:44:59', '2017-12-15 05:49:23'),
(4, 1, 'Product D', 'Sit ad graeco civibus definitiones. Ut sumo aeque voluptatum sed. Eum utinam integre persequeris et. Regione epicuri consectetuer no sit, cu mei meis elaboraret accommodare.', '<p>Sit ad graeco civibus definitiones. Ut sumo aeque voluptatum sed. Eum utinam integre persequeris et. Regione epicuri consectetuer no sit, cu mei meis elaboraret accommodare. Velit ludus tation vel te.</p>\r\n\r\n<p>Sit scripta maiorum liberavisse an, sit albucius probatus ex, ea quo hinc affert. Ex detraxit honestatis duo, mei dicat verear gubergren an, illud platonem theophrastus an vix. Id sed iusto abhorreant eloquentiam, ea esse diceret democritum sea, regione delicata indoctum mei ex. Iusto referrentur mei an, ex per debet philosophia, lucilius contentiones no vim. Veniam tacimates at quo, cu postea dolorem liberavisse usu, ad eos minim dolore nusquam.</p>\r\n', 'Product D', 'Product D', 'Product D', '/vmliwanag/webroot/upload/files/images/products/product-3.jpg', 1, 1, 0, '2017-12-15 05:45:27', '2017-12-15 05:49:07'),
(5, 1, 'Product E', 'Novum similique vix cu, tempor atomorum an vel. In sanctus adolescens pro. Dicam percipit mea id. Platonem incorrupte ne usu.', '<p>Usu alterum volumus fastidii at. Pri vocent eligendi ea, et vel quaeque fuisset, ea cum sumo alienum copiosae. Sit integre concludaturque ei, sale imperdiet usu no. Ad cibo ceteros mei, melius salutandi eum eu. Est at aliquam persecuti definiebas. Appetere pericula cu pro, agam iusto accusamus est cu.</p>\r\n\r\n<p>Novum similique vix cu, tempor atomorum an vel. In sanctus adolescens pro. Dicam percipit mea id. Platonem incorrupte ne usu.</p>\r\n', 'Product E', 'Product E', 'Product E', '/vmliwanag/webroot/upload/files/images/products/product-1.jpg', 1, 1, 0, '2017-12-15 05:45:49', '2017-12-15 05:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `cover_image` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `parent_id`, `lft`, `rght`, `created`, `cover_image`, `modified`) VALUES
(1, 'General', 0, 1, 2, '2017-12-15 05:43:14', '/vmliwanag/webroot/upload/files/images/product%20categories/product-banner.jpg', '2017-12-15 05:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_cover_image` tinyint(1) NOT NULL,
  `sorting` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `is_cover_image`, `sorting`, `created`, `modified`) VALUES
(1, 5, '/vmliwanag/webroot/upload/files/images/products/product-1.jpg', 1, 0, '2017-12-15 05:48:44', '2017-12-15 05:48:48'),
(2, 5, '/vmliwanag/webroot/upload/files/images/products/product-2.jpg', 0, 0, '2017-12-15 05:48:44', '2017-12-15 05:48:44'),
(3, 4, '/vmliwanag/webroot/upload/files/images/products/product-3.jpg', 1, 0, '2017-12-15 05:49:03', '2017-12-15 05:49:07'),
(4, 4, '/vmliwanag/webroot/upload/files/images/products/product-5.jpg', 0, 0, '2017-12-15 05:49:03', '2017-12-15 05:49:03'),
(5, 3, '/vmliwanag/webroot/upload/files/images/products/product-4.jpg', 1, 0, '2017-12-15 05:49:20', '2017-12-15 05:49:23'),
(6, 3, '/vmliwanag/webroot/upload/files/images/products/product-5.jpg', 0, 0, '2017-12-15 05:49:20', '2017-12-15 05:49:20'),
(7, 2, '/vmliwanag/webroot/upload/files/images/products/product-5.jpg', 1, 0, '2017-12-15 05:49:37', '2017-12-15 05:49:40'),
(8, 2, '/vmliwanag/webroot/upload/files/images/products/product-6.jpg', 0, 0, '2017-12-15 05:49:37', '2017-12-15 05:49:37'),
(9, 1, '/vmliwanag/webroot/upload/files/images/products/product-6.jpg', 0, 0, '2017-12-15 05:49:56', '2017-12-15 05:49:56'),
(10, 1, '/vmliwanag/webroot/upload/files/images/products/product-7.jpg', 0, 0, '2017-12-15 05:49:56', '2017-12-15 05:49:56'),
(11, 1, '/vmliwanag/webroot/upload/files/images/products/product-8.jpg', 1, 0, '2017-12-15 05:49:57', '2017-12-15 05:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

DROP TABLE IF EXISTS `slides`;
CREATE TABLE IF NOT EXISTS `slides` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `sorting` int(11) NOT NULL,
  `is_publish` smallint(2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `title`, `caption`, `link`, `image`, `sorting`, `is_publish`, `created`, `modified`) VALUES
(1, 'Slide A', '<p>Sample Caption</p>\r\n', '#', '/vmliwanag/webroot/upload/files/images/slides/banner-1.jpg', 1, 1, '2017-12-15 05:38:49', '2017-12-15 05:38:49'),
(2, 'Slide B', '<p>Sample Caption</p>\r\n', '#', '/vmliwanag/webroot/upload/files/images/slides/banner-1.jpg', 2, 1, '2017-12-15 05:39:05', '2017-12-15 05:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(110) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `group_id` int(11) NOT NULL,
  `reset_code` text COLLATE utf8_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `email`, `username`, `password`, `photo`, `group_id`, `reset_code`, `created`, `modified`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'vm@gmail.com', 'admin', '$2y$10$1gq/wAO44Uu1OE6LsmXc1erpe3JYBI69dL44QaQYak67CkHF6sHJG', '1496085384_579772.jpg', 1, NULL, '2016-01-08 03:01:56', '2017-09-07 13:53:13');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
