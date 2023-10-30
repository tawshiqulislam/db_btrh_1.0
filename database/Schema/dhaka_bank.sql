-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 30, 2023 at 06:56 AM
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
(1, 'Backend Developement', NULL, 'molestiae', NULL, NULL, NULL),
(2, 'ForontEnd Development', 1, NULL, NULL, NULL, NULL),
(3, 'Mobile Application', NULL, 'et', NULL, NULL, NULL),
(4, 'UI/UX', 4, 'facere', NULL, NULL, NULL);

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
(15, '2023_10_30_035158_create_project_initiation_overviews_table', 1);

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
(1, 'Commodi necessitatibus doloribus rem harum.', 'Et nisi magnam ullam ut est explicabo ullam consequatur. Ullam et sed iusto. Id alias quaerat dolor praesentium minus veniam.', NULL, NULL, NULL),
(2, 'Aut assumenda repudiandae similique ut ad vero.', 'Necessitatibus quo enim est provident voluptatibus. Illo et dolorum quos et ratione ipsa sint corrupti. Magnam aut rem iste praesentium id.', NULL, NULL, NULL),
(3, 'Quis enim inventore eveniet veniam et repudiandae.', 'Quis vel et praesentium sed est. Est voluptas ut asperiores nihil ad officia fugit. Veniam hic praesentium qui a aspernatur aut.', NULL, NULL, NULL),
(4, 'Ratione fuga vel et.', 'Officiis maxime iure vel quia incidunt. Eos maxime assumenda totam quam officia accusamus deserunt. Ratione ducimus rerum qui cupiditate eum et.', NULL, NULL, NULL),
(5, 'Soluta ut neque labore esse qui nostrum consequatur voluptatum.', 'Voluptatibus provident animi dolores voluptas praesentium saepe omnis explicabo. Aut debitis ut voluptatem nulla. Provident aut temporibus sunt quia aliquam. Quisquam aut id omnis quia accusamus accusantium quas aut.', NULL, NULL, NULL);

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
(1, 3, 4, 'Recusandae mollitia ea sint consequatur optio iure ipsum.', 'Quas qui et perferendis dolorem. In cum qui rem perferendis et earum.', 'Nihil nostrum similique itaque sequi suscipit. Reiciendis id voluptas repudiandae sed. Dolores voluptas mollitia in voluptatem est delectus.', '1987-10-29', 'vero.pdf', 1, NULL, NULL, 1, 1, NULL, NULL, 1, 'active', NULL, '2023-10-29 22:32:38', NULL),
(2, 2, 3, 'Ipsa qui corrupti et ullam qui laborum eaque.', 'Eos est earum eum vel quo explicabo odio tempora. Sed vel laudantium sed. Ab quaerat id et dolore tenetur vel vero in. Maxime officia voluptate officiis quis tenetur.', 'Saepe quod molestias et ut cum omnis est. Asperiores ut magni vel sunt architecto error et. Est reprehenderit architecto omnis rerum recusandae fuga.', '2014-07-22', 'quis.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(3, 3, 1, 'Sit neque tenetur maiores quo consequuntur optio.', 'Autem rerum molestias voluptatem tempore veritatis suscipit. Beatae est assumenda aut accusantium est quisquam et.', 'Minima praesentium totam mollitia ducimus doloremque et corrupti. Voluptatum laborum expedita molestiae maxime assumenda doloremque ad.', '1984-06-04', 'cumque.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(4, 4, 5, 'Enim officia nisi facilis dolorem tempore.', 'Eum fugit consequatur in alias id. Quia aut qui libero blanditiis eius ut.', 'Magnam ipsa soluta eius provident aliquid vel nulla. Voluptatum repudiandae nihil est temporibus culpa praesentium. Vel architecto quae ullam nulla sit hic aliquam.', '2022-10-25', 'officiis.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL),
(5, 3, 5, 'Laborum laborum quis unde aut doloremque illo.', 'Id doloribus omnis sunt et porro vel dolores quo. Quaerat blanditiis quae iure sit. Ad sed consequuntur eos.', 'Est qui cum et placeat. Nam corporis est cupiditate. Vitae aut nulla voluptatem perspiciatis dolores pariatur rem.', '1978-04-16', 'a.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'inactive', NULL, NULL, NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_initiation_overviews`
--

INSERT INTO `project_initiation_overviews` (`id`, `project_initiation_id`, `user_id`, `designation`, `comment`, `assigned_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'leader', 'mr leader', 1, '2023-10-29 22:32:38', '2023-10-29 22:32:38'),
(2, 1, 2, 'co leader', 'co', 1, '2023-10-29 22:32:38', '2023-10-29 22:32:38'),
(3, 1, 3, NULL, NULL, 1, '2023-10-29 22:32:38', '2023-10-29 22:32:38');

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
(1, 'super_admin', 'web', '2023-10-29 22:30:53', '2023-10-29 22:30:53'),
(2, 'admin', 'web', '2023-10-29 22:30:53', '2023-10-29 22:30:53'),
(3, 'office', 'web', '2023-10-29 22:30:53', '2023-10-29 22:30:53'),
(4, 'vendor', 'web', '2023-10-29 22:30:53', '2023-10-29 22:30:53'),
(5, 'controller', 'web', '2023-10-29 22:30:53', '2023-10-29 22:30:53');

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
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `phone_no`, `TFA`, `last_login`, `isVerified`, `address`, `id_number`, `id_type`, `sq_no_1`, `sq_no_1_ans`, `sq_no_2`, `sq_no_2_ans`, `pro_pic`, `date_of_birth`, `verified_by`, `email_verified_at`, `password`, `user_type`, `deleted_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin', 'admin@example.com', '0123456789', '0', NULL, 0, '123 Main St, City', '123456789', 'NID', NULL, NULL, NULL, NULL, NULL, '1990-01-01', NULL, NULL, '$2y$10$s7HxnKezXxBfESMOP3LVn.sDgjOXbxzUXzgMfKCRJyaAEhmT5IZAK', 'super_admin', NULL, NULL, '2023-10-29 22:30:53', '2023-10-29 22:30:53'),
(2, 'Prof. Angeline Kulas', 'pinkie.schoen', 'kareem90@example.org', '+1 (762) 810-9008', '0', '2023-08-22 12:37:04', 0, '2861 Kelly Viaduct\nWest Rita, ME 06810', '14177181', 'Passport', NULL, NULL, NULL, NULL, 'itaque.jpg', '2010-09-03', NULL, '2023-10-29 22:30:53', '$2y$10$WGvRb0kOp85KIwKEdV2zW.nfBbq5c6x8wwri.zde38XElRTRvm6oG', 'office', NULL, NULL, NULL, NULL),
(3, 'Prof. Trent Prohaska I', 'taryn.vonrueden', 'buckridge.jeremie@example.com', '+1-872-914-2632', '2', '2023-08-15 07:00:20', 1, '57836 Crist Run\nNorth Alyce, WI 13320', '87431982', 'Birth Certificate', NULL, NULL, NULL, NULL, 'voluptatem.jpg', '2002-12-09', NULL, '2023-10-29 22:30:53', '$2y$10$NcTdf5vl7Wu3UfNkJZ0wZOdJ94AIuQpY4tStk4QCyE5WXI9Ov7k0m', 'vendor', NULL, NULL, NULL, NULL),
(4, 'Vito Beahan', 'deonte68', 'greenholt.joesph@example.org', '816.846.9356', '2', '2023-02-19 21:38:19', 1, '46056 Rosina Rue\nSolonshire, MA 05187', '60305158', 'Passport', NULL, NULL, NULL, NULL, 'facere.jpg', '2008-03-20', NULL, '2023-10-29 22:30:54', '$2y$10$UOlWaM8J2EuVrfgpDR.Wv.6i/RtoMnng.bQAiJCS1HkA.pIWsB.Uy', 'vendor', NULL, NULL, NULL, NULL),
(5, 'Wiley Schinner', 'alessia.heidenreich', 'lhartmann@example.org', '(207) 482-2029', '2', '2023-05-02 03:35:48', 1, '94569 Rosenbaum Common\nNew Arlene, WI 20875-5045', '70634412', 'Birth Certificate', NULL, NULL, NULL, NULL, 'neque.jpg', '1979-06-05', 4, '2023-10-29 22:30:54', '$2y$10$aW59H5vTdLhqeuoQf.cVKe0LthVnMXk1A0/Z9dlIUWZQVNynS/1qm', 'office', NULL, NULL, NULL, NULL),
(6, 'Dr. Lilian Leffler I', 'dixie05', 'rhickle@example.org', '(484) 686-7202', '2', '2023-05-14 22:03:11', 0, '5419 Keaton Corners Suite 175\nKundefurt, OK 62954', '13012554', 'Birth Certificate', NULL, NULL, NULL, NULL, 'rerum.jpg', '2022-03-18', NULL, NULL, '$2y$10$gj2xDDAFFkD598ADwJH.1eFyMRq6EbILLop7BkQbjojciKy6HylDK', 'office', NULL, NULL, NULL, NULL);

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
