# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 11.1.2-MariaDB-1:11.1.2+maria~ubu2204)
# Database: Shoe_Stack
# Generation Time: 2023-11-20 11:01:07 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table manufacturer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `manufacturer`;

CREATE TABLE `manufacturer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `manufacturer` WRITE;
/*!40000 ALTER TABLE `manufacturer` DISABLE KEYS */;

INSERT INTO `manufacturer` (`id`, `name`)
VALUES
	(1,'Addidas'),
	(2,'Converse'),
	(3,'Nike'),
	(4,'New Balance'),
	(5,'Vans'),
	(6,'Reebok'),
	(7,'Puma');

/*!40000 ALTER TABLE `manufacturer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table trainers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `trainers`;

CREATE TABLE `trainers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `manufacturer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `trainers` WRITE;
/*!40000 ALTER TABLE `trainers` DISABLE KEYS */;

INSERT INTO `trainers` (`id`, `name`, `image`, `price`, `manufacturer_id`)
VALUES
	(2,'Ultra Boost','https://media.karousell.com/media/photos/products/2020/8/2/adidas_ultraboost_cream_1596348608_9f019b41.jpg',119.99,1),
	(3,'Cali','https://media.karousell.com/media/photos/products/2021/1/2/puma_x_maybelline_puma_cali_sn_1609593616_7b221203_progressive.jpg',54.99,7),
	(4,'Chuck Taylor All Star','https://images.asos-media.com/products/converse-chuck-taylor-all-star-hi-wide-fit-unisex-trainers-in-white/201956746-1-white?$n_640w$&wid=513&fit=constrain',65.99,2),
	(5,'990','https://images.tokopedia.net/img/cache/700/VqbcmM/2021/11/7/5cf1c867-1b11-4f31-af46-6d8a4b838207.jpg',154.99,4),
	(6,'Old Skool','https://ph-test-11.slatic.net/p/f29f6c968788ad0551de2a6cc00c0725.jpg',46.99,8),
	(7,'Classic Leather','https://reebok.bynder.com/transform/804f2307-99f3-4baf-baa4-186d2dcb7f7c/23FW_Classic-Essentials-Classic-Leather_Image-Collection-TileA?fm=jpg&q=90&fit=fill&w=1200p',36.99,6),
	(11,'Free Run Trail','https://www.kicksonfire.com/wp-content/uploads/2021/04/Nike-Free-Run-Trail-Neutral-Grey.jpg',63.99,3),
	(12,'Air Force 1','https://media.karousell.com/media/photos/products/2022/9/6/nike_af1_ultra_force_light_wei_1662436062_aea9e4f2_progressive.jpg',110.99,3);

/*!40000 ALTER TABLE `trainers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
