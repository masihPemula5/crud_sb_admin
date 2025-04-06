-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 11:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'ADM'),
(2, 'ITK'),
(3, 'KDG'),
(4, 'KBI'),
(9, 'apa abelah'),
(10, 'ppp'),
(11, 'Informatika'),
(12, 'jjj'),
(13, 'pp'),
(14, 'Mang oyag');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan2`
--

CREATE TABLE `jurusan2` (
  `id` int(11) NOT NULL,
  `nama_jurusan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jurusan2`
--

INSERT INTO `jurusan2` (`id`, `nama_jurusan`) VALUES
(1, 'ITK GEL 1'),
(8, 'INFORMATIKA'),
(10, 'ILMU KOMPUTER'),
(11, 'Manajemen'),
(13, 'INFORMATIKA'),
(16, 'hukum'),
(24, 'Akuntansi'),
(25, 'Teknik');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `id_jurusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama`, `nim`, `email`, `nomor`, `id_jurusan`) VALUES
(365, 'Hercules', '2411070002', 'contoh@gmail.com', '085632663263', 1),
(367, 'Rendy Irawan', '241109', 'i@gmail.com', '0858846363333', 2);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa_backup`
--

CREATE TABLE `mahasiswa_backup` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nim` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE `mhs` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`id`, `nama`, `nim`, `email`, `nomor`, `jurusan_id`) VALUES
(11, 'Rendy Irawan', '2411070002', 'contoh@gmail.com', '97867', 11),
(13, 'kampret', '241109', 'contoh@gmail.com', '97867', 8),
(14, 'Rendi Psl 18', '2411070002', 'rendyakun50@gmail.com', '085885497377', 10),
(15, 'King Rendy', '2411070002', 'rendyakun50@gmail.com', '4344334', 25),
(16, 'Hercules', '2411070002', 'rendyakun50@gmail.com', '435555', 11);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_pict` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `profile_pict`, `role`) VALUES
(94, 'Admin', '$2y$10$kaWmXab6.6WPVv4m76HTAuP2oDHgNOFPL6ijsd0aXfnivx4TtFgUO', 'r@gmail.com', 'uploads/67755a6aac731_WIN_20250101_16_52_07_Pro.jpg', 'admin'),
(95, 'Rendy', '$2y$10$oLwhwPYzLQjuM8rTg7zcpeYWo4VBjdD2Kl80tYz4abhTPNWTmH4By', 'q@gmail.com', '', 'user'),
(96, 'masihPemula5', '', 'Email tidak tersedia', '', 'user'),
(97, 'Muhammad Syafiq', '', 'musyar2022@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocLn4NgrtZ0GclPOheUmvYp3Y9hjcaNO5OWpHSc47uyYWmuQoaje=s96-c', 'user'),
(98, 'ia', '$2y$10$O1zd1XGibvExumdlEw2QT.fLQTsGVnPUjz2ZFigWtcAT/DmKYfTae', 'a@gmail.com', 'uploads/6775660cb5717_vagabond-miyamoto-1920x1080-15138.jpg', 'user'),
(99, 'Rendi', '', 'rendyakun50@gmail.com', 'https://lh3.googleusercontent.com/a/ACg8ocJYFo-igGJndZYaIZB0UHPE5qPtnebQUSuF2PAfu4LzWAkYUjY=s96-c', 'user'),
(100, 'Rere', '$2y$10$2LYEs3nn0vATHiXsfdtAHuLcLeK8zJTplx654rD5t6XCwfbT/O5DO', 'e@gmail.com', '', 'user'),
(101, 'rendi', '$2y$10$FLDQp5CoJM7d19aA/rCwR.8BD9cYihvfo5TA.XARe1LteWsQH1ULC', 'r@gmail.com', '', 'user'),
(102, 'pain', '$2y$10$y0yLqCL3Q0xy4jAz.jnTyerP4Y00NwQHEHblSik0/dU/bDvuSIHkG', 'pais@gmail.com', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `jurusan2`
--
ALTER TABLE `jurusan2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `mahasiswa_backup`
--
ALTER TABLE `mahasiswa_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mhs`
--
ALTER TABLE `mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jurusan2`
--
ALTER TABLE `jurusan2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `mahasiswa_backup`
--
ALTER TABLE `mahasiswa_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;

--
-- AUTO_INCREMENT for table `mhs`
--
ALTER TABLE `mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mhs`
--
ALTER TABLE `mhs`
  ADD CONSTRAINT `mhs_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan2` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
