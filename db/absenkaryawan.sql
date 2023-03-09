-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 10:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absenkaryawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jam_keluar`
--

CREATE TABLE `jam_keluar` (
  `id` int(11) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jam_keluar`
--

INSERT INTO `jam_keluar` (`id`, `jam`) VALUES
(1, '5');

-- --------------------------------------------------------

--
-- Table structure for table `jam_masuk`
--

CREATE TABLE `jam_masuk` (
  `id` int(11) NOT NULL,
  `jam_masuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jam_masuk`
--

INSERT INTO `jam_masuk` (`id`, `jam_masuk`) VALUES
(1, '0900');

-- --------------------------------------------------------

--
-- Table structure for table `tb_absen`
--

CREATE TABLE `tb_absen` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `tanggal` text NOT NULL,
  `bulan` varchar(255) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `kehadiran` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jam` text NOT NULL,
  `jam2` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `absen_masuk` varchar(255) NOT NULL,
  `absen_keluar` varchar(255) NOT NULL,
  `jam_keluar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_absen`
--

INSERT INTO `tb_absen` (`id`, `nip`, `nama`, `tanggal`, `bulan`, `tahun`, `keterangan`, `kehadiran`, `alasan`, `foto`, `jam`, `jam2`, `latitude`, `longitude`, `absen_masuk`, `absen_keluar`, `jam_keluar`) VALUES
(76, '2191919191', 'user 1', '04-03-2023', 'Maret', '2023', 'null', 'Hadir', 'null', 'null', '08:57', '0857', '-6.9491', '107.844', '1', '0', '00.00'),
(77, '2132323232', 'user 2', '04-03-2023', 'Maret', '2023', 'null', 'Hadir', 'null', 'null', '09:34', '0934', '-6.9491', '107.844', '1', '0', '00.00'),
(78, '28938932', 'karyawan', '04-03-2023', 'Maret', '2023', 'Ijin', '', 'saya izin pak', '607-b55282f0-234d-42e5-86d5-be9f47777269.jpg', '09:37', '0937', '', '', '', '', ''),
(79, '293203103', 'nemesis', '04-03-2023', 'Maret', '2023', 'null', 'Hadir', 'null', 'null', '09:43', '0943', '-6.9491', '107.844', '1', '0', '00.00'),
(81, '2132323234', 'karyawan 2', '04-03-2023', 'Maret', '2023', 'Sakit', '', 'misal saat ini sakit xxxxxx', '528-b55282f0-234d-42e5-86d5-be9f47777269.jpg', '10:09', '1009', '', '', '', '', ''),
(82, '01234567', 'karyawan 3', '04-03-2023', 'Maret', '2023', 'null', 'Hadir', 'null', 'null', '10:22', '1022', '-6.9491', '107.844', '1', '0', '00.00'),
(83, '210101010132', 'karyawan 4', '04-03-2023', 'Maret', '2023', 'null', 'Hadir', 'null', 'null', '11:07', '1107', '-6.9491', '107.844', '1', '0', '00.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `kontak` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `username`, `password`, `nama`, `kontak`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin absensi karyawan', 'adminabsensi@email.com', '555-admin logoZ.jpg'),
(191203, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'admin 2', 'admin2@gmail.com', ''),
(191204, 'admin3', '32cacb2f994f6b42183a1300d9a3e8d6', 'admin 3', 'admin3@gmail.com', ''),
(191205, 'admin4', 'fc1ebc848e31e0a68e868432225e3c82', 'admin 4', 'admin4@gmail.com', ''),
(191206, 'admin_absensi', '3bed30488a8279015c49c7041c71d04a', 'admin absensi', 'admin_absensi@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` text NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `nip`, `username`, `password`, `nama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kontak`, `foto`) VALUES
(23, '28938932', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan', 'Jakarta Pusat', '2020-12-16', 'Jakarta Pusat', 'Aldo@gmail.com', ''),
(25, '191202191202', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Kliment Voroshilov', 'Bogor', '2020-12-15', 'Klapanunggal', 'zibran@gmail.com', '897-gray_blank.png'),
(26, '321029118283033', 'ucup', '1e17778d0d8217b035daffba02c06054', 'ucup', 'Bogor', '1991-12-01', 'banten', 'ucup@gmail.com', ''),
(28, '32102911828304', 'zibranovan', '12f44e800d8a743233bd56563a717a82', 'zibranovan', 'Bogor', '2002-12-22', 'Perumahan Bukit Cileungsi Indah\r\nBlok A2 No 3', 'ucup@gmail.com', ''),
(29, '293203103', 'nemesis', '59606609c6f2b0f4ac81167fe123c3f1', 'nemesis', 'Bogor', '2022-09-10', 'bogor', '0895330131417', '28-WhatsApp Image 2022-09-03 at 11.50.30 AM(1).png'),
(30, '2191919191', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'user 1', 'Bogor', '2023-03-04', 'Bogor', '081283882934', ''),
(31, '2132323232', 'user2', '7e58d63b60197ceb55a1c487989a3720', 'user 2', 'Jakarta', '2002-02-04', 'Jakarta', 'user2@gmail.com', ''),
(32, '2132323234', 'karyawan2', '0f04e83af329b915fd20112b50b11e9e', 'karyawan 2', 'Jakarta', '2022-11-09', 'Jakarta', 'karyawan2@gmail.com', ''),
(33, '01234567', 'karyawan3', '3e58a844e85f196e2af48dec548d300e', 'karyawan 3', 'Bandung', '2022-12-07', 'Bandung', 'karyawan3@gmail.com', ''),
(34, '210101010132', 'karyawan4', '4266c7e9ae545f9b0a891b7ef86d4886', 'karyawan 4', 'Bali', '2023-03-01', 'Bali', 'karyawan4@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keterangan`
--

CREATE TABLE `tb_keterangan` (
  `id` int(11) NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `keterangan` text NOT NULL,
  `alasan` text NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jam_keluar`
--
ALTER TABLE `jam_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam_masuk`
--
ALTER TABLE `jam_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_absen`
--
ALTER TABLE `tb_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jam_keluar`
--
ALTER TABLE `jam_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jam_masuk`
--
ALTER TABLE `jam_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_absen`
--
ALTER TABLE `tb_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191207;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_keterangan`
--
ALTER TABLE `tb_keterangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
