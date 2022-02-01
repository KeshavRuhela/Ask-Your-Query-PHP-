-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 05:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forums`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_query`
--

CREATE TABLE `add_query` (
  `Sno` int(11) NOT NULL,
  `query_title` varchar(300) NOT NULL,
  `query_desc` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `query_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_query`
--

INSERT INTO `add_query` (`Sno`, `query_title`, `query_desc`, `category_id`, `user_id`, `query_time`) VALUES
(1, 'How to install jdk', 'I am unable to install java.', 6, 1, '2021-09-25 15:56:29'),
(2, 'How to Update java console', 'pls help me.', 6, 1, '2021-09-25 15:57:14'),
(3, 'Tell me what is the command of print', 'pls help me.', 1, 1, '2021-09-25 16:12:10'),
(9, 'How to insert a CSS seprate file in HTML ', 'I write a code in same file is not conviniant to manage . Pls help me . . . . . . . .', 2, 1, '2021-09-25 20:23:24'),
(10, ' How to insert a CSS seprate file in HTML', 'pls help me.', 2, 1, '2021-09-25 22:02:41'),
(11, 'How to set Opacity', 'pls help me.', 3, 1, '2021-09-25 22:41:05'),
(12, 'what is a syntax of eventlistner', 'pls help me.', 3, 3, '2021-09-25 22:44:41'),
(13, 'explain me to hover function in css', 'pls help me.', 2, 3, '2021-09-25 22:47:59'),
(14, 'explain me toonclick function in java script', 'pls help me.', 3, 3, '2021-09-26 12:44:21'),
(15, 'how to fetch APi', 'pls help me.', 6, 3, '2021-09-26 12:49:05'),
(16, 'what is a syntax of for loop in C', 'I have an error Occour. help me', 4, 7, '2021-09-26 15:25:16'),
(17, 'good web site', 'good web site', 2, 1, '2021-09-27 13:11:00'),
(18, 'what is syntax.', 'heelp me', 3, 1, '2021-09-27 13:23:13'),
(20, 'what is syntax', 'j', 1, 1, '2021-09-28 18:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`) VALUES
(1, 'HTML', 'The Hyper Text Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.'),
(2, 'CSS', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.'),
(3, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.'),
(4, 'C Programing', 'C is a general-purpose, procedural computer programming language supporting structured programming, lexical variable scope, and recursion, with a static type system. By design, C provides constructs that map efficiently to typical machine instructions.'),
(5, 'C++ Programing', 'C++ is a general-purpose programming language created by Bjarne Stroustrup as an extension of the C programming language, or \"C with Classes\".'),
(6, 'JAVA Programming', 'Java is a high-level, class-based, object-oriented programming language that is designed to have as few implementation dependencies as possible.'),
(7, 'PYTHON', 'Python is an interpreted high-level general-purpose programming language. Its design philosophy emphasizes code readability with its use of significant indentation. Its language constructs as well as its object-oriented approach aim to help programmers write clear, logical code for small and large-scale projects.'),
(8, 'AngularJS', 'AngularJS is a JavaScript-based open-source front-end web framework for developing single-page applications. It is maintained mainly by Google and a community of individuals and corporations'),
(9, 'REACT', 'React is a free and open-source front-end JavaScript library for building user interfaces or UI components. It is maintained by Facebook and a community of individual developers and companies. React can be used as a base in the development of single-page or mobile applications.'),
(10, 'IONIC Framework', 'Ionic apps are built using the languages of the web: HTML, CSS, and JavaScript. Thus, if you know how to build a basic web app, you already know how to build with Ionic. With Ionic, you can deploy a native iOS or Android app, native desktop app, or web app, all from a single, shared codebase.');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `R_sno` int(11) NOT NULL,
  `reply` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `R_user_id` int(11) NOT NULL,
  `R_user_name` varchar(60) NOT NULL,
  `reply_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`R_sno`, `reply`, `category_id`, `R_user_id`, `R_user_name`, `reply_datetime`) VALUES
(5, 'you can create this like\r\n\r\nonclick(\"function_name()\") // in html content\r\n\r\nand make a function in JavaScript\r\n\r\nfunction function_name (){\r\n    // function body\r\n}\r\n\r\nit execute when u click on onclick function.', 14, 3, 'k', '2021-09-26 13:06:48'),
(7, 'Its syntax is :\r\n          for (initilagation; condition; increment/decrement ){\r\n               //   body of  loop\r\n           }\r\nExample is :\r\n           int i ;\r\n           for (i=0; i<=4; i++){\r\n                 printf(\"%d. Hello World ! \",i);\r\n           }', 16, 1, 'keshav ruhela', '2021-09-26 15:30:55'),
(8, 'absolutely right.', 17, 1, 'keshav ruhela', '2021-09-27 13:21:03'),
(11, '? ? ? ❤', 19, 1, 'keshav ruhela', '2021-09-27 16:08:58'),
(12, '&lt;html&gt;&lt;/html&gt;', 19, 1, 'keshav ruhela', '2021-09-27 16:15:41'),
(13, '&lt;html&gt;&lt;html&gt;', 20, 1, 'keshav ruhela', '2021-09-28 18:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` int(11) NOT NULL,
  `datetime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `user_name`, `email`, `password`, `address`, `city`, `state`, `zip`, `datetime`) VALUES
(1, 'keshav ruhela', 'rohela.poonam@gmail.com', '$2y$10$axx7bQR4voQ/TRcWQTS2nOq7Ci636Oj3305CQCWJ6VGLr8xX5eN1y', 'nadhi road near bhadur petrol pump jaspur udham Singh Nagar', 'jaspur', 'Uttarakhand', 244712, 0),
(3, 'k', 'rohela.pramod@gmail.com', '$2y$10$sx1naoNhzQQqfO06.XXqUeBRi389I83DT9yBusMP6zTfEJ.Rit5Yy', 'nadhi road near bhadur petrol pump jaspur', 'uttrakhand', 'Haryana', 244712, 0),
(7, 'Pramod', 'pramod.rohela@gmail.com', '$2y$10$B4wiyEm.cjmW3hm7ylq/2OcujlzACWRm5as0445aRpNGY.NFB7aBO', 'nadhi road near bhadur petrol pump jaspur udham Singh Nagar', 'kashipur', 'Uttarakhand', 244714, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_query`
--
ALTER TABLE `add_query`
  ADD PRIMARY KEY (`Sno`),
  ADD UNIQUE KEY `query_title` (`query_title`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`R_sno`),
  ADD UNIQUE KEY `reply` (`reply`) USING HASH;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_query`
--
ALTER TABLE `add_query`
  MODIFY `Sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `R_sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
