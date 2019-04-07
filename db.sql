-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2019 at 11:17 AM
-- Server version: 5.7.25-0ubuntu0.18.10.2
-- PHP Version: 7.3.3-1+ubuntu18.10.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambassadors`
--

CREATE TABLE `ambassadors` (
  `ambassador_ID` int(11) NOT NULL,
  `ambassador_password` varchar(255) NOT NULL,
  `ambassador_fname` varchar(255) NOT NULL,
  `ambassador_lname` varchar(255) NOT NULL,
  `ambassador_email` varchar(255) NOT NULL,
  `ambassador_phoneno` varchar(255) NOT NULL,
  `ambassador_show` enum('P','E') DEFAULT 'P',
  `institute_ID` int(11) NOT NULL,
  `ambassador_avatar` varchar(512) NOT NULL,
  `ambassador_status` enum('E','D') DEFAULT 'E' COMMENT 'E - Enabled, D - Disabled',
  `accepted_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_img` varchar(1000) DEFAULT NULL,
  `is_deleted` enum('Y','N') DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competitions`
--

CREATE TABLE `competitions` (
  `competition_ID` int(11) NOT NULL,
  `competition_name` varchar(512) NOT NULL,
  `competition_status` enum('E','D') DEFAULT 'E' COMMENT 'E - Enabled, D - Disabled',
  `competition_min` int(11) NOT NULL,
  `competition_max` int(11) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `competition_limit` int(11) NOT NULL,
  `competition_i_fee` int(11) NOT NULL,
  `competition_e_fee` int(11) NOT NULL,
  `competition_deleted` enum('T','F') DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `competition_details`
--

CREATE TABLE `competition_details` (
  `details_ID` int(11) NOT NULL,
  `competition_ID` int(11) NOT NULL,
  `details_description` text,
  `details_winning` text,
  `details_rules` text,
  `details_img` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `coupon_ID` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` float NOT NULL,
  `coupon_type` enum('P','F') NOT NULL COMMENT 'P - Percentage, F - Fixed',
  `coupon_status` enum('E','D') NOT NULL DEFAULT 'E' COMMENT 'E - enabled, D - disabled',
  `times_used` int(11) NOT NULL,
  `coupon_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_used`
--

CREATE TABLE `coupon_used` (
  `used_ID` int(11) NOT NULL,
  `coupon_ID` int(11) NOT NULL,
  `transaction_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credits_left`
--

CREATE TABLE `credits_left` (
  `credit_ID` int(11) NOT NULL,
  `credit_amount` int(11) NOT NULL,
  `transaction_ID` int(11) NOT NULL,
  `credit_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `credit_updated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE `email_logs` (
  `log_ID` int(11) NOT NULL,
  `log_email` varchar(255) NOT NULL,
  `log_content` text NOT NULL,
  `log_comment` text NOT NULL,
  `log_type` enum('S','F') NOT NULL,
  `log_recorded` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institutes`
--

CREATE TABLE `institutes` (
  `institute_ID` int(11) NOT NULL,
  `institute_name` varchar(512) NOT NULL,
  `institute_status` enum('E','D') DEFAULT 'E' COMMENT 'E - Enabled, D - Disabled',
  `institute_type` enum('E','I') DEFAULT 'E' COMMENT 'I - internal, E - external'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutes`
--

INSERT INTO `institutes` (`institute_ID`, `institute_name`, `institute_status`, `institute_type`) VALUES
(1, 'Adamjee Government Science College', 'E', 'E'),
(2, 'Adamson Institute of Business Administration and Technology', 'E', 'E'),
(3, 'Aga Khan University', 'E', 'E'),
(4, 'Aligarh Institute of Technology AIT', 'E', 'E'),
(5, 'Aptech Computer Education', 'E', 'E'),
(6, 'Asian Institute of Fashion Design AIFD', 'E', 'I'),
(7, 'BAMM PECHS Government College For Women', 'D', 'E'),
(8, 'Bahauddin Zakariya University BZU', 'E', 'E'),
(9, 'Bahria University BU', 'E', 'E'),
(10, 'Baqai Medical University', 'E', 'E'),
(11, 'Barrett Hodgson University', 'E', 'E'),
(12, 'Beconhouse School', 'D', 'E'),
(13, 'Benazir Bhutto Shaheed University', 'E', 'E'),
(14, 'D.J. Sindh Government Science College', 'E', 'E'),
(15, 'DHA Suffa University DSU', 'E', 'E'),
(16, 'Dadabhoy Institute of Higher Education DIHE', 'E', 'E'),
(17, 'Dawood University of Engineering and Technology', 'E', 'E'),
(18, 'Defence College For Women DCW', 'E', 'E'),
(19, 'Dow University of Health Sciences', 'E', 'E'),
(20, 'Federal Urdu University', 'E', 'E'),
(21, 'Greenwich University GU', 'E', 'E'),
(22, 'Habib University HU', 'E', 'E'),
(23, 'Hamdard University', 'E', 'E'),
(24, 'ILMA University', 'E', 'E'),
(25, 'Indus University', 'E', 'E'),
(26, 'Indus Valley School of Art and Architecture', 'E', 'E'),
(27, 'Institute of Business Administration IBA', 'E', 'E'),
(28, 'Institute of Business Management IoBM (CBM)', 'E', 'E'),
(29, 'Institute of Industrial Electronics Engineering IIEE', 'E', 'E'),
(30, 'Iqra University IU', 'E', 'I'),
(31, 'Isra University', 'E', 'E'),
(32, 'Jinnah University for Women JUW', 'E', 'E'),
(33, 'Karachi Institute of Economics and Technology PAF KIET', 'E', 'E'),
(34, 'Karachi Institute of Technology and Entrepreneurship KITE', 'E', 'E'),
(35, 'Karachi Medical and Dental College', 'E', 'E'),
(36, 'Karachi School of Arts KSA', 'E', 'E'),
(37, 'Karachi School of Business and Leadership KSBL', 'E', 'E'),
(38, 'Khadim Ali Shah Bukhari Institute of Technology KASBIT', 'E', 'E'),
(39, 'Mehran University of Engineering & Technology', 'E', 'E'),
(40, 'Mohammad Ali Jinnah University MAJU', 'E', 'E'),
(41, 'NCR-CET College', 'D', 'E'),
(42, 'NED University of Engineering and Technology', 'E', 'E'),
(43, 'National University of Computer and Emerging Sciences, FAST-NUCES', 'E', 'E'),
(44, 'National University of Sciences and Technology NUST', 'E', 'E'),
(45, 'Nazeer Hussain University NHU', 'E', 'E'),
(46, 'Newports Institute of Communications & Economics', 'E', 'E'),
(47, 'Preston Institute of Management Science and Technology PIMSAT', 'E', 'E'),
(48, 'Preston University', 'E', 'E'),
(49, 'Shaheed Zulfiqar Ali Bhutto Institute of Science and Technology SZABIST', 'E', 'E'),
(50, 'Sindh Madressatul Islam University', 'E', 'E'),
(51, 'Sir Syed University of Engineering and Technology SSUET', 'E', 'E'),
(52, 'Tabani\'s School of Accountancy TSA', 'E', 'E'),
(53, 'Textile Institute of Pakistan', 'E', 'E'),
(54, 'The Academy School', 'D', 'E'),
(55, 'The City School', 'D', 'E'),
(56, 'The Educators', 'D', 'E'),
(57, 'University of Karachi UoK UBIT KU', 'E', 'E'),
(58, 'Usman Institute of Technology UIT', 'E', 'E'),
(59, 'Virtual University VU', 'E', 'E'),
(60, 'Ziauddin University', 'E', 'E'),
(61, 'Monotech Institute', 'E', 'E'),
(62, 'Arena Multimedia', 'E', 'E'),
(63, 'Awaz Institute of Media and Management Sciences (AIMS)', 'E', 'E'),
(64, 'Altamash Institute of Dental Medicine', 'E', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `loggers`
--

CREATE TABLE `loggers` (
  `logger_id` int(11) NOT NULL,
  `logger_text` text NOT NULL,
  `logger_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `management_ID` int(11) NOT NULL,
  `management_fname` varchar(11) NOT NULL,
  `management_lname` varchar(11) NOT NULL,
  `management_password` varchar(50) DEFAULT NULL,
  `management_email` varchar(30) DEFAULT NULL,
  `management_mobile` varchar(20) DEFAULT NULL,
  `management_status` enum('E','D') DEFAULT 'E',
  `management_type` enum('A','R') DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_ID` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `participant_ID` int(11) NOT NULL,
  `institute_ID` int(11) DEFAULT NULL,
  `member_cnic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE `participants` (
  `participant_ID` int(11) NOT NULL,
  `participant_team` varchar(255) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `competition_ID` int(11) NOT NULL,
  `participant_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` enum('F','T') DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reset_requests`
--

CREATE TABLE `reset_requests` (
  `reset_ID` int(11) NOT NULL,
  `reset_code` varchar(255) NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `reset_status` enum('U','N') NOT NULL DEFAULT 'N' COMMENT 'U - used, N - not used',
  `reset_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `reset_completed_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_ID` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `setting_name` varchar(255) NOT NULL,
  `setting_value` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`setting_name`, `setting_value`) VALUES
('ambassador_applicants', 'false'),
('team_applicants', 'false');

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `slot_ID` int(11) NOT NULL,
  `slot_name` varchar(255) NOT NULL,
  `slot_pre` int(11) DEFAULT NULL,
  `room_ID` int(11) NOT NULL,
  `competition_ID` int(11) NOT NULL,
  `slot_start` datetime NOT NULL,
  `slot_end` datetime NOT NULL,
  `slot_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slot_participants`
--

CREATE TABLE `slot_participants` (
  `slot_ID` int(11) NOT NULL,
  `participant_ID` int(11) NOT NULL,
  `round_status` enum('S','Q','R','W') NOT NULL DEFAULT 'S' COMMENT 'S - selected, Q - qualified, R - runnerup, W - winner'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transaction_ID` int(11) NOT NULL,
  `participant_ID` int(11) NOT NULL,
  `transaction_amount` int(11) NOT NULL,
  `transaction_discount` int(11) NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `transaction_status` enum('P','U','C') DEFAULT 'U',
  `transaction_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `details_ID` int(11) NOT NULL,
  `transaction_ID` int(11) NOT NULL,
  `paid_to` enum('A','M') NOT NULL COMMENT 'A - ambassador, M - management',
  `details_receiver_ID` int(11) NOT NULL,
  `details_date` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_ID` int(11) NOT NULL,
  `user_fname` varchar(255) NOT NULL,
  `user_lname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_phone` varchar(100) NOT NULL,
  `user_cnic` varchar(255) DEFAULT NULL,
  `institute_ID` int(11) NOT NULL,
  `ambassador_ID` int(11) DEFAULT NULL,
  `user_status` enum('E','D') DEFAULT 'E' COMMENT 'E - enabled, D - disabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambassadors`
--
ALTER TABLE `ambassadors`
  ADD PRIMARY KEY (`ambassador_ID`),
  ADD KEY `institute_ID` (`institute_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_ID`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `competitions`
--
ALTER TABLE `competitions`
  ADD PRIMARY KEY (`competition_ID`),
  ADD UNIQUE KEY `competition_name` (`competition_name`),
  ADD KEY `category_ID` (`category_ID`);

--
-- Indexes for table `competition_details`
--
ALTER TABLE `competition_details`
  ADD PRIMARY KEY (`details_ID`),
  ADD KEY `competition_ID` (`competition_ID`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`coupon_ID`),
  ADD UNIQUE KEY `coupon_name` (`coupon_name`);

--
-- Indexes for table `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD PRIMARY KEY (`used_ID`),
  ADD KEY `coupon_ID` (`coupon_ID`),
  ADD KEY `transaction_ID` (`transaction_ID`);

--
-- Indexes for table `credits_left`
--
ALTER TABLE `credits_left`
  ADD PRIMARY KEY (`credit_ID`),
  ADD KEY `transaction_ID` (`transaction_ID`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`log_ID`);

--
-- Indexes for table `institutes`
--
ALTER TABLE `institutes`
  ADD PRIMARY KEY (`institute_ID`),
  ADD UNIQUE KEY `institute_name` (`institute_name`);

--
-- Indexes for table `loggers`
--
ALTER TABLE `loggers`
  ADD PRIMARY KEY (`logger_id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`management_ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_ID`),
  ADD KEY `participant_ID` (`participant_ID`),
  ADD KEY `institute_ID` (`institute_ID`);

--
-- Indexes for table `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`participant_ID`),
  ADD KEY `user_ID` (`user_ID`,`competition_ID`),
  ADD KEY `competition_ID` (`competition_ID`);

--
-- Indexes for table `reset_requests`
--
ALTER TABLE `reset_requests`
  ADD PRIMARY KEY (`reset_ID`),
  ADD UNIQUE KEY `reset_code` (`reset_code`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_ID`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD UNIQUE KEY `setting_name` (`setting_name`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`slot_ID`),
  ADD KEY `room_ID` (`room_ID`),
  ADD KEY `competition_ID` (`competition_ID`);

--
-- Indexes for table `slot_participants`
--
ALTER TABLE `slot_participants`
  ADD KEY `slot_ID` (`slot_ID`,`participant_ID`),
  ADD KEY `participant_ID` (`participant_ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `participant_ID` (`participant_ID`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`details_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_ID`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `institute_ID` (`institute_ID`),
  ADD KEY `ambassador_ID` (`ambassador_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ambassadors`
--
ALTER TABLE `ambassadors`
  MODIFY `ambassador_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `competitions`
--
ALTER TABLE `competitions`
  MODIFY `competition_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `competition_details`
--
ALTER TABLE `competition_details`
  MODIFY `details_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `coupon_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `coupon_used`
--
ALTER TABLE `coupon_used`
  MODIFY `used_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `credits_left`
--
ALTER TABLE `credits_left`
  MODIFY `credit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `log_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institutes`
--
ALTER TABLE `institutes`
  MODIFY `institute_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `loggers`
--
ALTER TABLE `loggers`
  MODIFY `logger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=817;
--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `management_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;
--
-- AUTO_INCREMENT for table `participants`
--
ALTER TABLE `participants`
  MODIFY `participant_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
--
-- AUTO_INCREMENT for table `reset_requests`
--
ALTER TABLE `reset_requests`
  MODIFY `reset_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `slot_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `details_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=455;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambassadors`
--
ALTER TABLE `ambassadors`
  ADD CONSTRAINT `ambassadors_ibfk_1` FOREIGN KEY (`institute_ID`) REFERENCES `institutes` (`institute_ID`);

--
-- Constraints for table `competitions`
--
ALTER TABLE `competitions`
  ADD CONSTRAINT `competitions_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `categories` (`category_ID`);

--
-- Constraints for table `competition_details`
--
ALTER TABLE `competition_details`
  ADD CONSTRAINT `competition_details_ibfk_1` FOREIGN KEY (`competition_ID`) REFERENCES `competitions` (`competition_ID`);

--
-- Constraints for table `coupon_used`
--
ALTER TABLE `coupon_used`
  ADD CONSTRAINT `coupon_used_ibfk_1` FOREIGN KEY (`coupon_ID`) REFERENCES `coupons` (`coupon_ID`),
  ADD CONSTRAINT `coupon_used_ibfk_2` FOREIGN KEY (`transaction_ID`) REFERENCES `transactions` (`transaction_ID`);

--
-- Constraints for table `credits_left`
--
ALTER TABLE `credits_left`
  ADD CONSTRAINT `credits_left_ibfk_1` FOREIGN KEY (`transaction_ID`) REFERENCES `transactions` (`transaction_ID`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`participant_ID`) REFERENCES `participants` (`participant_ID`),
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`institute_ID`) REFERENCES `institutes` (`institute_ID`);

--
-- Constraints for table `participants`
--
ALTER TABLE `participants`
  ADD CONSTRAINT `participants_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `users` (`user_ID`),
  ADD CONSTRAINT `participants_ibfk_2` FOREIGN KEY (`competition_ID`) REFERENCES `competitions` (`competition_ID`);

--
-- Constraints for table `reset_requests`
--
ALTER TABLE `reset_requests`
  ADD CONSTRAINT `reset_requests_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`user_email`);

--
-- Constraints for table `slots`
--
ALTER TABLE `slots`
  ADD CONSTRAINT `slots_ibfk_1` FOREIGN KEY (`room_ID`) REFERENCES `rooms` (`room_ID`),
  ADD CONSTRAINT `slots_ibfk_2` FOREIGN KEY (`competition_ID`) REFERENCES `competitions` (`competition_ID`);

--
-- Constraints for table `slot_participants`
--
ALTER TABLE `slot_participants`
  ADD CONSTRAINT `slot_participants_ibfk_1` FOREIGN KEY (`slot_ID`) REFERENCES `slots` (`slot_ID`),
  ADD CONSTRAINT `slot_participants_ibfk_2` FOREIGN KEY (`participant_ID`) REFERENCES `participants` (`participant_ID`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`participant_ID`) REFERENCES `participants` (`participant_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`institute_ID`) REFERENCES `institutes` (`institute_ID`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`ambassador_ID`) REFERENCES `ambassadors` (`ambassador_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
