-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 16 2023 г., 21:57
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `conclusion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `text`, `conclusion`) VALUES
(0, 'Быть в центре внимания и управлять коллективом', '5 6 7 13'),
(1, 'Создавать аппаратные решения различных проблем', '0 2 8'),
(2, 'Изучать общественную жизнь', '4 5 6 7 8 9 10 11 12'),
(3, 'Информатика', '0 2 8'),
(4, 'Менеджмент', '5 6 7 13'),
(5, 'Социология', '6 9 10 11 12');

-- --------------------------------------------------------

--
-- Структура таблицы `conclusion`
--

CREATE TABLE `conclusion` (
  `id` int NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `conclusion`
--

INSERT INTO `conclusion` (`id`, `text`) VALUES
(0, 'Прикладная математика и информатика'),
(1, 'Экология и природопользование'),
(2, 'Прикладная информатика'),
(3, 'Инноватика'),
(4, 'Экономика'),
(5, 'Менеджмент'),
(6, 'Управление персоналом'),
(7, 'Государственное и муниципальное управление'),
(8, 'Бизнес-информатика'),
(9, 'Социология'),
(10, 'Юриспруденция'),
(11, 'Политология'),
(12, 'Реклама и связи с общественностью'),
(13, 'Гостиничное дело');

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int NOT NULL,
  `text` text NOT NULL,
  `type` int NOT NULL,
  `answers` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `text`, `type`, `answers`) VALUES
(0, 'Как хорошо вы дружите с математикой?', 3, '0 2 4 8'),
(1, 'На своей будущей работе скорее всего я бы хотел(а)', 2, '0 1 2'),
(2, 'Хотите ли вы чтоб на вашем направлении подготовки вас обучали информационным наукам?', 0, '0 2'),
(3, 'Интересуют ли вас социальные науки?', 0, ''),
(4, 'Планируете  открыть свое собственное предприятие или быть на руководящей должности в одном из ныне существующих?', 0, '5 6 13'),
(5, 'Как хорошо вы оцениваете свой социальный навык?', 3, '6 7 9 11 12 13'),
(6, 'На сколько сильно по вашему мнению вы интересуетесь тем по каким правилам живет наше общество и государство?', 3, '4 5 6 7 9 10 11 12'),
(7, 'Интересуют ли вас социальные науки?', 0, '5 6 7 9 10 11 12 13'),
(8, 'Вы интересуетесь экономикой?', 0, '4 8'),
(9, 'Какое слово вам нравиться больше?', 1, '3 4 5'),
(10, 'Заботит ли вас ваша окружающая среда?', 0, '1'),
(11, 'Интересует ли вас рекламопроизводство и ее влияние на социум?', 0, '12'),
(12, 'Как сильно вы хотите связать свою будущую работу с менеджментом?', 3, '5 6 7 13'),
(13, 'Как сильно вы хотите быть связаны с бизнес деятельностью?', 3, '5 6 8 13'),
(14, 'Любите ли вы изучать и применять в различных областях свей жизни недавние достижения науки, дизайна и техники?', 0, '0 2 3 12');

-- --------------------------------------------------------

--
-- Структура таблицы `user_data`
--

CREATE TABLE `user_data` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `surname` text NOT NULL,
  `email` text NOT NULL,
  `conclusion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
