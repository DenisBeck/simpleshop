-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 11 2016 г., 20:05
-- Версия сервера: 5.5.50
-- Версия PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `movies`
--

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `releaseyear` int(11) unsigned NOT NULL,
  `price` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `genre`, `country`, `releaseyear`, `price`) VALUES
(1, 'Властелин колец: Братство кольца', 'фэнтези', 'США', 2001, 150),
(2, 'Принц Египта', 'Исторический', 'США', 1998, 100),
(3, 'Собачье сердце', 'Исторический', 'СССР', 1988, 125),
(4, 'Леон', 'Триллер', 'Франция', 1994, 140);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(255) NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `releaseyear` int(11) unsigned NOT NULL,
  `price` int(11) unsigned NOT NULL,
  `quantity` int(11) unsigned NOT NULL,
  `orderid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `datetime` int(11) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf32;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `title`, `genre`, `country`, `releaseyear`, `price`, `quantity`, `orderid`, `datetime`) VALUES
(1, 'Принц Египта', 'Исторический', 'США', 1998, 100, 1, '57d580dff193c', 1473609999),
(2, 'Собачье сердце', 'Исторический', 'СССР', 1988, 125, 1, '57d580dff193c', 1473609999),
(3, 'Властелин колец: Братство кольца', 'фэнтези', 'США', 2001, 150, 1, '57d58110b67ec', 1473610012),
(4, 'Леон', 'Триллер', 'Франция', 1994, 140, 1, '57d58110b67ec', 1473610012),
(5, 'Властелин колец: Братство кольца', 'фэнтези', 'США', 2001, 150, 1, '57d5811e2579c', 1473610034),
(6, 'Принц Египта', 'Исторический', 'США', 1998, 100, 1, '57d5811e2579c', 1473610034),
(7, 'Леон', 'Триллер', 'Франция', 1994, 140, 1, '57d5811e2579c', 1473610034),
(8, 'Властелин колец: Братство кольца', 'фэнтези', 'США', 2001, 150, 1, '57d58133c330c', 1473610058),
(9, 'Принц Египта', 'Исторический', 'США', 1998, 100, 1, '57d58133c330c', 1473610058),
(10, 'Собачье сердце', 'Исторический', 'СССР', 1988, 125, 1, '57d58133c330c', 1473610058),
(11, 'Леон', 'Триллер', 'Франция', 1994, 140, 1, '57d58133c330c', 1473610058);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
