-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 16.40
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xboxconsole`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_user`, `username`, `password`) VALUES
(1, 'Wilson', '$2y$10$Ex23lNeiKO8AO84G.Dzs9ucOzWPHT4PKeJsjj1lZnpvnZFk5b0nES'),
(2, 'Agus', '$2y$10$gUFyxDDGRtVOrWuS7cA6sOmjJr5rSBg.OZHz46rAAXgCaxmMq/5nC'),
(3, 'Nabil', '$2y$10$wNjT/dDyToz1zI6ZSMdsS.lxURmTh2HpEZD9VeVE4N3Rj9D6GZiGS'),
(4, 'qwe', '$2y$10$iWKW4hBp8UJdgWAjIRySFOKypIJrSnBJ4RSQIP0o.6dEHo/9lbosy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `id_item` int(11) NOT NULL,
  `jumlah` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction`
--

CREATE TABLE `transaction` (
  `id_transaksi` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaction`
--

INSERT INTO `transaction` (`id_transaksi`, `username`, `tanggal`, `totalprice`) VALUES
(5, 0, 2023, 489);

-- --------------------------------------------------------

--
-- Struktur dari tabel `xbox`
--

CREATE TABLE `xbox` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `xbox`
--

INSERT INTO `xbox` (`id`, `nama`, `stok`, `harga`, `spesifikasi`, `role`, `gambar`) VALUES
(7, 'Headset', 10, '489,999', 'Bluetooth version 5.2 ; Bluetooth profiles A2DP 1.3, HFP 1.8 ; Bluetooth frequency 2400 MHz - 2483.5 MHz ;', 'accessoris', '2023-11-15 Headset.jpg'),
(9, 'JBL Quantum 910X Wireless for Xbox', 10, '100', 'Bluetooth version 5.2 ; Bluetooth profiles A2DP 1.3, HFP 1.8 ; Bluetooth frequency 2400 MHz - 2483.5 MHz ;', 'accessoris', '2023-11-15 JBL Quantum 910X Wireless for Xbox.jpg'),
(10, 'Xbox Super ', 120, '120', 'Keren Bang', 'console', '2023-11-16 Xbox Super .jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `xbox`
--
ALTER TABLE `xbox`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `xbox`
--
ALTER TABLE `xbox`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
