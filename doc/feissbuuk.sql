-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2013 at 03:56 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `feissbuuk`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(10) unsigned NOT NULL,
  `deleted` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=203 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `text`, `user_id`, `time`, `post_id`, `deleted`) VALUES
(198, 'jjjj', 1, '2013-06-18 21:16:40', 182, 0),
(199, 'kiiivi', 2, '2013-06-19 13:08:47', 182, 1),
(200, 'nonoh', 1, '2013-06-19 14:26:19', 181, 0),
(201, 'javascript', 1, '2013-06-19 15:50:00', 183, 0),
(202, 'nii', 1, '2013-06-19 15:50:39', 184, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes_com`
--

DROP TABLE IF EXISTS `likes_com`;
CREATE TABLE IF NOT EXISTS `likes_com` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `com_id` int(10) unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `com_id` (`com_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `likes_com`
--

INSERT INTO `likes_com` (`id`, `user_id`, `com_id`, `num`, `deleted`) VALUES
(1, 1, 198, 1, 0),
(2, 1, 199, 1, 0),
(3, 1, 199, 1, 0),
(4, 1, 199, 1, 0),
(5, 1, 201, 1, 0),
(6, 1, 202, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `likes_post`
--

DROP TABLE IF EXISTS `likes_post`;
CREATE TABLE IF NOT EXISTS `likes_post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `num` int(10) unsigned NOT NULL DEFAULT '0',
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `likes_post`
--

INSERT INTO `likes_post` (`id`, `user_id`, `post_id`, `num`, `deleted`) VALUES
(7, 1, 183, 1, 0),
(8, 1, 182, 1, 0),
(10, 1, 181, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `text` text NOT NULL,
  `deleted` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=185 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `user_id`, `text`, `deleted`) VALUES
(179, 1, 'hulp', 0),
(180, 1, 'mh', 0),
(181, 1, 'oih', 0),
(182, 1, 'kkk', 0),
(183, 1, 'PMG', 1),
(184, 1, 'uus', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `deleted`) VALUES
(1, 'demo', 'demo', 0),
(2, 'demo2', 'demo2', 0),
(3, 'demo3', 'demo3', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes_com`
--
ALTER TABLE `likes_com`
  ADD CONSTRAINT `likes_com_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `likes_com_ibfk_2` FOREIGN KEY (`com_id`) REFERENCES `comment` (`comment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes_post`
--
ALTER TABLE `likes_post`
  ADD CONSTRAINT `likes_post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `likes_post_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`post_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
