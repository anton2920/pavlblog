-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 21, 2020 at 02:51 PM
-- Server version: 8.0.15
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articlecategory`
--

CREATE TABLE `articlecategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `articleid` int(10) UNSIGNED NOT NULL,
  `categoryid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articlecategory`
--

INSERT INTO `articlecategory` (`id`, `articleid`, `categoryid`) VALUES
(161, 132, 1),
(162, 132, 2),
(163, 132, 5),
(164, 132, 6),
(165, 132, 7),
(166, 132, 8),
(167, 133, 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(255) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `datepublished` date NOT NULL,
  `img` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text NOT NULL,
  `content` mediumtext NOT NULL,
  `active` tinyint(1) NOT NULL,
  `datalastedit` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `author`, `datepublished`, `img`, `description`, `content`, `active`, `datalastedit`) VALUES
(132, 'Моя новая статья', '123123', '2020-12-21', 'cf225e1bd159104d0a3284258f5ef727.jpeg', 'описание', '<p><strong>дль</strong></p>', 1, NULL),
(133, '121212', '<h1> Hi </h1>', '2020-12-21', 'f0243dab6eddfefe8e78304bba059954.gif', '123', '<p>123</p>', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `countarticleid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `countarticleid`) VALUES
(1, 'JavaScript', 2),
(2, 'React', 1),
(5, 'C++', 1),
(6, 'C', 1),
(7, 'Программирование', 1),
(8, 'Go', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(255) UNSIGNED NOT NULL,
  `articleid` int(255) UNSIGNED NOT NULL,
  `author` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `articleid`, `author`, `message`, `status`) VALUES
(21, 132, '123123', 'Комментарий', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` int(10) UNSIGNED NOT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `accessToken`, `avatar`, `fullname`, `email`) VALUES
(1, 'pena', '$2y$10$oOKNOteyj8NbA7ZcZKuDL.krhtyMVxiNn36daI27VtZqU2gTFL5by', 1, '123', NULL, NULL, NULL),
(14, 'slava200', '$2y$10$dJGWFD4z.i3z4JiBYFqh3Oo0.wYmYMqm6wcn1MPKY.B6/o0ewdPkG', 1, '$2y$10$hJjQBLohshhd30rEOKt7A.BEmYQdsjuatt73YxjpU0MN.Nr09IyUG', '-', '123', 'lyadov.vicheslav.sergeevich@gmail.com'),
(15, 'qqq', '$2y$10$dJGWFD4z.i3z4JiBYFqh3Oo0.wYmYMqm6wcn1MPKY.B6/o0ewdPkG', 1, '$2y$10$hJjQBLohshhd30rEOKt7A.BEmYQdsjuatt73YxjpU0MN.Nr09IyUG', '-', 'Вячеслав Лядов', 'lyadov.vicheslav.sergeevich@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articlecategory`
--
ALTER TABLE `articlecategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articlecategory`
--
ALTER TABLE `articlecategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
