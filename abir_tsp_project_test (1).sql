-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2024 at 07:07 PM
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
-- Database: `abir_tsp_project_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'M.M.R Aabir', 'admin@gmail.com', '$2y$10$m3O/YRWDCYVI15.cFRPCVe5PN4uY94KGa2YY7J9VAisFuqZYGbD8u', NULL, '2024-12-13 07:44:27', '2024-12-13 07:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_email` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_name`, `branch_email`, `admin_id`, `number`, `address`, `status`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Savar Courier Service', 'savar@gmail.com', 1, '01638149965', 'South Rajashon\r\nSavar,Dhaka', 'active', 'images/20241213134648.jpg', NULL, '2024-12-13 07:46:48', '2024-12-13 07:46:48'),
(2, 'Dhaka Courier Service', 'dhaka@gmail.com', 1, '01638149964', 'Purana Paltan,Dhaka', 'active', 'images/20241213134732.jpg', NULL, '2024-12-13 07:47:32', '2024-12-13 07:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `owner_name`, `phone`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Health Revulation', 'Dr. Mujibul Haque', '01638149960', 'images/20241213135332.jpg', 'active', '2024-12-13 07:53:32', '2024-12-13 07:53:32'),
(2, 'American Health Center', 'Dr. Jahangir Kabir', '01984521355', 'images/20241213135403.jpg', 'active', '2024-12-13 07:54:03', '2024-12-13 07:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `unit_id`, `cost`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 250, 'active', NULL, '2024-12-13 07:52:16', '2024-12-13 07:52:16'),
(2, 2, 350, 'active', NULL, '2024-12-13 07:52:32', '2024-12-13 07:52:32'),
(3, 3, 1000, 'active', NULL, '2024-12-13 07:52:46', '2024-12-13 07:52:46'),
(4, 4, 5000, 'active', NULL, '2024-12-13 07:53:06', '2024-12-13 07:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `courierdetails`
--

CREATE TABLE `courierdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_type` enum('Individual','Company') NOT NULL,
  `company_name` varchar(50) DEFAULT NULL,
  `sender_name` varchar(50) NOT NULL,
  `sender_email` varchar(50) NOT NULL,
  `sender_phone` varchar(15) NOT NULL,
  `sender_address` varchar(50) NOT NULL,
  `receiver_name` varchar(50) NOT NULL,
  `receiver_email` varchar(50) NOT NULL,
  `receiver_phone` varchar(50) NOT NULL,
  `receiver_address` varchar(50) NOT NULL,
  `sender_branch_id` int(11) NOT NULL,
  `receiver_branch_id` int(11) NOT NULL,
  `sender_agent_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `status` enum('Processing','On the way','Shipped','Delivered') NOT NULL DEFAULT 'Processing',
  `item_description` varchar(250) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `payment_type` enum('Sender Payment','Receiver Payment') NOT NULL DEFAULT 'Sender Payment',
  `payment_status` varchar(20) NOT NULL,
  `payment_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courierdetails`
--

INSERT INTO `courierdetails` (`id`, `sender_type`, `company_name`, `sender_name`, `sender_email`, `sender_phone`, `sender_address`, `receiver_name`, `receiver_email`, `receiver_phone`, `receiver_address`, `sender_branch_id`, `receiver_branch_id`, `sender_agent_id`, `manager_id`, `status`, `item_description`, `tracking_id`, `unit_name`, `cost`, `quantity`, `total_cost`, `comment`, `grand_total`, `payment_type`, `payment_status`, `payment_amount`, `created_at`, `updated_at`) VALUES
(1, 'Individual', NULL, 'Abdullah Al Mamun', 'abdullah@gmail.com', '01638149960', '58/1,Savar,Dhaka', 'Mostafizur Rahman', 'abirm6133@gmail.com', '01736815328', 'Paltan,Dhaka', 1, 2, 1, 1, 'On the way', 'Liquid', '1734098430A', '1', '250', 5, 1250, 'Breakable', 1250, 'Sender Payment', 'Paid', 1250, '2024-12-13 08:00:30', '2024-12-13 10:21:42'),
(2, 'Individual', NULL, 'Mostafizur Rahman', 'abirm6133@gmail.com', '01736815328', 'South Rajashon\r\nSavar,Dhaka', 'Hayata Rahman', 'hayata@gmail.com', '01638149960', '58/1,South Rajashon,Savar,Dhaka', 2, 1, 2, 2, 'On the way', 'Doll', '1734098530A', '2', '350', 2, 700, 'Gift', 700, 'Sender Payment', 'Paid', 700, '2024-12-13 08:02:10', '2024-12-13 10:22:09'),
(3, 'Individual', NULL, 'Mostafizur Rahman', 'abirm6133@gmail.com', '01736815328', 'Gulistan,Savar,Dhaka', 'Hayata Rahman', 'hayata@gmail.com', '01638149960', 'lol', 1, 2, 1, 1, 'Processing', 'vvjhhhj', '1734101894A', '3', '1000', 3, 3000, 'jvh', 3000, 'Sender Payment', 'Paid', 3000, '2024-12-13 08:58:14', '2024-12-13 10:21:38'),
(4, 'Individual', NULL, 'Nafis Ahmed', 'nafis@gmail.com', '01231459875', '47/1,Dhaka', 'Rafi Ahmed', 'rafi@gmail.com', '01254213658', '58/1', 2, 1, 2, 2, 'Processing', 'vcfgtre', '1734105949A', '4', '5000', 1, 5000, 'hgvbcf', 5000, 'Sender Payment', 'Paid', 5000, '2024-12-13 10:05:49', '2024-12-13 10:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `branch_id` varchar(255) NOT NULL,
  `manager_id` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `phone`, `branch_id`, `manager_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'staff1', 'staff1@gmail.com', '$2y$10$UszaOizfjRz9OvuN31p7aOOeAyFhTbze3HPZtsT6l8zjNsXonWSaC', '01638149960', '1', '1', 'active', NULL, '2024-12-13 07:55:17', '2024-12-13 07:55:17'),
(2, 'staff2', 'staff2@gmail.com', '$2y$10$CEFCZxJQdgjULTfNKIa2.eYs548B7qsHqCcuVzhVC9K/yxGc9u31u', '01736815328', '2', '2', 'active', NULL, '2024-12-13 07:56:42', '2024-12-13 07:56:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `number` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'inactive',
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `email`, `password`, `branch_id`, `number`, `status`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Manager1', 'manager1@gmail.com', '$2y$10$6iT4e735Qv1hPy4grn0ix.TplO7o.7JKkv/yaLXYKW8VqmA1iOT7m', 1, '01984521355', 'active', 'images/20241213134833.jpg', NULL, '2024-12-13 07:48:33', '2024-12-13 07:48:33'),
(2, 'Manager2', 'manager2@gmail.com', '$2y$10$LCJwTOze5h2hnZt2JyDoceKF96MsxOrgezqnOLEm7GRmjDuCxnEvm', 2, '01736815328', 'active', 'images/20241213134929.jpg', NULL, '2024-12-13 07:49:29', '2024-12-13 07:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2024_11_21_142022_create_admins_table', 1),
(18, '2024_11_21_163117_create_managers_table', 1),
(19, '2024_11_22_064103_create_branches_table', 1),
(20, '2024_12_01_120350_create_units_table', 1),
(21, '2024_12_01_150503_create_costs_table', 1),
(22, '2024_12_02_120038_create_companies_table', 1),
(23, '2024_12_07_165034_create_employees_table', 1),
(24, '2024_12_08_155328_create_courierdetails_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oil Box', 'active', NULL, '2024-12-13 07:50:38', '2024-12-13 07:50:38'),
(2, 'Box 1Kg', 'active', NULL, '2024-12-13 07:50:50', '2024-12-13 07:50:50'),
(3, 'By-Cycle', 'active', NULL, '2024-12-13 07:51:02', '2024-12-13 07:51:02'),
(4, 'Fridge', 'active', NULL, '2024-12-13 07:51:13', '2024-12-13 07:51:13'),
(5, 'Mobille', 'active', NULL, '2024-12-13 07:51:24', '2024-12-13 07:51:24'),
(6, 'Motor-Cycle', 'active', NULL, '2024-12-13 07:51:34', '2024-12-13 07:51:34'),
(7, 'Table', 'active', NULL, '2024-12-13 07:51:49', '2024-12-13 07:51:49'),
(8, 'Paper 1Kg', 'active', NULL, '2024-12-13 07:52:01', '2024-12-13 07:52:01');

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_branch_email_unique` (`branch_email`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courierdetails`
--
ALTER TABLE `courierdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `managers_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courierdetails`
--
ALTER TABLE `courierdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
