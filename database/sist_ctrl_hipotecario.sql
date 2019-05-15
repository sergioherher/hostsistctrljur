-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: sist_ctrl_hipotecario
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Bancomer','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `demandados`
--

DROP TABLE IF EXISTS `demandados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `demandados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juicio_id` bigint(20) unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `codemandado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `demandados_juicio_id_foreign` (`juicio_id`),
  CONSTRAINT `demandados_juicio_id_foreign` FOREIGN KEY (`juicio_id`) REFERENCES `juicios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandados`
--

LOCK TABLES `demandados` WRITE;
/*!40000 ALTER TABLE `demandados` DISABLE KEYS */;
INSERT INTO `demandados` VALUES (1,1,'ARREDONDO TIZNADO LUIS ALEJANDRO',0,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,1,'CHAVEZ LOPEZ JOSE SALVADOR',1,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(3,2,'AVILA CARRIZALES JANETTE',0,'2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `demandados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_juicios`
--

DROP TABLE IF EXISTS `doc_juicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_juicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ruta_archivo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `juicio_id` bigint(20) unsigned NOT NULL,
  `doc_tipo_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doc_juicios_doc_tipo_id_foreign` (`doc_tipo_id`),
  KEY `doc_juicios_juicio_id_foreign` (`juicio_id`),
  CONSTRAINT `doc_juicios_doc_tipo_id_foreign` FOREIGN KEY (`doc_tipo_id`) REFERENCES `doc_tipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doc_juicios_juicio_id_foreign` FOREIGN KEY (`juicio_id`) REFERENCES `juicios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_juicios`
--

LOCK TABLES `doc_juicios` WRITE;
/*!40000 ALTER TABLE `doc_juicios` DISABLE KEYS */;
INSERT INTO `doc_juicios` VALUES (1,'pdfs_juicios/juicio_id_1/doc_juicio_id_1.pdf',1,1,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,'pdfs_juicios/juicio_id_1/doc_juicio_id_2.pdf',1,2,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(3,'pdfs_juicios/juicio_id_1/doc_juicio_id_3.pdf',1,3,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(4,'pdfs_juicios/juicio_id_2/doc_juicio_id_4.pdf',2,1,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(5,'pdfs_juicios/juicio_id_2/doc_juicio_id_5.pdf',2,2,'2019-05-15 07:09:57','2019-05-15 07:09:57'),(6,'pdfs_juicios/juicio_id_2/doc_juicio_id_6.pdf',2,3,'2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `doc_juicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doc_tipos`
--

DROP TABLE IF EXISTS `doc_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doc_tipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_tipos`
--

LOCK TABLES `doc_tipos` WRITE;
/*!40000 ALTER TABLE `doc_tipos` DISABLE KEYS */;
INSERT INTO `doc_tipos` VALUES (1,'Documentos Fundatorios','2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,'Expediente Judicial','2019-05-15 07:09:57','2019-05-15 07:09:57'),(3,'Otros Documentos','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `doc_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interns`
--

DROP TABLE IF EXISTS `interns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interns`
--

LOCK TABLES `interns` WRITE;
/*!40000 ALTER TABLE `interns` DISABLE KEYS */;
INSERT INTO `interns` VALUES (1,'JorgeAMJ','2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,'SamLK','2019-05-15 07:09:57','2019-05-15 07:09:57'),(3,'MarcoRFP','2019-05-15 07:09:57','2019-05-15 07:09:57'),(4,'RocioMJ','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `interns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juicios`
--

DROP TABLE IF EXISTS `juicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `intern_id` bigint(20) unsigned NOT NULL,
  `numero_credito` bigint(20) NOT NULL,
  `juzgado_id` bigint(20) unsigned NOT NULL,
  `expediente` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `juztipo_id` bigint(20) unsigned NOT NULL,
  `ultima_fecha_boletin` datetime NOT NULL,
  `extracto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notas_seguimiento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_proxima_accion` datetime NOT NULL,
  `proxima_accion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_demandado` double(8,2) NOT NULL,
  `importe_credito` double(8,2) NOT NULL,
  `macroetapa_id` bigint(20) unsigned NOT NULL,
  `garantia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos_rpp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `otros_domicilios` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `juicios_client_id_foreign` (`client_id`),
  KEY `juicios_intern_id_foreign` (`intern_id`),
  KEY `juicios_juzgado_id_foreign` (`juzgado_id`),
  KEY `juicios_juztipo_id_foreign` (`juztipo_id`),
  KEY `juicios_macroetapa_id_foreign` (`macroetapa_id`),
  CONSTRAINT `juicios_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_intern_id_foreign` FOREIGN KEY (`intern_id`) REFERENCES `interns` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_juzgado_id_foreign` FOREIGN KEY (`juzgado_id`) REFERENCES `juzgados` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_juztipo_id_foreign` FOREIGN KEY (`juztipo_id`) REFERENCES `juztipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_macroetapa_id_foreign` FOREIGN KEY (`macroetapa_id`) REFERENCES `macroetapas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juicios`
--

LOCK TABLES `juicios` WRITE;
/*!40000 ALTER TABLE `juicios` DISABLE KEYS */;
INSERT INTO `juicios` VALUES (1,1,1,12345678,10,'2249/2017',2,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-07-13 00:00:00','Proxima accion de prueba',19234.90,6454.90,3,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,1,4,87654321,9,'123/2019',4,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-07-13 00:00:00','Proxima accion de prueba',19234.90,6454.90,2,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `juicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgados`
--

DROP TABLE IF EXISTS `juzgados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juzgados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juzgado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgados`
--

LOCK TABLES `juzgados` WRITE;
/*!40000 ALTER TABLE `juzgados` DISABLE KEYS */;
INSERT INTO `juzgados` VALUES (1,'1C','2019-05-15 07:09:56','2019-05-15 07:09:56'),(2,'2C','2019-05-15 07:09:56','2019-05-15 07:09:56'),(3,'3C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(4,'4C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(5,'5C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(6,'6C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(7,'7C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(8,'8C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(9,'9C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(10,'10C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(11,'11C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(12,'12C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(13,'13C','2019-05-15 07:09:57','2019-05-15 07:09:57'),(14,'1M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(15,'2M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(16,'3M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(17,'4M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(18,'5M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(19,'6M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(20,'7M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(21,'8M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(22,'9M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(23,'10M','2019-05-15 07:09:57','2019-05-15 07:09:57'),(24,'1MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(25,'2MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(26,'3MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(27,'4MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(28,'5MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(29,'6MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(30,'7MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(31,'8MO','2019-05-15 07:09:57','2019-05-15 07:09:57'),(32,'9MO','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `juzgados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juztipos`
--

DROP TABLE IF EXISTS `juztipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juztipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juztipo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juztipos`
--

LOCK TABLES `juztipos` WRITE;
/*!40000 ALTER TABLE `juztipos` DISABLE KEYS */;
INSERT INTO `juztipos` VALUES (1,'CIVIL','2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,'MERCANTIL','2019-05-15 07:09:57','2019-05-15 07:09:57'),(3,'MERC. ORAL','2019-05-15 07:09:57','2019-05-15 07:09:57'),(4,'JURISVOL','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `juztipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `macroetapas`
--

DROP TABLE IF EXISTS `macroetapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `macroetapas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `macroetapa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macroetapas`
--

LOCK TABLES `macroetapas` WRITE;
/*!40000 ALTER TABLE `macroetapas` DISABLE KEYS */;
INSERT INTO `macroetapas` VALUES (1,'DEMANDA','2019-05-15 07:09:57','2019-05-15 07:09:57'),(2,'ADMISION','2019-05-15 07:09:57','2019-05-15 07:09:57'),(3,'PRUEBAS','2019-05-15 07:09:57','2019-05-15 07:09:57'),(4,'ALEGATOS','2019-05-15 07:09:57','2019-05-15 07:09:57'),(5,'SENTENCIA','2019-05-15 07:09:57','2019-05-15 07:09:57'),(6,'EJECUCION','2019-05-15 07:09:57','2019-05-15 07:09:57'),(7,'REMATE','2019-05-15 07:09:57','2019-05-15 07:09:57'),(8,'TOMA POSESION','2019-05-15 07:09:57','2019-05-15 07:09:57');
/*!40000 ALTER TABLE `macroetapas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_05_12_203628_create_permissions_table',1),(4,'2019_05_12_203700_create_roles_table',1),(5,'2019_05_12_204415_create_users_permissions_table',1),(6,'2019_05_12_204706_create_users_roles_table',1),(7,'2019_05_12_205313_create_roles_permissions_table',1),(8,'2019_05_13_202919_create_clients_table',1),(9,'2019_05_13_203742_create_interns_table',1),(10,'2019_05_13_205523_create_juzgados_table',1),(11,'2019_05_13_212717_create_juztipos_table',1),(12,'2019_05_13_213018_create_macroetapas_table',1),(13,'2019_05_13_214500_create_juicios_table',1),(14,'2019_05_13_214600_create_demandados_table',1),(15,'2019_05_15_022700_create_doc_tipos_table',1),(16,'2019_05_15_022800_create_doc_juicios_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'cargar-juicios','Cargar Juicios','2019-05-15 07:09:56','2019-05-15 07:09:56'),(2,'editar-juicios','Editar Juicios','2019-05-15 07:09:56','2019-05-15 07:09:56'),(3,'ver-juicios','Ver Juicios','2019-05-15 07:09:56','2019-05-15 07:09:56');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','Administrador','2019-05-15 07:09:56','2019-05-15 07:09:56'),(2,'colaborador','Colaborador','2019-05-15 07:09:56','2019-05-15 07:09:56');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_permissions` (
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `roles_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `roles_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_permissions`
--

LOCK TABLES `roles_permissions` WRITE;
/*!40000 ALTER TABLE `roles_permissions` DISABLE KEYS */;
INSERT INTO `roles_permissions` VALUES (1,1),(1,2),(1,3),(2,3);
/*!40000 ALTER TABLE `roles_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sergio Hernandez','sergioh81@gmail.com',NULL,'$2y$10$Ac83f1u8Cde.LOauGaCm8ewVrYZexHJwK.sAmyXgAovM30F4nihS.',NULL,'2019-05-15 07:09:56','2019-05-15 07:09:56'),(2,'Jorge AMJ','jorgeAMJ@gmail.com',NULL,'$2y$10$Km1UUx5BDbnXhYCsu1V1F.hvKqHCQ.3Ji8AFh7POZvQ6ctozcxh4S',NULL,'2019-05-15 07:09:56','2019-05-15 07:09:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_permissions`
--

DROP TABLE IF EXISTS `users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_permissions` (
  `user_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `users_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_permissions`
--

LOCK TABLES `users_permissions` WRITE;
/*!40000 ALTER TABLE `users_permissions` DISABLE KEYS */;
INSERT INTO `users_permissions` VALUES (1,1),(1,2),(1,3),(2,3);
/*!40000 ALTER TABLE `users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `users_roles_role_id_foreign` (`role_id`),
  CONSTRAINT `users_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `users_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-15  3:46:00
