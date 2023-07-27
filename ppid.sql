-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_ppid2
CREATE DATABASE IF NOT EXISTS `db_ppid2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_ppid2`;

-- Dumping structure for table db_ppid2.dokumen_informasi
CREATE TABLE IF NOT EXISTS `dokumen_informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` text,
  `dokumen` varchar(50) DEFAULT NULL,
  `petugas` text,
  `tgl_terdaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ppid2.dokumen_informasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `dokumen_informasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `dokumen_informasi` ENABLE KEYS */;

-- Dumping structure for table db_ppid2.permohonan_informasi
CREATE TABLE IF NOT EXISTS `permohonan_informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` text NOT NULL,
  `nik_nokemenkumham` text NOT NULL,
  `alamat` text NOT NULL,
  `nohp` varchar(13) NOT NULL DEFAULT '',
  `email` text NOT NULL,
  `gfile` varchar(50) NOT NULL DEFAULT '',
  `mohon_informasi` text NOT NULL,
  `tujuan_informasi` text NOT NULL,
  `idpi` text NOT NULL,
  `tgl_terdaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ppid2.permohonan_informasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `permohonan_informasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `permohonan_informasi` ENABLE KEYS */;

-- Dumping structure for table db_ppid2.tbl_opd
CREATE TABLE IF NOT EXISTS `tbl_opd` (
  `opd_id` int(11) NOT NULL AUTO_INCREMENT,
  `opd_nama` text,
  `opd_email` text,
  PRIMARY KEY (`opd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ppid2.tbl_opd: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_opd` DISABLE KEYS */;
REPLACE INTO `tbl_opd` (`opd_id`, `opd_nama`, `opd_email`) VALUES
	(1, 'Dinas Komunikasi dan Informatika ', 'diskominfo@tanjungbalaikota.go.id'),
	(5, 'Badan Perencanaan Pembangunan Daerah', 'rachmad.yasser.a@gmail.com');
/*!40000 ALTER TABLE `tbl_opd` ENABLE KEYS */;

-- Dumping structure for table db_ppid2.tbl_pengguna
CREATE TABLE IF NOT EXISTS `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `pengguna_photo` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`pengguna_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ppid2.tbl_pengguna: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_pengguna` DISABLE KEYS */;
REPLACE INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_moto`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_tentang`, `pengguna_email`, `pengguna_nohp`, `pengguna_facebook`, `pengguna_twitter`, `pengguna_linkdin`, `pengguna_google_plus`, `pengguna_status`, `pengguna_level`, `pengguna_register`, `pengguna_photo`) VALUES
	(1, 'Super Admin', 'Just do it', 'L', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', 'I am a mountainner. to me mountainerring is a life', 'admin@admin.com', '081277159401', 'facebook.com/m_fikri_setiadi', 'twitter.com/fiver_fiver', '', '', 1, '1', '2016-09-03 13:07:55', '27006d40640e6689cd7cd5a41ab56407.jpeg'),
	(2, 'zuhri', NULL, 'L', 'zuhri', 'a76808aa93bfdfc442ddc3fccaa5ebb9', NULL, 'admin@admin.com', '081279329132', NULL, NULL, NULL, NULL, 1, '2', '2019-10-13 21:56:26', '7416b55f408fb4e81d8194a17014b116.jpg');
/*!40000 ALTER TABLE `tbl_pengguna` ENABLE KEYS */;

-- Dumping structure for table db_ppid2.tindaklanjut_informasi
CREATE TABLE IF NOT EXISTS `tindaklanjut_informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpi` text NOT NULL,
  `status` int(1) NOT NULL COMMENT '1 = Disetujui, 2 = Ditolak',
  `keterangan` text NOT NULL,
  `petugas` varchar(50) NOT NULL DEFAULT '0',
  `id_dokumen_informasi` int(11) DEFAULT NULL,
  `tgl_terdaftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ppid2.tindaklanjut_informasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `tindaklanjut_informasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `tindaklanjut_informasi` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
