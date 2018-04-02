-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `fundee`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `category`
-- 

CREATE TABLE `category` (
  `category_id` tinyint(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `category`
-- 

INSERT INTO `category` VALUES (1, 'fantacy');
INSERT INTO `category` VALUES (2, 'funny tales');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `page`
-- 

CREATE TABLE `page` (
  `page_id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `voice` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `page_number` int(2) NOT NULL,
  `story_id` int(11) NOT NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `page`
-- 

INSERT INTO `page` VALUES (331, 'NULL', 'NULL', 'NULL', 1, 33);
INSERT INTO `page` VALUES (332, '33_2.png', 'NULL', 'NULL', 2, 33);
INSERT INTO `page` VALUES (333, 'NULL', 'NULL', 'NULL', 3, 33);
INSERT INTO `page` VALUES (334, 'NULL', 'NULL', 'NULL', 4, 33);
INSERT INTO `page` VALUES (335, 'NULL', 'NULL', 'NULL', 5, 33);
INSERT INTO `page` VALUES (336, '33_6.png', 'NULL', 'NULL', 6, 33);
INSERT INTO `page` VALUES (337, 'NULL', 'NULL', 'NULL', 7, 33);
INSERT INTO `page` VALUES (338, 'NULL', 'NULL', 'NULL', 8, 33);
INSERT INTO `page` VALUES (339, 'NULL', 'NULL', 'NULL', 9, 33);
INSERT INTO `page` VALUES (3310, 'NULL', 'NULL', 'NULL', 10, 33);
INSERT INTO `page` VALUES (341, '34_1.png', 'NULL', 'NULL', 1, 34);
INSERT INTO `page` VALUES (342, '34_2.png', 'NULL', 'NULL', 2, 34);
INSERT INTO `page` VALUES (343, 'NULL', 'NULL', 'NULL', 3, 34);
INSERT INTO `page` VALUES (344, 'NULL', 'NULL', 'NULL', 4, 34);
INSERT INTO `page` VALUES (345, 'NULL', 'NULL', 'NULL', 5, 34);
INSERT INTO `page` VALUES (346, 'NULL', 'NULL', 'NULL', 6, 34);
INSERT INTO `page` VALUES (347, 'NULL', 'NULL', 'NULL', 7, 34);
INSERT INTO `page` VALUES (348, 'NULL', 'NULL', 'NULL', 8, 34);
INSERT INTO `page` VALUES (349, 'NULL', 'NULL', 'NULL', 9, 34);
INSERT INTO `page` VALUES (3410, 'NULL', 'NULL', 'NULL', 10, 34);

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `role`
-- 

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `role`
-- 

INSERT INTO `role` VALUES (0, 'admin');
INSERT INTO `role` VALUES (1, 'user');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `status`
-- 

CREATE TABLE `status` (
  `status_id` tinyint(11) NOT NULL,
  `status_name` varchar(30) NOT NULL,
  PRIMARY KEY  (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `status`
-- 

INSERT INTO `status` VALUES (0, 'private');
INSERT INTO `status` VALUES (1, 'public');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `story`
-- 

CREATE TABLE `story` (
  `story_id` tinyint(11) NOT NULL auto_increment,
  `story_name` varchar(255) NOT NULL,
  `story_description` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `create_date` date NOT NULL,
  `category_id` tinyint(11) NOT NULL,
  `status_id` tinyint(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `story_pic` varchar(255) NOT NULL,
  PRIMARY KEY  (`story_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

-- 
-- dump ตาราง `story`
-- 

INSERT INTO `story` VALUES (33, 'กระต่ายกับเต่า', 'เมื่อเต่ากับกระต่ายวิ่งแข่งกัน ใครจะเป็นผู้ชนะ ?', '2018-03-19', 1, 1, 18, '33_00.png');
INSERT INTO `story` VALUES (34, 'ห่านทองคำ', 'บ้านชาวนาหลังหนึ่งมีห่านที่ออกไข่เป็นทองคำ ห่านออกไข่ทุกวัน แต่ชาวนาก็ยังละโมภ', '2018-03-19', 1, 0, 18, '34_00.png');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `user`
-- 

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_point` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

-- 
-- dump ตาราง `user`
-- 

INSERT INTO `user` VALUES (1, 'ladymoon', '1234', 'parichat@techno-chon.ac.th', 0, 0);
INSERT INTO `user` VALUES (2, 'iamUser', '1234', 'user@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (3, 'parichat', '1111', 'parichat@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (4, '2222', '2222', '2222@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (5, '3333', '3333', '3333@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (6, '6666', '6666', '6666@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (7, '7777', '7777', '7777@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (8, '', '', '', 0, 1);
INSERT INTO `user` VALUES (9, '9999', '9999', '9999@hot', 0, 1);
INSERT INTO `user` VALUES (10, 'eee', '1234', 'eee@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (11, '123', 'rrrr', '123@techno', 0, 1);
INSERT INTO `user` VALUES (12, '88', '33', '88@techno', 0, 1);
INSERT INTO `user` VALUES (13, '88', '', '88@techno', 0, 1);
INSERT INTO `user` VALUES (14, '', '', 'gg@ff', 0, 1);
INSERT INTO `user` VALUES (15, '', '', 'ee@dd', 0, 1);
INSERT INTO `user` VALUES (16, 'gggg', '1111', 'ggg@dddd', 0, 1);
INSERT INTO `user` VALUES (17, 'หนอน ข้าวโพด', '00000000', 'yam_sri@hotmail.com', 0, 1);
INSERT INTO `user` VALUES (18, 'พลอย พันนารายณ์', '00000000', 'ployedge@hotmail.com', 0, 1);
