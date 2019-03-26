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
-- Table structure for table `Actors`
--

DROP TABLE IF EXISTS `Actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Actors` (
  `actorID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  PRIMARY KEY (`actorID`),
  UNIQUE KEY `actorID_UNIQUE` (`actorID`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Actors`
--

LOCK TABLES `Actors` WRITE;
/*!40000 ALTER TABLE `Actors` DISABLE KEYS */;
INSERT INTO `Actors` (`actorID`, `firstName`, `lastName`, `birthDate`, `nationality`, `height`) VALUES (1,'Vin','Diesel','1967-07-18','American',0),(2,'Paul','Walker','1973-09-12','American',0),(3,'Tyrese','Gibson','1978-12-30','American',0),(4,'Dwayne','Johnson','1972-05-02','American',0),(5,'Kevin','Hart','1979-07-06','American',0),(6,'Will','Ferrell','1967-07-16','American',0),(7,'John C.','Reilly','1965-05-24','American',0),(8,'Leonardo','DiCaprio','1974-11-11','American',0),(9,'Jonah','Hill','1983-12-20','American',0),(10,'Michael','Cera','1988-06-07','Canadian',0),(11,'Channing','Tatum','1980-04-26','American',0),(12,'Chris','Hemsworth','1983-11-11','Australian',0),(13,'Elsa','Pataky','1976-07-18','Spanish',0),(14,'Robert','Downey Jr.','1965-04-04','American',0),(15,'Natalie','Portman','1981-06-09','Israeli',0),(16,'Patrick','Wilson','1973-07-03','American',0),(17,'Vera','Farmiga','1973-08-06','American',0),(18,'Mandy','Moore','1984-04-10','American',0),(19,'Claire','Holt','1988-06-11','Australian',0),(20,'Eric','Stonestreet','1971-09-10','American',0),(46,'Jennifer ','Aniston','2018-02-21','American',NULL),(47,'Tim','McGraw','1984-02-15','American',NULL);
/*!40000 ALTER TABLE `Actors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 18:09:13
