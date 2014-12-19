-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--

-- Generation Time: Dec 19, 2014 at 10:38 AM

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tantalkz_webmasters`
--

-- --------------------------------------------------------

--
-- Table structure for table `avatars`
--

CREATE TABLE IF NOT EXISTS `avatars` (
`id` int(11) NOT NULL,
  `name_original` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `name_file` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `avatars`
--

INSERT INTO `avatars` (`id`, `name_original`, `path`, `name_file`) VALUES
(1, 'Lighthouse.jpg', 'uploads/4f6a306c94af679657ced7273b5ad4ea.jpg', '4f6a306c94af679657ced7273b5ad4ea.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `login` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `datebirth` date NOT NULL,
  `place` varchar(200) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `education` varchar(200) NOT NULL,
  `work` varchar(200) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `addinfo` varchar(200) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `login`, `pass`, `datebirth`, `place`, `marital_status`, `education`, `work`, `phone`, `email`, `addinfo`, `color`) VALUES
(1, 'John', 'john', '202cb962ac59075b964b07152d234b70', '2014-12-03', 'nyc', 'married', 'high', '5 years', '123', 's@d', 'asd', '#000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avatars`
--
ALTER TABLE `avatars`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avatars`
--
ALTER TABLE `avatars`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
