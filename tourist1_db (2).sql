-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2018 lúc 02:13 PM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourist1_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `about`
--

INSERT INTO `about` (`id`, `slug`, `avatar`, `image`, `is_deleted`, `facebook`, `instagram`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'gioi-thieu', '741cba425b85da5fe873be59477b6ace.jpg', '[\"741cba425b85da5fe873be59477b6ace.jpg\"]', 0, '', '', '2018-06-04 22:21:47', 'administrator', '2018-06-04 22:21:47', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `about_lang`
--

CREATE TABLE `about_lang` (
  `id` int(11) NOT NULL,
  `about_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `about_lang`
--

INSERT INTO `about_lang` (`id`, `about_id`, `title`, `description`, `content`, `language`) VALUES
(1, 1, 'giới thiệu', NULL, '<p>Tr&ecirc;n sait depuis longtemps que travailler avec du texte lisible v&agrave; contenant du sens l&agrave; nguồn g&acirc;y mất tập trung, et emp&ecirc;che de se concentrer sur la mise en trang elle-m&ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&eacute;n&eacute;rique comme \'Du texte. Du texte. Du texte. \' est qu\'il poss&egrave;de une distribution de lettres plus ou moins normale, et en tout cas so s&aacute;nh chuẩn avec celle du fran&ccedil;ais. De nombreuses suites logicielles de mise en trang của c&aacute;c trang web Web ont fait du Lorem Ipsum leur faux texte par d&eacute;faut, v&agrave; une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites quy n\'en sont encore qu\'&agrave; leur phase de x&acirc;y dựng. C&aacute;c phi&ecirc;n bản của Plusieurs c&oacute; thể được sử dụng để m&ocirc; tả c&aacute;c t&igrave;nh huống xấu, sự cố xảy ra, sự cố &yacute; thức (histoire d\'y rajouter de petits), c&aacute;c cụm từ ngụy biện (embarassantes).</p>', 'vi'),
(2, 1, 'About', NULL, '<p>On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&ecirc;che de se concentrer sur la mise en page elle-m&ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&eacute;n&eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).</p>', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text,
  `is_activated` tinyint(1) DEFAULT '1',
  `text` varchar(255) DEFAULT NULL,
  `url` text,
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `is_activated`, `text`, `url`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(28, '0a435290a7b532ca6297485bfae0cf06.jpg', 1, NULL, NULL, '2018-06-06 22:19:34', 'administrator', '2018-06-06 22:19:34', 'administrator', 1),
(29, 'de9c039fd4b71efabb0a52cc8e6fd3d7.jpg', 0, NULL, NULL, '2018-06-06 22:40:11', 'administrator', '2018-06-06 22:40:11', 'administrator', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `type` tinyint(1) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text,
  `meta_keywords` text,
  `meta_description` text,
  `is_deleted` tinyint(4) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `viewed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`id`, `category_id`, `type`, `slug`, `image`, `meta_keywords`, `meta_description`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `viewed`) VALUES
(41, 9, NULL, 'bai-viet-1', '43719337c057403fa34c0905552d4efa.jpg', 'asdas', 'asdasd', 0, '2018-05-28 11:22:57', 'administrator', '2018-05-28 11:22:57', 'administrator', 0),
(42, 9, NULL, 'bai-viet-2', '288e03c09743730211f9e713dd02c8c2.png', 'asdas', 'asdasdas', 0, '2018-05-28 11:32:27', 'administrator', '2018-05-28 11:32:27', 'administrator', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_lang`
--

CREATE TABLE `blog_lang` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `content` text,
  `language` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `blog_lang`
--

INSERT INTO `blog_lang` (`id`, `blog_id`, `title`, `description`, `content`, `language`) VALUES
(67, 41, 'bai viet 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'vi'),
(68, 41, 'news 1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'en'),
(69, 42, 'bai viet 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'vi'),
(70, 42, 'news 2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</p>\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8_unicode_ci,
  `meta_description` text COLLATE utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `slug`, `meta_keywords`, `meta_description`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`) VALUES
(8, '2', '2', '2', '2018-05-23 01:30:32', 'administrator', '2018-05-23 01:46:57', 'administrator', 0),
(9, '3', '', '', '2018-05-23 02:24:56', 'administrator', '2018-05-23 02:24:56', 'administrator', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_lang`
--

CREATE TABLE `category_lang` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `category_lang`
--

INSERT INTO `category_lang` (`id`, `category_id`, `title`, `language`) VALUES
(13, 8, '2', 'vi'),
(14, 8, '2', 'en'),
(15, 9, '3', 'vi'),
(16, 9, '3', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1d6d2ef5cbe48491b53b5c2ae95d1d4f14c98f82', '::1', 1516590779, 0x5f5f63695f6c6173745f726567656e65726174657c693a313531363539303735363b6c616e67416262726576696174696f6e7c733a323a227669223b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353134333939313533223b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `opening`
--

CREATE TABLE `opening` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_activated` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `opening`
--

INSERT INTO `opening` (`id`, `image`, `slug`, `meta_keywords`, `meta_description`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_activated`) VALUES
(1, 'a286e1b050dbc22cc935f13f69e4e582.jpg', '1', 'ád', 'ádas', 0, '2018-06-02 11:11:31', 'administrator', '2018-06-02 11:17:42', 'administrator', 1),
(2, 'c0a569a4b4bcd26b0ab9e3a1fdf373d8.jpg', 'khai-giang-1', 'asdas', 'asdasd', 0, '2018-06-06 17:51:59', 'administrator', '2018-06-06 17:51:59', 'administrator', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1:deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `slug`, `avatar`, `image`, `created_at`, `created_by`, `updated_at`, `updated_by`, `is_deleted`, `is_activated`) VALUES
(7, 15, 'test-viet', '', '[\"db3af0f36c6b24b5c0e06f4cadf57b5a.png\"]', '2018-06-11 10:50:07', 'administrator', '2018-06-11 10:50:07', 'administrator', 0, 0),
(8, 15, 'test-lan-2aaaaaaaaaaaaa', '', '[\"5335572377812f5d11cd5671763f2004.png\",\"99a00ffe0ebd9bb3fe1ca28a8e9d1dbe.png\"]', '2018-06-11 18:19:34', 'administrator', '2018-06-11 18:19:34', 'administrator', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `sort` tinyint(4) DEFAULT NULL,
  `is_activated` tinyint(4) DEFAULT '0' COMMENT '0: active; 1: deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `slug`, `parent_id`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `project`, `image`, `sort`, `is_activated`) VALUES
(15, '1', 0, 0, '2018-06-07 16:54:49', 'administrator', '2018-06-07 16:54:49', 'administrator', '', 'd65e2c00ba1a134ba09dcfe040b45417.jpg', NULL, 0),
(16, '2', 15, 0, '2018-05-30 15:34:36', 'administrator', '2018-05-30 15:34:36', 'administrator', '', 'cd8d63d23a6bd32a46ad381f6fd7903f.png', NULL, 0),
(17, 'okokok', 0, 1, '2018-05-30 11:30:33', 'administrator', '2018-05-30 11:30:33', 'administrator', '', NULL, NULL, 0),
(18, 'test1', 16, 1, '2018-05-30 15:33:55', 'administrator', '2018-05-30 15:33:55', 'administrator', '', '43279078ee56c8a0ef505548b43a766a.jpg', NULL, 0),
(19, 'ok', 16, 1, '2018-06-07 16:55:23', 'administrator', '2018-06-07 16:55:23', 'administrator', '', '3982d4481b4b53295e83d7824d24c963.jpg', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category_lang`
--

CREATE TABLE `product_category_lang` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakeywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `metadescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category_lang`
--

INSERT INTO `product_category_lang` (`id`, `product_category_id`, `title`, `language`, `metakeywords`, `metadescription`) VALUES
(73, 15, '1', 'vi', '', ''),
(74, 15, '1', 'en', '', ''),
(75, 16, '2', 'vi', '', ''),
(76, 16, '2', 'en', '', ''),
(77, 17, 'okokok', 'vi', '', ''),
(78, 17, 'okokok', 'en', '', ''),
(79, 18, ' test1', 'vi', '', ''),
(80, 18, ' test1', 'en', '', ''),
(81, 19, 'ok', 'vi', '', ''),
(82, 19, 'ok', 'en', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_lang`
--

CREATE TABLE `product_lang` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metakeywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' ',
  `metadescription` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_lang`
--

INSERT INTO `product_lang` (`id`, `product_id`, `title`, `description`, `content`, `language`, `metakeywords`, `metadescription`) VALUES
(13, 7, 'Test viet', 'undefined', 'Test viet', 'vi', ' a', ' a'),
(14, 7, 'Test', 'undefined', 'Test', 'en', ' a', ' a'),
(15, 8, 'Test lan 2aaaaaaaaaaaaa', 'Test lan 2', 'Test lan 2', 'vi', '     undefined', '     undefined'),
(16, 8, 'Test times 2', 'Test times 2', 'Test times 2', 'en', 'undefined     ', 'undefined     ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `site_sessions`
--

CREATE TABLE `site_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `site_sessions`
--

INSERT INTO `site_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('03bj7teb7c6t5bdngigfog359fr5e1n6', '::1', 1528707672, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730373637323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('0cs58dkk60tnq78f0avne7qhflfjrh5e', '::1', 1528694706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639343730363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('0ju1q46istkhk2co6mo7dmphlc4eej6u', '::1', 1528708946, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730383934363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('0orur79v5k2cjrtsrrubck8ov283dh2k', '::1', 1528716073, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731363037333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('1pmm69n95qeopcgfma5k9hibiirqi3ju', '::1', 1528711593, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731313539333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('23mrnjg21bfp9dbsf5l7n434bgrh2n6c', '::1', 1528709729, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730393732393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('3hucmpe13j1g7pacgaj1sooepuhfagfs', '::1', 1528702611, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730323631313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('43l442oahu5i9tdto6lb8jubet85ketb', '::1', 1528712329, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731323332393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('5je7dl5iel05vjm8sc74aktu1j73vs7k', '::1', 1528710030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731303033303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('664pt4p127fttc08tkorpslh6brrslmv', '::1', 1528709425, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730393432353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('6onoram9q9a4ugtu8h5tor45a4plk7dr', '::1', 1528714234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731343233343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('8ohk8dlma193a8bak1prm3qtd6nmclt7', '::1', 1528701519, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730313531393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('9a9muj0i1qjim68sudb42e1irb0ndfef', '::1', 1528706555, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730363535353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('9o45p739trifdmga66djgp9ha1q7d3id', '::1', 1528710983, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731303938333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('9s9s3i8lmlpflhg8cso1d9ba3b2d4h2h', '::1', 1528711962, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731313936323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('a02h1k295c1459i959l9lth0s5qqdth1', '::1', 1528693171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639333137313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('aq018vs55t2rero63ikkrgdkdi2e9dag', '::1', 1528716236, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731363037333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('cri147s93d0ef3e15nmg1mjn1on6mr2p', '::1', 1528699494, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639393439343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('ctfloiir4r190ri2p93ed0v73kd4060l', '::1', 1528699990, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639393939303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('dlm6b7lir68mm9nrnjfv2jip222k2ape', '::1', 1528714550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731343535303b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('e6f5s1avg8odp2div241b8g4f36p55vu', '::1', 1528710486, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731303438363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('fb3b29rqmavntdbbprndd6b8efa7kbm8', '::1', 1528715745, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731353734353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('fcsftkseebpc1mhsej4e2p5bebhkeq9b', '::1', 1528713816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731333831363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('fhi2heml010r13o6ajq6bks7ng6gcvnj', '::1', 1528715409, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731353430393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('gfm9rd82mn6oc0n5tsutd5daspj9p9t9', '::1', 1528707245, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730373234353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('hakg5m1mh20h3rdonlgdb24rqcffohf6', '::1', 1528712648, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731323634383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('i4j3ns3fdv40jk0l0fj59vomm4q3uvfi', '::1', 1528699096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639393039363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('l00dm63h7ea8om60l94s4hkgksbkss72', '::1', 1528704111, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730343131313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('l6ca8vva91fshabjiqllfcuubvcrffle', '::1', 1528701847, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730313834373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('mkj0dl2dqn0dl216eoocv9vrg8h7fl9k', '::1', 1528703724, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730333732343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('ng4h8bmtjf6cnp82en7ppfncv23dpk2o', '::1', 1528702179, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730323137393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('nlgmedt8tn7kkflnvesepg4krdtgat3m', '::1', 1528704499, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730343439393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('nnm47ljp62gcgg6q06g52vsk03d23fo3', '::1', 1528704999, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730343939393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('o76hu54egm0dnh7cvniifkkree4nn6f7', '::1', 1528706006, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730363030363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('ohdr70p0klr7nfldci5ulosefi97brnc', '::1', 1528698556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639383535363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('om5v3kmbg2i4o6gjg6f43444p2vu2oo7', '::1', 1528700654, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730303635343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('op38n4i7q4rpk3be99rkl8obk0krk5sv', '::1', 1528713045, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731333034353b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('oth776jaj1nggsesb61abmbhkclvismg', '::1', 1528700297, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730303239373b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('pb8mdni395pkdknu3vluk739vm6vf45v', '::1', 1528703391, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730333339313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('qdtk7nij9182le4gae6n36g8lgpjnnsq', '::1', 1528713401, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731333430313b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('qlos15j6lde3qi1vftevcb4ucouacq04', '::1', 1528700958, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730303935383b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('rdtoh4skh5lfovhp0d29u7t1k2v5s8d6', '::1', 1528714986, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383731343938363b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('telks024hpq6pdudfg1ps0hvocb96rb7', '::1', 1528693844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383639333834343b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('tt54oujfebdtg1pv7ejgqef2bts73435', '::1', 1528706859, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730363835393b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('u6b4pu983v1vv11lsn7u58te3sv32odl', '::1', 1528708302, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730383330323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('uvp3kun545oq0d2ddqtt5arai25svbmr', '::1', 1528702913, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730323931333b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b),
('vlostp31n70ejo75d0opljq1jgoo1uga', '::1', 1528707992, 0x5f5f63695f6c6173745f726567656e65726174657c693a313532383730373939323b6964656e746974797c733a31353a2261646d696e4061646d696e2e636f6d223b656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f69647c733a313a2231223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231353238363239343639223b6c6173745f636865636b7c693a313532383638323431323b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_date`
--

CREATE TABLE `tour_date` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `numberdate` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_date`
--

INSERT INTO `tour_date` (`id`, `product_id`, `numberdate`, `is_deleted`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(7, 7, 1, 0, '2018-06-11 10:50:07', 'administrator', '2018-06-11 10:50:07', 'administrator'),
(8, 8, 0, 0, '2018-06-11 18:19:34', 'administrator', '2018-06-11 18:19:34', 'administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tour_date_lang`
--

CREATE TABLE `tour_date_lang` (
  `id` int(11) NOT NULL,
  `tour_date_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tour_date_lang`
--

INSERT INTO `tour_date_lang` (`id`, `tour_date_id`, `title`, `content`, `language`) VALUES
(25, 7, 'Test viet', 'Test viet', 'vi'),
(26, 7, 'Test', 'Test', 'en'),
(29, 8, 'âsasasasas', '', 'vi'),
(30, 8, '', 'ngay 2', 'vi'),
(31, 8, '', 'date 1', 'en'),
(32, 8, 'date 2', 'date 2s', 'en'),
(33, 8, '', '<br data-mce-bogus=\"1\">', 'vi'),
(34, 8, '', '<br data-mce-bogus=\"1\">', 'en'),
(35, 8, 'á', '<br data-mce-bogus=\"1\">', 'vi'),
(36, 8, '', '<br data-mce-bogus=\"1\">', 'vi'),
(37, 8, '', '<br data-mce-bogus=\"1\">', 'en'),
(38, 8, '', '<br data-mce-bogus=\"1\">', 'en');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `age` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `age`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1528682412, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL),
(2, '::1', 'asdas', '$2y$08$PpWSK2unjydxp3spURaQIeF0XLE0W70gsd0TD9pit699I.YgN2DAC', NULL, 'admin@admin.com1', NULL, NULL, NULL, NULL, 1527177316, NULL, 0, '', 'asdas', '', '121231', ''),
(3, '::1', 'minhtruong', '$2y$08$YPNhvgbGnA7jbd9HyjXO0./rYZmIXRje/UcB7523ZAy1xg5BOjfGa', NULL, 'minhtruong93gtvt@gmail.com', NULL, NULL, NULL, NULL, 1527177780, 1527179552, 1, '', 'minhtruong', 'mato', '123', '1'),
(4, '::1', 'a', '$2y$08$kDxKWvqs.XWwiD7LHvs2AuG.Uzu4NWhm498URqvjIUYfV3PzfQHim', NULL, 'minhtruong93gtvt@gmail.com1', NULL, NULL, NULL, NULL, 1527178136, NULL, 0, '', 'a', 'mato', '123123', '12'),
(5, '::1', 'Minh Trường', '$2y$08$RzELUGHvx8MtPpATO4/1xuQqG3iKiVsluuuuW9GHcd/lijGyPt8YC', NULL, 'minhtruong93gtvt@gmail.com2', NULL, NULL, NULL, NULL, 1527178552, NULL, 1, '', 'Minh Trường', 'mato', '0985767862', '25'),
(6, '::1', 'Minh Trường', '$2y$08$eFnAMTSd9nK8tyZQNcNlVeWv82KfRkF18pF8Lh7gxbJWCSZF3grMG', NULL, 'minhtruong93gtvt@gmail.com2', NULL, NULL, NULL, NULL, 1527178625, NULL, 1, '', 'Minh Trường', 'mato', '0985767862', '25'),
(7, '::1', 'asd', '$2y$08$VLybd2Ow93i3lknQtDqpIeoMf3xP7v38m9JYML2VM8dowCepDvyP.', NULL, 'a@gmail.com', NULL, NULL, NULL, NULL, 1527179462, NULL, 1, '', 'asd', '', '123', ''),
(8, '::1', 'Minh', '$2y$08$SbJuXh7GnCBqPBvYRTEcMONjoU8TZ8u0ZzDez2z3QP7TivGnE/iH.', NULL, 'hanguyen@user.com', NULL, NULL, NULL, NULL, 1527432498, NULL, 1, '', 'Minh', 'mato', '0985767862', '26'),
(9, '::1', '1232', '$2y$08$FF9cU4VevU3PqW8SJ39bcuVDOVvauKoECc68nn.3CDc6bl8GindX2', NULL, 'asdas@gmail.com', NULL, NULL, NULL, NULL, 1527433031, NULL, 1, '', '1232', '', '1231', ''),
(10, '::1', 'asdasd', '$2y$08$o/tFkN0LG5IxWpsDHNK0KemUM8OvGEiY3Ao1B7eJO6uvB5lrpYALm', NULL, 'aa@gmail.com', NULL, NULL, NULL, NULL, 1527504887, NULL, 1, '', 'asdasd', 'asda', '123123', '12'),
(11, '::1', 'Minh Truong', '$2y$08$Bi2qBwrxcSPkgFlq0xCwLOQbnQH348SZpZt5IRG5mT7/t/y3dbT6G', NULL, 'minhtruong93gtvt@gmail.com111', NULL, NULL, NULL, NULL, 1527523354, NULL, 1, '', 'Minh Truong', 'mato', '0985767862', '26'),
(12, '::1', 'Test', '$2y$08$WIF4VSIReuADjylqq0PeIO/0xapxmvMq9EL8/osUzL.X9MdnvFute', NULL, 'minhtruong93gtvt@gmail.com12', NULL, NULL, NULL, NULL, 1528288091, 1528295244, 1, '', 'Test', 'Mato', '0985767862', '25'),
(13, '::1', 'Do Minh Minh', '$2y$08$BconVYwp22s1nsQX8.X6iewac3bdgoQ4QPY2Qc8GaLrynqT4M7HfW', NULL, 'minhtruong93gtvt@gmail.com123', NULL, NULL, NULL, '/2NIvlwW8v3xZvePhIOIS.', 1528295320, 1528295517, 1, '', 'Do Minh Minh', 'MatoCreative', '0985767862', '25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `about_lang`
--
ALTER TABLE `about_lang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `about_id` (`about_id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `blog_lang`
--
ALTER TABLE `blog_lang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `blog_id` (`blog_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `category_lang`
--
ALTER TABLE `category_lang`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`product_category_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id` (`product_category_id`);

--
-- Chỉ mục cho bảng `product_lang`
--
ALTER TABLE `product_lang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`product_id`);

--
-- Chỉ mục cho bảng `site_sessions`
--
ALTER TABLE `site_sessions`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Chỉ mục cho bảng `tour_date`
--
ALTER TABLE `tour_date`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `tour_date_lang`
--
ALTER TABLE `tour_date_lang`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`) USING BTREE,
  ADD KEY `fk_users_groups_users1_idx` (`user_id`) USING BTREE,
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `about_lang`
--
ALTER TABLE `about_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `blog_lang`
--
ALTER TABLE `blog_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `category_lang`
--
ALTER TABLE `category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `opening`
--
ALTER TABLE `opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `product_category_lang`
--
ALTER TABLE `product_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `product_lang`
--
ALTER TABLE `product_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tour_date`
--
ALTER TABLE `tour_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tour_date_lang`
--
ALTER TABLE `tour_date_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `about_lang`
--
ALTER TABLE `about_lang`
  ADD CONSTRAINT `about_lang_ibfk_1` FOREIGN KEY (`about_id`) REFERENCES `about` (`id`);

--
-- Các ràng buộc cho bảng `blog_lang`
--
ALTER TABLE `blog_lang`
  ADD CONSTRAINT `blog_lang_ibfk_1` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`);

--
-- Các ràng buộc cho bảng `category_lang`
--
ALTER TABLE `category_lang`
  ADD CONSTRAINT `category_lang_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

--
-- Các ràng buộc cho bảng `product_category_lang`
--
ALTER TABLE `product_category_lang`
  ADD CONSTRAINT `product_category_lang_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`);

--
-- Các ràng buộc cho bảng `product_lang`
--
ALTER TABLE `product_lang`
  ADD CONSTRAINT `product_lang_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `tour_date`
--
ALTER TABLE `tour_date`
  ADD CONSTRAINT `tour_date_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
