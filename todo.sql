-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for todo
CREATE DATABASE IF NOT EXISTS `todo` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `todo`;

-- Dumping structure for table todo.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
	(19, 2, 'Developpement', 'Placeat culpa adipi', '2019-11-15 14:22:15', '2019-11-19 08:15:18'),
	(20, 2, 'Design', 'Design', '2019-11-19 08:15:25', '2019-11-19 08:15:25'),
	(21, 2, 'Sport', 'Sport', '2019-11-19 08:15:38', '2019-11-19 08:15:38'),
	(22, 3, 'hehe', 'ok', '2019-11-19 08:15:38', '2019-11-19 08:15:38');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table todo.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table todo.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_10_27_225623_create_tasks_table', 1),
	(5, '2019_10_27_225726_create_categories_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table todo.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table todo.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Ongoing',
  `start` date NOT NULL DEFAULT '2019-11-05',
  `deadline` date NOT NULL DEFAULT '2019-11-05',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo.tasks: ~18 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `category_id`, `user_id`, `name`, `description`, `status`, `start`, `deadline`, `created_at`, `updated_at`) VALUES
	(182, 22, 3, 'Kdddddo', 'Eveniet sunt maiorddddd', 'Ongoing', '1971-06-27', '2015-12-03', '2019-11-28 10:26:01', '2019-11-28 10:58:30'),
	(190, 22, 3, 'sdsf', 'sdsf', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:31', '2019-11-28 11:10:31'),
	(191, 22, 3, 'sdsfsdfsffs', 'sdsfsdfsffs', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:34', '2019-11-28 11:10:34'),
	(192, 22, 3, 'sdsfsdfsffsfffff', 'sdsfsdfsffsfffff', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:37', '2019-11-28 11:10:37'),
	(193, 22, 3, 'sdfsdfsd', 'sdfsdfsd', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:42', '2019-11-28 11:10:42'),
	(194, 22, 3, 'vsdvsddsv', 'vsdvsddsv', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:46', '2019-11-28 11:10:46'),
	(195, 22, 3, 'vsdvsddsvvsvs', 'vsdvsddsvvsvs', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:49', '2019-11-28 11:10:49'),
	(196, 22, 3, 'bbbb', 'bbbb', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:54', '2019-11-28 11:10:54'),
	(197, 22, 3, 'ljkljkljkl', 'ljkljkljkl', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:10:59', '2019-11-28 11:10:59'),
	(198, 22, 3, 'jkljkljkljl', 'jkljkljkljl', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:11:02', '2019-11-28 11:11:02'),
	(199, 22, 3, 'jkljkljljkllkjklj', 'jkljkljljkllkjklj', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:11:06', '2019-11-28 11:11:06'),
	(200, 22, 3, '213123123', '213123123', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:11:09', '2019-11-28 11:11:09'),
	(201, 22, 3, 'fdsfsdf', 'fdsfsdf', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 11:27:25', '2019-11-28 11:27:25'),
	(243, 19, 2, 'XXX', 'XXX', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 14:20:39', '2019-12-30 19:17:36'),
	(244, 21, 2, 'X', 'X', 'Done', '2019-11-28', '2019-11-28', '2019-11-28 14:21:08', '2019-12-06 17:50:11'),
	(245, 20, 2, 'qsd', 'qsd', 'Done', '2019-11-28', '2019-11-28', '2019-11-28 14:22:52', '2019-12-06 17:50:14'),
	(246, 19, 2, 'sscx', 'sscx', 'Ongoing', '2019-11-28', '2019-11-28', '2019-11-28 14:24:33', '2019-12-30 19:17:48'),
	(247, 19, 2, 'sdsdfsf', 'sdsdfsf', 'Ongoing', '2019-12-30', '2019-12-30', '2019-12-30 19:17:45', '2019-12-30 19:17:45');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Dumping structure for table todo.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table todo.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(2, 'Imad LASRI', 'imadlasri@hotmail.Fr', NULL, '$2y$10$NdvWbWLYbztLeihTsO45x.bUElF7g1gpwpX9Gz2Hvdxj8iEUo7bp.', 'ywcpWa5wH8sHdDyEIh0QDefNuirHzNG5CgOeihFqguzWT5i3KsODyNzwSR9H', '2019-11-12 13:15:57', '2019-11-12 13:15:57'),
	(3, 'Nikola Tesla', 'nikola.tesla@gmail.com', NULL, '$2y$10$2EgVXD.oAJ7QqqxNYz94BOmW8/TRyKsTQHiLlwH8HWgruR6WB1uTe', NULL, '2019-11-12 13:58:06', '2019-11-12 13:58:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
