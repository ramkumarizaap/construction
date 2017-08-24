-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2017 at 05:43 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `construction`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `created_date`) VALUES
(1, 'Admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', '2017-08-14 11:31:06');

-- --------------------------------------------------------

--
-- Table structure for table `client_contacts`
--

CREATE TABLE `client_contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(245) NOT NULL,
  `last_name` varchar(245) NOT NULL,
  `email` varchar(245) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(245) NOT NULL,
  `state` varchar(245) NOT NULL,
  `country` varchar(245) NOT NULL,
  `zip` varchar(45) NOT NULL,
  `created_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_contacts`
--

INSERT INTO `client_contacts` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `city`, `state`, `country`, `zip`, `created_id`, `created_date`, `updated_date`) VALUES
(1, 'Gavaskar', 'Ram', 'gavaskarizaap@gmail.com', 1232123212, 'chennai, valasaravakkam', 'chennai', 'AZ', 'AL', '600040', 1, '2017-08-22 10:35:54', '2017-08-22 14:05:54'),
(2, 'Gavaskar2', 'Ram2', 'gavaskarizaap@gmail.com', 1232123212, 'chennai', 'chennai', 'CA', 'AS', '60004', 1, '2017-08-22 10:35:55', '2017-08-22 14:05:55'),
(3, 'Gavaskar', 'Ram', 'gavaskarizaap@gmail.com', 1232123212, 'chennai, valasaravakkam', 'chennai', 'AZ', 'AL', '600040', 1, '2017-08-22 10:36:32', '2017-08-22 14:06:32'),
(4, 'Gavaskar2', 'Ram2', 'gavaskarizaap@gmail.com', 1232123212, '', 'chennai', 'CA', 'AS', '60004', 3, '2017-08-22 10:36:32', '2017-08-22 14:06:32'),
(5, 'Gavaskar', 'Ram', 'gavaskarizaap@gmail.com', 1232123212, 'chennai, valasaravakkam', 'chennai', 'AZ', 'AL', '600040', 1, '2017-08-22 10:37:18', '2017-08-22 14:07:18'),
(6, 'Gavaskar2', 'Ram2', 'gavaskarizaap@gmail.com', 1232123212, '', 'chennai', 'CA', 'AS', '60004', 5, '2017-08-22 10:37:18', '2017-08-22 14:07:18'),
(7, 'sdfasdf', 'asdfasdf', 'adsfsadf@gmail.com', 1232123212, 'sdfasdf', 'sadfasdf', 'AL', 'AF', '123212', 1, '2017-08-22 10:56:47', '2017-08-22 14:26:47'),
(8, '', '', 'adsfsadf@gmail.com', 0, '', '', 'AL', 'AF', '', 7, '2017-08-22 10:56:47', '2017-08-22 14:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `id` int(11) NOT NULL,
  `first_name` varchar(155) NOT NULL,
  `last_name` varchar(155) NOT NULL,
  `username` varchar(155) NOT NULL,
  `password` varchar(200) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `active` enum('Y','N') NOT NULL,
  `office_phone` varchar(15) NOT NULL,
  `cell_phone` varchar(15) NOT NULL,
  `email1` varchar(155) NOT NULL,
  `email2` varchar(155) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(10) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`id`, `first_name`, `last_name`, `username`, `password`, `company_name`, `active`, `office_phone`, `cell_phone`, `email1`, `email2`, `address1`, `address2`, `city`, `state`, `zip`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(5, 'Test', 'Izaap', 'Izaap', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Technologies', 'Y', '1234567890', '9876543210', 'test.izaap@gmail.com', 'test.izaap@gmail.com', 'Valasravakkam', '', 'Chennai', 'Tamilnadu', 600087, 1, 0, '2017-08-16 15:32:24', '2017-08-16 13:32:24'),
(6, 'Tester', 'Tech', 'Izaap2', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Tech', 'Y', '6543210789', '3214569870', 'tester.izaap@gmail.com', '', 'Valasravakkam', '', 'Chennai', 'Tamilnadu', 600087, 1, 0, '2017-08-16 15:33:27', '2017-08-16 13:33:27'),
(7, 'Developer', 'Dev', 'Izaap', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap', 'Y', '1234657980', '9876543210', 'developer000@gmail.com', 'test@gmail.comn', '2nd Main Road', '', 'Scottsdale', 'AZ', 800051, 1, 0, '2017-08-18 09:13:27', '2017-08-18 07:13:27'),
(8, 'Devops', 'D', 'devops19884', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Tech Pvt Ltd', 'Y', '4454156465', '4454156465', 'developer888@gmail.com', 'test@gmail.comn', '2nd Main Road', '', 'Scottsdale', 'AZ', 800051, 1, 0, '2017-08-18 09:14:13', '2017-08-18 07:14:13'),
(9, 'Tester', 'Testing', 'tester1877', '5f4dcc3b5aa765d61d8327deb882cf99', 'Izaap Pvt Ltd.', 'Y', '4454156465', '4454156465', 'tester000@gmail.com', 'test@gmail.comn', '2nd Main Road', '', 'Scottsdale', 'AZ', 800051, 1, 0, '2017-08-18 09:14:55', '2017-08-18 07:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `contractor_inspection`
--

CREATE TABLE `contractor_inspection` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `contractor_id` int(11) NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `end_client` varchar(200) NOT NULL,
  `observations` longtext NOT NULL,
  `complated_item` int(11) NOT NULL,
  `room_no` int(11) NOT NULL,
  `status` enum('PENDING','PROCESSING','COMPLETED') NOT NULL,
  `signature` varchar(200) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afganistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegowina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo, the Democratic Republic of the'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote d\'Ivoire'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'FK', 'Falkland Islands (Malvinas)'),
(71, 'FO', 'Faroe Islands'),
(72, 'FJ', 'Fiji'),
(73, 'FI', 'Finland'),
(74, 'FR', 'France'),
(75, 'FX', 'France, Metropolitan'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'VA', 'Holy See (Vatican City State)'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'JO', 'Jordan'),
(111, 'KZ', 'Kazakhstan'),
(112, 'KE', 'Kenya'),
(113, 'KI', 'Kiribati'),
(114, 'KP', 'Korea, Democratic People\'s Republic of'),
(115, 'KR', 'Korea, Republic of'),
(116, 'KW', 'Kuwait'),
(117, 'KG', 'Kyrgyzstan'),
(118, 'LA', 'Lao People\'s Democratic Republic'),
(119, 'LV', 'Latvia'),
(120, 'LB', 'Lebanon'),
(121, 'LS', 'Lesotho'),
(122, 'LR', 'Liberia'),
(123, 'LY', 'Libyan Arab Jamahiriya'),
(124, 'LI', 'Liechtenstein'),
(125, 'LT', 'Lithuania'),
(126, 'LU', 'Luxembourg'),
(127, 'MO', 'Macau'),
(128, 'MK', 'Macedonia, The Former Yugoslav Republic of'),
(129, 'MG', 'Madagascar'),
(130, 'MW', 'Malawi'),
(131, 'MY', 'Malaysia'),
(132, 'MV', 'Maldives'),
(133, 'ML', 'Mali'),
(134, 'MT', 'Malta'),
(135, 'MH', 'Marshall Islands'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritania'),
(138, 'MU', 'Mauritius'),
(139, 'YT', 'Mayotte'),
(140, 'MX', 'Mexico'),
(141, 'FM', 'Micronesia, Federated States of'),
(142, 'MD', 'Moldova, Republic of'),
(143, 'MC', 'Monaco'),
(144, 'MN', 'Mongolia'),
(145, 'MS', 'Montserrat'),
(146, 'MA', 'Morocco'),
(147, 'MZ', 'Mozambique'),
(148, 'MM', 'Myanmar'),
(149, 'NA', 'Namibia'),
(150, 'NR', 'Nauru'),
(151, 'NP', 'Nepal'),
(152, 'NL', 'Netherlands'),
(153, 'AN', 'Netherlands Antilles'),
(154, 'NC', 'New Caledonia'),
(155, 'NZ', 'New Zealand'),
(156, 'NI', 'Nicaragua'),
(157, 'NE', 'Niger'),
(158, 'NG', 'Nigeria'),
(159, 'NU', 'Niue'),
(160, 'NF', 'Norfolk Island'),
(161, 'MP', 'Northern Mariana Islands'),
(162, 'NO', 'Norway'),
(163, 'OM', 'Oman'),
(164, 'PK', 'Pakistan'),
(165, 'PW', 'Palau'),
(166, 'PA', 'Panama'),
(167, 'PG', 'Papua New Guinea'),
(168, 'PY', 'Paraguay'),
(169, 'PE', 'Peru'),
(170, 'PH', 'Philippines'),
(171, 'PN', 'Pitcairn'),
(172, 'PL', 'Poland'),
(173, 'PT', 'Portugal'),
(174, 'PR', 'Puerto Rico'),
(175, 'QA', 'Qatar'),
(176, 'RE', 'Reunion'),
(177, 'RO', 'Romania'),
(178, 'RU', 'Russian Federation'),
(179, 'RW', 'Rwanda'),
(180, 'KN', 'Saint Kitts and Nevis'),
(181, 'LC', 'Saint LUCIA'),
(182, 'VC', 'Saint Vincent and the Grenadines'),
(183, 'WS', 'Samoa'),
(184, 'SM', 'San Marino'),
(185, 'ST', 'Sao Tome and Principe'),
(186, 'SA', 'Saudi Arabia'),
(187, 'SN', 'Senegal'),
(188, 'SC', 'Seychelles'),
(189, 'SL', 'Sierra Leone'),
(190, 'SG', 'Singapore'),
(191, 'SK', 'Slovakia (Slovak Republic)'),
(192, 'SI', 'Slovenia'),
(193, 'SB', 'Solomon Islands'),
(194, 'SO', 'Somalia'),
(195, 'ZA', 'South Africa'),
(196, 'GS', 'South Georgia and the South Sandwich Islands'),
(197, 'ES', 'Spain'),
(198, 'LK', 'Sri Lanka'),
(199, 'SH', 'St. Helena'),
(200, 'PM', 'St. Pierre and Miquelon'),
(201, 'SD', 'Sudan'),
(202, 'SR', 'Suriname'),
(203, 'SJ', 'Svalbard and Jan Mayen Islands'),
(204, 'SZ', 'Swaziland'),
(205, 'SE', 'Sweden'),
(206, 'CH', 'Switzerland'),
(207, 'SY', 'Syrian Arab Republic'),
(208, 'TW', 'Taiwan'),
(209, 'TJ', 'Tajikistan'),
(210, 'TZ', 'Tanzania, United Republic of'),
(211, 'TH', 'Thailand'),
(212, 'TG', 'Togo'),
(213, 'TK', 'Tokelau'),
(214, 'TO', 'Tonga'),
(215, 'TT', 'Trinidad and Tobago'),
(216, 'TN', 'Tunisia'),
(217, 'TR', 'Turkey'),
(218, 'TM', 'Turkmenistan'),
(219, 'TC', 'Turks and Caicos Islands'),
(220, 'TV', 'Tuvalu'),
(221, 'UG', 'Uganda'),
(222, 'UA', 'Ukraine'),
(223, 'AE', 'United Arab Emirates'),
(224, 'GB', 'United Kingdom'),
(225, 'US', 'United States'),
(226, 'UM', 'United States Minor Outlying Islands'),
(227, 'UY', 'Uruguay'),
(228, 'UZ', 'Uzbekistan'),
(229, 'VU', 'Vanuatu'),
(230, 'VE', 'Venezuela'),
(231, 'VN', 'Viet Nam'),
(232, 'VG', 'Virgin Islands (British)'),
(233, 'VI', 'Virgin Islands (U.S.)'),
(234, 'WF', 'Wallis and Futuna Islands'),
(235, 'EH', 'Western Sahara'),
(236, 'YE', 'Yemen'),
(237, 'YU', 'Yugoslavia'),
(238, 'ZM', 'Zambia'),
(239, 'ZW', 'Zimbabwe'),
(1, 'AF', 'Afganistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'AS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegowina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CD', 'Congo, the Democratic Republic of the'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'CI', 'Cote d\'Ivoire'),
(54, 'HR', 'Croatia (Hrvatska)'),
(55, 'CU', 'Cuba'),
(56, 'CY', 'Cyprus'),
(57, 'CZ', 'Czech Republic'),
(58, 'DK', 'Denmark'),
(59, 'DJ', 'Djibouti'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'TP', 'East Timor'),
(63, 'EC', 'Ecuador'),
(64, 'EG', 'Egypt'),
(65, 'SV', 'El Salvador'),
(66, 'GQ', 'Equatorial Guinea'),
(67, 'ER', 'Eritrea'),
(68, 'EE', 'Estonia'),
(69, 'ET', 'Ethiopia'),
(70, 'FK', 'Falkland Islands (Malvinas)'),
(71, 'FO', 'Faroe Islands'),
(72, 'FJ', 'Fiji'),
(73, 'FI', 'Finland'),
(74, 'FR', 'France'),
(75, 'FX', 'France, Metropolitan'),
(76, 'GF', 'French Guiana'),
(77, 'PF', 'French Polynesia'),
(78, 'TF', 'French Southern Territories'),
(79, 'GA', 'Gabon'),
(80, 'GM', 'Gambia'),
(81, 'GE', 'Georgia'),
(82, 'DE', 'Germany'),
(83, 'GH', 'Ghana'),
(84, 'GI', 'Gibraltar'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'VA', 'Holy See (Vatican City State)'),
(97, 'HN', 'Honduras'),
(98, 'HK', 'Hong Kong'),
(99, 'HU', 'Hungary'),
(100, 'IS', 'Iceland'),
(101, 'IN', 'India'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'JM', 'Jamaica'),
(109, 'JP', 'Japan'),
(110, 'JO', 'Jordan'),
(111, 'KZ', 'Kazakhstan'),
(112, 'KE', 'Kenya'),
(113, 'KI', 'Kiribati'),
(114, 'KP', 'Korea, Democratic People\'s Republic of'),
(115, 'KR', 'Korea, Republic of'),
(116, 'KW', 'Kuwait'),
(117, 'KG', 'Kyrgyzstan'),
(118, 'LA', 'Lao People\'s Democratic Republic'),
(119, 'LV', 'Latvia'),
(120, 'LB', 'Lebanon'),
(121, 'LS', 'Lesotho'),
(122, 'LR', 'Liberia'),
(123, 'LY', 'Libyan Arab Jamahiriya'),
(124, 'LI', 'Liechtenstein'),
(125, 'LT', 'Lithuania'),
(126, 'LU', 'Luxembourg'),
(127, 'MO', 'Macau'),
(128, 'MK', 'Macedonia, The Former Yugoslav Republic of'),
(129, 'MG', 'Madagascar'),
(130, 'MW', 'Malawi'),
(131, 'MY', 'Malaysia'),
(132, 'MV', 'Maldives'),
(133, 'ML', 'Mali'),
(134, 'MT', 'Malta'),
(135, 'MH', 'Marshall Islands'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritania'),
(138, 'MU', 'Mauritius'),
(139, 'YT', 'Mayotte'),
(140, 'MX', 'Mexico'),
(141, 'FM', 'Micronesia, Federated States of'),
(142, 'MD', 'Moldova, Republic of'),
(143, 'MC', 'Monaco'),
(144, 'MN', 'Mongolia'),
(145, 'MS', 'Montserrat'),
(146, 'MA', 'Morocco'),
(147, 'MZ', 'Mozambique'),
(148, 'MM', 'Myanmar'),
(149, 'NA', 'Namibia'),
(150, 'NR', 'Nauru'),
(151, 'NP', 'Nepal'),
(152, 'NL', 'Netherlands'),
(153, 'AN', 'Netherlands Antilles'),
(154, 'NC', 'New Caledonia'),
(155, 'NZ', 'New Zealand'),
(156, 'NI', 'Nicaragua'),
(157, 'NE', 'Niger'),
(158, 'NG', 'Nigeria'),
(159, 'NU', 'Niue'),
(160, 'NF', 'Norfolk Island'),
(161, 'MP', 'Northern Mariana Islands'),
(162, 'NO', 'Norway'),
(163, 'OM', 'Oman'),
(164, 'PK', 'Pakistan'),
(165, 'PW', 'Palau'),
(166, 'PA', 'Panama'),
(167, 'PG', 'Papua New Guinea'),
(168, 'PY', 'Paraguay'),
(169, 'PE', 'Peru'),
(170, 'PH', 'Philippines'),
(171, 'PN', 'Pitcairn'),
(172, 'PL', 'Poland'),
(173, 'PT', 'Portugal'),
(174, 'PR', 'Puerto Rico'),
(175, 'QA', 'Qatar'),
(176, 'RE', 'Reunion'),
(177, 'RO', 'Romania'),
(178, 'RU', 'Russian Federation'),
(179, 'RW', 'Rwanda'),
(180, 'KN', 'Saint Kitts and Nevis'),
(181, 'LC', 'Saint LUCIA'),
(182, 'VC', 'Saint Vincent and the Grenadines'),
(183, 'WS', 'Samoa'),
(184, 'SM', 'San Marino'),
(185, 'ST', 'Sao Tome and Principe'),
(186, 'SA', 'Saudi Arabia'),
(187, 'SN', 'Senegal'),
(188, 'SC', 'Seychelles'),
(189, 'SL', 'Sierra Leone'),
(190, 'SG', 'Singapore'),
(191, 'SK', 'Slovakia (Slovak Republic)'),
(192, 'SI', 'Slovenia'),
(193, 'SB', 'Solomon Islands'),
(194, 'SO', 'Somalia'),
(195, 'ZA', 'South Africa'),
(196, 'GS', 'South Georgia and the South Sandwich Islands'),
(197, 'ES', 'Spain'),
(198, 'LK', 'Sri Lanka'),
(199, 'SH', 'St. Helena'),
(200, 'PM', 'St. Pierre and Miquelon'),
(201, 'SD', 'Sudan'),
(202, 'SR', 'Suriname'),
(203, 'SJ', 'Svalbard and Jan Mayen Islands'),
(204, 'SZ', 'Swaziland'),
(205, 'SE', 'Sweden'),
(206, 'CH', 'Switzerland'),
(207, 'SY', 'Syrian Arab Republic'),
(208, 'TW', 'Taiwan'),
(209, 'TJ', 'Tajikistan'),
(210, 'TZ', 'Tanzania, United Republic of'),
(211, 'TH', 'Thailand'),
(212, 'TG', 'Togo'),
(213, 'TK', 'Tokelau'),
(214, 'TO', 'Tonga'),
(215, 'TT', 'Trinidad and Tobago'),
(216, 'TN', 'Tunisia'),
(217, 'TR', 'Turkey'),
(218, 'TM', 'Turkmenistan'),
(219, 'TC', 'Turks and Caicos Islands'),
(220, 'TV', 'Tuvalu'),
(221, 'UG', 'Uganda'),
(222, 'UA', 'Ukraine'),
(223, 'AE', 'United Arab Emirates'),
(224, 'GB', 'United Kingdom'),
(225, 'US', 'United States'),
(226, 'UM', 'United States Minor Outlying Islands'),
(227, 'UY', 'Uruguay'),
(228, 'UZ', 'Uzbekistan'),
(229, 'VU', 'Vanuatu'),
(230, 'VE', 'Venezuela'),
(231, 'VN', 'Viet Nam'),
(232, 'VG', 'Virgin Islands (British)'),
(233, 'VI', 'Virgin Islands (U.S.)'),
(234, 'WF', 'Wallis and Futuna Islands'),
(235, 'EH', 'Western Sahara'),
(236, 'YE', 'Yemen'),
(237, 'YU', 'Yugoslavia'),
(238, 'ZM', 'Zambia'),
(239, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `inspection_images`
--

CREATE TABLE `inspection_images` (
  `id` int(11) NOT NULL,
  `inspection_id` int(11) NOT NULL,
  `images` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `complete_date` date NOT NULL,
  `status` enum('PENDING','PROCESSING','COMPLETED','HOLD','CANCELLED') NOT NULL,
  `client_contact1` int(11) NOT NULL,
  `client_contact2` int(11) NOT NULL,
  `blueprint` varchar(155) NOT NULL COMMENT 'blueprint file',
  `project_address1` text NOT NULL,
  `project_address2` text NOT NULL,
  `project_city` varchar(245) NOT NULL,
  `project_state` varchar(245) NOT NULL,
  `project_zip_code` varchar(45) NOT NULL,
  `created_id` int(11) NOT NULL,
  `updated_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `start_date`, `complete_date`, `status`, `client_contact1`, `client_contact2`, `blueprint`, `project_address1`, `project_address2`, `project_city`, `project_state`, `project_zip_code`, `created_id`, `updated_id`, `created_date`, `updated_date`) VALUES
(1, 'Test Project', '2017-08-01', '2017-08-08', 'PENDING', 1, 2, '', 'chennai', 'chennai', 'chennai', 'AL', '123212', 1, 0, '2017-08-22 10:35:55', '2017-08-22 14:05:55'),
(2, 'Test Project2', '2017-08-01', '2017-08-08', 'PENDING', 3, 4, '', 'chennai', 'chennai', 'chennai', 'AL', '123212', 3, 0, '2017-08-22 10:36:32', '2017-08-22 14:06:32'),
(3, 'Test Project2', '2017-08-01', '2017-08-08', 'PENDING', 5, 6, '', 'chennai', 'chennai', 'chennai', 'AL', '123212', 5, 0, '2017-08-22 10:37:19', '2017-08-22 14:07:19'),
(4, 'gavaskar', '2017-08-09', '2017-08-24', 'PENDING', 7, 8, '', 'sadfasdf', '', 'sdfsdf', 'AL', '123212', 7, 0, '2017-08-22 10:56:47', '2017-08-22 14:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `project_contractors`
--

CREATE TABLE `project_contractors` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `contractor_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_contractors`
--

INSERT INTO `project_contractors` (`id`, `project_id`, `contractor_id`) VALUES
(0, 1, '5,6'),
(0, 2, '5,6'),
(0, 3, '5,6'),
(0, 4, '5,6');

-- --------------------------------------------------------

--
-- Table structure for table `project_milestones`
--

CREATE TABLE `project_milestones` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `work_items` text NOT NULL,
  `status` enum('PENDING','PROCESSING','COMPLETED','HOLD') NOT NULL,
  `contractor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_milestones`
--

INSERT INTO `project_milestones` (`id`, `project_id`, `name`, `description`, `start_date`, `end_date`, `work_items`, `status`, `contractor_id`) VALUES
(1, 1, 'Milestone1', 'Milestone desc1', '2017-08-01', '2017-08-09', '1,2', 'PENDING', 5),
(2, 1, 'Milestone2', 'Milestone desc2', '2017-08-01', '2017-08-09', '3,4', 'PENDING', 6),
(3, 2, 'Milestone1', 'Milestone desc1', '2017-08-01', '2017-08-09', '1,2', 'PENDING', 5),
(4, 2, 'Milestone2', 'Milestone desc2', '2017-08-01', '2017-08-09', '3,4', 'PENDING', 6),
(5, 3, 'Milestone1', 'Milestone desc1', '2017-08-01', '2017-08-09', '1,2', 'PENDING', 5),
(6, 3, 'Milestone2', 'Milestone desc2', '2017-08-01', '2017-08-09', '3,4', 'PENDING', 6),
(7, 4, 'Milestone1', '', '2017-08-01', '2017-08-16', '1,2', 'PENDING', 6),
(8, 4, 'Milestone2', '', '2017-08-02', '2017-08-30', '2,3', 'PENDING', 5);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_code` varchar(10) NOT NULL,
  `state_code` varchar(10) NOT NULL,
  `state_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_code`, `state_code`, `state_name`) VALUES
(1, 'US', 'AL', 'Alabama'),
(2, 'US', 'AK', 'Alaska'),
(3, 'US', 'AZ', 'Arizona'),
(4, 'US', 'AR', 'Arkansas'),
(5, 'US', 'CA', 'California'),
(6, 'US', 'CO', 'Colorado'),
(7, 'US', 'CT', 'Connecticut'),
(8, 'US', 'DE', 'Delaware'),
(9, 'US', 'FL', 'Florida'),
(10, 'US', 'GA', 'Georgia'),
(11, 'US', 'HI', 'Hawaii'),
(12, 'US', 'ID', 'Idaho'),
(13, 'US', 'IL', 'Illinois'),
(14, 'US', 'IN', 'Indiana'),
(15, 'US', 'IA', 'Iowa'),
(16, 'US', 'KS', 'Kansas'),
(17, 'US', 'KY', 'Kentucky'),
(18, 'US', 'LA', 'Louisiana'),
(19, 'US', 'ME', 'Maine'),
(20, 'US', 'MD', 'Maryland'),
(21, 'US', 'MA', 'Massachusetts'),
(22, 'US', 'MI', 'Michigan'),
(23, 'US', 'MN', 'Minnesota'),
(24, 'US', 'MS', 'Mississippi'),
(25, 'US', 'MO', 'Missouri'),
(26, 'US', 'MT', 'Montana'),
(27, 'US', 'NE', 'Nebraska'),
(28, 'US', 'NV', 'Nevada'),
(29, 'US', 'NH', 'New Hampshire'),
(30, 'US', 'NJ', 'New Jersey'),
(31, 'US', 'NM', 'New Mexico'),
(32, 'US', 'NY', 'New York'),
(33, 'US', 'NC', 'North Carolina'),
(34, 'US', 'ND', 'North Dakota'),
(35, 'US', 'OH', 'Ohio'),
(36, 'US', 'OK', 'Oklahoma'),
(37, 'US', 'OR', 'Oregon'),
(38, 'US', 'PA', 'Pennsylvania'),
(39, 'US', 'RI', 'Rhode Island'),
(40, 'US', 'SC', 'South Carolina'),
(41, 'US', 'SD', 'South Dakota'),
(42, 'US', 'TN', 'Tennessee'),
(43, 'US', 'TX', 'Texas'),
(44, 'US', 'UT', 'Utah'),
(45, 'US', 'VT', 'Vermont'),
(46, 'US', 'VA', 'Virginia'),
(47, 'US', 'WA', 'Washington'),
(48, 'US', 'WV', 'West Virginia'),
(49, 'US', 'WI', 'Wisconsin'),
(50, 'US', 'WY', 'Wyoming'),
(51, 'US', 'DC', 'District of Columbia'),
(52, 'CA', 'BC', 'British Columbia'),
(53, 'CA', 'NL', 'Newfoundland and Labrador'),
(54, 'CA', 'QC', 'Quebec'),
(55, 'CA', 'S ON', 'Southern Ontario'),
(56, 'CA', 'N ON', 'Northern Ontario'),
(57, 'CA', 'MB', 'Manitoba'),
(58, 'CA', 'SK', 'Saskatchewan'),
(59, 'CA', 'AB', 'Alberta'),
(60, 'CA', 'NB', 'New Brunswick'),
(61, 'CA', 'NT', 'Northwest Territories'),
(62, 'CA', 'NS', 'Nova Scotia'),
(63, 'CA', 'NU', 'Nunavut'),
(64, 'CA', 'PE', 'Prince Edward Island'),
(65, 'CA', 'YT', 'Yukon');

-- --------------------------------------------------------

--
-- Table structure for table `work_items`
--

CREATE TABLE `work_items` (
  `id` int(11) NOT NULL,
  `work_name` varchar(155) NOT NULL,
  `active` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_items`
--

INSERT INTO `work_items` (`id`, `work_name`, `active`) VALUES
(1, 'Painting', 'Y'),
(2, 'Door', 'Y'),
(3, 'Window', 'Y'),
(4, 'Flooring', 'Y'),
(5, 'Baseboard', 'Y'),
(6, 'Tiles', 'Y'),
(7, 'Plumbing', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_contacts`
--
ALTER TABLE `client_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contractor_inspection`
--
ALTER TABLE `contractor_inspection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inspection_images`
--
ALTER TABLE `inspection_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_milestones`
--
ALTER TABLE `project_milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_items`
--
ALTER TABLE `work_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `client_contacts`
--
ALTER TABLE `client_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `contractor_inspection`
--
ALTER TABLE `contractor_inspection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inspection_images`
--
ALTER TABLE `inspection_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `project_milestones`
--
ALTER TABLE `project_milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `work_items`
--
ALTER TABLE `work_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
