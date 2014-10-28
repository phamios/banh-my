-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2014 at 06:56 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banh-my`
--

-- --------------------------------------------------------

--
-- Table structure for table `bm_admin`
--

CREATE TABLE IF NOT EXISTS `bm_admin` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `datelogin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bm_admin`
--

INSERT INTO `bm_admin` (`id`, `username`, `password`, `datelogin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2014-10-28 04:52:10');

-- --------------------------------------------------------

--
-- Table structure for table `bm_balance_history`
--

CREATE TABLE IF NOT EXISTS `bm_balance_history` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `balacing` int(11) DEFAULT NULL,
  `deposit` int(11) DEFAULT NULL,
  `createdate` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `changetype` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bm_catecontent`
--

CREATE TABLE IF NOT EXISTS `bm_catecontent` (
`id` int(11) unsigned NOT NULL,
  `cateid` int(11) DEFAULT NULL,
  `contentid` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `bm_catecontent`
--

INSERT INTO `bm_catecontent` (`id`, `cateid`, `contentid`) VALUES
(1, 11, 2),
(2, 9, 2),
(3, 7, 2),
(4, 5, 2),
(5, 11, 3),
(6, 8, 3),
(7, 6, 3),
(8, 10, 8),
(9, 7, 8),
(10, 5, 8),
(11, 9, 9),
(12, 6, 9),
(13, 9, 10),
(14, 6, 10),
(15, 5, 10),
(16, 10, 11),
(17, 7, 11),
(18, 5, 11),
(19, 11, 12),
(20, 7, 12),
(21, 5, 12),
(22, 10, 13),
(23, 8, 13),
(24, 6, 13),
(25, 10, 14);

-- --------------------------------------------------------

--
-- Table structure for table `bm_category`
--

CREATE TABLE IF NOT EXISTS `bm_category` (
`id` int(11) unsigned NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_root` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cate_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bm_category`
--

INSERT INTO `bm_category` (`id`, `cate_name`, `cate_root`, `active`, `cate_image`) VALUES
(5, 'BlowJob', 0, 1, NULL),
(6, 'Dọn WC ', 0, 1, NULL),
(7, 'Chơi lỗ nhị ', 0, 1, NULL),
(8, 'Chơi Some', 0, 1, NULL),
(9, 'Đập đá ', 0, 1, NULL),
(10, 'Đi Tours ', 0, 1, NULL),
(11, 'Cặp bồ', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bm_config`
--

CREATE TABLE IF NOT EXISTS `bm_config` (
`id` int(11) unsigned NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_meta` text,
  `site_description` text,
  `site_footer` text,
  `site_url` varchar(255) DEFAULT NULL,
  `site_mode` int(11) DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bm_config`
--

INSERT INTO `bm_config` (`id`, `site_name`, `site_meta`, `site_description`, `site_footer`, `site_url`, `site_mode`, `site_logo`) VALUES
(1, 'Banh My', 'banh my, banh my ba te, hang xom, co hang xom, chu kim, co giao thao', 'site chuyen ve gioi tinh', 'Copyright by Banhmydd', 'localhost', 0, 'mzl.oadwybkh_.75x75-65_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bm_content`
--

CREATE TABLE IF NOT EXISTS `bm_content` (
`id` int(11) unsigned NOT NULL,
  `localid` int(11) DEFAULT NULL,
  `typeid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `gallery_id` int(11) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `datecreated` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `review` int(11) DEFAULT NULL,
  `view` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `bm_content`
--

INSERT INTO `bm_content` (`id`, `localid`, `typeid`, `userid`, `title`, `content`, `gallery_id`, `images`, `cost`, `datecreated`, `status`, `review`, `view`) VALUES
(8, 5, 6, 1, 'Test 1', '<p>&nbsp;Test 1</p>', NULL, 'gumball-y-amigos-marcas-gumball-pintado-por-wizael-9741754.jpg', 50000, '2014-10-27 06:03:10', 1, 9, NULL),
(9, 4, 5, 1, 'Test 2', '<p>Test 2</p>', NULL, 'S02E36_-_Gumball_and_Darwin_disgusted.png', 50000, '2014-10-27 06:25:10', 1, 9, NULL),
(10, 8, 6, 1, 'asdas', '<p>dasd</p>', NULL, 'mzl.stfmlnkc_.512x512-75_.jpg', 90000, '2014-10-27 08:01:10', 1, 10, NULL),
(11, 5, 7, 1, 'dasdas', '<p>dasd</p>', NULL, 'S02E36_-_Gumball_and_Darwin_disgusted1.png', 900000, '2014-10-27 08:20:10', 1, 9, NULL),
(12, 4, 6, 1, 'adsasd', '<p>asdasd</p>', NULL, 'S02E36_-_Gumball_and_Darwin_disgusted2.png', 34444, '2014-10-27 08:54:10', 1, 9, NULL),
(13, 6, 5, 1, 'ss', '<p>sss</p>', NULL, '1600x900_homer-simpson-the-simpsons-cartoon-movies-HD-Wallpaper.jpg', 900000, '2014-10-27 09:28:10', 1, 9, NULL),
(14, 4, 6, 1, 'asd', '<p>adsd</p>', NULL, 'unnamed.png', 900000, '2014-10-27 09:48:10', 1, 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bm_gallery`
--

CREATE TABLE IF NOT EXISTS `bm_gallery` (
`id` int(11) unsigned NOT NULL,
  `contentid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `images_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `bm_gallery`
--

INSERT INTO `bm_gallery` (`id`, `contentid`, `userid`, `images_link`) VALUES
(1, 9, 1, 'incredible_water_painting_by_milanvopalensky-d5osj9t.jpg'),
(2, 9, 1, 'littlelion_by_tiefenschaerfe-d7yrv1e.jpg'),
(3, 9, 1, 'tales_of_north_by_nina_y-d7ys0il.jpg'),
(4, 9, 1, 'water_of_life_by_lemonsandsparrows-d7ys24g.jpg'),
(5, 9, 1, 'windows photo viewer wallpaper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bm_location`
--

CREATE TABLE IF NOT EXISTS `bm_location` (
`id` int(11) unsigned NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_root` int(11) unsigned DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bm_location`
--

INSERT INTO `bm_location` (`id`, `location_name`, `location_root`, `active`) VALUES
(2, 'Hà Nội', 0, 1),
(3, 'Sài Gòn', 0, 1),
(4, 'Nguyễn Khánh Toán ', 2, 1),
(5, 'Trần Khánh Dư ', 2, 1),
(6, 'Lò Đúc', 2, 1),
(7, 'Quốc lộ 8-3', 3, 1),
(8, 'Chợ nhà bè ', 3, 0),
(9, 'Hoàng đạo thuý ', 2, 1),
(10, 'kim liên mới ', 2, 1),
(11, 'hàng bè ', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bm_message`
--

CREATE TABLE IF NOT EXISTS `bm_message` (
`id` int(11) unsigned NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `mess_title` varchar(255) DEFAULT NULL,
  `mess_content` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bm_payment`
--

CREATE TABLE IF NOT EXISTS `bm_payment` (
`id` int(11) unsigned NOT NULL,
  `payment_name` varchar(255) DEFAULT NULL,
  `payment_enable` int(11) DEFAULT NULL,
  `payment_logo` varchar(255) DEFAULT NULL,
  `payment_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bm_payment`
--

INSERT INTO `bm_payment` (`id`, `payment_name`, `payment_enable`, `payment_logo`, `payment_email`) VALUES
(1, 'Ngân Lượng', 1, NULL, 'louisg64@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bm_search`
--

CREATE TABLE IF NOT EXISTS `bm_search` (
`id` int(11) unsigned NOT NULL,
  `keyword` varchar(255) DEFAULT NULL,
  `count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bm_type`
--

CREATE TABLE IF NOT EXISTS `bm_type` (
`id` int(11) unsigned NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `bm_type`
--

INSERT INTO `bm_type` (`id`, `type_name`) VALUES
(5, 'Bình dân'),
(6, 'Cao cấp'),
(7, 'Trung lưu');

-- --------------------------------------------------------

--
-- Table structure for table `bm_user`
--

CREATE TABLE IF NOT EXISTS `bm_user` (
`id` int(11) unsigned NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `active` int(11) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0',
  `createdate` varchar(50) DEFAULT NULL,
  `balancing` int(11) DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bm_user`
--

INSERT INTO `bm_user` (`id`, `username`, `password`, `active`, `usertype`, `createdate`, `balancing`) VALUES
(1, 'admin@localhost.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 1, '2014-10-28 10:53:10', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bm_admin`
--
ALTER TABLE `bm_admin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_balance_history`
--
ALTER TABLE `bm_balance_history`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_catecontent`
--
ALTER TABLE `bm_catecontent`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_category`
--
ALTER TABLE `bm_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_config`
--
ALTER TABLE `bm_config`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_content`
--
ALTER TABLE `bm_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_gallery`
--
ALTER TABLE `bm_gallery`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_location`
--
ALTER TABLE `bm_location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_message`
--
ALTER TABLE `bm_message`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_payment`
--
ALTER TABLE `bm_payment`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_search`
--
ALTER TABLE `bm_search`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_type`
--
ALTER TABLE `bm_type`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_user`
--
ALTER TABLE `bm_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bm_admin`
--
ALTER TABLE `bm_admin`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bm_catecontent`
--
ALTER TABLE `bm_catecontent`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `bm_category`
--
ALTER TABLE `bm_category`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bm_config`
--
ALTER TABLE `bm_config`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bm_content`
--
ALTER TABLE `bm_content`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `bm_gallery`
--
ALTER TABLE `bm_gallery`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bm_location`
--
ALTER TABLE `bm_location`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bm_message`
--
ALTER TABLE `bm_message`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bm_payment`
--
ALTER TABLE `bm_payment`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bm_search`
--
ALTER TABLE `bm_search`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bm_type`
--
ALTER TABLE `bm_type`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bm_user`
--
ALTER TABLE `bm_user`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
