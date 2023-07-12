-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2023 at 03:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_techup`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `technology` varchar(60) NOT NULL,
  `question` varchar(500) NOT NULL,
  `option_1` varchar(100) NOT NULL,
  `option_2` varchar(100) NOT NULL,
  `option_3` varchar(100) NOT NULL,
  `option_4` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `technology`, `question`, `option_1`, `option_2`, `option_3`, `option_4`, `answer`, `created`, `updated`) VALUES
(1, 'HTML', 'What does the abbreviation HTML stand for?', 'HyperText Markup Language.', 'HighText Markup Language.', 'HyperText Markdown Language.', 'None of the above.', 'HyperText Markup Language.', '2023-07-12 08:39:54', '2023-07-12 08:40:06'),
(2, 'HTML', 'How many sizes of headers are available in HTML by default?', '5', '1', '3', '6', '6', '2023-07-12 08:41:26', '2023-07-12 08:41:26'),
(3, 'HTML', 'What is the smallest header in HTML by default?', 'h1', 'h2', 'h6', 'h4', 'h6', '2023-07-12 08:41:26', '2023-07-12 08:41:26'),
(4, 'HTML', 'What are the types of lists available in HTML?', 'Ordered, Unordered Lists.', 'Bulleted, Numbered Lists.', 'Named, Unnamed Lists.', 'None of the above', 'Ordered, Unordered Lists.', '2023-07-12 08:43:04', '2023-07-12 09:28:50'),
(5, 'HTML', 'How to create an ordered list in HTML?', 'ul', 'ol', 'href', 'b', 'ol', '2023-07-12 08:43:04', '2023-07-12 09:31:41'),
(6, 'HTML', 'What is the select tag used for?', 'Creates a combo box.', 'Select some attributes and change their style.', 'Change text font.', 'None of the above', 'Creates a combo box.', '2023-07-12 09:46:27', '2023-07-12 09:46:27'),
(7, 'CSS', 'What is CSS?', 'CSS is a style sheet language', 'CSS is designed to separate the presentation and content, including layout, colors, and fonts', 'CSS is the language used to style the HTML documents', 'All of the mentioned', 'All of the mentioned', '2023-07-12 09:46:27', '2023-07-12 09:46:27'),
(8, 'CSS', 'Which of the following CSS selectors are used to specify a group of elements?', 'tag', 'id', 'class', 'both class and tag', 'class', '2023-07-12 09:49:06', '2023-07-12 09:49:06'),
(9, 'CSS', 'Which of the following CSS framework is used to create a responsive design?', 'django', 'rails', 'laravel', 'bootstrap', 'bootstrap', '2023-07-12 09:49:06', '2023-07-12 09:49:06'),
(10, 'CSS', 'Which of the following has introduced text, list, box, margin, border, color, and background properties?', 'HTML', 'PHP', 'Ajax', 'CSS', 'CSS', '2023-07-12 09:50:42', '2023-07-12 09:50:42'),
(11, 'CSS', 'Which of the following CSS property sets the opacity level for an element?', 'opacity', 'transparent', 'transparency', 'all of the mentioned', 'opacity', '2023-07-12 09:50:42', '2023-07-12 09:50:42'),
(12, 'Javascript', 'Among the given statements, which statement defines closures in JavaScript?', ' JavaScript is a function that is enclosed with references to its inner function scope', 'JavaScript is a function that is enclosed with references to its lexical environment', 'JavaScript is a function that is enclosed with the object to its inner function scope', 'None of the mentioned', 'JavaScript is a function that is enclosed with references to its lexical environment', '2023-07-12 09:54:07', '2023-07-12 09:55:29'),
(13, 'Javascript', 'Which of the following is correct about JavaScript?', 'JavaScript is an Object-Based language', 'JavaScript is Assembly-language\r\n', 'JavaScript is an Object-Oriented language', 'JavaScript is a High-level language', 'JavaScript is an Object-Based language', '2023-07-12 09:54:07', '2023-07-12 09:54:07'),
(14, 'Javascript', 'The behaviour of the instances present of a class inside a method is defined by', 'Method', 'Class', 'Interface', 'Classes and Interfaces', 'Class', '2023-07-12 09:58:01', '2023-07-12 12:17:19'),
(15, 'Javascript', 'The property of JSON() method is', 'it can be invoked manually as object.JSON()', 'it will be automatically invoked by the compiler', 'it is invoked automatically by the JSON.stringify() method', 'it cannot be invoked in any form', 'it is invoked automatically by the JSON.stringify() method', '2023-07-12 09:58:01', '2023-07-12 12:17:21'),
(16, 'Javascript', 'The keyword or the property that you use to refer to an object through which they were invoked is', 'from', 'to', 'this', 'object', 'this', '2023-07-12 09:58:01', '2023-07-12 12:17:22');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technology` varchar(60) NOT NULL,
  `score` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `created`, `updated`) VALUES
(1, 'test', '123456', '2023-07-12 07:16:42', '2023-07-12 13:48:30'),
(2, 'johnsmith', '123456', '2023-07-12 07:16:42', '2023-07-12 13:48:36'),
(3, 'test_user', '123456', '2023-07-12 07:16:42', '2023-07-12 13:48:41'),
(4, 'jkparekh', '123456', '2023-07-12 07:16:42', '2023-07-12 13:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `technology` varchar(60) NOT NULL,
  `question_number` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_answers`
--
ALTER TABLE `user_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
