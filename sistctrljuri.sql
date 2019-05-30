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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandados`
--

LOCK TABLES `demandados` WRITE;
/*!40000 ALTER TABLE `demandados` DISABLE KEYS */;
INSERT INTO `demandados` VALUES (1,1,'ARREDONDO TIZNADO LUIS ALEJANDRO',0,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,1,'CHAVEZ LOPEZ JOSE SALVADOR',1,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,2,'AVILA CARRIZALES JANETTE',0,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,15,'aasadsdads',0,'2019-05-29 05:26:40','2019-05-29 05:26:40'),(5,16,'aasadsdads',0,'2019-05-29 05:26:54','2019-05-29 05:26:54'),(6,16,'asdasd',1,'2019-05-29 05:26:54','2019-05-29 05:26:54'),(7,17,'sdfsdfsdf',0,'2019-05-29 05:35:38','2019-05-29 05:35:38'),(8,17,'sdfsdfdsf',1,'2019-05-29 05:35:38','2019-05-29 05:35:38'),(9,18,'sdfsdfsdf',0,'2019-05-29 05:37:41','2019-05-29 05:37:41'),(10,18,'sdfsdfdsf',1,'2019-05-29 05:37:41','2019-05-29 05:37:41'),(11,19,'asdadasd',0,'2019-05-29 05:47:22','2019-05-29 05:47:22'),(12,20,'asdadasd',0,'2019-05-29 05:49:24','2019-05-29 05:49:24'),(13,21,'asdadasd',0,'2019-05-29 05:50:57','2019-05-29 05:50:57'),(14,22,'asadasd',0,'2019-05-29 05:52:11','2019-05-29 05:52:11'),(15,23,'asadasd',0,'2019-05-29 05:54:29','2019-05-29 05:54:29'),(16,24,'asadasd',0,'2019-05-29 05:55:39','2019-05-29 05:55:39'),(17,25,'sdfsdfsdf',0,'2019-05-29 05:56:50','2019-05-29 05:56:50'),(18,26,'sdasdad',0,'2019-05-29 06:08:19','2019-05-29 06:08:19'),(19,27,'sdasdad',0,'2019-05-29 06:08:42','2019-05-29 06:08:42');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_juicios`
--

LOCK TABLES `doc_juicios` WRITE;
/*!40000 ALTER TABLE `doc_juicios` DISABLE KEYS */;
INSERT INTO `doc_juicios` VALUES (1,'pdfs_juicios/juicio_id_1/doc_juicio_id_1.pdf',1,1,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,'pdfs_juicios/juicio_id_1/doc_juicio_id_2.pdf',1,2,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,'pdfs_juicios/juicio_id_1/doc_juicio_id_3.pdf',1,3,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,'pdfs_juicios/juicio_id_2/doc_juicio_id_4.pdf',2,1,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(5,'pdfs_juicios/juicio_id_2/doc_juicio_id_5.pdf',2,2,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(6,'pdfs_juicios/juicio_id_2/doc_juicio_id_6.pdf',2,3,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(7,'fundatorio-27.pdf',27,2,'2019-05-29 06:08:42','2019-05-29 06:08:42');
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
INSERT INTO `doc_tipos` VALUES (1,'Documentos Fundatorios','2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,'Expediente Judicial','2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,'Otros Documentos','2019-05-29 04:52:05','2019-05-29 04:52:05');
/*!40000 ALTER TABLE `doc_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados`
--

DROP TABLE IF EXISTS `estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` VALUES (1,'Activo','2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,'Concluido','2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,'Irrecuperable','2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,'Suspendido','2019-05-29 04:52:05','2019-05-29 04:52:05');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juicios`
--

DROP TABLE IF EXISTS `juicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juicios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado_id` bigint(20) unsigned NOT NULL,
  `numero_credito` bigint(20) DEFAULT NULL,
  `juzgado_id` bigint(20) unsigned NOT NULL,
  `juzgadotipo_id` bigint(20) unsigned NOT NULL,
  `expediente` text COLLATE utf8mb4_unicode_ci,
  `juiciotipo_id` bigint(20) unsigned NOT NULL,
  `ultima_fecha_boletin` datetime DEFAULT NULL,
  `extracto` text COLLATE utf8mb4_unicode_ci,
  `notas_seguimiento` text COLLATE utf8mb4_unicode_ci,
  `fecha_proxima_accion` datetime DEFAULT NULL,
  `proxima_accion` text COLLATE utf8mb4_unicode_ci,
  `monto_demandado` decimal(20,2) DEFAULT NULL,
  `importe_credito` decimal(20,2) DEFAULT NULL,
  `macroetapa_id` bigint(20) unsigned NOT NULL,
  `garantia` text COLLATE utf8mb4_unicode_ci,
  `datos_rpp` text COLLATE utf8mb4_unicode_ci,
  `otros_domicilios` text COLLATE utf8mb4_unicode_ci,
  `procesos_asoc` text COLLATE utf8mb4_unicode_ci,
  `salaapela_id` bigint(20) unsigned NOT NULL,
  `toca` text COLLATE utf8mb4_unicode_ci,
  `autoridad_amparo` text COLLATE utf8mb4_unicode_ci,
  `expediente_amparo` text COLLATE utf8mb4_unicode_ci,
  `autoridad_recurso_amparo` text COLLATE utf8mb4_unicode_ci,
  `expediente_recurso_amparo` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `juicios_estado_id_foreign` (`estado_id`),
  KEY `juicios_juzgado_id_foreign` (`juzgado_id`),
  KEY `juicios_juzgadotipo_id_foreign` (`juzgadotipo_id`),
  KEY `juicios_juiciotipo_id_foreign` (`juiciotipo_id`),
  KEY `juicios_macroetapa_id_foreign` (`macroetapa_id`),
  KEY `juicios_salaapela_id_foreign` (`salaapela_id`),
  CONSTRAINT `juicios_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_juiciotipo_id_foreign` FOREIGN KEY (`juiciotipo_id`) REFERENCES `juiciotipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_juzgado_id_foreign` FOREIGN KEY (`juzgado_id`) REFERENCES `juzgados` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_juzgadotipo_id_foreign` FOREIGN KEY (`juzgadotipo_id`) REFERENCES `juzgadotipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_macroetapa_id_foreign` FOREIGN KEY (`macroetapa_id`) REFERENCES `macroetapas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_salaapela_id_foreign` FOREIGN KEY (`salaapela_id`) REFERENCES `salaapelas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juicios`
--

LOCK TABLES `juicios` WRITE;
/*!40000 ALTER TABLE `juicios` DISABLE KEYS */;
INSERT INTO `juicios` VALUES (1,1,12345678,10,1,'2249/2017',2,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-07-13 00:00:00','Proxima accion de prueba',19234.90,6454.90,3,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','Procesos asociados de prueba',3,'Toca de prueba','Autoridad amparo de prueba','Expediente amparo de prueba','Autoridad recurso de amparo de prueba','Expediente recurso de amparo de prueba','2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,2,87654321,45,2,'123/2019',4,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-07-13 00:00:00','Proxima accion de prueba',19234.90,6454.90,2,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','Procesos asociados de prueba',1,'Toca de prueba','Autoridad amparo de prueba','Expediente amparo de prueba','Autoridad recurso de amparo de prueba','Expediente recurso de amparo de prueba','2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 04:53:59','2019-05-29 04:53:59'),(4,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 04:54:59','2019-05-29 04:54:59'),(5,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 04:55:34','2019-05-29 04:55:34'),(6,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:04:10','2019-05-29 05:04:10'),(7,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:04:50','2019-05-29 05:04:50'),(8,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:05:27','2019-05-29 05:05:27'),(9,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:05:51','2019-05-29 05:05:51'),(10,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:07:38','2019-05-29 05:07:38'),(11,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:12:08','2019-05-29 05:12:08'),(12,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:13:51','2019-05-29 05:13:51'),(13,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:17:38','2019-05-29 05:17:38'),(14,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:21:32','2019-05-29 05:21:32'),(15,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:26:40','2019-05-29 05:26:40'),(16,1,123123123,16,1,'123123123',1,'2019-05-16 00:00:00','asdasdasd','asdasdsd','2019-05-22 00:00:00','asdasdadsda',1231231.00,123123123.00,12,'sadasd','asasda','asdad','asdasd',2,'asdasdas','asdasd','asadad','asdadasd','asdasda','2019-05-29 05:26:54','2019-05-29 05:26:54'),(17,1,12342342,20,1,'888888888888888',2,'2019-06-07 00:00:00','sdfsdfsdf','sdsdfsdfsd','2019-06-06 00:00:00','sdfsdfsdf',1231231.00,12312313.00,16,'sdfsdfsdf','sdsdfsfs','sdfsdfsdf','sdfsdfsf',1,'sdfsdfsd','sdfsdf','sdfsdf','sdfsdf','sdfsdf','2019-05-29 05:35:38','2019-05-29 05:35:38'),(18,1,12312313,17,1,'888888888888888',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:37:41','2019-05-29 05:37:41'),(19,1,123123,17,1,'13123213',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:47:22','2019-05-29 05:47:22'),(20,1,123123,17,1,'13123213',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:49:24','2019-05-29 05:49:24'),(21,1,123123,17,1,'13123213',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:50:57','2019-05-29 05:50:57'),(22,2,1231313,19,1,'12323123',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:52:11','2019-05-29 05:52:11'),(23,2,1231313,19,1,'12323123',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:54:29','2019-05-29 05:54:29'),(24,2,1231313,19,1,'12323123',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,14,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:55:39','2019-05-29 05:55:39'),(25,1,123123123,4,1,'888888888888888',1,NULL,NULL,NULL,NULL,NULL,123123.00,123123.00,14,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 05:56:50','2019-05-29 05:56:50'),(26,1,21312313,2,1,'213123123',2,NULL,NULL,NULL,NULL,NULL,123123.00,1231231.00,15,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 06:08:19','2019-05-29 06:08:19'),(27,1,21312313,2,1,'213123123',2,NULL,NULL,NULL,NULL,NULL,123123.00,1231231.00,15,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'2019-05-29 06:08:42','2019-05-29 06:08:42');
/*!40000 ALTER TABLE `juicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juiciotipos`
--

DROP TABLE IF EXISTS `juiciotipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juiciotipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juiciotipo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juiciotipos`
--

LOCK TABLES `juiciotipos` WRITE;
/*!40000 ALTER TABLE `juiciotipos` DISABLE KEYS */;
INSERT INTO `juiciotipos` VALUES (1,'CIVIL','2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,'MERCANTIL','2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,'MERC. ORAL','2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,'JURISVOL','2019-05-29 04:52:05','2019-05-29 04:52:05'),(5,'OTRO','2019-05-29 04:52:05','2019-05-29 04:52:05');
/*!40000 ALTER TABLE `juiciotipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juiciousers`
--

DROP TABLE IF EXISTS `juiciousers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juiciousers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juicio_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `user_name` text COLLATE utf8mb4_unicode_ci,
  `user_contact_info` text COLLATE utf8mb4_unicode_ci,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `juiciousers_juicio_id_foreign` (`juicio_id`),
  KEY `juiciousers_user_id_foreign` (`user_id`),
  KEY `juiciousers_role_id_foreign` (`role_id`),
  CONSTRAINT `juiciousers_juicio_id_foreign` FOREIGN KEY (`juicio_id`) REFERENCES `juicios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juiciousers_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juiciousers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juiciousers`
--

LOCK TABLES `juiciousers` WRITE;
/*!40000 ALTER TABLE `juiciousers` DISABLE KEYS */;
INSERT INTO `juiciousers` VALUES (1,1,2,NULL,NULL,2,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,1,3,NULL,NULL,3,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,2,2,NULL,NULL,2,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,2,3,NULL,NULL,3,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(5,5,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 04:55:34','2019-05-29 04:55:34'),(6,5,2,'Sergio Hernandez',NULL,1,'2019-05-29 04:55:34','2019-05-29 04:55:34'),(7,6,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:04:10','2019-05-29 05:04:10'),(8,6,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:04:10','2019-05-29 05:04:10'),(9,7,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:04:50','2019-05-29 05:04:50'),(10,7,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:04:50','2019-05-29 05:04:50'),(11,8,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:05:27','2019-05-29 05:05:27'),(12,8,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:05:27','2019-05-29 05:05:27'),(13,9,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:05:51','2019-05-29 05:05:51'),(14,9,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:05:51','2019-05-29 05:05:51'),(15,10,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:07:38','2019-05-29 05:07:38'),(16,10,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:07:38','2019-05-29 05:07:38'),(17,11,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:12:09','2019-05-29 05:12:09'),(18,11,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:12:09','2019-05-29 05:12:09'),(19,12,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:13:51','2019-05-29 05:13:51'),(20,12,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:13:51','2019-05-29 05:13:51'),(21,13,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:17:38','2019-05-29 05:17:38'),(22,13,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:17:38','2019-05-29 05:17:38'),(23,14,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:21:32','2019-05-29 05:21:32'),(24,14,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:21:32','2019-05-29 05:21:32'),(25,15,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:26:40','2019-05-29 05:26:40'),(26,15,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:26:40','2019-05-29 05:26:40'),(27,16,3,'Sergio Hernandez','qweqweqw',1,'2019-05-29 05:26:54','2019-05-29 05:26:54'),(28,16,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:26:54','2019-05-29 05:26:54'),(29,17,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:35:38','2019-05-29 05:35:38'),(30,17,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:35:38','2019-05-29 05:35:38'),(31,18,3,'Sergio Hernandez',NULL,1,'2019-05-29 05:37:41','2019-05-29 05:37:41'),(32,18,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:37:41','2019-05-29 05:37:41'),(33,19,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:47:22','2019-05-29 05:47:22'),(34,19,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:47:22','2019-05-29 05:47:22'),(35,20,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:49:24','2019-05-29 05:49:24'),(36,20,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:49:24','2019-05-29 05:49:24'),(37,21,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:50:57','2019-05-29 05:50:57'),(38,21,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:50:57','2019-05-29 05:50:57'),(39,22,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:52:11','2019-05-29 05:52:11'),(40,22,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:52:11','2019-05-29 05:52:11'),(41,23,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:54:29','2019-05-29 05:54:29'),(42,23,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:54:29','2019-05-29 05:54:29'),(43,24,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:55:39','2019-05-29 05:55:39'),(44,24,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:55:39','2019-05-29 05:55:39'),(45,25,3,'Sergio Hernandez','dfsadfsfsd',1,'2019-05-29 05:56:50','2019-05-29 05:56:50'),(46,25,2,'Sergio Hernandez',NULL,1,'2019-05-29 05:56:50','2019-05-29 05:56:50'),(47,26,3,'Sergio Hernandez',NULL,1,'2019-05-29 06:08:19','2019-05-29 06:08:19'),(48,26,2,'Sergio Hernandez',NULL,1,'2019-05-29 06:08:19','2019-05-29 06:08:19'),(49,27,3,'Sergio Hernandez',NULL,1,'2019-05-29 06:08:42','2019-05-29 06:08:42'),(50,27,2,'Sergio Hernandez',NULL,1,'2019-05-29 06:08:42','2019-05-29 06:08:42');
/*!40000 ALTER TABLE `juiciousers` ENABLE KEYS */;
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
  `juzgadotipo_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `juzgados_juzgadotipo_id_foreign` (`juzgadotipo_id`),
  CONSTRAINT `juzgados_juzgadotipo_id_foreign` FOREIGN KEY (`juzgadotipo_id`) REFERENCES `juzgadotipos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgados`
--

LOCK TABLES `juzgados` WRITE;
/*!40000 ALTER TABLE `juzgados` DISABLE KEYS */;
INSERT INTO `juzgados` VALUES (1,'1° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(2,'2° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(3,'3° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(4,'4° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(5,'5° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(6,'6° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(7,'7° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(8,'8° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(9,'9° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(10,'10° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(11,'11° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(12,'12° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(13,'13° Civil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(14,'1° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(15,'2° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(16,'3° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(17,'4° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(18,'5° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(19,'6° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(20,'7° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(21,'8° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(22,'9° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(23,'10° Mercantil',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(24,'1° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(25,'2° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(26,'3° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(27,'4° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(28,'5° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(29,'6° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(30,'7° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(31,'8° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(32,'9° Mercantil Oral',1,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(33,'1° Civil Autlán de Navarro',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(34,'2° Civil Autlán de Navarro',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(35,'1° Civil Chapala',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(36,'2° Civil Chapala',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(37,'1° Civil Lagos de Moreno',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(38,'2° Civil Lagos de Moreno',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(39,'1° Civil Ocotlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(40,'2° Civil Ocotlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(41,'1° Civil Puerto Vallarta',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(42,'2° Civil Puerto Vallarta',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(43,'3° Civil Puerto Vallarta',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(44,'4° Civil Puerto Vallarta',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(45,'5° Civil Puerto Vallarta',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(46,'1° Civil Tepatitlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(47,'2° Civil Tepatitlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(48,'1° Civil Tlajomulco de Z.',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(49,'2° Civil Tlajomulco de Z.',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(50,'1° Civil Zapotlán (Cd. Guzmán)',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(51,'2° Civil Zapotlán (Cd. Guzmán)',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(52,'1° Mercantil Zapotlán (Cd. Guzmán)',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(53,'1° Civil Ahualulco',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(54,'1° Civil Ameca',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(55,'1° Civil Arandas',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(56,'1° Civil Atotonilco',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(57,'1° Civil Cihuatlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(58,'1° Civil Cocula',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(59,'1° Civil Colotlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(60,'1° Civil Encarnación',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(61,'1° Civil Jalostotitlán',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(62,'1° Civil La Barca',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(63,'1° Civil La Mascota',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(64,'1° Civil Mazamitla',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(65,'1° Civil San Gabriel',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(66,'1° Civil San Juan de los Lagos',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(67,'1° Civil Sayula',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(68,'1° Civil Tala',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(69,'1° Civil Tamazula de Gordiano',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(70,'1° Civil Teocaltiche',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(71,'1° Civil Tequila',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(72,'1° Civil Unión de Tula',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(73,'1° Civil Yahualica',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(74,'1° Civil Zacoalco',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(75,'1° Civil Zapotlanejo',2,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(76,'1° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(77,'2° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(78,'3° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(79,'4° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(80,'5° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(81,'6° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(82,'7° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(83,'8° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(84,'9° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(85,'10° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(86,'11° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(87,'12° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(88,'13° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(89,'14° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(90,'15° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(91,'16° Distrito Admin. Civil y Trabajo',3,'2019-05-29 04:52:05','2019-05-29 04:52:05'),(92,'Otro',4,'2019-05-29 04:52:05','2019-05-29 04:52:05');
/*!40000 ALTER TABLE `juzgados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `juzgadotipos`
--

DROP TABLE IF EXISTS `juzgadotipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juzgadotipos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juztipo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgadotipos`
--

LOCK TABLES `juzgadotipos` WRITE;
/*!40000 ALTER TABLE `juzgadotipos` DISABLE KEYS */;
INSERT INTO `juzgadotipos` VALUES (1,'-- Primer Partido Judicial','2019-05-29 04:52:04','2019-05-29 04:52:04'),(2,'-- Juzgados Foráneos','2019-05-29 04:52:04','2019-05-29 04:52:04'),(3,'-- Juzgados Federales','2019-05-29 04:52:04','2019-05-29 04:52:04'),(4,'-- Otros','2019-05-29 04:52:04','2019-05-29 04:52:04');
/*!40000 ALTER TABLE `juzgadotipos` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `macroetapas`
--

LOCK TABLES `macroetapas` WRITE;
/*!40000 ALTER TABLE `macroetapas` DISABLE KEYS */;
INSERT INTO `macroetapas` VALUES (1,'POR DEMANDAR','2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,'JURISDICCION VOLUNTARIA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,'DEMANDA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,'EMPLAZADO','2019-05-29 04:52:05','2019-05-29 04:52:05'),(5,'ADMISION','2019-05-29 04:52:05','2019-05-29 04:52:05'),(6,'AUD. PRELIMINAR','2019-05-29 04:52:05','2019-05-29 04:52:05'),(7,'PRUEBAS','2019-05-29 04:52:05','2019-05-29 04:52:05'),(8,'ALEGATOS','2019-05-29 04:52:05','2019-05-29 04:52:05'),(9,'AUD. JUICIO','2019-05-29 04:52:05','2019-05-29 04:52:05'),(10,'SENTENCIA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(11,'APELACIÓN','2019-05-29 04:52:05','2019-05-29 04:52:05'),(12,'AMPARO','2019-05-29 04:52:05','2019-05-29 04:52:05'),(13,'AMPARO EN REVISIÓN','2019-05-29 04:52:05','2019-05-29 04:52:05'),(14,'EJECUCION','2019-05-29 04:52:05','2019-05-29 04:52:05'),(15,'REMATE','2019-05-29 04:52:05','2019-05-29 04:52:05'),(16,'TOMA POSESION','2019-05-29 04:52:05','2019-05-29 04:52:05'),(17,'ESCRITURACIÓN','2019-05-29 04:52:05','2019-05-29 04:52:05'),(18,'ATIPICA VER NOTAS','2019-05-29 04:52:05','2019-05-29 04:52:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_05_12_203628_create_permissions_table',1),(4,'2019_05_12_203700_create_roles_table',1),(5,'2019_05_12_204415_create_users_permissions_table',1),(6,'2019_05_12_204706_create_users_roles_table',1),(7,'2019_05_12_205313_create_roles_permissions_table',1),(8,'2019_05_13_205520_create_juzgadotipos_table',1),(9,'2019_05_13_205523_create_juzgados_table',1),(10,'2019_05_13_212717_create_juiciotipos_table',1),(11,'2019_05_13_213018_create_macroetapas_table',1),(12,'2019_05_13_213019_create_estados_table',1),(13,'2019_05_13_213025_create_salaapelas_table',1),(14,'2019_05_13_214500_create_juicios_table',1),(15,'2019_05_13_214600_create_demandados_table',1),(16,'2019_05_15_022700_create_doc_tipos_table',1),(17,'2019_05_15_022800_create_doc_juicios_table',1),(18,'2019_05_25_231454_create_juiciousers_table',1);
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
INSERT INTO `permissions` VALUES (1,'cargar-juicios','Cargar Juicios','2019-05-29 04:52:03','2019-05-29 04:52:03'),(2,'editar-juicios','Editar Juicios','2019-05-29 04:52:03','2019-05-29 04:52:03'),(3,'ver-juicios','Ver Juicios','2019-05-29 04:52:03','2019-05-29 04:52:03');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','Administrador','2019-05-29 04:52:02','2019-05-29 04:52:02'),(2,'colaborador','Colaborador','2019-05-29 04:52:03','2019-05-29 04:52:03'),(3,'cliente','Cliente','2019-05-29 04:52:03','2019-05-29 04:52:03');
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
INSERT INTO `roles_permissions` VALUES (1,1),(1,2),(2,2),(1,3),(2,3),(3,3);
/*!40000 ALTER TABLE `roles_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaapelas`
--

DROP TABLE IF EXISTS `salaapelas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salaapelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sala` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaapelas`
--

LOCK TABLES `salaapelas` WRITE;
/*!40000 ALTER TABLE `salaapelas` DISABLE KEYS */;
INSERT INTO `salaapelas` VALUES (1,'NO APLICA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(2,'TERCERA SALA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(3,'CUARTA SALA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(4,'QUINTA SALA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(5,'SÉPTIMA SALA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(6,'OCTAVA SALA','2019-05-29 04:52:05','2019-05-29 04:52:05'),(7,'NOVENA SALA','2019-05-29 04:52:05','2019-05-29 04:52:05');
/*!40000 ALTER TABLE `salaapelas` ENABLE KEYS */;
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
  `contact_info` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sergio Hernandez','sergioh81@gmail.com',NULL,'$2y$10$woVaPUC3MoxpG/68w7Zg7.VMXvIa3x1SnUTafvom7xQG/p0/5lJoq',NULL,NULL,'2019-05-29 04:52:03','2019-05-29 04:52:03'),(2,'Jorge AMJ','jorgeAMJ@gmail.com',NULL,'$2y$10$WmuQQX2shm/FrTE4IaW3S.7bTBftPQurekGdl5Hg9uOR90B5Onz/u',NULL,NULL,'2019-05-29 04:52:04','2019-05-29 04:52:04'),(3,'BANORTE','cliente@banorte.com',NULL,'$2y$10$9qzC1jhnSphzhso82jFVSOr6QwajMRrA/wFRrLvI3U9.S/8G0h2cW',NULL,NULL,'2019-05-29 04:52:04','2019-05-29 04:52:04');
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
INSERT INTO `users_permissions` VALUES (1,1),(1,2),(2,2),(1,3),(2,3),(3,3);
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
INSERT INTO `users_roles` VALUES (1,1),(2,2),(3,3);
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

-- Dump completed on 2019-05-30 11:46:00
