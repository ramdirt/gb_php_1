-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Фев 07 2022 г., 16:52
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
-- База данных: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `text` text DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `name`, `text`, `date`) VALUES
(1, 1, 'Алексей 2', 'Отличный товар', '2022-02-06'),
(15, 3, 'Иван', 'Гуд', '2022-02-04'),
(23, 4, 'Алексей 2', 'Отличный товар', '2022-02-06'),
(45, 1, 'Алексей 3', 'Отличный товар', '2022-02-07'),
(46, 1, 'Алексей 33234', 'Отличный товар', '2022-02-07'),
(47, 1, 'Алексей 3323423423wefwe', 'Отличный товар', '2022-02-07'),
(52, 2, 'Алексей 4', 'Отличный товар', '2022-02-07'),
(53, 2, 'Алексей 4', 'Отличный товар', '2022-02-07'),
(54, 2, 'Алексей 4', 'Отличный товар', '2022-02-07');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(300) DEFAULT NULL,
  `price` int(6) DEFAULT NULL,
  `img` text DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `img`, `description`) VALUES
(1, 'Покрышка 1', 60, '1.jpg', NULL),
(2, 'Покрышка 2', 70, '2.jpg', 'Описание 2'),
(3, 'Покрышка 3', 80, '3.jpg', 'Описание'),
(4, 'Покрышка 4', 80, '4.jpg', NULL),
(5, 'Покрышка 5', 90, '5.jpg', 'Описание'),
(6, 'Покрышка 6', 90, '6.jpg', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
