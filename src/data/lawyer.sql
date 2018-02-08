-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2018 at 08:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lawyer`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `lawyerid` int(11) DEFAULT NULL,
  `book` timestamp NULL DEFAULT NULL,
  `hour` int(11) DEFAULT '1',
  `detail` text COLLATE utf8_bin,
  `dtcreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `uid`, `lawyerid`, `book`, `hour`, `detail`, `dtcreate`) VALUES
(1, 36, 41, '2018-01-19 20:02:31', 1, 'asdf', '2018-01-19 20:14:15'),
(2, 36, 41, '2018-01-19 20:02:31', 1, 'asdf', '2018-01-19 20:19:49'),
(3, 36, 41, '2018-01-14 20:20:22', 1, 'ads', '2018-01-19 20:20:26'),
(4, 36, 41, '2018-02-02 20:24:02', 1, 'dscdsds', '2018-01-19 20:24:06'),
(5, 36, 37, '2018-01-11 08:42:21', 1, 'asdf', '2018-01-20 08:42:24'),
(6, 36, 37, '2018-01-10 10:35:13', 1, '4234234', '2018-01-20 10:35:17'),
(7, 36, 37, '2018-01-10 10:36:55', 1, 'asdf', '2018-01-20 10:36:58'),
(8, 36, 37, '2018-01-12 18:50:32', 1, 'asdf', '2018-01-20 18:50:35'),
(9, 36, 37, '2018-01-19 18:51:15', 1, 'asdf', '2018-01-20 18:51:17'),
(10, 36, 37, '2018-01-12 18:51:39', 1, 'zzz', '2018-01-20 18:51:42'),
(11, 36, 37, '2018-01-12 18:51:39', 1, 'zzz', '2018-01-20 18:52:06'),
(12, 36, 37, '2018-01-12 18:51:39', 1, 'zzz', '2018-01-20 18:52:07'),
(13, 36, 37, '2018-03-29 18:53:20', 1, 'zzz', '2018-01-20 18:53:25'),
(14, 36, 37, '2018-03-29 18:53:20', 1, 'zzz', '2018-01-20 18:53:44'),
(15, 36, 37, '2018-02-07 17:10:21', 1, 'asdf', '2018-02-07 17:10:28'),
(16, 38, 37, '2018-02-08 19:12:57', 1, 'ddd', '2018-02-08 19:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `dtcreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `userid`, `dtcreate`) VALUES
(1, 38, '2018-02-08 18:14:24'),
(2, 38, '2018-02-08 18:14:56'),
(3, 38, '2018-02-07 18:14:56'),
(4, 38, '2018-02-06 18:15:16'),
(5, 38, '2018-02-06 18:15:16'),
(6, 38, '2018-01-31 18:27:51'),
(7, 38, '2018-01-31 18:27:51'),
(8, 38, '2018-02-01 18:27:51'),
(9, 38, '2018-02-02 18:27:51'),
(10, 38, '2018-02-08 18:28:16'),
(11, 38, '2018-02-08 18:28:16'),
(12, 38, '2018-02-08 18:28:16'),
(13, 38, '2018-02-08 18:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `lawyer`
--

CREATE TABLE `lawyer` (
  `userid` int(11) NOT NULL,
  `rate` int(11) DEFAULT '0',
  `edu` text COLLATE utf8_bin,
  `skill` text COLLATE utf8_bin,
  `exp` text COLLATE utf8_bin,
  `price` int(11) DEFAULT '490'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lawyer`
--

INSERT INTO `lawyer` (`userid`, `rate`, `edu`, `skill`, `exp`, `price`) VALUES
(37, 0, NULL, NULL, NULL, 490),
(38, 0, '', '', '', 490),
(40, 0, NULL, NULL, NULL, 490),
(41, 0, NULL, NULL, NULL, 490),
(42, 0, '11', '22', '33', 490),
(45, 0, NULL, NULL, NULL, 490);

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `detail` text COLLATE utf8_bin,
  `uid` int(11) DEFAULT NULL,
  `lawyerid` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT '5',
  `dtcreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `detail`, `uid`, `lawyerid`, `rate`, `dtcreate`) VALUES
(1, 'asdf', 38, 37, 5, '2018-02-08 16:32:56'),
(2, 'test', 38, 37, 5, '2018-02-08 16:33:24'),
(3, 'test', 38, 37, 5, '2018-02-08 16:37:12'),
(4, 'kkk', 38, 37, 3, '2018-02-08 16:38:11'),
(5, 'asdf', 38, 37, 5, '2018-02-08 16:39:38'),
(6, 'zzz', 38, 37, 5, '2018-02-08 16:40:08'),
(7, 'test', 38, 37, 5, '2018-02-08 16:40:36'),
(8, 'test comment', 38, 37, 5, '2018-02-08 17:02:22'),
(9, 'test', 38, 40, 5, '2018-02-08 17:02:39'),
(10, 'kkk', 38, 41, 5, '2018-02-08 17:02:46'),
(11, 'test', 38, 42, 5, '2018-02-08 17:02:53'),
(12, 'noooo', 38, 40, 1, '2018-02-08 18:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8,
  `email` text CHARACTER SET utf8,
  `pwd` text CHARACTER SET utf8,
  `tel` text COLLATE utf8_bin,
  `avt` text COLLATE utf8_bin,
  `address` text COLLATE utf8_bin,
  `type` int(11) DEFAULT '0',
  `topup` int(11) DEFAULT '490',
  `dtcreate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pwd`, `tel`, `avt`, `address`, `type`, `topup`, `dtcreate`) VALUES
(38, 'admin', 'admin@admin.com', '546f71445bf1bacd60a3f715d0250267', '123123123', '', 'test', 2, 12504, '2018-01-14 10:58:43'),
(37, 'Lawyer A', 'a@a.com', '5f48499ddde487c961cf752295ccdd3a', '123123123123', 'uploads/20180114/1515927476-lawyer1.jpg', NULL, 1, 0, '2018-01-14 10:57:56'),
(36, 'cloverink', 'cloverink@gmail.com', '686f9558cb968defba4da88c9a46ae4c', '5555555555', 'uploads/20180114/1515946068-16142557_1379701685395866_2118715359049706983_n.jpg', 'test test', 2, 5100, '2018-01-14 10:05:53'),
(39, 'test1', 'abcd@abcd.com', '882730e6dde84651bbb8296fcd3c5ac4', '1901010101', 'uploads/20180114/1515929680-m456.jpg', NULL, 0, 0, '2018-01-14 11:34:40'),
(40, 'lawyer2', 'lawyer2@lawyer2.com', '3b474574b8484af7e21928c48d29261c', '000000000', 'uploads/20180114/1515931416-lawyer2.jpg', NULL, 1, 0, '2018-01-14 12:03:36'),
(41, 'lawyer3', 'lawyer3@lawyer3.com', 'c563048e72aacbad5c95a9a43848b584', '0000000', 'uploads/20180117/1516206325-lawyer3.jpg', '', 1, 0, '2018-01-14 12:04:16'),
(42, 'lawyer4', 'lawyer4@lawyer4.com', '08bd7dd080bea78e846e45432538ef1d', '000000', 'uploads/20180114/1515931475-lawyer3.jpg', 'test address', 1, 0, '2018-01-14 12:04:35'),
(43, 'lawyer5', 'lawyer5@lawyer5.com', '4014c4b8ee9981a9c92b4e9e3123c67a', '00000', 'uploads/20180114/1515931576-lawyer4.jpg', NULL, 1, 0, '2018-01-14 12:06:16'),
(44, 'aaa', 'aaa@aaa.com', '8b69adb91284a24c783acfcd34b81868', '123', '', NULL, 2, 0, '2018-01-18 17:13:55'),
(45, 'aaaa', 'aaaa@aaaa.com', 'bcbf4bac62cbfe5b283183f2182ac569', '123123', '', NULL, 1, 0, '2018-01-20 11:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_bin
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(0, 'user'),
(1, 'lawyer'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
