-- phpMyAdmin SQL Dump
-- version 3.3.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 02, 2012 at 02:25 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my-heart`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `photo_id`, `src`, `price`, `group_id`) VALUES
(1, '156671327_273187760', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_5ffcf039.jpg', 0, 1),
(2, '156671327_273187761', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_ce5f81ed.jpg', 0, 1),
(3, '156671327_273187765', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_5320b39a.jpg', 0, 1),
(4, '156671327_273187773', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_9de7774e.jpg', 0, 1),
(5, '156671327_273187805', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_2af4ce5b.jpg', 0, 1),
(6, '156671327_273187810', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_e5ec6ed2.jpg', 0, 1),
(7, '156671327_273187817', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_6a4680bc.jpg', 0, 1),
(8, '156671327_273187823', 'http://cs10121.vkontakte.ru/u156671327/148974122/s_63fe2264.jpg', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `message_sent_from` int(10) NOT NULL,
  `message_sent_to` int(10) NOT NULL,
  `image_id` int(11) NOT NULL,
  `message` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_sent_from`, `message_sent_to`, `image_id`, `message`, `status`) VALUES
(1, 5701489, 13085087, 1, 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489', 0),
(2, 5701489, 10241847, 7, 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489', 1),
(3, 5701489, 10241847, 3, 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489', 1);

-- --------------------------------------------------------

--
-- Table structure for table `send`
--

CREATE TABLE IF NOT EXISTS `send` (
  `send_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_text` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `image_id` int(11) NOT NULL,
  `address_first_name` varchar(255) NOT NULL,
  `address_last_name` varchar(255) NOT NULL,
  `address_father_name` varchar(255) NOT NULL,
  `address_country` varchar(255) NOT NULL,
  `address_state` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_house` varchar(255) NOT NULL,
  `address_room` varchar(255) DEFAULT NULL,
  `address_zip` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `send_from` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`send_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `send`
--

INSERT INTO `send` (`send_id`, `message_text`, `created_date`, `image_id`, `address_first_name`, `address_last_name`, `address_father_name`, `address_country`, `address_state`, `address_city`, `address_street`, `address_house`, `address_room`, `address_zip`, `contact_phone`, `send_from`, `color`) VALUES
(2, 'rtgh', '2012-02-02 12:15:09', 3, 'Антон', 'Попов', 'Олексійович', '', '', 'Черкаси', 'Різвдяна', '43', '2', '18000', '', '', 'pink'),
(3, 'asdfdg  dfg', '2012-02-02 12:22:02', 2, 'Антон', 'Попов', 'Олексійович', '', '', 'Черкаси', 'Різвдяна', '43', '2', '18000', '', '', 'pink');
