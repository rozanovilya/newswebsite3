-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 20 2017 г., 18:04
-- Версия сервера: 5.5.53
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Newswebsite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Comments`
--

CREATE TABLE `Comments` (
  `CommentId` int(11) NOT NULL,
  `NewsId` int(11) NOT NULL,
  `CommentDate` date NOT NULL,
  `CommentAuthorId` int(11) NOT NULL,
  `CommentText` text NOT NULL,
  `Moderated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `NewsId` int(11) NOT NULL,
  `NewsDate` date NOT NULL,
  `NewsRubric` int(11) NOT NULL,
  `SeoH1` text NOT NULL,
  `SeoTitle` text NOT NULL,
  `SeoDescription` text NOT NULL,
  `PreviewPhoto` text NOT NULL,
  `NewsText` text NOT NULL,
  `NewsSource` text NOT NULL,
  `NewsAuthorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE `rubrics` (
  `RubricId` int(11) NOT NULL,
  `RubricName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `UserId` int(11) NOT NULL,
  `UserName` text NOT NULL,
  `PasswordHash` text NOT NULL,
  `Administrator` tinyint(1) NOT NULL,
  `Journalist` tinyint(1) NOT NULL,
  `Editor` tinyint(1) NOT NULL,
  `Moderator` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`CommentId`),
  ADD KEY `NewsId` (`NewsId`),
  ADD KEY `CommentAuthorId` (`CommentAuthorId`);

--
-- Индексы таблицы `News`
--
ALTER TABLE `News`
  ADD PRIMARY KEY (`NewsId`),
  ADD KEY `NewsRubric` (`NewsRubric`);

--
-- Индексы таблицы `rubrics`
--
ALTER TABLE `rubrics`
  ADD PRIMARY KEY (`RubricId`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Comments`
--
ALTER TABLE `Comments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `NewsId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `RubricId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`NewsId`) REFERENCES `News` (`NewsId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`CommentAuthorId`) REFERENCES `Users` (`UserId`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `News`
--
ALTER TABLE `News`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`NewsId`) REFERENCES `Comments` (`NewsId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`NewsRubric`) REFERENCES `Rublics` (`RubricId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
