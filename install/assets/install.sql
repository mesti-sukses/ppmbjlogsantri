-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 04, 2018 at 10:52 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `try`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `categories` int(11) NOT NULL,
  `sticky` tinyint(4) NOT NULL,
  `image` varchar(256) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hadist`
--

CREATE TABLE `hadist` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `offset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi_hadist`
--

CREATE TABLE `materi_hadist` (
  `id_materi` int(11) NOT NULL,
  `santri_id` int(11) NOT NULL,
  `hadist_id` int(11) NOT NULL,
  `ketercapaian` text NOT NULL,
  `kosong` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `materi_quran`
--

CREATE TABLE `materi_quran` (
  `santri_id` int(11) NOT NULL,
  `ketercapaian` text NOT NULL,
  `kosong` int(11) NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `location` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `type`, `location`, `icon`, `text`, `link`) VALUES
(4, 'internal', 'main', 'file', 'Blog', 'blog'),
(5, 'external', 'social', 'facebook', 'Facebook', 'http://www.facebook.com'),
(6, 'external', 'social', 'youtube', 'Youtube', 'http://youtube.com'),
(7, 'internal', 'main', 'info-circle', 'About Us', 'page/about'),
(8, 'internal', 'main', 'address-book', 'Contact Us', 'page/contact'),
(9, 'internal', 'main', 'photo', 'Gallery', 'page/gallery');

-- --------------------------------------------------------

--
-- Table structure for table `musyawarah_fp`
--

CREATE TABLE `musyawarah_fp` (
  `usulan_id` int(11) NOT NULL,
  `pengusul` int(11) NOT NULL,
  `usulan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `terlaksana` int(11) NOT NULL,
  `pembahasan` text COLLATE utf8mb4_unicode_ci,
  `created` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pasus_data`
--

CREATE TABLE `pasus_data` (
  `id` int(11) NOT NULL,
  `santri_id` int(11) NOT NULL,
  `detail` text COLLATE utf8_unicode_ci NOT NULL,
  `ket` text COLLATE utf8_unicode_ci NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `target_quran`
--

CREATE TABLE `target_quran` (
  `id` int(11) NOT NULL,
  `angkatan` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `target_detail` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nis` varchar(8) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `pasus` int(11) DEFAULT NULL,
  `wali` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `pass` varchar(128) NOT NULL,
  `kelas` varchar(20) DEFAULT NULL,
  `angkatan` int(11) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_component`
--

CREATE TABLE `web_component` (
  `id` int(11) NOT NULL,
  `location` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `extra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `web_config`
--

CREATE TABLE `web_config` (
  `id` int(11) NOT NULL,
  `key_config` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `hadist`
--
ALTER TABLE `hadist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi_hadist`
--
ALTER TABLE `materi_hadist`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `materi_quran`
--
ALTER TABLE `materi_quran`
  ADD PRIMARY KEY (`santri_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `musyawarah_fp`
--
ALTER TABLE `musyawarah_fp`
  ADD PRIMARY KEY (`usulan_id`);

--
-- Indexes for table `pasus_data`
--
ALTER TABLE `pasus_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_quran`
--
ALTER TABLE `target_quran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_component`
--
ALTER TABLE `web_component`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_config`
--
ALTER TABLE `web_config`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hadist`
--
ALTER TABLE `hadist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi_hadist`
--
ALTER TABLE `materi_hadist`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `musyawarah_fp`
--
ALTER TABLE `musyawarah_fp`
  MODIFY `usulan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasus_data`
--
ALTER TABLE `pasus_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `target_quran`
--
ALTER TABLE `target_quran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `web_component`
--
ALTER TABLE `web_component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `web_config`
--
ALTER TABLE `web_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
