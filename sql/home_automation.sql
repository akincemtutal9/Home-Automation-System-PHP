-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 May 2023, 12:23:00
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `home_automation`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `air_conditioner`
--

CREATE TABLE `air_conditioner` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `acID` int(10) UNSIGNED NOT NULL,
  `mode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `temperature` int(11) NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `device`
--

CREATE TABLE `device` (
  `roomID` int(10) UNSIGNED NOT NULL,
  `deviceID` int(10) UNSIGNED NOT NULL,
  `device_name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `device_type` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `device`
--

INSERT INTO `device` (`roomID`, `deviceID`, `device_name`, `device_type`) VALUES
(1, 1, 'Işık 1', 'light'),
(1, 2, 'ışık 2', 'light');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `dishwasher`
--

CREATE TABLE `dishwasher` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `dishwasherID` int(10) UNSIGNED NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `electric_blanket`
--

CREATE TABLE `electric_blanket` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `ebID` int(10) UNSIGNED NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `fan`
--

CREATE TABLE `fan` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `fanID` int(10) UNSIGNED NOT NULL,
  `speed` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `light`
--

CREATE TABLE `light` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `lightID` int(10) UNSIGNED NOT NULL,
  `color` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `light`
--

INSERT INTO `light` (`deviceID`, `lightID`, `color`, `isOpen`) VALUES
(1, 1, '#F0F8FF', 0),
(2, 2, '#30A2FF', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `message`
--

CREATE TABLE `message` (
  `userID` int(10) UNSIGNED NOT NULL,
  `messageID` int(10) UNSIGNED NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 NOT NULL,
  `message` varchar(1000) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `robot_toy`
--

CREATE TABLE `robot_toy` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `rtID` int(10) UNSIGNED NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `robot_vacum_cleaner`
--

CREATE TABLE `robot_vacum_cleaner` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `rbvID` int(10) UNSIGNED NOT NULL,
  `mode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `room`
--

CREATE TABLE `room` (
  `userID` int(10) UNSIGNED NOT NULL,
  `roomID` int(10) UNSIGNED NOT NULL,
  `room_name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `temperature` int(11) NOT NULL,
  `humidity` int(11) NOT NULL,
  `icon` varchar(150) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `room`
--

INSERT INTO `room` (`userID`, `roomID`, `room_name`, `temperature`, `humidity`, `icon`) VALUES
(1, 1, 'asd', 12, 12, 'room'),
(1, 2, 'bcd', 23, 22, 'room');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `statistics`
--

CREATE TABLE `statistics` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `operationID` int(10) UNSIGNED NOT NULL,
  `operation` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `userID` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(5) CHARACTER SET utf8 NOT NULL,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(40) CHARACTER SET utf8 NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(120) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `age` int(3) UNSIGNED NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`userID`, `user_type`, `name`, `surname`, `phone_number`, `address`, `email`, `age`, `password`) VALUES
(1, 'user', 'Burak', 'Sazlı', '05512028390', 'Meydankavağı Mah. Şehitler Cad Şefika Hanım Apt. Kat:3 13/6', 'buraksazli0@gmail.com', 23, 'efece38af5bdb77c567900e5c86ca639'),
(2, 'user', 'Kerem', 'Yıldırım', '05512038390', 'Antalya Muratpaşa', 'keremyildirim@gmail.com', 6, '2620258096b25d75e2485fdab25074e7'),
(3, 'admin', 'Akın', 'Cem', '05512028490', 'Antalya Muratpaşa', 'akincem@gmail.com', 23, 'c865b1b5506d5c7830b56a029f59f32e');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `washing_machine`
--

CREATE TABLE `washing_machine` (
  `deviceID` int(10) UNSIGNED NOT NULL,
  `wmID` int(10) UNSIGNED NOT NULL,
  `mode` varchar(50) CHARACTER SET utf8 NOT NULL,
  `isOpen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `air_conditioner`
--
ALTER TABLE `air_conditioner`
  ADD PRIMARY KEY (`acID`),
  ADD KEY `ac_to_device` (`deviceID`);

--
-- Tablo için indeksler `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`deviceID`),
  ADD KEY `device_to_room` (`roomID`);

--
-- Tablo için indeksler `dishwasher`
--
ALTER TABLE `dishwasher`
  ADD PRIMARY KEY (`dishwasherID`),
  ADD KEY `dishwasher_to_device` (`deviceID`);

--
-- Tablo için indeksler `electric_blanket`
--
ALTER TABLE `electric_blanket`
  ADD PRIMARY KEY (`ebID`),
  ADD KEY `eb_to_device` (`deviceID`);

--
-- Tablo için indeksler `fan`
--
ALTER TABLE `fan`
  ADD PRIMARY KEY (`fanID`),
  ADD KEY `fan_to_device` (`deviceID`);

--
-- Tablo için indeksler `light`
--
ALTER TABLE `light`
  ADD PRIMARY KEY (`lightID`),
  ADD KEY `light_to_device` (`deviceID`);

--
-- Tablo için indeksler `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageID`),
  ADD KEY `message_to_user` (`userID`);

--
-- Tablo için indeksler `robot_toy`
--
ALTER TABLE `robot_toy`
  ADD PRIMARY KEY (`rtID`),
  ADD KEY `rt_to_device` (`deviceID`);

--
-- Tablo için indeksler `robot_vacum_cleaner`
--
ALTER TABLE `robot_vacum_cleaner`
  ADD PRIMARY KEY (`rbvID`),
  ADD KEY `rbv_to_device` (`deviceID`);

--
-- Tablo için indeksler `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomID`),
  ADD KEY `room_to_user` (`userID`);

--
-- Tablo için indeksler `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`operationID`),
  ADD KEY `statistics_to_device` (`deviceID`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Tablo için indeksler `washing_machine`
--
ALTER TABLE `washing_machine`
  ADD PRIMARY KEY (`wmID`),
  ADD KEY `wm_to_device` (`deviceID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `air_conditioner`
--
ALTER TABLE `air_conditioner`
  MODIFY `acID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `device`
--
ALTER TABLE `device`
  MODIFY `deviceID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `dishwasher`
--
ALTER TABLE `dishwasher`
  MODIFY `dishwasherID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `electric_blanket`
--
ALTER TABLE `electric_blanket`
  MODIFY `ebID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `fan`
--
ALTER TABLE `fan`
  MODIFY `fanID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `light`
--
ALTER TABLE `light`
  MODIFY `lightID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `message`
--
ALTER TABLE `message`
  MODIFY `messageID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `robot_toy`
--
ALTER TABLE `robot_toy`
  MODIFY `rtID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `robot_vacum_cleaner`
--
ALTER TABLE `robot_vacum_cleaner`
  MODIFY `rbvID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `room`
--
ALTER TABLE `room`
  MODIFY `roomID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `statistics`
--
ALTER TABLE `statistics`
  MODIFY `operationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `washing_machine`
--
ALTER TABLE `washing_machine`
  MODIFY `wmID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `air_conditioner`
--
ALTER TABLE `air_conditioner`
  ADD CONSTRAINT `ac_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_to_room` FOREIGN KEY (`roomID`) REFERENCES `room` (`roomID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `dishwasher`
--
ALTER TABLE `dishwasher`
  ADD CONSTRAINT `dishwasher_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `electric_blanket`
--
ALTER TABLE `electric_blanket`
  ADD CONSTRAINT `eb_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `fan`
--
ALTER TABLE `fan`
  ADD CONSTRAINT `fan_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `light`
--
ALTER TABLE `light`
  ADD CONSTRAINT `light_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_to_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `robot_toy`
--
ALTER TABLE `robot_toy`
  ADD CONSTRAINT `rt_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `robot_vacum_cleaner`
--
ALTER TABLE `robot_vacum_cleaner`
  ADD CONSTRAINT `rbv_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_to_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `statistics_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `washing_machine`
--
ALTER TABLE `washing_machine`
  ADD CONSTRAINT `wm_to_device` FOREIGN KEY (`deviceID`) REFERENCES `device` (`deviceID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
