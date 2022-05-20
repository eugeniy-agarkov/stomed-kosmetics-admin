-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2022 г., 07:55
-- Версия сервера: 10.3.29-MariaDB
-- Версия PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `agarkov_kosmetics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(5) DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `name`, `slug`, `excerpt`, `content`, `photo`, `order`, `is_active`, `published_at`, `deleted_at`) VALUES
(6, 3, 'Что такое лазерная косметология?', 'glavnaya', 'Интравитреальная инъекция – это эффективный, а порой и единственный из методов лечения офтальмологических заболеваний. Большинство лекарственных препаратов, таких как капли и мази, из-за клеточного барьера не могут проникнуть внутрь глазного яблока.', NULL, 'SlUsogYdcz9dSELd4DUrcmf2hkuDRf.png', 0, 1, '2022-05-08 13:46:09', NULL),
(7, 3, 'Инъекции все секреты данной процедуры?', 'inekcii-vse-sekrety-dannoy-procedury', 'Интравитреальная инъекция – это эффективный, а порой и единственный из методов лечения офтальмологических заболеваний. Большинство лекарственных препаратов, таких как капли и мази, из-за клеточного барьера не могут проникнуть внутрь глазного яблока.', NULL, 'QzQRLJPgHe25m8IYTYASFA7lb9kBMQ.png', 0, 1, '2022-05-01 00:00:00', NULL),
(8, 1, 'Для чего нужна апаратная косметология?', 'dlya-chego-nuzhna-aparatnaya-kosmetologiya', 'Интравитреальная инъекция – это эффективный, а порой и единственный из методов лечения офтальмологических заболеваний. Большинство лекарственных препаратов, таких как капли и мази, из-за клеточного барьера не могут проникнуть внутрь глазного яблока.', NULL, 'y3kC1AUrGHfwOvR3snRNPMz2E7AWei.png', 0, 1, '2022-05-08 17:21:24', NULL),
(9, 1, 'В каком возрасте лучше делать татуаж губ', 'v-kakom-vozraste-luchshe-delat-tatuazh-gub', 'Интравитреальная инъекция – это эффективный, а порой и единственный из методов лечения офтальмологических заболеваний. Большинство лекарственных препаратов, таких как капли и мази, из-за клеточного барьера не могут проникнуть внутрь глазного яблока.', NULL, 'D5uTNfMqJnBH2gTDaBVnb3YF63wxau.png', 0, 1, '2022-04-05 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` smallint(5) NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `parent_id`, `name`, `slug`, `is_active`, `order`, `published_at`, `deleted_at`) VALUES
(1, NULL, 'Новости про МРТ', 'novosti-pro-mrt', 1, 0, '2022-04-27 19:38:17', NULL),
(2, NULL, 'Новости клиники', 'novosti-kliniki', 1, 0, '2022-04-27 19:41:44', '2022-04-27 13:46:43'),
(3, NULL, 'Новости клиники', 'novosti-kliniki', 1, 0, '2022-04-27 19:46:50', NULL),
(4, NULL, 'Аппаратная косметология', 'apparatnaya-kosmetologiya', 1, 0, '2022-04-28 10:18:58', NULL),
(5, NULL, 'Инъекционная косметология', 'inekcionnaya-kosmetologiya', 1, 0, '2022-04-28 10:19:36', NULL),
(6, NULL, 'Классическая косметология', 'klassicheskaya-kosmetologiya', 1, 0, '2022-04-28 10:19:47', NULL),
(7, NULL, 'Дерматология', 'dermatologiya', 1, 0, '2022-04-28 10:19:56', NULL),
(8, NULL, 'Эпиляция', 'epilyaciya', 1, 0, '2022-04-28 10:20:08', NULL),
(9, NULL, 'Массаж', 'massazh', 1, 0, '2022-04-28 10:20:17', NULL),
(10, NULL, 'Пластическая хирургия', 'plasticheskaya-hirurgiya', 1, 0, '2022-04-28 10:20:27', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `blog_pages`
--

CREATE TABLE `blog_pages` (
  `blog_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `blog_prices`
--

CREATE TABLE `blog_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `discount_price` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(6) DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `clinics`
--

CREATE TABLE `clinics` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clinics`
--

INSERT INTO `clinics` (`id`, `code`, `slug`, `name`, `short_name`, `is_active`, `published_at`, `deleted_at`) VALUES
(8, '00005', 'na-arbate', 'на Арбате', 'Арбат', 1, '2022-04-27 11:51:09', NULL),
(9, '00002', 'na-leninskom', 'на Ленинском', 'Ленинский проспект', 1, '2022-04-27 11:51:28', NULL),
(10, '00009', 'na-babushkinskoy', 'на Бабушкинской', 'Бабушкина', 1, '2022-04-27 11:51:50', NULL),
(11, '00008', 'na-yugo-zapadnoy', 'на Юго-Западной', 'Профсоюзная', 1, '2022-04-27 11:52:04', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `clinic_details`
--

CREATE TABLE `clinic_details` (
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guide` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `schedule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clinic_details`
--

INSERT INTO `clinic_details` (`clinic_id`, `address`, `guide`, `schedule`, `lat`, `lng`) VALUES
(8, 'г. Москва, Большой Власьевский переулок, д. 9', NULL, NULL, '55.74601006901123', '37.59034449999998'),
(9, 'г. Москва, Ленинский проспект, д. 90', NULL, NULL, '55.67493006906687', '37.52482149999997'),
(10, 'г. Москва, ул. Летчика Бабушкина, д. 48 Б', NULL, NULL, '55.87571306886743', '37.68052649999993'),
(11, 'г. Москва, Ленинский проспект, д. 146', NULL, NULL, '55.65740806908138', '37.49765649999996');

-- --------------------------------------------------------

--
-- Структура таблицы `clinic_doctor`
--

CREATE TABLE `clinic_doctor` (
  `id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clinic_doctor`
--

INSERT INTO `clinic_doctor` (`id`, `clinic_id`, `doctor_id`) VALUES
(1, 9, 3),
(2, 10, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `clinic_faqs`
--

CREATE TABLE `clinic_faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clinic_faqs`
--

INSERT INTO `clinic_faqs` (`id`, `clinic_id`, `question`, `answer`, `is_active`, `published_at`) VALUES
(2, 8, 'Как добравться от м. Бабушкинская?', '<p>При движении по внутренней стороне МКАДа поверните налево на Осташковскую шоссе, двигайтесь прямо, затем сверните налево на проезд Шокальского, далее, сразу поверните направо на Осташковскую улицу. При пересечении с Тайнинской улицей, сверните правее, на улицу Летчика Бабушкина. Наша клиника будет слева. При движении с третьего транспортного кольца двигайтесь по проспекту Мира. Перед Северянинским путепроводом сверните левее на улицу Летчика Бабушкина, наша клиника справа.</p>', 1, '2022-05-04 15:15:52'),
(3, 8, 'Как добравться на общественном транспорте?', '<p>При движении по внутренней стороне МКАДа поверните налево на Осташковскую шоссе, двигайтесь прямо, затем сверните налево на проезд Шокальского, далее, сразу поверните направо на Осташковскую улицу. При пересечении с Тайнинской улицей, сверните правее, на улицу Летчика Бабушкина. Наша клиника будет слева. При движении с третьего транспортного кольца двигайтесь по проспекту Мира. Перед Северянинским путепроводом сверните левее на улицу Летчика Бабушкина, наша клиника справа.</p>', 1, '2022-05-04 15:16:22'),
(4, 8, 'Как добравться от м. Медведково?', '<p>При движении по внутренней стороне МКАДа поверните налево на Осташковскую шоссе, двигайтесь прямо, затем сверните налево на проезд Шокальского, далее, сразу поверните направо на Осташковскую улицу. При пересечении с Тайнинской улицей, сверните правее, на улицу Летчика Бабушкина. Наша клиника будет слева. При движении с третьего транспортного кольца двигайтесь по проспекту Мира. Перед Северянинским путепроводом сверните левее на улицу Летчика Бабушкина, наша клиника справа.</p>', 1, '2022-05-04 15:16:45'),
(5, 8, 'Как добравть на машине?', '<p>При движении по внутренней стороне МКАДа поверните налево на Осташковскую шоссе, двигайтесь прямо, затем сверните налево на проезд Шокальского, далее, сразу поверните направо на Осташковскую улицу. При пересечении с Тайнинской улицей, сверните правее, на улицу Летчика Бабушкина. Наша клиника будет слева. При движении с третьего транспортного кольца двигайтесь по проспекту Мира. Перед Северянинским путепроводом сверните левее на улицу Летчика Бабушкина, наша клиника справа.</p>', 1, '2022-05-04 15:17:03'),
(6, 8, 'Можно по красной линии метро?', '<p>При движении по внутренней стороне МКАДа поверните налево на Осташковскую шоссе, двигайтесь прямо, затем сверните налево на проезд Шокальского, далее, сразу поверните направо на Осташковскую улицу. При пересечении с Тайнинской улицей, сверните правее, на улицу Летчика Бабушкина. Наша клиника будет слева. При движении с третьего транспортного кольца двигайтесь по проспекту Мира. Перед Северянинским путепроводом сверните левее на улицу Летчика Бабушкина, наша клиника справа.</p>', 1, '2022-05-04 15:17:19');

-- --------------------------------------------------------

--
-- Структура таблицы `clinic_images`
--

CREATE TABLE `clinic_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `clinic_pages`
--

CREATE TABLE `clinic_pages` (
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `h1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `features` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `clinic_pages`
--

INSERT INTO `clinic_pages` (`clinic_id`, `title`, `description`, `h1`, `features`, `caption`, `content`, `route`) VALUES
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, 'ddddd', NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `directions`
--

CREATE TABLE `directions` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_spending` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_excerpt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_top` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` smallint(5) NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `directions`
--

INSERT INTO `directions` (`id`, `category_id`, `clinic_id`, `slug`, `name`, `image`, `time_spending`, `excerpt`, `title_excerpt`, `description`, `is_top`, `is_active`, `order`, `published_at`, `deleted_at`) VALUES
(2, 4, 8, 'lazernaya-epilyaciya-podmyshek', 'Лазерная эпиляция подмышек', '1651828778service-detail-img-1.png', '1 час', '<p>1Подготовка к процедуре лазерной эпиляции является крайне важным моментом. Выполнив все правила, вы обезопасите кожу от дополнительной тепловой нагрузки, избежите пигментирования, ожогов, шелушения. Начните с консультации специалиста, у которого вы будете проходить процедуру. В данном случае нужен более строгий подход, чем подготовка к эпиляции эпилятором. Вы сможете задать врачу все интересующие вопросы, рассказать об особенностях состояния организма, перенесенных заболеваниях, своем болевом пороге, приеме лекарств. Задать вопрос</p>', 'Лазерная эпиляция лица, как подготовиться', '<p>Радикальный метод избавления от нежелательных волос на теле &mdash; лазерная эпиляция. Такая процедура считается надежной и эффективной. После прохождения полного курса кожа становится гладкой, без раздражений и неэстетичной щетины.</p>\r\n<p>Воспользоваться услугой лазерной эпиляции в Одессе предлагает компания TK Laser. Вас ожидает уютный салон, комфортные кабинеты с современным оборудованием и квалифицированные мастера.</p>', 0, 1, 1, '2022-05-06 12:06:31', '2022-05-08 12:04:23'),
(3, 1, 8, 'fsdfsdf', 'Пилинг лица', 'XKG31BOIcUuoRmIM5zMNNdyDjUPy06.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:05:18', NULL),
(4, 1, 8, 'chistka-lica-u-kosmetologa', 'Чистка лица у косметолога', 'RjAZXeNX9QFqedT1Oj6zWSZ4xeFxzY.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:42:18', NULL),
(5, 1, 8, 'lechenie-rastyazhek-striy', 'Лечение растяжек (стрий)', 'RwszVFVBtF1GhR5dQT1olE4fHnQqVa.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:42:44', NULL),
(6, 1, 8, 'lechenie-sosudistoy-patologii', 'Лечение сосудистой патологии', 'WGPpWq7Iy2jtk1GlKPOAA7KVtHJG86.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:43:13', NULL),
(7, 1, 8, 'nitevoy-lifting-lica', 'Нитевой лифтинг лица', '5ZGHLdWF0I8IzI8lRbOoTpsQOE4vmL.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:43:29', NULL),
(8, 2, 8, 'plazmolifting-lica', 'Плазмолифтинг лица', 'syt8ig5kgXKHECG6HBrGL0ama0Lxv7.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:56:50', NULL),
(9, 2, 8, 'plazmolifting-shei', 'Плазмолифтинг шеи', 'TSAp5QMpeuPTmnnEQvBDi1alp3Qyyc.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:57:08', NULL),
(10, 2, 8, 'biorevitalizaciya', 'Биоревитализация', 'NeKF8XscaTF7ML77MsFiYU5HKBlxsf.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:57:25', NULL),
(11, 2, 8, 'uvelichenie-gub', 'Увеличение губ', 'm6KPr3OYu8JaJCKXdeRIzsYqSM5d2L.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:57:42', NULL),
(12, 2, 8, 'konturnaya-plastika', 'Контурная пластика', 'AA8EHddqU87DQSuITskfLU9cqIZ7Kt.png', '1 час', NULL, NULL, NULL, 0, 1, 0, '2022-05-08 18:58:01', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `direction_categories`
--

CREATE TABLE `direction_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_menu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `order` smallint(5) NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `direction_categories`
--

INSERT INTO `direction_categories` (`id`, `parent_id`, `slug`, `name`, `title_menu`, `image`, `is_active`, `order`, `published_at`, `deleted_at`) VALUES
(1, NULL, 'klassicheskaya-kosmetologiya', 'Классическая косметология', 'Классическая косметология', 'AfVIoI8dtVe7yZfvQcwHzi5agdmNLs.png', 1, 1, '2022-05-06 07:23:49', NULL),
(2, NULL, 'inekcionnaya-kosmetologiya', 'Инъекционная косметология', 'Инъекционная косметология', 'ktjToEJIsFF1cMB5hyPzMPcysuZmMa.png', 1, 2, '2022-05-06 08:34:00', NULL),
(3, NULL, 'apparatnaya-kosmetologiya', 'Аппаратная косметология', 'Аппаратная косметология', 'xjbZY9lLJvgMeBQh9YwGFEaMMLmJoj.png', 1, 3, '2022-05-06 08:34:25', NULL),
(4, NULL, 'dermatologiya', 'Дерматология', 'Дерматология', 'gKxodecbCGTTYLPOjE37m8dRlyGjMf.png', 1, 4, '2022-05-06 08:35:03', NULL),
(5, NULL, 'epilyaciya', 'Эпиляция', 'Эпиляция', 'i0zpZtWMo0jehYtugn3rbhghiL5o5b.png', 1, 5, '2022-05-06 08:35:18', NULL),
(6, NULL, 'massazh', 'Массаж', 'Массаж', 'MDyFQqy0VxTZE9cGMCepE9yx8GGLKt.png', 1, 6, '2022-05-06 08:35:36', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `direction_category_pages`
--

CREATE TABLE `direction_category_pages` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `direction_category_pages`
--

INSERT INTO `direction_category_pages` (`category_id`, `title`, `description`, `content`) VALUES
(1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `direction_images`
--

CREATE TABLE `direction_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `direction_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `direction_images`
--

INSERT INTO `direction_images` (`id`, `direction_id`, `image`, `alt`, `title`, `published_at`) VALUES
(3, 2, '1651831091service-detail-img-1.png', 'Test Alt', 'Tess', '2022-05-06 12:58:01');

-- --------------------------------------------------------

--
-- Структура таблицы `direction_pages`
--

CREATE TABLE `direction_pages` (
  `direction_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `direction_pages`
--

INSERT INTO `direction_pages` (`direction_id`, `title`, `description`, `content`) VALUES
(2, 'd', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `doctors`
--

CREATE TABLE `doctors` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_call_home` tinyint(1) NOT NULL DEFAULT 0,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctors`
--

INSERT INTO `doctors` (`id`, `code`, `slug`, `name`, `excerpt`, `content`, `image`, `video`, `experience`, `category`, `is_call_home`, `degree`, `is_active`, `order`, `published_at`, `deleted_at`) VALUES
(3, '00002', 'kolesnikova-natalya-gennadevna', 'Колесникова Наталья Геннадьевна', 'Венеролог, Дерматолог, Косметолог', NULL, '1651676803avatar.jpg', 'https://www.youtube.com/watch?v=K70nC0FbxiU', '17 лет', 'Высшая', 1, 'КМН и ДМН', 1, 2, '2022-05-04 17:57:57', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_pages`
--

CREATE TABLE `doctor_pages` (
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctor_pages`
--

INSERT INTO `doctor_pages` (`doctor_id`, `title`, `description`, `content`) VALUES
(3, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_prices`
--

CREATE TABLE `doctor_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `direction_id` int(10) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `discount_price` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `doctor_sertificats`
--

CREATE TABLE `doctor_sertificats` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `doctor_sertificats`
--

INSERT INTO `doctor_sertificats` (`id`, `doctor_id`, `image`, `alt`, `title`, `published_at`, `deleted_at`) VALUES
(3, 3, '1651749158avatar.jpg', NULL, NULL, '2022-05-05 14:12:38', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `doctor_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clinic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `direction_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `galleries`
--

INSERT INTO `galleries` (`id`, `direction_id`, `name`, `image`, `alt`, `title`, `order`, `published_at`) VALUES
(1, 2, 'Test', '1651897369gallery-last-img-1.png', 'sss', 'dddd', 0, '2022-05-07 07:22:48'),
(12, 2, 'dasdasdasd', 'VYJ4vt8SlTcLdg5OWzQ5Acq3i2aIbT.png', NULL, NULL, 0, '2022-05-07 08:10:17');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_04_27_050910_create_forms_table', 2),
(12, '2022_04_27_053726_create_clinics_table', 3),
(15, '2022_04_27_054052_create_reviews_table', 5),
(16, '2022_04_27_065110_create_clinic_details_table', 6),
(17, '2022_04_27_071248_create_clinic_pages_table', 7),
(18, '2022_04_27_121615_create_review_photos_table', 8),
(19, '2022_04_27_144514_create_blog_categories_table', 9),
(20, '2022_04_27_144516_create_blogs_table', 10),
(21, '2022_04_28_072317_create_blog_pages_table', 11),
(22, '2022_04_28_080903_create_blog_prices_table', 12),
(23, '2022_05_01_144514_create_sale_categories_table', 13),
(24, '2022_05_01_144516_create_sales_table', 13),
(25, '2022_05_01_144518_create_sale_pages_table', 13),
(26, '2022_05_01_144520_create_sale_prices_table', 13),
(27, '2022_05_04_090944_create_clinic_images_table', 14),
(28, '2022_05_04_115344_create_clinic_faqs_table', 15),
(29, '2022_04_27_054203_create_doctors_table', 16),
(31, '2022_05_04_124551_create_clinic_doctor_table', 17),
(34, '2022_05_05_063817_create_doctor_pages_table', 19),
(35, '2022_05_05_102544_create_doctor_sertificats_table', 20),
(37, '2022_05_05_111642_create_directions_table', 21),
(38, '2022_05_05_111645_create_doctor_prices_table', 21),
(39, '2022_05_05_122809_create_redirects_table', 22),
(40, '2022_05_05_141638_create_settings_table', 23),
(43, '2022_05_06_035835_create_direction_categories_table', 24),
(44, '2022_05_06_035855_create_direction_category_pages_table', 24),
(45, '2022_05_06_063817_create_direction_pages_table', 24),
(47, '2022_05_06_093751_create_direction_images_table', 25),
(48, '2022_05_06_100625_create_galleries_table', 26),
(51, '2022_05_08_040946_create_seos_table', 27);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `redirects`
--

CREATE TABLE `redirects` (
  `id` int(10) UNSIGNED NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `redirects`
--

INSERT INTO `redirects` (`id`, `hash`, `from`, `to`) VALUES
(1, '$2y$12$zJPJUPFLlcar/aEcdBT5PuYZffLvZJZT3J5RMjaYWLAJW.E4zm8da', '/klinika-na-leninskom/diagnostics/klkt88888', '/klinika-na-leninskom/diagnostics/klkt');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `clinic_id` int(10) UNSIGNED DEFAULT NULL,
  `doctor_id` int(10) UNSIGNED DEFAULT NULL,
  `fio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `review_photos`
--

CREATE TABLE `review_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `review_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sales`
--

CREATE TABLE `sales` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `date_end` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sales`
--

INSERT INTO `sales` (`id`, `category_id`, `name`, `slug`, `excerpt`, `content`, `photo`, `order`, `date_end`, `is_active`, `published_at`, `deleted_at`) VALUES
(1, 3, 'Alex', 'alex', NULL, NULL, '1651650097avatar.jpg', 0, '2024-05-07 17:30:00', 0, '2022-05-04 10:41:21', '2022-05-04 05:08:50');

-- --------------------------------------------------------

--
-- Структура таблицы `sale_categories`
--

CREATE TABLE `sale_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `published_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sale_categories`
--

INSERT INTO `sale_categories` (`id`, `parent_id`, `name`, `slug`, `is_active`, `published_at`, `deleted_at`) VALUES
(3, NULL, 'Скидки на консультации', 'alex', 1, '2022-05-04 10:10:16', NULL),
(4, NULL, 'Бесплатные консультации', 'besplatnye-konsultacii', 1, '2022-05-04 10:11:23', NULL),
(5, NULL, 'Прочие акции', 'prochie-akcii', 1, '2022-05-04 10:11:32', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `sale_pages`
--

CREATE TABLE `sale_pages` (
  `sale_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sale_pages`
--

INSERT INTO `sale_pages` (`sale_id`, `title`, `description`, `content`, `published_at`) VALUES
(1, 'dsfsdfsdf', NULL, NULL, '2022-05-04 11:08:41');

-- --------------------------------------------------------

--
-- Структура таблицы `sale_prices`
--

CREATE TABLE `sale_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(10) UNSIGNED DEFAULT NULL,
  `discount_price` int(10) UNSIGNED DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `seos`
--

CREATE TABLE `seos` (
  `id` int(10) UNSIGNED NOT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `h1` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `robots` tinyint(1) NOT NULL DEFAULT 1,
  `canonical` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `seos`
--

INSERT INTO `seos` (`id`, `page`, `name`, `h1`, `excerpt`, `meta_title`, `meta_description`, `meta_keyword`, `robots`, `canonical`, `published_at`) VALUES
(2, '/', 'Главная', 'Сеть клиник «Столица» пластической хирургии и косметологии', 'Сеть медицинских клиник «Столица» – это ультрасовременная инфраструктура с широким спектром профильных услуг.', 'Мета Тайтл для Главной страницы', 'Мета Дескриптион для Главной страницы', 'Мета Кейворд для Главной страницы', 1, NULL, '2022-05-08 08:24:30');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`name`, `value`) VALUES
('company_name', 'Косметология Stomed'),
('counters', NULL),
('email_appointments', NULL),
('email_leadership', NULL),
('email_resumes', NULL),
('email_reviews', NULL),
('general_phone', '+7 (499) 402-92-28'),
('general_time_work', 'с 9:00 до 21:00');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'admin', 2, 'remstroyod@gmail.com', NULL, '$2y$10$HowjXJUiisfybE/3zTXp.OEjwopGPBaySFsOKjXEJMdqOkHZqMFsC', NULL, 1, '2022-05-05 07:08:24', '2022-05-05 07:08:25'),
(3, 'Alex', 1, 'starokonka@mail.ru', NULL, '$2y$10$AK/mrCLmC.wKOfxz6./k6.PIZsgEB979zMqCbqAfO/1/LNp/Tapnm', NULL, 1, '2022-05-05 03:23:42', '2022-05-05 03:24:08');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_categories_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `blog_pages`
--
ALTER TABLE `blog_pages`
  ADD PRIMARY KEY (`blog_id`);

--
-- Индексы таблицы `blog_prices`
--
ALTER TABLE `blog_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_prices_news_id` (`blog_id`),
  ADD KEY `idx_news_prices_code` (`code`);

--
-- Индексы таблицы `clinics`
--
ALTER TABLE `clinics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_clinics_code` (`code`);

--
-- Индексы таблицы `clinic_details`
--
ALTER TABLE `clinic_details`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Индексы таблицы `clinic_doctor`
--
ALTER TABLE `clinic_doctor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clinic_doctor_clinic_id_foreign` (`clinic_id`),
  ADD KEY `clinic_doctor_doctor_id_foreign` (`doctor_id`);

--
-- Индексы таблицы `clinic_faqs`
--
ALTER TABLE `clinic_faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clinic_faq_clinic_id` (`clinic_id`);

--
-- Индексы таблицы `clinic_images`
--
ALTER TABLE `clinic_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clinic_images_clinic_id` (`clinic_id`);

--
-- Индексы таблицы `clinic_pages`
--
ALTER TABLE `clinic_pages`
  ADD PRIMARY KEY (`clinic_id`);

--
-- Индексы таблицы `directions`
--
ALTER TABLE `directions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_direction_id` (`category_id`),
  ADD KEY `fk_clinic_id` (`clinic_id`);

--
-- Индексы таблицы `direction_categories`
--
ALTER TABLE `direction_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direction_categories_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `direction_category_pages`
--
ALTER TABLE `direction_category_pages`
  ADD PRIMARY KEY (`category_id`);

--
-- Индексы таблицы `direction_images`
--
ALTER TABLE `direction_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_direction_images_direction_id` (`direction_id`);

--
-- Индексы таблицы `direction_pages`
--
ALTER TABLE `direction_pages`
  ADD PRIMARY KEY (`direction_id`);

--
-- Индексы таблицы `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_doctors_code` (`code`);

--
-- Индексы таблицы `doctor_pages`
--
ALTER TABLE `doctor_pages`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Индексы таблицы `doctor_prices`
--
ALTER TABLE `doctor_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor_prices_doctor_id` (`doctor_id`),
  ADD KEY `fk_doctor_prices_direction_id` (`direction_id`),
  ADD KEY `idx_doctor_prices_code` (`code`);

--
-- Индексы таблицы `doctor_sertificats`
--
ALTER TABLE `doctor_sertificats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor_sertificats_doctor_id` (`doctor_id`);

--
-- Индексы таблицы `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_direction_id` (`direction_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `redirects`
--
ALTER TABLE `redirects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_redirects_hash` (`hash`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reviews_clinic_id` (`clinic_id`),
  ADD KEY `fk_reviews_doctor_id` (`doctor_id`);

--
-- Индексы таблицы `review_photos`
--
ALTER TABLE `review_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_review_photos_review_id` (`review_id`);

--
-- Индексы таблицы `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `sale_categories`
--
ALTER TABLE `sale_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_categories_parent_id_foreign` (`parent_id`);

--
-- Индексы таблицы `sale_pages`
--
ALTER TABLE `sale_pages`
  ADD PRIMARY KEY (`sale_id`);

--
-- Индексы таблицы `sale_prices`
--
ALTER TABLE `sale_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sales_prices_news_id` (`sale_id`),
  ADD KEY `idx_sales_prices_code` (`code`);

--
-- Индексы таблицы `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `seos_page_unique` (`page`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD UNIQUE KEY `settings_name_unique` (`name`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `blog_prices`
--
ALTER TABLE `blog_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `clinics`
--
ALTER TABLE `clinics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `clinic_doctor`
--
ALTER TABLE `clinic_doctor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `clinic_faqs`
--
ALTER TABLE `clinic_faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `clinic_images`
--
ALTER TABLE `clinic_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `directions`
--
ALTER TABLE `directions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `direction_categories`
--
ALTER TABLE `direction_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `direction_images`
--
ALTER TABLE `direction_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `doctor_prices`
--
ALTER TABLE `doctor_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `doctor_sertificats`
--
ALTER TABLE `doctor_sertificats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `redirects`
--
ALTER TABLE `redirects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `review_photos`
--
ALTER TABLE `review_photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `sale_categories`
--
ALTER TABLE `sale_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `sale_prices`
--
ALTER TABLE `sale_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD CONSTRAINT `blog_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `blog_categories` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `blog_pages`
--
ALTER TABLE `blog_pages`
  ADD CONSTRAINT `fk_news_page_news_id` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `blog_prices`
--
ALTER TABLE `blog_prices`
  ADD CONSTRAINT `fk_news_prices_news_id` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clinic_details`
--
ALTER TABLE `clinic_details`
  ADD CONSTRAINT `fk_clinic_details_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clinic_doctor`
--
ALTER TABLE `clinic_doctor`
  ADD CONSTRAINT `clinic_doctor_clinic_id_foreign` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`),
  ADD CONSTRAINT `clinic_doctor_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Ограничения внешнего ключа таблицы `clinic_faqs`
--
ALTER TABLE `clinic_faqs`
  ADD CONSTRAINT `fk_clinic_faq_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clinic_images`
--
ALTER TABLE `clinic_images`
  ADD CONSTRAINT `fk_clinic_images_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `clinic_pages`
--
ALTER TABLE `clinic_pages`
  ADD CONSTRAINT `fk_clinic_page_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `directions`
--
ALTER TABLE `directions`
  ADD CONSTRAINT `fk_category_direction_id` FOREIGN KEY (`category_id`) REFERENCES `direction_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `direction_categories`
--
ALTER TABLE `direction_categories`
  ADD CONSTRAINT `direction_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `direction_categories` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `direction_category_pages`
--
ALTER TABLE `direction_category_pages`
  ADD CONSTRAINT `fk_category_pages_category_id` FOREIGN KEY (`category_id`) REFERENCES `direction_categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `direction_images`
--
ALTER TABLE `direction_images`
  ADD CONSTRAINT `fk_direction_images_direction_id` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `direction_pages`
--
ALTER TABLE `direction_pages`
  ADD CONSTRAINT `fk_direction_pages_direction_id` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `doctor_pages`
--
ALTER TABLE `doctor_pages`
  ADD CONSTRAINT `fk_doctor_pages_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `doctor_prices`
--
ALTER TABLE `doctor_prices`
  ADD CONSTRAINT `fk_doctor_prices_direction_id` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_doctor_prices_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `doctor_sertificats`
--
ALTER TABLE `doctor_sertificats`
  ADD CONSTRAINT `fk_doctor_sertificats_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `fk_direction_id` FOREIGN KEY (`direction_id`) REFERENCES `directions` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk_reviews_clinic_id` FOREIGN KEY (`clinic_id`) REFERENCES `clinics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_reviews_doctor_id` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `review_photos`
--
ALTER TABLE `review_photos`
  ADD CONSTRAINT `fk_review_photos_review_id` FOREIGN KEY (`review_id`) REFERENCES `reviews` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `sale_categories` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sale_categories`
--
ALTER TABLE `sale_categories`
  ADD CONSTRAINT `sale_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `sale_categories` (`id`) ON DELETE SET NULL;

--
-- Ограничения внешнего ключа таблицы `sale_pages`
--
ALTER TABLE `sale_pages`
  ADD CONSTRAINT `fk_sales_page_sales_id` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `sale_prices`
--
ALTER TABLE `sale_prices`
  ADD CONSTRAINT `fk_sales_prices_news_id` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
