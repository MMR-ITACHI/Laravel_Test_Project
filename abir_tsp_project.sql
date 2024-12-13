-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 07:12 PM
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
-- Database: `abir_tsp_project`
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
(1, 'M.M.R Aabir', 'admin@gmail.com', '$2y$10$sWSnWHPcL9u7wZIOmtfws.7PpYKOFpxhgOxB/L/RtGBHC7.C52fBy', NULL, '2024-12-02 11:41:27', '2024-12-02 11:41:27');

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
(1, 'Savar Courier Point', 'savar@gmail.com', 1, '01971324922', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 'active', 'images/20241207120930.jpg', NULL, '2024-12-07 06:09:30', '2024-12-07 06:09:30'),
(2, 'Dhaka Courier Point', 'dhaka@gmail.com', 1, '01971324922', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 'active', 'images/20241207121016.jpg', NULL, '2024-12-07 06:10:16', '2024-12-07 06:10:16'),
(6, 'Raj Courier Service', 'raj@gmail.com', 1, '01638149944', '58/1,South Rajashon,Savar,Dhaka', 'active', 'images/20241207154844.jpg', NULL, '2024-12-07 09:48:44', '2024-12-07 09:48:44');

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
(1, 'American Health Center', 'Dr. Mujibul Haque', '01971452133', 'images/nophoto.jpg', 'active', '2024-12-02 11:41:27', '2024-12-02 11:41:27');

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
(1, 1, 5000, 'active', NULL, '2024-12-02 11:41:27', '2024-12-04 10:29:18'),
(2, 2, 5000, 'active', NULL, '2024-12-04 10:06:45', '2024-12-04 10:06:45'),
(3, 3, 4500, 'active', NULL, '2024-12-04 10:29:37', '2024-12-04 10:29:37'),
(4, 4, 1000, 'active', NULL, '2024-12-04 10:29:50', '2024-12-04 10:29:50'),
(5, 5, 5000, 'active', NULL, '2024-12-04 10:30:02', '2024-12-04 10:30:02'),
(6, 6, 250, 'active', NULL, '2024-12-04 10:30:19', '2024-12-04 10:30:19'),
(8, 7, 450, 'active', NULL, '2024-12-05 09:16:09', '2024-12-05 09:16:09'),
(9, 8, 200, 'active', NULL, '2024-12-05 09:17:41', '2024-12-05 09:17:41');

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
  `receiver_branch_id` int(11) NOT NULL,
  `sender_agent_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `status` enum('Processing','On the way','Out of Delivery','Delivered') NOT NULL DEFAULT 'Processing',
  `item_description` varchar(250) NOT NULL,
  `tracking_id` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `comment` varchar(50) DEFAULT NULL,
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

INSERT INTO `courierdetails` (`id`, `sender_type`, `company_name`, `sender_name`, `sender_email`, `sender_phone`, `sender_address`, `receiver_name`, `receiver_email`, `receiver_phone`, `receiver_address`, `receiver_branch_id`, `sender_agent_id`, `manager_id`, `status`, `item_description`, `tracking_id`, `unit_name`, `cost`, `quantity`, `total_cost`, `comment`, `grand_total`, `payment_type`, `payment_status`, `payment_amount`, `created_at`, `updated_at`) VALUES
(4, 'Company', 'fdkffdskvn', 'Akm Akash', 'akash@gmail.com', '01971324922', '85/1', 'Arafat Hossain', 'arafat@gmail.com', '01632145588', 'hdfdjjb', 6, 1, 5, 'Out of Delivery', 'gdscxvd', '1733674629HashiRama', '7', '10', 10, 100, 'hfscxvd', 100, 'Sender Payment', '', 100, '2024-12-08 10:17:09', '2024-12-11 11:32:00'),
(5, 'Company', 'fdkffdskvn', 'Akm Akash', 'akash@gmail.com', '01971324922', '58/1', 'Arafat Hossain', 'arafat@gmail.com', '01632145588', '57/1', 2, 2, 4, 'Processing', 'hbvgf', '1733754794acer', '1', '500', 1, 500, 'tgfcvdr', 500, 'Sender Payment', 'unpaid', 500, '2024-12-09 08:33:14', '2024-12-09 08:33:14'),
(6, 'Company', 'fdkffdskvn', 'Akm Akash', 'akash@gmail.com', '01971324922', 'lkjnbh', 'Arafat Hossain', 'arafat@gmail.com', '01632145588', 'jhb', 2, 2, 4, 'Processing', 'gfdxc', '1733754972acer', '7', '500', 1, 500, 'iuyhgf', 500, 'Receiver Payment', 'unpaid', 500, '2024-12-09 08:36:12', '2024-12-09 08:36:12'),
(7, 'Individual', 'MD MAHABUB ALAM', 'MOSTAFIZUR RAHMAN', 'abirm6133@gmail.com', '01971324922', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 'MOSTAFIZUR RAHMAN', 'mostafizurrahmanabir4444@gmail.com', '01971324922', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 6, 1, 5, 'Out of Delivery', 'jhgvbc', '1733767064acer', '7', '5000', 11, 55000, 'jhuytg', 55000, 'Receiver Payment', 'unpaid', 55000, '2024-12-09 11:57:44', '2024-12-11 11:32:39'),
(8, 'Company', 'MD MAHABUB ALAM', 'AHNAF RAHMAN', 'ahnaf@gmail.com', '01401581435', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 'MOSTAFIZUR RAHMAN', 'mostafizurrahmanabir4444@gmail.com', '01401581435', '13/1-A, Shyamoli Road-02', 6, 1, 5, 'Out of Delivery', 'jhbg', '1733767149acer', '2', '500', 7, 3500, 'okiujh', 3500, 'Sender Payment', 'unpaid', 3500, '2024-12-09 11:59:09', '2024-12-11 12:07:24'),
(9, 'Individual', 'MD MAHABUB ALAM', 'MOSTAFIZUR RAHMAN', 'abirm6133@gmail.com', '01971324922', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 'MOSTAFIZUR RAHMAN', 'mostafizurrahmanabir4444@gmail.com', '01401581435', '13/1-A, Shyamoli Road-02', 6, 1, 5, 'Out of Delivery', 'jhnb', '1733767401acer', '2', '500', 2, 1000, 'hbvgf', 1000, 'Sender Payment', 'Paid', 1000, '2024-12-09 12:03:21', '2024-12-11 12:09:39'),
(10, 'Individual', 'MD MAHABUB ALAM', 'MOSTAFIZUR RAHMAN', 'abirm6133@gmail.com', '01971324922', '58/1,SOUTH RAJASHON\r\nSAVAR,DHAKA', 'MOSTAFIZUR RAHMAN', 'mostafizurrahmanabir4444@gmail.com', '01401581435', '13/1-A, Shyamoli Road-02', 6, 1, 5, 'On the way', 'nbhgvf', '1733767464acer', '2', '500', 1, 500, 'hgvbft', 500, 'Sender Payment', 'Paid', 500, '2024-12-09 12:04:24', '2024-12-11 11:32:29'),
(11, 'Individual', 'fdkffdskvn', 'Akm Akash', 'akash@gmail.com', '01971324922', '58/1', 'Arafat Hossain', 'arafat@gmail.com', '01632145588', '95/1', 2, 2, 4, 'Processing', 'nbvgfc', '1733935994acer', '1', '1000', 2, 2000, 'ytrdfcx', 2000, 'Sender Payment', 'Paid', 2000, '2024-12-11 10:53:14', '2024-12-11 10:53:14'),
(12, 'Individual', NULL, 'Abir Ahmed', 'abir@gmail.com', '01971324514', 'South Rajashon,Savar,Dhaka', 'Md Sanbir Ahmed', 'sanbir@gmail.com', '01639874512', 'Gulisyhan,Dhaka', 1, 3, 2, 'On the way', 'hdfvcndjf', '1733936740acer', '1', '1200', 3, 3600, 'hhfvj', 3600, 'Sender Payment', 'Paid', 3600, '2024-12-11 11:05:40', '2024-12-11 11:05:55'),
(13, 'Individual', NULL, 'Akm Akash', 'akash@gmail.com', '01971324514', 'jnbhgfv', 'Arafat Hossain', 'arafat@gmail.com', '01632145588', 'hjgjh', 1, 3, 2, 'Processing', 'bkjbjbjkj', '1733937337a', '2', '1200', 2, 2400, 'jkbjk', 2400, 'Sender Payment', 'Paid', 2400, '2024-12-11 11:15:37', '2024-12-11 11:15:37');

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
(1, 'staff4', 'staff4@gmail.com', '$2y$10$y4.I9ck/9SN7SVxydcv7ZO2jQcbMXjR3hIkyqyJBmRfDJP/ibQ/RS', '01736815328', '6', '5', 'active', NULL, '2024-12-07 10:57:38', '2024-12-07 10:57:38'),
(2, 'staff5', 'staff5@gmail.com', '$2y$10$vmB0AlfCVTy/23qArbDhp.xIAZvhe7MOpEPvvDNu9P8p0KqJd5IY2', '01638149960', '2', '4', 'active', NULL, '2024-12-07 11:51:04', '2024-12-07 11:51:04'),
(3, 'staff6', 'staff6@gmail.com', '$2y$10$cdKNIVBOEdvrMccRVKJ/1uZXmyyEGgNRhoampVYtcFPNsGrYwZ.I6', '01736815328', '1', '2', 'active', NULL, '2024-12-07 11:53:20', '2024-12-07 11:53:20');

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
(2, 'Minato Namikaze', 'manager1@gmail.com', '$2y$10$GxMbyBfQNs4UTw7ZmYk.fOqyhUUdvhi6TeEdpp/4hqKHhyS6ID48S', 1, '01736815328', 'active', 'images/20241206204302.jpg', NULL, '2024-12-06 14:42:33', '2024-12-06 14:43:02'),
(4, 'MD FAZLUL HAQUE', 'manager2@gmail.com', '$2y$10$RL9XNrvZPaiPnJPCuXG5t.KdJzXawRpoceXQ7AmcpDlObzrFLYs2u', 2, '01971324944', 'active', 'images/20241207121242.jpg', NULL, '2024-12-07 06:12:44', '2024-12-07 06:12:44'),
(5, 'Hashirama', 'manager3@gmail.com', '$2y$10$mGK1V8W0PudUqUkJpXF9muR7lTWTY.J8JXFTaT9k51K7IrYeMbV3y', 6, '01638149960', 'active', 'images/20241207155318.jpg', NULL, '2024-12-07 09:53:18', '2024-12-07 09:53:18');

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
(97, '2024_11_29_165610_create_staffs_table', 2),
(98, '2024_11_30_160823_create_staffs_table', 3),
(99, '2024_11_30_164636_create_staffs_table', 4),
(100, '2024_11_30_165716_create_employees_table', 5),
(103, '2024_12_01_125144_create_costs_table', 8),
(104, '2024_12_01_125740_create_costs_table', 9),
(106, '2024_12_02_114332_create_companys_table', 11),
(119, '2014_10_12_000000_create_users_table', 12),
(120, '2014_10_12_100000_create_password_reset_tokens_table', 12),
(121, '2019_08_19_000000_create_failed_jobs_table', 12),
(122, '2019_12_14_000001_create_personal_access_tokens_table', 12),
(123, '2024_11_21_142022_create_admins_table', 12),
(124, '2024_11_21_163117_create_managers_table', 12),
(125, '2024_11_22_064103_create_branches_table', 12),
(126, '2024_11_30_174404_create_employees_table', 12),
(127, '2024_12_01_120350_create_units_table', 12),
(128, '2024_12_01_150503_create_costs_table', 12),
(129, '2024_12_02_120038_create_companies_table', 12),
(130, '2024_12_04_110343_create_courierdetails_table', 13),
(131, '2024_12_04_114111_create_courierdetails_table', 14),
(132, '2024_12_04_154746_create_courierdetails_table', 15),
(133, '2024_12_06_175647_create_courierdetails_table', 16),
(134, '2024_12_06_194207_create_courierdetails_table', 17),
(135, '2024_12_06_195641_create_courierdetails_table', 18),
(136, '2024_12_07_165034_create_employees_table', 19),
(137, '2024_12_08_154255_create_courierdetails_table', 20),
(138, '2024_12_08_155328_create_courierdetails_table', 21);

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
(1, 'Box 1Kg', 'active', NULL, '2024-12-04 10:04:43', '2024-12-04 10:04:43'),
(2, 'By-Cycle', 'active', NULL, '2024-12-04 10:04:55', '2024-12-04 10:04:55'),
(3, 'Fridge', 'active', NULL, '2024-12-04 10:05:11', '2024-12-04 10:05:11'),
(4, 'Mobille', 'active', NULL, '2024-12-04 10:05:28', '2024-12-04 10:05:28'),
(5, 'Motor-Cycle', 'active', NULL, '2024-12-04 10:05:49', '2024-12-04 10:05:49'),
(6, 'Paper 1Kg', 'active', NULL, '2024-12-04 10:06:03', '2024-12-04 10:06:03'),
(7, 'Paper 500Gm', 'active', NULL, '2024-12-04 10:06:26', '2024-12-04 10:06:26'),
(8, 'Oil Box', 'active', NULL, '2024-12-05 09:17:25', '2024-12-05 09:17:25');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `courierdetails`
--
ALTER TABLE `courierdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

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
