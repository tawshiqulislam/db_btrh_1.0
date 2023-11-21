-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2023 at 05:36 PM
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
(1, 'Backend Developement', 2, 'maiores', NULL, NULL, NULL),
(2, 'ForontEnd Development', NULL, NULL, NULL, NULL, NULL),
(3, 'Mobile Application', 1, 'consectetur', NULL, NULL, NULL),
(4, 'UI/UX', 1, 'consectetur', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'team leader', NULL, '2023-11-20 02:38:45', '2023-11-20 02:38:45'),
(2, 'co leader', NULL, '2023-11-20 02:38:45', '2023-11-20 02:38:45'),
(3, 'senior developer', NULL, '2023-11-20 02:38:45', '2023-11-20 02:38:45'),
(4, 'junior developer', NULL, '2023-11-20 02:38:45', '2023-11-20 02:38:45');

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
-- Table structure for table `key_deliverables`
--

CREATE TABLE `key_deliverables` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(17, '2023_11_07_184019_create_resource_management_table', 1),
(18, '2023_11_11_054913_create_time_durations_table', 1),
(19, '2023_11_11_060559_create_key_deliverables_table', 1),
(20, '2023_11_12_093315_create_tasks_table', 1),
(21, '2023_11_14_112346_create_designations_table', 1),
(25, '2023_11_21_095427_create_project_submissions_table', 2);

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
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 10),
(3, 'App\\Models\\User', 11),
(3, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 24),
(3, 'App\\Models\\User', 26);

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
(1, 'Excepturi minus quibusdam nostrum dolorem quae magni beatae.', 'Sed et rerum pariatur a quas. Dolor vitae rem veritatis. Aliquid magni eum sit. Nam ut qui velit.', NULL, NULL, NULL),
(2, 'Deserunt aut voluptatibus mollitia est eos dicta reprehenderit.', 'Minima et quia sed cum adipisci. Voluptatem et et aut aut dolores dolore est. Quia saepe iste consequatur sit suscipit ut assumenda. Natus architecto accusamus delectus assumenda architecto.', NULL, NULL, NULL),
(3, 'Eius itaque debitis commodi eos.', 'Ut et sequi ut rem ut voluptas. Doloremque placeat nihil molestias occaecati quo. Dolorem molestiae tempore officiis et ut. Sequi commodi libero quia.', NULL, NULL, NULL),
(4, 'Praesentium eos explicabo quod deserunt aperiam.', 'Aut omnis omnis qui doloribus aut ut rerum. Voluptate consequatur voluptatum unde consequatur labore.', NULL, NULL, NULL),
(5, 'Doloremque voluptatibus delectus sit rerum asperiores eum.', 'Sint quod rem ea saepe harum quidem voluptate quaerat. Assumenda alias doloribus commodi quae delectus voluptatem. Quam et beatae est eius. Ullam rerum accusantium perferendis velit qui aut.', NULL, NULL, NULL);

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
  `deadline` date DEFAULT NULL,
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
(1, 2, 5, 'Rerum nesciunt corporis qui sint nemo.', 'Minus eaque ratione debitis fuga nostrum asperiores commodi et. Itaque enim asperiores dignissimos ipsum molestiae sint.', 'Nisi commodi earum occaecati. Voluptas molestiae quidem quas.', '1977-05-14', 'minima.pdf', 1, NULL, NULL, 1, 1, NULL, NULL, 1, 'active', NULL, '2023-11-20 02:40:21', NULL),
(2, 1, 5, 'Dolor explicabo enim dolorem consequuntur ut.', 'Atque est aut omnis dolorum. Illum veritatis accusamus aperiam voluptas. Vero in autem est ut et omnis optio.', 'Fuga officiis reprehenderit vel molestiae. Quos aut quis eos error velit aliquam est enim. Maiores necessitatibus debitis et fugiat.', '1975-01-03', 'quis.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(3, 4, 1, 'Nulla consectetur qui iste ea nesciunt consectetur cum est.', 'Animi officia eum aliquam repellendus sed consequatur. Cupiditate et amet necessitatibus sed dolore maxime vel commodi. Distinctio mollitia beatae non deserunt sunt ut enim. Voluptatem sit dolorem aut.', 'Necessitatibus minus qui aut ducimus. Maxime aspernatur quod dolores necessitatibus. Omnis officiis et saepe ut quo quas ut. Rerum quos debitis omnis provident nam dolore.', '2017-01-06', 'a.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(4, 3, 2, 'Est quas amet ad aut magnam.', 'Voluptates quia enim nesciunt at porro occaecati soluta. Aut ipsam ut aut magni. In corrupti dolorem eos. Quo cumque omnis exercitationem error magnam quam voluptatum.', 'Officiis possimus occaecati dolore tempora. Molestiae ea sed vero enim et consequatur delectus quisquam. Illo dolorem qui maxime sunt id cumque eum. Pariatur saepe temporibus dolor quaerat.', '1990-04-03', 'quia.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(5, 2, 4, 'Animi necessitatibus deleniti cupiditate.', 'Ab voluptas repellat suscipit ducimus. Omnis eveniet dolores et. Ut eligendi debitis minus sit assumenda. Ea nisi quae vel.', 'Voluptas non velit vero ad. Quae fugiat commodi voluptatum blanditiis dicta. Dolor delectus accusamus quas dignissimos voluptatem omnis saepe.', '1995-01-16', 'tempora.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_initiation_overviews`
--

CREATE TABLE `project_initiation_overviews` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
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
(1, 1, 1, 'team leader', NULL, 1, NULL, '2023-11-20 02:40:21', '2023-11-20 02:40:34'),
(2, 1, 3, 'co leader', NULL, 1, NULL, '2023-11-20 02:40:21', '2023-11-20 02:40:43'),
(3, 1, 6, 'senior developer', NULL, 1, NULL, '2023-11-20 02:40:21', '2023-11-20 02:44:01'),
(4, 1, 10, 'junior developer', NULL, 1, NULL, '2023-11-20 02:40:21', '2023-11-20 02:44:09'),
(5, 1, 21, 'junior developer', NULL, 1, NULL, '2023-11-20 02:40:21', '2023-11-20 02:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `project_submissions`
--

CREATE TABLE `project_submissions` (
  `id` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `project_submitted_by` bigint UNSIGNED NOT NULL,
  `project_accepted_by` bigint UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAccepted` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_submissions`
--

INSERT INTO `project_submissions` (`id`, `project_initiation_id`, `project_submitted_by`, `project_accepted_by`, `description`, `comment`, `file`, `link`, `status`, `isAccepted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'In veniam id asperi', 'Non aut est aliquip', '1700567517-e4108d4d-5753-4ef5-9c01-a14e047cd97f.jpg', 'Illo atque velit inc', 'active', 1, NULL, '2023-11-21 05:51:57', '2023-11-21 05:53:29');

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
(1, 1, 'Elenor Baumbach', 'Rerum quos provident quo.', 'provident', 43, 892.88, 'ut.pdf', '1986-03-31', NULL, NULL, NULL),
(2, 1, 'Emilia Parker', 'Earum voluptatem quis laboriosam soluta.', 'ducimus', 48, 189.93, 'voluptatem.pdf', '2014-02-04', NULL, NULL, NULL),
(3, 1, 'Tre Schamberger', 'Aut ducimus consequatur ratione nemo quod aperiam.', 'accusamus', 1, 930.26, 'sequi.pdf', '2014-03-05', NULL, NULL, NULL),
(4, 1, 'Ms. Alivia Effertz', 'Blanditiis corrupti repudiandae labore odit eum repellat voluptatibus.', 'cupiditate', 7, 929.13, 'quae.pdf', '1979-10-08', NULL, NULL, NULL),
(5, 1, 'Dr. Tierra Moore V', 'Sunt quia nobis sit officia.', 'distinctio', 97, 969.59, 'reiciendis.pdf', '1971-05-29', NULL, NULL, NULL);

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
(1, 'super_admin', 'web', '2023-11-20 02:38:37', '2023-11-20 02:38:37'),
(2, 'admin', 'web', '2023-11-20 02:38:37', '2023-11-20 02:38:37'),
(3, 'user', 'web', '2023-11-20 02:38:37', '2023-11-20 02:38:37'),
(4, 'vendor', 'web', '2023-11-20 02:38:37', '2023-11-20 02:38:37'),
(5, 'controller', 'web', '2023-11-20 02:38:37', '2023-11-20 02:38:37');

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
(4, 'canceled', NULL, NULL, NULL),
(5, 'completed', NULL, '2023-11-20 23:49:59', '2023-11-20 23:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `assigned_by` bigint UNSIGNED NOT NULL,
  `assigned_to` bigint UNSIGNED NOT NULL,
  `project_initiation_id` bigint UNSIGNED NOT NULL,
  `task` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isAccepted` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `assigned_by`, `assigned_to`, `project_initiation_id`, `task`, `document`, `deadline`, `status`, `isAccepted`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '<p>asdfasdfasdfasdf</p>', NULL, '2014-09-21', 'pending', 0, '2023-11-20 02:47:41', '2023-11-20 02:45:32', '2023-11-20 02:47:41'),
(2, 1, 3, 1, 'Quo rem reiciendis e', NULL, '2017-11-17', 'inactive', 0, '2023-11-20 02:47:47', '2023-11-20 02:45:54', '2023-11-20 02:47:47'),
(3, 1, 1, 1, '<p>Minus sit minima sed</p>', NULL, '1990-05-22', 'completed', 1, NULL, '2023-11-20 02:55:25', '2023-11-21 03:03:19'),
(4, 1, 3, 1, 'Distinctio Debitis', NULL, '1973-03-06', 'active', 0, NULL, '2023-11-20 02:55:42', '2023-11-20 02:55:42'),
(5, 1, 6, 1, 'Nostrum deleniti qua', NULL, '1980-02-18', 'active', 0, NULL, '2023-11-20 02:55:55', '2023-11-20 02:55:55'),
(6, 1, 10, 1, 'Vitae dolorem corpor', NULL, '1981-08-28', 'active', 0, NULL, '2023-11-20 02:56:06', '2023-11-20 02:56:06'),
(7, 1, 21, 1, 'Culpa atque aut quis', NULL, '1972-03-21', 'active', 0, NULL, '2023-11-20 02:56:16', '2023-11-20 02:56:16');

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
(1, 1, 1, '2018-01-05', '1979-06-25', NULL, '2023-11-20 02:40:08', '2023-11-20 02:40:08');

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
(1, 'Super Admin', 'super_admin', 'admin@example.com', '0123456789', '0', NULL, 1, '123 Main St, City', '123456789', 'NID', NULL, NULL, NULL, NULL, NULL, '1990-01-01', 1, NULL, NULL, '$2y$10$JD/fzTcSdYc2cFDysen8qeI3qo0zVogYFXBQzDvIsV/0q4VkhUheC', 'user', NULL, NULL, '2023-11-20 02:38:38', '2023-11-20 02:38:38'),
(2, 'Felipe Luettgen DVM', 'lucile32', 'terry79@example.net', '(551) 522-0452', '1', '2023-08-23 03:41:16', 0, '91839 Ryan Mount Apt. 348\nManleybury, NH 56604', '9129287', 'NID', NULL, NULL, NULL, NULL, 'voluptas.jpg', '2014-12-06', NULL, NULL, '2023-11-20 02:38:38', '$2y$10$KwvHJXX/ffHrIH1/uo4XduIjPwGjzBfcU1ucN/LdJMpqjeHG10r.2', 'user', NULL, NULL, '2023-11-20 02:38:38', '2023-11-20 02:38:38'),
(3, 'Prof. Emilio Murazik Jr.', 'wilmer50', 'bergstrom.alaina@example.org', '248-207-8833', '1', '2023-02-02 01:02:55', 1, '527 Breana Passage Apt. 487\nZoilahaven, UT 50517-3451', '54654054', 'Passport', NULL, NULL, NULL, NULL, 'fuga.jpg', '1979-05-07', NULL, NULL, '2023-11-20 02:38:38', '$2y$10$KvqdnmIp8x7/T4/z5qMbKePXJmbxyDpDMvnu5kqltsHp.AYHx1nL2', 'user', NULL, NULL, '2023-11-20 02:38:38', '2023-11-20 02:38:38'),
(4, 'Alfreda Jacobson', 'mariane.pollich', 'schroeder.molly@example.com', '1-870-643-7138', '2', '2023-01-28 05:42:51', 0, '97222 Waelchi Burg\nEast Savanna, NJ 99124-5790', '83077730', 'Birth Certificate', NULL, NULL, NULL, NULL, 'dolor.jpg', '2002-06-08', NULL, NULL, '2023-11-20 02:38:38', '$2y$10$aRkcZ/A5coL24F9oYo6SEekbqRlzAf41rAOqXDdDncKeAK95XmJre', 'vendor', NULL, NULL, '2023-11-20 02:38:38', '2023-11-20 02:38:38'),
(5, 'Ferne Medhurst', 'bkuhic', 'teagan04@example.net', '+1 (409) 779-0817', '1', '2023-02-25 12:00:23', 1, '3044 Bret Circles Suite 269\nPort Opal, OH 23371', '58908368', 'Passport', NULL, NULL, NULL, NULL, 'occaecati.jpg', '1985-08-14', NULL, NULL, '2023-11-20 02:38:38', '$2y$10$5Cc6z9ZY2IXgK0S..U1BiOJ6CC7e8bQFzGvohRx8nz7F0RsE7KRbq', 'vendor', NULL, NULL, '2023-11-20 02:38:39', '2023-11-20 02:38:39'),
(6, 'Gina Wyman', 'pfeffer.arielle', 'clara89@example.com', '+1-360-917-3626', '2', '2023-08-22 19:15:57', 1, '126 Miracle Parkway Suite 138\nBoyerbury, AK 19814', '73389142', 'Passport', NULL, NULL, NULL, NULL, 'doloribus.jpg', '1987-05-03', NULL, NULL, '2023-11-20 02:38:39', '$2y$10$bLL8Ge83wZgamyg.Dt/w0ushdBCPZtqt7B4UgXuVgLrjEVaX877XO', 'user', NULL, NULL, '2023-11-20 02:38:39', '2023-11-20 02:38:39'),
(7, 'Alvena Schinner', 'easton29', 'cummings.sid@example.org', '+1-720-414-4849', '2', '2023-01-31 19:53:38', 0, '4828 Schultz Rue Suite 318\nWillmsmouth, CT 56215', '4848643', 'Passport', NULL, NULL, NULL, NULL, 'ab.jpg', '2016-04-23', NULL, NULL, NULL, '$2y$10$4tHbX6UwSsgo1RDlSRldw.IrkSvRlIy2ND6XKuWuw4ZMbfN2LVzUu', 'vendor', NULL, NULL, '2023-11-20 02:38:39', '2023-11-20 02:38:39'),
(8, 'Rosamond Huel', 'eddie.gutkowski', 'jannie.tremblay@example.net', '+1.743.262.0155', '1', '2023-06-30 17:24:53', 0, '202 Darrell Cove\nEast Garett, MD 46190-5936', '66815972', 'Passport', NULL, NULL, NULL, NULL, 'officiis.jpg', '2012-09-22', NULL, NULL, '2023-11-20 02:38:39', '$2y$10$R/ALbScew9I4TXnShSZjxerQ6/NGL.YB5s04MCzhidpZmlCNEbgyO', 'user', NULL, NULL, '2023-11-20 02:38:40', '2023-11-20 02:38:40'),
(9, 'Mozell Moore', 'btremblay', 'johann73@example.org', '585-965-0331', '2', '2023-08-31 16:52:14', 0, '608 Arlo Point Suite 247\nRachelton, IA 61594', '73980883', 'Birth Certificate', NULL, NULL, NULL, NULL, 'dolore.jpg', '2011-10-03', NULL, NULL, '2023-11-20 02:38:40', '$2y$10$tzRElUzN2KAW9CjvO.sKY.IjsouAm3ia.7a34yuuLyL6qjWXpR5Au', 'user', NULL, NULL, '2023-11-20 02:38:40', '2023-11-20 02:38:40'),
(10, 'Mrs. Hassie Weimann IV', 'ncollier', 'kozey.jackeline@example.org', '+1-838-694-0154', '2', '2023-11-02 11:22:33', 1, '92937 Eldridge Bypass\nSouth Layne, NY 71217-7489', '33139161', 'NID', NULL, NULL, NULL, NULL, 'minima.jpg', '2008-08-13', NULL, NULL, '2023-11-20 02:38:40', '$2y$10$yCerY.fvrLigiMlbzGYXv.8mr4goh5ocGWmzFbZJiidCpuiCxI2De', 'user', NULL, NULL, '2023-11-20 02:38:40', '2023-11-20 02:38:40'),
(11, 'Miss Josiane Parker V', 'nathanial68', 'cbogan@example.org', '470.722.9972', '1', '2023-03-19 13:27:12', 1, '897 Lina Gateway Suite 965\nBrakusstad, HI 63918-2883', '99448427', 'NID', NULL, NULL, NULL, NULL, 'laudantium.jpg', '1991-11-09', NULL, NULL, '2023-11-20 02:38:40', '$2y$10$P1Xn4dloarbnDu3UdRUtRuJ0G4aSgXbpZEsJbmQVLbaAfg3Qp7h9u', 'vendor', NULL, NULL, '2023-11-20 02:38:40', '2023-11-20 02:38:40'),
(12, 'Elza Koepp', 'izulauf', 'everardo.weber@example.net', '(219) 691-4178', '2', '2023-05-21 16:51:44', 0, '8256 Mitchell Loaf Apt. 717\nEast Jerad, OR 08608-4484', '35321791', 'Passport', NULL, NULL, NULL, NULL, 'ea.jpg', '1987-05-12', NULL, NULL, NULL, '$2y$10$9zZQ.oV5C6UHMODv8SMMMePfodLaW2c0wdxuDeFNNmSCT7qxTMtQu', 'user', NULL, NULL, '2023-11-20 02:38:41', '2023-11-20 02:38:41'),
(13, 'Dr. Braden O\'Keefe V', 'sboyer', 'pearline.block@example.org', '339-225-0161', '1', '2023-07-18 21:21:51', 0, '23065 Feest Fields Suite 363\nBoylefort, FL 03951', '47840521', 'NID', NULL, NULL, NULL, NULL, 'aliquid.jpg', '2004-07-07', NULL, NULL, '2023-11-20 02:38:41', '$2y$10$kIyYdLx3zV/WRy7Ngy3lpekTq6WPHdGCjGMRGsrxNTCHPX0no2MWK', 'user', NULL, NULL, '2023-11-20 02:38:41', '2023-11-20 02:38:41'),
(14, 'Hiram Harris', 'sigurd.hickle', 'bcollier@example.net', '(601) 323-4867', '1', '2023-04-26 23:31:31', 0, '50568 Pagac Pike Suite 232\nPort Jacky, KS 96596-0452', '98096104', 'Passport', NULL, NULL, NULL, NULL, 'rerum.jpg', '2000-03-03', NULL, NULL, '2023-11-20 02:38:41', '$2y$10$aijYcFFa/Lf5.Z1dVD1Lsu1RhlR.lNiRq0Gy/2m79ZtjG3o5wnc2m', 'vendor', NULL, NULL, '2023-11-20 02:38:41', '2023-11-20 02:38:41'),
(15, 'Dr. Jordi Langworth', 'ramon.becker', 'rosalyn26@example.com', '858.645.4475', '1', '2023-05-04 12:16:56', 0, '715 Ian Springs\nBinsville, TN 92448', '30212169', 'Birth Certificate', NULL, NULL, NULL, NULL, 'illum.jpg', '2015-03-30', NULL, NULL, '2023-11-20 02:38:41', '$2y$10$WSQaUNyvDGIkOsRpHJ9CbOSHsvH.cmdMQZybA5oMPo0hoiYss2cee', 'vendor', NULL, NULL, '2023-11-20 02:38:41', '2023-11-20 02:38:41'),
(16, 'Franz Stamm', 'gboehm', 'stephania.osinski@example.com', '630-612-0218', '2', '2023-10-04 12:19:59', 0, '66067 Ottis Spring\nNew Lyda, LA 54605', '30288524', 'Passport', NULL, NULL, NULL, NULL, 'rem.jpg', '2008-02-12', NULL, NULL, '2023-11-20 02:38:41', '$2y$10$.gEVtq4UhxHa7jLBlr5U1esBBpIl8h033C42wcrLg2YjEdrvdfRde', 'vendor', NULL, NULL, '2023-11-20 02:38:41', '2023-11-20 02:38:41'),
(17, 'Prof. Robin Hahn', 'yhegmann', 'jared.russel@example.org', '1-262-751-5154', '2', '2023-03-24 20:21:42', 0, '34191 Lindgren Shoal Suite 412\nWest Adam, CA 07593', '19805649', 'Passport', NULL, NULL, NULL, NULL, 'necessitatibus.jpg', '1985-02-14', NULL, NULL, '2023-11-20 02:38:42', '$2y$10$G0fKJnyC/lCs0PYGunKcQ.JDib97xfnJLoKRFFloxtSIMMlppHtrK', 'user', NULL, NULL, '2023-11-20 02:38:42', '2023-11-20 02:38:42'),
(18, 'Rebekah Mertz', 'hsipes', 'modesta.howell@example.org', '727.907.1051', '1', '2023-11-07 20:06:33', 0, '9937 Jones Dam Suite 452\nSouth Abraham, FL 60473', '76971585', 'NID', NULL, NULL, NULL, NULL, 'libero.jpg', '1981-06-08', NULL, NULL, '2023-11-20 02:38:42', '$2y$10$RZLQrE6/X.lUxsLjhMbs4.uwa5jxcZun81hU0puq6ztw8x9lUExVO', 'vendor', NULL, NULL, '2023-11-20 02:38:42', '2023-11-20 02:38:42'),
(19, 'Bertrand Sauer', 'fletcher.thiel', 'umraz@example.net', '+1.332.655.2830', '0', '2023-09-25 01:57:44', 1, '887 Floy Drive Apt. 937\nNew Chetside, CO 13820', '16960151', 'NID', NULL, NULL, NULL, NULL, 'blanditiis.jpg', '2006-04-20', NULL, NULL, '2023-11-20 02:38:42', '$2y$10$QK/.Ly9Q5y/Yhk2kaI0c8.4n8vy1BncF3IVaDggF.o5BNJ.6DXke.', 'vendor', NULL, NULL, '2023-11-20 02:38:42', '2023-11-20 02:38:42'),
(20, 'Mr. William Goyette', 'frutherford', 'feil.justine@example.org', '+1-469-883-8178', '2', '2023-07-20 14:29:42', 1, '3580 Boehm Meadow Apt. 913\nNorth Annabel, GA 56303', '28400057', 'Passport', NULL, NULL, NULL, NULL, 'qui.jpg', '2007-05-28', NULL, NULL, NULL, '$2y$10$SwgYYtFyx9bKJggGwoYUVuNFYxKZoK5UxukzTNe0vEvVn1fVePnZW', 'vendor', NULL, NULL, '2023-11-20 02:38:42', '2023-11-20 02:38:42'),
(21, 'Gudrun Willms II', 'myriam40', 'harmony.lesch@example.org', '234-677-9517', '2', '2023-07-28 15:48:50', 1, '65095 Abdiel Crescent Suite 395\nJustinaview, WV 63818', '82900850', 'Passport', NULL, NULL, NULL, NULL, 'et.jpg', '1992-08-19', NULL, NULL, '2023-11-20 02:38:43', '$2y$10$u5L8oTqfoYjJrNx9TQSuL.1NPDkLXWztiMOfGrH/5.iuQOQgLMdZm', 'user', NULL, NULL, '2023-11-20 02:38:43', '2023-11-20 02:38:43'),
(22, 'Rashad Feeney V', 'murazik.christina', 'shanahan.donato@example.org', '220.559.7125', '2', '2023-06-30 18:00:32', 0, '240 Hagenes Motorway\nJacobishire, TN 09786-2978', '21503640', 'NID', NULL, NULL, NULL, NULL, 'consequatur.jpg', '1979-07-27', NULL, NULL, '2023-11-20 02:38:43', '$2y$10$rzzY8id8C0CotuH9kr/54eZoSxFQuvWS8uXiLR6TOvNgUIKWT.KMi', 'vendor', NULL, NULL, '2023-11-20 02:38:43', '2023-11-20 02:38:43'),
(23, 'Jailyn Zboncak Sr.', 'lindgren.colt', 'lemard@example.org', '+1-410-831-2456', '1', '2023-11-12 04:07:48', 0, '14745 Heaven Mount Suite 438\nSouth Tania, SD 82347-0130', '13363112', 'Birth Certificate', NULL, NULL, NULL, NULL, 'sit.jpg', '2019-07-11', NULL, NULL, '2023-11-20 02:38:43', '$2y$10$P4hgcZM5uww8dd/rkuP3y.mCs05MWCkpc0HTH6miaLq3HBFhkb0K.', 'user', NULL, NULL, '2023-11-20 02:38:43', '2023-11-20 02:38:43'),
(24, 'Miss Ebba Mann', 'cfeeney', 'mitchell.hailie@example.org', '737.551.9223', '0', '2023-03-28 16:41:21', 1, '6541 Purdy Center Apt. 746\nThaddeusshire, MD 43290', '80356607', 'Birth Certificate', NULL, NULL, NULL, NULL, 'omnis.jpg', '2018-10-23', NULL, NULL, '2023-11-20 02:38:43', '$2y$10$N2cr15kT9epV5yhoY3Z/U.Ms9KrIpr8Q1iPIziEwNqV6kymwS6A.2', 'vendor', NULL, NULL, '2023-11-20 02:38:43', '2023-11-20 02:38:43'),
(25, 'Emily Murazik', 'blake.nienow', 'daniella07@example.com', '+1 (336) 333-2837', '0', '2023-11-01 08:30:10', 0, '1963 Anabel Manor\nKundeton, CO 88662', '93567663', 'Passport', NULL, NULL, NULL, NULL, 'repellat.jpg', '1983-08-29', NULL, NULL, '2023-11-20 02:38:43', '$2y$10$ZJJcIzaP.MN.TWlCeFBAv.zcuSlZN29k7UkdegEq5vFEiwB0YyBti', 'user', NULL, NULL, '2023-11-20 02:38:44', '2023-11-20 02:38:44'),
(26, 'Reymundo Jacobi PhD', 'cameron.bartell', 'emonahan@example.net', '+15122667494', '1', '2023-10-13 08:02:12', 1, '809 Minnie Court Suite 903\nSchmidtfurt, OR 15729', '93004557', 'Passport', NULL, NULL, NULL, NULL, 'alias.jpg', '1976-05-10', NULL, NULL, '2023-11-20 02:38:44', '$2y$10$ZP/39k5CZ1vFnj.FY2Lq2uDdzoqiGwnCj2RnSqp8afl/oynCAAxRe', 'vendor', NULL, NULL, '2023-11-20 02:38:44', '2023-11-20 02:38:44');

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
-- Indexes for table `designations`
--
ALTER TABLE `designations`
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
-- AUTO_INCREMENT for table `key_deliverables`
--
ALTER TABLE `key_deliverables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_submissions`
--
ALTER TABLE `project_submissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `time_durations`
--
ALTER TABLE `time_durations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `time_durations`
--
ALTER TABLE `time_durations`
  ADD CONSTRAINT `time_durations_project_initiation_id_foreign` FOREIGN KEY (`project_initiation_id`) REFERENCES `project_initiations` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
