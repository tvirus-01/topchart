-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2018 at 04:46 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_topchart_album`
--

CREATE TABLE `wp_topchart_album` (
  `id` int(50) UNSIGNED NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `artist_website` varchar(100) NOT NULL,
  `album_name` varchar(100) NOT NULL,
  `album_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_topchart_album`
--

INSERT INTO `wp_topchart_album` (`id`, `artist_name`, `artist_website`, `album_name`, `album_image`) VALUES
(2, 'Cardi b', 'long.net', 'Invasion of Privacy', 'Invasion of Privacy-Cardi b.png'),
(3, 'Janelle Monáe', 'JanelleMonáe.net', 'Dirty Computer', 'Dirty Computer-Janelle Monáe.png'),
(4, 'Kacey Musgraves', 'Kace.com', 'Golden Hour', 'Golden Hour-Kacey Musgraves.jpeg'),
(5, 'Mitski', 'Mitski.io', 'Be the Cowboy', 'Be the Cowboy-Mitski.jpg'),
(6, 'J. Tillman', 'till.neet', 'God\\\'s Favorite Customer', 'God\'s Favorite Customer-J. Tillman.jpg'),
(7, 'Maroon 5', 'maroon5.com', ' Red Pill Blues ', 'Red Pill Blues -Maroon 5.png'),
(8, 'Bruno Mars', 'buno.net', 'Unorthodox Jukebox', 'Unorthodox Jukebox-3s6i23a1ad6hg2h.png');

-- --------------------------------------------------------

--
-- Table structure for table `wp_topchart_chart`
--

CREATE TABLE `wp_topchart_chart` (
  `id` int(50) UNSIGNED NOT NULL,
  `chart_name` varchar(100) NOT NULL,
  `chart_code` varchar(100) NOT NULL,
  `chart_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_topchart_chart`
--

INSERT INTO `wp_topchart_chart` (`id`, `chart_name`, `chart_code`, `chart_type`) VALUES
(1, 'top 2018', 'topchart chart_name=\'top 2018\'', ''),
(2, 'top 2019', 'topchart chart_name=\'top 2019\'', ''),
(3, 'top 2020', 'topchart chart_name=\'top 2020\'', '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_topchart_genre`
--

CREATE TABLE `wp_topchart_genre` (
  `id` int(50) UNSIGNED NOT NULL,
  `gener_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_topchart_genre`
--

INSERT INTO `wp_topchart_genre` (`id`, `gener_name`) VALUES
(1, 'pop'),
(2, '');

-- --------------------------------------------------------

--
-- Table structure for table `wp_topchart_song`
--

CREATE TABLE `wp_topchart_song` (
  `id` int(50) UNSIGNED NOT NULL,
  `song_name` varchar(100) NOT NULL,
  `video_source` varchar(100) NOT NULL,
  `video_url` varchar(100) NOT NULL,
  `gener_name` varchar(100) NOT NULL,
  `album_id` int(50) NOT NULL,
  `chart_id` int(50) NOT NULL,
  `status` int(1) NOT NULL,
  `position_1` int(50) NOT NULL,
  `position_2` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wp_topchart_song`
--

INSERT INTO `wp_topchart_song` (`id`, `song_name`, `video_source`, `video_url`, `gener_name`, `album_id`, `chart_id`, `status`, `position_1`, `position_2`) VALUES
(2, 'I Like It', 'youtube', 'https://www.youtube.com/watch?v=xTlNMmZKwpA', 'pop', 2, 1, 0, 4, 3),
(3, 'Dirty Computer', 'vimeo', 'https://vimeo.com/268498567', 'pop', 3, 1, 1, 5, 4),
(4, 'Golden Hour', 'youtube', 'https://www.youtube.com/watch?v=maONL_HfI20', 'pop', 4, 1, 1, 2, 3),
(5, 'Nobody', 'youtube', 'https://www.youtube.com/watch?v=qooWnw5rEcI', 'pop', 5, 1, 1, 1, 3),
(6, 'God\\\'s Favorite Customer', 'youtube', 'https://www.youtube.com/watch?v=sNG4g354P3w', 'pop', 6, 1, 1, 6, 5),
(7, 'Girls Like You', 'facebook', 'https://www.facebook.com/frankfslove/videos/150411422554815/', 'pop', 7, 1, 1, 3, 1),
(9, '24K Magic', 'youtube', 'https://www.youtube.com/watch?v=UqyT8IEBkvY', 'pop', 8, 1, 1, 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_topchart_album`
--
ALTER TABLE `wp_topchart_album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_topchart_chart`
--
ALTER TABLE `wp_topchart_chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_topchart_genre`
--
ALTER TABLE `wp_topchart_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wp_topchart_song`
--
ALTER TABLE `wp_topchart_song`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_topchart_album`
--
ALTER TABLE `wp_topchart_album`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `wp_topchart_chart`
--
ALTER TABLE `wp_topchart_chart`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wp_topchart_genre`
--
ALTER TABLE `wp_topchart_genre`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wp_topchart_song`
--
ALTER TABLE `wp_topchart_song`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
