-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 14 2017 г., 21:50
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_task`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countries`
--

CREATE TABLE `countries` (
  `id` int(4) NOT NULL,
  `country` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(2, 'Australia'),
(3, 'Canada'),
(5, 'Finland'),
(4, 'Germany'),
(1, 'Ukraine');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `login` varchar(15) NOT NULL,
  `real_name` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `birth_date` date NOT NULL,
  `id_country` int(10) NOT NULL,
  `user_registration` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `real_name`, `password`, `birth_date`, `id_country`, `user_registration`) VALUES
(1, 'admin@admin.com', 'admin', 'Admin Admin', '21232f297a57a5a743894a0e4a801fc3', '2017-03-11', 1, '2017-03-13 14:20:34.548000'),
(15, 'ghjgh@ghgh.yu', 'hjhgj', 'ghjgh', 'c4ca4238a0b923820dcc509a6f75849b', '2017-03-10', 3, '2017-03-13 21:32:55.087300'),
(16, 'jgh@fgfd.hj', 'ghfc', 'fgfg', 'd41d8cd98f00b204e9800998ecf8427e', '2017-03-11', 5, '2017-03-13 21:41:52.981300'),
(18, 'user@user.user', 'user', 'Username', 'ee11cbb19052e40b07aac0ca060c23ee', '2017-02-09', 4, '2017-03-13 22:00:16.080700');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `country` (`country`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
