-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Sep 09, 2021 at 02:40 PM
-- Server version: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `default`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` longtext NOT NULL,
  `Imageurl` text DEFAULT NULL,
  `Time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`Id`, `Title`, `Content`, `Imageurl`, `Time`) VALUES
(1, 'Yusuf USTA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vitae molestie purus. Quisque a gravida turpis. Praesent at dictum enim, eu', ./images/84d36e6e-ad91-402d-bfeb-12317ae4d1e6.jpg, '0000-00-00 00:00:00'),
(2, 'Efe BUYUK', 'Curabitur auctor velit metus, non luctus neque tincidunt vel. Nullam at eros nec nunc consequat accumsan a sed nunc. Proin nulla elit, ornare porta', './images/efe-buyuk.jpg', '0000-00-00 00:00:00'),
(3, 'Samet Utku OLGUN', 'Diam ut, ornare scelerisque neque. Fusce cursus mollis justo at maximus. Aliquam pellentesque quam sed urna accumsan pulvinar. Proin ultricies', './images/samet-utku-olgun.jpg', '0000-00-00 00:00:00'),
(4, 'Cihad ALKIS', 'Ut ornare. Suspendisse malesuada mauris risus, id eleifend erat finibus non. Maecenas et imperdiet libero. Curabitur pretium cursus consequat.', './images/cihat-alkis.jpg', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
