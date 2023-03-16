-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Eyl 2020, 22:35:26
-- Sunucu sürümü: 5.6.12-log
-- PHP Sürümü: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `uygunagetir`
--
CREATE DATABASE IF NOT EXISTS `uygunagetir` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uygunagetir`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `altkategori`
--

CREATE TABLE IF NOT EXISTS `altkategori` (
  `altkategori_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_id` int(5) NOT NULL,
  `altkategori_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`altkategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE IF NOT EXISTS `ayar` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `sitetitle` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sitedescription` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `sitekeywords` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`id`, `sitetitle`, `sitedescription`, `sitekeywords`) VALUES
(1, 'Uygunagetir', 'en ucuzu bizde', 'uygynagetir,uygun,getir,ucuz,en ucuz ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `deger`
--

CREATE TABLE IF NOT EXISTS `deger` (
  `deger_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `urun_id` int(10) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `altkategori_id` int(11) NOT NULL,
  `fiyat` double NOT NULL,
  `indirim_orani` int(11) NOT NULL,
  `bas_tarih` date NOT NULL,
  `bit_tarih` date NOT NULL,
  PRIMARY KEY (`deger_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `kategori_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `kategori_adi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

CREATE TABLE IF NOT EXISTS `marka` (
  `marka_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `marka_adi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`marka_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `satis`
--

CREATE TABLE IF NOT EXISTS `satis` (
  `satis_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `satici_id` int(11) NOT NULL,
  `alan_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` double NOT NULL,
  `toplam_fiyat` double NOT NULL,
  `zamandamgasi` int(11) NOT NULL,
  `tarih` datetime NOT NULL,
  `kargo_adi` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `kargo_durum` int(11) NOT NULL,
  `kargo_kodu` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`satis_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE IF NOT EXISTS `sepet` (
  `sepet_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `satici_id` int(5) NOT NULL,
  `uye_id` int(5) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(11) NOT NULL,
  `urun_fiyat` double NOT NULL,
  PRIMARY KEY (`sepet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `url` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `dosya_adi` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=5 ;

--
-- Tablo döküm verisi `slide`
--

INSERT INTO `slide` (`id`, `baslik`, `url`, `dosya_adi`) VALUES
(1, 'resim1', '', '2.jpg'),
(2, 'resim2', '', '1.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE IF NOT EXISTS `urun` (
  `urun_id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `satici_id` int(5) NOT NULL,
  `marka_id` int(3) NOT NULL,
  `kategori_id` int(3) NOT NULL,
  `altkategori_id` int(3) NOT NULL,
  `urun_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `urun_resmi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urun_ozellik` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_stok` int(11) NOT NULL,
  `vitrin` int(11) NOT NULL,
  `gorunum` int(11) NOT NULL,
  `sira` int(11) DEFAULT '0',
  PRIMARY KEY (`urun_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE IF NOT EXISTS `uye` (
  `uyeid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `kadi` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `ad` varchar(25) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  `adres` text COLLATE utf8_turkish_ci NOT NULL,
  `bankahesapno` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `rutbe` int(1) NOT NULL,
  PRIMARY KEY (`uyeid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=27 ;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`uyeid`, `kadi`, `sifre`, `ad`, `soyad`, `tel`, `email`, `adres`, `bankahesapno`, `rutbe`) VALUES
(1, 'uygunagetir', '860052df4915de4d6c3deac9f7ebf5cc', 'uygunagetir', 'uygunagetir', '55555555555', 'bugra34055@hotmail.com', 'uygunagetir', '123456789', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
