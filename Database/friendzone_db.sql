-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Mar 14, 2024 at 04:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendzone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(11) NOT NULL,
  `PostID` int(11) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`CommentID`, `PostID`, `UserID`, `content`, `timestamp`) VALUES
(4, 11, 7, 'hello this is from demo1', '2024-02-29 05:00:35'),
(9, 15, 2, 'hello', '2024-03-10 10:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_content` varchar(280) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`PostID`, `UserID`, `timestamp`, `post_content`, `created_at`, `user_id`, `likes`) VALUES
(2, NULL, '2024-02-28 16:41:08', 'Hello, This is my first post', '2024-02-28 16:41:08', 2, 0),
(5, NULL, '2024-02-28 19:02:51', 'Hello This is from another user', '2024-02-28 19:02:51', 4, 0),
(6, NULL, '2024-02-28 21:45:42', 'Hello THis is atharv', '2024-02-28 21:45:42', 2, 0),
(7, NULL, '2024-02-28 21:49:32', 'Hello', '2024-02-28 21:49:32', 2, 0),
(8, NULL, '2024-02-28 22:10:21', 'This is the final Last Post', '2024-02-28 22:10:21', 2, 0),
(10, NULL, '2024-02-29 09:22:09', 'Hello', '2024-02-29 09:22:09', 6, 0),
(11, NULL, '2024-02-29 09:30:17', 'hello this is from demo1', '2024-02-29 09:30:17', 7, 0),
(12, NULL, '2024-02-29 14:58:14', 'Hello', '2024-02-29 14:58:14', 8, 0),
(13, NULL, '2024-02-29 14:58:28', 'Hello', '2024-02-29 14:58:28', 8, 1),
(14, NULL, '2024-02-29 14:59:33', 'hello', '2024-02-29 14:59:33', 9, 1),
(15, NULL, '2024-02-29 15:37:30', 'hello', '2024-02-29 15:37:30', 11, 17);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_photo` varchar(255) DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `email`, `password`, `Name`, `biography`, `contact`, `created_at`, `profile_photo`) VALUES
(2, 'Shindeatharv576@gmail.com', '$2y$10$opLbH/obMJRqwNKjWb4Gcu4eWZ5Qcv1a.KCLlutfDlJ2EjjJPyE8S', 'Atharv', 'Hello My name is Atharv Shinde', '7558508876', '2024-02-28 16:24:50', 'default.jpg'),
(4, 'akashbhoir576@gmail.com', '$2y$10$OkQDnihz4Lt/eCVvWhRB9u9Ir44PJX/YtCYvI8Zqy66MckEsyWuIi', 'Atharv Shinde', NULL, NULL, '2024-02-28 18:56:57', 'default.jpg'),
(5, 'atharvshinde@gmail.com', '$2y$10$U/kxT1xKHL3EQ4wYeO5Yd.yozCHimZzzAOsoFZoM7YuDLi40cBd3a', 'Atharv', NULL, NULL, '2024-02-29 08:48:39', 'default.jpg'),
(6, 'atharvshinde576@gmail.com', '$2y$10$8yl0ZH7Jc.QEvu6ggf6NE.9vQFsZDVESoTDp3X5BNkVep9x3MnICy', 'Demo', NULL, NULL, '2024-02-29 09:21:49', 'default.jpg'),
(7, 'abc@gmail.com', '$2y$10$hJda7F.UDfwALro22iVko.eHIAb9RF0jLdLXML7GMR1Js/9MqiSwW', 'Demo1', NULL, NULL, '2024-02-29 09:29:52', 'default.jpg'),
(8, 'xyz@gmail.com', '$2y$10$KWU2z8flU70jX2VrJlQ5b.UAf4Yw4L5AChHwN0ZV6F39heWVUw.Oe', NULL, NULL, NULL, '2024-02-29 14:57:59', 'default.jpg'),
(9, 'atharvshinde2004@gmail.com', '$2y$10$bl0R9MiGYZzZiqVwo0lZqeIqLUx14oHliES.hwsuMIb.UEbAwyiAS', 'Hello', NULL, NULL, '2024-02-29 14:59:17', 'default.jpg'),
(11, 'abcd1@gmail.com', '$2y$10$Ak6V7Q5s0K4ajJQz9F3GNuY0DYcMh0RfVGs6XvTbiy7kG5vpWnq7.', 'Demo100', NULL, NULL, '2024-02-29 15:36:22', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `PostID` (`PostID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD UNIQUE KEY `UserID` (`UserID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`PostID`) REFERENCES `posts` (`PostID`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
