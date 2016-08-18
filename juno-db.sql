-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 18, 2016 at 05:02 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `juno`
--

-- --------------------------------------------------------

--
-- Table structure for table `juno_article`
--

CREATE TABLE IF NOT EXISTS `juno_article` (
  `articleId` int(11) NOT NULL AUTO_INCREMENT,
  `articleName` varchar(255) NOT NULL,
  `articleTitle` text NOT NULL,
  `articleContent` text NOT NULL,
  `articleUrl` varchar(255) NOT NULL,
  `metaKeywords` text,
  `metaDescription` text,
  `metaTitle` int(11) DEFAULT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parentArticle` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`articleId`),
  KEY `categoryId` (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `juno_article`
--

INSERT INTO `juno_article` (`articleId`, `articleName`, `articleTitle`, `articleContent`, `articleUrl`, `metaKeywords`, `metaDescription`, `metaTitle`, `dateCreated`, `parentArticle`, `categoryId`) VALUES
(2, 'Superman Two', 'Superman Returns', '<p>He has returned!!!</p>\r\n', 'superman-two', '', '', 0, '2015-12-23 00:49:35', 3, 0),
(3, 'SupermanArticles', 'Superman Article Archive', 'Superman Articles', 'superman-one', NULL, NULL, NULL, '2015-12-23 00:50:48', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `juno_categories`
--

CREATE TABLE IF NOT EXISTS `juno_categories` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(255) NOT NULL,
  `categoryUrl` varchar(255) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `categoryParentUrl` varchar(255) DEFAULT NULL,
  `categoryTitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `juno_categories`
--

INSERT INTO `juno_categories` (`categoryId`, `categoryName`, `categoryUrl`, `parentId`, `categoryParentUrl`, `categoryTitle`) VALUES
(1, 'Comic Books', 'comics', 0, '', 'Comic Books'),
(2, 'Superman', 'superman', 1, 'comics', 'Superman');

-- --------------------------------------------------------

--
-- Table structure for table `juno_contentblock`
--

CREATE TABLE IF NOT EXISTS `juno_contentblock` (
  `blockId` int(11) NOT NULL AUTO_INCREMENT,
  `blockName` varchar(255) NOT NULL,
  `blockTitle` varchar(255) NOT NULL,
  `blockContent` text NOT NULL,
  `blockKey` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`blockId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `juno_contentblock`
--

INSERT INTO `juno_contentblock` (`blockId`, `blockName`, `blockTitle`, `blockContent`, `blockKey`) VALUES
(1, 'Home Page Feature Testimonial', 'Feature Testimonial', '<p>Simply the greatest CMS in the world</p>\r\n', 'testimonial'),
(2, 'Footer Contact Area', 'Footer Contact Area', '<p>Footer Contact Area</p>\r\n', 'contact'),
(3, 'Locations List', 'Locations List', '<p>Locations List</p>\r\n', 'locations');

-- --------------------------------------------------------

--
-- Table structure for table `juno_forms`
--

CREATE TABLE IF NOT EXISTS `juno_forms` (
  `formId` int(11) NOT NULL AUTO_INCREMENT,
  `formName` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`formId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `juno_forms`
--

INSERT INTO `juno_forms` (`formId`, `formName`, `fullName`, `email`, `phone`, `message`) VALUES
(1, 'contact', 'Travis Pronschinske', 'tpronschinske@gmail.com', '7154610381', 'Hello World,\r\n\r\nNeed a form to work');

-- --------------------------------------------------------

--
-- Table structure for table `juno_mainmenu`
--

CREATE TABLE IF NOT EXISTS `juno_mainmenu` (
  `mainMenuId` int(11) NOT NULL AUTO_INCREMENT,
  `mainMenuName` varchar(255) NOT NULL,
  `mainMenuKey` int(11) NOT NULL,
  PRIMARY KEY (`mainMenuId`),
  KEY `menuKeyId` (`mainMenuId`),
  KEY `mainMenuName` (`mainMenuName`),
  KEY `mainMenuName_2` (`mainMenuName`),
  KEY `mainMenuId` (`mainMenuId`),
  KEY `mainMenuId_2` (`mainMenuId`),
  KEY `mainMenuKey` (`mainMenuKey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `juno_mainmenu`
--

INSERT INTO `juno_mainmenu` (`mainMenuId`, `mainMenuName`, `mainMenuKey`) VALUES
(1, 'Main Menu', 1),
(2, 'Footer Menu', 2),
(3, 'Side Menu', 3),
(4, 'Product Menu', 4);

-- --------------------------------------------------------

--
-- Table structure for table `juno_menu`
--

CREATE TABLE IF NOT EXISTS `juno_menu` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuLinkName` varchar(255) NOT NULL,
  `menuLink` varchar(255) NOT NULL,
  `menuLinkTitle` text NOT NULL,
  `menuParent` int(11) NOT NULL,
  `menuSort` int(11) NOT NULL,
  `menuKey` int(11) NOT NULL,
  `childLinks` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `juno_menu`
--

INSERT INTO `juno_menu` (`menuId`, `menuLinkName`, `menuLink`, `menuLinkTitle`, `menuParent`, `menuSort`, `menuKey`, `childLinks`) VALUES
(1, 'Home', '/', 'Home Link Title Tag', 0, 0, 1, 0),
(2, 'About', '/About', 'About Link TiTle Tag', 0, 0, 1, 0),
(3, 'Test', '/test', 'Test Link Title Tag', 0, 0, 1, 1),
(4, 'Contact', '/Contact', 'Link Title Tag', 0, 0, 1, 0),
(5, 'Test Page 2', '/test/test-2', 'Test Page 2', 3, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `juno_pages`
--

CREATE TABLE IF NOT EXISTS `juno_pages` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `pageName` varchar(255) NOT NULL,
  `pageTitle` text NOT NULL,
  `pageUrl` varchar(255) NOT NULL,
  `pageContent` text,
  `metaTitle` text,
  `metaKeywords` text,
  `metaDescription` text,
  `dateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parentPage` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `juno_pages`
--

INSERT INTO `juno_pages` (`pageId`, `pageName`, `pageTitle`, `pageUrl`, `pageContent`, `metaTitle`, `metaKeywords`, `metaDescription`, `dateCreated`, `parentPage`, `categoryId`) VALUES
(1, 'Home', 'Raxus Prime A Star Wars Planet', '', '<p>&nbsp;</p>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 'Raxus Prime A Star Wars Planet', '', 'Did you know this was a star wars planet. well check it out and see the interesting information', '2015-12-23 01:40:01', NULL, 0),
(2, 'About', 'About', 'About', 'About Page Content', NULL, NULL, NULL, '2015-12-23 02:07:13', 0, NULL),
(3, 'Contact', 'Contact Your Star Wars Nut', 'Contact', '<p>Contact page content</p>\r\n', '', '', '', '2015-12-23 02:07:50', NULL, NULL),
(8, 'Contact Thank You', 'Thank You For Your Submission', 'Contact/Thank-You', '<p>Thank you. We will be in touch with you shortly.</p>\r\n', '', '', '', '2015-12-23 04:38:39', 3, NULL),
(26, 'Test Page', 'Test Page Headline', 'test', '<p>This is a test page</p>', '', '', '', '2016-06-28 13:26:39', NULL, 0),
(27, 'Test Page 2', 'Test Page 2 ', 'test/test-2', '<p>test 2</p>\r\n', '', '', '', '2016-07-24 00:34:21', 26, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `juno_settings`
--

CREATE TABLE IF NOT EXISTS `juno_settings` (
  `settingId` int(11) NOT NULL AUTO_INCREMENT,
  `siteTitle` varchar(255) NOT NULL,
  `siteEmail` varchar(255) NOT NULL,
  `sitePhone` varchar(255) NOT NULL,
  `siteAddress` varchar(255) NOT NULL,
  `siteSub` varchar(255) NOT NULL,
  `siteTheme` varchar(255) NOT NULL,
  `adminTheme` varchar(255) NOT NULL,
  `devEmail` varchar(255) NOT NULL,
  PRIMARY KEY (`settingId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `juno_settings`
--

INSERT INTO `juno_settings` (`settingId`, `siteTitle`, `siteEmail`, `sitePhone`, `siteAddress`, `siteSub`, `siteTheme`, `adminTheme`, `devEmail`) VALUES
(1, 'Juno', 'tpronschinske@gmail.com', '7154610381', 'www.raxus.co', '', 'default', 'juno', 'tpronschinske@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `juno_users`
--

CREATE TABLE IF NOT EXISTS `juno_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `datecreated` date NOT NULL,
  `rolelevel` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `juno_users`
--

INSERT INTO `juno_users` (`userId`, `username`, `password`, `datecreated`, `rolelevel`, `status`, `name`, `role`) VALUES
(1, 'admin', '$2y$10$C/86.wNZn8qqsAqxc0XUH..mHlWuH6E.bxJEcCQXkXyrApKnjJIAG', '2015-09-28', 1, 0, 'Administrator', 'Super Admin'),
(3, 'tpronschinske@gmail.com', '$2y$10$C/86.wNZn8qqsAqxc0XUH..mHlWuH6E.bxJEcCQXkXyrApKnjJIAG', '2016-05-27', 1, 1, 'Travis Pronschinske', 'Super Admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
