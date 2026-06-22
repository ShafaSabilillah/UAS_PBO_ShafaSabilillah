-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2026 at 06:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1c_shafasabilillah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_karyawan`
--

CREATE TABLE `tabel_karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `hari_kerja_masuk` int NOT NULL,
  `gaji_dasar_per_hari` decimal(12,2) NOT NULL,
  `jenis_karyawan` enum('Kontrak','Tetap','Magang') NOT NULL,
  `durasi_kontrak_bulan` int DEFAULT NULL,
  `agensi_penyalur` varchar(100) DEFAULT NULL,
  `tunjangan_kesehatan` decimal(12,2) DEFAULT NULL,
  `opsi_saham_id` varchar(50) DEFAULT NULL,
  `uang_saku_bulanan` decimal(12,2) DEFAULT NULL,
  `sertifikat_kampus_merdeka` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_karyawan`
--

INSERT INTO `tabel_karyawan` (`id_karyawan`, `nama_karyawan`, `departemen`, `hari_kerja_masuk`, `gaji_dasar_per_hari`, `jenis_karyawan`, `durasi_kontrak_bulan`, `agensi_penyalur`, `tunjangan_kesehatan`, `opsi_saham_id`, `uang_saku_bulanan`, `sertifikat_kampus_merdeka`) VALUES
('KARY-K001', 'Hendra Wijaya', 'Operasional', 22, '180000.00', 'Kontrak', 12, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KARY-K002', 'Indah Permadi', 'Pemasaran', 20, '175000.00', 'Kontrak', 6, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KARY-K003', 'Joko Susilo', 'Teknologi Informasi', 22, '190000.00', 'Kontrak', 12, 'PT Solusi Asia', NULL, NULL, NULL, NULL),
('KARY-K004', 'Kurnia Bakti', 'Sumber Daya Manusia', 21, '170000.00', 'Kontrak', 6, 'PT Solusi Asia', NULL, NULL, NULL, NULL),
('KARY-K005', 'Larasati Putri', 'Pemasaran', 19, '175000.00', 'Kontrak', 6, 'PT Mitra Utama', NULL, NULL, NULL, NULL),
('KARY-K006', 'Muhammad Rizky', 'Teknologi Informasi', 22, '195000.00', 'Kontrak', 24, 'PT Tech Talent', NULL, NULL, NULL, NULL),
('KARY-K007', 'Nadia Utami', 'Keuangan', 20, '180000.00', 'Kontrak', 12, 'PT Tech Talent', NULL, NULL, NULL, NULL),
('KARY-M001', 'Oki Sanjaya', 'Teknologi Informasi', 20, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2500000.00', 'MSIB-BATCH-6/TI/01'),
('KARY-M002', 'Putri Amelia', 'Pemasaran', 18, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2500000.00', 'MSIB-BATCH-6/MKT/02'),
('KARY-M003', 'Qori Antika', 'Sumber Daya Manusia', 22, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2200000.00', NULL),
('KARY-M004', 'Rian Hidayat', 'Teknologi Informasi', 21, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2500000.00', 'MSIB-BATCH-6/TI/03'),
('KARY-M005', 'Siti Aminah', 'Keuangan', 19, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2200000.00', NULL),
('KARY-M006', 'Taufik Hidayat', 'Operasional', 20, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2000000.00', NULL),
('KARY-M007', 'Vina Panduwinata', 'Teknologi Informasi', 22, '0.00', 'Magang', NULL, NULL, NULL, NULL, '2500000.00', 'MSIB-BATCH-6/TI/04'),
('KARY-T001', 'Shafa Sabilillah', 'Teknologi Informasi', 22, '250000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-01', NULL, NULL),
('KARY-T002', 'Ahmad Fauzi', 'Teknologi Informasi', 21, '240000.00', 'Tetap', NULL, NULL, '500000.00', 'ESOP-02', NULL, NULL),
('KARY-T003', 'Citra Lestari', 'Sumber Daya Manusia', 22, '220000.00', 'Tetap', NULL, NULL, '450000.00', 'ESOP-03', NULL, NULL),
('KARY-T004', 'Deni Setiawan', 'Keuangan', 20, '230000.00', 'Tetap', NULL, NULL, '450000.00', 'ESOP-04', NULL, NULL),
('KARY-T005', 'Eka Rahmawati', 'Pemasaran', 22, '210000.00', 'Tetap', NULL, NULL, '400000.00', NULL, NULL, NULL),
('KARY-T006', 'Fahmi Idris', 'Operasional', 23, '200000.00', 'Tetap', NULL, NULL, '400000.00', NULL, NULL, NULL),
('KARY-T007', 'Gita Permata', 'Keuangan', 21, '230000.00', 'Tetap', NULL, NULL, '450000.00', 'ESOP-05', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_karyawan`
--
ALTER TABLE `tabel_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
