-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Jan 2024 pada 09.10
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barraka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buffer`
--

CREATE TABLE `buffer` (
  `id_buffer` int NOT NULL,
  `no_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_segel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL,
  `jenis_count` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.20ft 2.21ft 3.40ft',
  `pelayaran` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT '	1.meratus 2.tanto 3.spill 4.temas 5.samas 6.srill',
  `mitra` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT '	1.Depo 2.Ckl 3.Sjc 4.Pwo 5.Others',
  `re_maks` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `delivery`
--

CREATE TABLE `delivery` (
  `id_delivery` int NOT NULL,
  `truck_id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `no_bl` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `id_supir` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.20ft 2.21ft 3.40ft',
  `pelayaran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.meratus 2.tanto 3.spill 4.temas 5.samas 6.srill',
  `mitra` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.Depo 2.Ckl 3.Sjc 4.Pwo 5.Smi 6.Others',
  `re_maks` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `delivery`
--

INSERT INTO `delivery` (`id_delivery`, `truck_id`, `no_bl`, `id_supir`, `tanggal`, `no_count`, `jenis_count`, `pelayaran`, `mitra`, `re_maks`) VALUES
(1, '-', 'KBB313SJK', '-', '2024-01-09 15:12:46', 'SMBU 2322847', '20ft', 'samas', 'Sjc', 'STATUS SELESAI / CAMPURAN'),
(2, '-', 'KBB313SJK', '-', '2024-01-09 15:15:27', 'SMBU 2326502', '20ft', 'samas', 'Sjc', 'STATUS SELESAI / CAMPURAN'),
(3, '-', 'KBB313SJK', '-', '2024-01-09 15:15:27', 'SMBU 2314055', '20ft', 'samas', 'Sjc', 'STATUS SELESAI / CAMPURAN'),
(4, '-', 'KBB313SJK', '-', '2024-01-09 15:15:27', 'SMBU 2321820', '20ft', 'samas', 'Sjc', 'STATUS SELESAI / CAMPURAN '),
(5, '-', 'KBB313AGL', '-', '2024-01-09 15:15:27', 'SAMU 2301462', '20ft', 'samas', 'Others', 'STATUS SELESAI / PIPA'),
(6, '-', '1123230309X', '-', '2024-01-09 15:15:27', 'SPNU 2739876', '20ft', 'spill', 'Others', 'STATUS SELESAI / BATA RINGAN \r\n'),
(7, '-', '1123230309X', '-', '2024-01-09 15:15:27', 'SPNU 2747079', '20ft', 'spill', 'Others', 'STATUS SELESAI / BATA RINGAN '),
(8, '-', '1123230309X', '-', '2024-01-09 15:15:27', 'SPNU 2787810', '20ft', 'spill', 'Others', 'STATUS SELESAI / BATA RINGAN '),
(9, '-', 'SUBCW2303607901', '-', '2024-01-09 15:15:27', 'MRTU 2003190', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(10, '-', 'SUBCW2304922602', '-', '2024-01-09 15:15:27', 'MRTU 2016916', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(11, '-', '1123230309X', '-', '2024-01-09 15:15:27', 'SPNU 2831301', '20ft', 'spill', 'Others', 'STATUS SELESAI / BATA RINGAN '),
(12, '-', 'SUBCW2304922602', '-', '2024-01-09 15:15:27', 'MRTU 2019279', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(13, '-', 'SUBCW2304922602', '-', '2024-01-09 15:15:27', 'TCNU 7597932', '40ft', 'temas', 'Others', 'STATUS SELESAI / PLY WOOD'),
(14, '-', 'SUBCW2304922602', '-', '2024-01-09 15:15:27', 'MRTU 2041210', '20ft', 'meratus', 'Others', 'STATUS SELESAI / KERAMIK'),
(15, '-', 'SUBCW2304922602', '-', '2024-01-09 15:15:27', 'MRTU 2043948', '20ft', 'meratus', 'Others', 'STATUS SELESAI / KERAMIK'),
(16, '-', 'SUBCW2304922602', '-', '2024-01-09 15:15:27', 'MRTU 2047645', '20ft', 'meratus', 'Others', 'STATUS SELESAI / KERAMIK'),
(17, '-', '2223349109X', '-', '2023-10-04 15:15:00', 'SPNU 2750489', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BATA RINGAN'),
(18, '-', '2223349109X', '-', '2023-10-05 15:15:00', 'SPNU 2776971', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BATA RINGAN'),
(19, '-', '2223349109X', '-', '2023-10-05 15:15:00', 'SPNU 2813714', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BATA RINGAN '),
(20, '-', '1623220409X', '-', '2024-01-09 15:15:00', 'SPNU 2676150', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BESI '),
(21, '-', 'SUBCW23037343', '-', '2024-01-09 15:15:00', 'MRTU 9620297', '40ft', 'meratus', 'Depo', 'STATUS SELESAI / PLY WOOD'),
(22, '-', 'SUBCW23037343', '-', '2024-01-09 15:18:00', 'MRTU 9602293', '40ft', 'meratus', 'Depo', 'STATUS SELESAI / BATA RINGAN'),
(23, '-', '2223349109X', '-', '2023-10-08 15:15:00', 'SPNU 2820210', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BATA RINGAN'),
(48, '-', '2223349109X', '-', '2023-10-08 23:27:00', 'SPNU 2826162', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BATA RINGAN '),
(49, '-', '2223349109X', '-', '2023-10-08 23:28:00', 'SPNU 2936215', '20ft', 'spill', 'Depo', 'STATUS SELESAI / BATA RINGAN '),
(50, '-', '2023291509X', '-', '2023-10-09 23:30:00', 'SPNU 2752007', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI'),
(51, '-', '2023291509X', '-', '2023-10-09 23:31:00', 'SPNU 2753390', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI'),
(52, '-', '2023291509X', '-', '2023-10-10 23:32:00', 'SPNU 2745311', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI'),
(53, '-', '2023291509X', '-', '2023-10-10 23:33:00', 'SPNU 2849960', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI '),
(54, '-', '2023291509X', '-', '2023-10-11 23:34:00', 'SPNU 2759341', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI'),
(55, '-', '2023291509X', '-', '2023-10-11 23:35:00', 'SPNU 2831662', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI'),
(56, '-', '2023291509X', '-', '2023-10-11 23:36:00', 'SPNU 2841212', '20ft', 'spill', 'Others', 'STATUS SELESAI / BESI '),
(57, '-', 'SUBCW2303833201', '-', '2023-10-12 23:38:00', 'MRLU 5210356', '40ft', 'meratus', 'Depo', 'STATUS SELESAI / GC'),
(58, '-', 'SUBCW2303833201', '-', '2023-10-12 23:39:00', 'MRTU 9610982', '40ft', 'meratus', 'Depo', 'STATUS SELESAI / GC'),
(59, '-', 'SUBCW2303833201', '-', '2023-10-14 23:43:00', 'MRLU 2389926', '20ft', 'meratus', 'Depo', 'STATUS SELESAI / BESI'),
(60, '-', 'SUBCW2303833201', '-', '2023-10-14 23:44:00', 'MRTU 2008269', '20ft', 'meratus', 'Depo', 'STATUS SELESAI / BESI'),
(61, '-', 'SUBCW2303833201', '-', '2023-10-14 23:45:00', 'MRTU 9600710', '40ft', 'meratus', 'Depo', 'STATUS SELESAI / GC'),
(62, '-', 'SUBCW2303833201', '-', '2023-10-16 23:46:00', 'MRTU 2032727', '20ft', 'meratus', 'Depo', 'STATUS SELESAI / BESI'),
(63, '-', 'SUBCW2303833201', '-', '2023-10-16 23:47:00', 'MRTU 2039275', '20ft', 'meratus', 'Depo', 'STATUS SELESAI / BESI'),
(64, '-', 'SUBCW2303958902', '-', '2023-10-19 23:49:00', 'MRLU 2362930', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(65, '-', 'SUBCW2303958902', '-', '2023-10-19 23:51:00', 'MRLU 2366670', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(66, '-', 'SUBCW2303958902', '-', '2023-10-20 23:52:00', 'MRLU 2367948', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(67, '-', 'SUBCW2303958902', '-', '2023-10-21 23:54:00', 'MRLU 2382670', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(68, '-', 'SUBCW2303958902', '-', '2023-10-21 23:55:00', 'MRTU 2112695', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI'),
(69, '-', 'SUBCW2303958902', '-', '2023-10-21 23:57:00', 'TCNU 3172694', '40ft', 'temas', 'Others', 'STATUS SELESAI / PLY WOOD'),
(70, '-', '2123016209X', '-', '2023-10-21 00:00:00', 'SPNU 2864584', '20ft', 'spill', 'Others', 'STATUS SELESAI / OLI'),
(71, '-', 'SUBCW2303958902', '-', '2023-10-24 00:01:00', 'MRTU 2089635', '20ft', 'meratus', 'Others', 'STATUS SELESAI / BESI DAN SENG'),
(72, '-', 'SUBCW2303958902', '-', '2023-10-24 00:02:00', 'MRTU 9611818', '40ft', 'meratus', 'Others', 'STATUS SELESAI / PLY WOOD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outside`
--

CREATE TABLE `outside` (
  `id_outside` int NOT NULL,
  `truck_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_supir` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL,
  `no_count` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_segel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_count` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.20ft 2.21ft 3.40ft',
  `pelayaran` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.meratus 2.tanto 3.spill 4.temas 5.samas 6.srill',
  `mitra` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.Depo 2.Ckl 3.Sjc 4.Pwo 5.Others',
  `re_maks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `receiving`
--

CREATE TABLE `receiving` (
  `id_receiving` int NOT NULL,
  `truck_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_supir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_count` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_count` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.20ft 2.21ft 3.40ft',
  `pelayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.meratus 2.tanto 3.spill 4.temas 5.samas 6.srill ',
  `mitra` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.Depo 2.Ckl 3.Sjc 4.Pwo 5.Others ',
  `re_maks` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stripping`
--

CREATE TABLE `stripping` (
  `id_stripping` int NOT NULL,
  `no_bl` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `no_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pelayaran` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.20ft 2.21ft 3.40ft ',
  `jenis_count` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.meratus 2.tanto 3.spill 4.temas 5.samas 6.sril',
  `mitra` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.Depo 2.Ckl 3.Sjc 4.Pwo 5.Others',
  `re_maks` varchar(500) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT '1.admin 2.user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'My_Bkm', 'admin', '$2y$10$AMdf.IaKkL8PNKRubuXqbea0NtdIhgN0EZeRwGqdwAcL1nMRQAe3C', 'admin'),
(2, 'Denisa x Bkm', 'Denis', '$2y$10$fV2dK2PegHxpfAqY.tIGzO/QECOipRBm1hYupcoTDzlw70AdicbDa', 'admin'),
(3, 'My_Barraka', 'user', '$2y$10$7mVCGm7YrZhxMl/do7N07eRWv4mjmEvxWJ03N5/UfoRqLeQ8C6ddy', 'user'),
(4, 'Arul X BKM', 'arul', '$2y$10$eL9ew5EAchPWLcsBLT/5Yef3KufaFAzeOI28Od5TESww2cTBvFA9e', 'user'),
(5, 'Aisyah X Keuangan', 'ai-keuangan', '$2y$10$9hsePpKv1cYfUjTr4AghYOr9484UxZnXC4adhbkBY475WFsdmq/.C', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buffer`
--
ALTER TABLE `buffer`
  ADD PRIMARY KEY (`id_buffer`);

--
-- Indeks untuk tabel `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id_delivery`);

--
-- Indeks untuk tabel `outside`
--
ALTER TABLE `outside`
  ADD PRIMARY KEY (`id_outside`);

--
-- Indeks untuk tabel `receiving`
--
ALTER TABLE `receiving`
  ADD PRIMARY KEY (`id_receiving`);

--
-- Indeks untuk tabel `stripping`
--
ALTER TABLE `stripping`
  ADD PRIMARY KEY (`id_stripping`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buffer`
--
ALTER TABLE `buffer`
  MODIFY `id_buffer` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id_delivery` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `outside`
--
ALTER TABLE `outside`
  MODIFY `id_outside` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `receiving`
--
ALTER TABLE `receiving`
  MODIFY `id_receiving` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stripping`
--
ALTER TABLE `stripping`
  MODIFY `id_stripping` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
