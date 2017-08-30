-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2017 at 08:06 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrp`
--

-- --------------------------------------------------------

--
-- Table structure for table `addfamilymembers`
--

CREATE TABLE `addfamilymembers` (
  `AFM_ID` int(10) UNSIGNED NOT NULL,
  `Parent` int(11) DEFAULT NULL,
  `Child` int(11) DEFAULT NULL,
  `Priority` int(11) DEFAULT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MiddleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `MobileNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` blob,
  `Age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Relationship` int(11) DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MarriedSince` date DEFAULT NULL,
  `NoOfChildrens` int(11) DEFAULT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addfamilymembers`
--

INSERT INTO `addfamilymembers` (`AFM_ID`, `Parent`, `Child`, `Priority`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DOB`, `MobileNo`, `Image`, `Age`, `Relationship`, `Nationality`, `Religion`, `MaritalStatus`, `MarriedSince`, `NoOfChildrens`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 1, 'Mr.', 'Bala', 'Guravaiah', 'K', 'Male', '2019-07-08', NULL, NULL, '40', 6, 'Indian', 'Hindu', 'Married', '2062-06-08', 3, 1, 1, NULL, '2017-08-19 14:20:43', '2017-08-21 12:36:54'),
(3, NULL, NULL, 2, 'Mis.', 'Samrajayam', NULL, 'K', 'Female', '2019-06-08', NULL, NULL, '41', 7, 'Indian', 'Hindu', 'Married', '2062-06-08', 3, 1, 1, NULL, '2017-08-19 14:23:02', '2017-08-19 14:55:04'),
(4, 2, NULL, 5, 'Mr.', 'Balakrishna', NULL, 'K', 'Male', '2018-09-08', '123456', 0x55324e686269416f4d536b75616e426e, '29', 4, 'Indian', 'Hindu', 'Single', '2092-06-08', 1, 1, 1, NULL, '2017-08-21 14:16:51', '2017-08-21 14:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `addfriendsrelatives`
--

CREATE TABLE `addfriendsrelatives` (
  `AFR_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MiddleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `MobileNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` blob NOT NULL,
  `Age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MarriedSince` date DEFAULT NULL,
  `NoOfChildrens` int(11) DEFAULT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addfriendsrelatives`
--

INSERT INTO `addfriendsrelatives` (`AFR_ID`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DOB`, `MobileNo`, `Image`, `Age`, `Relationship`, `Nationality`, `Religion`, `MaritalStatus`, `MarriedSince`, `NoOfChildrens`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', 'Roop', 'R', 'R', 'Male', '2019-07-08', '9494822568', '', '27', 'Friend', 'Indian', 'Hindu', 'Divorced', '2019-07-08', 1, 1, 1, NULL, '2017-08-21 12:06:12', '2017-08-21 12:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `generaladdress`
--

CREATE TABLE `generaladdress` (
  `GA_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `AddressType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HouseNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Street` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AddressLine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PostalCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GeographicalAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generaladdress`
--

INSERT INTO `generaladdress` (`GA_ID`, `MetaID`, `ToWhom`, `AddressType`, `HouseNo`, `Street`, `AddressLine`, `City`, `Country`, `PostalCode`, `GeographicalAddress`, `ValidFrom`, `ValidTo`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PAN', '2-12', 'KPHB', 'Fine', 'Bangalore', 'USA', '560087', 'Hi', '2017-01-08', '2018-04-08', 1, 1, NULL, '2017-08-23 12:51:05', '2017-08-23 12:51:05'),
(2, 2, 2, 'PAN2', 'undefined/12/2', 'KPHB', 'Fine', 'Bangalore', 'India', '560087', 'Hi', '2017-03-08', '2017-04-08', 1, 1, NULL, '2017-08-30 10:22:06', '2017-08-30 10:24:37'),
(3, 1, 1, 'PAN1', 'undefined/12/2', 'KPHB', 'Fine', 'Bangalore', 'USA', '560087', 'Hi', '2017-01-08', '2018-04-08', 1, 1, NULL, '2017-08-30 10:23:38', '2017-08-30 10:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `generalcommunications`
--

CREATE TABLE `generalcommunications` (
  `GC_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `CommunicationType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Details` text COLLATE utf8mb4_unicode_ci,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalcommunications`
--

INSERT INTO `generalcommunications` (`GC_ID`, `MetaID`, `ToWhom`, `ValidFrom`, `ValidTo`, `CommunicationType`, `Details`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-04-08', '2017-08-08', 'fee', 'fee', 1, 1, NULL, '2017-08-23 13:32:38', '2017-08-30 10:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `generalpersonaldata`
--

CREATE TABLE `generalpersonaldata` (
  `GPD_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MiddleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MarriedSince` date NOT NULL,
  `NoOfChildrens` int(11) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalpersonaldata`
--

INSERT INTO `generalpersonaldata` (`GPD_ID`, `MetaID`, `ToWhom`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DOB`, `Age`, `Nationality`, `Religion`, `MaritalStatus`, `MarriedSince`, `NoOfChildrens`, `ValidFrom`, `ValidTo`, `Status`, `Txnuser`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 'Mr.', 'Ram', 'krishna', 'K', 'Male', '2019-07-08', '27', 'India', 'Hindu', 'Single', '2019-06-08', 1, '2017-09-08', '2017-09-08', 1, 1, NULL, '2017-08-18 11:33:35', '2017-08-21 13:40:41'),
(2, 1, 1, 'Mr.', 'Ramakrishna', 'krishna', 'K', 'Male', '2019-07-08', '27', 'India', 'Hindu', 'Single', '2019-06-08', 1, '2017-09-08', '2017-09-08', 1, 1, NULL, '2017-08-18 11:33:35', '2017-08-21 13:51:22'),
(3, 3, 1, 'Mr.', 'Krishna', 'krishna', 'K', 'Male', '2019-07-08', '27', 'India', 'Hindu', 'Single', '2019-06-08', 1, '2017-09-08', '2017-09-08', 1, 1, NULL, '2017-08-18 11:33:35', '2017-08-21 13:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `generalpersonalids`
--

CREATE TABLE `generalpersonalids` (
  `GPI_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `IDType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `IDNO` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PlaceOfIssue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CountryOfIssue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IssueingAuthority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateOfIssue` date NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalpersonalids`
--

INSERT INTO `generalpersonalids` (`GPI_ID`, `MetaID`, `ToWhom`, `IDType`, `IDNO`, `PlaceOfIssue`, `CountryOfIssue`, `Country`, `Region`, `IssueingAuthority`, `DateOfIssue`, `ValidFrom`, `ValidTo`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'PAN', '1652', 'Hyderbad', 'India', 'India', 'Hindu', 'Hi', '2019-07-08', '2017-02-08', '2018-04-08', 1, 1, NULL, '2017-08-30 10:51:26', '2017-08-30 10:51:26'),
(2, 1, 1, 'Passport', '1652', 'Hyderbad', 'India', 'UK', 'Hindu', 'Hi', '2019-07-08', '2017-02-08', '2018-04-08', 1, 1, NULL, '2017-08-30 10:56:24', '2017-08-30 10:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `generaltravelinfo`
--

CREATE TABLE `generaltravelinfo` (
  `GTI_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `FromDate` date NOT NULL,
  `FromTime` time DEFAULT NULL,
  `ToDate` date NOT NULL,
  `ToTime` time DEFAULT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherPurpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comments` longtext COLLATE utf8mb4_unicode_ci,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generaltravelinfo`
--

INSERT INTO `generaltravelinfo` (`GTI_ID`, `MetaID`, `ToWhom`, `FromDate`, `FromTime`, `ToDate`, `ToTime`, `Country`, `Region`, `Purpose`, `OtherPurpose`, `Comments`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2017-02-08', '02:56:00', '2017-09-08', '23:20:00', 'UK', 'Hindu', 'Emo', 'Hi', 'Hi', 1, 1, NULL, '2017-08-30 11:32:24', '2017-08-30 11:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `metadata`
--

CREATE TABLE `metadata` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metadata`
--

INSERT INTO `metadata` (`id`, `name`, `value`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Whom', 'Self', 1, NULL, NULL, NULL),
(2, 'Whom', 'Family Member', 1, NULL, NULL, NULL),
(3, 'Whom', 'Relatives & Friends', 1, NULL, NULL, NULL),
(4, 'Relationship', 'GrandMother', 1, NULL, NULL, NULL),
(5, 'Relationship', 'GrandFather', 1, NULL, NULL, NULL),
(6, 'Relationship', 'Father', 1, NULL, NULL, NULL),
(7, 'Relationship', 'Mother', 1, NULL, NULL, NULL),
(8, 'Relationship', 'Brother', 1, NULL, NULL, NULL),
(9, 'Relationship', 'Sister', 1, NULL, NULL, NULL),
(10, 'Relationship', 'Brother-in-law', 1, NULL, NULL, NULL),
(11, 'Relationship', 'Sister-in-law', 1, NULL, NULL, NULL),
(12, 'Relationship', 'Daughter', 1, NULL, NULL, NULL),
(13, 'Relationship', 'Son', 1, NULL, NULL, NULL),
(14, 'Relationship', 'Wife', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2017_08_03_145836_change_user_table', 1),
(31, '2017_08_03_182535_create_personelids_table', 1),
(32, '2017_08_03_183835_metadata', 1),
(33, '2017_08_03_184543_general_personaldata', 1),
(34, '2017_08_16_173513_generaladdress', 1),
(35, '2017_08_18_174613_addfamilymembers', 2),
(36, '2017_08_19_124351_addfriendsrelatives', 2),
(42, '2017_08_21_192957_damitable6', 3),
(43, '2017_08_23_174256_damitable7', 4),
(44, '2017_08_23_181232_damitable8', 5),
(45, '2017_08_23_181458_damitable9', 6),
(46, '2017_08_23_183229_generalcommunications', 7),
(47, '2017_08_30_160209_generalpersonalIds', 8),
(48, '2017_08_30_164546_generaltravelinfo', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personelids`
--

CREATE TABLE `personelids` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `id_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_issue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_authority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female','others') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `l_name`, `email`, `mobile`, `dob`, `gender`, `photo_path`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramakrishna', NULL, 'ramascoolguy@gmail.com', NULL, NULL, NULL, NULL, 1, '$2y$10$FqQ8bftKeVvUvKv2buQTzue3XZtQ1aw95CJ8NGDYgXbnw3MPl9owC', NULL, '2017-08-18 11:21:09', '2017-08-18 11:21:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addfamilymembers`
--
ALTER TABLE `addfamilymembers`
  ADD PRIMARY KEY (`AFM_ID`);

--
-- Indexes for table `addfriendsrelatives`
--
ALTER TABLE `addfriendsrelatives`
  ADD PRIMARY KEY (`AFR_ID`);

--
-- Indexes for table `generaladdress`
--
ALTER TABLE `generaladdress`
  ADD PRIMARY KEY (`GA_ID`);

--
-- Indexes for table `generalcommunications`
--
ALTER TABLE `generalcommunications`
  ADD PRIMARY KEY (`GC_ID`);

--
-- Indexes for table `generalpersonaldata`
--
ALTER TABLE `generalpersonaldata`
  ADD PRIMARY KEY (`GPD_ID`);

--
-- Indexes for table `generalpersonalids`
--
ALTER TABLE `generalpersonalids`
  ADD PRIMARY KEY (`GPI_ID`);

--
-- Indexes for table `generaltravelinfo`
--
ALTER TABLE `generaltravelinfo`
  ADD PRIMARY KEY (`GTI_ID`);

--
-- Indexes for table `metadata`
--
ALTER TABLE `metadata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personelids`
--
ALTER TABLE `personelids`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personelids_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addfamilymembers`
--
ALTER TABLE `addfamilymembers`
  MODIFY `AFM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `addfriendsrelatives`
--
ALTER TABLE `addfriendsrelatives`
  MODIFY `AFR_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `generaladdress`
--
ALTER TABLE `generaladdress`
  MODIFY `GA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `generalcommunications`
--
ALTER TABLE `generalcommunications`
  MODIFY `GC_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `generalpersonaldata`
--
ALTER TABLE `generalpersonaldata`
  MODIFY `GPD_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `generalpersonalids`
--
ALTER TABLE `generalpersonalids`
  MODIFY `GPI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `generaltravelinfo`
--
ALTER TABLE `generaltravelinfo`
  MODIFY `GTI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `personelids`
--
ALTER TABLE `personelids`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `personelids`
--
ALTER TABLE `personelids`
  ADD CONSTRAINT `personelids_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
