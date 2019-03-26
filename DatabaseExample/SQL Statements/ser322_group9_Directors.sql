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
-- Table structure for table `Directors`
--

DROP TABLE IF EXISTS `Directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Directors` (
  `directorID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `birthDate` date DEFAULT NULL,
  `nationality` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`directorID`),
  UNIQUE KEY `directorID_UNIQUE` (`directorID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Directors`
--

LOCK TABLES `Directors` WRITE;
/*!40000 ALTER TABLE `Directors` DISABLE KEYS */;
INSERT INTO `Directors` (`directorID`, `firstName`, `lastName`, `birthDate`, `nationality`) VALUES (1,'Rob','Cohen','1949-03-12','American'),(2,'John','Singleton','1968-01-06','American'),(3,'F.Gary','Gray','1969-07-16','American'),(4,'Jake','Kasdan','1974-10-28','American'),(5,'Etan','Cohen','1974-03-14','Israeli'),(6,'Adam','McKay','1968-04-17','American'),(7,'Tim','Story','1970-03-13','American'),(8,'Martin','Scorsese','1942-11-17','American'),(9,'Greg','Mottola','1964-07-11','American'),(10,'Phil','Lord','1975-07-12','American'),(11,'Nicolai','Fuglsig','1958-06-04','Italian'),(12,'Joss','Whedon','1964-06-23','American'),(13,'Kenneth','Branagh','1960-12-10','Irish'),(14,'James','Wan','1977-02-26','Malaysian'),(15,'Johannes','Roberts','1976-05-24','English'),(16,'Chris','Renaud','1964-02-28','American');
/*!40000 ALTER TABLE `Directors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-22 18:09:11
