-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 06:55 PM
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
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `MobileNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MarriedSince` date DEFAULT NULL,
  `NoOfChildrens` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addfamilymembers`
--

INSERT INTO `addfamilymembers` (`AFM_ID`, `Parent`, `Child`, `Priority`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DOB`, `MobileNo`, `Image`, `Folder`, `Age`, `Relationship`, `Nationality`, `Religion`, `MaritalStatus`, `MarriedSince`, `NoOfChildrens`, `Status`, `Txnuser`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 3, 'Mr.', 'Bala', 'Krishna', 'K', '1', '2018-11-10', '9676322867', '', NULL, '28', '8', 'Indian', 'Hindu', '1', '2018-11-10', NULL, 1, 1, NULL, '2017-10-11 10:56:53', '2017-10-11 10:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `addfriendsrelatives`
--

CREATE TABLE `addfriendsrelatives` (
  `AFR_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MiddleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `MobileNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Age` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MarriedSince` date DEFAULT NULL,
  `NoOfChildrens` int(11) DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addfriendsrelatives`
--

INSERT INTO `addfriendsrelatives` (`AFR_ID`, `Title`, `FirstName`, `MiddleName`, `LastName`, `Gender`, `DOB`, `MobileNo`, `Image`, `Folder`, `Age`, `Relationship`, `Nationality`, `Religion`, `MaritalStatus`, `MarriedSince`, `NoOfChildrens`, `Status`, `Txnuser`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Mr.', 'Roop', 'Shiva', 'R', '1', '2019-07-10', '9676322867', '', NULL, '28', 'Relative', 'Indian', 'Hindu', '1', '2019-07-10', 1, 1, 1, NULL, '2017-10-11 10:59:02', '2017-10-11 10:59:02');

-- --------------------------------------------------------

--
-- Table structure for table `common_childmaster`
--

CREATE TABLE `common_childmaster` (
  `CM_ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_childmaster`
--

INSERT INTO `common_childmaster` (`CM_ID`, `Name`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1', 1, 1, NULL, NULL, NULL),
(2, '2', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_city_master`
--

CREATE TABLE `common_city_master` (
  `GAL_ID` int(10) UNSIGNED NOT NULL,
  `Country_ID` int(11) DEFAULT NULL,
  `State_ID` int(11) DEFAULT NULL,
  `Code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_country_master`
--

CREATE TABLE `common_country_master` (
  `CM_ID` int(10) UNSIGNED NOT NULL,
  `Code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_currency_master`
--

CREATE TABLE `common_currency_master` (
  `CU_ID` int(10) UNSIGNED NOT NULL,
  `Code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_gendermaster`
--

CREATE TABLE `common_gendermaster` (
  `GM_ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_gendermaster`
--

INSERT INTO `common_gendermaster` (`GM_ID`, `Name`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Male', 1, 1, NULL, NULL, NULL),
(2, 'Female', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_maritalstatus`
--

CREATE TABLE `common_maritalstatus` (
  `MS_ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_maritalstatus`
--

INSERT INTO `common_maritalstatus` (`MS_ID`, `Name`, `Txnuser`, `Status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Single', 1, 1, NULL, NULL, NULL),
(2, 'Married', 1, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `common_religion_master`
--

CREATE TABLE `common_religion_master` (
  `RM_ID` int(10) UNSIGNED NOT NULL,
  `Code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_state_master`
--

CREATE TABLE `common_state_master` (
  `SM_ID` int(10) UNSIGNED NOT NULL,
  `Country_ID` int(11) DEFAULT NULL,
  `Code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_accesslogin`
--

CREATE TABLE `general_accesslogin` (
  `GAL_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `Account` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `UserID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NickName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PhoneNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Category` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `URL` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmailID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HintQ1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HintQ1Ans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HintQ2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HintQ2Ans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HintQ3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HintQ3Ans` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date DEFAULT NULL,
  `ValidTo` date DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_address`
--

CREATE TABLE `general_address` (
  `GA_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AddressType` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HouseNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Street` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AddressLine` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PostalCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GeographicalAddress` text COLLATE utf8mb4_unicode_ci,
  `DocType` int(11) NOT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_communications`
--

CREATE TABLE `general_communications` (
  `GC_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `CommunicationType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Details` text COLLATE utf8mb4_unicode_ci,
  `DocType` int(11) DEFAULT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_documents`
--

CREATE TABLE `general_documents` (
  `GD_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `DocCategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FileChoose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LinkTo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_leisureactivites`
--

CREATE TABLE `general_leisureactivites` (
  `GLA_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `Activity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Prociency` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Skills` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Hobby` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ActivityType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SkillsAcquired` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GuideMentorCouch` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_membership`
--

CREATE TABLE `general_membership` (
  `GMS_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `OrganizationName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MembershipType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MembershipFees` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AllowedForMembers` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OrganizationCategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MembershipNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Sponceror` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OptionsFacilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Facilities` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_objectsonloan`
--

CREATE TABLE `general_objectsonloan` (
  `GOL_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `ObjectName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ObjectCategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GivenTo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EmailID` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PlaceOfIssue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValueAddition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GivenDate` date DEFAULT NULL,
  `Amount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ContactNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ModeOfGiving` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ModeOfReturning` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateOfIssue` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL,
  `DocType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_personaldata`
--

CREATE TABLE `general_personaldata` (
  `GPD_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MiddleName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nationality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaritalStatus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MarriedSince` date DEFAULT NULL,
  `NoOfChildrens` int(11) DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_personaldocuments`
--

CREATE TABLE `general_personaldocuments` (
  `GPD_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `DocCategory` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocName` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocBelongs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Module` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FollowUp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_personalids`
--

CREATE TABLE `general_personalids` (
  `GPI_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `IDType` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IDNO` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PlaceOfIssue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CountryOfIssue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `IssueingAuthority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DateOfIssue` date DEFAULT NULL,
  `DocType` int(11) DEFAULT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_photos`
--

CREATE TABLE `general_photos` (
  `GPH_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `Photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dimention` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MatFinish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Options` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GlassFinish` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `PassportSize` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ValidFrom` date NOT NULL,
  `ValidTo` date NOT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_travelinfo`
--

CREATE TABLE `general_travelinfo` (
  `GTI_ID` int(10) UNSIGNED NOT NULL,
  `MetaID` int(11) NOT NULL,
  `ToWhom` int(11) NOT NULL,
  `FromDate` date NOT NULL,
  `FromTime` time DEFAULT NULL,
  `ToDate` date NOT NULL,
  `ToTime` time DEFAULT NULL,
  `Country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Purpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `OtherPurpose` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Comments` longtext COLLATE utf8mb4_unicode_ci,
  `AdditionalDestination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EstimatedCost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TravelInsurancePolicyNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ModeOfTrasnport` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TravelInsuranceAvailable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ActualCost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdditonalCost` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Destination` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocType` int(11) DEFAULT NULL,
  `DocNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DocImage` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Folder` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` int(11) NOT NULL,
  `Txnuser` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_03_183835_metadata', 1),
(4, '2017_08_03_184543_general_personaldata', 1),
(5, '2017_08_16_173513_generaladdress', 1),
(6, '2017_08_18_174613_addfamilymembers', 1),
(7, '2017_08_19_124351_addfriendsrelatives', 1),
(8, '2017_08_23_183229_generalcommunications', 1),
(9, '2017_08_30_160209_generalpersonalIds', 1),
(10, '2017_08_30_164546_generaltravelinfo', 1),
(11, '2017_09_03_175929_generalpersonaldocuments', 1),
(12, '2017_09_09_185346_gendermaster', 1),
(13, '2017_09_09_185610_maritalstatus', 1),
(14, '2017_09_09_185637_childmaster', 1),
(15, '2017_10_03_162939_generaladdresschanges', 2),
(16, '2017_10_03_163758_generalcommunicationchanges', 3),
(17, '2017_10_03_163947_generalpersonalidschanges', 4),
(18, '2017_10_03_164158_generalmembership', 5),
(19, '2017_10_03_165023_generalobjectsonloan', 6),
(20, '2017_10_03_170057_generaltravelinfochanges', 7),
(21, '2017_10_03_171041_generaldocuments', 8),
(22, '2017_10_03_171455_generalleisureactivites', 9),
(23, '2017_10_03_171858_generalphotos', 10),
(24, '2017_10_03_172221_generalleisureactiviteschanges', 11),
(25, '2017_10_03_172751_generalaccesslogin', 12),
(26, '2017_10_09_193343_country_master_table', 13),
(27, '2017_10_09_193438_state_master_table', 13),
(28, '2017_10_09_193453_city_master_table', 13),
(29, '2017_10_09_193516_currency_master_table', 13),
(30, '2017_10_11_165303_create_religion_table', 14);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `photo_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `l_name`, `email`, `password`, `mobile`, `dob`, `gender`, `photo_path`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ramakrishna', NULL, 'ramascoolguy@gmail.com', '$2y$10$/CZtrIeWcy.8aLocUIoMYeGMIxp09uNWy4n8XcTIMFzUwmDHZksNW', NULL, NULL, NULL, NULL, 1, NULL, '2017-09-11 13:38:10', '2017-09-11 13:38:10');

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
-- Indexes for table `common_childmaster`
--
ALTER TABLE `common_childmaster`
  ADD PRIMARY KEY (`CM_ID`);

--
-- Indexes for table `common_city_master`
--
ALTER TABLE `common_city_master`
  ADD PRIMARY KEY (`GAL_ID`);

--
-- Indexes for table `common_country_master`
--
ALTER TABLE `common_country_master`
  ADD PRIMARY KEY (`CM_ID`);

--
-- Indexes for table `common_currency_master`
--
ALTER TABLE `common_currency_master`
  ADD PRIMARY KEY (`CU_ID`);

--
-- Indexes for table `common_gendermaster`
--
ALTER TABLE `common_gendermaster`
  ADD PRIMARY KEY (`GM_ID`);

--
-- Indexes for table `common_maritalstatus`
--
ALTER TABLE `common_maritalstatus`
  ADD PRIMARY KEY (`MS_ID`);

--
-- Indexes for table `common_religion_master`
--
ALTER TABLE `common_religion_master`
  ADD PRIMARY KEY (`RM_ID`);

--
-- Indexes for table `common_state_master`
--
ALTER TABLE `common_state_master`
  ADD PRIMARY KEY (`SM_ID`);

--
-- Indexes for table `general_accesslogin`
--
ALTER TABLE `general_accesslogin`
  ADD PRIMARY KEY (`GAL_ID`);

--
-- Indexes for table `general_address`
--
ALTER TABLE `general_address`
  ADD PRIMARY KEY (`GA_ID`);

--
-- Indexes for table `general_communications`
--
ALTER TABLE `general_communications`
  ADD PRIMARY KEY (`GC_ID`);

--
-- Indexes for table `general_documents`
--
ALTER TABLE `general_documents`
  ADD PRIMARY KEY (`GD_ID`);

--
-- Indexes for table `general_leisureactivites`
--
ALTER TABLE `general_leisureactivites`
  ADD PRIMARY KEY (`GLA_ID`);

--
-- Indexes for table `general_membership`
--
ALTER TABLE `general_membership`
  ADD PRIMARY KEY (`GMS_ID`);

--
-- Indexes for table `general_objectsonloan`
--
ALTER TABLE `general_objectsonloan`
  ADD PRIMARY KEY (`GOL_ID`);

--
-- Indexes for table `general_personaldata`
--
ALTER TABLE `general_personaldata`
  ADD PRIMARY KEY (`GPD_ID`);

--
-- Indexes for table `general_personaldocuments`
--
ALTER TABLE `general_personaldocuments`
  ADD PRIMARY KEY (`GPD_ID`);

--
-- Indexes for table `general_personalids`
--
ALTER TABLE `general_personalids`
  ADD PRIMARY KEY (`GPI_ID`);

--
-- Indexes for table `general_photos`
--
ALTER TABLE `general_photos`
  ADD PRIMARY KEY (`GPH_ID`);

--
-- Indexes for table `general_travelinfo`
--
ALTER TABLE `general_travelinfo`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addfamilymembers`
--
ALTER TABLE `addfamilymembers`
  MODIFY `AFM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `addfriendsrelatives`
--
ALTER TABLE `addfriendsrelatives`
  MODIFY `AFR_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `common_childmaster`
--
ALTER TABLE `common_childmaster`
  MODIFY `CM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `common_city_master`
--
ALTER TABLE `common_city_master`
  MODIFY `GAL_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `common_country_master`
--
ALTER TABLE `common_country_master`
  MODIFY `CM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `common_currency_master`
--
ALTER TABLE `common_currency_master`
  MODIFY `CU_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `common_gendermaster`
--
ALTER TABLE `common_gendermaster`
  MODIFY `GM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `common_maritalstatus`
--
ALTER TABLE `common_maritalstatus`
  MODIFY `MS_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `common_religion_master`
--
ALTER TABLE `common_religion_master`
  MODIFY `RM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `common_state_master`
--
ALTER TABLE `common_state_master`
  MODIFY `SM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_accesslogin`
--
ALTER TABLE `general_accesslogin`
  MODIFY `GAL_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_address`
--
ALTER TABLE `general_address`
  MODIFY `GA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_communications`
--
ALTER TABLE `general_communications`
  MODIFY `GC_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_documents`
--
ALTER TABLE `general_documents`
  MODIFY `GD_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_leisureactivites`
--
ALTER TABLE `general_leisureactivites`
  MODIFY `GLA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_membership`
--
ALTER TABLE `general_membership`
  MODIFY `GMS_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_objectsonloan`
--
ALTER TABLE `general_objectsonloan`
  MODIFY `GOL_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_personaldata`
--
ALTER TABLE `general_personaldata`
  MODIFY `GPD_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_personaldocuments`
--
ALTER TABLE `general_personaldocuments`
  MODIFY `GPD_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_personalids`
--
ALTER TABLE `general_personalids`
  MODIFY `GPI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_photos`
--
ALTER TABLE `general_photos`
  MODIFY `GPH_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `general_travelinfo`
--
ALTER TABLE `general_travelinfo`
  MODIFY `GTI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `metadata`
--
ALTER TABLE `metadata`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
