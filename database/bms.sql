-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 07:42 PM
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
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(100) NOT NULL,
  `book_category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `book_cate`
--

CREATE TABLE `book_cate` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `get_return_books`
--

CREATE TABLE `get_return_books` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `no_of_book` int(11) NOT NULL,
  `get_date` date NOT NULL,
  `contact_no` int(11) NOT NULL,
  `member` varchar(255) NOT NULL,
  `return_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nic` varchar(13) NOT NULL,
  `register_date` date NOT NULL,
  `contact_no` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `meta_icon` varchar(255) NOT NULL,
  `login_bg_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`, `logo`, `meta_icon`, `login_bg_image`, `created_at`, `updated_at`) VALUES
(1, 'Book Managment System', '38188ebbeeca297eed7986d1262dafbbWhatsApp Image 2023-10-08 at 20.59.24_cd0fbbd8.jpg.png', '736f09bbbab82d2d94112ce63e24ff73image.jpg.png', '8a765eea69635577f7a8891e0c3079eaWhatsApp Image 2023-10-08 at 20.59.27_3d51eaf6.jpg.png', '2024-06-20 03:24:08', '2024-06-20 03:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_roll` int(11) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_roll`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dinesh', 'dinesh@gmail.com', NULL, '$2y$10$n83Um6PW5kqIudfbhEDyh.Kq2I29/mmW5eIcZ0JEKlbiCYbf6.KaW', 1, 1, NULL, '2024-06-20 17:25:05', '2024-06-20 17:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roll`
--

CREATE TABLE `user_roll` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roll`
--

INSERT INTO `user_roll` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 1, '2024-06-20 17:21:36', '2024-06-20 17:21:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_roll_permission`
--

CREATE TABLE `user_roll_permission` (
  `id` int(11) NOT NULL,
  `user_roll_id` int(11) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_roll_permission`
--

INSERT INTO `user_roll_permission` (`id`, `user_roll_id`, `permission`, `created_at`, `updated_at`) VALUES
(4, 1, 'book', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(5, 1, 'register-book', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(6, 1, 'edit-book-register', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(7, 1, 'add-book-category', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(8, 1, 'create-book-category', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(9, 1, 'edit-book-category', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(10, 1, 'getReturn', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(11, 1, 'create-get-return-book', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(12, 1, 'member', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(13, 1, 'register-member', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(14, 1, 'edit-member-register', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(15, 1, 'user', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(16, 1, 'create-user', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(17, 1, 'edit-user', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(18, 1, 'user-roll', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(19, 1, 'create-user-roll', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(20, 1, 'edit-user-roll', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(21, 1, 'site-settings', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(22, 1, 'create-site-settings', '2024-06-20 11:55:51', '2024-06-20 11:55:51'),
(23, 1, 'dashboard', '2024-06-20 11:55:51', '2024-06-20 11:55:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_id` (`book_category_id`);

--
-- Indexes for table `book_cate`
--
ALTER TABLE `book_cate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get_return_books`
--
ALTER TABLE `get_return_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roll`
--
ALTER TABLE `user_roll`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roll_permission`
--
ALTER TABLE `user_roll_permission`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_cate`
--
ALTER TABLE `book_cate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `get_return_books`
--
ALTER TABLE `get_return_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roll`
--
ALTER TABLE `user_roll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roll_permission`
--
ALTER TABLE `user_roll_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_book_cate` FOREIGN KEY (`book_category_id`) REFERENCES `book_cate` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
