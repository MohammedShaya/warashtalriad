-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 سبتمبر 2020 الساعة 23:27
-- إصدار الخادم: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warashtalriad_db`
--

-- --------------------------------------------------------

--
-- بنية الجدول `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `subject` varchar(222) NOT NULL,
  `title` varchar(222) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(222) NOT NULL,
  `is_active` varchar(11) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `about`
--

INSERT INTO `about` (`id`, `subject`, `title`, `description`, `image`, `is_active`, `order`) VALUES
(14, 'سياية الخصوصية1', 'سياسة الخصوصية', 'وصف', '03-09-20-02-57-45primary.jpg', 'on', 1),
(15, 'اهدافنا', 'اهدافنا', 'اهدافنا ', '03-09-20-02-57-36primary.jpg', 'on', 2),
(16, 'رسالتنا', 'رسالتنا', 'رسالتنا', '03-09-20-02-58-58primary.jpg', 'on', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `about_point`
--

CREATE TABLE `about_point` (
  `id` int(11) NOT NULL,
  `point` text NOT NULL,
  `about_id` int(11) NOT NULL,
  `order_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `about_point`
--

INSERT INTO `about_point` (`id`, `point`, `about_id`, `order_`) VALUES
(21, '', 15, 1),
(22, 'تفاصيل 11', 14, 4),
(23, 'تفاصيل 2', 14, 2),
(24, '', 16, 1),
(25, '', 16, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `title` varchar(333) NOT NULL,
  `image` varchar(333) NOT NULL,
  `url` varchar(222) NOT NULL,
  `is_active` varchar(22) DEFAULT 'on',
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `ads`
--

INSERT INTO `ads` (`id`, `title`, `image`, `url`, `is_active`, `created_at`) VALUES
(1, 'اول اعلان', '10-09-20-02-29-02primary.jpg', 'لالرابط', 'on', '2020-09-07'),
(2, 'اعلان2', '10-09-20-02-25-05primary.jpg', 'https:/shaya.com', 'on', '2020-09-09');

-- --------------------------------------------------------

--
-- بنية الجدول `basic_info`
--

CREATE TABLE `basic_info` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `email1` varchar(200) NOT NULL,
  `email2` varchar(200) NOT NULL,
  `phone1` varchar(200) NOT NULL,
  `phone2` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `url` varchar(222) NOT NULL,
  `image_contect` varchar(222) NOT NULL,
  `image_background` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `basic_info`
--

INSERT INTO `basic_info` (`id`, `name`, `logo`, `email1`, `email2`, `phone1`, `phone2`, `address`, `url`, `image_contect`, `image_background`) VALUES
(1, 'warashtalriad', '07-09-20-05-21-07primary.png', 'mhammed714580571@gmail.com', 'mhammed714580571@gmail.com', '770074678', '730171631', 'sana`a', 'hhtp://www.google.com', '', '40.jpg');

-- --------------------------------------------------------

--
-- بنية الجدول `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `email` varchar(222) NOT NULL,
  `text` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `is_active` varchar(22) DEFAULT 'on',
  `produect_id` int(11) DEFAULT NULL,
  `offer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `comments`
--

INSERT INTO `comments` (`id`, `email`, `text`, `created_at`, `is_active`, `produect_id`, `offer_id`) VALUES
(2, 'sha', 's', '0000-00-00', 'on', 5, NULL),
(3, 'sha', 's', '0000-00-00', '', 8, 1),
(4, 'sha', 's', '0000-00-00', 'on', 20, 1),
(5, 'sha', 's', '0000-00-00', 'on', 20, 2),
(6, 'sha', 's', '0000-00-00', '', NULL, 1),
(7, 'sha', 's', '0000-00-00', 'on', NULL, 1),
(8, 'mhammed714580581@gmail.com', 'ahdu', '2020-09-09', 'on', 4, 0),
(9, 'mhammed@gmail.com', 'rewer', '2020-09-09', '', NULL, 1),
(10, 'mhammed714580581@gmail.com', 'shaya', '2020-09-09', 'on', 8, 1),
(11, 'superadministrator@app.com', 'ttttt', '2020-09-09', 'on', 0, 1),
(12, 'superadministrator@app.com', 'shaya', '2020-09-09', 'on', 4, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1,
  `is_siderbar` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `groups`
--

INSERT INTO `groups` (`id`, `name`, `is_active`, `is_siderbar`) VALUES
(15, 'ابواب وشبابيك', 1, 'on'),
(19, 'دربيزانات ودرج', 1, 'on'),
(20, 'تشكيلات الحديد', 1, 'on'),
(21, 'ggg', 1, 'on');

-- --------------------------------------------------------

--
-- بنية الجدول `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(333) NOT NULL,
  `message` varchar(555) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- بنية الجدول `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `description` text NOT NULL,
  `order` int(11) NOT NULL,
  `is_active` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `shows` int(12) NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `offers`
--

INSERT INTO `offers` (`id`, `name`, `description`, `order`, `is_active`, `created_at`, `shows`, `likes`) VALUES
(1, 'عرض 1', 'عرض 1', 1, 'on', '2020-09-03', 0, 0),
(2, 'عرض 2', 'عرض 2', 2, 'on', '2020-09-03', 0, 0),
(3, 'عرض 3', 'عرض 3', 3, 'on', '2020-09-03', 0, 0),
(4, 'عرض 4', 'عرض4', 3, 'on', '2020-09-03', 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `offer_image`
--

CREATE TABLE `offer_image` (
  `id` int(11) NOT NULL,
  `image` varchar(222) NOT NULL,
  `type` varchar(222) NOT NULL,
  `offer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `offer_image`
--

INSERT INTO `offer_image` (`id`, `image`, `type`, `offer_id`) VALUES
(0, '03-09-20-03-56-03primary.jpg', 'primary', 0),
(0, '03-09-20-05-24-06primary.jpg', 'primary', 1),
(0, '03-09-20-05-24-23primary.jpg', 'primary', 2),
(0, '03-09-20-05-24-42primary.jpg', 'primary', 3),
(0, '03-09-20-05-25-02primary.jpg', 'primary', 4);

-- --------------------------------------------------------

--
-- بنية الجدول `permission`
--

CREATE TABLE `permission` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` int(11) NOT NULL,
  `has_view` int(11) NOT NULL DEFAULT 1,
  `has_add` int(11) NOT NULL DEFAULT 1,
  `has_edit` int(11) NOT NULL DEFAULT 1,
  `has_delete` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `permission`
--

INSERT INTO `permission` (`id`, `name`, `code`, `has_view`, `has_add`, `has_edit`, `has_delete`, `created_at`) VALUES
(1, 'initializing_system', 0, 1, 0, 0, 0, '2020-01-15 14:48:12'),
(2, 'ads', 0, 1, 1, 1, 1, '2020-01-15 14:48:12'),
(3, 'comments', 0, 1, 1, 1, 1, '2020-01-15 14:48:12'),
(4, 'products', 0, 1, 1, 1, 1, '2020-01-15 14:48:12'),
(5, 'offers', 0, 1, 1, 1, 1, '2020-01-15 14:48:12'),
(6, 'groups', 0, 1, 1, 1, 1, '2020-01-15 14:48:12'),
(7, 'users', 0, 1, 0, 0, 0, '2020-01-15 14:51:10'),
(8, 'users_setting', 0, 1, 1, 1, 1, '2020-01-15 14:51:57'),
(11, 'userlog', 0, 1, 0, 0, 0, '2020-01-15 14:53:56'),
(12, 'initializing_produect', 0, 1, 0, 0, 0, '2020-01-15 14:48:12'),
(13, 'messages', 0, 1, 0, 0, 0, '2020-01-15 14:51:10'),
(10, 'about', 0, 1, 1, 1, 1, '2020-01-15 14:48:12'),
(9, 'social_media', 0, 1, 1, 1, 1, '2020-01-15 14:48:12');

-- --------------------------------------------------------

--
-- بنية الجدول `permission_user`
--

CREATE TABLE `permission_user` (
  `id` int(11) NOT NULL,
  `permission_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `can_view` varchar(11) DEFAULT NULL,
  `can_add` varchar(11) DEFAULT NULL,
  `can_edit` varchar(11) DEFAULT NULL,
  `can_delete` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `permission_user`
--

INSERT INTO `permission_user` (`id`, `permission_id`, `user_id`, `name`, `short_code`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES
(67, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:35'),
(68, 12, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(69, 11, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(70, 7, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(71, 13, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(72, 6, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(73, 5, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(74, 8, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(75, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(76, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:36'),
(77, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:37'),
(78, 10, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-10 21:21:37'),
(79, 9, 2, NULL, NULL, 'on', NULL, NULL, NULL, '2020-09-10 21:21:37');

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `description` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `is_active` varchar(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `likes` int(12) NOT NULL,
  `shows` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `group_id`, `order`, `is_active`, `created_at`, `likes`, `shows`) VALUES
(4, 'صنف 1', 'ff', 1, 5, 'on', '2020-08-31', 0, 0),
(5, 'rrr', 'rr', 1, 6, '', '2020-08-31', 6, 0),
(8, 'ttttt', 'ttt', 15, 4, 'on', '2020-08-31', 1, 0),
(9, 'rrrr', 'rrrr', 1, 2, 'on', '2020-08-31', 2, 1),
(20, 'منتج1', 'وصف منتج 1', 15, 1, 'on', '2020-08-31', 2, 9),
(21, 'منتج 12', 'منتج 12', 19, 3, 'on', '2020-09-02', 0, 2),
(22, 'aشايع', 'اتتتتتتتنم', 15, 9, 'on', '2020-09-08', 31, 3),
(23, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(24, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(25, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(26, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(27, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(28, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(29, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(30, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(31, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(32, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(33, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(34, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(35, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(36, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(37, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(38, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(39, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(40, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(41, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(42, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(43, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(44, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(45, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(46, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 2),
(47, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(48, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(49, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(50, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(51, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(52, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(53, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(54, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(55, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(56, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(57, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(58, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(59, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(60, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(61, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0),
(62, 'mmm', ',hkjhk', 15, 4, 'on', '2020-09-10', 0, 0);

-- --------------------------------------------------------

--
-- بنية الجدول `product_image`
--

CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `image` varchar(222) NOT NULL,
  `type` varchar(222) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `product_image`
--

INSERT INTO `product_image` (`id`, `image`, `type`, `product_id`) VALUES
(62, '29-08-20-22-32-130.', '', 4),
(70, '29-08-20-22-41-59primary.jpg', 'primary', 5),
(71, '29-08-20-22-41-590.jpg', '', 5),
(72, '29-08-20-22-41-591.jpg', '', 5),
(78, '03-09-20-01-59-44primary.jpg', 'primary', 8),
(79, '03-09-20-02-00-41primary.jpg', 'primary', 21),
(80, '03-09-20-05-10-12primary.jpg', 'primary', 9),
(81, '09-09-20-03-07-020.jpg', '', 20),
(82, '09-09-20-03-07-021.jpg', '', 20),
(83, '09-09-20-03-07-022.jpg', '', 20),
(84, '09-09-20-03-07-023.jpg', '', 20),
(85, '09-09-20-03-07-024.jpg', '', 20),
(86, '09-09-20-03-07-025.jpg', '', 20),
(87, '09-09-20-03-44-26primary.jpg', 'primary', 22),
(88, '09-09-20-03-44-260.jpg', '', 22),
(89, '09-09-20-03-44-261.jpg', '', 22),
(90, '09-09-20-03-44-262.jpg', '', 22),
(91, '09-09-20-03-44-263.jpg', '', 22),
(92, '09-09-20-03-44-264.jpg', '', 22),
(93, '10-09-20-23-22-50primary.jpg', 'primary', 23),
(94, '10-09-20-23-23-10primary.jpg', 'primary', 24),
(95, '10-09-20-23-23-39primary.jpg', 'primary', 25),
(96, '10-09-20-23-24-00primary.jpg', 'primary', 26),
(97, '10-09-20-23-24-02primary.jpg', 'primary', 27),
(98, '10-09-20-23-24-03primary.jpg', 'primary', 28),
(99, '10-09-20-23-24-24primary.jpg', 'primary', 29),
(100, '10-09-20-23-24-45primary.jpg', 'primary', 30),
(101, '10-09-20-23-24-48primary.jpg', 'primary', 31),
(102, '10-09-20-23-25-09primary.jpg', 'primary', 32),
(103, '10-09-20-23-25-30primary.jpg', 'primary', 33),
(104, '10-09-20-23-25-51primary.jpg', 'primary', 34),
(105, '10-09-20-23-26-13primary.jpg', 'primary', 35),
(106, '10-09-20-23-26-34primary.jpg', 'primary', 36),
(107, '10-09-20-23-26-55primary.jpg', 'primary', 37),
(108, '10-09-20-23-26-56primary.jpg', 'primary', 38),
(109, '10-09-20-23-26-57primary.jpg', 'primary', 39),
(110, '10-09-20-23-26-58primary.jpg', 'primary', 40),
(111, '10-09-20-23-26-59primary.jpg', 'primary', 41),
(112, '10-09-20-23-26-59primary.jpg', 'primary', 42),
(113, '10-09-20-23-27-20primary.jpg', 'primary', 43),
(114, '10-09-20-23-27-42primary.jpg', 'primary', 44),
(115, '10-09-20-23-27-43primary.jpg', 'primary', 45),
(116, '10-09-20-23-28-15primary.jpg', 'primary', 46),
(117, '10-09-20-23-30-52primary.jpg', 'primary', 47),
(118, '10-09-20-23-31-11primary.jpg', 'primary', 48),
(119, '10-09-20-23-31-26primary.jpg', 'primary', 49),
(120, '10-09-20-23-33-36primary.jpg', 'primary', 50),
(121, '10-09-20-23-41-28primary.jpg', 'primary', 51),
(122, '10-09-20-23-41-52primary.jpg', 'primary', 52),
(123, '10-09-20-23-42-41primary.jpg', 'primary', 53),
(124, '10-09-20-23-43-00primary.jpg', 'primary', 54),
(125, '10-09-20-23-43-22primary.jpg', 'primary', 55),
(126, '10-09-20-23-44-34primary.jpg', 'primary', 56),
(127, '10-09-20-23-56-42primary.jpg', 'primary', 57),
(128, '11-09-20-00-13-19primary.jpg', 'primary', 58),
(129, '11-09-20-00-14-16primary.jpg', 'primary', 59),
(130, '11-09-20-00-16-22primary.jpg', 'primary', 60),
(131, '11-09-20-00-16-45primary.jpg', 'primary', 61),
(132, '11-09-20-00-17-54primary.jpg', 'primary', 62);

-- --------------------------------------------------------

--
-- بنية الجدول `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `alt` varchar(200) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL,
  `is_active` varchar(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `social_media`
--

INSERT INTO `social_media` (`id`, `url`, `alt`, `icon`, `order`, `is_active`, `created_at`) VALUES
(1, 'https://facebook.com', 'facebook-fans', 'fa fa-facebook', 11, 'on', '2020-08-29 18:47:55'),
(4, 'https://fa fa-google-plus', 'google-followers', 'fa fa-google-plus', 0, 'on', '2020-09-01 21:41:08'),
(5, 'fa fa-instagram', 'instagram', 'fa fa-instagram', 0, 'on', '2020-09-01 21:41:08'),
(6, 'hhtps://fa fa-twitter', 'twitter-followers', 'fa fa-twitter', 0, 'on', '2020-09-01 21:41:59'),
(7, 'fa fa-linkedin', 'linkedin', 'fa fa-linkedin', 0, 'on', '2020-09-01 21:41:59');

-- --------------------------------------------------------

--
-- بنية الجدول `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ipaddress` varchar(11) NOT NULL,
  `user_agent` varchar(11) NOT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `userlog`
--

INSERT INTO `userlog` (`id`, `user_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES
(17, 2, '::1', 'Chrome 79.0', '2020-01-16 08:53:55'),
(16, 2, '::1', 'Chrome 79.0', '2020-01-16 08:23:02'),
(18, 2, '::1', 'Chrome 84.0', '2020-08-24 18:03:45'),
(19, 2, '::1', 'Chrome 85.0', '2020-08-27 17:16:43'),
(20, 2, '::1', 'Chrome 85.0', '2020-08-29 14:23:18'),
(21, 2, '::1', 'Chrome 85.0', '2020-08-29 20:37:23'),
(22, 2, '::1', 'Chrome 85.0', '2020-08-29 20:52:03'),
(23, 2, '::1', 'Chrome 85.0', '2020-08-30 20:43:07'),
(24, 2, '::1', 'Chrome 85.0', '2020-09-01 20:30:38'),
(25, 2, '::1', 'Chrome 85.0', '2020-09-02 18:56:23'),
(26, 2, '::1', 'Chrome 85.0', '2020-09-03 18:34:29'),
(27, 2, '::1', 'Chrome 85.0', '2020-09-03 18:35:33'),
(28, 2, '::1', 'Chrome 85.0', '2020-09-03 18:37:07'),
(29, 2, '::1', 'Chrome 85.0', '2020-09-05 20:40:55'),
(30, 2, '::1', 'Chrome 85.0', '2020-09-06 18:51:13'),
(31, 2, '::1', 'Chrome 85.0', '2020-09-06 21:22:56'),
(32, 2, '::1', 'Chrome 85.0', '2020-09-06 22:22:19'),
(33, 2, '::1', 'Chrome 85.0', '2020-09-07 20:48:45'),
(34, 2, '::1', 'Chrome 85.0', '2020-09-08 20:05:56'),
(35, 2, '::1', 'Chrome 85.0', '2020-09-09 18:08:20'),
(36, 2, '::1', 'Chrome 85.0', '2020-09-10 16:21:07'),
(37, 2, '::1', 'Chrome 85.0', '2020-09-10 18:59:14'),
(38, 2, '::1', 'Chrome 85.0', '2020-09-10 19:01:24'),
(39, 2, '::1', 'Chrome 85.0', '2020-09-10 19:09:34'),
(40, 2, '::1', 'Chrome 85.0', '2020-09-10 19:30:03'),
(41, 2, '::1', 'Chrome 85.0', '2020-09-10 19:37:18'),
(42, 2, '::1', 'Chrome 85.0', '2020-09-10 19:38:38'),
(43, 2, '::1', 'Chrome 85.0', '2020-09-10 19:39:01'),
(44, 2, '::1', 'Chrome 85.0', '2020-09-10 19:54:22'),
(45, 2, '::1', 'Chrome 85.0', '2020-09-10 19:57:13'),
(46, 2, '::1', 'Chrome 85.0', '2020-09-10 19:58:39'),
(47, 2, '::1', 'Chrome 85.0', '2020-09-10 20:00:13'),
(48, 2, '::1', 'Chrome 85.0', '2020-09-10 20:02:01'),
(49, 2, '::1', 'Chrome 85.0', '2020-09-10 20:03:55'),
(50, 2, '::1', 'Chrome 85.0', '2020-09-10 20:05:03'),
(51, 12, '::1', 'Chrome 85.0', '2020-09-10 20:10:10'),
(52, 2, '::1', 'Chrome 85.0', '2020-09-10 20:10:46'),
(53, 11, '::1', 'Chrome 85.0', '2020-09-10 20:31:55'),
(54, 2, '::1', 'Chrome 85.0', '2020-09-10 20:37:42'),
(55, 11, '::1', 'Chrome 85.0', '2020-09-10 20:40:56'),
(56, 11, '::1', 'Chrome 85.0', '2020-09-10 20:42:02'),
(57, 2, '::1', 'Chrome 85.0', '2020-09-10 20:43:01'),
(58, 11, '::1', 'Chrome 85.0', '2020-09-10 20:45:00'),
(59, 1, '::1', 'Chrome 85.0', '2020-09-10 20:55:35'),
(60, 2, '::1', 'Chrome 85.0', '2020-09-10 20:56:52'),
(61, 2, '::1', 'Chrome 85.0', '2020-09-10 21:25:59');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `add_by` int(11) DEFAULT NULL,
  `is_system` int(11) NOT NULL DEFAULT 0,
  `role` int(1) NOT NULL DEFAULT 0,
  `picture` varchar(555) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `first_name`, `father_name`, `last_name`, `email`, `password`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `add_by`, `is_system`, `role`, `picture`) VALUES
(1, 'mohammed', 'hassan', 'shaya', 'mhammed714580581@gmail.com', 'YmQ4UG54VjI4UWVXUUhVdHhiR0JKZz09', 1, '2020-01-12 08:55:27', NULL, NULL, NULL, 1, 1, NULL),
(2, 'System', 'Super', 'Admin', 'admin@gmail.com', 'UWwrZnJIY081RGRaTnJxbytzQUpmdz09', 1, '2020-01-15 15:16:31', NULL, NULL, NULL, 0, 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_point`
--
ALTER TABLE `about_point`
  ADD PRIMARY KEY (`id`),
  ADD KEY `about_id` (`about_id`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_info`
--
ALTER TABLE `basic_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `about_point`
--
ALTER TABLE `about_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `basic_info`
--
ALTER TABLE `basic_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `about_point`
--
ALTER TABLE `about_point`
  ADD CONSTRAINT `about_point_ibfk_1` FOREIGN KEY (`about_id`) REFERENCES `about` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
