-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2022 г., 08:08
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `myshop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`) VALUES
(1, 0, 'Телефоны'),
(2, 0, 'Планшеты'),
(3, 1, 'Телефоны  Samsung'),
(4, 1, 'Телефоны Apple'),
(5, 2, 'Планшеты Apple'),
(6, 2, 'Планшеты Acer'),
(7, 2, 'Планшеты Samsung');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `date_created` datetime NOT NULL,
  `date_payment` datetime DEFAULT NULL,
  `date_modification` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `user_ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date_created`, `date_payment`, `date_modification`, `status`, `comment`, `user_ip`) VALUES
(1, 2, '2012-09-25 12:38:59', NULL, '2012-09-25 08:38:59', 0, 'id пользователя: 2<br />\r\n					Имя: Имя2<br />\r\n					Тел: 222222<br />\r\n					Адрес: Адрес222', '127.0.0.1'),
(2, 2, '2012-09-25 14:40:59', NULL, '2012-09-25 10:40:59', 0, 'id пользователя: 2<br />\r\n					Имя: Имя2<br />\r\n					Тел: 222222<br />\r\n					Адрес: Адрес222', '127.0.0.1'),
(3, 2, '2012-09-25 14:43:00', NULL, '2012-09-25 10:43:00', 0, 'id пользователя: 2<br />\r\n					Имя: Имя3<br />\r\n					Тел: 33333<br />\r\n					Адрес: Адрес3333', '127.0.0.1'),
(4, 9, '2012-09-26 09:51:31', NULL, '2012-09-26 05:51:31', 0, 'id пользователя: 9<br />\r\n					Имя: testuser<br />\r\n					Тел: 444444<br />\r\n					Адрес: АдресАдресАдрес', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `image`, `status`) VALUES
(1, 3, 'GT-C3560', '                        <p>Закругленные углы и окантовка  вносят стильный штрих в минималистичный дизайн телефона. Металлическая отделка смотрится  элегантно и современно. А благодаря небольшим размерам С3560 удобно лежит в руке и легко помещается в кармане.</p>\n<br />\n\n<p>Спецификации:</p>\n<ul><li>Стандарты сети GSM и EDGE : GSM (850/900/1800/1900)</li><li>Стандарт сети 3G : N/A</li><li>Стандарт сети CDMA : N/A</li><li>TD-SCDMA Band : N/A</li></ul>\n                    ', 3000, '1.png', 1),
(2, 3, 'S5570 Galaxy mini', 'Платформа\n850/900/1800/1900 МГц\nДиапазон 900/2100 МГц\nAndroid 2.2 OS\nИнтернет браузер (Android Browser)\nФизические характеристики\nВес трубки 106,6 г.\nРазмеры трубки: 110,4 x 60,6 x 12,1 мм', 7000, '2.png', 1),
(3, 3, 'GT-E2600', '<p>Тонкий и изящный дизайн телефона E2600? широкий экран и пользовательский интерфейс Paragon UX обеспечивают удобство и комфорт в использовании.  Телефон оснащен интуитивно-понятным пользовательским интерфейсом.  </p>\n<br />\n<p>Спецификации:</p>\n<ul><li>850 / 900 / 1800 / 1900 МГц GSM &amp; EDGE Band</li><li>GPRS Network&amp;Data: 850 / 900 / 1800 / 1900</li><li>EDGE Network&amp;Data: 850 / 900 / 1800 / 1900</li><li>фирменная</li><li>Интернет браузерr ( NetFront 4.2)</li><li>JAVA™ SUN CLDC HotSpot Implementation 1.1 (MIDP 2.0) Platform</li><li>SAR 0,45 Вт./кг.</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2600ZKASER</a>', 5000, '3.png', 1),
(4, 3, 'E2530 La Fleur', '                        <ul><li>850/900/1800/1900 МГц</li><li>GPRS класс 12</li><li>EDGE Class12(только RX)</li><li>Proprietary (MMP) OS</li><li>Интернет браузер</li><li>MIDP 2,1 / CLDC 1.1</li></ul>\n\n<ul><li>Вес трубки 86 г.</li><li>Размеры трубки: 94.4 x 47.2 x 17.4 мм</li></ul>\n\n<ul><li>Стандартная батарея: до 800 мАч</li><li>До 680 мин. в режиме разговора</li></ul>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER\">\nhttp://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-E2530SRFSER</a>\n                    ', 6000, '4.png', 1),
(5, 3, 'S3350 Chat 335', '<p>Samsung Ch@t 335 — самый тонкий QWERTY-телефон на современном рынке, чья толщина составляет всего 11,9&nbsp;мм. Обтекаемый корпус с хромированным покрытием придает модели изысканный классический вид. 2,4-дюймовый LQVGA дисплей идеально подходит для просмотра снимков и чтения длинных сообщений.</p>\n<br />\n<p>Благодаря новой, улучшенной QWERTY-клавиатуре набор текста становится еще более быстрым и удобным, как при печати на ПК. Есть возможность настраивать горячие клавиши для часто используемых приложений (например, A для будильника и т.п.).</p>\n\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-gsm/GT-S3350HKASER</a>', 10000, '5.png', 1),
(6, 3, 'S5380 La Fleur Wave Y', 'Стандарты сети 850/900/1800/1900MHz GSM&EDGE Band\nСтандарты сети: 900/2100МГц 3G\nПоддерживаемые 3G: GPRS Network&Data :850/900/1800/1900 (Slave)\nEDGE Network&Data: стандарты сетей: 850/900/1800/1900 (Master)\nNetwork&Data (3G): HSDPA 7,2Мбит/с.\nBada 2.0\nБраузер Dolfin Browser 3.0\nПлатформа SUN CLDC 1.1\nЗначение SAR: 0,797мВт./г.\n', 12000, '6.png', 1),
(7, 3, 'I9001 Galaxy S Plus', 'Платформа\n850 / 900 / 1800 / 1900 МГц\nGPRS Class12\nEDGE Class12\nИнтернет браузер (Android Browser)\nДисплей\nРазрешение дисплея 480 x 800 WVGA\n<br />\n<br />\n<a href=\"http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER\">http://www.samsung.com/ru/consumer/mobile-devices/mobile-phones/hhp-smart/GT-I9001HKDSER</a>', 11000, '7.png', 1),
(8, 3, 'I8350 Omnia W', 'Windows Phone 7.5 Mango\nGSM&EDGE 850 / 900 / 1,800 / 1,900 МГц\n3G 900 / 2,100 MГц\nGPRS: Класс 12\nEDGE: Класс 12\nHSDPA 14.4 / HSUPA 5.76 Мбит/с\nInternet Explorer 9\n', 15000, '8.png', 1),
(11, 4, 'iPhone 3GS', 'Широкоформатный дисплей Multi-Touch с диагональю 3,5 дюйма\nРазрешение 480 x 320 пикселей (163 пикселя/дюйм)\nОлеофобное покрытие, препятствующее появлению отпечатков пальцев\nПоддержка одновременного отображения нескольких языков и наборов символов\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/iphone-3gs/specs.html\">http://www.apple.com/ru/iphone/iphone-3gs/specs.html</a>', 20000, '11.PNG', 1),
(12, 4, 'iPhone 4S', '                                                Поддержка международных сетей\nUMTS/HSDPA/HSUPA (850, 900, 1900, 2100 МГц); \nGSM/EDGE (850, 900, 1800, 1900 МГц)\nCDMA EV-DO Rev. A (800, 1900 МГц)3\n802.11b/g/n Wi-Fi (802.11n только 2,4 ГГц)\nБеспроводная технология Bluetooth 4.0\n<br /><br />\n<a href=\"http://www.apple.com/ru/iphone/specs.html\">http://www.apple.com/ru/iphone/specs.html</a>\n                    \n                    ', 25000, '12.png', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `purchase`
--

CREATE TABLE `purchase` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `price` float NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purchase`
--

INSERT INTO `purchase` (`id`, `order_id`, `product_id`, `price`, `amount`) VALUES
(1, 2, 12, 25000, 1),
(2, 3, 2, 7000, 1),
(3, 3, 5, 10000, 2),
(4, 3, 12, 25000, 3),
(5, 4, 12, 25000, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `pwd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `pwd`, `name`, `phone`, `address`) VALUES
(2, 'qwe', '4297f44b13955235245b2497399d7a93', 'Имя2', '222222', 'Адрес222'),
(3, 'asd', '4297f44b13955235245b2497399d7a93', '', '', ''),
(4, 'qwe1', '4297f44b13955235245b2497399d7a93', '', '', ''),
(5, 'dfgdfger', '4297f44b13955235245b2497399d7a93', '', '', ''),
(6, 'dfgdfg', '4297f44b13955235245b2497399d7a93', '', '', ''),
(7, 'qwe2', '4297f44b13955235245b2497399d7a93', 'qwe222', '222', 'eqwe3333'),
(8, 'qwer', '4297f44b13955235245b2497399d7a93', 'qwer1', '11111', 'Адрес'),
(9, 'testuser1', '4297f44b13955235245b2497399d7a93', 'testuser', '444444', 'АдресАдресАдрес'),
(10, 'vladimir@mail.com', '$2y$10$Pdsq3L6gT3NBobGW64SGQOgf.K5S/V74v7N2g45Pkac52KTbsVU8m', '', '', ''),
(11, 'aw@mail.com', '$2y$10$xWpB/.to1u8SjAS/emBPDeoSVMgtzJO85kj45JWrbeQjQ9kjB.5wC', '', '', ''),
(12, 'awaw', '$2y$10$RMw.Xo6BjbiE5U0CtKTLGO8/onOk03S0cge/nvvDUAVCLupIPk9Iu', '', '', ''),
(13, 'test@maiestl.com', '$2y$10$Oh12GiSXe30E3QFcXYnYTehUqgLyv6e7d7vbP6U1CWllEiF9A89da', '', '', ''),
(14, 'test@test.com', '$2y$10$WNnRkd0fouEeNFrk5BCvFu9Tozo2GgjodVwMc.U4DMgFmqP2UFXfK', '', '', 'кудыкина гора');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
