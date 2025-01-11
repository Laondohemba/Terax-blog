-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jan 11, 2025 at 04:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teraxblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2025-01-11 14:23:21', '2025-01-11 14:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(6, '2024-12-09-191128', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1736607671, 1),
(7, '2024-12-24-180922', 'App\\Database\\Migrations\\CreatePostsTable', 'default', 'App', 1736607671, 1),
(8, '2024-12-26-143829', 'App\\Database\\Migrations\\AddImageColumnToPostsTable', 'default', 'App', 1736607671, 1),
(9, '2024-12-27-092736', 'App\\Database\\Migrations\\CreateCommentsTable', 'default', 'App', 1736607671, 1),
(10, '2024-12-27-161439', 'App\\Database\\Migrations\\CreateLikesTable', 'default', 'App', 1736607671, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'First post', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus harum consequatur, officiis cumque tenetur veritatis et modi exercitationem officia maxime minima veniam repudiandae nam eaque corporis odio quia earum atque quam delectus eligendi? Voluptate enim molestiae voluptatum assumenda suscipit quisquam excepturi nulla doloribus, expedita vitae perferendis vero! Placeat, aperiam expedita.', 'uploads/post_images/blog.png', '2025-01-11 14:14:19', '2025-01-11 14:14:19'),
(2, 1, 'Second Lorem, ipsum dolor sit amet consectetu', 'Second Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus harum consequatur, officiis cumque tenetur veritatis et modi exercitationem officia maxime minima veniam repudiandae nam eaque corporis odio quia earum atque quam delectus eligendi? Voluptate enim molestiae voluptatum assumenda suscipit quisquam excepturi nulla doloribus, expedita vitae perferendis vero! Placeat, aperiam expedita.', 'uploads/post_images/portfolio4.png', '2025-01-11 14:17:02', '2025-01-11 14:17:02'),
(3, 1, 'Consequatur, facilis fuga! Doloribus ', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque fugit odit, quibusdam aperiam veritatis quas, optio modi fugiat ut laudantium ratione expedita. Nam nisi id voluptate excepturi, totam cupiditate quos eius sint tempore deserunt exercitationem sapiente impedit animi a velit nesciunt qui in eos fugiat possimus, quod at vel blanditiis fugit! Consequatur, facilis fuga! Doloribus repudiandae non voluptates blanditiis?\r\n\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi neque fugit odit, quibusdam aperiam veritatis quas, optio modi fugiat ut laudantium ratione expedita. Nam nisi id voluptate excepturi, totam cupiditate quos eius sint tempore deserunt exercitationem sapiente impedit animi a velit nesciunt qui in eos fugiat possimus, quod at vel blanditiis fugit! Consequatur, facilis fuga! Doloribus repudiandae non voluptates blanditiis?', 'uploads/post_images/cover letter 2.png', '2025-01-11 14:18:31', '2025-01-11 14:18:31'),
(4, 2, 'Maiores eos ducimus, aspernatur omnis, placeat, alias', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat magnam eligendi accusantium aliquam mollitia officiis. Fugit, neque. Non earum cumque dolore rem error eos dolor nobis voluptatum repellendus, nam fugiat incidunt suscipit ea ad. Maiores eos ducimus, aspernatur omnis, placeat, alias et voluptate excepturi fugit nam dolore dolores eum. Porro.\r\n\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat magnam eligendi accusantium aliquam mollitia officiis. Fugit, neque. Non earum cumque dolore rem error eos dolor nobis voluptatum repellendus, nam fugiat incidunt suscipit ea ad. Maiores eos ducimus, aspernatur omnis, placeat, alias et voluptate excepturi fugit nam dolore dolores eum. Porro.', 'uploads/post_images/chech palindrome js_1.png', '2025-01-11 14:24:26', '2025-01-11 14:24:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'luper', 'luper@mail.com', '$2y$10$xWAUoJ6gYfr9jdbI5dX0p.ofpx/q..Hccu9lZja93Mzpgu7y9ATT2', '2025-01-11 15:12:52', '2025-01-11 15:12:52'),
(2, 'aondohemba', 'aondohemba@gmail.com', '$2y$10$3gm/decYZAMEdD.PAKhi2u4PDpn5rWZHh2s3qvAzT9/RxVb1Vc.lS', '2025-01-11 15:19:26', '2025-01-11 15:19:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
