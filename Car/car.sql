-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 24 2020 г., 19:58
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `car`
--

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name_company` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id_company`, `name_company`, `country`) VALUES
(13, 'BMW', 'Германия'),
(14, 'Mercedes', 'Германия'),
(15, 'Hyundai', 'Корея'),
(16, 'Toyota', 'Япония'),
(17, 'Bentley', 'Великобритания'),
(18, 'Lada', 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `marka`
--

CREATE TABLE `marka` (
  `id_marka` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `name_marka` varchar(100) NOT NULL,
  `charecter` text NOT NULL,
  `year` smallint(4) NOT NULL,
  `URL` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `marka`
--

INSERT INTO `marka` (`id_marka`, `id_company`, `name_marka`, `charecter`, `year`, `URL`) VALUES
(13, 16, 'Crown', 'Мотор 2,5, 178 л.с., гибрид, седан бизнес класса, вариатор, полный привод, кожаный салон', 2016, 'https://a.d-cd.net/506618es-1920.jpg'),
(14, 18, 'Priora', 'Хэтчбэк, 5 посадочных мест, бензиновый двигатель, передний привод, механическая коробка передач', 2014, 'https://4geo.ru/images/personal-pages-share/167199002/gallery/1436362515_orig.jpg'),
(15, 18, 'Priora', 'Седан, 1,6 мотор, 98 л.с., передний привод, механическая коробка передач', 2015, 'https://www.lada-dealer.ru/fotos/about/1404908938_lada_priora_sedan_9.jpg'),
(16, 15, 'i30N', 'Седан, 1,6 мотор, 98 л.с., передний привод, механическая коробка передач', 2019, 'https://images.caricos.com/h/hyundai/2019_hyundai_i30_fastback_n/images/2560x1440/2019_hyundai_i30_fastback_n_4_2560x1440.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`);

--
-- Индексы таблицы `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`id_marka`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `marka`
--
ALTER TABLE `marka`
  MODIFY `id_marka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `marka`
--
ALTER TABLE `marka`
  ADD CONSTRAINT `marka_ibfk_1` FOREIGN KEY (`id_marka`) REFERENCES `company` (`id_company`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
