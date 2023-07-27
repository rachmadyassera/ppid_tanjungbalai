-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2019 pada 18.50
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_websekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_pesan` text,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(2, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ping !', '2017-06-21 03:44:12', 0),
(3, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ini adalah pesan ', '2017-06-21 03:45:57', 0),
(5, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Ping !', '2017-06-21 03:53:19', 0),
(7, 'M Fikri Setiadi', 'fikrifiver97@gmail.com', '-', 'Hi, there!', '2017-07-01 07:28:08', 0),
(8, 'M Fikri', 'fikrifiver97@gmail.com', '084375684364', 'Hi There, Would you please help me about register?', '2018-08-06 13:51:07', 0),
(9, 'test', 'tester@gmail.com', '081279329132', 'test', '2019-10-12 07:33:36', 0),
(10, 'test', 'tester@gmail.com', '081279329132', 'test', '2019-10-12 08:19:56', 0),
(11, '1', 'admin@admin.com', '', '', '2019-10-16 08:19:51', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_komentar`
--

CREATE TABLE `tbl_komentar` (
  `komentar_id` int(11) NOT NULL,
  `komentar_nama` varchar(30) DEFAULT NULL,
  `komentar_email` varchar(50) DEFAULT NULL,
  `komentar_isi` varchar(120) DEFAULT NULL,
  `komentar_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `komentar_status` varchar(2) DEFAULT NULL,
  `komentar_tulisan_id` int(11) DEFAULT NULL,
  `komentar_parent` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_komentar`
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
-- Struktur dari tabel `tbl_lapor`
--

CREATE TABLE `tbl_lapor` (
  `inbox_id` int(11) NOT NULL,
  `inbox_topik` text NOT NULL,
  `inbox_tglkejadian` varchar(120) NOT NULL,
  `inbox_pejabat` text NOT NULL,
  `inbox_lokasi` text NOT NULL,
  `inbox_kronologis` text NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_file` varchar(120) NOT NULL,
  `inbox_idwb` varchar(13) NOT NULL,
  `inbox_tindaklanjut` int(11) NOT NULL COMMENT '0 = Sedang Proses, 1 = Diterima, 2 = Ditolak',
  `inbox_keterangan` text NOT NULL,
  `inbox_filetl` varchar(120) NOT NULL,
  `inbox_author` varchar(40) NOT NULL,
  `inbox_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inbox_status` int(11) DEFAULT '1' COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_lapor`
--

INSERT INTO `tbl_lapor` (`inbox_id`, `inbox_topik`, `inbox_tglkejadian`, `inbox_pejabat`, `inbox_lokasi`, `inbox_kronologis`, `inbox_nama`, `inbox_email`, `inbox_file`, `inbox_idwb`, `inbox_tindaklanjut`, `inbox_keterangan`, `inbox_filetl`, `inbox_author`, `inbox_tanggal`, `inbox_status`) VALUES
(24, '122', '122', '122', '122', '122', '122', 'admin@admin.com', '2883032a819e209ba2df8ab4f7eadfbc.pdf', ' IDWB-508285', 2, 'test', '', 'M Fikri Setiadi', '2019-10-20 07:21:01', 1),
(25, '5', '5', '5', '5', '5', '5', 'admin@admin.com', '2f9cc11762c34f280b3264a87f3f4154.docx', ' IDWB-456725', 0, '', '', 'zuhri', '2019-10-21 08:14:00', 0),
(26, '51', '51', '51', '51', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '51', 'hendy@hendy.com', 'ba5480b39618103b5ee524e191cf6fd4.zip', ' IDWB-568121', 1, 'bree', 'fa07227ad61778bb0225c655a271897b.pdf', 'M Fikri Setiadi', '2019-10-21 09:33:05', 0),
(27, 'test', 'test', 'test', 'test', 'test', 'test', 'admin@admin.com', '301a842ee466ee7da4ddfa40e9973941.zip', ' IDWB-885368', 0, '', '', 'M Fikri Setiadi', '2019-10-22 03:45:50', 0),
(28, 'best', 'best', 'best ', 'best', 'best ', 'best', 'admin@admin.com', 'efe2a59a47c2f09111049e3204aed843.pdf', ' IDWB-225096', 0, '', '', 'M Fikri Setiadi', '2019-10-22 05:27:05', 0),
(29, 'rest', 'rest', 'rest', 'rest', 'rest', 'rest', 'hendy@hendy.com', 'bbdf6f9e3b66feb945ae88217fe15b7d.pdf', ' IDWB-968650', 2, 'brebre', '', 'M Fikri Setiadi', '2019-10-22 05:27:52', 1),
(30, 'PUNGLI PENERBITAN E-KTP PADA DUKCAPIL #CONTOH', '22 MARET 2019, Sekitar Pukul 10 Pagi lebih 30 Menit', 'Staff Administrasi Bagian Rekam Data, Petugas Sekitarnya #Contoh', 'Kantor Dinas Kependudukan dan Catatan Sipil', 'Pada saat ini saya sedang melakukan pengajuan pembuatan KTP baru karena, KTP sebelumnya Hilang, ketika diruangan tersebut, saya dimintai uang jika ingin KTP nya Cepat Selesai, mohon kiranya bapak / ibu dapat memberikan Sanksi Tegas kepada petugas, agar tidak menambah beban hidup masyarakat. #Contoh', 'Fulan Bin Fulan', 'contoh@contoh.com', '85029f3c493b3f2662ec0fb9515581a3.zip', ' IDWB-940962', 1, 'Terimaskasih atas partisipasi nya dalam menggunakan whistle blower, Meninjau dari Laporan yang bapak berikan kepada kami, Setelah kami selidiki, tidak ada terjadi pungutan liar terhadap penerbinta E-KTP, Jika Bapak/Ibu punya bukti lebih kuat, Silahkan buat Laporan Kembali\r\n Untuk Lebih jelasnya kami akan memberikan Surat Keterangan Hasil Penyelidikan Laporan yang Bapak/ Ibu Berikan.', 'a4434868a3b3f16b31306ed4835dd540.pdf', 'M Fikri Setiadi', '2019-10-24 05:49:43', 0),
(31, 'ASN BOLOS, PELAYANAN PUBLIK TIDAK TERPENUHI DI KELURAHAN SIJAMBI #CONTOH', '23 APRIL 2019', 'STAFF LURAH, LURAH, TIDAK ADA DITEMPAT WAKTU PAGI', 'KANTOR LURAH SIJAMBI', 'Mohon Bapak/Ibu Pimpinan Inspektorat untuk dapat menindak lanjuti serta memberikan sanksi kepada ASN dan Pejabat di kantor lurah tersebut, akibat dari itu pelayanan kepada masyarakat tidak efektif secara maksimal.', 'Si Contoh', 'contoh@contoh.com', 'b3a86783412add45fe13bb4e7dd46437.pdf', ' IDWB-347487', 0, '', '', '', '2019-10-25 16:04:26', 0),
(32, '#CONTOH MOTOR ANGKUTAN SAMPAH TIDAK PERNAH MENGANGKUT SAMPAH PADA KELURAHAN BUNGA TANJUNG, LK. I', '8 AGUSTUS 2019, PAGI HARI', 'PETUGAS KEBERSIHAN ANGKUTAN SAMPAH, KELURAHAN BUNGA TANJUNG', 'KELURAHAN BUNGA TANJUNG', 'Dear Bapak/Ibu Inspektorat, saya melaporkan telah terjadi tindakan pelanggaran pada Dinas Kebersihan atau Lingkungan Hidup dalam menjalankan tugas nya, telah saya temukan aktivitas kebersihan pada kelurahan bunga tanjung tidak ada dalam satu minggu ini, mohon kepada inspektorat untuk dapat menindaklanjuti laporan ini, jika terdapat pelanggaran mohon kiranya untuk dapat diberikan teguran kepada petugas terkait .', 'Si Uji Coba', 'ujicoba@ujicoba', '73dca0a420193fc87047fc5d07522545.pdf', ' IDWB-643654', 0, '', '', '', '2019-10-25 16:09:48', 0),
(33, 'UJI COBA ', 'UJI COBA ', 'UJI COBA ', 'UJI COBA ', 'UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA \r\n\r\n\r\nUJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA UJI COBA ', 'UJI COBA ', 'ujicoba@ujicoba', '291f635dcee94428acb80276fd74d5a8.pdf', ' IDWB-556123', 0, '', '', '', '2019-10-26 04:29:20', 0),
(34, 'FINAL TEST', 'FINAL TEST', 'FINAL TEST', 'FINAL TEST', 'FINAL TEST', 'FINAL TEST', 'ujicoba@ujicoba', '76839157cc331ced4369f4bb9d3be221.pdf', ' IDWB-540613', 0, '', '', '', '2019-10-26 04:31:58', 0),
(35, '123', '123', '123', '123', '123', '123', 'hendy@hendy.com', 'd5c6ba05dbf9c18ea51e8e807472703f.pdf', ' IDWB-205460', 0, '', '', '', '2019-10-26 04:35:16', 0),
(36, '5151', '5151', '5151', '5151', '5151', '515151', 'contoh@contoh.com', '40965a17c84eaf24b6bb8c49c00391d3.pdf', ' IDWB-5801667', 0, '', '', '', '2019-10-26 04:55:27', 0),
(37, '123', '123', '123', '123', '123', '123', 'hendy@hendy.com', 'ae10c247563ff3aee3f57ab6c1665f2f.pdf', ' IDWB-1923913', 0, '', '', '', '2019-10-26 16:49:24', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_log_aktivitas`
--

CREATE TABLE `tbl_log_aktivitas` (
  `log_id` int(11) NOT NULL,
  `log_nama` text,
  `log_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `log_ip` varchar(20) DEFAULT NULL,
  `log_pengguna_id` int(11) DEFAULT NULL,
  `log_icon` blob,
  `log_jenis_icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(50) DEFAULT NULL,
  `pengguna_moto` varchar(100) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_tentang` text,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(20) DEFAULT NULL,
  `pengguna_facebook` varchar(35) DEFAULT NULL,
  `pengguna_twitter` varchar(35) DEFAULT NULL,
  `pengguna_linkdin` varchar(35) DEFAULT NULL,
  `pengguna_google_plus` varchar(35) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(3) DEFAULT NULL,
  `pengguna_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengguna_photo` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_moto`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_tentang`, `pengguna_email`, `pengguna_nohp`, `pengguna_facebook`, `pengguna_twitter`, `pengguna_linkdin`, `pengguna_google_plus`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
(1, 'M Fikri Setiadi', 'Just do it', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'I am a mountainner. to me mountainerring is a life', 'fikrifiver97@gmail.com', '081277159401', 'facebook.com/m_fikri_setiadi', 'twitter.com/fiver_fiver', '', '', 1, '1', '2016-09-03 06:07:55', 'db5dec647062751f2fb236b9bc3f1c54.png'),
(2, 'zuhri', NULL, 'L', 'zuhri', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'admin@admin.com', '081279329132', NULL, NULL, NULL, NULL, 1, '2', '2019-10-13 14:56:26', '7416b55f408fb4e81d8194a17014b116.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengunjung`
--

CREATE TABLE `tbl_pengunjung` (
  `pengunjung_id` int(11) NOT NULL,
  `pengunjung_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `pengunjung_ip` varchar(40) DEFAULT NULL,
  `pengunjung_perangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengunjung`
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
(945, '2019-10-26 04:17:08', '::1', 'Chrome');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indeks untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `komentar_tulisan_id` (`komentar_tulisan_id`);

--
-- Indeks untuk tabel `tbl_lapor`
--
ALTER TABLE `tbl_lapor`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indeks untuk tabel `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `log_pengguna_id` (`log_pengguna_id`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indeks untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  ADD PRIMARY KEY (`pengunjung_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_komentar`
--
ALTER TABLE `tbl_komentar`
  MODIFY `komentar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tbl_lapor`
--
ALTER TABLE `tbl_lapor`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tbl_log_aktivitas`
--
ALTER TABLE `tbl_log_aktivitas`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengunjung`
--
ALTER TABLE `tbl_pengunjung`
  MODIFY `pengunjung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=946;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
