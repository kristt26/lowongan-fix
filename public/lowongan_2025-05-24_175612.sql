CREATE DATABASE IF NOT EXISTS lowongan CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE lowongan;

-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: lowongan
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bidang`
--

DROP TABLE IF EXISTS `bidang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bidang` (
  `id_bidang` int NOT NULL AUTO_INCREMENT,
  `nama_bidang` varchar(45) DEFAULT NULL,
  `singkatan` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_bidang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bidang`
--

/*!40000 ALTER TABLE `bidang` DISABLE KEYS */;
INSERT INTO `bidang` VALUES (1,'Bidang Kepegawaian','HRD'),(2,'Divisi ICT','IT'),(3,'Divisi Pemasaran','Marketing'),(4,'Bidang Keuangan','Finance');
/*!40000 ALTER TABLE `bidang` ENABLE KEYS */;

--
-- Table structure for table `detail_tahapan`
--

DROP TABLE IF EXISTS `detail_tahapan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detail_tahapan` (
  `id_detail_tahapan` int NOT NULL AUTO_INCREMENT,
  `id_tahapan` int NOT NULL,
  `id_periode` int NOT NULL,
  `urutan` int DEFAULT NULL,
  PRIMARY KEY (`id_detail_tahapan`),
  KEY `fk_detail_tahapan_tahapan1_idx` (`id_tahapan`),
  KEY `fk_detail_tahapan_periode1_idx` (`id_periode`),
  CONSTRAINT `fk_detail_tahapan_periode1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`) ON DELETE CASCADE,
  CONSTRAINT `fk_detail_tahapan_tahapan1` FOREIGN KEY (`id_tahapan`) REFERENCES `tahapan` (`id_tahapan`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_tahapan`
--

/*!40000 ALTER TABLE `detail_tahapan` DISABLE KEYS */;
INSERT INTO `detail_tahapan` VALUES (1,1,4,1),(2,2,4,2),(3,3,4,3),(4,4,4,4);
/*!40000 ALTER TABLE `detail_tahapan` ENABLE KEYS */;

--
-- Table structure for table `lamaran`
--

DROP TABLE IF EXISTS `lamaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lamaran` (
  `id_lamaran` int NOT NULL AUTO_INCREMENT,
  `id_pelamar` int NOT NULL,
  `id_lowongan` int NOT NULL,
  `id_detail_tahapan` int NOT NULL,
  `status` enum('Seleksi','Diterima','Ditolak') DEFAULT NULL,
  `tanggal_lamar` date DEFAULT NULL,
  PRIMARY KEY (`id_lamaran`),
  KEY `fk_lamaran_pelamar1_idx` (`id_pelamar`),
  KEY `fk_lamaran_lowongan1_idx` (`id_lowongan`),
  KEY `fk_lamaran_detail_tahapan1_idx` (`id_detail_tahapan`),
  CONSTRAINT `fk_lamaran_detail_tahapan1` FOREIGN KEY (`id_detail_tahapan`) REFERENCES `detail_tahapan` (`id_detail_tahapan`),
  CONSTRAINT `fk_lamaran_lowongan1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id_lowongan`),
  CONSTRAINT `fk_lamaran_pelamar1` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lamaran`
--

/*!40000 ALTER TABLE `lamaran` DISABLE KEYS */;
INSERT INTO `lamaran` VALUES (3,3,2,4,'Diterima','2025-05-25');
/*!40000 ALTER TABLE `lamaran` ENABLE KEYS */;

--
-- Table structure for table `lowongan`
--

DROP TABLE IF EXISTS `lowongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lowongan` (
  `id_lowongan` int NOT NULL AUTO_INCREMENT,
  `desc` text,
  `id_periode` int NOT NULL,
  `id_bidang` int NOT NULL,
  `tanggal_buka` date DEFAULT NULL,
  `tanggal_tutup` date DEFAULT NULL,
  `posisi` varchar(45) DEFAULT NULL,
  `jenis_pekerjaan` varchar(45) DEFAULT NULL,
  `perkiraan_gaji` varchar(60) DEFAULT NULL,
  `pekerjaan` text,
  `kuota` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_lowongan`),
  KEY `fk_lowongan_periode1_idx` (`id_periode`),
  KEY `fk_lowongan_bidang1_idx` (`id_bidang`),
  CONSTRAINT `fk_lowongan_bidang1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang` (`id_bidang`),
  CONSTRAINT `fk_lowongan_periode1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan`
--

/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
INSERT INTO `lowongan` VALUES (2,'<h3 data-start=\"231\" data-end=\"277\"><strong data-start=\"235\" data-end=\"277\">Lowongan: Digital Marketing Specialist</strong></h3>\n<p data-start=\"279\" data-end=\"583\"><strong data-start=\"279\" data-end=\"303\">Deskripsi Pekerjaan:</strong><br data-start=\"303\" data-end=\"306\">Kami mencari Digital Marketing Specialist yang kreatif dan berpengalaman untuk mengelola kampanye pemasaran digital kami. Posisi ini bertanggung jawab untuk meningkatkan brand awareness, mengoptimalkan konten digital, serta mendorong penjualan melalui berbagai platform online.</p>\n<p data-start=\"585\" data-end=\"606\"><strong data-start=\"585\" data-end=\"604\">Tanggung Jawab:</strong></p>\n<ul data-start=\"607\" data-end=\"1045\">\n<li data-start=\"607\" data-end=\"677\">\n<p data-start=\"609\" data-end=\"677\">Merancang dan melaksanakan strategi pemasaran digital yang efektif</p>\n</li>\n<li data-start=\"678\" data-end=\"757\">\n<p data-start=\"680\" data-end=\"757\">Mengelola kampanye iklan berbayar (Google Ads, Facebook Ads, Instagram Ads)</p>\n</li>\n<li data-start=\"758\" data-end=\"833\">\n<p data-start=\"760\" data-end=\"833\">Mengoptimalkan SEO dan konten website untuk meningkatkan trafik organik</p>\n</li>\n<li data-start=\"834\" data-end=\"908\">\n<p data-start=\"836\" data-end=\"908\">Mengelola media sosial perusahaan dan meningkatkan engagement pengguna</p>\n</li>\n<li data-start=\"909\" data-end=\"976\">\n<p data-start=\"911\" data-end=\"976\">Menganalisis data performa kampanye dan membuat laporan berkala</p>\n</li>\n<li data-start=\"977\" data-end=\"1045\">\n<p data-start=\"979\" data-end=\"1045\">Berkoordinasi dengan tim kreatif dan sales untuk sinergi pemasaran</p>\n</li>\n</ul>\n<p data-start=\"1047\" data-end=\"1065\"><strong data-start=\"1047\" data-end=\"1063\">Kualifikasi:</strong></p>\n<ul data-start=\"1066\" data-end=\"1477\">\n<li data-start=\"1066\" data-end=\"1137\">\n<p data-start=\"1068\" data-end=\"1137\">Pendidikan minimal S1 di bidang Marketing, Komunikasi, atau terkait</p>\n</li>\n<li data-start=\"1138\" data-end=\"1196\">\n<p data-start=\"1140\" data-end=\"1196\">Pengalaman minimal 2 tahun di bidang digital marketing</p>\n</li>\n<li data-start=\"1197\" data-end=\"1273\">\n<p data-start=\"1199\" data-end=\"1273\">Memahami SEO, SEM, Google Analytics, dan tools pemasaran digital lainnya</p>\n</li>\n<li data-start=\"1274\" data-end=\"1348\">\n<p data-start=\"1276\" data-end=\"1348\">Kreatif, inisiatif tinggi, dan mampu bekerja secara mandiri maupun tim</p>\n</li>\n<li data-start=\"1349\" data-end=\"1419\">\n<p data-start=\"1351\" data-end=\"1419\">Memiliki kemampuan komunikasi yang baik dan analisa data yang kuat</p>\n</li>\n<li data-start=\"1420\" data-end=\"1477\">\n<p data-start=\"1422\" data-end=\"1477\">Familiar dengan tren terbaru di dunia digital marketing</p>\n</li>\n</ul>',4,2,'2025-05-24','2025-06-06','Digital Marketing','Full-time','Rp8 - 12 jt/bulan','Mengembangkan strategi pemasaran digital dan mengelola kampanye online','2'),(3,'<h2 data-start=\"118\" data-end=\"141\">Lowongan: HR Manager</h2>\n<p data-start=\"143\" data-end=\"445\"><strong data-start=\"143\" data-end=\"167\">Deskripsi Pekerjaan:</strong><br data-start=\"167\" data-end=\"170\">Kami mencari HR Manager yang profesional dan berpengalaman untuk memimpin fungsi sumber daya manusia di perusahaan kami. Posisi ini bertanggung jawab mengelola seluruh proses HR, mulai dari rekrutmen, pengembangan karyawan, hingga pengelolaan kebijakan dan hubungan karyawan.</p>\n<p data-start=\"447\" data-end=\"468\"><strong data-start=\"447\" data-end=\"466\">Tanggung Jawab:</strong></p>\n<ul data-start=\"469\" data-end=\"980\">\n<li data-start=\"469\" data-end=\"541\">\n<p data-start=\"471\" data-end=\"541\">Merancang dan mengimplementasikan strategi HR sesuai visi perusahaan</p>\n</li>\n<li data-start=\"542\" data-end=\"593\">\n<p data-start=\"544\" data-end=\"593\">Mengelola proses rekrutmen dan seleksi karyawan</p>\n</li>\n<li data-start=\"594\" data-end=\"664\">\n<p data-start=\"596\" data-end=\"664\">Membina hubungan kerja yang harmonis antara manajemen dan karyawan</p>\n</li>\n<li data-start=\"665\" data-end=\"726\">\n<p data-start=\"667\" data-end=\"726\">Mengembangkan program pelatihan dan pengembangan karyawan</p>\n</li>\n<li data-start=\"727\" data-end=\"786\">\n<p data-start=\"729\" data-end=\"786\">Memastikan kepatuhan terhadap peraturan ketenagakerjaan</p>\n</li>\n<li data-start=\"787\" data-end=\"850\">\n<p data-start=\"789\" data-end=\"850\">Menangani administrasi kepegawaian, absensi, dan penggajian</p>\n</li>\n<li data-start=\"851\" data-end=\"916\">\n<p data-start=\"853\" data-end=\"916\">Menyusun dan mengelola kebijakan HR serta prosedur perusahaan</p>\n</li>\n<li data-start=\"917\" data-end=\"980\">\n<p data-start=\"919\" data-end=\"980\">Membuat laporan HR dan analisis data karyawan untuk manajemen</p>\n</li>\n</ul>\n<p data-start=\"982\" data-end=\"1000\"><strong data-start=\"982\" data-end=\"998\">Kualifikasi:</strong></p>\n<ul data-start=\"1001\" data-end=\"1377\">\n<li data-start=\"1001\" data-end=\"1072\">\n<p data-start=\"1003\" data-end=\"1072\">Pendidikan minimal S1 Manajemen SDM, Psikologi, atau bidang terkait</p>\n</li>\n<li data-start=\"1073\" data-end=\"1138\">\n<p data-start=\"1075\" data-end=\"1138\">Pengalaman minimal 3-5 tahun di posisi HR Manager atau setara</p>\n</li>\n<li data-start=\"1139\" data-end=\"1204\">\n<p data-start=\"1141\" data-end=\"1204\">Memahami undang-undang ketenagakerjaan dan praktik HR terbaik</p>\n</li>\n<li data-start=\"1205\" data-end=\"1262\">\n<p data-start=\"1207\" data-end=\"1262\">Memiliki kemampuan komunikasi dan negosiasi yang baik</p>\n</li>\n<li data-start=\"1263\" data-end=\"1324\">\n<p data-start=\"1265\" data-end=\"1324\">Kepemimpinan yang kuat dan mampu bekerja di bawah tekanan</p>\n</li>\n<li data-start=\"1325\" data-end=\"1377\">\n<p data-start=\"1327\" data-end=\"1377\">Familiar dengan sistem HRIS dan software payroll</p>\n</li>\n</ul>',4,1,'2025-05-25','2025-06-07','HR Manager','Kontrak','Rp15 - 20 jt/bulan','Memimpin strategi SDM dan menciptakan lingkungan kerja yang positif bagi seluruh karyawan','1'),(4,'<h2 data-start=\"76\" data-end=\"106\">Lowongan: Financial Analyst</h2>\n<p data-start=\"108\" data-end=\"327\"><strong data-start=\"108\" data-end=\"132\">Deskripsi Pekerjaan:</strong><br data-start=\"132\" data-end=\"135\">Kami mencari Financial Analyst yang detail dan analitis untuk membantu tim keuangan dalam melakukan analisis laporan keuangan, perencanaan anggaran, dan pengelolaan risiko keuangan perusahaan.</p>\n<p data-start=\"329\" data-end=\"350\"><strong data-start=\"329\" data-end=\"348\">Tanggung Jawab:</strong></p>\n<ul data-start=\"351\" data-end=\"747\">\n<li data-start=\"351\" data-end=\"416\">\n<p data-start=\"353\" data-end=\"416\">Menganalisis data keuangan dan membuat laporan keuangan rutin</p>\n</li>\n<li data-start=\"417\" data-end=\"475\">\n<p data-start=\"419\" data-end=\"475\">Membantu perencanaan anggaran dan forecasting keuangan</p>\n</li>\n<li data-start=\"476\" data-end=\"548\">\n<p data-start=\"478\" data-end=\"548\">Melakukan evaluasi kinerja keuangan dan mengidentifikasi tren bisnis</p>\n</li>\n<li data-start=\"549\" data-end=\"630\">\n<p data-start=\"551\" data-end=\"630\">Memberikan rekomendasi berdasarkan hasil analisis untuk pengambilan keputusan</p>\n</li>\n<li data-start=\"631\" data-end=\"676\">\n<p data-start=\"633\" data-end=\"676\">Memantau arus kas dan aktivitas investasi</p>\n</li>\n<li data-start=\"677\" data-end=\"747\">\n<p data-start=\"679\" data-end=\"747\">Berkolaborasi dengan departemen lain untuk mendukung tujuan bisnis</p>\n</li>\n</ul>\n<p data-start=\"749\" data-end=\"767\"><strong data-start=\"749\" data-end=\"765\">Kualifikasi:</strong></p>\n<ul data-start=\"768\" data-end=\"1108\">\n<li data-start=\"768\" data-end=\"843\">\n<p data-start=\"770\" data-end=\"843\">Pendidikan minimal S1 Akuntansi, Keuangan, Ekonomi, atau bidang terkait</p>\n</li>\n<li data-start=\"844\" data-end=\"915\">\n<p data-start=\"846\" data-end=\"915\">Pengalaman minimal 2 tahun di bidang analisis keuangan atau sejenis</p>\n</li>\n<li data-start=\"916\" data-end=\"991\">\n<p data-start=\"918\" data-end=\"991\">Mampu mengoperasikan software analisis data dan MS Excel tingkat lanjut</p>\n</li>\n<li data-start=\"992\" data-end=\"1048\">\n<p data-start=\"994\" data-end=\"1048\">Memiliki kemampuan analitis dan komunikasi yang baik</p>\n</li>\n<li data-start=\"1049\" data-end=\"1108\">\n<p data-start=\"1051\" data-end=\"1108\">Detail-oriented dan mampu bekerja dengan deadline ketat</p>\n</li>\n</ul>',4,4,'2025-05-25','2025-06-07','Financial Analyst','Freelance','Rp12 - 18 juta/bulan','Kami mencari Financial Analyst yang detail dan analitis untuk membantu tim keuangan dalam melakukan analisis laporan keuangan, perencanaan anggaran, dan pengelolaan risiko keuangan perusahaan.','3'),(5,'<h3 data-start=\"106\" data-end=\"158\"><strong data-start=\"110\" data-end=\"158\">Pengumuman Lowongan Kerja: Software Engineer</strong></h3>\n<p data-start=\"160\" data-end=\"438\">PT Teknologi Maju membuka kesempatan bagi para profesional berbakat untuk bergabung sebagai <strong data-start=\"252\" data-end=\"273\">Software Engineer</strong>. Jika kamu memiliki passion di dunia pengembangan perangkat lunak dan ingin berkontribusi dalam proyek teknologi inovatif, ini adalah kesempatan yang tepat untukmu!</p>\n<h4 data-start=\"440\" data-end=\"469\"><strong data-start=\"445\" data-end=\"469\">Deskripsi Pekerjaan:</strong></h4>\n<ul data-start=\"470\" data-end=\"761\">\n<li data-start=\"470\" data-end=\"535\">\n<p data-start=\"472\" data-end=\"535\">Mengembangkan, menguji, dan memelihara aplikasi web dan mobile.</p>\n</li>\n<li data-start=\"536\" data-end=\"626\">\n<p data-start=\"538\" data-end=\"626\">Berkolaborasi dengan tim desain dan produk untuk menghasilkan solusi berkualitas tinggi.</p>\n</li>\n<li data-start=\"627\" data-end=\"697\">\n<p data-start=\"629\" data-end=\"697\">Melakukan review kode dan memastikan standar pengembangan terpenuhi.</p>\n</li>\n<li data-start=\"698\" data-end=\"761\">\n<p data-start=\"700\" data-end=\"761\">Memecahkan masalah teknis dan meningkatkan performa aplikasi.</p>\n</li>\n</ul>\n<h4 data-start=\"763\" data-end=\"784\"><strong data-start=\"768\" data-end=\"784\">Kualifikasi:</strong></h4>\n<ul data-start=\"785\" data-end=\"1208\">\n<li data-start=\"785\" data-end=\"864\">\n<p data-start=\"787\" data-end=\"864\">Pendidikan minimal S1 Teknik Informatika, Ilmu Komputer, atau bidang terkait.</p>\n</li>\n<li data-start=\"865\" data-end=\"920\">\n<p data-start=\"867\" data-end=\"920\">Pengalaman minimal 3 tahun sebagai Software Engineer.</p>\n</li>\n<li data-start=\"921\" data-end=\"995\">\n<p data-start=\"923\" data-end=\"995\">Menguasai bahasa pemrograman seperti JavaScript, PHP, Python, atau Java.</p>\n</li>\n<li data-start=\"996\" data-end=\"1076\">\n<p data-start=\"998\" data-end=\"1076\">Berpengalaman dengan framework populer (React, Angular, Laravel, Django, dsb).</p>\n</li>\n<li data-start=\"1077\" data-end=\"1141\">\n<p data-start=\"1079\" data-end=\"1141\">Memahami konsep REST API, database, dan version control (Git).</p>\n</li>\n<li data-start=\"1142\" data-end=\"1208\">\n<p data-start=\"1144\" data-end=\"1208\">Mampu bekerja secara tim maupun individu dengan komunikasi baik.</p>\n</li>\n</ul>',4,2,'2025-05-25','2025-06-06','Software Engineer','Kontrak','Rp12 - 22 juta/bulan','PT Teknologi Maju membuka kesempatan bagi para profesional berbakat untuk bergabung sebagai Software Engineer. Jika kamu memiliki passion di dunia pengembangan perangkat lunak dan ingin berkontribusi dalam proyek teknologi inovatif, ini adalah kesempatan yang tepat untukmu!','5');
/*!40000 ALTER TABLE `lowongan` ENABLE KEYS */;

--
-- Table structure for table `pelamar`
--

DROP TABLE IF EXISTS `pelamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelamar` (
  `id_pelamar` int NOT NULL AUTO_INCREMENT,
  `nik` varchar(15) DEFAULT NULL,
  `nama_pelamar` varchar(50) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `ijazah` varchar(255) DEFAULT NULL,
  `skck` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_pelamar`),
  KEY `fk_pelamar_users_idx` (`id_users`),
  CONSTRAINT `fk_pelamar_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelamar`
--

/*!40000 ALTER TABLE `pelamar` DISABLE KEYS */;
INSERT INTO `pelamar` VALUES (3,'123444444444444','Deni Malik','08111111111','6831f06f03251.jpeg',NULL,'Jayapura','2011-06-24','6831f06f04053.pdf','6831f06f04907.pdf','6831f06f0615e.pdf','6831f06f068e6.pdf','6831f06f078b8.pdf',4);
/*!40000 ALTER TABLE `pelamar` ENABLE KEYS */;

--
-- Table structure for table `periode`
--

DROP TABLE IF EXISTS `periode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `periode` (
  `id_periode` int NOT NULL AUTO_INCREMENT,
  `periode` varchar(45) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id_periode`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `periode`
--

/*!40000 ALTER TABLE `periode` DISABLE KEYS */;
INSERT INTO `periode` VALUES (4,'2025','1');
/*!40000 ALTER TABLE `periode` ENABLE KEYS */;

--
-- Table structure for table `tahapan`
--

DROP TABLE IF EXISTS `tahapan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tahapan` (
  `id_tahapan` int NOT NULL AUTO_INCREMENT,
  `nama_tahapan` varchar(45) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `keterangan` text,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tahapan`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tahapan`
--

/*!40000 ALTER TABLE `tahapan` DISABLE KEYS */;
INSERT INTO `tahapan` VALUES (1,'Seleksi Administrasi','1','Verifikasi dokumen dan persyaratan administrasi','fas fa-file-alt'),(2,'Tes Tertulis','1','Uji pengetahuan dan kemampuan dasar','fas fa-pencil-alt'),(3,'Wawancara','0','Wawancara dengan manajer dan tim HR','fas fa-comments'),(4,'Pengumuman Hasil','1','Pengumuman hasil akhir bagi yang dinyatakan lulus','fas fa-handshake');
/*!40000 ALTER TABLE `tahapan` ENABLE KEYS */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','Pelamar') DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$.156.etqXviVdS9sM2m6seafyZO.kItiZ5OyWD6NFDkcVppBo2r0G','Admin'),(4,'deni','$2y$10$SY2VfVL.0IuPiC5ky3Pa7uh9r16u8e.U1GFySYCrp4zAxiPpbW85S','Pelamar');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

--
-- Dumping routines for database 'lowongan'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-25  5:37:14
