-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 30, 2019 at 04:33 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `riven_infinite`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_candidates`
--

CREATE TABLE `assigned_candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `expired` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assigned_candidates`
--

INSERT INTO `assigned_candidates` (`id`, `employer_id`, `user_id`, `status`, `expired`, `created_at`, `updated_at`) VALUES
(1, 2, 23, 1, '2019-04-27', '2019-04-22 18:00:00', NULL),
(2, 1, 29, 1, NULL, '2019-05-22 10:33:30', '2019-05-22 10:33:30'),
(3, 2, 26, 1, NULL, '2019-05-24 20:24:54', '2019-05-24 20:24:54'),
(4, 3, 26, 1, NULL, '2019-05-25 09:42:41', '2019-05-25 09:42:41'),
(5, 3, 33, 1, NULL, '2019-05-25 09:43:35', '2019-05-25 09:43:35'),
(6, 3, 23, 1, NULL, '2019-05-25 09:44:26', '2019-05-25 09:44:26');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `ac_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bsb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ac_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tfn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `user_id`, `ac_name`, `bsb`, `ac_no`, `abn`, `tfn`, `created_at`, `updated_at`) VALUES
(1, 23, 'Acc Name', '54', '1112098765432', '452', '497309106', '2019-04-28 03:15:39', '2019-05-23 13:26:01'),
(2, 26, 'Saiful', 'Islam', '00007777', '0000999909', '09090909', '2019-05-10 18:23:09', '2019-05-10 18:23:09'),
(3, 30, 'ppl', 'opp', '9878765448877655', 'kil', 'hoooo', '2019-05-22 09:44:12', '2019-05-22 09:44:57'),
(4, 29, 'npl', 'okkk', '9878765448877655', 'kil', '1716224020', '2019-05-23 14:34:58', '2019-05-23 14:34:58'),
(5, 31, 'Jowel Rana Kanon', '234587490999', '34712890887733', 'kil', 'kjiij', '2019-05-23 14:56:15', '2019-05-23 14:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `pass_mark` int(100) NOT NULL DEFAULT '100',
  `question_no` int(11) DEFAULT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `time`, `pass_mark`, `question_no`, `description`, `topic_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'English', 20, 100, 20, NULL, NULL, 1, NULL, 1, '2019-04-22 18:00:00', '2019-05-22 12:23:05'),
(2, 'Food Safety', 20, 100, 20, NULL, NULL, 1, NULL, 1, '2019-04-27 13:41:54', '2019-05-01 02:10:22'),
(3, 'New', 20, 100, 20, 'Desc', NULL, 1, 1, 1, '2019-05-09 01:36:26', '2019-05-09 01:50:32'),
(4, 'New', 20, 100, 20, 'Desc', 1, 1, 1, NULL, '2019-05-09 01:39:09', '2019-05-09 01:39:24'),
(5, 'Math', 35, 100, 35, NULL, NULL, 1, 1, 1, '2019-05-22 11:13:49', '2019-05-22 11:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `capital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizenship` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_sub_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_decimals` int(11) DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso_3166_2` char(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `iso_3166_3` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `sub_region_code` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `eea` tinyint(1) NOT NULL DEFAULT '0',
  `calling_code` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `status_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `capital`, `citizenship`, `country_code`, `currency`, `currency_code`, `currency_sub_unit`, `currency_symbol`, `currency_decimals`, `full_name`, `iso_3166_2`, `iso_3166_3`, `name`, `region_code`, `sub_region_code`, `eea`, `calling_code`, `flag`, `status`, `status_by`, `created_at`, `updated_at`) VALUES
(4, 'Kabul', 'Afghan', '004', 'afghani', 'AFN', 'pul', '؋', 2, 'Islamic Republic of Afghanistan', 'AF', 'AFG', 'Afghanistan', '142', '034', 0, '93', 'AF.png', 0, NULL, NULL, '2019-04-30 02:42:06'),
(8, 'Tirana', 'Albanian', '008', 'lek', 'ALL', '(qindar (pl. qindarka))', 'Lek', 2, 'Republic of Albania', 'AL', 'ALB', 'Albania', '150', '039', 0, '355', 'AL.png', 1, NULL, NULL, '2019-02-14 12:09:51'),
(10, 'Antartica', 'of Antartica', '010', '', '', '', '', 2, 'Antarctica', 'AQ', 'ATA', 'Antarctica', '', '', 0, '672', 'AQ.png', 1, NULL, NULL, '2019-02-14 11:52:20'),
(12, 'Algiers', 'Algerian', '012', 'Algerian dinar', 'DZD', 'centime', 'DZD', 2, 'People’s Democratic Republic of Algeria', 'DZ', 'DZA', 'Algeria', '002', '015', 0, '213', 'DZ.png', 1, NULL, NULL, '2019-02-25 05:52:18'),
(16, 'Pago Pago', 'American Samoan', '016', 'US dollar', 'USD', 'cent', '$', 2, 'Territory of American', 'AS', 'ASM', 'American Samoa', '009', '061', 0, '1', 'AS.png', 1, NULL, NULL, '2019-02-25 05:52:18'),
(20, 'Andorra la Vella', 'Andorran', '020', 'euro', 'EUR', 'cent', '€', 2, 'Principality of Andorra', 'AD', 'AND', 'Andorra', '150', '039', 0, '376', 'AD.png', 1, NULL, NULL, '2019-02-14 12:10:07'),
(24, 'Luanda', 'Angolan', '024', 'kwanza', 'AOA', 'cêntimo', 'Kz', 2, 'Republic of Angola', 'AO', 'AGO', 'Angola', '002', '017', 0, '244', 'AO.png', 1, NULL, NULL, '2019-02-14 11:52:17'),
(28, 'St John’s', 'of Antigua and Barbuda', '028', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Antigua and Barbuda', 'AG', 'ATG', 'Antigua and Barbuda', '019', '029', 0, '1', 'AG.png', 0, NULL, NULL, '2019-05-27 12:50:06'),
(31, 'Baku', 'Azerbaijani', '031', 'Azerbaijani manat', 'AZN', 'kepik (inv.)', 'ман', 2, 'Republic of Azerbaijan', 'AZ', 'AZE', 'Azerbaijan', '142', '145', 0, '994', 'AZ.png', 1, NULL, NULL, '2017-12-11 11:31:24'),
(32, 'Buenos Aires', 'Argentinian', '032', 'Argentine peso', 'ARS', 'centavo', '$', 2, 'Argentine Republic', 'AR', 'ARG', 'Argentina', '019', '005', 0, '54', 'AR.png', 1, 1, NULL, '2017-12-30 19:06:44'),
(36, 'Canberra', 'Australian', '036', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Commonwealth of Australia', 'AU', 'AUS', 'Australia', '009', '053', 0, '61', 'AU.png', 1, NULL, NULL, '2017-12-11 09:56:53'),
(40, 'Vienna', 'Austrian', '040', 'euro', 'EUR', 'cent', '€', 2, 'Republic of Austria', 'AT', 'AUT', 'Austria', '150', '155', 1, '43', 'AT.png', 1, NULL, NULL, NULL),
(44, 'Nassau', 'Bahamian', '044', 'Bahamian dollar', 'BSD', 'cent', '$', 2, 'Commonwealth of the Bahamas', 'BS', 'BHS', 'Bahamas', '019', '029', 0, '1', 'BS.png', 1, NULL, NULL, NULL),
(48, 'Manama', 'Bahraini', '048', 'Bahraini dinar', 'BHD', 'fils (inv.)', 'BHD', 3, 'Kingdom of Bahrain', 'BH', 'BHR', 'Bahrain', '142', '145', 0, '973', 'BH.png', 1, NULL, NULL, NULL),
(50, 'Dhaka', 'Bangladeshi', '050', 'taka (inv.)', 'BDT', 'poisha (inv.)', 'BDT', 2, 'People’s Republic of Bangladesh', 'BD', 'BGD', 'Bangladesh', '142', '034', 0, '880', 'BD.png', 1, NULL, NULL, '2017-12-11 09:29:10'),
(51, 'Yerevan', 'Armenian', '051', 'dram (inv.)', 'AMD', 'luma', 'AMD', 2, 'Republic of Armenia', 'AM', 'ARM', 'Armenia', '142', '145', 0, '374', 'AM.png', 1, NULL, NULL, NULL),
(52, 'Bridgetown', 'Barbadian', '052', 'Barbados dollar', 'BBD', 'cent', '$', 2, 'Barbados', 'BB', 'BRB', 'Barbados', '019', '029', 0, '1', 'BB.png', 1, NULL, NULL, NULL),
(56, 'Brussels', 'Belgian', '056', 'euro', 'EUR', 'cent', '€', 2, 'Kingdom of Belgium', 'BE', 'BEL', 'Belgium', '150', '155', 1, '32', 'BE.png', 1, NULL, NULL, NULL),
(60, 'Hamilton', 'Bermudian', '060', 'Bermuda dollar', 'BMD', 'cent', '$', 2, 'Bermuda', 'BM', 'BMU', 'Bermuda', '019', '021', 0, '1', 'BM.png', 1, NULL, NULL, NULL),
(64, 'Thimphu', 'Bhutanese', '064', 'ngultrum (inv.)', 'BTN', 'chhetrum (inv.)', 'BTN', 2, 'Kingdom of Bhutan', 'BT', 'BTN', 'Bhutan', '142', '034', 0, '975', 'BT.png', 1, NULL, NULL, NULL),
(68, 'Sucre (BO1)', 'Bolivian', '068', 'boliviano', 'BOB', 'centavo', '$b', 2, 'Plurinational State of Bolivia', 'BO', 'BOL', 'Bolivia, Plurinational State of', '019', '005', 0, '591', 'BO.png', 1, NULL, NULL, NULL),
(70, 'Sarajevo', 'of Bosnia and Herzegovina', '070', 'convertible mark', 'BAM', 'fening', 'KM', 2, 'Bosnia and Herzegovina', 'BA', 'BIH', 'Bosnia and Herzegovina', '150', '039', 0, '387', 'BA.png', 1, NULL, NULL, NULL),
(72, 'Gaborone', 'Botswanan', '072', 'pula (inv.)', 'BWP', 'thebe (inv.)', 'P', 2, 'Republic of Botswana', 'BW', 'BWA', 'Botswana', '002', '018', 0, '267', 'BW.png', 1, NULL, NULL, NULL),
(74, 'Bouvet island', 'of Bouvet island', '074', '', '', '', 'kr', 2, 'Bouvet Island', 'BV', 'BVT', 'Bouvet Island', '', '', 0, '47', 'BV.png', 1, NULL, NULL, NULL),
(76, 'Brasilia', 'Brazilian', '076', 'real (pl. reais)', 'BRL', 'centavo', 'R$', 2, 'Federative Republic of Brazil', 'BR', 'BRA', 'Brazil', '019', '005', 0, '55', 'BR.png', 1, NULL, NULL, '2017-12-11 09:50:19'),
(84, 'Belmopan', 'Belizean', '084', 'Belize dollar', 'BZD', 'cent', 'BZ$', 2, 'Belize', 'BZ', 'BLZ', 'Belize', '019', '013', 0, '501', 'BZ.png', 1, NULL, NULL, NULL),
(86, 'Diego Garcia', 'Changosian', '086', 'US dollar', 'USD', 'cent', '$', 2, 'British Indian Ocean Territory', 'IO', 'IOT', 'British Indian Ocean Territory', '', '', 0, '246', 'IO.png', 1, NULL, NULL, NULL),
(90, 'Honiara', 'Solomon Islander', '090', 'Solomon Islands dollar', 'SBD', 'cent', '$', 2, 'Solomon Islands', 'SB', 'SLB', 'Solomon Islands', '009', '054', 0, '677', 'SB.png', 1, NULL, NULL, NULL),
(92, 'Road Town', 'British Virgin Islander;', '092', 'US dollar', 'USD', 'cent', '$', 2, 'British Virgin Islands', 'VG', 'VGB', 'Virgin Islands, British', '019', '029', 0, '1', 'VG.png', 1, NULL, NULL, NULL),
(96, 'Bandar Seri Begawan', 'Bruneian', '096', 'Brunei dollar', 'BND', 'sen (inv.)', '$', 2, 'Brunei Darussalam', 'BN', 'BRN', 'Brunei Darussalam', '142', '035', 0, '673', 'BN.png', 1, NULL, NULL, NULL),
(100, 'Sofia', 'Bulgarian', '100', 'lev (pl. leva)', 'BGN', 'stotinka', 'лв', 2, 'Republic of Bulgaria', 'BG', 'BGR', 'Bulgaria', '150', '151', 1, '359', 'BG.png', 1, NULL, NULL, NULL),
(104, 'Yangon', 'Burmese', '104', 'kyat', 'MMK', 'pya', 'K', 2, 'Union of Myanmar/', 'MM', 'MMR', 'Myanmar', '142', '035', 0, '95', 'MM.png', 1, 1, NULL, '2018-01-02 10:35:47'),
(108, 'Bujumbura', 'Burundian', '108', 'Burundi franc', 'BIF', 'centime', 'BIF', 0, 'Republic of Burundi', 'BI', 'BDI', 'Burundi', '002', '014', 0, '257', 'BI.png', 1, NULL, NULL, NULL),
(112, 'Minsk', 'Belarusian', '112', 'Belarusian rouble', 'BYR', 'kopek', 'p.', 2, 'Republic of Belarus', 'BY', 'BLR', 'Belarus', '150', '151', 0, '375', 'BY.png', 1, NULL, NULL, NULL),
(116, 'Phnom Penh', 'Cambodian', '116', 'riel', 'KHR', 'sen (inv.)', '៛', 2, 'Kingdom of Cambodia', 'KH', 'KHM', 'Cambodia', '142', '035', 0, '855', 'KH.png', 1, NULL, NULL, NULL),
(120, 'Yaoundé', 'Cameroonian', '120', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 0, 'Republic of Cameroon', 'CM', 'CMR', 'Cameroon', '002', '017', 0, '237', 'CM.png', 1, NULL, NULL, NULL),
(124, 'Ottawa', 'Canadian', '124', 'Canadian dollar', 'CAD', 'cent', '$', 2, 'Canada', 'CA', 'CAN', 'Canada', '019', '021', 0, '1', 'CA.png', 1, NULL, NULL, '2017-12-11 09:57:10'),
(132, 'Praia', 'Cape Verdean', '132', 'Cape Verde escudo', 'CVE', 'centavo', 'CVE', 2, 'Republic of Cape Verde', 'CV', 'CPV', 'Cape Verde', '002', '011', 0, '238', 'CV.png', 1, NULL, NULL, NULL),
(136, 'George Town', 'Caymanian', '136', 'Cayman Islands dollar', 'KYD', 'cent', '$', 2, 'Cayman Islands', 'KY', 'CYM', 'Cayman Islands', '019', '029', 0, '1', 'KY.png', 1, NULL, NULL, NULL),
(140, 'Bangui', 'Central African', '140', 'CFA franc (BEAC)', 'XAF', 'centime', 'CFA', 0, 'Central African Republic', 'CF', 'CAF', 'Central African Republic', '002', '017', 0, '236', 'CF.png', 1, NULL, NULL, NULL),
(144, 'Colombo', 'Sri Lankan', '144', 'Sri Lankan rupee', 'LKR', 'cent', '₨', 2, 'Democratic Socialist Republic of Sri Lanka', 'LK', 'LKA', 'Sri Lanka', '142', '034', 0, '94', 'LK.png', 1, NULL, NULL, '2017-12-11 09:51:04'),
(148, 'N’Djamena', 'Chadian', '148', 'CFA franc (BEAC)', 'XAF', 'centime', 'XAF', 0, 'Republic of Chad', 'TD', 'TCD', 'Chad', '002', '017', 0, '235', 'TD.png', 1, NULL, NULL, NULL),
(152, 'Santiago', 'Chilean', '152', 'Chilean peso', 'CLP', 'centavo', 'CLP', 0, 'Republic of Chile', 'CL', 'CHL', 'Chile', '019', '005', 0, '56', 'CL.png', 1, NULL, NULL, NULL),
(156, 'Beijing', 'Chinese', '156', 'renminbi-yuan (inv.)', 'CNY', 'jiao (10)', '¥', 2, 'People’s Republic of China', 'CN', 'CHN', 'China', '142', '030', 0, '86', 'CN.png', 1, NULL, NULL, '2017-12-11 09:57:21'),
(158, 'Taipei', 'Taiwanese', '158', 'new Taiwan dollar', 'TWD', 'fen (inv.)', 'NT$', 2, 'Republic of China, Taiwan (TW1)', 'TW', 'TWN', 'Taiwan, Province of China', '142', '030', 0, '886', 'TW.png', 1, NULL, NULL, NULL),
(162, 'Flying Fish Cove', 'Christmas Islander', '162', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Christmas Island Territory', 'CX', 'CXR', 'Christmas Island', '', '', 0, '61', 'CX.png', 1, NULL, NULL, NULL),
(166, 'Bantam', 'Cocos Islander', '166', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Territory of Cocos (Keeling) Islands', 'CC', 'CCK', 'Cocos (Keeling) Islands', '', '', 0, '61', 'CC.png', 1, NULL, NULL, NULL),
(170, 'Santa Fe de Bogotá', 'Colombian', '170', 'Colombian peso', 'COP', 'centavo', '$', 2, 'Republic of Colombia', 'CO', 'COL', 'Colombia', '019', '005', 0, '57', 'CO.png', 1, NULL, NULL, NULL),
(174, 'Moroni', 'Comorian', '174', 'Comorian franc', 'KMF', '', 'KMF', 0, 'Union of the Comoros', 'KM', 'COM', 'Comoros', '002', '014', 0, '269', 'KM.png', 1, NULL, NULL, NULL),
(175, 'Mamoudzou', 'Mahorais', '175', 'euro', 'EUR', 'cent', '€', 2, 'Departmental Collectivity of Mayotte', 'YT', 'MYT', 'Mayotte', '002', '014', 0, '262', 'YT.png', 1, NULL, NULL, NULL),
(178, 'Brazzaville', 'Congolese', '178', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 0, 'Republic of the Congo', 'CG', 'COG', 'Congo', '002', '017', 0, '242', 'CG.png', 1, NULL, NULL, NULL),
(180, 'Kinshasa', 'Congolese', '180', 'Congolese franc', 'CDF', 'centime', 'CDF', 2, 'Democratic Republic of the Congo', 'CD', 'COD', 'Congo, the Democratic Republic of the', '002', '017', 0, '243', 'CD.png', 1, NULL, NULL, NULL),
(184, 'Avarua', 'Cook Islander', '184', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Cook Islands', 'CK', 'COK', 'Cook Islands', '009', '061', 0, '682', 'CK.png', 1, NULL, NULL, NULL),
(188, 'San José', 'Costa Rican', '188', 'Costa Rican colón (pl. colones)', 'CRC', 'céntimo', '₡', 2, 'Republic of Costa Rica', 'CR', 'CRI', 'Costa Rica', '019', '013', 0, '506', 'CR.png', 1, NULL, NULL, NULL),
(191, 'Zagreb', 'Croatian', '191', 'kuna (inv.)', 'HRK', 'lipa (inv.)', 'kn', 2, 'Republic of Croatia', 'HR', 'HRV', 'Croatia', '150', '039', 1, '385', 'HR.png', 1, NULL, NULL, NULL),
(192, 'Havana', 'Cuban', '192', 'Cuban peso', 'CUP', 'centavo', '₱', 2, 'Republic of Cuba', 'CU', 'CUB', 'Cuba', '019', '029', 0, '53', 'CU.png', 1, NULL, NULL, NULL),
(196, 'Nicosia', 'Cypriot', '196', 'euro', 'EUR', 'cent', 'CYP', 2, 'Republic of Cyprus', 'CY', 'CYP', 'Cyprus', '142', '145', 1, '357', 'CY.png', 1, NULL, NULL, NULL),
(203, 'Prague', 'Czech', '203', 'Czech koruna (pl. koruny)', 'CZK', 'halér', 'Kč', 2, 'Czech Republic', 'CZ', 'CZE', 'Czech Republic', '150', '151', 1, '420', 'CZ.png', 1, NULL, NULL, NULL),
(204, 'Porto Novo (BJ1)', 'Beninese', '204', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Benin', 'BJ', 'BEN', 'Benin', '002', '011', 0, '229', 'BJ.png', 1, NULL, NULL, NULL),
(208, 'Copenhagen', 'Danish', '208', 'Danish krone', 'DKK', 'øre (inv.)', 'kr', 2, 'Kingdom of Denmark', 'DK', 'DNK', 'Denmark', '150', '154', 1, '45', 'DK.png', 1, NULL, NULL, NULL),
(212, 'Roseau', 'Dominican', '212', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Commonwealth of Dominica', 'DM', 'DMA', 'Dominica', '019', '029', 0, '1', 'DM.png', 1, NULL, NULL, NULL),
(214, 'Santo Domingo', 'Dominican', '214', 'Dominican peso', 'DOP', 'centavo', 'RD$', 2, 'Dominican Republic', 'DO', 'DOM', 'Dominican Republic', '019', '029', 0, '1', 'DO.png', 1, NULL, NULL, NULL),
(218, 'Quito', 'Ecuadorian', '218', 'US dollar', 'USD', 'cent', '$', 2, 'Republic of Ecuador', 'EC', 'ECU', 'Ecuador', '019', '005', 0, '593', 'EC.png', 1, NULL, NULL, NULL),
(222, 'San Salvador', 'Salvadoran', '222', 'Salvadorian colón (pl. colones)', 'SVC', 'centavo', '$', 2, 'Republic of El Salvador', 'SV', 'SLV', 'El Salvador', '019', '013', 0, '503', 'SV.png', 1, NULL, NULL, NULL),
(226, 'Malabo', 'Equatorial Guinean', '226', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 2, 'Republic of Equatorial Guinea', 'GQ', 'GNQ', 'Equatorial Guinea', '002', '017', 0, '240', 'GQ.png', 1, NULL, NULL, NULL),
(231, 'Addis Ababa', 'Ethiopian', '231', 'birr (inv.)', 'ETB', 'cent', 'ETB', 2, 'Federal Democratic Republic of Ethiopia', 'ET', 'ETH', 'Ethiopia', '002', '014', 0, '251', 'ET.png', 1, NULL, NULL, NULL),
(232, 'Asmara', 'Eritrean', '232', 'nakfa', 'ERN', 'cent', 'Nfk', 2, 'State of Eritrea', 'ER', 'ERI', 'Eritrea', '002', '014', 0, '291', 'ER.png', 1, NULL, NULL, NULL),
(233, 'Tallinn', 'Estonian', '233', 'euro', 'EUR', 'cent', 'kr', 2, 'Republic of Estonia', 'EE', 'EST', 'Estonia', '150', '154', 1, '372', 'EE.png', 1, NULL, NULL, NULL),
(234, 'Tórshavn', 'Faeroese', '234', 'Danish krone', 'DKK', 'øre (inv.)', 'kr', 2, 'Faeroe Islands', 'FO', 'FRO', 'Faroe Islands', '150', '154', 0, '298', 'FO.png', 1, NULL, NULL, NULL),
(238, 'Stanley', 'Falkland Islander', '238', 'Falkland Islands pound', 'FKP', 'new penny', '£', 2, 'Falkland Islands', 'FK', 'FLK', 'Falkland Islands (Malvinas)', '019', '005', 0, '500', 'FK.png', 1, NULL, NULL, NULL),
(239, 'King Edward Point (Grytviken)', 'of South Georgia and the South Sandwich Islands', '239', '', '', '', '£', 2, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 'South Georgia and the South Sandwich Islands', '', '', 0, '44', 'GS.png', 1, NULL, NULL, NULL),
(242, 'Suva', 'Fijian', '242', 'Fiji dollar', 'FJD', 'cent', '$', 2, 'Republic of Fiji', 'FJ', 'FJI', 'Fiji', '009', '054', 0, '679', 'FJ.png', 1, NULL, NULL, NULL),
(246, 'Helsinki', 'Finnish', '246', 'euro', 'EUR', 'cent', '€', 2, 'Republic of Finland', 'FI', 'FIN', 'Finland', '150', '154', 1, '358', 'FI.png', 1, NULL, NULL, '2017-12-11 09:57:54'),
(248, 'Mariehamn', 'Åland Islander', '248', 'euro', 'EUR', 'cent', NULL, NULL, 'Åland Islands', 'AX', 'ALA', 'Åland Islands', '150', '154', 0, '358', NULL, 1, NULL, NULL, '2019-04-29 04:08:44'),
(250, 'Paris', 'French', '250', 'euro', 'EUR', 'cent', '€', 2, 'French Republic', 'FR', 'FRA', 'France', '150', '155', 1, '33', 'FR.png', 1, NULL, NULL, NULL),
(254, 'Cayenne', 'Guianese', '254', 'euro', 'EUR', 'cent', '€', 2, 'French Guiana', 'GF', 'GUF', 'French Guiana', '019', '005', 0, '594', 'GF.png', 1, NULL, NULL, NULL),
(258, 'Papeete', 'Polynesian', '258', 'CFP franc', 'XPF', 'centime', 'XPF', 0, 'French Polynesia', 'PF', 'PYF', 'French Polynesia', '009', '061', 0, '689', 'PF.png', 1, NULL, NULL, NULL),
(260, 'Port-aux-Francais', 'of French Southern and Antarctic Lands', '260', 'euro', 'EUR', 'cent', '€', 2, 'French Southern and Antarctic Lands', 'TF', 'ATF', 'French Southern Territories', '', '', 0, '33', 'TF.png', 1, NULL, NULL, NULL),
(262, 'Djibouti', 'Djiboutian', '262', 'Djibouti franc', 'DJF', '', 'DJF', 0, 'Republic of Djibouti', 'DJ', 'DJI', 'Djibouti', '002', '014', 0, '253', 'DJ.png', 1, NULL, NULL, NULL),
(266, 'Libreville', 'Gabonese', '266', 'CFA franc (BEAC)', 'XAF', 'centime', 'FCF', 0, 'Gabonese Republic', 'GA', 'GAB', 'Gabon', '002', '017', 0, '241', 'GA.png', 1, NULL, NULL, NULL),
(268, 'Tbilisi', 'Georgian', '268', 'lari', 'GEL', 'tetri (inv.)', 'GEL', 2, 'Georgia', 'GE', 'GEO', 'Georgia', '142', '145', 0, '995', 'GE.png', 1, NULL, NULL, NULL),
(270, 'Banjul', 'Gambian', '270', 'dalasi (inv.)', 'GMD', 'butut', 'D', 2, 'Republic of the Gambia', 'GM', 'GMB', 'Gambia', '002', '011', 0, '220', 'GM.png', 1, NULL, NULL, NULL),
(275, NULL, 'Palestinian', '275', NULL, NULL, NULL, '₪', 2, NULL, 'PS', 'PSE', 'Palestinian Territory, Occupied', '142', '145', 0, '970', 'PS.png', 1, NULL, NULL, NULL),
(276, 'Berlin', 'German', '276', 'euro', 'EUR', 'cent', '€', 2, 'Federal Republic of Germany', 'DE', 'DEU', 'Germany', '150', '155', 1, '49', 'DE.png', 1, NULL, NULL, '2017-12-11 09:58:14'),
(288, 'Accra', 'Ghanaian', '288', 'Ghana cedi', 'GHS', 'pesewa', '¢', 2, 'Republic of Ghana', 'GH', 'GHA', 'Ghana', '002', '011', 0, '233', 'GH.png', 1, NULL, NULL, NULL),
(292, 'Gibraltar', 'Gibraltarian', '292', 'Gibraltar pound', 'GIP', 'penny', '£', 2, 'Gibraltar', 'GI', 'GIB', 'Gibraltar', '150', '039', 0, '350', 'GI.png', 1, NULL, NULL, NULL),
(296, 'Tarawa', 'Kiribatian', '296', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Republic of Kiribati', 'KI', 'KIR', 'Kiribati', '009', '057', 0, '686', 'KI.png', 1, NULL, NULL, NULL),
(300, 'Athens', 'Greek', '300', 'euro', 'EUR', 'cent', '€', 2, 'Hellenic Republic', 'GR', 'GRC', 'Greece', '150', '039', 1, '30', 'GR.png', 1, NULL, NULL, NULL),
(304, 'Nuuk', 'Greenlander', '304', 'Danish krone', 'DKK', 'øre (inv.)', 'kr', 2, 'Greenland', 'GL', 'GRL', 'Greenland', '019', '021', 0, '299', 'GL.png', 1, NULL, NULL, NULL),
(308, 'St George’s', 'Grenadian', '308', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Grenada', 'GD', 'GRD', 'Grenada', '019', '029', 0, '1', 'GD.png', 1, NULL, NULL, NULL),
(312, 'Basse Terre', 'Guadeloupean', '312', 'euro', 'EUR', 'cent', '€', 2, 'Guadeloupe', 'GP', 'GLP', 'Guadeloupe', '019', '029', 0, '590', 'GP.png', 1, NULL, NULL, NULL),
(316, 'Agaña (Hagåtña)', 'Guamanian', '316', 'US dollar', 'USD', 'cent', '$', 2, 'Territory of Guam', 'GU', 'GUM', 'Guam', '009', '057', 0, '1', 'GU.png', 1, NULL, NULL, NULL),
(320, 'Guatemala City', 'Guatemalan', '320', 'quetzal (pl. quetzales)', 'GTQ', 'centavo', 'Q', 2, 'Republic of Guatemala', 'GT', 'GTM', 'Guatemala', '019', '013', 0, '502', 'GT.png', 1, NULL, NULL, NULL),
(324, 'Conakry', 'Guinean', '324', 'Guinean franc', 'GNF', '', 'GNF', 0, 'Republic of Guinea', 'GN', 'GIN', 'Guinea', '002', '011', 0, '224', 'GN.png', 1, NULL, NULL, NULL),
(328, 'Georgetown', 'Guyanese', '328', 'Guyana dollar', 'GYD', 'cent', '$', 2, 'Cooperative Republic of Guyana', 'GY', 'GUY', 'Guyana', '019', '005', 0, '592', 'GY.png', 1, NULL, NULL, NULL),
(332, 'Port-au-Prince', 'Haitian', '332', 'gourde', 'HTG', 'centime', 'G', 2, 'Republic of Haiti', 'HT', 'HTI', 'Haiti', '019', '029', 0, '509', 'HT.png', 1, NULL, NULL, NULL),
(334, 'Territory of Heard Island and McDonald Islands', 'of Territory of Heard Island and McDonald Islands', '334', '', '', '', '$', 2, 'Territory of Heard Island and McDonald Islands', 'HM', 'HMD', 'Heard Island and McDonald Islands', '', '', 0, '61', 'HM.png', 1, NULL, NULL, NULL),
(336, 'Vatican City', 'of the Holy See/of the Vatican', '336', 'euro', 'EUR', 'cent', '€', 2, 'the Holy See/ Vatican City State', 'VA', 'VAT', 'Holy See (Vatican City State)', '150', '039', 0, '39', 'VA.png', 1, NULL, NULL, NULL),
(340, 'Tegucigalpa', 'Honduran', '340', 'lempira', 'HNL', 'centavo', 'L', 2, 'Republic of Honduras', 'HN', 'HND', 'Honduras', '019', '013', 0, '504', 'HN.png', 1, NULL, NULL, NULL),
(344, '(HK3)', 'Hong Kong Chinese', '344', 'Hong Kong dollar', 'HKD', 'cent', '$', 2, 'Hong Kong Special Administrative Region of the People’s Republic of China (HK2)', 'HK', 'HKG', 'Hong Kong', '142', '030', 0, '852', 'HK.png', 1, NULL, NULL, NULL),
(348, 'Budapest', 'Hungarian', '348', 'forint (inv.)', 'HUF', '(fillér (inv.))', 'Ft', 2, 'Republic of Hungary', 'HU', 'HUN', 'Hungary', '150', '151', 1, '36', 'HU.png', 1, NULL, NULL, NULL),
(352, 'Reykjavik', 'Icelander', '352', 'króna (pl. krónur)', 'ISK', '', 'kr', 0, 'Republic of Iceland', 'IS', 'ISL', 'Iceland', '150', '154', 0, '354', 'IS.png', 1, NULL, NULL, NULL),
(356, 'New Delhi', 'Indian', '356', 'Indian rupee', 'INR', 'paisa', '₹', 2, 'Republic of India', 'IN', 'IND', 'India', '142', '034', 0, '91', 'IN.png', 1, NULL, NULL, '2017-12-11 09:58:19'),
(360, 'Jakarta', 'Indonesian', '360', 'Indonesian rupiah (inv.)', 'IDR', 'sen (inv.)', 'Rp', 2, 'Republic of Indonesia', 'ID', 'IDN', 'Indonesia', '142', '035', 0, '62', 'ID.png', 1, NULL, NULL, NULL),
(364, 'Tehran', 'Iranian', '364', 'Iranian rial', 'IRR', '(dinar) (IR1)', '﷼', 2, 'Islamic Republic of Iran', 'IR', 'IRN', 'Iran, Islamic Republic of', '142', '034', 0, '98', 'IR.png', 1, NULL, NULL, NULL),
(368, 'Baghdad', 'Iraqi', '368', 'Iraqi dinar', 'IQD', 'fils (inv.)', 'IQD', 3, 'Republic of Iraq', 'IQ', 'IRQ', 'Iraq', '142', '145', 0, '964', 'IQ.png', 1, NULL, NULL, NULL),
(372, 'Dublin', 'Irish', '372', 'euro', 'EUR', 'cent', '€', 2, 'Ireland (IE1)', 'IE', 'IRL', 'Ireland', '150', '154', 1, '353', 'IE.png', 1, NULL, NULL, NULL),
(376, '(IL1)', 'Israeli', '376', 'shekel', 'ILS', 'agora', '₪', 2, 'State of Israel', 'IL', 'ISR', 'Israel', '142', '145', 0, '972', 'IL.png', 1, NULL, NULL, NULL),
(380, 'Rome', 'Italian', '380', 'euro', 'EUR', 'cent', '€', 2, 'Italian Republic', 'IT', 'ITA', 'Italy', '150', '039', 1, '39', 'IT.png', 1, 1, NULL, '2017-12-30 19:08:47'),
(384, 'Yamoussoukro (CI1)', 'Ivorian', '384', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Côte d’Ivoire', 'CI', 'CIV', 'Côte d\'Ivoire', '002', '011', 0, '225', 'CI.png', 1, NULL, NULL, NULL),
(388, 'Kingston', 'Jamaican', '388', 'Jamaica dollar', 'JMD', 'cent', '$', 2, 'Jamaica', 'JM', 'JAM', 'Jamaica', '019', '029', 0, '1', 'JM.png', 1, NULL, NULL, NULL),
(392, 'Tokyo', 'Japanese', '392', 'yen (inv.)', 'JPY', '(sen (inv.)) (JP1)', '¥', 0, 'Japan', 'JP', 'JPN', 'Japan', '142', '030', 0, '81', 'JP.png', 1, NULL, NULL, '2017-12-11 09:58:31'),
(398, 'Astana', 'Kazakh', '398', 'tenge (inv.)', 'KZT', 'tiyn', 'лв', 2, 'Republic of Kazakhstan', 'KZ', 'KAZ', 'Kazakhstan', '142', '143', 0, '7', 'KZ.png', 1, NULL, NULL, NULL),
(400, 'Amman', 'Jordanian', '400', 'Jordanian dinar', 'JOD', '100 qirsh', 'JOD', 2, 'Hashemite Kingdom of Jordan', 'JO', 'JOR', 'Jordan', '142', '145', 0, '962', 'JO.png', 1, NULL, NULL, NULL),
(404, 'Nairobi', 'Kenyan', '404', 'Kenyan shilling', 'KES', 'cent', 'KES', 2, 'Republic of Kenya', 'KE', 'KEN', 'Kenya', '002', '014', 0, '254', 'KE.png', 1, NULL, NULL, NULL),
(408, 'Pyongyang', 'North Korean', '408', 'North Korean won (inv.)', 'KPW', 'chun (inv.)', '₩', 2, 'Democratic People’s Republic of Korea', 'KP', 'PRK', 'Korea, Democratic People\'s Republic of', '142', '030', 0, '850', 'KP.png', 1, 1, NULL, '2017-12-30 19:08:40'),
(410, 'Seoul', 'South Korean', '410', 'South Korean won (inv.)', 'KRW', '(chun (inv.))', '₩', 0, 'Republic of Korea', 'KR', 'KOR', 'Korea, Republic of', '142', '030', 0, '82', 'KR.png', 1, NULL, NULL, '2017-12-11 09:58:42'),
(414, 'Kuwait City', 'Kuwaiti', '414', 'Kuwaiti dinar', 'KWD', 'fils (inv.)', 'KWD', 3, 'State of Kuwait', 'KW', 'KWT', 'Kuwait', '142', '145', 0, '965', 'KW.png', 1, NULL, NULL, NULL),
(417, 'Bishkek', 'Kyrgyz', '417', 'som', 'KGS', 'tyiyn', 'лв', 2, 'Kyrgyz Republic', 'KG', 'KGZ', 'Kyrgyzstan', '142', '143', 0, '996', 'KG.png', 1, NULL, NULL, NULL),
(418, 'Vientiane', 'Lao', '418', 'kip (inv.)', 'LAK', '(at (inv.))', '₭', 0, 'Lao People’s Democratic Republic', 'LA', 'LAO', 'Lao People\'s Democratic Republic', '142', '035', 0, '856', 'LA.png', 1, NULL, NULL, NULL),
(422, 'Beirut', 'Lebanese', '422', 'Lebanese pound', 'LBP', '(piastre)', '£', 2, 'Lebanese Republic', 'LB', 'LBN', 'Lebanon', '142', '145', 0, '961', 'LB.png', 1, NULL, NULL, NULL),
(426, 'Maseru', 'Basotho', '426', 'loti (pl. maloti)', 'LSL', 'sente', 'L', 2, 'Kingdom of Lesotho', 'LS', 'LSO', 'Lesotho', '002', '018', 0, '266', 'LS.png', 1, NULL, NULL, NULL),
(428, 'Riga', 'Latvian', '428', 'euro', 'EUR', 'cent', 'Ls', 2, 'Republic of Latvia', 'LV', 'LVA', 'Latvia', '150', '154', 1, '371', 'LV.png', 1, NULL, NULL, NULL),
(430, 'Monrovia', 'Liberian', '430', 'Liberian dollar', 'LRD', 'cent', '$', 2, 'Republic of Liberia', 'LR', 'LBR', 'Liberia', '002', '011', 0, '231', 'LR.png', 1, NULL, NULL, NULL),
(434, 'Tripoli', 'Libyan', '434', 'Libyan dinar', 'LYD', 'dirham', 'LYD', 3, 'Socialist People’s Libyan Arab Jamahiriya', 'LY', 'LBY', 'Libya', '002', '015', 0, '218', 'LY.png', 1, NULL, NULL, NULL),
(438, 'Vaduz', 'Liechtensteiner', '438', 'Swiss franc', 'CHF', 'centime', 'CHF', 2, 'Principality of Liechtenstein', 'LI', 'LIE', 'Liechtenstein', '150', '155', 0, '423', 'LI.png', 1, NULL, NULL, NULL),
(440, 'Vilnius', 'Lithuanian', '440', 'euro', 'EUR', 'cent', 'Lt', 2, 'Republic of Lithuania', 'LT', 'LTU', 'Lithuania', '150', '154', 1, '370', 'LT.png', 1, NULL, NULL, NULL),
(442, 'Luxembourg', 'Luxembourger', '442', 'euro', 'EUR', 'cent', '€', 2, 'Grand Duchy of Luxembourg', 'LU', 'LUX', 'Luxembourg', '150', '155', 1, '352', 'LU.png', 1, NULL, NULL, NULL),
(446, 'Macao (MO3)', 'Macanese', '446', 'pataca', 'MOP', 'avo', 'MOP', 2, 'Macao Special Administrative Region of the People’s Republic of China (MO2)', 'MO', 'MAC', 'Macao', '142', '030', 0, '853', 'MO.png', 1, NULL, NULL, NULL),
(450, 'Antananarivo', 'Malagasy', '450', 'ariary', 'MGA', 'iraimbilanja (inv.)', 'MGA', 2, 'Republic of Madagascar', 'MG', 'MDG', 'Madagascar', '002', '014', 0, '261', 'MG.png', 1, NULL, NULL, NULL),
(454, 'Lilongwe', 'Malawian', '454', 'Malawian kwacha (inv.)', 'MWK', 'tambala (inv.)', 'MK', 2, 'Republic of Malawi', 'MW', 'MWI', 'Malawi', '002', '014', 0, '265', 'MW.png', 1, NULL, NULL, NULL),
(458, 'Kuala Lumpur (MY1)', 'Malaysian', '458', 'ringgit (inv.)', 'MYR', 'sen (inv.)', 'RM', 2, 'Malaysia', 'MY', 'MYS', 'Malaysia', '142', '035', 0, '60', 'MY.png', 1, NULL, NULL, '2017-12-11 09:58:47'),
(462, 'Malé', 'Maldivian', '462', 'rufiyaa', 'MVR', 'laari (inv.)', 'Rf', 2, 'Republic of Maldives', 'MV', 'MDV', 'Maldives', '142', '034', 0, '960', 'MV.png', 1, NULL, NULL, NULL),
(466, 'Bamako', 'Malian', '466', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Mali', 'ML', 'MLI', 'Mali', '002', '011', 0, '223', 'ML.png', 1, NULL, NULL, NULL),
(470, 'Valletta', 'Maltese', '470', 'euro', 'EUR', 'cent', 'MTL', 2, 'Republic of Malta', 'MT', 'MLT', 'Malta', '150', '039', 1, '356', 'MT.png', 1, NULL, NULL, NULL),
(474, 'Fort-de-France', 'Martinican', '474', 'euro', 'EUR', 'cent', '€', 2, 'Martinique', 'MQ', 'MTQ', 'Martinique', '019', '029', 0, '596', 'MQ.png', 1, NULL, NULL, NULL),
(478, 'Nouakchott', 'Mauritanian', '478', 'ouguiya', 'MRO', 'khoum', 'UM', 2, 'Islamic Republic of Mauritania', 'MR', 'MRT', 'Mauritania', '002', '011', 0, '222', 'MR.png', 1, NULL, NULL, NULL),
(480, 'Port Louis', 'Mauritian', '480', 'Mauritian rupee', 'MUR', 'cent', '₨', 2, 'Republic of Mauritius', 'MU', 'MUS', 'Mauritius', '002', '014', 0, '230', 'MU.png', 1, NULL, NULL, NULL),
(484, 'Mexico City', 'Mexican', '484', 'Mexican peso', 'MXN', 'centavo', '$', 2, 'United Mexican States', 'MX', 'MEX', 'Mexico', '019', '013', 0, '52', 'MX.png', 1, NULL, NULL, NULL),
(492, 'Monaco', 'Monegasque', '492', 'euro', 'EUR', 'cent', '€', 2, 'Principality of Monaco', 'MC', 'MCO', 'Monaco', '150', '155', 0, '377', 'MC.png', 1, NULL, NULL, NULL),
(496, 'Ulan Bator', 'Mongolian', '496', 'tugrik', 'MNT', 'möngö (inv.)', '₮', 2, 'Mongolia', 'MN', 'MNG', 'Mongolia', '142', '030', 0, '976', 'MN.png', 1, NULL, NULL, NULL),
(498, 'Chisinau', 'Moldovan', '498', 'Moldovan leu (pl. lei)', 'MDL', 'ban', 'MDL', 2, 'Republic of Moldova', 'MD', 'MDA', 'Moldova, Republic of', '150', '151', 0, '373', 'MD.png', 1, NULL, NULL, NULL),
(499, 'Podgorica', 'Montenegrin', '499', 'euro', 'EUR', 'cent', '€', 2, 'Montenegro', 'ME', 'MNE', 'Montenegro', '150', '039', 0, '382', 'ME.png', 1, NULL, NULL, NULL),
(500, 'Plymouth (MS2)', 'Montserratian', '500', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Montserrat', 'MS', 'MSR', 'Montserrat', '019', '029', 0, '1', 'MS.png', 1, NULL, NULL, NULL),
(504, 'Rabat', 'Moroccan', '504', 'Moroccan dirham', 'MAD', 'centime', 'MAD', 2, 'Kingdom of Morocco', 'MA', 'MAR', 'Morocco', '002', '015', 0, '212', 'MA.png', 1, NULL, NULL, NULL),
(508, 'Maputo', 'Mozambican', '508', 'metical', 'MZN', 'centavo', 'MT', 2, 'Republic of Mozambique', 'MZ', 'MOZ', 'Mozambique', '002', '014', 0, '258', 'MZ.png', 1, NULL, NULL, NULL),
(512, 'Muscat', 'Omani', '512', 'Omani rial', 'OMR', 'baiza', '﷼', 3, 'Sultanate of Oman', 'OM', 'OMN', 'Oman', '142', '145', 0, '968', 'OM.png', 1, NULL, NULL, NULL),
(516, 'Windhoek', 'Namibian', '516', 'Namibian dollar', 'NAD', 'cent', '$', 2, 'Republic of Namibia', 'NA', 'NAM', 'Namibia', '002', '018', 0, '264', 'NA.png', 1, NULL, NULL, NULL),
(520, 'Yaren', 'Nauruan', '520', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Republic of Nauru', 'NR', 'NRU', 'Nauru', '009', '057', 0, '674', 'NR.png', 1, NULL, NULL, NULL),
(524, 'Kathmandu', 'Nepalese', '524', 'Nepalese rupee', 'NPR', 'paisa (inv.)', '₨', 2, 'Nepal', 'NP', 'NPL', 'Nepal', '142', '034', 0, '977', 'NP.png', 1, NULL, NULL, NULL),
(528, 'Amsterdam (NL2)', 'Dutch', '528', 'euro', 'EUR', 'cent', '€', 2, 'Kingdom of the Netherlands', 'NL', 'NLD', 'Netherlands', '150', '155', 1, '31', 'NL.png', 1, NULL, NULL, NULL),
(531, 'Willemstad', 'Curaçaoan', '531', 'Netherlands Antillean guilder (CW1)', 'ANG', 'cent', NULL, NULL, 'Curaçao', 'CW', 'CUW', 'Curaçao', '019', '029', 0, '599', NULL, 1, NULL, NULL, NULL),
(533, 'Oranjestad', 'Aruban', '533', 'Aruban guilder', 'AWG', 'cent', 'ƒ', 2, 'Aruba', 'AW', 'ABW', 'Aruba', '019', '029', 0, '297', 'AW.png', 1, NULL, NULL, NULL),
(534, 'Philipsburg', 'Sint Maartener', '534', 'Netherlands Antillean guilder (SX1)', 'ANG', 'cent', NULL, NULL, 'Sint Maarten', 'SX', 'SXM', 'Sint Maarten (Dutch part)', '019', '029', 0, '721', NULL, 1, NULL, NULL, NULL),
(535, NULL, 'of Bonaire, Sint Eustatius and Saba', '535', 'US dollar', 'USD', 'cent', NULL, NULL, NULL, 'BQ', 'BES', 'Bonaire, Sint Eustatius and Saba', '019', '029', 0, '599', NULL, 1, NULL, NULL, NULL),
(540, 'Nouméa', 'New Caledonian', '540', 'CFP franc', 'XPF', 'centime', 'XPF', 0, 'New Caledonia', 'NC', 'NCL', 'New Caledonia', '009', '054', 0, '687', 'NC.png', 1, NULL, NULL, NULL),
(548, 'Port Vila', 'Vanuatuan', '548', 'vatu (inv.)', 'VUV', '', 'Vt', 0, 'Republic of Vanuatu', 'VU', 'VUT', 'Vanuatu', '009', '054', 0, '678', 'VU.png', 1, NULL, NULL, NULL),
(554, 'Wellington', 'New Zealander', '554', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'New Zealand', 'NZ', 'NZL', 'New Zealand', '009', '053', 0, '64', 'NZ.png', 1, NULL, NULL, '2017-12-11 09:59:09'),
(558, 'Managua', 'Nicaraguan', '558', 'córdoba oro', 'NIO', 'centavo', 'C$', 2, 'Republic of Nicaragua', 'NI', 'NIC', 'Nicaragua', '019', '013', 0, '505', 'NI.png', 1, NULL, NULL, NULL),
(562, 'Niamey', 'Nigerien', '562', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Niger', 'NE', 'NER', 'Niger', '002', '011', 0, '227', 'NE.png', 1, NULL, NULL, NULL),
(566, 'Abuja', 'Nigerian', '566', 'naira (inv.)', 'NGN', 'kobo (inv.)', '₦', 2, 'Federal Republic of Nigeria', 'NG', 'NGA', 'Nigeria', '002', '011', 0, '234', 'NG.png', 1, NULL, NULL, NULL),
(570, 'Alofi', 'Niuean', '570', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Niue', 'NU', 'NIU', 'Niue', '009', '061', 0, '683', 'NU.png', 1, NULL, NULL, NULL),
(574, 'Kingston', 'Norfolk Islander', '574', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Territory of Norfolk Island', 'NF', 'NFK', 'Norfolk Island', '009', '053', 0, '672', 'NF.png', 1, NULL, NULL, NULL),
(578, 'Oslo', 'Norwegian', '578', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'kr', 2, 'Kingdom of Norway', 'NO', 'NOR', 'Norway', '150', '154', 0, '47', 'NO.png', 1, NULL, NULL, NULL),
(580, 'Saipan', 'Northern Mariana Islander', '580', 'US dollar', 'USD', 'cent', '$', 2, 'Commonwealth of the Northern Mariana Islands', 'MP', 'MNP', 'Northern Mariana Islands', '009', '057', 0, '1', 'MP.png', 1, NULL, NULL, NULL),
(581, 'United States Minor Outlying Islands', 'of United States Minor Outlying Islands', '581', 'US dollar', 'USD', 'cent', '$', 2, 'United States Minor Outlying Islands', 'UM', 'UMI', 'United States Minor Outlying Islands', '', '', 0, '1', 'UM.png', 1, NULL, NULL, NULL),
(583, 'Palikir', 'Micronesian', '583', 'US dollar', 'USD', 'cent', '$', 2, 'Federated States of Micronesia', 'FM', 'FSM', 'Micronesia, Federated States of', '009', '057', 0, '691', 'FM.png', 1, NULL, NULL, NULL),
(584, 'Majuro', 'Marshallese', '584', 'US dollar', 'USD', 'cent', '$', 2, 'Republic of the Marshall Islands', 'MH', 'MHL', 'Marshall Islands', '009', '057', 0, '692', 'MH.png', 1, NULL, NULL, NULL),
(585, 'Melekeok', 'Palauan', '585', 'US dollar', 'USD', 'cent', '$', 2, 'Republic of Palau', 'PW', 'PLW', 'Palau', '009', '057', 0, '680', 'PW.png', 1, NULL, NULL, NULL),
(586, 'Islamabad', 'Pakistani', '586', 'Pakistani rupee', 'PKR', 'paisa', '₨', 2, 'Islamic Republic of Pakistan', 'PK', 'PAK', 'Pakistan', '142', '034', 0, '92', 'PK.png', 1, NULL, NULL, NULL),
(591, 'Panama City', 'Panamanian', '591', 'balboa', 'PAB', 'centésimo', 'B/.', 2, 'Republic of Panama', 'PA', 'PAN', 'Panama', '019', '013', 0, '507', 'PA.png', 1, NULL, NULL, NULL),
(598, 'Port Moresby', 'Papua New Guinean', '598', 'kina (inv.)', 'PGK', 'toea (inv.)', 'PGK', 2, 'Independent State of Papua New Guinea', 'PG', 'PNG', 'Papua New Guinea', '009', '054', 0, '675', 'PG.png', 1, NULL, NULL, NULL),
(600, 'Asunción', 'Paraguayan', '600', 'guaraní', 'PYG', 'céntimo', 'Gs', 0, 'Republic of Paraguay', 'PY', 'PRY', 'Paraguay', '019', '005', 0, '595', 'PY.png', 1, NULL, NULL, NULL),
(604, 'Lima', 'Peruvian', '604', 'new sol', 'PEN', 'céntimo', 'S/.', 2, 'Republic of Peru', 'PE', 'PER', 'Peru', '019', '005', 0, '51', 'PE.png', 1, NULL, NULL, NULL),
(608, 'Manila', 'Filipino', '608', 'Philippine peso', 'PHP', 'centavo', 'Php', 2, 'Republic of the Philippines', 'PH', 'PHL', 'Philippines', '142', '035', 0, '63', 'PH.png', 1, NULL, NULL, NULL),
(612, 'Adamstown', 'Pitcairner', '612', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Pitcairn Islands', 'PN', 'PCN', 'Pitcairn', '009', '061', 0, '649', 'PN.png', 1, NULL, NULL, NULL),
(616, 'Warsaw', 'Polish', '616', 'zloty', 'PLN', 'grosz (pl. groszy)', 'zł', 2, 'Republic of Poland', 'PL', 'POL', 'Poland', '150', '151', 1, '48', 'PL.png', 1, NULL, NULL, NULL),
(620, 'Lisbon', 'Portuguese', '620', 'euro', 'EUR', 'cent', '€', 2, 'Portuguese Republic', 'PT', 'PRT', 'Portugal', '150', '039', 1, '351', 'PT.png', 1, NULL, NULL, NULL),
(624, 'Bissau', 'Guinea-Bissau national', '624', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Guinea-Bissau', 'GW', 'GNB', 'Guinea-Bissau', '002', '011', 0, '245', 'GW.png', 1, NULL, NULL, NULL),
(626, 'Dili', 'East Timorese', '626', 'US dollar', 'USD', 'cent', '$', 2, 'Democratic Republic of East Timor', 'TL', 'TLS', 'Timor-Leste', '142', '035', 0, '670', 'TL.png', 1, NULL, NULL, NULL),
(630, 'San Juan', 'Puerto Rican', '630', 'US dollar', 'USD', 'cent', '$', 2, 'Commonwealth of Puerto Rico', 'PR', 'PRI', 'Puerto Rico', '019', '029', 0, '1', 'PR.png', 1, NULL, NULL, NULL),
(634, 'Doha', 'Qatari', '634', 'Qatari riyal', 'QAR', 'dirham', '﷼', 2, 'State of Qatar', 'QA', 'QAT', 'Qatar', '142', '145', 0, '974', 'QA.png', 1, NULL, NULL, NULL),
(638, 'Saint-Denis', 'Reunionese', '638', 'euro', 'EUR', 'cent', '€', 2, 'Réunion', 'RE', 'REU', 'Réunion', '002', '014', 0, '262', 'RE.png', 1, NULL, NULL, NULL),
(642, 'Bucharest', 'Romanian', '642', 'Romanian leu (pl. lei)', 'RON', 'ban (pl. bani)', 'lei', 2, 'Romania', 'RO', 'ROU', 'Romania', '150', '151', 1, '40', 'RO.png', 1, NULL, NULL, NULL),
(643, 'Moscow', 'Russian', '643', 'Russian rouble', 'RUB', 'kopek', 'руб', 2, 'Russian Federation', 'RU', 'RUS', 'Russian Federation', '150', '151', 0, '7', 'RU.png', 1, NULL, NULL, '2017-12-11 10:00:08'),
(646, 'Kigali', 'Rwandan; Rwandese', '646', 'Rwandese franc', 'RWF', 'centime', 'RWF', 0, 'Republic of Rwanda', 'RW', 'RWA', 'Rwanda', '002', '014', 0, '250', 'RW.png', 1, NULL, NULL, NULL),
(652, 'Gustavia', 'of Saint Barthélemy', '652', 'euro', 'EUR', 'cent', NULL, NULL, 'Collectivity of Saint Barthélemy', 'BL', 'BLM', 'Saint Barthélemy', '019', '029', 0, '590', NULL, 1, NULL, NULL, NULL),
(654, 'Jamestown', 'Saint Helenian', '654', 'Saint Helena pound', 'SHP', 'penny', '£', 2, 'Saint Helena, Ascension and Tristan da Cunha', 'SH', 'SHN', 'Saint Helena, Ascension and Tristan da Cunha', '002', '011', 0, '290', 'SH.png', 1, NULL, NULL, NULL),
(659, 'Basseterre', 'Kittsian; Nevisian', '659', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Federation of Saint Kitts and Nevis', 'KN', 'KNA', 'Saint Kitts and Nevis', '019', '029', 0, '1', 'KN.png', 1, NULL, NULL, NULL),
(660, 'The Valley', 'Anguillan', '660', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Anguilla', 'AI', 'AIA', 'Anguilla', '019', '029', 0, '1', 'AI.png', 1, NULL, NULL, '2019-02-14 11:52:18'),
(662, 'Castries', 'Saint Lucian', '662', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Saint Lucia', 'LC', 'LCA', 'Saint Lucia', '019', '029', 0, '1', 'LC.png', 1, NULL, NULL, NULL),
(663, 'Marigot', 'of Saint Martin', '663', 'euro', 'EUR', 'cent', NULL, NULL, 'Collectivity of Saint Martin', 'MF', 'MAF', 'Saint Martin (French part)', '019', '029', 0, '590', NULL, 1, NULL, NULL, NULL),
(666, 'Saint-Pierre', 'St-Pierrais; Miquelonnais', '666', 'euro', 'EUR', 'cent', '€', 2, 'Territorial Collectivity of Saint Pierre and Miquelon', 'PM', 'SPM', 'Saint Pierre and Miquelon', '019', '021', 0, '508', 'PM.png', 1, NULL, NULL, NULL),
(670, 'Kingstown', 'Vincentian', '670', 'East Caribbean dollar', 'XCD', 'cent', '$', 2, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'Saint Vincent and the Grenadines', '019', '029', 0, '1', 'VC.png', 1, NULL, NULL, NULL),
(674, 'San Marino', 'San Marinese', '674', 'euro', 'EUR', 'cent', '€', 2, 'Republic of San Marino', 'SM', 'SMR', 'San Marino', '150', '039', 0, '378', 'SM.png', 1, NULL, NULL, NULL),
(678, 'São Tomé', 'São Toméan', '678', 'dobra', 'STD', 'centavo', 'Db', 2, 'Democratic Republic of São Tomé and Príncipe', 'ST', 'STP', 'Sao Tome and Principe', '002', '017', 0, '239', 'ST.png', 1, NULL, NULL, NULL),
(682, 'Riyadh', 'Saudi Arabian', '682', 'riyal', 'SAR', 'halala', '﷼', 2, 'Kingdom of Saudi Arabia', 'SA', 'SAU', 'Saudi Arabia', '142', '145', 0, '966', 'SA.png', 1, NULL, NULL, NULL),
(686, 'Dakar', 'Senegalese', '686', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Republic of Senegal', 'SN', 'SEN', 'Senegal', '002', '011', 0, '221', 'SN.png', 1, NULL, NULL, NULL),
(688, 'Belgrade', 'Serb', '688', 'Serbian dinar', 'RSD', 'para (inv.)', NULL, NULL, 'Republic of Serbia', 'RS', 'SRB', 'Serbia', '150', '039', 0, '381', NULL, 1, NULL, NULL, NULL),
(690, 'Victoria', 'Seychellois', '690', 'Seychelles rupee', 'SCR', 'cent', '₨', 2, 'Republic of Seychelles', 'SC', 'SYC', 'Seychelles', '002', '014', 0, '248', 'SC.png', 1, NULL, NULL, NULL),
(694, 'Freetown', 'Sierra Leonean', '694', 'leone', 'SLL', 'cent', 'Le', 2, 'Republic of Sierra Leone', 'SL', 'SLE', 'Sierra Leone', '002', '011', 0, '232', 'SL.png', 1, NULL, NULL, NULL),
(702, 'Singapore', 'Singaporean', '702', 'Singapore dollar', 'SGD', 'cent', '$', 2, 'Republic of Singapore', 'SG', 'SGP', 'Singapore', '142', '035', 0, '65', 'SG.png', 1, NULL, NULL, NULL),
(703, 'Bratislava', 'Slovak', '703', 'euro', 'EUR', 'cent', 'Sk', 2, 'Slovak Republic', 'SK', 'SVK', 'Slovakia', '150', '151', 1, '421', 'SK.png', 1, NULL, NULL, NULL),
(704, 'Hanoi', 'Vietnamese', '704', 'dong', 'VND', '(10 hào', '₫', 2, 'Socialist Republic of Vietnam', 'VN', 'VNM', 'Viet Nam', '142', '035', 0, '84', 'VN.png', 1, NULL, NULL, NULL),
(705, 'Ljubljana', 'Slovene', '705', 'euro', 'EUR', 'cent', '€', 2, 'Republic of Slovenia', 'SI', 'SVN', 'Slovenia', '150', '039', 1, '386', 'SI.png', 1, NULL, NULL, NULL),
(706, 'Mogadishu', 'Somali', '706', 'Somali shilling', 'SOS', 'cent', 'S', 2, 'Somali Republic', 'SO', 'SOM', 'Somalia', '002', '014', 0, '252', 'SO.png', 1, NULL, NULL, NULL),
(710, 'Pretoria (ZA1)', 'South African', '710', 'rand', 'ZAR', 'cent', 'R', 2, 'Republic of South Africa', 'ZA', 'ZAF', 'South Africa', '002', '018', 0, '27', 'ZA.png', 1, NULL, NULL, NULL),
(716, 'Harare', 'Zimbabwean', '716', 'Zimbabwe dollar (ZW1)', 'ZWL', 'cent', 'Z$', 2, 'Republic of Zimbabwe', 'ZW', 'ZWE', 'Zimbabwe', '002', '014', 0, '263', 'ZW.png', 1, NULL, NULL, NULL),
(724, 'Madrid', 'Spaniard', '724', 'euro', 'EUR', 'cent', '€', 2, 'Kingdom of Spain', 'ES', 'ESP', 'Spain', '150', '039', 1, '34', 'ES.png', 1, NULL, NULL, '2017-12-11 10:00:23'),
(728, 'Juba', 'South Sudanese', '728', 'South Sudanese pound', 'SSP', 'piaster', NULL, NULL, 'Republic of South Sudan', 'SS', 'SSD', 'South Sudan', '002', '015', 0, '211', NULL, 1, NULL, NULL, NULL),
(729, 'Khartoum', 'Sudanese', '729', 'Sudanese pound', 'SDG', 'piastre', NULL, NULL, 'Republic of the Sudan', 'SD', 'SDN', 'Sudan', '002', '015', 0, '249', NULL, 1, NULL, NULL, NULL),
(732, 'Al aaiun', 'Sahrawi', '732', 'Moroccan dirham', 'MAD', 'centime', 'MAD', 2, 'Western Sahara', 'EH', 'ESH', 'Western Sahara', '002', '015', 0, '212', 'EH.png', 1, NULL, NULL, NULL),
(740, 'Paramaribo', 'Surinamese', '740', 'Surinamese dollar', 'SRD', 'cent', '$', 2, 'Republic of Suriname', 'SR', 'SUR', 'Suriname', '019', '005', 0, '597', 'SR.png', 1, NULL, NULL, NULL),
(744, 'Longyearbyen', 'of Svalbard', '744', 'Norwegian krone (pl. kroner)', 'NOK', 'øre (inv.)', 'kr', 2, 'Svalbard and Jan Mayen', 'SJ', 'SJM', 'Svalbard and Jan Mayen', '150', '154', 0, '47', 'SJ.png', 1, NULL, NULL, NULL),
(748, 'Mbabane', 'Swazi', '748', 'lilangeni', 'SZL', 'cent', 'SZL', 2, 'Kingdom of Swaziland', 'SZ', 'SWZ', 'Swaziland', '002', '018', 0, '268', 'SZ.png', 1, NULL, NULL, NULL),
(752, 'Stockholm', 'Swedish', '752', 'krona (pl. kronor)', 'SEK', 'öre (inv.)', 'kr', 2, 'Kingdom of Sweden', 'SE', 'SWE', 'Sweden', '150', '154', 1, '46', 'SE.png', 1, NULL, NULL, NULL),
(756, 'Berne', 'Swiss', '756', 'Swiss franc', 'CHF', 'centime', 'CHF', 2, 'Swiss Confederation', 'CH', 'CHE', 'Switzerland', '150', '155', 0, '41', 'CH.png', 1, NULL, NULL, NULL),
(760, 'Damascus', 'Syrian', '760', 'Syrian pound', 'SYP', 'piastre', '£', 2, 'Syrian Arab Republic', 'SY', 'SYR', 'Syrian Arab Republic', '142', '145', 0, '963', 'SY.png', 1, NULL, NULL, NULL),
(762, 'Dushanbe', 'Tajik', '762', 'somoni', 'TJS', 'diram', 'TJS', 2, 'Republic of Tajikistan', 'TJ', 'TJK', 'Tajikistan', '142', '143', 0, '992', 'TJ.png', 1, NULL, NULL, NULL),
(764, 'Bangkok', 'Thai', '764', 'baht (inv.)', 'THB', 'satang (inv.)', '฿', 2, 'Kingdom of Thailand', 'TH', 'THA', 'Thailand', '142', '035', 0, '66', 'TH.png', 1, NULL, NULL, NULL),
(768, 'Lomé', 'Togolese', '768', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Togolese Republic', 'TG', 'TGO', 'Togo', '002', '011', 0, '228', 'TG.png', 1, NULL, NULL, NULL),
(772, '(TK2)', 'Tokelauan', '772', 'New Zealand dollar', 'NZD', 'cent', '$', 2, 'Tokelau', 'TK', 'TKL', 'Tokelau', '009', '061', 0, '690', 'TK.png', 1, NULL, NULL, NULL),
(776, 'Nuku’alofa', 'Tongan', '776', 'pa’anga (inv.)', 'TOP', 'seniti (inv.)', 'T$', 2, 'Kingdom of Tonga', 'TO', 'TON', 'Tonga', '009', '061', 0, '676', 'TO.png', 1, NULL, NULL, NULL),
(780, 'Port of Spain', 'Trinidadian; Tobagonian', '780', 'Trinidad and Tobago dollar', 'TTD', 'cent', 'TT$', 2, 'Republic of Trinidad and Tobago', 'TT', 'TTO', 'Trinidad and Tobago', '019', '029', 0, '1', 'TT.png', 1, NULL, NULL, NULL),
(784, 'Abu Dhabi', 'Emirian', '784', 'UAE dirham', 'AED', 'fils (inv.)', 'AED', 2, 'United Arab Emirates', 'AE', 'ARE', 'United Arab Emirates', '142', '145', 0, '971', 'AE.png', 1, NULL, NULL, NULL),
(788, 'Tunis', 'Tunisian', '788', 'Tunisian dinar', 'TND', 'millime', 'TND', 3, 'Republic of Tunisia', 'TN', 'TUN', 'Tunisia', '002', '015', 0, '216', 'TN.png', 1, NULL, NULL, NULL),
(792, 'Ankara', 'Turk', '792', 'Turkish lira (inv.)', 'TRY', 'kurus (inv.)', '₺', 2, 'Republic of Turkey', 'TR', 'TUR', 'Turkey', '142', '145', 0, '90', 'TR.png', 1, 1, NULL, '2018-01-02 11:07:56'),
(795, 'Ashgabat', 'Turkmen', '795', 'Turkmen manat (inv.)', 'TMT', 'tenge (inv.)', 'm', 2, 'Turkmenistan', 'TM', 'TKM', 'Turkmenistan', '142', '143', 0, '993', 'TM.png', 1, NULL, NULL, NULL),
(796, 'Cockburn Town', 'Turks and Caicos Islander', '796', 'US dollar', 'USD', 'cent', '$', 2, 'Turks and Caicos Islands', 'TC', 'TCA', 'Turks and Caicos Islands', '019', '029', 0, '1', 'TC.png', 1, NULL, NULL, NULL),
(798, 'Funafuti', 'Tuvaluan', '798', 'Australian dollar', 'AUD', 'cent', '$', 2, 'Tuvalu', 'TV', 'TUV', 'Tuvalu', '009', '061', 0, '688', 'TV.png', 1, NULL, NULL, NULL),
(800, 'Kampala', 'Ugandan', '800', 'Uganda shilling', 'UGX', 'cent', 'UGX', 0, 'Republic of Uganda', 'UG', 'UGA', 'Uganda', '002', '014', 0, '256', 'UG.png', 1, NULL, NULL, NULL),
(804, 'Kiev', 'Ukrainian', '804', 'hryvnia', 'UAH', 'kopiyka', '₴', 2, 'Ukraine', 'UA', 'UKR', 'Ukraine', '150', '151', 0, '380', 'UA.png', 1, NULL, NULL, NULL),
(807, 'Skopje', 'of the former Yugoslav Republic of Macedonia', '807', 'denar (pl. denars)', 'MKD', 'deni (inv.)', 'ден', 2, 'the former Yugoslav Republic of Macedonia', 'MK', 'MKD', 'Macedonia, the former Yugoslav Republic of', '150', '039', 0, '389', 'MK.png', 1, NULL, NULL, NULL),
(818, 'Cairo', 'Egyptian', '818', 'Egyptian pound', 'EGP', 'piastre', '£', 2, 'Arab Republic of Egypt', 'EG', 'EGY', 'Egypt', '002', '015', 0, '20', 'EG.png', 1, NULL, NULL, NULL),
(826, 'London', 'British', '826', 'pound sterling', 'GBP', 'penny (pl. pence)', '£', 2, 'United Kingdom of Great Britain and Northern Ireland', 'GB', 'GBR', 'United Kingdom', '150', '154', 1, '44', 'GB.png', 1, NULL, NULL, NULL),
(831, 'St Peter Port', 'of Guernsey', '831', 'Guernsey pound (GG2)', 'GGP (GG2)', 'penny (pl. pence)', NULL, NULL, 'Bailiwick of Guernsey', 'GG', 'GGY', 'Guernsey', '150', '154', 0, '44', NULL, 1, NULL, NULL, NULL),
(832, 'St Helier', 'of Jersey', '832', 'Jersey pound (JE2)', 'JEP (JE2)', 'penny (pl. pence)', NULL, NULL, 'Bailiwick of Jersey', 'JE', 'JEY', 'Jersey', '150', '154', 0, '44', NULL, 1, NULL, NULL, NULL),
(833, 'Douglas', 'Manxman; Manxwoman', '833', 'Manx pound (IM2)', 'IMP (IM2)', 'penny (pl. pence)', NULL, NULL, 'Isle of Man', 'IM', 'IMN', 'Isle of Man', '150', '154', 0, '44', NULL, 1, NULL, NULL, NULL),
(834, 'Dodoma (TZ1)', 'Tanzanian', '834', 'Tanzanian shilling', 'TZS', 'cent', 'TZS', 2, 'United Republic of Tanzania', 'TZ', 'TZA', 'Tanzania, United Republic of', '002', '014', 0, '255', 'TZ.png', 1, NULL, NULL, NULL),
(840, 'Washington DC', 'American', '840', 'US dollar', 'USD', 'cent', '$', 2, 'United States of America', 'US', 'USA', 'United States', '019', '021', 0, '1', 'US.png', 1, NULL, NULL, '2017-12-11 09:34:45'),
(850, 'Charlotte Amalie', 'US Virgin Islander', '850', 'US dollar', 'USD', 'cent', '$', 2, 'United States Virgin Islands', 'VI', 'VIR', 'Virgin Islands, U.S.', '019', '029', 0, '1', 'VI.png', 1, NULL, NULL, NULL),
(854, 'Ouagadougou', 'Burkinabe', '854', 'CFA franc (BCEAO)', 'XOF', 'centime', 'XOF', 0, 'Burkina Faso', 'BF', 'BFA', 'Burkina Faso', '002', '011', 0, '226', 'BF.png', 1, NULL, NULL, NULL),
(858, 'Montevideo', 'Uruguayan', '858', 'Uruguayan peso', 'UYU', 'centésimo', '$U', 0, 'Eastern Republic of Uruguay', 'UY', 'URY', 'Uruguay', '019', '005', 0, '598', 'UY.png', 1, NULL, NULL, NULL),
(860, 'Tashkent', 'Uzbek', '860', 'sum (inv.)', 'UZS', 'tiyin (inv.)', 'лв', 2, 'Republic of Uzbekistan', 'UZ', 'UZB', 'Uzbekistan', '142', '143', 0, '998', 'UZ.png', 1, NULL, NULL, NULL),
(862, 'Caracas', 'Venezuelan', '862', 'bolívar fuerte (pl. bolívares fuertes)', 'VEF', 'céntimo', 'Bs', 2, 'Bolivarian Republic of Venezuela', 'VE', 'VEN', 'Venezuela, Bolivarian Republic of', '019', '005', 0, '58', 'VE.png', 1, NULL, NULL, NULL),
(876, 'Mata-Utu', 'Wallisian; Futunan; Wallis and Futuna Islander', '876', 'CFP franc', 'XPF', 'centime', 'XPF', 0, 'Wallis and Futuna', 'WF', 'WLF', 'Wallis and Futuna', '009', '061', 0, '681', 'WF.png', 1, NULL, NULL, NULL),
(882, 'Apia', 'Samoan', '882', 'tala (inv.)', 'WST', 'sene (inv.)', 'WS$', 2, 'Independent State of Samoa', 'WS', 'WSM', 'Samoa', '009', '061', 0, '685', 'WS.png', 1, NULL, NULL, NULL),
(887, 'San’a', 'Yemenite', '887', 'Yemeni rial', 'YER', 'fils (inv.)', '﷼', 2, 'Republic of Yemen', 'YE', 'YEM', 'Yemen', '142', '145', 0, '967', 'YE.png', 1, NULL, NULL, NULL),
(894, 'Lusaka', 'Zambian', '894', 'Zambian kwacha (inv.)', 'ZMW', 'ngwee (inv.)', 'ZK', 2, 'Republic of Zambia', 'ZM', 'ZMB', 'Zambia', '002', '014', 0, '260', 'ZM.png', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer_infos`
--

CREATE TABLE `employer_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer_infos`
--

INSERT INTO `employer_infos` (`id`, `company_name`, `phone`, `email`, `website`, `address`, `license`, `details`, `expire_date`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Revinr', '0497309106', 'email@info.com', NULL, 'Address', '123', 'Desc', '2019-04-30', NULL, 1, '2019-04-24 12:00:00', NULL),
(2, 'Ebs', '77787890', 'email@gmail.com', NULL, 'House 37, Road 03, Sector 09, Uttara, Dhaka-1230', 'Uttara', 'Deschh', '2019-04-30', '2019_05_26_05_41_5052.jpg', 1, '2019-04-24 12:00:00', '2019-05-26 10:45:36'),
(3, 'Ekattor Store', '497309106', 'fd@gmail.com', NULL, '44 Railway Parade, Lakemba, NSW 2195', 'New South Wales', 'asfasf', NULL, NULL, 1, '2019-05-22 15:45:34', '2019-05-25 09:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Maruf Al Bashir', 'marufalbashir@gmail.com', '497309106', 'hfgghf', 'a ras', '2019-05-07 14:30:42', '2019-05-07 14:30:42'),
(3, 'Helal Mohammad', 'helaldu@gmail.com', '1624595959', 'Test Subject from revinr', 'Test Subject from revinr Test Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinrTest Subject from revinr', '2019-05-30 13:03:23', '2019-05-30 13:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_18_072530_create_roles_table', 1),
(4, '2019_04_18_112028_create_pages_table', 1),
(5, '2019_04_18_135128_create_socials_table', 1),
(6, '2019_04_21_122233_create_user_infos_table', 2),
(7, '2019_04_23_090217_create_messages_table', 2),
(8, '2019_04_23_095130_create_widgets_table', 2),
(9, '2019_04_23_141358_create_work_histories_table', 2),
(11, '2019_04_23_192418_create_user_documents_table', 2),
(12, '2019_04_24_180134_create_sliders_table', 2),
(13, '2019_04_25_041503_create_banks_table', 2),
(14, '2019_04_25_065718_create_employer_infos_table', 2),
(15, '2019_04_25_101933_create_assigned_candidates_table', 2),
(16, '2019_04_25_151502_create_categories_table', 2),
(17, '2019_04_25_151630_create_category_questions_table', 2),
(18, '2019_04_27_190650_create_questions_table', 3),
(19, '2019_04_28_042715_create_topics_table', 4),
(20, '2019_04_23_142220_create_work_abilities_table', 5),
(21, '2019_04_29_060135_create_services_table', 5),
(22, '2019_04_29_092442_create_countries_table', 6),
(23, '2019_04_30_075822_create_working_categories_table', 7),
(24, '2019_04_30_075911_create_works_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `og_url` text COLLATE utf8mb4_unicode_ci,
  `og_image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `banner`, `desc`, `status`, `keywords`, `meta_desc`, `og_url`, `og_image`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', NULL, '<div class=\"row justify-content-center text-center mb-4 appear-animation\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"400\">\r\n    <div class=\"col-lg-10\">\r\n        <h2 class=\"font-weight-bold mb-3 mt-3\">WELCOME TO INFINITY WORKFORCE</h2>\r\n        <p class=\"text-6 text-color-dark line-height-7 negative-ls-1 px-5\">Do you have an ongoing Project to fulfill? An office to staff or a factory to man, or in need of labourers? If you are! We can help! You can hire a labourer for a day, week/s or just a few hours.</p>\r\n        <p class=\"opacity-9 text-4\">We provide labour hire services to many industries including Catering companies, Food factories, Construction Industries, Industrial Factories, Events Services, Warehouses, Security Services and Cleaning Services, to name a few. We do the due diligence, individually assess all our recruits to make sure that they are legal and fit the Australian labour code so that you don’t have to.<br>Give us a call at 02 8041 691 to discuss your labour needs.</p>\r\n    </div>\r\n</div>', 1, NULL, NULL, NULL, NULL, '2019-04-17 12:00:00', '2019-05-28 03:27:03'),
(2, 'About Us', 'about-us', 'banner-about-us.jpg', '<p style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-family: undefined;\">﻿</span><font face=\"Calibri, sans-serif\" style=\"\"><span style=\"font-size: 18px; white-space: pre-wrap;\"><b>The Recruitment Specialist</b></span></font></p><p style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><div style=\"text-align: justify;\"><span style=\"font-size: 18px; white-space: pre-wrap; font-family: Calibri, sans-serif;\">Infinity Workforce was founded by Hasan and Wahed when they started originally back then in 2006 offering quality, reliable and trusted employment services to Sydney based companies.</span></div><font face=\"Calibri, sans-serif\">\r\n<div style=\"font-size: 18px; white-space: pre-wrap; text-align: justify;\">Building relationship between candidates and employers has always been a priority, Infinity Workforce has a strong reputation in the recruitment &amp; labour hire industry for having experienced consultants who understand the unique requirements of specific industry such as with food services, cleaning, construction, security, as well as nursing &amp; personal care</div><span style=\"font-size: 18px; white-space: pre-wrap;\">\r\nFinding skilled and well experienced recruitment &amp; labour hire personnel is now easier than ever. When you entrust your staffing requirements and let a specialised recruitment firm handle the tasks of recruiting the right people for your projects, you will be able to save your resources and focus on other important aspects of your business.\r\n</span><div style=\"font-size: 18px; white-space: pre-wrap; text-align: justify;\">With our Sydney based office, our team offer specialised recruitment services spanning across a range of industries with a culture that is focused on exceptional recruitment service that take care of employers’ needs, creating lasting partnerships.</div><span style=\"font-size: 18px; white-space: pre-wrap;\">Through our dedicated labour hire specialist consultants, Infinity Workforce is able to deliver recruitment &amp; labour hire solutions that align with your corporate culture and also meet your technical requirements.\r\n</span><div style=\"text-align: justify;\"><span style=\"font-size: 18px; white-space: pre-wrap;\"><br></span></div></font></p><div></div>', 1, NULL, NULL, NULL, NULL, '2019-04-17 12:00:00', '2019-05-28 02:59:03'),
(3, 'Job Listings', 'job-listings', NULL, 'Desc', 1, NULL, NULL, NULL, NULL, '2019-04-17 12:00:00', NULL),
(4, 'Employers', 'employers', NULL, '<span id=\"docs-internal-guid-aa36744c-7fff-f56a-afe7-d0f15e0ef797\"><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Dear clients,</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: &quot;Times New Roman&quot;; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Infinity</span><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"> workforce specialises in providing custom recruitment &amp; HR solutions to a variety of industries all around Sydney, as well as some area in NSW Australia. Our aims is “Building relationships, and delivering results”!</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Our retention of major clients over many years illustrates our ability to maintain a level of service that exceeds their expectations. When you come to us, we make sure your needs are put ahead of everything else so that you can rest at ease and run your business without having to worry about where to source your staff from.</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">We do comprehensive analysis of all the applications we receive, properly evaluate to check suitability for the jobs in question and make them available to you.</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-weight: 700; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">Our clients include:</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Catering companies</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Food factories</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Cleaning services</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Security services</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Construction industries</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Events services</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» Personal Care services</span></p><p dir=\"ltr\" style=\"line-height:1.2;margin-top:0pt;margin-bottom:8pt;\"><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\">» NDIS Carer services</span></p><div><span style=\"font-size: 12pt; font-family: Calibri, sans-serif; color: rgb(0, 0, 0); background-color: transparent; font-variant-numeric: normal; font-variant-east-asian: normal; vertical-align: baseline; white-space: pre-wrap;\"><br></span></div></span>', 1, NULL, NULL, NULL, NULL, '2019-04-18 12:00:00', '2019-05-28 03:07:19'),
(5, 'Services', 'services', NULL, NULL, 1, NULL, NULL, NULL, NULL, '2019-05-04 18:00:00', '2019-05-05 08:37:42'),
(6, 'Contact Us', 'contact', NULL, '<div class=\"overflow-hidden mb-1\">\r\n      <div class=\"appear-animation animated fadeInUpShorter appear-animation-visible\" data-appear-animation=\"fadeInUpShorter\" data-appear-animation-delay=\"800\" style=\"animation-delay: 800ms;\">\r\n        <h4 class=\"text-primary pt-5\">Our <strong>Office</strong></h4>\r\n        <ul class=\"list list-icons list-icons-style-3 mt-2\">\r\n          <li><i class=\"fas fa-map-marker-alt top-6\"></i> <strong>Address:</strong> Suite 27, 1-5 Jacobs Street, Bankstown NSW 2200, Australia</li>\r\n          <li><i class=\"fas fa-phone top-6\"></i> <strong>Phone:</strong> 02 8773 2132</li>\r\n          <li><i class=\"fas fa-envelope top-6\"></i> <strong>Email:</strong> <a href=\"mailto:info@infinityworkforce.com.au\">info@infinityworkforce.com.au </a></li>\r\n        </ul>\r\n\r\n      \r\n\r\n        <h4 class=\"text-primary pt-5\">Business <strong>Hours</strong></h4>\r\n        <ul class=\"list list-icons list-dark mt-2\">\r\n          <li><i class=\"far fa-clock top-6\"></i> Monday - Friday - 9am to 5pm</li>\r\n          <li><i class=\"far fa-clock top-6\"></i> Saturday - 9am to 2pm</li>\r\n          <li><i class=\"far fa-clock top-6\"></i> Sunday - Closed</li>\r\n        </ul>\r\n      </div></div>', 1, NULL, NULL, NULL, NULL, '2019-05-04 18:00:00', '2019-05-28 03:19:13'),
(7, 'Job Listing', 'job-listing', NULL, 'job listing', 1, 'ser,', 'desc', NULL, NULL, '2019-05-04 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('iambiva@hotmail.com', '$2y$10$ESAI5ImxwOxtg0J7WGgCf.lCAIkeDhrCfeNCYz0TvOtOaQBQAJj.e', '2019-05-10 18:29:36'),
('SAIF.KAGOZI@GMAIL.COM', '$2y$10$7XVCtSQa.dknSC1RN5Ay1ecKvFrgoRBF7v0XSUHKJQpfsAvUDnXUu', '2019-05-21 14:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_ans` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `right_ans`, `category_id`, `topic_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'The train goes ______ many tunnels on the way to Rome.', 'in', 'to', 'through', 'over', '2', 2, 1, 1, '2019-04-27 18:00:00', '2019-04-28 02:29:09'),
(2, 'What does HACCP stand for? ?', 'Hazard and Critical Crisis Parts', 'Help and Care Control Plan', 'Hazard Analysis of Critical Control Points', 'Hot and Chunky Chicken Pies', '2', 2, 0, 1, '2019-04-27 23:48:13', '2019-05-01 02:13:35'),
(3, 'Which of the following is TRUE about bacteria: ?', 'Bacteria multiplies and grows faster in warm environments', 'Bacteria needs air to survive', 'Every type of bacteria can give people food poisoning', 'By freezing food you can kill bacteria', '2', 2, 1, 1, '2019-04-27 23:51:46', '2019-05-01 02:14:47'),
(4, 'What ..... you say?', 'are', 'did', 'have', 'were', '2', 1, 1, 1, '2019-04-28 03:13:55', '2019-05-02 04:36:17'),
(5, 'Where ..... to spend your holidays next summer?', 'will you be', 'you be  you', 'are going', 'are you going', '2', 1, 1, 1, '2019-05-01 02:07:32', '2019-05-26 13:17:03'),
(6, 'Where ..... when you met him? ?', 'is he living', 'did he live', 'live did', 'he  was he living', '2', 1, 1, 1, '2019-05-01 02:08:09', '2019-05-01 02:08:09'),
(7, 'Why ..... laughing? ?', 'do you', 'you are', 'are you', 'did you', '2', 1, 1, 1, '2019-05-01 02:08:40', '2019-05-01 02:08:40'),
(8, '………......got a light? ?', 'Have you', 'Do you', 'you have', 'you do', '2', 1, 1, 1, '2019-05-01 02:09:25', '2019-05-01 02:09:25'),
(9, 'Which fictional city is the home of Batman?', 'Reveal Answer', 'Answer', 'Reveal', 'Rev', '1', 1, NULL, 1, '2019-05-22 11:03:25', '2019-05-22 11:03:25'),
(10, 'Which fictional city is the home of Batman?', 'Reveal Answer', 'Answer', 'Reveal', 'Rev', '1', 5, NULL, 1, '2019-05-23 13:02:41', '2019-05-23 13:02:41'),
(11, 'what is this', 'a', 'b', 'c', 'pen', '4', 1, NULL, 1, '2019-05-25 09:47:26', '2019-05-25 09:47:26'),
(12, 'what is that', 'h', 's', 'f', 'book', '4', 1, NULL, 1, '2019-05-25 09:50:14', '2019-05-25 09:50:14'),
(13, 'Which fictional city is the home of Batman?', 'Reveal Answer', 'Answer', 'Reveal', 'Rev', '1', 3, NULL, 1, '2019-05-26 14:47:35', '2019-05-26 14:47:35'),
(14, 'Where ..... to spend your holidays next summer?', 'sdfdfd', 'vxvxvc', 'xvcx', 'vxvx', '2', 3, NULL, 1, '2019-05-26 14:47:59', '2019-05-26 14:47:59'),
(15, 'A leaf shaped gland that is positioned posterior to the stomach. It has exocrine and endocrine functions.', 'Rectus Sheath', 'Rectus Sheath', 'Rectus Sheath', 'Rectus Sheath', '1', 3, NULL, 1, '2019-05-26 14:50:48', '2019-05-26 14:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2019-04-26 18:00:00', NULL),
(2, 'Candidate', 1, '2019-04-26 18:00:00', NULL),
(3, 'Employer', 1, '2019-04-27 11:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `self_funds`
--

CREATE TABLE `self_funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `esa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usi_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `self_funds`
--

INSERT INTO `self_funds` (`id`, `user_id`, `number`, `abn`, `esa`, `usi_code`, `membership_number`, `acc_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, '1234563', '14010', '120', '111', '1455', 'Savings', 1, '2019-05-09 00:24:32', '2019-05-09 04:48:01'),
(2, 23, '121', 'abn', '123', '123', '121', 'current', 1, '2019-05-09 20:35:38', '2019-05-09 20:35:38'),
(3, 26, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-05-10 18:22:06', '2019-05-10 18:22:06'),
(4, 30, '45678', 'ghhh', NULL, '66666', '453456', 'sabuj', 1, '2019-05-22 09:37:42', '2019-05-22 09:37:42'),
(5, 29, '45678', 'ghhh', '00000', '66666', '453456', 'sabuj', 1, '2019-05-23 14:34:31', '2019-05-23 14:34:31'),
(6, 31, NULL, NULL, NULL, NULL, '3445', NULL, 1, '2019-05-23 14:49:18', '2019-05-23 14:49:18'),
(7, 33, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-05-25 09:14:08', '2019-05-25 09:14:08'),
(8, 35, '444', '44444', '66666', NULL, NULL, NULL, 1, '2019-05-26 13:59:23', '2019-05-26 13:59:23'),
(9, 36, NULL, 'jkjk0009', NULL, '898Jkl', NULL, NULL, 1, '2019-05-28 18:34:22', '2019-05-28 18:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'service-default-banner.jpg',
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'service-default-thumb.jpg',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `long_desc`, `short_desc`, `short_link`, `banner`, `thumbnail`, `status`, `created_at`, `updated_at`) VALUES
(3, 'EMPLOYERS', 'emp', 'Our goal is to be an extension of your human resources department, and provide you with effective and immediate staffing solutions to assist you in keeping pace with your evolving staffing needs', 'Our goal is to be an extension of your human resources department, and provide you with effective and immediate staffing solutions to assist you in keeping pace with your evolving staffing needs', '/infinity-workforce/employer', 'service-default-banner.jpg', '2019_05_02_13_43_4207.jpg', 1, '2019-05-02 04:37:59', '2019-05-28 03:35:44'),
(4, 'JOB SEEKERS', 'job', 'At Infinity Workforce we are always looking for serious and skilled workers which are looking to expand their knowledge and offer the best service whichever the industry they are performing to.', 'At Infinity Workforce we are always looking for serious and skilled workers which are looking to expand their knowledge and offer the best service whichever the industry they are performing to.', '/infinity-workforce/register-user', 'service-default-banner.jpg', '2019_05_02_13_43_2392.jpg', 1, '2019-05-02 07:43:55', '2019-05-28 03:37:24'),
(5, 'RECRUITMENT', 'home-slider', 'At Infinity Workforce we work closely with our clients to fulfil their staffing needs. We employ consultants with industry specific knowledge to assist you in the recruiting and candidate selection', 'At Infinity Workforce we work closely with our clients to fulfil their staffing needs. We employ consultants with industry specific knowledge to assist you in the recruiting and candidate selection', '/infinity-workforce/job-listing', 'service-default-banner.jpg', 'service-default-thumb.jpg', 1, '2019-05-05 07:26:42', '2019-05-28 03:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sl` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `sl`, `image`, `caption`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, '2019_05_30_07_37_2598.jpg', '<h1 class=\"tp-caption font-weight-extra-bold text-color-light negative-ls-2\"\r\n                                data-frames=\'[{\"delay\":1000,\"speed\":2000,\"frame\":\"0\",\"from\":\"sX:1.5;opacity:0;fb:20px;\",\"to\":\"o:1;fb:0;\",\"ease\":\"Power3.easeInOut\"},{\"delay\":\"wait\",\"speed\":300,\"frame\":\"999\",\"to\":\"opacity:0;fb:0;\",\"ease\":\"Power3.easeInOut\"}]\'\r\n                                data-x=\"center\"\r\n                               data-y=\"center\"\r\n                                data-fontsize=\"[\'50\',\'50\',\'50\',\'90\']\"\r\n                                data-lineheight=\"[\'55\',\'55\',\'55\',\'95\']\" style=\"background:rgba(0,0,0,.5); padding: 20px; margin-top: 50%; border-radius: 3px;\" >WELCOME TO <br/> INFINITY WORKFORCE</h1>', 1, '2019-05-02 03:26:25', '2019-05-30 01:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hover_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `name`, `link`, `icon`, `color`, `hover_color`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', 'fab fa-facebook-f', '#ffffff', '#0080ff', 1, '2019-04-28 23:21:39', '2019-04-28 23:21:39'),
(2, 'Facebook', 'https://www.twitter.com/', 'fab fa-twitter', '#ffffff', '#0080ff', 1, '2019-04-28 23:21:39', '2019-04-28 23:21:39'),
(3, 'Facebook', 'https://www.linkedin.com/', 'fab fa-linkedin-in', '#ffffff', '#0080ff', 1, '2019-04-28 23:21:39', '2019-04-28 23:21:39'),
(4, 'Youtube', 'https://www.youtube.com/', 'fab fa-youtube', '#000000', '#000000', 1, '2019-05-22 12:13:14', '2019-05-22 12:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) DEFAULT NULL,
  `question_no` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `time`, `question_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 'English', 20, NULL, 1, '2019-04-27 18:00:00', NULL),
(2, 'General Knowledge', 35, 35, 1, '2019-05-22 11:15:48', '2019-05-23 13:03:16'),
(3, 'General Knowledge', 35, 35, 1, '2019-05-22 11:43:16', '2019-05-23 13:03:22'),
(4, 'Admin', 20, 20, 0, '2019-05-23 20:48:53', '2019-05-23 20:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2',
  `company_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `company_id`, `image`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Revinr', '1', NULL, NULL, 'admin@revinr.com', 1, NULL, '$2y$10$BKCOAJXWSpk/RJsXcOGjs.J0pwudU.fxQEoSQtRTb28Vcb0xxsmuW', NULL, '2019-04-27 04:49:07', '2019-04-28 05:47:53'),
(3, 'Emp', '3', 2, NULL, 'emp@gmail.com', 1, NULL, '$2y$10$.t6bUbqd/6gE8PKnH.tRieuxdH/j1GdZq2uYfyj7ctd27I8gadXEu', NULL, '2019-04-27 04:50:21', '2019-04-27 04:50:21'),
(5, 'Maruf', '3', 2, NULL, 'office_user@gmail.com', 1, NULL, '$2y$10$QHFJegtgJdOyQELvAbwE..iSDCdwqtKVRggZk84MB2c.BSSbAM31a', NULL, '2019-04-27 05:17:32', '2019-04-27 08:49:06'),
(23, 'Ahmed', '2', NULL, '2019_04_29_14_53_425.jpg', 'marufalbashir@gmail.com', 1, NULL, '$2y$10$CNXVWB7U6CnKWtBPMN9YReiMax5gP/S1gx9WAVh6mw64U1YOV2Oaq', NULL, '2019-04-29 05:41:19', '2019-05-23 13:14:16'),
(24, 'John', '3', NULL, NULL, 'dkfjdkj@gmail.com', 1, NULL, '$2y$10$BYZoz05TBYrqs8UKbAHkPuB.mO.pcKqpgnQVXNGqWhPJ4gDAdBFfq', NULL, '2019-05-07 18:30:34', '2019-05-07 18:30:34'),
(25, 'Saiful', 'Select User Role', NULL, NULL, 'SAIF.KAGOZI@GMAIL.COM', 1, NULL, '$2y$10$x8VdaEYTqLCdcc1tsF9HPu3Ve.bxjNYFrGKChAa3aTGEotd20CXfq', NULL, '2019-05-08 08:58:58', '2019-05-08 08:58:58'),
(26, NULL, '2', NULL, NULL, 'iambiva@hotmail.com', 1, NULL, '$2y$10$RtA7etHdQeeoYdYvSRJXTelTQrmZUQ52NIxUgSX9a3NpoqjGR3kHm', NULL, '2019-05-10 18:02:26', '2019-05-24 20:11:33'),
(27, NULL, '3', 3, NULL, 'sabuj@revinr.com', 1, NULL, '$2y$10$qxf2zKx3CBj96y6BXGPnXuUSBaZOYWFSWh0cLzeXnX4flCQOkD6WG', NULL, '2019-05-21 13:01:38', '2019-05-22 15:45:34'),
(28, 'Md', '1', NULL, NULL, 'sabuj2298@revinr.com', 1, NULL, '$2y$10$U4M4XFcMwRVnPpHdGRsuyepU.sBgPoT0.6gUylcpcr4dyxU18Z0K2', NULL, '2019-05-21 13:31:15', '2019-05-21 13:31:15'),
(29, NULL, '2', NULL, NULL, 'iambiva@yahoo.com', 1, NULL, '$2y$10$qtFfAT9ONdUXdX5N2LlAP.03krgE4WZ9LNtqa405BPgL1mg88G45G', NULL, '2019-05-21 14:48:17', '2019-05-24 19:57:47'),
(30, 'Razu', '1', NULL, NULL, 'razu@revinr.com', 1, NULL, '$2y$10$tf9LTaTaFUfxj54qwkRjBOBeTbsI1hthlBEOd3ISrHChU2lbEV1rG', NULL, '2019-05-22 08:52:46', '2019-05-22 08:52:46'),
(31, 'Jowel', '3', NULL, NULL, 'kanon@gmail.com', 1, NULL, '$2y$10$jsnmpH9r6MOVxPmgQirsMuHuft7FiTbNPdnyPsuV.b5UpuU.iS5B6', NULL, '2019-05-23 14:36:43', '2019-05-23 20:50:43'),
(32, 'JKJK', '1', NULL, '2019_05_26_08_13_4700.jpg', 'jkjk@gmail.com', 1, NULL, '$2y$10$AuK/j1gvbZJbqAF2JIDV6uE9D9mCcxEckHT.r69ntVtXxBCLCoOJi', NULL, '2019-05-24 20:18:07', '2019-05-26 13:13:52'),
(33, NULL, '2', NULL, NULL, 'guillaume.a.sydney@gmail.com', 1, NULL, '$2y$10$2MDwWe9ckerxXk0g/J4ZcO5wE67V5JPnWtfZKo8j3EBLlYxRTj7WS', NULL, '2019-05-25 09:04:47', '2019-05-25 09:28:22'),
(34, 'Nazmul', '1', NULL, '2019_05_26_06_47_1106.png', 'abir@yahoo.com', 1, NULL, '$2y$10$5nYmWOJUljD3MGqWSEJnUOB9Vq..xpsSJKitUJc71f7CpDbcJwNW6', NULL, '2019-05-26 10:54:19', '2019-05-26 11:47:19'),
(35, 'Al', '2', NULL, NULL, 'al@gmail.com', 1, NULL, '$2y$10$5JRkuUOt6PaL/0xU6ivB1.fybowZGSagkzxh5MC74ZM9kpSWt/qye', NULL, '2019-05-26 13:22:27', '2019-05-26 14:07:26'),
(36, NULL, '2', NULL, NULL, 'iam@hotmail.com', 1, NULL, '$2y$10$Nbm.wrr.DIfuj6/lRNR2e.6/Ot0a4OqhefVSlIXLYezm4y9PpaSOW', NULL, '2019-05-28 18:26:52', '2019-05-28 18:26:52'),
(37, NULL, '2', NULL, NULL, 'fkdjkfdj@gmillj.com', 1, NULL, '$2y$10$73DYxB5HvVH/dlw1/Un5UONKoZOrq5wollN1crFc9Yo9PWGrn4122', NULL, '2019-05-28 19:10:14', '2019-05-28 19:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=image,2=visa,3=resume,4=clearance,5=medical_certificate,6=d_license,7=passport,8=other',
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_documents`
--

INSERT INTO `user_documents` (`id`, `user_id`, `type`, `file`, `created_at`, `updated_at`) VALUES
(6, 23, '2', '2019_04_30_06_38_8356.jpg', '2019-04-30 00:38:01', '2019-04-30 00:38:01'),
(12, 23, '6', '2019_04_30_06_39_3897.jpg', '2019-04-30 00:39:33', '2019-04-30 00:39:33'),
(13, 7, '1', '2019_05_01_14_30_3484.jpg', '2019-05-01 08:30:49', '2019-05-01 08:30:49'),
(14, 7, '2', '2019_05_01_14_30_383.png', '2019-05-01 08:30:49', '2019-05-01 08:30:49'),
(15, 7, '3', '2019_05_01_14_30_9544.png', '2019-05-01 08:30:49', '2019-05-01 08:30:49'),
(16, 7, '4', '2019_05_01_14_30_6626.png', '2019-05-01 08:30:49', '2019-05-01 08:30:49'),
(17, 7, '5', '2019_05_01_14_30_1866.jpg', '2019-05-01 08:30:49', '2019-05-01 08:30:49'),
(18, 7, '6', '2019_05_01_14_30_2201.PNG', '2019-05-01 08:30:49', '2019-05-01 08:30:49'),
(19, 26, '1', '2019_05_23_15_45_5046.png', '2019-05-23 20:45:42', '2019-05-23 20:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `mid_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `police_check_date` date DEFAULT NULL,
  `medical_check_date` date DEFAULT NULL,
  `calling_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `town_city` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `eligible_to_work` tinyint(1) DEFAULT NULL,
  `travel_to_work` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visa_exp` date DEFAULT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_per_week` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socials` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_infos`
--

INSERT INTO `user_infos` (`id`, `user_id`, `mid_name`, `last_name`, `phone`, `police_check_date`, `medical_check_date`, `calling_code`, `address`, `gender`, `town_city`, `postcode`, `country_id`, `eligible_to_work`, `travel_to_work`, `license`, `visa`, `visa_exp`, `purpose`, `language`, `work_per_week`, `socials`, `created_at`, `updated_at`, `first_name`) VALUES
(1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-31', NULL, NULL, NULL, NULL, '2019-04-28 01:49:00', '2019-04-28 01:49:00', NULL),
(15, 23, 'wqr', 'Last Name', '497309106', '2019-12-08', '2019-12-08', '20', '44 Railway Parade, Lakemba, NSW 2195', 1, 'Lakemba', '2195', 36, 1, 'Scooter/bike', NULL, '1', '2019-09-16', '1', NULL, NULL, NULL, '2019-04-29 07:53:26', '2019-05-23 13:16:19', 'ahammed2'),
(17, 3, NULL, NULL, '01773587897', '2019-05-21', NULL, NULL, 'Dhaka Bangladesh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-02 01:32:17', '2019-05-02 01:36:31', NULL),
(18, 26, 'Islam', NULL, '0444444444', '2019-05-20', '2019-05-21', '36', '8/14 Colin St', 1, 'lakemba', '2195', 36, NULL, 'Scooter/bike', NULL, '2', '2019-05-11', '1', NULL, NULL, NULL, '2019-05-10 18:19:22', '2019-05-23 20:46:17', 'Saiful'),
(19, 28, 'maksudurur', 'Rahman', '01716224020', NULL, NULL, NULL, 'House 37, Road 03, Sector 09, Uttara, Dhaka-1230', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-21 13:31:15', '2019-05-21 13:31:15', 'Md'),
(20, 29, 'Islam', NULL, '0499999999', NULL, NULL, '36', '39/2 West Terrace', 1, 'Bankstown', '2200', 36, NULL, '1', NULL, '1', NULL, '1', NULL, NULL, NULL, '2019-05-21 14:49:52', '2019-05-23 14:33:30', 'Saiful'),
(21, 30, NULL, NULL, '09999', '1970-01-01', '1970-01-01', '44', 'House 37, Road 03, Sector 09, Uttara, Dhaka-1230', 0, NULL, NULL, 0, NULL, 'Scooter/bike', NULL, '1', '1970-01-01', '1', NULL, '20', NULL, '2019-05-22 08:52:46', '2019-05-23 20:42:00', 'Razu'),
(22, 31, 'Rana', 'Kanon', '0174556677', '1970-01-01', '1970-01-01', '48', 'House 3, Road 05, Sector 06, Uttara, Dhaka-1230', 0, NULL, NULL, 0, NULL, 'Scooter/bike', NULL, '1', '1970-01-01', '1', NULL, '20', NULL, '2019-05-23 14:36:43', '2019-05-23 20:50:43', 'Jowel'),
(23, 32, NULL, 'KJKJ', '0999111999', '1970-01-01', '1970-01-01', '36', NULL, 0, NULL, NULL, 0, NULL, 'Scooter/bike', NULL, '1', '1970-01-01', '1', NULL, '20', NULL, '2019-05-24 20:18:07', '2019-05-24 20:21:39', 'JKJK'),
(24, 33, 'MAX-F', 'French', '0434914018', NULL, NULL, '36', '1 qwe st', 1, NULL, '2200', 36, NULL, '1', NULL, '2', NULL, '1', NULL, NULL, NULL, '2019-05-25 09:08:18', '2019-05-25 09:14:34', 'MAX'),
(25, 34, 'Hasan', 'Abir', '01717224020', '1970-01-01', '1970-01-01', '50', 'House 05, Road 09, Mohakhali DOHS, Dhaka', 1, 'Dhaka', '1212', 50, NULL, 'Scooter/bike', NULL, '1', '1970-01-01', '1', NULL, '20', NULL, '2019-05-26 10:54:19', '2019-05-26 12:22:34', 'Nazmul'),
(26, 35, 'Amin', NULL, '9999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-26 13:22:27', '2019-05-26 13:22:27', 'Al'),
(27, 36, 'John', 'Smith', '0987654321', NULL, NULL, '36', '5/76 Colin St', 1, 'Lakemba', '2195', 36, NULL, '1', NULL, '3', NULL, '3', NULL, NULL, NULL, '2019-05-28 18:28:53', '2019-05-28 18:44:12', 'John');

-- --------------------------------------------------------

--
-- Table structure for table `user_quiz_results`
--

CREATE TABLE `user_quiz_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `marks` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_quiz_results`
--

INSERT INTO `user_quiz_results` (`id`, `user_id`, `category_id`, `marks`, `status`, `created_at`, `updated_at`) VALUES
(1, 23, 1, '40', 0, '2019-05-01 05:38:13', '2019-05-01 07:08:44'),
(4, 7, 2, '100', 1, '2019-05-01 06:10:52', '2019-05-01 06:16:39'),
(6, 23, 2, '33.33333333333333', 0, '2019-05-01 07:04:43', '2019-05-01 07:09:24'),
(7, 7, 1, '120', 1, '2019-05-01 08:34:43', '2019-05-02 22:25:24'),
(8, 26, 1, '20', 0, '2019-05-10 18:25:12', '2019-05-10 18:25:12'),
(9, 29, 5, '200', 1, '2019-05-24 19:41:21', '2019-05-24 19:41:21'),
(10, 29, 2, '100', 1, '2019-05-24 19:42:17', '2019-05-24 19:43:29'),
(11, 29, 1, '33.33333333333333', 0, '2019-05-24 19:44:05', '2019-05-24 19:44:05'),
(12, 33, 1, '33.33333333333333', 0, '2019-05-25 09:21:57', '2019-05-25 09:22:56'),
(13, 35, 1, '12.5', 0, '2019-05-26 13:24:00', '2019-05-26 13:24:00'),
(14, 35, 3, '0', 0, '2019-05-26 14:56:48', '2019-05-26 14:56:48'),
(15, 36, 1, '12.5', 0, '2019-05-28 18:51:07', '2019-05-28 18:51:07'),
(16, 36, 5, '100', 1, '2019-05-28 18:53:40', '2019-05-28 18:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_work`
--

CREATE TABLE `user_work` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_work`
--

INSERT INTO `user_work` (`id`, `user_id`, `work_id`, `created_at`, `updated_at`) VALUES
(39, 30, 8, '2019-05-22 09:51:24', '2019-05-22 09:51:24'),
(45, 31, 5, '2019-05-23 14:47:18', '2019-05-23 14:47:18'),
(46, 26, 5, '2019-05-23 20:49:50', '2019-05-23 20:49:50'),
(47, 26, 8, '2019-05-23 20:49:50', '2019-05-23 20:49:50'),
(48, 26, 9, '2019-05-23 20:49:50', '2019-05-23 20:49:50'),
(53, 29, 5, '2019-05-24 19:40:01', '2019-05-24 19:40:01'),
(54, 29, 8, '2019-05-24 19:40:02', '2019-05-24 19:40:02'),
(55, 29, 9, '2019-05-24 19:40:02', '2019-05-24 19:40:02'),
(56, 29, 11, '2019-05-24 19:40:02', '2019-05-24 19:40:02'),
(67, 33, 5, '2019-05-25 09:18:35', '2019-05-25 09:18:35'),
(68, 33, 8, '2019-05-25 09:18:35', '2019-05-25 09:18:35'),
(69, 33, 10, '2019-05-25 09:18:35', '2019-05-25 09:18:35'),
(70, 33, 9, '2019-05-25 09:18:35', '2019-05-25 09:18:35'),
(71, 33, 11, '2019-05-25 09:18:35', '2019-05-25 09:18:35'),
(72, 35, 5, '2019-05-26 13:59:11', '2019-05-26 13:59:11'),
(73, 35, 8, '2019-05-26 13:59:11', '2019-05-26 13:59:11'),
(74, 35, 10, '2019-05-26 13:59:11', '2019-05-26 13:59:11'),
(75, 35, 11, '2019-05-26 13:59:11', '2019-05-26 13:59:11'),
(76, 23, 5, '2019-05-28 10:23:35', '2019-05-28 10:23:35'),
(77, 23, 10, '2019-05-28 10:23:35', '2019-05-28 10:23:35'),
(78, 23, 9, '2019-05-28 10:23:35', '2019-05-28 10:23:35'),
(79, 23, 11, '2019-05-28 10:23:35', '2019-05-28 10:23:35'),
(85, 36, 5, '2019-05-28 18:44:17', '2019-05-28 18:44:17'),
(86, 36, 8, '2019-05-28 18:44:17', '2019-05-28 18:44:17'),
(87, 36, 10, '2019-05-28 18:44:17', '2019-05-28 18:44:17'),
(88, 36, 9, '2019-05-28 18:44:17', '2019-05-28 18:44:17'),
(89, 36, 11, '2019-05-28 18:44:17', '2019-05-28 18:44:17');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `title`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Footer Widget 1', '<h4>WHY CHOOSE US </h4>\r\n<p>We have built our business on our core values of honesty, integrity and reliability, providing premium, tailored workforce solutions to a range of small and large businesses as well as Individual needs.</p>', 1, '2019-04-22 12:00:00', '2019-05-28 02:47:11'),
(2, 'Footer Widget 2', '<h4>LABOUR HIRE FOR</h4>\r\n<p>» Catering companies<br>» Food factories<br>» Cleaning services<br>» Security services<br>» Construction industries<br>» Events services<br>» Personal Care services<br>» NDIS Carer services</p>', 1, '2019-04-22 12:00:00', '2019-05-28 02:56:31'),
(3, 'Footer Widget 3', '<h4><b>CONTACT DETAILS</b></h4><p>Suite 27, 1-5 Jacobs Street,\r\nBankstown NSW 2200, Australia</p>', 1, '2019-04-22 12:00:00', '2019-05-28 02:56:09'),
(4, 'Footer Widget 4', '<p><br></p>', 1, '2019-04-22 12:00:00', '2019-05-28 03:52:14'),
(5, 'Header Top 1', '<i class=\"fa fa-phone\"></i> 02 8773 2132', 1, '2019-04-22 12:00:00', '2019-04-28 23:25:30'),
(6, 'Header Top 2', '<i class=\"fa fa-map-marker\"></i> Suite 27, 1-5 Jacobs Street, Bankstown NSW 2200.', 1, '2019-04-22 12:00:00', '2019-04-28 23:26:12'),
(7, 'Header Top 3', '<i class=\"fa fa-envelope-o\"></i> info@workforce.com.au', 1, '2019-04-22 12:00:00', '2019-04-28 23:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `working_categories`
--

CREATE TABLE `working_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `working_categories`
--

INSERT INTO `working_categories` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(2, 'CLEANING', 'cleaning', 1, '2019-04-30 04:35:50', '2019-05-02 04:32:21'),
(3, 'FOOD', NULL, 1, '2019-04-30 04:46:00', '2019-04-30 04:46:00'),
(4, 'Gardening', NULL, 1, '2019-05-22 10:53:54', '2019-05-22 10:53:54'),
(5, 'Home Services', NULL, 1, '2019-05-23 13:00:22', '2019-05-23 13:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `category_id`, `title`, `slug`, `desc`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '2', 'Commercial cleaning services', 'b', '- CASUAL POSITION, HOURLY RATE, - SERIOUS & HARD WORKER - FAST PACED ENVIRONMENT  - GOOD ENGLISH SKILLS - MONDAY TO FRIDAY - ABOVE AWARDS RATES  LARGE AND WELL ESTABLISHED FOOD MANFACTURING S LOOKING FOR PRODUCTION LINE OPERATOR AND PACKING TEAM.  Please CONTACT us (Subject: FOOD MANUFACTURER PRODUCTION OPERATOR) & feel up the APPLICATION form above', 1, '2019-04-30 03:14:30', '2019-05-22 10:52:43', NULL),
(8, '2', 'House and strata cleaning', 'c', '- CASUAL POSITION, HOURLY RATE,\r\n- 4 TO 5 DAYS PER WEEK\r\n- MONDAY TO FRIDAY (35h+ per week)\r\n- GOOD ENGLISH SKILLS \r\n- PASTRY, DOUGH SHEETER PROCESS \r\n\r\nWe are looking for serious and experienced BAKER, PASTRY COOK for a large wholesale bakery factory \r\n \r\nPlease CONTACT us (Subject: BAKER & PASTRY POSITIONS) & feel up the APPLICATION form above   ', 1, '2019-04-30 04:17:23', '2019-04-30 04:46:35', NULL),
(9, '3', 'Food factory process operator', 'd', '- CASUAL POSITION, HOURLY RATE,\r\n- 4 TO 5 DAYS PER WEEK\r\n- MONDAY TO FRIDAY (35h+ per week)\r\n- GOOD ENGLISH SKILLS \r\n- PASTRY, DOUGH SHEETER PROCESS \r\n\r\nWe are looking for serious and experienced BAKER, PASTRY COOK for a large wholesale bakery factory \r\n \r\nPlease CONTACT us (Subject: BAKER & PASTRY POSITIONS) & feel up the APPLICATION form above   ', 1, '2019-04-30 04:47:24', '2019-04-30 04:47:24', NULL),
(10, '2', 'Gardening Services', 'gardening', 'How big your business is going to be depends on you, your free time, the scale of services you would offer and of course the money you can afford to invest. These are the basics on how to set up a gardening business.', 1, '2019-05-22 10:53:29', '2019-05-22 10:56:05', NULL),
(11, '5', 'Gardening', 'gardening', 'How big your business is going to be depends on you, your free time, the scale of services you would offer and of course the money you can afford to invest. These are the basics on how to set up a gardening business.', 1, '2019-05-23 13:01:32', '2019-05-23 13:01:32', NULL),
(12, '2', 'Commercial cleaning services', 'b', '- CASUAL POSITION, HOURLY RATE, - SERIOUS & HARD WORKER - FAST PACED ENVIRONMENT  - GOOD ENGLISH SKILLS - MONDAY TO FRIDAY - ABOVE AWARDS RATES  LARGE AND WELL ESTABLISHED FOOD MANFACTURING S LOOKING FOR PRODUCTION LINE OPERATOR AND PACKING TEAM.  Please CONTACT us (Subject: FOOD MANUFACTURER PRODUCTION OPERATOR) & feel up the APPLICATION form above', 1, '2019-04-30 03:14:30', '2019-05-22 10:52:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_abilities`
--

CREATE TABLE `work_abilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `sun_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sun_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mon_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mon_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tue_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tue_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wed_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wed_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thu_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thu_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fri_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fri_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_start` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sat_end` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_abilities`
--

INSERT INTO `work_abilities` (`id`, `user_id`, `sun_start`, `sun_end`, `mon_start`, `mon_end`, `tue_start`, `tue_end`, `wed_start`, `wed_end`, `thu_start`, `thu_end`, `fri_start`, `fri_end`, `sat_start`, `sat_end`, `created_at`, `updated_at`) VALUES
(2, 23, '02:00', '16:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2019-04-30 01:38:10', '2019-05-23 13:16:20'),
(3, 7, '08:00', '17:00', '12:00', '17:00', '10:00', '17:00', '10:00', '17:00', '10:00', '17:00', '10:00', '17:00', '10:00', '17:00', '2019-05-01 08:29:51', '2019-05-01 08:29:51'),
(4, 30, '13:00', '20:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2019-05-22 09:27:38', '2019-05-22 09:52:30'),
(5, 29, '08:00', '18:00', '0', '0', '02:00', '17:00', '10:00', '17:00', '0', '0', '0', '0', '0', '0', '2019-05-23 14:33:30', '2019-05-24 19:39:56'),
(6, 31, '0', '0', '0', '0', '0', '0', '03:00', '15:00', '0', '0', '0', '0', '0', '0', '2019-05-23 14:39:57', '2019-05-23 14:40:07'),
(7, 26, '14:00', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '2019-05-23 20:46:17', '2019-05-23 20:46:17'),
(8, 33, '0', '0', '03:00', '18:00', '0', '0', '09:00', '20:00', '0', '0', '0', '0', '0', '0', '2019-05-25 09:14:34', '2019-05-25 09:18:20'),
(9, 35, '0', '0', '0', '0', '0', '0', '08:00', '17:00', '0', '0', '0', '0', '0', '0', '2019-05-26 13:58:57', '2019-05-26 14:01:25'),
(10, 36, '0', '0', '0', '0', '0', '0', '02:00', '18:00', '0', '0', '0', '0', '0', '0', '2019-05-28 18:33:34', '2019-05-28 18:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `work_histories`
--

CREATE TABLE `work_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_histories`
--

INSERT INTO `work_histories` (`id`, `user_id`, `start`, `end`, `position`, `company`, `created_at`, `updated_at`) VALUES
(1, 4, '2019-04-01', '2019-04-27', 'Senior Programmer', 'revinr', '2019-04-27 05:10:22', '2019-04-27 05:10:22'),
(2, 7, '2019-04-01', '2019-04-27', 'Senior Programmer', 'revinr', '2019-04-27 05:10:22', '2019-04-27 05:10:22'),
(3, 23, '2019-04-01', '2019-04-10', 'j', 'j', '2019-04-30 00:11:18', '2019-04-30 00:11:18'),
(4, 23, '2019-04-10', '2019-04-17', 'Junior Developer', 'Ekattor Store', '2019-04-30 00:20:29', '2019-04-30 00:20:29'),
(5, 30, '2019-05-20', '2019-05-22', 'hu', 'Bay of Bengal', '2019-05-22 09:17:51', '2019-05-22 09:17:51'),
(6, 23, '2019-05-23', '2019-05-31', NULL, NULL, '2019-05-23 14:18:18', '2019-05-23 14:18:18'),
(7, 23, '2019-05-22', '2019-05-31', NULL, NULL, '2019-05-23 14:27:22', '2019-05-23 14:27:22'),
(8, 29, '2019-05-23', '2019-05-30', 'hu', 'Bay of Bengal', '2019-05-23 14:33:13', '2019-05-23 14:33:13'),
(9, 33, '2018-05-03', '2019-05-17', 'avb', 'lllpo', '2019-05-25 09:15:41', '2019-05-25 09:15:41'),
(10, 36, '2007-05-16', '2019-05-16', 'Chef', 'Abc Company', '2019-05-28 18:30:52', '2019-05-28 18:30:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigned_candidates`
--
ALTER TABLE `assigned_candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_id_index` (`id`);

--
-- Indexes for table `employer_infos`
--
ALTER TABLE `employer_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`(191));

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `self_funds`
--
ALTER TABLE `self_funds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_quiz_results`
--
ALTER TABLE `user_quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_work`
--
ALTER TABLE `user_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `working_categories`
--
ALTER TABLE `working_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_abilities`
--
ALTER TABLE `work_abilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_histories`
--
ALTER TABLE `work_histories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assigned_candidates`
--
ALTER TABLE `assigned_candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=895;

--
-- AUTO_INCREMENT for table `employer_infos`
--
ALTER TABLE `employer_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `self_funds`
--
ALTER TABLE `self_funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_quiz_results`
--
ALTER TABLE `user_quiz_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_work`
--
ALTER TABLE `user_work`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `working_categories`
--
ALTER TABLE `working_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `work_abilities`
--
ALTER TABLE `work_abilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `work_histories`
--
ALTER TABLE `work_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
