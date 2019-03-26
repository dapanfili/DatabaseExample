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
-- Table structure for table `Nominations`
--

DROP TABLE IF EXISTS `Nominations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Nominations` (
  `nominationID` int(11) NOT NULL AUTO_INCREMENT,
  `movieID` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `result` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`nominationID`),
  KEY `movieID_idx` (`movieID`),
  KEY `movieID_idx3` (`movieID`),
  CONSTRAINT `movieID3` FOREIGN KEY (`movieID`) REFERENCES `Movies` (`movieID`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Nominations`
--

LOCK TABLES `Nominations` WRITE;
/*!40000 ALTER TABLE `Nominations` DISABLE KEYS */;
INSERT INTO `Nominations` (`nominationID`, `movieID`, `type`, `result`) VALUES (1,1,'Movie Of The Year','Won'),(2,2,'Best Music','Won'),(3,3,'Movie Of The Year','Lost'),(4,4,'Best Actors','Lost'),(5,5,'Best Music','Won'),(6,6,'Best Actors','Lost'),(7,7,'Movie Of The Year','Won'),(8,8,'Best Actors','Lost'),(9,9,'Best Music','Won'),(10,10,'Best Actors','Lost'),(11,11,'Movie Of The Year','Won'),(12,12,'Best Music','Lost'),(13,13,'Best Actors','Won'),(14,14,'Movie Of The Year','Lost'),(15,15,'Best Actors','Won'),(16,16,'Movie Of The Year','Lost'),(17,17,'Best Graphics','Won');
/*!40000 ALTER TABLE `Nominations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 18:09:16
