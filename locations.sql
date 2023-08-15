-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2023 at 07:44 PM
-- Server version: 5.7.40
-- PHP Version: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alamat_lokasi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinates` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_kerusakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_lokasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `alamat_lokasi`, `coordinates`, `tingkat_kerusakan`, `foto_lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Jl. Haji Kadir Rajabasa Bandar Lampung', '-5.373987, 105.236229', 'Ringan', '2023-08-15.jl. haji kadir rajabasa bdl.jpeg', '2023-08-15 04:18:50', '2023-08-15 04:18:50'),
(2, 'Jalan cengkeh 1 bandar lampung gedong meneng', '-5.375157, 105.241655', 'Parah', '2023-08-15.jl cengkeh 1.jpeg', '2023-08-15 05:40:33', '2023-08-15 05:40:33'),
(3, 'Jl. Palapa 10 kedaton bandar lampung', '-5.381984, 105.246232', 'Ringan', '2023-08-15.jl palapa 10.jpeg', '2023-08-15 05:47:39', '2023-08-15 05:47:39'),
(4, 'Jl lada ujung 1 gedong meneng bandar lampung', '-5.375499, 105.239918', 'Ringan', '2023-08-15.jl lada ujung 1.jpeg', '2023-08-15 06:06:31', '2023-08-15 06:06:31'),
(5, 'Gang sumur kucing bandar lampung gedong meneng', '-5.376485, 105.239640', 'Parah', '2023-08-15.gg sumur kucing.jpeg', '2023-08-15 06:07:09', '2023-08-15 06:07:09'),
(6, 'Gang kelinci rajabasa bandar lampung', '-5.374563, 105.236775', 'Parah', '2023-08-15.gg kelinci.jpeg', '2023-08-15 06:07:38', '2023-08-15 06:07:38'),
(7, 'Perumnas Way Kandis, Kec. Tj. Senang', '-5.365012, 105.287402', 'Ringan', '2023-08-15.Bandar Lampung, Perumnas Way Kandis, Kec. Tj. Senang, Kota Bandar Lampung, Lampung 35135.jpeg', '2023-08-15 06:08:44', '2023-08-15 06:08:44'),
(8, 'Gg Swadya 2, Tj. Senang, Kec. Tj. Senang', '-5.364616, 105.283972', 'Ringan', '2023-08-15.Gg Swadya 2, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung, Lampung 35135.jpeg', '2023-08-15 06:09:59', '2023-08-15 06:09:59'),
(9, 'Jl. B. Sepatu VI, Tj. Senang, Kec. Tj. Senang', '-5.364387, 105.285989', 'Sedang', '2023-08-15.Jl. B. Sepatu VI, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung, Lampung 35135.jpeg', '2023-08-15 06:12:15', '2023-08-15 06:12:15'),
(10, 'Jl. Bunga Sedap Malam 1, Tj. Senang', '-5.362617, 105.283615', 'Ringan', '2023-08-15.Jl. Bunga Sedap Malam 1, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung, Lampung 35135.jpeg', '2023-08-15 08:22:34', '2023-08-15 08:22:34'),
(11, 'Jl. Durian 1 Way Dadi, Kec. Sukarame', '-5.372973, 105.285599', 'Parah', '2023-08-15.Jl. Raflesia 2, Way Dadi, Kec. Sukarame, Kota Bandar Lampung, Lampung 35136.jpeg', '2023-08-15 08:24:43', '2023-08-15 08:24:43'),
(12, 'Jl. Raflesia 18-1, Way Dadi, Kec. Sukarame', '-5.372484, 105.287555', 'Parah', '2023-08-15.Jl. Raflesia 18-1, Way Dadi, Kec. Sukarame, Kota Bandar Lampung, Lampung 35132.jpeg', '2023-08-15 08:26:05', '2023-08-15 08:26:05'),
(13, 'Jl. Raflesia 133-132, Tj. Senang, Kec. Tj. Senang', '-5.3620260, 105.2831270', 'Sedang', '2023-08-15.Jl. Raflesia 133-132, Tj. Senang, Kec. Tj. Senang, Kota Bandar Lampung, Lampung 35135.jpeg', '2023-08-15 08:26:34', '2023-08-15 08:26:34'),
(14, 'Jl. Raflesia, Way Dadi, Kec. Sukarame', '-5.372456, 105.286863', 'Parah', '2023-08-15.Jl. Raflesia, Way Dadi, Kec. Sukarame, Kota Bandar Lampung, Lampung 35132.jpeg', '2023-08-15 08:33:46', '2023-08-15 08:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
