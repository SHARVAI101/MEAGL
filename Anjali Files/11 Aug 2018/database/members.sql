-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2018 at 09:14 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members`
--

-- --------------------------------------------------------

--
-- Table structure for table `answerlikestable`
--

CREATE TABLE `answerlikestable` (
  `id` int(11) NOT NULL,
  `answerId` int(11) NOT NULL,
  `likedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `answerrepliestable`
--

CREATE TABLE `answerrepliestable` (
  `id` int(11) NOT NULL,
  `replyToAnswerId` int(11) NOT NULL,
  `replyByUserId` int(11) NOT NULL,
  `replyByUsername` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL,
  `reply` mediumtext NOT NULL,
  `replyMemeDestination` varchar(10000) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerrepliestable`
--

INSERT INTO `answerrepliestable` (`id`, `replyToAnswerId`, `replyByUserId`, `replyByUsername`, `likes`, `reply`, `replyMemeDestination`, `datetime`) VALUES
(41, 69, 1, 'sharvai', 0, 'asc', '', '2017-08-02 00:20:05'),
(42, 70, 1, 'sharvai', 0, 'dw', '', '2017-08-02 01:01:47'),
(43, 72, 1, 'sharvai', 0, 'fee', '', '2017-08-02 10:41:56'),
(44, 70, 1, 'sharvai', 0, 'asdwd', '', '2017-08-02 10:48:26'),
(45, 72, 1, 'sharvai', 0, 'asas', '', '2017-08-02 10:51:23'),
(46, 72, 1, 'sharvai', 0, 'vvve', '', '2017-08-02 10:51:23'),
(48, 72, 1, 'sharvai', 0, 'asdwwq', '', '2017-08-02 10:52:40'),
(49, 72, 1, 'sharvai', 0, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:53:49'),
(50, 70, 1, 'sharvai', 0, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:54:58'),
(51, 69, 1, 'sharvai', 0, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:55:41'),
(52, 73, 1, 'sharvai', 0, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:57:48'),
(53, 73, 1, 'sharvai', 0, '<img src=http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:57:48'),
(54, 73, 1, 'sharvai', 0, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:58:28'),
(55, 73, 1, 'sharvai', 0, '<img src=http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:58:28'),
(56, 80, 1, 'sharvai', 0, 'iii', '', '2017-08-02 11:37:57'),
(57, 80, 1, 'sharvai', 0, 'nbh', '', '2017-08-02 11:38:13'),
(58, 81, 1, 'sharvai', 0, 'vreve', '', '2017-08-02 15:53:55'),
(60, 84, 1, 'sharvai', 0, 'as', '', '2017-08-02 19:26:44'),
(61, 85, 1, 'sharvai', 0, 'cas', '', '2017-08-02 19:30:15'),
(62, 83, 1, 'sharvai', 0, 'awdaw', '', '2017-08-02 19:30:01'),
(64, 87, 1, 'sharvai', 0, 'vas', '', '2017-08-02 23:50:14'),
(65, 81, 1, 'sharvai', 0, 'aas', '', '2017-08-03 00:09:18'),
(66, 81, 1, 'sharvai', 0, 'casc', '', '2017-08-03 00:13:22'),
(70, 81, 1, 'sharvai', 0, 'mo', '', '2017-08-03 01:43:00'),
(72, 107, 1, 'sharvai', 0, 'dasdsa', '', '2017-08-04 19:49:33'),
(73, 106, 3, 'elon', 15, 'da', '', '2017-08-04 19:56:15'),
(74, 111, 1, 'sharvai', 0, 'lkl', '', '2017-08-05 14:19:55'),
(75, 117, 1, 'sharvai', 0, 'cas', '', '2017-08-05 14:41:29'),
(76, 117, 1, 'sharvai', 0, 'cascas', '', '2017-08-05 14:41:29'),
(77, 117, 1, 'sharvai', 0, 'qqq', '', '2017-08-05 14:41:29'),
(88, 125, 1, 'sharvai', 0, 'fefe', '', '2017-09-09 23:08:13'),
(89, 129, 1, 'sharvai', 0, 'rewee', 'users/sharvai/answerReplyMemes/answerId=129answerreplyId=89.jpg', '2017-09-09 23:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `answerreplylikestable`
--

CREATE TABLE `answerreplylikestable` (
  `id` int(11) NOT NULL,
  `replyId` int(11) NOT NULL,
  `likedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerreplylikestable`
--

INSERT INTO `answerreplylikestable` (`id`, `replyId`, `likedByUserId`) VALUES
(1, 32, 3),
(3, 34, 3),
(21, 73, 1);

-- --------------------------------------------------------

--
-- Table structure for table `answerstable`
--

CREATE TABLE `answerstable` (
  `id` int(11) NOT NULL,
  `answerForQuestionId` int(11) NOT NULL,
  `answerByUserId` int(11) NOT NULL,
  `answerByUserName` varchar(1000) NOT NULL,
  `likes` int(11) NOT NULL,
  `numberOfReplies` int(11) NOT NULL,
  `answer` text NOT NULL,
  `answerMemeDestination` varchar(10000) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answerstable`
--

INSERT INTO `answerstable` (`id`, `answerForQuestionId`, `answerByUserId`, `answerByUserName`, `likes`, `numberOfReplies`, `answer`, `answerMemeDestination`, `datetime`) VALUES
(62, 13, 1, 'sharvai', 0, 0, 'Heres the answer', 'users/sharvai/answerMemes/questionId=13answerId=62.jpg', '2017-07-25 20:45:09'),
(63, 13, 1, 'sharvai', 0, 0, 'sas', '', '2017-07-25 20:45:57'),
(64, 13, 1, 'sharvai', 0, 0, 'cascasc', '', '2017-07-25 20:55:24'),
(67, 14, 1, 'sharvai', 0, 0, 'rt', '', '2017-08-02 00:04:43'),
(68, 14, 1, 'sharvai', 0, 0, 'asd', '', '2017-08-02 00:07:34'),
(69, 14, 1, 'sharvai', 0, 2, 'ads', '', '2017-08-02 00:07:34'),
(70, 14, 1, 'sharvai', 0, 3, 'ss', '', '2017-08-02 01:01:41'),
(71, 14, 1, 'sharvai', 0, 0, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 01:01:59'),
(72, 14, 1, 'sharvai', 0, 5, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 09:40:42'),
(73, 14, 1, 'sharvai', 0, 4, '<img src="http://cdn.history.com/sites/2/2015/04/hith-6-things-you-should-know-about-napoleon-E.jpeg" style="height:300px;width:300px"></img><br>', '', '2017-08-02 10:55:41'),
(74, 14, 1, 'sharvai', 0, 0, '<a href="meagl.com">meagllll</a><br>', '', '2017-08-02 11:02:44'),
(75, 14, 1, 'sharvai', 0, 0, '<a href="www.google.com">g</a><br>', '', '2017-08-02 11:02:44'),
(76, 14, 1, 'sharvai', 0, 0, '<a href="www.google.com">gg</a><br>', '', '2017-08-02 11:14:38'),
(77, 14, 1, 'sharvai', 0, 0, 'asda', '', '2017-08-02 11:20:05'),
(78, 14, 1, 'sharvai', 0, 0, 'ffyyf', '', '2017-08-02 11:25:52'),
(79, 14, 1, 'sharvai', 0, 0, 'ewewew', '', '2017-08-02 11:30:44'),
(80, 14, 1, 'sharvai', 0, 2, 'bb', '', '2017-08-02 11:31:57'),
(81, 22, 1, 'sharvai', 0, 4, 'reeear', '', '2017-08-02 15:53:47'),
(83, 14, 1, 'sharvai', 0, 1, 'acscs', '', '2017-08-02 19:20:06'),
(84, 14, 1, 'sharvai', 0, 1, 'ascd', '', '2017-08-02 19:26:30'),
(85, 14, 1, 'sharvai', 0, 1, 'qwdqwd', '', '2017-08-02 19:30:01'),
(86, 14, 1, 'sharvai', 0, 0, 'casca', '', '2017-08-02 19:30:01'),
(87, 22, 1, 'sharvai', 0, 1, 'sb', '', '2017-08-02 23:49:45'),
(90, 22, 1, 'sharvai', 0, 0, 'cascasc', '', '2017-08-03 00:12:27'),
(91, 22, 1, 'sharvai', 0, 0, 'asdwd', '', '2017-08-03 00:13:22'),
(95, 22, 1, 'sharvai', 0, 0, 'casc', '', '2017-08-03 00:25:13'),
(98, 22, 1, 'sharvai', 0, 0, 'fff', '', '2017-08-03 00:45:11'),
(99, 22, 1, 'sharvai', 0, 0, 'qfwfq', '', '2017-08-03 00:50:07'),
(103, 22, 1, 'sharvai', 0, 0, 'gsdgdsg', '', '2017-08-03 01:43:00'),
(104, 22, 1, 'sharvai', 0, 0, 'ndndfn', '', '2017-08-03 02:06:52'),
(106, 22, 1, 'sharvai', 0, 1, 'dwa', '', '2017-08-04 19:47:07'),
(107, 12, 1, 'sharvai', 0, 1, 'cassac', '', '2017-08-04 19:49:30'),
(108, 12, 1, 'sharvai', 0, 0, '', 'users/sharvai/answerMemes/questionId=12answerId=108.jpg', '2017-08-04 19:49:59'),
(110, 22, 1, 'sharvai', 0, 0, 'sharvai', '', '2017-08-05 14:16:57'),
(111, 22, 1, 'sharvai', 0, 1, 'kaka', '', '2017-08-05 14:19:42'),
(112, 22, 1, 'sharvai', 0, 0, 'vadv', '', '2017-08-05 14:33:53'),
(113, 22, 1, 'sharvai', 0, 0, 'casc', '', '2017-08-05 14:35:27'),
(114, 22, 1, 'sharvai', 0, 0, 'ff', '', '2017-08-05 14:36:36'),
(115, 22, 1, 'sharvai', 0, 0, 'sadasd', '', '2017-08-05 14:38:05'),
(116, 22, 1, 'sharvai', 0, 0, 'casc', '', '2017-08-05 14:39:12'),
(117, 22, 1, 'sharvai', 0, 3, 'fefeef', '', '2017-08-05 14:40:16'),
(118, 22, 1, 'sharvai', 0, 0, 'casc', '', '2017-08-05 14:54:56'),
(119, 22, 1, 'sharvai', 0, 0, 'casc', '', '2017-08-05 14:56:05'),
(120, 22, 1, 'sharvai', 0, 0, 'csac', '', '2017-08-05 14:57:07'),
(121, 22, 1, 'sharvai', 0, 0, 'ascasc', '', '2017-08-05 15:00:09'),
(122, 22, 1, 'sharvai', 0, 0, 'csac', '', '2017-08-05 15:00:09'),
(123, 22, 1, 'sharvai', 0, 0, 'cascasc', 'users/sharvai/answerMemes/questionId=22answerId=123.jpg', '2017-08-05 15:01:38'),
(125, 21, 1, 'sharvai', 0, 1, 'qveeqvevq', '', '2017-08-06 01:31:40'),
(128, 25, 1, 'sharvai', 0, 0, 'momo', 'users/sharvai/answerMemes/questionId=25answerId=128.jpg', '2017-09-09 23:51:57'),
(129, 25, 1, 'sharvai', 0, 1, 'wrew', 'users/sharvai/answerMemes/questionId=25answerId=129.jpg', '2017-09-09 23:52:23');

-- --------------------------------------------------------

--
-- Table structure for table `celebmemessubscriberstable`
--

CREATE TABLE `celebmemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collegememessubscriberstable`
--

CREATE TABLE `collegememessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collegememessubscriberstable`
--

INSERT INTO `collegememessubscriberstable` (`id`, `subscribedByUserId`) VALUES
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comicmemessubscriberstable`
--

CREATE TABLE `comicmemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `commentlikestable`
--

CREATE TABLE `commentlikestable` (
  `id` int(11) NOT NULL,
  `commentId` int(11) NOT NULL,
  `likedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentlikestable`
--

INSERT INTO `commentlikestable` (`id`, `commentId`, `likedByUserId`) VALUES
(4, 8, 1),
(6, 9, 3),
(7, 15, 5),
(9, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `commentstable`
--

CREATE TABLE `commentstable` (
  `id` int(11) NOT NULL,
  `commentForMemeId` int(11) NOT NULL,
  `commentByUserId` int(11) NOT NULL,
  `commentByUserName` mediumtext NOT NULL,
  `sharedWithWorld` int(11) NOT NULL,
  `sharedWithUserId` int(11) NOT NULL,
  `sharedWithGroupId` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `numberOfReplies` int(11) NOT NULL,
  `comment` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentstable`
--

INSERT INTO `commentstable` (`id`, `commentForMemeId`, `commentByUserId`, `commentByUserName`, `sharedWithWorld`, `sharedWithUserId`, `sharedWithGroupId`, `likes`, `numberOfReplies`, `comment`, `datetime`) VALUES
(1, 28, 1, 'sharvai', 0, 0, 1, 0, 0, 'world=0&uid=0&gid=1 comment', '2017-03-03 05:01:57'),
(2, 28, 1, 'sharvai', 0, 3, 0, 0, 1, 'elon pe', '2017-03-03 05:03:23'),
(3, 28, 1, 'sharvai', 1, 0, 0, 0, 0, 'world pe', '2017-03-03 05:03:56'),
(4, 28, 1, 'sharvai', 1, 0, 0, 0, 2, 'gtrgtr', '2017-03-03 05:03:56'),
(5, 28, 1, 'sharvai', 0, 0, 1, 0, 0, 'fasfas', '2017-03-03 05:22:34'),
(6, 29, 3, 'elon', 1, 0, 0, 0, 2, 'hey wasohhhhhhhhhhhhhhhhhhhhhhhhhhhsup\n', '2017-03-04 18:04:49'),
(7, 28, 3, 'elon', 0, 0, 1, 0, 0, 'hey hoews it going bros?!', '2017-03-25 13:18:43'),
(8, 28, 3, 'elon', 0, 0, 1, 1, 0, 'peeeewwwwdddddddeipppppppppppieee', '2017-03-25 13:21:21'),
(9, 29, 1, 'sharvai', 1, 0, 0, 1, 0, 'my name is sharvai heehehehehhehehehe', '2017-03-25 19:18:54'),
(10, 29, 3, 'elon', 1, 0, 0, 1, 0, 'cascasc', '2017-03-25 19:27:34'),
(11, 29, 3, 'elon', 1, 0, 0, 0, 0, 'cascascawaxxxxxxxxxxx', '2017-03-25 19:28:35'),
(12, 29, 3, 'elon', 1, 0, 0, 0, 0, 'bbbbbbbbeeee', '2017-03-25 19:28:53'),
(13, 18, 3, 'elon', 1, 0, 0, 0, 2, 'rrrrrrrrrrrrrrr', '2017-03-25 19:29:13'),
(15, 4, 1, 'sharvai', 1, 0, 0, 1, 1, 'hey yo gimme more ', '2017-03-25 21:17:08'),
(16, 29, 3, 'elon', 1, 0, 0, 0, 0, 'zxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '2017-03-26 01:25:19'),
(20, 10, 1, 'sharvai', 1, 0, 0, 0, 0, 'casc', '2017-05-05 20:13:08'),
(22, 29, 1, 'sharvai', 1, 0, 0, 0, 0, 'elon mne32342ne', '2017-07-05 17:01:52'),
(27, 29, 1, 'sharvai', 1, 0, 0, 0, 0, 'fdsakpofkdsapofpodsafpodskfpods dspomfpodsfpmm psdmfpohusdifiudsnf idusfifdsiofnnfiodsanfodisds', '2017-07-06 16:39:24'),
(30, 28, 3, 'elon', 1, 0, 0, 0, 0, 'heya', '2017-07-07 20:47:52'),
(31, 29, 1, 'sharvai', 1, 0, 0, 0, 0, 'gegege', '2017-07-07 20:55:02'),
(34, 47, 1, 'sharvai', 1, 0, 0, 0, 0, 'hfhfhfhi', '2017-07-09 19:45:57'),
(37, 49, 1, 'sharvai', 1, 0, 0, 0, 1, 'COnor MCGROROR', '2017-07-15 02:56:59'),
(38, 49, 1, 'sharvai', 1, 0, 0, 0, 0, 'floydd!!!', '2017-07-15 18:57:22'),
(39, 49, 1, 'sharvai', 1, 0, 0, 0, 4, 'af', '2017-07-15 19:16:01'),
(40, 49, 1, 'sharvai', 1, 0, 0, 0, 0, 'cqwc', '2017-07-15 19:32:38'),
(41, 49, 1, 'sharvai', 1, 0, 0, 0, 0, 'sac', '2017-07-15 19:41:41'),
(42, 14, 1, 'sharvai', 1, 0, 0, 0, 0, 'g thang', '2017-07-15 21:26:07'),
(43, 29, 1, 'sharvai', 1, 0, 0, 0, 1, 'HOLAAA', '2017-07-21 18:05:43'),
(44, 48, 1, 'sharvai', 1, 0, 0, 0, 5, 'efdfdsfsdaf\\nfdsafdsafdsaf\\ndfsafdsafeewer', '2017-07-21 19:29:49'),
(45, 29, 1, 'sharvai', 0, 1, 0, 0, 3, 'fehfeaidfsadf', '2017-07-21 19:36:09'),
(46, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'niokjihu jrbrjb rjrj rjrj eje&nbsp; eje', '2017-07-21 20:05:53'),
(47, 14, 1, 'sharvai', 1, 0, 0, 0, 0, 'dhhdhd', '2017-07-21 21:18:06'),
(49, 29, 1, 'sharvai', 0, 1, 0, 0, 4, 'helloeoeo', '2017-07-23 16:36:56'),
(50, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'reeew', '2017-07-23 16:40:26'),
(51, 50, 1, 'sharvai', 1, 0, 0, 0, 1, 'sharvai', '2017-07-23 19:08:48'),
(52, 55, 1, 'sharvai', 1, 0, 0, 0, 1, 'oh mah godddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2017-07-26 18:37:20'),
(53, 14, 59, 'qwerty', 1, 0, 0, 0, 0, 'Not now,I\\''m in a battle. Call you later.', '2017-07-28 19:19:32'),
(54, 47, 59, 'qwerty', 1, 0, 0, 0, 0, 'Keep them to yourself.Thanks. x', '2017-07-28 19:23:14'),
(55, 5, 59, 'qwerty', 1, 0, 0, 0, 0, 'hi elon,remember me??????', '2017-07-28 19:24:25'),
(56, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'hehehehrhri', '2017-07-30 22:17:10'),
(57, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'h', '2017-07-31 01:46:39'),
(58, 58, 1, 'sharvai', 0, 11, 0, 0, 0, 'dd', '2017-07-31 20:25:11'),
(59, 58, 1, 'sharvai', 0, 11, 0, 0, 0, 'dsds', '2017-07-31 20:25:25'),
(60, 58, 1, 'sharvai', 0, 11, 0, 0, 0, 'd', '2017-07-31 20:25:25'),
(61, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'dfgbn', '2017-08-02 15:37:46'),
(62, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'bbreww', '2017-08-02 15:38:22'),
(63, 29, 1, 'sharvai', 0, 1, 0, 0, 3, 'fch', '2017-08-02 15:38:42'),
(64, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'veda ahe tu', '2017-08-02 15:41:55'),
(65, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'sadsd\\nsdsd\\nsdsdve\\nvrv\\nvr', '2017-08-02 15:45:37'),
(66, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'asas', '2017-08-02 15:55:23'),
(67, 29, 1, 'sharvai', 0, 1, 0, 0, 4, 'sddds', '2017-08-02 15:55:41'),
(68, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'cascasc', '2017-08-02 16:07:21'),
(69, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'vggvrere', '2017-08-03 00:40:57'),
(71, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'bbbrbr', '2017-08-04 18:06:13'),
(72, 18, 3, 'elon', 0, 0, 2, 0, 1, 'hjkjn', '2017-08-04 19:08:51'),
(73, 29, 1, 'sharvai', 0, 1, 0, 0, 3, 'elon jj', '2017-08-05 11:26:00'),
(74, 87, 1, 'sharvai', 0, 38, 0, 0, 0, 'hhoho', '2017-09-03 02:09:07'),
(75, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'sharvai is this boy that hails from thane who is an utter piece of shit and a loser to the core boi ', '2017-09-03 15:37:54'),
(76, 29, 1, 'sharvai', 0, 1, 0, 0, 1, 'hiih jeiejei koko polo lolo', '2017-09-03 16:20:21'),
(78, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'Yhbmju hvb TV h ', '2017-09-04 20:56:20'),
(79, 97, 1, 'sharvai', 1, 0, 0, 0, 0, 'Like it?', '2017-09-06 23:29:16'),
(80, 29, 1, 'sharvai', 0, 1, 0, 0, 0, 'ðŸ˜‚ðŸ˜‚ðŸ˜‚ðŸ˜‚', '2017-09-09 00:02:57'),
(81, 94, 1, 'sharvai', 1, 0, 0, 0, 0, 'nko', '2017-09-09 23:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `english_meme_viewers`
--

CREATE TABLE `english_meme_viewers` (
  `id` int(11) NOT NULL,
  `viewerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `english_meme_viewers`
--

INSERT INTO `english_meme_viewers` (`id`, `viewerId`) VALUES
(5, 57),
(6, 58),
(8, 59),
(9, 4),
(11, 3),
(12, 60),
(13, 61),
(14, 62),
(15, 63),
(16, 64),
(17, 65),
(18, 66),
(19, 67),
(20, 68),
(21, 69),
(22, 70),
(23, 71),
(24, 72),
(25, 73),
(26, 74),
(27, 75),
(28, 1),
(29, 76),
(30, 77),
(31, 78),
(32, 79),
(33, 80),
(34, 80),
(35, 81),
(36, 82),
(37, 83);

-- --------------------------------------------------------

--
-- Table structure for table `friends_table`
--

CREATE TABLE `friends_table` (
  `id` int(11) NOT NULL,
  `sender_user_id` int(11) NOT NULL,
  `receiver_user_id` int(11) NOT NULL,
  `relation` int(11) NOT NULL,
  `lastActivityDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_table`
--

INSERT INTO `friends_table` (`id`, `sender_user_id`, `receiver_user_id`, `relation`, `lastActivityDateTime`) VALUES
(2, 2, 1, 1, '2017-07-26 19:17:06'),
(4, 3, 5, 1, '2017-02-15 19:31:45'),
(6, 11, 1, 1, '2017-07-31 20:25:25'),
(7, 53, 1, 1, '0000-00-00 00:00:00'),
(8, 10, 1, 1, '0000-00-00 00:00:00'),
(9, 1, 5, 1, '0000-00-00 00:00:00'),
(10, 1, 9, 0, '0000-00-00 00:00:00'),
(11, 1, 7, 0, '0000-00-00 00:00:00'),
(12, 1, 6, 0, '0000-00-00 00:00:00'),
(13, 1, 19, 0, '0000-00-00 00:00:00'),
(14, 1, 29, 0, '0000-00-00 00:00:00'),
(15, 1, 55, 0, '0000-00-00 00:00:00'),
(16, 1, 35, 0, '0000-00-00 00:00:00'),
(17, 1, 4, 1, '2018-02-11 02:00:33'),
(18, 1, 43, 0, '0000-00-00 00:00:00'),
(19, 1, 3, 1, '2017-08-06 11:16:13'),
(20, 3, 59, 1, '0000-00-00 00:00:00'),
(21, 4, 3, 0, '0000-00-00 00:00:00'),
(22, 1, 71, 0, '0000-00-00 00:00:00'),
(23, 38, 1, 1, '2018-01-11 21:32:22'),
(24, 40, 1, 1, '0000-00-00 00:00:00'),
(25, 1, 61, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gamingmemessubscriberstable`
--

CREATE TABLE `gamingmemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gamingmemessubscriberstable`
--

INSERT INTO `gamingmemessubscriberstable` (`id`, `subscribedByUserId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups_table`
--

CREATE TABLE `groups_table` (
  `id` int(11) NOT NULL,
  `groupCreatorId` int(11) NOT NULL,
  `groupname` varchar(20) NOT NULL,
  `numberOfParticipants` int(11) NOT NULL,
  `numberOfPendingInvitations` int(11) NOT NULL,
  `lastActivityDateTime` datetime NOT NULL,
  `dateOfCreation` date NOT NULL,
  `groupPicLocation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups_table`
--

INSERT INTO `groups_table` (`id`, `groupCreatorId`, `groupname`, `numberOfParticipants`, `numberOfPendingInvitations`, `lastActivityDateTime`, `dateOfCreation`, `groupPicLocation`) VALUES
(1, 1, 'Old Friends', 3, 5, '2018-02-11 02:56:45', '2017-02-12', 'groups/group1/groupPic/groupPic.jpg'),
(2, 5, 'meAndElon', -2, 0, '2017-08-04 19:08:51', '2017-02-16', 'defaults/groups_icon.png'),
(3, 1, 'meAndelon', -6, 0, '2017-07-26 19:23:02', '2017-03-04', 'defaults/groups_icon.png'),
(4, 1, 'pagal log', 1, 0, '2017-08-06 03:03:36', '2017-03-26', 'defaults/groups_icon.png'),
(5, 1, 'onceAndForALl', 2, 0, '2017-08-06 11:10:21', '2017-03-27', 'defaults/groups_icon.png'),
(6, 1, 'sleepyaf', 2, 0, '2017-08-06 11:02:00', '2017-03-27', 'defaults/groups_icon.png'),
(7, 1, 'gege', 2, 0, '2017-07-26 19:23:02', '2017-05-02', 'defaults/groups_icon.png'),
(8, 1, 'haha', 5, -1, '2017-07-26 19:23:02', '2017-06-15', 'defaults/groups_icon.png'),
(9, 1, 'MIERDA!!!!', 1, 0, '2017-07-26 19:17:06', '2017-07-07', 'defaults/groups_icon.png'),
(10, 1, 'FRANCEEE', 3, 1, '2017-07-07 15:30:32', '2017-07-07', 'defaults/groups_icon.png'),
(11, 1, 'jack boi', 1, 1, '2017-08-01 21:32:41', '2017-08-01', 'defaults/groups_icon.png'),
(12, 1, 'ma boi', 2, 1, '2017-08-04 22:49:12', '2017-08-04', 'defaults/groups_icon.png'),
(13, 1, 'aao re yaar', 3, 20, '2017-09-09 20:04:43', '2017-09-03', 'defaults/groups_icon.png'),
(14, 1, 'kopoko', 1, 1, '2017-09-09 23:12:47', '2017-09-09', 'defaults/groups_icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `group_participants_table`
--

CREATE TABLE `group_participants_table` (
  `id` int(11) NOT NULL,
  `participantId` int(11) NOT NULL,
  `participantStatus` int(11) NOT NULL,
  `inviterId` int(11) NOT NULL,
  `inviterUserName` varchar(125) NOT NULL,
  `groupId` int(11) NOT NULL,
  `groupname` varchar(20) NOT NULL,
  `invitationStatus` int(11) NOT NULL,
  `invitationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_participants_table`
--

INSERT INTO `group_participants_table` (`id`, `participantId`, `participantStatus`, `inviterId`, `inviterUserName`, `groupId`, `groupname`, `invitationStatus`, `invitationDate`) VALUES
(1, 1, 1, 1, 'self', 1, 'Old Friends', 1, '2017-02-12'),
(2, 3, 3, 1, 'sharvai', 1, 'Old Friends', 1, '2017-02-12'),
(3, 2, 0, 1, 'sharvai', 1, 'Old Friends', 1, '2017-02-12'),
(4, 5, 1, 5, 'self', 2, 'meAndElon', 1, '2017-02-16'),
(5, 3, 1, 5, 'dhrishty', 2, 'meAndElon', 1, '2017-02-16'),
(6, 1, 3, 1, 'self', 3, 'meAndelon', 1, '2017-03-04'),
(8, 1, 3, 1, 'self', 4, 'pagal log', 1, '2017-03-26'),
(9, 3, 1, 1, 'sharvai', 4, 'pagal log', 1, '2017-03-26'),
(10, 2, 0, 1, 'sharvai', 4, 'pagal log', 2, '2017-03-26'),
(11, 1, 1, 1, 'self', 5, 'onceAndForALl', 1, '2017-03-27'),
(12, 3, 3, 1, 'sharvai', 5, 'onceAndForALl', 1, '2017-03-27'),
(13, 2, 0, 1, 'sharvai', 5, 'onceAndForALl', 1, '2017-03-27'),
(14, 1, 1, 1, 'self', 6, 'sleepyaf', 1, '2017-03-27'),
(15, 3, 3, 1, 'sharvai', 6, 'sleepyaf', 1, '2017-03-27'),
(16, 2, 0, 1, 'sharvai', 6, 'sleepyaf', 1, '2017-03-27'),
(17, 1, 1, 1, 'self', 7, 'gege', 1, '2017-05-02'),
(18, 3, 0, 1, 'sharvai', 7, 'gege', 1, '2017-05-02'),
(19, 1, 1, 1, 'self', 8, 'haha', 1, '2017-06-15'),
(20, 3, 0, 1, 'sharvai', 8, 'haha', 1, '2017-06-15'),
(21, 2, 0, 1, 'sharvai', 8, 'haha', 1, '2017-06-15'),
(22, 11, 0, 1, 'sharvai', 8, 'haha', 0, '2017-06-15'),
(23, 1, 1, 1, 'self', 9, 'MIERDA!!!!', 1, '2017-07-07'),
(24, 1, 1, 1, 'self', 10, 'FRANCEEE', 1, '2017-07-07'),
(25, 4, 0, 1, 'sharvai', 10, 'FRANCEEE', 1, '2017-07-07'),
(26, 11, 0, 1, 'sharvai', 10, 'FRANCEEE', 0, '2017-07-07'),
(27, 3, 0, 1, 'sharvai', 10, 'FRANCEEE', 1, '2017-07-07'),
(28, 1, 1, 1, 'self', 11, 'jack boi', 1, '2017-08-01'),
(29, 2, 0, 1, 'sharvai', 11, 'jack boi', 0, '2017-08-01'),
(30, 3, 0, 1, 'sharvai', 1, 'Old Friends', 1, '2017-08-04'),
(31, 10, 0, 1, 'sharvai', 1, 'Old Friends', 0, '2017-08-04'),
(32, 1, 1, 1, 'self', 12, 'ma boi', 1, '2017-08-04'),
(33, 2, 0, 1, 'sharvai', 12, 'ma boi', 0, '2017-08-04'),
(34, 3, 1, 1, 'sharvai', 12, 'ma boi', 1, '2017-08-04'),
(35, 1, 1, 1, 'self', 13, 'aao re yaar', 1, '2017-09-03'),
(36, 3, 0, 1, 'sharvai', 13, 'aao re yaar', 0, '2017-09-03'),
(37, 2, 0, 1, 'sharvai', 13, 'aao re yaar', 0, '2017-09-03'),
(38, 4, 0, 1, 'sharvai', 1, 'Old Friends', 0, '2017-09-09'),
(39, 11, 0, 1, 'sharvai', 1, 'Old Friends', 0, '2017-09-09'),
(57, 10, 0, 1, 'sharvai', 13, 'aao re yaar', 0, '2017-09-09'),
(58, 4, 0, 1, 'sharvai', 13, 'aao re yaar', 0, '2017-09-09'),
(59, 38, 0, 1, 'sharvai', 13, 'aao re yaar', 0, '2017-09-09'),
(60, 1, 1, 1, 'self', 14, 'kopoko', 1, '2017-09-09'),
(61, 2, 0, 1, 'sharvai', 14, 'kopoko', 0, '2017-09-09');

-- --------------------------------------------------------

--
-- Table structure for table `hinglish_meme_viewers`
--

CREATE TABLE `hinglish_meme_viewers` (
  `id` int(11) NOT NULL,
  `viewerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hinglish_meme_viewers`
--

INSERT INTO `hinglish_meme_viewers` (`id`, `viewerId`) VALUES
(1, 1),
(2, 3),
(3, 60),
(4, 66),
(5, 67),
(6, 68),
(7, 69),
(8, 70),
(9, 71),
(10, 72),
(11, 73),
(12, 74),
(13, 75),
(14, 76),
(15, 77),
(16, 78),
(17, 79),
(18, 80),
(19, 80),
(20, 81),
(21, 82),
(22, 83);

-- --------------------------------------------------------

--
-- Table structure for table `image_flags_table`
--

CREATE TABLE `image_flags_table` (
  `id` int(11) NOT NULL,
  `imageId` int(11) NOT NULL,
  `flaggerUserId` int(11) NOT NULL,
  `flagType` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_flags_table`
--

INSERT INTO `image_flags_table` (`id`, `imageId`, `flaggerUserId`, `flagType`) VALUES
(1, 48, 1, 'racist'),
(2, 17, 1, 'pornographic'),
(3, 19, 1, 'low-quality');

-- --------------------------------------------------------

--
-- Table structure for table `invitationstable`
--

CREATE TABLE `invitationstable` (
  `id` int(11) NOT NULL,
  `inviterId` int(11) NOT NULL,
  `invitedUserEmailId` varchar(50) NOT NULL,
  `inviteCode` int(11) NOT NULL,
  `invitationStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invite_codes_table`
--

CREATE TABLE `invite_codes_table` (
  `id` int(11) NOT NULL,
  `inviterId` int(11) NOT NULL,
  `inviterUsername` varchar(50) NOT NULL,
  `emailToBeInvited` varchar(100) NOT NULL,
  `inviteCode` varchar(10) NOT NULL,
  `codeUsedStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invite_codes_table`
--

INSERT INTO `invite_codes_table` (`id`, `inviterId`, `inviterUsername`, `emailToBeInvited`, `inviteCode`, `codeUsedStatus`) VALUES
(1, 1, 'sharvai', 'sharvai_spqr@yahoo.com', 'jhsh0jbbxy', 1),
(2, 1, 'sharvai', 'sharvai.p@somaiya.edu', '219g21pw6q', 1),
(3, 1, 'sharvai', 'gauravrsan@gmail.com', '8amxmpej72', 0),
(25, 1, 'sharvai', 'sharvai101@gmail.com', '0o98hcktoo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `justmythoughtsmemessubscriberstable`
--

CREATE TABLE `justmythoughtsmemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `likestable`
--

CREATE TABLE `likestable` (
  `id` int(11) NOT NULL,
  `imageId` int(11) NOT NULL,
  `likedByuserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likestable`
--

INSERT INTO `likestable` (`id`, `imageId`, `likedByuserId`) VALUES
(23, 28, 3),
(109, 14, 1),
(111, 50, 3),
(116, 48, 1),
(125, 1, 4),
(126, 13, 1),
(132, 18, 1),
(133, 17, 1),
(145, 34, 1),
(146, 60, 3),
(147, 30, 3),
(149, 19, 1),
(153, 48, 59),
(154, 50, 61),
(159, 16, 1),
(161, 29, 1),
(162, 11, 1),
(163, 35, 1),
(164, 1, 77);

-- --------------------------------------------------------

--
-- Table structure for table `memberstable`
--

CREATE TABLE `memberstable` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(125) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `profilePictureLocation` varchar(200) NOT NULL,
  `userStatus` varchar(120) NOT NULL,
  `memesUploaded` int(11) NOT NULL,
  `numberofSubscribers` int(11) NOT NULL,
  `otherChannelSubscriptions` int(11) NOT NULL,
  `points` float NOT NULL,
  `numberOfQuestionsAsked` int(11) NOT NULL,
  `numberOfAnswersPosted` int(11) NOT NULL,
  `ipAddress` varchar(50) NOT NULL,
  `lastLoginDateTime` datetime NOT NULL,
  `institute` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberstable`
--

INSERT INTO `memberstable` (`id`, `name`, `username`, `email`, `pwd`, `profilePictureLocation`, `userStatus`, `memesUploaded`, `numberofSubscribers`, `otherChannelSubscriptions`, `points`, `numberOfQuestionsAsked`, `numberOfAnswersPosted`, `ipAddress`, `lastLoginDateTime`, `institute`) VALUES
(1, 'Sharvai Patil', 'sharvai', 'sharvai', '$2y$10$NSU/4pRNM0NLLb6crqxk/.VbNfrBZiqnsvPnCKLZxNCqal88EYCyC', 'users/sharvai/profilepicture/profilePicture.jpg', 'Conor McGregor!!', 108, 8, 12, 92.5, 4, 0, '', '2018-07-05 11:35:55', 'somaiya'),
(2, 'Jacky Chan', 'jack', 'jack', 'septiceye', 'users/jack/profilepicture/profilePicture.jpg', 'I love Meagl!', 6, 10, 0, 3, 1, 0, '', '2018-02-11 12:55:19', 'spedicey college'),
(3, 'Elon Musk', 'elon', 'elon', 'musk', 'users/elon/profilepicture/profilePicture.jpg', 'I love Meagl!', 16, 3331, 0, 8.5, 3, 0, '', '2018-02-11 12:40:29', 'Stanford Institute of Technology'),
(6, '', 'changu', 'mang', 'panggu', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', ''),
(7, '', 'ch', 'das', 'dsd', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', ''),
(8, '', 'sharvai12', 'sas', 'asa', '', 'I love Meagl!', 0, 0, 1, 0, 0, 0, '', '2017-07-08 18:48:13', ''),
(9, '', 'sharvai42', 'aswq', 'qwe', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', ''),
(10, '', 'jaggu', 'bandar', 'mast', '', 'I love Meagl!', 0, 1, 0, 1, 6, 0, '', '2017-07-12 18:37:17', ''),
(11, '', 'deatheater', 'mihirgandhi7698@gmail.com', 'mihir2017', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', ''),
(12, '', 'shaomfm', 'sihdih', '343', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', ''),
(13, '', 'sger', 'dsd', 'dsds', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-07-31 20:33:15', ''),
(14, '', 'shsh', 'suhui', 'uhiuhiu', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(15, '', 'shduhde', 'cascwcw', 'cascc', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', ''),
(16, '', 'ascswc', 'ihbi', 'bihb', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(17, '', 'frank', 'sinatra', 'sinatra', '', 'I love Meagl!', 0, -1, 0, 2, 2, 0, '0', '2017-07-12 19:01:47', ''),
(18, '', 'jijij', 'sinatra', 'sinatra', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(19, '', 'ff', 'sinatra', 'sinatra', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(20, '', 'ff1', 'sinatra', 'sinatra', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(21, '', 'ff11', 'sinatra', 'sinatra', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(22, '', 'casc', 'asca', '123', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(23, '', 'casc1', 'asca', '123', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(24, '', 'acssacqw', 'hbhb', 'jnj', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(25, '', 'cascswc', 'rtfgyhnj', 'rcfvgbhnj', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(26, '', 'cascsacasc', 'oknok', 'okmokm', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(27, '', 'qwdqw', 'oknok', 'okmokm', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(28, '', 'kokko', '', '', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(29, '', '', '', '', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(30, '', 'jijijnjnjn', 'njnijnono', 'noknokn', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(31, '', 'plplp', 'plplpl', 'plplpl', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(32, '', 'okrgork', 'ohotk', 'oktokh', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(33, '', 'amit123', 'bhujbal123', 'bbkv', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(34, '', 'jeepan', 'sh', 'jei', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(35, '', 'mm', 'qwdwfe', 'asxrtq', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(36, '', 'mm04040', '02930293', 'asxrtq', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(37, '', 'mm0404089876', 'shvvd', 'asxrtq', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(38, '', 'yuri', 'sharvai_spqr@yahoo.com', 'kv7tyjES', '', 'I love Meagl!', 0, 0, 1, 0, 0, 0, '0', '2017-09-30 01:57:23', ''),
(39, '', 'bibi', 'ibib', 'ibib', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(40, '', 'shux', 'koko', 'popo', '', 'I love Meagl!', 0, 0, 1, 0, 0, 0, '0', '2017-09-02 15:59:06', ''),
(41, '', 'affhi', 'ijoij', 'oknokn', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(42, '', 'free', 'free', 'free', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(43, '', 'sharg', 'erge', 'regre', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(44, '', 'triggered', 'sharvai.p@somaiya.edu', 'amit', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(45, '', 'gangu', 'bai ', 'non-matrix', '', 'I love Meagl!', 2, 2, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(46, '', 'ferea', 'fqe', 'feq', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(47, '', 'erer', 'aa', 'rr', '', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(48, '', 'yolo', 'ylol', 'lol', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(49, '', 'newbie', 'newbie', 'nnn', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(50, '', 'gigr', 'hioi', 'nn', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(51, '', 'rere', 'errg', 'gr', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(52, '', 'etete', 'erre', 'ww', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(53, '', 'jackdie', 'ijdj', 'idi', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-06-26 20:03:10', ''),
(54, '', 'jinsang', 'dj', 'jinjin', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 1, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(55, 'J. Balvin', 'jb', 'jbalvin@nena.com', 'bj', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(56, 'naruto shippuden', 'narutoe', 'naruto92@ss.com', 'toeman', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 'spedicey college'),
(57, 'jinit', 'jinnu', 'jaja', 'kili', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 'somaiya'),
(58, 'joomla', 'dru', 'drupal', 'pal', 'users/dru/profilepicture/profilePicture.jpg', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-07-26 15:21:05', ''),
(59, 'Chinmayee V', 'qwerty', 'chinu.97@gmail.com', 'qwerty123', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-08-05 15:30:50', ''),
(60, 'age of', 'johnny', 'abc@abc.com', 'abc', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-08-05 12:44:08', ''),
(61, 'aa', 'as', 'nan@ana.com', 'we', 'users/as/profilepicture/profilePicture.jpg', 'I love Meagl!', 0, 2, 1, 0, 0, 0, '0', '2017-08-05 15:29:54', ''),
(62, '2323', '21232', 's212', 'csac', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(63, 's', 's', 's', 's', 'users/s/profilepicture/profilePicture.jpg', 'I love Meagl!', 0, 1, 0, 0, 0, 0, '0', '2017-08-06 20:36:56', ''),
(64, 'a', 'a', 'a', 'a', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 1, 1, 0, 0, 0, '0', '2017-08-06 20:35:31', ''),
(65, 'g', 'g', 'g', 'g', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 1, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(66, 'r', 'r', 'r', 'r', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(67, 'Milind Patil', 'Milind', 'milindhp@tifr.res.in', 'wild', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(68, 'garninginging', 'dyolfySituation', 'mama', 'meme', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(69, 'SASDW', 'MANIKCHAND', 'sas22', 'babu', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 'K. J. Somaiya College of Engineering'),
(70, 'nene', 'maniklal', 'opopo', 'sa', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', 'somaiya'),
(76, 'lplp', 'jiji', 'oioi', 'ijij', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(77, 'mah', 'mahnamajeff', 'naam', 'reer', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 1, 0, 1, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(78, 'jijioioi', 'lalal', 'lplp', 'vmvm', 'users/lalal/profilepicture/profilePicture.jpg', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '0000-00-00 00:00:00', ''),
(79, 'garba', 'garba', 'garba', '$2y$10$4O/lIsNiGfB30csmLrWtj.9Dp0JhYXkI5S3VYez1gslrpatWFCVVm', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-09-30 01:03:33', ''),
(80, 'zaru', 'zaru', 'zaru', '$2y$10$gTkBmYSN12ZQnjc0.lQQruSIRTG2h06A0oTHVCixzo6NHKk9BYY/y', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 0, 0, 0, 0, '0', '2017-10-02 01:00:33', ''),
(83, 'shuzt', 'lapooloo', 'sharvai101@gmail.com', 'sharvai', 'defaults/defaultProfilePicture.png', 'I love Meagl!', 0, 0, 1, 0, 0, 0, '0', '2018-01-02 11:46:29', '');

-- --------------------------------------------------------

--
-- Table structure for table `memecategoriestable`
--

CREATE TABLE `memecategoriestable` (
  `id` int(11) NOT NULL,
  `memeCategory` varchar(100) NOT NULL,
  `totalSubscribers` int(11) NOT NULL,
  `totalMemesForThisCategory` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memecategoriestable`
--

INSERT INTO `memecategoriestable` (`id`, `memeCategory`, `totalSubscribers`, `totalMemesForThisCategory`) VALUES
(1, 'Savage', 2, 34),
(2, 'Sports', 0, 21),
(3, 'Gaming', 1, 35),
(4, 'Comics', 0, 20),
(5, 'Celeb', 0, 8),
(6, 'College / School', 1, 5),
(7, 'Politics', 1, 4),
(8, 'Just My Thoughts', 0, 2),
(9, 'Other', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `memestable`
--

CREATE TABLE `memestable` (
  `id` int(11) NOT NULL,
  `uploader` varchar(125) NOT NULL,
  `uploaderId` int(11) NOT NULL,
  `memeDestination` varchar(1000) NOT NULL,
  `memetitle` varchar(1000) NOT NULL,
  `memeCategory` varchar(50) NOT NULL,
  `language` varchar(15) NOT NULL,
  `visibilityStatus` int(11) NOT NULL,
  `likes` int(255) NOT NULL,
  `numberOfComments` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `memeDescription` mediumtext NOT NULL,
  `views` int(11) NOT NULL,
  `flags` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memestable`
--

INSERT INTO `memestable` (`id`, `uploader`, `uploaderId`, `memeDestination`, `memetitle`, `memeCategory`, `language`, `visibilityStatus`, `likes`, `numberOfComments`, `datetime`, `memeDescription`, `views`, `flags`) VALUES
(1, 'sharvai', 1, 'users/sharvai/memes/Elon Musk Inspirational.jpg', 'Elon Musk Inspirational', 'Savage', 'english', 1, 4, 0, '2017-01-16 22:37:56', 'LOVE THIS GUY!', 16, 0),
(2, 'sharvai', 1, 'users/sharvai/memes/ggg.jpg', 'ggg', 'Sports', 'english', 1, 0, 0, '2017-01-26 20:38:08', '', 16, 0),
(3, 'sharvai', 1, 'users/sharvai/memes/kk.jpg', 'kk', 'Celeb', 'english', 1, 0, 0, '2017-01-26 20:38:32', '', 6, 0),
(4, 'elon', 3, 'users/elon/memes/yo.jpg', 'yo', 'Gaming', 'english', 1, 0, 1, '2017-01-26 22:15:26', '', 20, 1),
(5, 'sharvai', 1, 'users/sharvai/memes/hgg.jpg', 'hgg', 'Savage', 'english', 1, 0, 1, '2017-01-26 22:28:43', '', 5, 0),
(6, 'jack', 2, 'users/jack/memes/lets see if this comes.jpg', 'lets see if this comes', 'Celeb', 'english', 1, 0, 0, '2017-01-27 16:43:42', '', 1, 1),
(9, 'jack', 2, 'users/jack/memes/free.jpg', 'free', 'Savage', 'english', 1, 0, 0, '2017-01-27 16:47:02', '', 2, 0),
(10, 'jack', 2, 'users/jack/memes/gogogo.jpg', 'gogogo', 'Sports', 'english', 1, 0, 1, '2017-01-27 16:47:56', '', 4, 1),
(11, 'elon', 3, 'users/elon/memes/try.jpg', 'try', 'Savage', 'english', 1, 1, 0, '2017-01-27 17:17:56', '', 29, 1),
(13, 'jack', 2, 'users/jack/memes/wontwork.jpg', 'wontwork', 'Gaming', 'english', 1, 1, 0, '2017-01-27 17:18:43', '', 2, 0),
(14, 'jack', 2, 'users/jack/memes/not now.jpg', 'not now', 'Comics', 'english', 1, 1, 3, '2017-01-27 17:19:01', '', 10, 0),
(15, 'sharvai', 1, 'users/sharvai/memes/keepItUpProudOfYou.jpg', 'keepItUpProudOfYou', 'Savage', 'english', 3, 0, 0, '2017-02-16 19:25:29', '', 6, 0),
(16, 'elon', 3, 'users/elon/memes/MAH SHIR.jpg', 'MAH SHIR', 'Savage', 'english', 3, 901, 0, '2017-02-16 20:02:39', '', 12, 1),
(17, 'elon', 3, 'users/elon/memes/silenceIsKillingMe.jpg', 'silenceIsKillingMe', 'Savage', 'english', 3, 1, 0, '2017-02-16 23:40:30', '', 4, 1),
(18, 'elon', 3, 'users/elon/memes/iStopLosing my head.jpg', 'iStopLosing my head', 'Savage', 'english', 3, 1, 1, '2017-02-17 01:18:42', '', 17, 1),
(19, 'jack', 2, 'users/jack/memes/testingWITHsharvai.jpg', 'testingWITHsharvai', 'Savage', 'english', 3, 2, 0, '2017-02-18 00:22:31', '', 10, 1),
(20, 'sharvai', 1, 'users/sharvai/memes/space!!!.jpg', 'space!!!', 'Savage', 'english', 0, 0, 0, '2017-02-24 01:10:43', '', 2, 0),
(21, 'sharvai', 1, 'users/sharvai/memes/IDK.jpg', 'IDK', 'Savage', 'english', 0, 0, 0, '2017-02-26 02:29:50', '', 1, 0),
(22, 'sharvai', 1, 'users/sharvai/memes/dasdaw.jpg', 'dasdaw', 'Savage', 'english', 0, 0, 0, '2017-02-26 02:42:26', '', 0, 0),
(23, 'sharvai', 1, 'users/sharvai/memes/sdcv.jpg', 'sdcv', 'Savage', 'english', 0, 0, 0, '2017-02-26 03:03:46', '', 0, 0),
(24, 'sharvai', 1, 'users/sharvai/memes/wdascv.jpg', 'wdascv', 'Savage', 'english', 0, 0, 0, '2017-02-26 03:06:18', '', 0, 0),
(25, 'sharvai', 1, 'users/sharvai/memes/ascdvssv.jpg', 'ascdvssv', 'Savage', 'english', 0, 0, 0, '2017-02-26 03:07:37', '', 1, 0),
(26, 'sharvai', 1, 'users/sharvai/memes/vdsvfv.jpg', 'vdsvfv', 'Savage', 'english', 0, 0, 0, '2017-02-26 03:12:06', '', 1, 0),
(27, 'sharvai', 1, 'users/sharvai/memes/WILL WORK.png', 'WILL WORK', 'Savage', 'english', 3, 3, 0, '2017-02-26 03:13:16', '', 3, 0),
(28, 'sharvai', 1, 'users/sharvai/memes/SHSUHS.jpg', 'SHSUHS', 'Savage', 'english', 3, 8, 3, '2017-02-28 19:41:15', '', 38, 0),
(29, 'elon', 3, 'users/elon/memes/joker.jpg', 'joker', 'Other', 'english', 3, 2, 21, '2017-03-03 18:04:29', '', 73, -97),
(30, 'sharvai', 1, 'users/sharvai/memes/testing jack out.jpg', 'testing jack out', 'Savage', 'english', 0, 1, 0, '2017-03-27 05:48:09', '', 5, 0),
(31, 'elon', 3, 'users/elon/memes/fafsf.jpg', 'fafsf', 'Savage', 'english', 0, 0, 0, '2017-03-29 06:05:43', '', 0, 0),
(32, 'elon', 3, 'users/elon/memes/sharvaiTesting.jpg', 'sharvaiTesting', 'Savage', 'english', 0, 0, 0, '2017-03-29 20:19:07', '', 2, 0),
(33, 'elon', 3, 'users/elon/memes/cawcasc.jpg', 'cawcasc', 'Savage', 'english', 0, 0, 0, '2017-03-29 20:36:19', '', 0, 0),
(34, 'elon', 3, 'users/elon/memes/veve.jpg', 'veve', 'Savage', 'english', 0, 1, 0, '2017-03-29 20:39:04', '', 2, 0),
(35, 'elon', 3, 'users/elon/memes/dawd.jpg', 'dawd', 'Savage', 'english', 0, 1, 0, '2017-03-29 20:39:37', '', 1, 0),
(36, 'sharvai', 1, 'users/sharvai/memes/adw.jpg', 'adw', 'Savage', 'english', 0, 0, 0, '2017-03-29 20:47:14', '', 1, 0),
(37, 'sharvai', 1, 'users/sharvai/memes/fefef.jpg', 'fefef', 'Savage', 'english', 0, 0, 0, '2017-03-29 20:52:11', '', 3, 0),
(38, 'sharvai', 1, 'users/sharvai/memes/for all the mfs.jpg', 'for all the mfs', 'Savage', 'english', 3, 0, 0, '2017-03-29 21:11:25', '', 8, 0),
(39, 'gangu', 45, 'users/gangu/memes/heerear.png', 'heerear', 'Sports', 'english', 0, 0, 0, '2017-04-30 02:37:09', '', 1, 0),
(40, 'gangu', 45, 'users/gangu/memes/bebeeerberberb.jpg', 'bebeeerberberb', 'Other', 'english', 1, 0, 0, '2017-04-30 02:42:06', '', 2, 0),
(42, 'sharvai', 1, 'users/sharvai/memes/hihi.jpg', 'hihi', 'Sports', 'english', 3, 0, 0, '2017-04-30 02:50:29', 'wdvevr', 2, 0),
(43, 'sharvai', 1, 'users/sharvai/memes/myrigir.png', 'myrigir', 'Sports', 'english', 0, 0, 0, '2017-05-24 00:44:54', '', 2, 0),
(44, 'elon', 3, 'users/elon/memes/cvbn.jpg', 'cvbn', 'Gaming', 'english', 0, 0, 0, '2017-06-15 15:12:43', '', 11, 0),
(45, 'sharvai', 1, 'users/sharvai/memes/edfgb.jpg', 'edfgb', 'Other', 'english', 1, 0, 0, '2017-06-16 06:59:24', '', 3, 0),
(46, 'sharvai', 1, 'users/sharvai/memes/deatheater ken.jpg', 'deatheater ken', 'Gaming', 'english', 3, 0, 0, '2017-06-16 07:30:16', 'sa', 12, 0),
(47, 'sharvai', 1, 'users/sharvai/memes/MAH THOUGHTS BOI.jpg', 'MAH THOUGHTS BOI', 'Just My Thoughts', 'english', 1, 0, 2, '2017-07-09 01:30:36', '', 6, 0),
(48, 'elon', 3, 'users/elon/memes/HOLA KE G ME B KA GOLA.jpg', 'HOLA KE G ME B KA GOLA', 'Savage', 'english', 1, 2, 1, '2017-07-13 01:40:47', 'HOLA HOLA HOLA HOLALALALALA', 9, 1),
(49, 'sharvai', 1, 'users/sharvai/memes/Imma WIN.jpg', 'Imma WIN', 'Savage', 'english', 1, 0, 5, '2017-07-15 02:52:02', '', 4, 0),
(50, 'sharvai', 1, 'users/sharvai/memes/My Coellegeeeege.png', 'My Coellegeeeege', 'College / School', 'english', 1, 2, 1, '2017-07-16 12:48:53', '', 6, 0),
(51, 'sharvai', 1, 'users/sharvai/memes/Conor wins again.jpg', 'Conor wins again', 'Sports', 'english', 3, 0, 0, '2017-07-16 16:01:13', '', 2, 0),
(52, 'sharvai', 1, 'users/sharvai/memes/POLITICSOS.jpg', 'POLITICSOS', 'Politics', 'english', 1, 0, 0, '2017-07-16 21:13:41', '', 2, 0),
(53, 'sharvai', 1, 'users/sharvai/memes/Humri Bhasa.jpg', 'Humri Bhasa', 'Politics', 'hinglish', 1, 0, 0, '2017-07-18 00:24:38', '', 1, 0),
(54, 'sharvai', 1, 'users/sharvai/memes/Submission problems.jpg', 'Submission problems', 'College / School', 'hinglish', 3, 0, 0, '2017-07-25 22:13:30', '', 3, 0),
(55, 'sharvai', 1, 'users/sharvai/memes/Amaze is this scene!.jpg', 'Amaze is this scene!', 'Gaming', 'english', 1, 0, 1, '2017-07-26 18:34:59', '', 1, 0),
(56, 'sharvai', 1, 'users/sharvai/memes/FDI.jpg', 'FDI', 'Comics', 'english', 0, 0, 0, '2017-07-26 18:56:49', '', 1, 0),
(57, 'sharvai', 1, 'users/sharvai/memes/Roya====.jpg', 'Roya====', 'Gaming', 'english', 3, 0, 0, '2017-07-26 19:17:06', '', 3, 0),
(58, 'sharvai', 1, 'users/sharvai/memes/Yolo.jpg', 'Yolo', 'Savage', 'english', 3, 0, 0, '2017-07-26 19:23:02', '', 6, 0),
(59, 'sharvai', 1, 'users/sharvai/memes/for me and only boi.png', 'for me and only boi', 'Savage', 'english', 0, 0, 0, '2017-08-02 12:59:56', '', 1, 0),
(60, 'sharvai', 1, 'users/sharvai/memes/dfghjkj.jpg', 'dfghjkj', 'Sports', 'english', 2, 1, 0, '2017-08-02 13:10:18', '', 8, 0),
(61, 'elon', 3, 'users/elon/memes/X.jpg', 'X', 'Savage', 'hinglish', 0, 0, 0, '2017-08-06 03:03:36', '', 1, 0),
(62, 'elon', 3, 'users/elon/memes/Book.png', 'Book', 'Celeb', 'english', 3, 0, 0, '2017-08-06 10:39:06', '', 2, 0),
(63, 'sharvai', 1, 'users/sharvai/memes/hg.jpg', 'hg', 'Comics', 'english', 0, 0, 0, '2017-08-06 11:02:00', '', 1, 0),
(64, 'sharvai', 1, 'users/sharvai/memes/cascas.jpg', 'cascas', 'Comics', 'english', 0, 0, 0, '2017-08-06 11:07:14', 'fefeefef', 0, 0),
(65, 'sharvai', 1, 'users/sharvai/memes/cascavwewev.jpg', 'cascavwewev', 'Celeb', 'english', 0, 0, 0, '2017-08-06 11:09:35', '', 0, 0),
(66, 'sharvai', 1, 'users/sharvai/memes/casac.jpg', 'casac', 'Gaming', 'english', 0, 0, 0, '2017-08-06 11:10:21', '', 1, 0),
(67, 'sharvai', 1, 'users/sharvai/memes/vewvwev.jpg', 'vewvwev', 'Comics', 'english', 0, 0, 0, '2017-08-06 11:14:08', '', 1, 0),
(68, 'sharvai', 1, 'users/sharvai/memes/cascasewew.jpg', 'cascasewew', 'Savage', 'english', 2, 0, 0, '2017-08-06 11:16:13', '', 6, 0),
(69, 'sharvai', 1, 'users/sharvai/memes/casc233232.jpg', 'casc233232', 'Celeb', 'english', 1, 0, 0, '2017-08-06 15:14:27', '', 1, 0),
(70, 'elon', 3, 'users/elon/memes/a.jpg', 'a', 'College / School', 'english', 1, 0, 0, '2017-08-06 20:03:15', '', 2, 0),
(71, 'sharvai', 1, 'users/sharvai/memes/that''s india.jpg', 'that''s india', 'Gaming', 'english', 1, 0, 0, '2017-08-07 17:04:30', '', 0, 0),
(72, 'sharvai', 1, 'users/sharvai/memes/sad.jpg', 'sad', 'Comics', 'english', 1, 0, 0, '2017-08-07 17:14:34', '', 3, 0),
(73, 'sharvai', 1, 'users/sharvai/memes/that''s mah boi.jpg', 'that''s mah boi', 'Gaming', 'english', 1, 0, 0, '2017-08-07 17:31:11', '', 1, 0),
(74, 'sharvai', 1, 'users/sharvai/memes/that''s india.jpg', 'that''s india', 'Gaming', 'english', 1, 0, 0, '2017-08-07 17:37:42', '', 2, 0),
(75, 'sharvai', 1, 'users/sharvai/memes/sharvais game.jpg', 'sharvais game', 'Comics', 'english', 1, 0, 0, '2017-08-07 20:46:20', '', 2, 0),
(76, 'sharvai', 1, 'users/sharvai/memes/mimi.jpg', 'mimi', 'College / School', 'english', 1, 0, 0, '2017-08-11 20:16:23', '', 1, 0),
(77, 'sharvai', 1, 'users/sharvai/memes/mppm.jpg', 'mppm', 'Celeb', 'english', 1, 0, 0, '2017-08-11 23:26:52', '', 2, 0),
(78, 'sharvai', 1, 'users/sharvai/memes/Moms enemy number 1.jpg', 'Moms enemy number 1', 'Comics', 'english', 1, 0, 0, '2017-08-12 19:55:02', '', 1, 0),
(79, 'sharvai', 1, 'users/sharvai/memes/79.jpg', 'meome?', 'Sports', 'english', 1, 0, 0, '2017-08-12 19:57:35', '', 1, 0),
(80, 'sharvai', 1, 'users/sharvai/memes/80.jpg', 'reree', 'Sports', 'english', 1, 0, 0, '2017-08-12 22:00:43', '', 1, 0),
(81, 'sharvai', 1, 'users/sharvai/memes/81.png', 'arey re', 'Gaming', 'english', 1, 0, 0, '2017-08-19 23:42:14', '', 3, 0),
(82, 'sharvai', 1, 'users/sharvai/memes/82.png', 'kook', 'College / School', 'english', 2, 0, 0, '2017-08-19 23:49:27', '', 12, 0),
(83, 'sharvai', 1, 'users/sharvai/memes/83.jpg', 'wqw', 'Sports', 'english', 2, 0, 0, '2017-08-20 00:07:12', '', 0, 0),
(84, 'sharvai', 1, 'users/sharvai/memes/84.jpg', 'wqwqwr', 'Gaming', 'english', 2, 0, 0, '2017-08-20 00:09:28', '', 0, 0),
(85, 'sharvai', 1, 'users/sharvai/memes/85.jpg', 'wqqwr', 'Sports', 'english', 2, 0, 0, '2017-08-20 00:10:28', '', 0, 0),
(86, 'sharvai', 1, 'users/sharvai/memes/86.jpg', 'sa', 'Sports', 'english', 2, 0, 0, '2017-08-20 00:11:44', '', 0, 0),
(87, 'sharvai', 1, 'users/sharvai/memes/87.jpg', 'wewe', 'Sports', 'english', 2, 0, 0, '2017-08-20 09:01:07', '', 2, 0),
(88, 'sharvai', 1, 'users/sharvai/memes/88.jpg', 'aa reuy', 'Gaming', 'english', 1, 0, 0, '2017-08-24 15:57:01', '', 1, 0),
(89, 'sharvai', 1, 'users/sharvai/memes/89.jpg', 'rwwrwr', 'Gaming', 'english', 1, 0, 0, '2017-08-24 16:05:19', '', 1, 0),
(90, 'sharvai', 1, 'users/sharvai/memes/90.jpg', 'reewasfvvv', 'Sports', 'english', 1, 0, 0, '2017-08-24 16:32:48', '', 1, 0),
(91, 'sharvai', 1, 'users/sharvai/memes/91.jpg', 'karkar', 'Gaming', 'english', 1, 0, 0, '2017-08-24 16:39:42', '', 1, 0),
(92, 'sharvai', 1, 'users/sharvai/memes/92.jpg', 'one more!?..', 'Sports', 'english', 1, 0, 0, '2017-08-24 16:46:55', '', 1, 0),
(93, 'sharvai', 1, 'users/sharvai/memes/93.jpg', 'wweggg', 'Gaming', 'english', 1, 0, 0, '2017-08-24 16:56:37', '', 1, 0),
(94, 'sharvai', 1, 'users/sharvai/memes/94.jpg', 'tete', 'Comics', 'english', 1, 0, 1, '2017-08-24 17:16:51', '', 2, 0),
(95, 'sharvai', 1, 'users/sharvai/memes/95.jpg', 'qww', 'Gaming', 'english', 1, 0, 0, '2017-08-24 17:20:50', '', 2, 0),
(96, 'sharvai', 1, 'users/sharvai/memes/96.jpg', 'tewwzs', 'Sports', 'english', 1, 0, 0, '2017-08-24 17:27:15', '', 4, 0),
(97, 'sharvai', 1, 'users/sharvai/memes/97.png', 'True story', 'Other', 'english', 1, 0, 1, '2017-09-06 23:24:58', '', 3, 0),
(98, 'sharvai', 1, 'users/sharvai/memes/98.jpg', 'For old times sake', 'Politics', 'english', 2, 0, 0, '2017-09-09 12:43:49', '', 2, 0),
(99, 'sharvai', 1, 'users/sharvai/memes/99.jpg', 'gre', 'Gaming', 'english', 1, 0, 0, '2017-09-09 16:09:46', '', 1, 0),
(100, 'sharvai', 1, 'users/sharvai/memes/100.jpg', 'great', 'Savage', 'english', 1, 0, 0, '2017-09-09 16:44:18', '', 2, 0),
(101, 'mahnamajeff', 77, 'users/mahnamajeff/memes/101.jpg', 'gegett', 'Comics', 'english', 1, 0, 0, '2017-09-09 22:13:41', '', 1, 0),
(102, 'sharvai', 1, 'users/sharvai/memes/102.jpg', 'wd', 'Gaming', 'english', 1, 0, 0, '2017-10-05 21:44:36', '', 1, 0),
(103, 'sharvai', 1, 'users/sharvai/memes/103.jpg', 'width 300 with no resizing', 'Gaming', 'english', 1, 0, 0, '2017-12-23 17:00:41', '', 1, 0),
(104, 'sharvai', 1, 'users/sharvai/memes/104.jpg', 'widht 300 with resizing', 'Comics', 'english', 1, 0, 0, '2017-12-23 17:02:40', '', 1, 0),
(105, 'sharvai', 1, 'users/sharvai/memes/105.jpg', 'greater than 600', 'Comics', 'english', 1, 0, 0, '2017-12-23 17:26:03', '', 1, 0),
(106, 'sharvai', 1, 'users/sharvai/memes/106.jpg', 'sa', 'Comics', 'english', 1, 0, 0, '2017-12-23 17:54:00', '', 0, 0),
(107, 'sharvai', 1, 'users/sharvai/memes/107.jpg', 'ttt', 'Politics', 'english', 1, 0, 0, '2017-12-23 17:56:52', '', 1, 0),
(108, 'sharvai', 1, 'users/sharvai/memes/108.jpg', 'sungi', 'Celeb', 'english', 1, 0, 0, '2017-12-23 18:08:44', '', 1, 0),
(109, 'sharvai', 1, 'users/sharvai/memes/109.gif', 'sdds', 'Gaming', 'english', 1, 0, 0, '2018-01-05 18:28:04', '', 0, 0),
(110, 'sharvai', 1, 'users/sharvai/memes/110.png', 'wqd', 'Sports', 'english', 1, 0, 0, '2018-01-11 18:29:58', '', 0, 0),
(111, 'sharvai', 1, 'users/sharvai/memes/111.jpg', 'ff', 'Gaming', 'english', 1, 0, 0, '2018-01-11 18:35:55', '', 0, 0),
(112, 'sharvai', 1, 'users/sharvai/memes/112.jpg', 'rere', 'Gaming', 'english', 2, 0, 0, '2018-01-11 18:37:22', '', 0, 0),
(113, 'sharvai', 1, 'users/sharvai/memes/113.jpg', 'fffwe', 'Gaming', 'english', 2, 0, 0, '2018-01-11 19:10:48', '', 0, 0),
(114, 'sharvai', 1, 'users/sharvai/memes/114.jpg', 'fewfe', 'Gaming', 'english', 2, 0, 0, '2018-01-11 19:21:17', '', 0, 0),
(115, 'sharvai', 1, 'users/sharvai/memes/115.jpg', 'h', 'Gaming', 'english', 2, 0, 0, '2018-01-11 20:33:38', '', 0, 0),
(116, 'sharvai', 1, 'users/sharvai/memes/116.jpg', 'ef', 'Gaming', 'english', 2, 0, 0, '2018-01-11 20:50:56', '', 0, 0),
(117, 'sharvai', 1, 'users/sharvai/memes/117.jpg', 'sasd', 'Gaming', 'english', 2, 0, 0, '2018-01-11 20:55:36', '', 0, 0),
(118, 'sharvai', 1, 'users/sharvai/memes/118.jpg', 'sadddw', 'Sports', 'english', 2, 0, 0, '2018-01-11 20:59:49', '', 0, 0),
(119, 'sharvai', 1, 'users/sharvai/memes/119.jpg', 'dwdwas', 'Comics', 'english', 2, 0, 0, '2018-01-11 21:08:27', '', 0, 0),
(120, 'sharvai', 1, 'users/sharvai/memes/120.jpg', 'breb', 'Comics', 'english', 2, 0, 0, '2018-01-11 21:12:37', '', 0, 0),
(121, 'sharvai', 1, 'users/sharvai/memes/121.jpg', 'Se', 'Sports', 'english', 2, 0, 0, '2018-01-11 21:32:22', '', 0, 0),
(122, 'sharvai', 1, 'users/sharvai/memes/122.jpg', 'Read zhis', 'Sports', 'english', 2, 0, 0, '2018-02-11 01:55:26', '', 0, 0),
(123, 'sharvai', 1, 'users/sharvai/memes/123.jpg', 'vs=3', 'Gaming', 'english', 3, 0, 0, '2018-02-11 02:00:33', '', 0, 0),
(124, 'sharvai', 1, 'users/sharvai/memes/124.jpg', 'grp for elon not ne', 'Gaming', 'english', 2, 0, 0, '2018-02-11 02:56:45', '', 0, 0),
(125, 'sharvai', 1, 'users/sharvai/memes/125.jpg', 'sad', 'Sports', 'english', 1, 0, 0, '2018-07-05 11:35:59', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `meme_sharing_visibility_table`
--

CREATE TABLE `meme_sharing_visibility_table` (
  `id` int(11) NOT NULL,
  `uploaderId` int(11) NOT NULL,
  `imageId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `groupId` int(11) NOT NULL,
  `numberOfComments` int(11) NOT NULL,
  `memeUploadDateTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meme_sharing_visibility_table`
--

INSERT INTO `meme_sharing_visibility_table` (`id`, `uploaderId`, `imageId`, `userId`, `groupId`, `numberOfComments`, `memeUploadDateTime`) VALUES
(1, 1, 15, 0, 1, 0, '2017-02-16 19:25:29'),
(2, 1, 15, 3, 0, 0, '2017-02-16 19:25:29'),
(3, 1, 15, 2, 0, 0, '2017-02-16 19:25:29'),
(4, 3, 16, 0, 1, 0, '2017-02-16 20:02:39'),
(5, 3, 16, 0, 2, 0, '2017-02-16 20:02:39'),
(6, 3, 17, 0, 1, 0, '2017-02-16 23:40:30'),
(7, 3, 17, 0, 2, 0, '2017-02-16 23:40:30'),
(8, 3, 17, 1, 0, 0, '2017-02-16 23:40:30'),
(9, 3, 17, 5, 0, 0, '2017-02-16 23:40:30'),
(10, 3, 18, 0, 1, 0, '2017-02-17 01:18:42'),
(11, 3, 18, 0, 2, 1, '2017-02-17 01:18:42'),
(12, 3, 18, 1, 0, 0, '2017-02-17 01:18:42'),
(13, 3, 18, 5, 0, 0, '2017-02-17 01:18:42'),
(14, 2, 19, 0, 1, 0, '2017-02-18 00:22:31'),
(15, 2, 19, 1, 0, 0, '2017-02-18 00:22:31'),
(16, 1, 20, 3, 0, 0, '2017-02-24 01:10:43'),
(17, 1, 21, 2, 0, 0, '2017-02-26 02:29:50'),
(18, 1, 22, 2, 0, 0, '2017-02-26 02:42:26'),
(19, 1, 23, 2, 0, 0, '2017-02-26 03:03:46'),
(20, 1, 24, 2, 0, 0, '2017-02-26 03:06:18'),
(21, 1, 25, 2, 0, 0, '2017-02-26 03:07:37'),
(22, 1, 26, 2, 0, 0, '2017-02-26 03:12:06'),
(23, 1, 27, 2, 0, 0, '2017-02-26 03:13:16'),
(24, 1, 28, 0, 1, 4, '2017-02-28 19:41:15'),
(25, 1, 28, 3, 0, 1, '2017-02-28 19:41:15'),
(26, 1, 28, 2, 0, 0, '2017-02-28 19:41:15'),
(27, 3, 29, 1, 0, 24, '2017-03-03 18:04:29'),
(28, 1, 30, 0, 4, 0, '2017-03-27 05:48:09'),
(29, 3, 32, 0, 4, 0, '2017-03-29 20:19:07'),
(30, 3, 32, 1, 0, 0, '2017-03-29 20:19:07'),
(31, 3, 33, 0, 4, 0, '2017-03-29 20:36:19'),
(32, 3, 33, 1, 0, 0, '2017-03-29 20:36:19'),
(33, 3, 34, 0, 1, 0, '2017-03-29 20:39:04'),
(34, 3, 34, 1, 0, 0, '2017-03-29 20:39:04'),
(35, 3, 35, 0, 4, 0, '2017-03-29 20:39:37'),
(36, 3, 35, 1, 0, 0, '2017-03-29 20:39:37'),
(37, 1, 36, 0, 6, 0, '2017-03-29 20:47:14'),
(38, 1, 36, 2, 0, 0, '2017-03-29 20:47:14'),
(39, 1, 37, 0, 5, 0, '2017-03-29 20:52:11'),
(40, 1, 37, 3, 0, 0, '2017-03-29 20:52:11'),
(41, 1, 38, 0, 5, 0, '2017-03-29 21:11:25'),
(44, 1, 41, 2, 0, 0, '2017-04-30 02:43:21'),
(45, 1, 42, 0, 3, 0, '2017-04-30 02:50:29'),
(46, 1, 42, 3, 0, 0, '2017-04-30 02:50:29'),
(47, 1, 42, 2, 0, 0, '2017-04-30 02:50:29'),
(48, 1, 43, 3, 0, 0, '2017-05-24 00:44:54'),
(49, 3, 44, 0, 8, 0, '2017-06-15 15:12:43'),
(50, 1, 46, 0, 1, 0, '2017-06-16 07:30:16'),
(51, 1, 46, 0, 3, 0, '2017-06-16 07:30:16'),
(52, 1, 46, 0, 5, 0, '2017-06-16 07:30:16'),
(53, 1, 46, 0, 6, 0, '2017-06-16 07:30:16'),
(54, 1, 46, 0, 7, 0, '2017-06-16 07:30:16'),
(55, 1, 46, 0, 8, 0, '2017-06-16 07:30:16'),
(56, 1, 46, 3, 0, 0, '2017-06-16 07:30:16'),
(57, 1, 46, 2, 0, 0, '2017-06-16 07:30:16'),
(58, 1, 46, 11, 0, 0, '2017-06-16 07:30:16'),
(59, 1, 51, 0, 1, 0, '2017-07-16 16:01:13'),
(60, 1, 54, 0, 1, 0, '2017-07-25 22:13:30'),
(61, 1, 54, 11, 0, 0, '2017-07-25 22:13:30'),
(62, 1, 56, 0, 3, 0, '2017-07-26 18:56:49'),
(63, 1, 56, 0, 8, 0, '2017-07-26 18:56:49'),
(64, 1, 56, 2, 0, 0, '2017-07-26 18:56:49'),
(65, 1, 57, 0, 8, 0, '2017-07-26 19:17:06'),
(66, 1, 57, 0, 9, 0, '2017-07-26 19:17:06'),
(67, 1, 57, 3, 0, 0, '2017-07-26 19:17:06'),
(68, 1, 57, 2, 0, 0, '2017-07-26 19:17:06'),
(69, 1, 58, 0, 3, 0, '2017-07-26 19:23:02'),
(70, 1, 58, 0, 7, 0, '2017-07-26 19:23:02'),
(71, 1, 58, 0, 8, 0, '2017-07-26 19:23:02'),
(72, 1, 58, 11, 0, 3, '2017-07-26 19:23:02'),
(73, 1, 59, 3, 0, 0, '2017-08-02 12:59:56'),
(74, 1, 60, 3, 0, 0, '2017-08-02 13:10:18'),
(75, 3, 61, 0, 4, 0, '2017-08-06 03:03:36'),
(76, 3, 62, 0, 1, 0, '2017-08-06 10:39:06'),
(77, 3, 62, 1, 0, 0, '2017-08-06 10:39:06'),
(78, 1, 63, 0, 1, 0, '2017-08-06 11:02:00'),
(79, 1, 63, 0, 6, 0, '2017-08-06 11:02:00'),
(80, 1, 64, 0, 1, 0, '2017-08-06 11:07:14'),
(81, 1, 64, 3, 0, 0, '2017-08-06 11:07:14'),
(82, 1, 65, 0, 1, 0, '2017-08-06 11:09:35'),
(83, 1, 65, 3, 0, 0, '2017-08-06 11:09:35'),
(84, 1, 66, 0, 5, 0, '2017-08-06 11:10:21'),
(85, 1, 66, 3, 0, 0, '2017-08-06 11:10:21'),
(86, 1, 67, 0, 1, 0, '2017-08-06 11:14:08'),
(87, 1, 67, 3, 0, 0, '2017-08-06 11:14:08'),
(88, 1, 68, 0, 1, 0, '2017-08-06 11:16:13'),
(89, 1, 68, 3, 0, 0, '2017-08-06 11:16:13'),
(90, 1, 82, 38, 0, 0, '2017-08-19 23:49:27'),
(91, 1, 83, 38, 0, 0, '2017-08-20 00:07:12'),
(92, 1, 84, 38, 0, 0, '2017-08-20 00:09:28'),
(93, 1, 85, 38, 0, 0, '2017-08-20 00:10:28'),
(94, 1, 86, 38, 0, 0, '2017-08-20 00:11:44'),
(95, 1, 87, 38, 0, 1, '2017-08-20 09:01:07'),
(96, 1, 98, 0, 1, 0, '2017-09-09 12:43:49'),
(97, 1, 112, 38, 0, 0, '2018-01-11 18:37:22'),
(98, 1, 113, 38, 0, 0, '2018-01-11 19:10:48'),
(99, 1, 114, 38, 0, 0, '2018-01-11 19:21:17'),
(100, 1, 115, 38, 0, 0, '2018-01-11 20:33:38'),
(101, 1, 116, 38, 0, 0, '2018-01-11 20:50:56'),
(102, 1, 117, 38, 0, 0, '2018-01-11 20:55:36'),
(103, 1, 118, 38, 0, 0, '2018-01-11 20:59:49'),
(104, 1, 119, 38, 0, 0, '2018-01-11 21:08:27'),
(105, 1, 120, 38, 0, 0, '2018-01-11 21:12:37'),
(106, 1, 121, 38, 0, 0, '2018-01-11 21:32:22'),
(107, 1, 122, 4, 0, 0, '2018-02-11 01:55:26'),
(108, 1, 123, 4, 0, 0, '2018-02-11 02:00:33'),
(109, 1, 124, 0, 1, 0, '2018-02-11 02:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `notifications_table`
--

CREATE TABLE `notifications_table` (
  `id` int(11) NOT NULL,
  `senderId` int(11) NOT NULL,
  `receiverId` int(11) NOT NULL,
  `notificationType` varchar(30) NOT NULL,
  `notification` varchar(10000) NOT NULL,
  `notificationLink` varchar(500) NOT NULL,
  `notificationForEventId` int(11) NOT NULL,
  `viewingStatus` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications_table`
--

INSERT INTO `notifications_table` (`id`, `senderId`, `receiverId`, `notificationType`, `notification`, `notificationLink`, `notificationForEventId`, `viewingStatus`, `datetime`) VALUES
(5, 3, 0, 'questionLike', 'elon liked your question "Wanna develop this furth', '', 7, 1, '2017-03-25 01:21:52'),
(6, 3, 1, 'answerLike', 'elon liked your answer "TRY THIS"', '', 39, 1, '2017-03-25 01:26:05'),
(7, 3, 1, 'answerReplyLike', 'elon liked your reply ""', '', 32, 1, '2017-03-25 01:30:01'),
(12, 3, 1, 'imageComment', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=28&world=0&uid=0&gid=1">"SHSUHS"</a> (in the group "Old Friends" in my Meagles)', '', 8, 1, '2017-03-25 13:21:49'),
(13, 1, 3, 'commentLike', '<a href="userprofile.php?id=1">sharvai</a> liked your comment "peeeewwwwdddddddeipppppppppppieee"', '', 8, 1, '2017-03-25 13:25:36'),
(14, 1, 3, 'imageComment', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0">"joker"</a> (in the World)', '', 9, 1, '2017-03-25 19:20:46'),
(15, 3, 3, 'imageComment', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv0">"joker"</a> (in the World)', '', 0, 1, '2017-03-25 19:24:51'),
(16, 3, 3, 'imageComment', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv10">"joker"</a> (in the World)', '', 10, 1, '2017-03-25 19:27:37'),
(17, 3, 3, 'imageComment', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv11">"joker"</a> (in the World)', '', 11, 1, '2017-03-25 19:28:42'),
(18, 1, 3, 'imageComment', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv14">"joker"</a> (in the World)', '', 14, 1, '2017-03-25 19:29:45'),
(19, 3, 1, 'commentLike', '<a href="userprofile.php?id=3">elon</a> liked your comment "ggggggggggggg"', '', 14, 1, '2017-03-25 20:16:00'),
(20, 3, 1, 'commentLike', '<a href="userprofile.php?id=3">elon</a> liked your comment "my name is..."', '', 9, 1, '2017-03-25 20:16:16'),
(22, 1, 3, 'imageComment', '<a href="userprofile.php?id=1">sharvai</a> replied on your comment <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv12">"bbbbbbbbeeee"</a> (in the World)', '', 12, 1, '2017-03-25 20:27:28'),
(23, 3, 1, 'imageLike', '<a href="userprofile.php?id=3">elon</a> liked your meme "<a href="imagedisplay.php?id=28&world=1&uid=0&gid=0">SHSUHS</a>"', '', 28, 1, '2017-03-25 20:32:48'),
(24, 3, 1, 'imageComment', '<a href="userprofile.php?id=3">elon</a> replied on your comment <a href="imagedisplay.php?id=28&world=1&uid=0&gid=0#commentdiv4">"gtrgtr"</a> (in the World)', '', 4, 1, '2017-03-25 20:53:04'),
(25, 3, 1, 'replyLike', '<a href="userprofile.php?id=3">elon</a> liked your reply "faltu comment"', '', 3, 1, '2017-03-25 20:53:08'),
(26, 1, 3, 'imageComment', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=4&world=1&uid=0&gid=0#commentdiv15">"yo"</a> (in the World)', '', 15, 1, '2017-03-25 21:17:22'),
(27, 5, 1, 'commentLike', '<a href="userprofile.php?id=5">dhrishty</a> liked your comment "hey yo gim..."', '', 15, 1, '2017-03-25 21:22:38'),
(28, 5, 1, 'commentReply', '<a href="userprofile.php?id=5">dhrishty</a> replied on your comment <a href="imagedisplay.php?id=4&world=1&uid=0&gid=0#reply_div5">"hey yo gim..."</a> (in the World)', '', 15, 1, '2017-03-25 21:22:52'),
(34, 3, 1, 'commentReply', '<a href="userprofile.php?id=3">elon</a> replied on your comment <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#reply_div6">"ggggggggggggg"</a> (in the World)', '', 14, 1, '2017-03-26 01:50:35'),
(36, 3, 1, 'answer', '<a href="userprofile.php?id=3">elon</a> posted an answer for your question <a href="questiondisplay.php?id=7#answerdiv55">"Wanna deve..."</a>', '', 55, 1, '2017-03-26 02:45:24'),
(38, 1, 0, 'answerReply', '<a href="userprofile.php?id=1">sharvai</a> replied on your answer <a href="questiondisplay.php?id=7#answerreply_div36">""</a>', '', 55, 0, '2017-03-26 14:09:06'),
(39, 1, 3, 'answerReply', '<a href="userprofile.php?id=1">sharvai</a> replied on your answer <a href="questiondisplay.php?id=7#answerreply_div37">"gggggggggg..."</a>', '', 55, 1, '2017-03-26 14:12:18'),
(41, 3, 1, 'answerReplyLike', '<a href="userprofile.php?id=3">elon</a> liked your reply "<a href="questiondisplay.php?id=7#answerreply_div34">shityy</a>"', '', 34, 1, '2017-03-26 14:27:03'),
(42, 1, 4, 'friendRequest', '<a href="userprofile.php?id=1">sharvai</a> has sent you a friend request', '', 5, 1, '2017-03-26 17:00:07'),
(43, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-26 17:27:38'),
(44, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-26 17:27:38'),
(49, 4, 1, 'rejectFriendRequest', '<a href="userprofile.php?id=4">neha</a> rejected your friend request!', '', 5, 1, '2017-03-26 18:09:45'),
(50, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3"></a> accepted your invitation to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-27 05:28:53'),
(51, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3"></a> accepted your invitation to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-27 05:34:15'),
(52, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3"></a> accepted your invitation to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-27 05:36:11'),
(53, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3">elon</a> accepted your invitation to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-27 05:36:49'),
(54, 2, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=2">jack</a> accepted your invitation to the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 4, 1, '2017-03-27 05:44:22'),
(55, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=5">onceAndForALl</a>"', '', 5, 1, '2017-03-27 23:13:00'),
(56, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=5">onceAndForALl</a>"', '', 5, 1, '2017-03-27 23:13:00'),
(57, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3">elon</a> accepted your invitation to the group "<a href="groupspage.php?id=5">onceAndForALl</a>"', '', 5, 1, '2017-03-27 23:13:35'),
(58, 2, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=2">jack</a> accepted your invitation to the group "<a href="groupspage.php?id=5">onceAndForALl</a>"', '', 5, 1, '2017-03-27 23:13:57'),
(59, 0, 1, 'makeGroupAdmin', 'You are now an admin of the group "<a href="groupspage.php?id=5">onceAndForALl</a>"', '', 0, 1, '2017-03-27 23:14:50'),
(60, 0, 2, 'makeGroupAdmin', 'You are now an admin of the group "<a href="groupspage.php?id=5">onceAndForALl</a>"', '', 0, 1, '2017-03-27 23:14:50'),
(61, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 6, 1, '2017-03-27 23:22:16'),
(62, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 6, 1, '2017-03-27 23:22:16'),
(63, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3">elon</a> accepted your invitation to the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 6, 1, '2017-03-27 23:22:38'),
(64, 2, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=2">jack</a> accepted your invitation to the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 6, 1, '2017-03-27 23:22:58'),
(69, 0, 1, 'makeGroupAdmin', '<a href="userprofile.php?id=3">elon</a> is now an admin of the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 0, 1, '2017-03-27 23:30:43'),
(70, 0, 3, 'makeGroupAdmin', 'You are now an admin of the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 0, 1, '2017-03-27 23:30:43'),
(71, 0, 2, 'makeGroupAdmin', '<a href="userprofile.php?id=3">elon</a> is now an admin of the group "<a href="groupspage.php?id=6">sleepyaf</a>"', '', 0, 1, '2017-03-27 23:30:43'),
(72, 2, 3, 'subscription', 'jack subscribed to you!', '', 0, 1, '2017-03-28 00:12:05'),
(73, 3, 0, 'exitGroup', '<a href="userprofile.php?id=3">sleepyaf</a> has left the group "<a href="groupspage.php?id=6"></a>"', '', 0, 0, '2017-03-28 19:43:23'),
(74, 3, 1, 'exitGroup', '<a href="userprofile.php?id=3">onceAndForALl</a> has left the group "<a href="groupspage.php?id=5"></a>"', '', 0, 1, '2017-03-28 20:33:06'),
(75, 3, 2, 'exitGroup', '<a href="userprofile.php?id=3">onceAndForALl</a> has left the group "<a href="groupspage.php?id=5"></a>"', '', 0, 1, '2017-03-28 20:33:06'),
(76, 0, 1, 'makeGroupAdmin', '<a href="userprofile.php?id=3">elon</a> is now an admin of the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 0, 1, '2017-03-28 20:34:14'),
(77, 0, 3, 'makeGroupAdmin', 'You are now an admin of the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 0, 1, '2017-03-28 20:34:14'),
(78, 0, 2, 'makeGroupAdmin', '<a href="userprofile.php?id=3">elon</a> is now an admin of the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 0, 1, '2017-03-28 20:34:14'),
(79, 1, 3, 'exitGroup', '<a href="userprofile.php?id=1">sharvai</a> has left the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 0, 1, '2017-03-28 20:34:17'),
(80, 1, 2, 'exitGroup', '<a href="userprofile.php?id=1">sharvai</a> has left the group "<a href="groupspage.php?id=4">pagal log</a>"', '', 0, 1, '2017-03-28 20:34:17'),
(81, 1, 2, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=37?world=0&uid=0&gid=5">fefef</a>" (in the group <a href="groupspage.php?id=5">onceAndForALl</a>)', '', 37, 1, '2017-03-29 20:52:11'),
(82, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=37?world=0&uid=3&gid=0">fefef</a>" (in friends)', '', 37, 1, '2017-03-29 20:52:11'),
(84, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=38&world=1&uid=0&gid=0">for all the mfs</a>" (from Subscriptions)', '', 38, 1, '2017-03-29 21:11:25'),
(85, 1, 4, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=38&world=1&uid=0&gid=0">for all the mfs</a>" (from Subscriptions)', '', 38, 1, '2017-03-29 21:11:25'),
(86, 1, 2, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=38&world=0&uid=0&gid=5">for all the mfs</a>" (in the group <a href="groupspage.php?id=5">onceAndForALl</a>)', '', 38, 1, '2017-03-29 21:11:25'),
(88, 11, 1, 'subscription', '<a href="userprofile.php?id=11">deatheater</a> subscribed to you!', '', 0, 1, '2017-04-12 15:33:43'),
(89, 11, 1, 'friendRequest', '<a href="userprofile.php?id=11">deatheater</a> has sent you a friend request', '', 6, 1, '2017-04-12 15:35:04'),
(90, 1, 3, 'imageComment', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=4&world=1&uid=0&gid=0#commentdiv17">"yo"</a> (in the World)', '', 17, 1, '2017-04-23 12:22:53'),
(91, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=41&world=1&uid=0&gid=0">hey all</a>" (from Subscriptions)', '', 41, 1, '2017-04-30 02:43:21'),
(92, 1, 4, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=41&world=1&uid=0&gid=0">hey all</a>" (from Subscriptions)', '', 41, 1, '2017-04-30 02:43:21'),
(93, 1, 11, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=41&world=1&uid=0&gid=0">hey all</a>" (from Subscriptions)', '', 41, 0, '2017-04-30 02:43:21'),
(94, 1, 2, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=41&world=0&uid=2&gid=0">hey all</a>" (in friends)', '', 41, 1, '2017-04-30 02:43:21'),
(95, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=42&world=1&uid=0&gid=0">hihi</a>" (from Subscriptions)', '', 42, 1, '2017-04-30 02:50:29'),
(96, 1, 4, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=42&world=1&uid=0&gid=0">hihi</a>" (from Subscriptions)', '', 42, 1, '2017-04-30 02:50:29'),
(97, 1, 11, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=42&world=1&uid=0&gid=0">hihi</a>" (from Subscriptions)', '', 42, 0, '2017-04-30 02:50:29'),
(98, 1, 2, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=42&world=0&uid=2&gid=0">hihi</a>" (in friends)', '', 42, 1, '2017-04-30 02:50:29'),
(99, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=7">gege</a>"', '', 7, 1, '2017-05-02 02:17:03'),
(100, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3">elon</a> accepted your invitation to the group "<a href="groupspage.php?id=7">gege</a>"', '', 7, 1, '2017-05-02 02:19:22'),
(101, 3, 1, 'answer', '<a href="userprofile.php?id=3">elon</a> posted an answer for your question <a href="questiondisplay.php?id=7#answerdiv57">"Wanna deve..."</a>', '', 57, 1, '2017-05-02 02:23:01'),
(102, 3, 1, 'imageComment', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=28&world=1&uid=0&gid=0#commentdiv18">"SHSUHS"</a> (in the World)', '', 18, 1, '2017-05-03 02:24:05'),
(103, 3, 1, '0', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=28&world=1&uid=0&gid=0#commentdiv19">"SHSUHS"</a> (in the World)', '', 19, 1, '2017-05-03 02:25:48'),
(104, 1, 2, '0', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=10&world=1&uid=0&gid=0#commentdiv20">"gogogo"</a> (in the World)', '', 20, 1, '2017-05-05 20:13:11'),
(105, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=43&world=0&uid=3&gid=0">myrigir</a>" (in friends)', '', 43, 1, '2017-05-24 00:44:54'),
(106, 1, 2, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=43&world=0&uid=2&gid=0">myrigir</a>" (in friends)', '', 43, 1, '2017-05-24 00:44:54'),
(107, 1, 11, 'acceptFriendRequest', '<a href="userprofile.php?id=1">sharvai</a> accepted your friend request!', '', 6, 0, '2017-06-15 14:25:32'),
(108, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=8">haha</a>"', '', 8, 1, '2017-06-15 14:26:49'),
(109, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=8">haha</a>"', '', 8, 1, '2017-06-15 14:26:49'),
(110, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=8">haha</a>"', '', 8, 0, '2017-06-15 14:26:49'),
(111, 3, 1, 'acceptGroupInvite', '<a href="userprofile.php?id=3">elon</a> accepted your invitation to the group "<a href="groupspage.php?id=8">haha</a>"', '', 8, 1, '2017-06-15 14:27:48'),
(112, 3, 1, 'memeUpload', '<a href="userprofile.php?id=3">elon</a> has uploaded a meme "<a href="imagedisplay.php?id=44&world=0&uid=0&gid=8">cvbn</a>" (in the group <a href="groupspage.php?id=8">haha</a>)', '', 44, 1, '2017-06-15 15:12:43'),
(113, 5, 3, 'exitGroup', '<a href="userprofile.php?id=5">dhrishty</a> has left the group "<a href="groupspage.php?id=2">meAndElon</a>"', '', 0, 1, '2017-06-15 15:58:27'),
(114, 5, 3, 'exitGroup', '<a href="userprofile.php?id=5">dhrishty</a> has left the group "<a href="groupspage.php?id=2">meAndElon</a>"', '', 0, 1, '2017-06-15 16:00:09'),
(115, 5, 3, 'exitGroup', '<a href="userprofile.php?id=5">dhrishty</a> has left the group "<a href="groupspage.php?id=2">meAndElon</a>"', '', 0, 1, '2017-06-15 16:04:16'),
(116, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=45&world=1&uid=0&gid=0">edfgb</a>" (from Subscriptions)', '', 45, 1, '2017-06-16 06:59:24'),
(117, 1, 4, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=45&world=1&uid=0&gid=0">edfgb</a>" (from Subscriptions)', '', 45, 1, '2017-06-16 06:59:24'),
(118, 1, 11, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=45&world=1&uid=0&gid=0">edfgb</a>" (from Subscriptions)', '', 45, 0, '2017-06-16 06:59:24'),
(119, 1, 3, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=46&world=1&uid=0&gid=0">deatheater ken</a>" (from Subscriptions)', '', 46, 1, '2017-06-16 07:30:16'),
(120, 1, 4, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=46&world=1&uid=0&gid=0">deatheater ken</a>" (from Subscriptions)', '', 46, 1, '2017-06-16 07:30:16'),
(121, 1, 11, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=46&world=1&uid=0&gid=0">deatheater ken</a>" (from Subscriptions)', '', 46, 0, '2017-06-16 07:30:16'),
(122, 1, 2, 'memeUpload', '<a href="userprofile.php?id=1">sharvai</a> has uploaded a meme "<a href="imagedisplay.php?id=46&world=0&uid=0&gid=5">deatheater ken</a>" (in the group <a href="groupspage.php?id=5">onceAndForALl</a>)', '', 46, 1, '2017-06-16 07:30:16'),
(123, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=9">1'' OR ''1''=''1</a>"', '', 9, 1, '2017-06-16 10:19:28'),
(124, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=9">1'' OR ''1''=''1</a>"', '', 9, 1, '2017-06-16 10:19:28'),
(125, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=9">1'' OR ''1''=''1</a>"', '', 9, 0, '2017-06-16 10:19:28'),
(126, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=10">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 10, 1, '2017-06-16 10:19:28'),
(127, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=10">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 10, 1, '2017-06-16 10:19:28'),
(128, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=10">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 10, 0, '2017-06-16 10:19:28'),
(129, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=11">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 11, 1, '2017-06-16 10:19:28'),
(130, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=11">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 11, 1, '2017-06-16 10:19:28'),
(131, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=11">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 11, 0, '2017-06-16 10:19:28'),
(132, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=12">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 12, 1, '2017-06-16 10:19:28'),
(133, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=12">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 12, 1, '2017-06-16 10:19:28'),
(134, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=12">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 12, 0, '2017-06-16 10:19:28'),
(135, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=13">'' OR username IS NOT NULL OR username = ''</a>"', '', 13, 1, '2017-06-16 10:19:28'),
(136, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=13">'' OR username IS NOT NULL OR username = ''</a>"', '', 13, 1, '2017-06-16 10:19:28'),
(137, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=13">'' OR username IS NOT NULL OR username = ''</a>"', '', 13, 0, '2017-06-16 10:19:28'),
(138, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=14">1'' AND non_existant_table = ''1</a>"', '', 14, 1, '2017-06-16 10:19:28'),
(139, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=14">1'' AND non_existant_table = ''1</a>"', '', 14, 1, '2017-06-16 10:19:28'),
(140, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=14">1'' AND non_existant_table = ''1</a>"', '', 14, 0, '2017-06-16 10:19:28'),
(141, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=15">1''1</a>"', '', 15, 1, '2017-06-16 10:19:28'),
(142, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=15">1''1</a>"', '', 15, 1, '2017-06-16 10:19:28'),
(143, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=15">1''1</a>"', '', 15, 0, '2017-06-16 10:19:28'),
(144, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=16">''; DESC users; --</a>"', '', 16, 1, '2017-06-16 10:19:28'),
(145, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=16">''; DESC users; --</a>"', '', 16, 1, '2017-06-16 10:19:28'),
(146, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=16">''; DESC users; --</a>"', '', 16, 0, '2017-06-16 10:19:28'),
(147, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=17">1 AND USER_NAME() = ''dbo''</a>"', '', 17, 1, '2017-06-16 10:19:28'),
(148, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=17">1 AND USER_NAME() = ''dbo''</a>"', '', 17, 1, '2017-06-16 10:19:28'),
(149, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=17">1 AND USER_NAME() = ''dbo''</a>"', '', 17, 0, '2017-06-16 10:19:28'),
(150, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=18">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 18, 1, '2017-06-16 10:19:28'),
(151, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=18">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 18, 1, '2017-06-16 10:19:28'),
(152, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=18">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 18, 0, '2017-06-16 10:19:28'),
(153, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=19">1 AND 1=1</a>"', '', 19, 1, '2017-06-16 10:19:28'),
(154, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=19">1 AND 1=1</a>"', '', 19, 1, '2017-06-16 10:19:28'),
(155, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=19">1 AND 1=1</a>"', '', 19, 0, '2017-06-16 10:19:28'),
(156, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=20">1 EXEC XP_</a>"', '', 20, 1, '2017-06-16 10:19:28'),
(157, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=20">1 EXEC XP_</a>"', '', 20, 1, '2017-06-16 10:19:28'),
(158, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=20">1 EXEC XP_</a>"', '', 20, 0, '2017-06-16 10:19:28'),
(159, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=21">1''1</a>"', '', 21, 1, '2017-06-16 10:19:28'),
(160, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=21">1''1</a>"', '', 21, 1, '2017-06-16 10:19:28'),
(161, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=21">1''1</a>"', '', 21, 0, '2017-06-16 10:19:28'),
(162, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=22">1'' OR ''1''=''1</a>"', '', 22, 1, '2017-06-16 10:19:28'),
(163, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=22">1'' OR ''1''=''1</a>"', '', 22, 1, '2017-06-16 10:19:28'),
(164, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=22">1'' OR ''1''=''1</a>"', '', 22, 0, '2017-06-16 10:19:28'),
(165, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=23">1 OR 1=1</a>"', '', 23, 1, '2017-06-16 10:19:28'),
(166, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=23">1 OR 1=1</a>"', '', 23, 1, '2017-06-16 10:19:28'),
(167, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=23">1 OR 1=1</a>"', '', 23, 0, '2017-06-16 10:19:28'),
(168, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=24">1'' OR ''1''=''1</a>"', '', 24, 1, '2017-06-16 10:22:55'),
(169, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=24">1'' OR ''1''=''1</a>"', '', 24, 1, '2017-06-16 10:22:55'),
(170, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=24">1'' OR ''1''=''1</a>"', '', 24, 0, '2017-06-16 10:22:55'),
(171, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=25">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 25, 1, '2017-06-16 10:22:55'),
(172, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=25">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 25, 1, '2017-06-16 10:22:55'),
(173, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=25">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 25, 0, '2017-06-16 10:22:55'),
(174, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=26">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 26, 1, '2017-06-16 10:22:55'),
(175, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=26">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 26, 1, '2017-06-16 10:22:55'),
(176, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=26">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 26, 0, '2017-06-16 10:22:55'),
(177, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=27">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 27, 1, '2017-06-16 10:22:55'),
(178, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=27">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 27, 1, '2017-06-16 10:22:55'),
(179, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=27">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 27, 0, '2017-06-16 10:22:55'),
(180, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=28">'' OR username IS NOT NULL OR username = ''</a>"', '', 28, 1, '2017-06-16 10:22:55'),
(181, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=28">'' OR username IS NOT NULL OR username = ''</a>"', '', 28, 1, '2017-06-16 10:22:55'),
(182, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=28">'' OR username IS NOT NULL OR username = ''</a>"', '', 28, 0, '2017-06-16 10:22:55'),
(183, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=29">1'' AND non_existant_table = ''1</a>"', '', 29, 1, '2017-06-16 10:22:55'),
(184, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=29">1'' AND non_existant_table = ''1</a>"', '', 29, 1, '2017-06-16 10:22:55'),
(185, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=29">1'' AND non_existant_table = ''1</a>"', '', 29, 0, '2017-06-16 10:22:55'),
(186, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=30">1''1</a>"', '', 30, 1, '2017-06-16 10:22:55'),
(187, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=30">1''1</a>"', '', 30, 1, '2017-06-16 10:22:55'),
(188, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=30">1''1</a>"', '', 30, 0, '2017-06-16 10:22:55'),
(189, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=31">''; DESC users; --</a>"', '', 31, 1, '2017-06-16 10:22:55'),
(190, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=31">''; DESC users; --</a>"', '', 31, 1, '2017-06-16 10:22:55'),
(191, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=31">''; DESC users; --</a>"', '', 31, 0, '2017-06-16 10:22:55'),
(192, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=32">1 AND USER_NAME() = ''dbo''</a>"', '', 32, 1, '2017-06-16 10:22:55'),
(193, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=32">1 AND USER_NAME() = ''dbo''</a>"', '', 32, 1, '2017-06-16 10:22:55'),
(194, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=32">1 AND USER_NAME() = ''dbo''</a>"', '', 32, 0, '2017-06-16 10:22:55'),
(195, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=33">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 33, 1, '2017-06-16 10:22:55'),
(196, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=33">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 33, 1, '2017-06-16 10:22:55'),
(197, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=33">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 33, 0, '2017-06-16 10:22:55'),
(198, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=34">1 AND 1=1</a>"', '', 34, 1, '2017-06-16 10:22:55'),
(199, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=34">1 AND 1=1</a>"', '', 34, 1, '2017-06-16 10:22:55'),
(200, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=34">1 AND 1=1</a>"', '', 34, 0, '2017-06-16 10:22:55'),
(201, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=35">1 EXEC XP_</a>"', '', 35, 1, '2017-06-16 10:22:55'),
(202, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=35">1 EXEC XP_</a>"', '', 35, 1, '2017-06-16 10:22:55'),
(203, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=35">1 EXEC XP_</a>"', '', 35, 0, '2017-06-16 10:22:55'),
(204, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=36">1''1</a>"', '', 36, 1, '2017-06-16 10:22:55'),
(205, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=36">1''1</a>"', '', 36, 1, '2017-06-16 10:22:55'),
(206, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=36">1''1</a>"', '', 36, 0, '2017-06-16 10:22:55'),
(207, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=37">1'' OR ''1''=''1</a>"', '', 37, 1, '2017-06-16 10:22:55'),
(208, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=37">1'' OR ''1''=''1</a>"', '', 37, 1, '2017-06-16 10:22:55'),
(209, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=37">1'' OR ''1''=''1</a>"', '', 37, 0, '2017-06-16 10:22:55'),
(210, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=38">1 OR 1=1</a>"', '', 38, 1, '2017-06-16 10:22:55'),
(211, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=38">1 OR 1=1</a>"', '', 38, 1, '2017-06-16 10:22:55'),
(212, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=38">1 OR 1=1</a>"', '', 38, 0, '2017-06-16 10:22:55'),
(213, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=39">1'' OR ''1''=''1</a>"', '', 39, 1, '2017-06-16 10:22:55'),
(214, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=39">1'' OR ''1''=''1</a>"', '', 39, 1, '2017-06-16 10:22:55'),
(215, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=39">1'' OR ''1''=''1</a>"', '', 39, 0, '2017-06-16 10:22:55'),
(216, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=40">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 40, 1, '2017-06-16 10:22:55'),
(217, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=40">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 40, 1, '2017-06-16 10:22:55'),
(218, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=40">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 40, 0, '2017-06-16 10:22:55'),
(219, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=41">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 41, 1, '2017-06-16 10:22:55'),
(220, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=41">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 41, 1, '2017-06-16 10:22:55'),
(221, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=41">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 41, 0, '2017-06-16 10:22:55'),
(222, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=42">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 42, 1, '2017-06-16 10:22:55'),
(223, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=42">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 42, 1, '2017-06-16 10:22:55'),
(224, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=42">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 42, 0, '2017-06-16 10:22:55'),
(225, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=43">'' OR username IS NOT NULL OR username = ''</a>"', '', 43, 1, '2017-06-16 10:22:55'),
(226, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=43">'' OR username IS NOT NULL OR username = ''</a>"', '', 43, 1, '2017-06-16 10:22:55'),
(227, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=43">'' OR username IS NOT NULL OR username = ''</a>"', '', 43, 0, '2017-06-16 10:22:55'),
(228, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=44">1'' AND non_existant_table = ''1</a>"', '', 44, 1, '2017-06-16 10:22:55'),
(229, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=44">1'' AND non_existant_table = ''1</a>"', '', 44, 1, '2017-06-16 10:22:55'),
(230, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=44">1'' AND non_existant_table = ''1</a>"', '', 44, 0, '2017-06-16 10:22:55'),
(231, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=45">1''1</a>"', '', 45, 1, '2017-06-16 10:22:55'),
(232, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=45">1''1</a>"', '', 45, 1, '2017-06-16 10:22:55'),
(233, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=45">1''1</a>"', '', 45, 0, '2017-06-16 10:22:55'),
(234, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=46">''; DESC users; --</a>"', '', 46, 1, '2017-06-16 10:22:55'),
(235, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=46">''; DESC users; --</a>"', '', 46, 1, '2017-06-16 10:22:55'),
(236, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=46">''; DESC users; --</a>"', '', 46, 0, '2017-06-16 10:22:55'),
(237, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=47">1 AND USER_NAME() = ''dbo''</a>"', '', 47, 1, '2017-06-16 10:22:55'),
(238, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=47">1 AND USER_NAME() = ''dbo''</a>"', '', 47, 1, '2017-06-16 10:22:55'),
(239, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=47">1 AND USER_NAME() = ''dbo''</a>"', '', 47, 0, '2017-06-16 10:22:55'),
(240, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=48">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 48, 1, '2017-06-16 10:22:55'),
(241, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=48">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 48, 1, '2017-06-16 10:22:55'),
(242, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=48">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 48, 0, '2017-06-16 10:22:55'),
(243, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=49">1 AND 1=1</a>"', '', 49, 1, '2017-06-16 10:22:55'),
(244, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=49">1 AND 1=1</a>"', '', 49, 1, '2017-06-16 10:22:55'),
(245, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=49">1 AND 1=1</a>"', '', 49, 0, '2017-06-16 10:22:55'),
(246, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=50">1 EXEC XP_</a>"', '', 50, 1, '2017-06-16 10:22:55'),
(247, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=50">1 EXEC XP_</a>"', '', 50, 1, '2017-06-16 10:22:55'),
(248, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=50">1 EXEC XP_</a>"', '', 50, 0, '2017-06-16 10:22:55'),
(249, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=51">1''1</a>"', '', 51, 1, '2017-06-16 10:22:55'),
(250, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=51">1''1</a>"', '', 51, 1, '2017-06-16 10:22:55'),
(251, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=51">1''1</a>"', '', 51, 0, '2017-06-16 10:22:55'),
(252, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=52">1'' OR ''1''=''1</a>"', '', 52, 1, '2017-06-16 10:22:55'),
(253, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=52">1'' OR ''1''=''1</a>"', '', 52, 1, '2017-06-16 10:22:55'),
(254, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=52">1'' OR ''1''=''1</a>"', '', 52, 0, '2017-06-16 10:22:55'),
(255, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=53">1 OR 1=1</a>"', '', 53, 1, '2017-06-16 10:22:55'),
(256, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=53">1 OR 1=1</a>"', '', 53, 1, '2017-06-16 10:22:55'),
(257, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=53">1 OR 1=1</a>"', '', 53, 0, '2017-06-16 10:22:55'),
(258, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=54">1'' OR ''1''=''1</a>"', '', 54, 1, '2017-06-16 10:31:11'),
(259, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=54">1'' OR ''1''=''1</a>"', '', 54, 1, '2017-06-16 10:31:11'),
(260, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=54">1'' OR ''1''=''1</a>"', '', 54, 0, '2017-06-16 10:31:11'),
(261, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=55">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 55, 1, '2017-06-16 10:31:11'),
(262, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=55">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 55, 1, '2017-06-16 10:31:11'),
(263, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=55">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 55, 0, '2017-06-16 10:31:11'),
(264, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=56">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 56, 1, '2017-06-16 10:31:11'),
(265, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=56">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 56, 1, '2017-06-16 10:31:11'),
(266, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=56">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 56, 0, '2017-06-16 10:31:11'),
(267, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=57">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 57, 1, '2017-06-16 10:31:11'),
(268, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=57">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 57, 1, '2017-06-16 10:31:11'),
(269, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=57">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 57, 0, '2017-06-16 10:31:11'),
(270, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=58">'' OR username IS NOT NULL OR username = ''</a>"', '', 58, 1, '2017-06-16 10:31:11'),
(271, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=58">'' OR username IS NOT NULL OR username = ''</a>"', '', 58, 1, '2017-06-16 10:31:11'),
(272, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=58">'' OR username IS NOT NULL OR username = ''</a>"', '', 58, 0, '2017-06-16 10:31:11'),
(273, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=59">1'' AND non_existant_table = ''1</a>"', '', 59, 1, '2017-06-16 10:31:11'),
(274, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=59">1'' AND non_existant_table = ''1</a>"', '', 59, 1, '2017-06-16 10:31:11'),
(275, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=59">1'' AND non_existant_table = ''1</a>"', '', 59, 0, '2017-06-16 10:31:11');
INSERT INTO `notifications_table` (`id`, `senderId`, `receiverId`, `notificationType`, `notification`, `notificationLink`, `notificationForEventId`, `viewingStatus`, `datetime`) VALUES
(276, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=60">1''1</a>"', '', 60, 1, '2017-06-16 10:31:11'),
(277, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=60">1''1</a>"', '', 60, 1, '2017-06-16 10:31:11'),
(278, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=60">1''1</a>"', '', 60, 0, '2017-06-16 10:31:11'),
(279, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=61">''; DESC users; --</a>"', '', 61, 1, '2017-06-16 10:31:11'),
(280, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=61">''; DESC users; --</a>"', '', 61, 1, '2017-06-16 10:31:11'),
(281, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=61">''; DESC users; --</a>"', '', 61, 0, '2017-06-16 10:31:11'),
(282, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=62">1 AND USER_NAME() = ''dbo''</a>"', '', 62, 1, '2017-06-16 10:31:11'),
(283, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=62">1 AND USER_NAME() = ''dbo''</a>"', '', 62, 1, '2017-06-16 10:31:11'),
(284, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=62">1 AND USER_NAME() = ''dbo''</a>"', '', 62, 0, '2017-06-16 10:31:11'),
(285, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=63">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 63, 1, '2017-06-16 10:31:11'),
(286, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=63">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 63, 1, '2017-06-16 10:31:11'),
(287, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=63">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 63, 0, '2017-06-16 10:31:11'),
(288, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=64">1 AND 1=1</a>"', '', 64, 1, '2017-06-16 10:31:11'),
(289, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=64">1 AND 1=1</a>"', '', 64, 1, '2017-06-16 10:31:11'),
(290, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=64">1 AND 1=1</a>"', '', 64, 0, '2017-06-16 10:31:11'),
(291, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=65">1 EXEC XP_</a>"', '', 65, 1, '2017-06-16 10:31:11'),
(292, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=65">1 EXEC XP_</a>"', '', 65, 1, '2017-06-16 10:31:11'),
(293, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=65">1 EXEC XP_</a>"', '', 65, 0, '2017-06-16 10:31:11'),
(294, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=66">1''1</a>"', '', 66, 1, '2017-06-16 10:31:11'),
(295, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=66">1''1</a>"', '', 66, 1, '2017-06-16 10:31:11'),
(296, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=66">1''1</a>"', '', 66, 0, '2017-06-16 10:31:11'),
(297, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=67">1'' OR ''1''=''1</a>"', '', 67, 1, '2017-06-16 10:31:11'),
(298, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=67">1'' OR ''1''=''1</a>"', '', 67, 1, '2017-06-16 10:31:11'),
(299, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=67">1'' OR ''1''=''1</a>"', '', 67, 0, '2017-06-16 10:31:11'),
(300, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=68">1 OR 1=1</a>"', '', 68, 1, '2017-06-16 10:31:11'),
(301, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=68">1 OR 1=1</a>"', '', 68, 1, '2017-06-16 10:31:11'),
(302, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=68">1 OR 1=1</a>"', '', 68, 0, '2017-06-16 10:31:11'),
(303, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=69">1'' OR ''1''=''1</a>"', '', 69, 1, '2017-06-16 10:33:21'),
(304, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=69">1'' OR ''1''=''1</a>"', '', 69, 1, '2017-06-16 10:33:21'),
(305, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=69">1'' OR ''1''=''1</a>"', '', 69, 0, '2017-06-16 10:33:21'),
(306, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=70">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 70, 1, '2017-06-16 10:33:21'),
(307, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=70">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 70, 1, '2017-06-16 10:33:21'),
(308, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=70">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 70, 0, '2017-06-16 10:33:21'),
(309, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=71">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 71, 1, '2017-06-16 10:33:21'),
(310, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=71">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 71, 1, '2017-06-16 10:33:21'),
(311, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=71">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 71, 0, '2017-06-16 10:33:21'),
(312, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=72">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 72, 1, '2017-06-16 10:33:21'),
(313, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=72">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 72, 1, '2017-06-16 10:33:21'),
(314, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=72">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 72, 0, '2017-06-16 10:33:21'),
(315, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=73">'' OR username IS NOT NULL OR username = ''</a>"', '', 73, 1, '2017-06-16 10:33:21'),
(316, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=73">'' OR username IS NOT NULL OR username = ''</a>"', '', 73, 1, '2017-06-16 10:33:21'),
(317, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=73">'' OR username IS NOT NULL OR username = ''</a>"', '', 73, 0, '2017-06-16 10:33:21'),
(318, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=74">1'' AND non_existant_table = ''1</a>"', '', 74, 1, '2017-06-16 10:33:21'),
(319, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=74">1'' AND non_existant_table = ''1</a>"', '', 74, 1, '2017-06-16 10:33:21'),
(320, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=74">1'' AND non_existant_table = ''1</a>"', '', 74, 0, '2017-06-16 10:33:21'),
(321, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=75">1''1</a>"', '', 75, 1, '2017-06-16 10:33:21'),
(322, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=75">1''1</a>"', '', 75, 1, '2017-06-16 10:33:21'),
(323, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=75">1''1</a>"', '', 75, 0, '2017-06-16 10:33:21'),
(324, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=76">''; DESC users; --</a>"', '', 76, 1, '2017-06-16 10:33:21'),
(325, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=76">''; DESC users; --</a>"', '', 76, 1, '2017-06-16 10:33:21'),
(326, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=76">''; DESC users; --</a>"', '', 76, 0, '2017-06-16 10:33:21'),
(327, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=77">1 AND USER_NAME() = ''dbo''</a>"', '', 77, 1, '2017-06-16 10:33:21'),
(328, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=77">1 AND USER_NAME() = ''dbo''</a>"', '', 77, 1, '2017-06-16 10:33:21'),
(329, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=77">1 AND USER_NAME() = ''dbo''</a>"', '', 77, 0, '2017-06-16 10:33:21'),
(330, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=78">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 78, 1, '2017-06-16 10:33:21'),
(331, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=78">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 78, 1, '2017-06-16 10:33:21'),
(332, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=78">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 78, 0, '2017-06-16 10:33:21'),
(333, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=79">1 AND 1=1</a>"', '', 79, 1, '2017-06-16 10:33:21'),
(334, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=79">1 AND 1=1</a>"', '', 79, 1, '2017-06-16 10:33:21'),
(335, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=79">1 AND 1=1</a>"', '', 79, 0, '2017-06-16 10:33:21'),
(336, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=80">1 EXEC XP_</a>"', '', 80, 1, '2017-06-16 10:33:21'),
(337, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=80">1 EXEC XP_</a>"', '', 80, 1, '2017-06-16 10:33:21'),
(338, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=80">1 EXEC XP_</a>"', '', 80, 0, '2017-06-16 10:33:21'),
(339, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=81">1''1</a>"', '', 81, 1, '2017-06-16 10:33:21'),
(340, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=81">1''1</a>"', '', 81, 1, '2017-06-16 10:33:21'),
(341, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=81">1''1</a>"', '', 81, 0, '2017-06-16 10:33:21'),
(342, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=82">1'' OR ''1''=''1</a>"', '', 82, 1, '2017-06-16 10:33:21'),
(343, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=82">1'' OR ''1''=''1</a>"', '', 82, 1, '2017-06-16 10:33:21'),
(344, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=82">1'' OR ''1''=''1</a>"', '', 82, 0, '2017-06-16 10:33:21'),
(345, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=83">1 OR 1=1</a>"', '', 83, 1, '2017-06-16 10:33:21'),
(346, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=83">1 OR 1=1</a>"', '', 83, 1, '2017-06-16 10:33:21'),
(347, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=83">1 OR 1=1</a>"', '', 83, 0, '2017-06-16 10:33:21'),
(348, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=84">1'' OR ''1''=''1</a>"', '', 84, 1, '2017-06-16 10:36:39'),
(349, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=84">1'' OR ''1''=''1</a>"', '', 84, 1, '2017-06-16 10:36:39'),
(350, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=84">1'' OR ''1''=''1</a>"', '', 84, 0, '2017-06-16 10:36:39'),
(351, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=85">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 85, 1, '2017-06-16 10:36:39'),
(352, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=85">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 85, 1, '2017-06-16 10:36:39'),
(353, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=85">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 85, 0, '2017-06-16 10:36:39'),
(354, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=86">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 86, 1, '2017-06-16 10:36:39'),
(355, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=86">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 86, 1, '2017-06-16 10:36:39'),
(356, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=86">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 86, 0, '2017-06-16 10:36:39'),
(357, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=87">1'' AND non_existant_table = ''1</a>"', '', 87, 1, '2017-06-16 10:36:39'),
(358, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=87">1'' AND non_existant_table = ''1</a>"', '', 87, 1, '2017-06-16 10:36:39'),
(359, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=87">1'' AND non_existant_table = ''1</a>"', '', 87, 0, '2017-06-16 10:36:39'),
(360, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=88">'' OR username IS NOT NULL OR username = ''</a>"', '', 88, 1, '2017-06-16 10:36:39'),
(361, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=88">'' OR username IS NOT NULL OR username = ''</a>"', '', 88, 1, '2017-06-16 10:36:39'),
(362, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=88">'' OR username IS NOT NULL OR username = ''</a>"', '', 88, 0, '2017-06-16 10:36:39'),
(363, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=89">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 89, 1, '2017-06-16 10:36:39'),
(364, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=89">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 89, 1, '2017-06-16 10:36:39'),
(365, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=89">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 89, 0, '2017-06-16 10:36:39'),
(366, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=90">1''1</a>"', '', 90, 1, '2017-06-16 10:36:39'),
(367, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=90">1''1</a>"', '', 90, 1, '2017-06-16 10:36:39'),
(368, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=90">1''1</a>"', '', 90, 0, '2017-06-16 10:36:39'),
(369, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=91">''; DESC users; --</a>"', '', 91, 1, '2017-06-16 10:36:39'),
(370, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=91">''; DESC users; --</a>"', '', 91, 1, '2017-06-16 10:36:39'),
(371, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=91">''; DESC users; --</a>"', '', 91, 0, '2017-06-16 10:36:39'),
(372, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=92">1 AND USER_NAME() = ''dbo''</a>"', '', 92, 1, '2017-06-16 10:36:39'),
(373, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=92">1 AND USER_NAME() = ''dbo''</a>"', '', 92, 1, '2017-06-16 10:36:39'),
(374, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=92">1 AND USER_NAME() = ''dbo''</a>"', '', 92, 0, '2017-06-16 10:36:39'),
(375, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=93">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 93, 1, '2017-06-16 10:36:39'),
(376, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=93">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 93, 1, '2017-06-16 10:36:39'),
(377, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=93">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 93, 0, '2017-06-16 10:36:39'),
(378, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=94">1 AND 1=1</a>"', '', 94, 1, '2017-06-16 10:36:39'),
(379, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=94">1 AND 1=1</a>"', '', 94, 1, '2017-06-16 10:36:39'),
(380, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=94">1 AND 1=1</a>"', '', 94, 0, '2017-06-16 10:36:39'),
(381, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=95">1 EXEC XP_</a>"', '', 95, 1, '2017-06-16 10:36:39'),
(382, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=95">1 EXEC XP_</a>"', '', 95, 1, '2017-06-16 10:36:39'),
(383, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=95">1 EXEC XP_</a>"', '', 95, 0, '2017-06-16 10:36:39'),
(384, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=96">1''1</a>"', '', 96, 1, '2017-06-16 10:36:39'),
(385, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=96">1''1</a>"', '', 96, 1, '2017-06-16 10:36:39'),
(386, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=96">1''1</a>"', '', 96, 0, '2017-06-16 10:36:39'),
(387, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=97">1'' OR ''1''=''1</a>"', '', 97, 1, '2017-06-16 10:36:39'),
(388, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=97">1'' OR ''1''=''1</a>"', '', 97, 1, '2017-06-16 10:36:39'),
(389, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=97">1'' OR ''1''=''1</a>"', '', 97, 0, '2017-06-16 10:36:39'),
(390, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=98">1 OR 1=1</a>"', '', 98, 1, '2017-06-16 10:36:39'),
(391, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=98">1 OR 1=1</a>"', '', 98, 1, '2017-06-16 10:36:39'),
(392, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=98">1 OR 1=1</a>"', '', 98, 0, '2017-06-16 10:36:39'),
(393, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=99">1'' OR ''1''=''1</a>"', '', 99, 1, '2017-06-16 10:44:20'),
(394, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=99">1'' OR ''1''=''1</a>"', '', 99, 1, '2017-06-16 10:44:20'),
(395, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=99">1'' OR ''1''=''1</a>"', '', 99, 0, '2017-06-16 10:44:20'),
(396, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=100">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 100, 1, '2017-06-16 10:44:20'),
(397, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=100">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 100, 1, '2017-06-16 10:44:20'),
(398, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=100">1 UNI/**/ON SELECT ALL FROM WHERE</a>"', '', 100, 0, '2017-06-16 10:44:20'),
(399, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=101">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 101, 1, '2017-06-16 10:44:20'),
(400, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=101">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 101, 1, '2017-06-16 10:44:20'),
(401, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=101">1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</a>"', '', 101, 0, '2017-06-16 10:44:20'),
(402, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=102">'' OR username IS NOT NULL OR username = ''</a>"', '', 102, 1, '2017-06-16 10:44:20'),
(403, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=102">'' OR username IS NOT NULL OR username = ''</a>"', '', 102, 1, '2017-06-16 10:44:20'),
(404, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=102">'' OR username IS NOT NULL OR username = ''</a>"', '', 102, 0, '2017-06-16 10:44:20'),
(405, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=103">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 103, 1, '2017-06-16 10:44:20'),
(406, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=103">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 103, 1, '2017-06-16 10:44:20'),
(407, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=103">1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</a>"', '', 103, 0, '2017-06-16 10:44:20'),
(408, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=104">1'' AND non_existant_table = ''1</a>"', '', 104, 1, '2017-06-16 10:44:20'),
(409, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=104">1'' AND non_existant_table = ''1</a>"', '', 104, 1, '2017-06-16 10:44:20'),
(410, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=104">1'' AND non_existant_table = ''1</a>"', '', 104, 0, '2017-06-16 10:44:20'),
(411, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=105">1''1</a>"', '', 105, 1, '2017-06-16 10:44:20'),
(412, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=105">1''1</a>"', '', 105, 1, '2017-06-16 10:44:20'),
(413, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=105">1''1</a>"', '', 105, 0, '2017-06-16 10:44:20'),
(414, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=106">''; DESC users; --</a>"', '', 106, 1, '2017-06-16 10:44:20'),
(415, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=106">''; DESC users; --</a>"', '', 106, 1, '2017-06-16 10:44:20'),
(416, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=106">''; DESC users; --</a>"', '', 106, 0, '2017-06-16 10:44:20'),
(417, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=107">1 AND USER_NAME() = ''dbo''</a>"', '', 107, 1, '2017-06-16 10:44:20'),
(418, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=107">1 AND USER_NAME() = ''dbo''</a>"', '', 107, 1, '2017-06-16 10:44:20'),
(419, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=107">1 AND USER_NAME() = ''dbo''</a>"', '', 107, 0, '2017-06-16 10:44:20'),
(420, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=108">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 108, 1, '2017-06-16 10:44:20'),
(421, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=108">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 108, 1, '2017-06-16 10:44:20'),
(422, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=108">1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</a>"', '', 108, 0, '2017-06-16 10:44:20'),
(423, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=109">1 AND 1=1</a>"', '', 109, 1, '2017-06-16 10:44:20'),
(424, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=109">1 AND 1=1</a>"', '', 109, 1, '2017-06-16 10:44:20'),
(425, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=109">1 AND 1=1</a>"', '', 109, 0, '2017-06-16 10:44:20'),
(426, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=110">1 EXEC XP_</a>"', '', 110, 1, '2017-06-16 10:44:20'),
(427, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=110">1 EXEC XP_</a>"', '', 110, 1, '2017-06-16 10:44:20'),
(428, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=110">1 EXEC XP_</a>"', '', 110, 0, '2017-06-16 10:44:20'),
(429, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=111">1''1</a>"', '', 111, 1, '2017-06-16 10:44:20'),
(430, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=111">1''1</a>"', '', 111, 1, '2017-06-16 10:44:20'),
(431, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=111">1''1</a>"', '', 111, 0, '2017-06-16 10:44:20'),
(432, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=112">1'' OR ''1''=''1</a>"', '', 112, 1, '2017-06-16 10:44:20'),
(433, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=112">1'' OR ''1''=''1</a>"', '', 112, 1, '2017-06-16 10:44:20'),
(434, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=112">1'' OR ''1''=''1</a>"', '', 112, 0, '2017-06-16 10:44:20'),
(435, 1, 3, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=113">1 OR 1=1</a>"', '', 113, 1, '2017-06-16 10:44:20'),
(436, 1, 2, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=113">1 OR 1=1</a>"', '', 113, 1, '2017-06-16 10:44:20'),
(437, 1, 11, 'groupInvitation', '<a href="userprofile.php?id=1">sharvai</a> has invited you to the group "<a href="groupspage.php?id=113">1 OR 1=1</a>"', '', 113, 0, '2017-06-16 10:44:20'),
(594, 1, 3, 'commentReply', '<a href="userprofile.php?id=1">sharvai</a> replied on your comment <a href="imagedisplay.php?id=18&world=1&uid=0&gid=0#reply_div7">"rrrrrrrrrr..."</a> (in the World)', '', 13, 1, '2017-06-22 15:49:10'),
(595, 1, 3, 'commentReply', '<a href="userprofile.php?id=1">sharvai</a> replied on your comment <a href="imagedisplay.php?id=18&world=1&uid=0&gid=0#reply_div8">"rrrrrrrrrr..."</a> (in the World)', '', 13, 1, '2017-06-22 15:49:21'),
(734, 53, 1, 'friendRequest', '<a href="userprofile.php?id=53">jackdie</a> has sent you a friend request', '', 7, 1, '2017-06-26 16:19:32'),
(735, 1, 53, 'acceptFriendRequest', '<a href="userprofile.php?id=1" class="notif-link">\r\n					 <div class="notif">\r\n					 	<img src="" class="notif-dp">\r\n					 	<p class="notif-text">sharvai accepted your friend request!</p>\r\n					 </div>\r\n					 </a>', '', 7, 0, '2017-06-26 16:23:03'),
(736, 1, 53, 'acceptFriendRequest', '<a href="userprofile.php?id=1">sharvai</a> accepted your friend request!', '', 7, 0, '2017-06-26 16:25:10'),
(737, 1, 53, 'acceptFriendRequest', '<a href="userprofile.php?id=1" class="notif-link">\r\n					 <div class="notif">\r\n					 	<img src="" class="notif-dp">\r\n					 	<p class="notif-text">sharvai accepted your friend request!</p>\r\n					 </div>\r\n					 </a>', '', 7, 0, '2017-06-26 16:31:03'),
(738, 1, 53, 'acceptFriendRequest', 'sharvai accepted your friend request!', 'userprofile.php?id=1', 7, 0, '2017-06-26 19:58:44'),
(742, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=114', 114, 1, '2017-06-30 13:03:16'),
(743, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=114', 114, 1, '2017-06-30 13:03:16'),
(744, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=114', 114, 1, '2017-06-30 13:03:16'),
(745, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=114', 114, 0, '2017-06-30 13:03:16'),
(746, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=114', 114, 0, '2017-06-30 13:03:16'),
(747, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNI/**/ON SELECT ALL FROM WHERE</i>"', 'groupspage.php?id=115', 115, 1, '2017-06-30 13:03:16'),
(748, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNI/**/ON SELECT ALL FROM WHERE</i>"', 'groupspage.php?id=115', 115, 1, '2017-06-30 13:03:16'),
(749, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNI/**/ON SELECT ALL FROM WHERE</i>"', 'groupspage.php?id=115', 115, 1, '2017-06-30 13:03:16'),
(750, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNI/**/ON SELECT ALL FROM WHERE</i>"', 'groupspage.php?id=115', 115, 0, '2017-06-30 13:03:16'),
(751, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNI/**/ON SELECT ALL FROM WHERE</i>"', 'groupspage.php?id=115', 115, 0, '2017-06-30 13:03:16'),
(752, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</i>"', 'groupspage.php?id=116', 116, 1, '2017-06-30 13:03:16'),
(753, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</i>"', 'groupspage.php?id=116', 116, 1, '2017-06-30 13:03:16'),
(754, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</i>"', 'groupspage.php?id=116', 116, 1, '2017-06-30 13:03:16'),
(755, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</i>"', 'groupspage.php?id=116', 116, 0, '2017-06-30 13:03:16'),
(756, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 UNION ALL SELECT 1,2,3,4,5,6,name FROM sysObjects WHERE xtype = ''U'' --</i>"', 'groupspage.php?id=116', 116, 0, '2017-06-30 13:03:16'),
(757, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</i>"', 'groupspage.php?id=117', 117, 1, '2017-06-30 13:03:16'),
(758, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</i>"', 'groupspage.php?id=117', 117, 1, '2017-06-30 13:03:16'),
(759, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</i>"', 'groupspage.php?id=117', 117, 1, '2017-06-30 13:03:16'),
(760, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</i>"', 'groupspage.php?id=117', 117, 0, '2017-06-30 13:03:16'),
(761, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND ASCII(LOWER(SUBSTRING((SELECT TOP 1 name FROM sysobjects WHERE xtype=''U''), 1, 1))) > 116</i>"', 'groupspage.php?id=117', 117, 0, '2017-06-30 13:03:16'),
(762, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>'' OR username IS NOT NULL OR username = ''</i>"', 'groupspage.php?id=118', 118, 1, '2017-06-30 13:03:16'),
(763, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>'' OR username IS NOT NULL OR username = ''</i>"', 'groupspage.php?id=118', 118, 1, '2017-06-30 13:03:16'),
(764, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>'' OR username IS NOT NULL OR username = ''</i>"', 'groupspage.php?id=118', 118, 1, '2017-06-30 13:03:16'),
(765, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>'' OR username IS NOT NULL OR username = ''</i>"', 'groupspage.php?id=118', 118, 0, '2017-06-30 13:03:16'),
(766, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>'' OR username IS NOT NULL OR username = ''</i>"', 'groupspage.php?id=118', 118, 0, '2017-06-30 13:03:16'),
(767, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND non_existant_table = ''1</i>"', 'groupspage.php?id=119', 119, 1, '2017-06-30 13:03:16'),
(768, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND non_existant_table = ''1</i>"', 'groupspage.php?id=119', 119, 1, '2017-06-30 13:03:16'),
(769, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND non_existant_table = ''1</i>"', 'groupspage.php?id=119', 119, 1, '2017-06-30 13:03:16'),
(770, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND non_existant_table = ''1</i>"', 'groupspage.php?id=119', 119, 0, '2017-06-30 13:03:16'),
(771, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND non_existant_table = ''1</i>"', 'groupspage.php?id=119', 119, 0, '2017-06-30 13:03:16'),
(772, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=120', 120, 1, '2017-06-30 13:03:16'),
(773, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=120', 120, 1, '2017-06-30 13:03:16'),
(774, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=120', 120, 1, '2017-06-30 13:03:16'),
(775, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=120', 120, 0, '2017-06-30 13:03:16'),
(776, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=120', 120, 0, '2017-06-30 13:03:16'),
(777, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>''; DESC users; --</i>"', 'groupspage.php?id=121', 121, 1, '2017-06-30 13:03:16'),
(778, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>''; DESC users; --</i>"', 'groupspage.php?id=121', 121, 1, '2017-06-30 13:03:16'),
(779, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>''; DESC users; --</i>"', 'groupspage.php?id=121', 121, 1, '2017-06-30 13:03:16'),
(780, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>''; DESC users; --</i>"', 'groupspage.php?id=121', 121, 0, '2017-06-30 13:03:16'),
(781, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>''; DESC users; --</i>"', 'groupspage.php?id=121', 121, 0, '2017-06-30 13:03:16'),
(782, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND USER_NAME() = ''dbo''</i>"', 'groupspage.php?id=122', 122, 1, '2017-06-30 13:03:16'),
(783, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND USER_NAME() = ''dbo''</i>"', 'groupspage.php?id=122', 122, 1, '2017-06-30 13:03:16'),
(784, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND USER_NAME() = ''dbo''</i>"', 'groupspage.php?id=122', 122, 1, '2017-06-30 13:03:16'),
(785, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND USER_NAME() = ''dbo''</i>"', 'groupspage.php?id=122', 122, 0, '2017-06-30 13:03:16'),
(786, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND USER_NAME() = ''dbo''</i>"', 'groupspage.php?id=122', 122, 0, '2017-06-30 13:03:16'),
(787, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</i>"', 'groupspage.php?id=123', 123, 1, '2017-06-30 13:03:16'),
(788, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</i>"', 'groupspage.php?id=123', 123, 1, '2017-06-30 13:03:16'),
(789, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</i>"', 'groupspage.php?id=123', 123, 1, '2017-06-30 13:03:16'),
(790, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</i>"', 'groupspage.php?id=123', 123, 0, '2017-06-30 13:03:16'),
(791, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' AND 1=(SELECT COUNT(*) FROM tablenames); --</i>"', 'groupspage.php?id=123', 123, 0, '2017-06-30 13:03:16'),
(792, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND 1=1</i>"', 'groupspage.php?id=124', 124, 1, '2017-06-30 13:03:16'),
(793, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND 1=1</i>"', 'groupspage.php?id=124', 124, 1, '2017-06-30 13:03:16'),
(794, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND 1=1</i>"', 'groupspage.php?id=124', 124, 1, '2017-06-30 13:03:16'),
(795, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND 1=1</i>"', 'groupspage.php?id=124', 124, 0, '2017-06-30 13:03:16'),
(796, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 AND 1=1</i>"', 'groupspage.php?id=124', 124, 0, '2017-06-30 13:03:16'),
(797, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 EXEC XP_</i>"', 'groupspage.php?id=125', 125, 1, '2017-06-30 13:03:16'),
(798, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 EXEC XP_</i>"', 'groupspage.php?id=125', 125, 1, '2017-06-30 13:03:16'),
(799, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 EXEC XP_</i>"', 'groupspage.php?id=125', 125, 1, '2017-06-30 13:03:16'),
(800, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 EXEC XP_</i>"', 'groupspage.php?id=125', 125, 0, '2017-06-30 13:03:16'),
(801, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 EXEC XP_</i>"', 'groupspage.php?id=125', 125, 0, '2017-06-30 13:03:16'),
(802, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=126', 126, 1, '2017-06-30 13:03:16'),
(803, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=126', 126, 1, '2017-06-30 13:03:16'),
(804, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=126', 126, 1, '2017-06-30 13:03:16'),
(805, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=126', 126, 0, '2017-06-30 13:03:16'),
(806, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1''1</i>"', 'groupspage.php?id=126', 126, 0, '2017-06-30 13:03:16'),
(807, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=127', 127, 1, '2017-06-30 13:03:16'),
(808, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=127', 127, 1, '2017-06-30 13:03:16'),
(809, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=127', 127, 1, '2017-06-30 13:03:16'),
(810, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=127', 127, 0, '2017-06-30 13:03:16'),
(811, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1'' OR ''1''=''1</i>"', 'groupspage.php?id=127', 127, 0, '2017-06-30 13:03:16'),
(812, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>1 OR 1=1</i>"', 'groupspage.php?id=128', 128, 1, '2017-06-30 13:03:16'),
(813, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>1 OR 1=1</i>"', 'groupspage.php?id=128', 128, 1, '2017-06-30 13:03:16'),
(814, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>1 OR 1=1</i>"', 'groupspage.php?id=128', 128, 1, '2017-06-30 13:03:16'),
(815, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>1 OR 1=1</i>"', 'groupspage.php?id=128', 128, 0, '2017-06-30 13:03:16'),
(816, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>1 OR 1=1</i>"', 'groupspage.php?id=128', 128, 0, '2017-06-30 13:03:16'),
(820, 1, 45, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-07-03 16:38:24'),
(821, 1, 3, 'acceptFriendRequest', 'sharvai accepted your friend request!', 'userprofile.php?id=1', 1, 1, '2017-07-03 16:39:27'),
(822, 10, 1, 'friendRequest', 'jaggu has sent you a friend request.', 'userprofile.php?id=10', 8, 1, '2017-07-03 16:42:32'),
(825, 1, 0, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=10#answerdiv59">""</a>', '', 59, 0, '2017-07-03 18:54:01'),
(826, 1, 0, 'answer', 'sharvai posted an answer for your question "', 'questiondisplay.php?id=10#answerdiv60', 60, 0, '2017-07-03 18:56:12'),
(831, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv21', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv21">"joker"</a> (in the World)', 21, 1, '2017-07-05 16:58:58'),
(832, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv22', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv22">"joker"</a> (in the World)', 22, 1, '2017-07-05 17:06:33'),
(833, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv23', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv23">"joker"</a> (in the World)', 23, 1, '2017-07-05 17:21:13'),
(834, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv24', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv24">"joker"</a> (in the World)', 24, 1, '2017-07-05 20:22:23'),
(835, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv25', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv25">"joker"</a> (in the World)', 25, 1, '2017-07-05 20:24:43'),
(836, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv26', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv26">"joker"</a> (in the World)', 26, 1, '2017-07-05 20:29:15'),
(838, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv27', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv27">"joker"</a> (in the World)', 27, 1, '2017-07-06 16:40:35');
INSERT INTO `notifications_table` (`id`, `senderId`, `receiverId`, `notificationType`, `notification`, `notificationLink`, `notificationForEventId`, `viewingStatus`, `datetime`) VALUES
(842, 1, 3, '0', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv28', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv28">"joker"</a> (in the World)', 28, 1, '2017-07-06 17:47:47'),
(843, 1, 3, 'commentReply', 'sharvai replied on your comment "<i>hey wasohh...</i>" (in the World)', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#reply_div11', 6, 1, '2017-07-06 18:32:51'),
(848, 1, 3, '0', 'imagedisplay.php?id=11&world=1&uid=0&gid=0#commentdiv29', '<a href="userprofile.php?id=1">sharvai</a> commented on your meme <a href="imagedisplay.php?id=11&world=1&uid=0&gid=0#commentdiv29">"try"</a> (in the World)', 29, 1, '2017-07-06 19:13:14'),
(849, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>FRANCEEE</i>"', 'groupspage.php?id=10', 10, 1, '2017-07-07 15:06:30'),
(850, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>FRANCEEE</i>"', 'groupspage.php?id=10', 10, 0, '2017-07-07 15:06:30'),
(851, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>FRANCEEE</i>"', 'groupspage.php?id=10', 10, 1, '2017-07-07 15:06:30'),
(852, 3, 1, 'acceptGroupInvite', 'elon accepted your invitation to the group FRANCEEE.', 'groupspage.php?id=10', 10, 1, '2017-07-07 15:07:49'),
(853, 4, 1, 'acceptGroupInvite', 'neha accepted your invitation to the group FRANCEEE.', 'groupspage.php?id=10', 10, 1, '2017-07-07 15:30:32'),
(854, 3, 1, '0', 'imagedisplay.php?id=28&world=1&uid=0&gid=0#commentdiv30', '<a href="userprofile.php?id=3">elon</a> commented on your meme <a href="imagedisplay.php?id=28&world=1&uid=0&gid=0#commentdiv30"><q>SHSUHS<q></a> (in the World)', 30, 1, '2017-07-07 20:48:03'),
(855, 1, 3, '0', 'sharvai commented on your meme <q>joker<q> (in the World)', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv31', 31, 1, '2017-07-07 20:55:08'),
(857, 1, 3, '0', 'sharvai commented on your meme <q>try</q> (in the World)', 'imagedisplay.php?id=11&world=1&uid=0&gid=0#commentdiv32', 32, 1, '2017-07-08 11:19:56'),
(858, 1, 3, '0', 'sharvai commented on your meme <q>try</q> (in the World)', 'imagedisplay.php?id=11&world=1&uid=0&gid=0#commentdiv33', 33, 1, '2017-07-08 11:25:21'),
(863, 8, 45, 'subscription', 'sharvai12 subscribed to you!', 'userprofile.php?id=8', 0, 0, '2017-07-08 18:52:14'),
(864, 8, 2, 'subscription', 'sharvai12 subscribed to you!', 'userprofile.php?id=8', 0, 1, '2017-07-08 18:52:29'),
(865, 8, 1, 'subscription', 'sharvai12 subscribed to you!', 'userprofile.php?id=8', 0, 1, '2017-07-08 18:52:35'),
(866, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>MAH THOUGHTS BOI</i>" (from Subscriptions)', 'imagedisplay.php?id=47&world=1&uid=0&gid=0', 47, 1, '2017-07-09 01:30:36'),
(867, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>MAH THOUGHTS BOI</i>" (from Subscriptions)', 'imagedisplay.php?id=47&world=1&uid=0&gid=0', 47, 1, '2017-07-09 01:30:36'),
(868, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>MAH THOUGHTS BOI</i>" (from Subscriptions)', 'imagedisplay.php?id=47&world=1&uid=0&gid=0', 47, 0, '2017-07-09 01:30:36'),
(869, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>MAH THOUGHTS BOI</i>" (from Subscriptions)', 'imagedisplay.php?id=47&world=1&uid=0&gid=0', 47, 0, '2017-07-09 01:30:36'),
(870, 0, 1, 'makeGroupAdmin', 'elon is now an admin of the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 0, 1, '2017-07-09 17:04:17'),
(871, 0, 3, 'makeGroupAdmin', 'You are now an admin of the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 0, 1, '2017-07-09 17:04:17'),
(872, 0, 2, 'makeGroupAdmin', 'elon is now an admin of the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 0, 1, '2017-07-09 17:04:17'),
(879, 3, 2, 'memeUpload', 'elon has uploaded a meme "<i>HOLA KE G ME B KA GOLA</i>" (from Subscriptions)', 'imagedisplay.php?id=48&world=1&uid=0&gid=0', 48, 1, '2017-07-13 01:40:47'),
(880, 3, 1, 'memeUpload', 'elon has uploaded a meme "<i>HOLA KE G ME B KA GOLA</i>" (from Subscriptions)', 'imagedisplay.php?id=48&world=1&uid=0&gid=0', 48, 1, '2017-07-13 01:40:47'),
(882, 2, 1, 'acceptGroupInvite', 'jack accepted your invitation to the group haha.', 'groupspage.php?id=8', 8, 1, '2017-07-13 06:25:16'),
(883, 2, 1, 'acceptGroupInvite', 'jack accepted your invitation to the group haha.', 'groupspage.php?id=8', 8, 1, '2017-07-13 06:36:53'),
(884, 2, 1, 'acceptGroupInvite', 'jack accepted your invitation to the group haha.', 'groupspage.php?id=8', 8, 1, '2017-07-13 06:39:24'),
(891, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 1, 0, '2017-07-14 02:01:50'),
(892, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 1, 0, '2017-07-14 02:01:50'),
(895, 1, 3, '0', 'sharvai commented on your meme <q>try</q> (in the World)', 'imagedisplay.php?id=11&world=1&uid=0&gid=0#commentdiv35', 35, 1, '2017-07-15 00:21:52'),
(898, 1, 3, '0', 'sharvai commented on your meme <q>try</q> (in the World)', 'imagedisplay.php?id=11&world=1&uid=0&gid=0#commentdiv36', 36, 1, '2017-07-15 02:29:58'),
(899, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Imma WIN</i>" (from Subscriptions)', 'imagedisplay.php?id=49&world=1&uid=0&gid=0', 49, 1, '2017-07-15 02:52:02'),
(900, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Imma WIN</i>" (from Subscriptions)', 'imagedisplay.php?id=49&world=1&uid=0&gid=0', 49, 1, '2017-07-15 02:52:02'),
(901, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Imma WIN</i>" (from Subscriptions)', 'imagedisplay.php?id=49&world=1&uid=0&gid=0', 49, 0, '2017-07-15 02:52:02'),
(902, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Imma WIN</i>" (from Subscriptions)', 'imagedisplay.php?id=49&world=1&uid=0&gid=0', 49, 0, '2017-07-15 02:52:02'),
(904, 1, 2, '0', 'sharvai commented on your meme <q>not now</q> (in the World)', 'imagedisplay.php?id=14&world=1&uid=0&gid=0#commentdiv42', 42, 1, '2017-07-15 21:28:07'),
(906, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>My Coellegeeeege</i>" (from Subscriptions)', 'imagedisplay.php?id=50&world=1&uid=0&gid=0', 50, 1, '2017-07-16 12:48:53'),
(907, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>My Coellegeeeege</i>" (from Subscriptions)', 'imagedisplay.php?id=50&world=1&uid=0&gid=0', 50, 1, '2017-07-16 12:48:53'),
(908, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>My Coellegeeeege</i>" (from Subscriptions)', 'imagedisplay.php?id=50&world=1&uid=0&gid=0', 50, 0, '2017-07-16 12:48:53'),
(909, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>My Coellegeeeege</i>" (from Subscriptions)', 'imagedisplay.php?id=50&world=1&uid=0&gid=0', 50, 0, '2017-07-16 12:48:53'),
(912, 1, 2, 'imageLike', 'sharvai liked your meme "<i>not now</i>"', 'imagedisplay.php?id=14&world=1&uid=0&gid=0', 14, 1, '2017-07-16 13:02:51'),
(914, 3, 1, 'imageLike', 'elon liked your meme "<i>My Coellegeeeege</i>"', 'imagedisplay.php?id=50&world=1&uid=0&gid=0', 50, 1, '2017-07-16 13:06:35'),
(915, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Conor wins again</i>" (from Subscriptions)', 'imagedisplay.php?id=51&world=1&uid=0&gid=0', 51, 1, '2017-07-16 16:01:13'),
(916, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Conor wins again</i>" (from Subscriptions)', 'imagedisplay.php?id=51&world=1&uid=0&gid=0', 51, 1, '2017-07-16 16:01:13'),
(917, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Conor wins again</i>" (from Subscriptions)', 'imagedisplay.php?id=51&world=1&uid=0&gid=0', 51, 0, '2017-07-16 16:01:13'),
(918, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Conor wins again</i>" (from Subscriptions)', 'imagedisplay.php?id=51&world=1&uid=0&gid=0', 51, 0, '2017-07-16 16:01:13'),
(919, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>Conor wins again</i>" (in the group Old Friends)', 'imagedisplay.php?id=51&world=0&uid=0&gid=1', 51, 1, '2017-07-16 16:01:13'),
(927, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>POLITICSOS</i>" (from Subscriptions)', 'imagedisplay.php?id=52&world=1&uid=0&gid=0', 52, 1, '2017-07-16 21:13:41'),
(928, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>POLITICSOS</i>" (from Subscriptions)', 'imagedisplay.php?id=52&world=1&uid=0&gid=0', 52, 1, '2017-07-16 21:13:41'),
(929, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>POLITICSOS</i>" (from Subscriptions)', 'imagedisplay.php?id=52&world=1&uid=0&gid=0', 52, 0, '2017-07-16 21:13:41'),
(930, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>POLITICSOS</i>" (from Subscriptions)', 'imagedisplay.php?id=52&world=1&uid=0&gid=0', 52, 0, '2017-07-16 21:13:41'),
(931, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Humri Bhasa</i>" (from Subscriptions)', 'imagedisplay.php?id=53&world=1&uid=0&gid=0', 53, 1, '2017-07-18 00:24:38'),
(932, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Humri Bhasa</i>" (from Subscriptions)', 'imagedisplay.php?id=53&world=1&uid=0&gid=0', 53, 1, '2017-07-18 00:24:38'),
(933, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Humri Bhasa</i>" (from Subscriptions)', 'imagedisplay.php?id=53&world=1&uid=0&gid=0', 53, 0, '2017-07-18 00:24:38'),
(934, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Humri Bhasa</i>" (from Subscriptions)', 'imagedisplay.php?id=53&world=1&uid=0&gid=0', 53, 0, '2017-07-18 00:24:38'),
(939, 1, 3, '0', 'sharvai commented on your meme <q>joker</q> (in the World)', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv43', 43, 1, '2017-07-21 18:05:55'),
(941, 1, 3, 'commentLike', 'sharvai</a> liked your comment "cascasc"', 'imagedisplay.php?id=29&world=1&uid=0&gid=0#commentdiv10', 10, 1, '2017-07-21 18:07:13'),
(942, 1, 3, 'replyLike', 'sharvai liked your reply "<i>yohihe</i>".', 'imagedisplay.php?id=29&world=1&uid=0&gid=0', 1, 1, '2017-07-21 18:07:18'),
(948, 1, 0, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=7#answerdiv61">""</a>', '', 61, 0, '2017-07-21 19:08:49'),
(950, 1, 3, '0', 'sharvai commented on your meme <q>HOLA KE G ME B KA GOLA</q> (in the World)', 'imagedisplay.php?id=48&world=1&uid=0&gid=0#commentdiv44', 44, 1, '2017-07-21 19:29:58'),
(951, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv45', 45, 1, '2017-07-21 19:36:14'),
(952, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv46', 46, 1, '2017-07-21 20:06:02'),
(953, 1, 2, '0', 'sharvai commented on your meme <q>not now</q> (in the World)', 'imagedisplay.php?id=14&world=1&uid=0&gid=0#commentdiv47', 47, 1, '2017-07-21 21:18:15'),
(958, 1, 3, 'imageLike', 'sharvai liked your meme "<i>HOLA KE G ME B KA GOLA</i>"', 'imagedisplay.php?id=48&world=1&uid=0&gid=0', 48, 1, '2017-07-23 16:17:23'),
(960, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv48', 48, 1, '2017-07-23 16:33:46'),
(962, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv49', 49, 1, '2017-07-23 16:37:36'),
(963, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv50', 50, 1, '2017-07-23 16:40:38'),
(968, 1, 0, 'answer', 'sharvai posted an answer for your question "', 'questiondisplay.php?id=13#answerdiv62', 62, 0, '2017-07-25 20:45:39'),
(969, 1, 0, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=13#answerdiv63">""</a>', '', 63, 0, '2017-07-25 20:47:04'),
(970, 1, 3, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=13#answerdiv64">"STYUCKKK"</a>', '', 64, 1, '2017-07-25 20:55:30'),
(972, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Submission problems</i>" (from Subscriptions)', 'imagedisplay.php?id=54&world=1&uid=0&gid=0', 54, 1, '2017-07-25 22:13:30'),
(973, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Submission problems</i>" (from Subscriptions)', 'imagedisplay.php?id=54&world=1&uid=0&gid=0', 54, 1, '2017-07-25 22:13:30'),
(974, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Submission problems</i>" (from Subscriptions)', 'imagedisplay.php?id=54&world=1&uid=0&gid=0', 54, 0, '2017-07-25 22:13:30'),
(975, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Submission problems</i>" (from Subscriptions)', 'imagedisplay.php?id=54&world=1&uid=0&gid=0', 54, 0, '2017-07-25 22:13:30'),
(976, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>Submission problems</i>" (in the group Old Friends)', 'imagedisplay.php?id=54&world=0&uid=0&gid=1', 54, 1, '2017-07-25 22:13:30'),
(977, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>Submission problems</i>" (in friends)', 'imagedisplay.php?id=54&world=0&uid=53&gid=0', 54, 0, '2017-07-25 22:13:30'),
(978, 1, 3, 'answerReply', 'sharvai replied on your answer "acsacasc"', 'questiondisplay.php?id=7#answerreply_div39', 53, 1, '2017-07-25 23:48:17'),
(979, 1, 5, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 9, 0, '2017-07-26 00:09:22'),
(981, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Amaze is this scene!</i>" (from Subscriptions)', 'imagedisplay.php?id=55&world=1&uid=0&gid=0', 55, 1, '2017-07-26 18:34:59'),
(982, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Amaze is this scene!</i>" (from Subscriptions)', 'imagedisplay.php?id=55&world=1&uid=0&gid=0', 55, 1, '2017-07-26 18:34:59'),
(983, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Amaze is this scene!</i>" (from Subscriptions)', 'imagedisplay.php?id=55&world=1&uid=0&gid=0', 55, 0, '2017-07-26 18:34:59'),
(984, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Amaze is this scene!</i>" (from Subscriptions)', 'imagedisplay.php?id=55&world=1&uid=0&gid=0', 55, 0, '2017-07-26 18:34:59'),
(985, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>FDI</i>" (in the group haha)', 'imagedisplay.php?id=56&world=0&uid=0&gid=8', 56, 1, '2017-07-26 18:56:49'),
(986, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>FDI</i>" (in the group haha)', 'imagedisplay.php?id=56&world=0&uid=0&gid=8', 56, 1, '2017-07-26 18:56:49'),
(987, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>FDI</i>" (in friends)', 'imagedisplay.php?id=56&world=0&uid=11&gid=0', 56, 0, '2017-07-26 18:56:49'),
(988, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>FDI</i>" (in friends)', 'imagedisplay.php?id=56&world=0&uid=53&gid=0', 56, 0, '2017-07-26 18:56:49'),
(989, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Roya====</i>" (from Subscriptions)', 'imagedisplay.php?id=57&world=1&uid=0&gid=0', 57, 1, '2017-07-26 19:17:06'),
(990, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Roya====</i>" (from Subscriptions)', 'imagedisplay.php?id=57&world=1&uid=0&gid=0', 57, 1, '2017-07-26 19:17:06'),
(991, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Roya====</i>" (from Subscriptions)', 'imagedisplay.php?id=57&world=1&uid=0&gid=0', 57, 0, '2017-07-26 19:17:06'),
(992, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Roya====</i>" (from Subscriptions)', 'imagedisplay.php?id=57&world=1&uid=0&gid=0', 57, 0, '2017-07-26 19:17:06'),
(993, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>Roya====</i>" (in the group haha)', 'imagedisplay.php?id=57&world=0&uid=0&gid=8', 57, 1, '2017-07-26 19:17:06'),
(994, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>Roya====</i>" (in friends)', 'imagedisplay.php?id=57&world=0&uid=53&gid=0', 57, 0, '2017-07-26 19:17:06'),
(995, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Yolo</i>" (from Subscriptions)', 'imagedisplay.php?id=58&world=1&uid=0&gid=0', 58, 1, '2017-07-26 19:23:02'),
(996, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Yolo</i>" (from Subscriptions)', 'imagedisplay.php?id=58&world=1&uid=0&gid=0', 58, 1, '2017-07-26 19:23:02'),
(997, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Yolo</i>" (from Subscriptions)', 'imagedisplay.php?id=58&world=1&uid=0&gid=0', 58, 0, '2017-07-26 19:23:02'),
(998, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Yolo</i>" (from Subscriptions)', 'imagedisplay.php?id=58&world=1&uid=0&gid=0', 58, 0, '2017-07-26 19:23:02'),
(999, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>Yolo</i>" (in the group haha)', 'imagedisplay.php?id=58&world=0&uid=0&gid=8', 58, 1, '2017-07-26 19:23:02'),
(1000, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>Yolo</i>" (in friends)', 'imagedisplay.php?id=58&world=0&uid=53&gid=0', 58, 0, '2017-07-26 19:23:02'),
(1001, 59, 1, 'answer', '<a href="userprofile.php?id=59">qwerty</a> posted an answer for your question <a href="questiondisplay.php?id=7#answerdiv65">"I would lo..."</a>', '', 65, 1, '2017-07-28 19:18:46'),
(1002, 59, 2, '0', 'qwerty commented on your meme <q>not now</q> (in the World)', 'imagedisplay.php?id=14&world=1&uid=0&gid=0#commentdiv53', 53, 1, '2017-07-28 19:20:19'),
(1003, 59, 1, '0', 'qwerty commented on your meme <q>MAH THOUGHTS BOI</q> (in the World)', 'imagedisplay.php?id=47&world=1&uid=0&gid=0#commentdiv54', 54, 1, '2017-07-28 19:23:38'),
(1004, 59, 1, '0', 'qwerty commented on your meme <q>hgg</q> (in the World)', 'imagedisplay.php?id=5&world=1&uid=0&gid=0#commentdiv55', 55, 1, '2017-07-28 19:24:42'),
(1017, 1, 9, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 10, 0, '2017-07-30 17:45:07'),
(1018, 1, 7, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 11, 0, '2017-07-30 17:52:33'),
(1019, 1, 6, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 12, 0, '2017-07-30 17:54:25'),
(1020, 1, 19, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 13, 0, '2017-07-30 17:55:48'),
(1021, 1, 29, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 14, 0, '2017-07-30 17:57:12'),
(1022, 1, 55, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 15, 0, '2017-07-30 17:58:03'),
(1023, 1, 35, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 16, 0, '2017-07-30 17:58:39'),
(1024, 1, 4, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 17, 1, '2017-07-30 17:59:11'),
(1025, 1, 43, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 18, 0, '2017-07-30 17:59:31'),
(1026, 4, 0, 'acceptFriendRequest', 'neha accepted your friend request!', 'userprofile.php?id=4', 0, 0, '2017-07-30 18:18:01'),
(1027, 4, 0, 'acceptFriendRequest', 'neha accepted your friend request!', 'userprofile.php?id=4', 0, 0, '2017-07-30 18:18:42'),
(1028, 4, 0, 'acceptFriendRequest', 'neha accepted your friend request!', 'userprofile.php?id=4', 0, 0, '2017-07-30 18:18:55'),
(1029, 4, 1, 'acceptFriendRequest', 'neha accepted your friend request!', 'userprofile.php?id=4', 17, 1, '2017-07-30 18:21:21'),
(1030, 4, 1, 'acceptFriendRequest', 'neha accepted your friend request!', 'userprofile.php?id=4', 17, 1, '2017-07-30 18:22:54'),
(1031, 4, 1, 'acceptFriendRequest', 'neha accepted your friend request!', 'userprofile.php?id=4', 17, 1, '2017-07-30 18:27:02'),
(1046, 4, 1, 'imageLike', 'neha liked your meme "<i>Elon Musk Inspirational</i>"', 'imagedisplay.php?id=1&world=1&uid=0&gid=0', 1, 1, '2017-07-30 19:17:19'),
(1047, 1, 3, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 19, 1, '2017-07-30 20:19:53'),
(1052, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv56', 56, 1, '2017-07-30 22:24:05'),
(1053, 1, 2, 'imageLike', 'sharvai liked your meme "<i>wontwork</i>"', 'imagedisplay.php?id=13&world=1&uid=0&gid=0', 13, 1, '2017-07-30 22:25:41'),
(1054, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv57', 57, 1, '2017-07-31 01:51:19'),
(1065, 1, 3, 'imageLike', 'sharvai liked your meme "<i>iStopLosing my head</i>"', 'imagedisplay.php?id=18&world=1&uid=0&gid=0', 18, 1, '2017-07-31 21:02:56'),
(1069, 1, 3, 'imageLike', 'sharvai liked your meme "<i>silenceIsKillingMe</i>"', 'imagedisplay.php?id=17&world=1&uid=0&gid=0', 17, 1, '2017-07-31 21:07:36'),
(1085, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>jack boi</i>"', 'groupspage.php?id=11', 11, 1, '2017-08-01 21:32:41'),
(1086, 1, 3, 'exitGroup', 'sharvai has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-01 23:04:58'),
(1087, 1, 3, 'exitGroup', 'sharvai has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-01 23:07:25'),
(1088, 1, 3, 'exitGroup', 'sharvai has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-01 23:08:05'),
(1089, 1, 3, 'exitGroup', 'sharvai has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-01 23:08:18'),
(1090, 1, 3, 'exitGroup', 'sharvai has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-01 23:09:45'),
(1091, 1, 3, 'exitGroup', 'sharvai has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-01 23:11:11'),
(1094, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv67">"JACKSIE"</a>', '', 67, 1, '2017-08-02 00:04:51'),
(1095, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv68">"JACKSIE"</a>', '', 68, 1, '2017-08-02 00:07:40'),
(1096, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv69">"JACKSIE"</a>', '', 69, 1, '2017-08-02 00:07:45'),
(1097, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv70">"JACKSIE"</a>', '', 70, 1, '2017-08-02 01:01:47'),
(1098, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv71">"JACKSIE"</a>', '', 71, 1, '2017-08-02 09:38:56'),
(1099, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv72">"JACKSIE"</a>', '', 72, 1, '2017-08-02 09:40:58'),
(1100, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv73">"JACKSIE"</a>', '', 73, 1, '2017-08-02 10:56:53'),
(1101, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv74">"JACKSIE"</a>', '', 74, 1, '2017-08-02 11:12:51'),
(1102, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv75">"JACKSIE"</a>', '', 75, 1, '2017-08-02 11:13:20'),
(1103, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv76">"JACKSIE"</a>', '', 76, 1, '2017-08-02 11:14:55'),
(1104, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv77">"JACKSIE"</a>', '', 77, 1, '2017-08-02 11:20:12'),
(1105, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv78">"JACKSIE"</a>', '', 78, 1, '2017-08-02 11:29:52'),
(1106, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv79">"JACKSIE"</a>', '', 79, 1, '2017-08-02 11:31:00'),
(1107, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv80">"JACKSIE"</a>', '', 80, 1, '2017-08-02 11:32:05'),
(1109, 3, 1, 'acceptFriendRequest', 'elon accepted your friend request!', 'userprofile.php?id=3', 19, 1, '2017-08-02 12:59:12'),
(1110, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>for me and only boi</i>" (in friends)', 'imagedisplay.php?id=59&world=0&uid=2&gid=0', 59, 1, '2017-08-02 12:59:56'),
(1111, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>for me and only boi</i>" (in friends)', 'imagedisplay.php?id=59&world=0&uid=11&gid=0', 59, 0, '2017-08-02 12:59:56'),
(1112, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>for me and only boi</i>" (in friends)', 'imagedisplay.php?id=59&world=0&uid=53&gid=0', 59, 0, '2017-08-02 12:59:56'),
(1113, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>for me and only boi</i>" (in friends)', 'imagedisplay.php?id=59&world=0&uid=4&gid=0', 59, 1, '2017-08-02 12:59:56'),
(1114, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>for me and only boi</i>" (in friends)', 'imagedisplay.php?id=59&world=0&uid=3&gid=0', 59, 1, '2017-08-02 12:59:56'),
(1115, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>dfghjkj</i>" (in friends)', 'imagedisplay.php?id=60&world=0&uid=2&gid=0', 60, 1, '2017-08-02 13:10:18'),
(1116, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>dfghjkj</i>" (in friends)', 'imagedisplay.php?id=60&world=0&uid=11&gid=0', 60, 0, '2017-08-02 13:10:18'),
(1117, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>dfghjkj</i>" (in friends)', 'imagedisplay.php?id=60&world=0&uid=53&gid=0', 60, 0, '2017-08-02 13:10:18'),
(1118, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>dfghjkj</i>" (in friends)', 'imagedisplay.php?id=60&world=0&uid=4&gid=0', 60, 1, '2017-08-02 13:10:18'),
(1119, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>dfghjkj</i>" (in friends)', 'imagedisplay.php?id=60&world=0&uid=3&gid=0', 60, 1, '2017-08-02 13:10:18'),
(1120, 1, 3, 'imageLike', 'sharvai liked your meme "<i>veve</i>"', 'imagedisplay.php?id=34&world=1&uid=0&gid=0', 34, 1, '2017-08-02 14:39:06'),
(1121, 3, 1, 'imageLike', 'elon liked your meme "<i>dfghjkj</i>"', 'imagedisplay.php?id=60&world=1&uid=0&gid=0', 60, 1, '2017-08-02 15:06:57'),
(1122, 3, 1, 'imageLike', 'elon liked your meme "<i>testing jack out</i>"', 'imagedisplay.php?id=30&world=1&uid=0&gid=0', 30, 1, '2017-08-02 15:24:23'),
(1124, 3, 1, 'subscription', 'elon subscribed to you!', 'userprofile.php?id=3', 0, 1, '2017-08-02 15:26:18'),
(1126, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv61', 61, 1, '2017-08-02 15:37:57'),
(1127, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv62', 62, 1, '2017-08-02 15:38:27'),
(1128, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv63', 63, 1, '2017-08-02 15:41:47'),
(1129, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv64', 64, 1, '2017-08-02 15:41:58'),
(1130, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv65', 65, 1, '2017-08-02 15:45:53'),
(1132, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv81">"oyeee"</a>', '', 81, 0, '2017-08-02 15:53:55'),
(1133, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv82">"oyeee"</a>', '', 82, 0, '2017-08-02 15:55:01'),
(1134, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv66', 66, 1, '2017-08-02 15:55:31'),
(1135, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv67', 67, 1, '2017-08-02 16:06:57'),
(1136, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv68', 68, 1, '2017-08-02 16:07:25'),
(1137, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv83">"JACKSIE"</a>', '', 83, 1, '2017-08-02 19:20:55'),
(1138, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv84">"JACKSIE"</a>', '', 84, 1, '2017-08-02 19:26:44'),
(1139, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv85">"JACKSIE"</a>', '', 85, 1, '2017-08-02 19:30:15'),
(1140, 1, 2, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=14#answerdiv86">"JACKSIE"</a>', '', 86, 1, '2017-08-02 19:30:30'),
(1141, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv87">"oyeee"</a>', '', 87, 0, '2017-08-02 23:50:14'),
(1142, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv88">"oyeee"</a>', '', 88, 0, '2017-08-02 23:52:40'),
(1143, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv89">"oyeee"</a>', '', 89, 0, '2017-08-03 00:09:28'),
(1144, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv90">"oyeee"</a>', '', 90, 0, '2017-08-03 00:12:42'),
(1145, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv91">"oyeee"</a>', '', 91, 0, '2017-08-03 00:13:27'),
(1146, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv92">"oyeee"</a>', '', 92, 0, '2017-08-03 00:16:16'),
(1147, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv93">"oyeee"</a>', '', 93, 0, '2017-08-03 00:20:54'),
(1148, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv94">"oyeee"</a>', '', 94, 0, '2017-08-03 00:24:57'),
(1149, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv95">"oyeee"</a>', '', 95, 0, '2017-08-03 00:25:18'),
(1150, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv96">"oyeee"</a>', '', 96, 0, '2017-08-03 00:30:03'),
(1151, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv69', 69, 1, '2017-08-03 00:41:06'),
(1152, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv97">"oyeee"</a>', '', 97, 0, '2017-08-03 00:44:14'),
(1153, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv70', 70, 1, '2017-08-03 00:44:25'),
(1154, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv98">"oyeee"</a>', '', 98, 0, '2017-08-03 00:45:35'),
(1155, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv99">"oyeee"</a>', '', 99, 0, '2017-08-03 00:50:33'),
(1156, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv100">"oyeee"</a>', '', 100, 0, '2017-08-03 01:08:20'),
(1157, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv101">"oyeee"</a>', '', 101, 0, '2017-08-03 01:21:45'),
(1158, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv102">"oyeee"</a>', '', 102, 0, '2017-08-03 01:36:00'),
(1159, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv103">"oyeee"</a>', '', 103, 0, '2017-08-03 02:05:40'),
(1160, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv104">"oyeee"</a>', '', 104, 0, '2017-08-03 02:07:28'),
(1163, 1, 10, 'acceptFriendRequest', 'sharvai accepted your friend request!', 'userprofile.php?id=1', 8, 0, '2017-08-03 21:05:12'),
(1165, 1, 10, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-08-03 21:05:25'),
(1169, 1, 2, 'imageLike', 'sharvai liked your meme "<i>testingWITHsharvai</i>"', 'imagedisplay.php?id=19&world=1&uid=0&gid=0', 19, 1, '2017-08-04 16:36:04'),
(1170, 1, 10, 'questionLike', 'sharvai liked your question "<i>attencion</i>".', 'questiondisplay.php?id=15', 15, 0, '2017-08-04 17:04:21'),
(1171, 0, 1, 'makeGroupAdmin', 'elon is now an admin of the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 0, 1, '2017-08-04 17:21:45'),
(1172, 0, 3, 'makeGroupAdmin', 'You are now an admin of the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 0, 1, '2017-08-04 17:21:45'),
(1173, 0, 2, 'makeGroupAdmin', 'elon is now an admin of the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 0, 1, '2017-08-04 17:21:45'),
(1174, 3, 1, 'exitGroup', 'elon has left the group "<i>Old Friends</i>".', 'groupspage.php?id=1', 0, 1, '2017-08-04 17:25:20'),
(1175, 3, 2, 'exitGroup', 'elon has left the group "<i>Old Friends</i>".', 'groupspage.php?id=1', 0, 1, '2017-08-04 17:25:20'),
(1177, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv71', 71, 1, '2017-08-04 18:06:17'),
(1178, 3, 1, 'commentReply', 'elon replied on your comment "<i>vggvrere</i>" (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#reply_div51', 69, 1, '2017-08-04 18:37:01'),
(1179, 3, 1, 'answerReply', '<a href="userprofile.php?id=3">elon</a> replied on your answer <a href="questiondisplay.php?id=10#answerreply_div71">"dwadawd"</a>', '', 59, 1, '2017-08-04 18:49:03'),
(1180, 3, 1, 'answer', '<a href="userprofile.php?id=3">elon</a> posted an answer for your question <a href="questiondisplay.php?id=10#answerdiv105">"Hi m stuck..."</a>', '', 105, 1, '2017-08-04 18:49:13'),
(1182, 1, 17, 'answer', '<a href="userprofile.php?id=1">sharvai</a> posted an answer for your question <a href="questiondisplay.php?id=22#answerdiv106">"oyeee"</a>', '', 106, 0, '2017-08-04 19:47:10'),
(1183, 1, 3, 'answer', 'sharvai posted an answer for your question I cant thi..."', 'questiondisplay.php?id=12#answerdiv107', 107, 1, '2017-08-04 19:49:33'),
(1184, 1, 3, 'answer', 'sharvai posted an answer for your question I cant thi..."', 'questiondisplay.php?id=12#answerdiv108', 108, 1, '2017-08-04 19:50:04'),
(1185, 3, 1, 'answer', 'elon posted an answer for your question "<i>Hi m stuck...</i>"', 'questiondisplay.php?id=10#answerdiv109', 109, 1, '2017-08-04 19:52:23'),
(1186, 3, 1, 'answerReply', 'elon replied on your answer "<i>dwa</i>"', 'questiondisplay.php?id=22#answerreply_div73', 106, 1, '2017-08-04 19:56:18'),
(1187, 3, 1, 'commentReply', 'elon replied on your comment "<i>elon pe</i>" (in my Meagles)', 'imagedisplay.php?id=28&world=0&uid=3&gid=0#reply_div53', 2, 1, '2017-08-04 19:56:42'),
(1188, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 1, 1, '2017-08-04 21:11:04'),
(1189, 1, 10, 'groupInvitation', 'sharvai has invited you to the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 1, 0, '2017-08-04 21:11:50'),
(1190, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>ma boi</i>"', 'groupspage.php?id=12', 12, 1, '2017-08-04 22:18:22'),
(1191, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>ma boi</i>"', 'groupspage.php?id=12', 12, 1, '2017-08-04 22:19:26'),
(1192, 3, 1, 'acceptGroupInvite', 'elon accepted your invitation to the group ma boi.', 'groupspage.php?id=12', 12, 1, '2017-08-04 22:24:10'),
(1193, 3, 1, 'acceptGroupInvite', 'elon accepted your invitation to the group Old Friends.', 'groupspage.php?id=1', 1, 1, '2017-08-04 22:24:10'),
(1194, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>ma boi</i>"', 'groupspage.php?id=12', 12, 1, '2017-08-04 22:46:04'),
(1195, 4, 1, 'acceptGroupInvite', 'neha accepted your invitation to the group ma boi.', 'groupspage.php?id=12', 12, 1, '2017-08-04 22:49:12'),
(1196, 4, 1, 'exitGroup', 'neha has left the group "<i>ma boi</i>".', 'groupspage.php?id=12', 0, 1, '2017-08-04 22:57:19'),
(1197, 4, 2, 'exitGroup', 'neha has left the group "<i>ma boi</i>".', 'groupspage.php?id=12', 0, 1, '2017-08-04 22:57:19'),
(1198, 4, 3, 'exitGroup', 'neha has left the group "<i>ma boi</i>".', 'groupspage.php?id=12', 0, 1, '2017-08-04 22:57:19'),
(1199, 0, 1, 'makeGroupAdmin', 'elon is now an admin of the group "<i>ma boi</i>"', 'groupspage.php?id=12', 0, 1, '2017-08-04 23:03:27'),
(1200, 0, 2, 'makeGroupAdmin', 'elon is now an admin of the group "<i>ma boi</i>"', 'groupspage.php?id=12', 0, 1, '2017-08-04 23:03:27'),
(1201, 0, 3, 'makeGroupAdmin', 'You are now an admin of the group "<i>ma boi</i>"', 'groupspage.php?id=12', 0, 1, '2017-08-04 23:03:27'),
(1202, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv73', 73, 1, '2017-08-05 11:26:07'),
(1203, 3, 59, 'friendRequest', 'elon has sent you a friend request.', 'userprofile.php?id=3', 20, 1, '2017-08-05 12:36:02'),
(1204, 3, 1, 'exitGroup', 'elon has left the group "<i>meAndelon</i>".', 'groupspage.php?id=3', 0, 1, '2017-08-05 12:41:33'),
(1224, 1, 3, 'answerReplyLike', 'sharvai liked your reply "da"', 'questiondisplay.php?id=22#answerreply_div73', 73, 1, '2017-08-05 14:06:38'),
(1225, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv110', 110, 0, '2017-08-05 14:17:42'),
(1226, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv111', 111, 0, '2017-08-05 14:19:55'),
(1227, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv112', 112, 0, '2017-08-05 14:33:58'),
(1228, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv113', 113, 0, '2017-08-05 14:35:45'),
(1229, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv114', 114, 0, '2017-08-05 14:36:42'),
(1230, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv115', 115, 0, '2017-08-05 14:38:18'),
(1231, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv116', 116, 0, '2017-08-05 14:39:16'),
(1232, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv117', 117, 0, '2017-08-05 14:41:29'),
(1233, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv118', 118, 0, '2017-08-05 14:54:59'),
(1234, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv119', 119, 0, '2017-08-05 14:56:08'),
(1235, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv120', 120, 0, '2017-08-05 14:57:11'),
(1236, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv121', 121, 0, '2017-08-05 15:00:16'),
(1237, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv122', 122, 0, '2017-08-05 15:00:48'),
(1238, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv123', 123, 0, '2017-08-05 15:01:47'),
(1239, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>oyeee</i>"', 'questiondisplay.php?id=22#answerdiv124', 124, 0, '2017-08-05 15:05:56'),
(1240, 59, 3, 'imageLike', 'qwerty liked your meme "<i>HOLA KE G ME B KA GOLA</i>"', 'imagedisplay.php?id=48&world=1&uid=0&gid=0', 48, 1, '2017-08-05 15:08:39'),
(1241, 61, 1, 'imageLike', 'as liked your meme "<i>My Coellegeeeege</i>"', 'imagedisplay.php?id=50&world=1&uid=0&gid=0', 50, 1, '2017-08-05 15:30:08'),
(1242, 61, 1, 'subscription', 'as subscribed to you!', 'userprofile.php?id=61', 0, 1, '2017-08-05 15:30:10'),
(1243, 59, 3, 'acceptFriendRequest', 'qwerty accepted your friend request!', 'userprofile.php?id=59', 20, 1, '2017-08-05 15:39:43'),
(1244, 59, 3, 'acceptFriendRequest', 'qwerty accepted your friend request!', 'userprofile.php?id=59', 20, 1, '2017-08-05 15:42:12'),
(1245, 59, 3, 'acceptFriendRequest', 'qwerty accepted your friend request!', 'userprofile.php?id=59', 20, 1, '2017-08-05 15:43:42'),
(1246, 59, 3, 'acceptFriendRequest', 'qwerty accepted your friend request!', 'userprofile.php?id=59', 20, 1, '2017-08-05 15:43:56'),
(1247, 59, 3, 'acceptFriendRequest', 'qwerty accepted your friend request!', 'userprofile.php?id=59', 20, 1, '2017-08-05 15:45:15'),
(1248, 1, 17, 'questionLike', 'sharvai liked your question "<i>oyeee</i>".', 'questiondisplay.php?id=22', 22, 0, '2017-08-05 16:15:22'),
(1249, 1, 17, 'questionLike', 'sharvai liked your question "<i>kya yheee</i>".', 'questiondisplay.php?id=21', 21, 0, '2017-08-06 01:31:52'),
(1250, 1, 17, 'answer', 'sharvai posted an answer for your question "<i>kya yheee</i>"', 'questiondisplay.php?id=21#answerdiv125', 125, 0, '2017-08-06 01:31:57'),
(1251, 3, 2, 'memeUpload', 'elon has uploaded a meme "<i>Book</i>" (from Subscriptions)', 'imagedisplay.php?id=62&world=1&uid=0&gid=0', 62, 1, '2017-08-06 10:39:06'),
(1252, 3, 4, 'memeUpload', 'elon has uploaded a meme "<i>Book</i>" (from Subscriptions)', 'imagedisplay.php?id=62&world=1&uid=0&gid=0', 62, 1, '2017-08-06 10:39:06'),
(1253, 3, 1, 'memeUpload', 'elon has uploaded a meme "<i>Book</i>" (in the group Old Friends)', 'imagedisplay.php?id=62&world=0&uid=0&gid=1', 62, 1, '2017-08-06 10:39:06'),
(1254, 3, 5, 'memeUpload', 'elon has uploaded a meme "<i>Book</i>" (in friends)', 'imagedisplay.php?id=62&world=0&uid=5&gid=0', 62, 0, '2017-08-06 10:39:06'),
(1255, 3, 59, 'memeUpload', 'elon has uploaded a meme "<i>Book</i>" (in friends)', 'imagedisplay.php?id=62&world=0&uid=59&gid=0', 62, 0, '2017-08-06 10:39:06'),
(1256, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>hg</i>" (in the group Old Friends)', 'imagedisplay.php?id=63&world=0&uid=0&gid=1', 63, 1, '2017-08-06 11:02:00'),
(1257, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>hg</i>" (in the group Old Friends)', 'imagedisplay.php?id=63&world=0&uid=0&gid=1', 63, 1, '2017-08-06 11:02:00'),
(1258, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>cascas</i>" (in the group Old Friends)', 'imagedisplay.php?id=64&world=0&uid=0&gid=1', 64, 1, '2017-08-06 11:07:14'),
(1259, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>cascas</i>" (in the group Old Friends)', 'imagedisplay.php?id=64&world=0&uid=0&gid=1', 64, 1, '2017-08-06 11:07:14'),
(1260, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>cascas</i>" (in friends)', 'imagedisplay.php?id=64&world=0&uid=11&gid=0', 64, 0, '2017-08-06 11:07:14'),
(1261, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>cascas</i>" (in friends)', 'imagedisplay.php?id=64&world=0&uid=53&gid=0', 64, 0, '2017-08-06 11:07:14'),
(1262, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>cascas</i>" (in friends)', 'imagedisplay.php?id=64&world=0&uid=10&gid=0', 64, 0, '2017-08-06 11:07:14'),
(1263, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>cascas</i>" (in friends)', 'imagedisplay.php?id=64&world=0&uid=4&gid=0', 64, 1, '2017-08-06 11:07:14'),
(1264, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>cascavwewev</i>" (in the group Old Friends)', 'imagedisplay.php?id=65&world=0&uid=0&gid=1', 65, 1, '2017-08-06 11:09:35'),
(1265, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>cascavwewev</i>" (in the group Old Friends)', 'imagedisplay.php?id=65&world=0&uid=0&gid=1', 65, 1, '2017-08-06 11:09:35'),
(1266, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>cascavwewev</i>" (in friends)', 'imagedisplay.php?id=65&world=0&uid=11&gid=0', 65, 0, '2017-08-06 11:09:35'),
(1267, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>cascavwewev</i>" (in friends)', 'imagedisplay.php?id=65&world=0&uid=53&gid=0', 65, 0, '2017-08-06 11:09:35'),
(1268, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>cascavwewev</i>" (in friends)', 'imagedisplay.php?id=65&world=0&uid=10&gid=0', 65, 0, '2017-08-06 11:09:35'),
(1269, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>cascavwewev</i>" (in friends)', 'imagedisplay.php?id=65&world=0&uid=4&gid=0', 65, 1, '2017-08-06 11:09:35'),
(1270, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>casac</i>" (in the group onceAndForALl)', 'imagedisplay.php?id=66&world=0&uid=0&gid=5', 66, 1, '2017-08-06 11:10:21'),
(1271, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>casac</i>" (in friends)', 'imagedisplay.php?id=66&world=0&uid=11&gid=0', 66, 0, '2017-08-06 11:10:21'),
(1272, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>casac</i>" (in friends)', 'imagedisplay.php?id=66&world=0&uid=53&gid=0', 66, 0, '2017-08-06 11:10:21'),
(1273, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>casac</i>" (in friends)', 'imagedisplay.php?id=66&world=0&uid=10&gid=0', 66, 0, '2017-08-06 11:10:21'),
(1274, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>casac</i>" (in friends)', 'imagedisplay.php?id=66&world=0&uid=4&gid=0', 66, 1, '2017-08-06 11:10:21'),
(1275, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>casac</i>" (in friends)', 'imagedisplay.php?id=66&world=0&uid=3&gid=0', 66, 1, '2017-08-06 11:10:21'),
(1276, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>vewvwev</i>" (in the group Old Friends)', 'imagedisplay.php?id=67&world=0&uid=0&gid=1', 67, 1, '2017-08-06 11:14:08'),
(1277, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>vewvwev</i>" (in the group Old Friends)', 'imagedisplay.php?id=67&world=0&uid=0&gid=1', 67, 1, '2017-08-06 11:14:08'),
(1278, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>vewvwev</i>" (in friends)', 'imagedisplay.php?id=67&world=0&uid=11&gid=0', 67, 0, '2017-08-06 11:14:08'),
(1279, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>vewvwev</i>" (in friends)', 'imagedisplay.php?id=67&world=0&uid=53&gid=0', 67, 0, '2017-08-06 11:14:08'),
(1280, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>vewvwev</i>" (in friends)', 'imagedisplay.php?id=67&world=0&uid=10&gid=0', 67, 0, '2017-08-06 11:14:08'),
(1281, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>vewvwev</i>" (in friends)', 'imagedisplay.php?id=67&world=0&uid=4&gid=0', 67, 1, '2017-08-06 11:14:08'),
(1282, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>cascasewew</i>" (in the group Old Friends)', 'imagedisplay.php?id=68&world=0&uid=0&gid=1', 68, 1, '2017-08-06 11:16:13'),
(1283, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>cascasewew</i>" (in the group Old Friends)', 'imagedisplay.php?id=68&world=0&uid=0&gid=1', 68, 1, '2017-08-06 11:16:13'),
(1284, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>cascasewew</i>" (in friends)', 'imagedisplay.php?id=68&world=0&uid=11&gid=0', 68, 0, '2017-08-06 11:16:13'),
(1285, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>cascasewew</i>" (in friends)', 'imagedisplay.php?id=68&world=0&uid=53&gid=0', 68, 0, '2017-08-06 11:16:13'),
(1286, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>cascasewew</i>" (in friends)', 'imagedisplay.php?id=68&world=0&uid=10&gid=0', 68, 0, '2017-08-06 11:16:13'),
(1287, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>cascasewew</i>" (in friends)', 'imagedisplay.php?id=68&world=0&uid=4&gid=0', 68, 1, '2017-08-06 11:16:13'),
(1288, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>casc233232</i>" (from Subscriptions)', 'imagedisplay.php?id=69&world=1&uid=0&gid=0', 69, 0, '2017-08-06 15:14:27'),
(1289, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>casc233232</i>" (from Subscriptions)', 'imagedisplay.php?id=69&world=1&uid=0&gid=0', 69, 0, '2017-08-06 15:14:27'),
(1290, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>casc233232</i>" (from Subscriptions)', 'imagedisplay.php?id=69&world=1&uid=0&gid=0', 69, 1, '2017-08-06 15:14:27'),
(1291, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>casc233232</i>" (from Subscriptions)', 'imagedisplay.php?id=69&world=1&uid=0&gid=0', 69, 0, '2017-08-06 15:14:27'),
(1296, 3, 2, 'memeUpload', 'elon has uploaded a meme "<i>a</i>" (from Subscriptions)', 'imagedisplay.php?id=70&world=1&uid=0&gid=0', 70, 1, '2017-08-06 20:03:15'),
(1297, 3, 4, 'memeUpload', 'elon has uploaded a meme "<i>a</i>" (from Subscriptions)', 'imagedisplay.php?id=70&world=1&uid=0&gid=0', 70, 1, '2017-08-06 20:03:15'),
(1298, 3, 1, 'memeUpload', 'elon has uploaded a meme "<i>a</i>" (from Subscriptions)', 'imagedisplay.php?id=70&world=1&uid=0&gid=0', 70, 1, '2017-08-06 20:03:15'),
(1300, 4, 3, 'subscription', 'neha subscribed to you!', 'userprofile.php?id=4', 0, 1, '2017-08-06 20:23:36'),
(1301, 4, 3, 'friendRequest', 'neha has sent you a friend request.', 'userprofile.php?id=4', 21, 1, '2017-08-06 20:23:45');
INSERT INTO `notifications_table` (`id`, `senderId`, `receiverId`, `notificationType`, `notification`, `notificationLink`, `notificationForEventId`, `viewingStatus`, `datetime`) VALUES
(1303, 64, 65, 'subscription', 'a subscribed to you!', 'userprofile.php?id=64', 0, 0, '2017-08-06 20:35:41'),
(1304, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=71&world=1&uid=0&gid=0', 71, 0, '2017-08-07 17:04:30'),
(1305, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=71&world=1&uid=0&gid=0', 71, 0, '2017-08-07 17:04:30'),
(1306, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=71&world=1&uid=0&gid=0', 71, 1, '2017-08-07 17:04:30'),
(1307, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=71&world=1&uid=0&gid=0', 71, 0, '2017-08-07 17:04:30'),
(1308, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=72&world=1&uid=0&gid=0', 72, 0, '2017-08-07 17:14:34'),
(1309, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=72&world=1&uid=0&gid=0', 72, 0, '2017-08-07 17:14:34'),
(1310, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=72&world=1&uid=0&gid=0', 72, 1, '2017-08-07 17:14:34'),
(1311, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=72&world=1&uid=0&gid=0', 72, 0, '2017-08-07 17:14:34'),
(1312, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:18:22'),
(1313, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:18:22'),
(1314, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 1, '2017-08-07 17:18:22'),
(1315, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:18:22'),
(1316, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:22:54'),
(1317, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:22:54'),
(1318, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 1, '2017-08-07 17:22:54'),
(1319, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:22:54'),
(1320, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:28:26'),
(1321, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:28:26'),
(1322, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 1, '2017-08-07 17:28:26'),
(1323, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=0&world=1&uid=0&gid=0', 0, 0, '2017-08-07 17:28:26'),
(1324, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=73&world=1&uid=0&gid=0', 73, 0, '2017-08-07 17:31:11'),
(1325, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=73&world=1&uid=0&gid=0', 73, 0, '2017-08-07 17:31:11'),
(1326, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=73&world=1&uid=0&gid=0', 73, 1, '2017-08-07 17:31:11'),
(1327, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s mah boi</i>" (from Subscriptions)', 'imagedisplay.php?id=73&world=1&uid=0&gid=0', 73, 0, '2017-08-07 17:31:11'),
(1328, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=74&world=1&uid=0&gid=0', 74, 0, '2017-08-07 17:37:42'),
(1329, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=74&world=1&uid=0&gid=0', 74, 0, '2017-08-07 17:37:42'),
(1330, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=74&world=1&uid=0&gid=0', 74, 1, '2017-08-07 17:37:42'),
(1331, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>that''s india</i>" (from Subscriptions)', 'imagedisplay.php?id=74&world=1&uid=0&gid=0', 74, 0, '2017-08-07 17:37:42'),
(1332, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sharvais game</i>" (from Subscriptions)', 'imagedisplay.php?id=75&world=1&uid=0&gid=0', 75, 0, '2017-08-07 20:46:20'),
(1333, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>sharvais game</i>" (from Subscriptions)', 'imagedisplay.php?id=75&world=1&uid=0&gid=0', 75, 0, '2017-08-07 20:46:20'),
(1334, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sharvais game</i>" (from Subscriptions)', 'imagedisplay.php?id=75&world=1&uid=0&gid=0', 75, 1, '2017-08-07 20:46:20'),
(1335, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>sharvais game</i>" (from Subscriptions)', 'imagedisplay.php?id=75&world=1&uid=0&gid=0', 75, 0, '2017-08-07 20:46:20'),
(1336, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>mimi</i>" (from Subscriptions)', 'imagedisplay.php?id=76&world=1&uid=0&gid=0', 76, 0, '2017-08-11 20:16:23'),
(1337, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>mimi</i>" (from Subscriptions)', 'imagedisplay.php?id=76&world=1&uid=0&gid=0', 76, 0, '2017-08-11 20:16:23'),
(1338, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>mimi</i>" (from Subscriptions)', 'imagedisplay.php?id=76&world=1&uid=0&gid=0', 76, 1, '2017-08-11 20:16:23'),
(1339, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>mimi</i>" (from Subscriptions)', 'imagedisplay.php?id=76&world=1&uid=0&gid=0', 76, 0, '2017-08-11 20:16:23'),
(1341, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>mppm</i>" (from Subscriptions)', 'imagedisplay.php?id=77&world=1&uid=0&gid=0', 77, 0, '2017-08-11 23:26:52'),
(1342, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>mppm</i>" (from Subscriptions)', 'imagedisplay.php?id=77&world=1&uid=0&gid=0', 77, 0, '2017-08-11 23:26:52'),
(1343, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>mppm</i>" (from Subscriptions)', 'imagedisplay.php?id=77&world=1&uid=0&gid=0', 77, 1, '2017-08-11 23:26:52'),
(1344, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>mppm</i>" (from Subscriptions)', 'imagedisplay.php?id=77&world=1&uid=0&gid=0', 77, 0, '2017-08-11 23:26:52'),
(1345, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>Moms enemy number 1</i>" (from Subscriptions)', 'imagedisplay.php?id=78&world=1&uid=0&gid=0', 78, 0, '2017-08-12 19:55:02'),
(1346, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>Moms enemy number 1</i>" (from Subscriptions)', 'imagedisplay.php?id=78&world=1&uid=0&gid=0', 78, 0, '2017-08-12 19:55:02'),
(1347, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>Moms enemy number 1</i>" (from Subscriptions)', 'imagedisplay.php?id=78&world=1&uid=0&gid=0', 78, 1, '2017-08-12 19:55:02'),
(1348, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>Moms enemy number 1</i>" (from Subscriptions)', 'imagedisplay.php?id=78&world=1&uid=0&gid=0', 78, 0, '2017-08-12 19:55:02'),
(1349, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>meome?</i>" (from Subscriptions)', 'imagedisplay.php?id=79&world=1&uid=0&gid=0', 79, 0, '2017-08-12 19:57:35'),
(1350, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>meome?</i>" (from Subscriptions)', 'imagedisplay.php?id=79&world=1&uid=0&gid=0', 79, 0, '2017-08-12 19:57:35'),
(1351, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>meome?</i>" (from Subscriptions)', 'imagedisplay.php?id=79&world=1&uid=0&gid=0', 79, 1, '2017-08-12 19:57:35'),
(1352, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>meome?</i>" (from Subscriptions)', 'imagedisplay.php?id=79&world=1&uid=0&gid=0', 79, 0, '2017-08-12 19:57:35'),
(1353, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>reree</i>" (from Subscriptions)', 'imagedisplay.php?id=80&world=1&uid=0&gid=0', 80, 0, '2017-08-12 22:00:43'),
(1354, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>reree</i>" (from Subscriptions)', 'imagedisplay.php?id=80&world=1&uid=0&gid=0', 80, 0, '2017-08-12 22:00:43'),
(1355, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>reree</i>" (from Subscriptions)', 'imagedisplay.php?id=80&world=1&uid=0&gid=0', 80, 1, '2017-08-12 22:00:43'),
(1356, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>reree</i>" (from Subscriptions)', 'imagedisplay.php?id=80&world=1&uid=0&gid=0', 80, 0, '2017-08-12 22:00:43'),
(1358, 71, 1, 'subscription', 'ssjsjsj subscribed to you!', 'userprofile.php?id=71', 0, 1, '2017-08-19 23:40:58'),
(1359, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>arey re</i>" (from Subscriptions)', 'imagedisplay.php?id=81&world=1&uid=0&gid=0', 81, 0, '2017-08-19 23:42:14'),
(1360, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>arey re</i>" (from Subscriptions)', 'imagedisplay.php?id=81&world=1&uid=0&gid=0', 81, 0, '2017-08-19 23:42:14'),
(1361, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>arey re</i>" (from Subscriptions)', 'imagedisplay.php?id=81&world=1&uid=0&gid=0', 81, 1, '2017-08-19 23:42:14'),
(1362, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>arey re</i>" (from Subscriptions)', 'imagedisplay.php?id=81&world=1&uid=0&gid=0', 81, 0, '2017-08-19 23:42:14'),
(1363, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>arey re</i>" (from Subscriptions)', 'imagedisplay.php?id=81&world=1&uid=0&gid=0', 81, 0, '2017-08-19 23:42:14'),
(1364, 1, 71, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 22, 0, '2017-08-19 23:47:33'),
(1365, 38, 1, 'friendRequest', 'yuri has sent you a friend request.', 'userprofile.php?id=38', 23, 1, '2017-08-19 23:49:05'),
(1366, 1, 38, 'acceptFriendRequest', 'sharvai accepted your friend request!', 'userprofile.php?id=1', 23, 1, '2017-08-19 23:49:18'),
(1367, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>kook</i>" (in friends)', 'imagedisplay.php?id=82&world=0&uid=2&gid=0', 82, 1, '2017-08-19 23:49:27'),
(1368, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>kook</i>" (in friends)', 'imagedisplay.php?id=82&world=0&uid=11&gid=0', 82, 0, '2017-08-19 23:49:27'),
(1369, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>kook</i>" (in friends)', 'imagedisplay.php?id=82&world=0&uid=53&gid=0', 82, 0, '2017-08-19 23:49:27'),
(1370, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>kook</i>" (in friends)', 'imagedisplay.php?id=82&world=0&uid=10&gid=0', 82, 0, '2017-08-19 23:49:27'),
(1371, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>kook</i>" (in friends)', 'imagedisplay.php?id=82&world=0&uid=4&gid=0', 82, 1, '2017-08-19 23:49:27'),
(1372, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>kook</i>" (in friends)', 'imagedisplay.php?id=82&world=0&uid=3&gid=0', 82, 1, '2017-08-19 23:49:27'),
(1373, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>wqw</i>" (in friends)', 'imagedisplay.php?id=83&world=0&uid=2&gid=0', 83, 1, '2017-08-20 00:07:12'),
(1374, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wqw</i>" (in friends)', 'imagedisplay.php?id=83&world=0&uid=11&gid=0', 83, 0, '2017-08-20 00:07:12'),
(1375, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>wqw</i>" (in friends)', 'imagedisplay.php?id=83&world=0&uid=53&gid=0', 83, 0, '2017-08-20 00:07:12'),
(1376, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>wqw</i>" (in friends)', 'imagedisplay.php?id=83&world=0&uid=10&gid=0', 83, 0, '2017-08-20 00:07:12'),
(1377, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>wqw</i>" (in friends)', 'imagedisplay.php?id=83&world=0&uid=4&gid=0', 83, 1, '2017-08-20 00:07:12'),
(1378, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wqw</i>" (in friends)', 'imagedisplay.php?id=83&world=0&uid=3&gid=0', 83, 1, '2017-08-20 00:07:12'),
(1379, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>wqwqwr</i>" (in friends)', 'imagedisplay.php?id=84&world=0&uid=2&gid=0', 84, 1, '2017-08-20 00:09:28'),
(1380, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wqwqwr</i>" (in friends)', 'imagedisplay.php?id=84&world=0&uid=11&gid=0', 84, 0, '2017-08-20 00:09:28'),
(1381, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>wqwqwr</i>" (in friends)', 'imagedisplay.php?id=84&world=0&uid=53&gid=0', 84, 0, '2017-08-20 00:09:28'),
(1382, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>wqwqwr</i>" (in friends)', 'imagedisplay.php?id=84&world=0&uid=10&gid=0', 84, 0, '2017-08-20 00:09:28'),
(1383, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>wqwqwr</i>" (in friends)', 'imagedisplay.php?id=84&world=0&uid=4&gid=0', 84, 1, '2017-08-20 00:09:28'),
(1384, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wqwqwr</i>" (in friends)', 'imagedisplay.php?id=84&world=0&uid=3&gid=0', 84, 1, '2017-08-20 00:09:28'),
(1385, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>wqqwr</i>" (in friends)', 'imagedisplay.php?id=85&world=0&uid=2&gid=0', 85, 1, '2017-08-20 00:10:28'),
(1386, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wqqwr</i>" (in friends)', 'imagedisplay.php?id=85&world=0&uid=11&gid=0', 85, 0, '2017-08-20 00:10:28'),
(1387, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>wqqwr</i>" (in friends)', 'imagedisplay.php?id=85&world=0&uid=53&gid=0', 85, 0, '2017-08-20 00:10:28'),
(1388, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>wqqwr</i>" (in friends)', 'imagedisplay.php?id=85&world=0&uid=10&gid=0', 85, 0, '2017-08-20 00:10:28'),
(1389, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>wqqwr</i>" (in friends)', 'imagedisplay.php?id=85&world=0&uid=4&gid=0', 85, 1, '2017-08-20 00:10:28'),
(1390, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wqqwr</i>" (in friends)', 'imagedisplay.php?id=85&world=0&uid=3&gid=0', 85, 1, '2017-08-20 00:10:28'),
(1391, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (in friends)', 'imagedisplay.php?id=86&world=0&uid=2&gid=0', 86, 1, '2017-08-20 00:11:44'),
(1392, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (in friends)', 'imagedisplay.php?id=86&world=0&uid=11&gid=0', 86, 0, '2017-08-20 00:11:44'),
(1393, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (in friends)', 'imagedisplay.php?id=86&world=0&uid=53&gid=0', 86, 0, '2017-08-20 00:11:44'),
(1394, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (in friends)', 'imagedisplay.php?id=86&world=0&uid=10&gid=0', 86, 0, '2017-08-20 00:11:44'),
(1395, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (in friends)', 'imagedisplay.php?id=86&world=0&uid=4&gid=0', 86, 1, '2017-08-20 00:11:44'),
(1396, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (in friends)', 'imagedisplay.php?id=86&world=0&uid=3&gid=0', 86, 1, '2017-08-20 00:11:44'),
(1397, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=2&gid=0', 87, 1, '2017-08-20 09:01:07'),
(1398, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=11&gid=0', 87, 0, '2017-08-20 09:01:07'),
(1399, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=53&gid=0', 87, 0, '2017-08-20 09:01:07'),
(1400, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=10&gid=0', 87, 0, '2017-08-20 09:01:07'),
(1401, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=4&gid=0', 87, 1, '2017-08-20 09:01:07'),
(1402, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=3&gid=0', 87, 1, '2017-08-20 09:01:07'),
(1403, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>wewe</i>" (in friends)', 'imagedisplay.php?id=87&world=0&uid=38&gid=0', 87, 1, '2017-08-20 09:01:07'),
(1404, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>aa reuy</i>" (from Subscriptions)', 'imagedisplay.php?id=88&world=1&uid=0&gid=0', 88, 0, '2017-08-24 15:57:01'),
(1405, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>aa reuy</i>" (from Subscriptions)', 'imagedisplay.php?id=88&world=1&uid=0&gid=0', 88, 0, '2017-08-24 15:57:01'),
(1406, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>aa reuy</i>" (from Subscriptions)', 'imagedisplay.php?id=88&world=1&uid=0&gid=0', 88, 1, '2017-08-24 15:57:01'),
(1407, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>aa reuy</i>" (from Subscriptions)', 'imagedisplay.php?id=88&world=1&uid=0&gid=0', 88, 0, '2017-08-24 15:57:01'),
(1408, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>aa reuy</i>" (from Subscriptions)', 'imagedisplay.php?id=88&world=1&uid=0&gid=0', 88, 0, '2017-08-24 15:57:01'),
(1409, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>rwwrwr</i>" (from Subscriptions)', 'imagedisplay.php?id=89&world=1&uid=0&gid=0', 89, 0, '2017-08-24 16:05:19'),
(1410, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>rwwrwr</i>" (from Subscriptions)', 'imagedisplay.php?id=89&world=1&uid=0&gid=0', 89, 0, '2017-08-24 16:05:19'),
(1411, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>rwwrwr</i>" (from Subscriptions)', 'imagedisplay.php?id=89&world=1&uid=0&gid=0', 89, 1, '2017-08-24 16:05:19'),
(1412, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>rwwrwr</i>" (from Subscriptions)', 'imagedisplay.php?id=89&world=1&uid=0&gid=0', 89, 0, '2017-08-24 16:05:19'),
(1413, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>rwwrwr</i>" (from Subscriptions)', 'imagedisplay.php?id=89&world=1&uid=0&gid=0', 89, 0, '2017-08-24 16:05:19'),
(1414, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>reewasfvvv</i>" (from Subscriptions)', 'imagedisplay.php?id=90&world=1&uid=0&gid=0', 90, 0, '2017-08-24 16:32:48'),
(1415, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>reewasfvvv</i>" (from Subscriptions)', 'imagedisplay.php?id=90&world=1&uid=0&gid=0', 90, 0, '2017-08-24 16:32:48'),
(1416, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>reewasfvvv</i>" (from Subscriptions)', 'imagedisplay.php?id=90&world=1&uid=0&gid=0', 90, 1, '2017-08-24 16:32:48'),
(1417, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>reewasfvvv</i>" (from Subscriptions)', 'imagedisplay.php?id=90&world=1&uid=0&gid=0', 90, 0, '2017-08-24 16:32:48'),
(1418, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>reewasfvvv</i>" (from Subscriptions)', 'imagedisplay.php?id=90&world=1&uid=0&gid=0', 90, 0, '2017-08-24 16:32:48'),
(1419, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>karkar</i>" (from Subscriptions)', 'imagedisplay.php?id=91&world=1&uid=0&gid=0', 91, 0, '2017-08-24 16:39:42'),
(1420, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>karkar</i>" (from Subscriptions)', 'imagedisplay.php?id=91&world=1&uid=0&gid=0', 91, 0, '2017-08-24 16:39:42'),
(1421, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>karkar</i>" (from Subscriptions)', 'imagedisplay.php?id=91&world=1&uid=0&gid=0', 91, 1, '2017-08-24 16:39:42'),
(1422, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>karkar</i>" (from Subscriptions)', 'imagedisplay.php?id=91&world=1&uid=0&gid=0', 91, 0, '2017-08-24 16:39:42'),
(1423, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>karkar</i>" (from Subscriptions)', 'imagedisplay.php?id=91&world=1&uid=0&gid=0', 91, 0, '2017-08-24 16:39:42'),
(1424, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>one more!?..</i>" (from Subscriptions)', 'imagedisplay.php?id=92&world=1&uid=0&gid=0', 92, 0, '2017-08-24 16:46:55'),
(1425, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>one more!?..</i>" (from Subscriptions)', 'imagedisplay.php?id=92&world=1&uid=0&gid=0', 92, 0, '2017-08-24 16:46:55'),
(1426, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>one more!?..</i>" (from Subscriptions)', 'imagedisplay.php?id=92&world=1&uid=0&gid=0', 92, 1, '2017-08-24 16:46:55'),
(1427, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>one more!?..</i>" (from Subscriptions)', 'imagedisplay.php?id=92&world=1&uid=0&gid=0', 92, 0, '2017-08-24 16:46:55'),
(1428, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>one more!?..</i>" (from Subscriptions)', 'imagedisplay.php?id=92&world=1&uid=0&gid=0', 92, 0, '2017-08-24 16:46:55'),
(1429, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wweggg</i>" (from Subscriptions)', 'imagedisplay.php?id=93&world=1&uid=0&gid=0', 93, 0, '2017-08-24 16:56:37'),
(1430, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>wweggg</i>" (from Subscriptions)', 'imagedisplay.php?id=93&world=1&uid=0&gid=0', 93, 0, '2017-08-24 16:56:37'),
(1431, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wweggg</i>" (from Subscriptions)', 'imagedisplay.php?id=93&world=1&uid=0&gid=0', 93, 1, '2017-08-24 16:56:37'),
(1432, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>wweggg</i>" (from Subscriptions)', 'imagedisplay.php?id=93&world=1&uid=0&gid=0', 93, 0, '2017-08-24 16:56:37'),
(1433, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>wweggg</i>" (from Subscriptions)', 'imagedisplay.php?id=93&world=1&uid=0&gid=0', 93, 0, '2017-08-24 16:56:37'),
(1434, 38, 0, 'subscription', 'yuri subscribed to you!', 'userprofile.php?id=38', 0, 1, '2017-08-24 17:16:14'),
(1435, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>tete</i>" (from Subscriptions)', 'imagedisplay.php?id=94&world=1&uid=0&gid=0', 94, 0, '2017-08-24 17:16:51'),
(1436, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>tete</i>" (from Subscriptions)', 'imagedisplay.php?id=94&world=1&uid=0&gid=0', 94, 0, '2017-08-24 17:16:51'),
(1437, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>tete</i>" (from Subscriptions)', 'imagedisplay.php?id=94&world=1&uid=0&gid=0', 94, 1, '2017-08-24 17:16:51'),
(1438, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>tete</i>" (from Subscriptions)', 'imagedisplay.php?id=94&world=1&uid=0&gid=0', 94, 0, '2017-08-24 17:16:51'),
(1439, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>tete</i>" (from Subscriptions)', 'imagedisplay.php?id=94&world=1&uid=0&gid=0', 94, 0, '2017-08-24 17:16:51'),
(1440, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>tete</i>" (from Subscriptions)', 'imagedisplay.php?id=94&world=1&uid=0&gid=0', 94, 1, '2017-08-24 17:16:51'),
(1441, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>qww</i>" (from Subscriptions)', 'imagedisplay.php?id=95&world=1&uid=0&gid=0', 95, 0, '2017-08-24 17:20:50'),
(1442, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>qww</i>" (from Subscriptions)', 'imagedisplay.php?id=95&world=1&uid=0&gid=0', 95, 0, '2017-08-24 17:20:50'),
(1443, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>qww</i>" (from Subscriptions)', 'imagedisplay.php?id=95&world=1&uid=0&gid=0', 95, 1, '2017-08-24 17:20:50'),
(1444, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>qww</i>" (from Subscriptions)', 'imagedisplay.php?id=95&world=1&uid=0&gid=0', 95, 0, '2017-08-24 17:20:50'),
(1445, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>qww</i>" (from Subscriptions)', 'imagedisplay.php?id=95&world=1&uid=0&gid=0', 95, 0, '2017-08-24 17:20:50'),
(1446, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>qww</i>" (from Subscriptions)', 'imagedisplay.php?id=95&world=1&uid=0&gid=0', 95, 1, '2017-08-24 17:20:50'),
(1447, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>tewwzs</i>" (from Subscriptions)', 'imagedisplay.php?id=96&world=1&uid=0&gid=0', 96, 0, '2017-08-24 17:27:15'),
(1448, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>tewwzs</i>" (from Subscriptions)', 'imagedisplay.php?id=96&world=1&uid=0&gid=0', 96, 0, '2017-08-24 17:27:15'),
(1449, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>tewwzs</i>" (from Subscriptions)', 'imagedisplay.php?id=96&world=1&uid=0&gid=0', 96, 1, '2017-08-24 17:27:15'),
(1450, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>tewwzs</i>" (from Subscriptions)', 'imagedisplay.php?id=96&world=1&uid=0&gid=0', 96, 0, '2017-08-24 17:27:15'),
(1451, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>tewwzs</i>" (from Subscriptions)', 'imagedisplay.php?id=96&world=1&uid=0&gid=0', 96, 0, '2017-08-24 17:27:15'),
(1452, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>tewwzs</i>" (from Subscriptions)', 'imagedisplay.php?id=96&world=1&uid=0&gid=0', 96, 1, '2017-08-24 17:27:15'),
(1468, 1, 2, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 1, '2017-08-30 21:04:39'),
(1469, 1, 3, 'imageLike', 'sharvai liked your meme "<i>MAH SHIR</i>"', 'imagedisplay.php?id=16&world=1&uid=0&gid=0', 16, 1, '2017-08-30 21:18:35'),
(1475, 1, 2, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 1, '2017-09-01 22:23:21'),
(1476, 40, 1, 'friendRequest', 'shux has sent you a friend request.', 'userprofile.php?id=40', 24, 1, '2017-09-02 16:06:52'),
(1479, 40, 1, 'subscription', 'shux subscribed to you!', 'userprofile.php?id=40', 0, 1, '2017-09-02 16:08:22'),
(1480, 1, 40, 'acceptFriendRequest', 'sharvai accepted your friend request!', 'userprofile.php?id=1', 24, 0, '2017-09-02 16:09:31'),
(1481, 1, 4, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 1, '2017-09-02 19:48:25'),
(1482, 1, 64, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-09-02 19:49:37'),
(1483, 1, 61, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-09-02 19:49:42'),
(1484, 1, 61, 'friendRequest', 'sharvai has sent you a friend request.', 'userprofile.php?id=1', 25, 0, '2017-09-02 19:52:03'),
(1485, 1, 3, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-03 02:09:24'),
(1486, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-03 02:09:24'),
(1487, 1, 3, 'imageLike', 'sharvai liked your meme "<i>joker</i>"', 'imagedisplay.php?id=29&world=1&uid=0&gid=0', 29, 1, '2017-09-03 11:37:40'),
(1490, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv75', 75, 1, '2017-09-03 15:38:39'),
(1491, 1, 4, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 1, '2017-09-03 15:56:45'),
(1492, 1, 2, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 1, '2017-09-03 15:56:56'),
(1493, 1, 54, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-09-03 15:57:38'),
(1494, 1, 63, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-09-03 15:57:47'),
(1495, 1, 61, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 0, '2017-09-03 15:57:54'),
(1496, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv76', 76, 1, '2017-09-03 16:21:13'),
(1497, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv77', 77, 1, '2017-09-04 19:44:40'),
(1498, 1, 3, 'questionLike', 'sharvai liked your question "<i>STYUCKKK</i>".', 'questiondisplay.php?id=13', 13, 1, '2017-09-04 19:46:03'),
(1500, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv78', 78, 1, '2017-09-04 20:56:38'),
(1504, 1, 3, 'answerReply', 'sharvai replied on your answer "<i>ccac</i>"', 'questiondisplay.php?id=10#answerreply_div80', 109, 1, '2017-09-05 18:56:49'),
(1505, 1, 3, 'answerReply', 'sharvai replied on your answer "<i>ccac</i>"', 'questiondisplay.php?id=10#answerreply_div81', 109, 1, '2017-09-05 18:57:36'),
(1506, 1, 3, 'answerReply', 'sharvai replied on your answer "<i>ccac</i>"', 'questiondisplay.php?id=10#answerreply_div82', 109, 1, '2017-09-05 18:59:04'),
(1507, 1, 3, 'answerReply', 'sharvai replied on your answer "<i>ccac</i>"', 'questiondisplay.php?id=10#answerreply_div83', 109, 1, '2017-09-05 19:11:58'),
(1508, 1, 3, 'answerReply', 'sharvai replied on your answer "<i>ccac</i>"', 'questiondisplay.php?id=10#answerreply_div86', 109, 1, '2017-09-05 19:17:58'),
(1509, 1, 3, 'answerReply', 'sharvai replied on your answer "<i>ccac</i>"', 'questiondisplay.php?id=10#answerreply_div87', 109, 1, '2017-09-05 19:18:19'),
(1510, 1, 3, 'answerLike', 'sharvai liked your answer hh"', 'questiondisplay.php?id=10#answerdiv105', 105, 1, '2017-09-05 19:19:53'),
(1511, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 0, '2017-09-06 23:24:58'),
(1512, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 0, '2017-09-06 23:24:58'),
(1513, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 1, '2017-09-06 23:24:58'),
(1514, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 0, '2017-09-06 23:24:58'),
(1515, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 0, '2017-09-06 23:24:58'),
(1516, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 1, '2017-09-06 23:24:58'),
(1517, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>True story</i>" (from Subscriptions)', 'imagedisplay.php?id=97&world=1&uid=0&gid=0', 97, 0, '2017-09-06 23:24:58'),
(1522, 1, 3, 'imageLike', 'sharvai liked your meme "<i>try</i>"', 'imagedisplay.php?id=11&world=1&uid=0&gid=0', 11, 1, '2017-09-07 05:49:55'),
(1523, 1, 3, 'imageLike', 'sharvai liked your meme "<i>dawd</i>"', 'imagedisplay.php?id=35&world=1&uid=0&gid=0', 35, 1, '2017-09-07 20:24:01'),
(1525, 1, 3, 'subscription', 'sharvai subscribed to you!', 'userprofile.php?id=1', 0, 1, '2017-09-07 21:04:26'),
(1526, 1, 3, '0', 'sharvai commented on your meme <q><i>joker</i></q> (in my Meagles)', 'imagedisplay.php?id=29&world=0&uid=1&gid=0#commentdiv80', 80, 1, '2017-09-09 00:03:09'),
(1527, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>For old times sake</i>" (in the group Old Friends)', 'imagedisplay.php?id=98&world=0&uid=0&gid=1', 98, 1, '2017-09-09 12:43:49'),
(1528, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>For old times sake</i>" (in the group Old Friends)', 'imagedisplay.php?id=98&world=0&uid=0&gid=1', 98, 1, '2017-09-09 12:43:49'),
(1529, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 0, '2017-09-09 16:09:46'),
(1530, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 0, '2017-09-09 16:09:46'),
(1531, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 1, '2017-09-09 16:09:46'),
(1532, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 0, '2017-09-09 16:09:46'),
(1533, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 0, '2017-09-09 16:09:46'),
(1534, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 1, '2017-09-09 16:09:46'),
(1535, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>gre</i>" (from Subscriptions)', 'imagedisplay.php?id=99&world=1&uid=0&gid=0', 99, 0, '2017-09-09 16:09:46'),
(1536, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 1, 1, '2017-09-09 16:28:41'),
(1537, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>Old Friends</i>"', 'groupspage.php?id=1', 1, 0, '2017-09-09 16:31:54'),
(1538, 1, 38, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:32:58'),
(1539, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:34:31'),
(1540, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:34:50'),
(1541, 1, 40, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:34:50'),
(1542, 1, 11, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:38:12'),
(1543, 1, 10, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:38:12'),
(1544, 1, 38, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:39:18'),
(1545, 1, 10, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:39:18'),
(1546, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:39:18'),
(1547, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:40:58'),
(1548, 1, 40, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:40:58'),
(1549, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:42:25'),
(1550, 1, 10, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:42:25'),
(1551, 1, 53, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:42:25'),
(1552, 1, 10, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:42:10'),
(1553, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:42:10'),
(1554, 1, 38, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:42:56'),
(1555, 1, 10, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 0, '2017-09-09 16:43:31'),
(1556, 1, 4, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:43:31'),
(1557, 1, 38, 'groupInvitation', 'sharvai has invited you to the group "<i>aao re yaar</i>"', 'groupspage.php?id=13', 13, 1, '2017-09-09 16:43:31'),
(1558, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 0, '2017-09-09 16:44:18'),
(1559, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 0, '2017-09-09 16:44:18'),
(1560, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 1, '2017-09-09 16:44:18'),
(1561, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 0, '2017-09-09 16:44:18'),
(1562, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 0, '2017-09-09 16:44:18'),
(1563, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 1, '2017-09-09 16:44:18'),
(1564, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>great</i>" (from Subscriptions)', 'imagedisplay.php?id=100&world=1&uid=0&gid=0', 100, 0, '2017-09-09 16:44:18'),
(1565, 3, 1, 'acceptGroupInvite', 'elon accepted your invitation to the group aao re yaar.', 'groupspage.php?id=13', 13, 1, '2017-09-09 20:01:20'),
(1566, 3, 1, 'acceptGroupInvite', 'elon accepted your invitation to the group aao re yaar.', 'groupspage.php?id=13', 13, 1, '2017-09-09 20:04:43'),
(1567, 77, 1, 'imageLike', 'mahnamajeff liked your meme "<i>Elon Musk Inspirational</i>"', 'imagedisplay.php?id=1&world=1&uid=0&gid=0', 1, 1, '2017-09-09 22:04:51'),
(1568, 77, 1, 'subscription', 'mahnamajeff subscribed to you!', 'userprofile.php?id=77', 0, 1, '2017-09-09 22:21:36'),
(1569, 1, 2, 'groupInvitation', 'sharvai has invited you to the group "<i>kopoko</i>"', 'groupspage.php?id=14', 14, 1, '2017-09-09 23:12:47'),
(1570, 83, 1, 'subscription', 'lapooloo subscribed to you!', 'userprofile.php?id=83', 0, 1, '2017-10-05 21:44:20'),
(1571, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1572, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1573, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1574, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1575, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1576, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1577, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1578, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 0, '2017-10-05 21:44:36'),
(1579, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>wd</i>" (from Subscriptions)', 'imagedisplay.php?id=102&world=1&uid=0&gid=0', 102, 1, '2017-10-05 21:44:36'),
(1580, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1581, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1582, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1583, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1584, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1585, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1586, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1587, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 0, '2017-12-23 17:00:41'),
(1588, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>width 300 with no resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=103&world=1&uid=0&gid=0', 103, 1, '2017-12-23 17:00:41'),
(1589, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1590, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1591, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1592, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1593, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1594, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1595, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1596, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 0, '2017-12-23 17:02:40'),
(1597, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>widht 300 with resizing</i>" (from Subscriptions)', 'imagedisplay.php?id=104&world=1&uid=0&gid=0', 104, 1, '2017-12-23 17:02:40'),
(1598, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1599, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1600, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1601, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1602, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1603, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1604, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1605, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 0, '2017-12-23 17:26:03'),
(1606, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>greater than 600</i>" (from Subscriptions)', 'imagedisplay.php?id=105&world=1&uid=0&gid=0', 105, 1, '2017-12-23 17:26:03'),
(1607, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1608, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1609, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1610, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1611, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1612, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1613, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1614, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 0, '2017-12-23 17:54:00'),
(1615, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>sa</i>" (from Subscriptions)', 'imagedisplay.php?id=106&world=1&uid=0&gid=0', 106, 1, '2017-12-23 17:54:00'),
(1616, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1617, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1618, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1619, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1620, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1621, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1622, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1623, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 0, '2017-12-23 17:56:52'),
(1624, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>ttt</i>" (from Subscriptions)', 'imagedisplay.php?id=107&world=1&uid=0&gid=0', 107, 1, '2017-12-23 17:56:52'),
(1625, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1626, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1627, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1628, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1629, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1630, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1631, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1632, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 0, '2017-12-23 18:08:44'),
(1633, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>sungi</i>" (from Subscriptions)', 'imagedisplay.php?id=108&world=1&uid=0&gid=0', 108, 1, '2017-12-23 18:08:44'),
(1634, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1635, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1636, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1637, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1638, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1639, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04');
INSERT INTO `notifications_table` (`id`, `senderId`, `receiverId`, `notificationType`, `notification`, `notificationLink`, `notificationForEventId`, `viewingStatus`, `datetime`) VALUES
(1640, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1641, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1642, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>sdds</i>" (from Subscriptions)', 'imagedisplay.php?id=109&world=1&uid=0&gid=0', 109, 0, '2018-01-05 18:28:04'),
(1643, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1644, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1645, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1646, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1647, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1648, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1649, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1650, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1651, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>wqd</i>" (from Subscriptions)', 'imagedisplay.php?id=110&world=1&uid=0&gid=0', 110, 0, '2018-01-11 18:29:58'),
(1652, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1653, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1654, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1655, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1656, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1657, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1658, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1659, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1660, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>ff</i>" (from Subscriptions)', 'imagedisplay.php?id=111&world=1&uid=0&gid=0', 111, 0, '2018-01-11 18:35:55'),
(1661, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=2&gid=0', 112, 1, '2018-01-11 18:37:22'),
(1662, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=11&gid=0', 112, 0, '2018-01-11 18:37:22'),
(1663, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=53&gid=0', 112, 0, '2018-01-11 18:37:22'),
(1664, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=10&gid=0', 112, 0, '2018-01-11 18:37:22'),
(1665, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=4&gid=0', 112, 1, '2018-01-11 18:37:22'),
(1666, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=3&gid=0', 112, 0, '2018-01-11 18:37:22'),
(1667, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=38&gid=0', 112, 0, '2018-01-11 18:37:22'),
(1668, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>rere</i>" (in friends)', 'imagedisplay.php?id=112&world=0&uid=40&gid=0', 112, 0, '2018-01-11 18:37:22'),
(1669, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=2&gid=0', 113, 1, '2018-01-11 19:10:48'),
(1670, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=11&gid=0', 113, 0, '2018-01-11 19:10:48'),
(1671, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=53&gid=0', 113, 0, '2018-01-11 19:10:48'),
(1672, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=10&gid=0', 113, 0, '2018-01-11 19:10:48'),
(1673, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=4&gid=0', 113, 1, '2018-01-11 19:10:48'),
(1674, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=3&gid=0', 113, 0, '2018-01-11 19:10:48'),
(1675, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=38&gid=0', 113, 0, '2018-01-11 19:10:48'),
(1676, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>fffwe</i>" (in friends)', 'imagedisplay.php?id=113&world=0&uid=40&gid=0', 113, 0, '2018-01-11 19:10:48'),
(1677, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=2&gid=0', 114, 1, '2018-01-11 19:21:17'),
(1678, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=11&gid=0', 114, 0, '2018-01-11 19:21:17'),
(1679, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=53&gid=0', 114, 0, '2018-01-11 19:21:17'),
(1680, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=10&gid=0', 114, 0, '2018-01-11 19:21:17'),
(1681, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=4&gid=0', 114, 1, '2018-01-11 19:21:17'),
(1682, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=3&gid=0', 114, 0, '2018-01-11 19:21:17'),
(1683, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=38&gid=0', 114, 0, '2018-01-11 19:21:17'),
(1684, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>fewfe</i>" (in friends)', 'imagedisplay.php?id=114&world=0&uid=40&gid=0', 114, 0, '2018-01-11 19:21:17'),
(1685, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=2&gid=0', 115, 1, '2018-01-11 20:33:38'),
(1686, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=11&gid=0', 115, 0, '2018-01-11 20:33:38'),
(1687, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=53&gid=0', 115, 0, '2018-01-11 20:33:38'),
(1688, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=10&gid=0', 115, 0, '2018-01-11 20:33:38'),
(1689, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=4&gid=0', 115, 1, '2018-01-11 20:33:38'),
(1690, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=3&gid=0', 115, 0, '2018-01-11 20:33:38'),
(1691, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=38&gid=0', 115, 0, '2018-01-11 20:33:38'),
(1692, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>h</i>" (in friends)', 'imagedisplay.php?id=115&world=0&uid=40&gid=0', 115, 0, '2018-01-11 20:33:38'),
(1693, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=2&gid=0', 116, 1, '2018-01-11 20:50:56'),
(1694, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=11&gid=0', 116, 0, '2018-01-11 20:50:56'),
(1695, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=53&gid=0', 116, 0, '2018-01-11 20:50:56'),
(1696, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=10&gid=0', 116, 0, '2018-01-11 20:50:56'),
(1697, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=4&gid=0', 116, 1, '2018-01-11 20:50:56'),
(1698, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=3&gid=0', 116, 0, '2018-01-11 20:50:56'),
(1699, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=38&gid=0', 116, 0, '2018-01-11 20:50:56'),
(1700, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>ef</i>" (in friends)', 'imagedisplay.php?id=116&world=0&uid=40&gid=0', 116, 0, '2018-01-11 20:50:56'),
(1701, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=2&gid=0', 117, 1, '2018-01-11 20:55:36'),
(1702, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=11&gid=0', 117, 0, '2018-01-11 20:55:36'),
(1703, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=53&gid=0', 117, 0, '2018-01-11 20:55:36'),
(1704, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=10&gid=0', 117, 0, '2018-01-11 20:55:36'),
(1705, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=4&gid=0', 117, 1, '2018-01-11 20:55:36'),
(1706, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=3&gid=0', 117, 0, '2018-01-11 20:55:36'),
(1707, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=38&gid=0', 117, 0, '2018-01-11 20:55:36'),
(1708, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>sasd</i>" (in friends)', 'imagedisplay.php?id=117&world=0&uid=40&gid=0', 117, 0, '2018-01-11 20:55:36'),
(1709, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=2&gid=0', 118, 1, '2018-01-11 20:59:49'),
(1710, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=11&gid=0', 118, 0, '2018-01-11 20:59:49'),
(1711, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=53&gid=0', 118, 0, '2018-01-11 20:59:49'),
(1712, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=10&gid=0', 118, 0, '2018-01-11 20:59:49'),
(1713, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=4&gid=0', 118, 1, '2018-01-11 20:59:49'),
(1714, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=3&gid=0', 118, 0, '2018-01-11 20:59:49'),
(1715, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=38&gid=0', 118, 0, '2018-01-11 20:59:49'),
(1716, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>sadddw</i>" (in friends)', 'imagedisplay.php?id=118&world=0&uid=40&gid=0', 118, 0, '2018-01-11 20:59:49'),
(1717, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=2&gid=0', 119, 1, '2018-01-11 21:08:27'),
(1718, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=11&gid=0', 119, 0, '2018-01-11 21:08:27'),
(1719, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=53&gid=0', 119, 0, '2018-01-11 21:08:27'),
(1720, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=10&gid=0', 119, 0, '2018-01-11 21:08:27'),
(1721, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=4&gid=0', 119, 1, '2018-01-11 21:08:27'),
(1722, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=3&gid=0', 119, 0, '2018-01-11 21:08:27'),
(1723, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=38&gid=0', 119, 0, '2018-01-11 21:08:27'),
(1724, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>dwdwas</i>" (in friends)', 'imagedisplay.php?id=119&world=0&uid=40&gid=0', 119, 0, '2018-01-11 21:08:27'),
(1725, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=2&gid=0', 120, 1, '2018-01-11 21:12:37'),
(1726, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=11&gid=0', 120, 0, '2018-01-11 21:12:37'),
(1727, 1, 53, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=53&gid=0', 120, 0, '2018-01-11 21:12:37'),
(1728, 1, 10, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=10&gid=0', 120, 0, '2018-01-11 21:12:37'),
(1729, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=4&gid=0', 120, 1, '2018-01-11 21:12:37'),
(1730, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=3&gid=0', 120, 0, '2018-01-11 21:12:37'),
(1731, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=38&gid=0', 120, 0, '2018-01-11 21:12:37'),
(1732, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>breb</i>" (in friends)', 'imagedisplay.php?id=120&world=0&uid=40&gid=0', 120, 0, '2018-01-11 21:12:37'),
(1733, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>Se</i>" (in friends)', 'imagedisplay.php?id=121&world=0&uid=38&gid=0', 121, 0, '2018-01-11 21:32:22'),
(1734, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>Read zhis</i>" (in friends)', 'imagedisplay.php?id=122&world=0&uid=4&gid=0', 122, 1, '2018-02-11 01:55:26'),
(1735, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1736, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1737, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1738, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1739, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1740, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1741, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1742, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1743, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (from Subscriptions)', 'imagedisplay.php?id=123&world=1&uid=0&gid=0', 123, 0, '2018-02-11 02:00:33'),
(1744, 1, 4, 'memeUpload', 'sharvai has uploaded a meme "<i>vs=3</i>" (in friends)', 'imagedisplay.php?id=123&world=0&uid=4&gid=0', 123, 1, '2018-02-11 02:00:33'),
(1745, 1, 2, 'memeUpload', 'sharvai has uploaded a meme "<i>grp for elon not ne</i>" (in the group Old Friends)', 'imagedisplay.php?id=124&world=0&uid=0&gid=1', 124, 1, '2018-02-11 02:56:45'),
(1746, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>grp for elon not ne</i>" (in the group Old Friends)', 'imagedisplay.php?id=124&world=0&uid=0&gid=1', 124, 0, '2018-02-11 02:56:45'),
(1747, 5, 1, 'acceptFriendRequest', 'dhrishty accepted your friend request!', 'userprofile.php?id=5', 9, 0, '2018-02-11 12:59:06'),
(1748, 1, 11, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1749, 1, 8, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1750, 1, 3, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1751, 1, 61, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1752, 1, 71, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1753, 1, 38, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1754, 1, 40, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1755, 1, 77, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59'),
(1756, 1, 83, 'memeUpload', 'sharvai has uploaded a meme "<i>sad</i>" (from Subscriptions)', 'imagedisplay.php?id=125&world=1&uid=0&gid=0', 125, 0, '2018-07-05 11:35:59');

-- --------------------------------------------------------

--
-- Table structure for table `othermemessubscriberstable`
--

CREATE TABLE `othermemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `othermemessubscriberstable`
--

INSERT INTO `othermemessubscriberstable` (`id`, `subscribedByUserId`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pewds_memes_table`
--

CREATE TABLE `pewds_memes_table` (
  `id` int(11) NOT NULL,
  `meme_name` varchar(1000) NOT NULL,
  `score` float NOT NULL,
  `total_ratings` int(11) NOT NULL,
  `image_location` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pewds_memes_table`
--

INSERT INTO `pewds_memes_table` (`id`, `meme_name`, `score`, `total_ratings`, `image_location`) VALUES
(1, 'Doki Doki Literature Club Memes', 4.83, 3, 'rate memes pics/dokidoki.jpg'),
(2, 'Petting Dog Memes', 10, 1, 'rate memes pics/petting-dog.png'),
(3, 'Zootopia Memes', 3, 1, 'rate memes pics/zootopia.jpg'),
(4, 'Death Stranding Memes', 6, 1, 'rate memes pics/death-stranding.jpg'),
(5, 'Bike Cuck Memes', 6.5, 1, 'rate memes pics/bikecuck.jpg'),
(6, 'Monkey Haircut Memes', 7.5, 2, ''),
(7, 'Xenoblade Chronicles Dahlia Memes', 7.5, 1, ''),
(8, 'Loss Memes', 7, 1, ''),
(9, 'Net Neutrality Memes', 8.5, 1, 'rate memes pics/ajit-pai.png');

-- --------------------------------------------------------

--
-- Table structure for table `pewds_meme_ratings_table`
--

CREATE TABLE `pewds_meme_ratings_table` (
  `id` int(11) NOT NULL,
  `pewds_memeId` int(11) NOT NULL,
  `score` float NOT NULL,
  `scored_by_userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pewds_meme_ratings_table`
--

INSERT INTO `pewds_meme_ratings_table` (`id`, `pewds_memeId`, `score`, `scored_by_userId`) VALUES
(1, 3, 3, 1),
(2, 9, 8.5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `politicsmemessubscriberstable`
--

CREATE TABLE `politicsmemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `politicsmemessubscriberstable`
--

INSERT INTO `politicsmemessubscriberstable` (`id`, `subscribedByUserId`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionlikestable`
--

CREATE TABLE `questionlikestable` (
  `id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `likedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionlikestable`
--

INSERT INTO `questionlikestable` (`id`, `questionId`, `likedByUserId`) VALUES
(11, 15, 1),
(12, 22, 1),
(13, 21, 1),
(19, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questionstable`
--

CREATE TABLE `questionstable` (
  `id` int(11) NOT NULL,
  `askerId` int(11) NOT NULL,
  `askerUsername` varchar(1000) NOT NULL,
  `memeDestination` varchar(1000) NOT NULL,
  `question` text NOT NULL,
  `likes` int(11) NOT NULL,
  `flags` int(11) NOT NULL,
  `numberOfAnswers` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questionstable`
--

INSERT INTO `questionstable` (`id`, `askerId`, `askerUsername`, `memeDestination`, `question`, `likes`, `flags`, `numberOfAnswers`, `datetime`, `views`) VALUES
(11, 3, 'elon', 'users/elon/questionMemes/question11.jpg', 'HELLLPPPPP', 0, 1, 0, '2017-07-12 18:07:42', 1),
(12, 3, 'elon', 'users/elon/questionMemes/question12.png', 'I cant think of anythingggg', 0, 0, 2, '2017-07-12 18:08:18', 4),
(13, 3, 'elon', 'users/elon/questionMemes/question13.jpg', 'STYUCKKK', 1, 0, 3, '2017-07-12 18:08:59', 8),
(14, 2, 'jack', 'users/jack/questionMemes/question14.jpg', 'JACKSIE', 0, 0, 18, '2017-07-12 18:10:40', 6),
(15, 10, 'jaggu', 'users/jaggu/questionMemes/question15.jpg', 'attencion', 1, 0, 0, '2017-07-12 18:37:25', 1),
(16, 10, 'jaggu', 'users/jaggu/questionMemes/question16.jpg', 'gegegeg', 0, 0, 0, '2017-07-12 18:37:45', 1),
(17, 10, 'jaggu', 'users/jaggu/questionMemes/question17.jpg', 'memememem', 0, 0, 0, '2017-07-12 18:38:06', 1),
(18, 10, 'jaggu', 'users/jaggu/questionMemes/question18.jpg', 'prefer gsmins', 0, 0, 0, '2017-07-12 18:38:35', 2),
(19, 10, 'jaggu', 'users/jaggu/questionMemes/question19.jpg', 'wneoe', 0, 0, 0, '2017-07-12 18:39:03', 3),
(20, 10, 'jaggu', 'users/jaggu/questionMemes/question20.jpg', 'barararar', 0, 0, 0, '2017-07-12 18:45:12', 3),
(21, 17, 'frank', 'users/frank/questionMemes/question21.jpg', 'kya yheee', 1, 0, 1, '2017-07-12 19:01:52', 10),
(22, 17, 'frank', 'users/frank/questionMemes/question22.jpg', 'oyeee', 1, 2, 18, '2017-07-12 19:02:25', 17),
(24, 1, 'sharvai', 'users/sharvai/questionMemes/question24.jpg', 'how to do re', 0, 0, 0, '2017-09-04 19:21:05', 2),
(25, 1, 'sharvai', 'users/sharvai/questionMemes/question25.jpg', 'dwqdw', 0, 0, 2, '2017-09-09 23:49:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_flags_table`
--

CREATE TABLE `question_flags_table` (
  `id` int(11) NOT NULL,
  `questionId` int(11) NOT NULL,
  `flaggerUserId` int(11) NOT NULL,
  `flagType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_flags_table`
--

INSERT INTO `question_flags_table` (`id`, `questionId`, `flaggerUserId`, `flagType`) VALUES
(1, 7, 3, ''),
(2, 22, 1, 'plagiarism');

-- --------------------------------------------------------

--
-- Table structure for table `repliestable`
--

CREATE TABLE `repliestable` (
  `id` int(11) NOT NULL,
  `replyToCommentId` int(11) NOT NULL,
  `replyByUserId` int(11) NOT NULL,
  `replyByUsername` mediumtext NOT NULL,
  `likes` int(11) NOT NULL,
  `reply` text NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `repliestable`
--

INSERT INTO `repliestable` (`id`, `replyToCommentId`, `replyByUserId`, `replyByUsername`, `likes`, `reply`, `datetime`) VALUES
(1, 6, 3, 'elon', 1, 'yohihe', '2017-03-25 00:23:35'),
(3, 4, 1, 'sharvai', 1, 'faltu comment', '2017-03-25 20:33:05'),
(4, 4, 3, 'elon', 0, 'Shitty comment ', '2017-03-25 20:52:50'),
(5, 15, 5, 'dhrishty', 0, 'pagal hai tu sharvai XD', '2017-03-25 21:22:34'),
(7, 13, 1, 'sharvai', 0, 'fghjk\n', '2017-06-22 15:48:53'),
(8, 13, 1, 'sharvai', 0, 'heheh', '2017-06-22 15:48:53'),
(11, 6, 1, 'sharvai', 0, 'dfgfd gfidsgnoifdgnfd gfdsingifdugndfs ogfdsoiiosg ofisdogofdhg ifdsngofdg oigdfshgofdisg oifdsoghddfshgoifd', '2017-07-06 18:31:11'),
(14, 37, 1, 'sharvai', 0, 'YEAHH', '2017-07-15 18:34:27'),
(15, 39, 1, 'sharvai', 0, 'fefef', '2017-07-15 19:17:59'),
(16, 39, 1, 'sharvai', 0, 'dscdc', '2017-07-15 19:21:43'),
(17, 39, 1, 'sharvai', 0, 'qwd', '2017-07-15 19:25:58'),
(18, 39, 1, 'sharvai', 0, 'casc', '2017-07-15 19:31:57'),
(19, 43, 1, 'sharvai', 0, 'Banchoo', '2017-07-21 18:06:01'),
(20, 44, 1, 'sharvai', 0, 'safsafsdfsdafdasfsadf\nfdsafdsafdsaf', '2017-07-21 19:30:58'),
(21, 44, 1, 'sharvai', 0, 'fadsfsdafsadfsdafsdaf\nds', '2017-07-21 19:31:19'),
(22, 44, 1, 'sharvai', 0, 'fdsafdsafsdaf', '2017-07-21 19:33:23'),
(23, 44, 1, 'sharvai', 0, 'fdsafdsafdsaf\nfsdaf', '2017-07-21 19:33:51'),
(24, 44, 1, 'sharvai', 0, 'sdfgsdgfdsgfsdg', '2017-07-21 19:34:42'),
(25, 45, 1, 'sharvai', 0, 'dfsafdsafdsafdssf', '2017-07-21 19:36:20'),
(26, 46, 1, 'sharvai', 0, 'hii', '2017-07-23 16:36:56'),
(27, 49, 1, 'sharvai', 0, 'hete', '2017-07-23 16:37:36'),
(28, 49, 1, 'sharvai', 0, 'ttt', '2017-07-23 16:37:36'),
(34, 50, 1, 'sharvai', 0, 'sacca', '2017-07-23 17:00:38'),
(35, 51, 1, 'sharvai', 0, 'hihi', '2017-07-23 19:33:36'),
(36, 52, 1, 'sharvai', 0, 'ewdfdsfdsafdsaf', '2017-07-26 18:39:05'),
(37, 57, 1, 'sharvai', 0, 'j', '2017-07-31 01:51:19'),
(39, 63, 1, 'sharvai', 0, 'cascascwe', '2017-08-02 15:48:40'),
(40, 63, 1, 'sharvai', 0, 'asssfegg', '2017-08-02 15:48:57'),
(41, 63, 1, 'sharvai', 0, 'asdas', '2017-08-02 15:49:23'),
(42, 56, 1, 'sharvai', 0, 'fefe', '2017-08-02 15:50:33'),
(43, 49, 1, 'sharvai', 0, 'cdc', '2017-08-02 15:50:33'),
(44, 49, 1, 'sharvai', 0, 'bbkibv', '2017-08-02 15:50:33'),
(46, 64, 1, 'sharvai', 0, 'cwvwqqq', '2017-08-03 00:36:24'),
(47, 45, 1, 'sharvai', 0, 'cgg', '2017-08-03 00:40:57'),
(48, 45, 1, 'sharvai', 0, 'gdgg', '2017-08-03 00:40:57'),
(51, 69, 3, 'elon', 0, 'xzczx', '2017-08-04 18:36:36'),
(52, 72, 3, 'elon', 0, 'erg', '2017-08-04 19:09:04'),
(53, 2, 3, 'elon', 0, 'kya bey?!', '2017-08-04 19:56:35'),
(54, 73, 1, 'sharvai', 0, 'bb', '2017-08-05 11:26:08'),
(55, 73, 1, 'sharvai', 0, 'its jiji you idiot', '2017-09-03 17:13:24'),
(56, 68, 1, 'sharvai', 0, 'its jeije', '2017-09-03 17:13:50'),
(57, 67, 1, 'sharvai', 0, 'nice', '2017-09-03 17:44:43'),
(58, 67, 1, 'sharvai', 0, 'yeah tahnsk', '2017-09-03 17:44:43'),
(59, 67, 1, 'sharvai', 0, 'dqwdinjqwd qiwd qwjdi qwdij qw', '2017-09-03 17:44:43'),
(60, 67, 1, 'sharvai', 0, 'dqwd', '2017-09-03 17:45:54'),
(61, 73, 1, 'sharvai', 0, 'Hii', '2017-09-04 19:43:42'),
(62, 76, 1, 'sharvai', 0, 'fefe', '2017-09-09 23:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `replylikestable`
--

CREATE TABLE `replylikestable` (
  `id` int(11) NOT NULL,
  `replyId` int(11) NOT NULL,
  `likedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replylikestable`
--

INSERT INTO `replylikestable` (`id`, `replyId`, `likedByUserId`) VALUES
(2, 3, 3),
(3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `savagememessubscriberstable`
--

CREATE TABLE `savagememessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `savagememessubscriberstable`
--

INSERT INTO `savagememessubscriberstable` (`id`, `subscribedByUserId`) VALUES
(2, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sportsmemessubscriberstable`
--

CREATE TABLE `sportsmemessubscriberstable` (
  `id` int(11) NOT NULL,
  `subscribedByUserId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriberstable`
--

CREATE TABLE `subscriberstable` (
  `id` int(11) NOT NULL,
  `uploaderId` int(11) NOT NULL,
  `subscribedById` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriberstable`
--

INSERT INTO `subscriberstable` (`id`, `uploaderId`, `subscribedById`) VALUES
(24, 3, 2),
(26, 1, 11),
(44, 1, 8),
(89, 1, 3),
(97, 1, 61),
(103, 3, 4),
(105, 65, 64),
(107, 1, 71),
(108, 1, 38),
(123, 1, 40),
(140, 3, 1),
(141, 1, 77),
(142, 1, 83);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answerlikestable`
--
ALTER TABLE `answerlikestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answerrepliestable`
--
ALTER TABLE `answerrepliestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answerreplylikestable`
--
ALTER TABLE `answerreplylikestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answerstable`
--
ALTER TABLE `answerstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `celebmemessubscriberstable`
--
ALTER TABLE `celebmemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collegememessubscriberstable`
--
ALTER TABLE `collegememessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comicmemessubscriberstable`
--
ALTER TABLE `comicmemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentlikestable`
--
ALTER TABLE `commentlikestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentstable`
--
ALTER TABLE `commentstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `english_meme_viewers`
--
ALTER TABLE `english_meme_viewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends_table`
--
ALTER TABLE `friends_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gamingmemessubscriberstable`
--
ALTER TABLE `gamingmemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups_table`
--
ALTER TABLE `groups_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_participants_table`
--
ALTER TABLE `group_participants_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hinglish_meme_viewers`
--
ALTER TABLE `hinglish_meme_viewers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_flags_table`
--
ALTER TABLE `image_flags_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitationstable`
--
ALTER TABLE `invitationstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invite_codes_table`
--
ALTER TABLE `invite_codes_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `justmythoughtsmemessubscriberstable`
--
ALTER TABLE `justmythoughtsmemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likestable`
--
ALTER TABLE `likestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberstable`
--
ALTER TABLE `memberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memecategoriestable`
--
ALTER TABLE `memecategoriestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memestable`
--
ALTER TABLE `memestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meme_sharing_visibility_table`
--
ALTER TABLE `meme_sharing_visibility_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications_table`
--
ALTER TABLE `notifications_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `othermemessubscriberstable`
--
ALTER TABLE `othermemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pewds_memes_table`
--
ALTER TABLE `pewds_memes_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pewds_meme_ratings_table`
--
ALTER TABLE `pewds_meme_ratings_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `politicsmemessubscriberstable`
--
ALTER TABLE `politicsmemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionlikestable`
--
ALTER TABLE `questionlikestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionstable`
--
ALTER TABLE `questionstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_flags_table`
--
ALTER TABLE `question_flags_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repliestable`
--
ALTER TABLE `repliestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replylikestable`
--
ALTER TABLE `replylikestable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savagememessubscriberstable`
--
ALTER TABLE `savagememessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sportsmemessubscriberstable`
--
ALTER TABLE `sportsmemessubscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriberstable`
--
ALTER TABLE `subscriberstable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answerlikestable`
--
ALTER TABLE `answerlikestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `answerrepliestable`
--
ALTER TABLE `answerrepliestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `answerreplylikestable`
--
ALTER TABLE `answerreplylikestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `answerstable`
--
ALTER TABLE `answerstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `celebmemessubscriberstable`
--
ALTER TABLE `celebmemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `collegememessubscriberstable`
--
ALTER TABLE `collegememessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comicmemessubscriberstable`
--
ALTER TABLE `comicmemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `commentlikestable`
--
ALTER TABLE `commentlikestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `commentstable`
--
ALTER TABLE `commentstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `english_meme_viewers`
--
ALTER TABLE `english_meme_viewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `friends_table`
--
ALTER TABLE `friends_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `gamingmemessubscriberstable`
--
ALTER TABLE `gamingmemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups_table`
--
ALTER TABLE `groups_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `group_participants_table`
--
ALTER TABLE `group_participants_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `hinglish_meme_viewers`
--
ALTER TABLE `hinglish_meme_viewers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `image_flags_table`
--
ALTER TABLE `image_flags_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `invitationstable`
--
ALTER TABLE `invitationstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `invite_codes_table`
--
ALTER TABLE `invite_codes_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `justmythoughtsmemessubscriberstable`
--
ALTER TABLE `justmythoughtsmemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `likestable`
--
ALTER TABLE `likestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;
--
-- AUTO_INCREMENT for table `memberstable`
--
ALTER TABLE `memberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `memecategoriestable`
--
ALTER TABLE `memecategoriestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `memestable`
--
ALTER TABLE `memestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;
--
-- AUTO_INCREMENT for table `meme_sharing_visibility_table`
--
ALTER TABLE `meme_sharing_visibility_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `notifications_table`
--
ALTER TABLE `notifications_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1757;
--
-- AUTO_INCREMENT for table `othermemessubscriberstable`
--
ALTER TABLE `othermemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pewds_memes_table`
--
ALTER TABLE `pewds_memes_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pewds_meme_ratings_table`
--
ALTER TABLE `pewds_meme_ratings_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `politicsmemessubscriberstable`
--
ALTER TABLE `politicsmemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `questionlikestable`
--
ALTER TABLE `questionlikestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `questionstable`
--
ALTER TABLE `questionstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `question_flags_table`
--
ALTER TABLE `question_flags_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `repliestable`
--
ALTER TABLE `repliestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `replylikestable`
--
ALTER TABLE `replylikestable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `savagememessubscriberstable`
--
ALTER TABLE `savagememessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `sportsmemessubscriberstable`
--
ALTER TABLE `sportsmemessubscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscriberstable`
--
ALTER TABLE `subscriberstable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
