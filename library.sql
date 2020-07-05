CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `bookTitle` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `bookPub` varchar(100) NOT NULL,
  `pages` varchar(40) NOT NULL,
  `ISBN` varchar(50) NOT NULL,
  `copyrightYear` int(11) NOT NULL,
  `dateReceived` datetime NOT NULL,
  `dateAdded` datetime NOT NULL,
  `status` enum('Normal','Reference') NOT NULL DEFAULT 'Normal',
  `price` decimal(10,2) NOT NULL,
  `classID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `bookTitle`, `author`, `bookPub`, `pages`, `ISBN`, `copyrightYear`, `dateReceived`, `dateAdded`, `status`, `price`, `classID`) VALUES
(1, 'Natural Resources', 'Robin Kerrod', 'Marshall Cavendish Corporation', 'xvi, 906p', '1-85435-628-3', 1997, '0000-00-00 00:00:00', '2013-12-11 06:34:27', 'Normal', '30000.00', 8),
(2, 'Encyclopedia Americana', 'Grolier', 'Connecticut', 'viii, 500p', '0-7172-0119-8', 1988, '0000-00-00 00:00:00', '2013-12-11 06:36:23', 'Reference', '340000.00', 10),
(3, 'Algebra 1', 'Carolyn Bradshaw, Michael Seals', 'Pearson Education, Inc', 'xi, 340p', '0-13-125087-6', 2004, '0000-00-00 00:00:00', '2013-12-11 06:39:17', 'Normal', '77000.00', 40),
(4, 'The Philippine Daily Inquirer', 'John Mayunga', 'Pasay City', 'xiii, 600p', '1-97434-228-1', 2013, '0000-00-00 00:00:00', '2013-12-11 06:41:53', 'Normal', '40000.00', 7),
(5, 'Science in our World', 'Brian Knapp', 'Regency Publishing Group', 'vii, 400p', '0-13-050841-1', 1996, '0000-00-00 00:00:00', '2013-12-11 06:44:44', 'Normal', '27000.00', 4),
(6, 'Literature', 'Greg Glowka', 'Regency Publishing Group', 'viii, 809p', '0-13-050841-1', 2001, '0000-00-00 00:00:00', '2013-12-11 06:47:44', 'Normal', '60000.00', 50),
(7, 'Lexicon Universal Encyclopedia', 'Lexicon', 'Lexicon Publication', 'xx, 700p', '0-7172-2043-5', 1993, '0000-00-00 00:00:00', '2013-12-11 06:49:53', 'Normal', '80500.00', 5),
(8, 'Science and Invention Encyclopedia', 'Clarke Donald, Dartford Mark', 'H.S. Stuttman inc. Publishing', 'vi, 376p', '0-87475-450-x', 1992, '0000-00-00 00:00:00', '2013-12-11 06:52:58', 'Normal', '53000.00', 5),
(9, 'Integrated Science Textbook ', 'Merde C. Tan', 'Vibal Publishing House Inc.', 'vii, 500p', '971-570-124-8', 2009, '0000-00-00 00:00:00', '2013-12-11 06:55:27', 'Normal', '5800.00', 4),
(10, 'Algebra 2', 'Glencoe McGraw Hill', 'The McGrawHill Companies Inc.', 'xi, 311p', '978-0-07-873830-2', 2008, '0000-00-00 00:00:00', '2013-12-11 06:57:35', 'Normal', '30000.00', 40),
(11, 'Wiki at Panitikan ', 'Lorenza P. Avera', 'JGM & S Corporation', 'xxv, 3050p', '971-07-1574-7', 2000, '0000-00-00 00:00:00', '2013-12-11 06:59:24', '', '940000.00', 7),
(12, 'English Expressways TextBook for 4th year', 'Virginia Bermudez Ed. O. et al', 'SD Publications, Inc.', 'xii, 286p', '978-971-0315-33-8', 2007, '0000-00-00 00:00:00', '2013-12-11 07:01:25', 'Normal', '79000.00', 9),
(13, 'Asya Pag-usbong Ng Kabihasnan ', 'Ricardo T. Jose, Ph . D.', 'Vibal Publishing House Inc.', 'vi, 161p', '971-07-2324-3', 2008, '0000-00-00 00:00:00', '2013-12-11 07:02:56', 'Normal', '14000.00', 8),
(14, 'Literature (the readers choice)', 'Glencoe McGraw Hill', '..', 'xvi, 687p', '0-02-817934-x', 2001, '0000-00-00 00:00:00', '2013-12-11 07:05:25', 'Normal', '69000.00', 9),
(15, 'Beloved a Novel', 'Toni Morrison', '..', 'xv, 430p', '0-394-53597-9', 1987, '0000-00-00 00:00:00', '2013-12-11 07:07:02', 'Normal', '37000.00', 9),
(16, 'Silver Burdett Engish', 'Judy Brim', 'Silver Burdett Company', 'xi, 295p', '0-382-03575-5', 1985, '0000-00-00 00:00:00', '2013-12-11 09:22:50', 'Normal', '60000.00', 2),
(17, 'The Corporate Warriors (Six Classic Cases in American Business)', 'Douglas K. Ramsey', 'Houghton Miffin Company', 'vi, 129p', '0-395-35487-0', 1987, '0000-00-00 00:00:00', '2013-12-11 09:25:32', 'Normal', '20700.00', 8),
(18, 'Introduction to Information System', 'Cristine Redoblo', 'CHMSC', 'vii, 420p', '123-132', 2013, '0000-00-00 00:00:00', '2014-01-17 19:00:10', 'Normal', '50000.00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrowID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `dateBorrow` datetime NOT NULL,
  `dueDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrowID`, `userID`, `dateBorrow`, `dueDate`) VALUES
(1, 5, '2016-01-12 20:17:30', '2016-02-12 20:17:30'),
(2, 3, '2015-03-29 13:50:06', '2015-06-20 20:17:30'),
(3, 3, '2015-04-21 22:20:10', '2015-07-15 20:17:30'),
(4, 7, '2018-02-24 21:51:12', '2018-02-28 12:00:00'),
(5, 6, '2018-02-24 21:52:28', '2018-02-28 12:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `borrowdetails`
--

CREATE TABLE `borrowdetails` (
  `borrowDetailsID` int(11) NOT NULL,
  `catalogID` int(11) NOT NULL,
  `borrowID` int(11) NOT NULL,
  `borrowStatus` varchar(10) NOT NULL,
  `dateReturn` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrowdetails`
--

INSERT INTO `borrowdetails` (`borrowDetailsID`, `catalogID`, `borrowID`, `borrowStatus`, `dateReturn`) VALUES
(1, 89, 1, 'Pending', '0000-00-00 00:00:00'),
(2, 90, 2, 'Returned', '2018-02-25 20:47:48'),
(3, 1, 3, 'Returned', '2015-07-14 00:30:51'),
(4, 1, 4, 'Pending', '0000-00-00 00:00:00'),
(5, 2, 4, 'Pending', '0000-00-00 00:00:00'),
(6, 6, 5, 'Pending', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `catalogID` int(11) NOT NULL,
  `catalogNo` char(8) NOT NULL,
  `catStatus` enum('Lost','New','Old','Deleted') NOT NULL DEFAULT 'New',
  `state` enum('0','1') NOT NULL DEFAULT '1',
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`catalogID`, `catalogNo`, `catStatus`, `state`, `bookID`) VALUES
(1, 'C000001', 'New', '0', 1),
(2, 'C000002', 'Old', '0', 1),
(3, 'C000003', 'New', '1', 1),
(4, 'C000004', 'New', '1', 1),
(5, 'C000005', 'Old', '1', 1),
(6, 'C000006', 'New', '0', 2),
(7, 'C000007', 'New', '1', 2),
(8, 'C000008', 'Deleted', '0', 2),
(9, 'C000009', 'Old', '1', 2),
(10, 'C000010', 'New', '1', 2),
(11, 'C000011', 'New', '1', 2),
(12, 'C000012', 'New', '1', 2),
(13, 'C000013', 'Old', '1', 2),
(14, 'C000014', 'New', '1', 2),
(15, 'C000015', 'Lost', '0', 2),
(16, 'C000016', 'New', '1', 3),
(17, 'C000017', 'Old', '1', 3),
(18, 'C000018', 'New', '1', 3),
(19, 'C000019', 'New', '1', 3),
(20, 'C000020', 'New', '1', 3),
(21, 'C000021', 'Old', '1', 3),
(22, 'C000022', 'New', '1', 3),
(23, 'C000023', 'Lost', '0', 3),
(24, 'C000024', 'New', '1', 3),
(25, 'C000025', 'Old', '1', 3),
(26, 'C000026', 'New', '1', 3),
(27, 'C000027', 'New', '1', 3),
(28, 'C000028', 'New', '1', 3),
(29, 'C000029', 'Old', '1', 4),
(30, 'C000030', 'New', '1', 4),
(31, 'C000031', 'New', '1', 4),
(32, 'C000032', 'New', '1', 4),
(33, 'C000033', 'Old', '1', 4),
(34, 'C000034', 'New', '1', 4),
(35, 'C000035', 'New', '1', 4),
(36, 'C000036', 'Old', '1', 5),
(37, 'C000037', 'New', '1', 5),
(38, 'C000038', 'Lost', '0', 5),
(39, 'C000039', 'Old', '1', 5),
(40, 'C000040', 'New', '1', 5),
(41, 'C000041', 'New', '1', 5),
(42, 'C000042', 'Old', '1', 5),
(43, 'C000043', 'New', '1', 5),
(44, 'C000044', 'New', '1', 5),
(45, 'C000045', 'Old', '1', 5),
(46, 'C000046', 'New', '1', 5),
(47, 'C000047', 'New', '1', 5),
(48, 'C000048', 'Old', '1', 5),
(49, 'C000049', 'New', '1', 5),
(50, 'C000050', 'Lost', '0', 5),
(51, 'C000051', 'Old', '1', 5),
(52, 'C000052', 'New', '1', 5),
(53, 'C000053', 'New', '1', 6),
(54, 'C000054', 'Old', '1', 6),
(55, 'C000055', 'New', '1', 6),
(56, 'C000056', 'New', '1', 6),
(57, 'C000057', 'Old', '1', 6),
(58, 'C000058', 'New', '1', 6),
(59, 'C000059', 'New', '1', 6),
(60, 'C000060', 'Old', '1', 6),
(61, 'C000061', 'New', '1', 6),
(62, 'C000062', 'Lost', '0', 6),
(63, 'C000063', 'Old', '1', 6),
(64, 'C000064', 'New', '1', 6),
(65, 'C000065', 'New', '1', 6),
(66, 'C000066', 'New', '1', 6),
(67, 'C000067', 'New', '1', 7),
(68, 'C000068', 'New', '1', 7),
(69, 'C000069', 'New', '1', 7),
(70, 'C000070', 'New', '1', 7),
(71, 'C000071', 'New', '1', 7),
(72, 'C000072', 'New', '1', 7),
(73, 'C000073', 'New', '1', 8),
(74, 'C000074', 'New', '1', 8),
(75, 'C000075', 'Old', '1', 8),
(76, 'C000076', 'New', '1', 8),
(77, 'C000077', 'Old', '1', 8),
(78, 'C000078', 'Old', '1', 8),
(79, 'C000079', 'New', '1', 8),
(80, 'C000080', 'New', '1', 9),
(81, 'C000081', 'New', '1', 9),
(82, 'C000082', 'New', '1', 9),
(83, 'C000083', 'New', '1', 9),
(84, 'C000084', 'Old', '1', 9),
(85, 'C000085', 'New', '1', 9),
(86, 'C000086', 'New', '1', 9),
(87, 'C000087', 'New', '1', 9),
(88, 'C000088', 'Old', '1', 9),
(89, 'C000089', 'New', '0', 10),
(90, 'C000090', 'New', '1', 10),
(91, 'C000091', 'New', '1', 10),
(92, 'C000092', 'New', '1', 10),
(93, 'C000093', 'Lost', '0', 10),
(94, 'C000094', 'New', '1', 10),
(95, 'C000095', 'New', '1', 10),
(96, 'C000096', 'New', '1', 10),
(97, 'C000097', 'Old', '1', 10),
(98, 'C000098', 'New', '1', 10),
(99, 'C000099', 'New', '1', 11),
(100, 'C000100', 'New', '1', 11),
(101, 'C000101', 'Old', '1', 11),
(102, 'C000102', 'Old', '1', 11),
(103, 'C000103', 'New', '1', 11),
(104, 'C000104', 'New', '1', 11),
(105, 'C000105', 'New', '1', 11),
(106, 'C000106', 'New', '1', 11),
(107, 'C000107', 'New', '1', 11),
(108, 'C000108', 'New', '1', 11),
(109, 'C000109', 'New', '1', 11),
(110, 'C000110', 'Lost', '0', 11),
(111, 'C000111', 'New', '1', 11),
(112, 'C000112', 'New', '1', 11),
(113, 'C000113', 'New', '1', 11),
(114, 'C000114', 'Old', '1', 11),
(115, 'C000115', 'Deleted', '0', 11),
(116, 'C000116', 'New', '1', 11),
(117, 'C000117', 'Old', '1', 11),
(118, 'C000118', 'Old', '1', 11),
(119, 'C000119', 'New', '1', 12),
(120, 'C000120', 'New', '1', 12),
(121, 'C000121', 'New', '1', 12),
(122, 'C000122', 'New', '1', 12),
(123, 'C000123', 'Lost', '0', 12),
(124, 'C000124', 'New', '1', 12),
(125, 'C000125', 'New', '1', 12),
(126, 'C000126', 'New', '1', 12),
(127, 'C000127', 'Old', '1', 12),
(128, 'C000128', 'New', '1', 13),
(129, 'C000129', 'New', '1', 13),
(130, 'C000130', 'New', '1', 13),
(131, 'C000131', 'New', '1', 13),
(132, 'C000132', 'Old', '1', 13),
(133, 'C000133', 'Old', '1', 13),
(134, 'C000134', 'Old', '1', 13),
(135, 'C000135', 'New', '1', 13),
(136, 'C000136', 'New', '1', 13),
(137, 'C000137', 'New', '1', 13),
(138, 'C000138', 'New', '1', 13),
(139, 'C000139', 'New', '1', 14),
(140, 'C000140', 'New', '1', 14),
(141, 'C000141', 'New', '1', 14),
(142, 'C000142', 'New', '1', 14),
(143, 'C000143', 'Lost', '0', 14),
(144, 'C000144', 'New', '1', 14),
(145, 'C000145', 'New', '1', 14),
(146, 'C000146', 'New', '1', 14),
(147, 'C000147', 'New', '1', 14),
(148, 'C000148', 'New', '1', 14),
(149, 'C000149', 'New', '1', 14),
(150, 'C000150', 'Old', '1', 14),
(151, 'C000151', 'Old', '1', 14),
(152, 'C000152', 'New', '1', 14),
(153, 'C000153', 'New', '1', 14),
(154, 'C000154', 'New', '1', 14),
(155, 'C000155', 'New', '1', 15),
(156, 'C000156', 'Old', '1', 15),
(157, 'C000157', 'New', '1', 15),
(158, 'C000158', 'New', '1', 15),
(159, 'C000158', 'New', '1', 15),
(160, 'C000160', 'New', '1', 15),
(161, 'C000161', 'Old', '1', 15),
(162, 'C000162', 'Old', '1', 15),
(163, 'C000163', 'New', '1', 15),
(164, 'C000164', 'New', '1', 15),
(165, 'C000165', 'New', '1', 16),
(166, 'C000166', 'New', '1', 16),
(167, 'C000167', 'New', '1', 16),
(168, 'C000168', 'Old', '1', 16),
(169, 'C000169', 'New', '1', 16),
(170, 'C000170', 'New', '1', 16),
(171, 'C000171', 'New', '1', 16),
(172, 'C000172', 'Old', '1', 16),
(173, 'C000173', 'New', '1', 16),
(174, 'C000174', 'New', '1', 16),
(175, 'C000175', 'New', '1', 16),
(176, 'C000176', 'Old', '1', 16),
(177, 'C000177', 'New', '1', 17),
(178, 'C000178', 'New', '1', 17),
(179, 'C000179', 'Old', '1', 17),
(180, 'C000180', 'New', '1', 17),
(181, 'C000181', 'New', '1', 17),
(182, 'C000182', 'Old', '1', 17),
(183, 'C000183', 'New', '1', 17),
(184, 'C000184', 'New', '1', 17),
(185, 'C000185', 'Old', '1', 18),
(186, 'C000186', 'New', '1', 18),
(187, 'C000187', 'New', '1', 18),
(188, 'C000188', 'New', '1', 18),
(189, 'C000189', 'New', '1', 18),
(190, 'C000190', 'Lost', '0', 18),
(191, 'C000191', 'New', '1', 18),
(192, 'C000192', 'New', '1', 18),
(193, 'C000193', 'Deleted', '0', 18),
(194, 'C000194', 'New', '1', 18);

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE `classification` (
  `classID` int(11) NOT NULL,
  `deweyNo` varchar(5) NOT NULL,
  `className` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`classID`, `deweyNo`, `className`) VALUES
(1, '000', 'Computer science, knowledge & systems'),
(2, '010', 'Bibliographies'),
(3, '020', 'Library & information sciences'),
(4, '030', 'Encyclopedias & books of facts'),
(5, '040', '[Unassigned]'),
(6, '050', 'Magazines, journals & serials'),
(7, '060', 'Associations, organizations & museums'),
(8, '070', 'News media, journalism & publishing'),
(9, '080', 'Quotations'),
(10, '090', 'Manuscripts & rare books'),
(11, '100', 'Philosophy'),
(12, '110', 'Metaphysics'),
(13, '120', 'Epistemology'),
(14, '130', 'Parapsychology & occultism'),
(15, '140', 'Philosophical schools of thought'),
(16, '150', 'Psychology'),
(17, '160', 'Logic'),
(18, '170', 'Ethics'),
(19, '180', 'Ancient, medieval & eastern philosophy'),
(20, '190', 'Modern western philosophy'),
(21, '200', 'Religion'),
(22, '210', 'Philosophy & theory of religion'),
(23, '220', 'The Bible'),
(24, '230', 'Christianity & Christian theology'),
(25, '240', 'Christian practice & observance'),
(26, '250', 'Christian pastoral practice & religious orders'),
(27, '260', 'Christian organization, social work & worship'),
(28, '270', 'History of Christianity'),
(29, '280', 'Christian denominations'),
(30, '290', 'Other religions'),
(31, '300', 'Social sciences, sociology & anthropology'),
(32, '310', 'Statistics'),
(33, '320', 'Political science'),
(34, '330', 'Economics'),
(35, '340', 'Law'),
(36, '350', 'Public administration & military science'),
(37, '360', 'Social problems & social services'),
(38, '370', 'Education'),
(39, '380', 'Commerce, communications & transportation'),
(40, '390', 'Customs, etiquette & folklore'),
(41, '400', 'Language'),
(42, '410', 'Linguistics'),
(43, '420', 'English & Old English languages'),
(44, '430', 'German & related languages'),
(45, '440', 'French & related languages'),
(46, '450', 'Italian, Romanian & related languages'),
(47, '460', 'Spanish & Portuguese languages'),
(48, '470', 'Latin & Italic languages'),
(49, '480', 'Classical & modern Greek languages'),
(50, '490', 'Other languages'),
(51, '500', 'Science'),
(52, '510', 'Mathematics'),
(53, '520', 'Astronomy'),
(54, '530', 'Physics'),
(55, '540', 'Chemistry'),
(56, '550', 'Earth sciences & geology'),
(57, '560', 'Fossils & prehistoric life'),
(58, '570', 'Life sciences; biology'),
(59, '580', 'Plants (Botany)'),
(60, '590', 'Animals (Zoology)'),
(61, '600', 'Technology'),
(62, '610', 'Medicine & health'),
(63, '620', 'Engineering'),
(64, '630', 'Agriculture'),
(65, '640', 'Home & family management'),
(66, '650', 'Management & public relations'),
(67, '660', 'Chemical engineering'),
(68, '670', 'Manufacturing'),
(69, '680', 'Manufacture for specific uses'),
(70, '690', 'Building & construction'),
(71, '700', 'Arts'),
(72, '710', 'Landscaping & area planning'),
(73, '720', 'Architecture'),
(74, '730', 'Sculpture, ceramics & metalwork'),
(75, '740', 'Drawing & decorative arts'),
(76, '750', 'Painting'),
(77, '760', 'Graphic arts'),
(78, '770', 'Photography & computer art'),
(79, '780', 'Music'),
(80, '790', 'Sports, games & entertainment'),
(81, '800', 'Literature, rhetoric & criticism'),
(82, '810', 'American literature in English'),
(83, '820', 'English & Old English literatures'),
(84, '830', 'German & related literatures'),
(85, '840', 'French & related literatures'),
(86, '850', 'Italian, Romanian & related literatures'),
(87, '860', 'Spanish & Portuguese literatures'),
(88, '870', 'Latin & Italic literatures'),
(89, '880', 'Classical & modern Greek literatures'),
(90, '890', 'Other literatures'),
(91, '900', 'History'),
(92, '910', 'Geography & travel'),
(93, '920', 'Biography & genealogy'),
(94, '930', 'History of ancient world (to ca. 499)'),
(95, '940', 'History of Europe'),
(96, '950', 'History of Asia'),
(97, '960', 'History of Africa'),
(98, '970', 'History of North America'),
(99, '980', 'History of South America'),
(100, '990', 'History of other areas');

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

CREATE TABLE `price` (
  `priceID` int(11) NOT NULL,
  `catalogID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `datePaid` date NOT NULL,
  `amount` decimal(13,2) NOT NULL,
  `reason` enum('Book Lost','Over Due','Book Lost And Over Due') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userNo` varchar(25) DEFAULT NULL,
  `uName` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `fName` varchar(20) NOT NULL,
  `mName` varchar(20) DEFAULT NULL,
  `sName` varchar(20) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `type` varchar(40) DEFAULT NULL,
  `idType` varchar(50) DEFAULT NULL,
  `idNo` varchar(30) DEFAULT NULL,
  `street` varchar(50) DEFAULT NULL,
  `houseNo` varchar(50) DEFAULT NULL,
  `country` varchar(40) DEFAULT NULL,
  `photo` varchar(70) DEFAULT NULL,
  `uLevel` enum('Admin','Librarian','User','Blocked') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userNo`, `uName`, `pass`, `email`, `fName`, `mName`, `sName`, `address`, `phone`, `gender`, `type`, `idType`, `idNo`, `street`, `houseNo`, `country`, `photo`, `uLevel`) VALUES
(1, '000001', 'brown', '$2y$12$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'bongochoice@gmail.com', 'John', 'Alfred', 'Mayunga', 'Box 79 Dar Es Salaam', '+255789669854', 'Male', 'Student', 'School ID', '16050513023', 'Masaki', '27', 'Tanzania', '', 'Admin'),
(2, '000002', 'josephine', '$2y$12$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'joesayphine@gmail.com', 'Josephine', 'Alfred', 'Mayunga', 'Box 673 Dar Es Salaam', '+255714762121', 'Female', 'Employed', 'Voting ID', '7665-44433', 'Kinyerezi', '4', 'Tanzania', '', 'Librarian'),
(3, '000003', 'makowa', '$2y$12$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'makowa@gmail.com', 'Khoja', 'Zuberi', 'Makowa', 'Box 8776 Dar Es Salaam', '+255714377665', 'Male', 'Student', 'Diving License', '987-65456', 'Posta', '8', 'Tanzania', '', 'User'),
(4, '000004', 'annastazia', '$2y$12$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'anna@gmail.com', 'Grace', 'Anna', 'Bura', 'Box 945 Dar Es Salaam', '+25571776548', 'Female', 'Teacher', 'National ID ', '98-456567', 'Uhuru', '40', 'Tanzania', '', 'User'),
(5, '000005', 'seusalim', '$2y$12$YDJnJ09aMHa/NLi0c1tL5uIigavBlxuIEQXhUnL6Bg8ZZZo/xDOq6', 'seusalim@gmail.com', 'Seusalim', 'Zuberi', 'Makowa', 'Box 998 Dar Es Salaam', '+255712467765', 'Female', 'Self Employed', 'School ID', '16050513006', 'Masaki', '30', 'Tanzania', '', 'User'),
(6, '000006', 'elizabeth', '$2y$12$0Vk2ePFZKKlhI8QlTaeF6OcJQ55F/SemixmGryDADfsruaXCt6JeS', 'elizabeth@gmail.com', 'Elizabeth', 'Peter', 'Kimario', '75 Dodoma', '+255693528361', 'Female', 'Student', 'School ID', '16050513011', 'Majengo', '873', 'Tanzania', NULL, 'User'),
(7, '000007', 'mchunguzi', '$2y$12$9FJEKdhtnaYb8xAfN3oy5OqMzZubkBH4ss4RFigMFEr/S26OZQ50.', 'mchunguzi@gmail.com', 'Petro', 'Charles', 'Mchunguzi', '52 Dodoma', '0718365263', 'Male', 'Student', 'School ID', '9877-22828', 'Njiro', '98777', 'Tanzania', NULL, 'Blocked'),
(8, '000008', 'hubati', '$2y$12$YuASbnvD8fSQcJg0kB1yAumnZW392sp9W31An.3Afjjh0VBdhhBHq', 'hubati@gmail.com', 'Hibati', 'Anthony', 'Sabai', '521 Dar es salaam', '+255672112832', 'Male', 'Student', 'School ID ', '16010113006', 'Sinza', '87', 'Tanzania', NULL, 'User'),
(9, '000009', 'isaroche', '$2y$12$GfnJUOF1B5kZIS.rVxpZgumX2j1gemYSjLz/l2.XIOxkjkTZEnS0W', 'isaroche@gmail.com', 'Isaroche', 'Isack', 'Amos', '283 Dar es salaam', '0712837463', 'Male', 'Employed', 'School ID', '16050513004', 'Sinza', '8271', 'Tanzania', NULL, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `classID` (`classID`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrowID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD PRIMARY KEY (`borrowDetailsID`),
  ADD KEY `catalogID` (`catalogID`),
  ADD KEY `borrowID` (`borrowID`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`catalogID`),
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`classID`);

--
-- Indexes for table `price`
--
ALTER TABLE `price`
  ADD PRIMARY KEY (`priceID`),
  ADD KEY `catalogID` (`catalogID`),
  ADD KEY `bookID` (`bookID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userNo` (`userNo`,`uName`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrowID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  MODIFY `borrowDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `catalogID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `classification`
--
ALTER TABLE `classification`
  MODIFY `classID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `priceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`classID`) REFERENCES `classification` (`classID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowdetails`
--
ALTER TABLE `borrowdetails`
  ADD CONSTRAINT `borrowdetails_ibfk_1` FOREIGN KEY (`catalogID`) REFERENCES `catalog` (`catalogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrowdetails_ibfk_2` FOREIGN KEY (`borrowID`) REFERENCES `borrow` (`borrowID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `catalog_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `price`
--
ALTER TABLE `price`
  ADD CONSTRAINT `price_ibfk_1` FOREIGN KEY (`catalogID`) REFERENCES `catalog` (`catalogID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `price_ibfk_3` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;