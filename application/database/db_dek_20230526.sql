-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: db_dek
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.27-MariaDB

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
-- Table structure for table `dek_banner`
--

DROP TABLE IF EXISTS `dek_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `halaman_utama` varchar(255) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `galeri` varchar(255) DEFAULT NULL,
  `tentang_kami` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_banner`
--

LOCK TABLES `dek_banner` WRITE;
/*!40000 ALTER TABLE `dek_banner` DISABLE KEYS */;
/*!40000 ALTER TABLE `dek_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_client`
--

DROP TABLE IF EXISTS `dek_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_client`
--

LOCK TABLES `dek_client` WRITE;
/*!40000 ALTER TABLE `dek_client` DISABLE KEYS */;
/*!40000 ALTER TABLE `dek_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_galeri`
--

DROP TABLE IF EXISTS `dek_galeri`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_galeri` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_galeri`
--

LOCK TABLES `dek_galeri` WRITE;
/*!40000 ALTER TABLE `dek_galeri` DISABLE KEYS */;
/*!40000 ALTER TABLE `dek_galeri` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_kategori_layanan`
--

DROP TABLE IF EXISTS `dek_kategori_layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_kategori_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_kategori_layanan`
--

LOCK TABLES `dek_kategori_layanan` WRITE;
/*!40000 ALTER TABLE `dek_kategori_layanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `dek_kategori_layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_main_popup`
--

DROP TABLE IF EXISTS `dek_main_popup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_main_popup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_main_popup`
--

LOCK TABLES `dek_main_popup` WRITE;
/*!40000 ALTER TABLE `dek_main_popup` DISABLE KEYS */;
INSERT INTO `dek_main_popup` VALUES (1,'DITO_ENVIRO_POPUP16-12-2021_09_35_50.png',1);
/*!40000 ALTER TABLE `dek_main_popup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_perusahaan`
--

DROP TABLE IF EXISTS `dek_perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_perusahaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `alamat_kantor` varchar(100) DEFAULT NULL,
  `alamat_workshop` varchar(100) DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `visi_misi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_perusahaan`
--

LOCK TABLES `dek_perusahaan` WRITE;
/*!40000 ALTER TABLE `dek_perusahaan` DISABLE KEYS */;
INSERT INTO `dek_perusahaan` VALUES (1,'PT.Dito Enviro Kreasi','0210001112','faizdev06@gmail.com','-','-','<p>ini tentang perusahaan</p>','<p>ini visi dan misi perusahaan</p>','DITO_ENVIRO_LOGO26-05-2023_04_45_18.png');
/*!40000 ALTER TABLE `dek_perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_pesan`
--

DROP TABLE IF EXISTS `dek_pesan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_pesan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `bidang_usaha` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_pesan`
--

LOCK TABLES `dek_pesan` WRITE;
/*!40000 ALTER TABLE `dek_pesan` DISABLE KEYS */;
INSERT INTO `dek_pesan` VALUES (1,'testingaaaaaaaaaaaaaaaaaaaaaaaaa','faiz','faizrahmat.hidayat06@gmail.com','pertanian','testing');
/*!40000 ALTER TABLE `dek_pesan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_settings`
--

DROP TABLE IF EXISTS `dek_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_settings`
--

LOCK TABLES `dek_settings` WRITE;
/*!40000 ALTER TABLE `dek_settings` DISABLE KEYS */;
INSERT INTO `dek_settings` VALUES (1,'maintenance_mode',0);
/*!40000 ALTER TABLE `dek_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_testimoni`
--

DROP TABLE IF EXISTS `dek_testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_testimoni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_testimoni`
--

LOCK TABLES `dek_testimoni` WRITE;
/*!40000 ALTER TABLE `dek_testimoni` DISABLE KEYS */;
/*!40000 ALTER TABLE `dek_testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dek_users`
--

DROP TABLE IF EXISTS `dek_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dek_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dek_users`
--

LOCK TABLES `dek_users` WRITE;
/*!40000 ALTER TABLE `dek_users` DISABLE KEYS */;
INSERT INTO `dek_users` VALUES (1,'admin','$2y$10$O4QvWYzb99AD8BC2KcLZVOpH2ABxnWq6wvq20YM8Gdl7KDYHFUFMq','Admin');
/*!40000 ALTER TABLE `dek_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_dek'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-26 17:27:56
