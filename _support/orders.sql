
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'Ademar Suarez','Coca Cola',NULL,NULL,NULL,NULL),(2,'Roger Guzman','Architects & Engineers',NULL,NULL,NULL,NULL),(3,'John Smith','Platzi',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `inventories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventories` (
  `id_inventory` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `story_id` int(11) DEFAULT NULL,
  `inventory_quantity` int(11) DEFAULT NULL,
  `inventory_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_inventory`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `inventories` WRITE;
/*!40000 ALTER TABLE `inventories` DISABLE KEYS */;
INSERT INTO `inventories` VALUES (3,1,NULL,6,'2016-01-28 02:28:14'),(9,2,NULL,9,'2016-01-28 02:40:49'),(11,1,NULL,4,'2016-01-28 03:41:44'),(12,2,NULL,1,'2016-01-28 03:41:44'),(13,1,NULL,5,'2016-01-28 03:47:15'),(14,2,NULL,5,'2016-01-28 03:47:15'),(15,1,NULL,4,'2016-01-28 04:03:30'),(16,2,NULL,4,'2016-01-28 04:03:30'),(17,1,NULL,3,'2016-01-29 02:34:47'),(18,2,NULL,5,'2016-01-29 02:34:48'),(19,3,NULL,6,'2016-01-29 02:36:13'),(20,2,NULL,8,'2016-02-03 04:33:06'),(21,4,NULL,5,'2016-02-08 08:52:33'),(22,5,NULL,100,'2016-02-08 12:50:46');
/*!40000 ALTER TABLE `inventories` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_items` (
  `id_order_item` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `order_item_quantity` int(11) DEFAULT NULL,
  `order_item_price` float(9,3) DEFAULT NULL,
  PRIMARY KEY (`id_order_item`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (12,1,19,3,NULL),(13,2,19,4,NULL),(14,2,20,4,NULL),(15,3,20,5,NULL),(16,4,21,6,NULL),(17,4,22,7,NULL),(18,4,23,9,NULL),(19,4,24,5,NULL),(20,4,25,5,NULL),(21,1,26,5,NULL),(22,4,26,3,NULL),(23,5,27,50,NULL);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (19,NULL,'2016-02-03 04:59:05'),(20,NULL,'2016-02-03 04:59:26'),(21,NULL,'2016-02-08 08:42:59'),(22,NULL,'2016-02-08 08:43:10'),(23,NULL,'2016-02-08 08:48:28'),(24,NULL,'2016-02-08 08:50:55'),(25,NULL,'2016-02-08 08:51:58'),(26,NULL,'2016-02-08 08:52:50'),(27,NULL,'2016-02-08 12:52:00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` text,
  `product_name` text,
  `product_minimum_price` float(9,3) DEFAULT NULL,
  `product_maximum_price` float(9,3) DEFAULT NULL,
  `product_description` text,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'343','PROCESADOR INTEL 7',NULL,NULL,'CORE I 7 4TA GENERACION'),(2,'44566','TARJETA MADRE',NULL,NULL,'MARCA INTEL'),(3,'DT050','DISCO INTERNO, TOSHIBA',NULL,NULL,''),(4,'334CO','COOLER',NULL,NULL,'lorem ipsum'),(5,'kvr160004gb','memoria',NULL,NULL,'memori kingston de 4gb bus 1600'),(6,'44466GHH','pro vhh',NULL,NULL,'lorem ipsum froif');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
DROP TABLE IF EXISTS `stories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stories` (
  `id_story` int(11) DEFAULT NULL,
  `story_name` text,
  `story_location` text,
  `story_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `stories` WRITE;
/*!40000 ALTER TABLE `stories` DISABLE KEYS */;
/*!40000 ALTER TABLE `stories` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

