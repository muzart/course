-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 21 2015 г., 12:34
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `course`
--
CREATE DATABASE IF NOT EXISTS `course` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `course`;

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `login`, `password`, `role`) VALUES
(1, 'Navroz', 'navroz', '202cb962ac59075b964b07152d234b70', 'administrator');

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `begin_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `max_students` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `courses`
--

INSERT INTO `courses` (`id`, `name`, `image`, `description`, `begin_date`, `end_date`, `max_students`, `teacher_id`, `is_active`) VALUES
(1, 'Kompyuter savodxonligi-12', '12.png', 'Ushbu kurs 12 soatlik kompyuter savodxonligini o''z ichiga oladi.', '05/05/2015', '20/05/2015', 40, 1, 1),
(2, 'Kompyuter savodxonligi-24', '24.png', 'Ushbu kurs 24 soatlik kompyuter savodxonligini o''z ichiga oladi.', '05/05/2015', '20/05/2015', 40, 1, 1),
(3, 'Kompyuter savodxonligi-36', '36.jpg', 'Ushbu kurs 36 soatlik kompyuter savodxonligini o''z ichiga oladi.', '15/05/2015', '30/05/2015', 40, 1, 1),
(4, 'Elektron hukumat', 'egov.jpg', 'Ushbu kurs elektron hukumat bo''yicha 24 soat davom qiladi.', '15/05/2015', '30/05/2015', 40, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `courses_users`
--

CREATE TABLE IF NOT EXISTS `courses_users` (
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `courses_users`
--

INSERT INTO `courses_users` (`course_id`, `user_id`) VALUES
(4, 2),
(4, 3),
(4, 5),
(4, 2),
(4, 3),
(4, 5),
(1, 2),
(1, 3),
(1, 5),
(2, 2),
(2, 3),
(2, 5),
(2, 8),
(2, 4),
(3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`id`, `course_id`, `user_id`, `mark`) VALUES
(16, 1, 2, 77),
(17, 1, 3, 88),
(18, 1, 5, 77),
(19, 4, 2, 66),
(20, 4, 3, 82),
(21, 4, 5, 74),
(22, 2, 2, 85),
(23, 2, 3, 55),
(24, 2, 8, 66),
(25, 2, 4, 95),
(26, 2, 5, 84),
(27, 3, 4, 75);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `begin_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `organisations`
--

CREATE TABLE IF NOT EXISTS `organisations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `region_id`) VALUES
(1, '"Kamolot" YoIH', 1),
(2, 'Navoiy viloyati IIB ', 5),
(3, 'Urganch shahar IIB', 1),
(4, 'Statistika boshqarmasi', 1),
(5, 'UrganchKormMash', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `regions`
--

INSERT INTO `regions` (`id`, `name`) VALUES
(1, 'Xorazm viloyati'),
(2, 'Toshkent shahri'),
(3, 'Toshkent viloyati'),
(4, 'Buxoro viloyati'),
(5, 'Navoiy viloyati'),
(6, 'Qoraqalpog''iston Respublikasi'),
(7, 'Qashqadaryo viloyati'),
(8, 'Surxondaryo viloyati'),
(9, 'Sirdaryo viloyati'),
(10, 'Samarqand viloyati'),
(11, 'Andijon viloyati'),
(12, 'Farg''ona viloyati'),
(13, 'Namangan viloyati'),
(14, 'Jizzax viloyati');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `midname`, `image`, `phone`) VALUES
(1, 'Farruh ', 'Abdullaev ', 'Oktamovich', '/images/4872_teachers.jpg', '+998 90 438 3500'),
(2, 'Bunyod', 'Bobojonov', 'Raximboevich', '/images/3070_teachers.jpg', '+998 90 425 0025'),
(4, 'Rinat', 'Abrarov', 'Dinarovich', '/images/5223_teachers.jpg', '+998 96 255 4758');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `inn` varchar(25) NOT NULL,
  `region_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `org_id` int(11) NOT NULL,
  `post` varchar(50) NOT NULL,
  `created` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `activ_hash` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `midname`, `inn`, `region_id`, `address`, `phone`, `image`, `org_id`, `post`, `created`, `login`, `password`, `activ_hash`, `is_active`, `role`) VALUES
(1, 'Navro''z', '', '', '', 1, '', '', '', 1, '', '', 'navroz', '202cb962ac59075b964b07152d234b70', '', 0, 'administrator'),
(2, 'Shavkat', 'Sabirov', 'Ibadullaevich', '029483721', 1, '', '', '', 3, 'operator', '1431090281', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(3, 'Sarvar', 'Shodiyev', 'Nasrullaevich', '029387461', 1, '', '', '', 3, 'dispetcher', '1431090842', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(4, 'Kamol', 'Saidov', 'Jabborovich', '73866378', 1, '', '', '', 4, 'Ish yurituvchi', '1431110927', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(5, 'Karim', 'Soliyev', 'Ibragimovich', '93746662', 1, '', '', '', 3, 'operator', '1431270957', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(6, 'Saidjon', 'Saidov', 'Orifjonovich', '8473879193', 5, '', '', '', 2, 'Ish yurituvchi', '1431277140', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(7, 'Shavkat', 'Shodiyev', 'Ibragimovich', '937466624', 5, '', '', '', 2, 'Ish yurituvchi', '1431277174', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(8, 'Kamol', 'Sabirov', 'Jabborovich', '7386637812', 1, '', '', '', 3, 'Ish yurituvchi', '1431299169', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(9, 'Fozil', 'Boltayev', 'Odambaevich', '8383837749', 1, '', '', '', 1, 'Rais', '1431422368', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(10, 'Jalol', 'Boltayev', 'Adamovich', '38846993123', 1, '', '', '', 1, 'Katta mutaxassis', '1432184274', '', '74be16979710d4c4e7c6647856088456', '', 0, ''),
(11, 'Oybek', 'Jabborov', 'Utkirbekovich', '28346236872', 1, '', '', '', 5, 'operator', '1432146382', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(12, 'Mansur', 'Alimov', 'Marimovich', '2348237682', 1, '', '', '', 5, 'operator', '1432146421', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(13, 'Yashnar', 'Javlonov', 'Jamshidovich', '2387462873', 1, '', '', '', 5, 'operator', '1432146454', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
