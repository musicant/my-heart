-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 04 2012 г., 11:16
-- Версия сервера: 5.5.8
-- Версия PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `my-heart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `group_id` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`image_id`, `photo_id`, `title`, `src`, `price`, `group_id`) VALUES
(1, '156671327_273187760', '', '1.jpg', 10, 1),
(16, '', '', '03.jpg', 10, 1),
(2, '156671327_273187761', '', '2.jpg', 10, 1),
(15, '', '', '02.jpg', 10, 1),
(3, '156671327_273187765', '', '3.jpg', 10, 1),
(14, '', '', '01.jpg', 10, 1),
(4, '156671327_273187773', '', '4.jpg', 10, 1),
(13, '', '', '13.jpg', 10, 1),
(5, '156671327_273187805', '', '5.jpg', 10, 1),
(12, '', '', '12.jpg', 10, 1),
(6, '156671327_273187810', '', '6.jpg', 10, 1),
(11, '', '', '11.jpg', 10, 1),
(7, '156671327_273187817', '', '7.jpg', 10, 1),
(10, '', '', '10.jpg', 0, 1),
(8, '156671327_273187823', '', '8.jpg', 10, 1),
(9, '', '', '9.jpg', 10, 1),
(17, '', '', '04.jpg', 10, 1),
(18, '', '', '05.jpg', 10, 1),
(19, '', '9х5,5', '9х5,55_lida.jpg', 8, 2),
(20, '', '9х5,5', '9х5,552_lida .jpg', 8, 2),
(21, '', '15х15', '15х1520_lida.JPG', 25, 2),
(22, '', '20х10', '20х10 204_lida.jpg', 25, 2),
(23, '', '20х10', '20х10201_lida.jpg', 2525, 1),
(24, '', '20х10', '20х10202_lida .jpg', 25, 2),
(25, '', '20х10', '20х10203_lida .jpg', 25, 2),
(26, '', '10х15', '10х1535_al.JPG', 40, 2),
(27, '', '10 х 15', '10 х 1540_al.jpg', 45, 2),
(28, '', '12х8', '12х840_lena.jpg', 45, 2),
(29, '', '20х12', '20х1250_lena.jpg', 55, 2),
(30, '', '15х8', '15х840_lena.jpg', 45, 2),
(31, '', '12х10', '12х1040_lida.jpg', 45, 2),
(32, '', '21х8', '21х850_lena.jpg', 55, 2),
(33, '', '21х15', '21х1540_lena .jpg', 45, 2),
(34, '', '21х15', '21х15402_lena.jpg', 45, 2),
(35, '', '15х15', '15х15402_lida.jpg', 45, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
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
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `message_sent_from`, `message_sent_to`, `image_id`, `message`, `status`) VALUES
(1, 5701489, 13085087, 1, 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489', 0),
(2, 5701489, 10241847, 7, 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489', 1),
(3, 5701489, 10241847, 3, 'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `send`
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
  `price` varchar(5) NOT NULL,
  `send_from` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `date_pay` varchar(255) NOT NULL,
  PRIMARY KEY (`send_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `send`
--

INSERT INTO `send` (`send_id`, `message_text`, `created_date`, `image_id`, `address_first_name`, `address_last_name`, `address_father_name`, `address_country`, `address_state`, `address_city`, `address_street`, `address_house`, `address_room`, `address_zip`, `contact_phone`, `price`, `send_from`, `author`, `color`, `status`, `date_pay`) VALUES
(2, 'rtgh', '2012-02-02 12:15:09', 3, 'Антон', 'Попов', 'Олексійович', '', '', 'Черкаси', 'Різвдяна', '43', '2', '18000', '', '', '', '', 'pink', 0, ''),
(3, 'asdfdg  dfg', '2012-02-02 12:22:02', 2, 'Антон', 'Попов', 'Олексійович', '', '', 'Черкаси', 'Різвдяна', '43', '2', '18000', '', '', '', '', 'pink', 0, ''),
(4, 'dfg', '2012-02-03 22:12:55', 2, 'sdfsdf', 'dsfg', 'd', '', '', 'Черкаси', 'asdf', 'asFDV', 'asdf', '', '', '', '6134519', 'Аноним', 'pink', 1, 'efg'),
(5, '\r\nll', '2012-02-04 07:45:53', 6, 'asdf', 'asdf', 'd', '', '', 'Черкаси', 'asdf', 'ad', 'asdf', '', '', '', '6134519', 'Аноним', 'red', 0, ''),
(6, '\r\nll', '2012-02-04 07:49:24', 6, 'asdf', 'asdf', 'd', '', '', 'Черкаси', 'asdf', 'ad', 'asdf', '', '', '', '6134519', 'Аноним', 'red', 0, '');
