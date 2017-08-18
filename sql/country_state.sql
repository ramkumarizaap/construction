-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 03:11 PM
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;