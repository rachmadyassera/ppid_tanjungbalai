-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2020 at 05:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_whistleblower`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_capil`
--

CREATE TABLE `tbl_capil` (
  `nik` bigint(16) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_capil`
--

INSERT INTO `tbl_capil` (`nik`, `nama_pelapor`) VALUES
(1274062203940004, 'Rachmad Yasser Al Zuhri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text DEFAULT NULL,
  `inbox_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `inbox_status` int(11) DEFAULT 1 COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_nama` varchar(30) DEFAULT NULL,
  `komentar_email` varchar(50) DEFAULT NULL,
  `komentar_isi` varchar(120) DEFAULT NULL,
  `komentar_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `komentar_status` varchar(2) DEFAULT NULL,
  `komentar_tulisan_id` int(11) DEFAULT NULL,
  `komentar_parent` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_komentar`
--

INSERT INTO `tbl_komentar` (`komentar_id`, `komentar_nama`, `komentar_email`, `komentar_isi`, `komentar_tanggal`, `komentar_status`, `komentar_tulisan_id`, `komentar_parent`) VALUES
(1, 'M Fikri', 'fikrifiver97@gmail.com', ' Nice Post.', '2018-08-07 15:09:07', '1', 24, 0),
(2, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', ' Awesome Post', '2018-08-07 15:14:26', '1', 24, 0),
(11, 'test', 'test@test.com', ' test', '2019-10-12 08:11:50', '1', 24, 0),
(15, 'M Fikri Setiadi', '', '2', '2019-10-13 14:55:31', '1', 24, 2),
(16, 'M Fikri Setiadi', '', '3', '2019-10-13 14:55:45', '1', 24, 11),
(17, 'zuhri', '', '2', '2019-10-13 14:56:47', '1', 24, 1),
(18, 'zuhri', '', '3', '2019-10-13 14:57:13', '1', 24, 11),
(19, 'zuhri', '', '5', '2019-10-13 14:58:03', '1', 24, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lapor`
--

CREATE TABLE `tbl_lapor` (
  `inbox_id` int(11) NOT NULL,
  `inbox_topik` text NOT NULL,
  `inbox_tglkejadian` varchar(120) NOT NULL,
  `inbox_kategori_laporan` text NOT NULL,
  `inbox_lokasi` text NOT NULL,
  `inbox_kronologis` text NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_file` varchar(120) NOT NULL,
  `inbox_idwb` varchar(13) NOT NULL,
  `inbox_tindaklanjut` int(11) NOT NULL COMMENT '0 = Sedang Proses, 1 = Diterima, 2 = Ditolak',
  `inbox_keterangan` text NOT NULL,
  `inbox_filetl` varchar(120) NOT NULL,
  `inbox_filetl2` varchar(120) NOT NULL,
  `inbox_filetl3` varchar(120) NOT NULL,
  `inbox_author` varchar(40) NOT NULL,
  `inbox_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `inbox_tanggal_verif` timestamp NULL DEFAULT NULL,
  `inbox_status` int(11) DEFAULT 1 COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lapor`
--

INSERT INTO `tbl_lapor` (`inbox_id`, `inbox_topik`, `inbox_tglkejadian`, `inbox_kategori_laporan`, `inbox_lokasi`, `inbox_kronologis`, `inbox_nama`, `inbox_email`, `inbox_file`, `inbox_idwb`, `inbox_tindaklanjut`, `inbox_keterangan`, `inbox_filetl`, `inbox_filetl2`, `inbox_filetl3`, `inbox_author`, `inbox_tanggal`, `inbox_tanggal_verif`, `inbox_status`) VALUES
(1, 'Tumpukan Sampah tidak diangkat', '3 Juli 2020', 'Kebersihan Lingkungan', 'Jl. Jend. Sudirman', 'Sampah dijalan tidak diangkat mulai dari semalam. mengakibat kan aroma yang tidak enak dilingkungan masyarakat', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser@gmail.com', 'ce2ab368866dd70a7b10722cfe556b7f.jpg', ' IDSB-9343114', 1, '21 49 uji coba send mail, parsing data gambar', 'ade10037ea713f9ef0755c5b64135a6f.jpg', '', '', 'Super Admin', '2020-07-13 10:40:46', '2020-07-16 09:49:45', 0),
(2, '1', '1', '1', '1', '1', 'Rachmad Yasser Al Zuhri', '1985rohmathidayat@gmail.com', '783818c03ec559bab33984876ea53ae8.pdf', ' IDSB-4586118', 1, '', '7b0896dc64a6e0a51c1fb6a079e42179.jpg', '4d8ef0c011d8d99ef098be21191143d8.jpg', '8fa0e36538ee9b09c6e082a6abf90536.jpg', 'Super Admin', '2020-07-13 11:13:21', '2020-07-20 00:26:01', 0),
(3, 'Sanitasi tidak lancar', '22 MARET 2020', 'Kebersihan Lingkungan', 'Jl. Jend. Sudirman', 'bla bla bla bla bla bla bla bla bla bla bla bla bla bla ', 'Rachmad Yasser Al Zuhri', 'adniluthfirafiqa1906@gmail.com', '211fd56979e25db40b1308e53f1017e3.jpg', ' IDSB-3240556', 1, 'Kami telah melakukan pengechekan pada daerah tersebut. dan kami telat melakukan perbaikan pada sanitasi . sanitasi tertahan dikarenakan ada nya tumpukan sampah pada saluran air. kami menghimbau agar tidak membuang sampah sembarangan.', '426e0287fcb1ad3efe1b054b7a28da41.jpg', '', '', 'Super Admin', '2020-07-16 15:02:29', '2020-07-16 10:02:38', 0),
(4, 'Bantuan Sosial tidak Tepat sasaran', '22 MARET 2020', 'Bantuan Sosial', 'Selat Lancang', 'Bla bla bla bla bla bla bla bla', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', '1e36d6a74e449c0ff9e818920de1212a.jpg', ' IDSK-4668410', 1, 'test parsing data gambar 3', 'bb533acc6766b3a186296fc32111557c.jpg', '04ab0cf98d136e788a3205e2a7284454.jpg', '0ba1cbf6a8f6437fbd8e85730a371ce1.jpg', 'Super Admin', '2020-07-20 04:22:21', '2020-07-20 02:08:21', 0),
(5, 'Bantuan Sosial tidak Tepat sasaran', '22 MARET 2020', 'Bantuan Sosial', 'Selat Lancang', 'Bla bla bla bla bla bla bla bla', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', 'ab69ab6e25362f41694c3d31738d554c.jpg', ' IDSK-4668410', 0, '', '', '', '', '', '2020-07-20 04:24:18', NULL, 0),
(6, 'Bantuan Sosial tidak Tepat sasaran', '22 MARET 2020', 'Bantuan Sosial', 'Selat Lancang', 'Bla bla bla bla bla bla bla bla', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', '8ccd7acc43fb9acb18564c66579891ad.jpg', ' IDSK-4668410', 0, '', '', '', '', '', '2020-07-20 04:25:20', NULL, 0),
(7, 'Bantuan Sosial tidak Tepat sasaran', '22 MARET 2020', 'Bantuan Sosial', 'Selat Lancang', 'Bla bla bla bla bla bla bla bla', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', '432a8f919b12750827aee9ff5c9ae2b1.jpg', ' IDSK-4668410', 1, 'testing send mail 3 file dan save data ', '', '', '', 'Super Admin', '2020-07-20 04:25:35', '2020-07-20 00:17:43', 0),
(8, 'Anak SD tidak dapat mengikuti pembelajran', '22 MARET 2020', 'Pendidikan', 'SD N14', 'bla bla bla bal', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', '3fc3bc80adf9343eb6114491734f8334.jpg', ' IDSK-3601897', 1, 'uji send mail,  simpan data 3 gambar', '80110c8d45fa55d137195ee4f9f3ceaa.jpg', '692a1f610a8edb5c87f19f8831e36f4b.jpg', '8edc81eaf398f3d5252d45d1506bbbd5.jpg', 'Super Admin', '2020-07-20 13:29:30', '2020-07-20 08:29:53', 0),
(9, 'Pembuatan KTP terlalu berbelit', '22 MARET 2020', 'Administrasi Data Penduduk', 'Kantor Disdukcapil', 'Tahapan pembuatan ktp terlalu banyak, mengakibat masyarakat malas membuat ktp untuk memperbaharui data kependudukan, mohon dinas dukcapil untuk mempermudah administrasi nya.', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', 'f2c44657d811d64be32fed5585d3e6c2.jpg', ' IDSK-3846278', 0, '', '', '', '', '', '2020-07-21 09:26:01', NULL, 0),
(10, 'test tanggal form laporan', '', 'TI dan Informasi Publik', 'Kantor Walikota', 'bla bla bla bla', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', '95cd2c4027ddc89a3d5c42e3fbf5afd4.jpg', ' IDSK-2582125', 1, 'uji coba 21 33', 'f1fe2ce990ab27ca130d974df78292d7.jpg', '806cb120691813742eb3b0fc09d9a6f8.jpg', '8906342e33f35e8a7c3966f005486b07.jpg', 'Super Admin', '2020-07-22 04:25:01', '2020-07-23 09:33:48', 0),
(11, 'Uji coba tanggal kejadian format tanggal', '2020-07-01', 'TI dan Informasi Publik', 'Kantor Walikota', 'bla bla bla bla bla', 'Rachmad Yasser Al Zuhri', 'rachmad.yasser.a@gmail.com', 'cff65ae0d2fe695a4ca466607e84224e.jpg', ' IDSK-3634566', 0, '', '', '', '', '', '2020-07-22 04:28:02', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_aktivitas`
--

CREATE TABLE `tbl_log_aktivitas` (
  `log_id` int(11) NOT NULL,
  `log_nama` text DEFAULT NULL,
  `log_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `log_ip` varchar(20) DEFAULT NULL,
  `log_pengguna_id` int(11) DEFAULT NULL,
  `log_icon` blob DEFAULT NULL,
  `log_jenis_icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opd`
--

CREATE TABLE `tbl_opd` (
  `opd_id` int(11) NOT NULL,
  `opd_nama` text DEFAULT NULL,
  `opd_email` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_opd`
--

INSERT INTO `tbl_opd` (`opd_id`, `opd_nama`, `opd_email`) VALUES
(1, 'Dinas Komunikasi dan Informatika ', 'diskominfo@tanjungbalaikota.go.id'),
(4, 'OPD Uji Coba', 'rachmad.yasser.a@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_moto` varchar(100) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_tentang` text DEFAULT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_facebook` varchar(35) DEFAULT NULL,
  `pengguna_twitter` varchar(35) DEFAULT NULL,
  `pengguna_linkdin` varchar(35) DEFAULT NULL,
  `pengguna_google_plus` varchar(35) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT 1,
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT current_timestamp(),
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_moto`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_tentang`, `pengguna_email`, `pengguna_nohp`, `pengguna_facebook`, `pengguna_twitter`, `pengguna_linkdin`, `pengguna_google_plus`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
(1, 'Super Admin', 'Just do it', 'L', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'I am a mountainner. to me mountainerring is a life', 'admin@admin.com', '081277159401', 'facebook.com/m_fikri_setiadi', 'twitter.com/fiver_fiver', '', '', 1, '1', '2016-09-03 06:07:55', '27006d40640e6689cd7cd5a41ab56407.jpeg'),
(2, 'zuhri', NULL, 'L', 'zuhri', 'b32751c717d101073435c193fad27b79', NULL, 'admin@admin.com', '081279329132', NULL, NULL, NULL, NULL, 1, '2', '2019-10-13 14:56:26', '7416b55f408fb4e81d8194a17014b116.jpg'),
(3, 'Admin 1 WBS Inspektorat', NULL, 'L', 'adminwbs1', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'admin@admin.com', '0', NULL, NULL, NULL, NULL, 1, '1', '2019-10-26 17:54:11', 'bcfedee7d998b68272d362c6c49b1620.png'),
(4, 'Operator WBS Inspektorat', NULL, 'L', 'oprwbs1', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'contoh@contoh.com', '0', NULL, NULL, NULL, NULL, 1, '2', '2019-10-26 17:57:41', 'd8162db888752aab5859ea77cf2a6566.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengunjung`
--

INSERT INTO `tbl_pengunjung` (`pengunjung_id`, `pengunjung_tanggal`, `pengunjung_ip`, `pengunjung_perangkat`) VALUES
(930, '2018-08-09 08:04:59', '::1', 'Chrome'),
(931, '2019-08-20 09:21:57', '::1', 'Opera'),
(932, '2019-09-17 08:48:15', '::1', 'Chrome'),
(933, '2019-10-12 07:18:30', '::1', 'Opera'),
(934, '2019-10-13 14:33:28', '::1', 'Chrome'),
(935, '2019-10-14 14:02:58', '::1', 'Chrome'),
(936, '2019-10-15 03:58:49', '::1', 'Chrome'),
(937, '2019-10-16 01:45:31', '::1', 'Chrome'),
(938, '2019-10-17 06:17:35', '::1', 'Chrome'),
(939, '2019-10-20 05:57:03', '::1', 'Chrome'),
(940, '2019-10-20 17:06:12', '::1', 'Chrome'),
(941, '2019-10-22 03:33:22', '::1', 'Chrome'),
(942, '2019-10-23 08:38:37', '::1', 'Chrome'),
(943, '2019-10-24 02:20:28', '::1', 'Chrome'),
(944, '2019-10-25 16:01:11', '::1', 'Chrome'),
(945, '2019-10-26 04:17:08', '::1', 'Chrome'),
(946, '2019-10-26 17:47:46', '::1', 'Chrome'),
(947, '2019-10-30 02:48:31', '::1', 'Opera'),
(948, '2019-11-16 03:12:12', '::1', 'Opera'),
(949, '2019-12-07 03:53:26', '::1', 'Chrome'),
(950, '2020-02-11 02:16:28', '::1', 'Chrome'),
(951, '2020-02-18 04:30:55', '::1', 'Chrome'),
(952, '2020-02-20 03:23:24', '::1', 'Firefox'),
(953, '2020-02-21 02:13:42', '::1', 'Firefox'),
(954, '2020-02-22 04:15:49', '127.0.0.1', 'Firefox'),
(955, '2020-02-26 01:31:30', '::1', 'Firefox'),
(956, '2020-03-19 03:39:09', '::1', 'Chrome'),
(957, '2020-03-23 04:49:01', '::1', 'Chrome'),
(958, '2020-05-17 06:51:13', '::1', 'Chrome'),
(959, '2020-07-13 08:07:14', '::1', 'Chrome'),
(960, '2020-07-16 14:59:19', '::1', 'Chrome'),
(961, '2020-07-20 03:32:27', '::1', 'Chrome'),
(962, '2020-07-21 05:04:39', '::1', 'Chrome'),
(963, '2020-07-22 02:36:37', '::1', 'Chrome'),
(964, '2020-07-23 03:48:30', '::1', 'Chrome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `komentar_tulisan_id` (`komentar_tulisan_id`);

--
-- Indexes for table `tbl_lapor`
--
ALTER TABLE `tbl_lapor`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_pengguna_id` (`log_pengguna_id`);

--
-- Indexes for table `tbl_opd`
--
ALTER TABLE `tbl_opd`
  ADD PRIMARY KEY (`opd_id`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_lapor`
--
ALTER TABLE `tbl_lapor`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_opd`
--
ALTER TABLE `tbl_opd`
  MODIFY `opd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=965;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
