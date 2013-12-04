CREATE DATABASE  IF NOT EXISTS `promotionsystem` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `promotionsystem`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: promotionsystem
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Other');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotions`
--

DROP TABLE IF EXISTS `promotions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotions` (
  `PromotionID` int(11) NOT NULL AUTO_INCREMENT,
  `BusinessID` int(11) NOT NULL,
  `PromotionText` text,
  `PromotionImage` text,
  `ValidFrom` date DEFAULT NULL,
  `ValidTill` date DEFAULT NULL,
  `ValidOnAllBranches` tinyint(1) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`PromotionID`,`BusinessID`),
  KEY `PromotionBusiness` (`BusinessID`),
  CONSTRAINT `PromotionBusiness` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotions`
--

LOCK TABLES `promotions` WRITE;
/*!40000 ALTER TABLE `promotions` DISABLE KEYS */;
INSERT INTO `promotions` VALUES (1,5,'Buy One Zombie and Get one free','http://leannedbaldwin.files.wordpress.com/2011/08/zombies_drawing.jpg','2013-02-02','2013-02-02',1,NULL),(6,5,'Kill one Zombie and get million Dollars.','http://www.wired.com/images_blogs/photos/uncategorized/2008/11/18/l4d1.jpg','2013-02-02','2013-02-02',0,NULL);
/*!40000 ALTER TABLE `promotions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `BranchID` int(11) NOT NULL AUTO_INCREMENT,
  `BusinessID` int(11) NOT NULL,
  `Branch Name` varchar(45) DEFAULT NULL,
  `Lat` double DEFAULT NULL,
  `Long` double DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`BranchID`,`BusinessID`),
  KEY `BusinessBranches` (`BusinessID`),
  CONSTRAINT `BusinessBranches` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
INSERT INTO `branches` VALUES (3,5,'Raccoon City Branch',14.23,34.542,'Raccoon City','9012342132'),(4,5,'Africa Branch',34.23,32.543,'Africa','2342334523'),(5,18,'ABC',24.89951640652898,67.02810287475586,'karachi','12345'),(6,18,'Alls',33.76088200086917,73.19091796875,'Islamabad','75765757'),(7,5,'Global Branch',12.43,35.53442,'World Wide','1231231'),(8,5,'Online',24.54645,34.45644,'WEB',NULL),(9,5,'Virtual Branch',65.242342,76.4234234,'Every where','23423423'),(10,5,'Universal',23.4534,23.6534534,'In every Galaxy','42342342'),(11,18,'Pakistan Branch HQ',33.678639851675555,73.037109375,'Islamabad','234682734'),(12,18,'Machar Colony Branch',24.86151853356795,66.9891357421875,'Karachi','438729'),(13,5,'Australia HQ',51.590722643120145,-3.01025390625,'Australia','234283472'),(14,5,'UnderGround Branch',-1.790479998207114,-55.1129150390625,'Amazon','0900909090');
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) DEFAULT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `City` varchar(45) DEFAULT NULL,
  `fb AccessToken` varchar(45) DEFAULT NULL,
  `Gplus` varchar(45) DEFAULT NULL,
  `Twitter` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Abdullah','Pakistan','Karachi',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `Business ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Lat` double DEFAULT NULL,
  `Long` double DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `WebAddress` varchar(45) DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `fb Address` varchar(45) DEFAULT NULL,
  `has branches` tinyint(1) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Type` varchar(45) DEFAULT NULL,
  `Tags` text,
  PRIMARY KEY (`Business ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (5,'Umberella Corp',NULL,NULL,NULL,'u@c.com',NULL,NULL,NULL,NULL,NULL,'12345',NULL,NULL),(6,'Chaudry',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(7,'ChaudryAndCo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL),(8,'khkh',NULL,NULL,'kjhk',NULL,'hk',NULL,'hkhk',NULL,NULL,NULL,NULL,NULL),(9,'',NULL,NULL,'',NULL,'','karachi','',NULL,NULL,NULL,NULL,NULL),(10,'Gutter Baghecha',NULL,NULL,'',NULL,'','karachi','',NULL,NULL,NULL,NULL,NULL),(11,'ABC',24.367113562651262,70.048828125,'',NULL,'','karachi','',NULL,NULL,NULL,NULL,NULL),(12,'Karachi Airport',24.89951640652898,67.15805053710938,'114',NULL,'karachiairport.com.pk','karachi','fb.com/khiair',NULL,NULL,NULL,NULL,NULL),(13,'Lahore Airport',31.517678781287177,74.40628051757812,'114',NULL,'Lahoreairport.com','Lahore Airport','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(14,'Lahore Airport',33.62376800118811,73.026123046875,'114',NULL,'Lahoreairport.com','Islamabad','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(15,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(16,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(17,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(18,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(19,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(20,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(21,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(22,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL),(23,'Lahore Airport',40.63896734381723,-74.0753173828125,'114',NULL,'Lahoreairport.com','New york','fb.com.lhrair',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productrating`
--

DROP TABLE IF EXISTS `productrating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productrating` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Review` text,
  PRIMARY KEY (`ProductID`,`UserID`),
  KEY `ProductRating` (`ProductID`),
  KEY `UserProductRating` (`UserID`),
  CONSTRAINT `ProductRating` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `UserProductRating` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productrating`
--

LOCK TABLES `productrating` WRITE;
/*!40000 ALTER TABLE `productrating` DISABLE KEYS */;
INSERT INTO `productrating` VALUES (7,1,10,'They make good zombies');
/*!40000 ALTER TABLE `productrating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotionavailability`
--

DROP TABLE IF EXISTS `promotionavailability`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotionavailability` (
  `PromotionID` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  PRIMARY KEY (`PromotionID`,`BranchID`),
  KEY `PromotionBranches` (`BranchID`),
  CONSTRAINT `PromotionBranches` FOREIGN KEY (`BranchID`) REFERENCES `branches` (`BranchID`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotionavailability`
--

LOCK TABLES `promotionavailability` WRITE;
/*!40000 ALTER TABLE `promotionavailability` DISABLE KEYS */;
INSERT INTO `promotionavailability` VALUES (6,3);
/*!40000 ALTER TABLE `promotionavailability` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `businesstypes`
--

DROP TABLE IF EXISTS `businesstypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `businesstypes` (
  `Types` varchar(45) NOT NULL,
  PRIMARY KEY (`Types`),
  UNIQUE KEY `Types_UNIQUE` (`Types`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `businesstypes`
--

LOCK TABLES `businesstypes` WRITE;
/*!40000 ALTER TABLE `businesstypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `businesstypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placerating`
--

DROP TABLE IF EXISTS `placerating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placerating` (
  `UserID` int(11) NOT NULL,
  `BusinessID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Review` text,
  PRIMARY KEY (`UserID`,`BusinessID`),
  KEY `BusinessRating` (`BusinessID`),
  KEY `UserPlaceRating` (`UserID`),
  CONSTRAINT `BusinessRating` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `UserPlaceRating` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placerating`
--

LOCK TABLES `placerating` WRITE;
/*!40000 ALTER TABLE `placerating` DISABLE KEYS */;
INSERT INTO `placerating` VALUES (1,5,10,'They make good zombies');
/*!40000 ALTER TABLE `placerating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `BusinessID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `ProductName` varchar(45) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `Availability` tinyint(1) NOT NULL DEFAULT '1',
  `Rating` int(11) DEFAULT NULL,
  `ProductDescription` text,
  `ImgPath` text,
  PRIMARY KEY (`ProductID`),
  KEY `BusinessProducts` (`BusinessID`),
  KEY `CategoryProducts` (`CategoryID`),
  CONSTRAINT `BusinessProducts` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `CategoryProducts` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (7,5,1,'Zombie Gas','10000',1,4,NULL,'http://img.costumecraze.com/images/vendors/funworld/93213SL-Silver-Bio-Zombie-Gas-Mask-large.jpg'),(8,5,1,'Zombie Killer Guns','5000',1,3,NULL,'http://farm8.staticflickr.com/7158/6730535901_f9044900e7_b.jpg'),(9,5,1,'Zombie Killing Grenades','300',1,NULL,'Kills Zombies for 5 mins',NULL),(10,5,1,'Zombie Killing Grenades','300',1,NULL,'Kills Zombies for 5 mins',NULL),(11,5,1,'Zombie infection','300',1,NULL,'Turns humans into zombies',NULL),(12,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(13,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(14,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(15,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(16,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(17,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(18,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(19,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(20,5,1,'Zombie Itching Powder','48',1,NULL,'It will itch zombies to 5 minute death',NULL),(21,5,1,'Zombie Bite Cure','500',1,NULL,'',NULL),(22,5,1,'Zombie Bite Cure','500',1,NULL,'',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotionrating`
--

DROP TABLE IF EXISTS `promotionrating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotionrating` (
  `PromotionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Review` text,
  PRIMARY KEY (`PromotionID`,`UserID`),
  KEY `Promotion` (`PromotionID`),
  KEY `USer` (`UserID`),
  CONSTRAINT `Promotion` FOREIGN KEY (`PromotionID`) REFERENCES `promotions` (`PromotionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `USer` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotionrating`
--

LOCK TABLES `promotionrating` WRITE;
/*!40000 ALTER TABLE `promotionrating` DISABLE KEYS */;
INSERT INTO `promotionrating` VALUES (1,1,10,'They make good zombies');
/*!40000 ALTER TABLE `promotionrating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producttags`
--

DROP TABLE IF EXISTS `producttags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producttags` (
  `ProductID` int(11) NOT NULL,
  `Tag` varchar(45) NOT NULL,
  PRIMARY KEY (`ProductID`,`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producttags`
--

LOCK TABLES `producttags` WRITE;
/*!40000 ALTER TABLE `producttags` DISABLE KEYS */;
INSERT INTO `producttags` VALUES (7,'Cure'),(7,'Human Zombies'),(7,'itch'),(7,'Turn Human Into Zombies'),(7,'zombie killer');
/*!40000 ALTER TABLE `producttags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `Tag` varchar(45) NOT NULL,
  PRIMARY KEY (`Tag`),
  UNIQUE KEY `Tag_UNIQUE` (`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'promotionsystem'
--
/*!50003 DROP PROCEDURE IF EXISTS `AddBranches` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddBranches`(In BusinessID int,in branchname varchar(45) ,in Lat double, in Lng double,in Address text,in Phone varchar(45))
BEGIN
INSERT INTO `branches`(`BusinessID`, `Branch Name`, `Lat`, `Long`, `Address`, `Phone`) VALUES (BusinessID,branchname,Lat,Lng,Address,Phone);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddBusiness` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddBusiness`(IN PName varchar(45), IN PLat Double , In PLng Double, IN PPhone varchar(45), IN PEmail varchar(45), In WebAddress varchar(45), In PAddress Text, in Pfb varchar(45), IN PhasBranches BOOL)
BEGIN
INSERT INTO `business`(`Name`, `Lat`, `Long`, `Phone`, `Email`, `WebAddress`, `Address`, `fb Address`, `has branches`) VALUES (PName,PLat,PLng,PPhone,PEmail,WebAddress,PAddress,Pfb,PhasBranches);
select `Business ID` as 'ID' from business order by `Business ID` desc limit 1;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddCategory` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddCategory`(in CategoryID int, in CatNAme varchar(45))
BEGIN
insert into Category(CategoryID,CategoryName) Values(CategoryID,CatNAme);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddProduct`(in BusinessId int,in ProductName varchar(45),in Price decimal,in Description Text)
BEGIN
INSERT INTO `products`( `BusinessID`, `CategoryID`, `ProductName`, `Price`,`ProductDescription`) VALUES (BusinessId,1,ProductName ,Price,Description);
select `ProductID` from products order by `BusinessID` desc limit 1;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddPromotion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddPromotion`( in Businessid int,in PromotionText text,in Image varchar(45),in Validfrom date, in ValidTill date,in ValidOnAllBranches bool)
BEGIN
INSERT INTO `promotions`(`BusinessID`, `PromotionText`, `PromotionImage`, `ValidFrom`, `ValidTill`, `ValidOnAllBranches`) VALUES ( Businessid ,PromotionText ,Image,Validfrom, ValidTill,ValidOnAllBranches);
Select PromotionID from promotions order by PromotionID desc limit 1;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddPromotionBranches` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddPromotionBranches`(in PromotionID int,in BusinessID int)
BEGIN
Insert into promotionavailability(PromotionID,BranchID) Values(PromotionID,BusinessID);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddTags` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddTags`(in ProductID int, in Tag varchar(45))
BEGIN
Insert into producttags(`ProductID`,`Tag`) Values(ProductID,Tag);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AddUser` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `AddUser`( in UserName varchar(45), in Country varchar(45), in City varchar(45), in fb varchar(100),in Gplus varchar(100) , in Twitter varchar(100))
BEGIN
INSERT INTO `users`(`UserName`, `Country`, `City`, `fb AccessToken`, `Gplus`, `Twitter`) VALUES (UserName , Country ,  City , fb ,Gplus , Twitter);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BusinessLoginService` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `BusinessLoginService`(in email varchar(100),
in password varchar(45))
BEGIN

Select Count(*),business.`business ID`,business.Name from business where business.Email
= email and business.Password = password;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetBranches` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `GetBranches`(in businessID int)
BEGIN

Select *from branches where branches.BusinessID = businessID;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetProducts` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `GetProducts`(In businessID int)
BEGIN

Select *from Products where BusinessID = businessID;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetPromotions` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `GetPromotions`(in businessID int)
BEGIN

Select * from promotions where BusinessID = businessID;

END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RatePlace` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `RatePlace`(in UserID int,in BusinessID int,in Rating int,in Review Text )
BEGIN
INSERT INTO `placerating`(`UserID`, `BusinessID`, `Rating`, `Review`) VALUES (UserID ,BusinessID ,Rating ,Review );
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RateProduct` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `RateProduct`(in UserID int,in BusinessID int,in Rating int,in Review Text )
BEGIN
INSERT INTO `productrating`(`UserID`, `ProductID`, `Rating`, `Review`) VALUES (UserID ,BusinessID ,Rating ,Review );
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `RatePromotion` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50020 DEFINER=`root`@`localhost`*/ /*!50003 PROCEDURE `RatePromotion`(in UserID int,in BusinessID int,in Rating int,in Review Text )
BEGIN
INSERT INTO `promotionrating`(`UserID`, `PromotionID`, `Rating`, `Review`) VALUES (UserID ,BusinessID ,Rating ,Review );
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-22 20:20:02
