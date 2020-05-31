-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Bulan Mei 2020 pada 09.11
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `mapel_id`, `kelas_id`, `tanggal`) VALUES
(148, 21, 30, '2020-05-07'),
(149, 21, 27, '2020-05-07'),
(150, 22, 27, '2020-05-07'),
(151, 21, 27, '2020-05-10'),
(152, 21, 27, '2020-05-05'),
(153, 21, 27, '2020-05-06'),
(154, 21, 27, '2020-06-09'),
(155, 21, 27, '2020-05-08'),
(156, 21, 30, '2020-05-11'),
(157, 21, 27, '2020-05-11'),
(158, 20, 30, '2020-05-11'),
(159, 21, 27, '2020-05-13'),
(160, 21, 30, '2020-05-13'),
(161, 20, 30, '2020-05-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_absen`
--

CREATE TABLE `detail_absen` (
  `id` int(11) NOT NULL,
  `absen_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `keterangan` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_absen`
--

INSERT INTO `detail_absen` (`id`, `absen_id`, `siswa_id`, `keterangan`) VALUES
(280, 148, 2, 'hadir'),
(281, 148, 3, 'hadir'),
(282, 148, 4, 'hadir'),
(283, 148, 13, 'hadir'),
(284, 148, 14, 'hadir'),
(285, 148, 15, 'hadir'),
(286, 148, 16, 'hadir'),
(287, 148, 17, 'hadir'),
(288, 148, 18, 'hadir'),
(289, 148, 19, 'hadir'),
(290, 148, 20, 'hadir'),
(291, 148, 21, 'hadir'),
(292, 148, 22, 'hadir'),
(293, 148, 5, 'hadir'),
(294, 148, 23, 'hadir'),
(295, 148, 24, 'hadir'),
(296, 148, 25, 'hadir'),
(297, 148, 26, 'hadir'),
(298, 148, 27, 'hadir'),
(299, 148, 28, 'hadir'),
(300, 148, 29, 'hadir'),
(301, 148, 30, 'hadir'),
(302, 148, 31, 'hadir'),
(303, 148, 32, 'alpa'),
(304, 148, 6, 'ijin'),
(305, 148, 7, 'ijin'),
(306, 148, 8, 'ijin'),
(307, 148, 9, 'hadir'),
(308, 148, 10, 'hadir'),
(309, 148, 11, 'alpa'),
(310, 148, 12, 'hadir'),
(311, 149, 1, 'hadir'),
(312, 150, 1, 'alpa'),
(313, 151, 1, 'sakit'),
(314, 152, 1, 'ijin'),
(315, 153, 1, 'alpa'),
(316, 154, 1, 'alpa'),
(317, 155, 1, 'ijin'),
(318, 156, 2, 'hadir'),
(319, 156, 3, 'hadir'),
(320, 156, 4, 'hadir'),
(321, 156, 13, 'hadir'),
(322, 156, 14, 'hadir'),
(323, 156, 15, 'hadir'),
(324, 156, 16, 'hadir'),
(325, 156, 17, 'hadir'),
(326, 156, 18, 'hadir'),
(327, 156, 19, 'hadir'),
(328, 156, 20, 'hadir'),
(329, 156, 21, 'hadir'),
(330, 156, 22, 'hadir'),
(331, 156, 5, 'hadir'),
(332, 156, 23, 'hadir'),
(333, 156, 24, 'hadir'),
(334, 156, 25, 'hadir'),
(335, 156, 26, 'hadir'),
(336, 156, 27, 'hadir'),
(337, 156, 28, 'hadir'),
(338, 156, 29, 'hadir'),
(339, 156, 30, 'hadir'),
(340, 156, 31, 'hadir'),
(341, 156, 32, 'hadir'),
(342, 156, 6, 'hadir'),
(343, 156, 7, 'hadir'),
(344, 156, 8, 'hadir'),
(345, 156, 9, 'hadir'),
(346, 156, 10, 'hadir'),
(347, 156, 11, 'hadir'),
(348, 156, 12, 'hadir'),
(349, 157, 1, 'hadir'),
(350, 158, 2, 'hadir'),
(351, 158, 3, 'hadir'),
(352, 158, 4, 'hadir'),
(353, 158, 13, 'hadir'),
(354, 158, 14, 'hadir'),
(355, 158, 15, 'hadir'),
(356, 158, 16, 'hadir'),
(357, 158, 17, 'hadir'),
(358, 158, 18, 'hadir'),
(359, 158, 19, 'hadir'),
(360, 158, 20, 'hadir'),
(361, 158, 21, 'hadir'),
(362, 158, 22, 'hadir'),
(363, 158, 5, 'hadir'),
(364, 158, 23, 'hadir'),
(365, 158, 24, 'hadir'),
(366, 158, 25, 'hadir'),
(367, 158, 26, 'hadir'),
(368, 158, 27, 'hadir'),
(369, 158, 28, 'hadir'),
(370, 158, 29, 'hadir'),
(371, 158, 30, 'hadir'),
(372, 158, 31, 'hadir'),
(373, 158, 32, 'hadir'),
(374, 158, 6, 'hadir'),
(375, 158, 7, 'hadir'),
(376, 158, 8, 'hadir'),
(377, 158, 9, 'hadir'),
(378, 158, 10, 'hadir'),
(379, 158, 11, 'hadir'),
(380, 158, 12, 'hadir'),
(381, 159, 1, 'alpa'),
(382, 160, 2, 'hadir'),
(383, 160, 3, 'hadir'),
(384, 160, 4, 'hadir'),
(385, 160, 13, 'hadir'),
(386, 160, 14, 'hadir'),
(387, 160, 15, 'hadir'),
(388, 160, 16, 'hadir'),
(389, 160, 17, 'hadir'),
(390, 160, 18, 'hadir'),
(391, 160, 19, 'hadir'),
(392, 160, 20, 'hadir'),
(393, 160, 21, 'hadir'),
(394, 160, 22, 'hadir'),
(395, 160, 5, 'hadir'),
(396, 160, 23, 'hadir'),
(397, 160, 24, 'hadir'),
(398, 160, 25, 'hadir'),
(399, 160, 26, 'hadir'),
(400, 160, 27, 'hadir'),
(401, 160, 28, 'hadir'),
(402, 160, 29, 'hadir'),
(403, 160, 30, 'hadir'),
(404, 160, 31, 'hadir'),
(405, 160, 32, 'hadir'),
(406, 160, 6, 'hadir'),
(407, 160, 7, 'hadir'),
(408, 160, 8, 'hadir'),
(409, 160, 9, 'hadir'),
(410, 160, 10, 'hadir'),
(411, 160, 11, 'hadir'),
(412, 160, 12, 'hadir'),
(413, 161, 2, 'hadir'),
(414, 161, 3, 'hadir'),
(415, 161, 4, 'hadir'),
(416, 161, 13, 'hadir'),
(417, 161, 14, 'hadir'),
(418, 161, 15, 'hadir'),
(419, 161, 16, 'hadir'),
(420, 161, 17, 'hadir'),
(421, 161, 18, 'hadir'),
(422, 161, 19, 'hadir'),
(423, 161, 20, 'hadir'),
(424, 161, 21, 'hadir'),
(425, 161, 22, 'hadir'),
(426, 161, 5, 'hadir'),
(427, 161, 23, 'hadir'),
(428, 161, 24, 'hadir'),
(429, 161, 25, 'hadir'),
(430, 161, 26, 'hadir'),
(431, 161, 27, 'hadir'),
(432, 161, 28, 'hadir'),
(433, 161, 29, 'hadir'),
(434, 161, 30, 'hadir'),
(435, 161, 31, 'hadir'),
(436, 161, 32, 'hadir'),
(437, 161, 6, 'hadir'),
(438, 161, 7, 'hadir'),
(439, 161, 8, 'hadir'),
(440, 161, 9, 'hadir'),
(441, 161, 10, 'hadir'),
(442, 161, 11, 'hadir'),
(443, 161, 12, 'hadir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id` int(11) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `ruang` varchar(25) NOT NULL,
  `hari` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`id`, `jadwal_id`, `mapel_id`, `jam_mulai`, `jam_selesai`, `ruang`, `hari`) VALUES
(18, 7, 25, '06:45:00', '07:30:00', 'Lapangan2', 'Senin'),
(20, 7, 20, '07:30:00', '08:00:00', 'Ruang 2', 'Senin'),
(21, 7, 20, '07:00:00', '08:00:00', 'Ruang 1', 'Selasa'),
(22, 6, 25, '07:00:00', '08:00:00', 'Lapangan', 'Senin'),
(23, 6, 21, '07:30:00', '09:40:00', 'Ruang 2', 'Selasa'),
(24, 9, 25, '07:00:00', '08:00:00', 'Lapangan', 'Senin'),
(25, 9, 21, '08:00:00', '10:00:00', 'Ruang 2', 'Senin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_mapel`
--

CREATE TABLE `detail_mapel` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_mapel`
--

INSERT INTO `detail_mapel` (`id`, `mapel_id`, `kelas_id`) VALUES
(134, 20, 33),
(138, 21, 33),
(139, 21, 30),
(140, 21, 32),
(141, 21, 35),
(142, 20, 30),
(143, 22, 27),
(144, 21, 27),
(145, 23, 33),
(146, 23, 30),
(147, 23, 31),
(148, 23, 34),
(149, 23, 32),
(150, 23, 36),
(151, 23, 35),
(152, 23, 27);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `id` int(11) NOT NULL,
  `nilai_pengetahuan` double NOT NULL,
  `nilai_keterampilan` double NOT NULL,
  `nilai_akhir` double NOT NULL,
  `predikat` char(2) NOT NULL,
  `nilai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_nilai`
--

INSERT INTO `detail_nilai` (`id`, `nilai_pengetahuan`, `nilai_keterampilan`, `nilai_akhir`, `predikat`, `nilai_id`) VALUES
(16, 90, 80, 83, 'B+', 12),
(17, 90, 29, 47, 'D', 13),
(18, 90, 90, 90, 'A', 14),
(19, 98, 78, 84, 'B+', 17),
(20, 99, 100, 100, 'A+', 18),
(21, 78, 85, 83, 'B+', 19),
(22, 60, 70, 67, 'C', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `gol_darah` char(3) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `jk`, `email`, `password`, `agama`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telpon`, `pendidikan`, `status`, `kewarganegaraan`) VALUES
(1, 'Markawi, S.Pd., M.M.', 'Laki-laki', 'markawi@gmail.com', '123456', 'Islam', 'A+', 'TANGERANG', '1982-01-24', 'Tangerang', '0894847383', 'S1 PENDIDIKAN SENI RUPA', 'Belum Menikah', 'WARGA NEGARA INDONESIA'),
(2, 'Elizabeth Sontiar,S.E.,M.Ak  ', 'Perempuan', 'elizabeth@gmail.com', '123456', 'Katolik', 'B+', 'TANGERANG', '2003-03-29', 'Tangerang', '0894847383', 'S1 PENDIDIKAN SENI RUPA', 'Menikah', 'WARGA NEGARA INDONESIA'),
(3, '-', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `kelas_id`) VALUES
(9, 27),
(6, 30),
(7, 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusan`
--

CREATE TABLE `jurusan` (
  `id` int(11) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurusan`
--

INSERT INTO `jurusan` (`id`, `jurusan`) VALUES
(3, 'TEKNIK KOMPUTER DAN JARINGAN'),
(4, 'OTOMATISASI DAN TATAKELOLA PERKANTORAN (OTKP)'),
(5, 'AKUNTANSI DAN KEUANGAN LEMBAGA (AKL)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `jurusan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `jurusan_id`) VALUES
(27, 'XII TKJ 4', 3),
(30, 'X OTKP 1', 4),
(31, 'X OTKP 2', 4),
(32, 'X TKJ 1', 3),
(33, 'X AKL 1', 5),
(34, 'X OTKP 3', 4),
(35, 'XI OTKP 1', 4),
(36, 'X TKJ 2', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `mapel` varchar(100) NOT NULL,
  `guru_id` int(11) DEFAULT NULL,
  `produktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `mapel`, `guru_id`, `produktif`) VALUES
(20, 'Praktikum Akuntansi Perusahaan Jasa, Dagang dan Manufaktur', 1, 1),
(21, 'Matematika', 1, 0),
(22, 'Pemrograman Dasar', 2, 1),
(23, 'Bahasa Indonesia', 2, 0),
(25, 'Upacara', 3, NULL),
(27, 'Istirahat', 3, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `mapel_id`, `siswa_id`, `keterangan`) VALUES
(12, 21, 2, 'Nilai Semester 1'),
(13, 21, 2, 'Nilai Semester 2'),
(14, 21, 2, 'Nilai Semester 3'),
(17, 21, 2, 'Nilai Semester 4'),
(18, 21, 1, 'Nilai Semester 1'),
(19, 21, 1, 'Nilai Semester 2'),
(20, 23, 1, 'Nilai Semester 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `gol_darah` char(3) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `orang_tua`
--

INSERT INTO `orang_tua` (`id`, `nama`, `nik`, `password`, `jk`, `agama`, `pekerjaan`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telpon`, `pendidikan`, `kewarganegaraan`) VALUES
(4, 'SYAMSUDIN', '137139999992', '123456', 'Laki-laki', 'Islam', 'FREELANCE', 'A-', 'TANGERANG', '1992-01-19', 'Tangerang Selatan', '0894847383', 'S1 PENDIDIKAN SENI RUPA', 'Warga Negara Indonesia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nik_orangtua` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `gol_darah` char(3) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `kewarganegaraan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `kelas_id`, `nik_orangtua`, `password`, `jk`, `agama`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telpon`, `pendidikan`, `kewarganegaraan`) VALUES
(1, 'CRISTIANO RONALDO', '0309389297', 27, '137139999992', '123456', 'Laki-laki', 'Katolik', 'B+', 'JAKARTA', '1994-02-21', 'Barcelona', '0883082', 'SMP 1', 'WARGA NEGARA ARGENTINA'),
(2, 'LIONEL MESSI', '0309389298', 30, '137139999992', '123456', 'Perempuan', 'Buddha', 'A-', 'JAKARTA', '2001-02-27', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(3, 'SISWA0', '00000000', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(4, 'SISWA1', '00000001', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(5, 'SISWA2', '00000002', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(6, 'SISWA3', '00000003', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(7, 'SISWA4', '00000004', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(8, 'SISWA5', '00000005', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(9, 'SISWA6', '00000006', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(10, 'SISWA7', '00000007', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(11, 'SISWA8', '00000008', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(12, 'SISWA9', '00000009', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(13, 'SISWA10', '000000010', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(14, 'SISWA11', '000000011', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(15, 'SISWA12', '000000012', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(16, 'SISWA13', '000000013', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(17, 'SISWA14', '000000014', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(18, 'SISWA15', '000000015', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(19, 'SISWA16', '000000016', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(20, 'SISWA17', '000000017', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(21, 'SISWA18', '000000018', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(22, 'SISWA19', '000000019', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(23, 'SISWA20', '000000020', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(24, 'SISWA21', '000000021', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(25, 'SISWA22', '000000022', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(26, 'SISWA23', '000000023', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(27, 'SISWA24', '000000024', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(28, 'SISWA25', '000000025', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(29, 'SISWA26', '000000026', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(30, 'SISWA27', '000000027', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(31, 'SISWA28', '000000028', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA'),
(32, 'SISWA29', '000000029', 30, '137139999992', '123456', 'Laki-laki', 'Islam', 'A+', 'TANGERANG', '2004-02-02', 'Jakarta', '0894847383', 'SMP 1 TANGERANG', 'WARGA NEGARA INDONESIA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tu`
--

CREATE TABLE `tu` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `gol_darah` char(3) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(13) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL,
  `kewarganegaraan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tu`
--

INSERT INTO `tu` (`id`, `nama`, `jk`, `email`, `password`, `agama`, `gol_darah`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `telpon`, `pendidikan`, `status`, `kewarganegaraan`) VALUES
(3, 'Petugas 1', 'Laki-laki', 'petugas1@gmail.com', '123456', 'Islam', 'A-', 'TANGERANG', '1998-02-11', 'Jakarta Barat', '0894847383', 'S1 PENDIDIKAN SENI RUPA', 'Menikah', 'WARGA NEGARA INDONESIA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `detail_absen`
--
ALTER TABLE `detail_absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_id` (`absen_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_id` (`jadwal_id`),
  ADD KEY `mapel_id` (`mapel_id`);

--
-- Indeks untuk tabel `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_id` (`nilai_id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`email`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kelas_id` (`kelas_id`);

--
-- Indeks untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jurusan_id` (`jurusan_id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indeks untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`),
  ADD KEY `kelas_id` (`kelas_id`),
  ADD KEY `siswa_ibfk_2` (`nik_orangtua`);

--
-- Indeks untuk tabel `tu`
--
ALTER TABLE `tu`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT untuk tabel `detail_absen`
--
ALTER TABLE `detail_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=444;

--
-- AUTO_INCREMENT untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `detail_mapel`
--
ALTER TABLE `detail_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tu`
--
ALTER TABLE `tu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `absen_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_absen`
--
ALTER TABLE `detail_absen`
  ADD CONSTRAINT `detail_absen_ibfk_1` FOREIGN KEY (`absen_id`) REFERENCES `absen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_absen_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_1` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_jadwal_ibfk_2` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_mapel`
--
ALTER TABLE `detail_mapel`
  ADD CONSTRAINT `detail_mapel_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_mapel_ibfk_3` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD CONSTRAINT `detail_nilai_ibfk_1` FOREIGN KEY (`nilai_id`) REFERENCES `nilai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`jurusan_id`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD CONSTRAINT `mapel_ibfk_1` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `siswa_ibfk_2` FOREIGN KEY (`nik_orangtua`) REFERENCES `orang_tua` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
