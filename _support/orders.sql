# SQL Manager 2005 Lite for MySQL 3.7.7.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : orders


SET FOREIGN_KEY_CHECKS=0;

#
# Structure for the `clients` table : 
#

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` text,
  `client_company` text,
  `client_address` text,
  `client_email` text,
  `client_phone` text,
  `client_cellphone` text,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

#
# Structure for the `inventories` table : 
#

DROP TABLE IF EXISTS `inventories`;

CREATE TABLE `inventories` (
  `id_inventory` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `inventory_quantity` int(11) DEFAULT NULL,
  `inventory_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_inventory`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

#
# Structure for the `order_items` table : 
#

DROP TABLE IF EXISTS `order_items`;

CREATE TABLE `order_items` (
  `id_order_item` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_item_quantity` int(11) DEFAULT NULL,
  `order_item_price` float(9,3) DEFAULT NULL,
  PRIMARY KEY (`id_order_item`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

#
# Structure for the `orders` table : 
#

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

#
# Structure for the `products` table : 
#

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` text,
  `product_name` text,
  `product_minimum_price` float(9,3) DEFAULT NULL,
  `product_maximum_price` float(9,3) DEFAULT NULL,
  `product_description` text,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `stories` table : 
#

DROP TABLE IF EXISTS `stories`;

CREATE TABLE `stories` (
  `id_story` int(11) DEFAULT NULL,
  `story_name` text,
  `story_location` text,
  `story_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for the `clients` table  (LIMIT 0,500)
#

INSERT INTO `clients` (`id_client`, `client_name`, `client_company`, `client_address`, `client_email`, `client_phone`, `client_cellphone`) VALUES 
  (1,'Ademar Suarez','Coca Cola',NULL,NULL,NULL,NULL),
  (2,'Roger Guzman','Architects & Engineers',NULL,NULL,NULL,NULL),
  (3,'John Smith','Platzi',NULL,NULL,NULL,NULL);

COMMIT;

#
# Data for the `inventories` table  (LIMIT 0,500)
#

INSERT INTO `inventories` (`id_inventory`, `product_id`, `story_id`, `inventory_quantity`, `inventory_date`) VALUES 
  (3,1,NULL,6,'2016-01-27 22:28:14'),
  (9,2,NULL,9,'2016-01-27 22:40:49'),
  (11,1,NULL,4,'2016-01-27 23:41:44'),
  (12,2,NULL,1,'2016-01-27 23:41:44'),
  (13,1,NULL,5,'2016-01-27 23:47:15'),
  (14,2,NULL,5,'2016-01-27 23:47:15'),
  (15,1,NULL,4,'2016-01-28 00:03:30'),
  (16,2,NULL,4,'2016-01-28 00:03:30'),
  (17,1,NULL,3,'2016-01-28 22:34:47'),
  (18,2,NULL,5,'2016-01-28 22:34:48'),
  (19,3,NULL,6,'2016-01-28 22:36:13'),
  (20,2,NULL,8,'2016-02-03 00:33:06'),
  (21,4,NULL,5,'2016-02-08 04:52:33'),
  (22,5,NULL,100,'2016-02-08 08:50:46');

COMMIT;

#
# Data for the `order_items` table  (LIMIT 0,500)
#

INSERT INTO `order_items` (`id_order_item`, `product_id`, `order_id`, `order_item_quantity`, `order_item_price`) VALUES 
  (12,1,19,3,NULL),
  (13,2,19,4,NULL),
  (14,2,20,4,NULL),
  (15,3,20,5,NULL),
  (16,4,21,6,NULL),
  (17,4,22,7,NULL),
  (18,4,23,9,NULL),
  (19,4,24,5,NULL),
  (20,4,25,5,NULL),
  (21,1,26,5,NULL),
  (22,4,26,3,NULL),
  (23,5,27,50,NULL);

COMMIT;

#
# Data for the `orders` table  (LIMIT 0,500)
#

INSERT INTO `orders` (`id_order`, `client_id`, `order_date`) VALUES 
  (19,NULL,'2016-02-03 00:59:05'),
  (20,NULL,'2016-02-03 00:59:26'),
  (21,NULL,'2016-02-08 04:42:59'),
  (22,NULL,'2016-02-08 04:43:10'),
  (23,NULL,'2016-02-08 04:48:28'),
  (24,NULL,'2016-02-08 04:50:55'),
  (25,NULL,'2016-02-08 04:51:58'),
  (26,NULL,'2016-02-08 04:52:50'),
  (27,NULL,'2016-02-08 08:52:00');

COMMIT;

#
# Data for the `products` table  (LIMIT 0,500)
#

INSERT INTO `products` (`id_product`, `product_code`, `product_name`, `product_minimum_price`, `product_maximum_price`, `product_description`) VALUES 
  (1,'343','PROCESADOR INTEL 7',NULL,NULL,'CORE I 7 4TA GENERACION'),
  (2,'44566','TARJETA MADRE',NULL,NULL,'MARCA INTEL'),
  (3,'DT050','DISCO INTERNO, TOSHIBA',NULL,NULL,''),
  (4,'334CO','COOLER',NULL,NULL,'lorem ipsum'),
  (5,'kvr160004gb','memoria',NULL,NULL,'memori kingston de 4gb bus 1600'),
  (6,'44466GHH','pro vhh',NULL,NULL,'lorem ipsum froif');

COMMIT;

