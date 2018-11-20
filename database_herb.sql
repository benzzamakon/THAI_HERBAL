-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 06:16 AM
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
-- Database: `database_herb`
--

-- --------------------------------------------------------

--
-- Table structure for table `count_herb`
--

CREATE TABLE `count_herb` (
  `Cou_IP` smallint(5) NOT NULL,
  `Cou_Date` date NOT NULL,
  `Her_ID` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `count_herb`
--

INSERT INTO `count_herb` (`Cou_IP`, `Cou_Date`, `Her_ID`) VALUES
(1, '2018-10-30', 14),
(2, '2018-10-30', 12),
(3, '2018-10-30', 13),
(4, '2018-10-30', 19),
(5, '2018-10-30', 21),
(6, '2018-10-30', 14),
(7, '2018-10-30', 14),
(8, '2018-10-30', 1),
(9, '2018-10-31', 7),
(10, '2018-10-31', 0),
(11, '2018-10-31', 22),
(12, '2018-11-06', 13),
(13, '2018-11-06', 13),
(14, '2018-11-07', 12),
(15, '2018-11-07', 13),
(16, '2018-11-07', 19),
(17, '2018-11-07', 21),
(18, '2018-11-07', 20),
(19, '2018-11-07', 18),
(20, '2018-11-07', 17),
(21, '2018-11-07', 15);

-- --------------------------------------------------------

--
-- Table structure for table `count_view`
--

CREATE TABLE `count_view` (
  `Her_ID` smallint(5) NOT NULL,
  `views` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `count_view`
--

INSERT INTO `count_view` (`Her_ID`, `views`) VALUES
(11, 65),
(12, 2),
(13, 2),
(14, 37),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 36);

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `Dis_ID` smallint(5) NOT NULL,
  `Dis_Name` varchar(40) DEFAULT NULL,
  `Dis_symptom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`Dis_ID`, `Dis_Name`, `Dis_symptom`) VALUES
(1, 'หนองใน', 'โรคหนองในแท้มักแสดงอาการภายในประมาณ 2 สัปดาห์หลังจากได้รับเชื้อ หรือบางรายที่อาจไม่มีอาการใด ๆ ปรากฏจนกระทั่งผ่านไปหลายเดือนแล้ว โดยกว่าครึ่งของหญิงที่ป่วยเป็นโรคนี้และประมาณ 1 ใน 10 ของผู้ป่วยเพศชายที่ติดเชื้อแต่ไม่มีอาการแสดงชัดเจน ทำให้ผู้ป่วยอาจไม่รู้'),
(2, 'คอพอก', 'บวมบริเวณลำคอใต้คอหอย,รู้สึกแน่นในลำคอ,ไอ,เสียงแหบ,กลืนอาหารลำบาก,หายใจลำบาก\r\n'),
(3, 'ผิวหนัง', ' ผิวหนังขึ้นผื่น,คัน\r\n'),
(4, 'กลาก', 'อักเสบคล้ายผื่นแดง\r\n'),
(5, 'พาร์กินสัน', 'สั่นมากเวลาอยู่นิ่งๆ,เคลื่อนไหวช้า \r\n'),
(6, 'กระเพาะ', 'มีอาเจียนรุนแรงติดต่อกัน,ถ่ายดำหรือถ่ายมีเลือดปน\r\n'),
(7, 'ปอด', 'ไอเรื้อรัง,หายใจมีเสียงหวีด,ไอมีเลือดปน,เหนื่อยง่าย\r\n'),
(8, 'ผอมแห้ง', 'เบื่ออาหาร\r\n'),
(9, 'หอบหืด', 'เป็นแผลในปากและกระพุ้งแก้ม,อาเจียนออกมามากๆ\r\n'),
(10, 'อหิวาตก', 'ถ่ายเหลวเป็นน้ำมาก,อาเจียน,ช็อค\r\n'),
(12, 'ไข้หวัด', 'อาการของไข้หวัดจะเริ่มขึ้นเมื่อผู้ป่วยได้รับเชื้อไวรัสที่เป็นสาเหตุของไข้หวัด เมื่อผู้ป่วยติดเชื้อไข้หวัด จะมีอาการดังต่อไปนี้ เจ็บคอ น้ำมูกไหล คัดจมูก หายใจได้ไม่สะดวกเนื่องจากจมูกบวม และมีน้ำมูกอุดตันภายในจมูก ไอ และจาม เสียงแหบ อ่อนเพลียและรู้สึก'),
(13, 'ท้องร่วง ', '1.คลื่นไส้ อาเจียน\r\n2.ท้องเสีย ถ่ายบ่อย อาจจะถ่ายเป็นน้ำหลาย ๆ ครั้ง ถ้าเกิดจากพิษของแบคทีเรีย หรือถ่ายเป็นมูกเลือด ถ้าเกิดจากเชื้อแบคทีเรียนั้นจะทำลายผนังลำไส้โดยตรง\r\n3.ปวดท้องมักจะปวดเป็นพัก ๆ ปวดจนตัวงอ เนื่องมาจากผนังลำไส้บีบตัวอย่างรุนแรง\r\n4.ถ้าลำไส้'),
(14, 'บิด ', 'โรคบิดชิเกลลา (โรคบิดไม่มีตัว) อาการจะเกิดหลังได้รับเชื้อประมาณ 1-7 วัน (ระยะฟักตัวของโรค) และจะมีอาการอยู่ประมาณ 3-10 วันหลังการรักษา ซึ่งในช่วงมีอาการจะเป็นช่วงที่เกิดการติดต่อของโรคได้จากการปนเปื้อนของเชื้อในอุจจาระ ซึ่งถ้าได้รับเชื้อไม่มาก และมีสุขภาพ'),
(15, 'กระเพาะปัสสาวะอักเสบ', 'ผู้ป่วยจะปวดปัสสาวะบ่อย รู้สึกปวดแสบขณะปัสสาวะ ปัสสาวะมีเลือดปนออกมา ปวดท้องน้อย รวมถึงลักษณะน้ำปัสสาวะที่ออกมามีปริมาณน้อย สีขุ่น และกลิ่นเหม็นผิดปกติ  '),
(16, 'ความดันโลหิตสูง ', 'ผู้ป่วยส่วนใหญ่ที่ตรวจพบภาวะความดันโลหิตสูง มักจะไม่เผยอาการใดๆมาก่อนหน้า ภาวะความดันโลหิตสูงจะไม่แสดงอาการใดๆ ถึงแม้ว่าระดับความดันโลหิตจะสูงมากก็ตาม แต่อาจแสดงอาการได้ในผู้ป่วยบางรายที่มีความดันสูงมากจนถึงค่าวิกฤต เช่น อาการปวดศีรษะ อาการเวียนหัวขณะเปลี'),
(17, 'ระบบทางเดินอาหาร', 'อาการที่มักพบได้บ่อย เช่น การปวดท้องโดยไม่ทราบสาเหตุ อาการแสบร้อนที่หน้าอกหรือลิ้นปี่ ขย้อนอาหาร แน่นหรือเจ็บหน้าอกหรืออาจมีอาการไอเรื้อรัง หอบหืดเรื้อรัง ร่วมด้วย ท้องอืด กลืนอาหารจุกที่คอ ท้องผูก ท้องเสีย หรือท้องผูกสลับท้องเสีย'),
(18, 'ระบบหายใจ', 'อาการหายใจลำบาก ไอ แน่นหน้าอก หรือเสมหะมีเลือดปน อาจเป็นอาการที่แสดงถึงความผิดปกติของปอดและระบบทางเดินหายใจ ศูนย์โรคปอดและโรคระบบทางเดินหายใจ โรงพยาบาลบำรุงราษฎร์ ให้บริการดูแลรักษาโรค '),
(19, 'ระบบไหลเวียนโลหิต', 'อาการของโรคที่เกี่ยวกับการไหลเวียนของเลือดบกพร่อง ขึ้นกับอวัยวะส่วนนั้นๆ สำหรับหัวใจจะมีอาการเจ็บหน้าอก ใจสั่น หายใจลำบาก หากเลือดไปเลี้ยงสมองไม่เพียงพอจะมีอาการมึนงง สับสน และเป็นลม หากเป็นที่ขาจะมีอาการปวดขา ขาบวม เป็นต้น'),
(20, 'กาม', 'มีสาเหตุหลายอย่างที่จะทำให้คุณสงสัยว่าคุณมีโรคทางเพศหรือกามโรค คุณอาจจะมีอาการปวดแสบปวดร้อนเวลาคุณฉี่ หรือมีตกขาว ที่แปลกไป หรือคุณได้รับรู้ว่าคนที่คุณได้ร่วมเพศด้วยมีโรคติดเชื้อทางเพศ'),
(21, 'คุดทะราด', 'ภายหลังจากที่เชื้อโรคเข้าสู่ร่างกายทางบาดแผลแล้วประมาณ 3-6 สัปดาห์ จะเกิดโรคระยะแรกคือ มีตุ่มนูนคล้ายหูดที่ผิวหนัง ตุ่มนี้เรียกว่า ตุ่มแม่ (mother yaw) ต่อมาอีกหลายสัปดาห์หรือหลายเดือน ตุ่มนี้จะค่อย ๆ มีขนาดใหญ่ขึ้นเป็นตุ่มนูนแดง หรือเป็นแผล หรือโตคล้ายดอ'),
(22, 'รำมะนาด', 'พราะอาการโรคปริทันต์ในระยะแรก ๆ จะไม่สามารถสังเกตเห็นได้อย่างชัดเจน เราจึงต้องหมั่นตรวจสุขภาพฟันและช่องปากอยู่เสมอ หรือจะลองสังเกตสัญญาณโรคปริทันต์จากอาการเหล่านี้ก็ได้\r\n          - มีเลือดออกง่ายขณะแปรงฟัน\r\n          - เหงือกบวมแดง\r\n          - มีกลิ่นปา'),
(23, 'เบาหวาน', 'อาการของโรคเบาหวานชนิดที่ 1 จะร้ายแรงและเกิดขึ้นเร็ว อาจจะใช้เวลาไม่กี่วันจนถึงสัปดาห์ โดยอาการมีดังนี้\r\nกระหายน้ำและปัสสาวะบ่อย\r\nหิวบ่อย\r\nตามัว มองภาพไม่ชัด\r\nอ่อนเพลีย\r\nน้ำหนักลดที่หาสาเหตุไม่ได้\r\nบางครั้งอาการของโรคเบาหวานชนิดที่ 1 เป็นสัญญาณเตือนของภาว'),
(24, 'เรื้อน', 'แม้จะเป็นโรคที่มีลักษณะเด่น แต่กว่าอาการแสดงของโรคเรื้อนจะปรากฏอาจใช้เวลายาวนานหลายปีหลังการติดเชื้อ เนื่องจากแบคทีเรียที่ก่อโรคมีการแพร่กระจายและเพิ่มจำนวนอย่างช้า ๆ โดยอาการเหล่านั้น'),
(25, 'ข้ออักเสบ', '1. โรคข้ออักเสบแบบเฉียบพลันแบบข้อเดียว อาจเกิดจากโรคเก๊าท์ ข้ออักเสบติดเชื้อ ข้ออักเสบจากการใช้งาน เส้นเอ็นอักเสบหรือผิวหนังอักเสบที่อยู่ติดข้อได้\r\n2. ข้ออักเสบชนิดหลายข้อถ้ามีอาการชนิดเฉียบพลัน ส่วนใหญ่จะเกิดจากการติดเชื้อไวรัส หรือแบคทีเรียบางชนิดได้\r\n3'),
(26, 'โลหิตเป็นพิษ', 'นอกเหนือจากอาการที่เกี่ยวข้องกับการติดเชื้อแล้ว ลักษณะของภาวะพิษเหตุติดเชื้อคือมีการอักเสบแบบเฉียบพลันขึ้นทั่วร่างกาย และมักมีไข้และปริมาณเม็ดเลือดขาวสูง (เม็ดเลือดขาวมากเกิน; leukocytosis) หรืออาจมีเม็ดเลือดขาวต่ำและอุณหภูมิร่างกายต่ำกว่าปกติและอาเจียนก็'),
(27, 'นิ่ว', 'อาการที่มักพบในผู้ป่วยโรคนิ่วในกระเพาะปัสสาวะ ได้แก่\r\n1. การปัสสาวะผิดปกติคล้ายกับอาการของโรคกระเพาะปัสสาวะอักเสบ เช่น ปัสสาวะบ่อย ปัสสาวะแสบขัด ปัสสาวะมีเลือดปน\r\n2. ปัสสาวะไม่ออกหรือออกกะปริดกะปรอย คือปัสสาวะไหลๆ หยุดๆ\r\n3. มีเม็ดนิ่วลักษณะคล้ายกรวดทรายปน'),
(28, 'ปวดข้อ', 'ข้อต่อจะต้องรับมือกับแรงกระแทก และการสึกหรออย่างต่อเนื่องจากการเคลื่อนไหวในชีวิตประจำวัน ข้อเข่าจะมีอาการปวด และสึกหรอได้ง่ายเป็นพิเศษ เนื่องจากมันรองรับน้ำหนักทั้งหมดของร่างกาย และแรงกระแทก ที่เพิ่มขึ้นเมื่อวิ่ง หรือกระโดด คนเราจะมีโอกาสปวดเข่ามากขึ้นเมื'),
(29, 'หลอดลมอักเสบ', '- มีอาการไอเรื้อรัง ไม่หายภายใน 2 สัปดาห์\r\n- มีอาการไอเป็นเลือด ร่วมด้วย\r\n- มีอาการที่สงสัยว่า อาจเป็นปอดอักเสบร่วมด้วย เช่น มีไข้  ไอ และหอบเหนื่อย\r\n- มีอาการไอมาก จนรบกวนการรับประทานอาหาร หรือการนอนหลับ \r\n- ในกรณีที่ผู้ป่วยสูงอายุ การไอมากๆ อาจทำให้กระด');

-- --------------------------------------------------------

--
-- Table structure for table `herb`
--

CREATE TABLE `herb` (
  `Her_ID` smallint(5) NOT NULL,
  `Her_Name` varchar(50) DEFAULT NULL,
  `Her_Picture` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herb`
--

INSERT INTO `herb` (`Her_ID`, `Her_Name`, `Her_Picture`) VALUES
(12, 'กรรณิการ์', 'img_5bbf6f6a8729a.jpg'),
(11, 'ชะคราม', 'img_5bbf6a8b7083d.jpg'),
(13, 'กระถิน', 'img_5bbf70e3f1ef9.jpg'),
(14, ' ถั่วแปบ', 'img_5bbf71f43fdc4.jpg'),
(15, 'ผักบุ้งไทย', 'img_5bbf72c0cb791.jpg'),
(16, 'พริกหวาน', 'img_5bbf73106e128.jpg'),
(17, 'ส้มโอ', 'img_5bbf736d45bb8.jpg'),
(18, 'มะระขี้นก', 'img_5bbf7471cfd6d.jpg'),
(19, 'กระทกรก', 'img_5bbf751896e1b.jpg'),
(20, 'กล้วยหอม', 'img_5bbf759c937e6.jpg'),
(21, 'กล้วยน้ำว้า', 'img_5bbf760135807.jpg'),
(22, 'เห็ดหลินจือ', 'img_5bbf77c025bea.jpg'),
(23, 'กระดังงา', 'img_5be82acebf207.jpg'),
(24, 'ขนุน', 'img_5be82c2ec7fc3.jpg'),
(25, 'คูน/ราชพฤกษ์', 'img_5be82f2576444.jpg'),
(26, 'มะแว้งเครือ', 'img_5be8369337835.JPG'),
(28, 'เลี่ยน', 'img_5be83fbb5e229.JPG'),
(29, 'แตงกวา', 'img_5be8a24f5b996.JPG'),
(30, 'กระวาน', 'img_5be8a3b5ad619.JPG'),
(31, 'ขัดมอน', 'img_5be8a434242cf.JPG'),
(32, 'ข้าวโพด', 'img_5be8a51e0081c.JPG'),
(33, 'กฤษณา', 'img_5be8a6c9e92dd.JPG'),
(34, 'ข่อย', 'img_5be8a75f5d946.JPG'),
(35, 'พิกุล	', 'img_5be8a8118d2d5.JPG'),
(36, 'มะลิลา', 'img_5be8a9f79d08f.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `herb_disease`
--

CREATE TABLE `herb_disease` (
  `Hd_ID` smallint(5) NOT NULL,
  `Her_ID` smallint(5) NOT NULL,
  `Dis_ID` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herb_disease`
--

INSERT INTO `herb_disease` (`Hd_ID`, `Her_ID`, `Dis_ID`) VALUES
(23, 11, 2),
(24, 11, 1),
(25, 12, 12),
(26, 13, 13),
(27, 14, 12),
(28, 15, 12),
(29, 16, 12),
(30, 17, 12),
(31, 18, 6),
(32, 18, 14),
(33, 19, 15),
(34, 20, 16),
(35, 21, 6),
(36, 21, 14),
(37, 22, 19),
(38, 22, 18),
(39, 22, 17),
(40, 23, 9),
(41, 24, 20),
(42, 25, 21),
(43, 25, 14),
(44, 25, 22),
(45, 26, 23),
(60, 28, 3),
(61, 28, 24),
(62, 29, 25),
(63, 30, 22),
(64, 30, 26),
(65, 31, 12),
(66, 32, 27),
(67, 33, 28),
(68, 33, 3),
(69, 33, 24),
(70, 34, 14),
(71, 34, 12),
(72, 35, 3),
(73, 36, 29),
(74, 36, 9);

-- --------------------------------------------------------

--
-- Table structure for table `herb_maintain`
--

CREATE TABLE `herb_maintain` (
  `Hm_ID` smallint(5) NOT NULL,
  `Her_ID` smallint(5) NOT NULL,
  `Mai_ID` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herb_maintain`
--

INSERT INTO `herb_maintain` (`Hm_ID`, `Her_ID`, `Mai_ID`) VALUES
(15, 11, 3),
(16, 12, 6),
(17, 13, 3),
(18, 14, 3),
(19, 15, 3),
(20, 16, 3),
(21, 17, 3),
(22, 18, 1),
(23, 19, 2),
(24, 20, 2),
(25, 21, 4),
(26, 22, 4),
(27, 23, 7),
(28, 24, 1),
(29, 24, 7),
(30, 25, 7),
(31, 26, 7),
(32, 26, 8),
(49, 28, 7),
(50, 29, 6),
(51, 30, 9),
(52, 31, 9),
(53, 32, 9),
(54, 33, 10),
(55, 34, 10),
(56, 35, 10),
(57, 36, 10);

-- --------------------------------------------------------

--
-- Table structure for table `herb_nature`
--

CREATE TABLE `herb_nature` (
  `Hn_ID` smallint(5) NOT NULL,
  `Her_ID` smallint(5) NOT NULL,
  `Nat_ID` smallint(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herb_nature`
--

INSERT INTO `herb_nature` (`Hn_ID`, `Her_ID`, `Nat_ID`) VALUES
(10, 11, 2),
(11, 12, 5),
(12, 13, 4),
(13, 14, 4),
(14, 15, 2),
(15, 16, 4),
(16, 17, 4),
(17, 18, 4),
(18, 19, 4),
(19, 20, 4),
(20, 21, 4),
(21, 22, 4),
(22, 23, 5),
(23, 24, 4),
(24, 25, 5),
(25, 26, 4),
(27, 28, 2),
(28, 29, 4),
(29, 30, 4),
(30, 31, 2),
(31, 32, 4),
(32, 33, 2),
(33, 34, 2),
(34, 35, 5),
(35, 36, 5);

-- --------------------------------------------------------

--
-- Table structure for table `maintain`
--

CREATE TABLE `maintain` (
  `Mai_ID` smallint(5) NOT NULL,
  `Mai_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `maintain`
--

INSERT INTO `maintain` (`Mai_ID`, `Mai_Name`) VALUES
(1, 'บำรุงกำลัง'),
(2, 'บำรุงสมอง'),
(3, 'บำรุงสายตา'),
(4, 'ยาอายุวัฒนะ'),
(5, 'บำรุงธาตุ'),
(6, 'บำรุงผิวหนัง'),
(7, 'บำรุงเลือด'),
(8, 'บำรุงดี'),
(9, 'บำรุงร่างกาย'),
(10, 'บำรุงหัวใจ');

-- --------------------------------------------------------

--
-- Table structure for table `nature`
--

CREATE TABLE `nature` (
  `Nat_ID` smallint(5) NOT NULL,
  `Nat_Nature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nature`
--

INSERT INTO `nature` (`Nat_ID`, `Nat_Nature`) VALUES
(2, 'ใบ\r\n'),
(3, 'ลำต้น\r\n'),
(4, 'ผล\r\n'),
(5, 'ดอก');

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE `system_admin` (
  `admin_ID` tinyint(2) NOT NULL,
  `admin_username` varchar(15) DEFAULT NULL,
  `admin_password` varchar(15) DEFAULT NULL,
  `admin_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `system_admin`
--

INSERT INTO `system_admin` (`admin_ID`, `admin_username`, `admin_password`, `admin_name`) VALUES
(1, 'admin', '1234', 'benz');

-- --------------------------------------------------------

--
-- Table structure for table `visit_disease`
--

CREATE TABLE `visit_disease` (
  `Vis_ID` int(5) NOT NULL,
  `Vis_Date` date NOT NULL,
  `Dis_ID` smallint(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit_disease`
--

INSERT INTO `visit_disease` (`Vis_ID`, `Vis_Date`, `Dis_ID`) VALUES
(1, '2018-10-08', 1),
(2, '2018-10-01', 1),
(3, '2018-10-17', 2),
(4, '2018-10-09', 3),
(5, '2018-10-10', 4),
(6, '2018-10-08', 5),
(7, '2018-10-31', 7),
(8, '2018-10-31', 0),
(9, '2018-10-31', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `count_herb`
--
ALTER TABLE `count_herb`
  ADD PRIMARY KEY (`Cou_IP`);

--
-- Indexes for table `count_view`
--
ALTER TABLE `count_view`
  ADD PRIMARY KEY (`Her_ID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`Dis_ID`);

--
-- Indexes for table `herb`
--
ALTER TABLE `herb`
  ADD PRIMARY KEY (`Her_ID`);

--
-- Indexes for table `herb_disease`
--
ALTER TABLE `herb_disease`
  ADD PRIMARY KEY (`Hd_ID`);

--
-- Indexes for table `herb_maintain`
--
ALTER TABLE `herb_maintain`
  ADD PRIMARY KEY (`Hm_ID`);

--
-- Indexes for table `herb_nature`
--
ALTER TABLE `herb_nature`
  ADD PRIMARY KEY (`Hn_ID`);

--
-- Indexes for table `maintain`
--
ALTER TABLE `maintain`
  ADD PRIMARY KEY (`Mai_ID`);

--
-- Indexes for table `nature`
--
ALTER TABLE `nature`
  ADD PRIMARY KEY (`Nat_ID`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `visit_disease`
--
ALTER TABLE `visit_disease`
  ADD PRIMARY KEY (`Vis_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `count_herb`
--
ALTER TABLE `count_herb`
  MODIFY `Cou_IP` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `Dis_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `herb`
--
ALTER TABLE `herb`
  MODIFY `Her_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `herb_disease`
--
ALTER TABLE `herb_disease`
  MODIFY `Hd_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `herb_maintain`
--
ALTER TABLE `herb_maintain`
  MODIFY `Hm_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `herb_nature`
--
ALTER TABLE `herb_nature`
  MODIFY `Hn_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `maintain`
--
ALTER TABLE `maintain`
  MODIFY `Mai_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nature`
--
ALTER TABLE `nature`
  MODIFY `Nat_ID` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `system_admin`
--
ALTER TABLE `system_admin`
  MODIFY `admin_ID` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visit_disease`
--
ALTER TABLE `visit_disease`
  MODIFY `Vis_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
