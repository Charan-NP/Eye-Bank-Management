-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eye_project1`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertIntoRegister` (IN `p_name` VARCHAR(15), IN `p_age` INT, IN `p_gender` VARCHAR(10), IN `p_phone` BIGINT, IN `p_bloodType` VARCHAR(10), IN `p_dateOfRegister` DATE, IN `p_registerFor` VARCHAR(15), IN `p_DOB` DATE, IN `p_ProofType` VARCHAR(15), IN `p_ProofNo` VARCHAR(15))   BEGIN
    -- Declare variables to handle exceptions
    DECLARE continue_handler INT DEFAULT 1;
    DECLARE duplicate_key CONDITION FOR SQLSTATE '23000';
    DECLARE EXIT HANDLER FOR duplicate_key
    BEGIN
        -- Duplicate key error, handle it
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Duplicate entry: Registration with the same phone number already exists.';
        SET continue_handler = 0;
    END;

    -- Insert data into the register table
    INSERT INTO `register` (`name`, `age`, `gender`, `phone`, `bloodType`, `dateOfRegister`, `registerFor`)
    VALUES (p_name, p_age, p_gender, p_phone, p_bloodType, p_dateOfRegister, p_registerFor,p_DOB,p_ProofType,p_ProofNo);
    
    -- Check if the insertion was successful
    IF continue_handler THEN
        SELECT 'Registration successful!' AS result;
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adid` varchar(15) NOT NULL,
  `adname` text NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adid`, `adname`, `username`, `password`) VALUES
('A001', 'Charan', 'charan1', '9353');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `DonorID` int(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Age` int(12) NOT NULL,
  `BloodType` varchar(10) NOT NULL,
  `ContactDetails` bigint(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DateOfDonation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`DonorID`, `Name`, `Age`, `BloodType`, `ContactDetails`, `Gender`, `DateOfDonation`) VALUES
(11111, 'Arun', 45, 'B+', 6353724598, 'Male', '2023-11-10'),
(11112, 'Adarsh', 39, 'A+', 7845056899, 'Male', '2023-01-20'),
(11113, 'Tara', 42, 'O+', 8975082318, 'Female', '2024-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `eye`
--

CREATE TABLE `eye` (
  `EyeID` varchar(15) NOT NULL,
  `DonorID` varchar(15) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `DateOfCollection` date NOT NULL,
  `BloodType` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eye`
--

INSERT INTO `eye` (`EyeID`, `DonorID`, `Status`, `DateOfCollection`, `BloodType`) VALUES
('101', '11114', 'Available', '2024-01-14', 'B+');

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `RecipientID` varchar(15) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Age` int(10) NOT NULL,
  `BloodType` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `ContactDetails` bigint(10) NOT NULL,
  `DateOfTransaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipient`
--

INSERT INTO `recipient` (`RecipientID`, `Name`, `Age`, `BloodType`, `Gender`, `ContactDetails`, `DateOfTransaction`) VALUES
('22122', 'Sharath', 35, 'B+', 'Male', 8967430098, '2023-11-15'),
('22221', 'Ram', 29, 'A+', 'Male', 7343623478, '2023-01-25'),
('22434', 'Charan', 20, 'B+', 'Male', 9353724598, '2024-02-28'),
('8888', 'rajesh', 20, 'A+', 'male', 9353724598, '2024-03-27');

--
-- Triggers `recipient`
--
DELIMITER $$
CREATE TRIGGER `insertTransaction7` AFTER INSERT ON `recipient` FOR EACH ROW INSERT INTO transaction VALUES(null,new.RecipientID,new.BloodType,new.DateOfTransaction)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `bloodType` varchar(10) NOT NULL,
  `dateOfRegister` date NOT NULL,
  `registerFor` varchar(15) NOT NULL,
  `DOB` date NOT NULL,
  `ProofType` varchar(15) NOT NULL,
  `ProofNo` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `age`, `gender`, `phone`, `bloodType`, `dateOfRegister`, `registerFor`, `DOB`, `ProofType`, `ProofNo`, `password`) VALUES
(18, 'charan', 20, 'male', 8889896987, 'A+', '2024-03-02', 'receive', '2024-03-05', 'adhaar', '111111111111', '111'),
(20, 'Ramesh', 35, 'male', 8745734507, 'A+', '2024-03-04', 'donate', '1988-07-27', 'adhaar', '246734218978', '8745'),
(25, 'Manjunath', 46, 'male', 6389765492, 'A+', '2024-03-01', 'donate', '1978-02-22', 'adhaar', '245676941278', '6389');

--
-- Triggers `register`
--
DELIMITER $$
CREATE TRIGGER `check_phone_before_insert` BEFORE INSERT ON `register` FOR EACH ROW BEGIN
    IF CHAR_LENGTH(NEW.phone) <> 10 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Phone number must have exactly 10 digits';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_proof_no_duplicate` BEFORE INSERT ON `register` FOR EACH ROW BEGIN
    DECLARE proof_no_count INT;

    -- Check if the ProofNo already exists in the register table
    SELECT COUNT(*) INTO proof_no_count
    FROM `register`
    WHERE `ProofNo` = NEW.ProofNo;

    -- If ProofNo already exists, raise an error
    IF proof_no_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Error: Duplicate ProofNo. Cannot insert the same ProofNo.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_proof_number_length` BEFORE INSERT ON `register` FOR EACH ROW BEGIN
    DECLARE proof_type_length INT;

    -- Get the length of the proof number based on the proof type
    CASE NEW.ProofType
        WHEN 'adhaar' THEN SET proof_type_length = 12;
        WHEN 'passport' THEN SET proof_type_length = 9;
        ELSE
            -- Handle other proof types if needed
            SET proof_type_length = 0;
    END CASE;

    -- Check if the proof number length matches the expected length
    IF CHAR_LENGTH(NEW.ProofNo) <> proof_type_length THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Proof number length does not match the expected length for the selected proof type.';
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `enforce_register_assertion` BEFORE INSERT ON `register` FOR EACH ROW BEGIN
    DECLARE existing_count INT;

    -- Check if there are any existing rows with the same values
    SELECT COUNT(*) INTO existing_count
    FROM `register`
    WHERE `name` = NEW.name
      AND `age` = NEW.age
      AND `gender` = NEW.gender
      AND `phone` = NEW.phone
      AND `bloodType` = NEW.bloodType
      AND `dateOfRegister` = NEW.dateOfRegister;

    -- If there are existing rows, raise an error
    IF existing_count > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Assertion violation: Duplicate entry';
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `TransactionID` int(11) NOT NULL,
  `RecipientID` varchar(15) NOT NULL,
  `BloodType` varchar(20) NOT NULL,
  `DateOfTransaction` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`TransactionID`, `RecipientID`, `BloodType`, `DateOfTransaction`) VALUES
(3, '22434', 'B+', '2024-02-28'),
(4, '8888', 'A+', '2024-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `name` text NOT NULL,
  `Username` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `name`, `Username`, `email`, `Password`) VALUES
(7, 'charan', 'charan', 'c@gmail.com', '111'),
(8, 'aa', 'aa', 'aa@gmail.com', '000'),
(9, 'aa', 'aa', 'a@gmail.com', '000'),
(10, 'Charan', 'charan@1', 'Charan@np', '987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eye`
--
ALTER TABLE `eye`
  ADD PRIMARY KEY (`EyeID`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`RecipientID`),
  ADD KEY `DateOfTransaction` (`DateOfTransaction`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TransactionID`),
  ADD KEY `RecipientID` (`RecipientID`),
  ADD KEY `FK_DateOfTransaction` (`DateOfTransaction`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `FK_DateOfTransaction` FOREIGN KEY (`DateOfTransaction`) REFERENCES `recipient` (`DateOfTransaction`),
  ADD CONSTRAINT `RecipientID` FOREIGN KEY (`RecipientID`) REFERENCES `recipient` (`RecipientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
