-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2024 at 12:13 AM
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
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `user_id`, `designation`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Backend Developement', NULL, NULL, NULL, NULL, NULL),
(2, 'ForontEnd Development', NULL, NULL, NULL, NULL, NULL),
(3, 'Mobile Application', 4, NULL, NULL, NULL, NULL),
(4, 'UI/UX', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'project-manager', NULL, '2023-12-14 02:38:57', '2023-12-14 02:39:12'),
(7, 'team-leader', NULL, '2023-12-14 03:03:36', '2023-12-14 03:03:36'),
(8, 'senior-developer', NULL, '2023-12-14 03:03:51', '2023-12-14 03:03:51'),
(9, 'junior-developer', NULL, '2023-12-14 03:04:01', '2023-12-14 03:04:01'),
(10, 'team-member', NULL, '2023-12-14 03:04:19', '2023-12-14 03:04:19');

-- --------------------------------------------------------

--
-- Table structure for table `disburse_project_payments`
--

CREATE TABLE `disburse_project_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `project_submission_id` bigint UNSIGNED NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `isDisbursed` tinyint(1) NOT NULL DEFAULT '0',
  `send_by` bigint UNSIGNED DEFAULT NULL,
  `disbursed_by` bigint UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disburse_project_payments`
--

INSERT INTO `disburse_project_payments` (`id`, `project_initiation_id`, `project_submission_id`, `description`, `payment_status`, `isDisbursed`, `send_by`, `disbursed_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'disburse payment', 'disbursed', 1, 1, 1, NULL, '2023-11-23 02:18:28', '2023-11-23 03:10:25'),
(2, 1, 1, 'disburse payment', 'pending', 0, 5, NULL, NULL, '2023-12-07 01:37:53', '2023-12-07 01:37:53'),
(3, 9, 3, 'request for disbursing payment', 'disbursed', 1, 1, 1, NULL, '2024-01-03 05:59:23', '2024-01-03 06:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `vendor_id`, `keyword`, `document`, `created_at`, `updated_at`) VALUES
(2, 28, NULL, NULL, 'eHbIQJg92UvU-Saiful.jpg', '2023-12-07 00:21:16', '2023-12-07 00:21:16'),
(3, NULL, 1, NULL, 'qZ7lqwXJ1O8h-Hampton and Gutierrez Plc.jpg', '2024-01-08 07:55:35', '2024-01-08 07:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `generated_by` bigint UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `project_initiation_id`, `generated_by`, `amount`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '10.50', NULL, '2023-11-23 03:10:25', '2023-11-23 03:10:25'),
(2, 9, 1, '1000.00', NULL, '2024-01-03 06:02:12', '2024-01-03 06:02:12');

-- --------------------------------------------------------

--
-- Table structure for table `key_deliverables`
--

CREATE TABLE `key_deliverables` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `key_deliverables`
--

INSERT INTO `key_deliverables` (`id`, `user_id`, `project_initiation_id`, `subject`, `message`, `document`, `date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 'Et fugit perferendi', 'Animi non quo rerum', NULL, '1987-06-14', NULL, '2023-12-06 03:00:45', '2023-12-06 03:00:45'),
(2, 1, 6, 'Quo reprehenderit a', 'Sit aut et dolor vo', NULL, '1988-04-08', NULL, '2023-12-06 04:36:10', '2023-12-06 04:36:10'),
(3, 1, 9, 'message 1', 'message 1', NULL, '2007-10-15', NULL, '2024-01-03 05:42:36', '2024-01-03 05:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(17, '2023_11_07_184019_create_resource_management_table', 1),
(18, '2023_11_11_054913_create_time_durations_table', 1),
(19, '2023_11_11_060559_create_key_deliverables_table', 1),
(20, '2023_11_12_093315_create_tasks_table', 1),
(21, '2023_11_14_112346_create_designations_table', 1),
(22, '2023_11_21_095427_create_project_submissions_table', 1),
(24, '2023_11_23_050128_create_disburse_project_payments_table', 2),
(25, '2023_11_23_084633_create_invoices_table', 3),
(29, '2023_11_26_081527_create_sign_off_projects_table', 4),
(34, '2023_12_06_105139_create_monitoring_teams_table', 5),
(36, '2023_12_06_185054_create_project_notifications_table', 6),
(38, '2023_12_26_101635_create_team_member_logs_table', 7),
(39, '2024_01_07_192219_create_vendors_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(11, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 1),
(13, 'App\\Models\\User', 1),
(15, 'App\\Models\\User', 1),
(14, 'App\\Models\\User', 2),
(15, 'App\\Models\\User', 2),
(14, 'App\\Models\\User', 5),
(11, 'App\\Models\\User', 6),
(12, 'App\\Models\\User', 6),
(13, 'App\\Models\\User', 6),
(15, 'App\\Models\\User', 6),
(16, 'App\\Models\\User', 6),
(14, 'App\\Models\\User', 29),
(12, 'App\\Models\\User', 30),
(13, 'App\\Models\\User', 30),
(14, 'App\\Models\\User', 30);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1),
(8, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 2),
(9, 'App\\Models\\User', 2),
(8, 'App\\Models\\User', 5),
(9, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(9, 'App\\Models\\User', 6),
(6, 'App\\Models\\User', 27),
(8, 'App\\Models\\User', 29),
(9, 'App\\Models\\User', 29),
(7, 'App\\Models\\User', 30),
(9, 'App\\Models\\User', 30);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_teams`
--

CREATE TABLE `monitoring_teams` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monitoring_teams`
--

INSERT INTO `monitoring_teams` (`id`, `project_initiation_id`, `user_id`, `designation`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 1, 5, NULL, NULL, '2023-12-06 12:50:18', '2023-12-06 12:50:27'),
(18, 9, 1, NULL, NULL, '2024-01-03 06:04:43', '2024-01-03 06:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(11, 'project-status', 'web', '2023-12-14 04:50:32', '2023-12-14 04:50:32'),
(12, 'project-submission', 'web', '2023-12-14 04:50:41', '2023-12-14 04:50:41'),
(13, 'team-member-assign', 'web', '2023-12-14 04:50:53', '2023-12-14 04:50:53'),
(14, 'key-deliverable', 'web', '2023-12-14 04:51:01', '2023-12-14 04:51:01'),
(15, 'task-assign', 'web', '2023-12-14 04:51:10', '2023-12-14 04:51:10'),
(16, 'task-verifier', 'web', '2023-12-14 04:51:21', '2023-12-14 04:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Enim incidunt voluptas ea accusamus et.', 'Eligendi repellat nobis necessitatibus voluptatem. Rerum quidem illum odit qui et facere ut. Quibusdam aut ea dolores nulla. Autem doloremque cum et voluptas repellat eos quisquam dolores.', NULL, NULL, NULL),
(2, 'Rem quia sunt asperiores voluptatum accusantium vel.', 'Possimus molestias excepturi adipisci facere impedit repellat. Sed placeat sunt ut quia illo labore. Quod exercitationem neque consequuntur sit repellat sint. Animi consequatur et et dolor placeat.', NULL, NULL, NULL),
(3, 'Consequatur vitae quam praesentium mollitia enim vero autem.', 'Laborum nihil eum eos rerum aut nam necessitatibus molestiae. Quo natus aperiam molestias ab dolore perferendis. Nulla dicta nobis assumenda et aut esse doloremque.', NULL, NULL, NULL),
(4, 'Consequatur placeat necessitatibus voluptatibus.', 'Velit qui voluptatum et et officia. Consequatur minima nesciunt aut quisquam fugit maiores. Molestias et hic omnis minus nihil.', NULL, NULL, NULL),
(5, 'Voluptatibus et laboriosam omnis corporis.', 'Sit exercitationem quas impedit dolor velit et non perferendis. Fugiat sit rem unde sint. Quaerat voluptatem ut dolorem sed. Reiciendis et blanditiis quos blanditiis qui quo.', NULL, NULL, NULL),
(6, 'Web Development', 'Web Development', '2023-12-07 00:26:52', '2023-12-07 00:26:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_documents`
--

CREATE TABLE `project_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `project_category_id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_documents`
--

INSERT INTO `project_documents` (`id`, `project_category_id`, `project_initiation_id`, `keyword`, `document`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 6, 'etin', '5U0ionMyUtNg-etin.jpg', '2023-12-06 03:09:08', '2024-01-03 23:11:23', '2024-01-03 23:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_initiations`
--

CREATE TABLE `project_initiations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deadline` date DEFAULT NULL,
  `required_file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activated_by` bigint UNSIGNED DEFAULT NULL,
  `inactivated_by` bigint UNSIGNED DEFAULT NULL,
  `assigned_to` bigint UNSIGNED DEFAULT NULL,
  `assigned_by` bigint UNSIGNED DEFAULT NULL,
  `verified_by` bigint UNSIGNED DEFAULT NULL,
  `unverified_by` bigint UNSIGNED DEFAULT NULL,
  `project_unique_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_initiations`
--

INSERT INTO `project_initiations` (`id`, `user_id`, `project_category_id`, `name`, `description`, `goal`, `deadline`, `required_file`, `activated_by`, `inactivated_by`, `assigned_to`, `assigned_by`, `verified_by`, `unverified_by`, `project_unique_id`, `isVerified`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Reprehenderit et tempore autem aut tenetur quis perferendis natus.', 'Labore in incidunt quos. Perspiciatis reiciendis consectetur modi et nihil eaque nobis porro. Est ut ut dolorum itaque molestiae.', 'Qui eum rerum qui. Velit aspernatur enim omnis officia enim. Aperiam labore adipisci reprehenderit aut. Nihil earum ratione voluptatem sint est.', '2014-10-24', 'at.pdf', 1, NULL, NULL, 1, 1, NULL, NULL, 1, 'active', NULL, '2023-12-17 04:14:19', '2023-12-17 04:14:19'),
(2, 1, 3, 'Soluta culpa officiis dolor ut.', 'Ea a perspiciatis ratione recusandae sint cupiditate aperiam. Quo porro quia et rem rem harum. Non nobis facilis repudiandae.', 'Sequi aut illo tenetur et ea sit. Consequuntur eum voluptatem ullam eius et cupiditate blanditiis. Consequatur atque labore culpa corrupti facere modi. Sint sapiente voluptates in esse adipisci similique. Nobis ut est hic blanditiis asperiores.', '2017-03-26', 'reprehenderit.pdf', 1, NULL, NULL, 1, 1, NULL, NULL, 1, 'active', NULL, '2024-01-03 23:11:47', '2024-01-03 23:11:47'),
(3, 5, 3, 'Omnis at iusto nostrum numquam sunt voluptatum est.', 'Delectus ut aspernatur dolorem itaque. Nihil consequuntur iusto placeat eos architecto. Similique occaecati accusantium nobis molestiae dolorum quia.', 'Sit id quis non ullam et molestiae fuga. Vel ut aut provident ipsam. Nesciunt odit corporis quisquam laborum et. Voluptas aut consequatur officiis odit amet.', '1977-12-12', 'aut.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, '2024-01-03 23:11:42', '2024-01-03 23:11:42'),
(4, 2, 1, 'Tempore assumenda fuga porro quidem sunt quidem fuga.', 'Sit nihil delectus natus. Dignissimos et magni sint consequatur. Aliquam excepturi ab repellat atque ratione veniam ipsam neque.', 'Libero ad omnis doloremque rerum qui rerum. In in qui sunt autem vel.', '2023-04-17', 'dignissimos.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, '2024-01-03 23:11:37', '2024-01-03 23:11:37'),
(5, 2, 1, 'Temporibus sit dignissimos eum praesentium tenetur earum possimus aut.', 'Et voluptas adipisci ea beatae aspernatur quae facere. Laborum non consequatur minima qui suscipit sint. Laudantium error mollitia natus eum qui.', 'Est aliquam eum voluptatibus est eveniet occaecati odio reiciendis. Omnis magni dignissimos nemo dolore deserunt repellendus. Aspernatur facilis natus laboriosam dolores natus. Saepe repellendus non voluptas dolorem eligendi quaerat soluta voluptatem.', '1980-04-10', 'similique.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, '2024-01-03 23:11:32', '2024-01-03 23:11:32'),
(6, 1, 1, 'demo', '<p>demo</p>', '<p>demo</p>', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '6570346cf370b202312684428', 1, 'active', '2023-12-06 02:44:28', '2024-01-03 23:11:23', '2024-01-03 23:11:23'),
(7, 1, 6, 'IT Management', '<p>IT Management</p>', '<p>IT Management</p>', NULL, '1701930462-IT Management.jpg', NULL, NULL, NULL, NULL, 1, NULL, '657165de431dd202312762742', 1, 'inactive', '2023-12-07 00:27:42', '2024-01-03 23:47:03', '2024-01-03 23:47:03'),
(8, 5, 6, 'E Commerce Website', '<p>E Commerce Website</p>', '<p>E Commerce Website</p>', NULL, '1701931140-E Commerce Website.jpg', 5, NULL, NULL, 1, 5, NULL, '65716884cf73e20231276390', 1, 'active', '2023-12-07 00:39:00', '2024-01-03 23:47:07', '2024-01-03 23:47:07'),
(9, 1, 6, 'BTRH Project', 'Description', 'Goal', NULL, '1704280651-BTRH Project.jpg', 1, NULL, NULL, 1, 1, NULL, '6595424bad05f202413111731', 1, 'active', '2024-01-03 05:17:31', '2024-01-03 23:47:11', '2024-01-03 23:47:11'),
(10, 1, 6, 'BTRH Project', '<p>BTRH Project</p>', '<p>BTRH Project</p>', NULL, NULL, 1, NULL, NULL, 1, 1, NULL, '659646d95da0420241454913', 1, 'active', '2024-01-03 23:49:13', '2024-01-03 23:49:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_initiation_overviews`
--

CREATE TABLE `project_initiation_overviews` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_initiation_overviews`
--

INSERT INTO `project_initiation_overviews` (`id`, `project_initiation_id`, `user_id`, `designation`, `comment`, `assigned_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'team leader', NULL, 1, '2023-12-17 04:14:19', '2023-11-22 04:47:37', '2023-12-17 04:14:19'),
(2, 1, 2, 'senior developer', NULL, 1, '2023-12-17 04:14:19', '2023-11-22 04:47:37', '2023-12-17 04:14:19'),
(3, 1, 6, 'junior developer', NULL, 1, '2023-12-17 04:14:19', '2023-11-22 04:47:37', '2023-12-17 04:14:19'),
(4, 6, 1, NULL, NULL, 1, '2024-01-03 23:11:23', '2023-12-06 03:03:13', '2024-01-03 23:11:23'),
(5, 6, 2, NULL, NULL, 1, '2024-01-03 23:11:23', '2023-12-06 03:03:13', '2024-01-03 23:11:23'),
(6, 6, 6, NULL, NULL, 1, '2023-12-07 01:09:28', '2023-12-06 03:03:13', '2023-12-07 01:09:28'),
(7, 2, 1, 'project-manager', NULL, 1, '2024-01-03 23:11:47', '2023-12-14 03:23:21', '2024-01-03 23:11:47'),
(8, 2, 2, 'team-leader', NULL, 1, '2024-01-03 23:11:47', '2023-12-14 03:23:21', '2024-01-03 23:11:47'),
(9, 2, 5, 'junior-developer', NULL, 1, '2024-01-03 23:11:47', '2023-12-14 03:23:21', '2024-01-03 23:11:47'),
(10, 8, 1, NULL, NULL, 1, '2024-01-03 23:47:07', '2023-12-26 02:32:21', '2024-01-03 23:47:07'),
(11, 8, 6, NULL, NULL, 1, '2023-12-26 05:08:04', '2023-12-26 02:32:21', '2023-12-26 05:08:04'),
(12, 8, 11, NULL, NULL, 1, '2023-12-26 05:07:55', '2023-12-26 02:32:21', '2023-12-26 05:07:55'),
(13, 8, 22, NULL, NULL, 1, '2023-12-26 05:06:52', '2023-12-26 02:32:21', '2023-12-26 05:06:52'),
(14, 8, 26, NULL, NULL, 1, '2023-12-26 05:04:09', '2023-12-26 02:32:21', '2023-12-26 05:04:09'),
(15, 8, 29, NULL, NULL, 1, '2023-12-26 05:08:19', '2023-12-26 02:32:21', '2023-12-26 05:08:19'),
(16, 8, 29, NULL, NULL, 1, '2024-01-03 23:47:07', '2023-12-26 05:22:58', '2024-01-03 23:47:07'),
(17, 9, 1, NULL, NULL, 1, '2024-01-03 23:47:11', '2024-01-03 05:22:31', '2024-01-03 23:47:11'),
(18, 9, 2, NULL, NULL, 1, '2024-01-03 23:36:57', '2024-01-03 05:22:31', '2024-01-03 23:36:57'),
(19, 9, 5, NULL, NULL, 1, '2024-01-03 23:36:19', '2024-01-03 05:22:31', '2024-01-03 23:36:19'),
(20, 9, 6, NULL, NULL, 1, '2024-01-03 23:36:10', '2024-01-03 05:22:31', '2024-01-03 23:36:10'),
(21, 9, 30, NULL, NULL, 1, '2024-01-03 23:35:57', '2024-01-03 05:31:10', '2024-01-03 23:35:57'),
(22, 9, 30, NULL, NULL, 1, '2024-01-03 23:42:52', '2024-01-03 23:37:13', '2024-01-03 23:42:52'),
(23, 9, 30, NULL, NULL, 1, '2024-01-03 23:46:25', '2024-01-03 23:43:01', '2024-01-03 23:46:25'),
(24, 9, 30, NULL, NULL, 1, '2024-01-03 23:47:11', '2024-01-03 23:46:33', '2024-01-03 23:47:11'),
(25, 10, 30, NULL, NULL, 1, NULL, '2024-01-03 23:49:50', '2024-01-03 23:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `project_notifications`
--

CREATE TABLE `project_notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_submission_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_notifications`
--

INSERT INTO `project_notifications` (`id`, `user_id`, `project_submission_id`, `subject`, `message`, `document`, `date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Possimus molestias', 'Nulla ipsam dolorum', '1701891223-Possimus molestias.jpg', '1976-01-17', '2023-12-06 13:55:57', '2023-12-06 13:33:43', '2023-12-06 13:55:57'),
(2, 1, 1, 'Fugiat ipsa do debi', 'In dolores corporis', NULL, '1995-09-05', NULL, '2023-12-06 13:52:51', '2023-12-06 13:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `project_submissions`
--

CREATE TABLE `project_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `project_submitted_by` bigint UNSIGNED NOT NULL,
  `project_approved_by` bigint UNSIGNED NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_submissions`
--

INSERT INTO `project_submissions` (`id`, `project_initiation_id`, `project_submitted_by`, `project_approved_by`, `description`, `comment`, `file`, `link`, `status`, `isApproved`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Ut est laboriosam n', 'Dolore quia nulla ex', NULL, 'Doloribus repellendu', 'completed', 1, NULL, '2023-11-22 05:01:05', '2023-11-22 05:01:22'),
(2, 6, 1, 1, 'Ea natus deserunt do', 'Quo iure fuga Ipsum', '1701858343-c0e90666-d383-4476-8307-8107b07d7953.jpg', 'Cupiditate eos tempo', 'active', 0, NULL, '2023-12-06 04:25:43', '2023-12-06 04:25:43'),
(3, 9, 1, 1, 'project submission', 'project submission', '1704282800-84074720-58c7-4f1e-aeb3-539e5a72b19b.jpg', 'http://127.0.0.1:8000/admin/project_initiation/info/9', 'completed', 1, NULL, '2024-01-03 05:53:20', '2024-01-03 05:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` bigint UNSIGNED NOT NULL,
  `added_by` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `resource_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_added` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `added_by`, `name`, `description`, `resource_type`, `quantity`, `cost`, `document`, `date_added`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Miss Lauryn Barton', 'Quia sit cumque eaque consequatur eaque ut enim veritatis.', 'adipisci', 15, '360.41', 'quisquam.pdf', '2022-03-27', NULL, NULL, NULL),
(2, 1, 'Dr. Morgan Turner', 'Nemo magnam laudantium quo iusto aut.', 'est', 63, '115.51', 'ut.pdf', '2000-04-05', NULL, NULL, NULL),
(3, 1, 'Norris Armstrong', 'Alias est minima ut excepturi molestias temporibus.', 'adipisci', 53, '213.16', 'hic.pdf', '2003-09-25', NULL, NULL, NULL),
(4, 1, 'Dr. Dale Gislason V', 'Magni est delectus sit a totam.', 'non', 7, '556.17', 'est.pdf', '1980-01-23', NULL, NULL, NULL),
(5, 1, 'Dr. Keith Schoen', 'Facilis dolore deserunt laudantium commodi quo.', 'ex', 38, '200.48', 'totam.pdf', '1996-09-25', NULL, NULL, NULL);

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2023-11-22 04:43:34', '2023-11-22 04:43:34'),
(2, 'admin', 'web', '2023-11-22 04:43:34', '2023-11-22 04:43:34'),
(6, 'stuff', 'web', '2023-12-06 02:04:42', '2023-12-06 02:04:42'),
(7, 'team_lead', 'web', '2023-12-06 02:04:56', '2023-12-06 02:04:56'),
(8, 'team_members', 'web', '2023-12-06 02:05:08', '2023-12-06 02:05:08'),
(9, 'user', 'web', '2023-12-07 00:15:18', '2023-12-07 00:15:18');

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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `sign_off_projects`
--

CREATE TABLE `sign_off_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `project_signoff_by` bigint UNSIGNED DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sign_off_projects`
--

INSERT INTO `sign_off_projects` (`id`, `project_initiation_id`, `project_signoff_by`, `description`, `file`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 1, 1, 'At commodi totam con', '1700996059-656323db47b73.jpg', 'closed', NULL, '2023-11-26 04:54:19', '2023-11-26 04:54:19'),
(6, 9, 1, 'sign off project', '1704283384-65954cf851527.jpg', 'closed', NULL, '2024-01-03 06:03:04', '2024-01-03 06:03:04');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
(4, 'canceled', NULL, NULL, NULL),
(5, 'completed', NULL, NULL, NULL),
(6, 'approved', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `assigned_to` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `task` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `assigned_by`, `assigned_to`, `project_initiation_id`, `task`, `document`, `deadline`, `status`, `isApproved`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Cum officiis quis en', NULL, '1975-07-26', 'completed', 1, NULL, '2023-11-22 05:00:12', '2023-11-22 05:00:47'),
(2, 1, 1, 6, 'Dolore minima volupt', NULL, '1984-02-12', 'canceled', 0, '2023-12-06 03:41:55', '2023-12-06 03:41:25', '2023-12-06 03:41:55'),
(3, 1, 1, 6, 'Lorem rem fugit est', '1701855751-d4040beb-db74-4b2e-8596-d32dd8673e65.jpg', '1997-07-12', 'active', 0, NULL, '2023-12-06 03:42:31', '2023-12-06 03:42:31'),
(4, 5, 2, 6, 'Optio consectetur', NULL, '2011-05-21', 'active', 0, NULL, '2023-12-07 01:11:25', '2023-12-07 01:11:25'),
(5, 1, 30, 9, 'task 1', NULL, '2024-01-06', 'completed', 0, NULL, '2024-01-03 05:44:56', '2024-01-03 05:49:15'),
(6, 1, 30, 10, 'Dolor tempore ut fu', NULL, '2005-10-26', 'active', 0, NULL, '2024-01-03 23:52:31', '2024-01-03 23:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `team_member_logs`
--

CREATE TABLE `team_member_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `removed_by` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_member_logs`
--

INSERT INTO `team_member_logs` (`id`, `user_id`, `removed_by`, `project_initiation_id`, `designation`, `reason`, `created_at`, `updated_at`) VALUES
(1, 14, 1, 8, NULL, 'Tempore delectus r', '2023-12-26 05:04:09', '2023-12-26 05:04:09'),
(2, 22, 1, 8, NULL, 'Aut similique perfer', '2023-12-26 05:06:52', '2023-12-26 05:06:52'),
(3, 11, 1, 8, NULL, 'Et debitis est et vo', '2023-12-26 05:07:55', '2023-12-26 05:07:55'),
(4, 6, 1, 8, NULL, 'Inventore fugiat de', '2023-12-26 05:08:04', '2023-12-26 05:08:04'),
(6, 30, 1, 9, NULL, 'Dicta voluptates vol', '2024-01-03 23:35:57', '2024-01-03 23:35:57'),
(7, 6, 1, 9, NULL, 'Incididunt at irure', '2024-01-03 23:36:10', '2024-01-03 23:36:10'),
(8, 5, 1, 9, NULL, 'Ad laudantium et qu', '2024-01-03 23:36:19', '2024-01-03 23:36:19'),
(9, 2, 1, 9, NULL, 'Delectus perferendi', '2024-01-03 23:36:57', '2024-01-03 23:36:57'),
(10, 30, 1, 9, NULL, 'Accusantium dolorem', '2024-01-03 23:42:52', '2024-01-03 23:42:52'),
(11, 30, 1, 9, NULL, 'Animi in non est do', '2024-01-03 23:46:25', '2024-01-03 23:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `time_durations`
--

CREATE TABLE `time_durations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `starting_date` date NOT NULL,
  `ending_date` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_durations`
--

INSERT INTO `time_durations` (`id`, `user_id`, `project_initiation_id`, `starting_date`, `ending_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1974-02-08', '1993-02-02', NULL, '2023-11-22 04:45:46', '2023-11-22 04:46:07'),
(2, 1, 6, '2007-02-21', '2015-06-26', NULL, '2023-12-06 02:59:14', '2023-12-06 02:59:14'),
(3, 1, 2, '2003-07-18', '1990-06-02', NULL, '2023-12-14 03:19:10', '2023-12-14 03:19:10'),
(4, 1, 8, '2014-04-28', '1973-01-06', NULL, '2023-12-26 02:31:46', '2023-12-26 02:31:46'),
(5, 1, 9, '2023-03-25', '2024-02-20', NULL, '2024-01-03 05:25:53', '2024-01-03 05:25:53'),
(6, 1, 10, '2022-07-24', '1984-05-25', NULL, '2024-01-03 23:49:40', '2024-01-03 23:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `TFA` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `last_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT '0',
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sq_no_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sq_no_1_ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sq_no_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sq_no_2_ans` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_pic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `verified_by` bigint UNSIGNED DEFAULT NULL,
  `unverified_by` bigint UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone_no`, `TFA`, `last_login`, `isVerified`, `address`, `id_number`, `id_type`, `sq_no_1`, `sq_no_1_ans`, `sq_no_2`, `sq_no_2_ans`, `pro_pic`, `date_of_birth`, `verified_by`, `unverified_by`, `email_verified_at`, `password`, `user_type`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin', 'admin@example.com', '0123456789', '0', NULL, 1, '123 Main St, City', '123456789', 'NID', NULL, NULL, NULL, NULL, NULL, '1990-01-01', 1, NULL, NULL, '$2y$10$rXdyEqdvz9J8iVCiXiHGVOArqIyy/49GSUfC4Z44QbwhtdVfozSq.', 'user', NULL, NULL, '2023-11-22 04:43:34', '2023-11-22 04:43:34'),
(2, 'Sammy Pagac', 'hettinger.augustus', 'zjenkins@example.net', '+1 (323) 428-0710', '0', '2023-06-03 01:35:24', 1, '5000 Ethan Via Apt. 778\nDurganland, ND 04538-3224', '24373979', 'Birth Certificate', NULL, NULL, NULL, NULL, 'et.jpg', '1998-01-21', NULL, NULL, '2023-11-22 04:43:34', '$2y$10$/x3yLawTxv1RjMemgJn61.eVnl6tOZp5qBWhcK/Zvgg.Auv89kKiu', 'user', NULL, NULL, '2023-11-22 04:43:34', '2023-11-22 04:43:34'),
(3, 'Ms. Reba Romaguera DVM', 'torrey.schneider', 'darrel.bogisich@example.org', '(678) 319-1521', '2', '2023-08-14 17:10:15', 0, '5789 Bailey Lock\nNew Vincenzoville, AL 44628', '76740952', 'Passport', NULL, NULL, NULL, NULL, 'culpa.jpg', '1971-10-08', NULL, NULL, '2023-11-22 04:43:35', '$2y$10$vLsO799nHpnkP7O.PfpUe.4SsREUY0EqGXndFxyff2n61jJCJNy/2', 'vendor', NULL, NULL, '2023-11-22 04:43:35', '2023-11-22 04:43:35'),
(4, 'Kelli Macejkovic IV', 'alanna.stamm', 'cruickshank.lucile@example.net', '510.426.9024', '0', '2023-01-20 02:59:10', 0, '61216 Bergstrom Lodge Apt. 474\nCleorafort, IL 12742', '71575108', 'NID', NULL, NULL, NULL, NULL, 'minima.jpg', '2014-11-08', NULL, NULL, '2023-11-22 04:43:35', '$2y$10$km.egrSJNGaQAjzt96LOFegM8.E4XQUZtzqMbjtJNv1CWK2SgBCSq', 'vendor', NULL, NULL, '2023-11-22 04:43:35', '2023-11-22 04:43:35'),
(5, 'Arvid Mueller', 'qnicolas', 'dashawn18@example.com', '564.812.9460', '0', '2023-02-26 07:05:23', 1, '4773 Catharine Shoal Apt. 380\nWisozktown, UT 73877-7336', '13514796', 'Birth Certificate', NULL, NULL, NULL, NULL, 'veniam.jpg', '2007-05-22', 1, NULL, '2023-11-22 04:43:35', '$2y$10$zvOKSwszfzWex3anmPpy2.DoYhEWvaWfQZ4deyXzMQc2uJMBi54kC', 'user', NULL, NULL, '2023-11-22 04:43:35', '2023-12-07 00:37:41'),
(6, 'Prof. Mazie Leannon', 'charley58', 'marvin.travis@example.net', '1-737-321-8100', '0', '2023-10-23 15:03:21', 1, '22447 Wilkinson Stream Suite 340\nLowellbury, DE 10760', '34034394', 'Passport', NULL, NULL, NULL, NULL, 'soluta.jpg', '1986-09-29', NULL, NULL, '2023-11-22 04:43:36', '$2y$10$lsz3aqif/cx61f301DFZEemwgCndYWaZVvNQVMtUmnuFhrKiY4Kq2', 'user', NULL, NULL, '2023-11-22 04:43:36', '2023-11-22 04:43:36'),
(7, 'Dr. Mohamed Padberg III', 'jessyca73', 'jabbott@example.net', '1-586-498-7914', '0', '2023-11-17 12:28:19', 1, '479 Rubye Knolls Suite 183\nNorth Madalyn, MT 65204-6511', '76736319', 'Birth Certificate', NULL, NULL, NULL, NULL, 'culpa.jpg', '2009-09-23', NULL, NULL, '2023-11-22 04:43:36', '$2y$10$zVWhrxVmTGyGRLhaRmWV1OqRX6C8zhpReCMYThv.f3QAyKRG33an6', 'vendor', NULL, NULL, '2023-11-22 04:43:36', '2023-11-22 04:43:36'),
(8, 'Prof. Ervin Smith Jr.', 'luigi.lynch', 'elyssa.reinger@example.com', '864.502.1445', '1', '2023-10-23 14:05:40', 0, '7551 Wyman Viaduct\nCasperton, MD 13572-3184', '74690359', 'Passport', NULL, NULL, NULL, NULL, 'quos.jpg', '1995-02-06', NULL, NULL, '2023-11-22 04:43:36', '$2y$10$C9sok8V6up4gbiNp1oDb9e6Y46kMGk9kG0h9eLexi6QQ9SU0JKVUW', 'user', NULL, NULL, '2023-11-22 04:43:36', '2023-11-22 04:43:36'),
(9, 'Glennie Anderson', 'karolann72', 'lucas.leuschke@example.net', '(682) 204-2245', '2', '2023-02-26 13:01:38', 0, '224 Summer Green\nNorth Joshuah, IL 45880', '11337940', 'NID', NULL, NULL, NULL, NULL, 'veritatis.jpg', '2023-08-21', NULL, NULL, '2023-11-22 04:43:36', '$2y$10$POQOk7FsqENhdUCTLf117e5PB0jhLxFMXmeTnpQ08wOZkVcImZE1W', 'user', NULL, NULL, '2023-11-22 04:43:37', '2023-11-22 04:43:37'),
(10, 'Josh Murazik', 'cpagac', 'darrell.cruickshank@example.org', '520.468.3189', '0', '2023-08-31 19:48:58', 1, '3435 Kreiger Wells Suite 594\nProsaccoborough, VT 64102-4977', '47110710', 'Birth Certificate', NULL, NULL, NULL, NULL, 'quia.jpg', '1988-09-02', NULL, NULL, '2023-11-22 04:43:37', '$2y$10$vwZAknaxx.4EvYJNy7ckDOpRFZHhZpctrFkBv03gV6hXsiLiFTJo6', 'vendor', NULL, NULL, '2023-11-22 04:43:37', '2023-11-22 04:43:37'),
(11, 'Prof. Justyn Bruen', 'swift.kelvin', 'jaydon.hamill@example.com', '+1-702-918-7481', '0', '2023-01-07 02:45:32', 1, '194 Roob Ridge Suite 349\nMadysonshire, LA 69930-1317', '82676741', 'Passport', NULL, NULL, NULL, NULL, 'id.jpg', '1990-08-09', NULL, NULL, '2023-11-22 04:43:37', '$2y$10$DnUfZX/iAzp.t62U/yY3BuYln58MYntk9M97UgBqSwR8Mjh0MHdX.', 'user', NULL, NULL, '2023-11-22 04:43:37', '2023-11-22 04:43:37'),
(12, 'Cleveland Reinger', 'bernadine06', 'deborah31@example.com', '+13042483391', '1', '2023-04-16 21:05:01', 0, '2452 Annetta Junction Suite 451\nRyanfort, VT 23833-8861', '61084427', 'Birth Certificate', NULL, NULL, NULL, NULL, 'sit.jpg', '2011-12-24', NULL, NULL, '2023-11-22 04:43:37', '$2y$10$p9L5swGWT55EWmRNK2eCYuzdzPekX.lx/B2suQS73cLaJWpS15WwG', 'user', NULL, NULL, '2023-11-22 04:43:38', '2023-11-22 04:43:38'),
(13, 'Liana Kemmer', 'veichmann', 'agaylord@example.net', '+1-401-868-2469', '0', '2023-08-14 06:37:42', 1, '4450 Lorena Estate\nIgnacioville, TX 84275', '96540810', 'Passport', NULL, NULL, NULL, NULL, 'reiciendis.jpg', '1990-05-05', NULL, NULL, '2023-11-22 04:43:38', '$2y$10$7AW/yjCDUl/H3E.l1nKGyOJCkXUY6J7jBq/Vaf29pr5v2apqgH0E2', 'vendor', NULL, NULL, '2023-11-22 04:43:38', '2023-11-22 04:43:38'),
(14, 'Dr. Cecilia Johnston', 'johanna54', 'conroy.blanche@example.net', '+1-704-675-5633', '0', '2023-07-02 08:40:42', 0, '9691 Norwood Shore\nDannyville, CO 42518-3967', '78948875', 'Birth Certificate', NULL, NULL, NULL, NULL, 'quia.jpg', '1999-10-29', NULL, NULL, '2023-11-22 04:43:38', '$2y$10$mJVgMgxVqzGVdJSN.fO.q.qmZzqgiiKiosgMqn3IpyXdL8ATDfkCO', 'vendor', NULL, NULL, '2023-11-22 04:43:38', '2023-11-22 04:43:38'),
(15, 'Ole Barton', 'tommie.wolff', 'lisandro71@example.com', '938-286-4046', '0', '2023-04-24 00:51:32', 0, '679 Yvette Road\nCharleyfurt, SC 95717-4670', '35000076', 'Passport', NULL, NULL, NULL, NULL, 'enim.jpg', '1983-07-02', NULL, NULL, '2023-11-22 04:43:38', '$2y$10$1uCyoQoiRr6rpOEPbWmmCearc8faa3pNRL2.blb/bO.y6RQqDBpCy', 'vendor', NULL, NULL, '2023-11-22 04:43:38', '2023-11-22 04:43:38'),
(16, 'Carroll Farrell', 'juliana14', 'tressa.abshire@example.org', '(878) 612-3118', '0', '2023-10-24 17:04:08', 1, '661 O\'Hara Forge Suite 310\nLoyton, OH 86740', '47685349', 'NID', NULL, NULL, NULL, NULL, 'laudantium.jpg', '1998-06-28', NULL, NULL, '2023-11-22 04:43:38', '$2y$10$HGTSmQ2IVZ5ebuNdNOxWveDNVj1m3EPiy0k0K9r1AVJyjbDRg1aZ2', 'vendor', NULL, NULL, '2023-11-22 04:43:39', '2023-11-22 04:43:39'),
(17, 'Danyka Schroeder DVM', 'denesik.breanne', 'frederic46@example.org', '(586) 246-6946', '2', '2023-10-14 09:29:27', 1, '6290 Chadrick Mills\nBeershire, VA 66290-2178', '52457853', 'Birth Certificate', NULL, NULL, NULL, NULL, 'nihil.jpg', '1974-06-03', NULL, NULL, '2023-11-22 04:43:39', '$2y$10$naT7SAGhwOjVE7W1wXFRnuJQEIlHrOJyOLANB4rHcwhVSMcnDc8QK', 'vendor', NULL, NULL, '2023-11-22 04:43:39', '2023-11-22 04:43:39'),
(18, 'Dr. Alfred Thompson', 'laney06', 'nelda.koepp@example.com', '+19857037342', '0', '2023-07-30 20:54:05', 1, '37543 Raynor Junctions\nPercyfort, WI 16711-0031', '46301343', 'Passport', NULL, NULL, NULL, NULL, 'et.jpg', '2012-05-14', NULL, NULL, '2023-11-22 04:43:39', '$2y$10$FfNla3lxMHmMXD/W87y3guwIL8win4wk202947TkJ2KheLv3jNrjG', 'vendor', NULL, NULL, '2023-11-22 04:43:39', '2023-11-22 04:43:39'),
(19, 'Mrs. Creola Terry V', 'ykeebler', 'lcrist@example.net', '1-669-569-0284', '0', '2023-01-02 03:47:12', 1, '5809 Cartwright Well\nWest Ceciliastad, SC 71524-2044', '17562981', 'Passport', NULL, NULL, NULL, NULL, 'laboriosam.jpg', '1992-07-03', NULL, NULL, '2023-11-22 04:43:39', '$2y$10$xNkJNUPwAjl6Gq2pILAtgObi3DR/K2YJpWSQtaNl2swL0FySG/W2K', 'vendor', NULL, NULL, '2023-11-22 04:43:40', '2023-11-22 04:43:40'),
(20, 'Dr. Gayle Reinger', 'dooley.brook', 'triston.davis@example.com', '574-357-5052', '2', '2023-03-27 23:16:53', 0, '23768 Gerda Highway Apt. 727\nWest Kris, ID 20489', '63276431', 'Birth Certificate', NULL, NULL, NULL, NULL, 'temporibus.jpg', '1997-03-21', NULL, NULL, '2023-11-22 04:43:40', '$2y$10$tDHOcPUKCNxsmV4QJSieMO9c/woS8WlsKwejuncv4YmcIN8jmErii', 'vendor', NULL, NULL, '2023-11-22 04:43:40', '2023-11-22 04:43:40'),
(21, 'Mr. Braulio Kohler IV', 'bechtelar.abdiel', 'murazik.krystel@example.com', '+1-719-765-3543', '2', '2023-01-20 19:37:02', 0, '143 Tyra Valley Suite 668\nWest Cynthiaburgh, TX 67534-4440', '94640296', 'NID', NULL, NULL, NULL, NULL, 'modi.jpg', '1988-12-16', NULL, NULL, '2023-11-22 04:43:40', '$2y$10$QvYId5aKnPAvbh71wbh3HeHHngMufiBi4YSJzeOkj8BCrWaOF/AGO', 'user', NULL, NULL, '2023-11-22 04:43:40', '2023-11-22 04:43:40'),
(22, 'Juana Bode', 'kenton14', 'valerie.kuphal@example.com', '1-858-290-1513', '2', '2023-11-08 01:26:56', 1, '730 Vito Point\nSouth Deondreburgh, MN 57108', '76930158', 'Passport', NULL, NULL, NULL, NULL, 'iusto.jpg', '1979-09-06', NULL, NULL, '2023-11-22 04:43:40', '$2y$10$AMY/u7/eUotbPDN1rW7S0O9BwQ6pqP30oc8gruj/HnnxZSNEYT6ZC', 'user', NULL, NULL, '2023-11-22 04:43:40', '2023-11-22 04:43:40'),
(23, 'Dr. Rubie Durgan IV', 'vpacocha', 'fmayer@example.org', '623.681.9500', '0', '2023-05-24 00:31:03', 0, '5864 Lloyd Mews\nNorth Meredithtown, NM 79438-4580', '25384210', 'Passport', NULL, NULL, NULL, NULL, 'iste.jpg', '1997-05-08', NULL, NULL, '2023-11-22 04:43:40', '$2y$10$Q5olStsxYdcYAh0dDoZIT.9hGMn82rvxZ7CL5XCq/OmMZPIvx/Zzm', 'user', NULL, NULL, '2023-11-22 04:43:41', '2023-11-22 04:43:41'),
(24, 'Providenci Spinka', 'deron.cruickshank', 'echristiansen@example.net', '+14236627806', '1', '2023-04-20 02:51:53', 1, '36478 Fredrick Spring\nWilkinsonhaven, SD 61015-7559', '24938652', 'Birth Certificate', NULL, NULL, NULL, NULL, 'dolorem.jpg', '1986-11-19', NULL, NULL, '2023-11-22 04:43:41', '$2y$10$niwuDlK8NimQg2xImcs8eOKsTa3rV7i0aw8jrJP08CnbwwR9UMvX6', 'vendor', NULL, NULL, '2023-11-22 04:43:41', '2023-11-22 04:43:41'),
(25, 'Brad Wiza', 'kozey.jessie', 'abraham28@example.org', '+1.313.377.2900', '2', '2023-08-23 06:52:27', 1, '612 Alexane Viaduct Apt. 705\nPort Aurelia, OK 64488', '77810449', 'Birth Certificate', NULL, NULL, NULL, NULL, 'asperiores.jpg', '1979-12-22', NULL, NULL, '2023-11-22 04:43:41', '$2y$10$tz8Dp4UqCIRLGpiHKtmO6uREiBNjNgxFbShdAeU/SYz8/pmpqji9e', 'vendor', NULL, NULL, '2023-11-22 04:43:41', '2023-11-22 04:43:41'),
(26, 'Mellie Witting', 'hills.audie', 'tillman.mason@example.net', '775.351.3139', '1', '2023-02-16 14:19:54', 1, '122 McGlynn Cape Suite 519\nEast Isaias, ID 59621-5840', '18523991', 'Birth Certificate', NULL, NULL, NULL, NULL, 'odio.jpg', '1973-01-04', NULL, NULL, '2023-11-22 04:43:41', '$2y$10$Bo.mPpVMDtk3YqGe/OLUX.cnpd3RbxzGw1T/TcKT.b/0Fl0qVycLG', 'user', NULL, NULL, '2023-11-22 04:43:41', '2023-11-22 04:43:41'),
(30, 'Saiful Islam Shaon', 'shaon', 'shaon@gmail.com', '+1 (548) 705-4472', '0', NULL, 1, 'Velit id minus iure', '33', 'Passport', NULL, NULL, NULL, NULL, NULL, '1975-05-01', 1, NULL, NULL, '$2y$10$5aRrOXs64efRjH1CaBIejejDJq52f6vdmhAJL2lhN/g9zPXpC2LkK', 'user', NULL, NULL, '2024-01-02 05:12:08', '2024-01-02 05:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_key_contact_person_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation_of_key_contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_contact_person_email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_license_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_bin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `company_name`, `company_address`, `company_email_address`, `company_key_contact_person_name`, `designation_of_key_contact_person`, `key_contact_person_email_address`, `trade_license_no`, `vat_bin_no`, `tin_no`, `documents`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Hampton and Gutierrez Plc', 'Ut enim beatae totam', 'zuti@mailinator.com', 'English Fox LLC', 'Repellendus Vel odi', 'pemazo@mailinator.com', '637', '420', '881', NULL, NULL, '2024-01-08 07:55:35', '2024-01-08 07:55:35');

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
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disburse_project_payments`
--
ALTER TABLE `disburse_project_payments`
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
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `key_deliverables`
--
ALTER TABLE `key_deliverables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_deliverables_project_initiation_id_foreign` (`project_initiation_id`);

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
-- Indexes for table `monitoring_teams`
--
ALTER TABLE `monitoring_teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monitoring_teams_project_initiation_id_foreign` (`project_initiation_id`),
  ADD KEY `monitoring_teams_user_id_foreign` (`user_id`);

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
-- Indexes for table `project_notifications`
--
ALTER TABLE `project_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_notifications_project_submission_id_foreign` (`project_submission_id`);

--
-- Indexes for table `project_submissions`
--
ALTER TABLE `project_submissions`
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
-- Indexes for table `sign_off_projects`
--
ALTER TABLE `sign_off_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_initiation_id_foreign` (`project_initiation_id`);

--
-- Indexes for table `team_member_logs`
--
ALTER TABLE `team_member_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_member_logs_user_id_foreign` (`user_id`),
  ADD KEY `team_member_logs_project_initiation_id_foreign` (`project_initiation_id`);

--
-- Indexes for table `time_durations`
--
ALTER TABLE `time_durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_durations_project_initiation_id_foreign` (`project_initiation_id`);

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
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
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
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `disburse_project_payments`
--
ALTER TABLE `disburse_project_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `key_deliverables`
--
ALTER TABLE `key_deliverables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `monitoring_teams`
--
ALTER TABLE `monitoring_teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `project_initiations`
--
ALTER TABLE `project_initiations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `project_initiation_overviews`
--
ALTER TABLE `project_initiation_overviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `project_notifications`
--
ALTER TABLE `project_notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_submissions`
--
ALTER TABLE `project_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `security_questions`
--
ALTER TABLE `security_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sign_off_projects`
--
ALTER TABLE `sign_off_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team_member_logs`
--
ALTER TABLE `team_member_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `time_durations`
--
ALTER TABLE `time_durations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `key_deliverables`
--
ALTER TABLE `key_deliverables`
  ADD CONSTRAINT `key_deliverables_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `monitoring_teams`
--
ALTER TABLE `monitoring_teams`
  ADD CONSTRAINT `monitoring_teams_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `monitoring_teams_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_notifications`
--
ALTER TABLE `project_notifications`
  ADD CONSTRAINT `project_notifications_project_submission_id_foreign` FOREIGN KEY (`project_submission_id`) REFERENCES `project_submissions` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_member_logs`
--
ALTER TABLE `team_member_logs`
  ADD CONSTRAINT `team_member_logs_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `team_member_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_durations`
--
ALTER TABLE `time_durations`
  ADD CONSTRAINT `time_durations_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
