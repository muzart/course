-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 06 2016 г., 12:21
-- Версия сервера: 5.6.24
-- Версия PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `course`
--

-- --------------------------------------------------------

--
-- Структура таблицы `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `begin_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `max_students` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
(4, 9),
(4, 10),
(4, 14),
(4, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `marks`
--

INSERT INTO `marks` (`id`, `course_id`, `user_id`, `mark`) VALUES
(31, 4, 9, 88),
(32, 4, 10, 52),
(33, 4, 14, 74),
(34, 4, 15, 69);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `begin_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `organisations`
--

CREATE TABLE IF NOT EXISTS `organisations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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
-- Структура таблицы `sertificate`
--

CREATE TABLE IF NOT EXISTS `sertificate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sertificate_number` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `given_date` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sertificate`
--

INSERT INTO `sertificate` (`id`, `user_id`, `sertificate_number`, `course_id`, `given_date`) VALUES
(1, 9, '10000009', 4, '31/05/2015'),
(2, 14, '10000014', 4, '31/05/2015'),
(3, 15, '10000015', 4, '31/05/2015');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '/images/nophoto.jpg',
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `surname`, `midname`, `image`, `phone`) VALUES
(1, 'Farruh ', 'Abdullaev ', 'Oktamovich', '/images/4872_teachers.jpg', '+998 90 438 3500'),
(2, 'Bunyod', 'Bobojonov', 'Raximboevich', '/images/3070_teachers.jpg', '+998 90 425 0025'),
(4, 'Rinat', 'Abrarov', 'Dinarovich', '/images/5223_teachers.jpg', '+998 96 255 4758'),
(5, 'Hikmat', 'Raximboyev', '', '/images/1314_teachers.jpg', '+998 93 253 4599');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `midname` varchar(50) NOT NULL,
  `inn` varchar(25) NOT NULL,
  `region_id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT '/images/nophoto.jpg',
  `org_id` int(11) NOT NULL,
  `post` varchar(50) NOT NULL,
  `created` varchar(20) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `activ_hash` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `midname`, `inn`, `region_id`, `address`, `phone`, `image`, `org_id`, `post`, `created`, `login`, `password`, `activ_hash`, `is_active`, `role`) VALUES
(1, 'Navro''z', '', '', '', 1, '', '', '/images/nophoto.jpg', 0, '', '', 'navroz', '202cb962ac59075b964b07152d234b70', '', 0, 'administrator'),
(2, 'Shavkat', 'Sabirov', 'Ibadullaevich', '029483721', 1, '', '', '/images/3932_users.jpg', 3, 'operator', '1432735699', '', '74be16979710d4c4e7c6647856088456', '', 0, ''),
(3, 'Sarvar', 'Shodiyev', 'Nasrullaevich', '029387461', 1, '', '', '/images/nophoto.jpg', 3, 'dispetcher', '1431090842', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(4, 'Kamol', 'Saidov', 'Jabborovich', '73866378', 1, '', '', '/images/nophoto.jpg', 4, 'Ish yurituvchi', '1431110927', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(5, 'Karim', 'Soliyev', 'Ibragimovich', '93746662', 1, '', '', '/images/nophoto.jpg', 3, 'operator', '1431270957', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(6, 'Saidjon', 'Saidov', 'Orifjonovich', '8473879193', 5, '', '', '/images/nophoto.jpg', 2, 'Ish yurituvchi', '1431277140', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(7, 'Irina', 'Shodiyeva', 'Ibragimovna', '937466624', 5, '', '', '/images/7567_users.jpg', 2, 'Ish yurituvchi', '1432211263', '', '74be16979710d4c4e7c6647856088456', '', 0, ''),
(8, 'Kamol', 'Sabirov', 'Jabborovich', '7386637812', 1, '', '', '/images/nophoto.jpg', 3, 'Ish yurituvchi', '1431299169', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(9, 'Fozil', 'Boltayev', 'Odambaevich', '8383837749', 1, '', '', '/images/nophoto.jpg', 1, 'Rais', '1431422368', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(10, 'Jalol', 'Boltayev', 'Adamovich', '38846993123', 1, '', '', '/images/nophoto.jpg', 1, 'Katta mutaxassis', '1432184274', '', '74be16979710d4c4e7c6647856088456', '', 0, ''),
(11, 'Oybek', 'Jabborov', 'Utkirbekovich', '28346236872', 1, '', '', '/images/nophoto.jpg', 5, 'operator', '1432146382', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(12, 'Mansur', 'Alimov', 'Marimovich', '2348237682', 1, '', '', '/images/nophoto.jpg', 5, 'operator', '1432146421', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(13, 'Yashnar', 'Javlonov', 'Jamshidovich', '2387462873', 1, '', '', '/images/nophoto.jpg', 5, 'operator', '1432146454', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(14, 'Jamalov', 'Nozim', 'Rahimovich', '12435465786', 1, '', '', '/images/nophoto.jpg', 1, 'operator', '1432205151', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(15, 'Karima', 'Karimova', 'Karimovna', '5468765645', 1, '', '', '/images/5624_users.jpg', 1, 'buxgalter', '1432210672', '', '74be16979710d4c4e7c6647856088456', '', 0, ''),
(16, 'Sharifa', 'Saidova', 'Polatovna', '45687123546', 5, '', '', '/images/1543_users.jpg', 2, 'Ish yurituvchi', '1432297943', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(17, 'Juan', 'Mata', '', '284192711', 1, '', '', '/images/nophoto.jpg', 4, 'futbolist', '1432982984', '', '74be16979710d4c4e7c6647856088456', '', 0, ''),
(18, 'Marouane', 'Fellaini', '', '23846876', 1, '', '', '/images/nophoto.jpg', 4, 'futbolist', '1432982851', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(19, 'Chris', 'Smalling', '', '465852135', 1, '', '', '/images/nophoto.jpg', 4, 'futbolist', '1432982887', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(20, 'Robin', 'van Persie', '', '132458675', 1, '', '', '/images/nophoto.jpg', 4, 'futbolist', '1432982939', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, ''),
(21, 'Otanazar', 'Bozorov', 'Rahmonovich', '23746283', 1, '', '', '/images/nophoto.jpg', 5, 'dispetcher', '1432983032', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sertificate`
--
ALTER TABLE `sertificate`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `sertificate`
--
ALTER TABLE `sertificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
