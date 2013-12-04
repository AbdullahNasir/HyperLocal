-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2013 at 08:46 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `promotionsystem`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddBranches`(In BusinessID int,in branchname varchar(45) ,in Lat double, in Lng double,in Address text,in Phone varchar(45))
BEGIN
INSERT INTO `branches`(`BusinessID`, `Branch Name`, `Lat`, `Long`, `Address`, `Phone`) VALUES (BusinessID,branchname,Lat,Lng,Address,Phone);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddBusiness`(IN PName varchar(45), IN PLat Double , In PLng Double, IN PPhone varchar(45), IN PEmail varchar(45), In WebAddress varchar(45), In PAddress Text, in Pfb varchar(45), IN Ppassword varchar(45))
BEGIN
INSERT INTO `business`(`Name`, `Lat`, `Long`, `Phone`, `Email`, `WebAddress`, `Address`, `fb Address`, `Password`) VALUES (PName,PLat,PLng,PPhone,PEmail,WebAddress,PAddress,Pfb,Ppassword);
select `Business ID` as 'ID' from business order by `Business ID` desc limit 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddCategory`(in CategoryID int, in CatNAme varchar(45))
BEGIN
insert into Category(CategoryID,CategoryName) Values(CategoryID,CatNAme);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddProduct`(in BusinessId int,in ProductName varchar(45),in Price decimal,in Description Text)
BEGIN
INSERT INTO `products`( `BusinessID`, `CategoryID`, `ProductName`, `Price`,`ProductDescription`) VALUES (BusinessId,1,ProductName ,Price,Description);
select `ProductID` from products order by `BusinessID` desc limit 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPromotion`( in Businessid int,in PromotionText text,in Image varchar(45),in Validfrom date, in ValidTill date,in PromotionDescription text)
BEGIN
INSERT INTO `promotions`(`BusinessID`, `PromotionText`, `PromotionImage`, `ValidFrom`, `ValidTill`,`PromotionDescription`) VALUES ( Businessid ,PromotionText ,Image, Validfrom, ValidTill, PromotionDescription);
Select PromotionID from promotions order by PromotionID desc limit 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPromotionBranches`(in Promotion_ID int,in Branch_ID int)
BEGIN
Insert into promotionavailability(PromotionID,BranchID) Values(Promotion_ID,Branch_ID);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPromotionTags`(in Promotion_ID int, in Tag varchar(45))
BEGIN
insert into promotionsystem.promotiontags (`PromotionID`,`Tag`) values (Promotion_ID,Tag);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddTags`(in ProductID int, in Tag varchar(45))
BEGIN
Insert into producttags(`ProductID`,`Tag`) Values(ProductID,Tag);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddUser`( in UserName varchar(45), in Country varchar(45), in City varchar(45), in fb varchar(100),in Gplus varchar(100) , in Twitter varchar(100))
BEGIN
INSERT INTO `users`(`UserName`, `Country`, `City`, `fb AccessToken`, `Gplus`, `Twitter`) VALUES (UserName , Country ,  City , fb ,Gplus , Twitter);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BusinessLoginService`(in email varchar(100),
in password varchar(45))
BEGIN
 
Select Count(*),business.`business ID`,business.Name from business where business.Email
= email and business.Password = password;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteBranch`(branch_id int)
BEGIN
 
delete from promotionsystem.branches where BranchID=branch_id;
 
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteProduct`(product_id int)
BEGIN
 
delete from promotionsystem.producttags where productid=product_id;
delete from promotionsystem.productrating where productid=product_id;
delete from promotionsystem.products where productid=product_id;
 
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeletePromotion`(promotion_id int)
BEGIN
 
delete from promotionsystem.promotiontags where promotionID=promotion_id;
delete from promotionsystem.promotionrating where promotionID=promotion_id;
delete from promotionsystem.promotionavailability where promotionID= promotion_id;
delete from promotionsystem.promotions where promotionID=promotion_id;
 
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetBranches`(in businessID int)
BEGIN
 
Select *from branches where branches.BusinessID = businessID;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetNearByPlaces`(IN `plat` DOUBLE, IN `plng` DOUBLE)
    NO SQL
SELECT `Business ID` as 'BusinessID',
Name,Address, concat(round(( 6371 * acos( cos( radians(plat) )
* cos( radians( Lat ) ) * cos( radians( `Long` )
- radians(plng) ) + sin( radians(plat) )
* sin( radians( Lat ) ) ) )),'km')
AS distance FROM business HAVING distance
< 100 ORDER BY distance$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetOwnRating`(IN `PProductID` INT, IN `PUserID` INT)
    NO SQL
BEGIN
DECLARE OwnRate int;
Set OwnRate = (Select count(*) from productrating
where UserID = PUserID and ProductID = PProductID);

if (OwnRate = 0) then

Select 'false' as 'OwnRate';

else

Select Rating,Review,(Select 'true' ) as 'OwnRate' from productrating where UserID = PUserID and ProductID = PProductID;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetOwnRatingPromotion`(IN `PPromotionID` INT, IN `PUserID` INT)
    NO SQL
BEGIN
DECLARE OwnRate int;
Set OwnRate = (Select count(*) from promotionrating
where UserID = PUserID and PromotionID = PPromotionID);

if (OwnRate = 0) then

Select 'false' as 'OwnRate';

else

Select Rating,Review,(Select 'true' ) as 'OwnRate' from promotionrating where UserID = PUserID and PromotionID = PPromotionID;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProductDetails`(IN `productid` INT)
    NO SQL
BEGIN
Select * from products where ProductID = 5;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetProducts`(In businessID int)
BEGIN
 
Select *from Products where Products.BusinessID = businessID;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPromotions`(in businessID int)
BEGIN
 
Select * from promotions where promotions.BusinessID = businessID;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RatePlace`(IN `UserID` INT, IN `BusinessID` INT, IN `Rating` INT, IN `Review` TEXT)
BEGIN
INSERT INTO `placerating`(`UserID`, `BusinessID`, `Rating`, `Review`) VALUES (UserID ,BusinessID ,Rating ,Review );
Update products Set 
Rating=(Select (Select Sum(Rating) 
from productrating where `ProductID` = 
BusinessID)/(Select Count(*)
from productrating where ProductID =BusinessID));
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RateProduct`(IN `UserID` INT, IN `BusinessID` INT, IN `Rating` INT, IN `Review` TEXT)
BEGIN
INSERT INTO `productrating`(`UserID`, `ProductID`, `Rating`, `Review`) VALUES (UserID ,BusinessID ,Rating ,Review );
Update products Set 
Rating=(Select (Select Sum(Rating) 
from productrating where `ProductID` = BusinessID)/(Select Count(*)
from productrating where ProductID =BusinessID)) where ProductID=BusinessID;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RatePromotion`(IN `UserID` INT, IN `BusinessID` INT, IN `Rating` INT, IN `Review` TEXT)
    DETERMINISTIC
BEGIN
INSERT INTO `promotionrating`(`UserID`, `PromotionID`, `Rating`, `Review`) VALUES (UserID ,BusinessID ,Rating ,Review );
Update promotions Set 
Rating=(Select (Select Sum(Rating) 
from promotionrating where `PromotionID` = BusinessID)/(Select Count(*)
from promotionrating where `PromotionID` =BusinessID)) where PromotionID=BusinessID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `BranchID` int(11) NOT NULL AUTO_INCREMENT,
  `BusinessID` int(11) NOT NULL,
  `Branch Name` varchar(45) DEFAULT NULL,
  `Lat` double DEFAULT NULL,
  `Long` double DEFAULT NULL,
  `Address` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`BranchID`,`BusinessID`),
  KEY `BusinessBranches` (`BusinessID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`BranchID`, `BusinessID`, `Branch Name`, `Lat`, `Long`, `Address`, `Phone`) VALUES
(5, 18, 'ABC', 24.89951640652898, 67.02810287475586, 'karachi', '12345'),
(6, 18, 'Alls', 33.76088200086917, 73.19091796875, 'Islamabad', '75765757'),
(7, 5, 'Global Branch', 12.43, 35.53442, 'World Wide', '1231231'),
(8, 5, 'Online', 24.54645, 34.45644, 'WEB', NULL),
(9, 5, 'Virtual Branch', 65.242342, 76.4234234, 'Every where', '23423423'),
(10, 5, 'Universal', 23.4534, 23.6534534, 'In every Galaxy', '42342342'),
(11, 18, 'Pakistan Branch HQ', 33.678639851675555, 73.037109375, 'Islamabad', '234682734'),
(12, 18, 'Machar Colony Branch', 24.86151853356795, 66.9891357421875, 'Karachi', '438729'),
(13, 5, 'Australia HQ', 51.590722643120145, -3.01025390625, 'Australia', '234283472'),
(14, 5, 'UnderGround Branch', -1.790479998207114, -55.1129150390625, 'Amazon', '0900909090'),
(15, 5, 'hello world', 31.44741029142872, 74.59716796875, 'Lahore Airport', '87687686'),
(16, 5, 'khuber branch', 31.672083485607402, 74.2620849609375, 'Lahore Airport', '346728'),
(17, 5, 'EcoSystem', 24.94123829939631, 66.9342041015625, 'Karachi Airport', '979'),
(18, 26, 'Pakistan Branch', 24.891419479211137, 67.005615234375, 'A-245 BLock 3 Gulshan Iqbal Karachi', '13453'),
(19, 28, 'Microsoft HQ Redmond', 24.824132181788887, 67.03857421875, 'Karachi Pakistan', '5235431');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`Business ID`, `Name`, `Lat`, `Long`, `Phone`, `Email`, `WebAddress`, `Address`, `fb Address`, `has branches`, `Rating`, `Password`, `Type`, `Tags`) VALUES
(5, 'Umberella Corp', NULL, NULL, NULL, 'u@c.com', NULL, NULL, NULL, NULL, NULL, 'ponka', NULL, NULL),
(6, 'Chaudry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(7, 'ChaudryAndCo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL),
(8, 'khkh', NULL, NULL, 'kjhk', NULL, 'hk', NULL, 'hkhk', NULL, NULL, NULL, NULL, NULL),
(9, '', NULL, NULL, '', NULL, '', 'karachi', '', NULL, NULL, NULL, NULL, NULL),
(10, 'Gutter Baghecha', NULL, NULL, '', NULL, '', 'karachi', '', NULL, NULL, NULL, NULL, NULL),
(11, 'ABC', 24.367113562651262, 70.048828125, '', NULL, '', 'karachi', '', NULL, NULL, NULL, NULL, NULL),
(12, 'Karachi Airport', 24.89951640652898, 67.15805053710938, '114', NULL, 'karachiairport.com.pk', 'karachi', 'fb.com/khiair', NULL, NULL, NULL, NULL, NULL),
(13, 'Lahore Airport', 31.517678781287177, 74.40628051757812, '114', NULL, 'Lahoreairport.com', 'Lahore Airport', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(14, 'Lahore Airport', 33.62376800118811, 73.026123046875, '114', NULL, 'Lahoreairport.com', 'Islamabad', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(15, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(16, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(17, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(18, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(19, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(20, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(21, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(22, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(23, 'Lahore Airport', 40.63896734381723, -74.0753173828125, '114', NULL, 'Lahoreairport.com', 'New york', 'fb.com.lhrair', NULL, NULL, NULL, NULL, NULL),
(24, 'Pakistan1', 33.77458136371689, -88.4564208984375, '878384', 'p@q.com', 'www.abc.com', 'None', 'www.abc.com/abc', NULL, NULL, NULL, NULL, NULL),
(25, 'bang company', 29.128171782816224, -81.6558837890625, '8676', 'b@a.com', 'www.abc.com', 'Amazon Jungle', 'www.abc.com/abc', NULL, NULL, 'null', NULL, NULL),
(26, 'dang company', -2.3559032430952285, -55.2557373046875, '8676', 't@t.com', 'www.abc.com', 'Amazon', 'www.abc.com/abc', NULL, NULL, '12345', NULL, NULL),
(27, 'Best Company Ever', 29.214507763499352, -81.1944580078125, '13215', 'best@best.com', 'www.abc.com', 'Amazon Jungle', 'www.abc.com/abc', NULL, NULL, 'ponka', NULL, NULL),
(28, 'Hyper Mart', 36.83367605747156, -119.9432373046875, '23123123', 'hyper@mart.com', 'www.hyper.mart.com', 'CA', 'facebook.com/mart', NULL, NULL, '123456', NULL, NULL),
(29, 'Chase up', 24.87760871114087, 67.0691728591919, '021111111626', 'Chaseup@chase.com', 'Chaseup.com', 'Shaheed Millat Road karachi', 'facebook.com/chaseup', NULL, NULL, '12345', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `businesstypes`
--

CREATE TABLE IF NOT EXISTS `businesstypes` (
  `Types` varchar(45) NOT NULL,
  PRIMARY KEY (`Types`),
  UNIQUE KEY `Types_UNIQUE` (`Types`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `placerating`
--

CREATE TABLE IF NOT EXISTS `placerating` (
  `UserID` int(11) NOT NULL,
  `BusinessID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Review` text,
  PRIMARY KEY (`UserID`,`BusinessID`),
  KEY `BusinessRating` (`BusinessID`),
  KEY `UserPlaceRating` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placerating`
--

INSERT INTO `placerating` (`UserID`, `BusinessID`, `Rating`, `Review`) VALUES
(1, 5, 10, 'They make good zombies');

-- --------------------------------------------------------

--
-- Table structure for table `productrating`
--

CREATE TABLE IF NOT EXISTS `productrating` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` float DEFAULT NULL,
  `Review` text,
  PRIMARY KEY (`ProductID`,`UserID`),
  KEY `ProductRating` (`ProductID`),
  KEY `UserProductRating` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productrating`
--

INSERT INTO `productrating` (`ProductID`, `UserID`, `Rating`, `Review`) VALUES
(10, 1, 4, 'Very Nice'),
(500, 1, 4, 'Awesome');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `BusinessID` int(11) NOT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `ProductName` varchar(45) DEFAULT NULL,
  `Price` varchar(45) DEFAULT NULL,
  `Availability` tinyint(1) NOT NULL DEFAULT '1',
  `Rating` float DEFAULT NULL,
  `ProductDescription` text,
  `ImgPath` text,
  PRIMARY KEY (`ProductID`),
  KEY `BusinessProducts` (`BusinessID`),
  KEY `CategoryProducts` (`CategoryID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=501 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ProductID`, `BusinessID`, `CategoryID`, `ProductName`, `Price`, `Availability`, `Rating`, `ProductDescription`, `ImgPath`) VALUES
(10, 5, 1, 'Zombie Killing Grenades', '300', 1, 4, 'Cupcake ipsum dolor sit. Amet tootsie roll I love. I love I love marzipan bonbon jelly beans croissant sesame snaps sugar plum. Jelly-o I love sugar plum chupa chups cake.', NULL),
(14, 5, 1, 'Zombie Itching Powder', '48', 1, 3, 'Cupcake ipsum dolor sit. Amet tootsie roll I love. I love I love marzipan bonbon jelly beans croissant sesame snaps sugar plum. Jelly-o I love sugar plum chupa chups cake.', NULL),
(21, 5, 1, 'Russian Salad', '500', 1, NULL, 'Good Product', NULL),
(22, 26, 1, 'Champoo Product', '4678', 1, NULL, 'Champoo Product 1', NULL),
(23, 28, 1, 'Italian Salad', '435', 1, NULL, 'Awesome salad', NULL),
(500, 12, 1, 'Airbus A380', '500000000', 1, 4, 'Enormously Huge Airplane', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `producttags`
--

CREATE TABLE IF NOT EXISTS `producttags` (
  `ProductID` int(11) NOT NULL,
  `Tag` varchar(45) NOT NULL,
  PRIMARY KEY (`ProductID`,`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttags`
--

INSERT INTO `producttags` (`ProductID`, `Tag`) VALUES
(10, 'Abc'),
(10, 'Abcd'),
(10, 'Asdasd'),
(10, 'Awesome'),
(10, 'Awesome salad'),
(10, 'Super cool');

-- --------------------------------------------------------

--
-- Table structure for table `promotionavailability`
--

CREATE TABLE IF NOT EXISTS `promotionavailability` (
  `PromotionID` int(11) NOT NULL,
  `BranchID` int(11) NOT NULL,
  PRIMARY KEY (`PromotionID`,`BranchID`),
  KEY `PromotionBranches` (`BranchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotionavailability`
--

INSERT INTO `promotionavailability` (`PromotionID`, `BranchID`) VALUES
(0, 7),
(12, 7),
(0, 9),
(12, 9),
(19, 9),
(21, 9),
(0, 10),
(22, 18);

-- --------------------------------------------------------

--
-- Table structure for table `promotionrating`
--

CREATE TABLE IF NOT EXISTS `promotionrating` (
  `PromotionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Review` text,
  PRIMARY KEY (`PromotionID`,`UserID`),
  KEY `Promotion` (`PromotionID`),
  KEY `USer` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotionrating`
--

INSERT INTO `promotionrating` (`PromotionID`, `UserID`, `Rating`, `Review`) VALUES
(50, 1, 5, 'Amazing Discounts');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE IF NOT EXISTS `promotions` (
  `PromotionID` int(11) NOT NULL AUTO_INCREMENT,
  `BusinessID` int(11) NOT NULL,
  `PromotionText` text,
  `PromotionImage` text,
  `ValidFrom` date DEFAULT NULL,
  `ValidTill` date DEFAULT NULL,
  `ValidOnAllBranches` tinyint(1) DEFAULT NULL,
  `Rating` int(11) DEFAULT NULL,
  `PromotionDescription` text,
  PRIMARY KEY (`PromotionID`,`BusinessID`),
  KEY `PromotionBusiness` (`BusinessID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`PromotionID`, `BusinessID`, `PromotionText`, `PromotionImage`, `ValidFrom`, `ValidTill`, `ValidOnAllBranches`, `Rating`, `PromotionDescription`) VALUES
(8, 5, 'asd', NULL, '0000-00-00', '0000-00-00', NULL, 4, NULL),
(12, 5, 'Hello World', NULL, '0000-00-00', '0000-00-00', NULL, 4, 'asd'),
(19, 5, 'dasdas', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 'dasda'),
(21, 5, 'what the fuck', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 'what the f'),
(22, 26, 'New Promotion', NULL, '0000-00-00', '0000-00-00', NULL, NULL, 'New One'),
(50, 12, 'Buy 1 Get 1 Free', NULL, NULL, NULL, 1, 5, 'Buy one ticket get another ticket free');

-- --------------------------------------------------------

--
-- Table structure for table `promotiontags`
--

CREATE TABLE IF NOT EXISTS `promotiontags` (
  `PromotionID` int(11) NOT NULL,
  `Tag` varchar(45) NOT NULL,
  PRIMARY KEY (`PromotionID`,`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotiontags`
--

INSERT INTO `promotiontags` (`PromotionID`, `Tag`) VALUES
(12, 'asda'),
(19, 'asdas'),
(21, 'asdasd'),
(22, 'vergood');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `Tag` varchar(45) NOT NULL,
  PRIMARY KEY (`Tag`),
  UNIQUE KEY `Tag_UNIQUE` (`Tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(45) DEFAULT NULL,
  `Email` varchar(200) NOT NULL,
  `Country` varchar(45) DEFAULT NULL,
  `Password` varchar(50) NOT NULL,
  `City` varchar(45) DEFAULT NULL,
  `fb AccessToken` varchar(45) DEFAULT NULL,
  `Gplus` varchar(45) DEFAULT NULL,
  `Twitter` varchar(45) DEFAULT NULL,
  `UserImgPath` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Email`, `Country`, `Password`, `City`, `fb AccessToken`, `Gplus`, `Twitter`, `UserImgPath`) VALUES
(1, 'Abdullah', '', 'Pakistan', '0', 'Karachi', NULL, NULL, NULL, ''),
(2, 'Mudasir', 'm@m.com', 'Pakistan', '12345', 'Karachi', NULL, NULL, NULL, NULL),
(3, 'abc', 'abdullah555@yahoo.com', 'Pakistan', '12345', 'Karachi', NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `BusinessBranches` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `placerating`
--
ALTER TABLE `placerating`
  ADD CONSTRAINT `BusinessRating` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UserPlaceRating` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `productrating`
--
ALTER TABLE `productrating`
  ADD CONSTRAINT `ProductRating` FOREIGN KEY (`ProductID`) REFERENCES `products` (`ProductID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UserProductRating` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `BusinessProducts` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `CategoryProducts` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON UPDATE NO ACTION;

--
-- Constraints for table `promotionavailability`
--
ALTER TABLE `promotionavailability`
  ADD CONSTRAINT `PromotionBranches` FOREIGN KEY (`BranchID`) REFERENCES `branches` (`BranchID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `promotionrating`
--
ALTER TABLE `promotionrating`
  ADD CONSTRAINT `Promotion` FOREIGN KEY (`PromotionID`) REFERENCES `promotions` (`PromotionID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `USer` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `PromotionBusiness` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
