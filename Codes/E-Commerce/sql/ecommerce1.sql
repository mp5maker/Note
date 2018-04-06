-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 12:40 PM
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
-- Database: `ecommerce1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` smallint(6) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(3, 'Common Attacks'),
(5, 'Database Security'),
(1, 'General Web Security'),
(4, 'JavaScript Security'),
(2, 'PHP Security');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(30) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `payment_amont` decimal(6,0) UNSIGNED NOT NULL,
  `payment_data_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `category_id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `content` longtext NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `category_id`, `title`, `description`, `content`, `date_created`) VALUES
(1, 2, 'PHP: Types of Vulnerability', 'Types of Vulnerability', '<h4>Website Security</h4>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">It refers to the security of the elements of a website through which an attacker can interface with our application. These vulnerable points of entry include forms and URLs, which are the most likely and easiest candidates for a potential attack.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\nSpoofed Forms\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">A common method used by attackers is a sppofed form submission. There are various waysto spoof forms, the easiest of which is to simple copy a target form and execute it from a different location.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">maxlength</span><span style=\"font-family: \'Times New Roman\',serif;\"> attribute restricts the length of content entered into the fields.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\nCross-Site Scripting\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">It is one of the most common and best-known kinds of attacks. The simplicity of this attack and the number of vulnerable application since existence make it very attractive to malicious users. An XSS attack exploits the user&rsquo;s trust in the application and is usually an effort to steal user information, such as cookies and other personally identifiable data. All applications that display input are at risk.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\nCross-Site Request Forgeries\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">A cross-site request forgery(CSRF) is an attack that attempts to cause a victim to unknowingly send arbitrary HTTP requests, usually to URLs requiring privileged access and using the existing session of the victim to determine access.</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\nDatabase Security\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">Tricking MySQL with comments. A double hyphen (--) is used in SQL to comment out the remainder of a line of SQL code. To make it work, it is double hyphen with a space (-- ), everything after it is ignored.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 9.0pt; mso-bidi-font-size: 11.0pt; font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">INSERT INTO inventory VALUES(0, NOW(), &lsquo;Hacker&rsquo;, &lsquo;10000000&rsquo;, &lsquo;hacker.png&rsquo;, 1) &ndash; hacker.png</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">1 is used to approve and everything after &ndash; is commented.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">Form fields are security weak point for web applications because they allow users to enter data.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">Dangerous characters are any characters that could possibly change the nature of any SQL-query, such as commas, quotes or &ndash; comment characters. Even the spaces at the end of a piece of data can prove harmful. SQL injections can be prevented by properly processing form data.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">trim()</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">Eliminates Leading or trailing spaces</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 10.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">Ex: </span><span style=\"font-size: 10.0pt; mso-bidi-font-size: 11.0pt; font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">$name = trim($_POST[&lsquo;name&rsquo;])</span><span style=\"font-size: 10.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 10.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-size: 10.0pt; mso-bidi-font-size: 11.0pt; font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">mysqli_real_escape_string($connection, trim($_POST[&lsquo;name]));</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">It converts dangerous characters into an escaped format that won&rsquo;t adversely affect SQL queries.</span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\nSession Security\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">Two popular forms of session attacks are session fixation and session hijacking. The simple attack is called session fixation because the attacker fixes the session. This is most commonly achieved by creating a link to your application and appending the session identifier that the attacker wishes to give any user clicking the link. While the user accesses your site through this session, they may provide sensitive information or even login credentials. If theuser logs in while using the provided access to the user&rsquo;s account. This is why session fixaton is sometimes referred to as &ldquo;session riding.&rdquo;</span></p>\r\n<p class=\"MsoNormal\">&nbsp;</p>\r\nFile System Security\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">PHP has the ability to directly access the filesystem and even execute shell commands. Remode Code Injection occurs when an attacker is able to cause our application to execute PHP code of their choosing (</span><strong><span style=\"font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">include and require</span></strong><span style=\"font-family: \'Times New Roman\',serif;\">) </span></p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">&nbsp;</span></p>\r\nCommand Injection\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\"><span style=\"font-family: \'Times New Roman\',serif;\">PHP provides great power with </span><strong><span style=\"font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">exec(), system(), passthr(), </span></strong><span style=\"font-family: \'Times New Roman\',serif;\">as well as the &nbsp;</span><span style=\"font-size: 12.0pt; mso-bidi-font-size: 11.0pt; font-family: \'Times New Roman\',serif;\">`</span> <span style=\"font-family: \'Times New Roman\',serif;\">backtick operator, It is important to take great care to ensure that attackers cannot inject and execute arbitrary system commands. PHP provides </span><strong><span style=\"font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">escapeshellcmd() </span></strong><span style=\"font-family: \'Times New Roman\',serif;\">and </span><strong><span style=\"font-family: Consolas; mso-bidi-font-family: \'Times New Roman\';\">escapeshellarg() </span></strong><span style=\"font-family: \'Times New Roman\',serif;\">means to escape shell output</span></p>\r\n<p>&nbsp;</p>', '2018-04-06 00:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `pdfs`
--

CREATE TABLE `pdfs` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `tmp_name` char(40) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` tinytext NOT NULL,
  `file_name` varchar(40) NOT NULL,
  `size` mediumint(8) UNSIGNED NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdfs`
--

INSERT INTO `pdfs` (`id`, `tmp_name`, `title`, `description`, `file_name`, `size`, `date_created`) VALUES
(3, '990c6ec80432b3af9effb3945bf66abd6b21fb20', 'JavaScript CheetSheet', 'Good for practice!', 'JSCheatSheet.pdf', 656, '2018-04-06 07:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('member','admin') NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(80) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `date_expires` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `email`, `pass`, `first_name`, `last_name`, `date_expires`, `date_created`, `date_modified`) VALUES
(4, 'member', 'jason.mandela', 'jason.mandela@gmail.com', '$2y$10$pzW16CXWqh9IwdbDBOFgfu8C28I2pq6cc4Z.r.FUUA3P71T8YEDO.', 'Jason', 'Mandela', '2018-05-04', '2018-04-04 04:01:47', '0000-00-00 00:00:00'),
(5, 'member', 'rob.marley', 'rob.marley@gmail.com', '$2y$10$vXJF8LxpM0ddiT3udCPRue9.Y/dZVZrpXajZiBkzfidR5n03PnqOe', 'Rob', 'Marley', '2018-05-05', '2018-04-04 21:27:15', '0000-00-00 00:00:00'),
(6, 'member', 'mary.lee', 'mary.lee@gmail.com', '$2y$10$IASl5hOaNTTGyqfH8j0fkuth/OcEm9g/0t3uyxEGVZGgVCVwolWIe', 'Mary', 'Lee', '2018-05-05', '2018-04-05 00:00:15', '0000-00-00 00:00:00'),
(7, 'member', 'raikun.har', 'raikun.har@gmail.com', '$2y$10$fE6RXIeCnKa7.r9SlB0vP.Z.Gsp7pLLDRFTGqbu9vvXa7668Rayre', 'Raikun', 'Har', '2018-05-05', '2018-04-05 07:04:26', '0000-00-00 00:00:00'),
(8, 'admin', 'khan.photon', 'khan.photon@gmail.com', '$2y$10$B.K3HwXjPR7L8j.SQyF6C.m5Z2xyq5CptpdvDKzyq6VFgbwKCedFa', 'Photon', 'Khan', '2018-05-05', '2018-04-05 07:22:04', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `creation_date` (`date_created`);

--
-- Indexes for table `pdfs`
--
ALTER TABLE `pdfs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tmp_name` (`tmp_name`),
  ADD KEY `dat_created` (`date_created`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pdfs`
--
ALTER TABLE `pdfs`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
