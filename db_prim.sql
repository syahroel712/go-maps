-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 10:59 AM
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
(7, 2, 1, 12, 123),
(14, 1, 7, 18, 10);

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
  `longitude_tempat` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tempat`
--

INSERT INTO `tb_tempat` (`id_tempat`, `nama_tempat`, `deskripsi_tempat`, `alamat_tempat`, `latitude_tempat`, `longitude_tempat`) VALUES
(1, 'Bukit Kelinci (WBK)', '                                                                                                                                                                                                                                                               ', 'Koto Tangah Batu Hampa, Akabiluru, Kabupaten Lima Puluh Kota, Sumatera Barat 26525                                                                                                                                                                             ', '-0.2638211', '100.5940819'),
(2, 'Sago Park', '                                ', 'Situjuah Gadang, Situjuah Limo Nagari, Kabupaten Lima Puluh Kota, Sumatera Barat 26233                                ', '-0.2820278', '100.6419218'),
(3, 'Embung Baboy', '                                ', 'Tungka, Situjuah Limo Nagari, Kabupaten Lima Puluh Kota, Sumatera Barat 26273                                ', '-0.3130336923824945', '100.60389876365662'),
(4, 'panorama kayu kolek', '                                ', 'Tanjuang Haro Sikabu-Kabu Padang Panjang, Luak, Kabupaten Lima Puluh Kota, Sumatera Barat 26261                                ', '-0.2950309590076397', '100.661780834198'),
(5, 'Batang Tabik', '                                ', 'Batang tabik, JL. 50 Kota, Sungai Kamuyang, Luak, Kabupaten Lima Puluh Kota, Sumatera Barat 25173                                ', '-0.2470628711338982', '100.67471981048584'),
(6, 'Padang Mangateh', '                                ', 'Padang Mangateh                                ', '-0.26690414944449964', '100.6909975798317'),
(7, 'Bukik Bulek', '                                ', 'Taram, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26261                                ', '-0.21148633617335558', '100.70045292377472'),
(8, 'Kapalo Banda', '                                                                ', 'Taram, Harau, Taram, Payakumbuh, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.19244813495416527', '100.72018325328827'),
(9, 'Torang Saribulan', '                                ', 'Buluh Kasok, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.15730063228339408', '100.71653008460999'),
(10, 'Pilubang Resort', '                                                                ', 'Pilubang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.16277231732723235', '100.69477200508118'),
(11, 'Sarasah Tanggo', '                                ', 'Sarilamak, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.13725923283896105', '100.6403124332428'),
(12, 'Sarasah Donat', '                                ', 'Unnamed Road, Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.13421761635207094', '100.65507531166077'),
(13, 'Panorama Harau', '                                ', 'Unnamed Road, Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.12175610438389847', '100.67041218280792'),
(14, 'Air Terjun Sarasah Murai', '                                                                                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.1089110314624541', '100.67690581083298'),
(15, 'Air Terjun Sarasah Bunta', '                                                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.10821097616618844', '100.67537426948547'),
(16, 'Istana kelinci Harau', '                                ', 'Sarasabunta, Lembah, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11013143433461577', '100.67188739776611'),
(17, 'Taman Wisata Lembah Harau', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11295311287096782', '100.66981673240662'),
(18, 'Kampung Eropa Harau', '                                ', 'Unnamed Road, Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11205725678706636', '100.67108273506165'),
(19, 'Kampung Sarasah', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.11359684177649325', '100.66815912723541'),
(20, 'Lembah Harau - Beautiful Scenery', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.10680013670789794', '100.66547691822052'),
(21, 'Panorama Lembah Harau', '                                                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                                                ', '-0.10034675236557926', '100.66610991954803'),
(22, 'Air Terjun Lembah Harau', '                                ', 'Tarantang, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.10003561659555388', '100.66592752933502'),
(23, 'Lembah Harau Akabarayun', '                                ', 'Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.09878034466592672', '100.66312193870544'),
(24, 'Harau Valley', '                                ', 'Nagari Harau, Kec. Harau, Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.08255836490991914', '100.65334796905518'),
(25, 'Ngalau saribu stopover', '                                ', 'Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat                                ', '-0.07547733984908533', '100.65132021903992'),
(26, 'Sarasah Murai', '                                ', 'Harau, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.07323501500102356', '100.6413584947586'),
(27, 'Rumah Gadang Sungai Beringin', '                                ', '7 Sungai Beringin, Sungai Beringin, Payakumbuh, Kabupaten Lima Puluh Kota, Sumatera Barat 26251                                ', '-0.22143189621261014', '100.58494627475739'),
(28, 'Bukit Batu Manda Nan Elok', '                                ', 'Sungai Talang, Guguak, Kabupaten Lima Puluh Kota, Sumatera Barat 26253                                ', '-0.18213777860107463', '100.55274367332458'),
(29, 'Menhir Belubus', '                                ', 'Sungai Talang, Guguak, Kabupaten Lima Puluh Kota, Sumatera Barat 26253                                ', '-0.18205731273702636', '100.55945992469788'),
(30, 'Rumah Barbie Kuranji', '', 'Jl. Kuranji, Guguak VIII Koto, Guguak, Kabupaten Lima Puluh Kota, Sumatera Barat 26253', '-0.1684941', '100.5678923'),
(31, 'Museum Tan Malaka', '                                ', 'Pandam Gadang, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26255                                ', '-0.08718785258913508', '100.41908383369446'),
(32, 'Ikan Larangan Ikan Banyak', '                                ', 'Pandam Gadang, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26255                                ', '-0.08074519345710048', '100.40875196456909'),
(33, 'Agro Wisata Jeruk siam Gunuang Omeh', '                                ', 'Koto Tinggi, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26256                                ', '-0.055242768311594186', '100.3672742843628'),
(34, 'Kampuang Muaro Nagari Seribu Gonjong Limo', '                                ', 'Koto Tinggi, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26256                                ', '-0.05412160545398373', '100.36160409450531'),
(35, 'Monumen PDRI Koto Tinggi', '                                ', 'Koto Tinggi, Gunuang Omeh, Kabupaten Lima Puluh Kota, Sumatera Barat 26256                                ', '-0.05086540507696572', '100.35756468772888'),
(36, 'Excepteur sed nostru', 'Amet odit non fugia', 'Voluptates voluptate', 'Ad atque placeat vo', 'Autem nemo aut labor'),
(37, 'Air Terjun Sarasah Barasok', '', 'Banja Loweh, Bukik Barisan, Kabupaten Lima Puluh Kota, Sumatera Barat 26255', '-0.0259837', '100.4772118'),
(38, 'Et delectus provide', 'Sapiente veniam dol', 'Culpa voluptates co', 'Alias voluptate omni', 'Sint vitae deleniti '),
(39, 'Bukik Posuak Maek', '                                ', 'Maek, Bukik Barisan, Kabupaten Lima Puluh Kota, Sumatera Barat 26255                                ', '0.04662751636818523', '100.53677380084991'),
(40, 'Gunung Bungsu', '                                ', 'Taeh Bukik, Payakumbuh, Kabupaten Lima Puluh Kota, Sumatera Barat 26251                                ', '-0.13563381878507758', '100.61447739601135'),
(41, 'Lorem velit mollitia', 'Voluptatibus at est ', 'Anim maxime rem volu', 'Sapiente ad architec', 'Porro esse omnis ess'),
(42, 'Kelok Sambilan', '                                ', 'Jl. Kelok Sembilan, Sarilamak, Kec. Harau, Kabupaten Lima Puluh Kota, Sumatera Barat 26271                                ', '-0.07162569087804853', '100.69873094558716'),
(43, 'Air Terjun Lubuk Batang', '', 'Jurong 2 Kec. Kapur Sembilan Kab., Koto Bangun, Kapur IX, Kabupaten Lima Puluh Kota, Sumatera Barat 28453                                                                ', '0.27609479864184355', '100.5238401889801');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_jarak_tempat`
--
ALTER TABLE `tb_jarak_tempat`
  MODIFY `id_jarak_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_tempat`
--
ALTER TABLE `tb_tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
