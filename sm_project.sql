-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 03:40 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sm_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mdl_01_d`
--

CREATE TABLE IF NOT EXISTS `mdl_01_d` (
  `mdl1_id` int(11) NOT NULL,
  `mdl1_d_1` tinyint(4) NOT NULL,
  `mdl1_d_2` tinyint(4) NOT NULL,
  `mdl1_d_3` tinyint(4) NOT NULL,
  `mdl1_d_4` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mdl_01_d`
--

INSERT INTO `mdl_01_d` (`mdl1_id`, `mdl1_d_1`, `mdl1_d_2`, `mdl1_d_3`, `mdl1_d_4`) VALUES
(1, 0, 1, 1, 1),
(2, 1, 1, 0, 1),
(3, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_01_dname`
--

CREATE TABLE IF NOT EXISTS `mdl_01_dname` (
  `mdl1_id` int(11) NOT NULL,
  `mdl1_d_1_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Thiết bị 1',
  `mdl1_d_2_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Thiết bị 2',
  `mdl1_d_3_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Thiết bị 3',
  `mdl1_d_4_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Thiết bị 4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mdl_01_dname`
--

INSERT INTO `mdl_01_dname` (`mdl1_id`, `mdl1_d_1_name`, `mdl1_d_2_name`, `mdl1_d_3_name`, `mdl1_d_4_name`) VALUES
(1, 'Đèn trần', 'Ti vi', 'Thiết bị 3', 'Thiết bị 4'),
(2, 'Đèn bếp', 'Thiết bị 2', 'Thiết bị 3', 'Thiết bị 4'),
(3, 'Thiết bị 1', 'Thiết bị 2', 'Thiết bị 3', 'Thiết bị 4');

-- --------------------------------------------------------

--
-- Table structure for table `mdl_01_dsetting`
--

CREATE TABLE IF NOT EXISTS `mdl_01_dsetting` (
  `mdl1_id` int(11) NOT NULL,
  `mdl1_d_1` int(2) NOT NULL DEFAULT '0',
  `mdl1_d_2` int(2) NOT NULL DEFAULT '0',
  `mdl1_d_3` int(2) NOT NULL DEFAULT '0',
  `mdl1_d_4` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mdl_01_dsetting`
--

INSERT INTO `mdl_01_dsetting` (`mdl1_id`, `mdl1_d_1`, `mdl1_d_2`, `mdl1_d_3`, `mdl1_d_4`) VALUES
(1, 2, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mdl_01_s`
--

CREATE TABLE IF NOT EXISTS `mdl_01_s` (
  `mdl1_id` int(11) NOT NULL,
  `mdl1_s_t` int(11) NOT NULL,
  `mdl1_s_h` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mdl_01_s`
--

INSERT INTO `mdl_01_s` (`mdl1_id`, `mdl1_s_t`, `mdl1_s_h`) VALUES
(1, 28, 59),
(1, 28, 60),
(1, 28, 60),
(1, 28, 59),
(1, 28, 59),
(1, 30, 76),
(1, 32, 83),
(1, 29, 81),
(1, 28, 79),
(1, 29, 70),
(1, 28, 67),
(1, 28, 63),
(1, 27, 62),
(1, 27, 61),
(1, 27, 61),
(1, 27, 61),
(1, 27, 61),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 61),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 27, 60),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647),
(1, 2147483647, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mdl_',
  `mt_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`m_id`, `m_name`, `mt_id`, `u_id`) VALUES
(1, 'Thiết bị phòng khách', 1, 2),
(2, 'Thiết bị phòng bếp', 1, 2),
(3, 'Thiết bị phòng ngủ', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `module_type`
--

CREATE TABLE IF NOT EXISTS `module_type` (
  `mt_id` int(11) NOT NULL,
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'mdl_',
  `mt_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mt_description` text COLLATE utf8_unicode_ci NOT NULL,
  `mt_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_type`
--

INSERT INTO `module_type` (`mt_id`, `prefix`, `mt_name`, `mt_description`, `mt_price`) VALUES
(1, 'mdl_01', 'Thiết bị cho phòng khách', 'Sử dụng sensor nhiệt độ, độ ẩm. Có thiết điều khiển 4 thiết bị', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `setting_day_timer`
--

CREATE TABLE IF NOT EXISTS `setting_day_timer` (
  `id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `dvc_name_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` time NOT NULL DEFAULT '00:00:00',
  `end_time` time NOT NULL DEFAULT '23:59:00'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_day_timer`
--

INSERT INTO `setting_day_timer` (`id`, `mdl_id`, `dvc_name_id`, `start_time`, `end_time`) VALUES
(1, 1, 'mdl1_d_1', '00:00:01', '23:59:01'),
(2, 1, 'mdl1_d_2', '00:00:00', '23:59:00'),
(3, 1, 'mdl1_d_3', '00:00:00', '23:59:00'),
(4, 1, 'mdl1_d_4', '00:00:00', '23:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting_humidity`
--

CREATE TABLE IF NOT EXISTS `setting_humidity` (
  `id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `dvc_name_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `humidity` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_humidity`
--

INSERT INTO `setting_humidity` (`id`, `mdl_id`, `dvc_name_id`, `humidity`) VALUES
(1, 1, 'mdl1_d_1', '3'),
(2, 1, 'mdl1_d_2', '3'),
(3, 1, 'mdl1_d_3', '3'),
(4, 1, 'mdl1_d_4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `setting_temperature`
--

CREATE TABLE IF NOT EXISTS `setting_temperature` (
  `id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `dvc_name_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `temperature` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_temperature`
--

INSERT INTO `setting_temperature` (`id`, `mdl_id`, `dvc_name_id`, `temperature`) VALUES
(1, 1, 'mdl1_d_1', '3'),
(2, 1, 'mdl1_d_2', '3'),
(3, 1, 'mdl1_d_3', '3'),
(4, 1, 'mdl1_d_4', '3');

-- --------------------------------------------------------

--
-- Table structure for table `setting_timer`
--

CREATE TABLE IF NOT EXISTS `setting_timer` (
  `id` int(11) NOT NULL,
  `mdl_id` int(11) NOT NULL,
  `dvc_name_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `minute` int(11) NOT NULL DEFAULT '0',
  `end_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_timer`
--

INSERT INTO `setting_timer` (`id`, `mdl_id`, `dvc_name_id`, `minute`, `end_time`) VALUES
(1, 1, 'mdl1_d_1', 3, '2017-09-16 23:09:08'),
(2, 1, 'mdl1_d_2', 0, '2017-09-16 15:56:08'),
(3, 1, 'mdl1_d_3', 0, '2017-09-16 15:56:20'),
(4, 1, 'mdl1_d_4', 0, '2017-09-16 15:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avata` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avata`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1505048111, 1, 'Admin', 'istrator', 'ADMIN', '0', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQEBUQEBAVFhUXFRUWFxcYFxYVFxUVFxcWFxcVFhUYHSggGBomHRUVITEiJykrLzAuFyA1ODMsNygtLisBCgoKDg0OGhAQGy0mICUtLTIrKy01Ly8tLS0tLSstLS01Li0rLS0uLSstLS0tKy03LS8tLS0tLS0vLS0tLS0tLf/AABEIAPMAzwMBIgACEQEDEQH/'),
(2, '::1', 'user@user.com', '$2y$08$sncEoJK7IWXaXMS865fade0TOBU5vfGK94gDnTohgU/e9AFbIRzXm', NULL, 'user@user.com', NULL, NULL, NULL, NULL, 1504782054, 1505577101, 1, 'Trinh Dinh Viet', 'tring dinh viet', 'UET-VNU', '012345789', ''),
(3, '::1', '123@123.com', '$2y$08$YcQnswvsSPZAo/JYV6s1aupU6l6gpEiFC5Oa2uChRwabJgi6hFW8.', NULL, '123@123.com', NULL, NULL, NULL, NULL, 1505036860, NULL, 1, 'tdv', 'tdv', 'vnu', '1234567806', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mdl_01_d`
--
ALTER TABLE `mdl_01_d`
  ADD PRIMARY KEY (`mdl1_id`);

--
-- Indexes for table `mdl_01_dname`
--
ALTER TABLE `mdl_01_dname`
  ADD PRIMARY KEY (`mdl1_id`);

--
-- Indexes for table `mdl_01_dsetting`
--
ALTER TABLE `mdl_01_dsetting`
  ADD PRIMARY KEY (`mdl1_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_id` (`m_id`);

--
-- Indexes for table `module_type`
--
ALTER TABLE `module_type`
  ADD PRIMARY KEY (`mt_id`);

--
-- Indexes for table `setting_day_timer`
--
ALTER TABLE `setting_day_timer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_humidity`
--
ALTER TABLE `setting_humidity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_temperature`
--
ALTER TABLE `setting_temperature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_timer`
--
ALTER TABLE `setting_timer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mdl_01_d`
--
ALTER TABLE `mdl_01_d`
  MODIFY `mdl1_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `setting_day_timer`
--
ALTER TABLE `setting_day_timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting_humidity`
--
ALTER TABLE `setting_humidity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting_temperature`
--
ALTER TABLE `setting_temperature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `setting_timer`
--
ALTER TABLE `setting_timer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
