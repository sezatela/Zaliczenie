-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Lip 2020, 16:38
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `adminlteteb1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `voices` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `candidates`
--

INSERT INTO `candidates` (`id`, `name`, `surname`, `voices`) VALUES
(1, 'Anna', 'Kowalska', 14),
(2, 'Janusz', 'Nowak', 4),
(3, 'Basia', 'Nos', 14),
(4, 'asd', 'dsa', 17),
(5, 'xxx', 'yyy', 16),
(6, 'Kandydat', 'Nowak', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `city`
--

INSERT INTO `city` (`id`, `city_id`, `name`) VALUES
(1, 172, 'Poznań'),
(2, 172, 'Warszawa'),
(3, 172, 'Opole');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `country`
--

CREATE TABLE `country` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Andorra'),
(2, 'United Arab Emirates'),
(3, 'Afghanistan'),
(4, 'Antigua and Barbuda'),
(5, 'Anguilla'),
(6, 'Albania'),
(7, 'Armenia'),
(8, 'Netherlands Antilles'),
(9, 'Angola'),
(10, 'Antarctica'),
(11, 'Argentina'),
(12, 'American Samoa'),
(13, 'Austria'),
(14, 'Australia'),
(15, 'Aruba'),
(16, 'Azerbaijan'),
(17, 'Bosnia and Herzegovina'),
(18, 'Barbados'),
(19, 'Bangladesh'),
(20, 'Belgium'),
(21, 'Burkina Faso'),
(22, 'Bulgaria'),
(23, 'Bahrain'),
(24, 'Burundi'),
(25, 'Benin'),
(26, 'Bermuda'),
(27, 'Brunei Darussalam'),
(28, 'Bolivia'),
(29, 'Brazil'),
(30, 'Bahamas'),
(31, 'Bhutan'),
(32, 'Bouvet Island'),
(33, 'Botswana'),
(34, 'Belarus'),
(35, 'Belize'),
(36, 'Canada'),
(37, 'Cocos (Keeling) Islands'),
(38, 'Congo, the Democratic Republic of the'),
(39, 'Central African Republic'),
(40, 'Congo'),
(41, 'Switzerland'),
(42, 'Cote D\'Ivoire'),
(43, 'Cook Islands'),
(44, 'Chile'),
(45, 'Cameroon'),
(46, 'China'),
(47, 'Colombia'),
(48, 'Costa Rica'),
(49, 'Serbia and Montenegro'),
(50, 'Cuba'),
(51, 'Cape Verde'),
(52, 'Christmas Island'),
(53, 'Cyprus'),
(54, 'Czech Republic'),
(55, 'Germany'),
(56, 'Djibouti'),
(57, 'Denmark'),
(58, 'Dominica'),
(59, 'Dominican Republic'),
(60, 'Algeria'),
(61, 'Ecuador'),
(62, 'Estonia'),
(63, 'Egypt'),
(64, 'Western Sahara'),
(65, 'Eritrea'),
(66, 'Spain'),
(67, 'Ethiopia'),
(68, 'Finland'),
(69, 'Fiji'),
(70, 'Falkland Islands (Malvinas)'),
(71, 'Micronesia, Federated States of'),
(72, 'Faroe Islands'),
(73, 'France'),
(74, 'Gabon'),
(75, 'United Kingdom'),
(76, 'Grenada'),
(77, 'Georgia'),
(78, 'French Guiana'),
(79, 'Ghana'),
(80, 'Gibraltar'),
(81, 'Greenland'),
(82, 'Gambia'),
(83, 'Guinea'),
(84, 'Guadeloupe'),
(85, 'Equatorial Guinea'),
(86, 'Greece'),
(87, 'South Georgia and the South Sandwich Islands'),
(88, 'Guatemala'),
(89, 'Guam'),
(90, 'Guinea-Bissau'),
(91, 'Guyana'),
(92, 'Hong Kong'),
(93, 'Heard Island and Mcdonald Islands'),
(94, 'Honduras'),
(95, 'Croatia'),
(96, 'Haiti'),
(97, 'Hungary'),
(98, 'Indonesia'),
(99, 'Ireland'),
(100, 'Israel'),
(101, 'India'),
(102, 'British Indian Ocean Territory'),
(103, 'Iraq'),
(104, 'Iran, Islamic Republic of'),
(105, 'Iceland'),
(106, 'Italy'),
(107, 'Jamaica'),
(108, 'Jordan'),
(109, 'Japan'),
(110, 'Kenya'),
(111, 'Kyrgyzstan'),
(112, 'Cambodia'),
(113, 'Kiribati'),
(114, 'Comoros'),
(115, 'Saint Kitts and Nevis'),
(116, 'Korea, Democratic People\'s Republic of'),
(117, 'Korea, Republic of'),
(118, 'Kuwait'),
(119, 'Cayman Islands'),
(120, 'Kazakhstan'),
(121, 'Lao People\'s Democratic Republic'),
(122, 'Lebanon'),
(123, 'Saint Lucia'),
(124, 'Liechtenstein'),
(125, 'Sri Lanka'),
(126, 'Liberia'),
(127, 'Lesotho'),
(128, 'Lithuania'),
(129, 'Luxembourg'),
(130, 'Latvia'),
(131, 'Libyan Arab Jamahiriya'),
(132, 'Morocco'),
(133, 'Monaco'),
(134, 'Moldova, Republic of'),
(135, 'Madagascar'),
(136, 'Marshall Islands'),
(137, 'Macedonia, the Former Yugoslav Republic of'),
(138, 'Mali'),
(139, 'Myanmar'),
(140, 'Mongolia'),
(141, 'Macao'),
(142, 'Northern Mariana Islands'),
(143, 'Martinique'),
(144, 'Mauritania'),
(145, 'Montserrat'),
(146, 'Malta'),
(147, 'Mauritius'),
(148, 'Maldives'),
(149, 'Malawi'),
(150, 'Mexico'),
(151, 'Malaysia'),
(152, 'Mozambique'),
(153, 'Namibia'),
(154, 'New Caledonia'),
(155, 'Niger'),
(156, 'Norfolk Island'),
(157, 'Nigeria'),
(158, 'Nicaragua'),
(159, 'Netherlands'),
(160, 'Norway'),
(161, 'Nepal'),
(162, 'Nauru'),
(163, 'Niue'),
(164, 'New Zealand'),
(165, 'Oman'),
(166, 'Panama'),
(167, 'Peru'),
(168, 'French Polynesia'),
(169, 'Papua New Guinea'),
(170, 'Philippines'),
(171, 'Pakistan'),
(172, 'Poland'),
(173, 'Saint Pierre and Miquelon'),
(174, 'Pitcairn'),
(175, 'Puerto Rico'),
(176, 'Palestinian Territory, Occupied'),
(177, 'Portugal'),
(178, 'Palau'),
(179, 'Paraguay'),
(180, 'Qatar'),
(181, 'Reunion'),
(182, 'Romania'),
(183, 'Russian Federation'),
(184, 'Rwanda'),
(185, 'Saudi Arabia'),
(186, 'Solomon Islands'),
(187, 'Seychelles'),
(188, 'Sudan'),
(189, 'Sweden'),
(190, 'Singapore'),
(191, 'Saint Helena'),
(192, 'Slovenia'),
(193, 'Svalbard and Jan Mayen'),
(194, 'Slovakia'),
(195, 'Sierra Leone'),
(196, 'San Marino'),
(197, 'Senegal'),
(198, 'Somalia'),
(199, 'Suriname'),
(200, 'Sao Tome and Principe'),
(201, 'El Salvador'),
(202, 'Syrian Arab Republic'),
(203, 'Swaziland'),
(204, 'Turks and Caicos Islands'),
(205, 'Chad'),
(206, 'French Southern Territories'),
(207, 'Togo'),
(208, 'Thailand'),
(209, 'Tajikistan'),
(210, 'Tokelau'),
(211, 'Timor-Leste'),
(212, 'Turkmenistan'),
(213, 'Tunisia'),
(214, 'Tonga'),
(215, 'Turkey'),
(216, 'Trinidad and Tobago'),
(217, 'Tuvalu'),
(218, 'Taiwan, Province of China'),
(219, 'Tanzania, United Republic of'),
(220, 'Ukraine'),
(221, 'Uganda'),
(222, 'United States Minor Outlying Islands'),
(223, 'United States'),
(224, 'Uruguay'),
(225, 'Uzbekistan'),
(226, 'Holy See (Vatican City State)'),
(227, 'Saint Vincent and the Grenadines'),
(228, 'Venezuela'),
(229, 'Virgin Islands, British'),
(230, 'Virgin Islands, U.s.'),
(231, 'Viet Nam'),
(232, 'Vanuatu'),
(233, 'Wallis and Futuna'),
(234, 'Samoa'),
(235, 'Yemen'),
(236, 'Mayotte'),
(237, 'South Africa'),
(238, 'Zambia'),
(239, 'Zimbabwe');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `permission`
--

CREATE TABLE `permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `permission`
--

INSERT INTO `permission` (`id`, `permission`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `used_detalis`
--

CREATE TABLE `used_detalis` (
  `id` int(10) UNSIGNED NOT NULL,
  `idcity` int(10) UNSIGNED NOT NULL,
  `date_of_birth` date NOT NULL,
  `citizeship` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `permissionid` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `active` int(11) NOT NULL,
  `create_user` datetime NOT NULL DEFAULT current_timestamp(),
  `last_login` datetime DEFAULT NULL,
  `avatar` varchar(150) CHARACTER SET utf8 NOT NULL,
  `genKey` varchar(500) CHARACTER SET utf8 NOT NULL,
  `online` int(10) DEFAULT NULL,
  `cityid` int(10) UNSIGNED DEFAULT NULL,
  `wybory` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `permissionid`, `name`, `surname`, `email`, `pass`, `birthday`, `active`, `create_user`, `last_login`, `avatar`, `genKey`, `online`, `cityid`, `wybory`) VALUES
(1, 1, 'Janusz', 'Nowak', 'janusz@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$ZzdtSFVrT3ZRVWFDUE5nQg$GMahd7olsxkfy0SDWCRV5bBV1dOF6ypUl3lpASWR2xQ', '1111-11-11', 1, '2020-06-28 11:16:28', '2020-06-28 18:09:27', 'https://adminlte.io/themes/AdminLTE/dist/img/user1-128x128.jpg', '', 1, 1, NULL),
(2, 2, '111', '222', 'sezatela@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ekNFMjk1UENobDhvTGpHWA$mOyfMHypDUQfcDp0OBLBFj4AGmem0RDFW5LtVFELSXE', '1212-12-12', 1, '2020-06-28 11:17:55', '2020-06-28 18:09:50', 'http://ledox.com.pl/wp-content/uploads/2014/12/avatar.png', '', 1, 1, 1),
(89, 2, 'asd', 'dsa', 'asd@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$VklEbzJwdlJoallTay8wcQ$7yA+rHX5gbYRnOBdcsav7LknpY0r52by+MVqpLYaSqI', '1111-11-11', 0, '2020-06-28 16:07:17', '2020-06-02 00:00:00', 'http://ledox.com.pl/wp-content/uploads/2014/12/avatar.png', '94d649406975d354eb3cff0c4f9de47e', NULL, 2, NULL),
(90, 3, 'as', 'as', 'as@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$am95dFJKREtmMU1ya3UwLw$vQSI4Bs+mZG1pNlQl+bEUD7G8qqMm3F94d8B25GdxpU', '1111-11-11', 0, '2020-06-28 16:23:01', '2020-04-07 00:00:00', 'http://ledox.com.pl/wp-content/uploads/2014/12/avatar.png', '94d649406975d354eb3cff0c4f9de47e', NULL, 3, NULL),
(91, 2, 'Anna', 'Nowak', 'a1@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$SDFTQmxaZmhoVDZab09xZg$DytDBBCD9pOzhResuHb9RdQjc6rNVjqCEqdTfP8wbQs', NULL, 0, '2020-06-28 18:09:15', NULL, 'http://ledox.com.pl/wp-content/uploads/2014/12/avatar.png', '94d649406975d354eb3cff0c4f9de47e', NULL, NULL, NULL);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`city_id`);

--
-- Indeksy dla tabeli `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permission`),
  ADD KEY `permission_2` (`permission`);

--
-- Indeksy dla tabeli `used_detalis`
--
ALTER TABLE `used_detalis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcity` (`idcity`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permissionid`),
  ADD KEY `id_user_details` (`cityid`),
  ADD KEY `birthday` (`birthday`);

--
-- AUTO_INCREMENT dla tabel zrzutów
--

--
-- AUTO_INCREMENT dla tabeli `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `country`
--
ALTER TABLE `country`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT dla tabeli `permission`
--
ALTER TABLE `permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `used_detalis`
--
ALTER TABLE `used_detalis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `country` (`id`);

--
-- Ograniczenia dla tabeli `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`permissionid`) REFERENCES `permission` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`cityid`) REFERENCES `city` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
