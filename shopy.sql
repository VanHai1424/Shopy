-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2024 lúc 09:14 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopy`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Nam', NULL, 0, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(2, 'Nữ', NULL, 0, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(3, 'Váy', 'cate-vay.jpg', 2, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(4, 'Đầm', 'cate-dam.jpg', 2, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(5, 'Vest', 'cate-vest.jpg', 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(6, 'Sơ mi nam', 'cate-somi.jpg', 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(7, 'Sơ mi nữ', 'cate-sominu.jpg', 2, '2024-07-08 07:15:41', '2024-07-10 12:56:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'blue', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(2, 'green', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(3, 'red', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(4, 'yellow', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(5, 'pink', '2024-06-26 13:45:57', '2024-06-26 13:45:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'dep', 1, 10, '2024-06-29 07:38:19', '2024-06-29 07:38:19'),
(3, 'dep qua', 1, 9, '2024-06-29 07:39:06', '2024-06-29 07:39:06'),
(8, 'dep quas di', 1, 10, '2024-06-30 06:09:07', '2024-06-30 06:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_06_26_192051_create_categories_table', 1),
(5, '2024_06_26_192110_create_products_table', 1),
(6, '2024_06_26_192121_create_colors_table', 1),
(7, '2024_06_26_192127_create_sizes_table', 1),
(8, '2024_06_26_192139_create_variants_table', 1),
(9, '2024_06_26_192428_create_users_table', 2),
(10, '2024_06_26_192342_create_orders_table', 3),
(11, '2024_06_26_192333_create_order_details_table', 4),
(12, '2024_06_26_192318_create_comments_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1. Đang chờ duyệt\r\n2. Đã xác nhận\r\n3. Đang vận chuyển\r\n4. Hoàn thành\r\n5. Đã hủy',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `total`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Van hai 123', 'daovanhai1424@gmail.com', 'Thôn Thụy Khuê', '0969330962', 984646, 4, 11, '2024-07-03 09:39:27', '2024-07-03 09:39:27'),
(2, 'Van hai 123', 'daovanhai1424@gmail.com', 'Thôn Thụy Khuê', '0969330962', 891348, 4, 11, '2024-07-03 09:44:41', '2024-07-03 09:44:41'),
(3, 'Van hai 123', 'daovanhai1424@gmail.com', 'Thôn Thụy Khuê', '0969330962', 390153, 4, 11, '2024-07-03 09:49:53', '2024-07-03 09:49:53'),
(4, 'Van hai 123', 'daovanhai1424@gmail.com', 'Thôn Thụy Khuê', '0969330962', 855276, 4, 11, '2024-07-03 09:50:29', '2024-07-08 09:05:05'),
(5, 'Van hai 123', 'daovanhai1424@gmail.com', 'Thôn Thụy Khuê', '0969330962', 547064, 4, 11, '2024-07-03 09:57:43', '2024-07-03 09:57:43'),
(6, 'Van hai 123', 'daovanhai1424@gmail.com', 'Thôn Thụy Khuê', '0969330962', 388060, 4, 11, '2024-07-03 13:35:50', '2024-07-17 04:56:11'),
(7, 'admin', 'vanhai@gmail.com', 'Thôn Thụy Khuê', '0969330962', 297116, 1, 14, '2024-07-09 05:19:19', '2024-07-09 05:19:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `variant_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 195207, '2024-07-03 09:39:27', '2024-07-03 09:39:27'),
(1, 12, 1, 195207, '2024-07-03 09:39:27', '2024-07-03 09:39:27'),
(1, 20, 1, 297116, '2024-07-03 09:39:27', '2024-07-03 09:39:27'),
(1, 21, 1, 297116, '2024-07-03 09:39:27', '2024-07-03 09:39:27'),
(2, 19, 2, 297116, '2024-07-03 09:44:41', '2024-07-03 09:44:41'),
(2, 20, 1, 297116, '2024-07-03 09:44:41', '2024-07-03 09:44:41'),
(3, 17, 2, 130051, '2024-07-03 09:49:53', '2024-07-03 09:49:53'),
(3, 18, 1, 130051, '2024-07-03 09:49:53', '2024-07-03 09:49:53'),
(4, 13, 1, 427638, '2024-07-03 09:50:29', '2024-07-03 09:50:29'),
(4, 14, 1, 427638, '2024-07-03 09:50:29', '2024-07-03 09:50:29'),
(5, 7, 1, 273532, '2024-07-03 09:57:43', '2024-07-03 09:57:43'),
(5, 8, 1, 273532, '2024-07-03 09:57:43', '2024-07-03 09:57:43'),
(6, 5, 1, 194030, '2024-07-03 13:35:50', '2024-07-03 13:35:50'),
(6, 6, 1, 194030, '2024-07-03 13:35:50', '2024-07-03 13:35:50'),
(7, 21, 1, 297116, '2024-07-09 05:19:19', '2024-07-09 05:19:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `desc` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `thumbnail`, `price`, `desc`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo vest cổ hai ve khoét chữ V nam IVY', 'vest-nam.jpg', 317537, 'Corrupti quas dolore fugit voluptatem beatae aut numquam labore.', 1, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(2, 'Đầm body ôm dáng TRIPBLE T DRESS chất lưới dẻo mềm', 'dam-nu.jpg', 121286, 'Eaque voluptatem et quia est eius minus.', 1, 4, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(3, 'Áo vest Chaogongfang dáng ôm chuyên nghiệp phong cách Hàn Quốc cho nam', 'vest-nam-2.jpg', 194030, 'Id doloribus molestiae optio.', 1, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(4, 'Sinransinya Váy treo màu hồng ngọt ngào và cay dành cho nữ', 'vay-ngan.jpg', 273532, 'Laborum nesciunt animi et voluptas aut.', 1, 3, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(5, 'Áo sơ mi ngắn tay nam nữ DWIN chất vải kaki cotton', 'so-mi-nam.jpg', 256029, 'Eius quia doloremque ad.', 1, 6, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(6, 'Áo sơ mi nam ROWAY vải lụa thoáng mát, form regular, Sơ mi họa tiết dâm bụt', 'so-mi-nam-2.jpg', 195207, 'Et maiores sapiente et illum assumenda nihil.', 1, 6, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(7, 'Giyu Chic váy nữ Đầm Body Cho thời váy hàn quốc Hàn Phong', 'van-ngan-2.jpg', 427638, 'Adipisci qui dolor sit iure perferendis et provident.', 1, 3, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(8, 'Áo sơ mi đũi dài tay nam cổ bẻ dáng regular SM26 màu nâu xanh trắng', 'so-mi-nam-3.jpg', 156085, 'Voluptas voluptatem distinctio minima et sed autem vitae.', 1, 6, '2024-06-27 13:45:56', '2024-06-27 13:45:56'),
(9, 'Áo Khoác Blazer Nam ORICANO Form Rộng Dài Tay, Vest Nam Hàn Quốc Độn Vai', 'vest-nam-3.jpg', 130051, 'Qui repudiandae sunt sunt corporis vel sint temporibus consequatur.', 1, 5, '2024-06-27 13:45:57', '2024-06-27 13:45:57'),
(10, 'Paul FITZGERALD Áo Sơ Mi Tay Ngắn Nam Mùa Hè Nhật Bản retro Nửa Tay', 'so-mi-nam-4.jpg', 297116, 'Autem asperiores dignissimos quasi quo.', 1, 6, '2024-06-27 13:45:58', '2024-06-27 13:45:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(2, 'M', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(3, 'L', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(4, 'XL', '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(5, 'XXL', '2024-06-26 13:45:57', '2024-06-26 13:45:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `gender`, `address`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Jasper Halvorson', 'iernser123@example.com', '$2y$10$W6Zs8NCAivMliDWpQjgZsuHzRPqwQPERMRaVhx7QhAjHMRB.gFTPm', '0231311414', 'female', 'asdasdasas', 1, '2024-06-26 13:45:57', '2024-07-08 13:25:40'),
(2, 'May Torp', 'eve.king@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(3, 'Adolphus Walter', 'schamberger.freda@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(4, 'Dr. Billy Gutkowski II', 'gaylord.demetris@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(6, 'Austin Harris', 'korey.steuber@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(7, 'Isac Schneider', 'drobel@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(8, 'Kianna Cormier', 'trantow.tyreek@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(9, 'Ms. Lilla Schimmel', 'ejohnson@example.org', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(10, 'Mozelle Wolff V', 'dakota76@example.net', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(11, 'Van hai 123', 'daovanhai1424@gmail.com', '$2y$10$6F4aWSaKaH3OyV445OpmpOPYoXWOxNX2D6Oe/3w9JbpuEcN4YorwW', '0969330962', 'male', 'Thôn Thụy Khuê', 1, '2024-06-29 15:21:04', '2024-06-30 08:24:00'),
(12, 'Van hai', 'daovanhai@gmail.com', '$2y$10$I.5yd/CGBW4YWcnU5mIJLek.ESuK.yOEpvfasuQQPihl8U4Ohdb5.', NULL, 'male', NULL, 1, '2024-06-29 15:27:06', '2024-06-29 15:27:06'),
(14, 'admin', 'vanhai@gmail.com', '$2y$10$d3Yy.AjJ6fyf8dfOQ23BY.rFzAGKLQVUQeazuagptP/045oN1c6Rm', NULL, NULL, NULL, 0, '2024-07-04 07:47:27', '2024-07-04 07:47:27'),
(15, 'Văn Hải', 'daovanhai14245@gmail.com', '$2y$10$Z7RTLrlg0J6n9Dp0wOvg6.WlJOcLL269el1ITrEX5ZWe9I5PTro.q', '0969330962', 'male', 'Thôn Thụy Khuê', 1, '2024-07-08 13:05:53', '2024-07-08 13:05:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `variants`
--

INSERT INTO `variants` (`id`, `quantity`, `img`, `product_id`, `color_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 200, 'vest-nam-1.1.jpg', 1, 3, 2, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(2, 200, 'vest-nam-1.2.jpg', 1, 5, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(3, 200, 'dam-nu-1.1.jpg', 2, 3, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(4, 200, 'dam-nu-1.2.jpg', 2, 4, 4, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(5, 200, 'vest-nam-2.1.jpg', 3, 2, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(6, 200, 'vest-nam-2.2.jpg', 3, 5, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(7, 200, 'vay-ngan-1.1.jpg', 4, 2, 2, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(8, 200, 'vay-ngan-1.2.jpg', 4, 5, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(9, 200, 'so-mi-nam-1.1.jpg', 5, 3, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(10, 200, 'so-mi-nam-1.2.jpg', 5, 4, 4, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(11, 200, 'so-mi-nam-2.1.jpg', 6, 3, 2, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(12, 200, 'so-mi-nam-2.2.jpg', 6, 4, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(13, 200, 'vay-ngan-2.1.jpg', 7, 2, 3, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(14, 200, 'vay-ngan-2.2.jpg', 7, 5, 4, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(15, 200, 'so-mi-nam-3.1.jpg', 8, 2, 3, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(16, 200, 'so-mi-nam-3.2.jpg', 8, 4, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(17, 200, 'vest-nam-3.1.jpg', 9, 3, 2, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(18, 200, 'vest-nam-3.2.jpg', 9, 4, 5, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(19, 200, 'so-mi-nam-4.1.jpg', 10, 2, 1, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(20, 200, 'so-mi-nam-4.2.jpg', 10, 4, 4, '2024-06-26 13:45:57', '2024-06-26 13:45:57'),
(21, 200, 'so-mi-nam-4.3.jpg', 10, 1, 4, '2024-06-29 04:29:31', '2024-06-29 04:29:31');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`variant_id`),
  ADD KEY `order_details_variant_id_foreign` (`variant_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variants_product_id_foreign` (`product_id`),
  ADD KEY `variants_color_id_foreign` (`color_id`),
  ADD KEY `variants_size_id_foreign` (`size_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Các ràng buộc cho bảng `variants`
--
ALTER TABLE `variants`
  ADD CONSTRAINT `variants_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `variants_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
