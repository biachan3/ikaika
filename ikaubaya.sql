-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 03:28 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ikaubaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `idarticle` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `header` varchar(45) DEFAULT NULL,
  `content` longtext NOT NULL,
  `footnote` varchar(45) DEFAULT NULL,
  `date` date NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `ticket_id` varchar(45) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `faculty` varchar(45) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`ticket_id`, `name`, `year`, `faculty`, `id`) VALUES
('2023-02-07 12:33:40', 'wijay', 2019, 'teknik', 8),
('2023-02-07 12:33:40', 'oentoro', 2018, 'fbe', 9);

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `account` varchar(45) NOT NULL,
  `description` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account`, `description`) VALUES
(1, 'bank test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `bank_id` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `message` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `startevent` datetime DEFAULT NULL,
  `endevent` datetime DEFAULT NULL,
  `price` bigint(25) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `startevent`, `endevent`, `price`, `category_id`) VALUES
(1, 'test', 'test', '2023-02-07 18:23:28', '2023-02-09 18:23:28', 30000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'test', 'test'),
(3, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` varchar(45) NOT NULL,
  `event_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `amount` bigint(20) NOT NULL,
  `qr` varchar(45) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `proof` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `event_id`, `bank_id`, `users_id`, `date`, `amount`, `qr`, `status`, `proof`) VALUES
('2023-02-07 12:15:01', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php61E4.tmp'),
('2023-02-07 12:15:05', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php6F62.tmp'),
('2023-02-07 12:15:07', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php7994.tmp'),
('2023-02-07 12:15:10', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php83E6.tmp'),
('2023-02-07 12:16:05', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php5B4C.tmp'),
('2023-02-07 12:17:55', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php9D7.tmp'),
('2023-02-07 12:18:43', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\phpC5D5.tmp'),
('2023-02-07 12:19:20', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php5545.tmp'),
('2023-02-07 12:23:33', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php30A8.tmp'),
('2023-02-07 12:23:56', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php8AFE.tmp'),
('2023-02-07 12:27:48', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php1621.tmp'),
('2023-02-07 12:28:07', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php5DF8.tmp'),
('2023-02-07 12:28:09', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php67CD.tmp'),
('2023-02-07 12:28:18', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php8A4A.tmp'),
('2023-02-07 12:30:22', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php708F.tmp'),
('2023-02-07 12:32:49', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\phpAF16.tmp'),
('2023-02-07 12:32:52', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\phpB949.tmp'),
('2023-02-07 12:33:01', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\phpDB39.tmp'),
('2023-02-07 12:33:18', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php1E3F.tmp'),
('2023-02-07 12:33:21', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php29E8.tmp'),
('2023-02-07 12:33:40', 1, 1, 5, '2023-02-07', 60000, 'nanti', 0, 'C:\\Users\\Administrator\\AppData\\Local\\Temp\\php75D6.tmp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `year` year(4) NOT NULL,
  `work` varchar(45) NOT NULL,
  `faculty` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `year`, `work`, `faculty`) VALUES
(4, 'golden', 's123@gmail.com', NULL, '$2y$10$FuJiHLVkAFV0NKbnMP4XceKJw6l8Jk92c2htZsVM/s.deoR3dutxG', NULL, '2023-02-06 05:14:15', '2023-02-06 05:14:15', 1, 2019, 'Mahasiswa', 'Teknik'),
(5, 'test', 'test@gmail.com', NULL, '$2y$10$RF99KEb9uU7NIrI6C2Cnq.7qY..JSGD/a1Em0opsTgyN6DapcoI0u', NULL, '2023-02-07 03:52:24', '2023-02-07 03:52:24', 1, 2019, 'Penggangguran', 'Tkenik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`idarticle`),
  ADD KEY `fk_article_users1_idx` (`users_id`),
  ADD KEY `fk_article_category1_idx` (`category_id`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attendee_ticket1_idx` (`ticket_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`bank_id`,`users_id`),
  ADD KEY `fk_bank_has_users_users1_idx` (`users_id`),
  ADD KEY `fk_bank_has_users_bank_idx` (`bank_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_event_category1_idx` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_donation_event1_idx` (`event_id`),
  ADD KEY `fk_ticket_bank1_idx` (`bank_id`),
  ADD KEY `fk_ticket_users1_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_role1_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_article_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_article_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendees`
--
ALTER TABLE `attendees`
  ADD CONSTRAINT `fk_attendee_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `fk_bank_has_users_bank` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bank_has_users_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `fk_event_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `fk_donation_event1` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_bank1` FOREIGN KEY (`bank_id`) REFERENCES `banks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ticket_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_role1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
