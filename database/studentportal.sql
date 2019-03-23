-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 02:46 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE `admintbl` (
  `a_id` int(11) NOT NULL,
  `a_fullname` varchar(1000) NOT NULL,
  `a_username` varchar(1000) NOT NULL,
  `a_password` varchar(1000) NOT NULL,
  `a_email` varchar(1000) NOT NULL,
  `a_phone` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`a_id`, `a_fullname`, `a_username`, `a_password`, `a_email`, `a_phone`) VALUES
(1, 'Rishabh Singh', 'rishabh', '2019', 'rishabhsingh054@gmail.com', '9920368193');

-- --------------------------------------------------------

--
-- Table structure for table `channelstbl`
--

CREATE TABLE `channelstbl` (
  `ch_id` int(11) NOT NULL,
  `ch_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channelstbl`
--

INSERT INTO `channelstbl` (`ch_id`, `ch_name`) VALUES
(1, 'Java'),
(2, 'Mobile computing'),
(3, 'oomd'),
(4, 'oop');

-- --------------------------------------------------------

--
-- Table structure for table `commentstbl`
--

CREATE TABLE `commentstbl` (
  `cm_id` int(11) NOT NULL,
  `co_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `cm_desc` varchar(1000) NOT NULL,
  `cm_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentstbl`
--

INSERT INTO `commentstbl` (`cm_id`, `co_id`, `st_id`, `cm_desc`, `cm_date`) VALUES
(1, 3, 8, 'Sir can you please provide us block diagram of GSM arhitecture', '2019-03-07');

-- --------------------------------------------------------

--
-- Table structure for table `contentstbl`
--

CREATE TABLE `contentstbl` (
  `co_id` int(11) NOT NULL,
  `te_id` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `co_description` varchar(1000) NOT NULL,
  `co_url` varchar(1000) NOT NULL,
  `co_sem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contentstbl`
--

INSERT INTO `contentstbl` (`co_id`, `te_id`, `ch_id`, `co_description`, `co_url`, `co_sem`) VALUES
(1, 1, 1, 'Introduction to Java', './uploads/Java Programming Tutorial 1 - Introduction to Java.mp4', '6'),
(2, 1, 1, 'Installation and hello world', './uploads/Java Programming Tutorial 2 - Installation and Hello World.mp4', '6'),
(3, 3, 2, 'Introduction to Mobile computing', './uploads/Introduction to Mobile Computing 001.mp4', '6'),
(4, 3, 2, 'GSM architecture', './uploads/mco.gif', '6'),
(5, 1, 3, 'what is oomd?', './uploads/What is OBJECT-ORIENTED MODELING What does OBJECT-ORIENTED MODELING mean.mp4', '6'),
(6, 0, 4, 'abcd', './uploads/What is OBJECT-ORIENTED MODELING What does OBJECT-ORIENTED MODELING mean.mp4', '4');

-- --------------------------------------------------------

--
-- Table structure for table `coursetbl`
--

CREATE TABLE `coursetbl` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetbl`
--

INSERT INTO `coursetbl` (`c_id`, `c_name`) VALUES
(1, 'IF');

-- --------------------------------------------------------

--
-- Table structure for table `markstbl`
--

CREATE TABLE `markstbl` (
  `m_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `m_sem` int(11) NOT NULL,
  `m_sub1` float NOT NULL,
  `m_sub2` float NOT NULL,
  `m_sub3` float NOT NULL,
  `m_sub4` float NOT NULL,
  `m_sub5` float NOT NULL,
  `m_sub6` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `markstbl`
--

INSERT INTO `markstbl` (`m_id`, `st_id`, `m_sem`, `m_sub1`, `m_sub2`, `m_sub3`, `m_sub4`, `m_sub5`, `m_sub6`) VALUES
(2, 1, 5, 78, 80, 90, 76, 86, 86),
(4, 7, 6, 90, 89, 85, 97, 85, 91),
(5, 2, 5, 76, 86, 82, 76, 79, 92),
(6, 3, 5, 80, 82, 85, 90, 77, 73),
(7, 5, 5, 77, 76, 68, 86, 83, 79),
(8, 6, 5, 87, 79, 78, 79, 90, 91),
(9, 8, 5, 90, 85, 87, 92, 83, 70),
(10, 9, 5, 80, 89, 87, 81, 75, 76),
(11, 10, 5, 80, 82, 90, 75, 77, 79);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_result`
--

CREATE TABLE `mcq_result` (
  `st_id` int(255) NOT NULL,
  `tot_marks` int(255) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `out_off` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_result`
--

INSERT INTO `mcq_result` (`st_id`, `tot_marks`, `sname`, `out_off`) VALUES
(6, 1, 'Mohd umer qureshi', 2),
(8, 4, 'Kesha Mehta', 6);

-- --------------------------------------------------------

--
-- Table structure for table `mcq_test`
--

CREATE TABLE `mcq_test` (
  `mcq_id` int(11) NOT NULL,
  `que` varchar(500) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `ans` int(1) NOT NULL,
  `te_id` int(255) NOT NULL,
  `qu_marks` int(11) NOT NULL,
  `qu_time` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mcq_test`
--

INSERT INTO `mcq_test` (`mcq_id`, `que`, `option1`, `option2`, `option3`, `option4`, `ans`, `te_id`, `qu_marks`, `qu_time`) VALUES
(1, 'A process that involves recognizing and focusing on the important characteristics of a situation or object is known as:', 'Encapsulation ', 'Polymorphism', 'Abstraction', ' Inheritance', 3, 1, 1, 1),
(2, 'Which statement is true regarding an object?', ' An object is what classes instantiated are from ', 'An object is an instance of a class ', ' An object is a variable ', ' An object is a reference to an attribute', 2, 1, 0, 0),
(3, 'What is garbage collection in the context of Java?', ' The operating system periodically deletes all of the java files available on the system. ', 'The JVM checks the output of any Java program and deletes anything that doesnâ€™t make sense.', 'Any package imported in a program and not used is automatically deleted.', '  When all references to an object are gone, the memory used by the object is automatically reclaime', 4, 1, 0, 0),
(4, 'The concept of multiple inheritances is implemented in Java by  I. Extending two or more classes. II. Extending one class and implementing one or more interfaces. III. Implementing two or more interfaces.', ' Only (II) ', ' (I) and (II)', ' (II) and (III)', 'Only (I)', 1, 1, 0, 5),
(5, ' In Java, declaring a class abstract is useful', 'To prevent developers from further extending the class ', 'To force developers to extend the class not to use its capabilities', ' When default implementations of some methods are not desirable ', ' When it doesnâ€™t make sense to have objects of that class ', 4, 1, 1, 10),
(6, 'who created this module?', 'Pankaj', 'Anshu', 'Vishal', 'Rishabh', 4, 1, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `pt1`
--

CREATE TABLE `pt1` (
  `st_id` int(250) NOT NULL,
  `sub1` int(3) NOT NULL,
  `sub2` int(3) NOT NULL,
  `sub3` int(3) NOT NULL,
  `sub4` int(3) NOT NULL,
  `sub5` int(3) NOT NULL,
  `sub6` int(3) NOT NULL,
  `st_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pt1`
--

INSERT INTO `pt1` (`st_id`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `st_name`) VALUES
(1, 15, 12, 23, 24, 21, 20, 'Nisarg Upadhyay'),
(2, 23, 24, 25, 25, 21, 19, 'Shudhanshu Desai'),
(3, 12, 21, 21, 20, 24, 18, 'Pratik Mishra'),
(4, 11, 10, 6, 15, 22, 23, 'Omkar Mahadik'),
(5, 21, 22, 23, 17, 16, 19, 'Riya Dagli'),
(6, 13, 14, 23, 21, 21, 20, 'Mohd umer qureshi'),
(7, 25, 23, 24, 25, 25, 25, 'Srikant Kamath'),
(8, 23, 21, 22, 21, 21, 20, 'Kesha Mehta'),
(9, 21, 22, 25, 19, 18, 21, 'Muskaaan shaikh'),
(10, 21, 20, 23, 24, 21, 16, 'Sonal Holankar');

-- --------------------------------------------------------

--
-- Table structure for table `pt2`
--

CREATE TABLE `pt2` (
  `st_id` int(250) NOT NULL,
  `sub1` int(3) NOT NULL,
  `sub2` int(3) NOT NULL,
  `sub3` int(3) NOT NULL,
  `sub4` int(3) NOT NULL,
  `sub5` int(3) NOT NULL,
  `sub6` int(3) NOT NULL,
  `st_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pt2`
--

INSERT INTO `pt2` (`st_id`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `st_name`) VALUES
(1, 0, 0, 0, 0, 0, 0, 'Nisarg Upadhyay'),
(2, 0, 0, 0, 0, 0, 0, 'Shudhanshu Desai'),
(3, 0, 0, 0, 0, 0, 0, 'Pratik Mishra'),
(4, 0, 0, 0, 0, 0, 0, 'Omkar Mahadik'),
(5, 0, 0, 0, 0, 0, 0, 'Riya Dagli'),
(6, 0, 0, 0, 0, 0, 0, 'Mohd umer qureshi'),
(7, 0, 0, 0, 0, 0, 0, 'Srikant Kamath'),
(8, 0, 0, 0, 0, 0, 0, 'Kesha Mehta'),
(9, 0, 0, 0, 0, 0, 0, 'Muskaaan shaikh'),
(10, 0, 0, 0, 0, 0, 0, 'Sonal Holankar');

-- --------------------------------------------------------

--
-- Table structure for table `quesanstbl`
--

CREATE TABLE `quesanstbl` (
  `q_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL,
  `te_id` int(11) NOT NULL,
  `q_question` varchar(1000) NOT NULL,
  `q_answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quesanstbl`
--

INSERT INTO `quesanstbl` (`q_id`, `st_id`, `te_id`, `q_question`, `q_answer`) VALUES
(1, 8, 0, 'when is the last date for submission of mco file?', '2'),
(2, 7, 0, 'When is PT exam starting from?', '19 20 and 22'),
(3, 2, 0, 'when is the technofest?', '12'),
(4, 8, 0, 'who invented c', ''),
(5, 6, 0, 'when I will get my result?', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentstbl`
--

CREATE TABLE `studentstbl` (
  `st_id` int(11) NOT NULL,
  `st_fullname` varchar(1000) NOT NULL,
  `st_username` varchar(1000) NOT NULL,
  `st_password` varchar(1000) NOT NULL,
  `st_age` varchar(1000) NOT NULL,
  `st_gender` varchar(1000) NOT NULL,
  `st_dob` date NOT NULL,
  `st_email` varchar(1000) NOT NULL,
  `st_mobile1` varchar(100) NOT NULL,
  `st_mobile2` varchar(100) NOT NULL,
  `st_address` varchar(1000) NOT NULL,
  `st_pincode` varchar(1000) NOT NULL,
  `st_course` varchar(1000) NOT NULL,
  `st_sem` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentstbl`
--

INSERT INTO `studentstbl` (`st_id`, `st_fullname`, `st_username`, `st_password`, `st_age`, `st_gender`, `st_dob`, `st_email`, `st_mobile1`, `st_mobile2`, `st_address`, `st_pincode`, `st_course`, `st_sem`) VALUES
(1, 'Nisarg Upadhyay', 'TÏß¸m*ü…±ZÎMÆL/ßü0°D¼‚LSŠö!ê', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '19', 'Male', '2000-01-04', 'upadhyaynisarg@gmail.com', '9821441606', '', '', '', '1', '6'),
(2, 'Shudhanshu Desai', '´ÖzŒ;=:­ˆq¥9õ÷Z‰ìÏ’¹V	x£¤„•á', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Male', '2000-10-10', 'desaishudhandhu@gmail.com', '8080932754', '', '', '', '1', '6'),
(3, 'Pratik Mishra', 'ámð-C¥ëÂf¯ê!/HB\rØõÛºü—Y$nV', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Male', '2000-06-09', 'mishrapratik@gmail.com', '9324198833', '', '', '', '1', '6'),
(4, 'Omkar Mahadik', '×``ÞÌ¾~ª !þÊÁBÏL\\ww±É¶ŒUS‰î­J', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Male', '2000-06-25', 'mahadikomkar@gmail.com', '8879008519', '', '', '', '1', '6'),
(5, 'Riya Dagli', 'ÁöÞ°æ÷ðÜ\n‚ŠÁÏGºjŸ!˜ë”yëjƒZ', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Female', '2000-05-24', 'dagliriya@gmail.com', '9892155230', '', '', '', '1', '6'),
(6, 'Mohd umer qureshi', '­5ù0!j·ôù\nS£„&t«¿¯ÁŒB²Ì€÷•µ7Ù¬', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Male', '2000-03-03', 'quershiumer@gmail.com', '8097777787', '', '', '', '1', '6'),
(7, 'Srikant Kamath', '®\n\Z‘0óK;|Æ‡´I¸Uv;ÚÅRš_veWg=', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Male', '2000-12-04', 'kamathsrikant@gmail.com', '9867248860', '', '', '', '1', '6'),
(8, 'Kesha Mehta', 'X6]ˆß\rÂÉó½8ÖŠO+‡Þ¡-Èo=C-ìÔÚØ', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Female', '2000-12-13', 'krmehta989@gmail.com', '9819984845', '', '', '', '1', '6'),
(9, 'Muskaaan shaikh', 'Ëœ4–¬¡Ú\ZÝ]ˆ²[¿ÿ†ÊÁ/a‚@³r`', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Female', '2000-03-13', 'shaikhmuskaan@gmai.com', '9967860825', '', '', '', '1', '6'),
(10, 'Sonal Holankar', 'tÃËw¶{‰]¿¬«¼Z3S•½„—¹r´éÜ•yVËcð˜', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '18', 'Female', '2000-05-12', 'holankarsonal@gmail.com', '9892688508', '', '', '', '1', '6');

-- --------------------------------------------------------

--
-- Table structure for table `teacherstbl`
--

CREATE TABLE `teacherstbl` (
  `te_id` int(11) NOT NULL,
  `te_fullname` varchar(1000) NOT NULL,
  `te_username` varchar(1000) NOT NULL,
  `te_password` varchar(1000) NOT NULL,
  `te_dob` date NOT NULL,
  `te_email` varchar(1000) NOT NULL,
  `te_mobile` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherstbl`
--

INSERT INTO `teacherstbl` (`te_id`, `te_fullname`, `te_username`, `te_password`, `te_dob`, `te_email`, `te_mobile`) VALUES
(1, 'Suwarna Thakre', '•w–z÷ƒËd+[Á}­Rû€xçùëŠ¶³\0(·Çz', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '1971-12-13', 'thakresuwarna@gmail.com', '9167356032'),
(2, 'Chintamani Chavan', '§gƒ¸®¼L–³²î}SØ=B[‚RêIFÑóQ¾§ä', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '1972-10-12', 'chavanchintamani@gmail.com', '8454922920'),
(3, 'Sumit Parmar', 'çÊ©-¾ÄÖI^¬ñí+ÍFö9Pä¡Si€AŠ‚òX', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '1970-12-12', 'parmarsumit@gmail.com', '8779626817'),
(4, 'Sonal Develekar', '¥%ôÎ*Ÿâr˜T­\'l4hÝo‰‘ÌŸ«‘o0î¾ç', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '1981-10-19', 'develakarsonal@gmail.com', '8108141555'),
(5, 'Pratiksha Parajapati', 'IíýA\\i®Î»’Óíò=š@ÕcS#hð¾…^Â=“/2', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '1980-07-31', 'prajapatipratiksha@gmail.com', '9876568765'),
(6, 'Jagruti Jadhav', 'Ót4rÖ×é0q´^úžèè)@ãp³]ñ¿·¿„', '–D	Â«G9¼‚üaEb«„§Þô\0_Ce}hÅ1ÂÎ…)t', '1979-10-03', 'jadhavjgruti@gmail.com', '7387266555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintbl`
--
ALTER TABLE `admintbl`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `channelstbl`
--
ALTER TABLE `channelstbl`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `commentstbl`
--
ALTER TABLE `commentstbl`
  ADD PRIMARY KEY (`cm_id`);

--
-- Indexes for table `contentstbl`
--
ALTER TABLE `contentstbl`
  ADD PRIMARY KEY (`co_id`);

--
-- Indexes for table `coursetbl`
--
ALTER TABLE `coursetbl`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `markstbl`
--
ALTER TABLE `markstbl`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `mcq_test`
--
ALTER TABLE `mcq_test`
  ADD PRIMARY KEY (`mcq_id`);

--
-- Indexes for table `quesanstbl`
--
ALTER TABLE `quesanstbl`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `studentstbl`
--
ALTER TABLE `studentstbl`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `teacherstbl`
--
ALTER TABLE `teacherstbl`
  ADD PRIMARY KEY (`te_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintbl`
--
ALTER TABLE `admintbl`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `channelstbl`
--
ALTER TABLE `channelstbl`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commentstbl`
--
ALTER TABLE `commentstbl`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contentstbl`
--
ALTER TABLE `contentstbl`
  MODIFY `co_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coursetbl`
--
ALTER TABLE `coursetbl`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `markstbl`
--
ALTER TABLE `markstbl`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mcq_test`
--
ALTER TABLE `mcq_test`
  MODIFY `mcq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quesanstbl`
--
ALTER TABLE `quesanstbl`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `studentstbl`
--
ALTER TABLE `studentstbl`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacherstbl`
--
ALTER TABLE `teacherstbl`
  MODIFY `te_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
