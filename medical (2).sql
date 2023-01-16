-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2023, 21:41:00
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `medical`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ads`
--

CREATE TABLE `ads` (
  `advert_id` int(11) NOT NULL,
  `advert_name` varchar(255) NOT NULL,
  `advert_address` varchar(255) NOT NULL,
  `advert_description` varchar(255) NOT NULL,
  `advert_image` varchar(255) NOT NULL,
  `advert_image1` varchar(255) DEFAULT NULL,
  `advert_image2` varchar(255) DEFAULT NULL,
  `advert_image3` varchar(255) DEFAULT NULL,
  `advert_image4` varchar(255) DEFAULT NULL,
  `advert_school_id` int(11) NOT NULL,
  `advert_user_id` int(11) NOT NULL,
  `advert_isdelete` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ads`
--

INSERT INTO `ads` (`advert_id`, `advert_name`, `advert_address`, `advert_description`, `advert_image`, `advert_image1`, `advert_image2`, `advert_image3`, `advert_image4`, `advert_school_id`, `advert_user_id`, `advert_isdelete`) VALUES
(1, 'şafak hastanesi', 'dasdasda', 'fadasdas', '63ac6cb79f70e.png', NULL, NULL, NULL, NULL, 1, 8, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `advert_id` int(11) NOT NULL,
  `application_cv` varchar(255) NOT NULL,
  `application_status` tinyint(1) NOT NULL,
  `application_isdelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(2000) NOT NULL,
  `product_user_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image1` varchar(255) DEFAULT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `product_isdelete` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_user_id`, `product_image`, `product_image1`, `product_image2`, `product_image3`, `product_image4`, `product_video`, `product_isdelete`) VALUES
(1, 'dasd', 'dsada', 2, '6398a05bbc40f.png', NULL, NULL, NULL, NULL, NULL, 0),
(2, 'ahmet', 'dasd', 2, '639a3895f1ee3.png', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Onaylı'),
(3, 'Onaysız'),
(5, 'Şirket');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `school`
--

INSERT INTO `school` (`school_id`, `school_name`) VALUES
(1, 'Lise'),
(2, 'Üniversite');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_sure_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_url` varchar(255) NOT NULL,
  `user_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_role_id` int(11) NOT NULL,
  `user_isdelete` tinyint(1) NOT NULL,
  `user_code` varchar(255) NOT NULL,
  `user_aktivasyon` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_sure_name`, `user_email`, `user_password`, `user_url`, `user_date`, `user_role_id`, `user_isdelete`, `user_code`, `user_aktivasyon`) VALUES
(8, 'Ahmet', 'Toklucu', 'admin@gmail.com', '$2y$10$p9f31PbexlwlQ0IayyelxuZ0xkguGx19Gupx//azK0qdb1QGEHTfi', 'ahmet-toklucu', '2022-12-27 22:52:53', 1, 0, 'da4fb5c6e93e74d3df8527599fa62642', 0),
(9, 'Mahmut', 'Demir', 'onaysiz@gmail.com', '$2y$10$486SxUt20bddRGi/Tey/juIymy4ajZVhwrwIflUBs0sON7FTsoBna', 'mahmut-demir', '2022-12-29 07:22:39', 3, 0, 'f79921bbae40a577928b76d2fc3edc2a', 0),
(10, 'Kerem', 'Asli', 'onayli@gmail.com', '$2y$10$CTPFHeXyYjJw5iR.maeQfOw5S3lhvhGDfNqEe0TONoXxpZ1uSp8VC', 'kerem-asli', '2022-12-29 07:29:41', 2, 0, 'c410003ef13d451727aeff9082c29a5c', 0),
(11, 'ali', 'mutlu', 'sirket@gmail.com', '$2y$10$ORPcXj9UVVT/i0TOYz0Cu.PTs7X9iivF4UabUG7m0.zGflqen8k9q', 'ali-mutlu', '2022-12-29 07:34:46', 5, 0, '98dce83da57b0395e163467c9dae521b', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`advert_id`);

--
-- Tablo için indeksler `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Tablo için indeksler `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ads`
--
ALTER TABLE `ads`
  MODIFY `advert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
