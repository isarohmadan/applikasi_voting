-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Bulan Mei 2024 pada 18.24
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
-- Database: `kalkulator`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_berat`
--

CREATE TABLE `log_berat` (
  `id_berat` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `berat_dari` varchar(255) NOT NULL,
  `berat_ke` varchar(255) NOT NULL,
  `berat_awal` decimal(11,2) NOT NULL,
  `berat_akhir` decimal(11,2) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_berat`
--

INSERT INTO `log_berat` (`id_berat`, `id_user`, `berat_dari`, `berat_ke`, `berat_awal`, `berat_akhir`, `tanggal`) VALUES
(4, '8ff1804f-1f40-406c-a4a5-7a83330d1b78', 'milligram', 'ton', 12.00, 0.00, '2024-05-12'),
(7, '48c54505-c0a7-47de-b8f5-b50ad187e2c6', 'kilogram', 'ton', 50.00, 0.00, '2024-05-12'),
(8, 'f0326f98-fd2c-4114-81dc-74951cb5bb3a', 'kilogram', 'gram', 50.00, 50000.00, '2024-05-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_kalkulator`
--

CREATE TABLE `log_kalkulator` (
  `Id_kalkulator` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `operasi` varchar(100) NOT NULL,
  `hasil` int(12) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_kalkulator`
--

INSERT INTO `log_kalkulator` (`Id_kalkulator`, `id_user`, `operasi`, `hasil`, `tanggal`) VALUES
(8, '8ff1804f-1f40-406c-a4a5-7a83330d1b78', '99/9', 11, '2024-05-12'),
(9, '8ff1804f-1f40-406c-a4a5-7a83330d1b78', '1199*3', 3597, '2024-05-12'),
(10, 'f0326f98-fd2c-4114-81dc-74951cb5bb3a', '9*9', 81, '2024-05-12'),
(11, 'f0326f98-fd2c-4114-81dc-74951cb5bb3a', '25*5', 125, '2024-05-12'),
(12, '48c54505-c0a7-47de-b8f5-b50ad187e2c6', '88-3', 85, '2024-05-12'),
(13, '48c54505-c0a7-47de-b8f5-b50ad187e2c6', '8.5*6', 51, '2024-05-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` varchar(250) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `level`) VALUES
('48c54505-c0a7-47de-b8f5-b50ad187e2c6', 'roni', '$2y$10$YUYIOGMp.tNwH5tXJ6ZbmuLQjLAunAi8ToTkUvQrBOu27MDaqzj0K', 'roni@gmail.com', '0'),
('49b761b2-2e9b-401f-8361-e14c54b2d7d6', 'blue by you', '$2y$10$w.spuCth/AeBebHoz0D26.rlyfc58lnTGa2EPgyeswFpEzTxg04Ze', 'blue@gmail.com', '0'),
('f0326f98-fd2c-4114-81dc-74951cb5bb3a', 'isa', '$2y$10$2QG88tV4Ev0NjU8jdRLruep.IHavWJwjwZxIjXOuQa77gAhOWkcgi', 'isagaul1z2@gmail.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_berat`
--
ALTER TABLE `log_berat`
  ADD PRIMARY KEY (`id_berat`);

--
-- Indeks untuk tabel `log_kalkulator`
--
ALTER TABLE `log_kalkulator`
  ADD PRIMARY KEY (`Id_kalkulator`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_berat`
--
ALTER TABLE `log_berat`
  MODIFY `id_berat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `log_kalkulator`
--
ALTER TABLE `log_kalkulator`
  MODIFY `Id_kalkulator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
