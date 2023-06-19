-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 02:22 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magang`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `ID_ABSEN` int(11) NOT NULL,
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `KEGIATAN` varchar(2000) NOT NULL,
  `TANGGAL_ABSEN` date NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`ID_ABSEN`, `ID_PENDAFTARAN`, `KEGIATAN`, `TANGGAL_ABSEN`, `STATUS`) VALUES
(2, 7, 'Memperbaiki halaman login', '2023-06-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bimbingan`
--

CREATE TABLE `bimbingan` (
  `ID_BIMBINGAN` int(11) NOT NULL,
  `ID_PEMBIMBING` int(11) NOT NULL,
  `CATATAN_MHS` varchar(2000) NOT NULL,
  `CATATAN_DSN` varchar(2000) NOT NULL,
  `FILE_MHS` varchar(2000) NOT NULL,
  `FILE_DSN` varchar(2000) NOT NULL,
  `TANGGAL_BIMBINGAN` date NOT NULL DEFAULT current_timestamp(),
  `STATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bimbingan`
--

INSERT INTO `bimbingan` (`ID_BIMBINGAN`, `ID_PEMBIMBING`, `CATATAN_MHS`, `CATATAN_DSN`, `FILE_MHS`, `FILE_DSN`, `TANGGAL_BIMBINGAN`, `STATUS`) VALUES
(4, 2, 'Bab 1', 'catatan dari pak dosen', 'http://localhost/magang/assets/documents/bimbingan/Basis_Data_-_Modul_4.pdf', 'http://localhost/magang/assets/documents/bimbinganDosen/Toefl1.pdf', '2023-06-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `ID_LOWONGAN` int(11) NOT NULL,
  `JUDUL` varchar(100) NOT NULL,
  `DESKRIPSI_LOWONGAN` varchar(2000) NOT NULL,
  `KUOTA` int(11) NOT NULL,
  `USERNAME` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`ID_LOWONGAN`, `JUDUL`, `DESKRIPSI_LOWONGAN`, `KUOTA`, `USERNAME`) VALUES
(1, 'WEB DEVELOPER', 'Full Stack Developer(Django)Overview\r\n\r\nIndental Clinic is looking for a Full Stack Developer. Established in 2011, Indental Clinic has served over 15,000 clients and has a team of more than 20 professional dentists.\r\n\r\nAs a Full Stack Developer, you will be responsible for building and maintaining our custom software used in the clinic. This is a mostly remote position, but you will need to complete a daily work log that matches your work progress and visit the clinic if testing/support is needed on field. We are looking for candidates who have a growth mindset, can work efficiently without being micro-managed, and respect their deadlines.\r\n\r\nJob Details\r\n• Develop, deploy and maintain software applications using Django, DRF.\r\n• Infrastructure: AWS(rout53, elasticBeanstalk, cloudwatch, s3, rds)\r\n• Backend: Nginx, Django, DRF, Celery, Redis, Crons and Postgresql\r\n• Frontend: TailwindCSS, Web Component, AlpineJS, Webpack, Jquery(legacy), bootstrap4(legacy)', 5, 'perusahaan'),
(2, 'Android Developer 2', 'Kerja rodi bos 2', 10, 'perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `ID_PEMBIMBING` int(11) NOT NULL,
  `USERNAME_MHS` varchar(16) NOT NULL,
  `USERNAME_DSN` varchar(16) NOT NULL,
  `FILE_AKHIR` varchar(2000) NOT NULL,
  `NILAI` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`ID_PEMBIMBING`, `USERNAME_MHS`, `USERNAME_DSN`, `FILE_AKHIR`, `NILAI`) VALUES
(2, 'mahasiswa', 'dosen', 'http://localhost/magang/assets/documents/laporan/CV_Muhammad_Reyhan_Firnas_Adani_(2023).pdf', '100');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `USERNAME` varchar(16) NOT NULL,
  `ID_LOWONGAN` int(11) NOT NULL,
  `DOKUMEN_PENDUKUNG` varchar(2000) NOT NULL,
  `NILAI` varchar(3) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PENDAFTARAN`, `USERNAME`, `ID_LOWONGAN`, `DOKUMEN_PENDUKUNG`, `NILAI`, `STATUS`) VALUES
(7, 'mahasiswa', 1, 'http://localhost/magang/assets/documents/register/Basis_Data_-_Modul_11.pdf', '100', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID_ROLE` int(11) NOT NULL,
  `ROLE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID_ROLE`, `ROLE`) VALUES
(1, 'Mahasiswa'),
(2, 'Dosen'),
(3, 'Admin'),
(4, 'Perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USERNAME` varchar(16) NOT NULL,
  `NAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(16) NOT NULL,
  `ID_ROLE` int(11) NOT NULL,
  `ALAMAT` varchar(2000) NOT NULL,
  `DESKRIPSI` varchar(2000) NOT NULL,
  `FOTO` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USERNAME`, `NAME`, `PASSWORD`, `ID_ROLE`, `ALAMAT`, `DESKRIPSI`, `FOTO`) VALUES
('admin', 'admin', '123', 3, '', '', ''),
('dosen', 'dosen', '123', 2, 'alamat dosen', '', ''),
('mahasiswa', 'Mahasiswa', '123', 1, 'alamat mahasiswa', '', 'http://localhost/magang/assets/img/undraw_empty_xct9.png'),
('perusahaan', 'perusahaan', '123', 4, 'Alamat Perusahaan', 'Deskripsi Perusahaan', 'http://localhost/magang/assets/img/undraw_empty_xct9.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID_ABSEN`);

--
-- Indexes for table `bimbingan`
--
ALTER TABLE `bimbingan`
  ADD PRIMARY KEY (`ID_BIMBINGAN`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`ID_LOWONGAN`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`ID_PEMBIMBING`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PENDAFTARAN`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID_ROLE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bimbingan`
--
ALTER TABLE `bimbingan`
  MODIFY `ID_BIMBINGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `ID_LOWONGAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `ID_PEMBIMBING` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `ID_PENDAFTARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID_ROLE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
