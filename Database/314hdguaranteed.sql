-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 14, 2024 at 07:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `314hdguaranteed`
--

-- --------------------------------------------------------

--
-- Table structure for table `listing`
--

CREATE TABLE `listing` (
  `listing_id` int(11) NOT NULL,
  `ra_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `region` enum('North','South','East','West','Central') NOT NULL,
  `type` enum('Condominium','Landed Property','HDB Flat') NOT NULL,
  `location` text NOT NULL,
  `postal` int(6) NOT NULL,
  `price` int(11) NOT NULL,
  `rooms` int(1) NOT NULL,
  `size` int(11) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `shortlists` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listing`
--

INSERT INTO `listing` (`listing_id`, `ra_id`, `user_id`, `region`, `type`, `location`, `postal`, `price`, `rooms`, `size`, `views`, `shortlists`) VALUES
(1, 1, 51, 'North', 'Condominium', 'Sunnyvale Heights', 100001, 2000000, 2, 600, 56, 1),
(2, 1, 52, 'South', 'Landed Property', 'Maplewood Gardens', 100002, 8000000, 8, 3000, 9, 1),
(3, 1, 53, 'East', 'HDB Flat', 'Pinecrest View', 100003, 800000, 3, 900, 9, 1),
(4, 1, 54, 'West', 'Condominium', 'Oakridge Meadows', 100004, 1500000, 3, 800, 0, 0),
(5, 2, 55, 'Central', 'Landed Property', 'Lakewood Terrace', 100005, 7000000, 9, 4500, 0, 0),
(6, 2, 56, 'North', 'HDB Flat', 'Rosewood Estates', 100006, 650000, 4, 1100, 0, 0),
(7, 2, 57, 'South', 'Condominium', 'Cedarwood Grove', 100007, 2800000, 3, 850, 0, 0),
(8, 2, 58, 'East', 'Landed Property', 'Fairview Meadows', 100008, 3000000, 7, 3400, 0, 0),
(9, 3, 59, 'West', 'HDB Flat', 'Riverbend Park', 100009, 750000, 2, 750, 0, 0),
(10, 3, 60, 'Central', 'Condominium', 'Lakeview Manor', 100010, 1200000, 4, 950, 0, 0),
(11, 3, 61, 'North', 'Landed Property', 'Pinecrest View', 100011, 6000000, 6, 2500, 0, 0),
(12, 3, 62, 'South', 'HDB Flat', 'Rosewood Estates', 100012, 600000, 3, 1000, 0, 0),
(13, 4, 63, 'East', 'Condominium', 'Cedarwood Grove', 100013, 2500000, 2, 700, 0, 0),
(14, 4, 64, 'West', 'Landed Property', 'Fairview Meadows', 100014, 4000000, 8, 3800, 0, 0),
(15, 4, 65, 'Central', 'HDB Flat', 'Riverbend Park', 100015, 850000, 3, 800, 0, 0),
(16, 4, 66, 'North', 'Condominium', 'Lakeview Manor', 100016, 1800000, 3, 900, 0, 0),
(17, 5, 67, 'South', 'Landed Property', 'Sunnyvale Heights', 100017, 9000000, 10, 5000, 0, 0),
(18, 5, 68, 'East', 'HDB Flat', 'Maplewood Gardens', 100018, 700000, 4, 1200, 0, 0),
(19, 5, 69, 'West', 'Condominium', 'Pinecrest View', 100019, 1300000, 3, 800, 0, 0),
(20, 5, 70, 'Central', 'Landed Property', 'Oakridge Meadows', 100020, 7500000, 7, 3100, 0, 0),
(21, 6, 71, 'North', 'HDB Flat', 'Lakewood Terrace', 100021, 600000, 3, 900, 0, 0),
(22, 6, 72, 'South', 'Condominium', 'Rosewood Estates', 100022, 3000000, 3, 850, 0, 0),
(23, 6, 73, 'East', 'Landed Property', 'Cedarwood Grove', 100023, 5000000, 9, 3800, 0, 0),
(24, 6, 74, 'West', 'HDB Flat', 'Fairview Meadows', 100024, 800000, 4, 1000, 0, 0),
(25, 7, 75, 'Central', 'Condominium', 'Riverbend Park', 100025, 1500000, 5, 1200, 0, 0),
(26, 7, 76, 'North', 'Landed Property', 'Lakeview Manor', 100026, 6500000, 8, 4200, 0, 0),
(27, 7, 77, 'South', 'HDB Flat', 'Sunnyvale Heights', 100027, 550000, 3, 900, 0, 0),
(28, 7, 78, 'East', 'Condominium', 'Maplewood Gardens', 100028, 2000000, 2, 750, 0, 0),
(29, 8, 79, 'West', 'Landed Property', 'Pinecrest View', 100029, 3000000, 7, 3400, 0, 0),
(30, 8, 80, 'Central', 'HDB Flat', 'Oakridge Meadows', 100030, 900000, 4, 1100, 0, 0),
(31, 8, 81, 'North', 'Condominium', 'Lakewood Terrace', 100031, 2200000, 3, 800, 0, 0),
(32, 8, 82, 'South', 'Landed Property', 'Rosewood Estates', 100032, 9500000, 9, 4600, 0, 0),
(33, 9, 83, 'East', 'HDB Flat', 'Cedarwood Grove', 100033, 750000, 3, 850, 0, 0),
(34, 9, 84, 'West', 'Condominium', 'Fairview Meadows', 100034, 1700000, 3, 900, 0, 0),
(35, 9, 85, 'Central', 'Landed Property', 'Riverbend Park', 100035, 8500000, 9, 4800, 0, 0),
(36, 9, 86, 'North', 'HDB Flat', 'Lakeview Manor', 100036, 550000, 3, 900, 0, 0),
(37, 10, 87, 'South', 'Condominium', 'Sunnyvale Heights', 100037, 3200000, 3, 800, 0, 0),
(38, 10, 88, 'East', 'Landed Property', 'Maplewood Gardens', 100038, 6000000, 8, 3500, 0, 0),
(39, 10, 89, 'West', 'HDB Flat', 'Pinecrest View', 100039, 850000, 3, 900, 0, 0),
(40, 10, 90, 'Central', 'Condominium', 'Oakridge Meadows', 100040, 1800000, 4, 1000, 0, 0),
(41, 11, 91, 'North', 'Landed Property', 'Lakewood Terrace', 100041, 7500000, 9, 4200, 0, 0),
(42, 11, 92, 'South', 'HDB Flat', 'Rosewood Estates', 100042, 600000, 4, 1100, 0, 0),
(43, 11, 93, 'East', 'Condominium', 'Cedarwood Grove', 100043, 2400000, 2, 750, 0, 0),
(44, 11, 94, 'West', 'Landed Property', 'Fairview Meadows', 100044, 3500000, 7, 3100, 0, 0),
(45, 12, 95, 'Central', 'HDB Flat', 'Riverbend Park', 100045, 950000, 3, 800, 0, 0),
(46, 12, 96, 'North', 'Condominium', 'Lakeview Manor', 100046, 2000000, 3, 850, 0, 0),
(47, 12, 97, 'South', 'Landed Property', 'Sunnyvale Heights', 100047, 8000000, 10, 5000, 0, 0),
(48, 12, 98, 'East', 'HDB Flat', 'Maplewood Gardens', 100048, 700000, 3, 900, 0, 0),
(49, 13, 99, 'West', 'Condominium', 'Pinecrest View', 100049, 1600000, 3, 900, 0, 0),
(50, 13, 100, 'Central', 'Landed Property', 'Oakridge Meadows', 100050, 7000000, 7, 3400, 0, 0),
(51, 13, 101, 'North', 'HDB Flat', 'Lakewood Terrace', 100051, 650000, 3, 900, 0, 0),
(52, 13, 102, 'South', 'Condominium', 'Rosewood Estates', 100052, 3300000, 3, 850, 0, 0),
(53, 14, 103, 'East', 'Landed Property', 'Cedarwood Grove', 100053, 5500000, 9, 3800, 0, 0),
(54, 14, 104, 'West', 'HDB Flat', 'Fairview Meadows', 100054, 850000, 4, 1000, 0, 0),
(55, 14, 105, 'Central', 'Condominium', 'Riverbend Park', 100055, 1400000, 5, 1200, 0, 0),
(56, 14, 106, 'North', 'Landed Property', 'Lakeview Manor', 100056, 7000000, 8, 4200, 0, 0),
(57, 15, 107, 'South', 'HDB Flat', 'Sunnyvale Heights', 100057, 600000, 3, 900, 0, 0),
(58, 15, 108, 'East', 'Condominium', 'Maplewood Gardens', 100058, 2200000, 2, 750, 0, 0),
(59, 15, 109, 'West', 'Landed Property', 'Pinecrest View', 100059, 3200000, 7, 3400, 0, 0),
(60, 15, 110, 'Central', 'HDB Flat', 'Oakridge Meadows', 100060, 950000, 4, 1100, 0, 0),
(61, 16, 111, 'North', 'Condominium', 'Lakewood Terrace', 100061, 2400000, 3, 800, 0, 0),
(62, 16, 112, 'South', 'Landed Property', 'Rosewood Estates', 100062, 8500000, 9, 4600, 0, 0),
(63, 16, 113, 'East', 'HDB Flat', 'Cedarwood Grove', 100063, 700000, 3, 850, 0, 0),
(64, 16, 114, 'West', 'Condominium', 'Fairview Meadows', 100064, 1800000, 3, 900, 0, 0),
(65, 17, 115, 'Central', 'Landed Property', 'Riverbend Park', 100065, 9000000, 9, 4800, 0, 0),
(66, 17, 116, 'North', 'HDB Flat', 'Lakeview Manor', 100066, 550000, 3, 900, 0, 0),
(67, 17, 117, 'South', 'Condominium', 'Sunnyvale Heights', 100067, 3500000, 3, 800, 0, 0),
(68, 17, 118, 'East', 'Landed Property', 'Maplewood Gardens', 100068, 7000000, 8, 3500, 0, 0),
(69, 18, 119, 'West', 'HDB Flat', 'Pinecrest View', 100069, 850000, 3, 900, 0, 0),
(70, 18, 120, 'Central', 'Condominium', 'Oakridge Meadows', 100070, 1800000, 4, 1000, 0, 0),
(71, 18, 121, 'North', 'Landed Property', 'Lakewood Terrace', 100071, 7500000, 9, 4200, 0, 0),
(72, 18, 122, 'South', 'HDB Flat', 'Rosewood Estates', 100072, 600000, 4, 1100, 0, 0),
(73, 19, 123, 'East', 'Condominium', 'Cedarwood Grove', 100073, 2800000, 2, 750, 0, 0),
(74, 19, 124, 'West', 'Landed Property', 'Fairview Meadows', 100074, 3500000, 7, 3100, 0, 0),
(75, 19, 125, 'Central', 'HDB Flat', 'Riverbend Park', 100075, 950000, 3, 800, 0, 0),
(76, 19, 126, 'North', 'Condominium', 'Lakeview Manor', 100076, 2000000, 3, 850, 0, 0),
(77, 20, 127, 'South', 'Landed Property', 'Sunnyvale Heights', 100077, 8000000, 10, 5000, 0, 0),
(78, 20, 128, 'East', 'HDB Flat', 'Maplewood Gardens', 100078, 700000, 3, 900, 0, 0),
(79, 20, 129, 'West', 'Condominium', 'Pinecrest View', 100079, 850000, 3, 900, 0, 0),
(80, 20, 130, 'Central', 'Landed Property', 'Oakridge Meadows', 100080, 7000000, 7, 3400, 0, 0),
(81, 21, 131, 'North', 'HDB Flat', 'Lakewood Terrace', 100081, 650000, 3, 900, 0, 0),
(82, 21, 132, 'South', 'Condominium', 'Rosewood Estates', 100082, 3300000, 3, 850, 0, 0),
(83, 21, 133, 'East', 'Landed Property', 'Cedarwood Grove', 100083, 5500000, 9, 3800, 0, 0),
(84, 21, 134, 'West', 'HDB Flat', 'Fairview Meadows', 100084, 850000, 4, 1000, 0, 0),
(85, 22, 135, 'Central', 'Condominium', 'Riverbend Park', 100085, 1400000, 5, 1200, 0, 0),
(86, 22, 136, 'North', 'Landed Property', 'Lakeview Manor', 100086, 7000000, 8, 4200, 0, 0),
(87, 22, 137, 'South', 'HDB Flat', 'Sunnyvale Heights', 100087, 600000, 3, 900, 0, 0),
(88, 22, 138, 'East', 'Condominium', 'Maplewood Gardens', 100088, 2200000, 2, 750, 0, 0),
(89, 23, 139, 'West', 'Landed Property', 'Pinecrest View', 100089, 3200000, 7, 3400, 0, 0),
(90, 23, 140, 'Central', 'HDB Flat', 'Oakridge Meadows', 100090, 950000, 4, 1100, 0, 0),
(91, 23, 141, 'North', 'Condominium', 'Lakewood Terrace', 100091, 2400000, 3, 800, 0, 0),
(92, 23, 142, 'South', 'Landed Property', 'Rosewood Estates', 100092, 8500000, 9, 4600, 0, 0),
(93, 24, 143, 'East', 'HDB Flat', 'Cedarwood Grove', 100093, 700000, 3, 850, 0, 0),
(94, 24, 144, 'West', 'Condominium', 'Fairview Meadows', 100094, 1800000, 3, 900, 0, 0),
(95, 24, 145, 'Central', 'Landed Property', 'Riverbend Park', 100095, 9000000, 9, 4800, 0, 0),
(96, 24, 146, 'North', 'HDB Flat', 'Lakeview Manor', 100096, 550000, 3, 900, 0, 0),
(97, 25, 147, 'South', 'Condominium', 'Sunnyvale Heights', 100097, 3500000, 3, 800, 0, 0),
(98, 25, 148, 'East', 'Landed Property', 'Maplewood Gardens', 100098, 7000000, 8, 3500, 0, 0),
(99, 25, 149, 'West', 'HDB Flat', 'Pinecrest View', 100099, 850000, 3, 900, 0, 0),
(100, 25, 150, 'Central', 'Condominium', 'Oakridge Meadows', 100100, 1800000, 4, 1000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ra`
--

CREATE TABLE `ra` (
  `ra_id` int(11) NOT NULL,
  `e-mail` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact` int(8) NOT NULL,
  `description` text DEFAULT NULL,
  `type` enum('active','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ra`
--

INSERT INTO `ra` (`ra_id`, `e-mail`, `username`, `password`, `name`, `contact`, `description`, `type`) VALUES
(1, 'ra1@example.com', 'ra1', 'password1', 'John Doe', 91234567, '3 Years experience under PropNex Realty', 'active'),
(2, 'ra2@example.com', 'ra2', 'password2', 'Jane Smith', 82345678, '4 Years experience under ERA Realty', 'active'),
(3, 'ra3@example.com', 'ra3', 'password3', 'Michael Johnson', 91123456, '5 Years experience under Huttons Asia', 'active'),
(4, 'ra4@example.com', 'ra4', 'password4', 'Emily Brown', 81234567, '6 Years experience under PropNex Realty', 'active'),
(5, 'ra5@example.com', 'ra5', 'password5', 'Daniel Wilson', 83456789, '7 Years experience under ERA Realty', 'active'),
(6, 'ra6@example.com', 'ra6', 'password6', 'Emma Davis', 89876543, '8 Years experience under Huttons Asia', 'active'),
(7, 'ra7@example.com', 'ra7', 'password7', 'David Martinez', 87765432, '3 Years experience under PropNex Realty', 'active'),
(8, 'ra8@example.com', 'ra8', 'password8', 'Sophia Taylor', 89987654, '4 Years experience under ERA Realty', 'active'),
(9, 'ra9@example.com', 'ra9', 'password9', 'Matthew Anderson', 82234567, '5 Years experience under Huttons Asia', 'active'),
(10, 'ra10@example.com', 'ra10', 'password10', 'Olivia Hernandez', 92345678, '6 Years experience under PropNex Realty', 'active'),
(11, 'ra11@example.com', 'ra11', 'password11', 'William Lopez', 81123456, '7 Years experience under ERA Realty', 'active'),
(12, 'ra12@example.com', 'ra12', 'password12', 'Ava Gonzalez', 89987654, '8 Years experience under Huttons Asia', 'active'),
(13, 'ra13@example.com', 'ra13', 'password13', 'James Perez', 87765432, '3 Years experience under PropNex Realty', 'active'),
(14, 'ra14@example.com', 'ra14', 'password14', 'Isabella Torres', 82345678, '4 Years experience under ERA Realty', 'active'),
(15, 'ra15@example.com', 'ra15', 'password15', 'Benjamin Roberts', 91123456, '5 Years experience under Huttons Asia', 'active'),
(16, 'ra16@example.com', 'ra16', 'password16', 'Mia King', 81234567, '6 Years experience under PropNex Realty', 'active'),
(17, 'ra17@example.com', 'ra17', 'password17', 'Ethan Collins', 83456789, '7 Years experience under ERA Realty', 'active'),
(18, 'ra18@example.com', 'ra18', 'password18', 'Amelia Stewart', 89876543, '8 Years experience under Huttons Asia', 'active'),
(19, 'ra19@example.com', 'ra19', 'password19', 'Alexander Cook', 87765432, '3 Years experience under PropNex Realty', 'active'),
(20, 'ra20@example.com', 'ra20', 'password20', 'Charlotte Rivera', 89987654, '4 Years experience under ERA Realty', 'active'),
(21, 'ra21@example.com', 'ra21', 'password21', 'David Hill', 82234567, '5 Years experience under Huttons Asia', 'active'),
(22, 'ra22@example.com', 'ra22', 'password22', 'Scarlett Bailey', 92345678, '6 Years experience under PropNex Realty', 'active'),
(23, 'ra23@example.com', 'ra23', 'password23', 'Sebastian Murphy', 81123456, '7 Years experience under ERA Realty', 'active'),
(24, 'ra24@example.com', 'ra24', 'password24', 'Zoe Cooper', 89987654, '8 Years experience under Huttons Asia', 'active'),
(25, 'ra25@example.com', 'ra25', 'password25', 'Luke Kelly', 87765432, '3 Years experience under PropNex Realty', 'active'),
(26, 'ra26@example.com', 'ra26', 'password26', 'Lily Cox', 82345678, '4 Years experience under ERA Realty', 'active'),
(27, 'ra27@example.com', 'ra27', 'password27', 'Christopher Reed', 91123456, '5 Years experience under Huttons Asia', 'active'),
(28, 'ra28@example.com', 'ra28', 'password28', 'Grace Ward', 81234567, '6 Years experience under PropNex Realty', 'active'),
(29, 'ra29@example.com', 'ra29', 'password29', 'Nathan Gray', 83456789, '7 Years experience under ERA Realty', 'active'),
(30, 'ra30@example.com', 'ra30', 'password30', 'Hannah Russell', 89876543, '8 Years experience under Huttons Asia', 'active'),
(31, 'ra31@example.com', 'ra31', 'password31', 'Dylan Mitchell', 87765432, '3 Years experience under PropNex Realty', 'active'),
(32, 'ra32@example.com', 'ra32', 'password32', 'Liam Ward', 89987654, '4 Years experience under ERA Realty', 'active'),
(33, 'ra33@example.com', 'ra33', 'password33', 'Chloe Harris', 82234567, '5 Years experience under Huttons Asia', 'active'),
(34, 'ra34@example.com', 'ra34', 'password34', 'Mason Brown', 92345678, '6 Years experience under PropNex Realty', 'active'),
(35, 'ra35@example.com', 'ra35', 'password35', 'Avery Evans', 81123456, '7 Years experience under ERA Realty', 'active'),
(36, 'ra36@example.com', 'ra36', 'password36', 'Addison Cox', 89987654, '8 Years experience under Huttons Asia', 'active'),
(37, 'ra37@example.com', 'ra37', 'password37', 'Evelyn James', 87765432, '3 Years experience under PropNex Realty', 'active'),
(38, 'ra38@example.com', 'ra38', 'password38', 'Hunter Bell', 82345678, '4 Years experience under ERA Realty', 'active'),
(39, 'ra39@example.com', 'ra39', 'password39', 'Luna Parker', 91123456, '5 Years experience under Huttons Asia', 'active'),
(40, 'ra40@example.com', 'ra40', 'password40', 'Gabriel Hughes', 81234567, '6 Years experience under PropNex Realty', 'active'),
(41, 'ra41@example.com', 'ra41', 'password41', 'Zoey Richardson', 83456789, '7 Years experience under ERA Realty', 'active'),
(42, 'ra42@example.com', 'ra42', 'password42', 'Jackson Gray', 89876543, '8 Years experience under Huttons Asia', 'active'),
(43, 'ra43@example.com', 'ra43', 'password43', 'Madison Stewart', 87765432, '3 Years experience under PropNex Realty', 'active'),
(44, 'ra44@example.com', 'ra44', 'password44', 'Ella Cook', 89987654, '4 Years experience under ERA Realty', 'active'),
(45, 'ra45@example.com', 'ra45', 'password45', 'Carter Bailey', 82234567, '5 Years experience under Huttons Asia', 'active'),
(46, 'ra46@example.com', 'ra46', 'password46', 'Aria Murphy', 92345678, '6 Years experience under PropNex Realty', 'active'),
(47, 'ra47@example.com', 'ra47', 'password47', 'Grayson Cooper', 81123456, '7 Years experience under ERA Realty', 'active'),
(48, 'ra48@example.com', 'ra48', 'password48', 'Scarlett Cox', 89987654, '8 Years experience under Huttons Asia', 'active'),
(49, 'ra49@example.com', 'ra49', 'password49', 'Eleanor Reed', 87765432, '3 Years experience under PropNex Realty', 'active'),
(50, 'ra50@example.com', 'ra50', 'password50', 'Theodore Ward', 82345678, '4 Years experience under ERA Realty', 'active'),
(51, 'ra51@example.com', 'ra51', 'password51', 'Davidson Harris', 91123456, '5 Years experience under Huttons Asia', 'active'),
(52, 'ra52@example.com', 'ra52', 'password52', 'Isla Brown', 81234567, '6 Years experience under PropNex Realty', 'active'),
(53, 'ra53@example.com', 'ra53', 'password53', 'Penelope Evans', 83456789, '7 Years experience under ERA Realty', 'active'),
(54, 'ra54@example.com', 'ra54', 'password54', 'Joseph Parker', 89876543, '8 Years experience under Huttons Asia', 'active'),
(55, 'ra55@example.com', 'ra55', 'password55', 'Madelyn Hughes', 87765432, '3 Years experience under PropNex Realty', 'active'),
(56, 'ra56@example.com', 'ra56', 'password56', 'Finn Richardson', 89987654, '4 Years experience under ERA Realty', 'active'),
(57, 'ra57@example.com', 'ra57', 'password57', 'Ashley Gray', 82234567, '5 Years experience under Huttons Asia', 'active'),
(58, 'ra58@example.com', 'ra58', 'password58', 'Maverick Bell', 92345678, '6 Years experience under PropNex Realty', 'active'),
(59, 'ra59@example.com', 'ra59', 'password59', 'Grace Parker', 81123456, '7 Years experience under ERA Realty', 'active'),
(60, 'ra60@example.com', 'ra60', 'password60', 'Alexis Hughes', 89987654, '8 Years experience under Huttons Asia', 'active'),
(61, 'ra61@example.com', 'ra61', 'password61', 'Jasper Ward', 87765432, '3 Years experience under PropNex Realty', 'active'),
(62, 'ra62@example.com', 'ra62', 'password62', 'Stella Harris', 82345678, '4 Years experience under ERA Realty', 'active'),
(63, 'ra63@example.com', 'ra63', 'password63', 'Leo Brown', 91123456, '5 Years experience under Huttons Asia', 'active'),
(64, 'ra64@example.com', 'ra64', 'password64', 'Nova Bailey', 81234567, '6 Years experience under PropNex Realty', 'active'),
(65, 'ra65@example.com', 'ra65', 'password65', 'Hudson Murphy', 83456789, '7 Years experience under ERA Realty', 'active'),
(66, 'ra66@example.com', 'ra66', 'password66', 'Eliza Cooper', 89876543, '8 Years experience under Huttons Asia', 'active'),
(67, 'ra67@example.com', 'ra67', 'password67', 'Micah Cox', 87765432, '3 Years experience under PropNex Realty', 'active'),
(68, 'ra68@example.com', 'ra68', 'password68', 'Sawyer Reed', 89987654, '4 Years experience under ERA Realty', 'active'),
(69, 'ra69@example.com', 'ra69', 'password69', 'Hazel Stewart', 82234567, '5 Years experience under Huttons Asia', 'active'),
(70, 'ra70@example.com', 'ra70', 'password70', 'Emmett Cook', 92345678, '6 Years experience under PropNex Realty', 'active'),
(71, 'ra71@example.com', 'ra71', 'password71', 'Ophelia Bailey', 81123456, '7 Years experience under ERA Realty', 'active'),
(72, 'ra72@example.com', 'ra72', 'password72', 'Rhett Cox', 89987654, '8 Years experience under Huttons Asia', 'active'),
(73, 'ra73@example.com', 'ra73', 'password73', 'Delilah Reed', 87765432, '3 Years experience under PropNex Realty', 'active'),
(74, 'ra74@example.com', 'ra74', 'password74', 'Brooks Cook', 82345678, '4 Years experience under ERA Realty', 'active'),
(75, 'ra75@example.com', 'ra75', 'password75', 'Isaac Harris', 91123456, '5 Years experience under Huttons Asia', 'active'),
(76, 'ra76@example.com', 'ra76', 'password76', 'Ivy Brown', 81234567, '6 Years experience under PropNex Realty', 'active'),
(77, 'ra77@example.com', 'ra77', 'password77', 'Poppy Evans', 83456789, '7 Years experience under ERA Realty', 'active'),
(78, 'ra78@example.com', 'ra78', 'password78', 'Xavier Parker', 89876543, '8 Years experience under Huttons Asia', 'active'),
(79, 'ra79@example.com', 'ra79', 'password79', 'Eli Hughes', 87765432, '3 Years experience under PropNex Realty', 'active'),
(80, 'ra80@example.com', 'ra80', 'password80', 'Clara Richardson', 89987654, '4 Years experience under ERA Realty', 'active'),
(81, 'ra81@example.com', 'ra81', 'password81', 'Everett Gray', 82234567, '5 Years experience under Huttons Asia', 'active'),
(82, 'ra82@example.com', 'ra82', 'password82', 'Layla Bell', 92345678, '6 Years experience under PropNex Realty', 'active'),
(83, 'ra83@example.com', 'ra83', 'password83', 'Elliot Parker', 81123456, '7 Years experience under ERA Realty', 'active'),
(84, 'ra84@example.com', 'ra84', 'password84', 'Aurora Hughes', 89987654, '8 Years experience under Huttons Asia', 'active'),
(85, 'ra85@example.com', 'ra85', 'password85', 'Beckett Harris', 87765432, '3 Years experience under PropNex Realty', 'active'),
(86, 'ra86@example.com', 'ra86', 'password86', 'Lucy Stewart', 82345678, '4 Years experience under ERA Realty', 'active'),
(87, 'ra87@example.com', 'ra87', 'password87', 'Max Brown', 91123456, '5 Years experience under Huttons Asia', 'active'),
(88, 'ra88@example.com', 'ra88', 'password88', 'Harper Bailey', 81234567, '6 Years experience under PropNex Realty', 'active'),
(89, 'ra89@example.com', 'ra89', 'password89', 'Roman Murphy', 83456789, '7 Years experience under ERA Realty', 'active'),
(90, 'ra90@example.com', 'ra90', 'password90', 'Nora Cooper', 89876543, '8 Years experience under Huttons Asia', 'active'),
(91, 'ra91@example.com', 'ra91', 'password91', 'Serenity Cox', 87765432, '3 Years experience under PropNex Realty', 'active'),
(92, 'ra92@example.com', 'ra92', 'password92', 'Mateo Reed', 89987654, '4 Years experience under ERA Realty', 'active'),
(93, 'ra93@example.com', 'ra93', 'password93', 'Liam Stewart', 82234567, '5 Years experience under Huttons Asia', 'active'),
(94, 'ra94@example.com', 'ra94', 'password94', 'Ruby Cook', 92345678, '6 Years experience under PropNex Realty', 'active'),
(95, 'ra95@example.com', 'ra95', 'password95', 'Audrey Bailey', 81123456, '7 Years experience under ERA Realty', 'active'),
(96, 'ra96@example.com', 'ra96', 'password96', 'Bentley Cox', 89987654, '8 Years experience under Huttons Asia', 'active'),
(97, 'ra97@example.com', 'ra97', 'password97', 'Ellie Evans', 87765432, '3 Years experience under PropNex Realty', 'active'),
(98, 'ra98@example.com', 'ra98', 'password98', 'Bennett Parker', 82345678, '4 Years experience under ERA Realty', 'active'),
(99, 'ra99@example.com', 'ra99', 'password99', 'Jade Hughes', 91123456, '5 Years experience under Huttons Asia', 'active'),
(100, 'ra100@example.com', 'ra100', 'password100', 'Emerson Gray', 81234567, '6 Years experience under PropNex Realty', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `ra_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `ra_id`, `user_id`, `stars`, `description`) VALUES
(1, 1, 1, 5, 'Amazing!'),
(2, 1, 2, 2, 'Awful!');

-- --------------------------------------------------------

--
-- Table structure for table `shortlist`
--

CREATE TABLE `shortlist` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shortlist`
--

INSERT INTO `shortlist` (`listing_id`, `user_id`) VALUES
(1, 1),
(2, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `e-mail` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `contact` int(11) NOT NULL,
  `purpose` enum('buyer','seller','admin','suspended') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `e-mail`, `username`, `password`, `name`, `contact`, `purpose`) VALUES
(1, 'buyer1@example.com', 'buyer0', 'password0', 'John Buyer', 91234568, 'buyer'),
(2, 'buyer2@example.com', 'buyer1', 'password1', 'Jane Buyer', 82345678, 'buyer'),
(3, 'buyer3@example.com', 'buyer2', 'password2', 'Michael Buyer', 91123456, 'buyer'),
(4, 'buyer4@example.com', 'buyer3', 'password3', 'Emily Buyer', 81234567, 'buyer'),
(5, 'buyer5@example.com', 'buyer4', 'password4', 'Daniel Buyer', 83456789, 'buyer'),
(6, 'buyer6@example.com', 'buyer5', 'password5', 'Emma Buyer', 89876543, 'buyer'),
(7, 'buyer7@example.com', 'buyer6', 'password6', 'David Buyer', 87765432, 'buyer'),
(8, 'buyer8@example.com', 'buyer7', 'password7', 'Sophia Buyer', 89987654, 'buyer'),
(9, 'buyer9@example.com', 'buyer8', 'password8', 'Matthew Buyer', 82234567, 'buyer'),
(10, 'buyer10@example.com', 'buyer9', 'password9', 'Olivia Buyer', 92345678, 'buyer'),
(11, 'buyer11@example.com', 'buyer10', 'password10', 'William Buyer', 81123456, 'buyer'),
(12, 'buyer12@example.com', 'buyer11', 'password11', 'Ava Buyer', 89987654, 'buyer'),
(13, 'buyer13@example.com', 'buyer12', 'password12', 'James Buyer', 87765432, 'buyer'),
(14, 'buyer14@example.com', 'buyer13', 'password13', 'Isabella Buyer', 82345678, 'buyer'),
(15, 'buyer15@example.com', 'buyer14', 'password14', 'Benjamin Buyer', 91123456, 'buyer'),
(16, 'buyer16@example.com', 'buyer15', 'password15', 'Mia Buyer', 81234567, 'buyer'),
(17, 'buyer17@example.com', 'buyer16', 'password16', 'Ethan Buyer', 83456789, 'buyer'),
(18, 'buyer18@example.com', 'buyer17', 'password17', 'Amelia Buyer', 89876543, 'buyer'),
(19, 'buyer19@example.com', 'buyer18', 'password18', 'Alexander Buyer', 87765432, 'buyer'),
(20, 'buyer20@example.com', 'buyer19', 'password19', 'Charlotte Buyer', 89987654, 'buyer'),
(21, 'buyer21@example.com', 'buyer20', 'password20', 'Davidson Buyer', 82234567, 'buyer'),
(22, 'buyer22@example.com', 'buyer21', 'password21', 'Scarlett Buyer', 92345678, 'buyer'),
(23, 'buyer23@example.com', 'buyer22', 'password22', 'Sebastian Buyer', 81123456, 'buyer'),
(24, 'buyer24@example.com', 'buyer23', 'password23', 'Zoe Buyer', 89987654, 'buyer'),
(25, 'buyer25@example.com', 'buyer24', 'password24', 'Luke Buyer', 87765432, 'buyer'),
(26, 'buyer26@example.com', 'buyer25', 'password25', 'Lily Buyer', 82345678, 'buyer'),
(27, 'buyer27@example.com', 'buyer26', 'password26', 'Christopher Buyer', 91123456, 'buyer'),
(28, 'buyer28@example.com', 'buyer27', 'password27', 'Grace Buyer', 81234567, 'buyer'),
(29, 'buyer29@example.com', 'buyer28', 'password28', 'Nathan Buyer', 83456789, 'buyer'),
(30, 'buyer30@example.com', 'buyer29', 'password29', 'Hannah Buyer', 89876543, 'buyer'),
(31, 'buyer31@example.com', 'buyer30', 'password30', 'Dylan Buyer', 87765432, 'buyer'),
(32, 'buyer32@example.com', 'buyer31', 'password31', 'Liam Buyer', 89987654, 'buyer'),
(33, 'buyer33@example.com', 'buyer32', 'password32', 'Chloe Buyer', 82234567, 'buyer'),
(34, 'buyer34@example.com', 'buyer33', 'password33', 'Mason Buyer', 92345678, 'buyer'),
(35, 'buyer35@example.com', 'buyer34', 'password34', 'Avery Buyer', 81123456, 'buyer'),
(36, 'buyer36@example.com', 'buyer35', 'password35', 'Addison Buyer', 89987654, 'buyer'),
(37, 'buyer37@example.com', 'buyer36', 'password36', 'Evelyn Buyer', 87765432, 'buyer'),
(38, 'buyer38@example.com', 'buyer37', 'password37', 'Hunter Buyer', 82345678, 'buyer'),
(39, 'buyer39@example.com', 'buyer38', 'password38', 'Luna Buyer', 91123456, 'buyer'),
(40, 'buyer40@example.com', 'buyer39', 'password39', 'Gabriel Buyer', 81234567, 'buyer'),
(41, 'buyer41@example.com', 'buyer40', 'password40', 'Zoey Buyer', 83456789, 'buyer'),
(42, 'buyer42@example.com', 'buyer41', 'password41', 'Jackson Buyer', 89876543, 'buyer'),
(43, 'buyer43@example.com', 'buyer42', 'password42', 'Madison Buyer', 87765432, 'buyer'),
(44, 'buyer44@example.com', 'buyer43', 'password43', 'Ella Buyer', 89987654, 'buyer'),
(45, 'buyer45@example.com', 'buyer44', 'password44', 'Carter Buyer', 82234567, 'buyer'),
(46, 'buyer46@example.com', 'buyer45', 'password45', 'Aria Buyer', 92345678, 'buyer'),
(47, 'buyer47@example.com', 'buyer46', 'password46', 'Grayson Buyer', 81123456, 'buyer'),
(48, 'buyer48@example.com', 'buyer47', 'password47', 'Scarlett Buyer', 89987654, 'buyer'),
(49, 'buyer49@example.com', 'buyer48', 'password48', 'Eleanor Buyer', 87765432, 'buyer'),
(50, 'buyer50@example.com', 'buyer49', 'password49', 'Theodore Buyer', 82345678, 'buyer'),
(51, 'seller1@example.com', 'seller0', 'password0', 'John Seller', 91234567, 'seller'),
(52, 'seller2@example.com', 'seller1', 'password1', 'Jane Seller', 82345678, 'seller'),
(53, 'seller3@example.com', 'seller2', 'password2', 'Michael Seller', 91123456, 'seller'),
(54, 'seller4@example.com', 'seller3', 'password3', 'Emily Seller', 81234567, 'seller'),
(55, 'seller5@example.com', 'seller4', 'password4', 'Daniel Seller', 83456789, 'seller'),
(56, 'seller6@example.com', 'seller5', 'password5', 'Emma Seller', 89876543, 'seller'),
(57, 'seller7@example.com', 'seller6', 'password6', 'David Seller', 87765432, 'seller'),
(58, 'seller8@example.com', 'seller7', 'password7', 'Sophia Seller', 89987654, 'seller'),
(59, 'seller9@example.com', 'seller8', 'password8', 'Matthew Seller', 82234567, 'seller'),
(60, 'seller10@example.com', 'seller9', 'password9', 'Olivia Seller', 92345678, 'seller'),
(61, 'seller11@example.com', 'seller10', 'password10', 'William Seller', 81123456, 'seller'),
(62, 'seller12@example.com', 'seller11', 'password11', 'Ava Seller', 89987654, 'seller'),
(63, 'seller13@example.com', 'seller12', 'password12', 'James Seller', 87765432, 'seller'),
(64, 'seller14@example.com', 'seller13', 'password13', 'Isabella Seller', 82345678, 'seller'),
(65, 'seller15@example.com', 'seller14', 'password14', 'Benjamin Seller', 91123456, 'seller'),
(66, 'seller16@example.com', 'seller15', 'password15', 'Mia Seller', 81234567, 'seller'),
(67, 'seller17@example.com', 'seller16', 'password16', 'Ethan Seller', 83456789, 'seller'),
(68, 'seller18@example.com', 'seller17', 'password17', 'Amelia Seller', 89876543, 'seller'),
(69, 'seller19@example.com', 'seller18', 'password18', 'Alexander Seller', 87765432, 'seller'),
(70, 'seller20@example.com', 'seller19', 'password19', 'Charlotte Seller', 89987654, 'seller'),
(71, 'seller21@example.com', 'seller20', 'password20', 'Davidson Seller', 82234567, 'seller'),
(72, 'seller22@example.com', 'seller21', 'password21', 'Scarlett Seller', 92345678, 'seller'),
(73, 'seller23@example.com', 'seller22', 'password22', 'Sebastian Seller', 81123456, 'seller'),
(74, 'seller24@example.com', 'seller23', 'password23', 'Zoe Seller', 89987654, 'seller'),
(75, 'seller25@example.com', 'seller24', 'password24', 'Luke Seller', 87765432, 'seller'),
(76, 'seller26@example.com', 'seller25', 'password25', 'Lily Seller', 82345678, 'seller'),
(77, 'seller27@example.com', 'seller26', 'password26', 'Christopher Seller', 91123456, 'seller'),
(78, 'seller28@example.com', 'seller27', 'password27', 'Grace Seller', 81234567, 'seller'),
(79, 'seller29@example.com', 'seller28', 'password28', 'Nathan Seller', 83456789, 'seller'),
(80, 'seller30@example.com', 'seller29', 'password29', 'Hannah Seller', 89876543, 'seller'),
(81, 'seller31@example.com', 'seller30', 'password30', 'Dylan Seller', 87765432, 'seller'),
(82, 'seller32@example.com', 'seller31', 'password31', 'Liam Seller', 89987654, 'seller'),
(83, 'seller33@example.com', 'seller32', 'password32', 'Chloe Seller', 82234567, 'seller'),
(84, 'seller34@example.com', 'seller33', 'password33', 'Mason Seller', 92345678, 'seller'),
(85, 'seller35@example.com', 'seller34', 'password34', 'Avery Seller', 81123456, 'seller'),
(86, 'seller36@example.com', 'seller35', 'password35', 'Addison Seller', 89987654, 'seller'),
(87, 'seller37@example.com', 'seller36', 'password36', 'Evelyn Seller', 87765432, 'seller'),
(88, 'seller38@example.com', 'seller37', 'password37', 'Hunter Seller', 82345678, 'seller'),
(89, 'seller39@example.com', 'seller38', 'password38', 'Luna Seller', 91123456, 'seller'),
(90, 'seller40@example.com', 'seller39', 'password39', 'Gabriel Seller', 81234567, 'seller'),
(91, 'seller41@example.com', 'seller40', 'password40', 'Zoey Seller', 83456789, 'seller'),
(92, 'seller42@example.com', 'seller41', 'password41', 'Jackson Seller', 89876543, 'seller'),
(93, 'seller43@example.com', 'seller42', 'password42', 'Madison Seller', 87765432, 'seller'),
(94, 'seller44@example.com', 'seller43', 'password43', 'Ella Seller', 89987654, 'seller'),
(95, 'seller45@example.com', 'seller44', 'password44', 'Carter Seller', 82234567, 'seller'),
(96, 'seller46@example.com', 'seller45', 'password45', 'Aria Seller', 92345678, 'seller'),
(97, 'seller47@example.com', 'seller46', 'password46', 'Grayson Seller', 81123456, 'seller'),
(98, 'seller48@example.com', 'seller47', 'password47', 'Scarlett Seller', 89987654, 'seller'),
(99, 'seller49@example.com', 'seller48', 'password48', 'Eleanor Seller', 87765432, 'seller'),
(100, 'seller50@example.com', 'seller49', 'password49', 'Theodore Seller', 82345678, 'seller'),
(101, 'admin1@example.com', 'admin0', 'password0', 'Joe Admin', 97936903, 'admin'),
(116, 'admin2@example.com', 'admin1', 'password1', 'Nisa Admin', 87964721, 'admin'),
(117, 'admin3@example.com', 'admin2', 'password2', 'Liam Admin', 78912345, 'admin'),
(118, 'admin4@example.com', 'admin3', 'password3', 'Emma Admin', 65478912, 'admin'),
(119, 'admin5@example.com', 'admin4', 'password4', 'Noah Admin', 98765432, 'admin'),
(120, 'admin6@example.com', 'admin5', 'password5', 'Olivia Admin', 54321678, 'admin'),
(121, 'admin7@example.com', 'admin6', 'password6', 'William Admin', 78945612, 'admin'),
(122, 'admin8@example.com', 'admin7', 'password7', 'Ava Admin', 65432189, 'admin'),
(123, 'admin9@example.com', 'admin8', 'password8', 'James Admin', 98712365, 'admin'),
(124, 'admin10@example.com', 'admin9', 'password9', 'Sophia Admin', 54398721, 'admin'),
(125, 'admin11@example.com', 'admin10', 'password10', 'Benjamin Admin', 78965432, 'admin'),
(126, 'admin12@example.com', 'admin11', 'password11', 'Isabella Admin', 65498732, 'admin'),
(127, 'admin13@example.com', 'admin12', 'password12', 'Lucas Admin', 98732165, 'admin'),
(128, 'admin14@example.com', 'admin13', 'password13', 'Mia Admin', 54321689, 'admin'),
(129, 'admin15@example.com', 'admin14', 'password14', 'Henry Admin', 78945678, 'admin'),
(130, 'admin16@example.com', 'admin15', 'password15', 'Amelia Admin', 65412389, 'admin'),
(131, 'admin17@example.com', 'admin16', 'password16', 'Alexander Admin', 98765478, 'admin'),
(132, 'admin18@example.com', 'admin17', 'password17', 'Harper Admin', 54398765, 'admin'),
(133, 'admin19@example.com', 'admin18', 'password18', 'Ethan Admin', 78932145, 'admin'),
(134, 'admin20@example.com', 'admin19', 'password19', 'Evelyn Admin', 65478965, 'admin'),
(135, 'admin21@example.com', 'admin20', 'password20', 'Jacob Admin', 98712378, 'admin'),
(136, 'admin22@example.com', 'admin21', 'password21', 'Abigail Admin', 54321645, 'admin'),
(137, 'admin23@example.com', 'admin22', 'password22', 'Michael Admin', 78965489, 'admin'),
(138, 'admin24@example.com', 'admin23', 'password23', 'Emily Admin', 65498721, 'admin'),
(139, 'admin25@example.com', 'admin24', 'password24', 'Daniel Admin', 98732178, 'admin'),
(140, 'admin26@example.com', 'admin25', 'password25', 'Elizabeth Admin', 54398732, 'admin'),
(141, 'admin27@example.com', 'admin26', 'password26', 'Matthew Admin', 78945632, 'admin'),
(142, 'admin28@example.com', 'admin27', 'password27', 'Avery Admin', 65412378, 'admin');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `listing`
--
ALTER TABLE `listing`
  ADD PRIMARY KEY (`listing_id`),
  ADD KEY `ra_id` (`ra_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ra`
--
ALTER TABLE `ra`
  ADD PRIMARY KEY (`ra_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `ra_id` (`ra_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `shortlist`
--
ALTER TABLE `shortlist`
  ADD KEY `listing_id` (`listing_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `e-mail` (`e-mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listing`
--
ALTER TABLE `listing`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `ra`
--
ALTER TABLE `ra`
  MODIFY `ra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
