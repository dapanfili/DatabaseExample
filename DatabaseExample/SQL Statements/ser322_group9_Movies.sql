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
-- Table structure for table `Movies`
--

DROP TABLE IF EXISTS `Movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Movies` (
  `movieID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `genreID` int(11) DEFAULT NULL,
  `directorID` int(11) DEFAULT NULL,
  `releaseDate` datetime DEFAULT NULL,
  `runTime` int(11) DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`movieID`),
  UNIQUE KEY `movieID_UNIQUE` (`movieID`),
  KEY `genreID_idx` (`genreID`),
  KEY `genreID_id` (`genreID`),
  CONSTRAINT `genreID` FOREIGN KEY (`genreID`) REFERENCES `Genres` (`genreID`) ON DELETE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Movies`
--

LOCK TABLES `Movies` WRITE;
/*!40000 ALTER TABLE `Movies` DISABLE KEYS */;
INSERT INTO `Movies` (`movieID`, `title`, `genreID`, `directorID`, `releaseDate`, `runTime`, `rating`) VALUES (1,'The Fast And Furious',1,1,'2001-06-22 00:00:00',106,'6.7'),(2,'2 Fast 2 Furious',1,2,'2003-06-06 00:00:00',107,'5.9'),(3,'Fate of the Furious',1,3,'2017-04-14 00:00:00',136,'6.7'),(4,'Jumanji',2,4,'2017-12-20 00:00:00',119,'7.2'),(5,'Get Hard',2,5,'2015-03-27 00:00:00',100,'6'),(6,'Step Brothers',2,6,'2008-07-25 00:00:00',98,'6.9'),(7,'Ride Along',2,7,'2014-01-17 00:00:00',99,'6.2'),(8,'Wolf Of Wall Street',3,8,'2013-12-25 00:00:00',180,'8.2'),(9,'Superbad',2,9,'2007-08-17 00:00:00',113,'7.6'),(10,'21 Jump Street',2,10,'2012-03-16 00:00:00',109,'7.2'),(11,'22 Jump Street',2,10,'2014-06-13 00:00:00',112,'7'),(12,'12 Strong',1,11,'2018-01-19 00:00:00',130,'7'),(13,'Avengers',1,12,'2012-05-04 00:00:00',143,'8.1'),(14,'Thor',1,13,'2011-05-06 00:00:00',115,'7'),(15,'The Conjuring',5,14,'2013-07-19 00:00:00',112,'7.5'),(16,'47 Meters Down',4,15,'2017-06-16 00:00:00',89,'5.7'),(17,'Secret Life Of Pets',6,16,'2016-07-08 00:00:00',87,'6.5');
/*!40000 ALTER TABLE `Movies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 18:09:09
