-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 03:11 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_learning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `tlp`, `username`) VALUES
(1, 'Dina Febriana', '087758841373', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `file_materi`
--

CREATE TABLE `file_materi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_materi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_materi`
--

INSERT INTO `file_materi` (`id`, `nama`, `id_materi`) VALUES
(2, 'Bab1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `tlp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `jenis_kelamin`, `tlp`, `alamat`, `agama`, `username`) VALUES
('1', 'Rita', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'dina'),
('10', 'Nama 9', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru9'),
('11', 'Nama 10', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru10'),
('12', 'Nama 11', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru11'),
('13', 'Nama 12', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru12'),
('14', 'Nama 13', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru13'),
('15', 'Nama 14', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru14'),
('16', 'Nama 15', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru15'),
('17', 'Nama 16', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru16'),
('18', 'Nama 17', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru17'),
('19', 'Nama 18', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru18'),
('2', 'Nama 1', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru1'),
('20', 'Nama 19', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru19'),
('21', 'Nama 20', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru20'),
('22', 'Nama 21', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru21'),
('23', 'Nama 22', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru22'),
('24', 'Nama 23', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru23'),
('25', 'Nama 24', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru24'),
('26', 'Nama 25', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru25'),
('27', 'Nama 26', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru26'),
('28', 'Nama 27', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru27'),
('29', 'Nama 28', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru28'),
('3', 'Nama 2', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru2'),
('30', 'Nama 29', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru29'),
('31', 'Nama 30', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru30'),
('4', 'Nama 3', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru3'),
('5', 'Nama 4', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru4'),
('6', 'Nama 5', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru5'),
('7', 'Nama 6', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru6'),
('8', 'Nama 7', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru7'),
('9', 'Nama 8', 'Perempuan', '087758841373', 'Sumenep', 'Islam', 'guru8'),
('q', 'q', 'Laki-Laki', 'q', 'q', 'Islam', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `guru_x_mapel`
--

CREATE TABLE `guru_x_mapel` (
  `id` int(11) NOT NULL,
  `id_guru` varchar(20) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru_x_mapel`
--

INSERT INTO `guru_x_mapel` (`id`, `id_guru`, `id_mapel`) VALUES
(1, '1', 1),
(2, '7', 5),
(3, '12', 11),
(4, '15', 12),
(5, '5', 12),
(6, '16', 3),
(7, '13', 12),
(8, '16', 1),
(9, '30', 6),
(10, '14', 1),
(11, '14', 13),
(20, 'q', 14);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` varchar(30) NOT NULL,
  `guru_x_mapel` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `jam`, `guru_x_mapel`, `id_kelas`) VALUES
(3, 'Senin', '1', 1, 1),
(4, 'Selasa', '1', 1, 1),
(5, 'Senin', '2', 10, 1),
(6, 'Senin', '3', 5, 1),
(7, 'Senin', '4', 5, 1),
(8, 'Senin', '5', 7, 1),
(9, 'Senin', '6', 11, 1),
(10, 'Senin', '7', 9, 1),
(11, 'Senin', '8', 11, 1),
(12, 'Selasa', '2', 5, 1),
(13, 'Selasa', '3', 4, 1),
(14, 'Selasa', '4', 9, 1),
(15, 'Selasa', '5', 2, 1),
(16, 'Selasa', '6', 4, 1),
(17, 'Selasa', '7', 6, 1),
(18, 'Selasa', '8', 7, 1),
(19, 'Rabu', '1', 3, 1),
(20, 'Rabu', '2', 10, 1),
(21, 'Rabu', '3', 5, 1),
(22, 'Rabu', '4', 4, 1),
(23, 'Rabu', '5', 8, 1),
(24, 'Rabu', '6', 6, 1),
(25, 'Rabu', '7', 7, 1),
(26, 'Rabu', '8', 8, 1),
(27, 'Kamis', '1', 6, 1),
(28, 'Kamis', '2', 5, 1),
(29, 'Kamis', '3', 7, 1),
(30, 'Kamis', '4', 9, 1),
(31, 'Kamis', '5', 7, 1),
(32, 'Kamis', '6', 7, 1),
(33, 'Kamis', '7', 6, 1),
(34, 'Kamis', '8', 5, 1),
(35, 'Jumat', '1', 7, 1),
(36, 'Jumat', '2', 5, 1),
(37, 'Jumat', '3', 4, 1),
(38, 'Jumat', '4', 6, 1),
(39, 'Jumat', '5', 7, 1),
(40, 'Jumat', '6', 6, 1),
(41, 'Jumat', '7', 5, 1),
(42, 'Jumat', '8', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_siswa`
--

CREATE TABLE `jawaban_siswa` (
  `no` int(11) NOT NULL,
  `siswa` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `id_soal` int(11) NOT NULL,
  `jawaban_soal` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jawaban_siswa`
--

INSERT INTO `jawaban_siswa` (`no`, `siswa`, `id_ujian`, `id_soal`, `jawaban_soal`, `keterangan`) VALUES
(19, '2000567', 2, 10, 27, 0),
(20, '2000567', 2, 9, 23, 1),
(21, '2000567', 2, 11, 31, 0),
(22, '2000567', 2, 13, 39, 0),
(23, '2000567', 2, 14, 43, 1),
(24, '2000567', 2, 12, 36, 1),
(25, '2000567', 2, 15, 47, 0),
(28, '2000567', 2, 16, 52, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_soal`
--

CREATE TABLE `jawaban_soal` (
  `id` int(11) NOT NULL,
  `jawaban` varchar(100) NOT NULL,
  `nilai` enum('0','1') NOT NULL,
  `id_soal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_soal`
--

INSERT INTO `jawaban_soal` (`id`, `jawaban`, `nilai`, `id_soal`) VALUES
(23, 'Hendaknya kita selalu setia kawan', '1', 9),
(24, 'Hendaknya kita selalu bersama – sama ', '0', 9),
(25, 'Hendaknya kita selalu berkelompok. ', '0', 9),
(26, 'Hendaknya kita sendiri – sendiri', '0', 9),
(27, 'Nilai sosial', '0', 10),
(28, 'Nilai religius', '1', 10),
(29, 'Nilai moral', '0', 10),
(30, 'Nilai budaya', '0', 10),
(31, 'Aku sangat mengerti betapa kesedihan yang dialami tokoh itu', '0', 11),
(32, 'Semua yang dialami oleh manusia merupakan tanggung jawab masing – masing.', '0', 11),
(33, 'Selama ini aku kurang bersyukur, ternyata ada yang mempunyai beban lebih berat dariku.', '1', 11),
(34, 'Semoga tokoh tersebut dapat melalui hari – harinya dengan tetap bersyukur, tabah dan tetap semangat', '0', 11),
(35, 'Penokohan', '0', 12),
(36, 'Suasana perasaan tokoh', '1', 12),
(37, 'Latar tempat ', '0', 12),
(38, 'Latar tempat ', '0', 12),
(39, 'Buku paket', '0', 13),
(40, 'Buku  nonfiksi', '1', 13),
(41, 'Buku literatur', '0', 13),
(42, 'Buku fiksi', '0', 13),
(43, 'Pengetahun', '1', 14),
(44, 'Nilai Kehidupan', '0', 14),
(45, 'Pelajaran Hidup', '0', 14),
(46, 'Motivasi', '0', 14),
(47, 'Peluang', '0', 15),
(48, 'Kebutuhan', '0', 15),
(49, 'Hobi', '0', 15),
(50, 'Hobi dan Kebutuhan', '1', 15),
(51, 'Buku Fiksi', '0', 16),
(52, 'Buku Non Fiksi', '1', 16),
(53, 'Resensi', '0', 16),
(54, 'Bidang Study', '0', 16);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `keterangan`) VALUES
(1, '7', 'A'),
(2, '7', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `nama`) VALUES
(1, 'Agama Islam'),
(2, 'Pelajaran 1'),
(3, 'Pelajaran 2'),
(4, 'Pelajaran 3'),
(5, 'Pelajaran 4'),
(6, 'Pelajaran 5'),
(7, 'Pelajaran 6'),
(8, 'Pelajaran 7'),
(9, 'Pelajaran 8'),
(10, 'Pelajaran 9'),
(11, 'Pelajaran 10'),
(12, 'Pelajaran 11'),
(13, 'Pelajaran 12'),
(14, 'Pelajaran 13'),
(15, 'Pelajaran 14'),
(16, 'Pelajaran 15');

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `judul`, `deskripsi`, `id_jadwal`) VALUES
(2, 'Pertemuan 1', 'BAB 1', 3),
(4, 'pertemuan 2', 'BAB 2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `level` enum('Admin','Guru','Siswa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `pass`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
('dina', '4d6d9f77764494044a80629eda3a3626', 'Guru'),
('guru1', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru10', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru11', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru12', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru13', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru14', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru15', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru16', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru17', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru18', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru19', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru2', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru20', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru21', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru22', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru23', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru24', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru25', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru26', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru27', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru28', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru29', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru3', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru30', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru4', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru5', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru6', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru7', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru8', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('guru9', '827ccb0eea8a706c4c34a16891f84e7b', 'Guru'),
('maretaks', 'f730e2da6707f38856d2b0ed613fe974', 'Siswa'),
('q', '7694f4a66316e53c8cdd9d9954bd611d', 'Guru'),
('s', '03c7c0ace395d80182db07ae2c30f034', 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `pengumuman` longtext NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `pengumuman`, `id_jadwal`, `tanggal`) VALUES
(2, 'Diharapkan besok untuk membawa laptop ', 3, '2022-07-19');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `tgl_lahir`, `jenis_kelamin`, `username`) VALUES
('2000567', 'Mareta', '2007-06-09', 'Perempuan', 'maretaks'),
('s', 's', '2022-08-17', 'Laki-laki', 's');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_x_kelas`
--

CREATE TABLE `siswa_x_kelas` (
  `id` int(11) NOT NULL,
  `id_siswa` varchar(20) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_x_kelas`
--

INSERT INTO `siswa_x_kelas` (`id`, `id_siswa`, `id_kelas`) VALUES
(2, '2000567', 1),
(3, 's', 2);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `pertanyaan` varchar(500) NOT NULL,
  `level` enum('1','2','3') NOT NULL,
  `id_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `pertanyaan`, `level`, `id_ujian`) VALUES
(9, 'Kami adalah geng yang selalu bersama, susah,atau senang. Duka atau tangis. Apapun kami lakukan\r\nbersama.  Banyak hal yang nyaris tidak kami lakukan tanpa bersama. \r\nKarena kami adalah kelompok paling ngetop dan menghebohkan di sekolah kami. Tak kalah dari geng apapun. Karena kami punya motto biar kecil tapi cabe rawit. Biar masih SMP tapi kelakuan SMA hehe.\r\n( Surat Kecil untuk Tuhan – Ages D )\r\n1. Amanat yang terkandung dalam penggalan fiksi di atas adalah ...', '1', 2),
(10, 'Cermati kutipan berikut!\r\nHari indah dan harapan yang Aku nanti akhirnya telah datang. Doaku selama ini telah didengarkan oleh Tuhan. Kesabaran dan keikhlasan Aku menerima semua cobaan ini telah terbayar dengan kesembuhan. Kini Aku bisa melakukan apapun untuk hidupku yang telah hilang. Aku ingin membalas segala rasa sedih yang kualami dengan keceriaan.\r\n( Surat Kecil untuk Tuhan – Ages D )\r\n2. Nilai yang terkandung pada penggalan fiksi di atas adalah ...', '2', 2),
(11, 'Cermati kutipan di bawah ini!\r\nWalau akhirnya ia tahu ia terserang kanker ganas, ia pasrah dan tidak marah pada siapapun yamg \r\nmerahasiakan penyakit maut itu padanya. Ia memberikan senyum kepada siapapun dan menunjukkan perjuangannya bahwa dengan kanker di wajahnya ia masih mampu berprestasi dari hidup normal di\r\nbangku sekolah. Tuhan menunjukkan kebesaran hati dengan memberikan nafas panjang padanya\r\nuntuk lepas dari kanker itu sesaat.\r\n( Surat Kecil dari Tuhan  - Ages D )\r\n3. Kalimat refleksi', '3', 2),
(12, 'Bacalah cuplikan di bawah ini! \r\nPesawat Garuda jurusan Jakarta – Tokyo itu mendarat di Bandara Narita pukul 11.00 waktu Tokyo. Akira menghirup napas dalam. Dirasakannya kesejukan udara tanah kelahirannya merasuk hingga ke tulang sumsum. Ia tersenyum tipis sebelum akhirnya melangkah perlahan menuruni tangga pesawat.( Novel Akira, Muslim Watashi Wa, Helvy Tiana Rosa )\r\n4. Cuplikan novel tersebut menonjolkan unsur ...', '3', 2),
(13, 'Buku yang berisi kisahan atau cerita yang \r\ndibuat berdasarkan khayalan atau imajinasi pengarang.\r\nPernyataan tersebut merupakan pengertian dari ...', '1', 2),
(14, 'Ada banyak jenis buku di Indonesia. \r\nMulai dari buku fiksi yang menghibur \r\nhingga buku nonfiksi yang banyak memberikan ... \r\nbagi para pembacanya.\r\n', '1', 2),
(15, 'Setiap pembaca diberi kebebasan untuk \r\nmenikmati setiap karya, baik buku fiksi \r\nmaupun nonfiksi yang disesuaikan dengan ...', '3', 2),
(16, 'Buku pelajaran, laporan ilmiah dan jurnal \r\ntermasuk jenis buku . . .\r\n', '1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `keterangan`, `tanggal`, `id_jadwal`) VALUES
(2, 'UTS', '2022-06-09 10:15:00', 3),
(3, 'UAS', '2022-07-20 12:46:00', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_ibfk_1` (`username`);

--
-- Indexes for table `file_materi`
--
ALTER TABLE `file_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_f_m` (`id_materi`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `fk_gr_pg` (`username`);

--
-- Indexes for table `guru_x_mapel`
--
ALTER TABLE `guru_x_mapel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_x_mapel_ibfk_1` (`id_guru`),
  ADD KEY `guru_x_mapel_ibfk_2` (`id_mapel`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_ibfk_1` (`guru_x_mapel`),
  ADD KEY `jadwal_ibfk_2` (`id_kelas`);

--
-- Indexes for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  ADD PRIMARY KEY (`no`),
  ADD KEY `fk_js_jss` (`jawaban_soal`),
  ADD KEY `fk_js_sss` (`siswa`),
  ADD KEY `fk_js_uu` (`id_ujian`);

--
-- Indexes for table `jawaban_soal`
--
ALTER TABLE `jawaban_soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s_j` (`id_soal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_m_j` (`id_jadwal`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_p_j` (`id_jadwal`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_s_pg` (`username`);

--
-- Indexes for table `siswa_x_kelas`
--
ALTER TABLE `siswa_x_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s_k` (`id_kelas`),
  ADD KEY `fk_si_k` (`id_siswa`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_ibfk_2` (`id_ujian`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujian_ibfk_1` (`id_jadwal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_materi`
--
ALTER TABLE `file_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `guru_x_mapel`
--
ALTER TABLE `guru_x_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `jawaban_soal`
--
ALTER TABLE `jawaban_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa_x_kelas`
--
ALTER TABLE `siswa_x_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `file_materi`
--
ALTER TABLE `file_materi`
  ADD CONSTRAINT `fk_f_m` FOREIGN KEY (`id_materi`) REFERENCES `materi` (`id_materi`) ON UPDATE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `fk_gr_pg` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `guru_x_mapel`
--
ALTER TABLE `guru_x_mapel`
  ADD CONSTRAINT `guru_x_mapel_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`nip`),
  ADD CONSTRAINT `guru_x_mapel_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`guru_x_mapel`) REFERENCES `guru_x_mapel` (`id`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `jawaban_siswa`
--
ALTER TABLE `jawaban_siswa`
  ADD CONSTRAINT `fk_js_jss` FOREIGN KEY (`jawaban_soal`) REFERENCES `jawaban_soal` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_js_sss` FOREIGN KEY (`siswa`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_js_uu` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `jawaban_soal`
--
ALTER TABLE `jawaban_soal`
  ADD CONSTRAINT `fk_s_j` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_m_j` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `fk_p_j` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `fk_s_pg` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`) ON UPDATE CASCADE;

--
-- Constraints for table `siswa_x_kelas`
--
ALTER TABLE `siswa_x_kelas`
  ADD CONSTRAINT `fk_s_k` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_si_k` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`nis`) ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_2` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
