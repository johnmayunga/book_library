<?php
$link = mysqli_connect('localhost', 'atchosti_tolms', 'MayungaPassword', 'atchosti_tolms');
// Create the first table named users
$tblUsers = "CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `userNo` varchar(25) NULL,
  `uName` varchar(20) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `email` varchar(40),
  `fName` varchar(20) NOT NULL,
  `mName` varchar(20),
  `sName` varchar(20) NOT NULL,
  `address` varchar(50),
  `phone` varchar(15) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `type` varchar(40) NULL,
  `idType` varchar(50),
  `idNo` varchar(30),
  `street` varchar(50),
  `houseNo` varchar(50),
  `country` varchar(40),
  `photo` varchar(70),
  `uLevel` ENUM('Admin','Librarian','User','Blocked') NOT NULL DEFAULT 'User',
  PRIMARY KEY (`userID`),
  UNIQUE KEY (userNo, uName, email)
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblUsers);
if ($query === true) {
    $user = true;
} else {
    $user = false;
}

// Inserting data into the users table
$tblUsers = "INSERT INTO `users` (`userID`, `userNo`, `uName`, `pass`, `email`, `fName`, `mName`, `sName`, `address`, `phone`, `gender`, `type`, `idType`, `idNo`, `street`, `houseNo`, `country`, `photo`, `uLevel`) VALUES
(1, '000001', 'brown', '$2y$12\$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'bongochoice@gmail.com', 'John', 'Alfred', 'Mayunga', 'Box 79 Dar Es Salaam', '+255789669854', 'Male', 'Student', 'School ID', '16050513023', 'Masaki', '27', 'Tanzania', '', 'Admin'),
(2, '000002', 'josephine', '$2y$12\$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'joesayphine@gmail.com', 'Josephine', 'Alfred', 'Mayunga', 'Box 673 Dar Es Salaam', '+255714762121', 'Female', 'Employed', 'Voting ID', '7665-44433', 'Kinyerezi', '4', 'Tanzania', '', 'Librarian'),
(3, '000003', 'makowa', '$2y$12\$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'makowa@gmail.com', 'Khoja', 'Zuberi', 'Makowa', 'Box 8776 Dar Es Salaam', '+255714377665', 'Male', 'Student', 'Diving License', '987-65456', 'Posta', '8', 'Tanzania', '', 'User'),
(4, '000004', 'annastazia', '$2y$12\$wZZuvQPy5/bFp07/bP5o0e3WKSIvMNH4sPwBDBZlmJmxdAjOzKN3O', 'anna@gmail.com', 'Grace', 'Anna', 'Bura', 'Box 945 Dar Es Salaam', '+25571776548', 'Female', 'Teacher', 'National ID ', '98-456567', 'Uhuru', '40', 'Tanzania', '', 'User'),
(5, '000005', 'seusalim', '$2y$12\$YDJnJ09aMHa/NLi0c1tL5uIigavBlxuIEQXhUnL6Bg8ZZZo/xDOq6', 'seusalim@gmail.com', 'Seusalim', 'Zuberi', 'Makowa', 'Box 998 Dar Es Salaam', '+255712467765', 'Female', 'Self Employed', 'School ID', '16050513006', 'Masaki', '30', 'Tanzania', '', 'User'),
(6, '000006', 'elizabeth', '$2y$12\$0Vk2ePFZKKlhI8QlTaeF6OcJQ55F/SemixmGryDADfsruaXCt6JeS', 'elizabeth@gmail.com', 'Elizabeth', 'Peter', 'Kimario', '75 Dodoma', '+255693528361', 'Female', 'Student', 'School ID', '16050513011', 'Majengo', '873', 'Tanzania', NULL, 'User'),
(7, '000007', 'mchunguzi', '$2y$12\$9FJEKdhtnaYb8xAfN3oy5OqMzZubkBH4ss4RFigMFEr/S26OZQ50.', 'mchunguzi@gmail.com', 'Petro', 'Charles', 'Mchunguzi', '52 Dodoma', '0718365263', 'Male', 'Student', 'School ID', '9877-22828', 'Njiro', '98777', 'Tanzania', NULL, 'Blocked'),
(8, '000008', 'hubati', '$2y$12\$YuASbnvD8fSQcJg0kB1yAumnZW392sp9W31An.3Afjjh0VBdhhBHq', 'hubati@gmail.com', 'Hibati', 'Anthony', 'Sabai', '521 Dar es salaam', '+255672112832', 'Male', 'Student', 'School ID ', '16010113006', 'Sinza', '87', 'Tanzania', NULL, 'User')";
$query = mysqli_query($link, $tblUsers);
if ($query === true) {
    $userIn = true;
} 
else {
    $userIn = false;
}

// Create the fifth table named classification
$tblClassification = "CREATE TABLE IF NOT EXISTS `classification` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `deweyNo` varchar(5) NOT NULL,
  `className` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblClassification);
if ($query === true) {
    $tblClassification = true;
} 
else {
    $tblClassification = false;
}

// Inserting data into the classification table
$tblClassification = "INSERT INTO `classification` (`classID`, `deweyNo`, `className`) VALUES
(1, '000', 'Computer science, knowledge & systems'),
(2, '010', 'Bibliographies'),
(3, '020' ,'Library & information sciences'), 
(4, '030' ,'Encyclopedias & books of facts'), 
(5, '040' ,'[Unassigned]'),
(6, '050' ,'Magazines, journals & serials'),
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
(100, '990', 'History of other areas')";
$query = mysqli_query($link, $tblClassification);
if ($query === true) {
    $tblClassificationIn = true;
} 
else {
    $tblClassificationIn = false;
}

// Create the second table named books
$tblBooks = "CREATE TABLE IF NOT EXISTS `books` (
  `bookID` int(11) NOT NULL AUTO_INCREMENT,
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
  `classID` int(50) NOT NULL,
  PRIMARY KEY (`bookID`),
  FOREIGN KEY (classID) REFERENCES classification(classID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblBooks);
if ($query === true) {
    $book = true;
} 
else {
    $book = false;
}

// Inserting data into the books table
$tblBooks = "INSERT INTO `books` (`bookID`, `bookTitle`, `classID`, `author`, `bookPub`, `pages`, `ISBN`, `copyrightYear`, `dateReceived`, `dateAdded`, `status`, `price`) VALUES
(1, 'Natural Resources', 8, 'Robin Kerrod', 'Marshall Cavendish Corporation', 'xvi, 906p', '1-85435-628-3', 1997, '', '2013-12-11 06:34:27', 'Normal', '30000'),
(2, 'Encyclopedia Americana', 10, 'Grolier', 'Connecticut', 'viii, 500p', '0-7172-0119-8', 1988, '', '2013-12-11 06:36:23', 'Reference', '340000'),
(3, 'Algebra 1', 40, 'Carolyn Bradshaw, Michael Seals', 'Pearson Education, Inc', 'xi, 340p', '0-13-125087-6', 2004, '', '2013-12-11 06:39:17', 'Normal', '77000'),
(4, 'The Philippine Daily Inquirer', 7, 'John Mayunga', 'Pasay City', 'xiii, 600p', '1-97434-228-1', 2013, '', '2013-12-11 06:41:53', 'Normal', '40000'),
(5, 'Science in our World', 4, 'Brian Knapp', 'Regency Publishing Group', 'vii, 400p', '0-13-050841-1', 1996, '', '2013-12-11 06:44:44', 'Normal', '27000'),
(6, 'Literature', 50, 'Greg Glowka', 'Regency Publishing Group', 'viii, 809p', '0-13-050841-1', 2001, '', '2013-12-11 06:47:44', 'Normal', '60000'),
(7, 'Lexicon Universal Encyclopedia', 5, 'Lexicon', 'Lexicon Publication', 'xx, 700p', '0-7172-2043-5', 1993, '', '2013-12-11 06:49:53', 'Normal', '80500'),
(8, 'Science and Invention Encyclopedia', 5, 'Clarke Donald, Dartford Mark', 'H.S. Stuttman inc. Publishing', 'vi, 376p', '0-87475-450-x', 1992, '', '2013-12-11 06:52:58', 'Normal', '53000'),
(9, 'Integrated Science Textbook ', 4, 'Merde C. Tan', 'Vibal Publishing House Inc.', 'vii, 500p', '971-570-124-8', 2009, '', '2013-12-11 06:55:27', 'Normal', '5800'),
(10, 'Algebra 2', 40, 'Glencoe McGraw Hill', 'The McGrawHill Companies Inc.', 'xi, 311p', '978-0-07-873830-2', 2008, '', '2013-12-11 06:57:35', 'Normal', '30000'),
(11, 'Wiki at Panitikan ', 7, 'Lorenza P. Avera', 'JGM & S Corporation', 'xxv, 3050p', '971-07-1574-7', 2000, '', '2013-12-11 06:59:24', 'Refference', '940000'),
(12, 'English Expressways TextBook for 4th year', 9, 'Virginia Bermudez Ed. O. et al', 'SD Publications, Inc.', 'xii, 286p', '978-971-0315-33-8', 2007, '', '2013-12-11 07:01:25', 'Normal', '79000'),
(13, 'Asya Pag-usbong Ng Kabihasnan ', 8, 'Ricardo T. Jose, Ph . D.', 'Vibal Publishing House Inc.', 'vi, 161p', '971-07-2324-3', 2008, '', '2013-12-11 07:02:56', 'Normal', '14000'),
(14, 'Literature (the readers choice)', 9, 'Glencoe McGraw Hill', '..', 'xvi, 687p', '0-02-817934-x', 2001, '', '2013-12-11 07:05:25', 'Normal', '69000'),
(15, 'Beloved a Novel', 9, 'Toni Morrison', '..', 'xv, 430p', '0-394-53597-9', 1987, '', '2013-12-11 07:07:02', 'Normal', '37000'),
(16, 'Silver Burdett Engish', 2, 'Judy Brim', 'Silver Burdett Company', 'xi, 295p', '0-382-03575-5', 1985, '', '2013-12-11 09:22:50', 'Normal', '60000'),
(17, 'The Corporate Warriors (Six Classic Cases in American Business)', 8, 'Douglas K. Ramsey', 'Houghton Miffin Company', 'vi, 129p', '0-395-35487-0', 1987, '', '2013-12-11 09:25:32', 'Normal', '20700'),
(18, 'Introduction to Information System', 9, 'Cristine Redoblo', 'CHMSC', 'vii, 420p', '123-132', 2013, '', '2014-01-17 19:00:10', 'Normal', '50000')";
$query = mysqli_query($link, $tblBooks);
if ($query === true) {
    $bookIn = true;
} 
else {
    $bookIn = false;
}

// Create the sixth table named catalog
$tblCatalog = "CREATE TABLE IF NOT EXISTS `catalog` (
  `catalogID` int(11) AUTO_INCREMENT,
  `catalogNo` char(8) NOT NULL,
  `catStatus` enum('Lost','New','Old','Deleted') NOT NULL DEFAULT 'New',
  `state` enum('0','1') NOT NULL DEFAULT '1',
  `bookID` int(11) NOT NULL,
  PRIMARY KEY (`catalogID`),
  FOREIGN KEY (bookID) REFERENCES books(bookID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblCatalog);
if ($query === true) {
    $catalog = true;
} else {
    $catalog = false;
}

// Inserting data into the catalog table
$tblCatalog = "INSERT INTO `catalog` (`catalogID`, `catalogNo`, `bookID`, `catStatus`, `state`) VALUES
(1, 'C000001', 1, 'New', '1'),
(2, 'C000002', 1, 'Old', '1'),
(3, 'C000003', 1, 'New', '1'),
(4, 'C000004', 1, 'New', '1'),
(5, 'C000005', 1, 'Old', '1'),
(6, 'C000006', 2, 'New', '1'),
(7, 'C000007', 2, 'New', '1'),
(8, 'C000008', 2, 'Deleted', '0'),
(9, 'C000009', 2, 'Old', '1'),
(10, 'C000010', 2, 'New', '1'),
(11, 'C000011', 2, 'New', '1'),
(12, 'C000012', 2, 'New', '1'),
(13, 'C000013', 2, 'Old', '1'),
(14, 'C000014', 2, 'New', '1'),
(15, 'C000015', 2, 'Lost', '0'),
(16, 'C000016', 3, 'New', '1'),
(17, 'C000017', 3, 'Old', '1'),
(18, 'C000018', 3, 'New', '1'),
(19, 'C000019', 3, 'New', '1'),
(20, 'C000020', 3, 'New', '1'),
(21, 'C000021', 3, 'Old', '1'),
(22, 'C000022', 3, 'New', '1'),
(23, 'C000023', 3, 'Lost', '0'),
(24, 'C000024', 3, 'New', '1'),
(25, 'C000025', 3, 'Old', '1'),
(26, 'C000026', 3, 'New', '1'),
(27, 'C000027', 3, 'New', '1'),
(28, 'C000028', 3, 'New', '1'),
(29, 'C000029', 4, 'Old', '1'),
(30, 'C000030', 4, 'New', '1'),
(31, 'C000031', 4, 'New', '1'),
(32, 'C000032', 4, 'New', '1'),
(33, 'C000033', 4, 'Old', '1'),
(34, 'C000034', 4, 'New', '1'),
(35, 'C000035', 4, 'New', '1'),
(36, 'C000036', 5, 'Old', '1'),
(37, 'C000037', 5, 'New', '1'),
(38, 'C000038', 5, 'Lost', '0'),
(39, 'C000039', 5, 'Old', '1'),
(40, 'C000040', 5, 'New', '1'),
(41, 'C000041', 5, 'New', '1'),
(42, 'C000042', 5, 'Old', '1'),
(43, 'C000043', 5, 'New', '1'),
(44, 'C000044', 5, 'New', '1'),
(45, 'C000045', 5, 'Old', '1'),
(46, 'C000046', 5, 'New', '1'),
(47, 'C000047', 5, 'New', '1'),
(48, 'C000048', 5, 'Old', '1'),
(49, 'C000049', 5, 'New', '1'),
(50, 'C000050', 5, 'Lost', '0'),
(51, 'C000051', 5, 'Old', '1'),
(52, 'C000052', 5, 'New', '1'),
(53, 'C000053', 6, 'New', '1'),
(54, 'C000054', 6, 'Old', '1'),
(55, 'C000055', 6, 'New', '1'),
(56, 'C000056', 6, 'New', '1'),
(57, 'C000057', 6, 'Old', '1'),
(58, 'C000058', 6, 'New', '1'),
(59, 'C000059', 6, 'New', '1'),
(60, 'C000060', 6, 'Old', '1'),
(61, 'C000061', 6, 'New', '1'),
(62, 'C000062', 6, 'Lost', '0'),
(63, 'C000063', 6, 'Old', '1'),
(64, 'C000064', 6, 'New', '1'),
(65, 'C000065', 6, 'New', '1'),
(66, 'C000066', 6, 'New', '1'),
(67, 'C000067', 7, 'New', '1'),
(68, 'C000068', 7, 'New', '1'),
(69, 'C000069', 7, 'New', '1'),
(70, 'C000070', 7, 'New', '1'),
(71, 'C000071', 7, 'New', '1'),
(72, 'C000072', 7, 'New', '1'),
(73, 'C000073', 8, 'New', '1'),
(74, 'C000074', 8, 'New', '1'),
(75, 'C000075', 8, 'Old', '1'),
(76, 'C000076', 8, 'New', '1'),
(77, 'C000077', 8, 'Old', '1'),
(78, 'C000078', 8, 'Old', '1'),
(79, 'C000079', 8, 'New', '1'),
(80, 'C000080', 9, 'New', '1'),
(81, 'C000081', 9, 'New', '1'),
(82, 'C000082', 9, 'New', '1'),
(83, 'C000083', 9, 'New', '1'),
(84, 'C000084', 9, 'Old', '1'),
(85, 'C000085', 9, 'New', '1'),
(86, 'C000086', 9, 'New', '1'),
(87, 'C000087', 9, 'New', '1'),
(88, 'C000088', 9, 'Old', '1'),
(89, 'C000089', 10, 'New', '0'),
(90, 'C000090', 10, 'New', '0'),
(91, 'C000091', 10, 'New', '1'),
(92, 'C000092', 10, 'New', '1'),
(93, 'C000093', 10, 'Lost', '0'),
(94, 'C000094', 10, 'New', '1'),
(95, 'C000095', 10, 'New', '1'),
(96, 'C000096', 10, 'New', '1'),
(97, 'C000097', 10, 'Old', '1'),
(98, 'C000098', 10, 'New', '1'),
(99, 'C000099', 11, 'New', '1'),
(100, 'C000100', 11, 'New', '1'),
(101, 'C000101', 11, 'Old', '1'),
(102, 'C000102', 11, 'Old', '1'),
(103, 'C000103', 11, 'New', '1'),
(104, 'C000104', 11, 'New', '1'),
(105, 'C000105', 11, 'New', '1'),
(106, 'C000106', 11, 'New', '1'),
(107, 'C000107', 11, 'New', '1'),
(108, 'C000108', 11, 'New', '1'),
(109, 'C000109', 11, 'New', '1'),
(110, 'C000110', 11, 'Lost', '0'),
(111, 'C000111', 11, 'New', '1'),
(112, 'C000112', 11, 'New', '1'),
(113, 'C000113', 11, 'New', '1'),
(114, 'C000114', 11, 'Old', '1'),
(115, 'C000115', 11, 'Deleted', '0'),
(116, 'C000116', 11, 'New', '1'),
(117, 'C000117', 11, 'Old', '1'),
(118, 'C000118', 11, 'Old', '1'),
(119, 'C000119', 12, 'New', '1'),
(120, 'C000120', 12, 'New', '1'),
(121, 'C000121', 12, 'New', '1'),
(122, 'C000122', 12, 'New', '1'),
(123, 'C000123', 12, 'Lost', '0'),
(124, 'C000124', 12, 'New', '1'),
(125, 'C000125', 12, 'New', '1'),
(126, 'C000126', 12, 'New', '1'),
(127, 'C000127', 12, 'Old', '1'),
(128, 'C000128', 13, 'New', '1'),
(129, 'C000129', 13, 'New', '1'),
(130, 'C000130', 13, 'New', '1'),
(131, 'C000131', 13, 'New', '1'),
(132, 'C000132', 13, 'Old', '1'),
(133, 'C000133', 13, 'Old', '1'),
(134, 'C000134', 13, 'Old', '1'),
(135, 'C000135', 13, 'New', '1'),
(136, 'C000136', 13, 'New', '1'),
(137, 'C000137', 13, 'New', '1'),
(138, 'C000138', 13, 'New', '1'),
(139, 'C000139', 14, 'New', '1'),
(140, 'C000140', 14, 'New', '1'),
(141, 'C000141', 14, 'New', '1'),
(142, 'C000142', 14, 'New', '1'),
(143, 'C000143', 14, 'Lost', '0'),
(144, 'C000144', 14, 'New', '1'),
(145, 'C000145', 14, 'New', '1'),
(146, 'C000146', 14, 'New', '1'),
(147, 'C000147', 14, 'New', '1'),
(148, 'C000148', 14, 'New', '1'),
(149, 'C000149', 14, 'New', '1'),
(150, 'C000150', 14, 'Old', '1'),
(151, 'C000151', 14, 'Old', '1'),
(152, 'C000152', 14, 'New', '1'),
(153, 'C000153', 14, 'New', '1'),
(154, 'C000154', 14, 'New', '1'),
(155, 'C000155', 15, 'New', '1'),
(156, 'C000156', 15, 'Old', '1'),
(157, 'C000157', 15, 'New', '1'),
(158, 'C000158', 15, 'New', '1'),
(159, 'C000158', 15, 'New', '1'),
(160, 'C000160', 15, 'New', '1'),
(161, 'C000161', 15, 'Old', '1'),
(162, 'C000162', 15, 'Old', '1'),
(163, 'C000163', 15, 'New', '1'),
(164, 'C000164', 15, 'New', '1'),
(165, 'C000165', 16, 'New', '1'),
(166, 'C000166', 16, 'New', '1'),
(167, 'C000167', 16, 'New', '1'),
(168, 'C000168', 16, 'Old', '1'),
(169, 'C000169', 16, 'New', '1'),
(170, 'C000170', 16, 'New', '1'),
(171, 'C000171', 16, 'New', '1'),
(172, 'C000172', 16, 'Old', '1'),
(173, 'C000173', 16, 'New', '1'),
(174, 'C000174', 16, 'New', '1'),
(175, 'C000175', 16, 'New', '1'),
(176, 'C000176', 16, 'Old', '1'),
(177, 'C000177', 17, 'New', '1'),
(178, 'C000178', 17, 'New', '1'),
(179, 'C000179', 17, 'Old', '1'),
(180, 'C000180', 17, 'New', '1'),
(181, 'C000181', 17, 'New', '1'),
(182, 'C000182', 17, 'Old', '1'),
(183, 'C000183', 17, 'New', '1'),
(184, 'C000184', 17, 'New', '1'),
(185, 'C000185', 18, 'Old', '1'),
(186, 'C000186', 18, 'New', '1'),
(187, 'C000187', 18, 'New', '1'),
(188, 'C000188', 18, 'New', '1'),
(189, 'C000189', 18, 'New', '1'),
(190, 'C000190', 18, 'Lost', '0'),
(191, 'C000191', 18, 'New', '1'),
(192, 'C000192', 18, 'New', '1'),
(193, 'C000193', 18, 'Deleted', '0'),
(194, 'C000194', 18, 'New', '1')";
$query = mysqli_query($link, $tblCatalog);
if ($query === true) {
    $catalogIn = true;
} 
else {
    $catalogIn = false;
}

// Create the third table named borrow
$tblBorrow = "CREATE TABLE IF NOT EXISTS `borrow` (
  `borrowID` int(11) AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `dateBorrow` DATETIME NOT NULL,
  `dueDate` DATETIME DEFAULT NULL,
  PRIMARY KEY (`borrowID`),
  FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblBorrow);
if ($query === true) {
    $borrow = true;
} 
else {
    $borrow = false;
}

// Inserting data into the borrow table
$tblBorrow = "INSERT INTO `borrow` (`borrowID`, `userID`, `dateBorrow`, `dueDate`) VALUES
(1, 5, '2016-01-12 20:17:30', '2016-02-12 20:17:30'),
(2, 3, '2015-03-29 13:50:06', '2017-06-20 20:17:30'),
(3, 3, '2015-04-21 22:20:10', '2015-07-15 20:17:30')";
$query = mysqli_query($link, $tblBorrow);
if ($query === true) {
    $borrowIn = true;
} 
else {
    $borrowIn = false;
}

// Create the forth table named borrowdetails
$tblBorrowDetails = "CREATE TABLE IF NOT EXISTS `borrowDetails` (
  `borrowDetailsID` int(11) AUTO_INCREMENT,
  `catalogID` int(11) NOT NULL,
  `borrowID` int(11) NOT NULL,
  `borrowStatus` varchar(10) NOT NULL,
  `dateReturn` DATETIME NOT NULL,
  PRIMARY KEY (`borrowDetailsID`),
  FOREIGN KEY (catalogID) REFERENCES catalog(catalogID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (borrowID) REFERENCES borrow(borrowID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblBorrowDetails);
if ($query === true) {
    $tblBorrowDetails = true;
} 
else {
    $tblBorrowDetails = false;
}

// Inserting data into the borrowdetails table
$tblBorrowDetails = "INSERT INTO `borrowDetails` (`borrowDetailsID`, `catalogID`, `borrowID`, `borrowStatus`, `dateReturn`) VALUES
(1, 89, 1, 'Pending', ''),
(2, 90, 2, 'Pending', ''),
(3, 1, 3, 'Returned', '2015-07-14 00:30:51')";
$query = mysqli_query($link, $tblBorrowDetails);
if ($query === true) {
    $tblBorrowDetailsIn = true;
} else {
    $tblBorrowDetailsIn = false;
}

// Create the sixth table named price
$tblPrice = "CREATE TABLE IF NOT EXISTS `price` (
  `priceID` int(11) AUTO_INCREMENT,
  `catalogID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL,
  `userID` int(11) NOT NULL, 
  `datePaid` date NOT NULL,
  `amount` DECIMAL(13,2) NOT NULL,
  `reason` enum('Book Lost','Over Due','Book Lost And Over Due') NOT NULL,
  PRIMARY KEY (priceID),
  FOREIGN KEY (catalogID) REFERENCES catalog(catalogID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (bookID) REFERENCES books(bookID) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (userID) REFERENCES users(userID) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB";
$query = mysqli_query($link, $tblPrice);
if ($query === true) {
    $tblPrice = true;
} 
else {
    $tblPrice = false;
}
if($user && $userIn && $tblClassification && $tblClassificationIn && $book && $bookIn && $catalogIn && $borrow && $borrowIn && $tblBorrowDetails && $tblBorrowDetailsIn && $tblPrice){
    header('location: ../../index.php');
}
?>