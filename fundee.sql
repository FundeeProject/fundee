-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2018 at 06:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fundee`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` tinyint(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'fantacy'),
(2, 'funny tales');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `Is_show` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_picture`, `description`, `create_date`, `user_id`, `Is_show`) VALUES
(1, 'logoHome.png', 'zxczxczxc', '2018-04-03', 1, 'Y'),
(2, 'nameLogo.png', 'zxczxczxc', '2018-04-01', 1, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `voice` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `page_number` int(2) NOT NULL,
  `story_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `picture`, `voice`, `text`, `page_number`, `story_id`) VALUES
(331, 'NULL', 'NULL', 'NULL', 1, 33),
(332, '33_2.png', 'NULL', 'NULL', 2, 33),
(333, 'NULL', 'NULL', 'NULL', 3, 33),
(334, 'NULL', 'NULL', 'NULL', 4, 33),
(335, 'NULL', 'NULL', 'NULL', 5, 33),
(336, '33_6.png', 'NULL', 'NULL', 6, 33),
(337, 'NULL', 'NULL', 'NULL', 7, 33),
(338, 'NULL', 'NULL', 'NULL', 8, 33),
(339, 'NULL', 'NULL', 'NULL', 9, 33),
(3310, 'NULL', 'NULL', 'NULL', 10, 33),
(341, '34_1.png', 'NULL', 'NULL', 1, 34),
(342, '34_2.png', 'NULL', 'NULL', 2, 34),
(343, 'NULL', 'NULL', 'NULL', 3, 34),
(344, 'NULL', 'NULL', 'NULL', 4, 34),
(345, 'NULL', 'NULL', 'NULL', 5, 34),
(346, 'NULL', 'NULL', 'NULL', 6, 34),
(347, 'NULL', 'NULL', 'NULL', 7, 34),
(348, 'NULL', 'NULL', 'NULL', 8, 34),
(349, 'NULL', 'NULL', 'NULL', 9, 34),
(3410, 'NULL', 'NULL', 'NULL', 10, 34);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(0, 'admin'),
(1, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` tinyint(11) NOT NULL,
  `status_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`) VALUES
(0, 'private'),
(1, 'public');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `story_id` tinyint(11) NOT NULL,
  `story_name` varchar(255) NOT NULL,
  `story_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_date` date NOT NULL,
  `category_id` tinyint(11) NOT NULL,
  `status_id` tinyint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `story_pic` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`story_id`, `story_name`, `story_description`, `create_date`, `category_id`, `status_id`, `user_id`, `story_pic`) VALUES
(33, 'กระต่ายกับเต่า', 'เมื่อเต่ากับกระต่ายวิ่งแข่งกัน ใครจะเป็นผู้ชนะ ?', '2018-03-19', 1, 1, 18, '33_00.png'),
(34, 'ห่านทองคำ', 'บ้านชาวนาหลังหนึ่งมีห่านที่ออกไข่เป็นทองคำ ห่านออกไข่ทุกวัน แต่ชาวนาก็ยังละโมภ', '2018-03-19', 1, 0, 18, '34_00.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_point` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `user_point`, `role_id`) VALUES
(1, 'ladymoon', '1234', 'parichat@techno-chon.ac.th', 0, 0),
(2, 'iamUser', '1234', 'user@hotmail.com', 0, 1),
(3, 'parichat', '1111', 'parichat@hotmail.com', 0, 1),
(4, '2222', '2222', '2222@hotmail.com', 0, 1),
(5, '3333', '3333', '3333@hotmail.com', 0, 1),
(6, '6666', '6666', '6666@hotmail.com', 0, 1),
(7, '7777', '7777', '7777@hotmail.com', 0, 1),
(8, '', '', '', 0, 1),
(9, '9999', '9999', '9999@hot', 0, 1),
(10, 'eee', '1234', 'eee@hotmail.com', 0, 1),
(11, '123', 'rrrr', '123@techno', 0, 1),
(12, '88', '33', '88@techno', 0, 1),
(13, '88', '', '88@techno', 0, 1),
(14, '', '', 'gg@ff', 0, 1),
(15, '', '', 'ee@dd', 0, 1),
(16, 'gggg', '1111', 'ggg@dddd', 0, 1),
(17, 'หนอน ข้าวโพด', '00000000', 'yam_sri@hotmail.com', 0, 1),
(18, 'พลอย พันนารายณ์', '00000000', 'ployedge@hotmail.com', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`story_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `story_id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
