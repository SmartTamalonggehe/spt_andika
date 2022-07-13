-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: spt_andika
-- ------------------------------------------------------
-- Server version	8.0.29

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
-- Table structure for table `bukti_perjalanan`
--

DROP TABLE IF EXISTS `bukti_perjalanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bukti_perjalanan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `surat_id` bigint unsigned NOT NULL,
  `nama_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bukti_perjalanan_surat_id_foreign` (`surat_id`),
  CONSTRAINT `bukti_perjalanan_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bukti_perjalanan`
--

LOCK TABLES `bukti_perjalanan` WRITE;
/*!40000 ALTER TABLE `bukti_perjalanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `bukti_perjalanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gaji`
--

DROP TABLE IF EXISTS `gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gaji` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint unsigned NOT NULL,
  `gaji_pokok` int NOT NULL,
  `pembulatan` int NOT NULL,
  `tgl_gaji` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `gaji_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `gaji_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gaji`
--

LOCK TABLES `gaji` WRITE;
/*!40000 ALTER TABLE `gaji` DISABLE KEYS */;
INSERT INTO `gaji` VALUES (3,3,3339400,83,'2021-10-14','2022-07-10 15:54:53','2022-07-10 15:54:53'),(4,2,4066500,13,'2021-10-20','2022-07-10 15:54:53','2022-07-10 15:54:53'),(5,1,4238500,80,'2021-10-20','2022-07-10 15:54:53','2022-07-10 15:54:53'),(6,4,2374300,1,'2021-10-20','2022-07-10 15:54:53','2022-07-10 15:54:53'),(7,5,2526200,58,'2022-04-30','2022-07-10 15:54:53','2022-07-10 15:54:53');
/*!40000 ALTER TABLE `gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kwitansi`
--

DROP TABLE IF EXISTS `kwitansi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kwitansi` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `surat_id` bigint unsigned NOT NULL,
  `kode_rek` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kwitansi` date NOT NULL,
  `jumlah_ditetapkan` int NOT NULL,
  `terima` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_terima` date NOT NULL,
  `jumlah_terima` int NOT NULL,
  `pergi` int NOT NULL,
  `pulang` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kwitansi_surat_id_foreign` (`surat_id`),
  CONSTRAINT `kwitansi_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kwitansi`
--

LOCK TABLES `kwitansi` WRITE;
/*!40000 ALTER TABLE `kwitansi` DISABLE KEYS */;
INSERT INTO `kwitansi` VALUES (3,6,'5.1.02.04.01.0001','2021-10-29',20000000,'bendahara pengeluaran','2021-11-08',20000000,5297400,5375000,'2022-07-10 15:54:53','2022-07-10 15:54:53');
/*!40000 ALTER TABLE `kwitansi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kwitansi_detail`
--

DROP TABLE IF EXISTS `kwitansi_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kwitansi_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `kwitansi_id` bigint unsigned NOT NULL,
  `uraian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `kwitansi_detail_kwitansi_id_foreign` (`kwitansi_id`),
  CONSTRAINT `kwitansi_detail_kwitansi_id_foreign` FOREIGN KEY (`kwitansi_id`) REFERENCES `kwitansi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kwitansi_detail`
--

LOCK TABLES `kwitansi_detail` WRITE;
/*!40000 ALTER TABLE `kwitansi_detail` DISABLE KEYS */;
INSERT INTO `kwitansi_detail` VALUES (6,3,'tramsport lokal/darat',3,500000,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(7,3,'penginapan',1,888000,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(8,3,'uang harian/saku',3,800000,'2022-07-10 15:54:54','2022-07-10 15:54:54');
/*!40000 ALTER TABLE `kwitansi_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_03_12_083110_create_pegawai_table',1),(6,'2022_03_12_083144_create_gaji_table',1),(7,'2022_03_12_083157_create_tunjangan_table',1),(8,'2022_03_12_083214_create_potongan_table',1),(9,'2022_03_12_083240_create_surat_table',1),(10,'2022_03_12_083255_create_kwitansi_table',1),(11,'2022_03_12_083307_create_kwitansi_detail_table',1),(12,'2022_03_12_090510_create_pengikut_table',1),(13,'2022_03_13_121109_create_permission_tables',1),(14,'2022_06_25_122334_add_status_to_surat',1),(15,'2022_06_25_122717_add_pegawai_id_to_users',1),(16,'2022_06_25_230026_add_password_show_to_users',1),(17,'2022_06_26_232640_create_bukti_perjalanan_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(4,'App\\Models\\User',3);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pegawai` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `NIP` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bagian` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pangkat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES (1,'197106162000121005','YUSUF YAMBE  YABDI ST MT','olahraga','keungan','PNS','IV/c','ESELON','dinas olahraga dan pemuda provinsi papua','II','2022-07-10 15:54:51','2022-07-10 15:54:51'),(2,'196908032001121005','EDWIN OLAF MONIM MM SE','olahraga','keuangan','PNS','IV/b','ESELON','dinas olahraga dan pemuda provinsi papua','III','2022-07-10 15:54:51','2022-07-10 15:54:51'),(3,'196511021985032005','IRENE KARMA','olahraga','keuangan','kosong','II/c','staff','dinas olahraga dan pemuda provinsi papua','0','2022-07-10 15:54:51','2022-07-10 15:54:51'),(4,'197609092014032001','BEATRIX MONIM','olahraga','keuangan','PENGATUR MUDA','II/b','JFU','dinas olahraga dan pemuda provinsi papua','0','2022-07-10 15:54:51','2022-07-10 15:54:51'),(5,'198208022010042002','MONIKA INDER NDIKEN','olahraga','keuangan','PENGATUR','II/c','STAFF','dinas olahraga dan pemuda provinsi papua','0','2022-07-10 15:54:51','2022-07-10 15:54:51');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengikut`
--

DROP TABLE IF EXISTS `pengikut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pengikut` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `surat_id` bigint unsigned NOT NULL,
  `pegawai_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pengikut_surat_id_foreign` (`surat_id`),
  KEY `pengikut_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `pengikut_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pengikut_surat_id_foreign` FOREIGN KEY (`surat_id`) REFERENCES `surat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengikut`
--

LOCK TABLES `pengikut` WRITE;
/*!40000 ALTER TABLE `pengikut` DISABLE KEYS */;
INSERT INTO `pengikut` VALUES (1,6,4,'2022-07-10 15:54:52','2022-07-10 15:54:52'),(2,7,3,'2022-07-10 15:54:52','2022-07-10 15:54:52');
/*!40000 ALTER TABLE `pengikut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `potongan`
--

DROP TABLE IF EXISTS `potongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `potongan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gaji_id` bigint unsigned NOT NULL,
  `nm_potongan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_potongan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `potongan_gaji_id_foreign` (`gaji_id`),
  CONSTRAINT `potongan_gaji_id_foreign` FOREIGN KEY (`gaji_id`) REFERENCES `gaji` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `potongan`
--

LOCK TABLES `potongan` WRITE;
/*!40000 ALTER TABLE `potongan` DISABLE KEYS */;
INSERT INTO `potongan` VALUES (14,3,'Pot Pajak',0,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(15,3,'Pot BPJS Kes',156805,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(16,3,'Pot Taperum',0,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(17,3,'Pot jam kecelakaan kerja',8015,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(18,3,'Pot jam kematian',24044,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(20,3,'bulog/beras',323070,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(22,3,'Pot IWP 1%',39201,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(23,4,'Pot Pajak',11438,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(24,4,'Pot BPJS kes',207032,'2022-07-10 15:54:54','2022-07-10 15:54:54'),(25,4,'Pot tapera',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(26,4,'pot jkk',9760,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(27,4,'pot jaminan kematian',29279,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(28,4,'beras/bulog',421720,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(29,4,'pot IWP 1%',51758,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(30,5,'Pot Pajak',155796,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(31,5,'pot tapera',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(32,5,'pot bpjs kes',323276,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(33,5,'beras/bulog',421720,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(34,5,'Pot jam kecelakaan kerja',10172,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(35,5,'pot jam kematian',30517,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(36,5,'pot IWP 1%',80819,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(38,6,'Pot Pajak',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(39,6,'pot bpjs kes',113600,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(40,6,'Pot jam kecelakaan kerja',6384,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(41,6,'beras/bulog',107690,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(42,6,'pot jam kematian',19512,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(43,6,'pot tapera',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(44,6,'pot IWP 1%',28400,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(45,7,'Pot Pajak',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(46,7,'pot bpjs kes',108248,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(47,7,'Pot jam kecelakaan kerja',6063,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(48,7,'pot jam kematian',18189,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(49,7,'pot tapera',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(50,7,'beras/ bulog',107690,'2022-07-10 15:54:55','2022-07-10 15:54:55');
/*!40000 ALTER TABLE `potongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'kepegawaian','web','2022-07-10 15:54:49','2022-07-10 15:54:49'),(2,'keuangan','web','2022-07-10 15:54:49','2022-07-10 15:54:49'),(3,'pegawai','web','2022-07-10 15:54:49','2022-07-10 15:54:49'),(4,'ketua','web','2022-07-10 15:54:49','2022-07-10 15:54:49');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat`
--

DROP TABLE IF EXISTS `surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint unsigned NOT NULL,
  `tgl_surat` date NOT NULL,
  `no_surat` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_surat` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dasar` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dari` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maksud` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alat_angkut` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lama` int NOT NULL,
  `tgl_berangkat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kembali` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beban_anggaran` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_anggaran` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Diproses',
  PRIMARY KEY (`id`),
  KEY `surat_pegawai_id_foreign` (`pegawai_id`),
  CONSTRAINT `surat_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat`
--

LOCK TABLES `surat` WRITE;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES (6,3,'2021-10-21','094','SPT','DPA-SKPD Dinas Olahraga dan Pemuda Provinsi Papua Tahun Anggaran 2021','jayapura','dekai','inventarisasi data sarana prasarana dan kepemudaan di kabupaten yahukimo','pesawat',5,'1','6','DPA-SKPD Dinas Olahraga dan Pemuda Provinsi Papua Tahun 2021','0',NULL,'2022-07-10 15:54:52','2022-07-10 15:54:52','Diproses'),(7,5,'2022-03-21','094/ 2021','SPPD','kepala dinas olahraga dan pemuda provinsi papua','jayapura','serui','inventarisasi data sarana prasarana dan kepemudaan di kabupaten kepulauan yapen','pesawat udara',4,'kesempatan pertama','selesai tugas','DPA-SKPD Dinas Olahraga dan Pemuda Provinsi Papua Tahun 2021','5.1.02.04.01.0001','membawa perlengkapan seperlunya','2022-07-10 15:54:52','2022-07-10 15:54:52','Diproses');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tunjangan`
--

DROP TABLE IF EXISTS `tunjangan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tunjangan` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `gaji_id` bigint unsigned NOT NULL,
  `nm_tunjangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_tunjangan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tunjangan_gaji_id_foreign` (`gaji_id`),
  CONSTRAINT `tunjangan_gaji_id_foreign` FOREIGN KEY (`gaji_id`) REFERENCES `gaji` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tunjangan`
--

LOCK TABLES `tunjangan` WRITE;
/*!40000 ALTER TABLE `tunjangan` DISABLE KEYS */;
INSERT INTO `tunjangan` VALUES (32,3,'Tunj Anak',66788,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(33,3,'Tunj Eslon',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(34,3,'Tunj Fung Umum',180000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(35,3,'Tunj Khusus Daerah',350000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(36,3,'Tunj beras',323070,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(38,3,'Tunj BPJS',156805,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(39,3,'Tunj JKK',8015,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(40,3,'Tunj JK',24044,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(42,4,'Tunj suami/istri',406650,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(44,4,'Tunj anak',162660,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(45,4,'Tunj eslon',540000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(46,4,'Tunj Fung Umum',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(47,4,'Tunj beras',421720,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(48,4,'Tunj pajak',11438,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(49,4,'Tunj BPJS kes',207032,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(50,4,'Tunj JKK',9760,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(51,4,'Tunj JK',292792,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(52,4,'Tunj jaminan pensiun',370865,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(53,4,'Tunj Khusus Daerah',550000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(54,3,'tunj pensiun',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(55,5,'Tunj Suami/Istri',423850,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(56,5,'Tunj anak',169540,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(57,5,'tunj eslon',3250000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(58,5,'Tunj Fung Umum',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(59,5,'Tunj beras',421720,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(61,5,'tunj BPJS',323276,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(62,5,'tunj jam kecelakaan kerja',10172,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(63,5,'tunj jam kematian',30517,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(64,5,'tunj jam pensiun',386551,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(65,5,'tunj pajak',155796,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(67,5,'Tunj Khusus Daerah',575000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(68,6,'Tunj Suami/Istri',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(69,6,'tunj anak',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(70,6,'tunj ESLON',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(71,6,'Tunj Fung Umum',180000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(72,6,'Tunj beras',107690,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(73,6,'tunj pajak',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(74,6,'tunj bpjs kes',113600,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(75,6,'tunj jam kecelakaan kerja',6348,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(76,6,'tunj jam kematian',19152,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(79,6,'tunj pensiun',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(80,7,'Tunj Suami/Istri',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(81,7,'Tunj anak',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(82,7,'tunj ESLON',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(83,7,'Tunj Fung Umum',180000,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(84,7,'Tunj beras',107690,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(85,7,'tunj  pajak',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(86,7,'tunj bpjs kes',108248,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(87,7,'tunj jam kecelakaan kerja',6063,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(88,7,'tunj jam kematian',18189,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(89,7,'tunj pensiun',0,'2022-07-10 15:54:55','2022-07-10 15:54:55'),(90,7,'Tunj Khusus Daerah',350000,'2022-07-10 15:54:55','2022-07-10 15:54:55');
/*!40000 ALTER TABLE `tunjangan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pegawai_id` int unsigned DEFAULT NULL,
  `password_show` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Kepegawaian','kepegawaian@mail.com',NULL,'$2y$10$xyYUA31QqnFZNensf7JLQu3nc4gXPx3puenMF2VlYISn3AnzBV7d.',NULL,'2022-07-10 15:54:49','2022-07-10 15:54:49',NULL,NULL),(2,'Keuangan','keuangan@mail.com',NULL,'$2y$10$dgO5d/UyLmfcFfEgx299N.p.MlGpwsy1KivYNr37JuZuv6GyjSOYG',NULL,'2022-07-10 15:54:49','2022-07-10 15:54:49',NULL,NULL),(3,'Ketua','ketua@mail.com',NULL,'$2y$10$L0DUwdmprSVxZ.fSUG/zS.hjPlo5guht3buH.nZL54VUKFmgTCXyq',NULL,'2022-07-10 15:54:49','2022-07-10 15:54:49',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-11  9:56:18
