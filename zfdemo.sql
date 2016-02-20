-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 23 2013 г., 22:51
-- Версия сервера: 5.5.27
-- Версия PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `zfdemo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_polych` int(11) NOT NULL,
  `text` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `id_user`, `id_polych`, `text`, `data`) VALUES
(2, 3, 1, 'rerw', '2013-07-22 18:03:22'),
(3, 2, 3, 'dweqe', '2013-07-22 18:09:25'),
(4, 1, 3, 'ewewe', '2013-07-22 18:09:38'),
(5, 3, 2, 'eqeq', '2013-07-22 18:09:49'),
(17, 1, 11, 'sdad', '2013-07-23 15:15:07'),
(19, 1, 1, 'wew', '2013-07-23 15:25:53'),
(20, 1, 1, 'wew', '2013-07-23 19:52:12');

-- --------------------------------------------------------

--
-- Структура таблицы `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `statys` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `polychatel` int(11) NOT NULL,
  `otpravitel` int(11) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=88 ;

--
-- Дамп данных таблицы `mails`
--

INSERT INTO `mails` (`id`, `text`, `statys`, `title`, `polychatel`, `otpravitel`, `data`) VALUES
(1, 'кукук', 0, 'цуйцу', 1, 2, '2013-07-21 16:09:18'),
(2, '121кенек', 0, 'ывфы', 1, 2, '2013-07-21 17:30:55'),
(4, 'аываы', 0, 'тема', 2, 1, '2013-07-21 16:07:47'),
(72, 'rerwr', 1, 'qwewqeqwe', 2, 3, '2013-07-21 18:05:26'),
(85, 'ÐºÐ¾Ð´', 1, '?????', 2, 1, '2013-07-23 20:12:32'),
(86, 'Ñ‹Ð²Ñ‹Ð²Ñ‹', 1, '?????', 2, 1, '2013-07-23 20:13:05'),
(87, 'Ð²Ð°Ð²Ð°Ð²', 1, 'Ð°Ð²Ð°Ð²', 1, 1, '2013-07-23 20:20:25');

-- --------------------------------------------------------

--
-- Структура таблицы `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `director` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `movies`
--

INSERT INTO `movies` (`id`, `director`, `title`) VALUES
(7, 'a', 'a'),
(8, '2323', '23232'),
(9, 'qsss', '42'),
(10, 'Ñ€Ð¸', '23232'),
(11, '222', '333333333333'),
(12, 'director', 'title');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `data_bith` text NOT NULL,
  `citi` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `image`, `name`, `data_bith`, `citi`) VALUES
(1, 'admin', 'admin', 'admin', 'http://mails.local/img/users/admin.jpg', 'Vlad', '21-2-2000', 'samara'),
(2, 'user1', 'admin', 'admin', 'http://mails.local/img/users/user1.jpg', 'Alex', '23-3-1234', 'samara'),
(3, 'user2', 'admin', 'admin', 'http://mails.local/img/users/user1.jpg', 'Ivan', '3-4-2345', 'samara');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
