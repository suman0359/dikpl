-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2016 at 01:16 PM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `abdpot_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `writter_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `percent` tinyint(3) NOT NULL,
  `department_id` int(6) DEFAULT NULL,
  `class_id` int(6) DEFAULT NULL,
  `company_id` tinyint(1) DEFAULT NULL COMMENT '1==Text Book; 2==Guide Book',
  `regular_price` float NOT NULL,
  `sell_price` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`,`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `writter_name`, `percent`, `department_id`, `class_id`, `company_id`, `regular_price`, `sell_price`, `status`) VALUES
(4, 'Test Paper', 'হোসনে আরা', 0, 8, 6, 1, 300, 180, 1),
(5, 'Principles Of Accounting', 'হোসনে আরা', 0, 15, 2, 2, 550, 500, 1),
(6, 'ভাষা বিজ্ঞানের কথা  ', 'হোসনে আরা', 30, 3, 1, 1, 300, 210, 1),
(7, 'স্বাধীন বাংলার ইতিহাস ', 'হোসনে আরা', 40, 2, 5, 1, 320, 192, 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE IF NOT EXISTS `college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) NOT NULL,
  `thana_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `jonal_id` int(11) NOT NULL,
  `executive_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=512 ;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `district_id`, `thana_id`, `division_id`, `jonal_id`, `executive_id`, `name`, `address`, `status`) VALUES
(1, 62, 499, 3, 9, 32, 'Fenchugonj Degree College', '                                    ', 1),
(2, 62, 504, 3, 9, 32, 'Modon Mohan College', '                                    ', 1),
(3, 62, 504, 3, 9, 32, 'Govt Mohila College', '                                    ', 1),
(4, 62, 504, 3, 9, 32, 'M C College', '                                                                        ', 1),
(5, 61, 492, 3, 9, 32, 'Sunamgonj Govt. College', '                                    ', 1),
(6, 62, 500, 3, 9, 32, 'Dhaka Dokkhin Degree Colege', '                                                                        ', 1),
(7, 62, 506, 3, 9, 32, 'Dokkhin Surma College', '                                                                        ', 1),
(8, 62, 501, 3, 9, 32, 'Goain Ghat College', '                                                                        ', 1),
(9, 62, 504, 3, 9, 32, 'Gobindogonj Abdul Hoq Sriti College', '                                                                                                            ', 1),
(10, 62, 496, 3, 9, 32, 'Biani Bazar Govt. college', '                                    ', 1),
(11, 62, 504, 3, 9, 32, 'Chatok Degree College', '                                    ', 1),
(12, 37, 480, 3, 9, 32, 'Moulovibazar Govt College', '                                    ', 1),
(13, 37, 482, 3, 9, 32, 'Srimongol Govt College', '                                    ', 1),
(14, 37, 479, 3, 9, 32, 'Kulaura Degree College', '                                    ', 1),
(15, 37, 478, 3, 9, 32, 'Komolgonj Gono College', '                                    ', 1),
(16, 37, 480, 3, 9, 32, 'Moulovibazar Govt Mohila College', '                                    ', 1),
(17, 37, 481, 3, 9, 32, 'Rajnagar College', '                                    ', 1),
(18, 37, 477, 3, 9, 32, 'Toiobunnesa Khanom College', '                                    ', 1),
(19, 37, 480, 3, 9, 32, 'Yakub Tajul Mohila College', '                                    ', 1),
(20, 20, 473, 3, 9, 32, 'Brindabon Govt College', '                                    ', 1),
(21, 20, 476, 3, 9, 32, 'Nobigonj College', '                                    ', 1),
(22, 20, 475, 3, 9, 32, 'Syed Soid Uddin College', '                                    ', 1),
(23, 20, 470, 3, 9, 32, 'Alif Subhan Chy. College', '                                    ', 1),
(24, 20, 471, 3, 9, 32, 'Shochidro College', '', 1),
(25, 20, 475, 3, 9, 32, 'Shahjalal College', '', 1),
(26, 7, 372, 3, 9, 32, 'B. Baria Govt. College', '                                    ', 1),
(27, 7, 372, 3, 9, 32, 'B. Baria Govt. Mohila College', '                                    ', 1),
(28, 7, 372, 3, 9, 32, 'Nabinogor Govt. College', '                                    ', 1),
(29, 7, 372, 3, 9, 32, 'Adarsho College', '                                    ', 1),
(30, 7, 372, 3, 9, 32, 'B.Baria Pouro College', '                                    ', 1),
(31, 7, 377, 3, 9, 32, 'Firozmia Degree College', '                                    ', 1),
(32, 7, 372, 3, 9, 32, 'Kazi Mohammed Shafiqul Islam College', '                                    ', 1),
(33, 7, 372, 3, 9, 32, 'Chinair Bangabandhu Sheikh Mujib College', '                                    ', 1),
(34, 11, 418, 5, 15, 33, 'Govt. Victoria College', '                                    ', 1),
(35, 11, 418, 5, 15, 33, 'Comilla Govt. College', '                                    ', 1),
(36, 11, 418, 5, 15, 33, 'Comilla Gov''t Mohila College', '                                    ', 1),
(37, 11, 418, 5, 15, 33, 'Nawab Foyzunnesa Govt. College', '                                    ', 1),
(38, 11, 418, 5, 15, 33, 'Poyalgasa College', '                                    ', 1),
(39, 11, 410, 5, 15, 33, 'Chandina Redowan Ahammod College', '                                    ', 1),
(40, 11, 412, 5, 15, 33, 'Juranpur Adarsho College', '                                    ', 1),
(41, 11, 413, 5, 15, 33, 'Debiddar Alhaj Jobeda Khatun Mohila College', '                                    ', 1),
(42, 11, 410, 5, 15, 33, 'Chandina Mohila College', '                                    ', 1),
(43, 11, 418, 5, 15, 33, 'Mosharref Hossen Khan Chy. College', '                                    ', 1),
(44, 8, 379, 5, 15, 33, 'Chandpur Govt College', '                                    ', 1),
(45, 8, 379, 5, 15, 33, 'Chandpur Govt Mohila College', '', 1),
(46, 8, 379, 5, 15, 33, 'Puranbazar College', '                                    ', 1),
(47, 8, 382, 5, 15, 33, 'Hajigonj Model College', '                                    ', 1),
(48, 8, 379, 5, 15, 33, 'Chengarchor College', '                                    ', 1),
(49, 31, 445, 5, 15, 33, 'Laxmipur Govt. College', '                                    ', 1),
(50, 31, 445, 5, 15, 33, 'Kofil Uddin Degree College', '                                    ', 1),
(51, 31, 445, 5, 15, 33, 'Dottopara College', '                                    ', 1),
(52, 31, 447, 5, 15, 33, 'Ramgonj Govt. College', '                                    ', 1),
(53, 31, 447, 5, 15, 33, 'Ramgonj Model college', '                                    ', 1),
(54, 48, 450, 5, 15, 33, 'Noakhali Govt College', '                                    ', 1),
(55, 48, 450, 5, 15, 33, 'Noakhali Govt. Mohila College', '                                    ', 1),
(56, 48, 451, 5, 15, 33, 'Choumuhani Govt. S A College', '                                    ', 1),
(57, 48, 451, 5, 15, 33, 'Sonapur College', '                                    ', 1),
(58, 48, 451, 5, 15, 33, 'Soikot College', '                                    ', 1),
(59, 48, 450, 5, 15, 33, 'M A Hashem College', '                                    ', 1),
(60, 16, 433, 5, 15, 33, 'Feni Govt. College', '                                    ', 1),
(61, 16, 433, 5, 15, 33, 'Govt. Zia Mohila College', '                                    ', 1),
(62, 16, 431, 5, 15, 33, 'Alhaj Abdul Hoq Choudhury College', '                                    ', 1),
(63, 26, 438, 2, 1, 35, 'Khagrachori Govt. College', '                                    ', 1),
(64, 9, 405, 2, 1, 35, 'Chittagong Govt. College', '                                    ', 1),
(65, 9, 405, 2, 1, 35, 'Govt. Commerce College', '                                    ', 1),
(66, 9, 404, 2, 1, 35, 'Govt. Haji Muhammed Mohsin College', '                                    ', 1),
(67, 9, 405, 2, 1, 35, 'Govt City College', '                                    ', 1),
(68, 9, 398, 2, 1, 35, 'Govt Haji A B College', '                                    ', 1),
(69, 9, 405, 2, 1, 35, 'Govt. Mohila College', '                                    ', 1),
(70, 9, 395, 2, 1, 35, 'Govt. Potia College', '                                    ', 1),
(71, 9, 400, 2, 1, 35, 'Gasbaria Govt. College', '                                    ', 1),
(72, 9, 404, 2, 1, 35, 'Sir Ashutosh Govt. College', '                                    ', 1),
(73, 9, 399, 2, 1, 35, 'Shatkania Govt. College', '                                    ', 1),
(74, 9, 404, 2, 1, 35, 'Islamia College', '                                    ', 1),
(75, 9, 404, 2, 1, 35, 'Omorgani M E S College', '                                    ', 1),
(76, 9, 405, 2, 1, 35, 'Pahartoli College', '                                    ', 1),
(77, 9, 404, 2, 1, 35, 'Nizampur College', '                                                                        ', 1),
(78, 9, 404, 2, 1, 35, 'EnayetBazar Mohila College', '                                    ', 1),
(79, 9, 404, 2, 1, 35, 'Noa Para Degree College', '                                    ', 1),
(80, 9, 387, 2, 1, 35, 'Anowara Degree College', '                                    ', 1),
(81, 9, 397, 2, 1, 35, 'Imam Gajjali College', '                                    ', 1),
(82, 9, 392, 2, 1, 35, 'Hathazari Degree College', '                                    ', 1),
(83, 9, 392, 2, 1, 35, 'Kuaish Burishshor Sheikh MD. City corp. College', '                                    ', 1),
(84, 9, 400, 2, 1, 35, 'Shitakundo College', '                                    ', 1),
(85, 9, 402, 2, 1, 35, 'Hajera Toju College', '                                    ', 1),
(86, 9, 404, 2, 1, 35, 'Chittagong Cantonment Public College', '                                    ', 1),
(87, 9, 405, 2, 1, 35, 'Uttor Cutly Alhaj Mostafa Hakim College', '`                                    ', 1),
(88, 9, 398, 2, 1, 35, 'Alhaj Mostafizur rahman College', '                                    ', 1),
(89, 9, 404, 2, 1, 35, 'Bijoy Sharani College', '                                    ', 1),
(90, 9, 391, 2, 1, 35, 'Fotikchori University College', '                                    ', 1),
(91, 9, 404, 2, 1, 35, 'Kapashgola University College', '                                    ', 1),
(92, 9, 396, 2, 1, 35, 'Rangunia University College', '                                    ', 1),
(93, 9, 397, 2, 1, 35, 'Raujan University college', '                                    ', 1),
(94, 9, 404, 2, 1, 35, 'Latifa Siddique Degree College', '', 1),
(95, 55, 468, 2, 1, 35, 'Rangamati Govt. College', '                                    ', 1),
(96, 2, 364, 2, 1, 35, 'Bandorban Govt. College', '`                                    ', 1),
(97, 12, 424, 2, 2, 34, 'Cox''s Bazar Govt College', '                                    ', 1),
(98, 12, 423, 2, 2, 34, 'Chokoria Degree College', '                                    ', 1),
(99, 12, 424, 2, 2, 34, 'Cox''s Bazar City College', '                                    ', 1),
(100, 12, 427, 2, 2, 34, 'Ramu University College', '                                    ', 1),
(101, 12, 429, 2, 2, 34, 'Ukhiya University college', '                                    ', 1),
(102, 12, 426, 2, 2, 34, 'Moheshkhali University college', '                                    ', 1),
(103, 13, 507, 3, 5, 36, 'Govt PC College', '                                    ', 1),
(104, 13, 509, 3, 5, 36, 'Kazi Azhar Ali College', '                                    ', 1),
(105, 13, 513, 3, 5, 36, 'Siraj Uddin Memorial College', '                                    ', 1),
(106, 13, 512, 3, 5, 36, 'Mongla College', '                                    ', 1),
(107, 13, 510, 3, 5, 36, 'Shahid Sheikh Abu Naser Mohila College', '                                    ', 1),
(108, 13, 507, 3, 5, 36, 'Belayet Hossain College', '                                    ', 1),
(109, 27, 543, 3, 5, 36, 'Khulna Bl College', '                                    ', 1),
(110, 27, 546, 3, 5, 36, 'Govt Azam Khan Commerce College', '                                    ', 1),
(111, 27, 546, 3, 5, 36, 'Khulna Govt. Mohila College', '                                                                        ', 1),
(112, 27, 546, 3, 5, 36, 'Govt. Sundarbon Adarsha College', '                                    ', 1),
(113, 27, 543, 3, 5, 36, 'Doulotpur Day Night College', '                                    ', 1),
(114, 27, 539, 3, 5, 36, 'Paikgasa College ', '                                    ', 1),
(115, 27, 542, 3, 5, 36, 'North Khulna Degree College', '                                    ', 1),
(116, 27, 546, 3, 5, 36, 'Shohid Sohrawardi College', '                                    ', 1),
(117, 27, 544, 3, 5, 36, 'Govt. Haji Md. Mohsin College', '                                    ', 1),
(118, 27, 536, 3, 5, 36, 'Shahpur Modhugram College', '                                    ', 1),
(119, 27, 546, 3, 5, 36, 'Kopilmoni College', '                                    ', 1),
(120, 27, 543, 3, 5, 36, 'Mohsin Mohila College', '                                    ', 1),
(121, 27, 546, 3, 5, 36, 'Bazua Surendronath College', '                                    ', 1),
(122, 27, 541, 3, 5, 36, 'Govt. Bongobondhu Degree College', '                                    ', 1),
(123, 27, 546, 3, 5, 36, 'Haji Abdul Malek Islamia College', '                                    ', 1),
(124, 27, 547, 3, 5, 36, 'Ahsan Ullah College', '                                    ', 1),
(125, 27, 541, 3, 5, 36, 'Rupsha College ', '                                    ', 1),
(126, 27, 545, 3, 5, 36, 'Khan Jahan Ali College', '                                    ', 1),
(127, 27, 537, 3, 5, 36, 'Alhaj Sarowar Khan College ', '                                    ', 1),
(128, 27, 546, 3, 5, 36, 'Khan Saheb Komor Uddin College', '                                    ', 1),
(129, 27, 546, 3, 5, 36, 'Chalna College', '                                    ', 1),
(130, 57, 577, 3, 5, 36, 'Satkhira Govt College', '                                    ', 1),
(131, 57, 571, 3, 5, 36, 'Satkhira Govt. Mohila College', '                                    ', 1),
(132, 57, 570, 3, 5, 36, 'Kaligonj College ', '                                    ', 1),
(133, 57, 569, 3, 5, 36, 'Kolaroya Govt. College ', '                                    ', 1),
(134, 57, 573, 3, 5, 36, 'Tala Govt. College', '                                    ', 1),
(135, 57, 567, 3, 5, 36, 'Asha Shuni College', '                                    ', 1),
(136, 57, 568, 3, 5, 36, 'Khan Bahadur Ahsan Ullah College', '                                    ', 1),
(137, 57, 571, 3, 5, 36, 'Satkhira Day Night College', '                                    ', 1),
(138, 57, 577, 3, 5, 36, 'Satkhira City College', '                                    ', 1),
(139, 57, 573, 3, 5, 36, 'Kumira Mohila College ', '                                    ', 1),
(140, 57, 577, 3, 5, 36, 'Rokeya Monsur College', '                                    ', 1),
(141, 57, 569, 3, 5, 36, 'Sheikh Amanullah College', '                                    ', 1),
(142, 57, 573, 3, 5, 36, 'Tala Mohila College', '                                    ', 1),
(143, 57, 573, 3, 5, 36, 'Shohid Muktijoddha College', '                                    ', 1),
(144, 57, 578, 3, 5, 36, 'Shimanto Adarsho College', '                                    ', 1),
(145, 57, 577, 3, 5, 36, 'Jhaudanga College', '                                    ', 1),
(146, 57, 577, 3, 5, 36, 'Haji Nasir Uddin College', '                                    ', 1),
(147, 34, 556, 3, 17, 37, 'Govt. Hossen Shohid Sohrawardi College', '                                    ', 1),
(148, 34, 559, 3, 17, 37, 'Sripur College', '                                    ', 1),
(149, 34, 556, 3, 17, 37, 'Magura Adarsho College', '                                    ', 1),
(150, 34, 558, 3, 17, 37, 'Arpara College', '                                    ', 1),
(151, 34, 557, 3, 17, 37, 'Aminur Rahman College', '                                    ', 1),
(152, 34, 556, 3, 17, 37, 'Nazir Ahmed College', '                                    ', 1),
(153, 24, 529, 3, 17, 37, 'Govt K C College', '                                    ', 1),
(154, 24, 529, 3, 17, 37, 'Kaligonj Mahtab Uddin College', '                                    ', 1),
(155, 24, 529, 3, 17, 37, 'Govt. Nurunnahar Mohila College', '                                    ', 1),
(156, 24, 528, 3, 17, 37, 'Govt Lalon Shah College', '                                    ', 1),
(157, 24, 529, 3, 17, 37, 'Jhenaidah College', '                                    ', 1),
(158, 24, 531, 3, 17, 37, 'Court Chandpur Pouro Mohila College', '                                    ', 1),
(159, 41, 565, 3, 17, 37, 'Norail Victoria Govt. College', '                                    ', 1),
(160, 41, 564, 3, 17, 37, 'Lohagora Adorsho College', '                                    ', 1),
(161, 22, 525, 3, 17, 37, 'Govt M M College', '                                    ', 1),
(162, 22, 525, 3, 17, 37, 'Govt. mohila College', '                                    ', 1),
(163, 22, 525, 3, 17, 37, 'Govt. City College', '                                    ', 1),
(164, 22, 523, 3, 17, 37, 'Shahid Moshiur Rahman College', '                                    ', 1),
(165, 22, 526, 3, 17, 37, 'Monirampur College', '                                    ', 1),
(166, 22, 524, 3, 17, 37, 'Keshobpur College', '                                    ', 1),
(167, 22, 525, 3, 17, 37, 'Kazi Nazrul Islam College', '                                    ', 1),
(168, 22, 522, 3, 17, 37, 'Chougasa College', '                                    ', 1),
(169, 22, 525, 3, 17, 37, 'Navaron College', '                                    ', 1),
(170, 22, 525, 3, 17, 37, 'Shahid Sirajuddin Hosen College', '                                    ', 1),
(171, 22, 527, 3, 17, 37, 'Dr. Afil Uddin College', '                                    ', 1),
(172, 22, 521, 3, 17, 37, 'Bagar Para College', '                                    ', 1),
(173, 22, 525, 3, 17, 37, 'Noa Para College', '                                    ', 1),
(174, 22, 525, 3, 17, 37, 'Uposhohor College', '                                    ', 1),
(175, 22, 525, 3, 17, 37, 'Cantonment College', '                                    ', 1),
(176, 22, 526, 3, 17, 37, 'Monirampur Mohila College', '                                    ', 1),
(177, 22, 525, 3, 17, 37, 'Shingia Adorsho College', '                                    ', 1),
(178, 22, 525, 3, 17, 37, 'Hamidpur Al Hera College', '                                    ', 1),
(179, 22, 525, 3, 17, 37, 'Muktijoddha College', '                                    ', 1),
(180, 22, 525, 3, 17, 37, 'Uposhohor Mohila College', '                                    ', 1),
(181, 22, 525, 3, 17, 37, 'Chougasa Mridha Para Mohila College', '                                    ', 1),
(182, 22, 525, 3, 17, 37, 'Jessore College', '                                    ', 1),
(183, 22, 523, 3, 17, 37, 'Jhikorgasa Mohila College', '                                    ', 1),
(184, 22, 526, 3, 17, 37, 'Mukteshwari College', '                                    ', 1),
(185, 22, 525, 3, 17, 37, 'Gonga Nondopur College', '                                    ', 1),
(186, 22, 525, 3, 17, 37, 'Fazilatunnesa Mohila College', '                                    ', 1),
(187, 22, 521, 3, 17, 37, 'Narikel Baria College', '                                    ', 1),
(188, 22, 522, 3, 17, 37, 'A B C D College', '                                    ', 1),
(189, 22, 521, 3, 17, 37, 'Bagharpara Mohila College', '                                    ', 1),
(190, 22, 525, 3, 17, 37, 'Notun Hat Public College', '                                    ', 1),
(191, 22, 525, 3, 17, 37, 'Dr. Abdur Razzak Municipal College', '                                    ', 1),
(192, 36, 561, 4, 21, 38, 'Meherpur Govt. College', '                                    ', 1),
(193, 10, 517, 4, 21, 38, 'Chuadanga Govt. College', '                                    ', 1),
(194, 10, 517, 4, 21, 38, 'Chuadanga Pouro College', '                                                                        ', 1),
(195, 10, 517, 4, 21, 38, 'M S Joha College', '                                    ', 1),
(196, 10, 518, 4, 21, 38, 'Abdul Odud Shah College', '                                    ', 1),
(197, 10, 516, 4, 21, 38, 'Alomdanga Mohila College', '                                    ', 1),
(198, 30, 553, 4, 21, 38, 'Kustia Govt. College', '                                    ', 1),
(199, 30, 553, 4, 21, 38, 'Kustia Govt. Mohila College', '                                    ', 1),
(200, 30, 553, 4, 21, 38, 'Kustia Islamia College', '                                    ', 1),
(201, 30, 549, 4, 21, 38, 'Vera Mara Degree College', '                                    ', 1),
(202, 30, 552, 4, 21, 38, 'KumarKhali College', '                                    ', 1),
(203, 30, 550, 4, 21, 38, 'Doulotpur College', '                                    ', 1),
(204, 30, 552, 4, 21, 38, 'Bashgram Alauddin Ahmed College', '                                    ', 1),
(205, 44, 223, 3, 4, 39, 'N S Govt College', '                                    ', 1),
(206, 44, 223, 3, 4, 39, 'Rani Vobani Govt.Mohila College', '                                    ', 1),
(207, 44, 223, 3, 4, 39, 'Gol-E Afroz Govt College', '                                    ', 1),
(208, 44, 223, 3, 4, 39, 'Abdulpur Govt College', '                                    ', 1),
(209, 44, 221, 3, 4, 39, 'Bilcholon Shohid Shamsuzzoha College', '                                    ', 1),
(210, 44, 223, 3, 4, 39, 'Digha Patia M K College', '                                    ', 1),
(211, 44, 220, 3, 4, 39, 'Sheikh Fazilatunnesa Mujib Mohila College', '                                                                        ', 1),
(212, 44, 220, 3, 4, 39, 'Raja Pur College', '                                    ', 1),
(213, 40, 213, 3, 4, 39, 'Naoga Govt College', '                                    ', 1),
(214, 40, 213, 3, 4, 39, 'Govt. B M C Mohila College', '                                    ', 1),
(215, 40, 209, 3, 4, 39, 'Bodolgasi Govt. College', '                                    ', 1),
(216, 40, 218, 3, 4, 39, 'Shapahar Govt. Degree College', '                                    ', 1),
(217, 40, 213, 3, 4, 39, 'Molla Azad Memorial College', '                                    ', 1),
(218, 40, 216, 3, 4, 39, 'Porsha College', '                                    ', 1),
(219, 40, 210, 3, 4, 39, 'Uttara Degree College', '                                    ', 1),
(220, 40, 218, 3, 4, 39, 'Chy. Chan Md. Mohila College', '                                    ', 1),
(221, 40, 217, 3, 4, 39, 'Rani Nagar Mohila College', '                                    ', 1),
(222, 40, 215, 3, 4, 39, 'Nijipur Govt. College', '                                    ', 1),
(223, 45, 229, 3, 4, 39, 'Nawabgonj Govt. College', '                                    ', 1),
(224, 45, 229, 3, 4, 39, 'Nawabgonj Govt. Mohila College', '                                    ', 1),
(225, 45, 230, 3, 4, 39, 'Adina fazlul Hoq Govt. College', '                                    ', 1),
(226, 45, 229, 3, 4, 39, 'Rahanpur Yousuf Ali College', '                                    ', 1),
(227, 45, 229, 3, 4, 39, 'Shah Neyamutullah College', '                                    ', 1),
(228, 45, 229, 3, 4, 39, 'Balugram Adarsho College', '                                    ', 1),
(229, 54, 247, 3, 4, 39, 'Rajshahi College', '                                    ', 1),
(230, 54, 247, 3, 4, 39, 'New Govt. Degree College', '                                    ', 1),
(231, 54, 247, 3, 4, 39, 'Rajshahi Govt. City College', '                                    ', 1),
(232, 54, 247, 3, 4, 39, 'Taherpur College ', '                                    ', 1),
(233, 54, 253, 3, 4, 39, 'Shah Mokhdum College', '                                    ', 1),
(234, 54, 247, 3, 4, 39, 'Daukandi College', '                                    ', 1),
(235, 54, 247, 3, 4, 39, 'Bhobani Gonj College', '                                    ', 1),
(236, 54, 247, 3, 4, 39, 'Talondo Lolito Mohon College', '                                    ', 1),
(237, 54, 247, 3, 4, 39, 'Nouhata College', '                                    ', 1),
(238, 54, 249, 3, 4, 39, 'Abdul Karim Govt. College', '                                    ', 1),
(239, 54, 246, 3, 4, 39, 'Mohonpur College', '                                    ', 1),
(240, 54, 247, 3, 4, 39, 'Rajshahi Court College', '                                    ', 1),
(241, 54, 247, 3, 4, 39, 'Rajshahi Govt. Mohila College', '                                    ', 1),
(242, 60, 260, 4, 19, 40, 'Sirajgonj Govt. College', '                                    ', 1),
(243, 60, 260, 4, 19, 40, 'Govt. Rashidazzoha Mohila College', '                                    ', 1),
(244, 60, 260, 4, 19, 40, 'Islamia Govt. College', '                                    ', 1),
(245, 60, 254, 4, 19, 40, 'Belkuchi College', '                                    ', 1),
(246, 60, 257, 4, 19, 40, 'Kazipur Monsur Ali Govt. College', '                                    ', 1),
(247, 60, 260, 4, 19, 40, 'Hazi Wahed Moriom College', '                                    ', 1),
(248, 60, 259, 4, 19, 40, 'Shahzadpur Govt. College', '                                    ', 1),
(249, 60, 260, 4, 19, 40, 'Hazi Korap Ali Memorial College', '                                    ', 1),
(250, 60, 262, 4, 19, 40, 'Govt. Akbar Ali College', '                                    ', 1),
(251, 60, 261, 4, 19, 40, 'Tarash College', '                                    ', 1),
(252, 60, 260, 4, 19, 40, 'Sholonga College', '                                    ', 1),
(253, 60, 260, 4, 19, 40, 'Abdullah Al Mahmud College,Baghbati', '                                    ', 1),
(254, 60, 258, 4, 19, 40, 'Begum Nurunnahar Torko Bagish College', '                                    ', 1),
(255, 49, 237, 4, 19, 40, 'Govt Adward College', '                                    ', 1),
(256, 49, 237, 4, 19, 40, 'Govt Womens College', '                                    ', 1),
(257, 49, 237, 4, 19, 40, 'Shohid Bulbul Govt College', '                                    ', 1),
(258, 49, 236, 4, 19, 40, 'Iswardi Govt College', '                                    ', 1),
(259, 49, 233, 4, 19, 40, 'Haji Jamal Uddin College', '                                    ', 1),
(260, 49, 234, 4, 19, 40, 'Chatmohor Degree College', '                                    ', 1),
(261, 49, 237, 4, 19, 40, 'Pabna (Diba/nishi) College', '                                    ', 1),
(262, 49, 237, 4, 19, 40, 'Haji Joshim Uddin College', '                                    ', 1),
(263, 49, 232, 4, 19, 40, 'Bera College', '                                    ', 1),
(264, 49, 238, 4, 19, 40, 'Sathia Degree College', '                                    ', 1),
(265, 49, 237, 4, 19, 40, 'Mohammad Yeasin College', '                                    ', 1),
(266, 49, 236, 4, 19, 40, 'Iswardi Womens Degree College', '                                    ', 1),
(267, 49, 237, 4, 19, 40, 'Debottor degree College', '                                    ', 1),
(268, 49, 237, 4, 19, 40, 'Samsul Huda College', '                                    ', 1),
(269, 49, 239, 4, 19, 40, 'Dr. johorul Kamal College', '                                    ', 1),
(270, 49, 237, 4, 19, 40, 'Shohid M Moonsur Ali College', '                                    ', 1),
(271, 49, 237, 4, 19, 40, 'Pabna Islamia College', '                                    ', 1),
(272, 49, 231, 4, 19, 40, 'Atghoria College', '                                    ', 1),
(273, 25, 204, 4, 20, 42, 'Joypurhat Govt College', '                                    ', 1),
(274, 25, 204, 4, 20, 42, 'Joypurhat govt Womens College', '                                    ', 1),
(275, 25, 206, 4, 20, 42, 'Syeed Altafunnessa Degree College', '                                    ', 1),
(276, 25, 204, 4, 20, 42, 'Mongolbari Moyeej Memorial College', '                                    ', 1),
(277, 6, 192, 4, 20, 42, 'Govt Aziziul Haque College', '                                    ', 1),
(278, 6, 192, 4, 20, 42, 'Govt Mojibur Rahman Womens College', '                                    ', 1),
(279, 6, 192, 4, 20, 42, 'Govt Shah Sultan College', '                                    ', 1),
(280, 6, 200, 4, 20, 42, 'Sherpur Degree College', '                                    ', 1),
(281, 6, 192, 4, 20, 42, 'Syed Ahmed College', '                                    ', 1),
(282, 6, 198, 4, 20, 42, 'Shariakandi Degree College', '                                    ', 1),
(283, 6, 193, 4, 20, 42, 'Dhunot Degree College', '                                    ', 1),
(284, 6, 192, 4, 20, 42, 'Mohastan Mahi Sawar Degree College', '                                    ', 1),
(285, 6, 201, 4, 20, 42, 'Shibganj M H College', '                                    ', 1),
(286, 6, 192, 4, 20, 42, 'Kahalu College', '                                    ', 1),
(287, 6, 194, 4, 20, 42, 'Dupchachia Womens College', '                                    ', 1),
(288, 6, 192, 4, 20, 42, 'Goshaibari College', '                                    ', 1),
(289, 6, 200, 4, 20, 42, 'Sherpur Town Club Public Laibery Womens College', '                                    ', 1),
(290, 17, 277, 4, 20, 42, 'Gaibandha Govt College', '                                    ', 1),
(291, 17, 277, 4, 20, 42, 'Bonarpara College', '                                    ', 1),
(292, 56, 311, 4, 8, 41, 'Car Micheal College', '                                    ', 1),
(293, 56, 311, 4, 8, 41, 'Govt. Begum Rokeya College', '                                    ', 1),
(294, 56, 311, 4, 8, 41, 'Rangpur Govt. College', '                                    ', 1),
(295, 56, 311, 4, 8, 41, 'Shah Abdur Rouf College', '                                    ', 1),
(296, 56, 308, 4, 8, 41, 'Badar Gonj Degree College', '                                    ', 1),
(297, 56, 313, 4, 8, 41, 'Pirgasa College', '                                    ', 1),
(298, 56, 310, 4, 8, 41, 'Kaunia College', '                                    ', 1),
(299, 56, 311, 4, 8, 41, 'Haragasa College', '                                    ', 1),
(300, 56, 308, 4, 8, 41, 'Badargonj Mohila Degree College', '                                    ', 1),
(301, 56, 311, 4, 8, 41, 'Rangpur Model College', '                                    ', 1),
(302, 56, 311, 4, 8, 41, 'Maulana Keramot Ali College', '                                    ', 1),
(303, 56, 311, 4, 8, 41, 'Chok Ishobpur College', '                                    ', 1),
(304, 47, 301, 4, 8, 41, 'Nilfamari Govt. College', '                                    ', 1),
(305, 47, 301, 4, 8, 41, 'Nilfamari Govt. Mohila College', '                                    ', 1),
(306, 47, 302, 4, 8, 41, 'Syedpur College', '                                    ', 1),
(307, 47, 299, 4, 8, 41, 'Jol Dhaka College', '                                    ', 1),
(308, 32, 0, 4, 8, 41, 'Lalmonirhat Govt. College', '                                    ', 1),
(309, 32, 0, 4, 8, 41, 'Alimuddin College', '                                    ', 1),
(310, 32, 0, 4, 8, 41, 'Karim Uddin Public Degree College', '                                    ', 1),
(311, 32, 0, 4, 8, 41, 'Aditmari Degree College', '                                    ', 1),
(312, 32, 0, 4, 8, 41, 'Uttor Bangla Degree College ', '                                    ', 1),
(313, 32, 0, 4, 8, 41, 'Patgram Adorsho College', '                                    ', 1),
(314, 29, 287, 4, 8, 41, 'Kurigram Govt. College', '                                    ', 1),
(315, 29, 288, 4, 8, 41, 'Nageshwari College', '                                    ', 1),
(316, 29, 287, 4, 8, 41, 'Subid khali College', '                                    ', 1),
(317, 29, 287, 4, 8, 41, 'Abdul Karim Mridha College', '                                    ', 1),
(318, 29, 287, 4, 8, 41, 'Boufol Degree College', '                                    ', 1),
(319, 29, 287, 4, 8, 41, 'Janata College', '                                    ', 1),
(320, 23, 344, 7, 12, 44, 'Jhalokathi Govt. College', '                                    ', 1),
(321, 23, 344, 7, 12, 44, 'Govt. Jhalokathi Mohila College', '                                    ', 1),
(322, 3, 323, 7, 12, 44, 'Borguna Govt. College', '                                    ', 1),
(323, 3, 323, 7, 12, 44, 'Fazlul Haque Collage', '                                    ', 1),
(324, 52, 360, 7, 12, 44, 'Shahid Zia College', '                                    ', 1),
(325, 52, 360, 7, 12, 44, 'Govt. Sohrawardi College', '                                    ', 1),
(326, 52, 361, 7, 12, 44, 'Govt. Shorupkathi College', '                                    ', 1),
(327, 52, 360, 7, 12, 44, 'Govt. Mohila College', '                                    ', 1),
(328, 52, 360, 7, 12, 44, 'Zia Nagar( Indurkani) Degree College', '                                    ', 1),
(329, 52, 356, 7, 12, 44, 'Bhandaria Mojida Begum Mohila College', '                                    ', 1),
(330, 52, 356, 7, 12, 44, 'Amanullah College', '                                    ', 1),
(331, 4, 333, 7, 12, 44, 'Govt. B M College', '                                    ', 1),
(332, 4, 335, 7, 12, 44, 'Muladi College', '                                    ', 1),
(333, 4, 333, 7, 12, 44, 'Govt. Barishal College', '                                    ', 1),
(334, 4, 330, 7, 12, 44, 'Govt. Fazlul Hoq College', '                                    ', 1),
(335, 4, 333, 7, 12, 44, 'Govt. Hatem Ali College', '                                    ', 1),
(336, 4, 333, 7, 12, 44, 'Omrito Lal De College', '                                    ', 1),
(337, 4, 331, 7, 12, 44, 'Govt. Gouronodi College', '                                    ', 1),
(338, 4, 333, 7, 12, 44, 'Govt. Mohila College', '                                    ', 1),
(339, 4, 333, 7, 12, 44, 'Chor Kalekhan Adorsho College', '                                    ', 1),
(340, 63, 173, 5, 13, 45, 'Gopalpur College', '                                    ', 1),
(341, 63, 179, 5, 13, 45, 'Modhupur College', '                                    ', 1),
(342, 63, 177, 5, 13, 45, 'Ghatail Brahma Shashon Gono College', '                                    ', 1),
(343, 63, 180, 5, 13, 45, 'Mirzapur College', '                                    ', 1),
(344, 63, 184, 5, 13, 45, 'Basail Emdad Hamida College', '                                    ', 1),
(345, 63, 184, 5, 13, 45, 'Govt. Moulana Md. Ali College', '                                    ', 1),
(346, 63, 184, 5, 13, 45, 'Kumudini Govt. Mohila College', '                                    ', 1),
(347, 63, 184, 5, 13, 45, 'Ibrahim Kha College', '                                    ', 1),
(348, 63, 184, 5, 13, 45, 'Govt. Sadat College', '                                    ', 1),
(349, 63, 184, 5, 13, 45, 'Mujib College', '                                    ', 1),
(350, 63, 182, 5, 13, 45, 'Shokhipur Abashik Mohila College', '                                    ', 1),
(351, 63, 184, 5, 13, 45, 'Arfan College', '                                    ', 1),
(352, 21, 92, 7, 10, 46, 'Jamalpur Govt. Ashek Mahmud College', '                                    ', 1),
(353, 21, 92, 7, 10, 46, 'Nandina Sheikh Anowar Hosain College', '                                    ', 1),
(354, 21, 95, 7, 10, 46, 'Shorishabari Mahmuda Salam Mohila College', '                                    ', 1),
(355, 21, 92, 7, 10, 46, 'A K Memorial College', '                                    ', 1),
(356, 21, 91, 7, 10, 46, 'Islampur College', '                                    ', 1),
(357, 21, 92, 7, 10, 46, 'Shanondobari College', '                                    ', 1),
(358, 21, 92, 7, 10, 46, 'Govt. Jaheda Sufi Mohila College', '                                    ', 1),
(359, 21, 94, 7, 10, 46, 'Jahanar Latif Mohila College', '                                    ', 1),
(360, 21, 92, 7, 10, 46, 'Mirza Azam College', '                                    ', 1),
(361, 28, 98, 3, 9, 32, 'Haji Asmot College', '                                    ', 1),
(362, 28, 97, 3, 9, 32, 'Bazidpur College', '                                    ', 1),
(363, 28, 103, 7, 11, 47, 'Kishoregonj Govt. Mohila College', '                                                                        ', 1),
(364, 28, 103, 7, 11, 47, 'Govt. Guru Doyal College', '                                    ', 1),
(365, 28, 103, 7, 11, 47, 'Wali Newaz Khan College', '                                    ', 1),
(366, 28, 98, 3, 9, 32, 'Govt. Jillur Rahman Mohila College', '                                    ', 1),
(367, 28, 103, 7, 11, 47, 'Pouro Mohila College', '                                    ', 1),
(368, 28, 107, 7, 11, 47, 'Pakundia Adorsho Mohila College', '                                    ', 1),
(369, 28, 103, 7, 11, 47, 'Karimgonj College', '                                    ', 1),
(370, 28, 99, 7, 11, 47, 'Hossenpur Adorsho Mohila College', '                                    ', 1),
(371, 28, 98, 3, 9, 32, 'Rafiqul Islam Mohila College', '                                    ', 1),
(372, 59, 171, 7, 10, 46, 'Sherpur Govt. College', '                                    ', 1),
(373, 59, 171, 7, 10, 46, 'Sherpur Govt. Mohila College', '                                    ', 1),
(374, 46, 154, 7, 10, 46, 'Netrokona Govt. College', '                                    ', 1),
(375, 46, 153, 7, 10, 46, 'MohonGonj College', '                                                                        ', 1),
(376, 38, 124, 5, 13, 45, 'Govt Srinagar College', '                                    ', 1),
(377, 38, 122, 5, 13, 45, 'Govt. Horganga College', '                                    ', 1),
(378, 38, 123, 5, 13, 45, 'Bikrompur Adarsha College', '                                    ', 1),
(379, 38, 124, 5, 13, 45, 'Adarshaa College', '                                                                        ', 1),
(380, 38, 121, 5, 13, 45, 'Lou ho jong College', '                                    ', 1),
(381, 38, 120, 5, 13, 45, 'Gojaria Kolimullah College', '                                    ', 1),
(382, 38, 122, 5, 13, 45, 'Mir Kadim Haji Amjad Ali College', '                                    ', 1),
(383, 43, 185, 5, 13, 45, 'Nosingdi Govt. College', '                                    ', 1),
(384, 43, 185, 5, 13, 45, 'Norsingdi Govt. Womens College', '                                    ', 1),
(385, 43, 190, 5, 13, 45, 'Shibpur Govt.Shahid Asad College', '                                    ', 1),
(386, 43, 188, 5, 13, 45, 'Polash Shilpanchol College', '                                    ', 1),
(387, 43, 189, 5, 13, 45, 'Raipura College', '                                    ', 1),
(388, 43, 185, 5, 13, 45, 'Madhobdi College', '                                    ', 1),
(389, 18, 79, 1, 3, 28, 'Vaowal Badre Alam Govt. College', '                                    ', 1),
(390, 18, 79, 1, 3, 28, 'Tongi Govt. College', '                                    ', 1),
(391, 18, 82, 1, 3, 28, 'Kapasia College', '                                    ', 1),
(392, 18, 83, 1, 3, 28, 'Sripur Muktizoddha Rahmat Ali College,', '                                    ', 1),
(393, 18, 81, 1, 3, 28, 'Kaligonj Sromik College', '                                    ', 1),
(394, 18, 79, 1, 3, 28, 'Kaji Ajim Uddin College', '                                    ', 1),
(395, 18, 79, 1, 3, 28, 'Vaowal Mirzapur College', '                                    ', 1),
(396, 18, 79, 1, 3, 28, 'Piar Ali College', '                                    ', 1),
(397, 18, 79, 1, 3, 28, 'Bormi College', '                                    ', 1),
(398, 1, 7, 1, 3, 28, 'Dhaka College', '                                    ', 1),
(399, 1, 19, 1, 3, 28, 'Govt Titumir College', '                                    ', 1),
(400, 1, 7, 1, 3, 28, 'Eden Mohila College', '                                    ', 1),
(401, 1, 7, 1, 3, 28, 'Begum Badrunnesa Govt. Mohila College', '                                    ', 1),
(402, 1, 17, 1, 3, 28, 'Govt. Bangla College', '                                    ', 1),
(403, 1, 6, 1, 3, 28, 'Kabi Nazrul Govt. College', '                                    ', 1),
(404, 1, 6, 1, 3, 28, 'Govt. Shahid Sohrawardi College', '                                    ', 1),
(405, 1, 6, 1, 3, 28, 'Tejgaon College', '                                    ', 1),
(406, 1, 6, 1, 3, 28, 'Abujor Gifari College', '                                    ', 1),
(407, 1, 6, 1, 3, 28, 'DR.Malika College', '                                    ', 1),
(408, 1, 6, 1, 3, 28, 'Lalmatia Mohila College', '                                    ', 1),
(409, 1, 6, 1, 3, 28, 'Dhaka City College', '                                    ', 1),
(410, 1, 6, 1, 3, 28, 'New Model Degree College', '                                    ', 1),
(411, 1, 6, 1, 3, 28, 'Central Wimens College', '                                    ', 1),
(412, 1, 6, 1, 3, 28, 'Mohammadpur Kendrio College', '                                    ', 1),
(413, 1, 6, 1, 3, 28, 'Ideal College', '                                    ', 1),
(414, 1, 6, 1, 3, 28, 'Fazlul Hoque Mohila College', '                                    ', 1),
(415, 1, 6, 1, 3, 28, 'Tejgaon Mohila College', '                                    ', 1),
(416, 1, 6, 1, 3, 28, 'Shiddheswari Girls College', '                                    ', 1),
(417, 1, 6, 1, 3, 28, 'Habibullah Bahar College', '                                    ', 1),
(418, 1, 6, 1, 3, 28, 'T N T College ', '                                    ', 1),
(419, 1, 6, 1, 3, 28, 'University Wimens Federation', '                                    ', 1),
(420, 1, 6, 1, 3, 28, 'Adamji Cantonment College', '                                    ', 1),
(421, 1, 6, 1, 3, 28, 'Mirpur University College', '                                    ', 1),
(422, 1, 6, 1, 3, 28, 'Khilgaon Model College', '                                    ', 1),
(423, 1, 6, 1, 3, 28, 'Shiddheswari Degree College', '                                    ', 1),
(424, 1, 6, 1, 3, 28, 'Sheikh Borhan Uddin College', '                                    ', 1),
(425, 1, 6, 1, 3, 28, 'R K Chowdhury College', '                                    ', 1),
(426, 1, 6, 1, 3, 28, 'Dania College', '                                    ', 1),
(427, 1, 6, 1, 3, 28, 'Mirpur Girls Ideal Laboratory', '                                    ', 1),
(428, 1, 6, 1, 3, 28, 'Mohammadpur Mohila College', '                                    ', 1),
(429, 1, 6, 1, 3, 28, 'Uttara Anowara Model College', '                                    ', 1),
(430, 1, 6, 1, 3, 28, 'Metropolis College', '                                    ', 1),
(431, 1, 6, 1, 3, 28, 'Dhaka Wimen College', '                                    ', 1),
(432, 1, 6, 1, 3, 28, 'Sardar Suruzzaman Mohila College', '                                    ', 1),
(433, 1, 6, 1, 3, 28, 'Shahid Zia Mohila College', '                                    ', 1),
(434, 1, 6, 1, 3, 28, 'Kanchkura College', '                                    ', 1),
(435, 1, 6, 1, 3, 28, 'Dhaka Mohanagar Mohila College', '                                    ', 1),
(436, 1, 6, 1, 3, 28, 'A K M Rahmatullah College', '                                    ', 1),
(437, 1, 6, 1, 3, 28, 'Hazrat Shah Ali Mohila College', '                                    ', 1),
(438, 1, 6, 1, 3, 28, 'Alhaj Mokbul Hosen College', '                                    ', 1),
(439, 1, 6, 1, 3, 28, 'Dhaka Commerce College', '                                    ', 1),
(440, 1, 6, 1, 3, 28, 'Bangobandhu College', '                                    ', 1),
(441, 1, 6, 1, 3, 28, 'Uttara Town College', '                                    ', 1),
(442, 1, 6, 1, 3, 28, 'T N T Adarsha Mohila College', '                                                                        ', 1),
(443, 1, 6, 1, 3, 28, 'Mirza Abbas Mohila College', '                                    ', 1),
(444, 1, 6, 1, 3, 28, 'Demra College', '                                    ', 1),
(445, 1, 6, 5, 13, 45, 'Dhamrai Govt. College', '                                    ', 1),
(446, 1, 6, 1, 3, 28, 'Dohar Nawabgonj College', '                                    ', 1),
(447, 1, 6, 1, 3, 28, 'Ispahani College', '                                    ', 1),
(448, 1, 6, 1, 3, 28, 'Joypara College', '                                    ', 1),
(449, 1, 69, 1, 3, 28, 'Savar College', '                                    ', 1),
(450, 1, 6, 1, 3, 28, 'Nabazug Degree College', '                                    ', 1),
(451, 39, 130, 7, 10, 46, 'Gouripur Govt. College', '                                    ', 1),
(452, 39, 133, 7, 10, 46, 'Nasirabad College', '                                    ', 1),
(453, 39, 128, 7, 10, 46, 'Fulbaria College', '                                    ', 1),
(454, 39, 133, 7, 10, 46, 'Mominunnesa Govt. Mohila College', '                                    ', 1),
(455, 39, 133, 7, 10, 46, 'Anondo Mohon College', '                                    ', 1),
(456, 39, 134, 7, 10, 46, 'Shahid Sriti Govt. College', '                                    ', 1),
(457, 39, 132, 7, 10, 46, 'Iswargonj College', '                                    ', 1),
(458, 33, 110, 3, 7, 48, 'Govt. Nazim Uddin College', '                                    ', 1),
(459, 33, 111, 3, 7, 48, 'Kalkini Syed Abul Hossain College', '                                    ', 1),
(460, 33, 110, 3, 7, 48, 'Nurul Amin College', '                                    ', 1),
(461, 33, 110, 3, 7, 48, 'Saheba Rampur Kobi Nazrul Islam College', '                                    ', 1),
(462, 33, 110, 3, 7, 48, 'Ilias Ahmed Chy. College', '                                    ', 1),
(463, 33, 110, 3, 7, 48, 'Sheikh Hasina Academy & Wimen College', '                                    ', 1),
(464, 33, 110, 3, 7, 48, 'Syed Abul Hossain College', '                                    ', 1),
(465, 53, 159, 3, 7, 48, 'Rajbari Govt College', '                                    ', 1),
(466, 53, 159, 3, 7, 48, 'Rajbari Govt. Adarsho Mohila College', '                                    ', 1),
(467, 53, 158, 3, 7, 48, 'Pangsha College', '                                    ', 1),
(468, 53, 159, 3, 7, 48, 'Dr. Abul Hossain College', '                                    ', 1),
(469, 19, 84, 3, 6, 49, 'Govt Sheik Mujibur Rahman College', '                                    ', 1),
(470, 19, 87, 3, 6, 49, 'Moksudpur College', '                                    ', 1),
(471, 19, 84, 3, 6, 49, 'Govt S K College', '                                    ', 1),
(472, 19, 84, 3, 6, 49, 'Govt Sheik Fajilatunnesa Mohila College', '                                    ', 1),
(473, 19, 84, 3, 6, 49, 'Govt Bangobondhu College', '                                    ', 1),
(474, 19, 84, 3, 6, 49, 'Haji Lalmia City College', '                                    ', 1),
(475, 19, 86, 3, 6, 49, 'Kotalipara SheikhLutfor Rahman Adarsho', '                                    ', 1),
(476, 15, 74, 3, 7, 48, 'Kazi Mahbub Ullah College', '                                    ', 1),
(477, 15, 74, 3, 7, 48, 'Sadarpur College', '                                    ', 1),
(478, 15, 74, 3, 7, 48, 'Govt. Sharoda Shundori Mohila College', '                                    ', 1),
(479, 15, 74, 3, 7, 48, 'Govt Rajendra College', '                                    ', 1),
(480, 15, 74, 3, 7, 48, 'Govt. Ain Uddin College', '                                    ', 1),
(481, 15, 74, 3, 7, 48, 'Kadirdi College', '                                    ', 1),
(482, 15, 70, 3, 7, 48, 'Alpha Danga  Degree College', '                                    ', 1),
(483, 15, 74, 3, 7, 48, 'Kazi Sirajul Islam Mohila College', '                                    ', 1),
(484, 15, 74, 3, 7, 48, 'Nobokam Polli College', '                                    ', 1),
(485, 15, 74, 3, 7, 48, 'Faridpur College', '                                    ', 1),
(486, 15, 74, 3, 7, 48, 'Haji Abdul Rahman Abdul Karim College', '                                    ', 1),
(487, 42, 141, 5, 13, 45, 'Govt. Tolaram College', '                                    ', 1),
(488, 42, 141, 5, 13, 45, 'Narayangonj Govt. Women''s College', '                                                                        ', 1),
(489, 42, 141, 5, 13, 45, 'Muarpara College', '                                    ', 1),
(490, 42, 141, 5, 13, 45, 'Govt. Sofor Ali College', '                                    ', 1),
(491, 42, 141, 5, 13, 45, 'Govt. Sofor Ali College', '                                    ', 1),
(492, 42, 143, 5, 13, 45, 'Sonargaon Kazi Fazlul Hoq Women''s College', '                                    ', 1),
(493, 42, 143, 5, 13, 45, 'Sonargaon College', '                                    ', 1),
(494, 42, 141, 5, 13, 45, 'Solim Uddin Chy. College', '                                                                        ', 1),
(495, 42, 141, 5, 13, 45, 'Haji Misir Ali College', '                                    ', 1),
(496, 42, 141, 5, 13, 45, 'Kadam Rasul College', '                                    ', 1),
(497, 35, 116, 5, 13, 45, 'Govt. Debendro College', '                                    ', 1),
(498, 35, 116, 5, 13, 45, 'Govt. Debendro College', '                                    ', 1),
(499, 35, 119, 5, 13, 45, 'Mohadevpur Union College, Borong gail', '                                    ', 1),
(500, 35, 116, 5, 13, 45, 'Singaire College', '                                    ', 1),
(501, 35, 114, 5, 13, 45, 'Ghior Govt. College', '                                    ', 1),
(502, 35, 116, 5, 13, 45, 'M A Rouf College', '                                    ', 1),
(503, 35, 116, 5, 13, 45, 'Khan Bahadur Aoulad Hossain Khan College', '                                    ', 1),
(504, 58, 165, 3, 7, 48, 'Shoriotpur Govt. College', '                                    ', 1),
(505, 58, 165, 3, 7, 48, 'Noria Govt. College', '                                    ', 1),
(506, 58, 165, 3, 7, 48, 'Jajira College', '                                    ', 1),
(507, 58, 165, 3, 7, 48, 'Haji Shoriot Ullah College', '0', 1),
(508, 58, 165, 3, 7, 48, 'Shamsur Rahman College', '                                    ', 1),
(509, 3, 321, 2, 2, 34, 'Hasinuzzaman', '0', 13),
(510, 1, 4, 2, 2, 34, 'Hasinuzzaman', '0', 13),
(511, 1, 27, 1, 3, 28, 'Western College', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(4) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `class_id`, `status`) VALUES
(1, 'Bangla', 0, 1),
(2, 'English', 2, 1),
(3, 'Science', 3, 1),
(4, 'Arts', 4, 1),
(5, 'Business Studies', 5, 1),
(6, 'Math', 6, 1),
(7, 'Computer Science & Engineering ', 7, 1),
(8, 'Accounting', 0, 1),
(9, 'Management', 1, 1),
(10, 'Marketing', 2, 1),
(11, 'Finance & Banking', 3, 1),
(12, 'Political Science', 4, 1),
(13, 'Islamic History', 7, 1),
(14, 'Economics', 8, 1),
(15, 'Electrical Engineering', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `distribute`
--

CREATE TABLE IF NOT EXISTS `distribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `distribute_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `distribute_date` date NOT NULL,
  `college_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `entryby` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comments` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `distribute`
--

INSERT INTO `distribute` (`id`, `distribute_time`, `distribute_date`, `college_id`, `teacher_id`, `department_id`, `entryby`, `comments`, `status`) VALUES
(1, '2015-10-27 11:25:05', '2015-10-27', 1, 1, 0, '8', 'Test', 1),
(2, '2015-10-27 11:37:10', '2015-10-27', 4, 2, 0, '13', '', 1),
(3, '2015-11-04 08:26:20', '2015-11-04', 4, 4, 0, '13', 'sadadada', 1),
(4, '2015-11-05 04:58:09', '2015-11-05', 5, 0, 0, '13', '51115', 1),
(5, '2015-11-05 06:20:22', '2015-11-05', 5, 3, 0, '13', 'Another Test', 1),
(6, '2015-11-07 05:44:52', '2015-11-07', 4, 4, 4, '13', 'lol', 1),
(7, '2015-11-09 13:28:52', '2015-11-09', 5, 5, 7, '14', 'demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `distribute_books`
--

CREATE TABLE IF NOT EXISTS `distribute_books` (
  `distribute_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `line_no` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `distribute_books`
--

INSERT INTO `distribute_books` (`distribute_id`, `book_id`, `quantity`, `price`, `line_no`, `status`) VALUES
(1, 1, 1, 250, 0, 1),
(1, 2, 1, 750, 1, 1),
(2, 1, 2, 250, 0, 1),
(3, 2, 2, 750, 0, 1),
(3, 1, 2, 250, 1, 1),
(4, 3, 2, 333, 0, 1),
(5, 3, 1, 333, 0, 1),
(6, 1, 2, 250, 0, 1),
(6, 3, 3, 333, 1, 1),
(7, 3, 1, 333, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jonal_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=65 ;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`id`, `name`, `jonal_id`, `status`) VALUES
(1, 'Dhaka', 3, 1),
(2, 'Bandarban', 2, 1),
(3, 'Barguna', 12, 1),
(4, 'Barisal', 12, 1),
(5, 'Bhola', 12, 1),
(6, 'Bogra', 20, 1),
(7, 'B.Baria', 11, 1),
(8, 'Chandpur', 14, 1),
(9, 'Chittagong', 1, 1),
(10, 'Chuadanga', 18, 1),
(11, 'Comilla', 14, 1),
(12, 'Cox''s Bazar', 2, 1),
(13, 'Bagerhat', 6, 1),
(14, 'Dinajpur', 21, 1),
(15, 'Faridpur', 7, 1),
(16, 'Feni', 15, 1),
(17, 'Gaibandha', 20, 1),
(18, 'Gazipur', 3, 1),
(19, 'Gopalganj', 6, 1),
(20, 'Habiganj', 9, 1),
(21, 'Jamalpur', 10, 1),
(22, 'Jessore', 20, 1),
(23, 'Jhalokati', 12, 1),
(24, 'Jhenaidah', 18, 1),
(25, 'Joypurhat', 20, 1),
(26, 'Khagrachhari', 2, 1),
(27, 'Khulna', 5, 1),
(28, 'Kishoregonj', 11, 1),
(29, 'Kurigram', 8, 1),
(30, 'Kushtia', 18, 1),
(31, 'Lakshmipur', 15, 1),
(32, 'Lalmonirhat', 8, 1),
(33, 'Madaripur', 7, 1),
(34, 'Magura', 17, 1),
(35, 'Manikganj', 13, 1),
(36, 'Meherpur', 18, 1),
(37, 'Moulvibazar', 9, 1),
(38, 'Munshiganj', 16, 1),
(39, 'Mymensingh', 10, 1),
(40, 'Naogaon', 4, 1),
(41, 'Narail', 17, 1),
(42, 'Narayanganj', 16, 1),
(43, 'Narsingdi', 16, 1),
(44, 'Natore', 4, 1),
(45, 'ChapaiNawabganj', 4, 1),
(46, 'Netrakona', 11, 1),
(47, 'Nilphamari', 21, 1),
(48, 'Noakhali', 15, 1),
(49, 'Pabna', 19, 1),
(50, 'Panchagarh', 21, 1),
(51, 'Patuakhali', 12, 1),
(52, 'Pirojpur', 6, 1),
(53, 'Rajbari', 7, 1),
(54, 'Rajshahi', 4, 1),
(55, 'Rangamati', 2, 1),
(56, 'Rangpur', 10, 1),
(57, 'Satkhira', 5, 1),
(58, 'Shariatpur', 7, 1),
(59, 'Sherpur', 10, 1),
(60, 'Sirajganj', 19, 1),
(61, 'Sunamganj', 9, 1),
(62, 'Sylhet', 9, 1),
(63, 'Tangail', 13, 1),
(64, 'Thakurgaon', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE IF NOT EXISTS `division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_head` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id`, `name`, `division_head`, `status`) VALUES
(1, 'Dhaka', 23, 1),
(2, 'Chittagong', 24, 1),
(3, 'Khulna', 25, 1),
(4, 'Rajshahi', 25, 1),
(5, 'Rangpur', 26, 1),
(6, 'Barishal', 27, 1),
(7, 'Mymensingh', 27, 1),
(8, 'Sylhet', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `status`) VALUES
(1, 'Science', 1),
(2, 'Arts', 1),
(3, 'Commerce', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_college`
--

CREATE TABLE IF NOT EXISTS `inventory_college` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(11) NOT NULL,
  `department_id` int(3) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Dumping data for table `inventory_college`
--

INSERT INTO `inventory_college` (`id`, `college_id`, `department_id`, `book_id`, `quantity`, `status`) VALUES
(1, 1, 0, 1, 1, 1),
(2, 1, 0, 2, 4, 1),
(3, 4, 0, 1, -2, 1),
(4, 1, 0, 1, 5, 1),
(5, 4, 0, 1, 3, 1),
(6, 4, 0, 2, 0, 1),
(7, 4, 0, 2, 5, 1),
(8, 4, 0, 1, 10, 1),
(9, 4, 0, 3, 3, 1),
(10, 5, 0, 3, 26, 1),
(11, 5, 0, 2, 4, 1),
(12, 5, 0, 1, 5, 1),
(13, 406, 0, 5, 4, 1),
(14, 406, 0, 6, 1, 1),
(15, 65, 0, 5, 6, 1),
(16, 65, 0, 6, 4, 1),
(17, 74, 0, 5, 13, 1),
(18, 392, 0, 5, 1, 1),
(19, 402, 0, 6, 1, 1),
(20, 97, 0, 5, 2, 1),
(21, 97, 0, 6, 1, 1),
(22, 74, 0, 4, 1, 1),
(23, 74, 0, 6, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_division`
--

CREATE TABLE IF NOT EXISTS `inventory_division` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `division_id` int(11) NOT NULL,
  `division_uid` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_jonal`
--

CREATE TABLE IF NOT EXISTS `inventory_jonal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jonal_id` int(11) NOT NULL,
  `jonal_uid` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `jonal`
--

CREATE TABLE IF NOT EXISTS `jonal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `div_id` int(11) NOT NULL,
  `jonal_head_id` int(3) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

--
-- Dumping data for table `jonal`
--

INSERT INTO `jonal` (`id`, `div_id`, `jonal_head_id`, `name`, `status`) VALUES
(1, 2, 24, 'Jone 1', 1),
(2, 2, 24, 'Jone 2', 1),
(3, 1, 23, 'Jone 3', 1),
(4, 3, 25, 'Jone 4', 1),
(5, 3, 25, 'Jone 5', 1),
(6, 3, 25, 'Jone 6', 1),
(7, 3, 25, 'Jone 7', 1),
(8, 4, 26, 'Jone 8', 1),
(9, 3, 25, 'Jone 9', 1),
(10, 7, 27, 'Jone 10', 1),
(11, 7, 27, 'Jone 11', 1),
(12, 7, 27, 'Jone 12', 1),
(13, 5, 30, 'Jone 13', 1),
(14, 5, 30, 'Jone 14', 1),
(15, 5, 30, 'Jone 15', 1),
(16, 5, 30, 'Jone 16', 1),
(17, 3, 25, 'Jone 17', 1),
(18, 4, 26, 'Jone 18', 1),
(19, 4, 26, 'Jone 19', 1),
(20, 4, 26, 'Jone 20', 1),
(21, 7, 23, 'jone 21', 1),
(22, 1, 0, 'jone 22', 13),
(23, 1, 0, 'jone 23', 13),
(24, 1, 0, 'jone 24', 13),
(49, 6, 27, 'New Jonal ', 1),
(50, 1, 50, 'Hasinuzzaman', 1),
(51, 6, 25, 'Tasfir Hossain Suman', 1),
(52, 7, 26, 'giashuddin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `permissionID` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(200) DEFAULT NULL,
  `key` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`permissionID`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_content`
--

CREATE TABLE IF NOT EXISTS `permission_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `m_action` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `permission_content`
--

INSERT INTO `permission_content` (`id`, `module`, `m_action`, `status`) VALUES
(1, 'user', 'index,add,edit,delete,delete_all,permission', 1),
(2, 'college', 'index,add,edit,delete,delete_all', 1),
(4, 'scategory', 'index,add,edit,delete,delete_all', 1),
(5, 'department', 'index,add,edit,delete,delete_all', 1),
(6, 'supplier', 'index,add,edit,delete,delete_all', 1),
(7, 'customer', 'index,add,edit,delete,delete_all', 1),
(8, 'producttype', 'index,add,edit,delete,delete_all', 1),
(9, 'product', 'index,add,edit,delete,delete_all', 1),
(10, 'purchase', 'index,add,edit,delete,delete_all,printpreview', 1),
(11, 'transfer', 'index,add,edit,delete,delete_all,printpreview', 1),
(12, 'inventory', 'index,add,edit,delete,delete_all,product_info', 1),
(13, 'report', 'index,report_item,divisioninventory,jonalinventory,collegeinventory,requisition,transfer,jonaltransfer,distribute', 1),
(14, 'teachers', 'index,add,edit,delete,delete_all', 1),
(15, 'division', 'index,add,edit,delete,delete_all', 1),
(16, 'jonal', 'index,add,edit,jonaluser,delete,delete_all', 1),
(17, 'district', 'index,add,edit,delete,delete_all', 1),
(18, 'thana', 'index,add,edit,delete,delete_all', 1),
(19, 'subject', 'index,add,edit,delete,delete_all', 1),
(20, 'books', 'index,add,edit,delete,delete_all', 1),
(21, 'maexecutive', 'index,add,edit,delete,delete_all', 1),
(22, 'year', 'index,add,edit,delete,delete_all', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE IF NOT EXISTS `permission_groups` (
  `groupID` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`groupID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

-- --------------------------------------------------------

--
-- Table structure for table `permission_map`
--

CREATE TABLE IF NOT EXISTS `permission_map` (
  `groupID` int(11) NOT NULL DEFAULT '0',
  `permissionID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupID`,`permissionID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `requisition`
--

CREATE TABLE IF NOT EXISTS `requisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisition_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requisition_date` date NOT NULL,
  `jonal_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `requisition_by` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comments` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `accept` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `requisition`
--

INSERT INTO `requisition` (`id`, `requisition_time`, `requisition_date`, `jonal_id`, `college_id`, `requisition_by`, `comments`, `accept`, `status`) VALUES
(1, '2015-10-26 04:44:40', '2015-10-26', 1, 1, '8', 'Please send this books.', 1, 1),
(2, '2015-10-27 11:33:48', '2015-10-27', 7, 4, '13', '', 1, 1),
(3, '2015-11-04 07:03:42', '2015-11-04', 7, 5, '13', 'just For Testing', 0, 1),
(4, '2015-11-07 07:00:31', '2015-11-07', 7, 5, '13', 'demo', 0, 1),
(5, '2015-11-09 13:27:48', '2015-11-09', 7, 5, '13', 'Demo', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `requisition_books`
--

CREATE TABLE IF NOT EXISTS `requisition_books` (
  `requisition_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `line_no` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requisition_books`
--

INSERT INTO `requisition_books` (`requisition_id`, `book_id`, `quantity`, `price`, `line_no`, `status`) VALUES
(1, 1, 3, 250, 0, 1),
(1, 2, 2, 750, 1, 1),
(2, 1, 6, 250, 0, 1),
(3, 2, 1, 750, 0, 1),
(4, 1, 3, 250, 0, 1),
(5, 3, 2, 333, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `name`, `status`) VALUES
(1, 'অনার্স ১ম বর্ষ বিজ্ঞানের', 1),
(2, 'অনার্স ২য় বর্ষ', 1),
(3, 'Hon''s Third Year', 1),
(4, 'Hon''s Fourth Year', 1),
(5, 'Degree First Year', 1),
(6, 'Degree Second Year', 1),
(7, 'Degree Thired Year', 1),
(8, 'Degree Fourth Year', 1),
(9, 'sdsdf', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_college_category`
--

CREATE TABLE IF NOT EXISTS `tbl_college_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `college_id` int(6) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `college_id` (`college_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_college_category`
--

INSERT INTO `tbl_college_category` (`id`, `college_id`, `category_name`, `status`) VALUES
(14, 511, 'HSC', 1),
(15, 511, 'Degree', 1),
(16, 511, 'Hon''s', 1),
(20, 507, 'HSC', 1),
(21, 507, 'Master''s Prili', 1),
(22, 507, 'Master''s Final', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department_class_group`
--

CREATE TABLE IF NOT EXISTS `tbl_department_class_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(4) NOT NULL,
  `class_id` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`,`class_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tbl_department_class_group`
--

INSERT INTO `tbl_department_class_group` (`id`, `department_id`, `class_id`, `status`) VALUES
(13, 8, 1, 1),
(14, 8, 4, 1),
(15, 8, 2, 1),
(16, 8, 3, 1),
(21, 1, 5, 1),
(22, 1, 8, 1),
(23, 1, 6, 1),
(24, 1, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requisition`
--

CREATE TABLE IF NOT EXISTS `tbl_requisition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisition_by` int(6) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `requisition_status` tinyint(1) NOT NULL DEFAULT '1',
  `total_amount` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date` date NOT NULL,
  `date2` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `requisition_by` (`requisition_by`,`invoice_no`,`type`,`requisition_status`),
  KEY `date` (`date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_requisition`
--

INSERT INTO `tbl_requisition` (`id`, `requisition_by`, `invoice_no`, `type`, `requisition_status`, `total_amount`, `total_quantity`, `comment`, `date`, `date2`, `status`) VALUES
(1, 2, '2016-04-001', 1, 1, 5288, 12, 'May be This is final requisition testing', '2016-04-27', '2016-04-28 06:22:32', 1),
(5, 2, '2016-04-005', 1, 1, 1682, 6, 'sss', '2016-04-28', '2016-04-28 06:22:39', 1),
(6, 2, '2016-04-006', 1, 1, 44, 1, 'ttt', '2016-04-28', '2016-04-28 15:48:47', 1),
(7, 2, '2016-04-007', 1, 1, 1500, 3, 'uuu', '2016-04-28', '2016-04-28 15:52:13', 1),
(8, 2, '2016-04-008', 1, 1, 2750, 5, 'bbbb', '2016-04-28', '2016-04-28 15:52:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requisition_details`
--

CREATE TABLE IF NOT EXISTS `tbl_requisition_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requisition_id` int(6) NOT NULL,
  `book_id` int(11) NOT NULL,
  `department_id` int(4) NOT NULL,
  `class_id` int(4) NOT NULL,
  `book_type` tinyint(1) NOT NULL COMMENT 'text_book==1; guid_book==2',
  `qutantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `requisition_id` (`requisition_id`),
  KEY `department_id` (`department_id`,`class_id`,`book_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_requisition_details`
--

INSERT INTO `tbl_requisition_details` (`id`, `requisition_id`, `book_id`, `department_id`, `class_id`, `book_type`, `qutantity`, `price`, `status`) VALUES
(1, 1, 4, 0, 0, 0, 2, 44, 1),
(2, 1, 5, 0, 0, 0, 4, 550, 1),
(3, 1, 6, 0, 0, 0, 6, 500, 1),
(5, 5, 4, 1, 1, 1, 3, 44, 1),
(6, 5, 6, 3, 0, 0, 2, 500, 1),
(7, 5, 5, 8, 0, 0, 1, 550, 1),
(8, 6, 4, 1, 5, 2, 1, 44, 1),
(9, 7, 6, 8, 3, 1, 3, 500, 1),
(10, 8, 5, 1, 6, 1, 5, 550, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE IF NOT EXISTS `tbl_subject` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `department_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`, `department_id`, `subject_code`, `status`) VALUES
(1, 'Mathmetics', 6, 'MAT001', 1),
(2, 'English Second Paper', 2, 'EN002', 1),
(3, 'English First Paper', 2, 'EN001', 1),
(4, 'বাংলা ', 1, 'BB001', 1),
(5, 'Bangla Second Papaer', 1, 'BB002', 1),
(12, 'Finance', 11, '333', 1),
(13, 'Management', 9, '333', 1),
(14, 'Computer', 7, '222', 1),
(15, 'Marketing', 3, '333', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject_group`
--

CREATE TABLE IF NOT EXISTS `tbl_subject_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(4) NOT NULL,
  `department_id` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`,`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_subject_group`
--

INSERT INTO `tbl_subject_group` (`id`, `subject_id`, `department_id`, `date`) VALUES
(19, 15, 11, '2016-04-26 08:28:16'),
(20, 15, 6, '2016-04-26 08:28:16'),
(21, 15, 4, '2016-04-26 08:28:16'),
(22, 15, 9, '2016-04-26 08:28:16'),
(23, 15, 10, '2016-04-26 08:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_role`
--

CREATE TABLE IF NOT EXISTS `tbl_user_role` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_user_role`
--

INSERT INTO `tbl_user_role` (`id`, `role_name`, `status`) VALUES
(1, 'Administrator', 1),
(2, 'Manager', 1),
(3, 'Resional Manager', 1),
(4, 'Jonal Head', 1),
(5, 'Marketing Promotional Officer', 1),
(6, 'District Head', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8 NOT NULL,
  `college_id` int(11) NOT NULL,
  `subject_id` int(6) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `creator_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `college_id` (`college_id`),
  KEY `dep_id` (`dep_id`),
  KEY `subject_id` (`subject_id`),
  KEY `creator_id` (`creator_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=91 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `designation`, `college_id`, `subject_id`, `dep_id`, `phone`, `address`, `creator_id`, `date`, `status`) VALUES
(1, 'Md. Jahir Uddin Chowdhury', '', 65, 0, 8, '01819378097', '                                                                        ', 0, '0000-00-00', 1),
(2, 'Md. Hashem', '', 65, 0, 8, '01711104709', '                                    ', 0, '0000-00-00', 1),
(3, 'Abdul Mobin', '', 65, 0, 8, '01715606323', '                                                                        ', 0, '0000-00-00', 1),
(4, 'Md. Sowkot Ali', '', 65, 0, 8, '01911420044', '                                    ', 0, '0000-00-00', 1),
(5, 'Md. Abdur Rahim', '', 65, 0, 8, '01816118966', '                                    ', 0, '0000-00-00', 1),
(6, 'Md. Jahangir', '', 65, 0, 8, '01716084345', '                                    ', 0, '0000-00-00', 1),
(7, 'Rajia Sultana', '', 65, 0, 8, '01815020614', '                                    ', 0, '0000-00-00', 1),
(8, 'Prof. Md. Shah Alam', '', 65, 0, 9, '', '                                    ', 0, '0000-00-00', 1),
(9, 'Nasim Farhana Shirin', '', 65, 0, 9, '01711174467', '                                    ', 0, '0000-00-00', 1),
(10, 'Md. Nurul Islam Chowdhury', '', 65, 0, 9, '01558458752, 01', '                                                                        ', 0, '0000-00-00', 1),
(11, 'Md. Saimon Morshed', '', 65, 0, 9, '01818571737', '                                    ', 0, '0000-00-00', 1),
(12, 'Mahmudul Haque', '', 65, 0, 9, '01737723881', '                                    ', 0, '0000-00-00', 1),
(13, 'Mishu Barua', '', 65, 0, 9, '01818228393', '                                    ', 0, '0000-00-00', 1),
(14, 'S M Robyaet Fahim', '', 65, 0, 9, '01819073102', '                                    ', 0, '0000-00-00', 1),
(15, 'Faruk Ahammed', '', 65, 0, 9, '01911268726', '                                    ', 0, '0000-00-00', 1),
(16, 'Ranak Jahan', '', 65, 0, 9, '01711022252', '                                    ', 0, '0000-00-00', 1),
(17, 'J M Ariful Hasan', '', 65, 0, 9, '01816003822', '                                    ', 0, '0000-00-00', 1),
(18, 'Md. Shahed Bodrul', '', 65, 0, 9, '01554328564', '                                    ', 0, '0000-00-00', 1),
(19, 'Sabina Yeasmin', '', 65, 0, 12, '01731275341', '                                    ', 0, '0000-00-00', 1),
(20, 'Rejowana Jerin Sultana', '', 65, 0, 14, '01820260461', '                                                                        ', 0, '0000-00-00', 1),
(21, 'Fatema Begum', '', 65, 0, 14, '01821538988', '                                                                                                            ', 0, '0000-00-00', 1),
(22, 'Farjana Irin', '', 65, 0, 14, '01757655698', '                                                                        ', 0, '0000-00-00', 1),
(23, 'Nahida Sultana', '', 65, 0, 14, 'No', '                                                                        ', 0, '0000-00-00', 1),
(24, 'Prof. Md. Mahbubule Haque', '', 66, 0, 8, '', '                                    ', 0, '0000-00-00', 1),
(25, 'Md. Jafor Ahammed', '', 66, 0, 8, '01818944660', '                                    ', 0, '0000-00-00', 1),
(26, 'Rubina Khanom', '', 66, 0, 8, '01819308070', '                                    ', 0, '0000-00-00', 1),
(27, 'Md. Obydul Ghoni Chowdhury', '', 66, 0, 8, '01714307611', '                                    ', 0, '0000-00-00', 1),
(28, 'Raju Saha', '', 66, 0, 8, '01815065852', '                                    ', 0, '0000-00-00', 1),
(29, 'Md. Masudur Rahaman', '', 66, 0, 8, '01720150110', '                                    ', 0, '0000-00-00', 1),
(30, 'Md. Nasimul Haque', '', 66, 0, 8, '01819174518', '                                    ', 0, '0000-00-00', 1),
(31, 'Mahmuda Katun', '', 66, 0, 8, '01731009366', '                                    ', 0, '0000-00-00', 1),
(32, 'Md. Gulam Kibria', '', 66, 0, 9, '01930669791', '                                    ', 0, '0000-00-00', 1),
(33, 'Md. Norun Nobi', '', 66, 0, 9, '01819616556', '                                    ', 0, '0000-00-00', 1),
(34, 'Rohi Shikder', '', 66, 0, 9, '01552401931', '                                    ', 0, '0000-00-00', 1),
(35, 'Kazi Md. Shatab Uddin', '', 66, 0, 9, '01817718533', '                                    ', 0, '0000-00-00', 1),
(36, 'M. Hosainul Abedin', '', 66, 0, 9, '01819837080', '                                    ', 0, '0000-00-00', 1),
(37, 'Md. Akbar Hoshen', '', 66, 0, 9, '01819548569', '                                    ', 0, '0000-00-00', 1),
(38, 'Sujit Barua', '', 66, 0, 9, '01819892634', '                                    ', 0, '0000-00-00', 1),
(39, 'Md. Monjor Ahammed', '', 66, 0, 12, '01819365342', '                                                                        ', 0, '0000-00-00', 1),
(40, 'Md. Abul Hoshen Chowdhury', '', 66, 0, 12, '01819171179', '                                    ', 0, '0000-00-00', 1),
(41, 'Benuara Begum', '', 66, 0, 12, '01914745151', '                                    ', 0, '0000-00-00', 1),
(42, 'Md. Moddesser Ahammed', '', 67, 0, 8, '01554311747', '                                    ', 0, '0000-00-00', 1),
(43, 'Md. Diderul Alam', '', 67, 0, 8, '01554314340', '                                    ', 0, '0000-00-00', 1),
(44, 'Sowrov Kumer Barua', '', 67, 0, 8, '01817201634', '                                    ', 0, '0000-00-00', 1),
(45, 'Md. Ikbal Hosen', '', 67, 0, 8, '01816486067', '                                    ', 0, '0000-00-00', 1),
(46, 'Jerin Latif', '', 67, 0, 8, '01190230603', '                                    ', 0, '0000-00-00', 1),
(47, 'Md. Jabed Noor', '', 67, 0, 8, '01816306224', '                                    ', 0, '0000-00-00', 1),
(48, 'Md. Ziaul Azim Chowdhury', '', 67, 0, 8, '01816813811', '                                    ', 0, '0000-00-00', 1),
(49, 'Md. Shafiqul Islam', '', 67, 0, 8, '01818255974', '                                    ', 0, '0000-00-00', 1),
(50, 'Md. Jahedul Haque', '', 67, 0, 9, '01716278327', '                                    ', 0, '0000-00-00', 1),
(51, 'Md. Shirajuddowla', '', 67, 0, 9, '01711963866', '                                    ', 0, '0000-00-00', 1),
(52, 'Sheikh Md. Muahahidul Haque', '', 67, 0, 9, '01819332515', '                                    ', 0, '0000-00-00', 1),
(53, 'Kazi Mahtab Uddin', '', 67, 0, 9, '01817718533', '                                    ', 0, '0000-00-00', 1),
(54, 'Md. Hossainul Abedin', '', 67, 0, 9, '01819837080', '                                    ', 0, '0000-00-00', 1),
(55, 'Soyada Selina Akter Chow:', '', 67, 0, 9, '01816801753', '                                    ', 0, '0000-00-00', 1),
(56, 'Asma Begum', '', 67, 0, 9, '01827421210', '                                    ', 0, '0000-00-00', 1),
(57, 'Prof. Md. Nobidul Haque Chow;', '', 65, 0, 12, '01712551001', '                                    ', 0, '0000-00-00', 1),
(58, 'Md. Mosherrop Hossen', '', 65, 0, 12, '01817224431', '                                    ', 0, '0000-00-00', 1),
(59, 'Aysa Sutana', '', 67, 0, 12, '01720628080', '                                    ', 0, '0000-00-00', 1),
(60, 'Md. Shamim Kabir', '', 67, 0, 12, '01712847350', '                                    ', 0, '0000-00-00', 1),
(61, 'Md. Omr Faruq', '', 67, 0, 12, '01712265197', '                                    ', 0, '0000-00-00', 1),
(62, 'Md. Mustafa Kamrul Akter', '', 67, 0, 12, '01819308586', '                                    ', 0, '0000-00-00', 1),
(63, 'Masuma Akter', '', 67, 0, 12, '01816333569', '                                    ', 0, '0000-00-00', 1),
(64, 'Md Mujaffor Ahammed', '', 67, 0, 12, '01814943422', '                                    ', 0, '0000-00-00', 1),
(65, 'Md Mujaffor Ahammed', '', 67, 0, 12, '01814943422', '                                    ', 0, '0000-00-00', 1),
(66, 'S K Datta (Debashish)', '', 74, 0, 8, '01813174150', '                                    ', 0, '0000-00-00', 1),
(67, 'Rupon Chattergi', '', 74, 0, 8, '01819309640', '                                    ', 0, '0000-00-00', 1),
(68, 'Md. Ziaur Rahaman Manik', '', 74, 0, 8, '01819100295', '                                    ', 0, '0000-00-00', 1),
(69, 'Md. Ariful Islam', '', 74, 0, 8, '01818800315', '                                    ', 0, '0000-00-00', 1),
(70, 'Md. Nizam Uddin', '', 74, 0, 8, '01812770058', '                                    ', 0, '0000-00-00', 1),
(71, 'Md. Salim Parvez', '', 74, 0, 8, '01925010948', '                                    ', 0, '0000-00-00', 1),
(72, 'Sha-Newaz Begum', '', 74, 0, 8, '01813208634', '                                    ', 0, '0000-00-00', 1),
(73, 'Alfatun Noor', '', 74, 0, 8, '01195182561', '                                    ', 0, '0000-00-00', 1),
(74, 'Owasifa Akter', '', 74, 0, 8, '01722370129', '                                    ', 0, '0000-00-00', 1),
(75, 'Shomvu Nath Das', '', 74, 0, 8, '', '                                    ', 0, '0000-00-00', 1),
(76, 'Fahima Afroj', '', 74, 0, 8, '01815522526', '                                    ', 0, '0000-00-00', 1),
(77, 'Shumvo Nath Sarker', '', 74, 0, 8, '', '                                    ', 0, '0000-00-00', 1),
(78, 'Md. Rafiqul Islam Chow:', '', 74, 0, 9, '01819037277', '                                    ', 0, '0000-00-00', 1),
(79, 'Umme Fatema', '', 74, 0, 9, '01912217070', '                                    ', 0, '0000-00-00', 1),
(80, 'Kujista Akter Banu', '', 74, 0, 9, '01720279252', '                                    ', 0, '0000-00-00', 1),
(81, 'Sheuli Hossain', '', 74, 0, 9, '01827280147', '                                    ', 0, '0000-00-00', 1),
(82, 'Yeasmin Huda', '', 74, 0, 9, '01911225335', '                                    ', 0, '0000-00-00', 1),
(83, 'Md. Elias ', '', 74, 0, 9, '01815816749', '                                    ', 0, '0000-00-00', 1),
(84, 'Md. Monsur Chowdhury', '', 74, 0, 9, '01819383403', '                                    ', 0, '0000-00-00', 1),
(85, 'Farhana Akter', '', 74, 0, 9, '01924159700', '                                    ', 0, '0000-00-00', 1),
(86, 'Md. Nizam Uddin', '', 74, 0, 9, '01727840281', '                                    ', 0, '0000-00-00', 1),
(87, 'Md. Shahidulla Chowdhury', '', 74, 0, 12, '01811552568', '                                    ', 0, '0000-00-00', 1),
(88, 'Md. Abu Taher', '', 74, 0, 12, '01819825349', '                                    ', 0, '0000-00-00', 1),
(89, 'রেজাউল করিম ', '', 74, 0, 2, '01718451166', '                                                                                                            ', 0, '0000-00-00', 1),
(90, 'আব্দুল কাদের ', 'jjj', 74, 0, 12, '01718451166', '                                                                                                            ', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `thana`
--

CREATE TABLE IF NOT EXISTS `thana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `division_id` int(4) NOT NULL,
  `district_id` int(11) NOT NULL,
  `executive_id` int(4) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `division_id` (`division_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=580 ;

--
-- Dumping data for table `thana`
--

INSERT INTO `thana` (`id`, `name`, `division_id`, `district_id`, `executive_id`, `status`) VALUES
(1, 'Agargon', 1, 1, 28, 1),
(2, 'Badda', 3, 3, 36, 1),
(3, 'Bijoynagar', 0, 1, 0, 1),
(4, 'Cantonment', 0, 1, 0, 1),
(5, 'College Gate', 0, 1, 0, 1),
(6, 'Dhaka', 0, 1, 0, 1),
(7, 'Dhanmondi', 0, 1, 0, 1),
(8, 'Firmgate', 0, 1, 0, 1),
(9, 'Fokirapul', 0, 1, 0, 1),
(10, 'Green Road', 0, 1, 0, 1),
(11, 'Kakrail', 0, 1, 0, 1),
(12, 'Kalabagan', 0, 1, 0, 1),
(13, 'Kallyanpur', 0, 1, 0, 1),
(14, 'Karwan Bazar', 0, 1, 0, 1),
(15, 'Khilkhet', 0, 1, 0, 1),
(16, 'Lalmatia', 0, 1, 0, 1),
(17, 'Mirpur', 0, 1, 0, 1),
(18, 'Mogbazar', 0, 1, 0, 1),
(19, 'Mohakhali', 0, 1, 0, 1),
(20, 'Mohammadpur', 0, 1, 0, 1),
(21, 'Motijheel', 0, 1, 0, 1),
(22, 'New Eskaton Road', 0, 1, 0, 1),
(23, 'Pallabi', 0, 1, 0, 1),
(24, 'Panthapath', 0, 1, 0, 1),
(25, 'Purana Paltan', 0, 1, 0, 1),
(26, 'Razarbagh', 0, 1, 0, 1),
(27, 'Shahbagh', 0, 1, 0, 1),
(28, 'Shamoli', 0, 1, 0, 1),
(29, 'Shantinagar', 0, 1, 0, 1),
(30, 'Sher-E-Bangla Nagar', 0, 1, 0, 1),
(31, 'Uttara', 0, 1, 0, 1),
(32, 'Satmasjid Road', 0, 1, 0, 1),
(33, 'Gulshan-2', 0, 1, 0, 1),
(34, 'Mitford Road', 0, 1, 0, 1),
(35, 'Kuril', 0, 1, 0, 1),
(36, 'English Road', 0, 1, 0, 1),
(37, 'Gulshan-1', 0, 1, 0, 1),
(38, 'Rampura', 0, 1, 0, 1),
(41, 'Armanitola', 0, 1, 0, 1),
(42, 'Gandaria', 0, 1, 0, 1),
(43, 'Saidabad', 0, 1, 0, 1),
(44, 'Jatrabari', 0, 1, 0, 1),
(45, 'Doyagong', 0, 1, 0, 1),
(46, 'PostoGhola', 0, 1, 0, 1),
(47, 'Nazrul Islam Saroni', 0, 1, 0, 1),
(48, 'Abul Hasnat Road', 0, 1, 0, 1),
(49, 'Malibagh', 0, 1, 0, 1),
(50, 'Siddeshwari Road', 0, 1, 0, 1),
(51, 'Bashabo', 0, 1, 0, 1),
(52, 'Tejgaon', 0, 1, 0, 1),
(53, 'Mohakhali DOHS', 0, 1, 0, 1),
(54, 'Babubazar', 0, 1, 0, 1),
(55, 'Banani', 0, 1, 0, 1),
(56, 'Baridhara DOHS', 0, 1, 0, 1),
(57, 'Bashabo', 0, 1, 0, 1),
(58, 'Bonosree', 0, 1, 0, 1),
(59, 'Boshundhora', 0, 1, 0, 1),
(60, 'Khilgaon', 0, 1, 0, 1),
(61, 'Madertak', 0, 1, 0, 1),
(62, 'Mitford Road', 0, 1, 0, 1),
(63, 'Sabujbagh', 0, 1, 0, 1),
(64, 'Shajahanpur', 0, 1, 0, 1),
(65, 'Dhamrai', 0, 1, 0, 1),
(66, 'Dohar', 0, 1, 0, 1),
(67, 'Keraniganj', 0, 1, 0, 1),
(68, 'Nawabganj', 0, 1, 0, 1),
(69, 'Savar', 0, 1, 0, 1),
(70, 'Alfadanga', 0, 15, 0, 1),
(71, 'Bhanga', 0, 15, 0, 1),
(72, 'Boalmari', 0, 15, 0, 1),
(73, 'Charbhadrasan', 0, 15, 0, 1),
(74, 'Faridpur Sadar', 0, 15, 0, 1),
(75, 'Madhukhali', 0, 15, 0, 1),
(76, 'Nagarkanda', 0, 15, 0, 1),
(77, 'Sadarpur', 0, 15, 0, 1),
(78, 'Saltha', 0, 15, 0, 1),
(79, 'Gazipur Sadar', 0, 18, 0, 1),
(80, 'Kaliakair', 0, 18, 0, 1),
(81, 'Kaliganj', 0, 18, 0, 1),
(82, 'Kapasia', 0, 18, 0, 1),
(83, 'Sreepur', 0, 18, 0, 1),
(84, 'Gopalganj Sadar', 0, 19, 0, 1),
(85, 'Kashiani', 0, 19, 0, 1),
(86, 'Kotalipara', 0, 19, 0, 1),
(87, 'Muksudpur', 0, 19, 0, 1),
(88, 'Tungipara', 0, 19, 0, 1),
(89, 'Baksiganj', 0, 21, 0, 1),
(90, 'Dewanganj', 0, 21, 0, 1),
(91, 'Islampur', 0, 21, 0, 1),
(92, 'Jamalpur Sadar', 0, 21, 0, 1),
(93, 'Madarganj', 0, 21, 0, 1),
(94, 'Melandaha', 0, 21, 0, 1),
(95, 'Sarishabari', 0, 21, 0, 1),
(96, 'Astagram', 0, 28, 0, 1),
(97, 'Bajitpur', 0, 28, 0, 1),
(98, 'Bhairab', 0, 28, 0, 1),
(99, 'Hossainpur', 0, 28, 0, 1),
(100, 'Itna', 0, 28, 0, 1),
(101, 'Karimganj', 0, 28, 0, 1),
(102, 'Katiadi', 0, 28, 0, 1),
(103, 'Kishoreganj Sadar', 0, 28, 0, 1),
(104, 'Kuliarchar', 0, 28, 0, 1),
(105, 'Mithamain', 0, 28, 0, 1),
(106, 'Nikli', 0, 28, 0, 1),
(107, 'Pakundia', 0, 28, 0, 1),
(108, 'Tarail', 0, 28, 0, 1),
(109, 'Rajoir', 0, 33, 0, 1),
(110, 'Madaripur Sadar', 0, 33, 0, 1),
(111, 'Kalkini', 0, 33, 0, 1),
(112, 'Shibchar', 0, 33, 0, 1),
(113, 'Daulatpur', 0, 35, 0, 1),
(114, 'Ghior', 0, 35, 0, 1),
(115, 'Harirampur', 0, 35, 0, 1),
(116, 'Manikgonj Sadar', 0, 35, 0, 1),
(117, 'Saturia', 0, 35, 0, 1),
(118, 'Shivalaya', 0, 35, 0, 1),
(119, 'Singair', 0, 35, 0, 1),
(120, 'Gazaria', 0, 38, 0, 1),
(121, 'Lohajang', 0, 38, 0, 1),
(122, 'Munshiganj Sadar', 0, 38, 0, 1),
(123, 'Sirajdikhan', 0, 38, 0, 1),
(124, 'Sreenagar', 0, 38, 0, 1),
(125, 'Tongibari', 0, 38, 0, 1),
(126, 'Bhaluka', 0, 39, 0, 1),
(127, 'Dhobaura', 0, 39, 0, 1),
(128, 'Fulbaria', 0, 39, 0, 1),
(129, 'Gaffargaon', 0, 39, 0, 1),
(130, 'Gauripur', 0, 39, 0, 1),
(131, 'Haluaghat', 0, 39, 0, 1),
(132, 'Ishwarganj', 0, 39, 0, 1),
(133, 'Mymensingh Sadar', 0, 39, 0, 1),
(134, 'Muktagachha', 0, 39, 0, 1),
(135, 'Nandail', 0, 39, 0, 1),
(136, 'Phulpur', 0, 39, 0, 1),
(137, 'Trishal', 0, 39, 0, 1),
(138, 'Tara Khanda', 0, 39, 0, 1),
(139, 'Araihazar', 0, 42, 0, 1),
(140, 'Bandar', 0, 42, 0, 1),
(141, 'Narayanganj Sadar', 0, 42, 0, 1),
(142, 'Rupganj', 0, 42, 0, 1),
(143, 'Sonargaon', 0, 42, 0, 1),
(144, 'Fatullah', 0, 42, 0, 1),
(145, 'Siddhirganj', 0, 42, 0, 1),
(146, 'Atpara', 0, 46, 0, 1),
(147, 'Barhatta', 0, 46, 0, 1),
(148, 'Durgapur', 0, 46, 0, 1),
(149, 'Khaliajuri', 0, 46, 0, 1),
(150, 'Kalmakanda', 0, 46, 0, 1),
(151, 'Kendua', 0, 46, 0, 1),
(152, 'Madan', 0, 46, 0, 1),
(153, 'Mohanganj', 0, 46, 0, 1),
(154, 'Netrokona Sadar', 0, 46, 0, 1),
(155, 'Purbadhala', 0, 46, 0, 1),
(156, 'Baliakandi', 0, 53, 0, 1),
(157, 'Goalandaghat', 0, 53, 0, 1),
(158, 'Pangsha', 0, 53, 0, 1),
(159, 'Rajbari Sadar', 0, 53, 0, 1),
(160, 'Kalukhali', 0, 53, 0, 1),
(161, 'Bhedarganj', 0, 58, 0, 1),
(162, 'Damudya', 0, 58, 0, 1),
(163, 'Gosairhat', 0, 58, 0, 1),
(164, 'Naria', 0, 58, 0, 1),
(165, 'Shariatpur Sadar', 0, 58, 0, 1),
(166, 'Zanjira', 0, 58, 0, 1),
(167, 'Shakhipur', 0, 58, 0, 1),
(168, 'Jhenaigati', 0, 59, 0, 1),
(169, 'Nakla', 0, 59, 0, 1),
(170, 'Nalitabari', 0, 59, 0, 1),
(171, 'Sherpur Sadar', 0, 59, 0, 1),
(172, 'Sreebardi', 0, 59, 0, 1),
(173, 'Gopalpur', 0, 63, 0, 1),
(174, 'Basail', 0, 63, 0, 1),
(175, 'Bhuapur', 0, 63, 0, 1),
(176, 'Delduar', 0, 63, 0, 1),
(177, 'Ghatail', 0, 63, 0, 1),
(178, 'Kalihati', 0, 63, 0, 1),
(179, 'Madhupur', 0, 63, 0, 1),
(180, 'Mirzapur', 0, 63, 0, 1),
(181, 'Nagarpur', 0, 63, 0, 1),
(182, 'Sakhipur', 0, 63, 0, 1),
(183, 'Dhanbari', 0, 63, 0, 1),
(184, 'Tangail Sadar', 0, 63, 0, 1),
(185, 'Narsingdi Sadar', 0, 43, 0, 1),
(186, 'Belabo', 0, 43, 0, 1),
(187, 'Monohardi', 0, 43, 0, 1),
(188, 'Palash', 0, 43, 0, 1),
(189, 'Raipura', 0, 43, 0, 1),
(190, 'Shibpur', 0, 43, 0, 1),
(191, 'Adamdighi', 0, 6, 0, 1),
(192, 'Bogra Sadar', 0, 6, 0, 1),
(193, 'Dhunat', 0, 6, 0, 1),
(194, 'Dhupchanchia', 0, 6, 0, 1),
(195, 'Gabtali', 0, 6, 0, 1),
(196, 'Kahaloo', 0, 6, 0, 1),
(197, 'Nandigram', 0, 6, 0, 1),
(198, 'Sariakandi', 0, 6, 0, 1),
(199, 'Sahajanpur', 0, 6, 0, 1),
(200, 'Sherpur', 0, 6, 0, 1),
(201, 'Shibganj', 0, 6, 0, 1),
(202, 'Sonatola', 0, 6, 0, 1),
(203, 'Akkelpur', 0, 25, 0, 1),
(204, 'Joypurhat Sadar', 0, 25, 0, 1),
(205, 'Kalai', 0, 25, 0, 1),
(206, 'Khetlal', 0, 25, 0, 1),
(207, 'Panchbibi', 0, 25, 0, 1),
(208, 'Atrai', 0, 40, 0, 1),
(209, 'Badalgachhi', 0, 40, 0, 1),
(210, 'Manda', 0, 40, 0, 1),
(211, 'Dhamoirhat', 0, 40, 0, 1),
(212, 'Mohadevpur', 0, 40, 0, 1),
(213, 'Naogaon Sadar', 0, 40, 0, 1),
(214, 'Niamatpur', 0, 40, 0, 1),
(215, 'Patnitala', 0, 40, 0, 1),
(216, 'Porsha', 0, 40, 0, 1),
(217, 'Raninagar', 0, 40, 0, 1),
(218, 'Sapahar', 0, 40, 0, 1),
(219, 'Bagatipara', 0, 44, 0, 1),
(220, 'Baraigram', 0, 44, 0, 1),
(221, 'Gurudaspur', 0, 44, 0, 1),
(222, 'Lalpur', 0, 44, 0, 1),
(223, 'Natore Sadar', 0, 44, 0, 1),
(224, 'Singra', 0, 44, 0, 1),
(225, 'Naldanga', 0, 44, 0, 1),
(226, 'Bholahat', 0, 45, 0, 1),
(227, 'Gomastapur', 0, 45, 0, 1),
(228, 'Nachole', 0, 45, 0, 1),
(229, 'Nawabganj Sadar', 0, 45, 0, 1),
(230, 'Shibganj', 0, 45, 0, 1),
(231, 'Atgharia', 0, 49, 0, 1),
(232, 'Bera', 0, 49, 0, 1),
(233, 'Bhangura', 0, 49, 0, 1),
(234, 'Chatmohar', 0, 49, 0, 1),
(235, 'Faridpur', 0, 49, 0, 1),
(236, 'Ishwardi', 0, 49, 0, 1),
(237, 'Pabna Sadar', 0, 49, 0, 1),
(238, 'Santhia', 0, 49, 0, 1),
(239, 'Sujanagar', 0, 49, 0, 1),
(240, 'Ataikula', 0, 49, 0, 1),
(241, 'Bagha', 0, 54, 0, 1),
(242, 'Bagmara', 0, 54, 0, 1),
(243, 'Charghat', 0, 54, 0, 1),
(244, 'Durgapur', 0, 54, 0, 1),
(245, 'Godagari', 0, 54, 0, 1),
(246, 'Mohanpur', 0, 54, 0, 1),
(247, 'Paba', 0, 54, 0, 1),
(248, 'Puthia', 0, 54, 0, 1),
(249, 'Tanore', 0, 54, 0, 1),
(250, 'Boalia Thana', 0, 54, 0, 1),
(251, 'Matihar Thana', 0, 54, 0, 1),
(252, 'Rajpara Thana', 0, 54, 0, 1),
(253, 'Shah Mokdum Thana', 0, 54, 0, 1),
(254, 'Belkuchi', 0, 60, 0, 1),
(255, 'Chauhali', 0, 60, 0, 1),
(256, 'Kamarkhanda', 0, 60, 0, 1),
(257, 'Kazipur', 0, 60, 0, 1),
(258, 'Raiganj', 0, 60, 0, 1),
(259, 'Shahjadpur', 0, 60, 0, 1),
(260, 'Sirajganj Sadar', 0, 60, 0, 1),
(261, 'Tarash', 0, 60, 0, 1),
(262, 'Ullahpara', 0, 60, 0, 1),
(263, 'Birampur', 0, 14, 0, 1),
(264, 'Birganj', 0, 14, 0, 1),
(265, 'Biral', 0, 14, 0, 1),
(266, 'Bochaganj', 0, 14, 0, 1),
(267, 'Chirirbandar', 0, 14, 0, 1),
(268, 'Phulbari', 0, 14, 0, 1),
(269, 'Ghoraghat', 0, 14, 0, 1),
(270, 'Hakimpur', 0, 14, 0, 1),
(271, 'Kaharole', 0, 14, 0, 1),
(272, 'Khansama', 0, 14, 0, 1),
(273, 'Dinajpur Sadar', 0, 14, 0, 1),
(274, 'Nawabganj', 0, 14, 0, 1),
(275, 'Parbatipur', 0, 14, 0, 1),
(276, 'Phulchhari', 0, 17, 0, 1),
(277, 'Gaibandha Sadar', 0, 17, 0, 1),
(278, 'Gobindaganj', 0, 17, 0, 1),
(279, 'Palashbari', 0, 17, 0, 1),
(280, 'Sadullapur', 0, 17, 0, 1),
(281, 'Sughatta', 0, 17, 0, 1),
(282, 'Sundarganj', 0, 17, 0, 1),
(283, 'Bhurungamari', 0, 29, 0, 1),
(284, 'Char Rajibpur', 0, 29, 0, 1),
(285, 'Chilmari', 0, 29, 0, 1),
(286, 'Phulbari', 0, 29, 0, 1),
(287, 'Kurigram Sadar', 0, 29, 0, 1),
(288, 'Nageshwari', 0, 29, 0, 1),
(289, 'Rajarhat', 0, 29, 0, 1),
(290, 'Raomari', 0, 29, 0, 1),
(291, 'Ulipur', 0, 29, 0, 1),
(292, 'Aditmari', 0, 31, 0, 1),
(293, 'Hatibandha', 0, 31, 0, 1),
(294, 'Kaliganj', 0, 31, 0, 1),
(295, 'Lalmonirhat Sadar', 0, 31, 0, 1),
(296, 'Patgram', 0, 31, 0, 1),
(297, 'Dimla', 0, 47, 0, 1),
(298, 'Domar', 0, 47, 0, 1),
(299, 'Jaldhaka', 0, 47, 0, 1),
(300, 'Kishoreganj', 0, 47, 0, 1),
(301, 'Nilphamari Sadar', 0, 47, 0, 1),
(302, 'Saidpur', 0, 47, 0, 1),
(303, 'Atwari', 0, 50, 0, 1),
(304, 'Boda', 0, 50, 0, 1),
(305, 'Debiganj', 0, 50, 0, 1),
(306, 'Panchagarh Sadar', 0, 50, 0, 1),
(307, 'Tetulia', 0, 50, 0, 1),
(308, 'Badarganj', 0, 56, 0, 1),
(309, 'Gangachhara', 0, 56, 0, 1),
(310, 'Kaunia', 0, 56, 0, 1),
(311, 'Rangpur Sadar', 0, 56, 0, 1),
(312, 'Mithapukur', 0, 56, 0, 1),
(313, 'Pirgachha', 0, 56, 0, 1),
(314, 'Pirganj', 0, 56, 0, 1),
(315, 'Taraganj', 0, 56, 0, 1),
(316, 'Baliadangi', 0, 64, 0, 1),
(317, 'Haripur', 0, 64, 0, 1),
(318, 'Pirganj', 0, 64, 0, 1),
(319, 'Ranisankail', 0, 64, 0, 1),
(320, 'Thakurgaon Sadar', 0, 64, 0, 1),
(321, 'Amtali', 0, 3, 0, 1),
(322, 'Bamna', 0, 3, 0, 1),
(323, 'Barguna Sadar', 0, 3, 0, 1),
(324, 'Betagi', 0, 3, 0, 1),
(325, 'Patharghata', 0, 3, 0, 1),
(326, 'Taltoli', 0, 3, 0, 1),
(327, 'Agailjhara', 0, 4, 0, 1),
(328, 'Babuganj', 0, 4, 0, 1),
(329, 'Bakerganj', 0, 4, 0, 1),
(330, 'Banaripara', 0, 4, 0, 1),
(331, 'Gaurnadi', 0, 4, 0, 1),
(332, 'Hizla', 0, 4, 0, 1),
(333, 'Barisal Sadar', 0, 4, 0, 1),
(334, 'Mehendiganj', 0, 4, 0, 1),
(335, 'Muladi', 0, 4, 0, 1),
(336, 'Wazirpur', 0, 4, 0, 1),
(337, 'Bhola Sadar', 0, 5, 0, 1),
(338, 'Burhanuddin', 0, 5, 0, 1),
(339, 'Char Fasson', 0, 5, 0, 1),
(340, 'Daulatkhan', 0, 5, 0, 1),
(341, 'Lalmohan', 0, 5, 0, 1),
(342, 'Manpura', 0, 5, 0, 1),
(343, 'Tazumuddin', 0, 5, 0, 1),
(344, 'Jhalokati Sadar', 0, 23, 0, 1),
(345, 'Kathalia', 0, 23, 0, 1),
(346, 'Nalchity', 0, 23, 0, 1),
(347, 'Rajapur', 0, 23, 0, 1),
(348, 'Bauphal', 0, 51, 0, 1),
(349, 'Dashmina', 0, 51, 0, 1),
(350, 'Galachipa', 0, 51, 0, 1),
(351, 'Kalapara', 0, 51, 0, 1),
(352, 'Mirzaganj', 0, 51, 0, 1),
(353, 'Patuakhali Sadar', 0, 51, 0, 1),
(354, 'Rangabali', 0, 51, 0, 1),
(355, 'Dumki', 0, 51, 0, 1),
(356, 'Bhandaria', 0, 52, 0, 1),
(357, 'Kawkhali', 0, 52, 0, 1),
(358, 'Mathbaria', 0, 52, 0, 1),
(359, 'Nazirpur', 0, 52, 0, 1),
(360, 'Pirojpur Sadar', 0, 52, 0, 1),
(361, 'Nesarabad (Swarupkati)', 0, 52, 0, 1),
(362, 'Zianagor', 0, 52, 0, 1),
(363, 'Ali Kadam', 0, 2, 0, 1),
(364, 'Bandarban Sadar', 0, 2, 0, 1),
(365, 'Lama', 0, 2, 0, 1),
(366, 'Naikhongchhari', 0, 2, 0, 1),
(367, 'Rowangchhari', 0, 2, 0, 1),
(368, 'Ruma', 0, 2, 0, 1),
(369, 'Thanchi', 0, 2, 0, 1),
(370, 'Akhaura', 0, 7, 0, 1),
(371, 'Bancharampur', 0, 7, 0, 1),
(372, 'Brahmanbaria Sadar', 0, 7, 0, 1),
(373, 'Kasba', 0, 7, 0, 1),
(374, 'Nabinagar', 0, 7, 0, 1),
(375, 'Nasirnagar', 0, 7, 0, 1),
(376, 'Sarail', 0, 7, 0, 1),
(377, 'Ashuganj', 0, 7, 0, 1),
(378, 'Bijoynagar', 0, 7, 0, 1),
(379, 'Chandpur Sadar', 0, 8, 0, 1),
(380, 'Faridganj', 0, 8, 0, 1),
(381, 'Haimchar', 0, 8, 0, 1),
(382, 'Haziganj', 0, 8, 0, 1),
(383, 'Kachua', 0, 8, 0, 1),
(384, 'Matlab Dakshin', 0, 8, 0, 1),
(385, 'Matlab Uttar', 0, 8, 0, 1),
(386, 'Shahrasti', 0, 8, 0, 1),
(387, 'Anwara', 0, 9, 0, 1),
(388, 'Banshkhali', 0, 9, 0, 1),
(389, 'Boalkhali', 0, 9, 0, 1),
(390, 'Chandanaish', 0, 9, 0, 1),
(391, 'Fatikchhari', 0, 9, 0, 1),
(392, 'Hathazari', 0, 9, 0, 1),
(393, 'Lohagara', 0, 9, 0, 1),
(394, 'Mirsharai', 0, 9, 0, 1),
(395, 'Patiya', 0, 9, 0, 1),
(396, 'Rangunia', 0, 9, 0, 1),
(397, 'Raozan', 0, 9, 0, 1),
(398, 'Sandwip', 0, 9, 0, 1),
(399, 'Satkania', 0, 9, 0, 1),
(400, 'Sitakunda', 0, 9, 0, 1),
(401, 'Bandor (Chittagong Port) Thana', 0, 9, 0, 1),
(402, 'Chandgaon Thana', 0, 9, 0, 1),
(403, 'Double Morring Thana', 0, 9, 0, 1),
(404, 'Kotwali Thana', 0, 9, 0, 1),
(405, 'Pahartali Thana', 0, 9, 0, 1),
(406, 'Panchlaish Thana', 0, 9, 0, 1),
(407, 'Barura', 0, 11, 0, 1),
(408, 'Brahmanpara', 0, 11, 0, 1),
(409, 'Burichong', 0, 11, 0, 1),
(410, 'Chandina', 0, 11, 0, 1),
(411, 'Chauddagram', 0, 11, 0, 1),
(412, 'Daudkandi', 0, 11, 0, 1),
(413, 'Debidwar', 0, 11, 0, 1),
(414, 'Homna', 0, 11, 0, 1),
(415, 'Laksam', 0, 11, 0, 1),
(416, 'Muradnagar', 0, 11, 0, 1),
(417, 'Nangalkot', 0, 11, 0, 1),
(418, 'Comilla Sadar', 0, 11, 0, 1),
(419, 'Meghna', 0, 11, 0, 1),
(420, 'Titas', 0, 11, 0, 1),
(421, 'Monohargonj', 0, 11, 0, 1),
(422, 'Sadar South', 0, 11, 0, 1),
(423, 'Chakaria', 0, 12, 0, 1),
(424, 'Cox''s Bazar Sadar', 0, 12, 0, 1),
(425, 'Kutubdia', 0, 12, 0, 1),
(426, 'Maheshkhali', 0, 12, 0, 1),
(427, 'Ramu', 0, 12, 0, 1),
(428, 'Teknaf', 0, 12, 0, 1),
(429, 'Ukhia', 0, 12, 0, 1),
(430, 'Pekua', 0, 12, 0, 1),
(431, 'Chhagalnaiya', 0, 16, 0, 1),
(432, 'Daganbhuiyan', 0, 16, 0, 1),
(433, 'Feni Sadar', 0, 16, 0, 1),
(434, 'Parshuram', 0, 16, 0, 1),
(435, 'Sonagazi', 0, 16, 0, 1),
(436, 'Fulgazi', 0, 16, 0, 1),
(437, 'Dighinala', 0, 26, 0, 1),
(438, 'Khagrachhari', 0, 26, 0, 1),
(439, 'Lakshmichhari', 0, 26, 0, 1),
(440, 'Mahalchhari', 0, 26, 0, 1),
(441, 'Manikchhari', 0, 26, 0, 1),
(442, 'Matiranga', 0, 26, 0, 1),
(443, 'Panchhari', 0, 26, 0, 1),
(444, 'Ramgarh', 0, 26, 0, 1),
(445, 'Lakshmipur Sadar', 0, 31, 0, 1),
(446, 'Raipur', 0, 31, 0, 1),
(447, 'Ramganj', 0, 31, 0, 1),
(448, 'Ramgati', 0, 31, 0, 1),
(449, 'Komolnagar', 0, 31, 0, 1),
(450, 'Begumganj', 0, 48, 0, 1),
(451, 'Noakhali Sadar', 0, 48, 0, 1),
(452, 'Chatkhil', 0, 48, 0, 1),
(453, 'Companiganj', 0, 48, 0, 1),
(454, 'Hatiya', 0, 48, 0, 1),
(455, 'Senbagh', 0, 48, 0, 1),
(456, 'Sonaimuri', 0, 48, 0, 1),
(457, 'Subarnachar', 0, 48, 0, 1),
(458, 'Kabirhat', 0, 48, 0, 1),
(459, 'Bagaichhari', 0, 55, 0, 1),
(460, 'Barkal', 0, 55, 0, 1),
(461, 'Kawkhali (Betbunia)', 0, 55, 0, 1),
(462, 'Belaichhari', 0, 55, 0, 1),
(463, 'Kaptai', 0, 55, 0, 1),
(464, 'Juraichhari', 0, 55, 0, 1),
(465, 'Langadu', 0, 55, 0, 1),
(466, 'Naniyachar', 0, 55, 0, 1),
(467, 'Rajasthali', 0, 55, 0, 1),
(468, 'Rangamati Sadar', 0, 55, 0, 1),
(469, 'Ajmiriganj', 0, 20, 0, 1),
(470, 'Bahubal', 0, 20, 0, 1),
(471, 'Baniyachong', 0, 20, 0, 1),
(472, 'Chunarughat', 0, 20, 0, 1),
(473, 'Habiganj Sadar', 0, 20, 0, 1),
(474, 'Lakhai', 0, 20, 0, 1),
(475, 'Madhabpur', 0, 20, 0, 1),
(476, 'Nabiganj', 0, 20, 0, 1),
(477, 'Barlekha', 0, 37, 0, 1),
(478, 'Kamalganj', 0, 37, 0, 1),
(479, 'Kulaura', 0, 37, 0, 1),
(480, 'Moulvibazar Sadar', 0, 37, 0, 1),
(481, 'Rajnagar', 0, 37, 0, 1),
(482, 'Sreemangal', 0, 37, 0, 1),
(483, 'Juri', 0, 37, 0, 1),
(484, 'Bishwamvarpur', 0, 61, 0, 1),
(485, 'Chhatak', 0, 61, 0, 1),
(486, 'Derai', 0, 61, 0, 1),
(487, 'Dharampasha', 0, 61, 0, 1),
(488, 'Dowarabazar', 0, 61, 0, 1),
(489, 'Jagannathpur', 0, 61, 0, 1),
(490, 'Jamalganj', 0, 61, 0, 1),
(491, 'Sullah', 0, 61, 0, 1),
(492, 'Sunamganj Sadar', 0, 61, 0, 1),
(493, 'Tahirpur', 0, 61, 0, 1),
(494, 'South Sunamganj', 0, 61, 0, 1),
(495, 'Balaganj', 0, 62, 0, 1),
(496, 'Beanibazar', 0, 62, 0, 1),
(497, 'Bishwanath', 0, 62, 0, 1),
(498, 'Companigonj', 0, 62, 0, 1),
(499, 'Fenchuganj', 0, 62, 0, 1),
(500, 'Golapganj', 0, 62, 0, 1),
(501, 'Gowainghat', 0, 62, 0, 1),
(502, 'Jaintiapur', 0, 62, 0, 1),
(503, 'Kanaighat', 0, 62, 0, 1),
(504, 'Sylhet Sadar', 0, 62, 0, 1),
(505, 'Zakiganj', 0, 62, 0, 1),
(506, 'South Shurma', 0, 62, 0, 1),
(507, 'Bagerhat Sadar', 0, 13, 0, 1),
(508, 'Chitalmari', 0, 13, 0, 1),
(509, 'Fakirhat', 0, 13, 0, 1),
(510, 'Kachua', 0, 13, 0, 1),
(511, 'Mollahat', 0, 13, 0, 1),
(512, 'Mongla', 0, 13, 0, 1),
(513, 'Morrelganj', 0, 13, 0, 1),
(514, 'Rampal', 0, 13, 0, 1),
(515, 'Sarankhola', 0, 13, 0, 1),
(516, 'Alamdanga', 0, 10, 0, 1),
(517, 'Chuadanga Sadar', 0, 10, 0, 1),
(518, 'Damurhuda', 0, 10, 0, 1),
(519, 'Jibannagar', 0, 10, 47, 1),
(520, 'Abhaynagar', 0, 22, 0, 1),
(521, 'Bagherpara', 0, 22, 0, 1),
(522, 'Chaugachha', 0, 22, 0, 1),
(523, 'Jhikargachha', 0, 22, 0, 1),
(524, 'Keshabpur', 0, 22, 0, 1),
(525, 'Jessore Sadar', 0, 22, 0, 1),
(526, 'Manirampur', 0, 22, 0, 1),
(527, 'Sharsha', 0, 22, 0, 1),
(528, 'Harinakunda', 0, 24, 0, 1),
(529, 'Jhenaidah Sadar', 0, 24, 0, 1),
(530, 'Kaliganj', 0, 24, 0, 1),
(531, 'Kotchandpur', 0, 24, 0, 1),
(532, 'Maheshpur', 0, 24, 0, 1),
(533, 'Shailkupa', 0, 24, 0, 1),
(534, 'Batiaghata', 0, 27, 0, 1),
(535, 'Dacope', 0, 27, 0, 1),
(536, 'Dumuria', 0, 27, 0, 1),
(537, 'Dighalia', 0, 27, 0, 1),
(538, 'Koyra', 0, 27, 0, 1),
(539, 'Paikgachha', 0, 27, 0, 1),
(540, 'Phultala', 0, 27, 0, 1),
(541, 'Rupsha', 0, 27, 0, 1),
(542, 'Terokhada', 0, 27, 0, 1),
(543, 'Daulatpur Thana', 0, 27, 0, 1),
(544, 'Khalishpur Thana', 0, 27, 0, 1),
(545, 'Khan Jahan Ali Thana', 0, 27, 0, 1),
(546, 'Kotwali Thana', 0, 27, 0, 1),
(547, 'Sonadanga Thana', 0, 27, 0, 1),
(548, 'Harintana Thana', 0, 27, 0, 1),
(549, 'Bheramara', 0, 30, 48, 1),
(550, 'Daulatpur', 0, 30, 0, 1),
(551, 'Khoksa', 0, 30, 0, 1),
(552, 'Kumarkhali', 0, 30, 0, 1),
(553, 'Kushtia Sadar', 0, 30, 0, 1),
(554, 'Mirpur', 0, 30, 0, 1),
(555, 'Shekhpara', 0, 30, 0, 1),
(556, 'Magura Sadar', 0, 34, 0, 1),
(557, 'Mohammadpur', 0, 34, 0, 1),
(558, 'Shalikha', 0, 34, 0, 1),
(559, 'Sreepur', 0, 34, 0, 1),
(560, 'Gangni', 0, 36, 0, 1),
(561, 'Meherpur Sadar', 0, 36, 0, 1),
(562, 'Mujibnagar', 0, 36, 0, 1),
(563, 'Kalia', 0, 41, 0, 1),
(564, 'Lohagara', 0, 41, 0, 1),
(565, 'Narail Sadar', 0, 41, 0, 1),
(566, 'Naragati Thana', 0, 41, 0, 1),
(567, 'Assasuni', 0, 57, 0, 1),
(568, 'Debhata', 0, 57, 0, 1),
(569, 'Kalaroa', 0, 57, 0, 1),
(570, 'Kaliganj', 0, 57, 0, 1),
(571, 'Satkhira Sadar', 0, 57, 0, 1),
(572, 'Shyamnagar', 0, 57, 0, 1),
(573, 'Tala', 0, 57, 0, 1),
(574, 'Debhata', 0, 57, 0, 1),
(575, 'Kalaroa', 0, 57, 0, 1),
(576, 'Kaliganj', 0, 57, 40, 1),
(577, 'Satkhira Sadar', 0, 57, 34, 1),
(578, 'Shyamnagar', 0, 57, 35, 1),
(579, 'Tala', 4, 57, 40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE IF NOT EXISTS `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `challan_date` date NOT NULL,
  `memo_no` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `rid` int(11) NOT NULL,
  `transfer_to` int(11) NOT NULL,
  `transfer_from_div` int(11) NOT NULL,
  `to_jonal` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `entryby` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `comments` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`id`, `transfer_time`, `challan_date`, `memo_no`, `rid`, `transfer_to`, `transfer_from_div`, `to_jonal`, `college_id`, `teacher_id`, `entryby`, `comments`, `status`) VALUES
(1, '2015-10-27 11:15:14', '2015-10-27', 'ABC 22852855', 0, 1, 0, 0, 0, 0, '1', 'Test send', 1),
(2, '2015-10-27 11:30:05', '2015-10-27', 'Apooo', 1, 1, 0, 0, 0, 0, '1', 'test final', 1),
(3, '2015-10-27 11:35:20', '2015-10-27', '45436', 2, 4, 0, 0, 0, 0, '1', 'rtrtret', 1),
(4, '2015-11-03 14:21:48', '2015-11-03', '11', 0, 1, 0, 0, 0, 0, '2', '', 1),
(5, '2015-11-04 06:37:51', '2015-11-04', '789', 0, 3, 0, 0, 0, 0, '2', 'Just For Testing Purpose', 1),
(6, '2015-11-04 06:55:21', '2015-11-04', '789', 0, 5, 0, 0, 0, 0, '2', 'just for testing', 1),
(7, '2015-11-04 06:56:52', '2015-11-04', '3', 0, 4, 0, 0, 0, 0, '2', 'sdfsfsd', 1),
(8, '2015-11-04 07:07:50', '2015-11-04', '11', 2, 1, 0, 0, 0, 0, '2', 'Just for testing', 1),
(9, '2015-11-04 07:14:02', '2015-11-04', '3', 0, 5, 0, 0, 0, 0, '2', 'fddgdgd', 1),
(10, '2015-11-04 09:36:36', '2015-11-04', '123', 0, 5, 0, 0, 0, 0, '2', 'Just For Testing', 1),
(11, '2015-11-04 09:42:14', '2015-11-04', '789', 0, 5, 0, 0, 0, 0, '2', 'sdfsdf', 1),
(12, '2015-11-08 14:30:28', '2015-11-08', '789', 0, 5, 0, 0, 0, 0, '2', 'Demo', 1),
(13, '2015-11-09 10:55:39', '2015-11-09', '444', 0, 5, 0, 0, 0, 0, '2', 'Department Check', 1),
(14, '2015-11-09 10:57:37', '2015-11-09', '444', 0, 5, 0, 0, 0, 0, '2', 'Teacher Name : Hasinuzzaman Sir and Department Name is Computer', 1),
(15, '2015-11-09 11:35:16', '2015-11-09', '333', 0, 5, 4, 7, 5, 6, '2', 'dfsdfsdf', 1),
(16, '2015-12-19 07:46:33', '2015-12-19', 'Dhk 001', 0, 406, 1, 3, 406, 0, '2', ' ', 1),
(17, '2015-12-19 08:07:53', '2015-12-19', 'ctg001', 0, 65, 2, 1, 65, 0, '2', ' ', 1),
(18, '2015-12-22 05:28:23', '2015-12-21', '95888', 0, 74, 2, 1, 74, 71, '1', ' testing purchase ', 1),
(19, '2015-12-22 11:54:24', '2015-12-22', '78', 0, 392, 1, 3, 392, 0, '1', ' ', 1),
(20, '2015-12-23 07:53:25', '2015-12-23', '01', 0, 74, 2, 1, 74, 72, '1', ' Testing', 1),
(21, '2015-12-23 07:56:46', '2015-12-23', '02', 0, 402, 1, 3, 402, 0, '1', ' test', 1),
(22, '2015-12-23 08:23:36', '2015-12-23', 'fd', 0, 97, 2, 2, 97, 0, '1', ' ', 1),
(23, '2015-12-27 06:07:48', '2015-12-27', '25', 0, 74, 2, 1, 74, 71, '1', ' ', 1),
(24, '2015-12-27 06:19:19', '2015-12-27', '95888', 0, 97, 2, 2, 97, 0, '1', ' ', 1),
(25, '2015-12-27 06:21:41', '2015-12-27', 'fd', 0, 74, 2, 1, 74, 81, '1', ' ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_item`
--

CREATE TABLE IF NOT EXISTS `transfer_item` (
  `transfer_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `line_no` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transfer_item`
--

INSERT INTO `transfer_item` (`transfer_id`, `book_id`, `quantity`, `price`, `line_no`, `status`) VALUES
(1, 1, 1, 250, 0, 1),
(1, 2, 1, 750, 1, 1),
(2, 1, 1, 250, 0, 1),
(2, 2, 1, 750, 1, 1),
(3, 1, 4, 250, 0, 1),
(4, 2, 3, 750, 0, 1),
(5, 1, 5, 250, 0, 1),
(6, 1, 3, 250, 0, 1),
(7, 2, 2, 750, 0, 1),
(8, 2, 5, 750, 0, 1),
(9, 1, 10, 250, 0, 1),
(10, 3, 6, 333, 0, 1),
(11, 3, 3, 333, 0, 1),
(12, 3, 15, 333, 0, 1),
(13, 3, 12, 333, 0, 1),
(14, 2, 4, 750, 0, 1),
(15, 1, 5, 250, 0, 1),
(16, 5, 4, 550, 0, 1),
(16, 6, 1, 500, 1, 1),
(17, 5, 6, 550, 0, 1),
(17, 6, 4, 500, 1, 1),
(18, 5, 5, 550, 0, 1),
(19, 5, 1, 550, 0, 1),
(20, 5, 7, 550, 0, 1),
(21, 6, 1, 500, 0, 1),
(22, 5, 1, 550, 0, 1),
(23, 5, 1, 550, 0, 1),
(24, 5, 1, 550, 0, 1),
(24, 6, 1, 500, 1, 1),
(25, 4, 1, 44, 0, 1),
(25, 6, 10, 500, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` varchar(5) COLLATE utf8_unicode_ci NOT NULL COMMENT 'superAdmin=1; admin=2; divisionalHead=3; JonalHead=4; Marketing Executive: 5',
  `pdepartment` int(11) NOT NULL COMMENT '''0''=" All permission". and '' others define in department table''',
  `entryby` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  `district_id` int(3) NOT NULL,
  `thana_id` int(4) NOT NULL,
  `jonal_id` int(11) NOT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `district_id` (`district_id`,`thana_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `image`, `address`, `email`, `password`, `phone`, `user_type`, `pdepartment`, `entryby`, `division_id`, `district_id`, `thana_id`, `jonal_id`, `status`) VALUES
(1, 'Dikdarshan Admin', '20151120_234529.jpg', 'Dhaka-1200', 'admin@book', 'c8837b23ff8aaa8a2dde915473ce0991', '01924923311', '1', 0, 1, 0, 0, 0, 5, '1'),
(2, 'Tasfir Hossain', 'suman.jpg', 'House#01, Road# 06, Block# C, Banasree, Rampura', 'tasfir_suman@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '1911198784', '2', 0, 1, 0, 0, 0, 0, '1'),
(16, 'Hasinuzzaman', 'hrm.png', 'Malibag', 'hasin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01911198784', '1', 0, 2, 0, 0, 0, 0, '1'),
(17, 'Gias Uddin', 'open.png', 'House#01, Road# 06, Block# C, Banasree, Rampura', 'gias@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01672839609', '3', 0, 1, 0, 0, 0, 0, '13'),
(18, 'Arham Sanzid', 'acm.png', 'House#01, Road# 06, Block# C, Banasree, Rampura', 'sanzid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01672839609', '5', 0, 1, 0, 0, 0, 0, '13'),
(19, 'sadimran', 'erp_textiles1.jpg', 'sdasdasd', 'hasin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '111', '4', 0, 1, 0, 0, 0, 0, '13'),
(20, 'Samiul Islam', 'erp_textiles2.jpg', 'fddfgd', 'hasin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '222', '2', 0, 1, 0, 0, 0, 0, '13'),
(21, 'Sanzid Arham', '', 'House#01, Road# 06, Block# C, Banasree, Rampura', 'sanzid@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01672839609', '5', 0, 1, 0, 0, 0, 0, '13'),
(22, 'Habib Ibna Ekram', '', 'Ta-72/1/a. Middle Badda.', 'habibibnaekram@hotmail.com', '216b0b19c47127f8a8db0864020f3dc6', '01713315144', '2', 0, 1, 0, 0, 0, 0, '1'),
(23, 'Jahirunnobi Chy. Lovelu', '', 'Badda', 'lovelu@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608005', '4', 1, 1, 0, 0, 0, 0, '1'),
(24, 'Joynal Abedin Manik', '', 'Chittagong', 'manik@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608004', '4', 2, 1, 0, 0, 0, 0, '1'),
(25, 'Ashiqur Rahman Khan', '', 'Mohammedpur', 'ashique@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608002', '4', 3, 1, 0, 0, 0, 0, '1'),
(26, 'Sheikh Mohammed Imran Hossain', '', 'Badda', 'smih@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608000', '4', 4, 1, 0, 0, 0, 0, '1'),
(27, 'Soyeb Chowdhury', '', 'Mymensingh', 'soyeb@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608003', '4', 7, 1, 0, 0, 0, 0, '1'),
(28, 'Lovelu', '', 'Badda', 'loveluexe@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01716102124', '5', 0, 1, 2, 2, 365, 2, '1'),
(29, 'Bappi', '', 'badda', 'bappi@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01913315144', '3', 0, 1, 0, 0, 0, 0, '1'),
(30, 'Habib Ibna Ekram', '', 'Badda', 'habib@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01613315144', '4', 0, 1, 1, 0, 0, 0, '1'),
(31, 'rajib', '', 'Dhaka', 'rajib@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '1', 0, 2, 0, 0, 0, 0, '13'),
(32, 'Kazi Jabiul', '', 'Dhaka', 'jabiul@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608011', '5', 0, 1, 3, 0, 0, 9, '1'),
(33, 'Kazi Jony', '', 'Noakhali', 'jony@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608017', '5', 0, 1, 5, 0, 0, 15, '1'),
(34, 'Aziz', '', 'Cox''s bazar', 'aziz@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608029', '5', 0, 1, 2, 0, 0, 2, '1'),
(35, 'Joinal Abedin', '', 'Chittagong', 'manikctg@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01712387506', '5', 0, 1, 2, 0, 0, 1, '1'),
(36, 'Mahfuz', '', 'Khulna', 'mahfuz@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608007', '5', 0, 1, 3, 0, 0, 5, '1'),
(37, 'Sujon Roy', '', 'Jessore', 'sujon@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608020', '5', 0, 1, 3, 0, 0, 17, '1'),
(38, 'Salauddin', '', 'Kustia', 'sauddin@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608021', '5', 0, 1, 4, 0, 0, 21, '1'),
(39, 'Murad', '', 'Rajshahi', 'murad@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608006', '5', 0, 1, 3, 0, 0, 4, '1'),
(40, 'Shojib', '', 'Shahjadpur', 'shojib@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608022', '5', 0, 1, 4, 0, 0, 19, '1'),
(41, 'Mizan', '', 'Rangpur', 'mizan@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01737549460', '5', 0, 1, 4, 0, 0, 8, '1'),
(42, 'Imran', '', 'Badda', 'imran@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01717760000', '5', 0, 1, 4, 0, 0, 20, '1'),
(43, 'Rifat Ahmed', '', 'Dhaka', 'rifat@coderstrust.com', '35c0c28414ac08bb8b6729631f69ee01', '', '4', 0, 2, 0, 0, 0, 0, '13'),
(44, 'Basir', '', 'Barishal', 'basir@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608014', '5', 0, 1, 7, 0, 0, 12, '1'),
(45, 'Alal', '', 'Dhaka', 'alal@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608015', '5', 0, 1, 5, 0, 0, 13, '1'),
(46, 'Shoyeb', '', 'Mymensing', 'soyebabd@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01914353490', '5', 0, 1, 7, 0, 0, 10, '1'),
(47, 'SUMON', '', 'Kishoreganj', 'sumon@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608013', '5', 0, 1, 7, 0, 0, 11, '1'),
(48, 'Pinku', '', 'Faridpur', 'pinku@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608010', '5', 0, 1, 3, 0, 0, 7, '1'),
(49, 'Oshit', '', 'Gopalgonj', 'oshit@abdpot.com', 'c8837b23ff8aaa8a2dde915473ce0991', '01969608023', '5', 0, 1, 3, 0, 0, 6, '1'),
(50, 'Sanzid', 'Avatar.png', 'uttara dhaka', 'sanzid@live.com', 'e10adc3949ba59abbe56e057f20f883e', '01671400051', '4', 0, 2, 0, 0, 0, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE IF NOT EXISTS `user_permission` (
  `uid` int(11) NOT NULL,
  `user_type` int(11) NOT NULL,
  `module` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `m_action` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `entryby` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`uid`, `user_type`, `module`, `m_action`, `entryby`, `status`) VALUES
(0, 1, 'user', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:10:"permission";}', 2, 1),
(0, 1, 'college', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'scategory', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'department', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'supplier', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'customer', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'producttype', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'product', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'purchase', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:12:"printpreview";}', 2, 1),
(0, 1, 'transfer', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:12:"printpreview";}', 2, 1),
(0, 1, 'inventory', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:12:"product_info";}', 2, 1),
(0, 1, 'report', 'a:9:{i:0;s:5:"index";i:1;s:11:"report_item";i:2;s:17:"divisioninventory";i:3;s:14:"jonalinventory";i:4;s:16:"collegeinventory";i:5;s:11:"requisition";i:6;s:8:"transfer";i:7;s:13:"jonaltransfer";i:8;s:10:"distribute";}', 2, 1),
(0, 1, 'teachers', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'division', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'jonal', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:9:"jonaluser";i:4;s:6:"delete";i:5;s:10:"delete_all";}', 2, 1),
(0, 1, 'district', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'thana', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'subject', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'books', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 1, 'maexecutive', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 2, 1),
(0, 4, 'user', 'b:0;', 1, 1),
(0, 4, 'college', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'scategory', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'department', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'supplier', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'customer', 'a:3:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";}', 1, 1),
(0, 4, 'producttype', 'a:3:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";}', 1, 1),
(0, 4, 'product', 'a:3:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";}', 1, 1),
(0, 4, 'purchase', 'a:4:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:12:"printpreview";}', 1, 1),
(0, 4, 'transfer', 'a:4:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:12:"printpreview";}', 1, 1),
(0, 4, 'inventory', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'report', 'a:8:{i:0;s:5:"index";i:1;s:17:"divisioninventory";i:2;s:14:"jonalinventory";i:3;s:16:"collegeinventory";i:4;s:11:"requisition";i:5;s:8:"transfer";i:6;s:13:"jonaltransfer";i:7;s:10:"distribute";}', 1, 1),
(0, 4, 'teachers', 'a:3:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";}', 1, 1),
(0, 4, 'division', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'jonal', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'district', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'thana', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'subject', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'books', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 4, 'maexecutive', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'user', 'b:0;', 1, 1),
(0, 5, 'college', 'a:3:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";}', 1, 1),
(0, 5, 'scategory', 'b:0;', 1, 1),
(0, 5, 'department', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'supplier', 'b:0;', 1, 1),
(0, 5, 'customer', 'b:0;', 1, 1),
(0, 5, 'producttype', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'product', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'purchase', 'b:0;', 1, 1),
(0, 5, 'transfer', 'b:0;', 1, 1),
(0, 5, 'inventory', 'a:2:{i:0;s:5:"index";i:1;s:12:"product_info";}', 1, 1),
(0, 5, 'report', 'b:0;', 1, 1),
(0, 5, 'teachers', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'division', 'b:0;', 1, 1),
(0, 5, 'jonal', 'b:0;', 1, 1),
(0, 5, 'district', 'b:0;', 1, 1),
(0, 5, 'thana', 'b:0;', 1, 1),
(0, 5, 'subject', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'books', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 5, 'maexecutive', 'b:0;', 1, 1),
(0, 2, 'user', 'a:1:{i:0;s:5:"index";}', 1, 1),
(0, 2, 'college', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'scategory', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'department', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'supplier', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'customer', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'producttype', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'product', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'purchase', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:12:"printpreview";}', 1, 1),
(0, 2, 'transfer', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:12:"printpreview";}', 1, 1),
(0, 2, 'inventory', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";i:5;s:12:"product_info";}', 1, 1),
(0, 2, 'report', 'a:9:{i:0;s:5:"index";i:1;s:11:"report_item";i:2;s:17:"divisioninventory";i:3;s:14:"jonalinventory";i:4;s:16:"collegeinventory";i:5;s:11:"requisition";i:6;s:8:"transfer";i:7;s:13:"jonaltransfer";i:8;s:10:"distribute";}', 1, 1),
(0, 2, 'teachers', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'division', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'jonal', 'a:6:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:9:"jonaluser";i:4;s:6:"delete";i:5;s:10:"delete_all";}', 1, 1),
(0, 2, 'district', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'thana', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'subject', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'books', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'maexecutive', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1),
(0, 2, 'year', 'a:5:{i:0;s:5:"index";i:1;s:3:"add";i:2;s:4:"edit";i:3;s:6:"delete";i:4;s:10:"delete_all";}', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `zonal_group`
--

CREATE TABLE IF NOT EXISTS `zonal_group` (
  `zonal_id` int(4) NOT NULL,
  `district_id` int(4) NOT NULL,
  `division_id` int(4) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  KEY `zonal_id` (`zonal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zonal_group`
--

INSERT INTO `zonal_group` (`zonal_id`, `district_id`, `division_id`, `date`, `status`) VALUES
(49, 50, 6, '2016-04-13 06:49:50', 1),
(49, 51, 6, '2016-04-13 06:49:50', 1),
(49, 52, 6, '2016-04-13 06:49:50', 1),
(49, 53, 6, '2016-04-13 06:49:50', 1),
(49, 54, 6, '2016-04-13 06:49:50', 1),
(49, 55, 6, '2016-04-13 06:49:50', 1),
(49, 56, 6, '2016-04-13 06:49:50', 1),
(50, 58, 1, '2016-04-13 06:55:33', 1),
(50, 59, 1, '2016-04-13 06:55:33', 1),
(50, 60, 1, '2016-04-13 06:55:33', 1),
(50, 61, 1, '2016-04-13 06:55:33', 1),
(50, 62, 1, '2016-04-13 06:55:33', 1),
(50, 63, 1, '2016-04-13 06:55:33', 1),
(50, 64, 1, '2016-04-13 06:55:33', 1),
(51, 63, 6, '2016-04-13 08:30:51', 1),
(51, 64, 6, '2016-04-13 08:30:51', 1),
(52, 51, 7, '2016-04-13 09:05:29', 1),
(52, 52, 7, '2016-04-13 09:05:29', 1),
(52, 53, 7, '2016-04-13 09:05:29', 1),
(52, 54, 7, '2016-04-13 09:05:29', 1),
(52, 55, 7, '2016-04-13 09:05:29', 1),
(52, 56, 7, '2016-04-13 09:05:29', 1),
(52, 57, 7, '2016-04-13 09:05:29', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
