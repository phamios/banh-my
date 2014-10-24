-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2014 at 04:22 PM
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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2014-10-24 12:35:10');

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
-- Table structure for table `bm_category`
--

CREATE TABLE IF NOT EXISTS `bm_category` (
`id` int(11) unsigned NOT NULL,
  `cate_name` varchar(255) NOT NULL,
  `cate_root` int(11) NOT NULL DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '0',
  `cate_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `bm_category`
--

INSERT INTO `bm_category` (`id`, `cate_name`, `cate_root`, `active`, `cate_image`) VALUES
(3, 'aaa', 0, 0, 'mzl.oadwybkh_.75x75-65_.jpg'),
(4, '123123', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bm_location`
--

CREATE TABLE IF NOT EXISTS `bm_location` (
`id` int(11) unsigned NOT NULL,
  `location_name` varchar(255) NOT NULL,
  `location_root` int(11) unsigned DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Indexes for table `bm_category`
--
ALTER TABLE `bm_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_location`
--
ALTER TABLE `bm_location`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bm_search`
--
ALTER TABLE `bm_search`
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
-- AUTO_INCREMENT for table `bm_category`
--
ALTER TABLE `bm_category`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `bm_location`
--
ALTER TABLE `bm_location`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bm_search`
--
ALTER TABLE `bm_search`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `bm_user`
--
ALTER TABLE `bm_user`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
