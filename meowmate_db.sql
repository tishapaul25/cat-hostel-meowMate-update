-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2025 at 11:17 PM
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
-- Database: `meowmate_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostel_providers`
--

CREATE TABLE `hostel_providers` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `experience_years` int(11) NOT NULL,
  `own_cats` varchar(50) NOT NULL,
  `qualifications` text DEFAULT NULL,
  `property_type` varchar(100) NOT NULL,
  `max_capacity` int(11) NOT NULL,
  `services` text DEFAULT NULL,
  `facility_description` text DEFAULT NULL,
  `overnight_rate` decimal(10,2) NOT NULL,
  `day_care_rate` decimal(10,2) DEFAULT NULL,
  `grooming_rate` decimal(10,2) DEFAULT NULL,
  `id_document` varchar(255) DEFAULT NULL,
  `facility_photos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`facility_photos`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hostel_providers`
--

INSERT INTO `hostel_providers` (`id`, `full_name`, `email`, `phone`, `address`, `experience_years`, `own_cats`, `qualifications`, `property_type`, `max_capacity`, `services`, `facility_description`, `overnight_rate`, `day_care_rate`, `grooming_rate`, `id_document`, `facility_photos`, `created_at`) VALUES
(3, 'Aminul Islam', 'aminiul1990@gmail.com', '01308553959', 'Namapara 3 Rastar mor, Monjil Housing Gate', 1, 'yes', 'sdfg', 'apartment', 1, 'overnight_boarding,day_care,grooming,medical_care,pickup_delivery,emergency_care', 'sdf', 36.00, 32.00, 32.00, 'https://i.ibb.co/twbgXsT8/28a58548e0c5.webp', '[\"https:\\/\\/i.ibb.co\\/5dLcVBt\\/13f0c66216f6.jpg\"]', '2025-08-23 19:53:08'),
(5, 'rgh', 'business.innovainteriors@gmail.com', '01764227527', 'Dhaka Cantonment', 3, 'yes', 'dfg', 'house', 4, 'overnight_boarding,day_care,grooming,medical_care,pickup_delivery', 'dfg', 23.00, 34.00, 15.00, 'https://i.ibb.co/twbgXsT8/28a58548e0c5.webp', '[\"https:\\/\\/i.ibb.co\\/5dLcVBt\\/13f0c66216f6.jpg\"]', '2025-08-23 19:59:46'),
(6, 'Pet House Bd', 'pethousebd@gmail.com', '01764227527', 'Dhaka Cantonment', 1, 'yes', 'Pet', 'house', 4, 'overnight_boarding', 'Fully functional', 10.00, 5.00, 20.00, 'https://i.ibb.co/twbgXsT8/28a58548e0c5.webp', '[\"https:\\/\\/i.ibb.co\\/ycQXYX5j\\/aa8ce5ec4946.jpg\"]', '2025-08-23 20:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `short_desc` text DEFAULT NULL,
  `full_desc` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `sku` varchar(100) DEFAULT NULL,
  `weight` decimal(10,2) DEFAULT NULL,
  `status` enum('draft','active','inactive') DEFAULT NULL,
  `image_url` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `short_desc`, `full_desc`, `price`, `sale_price`, `stock`, `sku`, `weight`, `status`, `image_url`, `image`, `created_at`) VALUES
(13, 'Whiskas Dry Cat Food', 'Cat Food', '1kg ', 'Whiskas Dry Cat Food for Kitten and Adult', 790.00, 0.00, 10, '', 1.00, 'active', '', 'https://i.ibb.co/BbGBJYB/c311f7fe1289.webp', '2025-08-20 20:17:54');

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `owner_name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0,
  `day_rate` decimal(10,2) NOT NULL DEFAULT 0.00,
  `license_no` varchar(80) DEFAULT NULL,
  `services_json` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`services_json`)),
  `rating` decimal(3,2) DEFAULT 0.00,
  `status` enum('pending','active','suspended') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rent_requests`
--

CREATE TABLE `rent_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `provider_id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `cats_count` int(11) NOT NULL DEFAULT 1,
  `notes` text DEFAULT NULL,
  `status` enum('pending','accepted','rejected','cancelled') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(245) NOT NULL DEFAULT '0',
  `entry_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `username`, `address`, `password`, `role`, `status`, `entry_date`) VALUES
(12, 'Aminul', 'Islam', 'aminulislamashik2020@gmail.com', '01764227527', 'aminul.islam', '', '$2y$10$LyizTMS0Itn/m9xEEZ1a1uNaLa4nCXELLdMPvARtqSHUkziMwV0ba', '0', '0', '2025-08-14'),
(13, 'Aminul', 'Islam', 'aminiul1990@gmail.com', '01764227527', 'aminul.islam', '', '$2y$10$mFunK2r9Mhrtwv20DKQUZO649gl9ZfMDImvKGaoBGAl0SEA.r/Oly', 'super_admin', '0', '2025-08-14'),
(14, 'Abu', 'Yahia', 'galib@gmail.com', '01308553959', 'abu.yahia', '', '$2y$10$19fZvNVfUQJGR6UyWPZvBO.WQxFSQa38rhv/0DKfw3Tt4BASLVpri', 'super_admin', '0', '2025-08-14'),
(15, 'Tisha', 'Paul', 'tish420@gmail.com', '01308553959', 'tisha.paul', '', '$2y$10$O2ZO3Zt.cxaE.c26VhsvUuB16ork1OBW3EYamQhJPuK/C7JTK5mCm', '0', '0', '2025-08-14'),
(18, 'Easin', 'Midul', 'midul@gmail.com', '01623737345', 'easin.midul', '', '$2y$10$gK8K3CKu5M/qEzKEtw3l.OlKqjrGL.hxeDlt9FtKRXxn9s8CDW7Qy', '0', '0', '2025-08-16'),
(20, 'midul', 'easin', 'midul120@gmail.com', '01764558569', 'midul.easin', '', '$2y$10$D2.dWppluW5nq2743XycueKyZBJyGkN.OLnd6RIPqqDKsa3qpmah2', 'super_admin', '0', '2025-08-16'),
(21, 'malu', 'nam', 'nam12@gmail.com', '01308553959', 'malu.nam', '', '$2y$10$vKz75eKVkE5iWWZwDL4C.umh4y132yL1F3YHUl1WRyTmYsFJMNQa6', 'super_admin', '0', '2025-08-18'),
(22, 'Abul', 'Hala', 'abul420@gmail.com', '01308553959', 'abul.hala', '', '$2y$10$9FHS7Qsv8yef8s.qYLtC1.OxzzwILWB6nfXn9.yMQUfnH772Vc9PC', 'super_admin', 'active', '2025-08-19'),
(23, 'mali', 'af', 'malu12@gmail.com', '01308553959', 'mali.af', '', '$2y$10$40RMJwAFczzd3SVQ6QpKMuNmxFviv0D/K1O1XqbM/oesU2Vuam3Ta', 'provider', 'active', '2025-08-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel_providers`
--
ALTER TABLE `hostel_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_requests`
--
ALTER TABLE `rent_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hostel_providers`
--
ALTER TABLE `hostel_providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_requests`
--
ALTER TABLE `rent_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `rent_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rent_requests`
--
ALTER TABLE `rent_requests`
  ADD CONSTRAINT `rent_requests_ibfk_1` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
