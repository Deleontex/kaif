-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: sql203.ultimatefreehost.in
-- Время создания: Июл 09 2020 г., 06:23
-- Версия сервера: 5.6.48-88.0
-- Версия PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ltm_26216661_online_rest`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(222) NOT NULL,
  `username` varchar(222) COLLATE utf8_bin NOT NULL,
  `password` varchar(222) COLLATE utf8_bin NOT NULL,
  `email` varchar(222) COLLATE utf8_bin NOT NULL,
  `code` varchar(222) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`adm_id`, `username`, `password`, `email`, `code`, `date`) VALUES
(6, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'admin@gmail.com', '', '2018-04-09 07:36:18'),
(8, 'abc888', '6d0361d5777656072438f6e314a852bc', 'abc@gmail.com', 'QX5ZMN', '2018-04-13 18:12:30');

-- --------------------------------------------------------

--
-- Структура таблицы `admin_codes`
--

CREATE TABLE `admin_codes` (
  `id` int(222) NOT NULL,
  `codes` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `admin_codes`
--

INSERT INTO `admin_codes` (`id`, `codes`) VALUES
(1, 'QX5ZMN'),
(2, 'QFE6ZM'),
(3, 'QMZR92'),
(4, 'QPGIOV'),
(5, 'QSTE52'),
(6, 'QMTZ2J');

-- --------------------------------------------------------

--
-- Структура таблицы `dishes`
--

CREATE TABLE `dishes` (
  `d_id` int(222) NOT NULL,
  `rs_id` int(222) NOT NULL,
  `title` varchar(222) COLLATE utf8_bin NOT NULL,
  `slogan` varchar(222) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(222) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `dishes`
--

INSERT INTO `dishes` (`d_id`, `rs_id`, `title`, `slogan`, `price`, `img`) VALUES
(20, 59, 'БигМак', 'Супер бургер', '4.00', '5f062fc4a26a3.jpg'),
(21, 60, 'Чикен бургер', 'Вкусна', '2.00', '5f062fe4eb49e.jpg'),
(22, 61, 'Роллы с семгой', 'Нормально', '5.00', '5f0630183b044.jpg'),
(23, 62, 'Пицца оригинальная', 'Пицца с грибами , ветчиной и сыром', '10.00', '5f063044de2de.jpg'),
(24, 63, 'Суп с фрикадельками ', 'Супчик', '3.00', '5f0630a366c2f.jpg'),
(25, 64, 'OffWHiteBurger', 'Dlya modnikov', '12.00', '5f0630c28aa37.jpg'),
(26, 65, 'Наполеон', 'Он когда-то пытался завоевать Русь, а теперь ты его будешь есть', '5.00', '5f0630e7db9b2.jpg'),
(27, 66, 'Шаурма', 'Шаурма из теремка', '2.00', '5f063caa5c6d5.jpg'),
(28, 68, 'Роллы пак', 'Насладись паком из роллов', '13.00', '5f06316c6eeb0.jpg'),
(29, 69, 'Веганская пицца', 'Пицца для веганов (наверное)', '6.00', '5f06318e29a69.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `remark`
--

CREATE TABLE `remark` (
  `id` int(11) NOT NULL,
  `frm_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_bin NOT NULL,
  `remark` longtext COLLATE utf8_bin NOT NULL,
  `remarkDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `remark`
--

INSERT INTO `remark` (`id`, `frm_id`, `status`, `remark`, `remarkDate`) VALUES
(62, 32, 'in process', 'hi', '2018-04-18 17:35:52'),
(63, 32, 'closed', 'cc', '2018-04-18 17:36:46'),
(64, 32, 'in process', 'fff', '2018-04-18 18:01:37'),
(65, 32, 'closed', 'its delv', '2018-04-18 18:08:55'),
(66, 34, 'in process', 'on a way', '2018-04-18 18:56:32'),
(67, 35, 'closed', 'ok', '2018-04-18 18:59:08'),
(68, 37, 'in process', 'on the way!', '2018-04-18 19:50:06'),
(69, 37, 'rejected', 'if admin cancel for any reason this box is for remark only for buter perposes', '2018-04-18 19:51:19'),
(70, 37, 'closed', 'delivered success', '2018-04-18 19:51:50'),
(71, 40, 'in process', 'ew3rfer', '2020-07-01 11:47:00'),
(72, 1, 'отменен', 'dwsfer', '2020-07-08 21:22:32'),
(73, 1, 'В процессе', 'bgfbgf', '2020-07-08 21:23:56'),
(74, 1, 'В процессе', 'й1', '2020-07-08 21:25:09'),
(75, 1, 'В процессе', 'fafdfsd', '2020-07-08 21:28:21'),
(76, 1, 'Dispatch', 'fdsfgd', '2020-07-08 21:28:41'),
(77, 1, 'in process', 'bgfbgf', '2020-07-08 21:30:48'),
(78, 1, 'rejected', 'амвпира', '2020-07-08 21:32:21');

-- --------------------------------------------------------

--
-- Структура таблицы `restaurant`
--

CREATE TABLE `restaurant` (
  `rs_id` int(222) NOT NULL,
  `c_id` int(222) NOT NULL,
  `title` varchar(222) COLLATE utf8_bin NOT NULL,
  `email` varchar(222) COLLATE utf8_bin NOT NULL,
  `phone` varchar(222) COLLATE utf8_bin NOT NULL,
  `url` varchar(222) COLLATE utf8_bin NOT NULL,
  `o_hr` varchar(222) COLLATE utf8_bin NOT NULL,
  `c_hr` varchar(222) COLLATE utf8_bin NOT NULL,
  `o_days` varchar(222) COLLATE utf8_bin NOT NULL,
  `address` mediumtext COLLATE utf8_bin NOT NULL,
  `image` mediumtext COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `restaurant`
--

INSERT INTO `restaurant` (`rs_id`, `c_id`, `title`, `email`, `phone`, `url`, `o_hr`, `c_hr`, `o_days`, `address`, `image`, `date`) VALUES
(59, 13, 'Макдональдс', 'mc@mail.ru', '89999999999', 'mc.com', '6', '24', '24/7', 'г. Москва Ленинградское шоссе', '5f0621c5b30d6.jpg', '2020-07-08 19:43:01'),
(60, 13, 'KFC', 'kfc@mail.ru', '89999999999', 'kfc.com', '6', '24', '24/7', 'г. Москва метро Речной вокзал', '5f06229bc392c.jpg', '2020-07-08 19:46:35'),
(61, 12, 'Тануки', 'ефтглш\"ьфшдюкг', '89999999999', 'tanuki.com', '6', '24', 'пон-суб', 'г. Москва', '5f06232ecb018.jpg', '2020-07-08 19:49:02'),
(62, 11, 'Dominos pizza', 'dominos@mail.ru', '89999999999', 'dominos.com', '6', '23', 'пон-ср', 'г. Москва', '5f062362855d6.jpg', '2020-07-08 19:49:54'),
(63, 15, 'МуМу', 'mumu@mail.ru', '89999999999', 'mumu.ru', '8', '23', 'пон-чет', 'г. Москва', '5f06267a178da.jpg', '2020-07-08 20:03:06'),
(64, 10, 'Black Star Burger', 'bsb@mail.ru', '89999999999', 'bsb.com', '9', '24', 'пон-пят', 'г. москва', '5f0626c44630b.jpg', '2020-07-08 20:04:20'),
(65, 14, 'Кофе хаус', 'cofehouse@mail.ru', '89999999999', 'cofehouse.ru', '10', '23', 'пон-ср', 'г. Москва', '5f0626f5ee868.jpg', '2020-07-08 20:05:09'),
(66, 15, 'Тереомк', 'teremok@mail.ru', '89999999999', 'teremok.com', '11', '20', 'пон-ср', 'г. москва', '5f062778d7db1.jpg', '2020-07-08 20:07:20'),
(68, 12, 'Якитория', 'iakitoria@mail.ru', '89999999999', 'iakitoria.ru', '6', '20', 'пон-суб', 'г. Москва', '5f062b55a5ee3.jpg', '2020-07-08 20:23:49'),
(69, 11, 'Виват Пицца', 'vivat@mail.ru', '89999999999', 'vivat.com', '8', '22', 'пон-пят', 'г. Москва', '5f062b91cdea7.jpg', '2020-07-08 20:24:49');

-- --------------------------------------------------------

--
-- Структура таблицы `res_category`
--

CREATE TABLE `res_category` (
  `c_id` int(222) NOT NULL,
  `c_name` varchar(222) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `res_category`
--

INSERT INTO `res_category` (`c_id`, `c_name`, `date`) VALUES
(10, 'Гриль', '2020-07-02 13:40:41'),
(11, 'Пицца', '2020-07-02 13:40:45'),
(12, 'Рыба', '2020-07-02 13:40:49'),
(13, 'Фастфуд', '2020-07-02 13:40:59'),
(14, 'Десерты', '2020-07-02 13:41:09'),
(15, 'Домашняя еда', '2020-07-08 20:02:09');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `u_id` int(222) NOT NULL,
  `username` varchar(222) COLLATE utf8_bin NOT NULL,
  `f_name` varchar(222) COLLATE utf8_bin NOT NULL,
  `l_name` varchar(222) COLLATE utf8_bin NOT NULL,
  `email` varchar(222) COLLATE utf8_bin NOT NULL,
  `phone` varchar(222) COLLATE utf8_bin NOT NULL,
  `password` varchar(222) COLLATE utf8_bin NOT NULL,
  `address` mediumtext COLLATE utf8_bin NOT NULL,
  `status` int(222) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `username`, `f_name`, `l_name`, `email`, `phone`, `password`, `address`, `status`, `date`) VALUES
(33, 'travisru1ez', 'roma', 'roma', 'qw@qw.com', '89036145077', 'fcea920f7412b5da7be0cf42b8c93759', 'derg h th yukjhku,j', 1, '2020-06-30 13:08:06'),
(34, 'admin', 'Роман', 'Roman', 'mazaevroma@gmail.com', '89036145077', 'e807f1fcf82d132f9bb018ca6738a19f', 'dfreref', 1, '2020-07-08 14:38:22'),
(35, 'афавыа', 'авыавыавы', 'авыавыавы', 'qwe@qwe.com', '89036145077', 'fcea920f7412b5da7be0cf42b8c93759', '123214321432', 1, '2020-07-08 19:04:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users_orders`
--

CREATE TABLE `users_orders` (
  `o_id` int(222) NOT NULL,
  `u_id` int(222) NOT NULL,
  `title` varchar(222) COLLATE utf8_bin NOT NULL,
  `quantity` int(222) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` varchar(222) COLLATE utf8_bin DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп данных таблицы `users_orders`
--

INSERT INTO `users_orders` (`o_id`, `u_id`, `title`, `quantity`, `price`, `status`, `date`) VALUES
(8, 34, 'БигМак', 1, '4.00', NULL, '2020-07-08 21:34:54'),
(9, 34, 'Чикен бургер', 1, '2.00', NULL, '2020-07-08 21:34:54'),
(10, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:35:10'),
(11, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:35:19'),
(12, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:35:19'),
(13, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:35:42'),
(14, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:35:42'),
(15, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:35:42'),
(16, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:38'),
(17, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:38'),
(18, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:38'),
(19, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:40'),
(20, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:40'),
(21, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:40'),
(22, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:42'),
(23, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:42'),
(24, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:42'),
(25, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:44'),
(26, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:44'),
(27, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:44'),
(28, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:46'),
(29, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:46'),
(30, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:46'),
(31, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:47'),
(32, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:47'),
(33, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:47'),
(34, 34, 'Пицца оригинальная', 3, '10.00', NULL, '2020-07-08 21:36:49'),
(35, 34, 'Суп с фрикадельками ', 1, '3.00', NULL, '2020-07-08 21:36:49'),
(36, 34, 'Шаурма', 2, '2.00', NULL, '2020-07-08 21:36:49');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Индексы таблицы `admin_codes`
--
ALTER TABLE `admin_codes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`d_id`);

--
-- Индексы таблицы `remark`
--
ALTER TABLE `remark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`rs_id`);

--
-- Индексы таблицы `res_category`
--
ALTER TABLE `res_category`
  ADD PRIMARY KEY (`c_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Индексы таблицы `users_orders`
--
ALTER TABLE `users_orders`
  ADD PRIMARY KEY (`o_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `admin_codes`
--
ALTER TABLE `admin_codes`
  MODIFY `id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `dishes`
--
ALTER TABLE `dishes`
  MODIFY `d_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `remark`
--
ALTER TABLE `remark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT для таблицы `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `rs_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `res_category`
--
ALTER TABLE `res_category`
  MODIFY `c_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `users_orders`
--
ALTER TABLE `users_orders`
  MODIFY `o_id` int(222) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
