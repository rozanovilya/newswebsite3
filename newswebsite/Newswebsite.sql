-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 16 2017 г., 10:00
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

--
-- Дамп данных таблицы `Comments`
--

INSERT INTO `Comments` (`CommentId`, `NewsId`, `CommentDate`, `CommentAuthorId`, `CommentText`, `Moderated`) VALUES
(1, 1, '2017-04-02', 0, 'Интересная новость. Автор прав', 1),
(2, 1, '2017-04-01', 0, 'Очень содержательный комментарий', 1),
(3, 1, '0000-00-00', 0, 'jjjjj', 1),
(4, 1, '0000-00-00', 0, 'tttttttttttt', 1),
(5, 1, '0000-00-00', 0, 'fdafd', 1),
(6, 1, '0000-00-00', 0, 'fdafd', 1),
(7, 1, '0000-00-00', 0, '', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `News`
--

CREATE TABLE `News` (
  `NewsId` int(11) NOT NULL,
  `NewsDate` date DEFAULT NULL,
  `NewsRubric` int(11) DEFAULT NULL,
  `SeoH1` text,
  `SeoTitle` text,
  `SeoDescription` text,
  `PreviewPhoto` text,
  `NewsText` text,
  `NewsSource` text,
  `NewsAuthorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `News`
--

INSERT INTO `News` (`NewsId`, `NewsDate`, `NewsRubric`, `SeoH1`, `SeoTitle`, `SeoDescription`, `PreviewPhoto`, `NewsText`, `NewsSource`, `NewsAuthorId`) VALUES
(1, '0000-00-00', 1, 'Росгвардия окружила протестующих дальнобойщиков в Дагестане', 'Росгвардия окружила протестующих дальнобойщиков в Дагестане', 'Вооруженные бойцы Росгвардии окружили дальнобойщиков, которые проводят в Дагестане акцию против системы «Платон».', '', '      <p>Вооруженные бойцы Росгвардии окружили дальнобойщиков, которые проводят в Дагестане акцию против системы «Платон».</p>\r\n<p>Издание «ОВД-Инфо» сообщает со ссылкой на Объединение перевозчиков России, что протестующим заблокировали мобильную связь.</p>\r\n<p>Корреспондент радиостанции «Эхо Москвы» Арсений Веснин опубликовал видео с места событий.</p>\r\n<p>UPD: Дописан еще один абзац.</p> \r\n<p>UPD2:Еще один суперважный абзац.</p> ', 'https://ovdinfo.org/express-news/2017/03/31/v-dagestane-protestuyushchih-dalnoboyshchikov-zablokirovali-voyska-i', 1),
(2, '2017-03-31', 1, 'В России разработали законопроект о запрете работы гипермаркетов по выходным', 'В России разработали законопроект о запрете работы гипермаркетов по выходным', 'В России разработаны поправки в законодательство, ограничивающие время работы гипермаркетов в будние дни и запрещающие их работу в воскресенье.', '', '\r\n\r\nВ России разработаны поправки в законодательство, ограничивающие время работы гипермаркетов в будние дни и запрещающие их работу в воскресенье.\r\n\r\nАвтор поправок в закон «О торговле» — сенатор Сергей Лисовский, занимающий пост замглавы комитета Совета Федерации по аграрно-продовольственной политике.\r\n\r\n«В субботу — до 4 часов вечера, в воскресенье — не работать вообще, а в будни — до 9 часов вечера, никаких 24-часовых гипермаркетов», — сообщил Лисовский. Такая мера, по его словам, направлена на поддержку малых предприятий торговли — магазинов с одной-двумя кассами.\r\n\r\nВ работе над поправками, заявил Лисовский, также участвует вице-спикер Госдумы Ирина Яровая. На рассмотрение Госдумы законопроект, по его словам, планируется внести в осеннюю сессию.\r\n', 'http://tass.ru/ekonomika/4142531', 1),
(3, '2017-03-30', 2, 'Для дежурной, которая проигнорировала звонок тонущих детей, запросили четыре года колонии', 'Для дежурной, которая проигнорировала звонок тонущих детей, запросили четыре года колонии', 'Прокурор запросила четыре года колонии общего режима на суде над Ириной Щербаковой — фельдшером, которая летом 2016 года проигнорировала звонок тонувших на Сямозере детей.', '', '\r\n\r\nПрокурор запросила четыре года колонии общего режима на суде над Ириной Щербаковой — фельдшером, которая летом 2016 года проигнорировала звонок тонувших на Сямозере детей.\r\n\r\nЩербакова частично признала вину и объяснила свои действия ошибкой. Она попросила суд вынести оправдательный приговор.\r\nПо версии следствия, 18 июня 2016 года Щербакова, ответив на звонок тонувшего ребенка, перебила его и пригрозила полицией. Затем дежурная бросила трубку.\r\nНа попавших в шторм на Сямозере лодках находились московские школьники с вожатыми. Лодки перевернулись и затонули, в результате погибли 14 детей. О случившемся стало известно, только когда одна из спасшихся девочек добралась до ближайшей к берегу деревни.\r\nПосле случившегося СК завел уголовные дела в том числе против руководства детского лагеря и главы карельского управления Роспотребнадзора Анатолия Коваленко.\r\n', 'http://www.interfax.ru/russia/556278', 1),
(4, '2017-04-01', 3, 'Россия стартовала с победы на чемпионате мира', 'Россия стартовала с победы на чемпионате мира', 'Женская сборная России выиграла стартовый матч чемпионата мира у команды Финляндии.', '', 'Женская сборная России выиграла стартовый матч чемпионата мира в американском Плимуте у команды Финляндии. Финки открыли счет в середине второго периода. В начале третьей двадцатиминутки Фануза Кадирова восстановила равновесие. Дело шло к овертайму, но за 50 секунд до окончания основного времени Екатерина Смоленцева принесла победу российской команде.', 'http://news.sportbox.ru/Vidy_sporta/Hokkej/spbnews_NI732500_Rossija_startovala_s_pobedy_na_chempionate_mira', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rubrics`
--

CREATE TABLE `rubrics` (
  `RubricId` int(11) NOT NULL,
  `RubricName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `rubrics`
--

INSERT INTO `rubrics` (`RubricId`, `RubricName`) VALUES
(1, 'Политика'),
(2, 'Общество'),
(3, 'Спорт');

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
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`UserId`, `UserName`, `PasswordHash`, `Administrator`, `Journalist`, `Editor`, `Moderator`) VALUES
(0, 'NewsAuthor1\r\n\r\n', '$2y$10$kAceyCr8dXqp0T.ULgehX.jgau3Pos7kONAtYq719e3zZ1uU5wF56', 1, 1, 1, 1),
(2, 'qwe', '$2y$10$1IvQmGB0Odg1.j2U6.fGte00nlAmVDVE9uX6FVF2XMkHJ6Jgec2te', 0, 0, 0, 0),
(3, 'qwe', '$2y$10$Z5E55Ts4nRiZMPX5M81flepCsnJtHqNHHvlJGF4YphwYx7mFans7u', 0, 0, 0, 0),
(4, 'qwerty123', '$2y$10$T7w9ahjHhB4XcwyneQNGourMGFO5aNNBI4WinRHC0lzz7F6ckj/bi', 0, 0, 0, 0),
(5, 'zaqwer', '$2y$10$KzVDI5/v5jACSN2yeGTrl.DHK5UZy3mT0SiclHvArM.jG/dJg3le6', 0, 0, 0, 0),
(6, 'ооо', '$2y$10$0lCPHN.qCCwnFC11PZ.A2.R.Dp3OQe.9rPOmGk/GEbVTg.gsarzAC', 0, 0, 0, 0);

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
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT для таблицы `News`
--
ALTER TABLE `News`
  MODIFY `NewsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `rubrics`
--
ALTER TABLE `rubrics`
  MODIFY `RubricId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`NewsId`) REFERENCES `News` (`NewsId`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`CommentAuthorId`) REFERENCES `Users` (`UserId`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
