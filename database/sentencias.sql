CREATE TABLE `sentencias` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `juicio_id` bigint(20) unsigned NOT NULL,
  `fecha_sentencia` datetime DEFAULT NULL,
  `cant_sentencia` decimal(8,2) DEFAULT NULL,
  `moneda_id` bigint(20) unsigned NOT NULL,
  `fecha_presentacion` datetime DEFAULT NULL,
  `monto_liquidado` decimal(8,2) DEFAULT NULL,
  `fecha_causa_estado` datetime DEFAULT NULL,
  `monto_aprobado` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sentencias_juicio_id_foreign` (`juicio_id`),
  KEY `sentencias_moneda_id_foreign` (`moneda_id`),
  CONSTRAINT `sentencias_juicio_id_foreign` FOREIGN KEY (`juicio_id`) REFERENCES `juicios` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sentencias_moneda_id_foreign` FOREIGN KEY (`moneda_id`) REFERENCES `monedas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
