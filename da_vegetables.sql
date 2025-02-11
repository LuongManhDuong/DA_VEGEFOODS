-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 11, 2025 lúc 10:57 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da_vegetables`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `don_hang_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `don_gia` double NOT NULL,
  `so_luong` bigint(20) UNSIGNED NOT NULL,
  `thanh_tien` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`, `created_at`, `updated_at`) VALUES
(36, 34, 27, 135000, 10, 1350000, '2025-02-11 00:09:51', '2025-02-11 00:09:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('percentage','fixed') NOT NULL,
  `value` double NOT NULL,
  `expiration_date` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `type`, `value`, `expiration_date`, `created_at`, `updated_at`) VALUES
(2, 'sad', 'percentage', 50, '2025-02-19 01:37:00', '2025-02-10 04:35:44', '2025-02-10 08:27:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `hinh_anh`, `ten_danh_muc`, `trang_thai`, `created_at`, `updated_at`) VALUES
(1, 'uploads/danhmucs/769FDjenUdS6k9AYxHcq7OebZahZpBl7rP8kQ7Fe.jpg', 'Trái cây', 1, NULL, '2025-02-06 07:24:19'),
(2, 'uploads/danhmucs/UDHHTnWkArfWM5e1vBwDXJzf0mA2x1Rymwe0D5qM.jpg', 'Rau', 1, '2025-02-05 08:25:41', '2025-02-06 07:23:31'),
(4, 'uploads/danhmucs/pkWye5JuZomuKxgWS8YXsPBc0q7BtLf4L1JMkYzh.jpg', 'Nước ép', 1, '2025-02-06 05:27:39', '2025-02-06 07:23:42'),
(5, 'uploads/danhmucs/HarcFc8bFph4aDhFjGfjfkL2zahIi4Z07tjb4jhp.jpg', 'Hạt khô', 1, '2025-02-06 05:30:04', '2025-02-10 05:11:02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_don_hang` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) NOT NULL,
  `so_dien_thoai_nguoi_nhan` varchar(10) NOT NULL,
  `dia_chi_nguoi_nhan` varchar(255) NOT NULL,
  `ghi_chu` varchar(255) DEFAULT NULL,
  `trang_thai_don_hang` varchar(255) NOT NULL DEFAULT 'cho_xac_nhan',
  `trang_thai_thanh_toan` varchar(255) NOT NULL DEFAULT 'chua_thanh_toan',
  `tien_hang` double NOT NULL,
  `tien_ship` double NOT NULL,
  `tong_tien` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `user_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `so_dien_thoai_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ghi_chu`, `trang_thai_don_hang`, `trang_thai_thanh_toan`, `tien_hang`, `tien_ship`, `tong_tien`, `created_at`, `updated_at`) VALUES
(34, 'MDH-1-1739257791', 1, 'mduong', 'duongluong2k4@gmail.com', '0961297562', 'Thái Bình', 'Ahihi', 'huy_don_hang', 'da_thanh_toan', 2150000, 30000, 1105000, '2025-02-11 00:09:51', '2025-02-11 00:15:13');

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
-- Cấu trúc bảng cho bảng `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `gia` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `san_pham_id` bigint(20) UNSIGNED NOT NULL,
  `hinh_anh` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `hinh_anh`, `created_at`, `updated_at`) VALUES
(8, 5, 'uploads/hinhanhsanpham/id_5/GTL3DYtpg08KtUZCmWVsMiwbAZg5iIfp7f4i9BiT.jpg', '2025-02-06 23:54:17', '2025-02-06 23:54:17'),
(10, 6, 'uploads/hinhanhsanpham/id_6/IxkdvYN4h7YOhN8OMffcitfnjYM0m46zuKi7Oluz.jpg', '2025-02-06 23:55:40', '2025-02-06 23:55:40'),
(12, 9, 'uploads/hinhanhsanpham/id_9/urXyo1jeKwhCtm2oUt7vOQzyaULiGPH6k4NbbOVh.jpg', '2025-02-06 23:56:26', '2025-02-06 23:56:26'),
(13, 12, 'uploads/hinhanhsanpham/id_12/ommJT15nq2I5yO8klT0jgJFo8VLrr2AVz1nv8LY4.jpg', '2025-02-06 23:57:02', '2025-02-06 23:57:02'),
(14, 26, 'uploads/hinhanhsanpham/id_26/2oheKGtgGtsa99E47Lnb3wcgve866tOVojQ3phky.jpg', '2025-02-06 23:57:21', '2025-02-06 23:57:21'),
(15, 27, 'uploads/hinhanhsanpham/id_27/HaLQfIUylOfDMW6vMMaloQ6ZNQgwylpgI9ZdlGZs.jpg', '2025-02-06 23:57:38', '2025-02-06 23:57:38'),
(16, 28, 'uploads/hinhanhsanpham/id_28/nGIoNafYRXVtY5npzDx0OmtDIEN8ai5x0Clhxrg7.jpg', '2025-02-06 23:57:54', '2025-02-06 23:57:54'),
(17, 29, 'uploads/hinhanhsanpham/id_29/Dyrn6gWRlxmtkuCoP0qo82NWn0bmld8oXhO0pQHY.jpg', '2025-02-06 23:58:10', '2025-02-06 23:58:10');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_02_05_025747_update_users_table', 2),
(7, '2025_02_05_035234_create_danh_mucs_table', 3),
(8, '2025_02_05_035426_create_san_phams_table', 3),
(9, '2025_02_05_035437_create_hinh_anh_san_phams_table', 3),
(10, '2025_02_06_152540_add_is_active_to_san_phams_table', 4),
(11, '2025_02_06_153658_add_trang_thai_to_san_phams', 5),
(12, '2025_02_07_083135_create_cart_items_table', 6),
(13, '2025_02_07_101415_create_gio_hangs_table', 7),
(14, '2025_02_08_091346_create_don_hangs_table', 8),
(15, '2025_02_08_091413_create_chi_tiet_don_hangs_table', 8),
(16, '2025_02_08_091541_update_users_table', 8),
(17, '2025_02_08_101612_update_users_add_ghi_chu_table', 9),
(18, '2025_02_10_092920_create_thong_tin_trang_webs_table', 10),
(19, '2024_11_17_133844_create_coupons_table', 11),
(20, '2025_02_11_080353_create_wishlists_table', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Cấu trúc bảng cho bảng `san_phams`
--

CREATE TABLE `san_phams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ma_san_pham` varchar(255) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `gia_san_pham` double NOT NULL,
  `gia_khuyen_mai` double DEFAULT NULL,
  `mo_ta_ngan` varchar(255) DEFAULT NULL,
  `noi_dung` text DEFAULT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `trang_thai` tinyint(1) NOT NULL DEFAULT 1,
  `luot_xem` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `ngay_nhap` date NOT NULL,
  `danh_muc_id` bigint(20) UNSIGNED NOT NULL,
  `is_type` tinyint(1) NOT NULL DEFAULT 1,
  `is_new` tinyint(1) NOT NULL DEFAULT 1,
  `is_hot` tinyint(1) NOT NULL DEFAULT 1,
  `is_hot_deal` tinyint(1) NOT NULL DEFAULT 1,
  `is_show_home` tinyint(1) NOT NULL DEFAULT 1,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_phams`
--

INSERT INTO `san_phams` (`id`, `ma_san_pham`, `ten_san_pham`, `hinh_anh`, `gia_san_pham`, `gia_khuyen_mai`, `mo_ta_ngan`, `noi_dung`, `so_luong`, `trang_thai`, `luot_xem`, `ngay_nhap`, `danh_muc_id`, `is_type`, `is_new`, `is_hot`, `is_hot_deal`, `is_show_home`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'DH01', 'Súp lơ xanh', 'uploads/sanpham/jCV1NfxfAkXw4Un4CiAhNlTNZQaVvi8CMKWw5e1o.jpg', 125000, 120000, 'Súp lơ xanh là nguồn cung cấp vitamin C, chất xơ và các khoáng chất quan trọng. Nó giúp tăng cường hệ miễn dịch, hỗ trợ tiêu hóa và giảm nguy cơ mắc bệnh ung thư. Loại rau này cũng có khả năng làm giảm cholesterol xấu và rất tốt cho sức khỏe tim mạch.', 'Súp lơ xanh là nguồn cung cấp vitamin C, chất xơ và các khoáng chất quan trọng. Nó giúp tăng cường hệ miễn dịch, hỗ trợ tiêu hóa và giảm nguy cơ mắc bệnh ung thư. Loại rau này cũng có khả năng làm giảm cholesterol xấu và rất tốt cho sức khỏe tim mạch.', 20, 1, 0, '2025-02-06', 2, 1, 0, 0, 0, 0, 1, '2025-02-06 09:01:54', '2025-02-06 23:54:53'),
(6, 'DH02', 'Đậu xanh', 'uploads/sanpham/3kvKmx1J9jSybZ3VMIhwVUtdOknLSISIvpkwUy04.jpg', 120000, 90000, 'Đậu xanh là một nguồn tuyệt vời của protein thực vật, chất xơ và các khoáng chất như sắt, magiê. Nó giúp tăng cường hệ tiêu hóa, kiểm soát đường huyết và tốt cho tim mạch. Ngoài ra, đậu xanh còn giúp thanh nhiệt và cải thiện sức khỏe làn da.', 'Đậu xanh là một nguồn tuyệt vời của protein thực vật, chất xơ và các khoáng chất như sắt, magiê. Nó giúp tăng cường hệ tiêu hóa, kiểm soát đường huyết và tốt cho tim mạch. Ngoài ra, đậu xanh còn giúp thanh nhiệt và cải thiện sức khỏe làn da.', 10, 1, 0, '2025-02-06', 2, 1, 0, 0, 0, 0, 1, '2025-02-06 09:04:48', '2025-02-06 23:55:59'),
(9, 'DH05', 'Cà chua', 'uploads/sanpham/KN5SN5HqpAdHiyqxggR8uo9JQfBhlFeyVUbphIC3.jpg', 120000, 80000, 'Cà chua chứa lycopene, một chất chống oxy hóa mạnh giúp ngăn ngừa lão hóa và cải thiện sức khỏe tim mạch. Nó cũng giàu vitamin C, hỗ trợ sức đề kháng và giúp bảo vệ làn da khỏi tác động của tia UV.', 'Cà chua chứa lycopene, một chất chống oxy hóa mạnh giúp ngăn ngừa lão hóa và cải thiện sức khỏe tim mạch. Nó cũng giàu vitamin C, hỗ trợ sức đề kháng và giúp bảo vệ làn da khỏi tác động của tia UV.', 50, 1, 0, '2025-02-06', 2, 1, 0, 0, 0, 0, 1, '2025-02-06 09:09:06', '2025-02-06 23:56:35'),
(12, 'DH08', 'Nước ép trái cây', 'uploads/sanpham/X4DaVfsj1RVZhr3gsc97pHeBmQN5XleS6SEptRkD.jpg', 175000, 150000, 'Nước ép trái cây tươi cung cấp vitamin và khoáng chất cần thiết cho cơ thể. Nó giúp bổ sung năng lượng, hỗ trợ tiêu hóa và cung cấp chất chống oxy hóa. Ngoài ra, nước ép còn giúp làm sáng da, cải thiện hệ miễn dịch', 'Nước ép trái cây tươi cung cấp vitamin và khoáng chất cần thiết cho cơ thể. Nó giúp bổ sung năng lượng, hỗ trợ tiêu hóa và cung cấp chất chống oxy hóa. Ngoài ra, nước ép còn giúp làm sáng da, cải thiện hệ miễn dịch', 30, 1, 0, '2025-02-06', 4, 1, 0, 0, 0, 0, 1, '2025-02-06 09:12:14', '2025-02-06 23:57:02'),
(26, 'DH03', 'Bắp cải tím', 'uploads/sanpham/RoCX6rDlV8L9Yki8L4rO30tuS9HQXvodJxQWLO7n.jpg', 173000, 173000, 'Bắp cải tím là nguồn giàu chất xơ, vitamin C và các hợp chất chống oxy hóa mạnh mẽ. Nó giúp bảo vệ cơ thể khỏi các bệnh tim mạch, hỗ trợ tiêu hóa và giảm viêm. Bắp cải tím cũng có khả năng làm giảm cân, điều chỉnh đường huyết', 'Bắp cải tím là nguồn giàu chất xơ, vitamin C và các hợp chất chống oxy hóa mạnh mẽ. Nó giúp bảo vệ cơ thể khỏi các bệnh tim mạch, hỗ trợ tiêu hóa và giảm viêm. Bắp cải tím cũng có khả năng làm giảm cân, điều chỉnh đường huyết', 10, 1, 0, '2025-02-07', 2, 1, 0, 0, 0, 0, 1, '2025-02-06 10:18:22', '2025-02-06 23:57:21'),
(27, 'DH04', 'Cà rốt', 'uploads/sanpham/vpR3hD3DkL895asylrdk2iZHrIdkgWYY2XIk32Bp.jpg', 135000, 135000, 'Cà rốt là nguồn giàu beta-carotene, một chất chống oxy hóa mạnh mẽ giúp cải thiện thị lực và làm đẹp da. Nó cũng cung cấp vitamin A, hỗ trợ sức khỏe miễn dịch và bảo vệ cơ thể khỏi các bệnh về tim mạch.', 'Cà rốt là nguồn giàu beta-carotene, một chất chống oxy hóa mạnh mẽ giúp cải thiện thị lực và làm đẹp da. Nó cũng cung cấp vitamin A, hỗ trợ sức khỏe miễn dịch và bảo vệ cơ thể khỏi các bệnh về tim mạch.', 70, 1, 0, '2025-02-07', 2, 1, 0, 0, 0, 0, 1, '2025-02-06 10:20:43', '2025-02-06 23:57:38'),
(28, 'DH06', 'Dâu tây', 'uploads/sanpham/CVeSDhCoK7PZb1iPhV37UdS2m3vVLjPJPxLIeVPF.jpg', 160000, 160000, 'Dâu tây không chỉ chứa nhiều vitamin C mà còn là nguồn tuyệt vời của chất chống oxy hóa, giúp làm chậm quá trình lão hóa và bảo vệ tế bào khỏi sự tổn hại. Nó hỗ trợ sức khỏe tim mạch, cải thiện tiêu hóa', 'Dâu tây không chỉ chứa nhiều vitamin C mà còn là nguồn tuyệt vời của chất chống oxy hóa, giúp làm chậm quá trình lão hóa và bảo vệ tế bào khỏi sự tổn hại. Nó hỗ trợ sức khỏe tim mạch, cải thiện tiêu hóa', 20, 1, 0, '2025-02-07', 1, 1, 0, 0, 0, 0, 1, '2025-02-06 10:21:57', '2025-02-06 23:57:54'),
(29, 'DH07', 'Ớt chuông', 'uploads/sanpham/MzQPkeLrik1rT4xyvSIUpb3ai3aVldamQDwme2HV.jpg', 120000, 120000, 'Ớt chuông chứa nhiều vitamin A, C và các khoáng chất quan trọng, giúp tăng cường sức khỏe mắt và bảo vệ da khỏi tác hại của môi trường. Nó cũng giúp tăng cường hệ miễn dịch, chống viêm và cung cấp chất chống oxy hóa.', 'Ớt chuông chứa nhiều vitamin A, C và các khoáng chất quan trọng, giúp tăng cường sức khỏe mắt và bảo vệ da khỏi tác hại của môi trường. Nó cũng giúp tăng cường hệ miễn dịch, chống viêm và cung cấp chất chống oxy hóa.', 30, 1, 0, '2025-02-07', 2, 1, 0, 0, 0, 0, 1, '2025-02-06 10:22:38', '2025-02-07 00:15:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thong_tin_trang_webs`
--

CREATE TABLE `thong_tin_trang_webs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thong_tin_trang_webs`
--

INSERT INTO `thong_tin_trang_webs` (`id`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, '0961297562', 'duongluong2k5@gmail.com', NULL, '2025-02-10 02:46:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(10) DEFAULT NULL,
  `ghi_chu` varchar(10) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `address`, `ghi_chu`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mduong', '0961297562', 'duongluong2k4@gmail.com', 'Thái Bình ', 'Ahihi', NULL, '555555555', 'Admin', 'ooYaJMHrxHWiFoagOSCUD0JJKXRryaWnWFO2IM68CXZIi6XqN7mloD9WU1Pc', '2025-02-04 08:35:41', '2025-02-05 02:58:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chi_tiet_don_hangs_don_hang_id_foreign` (`don_hang_id`),
  ADD KEY `chi_tiet_don_hangs_san_pham_id_foreign` (`san_pham_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`);

--
-- Chỉ mục cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `don_hangs_ma_don_hang_unique` (`ma_don_hang`),
  ADD KEY `don_hangs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hangs_user_id_foreign` (`user_id`),
  ADD KEY `gio_hangs_san_pham_id_foreign` (`san_pham_id`);

--
-- Chỉ mục cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hinh_anh_san_phams_san_pham_id_foreign` (`san_pham_id`);

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
-- Chỉ mục cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `san_phams_ma_san_pham_unique` (`ma_san_pham`),
  ADD KEY `san_phams_danh_muc_id_foreign` (`danh_muc_id`);

--
-- Chỉ mục cho bảng `thong_tin_trang_webs`
--
ALTER TABLE `thong_tin_trang_webs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `thong_tin_trang_webs`
--
ALTER TABLE `thong_tin_trang_webs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_don_hang_id_foreign` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Các ràng buộc cho bảng `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`),
  ADD CONSTRAINT `gio_hangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD CONSTRAINT `hinh_anh_san_phams_san_pham_id_foreign` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Các ràng buộc cho bảng `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_danh_muc_id_foreign` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `san_phams` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
