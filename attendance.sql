-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 08:13 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `a_user_id` varchar(25) NOT NULL,
  `a_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`a_user_id`, `a_password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `S_id` varchar(15) NOT NULL,
  `Sub_id` varchar(50) NOT NULL,
  `Month` varchar(10) NOT NULL,
  `Class_attended` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`S_id`, `Sub_id`, `Month`, `Class_attended`) VALUES
('17/10/JC/001', 'CS-119', 'Feburary', 13),
('17/10/JC/002', 'CS-119', 'Feburary', 11),
('17/10/JC/004', 'CS-119', 'Feburary', 12),
('17/10/JC/005', 'CS-119', 'Feburary', 13),
('17/10/JC/006', 'CS-119', 'Feburary', 11),
('17/10/JC/007', 'CS-119', 'Feburary', 12),
('17/10/JC/008', 'CS-119', 'Feburary', 10),
('17/10/JC/010', 'CS-119', 'Feburary', 11),
('17/10/JC/011', 'CS-119', 'Feburary', 8),
('17/10/JC/012', 'CS-119', 'Feburary', 8),
('17/10/JC/014', 'CS-119', 'Feburary', 13),
('17/10/JC/015', 'CS-119', 'Feburary', 9),
('17/10/JC/016', 'CS-119', 'Feburary', 11),
('17/10/JC/017', 'CS-119', 'Feburary', 10),
('17/10/JC/018', 'CS-119', 'Feburary', 13),
('17/10/JC/019', 'CS-119', 'Feburary', 9),
('17/10/JC/001', 'CS-119', 'January', 11),
('17/10/JC/002', 'CS-119', 'January', 12),
('17/10/JC/004', 'CS-119', 'January', 15),
('17/10/JC/005', 'CS-119', 'January', 15),
('17/10/JC/006', 'CS-119', 'January', 14),
('17/10/JC/007', 'CS-119', 'January', 13),
('17/10/JC/008', 'CS-119', 'January', 11),
('17/10/JC/010', 'CS-119', 'January', 10),
('17/10/JC/011', 'CS-119', 'January', 8),
('17/10/JC/012', 'CS-119', 'January', 10),
('17/10/JC/014', 'CS-119', 'January', 15),
('17/10/JC/015', 'CS-119', 'January', 10),
('17/10/JC/016', 'CS-119', 'January', 10),
('17/10/JC/017', 'CS-119', 'January', 13),
('17/10/JC/018', 'CS-119', 'January', 15),
('17/10/JC/019', 'CS-119', 'January', 9);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `password`) VALUES
('ashutosh_scs', 'ashutosh'),
('MCA1', 'kasturi123'),
('ramesh_scs', 'ramesh'),
('sushil_scs', 'sushil');

-- --------------------------------------------------------

--
-- Table structure for table `month_lecture`
--

CREATE TABLE `month_lecture` (
  `Month` varchar(10) NOT NULL,
  `No_of_class` int(5) NOT NULL,
  `Sub_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `month_lecture`
--

INSERT INTO `month_lecture` (`Month`, `No_of_class`, `Sub_id`) VALUES
('Feburary', 13, 'CS-119'),
('January', 15, 'CS-119');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `S_id` varchar(15) NOT NULL,
  `S_name` varchar(30) NOT NULL,
  `Course` varchar(30) NOT NULL,
  `Semester` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`S_id`, `S_name`, `Course`, `Semester`) VALUES
('17/10/JC/001', 'SAURAV SHAH', 'M.C.A.', 2),
('17/10/JC/002', 'GAURAV VERMA', 'M.C.A.', 2),
('17/10/JC/004', 'SANDEEP KUMAR', 'M.C.A.', 2),
('17/10/JC/005', 'SUSHANT MAJI', 'M.C.A.', 2),
('17/10/JC/006', 'SANJEET BARA', 'M.C.A.', 2),
('17/10/JC/007', 'KASTURI SHARMA', 'M.C.A.', 2),
('17/10/JC/008', 'RIKU ROWNIER', 'M.C.A.', 2),
('17/10/JC/010', 'MALLIKA SINHA', 'M.C.A.', 2),
('17/10/JC/011', 'SUDIPTA MALLIK', 'M.C.A.', 2),
('17/10/JC/012', 'PAWAN KUMAR', 'M.C.A.', 2),
('17/10/JC/014', 'YAN AN WAN', 'M.C.A.', 2),
('17/10/JC/015', 'ANAND MOHAN SINGH', 'M.C.A.', 2),
('17/10/JC/016', 'DEEPENDRA SINGH', 'M.C.A.', 2),
('17/10/JC/017', 'KULDEEP RAJ TIWARY', 'M.C.A.', 2),
('17/10/JC/018', 'RAGHAV GUPTA', 'M.C.A.', 2),
('17/10/JC/019', 'NIKHAL GURJAR', 'M.C.A.', 2),
('17/10/JC/021', 'Rabindra', 'M.Tech', 2);

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `s_user_id` varchar(25) NOT NULL,
  `s_password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`s_user_id`, `s_password`) VALUES
('17/10/JC/002', 'gaurav56'),
('17/10/JC/007', 'kasturi123'),
('17/10/JC/021', 'rabindra_scs');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Sub_id` varchar(25) NOT NULL,
  `Sub_name` varchar(50) NOT NULL,
  `Sub_Sem` int(2) NOT NULL,
  `T_id` varchar(15) NOT NULL,
  `Course` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Sub_id`, `Sub_name`, `Sub_Sem`, `T_id`, `Course`) VALUES
('CS-101', 'Digital Logic', 1, 'ashutosh_scs', 'M.C.A.'),
('CS-102', 'Discrete Mathematics', 1, 'ramesh_scs', 'M.C.A.'),
('CS-107', 'Data Structures', 2, 'aditi_scs', 'M.C.A.'),
('CS-111', 'Database Management System', 2, 'ratnesh_scs', 'M.C.A.'),
('CS-113', 'Microprocessor', 2, 'ashutosh_scs', 'M.C.A.'),
('CS-119', 'Formal Languages and Automata Theory', 2, 'sushil_scs', 'M.C.A.'),
('CS-183', 'Data Structure Laboratory', 2, 'buddha_scs', 'M.C.A.');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `T_id` varchar(15) NOT NULL,
  `T_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`T_id`, `T_name`) VALUES
('aditi_scs', 'Dr. Aditi Sharan'),
('ashutosh_scs', 'Ashutosh Srivastav'),
('buddha_scs', 'Dr. Buddha Singh'),
('krishnan_scs', 'Dr. Krishnan Rajkumar'),
('MCA1', 'VINEETA SHARMA'),
('ramesh_scs', 'R.K. Aggarwal'),
('ratnesh_scs', 'Dr. Ratneshwar'),
('sushil_scs', 'Dr. Sushil Kumar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`a_user_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`Sub_id`,`Month`,`S_id`),
  ADD KEY `S_id` (`S_id`),
  ADD KEY `Month` (`Month`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `month_lecture`
--
ALTER TABLE `month_lecture`
  ADD PRIMARY KEY (`Month`,`Sub_id`),
  ADD KEY `subject_id` (`Sub_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`S_id`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`s_user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Sub_id`),
  ADD KEY `T_id` (`T_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`T_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Month` FOREIGN KEY (`Month`) REFERENCES `month_lecture` (`Month`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `S_id` FOREIGN KEY (`S_id`) REFERENCES `student` (`S_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sub_id` FOREIGN KEY (`Sub_id`) REFERENCES `subject` (`Sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `month_lecture`
--
ALTER TABLE `month_lecture`
  ADD CONSTRAINT `subject_id` FOREIGN KEY (`Sub_id`) REFERENCES `subject` (`Sub_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `T_id` FOREIGN KEY (`T_id`) REFERENCES `teacher` (`T_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
