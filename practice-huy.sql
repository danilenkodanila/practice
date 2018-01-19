-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 19 2018 г., 03:26
-- Версия сервера: 5.7.15
-- Версия PHP: 7.0.10

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

--
-- Дамп данных таблицы `employers_data`
--

INSERT INTO `employers_data` (`id`, `id_user`, `name_company`, `inn`, `address`) VALUES
(1, 24, 'врер', '5466', 'еырыкр6н'),
(2, 26, 'sasi_coop', '777777777777', 'garbage');

-- --------------------------------------------------------

--
-- Структура таблицы `notification`
--

CREATE TABLE `notification` (
  `id` int(21) UNSIGNED NOT NULL,
  `date` datetime NOT NULL,
  `id_vacancy` int(21) UNSIGNED NOT NULL,
  `id_user` int(21) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `notification`
--

INSERT INTO `notification` (`id`, `date`, `id_vacancy`, `id_user`, `status`) VALUES
(15, '2018-01-18 03:01:22', 3, 23, 1),
(16, '2018-01-18 03:01:26', 2, 25, 0);

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

--
-- Дамп данных таблицы `student_data`
--

INSERT INTO `student_data` (`id`, `id_user`, `universityGroup`, `record_book_number`, `name`, `surname`, `patronymic`) VALUES
(1, 23, '35667', '3767', 'Петр', 'Сидоров', 'Петрович'),
(2, 25, 'Д4792', '363446', 'Николай', 'Котиков', 'Сергеевич');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(21) UNSIGNED NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `category` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `telephone`, `category`) VALUES
(23, 'sidor@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', '46463663', 1),
(24, 'пыкыу', '827ccb0eea8a706c4c34a16891f84e7b', '554636', 2),
(25, 'kotik@mail.ru', '827ccb0eea8a706c4c34a16891f84e7b', '89266742984', 3),
(26, 'sasi@ru', '12345', '777', 2);

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
  `id_employers` int(21) UNSIGNED NOT NULL,
  `userAddId` int(21) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vacancies`
--

INSERT INTO `vacancies` (`id`, `title`, `dateStart`, `dateFinish`, `description`, `studentsfor`, `place`, `dateAdd`, `id_employers`, `userAddId`) VALUES
(2, 'дизигнер', '2018-07-24', '2019-07-02', 'соси сука', 'Б(идинахуй)03', 'Добираться долго', '2017-12-23', 1, NULL),
(3, 'Название', '2017-12-14', '2017-12-23', 'Описнание этой хуйни', 'Б(идинахуй)02', 'помойка', '2017-12-30', 1, NULL),
(4, 'название4', '2018-01-05', '2018-01-20', 'нету описания бюля', 'Б(идинахуй)01', 'похуй', '2018-03-23', 1, NULL);

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
  ADD KEY `userAddId` (`userAddId`),
  ADD KEY `id_employers` (`id_employers`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `employers_data`
--
ALTER TABLE `employers_data`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT для таблицы `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `vacancies`
--
ALTER TABLE `vacancies`
  MODIFY `id` int(21) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
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
  ADD CONSTRAINT `vacancies_ibfk_1` FOREIGN KEY (`userAddId`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `vacancies_ibfk_2` FOREIGN KEY (`id_employers`) REFERENCES `employers_data` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
