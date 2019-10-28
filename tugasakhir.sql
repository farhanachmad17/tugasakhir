-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Okt 2019 pada 06.55
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketinggian`
--

CREATE TABLE `ketinggian` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `ketinggianair` float NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ketinggian`
--

INSERT INTO `ketinggian` (`id`, `tanggal`, `waktu`, `ketinggianair`, `status`) VALUES
(1, '2019-06-30', '00:00:00', 211, 'Siaga 4'),
(2, '2019-06-24', '01:00:00', 79, 'Siaga 1'),
(7, '2019-06-30', '02:00:00', 150, 'Siaga 3'),
(8, '2019-06-30', '03:00:00', 220, 'Siaga 1'),
(9, '2019-06-30', '04:00:00', 78, 'Siaga 4'),
(10, '2019-06-24', '04:00:00', 98, 'Siaga 3'),
(11, '2019-06-25', '06:00:00', 200, 'Siaga 2'),
(12, '2019-06-25', '06:00:00', 200, 'Siaga 2'),
(13, '2019-07-02', '08:00:00', 200, 'Siaga 2'),
(14, '2019-07-02', '09:00:00', 200, 'Siaga 2'),
(15, '2019-07-02', '10:00:00', 200, 'Siaga 2'),
(16, '2019-07-02', '11:00:00', 256, 'Siaga 2'),
(17, '2019-07-02', '12:00:00', 200, 'Siaga 2'),
(18, '2019-07-02', '13:00:00', 200, 'Siaga 2'),
(19, '2019-07-02', '14:00:00', 200, 'Siaga 2'),
(20, '2019-07-02', '15:00:00', 200, 'Siaga 2'),
(21, '2019-07-02', '16:00:00', 200, 'Siaga 2'),
(22, '2019-07-02', '17:00:00', 200, 'Siaga 2'),
(23, '2019-07-02', '18:00:00', 200, 'Siaga 2'),
(24, '2019-07-02', '19:00:00', 200, 'Siaga 2'),
(25, '2019-07-02', '20:00:00', 200, 'Siaga 2'),
(26, '2019-07-02', '21:00:00', 200, 'Siaga 2'),
(27, '2019-07-02', '22:00:00', 200, 'Siaga 2'),
(28, '2019-07-02', '23:00:00', 200, 'Siaga 2'),
(29, '0000-00-00', '00:00:00', 221, ''),
(30, '2019-07-10', '18:00:00', 221, 'Siaga 2'),
(31, '0000-00-00', '00:00:00', 155, ''),
(32, '0000-00-00', '00:00:00', 135, ''),
(33, '0000-00-00', '00:00:00', 160, 'Siaga 3'),
(34, '0000-00-00', '00:00:00', 150, 'Siaga 3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ketinggian`
--
ALTER TABLE `ketinggian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `ketinggian`
--
ALTER TABLE `ketinggian`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
