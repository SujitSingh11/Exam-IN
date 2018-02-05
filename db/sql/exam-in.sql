-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2018 at 03:36 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam-in`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` smallint(100) NOT NULL,
  `user_id` smallint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `cid` smallint(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` smallint(100) NOT NULL,
  `user_id` smallint(100) NOT NULL,
  `specialization` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `user_id`, `specialization`, `qualification`) VALUES
(1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stud_id` smallint(100) NOT NULL,
  `user_id` smallint(100) NOT NULL,
  `interest` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stud_id`, `user_id`, `interest`) VALUES
(1, 1, ''),
(4, 7, ''),
(5, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `test_attempted`
--

CREATE TABLE `test_attempted` (
  `attempt_id` smallint(6) NOT NULL,
  `result_id` smallint(50) NOT NULL,
  `question_id` smallint(50) NOT NULL,
  `answer` tinyint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_attempted`
--

INSERT INTO `test_attempted` (`attempt_id`, `result_id`, `question_id`, `answer`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 3),
(3, 1, 3, 1),
(4, 1, 4, 2),
(5, 1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `test_bank`
--

CREATE TABLE `test_bank` (
  `test_id` smallint(100) NOT NULL,
  `staff_id` smallint(100) NOT NULL,
  `test_name` varchar(50) NOT NULL,
  `test_stream` varchar(50) NOT NULL,
  `test_subject` varchar(50) NOT NULL,
  `number_of_questions` int(30) NOT NULL,
  `neg_marks` tinyint(5) DEFAULT NULL,
  `test_time` tinyint(100) DEFAULT NULL,
  `test_visibility` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_bank`
--

INSERT INTO `test_bank` (`test_id`, `staff_id`, `test_name`, `test_stream`, `test_subject`, `number_of_questions`, `neg_marks`, `test_time`, `test_visibility`) VALUES
(7, 1, 'Class-Test 4', 'MCA-CET', 'Computer Awareness', 5, 1, 60, 0),
(8, 1, 'Tutorial Test 1', 'MBA-CET', 'Computer Awareness', 4, 2, 40, 0);

-- --------------------------------------------------------

--
-- Table structure for table `test_questions`
--

CREATE TABLE `test_questions` (
  `question_id` tinyint(4) NOT NULL,
  `test_id` tinyint(100) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `correct_option` tinyint(5) NOT NULL,
  `marks` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_questions`
--

INSERT INTO `test_questions` (`question_id`, `test_id`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_option`, `marks`) VALUES
(1, 7, 'asdasdasd', 'asdasd', 'asdasd', 'asdasdsd', 'asdasdasd', 1, 5),
(2, 7, 'asdasd', 'sadasd', 'dasdsd', 'dassdaasd', 'dxzsadaws', 3, 3),
(3, 7, 'khgjh', 'gj', 'hg', 'jhgj', 'hgjhjhg', 1, 4),
(4, 7, 'sdfdsfdsf', 'qsdfsdfsd', 'sdfsdfsd', 'sdfsdfsdf', 'dsfsdfsd', 4, 2),
(5, 7, 'sfsdfsdf', 'sdfsdfsfsgfd', 'fgdfhgsdf', 'ssfdhdfg', 'FDGDFGD', 2, 5),
(6, 8, 'asdasdsads', 'asdsadsadasd', 'sdfsdfsdfsdf', 'sdfsdsdgdfbvcb', 'cxbvncvnvn', 3, 3),
(7, 8, 'asdasdas ddscxzvxcbv', 'bvcvcnvbcbvcb', ' sadas cxcvcxbvas', 'dgfsfdgdfgcxbcv', 'zzzxcxv dsgdfg', 3, 4),
(8, 8, 'asda Sd sadfvdsv', 'SAdASd sadxzc', 'asdasgfsdv', 'dsfsdfsdf', 'asdasfsdvsdv', 1, 5),
(9, 8, 'ASdsac', 'asdasc sad', 'asdascsa ', 'asd asczxcas', 'asdsacsa', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `test_result`
--

CREATE TABLE `test_result` (
  `result_id` smallint(6) NOT NULL,
  `stud_id` smallint(50) NOT NULL,
  `test_id` smallint(50) NOT NULL,
  `attempted` tinyint(50) NOT NULL,
  `not_attempted` tinyint(50) NOT NULL,
  `right_answers` tinyint(50) NOT NULL,
  `wrong_answers` tinyint(50) NOT NULL,
  `marks_obtained` tinyint(100) NOT NULL,
  `total_marks` tinyint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test_result`
--

INSERT INTO `test_result` (`result_id`, `stud_id`, `test_id`, `attempted`, `not_attempted`, `right_answers`, `wrong_answers`, `marks_obtained`, `total_marks`) VALUES
(1, 1, 7, 5, 0, 3, 2, 12, 19);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` smallint(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `user_type` tinyint(5) NOT NULL,
  `active` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`, `hash`, `user_type`, `active`) VALUES
(1, 'Sujit', 'Singh', 'Baby-Dev', 'sujitkumarsingh29@gmail.com', '$2y$10$q5z.36t.Ntri4/utOh4EBeij8OLaumNANYxYAkTdsqeq.KfR1.1vi', '19f3cd308f1455b3fa09a282e0d496f4', 2, 1),
(2, 'Shubham', 'Shripurkar', 'Bumquest', 'shirpurkar.shubham@gmail.com', '$2y$10$DWBo6pSsAIWwGRlFvIYUDO6mLGChMRigvtMyA.CnG2Hl1b3MROYve', '7dcd340d84f762eba80aa538b0c527f7', 1, 0),
(7, 'Parth', 'Ladda', 'Parth001', 'path.ladda@gmail.com', '$2y$10$g8hFONlmBTi/5AYGiw.VOuXMDiY3AwC8Id9xDNwc.b62wW4bm3Pg.', 'e5f6ad6ce374177eef023bf5d0c018b6', 2, 0),
(9, 'Sneha', 'Joglekar', 'snehaj', 'snehajoglekar123@gmail.com', '$2y$10$mAskjcEBp2lQTWe0dhih1epUBddThkQEiYC.JklcsJ3Rc0XxehF76', '1ff8a7b5dc7a7d1f0ed65aaa29c04b1e', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `test_attempted`
--
ALTER TABLE `test_attempted`
  ADD PRIMARY KEY (`attempt_id`);

--
-- Indexes for table `test_bank`
--
ALTER TABLE `test_bank`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `test_questions`
--
ALTER TABLE `test_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `test_result`
--
ALTER TABLE `test_result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` smallint(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `cid` smallint(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` smallint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stud_id` smallint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_attempted`
--
ALTER TABLE `test_attempted`
  MODIFY `attempt_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_bank`
--
ALTER TABLE `test_bank`
  MODIFY `test_id` smallint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `test_questions`
--
ALTER TABLE `test_questions`
  MODIFY `question_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test_result`
--
ALTER TABLE `test_result`
  MODIFY `result_id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` smallint(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
