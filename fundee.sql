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
-- โครงสร้างตาราง `news`
-- 

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_picture` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `create_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `Is_show` varchar(1) NOT NULL,
  PRIMARY KEY  (`news_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `news`
-- 

INSERT INTO `news` VALUES (1, 'logoHome.png', 'cxcvxxxxxxxxxxxxx', '2018-04-01', 1, 'Y');
INSERT INTO `news` VALUES (2, 'nameLogo.png', 'xsdcfgsdfsdfsdfsdfsdf', '2018-04-02', 1, 'Y');

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

INSERT INTO `page` VALUES (5710, 'NULL', 'NULL', 'NULL', 10, 57);
INSERT INTO `page` VALUES (579, 'NULL', 'NULL', 'NULL', 9, 57);
INSERT INTO `page` VALUES (578, 'NULL', 'NULL', 'NULL', 8, 57);
INSERT INTO `page` VALUES (577, 'NULL', 'NULL', 'NULL', 7, 57);
INSERT INTO `page` VALUES (576, 'NULL', 'NULL', 'NULL', 6, 57);
INSERT INTO `page` VALUES (575, 'NULL', 'NULL', 'NULL', 5, 57);
INSERT INTO `page` VALUES (574, 'NULL', 'NULL', 'NULL', 4, 57);
INSERT INTO `page` VALUES (573, 'NULL', 'NULL', 'NULL', 3, 57);
INSERT INTO `page` VALUES (572, 'NULL', 'NULL', 'NULL', 2, 57);
INSERT INTO `page` VALUES (571, 'NULL', 'NULL', 'NULL', 1, 57);
INSERT INTO `page` VALUES (5610, 'NULL', 'NULL', 'NULL', 10, 56);
INSERT INTO `page` VALUES (569, 'NULL', 'NULL', 'NULL', 9, 56);
INSERT INTO `page` VALUES (568, 'NULL', 'NULL', 'NULL', 8, 56);
INSERT INTO `page` VALUES (567, 'NULL', 'NULL', 'NULL', 7, 56);
INSERT INTO `page` VALUES (566, 'NULL', 'NULL', 'NULL', 6, 56);
INSERT INTO `page` VALUES (565, 'NULL', 'NULL', 'NULL', 5, 56);
INSERT INTO `page` VALUES (564, 'NULL', 'NULL', 'NULL', 4, 56);
INSERT INTO `page` VALUES (563, 'NULL', 'NULL', 'NULL', 3, 56);
INSERT INTO `page` VALUES (562, 'NULL', 'NULL', 'NULL', 2, 56);
INSERT INTO `page` VALUES (561, 'NULL', 'NULL', 'NULL', 1, 56);
INSERT INTO `page` VALUES (5510, 'NULL', 'NULL', 'NULL', 10, 55);
INSERT INTO `page` VALUES (559, 'NULL', 'NULL', 'NULL', 9, 55);
INSERT INTO `page` VALUES (558, 'NULL', 'NULL', 'NULL', 8, 55);
INSERT INTO `page` VALUES (557, 'NULL', 'NULL', 'NULL', 7, 55);
INSERT INTO `page` VALUES (556, 'NULL', 'NULL', 'NULL', 6, 55);
INSERT INTO `page` VALUES (555, 'NULL', 'NULL', 'NULL', 5, 55);
INSERT INTO `page` VALUES (554, 'NULL', 'NULL', 'NULL', 4, 55);
INSERT INTO `page` VALUES (553, 'NULL', 'NULL', 'NULL', 3, 55);
INSERT INTO `page` VALUES (552, '55_2.png', 'NULL', '65465', 2, 55);
INSERT INTO `page` VALUES (551, '55_1.png', 'NULL', '  sdfsdfsdfsdfsdfsdf', 1, 55);
INSERT INTO `page` VALUES (5410, 'NULL', 'NULL', 'NULL', 10, 54);
INSERT INTO `page` VALUES (549, 'NULL', 'NULL', 'NULL', 9, 54);
INSERT INTO `page` VALUES (548, 'NULL', 'NULL', 'NULL', 8, 54);
INSERT INTO `page` VALUES (547, 'NULL', 'NULL', 'NULL', 7, 54);
INSERT INTO `page` VALUES (546, 'NULL', 'NULL', 'NULL', 6, 54);
INSERT INTO `page` VALUES (545, 'NULL', 'NULL', 'NULL', 5, 54);
INSERT INTO `page` VALUES (544, 'NULL', 'NULL', 'NULL', 4, 54);
INSERT INTO `page` VALUES (543, 'NULL', 'NULL', 'NULL', 3, 54);
INSERT INTO `page` VALUES (542, 'NULL', 'NULL', 'NULL', 2, 54);
INSERT INTO `page` VALUES (541, 'NULL', 'NULL', 'NULL', 1, 54);
INSERT INTO `page` VALUES (5310, 'NULL', 'NULL', 'NULL', 10, 53);
INSERT INTO `page` VALUES (539, 'NULL', 'NULL', 'NULL', 9, 53);
INSERT INTO `page` VALUES (538, 'NULL', 'NULL', 'NULL', 8, 53);
INSERT INTO `page` VALUES (537, 'NULL', 'NULL', 'NULL', 7, 53);
INSERT INTO `page` VALUES (536, 'NULL', 'NULL', 'NULL', 6, 53);
INSERT INTO `page` VALUES (535, 'NULL', 'NULL', 'NULL', 5, 53);
INSERT INTO `page` VALUES (534, 'NULL', 'NULL', 'NULL', 4, 53);
INSERT INTO `page` VALUES (533, 'NULL', 'NULL', 'NULL', 3, 53);
INSERT INTO `page` VALUES (532, 'NULL', 'NULL', 'NULL', 2, 53);
INSERT INTO `page` VALUES (531, 'NULL', 'NULL', 'NULL', 1, 53);
INSERT INTO `page` VALUES (3810, 'NULL', 'NULL', 'NULL', 10, 38);
INSERT INTO `page` VALUES (389, 'NULL', 'NULL', 'NULL', 9, 38);
INSERT INTO `page` VALUES (388, 'NULL', 'NULL', 'NULL', 8, 38);
INSERT INTO `page` VALUES (387, 'NULL', 'NULL', 'NULL', 7, 38);
INSERT INTO `page` VALUES (386, 'NULL', 'NULL', 'NULL', 6, 38);
INSERT INTO `page` VALUES (385, 'NULL', 'NULL', 'NULL', 5, 38);
INSERT INTO `page` VALUES (384, 'NULL', 'NULL', 'NULL', 4, 38);
INSERT INTO `page` VALUES (383, 'NULL', 'NULL', 'NULL', 3, 38);
INSERT INTO `page` VALUES (382, 'NULL', 'NULL', 'NULL', 2, 38);
INSERT INTO `page` VALUES (381, 'NULL', 'NULL', 'NULL', 1, 38);
INSERT INTO `page` VALUES (3710, 'NULL', 'NULL', 'NULL', 10, 37);
INSERT INTO `page` VALUES (379, 'NULL', 'NULL', 'NULL', 9, 37);
INSERT INTO `page` VALUES (378, 'NULL', 'NULL', 'NULL', 8, 37);
INSERT INTO `page` VALUES (377, 'NULL', 'NULL', 'NULL', 7, 37);
INSERT INTO `page` VALUES (376, 'NULL', 'NULL', 'NULL', 6, 37);
INSERT INTO `page` VALUES (375, 'NULL', 'NULL', 'NULL', 5, 37);
INSERT INTO `page` VALUES (374, 'NULL', 'NULL', 'NULL', 4, 37);
INSERT INTO `page` VALUES (373, 'NULL', 'NULL', 'NULL', 3, 37);
INSERT INTO `page` VALUES (372, 'NULL', 'NULL', 'NULL', 2, 37);
INSERT INTO `page` VALUES (371, 'NULL', 'NULL', 'NULL', 1, 37);
INSERT INTO `page` VALUES (3610, 'NULL', 'NULL', 'NULL', 10, 36);
INSERT INTO `page` VALUES (369, 'NULL', 'NULL', 'NULL', 9, 36);
INSERT INTO `page` VALUES (368, 'NULL', 'NULL', 'NULL', 8, 36);
INSERT INTO `page` VALUES (367, 'NULL', 'NULL', 'NULL', 7, 36);
INSERT INTO `page` VALUES (366, 'NULL', 'NULL', 'NULL', 6, 36);
INSERT INTO `page` VALUES (365, 'NULL', 'NULL', 'NULL', 5, 36);
INSERT INTO `page` VALUES (363, 'NULL', 'NULL', 'NULL', 3, 36);
INSERT INTO `page` VALUES (362, '36_2.png', 'NULL', 'NULL', 2, 36);
INSERT INTO `page` VALUES (361, '36_1.png', 'NULL', 'NULL', 1, 36);
INSERT INTO `page` VALUES (364, 'NULL', 'NULL', 'NULL', 4, 36);
INSERT INTO `page` VALUES (3510, '35_10.png', 'NULL', 'NULL', 10, 35);
INSERT INTO `page` VALUES (359, '35_9.png', 'NULL', 'NULL', 9, 35);
INSERT INTO `page` VALUES (358, '35_8.png', 'NULL', 'NULL', 8, 35);
INSERT INTO `page` VALUES (357, 'NULL', 'NULL', 'NULL', 7, 35);
INSERT INTO `page` VALUES (356, 'NULL', 'NULL', 'NULL', 6, 35);
INSERT INTO `page` VALUES (355, 'NULL', 'NULL', 'NULL', 5, 35);
INSERT INTO `page` VALUES (354, '35_4.png', 'NULL', 'NULL', 4, 35);
INSERT INTO `page` VALUES (353, 'NULL', 'NULL', 'NULL', 3, 35);
INSERT INTO `page` VALUES (352, '35_2.png', 'NULL', 'NULL', 2, 35);
INSERT INTO `page` VALUES (351, '35_1.png', 'NULL', 'NULL', 1, 35);
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

-- 
-- dump ตาราง `story`
-- 

INSERT INTO `story` VALUES (38, 'กบเลือกนาย', '  กบเลือกนายเป็นนิทานที่สอนใจเด็กๆดีมากถึงเรื่องความพอใจในสิ่งที่ตนเองมีอยู่', '2018-03-29', 2, 0, 17, '38_00.png');
INSERT INTO `story` VALUES (37, 'dfgdfg', ' - dfg', '2018-03-21', 1, 0, 17, '37_00.png');
INSERT INTO `story` VALUES (36, 'ชาวนากับงูเห่า', ' - กดเกดเ', '2018-03-21', 1, 0, 17, '36_00.png');
INSERT INTO `story` VALUES (35, 'เจ้าหญิงนิทรา', ' - เจ้าหญิงผู้งดงามถูกแม่มดสาปด้วยเรื่องใดกัน', '2018-03-21', 2, 1, 17, '35_00.png');
INSERT INTO `story` VALUES (33, 'กระต่ายกับเต่า', 'เมื่อเต่ากับกระต่ายวิ่งแข่งกัน ใครจะเป็นผู้ชนะ ?', '2018-03-19', 1, 1, 18, '33_00.png');
INSERT INTO `story` VALUES (34, 'ห่านทองคำ', 'บ้านชาวนาหลังหนึ่งมีห่านที่ออกไข่เป็นทองคำ ห่านออกไข่ทุกวัน แต่ชาวนาก็ยังละโมภ', '2018-03-19', 1, 0, 18, '34_00.png');
INSERT INTO `story` VALUES (54, 'sdfsdf', '  sdfsdf', '2018-03-29', 1, 0, 17, '54_00.png');
INSERT INTO `story` VALUES (55, 'cvbcvb', '  ghjnvbn', '2018-03-29', 1, 0, 17, '55_00.png');
INSERT INTO `story` VALUES (56, 'bvcvb', '  cvbcvb', '2018-04-02', 1, 0, 1, '56_00.png');
INSERT INTO `story` VALUES (57, 'fghfgh', '  ghfgh', '2018-04-02', 2, 0, 1, '57_00.png');
INSERT INTO `story` VALUES (53, 'ไม้ขีดไฟกับดอกทานตะวัน', '  นิทานเรื่องนี้ให้ความรู้สึกที่ดีมาก', '2018-03-29', 1, 0, 17, '53_00.png');

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
