-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 10 Şub 2020, 10:30:52
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `etic`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `kategori` int(11) NOT NULL,
  `altkategori` int(11) NOT NULL,
  `adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `seo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `durum` int(11) NOT NULL,
  `indirim` int(11) NOT NULL,
  `secenek` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `urun_kodu` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `stok` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` decimal(9,2) NOT NULL,
  `ifiyat` decimal(9,2) NOT NULL,
  `aciklama` longtext COLLATE utf8_turkish_ci NOT NULL,
  `ozellik` text COLLATE utf8_turkish_ci NOT NULL,
  `iade` text COLLATE utf8_turkish_ci NOT NULL,
  `coksatan` int(11) NOT NULL,
  `tarih` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `cok` longtext COLLATE utf8_turkish_ci,
  `sicak` longtext COLLATE utf8_turkish_ci,
  `yeni` longtext COLLATE utf8_turkish_ci,
  `session` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `kategori`, `altkategori`, `adi`, `seo`, `resim`, `durum`, `indirim`, `secenek`, `urun_kodu`, `stok`, `fiyat`, `ifiyat`, `aciklama`, `ozellik`, `iade`, `coksatan`, `tarih`, `cok`, `sicak`, `yeni`, `session`) VALUES
(1, 58, 43, 'iphone', 'iphone-10', 'iphone.jpg', 1, 1, 'Sarı', '333', '100', '900.00', '880.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0),
(2, 58, 43, 'Sony XZ', 'Sony', 'sony.jpg', 1, 1, 'Beyaz', '44', '100', '650.00', '620.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0),
(3, 58, 43, 'Huawei', 'Huawei', 'hu.jpg', 1, 1, 'Beyaz', '44', '100', '750.00', '730.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0),
(4, 58, 43, 'Samsung', 'Samsung', 'samsung.jpg', 1, 1, 'Beyaz', '44', '100', '750.00', '730.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0),
(5, 58, 43, 'Sony XZ', 'Sony', 'sony.jpg', 1, 1, 'Beyaz', '44', '100', '650.00', '620.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0),
(6, 58, 43, 'Huawei', 'Huawei', 'hu.jpg', 1, 1, 'Beyaz', '44', '100', '750.00', '730.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0),
(7, 58, 43, 'Samsung', 'Samsung', 'samsung.jpg', 1, 1, 'Beyaz', '44', '100', '750.00', '730.00', 'Lorem ipsum dolor sit amete, consectetur news adipisicing sed do new fashion eiusmod tempor incididunt ut labore etel dolore magna aliqua. Ut enim news minimveniam, quis nostrud exercitation ullamco laboris nisi commodo consequat consectetur adipisicing. Fashion double layering.', '', '', 0, '', 'Evet', 'Evet', 'Evet', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
