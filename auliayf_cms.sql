-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2015 at 11:37 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `auliayf_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_menu`
--

CREATE TABLE IF NOT EXISTS `app_menu` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL DEFAULT '0',
  `name` varchar(125) NOT NULL,
  `target` varchar(125) NOT NULL,
  `order` int(11) NOT NULL,
  `id_module` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_menu`
--

INSERT INTO `app_menu` (`id`, `id_parent`, `name`, `target`, `order`, `id_module`) VALUES
(1, 0, 'Home', '', 1, 2),
(2, 0, 'About Us', 'about', 2, 2),
(3, 1, 'Child', 'home', 1, 2),
(4, 0, 'Settings', 'settings', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `app_module`
--

CREATE TABLE IF NOT EXISTS `app_module` (
  `id` int(11) NOT NULL,
  `name` varchar(125) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_module`
--

INSERT INTO `app_module` (`id`, `name`, `order`) VALUES
(1, 'Backend', 1),
(2, 'Frontend', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dta_post`
--

CREATE TABLE IF NOT EXISTS `dta_post` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dta_post`
--

INSERT INTO `dta_post` (`id`, `id_user`, `content`, `datetime`) VALUES
(1, 1, 'Test', '2015-07-10 15:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `dta_post_comment`
--

CREATE TABLE IF NOT EXISTS `dta_post_comment` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dta_post_like`
--

CREATE TABLE IF NOT EXISTS `dta_post_like` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dta_post_like`
--

INSERT INTO `dta_post_like` (`id`, `id_post`, `id_user`, `datetime`) VALUES
(22, 1, 1, '2015-07-13 08:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `dta_user`
--

CREATE TABLE IF NOT EXISTS `dta_user` (
  `id` int(11) NOT NULL,
  `user` varchar(125) NOT NULL,
  `pass` varchar(125) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dta_user`
--

INSERT INTO `dta_user` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_menu`
--
ALTER TABLE `app_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_module`
--
ALTER TABLE `app_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dta_post`
--
ALTER TABLE `dta_post`
  ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dta_post_comment`
--
ALTER TABLE `dta_post_comment`
  ADD PRIMARY KEY (`id`), ADD KEY `id_post` (`id_post`), ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `dta_post_like`
--
ALTER TABLE `dta_post_like`
  ADD PRIMARY KEY (`id`), ADD KEY `id_user` (`id_user`), ADD KEY `id_post` (`id_post`);

--
-- Indexes for table `dta_user`
--
ALTER TABLE `dta_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_menu`
--
ALTER TABLE `app_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `app_module`
--
ALTER TABLE `app_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dta_post`
--
ALTER TABLE `dta_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dta_post_comment`
--
ALTER TABLE `dta_post_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dta_post_like`
--
ALTER TABLE `dta_post_like`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `dta_user`
--
ALTER TABLE `dta_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dta_post`
--
ALTER TABLE `dta_post`
ADD CONSTRAINT `dta_post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `dta_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dta_post_comment`
--
ALTER TABLE `dta_post_comment`
ADD CONSTRAINT `dta_post_comment_ibfk_1` FOREIGN KEY (`id_post`) REFERENCES `dta_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `dta_post_comment_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `dta_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dta_post_like`
--
ALTER TABLE `dta_post_like`
ADD CONSTRAINT `dta_post_like_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `dta_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `dta_post_like_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `dta_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
