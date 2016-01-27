# SQL Manager 2005 Lite for MySQL 3.7.7.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : orders


SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE `orders`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `orders`;

#
# Structure for the `products` table : 
#

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id_product` text,
  `product_code` text,
  `product_name` text,
  `product_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

