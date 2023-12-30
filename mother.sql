-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 01:38 AM
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
-- Database: `mother`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `follower` varchar(255) NOT NULL,
  `following` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`follower`, `following`) VALUES
('arthur', 'howard'),
('user', 'howard'),
('howard', 'arthur');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `postid` int(255) NOT NULL,
  `posttype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` datetime(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000' ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user`, `date`) VALUES
(1, 'my first post', ' hello world', 'user', '0000-00-00 00:00:00.000000'),
(2, 'my first post!!!', 'hello world', 'user', '0000-00-00 00:00:00.000000'),
(3, 'Me at the zoo', 'i went to the zoo!!!\r\nhttps://youtu.be/jNQXAC9IVRw', 'howard', '0000-00-00 00:00:00.000000'),
(4, 'raspberry pi review', 'i lick rasberry pie and it taste good :P', 'arthur', '0000-00-00 00:00:00.000000'),
(5, 'aintnoway', ' lmao', 'howard', '2023-12-08 06:35:36.000000'),
(6, 'testing the new update!!!', ' what time did i post this?', 'howard', '2023-12-28 05:39:43.000000'),
(7, 'i can\\\'t believe this', ' i can\\\'t believe this', 'arthur', '2023-12-28 05:55:30.000000'),
(8, 'bxdf', 'dfxb', 'arthur', '2023-12-28 05:57:58.000000'),
(9, 'asd', ' asd', 'arthur', '2023-12-28 05:58:00.000000'),
(10, '', 'arthur can you not spam please', 'howard', '2023-12-28 05:58:45.000000');

-- --------------------------------------------------------

--
-- Table structure for table `replys`
--

CREATE TABLE `replys` (
  `id` int(255) NOT NULL,
  `body` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `postid` int(255) NOT NULL,
  `replyid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replys`
--

INSERT INTO `replys` (`id`, `body`, `user`, `date`, `postid`, `replyid`) VALUES
(1, 'arthur a raspberry pi and a raspberry pie is not the same thing...', 'howard', '2023-12-28 05:48:45.439795', 4, 4),
(2, 'huh', 'arthur', '2023-12-27 16:52:29.000000', 4, 4),
(3, 'wait so you\'re telling me that...', 'arthur', '2023-12-27 16:53:29.000000', 4, 4),
(4, 'wait so you\'re telling me that...', 'arthur', '2023-12-27 16:53:32.000000', 4, 4),
(5, 'wait so you\'re telling me that...', 'arthur', '2023-12-27 16:53:34.000000', 4, 4),
(6, 'YOU DIDN\'T GET ME FOOD FOR MY BIRTYHDAY AND INSTEAD IT WAS A COMPUTER?', 'arthur', '2023-12-27 16:53:53.000000', 4, 4),
(7, '2023-12-28 05:39:43.000000', 'arthur', '2023-12-28 13:02:46.000000', 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pfp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pfp`, `password`) VALUES
(1, 'user', 'default.png', '$2y$10$hFEVeLeQ7pu9P/O3UhsoiebCkpimS1VNuEVDgdZDFD9Nbig0ptMWq'),
(2, 'howard', 'default.png', '$2y$10$dhEYVh/UophBWxQws/ED0u65hcrbFPriXU3LaIMVnFqb79i.MeVRK'),
(3, 'arthur', 'rasp.jpg', '$2y$10$KcZEF2J44sjiCw1pKSBTm.S.lN7Fpn9X2JcX8j0/kSWAoHkWhO3Q2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `replys`
--
ALTER TABLE `replys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replys`
--
ALTER TABLE `replys`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
