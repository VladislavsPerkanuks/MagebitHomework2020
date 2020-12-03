@@ -0,0 +1,66 @@
-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2020 at 07:41 AM
-- Server version: 8.0.21
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vladislavs_homework`
--

-- --------------------------------------------------------

--
-- Table structure for table `users_email`
--

DROP TABLE IF EXISTS `users_email`;
CREATE TABLE IF NOT EXISTS `users_email` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users_email`
--

INSERT INTO `users_email` (`id`, `email`, `date`) VALUES
(1, 'vladislavs@gmail.com', '2020-11-30'),
(2, 'perkanuks@inbox.lv', '2020-11-02'),
(3, 'imants@gmail.com', '2020-11-18'),
(9, 'igors.matvejevs@gmail.com', '2020-12-01'),
(5, 'Gorbans@gmail.com', '2020-11-11'),
(6, 'perkanuks2@gmail.com', '2020-11-30'),
(7, 'perkanuks3@yahoo.com', '2020-11-25'),
(10, 'arbuzs@yahoo.com', '2020-12-01'),
(11, 'leksika@inbox.lv', '2020-12-01'),
(12, 'valalenjko@inbox.com', '2020-12-01'),
(14, 'ivans@gmail.com', '2020-12-02'),
(15, 'vladis@gmail.com', '2020-12-02'),
(16, 'mazais.ezitis@inbox.lv', '2020-12-02'),
(17, 'keksis@gmail.com', '2020-12-02'),
(20, 'vladperk@outlook.com', '2020-12-02'),
(19, 'vladislavs@yahoo.com', '2020-12-02'),
(21, 'yeah@kl.lv', '2020-12-02'),
(22, 'petrova.vasilenko@yahoo.com', '2020-12-02');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;