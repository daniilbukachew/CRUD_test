-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 21 2022 г., 22:28
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `crud_test`
--
CREATE DATABASE IF NOT EXISTS `crud_test` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_test`;

-- --------------------------------------------------------

--
-- Структура таблицы `crud_model`
--

CREATE TABLE `crud_model` (
  `id` int(11) NOT NULL,
  `title` char(40) NOT NULL,
  `url` char(40) NOT NULL,
  `text_field` text NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `crud_model`
--

INSERT INTO `crud_model` (`id`, `title`, `url`, `text_field`, `datetime`) VALUES
(2, 'Заголовок - 2', 'post2', 'текст - 2', '2022-12-21 13:35:20'),
(5, 'заголовок - 3', 'post3', 'текст 3', '2022-12-21 18:29:46'),
(11, 'Заголовок - 6', 'post4', 'текст - 6', '2022-12-21 23:50:51'),
(26, 'Заголовок 10', 'post10', 'Текст1\nТекст1\nТекст1Текст1\nТекст1Текст1Текст1Текст1Текст1Текст1Текст1\n\n\n\nТекст1Текст1\nТекст1Текст1\nТекст1', '2022-12-22 00:00:02');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `crud_model`
--
ALTER TABLE `crud_model`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `crud_model`
--
ALTER TABLE `crud_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
