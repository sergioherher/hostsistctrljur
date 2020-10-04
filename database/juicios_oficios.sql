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
-- Table structure for table `juicios_oficios`
--

DROP TABLE IF EXISTS `juicios_oficios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `juicios_oficios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juicio_id` bigint(20) unsigned NOT NULL,
  `oficio_id` bigint(20) unsigned NOT NULL,
  `recibido` datetime DEFAULT NULL,
  `entregado` datetime DEFAULT NULL,
  `contestado` datetime DEFAULT NULL,
  `recordatorio_recibido` datetime DEFAULT NULL,
  `recordatorio_entregado` datetime DEFAULT NULL,
  `recordatorio_contestado` datetime DEFAULT NULL,
  `da_domicilio` tinyint(1) NOT NULL,
  `domicilio_dado` text COLLATE utf8mb4_unicode_ci,
  `domicilio_habilitado_autos` tinyint(1) NOT NULL,
  `diligenciado` tinyint(1) NOT NULL,
  `fecha_diligencia` datetime DEFAULT NULL,
  `resultado_diligencia` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `juicios_oficios_juicio_id_foreign` (`juicio_id`),
  KEY `juicios_oficios_oficio_id_foreign` (`oficio_id`),
  CONSTRAINT `juicios_oficios_juicio_id_foreign` FOREIGN KEY (`juicio_id`) REFERENCES `juicios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `juicios_oficios_oficio_id_foreign` FOREIGN KEY (`oficio_id`) REFERENCES `oficios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-04  1:30:17
