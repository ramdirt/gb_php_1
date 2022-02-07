-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 02 2022 г., 18:05
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_gallery`
--

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `filesize` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `filename`, `rating`, `filesize`) VALUES
(255, '01.jpg', 0, 111456),
(256, '02.jpg', 0, 70076),
(257, '03.jpg', 0, 70215),
(258, '04.jpg', 0, 61733),
(259, '05.jpg', 0, 160617),
(260, '06.jpg', 0, 89871),
(261, '07.jpg', 0, 99418),
(262, '08.jpg', 0, 103775),
(263, '09.jpg', 0, 81022),
(264, '10.jpg', 0, 97127),
(265, '11.jpg', 0, 98579),
(266, '12.jpg', 0, 139286),
(267, '13.jpg', 0, 113016),
(268, '14.jpg', 0, 151814),
(269, '15.jpg', 0, 112488),
(270, '17jl-ZrKs5U.jpg', 4, 60600),
(271, '1zWR96tCJyM.jpg', 17, 77475),
(272, 'UJAzlKw8N9I.jpg', 7, 148546);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `filename` (`filename`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
