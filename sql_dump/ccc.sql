-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ccc
CREATE DATABASE IF NOT EXISTS `ccc` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `ccc`;

-- Dumping structure for table ccc.views
CREATE TABLE IF NOT EXISTS `views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_products` int(11) NOT NULL,
  `view_time` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `views_product_id_fk` (`id_products`),
  CONSTRAINT `views_product_id_fk` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table ccc.views: ~55 rows (approximately)
INSERT INTO `views` (`id`, `id_products`, `view_time`) VALUES
	(2, 1, '2024-11-27 07:18:45'),
	(3, 1, '2024-11-24 07:29:06'),
	(4, 84, '2024-11-27 07:29:16'),
	(5, 60, '2024-11-27 08:05:06'),
	(6, 60, '2024-11-27 08:05:31'),
	(7, 51, '2024-11-25 08:08:57'),
	(8, 47, '2024-11-16 08:08:57'),
	(9, 49, '2024-11-26 08:08:57'),
	(10, 19, '2024-11-20 08:08:57'),
	(11, 6, '2024-11-18 08:08:57'),
	(12, 31, '2024-11-20 08:08:57'),
	(13, 54, '2024-11-24 08:08:57'),
	(14, 61, '2024-11-22 08:08:57'),
	(15, 5, '2024-11-27 08:08:57'),
	(16, 17, '2024-11-18 08:08:57'),
	(17, 78, '2024-11-27 08:08:57'),
	(18, 73, '2024-11-18 08:08:57'),
	(19, 10, '2024-11-21 08:08:57'),
	(20, 7, '2024-11-15 08:08:57'),
	(21, 39, '2024-11-24 08:08:57'),
	(22, 3, '2024-11-22 08:08:57'),
	(23, 91, '2024-11-21 08:08:57'),
	(24, 61, '2024-11-18 08:08:57'),
	(25, 50, '2024-11-20 08:08:57'),
	(26, 16, '2024-11-25 08:08:57'),
	(27, 1, '2024-11-27 09:29:18'),
	(28, 1, '2024-11-27 09:32:22'),
	(29, 8, '2024-11-27 09:32:53'),
	(30, 8, '2024-11-27 09:33:01'),
	(31, 34, '2024-11-27 09:37:15'),
	(32, 34, '2024-11-27 09:37:47'),
	(33, 7, '2024-11-27 10:57:05'),
	(34, 1, '2024-11-27 10:59:57'),
	(35, 64, '2024-11-27 11:07:29'),
	(36, 1, '2024-11-27 11:10:42'),
	(37, 1, '2024-11-27 15:21:50'),
	(38, 19, '2024-11-27 15:23:06'),
	(39, 18, '2024-11-27 15:23:31'),
	(40, 23, '2024-11-27 15:42:15'),
	(41, 34, '2024-11-27 15:44:52'),
	(42, 1, '2024-11-27 15:49:26'),
	(43, 1, '2024-11-27 15:49:29'),
	(44, 1, '2024-11-27 15:49:29'),
	(45, 1, '2024-11-27 15:49:29'),
	(46, 1, '2024-11-27 15:49:29'),
	(47, 34, '2024-11-27 15:49:32'),
	(48, 4, '2024-11-27 15:49:41'),
	(49, 2, '2024-11-27 16:14:21'),
	(50, 2, '2024-11-27 16:14:42'),
	(51, 2, '2024-11-27 16:15:38'),
	(52, 2, '2024-11-27 16:15:47'),
	(53, 2, '2024-11-27 16:16:19'),
	(54, 1, '2024-11-27 16:18:15'),
	(55, 34, '2024-11-27 16:24:30'),
	(56, 70, '2024-11-27 16:53:16');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
