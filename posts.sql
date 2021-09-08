-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: mariadb
-- Üretim Zamanı: 08 Eyl 2021, 16:18:28
-- Sunucu sürümü: 10.6.4-MariaDB-1:10.6.4+maria~focal
-- PHP Sürümü: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `default`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `Id` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Content` longtext NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`Id`, `Title`, `Content`, `Time`) VALUES
(1, 'Test Başlık 1', 'Test Başlık 2', '0000-00-00 00:00:00'),
(2, 'Başlık 2', 'İçerik 2', '2021-09-08 15:01:24');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
