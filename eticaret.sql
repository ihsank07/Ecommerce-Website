-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 24 Kas 2021, 21:58:57
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `eticaret`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`id`, `name`, `parent_id`) VALUES
(1, 'Erkek', NULL),
(11, 'Giyim', 1),
(12, 'Ayakkabı', 1),
(13, 'Saat', 1),
(15, 'Kadın', NULL),
(16, 'Giyim', 15),
(17, 'Ayakkabı', 15),
(18, 'Aksesuar', 15),
(19, 'Çocuk', NULL),
(20, 'Bebek', 19),
(21, 'Erkek Çocuk', 19),
(22, 'Kız Çocuk', 19),
(23, 'Spor Ayakkabı', 12),
(24, 'Ev&Yaşam', NULL),
(25, 'Sofra', 24),
(26, 'Banyo', 24);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211108001856', '2021-11-08 01:19:11', 93),
('DoctrineMigrations\\Version20211108233133', '2021-11-09 00:34:54', 256),
('DoctrineMigrations\\Version20211109004352', '2021-11-09 01:44:26', 286),
('DoctrineMigrations\\Version20211111140629', '2021-11-11 15:06:40', 733),
('DoctrineMigrations\\Version20211111140956', '2021-11-11 15:10:04', 254),
('DoctrineMigrations\\Version20211111144752', '2021-11-11 15:48:03', 43),
('DoctrineMigrations\\Version20211111145809', '2021-11-11 15:58:15', 44),
('DoctrineMigrations\\Version20211113220657', '2021-11-13 23:07:05', 53),
('DoctrineMigrations\\Version20211113221456', '2021-11-13 23:15:06', 53),
('DoctrineMigrations\\Version20211113222433', '2021-11-13 23:24:37', 276),
('DoctrineMigrations\\Version20211113224059', '2021-11-13 23:41:05', 44),
('DoctrineMigrations\\Version20211114134902', '2021-11-14 14:49:18', 104),
('DoctrineMigrations\\Version20211114154107', '2021-11-14 16:41:18', 378),
('DoctrineMigrations\\Version20211114155641', '2021-11-14 16:56:51', 169),
('DoctrineMigrations\\Version20211114165743', '2021-11-14 17:57:47', 81),
('DoctrineMigrations\\Version20211115131356', '2021-11-15 14:14:01', 53),
('DoctrineMigrations\\Version20211115185136', '2021-11-15 19:53:11', 55),
('DoctrineMigrations\\Version20211115190306', '2021-11-15 20:03:11', 53),
('DoctrineMigrations\\Version20211116002929', '2021-11-16 01:29:41', 196),
('DoctrineMigrations\\Version20211116100817', '2021-11-16 11:08:21', 78),
('DoctrineMigrations\\Version20211116125707', '2021-11-16 13:57:12', 267),
('DoctrineMigrations\\Version20211117011326', '2021-11-17 02:13:32', 265),
('DoctrineMigrations\\Version20211117201734', '2021-11-17 21:17:43', 429),
('DoctrineMigrations\\Version20211117204849', '2021-11-17 21:48:57', 58),
('DoctrineMigrations\\Version20211118095716', '2021-11-18 10:57:23', 75),
('DoctrineMigrations\\Version20211118100213', '2021-11-18 11:02:20', 43),
('DoctrineMigrations\\Version20211118203008', '2021-11-18 21:30:16', 622),
('DoctrineMigrations\\Version20211120131125', '2021-11-20 14:11:32', 204),
('DoctrineMigrations\\Version20211120133538', '2021-11-20 14:35:46', 48),
('DoctrineMigrations\\Version20211120142836', '2021-11-20 15:28:46', 68),
('DoctrineMigrations\\Version20211120152225', '2021-11-20 16:22:33', 46),
('DoctrineMigrations\\Version20211120215922', '2021-11-20 22:59:28', 605),
('DoctrineMigrations\\Version20211120220629', '2021-11-20 23:06:34', 44),
('DoctrineMigrations\\Version20211121004139', '2021-11-21 01:41:47', 50),
('DoctrineMigrations\\Version20211122020733', '2021-11-22 03:07:41', 191);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentmethod` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order`
--

INSERT INTO `order` (`id`, `address`, `city`, `postcode`, `paymentmethod`, `price`, `status`) VALUES
(28, '2 anda iş merkezi 989. Sokak gezinomi seyahat acentesi no : 3b kat: 2', 'Muratpaşa', '0(531) 518 07 07', 'Kapıda Ödeme', 375, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `basketno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `order_product`
--

INSERT INTO `order_product` (`id`, `productname`, `quantity`, `userid`, `basketno`) VALUES
(3, 'klavye', 2, 6, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_product_shopping_cart`
--

CREATE TABLE `order_product_shopping_cart` (
  `order_product_id` int(11) NOT NULL,
  `shopping_cart_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `order_user`
--

CREATE TABLE `order_user` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `description`) VALUES
(11, 'HUMMEL Porter Unisex Siyah Spor Ayakkabı 207900-2001', 250, 20, 'Her Mevsim Giyinmelik Spor Ayakkabı'),
(12, 'klavye', 100, 50, 'mekanik klavye'),
(13, 'Tshirt', 50, 10, 'Yaz Günlerinde Giyilebilecek Tshirt'),
(14, 'Saat', 70, 10, 'Dijital Saat'),
(15, 'Nike Spor Ayakkabı', 150, 10, 'Koşu için uygun ayakkabı'),
(16, 'Nike Spor Ayakkabı', 100, 10, 'koşu için uygun ayakkabı'),
(17, 'Nike Spor Ayakkabı Kırmızı', 150, 10, 'koşu için uygun ayakkabı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`) VALUES
(11, 12),
(11, 23),
(12, 1),
(13, 11),
(14, 13),
(15, 12),
(16, 23),
(17, 12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shoppingcarttotal`
--

CREATE TABLE `shoppingcarttotal` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `shoppingcarttotal`
--

INSERT INTO `shoppingcarttotal` (`id`, `userid`, `total`) VALUES
(66, 6, 500),
(67, 6, 900),
(68, 6, 900),
(69, 6, 900),
(70, 6, 900),
(71, 6, 900),
(72, 6, 900),
(73, 6, 500),
(74, 6, 500),
(75, 6, 500),
(76, 6, 500),
(77, 6, 900),
(78, 6, 900),
(79, 6, 500),
(80, 6, 700),
(81, 6, 200),
(82, 6, 150),
(83, 6, 300),
(84, 6, 150),
(85, 6, 200),
(86, 6, 250),
(87, 6, 400);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `username_id` int(11) NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `unitprice` double NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `shopping_cart_product`
--

CREATE TABLE `shopping_cart_product` (
  `shopping_cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`id`, `username`, `roles`, `password`) VALUES
(6, 'ihsan07', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$Zk1qUUZQY0FGNTZNVUNrZw$2vtmApGtHFCpbD2/6OHpNcBlgKJERQn9OUj6babUNLg'),
(8, 'metin', '[]', '$argon2id$v=19$m=65536,t=4,p=1$MTJQVVYyNlozQ29BMVY1aA$FdftUW/f444D89A8XeXYQqDYyKDBw3tNefw46WKJ488'),
(9, 'aslan', '[]', '$argon2id$v=19$m=65536,t=4,p=1$b1dWZ0FCRnluT0JmUHpKUw$mz0Gd58xYuTRk1N6fLC86l0aA5uwLROW2+0EA67q0+U'),
(10, 'burak', '[]', '$argon2id$v=19$m=65536,t=4,p=1$SzdaU2p0b3FoTzFqNG5mMw$diVxB2FsuoBroR/2uljJlwfudjNCkpTZdKMNH2Z36VU'),
(11, 'kaya', '[]', '$argon2id$v=19$m=65536,t=4,p=1$SGN2Y1E0bnBjSzZTY3pKaQ$3m081CDFQkEdOGU9yj3CGCPpmEw+Qt3JLhvEbz9rpII'),
(12, 'ihsank97', '[]', '$argon2id$v=19$m=65536,t=4,p=1$WUhPYS5vc0U0T21UOE5XYw$UbI7EsI7tL9rFPVmPaYp819ZRzhLUhReNriz0+FCEDc'),
(13, 'ihsan', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$OFllcTNkSDNzRUdEZ2hEbQ$LXvFQFoNiX5ZB0zB0CEiPIgoiMo+xn/DRoA/PHExGsY');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_64C19C1727ACA70` (`parent_id`);

--
-- Tablo için indeksler `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Tablo için indeksler `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `order_product_shopping_cart`
--
ALTER TABLE `order_product_shopping_cart`
  ADD PRIMARY KEY (`order_product_id`,`shopping_cart_id`),
  ADD KEY `IDX_9D4CA4A8F65E9B0F` (`order_product_id`),
  ADD KEY `IDX_9D4CA4A845F80CD` (`shopping_cart_id`);

--
-- Tablo için indeksler `order_user`
--
ALTER TABLE `order_user`
  ADD PRIMARY KEY (`order_id`,`user_id`),
  ADD KEY `IDX_C062EC5E8D9F6D38` (`order_id`),
  ADD KEY `IDX_C062EC5EA76ED395` (`user_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `IDX_CDFC73564584665A` (`product_id`),
  ADD KEY `IDX_CDFC735612469DE2` (`category_id`);

--
-- Tablo için indeksler `shoppingcarttotal`
--
ALTER TABLE `shoppingcarttotal`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_72AAD4F6ED766068` (`username_id`);

--
-- Tablo için indeksler `shopping_cart_product`
--
ALTER TABLE `shopping_cart_product`
  ADD PRIMARY KEY (`shopping_cart_id`,`product_id`),
  ADD KEY `IDX_FA1F5E6C45F80CD` (`shopping_cart_id`),
  ADD KEY `IDX_FA1F5E6C4584665A` (`product_id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `shoppingcarttotal`
--
ALTER TABLE `shoppingcarttotal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Tablo için AUTO_INCREMENT değeri `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`);

--
-- Tablo kısıtlamaları `order_product_shopping_cart`
--
ALTER TABLE `order_product_shopping_cart`
  ADD CONSTRAINT `FK_9D4CA4A845F80CD` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9D4CA4A8F65E9B0F` FOREIGN KEY (`order_product_id`) REFERENCES `order_product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `order_user`
--
ALTER TABLE `order_user`
  ADD CONSTRAINT `FK_C062EC5E8D9F6D38` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C062EC5EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `FK_CDFC735612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_CDFC73564584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;

--
-- Tablo kısıtlamaları `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `FK_72AAD4F6ED766068` FOREIGN KEY (`username_id`) REFERENCES `user` (`id`);

--
-- Tablo kısıtlamaları `shopping_cart_product`
--
ALTER TABLE `shopping_cart_product`
  ADD CONSTRAINT `FK_FA1F5E6C4584665A` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FA1F5E6C45F80CD` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_cart` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
