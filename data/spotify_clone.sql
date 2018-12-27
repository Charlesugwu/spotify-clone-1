-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2018 at 04:03 AM
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
-- Database: `spotify_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `title`, `artist`, `genre`, `artworkPath`) VALUES
(1, 'Watcher', 1, 1, 'assets/images/album-cover/watcher.png'),
(2, 'Idol', 2, 2, 'assets/images/album-cover/idol.png'),
(3, 'Queen Me', 3, 3, 'assets/images/album-cover/queen-me.png'),
(4, 'Juliette', 4, 4, 'assets/images/album-cover/juliette.png'),
(5, 'Stoned', 5, 5, 'assets/images/album-cover/stoned.png');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`id`, `name`) VALUES
(1, 'The Fringe'),
(2, 'The Lychees'),
(3, 'Layla Queen'),
(4, 'Uncle Crow'),
(5, 'Disco Boy');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Alternative'),
(2, 'Techno'),
(3, 'Soul'),
(4, 'Folk'),
(5, 'EMD');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`) VALUES
(1, 'Cheat Codes', 1, 1, 1, '3:37', 'assets/music/bensound-creepy.mp3', 1, 6),
(2, 'Singe', 1, 1, 1, '1:49', 'assets/music/bensound-badass.mp3', 2, 10),
(3, 'Sick Boy', 1, 1, 1, '3:24', 'assets/music/bensound-instinct.mp3', 3, 5),
(4, 'Finest Hour', 1, 1, 1, '2:57', 'assets/music/bensound-psychedelic.mp3', 4, 7),
(5, 'Come Back', 1, 1, 1, '4:59', 'assets/music/bensound-ofeliasdream.mp3', 5, 4),
(6, 'My Blood', 2, 2, 2, '2:34', 'assets/music/bensound-betterdays.mp3', 1, 12),
(7, 'Sunday Lover', 2, 2, 2, '3:02', 'assets/music/bensound-downtown.mp3', 2, 16),
(8, 'Sacrifice', 2, 2, 2, '4:48', 'assets/music/bensound-deepblue.mp3', 3, 12),
(9, 'Believe', 2, 2, 2, '2:57', 'assets/music/bensound-dance.mp3', 4, 11),
(10, 'Gold Maddona', 2, 2, 2, '5:13', 'assets/music/bensound-newdawn.mp3', 5, 11),
(11, 'Dreamer', 3, 3, 3, '5:08', 'assets/music/bensound-sweet.mp3', 1, 13),
(12, 'Hate To Go', 3, 3, 3, '2:04', 'assets/music/bensound-tenderness.mp3', 2, 7),
(13, 'High On You', 3, 3, 3, '3:27', 'assets/music/bensound-slowmotion.mp3', 3, 5),
(14, 'Woest Me', 3, 3, 3, '3:37', 'assets/music/bensound-retrosoul.mp3', 4, 9),
(15, 'Dawnbreaker', 3, 3, 3, '2:20', 'assets/music/bensound-sunny.mp3', 5, 5),
(16, 'Cigarettes After Sex', 4, 4, 4, '4:27', 'assets/music/bensound-funkysuspense.mp3', 1, 6),
(17, 'Juliette', 4, 4, 4, '3:27', 'assets/music/bensound-countryboy.mp3', 2, 8),
(18, 'Six Feet Under', 4, 4, 4, '2:41', 'assets/music/bensound-moose.mp3', 3, 13),
(19, 'Pretty Little Thing', 4, 4, 4, '4:14', 'assets/music/bensound-india.mp3', 4, 15),
(20, 'Without Me', 4, 4, 4, '3:30', 'assets/music/bensound-dreams.mp3', 5, 2),
(21, 'When The Party Is Over', 5, 5, 5, '3:04', 'assets/music/bensound-smile.mp3', 1, 15),
(22, 'Somebody Stop Me', 5, 5, 5, '3:01', 'assets/music/bensound-endlessmotion.mp3', 2, 8),
(23, 'Cash Me Out', 5, 5, 5, '2:54', 'assets/music/bensound-sexy.mp3', 3, 11),
(24, 'Flux', 5, 5, 5, '2:37', 'assets/music/bensound-acousticbreeze.mp3', 4, 8),
(25, 'Fake Gold', 5, 5, 5, '3:37', 'assets/music/bensound-summer.mp3', 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'humpty_dumpty', 'Humpty', 'Dumpty', 'Humptyd@gmail.com', '0f8b6bdcc9eb5dae95865c0a7ad95c86', '2018-12-24 00:00:00', '/assets/images/profile-pics/secondliferedhead.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table album
--

--
-- Metadata for table artist
--

--
-- Metadata for table genre
--

--
-- Metadata for table song
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'spotify_clone', 'song', '{\"CREATE_TIME\":\"2018-12-24 05:11:55\",\"col_visib\":[1,1,1,1,1,1,1,1,1]}', '2018-12-26 21:26:30');

--
-- Metadata for table users
--

--
-- Metadata for database spotify_clone
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
