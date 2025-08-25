-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2025 at 03:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_porto_rafli_raihan`
--

-- --------------------------------------------------------

--
-- Table structure for table `me`
--

CREATE TABLE `me` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fb` varchar(200) NOT NULL,
  `ig` varchar(200) NOT NULL,
  `github` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `profile_pic` varchar(200) NOT NULL,
  `summary` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `me`
--

INSERT INTO `me` (`id`, `email`, `name`, `password`, `fb`, `ig`, `github`, `linkedin`, `profile_pic`, `summary`, `created_at`, `updated_at`) VALUES
(1, 'rafli365@atmin.me', 'Rafli Raihan', 'raf1234', 'https://www.facebook.com/fli.raihan/', 'https://www.instagram.com/rafli_r4ihan/', 'https://github.com/rafli-raihan', 'https://www.linkedin.com/in/muhammad-rafli-raihan-6336a4294', '1755971406-BackgroundEraser_20250821_002012630~2_enhanced.jpg', 'Tech Enthusiast, Freelancer & Musician(sort of...) born and raised in Jakarta, Indonesia. Whether I am immersed in my university life or exploring art and the latest of technology, I am always fueled by curiosity, always up to the challenges, and really passionate to push things to its limit (yes, even myself).\r\n\r\nYou can find me doing anything I can/love/must do every day. Whether it is freelancing, programming, writing music, performing in a band, or just simply surfing the web like everyone else.', '2025-08-19 01:38:51', '2025-08-25 00:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `project_link` varchar(250) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `portofolio`
--

INSERT INTO `portofolio` (`id`, `image`, `title`, `content`, `project_link`, `is_active`, `created_at`, `updated_at`) VALUES
(2, '1755968743-1755590701-unsplash.png', 'Unsplash.com', 'Unsplash stock photos', 'https://unsplash.com/@rafli_raihan', 1, '2025-08-19 08:27:03', NULL),
(3, '1756085855-Nexcent.png', 'Nexcent Landing Page', 'Landing Page with Bootstrap', 'https://nexcent-landing-page-nyqe.vercel.app/', 1, '2025-08-25 01:37:35', NULL),
(4, '1756086240-CV.png', 'CV Website', 'My online CV with VueJs and Vite', 'https://rafli-raihan.github.io/', 1, '2025-08-25 01:44:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `logo` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `is_active`, `logo`, `title`, `description`, `created_at`, `updated_at`) VALUES
(3, 1, '1756084993-streamline-color--code-monitor-1-flat.png', 'Web Development', 'Fullstack Web Development with frameworks or classic JAM stack', '2025-08-25 00:52:58', '2025-08-25 01:23:13'),
(5, 1, '1756085025-streamline-color--phone-mobile-phone-flat.png', 'App Development', 'Multiplatform App Development with Flutter', '2025-08-25 01:23:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` varchar(150) NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'Advanced', 90, '2025-08-21 08:19:57', '2025-08-21 08:25:26'),
(2, 'CSS ', 'Intermediate', 75, '2025-08-21 08:21:23', NULL),
(3, 'TailwindCSS ', 'Intermediate', 80, '2025-08-21 08:22:04', NULL),
(4, 'PHP  ', 'Beginner', 45, '2025-08-21 08:22:52', NULL),
(6, 'Flutter', 'Intermediate', 70, '2025-08-21 08:24:16', NULL),
(7, 'VueJS', 'Intermediate', 70, '2025-08-21 08:25:07', NULL),
(8, 'Laravel', 'Beginner', 30, '2025-08-21 08:25:51', '2025-08-21 08:41:39'),
(9, 'mySQL', 'Beginner', 50, '2025-08-21 09:01:17', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `me`
--
ALTER TABLE `me`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `me`
--
ALTER TABLE `me`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
