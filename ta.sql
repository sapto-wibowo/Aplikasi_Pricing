-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2022 at 09:23 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `aturan_fc`
--

CREATE TABLE `aturan_fc` (
  `id_rule` int(11) DEFAULT NULL,
  `atur_modal` int(11) DEFAULT NULL,
  `atur_produk` int(11) DEFAULT NULL,
  `atur_margin` int(11) DEFAULT NULL,
  `hasil_atur` varchar(25) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aturan_fc`
--

INSERT INTO `aturan_fc` (`id_rule`, `atur_modal`, `atur_produk`, `atur_margin`, `hasil_atur`) VALUES
(1, 1, 2, 1, 'Margin dapat ditingkatkan'),
(2, 2, 2, 1, 'Margin dapat ditingkatkan'),
(3, 3, 2, 1, 'Margin dapat ditingkatkan'),
(4, 1, 2, 2, 'Margin Tetap'),
(5, 2, 2, 2, 'Margin dapat ditingkatkan'),
(6, 3, 2, 2, 'Margin dapat ditingkatkan'),
(7, 1, 2, 3, 'Margin perlu diturunkan'),
(8, 2, 2, 3, 'Margin Tetap'),
(9, 3, 2, 3, 'Margin Tetap'),
(10, 1, 1, 1, 'Margin Tetap'),
(11, 2, 1, 1, 'Margin Tetap'),
(12, 3, 1, 1, 'Margin Tetap'),
(13, 1, 1, 2, 'Margin perlu diturunkan'),
(14, 2, 1, 2, 'Margin perlu diturunkan'),
(15, 3, 1, 2, 'Margin Tetap'),
(16, 1, 1, 3, 'Margin perlu diturunkan'),
(17, 2, 1, 3, 'Margin perlu diturunkan'),
(18, 3, 1, 3, 'Margin perlu diturunkan');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_ctg` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_ctg`, `kategori`, `nama_kategori`) VALUES
(1, 'tekstil', 'Tekstil'),
(2, 'elec', 'Elektronik'),
(3, 'mkn&minum', 'Makanan&Minuman'),
(4, 'agrobisnis', 'Agrobisnis'),
(5, 'otomotif', 'Otomotif'),
(8, 'kerajinan_tgn', 'Kerajinan Tangan'),
(11, 'mkn_laut', 'Makanan laut');

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_saran`
--

CREATE TABLE `keluhan_saran` (
  `id_srn` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluhan_saran`
--

INSERT INTO `keluhan_saran` (`id_srn`, `nama`, `email`, `saran`) VALUES
(3, 'nama', 'asasa@mail.com', 'itu'),
(8, 'nama', 'asa@mail.com', 'asdafsdgdhe'),
(9, 'aeae', 'asa@mail.com', 'asdagagaga'),
(10, 'aeae', 'asasa@mail.com', 'afgfagafas'),
(11, 'aeae', 'asasa@mail.com', 'afgfagafas'),
(14, 'nama', 'asa@mail.com', 'dari halaman admin/keluhan'),
(15, 'user', 'asasa@mail.com', 'ulasan dari admin bagian kategori');

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `id_user` int(11) NOT NULL,
  `username` text NOT NULL,
  `nama` text NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `nomor_hp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`id_user`, `username`, `nama`, `pass`, `email`, `nomor_hp`) VALUES
(1, 'sapto', 'Sapto Wibowo', '6d3df1e1c59fe402539c96d4147880a7', 'sapto@mail.com', '089675545622'),
(2, 'user_1', 'USER1', 'ed8b18ea5470cc110eff0c38a0c0cd96', 'user1@mail.com', '087281724587'),
(3, 'test_user', 'USER2', '6ad14ba9986e3615423dfca256d04e3f', 'user2@mail.com', '087261725877'),
(4, 'test_user3', 'USER3', '6ad14ba9986e3615423dfca256d04e3f', 'user3@mail.com', '087726172587'),
(5, 'user5', 'USER5', '6ad14ba9986e3615423dfca256d04e3f', 'user@mail.com', '087261725877'),
(8, 'dummy', 'dummy1', '202cb962ac59075b964b07152d234b70', 'dummy@mail.com', '0876543432');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cpp`
--

CREATE TABLE `tb_cpp` (
  `id_cpp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_ush` varchar(255) NOT NULL,
  `sub_ctg` text NOT NULL,
  `ktg_lain` text NOT NULL,
  `dekade` text NOT NULL,
  `bhbk` int(255) NOT NULL,
  `tngkj` int(255) NOT NULL,
  `ovrhd` int(255) NOT NULL,
  `by_lain` int(255) NOT NULL,
  `modal` int(255) NOT NULL,
  `jm_produk` int(255) NOT NULL,
  `jm_jual` int(255) NOT NULL,
  `margin_cpp` varchar(255) NOT NULL,
  `saran_margin` text NOT NULL,
  `nilai_jual` int(255) NOT NULL,
  `nilai_margin` text NOT NULL,
  `keuntungan` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cpp`
--

INSERT INTO `tb_cpp` (`id_cpp`, `id_user`, `nama_ush`, `sub_ctg`, `ktg_lain`, `dekade`, `bhbk`, `tngkj`, `ovrhd`, `by_lain`, `modal`, `jm_produk`, `jm_jual`, `margin_cpp`, `saran_margin`, `nilai_jual`, `nilai_margin`, `keuntungan`, `created_at`, `updated_at`) VALUES
(488, 1, 'Baju', 'tekstil', 'Lengan Pendek, size M', 'Mingguan', 20000000, 5050000, 5500000, 6000000, 36550000, 200, 180, '22.54', 'Margin perlu diturunkan', 223942, 'dibawah 16%', 8238370, '2022-08-19 00:00:00', '2022-08-23 14:30:57'),
(491, 1, 'Obat Herbal', 'agrobisnis', 'per botol', 'Bulanan', 18000000, 7000000, 3000000, 2500000, 30500000, 300, 310, '18', 'Margin dapat ditingkatkan', 119967, 'lebih dari 38%', 5490000, '2022-08-19 00:00:00', '2022-08-23 14:31:10'),
(505, 1, 'Sosis', 'mkn&minum', 'per pack', 'Mingguan', 2000000, 300000, 400000, 200000, 2900000, 50, 50, '20', 'Margin Tetap', 69600, '16% - 38% atau tetap 20%', 580000, '2022-08-19 00:00:00', '2022-08-23 14:31:27'),
(510, 1, 'ikan', 'mkn&minum', 'ikan bakar', 'Harian', 20000000, 7000000, 3400000, 4500000, 34900000, 350, 400, '28', 'Margin dapat ditingkatkan', 127634, 'lebih dari 38%', 9772000, '2022-08-19 00:00:00', '2022-08-23 14:16:55'),
(514, 1, 'Lampu tidur', 'elec', 'satuan', 'Mingguan', 20000000, 1500000, 200000, 1200000, 22900000, 350, 350, '25', 'Margin dapat ditingkatkan', 81786, 'lebih dari 38%', 5725000, '2022-08-19 00:00:00', '2022-08-23 14:18:15'),
(515, 2, 'Charger Handphone', 'elec', 'per pack', 'Mingguan', 8000000, 2000000, 2000000, 100000, 12100000, 65, 65, '25', 'Margin Tetap', 232692, '16% - 38% atau tetap 25%', 3025000, '2022-08-19 00:00:00', '2022-08-23 14:31:44'),
(516, 2, 'Susu Steril', 'mkn&minum', 'per botol', 'Mingguan', 12000000, 2000000, 2500000, 250000, 16750000, 200, 200, '20', 'Margin dapat ditingkatkan', 100500, 'lebih dari 38%', 3350000, '2022-08-19 00:00:00', '2022-08-23 14:31:59'),
(517, 2, 'Gantungan Kunci', 'tekstil', 'satuan', 'Mingguan', 20000000, 2210000, 2200000, 200000, 24610000, 400, 430, '20', 'Margin dapat ditingkatkan', 73830, 'lebih dari 38%', 4922000, '2022-08-19 00:00:00', '2022-08-23 14:32:11'),
(518, 2, 'Earphone', 'elec', 'Satuan', 'Bulanan', 21000000, 2000000, 200000, 150000, 23350000, 500, 500, '25', 'Margin dapat ditingkatkan', 58375, 'lebih dari 38%', 5837500, '2022-08-19 00:00:00', '2022-08-23 14:32:22'),
(523, 2, 'Celana', 'tekstil', 'satuan, Size 30', 'Harian', 12000000, 2500000, 1000000, 1500000, 17000000, 100, 100, '18', 'Margin dapat ditingkatkan', 200600, 'lebih dari 38%', 3060000, '2022-08-19 00:00:00', '2022-08-23 14:32:35'),
(524, 3, 'Dompet', 'tekstil', 'satuan', 'Harian', 3000000, 70000, 1500000, 15000, 4585000, 100, 100, '15', 'Margin dapat ditingkatkan', 52728, '16% - 38%', 687750, '2022-08-19 00:00:00', '2022-08-23 14:32:51'),
(525, 3, 'Sandal Jepit', 'tekstil', 'size 42, black', 'Mingguan', 6000000, 2000000, 1500000, 2000000, 11500000, 250, 250, '34', 'Margin Tetap', 61640, '16% - 38% atau tetap 34%', 3910000, '2022-08-19 00:00:00', '2022-08-23 14:33:11'),
(526, 3, 'Jam Tangan', 'tekstil', 'anak-anak', 'Mingguan', 5000000, 2300000, 2400000, 100000, 9800000, 490, 500, '18', 'Margin Tetap', 23600, '16% - 38% atau tetap 18%', 1764000, '2022-08-19 00:00:00', '2022-08-23 14:33:30'),
(527, 3, 'kue kering', 'mkn&minum', 'coklat', 'Mingguan', 5000000, 2300000, 2400000, 100000, 9800000, 490, 480, '18', 'Margin perlu diturunkan', 23600, 'dibawah 16%', 1764000, '2022-08-19 00:00:00', '2022-08-23 14:33:46'),
(528, 3, 'bakso', 'mkn&minum', 'per porsi', 'Harian', 5000000, 50000, 30000, 15000, 5095000, 330, 330, '27', 'Margin Tetap', 19608, '16% - 38% atau tetap 27%', 1375650, '2022-08-19 00:00:00', '2022-08-23 14:34:00'),
(529, 4, 'Cake and Cookies', 'mkn&minum', 'per kaleng', 'Bulanan', 8000000, 120000, 150000, 35000, 8305000, 50, 50, '18', 'Margin Tetap', 195998, '16% - 38% atau tetap 18%', 1494900, '2022-08-19 00:00:00', '2022-08-23 14:34:57'),
(530, 4, 'masker', 'tekstil', 'per pack 20 buah', 'Tahunan', 8000000, 525000, 150000, 40000, 8715000, 60, 50, '18', 'Margin perlu diturunkan', 171395, 'dibawah 16%', 1568700, '2022-08-19 00:00:00', '2022-08-23 14:35:14'),
(531, 4, 'Dodol', 'mkn&minum', 'all varian, per kilo', 'Mingguan', 80000000, 6000000, 2300000, 150000, 88450000, 600, 600, '18', 'Margin dapat ditingkatkan', 173952, 'lebih dari 38%', 15921000, '2022-08-19 00:00:00', '2022-08-23 14:34:41'),
(532, 4, 'yoyo', 'kerajinan_tgn', 'anak-anak', 'Mingguan', 5000000, 250000, 300000, 50000, 5600000, 150, 150, '20', 'Margin Tetap', 44800, '16% - 38% atau tetap 20%', 1120000, '2022-08-19 00:00:00', '2022-08-23 14:34:27'),
(533, 4, 'congklak', 'kerajinan_tgn', 'anak-anak', 'Mingguan', 8000000, 600000, 500000, 40000, 9140000, 300, 300, '25', 'Margin Tetap', 38083, '16% - 38% atau tetap 25%', 2285000, '2022-08-19 00:00:00', '2022-08-23 14:34:14'),
(534, 1, 'pensil ukiran', 'kerajinan_tgn', 'jenis 2B', 'Tahunan', 7000000, 600000, 80000, 50000, 7730000, 250, 250, '20', 'Margin Tetap', 37104, '16% - 38% atau tetap 20%', 1546000, '2022-08-19 00:00:00', '2022-08-23 14:35:31'),
(535, 2, 'Oli motor', 'otomotif', 'satuan, merk castrol', 'Bulanan', 30000000, 2000000, 2300000, 300000, 34600000, 500, 500, '20', 'Margin dapat ditingkatkan', 83040, 'lebih dari 38%', 6920000, '2022-08-19 00:00:00', '2022-08-23 14:35:44'),
(536, 3, 'Shockbreaker', 'otomotif', 'merk honda', 'Tahunan', 25000000, 4000000, 3000000, 250000, 32250000, 650, 500, '20', 'Margin perlu diturunkan', 59538, 'dibawah 16%', 6450000, '2022-08-19 21:56:19', '2022-08-23 14:35:59'),
(537, 1, 'Velg ban', 'otomotif', 'Size 18 inch, Merk Swalow', 'Bulanan', 6000000, 100000, 150000, 50000, 6300000, 40, 43, '30', 'Margin Tetap', 204750, '16% - 38% atau tetap 30%', 1890000, '2022-08-23 15:30:40', '2022-08-23 15:32:53'),
(538, 1, 'bookcase', 'tekstil', 'warna merah', 'Tahunan', 3600000, 500000, 25000, 50000, 4175000, 30, 30, '26', 'Margin Tetap', 175350, '16% - 38% atau tetap 26%', 1085500, '2022-08-24 14:26:50', '2022-08-24 15:13:21'),
(539, 1, 'Es lilin', 'mkn&minum', 'all varian', 'Harian', 2000000, 50000, 25000, 0, 2075000, 50, 50, '18', 'Margin Tetap', 48970, '16% - 38% atau tetap 18%', 373500, '2022-08-24 14:28:36', NULL),
(540, 1, 'microwave', 'elec', 'warna silver', 'Tahunan', 15000000, 200000, 87000, 46000, 15333000, 20, 18, '27', 'Margin perlu diturunkan', 973646, 'dibawah 16%', 4139910, '2022-08-24 14:30:08', '2022-08-24 15:13:58'),
(541, 2, 'Motorola Speaker ', 'elec', 'Full size', 'Bulanan', 15000000, 250000, 50000, 25000, 15325000, 18, 17, '35', 'Margin perlu diturunkan', 1149375, 'dibawah 16%', 5363750, '2022-08-24 14:32:22', NULL),
(542, 2, 'Flashdisk', 'elec', 'Merk Sandisk, 32GB', 'Tahunan', 5000000, 250000, 25600, 50000, 5325600, 40, 40, '32', 'Margin Tetap', 175745, '16% - 38% atau tetap 32%', 1704192, '2022-08-24 14:34:20', '2022-08-24 15:16:54'),
(543, 2, 'Bibit sawi', 'agrobisnis', 'per pack', 'Bulanan', 2000000, 250000, 25000, 10000, 2285000, 60, 60, '28', 'Margin Tetap', 48747, '16% - 38% atau tetap 28%', 639800, '2022-08-24 14:36:15', NULL),
(544, 2, 'Gelang hias', 'kerajinan_tgn', 'Warna hitam', 'Bulanan', 3500000, 250000, 24000, 8000, 3782000, 100, 100, '30', 'Margin Tetap', 49166, '16% - 38% atau tetap 30%', 1134600, '2022-08-24 14:37:41', NULL),
(545, 3, 'Sendok kayu', 'kerajinan_tgn', 'Sendok makan, satuan', 'Bulanan', 1500000, 150000, 25000, 50000, 1725000, 34, 33, '34', 'Margin perlu diturunkan', 67985, 'dibawah 16%', 586500, '2022-08-24 14:39:17', NULL),
(546, 3, 'Kain kiloan', 'tekstil', 'per kilo, warna putih', 'Bulanan', 4500000, 350000, 25000, 34000, 4909000, 20, 20, '18', 'Margin Tetap', 289631, '16% - 38% atau tetap 18%', 883620, '2022-08-24 14:40:40', NULL),
(547, 3, 'Minuman mangga', 'mkn&minum', 'per botol', 'Mingguan', 3000000, 400000, 50000, 45000, 3495000, 100, 100, '23', 'Margin Tetap', 42989, '16% - 38% atau tetap 23%', 803850, '2022-08-24 14:41:44', NULL),
(548, 3, 'Tape uli', 'mkn&minum', 'per ikat', 'Harian', 1500000, 50000, 40000, 35000, 1625000, 36, 36, '35', 'Margin Tetap', 60938, '16% - 38% atau tetap 35%', 568750, '2022-08-24 14:42:35', NULL),
(549, 4, 'kain lap', 'tekstil', 'ukuran 10x10', 'Mingguan', 150000, 140000, 150000, 25000, 465000, 40, 45, '24', 'Margin Tetap', 14415, '16% - 38% atau tetap 24%', 111600, '2022-08-24 15:01:29', NULL),
(550, 4, 'Spanduk', 'tekstil', 'ukuran 6x2 meter, satuan', 'Harian', 1500000, 12000, 23200, 14000, 1549200, 5, 5, '28', 'Margin Tetap', 396595, '16% - 38% atau tetap 28%', 433776, '2022-08-24 15:02:41', '2022-08-24 15:14:52'),
(551, 4, 'Pin topi', 'kerajinan_tgn', 'Ukuran 5cm, berbentuk bulat, satuan', 'Harian', 1800000, 150000, 24600, 24000, 1998600, 50, 42, '35', 'Margin perlu diturunkan', 53962, 'dibawah 16%', 699510, '2022-08-24 15:04:54', '2022-08-24 15:15:26'),
(552, 4, 'Hiasan dari kerang', 'kerajinan_tgn', 'Berbentuk angsa, satuan', 'Bulanan', 2000000, 250000, 25000, 50000, 2325000, 76, 76, '34', 'Margin Tetap', 40993, '16% - 38% atau tetap 34%', 790500, '2022-08-24 15:06:19', NULL),
(554, 4, 'Lampu Senja Motor', 'otomotif', 'All Colour, satuan', 'Tahunan', 3500000, 3600000, 250000, 50000, 7400000, 370, 370, '25', 'Margin Tetap', 25000, '16% - 38% atau tetap 25%', 1850000, '2022-08-25 11:56:15', NULL),
(556, 5, 'Cola-cola', 'mkn&minum', 'per satuan', 'Harian', 3000000, 50000, 25000, 20000, 3095000, 300, 300, '30', 'Margin Tetap', 13412, '16% - 38% atau tetap 30%', 928500, '2022-08-25 16:05:52', NULL),
(557, 5, 'pupuk organik', 'agrobisnis', 'per karung', 'Tahunan', 6000000, 2500000, 250000, 59000, 8809000, 500, 500, '28', 'Margin Tetap', 22551, '16% - 38% atau tetap 28%', 2466520, '2022-08-25 16:23:01', NULL),
(558, 5, 'benang sutra', 'tekstil', 'satu ikat/gulung, 10meter', 'Harian', 600000, 250000, 300000, 3400, 1153400, 100, 100, '30', 'Margin Tetap', 14994, '16% - 38% atau tetap 30%', 346020, '2022-08-25 16:37:36', NULL),
(559, 5, 'Gelang motif', 'kerajinan_tgn', 'bahan dari kerang dan mutiara, satuan', 'Tahunan', 45000000, 2500000, 350000, 50000, 47900000, 20, 18, '34', 'Margin perlu diturunkan', 3209300, 'dibawah 16%', 16286000, '2022-08-25 16:39:34', NULL),
(560, 5, 'Ban Motor', 'otomotif', 'Merk Swalow, ukuran 18 inch, motif kembang', 'Tahunan', 20000000, 12000000, 500000, 25000, 32525000, 150, 150, '28', 'Margin dapat ditingkatkan', 277547, 'lebih dari 38%', 9107000, '2022-08-25 16:42:11', NULL),
(561, 5, 'Kipas angin', 'elec', 'Ukuran 12 inch, merk anyo', 'Tahunan', 25000000, 15000000, 1050000, 2500000, 43550000, 200, 200, '26', 'Margin dapat ditingkatkan', 274365, 'lebih dari 38%', 11323000, '2022-08-25 16:43:41', NULL),
(562, 5, 'Makanan oven', 'mkn&minum', 'Rasa teriyaki, per porsi', 'Harian', 10000000, 2500000, 2000000, 150000, 14650000, 100, 100, '20', 'Margin Tetap', 175800, '16% - 38% atau tetap 20%', 2930000, '2022-08-25 16:44:52', NULL),
(563, 5, 'Rambut palsu', 'kerajinan_tgn', 'Untuk wanita, warna merah, panjang 25cm', 'Tahunan', 8000000, 5000000, 340000, 875600, 14215600, 150, 120, '26', 'Margin perlu diturunkan', 119411, 'dibawah 16%', 3696056, '2022-08-25 16:49:08', NULL),
(564, 5, 'Lencana pramuka', 'kerajinan_tgn', 'Lencana Bantara', 'Harian', 2000000, 50000, 34000, 12000, 2096000, 86, 46, '34', 'Margin perlu diturunkan', 32659, 'dibawah 16%', 712640, '2022-08-25 16:50:36', NULL),
(565, 5, 'Jam tangan', 'elec', 'Jam tangan dewasa', 'Tahunan', 5000000, 3500000, 34000, 65000, 8599000, 15, 13, '26', 'Margin perlu diturunkan', 722316, 'dibawah 16%', 2235740, '2022-08-25 16:51:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_ctg`);

--
-- Indexes for table `keluhan_saran`
--
ALTER TABLE `keluhan_saran`
  ADD PRIMARY KEY (`id_srn`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_cpp`
--
ALTER TABLE `tb_cpp`
  ADD PRIMARY KEY (`id_cpp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_ctg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keluhan_saran`
--
ALTER TABLE `keluhan_saran`
  MODIFY `id_srn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `log_in`
--
ALTER TABLE `log_in`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_cpp`
--
ALTER TABLE `tb_cpp`
  MODIFY `id_cpp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=568;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
