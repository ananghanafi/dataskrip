-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2019 at 08:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dataskripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `nip` varchar(32) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dosen`
--

INSERT INTO `tb_dosen` (`nip`, `nama`) VALUES
('', ''),
('057801172', 'Febrian Murti Dewanto, SE, M. Kom'),
('147801434', 'Khoiriya Latifah, S. Kom, M. Kom'),
('148201433', 'Bambang Agus H, S. Kom, M. Kom'),
('158801493', 'Mega Novita, Ph.D'),
('1954101519820031003', 'Drs. Bambang Supriyadi, MP'),
('196209191994031003', 'Ir. Agung Handayanto, M. Kom');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelengkapan`
--

CREATE TABLE `tb_kelengkapan` (
  `npm` varchar(16) NOT NULL,
  `hardcopy_poster` tinyint(1) NOT NULL DEFAULT '0',
  `manual_book` tinyint(1) NOT NULL DEFAULT '0',
  `softcopy_skripsi` tinyint(1) NOT NULL DEFAULT '0',
  `softcopy_artikel` tinyint(1) NOT NULL DEFAULT '0',
  `softcopy_poster` tinyint(1) NOT NULL DEFAULT '0',
  `sumbangan_buku` tinyint(1) NOT NULL DEFAULT '0',
  `sertifikat_toefl` tinyint(1) NOT NULL DEFAULT '0',
  `cd_skripsi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelengkapan`
--

INSERT INTO `tb_kelengkapan` (`npm`, `hardcopy_poster`, `manual_book`, `softcopy_skripsi`, `softcopy_artikel`, `softcopy_poster`, `sumbangan_buku`, `sertifikat_toefl`, `cd_skripsi`) VALUES
('14670006', 1, 1, 1, 1, 1, 1, 1, 1),
('14670029', 0, 0, 0, 0, 0, 0, 0, 0),
('14670030', 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `kode_prodi` varchar(5) NOT NULL,
  `nama_prodi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`kode_prodi`, `nama_prodi`) VALUES
('20201', 'Teknik Elektro S1'),
('20401', 'Teknik Elektronika D3'),
('21201', 'Teknik Mesin S1'),
('21401', 'Teknik Mesin D3'),
('22201', 'Teknik Sipil S1'),
('22401', 'Teknik Sipil D3'),
('23201', 'Arsitektur S1'),
('41221', 'Teknologi Pangan S1'),
('55201', 'Informatika S1'),
('61201', 'Manajemen S1'),
('74201', 'Hukum S1'),
('83207', 'Pendidikan Teknologi Informasi S1'),
('84202', 'Pendidikan Matematika S1'),
('84203', 'Pendidikan Fisika S1'),
('84205', 'Pendidikan Biologi S1'),
('85201', 'Pendidikan Jasmani, Kesehatan dan Rekreasi S1'),
('86104', 'Manajemen Pendidikan S2'),
('86201', 'Bimbingan dan Konseling S1'),
('86206', 'Pendidikan Guru Sekolah Dasar S1'),
('86207', 'Pendidikan Guru Pendidikan Anak Usia Dini S1'),
('87203', 'Pendidikan Ekonomi S1'),
('87205', 'Pendidikan Pancasila Dan Kewarganegaraan S1'),
('88101', 'Pendidikan Bahasa dan Sastra Indonesia S2'),
('88201', 'Pendidikan Bahasa Dan Sastra Indonesia S1'),
('88202', 'Pendidikan Bahasa dan Sastra Daerah S1'),
('88203', 'Pendidikan Bahasa Inggris S1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ruang`
--

CREATE TABLE `tb_ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ruang`
--

INSERT INTO `tb_ruang` (`id_ruang`, `nama_ruang`) VALUES
(1, 'GP601'),
(2, 'GP602'),
(3, 'GP603'),
(4, 'GP604'),
(5, 'GP605'),
(6, 'GP606'),
(7, 'GP607'),
(8, 'GP608'),
(9, 'GP609');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ujian_skripsi`
--

CREATE TABLE `tb_ujian_skripsi` (
  `npm` varchar(16) NOT NULL DEFAULT '',
  `nama` varchar(128) NOT NULL DEFAULT '',
  `prodi` varchar(128) NOT NULL DEFAULT '',
  `judul` varchar(512) NOT NULL DEFAULT '',
  `tanggal` varchar(32) NOT NULL DEFAULT '',
  `jam` varchar(8) NOT NULL DEFAULT '',
  `ruang` varchar(8) NOT NULL DEFAULT '',
  `status` varchar(16) NOT NULL DEFAULT '',
  `nip_ketua` varchar(32) NOT NULL DEFAULT '',
  `nip_sekretaris` varchar(32) NOT NULL DEFAULT '',
  `nip_penguji1` varchar(32) NOT NULL DEFAULT '',
  `nip_penguji2` varchar(32) NOT NULL DEFAULT '',
  `nip_penguji3` varchar(32) NOT NULL DEFAULT '',
  `status_data` varchar(32) NOT NULL DEFAULT 'BARU',
  `status_berkas` varchar(32) NOT NULL DEFAULT 'BARU',
  `berkas_skripsi` varchar(128) NOT NULL DEFAULT '',
  `foto_usulan` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ujian_skripsi`
--

INSERT INTO `tb_ujian_skripsi` (`npm`, `nama`, `prodi`, `judul`, `tanggal`, `jam`, `ruang`, `status`, `nip_ketua`, `nip_sekretaris`, `nip_penguji1`, `nip_penguji2`, `nip_penguji3`, `status_data`, `status_berkas`, `berkas_skripsi`, `foto_usulan`) VALUES
('14670006', 'Agung Nur Wahyudi', 'Informatika S1', 'Sistem Pendukung Keputusan Penentu Status Warga Dengan Metode Simple Multi Atribute Rotin Technique (SMART) Di Desa Tawangsari Rembang', 'Selasa, 04 Desember 2018', '16:00', 'GP609', 'Ke-1', '1954101519820031003', '057801172', '158801493', '196209191994031003', '147801434', 'BELUM VALID', 'VALID', 'upload/14670006/berkas_14670006.zip', 'upload/14670006/foto_usulan_14670006.jpeg'),
('14670029', 'Novita Suryani', 'Informatika S1', 'Sistem Informasi Penjualan Persediaan Tapioka Pada UD. Lestari Jaya Dengan Model Web', 'Jumat, 07 Desember 2018', '9:00', 'GP609', 'Ke-1', '057801172', '147801434', '158801493', '1954101519820031003', '148201433', 'BELUM VALID', 'BELUM VALID', '', ''),
('14670030', 'Agus', 'Informatika S1', '', '', '', '', '', '', '', '', '', '', 'DALAM PEMERIKSAAN', 'BELUM VALID', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `password` varchar(100) NOT NULL,
  `prodi` varchar(128) NOT NULL,
  `profpic` varchar(100) NOT NULL DEFAULT 'dist/img/user.png',
  `role` varchar(10) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `nama`, `password`, `prodi`, `profpic`, `role`) VALUES
('14670006', 'Agung Nur Wahyudi', 'student123', 'Informatika S1', 'dist/img/user.png', 'student'),
('14670029', 'Novita Suryani', 'student123', 'Informatika S1', 'dist/img/user.png', 'student'),
('14670030', 'Agus', 'student123', 'Informatika S1', 'dist/img/user.png', 'student'),
('admin1', 'Admin 1', 'admin123', '', 'dist/img/user2-160x160.jpg', 'admin'),
('admin2', 'Admin 2', 'admin123', '', 'dist/img/user1-128x128.jpg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_kelengkapan`
--
ALTER TABLE `tb_kelengkapan`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `tb_ujian_skripsi`
--
ALTER TABLE `tb_ujian_skripsi`
  ADD PRIMARY KEY (`npm`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ruang`
--
ALTER TABLE `tb_ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
