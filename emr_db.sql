-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2026 at 11:42 PM
-- Server version: 8.4.3
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_lists`
--

CREATE TABLE `patient_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `dx` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admitted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_lists`
--

INSERT INTO `patient_lists` (`id`, `photo`, `first_name`, `last_name`, `gender`, `dob`, `dx`, `status`, `created_at`, `updated_at`) VALUES
(5, NULL, 'Rey', 'Qit', 'M', '2026-03-09', 'sadas', 'Admitted', '2026-03-08 12:38:32', '2026-03-08 12:38:32'),
(6, 'patients/Z2hq5jf6Wk1VjUZ4PwfNQqBybeD427nLnLh2qZUl.jpg', 'Rey', 'Qit', 'M', '2026-03-09', 'sadas', 'Admitted', '2026-03-08 12:39:04', '2026-03-08 12:39:04'),
(7, 'patients/ImPY2pFHqZuJXtgIOQNDObk9Wk6NGmONrENeqrDz.jpg', 'qweqwe', 'qwe', 'F', '2026-03-27', 'weq', 'Admitted', '2026-03-08 12:40:20', '2026-03-08 12:40:20'),
(8, NULL, 'asda', 'adsasd', 'F', '2026-03-09', 'asd', 'Admitted', '2026-03-08 12:44:13', '2026-03-08 12:44:13'),
(9, 'patients/y9EIgMW7oNdAsWsYBHuZp3Ujzb0wE6e6QugTcb6E.jpg', 'asda', 'adsasd', 'F', '2026-03-09', 'asd', 'Admitted', '2026-03-08 12:44:49', '2026-03-08 12:44:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_lists`
--
ALTER TABLE `patient_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_lists`
--
ALTER TABLE `patient_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
