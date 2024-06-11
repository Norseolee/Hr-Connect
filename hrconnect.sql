-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 04:30 PM
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
-- Database: `hrconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `attendance_date` date NOT NULL DEFAULT current_timestamp(),
  `location_id` int(11) DEFAULT NULL,
  `in_time` time NOT NULL DEFAULT current_timestamp(),
  `in_status` varchar(40) DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `out_status` varchar(70) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `employee_id`, `attendance_date`, `location_id`, `in_time`, `in_status`, `out_time`, `out_status`, `created_at`) VALUES
(52, 18, '2024-01-02', 1, '17:27:08', 'Early In', '17:27:20', 'Early Out', '2024-01-02 09:27:20'),
(56, 18, '2024-01-11', 1, '22:01:04', 'Early In', '22:01:18', 'Early Out', '2024-01-11 14:01:18'),
(57, 19, '2024-01-11', 1, '22:15:06', 'Early In', '22:15:14', 'Early Out', '2024-01-11 14:15:14');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `department_status` enum('Added','Update','Deleted','') NOT NULL,
  `department_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_status`, `department_timestamp`) VALUES
(1, 'Human Resource Developement', 'Added', '2023-08-01 16:24:00'),
(2, 'Finance & Accounting', 'Update', '2023-12-26 08:59:23'),
(3, 'Maintenance', 'Added', '2023-12-26 08:54:28'),
(4, 'Sales & Marketing', 'Update', '2023-12-26 08:57:51'),
(5, 'Business Planning', 'Added', '2023-12-26 08:56:01'),
(6, 'Research & Development', 'Added', '2023-12-26 08:56:54'),
(7, 'Operations Department', 'Update', '2024-01-11 13:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `position_id` int(11) DEFAULT NULL,
  `department_id` int(5) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `employee_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `employee_status` enum('Added','Update','Deleted','') DEFAULT NULL,
  `title` varchar(5) DEFAULT NULL,
  `middle_name` varchar(90) DEFAULT NULL,
  `maiden_name` varchar(90) DEFAULT NULL,
  `nick_name` varchar(90) DEFAULT NULL,
  `picture` varchar(200) NOT NULL DEFAULT 'profile.png',
  `schedule_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `position_id`, `department_id`, `first_name`, `last_name`, `hire_date`, `salary`, `employee_timestamp`, `employee_status`, `title`, `middle_name`, `maiden_name`, `nick_name`, `picture`, `schedule_id`) VALUES
(18, 1, 1, 'Do Do', 'Hee', '2023-12-03', 15000.00, '2023-12-29 13:09:04', 'Added', 'Mr', 'Bok', 'maiden', 'Doo', '202312292109000000Am9 Commercial.jpg', 9),
(19, 5, 1, 'Moses', 'Yundt', '2022-06-03', 77069.00, '2024-01-11 14:14:53', NULL, 'Mr', 'Mabel', 'Schultz', 'Mo', '202401030712000000maisonboulud-desktop-masthead.jpg', 10),
(20, 5, 1, 'Rachelle', 'Heaney', '2019-09-05', 59682.00, '2024-01-11 13:43:27', NULL, NULL, 'Gianni', 'Nikolaus', 'florence23', '2024011121430000002_large.jpg', NULL),
(21, 5, 3, 'Dayana', 'Pagac', '2007-12-26', 17480.00, '2023-12-30 12:42:29', NULL, NULL, NULL, NULL, 'wcummings', 'profile.png', NULL),
(22, 2, 6, 'Humberto', 'Schinner', '1989-10-03', 26077.00, '2023-12-30 12:42:29', NULL, NULL, NULL, NULL, 'bernier.katheryn', 'profile.png', NULL),
(23, 6, 5, 'Eino', 'Reinger', '1998-10-26', 93492.00, '2023-12-30 12:42:29', NULL, NULL, 'Millie', NULL, NULL, 'profile.png', NULL),
(24, 4, 5, 'Spencer', 'Kunze', '1970-08-22', 40477.00, '2023-12-30 12:42:29', NULL, NULL, NULL, 'O\'Reilly', 'kailyn61', 'profile.png', NULL),
(25, 2, 1, 'Carolina', 'Eichmann', '1974-08-14', 7480.00, '2023-12-30 12:42:29', NULL, NULL, 'Kolby', 'Stiedemann', NULL, 'profile.png', NULL),
(26, 3, 6, 'Irving', 'Connelly', '1997-01-07', 31191.00, '2023-12-30 12:42:29', NULL, NULL, NULL, 'Walker', 'blake.towne', 'profile.png', NULL),
(27, 1, 6, 'Elyssa', 'Senger', '1970-10-24', 80212.00, '2023-12-30 12:42:29', NULL, NULL, 'Dane', 'Schulist', NULL, 'profile.png', NULL),
(28, 4, 2, 'Madyson', 'Kshlerin', '2011-11-27', 16258.00, '2023-12-30 12:42:29', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL),
(29, 4, 4, 'Jayda', 'Walker', '1979-10-16', 42537.00, '2023-12-30 12:42:29', NULL, NULL, 'Jonas', NULL, 'huels.bartholome', 'profile.png', NULL),
(30, 4, 2, 'Bryce', 'Jast', '1979-07-10', 27775.00, '2023-12-30 12:42:29', NULL, NULL, 'Kaylin', NULL, NULL, 'profile.png', NULL),
(31, 6, 5, 'Mariane', 'Doyle', '1990-07-21', 11742.00, '2023-12-30 12:42:29', NULL, NULL, NULL, 'Schultz', 'schmidt.jameson', 'profile.png', NULL),
(32, 1, 3, 'Keaton', 'Rath', '1983-12-03', 13115.00, '2023-12-30 12:42:29', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL),
(33, 1, 6, 'David', 'McDermott', '1973-06-09', 52542.00, '2023-12-30 12:42:29', NULL, NULL, 'Karolann', 'Bahringer', 'lindsey77', 'profile.png', NULL),
(34, 1, 5, 'Marlon', 'Fahey', '2003-02-17', 30794.00, '2023-12-30 12:42:29', NULL, NULL, NULL, 'Lehner', 'streich.jayme', 'profile.png', NULL),
(35, 1, 5, 'Osbaldo', 'Rath', '2004-04-10', 7290.00, '2023-12-30 12:42:29', NULL, NULL, 'Michele', 'Willms', NULL, 'profile.png', NULL),
(36, 1, 5, 'Sydnie', 'Hoppe', '1994-06-25', 93505.00, '2023-12-30 12:42:29', NULL, NULL, 'Eladio', 'Wolff', NULL, 'profile.png', NULL),
(37, 4, 1, 'Toy', 'Thompson', '2019-12-22', 9736.00, '2023-12-30 12:42:29', NULL, NULL, NULL, 'Dietrich', 'lehner.kristopher', 'profile.png', NULL),
(38, 1, 7, 'Maxine', 'Champlin', '2016-07-15', 22807.00, '2023-12-30 12:42:29', NULL, NULL, NULL, NULL, 'erik75', 'profile.png', NULL),
(39, 6, 3, 'Tomas', 'D\'Amore', '2012-09-17', 24195.00, '2023-12-30 12:42:29', NULL, NULL, 'Hardy', 'Anderson', NULL, 'profile.png', NULL),
(40, 4, 5, 'Murphy', 'Labadie', '2002-04-23', 78443.00, '2023-12-30 12:42:30', NULL, NULL, 'Marian', 'Trantow', 'lula.powlowski', 'profile.png', NULL),
(41, 1, 5, 'Arielle', 'Kohler', '1990-02-09', 46081.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL),
(42, 1, 2, 'Berenice', 'Batz', '2009-08-20', 80457.00, '2023-12-30 12:42:30', NULL, NULL, 'Jodie', 'Dickens', NULL, 'profile.png', NULL),
(43, 5, 4, 'Ernestine', 'Conroy', '2008-03-25', 50284.00, '2023-12-30 12:42:30', NULL, NULL, 'Katheryn', 'Lockman', NULL, 'profile.png', NULL),
(44, 6, 1, 'Celine', 'Wisozk', '2000-07-18', 27447.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'lesch.carleton', 'profile.png', NULL),
(45, 6, 7, 'Alan', 'Cummerata', '1970-09-04', 25237.00, '2023-12-30 12:42:30', NULL, NULL, 'Roslyn', 'Herman', NULL, 'profile.png', NULL),
(46, 6, 1, 'Daniella', 'Bins', '1979-03-22', 73884.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'bromaguera', 'profile.png', NULL),
(47, 4, 5, 'Russel', 'Homenick', '2019-06-09', 65465.00, '2023-12-30 12:42:30', NULL, NULL, 'Vernie', 'Bayer', NULL, 'profile.png', NULL),
(48, 6, 6, 'Sam', 'Nitzsche', '1976-04-06', 8333.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'morissette.osborne', 'profile.png', NULL),
(49, 2, 6, 'Craig', 'Barton', '2022-03-22', 57890.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL),
(50, 4, 2, 'Mafalda', 'Lemke', '1988-08-31', 69884.00, '2023-12-30 12:42:30', NULL, NULL, 'Elva', NULL, 'bdonnelly', 'profile.png', NULL),
(51, 5, 5, 'Eddie', 'Lang', '1977-05-26', 55746.00, '2023-12-30 12:42:30', NULL, NULL, 'Otilia', NULL, NULL, 'profile.png', NULL),
(52, 3, 6, 'Holly', 'Weimann', '2022-05-28', 72945.00, '2023-12-30 12:42:30', NULL, NULL, 'Chris', 'Wuckert', NULL, 'profile.png', NULL),
(53, 5, 4, 'Lionel', 'Lesch', '2019-07-30', 48550.00, '2024-01-11 13:34:44', NULL, NULL, 'Mabelle', NULL, NULL, '202401112134000000logo.png', NULL),
(54, 4, 7, 'Whitney', 'Bashirian', '1979-08-12', 21646.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'tommie.hagenes', 'profile.png', NULL),
(55, 5, 6, 'Ozella', 'Klocko', '2010-03-29', 55685.00, '2023-12-30 12:42:30', NULL, NULL, NULL, 'Skiles', 'rlemke', 'profile.png', NULL),
(56, 6, 1, 'Ed', 'Strosin', '1986-03-20', 96208.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL),
(57, 4, 1, 'Alex', 'Harber', '2018-12-18', 45997.00, '2023-12-30 12:42:30', NULL, NULL, 'Nannie', NULL, NULL, 'profile.png', NULL),
(58, 1, 5, 'Laurianne', 'Huel', '2017-10-26', 86560.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'easton.krajcik', 'profile.png', NULL),
(59, 2, 3, 'Kaley', 'Doyle', '1974-09-09', 93896.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'braun.berniece', 'profile.png', NULL),
(60, 4, 7, 'Valentin', 'Ortiz', '1995-06-22', 99151.00, '2023-12-30 12:42:30', NULL, NULL, 'Tad', 'Heaney', NULL, 'profile.png', NULL),
(61, 4, 1, 'Annalise', 'Witting', '2006-07-18', 88923.00, '2023-12-30 12:42:30', NULL, NULL, 'Katrine', NULL, NULL, 'profile.png', NULL),
(62, 6, 4, 'Rebeca', 'Walsh', '2003-01-01', 71342.00, '2023-12-30 12:42:30', NULL, NULL, NULL, 'Little', NULL, 'profile.png', NULL),
(63, 6, 4, 'Cindy', 'Barrows', '1995-01-20', 38042.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, 'fred57', 'profile.png', NULL),
(64, 1, 7, 'Burnice', 'Walker', '1983-12-09', 28122.00, '2023-12-30 12:42:30', NULL, NULL, NULL, 'Rodriguez', NULL, 'profile.png', NULL),
(65, 5, 2, 'Maverick', 'Von', '2014-01-27', 84842.00, '2023-12-30 12:42:30', NULL, NULL, 'Angel', 'Wilkinson', NULL, 'profile.png', NULL),
(66, 6, 4, 'Kurt', 'Anderson', '1980-06-08', 61542.00, '2023-12-30 12:42:30', NULL, NULL, NULL, NULL, NULL, 'profile.png', NULL),
(67, 2, 7, 'Albert', 'Bode', '1982-07-01', 60082.00, '2024-01-02 22:52:03', NULL, NULL, NULL, 'Runolfsdottir', NULL, 'profile.png', 11);

-- --------------------------------------------------------

--
-- Table structure for table `employee_docs`
--

CREATE TABLE `employee_docs` (
  `employee_id` int(5) NOT NULL,
  `sss` bigint(20) DEFAULT NULL,
  `tin` bigint(20) DEFAULT NULL,
  `philhealth` bigint(20) DEFAULT NULL,
  `hdmf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_docs`
--

INSERT INTO `employee_docs` (`employee_id`, `sss`, `tin`, `philhealth`, `hdmf`) VALUES
(19, 132572661, 171482292125, 889652951597, 759512993086),
(20, 812210552, 247684081767, 160835216253, 307338730784),
(21, 302751285, 174373467610, 569233284950, 851862122768),
(22, 872665031, 645456345215, 430543754869, 705360858645),
(23, 812992138, 512466148078, 952009973737, 550757926607),
(24, 523021983, 474517705381, 871098754859, 315101899148),
(25, 484689380, 139174581981, 206179100001, 353413894372),
(26, 126105456, 902402711227, 291514542517, 735307789018),
(27, 564524617, 674603385059, 846710293027, 671370106745),
(28, 887648057, 227579968485, 434114682784, 597824056989),
(29, 964996795, 448349158062, 817582105916, 267747697843),
(30, 212486471, 507621922304, 427327757880, 990208010686),
(31, 979860311, 626880450577, 935003812310, 767702496404),
(32, 745235727, 431751812167, 115990156709, 699110239245),
(33, 346741598, 654783049737, 771534141748, 658878094910),
(34, 650112015, 623288390850, 819702514422, 849480848316),
(35, 400614718, 214586542060, 743801409405, 130973349442),
(36, 127407547, 749270676896, 142548215040, 803003181054),
(37, 315226891, 541084833070, 387009665455, 425288166649),
(38, 959554562, 909607350698, 307616644322, 458766143350),
(39, 679938208, 395963953940, 597706902515, 117698544593),
(40, 320732249, 378401848556, 358247890268, 759142059664),
(41, 951500685, 195811508854, 479142295576, 900734936422),
(42, 278818591, 716082059280, 893676113242, 676629480944),
(43, 921917207, 381490568552, 972596413856, 412694414757),
(44, 536341981, 219441357571, 913089709707, 118179489181),
(45, 163960581, 106585754391, 117376236056, 310979138743),
(46, 271391660, 237352239921, 163786848395, 378242817255),
(47, 955864987, 658051359460, 834272783551, 480121739497),
(48, 246423900, 204273263699, 535315991088, 297752674750),
(49, 301992984, 330550668687, 895604534612, 483906754201),
(50, 764239251, 603731993714, 673786480644, 838691292917),
(51, 737657317, 393144617094, 309402181033, 454840693155),
(52, 173472629, 666430716372, 877785202678, 395334704695),
(53, 760179524, 556371592255, 583251398594, 963045447429),
(54, 208654968, 333129697007, 471217427618, 572317780476),
(55, 266889257, 804934933346, 643081063517, 750981799536),
(56, 877854674, 415445022102, 822361064894, 189619397511),
(57, 333719895, 934228182311, 320444882749, 925023452606),
(58, 963260578, 542081637441, 673187739041, 142583411103),
(59, 107579544, 426667779593, 478411441231, 565280788413),
(60, 580996860, 565061112058, 253156945826, 539676723533),
(61, 799509455, 362271506055, 340449521311, 704679166129),
(62, 158413179, 766419816664, 214418192381, 719276319734),
(63, 137260720, 256903504189, 189222376751, 477534544082),
(64, 344772040, 768149469323, 394365098921, 928545674394),
(65, 864543484, 580521133632, 728096951017, 231076280076),
(66, 339224203, 150381438421, 792353851688, 272004820924),
(67, 580050613, 964977767206, 134954707654, 139757814335);

-- --------------------------------------------------------

--
-- Table structure for table `employee_informations`
--

CREATE TABLE `employee_informations` (
  `employee_id` int(5) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `place_of_birth` varchar(90) DEFAULT NULL,
  `nationality` varchar(90) DEFAULT NULL,
  `civil_status` varchar(90) DEFAULT NULL,
  `mobile_no` varchar(200) DEFAULT NULL,
  `email_address` varchar(90) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(90) DEFAULT NULL,
  `street` varchar(90) DEFAULT NULL,
  `province` varchar(90) DEFAULT NULL,
  `phone_no` varchar(200) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_informations`
--

INSERT INTO `employee_informations` (`employee_id`, `date_of_birth`, `place_of_birth`, `nationality`, `civil_status`, `mobile_no`, `email_address`, `zip`, `city`, `street`, `province`, `phone_no`, `gender`) VALUES
(18, '1999-07-06', 'Philippines', 'Pilipino', 'single', '997355124', 'DooDooHeeMyDemon@yahoo.com', '4120', 'Cavite City', 'Nia Road', 'Cavite', '997355124', 'Female'),
(19, '1982-10-22', 'Albinville', 'Tonga', 'Married', '+1 (434) 992-4549', 'kian.auer@yahoo.com', '69357-6293', 'South Ardellaview', '7517 Spencer Circle', 'Ohio', '419.521.5935', 'Male'),
(20, '1986-12-22', 'Justinaburgh', 'Mexico', 'Divorced', '+16318557106', 'katheryn66@haag.com', '04804-9902', 'South Arjun', '442 Albert Island', 'Hawaii', '(847) 694-2180', 'Male'),
(21, '2022-02-24', 'Boehmfurt', 'Niue', 'Married', '520.375.0008', 'chadrick.mcdermott@wintheiser.org', '03558-3548', 'Rosenbaummouth', '2490 Malcolm Mountains Apt. 352', 'West Virginia', '1-678-878-4067', 'Male'),
(22, '1993-10-27', 'North Giovanny', 'Philippines', 'Single', '1-504-764-4375', 'okon.helmer@hamill.com', '47607-0950', 'Lake Torranceton', '837 Javon Garden Suite 616', 'Tennessee', '646-776-4608', 'Female'),
(23, '1984-12-21', 'Port Allietown', 'Malta', 'Married', '+1 (231) 938-7593', 'ezra.altenwerth@yahoo.com', '82426-0648', 'North Felicitatown', '107 Bergnaum Mountains', 'Indiana', '+1.629.455.3718', 'Female'),
(24, '2002-08-18', 'Port Trevion', 'Fiji', 'Single', '+1.563.363.6494', 'mills.donnell@walter.com', '49688-0437', 'Thorachester', '713 Royce Ports', 'Arizona', '1-770-818-1566', 'Male'),
(25, '1997-05-07', 'Adityamouth', 'Gibraltar', 'Married', '+1-859-421-8879', 'mosciski.julien@toy.com', '21986-1437', 'Helgafort', '33453 Carissa Trace', 'South Carolina', '1-740-562-3481', 'Male'),
(26, '2007-05-02', 'Kaelaview', 'Madagascar', 'Married', '(224) 807-0175', 'isaac.hayes@gmail.com', '78629-7574', 'Rosebury', '67921 Huel Manor Apt. 120', 'New Hampshire', '+1.786.863.0727', 'Female'),
(27, '1997-12-12', 'Lake Kamron', 'Turkey', 'Single', '(386) 822-3286', 'myrna.connelly@watsica.com', '00082', 'Abshireland', '99855 Giovanni Motorway Suite 299', 'Vermont', '1-541-886-2384', 'Male'),
(28, '1989-06-26', 'Fadelhaven', 'Cayman Islands', 'Single', '385.749.8617', 'jlockman@yahoo.com', '75065', 'South Emmitt', '3074 Christiansen Course', 'Georgia', '1-339-756-1952', 'Female'),
(29, '1984-10-28', 'New Elliot', 'Portugal', 'Married', '(559) 492-7397', 'reuben.sporer@kuvalis.info', '55893-9722', 'Port Gardner', '421 Reichel Curve Apt. 638', 'Connecticut', '1-830-369-6913', 'Female'),
(30, '1978-12-30', 'Port Ariellemouth', 'Israel', 'Single', '404-902-7646', 'schultz.mozell@leuschke.com', '75487', 'Lindshire', '82658 Reichel Centers', 'California', '+1.480.781.0504', 'Male'),
(31, '1983-08-04', 'Lake Kristown', 'Barbados', 'Single', '229.267.8469', 'percival22@hotmail.com', '24269-0718', 'New Berthaberg', '434 Toni Park', 'Rhode Island', '+1-248-631-8391', 'Male'),
(32, '1981-03-31', 'New Aubreyhaven', 'Cuba', 'Married', '1-484-837-5278', 'rosella.walsh@hotmail.com', '28677', 'Kevonland', '3127 Aufderhar Camp Apt. 811', 'New Jersey', '667-820-3017', 'Female'),
(33, '2017-11-21', 'Maximusborough', 'Djibouti', 'Single', '+1-689-265-4499', 'cortez.kuhn@heaney.com', '57513-2252', 'South Flaviemouth', '27560 Leffler Ports Apt. 665', 'Massachusetts', '229-835-4245', 'Female'),
(34, '2002-05-18', 'Claudborough', 'Mozambique', 'Single', '443-559-4154', 'ytowne@paucek.com', '33566-4883', 'Kunzeborough', '133 Jo Forge Suite 368', 'New York', '772.217.9629', 'Male'),
(35, '1981-03-02', 'Deannatown', 'Saudi Arabia', 'Married', '272.635.5917', 'ypollich@grimes.com', '25028-0796', 'Port Mariah', '32368 Deckow Road', 'Minnesota', '+1.845.279.0148', 'Male'),
(36, '1977-10-11', 'Nikolaushaven', 'Ukraine', 'Single', '+1 (563) 294-5004', 'stacy.sawayn@yahoo.com', '68031', 'Quinnville', '144 Ben Terrace Apt. 885', 'Illinois', '(951) 222-9187', 'Female'),
(37, '2002-07-08', 'Priscillaville', 'Guernsey', 'Divorced', '+18177960076', 'uterry@hotmail.com', '18415-2505', 'Jalenmouth', '521 Darrell Forge', 'Oklahoma', '1-636-275-3854', 'Female'),
(38, '1991-11-14', 'Edgardomouth', 'United Arab Emirates', 'Divorced', '714-925-3284', 'heather.hoeger@hane.com', '61990-6063', 'West Marieburgh', '16763 Balistreri Flat Apt. 417', 'Michigan', '314.950.9197', 'Male'),
(39, '1993-12-24', 'West Chaddberg', 'Cocos (Keeling) Islands', 'Single', '318.210.5851', 'rfunk@quigley.info', '80298', 'New Vitamouth', '638 Tyler Turnpike', 'South Carolina', '(949) 950-7048', 'Female'),
(40, '2000-02-10', 'Shakirastad', 'Afghanistan', 'Single', '1-938-270-7091', 'faye.smitham@hotmail.com', '57318', 'East Tabitha', '215 Strosin Cove', 'Georgia', '(937) 602-0428', 'Female'),
(41, '1981-12-14', 'New Philipmouth', 'Peru', 'Divorced', '+1-820-237-1580', 'jones.lauren@beer.net', '87397-3109', 'Lake Noah', '6614 Ryan Trace Suite 525', 'Oregon', '972.946.1734', 'Female'),
(42, '1986-11-03', 'Lake Wilbertburgh', 'Kuwait', 'Married', '(520) 978-5643', 'paucek.crystal@parisian.com', '73673', 'North Ivahland', '693 Schroeder Port Apt. 333', 'South Dakota', '346.917.1130', 'Female'),
(43, '1994-07-29', 'D\'Amoreview', 'Tuvalu', 'Single', '954.340.7880', 'emery91@dibbert.com', '70443', 'Violettechester', '771 Schoen Springs', 'California', '1-832-290-4773', 'Male'),
(44, '2008-02-26', 'Auermouth', 'Pakistan', 'Divorced', '1-951-294-0835', 'mschmitt@yahoo.com', '23629-8676', 'Eulaberg', '6661 Jovani Tunnel Apt. 982', 'Texas', '+1 (425) 966-9552', 'Male'),
(45, '1996-08-29', 'Lake Isaiah', 'Bulgaria', 'Married', '(412) 849-0116', 'dhane@hotmail.com', '41140-6960', 'South Bobbyberg', '104 White Centers Apt. 559', 'Michigan', '+1.341.332.6629', 'Female'),
(46, '1988-08-02', 'Hudsonbury', 'Japan', 'Divorced', '1-231-220-6396', 'lwisoky@quigley.com', '41759-7762', 'North Marcusside', '30687 Hank Locks', 'Ohio', '+17639019288', 'Male'),
(47, '1998-11-18', 'Lake Garry', 'Moldova', 'Divorced', '+1 (681) 384-2866', 'nitzsche.neva@kozey.com', '56687-3650', 'East Cale', '66526 Gerlach Trace Suite 457', 'South Dakota', '+18205598295', 'Male'),
(48, '2021-01-15', 'South Lilianabury', 'Guinea-Bissau', 'Divorced', '+1-380-491-4846', 'owalter@mohr.com', '30497-5412', 'Uptonside', '891 Schneider Summit', 'Hawaii', '+1 (534) 617-3224', 'Male'),
(49, '2021-02-03', 'Cartwrightport', 'Nauru', 'Single', '412.938.0172', 'bradley.west@haley.org', '98118', 'Lake Vesta', '243 Rigoberto Prairie', 'Alabama', '651-254-6567', 'Male'),
(50, '2006-08-19', 'New Juniusland', 'Jamaica', 'Single', '681-853-1263', 'kunze.erich@champlin.com', '06498', 'Lake Gaylordburgh', '9560 Emanuel Groves', 'Missouri', '985-730-4651', 'Male'),
(51, '2002-04-08', 'Port Fannyhaven', 'Montenegro', 'Married', '458.266.3500', 'eugenia.steuber@hickle.com', '19984', 'West Fredericshire', '25865 Koch Hollow', 'District of Columbia', '(201) 622-3668', 'Male'),
(52, '2021-12-25', 'Port Marian', 'Martinique', 'Single', '1-417-968-1935', 'tromp.durward@crona.biz', '47234', 'South Angie', '33599 Beatty Spurs Apt. 859', 'Ohio', '(212) 219-1887', 'Female'),
(53, '2000-03-03', 'Elissaberg', 'Syrian Arab Republic', 'Divorced', '706.684.3553', 'cara.nikolaus@hotmail.com', '03396', 'Pagacbury', '3772 Pouros Neck', 'California', '847-523-6988', 'Male'),
(54, '1974-03-11', 'West Emilio', 'Mayotte', 'Divorced', '505-921-9916', 'white.heath@grant.info', '42316-7409', 'Sedrickmouth', '36666 Donnelly Creek Apt. 728', 'District of Columbia', '463.532.8627', 'Female'),
(55, '1995-04-15', 'Roweport', 'Korea', 'Single', '802.531.8991', 'katlynn.parisian@daugherty.com', '47687', 'Abshireland', '986 Jakubowski Cliff', 'Wyoming', '979-514-3183', 'Female'),
(56, '2018-08-24', 'Port Grover', 'Mexico', 'Divorced', '520-757-9400', 'noemy27@littel.com', '75310', 'Lake Mariellehaven', '335 Stehr Streets', 'Minnesota', '(351) 363-2370', 'Male'),
(57, '1974-12-10', 'Lake Dangeloton', 'Myanmar', 'Single', '+1.740.779.2964', 'mmccullough@hotmail.com', '49398', 'South Sherman', '19442 Stokes Village', 'Mississippi', '262-447-1244', 'Female'),
(58, '2012-01-09', 'Daijaborough', 'Saint Helena', 'Married', '478-542-3916', 'dedric58@waters.com', '71872', 'Zachariahview', '3133 Cartwright Parks Suite 856', 'Alabama', '(445) 935-9956', 'Female'),
(59, '2001-04-03', 'West Enid', 'South Georgia and the South Sandwich Islands', 'Married', '(308) 218-8175', 'cboyle@mertz.com', '46384', 'Rossieport', '52598 Jason Port Suite 512', 'New Jersey', '1-941-717-4287', 'Male'),
(60, '1973-01-12', 'Riceside', 'Peru', 'Single', '970.699.7722', 'lonie.hagenes@gislason.com', '82649-4734', 'Anibalhaven', '612 Marlon Groves Suite 686', 'Oklahoma', '763.930.9272', 'Male'),
(61, '2014-05-05', 'West Lamarburgh', 'Albania', 'Divorced', '(904) 430-8643', 'madonna.runolfsdottir@hotmail.com', '59591-3857', 'South Adelinetown', '753 Curtis Lodge Apt. 004', 'Pennsylvania', '1-559-956-3448', 'Male'),
(62, '1971-11-22', 'East Rashawnburgh', 'Guam', 'Divorced', '585-666-4162', 'rachelle37@yahoo.com', '01767-2618', 'Birdiechester', '3803 Alverta Turnpike', 'Texas', '1-980-257-4077', 'Female'),
(63, '1970-08-31', 'Jakubowskitown', 'Syrian Arab Republic', 'Married', '(914) 330-9290', 'nella83@orn.net', '41069', 'East Grover', '970 Turner Mountain', 'Kansas', '414-819-1843', 'Female'),
(64, '1975-01-07', 'North Tristinshire', 'Guernsey', 'Single', '573-823-3658', 'herman99@weber.com', '64737-4414', 'Ozellaberg', '9873 Piper Rapid', 'North Carolina', '412-409-2840', 'Female'),
(65, '1997-06-26', 'Reynoldtown', 'Mongolia', 'Married', '325.535.3418', 'mraz.emanuel@gleason.net', '88767', 'Lake Emile', '988 Carol Trafficway', 'Rhode Island', '(580) 781-2522', 'Male'),
(66, '1997-07-31', 'Feeneyburgh', 'Christmas Island', 'Single', '(352) 224-8508', 'collin.brown@collins.com', '73418-0414', 'Port Fridamouth', '78930 Ardella Dale', 'Oklahoma', '828-343-7497', 'Male'),
(67, '1987-05-15', 'Magnoliamouth', 'Nicaragua', 'Divorced', '856.974.4584', 'loren.stokes@hotmail.com', '98088', 'Port Dustinfort', '805 Orrin Ramp Suite 623', 'Utah', '(732) 942-7669', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `employee_notifies`
--

CREATE TABLE `employee_notifies` (
  `employee_id` int(5) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `relationship` varchar(90) DEFAULT NULL,
  `mobile_no` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_notifies`
--

INSERT INTO `employee_notifies` (`employee_id`, `name`, `relationship`, `mobile_no`, `address`) VALUES
(19, 'Kenya Schroeder IV', 'Spouse', '1-940-474-1244', '5981 Kirlin Glen\nEast Rod, ME 15587'),
(20, 'Kamryn Bergnaum', 'Sibling', '+1-205-539-8063', '2587 Koss Meadows Apt. 138\nHansenhaven, FL 41231-3261'),
(21, 'Margarett Thompson MD', 'Parent', '1-810-577-1793', '1732 Keven Lock Apt. 432\nNew Lizatown, FL 37945-9693'),
(22, 'Dejah Walker', 'Spouse', '+1-986-510-9137', '637 Douglas Station Suite 460\nEast Hillard, WA 53001-0077'),
(23, 'Mrs. Amelie Gaylord V', 'Other', '+1.551.528.4381', '9212 Little Club\nNorth Mortonstad, MD 04214-4346'),
(24, 'Sabryna Wolff', 'Spouse', '+1.908.712.0463', '4097 Eli Island\nTrevorhaven, MT 30681-6528'),
(25, 'Linwood Mohr', 'Parent', '+1.920.489.0840', '521 Renner Islands\nNew Neha, NM 52120'),
(26, 'Brendan Eichmann', 'Other', '334-964-2786', '22446 Thalia Ramp\nSouth Sam, OR 96772-3396'),
(27, 'Dr. Juvenal Toy', 'Spouse', '+13417785644', '89778 Murazik Roads\nCullenchester, IL 76665'),
(28, 'Dr. Kade Fritsch', 'Parent', '909-472-8539', '63487 Jameson Court Apt. 852\nLake Buckport, AL 62448'),
(29, 'Prof. Carole Davis', 'Sibling', '+1-810-423-5818', '223 Elsa Turnpike Suite 199\nHansenshire, OK 31269'),
(30, 'Chaya Lindgren', 'Other', '(425) 827-0269', '325 Ziemann Rapid Suite 738\nEast Adelleburgh, NY 97345'),
(31, 'Cristina Wilkinson III', 'Sibling', '+1.678.382.5296', '2575 Weimann Squares Suite 878\nKochmouth, IN 45049'),
(32, 'Jerad Gerlach', 'Spouse', '(938) 854-6756', '11871 Gordon Green\nEast Barrett, ND 18156'),
(33, 'Jody Kreiger', 'Other', '650-808-1630', '4265 Buckridge Stravenue Apt. 148\nBernhardview, AL 10190-8353'),
(34, 'Arch Bruen MD', 'Sibling', '(651) 829-2445', '3291 Kunde Roads\nZulauffurt, UT 34215-1710'),
(35, 'Margaretta Kuhlman', 'Spouse', '951-291-1772', '8224 Forest Field\nFranciscaside, IN 96971-0905'),
(36, 'Jovan Cole', 'Sibling', '518.279.6880', '808 Kshlerin River Suite 141\nLeannonton, OR 45464-4695'),
(37, 'Archibald Grant', 'Parent', '(972) 953-7753', '4638 Fisher Streets Apt. 742\nNorth Paxton, FL 47975-8054'),
(38, 'Prof. Laurianne Schaden', 'Sibling', '551.959.1041', '17369 Patsy Avenue\nEast Antonechester, NV 40182'),
(39, 'Abigale Stanton DDS', 'Spouse', '1-321-919-8957', '93924 Celine Island\nNew Jamalstad, NH 95139-8466'),
(40, 'Barrett Reichert', 'Sibling', '760-544-9008', '57560 Jaunita Glen Suite 150\nWest Joesphton, OK 28155-0627'),
(41, 'Meta Schamberger', 'Spouse', '(706) 275-2555', '5605 Silas Inlet Suite 900\nJalonmouth, MS 45701-7466'),
(42, 'Hubert Homenick', 'Parent', '361.889.7267', '77793 Dicki Fall Suite 736\nPort Lisashire, OK 30867'),
(43, 'Bret Fritsch III', 'Sibling', '(828) 779-2577', '459 Austen Pass Suite 851\nPort Katelynmouth, WY 36016-0803'),
(44, 'Murray Keebler I', 'Other', '(321) 677-6808', '8901 Gutkowski Flats Apt. 109\nPort Shayne, NC 87306'),
(45, 'Raven Mertz', 'Parent', '+12697694956', '6017 John Fork Suite 299\nNorth Rosanna, NM 85541'),
(46, 'Dorcas Bailey', 'Spouse', '(240) 658-4992', '2374 McKenzie Parks Suite 096\nNorth Aiyanaberg, AK 09660-0303'),
(47, 'Kaya Doyle III', 'Parent', '701-218-6370', '1007 Jakubowski Brooks Suite 294\nEast Mozellport, CO 53352-7183'),
(48, 'Ms. Ora Yost', 'Spouse', '+1 (352) 448-2946', '99136 Emard Mill Apt. 859\nNorth Christopher, SC 34964'),
(49, 'Chanel Runolfsdottir', 'Parent', '(530) 952-5072', '936 Clara Mountain Apt. 828\nMaggioport, NJ 05350'),
(50, 'Kenna Jenkins', 'Spouse', '(573) 368-0930', '2544 Zemlak Branch Apt. 707\nSipesmouth, ME 50278'),
(51, 'Noel Kuhic', 'Parent', '+1-540-248-3433', '1215 Conroy Coves Apt. 103\nWiegandland, NY 54950-8919'),
(52, 'Marjolaine Mosciski', 'Other', '+13606260309', '28414 Lera Brooks\nMadelineberg, OR 83506'),
(53, 'Patrick Franecki', 'Parent', '(252) 505-7684', '82844 Johns Place\nEast Lizafort, NJ 44659-1907'),
(54, 'Cassandre Lindgren', 'Parent', '+1 (951) 432-1957', '65688 Chester Row Apt. 872\nWest Maymieburgh, NY 50603'),
(55, 'Mrs. Cecile Hickle', 'Spouse', '336.262.5549', '652 Ledner Green\nHoweville, OR 52814'),
(56, 'Clair Orn I', 'Spouse', '+1.925.447.7613', '2294 Champlin Villages\nVerniechester, MO 64974-6446'),
(57, 'Ashton Hoeger', 'Parent', '872-753-1706', '27278 Darrick Mountains\nSouth Ivaville, NM 99492-2848'),
(58, 'Angeline Olson', 'Parent', '1-323-923-7987', '237 Anderson Crossroad\nSpencerport, WV 52952-6119'),
(59, 'Verlie Osinski V', 'Spouse', '+1-629-476-7784', '795 Renner Station\nEast Robbburgh, OH 69459-1906'),
(60, 'Aaliyah Champlin', 'Parent', '913-461-2733', '8642 Johnson Light Apt. 087\nHerzogstad, HI 23896-2906'),
(61, 'Mr. Karson Hilpert MD', 'Spouse', '281.416.7062', '52348 Fredy Extension\nWuckertton, ND 42366-6124'),
(62, 'Dr. Palma Kihn Sr.', 'Other', '361-774-7464', '4783 Odie Cliffs\nNew Hester, NC 35767'),
(63, 'Barry Champlin', 'Sibling', '+1-870-389-1588', '90183 Koepp Stream Suite 679\nPablobury, SC 69327-0236'),
(64, 'Rolando Lynch', 'Sibling', '1-847-803-5261', '595 Garnet Knolls\nProhaskaview, OK 74469-8494'),
(65, 'Caleb Kautzer', 'Spouse', '(513) 726-9894', '39710 Garett Roads\nSouth Carlottaland, WI 58191'),
(66, 'Caesar Herzog', 'Spouse', '(412) 264-1137', '94013 Adeline Ford\nSigridshire, WV 19321'),
(67, 'Elsie Fritsch', 'Spouse', '860.902.6192', '24771 Kuhn Route Suite 320\nEast Bradley, WV 99470-4929');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(90) DEFAULT NULL,
  `approve` varchar(90) DEFAULT NULL,
  `leavetype_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `employee_id`, `start_date`, `end_date`, `status`, `approve`, `leavetype_id`) VALUES
(17, 19, '2024-01-15', '2024-01-20', 'pending', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `leavetype_id` int(11) NOT NULL,
  `leave_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`leavetype_id`, `leave_type_name`) VALUES
(1, 'Sick Leave'),
(2, 'Holiday Leave'),
(3, 'Birthday Leave'),
(4, 'Maternity Leave');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `location_id` int(5) NOT NULL,
  `location` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`location_id`, `location`) VALUES
(1, 'Work From Home'),
(2, 'On-Site'),
(3, 'field');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `position_name` varchar(50) NOT NULL,
  `position_status` enum('Added','Update','Deleted','') NOT NULL,
  `position_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `department_id`, `position_name`, `position_status`, `position_timestamp`, `deleted_at`) VALUES
(1, 1, 'Head of HR', 'Added', '2023-08-01 16:24:09', NULL),
(2, 1, 'Human Resource', 'Added', '2023-09-22 14:12:50', NULL),
(3, 2, 'Accounting 2', 'Update', '2023-12-26 07:59:00', NULL),
(4, 6, 'Team Leader (Research & Development)', 'Update', '2024-01-11 13:19:17', NULL),
(5, 5, 'Team Leader (Business Planning)', 'Update', '2024-01-02 09:24:25', NULL),
(6, 7, 'Team Leader (Operations)', 'Update', '2024-01-02 09:24:02', NULL),
(7, NULL, 'Testing', 'Deleted', '2024-01-11 13:01:14', '2024-01-11 13:01:14'),
(8, 1, 'dasfdsafsadfsd', 'Deleted', '2024-01-11 13:17:45', '2024-01-11 13:17:45'),
(9, 3, 'Testing', 'Deleted', '2024-01-11 13:34:13', '2024-01-11 13:34:13'),
(10, 2, 'Team Leader (Finance & Accounting)', 'Update', '2024-01-11 13:41:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'employee');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(400) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `role` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `employee_id`, `role`) VALUES
(9, 'User', '$2y$10$l93hRKu6oFJz7VmH/Fdte.2wexC/Y7RtZ.YIRXPwb6QK53IX3402.', 18, 1),
(10, 'Employee', '$2y$10$cwCd/XVeV62mjKKoIVqnEuWNhiFTbx/3W.kbbrsvboqVu2CHWFwn6', 67, 2),
(11, 'Moses_Yundt', '$2y$10$GnYEx1zIwJA8LPOxyuUeAOTztAAtY3UATx2NzIdl8puHGUEClrDw6', 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `workschedule`
--

CREATE TABLE `workschedule` (
  `schedule_id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workschedule`
--

INSERT INTO `workschedule` (`schedule_id`, `start_time`, `end_time`) VALUES
(9, '08:00:00', '09:00:00'),
(10, '10:00:00', '17:00:00'),
(11, '11:00:00', '20:00:00'),
(12, '12:00:00', '22:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `fk_employees_position` (`position_id`),
  ADD KEY `fk_employees_department` (`department_id`);

--
-- Indexes for table `employee_docs`
--
ALTER TABLE `employee_docs`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_informations`
--
ALTER TABLE `employee_informations`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `employee_notifies`
--
ALTER TABLE `employee_notifies`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`leave_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`leavetype_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`),
  ADD KEY `positions_ibfk_1` (`department_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `workschedule`
--
ALTER TABLE `workschedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `employee_docs`
--
ALTER TABLE `employee_docs`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `employee_informations`
--
ALTER TABLE `employee_informations`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `employee_notifies`
--
ALTER TABLE `employee_notifies`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `leavetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `location_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `workschedule`
--
ALTER TABLE `workschedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE SET NULL;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
