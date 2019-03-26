CREATE DATABASE  IF NOT EXISTS `ser322_group9` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ser322_group9`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: ser322-group9.cu20uz5trvzf.us-east-2.rds.amazonaws.com    Database: ser322_group9
-- ------------------------------------------------------
-- Server version	5.6.37-log

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
-- Table structure for table `Showtimes`
--

DROP TABLE IF EXISTS `Showtimes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Showtimes` (
  `showtimeID` int(11) NOT NULL AUTO_INCREMENT,
  `movieID` int(11) DEFAULT NULL,
  `locationID` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `startTime` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`showtimeID`),
  UNIQUE KEY `showtimeID_UNIQUE` (`showtimeID`),
  KEY `movieID_idx` (`movieID`),
  KEY `locationID_idx` (`locationID`),
  CONSTRAINT `locationID` FOREIGN KEY (`locationID`) REFERENCES `Locations` (`locationID`) ON DELETE NO ACTION,
  CONSTRAINT `movieID` FOREIGN KEY (`movieID`) REFERENCES `Movies` (`movieID`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Showtimes`
--

LOCK TABLES `Showtimes` WRITE;
/*!40000 ALTER TABLE `Showtimes` DISABLE KEYS */;
INSERT INTO `Showtimes` (`showtimeID`, `movieID`, `locationID`, `date`, `startTime`) VALUES (1,1,1,'2018-02-19','9:00 P.M.\r9:00 P.M.'),(2,1,2,'2017-11-02','11:00 A.M.'),(3,1,3,'2017-01-13','2:00 P.M.'),(4,1,1,'2018-02-19','11:00 A.M.'),(5,2,1,'2017-11-02','9:00 P.M.'),(6,2,2,'2018-02-19','11:00 A.M.'),(7,2,4,'2017-11-02','2:00 P.M.'),(8,3,3,'2017-01-13','9:00 P.M.'),(9,3,4,'2017-11-02','2:00 P.M.'),(10,3,5,'2018-02-19','11:00 A.M.'),(11,4,6,'2017-01-13','9:00 P.M.'),(12,4,7,'2017-01-13','2:00 P.M.'),(13,4,8,'2017-11-02','2:00 P.M.'),(14,5,8,'2018-02-19','11:00 A.M.'),(15,6,7,'2017-01-13','9:00 P.M.'),(16,7,5,'2017-11-02','2:00 P.M.'),(17,7,4,'2018-02-19','11:00 A.M.'),(18,7,3,'2017-01-13','9:00 P.M.'),(19,8,2,'2017-11-02','2:00 P.M.'),(20,8,1,'2018-02-19','11:00 A.M.'),(21,8,1,'2017-01-13','9:00 P.M.'),(22,9,2,'2017-01-13','2:00 P.M.'),(23,9,3,'2017-01-13','11:00 A.M.'),(24,10,4,'2017-01-13','9:00 P.M.'),(25,11,4,'2018-02-19','2:00 P.M.'),(26,11,5,'2017-11-02','9:00 P.M.'),(27,12,6,'2017-01-13','11:00 A.M.'),(28,12,6,'2018-02-19','2:00 P.M.'),(29,13,7,'2017-11-02','11:00 A.M.'),(30,14,8,'2018-02-19','9:00 P.M.'),(31,15,8,'2017-01-13','11:00 A.M.'),(32,15,5,'2017-11-02','9:00 P.M.'),(33,16,5,'2018-02-19','11:00 A.M.'),(34,17,3,'2018-02-19','9:00 P.M.');
/*!40000 ALTER TABLE `Showtimes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 18:09:20
