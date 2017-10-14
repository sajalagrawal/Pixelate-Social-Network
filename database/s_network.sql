-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2017 at 04:04 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_network`
--

-- --------------------------------------------------------

--
-- Table structure for table `allaboutyou`
--

CREATE TABLE `allaboutyou` (
  `uid` int(10) DEFAULT NULL,
  `bio` varchar(256) DEFAULT 'NA',
  `gender` varchar(10) DEFAULT 'NA',
  `study` varchar(256) DEFAULT 'NA',
  `hobbies` varchar(256) DEFAULT 'NA',
  `movie` varchar(256) DEFAULT 'NA',
  `language` varchar(256) DEFAULT 'NA'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allaboutyou`
--

INSERT INTO `allaboutyou` (`uid`, `bio`, `gender`, `study`, `hobbies`, `movie`, `language`) VALUES
(1, 'programmer', 'male', 'gsits', 'programming', 'iron man', 'India'),
(2, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
(3, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
(4, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA'),
(6, 'NA', 'NA', 'NA', 'NA', 'NA', 'NA');

-- --------------------------------------------------------

--
-- Table structure for table `allstatus`
--

CREATE TABLE `allstatus` (
  `sid` int(10) NOT NULL,
  `userid` int(10) DEFAULT NULL,
  `status` text,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allstatus`
--

INSERT INTO `allstatus` (`sid`, `userid`, `status`, `time`) VALUES
(1, 2, 'this is my first status', '2017-10-07 11:00:36'),
(2, 2, 'this is my second status', '2017-10-07 11:00:36'),
(3, 2, 'third status', '2017-10-07 11:00:36'),
(26, 1, 'hello', '2017-10-14 15:44:09'),
(27, 6, 'jarv', '2017-10-14 15:45:16'),
(21, 3, 'this is my first status', '2017-10-07 15:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `firstId` int(10) DEFAULT NULL,
  `secondId` int(10) DEFAULT NULL,
  `fId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`firstId`, `secondId`, `fId`) VALUES
(3, 1, 3),
(2, 1, 4),
(1, 4, 5),
(6, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `mid` int(11) NOT NULL,
  `sendId` int(10) DEFAULT NULL,
  `recId` int(10) DEFAULT NULL,
  `msg` text NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`mid`, `sendId`, `recId`, `msg`, `time`) VALUES
(1, 2, 1, 'hello', '2017-10-06 19:10:02'),
(37, 1, 6, 'hello jarv', '2017-10-14 15:43:32'),
(4, 1, 2, 'i am good', '2017-10-06 19:10:27'),
(5, 2, 1, 'hey', '2017-10-06 19:10:41'),
(7, 1, 2, 'grt', '2017-10-06 19:10:54'),
(8, 2, 1, ':)', '2017-10-06 19:11:41'),
(10, 1, 2, 'msg', '2017-10-06 19:12:25'),
(12, 2, 1, 'msg', '2017-10-06 19:12:36'),
(33, 4, 1, 'hello sajal', '2017-10-07 15:03:49'),
(34, 4, 2, 'hello harshita', '2017-10-07 15:05:11'),
(35, 1, 2, 'hello', '2017-10-11 09:29:00'),
(36, 6, 1, 'hello sajal', '2017-10-14 15:43:12'),
(22, 1, 3, 'hello', '2017-10-06 20:11:34'),
(31, 3, 2, 'hey harshita', '2017-10-07 14:49:03'),
(24, 1, 3, 'project', '2017-10-06 20:12:20'),
(38, 6, 1, 'how are you?', '2017-10-14 15:43:39'),
(32, 3, 1, 'hey', '2017-10-07 14:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `sendId` int(10) DEFAULT NULL,
  `recId` int(10) DEFAULT NULL,
  `reqId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`sendId`, `recId`, `reqId`) VALUES
(3, 2, 29);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `image` varchar(256) DEFAULT 'UploadImages/defaultUser.PNG',
  `type` varchar(100) DEFAULT 'image/PNG',
  `ename` varchar(100) DEFAULT 'defaultUser.PNG'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `dob`, `city`, `country`, `pincode`, `image`, `type`, `ename`) VALUES
(1, 'Sajal Agrawal', 'sajal@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8989898989', '2016-11-29', 'Indore', 'India', '452009', 'UploadImages/IMG_20160207_142242_HDR_1454853069863.jpg', 'image/jpeg', 'IMG_20160207_142242_HDR_1454853069863.jpg'),
(2, 'Harshita Mantri', 'harshita@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8989898990', '2015-09-29', 'Indore', 'India', '452009', 'UploadImages/harshita.jpg', 'image/jpeg', 'harshita.jpg'),
(3, 'Rahul Uikey', 'rahul@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8989898991', '1994-06-21', 'Bangalore', 'India', '451450', 'UploadImages/defaultUser.PNG', 'image/PNG', 'defaultUser.PNG'),
(4, 'Soumya Edlabadkar', 'soumya@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8989898992', '1997-11-18', 'Indore', 'India', '452009', 'UploadImages/defaultUser.PNG', '', ''),
(6, 'Jarvis', 'jarvis@xyz.com', '57f231b1ec41dc6641270cb09a56f897', '8989898993', '2001-10-29', 'Indore', 'India', '452009', 'UploadImages/defaultUser.PNG', 'image/PNG', 'defaultUser.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allaboutyou`
--
ALTER TABLE `allaboutyou`
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `allstatus`
--
ALTER TABLE `allstatus`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`fId`),
  ADD KEY `firstId` (`firstId`),
  ADD KEY `secondId` (`secondId`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `sendId` (`sendId`),
  ADD KEY `recId` (`recId`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`reqId`),
  ADD KEY `sendId` (`sendId`),
  ADD KEY `recId` (`recId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allstatus`
--
ALTER TABLE `allstatus`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `fId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `reqId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
