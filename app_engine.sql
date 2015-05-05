-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 26, 2012 at 04:50 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_engine`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last_login` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--


-- --------------------------------------------------------

--
-- Table structure for table `configurations`
--

CREATE TABLE IF NOT EXISTS `configurations` (
  `key` varchar(50) NOT NULL,
  `value` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configurations`
--


-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `name` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `default` smallint(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--


-- --------------------------------------------------------

--
-- Table structure for table `layouts`
--

CREATE TABLE IF NOT EXISTS `layouts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `link_id` bigint(20) NOT NULL,
  `layouts` mediumtext NOT NULL,
  `template_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `layouts`
--

INSERT INTO `layouts` (`id`, `link_id`, `layouts`, `template_id`) VALUES
(1, 1, '<Modules>\r\n	<module name="top_nav"  container="header" />\r\n	<module name="login" container="left" />		\r\n	<module name="forgot_pass" container="right" />				\r\n</Modules>\r\n', 1),
(10, 9, '<Modules>\r\n	<module name="top_nav"  container="header" />\r\n	<module name="swi_reg_mdl" container="left" />		\r\n	<module name="forgot_pass" container="right" />				\r\n</Modules>\r\n', 0),
(9, 8, '<Modules>\r\n	<module name="top_nav"  container="header" />\r\n	<module name="swi_reg_mdl" container="left" />		\r\n	<module name="forgot_pass" container="right" />				\r\n</Modules>\r\n', 0),
(7, 7, '<Modules>\r\n	<module name="top_nav"  container="header" />\r\n	<module name="login" container="left" />		\r\n	<module name="forgot_pass" container="right" />				\r\n</Modules>\r\n', 0),
(11, 10, '<Modules>\r\n			\r\n	<module name="archive" container="left" />				\r\n<module name="categories" container="left" />\r\n<module name="license" container="right" />\r\n<module name="article" container="right" />\r\n</Modules>\r\n', 0);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE IF NOT EXISTS `links` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `route` varchar(255) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `name`, `title`, `uri`, `route`, `parent_id`) VALUES
(10, 'Index', 'Home Page', '', 'system', 0);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `sys_name` varchar(255) NOT NULL,
  `active` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `folder_name`, `sys_name`, `active`) VALUES
(15, 'categories', 'categories', 'categories', 1),
(16, 'archive', 'archive', 'archive', 1),
(17, 'license', 'license', 'license', 1),
(18, 'article', 'article', 'article', 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `css` varchar(255) NOT NULL,
  `js` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `default` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `name`, `folder_name`, `css`, `js`, `image_path`, `default`) VALUES
(4, 'RisingSun', 'RisingSun', 'css/style.css', 'js/action.js', 'images', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
