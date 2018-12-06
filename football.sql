-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 27 2018 г., 19:58
-- Версия сервера: 10.1.36-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `football`
--

-- --------------------------------------------------------

--
-- Структура таблицы `fotbal_result`
--

CREATE TABLE `fotbal_result` (
  `id_result` int(10) UNSIGNED NOT NULL,
  `match_of_player` int(10) UNSIGNED NOT NULL,
  `Player` int(10) UNSIGNED NOT NULL,
  `Count_of_balls` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fotbal_result`
--

INSERT INTO `fotbal_result` (`id_result`, `match_of_player`, `Player`, `Count_of_balls`) VALUES
(1, 3, 50, 1),
(2, 3, 54, 1),
(3, 3, 55, 1),
(4, 4, 30, 1),
(5, 4, 31, 1),
(6, 8, 33, 1),
(7, 8, 52, 1),
(8, 9, 75, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `match_of_footbal`
--

CREATE TABLE `match_of_footbal` (
  `id_match` int(10) UNSIGNED NOT NULL,
  `First_Team` varchar(255) DEFAULT NULL,
  `Second_Team` varchar(255) DEFAULT NULL,
  `Stadium` int(10) UNSIGNED NOT NULL,
  `Cost` int(10) UNSIGNED NOT NULL,
  `Date` date NOT NULL,
  `Time_match` time NOT NULL,
  `Ball_First` int(10) UNSIGNED DEFAULT NULL,
  `Ball_Second` int(10) UNSIGNED DEFAULT NULL,
  `Status` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `match_of_footbal`
--

INSERT INTO `match_of_footbal` (`id_match`, `First_Team`, `Second_Team`, `Stadium`, `Cost`, `Date`, `Time_match`, `Ball_First`, `Ball_Second`, `Status`) VALUES
(1, 'Зенит', 'Нальчик', 7, 1300, '2018-12-13', '20:00:00', NULL, NULL, 2),
(2, 'Кратор', 'Спартак', 1, 1200, '2019-01-10', '18:00:00', NULL, NULL, 2),
(3, 'Морильск', 'Спартак', 4, 1700, '2018-11-05', '17:00:00', 1, 2, 0),
(4, 'Спартак', 'Зенит', 5, 800, '2018-11-02', '21:00:00', 2, 0, 0),
(5, 'Шахтер', 'Кратор', 4, 2000, '2018-12-19', '20:00:00', NULL, NULL, 2),
(6, 'Морильск', 'Шахтер', 3, 600, '2018-12-18', '20:00:00', NULL, NULL, 2),
(7, 'Зенит', 'Спартак', 10, 1200, '2018-12-22', '20:00:00', NULL, NULL, 2),
(8, 'Зенит', 'Шахтер', 9, 2100, '2018-10-16', '20:00:00', 1, 1, 0),
(9, 'Шахтер', 'Спартак', 8, 1200, '2018-10-07', '20:00:00', 0, 1, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `names`
--

CREATE TABLE `names` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `names`
--

INSERT INTO `names` (`id`, `login`, `password`) VALUES
(1, 'Admin', '1234'),
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE `players` (
  `Id_player` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(10) UNSIGNED NOT NULL,
  `Number_in_team` int(10) UNSIGNED NOT NULL,
  `Team` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`Id_player`, `Name`, `Age`, `Number_in_team`, `Team`) VALUES
(1, 'Вальцов Игорь Михайлович', 23, 1, 'Кратор'),
(2, 'Карелов Иван Тагирович', 21, 2, 'Кратор'),
(3, 'Белов Игорь Павлович', 23, 3, 'Кратор'),
(4, 'Осипов Борис Генадьевич', 18, 4, 'Кратор'),
(5, 'Ругер Иван Петрович', 23, 5, 'Кратор'),
(6, 'Регистр Крам Валерьевич', 24, 6, 'Кратор'),
(7, 'Белых Иван Анатольевич', 25, 7, 'Кратор'),
(8, 'Аничков Анит Витальевич', 21, 8, 'Кратор'),
(9, 'Мезинцев Антон Григорьевич', 22, 9, 'Кратор'),
(10, 'Валеров Иван Карамович', 20, 10, 'Кратор'),
(11, 'Кратор Карам Маратович', 18, 11, 'Кратор'),
(12, 'Билетный Виталий Павлович', 19, 12, 'Кратор'),
(13, 'Юлович Иван Арсеньевич', 32, 13, 'Кратор'),
(14, 'Миротов Карель Витальевич', 21, 1, 'Морильск'),
(15, 'Булетов Ванька Матрвич', 22, 2, 'Морильск'),
(16, 'Крутов Марат Валерьевич', 23, 3, 'Морильск'),
(17, 'Каратов Виктор Васильевич', 34, 4, 'Морильск'),
(18, 'Макаров Илья Андреевич', 21, 5, 'Морильск'),
(19, 'Кустурица Павел Витальевич', 42, 6, 'Морильск'),
(20, 'Ахметов Кирилл Арсеньевич', 21, 7, 'Морильск'),
(21, 'Вилетов Вилат Витальевич', 22, 8, 'Морильск'),
(22, 'Иванов Иван Иванович', 34, 9, 'Морильск'),
(23, 'Максимов Максим Максимович', 22, 10, 'Морильск'),
(24, 'Куретов Иван Валерьевич', 28, 11, 'Морильск'),
(25, 'Карамзин Иван Павлович', 34, 12, 'Морильск'),
(26, 'Виталов Адлон Кирсович', 19, 1, 'Нальчик'),
(27, 'Лемир Арен Валетьевич', 21, 2, 'Нальчик'),
(28, 'Замир Иван Ретович', 23, 3, 'Нальчик'),
(29, 'Мрат Пестер Карепович', 22, 4, 'Нальчик'),
(30, 'Щеплов Иван Карьерович', 24, 5, 'Нальчик'),
(31, 'Карат Марсен Углевич', 25, 6, 'Нальчик'),
(32, 'Заробов Виталий Ратович', 26, 7, 'Нальчик'),
(33, 'Карамзин Виталий Милонович', 21, 8, 'Нальчик'),
(34, 'Осипов Дмитрий Иванович', 22, 9, 'Нальчик'),
(35, 'Шутелов Намир Арсенович', 32, 10, 'Нальчик'),
(36, 'Мароника Кирилл Анатольевич', 31, 11, 'Нальчик'),
(37, 'Булетов Арсен Евгеньевич', 33, 12, 'Нальчик'),
(38, 'Винсент Иван Карельевич', 32, 13, 'Нальчик'),
(39, 'Каптелов Иван Валерьевич', 34, 14, 'Нальчик'),
(40, 'Богдан Константин Иванович', 22, 1, 'Зенит'),
(41, 'Урсул Макар Витальевич', 19, 2, 'Зенит'),
(42, 'Крамеров Виталий Арсеньевич', 33, 3, 'Зенит'),
(43, 'Малетов Иван Витальевич', 28, 4, 'Зенит'),
(44, 'Дмитров Дмитрий Иванович', 41, 5, 'Зенит'),
(45, 'Трумиров Олег Осипович', 23, 6, 'Зенит'),
(46, 'Белых Иван Валерьевич', 25, 7, 'Зенит'),
(47, 'Рембрант Барат Муратович', 24, 8, 'Зенит'),
(48, 'Балат Бал Битович', 32, 9, 'Зенит'),
(49, 'Маркат Виталий Петров', 22, 10, 'Зенит'),
(50, 'Макар Осип Багданович', 21, 11, 'Зенит'),
(51, 'Дамир Дмитрий Дмерович', 19, 12, 'Зенит'),
(52, 'Киротов Марат Релович', 21, 13, 'Зенит'),
(53, 'Цицианов Дмитрий Никонович', 19, 1, 'Спартак'),
(54, 'Красильников Ипполит Карлович', 24, 2, 'Спартак'),
(55, 'Томсин Иван Сидорович ', 22, 3, 'Спартак'),
(56, 'Дубков Ростислав Иннокентиевич', 43, 4, 'Спартак'),
(57, 'Бугайчук Валерьян Венедиктович ', 23, 5, 'Спартак'),
(58, 'Ржевский Геннадий Куприянович ', 22, 6, 'Спартак'),
(59, 'Коржаков Кир Измаилович ', 21, 7, 'Спартак'),
(60, 'Лешев Семён Проклович', 27, 8, 'Спартак'),
(61, 'Килик Феликс Елисеевич', 32, 9, 'Спартак'),
(62, 'Шелыгин Никон Модестович', 23, 10, 'Спартак'),
(63, 'Тетерин Кир Даниилович ', 22, 11, 'Спартак'),
(64, 'Клепахов Мирон Ермолаевич ', 21, 12, 'Спартак'),
(65, 'Набадчиков Терентий Владиславович ', 21, 1, 'Шахтер'),
(66, 'Ярощук Макар Агапович ', 22, 2, 'Шахтер'),
(67, 'Кая Фока Евгениевич ', 21, 3, 'Шахтер'),
(68, 'Попков Ян Леонович', 21, 4, 'Шахтер'),
(69, 'Крысов Вениамин Артемович ', 22, 5, 'Шахтер'),
(70, 'Солдатов Зиновий Артемович ', 23, 6, 'Шахтер'),
(71, 'Гершельман Леонид Матвеевич ', 24, 7, 'Шахтер'),
(72, 'Патрушев Александр Венедиктович', 27, 8, 'Шахтер'),
(73, 'Молочинский Семен Владиславович ', 28, 9, 'Шахтер'),
(74, 'Каменских Прохор Остапович', 21, 10, 'Шахтер'),
(75, 'Кудрявцев Агап Ермолаевич', 21, 11, 'Шахтер'),
(76, 'Баренцев Игорь Федотович ', 32, 12, 'Шахтер'),
(77, 'Груздев Сократ Венедиктович ', 21, 13, 'Шахтер'),
(78, 'Фененко Фома Афанасиевич ', 22, 14, 'Шахтер');

-- --------------------------------------------------------

--
-- Структура таблицы `stadium`
--

CREATE TABLE `stadium` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Capacity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stadium`
--

INSERT INTO `stadium` (`Id`, `Name`, `City`, `Capacity`) VALUES
(1, 'Чемпион', 'Самара', 1500),
(2, 'Ледовый', 'Санкт-Петербург', 3000),
(3, 'Зимородок', 'Москва', 5600),
(4, 'Валентайн', 'Санкт-Петербург', 1900),
(5, 'Карманный', 'Саратов', 1200),
(6, 'Кутерьма', 'Орел', 3000),
(7, 'Мазат', 'Нальчик', 5400),
(8, 'Валенит', 'Пенза', 2400),
(9, 'Морок', 'Выборг', 600),
(10, 'Ярославль', 'Ярославль', 3000);

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE `teams` (
  `Name` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Trainer` varchar(255) NOT NULL,
  `win_Last` int(10) UNSIGNED NOT NULL,
  `wins` int(10) UNSIGNED NOT NULL,
  `losts` int(10) UNSIGNED NOT NULL,
  `points` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`Name`, `City`, `Trainer`, `win_Last`, `wins`, `losts`, `points`) VALUES
('Зенит', 'Санкт-Петербург', 'Поветов Игорь Николаевич', 2, 205, 145, 34),
('Кратор', 'Самара', 'Крутой Владимир Иванович', 4, 12, 45, 24),
('Морильск', 'Москва', 'Белый Диомид Епифанович', 6, 234, 64, 98),
('Нальчик', 'Нальчик', 'Борецкий Станислав Валерьевич', 3, 123, 134, 29),
('Спартак', 'Москва', 'Бойцов Василий Иванович', 1, 50, 35, 66),
('Шахтер', 'Санкт-Петербург', 'Доевой Кирилл Анатольевич', 5, 34, 12, 57);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `fotbal_result`
--
ALTER TABLE `fotbal_result`
  ADD PRIMARY KEY (`id_result`),
  ADD KEY `match_of_player` (`match_of_player`),
  ADD KEY `Player` (`Player`);

--
-- Индексы таблицы `match_of_footbal`
--
ALTER TABLE `match_of_footbal`
  ADD PRIMARY KEY (`id_match`),
  ADD KEY `Stadium` (`Stadium`),
  ADD KEY `First_Team` (`First_Team`),
  ADD KEY `Second_Team` (`Second_Team`);

--
-- Индексы таблицы `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`Id_player`),
  ADD KEY `Team` (`Team`);

--
-- Индексы таблицы `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`Name`),
  ADD UNIQUE KEY `Name` (`Name`),
  ADD UNIQUE KEY `Name_2` (`Name`),
  ADD KEY `Name_3` (`Name`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `fotbal_result`
--
ALTER TABLE `fotbal_result`
  MODIFY `id_result` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `match_of_footbal`
--
ALTER TABLE `match_of_footbal`
  MODIFY `id_match` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `names`
--
ALTER TABLE `names`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `players`
--
ALTER TABLE `players`
  MODIFY `Id_player` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `stadium`
--
ALTER TABLE `stadium`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `fotbal_result`
--
ALTER TABLE `fotbal_result`
  ADD CONSTRAINT `fotbal_result_ibfk_1` FOREIGN KEY (`match_of_player`) REFERENCES `match_of_footbal` (`id_match`),
  ADD CONSTRAINT `fotbal_result_ibfk_2` FOREIGN KEY (`Player`) REFERENCES `players` (`Id_player`);

--
-- Ограничения внешнего ключа таблицы `match_of_footbal`
--
ALTER TABLE `match_of_footbal`
  ADD CONSTRAINT `match_of_footbal_ibfk_1` FOREIGN KEY (`Stadium`) REFERENCES `stadium` (`Id`),
  ADD CONSTRAINT `match_of_footbal_ibfk_2` FOREIGN KEY (`First_Team`) REFERENCES `teams` (`Name`),
  ADD CONSTRAINT `match_of_footbal_ibfk_3` FOREIGN KEY (`Second_Team`) REFERENCES `teams` (`Name`);

--
-- Ограничения внешнего ключа таблицы `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`Team`) REFERENCES `teams` (`Name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
