-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 01:58 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mismatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_response`
--

CREATE TABLE `mismatch_response` (
  `response_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `response` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_response`
--

INSERT INTO `mismatch_response` (`response_id`, `user_id`, `topic_id`, `response`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 2),
(3, 2, 3, 2),
(4, 2, 4, 2),
(5, 2, 5, 2),
(6, 2, 6, 2),
(7, 2, 7, 2),
(8, 2, 8, 1),
(9, 2, 9, 1),
(10, 2, 10, 2),
(11, 2, 11, 2),
(12, 2, 12, 2),
(13, 2, 13, 2),
(14, 2, 14, 2),
(15, 2, 15, 2),
(16, 2, 16, 2),
(17, 2, 17, 2),
(18, 2, 18, 2),
(19, 2, 19, 2),
(20, 2, 20, 2),
(21, 2, 21, 2),
(22, 2, 22, 2),
(23, 2, 23, 2),
(24, 2, 24, 2),
(25, 2, 25, 1),
(26, 0, 1, NULL),
(27, 0, 2, NULL),
(28, 0, 3, NULL),
(29, 0, 4, NULL),
(30, 0, 5, NULL),
(31, 0, 6, NULL),
(32, 0, 7, NULL),
(33, 0, 8, NULL),
(34, 0, 9, NULL),
(35, 0, 10, NULL),
(36, 0, 11, NULL),
(37, 0, 12, NULL),
(38, 0, 13, NULL),
(39, 0, 14, NULL),
(40, 0, 15, NULL),
(41, 0, 16, NULL),
(42, 0, 17, NULL),
(43, 0, 18, NULL),
(44, 0, 19, NULL),
(45, 0, 20, NULL),
(46, 0, 21, NULL),
(47, 0, 22, NULL),
(48, 0, 23, NULL),
(49, 0, 24, NULL),
(50, 0, 25, NULL),
(51, 6, 1, NULL),
(52, 6, 2, NULL),
(53, 6, 3, NULL),
(54, 6, 4, NULL),
(55, 6, 5, NULL),
(56, 6, 6, NULL),
(57, 6, 7, NULL),
(58, 6, 8, NULL),
(59, 6, 9, NULL),
(60, 6, 10, NULL),
(61, 6, 11, NULL),
(62, 6, 12, NULL),
(63, 6, 13, NULL),
(64, 6, 14, NULL),
(65, 6, 15, NULL),
(66, 6, 16, NULL),
(67, 6, 17, NULL),
(68, 6, 18, NULL),
(69, 6, 19, NULL),
(70, 6, 20, NULL),
(71, 6, 21, NULL),
(72, 6, 22, NULL),
(73, 6, 23, NULL),
(74, 6, 24, NULL),
(75, 6, 25, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_topic`
--

CREATE TABLE `mismatch_topic` (
  `topic_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_topic`
--

INSERT INTO `mismatch_topic` (`topic_id`, `name`, `category`) VALUES
(1, 'Tattoos', 'Appearance'),
(2, 'Gold Chains', 'Appearance'),
(3, 'Body Piercings', 'Appearance'),
(4, 'Cowboy Boots', 'Appearance'),
(5, 'Long Hair', 'Appearance'),
(6, 'Reality TV', 'Entertainment'),
(7, 'Professional Wrestling', 'Entertainment'),
(8, 'Horror Movies', 'Entertainment'),
(9, 'Easy Listening Music', 'Entertainment'),
(10, 'The Opera', 'Entertainment'),
(11, 'Sushi', 'Food'),
(12, 'Spam', 'Food'),
(13, 'Spicy Food', 'Food'),
(14, 'Peanut Butter & Banana Sandwiches', 'Food'),
(15, 'Martinis', 'Food'),
(16, 'Howard Stern', 'People'),
(17, 'Bill Gates', 'People'),
(18, 'Barbara Streisand', 'People'),
(19, 'Hugh Hefner', 'People'),
(20, 'Martha Stewart', 'People'),
(21, 'Yoga', 'Activities'),
(22, 'Weightlifting', 'Activities'),
(23, 'Cube Puzzles', 'Activities'),
(24, 'Karaoke', 'Activities'),
(25, 'Hiking', 'Activities');

-- --------------------------------------------------------

--
-- Table structure for table `mismatch_user`
--

CREATE TABLE `mismatch_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `birth_date` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mismatch_user`
--

INSERT INTO `mismatch_user` (`user_id`, `username`, `password`, `join_date`, `first_name`, `last_name`, `gender`, `birth_date`, `city`, `state`, `picture`) VALUES
(2, 'marylee', '1c24578ca947f858d5735526cb7fd1e54dcb84e0', '2018-03-06 23:36:46', 'Mary', 'Lee', 'female', '1997-07-15', 'Denton', 'Texas', 'mary.jpg'),
(3, 'mattjohnson', 'df42bb345707f77899641cf5ae8ebbc4c6aa8431', '2018-03-06 23:39:33', 'Matt', 'Johnson', 'male', '1992-05-12', 'Buffalo', 'New York', 'matt.jpg'),
(4, 'jenniferaniston', '9a1b6ab4cc30b7a4c438e143bf595132384108c1', '2018-03-08 03:34:37', 'Jennifer', 'Aniston', 'female', '2002-06-11', 'Georgia', 'Atlanta', 'jennifer.jpg'),
(5, 'josephdon', 'a69a4bdf71534b27b71bcc0d47f4d5c01c1c6bc3', '2018-03-08 03:35:55', 'Joseph', 'Don', 'male', '1987-04-14', 'Dallas', 'Texas', 'joseph.jpg'),
(6, 'abusayed', 'b74649e477de3065ce9a7e8651006643856817ca', '2018-03-08 03:37:25', 'Abu', 'Sayed', 'male', '1989-12-19', 'Richardson', 'Texas', 'abu.jpg'),
(7, 'marialopez', 'f9dbbec59738a05389359450a6459c579c814379', '2018-03-08 03:39:22', 'Maria', 'Lopez', 'female', '2003-10-03', 'San Antonio', 'Texas', 'maria.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  ADD PRIMARY KEY (`response_id`);

--
-- Indexes for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `mismatch_user`
--
ALTER TABLE `mismatch_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mismatch_response`
--
ALTER TABLE `mismatch_response`
  MODIFY `response_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `mismatch_topic`
--
ALTER TABLE `mismatch_topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `mismatch_user`
--
ALTER TABLE `mismatch_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
