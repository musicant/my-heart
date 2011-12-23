-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: my-heart
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.10

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

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo_id` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`image_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'5701489_269893776','http://cs4414.vkontakte.ru/u5701489/145745462/x_4fca6b6f.jpg',1),(2,'5701489_269893805','http://cs4414.vkontakte.ru/u5701489/145745462/x_106070d9.jpg',2),(3,'5701489_269893825','http://cs4414.vkontakte.ru/u5701489/145745462/x_ff082e92.jpg',1),(4,'5701489_269893826','http://cs4414.vkontakte.ru/u5701489/145745462/x_1b3cfb09.jpg',0),(5,'5701489_269893913','http://cs4414.vkontakte.ru/u5701489/145745462/x_6803a111.jpg',0),(6,'5701489_269893914','http://cs4414.vkontakte.ru/u5701489/145745462/x_0fe255e8.jpg',0),(7,'5701489_269893915','http://cs4414.vkontakte.ru/u5701489/145745462/x_a98fd151.jpg',0),(8,'5701489_269893916','http://cs4414.vkontakte.ru/u5701489/145745462/x_62ebc502.jpg',0),(9,'5701489_269893918','http://cs4414.vkontakte.ru/u5701489/145745462/x_0c19c05b.jpg',0),(10,'5701489_269893919','http://cs4414.vkontakte.ru/u5701489/145745462/x_ced1c064.jpg',0),(11,'5701489_269894048','http://cs4414.vkontakte.ru/u5701489/145745462/x_3ede4c0d.jpg',0),(12,'5701489_269894049','http://cs4414.vkontakte.ru/u5701489/145745462/x_9450a9f0.jpg',0),(13,'5701489_269894051','http://cs4414.vkontakte.ru/u5701489/145745462/x_f43a83a8.jpg',0),(14,'5701489_269894058','http://cs4414.vkontakte.ru/u5701489/145745462/x_01c0ed95.jpg',0),(15,'5701489_269894060','http://cs4414.vkontakte.ru/u5701489/145745462/x_efe5bc9f.jpg',0),(16,'5701489_269894061','http://cs4414.vkontakte.ru/u5701489/145745462/x_9e051bcd.jpg',0),(17,'5701489_269894632','http://cs4414.vkontakte.ru/u5701489/145745462/x_9f0a6ce2.jpg',0),(18,'5701489_269894639','http://cs4414.vkontakte.ru/u5701489/145745462/x_43564491.jpg',0),(19,'5701489_269894640','http://cs4414.vkontakte.ru/u5701489/145745462/x_f9595724.jpg',0),(20,'5701489_269894642','http://cs4414.vkontakte.ru/u5701489/145745462/x_3db4e63d.jpg',0),(21,'5701489_269894643','http://cs4414.vkontakte.ru/u5701489/145745462/x_1c4472e2.jpg',0),(22,'5701489_269894646','http://cs4414.vkontakte.ru/u5701489/145745462/x_c9242399.jpg',0),(23,'5701489_269894649','http://cs4414.vkontakte.ru/u5701489/145745462/x_545a646c.jpg',0),(24,'5701489_269894650','http://cs4414.vkontakte.ru/u5701489/145745462/x_b1f512aa.jpg',0),(25,'5701489_269894655','http://cs4414.vkontakte.ru/u5701489/145745462/x_53e72120.jpg',0),(26,'5701489_269894656','http://cs4414.vkontakte.ru/u5701489/145745462/x_7ac8823e.jpg',0),(27,'5701489_269894662','http://cs4414.vkontakte.ru/u5701489/145745462/x_b9e5a1cc.jpg',0),(28,'5701489_269894663','http://cs4414.vkontakte.ru/u5701489/145745462/x_eb027360.jpg',0),(29,'5701489_269894664','http://cs4414.vkontakte.ru/u5701489/145745462/x_71b845f2.jpg',0),(30,'5701489_269894665','http://cs4414.vkontakte.ru/u5701489/145745462/x_1ebd1e62.jpg',0),(31,'5701489_269894667','http://cs4414.vkontakte.ru/u5701489/145745462/x_0685803e.jpg',0),(32,'5701489_269894668','http://cs4414.vkontakte.ru/u5701489/145745462/x_9f8f737b.jpg',0),(33,'5701489_269894671','http://cs4414.vkontakte.ru/u5701489/145745462/x_356768ae.jpg',0),(34,'5701489_269894672','http://cs4414.vkontakte.ru/u5701489/145745462/x_db439c2e.jpg',0),(35,'5701489_269894675','http://cs4414.vkontakte.ru/u5701489/145745462/x_118a2672.jpg',0),(36,'5701489_269894676','http://cs4414.vkontakte.ru/u5701489/145745462/x_3fb4f1c4.jpg',0),(37,'5701489_269894677','http://cs4414.vkontakte.ru/u5701489/145745462/x_693abaf5.jpg',0),(38,'5701489_269894679','http://cs4414.vkontakte.ru/u5701489/145745462/x_acf1c0c0.jpg',0),(39,'5701489_269894682','http://cs4414.vkontakte.ru/u5701489/145745462/x_2db466d9.jpg',0),(40,'5701489_269894684','http://cs4414.vkontakte.ru/u5701489/145745462/x_fa1a079c.jpg',0),(41,'5701489_269894688','http://cs4414.vkontakte.ru/u5701489/145745462/x_ccc79ae4.jpg',0),(42,'5701489_269894691','http://cs4414.vkontakte.ru/u5701489/145745462/x_af3cf10a.jpg',0),(43,'5701489_269894693','http://cs4414.vkontakte.ru/u5701489/145745462/x_beeaa8f8.jpg',0),(44,'5701489_269894694','http://cs4414.vkontakte.ru/u5701489/145745462/x_837e3728.jpg',0),(45,'5701489_269894698','http://cs4414.vkontakte.ru/u5701489/145745462/x_30a26c49.jpg',0),(46,'5701489_269894700','http://cs4414.vkontakte.ru/u5701489/145745462/x_ab5a1736.jpg',0),(47,'5701489_269894702','http://cs4414.vkontakte.ru/u5701489/145745462/x_a8b1b29c.jpg',0),(48,'5701489_269894704','http://cs4414.vkontakte.ru/u5701489/145745462/x_ee8dac92.jpg',0),(49,'5701489_269894709','http://cs4414.vkontakte.ru/u5701489/145745462/x_16cfbbfb.jpg',0),(50,'5701489_269894710','http://cs4414.vkontakte.ru/u5701489/145745462/x_27768735.jpg',0),(51,'5701489_269894713','http://cs4414.vkontakte.ru/u5701489/145745462/x_d35395c5.jpg',0),(52,'5701489_269894715','http://cs4414.vkontakte.ru/u5701489/145745462/x_dfe884f1.jpg',0);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `message_sent_from` int(10) NOT NULL,
  `message_sent_to` int(10) NOT NULL,
  `image_id` int(11) NOT NULL,
  `message` varchar(500) CHARACTER SET utf8 NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,5701489,3551674,5,'test message',1),(2,5701489,3551674,8,'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489',1),(3,5701489,3551674,5,'Дед Мроз принес тебе открытку на стену. Отправляй окрытки друзьям http://vkontakte.ru/app2711477_5701489',0);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-23 18:56:36
