-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2014-05-28 00:03:07
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ourplace`
--
CREATE DATABASE IF NOT EXISTS `ourplace` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ourplace`;

-- --------------------------------------------------------

--
-- 表的结构 `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `blogs_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`blogs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `blogs`
--

INSERT INTO `blogs` (`blogs_id`, `name`, `title`, `content`, `page_id`) VALUES
(1, 'adfgeqrt', 'qwe1123', 'easgwhergy', 5),
(2, '31425215asdgfaas', 'sdfhyest', 'awrefwaewr', 5),
(3, 'reye56735t', '567y4ey4', 'setdhygw4vb4esat43', 5);

-- --------------------------------------------------------

--
-- 表的结构 `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `page_type` int(2) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_location` varchar(100) NOT NULL,
  `catch_phrase` varchar(255) NOT NULL,
  `place_desc` text NOT NULL,
  `bg_color` varchar(15) DEFAULT 'white',
  `cp_font` varchar(20) NOT NULL DEFAULT 'Arial',
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `place_name` (`place_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `pages`
--

INSERT INTO `pages` (`page_id`, `user_id`, `page_type`, `place_name`, `place_location`, `catch_phrase`, `place_desc`, `bg_color`, `cp_font`) VALUES
(1, 8, 3, 'La trobe Uni', '56 Browning St, Kingsbury, 3083 VIC ', 'Think difference!', 'I love La trobe!\r\nI love La trobe!\r\nI love La trobe!\r\nI love La trobe!\r\nI love La trobe!', 'white', 'Arial'),
(2, 8, 3, 'Monash Uni', '', 'Pay more study less', 'Do not choice Monash \r\nDo not choice Monash \r\nDo not choice Monash \r\nDo not choice Monash ', 'white', 'Verdana'),
(3, 9, 1, 'Reservoir Broadway Steet', 'Broadeay Reservoir 3073 VIC', 'Cheap！ Cheaper！ Cheapest！\r\n', 'Come Come Come Come Come Come\r\nCome Come Come\r\nCome Come Come\r\nCome Come Come\r\nCome Come Come', 'white', 'Arial'),
(4, 10, 2, 'North Land Shopping Center', 'North Land VIC 3022', 'More and More', 'Good Good Good', 'white', 'Arial'),
(5, 8, 1, 'Kingsbury', 'rdfghcjty', '5aertggwzgvert', 'ertqertgerast', 'white', 'Arial'),
(14, 8, 1, 'Melbourne Uni', 'gzert3a', '567zfrwet4', 'Type your place desfhdggfcription', 'white', 'Times New Roman');

-- --------------------------------------------------------

--
-- 表的结构 `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `report_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `reports`
--

INSERT INTO `reports` (`report_id`, `title`, `content`, `user_id`, `user_name`) VALUES
(5, 'dzvezsvssc', 'sdfcawdzscsd', 8, 'qwe123'),
(6, 'dzvezsvssc4563gr', 'faserfaewrwe', 8, 'qwe123'),
(7, '34q5tergaer', 'sdagtaerg', 8, 'qwe123');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(8, 'qwe123', 'c53255317bb11707d0f614696b3ce6f221d0e2f2'),
(9, 'zxc123', 'd5a1bdf9ce989fd6161063e94b92bdeacb94ed23'),
(10, 'asd123', '2891baceeef1652ee698294da0e71ba78a2a4064'),
(15, 'qwe1231234', '315780a9b8c11b5aaf90b57ab652b65064bc7b86'),
(16, 'ugiotu7', 'f8e2d40625bfd3e03d05d417e4d8190bef19c3fe'),
(18, 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
