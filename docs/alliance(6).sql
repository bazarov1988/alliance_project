-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2015 at 07:27 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alliance`
--

-- --------------------------------------------------------

--
-- Table structure for table `bop_limit`
--

CREATE TABLE IF NOT EXISTS `bop_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rate` float NOT NULL,
  `minimum` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bop_limit`
--

INSERT INTO `bop_limit` (`id`, `name`, `rate`, `minimum`) VALUES
(1, '$100,000 / $200,000', 0.49, 25),
(2, '$300,000 / $600,000', 0.63, 32),
(3, '$500,000 / $1,000,000', 0.73, 38),
(4, '$1,000,000 / $2,000,000', 0.9, 47),
(5, '$2,000,000 / $4,000,000', 1.04, 53),
(6, 'None', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bop_rater_entry`
--

CREATE TABLE IF NOT EXISTS `bop_rater_entry` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_quoted` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `zip_code` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `construction` int(11) DEFAULT NULL,
  `protection` int(11) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `zone` int(11) DEFAULT NULL,
  `prior_since` int(11) DEFAULT NULL,
  `occupied` int(11) DEFAULT NULL,
  `occupied_type` int(11) DEFAULT NULL,
  `policy_type` int(11) DEFAULT NULL,
  `deductible_bldg` int(11) DEFAULT NULL,
  `deductible_bp` int(11) DEFAULT NULL,
  `building_rc_acv` int(11) DEFAULT NULL,
  `business_property_rc_acv` int(11) DEFAULT NULL,
  `mercantile_occupany_in_bldg` tinyint(1) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `does_lead_exclusion_apply` tinyint(1) DEFAULT NULL,
  `operated_by_insured` tinyint(1) DEFAULT NULL,
  `apt_in_bldg` tinyint(1) DEFAULT NULL,
  `sole_occupancy` int(11) DEFAULT NULL,
  `consumed_on_premises` tinyint(1) DEFAULT NULL,
  `building_amount_of_ins` float DEFAULT NULL,
  `bus_amount_of_ins` float DEFAULT NULL,
  `prop_damage` int(11) DEFAULT NULL,
  `agregate` int(11) DEFAULT NULL,
  `med_payment` int(11) DEFAULT NULL,
  `each_occurrence` varchar(255) NOT NULL,
  `each_person_accident` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='bop_rater' AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `burglary_and_robbery`
--

CREATE TABLE IF NOT EXISTS `burglary_and_robbery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `first_group` int(11) NOT NULL,
  `second_group` int(11) NOT NULL,
  `third_group` int(11) NOT NULL,
  `fourth_group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `burglary_and_robbery`
--

INSERT INTO `burglary_and_robbery` (`id`, `name`, `first_group`, `second_group`, `third_group`, `fourth_group`) VALUES
(1, '$500 ', 60, 60, 71, 71),
(2, '$1,000 ', 93, 93, 109, 109),
(3, '$1,500 ', 120, 120, 142, 142),
(4, '$2,000 ', 145, 145, 171, 171),
(5, '$3,000 ', 190, 190, 223, 223),
(6, '$4,000 ', 230, 230, 268, 268),
(7, '$5,000 ', 265, 265, 308, 308);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sub_zone` int(11) NOT NULL,
  `eq_class` int(11) NOT NULL DEFAULT '1',
  `eq_zone` int(11) NOT NULL,
  `factor` float NOT NULL DEFAULT '0.9',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `sub_zone`, `eq_class`, `eq_zone`, `factor`) VALUES
(1, 'Albany', 3, 1, 1, 0.9),
(2, 'Allegany', 2, 1, 2, 0.9),
(3, 'Bronx', 9, 1, 1, 0.9),
(4, 'Broome', 3, 1, 2, 0.9),
(5, 'Cattaraugus', 2, 1, 2, 0.9),
(6, 'Cayuga', 3, 1, 2, 0.9),
(7, 'Chautauqua', 2, 1, 2, 0.9),
(8, 'Chemung', 2, 1, 2, 0.9),
(9, 'Chenango', 3, 1, 2, 0.9),
(10, 'Clinton', 1, 1, 3, 0.9),
(11, 'Columbia', 4, 1, 1, 0.9),
(12, 'Cortland', 3, 1, 2, 0.9),
(13, 'Delaware', 3, 1, 2, 0.9),
(14, 'Dutchess', 4, 1, 1, 0.9),
(15, 'Erie', 6, 1, 1, 0.9),
(16, 'Essex', 1, 1, 3, 0.9),
(17, 'Franklin', 1, 1, 3, 0.9),
(18, 'Fulton', 3, 1, 1, 0.9),
(19, 'Genesee', 2, 1, 1, 0.9),
(20, 'Greene', 4, 1, 1, 0.9),
(21, 'Hamilton', 1, 1, 1, 0.9),
(22, 'Herkimer', 1, 1, 1, 0.9),
(23, 'Jefferson', 1, 1, 2, 0.9),
(24, 'Kings', 9, 1, 1, 0.9),
(25, 'Lewis', 1, 1, 2, 0.9),
(26, 'Livingston', 2, 1, 1, 0.9),
(27, 'Madison', 3, 1, 2, 0.9),
(28, 'Monroe', 2, 1, 1, 0.9),
(29, 'Montgomery', 3, 1, 1, 0.9),
(30, 'Nassau', 5, 1, 1, 0.9),
(31, 'New York', 9, 1, 1, 0.9),
(32, 'Niagara', 2, 1, 1, 0.9),
(33, 'Oneida', 6, 1, 2, 0.9),
(34, 'Onondaga', 6, 1, 2, 0.9),
(35, 'Ontario', 2, 1, 2, 0.9),
(36, 'Orange', 5, 1, 1, 0.9),
(37, 'Orleans', 2, 1, 1, 0.9),
(38, 'Oswego', 1, 1, 2, 0.9),
(39, 'Otsego', 3, 1, 2, 0.9),
(40, 'Putnam', 4, 1, 1, 0.9),
(41, 'Queens', 9, 1, 1, 0.9),
(42, 'Rensselaer', 3, 1, 1, 0.9),
(43, 'Richmond', 9, 1, 1, 0.9),
(44, 'Rockland', 4, 1, 1, 0.9),
(45, 'St. Lawrence', 1, 1, 1, 0.9),
(46, 'Saratoga', 3, 1, 1, 0.9),
(47, 'Schenectady', 6, 1, 1, 0.9),
(48, 'Schoharie', 3, 1, 1, 0.9),
(49, 'Schuyler', 2, 1, 2, 0.9),
(50, 'Seneca', 2, 1, 2, 0.9),
(51, 'Steuben', 2, 1, 2, 0.9),
(52, 'Suffolk', 5, 1, 1, 0.9),
(53, 'Sullivan', 4, 1, 2, 0.9),
(54, 'Tioga', 3, 1, 2, 0.9),
(55, 'Tompkins', 3, 1, 2, 0.9),
(56, 'Ulster', 4, 1, 1, 0.9),
(57, 'Warren', 3, 1, 1, 0.9),
(58, 'Washington', 1, 1, 1, 0.9),
(59, 'Wayne', 2, 1, 2, 0.9),
(60, 'Westchester', 5, 1, 1, 0.9),
(61, 'Wyoming', 2, 1, 1, 0.9),
(62, 'Yates', 2, 1, 2, 0.9);

-- --------------------------------------------------------

--
-- Table structure for table `medical_payments`
--

CREATE TABLE IF NOT EXISTS `medical_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `standart` float NOT NULL,
  `premium` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `medical_payments`
--

INSERT INTO `medical_payments` (`id`, `name`, `standart`, `premium`) VALUES
(1, '$500 / 10,000', 0, 0),
(2, '$500 / 25,000', 8, 0),
(3, '$500 / 50,000', 12, 0),
(4, '$1,000 / 25,000', 10, 0),
(5, '$1,000 / 50,000', 14, 6),
(6, '$5,000 / 25,000', 14, 6),
(7, '$5,000 / 50,000', 18, 10),
(8, '$10,000 / 25,000', 18, 8),
(9, '$10,000 / 50,000', 22, 12);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1421925040),
('m140524_153638_init_user', 1421925044),
('m140524_153642_init_user_auth', 1421925045),
('m150305_150027_bldg_rg_field_for_occupancy', 1425567824);

-- --------------------------------------------------------

--
-- Table structure for table `occupancy`
--

CREATE TABLE IF NOT EXISTS `occupancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `mer_serc` int(11) NOT NULL,
  `rate_group` int(11) NOT NULL,
  `crime_group` int(11) NOT NULL,
  `bldg_rg` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `occupancy`
--

INSERT INTO `occupancy` (`id`, `name`, `mer_serc`, `rate_group`, `crime_group`, `bldg_rg`) VALUES
(1, 'Apartment', 6, 6, 1, 9),
(2, 'Church', 7, 7, 1, 9),
(3, 'Hotel / Motel', 9, 9, 1, 9),
(4, 'Office', 8, 8, 1, 9),
(5, 'Appliance repair', 2, 3, 2, 1),
(6, 'Auto Accessory Store, No Auto repair ', 1, 3, 2, 1),
(7, 'Automatic Car Wash', 2, 3, 2, 1),
(8, 'Bagel Shop - with baking', 1, 2, 1, 1),
(9, 'Bagel Shop - with cooking', 1, 4, 1, 2),
(10, 'Bakeries - with baking on premises', 1, 2, 1, 1),
(11, 'Bakeries - with cooking and selling', 1, 5, 1, 2),
(12, 'Bakeries, selling only(no baking)', 1, 1, 1, 1),
(13, 'Bar', 1, 5, 2, 2),
(14, 'Barber and Beauty Supplies', 1, 2, 1, 1),
(15, 'Barber Shop', 1, 1, 1, 1),
(16, 'Beauty Shop', 1, 1, 1, 1),
(17, 'Beverage Store, Selling beer and wine', 1, 2, 3, 1),
(18, 'Beverage Store, Selling no alcohol', 1, 1, 1, 1),
(19, 'Bicycle Shop', 1, 2, 1, 1),
(20, 'Book and Magazine Store', 1, 1, 2, 1),
(21, 'Camera and Photgraphic Supply Store', 1, 3, 2, 1),
(22, 'Candy, Nut and Confectionery Store-Cooking', 1, 4, 1, 2),
(23, 'Candy, Nut and Confectionery Store-No Cooking', 1, 1, 1, 1),
(24, 'Card and Stationery Store', 1, 1, 1, 1),
(25, 'Carpet Store, less than 25% from installation', 1, 3, 2, 1),
(26, 'Clothing Alteration, Pressing & Repair', 2, 4, 3, 2),
(27, 'Clothing Rental', 2, 3, 3, 1),
(28, 'Clothing Store', 1, 4, 3, 2),
(29, 'Clubs', 2, 4, 3, 2),
(30, 'Coin Operated Laundries and dry cleaners', 2, 3, 3, 1),
(31, 'Confectionery, Candy and Nut Store-Cooking', 1, 4, 1, 2),
(32, 'Confectionery, Candy and Nut Store-No Cooking', 1, 1, 1, 1),
(33, 'Craft Store', 1, 1, 1, 1),
(34, 'Curtain & Drapery Store, less than 25% install.', 1, 1, 2, 1),
(35, 'Deli - No Cooking', 1, 2, 1, 1),
(36, 'Deli-Cooking with household appl.- no kitchen', 1, 3, 1, 1),
(37, 'Dental Labs', 2, 2, 1, 1),
(38, 'Department Store more than $500,000 sales', 1, 4, 3, 2),
(39, 'Department Store less than $500,000 sales', 1, 1, 3, 1),
(40, 'Diaper Service', 2, 2, 1, 1),
(41, 'Drapery & Curtain Store,less than 25% install. ', 1, 1, 2, 1),
(42, 'Drug Store with Cooking on premises', 1, 4, 3, 2),
(43, 'Drug Store with No Cooking on premises', 1, 3, 3, 1),
(44, 'Dry Cleaning Plants (except rug cleaning)', 2, 2, 1, 1),
(45, 'Electrotyping', 2, 1, 2, 1),
(46, 'Engraving', 2, 1, 1, 1),
(47, 'Fabric Store', 1, 1, 2, 1),
(48, 'Fish, Meat and Poultry Store', 1, 1, 2, 1),
(49, 'Floor Covering Store incl. carpet,less than 25% from install.', 1, 3, 2, 1),
(50, 'Florist', 1, 1, 1, 1),
(51, 'Funeral Directors', 2, 4, 1, 2),
(52, 'Furniture Store', 1, 3, 2, 1),
(53, 'Game, Toy and Hobby Store', 1, 1, 1, 1),
(54, 'Garden and Lawn Store', 1, 2, 1, 1),
(55, 'General Store', 1, 2, 2, 1),
(56, 'Gift, Novelty and Souvenir Store', 1, 2, 1, 1),
(57, 'Glass, Paint and Wallpaper Store', 1, 1, 1, 1),
(58, 'Groceries, less than $500,000 annual sales', 1, 3, 2, 1),
(59, 'Hardware Store', 1, 2, 2, 1),
(60, 'Health Food Store', 1, 1, 2, 1),
(61, 'Hobby, Toy and Game Store', 1, 1, 1, 1),
(62, 'Household Appl. St. under 25% rec. from off-prem. svc.', 1, 3, 2, 1),
(63, 'Ice Cream Store, No Cooking on premises', 1, 1, 1, 1),
(64, 'Industrial Launderers', 2, 2, 1, 1),
(65, 'Kitchen Accessories Store', 1, 2, 2, 1),
(66, 'Laundry and Dry Cleaning Pick Up Station(no cleaning)', 2, 1, 1, 1),
(67, 'Lawn and Garden Supply Store', 1, 2, 1, 1),
(68, 'Leather Goods Store', 1, 1, 3, 1),
(69, 'Letter Service (mailing or addressing)', 2, 1, 1, 1),
(70, 'Linen Supply', 2, 2, 1, 1),
(71, 'Linotyping', 2, 1, 1, 1),
(72, 'Liquor Store', 1, 3, 3, 1),
(73, 'Lithographing', 2, 1, 1, 1),
(74, 'Magazine and Book Store', 1, 1, 2, 1),
(75, 'Meat, Fish and Poultry Store', 1, 1, 2, 1),
(76, 'Music, Tape and Record Store', 1, 4, 2, 2),
(77, 'Novelty, Gift and Souvenir Store', 1, 2, 1, 1),
(78, 'Nut, Candy and Confectionery Store with Cooking', 1, 4, 1, 2),
(79, 'Nut, Candy and Confectionery Store with No Cooking', 1, 1, 1, 1),
(80, 'Office Machine Store', 1, 2, 2, 1),
(81, 'Optical Goods', 1, 1, 1, 1),
(82, 'Paint, Glass and Wallpaper Store', 1, 1, 1, 1),
(83, 'Pet Store', 1, 2, 1, 1),
(84, 'Photocopying & Blueprinting', 2, 1, 1, 1),
(85, 'Photoengraving', 2, 1, 1, 1),
(86, 'Photofinishing Laboratories', 2, 2, 2, 1),
(87, 'Photographic and Camera Supply Store', 1, 3, 2, 1),
(88, 'Photographic Studios', 2, 4, 2, 2),
(89, 'Pizza Shop - with baking', 1, 2, 1, 1),
(90, 'Pizza Shop - with cooking', 1, 4, 1, 2),
(91, 'Poultry, Meat and Fish Store', 1, 1, 2, 1),
(92, 'Power Laundries (not auto)', 2, 2, 1, 1),
(93, 'Printing - Commercial and Related Services', 2, 1, 1, 1),
(94, 'Radio & TV Repair', 2, 3, 3, 1),
(95, 'Radio and TV Store less than 25% from serv. or repair', 1, 4, 3, 2),
(96, 'Record, Tape and Music Store', 1, 4, 2, 2),
(97, 'Restaurant ', 1, 5, 3, 2),
(98, 'Restaurant Equipment', 1, 2, 2, 1),
(99, 'Retail, NOC', 1, 2, 2, 1),
(100, 'Sewing Machine Store', 1, 1, 2, 1),
(101, 'Shoe Repair', 2, 4, 2, 2),
(102, 'Shoe Repair Store', 1, 2, 2, 1),
(103, 'Shoe Store', 1, 2, 2, 1),
(104, 'Souvenir, Gift and Novelty Store', 1, 2, 2, 1),
(105, 'Sporting Goods Store', 1, 4, 4, 2),
(106, 'Stationery and Card Store', 1, 1, 2, 1),
(107, 'Stenographic & Duplicating, NOC', 2, 1, 1, 1),
(108, 'Storage Buildings', 2, 1, 1, 1),
(109, 'Supermarket, more than $500,000 annual sales', 1, 4, 2, 2),
(110, 'Tailor Shop (men''s and women''s)', 1, 1, 1, 1),
(111, 'Tailors', 2, 4, 3, 2),
(112, 'Tape, Music and Record Store', 1, 4, 2, 2),
(113, 'Tobacco Store', 1, 3, 3, 1),
(114, 'Toy, Hobby and Game', 1, 1, 1, 1),
(115, 'Tuxedo Rental', 2, 3, 3, 1),
(116, 'TV/Radio Store - less than 25% receipts from repair & svc.', 1, 4, 3, 2),
(117, 'Upholstery Goods St.-under 25% rec. from work performed', 1, 1, 2, 1),
(118, 'Vacuum Cleaner Sales and Service Store', 1, 1, 2, 1),
(119, 'Valet Service', 2, 2, 3, 1),
(120, 'Variety Store', 1, 4, 3, 2),
(121, 'Video Store', 1, 2, 3, 1),
(122, 'Wallpaper, Paint and Glass Store', 1, 1, 1, 1),
(123, 'Watch, Clock & Jewelry Store', 2, 3, 3, 1),
(124, 'Wholesale, NOC', 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `optional_liability_coverages`
--

CREATE TABLE IF NOT EXISTS `optional_liability_coverages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quote_id` bigint(20) NOT NULL,
  `liability_form` int(11) DEFAULT NULL,
  `additional_insured` int(11) DEFAULT NULL,
  `additional_insured_number` int(11) DEFAULT NULL,
  `add_insured_owners_lessees` tinyint(1) DEFAULT NULL,
  `add_insured_owners_contactors` tinyint(1) DEFAULT NULL,
  `battery_exclusion` tinyint(1) DEFAULT NULL,
  `barber_shop_liability` int(11) DEFAULT NULL,
  `emploees_full_time` int(11) DEFAULT NULL,
  `emploees_part_time` int(11) DEFAULT NULL,
  `emploees_barbers_time` int(11) DEFAULT NULL,
  `emploees_manicurists` int(11) DEFAULT NULL,
  `designated_premises` tinyint(1) DEFAULT NULL,
  `contractual_liability_limitation` tinyint(1) DEFAULT NULL,
  `project_only` tinyint(1) DEFAULT NULL,
  `automobile_coverage` int(11) DEFAULT NULL,
  `automobile_coverage_agregate_a` int(11) DEFAULT NULL,
  `automobile_coverage_agregate` int(11) DEFAULT NULL,
  `liquor_liability_receipts` int(11) DEFAULT NULL,
  `liquor_liability_restaurant` int(11) DEFAULT NULL,
  `liquor_liability_limit` int(11) DEFAULT NULL,
  `acquired_entities` tinyint(1) DEFAULT NULL,
  `exclusionary_endorsements` tinyint(1) DEFAULT NULL,
  `all_hazards` tinyint(1) DEFAULT NULL,
  `a_d_p_b` tinyint(1) DEFAULT NULL,
  `athletic_participants` tinyint(1) DEFAULT NULL,
  `certain_skin_care_service` tinyint(1) DEFAULT NULL,
  `certain_skin_care_service_a` tinyint(1) DEFAULT NULL,
  `discrimination_clarification` tinyint(1) DEFAULT NULL,
  `employment_practices` tinyint(1) DEFAULT NULL,
  `fairs` tinyint(1) DEFAULT NULL,
  `known_loss_damage` tinyint(1) DEFAULT NULL,
  `dry_cleaning_damage` tinyint(1) DEFAULT NULL,
  `liquor_liability` tinyint(1) DEFAULT NULL,
  `operations` tinyint(1) NOT NULL,
  `saddle_animals` tinyint(1) DEFAULT NULL,
  `ice_control_operations` tinyint(1) DEFAULT NULL,
  `extended_pollution_exclusion` tinyint(1) DEFAULT NULL,
  `fire_legal` text,
  `fire_legal_settlement` int(11) DEFAULT NULL,
  `automobile_coverage_a` int(11) DEFAULT NULL,
  `personal_injury` tinyint(1) DEFAULT NULL,
  `pool_liability` tinyint(1) DEFAULT NULL,
  `completed_operations` tinyint(1) DEFAULT NULL,
  `water_damage_exclusion` tinyint(1) DEFAULT NULL,
  `water_damage_exclusion_apartments` float DEFAULT NULL,
  `water_damage_exclusion_offices_in_ah` float DEFAULT NULL,
  `water_damage_exclusion_offices_in_ob` float DEFAULT NULL,
  `water_damage_exclusion_store_in_ah` tinyint(1) DEFAULT NULL,
  `water_damage_exclusion_store_in_ob` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `optional_property_coverages`
--

CREATE TABLE IF NOT EXISTS `optional_property_coverages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quote_id` bigint(20) NOT NULL,
  `accounts_receivable` varchar(255) NOT NULL,
  `additional_expense` varchar(255) NOT NULL,
  `alcoholic_beverages_tax_exclusion` tinyint(1) DEFAULT NULL,
  `building_inflation_protection` float DEFAULT NULL,
  `businessowners_agreed_amount` tinyint(1) DEFAULT NULL,
  `businessowners_burglary_robbery` varchar(255) NOT NULL,
  `cause_of_loss_building` int(11) DEFAULT NULL,
  `cause_of_loss_business_property` int(11) DEFAULT NULL,
  `computer_coverage` varchar(255) NOT NULL,
  `deductible` int(11) DEFAULT NULL,
  `cooking_protection_equip` tinyint(1) DEFAULT NULL,
  `customers_goods` varchar(255) NOT NULL,
  `agreement_one` varchar(255) NOT NULL,
  `agreement_two` varchar(255) NOT NULL,
  `agreement_three` varchar(255) NOT NULL,
  `building_limit` varchar(255) NOT NULL,
  `bus_prop_limit` varchar(255) NOT NULL,
  `masonry_veneer` varchar(255) NOT NULL,
  `employee_dishonesty` varchar(255) NOT NULL,
  `equipment_breakdown` tinyint(1) DEFAULT NULL,
  `exterior_signs` varchar(255) NOT NULL,
  `cost_provision` tinyint(1) DEFAULT NULL,
  `loss_off_income_month` varchar(255) NOT NULL,
  `loss_of_income` tinyint(1) DEFAULT NULL,
  `loss_of_income_sf` tinyint(1) NOT NULL,
  `building_increment` int(11) DEFAULT NULL,
  `bus_prop_increment` int(11) DEFAULT NULL,
  `loss_payable` tinyint(1) DEFAULT NULL,
  `money_securities` varchar(255) DEFAULT NULL,
  `direct_damages` varchar(255) NOT NULL,
  `damages_transmission_lines` int(11) DEFAULT NULL,
  `damages_deductible` int(11) DEFAULT NULL,
  `time_element` varchar(255) NOT NULL,
  `time_transmission_lines` int(11) DEFAULT NULL,
  `time_deductible` int(11) DEFAULT NULL,
  `demolition_amount` varchar(255) NOT NULL,
  `increased_cost` varchar(255) NOT NULL,
  `building_glass` varchar(255) NOT NULL,
  `curved` tinyint(1) DEFAULT NULL,
  `plates` tinyint(1) DEFAULT NULL,
  `ornamental_work` varchar(255) NOT NULL,
  `refrigerated_food` varchar(255) NOT NULL,
  `food_deductible` int(11) DEFAULT NULL,
  `refrigerated_property` varchar(255) NOT NULL,
  `refrigerated_property_deductible` int(11) DEFAULT NULL,
  `season_variation` tinyint(1) NOT NULL,
  `add_mos` varchar(255) NOT NULL,
  `number_of_additional` int(11) DEFAULT NULL,
  `sprinkler_leakage` tinyint(1) DEFAULT NULL,
  `add_increment` int(11) DEFAULT NULL,
  `storekeepers_burglary_robbery` int(11) DEFAULT NULL,
  `storekeepers_burglary_robbery_deductible` int(11) DEFAULT NULL,
  `burglary_of_money` varchar(255) DEFAULT NULL,
  `theft_of_money` varchar(255) NOT NULL,
  `tenant_Improvements_one` varchar(255) NOT NULL,
  `tenant_Improvements_a` varchar(255) NOT NULL,
  `valuable_papers` varchar(255) NOT NULL,
  `insured_premises` tinyint(1) DEFAULT NULL,
  `insured_premises_ten` int(11) DEFAULT NULL,
  `insured_premises_a` tinyint(1) DEFAULT NULL,
  `insured_premises_a_ten` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `create_time`, `update_time`, `full_name`) VALUES
(1, 1, '2015-02-05 14:09:48', '2015-02-11 13:10:40', 'admin adminov'),
(2, 2, '2015-02-11 13:10:02', NULL, 'Test Testov');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `can_admin` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `create_time`, `update_time`, `can_admin`) VALUES
(1, 'Admin', '2015-01-22 09:10:44', NULL, 1),
(2, 'User', '2015-01-22 09:10:44', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `special_conditions`
--

CREATE TABLE IF NOT EXISTS `special_conditions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quote_id` bigint(20) NOT NULL,
  `external_fire_alarm_system` tinyint(1) NOT NULL DEFAULT '0',
  `approved_watchman_service` tinyint(1) NOT NULL DEFAULT '0',
  `central_station_reporting` tinyint(1) NOT NULL DEFAULT '0',
  `smoke_detectors` tinyint(1) NOT NULL DEFAULT '0',
  `burglary_alarm_only` tinyint(1) NOT NULL DEFAULT '0',
  `fire_resistive` tinyint(1) NOT NULL DEFAULT '0',
  `sprinklered` tinyint(1) NOT NULL DEFAULT '0',
  `fire_resistive_sprinklered` tinyint(1) NOT NULL DEFAULT '0',
  `hood_and_duct` tinyint(1) NOT NULL DEFAULT '0',
  `above` tinyint(1) NOT NULL DEFAULT '0',
  `all_above` tinyint(1) NOT NULL DEFAULT '0',
  `metal_building` tinyint(1) NOT NULL DEFAULT '0',
  `storage_buildings` tinyint(1) NOT NULL DEFAULT '0',
  `conforming_code_specifications` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT NULL,
  `create_ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  `ban_time` timestamp NULL DEFAULT NULL,
  `ban_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_email` (`email`),
  UNIQUE KEY `user_username` (`username`),
  KEY `user_role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `status`, `email`, `new_email`, `username`, `password`, `auth_key`, `api_key`, `login_ip`, `login_time`, `create_ip`, `create_time`, `update_time`, `ban_time`, `ban_reason`) VALUES
(1, 1, 1, 'admin_test@gmail.com', NULL, 'admin', '$2y$13$M9DEPZeaKiMWSjUU59OsZOPGc9GVXHyVMmCoOR3zyaOmPLNm18mAO', 'xy3ANikyUbCqak6oKXdDFHLejW9M6aeo', 'eF9aTPt-CmWVq44dtoCPWC8AKrDp1aTZ', '127.0.0.1', '2015-03-06 14:51:02', '127.0.0.1', '2015-02-05 14:09:47', '2015-02-11 13:10:40', NULL, NULL),
(2, 2, 1, 'test_user@mail.com', NULL, 'neo2', '$2y$13$sLTcPgTU11N26iGGCeaqUeACCgFsQQ4Mj.IkrhSOP2zjwKloA7yAW', NULL, NULL, NULL, NULL, NULL, '2015-02-11 13:10:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_auth`
--

CREATE TABLE IF NOT EXISTS `user_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provider_attributes` text COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `update_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_auth_provider_id` (`provider_id`),
  KEY `user_auth_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_key`
--

CREATE TABLE IF NOT EXISTS `user_key` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT NULL,
  `consume_time` timestamp NULL DEFAULT NULL,
  `expire_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_key_key` (`key`),
  KEY `user_key_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_key`
--

INSERT INTO `user_key` (`id`, `user_id`, `type`, `key`, `create_time`, `consume_time`, `expire_time`) VALUES
(1, 1, 1, 'B2loEpj7zst1ix-EbdMKoBlAnv6C7r7W', '2015-02-05 14:11:38', '2015-02-05 14:13:00', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_auth`
--
ALTER TABLE `user_auth`
  ADD CONSTRAINT `user_auth_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_key`
--
ALTER TABLE `user_key`
  ADD CONSTRAINT `user_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
