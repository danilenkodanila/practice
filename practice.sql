-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 12 2017 г., 05:03
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blocked_users`
--

CREATE TABLE `blocked_users` (
  `id_user` int(21) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `employers_data`
--

CREATE TABLE `employers_data` (
  `id` int(21) UNSIGNED NOT NULL,
  `id_user` int(21) UNSIGNED NOT NULL,
  `name_company` varchar(255) DEFAULT NULL,
  `inn` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `notification`
--

CREATE TABLE `notification` (
  `id` int(21) UNSIGNED NOT NULL,
  `id_user` int(21) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `id_vacancy` int(21) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `student_data`
--

CREATE TABLE `student_data` (
  `id` int(21) UNSIGNED NOT NULL,
  `id_user` int(21) UNSIGNED NOT NULL,
  `universityGroup` varchar(6) DEFAULT NULL,
  `record_book_number` varchar(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `patronymic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(21) UNSIGNED NOT NULL,
  `e-mail` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `category` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `e-mail`, `password`, `telephone`, `category`) VALUES
(1, 'tralala@mail.ru', '1234', '89141840114', 0),
(3, 'tvchd@mail.ru', '999', '57377433437', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `vacancies`
--

CREATE TABLE `vacancies` (
  `id` int(21) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `dateStart` date NOT NULL,
  `dateFinish` date NOT NULL,
  `description` text,
  `studentsfor` text,
  `place` varchar(255) DEFAULT NULL,
  `dateAdd` date NOT NULL,
  `userAddId` int(21) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `title`, `dateStart`, `dateFinish`, `description`, `studentsfor`, `place`, `dateAdd`, `userAddId`) VALUES
(2, 'дизигнер', '2018-07-24', '2019-07-02', 'Описание вакансии', 'золотые руки', 'Добираться долго', '2017-12-23', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `employers_data`
--
ALTER TABLE `employers_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_vacancy` (`id_vacancy`);

--
-- Индексы таблицы `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userAddId` (`userAddId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employers_data`
--
ALTER TABLE `employers_data`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blocked_users`
--
ALTER TABLE `blocked_users`
  ADD CONSTRAINT `blocked_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `employers_data`
--
ALTER TABLE `employers_data`
  ADD CONSTRAINT `employers_data_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `notification_ibfk_2` FOREIGN KEY (`id_vacancy`) REFERENCES `vacancies` (`id`);

--
-- Ограничения внешнего ключа таблицы `student_data`
--
ALTER TABLE `student_data`
  ADD CONSTRAINT `student_data_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `vacancies`
--
ALTER TABLE `vacancies`
  ADD CONSTRAINT `vacancies_ibfk_1` FOREIGN KEY (`userAddId`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
