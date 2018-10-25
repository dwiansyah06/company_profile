-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2018 at 06:47 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sriwijaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`, `foto`) VALUES
(1, 'cupu450', 'indonesia', 'admin.jpg'),
(2, 'admin', 'indonesia', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(3) NOT NULL,
  `judul_berita` varchar(50) NOT NULL,
  `konten_berita` text NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `tgl_upload` date NOT NULL,
  `id_admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul_berita`, `konten_berita`, `gambar`, `tgl_upload`, `id_admin`) VALUES
(8, 'Berita 5', '<p>&nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.\r\n</p><p>&nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>', 'blog3.jpg', '2018-10-12', 1),
(9, 'Berita 6', '<p>&nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.\r\n</p><p>&nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>', 'blog2.jpg', '2018-10-12', 1),
(10, 'Berita 7', '<p style=\"text-align: justify; \">&nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.\r\n</p><p style=\"text-align: justify; \">&nbsp; &nbsp; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>', 'blog1.jpg', '2018-10-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(3) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `tanggal_upload` date NOT NULL,
  `id_admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `foto`, `tanggal_upload`, `id_admin`) VALUES
(13, 'background2.jpg', '2018-10-25', 1),
(15, 'background3.jpg', '2018-10-25', 1),
(16, 'background1.jpg', '2018-10-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kursus`
--

CREATE TABLE `kursus` (
  `id_kursus` int(2) NOT NULL,
  `judul_kursus` varchar(50) NOT NULL,
  `biaya_pendaftaran` int(6) NOT NULL,
  `biaya_kursus` int(6) NOT NULL,
  `pelaksanaan` int(3) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kursus`
--

INSERT INTO `kursus` (`id_kursus`, `judul_kursus`, `biaya_pendaftaran`, `biaya_kursus`, `pelaksanaan`, `icon`) VALUES
(3, 'Short Course Perhitungan Rencana Anggaran Biaya', 200000, 300000, 7, 'akun.png'),
(4, 'Short Course Geographic Information System (GIS)', 200000, 300000, 7, 'wisata.png'),
(5, 'Short Course Pengukuran / Total Station (ST)', 200000, 300000, 7, 'arsitektur.png'),
(6, 'Short Course Microsoft (MS) Office', 200000, 300000, 8, 'grafis.png'),
(7, 'Short Course Autocad 2 dimensi & 3 dimensi', 200000, 300000, 8, 'grafis1.png'),
(8, 'Short Course SPSS (STATISTIK)', 200000, 300000, 10, 'grafis2.png'),
(9, 'Short Course Komputer Akuntansi', 300000, 400000, 9, 'akun1.png'),
(10, 'Bimbingan Belajar bahasa inggris TOEFL', 200000, 300000, 9, 'inggris.png'),
(11, 'Bimbingan Belajar Untuk SD, SMP, SMA', 200000, 300000, 10, 'kehumasan.png'),
(12, 'Bimbingan Belajar Bahasa Inggris Untuk SD, SMP, SM', 200000, 300000, 10, 'kehumasan1.png'),
(13, 'Short Course Perhitungan struktur dengan SAP', 200000, 300000, 6, 'kehumasan2.png'),
(14, 'Short Course Perpajakan ', 200000, 300000, 10, 'akun2.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelatihan`
--

CREATE TABLE `pelatihan` (
  `id_pelatihan` int(2) NOT NULL,
  `judul_pelatihan` varchar(60) NOT NULL,
  `min_peserta` int(3) NOT NULL,
  `hari_latihan` int(2) NOT NULL,
  `harga_in_house` int(8) NOT NULL,
  `harga_off_house` int(8) NOT NULL,
  `icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelatihan`
--

INSERT INTO `pelatihan` (`id_pelatihan`, `judul_pelatihan`, `min_peserta`, `hari_latihan`, `harga_in_house`, `harga_off_house`, `icon`) VALUES
(6, 'Ahli Muda K3 Konstruksi', 20, 5, 4600000, 5000000, 'arsitektur.png'),
(7, 'Supervisor K3 Konstruksi', 25, 4, 3000000, 3400000, 'arsitektur1.png'),
(8, 'Juru Las Listrik', 20, 5, 2500000, 3000000, 'las.png'),
(9, 'Teknisi Perancah (scaffolder)', 30, 4, 3000000, 3400000, 'perbaikan.png'),
(10, 'Supervisor Perancah', 15, 5, 3900000, 4300000, 'kantor.png'),
(11, 'Basic Fire Fighting', 15, 1, 900000, 1050000, 'keselamatan.png'),
(12, 'Damkar Class B', 15, 6, 0, 5900000, 'keselamatan1.png'),
(13, 'Damkar Class C', 15, 6, 5950000, 0, 'keselamatan2.png'),
(14, 'Damkar Class D', 15, 3, 3400000, 3900000, 'keselamatan3.png'),
(15, 'Pelatihan AK3 Umum', 20, 12, 6000000, 6900000, 'keselamatan4.png'),
(16, 'Pelatihan Auditor SMK 3', 15, 3, 5500000, 5900000, 'akun.png'),
(17, 'Pelaksana Bangunan Gedung', 20, 3, 2200000, 2500000, 'arsitektur2.png'),
(18, 'SAP Programe (Privat)', 1, 3, 0, 2500000, 'kehumasan.png'),
(19, 'GIS Programe (Privat)', 1, 3, 0, 2500000, 'wisata.png'),
(20, 'Pelaksana Saluran Irigasi', 20, 3, 2200000, 2500000, 'arsitektur3.png'),
(21, 'Teknisi Jaringan Tegangan Rendah', 20, 3, 2200000, 2500000, 'support.png'),
(22, 'Pelaksana Lapangan Pekerjaan Jalan', 20, 3, 2200000, 2500000, 'keselamatan5.png'),
(24, 'Pelaksana Pekerjaan Limbah Pemukiman', 20, 3, 2200000, 2500000, 'arsitektur4.png'),
(26, 'P3K Tingkat Dasar (Basic First Aid)', 15, 1, 900000, 1000000, 'kehumasan1.png'),
(27, 'P3K Tingkat Lanjut (Advanced First Aid)', 30, 3, 2500000, 2900000, 'kehumasan2.png'),
(28, 'Confined Space (Bekerja diruang Tertutup)', 15, 5, 5000000, 5500000, 'kantor1.png'),
(29, 'Juru Ukur Menggunakan Teodolit dan alat ukur lainya	', 20, 3, 2200000, 2500000, 'arsitektur5.png'),
(31, 'Juru Gambar Dan AutoCad 2D / 3D Programe (Private)', 1, 3, 0, 2500000, 'grafis.png');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_kursus`
--

CREATE TABLE `siswa_kursus` (
  `id_siswa_kursus` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `nmr_hp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_kursus` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_kursus`
--

INSERT INTO `siswa_kursus` (`id_siswa_kursus`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nmr_hp`, `email`, `jenis_kursus`, `tanggal_daftar`, `foto`) VALUES
(1, 'Alex Danyluk', 'Virginia', '1990-01-12', 'laki-laki', 'New Jersey, Amerika Serikat', '098778909876', 'alex@gmail.com', 'Short Course SPSS (STATISTIK)', '2018-10-17', 'dwi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pelatihan`
--

CREATE TABLE `siswa_pelatihan` (
  `id_siswa_pelatihan` int(3) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `telp_perusahaan` varchar(15) NOT NULL,
  `email_perusahaan` varchar(40) NOT NULL,
  `alamat_pribadi` text NOT NULL,
  `email_pribadi` varchar(40) NOT NULL,
  `telp_pribadi` varchar(15) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(8) NOT NULL,
  `alergi` varchar(25) NOT NULL,
  `jenis_pelatihan` varchar(60) NOT NULL,
  `nama_sma` varchar(50) NOT NULL,
  `nama_d3` varchar(50) NOT NULL,
  `nama_s1` varchar(50) NOT NULL,
  `nama_s2` varchar(50) NOT NULL,
  `tahun_masuk` varchar(15) NOT NULL,
  `tahun_keluar` varchar(15) NOT NULL,
  `lama_kerja` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_pelatihan`
--

INSERT INTO `siswa_pelatihan` (`id_siswa_pelatihan`, `nama_siswa`, `nama_perusahaan`, `alamat_perusahaan`, `telp_perusahaan`, `email_perusahaan`, `alamat_pribadi`, `email_pribadi`, `telp_pribadi`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alergi`, `jenis_pelatihan`, `nama_sma`, `nama_d3`, `nama_s1`, `nama_s2`, `tahun_masuk`, `tahun_keluar`, `lama_kerja`, `jabatan`, `divisi`, `tgl_daftar`, `foto`) VALUES
(1, 'Dwiansyah Rhamadon', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Jalan pangeran ayin perumahan puspa sari Blok D7 RT9', 'dwiansyah.rhamadon06@gmail.com', '087865462222', 'palembang', '1997-01-16', 'islam', 'Tidak ada', 'Damkar Class B', 'Sma YPI Tunas Bangsa Palembang', 'Politeknnik Negeri Sriwijaya', 'Tidak Pernah Kuliah S1', 'Tidak Pernah Kuliah S2', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2018-10-15', 'dwi.jpg'),
(2, 'Kevin', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Tidak ada', 'Jalan', 'Kevin@gmail.com', '098987657890', 'palembang', '1997-01-16', 'islam', 'Tidak ada', 'Teknisi Jaringan Tegangan Rendah', 'Sma YPI Tunas Bangsa Palembang', 'Tidak Pernah Kuliah D3', 'Tidak Pernah Kuliah S1', 'Tidak Pernah Kuliah S2', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', 'Tidak Ada', '2018-10-16', 'bisa.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kursus`
--
ALTER TABLE `kursus`
  ADD PRIMARY KEY (`id_kursus`);

--
-- Indexes for table `pelatihan`
--
ALTER TABLE `pelatihan`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indexes for table `siswa_kursus`
--
ALTER TABLE `siswa_kursus`
  ADD PRIMARY KEY (`id_siswa_kursus`);

--
-- Indexes for table `siswa_pelatihan`
--
ALTER TABLE `siswa_pelatihan`
  ADD PRIMARY KEY (`id_siswa_pelatihan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kursus`
--
ALTER TABLE `kursus`
  MODIFY `id_kursus` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pelatihan`
--
ALTER TABLE `pelatihan`
  MODIFY `id_pelatihan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `siswa_kursus`
--
ALTER TABLE `siswa_kursus`
  MODIFY `id_siswa_kursus` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `siswa_pelatihan`
--
ALTER TABLE `siswa_pelatihan`
  MODIFY `id_siswa_pelatihan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
