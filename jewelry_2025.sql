-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2025 at 03:42 AM
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
-- Database: `jewelry_2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `order_id`, `name`, `email`, `phone`, `address`, `city`, `postal_code`, `country`, `created_at`, `updated_at`) VALUES
(1, 2, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'khyftezdxfchgvjbknlfcxgdgfchuipjo[jgu', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-12 04:21:06', '2025-07-12 04:21:06'),
(2, 3, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'khyftezdxfchgvjbknlfcxgdgfchuipjo[jgu', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-12 04:25:25', '2025-07-12 04:25:25'),
(3, 4, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'khyftezdxfchgvjbknlfcxgdgfchuipjo[jgu', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-12 04:39:51', '2025-07-12 04:39:51'),
(4, 5, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'enrwui4hrfuw', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-12 06:50:35', '2025-07-12 06:50:35'),
(5, 6, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'enrwui4hrfuw', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-12 06:51:22', '2025-07-12 06:51:22'),
(6, 7, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'vswrgtethtgwerqerefwefwedfef', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-12 06:52:24', '2025-07-12 06:52:24'),
(7, 8, 'hamdhan', 'hamdhan123@gmail.com', '0754868604', 'dehiwala', 'dehiwala', '10350', 'Sri Lanka', '2025-07-12 07:09:40', '2025-07-12 07:09:40'),
(8, 9, 'mohamed azeem', 'azeem00421@gmail.com', '0754868604', 'dehiwala,malwatta road', 'dehiwala', '10350', 'Sri Lanka', '2025-07-12 19:59:33', '2025-07-12 19:59:33'),
(9, 10, 'hamdhan', 'hamdhan456@gmail.com', '0754868604', 'dehiwala,malwatta road', 'dehiwala', '10350', 'Sri Lanka', '2025-07-13 02:43:25', '2025-07-13 02:43:25'),
(10, 11, 'hamdhan', 'hamdhan456@gmail.com', '0754868604', 'dehiwala,malwatta road,123', 'dehiwala', '10350', 'Sri Lanka', '2025-07-13 02:44:40', '2025-07-13 02:44:40'),
(11, 12, 'hamdhan', 'hamdhan456@gmail.com', '0754868604', 'artwretewrt', 'hggiy', 'gjfujhv', 'Sri Lanka', '2025-07-28 12:53:41', '2025-07-28 12:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_applications`
--

CREATE TABLE `career_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `cv_path` varchar(255) NOT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `career_applications`
--

INSERT INTO `career_applications` (`id`, `name`, `email`, `role`, `cv_path`, `checked`, `created_at`, `updated_at`) VALUES
(2, 'mohamed azeem', 'azeem00421@gmail.com', 'Jewelry Designer', 'cvs/cNEyDjfFk3Ur2Bkmh9Mg0DklNtTX4EBbGBGRKE5B.pdf', 0, '2025-07-10 16:18:58', '2025-07-10 16:18:58'),
(3, 'mohamed azeem', 'azeem0042kmckje21@gmail.com', 'Customer Support', 'cvs/QWzUjSZoseAHoPT2YoOc4qcaQ8xF3Lzq2f9E2vbf.pdf', 0, '2025-07-10 16:22:44', '2025-07-10 16:22:44'),
(4, 'mohamed azeem', 'admin@corporateui.com', 'Sales Consultant', 'cvs/Wwp0QPD8RzgUNzKGrqYPYdqNG1qZ3JzaPWQnCpkg.pdf', 0, '2025-07-10 16:24:24', '2025-07-10 16:24:24'),
(5, 'mohamed azeem', 'admin@corporateui.com', 'Jewelry Designer', 'cvs/zgTHic4sTXGQDmixpmo2JxN78bEXGv4VgYFnRNW2.pdf', 1, '2025-07-11 06:23:30', '2025-07-12 18:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(13, 'Necklaces', 'Elegant chains and pendants worn around the neck to complement any outfit.', 'categories/asgJH4hnxZ0Gwu1DzQg4Et1iHp8DCoHhMyPBHq0F.jpg', '2025-07-12 19:34:11', '2025-07-12 19:34:11'),
(14, 'Earrings', 'Stylish adornments for the ears, from subtle studs to bold hoops and danglers.', 'categories/ZIb1Xu4kVYZE2RMxRZzIvGzRUd0ys2PJCvn7do7h.jpg', '2025-07-12 19:35:08', '2025-07-12 19:35:08'),
(15, 'Rings', 'Circular bands worn on fingers, ranging from simple bands to gemstone-studded designs.', 'categories/xkA1LM5rmv6EGvYZ3zu45fQyFLetyyMHRggj5wGD.jpg', '2025-07-12 19:35:58', '2025-07-12 19:35:58'),
(16, 'Bracelets', 'Wrist accessories that add flair, including bangles, cuffs, and charm bracelets.', 'categories/fkJT1JE43Kb2WkPp84QKGPmShTXZUii8kXuisfHH.jpg', '2025-07-12 19:36:51', '2025-07-12 19:36:51'),
(17, 'Watches', 'Functional timepieces that double as fashionable wrist jewelry.', 'categories/kAtemByR6pgdffVQxpfAm683K7cssvQME45rfqJj.jpg', '2025-07-12 19:37:45', '2025-07-12 19:37:45'),
(18, 'Brooches & Pins', 'Decorative fasteners or accessories worn on clothing for style or symbolism.', 'categories/rLyL9WFiir9lOrGIwCkfoMo2ZL64Kz8XWSGKNEOv.jpg', '2025-07-12 19:38:41', '2025-07-12 19:38:41'),
(19, 'Anklets', 'Delicate chains or beaded bands worn around the ankle for a playful touch.', 'categories/047vyHx1mtN1mq9sLmI3xzHqGJiVCRsDTJeHkOg7.jpg', '2025-07-12 19:40:08', '2025-07-12 19:40:08'),
(20, 'Body Jewelry', 'Piercings and adornments designed for various body parts beyond ears and fingers.', 'categories/XgnPKF608ZNehFrjJFYryeONskHaozOrvLalPOvm.jpg', '2025-07-12 19:41:16', '2025-07-12 19:41:16'),
(21, 'Men’s Jewelry', 'Jewelry designed specifically for men, including rings, bracelets, and cufflinks.', 'categories/3OpNdWECmYmKQWm12Ykj0qGSdBlNRZBVpxbU3loO.jpg', '2025-07-12 19:42:03', '2025-07-12 19:42:03'),
(22, 'Fine Jewelry', 'High-quality pieces made with precious metals and genuine gemstones.', 'categories/41IbPuDK8vjAJse3itjALpK4dsCipT2FjsiW8BB4.jpg', '2025-07-12 19:42:57', '2025-07-12 19:42:57'),
(23, 'gold ring', 'gold ring', 'categories/k1yQffdSSzImiE3YcI3fInKUsJ56sOMJpGr4wNdx.jpg', '2025-07-13 02:50:41', '2025-07-13 02:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(1, 'mohamed azeem', 'azeem00421@gmail.com', 'gefygu', '2025-07-10 09:03:55', '2025-07-10 09:03:55'),
(2, 'mohamed azeem', 'azeem004221@gmail.com', 'cdcdcdc', '2025-07-10 14:30:19', '2025-07-10 14:30:19'),
(3, 'mohamed azeem', 'azeem0042kmckje21@gmail.com', 'cdcdcdc', '2025-07-10 14:30:52', '2025-07-10 14:30:52');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_29_235435_create_categories_table', 1),
(5, '2025_06_30_001705_create_products_table', 1),
(6, '2025_07_10_143000_create_contact_messages_table', 2),
(7, '2025_07_10_205553_create_career_applications_table', 3),
(8, '2025_07_11_144554_create_orders_table', 4),
(9, '2025_07_11_144708_create_order_items_table', 5),
(10, '2025_07_11_145400_create_addresses_table', 6),
(11, '2025_07_12_173227_add_low_stock_threshold_to_products_table', 7),
(12, '2025_07_12_212805_create_roles_table', 8),
(13, '2025_07_12_212959_create_permissions_table', 9),
(14, '2025_07_12_213056_create_role_permission_table', 10),
(15, '2025_07_12_213212_create_user_role_table', 11),
(16, '2025_07_12_213843_create_modules_table', 12),
(17, '2025_07_13_000929_add_role_id_to_users_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'Admin Dashboard Home', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(2, 'products', 'Manage Products', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(3, 'categories', 'Manage Categories', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(4, 'orders', 'Manage Orders', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(5, 'inventory', 'Manage Inventory', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(6, 'reports', 'View Reports', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(7, 'users', 'User Management', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(8, 'messages', 'Contact Messages', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(9, 'careers', 'Career Applications', '2025-07-12 17:57:21', '2025-07-12 17:57:21'),
(10, 'backup', 'System Backup', '2025-07-12 17:57:21', '2025-07-12 17:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `module_user`
--

CREATE TABLE `module_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `module_user`
--

INSERT INTO `module_user` (`id`, `module_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 4, 5, NULL, NULL),
(4, 7, 5, NULL, NULL),
(5, 10, 5, NULL, NULL),
(6, 2, 6, NULL, NULL),
(7, 3, 6, NULL, NULL),
(8, 5, 6, NULL, NULL),
(9, 2, 4, NULL, NULL),
(10, 3, 4, NULL, NULL),
(11, 4, 4, NULL, NULL),
(12, 1, 1, NULL, NULL),
(13, 2, 1, NULL, NULL),
(14, 3, 1, NULL, NULL),
(15, 4, 1, NULL, NULL),
(16, 5, 1, NULL, NULL),
(17, 6, 1, NULL, NULL),
(18, 7, 1, NULL, NULL),
(19, 8, 1, NULL, NULL),
(20, 9, 1, NULL, NULL),
(21, 10, 1, NULL, NULL),
(22, 1, 8, NULL, NULL),
(25, 8, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Processing',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10724.00, 'Processing', '2025-07-12 04:16:16', '2025-07-12 04:16:16'),
(2, 1, 10724.00, 'Processing', '2025-07-12 04:21:06', '2025-07-12 04:21:06'),
(3, 1, 3830.00, 'Processing', '2025-07-12 04:25:25', '2025-07-12 04:25:25'),
(4, 1, 766.00, 'Completed', '2025-07-12 04:39:51', '2025-07-13 04:01:11'),
(5, 1, 766.00, 'Completed', '2025-07-12 06:50:35', '2025-07-12 13:17:43'),
(6, 1, 3064.00, 'Completed', '2025-07-12 06:51:22', '2025-07-12 13:23:28'),
(7, 1, 100.00, 'Completed', '2025-07-12 06:52:24', '2025-07-12 13:12:19'),
(8, 2, 766.00, 'Completed', '2025-07-12 07:09:40', '2025-07-12 12:50:42'),
(9, 1, 207500.00, 'Completed', '2025-07-12 19:59:33', '2025-07-12 20:39:15'),
(10, 7, 45000.00, 'Processing', '2025-07-13 02:43:25', '2025-07-13 02:43:25'),
(11, 7, 234000.00, 'Completed', '2025-07-13 02:44:40', '2025-07-13 02:51:52'),
(12, 7, 150000.00, 'Processing', '2025-07-28 12:53:41', '2025-07-28 12:53:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(8, 9, 17, 1, 7500.00, '2025-07-12 19:59:33', '2025-07-12 19:59:33'),
(9, 9, 15, 2, 40000.00, '2025-07-12 19:59:33', '2025-07-12 19:59:33'),
(10, 9, 14, 1, 120000.00, '2025-07-12 19:59:33', '2025-07-12 19:59:33'),
(11, 10, 17, 6, 7500.00, '2025-07-13 02:43:25', '2025-07-13 02:43:25'),
(12, 11, 13, 3, 78000.00, '2025-07-13 02:44:40', '2025-07-13 02:44:40'),
(13, 12, 18, 3, 50000.00, '2025-07-28 12:53:41', '2025-07-28 12:53:41');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `low_stock_threshold` int(11) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `category_id`, `created_at`, `updated_at`, `low_stock_threshold`) VALUES
(11, 'Layered Boho Coin Necklace', 'Multi-layered chain with antique-style coin charms for a trendy bohemian look.', 90000.00, 9, 'images/1752369398.jpg', 13, '2025-07-12 19:46:38', '2025-07-12 19:46:38', 5),
(12, 'Sterling Silver Stud Earrings', 'Classic minimalist studs made from 925 silver, ideal for subtle elegance.', 50000.00, 12, 'images/1752369475.jpg', 14, '2025-07-12 19:47:55', '2025-07-12 19:47:55', 5),
(13, 'Gold Hoop Earrings with Cubic Zirconia', 'Medium-sized hoops encrusted with sparkling CZ stones.', 78000.00, 15, 'images/1752369532.jpg', 14, '2025-07-12 19:48:52', '2025-07-12 19:48:52', 5),
(14, 'Rose Gold Engagement Ring with Moissanite', 'A stunning solitaire-style engagement ring in rose gold.', 120000.00, 46, 'images/1752369595.jpg', 15, '2025-07-12 19:49:55', '2025-07-12 19:49:55', 5),
(15, 'Adjustable Minimalist Band Ring', 'Sleek open-band design, adjustable to fit any finger.', 40000.00, 20, 'images/1752369654.jpg', 15, '2025-07-12 19:50:54', '2025-07-12 19:50:54', 5),
(16, 'Classic Tennis Bracelet with CZ Stones', 'Elegant bracelet lined with cubic zirconia, mimicking real diamonds.', 300000.00, 26, 'images/1752369714.jpg', 16, '2025-07-12 19:51:54', '2025-07-13 02:54:02', 5),
(17, 'Leather Wrap Charm Bracelet', 'Trendy layered bracelet with leather and small hanging charms.', 7500.00, 45, 'images/1752369779.jpg', 16, '2025-07-12 19:52:59', '2025-07-12 19:52:59', 5),
(18, 'silver ring', 'silver ring', 50000.00, 39, 'images/1752372812.jpg', 15, '2025-07-12 20:43:32', '2025-07-13 02:49:06', 5);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UjHEXyBdd5jngNSvklvYcT3qNTFD9xHvM8MeKp7a', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVWR2THpXOXBCdWVnWFVsM3FLVGRHeHUzY1RleDhZV2FBVGxWeTdwQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9tZXNzYWdlcy9yZXBvcnQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1754073959);

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
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mohamed azeem', 'azeem00421@gmail.com', NULL, '$2y$12$bLUfHeNUI5IvHa.f5c9QquoqSeyWbpYYAxWSQnz83cXP7Dbx1/X4y', 'admin', NULL, NULL, '2025-07-06 04:50:36', '2025-07-06 04:50:36'),
(2, 'hamdhan', 'hamdhan123@gmail.com', NULL, '$2y$12$ptxQXA4FdRHqOF.2Atc5ZezDkWQQg1RbpJeEr3PKltcQMvyAUD8MK', 'customer', NULL, NULL, '2025-07-12 07:08:56', '2025-07-12 07:08:56'),
(3, 'mohamed azeem', 'azeem2000421@gmail.com', NULL, '$2y$12$ZlPfSZC8admlmfPEFNhxceCypMhqob9hkaX/6gt1a0xXCRB4.XUEG', 'admin', NULL, NULL, '2025-07-12 17:59:15', '2025-07-12 17:59:15'),
(4, 'mohamed azeem', 'azeem000421@gmail.com', NULL, '$2y$12$V9WJugUBfdmO8kIc4wlab.A.Bp6ZnxJjCdSKQ73Hu6nzIMGhWHuD2', 'admin', NULL, NULL, '2025-07-12 18:12:16', '2025-07-12 18:12:16'),
(5, 'mohamed azeem', 'azeem0nfduh04212@gmail.com', NULL, '$2y$12$KJrJ2BLS0vxFi62qMdpehen1/obw5wHziWk0WlNZHbx.qYIAEHF0C', 'admin', NULL, NULL, '2025-07-12 18:52:14', '2025-07-12 18:52:14'),
(6, 'mohamed azeem1', 'azeem2421@gmail.com', NULL, '$2y$12$KWlHidX9w/4d8w8SwEyhm.xSklB6/UgKboy/eFS6tU7QbE41jHvji', 'admin', NULL, NULL, '2025-07-12 18:55:01', '2025-07-12 18:55:01'),
(7, 'hamdhan', 'hamdhan456@gmail.com', NULL, '$2y$12$QAdc4XHNDqB1WjdmhNRbeeMaVXHFRisANfah.sFGakQzqN80N7cXy', 'customer', NULL, NULL, '2025-07-13 02:42:09', '2025-07-13 02:42:09'),
(8, 'kasun', 'kasun123@gmail.com', NULL, '$2y$12$bhUapMQ8v0hFa83UWlY1guTJklCzVzOUMVnQs3iCvNTDHM00Lc8B6', 'admin', NULL, NULL, '2025-07-13 03:00:18', '2025-07-13 03:00:18'),
(9, 'azii', 'hamdhan4568765@gmail.com', NULL, '$2y$12$bzePMbPFHDipRmwe7v999O5/oC/EVzDgCHrzJeuxVljjaMwR.Ls0u', 'admin', NULL, NULL, '2025-08-01 11:27:40', '2025-08-01 11:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_order_id_foreign` (`order_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `career_applications`
--
ALTER TABLE `career_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modules_name_unique` (`name`);

--
-- Indexes for table `module_user`
--
ALTER TABLE `module_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module_user_module_id_user_id_unique` (`module_id`,`user_id`),
  ADD KEY `module_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_permission_role_id_permission_id_unique` (`role_id`,`permission_id`),
  ADD KEY `role_permission_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_role_user_id_role_id_unique` (`user_id`,`role_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `career_applications`
--
ALTER TABLE `career_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `module_user`
--
ALTER TABLE `module_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permission`
--
ALTER TABLE `role_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `module_user`
--
ALTER TABLE `module_user`
  ADD CONSTRAINT `module_user_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `module_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_permission_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
