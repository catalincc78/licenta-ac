-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 01:00 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamsv2_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'CatalinC1', '$2y$10$a2CvADx00/Y7WK2BrZEqZ.uFd/lP7.QshXy4558HuwcJNy.CMYK4G', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_04_12_123019_create_admins_table', 1),
(5, '2022_04_13_092724_create_players_table', 1),
(6, '2022_04_13_103139_create_teams_table', 1),
(7, '2022_04_13_130936_create_player_team_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `market_value` int(11) NOT NULL,
  `post` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`post`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `first_name`, `last_name`, `age`, `market_value`, `post`, `created_at`, `updated_at`) VALUES
(1, 'Ottilie', 'Ullrich', 20, 4827416, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(2, 'Destiny', 'Kunde', 17, 24032916, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(3, 'Felton', 'Reinger', 26, 10622989, '[\"GK\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(4, 'Camren', 'Torp', 22, 23603445, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(5, 'Santiago', 'Ziemann', 31, 13362442, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(6, 'Nichole', 'Rogahn', 34, 22724542, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(7, 'Hyman', 'Price', 17, 21169810, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(8, 'King', 'Rogahn', 22, 16970867, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(9, 'Lavonne', 'Hickle', 30, 10244899, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(10, 'Matilda', 'Reilly', 18, 2964727, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(11, 'Herminio', 'Brakus', 32, 12956518, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(12, 'Gus', 'Harber', 25, 3247466, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(13, 'Clark', 'Nienow', 32, 294172, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(14, 'Helena', 'Wiegand', 34, 13418504, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(15, 'Cyril', 'Haley', 25, 9402002, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(16, 'Hillard', 'Gleason', 31, 20563939, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(17, 'Lelah', 'O\'Connell', 29, 2812914, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(18, 'Gracie', 'Ruecker', 28, 3524073, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(19, 'Devon', 'Spinka', 23, 29090637, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(20, 'Anne', 'Quigley', 31, 15445058, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(21, 'Easton', 'Hills', 26, 6930920, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(22, 'Calista', 'Hoppe', 29, 25787366, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(23, 'Kiana', 'Jaskolski', 21, 28975252, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(24, 'Marco', 'Doyle', 34, 28613663, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(25, 'Janelle', 'Ritchie', 22, 4903547, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(26, 'Aletha', 'Kirlin', 24, 12499948, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(27, 'Lon', 'Oberbrunner', 17, 3696364, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(28, 'Flavie', 'Cummerata', 34, 21362144, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(29, 'Rebecca', 'Torphy', 27, 3001961, '[\"RW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(30, 'Tyson', 'Jaskolski', 30, 8827333, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(31, 'Alvera', 'Koelpin', 22, 26668950, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(32, 'Oleta', 'Casper', 24, 23493297, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(33, 'Krystina', 'Carter', 27, 28304983, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(34, 'Scotty', 'Rolfson', 33, 20374684, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(35, 'Archibald', 'Veum', 28, 4636451, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(36, 'Kiel', 'Goyette', 30, 22388992, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(37, 'Anthony', 'White', 32, 8050597, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(38, 'Vicente', 'Mitchell', 23, 10015623, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(39, 'Aliyah', 'Schaden', 22, 10981898, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(40, 'Rickie', 'Cruickshank', 25, 1168536, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(41, 'Abigayle', 'Schulist', 30, 4100814, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(42, 'Desiree', 'Schimmel', 20, 3699692, '[\"RW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(43, 'Harley', 'Kutch', 22, 29185431, '[\"RW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(44, 'Caroline', 'Koelpin', 33, 25154379, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(45, 'Eleonore', 'Rippin', 26, 12308639, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(46, 'Ivory', 'Gislason', 29, 4373862, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(47, 'Dayna', 'Ward', 23, 18969496, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(48, 'Tabitha', 'Mante', 30, 13178137, '[\"RW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(49, 'Khalid', 'Toy', 33, 20440727, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(50, 'Geo', 'D\'Amore', 30, 21978982, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(51, 'Jerod', 'Boyle', 30, 420814, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(52, 'Randi', 'Jenkins', 30, 22768927, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(53, 'Lisa', 'Nienow', 17, 14262866, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(54, 'Vladimir', 'Daniel', 31, 10737820, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(55, 'Rosalee', 'Abbott', 23, 21785648, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(56, 'Josh', 'Keeling', 29, 25947838, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(57, 'Clementine', 'Kihn', 29, 14230201, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(58, 'Emmalee', 'Champlin', 26, 5491615, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(59, 'Alisha', 'Kunde', 26, 24808692, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(60, 'Judah', 'Kutch', 29, 22123713, '[\"GK\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(61, 'Dedrick', 'Stroman', 28, 19160412, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(62, 'Irving', 'Hill', 31, 19733491, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(63, 'Tomas', 'Dach', 22, 16809872, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(64, 'Isaac', 'Marquardt', 26, 2516370, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(65, 'Ignacio', 'Hettinger', 28, 10650311, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(66, 'Robb', 'Hammes', 25, 28421236, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(67, 'Tressie', 'King', 21, 4448248, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(68, 'Cleve', 'Deckow', 26, 19219726, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(69, 'Adelle', 'O\'Connell', 27, 1207852, '[\"GK\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(70, 'Enos', 'Champlin', 25, 20047095, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(71, 'Nova', 'Greenholt', 33, 21325391, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(72, 'Sofia', 'Jones', 24, 13809788, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(73, 'Ignacio', 'McLaughlin', 34, 4967223, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(74, 'Emily', 'Wiza', 26, 21471247, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(75, 'Earlene', 'Sipes', 29, 1746570, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(76, 'Hermina', 'Dooley', 31, 24641922, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(77, 'Nelle', 'Lubowitz', 21, 25776421, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(78, 'Cary', 'Homenick', 18, 5703483, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(79, 'Matteo', 'Gorczany', 33, 17075041, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(80, 'Carlos', 'Kuhn', 30, 22762813, '[\"LW\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(81, 'Ashleigh', 'Kshlerin', 27, 13556852, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(82, 'Antonietta', 'Bogan', 21, 20137827, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(83, 'Maci', 'Bogan', 17, 23489978, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(84, 'Ana', 'O\'Kon', 34, 26879834, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(85, 'Ward', 'Ernser', 24, 18602558, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(86, 'Justen', 'Botsford', 21, 12377386, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(87, 'Eulalia', 'Flatley', 25, 7961655, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(88, 'Jorge', 'O\'Hara', 34, 21713785, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(89, 'Max', 'Jones', 19, 29028317, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(90, 'Alycia', 'Champlin', 22, 6353034, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(91, 'Geo', 'Grady', 31, 28514517, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(92, 'Jon', 'O\'Connell', 28, 902726, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(93, 'Jerad', 'Bogan', 34, 14692567, '[\"LF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(94, 'Jaeden', 'Beatty', 33, 2957395, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(95, 'Tamara', 'Koelpin', 29, 21704630, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(96, 'Ole', 'Larkin', 31, 13100721, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(97, 'Fannie', 'Zemlak', 34, 24740869, '[\"CF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(98, 'Raina', 'Wisoky', 17, 1232578, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(99, 'Rosendo', 'Block', 23, 23451354, '[\"RF\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(100, 'Danial', 'Stokes', 24, 25170275, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(101, 'Zella', 'Boehm', 25, 3746602, '[\"CM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(102, 'Jacquelyn', 'Bashirian', 28, 22476244, '[\"LB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(103, 'Mackenzie', 'Leffler', 18, 5363077, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(104, 'Maiya', 'Mueller', 22, 25852170, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(105, 'Joey', 'Bergstrom', 30, 3963327, '[\"CB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(106, 'Jayson', 'Little', 22, 8411642, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(107, 'Orlo', 'Kihn', 26, 21784492, '[\"RB\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(108, 'Creola', 'Connelly', 22, 1058389, '[\"CAM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(109, 'Evelyn', 'Paucek', 31, 6931723, '[\"ST\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37'),
(110, 'Waino', 'Trantow', 34, 11663187, '[\"CDM\"]', '2022-05-03 08:43:37', '2022-05-03 08:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `player_team`
--

CREATE TABLE `player_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `player_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `player_team`
--

INSERT INTO `player_team` (`id`, `player_id`, `team_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 1, NULL, NULL),
(6, 6, 1, NULL, NULL),
(7, 7, 1, NULL, NULL),
(8, 8, 1, NULL, NULL),
(9, 9, 1, NULL, NULL),
(10, 10, 1, NULL, NULL),
(11, 11, 1, NULL, NULL),
(12, 12, 2, NULL, NULL),
(13, 13, 2, NULL, NULL),
(14, 14, 2, NULL, NULL),
(15, 15, 2, NULL, NULL),
(16, 16, 2, NULL, NULL),
(17, 17, 2, NULL, NULL),
(18, 18, 2, NULL, NULL),
(19, 19, 2, NULL, NULL),
(20, 20, 2, NULL, NULL),
(21, 21, 2, NULL, NULL),
(22, 22, 2, NULL, NULL),
(23, 23, 3, NULL, NULL),
(24, 24, 3, NULL, NULL),
(25, 25, 3, NULL, NULL),
(26, 26, 3, NULL, NULL),
(27, 27, 3, NULL, NULL),
(28, 28, 3, NULL, NULL),
(29, 29, 3, NULL, NULL),
(30, 30, 3, NULL, NULL),
(31, 31, 3, NULL, NULL),
(32, 32, 3, NULL, NULL),
(33, 33, 3, NULL, NULL),
(34, 34, 4, NULL, NULL),
(35, 35, 4, NULL, NULL),
(36, 36, 4, NULL, NULL),
(37, 37, 4, NULL, NULL),
(38, 38, 4, NULL, NULL),
(39, 39, 4, NULL, NULL),
(40, 40, 4, NULL, NULL),
(41, 41, 4, NULL, NULL),
(42, 42, 4, NULL, NULL),
(43, 43, 4, NULL, NULL),
(44, 44, 4, NULL, NULL),
(45, 45, 5, NULL, NULL),
(46, 46, 5, NULL, NULL),
(47, 47, 5, NULL, NULL),
(48, 48, 5, NULL, NULL),
(49, 49, 5, NULL, NULL),
(50, 50, 5, NULL, NULL),
(51, 51, 5, NULL, NULL),
(52, 52, 5, NULL, NULL),
(53, 53, 5, NULL, NULL),
(54, 54, 5, NULL, NULL),
(55, 55, 5, NULL, NULL),
(56, 56, 6, NULL, NULL),
(57, 57, 6, NULL, NULL),
(58, 58, 6, NULL, NULL),
(59, 59, 6, NULL, NULL),
(60, 60, 6, NULL, NULL),
(61, 61, 6, NULL, NULL),
(62, 62, 6, NULL, NULL),
(63, 63, 6, NULL, NULL),
(64, 64, 6, NULL, NULL),
(65, 65, 6, NULL, NULL),
(66, 66, 6, NULL, NULL),
(67, 67, 7, NULL, NULL),
(68, 68, 7, NULL, NULL),
(69, 69, 7, NULL, NULL),
(70, 70, 7, NULL, NULL),
(71, 71, 7, NULL, NULL),
(72, 72, 7, NULL, NULL),
(73, 73, 7, NULL, NULL),
(74, 74, 7, NULL, NULL),
(75, 75, 7, NULL, NULL),
(76, 76, 7, NULL, NULL),
(77, 77, 7, NULL, NULL),
(78, 78, 8, NULL, NULL),
(79, 79, 8, NULL, NULL),
(80, 80, 8, NULL, NULL),
(81, 81, 8, NULL, NULL),
(82, 82, 8, NULL, NULL),
(83, 83, 8, NULL, NULL),
(84, 84, 8, NULL, NULL),
(85, 85, 8, NULL, NULL),
(86, 86, 8, NULL, NULL),
(87, 87, 8, NULL, NULL),
(88, 88, 8, NULL, NULL),
(89, 89, 9, NULL, NULL),
(90, 90, 9, NULL, NULL),
(91, 91, 9, NULL, NULL),
(92, 92, 9, NULL, NULL),
(93, 93, 9, NULL, NULL),
(94, 94, 9, NULL, NULL),
(95, 95, 9, NULL, NULL),
(96, 96, 9, NULL, NULL),
(97, 97, 9, NULL, NULL),
(98, 98, 9, NULL, NULL),
(99, 99, 9, NULL, NULL),
(100, 100, 10, NULL, NULL),
(101, 101, 10, NULL, NULL),
(102, 102, 10, NULL, NULL),
(103, 103, 10, NULL, NULL),
(104, 104, 10, NULL, NULL),
(105, 105, 10, NULL, NULL),
(106, 106, 10, NULL, NULL),
(107, 107, 10, NULL, NULL),
(108, 108, 10, NULL, NULL),
(109, 109, 10, NULL, NULL),
(110, 110, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `rank`, `created_at`, `updated_at`) VALUES
(1, 'Lake Connor', 1, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(2, 'South Aliyahland', 2, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(3, 'Lake Hannahbury', 1, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(4, 'Jadeland', 4, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(5, 'Port Marley', 1, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(6, 'Faheyhaven', 3, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(7, 'North Charlene', 4, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(8, 'South Martine', 9, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(9, 'South Esther', 3, '2022-05-03 08:43:36', '2022-05-03 08:43:36'),
(10, 'New Eldon', 10, '2022-05-03 08:43:36', '2022-05-03 08:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rektoweR15', '$2y$10$a2CvADx00/Y7WK2BrZEqZ.uFd/lP7.QshXy4558HuwcJNy.CMYK4G', NULL, '2022-05-03 08:44:44', '2022-05-03 08:44:44'),
(2, 'CatalinC2', '$2y$10$/vTEuF2EODKVsAoGtsH1juTd8UL4GtngdYvhuGfAtKtwwjU8J/6Q6', NULL, '2023-05-29 07:44:33', '2023-05-29 07:44:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `player_team`
--
ALTER TABLE `player_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `player_team`
--
ALTER TABLE `player_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
