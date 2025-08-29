-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2025 at 04:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumah`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `status` enum('draft','published','archived') DEFAULT 'draft',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `slug`, `content`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 'Explicabo perspiciatis non odit accusamus.', 'explicabo-perspiciatis-non-odit-accusamus.', 'Dignissimos ipsa harum natus molestiae. Tenetur ipsum ea consequatur iusto laborum. Deserunt illo et dolorem.\nRatione consectetur hic cupiditate. Quos architecto quae animi provident eligendi quibusdam.\nTenetur non non numquam. Velit totam ducimus id at maxime.', '/images/article_1.jpg', 'draft', '2025-05-22 12:32:07', '2025-01-17 16:28:32'),
(2, 7, 'Enim dolore eos.', 'enim-dolore-eos.', 'Tempore dolores temporibus delectus optio. Cumque provident odio ipsam illum.\nVeniam facilis cum voluptas ab. Consequuntur cum ducimus nisi.\nPerspiciatis dicta soluta facilis sint. Qui reprehenderit accusamus. Sunt soluta accusamus iusto incidunt vitae atque.', '/images/article_2.jpg', 'draft', '2025-05-29 07:06:58', '2025-05-21 07:53:52'),
(3, 2, 'Cumque ratione aliquam dolores.', 'cumque-ratione-aliquam-dolores.', 'Quia tenetur iure dicta ipsum.\nNemo optio accusantium occaecati. Omnis autem totam ut. Explicabo quos explicabo officia.\nHic voluptatibus ex asperiores. Ratione consectetur ad facere impedit.\nUt repudiandae exercitationem fuga amet. Laborum consequatur veritatis dignissimos.', '/images/article_3.jpg', 'archived', '2025-08-03 21:04:02', '2025-03-04 13:10:52'),
(4, 5, 'Incidunt quae corrupti nisi tenetur.', 'incidunt-quae-corrupti-nisi-tenetur.', 'Expedita ipsum nobis tenetur. Nam ab provident accusamus laborum nihil.\nMinus delectus harum corporis repellendus blanditiis. Dolor voluptatum eum amet fugit totam.', '/images/article_4.jpg', 'archived', '2025-08-26 17:20:59', '2025-06-04 18:25:40'),
(5, 6, 'Rerum debitis tempore voluptas occaecati.', 'rerum-debitis-tempore-voluptas-occaecati.', 'Eos magnam nam dolorem doloribus. Nihil sequi harum repellat.\nAd quia ullam quisquam pariatur molestiae dolorum. Impedit illo rerum laudantium suscipit voluptas fuga ipsa. Corporis impedit recusandae numquam.', '/images/article_5.jpg', 'archived', '2025-08-09 07:17:31', '2025-01-09 18:14:17'),
(6, 7, 'Corporis molestiae iusto harum quo.', 'corporis-molestiae-iusto-harum-quo.', 'Quam velit ullam consequatur explicabo laboriosam. In ratione vero voluptas velit illo vitae quia.\nCorrupti repellat laboriosam nisi culpa. Fugiat exercitationem ratione veritatis porro vitae nisi. Nesciunt eos dolorem. Libero reprehenderit repudiandae odio laboriosam reiciendis.', '/images/article_6.jpg', 'archived', '2025-08-17 15:28:00', '2025-01-19 06:35:15'),
(7, 4, 'Sit architecto eos aliquid doloremque.', 'sit-architecto-eos-aliquid-doloremque.', 'Porro cum sapiente hic cum corporis aperiam. Dolorem soluta repellendus molestias aspernatur.\nTemporibus esse temporibus. Consectetur deserunt minus iusto facilis amet.\nQuo id non non quis consectetur. Reiciendis maxime harum suscipit exercitationem.', '/images/article_7.jpg', 'archived', '2025-06-16 19:12:17', '2025-08-23 00:02:17'),
(8, 8, 'Ea numquam placeat.', 'ea-numquam-placeat.', 'Saepe ducimus eius enim facilis occaecati. Officiis aperiam aperiam qui. Dolore iste iure ea quod quibusdam.\nConsequatur cupiditate occaecati quidem reprehenderit commodi. Recusandae iusto modi alias aspernatur sunt.', '/images/article_8.jpg', 'draft', '2025-06-07 20:31:35', '2025-01-26 00:18:51'),
(9, 3, 'Similique magnam facilis totam.', 'similique-magnam-facilis-totam.', 'Unde laborum nihil dignissimos suscipit. Quod vel ex repellendus neque molestias. Unde aliquid repellendus dolorem facilis voluptatem.\nAtque voluptatem assumenda magnam et doloremque expedita. Repellendus veritatis autem non. Reprehenderit repellendus ullam porro ullam.', '/images/article_9.jpg', 'archived', '2025-07-15 03:41:50', '2025-04-25 01:18:03'),
(10, 1, 'Reiciendis harum distinctio.', 'reiciendis-harum-distinctio.', 'Molestias neque ducimus eligendi commodi. Quas consectetur minus deserunt voluptate enim doloremque. Nostrum voluptate occaecati beatae.\nAccusantium architecto necessitatibus minus. Odio mollitia quas excepturi.\nVero architecto eius mollitia.', '/images/article_10.jpg', 'archived', '2025-03-30 02:12:12', '2025-08-11 12:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `type`, `value`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'telepon', '+6281234567890', 'phone', 'aktif', '2025-08-29 13:35:13', '2025-08-29 13:35:13'),
(2, 'whatsapp', 'https://wa.me/6281234567890', 'whatsapp', 'aktif', '2025-08-29 13:35:13', '2025-08-29 13:35:13'),
(3, 'email', 'info@properti.com', 'envelope', 'aktif', '2025-08-29 13:35:13', '2025-08-29 13:35:13'),
(4, 'alamat', 'Jl. Raya Sudirman No. 123, Jakarta', 'map-marker', 'aktif', '2025-08-29 13:35:13', '2025-08-29 13:35:13'),
(5, 'facebook', 'https://facebook.com/properti', 'facebook', 'aktif', '2025-08-29 13:35:13', '2025-08-29 13:35:13'),
(6, 'instagram', 'https://instagram.com/properti', 'instagram', 'aktif', '2025-08-29 13:35:13', '2025-08-29 13:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `property_id`, `created_at`) VALUES
(1, 4, 7, '2025-05-23 11:28:09'),
(2, 7, 3, '2025-03-04 23:15:23'),
(3, 8, 2, '2025-07-24 02:10:56'),
(4, 3, 1, '2025-06-12 09:46:45'),
(5, 10, 5, '2025-06-23 21:55:20'),
(6, 1, 1, '2025-05-06 12:37:13'),
(7, 4, 6, '2025-05-16 05:28:56'),
(8, 9, 4, '2025-07-29 19:50:30'),
(9, 8, 5, '2025-04-16 18:21:10'),
(10, 8, 1, '2025-04-28 23:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `status` enum('available','sold','rented') DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `title`, `description`, `type`, `price`, `address`, `city`, `province`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Properti 1 - Apartemen', 'Quis eaque doloremque atque culpa modi nostrum. Perspiciatis accusamus cumque numquam.', 'Rumah', 1092054834.00, 'Gang Suniaraja No. 04\nCimahi, DI Yogyakarta 03403', 'Jayapura', 'Sulawesi Tenggara', 'rented', '2025-08-04 11:56:49', '2025-04-08 19:19:14'),
(2, 7, 'Properti 2 - Apartemen', 'Voluptatem optio consequatur possimus voluptatibus voluptatum. Sint omnis quas.', 'Rumah', 1197209356.00, 'Jl. Sukabumi No. 47\nSibolga, JK 65408', 'Bekasi', 'Kepulauan Bangka Belitung', 'available', '2025-03-26 16:45:47', '2025-04-25 01:30:18'),
(3, 7, 'Properti 3 - Ruko', 'Iusto eos repellendus nisi veniam ducimus vitae. Aliquid ipsum distinctio.', 'Villa', 1528924578.00, 'Gg. Bangka Raya No. 42\nTebingtinggi, Kalimantan Timur 08907', 'Kota Administrasi Jakarta Utara', 'Maluku', 'available', '2025-07-31 13:28:46', '2025-03-20 18:23:16'),
(4, 7, 'Properti 4 - Ruko', 'Labore nemo ab accusamus esse quas quos. Ab porro dolor eum explicabo vel.', 'Apartemen', 1698402164.00, 'Jl. Jayawijaya No. 0\nMakassar, Bengkulu 34696', 'Kota Administrasi Jakarta Utara', 'Jambi', 'available', '2025-03-30 23:01:42', '2025-02-09 18:29:45'),
(5, 1, 'Properti 5 - Villa', 'Modi iure tempora porro eveniet. Perspiciatis perferendis iusto placeat.', 'Ruko', 1118807006.00, 'Jl. Laswi No. 65\nLhokseumawe, Nusa Tenggara Timur 21466', 'Batu', 'Maluku Utara', 'available', '2025-01-08 09:15:00', '2025-03-06 00:57:37'),
(6, 1, 'Properti 6 - Rumah', 'Impedit modi veniam nulla corporis. Molestias non libero corrupti quidem eaque.', 'Apartemen', 1152261580.00, 'Jl. Setiabudhi No. 6\nBlitar, AC 49609', 'Palopo', 'Gorontalo', 'rented', '2025-04-23 16:04:26', '2025-03-07 09:19:15'),
(7, 7, 'Properti 7 - Apartemen', 'Deleniti quos omnis blanditiis distinctio libero. Voluptates quos dolore quos molestias eos libero.', 'Villa', 1959698936.00, 'Gg. PHH. Mustofa No. 51\nYogyakarta, KR 88094', 'Prabumulih', 'Kepulauan Riau', 'rented', '2025-06-18 02:04:11', '2025-08-07 19:17:25'),
(8, 7, 'Properti 8 - Tanah', 'Iure sint provident velit facilis ratione. Itaque repudiandae voluptatum sequi sit.', 'Rumah', 958744674.00, 'Gang Sentot Alibasa No. 0\nKota Administrasi Jakarta Pusat, Nusa Tenggara Barat 58961', 'Subulussalam', 'Gorontalo', 'rented', '2025-04-20 10:26:34', '2025-02-20 18:03:03'),
(9, 7, 'Properti 9 - Ruko', 'Maxime temporibus dignissimos at est. Nam at magni voluptatem cum.', 'Villa', 1994988496.00, 'Gg. Gegerkalong Hilir No. 523\nBalikpapan, SU 74438', 'Dumai', 'Papua', 'rented', '2025-06-03 01:38:23', '2025-07-07 18:09:19'),
(10, 1, 'Properti 10 - Ruko', 'Vel illum saepe dolor. Laudantium aut error facere optio quae voluptatum.', 'Apartemen', 1352127849.00, 'Jl. BKR No. 41\nTasikmalaya, AC 66716', 'Lubuklinggau', 'Bengkulu', 'sold', '2025-05-25 01:55:50', '2025-07-06 07:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `property_categories`
--

CREATE TABLE `property_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property_categories`
--

INSERT INTO `property_categories` (`id`, `name`, `slug`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Rumah', NULL, 'Properti berupa rumah tinggal', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(2, 'Apartemen', NULL, 'Unit apartemen di gedung bertingkat', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(3, 'Tanah', NULL, 'Lahan kosong siap bangun', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(4, 'Ruko', NULL, 'Rumah toko untuk usaha', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(5, 'Kantor', NULL, 'Gedung atau ruang kantor', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(6, 'Gudang', NULL, 'Bangunan untuk penyimpanan barang', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(7, 'Villa', NULL, 'Rumah villa untuk liburan', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(8, 'Kos', NULL, 'Bangunan kost untuk disewakan', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(9, 'Hotel', NULL, 'Bangunan komersial untuk penginapan', 'nonaktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50'),
(10, 'Lainnya', NULL, 'Kategori properti lainnya', 'aktif', '2025-08-29 13:27:50', '2025-08-29 13:27:50');

-- --------------------------------------------------------

--
-- Table structure for table `property_images`
--

CREATE TABLE `property_images` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `is_primary` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `agen_id` int(11) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `status` enum('pending','success','cancel') DEFAULT 'pending',
  `tanggal_penjualan` date DEFAULT NULL,
  `tanggal_serah_terima` date DEFAULT NULL,
  `validator` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `property_id`, `agen_id`, `price`, `status`, `tanggal_penjualan`, `tanggal_serah_terima`, `validator`, `created_at`) VALUES
(1, 8, 2, 958744674.00, 'pending', '0000-00-00', '0000-00-00', 10, '2025-04-26 15:00:49'),
(2, 6, 3, 1152261580.00, 'success', '0000-00-00', '0000-00-00', 6, '2025-01-01 01:38:52'),
(3, 8, 4, 958744674.00, 'cancel', '0000-00-00', '0000-00-00', 8, '2025-07-12 01:29:42'),
(4, 2, 4, 1197209356.00, 'cancel', '0000-00-00', '0000-00-00', 8, '2025-04-06 13:12:33'),
(5, 3, 2, 1528924578.00, 'cancel', '0000-00-00', '0000-00-00', 6, '2025-07-29 05:54:18'),
(6, 2, 2, 1197209356.00, 'pending', '0000-00-00', '0000-00-00', 8, '2025-07-13 12:26:28'),
(7, 5, 2, 1118807006.00, 'cancel', '0000-00-00', '0000-00-00', 6, '2025-01-19 11:08:37'),
(8, 2, 2, 1197209356.00, 'pending', '0000-00-00', '0000-00-00', 8, '2025-01-15 06:42:32'),
(9, 7, 4, 1959698936.00, 'pending', '0000-00-00', '0000-00-00', 9, '2025-02-08 20:00:55'),
(10, 9, 2, 1994988496.00, 'success', '0000-00-00', '0000-00-00', 8, '2025-06-27 18:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('owner','admin','agen') NOT NULL DEFAULT 'agen',
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ir. Hamima Budiyanto', 'putraalmira@gmail.com', 'hashed_password', '+62-839-769-9141', 'owner', 'aktif', '2025-04-04 08:49:51', '2025-01-16 03:58:24'),
(2, 'Jasmani Wibowo', 'puspahidayanto@ud.mil', 'hashed_password', '+62-414-605-9511', 'agen', 'aktif', '2025-03-02 07:15:24', '2025-01-09 07:26:30'),
(3, 'Cornelia Hartati', 'mmahendra@pt.int', 'hashed_password', '+62 (0615) 704 3813', 'agen', 'aktif', '2025-02-25 13:48:16', '2025-07-28 07:29:10'),
(4, 'Maida Oktaviani, S.Sos', 'palastrichelsea@yahoo.com', 'hashed_password', '(0931) 945-4614', 'agen', 'aktif', '2025-07-04 03:40:33', '2025-04-10 16:37:14'),
(5, 'Soleh Andriani', 'mbudiman@pd.mil', 'hashed_password', '+62 (0273) 887-9821', 'admin', 'aktif', '2025-08-05 08:22:19', '2025-08-05 01:16:23'),
(6, 'Drs. Dian Pratama, S.IP', 'edi80@gmail.com', 'hashed_password', '+62-082-479-2432', 'admin', 'aktif', '2025-06-17 08:21:52', '2025-03-15 22:17:48'),
(7, 'Winda Rahayu', 'hastutiira@yahoo.com', 'hashed_password', '+62-705-905-2907', 'owner', 'aktif', '2025-08-04 18:01:55', '2025-05-17 07:26:15'),
(8, 'Safina Mansur, S.E.I', 'tirawan@pt.int', 'hashed_password', '(040) 360-2920', 'admin', 'aktif', '2025-06-12 19:00:19', '2025-05-13 17:43:31'),
(9, 'Kawaca Andriani', 'dtampubolon@ud.my.id', 'hashed_password', '+62-0299-251-7969', 'admin', 'aktif', '2025-07-12 03:45:29', '2025-06-14 12:07:09'),
(10, 'Nyoman Anggriawan, M.M.', 'lestariatmaja@ud.edu', 'hashed_password', '0868280629', 'admin', 'aktif', '2025-06-18 22:03:06', '2025-03-19 10:17:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `property_categories`
--
ALTER TABLE `property_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_images`
--
ALTER TABLE `property_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property_id` (`property_id`),
  ADD KEY `agen_id` (`agen_id`),
  ADD KEY `validator` (`validator`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_categories`
--
ALTER TABLE `property_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `property_images`
--
ALTER TABLE `property_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `property_images`
--
ALTER TABLE `property_images`
  ADD CONSTRAINT `property_images_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`agen_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_ibfk_3` FOREIGN KEY (`validator`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
