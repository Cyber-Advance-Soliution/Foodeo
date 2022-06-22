-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 11, 2022 at 07:11 AM
-- Server version: 10.3.24-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyberaso_foodordering_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `username`, `role`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 10, 1, 'superadmin@foodeo.com', NULL, '$2y$10$68N8GubryLRmUzyvecqpWuAbix3gURUBs.OJdjF5laaFA2.2OiF96', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `u_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_token` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `is_facebook_id` tinyint(4) DEFAULT NULL,
  `is_google_id` tinyint(4) DEFAULT NULL,
  `google_token_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_token_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_verify_status` tinyint(4) NOT NULL DEFAULT 0,
  `phone_verify_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `u_id`, `device_token`, `username`, `role`, `is_facebook_id`, `is_google_id`, `google_token_id`, `facebook_token_id`, `email`, `email_verified_at`, `password`, `latitude`, `longitude`, `customer_address`, `code`, `phone_number`, `phone_verify_status`, `phone_verify_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'UXluxzoa8pX7VIvckpkPJqhy2AB2', 'cA6PNg_YXSY:APA91bGLprOV6OFQRHJqRG8xuGSX8_HcJpISoJpo1jUMfEj_4R7Nf3jgCBp7oIMvtl0HCKX7KYv-PDfzgMqg4Hgk6bu2zlRqzC05FaPO15dU8qI49ZKBRdq7-JVsLPcJMfa3zC4kUAny', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$LSyfUmVeSmT6d9WEJH02sO/wbkhSX7TOth6c7Qb86cPQL6Z9H3BN6', '31.5084169', '74.3225897', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', NULL, '+923114538678', 0, NULL, NULL, '2020-03-03 05:35:03', '2020-09-07 03:58:35'),
(2, 's0fSxbKo6pb9h8IaEChYAeF3JLM2', 'doDqTCuUcX8:APA91bFOcs4uFbtXceFl-XQd8wLWSv3QEzAW3TlUItf4J7WTZK3i1L2poH-odtYTzD_DX86d-jRVrBU53dhrb6wWLO_kBrGhSQJml-pxm2zGedFhKCCvzFEnip3oH8KhAYAjNYHPCwNo', 'zahid mahmood', 3, 0, 1, NULL, NULL, 'zahidaz2010@gmail.com', NULL, '$2y$10$0791yEuIIZA6YOp0GYlnLOjfceuuvwQ8uxf3wiYy45dTFz83uCFg.', '31.508406', '74.3225887', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', NULL, '+923235102689', 0, NULL, NULL, '2020-03-03 05:35:44', '2020-03-03 05:53:57'),
(3, 'B0oGfXSHzKaYvz91JqQ5Z8ZE00Q2', NULL, 'Nuage Laboratoire', 3, 0, 1, NULL, NULL, 'ao55cpfjzfvlgn6ibsf6uootne-00@cloudtestlabaccounts.com', NULL, '$2y$10$Tgi1bJ4O3evj3fGB1mymv.hynqIcrF/Ith6dB76PgCOm4ie8BKRCe', '37.779564', '-122.391617', '151 Townsend St, San Francisco, CA 94107, USA', NULL, NULL, 0, NULL, NULL, '2020-03-03 10:13:08', '2020-03-03 10:13:08'),
(4, 'Wjo0YZ4zx1c0r9KremhZwEkdJY22', 'f0-tsSZ55vQ:APA91bGETY7dXfDiHcFZ8bm75CTg5fjce1e1o-olHftXHXbqxuxhEf2vTlcL_bNDzfLm4vvpcBE5LFO_1-jFRh_0LxhaSoMeZ1hZ6URkzKWyXwYrC3r_85rUMAeuJRAI_UpS-ceMXJzH', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$JnDAUBwA1hs7GK.7FNNGMux0Eg4LqA.Ai6L2.TJTi/fZ9z6aAVDRO', '31.5161846', '74.3432383', 'Shop # 58 1st Floor, Hafeez Centre, Block E1 Block E 1 Gulberg III, Lahore, Punjab, Pakistan', NULL, '+923219467019', 0, NULL, NULL, '2020-03-18 10:18:49', '2020-03-18 11:47:31'),
(5, 'N049vgzpqWamJVdbDXR1Olpxy732', 'duV94F8vI5E:APA91bGF8gYJA8Q7BrIMpO8py8yX_eKkv6VtTqOssrQvsImF9gFWd49n7kwKk2xUWirVO-dv-_M7ADAEfCtVsSEwl1pXrgvfh1u8xGyklEwGrMX4nM33zviPDe3an_8LviUF9V4nHBMj', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$aAFqOQwnj1AmWxnagw6klOmIApuEwvMBqJUkhQQz7Aj0CmcU/Dy86', '24.8787264', '67.1491277', 'Plot 113 A, Reta Plot Shah Faisal Colony, Karachi, Karachi City, Sindh 75230, Pakistan', NULL, '+923330276843', 0, NULL, NULL, '2020-03-26 18:13:09', '2020-03-26 18:13:14'),
(6, '3pLOIip8uHRZgoDLyiIb5PjPmDf2', 'fPmf0kPVN5g:APA91bHeUK4pKZYxAankMqR2jMh1UKegSgwadvdowas5cbM1FIeyzdz5Q_685zCvOfAXrR9Rr4gG608ZIVeSaiWGwVljyBGpqxecehldHAzL8O3hOfDw5JxaE_RCfmGHDrgpuyuWKnqZ', 'Amjid Ali', 3, 0, 1, NULL, NULL, 'aimypk@gmail.com', NULL, '$2y$10$sixXfCreCtYwju.Ok0lkh..gNn.Qc6wJKojyY9XoobCaDnWNlcTl.', '23.5689891', '58.5698244', '63 St, Muscat, Oman', NULL, NULL, 0, NULL, NULL, '2020-03-28 08:48:51', '2020-03-28 08:48:52'),
(7, 'GTE0mGE7BpgUpyst6RrVM4oofFq1', 'f_Rdrd_MLZU:APA91bHZM_icgnvEw55w1c-y7w9p-z6U-i5lwd69vQ7TDzuk66utXkA_qsoqvk0rcz8JG196yuosJPOpn0Anbdr7YT5AlK7fpCdP4QqtbLeIHQBZNFIoxnQzRu5p7f7nY-lx5EgDBpqe', 'Bagus C.E', 3, 0, 1, NULL, NULL, 'bagus.cecep@gmail.com', NULL, '$2y$10$XkPF97rOwZNuAYPb2fRL.OCZZX5vw/gOkotH9FVEg8f7DJOTcpgf.', '1.1345224', '104.0182311', 'Jl. Gn. Bromo No.16b, Kp. Pelita, Kec. Lubuk Baja, Kota Batam, Kepulauan Riau 29444, Indonesia', NULL, NULL, 0, NULL, NULL, '2020-04-08 18:31:10', '2020-04-11 15:54:21'),
(8, 'Dv3xh3bENbhBy1ri9eOjCEaS8FI3', 'dIgsCt6HyqU:APA91bHPyxP7ZU_VuOIDfRm8NOaZQVyJy9ndOmh44s53AZ0KMSCzP3WGKBQ5IC-15XApWYkrx9NP20jO5EwVe2AQs48gaapoVyS3hgBR6nKR61_twqJOkWCW2UxueO1G7BF_woDsKvFs', 'Andoni Vidal', 3, 0, 1, NULL, NULL, 'andonividalolcoz@gmail.com', NULL, '$2y$10$yJo.Rcthzcwo97JnyyX75OmVBCt1T8pJZ9kRW/bAkeyOtu6xXwbFC', '43.3243855', '-1.9720845', 'Secundino Esnaola Kalea, 37, 20001 Donostia, Gipuzkoa, España', NULL, NULL, 0, NULL, NULL, '2020-04-22 19:07:22', '2020-04-22 19:07:25'),
(9, 'XyPE2ECQBdhqJrbx4ixNnNunZKG3', 'cA6PNg_YXSY:APA91bGLprOV6OFQRHJqRG8xuGSX8_HcJpISoJpo1jUMfEj_4R7Nf3jgCBp7oIMvtl0HCKX7KYv-PDfzgMqg4Hgk6bu2zlRqzC05FaPO15dU8qI49ZKBRdq7-JVsLPcJMfa3zC4kUAny', 'Zahid Mahmood', 3, 0, 1, NULL, NULL, 'zahidmahmood11895@gmail.com', NULL, '$2y$10$.OKVUWhNpumpKFsQ4AW6ButNIeTlVmUZry9LMz5YQIIuYrmthVSg2', '31.5083889', '74.3226487', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', NULL, '+923235102689', 0, NULL, NULL, '2020-07-01 07:14:48', '2020-07-01 07:21:58'),
(10, 'qW1nIolpq9Runs1l8TfcwH5o6kK2', 'colJCm8E3CA:APA91bGvlBdoaG4wqf-lthr98SBZt8NxfDAnqrOVjvpx3nPJWbgQltw5sV_dos3jdqdQTXA8JhJvTnIklJIh2C_Z2yG4luXbsc-4Sdrx_ZMApuHBOd9v6GWcsJKthWIHyCtfR2EHsKpT', 'Tahir Farooq', 3, 0, 1, NULL, NULL, 'farooqtahir294@gmail.com', NULL, '$2y$10$zsGCS0brXj4UnukURESRqOxpnLyEUzazDx9pfWXbVuctNRWuzEwz.', '31.5083811', '74.3226276', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, '+923334950504', 0, NULL, NULL, '2020-07-10 05:29:33', '2020-07-11 08:34:38'),
(11, 'aibaEhuJfPg6OMXYCu0VCyVmgNo1', 'e6YChAJobPk:APA91bEs7fUTmkH0FrXVa5IRah1N8Vsi1QSV0Utgxh8Ly-mpV-Dtxbyq3Fhv_gF4CwJnhOy8-lAJSGxlsxCF9LBkBn_1JRMWoZJy7RLLxvqTkJ53PHVw3yv45qmAdKxFycZRpBv6bVp8', 'hashir faseeh', 3, 0, 1, NULL, NULL, 'hashirfaseeh1@gmail.com', NULL, '$2y$10$6B43wTo3HCFXUyahjpV.pOuMEqzfsrdM9IP6nbR0n.VLOGREwrOqC', '31.5085119', '74.3224286', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, NULL, 0, NULL, NULL, '2020-07-10 12:19:36', '2020-08-09 16:55:17'),
(12, 'jiiYAm1Bp8RTjIcjOYD466fpf9w2', 'fEkDggcDV_A:APA91bE_1zkbzodlrtkroCOTsI83G6b-fCPcErCKcRhmj8Ro7YYDv2yw5S_ytRmLdf3QNKKKK2BPe3sQ-Ird-SNPsCTUnh2xfldUx-ZfrFsf_Rk0Qka8o4Ouzy6O-qoi7Wd120mntViu', 'Mohammad Arif', 3, 0, 1, NULL, NULL, 'm.arif121@gmail.com', NULL, '$2y$10$Uedr8MCFew0t5uwbeGUAseA.4wdtwnr3arc6GMofxryoDwxe7qqum', '43.1277213', '-88.0344419', '6031 N 98th Ct, Milwaukee, WI 53225, USA', NULL, '+923005551212', 0, NULL, NULL, '2020-07-10 13:00:39', '2020-08-09 05:17:50'),
(13, '9AP9umxLOdOnKZwZ51hZjdyFAps1', 'ein5Q4p_nQw:APA91bFpl8JQWT6QlXKYF2THFMuJf8lPCuR5ekszBDtpwKDMkWivzwLyjcJLvAszB5cIVozRlvvkFzZQ7KMzL55ZynQbVSF-lCBOr2aUPabWrtoypzNP0y7yStBiWCWclyAZxhEX45hc', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$dVMFSbrezkcvkzRX7LWTSuHQoFPXCRGs48.v1Ql.wA7ARhnVtx3sa', '31.5303948', '74.3177652', '7 Zaildar Road, Ichhra Shah Din Scheme Lahore, Punjab 54000, Pakistan', NULL, '+923244999080', 0, NULL, NULL, '2020-07-11 17:51:11', '2020-07-12 13:05:56'),
(14, 'vGrdgpV1XgecirpZKriVEvaEXRJ3', 'dTWvqtokQVc:APA91bF2X6Whd4qdT6aulXSL54a3UAhCTEkv8-WWeeRHsZijm356y1-v9XAOjZNo57zIvhFRbUfjXJHDiqYKKQoWr4kFiVlCW88QqPLDydUQx5d-i9JHZ61ZoCjT4n4m_NwbwYQ9N4-_', 'muhammad tahir farq', 3, 0, 0, NULL, NULL, 't.farooq@hotmail.com', NULL, '$2y$10$QO8NW2R7mSp20eZ863mbqe9XTjNRWV61/COErUL1EAQVeOsGDAPK2', '31.5084785', '74.3224655', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, '+923334950504', 0, NULL, NULL, '2020-07-13 09:13:39', '2020-08-22 20:47:48'),
(15, 'gTFnb5ZeawOgllQFlQslDHUVWp02', 'e2mVgtq1eZ4:APA91bHeEeaG_vuKFhVq-7dE3mZwcW7XcTBh1yioZ8jzQSPB_vX8UJKARd0w5BTt_Z0jUAMwZeNIx0BLDDQcBJYhmpTAD6s4hLJPdDckdxDCAJvynbcNSjhFaMvl2_A2G72Ijl_6IT55', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$y5XwEZfFnIT99MOCAG.rvuNdqSZ2eVwP4lFjDEqQdKp9SXzckAJSu', '31.5069345', '74.2656303', 'Meraj Park Rd, Kharak Awan Town, Lahore, Punjab, Pakistan', NULL, '+923009446904', 0, NULL, NULL, '2020-07-24 11:32:09', '2020-07-24 11:33:34'),
(16, '1h07Ilg0KZSguZeLfjLkgyMGkn53', 'cw-hGYer33s:APA91bGY6O6r0W_qbIZPI5hT2IINqNVKepA85LW1elKAp-JDWm3-b2UziQpm0c9iMOulA1Q-Q1bI9H9lcb5toPY6DlUJC5-MPo8yzbT5QdjgJq-IbX1v42_277uxOATR97gD7KWXFGJy', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$GAUAbBnfpIhQuUvBaSjTGeyETteUY792g39HQBQzZe4WC/cpea1pa', '31.509908', '74.3237372', '77 Masood Farooqi Rd, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', NULL, '+923214715677', 0, NULL, NULL, '2020-08-03 11:24:07', '2020-10-14 11:39:38'),
(17, 'YsKi5mqaRVfA1VohSmFhFghcilC3', 'eMahfJgzsIM:APA91bEwFx_Y2-lif75rFVzRSfmYJS6eyw9Tr5q6gOZxQYpTXBAaiYgn8IdttBqpqFZAUOFyl3s4Izg4eM5aEagY8wSRXxs66x9kxmZXcczeiIsc9dly4qhHh_Y8sb-TBlKYdmnmoH_g', 'Niveditha k s', 3, 0, 1, NULL, NULL, 'nivedithaks302@gmail.com', NULL, '$2y$10$l2Iyd8iuB.X0mxz7DQTD0.uMkyMBkFnMwNkhGZ7rQszxLQ4YgmCG2', '10.5276024', '76.216084', '11, Mahakavi Vyloppilli Sreedhara Menon Rd, Chembukkav, Thrissur, Kerala 680020, India', NULL, NULL, 0, NULL, NULL, '2020-08-06 12:06:02', '2020-08-08 14:50:36'),
(18, 'nchFwabSFNUGnsHVswD5X8xiGZ33', 'fdef3XmuqhQ:APA91bGVxG-lGQJVqZKWHcx0oxA-9Md0kDH-FswMyXfBr_I97LJbq-5g7-HHnfiqfCvnQNPoSunUCsslZtpHVPhD9xsXKFzIpaStr3YmtMZMA4q3Y5zWoa6Ucgq9gJMqG-PcYo4jfazm', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$4IriAXf/dmpeNnFjL/7FbOSdTLm94v8B9s4R6wuILUXP8PHdwRsoO', '31.5715844', '74.4124185', 'Street No.2, Fatehgarh, Lahore, Punjab, Pakistan', NULL, '+923424150906', 0, NULL, NULL, '2020-08-11 14:32:13', '2020-08-11 19:47:53'),
(19, 'vLnOTew5eGM3Al9EzxGYpK7Ms6I2', NULL, 'Nuage Laboratoire', 3, 0, 1, NULL, NULL, 'ao55cpfjzfvlgn6ibsf6uootne-01@cloudtestlabaccounts.com', NULL, '$2y$10$E5OzT7eXENCokgNCmOvSF.APiDVfqsNTxruLmq2PYNyMLmJ3FgmYW', '37.779564', '-122.391617', '151 Townsend St, San Francisco, CA 94107, USA', NULL, NULL, 0, NULL, NULL, '2020-08-14 11:35:18', '2020-08-14 11:35:18'),
(20, 'jdq9AqjVOuUCxkNacetyuiJWWZ33', 'dKdpDivLohM:APA91bGzjEOIhBYMUDqZhVzS6TbQicbgqaf6zenrYx5TmP6M6UrmfhrvusKcROkj0cp9NndsXc_3IG0wUO52Q23kA8_6JXDyoK0kXmXfey6t5aWq51odKisv-eTRh-0UPQ-ktcDU400o', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$.69VF4QhBmoMBoLteSzLheTwINYGgoqL3D68rFY2D4Roy2A54Rnx6', '31.8366601', '70.9036848', 'North Circular Road, Dera Ismail Khan, Khyber Pakhtunkhwa, Pakistan', NULL, '+923013310571', 0, NULL, NULL, '2020-08-27 11:47:58', '2020-09-11 13:15:59'),
(21, '6XR4KzcGLehSIlsFE7M4ToLVEiF3', 'fO43vnB3nPI:APA91bHte5njrFRMyKx46cd_9HQ-L6OH_RAEUNGnphkG5L4ZdRMLjtJCXvj-MD6Z6ZWRArYubWxygYbSkG7298ZXY6olHE_pMU2g2WeyY22wwK2JMiXFWX8Z1o1-0gKj-BLcUcU3HB-C', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$pOAI33KrU3QRGuhHX5yoeObo3U/TqcVXf8UGFBqLW.JgKGFquBaFK', '31.5084453', '74.3225544', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, '+923214921572', 0, NULL, NULL, '2020-08-27 14:24:04', '2020-08-29 15:45:10'),
(22, 'M1FyCudFUoRjHaqzwN8EGGTflgk1', 'cGzKhONKZSs:APA91bHwnX5PWDmxTGAG4IophEBqZ4gRfZPdBkdEN-Wq9LOt4bjMEDpRTmQD_HfG4evMHRp-tolRsCi1KT8bThLfEAlJlwMBC2XWf_OBYp_-oFpAiOqWKT8IMc0Tt4oj6M5g10XofM8y', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$eXqezGFdiUxrJOgQAW/FROkUfoq6CstSmCpIukjNM6dQ86hQzC2c2', '31.5077168', '74.3228957', 'Plot 216, Garden Block Garden Town, Lahore, Punjab, Pakistan', NULL, '+923208687003', 0, NULL, NULL, '2020-09-02 05:32:50', '2020-09-02 05:36:52'),
(23, 'jtFLSHV3H8MUNy6gmqLzJ0ZfThJ2', 'f90gcKWqkQs:APA91bE_7qBXg8SOGX6RoMODKASyuZgilvlCqJu7o_35BS2NHfLenIzRPgneKspG4Y3-eZQU4_yrrUbgp6O78rVm2FmLwtI8EH-MyaPp63fBigcmDGevLnMubO0IrIxTT1j1v1p_QTdV', 'FRANCISCO ALVARADO', 3, 0, 1, NULL, NULL, 'alvaradofja@gmail.com', NULL, '$2y$10$FKMzKjcxuz1QusQrQmBIuebQoyh6CzrmEJ0Tnm.0xGlFEBFx.Ma/a', '4.6436251', '-74.1265724', 'Cl. 12 #31, Bogotá, Colombia', NULL, '+923014842619', 0, NULL, NULL, '2020-09-02 14:57:27', '2020-09-02 14:57:31'),
(24, 'wriUzoXYzkfiusJjNCCbyvY9JK22', NULL, 'ThePizzaHut DIKhan', 3, 0, 1, NULL, NULL, 'pizzahutdikhan@gmail.com', NULL, '$2y$10$UhQThoPeH2G.Kgm.IbGYEe4ksnkujhJDyS3v1l7mCcyAF8of9pVcW', '31.8390792', '70.8983696', 'North Circular Road, Dera Ismail Khan, Khyber Pakhtunkhwa, Pakistan', NULL, NULL, 0, NULL, NULL, '2020-09-03 11:36:34', '2020-09-03 11:36:34'),
(25, 'FaWNcQwQSvfFKz9ii4AQpDXWMZ73', 'c-zbiX0Nzeo:APA91bHx3q2zFWouO-tGM6-USVf7RkYgHhJHAHflYcodlmC-WJkdHSv0cmEZyXCICo6qSarIDgwnDwMmR9DgDkuabfKCZV3BXTn8htBl0YZb3jwdafaL4g1O5G92_sqkklplLLm38uH4', 'Applace net', 3, 0, 1, NULL, NULL, 'fawd.isol@gmail.com', NULL, '$2y$10$/nWpStEWyJsN4bO7K5V.ReyzHyiBB0t.6zIaryNf1LzB95pC3hDBO', '31.508411', '74.322546', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, NULL, 0, NULL, NULL, '2020-09-04 11:48:06', '2020-09-04 17:35:46'),
(26, 'vkDLzvgBIcaKhchqnMYQGwK1vBf2', 'ddqgv_fXmGM:APA91bGCkVo5swjQExh4ikFoXCgf8b1gkSjeikC6JXeMgIqFMNuU7a3C6cktXS6Jr8GCpNmUlrn9owdIeCpEG5Gr9PppS5CyQunOIAmX9ffiSVz0-Y5Cy0hisBmopxEzhdFlRTgICNpj', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$HRUjLZPRDftJFdhIcwjMwu4JSxiZBGOQNW7XAHtp7sKnhLFNDiU3m', '31.5084024', '74.3226029', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, '+923326201896', 0, NULL, NULL, '2020-09-05 06:20:12', '2020-09-05 06:21:29'),
(27, 'T3UROzdXv0XDXl8CQJ2PYQLLqK73', 'dAuqX_oxEGU:APA91bEHmW2HBkwvYeWthGLd9xexQI8bUhtDN9sNi4bBUjd4bsexM2ejl8JOk-2Ox-NPHIDw1bXyQk-qbN_mFgMO9wnJoCOLaIaVNMeh-BoWT5CMjHt_f1opMsSYa59zEsFYg2ovYdQt', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$O4geFZSvBTfNrez3IICGfu4D0l3Py6DpZQXGiuOfyhLYApLYaYAY2', '52.0361085', '4.2930684', 'Gaasterlandlaan 45, 2548 NH Den Haag, Netherlands', NULL, '+923035648264', 0, NULL, NULL, '2020-09-09 20:13:11', '2020-09-09 20:16:13'),
(28, 'WhfPUkBKnnZlIbd2jk1obgRuk672', 'd8g_kYluhUM:APA91bGyCWgM3DOVMHJU6zR7xG23qwyMlPG-nyIoVSsTu_kgDJlKXWUHrsY4xnU9SHiIsxMGBGJKAcTLaInYXvkownsX37thFfrEPCOBt7Nl_BU0c3cyLC-Sel1aK8ztg9k8e3cYXh05', 'Andrea flores', 3, 0, 1, NULL, NULL, 'andyfloresayala8@gmail.com', NULL, '$2y$10$OQiEzrWjwD8WxwPo/tECru1XTTPH0eI2WnKOev/n7EYlUvgA6PC8u', '13.5746675', '-89.2941828', '1a calle poniente #524 el centro del san salvador, El Salvador', NULL, NULL, 0, NULL, NULL, '2020-09-11 16:33:15', '2020-09-11 16:33:18'),
(29, 'IMHmembmLyfSuth4R4lclcompHj1', 'cUQC5PWIJqo:APA91bEcEeJ2igEOBOrYoAQuPZgUhBhDGuo_rnPGj0PwSZg0QZmBK3Wp21t8m7_1egg2bIBrfjMclfwmIQJyX0evAt2DN9zFxm2Ymw5251dngEM7x0HfyAhliElGMqJtps_aoZTRnDzp', 'Javier Díez', 3, 0, 1, NULL, NULL, 'jdiezman33@gmail.com', NULL, '$2y$10$OpPtqsCYL6c1oQrVOcnYKOXX5POMAsubkoJRtjT.Bq7FqJJIwq4Ha', '43.4623158', '-3.9054073', 'CA-231, 24, 39110 Santa Cruz de Bezana, Cantabria, España', NULL, NULL, 0, NULL, NULL, '2020-09-16 12:02:18', '2020-09-21 13:43:44'),
(30, 'LBd50bR0AJa3R2RRW9lxL31Qyuh2', 'da6nmZB2Alk:APA91bFH5MIT8lWlzVpuCfNDvWx4lZjmth7potLinTxJEnkBHJGRcMihKcw847Rf3YnkKTQC6kBVCw2uLtjMzGSiupPPI-HUBZKmSx-CaAdso8UmardKVL5dY24aMo9twaV2hHrwf-j5', 'Heldeberta Putri', 3, 0, 1, NULL, NULL, 'heldeberta88@gmail.com', NULL, '$2y$10$OvRVZcD.F1WcWlCE0TPAXOsz4j0v3m.0DTL0s14efLqU53B7yORQe', '-7.8029861', '110.3708205', 'II Jl. Sayidan GM No.186, Prawirodirjan, Kec. Gondomanan, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55121, Indonesia', NULL, NULL, 0, NULL, NULL, '2020-09-17 20:39:06', '2020-09-17 20:39:07'),
(31, 'RaliXWSHGzbTKVWhZXjp7Zq9Us72', 'fm0Fc-HCHs4:APA91bHBlZV20OF3VQr2u7YIBH_bEi-cqmScfGb3eTsRAj7YCCQ1qff7TpVnefRHn-JsoXkDxYR2natD4vzPMx3IbxJG1mLPwgaSoHS0RE2cl2iPkA4UimQs0C9BbxW7aNBrPSX_7AXk', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$6ROcqdPTHQg2IWcQO99SoOrnB2yelI67P9vBMl69kAvKyN/X/PoiK', '31.5145303', '74.3447874', '65 Sir Syed Rd, Block D1 Block D 1 Gulberg III, Lahore, Punjab, Pakistan', NULL, '+923204840939', 0, NULL, NULL, '2020-09-26 14:19:32', '2020-09-26 17:50:11'),
(32, 'nXeDKxd7QJgwtSU6hilmEOj2wMv1', 'e9T1ymEp8Sc:APA91bFHlXlPZG-FjWdi6uKNLHn50LpBY2coqhkUCNcMN530Wl6s0c73mlT-VydDmoqk0IRfNSFNoxop4c6fOI5zj2JsKJPxTp7zf_AaZRqyOGC9O3PxZSVrtjJHu5gKJB2D4OLZSN68', 'Ifeanyi Ezeofor', 3, 0, 1, NULL, NULL, 'daspecialman@gmail.com', NULL, '$2y$10$2duLBFm8MQi8tQtvCZzLn.LQLfjFkWamAE4xGDT.vvIqEmoKHiZPS', '6.5960404', '3.3462906', 'oriyomi Kano, Opebi, Ikeja, Nigeria', NULL, NULL, 0, NULL, NULL, '2020-09-27 17:51:44', '2020-09-27 17:51:47'),
(33, 'YRVtEPkehlXRjb49VztaXU40pDr2', 'cjpN5VUkFtE:APA91bFlTqQHlfEHgmpKrqmficNtMoNV8ppjtn7okddnA7v-LIAyIpwDBRP8nEqlyufT33lC6pSNvTIYW0XSMXeuQSFwXeQlWbHz0KBX93t8plaZ6bjufkgPVQXKRAk2JAQYTjE8CYdD', 'yawar Arian', 3, 0, 1, NULL, NULL, 'saif1two3@gmail.com', NULL, '$2y$10$v5QdrODzDg3PHmE/XWQqoOxknftCcjW8sNCWW3wb6e7SD0Ql3WHlO', '33.591203', '73.0805557', 'JS HQ Road, Chaklala Cantt., Rawalpindi, Punjab 46000, Pakistan', NULL, '+923005509732', 0, NULL, NULL, '2020-10-03 09:36:40', '2020-10-03 09:36:41'),
(34, '086NqgeFjEXLFJNQUbcpC805zxZ2', 'dnYab_8Vkxs:APA91bEt6TQPJnugDuX7U7BaWRP46MZ_Hw-yphDH9Gi1C60LQnBM97kCwsaV_FGSEXLaKm8qk8fKmmLuxO0Iqo3fwL8E_U1ITekxtZBqSb62-d9CPp7Ax7dm_Z0VzludAJ_LxdWb3iCi', 'Ayda Yazmín Castillo', 3, 0, 1, NULL, NULL, 'yaz.casti@gmail.com', NULL, '$2y$10$ChwgFWZVwSZcpWjenzRyvuLF0wD48M.fIPA5S9BU5nu8LkFc9kaJ6', '42.0008915', '-5.6770783', 'Calle Sta. Catalina, 49, 49600 Benavente, Zamora, España', NULL, NULL, 0, NULL, NULL, '2020-10-09 15:59:15', '2020-10-09 15:59:17'),
(35, 'dmovAvpFeUcsPHWxcQ9AHJD1sT32', 'dlzgf7LYRfs:APA91bFEWXjqiD_TqcvrWS6kirgI5SPYEkLERfegoYwpPFxEQRKKh4auUrx2mNNVvOQHaMm2zTS-PY8UmCRQHqF-dTdI82bQmzBmE8JR5DWl8zxEo0CxDO9pAY74lcMX564Ev75Klbbi', 'Fernando Guedes', 3, 0, 1, NULL, NULL, 'fernandoguedes@student.ie.edu', NULL, '$2y$10$F4FSHe8d0eUoLbLlCVq8BO8iZu1qk8gG7E8dnjfpg8vxWqLXlVDfi', '40.4378043', '-3.6821936', 'Calle de María de Molina, 31, 28006 Madrid, España', NULL, NULL, 0, NULL, NULL, '2020-10-22 13:03:01', '2020-10-22 13:03:04'),
(36, 'IyJsKvfreIef55qovb1m4VxzZJv1', 'cZrC57pZi10:APA91bEyAcSPR37I90xiG2iJQvTb6zTm6lkO67pgAkhC5aHuhgk1l479HnFIx8VykBO89yRBwpQoyfHyxEcdA3AdScKqwXYKfAGjIG4fD7hBRar2TGXhBA1qDFWutrulGm8VJC7JoD5q', 'JACK TRADE', 3, 0, 1, NULL, NULL, 'alam24web@gmail.com', NULL, '$2y$10$Y46TViTFsAMkP4JfbNC7C.17fAnsWSSZsgXNGmSuNG/GaSZgHEFrC', '51.5398108', '0.0354179', '32 Shaftesbury Rd, Forest Gate, London E7 8PD, UK', NULL, NULL, 0, NULL, NULL, '2020-10-26 13:48:29', '2020-10-26 14:00:15'),
(37, 'rXJbb1ul1BQ7vu7y2JCxrC74KgY2', 'ftq95uRu7g8:APA91bFhILuTN_054ojQJiXZp1akH3jO9YERlDbk6SfVzldAQVef2KVFYOFxo7Cuf3kzLWs_sWwh8f_4NCMfhVZdhaeTSNEsu_WyMH1GvyIRJKvI0WmyXr-bbjGlTXp6EV2xI2Jg4kPE', 'Eko Yogi S', 3, 0, 1, NULL, NULL, 'yogie9782@gmail.com', NULL, '$2y$10$FPtu99QUf0oXlZzWfEyXOerMMgtPou8e0BJGeHUfAb9ouq2oH31Ny', '-7.7659863', '110.3859374', 'Jl. Anggur No.B09, Karang Gayam, Caturtunggal, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281, Indonesia', NULL, NULL, 0, NULL, NULL, '2020-11-01 14:53:59', '2020-11-01 14:54:02'),
(38, 'aCnydCgLNib3V9GyyecPkhrHtJj2', 'cWkSqtcsHj0:APA91bG5sd-MKFxvMahBDfyvUlJh--aPlWaQ-jDUQMOy2bkgVgm28RbOxGDRW0bFeAdnWX4hF9ysSFPuddAIc-pzEfHAcgzW-Kl4EH5JsktAGbrjosHBQvteqb16C0CEOhv2wHDZxrjm', 'lithin tt', 3, 0, 1, NULL, NULL, 'lithin4rnr@gmail.com', NULL, '$2y$10$ZTl4wcEpu1HfjX/GZ71dKuOa/mgNl6yIBSiInM8IVEwAMdeWj14da', '10.5146633', '76.2055664', '70d, P&T Quarters Rd, Poothole, Thrissur, Kerala 680004, India', NULL, '+929496346654', 0, NULL, NULL, '2020-11-07 11:03:59', '2020-12-24 06:50:08'),
(39, 'WsGxlLcNmNaBMj3DmHUeAAtQLN72', 'f-1DRh1ZhJc:APA91bEXeynEAyqUA_Io_wx1d5MBoEBZNrjmjvHb9JwBMMbtPxuidfTt4ahI5QvenbDX0-_hjIEErZX6-jDv2oBnqAirSuPsEmDEfLtsiS-a-E-8WA5akVPRXoHKP2GF165EdwjawIyF', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$w.mQ4BVwOqLI.v3egc3Y9e1a0ccLXm.f88Fn48moThti.SEXfF3P.', '40.2566041', '-76.9189152', '20 House Ave, Camp Hill, PA 17011, USA', NULL, '+923315252948', 0, NULL, NULL, '2020-11-12 23:08:56', '2020-11-15 00:04:15'),
(40, 'ovQ0zDccM3h5mOsMoX9yWOu6Fas2', 'dxf7Nh3BSqo:APA91bHoZKYcciGBa-_ExTlW-_DebqGD6-GHjn3mQVranwInnsQGC513Y343YZf5Roa_ZriX2wqmdeyS5tPPBteDkTCBdKMB5X6QQ7Tc_sVA3ITGsgrc4sBej-hv8_sLEXwNbApyRRdf', 'amaury EHRHARDT', 3, 0, 1, NULL, NULL, 'ehrhardt.amaury@gmail.com', NULL, '$2y$10$ynmY.v2zE6Lqb3kIWHIr6eAvVAyy6YG39a4D1sFMxjRpT9qaAayDi', '50.8103373', '4.4272668', 'Boulevard du Souverain 144, 1160 Auderghem, Belgique', NULL, NULL, 0, NULL, NULL, '2020-12-16 09:05:07', '2020-12-16 09:40:08'),
(41, 'SlNcIlgsijUuMjClOFTwfGRu6bH2', 'forjI0JiU-E:APA91bEBQOY4I0_xAy1wLOAEqvi4kHcOagurClTmKEwM7JvHGgHgkEncLk5gKQqm60alx4cJJ20mRQT2pLU3pTI6W8yEXMhn2_yGgQhk4xxWzjRLIM9dvmNVw3dP4WxEpymhdIsPYf2Z', 'Ali. Ali', 3, 0, 1, NULL, NULL, 'tysonaly8@gmail.com', NULL, '$2y$10$1p9XCnbP6uBPJuld1O6XgOTER2oqBklhNecD183zej48RZn2sX7BG', '51.6518071', '-0.4237041', 'Verdana Court, 534-536 Whippendell Rd, Watford WD18 7QQ, UK', NULL, NULL, 0, NULL, NULL, '2021-01-04 09:42:16', '2021-01-04 10:03:20'),
(42, 'P81IlVpiawS2zAqIu1k9uc3gl753', 'eg6tuAnCxCw:APA91bGXMWJRhQ8zkq5jukOeFLDmBKEdNRJp8N9OuIiN8nZsYua98i4TxLixTOp9Zkc7SAdsgQY9zL75LNYvP_I6fWWgfMvheLhg6pN4Vaahh3wKCwAH4RUPkwr4o79obKXHZLJCSgM5', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$N9vM4Wu4yDoodeO/F1mYXe6T6jgpTKzIoOKwWm20SHaO4jx3f/gNu', '31.7051944', '73.9974285', 'Unnamed Road, Mohalla Ali Park, Sheikhupura, Punjab, Pakistan', NULL, '+923353141511', 0, NULL, NULL, '2021-01-04 17:53:42', '2021-01-04 19:12:26'),
(43, 'rQWuGMk5qpP3YfvQ8CptfdOwDUe2', 'cIaaKJAJfYI:APA91bGAb_FBW-5NFa760vvjVDC3p2stfbxL5B7o8t2ZOferJkYh3Am_Aih0owNzhjzM92niMDlBvNbsX3Dg9YO5njXnqS78ibygGNBpb92Rfzmp_Y19p50yDZEyQfGBYtOncXLHnW2a', 'Deepti Mishra', 3, 0, 1, NULL, NULL, 'mishradeepti371@gmail.com', NULL, '$2y$10$EqpF33MABS2YcxDDfgItHuP3eN7yxHmHsfNjRZEwrzzxmbjr9vaJa', '26.4638617', '80.2943776', '121/565, Industrial Estate, Vijay Nagar, Shastri Nagar, Kanpur, Uttar Pradesh 208005, India', NULL, '+929503284787', 0, NULL, NULL, '2021-01-13 06:12:27', '2021-01-13 06:12:57'),
(44, '0OLWB1KsL8S8RBusibLG0aUzoiz1', 'f5TXZSsFxeg:APA91bG0Itiwp41-B0odKuRNGCXhoNM3KU-eOon14kaopYoUfCjpReCbdxsPcgX3ceaWdsN-HSuw7BDG0pLkKZzC4vZq1VQdZ-b7uvV2ipKs2LRI4VZtflqO8sUtVtHNrN7-aYUpYZBi', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$lwQQEzUQiOROU9JiT66E4.e7/A1Gzv8y0YP1RHdBKktS/p21GSsb2', '31.5084569', '74.3225581', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, '+923224764008', 0, NULL, NULL, '2022-01-10 19:25:04', '2022-01-11 21:50:23'),
(45, 'CyWrZNh0zcggAAaTP61ajBntUzT2', 'f5TXZSsFxeg:APA91bG0Itiwp41-B0odKuRNGCXhoNM3KU-eOon14kaopYoUfCjpReCbdxsPcgX3ceaWdsN-HSuw7BDG0pLkKZzC4vZq1VQdZ-b7uvV2ipKs2LRI4VZtflqO8sUtVtHNrN7-aYUpYZBi', 'Mohsin Tariq', 3, 0, 1, NULL, NULL, 'mohsintariq98@gmail.com', NULL, '$2y$10$G6kkh.O/yZuq.OBtwVQTWOWO/fA2HwEPoR0AaE6MUQCLkwGT/z16q', '31.5084709', '74.3225395', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, NULL, 0, NULL, NULL, '2022-01-10 19:25:51', '2022-01-10 19:27:04'),
(46, 'Pq0BJi2bFNP4i5MI86LKY08tGNz2', 'f5TXZSsFxeg:APA91bG0Itiwp41-B0odKuRNGCXhoNM3KU-eOon14kaopYoUfCjpReCbdxsPcgX3ceaWdsN-HSuw7BDG0pLkKZzC4vZq1VQdZ-b7uvV2ipKs2LRI4VZtflqO8sUtVtHNrN7-aYUpYZBi', NULL, 3, 0, 0, NULL, NULL, NULL, NULL, '$2y$10$Sar1x6KNYotHrSY0JMY2w.ZBCPg8DWCJGkeTr5n6jqgt4tRgpwR9u', '31.5084535', '74.3225491', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', NULL, '+923337394353', 0, NULL, NULL, '2022-01-10 22:59:19', '2022-01-11 22:02:08');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `customer_id`, `phone_number`) VALUES
(1, 1, '+923114538678'),
(2, 2, NULL),
(3, 3, NULL),
(4, 4, '+923219467019'),
(5, 5, '+923330276843'),
(6, 6, NULL),
(7, 7, NULL),
(8, 8, NULL),
(9, 9, NULL),
(10, 10, NULL),
(11, 11, NULL),
(12, 12, NULL),
(13, 13, '+923244999080'),
(14, 14, '+923334950504'),
(15, 15, '+923009446904'),
(16, 16, '+923214715677'),
(17, 17, NULL),
(18, 18, '+923424150906'),
(19, 19, NULL),
(20, 20, '+923013310571'),
(21, 21, '+923214921572'),
(22, 22, '+923208687003'),
(23, 23, '+923014842619'),
(24, 24, NULL),
(25, 25, NULL),
(26, 26, '+923326201896'),
(27, 27, '+923035648264'),
(28, 28, NULL),
(29, 29, NULL),
(30, 30, NULL),
(31, 31, '+923204840939'),
(32, 32, NULL),
(33, 33, '+923005509732'),
(34, 34, NULL),
(35, 35, NULL),
(36, 36, NULL),
(37, 37, NULL),
(38, 38, '+929496346654'),
(39, 39, '+923315252948'),
(40, 40, NULL),
(41, 41, NULL),
(42, 42, '+923353141511'),
(43, 43, '+929503284787'),
(44, 44, '+923224764008'),
(45, 45, NULL),
(46, 46, '+923337394353');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_status_list`
--

CREATE TABLE `delivery_status_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_status_list`
--

INSERT INTO `delivery_status_list` (`id`, `name`) VALUES
(1, 'Accepted'),
(2, 'Preparing'),
(3, 'Ready To Deliver'),
(4, 'Out For Delivery'),
(5, 'Delivered'),
(6, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(10) UNSIGNED NOT NULL,
  `designation_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `designation_name`, `created_by`) VALUES
(1, 'Supervisor', 1),
(2, 'Manager', 1),
(3, 'Chef', 1),
(4, 'Cashier', 1),
(5, 'Delivery Boy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_13_043904_create_table_store_and_categories', 1),
(4, '2019_12_13_044014_create_table_product_categories', 1),
(5, '2019_12_13_044052_create_table_products', 1),
(6, '2019_12_13_044130_create_table_employees', 1),
(7, '2019_12_13_044539_create_table_product_attributes', 1),
(8, '2019_12_14_095037_create_order_status_list', 1),
(9, '2019_12_16_111523_creat_table_oreders_and_order_products', 1),
(10, '2019_12_19_091620_create_table_customers', 1),
(11, '2020_01_07_141840_create_permission_tables', 1),
(12, '2020_01_20_165245_create_notifications_table', 1),
(13, '2020_01_21_103456_create_riders_table', 1),
(14, '2020_01_23_163810_update_store_table', 1),
(15, '2020_01_27_095640_create_auth_table', 1),
(16, '2020_01_29_154419_create_table__orders_assigned', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(6, 'App\\User', 3),
(6, 'App\\User', 4),
(6, 'App\\User', 5),
(6, 'App\\User', 6),
(6, 'App\\User', 7),
(6, 'App\\User', 8),
(7, 'App\\User', 3),
(7, 'App\\User', 4),
(8, 'App\\User', 3),
(8, 'App\\User', 4),
(8, 'App\\User', 5),
(8, 'App\\User', 6),
(8, 'App\\User', 7),
(8, 'App\\User', 8),
(9, 'App\\User', 3),
(9, 'App\\User', 4),
(10, 'App\\User', 3),
(10, 'App\\User', 4),
(10, 'App\\User', 5),
(10, 'App\\User', 6),
(10, 'App\\User', 7),
(10, 'App\\User', 8),
(11, 'App\\User', 3),
(11, 'App\\User', 4),
(11, 'App\\User', 5),
(11, 'App\\User', 6),
(11, 'App\\User', 7),
(11, 'App\\User', 8),
(16, 'App\\User', 3),
(16, 'App\\User', 4),
(16, 'App\\User', 5),
(16, 'App\\User', 6),
(16, 'App\\User', 7),
(16, 'App\\User', 8),
(16, 'App\\User', 9),
(17, 'App\\User', 3),
(17, 'App\\User', 4),
(17, 'App\\User', 5),
(17, 'App\\User', 6),
(17, 'App\\User', 7),
(17, 'App\\User', 8),
(18, 'App\\User', 3),
(18, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 2),
(3, 'App\\User', 3),
(3, 'App\\User', 4),
(3, 'App\\User', 5),
(3, 'App\\User', 6),
(3, 'App\\User', 7),
(3, 'App\\User', 8),
(3, 'App\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pickup` tinyint(4) NOT NULL DEFAULT 0,
  `home_delivery` tinyint(4) NOT NULL DEFAULT 0,
  `cash_on_delivery` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_charges` double(8,2) NOT NULL DEFAULT 0.00,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `tax` double(8,2) NOT NULL DEFAULT 0.00,
  `sub_total` double(8,2) NOT NULL DEFAULT 0.00,
  `grand_total` double(8,2) NOT NULL DEFAULT 0.00,
  `payment_method` tinyint(4) DEFAULT NULL,
  `payment_method_id` tinyint(4) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `store_id`, `customer_id`, `pickup`, `home_delivery`, `cash_on_delivery`, `delivery_charges`, `discount`, `tax`, `sub_total`, `grand_total`, `payment_method`, `payment_method_id`, `status`, `latitude`, `longitude`, `customer_address`, `created_at`, `updated_at`) VALUES
(1, 1, 'UXluxzoa8pX7VIvckpkPJqhy2AB2', 1, 0, 1, 100.00, 0.00, 0.00, 1000.00, 1100.00, 0, 0, 0, '31.5084169', '74.3225897', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', '2020-03-03 05:35:25', '2020-03-03 05:35:25'),
(2, 1, 's0fSxbKo6pb9h8IaEChYAeF3JLM2', 1, 0, 1, 100.00, 0.00, 0.00, 400.00, 500.00, 0, 0, 0, '31.508406', '74.3225887', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', '2020-03-03 05:36:11', '2020-03-03 05:36:11'),
(3, 1, 's0fSxbKo6pb9h8IaEChYAeF3JLM2', 0, 1, 1, 100.00, 0.00, 0.00, 1000.00, 1100.00, 0, 0, 3, '31.508406', '74.3225887', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', '2020-03-03 05:53:55', '2020-09-28 12:21:30'),
(4, 1, 'XyPE2ECQBdhqJrbx4ixNnNunZKG3', 0, 1, 1, 100.00, 0.00, 0.00, 1000.00, 1100.00, 0, 0, 0, '31.5083889', '74.3226487', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', '2020-07-01 07:21:12', '2020-07-01 07:21:12'),
(5, 1, 'UXluxzoa8pX7VIvckpkPJqhy2AB2', 0, 1, 1, 100.00, 0.00, 0.00, 400.00, 500.00, 0, 0, 0, '31.5084169', '74.3225897', 'Plot 93, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', '2020-07-08 15:49:49', '2020-07-08 15:49:49'),
(6, 1, 'qW1nIolpq9Runs1l8TfcwH5o6kK2', 0, 1, 1, 100.00, 0.00, 0.00, 600.00, 700.00, 0, 0, 0, '31.5083811', '74.3226276', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2020-07-10 05:33:31', '2020-07-10 05:33:31'),
(7, 1, 'qW1nIolpq9Runs1l8TfcwH5o6kK2', 0, 1, 1, 100.00, 0.00, 0.00, 1000.00, 1100.00, 0, 1, 3, '31.5083811', '74.3226276', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2020-07-10 06:36:48', '2020-07-10 12:02:00'),
(8, 2, 'jiiYAm1Bp8RTjIcjOYD466fpf9w2', 0, 1, 1, 100.00, 0.00, 0.00, 1300.00, 1400.00, 0, 0, 0, '43.1277213', '-88.0344419', '6031 N 98th Ct, Milwaukee, WI 53225, USA', '2020-07-10 13:02:35', '2020-07-10 13:02:35'),
(9, 1, 'qW1nIolpq9Runs1l8TfcwH5o6kK2', 0, 1, 0, 100.00, 0.00, 0.00, 600.00, 700.00, 1, 1, 0, '31.5083811', '74.3226276', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2020-07-10 19:04:12', '2020-07-10 19:04:12'),
(10, 1, '9AP9umxLOdOnKZwZ51hZjdyFAps1', 0, 1, 1, 100.00, 0.00, 0.00, 700.00, 800.00, 0, 0, 0, '31.5303948', '74.3177652', '7 Zaildar Road, Ichhra Shah Din Scheme Lahore, Punjab 54000, Pakistan', '2020-07-11 17:52:26', '2020-07-11 17:52:26'),
(11, 1, 'vGrdgpV1XgecirpZKriVEvaEXRJ3', 0, 1, 1, 100.00, 0.00, 0.00, 400.00, 500.00, 0, 0, 0, '31.5084785', '74.3224655', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2020-08-22 20:47:42', '2020-08-22 20:47:42'),
(12, 1, 'jdq9AqjVOuUCxkNacetyuiJWWZ33', 0, 1, 1, 100.00, 0.00, 0.00, 100.00, 200.00, 0, 0, 0, '31.8366601', '70.9036848', 'North Circular Road, Dera Ismail Khan, Khyber Pakhtunkhwa, Pakistan', '2020-08-27 12:03:18', '2020-08-27 12:03:18'),
(13, 1, '6XR4KzcGLehSIlsFE7M4ToLVEiF3', 0, 1, 1, 100.00, 0.00, 0.00, 200.00, 300.00, 0, 0, 0, '31.5084453', '74.3225544', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2020-08-27 14:25:00', '2020-08-27 14:25:00'),
(14, 1, '6XR4KzcGLehSIlsFE7M4ToLVEiF3', 0, 1, 1, 100.00, 0.00, 0.00, 200.00, 300.00, 0, 0, 0, '31.5084453', '74.3225544', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2020-08-27 14:26:01', '2020-08-27 14:26:01'),
(15, 1, 'jdq9AqjVOuUCxkNacetyuiJWWZ33', 1, 0, 1, 0.00, 0.00, 0.00, 950.00, 950.00, 0, 0, 0, '31.8366601', '70.9036848', 'North Circular Road, Dera Ismail Khan, Khyber Pakhtunkhwa, Pakistan', '2020-09-09 12:39:23', '2020-09-09 12:39:23'),
(16, 1, 'T3UROzdXv0XDXl8CQJ2PYQLLqK73', 1, 0, 0, 0.00, 0.00, 0.00, 1450.00, 1450.00, 1, 1, 0, '52.0361093', '4.2929268', 'g 9 3 islamabad', '2020-09-09 20:15:59', '2020-09-09 20:15:59'),
(17, 2, 'RaliXWSHGzbTKVWhZXjp7Zq9Us72', 0, 1, 1, 100.00, 0.00, 0.00, 600.00, 700.00, 0, 0, 3, '31.5145303', '74.3447874', '65 Sir Syed Rd, Block D1 Block D 1 Gulberg III, Lahore, Punjab, Pakistan', '2020-09-26 14:20:03', '2022-01-11 22:09:27'),
(18, 1, '1h07Ilg0KZSguZeLfjLkgyMGkn53', 0, 1, 1, 100.00, 0.00, 0.00, 10000.00, 10100.00, 0, 0, 10, '31.509908', '74.3237372', '77 Masood Farooqi Rd, Ahmed Block Garden Town, Lahore, Punjab, Pakistan', '2020-10-05 12:35:34', '2020-11-12 23:05:10'),
(19, 2, 'WsGxlLcNmNaBMj3DmHUeAAtQLN72', 0, 1, 1, 100.00, 0.00, 0.00, 400.00, 500.00, 0, 1, 10, '40.2566041', '-76.9189152', '20 House Ave, Camp Hill, PA 17011, USA', '2020-11-12 23:09:57', '2022-01-11 22:03:47'),
(20, 1, 'P81IlVpiawS2zAqIu1k9uc3gl753', 0, 1, 1, 100.00, 0.00, 0.00, 300.00, 400.00, 0, 0, 3, '31.7051944', '73.9974285', 'Unnamed Road, Mohalla Ali Park, Sheikhupura, Punjab, Pakistan', '2021-01-04 17:57:12', '2022-01-10 23:02:54'),
(21, 1, 'Pq0BJi2bFNP4i5MI86LKY08tGNz2', 0, 1, 1, 100.00, 0.00, 0.00, 1300.00, 1400.00, 0, 0, 6, '31.5084535', '74.3225491', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2022-01-10 23:01:46', '2022-01-11 22:00:41'),
(22, 1, 'Pq0BJi2bFNP4i5MI86LKY08tGNz2', 0, 1, 1, 100.00, 0.00, 0.00, 1450.00, 1550.00, 0, 1, 10, '31.5084535', '74.3225491', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2022-01-10 23:03:56', '2022-01-11 22:03:49'),
(23, 1, 'Pq0BJi2bFNP4i5MI86LKY08tGNz2', 0, 1, 1, 100.00, 0.00, 0.00, 1200.00, 1300.00, 0, 1, 3, '31.5084535', '74.3225491', '160, Ahmed Block Garden Town, Lahore, Punjab 54000, Pakistan', '2022-01-11 22:02:04', '2022-01-11 22:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `order_assigned`
--

CREATE TABLE `order_assigned` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rider_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_assigned`
--

INSERT INTO `order_assigned` (`id`, `rider_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2020-03-03 05:59:27', '2020-03-03 05:59:27'),
(2, 2, 7, '2020-09-28 12:22:08', '2020-09-28 12:22:08'),
(3, 7, 21, '2022-01-10 23:04:32', '2022-01-10 23:04:32'),
(4, 7, 23, '2022-01-11 22:05:36', '2022-01-11 22:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_price` double(8,2) NOT NULL DEFAULT 0.00,
  `product_quantity` bigint(20) UNSIGNED DEFAULT NULL,
  `product_total_price` double(8,2) NOT NULL DEFAULT 0.00,
  `product_attributes` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `product_price`, `product_quantity`, `product_total_price`, `product_attributes`) VALUES
(1, 1, 2, 300.00, 1, 1000.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(2, 2, 1, 250.00, 1, 400.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(3, 3, 2, 300.00, 1, 1000.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(4, 4, 2, 300.00, 1, 1000.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(5, 5, 1, 250.00, 1, 400.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(6, 6, 3, 250.00, 1, 600.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:5;s:10:\"product_id\";i:3;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";d:600;}}}}'),
(7, 7, 2, 300.00, 1, 1000.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(8, 8, 10, 400.00, 1, 1000.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:13;s:10:\"product_id\";i:10;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:700;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}}'),
(9, 8, 10, 400.00, 1, 300.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:13;s:10:\"product_id\";i:10;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:700;}i:2;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}}'),
(10, 9, 3, 250.00, 1, 600.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:5;s:10:\"product_id\";i:3;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";d:600;}}}}'),
(11, 10, 5, 300.00, 1, 400.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:7;s:10:\"product_id\";i:5;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:300;}}}}'),
(12, 10, 5, 300.00, 1, 300.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:7;s:10:\"product_id\";i:5;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:300;}}}}'),
(13, 11, 1, 250.00, 1, 400.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(14, 12, 4, 100.00, 1, 100.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:6;s:10:\"product_id\";i:4;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";d:100;}}}}'),
(15, 13, 16, 200.00, 1, 200.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:20;s:10:\"product_id\";i:16;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:2:\"XL\";s:5:\"value\";d:200;}}}i:1;a:4:{s:14:\"attribute_name\";s:5:\"Color\";s:2:\"id\";i:21;s:10:\"product_id\";i:16;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:3:\"Red\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:4:\"Blue\";s:5:\"value\";d:0;}}}}'),
(16, 14, 16, 200.00, 1, 200.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:20;s:10:\"product_id\";i:16;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:2:\"XL\";s:5:\"value\";d:200;}}}i:1;a:4:{s:14:\"attribute_name\";s:5:\"Color\";s:2:\"id\";i:21;s:10:\"product_id\";i:16;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:3:\"Red\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:4:\"Blue\";s:5:\"value\";d:0;}}}}'),
(17, 15, 2, 300.00, 1, 300.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(18, 15, 1, 250.00, 1, 250.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(19, 15, 4, 100.00, 1, 100.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:6;s:10:\"product_id\";i:4;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";d:100;}}}}'),
(20, 15, 5, 300.00, 1, 300.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:7;s:10:\"product_id\";i:5;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:300;}}}}'),
(21, 16, 1, 250.00, 1, 250.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(22, 16, 3, 250.00, 2, 1200.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:5;s:10:\"product_id\";i:3;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";d:600;}}}}'),
(23, 17, 9, 200.00, 1, 200.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:12;s:10:\"product_id\";i:9;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";d:100;}}}}'),
(24, 17, 8, 300.00, 1, 400.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:11;s:10:\"product_id\";i:8;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:1:\"N\";s:5:\"value\";d:300;}}}}'),
(25, 18, 1, 250.00, 25, 10000.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(26, 19, 6, 250.00, 1, 400.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:8;s:10:\"product_id\";i:6;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:9;s:10:\"product_id\";i:6;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(27, 20, 2, 300.00, 1, 300.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(28, 21, 3, 250.00, 1, 1000.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:5;s:10:\"product_id\";i:3;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";d:600;}}}}'),
(29, 21, 4, 100.00, 1, 100.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:6;s:10:\"product_id\";i:4;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";d:100;}}}}'),
(30, 21, 17, 200.00, 1, 200.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:5:\"Color\";s:2:\"id\";i:22;s:10:\"product_id\";i:17;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:3:\"Red\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Green\";s:5:\"value\";d:200;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Black\";s:5:\"value\";d:100;}}}i:1;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:23;s:10:\"product_id\";i:17;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:200;}}}}'),
(31, 22, 1, 250.00, 1, 250.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(32, 22, 2, 300.00, 2, 600.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(33, 23, 1, 250.00, 1, 400.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:400;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Normal\";s:5:\"value\";d:250;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:2;s:10:\"product_id\";i:1;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";d:0;}}}}'),
(34, 23, 2, 300.00, 1, 600.00, 'a:2:{i:0;a:4:{s:14:\"attribute_name\";s:4:\"Size\";s:2:\"id\";i:3;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Large\";s:5:\"value\";d:1000;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:6:\"Medium\";s:5:\"value\";d:600;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:5:\"Small\";s:5:\"value\";d:300;}}}i:1;a:4:{s:14:\"attribute_name\";s:7:\"Flavour\";s:2:\"id\";i:4;s:10:\"product_id\";i:2;s:7:\"options\";a:3:{i:0;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";d:0;}i:1;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";d:0;}i:2;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";d:0;}}}}'),
(35, 23, 4, 100.00, 1, 200.00, 'a:1:{i:0;a:4:{s:14:\"attribute_name\";s:8:\"Qunatity\";s:2:\"id\";i:6;s:10:\"product_id\";i:4;s:7:\"options\";a:2:{i:0;a:3:{s:9:\"IsChecked\";b:1;s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";d:200;}i:1;a:3:{s:9:\"IsChecked\";b:0;s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";d:100;}}}}');

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `type`, `status`) VALUES
(1, 'Home Delivery', 1),
(2, 'Pickup', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard', 'web', '2020-01-30 05:42:00', '2020-01-30 05:42:00'),
(2, 'users', 'web', '2020-01-30 05:42:00', '2020-01-30 05:42:00'),
(3, 'new-user', 'web', '2020-01-30 05:42:00', '2020-01-30 05:42:00'),
(4, 'stores', 'web', '2020-01-30 05:42:00', '2020-01-30 05:42:00'),
(5, 'create-store', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(6, 'categories', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(7, 'create-category', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(8, 'products', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(9, 'create-product', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(10, 'recieve-orders', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(11, 'manage-orders', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(12, 'employees', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(13, 'new-employee', 'web', '2020-01-30 05:42:01', '2020-01-30 05:42:01'),
(14, 'riders', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02'),
(15, 'new-rider', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02'),
(16, 'home-delivery', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02'),
(17, 'pickup', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02'),
(18, 'staff-dashboard', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_status_list`
--

CREATE TABLE `pickup_status_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pickup_status_list`
--

INSERT INTO `pickup_status_list` (`id`, `name`) VALUES
(1, 'Accepted'),
(2, 'Preparing'),
(3, 'Ready To Pickup'),
(4, 'Collected'),
(5, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL DEFAULT 0.00,
  `status` tinyint(4) DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `product_category_id`, `created_by`, `product_name`, `product_price`, `status`, `short_description`, `long_description`, `product_thumbnail`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 'Special Burger', 250.00, NULL, 'Short description about special burger.', 'The KFC Fillet Burger is a sexy beast. We love that the bread instead of being a regular boring bap is a busty bloomerette with two bendiets cutting across an ochre field, studded with sesame seeds.', 'uploads/product_thumbnails/PqKdUSJR6a.jpg', NULL, '2020-02-15 08:09:54', '2020-02-15 08:09:54'),
(2, 1, 2, 2, 'Special Pizza', 300.00, NULL, 'Short description about special pizza.', 'Long description about special pizza.', 'uploads/product_thumbnails/CB2Xs0pqWv.jpg', NULL, '2020-02-15 08:13:33', '2020-02-15 08:13:33'),
(3, 1, 3, 2, 'Special Chicken', 250.00, NULL, 'Short description about Special Chicken.', 'Long description about Special Chicken.', 'uploads/product_thumbnails/as87ziynCe.jpg', NULL, '2020-02-15 08:17:24', '2020-02-15 08:17:24'),
(4, 1, 13, 2, 'Special Fries', 100.00, NULL, 'Short description about special fries.', 'Long description about special fries.', 'uploads/product_thumbnails/OZwjUh75xg.jpg', NULL, '2020-02-15 08:19:08', '2020-02-15 08:19:08'),
(5, 1, 15, 2, 'Special Rice', 300.00, NULL, 'Short description about special rice.', 'Long description about special rice.', 'uploads/product_thumbnails/3l7HTGNiWQ.jpg', NULL, '2020-02-15 08:22:11', '2020-02-15 08:22:11'),
(6, 2, 4, 2, 'Burgers', 250.00, NULL, 'Short description about burgers.', 'Long description about burgers.', 'uploads/product_thumbnails/6f2loDEnsr.jpeg', NULL, '2020-02-15 08:26:53', '2020-02-15 08:26:53'),
(7, 2, 5, 2, 'Chicken', 300.00, NULL, 'Short description about Chicken.', 'Long description about Chicken.', 'uploads/product_thumbnails/lhUw1pHK0o.jpg', NULL, '2020-02-15 09:48:32', '2020-02-15 09:48:32'),
(8, 2, 7, 2, 'Rice', 300.00, NULL, 'Short description about rice.', 'Long description about rice.', 'uploads/product_thumbnails/Je7CwHNXr4.jpg', NULL, '2020-02-15 09:50:12', '2020-02-15 09:50:12'),
(9, 2, 14, 2, 'Fries', 200.00, NULL, 'Short description about fries.', 'Long description about fries.', 'uploads/product_thumbnails/qlceCiuHj8.jpg', NULL, '2020-02-15 09:52:08', '2020-02-15 09:52:08'),
(10, 2, 6, 2, 'Pizza', 400.00, NULL, 'Short description about pizza.', 'Long description about pizza.', 'uploads/product_thumbnails/hD0tOoqwRs.jpg', NULL, '2020-02-15 09:53:57', '2020-02-15 09:53:57'),
(11, 3, 8, 2, 'Special Burger', 250.00, NULL, 'Short description about special burger.', 'Long description about special Burger.', 'uploads/product_thumbnails/VSpnMdbKEg.jpg', NULL, '2020-02-15 09:56:26', '2020-02-15 09:56:26'),
(12, 3, 9, 2, 'Special Pizza', 300.00, NULL, 'Short description about special pizza.', 'Long description about special pizza.', 'uploads/product_thumbnails/5lDyGc4AST.jpg', NULL, '2020-02-15 09:59:10', '2020-02-15 09:59:10'),
(13, 3, 10, 2, 'Special Chicken', 600.00, NULL, 'Short description about Chicken.', 'Long description about Chicken.', 'uploads/product_thumbnails/AjSpmuG5Vy.jpg', NULL, '2020-02-15 10:01:27', '2020-02-15 10:01:27'),
(14, 3, 11, 2, 'Special Fries', 200.00, NULL, 'Short Description about fries.', 'Long Description about fries.', 'uploads/product_thumbnails/lyFCYA4KRV.jpg', NULL, '2020-02-15 10:03:01', '2020-02-15 10:03:01'),
(15, 3, 12, 2, 'Special Rice', 300.00, NULL, 'Short description about special rice.', 'Lon description about special rice.', 'uploads/product_thumbnails/jmP9Hx3e16.jpg', NULL, '2020-02-15 10:05:16', '2020-02-15 10:05:16'),
(16, 1, 3, 2, 'Pizza', 200.00, NULL, 'Short Description', 'Long Description', 'uploads/product_thumbnails/AbGSuZUT3q.png', NULL, '2020-08-27 14:22:19', '2020-08-27 14:22:19'),
(17, 1, 3, 2, 'Shirt', 200.00, NULL, 'Short Description', 'Short Description', 'uploads/product_thumbnails/WCPh3VOKZw.png', NULL, '2020-09-04 11:46:54', '2020-09-04 11:46:54');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attribute_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `attribute_name`, `options`) VALUES
(1, 1, 'Size', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:6:\"Normal\";s:5:\"value\";s:3:\"250\";}}'),
(2, 1, 'Flavour', 'a:3:{i:0;a:2:{s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";s:1:\"0\";}i:1;a:2:{s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";s:1:\"0\";}i:2;a:2:{s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";s:1:\"0\";}}'),
(3, 2, 'Size', 'a:3:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:4:\"1000\";}i:1;a:2:{s:6:\"option\";s:6:\"Medium\";s:5:\"value\";s:3:\"600\";}i:2;a:2:{s:6:\"option\";s:5:\"Small\";s:5:\"value\";s:3:\"300\";}}'),
(4, 2, 'Flavour', 'a:3:{i:0;a:2:{s:6:\"option\";s:6:\"Fajita\";s:5:\"value\";s:1:\"0\";}i:1;a:2:{s:6:\"option\";s:13:\"Chicken Tikka\";s:5:\"value\";s:1:\"0\";}i:2;a:2:{s:6:\"option\";s:19:\"Olive Pizza Kitchen\";s:5:\"value\";s:1:\"0\";}}'),
(5, 3, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";s:4:\"1000\";}i:1;a:2:{s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";s:3:\"600\";}}'),
(6, 4, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";s:3:\"200\";}i:1;a:2:{s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";s:3:\"100\";}}'),
(7, 5, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:6:\"Normal\";s:5:\"value\";s:3:\"300\";}}'),
(8, 6, 'Size', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:6:\"Normal\";s:5:\"value\";s:3:\"250\";}}'),
(9, 6, 'Flavour', 'a:3:{i:0;a:2:{s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";s:1:\"0\";}i:1;a:2:{s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";s:1:\"0\";}i:2;a:2:{s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";s:1:\"0\";}}'),
(10, 7, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";s:3:\"300\";}}'),
(11, 8, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:1:\"N\";s:5:\"value\";s:3:\"300\";}}'),
(12, 9, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";s:3:\"200\";}i:1;a:2:{s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";s:3:\"100\";}}'),
(13, 10, 'Size', 'a:3:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:4:\"1000\";}i:1;a:2:{s:6:\"option\";s:6:\"Medium\";s:5:\"value\";s:3:\"700\";}i:2;a:2:{s:6:\"option\";s:5:\"Small\";s:5:\"value\";s:3:\"300\";}}'),
(14, 11, 'Size', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:6:\"Normal\";s:5:\"value\";s:3:\"250\";}}'),
(15, 11, 'Flavour', 'a:3:{i:0;a:2:{s:6:\"option\";s:13:\"Zinger Burger\";s:5:\"value\";s:1:\"0\";}i:1;a:2:{s:6:\"option\";s:14:\"Chicken Cheese\";s:5:\"value\";s:1:\"0\";}i:2;a:2:{s:6:\"option\";s:12:\"Patty Burger\";s:5:\"value\";s:1:\"0\";}}'),
(16, 12, 'Size', 'a:3:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:4:\"1000\";}i:1;a:2:{s:6:\"option\";s:6:\"Medium\";s:5:\"value\";s:3:\"700\";}i:2;a:2:{s:6:\"option\";s:5:\"Small\";s:5:\"value\";s:3:\"300\";}}'),
(17, 13, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:9:\"10 Pieces\";s:5:\"value\";s:4:\"1000\";}i:1;a:2:{s:6:\"option\";s:8:\"6 Pieces\";s:5:\"value\";s:3:\"600\";}}'),
(18, 14, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:10:\"Large Pack\";s:5:\"value\";s:3:\"200\";}i:1;a:2:{s:6:\"option\";s:11:\"Normal Pack\";s:5:\"value\";s:3:\"100\";}}'),
(19, 15, 'Qunatity', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Large\";s:5:\"value\";s:3:\"400\";}i:1;a:2:{s:6:\"option\";s:6:\"Normal\";s:5:\"value\";s:3:\"300\";}}'),
(20, 16, 'Size', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Small\";s:5:\"value\";s:3:\"200\";}i:1;a:2:{s:6:\"option\";s:2:\"XL\";s:5:\"value\";s:3:\"200\";}}'),
(21, 16, 'Color', 'a:2:{i:0;a:2:{s:6:\"option\";s:3:\"Red\";s:5:\"value\";s:1:\"0\";}i:1;a:2:{s:6:\"option\";s:4:\"Blue\";s:5:\"value\";N;}}'),
(22, 17, 'Color', 'a:3:{i:0;a:2:{s:6:\"option\";s:3:\"Red\";s:5:\"value\";s:3:\"200\";}i:1;a:2:{s:6:\"option\";s:5:\"Green\";s:5:\"value\";s:3:\"200\";}i:2;a:2:{s:6:\"option\";s:5:\"Black\";s:5:\"value\";s:3:\"100\";}}'),
(23, 17, 'Size', 'a:2:{i:0;a:2:{s:6:\"option\";s:5:\"Small\";s:5:\"value\";s:3:\"200\";}i:1;a:2:{s:6:\"option\";s:6:\"Medium\";s:5:\"value\";s:3:\"200\";}}');

-- --------------------------------------------------------

--
-- Table structure for table `product_banners`
--

CREATE TABLE `product_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_banners`
--

INSERT INTO `product_banners` (`id`, `product_id`, `banner`) VALUES
(1, 1, 'uploads/product_banners/D589Vo2cNT.jpg'),
(2, 1, 'uploads/product_banners/rbinfpAXk7.jpg'),
(3, 1, 'uploads/product_banners/TNXVsCwaoK.jpg'),
(4, 1, 'uploads/product_banners/TjWq6Arxed.jpg'),
(5, 1, 'uploads/product_banners/skPVYUSZd3.jpg'),
(6, 2, 'uploads/product_banners/bU2Ik0Ppgf.jpg'),
(7, 2, 'uploads/product_banners/w8REU9gLyf.jpg'),
(8, 2, 'uploads/product_banners/Lqpi61crYT.jpg'),
(9, 2, 'uploads/product_banners/MEsV75IZWO.jpg'),
(10, 2, 'uploads/product_banners/rCDw6RzuAt.jpg'),
(11, 3, 'uploads/product_banners/GV7stChyau.jpg'),
(12, 3, 'uploads/product_banners/Q2chF6oXl8.jpg'),
(13, 3, 'uploads/product_banners/7rU3PgfphX.jpg'),
(14, 3, 'uploads/product_banners/eSxhJWgLpu.jpg'),
(15, 3, 'uploads/product_banners/8UJyogFX2I.jpg'),
(16, 4, 'uploads/product_banners/8SIFZ9yptl.jpg'),
(17, 4, 'uploads/product_banners/TvYMDtohlg.jpg'),
(18, 4, 'uploads/product_banners/j2xuUMS6AB.webp'),
(19, 4, 'uploads/product_banners/eKgMjR9OTE.jpg'),
(20, 4, 'uploads/product_banners/VfvDmobMyd.jpg'),
(21, 5, 'uploads/product_banners/QcmCknVvlR.jpg'),
(22, 5, 'uploads/product_banners/gClxHq3e8z.jpg'),
(23, 5, 'uploads/product_banners/Xi8Tzu3JH4.jpg'),
(24, 5, 'uploads/product_banners/GPUal73OYV.jpg'),
(25, 5, 'uploads/product_banners/p4oybAiUqQ.jpg'),
(26, 6, 'uploads/product_banners/Az0mGD9Ova.jpg'),
(27, 6, 'uploads/product_banners/RbNgCOXszV.jpeg'),
(28, 6, 'uploads/product_banners/9ClYaQKf2H.jpg'),
(29, 6, 'uploads/product_banners/sbTeuMXZmQ.jpg'),
(30, 6, 'uploads/product_banners/hPjYzvbfta.jpg'),
(31, 7, 'uploads/product_banners/jyoQVNnC4A.jpg'),
(32, 7, 'uploads/product_banners/9dtfxh6UqC.jpg'),
(33, 7, 'uploads/product_banners/mshXKME9SH.jpg'),
(34, 7, 'uploads/product_banners/la9O8C0G64.jpg'),
(35, 7, 'uploads/product_banners/lPvEKQrNdI.jpg'),
(36, 8, 'uploads/product_banners/VNi1lmFQCT.jpg'),
(37, 8, 'uploads/product_banners/QScTfEwM2e.jpg'),
(38, 8, 'uploads/product_banners/HFDb15gcJO.jpg'),
(39, 8, 'uploads/product_banners/zIEeDP364g.jpg'),
(40, 8, 'uploads/product_banners/MVJI3glFAw.jpg'),
(41, 9, 'uploads/product_banners/vUmaflAzYN.jpg'),
(42, 9, 'uploads/product_banners/5Un4Rai3F7.jpg'),
(43, 9, 'uploads/product_banners/zg7qUHX5JK.jpg'),
(44, 9, 'uploads/product_banners/rEQIoGs4Y8.jpg'),
(45, 9, 'uploads/product_banners/nc3JYP91l5.webp'),
(46, 10, 'uploads/product_banners/WXx9r0vDqC.jpg'),
(47, 10, 'uploads/product_banners/YBqjmHePlI.jpg'),
(48, 10, 'uploads/product_banners/HFtbA8Q71r.jpg'),
(49, 10, 'uploads/product_banners/HxFIYNmWl9.jpg'),
(50, 10, 'uploads/product_banners/4J3ckPxoiC.jpg'),
(51, 11, 'uploads/product_banners/GTr18eOhdY.jpg'),
(52, 11, 'uploads/product_banners/zHecf9kZy2.jpg'),
(53, 11, 'uploads/product_banners/Fb6OU8EKLC.jpg'),
(54, 11, 'uploads/product_banners/AQwglmULSW.jpg'),
(55, 11, 'uploads/product_banners/jO4BLgwrDi.jpg'),
(56, 12, 'uploads/product_banners/MpJ2xilsDc.jpg'),
(57, 12, 'uploads/product_banners/zOtpGU4Dir.jpg'),
(58, 12, 'uploads/product_banners/vyz8DUeJXj.jpg'),
(59, 12, 'uploads/product_banners/2jnqLPS3zk.jpg'),
(60, 12, 'uploads/product_banners/MbX7e6J52k.jpg'),
(61, 13, 'uploads/product_banners/Q6Sf9Lz4in.jpg'),
(62, 13, 'uploads/product_banners/GObt9XZEID.jpg'),
(63, 13, 'uploads/product_banners/8hjxCYFLE2.jpg'),
(64, 13, 'uploads/product_banners/Y7Ke0lZbsG.jpg'),
(65, 13, 'uploads/product_banners/13fMb70xuw.jpg'),
(66, 14, 'uploads/product_banners/Ybue2z3TDj.jpg'),
(67, 14, 'uploads/product_banners/5AowdEPnkt.jpg'),
(68, 14, 'uploads/product_banners/y1CBO2ejUx.jpg'),
(69, 14, 'uploads/product_banners/AMjJHmo6et.jpg'),
(70, 14, 'uploads/product_banners/VsWfjMerIm.webp'),
(71, 15, 'uploads/product_banners/XjwPctOvq2.jpg'),
(72, 15, 'uploads/product_banners/ku3BXQGLdq.jpg'),
(73, 15, 'uploads/product_banners/DB4k3lf5hs.jpg'),
(74, 15, 'uploads/product_banners/BcRq1aIQCV.jpg'),
(75, 15, 'uploads/product_banners/YSf8njbwgJ.jpg'),
(76, 16, 'uploads/product_banners/k5SdT0JvI8.png'),
(77, 17, 'uploads/product_banners/l7Ok9RosJG.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `category_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_name`, `store_id`, `created_by`, `category_icon`, `status`, `deleted_at`) VALUES
(1, 'Burger', 1, 2, 'uploads/category_icons/ZcJwrWULxg.jpg', NULL, NULL),
(2, 'Pizza', 1, 2, 'uploads/category_icons/LarCMBwJvN.jpeg', NULL, NULL),
(3, 'Chicken', 1, 2, 'uploads/category_icons/vpu7E3T1xq.jpg', NULL, NULL),
(4, 'Burger', 2, 2, 'uploads/category_icons/mLC5z8TEwb.jpg', NULL, NULL),
(5, 'Chicken', 2, 2, 'uploads/category_icons/g8M6Z1J74p.jpg', NULL, NULL),
(6, 'Pizza', 2, 2, 'uploads/category_icons/6WKEAb9kaz.jpg', NULL, NULL),
(7, 'Rice', 2, 2, 'uploads/category_icons/0yTeuPkRYZ.jpg', NULL, NULL),
(8, 'Burger', 3, 2, 'uploads/category_icons/4KYN9FuGAg.jpg', NULL, NULL),
(9, 'Pizza', 3, 2, 'uploads/category_icons/hIi8jlHvgO.jpeg', NULL, NULL),
(10, 'Chicken', 3, 2, 'uploads/category_icons/2j4WMPRZuY.jpg', NULL, NULL),
(11, 'Fries', 3, 2, 'uploads/category_icons/mOQZCA6fJh.jpg', NULL, NULL),
(12, 'Rice', 3, 2, 'uploads/category_icons/lqMda5eR30.jpg', NULL, NULL),
(13, 'Fries', 1, 2, 'uploads/category_icons/mL3ChdW48t.jpg', NULL, NULL),
(14, 'Fries', 2, 2, 'uploads/category_icons/5jZrOB7pzt.jpg', NULL, NULL),
(15, 'Rice', 1, 2, 'uploads/category_icons/dXpKq0eBQk.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `riders`
--

CREATE TABLE `riders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `riders`
--

INSERT INTO `riders` (`id`, `created_by`, `store_id`, `username`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'usman', 1, 'usman@rider.com', NULL, '$2y$10$7HuQ8UIUzXXiVnH.QmCyi.Z3ILaTxI06JnloB9bka.MLVsc0kH12e', NULL, '2020-02-15 10:07:54', '2020-02-15 10:07:54'),
(2, 2, 1, 'basit', 1, 'basit@rider.com', NULL, '$2y$10$mcGlQAVf1M./izzz5NR2D.e2n8LS6t.fLbtixk8yjC6qk22f17uje', NULL, '2020-02-15 10:08:49', '2020-02-15 10:08:49'),
(3, 2, 1, 'ali', 1, 'waseemjaani@rider.com', NULL, '$2y$10$V18DeFxsJ5z3rclCu4iamOcNIhwGon1YVwbRhUIJEJwmFZF52wIze', NULL, '2020-02-17 07:14:43', '2020-02-20 05:34:47'),
(4, 2, 1, 'waseem', 1, 'waseem@rider.com', NULL, '$2y$10$nE/xFkDoS5DbKFf321GkG.YeZyPO84nEWQE5FlUCPLJoI3.2Fakm2', NULL, '2020-02-18 06:08:12', '2020-02-28 16:20:58'),
(6, 2, 3, 'm', 1, 'mohsin@m.com', NULL, '$2y$10$Tv3iQoGIapXws1PhauDJ6eiJ8UxxguWUOIl3zaDvxP1yB2e6GExgO', NULL, '2022-01-10 19:54:29', '2022-01-10 20:09:01'),
(7, 2, 1, 'usmantahir', 1, 'usmantahir@rider.com', NULL, '$2y$10$8mjegqIAxcP6fRp9o7Q5weEUD4cs/ternl1oLczQuq5/RxHtI0Er6', NULL, '2022-01-10 20:05:36', '2022-01-10 20:05:36');

-- --------------------------------------------------------

--
-- Table structure for table `riders_detail`
--

CREATE TABLE `riders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `riders_detail`
--

INSERT INTO `riders_detail` (`id`, `rider_id`, `name`, `phone_number`, `address`) VALUES
(1, 1, 'Usman Ali', '03249384781', 'gulberg'),
(2, 2, 'Basit Ali', '23435358757', '469'),
(3, 3, 'Waseem Pai Jaan', '+923249384781', 'Gulberg III, Lahore, Punjab, pakistan'),
(4, 4, 'Waseem', '+923249384781', 'Gulberg II, Lahore, Punjab, Pakistan'),
(6, 6, 'Mohsin Tariq', '03224764444', 'H49'),
(7, 7, 'Usman Tahir', '03224567889', 'hno23 kj');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02'),
(2, 'admin', 'web', '2020-01-30 05:42:02', '2020-01-30 05:42:02'),
(3, 'employee', 'web', '2020-01-30 05:42:03', '2020-01-30 05:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(6, 3),
(7, 2),
(7, 3),
(8, 2),
(8, 3),
(9, 2),
(9, 3),
(10, 2),
(10, 3),
(11, 2),
(11, 3),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(16, 3),
(17, 2),
(17, 3),
(18, 2),
(18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `store_category_id` int(10) UNSIGNED DEFAULT NULL,
  `store_type_id` int(10) UNSIGNED DEFAULT NULL,
  `short_description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `cash_on_delivery` tinyint(4) NOT NULL DEFAULT 0,
  `customer_pickup` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_to_customer` tinyint(4) NOT NULL DEFAULT 0,
  `delivery_charges` double(8,2) NOT NULL DEFAULT 0.00,
  `latitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `longitude` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_thumbnail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `visible_status` tinyint(4) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_email` varchar(191) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store_contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `store_name`, `created_by`, `store_category_id`, `store_type_id`, `short_description`, `long_description`, `cash_on_delivery`, `customer_pickup`, `delivery_to_customer`, `delivery_charges`, `latitude`, `longitude`, `store_thumbnail`, `status`, `visible_status`, `deleted_at`, `created_at`, `updated_at`, `store_email`, `store_contact`) VALUES
(1, 'KFC Barket Market', 2, 2, 1, 'Fast-food chain known for its buckets of fried chicken, plus wings & sides.', 'Fast-food chain known for its buckets of fried chicken, plus wings & sides.', 1, 1, 1, 100.00, '31.5009014', '74.3196536', 'uploads/store_thumbnails/xclwKtPU71.jpg', 1, 1, NULL, NULL, NULL, 'kfc@foodeo.com', '111-222-333'),
(2, 'KFC - MM Alam Road', 2, 2, 2, 'Fast-food chain known for its buckets of fried chicken, plus wings & sides.', 'Fast-food chain known for its buckets of fried chicken, plus wings & sides.', 1, 1, 1, 100.00, '31.51422470000001', '74.35171799999999', 'uploads/store_thumbnails/akipSuW7UF.jpeg', 1, 1, NULL, NULL, NULL, 'kfcmmalam@foodeo.com', '222-333-444'),
(3, 'KFC - Cavalry Ground', 2, 2, 2, 'Fast-food chain known for its buckets of fried chicken, plus wings & sides.', 'Fast-food chain known for its buckets of fried chicken, plus wings & sides.', 1, 1, 1, 100.00, '31.5017218', '74.3640624', 'uploads/store_thumbnails/Pidw91qa7Y.jpeg', 1, 0, NULL, NULL, NULL, 'kfc.cavalry@foodeo.com', '333-444-555');

-- --------------------------------------------------------

--
-- Table structure for table `store_banners`
--

CREATE TABLE `store_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store_banners`
--

INSERT INTO `store_banners` (`id`, `store_id`, `banner`) VALUES
(1, 1, 'uploads/store_banners/2ns8CMfvph.jpeg'),
(2, 1, 'uploads/store_banners/7VWJduwORD.png'),
(3, 1, 'uploads/store_banners/IFdC07nSYu.jpg'),
(4, 1, 'uploads/store_banners/VmpWRh9N3g.jpg'),
(5, 1, 'uploads/store_banners/BbY728y5NX.jpg'),
(6, 2, 'uploads/store_banners/jNEfL2ISrs.jpeg'),
(7, 2, 'uploads/store_banners/uzPHtkF9ai.jpeg'),
(8, 2, 'uploads/store_banners/yG6MDYPgJK.png'),
(9, 2, 'uploads/store_banners/UYXHgPs785.jpg'),
(10, 2, 'uploads/store_banners/uQ9G6wMyiY.jpg'),
(11, 3, 'uploads/store_banners/GXtlfKxwe2.jpeg'),
(12, 3, 'uploads/store_banners/KthRa9fCgp.png'),
(13, 3, 'uploads/store_banners/zC2BDGJQRp.jpeg'),
(14, 3, 'uploads/store_banners/dAutVIXqiN.jpg'),
(15, 3, 'uploads/store_banners/nq4XlW3tzL.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `store_categories`
--

CREATE TABLE `store_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store_categories`
--

INSERT INTO `store_categories` (`id`, `category_name`, `category_icon`) VALUES
(1, 'Other', NULL),
(2, 'Fast Food', NULL),
(3, 'Desi', NULL),
(4, 'Cafe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `store_types`
--

CREATE TABLE `store_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `store_types`
--

INSERT INTO `store_types` (`id`, `type`) VALUES
(1, 'Main Branch'),
(2, 'Sub Branch');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 1, 'admin@foodordering.com', NULL, '$2y$10$68N8GubryLRmUzyvecqpWuAbix3gURUBs.OJdjF5laaFA2.2OiF96', NULL, NULL, NULL),
(2, 'mansoor', 1, 1, 'mansoor@foodeo.com', NULL, '$2y$10$GoXNKd3HZMoVXFWy5BInR.Ch1vsMtqNZCs4XL969vq23SvDwA3Sne', 'HGiVN7cuFbWpZbFl8kEOwkKb4cHBjgbvl9ZCCrkY9fDARHYvbUefNdvnI7zv', '2020-02-06 10:06:18', '2020-02-06 10:06:18'),
(3, 'usman', 2, 1, 'usman@foodeo.com', NULL, '$2y$10$l7ZN4L/30GJxwS5vzAOqwez.VuGyN6oGRKvWD/Khnj24xH4YOxB9O', NULL, '2020-02-15 10:06:15', '2020-02-15 10:06:15'),
(4, 'basit', 2, 1, 'basit@foodeo.com', NULL, '$2y$10$kVDsxCD2vllMtAPWbDm3O.hJgEP8mJzfj3n4K31YLmz7f6SOb1OR6', NULL, '2020-02-15 10:07:03', '2020-02-15 10:07:03'),
(5, 'karam', 2, 1, 'karam@foodeo.com', NULL, '$2y$10$4a6MHuvNYjqUy1IZHujN0.D9D3BNueshKElWmNO9OewRbdpQ/QueK', NULL, '2020-02-15 10:10:20', '2020-02-15 10:10:20'),
(6, 'ruman', 2, 1, 'ruman@foodeo.com', NULL, '$2y$10$7gfpg7Ta0s0AaXdLBTECH.GK0kig6imNPmuCH88jMUO7DxKp0MImy', NULL, '2020-02-15 10:11:17', '2020-02-15 10:11:17'),
(7, 'awais', 2, 1, 'awais@foodeo.com', NULL, '$2y$10$R4K7FEOXc9tEjYHTszStzuXceav0tFHR7NiyNCKmWCzNHju9Su2e2', NULL, '2020-02-15 10:19:45', '2020-02-15 10:19:45'),
(8, 'hasnain', 2, 1, 'hasnain', NULL, '$2y$10$nljAfXhosrSCfmK2KFZb8eN6taVtjMrA5nIjBsE2gNbElVHtH8Tby', NULL, '2020-02-15 10:20:52', '2020-02-15 10:20:52'),
(9, 'bilal', 2, 1, 'bilal@hafizbroast.com', NULL, '$2y$10$SMnDY2OaEnHJ/2m0TwzmRe8J6EpEqfocWK.XyM8NQNKxcYlSL7AjW', NULL, '2020-07-10 06:43:06', '2020-07-10 06:43:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `designation_id` int(10) UNSIGNED DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `name`, `user_id`, `store_id`, `created_by`, `designation_id`, `phone_number`, `address`) VALUES
(1, 'Mansoor Khalid', 2, NULL, 1, NULL, '23435358757', 'gulberg'),
(2, 'Usman Ali', 3, 1, 2, 2, '03249384781', 'Gulberg III, Lahore, Punjab, Pakistan'),
(3, 'Basit Ali', 4, 1, 2, 1, '03249384781', 'gulberg'),
(4, 'Karam Tariq', 5, 2, 2, 1, '03249384781', 'Gulberg III, Lahore, Punjab, Pakistan'),
(5, 'Ruman Amir', 6, 2, 2, 2, '03249384781', 'Gulberg III, Lahore, Punjab, Pakistan'),
(6, 'Awais Tariq', 7, 2, 2, 1, '03249384781', 'Gulberg III, Lahore, Punjab, Pakistan'),
(7, 'Hasnain Tariq', 8, 2, 2, 2, '03249384781', 'Gulberg III, Lahore, Punjab, Pakistan'),
(8, 'Bilal', 9, 2, 2, 5, '03224444444', 'Township, Lahore, Punjab, Pakistan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `auth_email_unique` (`email`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_details_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `delivery_status_list`
--
ALTER TABLE `delivery_status_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designations_created_by_foreign` (`created_by`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_store_id_foreign` (`store_id`);

--
-- Indexes for table `order_assigned`
--
ALTER TABLE `order_assigned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_assigned_rider_id_index` (`rider_id`),
  ADD KEY `order_assigned_order_id_index` (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_products_order_id_foreign` (`order_id`),
  ADD KEY `order_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickup_status_list`
--
ALTER TABLE `pickup_status_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_created_by_foreign` (`created_by`),
  ADD KEY `products_store_id_foreign` (`store_id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_banners`
--
ALTER TABLE `product_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_banners_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_created_by_foreign` (`created_by`),
  ADD KEY `product_categories_store_id_foreign` (`store_id`);

--
-- Indexes for table `riders`
--
ALTER TABLE `riders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `riders_email_unique` (`email`),
  ADD KEY `riders_created_by_foreign` (`created_by`),
  ADD KEY `riders_store_id_foreign` (`store_id`);

--
-- Indexes for table `riders_detail`
--
ALTER TABLE `riders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riders_detail_rider_id_foreign` (`rider_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stores_store_email_unique` (`store_email`),
  ADD KEY `stores_created_by_foreign` (`created_by`),
  ADD KEY `stores_store_category_id_foreign` (`store_category_id`),
  ADD KEY `stores_store_type_id_foreign` (`store_type_id`);

--
-- Indexes for table `store_banners`
--
ALTER TABLE `store_banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_banners_store_id_foreign` (`store_id`);

--
-- Indexes for table `store_categories`
--
ALTER TABLE `store_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_types`
--
ALTER TABLE `store_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_detail_user_id_foreign` (`user_id`),
  ADD KEY `user_detail_store_id_foreign` (`store_id`),
  ADD KEY `user_detail_created_by_foreign` (`created_by`),
  ADD KEY `user_detail_designation_id_foreign` (`designation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `delivery_status_list`
--
ALTER TABLE `delivery_status_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_assigned`
--
ALTER TABLE `order_assigned`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pickup_status_list`
--
ALTER TABLE `pickup_status_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_banners`
--
ALTER TABLE `product_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `riders`
--
ALTER TABLE `riders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `riders_detail`
--
ALTER TABLE `riders_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `store_banners`
--
ALTER TABLE `store_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `store_categories`
--
ALTER TABLE `store_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_types`
--
ALTER TABLE `store_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD CONSTRAINT `customer_details_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designations`
--
ALTER TABLE `designations`
  ADD CONSTRAINT `designations_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_assigned`
--
ALTER TABLE `order_assigned`
  ADD CONSTRAINT `order_assigned_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_assigned_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `riders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_products`
--
ALTER TABLE `order_products`
  ADD CONSTRAINT `order_products_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD CONSTRAINT `product_attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_banners`
--
ALTER TABLE `product_banners`
  ADD CONSTRAINT `product_banners_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riders`
--
ALTER TABLE `riders`
  ADD CONSTRAINT `riders_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riders_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `riders_detail`
--
ALTER TABLE `riders_detail`
  ADD CONSTRAINT `riders_detail_rider_id_foreign` FOREIGN KEY (`rider_id`) REFERENCES `riders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stores_store_category_id_foreign` FOREIGN KEY (`store_category_id`) REFERENCES `store_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stores_store_type_id_foreign` FOREIGN KEY (`store_type_id`) REFERENCES `store_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `store_banners`
--
ALTER TABLE `store_banners`
  ADD CONSTRAINT `store_banners_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD CONSTRAINT `user_detail_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_detail_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_detail_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_detail_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
