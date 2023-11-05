-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2023 at 05:15 AM
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
(1, 'Backend Developement', NULL, NULL, NULL, NULL, NULL),
(2, 'ForontEnd Development', 1, NULL, NULL, NULL, NULL),
(3, 'Mobile Application', NULL, 'recusandae', NULL, NULL, NULL),
(4, 'UI/UX', NULL, NULL, NULL, NULL, NULL);

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
(16, '2023_11_04_033652_create_resources_table', 1);

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
(1, 'Qui facilis natus totam.', 'Qui aut dolores rerum pariatur eius exercitationem sit aliquid. Nulla laborum omnis ut magni. Aliquam doloremque pariatur qui culpa. Placeat ipsum qui qui doloribus.', NULL, NULL, NULL),
(2, 'Consequatur recusandae harum omnis qui hic in.', 'Voluptatem quibusdam tempore quasi quae tempora. Rerum natus atque quasi consequatur. Libero sit ipsum cum nemo et.', NULL, NULL, NULL),
(3, 'Quia velit nulla est a.', 'Odit modi ipsa quibusdam provident omnis earum. Vel qui vel iure non ut dolore ut. Corporis vero debitis et incidunt exercitationem officiis fugit.', NULL, NULL, NULL),
(4, 'Iure velit laboriosam eligendi ratione.', 'Et incidunt minus expedita eaque voluptatem veniam. Debitis qui enim perferendis. Similique temporibus aut maiores quas.', NULL, NULL, NULL),
(5, 'Quasi ea incidunt autem.', 'Dolores enim mollitia dolores qui sed. Dolor repudiandae ut eligendi est earum enim. Excepturi sequi ut dicta itaque suscipit sed itaque maxime.', NULL, NULL, NULL);

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
(1, 1, 2, 'Ipsa pariatur libero nihil vitae itaque iure.', 'Et est quos nesciunt expedita soluta perspiciatis. Magnam et accusamus sed accusantium et. Ut voluptatibus ex laboriosam.', 'Sequi et sed est distinctio. Itaque molestiae voluptatem autem quam sit ea dolorem eligendi. Ab suscipit eveniet qui consequatur autem blanditiis omnis. Quia facilis expedita saepe natus.', '2018-02-15', 'saepe.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(2, 5, 5, 'Tempora non nulla ducimus quae vel tempora.', 'Rerum quia nemo nostrum ex nostrum occaecati. Qui expedita temporibus voluptas neque et inventore voluptas quae. Ea consequuntur perferendis officiis qui aut amet impedit animi. Placeat asperiores laborum et.', 'Voluptatem qui est voluptas blanditiis minus. Quidem odio quibusdam adipisci vel amet. Repudiandae vel laudantium ex nostrum debitis distinctio praesentium. Necessitatibus dolor deserunt blanditiis cumque laborum cupiditate molestiae.', '1998-06-19', 'suscipit.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(3, 1, 1, 'Qui et ipsum qui ut maxime provident aut.', 'Minima tempora et qui ex. Quis cum autem excepturi sit aut velit. Assumenda tempore exercitationem iste ut. Nihil doloremque quidem ut. Blanditiis sunt minus aliquid neque.', 'Quasi sit impedit enim aut. Laborum eos odit vero doloribus atque. Temporibus natus animi impedit.', '1993-04-06', 'omnis.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(4, 3, 5, 'Mollitia iste hic mollitia numquam.', 'Eaque soluta ut corporis itaque voluptatem occaecati. Distinctio nihil ratione velit a hic nisi. Qui amet et qui tempora quia.', 'Voluptatum numquam commodi impedit ipsum consequuntur. Quisquam repellendus hic quos recusandae reprehenderit adipisci qui tempora. Aut et qui alias rerum.', '2020-07-16', 'et.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(5, 2, 3, 'Sequi fugit vitae sint unde alias dolor blanditiis.', 'Ducimus accusamus exercitationem quaerat libero harum optio. Quidem sequi cumque eaque dicta veritatis. Qui ut dolores dignissimos eaque ratione sapiente. Aut molestias exercitationem ex.', 'Magnam sed quia numquam quia. Qui provident consectetur expedita eveniet in.', '2010-04-23', 'expedita.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
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

INSERT INTO `resources` (`id`, `project_initiation_id`, `user_id`, `name`, `description`, `resource_type`, `quantity`, `cost`, `document`, `date_added`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'Luke Huber', '<p>Luke Huber</p>', 'Fugiat ea ut sequi a', 862, 92.00, '1699160992-Luke Huber.docx', '1974-11-26', '2023-11-04 23:13:57', '2023-11-04 23:09:52', '2023-11-04 23:13:57'),
(2, 3, 1, 'Keiko Becker', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia, molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam</p>', 'Incidunt consequat', 557, 80.00, '1699161275-Keiko Becker.docx', '2017-08-21', NULL, '2023-11-04 23:14:35', '2023-11-04 23:14:35');

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
(1, 'super_admin', 'web', '2023-11-04 22:49:18', '2023-11-04 22:49:18'),
(2, 'admin', 'web', '2023-11-04 22:49:18', '2023-11-04 22:49:18'),
(3, 'user', 'web', '2023-11-04 22:49:19', '2023-11-04 22:49:19'),
(4, 'vendor', 'web', '2023-11-04 22:49:19', '2023-11-04 22:49:19'),
(5, 'controller', 'web', '2023-11-04 22:49:19', '2023-11-04 22:49:19');

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

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone_no`, `TFA`, `last_login`, `isVerified`, `address`, `id_number`, `id_type`, `sq_no_1`, `sq_no_1_ans`, `sq_no_2`, `sq_no_2_ans`, `pro_pic`, `date_of_birth`, `verified_by`, `email_verified_at`, `password`, `user_type`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin', 'admin@example.com', '0123456789', '0', NULL, 1, '123 Main St, City', '123456789', 'NID', NULL, NULL, NULL, NULL, NULL, '1990-01-01', 1, NULL, '$2y$10$znOI.Dxl/fRDyuJ7f2WPgOqTe.oDSGyIHBfOFwBvZqNlJUkisDUvu', 'super_admin', NULL, NULL, '2023-11-04 22:49:19', '2023-11-04 22:49:19'),
(2, 'Prof. Carlo Gleason', 'corwin.josiane', 'emmerich.mallie@example.com', '+1-214-800-2113', '2', '2023-07-18 21:31:38', 0, '978 Alessia Creek\nJuanatown, OR 93799-0255', '50949654', 'Birth Certificate', 'Accusantium dicta sint occaecati.', NULL, NULL, NULL, 'voluptatibus.jpg', '2002-03-05', NULL, '2023-11-04 22:49:19', '$2y$10$1z.Kcgrp9/sZHEY5DU3L1uj2QkzWgW/p5we4CvuKiqahoWnlkdjN6', 'user', NULL, NULL, NULL, NULL),
(3, 'Mr. Jarret Hermann V', 'mohammed.metz', 'durgan.mac@example.net', '(678) 673-8500', '0', '2023-06-14 19:21:19', 0, '220 Nicolas Corners\nAlessandraside, MA 56312', '31298617', 'Birth Certificate', NULL, 'Qui pariatur inventore ullam nobis molestias velit.', NULL, NULL, 'et.jpg', '1984-08-04', NULL, '2023-11-04 22:49:19', '$2y$10$czp/HGbekC8M.iyKd75z0.8Da6LM1sRMCMv8UWEoCpDFXrwWo6pXm', 'user', NULL, NULL, NULL, NULL),
(4, 'Orval Funk', 'florida.abbott', 'leanne.skiles@example.com', '+1-574-573-9835', '1', '2023-01-05 10:28:23', 0, '1277 Roxanne Flat Suite 305\nLake Dionshire, TX 02195', '96455605', 'Passport', 'Voluptas eos voluptas nostrum eius exercitationem et.', NULL, NULL, NULL, 'quidem.jpg', '2016-09-08', NULL, '2023-11-04 22:49:19', '$2y$10$ZbQK8yOprYNPVi6Cnrewvu4glO0nkJfrIH6lT8pAd6Ua95tGGTwq6', 'user', NULL, NULL, NULL, NULL),
(5, 'Fabiola Gibson V', 'jane66', 'bettie01@example.com', '253.350.7373', '1', '2023-03-23 12:31:08', 0, '23189 Graham Mews\nDaytonstad, KS 87898', '9752024', 'Passport', 'Dicta omnis temporibus beatae esse error.', 'Et quo recusandae aut ea accusamus est maiores.', 'Unde perferendis ipsum error quos molestiae vitae neque corporis.', NULL, 'illum.jpg', '1999-10-21', NULL, '2023-11-04 22:49:20', '$2y$10$auHyg3lVMuTvszEEM5DrXexlDkU7bDIkfrL.LT5mFVYDhAm2J5G5m', 'user', NULL, NULL, NULL, NULL),
(6, 'Hershel Cummerata', 'zprohaska', 'orlando.davis@example.net', '(209) 598-8635', '1', '2023-08-31 14:18:01', 0, '3154 Karl Junction\nWintheiserfort, MT 51023-8732', '21962437', 'NID', NULL, NULL, NULL, 'Explicabo doloribus et ipsum eligendi vel in perferendis.', 'non.jpg', '1991-10-10', NULL, '2023-11-04 22:49:20', '$2y$10$Mbz2NjH09691TDKxzYRHo.kc.ePtmq4x3CO7nCmRjVAK9CqK/QDk2', 'user', NULL, NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
