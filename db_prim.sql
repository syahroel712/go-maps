-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 09:07 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_prim`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_jarak_tempat`
--

CREATE TABLE `tb_jarak_tempat` (
  `id_jarak_tempat` int(11) NOT NULL,
  `id_tempat` int(11) NOT NULL,
  `id_tujuan` int(11) NOT NULL,
  `jarak_tempat` double NOT NULL COMMENT 'Jarak tempuh dalam satuan km',
  `waktu_tempuh` double NOT NULL COMMENT 'Waktu tempuh dalam satuan menit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jarak_tempat`
--

INSERT INTO `tb_jarak_tempat` (`id_jarak_tempat`, `id_tempat`, `id_tujuan`, `jarak_tempat`, `waktu_tempuh`) VALUES
(1, 1, 2, 8.4, 19),
(2, 2, 3, 9.2, 21),
(3, 3, 4, 12, 28),
(4, 4, 5, 8.2, 20),
(5, 5, 6, 3.8, 7),
(6, 5, 7, 8, 16),
(7, 2, 1, 8.4, 19),
(8, 3, 2, 9.2, 21),
(9, 4, 3, 12, 28),
(10, 5, 4, 8.2, 20),
(11, 6, 7, 9.2, 19),
(12, 6, 5, 3.8, 7),
(13, 7, 8, 3.7, 10),
(14, 7, 6, 9.2, 19),
(15, 7, 5, 8, 16),
(16, 8, 9, 12, 25),
(17, 8, 7, 3.7, 10),
(18, 9, 10, 3.2, 7),
(19, 9, 8, 12, 25),
(20, 10, 11, 13, 26),
(21, 10, 9, 3.2, 7),
(22, 11, 12, 2.5, 7),
(23, 11, 10, 13, 26),
(24, 12, 13, 3.3, 7),
(25, 12, 21, 4.8, 11),
(26, 12, 11, 2.5, 7),
(27, 13, 14, 1.9, 5),
(28, 13, 12, 3.3, 7),
(29, 14, 15, 6.4, 14),
(30, 14, 13, 1.9, 5),
(31, 15, 16, 0.45, 1),
(32, 15, 14, 6.4, 14),
(33, 16, 17, 0.55, 2),
(34, 16, 19, 0.7, 2),
(35, 16, 15, 0.45, 1),
(36, 17, 18, 0.13, 1),
(37, 17, 16, 0.45, 1),
(38, 18, 19, 0.8, 3),
(39, 18, 17, 0.13, 1),
(40, 19, 20, 1.5, 4),
(41, 19, 18, 0.8, 3),
(42, 19, 16, 0.7, 2),
(43, 20, 21, 1.1, 3),
(44, 20, 19, 1.5, 4),
(45, 21, 22, 0.04, 1),
(46, 21, 12, 4.8, 11),
(47, 21, 20, 1.1, 3),
(48, 22, 23, 0.3, 1),
(49, 22, 21, 0.04, 1),
(50, 23, 24, 2.9, 7),
(51, 23, 22, 0.3, 1),
(52, 24, 25, 1, 3),
(53, 24, 23, 2.9, 7),
(54, 25, 26, 1.1, 3),
(55, 25, 41, 16, 29),
(56, 25, 24, 1, 3),
(57, 26, 27, 15, 25),
(58, 26, 25, 1.1, 3),
(59, 27, 28, 8.5, 16),
(60, 27, 26, 15, 25),
(61, 28, 29, 0.5, 1),
(62, 28, 31, 26, 43),
(63, 28, 27, 8.5, 16),
(64, 29, 30, 2.7, 5),
(65, 29, 28, 0.5, 1),
(66, 30, 31, 24, 40),
(67, 30, 29, 2.7, 5),
(68, 31, 32, 1.5, 3),
(69, 31, 30, 24, 40),
(70, 31, 28, 26, 43),
(71, 32, 33, 9.8, 21),
(72, 32, 31, 1.5, 3),
(73, 33, 34, 7.4, 18),
(74, 33, 32, 9.8, 21),
(75, 34, 35, 3.1, 8),
(76, 34, 33, 7.4, 18),
(77, 35, 36, 12, 35),
(78, 35, 34, 3.1, 8),
(79, 36, 37, 21, 57),
(80, 36, 35, 12, 35),
(81, 37, 38, 26, 51),
(82, 37, 36, 21, 57),
(83, 38, 39, 5, 10),
(84, 38, 37, 26, 51),
(85, 39, 40, 40, 77),
(86, 39, 38, 5, 10),
(87, 40, 41, 15, 31),
(88, 40, 39, 40, 77),
(89, 41, 42, 18, 33),
(90, 41, 25, 16, 29),
(91, 41, 40, 15, 31),
(92, 42, 43, 72, 123),
(93, 42, 41, 18, 33),
(94, 43, 42, 72, 123);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempat`
--

CREATE TABLE `tb_tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `deskripsi_tempat` varchar(255) NOT NULL,
  `alamat_tempat` varchar(255) NOT NULL,
  `latitude_tempat` varchar(191) NOT NULL,
  `longitude_tempat` varchar(191) NOT NULL,
  `provinsi` varchar(191) NOT NULL,
  `kabkota` varchar(191) NOT NULL,
  `kecamatan` varchar(191) NOT NULL,
  `kontak` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `nama_tempat`, `deskripsi_tempat`, `alamat_tempat`, `latitude_tempat`, `longitude_tempat`, `provinsi`, `kabkota`, `kecamatan`, `kontak`, `foto`) VALUES
(1, 'Bukit Kelinci (WBK)', '                                                                                                                                                                                                                                                               ', 'Koto Tangah Batu Hampa, Akabiluru, Kabupaten Lima Puluh Kota, Sumatera Barat 26525                                                                                                                                                                             ', '-0.2638211', '100.5940819', '', '', '', '', ''),
(2, 'Sago Park', '                                ', 'Situjuah Gadang, Situjuah Limo Nagari, Kabupaten Lima Puluh Kota, Sumatera Barat 26233                                ', '-0.2820278', '100.6419218', '', '', '', '', ''),
(3, 'Embung Baboy', '                                ', 'Tungka, Situjuah Limo Nagari, Kabupaten Lima Puluh Kota, Sumatera Barat 26273                                ', '-0.3130336923824945', '100.60389876365662', '', '', '', '', ''),
(4, 'panorama kayu kolek', '                                ', 'Tanjuang Haro Sikabu-Kabu Padang Panjang, Luak, Kabupaten Lima Puluh Kota, Sumatera Barat 26261                                ', '-0.2950309590076397', '100.661780834198', '', '', '', '', ''),
(5, 'Batang Tabik', '                                ', 'Batang tabik, JL. 50 Kota, Sungai Kamuyang, Luak, Kabupaten Lima Puluh Kota, Sumatera Barat 25173                                ', '-0.2470628711338982', '100.67471981048584', '', '', '', '', ''),
(6, 'Padang Mangateh', '                                ', 'Padang Mangateh                                ', '-0.26690414944449964', '100.6909975798317', '', '', '', '', ''),
(7, 'Bukik Bulek', '                                ', 'Taram, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26261                                ', '-0.21148633617335558', '100.70045292377472', '', '', '', '', ''),
(8, 'Kapalo Banda', '                                                                ', 'Taram, Harau, Taram, Payakumbuh, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.19244813495416527', '100.72018325328827', '', '', '', '', ''),
(9, 'Torang Saribulan', '                                ', 'Buluh Kasok, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.15730063228339408', '100.71653008460999', '', '', '', '', ''),
(10, 'Pilubang Resort', '                                                                ', 'Pilubang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.16277231732723235', '100.69477200508118', '', '', '', '', ''),
(11, 'Sarasah Tanggo', '                                ', 'Sarilamak, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.13725923283896105', '100.6403124332428', '', '', '', '', ''),
(12, 'Sarasah Donat', '                                ', 'Unnamed Road, Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.13421761635207094', '100.65507531166077', '', '', '', '', ''),
(13, 'Panorama Harau', '                                ', 'Unnamed Road, Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.12175610438389847', '100.67041218280792', '', '', '', '', ''),
(14, 'Air Terjun Sarasah Murai', '                                                                                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.1089110314624541', '100.67690581083298', '', '', '', '', ''),
(15, 'Air Terjun Sarasah Bunta', '                                                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.10821097616618844', '100.67537426948547', '', '', '', '', ''),
(16, 'Istana kelinci Harau', '                                ', 'Sarasabunta, Lembah, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11013143433461577', '100.67188739776611', '', '', '', '', ''),
(17, 'Taman Wisata Lembah Harau', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11295311287096782', '100.66981673240662', '', '', '', '', ''),
(18, 'Kampung Eropa Harau', '                                ', 'Unnamed Road, Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11205725678706636', '100.67108273506165', '', '', '', '', ''),
(19, 'Kampung Sarasah', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11359684177649325', '100.66815912723541', '', '', '', '', ''),
(20, 'Lembah Harau - Beautiful Scenery', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.10680013670789794', '100.66547691822052', '', '', '', '', ''),
(21, 'Panorama Lembah Harau', '                                                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.10034675236557926', '100.66610991954803', '', '', '', '', ''),
(22, 'Air Terjun Lembah Harau', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.10003561659555388', '100.66592752933502', '', '', '', '', ''),
(23, 'Lembah Harau Akabarayun', '                                ', 'Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.09878034466592672', '100.66312193870544', '', '', '', '', ''),
(24, 'Harau Valley', '                                ', 'Nagari Harau, Kec. Harau, Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.08255836490991914', '100.65334796905518', '', '', '', '', ''),
(25, 'Ngalau saribu stopover', '                                ', 'Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat                                ', '-0.07547733984908533', '100.65132021903992', '', '', '', '', ''),
(26, 'Sarasah Murai', '                                ', 'Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.07323501500102356', '100.6413584947586', '', '', '', '', ''),
(27, 'Rumah Gadang Sungai Beringin', '                                ', '7 Sungai Beringin, Sungai Beringin, Payakumbuh, Kabupaten Lima Puluh Kota, Sumatera Barat 26251                                ', '-0.22143189621261014', '100.58494627475739', '', '', '', '', ''),
(28, 'Bukit Batu Manda Nan Elok', '                                ', 'Sungai Talang, Guguak, Kabupaten Lima Puluh Kota, Sumatera Barat 26253                                ', '-0.18213777860107463', '100.55274367332458', '', '', '', '', ''),
(29, 'Menhir Belubus', '                                ', 'Sungai Talang, Guguak, Kabupaten Lima Puluh Kota, Sumatera Barat 26253                                ', '-0.18205731273702636', '100.55945992469788', '', '', '', '', ''),
(30, 'Rumah Barbie Kuranji', '', 'Jl. Kuranji, Guguak VIII Koto, Guguak, Kabupaten Lima Puluh Kota, Sumatera Barat 26253', '-0.1684941', '100.5678923', '', '', '', '', ''),
(31, 'Museum Tan Malaka', '                                ', 'Pandam Gadang, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26255                                ', '-0.08718785258913508', '100.41908383369446', '', '', '', '', ''),
(32, 'Ikan Larangan Ikan Banyak', '                                ', 'Pandam Gadang, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26255                                ', '-0.08074519345710048', '100.40875196456909', '', '', '', '', ''),
(33, 'Agro Wisata Jeruk siam Gunuang Omeh', '                                ', 'Koto Tinggi, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26256                                ', '-0.055242768311594186', '100.3672742843628', '', '', '', '', ''),
(34, 'Kampuang Muaro Nagari Seribu Gonjong Limo', '                                ', 'Koto Tinggi, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26256                                ', '-0.05412160545398373', '100.36160409450531', '', '', '', '', ''),
(35, 'Monumen PDRI Koto Tinggi', '                                ', 'Koto Tinggi, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26256                                ', '-0.05086540507696572', '100.35756468772888', '', '', '', '', ''),
(36, 'Excepteur sed nostru', 'Amet odit non fugia', 'Voluptates voluptate', 'Ad atque placeat vo', 'Autem nemo aut labor', '', '', '', '', ''),
(37, 'Air Terjun Sarasah Barasok', '', 'Banja Loweh, Bukik Barisan, Kabupaten Lima Puluh Kota, Sumatera Barat 26255', '-0.0259837', '100.4772118', '', '', '', '', ''),
(38, 'Et delectus provide', 'Sapiente veniam dol', 'Culpa voluptates co', 'Alias voluptate omni', 'Sint vitae deleniti ', '', '', '', '', ''),
(39, 'Bukik Posuak Maek', '                                ', 'Maek, Bukik Barisan, Kabupaten Lima Puluh Kota, Sumatera Barat 26255                                ', '0.04662751636818523', '100.53677380084991', '', '', '', '', ''),
(40, 'Gunung Bungsu', '                                ', 'Taeh Bukik, Payakumbuh, Kabupaten Lima Puluh Kota, Sumatera Barat 26251                                ', '-0.13563381878507758', '100.61447739601135', '', '', '', '', ''),
(41, 'Lorem velit mollitia', 'Voluptatibus at est ', 'Anim maxime rem volu', 'Sapiente ad architec', 'Porro esse omnis ess', '', '', '', '', ''),
(42, 'Kelok Sambilan', '                                ', 'Jl. Kelok Sembilan, Sarilamak, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.07162569087804853', '100.69873094558716', '', '', '', '', ''),
(43, 'Air Terjun Lubuk Batang', '', 'Jurong 2 Kec. Kapur Sembilan Kab., Koto Bangun, Kapur IX, Kabupaten Lima Puluh Kota, Sumatera Barat 28453                                                                ', '0.27609479864184355', '100.5238401889801', '', '', '', '', ''),
(44, 'Dolores ipsam deseru', 'Nemo officia est tem', 'Voluptatum unde simi', 'Nesciunt qui volupt', 'Anim neque voluptate', 'asdas', 'asdas', 'asda', 'Quis omnis voluptate', '1.png'),
(45, 'Sed numquam laborum', 'Quas Nam autem volup', 'Reprehenderit omnis ', 'Sapiente aut placeat', 'Mollitia ab ipsa ad', 'sdas', 'kasda', 'lasldas', 'Laboriosam consequa', '5e85991c068da.'),
(46, 'Dolor fugit ullamco', 'Ex ex veniam invent', 'Et distinctio In re', 'Distinctio Nesciunt', 'Est voluptate volupt', 'lll', 'alsda', 'asdas', 'Consequat Consequat', '3.png5e85998cd836d.png'),
(47, 'Voluptas cum eum rer', 'Sint quia assumenda', 'Non anim culpa alias', 'Sunt amet animi fu', 'Accusantium dolor el', 'aksdkas', 'sadas', 'sdasd', 'Ut dolor expedita es', '14-43610.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `kontak` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `level` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_jarak_tempat`
--
ALTER TABLE `tb_jarak_tempat`
  ADD PRIMARY KEY (`id_jarak_tempat`);

--
-- Indexes for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jarak_tempat`
--
ALTER TABLE `tb_jarak_tempat`
  MODIFY `id_jarak_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
