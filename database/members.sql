-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 May 2023, 02:25:23
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `members`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `address_info`
--

CREATE TABLE `address_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `address_info`
--

INSERT INTO `address_info` (`id`, `user_id`, `address`, `city`, `country`) VALUES
(1, 1, 'karabağlar cadddesi taşlı sokak', 'istanbul', 'Türkiye');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `contact_info`
--

INSERT INTO `contact_info` (`id`, `user_id`, `email`, `phone`) VALUES
(1, 1, 'eneskaraca@hotmail.com', '02124454545'),
(2, 2, 'huseyin@hotmail.com', '021244547'),
(11, 11, 'haydar@hotmail.com', '021315645'),
(12, 12, 'asli@hotmail.com', '02124454545');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_details`
--

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `birthdate` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `bio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `personal_details`
--

INSERT INTO `personal_details` (`id`, `user_id`, `birthdate`, `gender`, `bio`) VALUES
(1, 1, '14.08.2000', 'Erkek', 'test'),
(2, 2, '1996-05-10', 'Erkek', 'Eklencek'),
(9, 11, '2002-05-22', 'Erkek', 'sonra eklenecek'),
(10, 12, '2010-06-14', 'Kadın', 'test');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `surname`, `status`, `role_id`) VALUES
(1, 'karacaenes', '123', 'enes', 'karaca', 'aktif', 1),
(2, 'teknik55', '132456', 'hüseyin', 'kırım', 'aktif', 2),
(12, 'pokemon59', '123', 'aslı', 'evre', 'aktif', 2),
(13, 'emrebaba', '202cb962ac59075b964b07152d234b70', 'emre', 'karanfil', 'aktif', 2),
(14, 'emrebaba2', '81dc9bdb52d04dc20036dbd8313ed055', 'emre', 'karanfil', 'aktif', 2),
(15, 'emrebaba3', '81dc9bdb52d04dc20036dbd8313ed055', 'emre', 'karanfil', 'aktif', 2),
(16, 'emrebaba4', '81dc9bdb52d04dc20036dbd8313ed055', 'emre', 'karanfil', 'aktif', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `address_info`
--
ALTER TABLE `address_info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `address_info`
--
ALTER TABLE `address_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
