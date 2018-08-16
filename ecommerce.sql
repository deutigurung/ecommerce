-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2018 at 03:41 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `banner_image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_name`, `description`, `status`, `banner_image`, `created_at`, `updated_at`) VALUES
(2, 'Banner First', 'This is our first banner.', 0, 'uploads/banner/e306ad2af94645d756c7228c8bd0c3ba.jpg', '2018-07-19 01:59:26', '2018-08-01 23:06:38'),
(3, 'Banner Second', 'This is the banner second.', 1, 'uploads/banner/a9d4a419fb17ef5e0129a32a4e59f6e2.jpg', '2018-07-19 02:15:59', '2018-07-23 00:47:07'),
(5, 'Bags show', 'This is the banners.', 1, 'uploads/banner/8610042b26a0e94ee98f26da3a83b2d2.jpg', '2018-07-23 00:45:57', '2018-07-23 00:45:57'),
(6, 'New Banner', 'This is the latest banner of our project.', 0, 'uploads/banner/2f06db3e2d5548146c7f488ef98ff0bc.jpg', '2018-08-01 23:06:23', '2018-08-01 23:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_parent` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_title`, `cate_slug`, `summary`, `image`, `status`, `is_parent`, `created_at`, `updated_at`) VALUES
(1, 'Womens Clothing', 'womens-clothing', 'All women\'s clothes category.', 'uploads/category/db5d1dbb56a21f7c85ff5405a15926ea.jpg', 1, 0, '2018-07-22 04:17:48', '2018-07-23 01:11:37'),
(2, 'Mens Clothing', 'mens-clothing', 'All mens clothes category.', 'uploads/category/df02c3912148465a36b33963a3cc6105.jpg', 1, 0, '2018-07-22 04:19:34', '2018-07-23 01:11:03'),
(3, 'Electronic', 'electronic', 'All electronic category.', 'uploads/category/5724f71c32fcbb7b2fd7ba3aa5edb0d9.jpg', 1, 0, '2018-07-22 04:22:13', '2018-07-22 04:22:13'),
(4, 'Refigrator', 'refigrator', 'All refigrator  item is here.', 'uploads/category/cc86f009588b9697cd7b574b1755832a.jpg', 0, 3, '2018-07-22 04:28:12', '2018-07-22 04:28:12'),
(5, 'T-shirts', 't-shirts', 'All t-shirts item is here.', 'uploads/category/66df93ad7e0fb178253da7869d2392ad.jpg', 1, 2, '2018-07-22 04:30:24', '2018-07-23 01:12:08'),
(6, 'Coats', 'coats', 'All mens coats.', 'uploads/category/f0c33a380f2be7a6f2ec968e0b8beb4b.jpg', 1, 2, '2018-07-23 01:04:15', '2018-07-23 01:04:15'),
(7, 'Phone & Accessories', 'phone-accessories', 'All phone product are available.', 'uploads/category/82dd0ccad6b9dc03ede2aaae5db224de.png', 1, 0, '2018-08-01 23:09:32', '2018-08-01 23:09:32'),
(8, 'Smart Phones', 'smart-phones', 'All new smart phones.', 'uploads/category/70a19b12ecccfa61417c1c60084462a7.jpg', 1, 7, '2018-08-01 23:27:53', '2018-08-01 23:27:53');

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2018_07_12_084804_create_roles_table', 2),
(6, '2018_07_12_091603_role_user', 2),
(11, '2018_07_14_135206_create_banners_table', 3),
(18, '2018_07_14_165056_create_categories_table', 4),
(20, '2018_07_22_060057_product_images', 4),
(23, '2018_07_20_045849_create_products_table', 5),
(24, '2018_08_01_040906_add_discount_to_products', 6),
(35, '2018_08_13_075705_create_orders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `cart_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_amount` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_id`, `user_id`, `product_id`, `quantity`, `price`, `total_amount`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 'FbFZ0xzoE3wA8kFR', 4, 2, 1, 20000, 20000, 1, '2018-08-14 04:02:07', '2018-08-14 04:02:07'),
(2, 'YymOU9ua9fFBThvv', 4, 6, 1, 21250, 21250, 1, '2018-08-14 04:07:29', '2018-08-14 04:07:29'),
(3, 'tIF8AEIfVKSAGFby', 8, 4, 1, 4000, 4000, 1, '2018-08-14 04:09:39', '2018-08-14 04:09:39'),
(4, 'tIF8AEIfVKSAGFby', 8, 2, 1, 20000, 20000, 1, '2018-08-14 04:09:39', '2018-08-14 04:09:39'),
(5, 'tIF8AEIfVKSAGFby', 8, 1, 1, 18000, 18000, 1, '2018-08-14 04:09:39', '2018-08-14 04:09:39'),
(6, 'dOq41V395vUPPQYo', 10, 6, 1, 21250, 21250, 1, '2018-08-14 04:12:11', '2018-08-14 04:12:11'),
(7, 'H75tRHvzR5BDJt5V', 8, 5, 1, 1000, 1000, 1, '2018-08-15 07:08:41', '2018-08-15 07:08:41'),
(8, 'yHf0PF6CHDXKmZKW', 4, 3, 2, 2000, 4000, 1, '2018-08-16 04:02:39', '2018-08-16 04:02:39'),
(9, 'rUZvtSWXkUEANQCo', 8, 2, 1, 20000, 20000, 1, '2018-08-16 04:10:37', '2018-08-16 04:10:37');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(11) NOT NULL,
  `child_cate_id` int(11) DEFAULT '0',
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `summary`, `description`, `cate_id`, `child_cate_id`, `price`, `discount`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Saari', 'All new design saari is here.', 'All saari product .', 1, 0, 20000, 10, 1, 'uploads/product/c36dcfcf447d4502612d107c49f6228d.jpg', '2018-07-23 02:03:29', '2018-07-23 02:03:29'),
(2, 'LG Fridge', 'All Lg brand fridge.', 'All Lg brand fridge.All Lg brand fridge.All Lg brand fridge.All Lg brand fridge.', 3, 4, 25000, 20, 1, 'uploads/product/29652645661d75315c3cc217dc7f3d50.jpg', '2018-07-23 02:04:28', '2018-07-23 02:04:28'),
(3, 'Half Tshirt', 'Summer t-shirts.', 'Summer t-shirts.Summer t-shirts.Summer t-shirts.Summer t-shirts.', 2, 5, 1000, 0, 0, 'uploads/product/fff1b3a989d0d3db203eba5a30808d95.jpg', '2018-07-23 02:06:37', '2018-07-23 02:29:45'),
(4, 'Red Jackets', 'Causal red jacket for womens.', 'Causal red jacket for womens.Causal red jacket for womens.Causal red jacket for womens.Causal red jacket for womens.Causal red jacket for womens.Causal red jacket for womens.', 1, 0, 5000, 20, 1, 'uploads/product/69cbb87c24deea4be96d87d7e4756b1d.jpg', '2018-07-23 02:36:14', '2018-07-23 02:36:14'),
(5, 'White T-shirts', 'White T-shirts for men.', 'White T-shirts for men.White T-shirts for men.White T-shirts for men.White T-shirts for men.White T-shirts for men.White T-shirts for men.', 2, 5, 1000, 0, 1, 'uploads/product/518d4c2dc801d5d14421f1a2831eca3f.jpg', '2018-07-31 05:32:38', '2018-07-31 05:32:38'),
(6, 'SAMSUNG G7', 'All samsung products.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 7, 8, 25000, 15, 1, 'uploads/product/9971e3217d4e5ec343b99038a5803fe3.jpg', '2018-08-01 23:32:08', '2018-08-01 23:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2018-07-13 03:02:36', '2018-07-13 03:02:36'),
(2, 'guest', '2018-07-13 03:03:31', '2018-07-13 03:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(6, 8, 1, '2018-07-13 05:52:17', '2018-07-13 05:52:17'),
(7, 8, 2, '2018-07-13 05:52:17', '2018-07-13 05:52:17'),
(10, 1, 1, '2018-07-14 22:53:46', '2018-07-14 22:53:46'),
(12, 4, 2, '2018-07-21 02:02:37', '2018-07-21 02:02:37'),
(13, 9, 2, '2018-07-21 07:02:08', '2018-07-21 07:02:08'),
(14, 10, 2, '2018-08-14 04:11:56', '2018-08-14 04:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `phone`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$y2MRjATG/whiihMf3tF2juep2mgY8ge9Pa66J5TqfUf430SLwFeHq', 'Office', '01254', 'uploads/user/433f06c0d1122c1da0f69883f387b324.jpg', NULL, '2018-07-09 03:50:55', '2018-07-14 22:53:44'),
(4, 'Deuti Gurung', 'deuti@gmail.com', '$2y$10$HX0rxI6S27zCqFE8DdK7WuivEAKwSMGbe2IujQz1EWcQsJEce83zy', 'kathmandu', '2541', 'uploads/user/deac88a7a906aefb7702a5b82f012ba1.jpg', 'j4djPcXCX8QvlMYYgb9C05lM9SmbJNMpEW3ZtCx8a4vbs8jfs4rbtD4wXhKo', '2018-07-13 05:09:00', '2018-07-21 07:01:42'),
(8, 'Lucky', 'luckuck@luck.com', '$2y$10$RwUUWEVA.syvl6BfbxWwUeCj8ZOhn.zLWQyQpzjFBwYllnKK.pK56', 'Nepal', '1452', 'uploads/user/1de09268b3f19f45f7938fb582ec325a.jpg', 'W8gn8Mo6SxIUlD4kzMEoByRGUEX0hQYWVEdPXSq3XVpW0U5YtL5cim2TaH1x', '2018-07-13 05:52:17', '2018-07-13 05:52:17'),
(9, 'Sidhart', 'sidhart@gmail.com', '$2y$10$8d7j1tFwRyR6YoxyzvkKIu28NhMmBUvx.DDRRoHk0A6z3MNTMsEd.', 'sunderbasti', '980000', 'uploads/user/2cb55e179b4556b8c0b35ec185cd9080.png', 'kYJX9LvI3sOyNPHKvzMZ8n9fpIT6K63UAnrtJPyE02GahNGdj5Rf9V4MM9E7', '2018-07-21 07:00:07', '2018-07-26 03:29:19'),
(10, 'Rajiv Tamang', 'rajive@gamil.com', '$2y$10$uJvWiCDrGqsurNjQNbDnGO6/Yo2mCqm0w11cCKsIGawzi995GVN6y', 'kathmandu,Nepal', '2541369', NULL, 'dQbRm5dgiKyZseaiq0eM151Is9JrhMOP1re3ZkMgClupi9fOGODuSqp9IbFG', '2018-08-14 04:11:56', '2018-08-14 04:11:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
