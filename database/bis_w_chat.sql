-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2023 at 05:36 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bis_w_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `title`, `path`, `created_at`, `updated_at`) VALUES
(1, 'asets1', 'oJSznU9k4dzX9t5wk2P5GcWNo3HGJFsgELHzgA0V.jpg', '2023-06-28 20:40:39', '2023-06-28 20:40:39'),
(2, 'asetrs', 'fZNCBr030MsuPXRlB9dgu8KY9ZnTIMkYcUNdUJ7t.jpg', '2023-06-28 20:40:50', '2023-06-28 20:40:50'),
(3, 'asdad', 'KwEUMeUyFyELDyR7P6IJDP611VDVFH4S2K0kgYqO.jpg', '2023-06-28 20:41:00', '2023-06-28 20:41:00'),
(4, 'tset aseset', 'vause8H5D5Ne6lH7xHlidY5HfGzYBjG3e3qiCIiq.jpg', '2023-06-28 20:41:14', '2023-06-28 20:41:14'),
(5, 'assets more', 'uaVrndHmSk2ufSQ7Z93tYRhvAEQnT1rOk25R6YM8.jpg', '2023-06-28 20:41:28', '2023-06-28 20:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_positions`
--

CREATE TABLE `barangay_positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangay_positions`
--

INSERT INTO `barangay_positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Kagawad', '2023-06-28 21:21:01', '2023-06-28 21:21:01'),
(2, 'Captain', '2023-06-28 21:21:15', '2023-06-28 21:21:15'),
(3, 'Secretary', '2023-06-28 21:21:26', '2023-06-28 21:21:26'),
(4, 'Tanod', '2023-06-28 21:28:29', '2023-06-28 21:28:29'),
(5, 'Chief Tanod', '2023-06-28 21:30:00', '2023-06-28 21:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `blotters`
--

CREATE TABLE `blotters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complainant_name` varchar(255) NOT NULL,
  `respondent_name` varchar(255) NOT NULL,
  `victims` text NOT NULL,
  `location` text NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blotters`
--

INSERT INTO `blotters` (`id`, `complainant_name`, `respondent_name`, `victims`, `location`, `date`, `type`, `about`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Esmeralda mea', 'miya mea', 'Lancelot\r\nling', 'in the land of dawn', '2023-06-29 06:48:00', 'Amicable', 'killing faker', 1, '2023-06-28 22:48:59', '2023-06-28 22:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `favorite_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` varchar(255) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('a0ad5411-1bc0-44ab-8110-24a79a9ed997', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'eqwewqqw', NULL, 1, '2023-12-02 09:16:22', '2023-12-02 09:16:37'),
('f8765f18-5ee1-40b0-a8f5-b2b4f04deb1e', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', '99857427-aa16-4dbd-bf20-97c704ddd082', '1231312', NULL, 1, '2023-12-02 09:16:39', '2023-12-02 09:16:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2014_10_12_000000_create_users_table', 1),
(70, '2014_10_12_100000_create_password_resets_table', 1),
(71, '2019_08_19_000000_create_failed_jobs_table', 1),
(72, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(73, '2023_06_01_062153_create_assets_table', 1),
(74, '2023_06_01_073935_create_post_table', 1),
(75, '2023_06_09_999999_add_active_status_to_users', 1),
(76, '2023_06_09_999999_add_avatar_to_users', 1),
(77, '2023_06_09_999999_add_dark_mode_to_users', 1),
(78, '2023_06_09_999999_add_messenger_color_to_users', 1),
(79, '2023_06_09_999999_create_chatify_favorites_table', 1),
(80, '2023_06_09_999999_create_chatify_messages_table', 1),
(81, '2023_06_10_224342_create_request_list_table', 1),
(82, '2023_06_10_232812_create_services_table', 1),
(83, '2023_06_11_140226_create_notifcation_table', 1),
(84, '2023_06_11_214710_create_newsfeeds_table', 1),
(85, '2023_06_11_214746_create_newsfeeds_images_table', 1),
(86, '2023_06_26_215750_create_barangay_positions_table', 1),
(87, '2023_06_26_215752_create_officials_table', 1),
(88, '2023_06_27_021128_create_blotters_table', 1),
(89, '2023_06_27_153133_create_certificates_table', 1),
(90, '2023_06_27_224055_create_news_comments_table', 1),
(91, '2023_06_28_155726_create_newsfeeds_comment_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsfeeds`
--

CREATE TABLE `newsfeeds` (
  `id` char(36) NOT NULL,
  `content` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsfeeds`
--

INSERT INTO `newsfeeds` (`id`, `content`, `type`, `created_at`, `updated_at`) VALUES
('998574bf-b417-4877-b819-855c73531306', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum nec magna mollis, laoreet mauris non, ultricies orci. Cras volutpat risus laoreet dapibus semper. Morbi et nisl a neque lacinia hendrerit in a nibh. Cras id nibh nec mi convallis lacinia. Nulla tortor odio, finibus vitae viverra sit amet, egestas in nibh. Donec tincidunt maximus elit, vel elementum lectus tincidunt ac. Proin tempus, nibh sed vehicula posuere, arcu diam luctus turpis, sed elementum mauris lectus et nulla. Suspendisse blandit, felis et laoreet consectetur, leo tortor luctus elit, a hendrerit nisi elit vitae tortor. Proin consectetur vehicula vulputate.', 'Activities', '2023-06-28 20:38:04', '2023-06-28 20:38:04'),
('998574e5-349f-44fb-bb4d-88ab3cea1da1', 'Vestibulum sodales lacinia ipsum ac fermentum. Morbi nunc tellus, commodo vel leo vel, ultricies aliquet magna. Maecenas posuere fermentum semper. Pellentesque id porta tellus, nec mattis lectus. Morbi sit amet dolor ullamcorper eros interdum eleifend in sed sem. Quisque lacinia aliquet nisl, id scelerisque sem. Duis non gravida eros. Nullam vel erat at justo suscipit tincidunt. In vel elementum sem. Aliquam eu nunc nisl. Cras tempus diam fringilla tortor accumsan feugiat. In hac habitasse platea dictumst.', 'Announcement', '2023-06-28 20:38:28', '2023-06-28 20:38:28'),
('99857500-3b23-4e23-83f8-51a069e0f6af', 'Vestibulum sodales lacinia ipsum ac fermentum. Morbi nunc tellus, commodo vel leo vel, ultricies aliquet magna. Maecenas posuere fermentum semper. Pellentesque id porta tellus, nec mattis lectus. Morbi sit amet dolor ullamcorper eros interdum eleifend in sed sem. Quisque lacinia aliquet nisl, id scelerisque sem. Duis non gravida eros. Nullam vel erat at justo suscipit tincidunt. In vel elementum sem. Aliquam eu nunc nisl. Cras tempus diam fringilla tortor accumsan feugiat. In hac habitasse platea dictumst.', 'Activities', '2023-06-28 20:38:46', '2023-06-28 20:38:46'),
('99857526-2db6-441b-a9f8-b3343ca02cab', 'Nulla tempus condimentum blandit. Nullam vestibulum risus vitae vestibulum ultricies. Aliquam sodales mi ut felis ultrices, non ultricies justo ornare. Aliquam aliquam risus libero, ut finibus arcu venenatis rutrum. Sed lacinia tincidunt semper. Sed volutpat aliquam nisi, sed volutpat ligula tristique in. Etiam posuere felis metus, condimentum porta nunc dictum finibus. Integer porta mattis augue vitae maximus. Donec ut ex sem. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'Announcement', '2023-06-28 20:39:11', '2023-06-28 20:39:11'),
('99857542-c8de-4af7-b3c6-e0b5729babd3', 'Nulla tempus condimentum blandit. Nullam vestibulum risus vitae vestibulum ultricies. Aliquam sodales mi ut felis ultrices, non ultricies justo ornare. Aliquam aliquam risus libero, ut finibus arcu venenatis rutrum. Sed lacinia tincidunt semper. Sed volutpat aliquam nisi, sed volutpat ligula tristique in. Etiam posuere felis metus, condimentum porta nunc dictum finibus. Integer porta mattis augue vitae maximus. Donec ut ex sem. Interdum et malesuada fames ac ante ipsum primis in faucibus.', 'Activities', '2023-06-28 20:39:30', '2023-06-28 20:39:30'),
('99857582-34c5-4953-87c2-af7c12529ac2', 'Cras eget dui tempor, ornare felis porttitor, efficitur sapien. Nunc at condimentum sem, vitae placerat urna. Praesent id massa eu nunc fermentum euismod nec ut dolor. Nulla dictum semper enim eu sodales. Vivamus non ligula neque. Integer pharetra, libero at placerat tincidunt, dolor eros facilisis dolor, non sagittis neque purus at libero. Vestibulum lacinia risus ut efficitur laoreet. Duis euismod ac mauris quis faucibus. Nam et tincidunt felis.', 'Activities', '2023-06-28 20:40:11', '2023-06-28 20:40:11'),
('9985a040-8aff-4cb4-b544-26daea30c874', 'Proin ultrices luctus nulla, sit amet dignissim tortor commodo eget. Sed vitae scelerisque quam. Sed bibendum quam id risus molestie facilisis. Vestibulum non fringilla turpis. Sed vel dolor dictum, pulvinar urna malesuada, malesuada massa. Nam et libero non tellus viverra sagittis. Nunc luctus iaculis ligula, ac aliquam odio. Phasellus bibendum leo ut interdum scelerisque. Nam volutpat ac urna sed varius. Etiam magna diam, congue sed arcu sit amet, imperdiet finibus turpis. In ut venenatis urna. Praesent condimentum ipsum nec justo dignissim, eu mattis lacus lacinia. Maecenas consequat dui sit amet tristique efficitur.', 'Announcement', '2023-06-28 22:39:42', '2023-06-28 22:39:42'),
('9985f69b-d227-4eb8-92b0-79677447feff', 'Donec posuere, diam non bibendum lobortis, sem risus rutrum orci, sit amet ornare sem lectus et quam. Mauris in mi suscipit magna blandit placerat semper et eros. Donec non diam ultricies, blandit diam non, tincidunt urna. Praesent in erat vel ipsum posuere maximus. Aenean nec nisi orci. Aliquam vitae leo ante. Nulla odio quam, suscipit ac vestibulum vel, lobortis eget mauri', 'Announcement', '2023-06-29 02:41:11', '2023-06-29 02:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeeds_comment`
--

CREATE TABLE `newsfeeds_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `newsfeeds_id` char(36) NOT NULL,
  `comments` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsfeeds_comment`
--

INSERT INTO `newsfeeds_comment` (`id`, `user_id`, `newsfeeds_id`, `comments`, `created_at`, `updated_at`) VALUES
(1, '99857cc6-8f72-4c18-a159-b14613d2a660', '998574bf-b417-4877-b819-855c73531306', 'woww it\'s nice', '2023-06-28 21:11:28', '2023-06-28 21:11:28'),
(2, '99857cc6-8f72-4c18-a159-b14613d2a660', '998574bf-b417-4877-b819-855c73531306', 'i love it', '2023-06-28 21:11:42', '2023-06-28 21:11:42'),
(3, '99857cc6-8f72-4c18-a159-b14613d2a660', '99857582-34c5-4953-87c2-af7c12529ac2', 'wow', '2023-06-28 22:44:13', '2023-06-28 22:44:13'),
(4, '99857cc6-8f72-4c18-a159-b14613d2a660', '99857582-34c5-4953-87c2-af7c12529ac2', 'ohhh', '2023-06-28 22:45:23', '2023-06-28 22:45:23'),
(5, '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', '9985f69b-d227-4eb8-92b0-79677447feff', 'sdadadasda', '2023-06-29 02:42:59', '2023-06-29 02:42:59'),
(6, '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', '9985f69b-d227-4eb8-92b0-79677447feff', 'sdfsf', '2023-06-29 02:43:20', '2023-06-29 02:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeeds_images`
--

CREATE TABLE `newsfeeds_images` (
  `id` char(36) NOT NULL,
  `newsfeed_id` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsfeeds_images`
--

INSERT INTO `newsfeeds_images` (`id`, `newsfeed_id`, `path`, `created_at`, `updated_at`) VALUES
('998574bf-ee80-4e4b-a062-9b7733a70e10', '998574bf-b417-4877-b819-855c73531306', 'ga8DBLidBxdEoJpPGlsmiH4lj1uq74aVd9pr6KCE.jpg', '2023-06-28 20:38:04', '2023-06-28 20:38:04'),
('998574c0-090d-42bb-a7c9-715cf40ed3f4', '998574bf-b417-4877-b819-855c73531306', 'ZHYWqtKOXdTUJXKuAZCkgn73Co0hwYzvvtDusekb.jpg', '2023-06-28 20:38:04', '2023-06-28 20:38:04'),
('998574c0-0e28-47c9-bc8e-438741d2c22f', '998574bf-b417-4877-b819-855c73531306', 'efyZR3LKjUIhMzr4EOz2fNVlmz6Mtw88uvuaN4Tn.jpg', '2023-06-28 20:38:04', '2023-06-28 20:38:04'),
('998574c0-112f-4562-af79-6f04456bed3c', '998574bf-b417-4877-b819-855c73531306', '3lLf4m0uH5oobJPIaCIX5FaN60ePntmnij9yYSVg.jpg', '2023-06-28 20:38:04', '2023-06-28 20:38:04'),
('998574c0-1460-4860-92cb-34648d88de4e', '998574bf-b417-4877-b819-855c73531306', 'WcagzvjyLFSG8TOKFwT9ZH02Bi97G4oBK0X5a7Rb.jpg', '2023-06-28 20:38:04', '2023-06-28 20:38:04'),
('998574e5-5496-487a-a3ef-b212b2101871', '998574e5-349f-44fb-bb4d-88ab3cea1da1', 'Jifol4SaOCirt1jUHoh5aUTuMk6rcRSH7AoGs3v7.jpg', '2023-06-28 20:38:28', '2023-06-28 20:38:28'),
('99857500-5728-4ca0-9870-17657921c8af', '99857500-3b23-4e23-83f8-51a069e0f6af', 'g4klzmCWM19MI1NHhbbsApI5OnQ7Z03towRgm9sv.jpg', '2023-06-28 20:38:46', '2023-06-28 20:38:46'),
('99857500-5b69-45e5-a5d4-c8560cb58a6b', '99857500-3b23-4e23-83f8-51a069e0f6af', 'MTsxXkjx1QZEPhGKfoOWakIqi4eMg4OdHuejLh9c.jpg', '2023-06-28 20:38:46', '2023-06-28 20:38:46'),
('99857526-4b65-4c01-a06a-450b8416eeb4', '99857526-2db6-441b-a9f8-b3343ca02cab', '39pnS0xjXzSwiLdG5JhTboyNU0gNQO5ZlfcQLIJw.jpg', '2023-06-28 20:39:11', '2023-06-28 20:39:11'),
('99857526-58d2-47f3-bc6c-8b52463cde22', '99857526-2db6-441b-a9f8-b3343ca02cab', 'CmIiBzZN9t5mp5lHD5AklH2Lb8pS2hRQtJFdAOEH.jpg', '2023-06-28 20:39:11', '2023-06-28 20:39:11'),
('99857542-e7bc-4ec2-a7cd-6cb28490bcf7', '99857542-c8de-4af7-b3c6-e0b5729babd3', 'YKLRugsRb2IswpCnJcxIqw3FwlejsdYSP7GOGUoq.jpg', '2023-06-28 20:39:30', '2023-06-28 20:39:30'),
('99857582-4df6-4fa2-b080-cab0db6c06d3', '99857582-34c5-4953-87c2-af7c12529ac2', 'u1ZFhSLpw7dLH3ktpYC57e4c1F7vXyU887n0pA3n.png', '2023-06-28 20:40:11', '2023-06-28 20:40:11'),
('99857582-636b-4c44-8336-29a04fcdc400', '99857582-34c5-4953-87c2-af7c12529ac2', 'UNdUuzyD6ak0acHfyjzGNxRkKI7FXCtmAPaT5nEP.jpg', '2023-06-28 20:40:11', '2023-06-28 20:40:11'),
('99857582-7a91-4dfc-abde-7c2a11b75d69', '99857582-34c5-4953-87c2-af7c12529ac2', '1pTkGP0o5o44Zbdfn3cX0ZVZ3lsUdL5ghs55WLV5.jpg', '2023-06-28 20:40:11', '2023-06-28 20:40:11'),
('9985a040-b388-402c-8a41-d8225c7650ca', '9985a040-8aff-4cb4-b544-26daea30c874', 'CX6lDqU6aWf21mzJtn7pbhbW5oe3ute0atSgD5Td.jpg', '2023-06-28 22:39:42', '2023-06-28 22:39:42'),
('9985f69d-b3bb-4ad1-b86e-85704c483351', '9985f69b-d227-4eb8-92b0-79677447feff', 'WkyxOinsuhkzuRAbYMtacBfhEBXtVdPL39cz5fE1.jpg', '2023-06-29 02:41:12', '2023-06-29 02:41:12'),
('9985f69d-b75e-45ba-9c8e-e23d30721f36', '9985f69b-d227-4eb8-92b0-79677447feff', 'wzYImm7MMvM1VgRsDnOES1JYkMtj0IH1fSTD8nDj.jpg', '2023-06-29 02:41:12', '2023-06-29 02:41:12'),
('9985f69d-bc7a-448a-993c-a37e5c76c7f9', '9985f69b-d227-4eb8-92b0-79677447feff', 'ZzQIDwtyUL12lc2KEeWZ2T8RaoHNIG7o6VwDzy9L.jpg', '2023-06-29 02:41:12', '2023-06-29 02:41:12'),
('9985f69d-c2f9-4277-ba0c-75bdbbbf6775', '9985f69b-d227-4eb8-92b0-79677447feff', 'l4uFZLNrCQlaa3hJaPv6SA5FKK9AeCWJoZDA2ZKy.jpg', '2023-06-29 02:41:12', '2023-06-29 02:41:12'),
('9985f69d-c777-4ffa-abc4-48188bb4b68b', '9985f69b-d227-4eb8-92b0-79677447feff', 'AyAZDijBk9q8ZzLROGkSXDVFLABwbMW693T8H1Ky.jpg', '2023-06-29 02:41:12', '2023-06-29 02:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE `news_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` char(36) NOT NULL,
  `news_id` char(36) NOT NULL,
  `comments` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_comments`
--

INSERT INTO `news_comments` (`id`, `user_id`, `news_id`, `comments`, `created_at`, `updated_at`) VALUES
(1, '99857cc6-8f72-4c18-a159-b14613d2a660', '99857674-0803-4929-948f-5da07a810eb4', 'wow', '2023-06-28 22:45:42', '2023-06-28 22:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `from_id` varchar(255) NOT NULL,
  `to_id` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `seen` mediumint(9) NOT NULL,
  `redirect_link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `from_id`, `to_id`, `content`, `seen`, `redirect_link`, `created_at`, `updated_at`) VALUES
('99857db2-5d8f-43f2-bd16-f7c1513afea5', '99857cc6-8f72-4c18-a159-b14613d2a660', '99857427-aa16-4dbd-bf20-97c704ddd082', 'Mark Andaya Make a request.', 1, '/admin/request/99857db2-3c06-422e-8a6d-bb225f35fdc4/99857db2-5d8f-43f2-bd16-f7c1513afea5', '2023-06-28 21:03:05', '2023-06-28 22:57:57'),
('9985a6d5-8d6f-4cf9-a351-189bbefb77e4', '99857427-aa16-4dbd-bf20-97c704ddd082', '99857cc6-8f72-4c18-a159-b14613d2a660', 'Your request is already processing', 0, '/users/myrequest/99857db2-3c06-422e-8a6d-bb225f35fdc4/9985a6d5-8d6f-4cf9-a351-189bbefb77e4', '2023-06-28 22:58:07', '2023-06-28 22:58:07'),
('9985a6dd-41ea-43b1-b8ae-a203d5a1c6a5', '99857427-aa16-4dbd-bf20-97c704ddd082', '99857cc6-8f72-4c18-a159-b14613d2a660', 'Your request is ready to pickup', 0, '/users/myrequest/99857db2-3c06-422e-8a6d-bb225f35fdc4/9985a6dd-41ea-43b1-b8ae-a203d5a1c6a5', '2023-06-28 22:58:12', '2023-06-28 22:58:12'),
('9985a6e9-a6fa-4ccd-89b4-39c41f5d0a94', '99857427-aa16-4dbd-bf20-97c704ddd082', '99857cc6-8f72-4c18-a159-b14613d2a660', 'Your request is already pickup', 0, '/users/myrequest/99857db2-3c06-422e-8a6d-bb225f35fdc4/9985a6e9-a6fa-4ccd-89b4-39c41f5d0a94', '2023-06-28 22:58:20', '2023-06-28 22:58:20'),
('9985ed30-5665-4419-853d-2c90027abea3', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', '99857427-aa16-4dbd-bf20-97c704ddd082', 'jordan serapion Make a request.', 1, '/admin/request/9985ed30-4acb-4a59-8d2c-8b52fb540ac5/9985ed30-5665-4419-853d-2c90027abea3', '2023-06-29 02:14:50', '2023-06-29 02:16:29'),
('9985edec-c4e6-4714-825f-99ce8f9a7e19', '99857427-aa16-4dbd-bf20-97c704ddd082', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 'Your request is already processing', 1, '/users/myrequest/9985ed30-4acb-4a59-8d2c-8b52fb540ac5/9985edec-c4e6-4714-825f-99ce8f9a7e19', '2023-06-29 02:16:54', '2023-06-29 02:17:08'),
('9985f024-d25b-445d-81d3-a668a35ef0c7', '99857427-aa16-4dbd-bf20-97c704ddd082', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 'Your request is ready to pickup', 1, '/users/myrequest/9985ed30-4acb-4a59-8d2c-8b52fb540ac5/9985f024-d25b-445d-81d3-a668a35ef0c7', '2023-06-29 02:23:06', '2023-06-29 02:23:13'),
('998859f9-c8ce-49c8-b4e0-3470f15b301c', '9988598d-2381-4a77-908a-cb32b4bf3674', '99857427-aa16-4dbd-bf20-97c704ddd082', 'DIck Lomibao Make a request.', 0, '/admin/request/998859f9-bf1f-4947-816e-a4ba1cf12f3a/998859f9-c8ce-49c8-b4e0-3470f15b301c', '2023-06-30 07:10:41', '2023-06-30 07:10:41'),
('998c8b09-aca8-418b-b3b9-4402b47dc1f4', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', '99857427-aa16-4dbd-bf20-97c704ddd082', 'jordan serapion Make a request.', 0, '/admin/request/998c8b08-5790-4b9b-bcb0-d67cbad65628/998c8b09-aca8-418b-b3b9-4402b47dc1f4', '2023-07-02 09:11:11', '2023-07-02 09:11:11'),
('9ac05344-59c7-4ad3-92d6-c98be2d7dd0f', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', '99857427-aa16-4dbd-bf20-97c704ddd082', 'Aljon Cardeño Make a request.', 1, '/admin/request/9ac05344-52e8-48fc-b08d-e09185e8f96c/9ac05344-59c7-4ad3-92d6-c98be2d7dd0f', '2023-12-02 09:10:13', '2023-12-02 09:12:07'),
('9ac055e8-3d6a-4290-9a19-053d528c43b3', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 1, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9ac055e8-3d6a-4290-9a19-053d528c43b3', '2023-12-02 09:17:36', '2023-12-08 17:14:59'),
('9ac05603-5e23-47ca-b6f3-1bac6bc2f166', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is ready to pickup', 1, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9ac05603-5e23-47ca-b6f3-1bac6bc2f166', '2023-12-02 09:17:54', '2023-12-08 17:14:50'),
('9ac05619-2184-45b7-aa85-97377b3098bf', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already pickup', 1, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9ac05619-2184-45b7-aa85-97377b3098bf', '2023-12-02 09:18:08', '2023-12-08 17:13:40'),
('9acd104a-984c-4ae6-87b3-9f8a64128c45', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 1, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acd104a-984c-4ae6-87b3-9f8a64128c45', '2023-12-08 17:08:43', '2023-12-08 17:13:34'),
('9acd12d0-a822-4398-845f-3378d9ebb0cc', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already pickup', 1, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acd12d0-a822-4398-845f-3378d9ebb0cc', '2023-12-08 17:15:46', '2023-12-08 17:17:04'),
('9acd1336-8124-470c-8e12-528ee8c602b6', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', '99857427-aa16-4dbd-bf20-97c704ddd082', 'Aljon Cardeño Make a request.', 0, '/admin/request/9acd1336-7c46-4400-8e72-2f8454aae964/9acd1336-8124-470c-8e12-528ee8c602b6', '2023-12-08 17:16:53', '2023-12-08 17:16:53'),
('9acd141d-45b1-4048-8149-0feb90c87e84', '99857427-aa16-4dbd-bf20-97c704ddd082', '9988598d-2381-4a77-908a-cb32b4bf3674', 'Your request is already processing', 0, '/users/myrequest/998859f9-bf1f-4947-816e-a4ba1cf12f3a/9acd141d-45b1-4048-8149-0feb90c87e84', '2023-12-08 17:19:24', '2023-12-08 17:19:24'),
('9acd1429-1abb-42c6-b6d6-59af8da3edf8', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 1, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acd1429-1abb-42c6-b6d6-59af8da3edf8', '2023-12-08 17:19:32', '2023-12-09 11:43:36'),
('9acea783-eb8f-4ed7-86d0-695296d64067', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', '99857427-aa16-4dbd-bf20-97c704ddd082', 'Aljon Cardeño Make a request.', 0, '/admin/request/9acea783-4405-4890-9787-3483db58d248/9acea783-eb8f-4ed7-86d0-695296d64067', '2023-12-09 12:07:23', '2023-12-09 12:07:23'),
('9aceba33-eabc-48dc-9162-a88e866bfc7f', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9acea783-4405-4890-9787-3483db58d248/9aceba33-eabc-48dc-9162-a88e866bfc7f', '2023-12-09 12:59:39', '2023-12-09 12:59:39'),
('9acebb23-333a-45a6-8953-ec9a8c4b3999', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acebb23-333a-45a6-8953-ec9a8c4b3999', '2023-12-09 13:02:15', '2023-12-09 13:02:15'),
('9acf0b88-7824-4dde-9ae2-60e33a6dab97', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0b88-7824-4dde-9ae2-60e33a6dab97', '2023-12-09 16:47:04', '2023-12-09 16:47:04'),
('9acf0b90-ec05-4434-af2d-ba75263a1671', '99857427-aa16-4dbd-bf20-97c704ddd082', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 'Your request is already processing', 0, '/users/myrequest/9985ed30-4acb-4a59-8d2c-8b52fb540ac5/9acf0b90-ec05-4434-af2d-ba75263a1671', '2023-12-09 16:47:09', '2023-12-09 16:47:09'),
('9acf0b95-977d-4595-9c9b-fb413900a6f1', '99857427-aa16-4dbd-bf20-97c704ddd082', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 'Your request is already processing', 0, '/users/myrequest/9985ed30-4acb-4a59-8d2c-8b52fb540ac5/9acf0b95-977d-4595-9c9b-fb413900a6f1', '2023-12-09 16:47:12', '2023-12-09 16:47:12'),
('9acf0b9a-9fe9-49fb-a3a3-30b0e5e409b5', '99857427-aa16-4dbd-bf20-97c704ddd082', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 'Your request is already processing', 0, '/users/myrequest/998c8b08-5790-4b9b-bcb0-d67cbad65628/9acf0b9a-9fe9-49fb-a3a3-30b0e5e409b5', '2023-12-09 16:47:15', '2023-12-09 16:47:15'),
('9acf0ba2-4d53-41c1-95ff-e798088a4d42', '99857427-aa16-4dbd-bf20-97c704ddd082', '99857cc6-8f72-4c18-a159-b14613d2a660', 'Your request is already processing', 0, '/users/myrequest/99857db2-3c06-422e-8a6d-bb225f35fdc4/9acf0ba2-4d53-41c1-95ff-e798088a4d42', '2023-12-09 16:47:20', '2023-12-09 16:47:20'),
('9acf0ba8-37b7-4a8a-ba6b-be521965c960', '99857427-aa16-4dbd-bf20-97c704ddd082', '99857cc6-8f72-4c18-a159-b14613d2a660', 'Your request is already processing', 0, '/users/myrequest/99857db2-3c06-422e-8a6d-bb225f35fdc4/9acf0ba8-37b7-4a8a-ba6b-be521965c960', '2023-12-09 16:47:24', '2023-12-09 16:47:24'),
('9acf0e01-c348-48ab-9a17-86e03f112b27', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is ready to pickup', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0e01-c348-48ab-9a17-86e03f112b27', '2023-12-09 16:53:59', '2023-12-09 16:53:59'),
('9acf0e07-f052-43c5-b748-04b60ca07d1a', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is ready to pickup', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0e07-f052-43c5-b748-04b60ca07d1a', '2023-12-09 16:54:03', '2023-12-09 16:54:03'),
('9acf0e0b-6c59-41fb-bc91-019d222099d2', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is ready to pickup', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf0e0b-6c59-41fb-bc91-019d222099d2', '2023-12-09 16:54:05', '2023-12-09 16:54:05'),
('9acf0e56-c692-42a9-a14f-09cde387ef9e', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0e56-c692-42a9-a14f-09cde387ef9e', '2023-12-09 16:54:54', '2023-12-09 16:54:54'),
('9acf0e64-9eaa-4d94-ae61-70e5f3d8747f', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf0e64-9eaa-4d94-ae61-70e5f3d8747f', '2023-12-09 16:55:03', '2023-12-09 16:55:03'),
('9acf0ebe-b3cb-4dc7-897b-bd25b31c16ca', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0ebe-b3cb-4dc7-897b-bd25b31c16ca', '2023-12-09 16:56:02', '2023-12-09 16:56:02'),
('9acf0ed0-32d8-4aaf-87b2-006326239b5e', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is ready to pickup', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf0ed0-32d8-4aaf-87b2-006326239b5e', '2023-12-09 16:56:14', '2023-12-09 16:56:14'),
('9acf0f5b-9cb0-4d88-b52f-17639786ed73', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is ready to pickup', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0f5b-9cb0-4d88-b52f-17639786ed73', '2023-12-09 16:57:45', '2023-12-09 16:57:45'),
('9acf0fe9-d50b-421c-b195-9f95656f0c11', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0fe9-d50b-421c-b195-9f95656f0c11', '2023-12-09 16:59:18', '2023-12-09 16:59:18'),
('9acf0ff4-3bab-4141-aac2-1dcc311cb7ee', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf0ff4-3bab-4141-aac2-1dcc311cb7ee', '2023-12-09 16:59:25', '2023-12-09 16:59:25'),
('9acf0ffa-1328-4bf5-9023-c7ed618dc040', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf0ffa-1328-4bf5-9023-c7ed618dc040', '2023-12-09 16:59:29', '2023-12-09 16:59:29'),
('9acf0ffd-a503-4e7c-bfd3-40479447d08e', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf0ffd-a503-4e7c-bfd3-40479447d08e', '2023-12-09 16:59:31', '2023-12-09 16:59:31'),
('9acf1052-6587-430b-8255-b22f7391155d', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf1052-6587-430b-8255-b22f7391155d', '2023-12-09 17:00:27', '2023-12-09 17:00:27'),
('9acf1349-2a9b-41b9-856d-f352bdc16a50', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9ac05344-52e8-48fc-b08d-e09185e8f96c/9acf1349-2a9b-41b9-856d-f352bdc16a50', '2023-12-09 17:08:44', '2023-12-09 17:08:44'),
('9acf18df-8a7b-4c21-a22a-26e4645a8339', '99857427-aa16-4dbd-bf20-97c704ddd082', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 'Your request is ready to pickup', 0, '/users/myrequest/9985ed30-4acb-4a59-8d2c-8b52fb540ac5/9acf18df-8a7b-4c21-a22a-26e4645a8339', '2023-12-09 17:24:22', '2023-12-09 17:24:22'),
('9acf1a71-ba01-41a8-a102-ace860a00d2a', '99857427-aa16-4dbd-bf20-97c704ddd082', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 'Your request is already processing', 0, '/users/myrequest/9acd1336-7c46-4400-8e72-2f8454aae964/9acf1a71-ba01-41a8-a102-ace860a00d2a', '2023-12-09 17:28:45', '2023-12-09 17:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `position` bigint(20) UNSIGNED NOT NULL,
  `term_start` date NOT NULL,
  `term_end` date NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `firstname`, `middlename`, `lastname`, `position`, `term_start`, `term_end`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dick', 'Soriano', 'Lomibao', 2, '2023-06-29', '2023-08-05', 1, '2023-06-28 21:27:53', '2023-12-09 14:41:18'),
(2, 'Jude', 'M', 'Moises', 4, '2023-06-29', '2023-07-29', 1, '2023-06-28 21:28:53', '2023-06-28 21:28:53'),
(3, 'Jordan', 'S', 'Serapion', 4, '2023-06-05', '2023-06-30', 1, '2023-06-28 21:29:21', '2023-06-28 21:29:21'),
(4, 'Mark', 'A', 'Andaya', 4, '2023-06-29', '2023-07-29', 1, '2023-06-28 21:29:43', '2023-06-28 21:29:43'),
(5, 'Elmar', 'M', 'Marquez', 5, '2023-06-29', '2023-07-22', 1, '2023-06-28 21:30:27', '2023-06-28 21:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` char(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `date_posted` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `thumbnail`, `content`, `status`, `slug`, `date_posted`, `created_at`, `updated_at`) VALUES
('99857674-0803-4929-948f-5da07a810eb4', 'Cras eget dui tempor, ornare felis porttitor, efficitur sapien. Nunc at condimentum sem', 'http://localhost/storage/assets/KwEUMeUyFyELDyR7P6IJDP611VDVFH4S2K0kgYqO.jpg', '<p><span style=\"font-size: 16px;\">﻿</span><span style=\"font-family: Inter; font-size: 16px; text-align: justify;\">Cras eget dui tempor, ornare felis porttitor, efficitur sapien. Nunc at condimentum sem, vitae placerat urna. Praesent id massa eu nunc fermentum euismod nec ut dolor. Nulla dictum semper enim eu sodales. Vivamus non ligula neque. Integer pharetra, libero at placerat tincidunt, dolor eros facilisis dolor, non sagittis neque purus at libero. Vestibulum lacinia risus ut efficitur laoreet. Duis euismod ac mauris quis faucibus. Nam et tincidunt felis.</span></p><p><span style=\"font-family: Inter; font-size: 16px; text-align: justify;\"><br></span></p><p><img src=\"http://localhost/storage/assets/KwEUMeUyFyELDyR7P6IJDP611VDVFH4S2K0kgYqO.jpg\" style=\"width: 100%;\"><span style=\"font-family: Inter; font-size: 16px; text-align: justify;\"><br></span></p><p><span style=\"font-family: Inter; font-size: 16px; text-align: justify;\"><br></span></p><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Nulla tempus condimentum blandit. Nullam vestibulum risus vitae vestibulum ultricies. Aliquam sodales mi ut felis ultrices, non ultricies justo ornare. Aliquam aliquam risus libero, ut finibus arcu venenatis rutrum. Sed lacinia tincidunt semper. Sed volutpat aliquam nisi, sed volutpat ligula tristique in. Etiam posuere felis metus, condimentum porta nunc dictum finibus. Integer porta mattis augue vitae maximus. Donec ut ex sem. Interdum et malesuada fames ac ante ipsum primis in faucibus.</span><span style=\"font-family: Inter; font-size: 16px; text-align: justify;\"><br></span></p>', 1, 'cras-eget-dui-tempor-ornare-felis-porttitor-efficitur-sapien-nunc-at-condimentum-sem', '2023-06-29 04:42:50', '2023-06-28 20:42:50', '2023-06-28 20:42:50'),
('998576cf-b3cb-4a3a-a0a6-a1b6a50dee05', 'Proin in ex ante. Nunc eget lorem felis. Nullam ac odio aliquet, consequat ex eget, aliquam elit. Aliquam at vestibulum erat.', 'http://localhost/storage/assets/fZNCBr030MsuPXRlB9dgu8KY9ZnTIMkYcUNdUJ7t.jpg', '<p><img src=\"http://localhost/storage/assets/fZNCBr030MsuPXRlB9dgu8KY9ZnTIMkYcUNdUJ7t.jpg\" style=\"width: 100%;\"></p><p><br></p><p style=\"margin-bottom: 15px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-size: 16px;\">Quisque eu neque velit. Nam volutpat ornare viverra. Integer a lorem sed nisi finibus dapibus ut et ligula. Phasellus dictum, orci eu posuere gravida, justo lacus congue ex, non ullamcorper nunc ipsum sed est. Phasellus pretium pulvinar erat id rutrum. Mauris id sagittis tortor, sed congue massa. Fusce laoreet tristique velit in mattis.</span></p><p style=\"margin-bottom: 15px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-size: 16px;\">Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean elementum purus erat, non ornare velit mattis ut. Vivamus faucibus pharetra felis sit amet sollicitudin. Nunc faucibus varius nunc sit amet pharetra. Aliquam velit nunc, posuere at porttitor ac, blandit et ante. Nulla nec imperdiet risus.</span></p><p style=\"margin-bottom: 15px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px;\"><span style=\"font-size: 16px;\">Vestibulum sodales lacinia ipsum ac fermentum. Morbi nunc tellus, commodo vel leo vel, ultricies aliquet magna. Maecenas posuere fermentum semper. Pellentesque id porta tellus, nec mattis lectus. Morbi sit amet dolor ullamcorper eros interdum eleifend in sed sem. Quisque lacinia aliquet nisl, id scelerisque sem. Duis non gravida eros. Nullam vel erat at justo suscipit tincidunt. In vel elementum sem. Aliquam eu nunc nisl. Cras tempus diam fringilla tortor accumsan feugiat. In hac habitasse platea dictumst.</span></p>', 1, 'proin-in-ex-ante-nunc-eget-lorem-felis-nullam-ac-odio-aliquet-consequat-ex-eget-aliquam-elit-aliquam-at-vestibulum-erat', '2023-06-29 04:43:50', '2023-06-28 20:43:50', '2023-06-28 20:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `request_list`
--

CREATE TABLE `request_list` (
  `id` char(36) NOT NULL,
  `owner_id` varchar(255) NOT NULL,
  `service_id` mediumint(9) NOT NULL,
  `purpose` text NOT NULL,
  `status` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_list`
--

INSERT INTO `request_list` (`id`, `owner_id`, `service_id`, `purpose`, `status`, `created_at`, `updated_at`) VALUES
('99857db2-3c06-422e-8a6d-bb225f35fdc4', '99857cc6-8f72-4c18-a159-b14613d2a660', 1, 'for my birthday', 1, '2023-06-28 21:03:05', '2023-12-09 16:47:20'),
('9985ed30-4acb-4a59-8d2c-8b52fb540ac5', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 1, 'for my it', 2, '2023-06-29 02:14:50', '2023-12-09 17:24:22'),
('998859f9-bf1f-4947-816e-a4ba1cf12f3a', '9988598d-2381-4a77-908a-cb32b4bf3674', 1, 'for mee', 1, '2023-06-30 07:10:41', '2023-12-08 17:19:24'),
('998c8b08-5790-4b9b-bcb0-d67cbad65628', '9985eb9a-ac5c-4e77-b03a-a6216f0516fa', 1, 'For my schools', 1, '2023-07-02 09:11:11', '2023-12-09 16:47:15'),
('9ac05344-52e8-48fc-b08d-e09185e8f96c', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 2, 'dasda', 1, '2023-12-02 09:10:13', '2023-12-09 16:59:18'),
('9acd1336-7c46-4400-8e72-2f8454aae964', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 1, 'ewqewq', 1, '2023-12-08 17:16:53', '2023-12-09 16:59:29'),
('9acea783-4405-4890-9787-3483db58d248', '9ac052b1-aa67-4ae5-9f4c-7005a8a79801', 1, 'sample', 1, '2023-12-09 12:07:23', '2023-12-09 12:59:39');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `created_at`, `updated_at`) VALUES
(1, 'Barangay Clearance', NULL, NULL),
(2, 'Certificate of Indigency', NULL, NULL),
(3, 'asdadasd', '2023-07-02 01:40:08', '2023-07-02 01:40:08'),
(4, '123131', '2023-07-02 01:41:03', '2023-07-02 01:41:03'),
(5, 'asdad', '2023-07-02 01:41:40', '2023-07-02 01:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `user_code` varchar(200) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `type` smallint(6) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `id_status` tinyint(4) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL,
  `front_id` varchar(255) NOT NULL,
  `back_id` varchar(255) NOT NULL,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_code`, `name`, `firstname`, `middlename`, `lastname`, `gender`, `birthdate`, `type`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `active_status`, `id_status`, `avatar`, `front_id`, `back_id`, `dark_mode`, `messenger_color`) VALUES
('99857427-aa16-4dbd-bf20-97c704ddd082', '2010581866272', 'Alitaya Admin', 'Alitaya', '', 'Admin', 'Male', '2001-12-09', 1, 'admin@gmail.com', NULL, '$2y$10$zp6IyivT/JFw6OEaCZb0ceZw9AXLZhaYh4kaumuk5M1sjdaxzD5J.', NULL, '2023-06-28 20:36:24', '2023-12-09 16:36:06', 0, 1, 'http://127.0.0.1:8000/storage/user_image/MvKSqOUafrwvFiTscffh8bo6O0wD5AOsnVReAr2y.jpg', '', '', 0, NULL),
('99857cc6-8f72-4c18-a159-b14613d2a660', '2010581866273', 'Mark Andaya', 'Mark', '', 'Andaya', 'Male', '2023-06-29', 0, 'markandaya@gmail.com', NULL, '$2y$10$PD4qYeif0g1N7rEo7Xe08OnT4u9xK9MOctqnjEXe3tcDcSBUcd8I6', NULL, '2023-06-28 21:00:30', '2023-12-09 16:20:02', 0, 0, 'http://127.0.0.1:8000/storage/user_image/Drag2B03qmp2Fd4vDM1n3e7xzSre1pWUQ0bVrJm6.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.png', 0, NULL),
('9985b751-550c-403e-af4f-2c8fcd6b9341', '2010581866274', 'Elmar marquez', 'Elmar', '', 'marquez', 'Male', '2023-06-06', 0, 'elmar123@gmail.com', NULL, '$2y$10$UpEJ0UhDUSBZGMVJF5UmZO.vdp5S6VbXDcxPdV8M.he9De0QbiTby', NULL, '2023-06-28 23:44:12', '2023-12-09 16:22:35', 0, 2, 'http://127.0.0.1:8000/storage/user_image/DpvEWd0dLbbjdR2detQps3ky9Z8Z70ODFdcDwZfH.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.png', 0, NULL),
('9985eb9a-ac5c-4e77-b03a-a6216f0516fa', '2010581866235', 'jordan serapion', 'jordan', 's', 'serapion', 'Male', '2023-06-29', 0, 'jordans@gmail.com', NULL, '$2y$10$Im7v88UfsQQHHU4tsHAbR.fMn9cwEzltvfkKw2J1mBvDxpfZnOTc2', NULL, '2023-06-29 02:10:25', '2023-12-09 16:20:04', 0, 0, 'http://127.0.0.1:8000/storage/user_image/yZmmX6iRbYYWiQtcjlWXdZuArx71qGPcVCOrpbBt.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.png', 0, NULL),
('9988598d-2381-4a77-908a-cb32b4bf3674', '2010581866270', 'DIck Lomibao', 'DIck', 'Soriano', 'Lomibao', 'Male', '2023-06-30', 0, 'dicksorianolomibao@gmail.com', NULL, '$2y$10$w3Uos7P89CGl/QlAsMyx/uGbzDVg7K1thY4RU1UASIvqT1aJUTp.e', NULL, '2023-06-30 07:09:30', '2023-12-09 16:23:26', 0, 2, 'http://127.0.0.1:8000/storage/user_image/iWUI1x66aLDCYAAC5FSMuRLBXs6rBInZtaFzCFRe.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.png', 0, NULL),
('9ac052b1-aa67-4ae5-9f4c-7005a8a79801', '2010581866277', 'Aljon Cardeño', 'Aljon', '', 'Cardeño', 'Male', '2000-12-10', 0, 'aljon@gmail.com', NULL, '$2y$10$to7WhNA3taQaJTnWv30pIeotjbQlRuASmkHSLg5PYoDt0qE5liV3y', NULL, '2023-12-02 09:08:37', '2023-12-12 10:00:23', 0, 2, 'http://127.0.0.1:8000/storage/user_image/E1WNWYyuhCR1tHBgjWjHJCqPYhVzZg7DBxKJR0MK.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.png', 0, NULL),
('9ad4adb1-bdea-4b1e-889c-e66b344409b1', '2010581866275', 'Louise Angelo Bucao', 'Louise Angelo', 'Sarasa', 'Bucao', 'Female', '2001-02-02', 0, 'louise@gmail.com', NULL, '$2y$10$wm5o1KjUxk9dDy0q/y9FfuD7DW/7usKKQI5GJypzXlHlgJWB2ggU2', NULL, '2023-12-12 11:59:38', '2023-12-12 11:59:38', 0, 0, 'http://127.0.0.1:8000/storage/user_image/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.jpg', 'http://127.0.0.1:8000/storage/valid_id/1702382378.png', 0, NULL),
('9ad4fde8-b93d-4a00-af86-cc36d6bebc46', '2010581866276', 'Jude Moises', 'Jude', '', 'Moises', 'Male', '2001-06-21', 0, 'moises53@gmail.com', NULL, '$2y$10$DNBp9r0Ssna/1kN0/amTGOx5S7e6jTVsSsrv0sATfF6Xc2akmnCCS', NULL, '2023-12-12 15:43:56', '2023-12-12 15:43:56', 0, 0, 'http://127.0.0.1:8000/storage/user_image/1702395835.png', 'http://127.0.0.1:8000/storage/valid_id/1702395835.png', 'http://127.0.0.1:8000/storage/valid_id/1702395835.png', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_positions`
--
ALTER TABLE `barangay_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blotters`
--
ALTER TABLE `blotters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
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
-- Indexes for table `newsfeeds`
--
ALTER TABLE `newsfeeds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsfeeds_comment`
--
ALTER TABLE `newsfeeds_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `newsfeeds_comment_newsfeeds_id_foreign` (`newsfeeds_id`),
  ADD KEY `newsfeeds_comment_user_id_foreign` (`user_id`);

--
-- Indexes for table `newsfeeds_images`
--
ALTER TABLE `newsfeeds_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_comments_news_id_foreign` (`news_id`),
  ADD KEY `news_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `officials_position_foreign` (`position`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_list`
--
ALTER TABLE `request_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barangay_positions`
--
ALTER TABLE `barangay_positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blotters`
--
ALTER TABLE `blotters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `newsfeeds_comment`
--
ALTER TABLE `newsfeeds_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `newsfeeds_comment`
--
ALTER TABLE `newsfeeds_comment`
  ADD CONSTRAINT `newsfeeds_comment_newsfeeds_id_foreign` FOREIGN KEY (`newsfeeds_id`) REFERENCES `newsfeeds` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `newsfeeds_comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD CONSTRAINT `news_comments_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `news_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `officials`
--
ALTER TABLE `officials`
  ADD CONSTRAINT `officials_position_foreign` FOREIGN KEY (`position`) REFERENCES `barangay_positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
