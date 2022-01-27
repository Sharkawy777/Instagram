-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 02:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` tinyint(4) NOT NULL,
  `comment` char(200) NOT NULL,
  `post_id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'aaaaa', 4, 3, '2022-01-26 16:33:50', '2022-01-26 16:33:50'),
(2, 'test comment', 4, 3, '2022-01-26 21:04:06', '2022-01-26 21:04:06'),
(3, 'hello', 4, 5, '2022-01-26 21:21:21', '2022-01-26 21:21:21'),
(6, 'hi', 3, 5, '2022-01-26 21:21:35', '2022-01-26 21:21:35'),
(7, 'test comment', 1, 5, '2022-01-26 21:28:02', '2022-01-26 21:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` tinyint(4) NOT NULL,
  `following_id` tinyint(4) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`id`, `following_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, '2022-01-26 21:51:46', '2022-01-26 21:51:46'),
(4, 4, 5, '2022-01-26 22:41:58', '2022-01-26 22:41:58'),
(5, 5, 3, '2022-01-26 23:00:19', '2022-01-26 23:00:19');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` tinyint(4) NOT NULL,
  `caption` char(200) NOT NULL,
  `image` char(100) NOT NULL,
  `user_id` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `caption`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Sara Hays update', '16432107221207681130.png', 3, '2022-01-26 13:05:31', '2022-01-26 13:25:22'),
(3, 'Tarik Medina', '1643214538223797914.jpg', 3, '2022-01-26 14:28:59', '2022-01-26 14:28:59'),
(4, 'Ezra Vance', '16432147111912979201.jpg', 4, '2022-01-26 14:31:51', '2022-01-26 14:31:51'),
(5, 'Dahlia Dixon', '1643244246909957793.png', 5, '2022-01-26 22:44:06', '2022-01-26 22:44:06'),
(6, 'Shannon Guerrero', '16432446171762233477.jpg', 6, '2022-01-26 22:50:17', '2022-01-26 22:50:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `name` char(100) NOT NULL,
  `username` char(80) NOT NULL,
  `password` char(60) NOT NULL,
  `email` char(100) NOT NULL,
  `phone` char(11) NOT NULL,
  `image` char(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `phone`, `image`, `created_at`, `updated_at`) VALUES
(3, 'April Cash', 'admin@admin.com', '$2y$10$CloG5IZu8M/IYmr3H5PTGOf9AcMFTHgcmbPUVXsbCDUyyM9fMyCbG', 'admin@admin.com', '01027314115', '16432147111912979201.jpg', '2022-01-25 15:14:10', '2022-01-25 15:14:10'),
(4, 'aaa', 'a@a.a', '$2y$10$jQSwDtF37N5ilKKiY9nKNuimKD8j8o6ku56p91NJ4WT95Spfr/2pW', 'a@a.a', '01027314115', '1643214538223797914.jpg', '2022-01-26 14:31:21', '2022-01-26 14:31:21'),
(5, 'Fitzgerald Thornton', 'doctor@doctor.com', '$2y$10$bOJJ1MJcFCh7/4FeQmBF1.Yd0j5dzeXzo6wwFvOCzYFp/c6ylbsE2', 'doctor@doctor.com', '01125120701', '16432173581306882445.png', '2022-01-26 15:15:58', '2022-01-26 15:15:58'),
(6, 'Ulric Saunders', 'meqiz', '$2y$10$cik7P3lMHdit/1dXpoobeuoKZBKFynzQ8llBJkPMOuwsAnDrGHEUq', 'tegonotave@mailinator.com', '01112345678', '16432433531666627271.jpg', '2022-01-26 22:29:13', '2022-01-26 22:29:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`),
  ADD KEY `following_id` (`following_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `CommentPostRelation` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CommentUserRelation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `authorRelation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `followingRelation` FOREIGN KEY (`following_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `userRelation` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
