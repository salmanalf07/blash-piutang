/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - blash-piutang
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blash-piutang` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `blash-piutang`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `kemahasiswaans` */

DROP TABLE IF EXISTS `kemahasiswaans`;

CREATE TABLE `kemahasiswaans` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) DEFAULT NULL,
  `no_phone` varchar(225) DEFAULT NULL,
  `ext` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `kemahasiswaans` */

insert  into `kemahasiswaans`(`id`,`nama`,`no_phone`,`ext`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'salman','082240853344','1183',NULL,NULL,NULL);

/*Table structure for table `mahasiswas` */

DROP TABLE IF EXISTS `mahasiswas`;

CREATE TABLE `mahasiswas` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `surat_id` bigint(20) DEFAULT NULL,
  `no_surat` bigint(20) DEFAULT NULL,
  `template_id` varchar(225) DEFAULT NULL,
  `no_formulir` bigint(20) DEFAULT NULL,
  `nim` bigint(20) DEFAULT NULL,
  `nama` varchar(225) DEFAULT NULL,
  `jenjang` varchar(225) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `bp3` bigint(20) DEFAULT NULL,
  `bp3_tempo` date DEFAULT NULL,
  `sks` bigint(20) DEFAULT NULL,
  `sks_tempo` date DEFAULT NULL,
  `lab` bigint(20) DEFAULT NULL,
  `lab_tempo` date DEFAULT NULL,
  `uniform` bigint(20) DEFAULT NULL,
  `uniform_tempo` date DEFAULT NULL,
  `alat` bigint(20) DEFAULT NULL,
  `alat_tempo` date DEFAULT NULL,
  `dp31` bigint(20) DEFAULT NULL,
  `dp31_tempo` date DEFAULT NULL,
  `dp32` bigint(20) DEFAULT NULL,
  `dp32_tempo` varchar(225) DEFAULT NULL,
  `total` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mahasiswas` */

insert  into `mahasiswas`(`id`,`surat_id`,`no_surat`,`template_id`,`no_formulir`,`nim`,`nama`,`jenjang`,`email`,`bp3`,`bp3_tempo`,`sks`,`sks_tempo`,`lab`,`lab_tempo`,`uniform`,`uniform_tempo`,`alat`,`alat_tempo`,`dp31`,`dp31_tempo`,`dp32`,`dp32_tempo`,`total`,`created_at`,`updated_at`,`deleted_at`) values 
(7,192,20,'1',25144861,2502021411,'ALVIN RAMADHAN','Undergraduate (S1)','yogi.trianto@binus.edu',0,'2022-01-22',0,'2022-01-22',1600000,'2022-01-22',0,'2022-01-22',9000000,'2022-01-22',0,'2022-01-22',12200000,'2022-01-22 00:00:00',22800000,'2022-02-03 16:06:41','2022-02-03 20:58:12','2022-02-03 20:58:12'),
(8,192,21,'1',25141328,2502087465,'ANGGINA MELVI PUTRI LUBIS','Undergraduate (S1)','m.farisi@binus.edu',0,'2022-01-22',0,'2022-01-22',1600000,'2022-01-22',0,'2022-01-22',9000000,'2022-01-22',0,'2022-01-22',8000000,'2022-01-22 00:00:00',18600000,'2022-02-03 16:06:41','2022-02-03 20:58:12','2022-02-03 20:58:12'),
(9,192,22,'1',25142720,2501986340,'AULIA RAMADHANI FATHURRACHMAN','Undergraduate (S1)','yehezkiel.novianto@binus.edu',0,'2022-01-22',0,'2022-01-22',2600000,'2022-01-22',0,'2022-01-22',9000000,'2022-01-22',0,'2022-01-22',0,'2022-01-22 00:00:00',11600000,'2022-02-03 16:06:41','2022-02-03 20:58:12','2022-02-03 20:58:12');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `personal_access_tokens` */

DROP TABLE IF EXISTS `personal_access_tokens`;

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `personal_access_tokens` */

/*Table structure for table `rekenings` */

DROP TABLE IF EXISTS `rekenings`;

CREATE TABLE `rekenings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `bank` varchar(225) DEFAULT NULL,
  `no_rek` bigint(20) DEFAULT NULL,
  `nama_rek` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `rekenings` */

insert  into `rekenings`(`id`,`bank`,`no_rek`,`nama_rek`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'BCA',5270989898,'Yayasan Bina Nusantara',NULL,NULL,NULL);

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('2vhnnh2EzsLil0ObmnRpBZ6iFGv0vY9akw1kDH31',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoibW5ENUtvSVE0eE9yenlmRHlnaE12VEZpbEJjbzJldExBTzZEU2psTSI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vcGl1dGFuZy5sb2NhbC9oaXN0b3J5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJDU0OVRVelVoREIwUkZhQVVTL2RDUC4wYmlzeVBGdzZLNklLZTF0N2ttVzNXWW85NUlPY282IjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCQ1NDlUVXpVaERCMFJGYUFVUy9kQ1AuMGJpc3lQRnc2SzZJS2UxdDdrbVczV1lvOTVJT2NvNiI7fQ==',1643973654),
('5VCM6JM41JipmHKWJU6jDpjRe6dnWmkacKImLrRH',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoickM2TVV5WXNKNVpUNHpMVTJkR2NHTVBYR1I3bDBhVmRCSDFkcEt6byI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vcGl1dGFuZy5sb2NhbC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkNTQ5VFV6VWhEQjBSRmFBVVMvZENQLjBiaXN5UEZ3Nks2SUtlMXQ3a21XM1dZbzk1SU9jbzYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDU0OVRVelVoREIwUkZhQVVTL2RDUC4wYmlzeVBGdzZLNklLZTF0N2ttVzNXWW85NUlPY282Ijt9',1643883399),
('pFZYuojA9k38GJGjZq31zo9h1Qy6ZIuMZsq1HBzU',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoienNyZGpwYU8zb21oTEVqa0YwNlRjTnlzc0g0dVpyNmtsQVBXdmNQZiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyODoiaHR0cDovL3BpdXRhbmcubG9jYWwvaGlzdG9yeSI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vcGl1dGFuZy5sb2NhbC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1644032387),
('QgHl69XPAfLjtfOYuLt5un652ytBoQdvBM0Dr0r7',4,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:96.0) Gecko/20100101 Firefox/96.0','YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMjY4dk5sZlVHWXNKT09FZ2MxY3BVYzA0T0JlQUxEbDFLcUN0clVxdyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMwOiJodHRwOi8vcGl1dGFuZy5sb2NhbC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkNTQ5VFV6VWhEQjBSRmFBVVMvZENQLjBiaXN5UEZ3Nks2SUtlMXQ3a21XM1dZbzk1SU9jbzYiO3M6MjE6InBhc3N3b3JkX2hhc2hfc2FuY3R1bSI7czo2MDoiJDJ5JDEwJDU0OVRVelVoREIwUkZhQVVTL2RDUC4wYmlzeVBGdzZLNklLZTF0N2ttVzNXWW85NUlPY282Ijt9',1643896794);

/*Table structure for table `surats` */

DROP TABLE IF EXISTS `surats`;

CREATE TABLE `surats` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date_send` date DEFAULT NULL,
  `hal` varchar(225) DEFAULT NULL,
  `date_bayar` date DEFAULT NULL,
  `norek_id` bigint(20) DEFAULT NULL,
  `semester` varchar(225) DEFAULT NULL,
  `kemahasiswaan_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4;

/*Data for the table `surats` */

insert  into `surats`(`id`,`date_send`,`hal`,`date_bayar`,`norek_id`,`semester`,`kemahasiswaan_id`,`created_at`,`updated_at`,`deleted_at`) values 
(192,'2022-02-03','Peringatan Pembayaran','2022-01-21',1,'2020/2021',1,'2022-02-03 20:57:22','2022-02-03 20:57:22',NULL);

/*Table structure for table `templates` */

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `templates` */

insert  into `templates`(`id`,`template`,`created_at`,`updated_at`,`deleted_at`) values 
(1,'pdf_piutang',NULL,NULL,NULL);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`two_factor_secret`,`two_factor_recovery_codes`,`remember_token`,`current_team_id`,`profile_photo_path`,`created_at`,`updated_at`) values 
(4,'Salman','m.farisi',NULL,'$2y$10$549TUzUhDB0RFaAUS/dCP.0bisyPFw6K6IKe1t7kmW3WYo95IOco6',NULL,NULL,NULL,NULL,NULL,'2022-01-22 01:29:32','2022-01-22 01:29:32');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
