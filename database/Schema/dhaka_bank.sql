-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2023 at 05:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhaka_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_lists`
--

CREATE TABLE `admin_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `user_id`, `designation`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Backend Developement', 4, NULL, NULL, NULL, NULL),
(2, 'ForontEnd Development', NULL, 'explicabo', NULL, NULL, NULL),
(3, 'Mobile Application', NULL, 'consequatur', NULL, NULL, NULL),
(4, 'UI/UX', 2, 'totam', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_06_210139_create_departments_table', 1),
(6, '2023_10_07_103823_create_security_questions_table', 1),
(7, '2023_10_08_080039_create_admin_lists_table', 1),
(8, '2023_10_10_062018_create_project_categories_table', 1),
(9, '2023_10_10_092646_create_project_initiations_table', 1),
(10, '2023_10_14_030325_create_user_details_table', 1),
(11, '2023_10_14_172143_create_documents_table', 1),
(12, '2023_10_17_092214_create_project_documents_table', 1),
(13, '2023_10_19_075807_create_statuses_table', 1),
(14, '2023_10_24_052315_create_permission_tables', 1),
(15, '2023_10_30_035158_create_project_initiation_overviews_table', 1),
(16, '2023_11_04_033652_create_resources_table', 1),
(17, '2023_11_07_184019_create_resource_management_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Et voluptatibus id et delectus facilis unde facere.', 'Molestiae reprehenderit illum ea. Rerum error reiciendis voluptas sint. Debitis porro optio eaque dolores dolores.', NULL, NULL, NULL),
(2, 'Rerum id et et delectus.', 'Accusantium exercitationem libero neque minima quia consequatur incidunt. Aut sapiente consequatur est ipsum rerum recusandae.', NULL, NULL, NULL),
(3, 'Dicta beatae aut fuga beatae molestiae.', 'Enim sunt voluptatem optio veritatis eaque quia iure. Reiciendis possimus illo et. Porro eum ullam omnis officia enim qui tenetur. Architecto sint ut aut minima.', NULL, NULL, NULL),
(4, 'Ab fuga non illum corrupti.', 'Error maxime architecto quis non. Cupiditate distinctio perspiciatis quia dolores maxime rem ut. Explicabo voluptatum sed beatae reiciendis distinctio magnam fuga. Quia sit rerum tenetur est voluptas.', NULL, NULL, NULL),
(5, 'Cumque enim nihil rerum neque itaque.', 'Ea voluptatem nemo non aut. Placeat hic accusantium incidunt quod aut deleniti. Numquam soluta et sapiente velit quibusdam necessitatibus et.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_documents`
--

CREATE TABLE `project_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `project_category_id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_initiations`
--

CREATE TABLE `project_initiations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `required_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_by` bigint UNSIGNED DEFAULT NULL,
  `inactivated_by` bigint UNSIGNED DEFAULT NULL,
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `assigned_by` bigint UNSIGNED DEFAULT NULL,
  `verified_by` bigint UNSIGNED DEFAULT NULL,
  `unverified_by` bigint UNSIGNED DEFAULT NULL,
  `project_unique_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_initiations`
--

INSERT INTO `project_initiations` (`id`, `user_id`, `project_category_id`, `name`, `description`, `goal`, `deadline`, `required_file`, `activated_by`, `inactivated_by`, `assigned_to`, `assigned_by`, `verified_by`, `unverified_by`, `project_unique_id`, `isVerified`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 3, 'Alias voluptas aut dignissimos quam corrupti possimus quia.', 'Ut facere quo voluptates voluptatem dolorum sapiente voluptatibus rerum. Voluptatum libero et temporibus quae mollitia. Doloremque et dolore ut debitis.', 'Sunt et quidem quo. Ut ducimus rerum est ut dignissimos ut. Consequatur sint soluta ipsum fugiat consequatur magni quaerat rerum.', '1983-04-04', 'porro.pdf', NULL, 1, NULL, 1, NULL, 1, NULL, 0, 'inactive', NULL, '2023-11-10 11:15:41', NULL),
(2, 5, 4, 'Et ea voluptatem deserunt laudantium quidem.', 'Dolore ad enim id aspernatur. Sapiente fugiat laudantium molestiae.', 'Exercitationem et enim adipisci non natus ea nulla. Nulla eveniet explicabo ad culpa.', '1988-03-30', 'eum.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(3, 5, 3, 'Blanditiis excepturi nihil adipisci iusto dolore.', 'Facere quae fuga enim est in blanditiis dolores. Ut voluptatem nesciunt praesentium magnam incidunt. Minima asperiores reiciendis id ut illo quae est.', 'Sit vitae minus autem mollitia tenetur fugiat. Sint et repellat et ut voluptas.', '2022-01-21', 'maxime.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(4, 2, 2, 'Eius et distinctio dolor sunt illo aspernatur doloremque.', 'Voluptas eaque est dolores praesentium reiciendis. Explicabo atque ipsum libero ut consequatur. Beatae commodi quasi in. Consequuntur quae voluptatum dolore possimus.', 'Ut facere cum nobis praesentium ex soluta. Et fuga velit rem consectetur temporibus. Culpa officia non neque sit blanditiis enim veritatis. Aut et impedit sed sapiente non et et.', '1991-11-23', 'in.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(5, 2, 1, 'Laboriosam voluptatem ea fuga quibusdam praesentium in.', 'Facere amet perferendis perspiciatis nihil iste sint ut. Molestiae sed voluptatum repudiandae.', 'Distinctio delectus quisquam necessitatibus ut provident at unde. Laboriosam voluptas quo laudantium quasi consequatur facere sint doloribus. Ipsum iusto rerum officiis magni. Asperiores non recusandae qui est praesentium.', '2008-03-06', 'eos.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_initiation_overviews`
--

CREATE TABLE `project_initiation_overviews` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_initiation_overviews`
--

INSERT INTO `project_initiation_overviews` (`id`, `project_initiation_id`, `user_id`, `designation`, `comment`, `assigned_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL, 1, NULL, '2023-11-10 11:15:17', '2023-11-10 11:15:17'),
(2, 1, 4, 'Mollit aut quo quisq', 'Totam dicta ducimus', 1, NULL, '2023-11-10 11:15:17', '2023-11-10 11:15:17'),
(3, 1, 5, 'Nisi vel porro est m', 'Rem enim suscipit as', 1, NULL, '2023-11-10 11:15:17', '2023-11-10 11:15:17'),
(4, 1, 6, 'Vero earum eaque nis', 'Adipisicing magni in', 1, NULL, '2023-11-10 11:15:17', '2023-11-10 11:15:17');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint UNSIGNED NOT NULL,
  `added_by` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `resource_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `added_by`, `name`, `description`, `resource_type`, `quantity`, `cost`, `document`, `date_added`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Forrest Grimes', 'Sit nihil eius autem sit repellendus impedit ut.', 'incidunt', 23, 141.84, 'iste.pdf', '2016-07-29', NULL, NULL, NULL),
(2, 1, 'Consuelo Kohler IV', 'Sit ratione sit consequatur ducimus aut.', 'sed', 9, 295.49, 'a.pdf', '1979-01-17', NULL, NULL, NULL),
(3, 1, 'Dr. Devan Bartell PhD', 'Aut cum natus dolor quo.', 'asperiores', 98, 897.79, 'consequuntur.pdf', '2023-06-30', NULL, NULL, NULL),
(4, 1, 'Wallace Mayer', 'A ut sed reiciendis occaecati praesentium.', 'vel', 76, 353.72, 'placeat.pdf', '1982-09-08', NULL, NULL, NULL),
(5, 1, 'Bernadette Hayes', 'Quasi quam aliquam totam aut commodi possimus harum.', 'est', 4, 282.28, 'numquam.pdf', '1982-01-19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resource_management`
--

CREATE TABLE `resource_management` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `resource_id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED DEFAULT NULL,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2023-11-08 05:21:49', '2023-11-08 05:21:49'),
(2, 'admin', 'web', '2023-11-08 05:21:49', '2023-11-08 05:21:49'),
(3, 'user', 'web', '2023-11-08 05:21:49', '2023-11-08 05:21:49'),
(4, 'vendor', 'web', '2023-11-08 05:21:49', '2023-11-08 05:21:49'),
(5, 'controller', 'web', '2023-11-08 05:21:49', '2023-11-08 05:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `security_questions`
--

CREATE TABLE `security_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `security_questions`
--

INSERT INTO `security_questions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'In what city were you born?', NULL, NULL),
(2, 'What is the name of your favorite pet?', NULL, NULL),
(3, 'What high school did you attend?', NULL, NULL),
(4, 'What was the name of your elementary school?', NULL, NULL),
(5, 'What was the make of your first car?', NULL, NULL),
(6, 'What was your favorite food as a child?', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'active', NULL, NULL, NULL),
(2, 'inactive', NULL, NULL, NULL),
(3, 'pending', NULL, NULL, NULL),
(4, 'canceled', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TFA` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `last_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sq_no_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sq_no_1_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sq_no_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sq_no_2_ans` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `verified_by` bigint UNSIGNED DEFAULT NULL,
  `unverified_by` bigint UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone_no`, `TFA`, `last_login`, `isVerified`, `address`, `id_number`, `id_type`, `sq_no_1`, `sq_no_1_ans`, `sq_no_2`, `sq_no_2_ans`, `pro_pic`, `date_of_birth`, `verified_by`, `unverified_by`, `email_verified_at`, `password`, `user_type`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin', 'admin@example.com', '0123456789', '0', NULL, 1, '123 Main St, City', '123456789', 'NID', NULL, NULL, NULL, NULL, NULL, '1990-01-01', 1, NULL, NULL, '$2y$10$Gv/8ZQVQYLhrMoWYf.szR.uyRgf26C8JbisB7uUMlF6I5KViyj9l.', 'super_admin', NULL, NULL, '2023-11-08 05:21:50', '2023-11-08 05:21:50'),
(2, 'Mr. Orrin Streich III', 'tsporer', 'jacobson.eugenia@example.net', '762.356.5750', '1', '2023-03-08 21:41:25', 1, '43914 O\'Keefe Prairie\nWest Mckayla, MS 36058-7577', '55064248', 'NID', NULL, NULL, NULL, 'Minus aut in recusandae et qui est.', 'facere.jpg', '2014-03-09', 1, 1, '2023-11-08 05:21:50', '$2y$10$eXh.s9FRNMpkAGaOuA/lEuF7xBpFjc6tRA.5i3i5b66RkV.xPbmru', 'user', NULL, NULL, NULL, '2023-11-08 05:25:31'),
(3, 'Anais Brekke', 'mellie.rodriguez', 'ramona.wilkinson@example.net', '386-603-4803', '2', '2023-07-05 17:10:11', 0, '119 Laverne Gateway\nEast Donny, OR 48725', '92309230', 'NID', NULL, 'Molestiae vel natus labore esse voluptatum consequatur quidem.', NULL, NULL, 'consequatur.jpg', '2016-10-02', NULL, NULL, '2023-11-08 05:21:50', '$2y$10$tk0jIcu7fEGgzZsoDs5n9.BKtfvxylk2XTPjDza4ga1tICWn4Wk6K', 'user', NULL, NULL, NULL, NULL),
(4, 'Buford Hand', 'swunsch', 'crunolfsdottir@example.org', '+1 (626) 929-4628', '0', '2023-09-20 02:23:31', 0, '65072 Ben Point\nBrandynside, NH 82556-3332', '3335950', 'Passport', NULL, NULL, NULL, NULL, 'minima.jpg', '2013-06-22', NULL, NULL, '2023-11-08 05:21:50', '$2y$10$zWzrTKITlqHeiTDQBoTXB.B41Fxq9H.aM/06n3y9DEEza4OSeU0oy', 'user', NULL, NULL, NULL, NULL),
(5, 'Abdiel Block', 'gwisozk', 'celestino.jacobson@example.org', '+1-561-863-6957', '2', '2023-07-19 07:32:41', 0, '6887 Linnie Expressway\nRueckertown, MO 18170-0769', '49846328', 'NID', 'Aut qui impedit non sit eaque.', NULL, NULL, 'Enim ducimus quidem impedit nihil est.', 'sequi.jpg', '2022-09-30', NULL, NULL, '2023-11-08 05:21:50', '$2y$10$Wa9W5.3mnCKLqMCOgZJrcuDuLKGtCyOuEXb0dRKYqvmHaVMvBO.Gq', 'user', NULL, NULL, NULL, NULL),
(6, 'Josiah Will', 'moshe.anderson', 'ohomenick@example.org', '+1 (563) 687-6895', '0', '2023-10-21 07:26:16', 0, '6152 Isaias Garden\nAlejandrafurt, VA 00242', '5274937', 'Passport', NULL, 'Cum repellat animi temporibus occaecati ratione doloremque accusantium.', NULL, 'Sed laudantium sit et fugit et quisquam ut.', 'praesentium.jpg', '1970-09-19', NULL, NULL, '2023-11-08 05:21:51', '$2y$10$7J7T4txhuRexIfd58/ONuuFg8OdvHuqFnm06z5WmATo6csgxXHgyS', 'user', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_lists`
--
ALTER TABLE `admin_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_documents`
--
ALTER TABLE `project_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_initiations`
--
ALTER TABLE `project_initiations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_initiation_overviews`
--
ALTER TABLE `project_initiation_overviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resources_added_by_foreign` (`added_by`);

--
-- Indexes for table `resource_management`
--
ALTER TABLE `resource_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resource_management_user_id_foreign` (`user_id`),
  ADD KEY `resource_management_resource_id_foreign` (`resource_id`),
  ADD KEY `resource_management_project_initiation_id_foreign` (`project_initiation_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `security_questions`
--
ALTER TABLE `security_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_lists`
--
ALTER TABLE `admin_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_initiations`
--
ALTER TABLE `project_initiations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_initiation_overviews`
--
ALTER TABLE `project_initiation_overviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `resource_management`
--
ALTER TABLE `resource_management`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_added_by_foreign` FOREIGN KEY (`added_by`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resource_management`
--
ALTER TABLE `resource_management`
  ADD CONSTRAINT `resource_management_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_management_resource_id_foreign` FOREIGN KEY (`resource_id`) REFERENCES `resources` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `resource_management_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
