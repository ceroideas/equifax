) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extract` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_post` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `campaigns`
--

DROP TABLE IF EXISTS `campaigns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `campaigns` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT '1',
  `referenced` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_type` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `claim_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `init_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `all_users` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cfgs`
--

DROP TABLE IF EXISTS `cfgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cfgs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `codcfg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipcfg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descfg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valcfg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `claim_tmps`
--

DROP TABLE IF EXISTS `claim_tmps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `claim_tmps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_parties_id` bigint(20) unsigned DEFAULT NULL,
  `debt_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt_type_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concurso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt_tmp_id` bigint(20) unsigned DEFAULT NULL,
  `debtor_id` bigint(20) unsigned DEFAULT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `owner_id` bigint(20) unsigned DEFAULT NULL,
  `gestor_id` bigint(20) unsigned DEFAULT NULL,
  `agreement_tmp_id` bigint(20) unsigned DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `viable_observation` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_clir(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_amount_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_fees_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_amount_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_fees_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judicial_amount_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judicial_amount_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judicial_fees_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judicial_fees_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_amount_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_amount_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_fees_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_fees_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_amount_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_amount_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinay_fees_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_fees_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed_fees_dto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judicial_amount_dto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verbal_amount_dto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ordinary_amount_dto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `execution_dto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resource_dto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_cif` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `debt_documents`
--

DROP TABLE IF EXISTS `debt_documents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debt_documents` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `debt_id` int(10) DEFAULT NULL,
  `document` varchar(191) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `hitos` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `debt_tmps`
--

DROP TABLE IF EXISTS `debt_tmps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `debt_tmps` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concept` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debt_ (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `discount_codes`
--

DROP TABLE IF EXISTS `discount_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discount_codes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` timestamp NULL DEFAULT NULL,
  `date_end` timestamp NULL DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `claim_id` int(11) DEFAULT NULL,
  `gestor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `hitos`
--

DROP TABLE IF EXISTS `hitos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hitos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `send_interval` int(11) DEFAULT NULL,
  `send_times` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoices` (
  `id` bigint(20) unsigned NOT NULL,
  `tipfac` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `claim_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_aTE utf8mb4_unicode_ci DEFAULT NULL,
  `deslor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `canlor` int(11) DEFAULT NULL,
  `dtolor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ivalor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prelor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totlor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dcolor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `claim_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amounts` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_id` int(11) DEFAULT NULL,
  `discount_qty` int(11) DEFAULT NULL,
  `discount_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net1ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net2ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net3ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `net4ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdto1ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdto2ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdto3ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdto4ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idto1ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idto2ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idto3ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idto4ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piva1ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piva2ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piva3ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bas1ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bas2ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bas3ord` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14840 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `send_emails`
--

DROP TABLE IF EXISTS `send_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `send_emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addresse` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `actuation_id` int(11) DEFAULT NULL,
  `send_status` int(11) DEFAULT NULL,
  `send_count` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_content` text COLLATE utf8mb4_unicode_ci,
  `header_content` text COLLATE utf8mb4_unicode_ci,
  `header_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_content` text COLLATE utf8mb4_unicode_ci,
  `footer_content` text COLLATE utf8mb4_unicode_ci,
  `cta_button` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `third_parties`
--

DROP TABLE IF EXISTS `third_parties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `third_parties` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iban` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `legal_representative` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_dni` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `representative_dni_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apud_acta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `locality` varchar(191) /*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-22 20:21:49
