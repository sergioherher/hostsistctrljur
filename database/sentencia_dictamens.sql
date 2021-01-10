CREATE TABLE `sentencias_dictamens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sentencia_id` bigint(20) unsigned NOT NULL,
  `nombre_perito` text COLLATE utf8mb4_unicode_ci,
  `valor_del_dictamen` decimal(8,2) DEFAULT NULL,
  `fecha_de_emision` datetime DEFAULT NULL,
  `tipo_de_perito` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
