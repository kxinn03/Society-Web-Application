-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-09-25 17:38:33
-- 服务器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `wong`
--

-- --------------------------------------------------------

--
-- 表的结构 `activity`
--

CREATE TABLE `activity` (
  `ActID` int(11) NOT NULL,
  `ActName` varchar(255) NOT NULL,
  `UpdDate` date NOT NULL,
  `ActImage` varchar(255) NOT NULL,
  `ActDesc` varchar(9999) NOT NULL,
  `ActVenue` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `StartTime` varchar(100) NOT NULL,
  `Category` varchar(15) NOT NULL,
  `value` float(5,2) NOT NULL,
  `people` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `activity`
--

INSERT INTO `activity` (`ActID`, `ActName`, `UpdDate`, `ActImage`, `ActDesc`, `ActVenue`, `StartDate`, `StartTime`, `Category`, `value`, `people`) VALUES
(53, 'Mini Chinese Crosstalk Performance Night', '2022-08-08', '01.png', 'Are you looking for a way to relieve stress in the face of heavy assignment? Then look at this!\r\n\r\nThis Mini Chinese Crosstalk Performance Night is a platform for cross talk students to practice themselves on the big stage.\r\n\r\nOn the day, they will bring you wonderful cross talk performances that will make you laugh and forget about your troubles.\r\n\r\nKeep calm and let’s experience the beauty of Chinese tradition and culture together this Friday!', 'DTAR', '2022-08-20', '20:00', 'Cross Talk', 10.00, 50),
(54, 'Cross Talk Class', '2022-07-22', '02.png', 'If you like cross talk performances and are new to cross talk, you must not miss our cross talk class!\r\n\r\nIn this class, you will learn a lot of knowledge about cross talk.\r\n\r\nThe class content is as follows : Cross Talk Term, Types of Cross Talk, Cross Talk Analysis', 'Q105', '2022-07-27', '10:00', 'Cross Talk', 10.00, 26),
(55, 'Xiang Qi Competion', '2022-07-20', '05.jpg', 'Looking for an opportunity to build up confidence and experience?\r\n\r\nWe will organize a Xiang Qi Competition on 23th July 2022.\r\n\r\nIt\'s open for all individuals from the age range of 13 to 30 years old. Yap…let\'s play together\r\n\r\nE-certificate is provided to all participants.\r\n\r\nTime Control: 10 minutes per round with no increment\r\n\r\nRounds: 7', 'H104 - BLOCK H', '2022-07-23', '14:00', 'Xiangqi', 5.00, 30),
(56, 'Diabolo Competition', '2022-07-10', '04.png', 'The diabolo competition not only provides a platform for players to improve their technical level, but it also provides a platform for players to exchange skilks and improve their relationship.\r\n\r\nWe hope that every bell-pulling player has the opportunity to step on the big stage and present their practice results.\r\n\r\nThus, we are going to hold this diabolo competition in order to provide an opportunity to all of you who love diabolo and always woks hard on practicing it.', 'THE RIMBA', '2022-07-23', '12:00', 'Diabolo', 5.00, 28),
(57, 'Xiang Qi Training Session', '2022-07-08', '05.jpg', 'Hey there fellow xiangqi players!\r\n\r\nTomorrow(09 July 2022) will conduct a training session at H104(Block H) from 2pm to 4pm.\r\n\r\nIf you are interested, do join our training session.\r\n\r\nEveryone is welcome to join our training session. Don’t miss the opportunity to learn and practice with us!!\r\n\r\n*Xiangqi set will be prepared for training. Hope to see you all there!', 'H104 - BLOCK H', '2022-07-09', '14:00', 'Xiangqi', 30.00, 20),
(58, 'Calligraphy Competition', '2022-07-05', '06.png', 'In order to enrich students\' extracurricular cultural life, we\'re going to hold a calligraphy competition. There will be a lot of prizes in this competition!\r\n\r\n1st place: RM300 & one set of calligraphy tool & bag\r\n\r\nSecond place: RM200 & one set of calligraphy tool\r\n\r\nThird place: RM100 & brush & ink\r\n\r\nExcellent works will be pasted on the bulletin board for others to learn and appreciate.\r\n\r\nThe prices are waiting for you! Let\'s Join this competition!', 'THE RIMBA', '2022-07-13', '13:00', 'Calligraphy', 30.00, 50),
(59, 'Dance of Awakening', '2022-07-02', '07.png', 'Hi TARcians, new semester is just around the corner. Are you all ready and excited about coming back to campus?\r\n\r\nWe are here to announce our upcoming event, \'Dance of Awakening 龙情狮义\' at 9am to 11am on the 13th of July 2022, located at Yum Yum Cafeteria\r\n\r\nWhat is this event about, you may wonder. A brief introduction to our event, Dance of Awakening is an eye dotting ceremony organized by the TARUC Lion & Dragon Dance Society. It is a ceremony held to witness and bless the awakening of our 6 new lions.\r\n\r\nBesides eye dotting, we have various performances for you all to spectate and enjoy. Stay tuned and hope to see you during our event!', 'YUM YUM CAFETERIA', '2022-07-13', '09:00', 'Lion Dance', 35.00, 80),
(60, 'Cross Talk Orientation Day', '2022-06-30', '08.png', 'Cross talk makes you have the courage to speak\r\n\r\nCross talk makes you funny\r\n\r\nCross talk makes you social\r\n\r\nLet\'s join us and make friends together!', 'H209 - BLOCK H', '2022-07-07', '17:00', 'Cross Talk', 5.00, 50),
(61, 'One-Day Diabolo', '2022-06-24', '09.png', 'Hi guys! We\'re going to hold a one-day diabolo.\r\n\r\nWe have prepared a series of fun games on that day.\r\n\r\nNo matter whether you have learned it or not *have touched the bell*, you are welcome!\r\n\r\nThere are many creative ringing games to interact with *and win prizes*\r\n\r\nThe most important thing is *the wonderful performance of the seniors*\r\n\r\nWe are also taking this opportunity to let everyone know more about Chinese Diabolo', 'IN FRONT OF DEWAN UTAMA', '2022-07-01', '09:00', 'Diabolo', 25.00, 40),
(62, 'Calligraphy Exhibition', '2022-06-18', '10.jpeg', 'Do you know what is the advantages visiting the calligraphy exhibition?\r\n\r\nThe calligraphy exhibition can help us better understand Chinese traditional culture and art and also improve our cultural literacy.\r\n\r\nWith the different depth of our understanding of art, the appreciation angle and depth of the calligraphy works will also be different.\r\n\r\nThe change of times has made traditional art and contemporary culture constantly collide, and a variety of art forms and works of art appear in our lives, making our cultural life no longer monotonous.\r\n\r\nThus, we\'re going to hold a calligraphy exhibition for you to visit and enjoy, giving you a beautiful enjoyment.\r\nMark your calender now! So you won\'t miss it!', 'THE RIMBA', '2022-06-23', '10:00', 'Calligraphy', 10.00, 30),
(63, 'Xiang Qi Team Selection 2022', '2022-06-17', '11.png', 'Hello everyone! Here’s your chance to become part of the college team player! We are going to organise college team selection in our campus to build the strongest college xiangqi team.\r\n(Time Control: 20 minutes + 10 seconds, Round: 6 rounds)\r\nGrab the chance!', 'YUM YUM CAFETERIA', '2022-06-25', '09:00', 'Xiangqi', 10.00, 50),
(64, 'Lion Dance Basic Skills Sharing', '2022-06-15', '12.png', 'Are you holding the lion head right?\r\n\r\nHow to uses the lion tail？\r\n\r\nHow to tie the Kung Fu belt?\r\n\r\nIn the coming Saturday, 25 June 2022 at 2pm to 4pm will having a lion dance basic skills sharing session at Lecture Hall(DK Y).\r\n\r\nThis sharing session will be featuring three respectful speakers which are Mr.Lee Zhao Xin, Mr. Tan Shi Qiang and Mr. Foo Shun Han.\r\n\r\n(The course content is as follows : Belt Tie Method, Lion Dance Skill, Dynamic Skill, Morphological Skill, Difference Between Traditional and Nowadays Lion Dance, High Pole Stance Footwork, Southern Lion Characteristics)', 'DK Y - LECTURE HALL', '2022-06-25', '14:00', 'Lion Dance', 20.00, 50),
(65, 'Diabolo Camp', '2022-06-14', '13.png', 'In this diabolo camp, the diabolo players from various universities will gather together to practice and exchange diabolo techniques.\r\n\r\nThis camp will greatly improve your diabolo skills, and you can also meet a lot of players from other universities and become friends with them.\r\n\r\nYou will get a lot of benefits by participating in this diabolo camp, don\'t miss it!', 'SPORT COMPLEX', '2022-06-19', '09:00', 'Diabolo', 15.00, 30),
(66, 'Meet of Exchange', '2022-06-01', '14.png', 'The meet of exchange is a form of interactive theatre that encourages communication and the exchange of views on topical issues like illness (mental illness, anorexia, etc.), relationships, discrimination, migration etc.\r\n\r\nStudents will gather together to interact with one another and share knowledge and experiences, which will also foster relationships among students\r\n\r\nIn this exchange meeting, you will only get the benefits and never the disadvantages, so come and join us!', 'H210 - BLOCK H', '2022-06-06', '08:00', 'Theater', 35.00, 20),
(67, 'Origin Of Lion Dance', '2022-05-25', '15.jpg', 'For those who love lion dance, do you know the origin of lion dance?\r\n\r\nIf you want to understand more about the lion dance\'s origins, come to join us at DK ABA(Lecture Hall)on May 28, 2022, from 1pm to 3pm.\r\n\r\nThere will be a teacher who will thoroughly explain the origins of the lion dance to us.\r\n\r\nRemember to bring your note and pen to jot down the important points.\r\n\r\nSign up now so you don\'t miss out.', 'DK ABA - LECTURE HALL', '2022-05-28', '13:00', 'Lion Dance', 30.00, 50),
(68, 'Calligraphy Course', '2022-05-28', '16.jpg', 'In order to further develop calligraphy culture, inspire your love for culture and language, arouse your attention to calligraphy, and guide the correct way of writing calligraphy, we will have a calligraphy course this Saturday (14 May 2022) from 10am to 12pm at K201(Block K).\r\n\r\n(In this calligraphy process you will learn the following knowledge: Calligraphy writing posture and writing method, Characteristics of strokes and writing methods, Radical characteristics and writing methods, Word structure, How to read the calligraphy copybook, Copywriting method, Creation points, Appreciate the beauty in calligraphy)', 'K201 - BLOCK K', '2022-05-14', '10:00', 'Calligraphy', 15.00, 30),
(69, 'Chinese New Year Theater Show', '2022-02-06', '17.png', 'Happy Chinese New Year!!!\r\n\r\nThe theater students have been preparing for this show for a long time to give you the best performance.\r\n\r\nThis Chinese New Year Theater Show will be held on Monday, February 14th, from 10am to 1pm, which is located at The Rimba, TAR UC West Campus,KL Main Campus!\r\n\r\nCome and enjoy our show and let\'s celebrate a Happy Chinese New Year together on our campus!', 'THE RIMBA', '2022-02-14', '10:00', 'Theater', 15.00, 70);

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(30) NOT NULL,
  `Password` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('kxinn', 789),
('syee', 0),
('xinyee', 123),
('xyii', 456);

-- --------------------------------------------------------

--
-- 表的结构 `announ`
--

CREATE TABLE `announ` (
  `title` varchar(50) NOT NULL,
  `date` varchar(20) NOT NULL,
  `sender` varchar(30) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `announ`
--

INSERT INTO `announ` (`title`, `date`, `sender`, `content`) VALUES
('Annual General Meeting', '2022-04-20', 'shinyee', 'Our society will tentatively hold the Annual General Meeting at DK ABA at 1:00 noon on 7 May, 2022(Saturday) to review the performance of the society in the past year and select the 2022/2023 Executive Committee.\r\n\r\nAny member who intends to change or propose any matter and discuss it on the agenda of the general meeting must notify the general secretary in writing at least 7 days before the date of the general meeting (before April 30, 2022).\r\n\r\nThanks.'),
('Covid-19 Safety Message for ALL Members', '2022-12-07', 'karxin', 'In light of the recent surge of COVID-19 cases, we ask all members to cooperate in taking steps to reduce the transmission of communicable diseases in the campus.\r\n\r\nAll members are reminded of the following:\r\n\r\nWear Mask at all indoor settings for the safety of you and those around you.\r\nWash your hands frequently with warm, soapy water for at least 20 seconds.\r\nRefrain from touchingyour mouth, eyes and nose.\r\nClean frequently touched surfaces. If available, use an alcohol-based hand sanitizer that contains at least 60-95% alcohol.\r\nAvoid people who are sick with respiratory symptoms.\r\nStay home when you are sick.'),
('Mid-term Review', '2022-08-20', 'xinyee', 'In order to make the Society have a better performance in the later stage, the Executive Committee decided to conduct a mid-term review, hoping to use this mid-term review to improve everyone’s imperfections and strengthen everyone’s advantages, so that the group and the Society will be more effective in the later activities.\r\n\r\n2. The Executive Committee decided to let the group conduct a group review and organize the review report between May 09 and July 31, and submit it to the general secretary (Dai Yan Ting) on August 15.\r\n\r\n3. In addition, the Executive Committee has decided to hold a member call for the mid-term review, which will be tentatively scheduled for DK ABA on August 15 (Monday) at 7:00 pm.\r\n\r\n4. We hope that everyone will cooperate and submit the mid-term review report on time. Thank you for your cooperation.');

-- --------------------------------------------------------

--
-- 表的结构 `booking`
--

CREATE TABLE `booking` (
  `bookingID` int(6) NOT NULL,
  `Username` varchar(15) NOT NULL,
  `numOfTicket` int(3) NOT NULL,
  `ActID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `booking`
--

INSERT INTO `booking` (`bookingID`, `Username`, `numOfTicket`, `ActID`) VALUES
(1001, '1', 2, 1),
(1002, 'A02', 5, 0),
(1003, '1', 3, 111123213),
(1004, '1', 2, 111123213),
(1005, '1', 4, 111123213),
(1006, '1', 5, 38),
(1007, '1', 5, 38),
(1008, '1', 2, 53),
(1009, '1', 2, 56),
(1010, '1', 0, 65),
(1011, '1', 0, 68),
(1012, '1', 0, 0),
(1013, '1', 0, 65),
(1014, '1', 0, 64),
(1015, '1', 0, 64),
(1016, '1', 3, 64),
(1017, '1', 3, 64),
(1018, '1', 3, 62),
(1019, '1', 0, 0),
(1020, '1', 0, 64),
(1021, '1', 0, 0),
(1022, '1', 5, 0),
(1023, '1', 5, 64),
(1024, '1', 0, 65),
(1025, '1', 0, 64),
(1026, '1', 3, 64),
(1027, '1', 1, 0),
(1028, '1', 3, 54),
(1029, '1', 2, 57),
(1030, '1', 2, 63),
(1031, '1', 1, 63),
(1032, '1', 1, 38),
(1033, '1', 0, 0),
(1034, '1', 1, 38),
(1035, '1', 1, 55),
(1036, '1', 1, 55),
(1037, '1', 1, 58),
(1038, '1', 2, 67),
(1039, '1', 2, 67),
(1040, '1', 2, 67),
(1041, '1', 3, 66),
(1042, '1', 0, 38),
(1043, '1', 0, 38),
(1044, '1', 0, 38),
(1045, '1', 5, 38),
(1046, '1', 5, 38),
(1047, '1', 1, 40),
(1048, '1', 1, 61),
(1049, '1', 7, 65),
(1050, 'LEE', 2, 65),
(1051, 'Xinyee', 2, 54),
(1052, 'Xinyee', 2, 54);

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE `member` (
  `Username` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `PhoneNo` char(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `Birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`Username`, `Email`, `Password`, `PhoneNo`, `Name`, `Address`, `Birthday`) VALUES
('BIBI', 'tingxy-wm21@student.ta', '778899', '011-3600600', 'BIBIYO', 'No16, Jalan SP4/6, Taman Segar Perdana', '2000-01-01'),
('Bonbon', 'ahbon2003@gmail.com', 'apache_2002', '019-1567890', 'Bon', '15, Jalan Molek 2/30 Taman Molek, 81100, Johor, Malaysia.', '1992-01-11'),
('Cii', 'tingxinyi2003@gmail.co', '123456', '011-3456789', 'TING XIN YI', 'Okkkkk18, Jalan Sha Sha', '2001-01-01'),
('George', 'mng@gmail.com', 'owuu@0433', '019-1255677', 'George Ng', '169 A, Jln Lama Batu 3 3/4, Wilayah Persekutuan, 58000 Malaysia.', '2002-07-13'),
('John_00', 'Joinsss@gmail.com', 'www_1122', '011-9987588', 'Johnny Tan', 'No. 634, Jln 27, Kampung Baru Salak Selatan, 57100, Seremban.\r\n', '2000-07-04'),
('Lim22', 'lmmi@hotmail.com', 'lim221', '019-1224577', 'Lim Ming', 'Kedai Luar Bandar 5, Jln Kapar Batu 5, 42100 Malaysia.', '1997-10-27'),
('momo', 'tingxinyi2003@gmail.co', '112233', '011-3600600', 'Momo', 'Okkkkk18, Jalan Sha Sha', '2000-01-01'),
('pipi', 'wel2022@hotmail.com', '778899', '014-0099881', 'Welcomee', 'No16, Jalan SP4/6, Taman Segar Perdana', '2000-01-07'),
('Txyi', 'sse@gmail.com', 'nny00_10', '012-9958887', 'Xyii', '33, Jln Barrack 34/1, Taiping Perak, 34000 Malaysia', '2002-08-15'),
('Xinyee', 'wongxinyee0627@gmail.commmmm', '112233', '010-9471663', 'WONG XIN YEE', 'NO 776,JALAN E 5/4,', '2022-06-27'),
('yunlei0111', 'zhangyunlei@examle.com', '123_yyy', '016-3456789', 'Yun Lei', '76, Jalan Ho Loke Park, Off Jalan Pasir Puteh\r\n31650, Ipoh.', '2001-03-01');

-- --------------------------------------------------------

--
-- 表的结构 `payment`
--

CREATE TABLE `payment` (
  `payid` int(11) NOT NULL,
  `fullname` varchar(35) NOT NULL,
  `phono` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(60) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(5) NOT NULL,
  `cardname` varchar(30) NOT NULL,
  `cardno` int(16) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `expmon` varchar(10) NOT NULL,
  `expyear` int(4) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `payment`
--

INSERT INTO `payment` (`payid`, `fullname`, `phono`, `email`, `address`, `city`, `state`, `zip`, `cardname`, `cardno`, `pass`, `expmon`, `expyear`, `cvv`) VALUES
(1, 'Zhang Yun Lei', 16, 'zhang@example.com', '914 Jalan PJU 9/99', 'Petaling Jaya', 'Pahang', 25469, 'ZHANG YUN LEI', 1111, '12ab34cd', 'September', 2024, 212),
(2, 'Tan Xin Xin', 16, 'tanxin@gmail.com', '333 Jalan PJU 2/55', 'Cheras', 'Kuala Lumpur', 47300, 'TAN XIN XIN', 125, 'tan873hhh', 'August', 2024, 123),
(3, 'Lee Hau Hau', 16, 'lee@example.com', '435 Jalan PJU 3/77', 'Puchong', 'Selangor', 46343, 'LEE HAU HAU', 4432, '54FF45f', 'August', 2025, 555),
(5, 'WONG XIN YEE', 10, 'wongxinyee0627@gmail.commmmm', 'NO 776,JALAN E 5/4,', 'KUALA LUMPUR', 'Kuala Lumpur', 52100, 'Wong xin Yee', 1111, '123', 'November', 2028, 222);

--
-- 转储表的索引
--

--
-- 表的索引 `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`ActID`);

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`);

--
-- 表的索引 `announ`
--
ALTER TABLE `announ`
  ADD PRIMARY KEY (`title`);

--
-- 表的索引 `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingID`);

--
-- 表的索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`Username`);

--
-- 表的索引 `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `activity`
--
ALTER TABLE `activity`
  MODIFY `ActID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- 使用表AUTO_INCREMENT `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- 使用表AUTO_INCREMENT `payment`
--
ALTER TABLE `payment`
  MODIFY `payid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
