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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `demandados`
--

LOCK TABLES `demandados` WRITE;
/*!40000 ALTER TABLE `demandados` DISABLE KEYS */;
INSERT INTO `demandados` VALUES (1,1,'ARREDONDO TIZNADO LUIS ALEJANDRO',0,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(2,1,'CHAVEZ LOPEZ JOSE SALVADOR',1,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(3,2,'AVILA CARRIZALES JANETTE',0,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(4,3,'AVILA RODRIGUEZ JANETTE',0,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(5,4,'AVILA CARRIZALES JANETTE',0,'2019-06-13 21:25:21','2019-06-13 21:25:21');
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
  UNIQUE KEY `doc_juicios_doc_tipo_id_juicio_id_unique` (`doc_tipo_id`,`juicio_id`),
  KEY `doc_juicios_juicio_id_foreign` (`juicio_id`),
  CONSTRAINT `doc_juicios_doc_tipo_id_foreign` FOREIGN KEY (`doc_tipo_id`) REFERENCES `doc_tipos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `doc_juicios_juicio_id_foreign` FOREIGN KEY (`juicio_id`) REFERENCES `juicios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doc_juicios`
--

LOCK TABLES `doc_juicios` WRITE;
/*!40000 ALTER TABLE `doc_juicios` DISABLE KEYS */;
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
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
INSERT INTO `doc_tipos` VALUES (1,'Documentos Fundatorios','fundatorios','2019-06-13 21:25:21','2019-06-13 21:25:21'),(2,'Expediente Judicial','expediente','2019-06-13 21:25:21','2019-06-13 21:25:21'),(3,'Otros Documentos','otros','2019-06-13 21:25:21','2019-06-13 21:25:21');
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
INSERT INTO `estados` VALUES (1,'Activo','2019-06-13 21:25:20','2019-06-13 21:25:20'),(2,'Concluido','2019-06-13 21:25:20','2019-06-13 21:25:20'),(3,'Irrecuperable','2019-06-13 21:25:20','2019-06-13 21:25:20'),(4,'Suspendido','2019-06-13 21:25:20','2019-06-13 21:25:20');
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
  `moneda_id` bigint(20) unsigned NOT NULL,
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
  `audiencia_juicio` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `juicios_moneda_id_foreign` (`moneda_id`),
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
  CONSTRAINT `juicios_moneda_id_foreign` FOREIGN KEY (`moneda_id`) REFERENCES `monedas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_salaapela_id_foreign` FOREIGN KEY (`salaapela_id`) REFERENCES `salaapelas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juicios`
--

LOCK TABLES `juicios` WRITE;
/*!40000 ALTER TABLE `juicios` DISABLE KEYS */;
INSERT INTO `juicios` VALUES (1,1,12345678,10,2,'2249/2017',2,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-08-13 00:00:00','Proxima accion de prueba',1,19234.90,6454.90,3,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba',NULL,3,'Toca de prueba','Autoridad amparo de prueba','Expediente amparo de prueba','Autoridad recurso de amparo de prueba','Expediente recurso de amparo de prueba',NULL,'2019-06-13 21:25:21','2019-06-13 21:27:02'),(2,2,87654321,45,3,'123/2019',4,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-07-13 00:00:00','Proxima accion de prueba',1,19234.90,6454.90,2,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','Procesos asociados de prueba',1,'Toca de prueba','Autoridad amparo de prueba','Expediente amparo de prueba','Autoridad recurso de amparo de prueba','Expediente recurso de amparo de prueba',NULL,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(3,2,87654321,45,3,'12341/2018',4,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-06-30 00:00:00','Proxima accion de prueba',1,19234.90,6454.90,2,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','Procesos asociados de prueba',1,'Toca de prueba','Autoridad amparo de prueba','Expediente amparo de prueba','Autoridad recurso de amparo de prueba','Expediente recurso de amparo de prueba','Audiencia de juicio de prueba','2019-06-13 21:25:21','2019-06-13 21:25:21'),(4,2,87654321,45,3,'9123123/2019',4,'2019-05-13 00:00:00','Extracto de prueba','Nota de seguimiento de prueba','2019-12-30 00:00:00','Proxima accion de prueba',1,19234.90,6454.90,2,'Garantias de Prueba','Datos RPP de prueba','Otros domicilios de prueba','Procesos asociados de prueba',1,'Toca de prueba','Autoridad amparo de prueba','Expediente amparo de prueba','Autoridad recurso de amparo de prueba','Expediente recurso de amparo de prueba','Audiencia de juicio de prueba','2019-06-13 21:25:21','2019-06-13 21:25:21');
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
INSERT INTO `juiciotipos` VALUES (1,'CIVIL','2019-06-13 21:25:20','2019-06-13 21:25:20'),(2,'MERCANTIL','2019-06-13 21:25:20','2019-06-13 21:25:20'),(3,'MERC. ORAL','2019-06-13 21:25:20','2019-06-13 21:25:20'),(4,'JURISVOL','2019-06-13 21:25:20','2019-06-13 21:25:20'),(5,'OTRO','2019-06-13 21:25:20','2019-06-13 21:25:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juiciousers`
--

LOCK TABLES `juiciousers` WRITE;
/*!40000 ALTER TABLE `juiciousers` DISABLE KEYS */;
INSERT INTO `juiciousers` VALUES (1,1,2,'Coordinador Prueba',NULL,2,'2019-06-13 21:25:21','2019-06-13 21:27:02'),(2,1,3,'Pedro Colaborador',NULL,3,'2019-06-13 21:25:21','2019-06-13 21:27:02'),(3,1,6,'BANORTE','Informacion',4,'2019-06-13 21:25:21','2019-06-13 22:13:38'),(4,2,2,NULL,NULL,2,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(5,2,3,NULL,NULL,3,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(6,2,4,NULL,NULL,4,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(7,3,2,NULL,NULL,2,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(8,3,3,NULL,NULL,3,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(9,3,4,NULL,NULL,4,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(10,4,2,NULL,NULL,2,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(11,4,3,NULL,NULL,3,'2019-06-13 21:25:21','2019-06-13 21:25:21'),(12,4,4,NULL,NULL,4,'2019-06-13 21:25:21','2019-06-13 21:25:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgados`
--

LOCK TABLES `juzgados` WRITE;
/*!40000 ALTER TABLE `juzgados` DISABLE KEYS */;
INSERT INTO `juzgados` VALUES (1,'No definido',1,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(2,'1° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(3,'2° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(4,'3° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(5,'4° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(6,'5° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(7,'6° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(8,'7° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(9,'8° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(10,'9° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(11,'10° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(12,'11° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(13,'12° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(14,'13° Civil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(15,'1° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(16,'2° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(17,'3° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(18,'4° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(19,'5° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(20,'6° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(21,'7° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(22,'8° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(23,'9° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(24,'10° Mercantil',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(25,'1° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(26,'2° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(27,'3° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(28,'4° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(29,'5° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(30,'6° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(31,'7° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(32,'8° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(33,'9° Mercantil Oral',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(34,'1° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(35,'2° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(36,'3° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(37,'4° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(38,'5° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(39,'6° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(40,'7° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(41,'8° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(42,'9° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(43,'10° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(44,'11° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(45,'12° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(46,'13° Familiar',2,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(47,'1° Civil Autlán de Navarro',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(48,'2° Civil Autlán de Navarro',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(49,'1° Civil Chapala',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(50,'2° Civil Chapala',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(51,'1° Civil Lagos de Moreno',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(52,'2° Civil Lagos de Moreno',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(53,'1° Civil Ocotlán',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(54,'2° Civil Ocotlán',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(55,'1° Civil Puerto Vallarta',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(56,'2° Civil Puerto Vallarta',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(57,'3° Civil Puerto Vallarta',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(58,'4° Civil Puerto Vallarta',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(59,'5° Civil Puerto Vallarta',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(60,'1° Civil Tepatitlán',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(61,'2° Civil Tepatitlán',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(62,'1° Civil Tlajomulco de Z.',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(63,'2° Civil Tlajomulco de Z.',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(64,'1° Civil Zapotlán (Cd. Guzmán)',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(65,'2° Civil Zapotlán (Cd. Guzmán)',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(66,'1° Mercantil Zapotlán (Cd. Guzmán)',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(67,'1° Civil Ahualulco',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(68,'1° Civil Ameca',3,'2019-06-13 21:25:19','2019-06-13 21:25:19'),(69,'1° Civil Arandas',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(70,'1° Civil Atotonilco',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(71,'1° Civil Cihuatlán',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(72,'1° Civil Cocula',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(73,'1° Civil Colotlán',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(74,'1° Civil Encarnación',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(75,'1° Civil Jalostotitlán',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(76,'1° Civil La Barca',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(77,'1° Civil La Mascota',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(78,'1° Civil Mazamitla',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(79,'1° Civil San Gabriel',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(80,'1° Civil San Juan de los Lagos',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(81,'1° Civil Sayula',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(82,'1° Civil Tala',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(83,'1° Civil Tamazula de Gordiano',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(84,'1° Civil Teocaltiche',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(85,'1° Civil Tequila',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(86,'1° Civil Unión de Tula',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(87,'1° Civil Yahualica',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(88,'1° Civil Zacoalco',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(89,'1° Civil Zapotlanejo',3,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(90,'1° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(91,'2° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(92,'3° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(93,'4° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(94,'5° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(95,'6° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(96,'7° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(97,'8° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(98,'9° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(99,'10° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(100,'11° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(101,'12° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(102,'13° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(103,'14° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(104,'15° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(105,'16° Distrito Admin. Civil y Trabajo',4,'2019-06-13 21:25:20','2019-06-13 21:25:20'),(106,'Otro',5,'2019-06-13 21:25:20','2019-06-13 21:25:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `juzgadotipos`
--

LOCK TABLES `juzgadotipos` WRITE;
/*!40000 ALTER TABLE `juzgadotipos` DISABLE KEYS */;
INSERT INTO `juzgadotipos` VALUES (1,'No Definido','2019-06-13 21:25:19','2019-06-13 21:25:19'),(2,'Primer Partido Judicial','2019-06-13 21:25:19','2019-06-13 21:25:19'),(3,'Juzgados Foráneos','2019-06-13 21:25:19','2019-06-13 21:25:19'),(4,'Juzgados Federales','2019-06-13 21:25:19','2019-06-13 21:25:19'),(5,'Otros','2019-06-13 21:25:19','2019-06-13 21:25:19');
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
INSERT INTO `macroetapas` VALUES (1,'POR DEMANDAR','2019-06-13 21:25:20','2019-06-13 21:25:20'),(2,'JURISDICCION VOLUNTARIA','2019-06-13 21:25:20','2019-06-13 21:25:20'),(3,'DEMANDA','2019-06-13 21:25:20','2019-06-13 21:25:20'),(4,'EMPLAZADO','2019-06-13 21:25:20','2019-06-13 21:25:20'),(5,'ADMISION','2019-06-13 21:25:20','2019-06-13 21:25:20'),(6,'AUD. PRELIMINAR','2019-06-13 21:25:20','2019-06-13 21:25:20'),(7,'PRUEBAS','2019-06-13 21:25:20','2019-06-13 21:25:20'),(8,'ALEGATOS','2019-06-13 21:25:20','2019-06-13 21:25:20'),(9,'AUD. JUICIO','2019-06-13 21:25:20','2019-06-13 21:25:20'),(10,'SENTENCIA','2019-06-13 21:25:20','2019-06-13 21:25:20'),(11,'APELACIÓN','2019-06-13 21:25:20','2019-06-13 21:25:20'),(12,'AMPARO','2019-06-13 21:25:20','2019-06-13 21:25:20'),(13,'AMPARO EN REVISIÓN','2019-06-13 21:25:20','2019-06-13 21:25:20'),(14,'EJECUCION','2019-06-13 21:25:20','2019-06-13 21:25:20'),(15,'REMATE','2019-06-13 21:25:20','2019-06-13 21:25:20'),(16,'TOMA POSESION','2019-06-13 21:25:20','2019-06-13 21:25:20'),(17,'ESCRITURACIÓN','2019-06-13 21:25:20','2019-06-13 21:25:20'),(18,'ATIPICA VER NOTAS','2019-06-13 21:25:20','2019-06-13 21:25:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_05_12_203628_create_permissions_table',1),(4,'2019_05_12_203700_create_roles_table',1),(5,'2019_05_12_204415_create_users_permissions_table',1),(6,'2019_05_12_204706_create_users_roles_table',1),(7,'2019_05_12_205313_create_roles_permissions_table',1),(8,'2019_05_13_205520_create_juzgadotipos_table',1),(9,'2019_05_13_205523_create_juzgados_table',1),(10,'2019_05_13_212717_create_juiciotipos_table',1),(11,'2019_05_13_213018_create_macroetapas_table',1),(12,'2019_05_13_213019_create_estados_table',1),(13,'2019_05_13_213025_create_salaapelas_table',1),(14,'2019_05_13_213027_create_monedas_table',1),(15,'2019_05_13_214500_create_juicios_table',1),(16,'2019_05_13_214600_create_demandados_table',1),(17,'2019_05_15_022700_create_doc_tipos_table',1),(18,'2019_05_15_022800_create_doc_juicios_table',1),(19,'2019_05_25_231454_create_juiciousers_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `monedas`
--

DROP TABLE IF EXISTS `monedas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `monedas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `desc_moneda` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `monedas`
--

LOCK TABLES `monedas` WRITE;
/*!40000 ALTER TABLE `monedas` DISABLE KEYS */;
INSERT INTO `monedas` VALUES (1,'No aplica','2019-06-13 21:25:21','2019-06-13 21:25:21'),(2,'MXN','2019-06-13 21:25:21','2019-06-13 21:25:21'),(3,'USD','2019-06-13 21:25:21','2019-06-13 21:25:21'),(4,'UDIS','2019-06-13 21:25:21','2019-06-13 21:25:21'),(5,'VSMV','2019-06-13 21:25:21','2019-06-13 21:25:21'),(6,'Otro','2019-06-13 21:25:21','2019-06-13 21:25:21');
/*!40000 ALTER TABLE `monedas` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'administrar-perfiles','Administrar Perfiles','2019-06-13 21:25:17','2019-06-13 21:25:17'),(2,'cargar-juicios','Cargar Juicios','2019-06-13 21:25:17','2019-06-13 21:25:17'),(3,'editar-juicios','Editar Juicios','2019-06-13 21:25:17','2019-06-13 21:25:17'),(4,'ver-juicios','Ver Juicios','2019-06-13 21:25:17','2019-06-13 21:25:17');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'administrador','Administrador','2019-06-13 21:25:16','2019-06-13 21:25:16'),(2,'coordinador','Coordinador','2019-06-13 21:25:17','2019-06-13 21:25:17'),(3,'colaborador','Colaborador','2019-06-13 21:25:17','2019-06-13 21:25:17'),(4,'cliente','Cliente','2019-06-13 21:25:17','2019-06-13 21:25:17');
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
INSERT INTO `roles_permissions` VALUES (1,1),(1,2),(2,2),(1,3),(2,3),(3,3),(1,4),(2,4),(3,4),(4,4);
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
INSERT INTO `salaapelas` VALUES (1,'NO APLICA','2019-06-13 21:25:20','2019-06-13 21:25:20'),(2,'TERCERA SALA','2019-06-13 21:25:20','2019-06-13 21:25:20'),(3,'CUARTA SALA','2019-06-13 21:25:21','2019-06-13 21:25:21'),(4,'QUINTA SALA','2019-06-13 21:25:21','2019-06-13 21:25:21'),(5,'SÉPTIMA SALA','2019-06-13 21:25:21','2019-06-13 21:25:21'),(6,'OCTAVA SALA','2019-06-13 21:25:21','2019-06-13 21:25:21'),(7,'NOVENA SALA','2019-06-13 21:25:21','2019-06-13 21:25:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sergio Hernandez','sergioh81@gmail.com',NULL,'$2y$10$7p2Q.ARJDsafD5VJE8qOae2zabkaxQBsPWnFcFYlI8g5ShTVjxAd2',NULL,NULL,'2019-06-13 21:25:17','2019-06-13 21:25:17'),(2,'Coordinador Prueba','coordinador.prueba@mailtrap.io',NULL,'$2y$10$8SrpvXX2kkOwGjJK/sXJguziwNH273UPH1DDwvjtZCP2vXmZKV8Aa',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(3,'Pedro Colaborador','pedro.colaborador@mailtrap.io',NULL,'$2y$10$jNuHVVs16WnmsKNB1uzwHOX.eymvwCVPAGEAnR8fmnYi27x2dxq0W',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(4,'Colaborador Prueba','colaborador.prueba@mailtrap.io',NULL,'$2y$10$Z.LcqBDnwlNA1l1ABYqRqehB/wT/bqWwlLCVFoHeDpVKb5bWu8sCO',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(5,'Jorge AMJ','jorgeAMJ@gmail.com',NULL,'$2y$10$PRH.5TCGeAO3DpXT9/yZpeuW1/M/37Mr6WSh.wxJFHz/Xic5BFlAe',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(6,'BANORTE','banorte@mailtrap.io',NULL,'$2y$10$DJ1Id7RC4HkUR/eloM7Kvuyv.rdRotVj/qCSbE1VqjwZ/CsjeFvUq',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(7,'BANESCO','banesco@mailtrap.io',NULL,'$2y$10$D4U.f86Ebr570cSMXzyBz.UZkzgLeJ/w58.us2AEdVui1SFHwIu1y',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(8,'Juan Perez','juan.perez@mailtrap.io',NULL,'$2y$10$J83aNJttAveJwX375lVTEOx6QVT7ywqlHHksRIhZcjxaN.78XG0lK',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18'),(9,'Fulanito de Tal','fulanito@mailtrap.io',NULL,'$2y$10$lcawgMwPB8ZPQoVBI98co.zrHGj5sTX6E1E4OkAwdQVaX8VXsPGl.',NULL,NULL,'2019-06-13 21:25:18','2019-06-13 21:25:18');
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
INSERT INTO `users_permissions` VALUES (1,1),(5,1),(1,2),(2,2),(5,2),(1,3),(2,3),(3,3),(4,3),(5,3),(1,4),(2,4),(3,4),(4,4),(5,4),(6,4),(7,4),(8,4),(9,4);
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
INSERT INTO `users_roles` VALUES (1,1),(5,1),(1,2),(2,2),(5,2),(1,3),(2,3),(3,3),(4,3),(5,3),(6,4),(7,4),(8,4),(9,4);
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

-- Dump completed on 2019-06-13 15:29:54
