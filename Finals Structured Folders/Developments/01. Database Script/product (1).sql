-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2021 lúc 07:56 AM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `product`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_18_093209_create_typeproducts_table', 1),
(5, '2021_07_08_141334_create_products_table', 1),
(6, '2021_07_12_084520_create_sliders_table', 1),
(7, '2021_07_14_083831_create_roles_table', 1),
(8, '2021_07_14_083908_create_permissions_table', 1),
(9, '2021_07_14_084055_create_table_user_role', 1),
(10, '2021_07_14_084225_create_table_permission_role', 1),
(11, '2021_07_24_140733_create_bills_table', 1),
(12, '2021_07_31_150916_feedback', 1),
(13, '2021_09_19_073101_create_product_images_table', 1),
(14, '2021_10_25_122444_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `parent_id`, `key_code`, `created_at`, `updated_at`) VALUES
(1, 'Bills', 'Bills', 0, NULL, '2021-10-31 11:01:33', '2021-10-31 11:01:33'),
(2, 'List', 'List', 1, 'Bills_List', '2021-10-31 11:01:33', '2021-10-31 11:01:33'),
(3, 'Edit', 'Edit', 1, 'Bills_Edit', '2021-10-31 11:01:33', '2021-10-31 11:01:33'),
(4, 'Customers', 'Customers', 0, NULL, '2021-10-31 11:05:23', '2021-10-31 11:05:23'),
(5, 'List', 'List', 4, 'Customers_List', '2021-10-31 11:05:23', '2021-10-31 11:05:23'),
(6, 'Permission', 'Permission', 0, NULL, '2021-10-31 11:06:24', '2021-10-31 11:06:24'),
(7, 'Add', 'Add', 6, 'Permission_Add', '2021-10-31 11:06:24', '2021-10-31 11:06:24'),
(8, 'Products', 'Products', 0, NULL, '2021-10-31 11:09:54', '2021-10-31 11:09:54'),
(9, 'List', 'List', 8, 'Products_List', '2021-10-31 11:09:54', '2021-10-31 11:09:54'),
(10, 'Add', 'Add', 8, 'Products_Add', '2021-10-31 11:09:54', '2021-10-31 11:09:54'),
(11, 'Edit', 'Edit', 8, 'Products_Edit', '2021-10-31 11:09:54', '2021-10-31 11:09:54'),
(12, 'Delete', 'Delete', 8, 'Products_Delete', '2021-10-31 11:09:54', '2021-10-31 11:09:54'),
(13, 'Roles', 'Roles', 0, NULL, '2021-10-31 11:16:05', '2021-10-31 11:16:05'),
(14, 'List', 'List', 13, 'Roles_List', '2021-10-31 11:16:05', '2021-10-31 11:16:05'),
(15, 'Add', 'Add', 13, 'Roles_Add', '2021-10-31 11:16:05', '2021-10-31 11:16:05'),
(16, 'Edit', 'Edit', 13, 'Roles_Edit', '2021-10-31 11:16:05', '2021-10-31 11:16:05'),
(17, 'Delete', 'Delete', 13, 'Roles_Delete', '2021-10-31 11:16:05', '2021-10-31 11:16:05'),
(18, 'Sliders', 'Sliders', 0, NULL, '2021-10-31 11:17:59', '2021-10-31 11:17:59'),
(19, 'List', 'List', 18, 'Sliders_List', '2021-10-31 11:17:59', '2021-10-31 11:17:59'),
(20, 'Add', 'Add', 18, 'Sliders_Add', '2021-10-31 11:17:59', '2021-10-31 11:17:59'),
(21, 'Edit', 'Edit', 18, 'Sliders_Edit', '2021-10-31 11:17:59', '2021-10-31 11:17:59'),
(22, 'Delete', 'Delete', 18, 'Sliders_Delete', '2021-10-31 11:17:59', '2021-10-31 11:17:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, NULL, NULL),
(2, 2, 3, NULL, NULL),
(3, 2, 5, NULL, NULL),
(4, 2, 7, NULL, NULL),
(5, 2, 9, NULL, NULL),
(6, 2, 10, NULL, NULL),
(7, 2, 11, NULL, NULL),
(8, 2, 12, NULL, NULL),
(9, 2, 14, NULL, NULL),
(10, 2, 15, NULL, NULL),
(11, 2, 16, NULL, NULL),
(12, 2, 17, NULL, NULL),
(13, 2, 19, NULL, NULL),
(14, 2, 20, NULL, NULL),
(15, 2, 21, NULL, NULL),
(16, 2, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Unit_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `views_count` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `Unit_price`, `feature_image_path`, `feature_image_name`, `description`, `category_id`, `views_count`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Trái Bơ', '35000', '/storage/product//I3UAkf4uS5hY8I3R1Qd2.jpg', 'Avocado1.jpg', 'Bơ ngon ngọt', 5, 35000, '2021-10-29 06:31:28', '2021-10-29 06:31:28', NULL),
(6, 'Dâu đen', '42000', '/storage/product//43J8GHlpdOhjUDEHQ591.jpg', 'Blackberries1.jpg', 'Dâu đen vắt rượu', 4, 42000, '2021-10-29 06:38:57', '2021-10-29 06:38:57', NULL),
(7, 'Thanh long', '15000', '/storage/product//iUhwejnqXrF8fHw4iz0i.jpg', 'DargonFruit1.jpg', 'Thanh long ngọt ngon', 6, 15000, '2021-10-29 06:40:48', '2021-10-29 06:40:48', NULL),
(8, 'Sầu riêng', '36000', '/storage/product//NaQdPm2HrazWut4viJDV.jpg', 'Durian1.jpg', 'Sầu riêng bùi vị ngon', 3, 36000, '2021-10-29 06:42:01', '2021-10-29 06:44:02', NULL),
(9, 'Quả nho', '26000', '/storage/product//k40EsV1VRaGd09X8r4d8.jpg', 'Grape1.jpg', 'Nho vị ngọt', 5, 26000, '2021-10-29 06:43:51', '2021-10-29 06:43:51', NULL),
(10, 'Táo Xanh', '48000', '/storage/product//dNdc1Pz0JjlIePm0vBRj.jpg', 'GreenApple1.jpg', 'Táo ngọt', 3, 48000, '2021-10-31 00:04:57', '2021-10-31 00:04:57', NULL),
(11, 'Trái Ổi', '14000', '/storage/product//zTyxIJhBLz2XUXwhUOFa.jpg', 'Guava1.jpg', 'Ổi chấm muối hết xảy', 3, 14000, '2021-10-31 00:05:58', '2021-10-31 00:05:58', NULL),
(12, 'Quả Hồng', '55000', '/storage/product//h9eHGAmlwA1MSYVhSaRR.jpg', 'Persimmon1.jpg', 'Quả hồng thơm ngọt', 4, 55000, '2021-10-31 00:07:22', '2021-10-31 00:07:22', NULL),
(13, 'Quả Dâu', '33000', '/storage/product//lWUVdpwLqvti42MKt4Tg.jpg', 'Strawberry1.jpg', 'Dâu ngọt có thể làm nước', 5, 33000, '2021-10-31 00:09:25', '2021-10-31 00:09:25', NULL),
(14, 'Dưa Hấu', '18000', '/storage/product//hemIVLShLYmgVqkXsdUl.jpg', 'Watermelon1.jpg', 'Dưa hấu ngọt lịm', 3, 18000, '2021-10-31 00:10:47', '2021-10-31 00:10:47', NULL),
(15, 'Quả Mơ', '22000', '/storage/product//DT9wmOuoXhtyQIPo3sE5.jpg', 'Apricots1.jpg', 'Quả mơ ngon thanh vị', 6, 22000, '2021-10-31 00:11:55', '2021-10-31 00:11:55', NULL),
(16, 'Trái Chuối', '26000', '/storage/product//RIznvKBBTgYoFQzGwJZO.jpg', 'Banana1.jpg', 'Chuối chất sơ tốt', 3, 26000, '2021-10-31 00:16:09', '2021-10-31 00:16:09', NULL),
(17, 'Quả Vải', '63000', '/storage/product//YxP7ZYcVkd4WqQIHksrF.jpg', 'Litchi1.jpg', 'Vải ngọt', 6, 63000, '2021-10-31 00:17:32', '2021-10-31 00:17:32', NULL),
(18, 'Trái Xoài', '45000', '/storage/product//6MlVq3aqjZb2UkVZ1zkr.jpg', 'Mango1.jpg', 'Xoài ngọt lịm tới hột', 4, 45000, '2021-10-31 00:18:20', '2021-10-31 00:18:20', NULL),
(19, 'Quả Cam', '41000', '/storage/product//SAe9vnvjX59vDV1IQwTl.jpg', 'Orange1.jpg', 'Quả cam ngọt nước', 5, 41000, '2021-10-31 00:19:06', '2021-10-31 00:19:06', NULL),
(20, 'Trái Đào', '52000', '/storage/product//RR38bKW69W6Z15qSWoG2.jpg', 'Peach1.jpg', 'Đào ngọt', 6, 52000, '2021-10-31 00:19:54', '2021-10-31 00:19:54', NULL),
(21, 'Trái Mận', '37000', '/storage/product//5NNJnCKk1QdjXB2yNfKh.jpg', 'Plum1.jpg', 'Mận ngọt', 5, 37000, '2021-10-31 00:20:45', '2021-10-31 00:20:45', NULL),
(22, 'Quả dừa', '23000', '/storage/product//FI8hROmjeY5FhCCdEnqL.jpg', 'Coconut1.jpg', 'Dừa ngọt nước', 5, 23000, '2021-10-31 00:34:14', '2021-10-31 00:34:14', NULL),
(23, 'Đu đủ', '28000', '/storage/product//pA7nDYh4Guz2vtgH9oYE.jpg', 'Papaya1.jpg', 'Đu đủ mềm và ngọt vị', 3, 28000, '2021-10-31 00:35:51', '2021-10-31 00:35:51', NULL),
(24, 'Trái Dứa', '36000', '/storage/product//f30REJS2JqRZzcmTxoOw.jpg', 'Pineapple1.jpg', 'Dứa ngon ngọt', 6, 36000, '2021-10-31 00:37:58', '2021-10-31 00:37:58', NULL),
(25, 'Quả Sa Bô Chê', '34000', '/storage/product//guvbzjNeWs25P5Ohzo4Z.jpg', 'Sapodilla1.jpg', 'Sa bô chê ngọt', 6, 34000, '2021-10-31 00:40:16', '2021-10-31 00:40:29', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `img_path`, `img_name`, `product_id`, `created_at`, `updated_at`) VALUES
(2, '/storage/product//4Hsr6MBYI020OaUzRIat.jpg', 'Avocado2.jpg', 4, '2021-10-29 01:52:51', '2021-10-29 01:52:51'),
(3, '/storage/product_Image//5GDY5m6D80Tui3VbSyiT.jpg', 'Avocado2.jpg', 5, '2021-10-29 06:31:28', '2021-10-29 06:31:28'),
(4, '/storage/product_Image//RvqRk0UK1VNo1lOqUVQ3.jpg', 'Blackberries2.jpg', 6, '2021-10-29 06:38:57', '2021-10-29 06:38:57'),
(5, '/storage/product_Image//LL6TO7qUqVe22j1CJVJV.jpg', 'DargonFruit2.jpg', 7, '2021-10-29 06:40:48', '2021-10-29 06:40:48'),
(6, '/storage/product_Image//Cdbqf6c8i2OIVRS7cXu1.jpg', 'Durian2.jpg', 8, '2021-10-29 06:42:01', '2021-10-29 06:42:01'),
(7, '/storage/product_Image//nekITAyvDX8G8bA2Ueyj.jpg', 'Grape2.jpg', 9, '2021-10-29 06:43:51', '2021-10-29 06:43:51'),
(8, '/storage/product_Image//NaZ3JkSRQc4Pd7g1X19b.jpg', 'GreenApple2.jpg', 10, '2021-10-31 00:04:57', '2021-10-31 00:04:57'),
(9, '/storage/product_Image//xJQ6MVXvUmPD46wmPnPW.jpg', 'Guava2.jpg', 11, '2021-10-31 00:05:58', '2021-10-31 00:05:58'),
(10, '/storage/product_Image//fBDmr21vX22bpEFhLkmb.jpg', 'Persimmon2.jpg', 12, '2021-10-31 00:07:22', '2021-10-31 00:07:22'),
(11, '/storage/product_Image//uldoSdA5ttJYgcPqpGT6.jpg', 'Strawberry2.jpg', 13, '2021-10-31 00:09:25', '2021-10-31 00:09:25'),
(12, '/storage/product_Image//Ewp3UO7tmJhqsBHLEsqG.jpg', 'Watermelon2.jpg', 14, '2021-10-31 00:10:47', '2021-10-31 00:10:47'),
(13, '/storage/product_Image//3fdesZmBuNoM09Jy45DF.jpg', 'Apricots2.jpg', 15, '2021-10-31 00:11:55', '2021-10-31 00:11:55'),
(14, '/storage/product_Image//msLRAPGs4OxINgJYhGTP.jpg', 'Banana2.jpg', 16, '2021-10-31 00:16:09', '2021-10-31 00:16:09'),
(15, '/storage/product_Image//aIA7JQNQQLh0DqOTA7tQ.jpg', 'Litchi2.jpg', 17, '2021-10-31 00:17:32', '2021-10-31 00:17:32'),
(16, '/storage/product_Image//3G4aizYVMxP9OFZRL5KY.jpg', 'Mango2.jpg', 18, '2021-10-31 00:18:20', '2021-10-31 00:18:20'),
(17, '/storage/product_Image//WXHTVdZMvkOY8lJYmbcD.jpg', 'Orange2.jpg', 19, '2021-10-31 00:19:06', '2021-10-31 00:19:06'),
(18, '/storage/product_Image//gvTja0LOLTdnIPUmpaTx.jpg', 'Peach2.jpg', 20, '2021-10-31 00:19:54', '2021-10-31 00:19:54'),
(19, '/storage/product_Image//iz5n2OVUUp5vBFPuIxWz.jpg', 'Plum2.jpg', 21, '2021-10-31 00:20:45', '2021-10-31 00:20:45'),
(20, '/storage/product_Image//YY3DhVIS7kX06PG3PBoL.jpg', 'Coconut2.jpg', 22, '2021-10-31 00:34:14', '2021-10-31 00:34:14'),
(21, '/storage/product_Image//sZgwOEJRtxYD0pM27Eo1.jpg', 'Papaya2.jpg', 23, '2021-10-31 00:35:51', '2021-10-31 00:35:51'),
(22, '/storage/product_Image//qqE3VgW9MsxtbkI6JRi9.jpg', 'Pineapple2.jpg', 24, '2021-10-31 00:37:58', '2021-10-31 00:37:58'),
(23, '/storage/product//ic7KV6cAtP7chQvKJsCI.jpg', 'Sapodilla2.jpg', 25, '2021-10-31 00:40:30', '2021-10-31 00:40:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `image_path`, `image_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'fruit1', '/storage/slider//bbX0sl8LRzjWikgZGWj1.jpg', 'fruit-still-life-1296x728-header.jpg', 'slider 1', '2021-10-29 02:19:02', '2021-10-29 02:19:02'),
(2, 'fruit2', '/storage/slider//5DUXcpezTtkOnLOLFzPI.jpg', '2-2-2-3foodgroups_fruits_detailfeature.jpg', 'slider 2', '2021-10-29 02:21:25', '2021-10-29 02:21:25'),
(3, 'fruit3', '/storage/slider//yVoIzbBbTbqhgXhChBD9.jpg', 'fruit-og-d176ef00.jpg', 'slider 3', '2021-10-29 02:21:48', '2021-10-29 02:21:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `typeproducts`
--

CREATE TABLE `typeproducts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `typeproducts`
--

INSERT INTO `typeproducts` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Miền nam', 0, 'Miền nam', '2021-10-27 00:29:18', '2021-10-27 00:29:18', NULL),
(4, 'Miền trung', 0, 'Miền trung', '2021-10-27 00:29:30', '2021-10-27 00:29:30', NULL),
(5, 'Miền tây', 0, 'Miền tây', '2021-10-27 00:29:38', '2021-10-27 00:29:38', NULL),
(6, 'Miền bắc', 0, 'Miền bắc', '2021-10-27 00:29:48', '2021-10-27 00:29:48', NULL),
(7, '123abc', 0, '123abc', '2021-10-31 19:18:52', '2021-10-31 20:01:53', '2021-10-31 20:01:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `is_admin`) VALUES
(2, 'tran long', 'dtranlong@gmail.com', NULL, '$2y$10$m1K9DuQDJ4g7OZqth9Oh4ukJe.1Z1k7C9y.GnL/Sy0w8y03/3L2bi', NULL, '2021-11-07 01:32:08', '2021-11-07 01:32:08', NULL, 1),
(3, 'Ngan Tam', 'nngantam@gmail.com', NULL, '$2y$10$TynVaiqkBFSLBRGF5j11X.WXlQ6bO5uCDuBlNHmeTUGeDXJnninq.', NULL, '2021-11-07 01:37:00', '2021-11-07 01:37:00', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_comment`
--

CREATE TABLE `users_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_users` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `typeproducts`
--
ALTER TABLE `typeproducts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users_comment`
--
ALTER TABLE `users_comment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `typeproducts`
--
ALTER TABLE `typeproducts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users_comment`
--
ALTER TABLE `users_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
