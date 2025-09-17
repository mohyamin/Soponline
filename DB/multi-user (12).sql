-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Sep 2025 pada 09.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multi-user`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_owner` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tlp` varchar(50) DEFAULT NULL,
  `title` varchar(20) DEFAULT NULL,
  `nama_aplikasi` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `copy_right` varchar(50) DEFAULT NULL,
  `versi` varchar(20) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `aplikasi`
--

INSERT INTO `aplikasi` (`id`, `nama_owner`, `alamat`, `tlp`, `title`, `nama_aplikasi`, `logo`, `copy_right`, `versi`, `tahun`) VALUES
(1, 'IT Division', 'jalan samanhudi', '082123263194', 'SopOnline Apps', 'SopOnline Apps', 'pengaduan1.png', 'Copy Right &copy;', '1.1', '2025');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `nama_kat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nama_kat`) VALUES
(73, 'Regulasi BI'),
(79, 'Regulasi OJK - Pasar Modal'),
(83, 'Regulasi OJK - Perbankan'),
(84, 'Undang-Undang'),
(85, 'Peraturan Pemerintah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_internal`
--

CREATE TABLE `kategori_internal` (
  `id_kategori` int(11) NOT NULL,
  `nama_internal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kategori_internal`
--

INSERT INTO `kategori_internal` (`id_kategori`, `nama_internal`) VALUES
(1, 'Risiko'),
(2, 'APUPPT'),
(4, 'Regulasi'),
(5, 'Sistem dan Prosedur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_revoked`
--

CREATE TABLE `kategori_revoked` (
  `id_kateg` int(11) NOT NULL,
  `nama_revoked` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_revoked`
--

INSERT INTO `kategori_revoked` (`id_kateg`, `nama_revoked`) VALUES
(4, 'rintoa'),
(5, 'aaaaaadaada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_user`
--

CREATE TABLE `log_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fitur` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `cretead_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_user`
--

INSERT INTO `log_user` (`id`, `id_user`, `fitur`, `keterangan`, `cretead_at`, `update_at`) VALUES
(1167, 34, 'Menu', 'Merubah Data Menu', '2025-05-21 14:54:22', '2025-05-21 14:54:22'),
(1168, 34, 'Menu', 'Merubah Data Menu', '2025-05-21 14:55:09', '2025-05-21 14:55:09'),
(1169, 34, 'Menu Internal', 'Menambahkan Data', '2025-05-21 15:26:53', '2025-05-21 15:26:53'),
(1170, 34, 'Menu Internal', 'Menambahkan Data', '2025-05-21 15:31:50', '2025-05-21 15:31:50'),
(1171, 34, 'Menu Internal', 'Mengubah Data', '2025-05-21 15:32:26', '2025-05-21 15:32:26'),
(1172, 34, 'Menu Internal', 'Menghapus Data', '2025-05-21 15:35:04', '2025-05-21 15:35:04'),
(1173, 34, 'Menu Internal', 'Menghapus Data', '2025-05-21 15:35:14', '2025-05-21 15:35:14'),
(1174, 34, 'Menu Internal', 'Menghapus Data', '2025-05-21 15:35:17', '2025-05-21 15:35:17'),
(1175, 34, 'Menu Internal', 'Menghapus Data', '2025-05-21 15:35:20', '2025-05-21 15:35:20'),
(1176, 34, 'Menu Internal', 'Menambahkan Data', '2025-05-21 15:36:05', '2025-05-21 15:36:05'),
(1177, 34, 'Menu Internal', 'Menghapus Data', '2025-05-21 15:36:43', '2025-05-21 15:36:43'),
(1178, 34, 'Menu Internal', 'Menambahkan Data', '2025-05-21 15:37:17', '2025-05-21 15:37:17'),
(1179, 34, 'User', 'Menambahkan Data User', '2025-05-26 13:43:24', '2025-05-26 13:43:24'),
(1180, 34, 'Menu', 'Merubah Data Menu', '2025-05-26 13:50:29', '2025-05-26 13:50:29'),
(1181, 268, 'Menu Internal', 'Menambahkan Data', '2025-05-26 14:32:30', '2025-05-26 14:32:30'),
(1182, 268, 'Menu Internal', 'Menambahkan Data', '2025-05-26 14:32:59', '2025-05-26 14:32:59'),
(1183, 268, 'Menu Internal', 'Menambahkan Data', '2025-05-26 14:33:18', '2025-05-26 14:33:18'),
(1184, 268, 'Menu Internal', 'Menghapus Data', '2025-05-26 14:33:50', '2025-05-26 14:33:50'),
(1185, 268, 'Menu Internal', 'Menghapus Data', '2025-05-26 14:33:57', '2025-05-26 14:33:57'),
(1186, 34, 'Menu Internal', 'Menambahkan Data', '2025-06-02 14:52:01', '2025-06-02 14:52:01'),
(1187, 34, 'Menu Internal', 'Menambahkan Data', '2025-06-02 14:52:47', '2025-06-02 14:52:47'),
(1188, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 14:53:28', '2025-06-02 14:53:28'),
(1189, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 14:53:31', '2025-06-02 14:53:31'),
(1190, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 14:53:34', '2025-06-02 14:53:34'),
(1191, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 14:53:38', '2025-06-02 14:53:38'),
(1192, 34, 'Menu Internal', 'Menambahkan Data', '2025-06-02 14:56:21', '2025-06-02 14:56:21'),
(1193, 34, 'Menu Compliance', 'Menambahkan Data', '2025-06-02 14:58:41', '2025-06-02 14:58:41'),
(1194, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 15:21:15', '2025-06-02 15:21:15'),
(1195, 34, 'Menu Internal', 'Menambahkan Data', '2025-06-02 18:25:16', '2025-06-02 18:25:16'),
(1196, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 18:25:53', '2025-06-02 18:25:53'),
(1197, 34, 'Menu Internal', 'Menambahkan Data', '2025-06-02 18:29:27', '2025-06-02 18:29:27'),
(1198, 34, 'Menu Internal', 'Menghapus Data', '2025-06-02 18:34:17', '2025-06-02 18:34:17'),
(1199, 34, 'Menu Internal', 'Menambahkan Data', '2025-06-02 18:34:43', '2025-06-02 18:34:43'),
(1200, 268, 'Menu Internal', 'Menambahkan Data', '2025-06-18 13:38:54', '2025-06-18 13:38:54'),
(1201, 34, 'Menu Compliance', 'Menambahkan Data', '2025-07-10 17:46:44', '2025-07-10 17:46:44'),
(1202, 34, 'Menu Compliance', 'Mengubah Data', '2025-07-10 17:46:55', '2025-07-10 17:46:55'),
(1203, 34, 'Menu Compliance', 'Menambahkan Data', '2025-07-10 18:07:13', '2025-07-10 18:07:13'),
(1204, 34, 'Menu Compliance', 'Menambahkan Data', '2025-07-10 18:14:36', '2025-07-10 18:14:36'),
(1205, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-11 13:55:39', '2025-07-11 13:55:39'),
(1206, 34, 'Menu Revoked', 'Menghapus Data', '2025-07-11 13:56:43', '2025-07-11 13:56:43'),
(1207, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 09:13:28', '2025-07-14 09:13:28'),
(1208, 34, 'Menu Compliance', 'Menambahkan Data', '2025-07-14 09:15:50', '2025-07-14 09:15:50'),
(1209, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 09:18:43', '2025-07-14 09:18:43'),
(1210, 34, 'Menu Compliance', 'Menambahkan Data', '2025-07-14 09:19:09', '2025-07-14 09:19:09'),
(1211, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 11:05:26', '2025-07-14 11:05:26'),
(1212, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 11:06:02', '2025-07-14 11:06:02'),
(1213, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 16:38:10', '2025-07-14 16:38:10'),
(1214, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 16:39:37', '2025-07-14 16:39:37'),
(1215, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 16:50:52', '2025-07-14 16:50:52'),
(1216, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 16:53:34', '2025-07-14 16:53:34'),
(1217, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 16:55:37', '2025-07-14 16:55:37'),
(1218, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 16:58:07', '2025-07-14 16:58:07'),
(1219, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 17:01:37', '2025-07-14 17:01:37'),
(1220, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 17:03:23', '2025-07-14 17:03:23'),
(1221, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 17:04:49', '2025-07-14 17:04:49'),
(1222, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 17:06:35', '2025-07-14 17:06:35'),
(1223, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 17:08:51', '2025-07-14 17:08:51'),
(1224, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-14 17:10:39', '2025-07-14 17:10:39'),
(1225, 34, 'Menu Compliance', 'Menambahkan Data', '2025-07-17 10:08:59', '2025-07-17 10:08:59'),
(1226, 34, 'Menu Regulasi', 'Menambahkan Data', '2025-07-17 10:10:26', '2025-07-17 10:10:26'),
(1227, 34, 'Menu Compliance', 'Menghapus Data', '2025-07-17 10:10:41', '2025-07-17 10:10:41'),
(1228, 34, 'Menu Compliance', 'Menghapus Data', '2025-07-17 11:27:56', '2025-07-17 11:27:56'),
(1229, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-18 13:05:08', '2025-07-18 13:05:08'),
(1230, 34, 'Menu Regulasi', 'Menambahkan Data', '2025-07-21 09:42:20', '2025-07-21 09:42:20'),
(1231, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-25 09:26:48', '2025-07-25 09:26:48'),
(1232, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-25 09:32:56', '2025-07-25 09:32:56'),
(1233, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-25 09:38:08', '2025-07-25 09:38:08'),
(1234, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-25 09:42:20', '2025-07-25 09:42:20'),
(1235, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-25 16:05:39', '2025-07-25 16:05:39'),
(1236, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-28 13:55:34', '2025-07-28 13:55:34'),
(1237, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-28 14:41:14', '2025-07-28 14:41:14'),
(1238, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-28 14:52:16', '2025-07-28 14:52:16'),
(1239, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-28 14:56:38', '2025-07-28 14:56:38'),
(1240, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-28 15:03:49', '2025-07-28 15:03:49'),
(1241, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-31 09:25:37', '2025-07-31 09:25:37'),
(1242, 34, 'Menu Internal', 'Menambahkan Data', '2025-07-31 09:45:51', '2025-07-31 09:45:51'),
(1243, 34, 'Menu Revoked', 'Menambahkan Data', '2025-07-31 09:52:38', '2025-07-31 09:52:38'),
(1244, 34, 'User', 'Merubah Data User', '2025-08-19 14:04:30', '2025-08-19 14:04:30'),
(1245, 34, 'User', 'Merubah Data User', '2025-08-19 14:06:27', '2025-08-19 14:06:27'),
(1246, 34, 'User', 'Merubah Data User', '2025-08-19 14:12:00', '2025-08-19 14:12:00'),
(1247, 34, 'User', 'Merubah Data User', '2025-08-19 14:12:29', '2025-08-19 14:12:29'),
(1248, 34, 'User', 'Merubah Data User', '2025-08-19 14:14:22', '2025-08-19 14:14:22'),
(1249, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:23:45', '2025-08-19 15:23:45'),
(1250, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:25:31', '2025-08-19 15:25:31'),
(1251, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:25:36', '2025-08-19 15:25:36'),
(1252, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:26:05', '2025-08-19 15:26:05'),
(1253, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:28:54', '2025-08-19 15:28:54'),
(1254, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:37:13', '2025-08-19 15:37:13'),
(1255, 34, 'Menu Internal', 'Menambahkan Data', '2025-08-19 15:37:24', '2025-08-19 15:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akses_menu`
--

CREATE TABLE `tbl_akses_menu` (
  `id` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `view_level` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akses_menu`
--

INSERT INTO `tbl_akses_menu` (`id`, `id_level`, `id_menu`, `view_level`) VALUES
(1, 1, 1, 'Y'),
(2, 1, 2, 'Y'),
(78, 1, 55, 'Y'),
(90, 1, 58, 'Y'),
(123, 1, 65, 'N'),
(132, 9, 1, 'Y'),
(133, 9, 2, 'N'),
(134, 9, 55, 'N'),
(135, 9, 58, 'N'),
(136, 9, 65, 'N'),
(137, 10, 1, 'Y'),
(138, 10, 2, 'N'),
(139, 10, 55, 'N'),
(140, 10, 58, 'N'),
(141, 10, 65, 'N'),
(142, 1, 68, 'Y'),
(144, 9, 68, 'Y'),
(145, 10, 68, 'Y'),
(146, 1, 69, 'N'),
(148, 9, 69, 'N'),
(149, 10, 69, 'N'),
(161, 1, 71, 'N'),
(163, 9, 71, 'N'),
(164, 10, 71, 'N'),
(165, 12, 1, 'Y'),
(166, 12, 2, 'Y'),
(167, 12, 55, 'Y'),
(168, 12, 58, 'Y'),
(169, 12, 65, 'N'),
(170, 12, 68, 'Y'),
(171, 12, 69, 'Y'),
(173, 12, 71, 'N'),
(191, 1, 74, 'Y'),
(192, 9, 74, 'N'),
(193, 10, 74, 'N'),
(194, 12, 74, 'Y'),
(195, 1, 75, 'Y'),
(196, 9, 75, 'N'),
(197, 10, 75, 'N'),
(198, 12, 75, 'Y'),
(199, 1, 76, 'Y'),
(200, 9, 76, 'Y'),
(201, 10, 76, 'Y'),
(202, 12, 76, 'Y'),
(203, 1, 77, 'Y'),
(204, 9, 77, 'Y'),
(205, 10, 77, 'Y'),
(206, 12, 77, 'Y'),
(207, 1, 78, 'Y'),
(208, 9, 78, 'N'),
(209, 10, 78, 'N'),
(210, 12, 78, 'Y'),
(211, 1, 79, 'Y'),
(212, 9, 79, 'N'),
(213, 10, 79, 'N'),
(214, 12, 79, 'Y'),
(215, 1, 80, 'Y'),
(216, 9, 80, 'Y'),
(217, 10, 80, 'N'),
(218, 12, 80, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_akses_submenu`
--

CREATE TABLE `tbl_akses_submenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_level` int(11) NOT NULL,
  `id_submenu` int(11) NOT NULL,
  `view_level` enum('Y','N') DEFAULT 'N',
  `add_level` enum('Y','N') DEFAULT 'N',
  `edit_level` enum('Y','N') DEFAULT 'N',
  `delete_level` enum('Y','N') DEFAULT 'N',
  `print_level` enum('Y','N') DEFAULT 'N',
  `upload_level` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_akses_submenu`
--

INSERT INTO `tbl_akses_submenu` (`id`, `id_level`, `id_submenu`, `view_level`, `add_level`, `edit_level`, `delete_level`, `print_level`, `upload_level`) VALUES
(2, 1, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(4, 1, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(6, 1, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(7, 1, 8, 'Y', 'N', 'N', 'N', 'N', 'N'),
(9, 1, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(13, 1, 14, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(26, 1, 15, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(30, 1, 17, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(32, 1, 18, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(34, 1, 19, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(36, 1, 20, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(82, 1, 23, 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(85, 1, 24, 'Y', 'N', 'N', 'N', 'N', 'N'),
(88, 1, 25, 'Y', 'N', 'N', 'N', 'N', 'N'),
(108, 1, 27, 'Y', 'N', 'N', 'N', 'N', 'N'),
(112, 1, 28, 'Y', 'N', 'N', 'N', 'N', 'N'),
(160, 9, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(161, 9, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(162, 9, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(163, 9, 8, 'N', 'N', 'N', 'N', 'N', 'N'),
(164, 9, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(165, 9, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(166, 9, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(167, 9, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(168, 9, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(169, 9, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(170, 9, 23, 'N', 'N', 'N', 'N', 'N', 'N'),
(171, 9, 24, 'N', 'N', 'N', 'N', 'N', 'N'),
(172, 9, 25, 'N', 'N', 'N', 'N', 'N', 'N'),
(173, 9, 27, 'N', 'N', 'N', 'N', 'N', 'N'),
(174, 9, 28, 'N', 'N', 'N', 'N', 'N', 'N'),
(175, 10, 1, 'N', 'N', 'N', 'N', 'N', 'N'),
(176, 10, 2, 'N', 'N', 'N', 'N', 'N', 'N'),
(177, 10, 7, 'N', 'N', 'N', 'N', 'N', 'N'),
(178, 10, 8, 'N', 'N', 'N', 'N', 'N', 'N'),
(179, 10, 10, 'N', 'N', 'N', 'N', 'N', 'N'),
(180, 10, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(181, 10, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(182, 10, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(183, 10, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(184, 10, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(185, 10, 23, 'N', 'N', 'N', 'N', 'N', 'N'),
(186, 10, 24, 'N', 'N', 'N', 'N', 'N', 'N'),
(187, 10, 25, 'N', 'N', 'N', 'N', 'N', 'N'),
(188, 10, 27, 'N', 'N', 'N', 'N', 'N', 'N'),
(189, 10, 28, 'N', 'N', 'N', 'N', 'N', 'N'),
(205, 12, 1, 'Y', 'N', 'N', 'N', 'N', 'N'),
(206, 12, 2, 'Y', 'Y', 'N', 'N', 'N', 'N'),
(207, 12, 7, 'Y', 'Y', 'N', 'N', 'N', 'N'),
(208, 12, 8, 'Y', 'Y', 'N', 'N', 'N', 'N'),
(209, 12, 10, 'Y', 'Y', 'N', 'N', 'N', 'N'),
(210, 12, 15, 'N', 'N', 'N', 'N', 'N', 'N'),
(211, 12, 17, 'N', 'N', 'N', 'N', 'N', 'N'),
(212, 12, 18, 'N', 'N', 'N', 'N', 'N', 'N'),
(213, 12, 19, 'N', 'N', 'N', 'N', 'N', 'N'),
(214, 12, 20, 'N', 'N', 'N', 'N', 'N', 'N'),
(215, 12, 23, 'N', 'N', 'N', 'N', 'N', 'N'),
(216, 12, 24, 'N', 'N', 'N', 'N', 'N', 'N'),
(217, 12, 25, 'N', 'N', 'N', 'N', 'N', 'N'),
(218, 12, 27, 'N', 'N', 'N', 'N', 'N', 'N'),
(219, 12, 28, 'N', 'N', 'N', 'N', 'N', 'N'),
(239, 1, 34, 'N', 'N', 'N', 'N', 'N', 'N'),
(240, 9, 34, 'N', 'N', 'N', 'N', 'N', 'N'),
(241, 10, 34, 'N', 'N', 'N', 'N', 'N', 'N'),
(242, 12, 34, 'N', 'N', 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_compliance`
--

CREATE TABLE `tbl_compliance` (
  `id_file` int(11) NOT NULL,
  `url_file` varchar(250) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `id_kat` int(11) NOT NULL,
  `status` enum('peraturan ojk','surat edaran ojk','keputusan dewan komisioner','peraturan bi','surat edaran bi','peraturan anggota dewan gubernur','kementrian','ketenagakerjaan','lingkungan hidup','lps','pemerintah daerah','perpajakan','UU','lampiran') NOT NULL,
  `tahun` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `approval_status` enum('pending','approved','rejected') DEFAULT 'pending',
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `approval_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_compliance`
--

INSERT INTO `tbl_compliance` (`id_file`, `url_file`, `nama_file`, `id_kat`, `status`, `tahun`, `created_at`, `update_at`, `approval_status`, `approved_by`, `approved_at`, `approval_note`) VALUES
(61, 'http://10.10.11.12/SopOnline/uploads/ABCDE6.pdf', 'ABCDE', 73, 'surat edaran ojk', 2025, '2025-05-20 14:26:00', '0000-00-00 00:00:00', 'pending', NULL, NULL, NULL),
(62, 'http://10.10.11.12/SopOnline/uploads/test27.pdf', 'test123', 79, 'peraturan bi', 2025, '2025-05-20 14:47:00', '0000-00-00 00:00:00', 'pending', NULL, NULL, NULL),
(63, 'http://10.10.11.12/SopOnline/uploads/ABCDEAAAAAAAAAAAAAAAAA.pdf', 'ABCDEAAAAAAAAAAAAAAAAA', 83, 'peraturan bi', 2025, '2025-05-21 14:41:00', '0000-00-00 00:00:00', 'approved', 34, '2025-07-21 13:16:05', 'lllllllllllllllllllll'),
(64, 'http://10.10.11.12/SopOnline/uploads/KEBIJAKAN_DAN_PROSEDUR6.pdf', 'KEBIJAKAN DAN PROSEDUR', 83, 'peraturan ojk', 2025, '2025-06-02 14:58:00', '0000-00-00 00:00:00', 'pending', NULL, NULL, NULL),
(65, 'http://10.10.11.12/SopOnline/uploads/sedd.pdf', 'sedd', 73, 'peraturan ojk', 2024, '2024-01-10 17:46:00', '0000-00-00 00:00:00', 'approved', 34, '2025-08-11 10:26:47', ''),
(66, 'http://10.10.11.12/SopOnline/uploads/yamiinn.pdf', 'yamiinn', 83, 'surat edaran bi', 2024, '2024-02-09 18:06:00', '0000-00-00 00:00:00', 'rejected', 34, '2025-07-22 08:58:45', 'kurang'),
(67, 'http://10.10.11.12/SopOnline/uploads/dafafaf.pdf', 'dafafaf', 73, 'peraturan ojk', 2023, '2025-07-10 18:14:00', '0000-00-00 00:00:00', 'approved', 34, '2025-07-22 08:54:42', 'fsfsf'),
(68, 'http://10.10.11.12/SopOnline/uploads/test1232.pdf', 'test123', 79, 'surat edaran ojk', 2024, '2025-07-14 09:15:00', '0000-00-00 00:00:00', 'approved', 34, '2025-07-21 10:22:27', 'testing'),
(69, 'http://10.10.11.12/SopOnline/uploads/KEBIJAKAN_DAN_PROSEDUR11.pdf', 'KEBIJAKAN DAN PROSEDUR', 79, 'peraturan ojk', 2025, '2025-07-14 09:19:00', '0000-00-00 00:00:00', 'approved', 34, '2025-07-21 09:29:32', 'lakukan'),
(72, 'http://10.10.11.12/SopOnline/uploads/ABCDE10.pdf', 'ABCDE', 73, 'peraturan ojk', 2025, '2025-07-21 09:42:00', '0000-00-00 00:00:00', 'rejected', 34, '2025-07-21 10:11:59', 'tidak sesuai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_compliance_lampiran`
--

CREATE TABLE `tbl_compliance_lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_compliance_lampiran`
--

INSERT INTO `tbl_compliance_lampiran` (`id_lampiran`, `id_file`, `nama_file`, `file_url`, `created_at`) VALUES
(30, 61, '1747726109_Memo_Deviasi_rev.doc', 'uploads/lampiran/1747726109_Memo_Deviasi rev.doc', '2025-05-20 14:28:29'),
(31, 62, '1747727421_1747725554_PIN_(1).zip', 'uploads/lampiran/1747727421_1747725554_PIN (1).zip', '2025-05-20 14:50:21'),
(32, 62, '1747727421_HOLI_SPANDUK_2025.pdf', 'uploads/lampiran/1747727421_HOLI SPANDUK 2025.pdf', '2025-05-20 14:50:21'),
(33, 62, '1747727421_Background.pdf', 'uploads/lampiran/1747727421_Background.pdf', '2025-05-20 14:50:21'),
(34, 62, '1747727421_Daftar_NNS_QRIS_(Update_04_Maret_2025).pdf', 'uploads/lampiran/1747727421_Daftar NNS QRIS (Update 04 Maret 2025).pdf', '2025-05-20 14:50:21'),
(35, 63, '1747813291_Formulir_Pengaduan_Keluhan_Nasabah_14102024_-_Copy.pdf', 'uploads/lampiran/1747813291_Formulir Pengaduan Keluhan Nasabah 14102024 - Copy.pdf', '2025-05-21 14:41:31'),
(36, 64, '1748851121_Lampiran.zip', 'uploads/lampiran/1748851121_Lampiran.zip', '2025-06-02 14:58:41'),
(37, 64, '1748851121_SK_026-2025_Lamp_3_Laporan_Perbedaan_Kualitas_Aset_Produktif.doc', 'uploads/lampiran/1748851121_SK 026-2025 Lamp 3_Laporan Perbedaan  Kualitas Aset Produktif.doc', '2025-06-02 14:58:41'),
(38, 64, '1748851121_SK_026-2025_Lamp_2_Penilaian_Kualitas_Aset_Bank_Umum_Penetapan_Kualitas_Kredit.docx', 'uploads/lampiran/1748851121_SK 026-2025 Lamp 2_Penilaian Kualitas Aset Bank Umum_Penetapan Kualitas Kredit.docx', '2025-06-02 14:58:41'),
(39, 64, '1748851121_SK_026-2025_Lamp_1_IM_Restrukturisasi_Kredit_Acc-Debitur_NPL.doc', 'uploads/lampiran/1748851121_SK 026-2025 Lamp 1_IM Restrukturisasi Kredit [Acc-Debitur NPL].doc', '2025-06-02 14:58:41'),
(40, 65, '1752144404_Escalation_Matrix_Ver_1_0.pdf', 'uploads/lampiran/1752144404_Escalation Matrix Ver 1.0.pdf', '2025-07-10 17:46:44'),
(41, 66, '1752145633_Surat_Pengantar_Laporan_Evaluasi_Penyelenggara_Produk_Aktivitas_Layanan_Digital_QRIS_MPM.pdf', 'uploads/lampiran/1752145633_Surat Pengantar Laporan Evaluasi Penyelenggara Produk & Aktivitas Layanan Digital QRIS MPM.pdf', '2025-07-10 18:07:13'),
(42, 67, '1752146076_ALCO_11_Juni_2025.pdf', 'uploads/lampiran/1752146076_ALCO 11 Juni 2025.pdf', '2025-07-10 18:14:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_internal`
--

CREATE TABLE `tbl_internal` (
  `id_file` int(11) NOT NULL,
  `url_file` varchar(250) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` enum('SK Direksi','SE Direksi','Memo Intern','Laporan','Lampiran','Informasi') NOT NULL,
  `tahun` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `tbl_internal`
--

INSERT INTO `tbl_internal` (`id_file`, `url_file`, `nama_file`, `id_kategori`, `status`, `tahun`, `created_at`, `update_at`) VALUES
(35, 'http://10.10.11.12/SopOnline/uploads/KEBIJAKAN_DAN_PROSEDUR9.pdf', 'KEBIJAKAN DAN PROSEDUR', 5, 'SK Direksi', 2025, '2025-06-02 18:34:00', '0000-00-00 00:00:00'),
(36, 'http://10.10.11.12/SopOnline/uploads/KEBIJAKAN_DAN_PROSEDUR10.pdf', 'KEBIJAKAN DAN PROSEDUR', 5, 'SK Direksi', 2025, '2025-06-18 13:38:00', '0000-00-00 00:00:00'),
(37, 'http://10.10.11.12/SopOnline/uploads/Yamin_ganteng.pdf', 'Yamin ganteng', 1, 'Memo Intern', 2023, '2025-07-11 13:55:00', '0000-00-00 00:00:00'),
(38, 'http://10.10.11.12/SopOnline/uploads/ABCDE7.pdf', 'ABCDE', 2, 'Memo Intern', 2024, '2025-07-14 09:13:00', '0000-00-00 00:00:00'),
(39, 'http://10.10.11.12/SopOnline/uploads/sedd1.pdf', 'sedd', 1, 'SE Direksi', 2025, '2025-07-14 09:18:00', '0000-00-00 00:00:00'),
(40, 'http://10.10.11.12/SopOnline/uploads/SE_001-2020_Penegasan_PPO_Operasi_Kas_Teller_(Override_Otorisasi).pdf', 'SE 001-2020 Penegasan PPO Operasi Kas & Teller (Override & Otorisasi)', 2, 'Memo Intern', 2025, '2025-07-14 16:39:00', '0000-00-00 00:00:00'),
(41, 'http://10.10.11.12/SopOnline/uploads/SE_001-2020_Penegasan_PPO_Operasi_Kas_Teller_(Override_Otorisasi)2.pdf', 'SE_001-2020_Penegasan_PPO_Operasi_Kas_Teller_(Override_Otorisasi)2.pdf', 2, 'SE Direksi', 2024, '2025-07-14 16:50:00', '0000-00-00 00:00:00'),
(42, 'http://10.10.11.12/SopOnline/uploads/ABCDE8.pdf', 'ABCDE', 2, 'SE Direksi', 2025, '2025-07-14 17:08:00', '0000-00-00 00:00:00'),
(43, 'http://10.10.11.12/SopOnline/uploads/adadadadadada.pdf', 'adadadadadada', 2, 'SK Direksi', 2025, '2025-07-14 17:10:00', '0000-00-00 00:00:00'),
(44, 'http://10.10.11.12/SopOnline/uploads/ABCDE9.pdf', 'ABCDE', 4, 'SK Direksi', 2025, '2025-07-18 13:04:00', '0000-00-00 00:00:00'),
(45, 'http://10.10.11.12/SopOnline/uploads/sk_004-2024_tentang_sop_safe_deposit_box_sdb_subbab_pembongkaran_sdb.pdf', 'SK 004-2024 Tentang SOP Safe Deposit BOX (SDB) SUB.BAB. Pembongkaran SDB', 2, 'SK Direksi', 2024, '2025-07-25 09:42:00', '0000-00-00 00:00:00'),
(46, 'http://10.10.11.12/SopOnline/uploads/se_044-_2024_petunjuk_juknis_core_banking_system_cbs_temenos_versi_02.pdf', 'SE 044- 2024 Petunjuk Juknis Core Banking System (CBS) Temenos Versi 02', 5, 'SE Direksi', 2024, '2025-07-25 16:05:00', '0000-00-00 00:00:00'),
(47, 'http://10.10.11.12/SopOnline/uploads/sk_001-2023_buku_saku_emergency_response_plan_erplan.pdf', 'SK 001-2023 Buku Saku Emergency Response Plan (ER.Plan)', 1, 'SK Direksi', 2025, '2025-07-28 14:52:00', '0000-00-00 00:00:00'),
(48, 'http://10.10.11.12/SopOnline/uploads/adddddddddddddddddddddddddd.pdf', 'adddddddddddddddddddddddddd', 1, 'SE Direksi', 2025, '2025-08-19 15:23:00', '0000-00-00 00:00:00'),
(49, 'http://10.10.11.12/SopOnline/uploads/afafafafafaf.pdf', 'afafafafafaf', 1, 'SK Direksi', 2025, '2025-08-19 15:25:00', '0000-00-00 00:00:00'),
(50, 'http://10.10.11.12/SopOnline/uploads/afafafafafaf1.pdf', 'afafafafafaf', 1, 'SK Direksi', 2025, '2025-08-19 15:25:00', '0000-00-00 00:00:00'),
(51, 'http://10.10.11.12/SopOnline/uploads/abcde11.pdf', 'ABCDE', 1, 'SK Direksi', 2025, '2025-08-19 15:25:00', '0000-00-00 00:00:00'),
(52, 'http://10.10.11.12/SopOnline/uploads/dafafaf1.pdf', 'dafafaf', 1, 'SK Direksi', 2025, '2025-08-19 15:28:00', '0000-00-00 00:00:00'),
(53, 'http://10.10.11.12/SopOnline/uploads/dadaafafaf.pdf', 'dadaafafaf', 1, 'SK Direksi', 2025, '2025-08-19 15:36:00', '0000-00-00 00:00:00'),
(54, 'http://10.10.11.12/SopOnline/uploads/dadaafafaf1.pdf', 'dadaafafaf', 1, 'SK Direksi', 2025, '2025-08-19 15:36:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_internal_lampiran`
--

CREATE TABLE `tbl_internal_lampiran` (
  `id_lampiran_in` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_internal_lampiran`
--

INSERT INTO `tbl_internal_lampiran` (`id_lampiran_in`, `id_file`, `nama_file`, `file_url`, `created_at`) VALUES
(30, 34, '1748863767_Lampiran.zip', 'uploads/lampiran/1748863767_Lampiran.zip', '2025-06-02 18:29:27'),
(31, 34, '1748863767_SK_026-2025_Lamp_2_Penilaian_Kualitas_Aset_Bank_Umum_Penetapan_Kualitas_Kredit.docx', 'uploads/lampiran/1748863767_SK 026-2025 Lamp 2_Penilaian Kualitas Aset Bank Umum_Penetapan Kualitas Kredit.docx', '2025-06-02 18:29:27'),
(32, 35, '1748864083_Lampiran.zip', 'uploads/lampiran/1748864083_Lampiran.zip', '2025-06-02 18:34:43'),
(33, 35, '1748864083_SK_026-2025_Lamp_3_Laporan_Perbedaan_Kualitas_Aset_Produktif.doc', 'uploads/lampiran/1748864083_SK 026-2025 Lamp 3_Laporan Perbedaan  Kualitas Aset Produktif.doc', '2025-06-02 18:34:43'),
(34, 35, '1748864083_SK_026-2025_Lamp_2_Penilaian_Kualitas_Aset_Bank_Umum_Penetapan_Kualitas_Kredit.docx', 'uploads/lampiran/1748864083_SK 026-2025 Lamp 2_Penilaian Kualitas Aset Bank Umum_Penetapan Kualitas Kredit.docx', '2025-06-02 18:34:43'),
(35, 35, '1748864083_SK_026-2025_Lamp_1_IM_Restrukturisasi_Kredit_Acc-Debitur_NPL.doc', 'uploads/lampiran/1748864083_SK 026-2025 Lamp 1_IM Restrukturisasi Kredit [Acc-Debitur NPL].doc', '2025-06-02 18:34:43'),
(36, 36, '1750228734_SK_026-2025_Lamp_1_IM_Restrukturisasi_Kredit_Acc-Debitur_NPL.doc', 'uploads/lampiran/1750228734_SK 026-2025 Lamp 1_IM Restrukturisasi Kredit [Acc-Debitur NPL].doc', '2025-06-18 13:38:54'),
(37, 36, '1750228734_SK_026-2025_Lamp_2_Penilaian_Kualitas_Aset_Bank_Umum_Penetapan_Kualitas_Kredit.docx', 'uploads/lampiran/1750228734_SK 026-2025 Lamp 2_Penilaian Kualitas Aset Bank Umum_Penetapan Kualitas Kredit.docx', '2025-06-18 13:38:54'),
(38, 36, '1750228734_SK_026-2025_Lamp_3_Laporan_Perbedaan_Kualitas_Aset_Produktif.doc', 'uploads/lampiran/1750228734_SK 026-2025 Lamp 3_Laporan Perbedaan  Kualitas Aset Produktif.doc', '2025-06-18 13:38:54'),
(39, 36, '1750228734_SK_026-2025_Lamp_4_IM_Pelimpahan-Penyerahan_Acc-Debitur.zip', 'uploads/lampiran/1750228734_SK 026-2025 Lamp 4_IM Pelimpahan-Penyerahan  Acc-Debitur.zip', '2025-06-18 13:38:54'),
(40, 37, '1752216939_Escalation_Matrix_Ver_1_0.pdf', 'uploads/lampiran/1752216939_Escalation Matrix Ver 1.0.pdf', '2025-07-11 13:55:39'),
(41, 46, '1753434339_P_OPRS-03_Prosedur_Deposito_Versi_02.pdf', 'uploads/lampiran/1753434339_P.OPRS-03 Prosedur Deposito Versi 02.pdf', '2025-07-25 16:05:39'),
(42, 46, '1753434339_P_OPRS-02_Prosedur_Current_Account_Saving_(CASA)_Versi_02.pdf', 'uploads/lampiran/1753434339_P.OPRS-02 Prosedur Current Account Saving (CASA) Versi 02.pdf', '2025-07-25 16:05:39'),
(43, 46, '1753434339_P_OPRS-01_Prosedur_Customer_Service_Versi_02.pdf', 'uploads/lampiran/1753434339_P.OPRS-01 Prosedur Customer Service Versi 02.pdf', '2025-07-25 16:05:39'),
(44, 46, '1753434339_Lampiran_SE_044-2024_Petunjuk_Teknis_Core_Banking.zip', 'uploads/lampiran/1753434339_Lampiran SE 044-2024 Petunjuk Teknis Core Banking.zip', '2025-07-25 16:05:39'),
(45, 48, '1755591825_SBDK_Jun_2025_Web.pdf', 'uploads/lampiran/1755591825_SBDK Jun 2025 Web.pdf', '2025-08-19 15:23:45'),
(46, 49, '1755591931_SK_004-2024_Tentang_SOP_Safe_Deposit_BOX_(SDB)_SUB_BAB__Pembongkaran_SDB.pdf', 'uploads/lampiran/1755591931_SK 004-2024 Tentang SOP Safe Deposit BOX (SDB) SUB.BAB. Pembongkaran SDB.pdf', '2025-08-19 15:25:31'),
(47, 50, '1755591936_SK_004-2024_Tentang_SOP_Safe_Deposit_BOX_(SDB)_SUB_BAB__Pembongkaran_SDB.pdf', 'uploads/lampiran/1755591936_SK 004-2024 Tentang SOP Safe Deposit BOX (SDB) SUB.BAB. Pembongkaran SDB.pdf', '2025-08-19 15:25:36'),
(48, 51, '1755591965_SBDK_Jun_2025_Web_Eng.pdf', 'uploads/lampiran/1755591965_SBDK Jun 2025 Web Eng.pdf', '2025-08-19 15:26:05'),
(49, 52, '1755592134_Mobile_Banking_3_0_Online_On_Boarding_v_1_0.pdf', 'uploads/lampiran/1755592134_Mobile Banking 3.0 Online On Boarding v.1.0.pdf', '2025-08-19 15:28:54'),
(50, 53, '1755592633_Surat_Pengantar_Laporan_Evaluasi_Penyelenggara_Produk_Aktivitas_Layanan_Digital_QRIS_MPM_new.pdf', 'uploads/lampiran/1755592633_Surat Pengantar Laporan Evaluasi Penyelenggara Produk & Aktivitas Layanan Digital QRIS MPM new.pdf', '2025-08-19 15:37:13'),
(51, 54, '1755592644_Surat_Pengantar_Laporan_Evaluasi_Penyelenggara_Produk_Aktivitas_Layanan_Digital_QRIS_MPM_new.pdf', 'uploads/lampiran/1755592644_Surat Pengantar Laporan Evaluasi Penyelenggara Produk & Aktivitas Layanan Digital QRIS MPM new.pdf', '2025-08-19 15:37:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `urutan` bigint(11) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y',
  `parent` enum('Y') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `link`, `icon`, `urutan`, `is_active`, `parent`) VALUES
(1, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt', 1, 'Y', 'Y'),
(2, 'System', '#', 'fas fa-cogs', 9, 'Y', 'Y'),
(55, 'BOII-REGULASI', 'compliance', 'fas fa-folder', 2, 'Y', 'Y'),
(58, 'Kategori Regulasi', 'kategori', 'fas fa-list', 8, 'Y', 'Y'),
(65, 'BOII-HCS', 'Hcs', 'fas fa-folder', 3, 'Y', 'Y'),
(68, 'BOII-REGULASI-FILE', 'viewer', 'fas fa-folder', 5, 'Y', 'Y'),
(69, 'Log User', 'Log', 'fas fa-folder', 8, 'Y', 'Y'),
(71, 'HCS-FILE', 'viewer_hc', 'fas fa-folder', 6, 'Y', 'Y'),
(74, 'Kategori Internal', 'Kategori_internal', 'fas fa-list', 8, 'Y', 'Y'),
(75, 'BOII-INTERNAL', 'Internal', 'fas fa-folder', 3, 'Y', 'Y'),
(76, 'BOII-INTERNAL-FILE', 'internalviewer', 'fas fa-folder', 6, 'Y', 'Y'),
(77, 'Change Password', 'change', 'fas fa-lock', 10, 'Y', 'Y'),
(78, 'BOII-REVOKED', 'Revoked', 'fas fa-folder', 4, 'Y', 'Y'),
(79, 'Kategori Revoked', 'KategoriRevoked', 'fas fa-list', 8, 'Y', 'Y'),
(80, 'BOII-REVOKED-FILE', 'RevokedViewer', 'fas fa-folder', 7, 'Y', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_revoked`
--

CREATE TABLE `tbl_revoked` (
  `id_file` int(11) NOT NULL,
  `url_file` varchar(250) NOT NULL,
  `nama_file` varchar(250) NOT NULL,
  `id_kateg` int(11) NOT NULL,
  `status` enum('dicabut','cabut') NOT NULL,
  `tahun` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_revoked`
--

INSERT INTO `tbl_revoked` (`id_file`, `url_file`, `nama_file`, `id_kateg`, `status`, `tahun`, `created_at`, `update_at`) VALUES
(3, 'http://10.10.11.12/SopOnline/uploads/ABCDE5.pdf', 'eeeeeeeeeeeeeeeeeeeee', 4, 'dicabut', 2025, '2025-05-08 16:02:00', '0000-00-00 00:00:00'),
(5, 'http://10.10.11.12/SopOnline/uploads/rrrrrrrr.pdf', 'rrrrrrrr', 4, 'dicabut', 2025, '2025-05-21 14:27:00', '0000-00-00 00:00:00'),
(6, 'http://10.10.11.12/SopOnline/uploads/SE_044-_2024_Petunjuk_Juknis_Core_Banking_System_(CBS)_Temenos_Versi_02.pdf', 'SE 044- 2024 Petunjuk Juknis Core Banking System (CBS) Temenos Versi 02', 4, 'dicabut', 2025, '2025-07-28 13:55:00', '0000-00-00 00:00:00'),
(7, 'http://10.10.11.12/SopOnline/uploads/sk_001-2023_buku_saku_emergency_response_plan_erplan1.pdf', 'SK 001-2023 Buku Saku Emergency Response Plan (ER.Plan)', 4, 'dicabut', 2025, '2025-07-21 15:03:00', '0000-00-00 00:00:00'),
(8, 'http://10.10.11.12/SopOnline/uploads/sk_027-2021_kebijakan_dan_prosedur_manajemen_risiko_2.pdf', 'SK 027-2021 Kebijakan dan Prosedur Manajemen Risiko (2)', 4, 'dicabut', 2025, '2025-07-31 09:52:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_revoked_lampiran`
--

CREATE TABLE `tbl_revoked_lampiran` (
  `id_lampiran_rev` int(11) NOT NULL,
  `id_file` int(11) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_revoked_lampiran`
--

INSERT INTO `tbl_revoked_lampiran` (`id_lampiran_rev`, `id_file`, `nama_file`, `file_url`, `created_at`) VALUES
(1, 3, '1746694935_Syarat_dan_Ketentuan_QRIS_MPM.pdf', 'uploads/lampiran/1746694935_Syarat dan Ketentuan QRIS MPM.pdf', '2025-05-08 16:02:15'),
(2, 4, '1747731494_Formulir_Pengaduan_Keluhan_Nasabah_14102024_-_Copy.pdf', 'uploads/lampiran/1747731494_Formulir Pengaduan Keluhan Nasabah 14102024 - Copy.pdf', '2025-05-20 15:58:14'),
(3, 4, '1747731494_Formulir_Pengaduan_Keluhan_Nasabah_14102024.pdf', 'uploads/lampiran/1747731494_Formulir Pengaduan Keluhan Nasabah 14102024.pdf', '2025-05-20 15:58:14'),
(4, 4, '1747731494_2025-03-18T10_32_27_755426.pdf', 'uploads/lampiran/1747731494_2025-03-18T10_32_27.755426.pdf', '2025-05-20 15:58:14'),
(5, 5, '1747812472_1747725554_PIN_(1).zip', 'uploads/lampiran/1747812472_1747725554_PIN (1).zip', '2025-05-21 14:27:52'),
(6, 6, '1753685734_P_OPRS-03_Prosedur_Deposito_Versi_02.pdf', 'uploads/lampiran/1753685734_P.OPRS-03 Prosedur Deposito Versi 02.pdf', '2025-07-28 13:55:34'),
(7, 6, '1753685734_P_OPRS-02_Prosedur_Current_Account_Saving_(CASA)_Versi_02.pdf', 'uploads/lampiran/1753685734_P.OPRS-02 Prosedur Current Account Saving (CASA) Versi 02.pdf', '2025-07-28 13:55:34'),
(8, 6, '1753685734_P_OPRS-01_Prosedur_Customer_Service_Versi_02.pdf', 'uploads/lampiran/1753685734_P.OPRS-01 Prosedur Customer Service Versi 02.pdf', '2025-07-28 13:55:34'),
(9, 6, '1753685734_Lampiran_SE_044-2024_Petunjuk_Teknis_Core_Banking.zip', 'uploads/lampiran/1753685734_Lampiran SE 044-2024 Petunjuk Teknis Core Banking.zip', '2025-07-28 13:55:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_submenu`
--

CREATE TABLE `tbl_submenu` (
  `id_submenu` int(11) UNSIGNED NOT NULL,
  `nama_submenu` varchar(50) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_submenu`
--

INSERT INTO `tbl_submenu` (`id_submenu`, `nama_submenu`, `link`, `icon`, `id_menu`, `is_active`) VALUES
(1, 'Menu', 'menu', 'far fa-circle', 2, 'Y'),
(2, 'SubMenu', 'submenu', 'far fa-circle', 2, 'Y'),
(7, 'Aplikasi', 'aplikasi', 'far fa-circle', 2, 'Y'),
(8, 'User', 'user', 'far fa-circle', 2, 'Y'),
(10, 'User Level', 'userlevel', 'far fa-circle', 2, 'Y'),
(15, 'Barang', 'barang', 'far fa-circle', 32, 'Y'),
(17, 'Kategori', 'kategori', 'far fa-circle', 32, 'Y'),
(18, 'Satuan', 'satuan', 'far fa-circle', 32, 'Y'),
(19, 'Pembelian', 'pembelian', 'far fa-circle', 41, 'Y'),
(20, 'Penjualan', 'penjualan', 'far fa-circle', 41, 'Y'),
(23, 'Data Sisdur', 'sisdur', 'fas fa-file', 52, 'Y'),
(24, 'Data HC', 'hc', 'fas fa-file', 53, 'Y'),
(25, 'Data APU PPT', 'Apuppt', 'fas fa-book', 54, 'Y'),
(27, 'Data Otoritas', '#', 'fas fa-book', 57, 'Y'),
(28, 'Data E-learning', '#', 'fas fa-book', 56, 'Y'),
(34, 'Submenu1', 'Submenu1', 'far fa-circle', 55, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_level` int(11) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `is_active` enum('Y','N') DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `full_name`, `password`, `id_level`, `image`, `is_active`) VALUES
(32, 'viewer', 'viewer kan', '$2y$05$l1Hfd7ydBt60ZeNKBBga3uv65Qhs0RXGRU/3cG5sBRCBJUft62HSe', 9, 'viewer_1755587662.png', 'Y'),
(33, 'down', 'down', '$2y$05$2.zgQfNNHAqdYDSxZM5qBe/jaOVFDgasgXZ6j0LOdHMslvkXnKvhO', 10, 'down1.png', 'Y'),
(34, '@SuperAdmin', 'MOH YAMIN', '$2y$05$uRzk.kPwkw3NzIxVgI6uieiN5.xFvY2AXSjGpSpyOl0hCO5KhVFVm', 12, 'superadmin.png', 'Y'),
(55, '', '', '$2y$05$7NBluiHP/l3Tp/mhhe.9nu8VqTpG3bCYragIEihk4wZ2aheHIqxtm', 0, NULL, ''),
(56, 'risk', '', '$2y$05$z8Xl8d5AagTzU/vtqsYQ2urnP1KbtVZU6bJh3cY4ac61Y2WpzVC/y', 0, NULL, ''),
(57, 'ee2', '', '$2y$05$uIMNKIPVj8TKn7rNVC4qUu6IPQJZxIPencsCnBJf6ueChEzr4KuhW', 0, 'ee2.jpg', 'Y'),
(65, 'RMC', 'RMC', '$2y$05$RFlo4BkOVqXGVj5L6evxEOSqx/S4imPc.Hy5e1SBjzFW.fa1gDEsu', 1, 'rmc1.jpg', 'Y'),
(66, '', '', '$2y$05$S9SI6l7oYx6TkfxaY2IsheItkBt/hnhbJRbf479AnOboJ5Mgz.nCi', 0, NULL, ''),
(67, 'dada', '', '$2y$05$DWBJGTNYjhqbZd8caOs5/.mwwq4sYR1anY20V/8va0KFSAiJvRF0.', 0, NULL, ''),
(70, 'RMCHead', 'Arifin Siswidodo', '$2y$05$2vUTgcnjjFe67o9zxOhcNOWIcMUnCU31x2w0Mn6tTZ1QwUX.9b6oS', 12, NULL, 'Y'),
(71, 'Admin', 'admin', '$2y$05$/KEubZoorDe5WMHgtOQL7Ooqz.DFMkvPzwrx7QUzgHxUGCFaQSfca', 1, NULL, 'Y'),
(72, 'BOII989', 'RINI ANTIKA', '$2y$05$2bqu6Cf/MWUMGknyLssm/eDSeIY1JYSnlmJUSLRsn2buhMtUXDAoK', 1, NULL, 'Y'),
(73, 'BOII968', 'RICKO LASE', '$2y$05$6vJdU.jXzH7vDwGYvYvG9egNEl8tcb.aXMj7tm3aWlVctuSCHwGYq', 1, 'boii9681.jpeg', 'Y'),
(74, 'BOII814', 'SHINDU', '$2y$05$aypIak2R5Ys1lA6p1yRCwuxRBxufMZRl46ddjd59AvS1ZpX8.IKGC', 1, NULL, 'Y'),
(75, 'BOII974', 'ARIFIN SISWIDODO', '$2y$05$IfZyUZaDF.otJlLTRrjDW.It9DyJyAksWAOFFMLxpcZPaYVJN79fW', 12, NULL, 'Y'),
(76, 'BOII950', 'JAYAPRAKASH BHARATHAN', '$2y$05$1mnSa.cbqHjWZ617yYm9COhwdpLppQKmaNpRJBgKObQn7HfS.k6BS', 10, NULL, 'Y'),
(77, 'BOII962', 'DENNIS KUSUMA HALIM ', '$2y$05$UXJZeGw7pLQv76quqs/LBO4IbA84SkARnijbmqnx1dXCInaw10gni', 10, NULL, 'Y'),
(78, 'BOII961', 'CAROLINA DINA RUSDIANA', '$2y$05$VDDeC2Gp/YWnvgVowoA1wOUs.AjmW3fc8NaAU5POYww/8w9E/pLLq', 10, NULL, 'Y'),
(79, 'BOII980', 'CHANDRA SEKHAR MUKHERJEE', '$2y$05$BDsZlTIGL7Jq4ZOMNRQRNeqQ1HiHfmS4vQvPOs.30EKPFf.bOB2za', 10, NULL, 'Y'),
(80, 'BOII863', 'ROBBY CHAIYADI', '$2y$05$jO7TODDjl1vBqDIAx/zcnODy5ckmC/uAnpDznywLIlF14.XPOrbsu', 10, NULL, 'Y'),
(81, 'BOII889', 'ERMA RUMADJA', '$2y$05$BP4sZ7fSZJ5GbEyFT6oL3uQxXmY38UWd9U1kElNYjwUk/H8xs5ZFS', 10, NULL, 'Y'),
(82, 'BOII985', 'ANURAG SINGH ', '$2y$05$DUxy2jMPwJBpehJrFWdyXOO555mIS41akIbs5WqQlypXC27nGWsIW', 10, NULL, 'Y'),
(83, 'BOII145', 'SUHANA', '$2y$05$ZiF0.mwDUe0CgqUXI65fw../4Gde7927kUQ57OjAbAVuv6MU/TSJ.', 10, NULL, 'Y'),
(84, 'BOII984', 'AJAY KAPOOR ', '$2y$05$xrBsq8NCdb83CtZLlcaJLuLS/VgPvwZrvtVweqdjmCUbFKZ3BUmUm', 10, NULL, 'Y'),
(85, 'BOII016', 'ARIEF BUDI WINARTO ', '$2y$05$2HTPzyObDgSTe6Zjmjb9OuZpVe9gJ.X4x7r0iBZYbb/b1t3MX2z9G', 10, NULL, 'Y'),
(86, 'BOII841', 'MUHAMMAD CHOTIB', '$2y$05$f/KY7RNIM5uX67CE0IfYaekMZcLO65v8rgoIPLF2KU1fcocAyK3OK', 10, NULL, 'Y'),
(87, 'BOII088', 'HARY SURYAWAN DWIPUTRA', '$2y$05$XXdHSyx8Ecy6drxRNvZ2fu5uANkYHBnOy65tgqc/yyIpZ02Qm8igO', 10, NULL, 'Y'),
(88, 'BOII789', 'SITI YANTI ENRIANA GULTOM,SE', '$2y$05$cJ4OmzhTG/cMO2TMNMVZa.PcO96lrzS2mysd3YuDusLmwFx2qQFwW', 10, NULL, 'Y'),
(89, 'BOII790', 'ADHI PRADHANA', '$2y$05$QeeJ31Ucg63cA3.yw6k9surFoU8VISXZQKRAYY5H.1BtR2W4RAAG.', 10, NULL, 'Y'),
(90, 'BOII835', 'IBRAHIM IMAN UTOMO', '$2y$05$MY.exrIPLFxaltf/7d2YBe06HL3pMFbV6/ae2/CZazJB70PtBuxNW', 10, NULL, 'Y'),
(91, 'BOII981', 'PUTU PUSPITHA SARASWATI ', '$2y$05$fMDZf5Cr10mZ9D6ysUhp8ec6QWiaBV4CmI3KgWIRUiQYl1q6s0i3a', 10, NULL, 'Y'),
(92, 'BOII002', 'MALTHIKA THILLWARI', '$2y$05$JJPBf74oSvARD2mIggr/w.V.epOAif3cj6r1yAp9qZXBphQgxuF3C', 10, NULL, 'Y'),
(93, 'BOII833', 'SUSENO SUBEKTI', '$2y$05$ut6xuWqnOfWis6sBHCHUOuqn5kPzdY61HFwqviAtFVIBNmbFlYfLG', 10, NULL, 'Y'),
(94, 'BOII870', 'VONNY CHANDRA', '$2y$05$mEq8zQZZUAJYD6/FPs93yuB1.G2xo0VAaDiEj7ZW1iwyjRxxNb7Oa', 10, NULL, 'Y'),
(95, 'BOII844', 'JAYANTI PURNAMASAR', '$2y$05$d/ecKp7H5cYgLLlHIlJGge4n1eq9XGoRguilUG9qiy26g1wbQGXzS', 10, NULL, 'Y'),
(96, 'BOII012', 'TJONG INDRIHARTINI', '$2y$05$UZVFLZYZtdGidYQ8ldJqgubQTBnYVhWxqXaSGohemvDU4niK.uXPe', 10, NULL, 'Y'),
(97, 'BOII582', 'MARTHANIA PRATIWI ', '$2y$05$KQM/qH26h8lA3r9l3oPdzux/vmcq1fK/qpUuvhFBV86YYCW/fP7kq', 10, NULL, 'Y'),
(98, 'BOII219', 'R. AGUSTINUS SRIE HENKY HP, SH.', '$2y$05$M8yCYq1UVJhICNYEOrW.oOzqmIFDXTL8yw0LF0RS1U6p4SRJMuLeC', 10, NULL, 'Y'),
(99, 'BOII979', 'PUTU DIYAH AYU PITALOKA', '$2y$05$F9B4NKy2ydUUDCFcZOA7F.ZPmsby0UN5UTN3ZpF/c3.zmIAV3c7m2', 10, NULL, 'Y'),
(100, 'BOII557', 'INDARMAWAN', '$2y$05$/HGY6xjHWiLPohdoJyPIxOlhKkvAV0SzHiANx2pHsgYFEijvMJWPW', 10, NULL, 'Y'),
(101, 'BOII007', 'RICHARD PIETER', '$2y$05$gHGZjwZvMrmuLVKTJyqij.b84Sa8u9pp9kYW6nWWSx91tz2.UTHN6', 10, NULL, 'Y'),
(102, 'BOII855', 'RAHMAT IRFAN ARFI', '$2y$05$XnweZpWPKNGkJ2qlx/JBe.p6Nu4hC4qWz1/bKhqTdbYfbAGEAz3xW', 10, NULL, 'Y'),
(103, 'BOII739', 'PRITY INDRIATY', '$2y$05$rIGabicgmWRXT7McbZLbzuCENFlDdg.gj52qYT7.d8eXDjMGd41cK', 10, NULL, 'Y'),
(104, 'BOII276', 'RURI FEBRIANI', '$2y$05$ucK.eUA7ca1LZTuXYfxvGu0jqRa3.nc.KsCbs2KRa1BboU4WvhQye', 10, NULL, 'Y'),
(105, 'BOII904', 'SARY REZEKY KURNIAWIJAYATY', '$2y$05$80CGxoIhUBAT6N5yy3GbkOVhHgi3qbsvvfXk4DgpW2EHwfGAs9IKi', 10, NULL, 'Y'),
(106, 'BOII568', 'YOGA VINDRA', '$2y$05$7KWEOxmVJ57vtTXlpqTxeOxAldU8Q6ze9cWRsQcqdPBs7Jkt4WmhS', 10, NULL, 'Y'),
(107, 'BOII523', 'MAWARDI', '$2y$05$QKBMqAv0gWKKbDTQQMuWBONJsiSmwZK26gN01Ixq5FCHaO1q0ipjm', 10, NULL, 'Y'),
(108, 'BOII972', 'SANTOSO PRIBADI ', '$2y$05$6V0T/ykyCzHWOY3dwPLt7eDRIkubkSbJYwFbamdLtbQDbZPL6yxe.', 10, NULL, 'Y'),
(109, 'BOII633', 'ACHMAD KOMARUSIAM', '$2y$05$.ETEx8HkDbWOMq5X93E8jeHRi0E.dNmuGLBZdPiYf78OIUO6Ag0li', 10, NULL, 'Y'),
(110, 'BOII001', 'ANDRIAN WAHYU FINDARTO', '$2y$05$8y2CsY1t/VF.l.rRkPZEpOxo.dPeakFLDT8/m31GEF4de2F/v3oUa', 10, NULL, 'Y'),
(111, 'BOII988', 'YOSI ARFANDI ', '$2y$05$PqWwpmE.334Q81IhV9So3.gAfQHM5qcL5YAbD1wINZ28afUUSuvqS', 10, NULL, 'Y'),
(112, 'BOII576', 'ADE DEVI BUTAR BUTAR', '$2y$05$Ze/KeRJG5Pc/SgbQKbG9Q.QosTZ23r/S8g4OkAwHI/uDII86m.Evq', 10, NULL, 'Y'),
(113, 'BOII445', 'HESTI KOMAH', '$2y$05$NQou7q4MH.xLgG712dzQQ.QRDZEikmmBKSKDo/AmNR2aDqJzaWNjy', 10, NULL, 'Y'),
(114, 'BOII969', 'ANDRI DWI NURYANTO ', '$2y$05$.OkIQ0t0tYtWVHUEKLrGZu/v7P8/SHOcjThRs/DzAe9HWdcGqY4G2', 10, NULL, 'Y'),
(115, 'BOII881', 'IRWAN RUZALI', '$2y$05$uP6dn4FJWsYZaeWXrVvQHOzERperFL.tQd3k00gLvEqRUKhmVDI7m', 10, NULL, 'Y'),
(116, 'BOII065', 'EKA SURYA CHANDRA', '$2y$05$1RX7ubDmkF9CbvXutT.Ae.GKwAzapdBQrYq/Hi1NHfaXmKVj36.zS', 10, NULL, 'Y'),
(117, 'BOII826', 'IIN YUNINSHI HUTAPEA', '$2y$05$./WRTPh3w.8cYI8IFXwYb.42YYDPOPmum2uWoEvHhvim8DD65c3fW', 10, NULL, 'Y'),
(118, 'BOII350', 'KOSASIH', '$2y$05$NtyUm4Q/ROZ/1ggmn1d5se.Mnn7bFnf6WiemYJY0sZ49Ys3w26kS.', 10, NULL, 'Y'),
(119, 'BOII579', 'IRVAN MAULANA', '$2y$05$1Xc9e4deOGQK82oXnD7wzOF5iHi5zPV5OaA70Z3qp5y4CBJIxRGPa', 10, NULL, 'Y'),
(120, 'BOII973', 'FAKHRI MAULANA', '$2y$05$DP6V8Gjjd8R2gysKrhb/deI.2FU3wmkT7rFoO0rJOrk.hHgqPAUU6', 10, NULL, 'Y'),
(121, 'BOII970', 'TAUFIK AGUNG ISMAIL ', '$2y$05$eYWgtDggSZbzmOKxH7u3eOpK1aPlApjn/EXXBRi4MU5PSKspyRseK', 10, NULL, 'Y'),
(122, 'BOII061', 'RITA HASTUTI', '$2y$05$7iEBBabva/VLaAaQVik16./C6PHJK6Vh5FvL36SD.D/bXv9EL7Glq', 9, NULL, 'Y'),
(123, 'BOII458', 'EKA HERAWATI', '$2y$05$3JN.yHhyyGXvgcDopx/zgO6qjWZdHTIjmG5PGGxaaM.o2mXcDFCli', 10, NULL, 'Y'),
(124, 'BOII680', 'SHERLY APRISA', '$2y$05$8NlzBNZcsQYSy9Obr02iZOcEmdMROD5rLUWJXWTFRBI68u7megxc6', 9, NULL, 'Y'),
(125, 'BOII111', 'ERNI YUSNITA', '$2y$05$PAXnIFCJGMZ.fF5rtmLEceyi2LQ/uCRzpETKlC79SNPq.Bb32bfWS', 10, NULL, 'Y'),
(126, 'BOII151', 'ELDA ANWAR', '$2y$05$NWo9AV5WOeG9ONdB2fPbLeOllBf57IaevY0AB/UMmuYUDUsckfyiG', 10, NULL, 'Y'),
(127, 'BOII103', 'IDA RUTINI', '$2y$05$suycc9kMY4W5uJsToz/wcefGtzgWWzQ1kYwifFVC10fLW7jS9WOPC', 10, NULL, 'Y'),
(128, 'BOII774', 'ERY JUITA SITOMPUL', '$2y$05$yphbQ3wzS57stcDhp.cFv.XwA7aP6T4o3o2xQ9wMMdU1lea8yvV8O', 10, NULL, 'Y'),
(129, 'BOII125', 'NANUNG SUSANTO', '$2y$05$wWJXh9OHKK0vZMmhSD7IIOiAlGaIquBfIIdXf2NhEcSBpq71yqDcu', 10, NULL, 'Y'),
(130, 'BOII230', 'HARI SUBAGYO', '$2y$05$tkfQoCXfcqZxSxNC5QQakuJZ8bdggx11SyoEJEU9KD/OvsH4YesY2', 10, NULL, 'Y'),
(131, 'BOII474', 'DIANA MAWARTI', '$2y$05$IC26MUnk3gsrcLMocXtR2uaIEF4OJMtLVqUdQzJ2O0vFckzZlh5je', 10, NULL, 'Y'),
(132, 'BOII178', 'DJATMIKO', '$2y$05$8BnZFDr.k.vd6RGgxA6Fk.Itww.yuIWIg/UG8Dy96HPYjFtdMGUti', 10, NULL, 'Y'),
(133, 'BOII377', 'EKARY PRASETYANINGRUM', '$2y$05$SCv2NQYvyFVTVlzrealC3uQP4nzIJoexoPBOKWH6AW4S69p9miIou', 10, NULL, 'Y'),
(134, 'BOII302', 'AGUS SETIAWAN', '$2y$05$VjlZDOva.ynfQ82vws7mbehgPi.ChgaupEobQOE8Iv0qSbqMygT9u', 10, NULL, 'Y'),
(135, 'BOII333', 'MILIA SEPTININGTYAS', '$2y$05$6MEuc4BC5Yn3x5jaSXf06.2sqfVuGvQIEDjfEICr0spNjA0XTsn2O', 10, NULL, 'Y'),
(136, 'BOII303', 'WAHYU DWI SOFIANTI', '$2y$05$ca/5aeWTUleEvD/nRUFf6urvnDfSeVPSlvxW2KCaCMPXCd8LzuzPq', 10, NULL, 'Y'),
(137, 'BOII288', 'WIDI HAYATI', '$2y$05$pAvDwIlHSGOS9hkxaaGjbuTzYski/4PdM58FtlPFh9TWD2tOR9GM2', 10, NULL, 'Y'),
(138, 'BOII150', 'KRISTIN EDDY HARTONO', '$2y$05$1NMwakeneCnsf71RotiEBe8kVNLTLK67wTPvCioCyS4LSOJ5a6x4e', 10, NULL, 'Y'),
(139, 'BOII559', 'MIRAWATY', '$2y$05$lw1Tk7AS8KdXdNXVYhLgaOk9hx9Owf2hFaG6H6dyZSFZoPRYAI6pe', 10, NULL, 'Y'),
(140, 'BOII518', 'MARIA DEWI NOVIA W', '$2y$05$1mF79pY33mQX/bS4fQKblOGdp.3CUrPXvKPbKxOqAbw7KGioSZvr.', 10, NULL, 'Y'),
(141, 'BOII688', 'ANDI KARTIA MACHMUD', '$2y$05$EaPqnLy8Jej68rsC5hBMROithPQktHd6Wn.CyEXvyGh5X0M/PqM6G', 10, NULL, 'Y'),
(142, 'BOII799', 'ANGGA ADIWIGUNA', '$2y$05$pTmjaWokFa.3YInuPau4h.TnmzJayg5hYkRHAK3Lr5QUB5/j4JSli', 10, NULL, 'Y'),
(143, 'BOII957', 'LUSIANA', '$2y$05$FCetCBmz6v9fNcCtUL4F1.0M4dbemS3CmcVjyBIQzD3Bvb4U/V5/O', 9, NULL, 'Y'),
(144, 'BOII995', 'SILVIA DWI PUTRI', '$2y$05$.4/Is1pWS0Ne4WiNrduS7uRuyw3VXYCKTRVEzpeEagWQCAeVV3tja', 1, NULL, 'Y'),
(145, 'BOII516', 'NOULA WINDY RUMATE', '$2y$05$59DQwyhlmpjqR2LU5LiD6Oy7N7XveTwxshlGpvXM6.nW9fm1ym2aC', 9, NULL, 'Y'),
(146, 'BOII982', 'FEBRYANTI ANGGELINA MOSES', '$2y$05$Do7vEegNH3/OutT3cAGiT.wo8vwMCuWkb8ydew8FD5VLAF4hI/y.m', 9, NULL, 'Y'),
(147, 'BOII597', 'YULIANINGSIH', '$2y$05$W1hHrl5y6fYtG1G2T.I17.G/6UITvWVvpidmTdf6t5OyZHqle3OR6', 9, NULL, 'Y'),
(148, 'BOII986', 'SYIFA AULIA FAZRIN ', '$2y$05$zTj8LrUZDQlwM/XBzvJonu1iZTu9N51G6KuTKdPo7DLCFA6buq8eC', 9, NULL, 'Y'),
(149, 'BOII964', 'MUHAMAD ZAQI', '$2y$05$mUe3UaCfX3Ze8KBEzTSmFORnbuHnQsuNIU/jlp.oyPkq0Hu9fFn46', 9, NULL, 'Y'),
(150, 'BOII010', 'FAJAR NOPRIDATAMA', '$2y$05$o9NRVkT8kYyo6fEkhRnjoec/PenAkcXazFbvgngfJc5yh8nI/84BK', 9, NULL, 'Y'),
(151, 'BOII920', 'DITA ELSI DEVITASARI', '$2y$05$PgYPU16Sug9Ozb/8N9hM4eCEX3FqZTITxFMOeF9XB6BX2DW7F8Ste', 9, NULL, 'Y'),
(152, 'BOII275', 'YOSEFA YULI SETYORINI', '$2y$05$Fiq8joM2Bl3Ylc/aoqxZAezC8b7CXCenTkLGtxoDHSXwyTgQSRBUW', 9, NULL, 'Y'),
(153, 'BOII147', 'MOCHAMMAD SUPARDI', '$2y$05$K10EMyed1KX/I4vjhj0J..EgsrfytHZ0PFNSqZVeweXrGG00gk9vK', 9, NULL, 'Y'),
(154, 'BOII188', 'ELITA VIANA', '$2y$05$/EkB5yDD/FZ9t.MdBWHfkuniak6Uv4L0aahbO/ju/B7vIFOPoJZD6', 9, NULL, 'Y'),
(155, 'BOII211', 'MIERNA GALUH SUSANTI', '$2y$05$Tyd1Wh5LDI9zRPelQ05kX.NiwskMUSzvtWwA4RK.tSbm7sSqFCsUq', 9, NULL, 'Y'),
(156, 'BOII291', 'SRI ANDAYANI', '$2y$05$JgIaxSVhDwMQ5Fl2f3v0T./zucAHp0MS/kG6tW10sehsXRMRuPEe.', 9, NULL, 'Y'),
(157, 'BOII638', 'MAULANA HERU JATMIKO', '$2y$05$/GrdFPthkkMYPRu8jxAKw.cqSK8fbiizF2fELjvMWtyuG1CtDayY2', 9, NULL, 'Y'),
(158, 'BOII308', 'DYAH WULANDARI', '$2y$05$6HX/WSINca21ETxCcRLC8.PN2zHxS41c9reRTHBSBj6zNWFSOyK7a', 9, NULL, 'Y'),
(159, 'BOII265', 'SRI WAHYUNI', '$2y$05$1d6K.1S7oPgwimII76.gduhrndQKb/tWCVo.ZO2XB/JdW0EOULFFW', 9, NULL, 'Y'),
(160, 'BOII796', 'SHANTY DIAH PURNAMASARI', '$2y$05$M42OTEUYG50mEeTmheriCe6X6C82iS10qrcqST922myxwweLqahm6', 9, NULL, 'Y'),
(161, 'BOII228', 'TITI AMINAH', '$2y$05$BrQcptSs/nLbW68UcW6cD.owNazxk/QZcuUW.xS6D1g/qBnpdmZKG', 9, NULL, 'Y'),
(162, 'BOII290', 'EVAYANTI, SE', '$2y$05$8SwE0XXk2JTXQJMb/.fznukOx4KtNMZvvv6wH/FnLvjDnEcWrajl2', 9, NULL, 'Y'),
(163, 'BOII368', 'DEVI LASARANI', '$2y$05$FES/NGZUmSgap1wARlLSvOTG4c0MPlc4OoiS41691kHAECY3gz4uW', 9, NULL, 'Y'),
(164, 'BOII540', 'R  DIDIET HARY BUDIYANTO MA', '$2y$05$iCGYdJ2APkWyDHtUaBiV2uBLaGfnUBFtMkcTqSN23jwdM86iQryzO', 9, NULL, 'Y'),
(165, 'BOII632', 'DIAN IMAM PRASETIO', '$2y$05$uqWrm45/OvNXLlZEx1dJHunUyX89hjNhPIBeOdtYxIISAv2k86zu2', 9, NULL, 'Y'),
(166, 'BOII911', 'PHEBY TRI RUSWINOTO, SH', '$2y$05$.y3UPrU0WMnbxRD/GTlDsO6Y5BSZZp2WcWy45WjORNgvYx1vnC.1y', 9, NULL, 'Y'),
(167, 'BOII909', 'ANAK AGUNG ISTRI KUMALA DEWI', '$2y$05$zhQjSie/sYxbIsxxALiUau8NdRp18lT4iyZUShoC/hekQpwwNnnpu', 9, NULL, 'Y'),
(168, 'BOII749', 'KADEK KRISNA TIKA DWI PUTRA', '$2y$05$x8SSOB0rxsz9dtm5wMFWq.m8a4Fu2hyP.Ymfgf0YDC4QUq1nyIkmG', 9, NULL, 'Y'),
(169, 'BOII856', 'HAFIZA FALAH', '$2y$05$hMiecPVCKMPYjrnKPLcZiu4rw3lPfh8ult9gw8X.NEfxPsLNuxPnG', 9, NULL, 'Y'),
(170, 'BOII793', 'SILVIA JAYANTI', '$2y$05$ck/ZMWEJomRZIOy4XY4NEOicLUD2FxAc3hw4dO3dngyVlHc6kfm6S', 9, NULL, 'Y'),
(171, 'BOII770', 'DEWI ANGGRAINI SITOHANG', '$2y$05$GoZI8VelMJgSTy4pYYnGHeMJAqW.dKoVPcjtkvMHsr7b0VyRcGwmC', 9, NULL, 'Y'),
(172, 'BOII778', 'ANTONI', '$2y$05$VvD4pid2K/XibREN6IQyJurF1cA6HxDYWN.oMb5giGLgaCXBLp.Bi', 9, NULL, 'Y'),
(173, 'BOII696', 'APHRODITA DWI INDRIANI, SE', '$2y$05$Ry4EsKp.1a.y8qLKX6Dk5uKBVGckbGPzpZ2gmoe7Tu7zF/3aoM7bi', 9, NULL, 'Y'),
(174, 'BOII491', 'LINDA FABRIANI FAUZIA', '$2y$05$QEkER3CNTbE77Fflxl0NgOGxDE8nPu1ZOJBjhakx8KUWdSxgZHmk.', 9, NULL, 'Y'),
(175, 'BOII669', 'DWI ACHMAD FAUZI', '$2y$05$n.aMfn6tH1e2VyFsNv.wJ.6jlN30GRoPR9AsCQnkBTQ.BuZVhmgU.', 9, NULL, 'Y'),
(176, 'BOII655', 'TILAWATI SWISDINIA', '$2y$05$nvivw7GfLRlDjYUtlTJqn.abYASb0eiKXZTuRYZ3RQegGkKC5TZtS', 9, NULL, 'Y'),
(177, 'BOII216', 'TITIK SETYOWATI ', '$2y$05$K2mFsLotEqfn0Rq4Ma1y.eOphZpqX9SF7s5qBj.leiD9S9igHHrR2', 9, NULL, 'Y'),
(178, 'BOII380', 'INTANIADI MAHARANI', '$2y$05$/QhWu.oOI57redCv0UPOq.oaedCv5o2L49Wq/9sijCf7e93xcVK.C', 9, NULL, 'Y'),
(179, 'BOII952', 'REGINA NOVA TIANSYAH', '$2y$05$p54QyCz1XE/v2hsoNTdf7Oo17jel5A.AGOfdmrvkSW3/kaNWHENFq', 9, NULL, 'Y'),
(180, 'BOII014', 'JEREMY STEVEN HALIM ', '$2y$05$O.xKfLaVbE0aJf.Lo16GJOqSVTlqE4s8LpJunrkICCJqQYFFD0KDq', 9, NULL, 'Y'),
(181, 'BOII975', 'JUNEVA SETIYOLARAS', '$2y$05$3HXLnPo/8hnLeDOVmIjSN.wxzDHkLYz1XV4pZGl.afKdQxhiFiwzK', 9, NULL, 'Y'),
(182, 'BOII998', 'ALIFA\' ACHMAD MAULANA', '$2y$05$QVt9fb9O3VNtLMKhM1jz9.01Z2lYriiLelGnmx0oyW.4XOk6KiPfy', 9, NULL, 'Y'),
(183, 'BOII865', 'AGUNG JATMIKA USMAR G.', '$2y$05$6MwE.ZoU/uwPAM7TsCk2XOQnVcGcTGhPwbT.s1fMoa2lLYbfdRcs.', 9, NULL, 'Y'),
(184, 'BOII992', 'ARIFAH NURHUDA', '$2y$05$xftvdqLacvCf4K9j3UlZt.pP0ZD6ABI7O6zO7BowYVm3w6s1vuFP6', 9, NULL, 'Y'),
(185, 'BOII993', 'GEORGE BOMANTARA WIJAYA', '$2y$05$l/zfH5BI2JRgrxab1Xzzt.MxjXIhKdLdK2lbpN1kghfVVa67KESvy', 9, NULL, 'Y'),
(186, 'BOII209', 'PENI WINDA SUPROBO', '$2y$05$OHv2fekHTjj5TVYhCHOYz.8TLXhRA6CxtaoiXt5w4B5fwwdvkORBS', 9, NULL, 'Y'),
(187, 'BOII824', 'EDO SUGANDA INDRA KUSUMA', '$2y$05$NT0z.Op7Dfvi1BumFpTjDOFcENQxSvKQ4vDHBoMawazUmZcXF1gdu', 9, NULL, 'Y'),
(188, 'BOII922', 'NICO ARISTA NANDA', '$2y$05$eKe.XP7IQcYarzR1o8WbAeXuxEoyX/f9o8w.LQu1GJ6q7Zs9PxnRu', 9, NULL, 'Y'),
(189, 'BOII503', 'VERAWATI ', '$2y$05$QSr/RLy3LzWiv1ihpCj3PuXmRzMFyG.SdxnYqkbFrIK4j0Y7tPw2m', 9, NULL, 'Y'),
(190, 'BOII634', 'RENDY ADITYA PECHLER', '$2y$05$7nfHX1mwdXoQ.DtbVJLm4uNieGG6Aii2U.jVveIEosohQDcGxqJ.S', 9, NULL, 'Y'),
(191, 'BOII996', 'YOHANA CHRISTY KUNTHI ', '$2y$05$MZ1v8dLNAkZ.spVHHRdv7.t8qybkSg.l4M9WGwc/bUt17ifVLpKtC', 9, NULL, 'Y'),
(192, 'BOII249', 'SOEGENG WINARTO', '$2y$05$U8wovDB39DCU59E.7FGY8eL0Knhvc4Hkf/U.Zd2934WEEShdhHRre', 9, NULL, 'Y'),
(193, 'BOII537', 'IFANINGTYAS RUKMANDIANITA', '$2y$05$7VEeRab1HjCQwrPclE32t.XtDbGmMXfXbcpsMUvBwa7tUoD0fp2DS', 9, NULL, 'Y'),
(194, 'BOII004', 'FABIAN ATHALLAH PUTRA HERDIANTO ', '$2y$05$Cc1D7NP4IQPKjdmelUSVpO4QGWt7baJoHo66UhwsD9CD1Q6eMv5Je', 9, NULL, 'Y'),
(195, 'BOII577', 'ETYTA RATNANINGTYAS', '$2y$05$7rWI6aEPyhkxm8br2088heQDCUt3UWgHKH5npGGTN89erL.gnsOoi', 9, NULL, 'Y'),
(196, 'BOII782', 'ASTARIS PRANISIA DEWI', '$2y$05$Us/sEKK1Oga/rHIfa3Vez.n3pRwfxzsLUUhqyBK0paDi5wdq33syK', 9, NULL, 'Y'),
(197, 'BOII990', 'AGNES FADILLA ASTRILIANA', '$2y$05$Q3JybYDDJ/4.SKjpL3JJoOYJV6B/jhZNJmq4T5OVEAoavDB0dEz/m', 9, NULL, 'Y'),
(198, 'BOII165', 'RENNY KARTIKA CANDRA', '$2y$05$3XXgDKsssicmnzu5qcM.Ueb9JcCCsDKnOefMS1yx712p3V9vwh2b2', 9, NULL, 'Y'),
(199, 'BOII322', 'YUNIAWATY', '$2y$05$m.3uY13WSsKnuVztelHVoesG3YwrywedH2XFmNf6pdKale5W.Dm3G', 9, NULL, 'Y'),
(200, 'BOII654', 'DEDY NUGROHO', '$2y$05$q9jrVl7zZ2E//DYdhVPCP.HXM7IMLtfte672QUJvPoYSIfRmyOpuC', 9, NULL, 'Y'),
(201, 'BOII912', 'IRINE SHELLY KUSUMA DEWI, SE', '$2y$05$k3x27iy9GI/hO8EEoAM9Ju.4z2oU7CjVIyfeDACXoYQlLgPri1lp2', 9, NULL, 'Y'),
(202, 'BOII571', 'HERWAHYUDI SINGGIH PAMBUDI', '$2y$05$EDdGuQOc8HLH2cATzmGoxe..FblIWs4ocgCPJWaOcRwmQvV.01GeW', 9, NULL, 'Y'),
(203, 'BOII006', 'YOYO SUPRAPTO', '$2y$05$OQ9udUP0Ia0S4nUjcwr9huJWQh0HCyJY.PkgXyKsS34p.5OT7p8pq', 9, NULL, 'Y'),
(204, 'BOII586', 'MUHAMMAD AGUSVIRANO AZHARI', '$2y$05$6ygymmxh/tp2OwWkrbCefuNSOZB1D7HHd6R9QYeH92q6g96v7xfXC', 9, NULL, 'Y'),
(205, 'BOII935', 'RURI AMALIAH AGUSTIN', '$2y$05$fhNlA0zmSnNpAxBZnxSzMuB00572VjXIaC1XXhLUFqcNQLIE56/fy', 9, NULL, 'Y'),
(206, 'BOII307', 'CHRISTA CHRISTINA', '$2y$05$QpvHoT1Tlf43CtzXtia/5eeknWz404IHDp8KkqlATi2QtJAR7Dotm', 9, NULL, 'Y'),
(207, 'BOII876', 'MUHAMAD YUSUP HATOGARAN PURBA', '$2y$05$4BDvfCIJCLtxBiR01Q3nXejVCfZL/j1f9Ml7Sv5e3HpXbk8d/RNQG', 9, NULL, 'Y'),
(208, 'BOII936', 'DIAH RAFIKA YUNIA SARDI', '$2y$05$FeCCt0Y5CZinDpDEZtQUMuwptZqRKCIsxWkgqBxXpKsnKuIUpsGgK', 9, NULL, 'Y'),
(209, 'BOII649', 'ROSIKA', '$2y$05$2ossYEdES/b6VoKe5ewusuQCuy5waivQvcztq5sYdmpEE3d6Zbi02', 9, NULL, 'Y'),
(210, 'BOII949', 'JOLI AJIS', '$2y$05$MWNcOLxSw15HY3NBLKSjae9sfqcjlZqKfgUycK4yVaXgHQ0I/bbkO', 9, NULL, 'Y'),
(211, 'BOII942', 'FAUZI GUSDIANTO', '$2y$05$cfqv0mY28Tynf3J6hQZf/O6P8ykiYeskIkCxzZqzH4GeFpUzUIGY.', 9, NULL, 'Y'),
(212, 'BOII003', 'KESYA LISNAWATI SIREGAR', '$2y$05$DtTDXH.SmG/f78z9hXITD.mjR0.0M1Cc/vQ/hSEmZnJPC.N72FWfu', 9, NULL, 'Y'),
(213, 'BOII733', 'STEVEN HANEY ADRIAANSZ', '$2y$05$C537nDqDzvDmETzqsRcwk.oJYqJyNB8N06ohfzp4EfpX4pMzCf7cu', 9, NULL, 'Y'),
(214, 'BOII930', 'BIMO SATRIO WICAKSONO', '$2y$05$44OH/rl3.7SD1P9EhODqEe4/dpPQ1RL/jAxzm7Ed0iPyNvm9dO7p.', 9, NULL, 'Y'),
(215, 'BOII956', 'RANDI PRABANDI KESUMA', '$2y$05$r91zEDB31/VFCiNCrO0V4OdT8YUiAfPKUYAYqBo5rGYL/FifW9.BS', 9, NULL, 'Y'),
(216, 'BOII099', 'SUHAITI', '$2y$05$gZFf8UFGE8DiM9Jm6K8rCeFR3QvyXCBQFLzgXyHjZq1abzXH.94zO', 9, NULL, 'Y'),
(217, 'BOII267', 'TOMMY RADITE ARDIANTO', '$2y$05$sedqWGPvKR/9AAgJ6TobeeWkNfKXK76mZQMtb4fdVmwzZcdhS4jO2', 9, NULL, 'Y'),
(218, 'BOII623', 'JODY FAJAR KURNIAWAN', '$2y$05$e2Zqe226ZT4neaJ6ML8rt.M4ZgwnEeZjDDkeh8kgehAxFjwonMZGu', 9, NULL, 'Y'),
(219, 'BOII724', 'TRI CAHYO', '$2y$05$Hna6WQ8/iK9AL02dyiPqjOO7eHHj9TkxJKNywhQQkVDTBt/iJNgVC', 9, NULL, 'Y'),
(220, 'BOII225', 'SWI JAYA', '$2y$05$4vp7coIGpFszrVaZB2VZ8ux1apTrE0FT8sxjS0wQEgvnNs2SZ9TtO', 9, NULL, 'Y'),
(221, 'BOII792', 'ERIKSON SIAHAAN, SE', '$2y$05$VwD3SW1i98e88.qEHQuV2.fTxdrBgCe/CQdI9zaE7PsZONpzBXBbu', 9, NULL, 'Y'),
(222, 'BOII994', 'HEINRICH JULIAN NGANTUNG ', '$2y$05$oPCQm.X6uw2Vi4DXeW8vB.d62G0YtOGMIkmRTEKtq/Z908qAfDO8e', 9, NULL, 'Y'),
(223, 'BOII997', 'YULIANTI DEBORA MARTINA ', '$2y$05$bDe5pl3Dnhq40JAhVWzodOuH1Hti8Tx0XSGJTXUwinTRh9XA/b3Ui', 9, NULL, 'Y'),
(224, 'BOII839', 'DWI SEPTIANDIKA', '$2y$05$PksJGkqX.MdNs3Rb5qHgWOF/sKEKJbmWbgNGVLdQ7.D3sm3.s12aK', 9, NULL, 'Y'),
(225, 'BOII890', 'MAYA PUSPITA DEWI', '$2y$05$HpSaP5rromOEeaQTWR8SBOLD5/Xu79GOJb7rwiSIEjmsSsYkHlvra', 9, NULL, 'Y'),
(226, 'BOII189', 'DIAH WIDIYANTI', '$2y$05$SsU.Ki4g8y/AQR1hUlKagexX4HjAqrim3GGnsz.EPf.2XizZTx1Wa', 9, NULL, 'Y'),
(227, 'BOII736', 'ASRIEN M N SIAHAYA', '$2y$05$IG8.0PipY0uBidf6ZISrm.8sTaq9LIekqvUdCFb1GjfPZBimK/cb6', 9, NULL, 'Y'),
(228, 'BOII175', 'RETNO TRIHARINI', '$2y$05$PTdiLDZnIL4iIzGdTE99PeVhxlFxAzfJzvoTesULEEhSk41wD2vvi', 9, NULL, 'Y'),
(229, 'BOII849', 'ABDURRAHMAN', '$2y$05$3aldEHBp.KScfqDa90WEKuQM1i/UQVDERuHtz4eZrGxVcdeeC8pDC', 9, NULL, 'Y'),
(230, 'BOII766', 'MUHAMMAD RIZAL', '$2y$05$Z5T3YoKOYzXiMPIbrlzfrev3c3.e0PnRW1ls7cMCBcv556yG7x8jG', 9, NULL, 'Y'),
(231, 'BOII931', 'MEY AGNES MANALU', '$2y$05$4Uv85HlDAcS.k1Y8b78bpu//aXGLHlxnqDyaAu67sROqH55uLY/ge', 9, NULL, 'Y'),
(232, 'BOII852', 'MIRATI PUJI ASTUTI', '$2y$05$3jwD9LdiymPPlTI5.tP/r.DYqV.zIKDBoOwxhv0aFvsjf18jrIRau', 9, NULL, 'Y'),
(233, 'BOII884', 'INDRI NURFITRIYANI', '$2y$05$jd2lO3TbeQZlbd6Flgwgi.GyuGN0hiS8Beu654WQ/YKrAU5NJbAQO', 9, NULL, 'Y'),
(234, 'BOII928', 'INGGID NILAM SARI', '$2y$05$SRzy1jw8.pCcwVP5Eq6Ha.URt3Rax0xXvAG5ThEi0cn4vp8kDVXGO', 9, NULL, 'Y'),
(235, 'BOII008', 'MUTIA NURCAHYAWATI', '$2y$05$ubUkVzd3aEhJlYtdsvQVY.tbkNNzMyFV3kVS/aQq72nM9cWGjl.eO', 9, NULL, 'Y'),
(236, 'BOII944', 'EGA NOVITASARI', '$2y$05$TsnNs7lIe6Vabdj8YMtapemaF0WvyyU6qEwfUI4ZjE2nbAgBKFI1a', 9, NULL, 'Y'),
(237, 'BOII966', 'CISKA ANGGITA FIYANDI PUTRI', '$2y$05$fflRlUv5myUrcJKluC3DceVv3bQTFBgVyxwlQ5nCq4kKDUuY/r1ky', 9, NULL, 'Y'),
(238, 'BOII868', 'AL AZHARI JAUMIL MUTTAQIN', '$2y$05$NcA7gNimIRoOsrh1ZLe1NevT2QzEFtttA3O2jiciTGhpFuY0UAIk6', 9, NULL, 'Y'),
(239, 'BOII205', 'ANDRIANI', '$2y$05$yqK67deXdebT6g/M1QelG.F2UXEQfuU/EF2K.3W0mw1lgijw.gXLi', 9, NULL, 'Y'),
(240, 'BOII011', 'SALSABILA AMAJIDA HERNANDA', '$2y$05$8SpgTt5vhgswCnEc8tPFd.Mxk4CRTBHA8yo9eEEEPhaf9zZLe7S9K', 9, NULL, 'Y'),
(241, 'BOII256', 'AHMAD MUZAIDIN', '$2y$05$zwc5G7.LkaebHUskviKiC.BemQWHn1I5X7wYErxPZrJeEugii70Dm', 9, NULL, 'Y'),
(242, 'BOII130', 'A.E. PRATIWI RACHWOTO', '$2y$05$f6eVXgB/KQkCKXe5KSascOdCyL0uvVx1wQAU5BOjABbI6dEFFyjNK', 9, NULL, 'Y'),
(243, 'BOII812', 'ARIEF SETIAWAN', '$2y$05$uQRqBTPWUL8jmkKiGJW5k.SQMZ1RUhtSlRh0P9CpE51ThgeYTrJsu', 9, NULL, 'Y'),
(244, 'BOII246', 'KUS SRI HARDJANTI', '$2y$05$dDG/Kdfd4VluwXIUuKmRCuATwUPa4sB0w6ivSv21hRE3SChRfOfFG', 9, NULL, 'Y'),
(245, 'BOII745', 'CKOLIB WIBOWO, S.KOM', '$2y$05$tg4oO/.8va2.BXXpTTYjoemBFk5PURso8qCYwFryNWlK8/Kw7WY4W', 9, NULL, 'Y'),
(246, 'BOII811', 'PURWO WIDODO', '$2y$05$moOeKW3ZoLM4N635RcurkOOjmIoZlZZgIL6wXZfELUyPuePR8g2jK', 9, NULL, 'Y'),
(247, 'BOII608', 'HASTOTO SUBENO', '$2y$05$cE7jt1PxstVB9t9MOkIwsOtyG06I7ijKEA8UXQI9MsrfoveBeBqx2', 9, NULL, 'Y'),
(248, 'BOII753', 'ALEK TARYADI', '$2y$05$UBAH5EIl2GzZwkABZVd28.pRTsrfBj29j/9sHtdDr8TNJmBfZNEWS', 9, NULL, 'Y'),
(249, 'BOII945', 'FAHRATUL HAYATI', '$2y$05$7j3QxgAOFdZMX8TuvDmleelcZf1rH3x8WI77Sm7bDSLebjjQ4v6J6', 9, NULL, 'Y'),
(250, 'BOII283', 'HERMAWAN APRIANTO', '$2y$05$0ni2lamoQKzt7YYmFC.RnOepuz.pRyxktxWhs0KOzDjt/s5YRiyPa', 9, NULL, 'Y'),
(251, 'BOII431', 'ANDRIANSYAH', '$2y$05$tl2oh4U7Gdry9dpJ9vUaK.h5iYNUxEAMIpFI8K5gRrSGdM6iH7cl.', 9, NULL, 'Y'),
(252, 'BOII618', 'IRFAN ALI', '$2y$05$aGaTd1K70QhTwcgqrk2bN.DzXuv8p9Zg7IL6V/XxCljj3Zrq2iJ.i', 9, NULL, 'Y'),
(253, 'BOII659', 'BAGUS ADIWIBOWO', '$2y$05$1A.UW4Dd/e5A3emy3UbPnuj5H5/pIuRC/Hkl/YsF0S9vAOw8rnOHu', 9, NULL, 'Y'),
(254, 'BOII991', 'ALFREDO CAHYA APRIANDHIKA', '$2y$05$XH5VSMNkHFaZfT/BmcaIH.fDvPuwxN1Gx.jPCPluybRMLxW2QWff.', 9, NULL, 'Y'),
(255, 'BOII971', 'PUTRI BALGIS BADRIYAH', '$2y$05$WxBXo8hEwpRuc5hZcn/PKuyr0uNzspv.ToSKY4d69iuaVLc2UkPfG', 9, NULL, 'Y'),
(256, 'BOII999', 'RADHIDYA WIBISONO ', '$2y$05$u9BrM1tvK0GFibJqvg9iouCb1WQNVvyXKx5JlG8vu7ZABzqgPZGjy', 9, NULL, 'Y'),
(257, 'BOII800', 'HERDIAWAN', '$2y$05$3qXVmQ8QkoGl28llB9dhde78A1lImmOcrNNX59PQL8JdmtltcXaC.', 9, NULL, 'Y'),
(258, 'BOII813', 'NANI PRAHASTINI', '$2y$05$DWWdu3IvFSp7a2y1BTDq2uByLdfOjTUISY8pG/TkDI0Pj56Z2OqWa', 9, NULL, 'Y'),
(259, 'BOII241', 'MARIA ULFA', '$2y$05$7AAF2VRlwvYLPYSviEDRcOsbUMTqz28OwOQK0Cj1uH4e1z.dvLNd2', 9, NULL, 'Y'),
(260, 'BOII278', 'IKIN SODIKIN', '$2y$05$vHY4m2jp6h9HqURC3fBuaejMWFJK8RyvflthsezlHzxNyus.7GdqG', 9, NULL, 'Y'),
(261, 'BOII448', 'ACHMAD CHRISMAWAN', '$2y$05$/Wrni86Q7nBiJfHA5Lco1eh12ydPi4kqFdvhW3ljeuLd8Y3u4B0.q', 9, NULL, 'Y'),
(262, 'BOII703', 'MAYSYITA SARI', '$2y$05$yFbwarPv7DQCrlTjTht14.4XNhpswidy538I97NEZYWTfjycMlrPi', 9, NULL, 'Y'),
(263, 'BOII927', 'FAUZIAH NOFANI', '$2y$05$cQuhaKL73nnBdBpNajTyPeN9iUaRtVH5ikzJ7J6Q7KpIzWnb5oT42', 9, NULL, 'Y'),
(264, 'BOII013', 'DEGITA SATRIO PUTRI ', '$2y$05$h9tvSsHA1eookGmKcTVQOeAh/1Ecx0IYeMAWwuHOZq0XF3rv8Bk0e', 9, NULL, 'Y'),
(265, 'BOII946', 'RAVVI NURUL ABIE', '$2y$05$PwwM1xP3CfpGrlFK8Zu95u2MU3zN9zp2xY0JI9.upL6zIB2eg875q', 9, NULL, 'Y'),
(266, 'BOII934', 'FALENSIA RACHEL WAIRATA', '$2y$05$kcmjDAH2jzyqw5E.pU73X.gbx88sLs7bzvv54sDiAl1MpGUfc1Gu6', 9, NULL, 'Y'),
(267, 'BOII005', 'ADITYA PERMANA', '$2y$05$vmBK/wgFtX69S/s4PjvwCeSvun3Ersozrq2hkRtcTow5b2em9hGw6', 9, NULL, 'Y'),
(268, 'SISDUR', 'SISDUR', '$2y$05$/GnzeB83Od.k//Ec9uRyZ.mFHobQEkw3dkp/NaoGWvUPF.u3C6wpu', 1, NULL, 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_userlevel`
--

CREATE TABLE `tbl_userlevel` (
  `id_level` int(11) UNSIGNED NOT NULL,
  `nama_level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_userlevel`
--

INSERT INTO `tbl_userlevel` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(9, 'Viewer'),
(10, 'Download'),
(12, 'Administrator');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tbl_compliance`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tbl_compliance` (
`id_file` int(11)
,`nama_file` varchar(250)
,`url_file` varchar(250)
,`id_kat` int(11)
,`nama_kat` varchar(100)
,`status` enum('peraturan ojk','surat edaran ojk','keputusan dewan komisioner','peraturan bi','surat edaran bi','peraturan anggota dewan gubernur','kementrian','ketenagakerjaan','lingkungan hidup','lps','pemerintah daerah','perpajakan','UU','lampiran')
,`tahun` int(5)
,`created_at` datetime
,`update_at` datetime
,`lampiran` mediumtext
,`approval_status` enum('pending','approved','rejected')
,`approved_by` int(11)
,`approved_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tbl_internal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tbl_internal` (
`id_file` int(11)
,`nama_file` varchar(250)
,`url_file` varchar(250)
,`id_kategori` int(11)
,`nama_internal` varchar(100)
,`status` enum('SK Direksi','SE Direksi','Memo Intern','Laporan','Lampiran','Informasi')
,`tahun` int(5)
,`created_at` datetime
,`update_at` datetime
,`lampiran` mediumtext
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tbl_log`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tbl_log` (
`id` int(11)
,`id_user` int(11)
,`fitur` varchar(50)
,`keterangan` text
,`cretead_at` datetime
,`update_at` datetime
,`username` varchar(50)
,`full_name` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_tbl_revoked`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_tbl_revoked` (
`id_file` int(11)
,`nama_file` varchar(250)
,`url_file` varchar(250)
,`id_kateg` int(11)
,`nama_revoked` varchar(100)
,`status` enum('dicabut','cabut')
,`tahun` int(5)
,`created_at` datetime
,`update_at` datetime
,`lampiran` mediumtext
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tbl_compliance`
--
DROP TABLE IF EXISTS `v_tbl_compliance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_compliance`  AS SELECT `c`.`id_file` AS `id_file`, `c`.`nama_file` AS `nama_file`, `c`.`url_file` AS `url_file`, `k`.`id_kat` AS `id_kat`, `k`.`nama_kat` AS `nama_kat`, `c`.`status` AS `status`, `c`.`tahun` AS `tahun`, `c`.`created_at` AS `created_at`, `c`.`update_at` AS `update_at`, group_concat(`l`.`file_url` separator ', ') AS `lampiran`, `c`.`approval_status` AS `approval_status`, `c`.`approved_by` AS `approved_by`, `u`.`full_name` AS `approved_name` FROM (((`tbl_compliance` `c` left join `kategori` `k` on(`c`.`id_kat` = `k`.`id_kat`)) left join `tbl_compliance_lampiran` `l` on(`c`.`id_file` = `l`.`id_file`)) left join `tbl_user` `u` on(`u`.`id_user` = `c`.`approved_by`)) GROUP BY `c`.`id_file` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tbl_internal`
--
DROP TABLE IF EXISTS `v_tbl_internal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_internal`  AS SELECT `i`.`id_file` AS `id_file`, `i`.`nama_file` AS `nama_file`, `i`.`url_file` AS `url_file`, `i`.`id_kategori` AS `id_kategori`, `k`.`nama_internal` AS `nama_internal`, `i`.`status` AS `status`, `i`.`tahun` AS `tahun`, `i`.`created_at` AS `created_at`, `i`.`update_at` AS `update_at`, group_concat(`l`.`file_url` order by `l`.`created_at` DESC separator ', ') AS `lampiran` FROM ((`tbl_internal` `i` join `kategori_internal` `k` on(`i`.`id_kategori` = `k`.`id_kategori`)) left join `tbl_internal_lampiran` `l` on(`i`.`id_file` = `l`.`id_file`)) GROUP BY `i`.`id_file`, `i`.`nama_file`, `i`.`url_file`, `i`.`id_kategori`, `k`.`nama_internal`, `i`.`status`, `i`.`tahun`, `i`.`created_at`, `i`.`update_at` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tbl_log`
--
DROP TABLE IF EXISTS `v_tbl_log`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_log`  AS SELECT `log_user`.`id` AS `id`, `log_user`.`id_user` AS `id_user`, `log_user`.`fitur` AS `fitur`, `log_user`.`keterangan` AS `keterangan`, `log_user`.`cretead_at` AS `cretead_at`, `log_user`.`update_at` AS `update_at`, `tbl_user`.`username` AS `username`, `tbl_user`.`full_name` AS `full_name` FROM (`tbl_user` join `log_user` on(`tbl_user`.`id_user` = `log_user`.`id_user`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_tbl_revoked`
--
DROP TABLE IF EXISTS `v_tbl_revoked`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_tbl_revoked`  AS SELECT `i`.`id_file` AS `id_file`, `i`.`nama_file` AS `nama_file`, `i`.`url_file` AS `url_file`, `i`.`id_kateg` AS `id_kateg`, `k`.`nama_revoked` AS `nama_revoked`, `i`.`status` AS `status`, `i`.`tahun` AS `tahun`, `i`.`created_at` AS `created_at`, `i`.`update_at` AS `update_at`, group_concat(`l`.`file_url` order by `l`.`created_at` DESC separator ', ') AS `lampiran` FROM ((`tbl_revoked` `i` join `kategori_revoked` `k` on(`i`.`id_kateg` = `k`.`id_kateg`)) left join `tbl_revoked_lampiran` `l` on(`i`.`id_file` = `l`.`id_file`)) GROUP BY `i`.`id_file`, `i`.`nama_file`, `i`.`url_file`, `i`.`id_kateg`, `k`.`nama_revoked`, `i`.`status`, `i`.`tahun`, `i`.`created_at`, `i`.`update_at` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kat`);

--
-- Indeks untuk tabel `kategori_internal`
--
ALTER TABLE `kategori_internal`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kategori_revoked`
--
ALTER TABLE `kategori_revoked`
  ADD PRIMARY KEY (`id_kateg`);

--
-- Indeks untuk tabel `log_user`
--
ALTER TABLE `log_user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_akses_submenu`
--
ALTER TABLE `tbl_akses_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_compliance`
--
ALTER TABLE `tbl_compliance`
  ADD PRIMARY KEY (`id_file`),
  ADD KEY `id_kat` (`id_kat`);

--
-- Indeks untuk tabel `tbl_compliance_lampiran`
--
ALTER TABLE `tbl_compliance_lampiran`
  ADD PRIMARY KEY (`id_lampiran`),
  ADD KEY `id_file` (`id_file`);

--
-- Indeks untuk tabel `tbl_internal`
--
ALTER TABLE `tbl_internal`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tbl_internal_lampiran`
--
ALTER TABLE `tbl_internal_lampiran`
  ADD PRIMARY KEY (`id_lampiran_in`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_revoked`
--
ALTER TABLE `tbl_revoked`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tbl_revoked_lampiran`
--
ALTER TABLE `tbl_revoked_lampiran`
  ADD PRIMARY KEY (`id_lampiran_rev`);

--
-- Indeks untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indeks untuk tabel `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT untuk tabel `kategori_internal`
--
ALTER TABLE `kategori_internal`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori_revoked`
--
ALTER TABLE `kategori_revoked`
  MODIFY `id_kateg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `log_user`
--
ALTER TABLE `log_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1256;

--
-- AUTO_INCREMENT untuk tabel `tbl_akses_menu`
--
ALTER TABLE `tbl_akses_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT untuk tabel `tbl_akses_submenu`
--
ALTER TABLE `tbl_akses_submenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT untuk tabel `tbl_compliance`
--
ALTER TABLE `tbl_compliance`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `tbl_compliance_lampiran`
--
ALTER TABLE `tbl_compliance_lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `tbl_internal`
--
ALTER TABLE `tbl_internal`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `tbl_internal_lampiran`
--
ALTER TABLE `tbl_internal_lampiran`
  MODIFY `id_lampiran_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `tbl_revoked`
--
ALTER TABLE `tbl_revoked`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_revoked_lampiran`
--
ALTER TABLE `tbl_revoked_lampiran`
  MODIFY `id_lampiran_rev` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_submenu`
--
ALTER TABLE `tbl_submenu`
  MODIFY `id_submenu` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT untuk tabel `tbl_userlevel`
--
ALTER TABLE `tbl_userlevel`
  MODIFY `id_level` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_compliance`
--
ALTER TABLE `tbl_compliance`
  ADD CONSTRAINT `tbl_compliance_ibfk_1` FOREIGN KEY (`id_kat`) REFERENCES `kategori` (`id_kat`);

--
-- Ketidakleluasaan untuk tabel `tbl_compliance_lampiran`
--
ALTER TABLE `tbl_compliance_lampiran`
  ADD CONSTRAINT `tbl_compliance_lampiran_ibfk_1` FOREIGN KEY (`id_file`) REFERENCES `tbl_compliance` (`id_file`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
