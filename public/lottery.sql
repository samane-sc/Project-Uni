-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2021 at 07:47 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lottery`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lotterys`
--

DROP TABLE IF EXISTS `lotterys`;
CREATE TABLE IF NOT EXISTS `lotterys` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_id` int(11) NOT NULL,
  `ucount` int(11) NOT NULL,
  `wcount` int(11) NOT NULL,
  `reward` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `alert` tinyint(1) NOT NULL DEFAULT '0',
  `ftime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mtime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lotterys`
--

INSERT INTO `lotterys` (`id`, `name`, `description`, `owner_id`, `ucount`, `wcount`, `reward`, `type`, `state`, `alert`, `ftime`, `mtime`, `created_at`, `updated_at`) VALUES
(4, 'ماشین', 'etc', 3, 10, 2, 'پول', 1, -1, 0, '1400/2/28', '2021/5/18', '2021-05-15 16:04:14', '2021-05-17 19:55:11'),
(5, 'بانک', 'etc', 3, 100, 10, 'سفر حج', 0, -1, 0, '1400/2/29', '2021/05/19', NULL, '2021-05-17 19:55:21'),
(8, 'tala', 'etc', 4, 3, 1, 'طلا', 0, -2, 0, '1400/2/28', '2021/5/18', '2021-05-17 20:04:34', '2021-05-17 23:22:41'),
(7, 'khodro', 'etc', 4, 10, 2, 'خودرو', 0, 1, 0, '1400/2/30', '2021/5/20', '2021-05-17 11:46:56', '2021-05-17 11:59:39'),
(9, 'final', 'etc', 5, 10, 2, 'پول', 1, 1, 0, '1400/2/29', '2021/5/19', '2021-05-18 01:18:29', '2021-05-18 01:19:26'),
(10, 'the end', 'etc', 5, 10, 1, 'پول', 0, -1, 0, '1400/2/29', '2021/5/19', '2021-05-18 01:18:55', '2021-05-18 03:07:49'),
(11, 'what', 'etc', 5, 10, 2, 'پول', 0, 1, 0, '1400/2/29', '2021/5/19', '2021-05-18 02:43:59', '2021-05-18 02:48:19'),
(14, 'hi', 'etc', 5, 10, 2, 'پول', 0, 1, 0, '1400/2/29', '2021/5/19', '2021-05-18 02:46:42', '2021-05-18 02:48:25'),
(13, 'which', 'etc', 5, 10, 1, 'پول', 0, 1, 0, '1400/2/30', '2021/5/20', '2021-05-18 02:44:47', '2021-05-18 02:48:12'),
(15, 'hello', 'etc', 5, 12, 2, 'پول', 0, 1, 0, '1400/2/31', '2021/5/21', '2021-05-18 02:47:02', '2021-05-18 02:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `lottery_user`
--

DROP TABLE IF EXISTS `lottery_user`;
CREATE TABLE IF NOT EXISTS `lottery_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL DEFAULT '0',
  `lottery_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lottery_user_lottery_id_foreign` (`lottery_id`),
  KEY `lottery_user_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lottery_user`
--

INSERT INTO `lottery_user` (`id`, `state`, `lottery_id`, `user_id`) VALUES
(13, 0, 7, 3),
(15, 1, 8, 5),
(18, 1, 8, 3),
(17, 2, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_14_004123_create_lotterys_table', 1),
(5, '2021_05_14_004507_create_lottery_user_table', 1),
(6, '2021_05_14_011021_create_lottery_state_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `type`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'samane', 'samanesc@gmail.com', 1, NULL, '$2y$10$RLKeo815exDrqEvxmkDdBOFrNjtE3quc8w48bGIgU3E7OYPDw2edO', NULL, '2021-05-13 21:15:09', '2021-05-13 21:15:09'),
(3, 'kazem', '24ever@gmail.com', 0, NULL, '$2y$10$lA2TLg1zrSGLbsbdq3fG8ed26P91T3Ekt9dls4l/MloRaCh5tGoC2', NULL, '2021-05-14 21:04:03', '2021-05-14 21:04:03'),
(4, '24ever', '24ever10@gmail.com', 0, NULL, '$2y$10$ELrewFFqOghyBPKq5Ckyc.hFueR7Zqnb1N2gAfTY9XwCrKaK6cbVW', NULL, '2021-05-16 18:25:36', '2021-05-16 18:25:36'),
(5, 'aylin', 'aylinhseini811@gmail.com', 0, NULL, '$2y$10$Pl4qOAm81YU22s.Itqi.qOfdLPD/oc6T1jFLTvaG9DHyzZ4sI/4We', NULL, '2021-05-17 20:52:21', '2021-05-17 20:52:21'),
(6, 'm58403444', 'm58403444@gmail.com', 0, NULL, '$2y$10$RN7ZehIykWpp/zOGpRPTK.8tB5sb61fk38cdt2G0oGKXYmgYK9nUC', NULL, '2021-05-17 20:53:14', '2021-05-17 20:53:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
