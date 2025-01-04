-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 06:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `in_your_dream`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'In Your Dream adalah studio foto profesional yang berlokasi di kota Bengkalis, tempat di mana momen-momen istimewa Anda diabadikan dengan sepenuh hati. IYD Studio menawarkan layanan fotografi untuk berbagai keperluan, mulai dari pemotretan pernikahan, potret pribadi dan keluarga, hingga acara-acara spesial lainnya.', 'about_us/XvCllK0mzabzGYfb6q7As6uopYBCDgzAN6O4CcmN.png', '2024-12-30 14:31:11', '2024-12-30 14:31:11');

-- --------------------------------------------------------

--
-- Table structure for table `backgrounds`
--

CREATE TABLE `backgrounds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `backgrounds`
--

INSERT INTO `backgrounds` (`id`, `name`, `image_path`, `description`, `is_free`, `created_at`, `updated_at`) VALUES
(1, 'Red Photobox', 'background/comXdER3i289JCKgxePqYwKVPtNxC9lpKTQyHdAA.png', 'Background Gratis', 1, '2024-12-30 10:22:39', '2024-12-30 10:22:39'),
(2, 'Green Photobox', 'background/SSujb0Ye99Q5R8HEkKW0qqK5Kh9xPzqN23x6v2Gm.png', 'Background Gratis', 1, '2024-12-30 10:23:05', '2024-12-30 10:23:05'),
(3, 'Abstract 1', 'background/pX2IYaybCmyb0axYBebI3gsbWorWdsiDi5qCG9QN.jpg', 'Background Gratis', 1, '2024-12-30 10:23:41', '2024-12-30 10:23:41'),
(4, 'Abstract 2', 'background/1DG1dNlER2AUrJ28KusSW0Cr0tTYIHbBDggRQXSz.jpg', 'Background Gratis', 1, '2024-12-30 10:24:55', '2024-12-30 10:24:55'),
(5, 'Beige', 'background/pYIG5oamRSV2wTNtpsbDopHw5Kyr2vex4ubQVo2q.png', 'Background Gratis', 1, '2024-12-30 10:25:28', '2024-12-30 10:25:28');

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
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `package_id`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 1, 'gallery/WbFoL8k6dXLcXNvZguxAuJZTSiSZekZwL62K6450.jpg', '2024-12-29 04:30:20', '2024-12-29 04:30:20'),
(2, 4, 'gallery/xT7A83WiDBFLqK483TXKAqZMVbQsxh7AQKqy1ony.jpg', '2024-12-29 04:30:37', '2024-12-29 04:30:37'),
(3, 7, 'gallery/W2bCgAXqZOy8bEFIPKtMjhHYx7Pmw1WkIjAnytV5.jpg', '2024-12-29 04:30:49', '2024-12-29 04:30:49'),
(4, 1, 'gallery/VfNNHFTqfxFj1q5Ezza8CassW38sK1ixALHsgxNY.jpg', '2024-12-29 04:31:02', '2024-12-29 04:31:02'),
(5, 8, 'gallery/gYXNeziBi1d37z6HdnvHveMhmbusYEuW4jTnLGDb.jpg', '2024-12-29 04:31:20', '2024-12-29 04:31:20'),
(6, 7, 'gallery/7CEUsSK6TxLDPpI26CjehBFoPbxZkn0gDjqVApyW.jpg', '2024-12-29 04:31:38', '2024-12-29 04:32:34'),
(7, 2, 'gallery/ReiGq4I2HyU7TD7w9WXIWL29nnJyNGBFCSvOxLlN.jpg', '2024-12-29 04:31:39', '2024-12-29 04:31:39');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_22_063628_add_columns_to_users_table', 2),
(6, '2024_12_22_084853_create_packages_table', 3),
(7, '2024_12_22_084915_create_galleries_table', 3),
(8, '2024_12_22_093609_create_about_us_table', 4),
(9, '2024_12_22_140048_create_photographers_table', 5),
(10, '2024_12_28_021040_create_selfphoto_photobox_table', 6),
(11, '2024_12_28_023906_add_status_to_selfphoto_photobox_table', 7),
(12, '2024_12_28_135415_create_weddings_table', 8),
(13, '2024_12_28_135617_create_weddings_table', 9),
(14, '2024_12_28_145450_add_payment_details_to_weddings_table', 10),
(15, '2024_12_28_150023_add_status_to_weddings_table', 11),
(16, '2024_12_28_150913_modify_email_column_in_weddings_table', 12),
(17, '2024_12_28_151157_modify_payment_method_column_in_weddings_table', 13),
(18, '2024_12_29_055335_create_other_packages_table', 14),
(19, '2024_12_29_060846_add_columns_to_other_packages_table', 15),
(20, '2024_12_29_072334_add_address_to_users_table', 16),
(21, '2024_12_29_073521_modify_other_packages_table', 17),
(22, '2024_12_29_073946_reorder_user_id_column_in_other_packages_table', 18),
(23, '2024_12_29_074204_reorder_user_id_column_in_other_packages_table', 19),
(24, '2024_12_29_074331_reorder_user_id_column_in_other_packages_table', 20),
(25, '2024_12_29_074547_recreate_other_packages_table', 21),
(26, '2024_12_29_075457_update_weddings_table', 22),
(27, '2024_12_29_081515_recreate_wedding_packages_table', 23),
(28, '2024_12_29_084638_recreate_selfphoto_photobox_packages_table', 24),
(29, '2024_12_29_091728_modify_price_column_in_packages_table', 25),
(30, '2024_12_29_111111_create_backgrounds_table', 26),
(31, '2024_12_29_130914_add_payment_proof_to_wedding_packages_table', 27),
(32, '2024_12_29_135505_add_payment_proof_to_selfphoto_photobox_packages_table', 28),
(33, '2024_12_29_144544_add_location_to_other_packages_table', 29),
(34, '2024_12_29_145154_add_location_to_other_packages_table', 30),
(35, '2024_12_30_214208_add_payment_proof_to_other_packages_table', 31),
(36, '2024_12_30_215003_create_reservations_table', 32),
(37, '2024_12_31_001938_create_ratings_table', 33);

-- --------------------------------------------------------

--
-- Table structure for table `other_packages`
--

CREATE TABLE `other_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `package_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `additional_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `admin_fee` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Payment','Confirmed','Cancelled','Reserved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'Selfphoto/Photobox', 60000.00, 'Test', '2024-11-26 06:06:25', '2024-11-26 06:06:25'),
(2, 'Wedding', 1800000.00, 'Test', '2024-11-26 06:06:58', '2024-11-26 06:06:58'),
(3, 'Wisuda', 100000.00, 'Test', '2024-11-26 06:07:24', '2024-11-26 06:07:24'),
(4, 'Ulang Tahun', 100000.00, 'Test', '2024-11-26 06:07:24', '2024-11-26 06:07:24'),
(5, 'Prewedding', 100000.00, 'Test', '2024-11-26 06:07:24', '2024-11-26 06:07:24'),
(6, 'Tunangan', 100000.00, 'Test', '2024-11-26 06:07:24', '2024-11-26 06:07:24'),
(7, 'Akikah', 100000.00, 'Test', '2024-11-26 06:07:24', '2024-11-26 06:07:24'),
(8, 'Event Lainnya', 100000.00, 'Test', '2024-11-26 06:07:24', '2024-11-26 06:07:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reservation_date` date NOT NULL,
  `package_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `package_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `selfphoto_photobox_packages`
--

CREATE TABLE `selfphoto_photobox_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `schedule_date` date NOT NULL,
  `schedule_time` time NOT NULL,
  `background_choice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_friends` int(11) NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` decimal(10,2) NOT NULL,
  `additional_person_cost` decimal(10,2) DEFAULT NULL,
  `admin_fee` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Payment','Confirmed','Cancelled','Reserved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'manual',
  `level` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wedding_packages`
--

CREATE TABLE `wedding_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `event_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_price` int(11) NOT NULL,
  `additional_price` int(11) NOT NULL DEFAULT 0,
  `admin_fee` int(11) NOT NULL DEFAULT 3000,
  `total_price` int(11) NOT NULL,
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Pending','Payment','Confirmed','Cancelled','Reserved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backgrounds`
--
ALTER TABLE `backgrounds`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backgrounds_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_package_id_foreign` (`package_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_packages`
--
ALTER TABLE `other_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_packages_user_id_foreign` (`user_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_reservation_id_foreign` (`reservation_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `selfphoto_photobox_packages`
--
ALTER TABLE `selfphoto_photobox_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `selfphoto_photobox_packages_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wedding_packages`
--
ALTER TABLE `wedding_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wedding_packages_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `backgrounds`
--
ALTER TABLE `backgrounds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `other_packages`
--
ALTER TABLE `other_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `selfphoto_photobox_packages`
--
ALTER TABLE `selfphoto_photobox_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wedding_packages`
--
ALTER TABLE `wedding_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `other_packages`
--
ALTER TABLE `other_packages`
  ADD CONSTRAINT `other_packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_reservation_id_foreign` FOREIGN KEY (`reservation_id`) REFERENCES `reservations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `selfphoto_photobox_packages`
--
ALTER TABLE `selfphoto_photobox_packages`
  ADD CONSTRAINT `selfphoto_photobox_packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wedding_packages`
--
ALTER TABLE `wedding_packages`
  ADD CONSTRAINT `wedding_packages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;