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
-- Table structure for table `ActorsToMovies`
--

DROP TABLE IF EXISTS `ActorsToMovies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ActorsToMovies` (
  `actorID` int(11) NOT NULL,
  `movieID` int(11) DEFAULT NULL,
  KEY `movieID_idx2` (`movieID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ActorsToMovies`
--

LOCK TABLES `ActorsToMovies` WRITE;
/*!40000 ALTER TABLE `ActorsToMovies` DISABLE KEYS */;
INSERT INTO `ActorsToMovies` (`actorID`, `movieID`) VALUES (2,1),(2,2),(3,2),(4,3),(4,4),(5,4),(5,5),(6,6),(7,6),(5,7),(4,7),(8,8),(9,8),(9,9),(19,9),(9,10),(11,10),(9,11),(11,11),(12,12),(13,12),(12,13),(14,13),(12,14),(15,14),(16,15),(17,15),(18,16),(19,16),(5,17),(1,1),(1,3),(20,17),(46,6),(47,1),(47,3);
/*!40000 ALTER TABLE `ActorsToMovies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 18:09:18
