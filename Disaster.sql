-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2017 at 06:41 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Disaster`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `alt_reported_incidents`
-- (See below for the actual view)
--
CREATE TABLE `alt_reported_incidents` (
`id` int(10) unsigned
,`RepotedBy` varchar(191)
,`ReportedEmail` varchar(191)
,`Lon` varchar(191)
,`Lat` varchar(191)
,`Date` date
,`Time` time
,`Level` int(11)
,`Type` varchar(191)
);

-- --------------------------------------------------------

--
-- Table structure for table `Approved_Incidents`
--

CREATE TABLE `Approved_Incidents` (
  `id` int(11) DEFAULT NULL,
  `ReportedBy` varchar(191) DEFAULT NULL,
  `ReportedEmail` varchar(191) DEFAULT NULL,
  `Lon` varchar(50) DEFAULT NULL,
  `Lat` varchar(50) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `Level` int(11) DEFAULT NULL,
  `Type` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Approved_Incidents`
--

INSERT INTO `Approved_Incidents` (`id`, `ReportedBy`, `ReportedEmail`, `Lon`, `Lat`, `Date`, `Time`, `Level`, `Type`) VALUES
(1, 'Ayesh Jayasekara', 'ejkpac@gmail.com', '79.86566637402348', '6.863326845029782', '2017-12-29', '11:07:28', 5, 'Storm');

-- --------------------------------------------------------

--
-- Table structure for table `Disaster_Types`
--

CREATE TABLE `Disaster_Types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Disaster_Types`
--

INSERT INTO `Disaster_Types` (`id`, `type`) VALUES
(6, 'Earthquake'),
(1, 'Fire'),
(3, 'Flood'),
(8, 'Landslide'),
(9, 'Other Accidents'),
(5, 'Roadside Accident'),
(2, 'Robbery'),
(4, 'Storm'),
(7, 'Tsunami');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_12_27_175045_create_RolesTable', 1),
(4, '2017_12_27_175412_create_Trigger', 1),
(5, '2017_12_27_205610_create_table_DisasterTypes', 1),
(6, '2017_12_27_213653_create_table_ReportedIncidents', 1),
(7, '2017_12_28_132117_create_tableslast', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Reported_Incidents`
--

CREATE TABLE `Reported_Incidents` (
  `id` int(10) UNSIGNED NOT NULL,
  `RepotedBy` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ReportedEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Lat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Type` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Level` int(11) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `UserRoles`
--

CREATE TABLE `UserRoles` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `UserRoles`
--

INSERT INTO `UserRoles` (`email`, `role`) VALUES
('asd@asd.com', 'USER'),
('ejkpac@gmail.com', 'USER'),
('man@asd.com', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'asd@asd.com', '$2y$10$NeoYW44fBnfWBHMTi8OyCuPo3ZBFVoVcHO9VDqqXGCUUfa5DjGhh2', 'DQ5THdKVYUe4YEubK7rV9lyrE74wQMXIBl3Bc0kV1CsE8bDXAU6WoncyoyiS', '2017-12-29 05:36:30', '2017-12-29 05:36:30'),
(2, 'Manager', 'man@asd.com', '$2y$10$jtUJJOGSLduHueiaXE1fUOvzE343CAd7lO.Oz2GW09bUhN7uXBkD6', 'XP181B96j8WL8T0c63YYT2i6rxmwkxCSKBAg46K8kC0Dh6pw64Q8a4Nz0TYP', '2017-12-29 05:36:49', '2017-12-29 05:36:49'),
(3, 'Ayesh Jayasekara', 'ejkpac@gmail.com', '$2y$10$mDJcqPLrhpM2sY5LqeJX4.007X9fpuJ8cZVxLoFbfsFvNywznpHEq', 'YYDccvCdiGnU8zNFLoGbVtsvvDmZkxGYFon6OjDw3rebOnwFZ4kyVRHubp1E', '2017-12-29 05:37:06', '2017-12-29 05:37:06');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `AddUserRole` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    INSERT into UserRoles VALUES (new.email, 'USER');
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure for view `alt_reported_incidents`
--
DROP TABLE IF EXISTS `alt_reported_incidents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `disaster`.`alt_reported_incidents`  AS  select `a`.`id` AS `id`,`a`.`RepotedBy` AS `RepotedBy`,`a`.`ReportedEmail` AS `ReportedEmail`,`a`.`Lon` AS `Lon`,`a`.`Lat` AS `Lat`,`a`.`Date` AS `Date`,`a`.`Time` AS `Time`,`a`.`Level` AS `Level`,`b`.`type` AS `Type` from (`disaster`.`reported_incidents` `a` join `disaster`.`disaster_types` `b`) where (`a`.`Type` = `b`.`id`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Disaster_Types`
--
ALTER TABLE `Disaster_Types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `disaster_types_type_unique` (`type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `Reported_Incidents`
--
ALTER TABLE `Reported_Incidents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `UserRoles`
--
ALTER TABLE `UserRoles`
  ADD UNIQUE KEY `userroles_email_unique` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Disaster_Types`
--
ALTER TABLE `Disaster_Types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Reported_Incidents`
--
ALTER TABLE `Reported_Incidents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
