-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2021 at 04:52 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nrsc`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(15) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `user_id` varchar(15) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email_address` varchar(30) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `department_name` varchar(15) NOT NULL,
  `login_session_key` varchar(255) DEFAULT NULL,
  `email_status` varchar(255) DEFAULT NULL,
  `password_expire_date` datetime DEFAULT '2021-11-12 00:00:00',
  `password_reset_key` varchar(255) DEFAULT NULL,
  `account_status` varchar(255) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `surname`, `gender`, `user_id`, `password`, `email_address`, `phone_no`, `department_name`, `login_session_key`, `email_status`, `password_expire_date`, `password_reset_key`, `account_status`) VALUES
(10001, 'CHRISTOPHER', 'SHILENGWE', 'Male', 'SHILENGWE93', '$2y$10$Dt0Duwws8FVY/cW0pCwOuerDWUVQfnfied.K/B.zcR3d7Fmz/fZbK', 'shilengwe93@gmail.com', 962030038, 'Administrator', '05375db9057e02d9f4bfc30eacb465c2', NULL, '2021-11-12 00:00:00', NULL, 'Active'),
(10011, 'LIN', 'LIN', 'Female', 'LIN', '$2y$10$ZGYCHZm8yb.68zJpgbG9tOd.vBOZLrfCid28uLHHCDxv.t.mw10/y', 'lin@gmail.com', 45645, 'technical', NULL, NULL, '2021-11-12 00:00:00', NULL, 'Active'),
(17296, 'NKISU', 'LONGWE', 'Male', 'NKISU', '$2y$10$nXRXEW33GkhqbGsorErD8.rT3nGtHSw.JpDtzL1zlhWv7F08SKENG', 'nkisu@gmail.com', 966325845, 'lands', NULL, NULL, '2021-11-12 00:00:00', NULL, 'Active'),
(53871, 'LULU', 'MWAPE', 'Female', 'LULU', '$2y$10$0kO.LeuqrtQLswXMH/stdOz2deYRIz5c2XoBPIfmvr26Iv1Bn/PrG', 'lulu@gmail.com', 43, 'finance', NULL, NULL, '2021-11-12 00:00:00', NULL, 'Active'),
(55000, 'PO', 'PO', 'Male', 'PO', '$2y$10$tep1ejCkXVGD6J93e9L6QOE5Qg/XdRV2MkFwQAt.ljcoKVlXTFJVW', 'po@gmail.com', 1588745, 'lands', NULL, NULL, '2021-11-12 00:00:00', NULL, 'Active'),
(2019066459, 'ESTHER', 'MWAPE', 'Female', 'ESTHER', '$2y$10$sf3CrY/MLHZ9i2zzDboM.enTv9njJzINdDzSmYiPP.PdX5I7L553O', 'hmwape51@gmail.com', 969285639, 'Finance', NULL, NULL, '2021-11-12 00:00:00', NULL, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `reciept_number` varchar(15) NOT NULL,
  `farm_number` varchar(15) NOT NULL,
  `employee_id` int(15) NOT NULL,
  `amount_paid` int(20) NOT NULL,
  `date_paid` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `finance`
--

INSERT INTO `finance` (`reciept_number`, `farm_number`, `employee_id`, `amount_paid`, `date_paid`, `status`) VALUES
('10005', '1001', 53871, 0, '2021-01-01', 'awaiting_payment'),
('10006', 'as8874155', 53871, 50000, '2021-01-15', 'paid'),
('10007', '1002', 53871, 0, '2021-02-20', 'cancelled'),
('10008', '7744', 53871, 70000, '2021-04-08', 'paid'),
('10009', '9854', 53871, 53000, '2021-07-01', 'paid'),
('10010', '9000', 53871, 10000, '2021-10-14', 'paid');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `farm_number` varchar(15) NOT NULL,
  `district` varchar(20) NOT NULL,
  `date_of_request` date NOT NULL,
  `attachment` blob NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `company_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`farm_number`, `district`, `date_of_request`, `attachment`, `first_name`, `surname`, `phone_number`, `company_name`) VALUES
('1001', 'KITWE', '2020-12-01', 0x687474703a2f2f6c6f63616c686f73742f726571756573746d616e6167656d656e742f75706c6f6164732f66696c65732f4c656967685f4261726475676f5f2d5f536861646f775f616e645f426f6e652e706466, 'MAX', 'ZULU', 955874585, 'NULL'),
('1002', 'MONGU', '2021-02-10', 0x687474703a2f2f6c6f63616c686f73742f726571756573746d616e6167656d656e742f75706c6f6164732f66696c65732f4c65696768204261726475676f202d20546865204772697368612030312c35202d20546865205461696c6f72202832334d617932303133292e65707562, 'PUMULO', 'NALISHEBO', 977458545, 'ASTRA'),
('3224', 'KITWE', '2021-10-26', 0x687474703a2f2f6c6f63616c686f73742f72716d616e6167656d656e742f75706c6f6164732f66696c65732f6e343565316976786a5f37396762632e786c7378, 'FRED', 'M', 45, ''),
('7744', 'MONZE', '2021-04-01', 0x687474703a2f2f6c6f63616c686f73742f72716d616e6167656d656e742f75706c6f6164732f66696c65732f756d6a3772667673357a6c386f62642e646f6378, 'joe', 'PHIRI', 787855, ''),
('8975', 'KALULUSHI', '2021-09-07', 0x687474703a2f2f6c6f63616c686f73742f72716d616e6167656d656e742f75706c6f6164732f66696c65732f6a71686e643433696567796b74776f2e637376, 'JERRY', 'LOMBO', 9866455, ''),
('9000', 'KITWE', '2021-01-01', 0x687474703a2f2f6c6f63616c686f73742f72716d616e6167656d656e742f75706c6f6164732f66696c65732f79726c68327a306b3574656e6273782e637376, 'PHILIP', 'SUNTWE', 45, 'NULL'),
('9854', 'LUPOSOSHI', '2021-11-01', 0x687474703a2f2f6c6f63616c686f73742f72716d616e6167656d656e742f75706c6f6164732f66696c65732f387a64796a6261706e785f317476672e786c7378, 'MIKE', 'ZAZU', 5855467, 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `works_on`
--

CREATE TABLE `works_on` (
  `employee_id` int(15) NOT NULL,
  `farm_number` varchar(15) NOT NULL,
  `progress` int(11) NOT NULL,
  `date` date NOT NULL,
  `report` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `works_on`
--

INSERT INTO `works_on` (`employee_id`, `farm_number`, `progress`, `date`, `report`) VALUES
(10001, '9000', 100, '2021-08-27', 0x687474703a2f2f6c6f63616c686f73742f7465737466696e616c2f75706c6f6164732f66696c65732f783865706c613775716e5f623631772e657075622c687474703a2f2f6c6f63616c686f73742f7465737466696e616c2f75706c6f6164732f66696c65732f38646761766d666b6f7836757465372e6a7067),
(97365, '1002', 50, '2021-08-21', 0x687474703a2f2f6c6f63616c686f73742f7465737466696e616c2f75706c6f6164732f66696c65732f6f6b776e6a336561696379707376722e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`reciept_number`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`farm_number`);

--
-- Indexes for table `works_on`
--
ALTER TABLE `works_on`
  ADD PRIMARY KEY (`employee_id`,`farm_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
