-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: mysql.krasalp.myjino.ru    Database: krasalp_test-task-db
-- ------------------------------------------------------
-- Server version	5.5.62-38.14-log

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
-- Table structure for table `element`
--

DROP TABLE IF EXISTS `element`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `element` (
  `id_element` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date NOT NULL,
  `additional_data` mediumblob,
  PRIMARY KEY (`id_element`),
  KEY `id_parent` (`id_parent`),
  CONSTRAINT `element_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `section` (`id_section`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `element`
--

LOCK TABLES `element` WRITE;
/*!40000 ALTER TABLE `element` DISABLE KEYS */;
INSERT INTO `element` VALUES (1,2,'first_element','РљРѕРјРјРµРЅС‚Р°СЂРёР№','2020-09-07','2020-09-09',NULL),(2,2,'second_element','РќРѕРІРѕСЃС‚СЊ','2020-09-07','2020-09-09',NULL),(3,1,'third_element','РљРѕРјРјРµРЅС‚Р°СЂРёР№','2020-09-02','2020-09-09',NULL),(4,5,'fourth_el_in_fifth_cec','РќРѕРІРѕСЃС‚СЊ','2020-09-08','2020-09-09',NULL),(5,5,'sixth_el_in_fifth_cec','РЎС‚Р°С‚СЊСЏ','2020-09-08','2020-09-09',NULL),(9,2,'new_one','РЎС‚Р°С‚СЊСЏ','2020-09-09','2020-09-09',NULL);
/*!40000 ALTER TABLE `element` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id_section` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `creation_date` date NOT NULL,
  `modification_date` date NOT NULL,
  PRIMARY KEY (`id_section`),
  KEY `id_parent` (`id_parent`),
  CONSTRAINT `section_ibfk_1` FOREIGN KEY (`id_parent`) REFERENCES `section` (`id_section`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (1,NULL,'home','this is home section','2020-09-07','2020-09-07'),(2,1,'section_two','this is second section','2020-09-07','2020-09-07'),(3,1,'section_three','this is third section','2020-09-08','2020-09-08'),(4,2,'section_four','this is fourth section','2020-09-08','2020-09-08'),(5,4,'section_vive','this section in the fourth section','2020-09-08','2020-09-08'),(14,2,'section_seven','','2020-09-08','2020-09-08'),(18,4,'section_six','this is sixth section','2020-09-09','2020-09-09');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-09 13:53:17
