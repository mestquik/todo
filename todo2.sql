-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 09 May 2023, 12:12:05
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todo2`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_27_134313_create_permission_tables', 1),
(6, '2023_01_28_114148_create_todolars_table', 1),
(7, '2023_02_01_114545_add_status_to_users_table', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(1, 'App\\Models\\User', 13),
(1, 'App\\Models\\User', 14),
(1, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 19),
(1, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 23);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2023-02-01 05:28:04', '2023-02-01 05:28:04'),
(2, 'SuperAdmin', 'web', '2023-02-01 05:28:04', '2023-02-01 05:28:04'),
(3, 'StandartUser', 'web', '2023-02-01 05:28:04', '2023-02-01 05:28:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todolar`
--

CREATE TABLE `todolar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT 4,
  `mission` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `priorty` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `todolar`
--

INSERT INTO `todolar` (`id`, `user_id`, `mission`, `comment`, `priorty`, `active`, `created_at`, `updated_at`) VALUES
(2, 2, '2', '2', '2', 1, '2023-01-28 21:00:00', '2023-01-29 21:00:00'),
(9, 3, 'Görev3', 'Açıklama3', 'önemli3', 0, '2023-01-30 05:21:19', '2023-01-30 05:21:19'),
(23, 7, '7. kullanici deneme', 'AÇIKLAMA', 'Önemli', 0, '2023-01-30 07:07:06', '2023-02-01 05:33:51'),
(24, 1, 'dasds', 'sdsd', 'sddss', 0, '2023-01-30 07:09:38', '2023-01-31 09:34:42'),
(30, 1, 'thyh', 'trthtrhrttrh', '2', 0, '2023-01-31 05:51:18', '2023-01-31 05:51:18'),
(33, 1, 'asd', 'asd', '1', 0, '2023-01-31 06:02:50', '2023-01-31 09:33:55'),
(34, 1, 'asd', 'asd', 'Acil', 1, '2023-01-31 06:03:35', '2023-01-31 06:05:42'),
(35, 1, 'asd', 'asd', 'Çok Önemli', 1, '2023-01-31 06:03:43', '2023-01-31 06:07:20'),
(36, 10, 'asd', 'asd', 'Önemli', 0, '2023-01-31 06:08:01', '2023-01-31 08:15:30'),
(39, 10, 'eerretert', 'retertreter', 'Acil', 0, '2023-01-31 07:48:07', '2023-01-31 08:15:33'),
(41, 10, 'İlk Görevim', 'Açıklama yapıldı.', 'Acil', 0, '2023-01-31 08:16:01', '2023-01-31 08:19:30'),
(42, 10, 'Görev Deneme', 'Açıklama yapılması için belirtilen alana açıklama yapıyorum', 'Acil', 0, '2023-01-31 08:37:13', '2023-01-31 08:37:19'),
(49, 21, 'deneme', 'anasdasıudbqwıebıuajsdk bıqehıuasbd', 'Önemli', 0, '2023-02-02 13:06:21', '2023-02-02 13:06:21'),
(50, 22, 'asdasdadssaasdsasdasdasd', 'asdasd', 'Acil', 1, '2023-02-02 13:12:28', '2023-02-02 13:12:50'),
(51, 23, 'DenemeTesti', 'Bu bir deneme testidir', 'Acil', 0, '2023-05-08 14:57:29', '2023-05-08 14:57:55');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'deneme2', 'deneme2', 'deneme2@hotmail.com', 1, NULL, '$2y$10$2L9TDAnAYF8/Wkg4DqRp6u6Ob/gT2aBK.IkOiSOY8PbxPkW6Sk1wm', NULL, '2023-01-30 07:08:57', '2023-02-02 07:23:09'),
(2, 'İsim1', 'username1', 'email@hotmail.com', 1, NULL, '$2y$10$Lo3l6mlpDizCfd1XSX0TQO2GmED2F.x6TfcxM2AP9cPRa2lIT1PA6', NULL, '2023-01-30 04:50:56', '2023-02-02 07:23:17'),
(3, 'İsim2', 'username2', 'email2@hotmail.com', 0, NULL, '$2y$10$NxOxkfp.FFg552lk/WDAnO.YEsU267onrMavWacTWKhoRza0T71EO', NULL, '2023-01-30 05:15:00', '2023-02-02 07:04:53'),
(7, 'pp', 'p', 'deneme@hotmail.com', 1, NULL, '$2y$10$w5jG6IHjOKJBIiohWL8Axub3lP7keX7EGEL9vQGEz/0GVi1OhZVH.', NULL, '2023-01-30 07:06:15', '2023-02-01 10:40:51'),
(10, 'Umut', 'Umut', 'umutmestogluu@hotmail.com', 1, NULL, '$2y$10$vU4BkYQKIIEpK0MUfSVMH.h5Zwc1Q/yzlbefIazur9PqAAPqk8/9.', NULL, '2023-01-31 06:07:54', '2023-02-01 10:40:58'),
(11, 'Umutkk', 'deneme123', 'deneme123@hotmail.com', 0, NULL, '$2y$10$9SlHjk0Sh240Uu8nUk7/HuPVQO3QeHI7keoV0ll6baOx.P2X7y/zG', NULL, '2023-01-31 09:52:51', '2023-02-02 06:49:44'),
(12, 'Admin', 'admin', 'admin@hotmail.com', 1, NULL, '$2y$10$Pf3TidaJ03S24toVPBcMeOxOQqPtd4k5tYmsH8ZIGGr/VkHS7V5B.', NULL, '2023-02-01 05:37:48', '2023-02-01 14:32:27'),
(13, 'YeniDeneme', 'YeniDeneme', 'deneme1234@hotmail.com', 0, NULL, '$2y$10$mIr1LMBiiMkbTKYtgPF3iOwMhriW1wsS7HqJtJfOYqLohRzWX5oT.', NULL, '2023-02-01 08:18:17', '2023-02-02 09:15:09'),
(14, 'DenemeYeni2', 'DenemeYeni2', 'DenemeYeni2@hotmail.com', 1, NULL, '$2y$10$XT1Ma57DtdGGKgsV7sLqJuDwQ4EHEHLTckcHI4kr5hqkdYHZV2KZe', NULL, '2023-02-01 08:28:07', '2023-02-01 08:28:07'),
(15, 'üşdöpaosdöpasdas', 'asdasdasd', 'asdasdasd@hotmail.com', 1, NULL, '$2y$10$CPJBW9zHycZU6qb14jgB9ubHwysSCGN302kF8YFs8gqBLgWwUKXCe', NULL, '2023-02-01 10:43:07', '2023-02-01 10:43:07'),
(16, 'murat', 'muratsevgi', 'sevgi@hotmail.com', 1, NULL, '$2y$10$8ajjCPcaqu8iMkHZxuzZHewcpurDndU800SKsUWAhdNxO26ANwDCe', NULL, '2023-02-01 14:33:46', '2023-02-01 14:33:46'),
(17, 'denizhan', 'denizhan', 'denizhan12@hotmail.com', 0, NULL, '$2y$10$.9QUfcuHzZZDdGFdPidsjuT5HCnX5LhTfNbKQFqU8/rrzZ4ZRpHMe', NULL, '2023-02-02 12:49:50', '2023-05-04 10:07:50'),
(18, 'dinozor', 'denizhan1', 'denizhan@hotmail.com', 0, NULL, '$2y$10$9tujT33fQhnQmM.a/bcC3O7jexezpukG3EvQGsBGVMBg6aEGpCpEq', NULL, '2023-02-02 12:52:10', '2023-05-04 10:08:26'),
(19, 'emirhan', 'emirhan11', 'emirhan11@hotmail.com', 0, NULL, '$2y$10$ZrXJzqD1Hhaf4J0Y.jqgBekjQxtntxFEOfBICRkRgszU3eTaYSZKW', NULL, '2023-02-02 12:54:23', '2023-05-04 10:08:52'),
(20, 'asdasdasd', 'asdasdasd1', 'asdasdasd1@hotmail.com', 1, NULL, '$2y$10$OmjEHiRV4h6M.b2.Oq3sO.Q6IFF2qa90Rb1yIOoctqloCesV2d/A2', NULL, '2023-02-02 12:58:51', '2023-02-02 12:58:51'),
(21, 'deneme', 'denemedeneme', 'deneme22123@hotmail.com', 1, NULL, '$2y$10$G9gs3RX9qxFLExLgfyHLke3l0FgACX7AebJuaodxBhi6mw4Rre7oS', NULL, '2023-02-02 13:05:41', '2023-02-02 13:07:38'),
(22, 'asdasdasdasd', 'denemedeneme123', 'denemedeneme@hotmail.com', 1, NULL, '$2y$10$GojMvPd.AV6fj9KvqAPm4eWxtBz5MSI9UeiJSLVKn0HtatS1eZ2P2', NULL, '2023-02-02 13:09:05', '2023-02-02 13:11:10'),
(23, 'UmutTest', 'umuttest', 'umutmestogluuu@hotmail.com', 0, NULL, '$2y$10$cJ4HFwW.7yYrBQannwQlHu6tYOhrOxFmMJAc//l1seuTKY75flw62', NULL, '2023-05-08 14:55:38', '2023-05-08 14:56:28'),
(24, 'AdminTest', 'admintest', 'admintest@hotmail.com', 1, NULL, '$2y$10$gN09GEbBSJ5i.N74hj2uSOX/13NMN4ITGWJOAOnVTC62.E2xAGnFG', NULL, '2023-05-09 05:49:42', '2023-05-09 05:49:42');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Tablo için indeksler `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `todolar`
--
ALTER TABLE `todolar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `todolar`
--
ALTER TABLE `todolar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
