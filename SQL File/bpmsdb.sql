-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.epizy.com
-- Generation Time: Jul 14, 2022 at 04:17 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpmsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbook`
--

DROP TABLE IF EXISTS `tblbook`;
CREATE TABLE IF NOT EXISTS `tblbook` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `UserID` int(10) DEFAULT NULL,
  `AptNumber` int(10) DEFAULT NULL,
  `AptDate` date DEFAULT NULL,
  `AptTime` time DEFAULT NULL,
  `Message` mediumtext,
  `BookingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Remark` varchar(250) DEFAULT NULL,
  `Status` varchar(250) DEFAULT NULL,
  `RemarkDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblbook`
--

INSERT INTO `tblbook` (`ID`, `UserID`, `AptNumber`, `AptDate`, `AptTime`, `Message`, `BookingDate`, `Remark`, `Status`, `RemarkDate`) VALUES
(1, 7, 729411824, '2022-05-12', '19:03:00', 'Test msg', '2022-05-12 18:30:00', 'Your appointment has been booked.', 'Selected', '2022-05-13 06:11:41'),
(2, 7, 767068476, '2022-05-14', '09:00:00', 'fghfshdgfahgrfgh', '2022-05-12 18:30:00', 'Sorry your appointment has been cancelled', 'Rejected', '2022-05-13 06:14:39'),
(4, 10, 931783426, '2022-05-18', '15:40:00', 'NA', '2022-05-15 05:04:13', NULL, NULL, NULL),
(5, 10, 284544154, '2022-05-18', '15:40:00', 'NA', '2022-05-15 05:04:13', NULL, NULL, NULL),
(6, 10, 494039785, '2022-05-31', '14:47:00', 'NA', '2022-05-15 05:13:24', NULL, NULL, NULL),
(8, 10, 891247645, '2022-05-28', '20:14:00', 'nA', '2022-05-28 08:43:55', 'Your booking is confirmed.', 'Selected', '2022-05-28 08:51:22'),
(9, 11, 985654240, '2022-05-29', '13:10:00', 'NA', '2022-05-29 07:34:47', 'Your appointment is confirmed', 'Selected', '2022-05-29 07:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--
DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) DEFAULT NULL,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `Quantity` int(10) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--
DROP TABLE IF EXISTS `tblcontact`;
CREATE TABLE IF NOT EXISTS `tblcontact` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `Phone` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Message` mediumtext,
  `EnquiryDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IsRead` int(5) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`ID`, `FirstName`, `LastName`, `Phone`, `Email`, `Message`, `EnquiryDate`, `IsRead`) VALUES
(8, 'Andy', 'Gril', 9789797987, 'andythegril@gmail.com', 'Need booking for back massage', '2022-06-01 01:05:47', 1),
(9, 'Peter', 'Parker', 8979798789, 'hima@gmail.com', 'Need booking for face steamer', '2022-06-01 01:05:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblinvoice`
--
DROP TABLE IF EXISTS `tblinvoice`;
CREATE TABLE IF NOT EXISTS `tblinvoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Userid` int(11) DEFAULT NULL,
  `ServiceId` int(11) DEFAULT NULL,
  `BillingId` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblinvoice`
--

INSERT INTO `tblinvoice` (`id`, `Userid`, `ServiceId`, `BillingId`, `PostingDate`) VALUES
(4, 7, 4, 138889283, '2022-05-13 11:42:21'),
(5, 7, 9, 138889283, '2022-05-13 11:42:21'),
(6, 7, 16, 138889283, '2022-05-13 11:42:21'),
(7, 8, 3, 555850701, '2022-05-13 11:42:51'),
(8, 8, 6, 555850701, '2022-05-13 11:42:51'),
(9, 8, 9, 555850701, '2022-05-13 11:42:51'),
(10, 8, 11, 555850701, '2022-05-13 11:42:51'),
(13, 10, 1, 330026346, '2022-05-28 08:51:42'),
(14, 10, 2, 330026346, '2022-05-28 08:51:42'),
(15, 11, 2, 379060040, '2022-05-29 07:36:17'),
(16, 11, 5, 379060040, '2022-05-29 07:36:18'),
(17, 11, 6, 379060040, '2022-05-29 07:36:18'),
(18, 11, 12, 379060040, '2022-05-29 07:36:18'),
(19, 11, 3, 460087279, '2022-06-01 01:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--
DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Method` varchar(50) NOT NULL,
  `HomeNo` varchar(50) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Ward` varchar(100) NOT NULL,
  `City` varchar(100) NOT NULL,
  `Total_prod` varchar(255) NOT NULL,
  `Total_cost` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`ID`, `Name`, `Phone`, `Email`, `Method`, `HomeNo`, `Street`, `Ward`, `City`, `Total_prod`, `Total_cost`, `Date`, `Status`) VALUES
(4, 'Lexica', '1234567890', 'LexicaBeautiful@gmail.com', 'credit cart', 'abc Bakery', 'Tran Hung Dao', '5', 'Ho Chi Minh', 'Restorative Body Cream (1) , Matcha Powder (1) , Eden Lift Mask (1) ', '292', '2022-07-11 11:09:12', 'Confirmed'),
(7, 'Tran', '1234567890', 'AnhKhung@gmail.com', 'cash on delivery', 'abc Bakery', 'Tran Hung Dao', '5', 'Ho Chi Minh', 'Eden Lift Mask (1) ', '75', '2022-07-11 12:02:05', 'Confirmed'),
(8, 'meomeo', '1234842881', 'meomeo@gmail.com', 'paypal', 'abc Bakery', 'Tran Hung Dao', '5', 'meomeo', 'Eden Lift Mask (1) , Coconut Milk Bath Soak (1) , Restorative Body Cream (1) , Coffee Body Scrub (1) ', '314', '2022-07-11 13:12:46', NULL),
(13, 'Anh', '0962646239', 'dinhnguyetanh.ue@gmail.com', 'cash on delivery', '63', '63 Tráº§n Táº¥n', 'Tan Son Nhi', 'Há»“ ChÃ­ Minh', 'Restorative Body Cream (1) , Coconut Milk Bath Soak (1) , Matcha Powder (1) ', '233', '2022-07-13 02:26:17', NULL),
(14, 'Lexica', '1234567890', 'LexicaBeautiful@gmail.com', 'cash on delivery', 'abc Bakery', 'Tue Tinh', '5', 'Ho Chi Minh', 'Restorative Body Cream (1) , Coconut Milk Bath Soak (1) ', '191', '2022-07-13 02:32:03', NULL),
(15, 'Lexica', '1234567890', 'LexicaBeautiful@gmail.com', 'cash on delivery', 'abc Bakery', 'Tue Tinh', '5', 'Ho Chi Minh', 'Matcha Powder (1) , Elis Massage Oil (1) ', '107', '2022-07-13 02:34:06', NULL),
(16, 'Tran', '123456789', '111abc@gmail.com', 'cash on delivery', '10', 'Hoa Hao', '10', 'Ho Chi Minh', 'Restorative Body Cream (1) , Matcha Powder (1) ', '217', '2022-07-13 02:53:45', NULL),
(17, 'Lexica', '1234567890', 'LexicaBeautiful@gmail.com', 'cash on delivery', 'abc Bakery', 'Tue Tinh', '11', 'Ho Chi Minh', 'Restorative Body Cream (1) , Stone Diffuser (1) , Matcha Powder (1) ', '336', '2022-07-13 03:13:23', NULL),
(18, 'asblue15', '0962646239', 'dinhnguyetanh.ue@gmail.com', 'cash on delivery', '12', '63 Tráº§n Táº¥n', 'abc', 'Há»“ ChÃ­ Minh', 'Coconut Milk Bath Soak (1) ', '16', '2022-07-13 03:26:20', NULL),
(19, 'asblue15', '0962646239', 'dinhnguyetanh.ue@gmail.com', 'cash on delivery', '12', '63 Tráº§n Táº¥n', 'Tan Son Nhi', 'Há»“ ChÃ­ Minh', 'Coconut Milk Bath Soak (1) ', '16', '2022-07-13 03:29:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblpage`
--
DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` mediumtext,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `UpdationDate` date DEFAULT NULL,
  `Timing` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`, `Timing`) VALUES
(1, 'aboutus', 'About Us', '        Our primary concerns are quality and hygiene. Our SRG spa is well-equipped with cutting-edge technology and offers high-quality services. Our team is highly qualified and skilled, and we provide modern services in Skin, Hair, and Body Shaping that will provide you with a wonderful experience that will leave you feeling calm and stress-free. ', NULL, NULL, NULL, ''),
(2, 'contactus', 'Contact Us', '227 Nguyen Van Cu Street, D.5', 'info@gmail.com', 7896541236, NULL, '10:30 am to 7:30 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--
DROP TABLE IF EXISTS `tblproducts`;
CREATE TABLE IF NOT EXISTS `tblproducts` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(200) DEFAULT NULL,
  `ProductDescription` mediumtext,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`ID`, `ProductName`, `ProductDescription`, `Cost`, `Image`, `CreationDate`) VALUES
(1, 'Coconut Milk Bath Soak', 'Sprinkle in some of Coconut Bath Soak before getting in: softly scented with vanilla and coconut milk powder, it moisturizes your skin while claiming to provide relief from anxiety, anger, and restlessness.', 16, 'p1.jpg', '2022-06-24 22:37:38'),
(2, 'Restorative Body Cream', 'Packed with ingredients like shea butter, carrot extract, andiroba oil, and chestnut extract, it feels incredibly restorative. Apply to clean skin after taking a shower, then reapply throughout the day.', 175, 'p2.jpg', '2022-06-24 22:37:53'),
(3, 'Matcha Powder', 'packed with superfruit powders intended to bolster your natural glow. But it also has a collection of superfood blends and dietary supplements, featuring ingredients like turmeric, watermelon, and pineapple. ', 42, 'p3.jpg', '2022-06-24 22:37:10'),
(4, 'Eden Lift Mask', 'Ideal for most skin types and targeted at rehydrating your skin to leave it looking nice and dewy. Apply on clean skin for 15-20 minutes and then massage in any remaining serum.', 75, 'p4.jpg', '2022-06-24 22:37:34'),
(5, 'Elis Massage Oil', 'Rubbing this oil onto your wrists or temples to help you relax after staring at a screen all day. It also comes in a handy travel size, making it a useful companion.', 65, 'p5.jpg', '2022-06-24 22:37:47'),
(6, 'Stone Diffuser', 'This stone diffuser is a minimalist ceramic design that blends in nicely as a piece of home decor, but quietly emits a steady flow of essential oil-infused steam. ', 119, 'p6.jpg', '2022-06-24 22:37:01'),
(7, 'Jade Face Roller', 'Effective at reducing puffiness and helping detox your skin, it also feels soothing to apply (add a few drops of facial oil onto your skin first to help everything absorb better).', 30, 'p7.jpg', '2022-06-24 22:37:19'),
(8, 'Coffee Body Scrub', 'Made from real coffee grounds combined with safflower oil and sunflower oil, which means it not only smells delicious but its natural texture feels soothing when applying.', 48, 'p8.jpg', '2022-06-24 22:37:38'),
(9, 'Doctor Facial Steamer', 'This facial steamer is a game changer for your skin after hours spent in the dry and recycled air. The steaming process lasted around eight minutes, just enough time to feel refreshed.', 149, 'p9.jpg', '2022-06-24 22:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblservices`
--
DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE IF NOT EXISTS `tblservices` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `ServiceName` varchar(200) DEFAULT NULL,
  `ServiceDescription` mediumtext,
  `Cost` int(10) DEFAULT NULL,
  `Image` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblservices`
--

INSERT INTO `tblservices` (`ID`, `ServiceName`, `ServiceDescription`, `Cost`, `Image`, `CreationDate`) VALUES
(1, 'O3 Facial', 'A facial is a family of skin care treatments for the face, including steam, exfoliation, extraction, creams, lotions, facial masks, peels, and massage. They are normally performed in beauty salons, but are also a common spa treatment. They are used for general skin health as well as for specific skin conditions.', 1200, 'o3plus-professional-bridal-facial-kit-for-radiant-glowing-skin.jpg', '2022-05-24 22:37:38'),
(2, 'Fruit Facial', 'Fruit facials contain certain fruit acid like glycolic acid, alpha hydroxyl acid, citric acid, phenolic acid, vitamins and minerals in it. These acids are antiblemish, antiwrinkle and help your skin to exfoliate, it highly detoxifies your skin, it excretes out all the toxins and it hydrates your face', 500, 'fruit_facial.jpg', '2022-05-24 22:37:53'),
(3, 'Charcoal Facial', 'Charcoal is one of the most important elements that deep cleans, detoxifies and rejuvenates the skin! With main actives like Activated Charcoal, Cinnamon Bark Extract, Vitamin B3 & Sulfora White, VLCC Activated Bamboo Charcoal Facial Kit provides purified, balanced and glowing skin through 7-in-1 Rejuvenation. ', 1000, 'b9fb9d37bdf15a699bc071ce49baea531652852364.jpg', '2022-05-24 22:37:10'),
(4, 'Deluxe Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 500, 'efc1a80c391be252d7d777a437f868701652852477.jpg', '2022-05-24 22:37:34'),
(5, 'Deluxe Pedicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 600, '1e6ae4ada992769567b71815f124fac51652852492.jpg', '2022-05-24 22:37:47'),
(6, 'Normal Menicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 300, 'The-Dummys-Guide-To-Using-A-Manicure-Kit_OI.jpg', '2022-05-24 22:37:01'),
(7, 'Normal Pedicure', 'A luxurious treatment including a soak and moisturizing exfoliation, cuticle work, nails clipped and filed, hard skin is removed (pedicure) and a renewing mask is applied. A short massage and your nails are buffed and ready to paint.', 400, '1e6ae4ada992769567b71815f124fac51652852492.jpg', '2022-05-24 22:37:19'),
(8, 'Nail Treatment', 'A delightful treatment that includes a bath and hydrating exfoliation, cuticle manipulation, nail clipping and filing, hard skin removal (pedicure), and the application of a rejuvenating mask. After a little massage, your nails are polished and ready to paint.', 250, 'nail.jpg', '2022-05-24 22:37:38'),
(9, 'Salt Shower', 'If you love a relaxing spa-day, you probably have a pack of bath salts hiding in a drawer somewhere. With a number of different types claiming a huge array of benefits, bath salts are seemingly the answer to your everyday problem.', 550, 'salt.jpg', '2022-05-24 22:37:53'),
(10, 'Hair Removal', 'We use electrolysis. Medical electrolysis devices destroy the growth centre of the hair with chemical or heat energy. A low-level electrical current passes through the needle or probe into your skin and destroys the hair follicle.', 3999, 'hair_remove.jpg', '2022-05-24 22:37:08'),
(11, 'Hot Stone Shower', 'A feeling of relief, rejuvenation and restored balance envelops the body after over 120 minutes of treatment. It is a well-deserved treat especially for the mind, body and soul especially after the hustle and bustle of the holiday rush.', 1200, 'hotstone.jpg', '2022-05-24 22:37:35'),
(12, 'Body Spa', 'It is typically a massage spa therapy that helps reduce pain. The technique involves using fingertips, palm, elbow, or even feet to apply firm pressure on certain body parts or acupoint to encourage blood flow and promote healing for the soul.', 1500, 'bodyspa.jpg', '2022-05-19 01:38:27'),
(16, 'Aroma Oil Massage Therapy', 'Aroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage TherapyAroma Oil Massage', 700, 'aromaoil.jpg', '2022-05-09 20:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `FirstName` varchar(120) DEFAULT NULL,
  `LastName` varchar(250) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(120) DEFAULT NULL,
  `Password` varchar(120) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`ID`, `usertype`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'admin', 'Admin', NULL, 1010010010, 'tester1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-06-24 14:22:03'),
(2, 'user', 'Anh', NULL, 8956234569, 'anhdinh@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-24 14:22:03'),
(3, 'user', 'Linh', NULL, 5689234578, 'linhnguyen@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-03-21 14:37:49'),
(4, 'user', 'Tran', NULL, 2147483649, 'trantruong@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-03-16 14:40:20'),
(5, 'user', 'Thanh', NULL, 8797977779, 'tuyetthanh@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-06-03 05:51:06'),
(6, 'user', 'Test', NULL, 1236547890, 'test@test.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-07 08:52:34'),
(7, 'user', 'Itec', NULL, 8888888888, 'itec22@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-01-14 05:27:32'),
(8, 'user', 'Andy', 'Gril', 9789797987, 'andythegril@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-11 09:21:46'),
(9, 'user', 'Peter', 'Parker', 8979798789, 'hima@gmail.com', '202cb962ac59075b964b07152d234b70', '2022-05-11 09:23:16'),
(10, 'user', 'Jane', 'Doe', 1425362514, 'ak@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-15 05:03:32'),
(11, 'user', 'John', 'Doe', 1452632541, 'johndoe@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2022-05-29 07:33:58'),
(13, 'user', 'tran', 'truong', 1234567890, 'LexicaBeautiful@gmail.com', '109692d14e0d01a57f8ca38d5f894196', '2022-07-11 06:22:10');
COMMIT;
