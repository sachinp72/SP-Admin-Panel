-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 01:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(10) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `category_id`, `name`, `status`, `created_at`) VALUES
(1, 2, 'Samsung', 1, '2024-11-13 13:05:11'),
(2, 1, 'Biscuits', 0, '2024-11-13 13:05:30'),
(3, 4, 'abc', 1, '2025-04-21 13:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyers`
--

CREATE TABLE `tbl_buyers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `mobile` int(10) DEFAULT NULL,
  `discount_percentage` int(10) DEFAULT NULL,
  `payment_mode` set('cash','pending','online') DEFAULT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buyers`
--

INSERT INTO `tbl_buyers` (`id`, `name`, `email`, `address`, `mobile`, `discount_percentage`, `payment_mode`, `status`, `created_at`) VALUES
(1, 'Sachin Potre', 'admin@gmail.com', 'Pune', 2147483647, 25, 'online', 1, '2024-11-13 13:07:40'),
(2, 'SP', 'admin@gmail.com', 'Pune22', 890674523, 20, 'pending', 1, '2024-11-13 13:26:56'),
(3, 'vishal', 'vish@123.com', 'pune', 2147483647, 2, 'pending', 1, '2025-04-21 13:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Food', 1, '2024-11-13 12:56:53'),
(2, 'Electronics', 1, '2024-11-13 12:59:11'),
(3, 'Retail', 0, '2024-11-13 13:04:44'),
(4, 'Air', 1, '2025-04-21 13:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currencies`
--

CREATE TABLE `tbl_currencies` (
  `id` int(11) NOT NULL,
  `iso` varchar(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `status` int(10) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_currencies`
--

INSERT INTO `tbl_currencies` (`id`, `iso`, `name`, `status`) VALUES
(1, 'KRW', '(South) Korean Won', 1),
(2, 'AFA', 'Afghanistan Afghani', 1),
(3, 'ALL', 'Albanian Lek', 1),
(4, 'DZD', 'Algerian Dinar', 1),
(5, 'ADP', 'Andorran Peseta', 1),
(6, 'AOK', 'Angolan Kwanza', 1),
(7, 'ARS', 'Argentine Peso', 1),
(8, 'AMD', 'Armenian Dram', 1),
(9, 'AWG', 'Aruban Florin', 1),
(10, 'AUD', 'Australian Dollar', 1),
(11, 'BSD', 'Bahamian Dollar', 1),
(12, 'BHD', 'Bahraini Dinar', 1),
(13, 'BDT', 'Bangladeshi Taka', 1),
(14, 'BBD', 'Barbados Dollar', 1),
(15, 'BZD', 'Belize Dollar', 1),
(16, 'BMD', 'Bermudian Dollar', 1),
(17, 'BTN', 'Bhutan Ngultrum', 1),
(18, 'BOB', 'Bolivian Boliviano', 1),
(19, 'BWP', 'Botswanian Pula', 1),
(20, 'BRL', 'Brazilian Real', 1),
(21, 'GBP', 'British Pound', 1),
(22, 'BND', 'Brunei Dollar', 1),
(23, 'BGN', 'Bulgarian Lev', 1),
(24, 'BUK', 'Burma Kyat', 1),
(25, 'BIF', 'Burundi Franc', 1),
(26, 'CAD', 'Canadian Dollar', 1),
(27, 'CVE', 'Cape Verde Escudo', 1),
(28, 'KYD', 'Cayman Islands Dollar', 1),
(29, 'CLP', 'Chilean Peso', 1),
(30, 'CLF', 'Chilean Unidades de Fomento', 1),
(31, 'COP', 'Colombian Peso', 1),
(32, 'XOF', 'Communauté Financière Africaine BCEAO - Francs', 1),
(33, 'XAF', 'Communauté Financière Africaine BEAC, Francs', 1),
(34, 'KMF', 'Comoros Franc', 1),
(35, 'XPF', 'Comptoirs Français du Pacifique Francs', 1),
(36, 'CRC', 'Costa Rican Colon', 1),
(37, 'CUP', 'Cuban Peso', 1),
(38, 'CYP', 'Cyprus Pound', 1),
(39, 'CZK', 'Czech Republic Koruna', 1),
(40, 'DKK', 'Danish Krone', 1),
(41, 'YDD', 'Democratic Yemeni Dinar', 1),
(42, 'DOP', 'Dominican Peso', 1),
(43, 'XCD', 'East Caribbean Dollar', 1),
(44, 'TPE', 'East Timor Escudo', 1),
(45, 'ECS', 'Ecuador Sucre', 1),
(46, 'EGP', 'Egyptian Pound', 1),
(47, 'SVC', 'El Salvador Colon', 1),
(48, 'EEK', 'Estonian Kroon (EEK)', 1),
(49, 'ETB', 'Ethiopian Birr', 1),
(50, 'EUR', 'Euro', 1),
(51, 'FKP', 'Falkland Islands Pound', 1),
(52, 'FJD', 'Fiji Dollar', 1),
(53, 'GMD', 'Gambian Dalasi', 1),
(54, 'GHC', 'Ghanaian Cedi', 1),
(55, 'GIP', 'Gibraltar Pound', 1),
(56, 'XAU', 'Gold, Ounces', 1),
(57, 'GTQ', 'Guatemalan Quetzal', 1),
(58, 'GNF', 'Guinea Franc', 1),
(59, 'GWP', 'Guinea-Bissau Peso', 1),
(60, 'GYD', 'Guyanan Dollar', 1),
(61, 'HTG', 'Haitian Gourde', 1),
(62, 'HNL', 'Honduran Lempira', 1),
(63, 'HKD', 'Hong Kong Dollar', 1),
(64, 'HUF', 'Hungarian Forint', 1),
(65, 'INR', 'Indian Rupee', 1),
(66, 'IDR', 'Indonesian Rupiah', 1),
(67, 'XDR', 'International Monetary Fund (IMF) Special Drawing Rights', 1),
(68, 'IRR', 'Iranian Rial', 1),
(69, 'IQD', 'Iraqi Dinar', 1),
(70, 'IEP', 'Irish Punt', 1),
(71, 'ILS', 'Israeli Shekel', 1),
(72, 'JMD', 'Jamaican Dollar', 1),
(73, 'JPY', 'Japanese Yen', 1),
(74, 'JOD', 'Jordanian Dinar', 1),
(75, 'KHR', 'Kampuchean (Cambodian) Riel', 1),
(76, 'KES', 'Kenyan Schilling', 1),
(77, 'KWD', 'Kuwaiti Dinar', 1),
(78, 'LAK', 'Lao Kip', 1),
(79, 'LBP', 'Lebanese Pound', 1),
(80, 'LSL', 'Lesotho Loti', 1),
(81, 'LRD', 'Liberian Dollar', 1),
(82, 'LYD', 'Libyan Dinar', 1),
(83, 'MOP', 'Macau Pataca', 1),
(84, 'MGF', 'Malagasy Franc', 1),
(85, 'MWK', 'Malawi Kwacha', 1),
(86, 'MYR', 'Malaysian Ringgit', 1),
(87, 'MVR', 'Maldive Rufiyaa', 1),
(88, 'MTL', 'Maltese Lira', 1),
(89, 'MRO', 'Mauritanian Ouguiya', 1),
(90, 'MUR', 'Mauritius Rupee', 1),
(91, 'MXP', 'Mexican Peso', 1),
(92, 'MNT', 'Mongolian Tugrik', 1),
(93, 'MAD', 'Moroccan Dirham', 1),
(94, 'MZM', 'Mozambique Metical', 1),
(95, 'NAD', 'Namibian Dollar', 1),
(96, 'NPR', 'Nepalese Rupee', 1),
(97, 'ANG', 'Netherlands Antillian Guilder', 1),
(98, 'YUD', 'New Yugoslavia Dinar', 1),
(99, 'NZD', 'New Zealand Dollar', 1),
(100, 'NIO', 'Nicaraguan Cordoba', 1),
(101, 'NGN', 'Nigerian Naira', 1),
(102, 'KPW', 'North Korean Won', 1),
(103, 'NOK', 'Norwegian Kroner', 1),
(104, 'OMR', 'Omani Rial', 1),
(105, 'PKR', 'Pakistan Rupee', 1),
(106, 'XPD', 'Palladium Ounces', 1),
(107, 'PAB', 'Panamanian Balboa', 1),
(108, 'PGK', 'Papua New Guinea Kina', 1),
(109, 'PYG', 'Paraguay Guarani', 1),
(110, 'PEN', 'Peruvian Nuevo Sol', 1),
(111, 'PHP', 'Philippine Peso', 1),
(112, 'XPT', 'Platinum, Ounces', 1),
(113, 'PLN', 'Polish Zloty', 1),
(114, 'QAR', 'Qatari Rial', 1),
(115, 'RON', 'Romanian Leu', 1),
(116, 'RUB', 'Russian Ruble', 1),
(117, 'RWF', 'Rwanda Franc', 1),
(118, 'WST', 'Samoan Tala', 1),
(119, 'STD', 'Sao Tome and Principe Dobra', 1),
(120, 'SAR', 'Saudi Arabian Riyal', 1),
(121, 'SCR', 'Seychelles Rupee', 1),
(122, 'SLL', 'Sierra Leone Leone', 1),
(123, 'XAG', 'Silver, Ounces', 1),
(124, 'SGD', 'Singapore Dollar', 1),
(125, 'SKK', 'Slovak Koruna', 1),
(126, 'SBD', 'Solomon Islands Dollar', 1),
(127, 'SOS', 'Somali Schilling', 1),
(128, 'ZAR', 'South African Rand', 1),
(129, 'LKR', 'Sri Lanka Rupee', 1),
(130, 'SHP', 'St. Helena Pound', 1),
(131, 'SDP', 'Sudanese Pound', 1),
(132, 'SRG', 'Suriname Guilder', 1),
(133, 'SZL', 'Swaziland Lilangeni', 1),
(134, 'SEK', 'Swedish Krona', 1),
(135, 'CHF', 'Swiss Franc', 1),
(136, 'SYP', 'Syrian Potmd', 1),
(137, 'TWD', 'Taiwan Dollar', 1),
(138, 'TZS', 'Tanzanian Schilling', 1),
(139, 'THB', 'Thai Baht', 1),
(140, 'TOP', 'Tongan Paanga', 1),
(141, 'TTD', 'Trinidad and Tobago Dollar', 1),
(142, 'TND', 'Tunisian Dinar', 1),
(143, 'TRY', 'Turkish Lira', 1),
(144, 'UGX', 'Uganda Shilling', 1),
(145, 'AED', 'United Arab Emirates Dirham', 1),
(146, 'UYU', 'Uruguayan Peso', 1),
(147, 'USD', 'US Dollar', 1),
(148, 'VUV', 'Vanuatu Vatu', 1),
(149, 'VEF', 'Venezualan Bolivar', 1),
(150, 'VND', 'Vietnamese Dong', 1),
(151, 'YER', 'Yemeni Rial', 1),
(152, 'CNY', 'Yuan (Chinese) Renminbi', 1),
(153, 'ZRZ', 'Zaire Zaire', 1),
(154, 'ZMK', 'Zambian Kwacha', 1),
(155, 'ZWD', 'Zimbabwe Dollar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_options`
--

CREATE TABLE `tbl_options` (
  `id` int(11) NOT NULL,
  `option_name` varchar(150) DEFAULT NULL,
  `option_value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_options`
--

INSERT INTO `tbl_options` (`id`, `option_name`, `option_value`) VALUES
(1, 'site_currency', 'INR'),
(2, 'site_footer_setting', 'a:2:{s:4:\"link\";s:58:\"http://localhost/sp-admin/index.php/admin/footer-settings#\";s:4:\"name\";s:14:\"SP Admin Panel\";}');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `buyer_id` int(10) DEFAULT NULL,
  `product_id` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `total_amount` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `buyer_id`, `product_id`, `quantity`, `status`, `total_amount`, `created_at`) VALUES
(1, 1, 1, 3, 1, 90990, '2024-11-13 13:07:40'),
(2, 2, 1, 2, 1, 60660, '2024-11-13 13:26:56'),
(3, 3, 0, 2, 1, 0, '2025-04-21 13:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `brand_id` int(10) DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `amount` int(10) DEFAULT NULL,
  `status` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `description`, `image`, `brand_id`, `category_id`, `amount`, `status`, `created_at`) VALUES
(1, 'Iphone', 'Iphone 16 max pro', 'http://localhost/sp-admin/assets/product-image/images_(1).jpeg', 1, 2, 30330, 1, '2024-11-13 13:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `password`, `image`, `created_at`) VALUES
(4, 'Vishal', 'sachin@gmail.com', '1234', 'http://localhost/sp-admin/assets/product-image/Screenshot_2025-04-13_154411.png', '2024-11-07 10:10:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_currencies`
--
ALTER TABLE `tbl_currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_options`
--
ALTER TABLE `tbl_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_buyers`
--
ALTER TABLE `tbl_buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_currencies`
--
ALTER TABLE `tbl_currencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `tbl_options`
--
ALTER TABLE `tbl_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
