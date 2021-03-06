-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2018 at 07:08 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test2_tourgide`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `admin_lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `admin_email` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_firstname`, `admin_lastname`, `username`, `admin_email`) VALUES
(1, 'ปีติกาญจน์', 'ขันติทานต์', 'admin', 'pitikanmeen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `app`
--

CREATE TABLE `app` (
  `app_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `app_name_th` varchar(50) NOT NULL,
  `app_name_en` varchar(50) NOT NULL,
  `app_icon` varchar(20) NOT NULL,
  `app_splash` varchar(20) NOT NULL,
  `app_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `app_status` varchar(20) NOT NULL,
  `app_apk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `app`
--

INSERT INTO `app` (`app_id`, `customer_id`, `app_name_th`, `app_name_en`, `app_icon`, `app_splash`, `app_datetime`, `app_status`, `app_apk`) VALUES
(56, 3, 'นำเที่ยวองค์พระปฐมเจดีย์(ทดสอบ)', 'PhraPathommachediguideTest', 'icon_app.png', 'splash_app.jpg', '2018-04-30 01:53:00', 'draft', ''),
(64, 3, 'พระราชวังสนามจันทร์', 'sanamchandaraplace', 'icon_app.jpg', 'splash_app.jpg', '2018-05-28 04:43:12', 'draft', ''),
(68, 3, 'นำเที่ยวกรุงศรีอยุธยา', 'AyuthayaTour', 'icon_app.jpeg', 'splash_app.jpg', '2018-05-28 04:43:15', 'pending', ''),
(77, 6, 'นำเที่ยวองพระปฐมเจดีย์(ทดสอบ)', 'PrapathomchediGuideTest', 'icon_app.png', 'splash_app.jpg', '2018-05-28 04:43:17', 'draft', ''),
(78, 7, 'นำเที่ยวศิลปากร', 'silpakornguide', 'icon_app.png', 'splash_app.jpg', '2018-05-28 05:02:56', 'success', 'silpakornguide.apk'),
(79, 7, 'นำเที่ยวองค์พระปฐมเจดีย์', 'PrapathomchediGuide', 'icon_app.png', 'splash_app.jpg', '2018-05-28 04:43:24', 'pending', ''),
(80, 7, 'ไกดเ้่า', 'adsfghjk', 'icon_app.jpeg', 'splash_app.jpg', '2018-04-30 04:17:09', 'draft', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `customer_lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `customer_email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `customer_phone` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_firstname`, `customer_lastname`, `username`, `customer_email`, `customer_phone`) VALUES
(3, 'ปฏิภาณ', 'วัจนาภรณ์', 'customer', 'patipan1@gmail.com', '0832768091'),
(4, 'moss', 'wat', 'moss', 'abc@dec', '12346'),
(7, 'John', 'Brown', 'customer2', 'dsfdsf@dfdsf', '213213');

-- --------------------------------------------------------

--
-- Table structure for table `location_app`
--

CREATE TABLE `location_app` (
  `location_app_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `main_location_app_id` int(11) NOT NULL,
  `location_app_name` varchar(200) NOT NULL,
  `location_app_latitude` double NOT NULL,
  `location_app_longitude` double NOT NULL,
  `location_app_detail` text NOT NULL,
  `location_app_pic` varchar(200) NOT NULL,
  `location_app_more_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_app`
--

INSERT INTO `location_app` (`location_app_id`, `app_id`, `main_location_app_id`, `location_app_name`, `location_app_latitude`, `location_app_longitude`, `location_app_detail`, `location_app_pic`, `location_app_more_pic`) VALUES
(66, 56, 1, 'พระพุทธนรเชษฐ์(หลวงพ่อขาว)', 13.818991, 100.060201, 'พระพุทธนรเชษฐ์ ประดิษฐาน ณ ลานชั้นลด (กะเปาะ) ด้านทิศใต้ขององค์พระปฐมเจดีย์ สร้างในสมัยทวาราวดี (พ.ศ. ๑๑๐๐-๑๖๐๐) ชาวบ้านเรียกว่า \"พระขาว\" หรือ \"หลวงพ่อขาว\" มีลักษณะและขนาดเช่นเดียว กับหลวงพ่อประทานพรองค์ที่ประดิษฐานในพระอุโบสถ เดิมอยู่ที่โบราณสถานวัดทุ่งพระเมรุ นครปฐม อยู่ห่างจากองค์พระปฐมเจดีย์ไปทางทิศตะวันออกเฉียงใต้ประมาณสองกิโลเมตร เป็นองค์หนึ่งในจำนวน พระพุทธรูปศิลาขาว ๔ องค์ ซึ่งองค์อื่นๆประดิษฐาน ณ ที่ต่างๆดังนี้ พระพุทธรูปศิลาขาว หรือหลวงพ่อประธานพร เป็นพระพุทธรูปปางปฐมเทศนา ประทับอยู่ในพระอุโบสถ วัดพระปฐมเจดีย์ ,องค์ที่ 3 นำมาประดิษฐาน ณ พิพิธภัณฑสถานแห่งชาติ กรุงเทพมหานคร ,องค์ที่4 ประดิษฐานอยู่ที่ พิพิธภัณฑสถานแห่งชาติเจ้าสามพระยา จังหวัด พระนครศรีอยุธยา', 'poi66.jpg', ''),
(73, 56, 1, 'พระร่วงโรจนฤทธิ์', 13.820353991755397, 100.0600004196167, 'เมื่อ พ.ศ. 2451 พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว ครั้งยังทรงดำรงพระอิสริยยศเป็นสมเด็จพระบรมโอรสาธิราชฯ สยามมกุฎราชกุมาร ได้เสด็จประพาสหัวเมืองเหนือ ได้ทอดพระเนตรพระพุทธรูปเก่าแก่หลายองค์ โดยเฉพาะองค์หนึ่งที่เมืองศรีสัชนาลัย มีพุทธลักษณะงดงามต้องพระราชหฤทัย แต่องค์พระชำรุดเสียหายมาก ยังคงเหลืออยู่แต่พระเศียรกับพระหัตถ์ข้างหนึ่งและพระบาท พอสันนิษฐานได้ว่าเป็นปางห้ามญาติ จึงโปรดเกล้าฯ ให้อัญเชิญลงมากรุงเทพฯ แล้วใช้ช่างปั้นขึ้นให้เต็มองค์ ครั้นเมื่อพระองค์ได้เสด็จเถลิงถวัลราชสมบัติแล้ว ต่อมาในปี พ.ศ. 2454 จึงโปรดเกล้าฯ ให้พระเจ้าบรมวงศ์เธอ พระองค์เจ้ากฤษดาภินิหาร กรมพระนเรศร์วรฤทธิ์ เสนาบดีกระทรวงโยธาธิการ จัดทำประมาณการค่าใช้จ่ายในการหล่อปฏิสังขรณ์ และดำเนินการจัดหาช่างทำการปั้นหุ่นสถาปนาขึ้นให้บริบูรณ์เต็มองค์พระพุทธรูป เมื่อการปั้นพระพุทธรูปนั้นบริบูรณ์เสร็จ เป็นอันจะเททองหล่อได้แล้ว จึงโปรดเกล้าฯ ให้จัดการพระราชพิธีสถาปนาพระพุทธรูปพระองค์นั้น\nที่วัดพระเชตุพนวิมลมังคลารามราชวรมหาวิหาร ในวันที่ 30 ธันวาคม พ.ศ. 2456 ซึ่งเป็นกับวันเฉลิมพระชนมพรรษา หล่อเสร็จได้องค์พระสูงแต่พระบาทถึงพระเกศ 12 ศอก 4 นิ้ว แล้วโปรดเกล้าฯ ให้อัญเชิญออกจากกรุงเทพฯ ในเดือนมกราคม พ.ศ. 2457 เพื่อไปประดิษฐานยังพระวิหารพระปฐมเจดีย์ เจ้าพนักงานจัดการตกแต่งต่อมาจนแล้วเสร็จในวันที่ 2 พฤศจิกายน พ.ศ. 2458 ต่อมาวันที่ 26 กันยายน พ.ศ. 2466 ระหว่างประทับแรม ณ พลับพลาเจ้าเจ็ด อำเภอเสนา จังหวัดพระนครศรีอยุธยา ได้ทรงพระอนุสรณ์คำนึงถึงพระพุทธรูปองค์นี้ว่ายังไม่ได้สถาปนาพระนาม จึงประกาศกระแสพระบรมราชโองการเมื่อวันที่ 12 ตุลาคม พ.ศ. 2466 ถวายพระนามพระพุทธรูปองค์นี้ว่า \"พระร่วงโรจน์ฤทธิ์ ศรีอินทราทิตย์ธรรโมภาส มหาวชิราวุธราชบูชนิยบพิตร์', 'poi73.jpg', ''),
(74, 56, 1, 'สถูปจำลองพระปฐมเจดีย์องค์เก่า', 13.818883, 100.060554, 'ประวัติการสร้างพระปฐมเจดีย์นั้นไม่มีหลักฐานที่แน่ชัด แต่จากการพิจารณาจากพระเจดีย์องค์เดิมที่เป็นรูปคล้ายบาตรคว่ำ แบบเจดีย์สาญจีในอินเดีย ซึ่งสร้างในสมัยพระเจ้าอโศกมหาราช จึงมีผู้สันนิษฐานว่าพระเจดีย์องค์นี้อาจจะสร้างขึ้นในสมัยเดียวกัน แต่ทั้งนี้รูปลักษณะของพระเจดีย์องค์เดิมนั้น ก็จะเห็นได้ว่ามีการสร้างซ่อมแซมต่อเติมมาหลายยุคหลายสมัย นอกจากนั้น จากโบราณวัตถุและโบราณสถานที่พบมากในบริเวณนี้ อยู่ในสมัยทวารวดีประมาณพุทธศตวรรษที่ ๑๑-๑๖ จึงอาจสันนิษฐานได้ว่าอย่างน้อยที่สุดองค์พระปฐมเจดีย์คงจะมีอายุอยู่ในช่วงเวลานั้น อย่างไรก็ตาม ในสมัยที่พระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ ๔ ทรงผนวชอยู่นั้น ได้เสด็จธุดงค์มาที่นครปฐม และได้พบองค์พระสถูปเจดีย์ที่ปรักหักพัง ทรงสันนิษฐานว่าน่าจะเป็นเจดีย์องค์แรกสุดที่สร้างขึ้นในประเทศแถบนี้ จึงได้พระราชทานนามว่า ‘พระปฐมเจดีย์’ และความที่พระเจดีย์มีขนาดใหญ่ คือ สูง ๓๙ เมตร จึงทรงคิดว่าภายในน่าจะบรรจุพระบรมสารีริกธาตุ ดังนั้น เมื่อทรงขึ้นครองราชย์แล้ว จึงโปรดให้ก่อเป็นพระเจดีย์ใหญ่หุ้มองค์เจดีย์เดิมสูงประมาณ ๑๒๐ เมตร พร้อมทั้งสร้างวิหารทั้ง ๔ ทิศนั้นมีวิหารคตเชื่อมโดยรอบและมีพระพุทธรูปปางต่าง ๆ ประดิษฐานไว้ในวิหารด้วย และให้มีระเบียงล้อมรอบ รอบประกอบด้วยรูปจำลองพระปฐมเจดีย์อย่างองค์เก่าแต่ขนาดย่อกว่าไว้ทางทิศใต้ และพระเจดีย์อย่างเมืองนครศรีธรรมราชไว้ทางทิศตะวันตก หอระฆังด้านนอกพระระเบียง ๒๔ หอ พระอุโบสถ โรงธรรม อีกทั้งให้ปลูกต้นไม้ต่าง ๆ ล้วนแต่เกี่ยวกับพุทธประวัติ เช่น ต้นโพธิ์ ต้นไทร ต้นจิก ไว้รอบนอก แล้วโปรดสร้างพระราชวังที่ประทับไว้คู่กับวัด เรียกว่า วังปฐมนคร (ปัจจุบันเหลือแต่ตัวพระตำหนักเป็นที่ทำการเทศบาล จังหวัดนครปฐม) ต่อมาในสมัยรัชกาลที่ ๕ ได้เสด็จฯ มายกยอดพระปฐมเจดีย์ เมื่อ พ.ศ.๒๔๓๑ และโปรดให้ประดับกระเบื้องเคลือบสีทองพระมหาเจดีย์ทั้งองค์ ซึ่งงานทั้งหมดนั้นมาแล้วเสร็จในรัชกาลที่ ๖ ต่อจากนั้นก็มีการสร้างต่อเติมรายละเอียดต่าง ๆ อีกจนถึงสมัยรัชกาลที่ ๗', 'poi74.jpg', ''),
(75, 64, 6, 'อนุเสาวรีย์ย่าเหล', 13.819039988703459, 100.04594162106514, 'ย่าเหลเป็นสุนัขพันทาง ขนปุย หางเป็นพวง สีขาว มีแต้มดำ หูตก เกิดในเรือนจำจังหวัดนครปฐม เดิมเป็นสุนัขของหลวงไชยราษฎร์รักษา (โพ เคหะนันทน์) ตำแหน่งพะทำมะรงหรือผู้ควบคุมนักโทษ (ภายหลังได้รับพระราชทานบรรดาศักดิ์เป็น พระพุทธเกษตรานุรักษ์) เมื่อครั้งพระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว ยังดำรงพระยศเป็นพระบรมโอรสาธิราชฯ ได้เสด็จพระราชดำเนินไปตรวจเรือนจำจังหวัดนครปฐม และทอดพระเนตรเห็นสุนัขตัวนี้ และตรัสชมว่าน่าเอ็นดู หลวงชัยอาญาจึงน้อมเกล้าฯ ถวาย พระองค์จึงทรงรับมาเลี้ยง และพระราชทานนามว่า \"ย่าเหล\"\r\n\r\nสำหรับชื่อย่าเหลนั้น พระองค์ทรงตั้งจากชื่อตัวละครเอก เอมิล ยาร์เลต์ (Emile Jarlet) จากบทละครฝรั่งเศสเรื่อง \"My friend Jarlet\" ซึ่งได้ทรงพระราชนิพนธ์แปลเป็นบทละครภาษาไทย ชื่อ \"มิตรแท้\" และยังทรงพระราชนิพนธ์ละครพูดเรื่อง \"เพื่อนตาย\" ตามเค้าโครงภาษาอังกฤษด้วย', 'poi75.jpg', ''),
(97, 68, 11, 'วัดไชยวัฒนาราม ', 14.34297865994551, 100.5417251586914, 'วัดไชยวัฒนาราม เป็นวัดเก่าแก่สมัยอยุธยาตอนปลายในจังหวัดพระนครศรีอยุธยา สร้างขึ้นในช่วง พ.ศ.2173 โดยพระเจ้าปราสาททอง กษัตริย์อยุธยาในสมัยนั้น โปรดให้สร้างขึ้นเพื่อเป็นอนุสรณ์แห่งชัยชนะเหนือเขมร จึงทำให้มีรูปแบบทางสถาปัตยกรรมส่วนหนึ่งมาจากปราสาทนครวัด ภายในวัดมีสิ่งที่น่าสนใจมากมาย เช่น พระปรางค์ศรีรัตนมหาธาตุ เป็นปรางค์ประธานที่ตั้งอยู่บนฐานสี่เหลี่ยมจัตุรัส แต่ละมุมของฐานมีปรางค์ประจำทิศตั้งอยู่ด้วย ซึ่งเป็นลักษณะสถาปัตยกรรมแบบสมัยอยุธยาตอนต้น นอกจากนี้ก็ยังมีจุดอื่น ๆ ที่ห้ามพลาด อาทิ ระเบียงคด, พระอุโบสถ, เมรุ, ภาพปูนปั้น, พระประธาน เป็นต้น', 'poi97.jpg', 'poi97_1.jpg,poi97_2.jpg'),
(99, 68, 11, 'วัดพุทไธศวรรย์ ', 14.339247032034837, 100.558041036129, 'วัดพุทไธศวรรย์ เป็นพระอารามหลวงที่ใหญ่โต มีชื่อเสียงและสำคัญที่สุดในรัชสมัยสมเด็จพระรามาธิบดีที่ 1 หรือ พระเจ้าอู่ทอง สร้างขึ้นในบริเวณที่ซึ่งเป็นที่ตั้งพลับพลาที่ประทับเมื่อทรงอพยพมาตั้งอยู่ก่อนสถาปนากรุงศรีอยุธยาเป็นราชธานี ปัจจุบันเป็นวัดที่มีชื่อเสียงในเรื่ององค์พ่อจตุคามรามเทพ เป็นอีกหนึ่งสิ่งศักดิ์สิทธิ์ที่นักท่องเที่ยวนิยมมาสักการะ  จุดที่น่าสนใจภายในวัด คือ ปรางค์พระประธาน มีลักษณะเป็นสถาปัตยกรรมแบบขอมสีขาวสวยงาม สิ่งที่โดดเด่นภายในวัด นอกจากนี้ยังมี มณฑป 2 หลังที่อยู่ด้านข้างของปรางค์พระประธาน, พระอุโบสถ, หมู่พระเจดีย์สิบสององค์, วิหารพระนอน, พระตำหนักสมเด็จพระพุทธโฆษาจารย์, พระนอน เป็นต้น\r\n', 'poi99.jpeg', 'poi99_1.jpg,poi99_2.jpg'),
(101, 64, 6, 'fsdf', 13.81168017861726, 100.51326243554695, 'dfds', 'poi101.jpeg', ''),
(123, 77, 35, 'พระพุทธนรเชษฐ์(หลวงพ่อขาว)', 13.818991, 100.060201, 'พระพุทธนรเชษฐ์ ประดิษฐาน ณ ลานชั้นลด (กะเปาะ) ด้านทิศใต้ขององค์พระปฐมเจดีย์ สร้างในสมัยทวาราวดี (พ.ศ. ๑๑๐๐-๑๖๐๐) ชาวบ้านเรียกว่า \"พระขาว\" หรือ \"หลวงพ่อขาว\" มีลักษณะและขนาดเช่นเดียว กับหลวงพ่อประทานพรองค์ที่ประดิษฐานในพระอุโบสถ เดิมอยู่ที่โบราณสถานวัดทุ่งพระเมรุ นครปฐม อยู่ห่างจากองค์พระปฐมเจดีย์ไปทางทิศตะวันออกเฉียงใต้ประมาณสองกิโลเมตร เป็นองค์หนึ่งในจำนวน พระพุทธรูปศิลาขาว ๔ องค์ ซึ่งองค์อื่นๆประดิษฐาน ณ ที่ต่างๆดังนี้ พระพุทธรูปศิลาขาว หรือหลวงพ่อประธานพร เป็นพระพุทธรูปปางปฐมเทศนา ประทับอยู่ในพระอุโบสถ วัดพระปฐมเจดีย์ ,องค์ที่ 3 นำมาประดิษฐาน ณ พิพิธภัณฑสถานแห่งชาติ กรุงเทพมหานคร ,องค์ที่4 ประดิษฐานอยู่ที่ พิพิธภัณฑสถานแห่งชาติเจ้าสามพระยา จังหวัด พระนครศรีอยุธยา', 'poi123.jpg', 'poi123_1.jpg'),
(124, 77, 35, 'สถูปจำลองพระปฐมเจดีย์องค์เก่า', 13.818883, 100.060554, 'ประวัติการสร้างพระปฐมเจดีย์นั้นไม่มีหลักฐานที่แน่ชัด แต่จากการพิจารณาจากพระเจดีย์องค์เดิมที่เป็นรูปคล้ายบาตรคว่ำ แบบเจดีย์สาญจีในอินเดีย ซึ่งสร้างในสมัยพระเจ้าอโศกมหาราช จึงมีผู้สันนิษฐานว่าพระเจดีย์องค์นี้อาจจะสร้างขึ้นในสมัยเดียวกัน แต่ทั้งนี้รูปลักษณะของพระเจดีย์องค์เดิมนั้น ก็จะเห็นได้ว่ามีการสร้างซ่อมแซมต่อเติมมาหลายยุคหลายสมัย นอกจากนั้น จากโบราณวัตถุและโบราณสถานที่พบมากในบริเวณนี้ อยู่ในสมัยทวารวดีประมาณพุทธศตวรรษที่ ๑๑-๑๖ จึงอาจสันนิษฐานได้ว่าอย่างน้อยที่สุดองค์พระปฐมเจดีย์คงจะมีอายุอยู่ในช่วงเวลานั้น อย่างไรก็ตาม ในสมัยที่พระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ ๔ ทรงผนวชอยู่นั้น ได้เสด็จธุดงค์มาที่นครปฐม และได้พบองค์พระสถูปเจดีย์ที่ปรักหักพัง ทรงสันนิษฐานว่าน่าจะเป็นเจดีย์องค์แรกสุดที่สร้างขึ้นในประเทศแถบนี้ จึงได้พระราชทานนามว่า ‘พระปฐมเจดีย์’ และความที่พระเจดีย์มีขนาดใหญ่ คือ สูง ๓๙ เมตร จึงทรงคิดว่าภายในน่าจะบรรจุพระบรมสารีริกธาตุ ดังนั้น เมื่อทรงขึ้นครองราชย์แล้ว จึงโปรดให้ก่อเป็นพระเจดีย์ใหญ่หุ้มองค์เจดีย์เดิมสูงประมาณ ๑๒๐ เมตร พร้อมทั้งสร้างวิหารทั้ง ๔ ทิศนั้นมีวิหารคตเชื่อมโดยรอบและมีพระพุทธรูปปางต่าง ๆ ประดิษฐานไว้ในวิหารด้วย และให้มีระเบียงล้อมรอบ รอบประกอบด้วยรูปจำลองพระปฐมเจดีย์อย่างองค์เก่าแต่ขนาดย่อกว่าไว้ทางทิศใต้ และพระเจดีย์อย่างเมืองนครศรีธรรมราชไว้ทางทิศตะวันตก หอระฆังด้านนอกพระระเบียง ๒๔ หอ พระอุโบสถ โรงธรรม อีกทั้งให้ปลูกต้นไม้ต่าง ๆ ล้วนแต่เกี่ยวกับพุทธประวัติ เช่น ต้นโพธิ์ ต้นไทร ต้นจิก ไว้รอบนอก แล้วโปรดสร้างพระราชวังที่ประทับไว้คู่กับวัด เรียกว่า วังปฐมนคร (ปัจจุบันเหลือแต่ตัวพระตำหนักเป็นที่ทำการเทศบาล จังหวัดนครปฐม) ต่อมาในสมัยรัชกาลที่ ๕ ได้เสด็จฯ มายกยอดพระปฐมเจดีย์ เมื่อ พ.ศ.๒๔๓๑ และโปรดให้ประดับกระเบื้องเคลือบสีทองพระมหาเจดีย์ทั้งองค์ ซึ่งงานทั้งหมดนั้นมาแล้วเสร็จในรัชกาลที่ ๖ ต่อจากนั้นก็มีการสร้างต่อเติมรายละเอียดต่าง ๆ อีกจนถึงสมัยรัชกาลที่ ๗', 'poi124.jpg', 'poi124_1.JPEG'),
(125, 77, 35, 'พระร่วงโรจนฤทธิ์', 13.820353991755397, 100.0600004196167, 'เมื่อ พ.ศ. 2451 พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว ครั้งยังทรงดำรงพระอิสริยยศเป็นสมเด็จพระบรมโอรสาธิราชฯ สยามมกุฎราชกุมาร ได้เสด็จประพาสหัวเมืองเหนือ ได้ทอดพระเนตรพระพุทธรูปเก่าแก่หลายองค์ โดยเฉพาะองค์หนึ่งที่เมืองศรีสัชนาลัย มีพุทธลักษณะงดงามต้องพระราชหฤทัย แต่องค์พระชำรุดเสียหายมาก ยังคงเหลืออยู่แต่พระเศียรกับพระหัตถ์ข้างหนึ่งและพระบาท พอสันนิษฐานได้ว่าเป็นปางห้ามญาติ จึงโปรดเกล้าฯ ให้อัญเชิญลงมากรุงเทพฯ แล้วใช้ช่างปั้นขึ้นให้เต็มองค์ ครั้นเมื่อพระองค์ได้เสด็จเถลิงถวัลราชสมบัติแล้ว ต่อมาในปี พ.ศ. 2454 จึงโปรดเกล้าฯ ให้พระเจ้าบรมวงศ์เธอ พระองค์เจ้ากฤษดาภินิหาร กรมพระนเรศร์วรฤทธิ์ เสนาบดีกระทรวงโยธาธิการ จัดทำประมาณการค่าใช้จ่ายในการหล่อปฏิสังขรณ์ และดำเนินการจัดหาช่างทำการปั้นหุ่นสถาปนาขึ้นให้บริบูรณ์เต็มองค์พระพุทธรูป เมื่อการปั้นพระพุทธรูปนั้นบริบูรณ์เสร็จ เป็นอันจะเททองหล่อได้แล้ว จึงโปรดเกล้าฯ ให้จัดการพระราชพิธีสถาปนาพระพุทธรูปพระองค์นั้น\r\nที่วัดพระเชตุพนวิมลมังคลารามราชวรมหาวิหาร ในวันที่ 30 ธันวาคม พ.ศ. 2456 ซึ่งเป็นกับวันเฉลิมพระชนมพรรษา หล่อเสร็จได้องค์พระสูงแต่พระบาทถึงพระเกศ 12 ศอก 4 นิ้ว แล้วโปรดเกล้าฯ ให้อัญเชิญออกจากกรุงเทพฯ ในเดือนมกราคม พ.ศ. 2457 เพื่อไปประดิษฐานยังพระวิหารพระปฐมเจดีย์ เจ้าพนักงานจัดการตกแต่งต่อมาจนแล้วเสร็จในวันที่ 2 พฤศจิกายน พ.ศ. 2458 ต่อมาวันที่ 26 กันยายน พ.ศ. 2466 ระหว่างประทับแรม ณ พลับพลาเจ้าเจ็ด อำเภอเสนา จังหวัดพระนครศรีอยุธยา ได้ทรงพระอนุสรณ์คำนึงถึงพระพุทธรูปองค์นี้ว่ายังไม่ได้สถาปนาพระนาม จึงประกาศกระแสพระบรมราชโองการเมื่อวันที่ 12 ตุลาคม พ.ศ. 2466 ถวายพระนามพระพุทธรูปองค์นี้ว่า \"พระร่วงโรจน์ฤทธิ์ ศรีอินทราทิตย์ธรรโมภาส มหาวชิราวุธราชบูชนิยบพิตร์', 'poi125.jpg', 'poi125_1.jpg'),
(126, 56, 1, 'sadsadasd', 13.743746437559938, 100.55940481250627, 'sadsadasda', 'poi126.jpg', ''),
(127, 78, 36, 'คณะอักษรศาสตร์', 13.817077, 100.039962, 'คณะอักษรศาสตร์จัดตั้งขึ้นเมื่อ พ.ศ. 2511 เป็นคณะวิชาลำดับที่ 5 และเป็นคณะวิชาแรกของวิทยาเขตแห่งใหม่ คือ วิทยาเขตพระราชวังสนามจันทร์ ณ จังหวัดนครปฐม โดยศาสตราจารย์หม่อมหลวงปิ่น มาลากุล ซึ่งขณะนั้นดำรงตำแหน่งอธิการบดี มหาวิทยาลัยศิลปากร ซึ่งสาขาวิชาที่เปิดสอนระดับปริญญาบัณฑิตได้แก่\r\nสาขาวิชาการแสดงศึกษา\r\nสาขาวิชาประวัติศาสตร์ \r\nสาขาวิชาปรัชญา \r\nสาขาวิชาภาษาไทย \r\nสาขาวิชาภาษาเอเชียตะวันออก \r\nสาขาวิชาภาษาฝรั่งเศส \r\nสาขาวิชาภาษาเยอรมัน \r\nสาขาวิชาภาษาอังกฤษ \r\nสาขาวิชาภูมิศาสตร์ \r\nสาขาวิชาสังคมศาสตร์การพัฒนา \r\nสาขาวิชาสารสนเทศศาสตร์และบรรณารักษศาสตร์ \r\nสาขาวิชาสังคีตศิลป์ไทย \r\nสาขาวิชาเอเชียศึกษา', 'poi127.jpg', 'poi127_1.jpg'),
(128, 78, 36, 'คณะศึกษาศาสตร์', 13.81785, 100.043612, 'คณะศึกษาศาสตร์ ได้ก่อตั้งเมื่อวันที่ 18 มิถุนายน พ.ศ. 2513 เป็นคณะวิชาลำดับที่ 6 ของมหาวิทยาลัยศิลปากร และเป็นคณะวิชาลำดับที่ 2 ของวิทยาเขตพระราชวังสนามจันทร์ โดยมี ศาสตราจารย์หม่อมหลวงปิ่น มาลากุล อธิการบดีของมหาวิทยาลัยศิลปากรในขณะนั้น ดำรงตำแหน่งรักษาการคณบดีคนแรกของคณะฯ ซึ่งสาขาวิชาที่เปิดสอน\r\nระดับปริญญาบัณฑิต หลักสูตรการศึกษา 5 ปี ได้แก่\r\nสาขาวิชาการประถมศึกษา\r\nสาขาวิชาการศึกษาปฐมวัย\r\nสาขาวิชาภาษาไทย\r\nสาขาวิชาภาษาอังกฤษ\r\nสาขาวิชาสังคมศึกษา\r\nสาขาวิชาการสอนภาษาจีนในฐานะภาษาต่างประเทศ\r\nระดับปริญญาบัณฑิต หลักสูตรการศึกษา 4 ปี ได้แก่\r\nสาขาวิชาเทคโนโลยีการศึกษา\r\nสาขาวิชาการศึกษาตลอดชีวิต\r\nสาขาวิชาจิตวิทยา\r\nสาขาวิชาวิทยาศาสตร์การกีฬา', 'poi128.jpg', ''),
(129, 78, 36, 'คณะเภสัชศาสตร์', 13.818098, 100.038359, 'คณะเภสัชศาสตร์ ก่อตั้งขึ้นในปี พ.ศ. 2528 และเปิดรับนักศึกษารุ่นแรก ตั้งแต่ปีการศึกษา 2529 นับเป็นคณะเภสัชศาสตร์ลำดับที่ 6 ของประเทศไทย โดยมีเภสัชกร รองศาสตราจารย์ ดร.ประโชติ เปล่งวิทยา ดำรงตำแหน่งคณบดี เป็นคณบดีผู้ประศาสน์การคนแรกและเป็นผู้ก่อตั้งคณะเภสัชศาสตร์ มหาวิทยาลัยศิลปากร ซึ่งเป็นผู้ริเริ่มให้มีการจัดการศึกษาสาขาเภสัชศาสตร์ ให้ดำเนินไปในทิศทางแผนใหม่และมีความทันสมัย คณะเภสัชศาสตร์เน้นการผลิตบัณฑิตให้มีความรู้ความสามารถด้านวิชาการและทักษะทางวิชาชีพ กอปรด้วยคุณธรรม จริยธรรม รับผิดชอบต่อสังคม สาขาวิชาที่เปิดสอนระดับปริญญาบัณฑิตคือสาขาวิชาเภสัชศาสตร์มีทั้งหมด 8 ภาควิชาได้แก่\r\nภาควิชาชีวเภสัชศาสตร์\r\nภาควิชาเภสัชกรรม\r\nภาควิชาเภสัชกรรมชุมชน\r\nภาควิชาเภสัชเคมี\r\nภาควิชาเภสัชวิทยาและพิษวิทยา\r\nภาควิชาเภสัชเวท\r\nภาควิชาเทคโนโลยีเภสัชกรรม\r\nภาควิชาสารสนเทศศาสตร์ทางสุขภาพ', 'poi129.jpg', ''),
(130, 78, 36, 'คณะวิศวะกรรมศาสตร์', 13.820108, 100.037739, 'คณะวิศวกรรมศาสตร์และเทคโนโลยีอุตสาหกรรม ได้จัดตั้งขึ้นเมื่อ ปี พ.ศ. 2534 เพื่อให้มหาวิทยาลัยมีการขยายการเรียนการสอนในสาขาวิทยาศาสตร์ประยุกต์ เทคโนโลยีและวิศวกรรม มีวัตถุประสงค์หลักในการพัฒนาทรัพยากรมนุษย์ ให้มีความรู้ความสามารถและทักษะในสาขาวิทยาศาสตร์ประยุกต์และวิศวกรรมศาสตร์ เพื่อรองรับการขยายตัวของภาคอุตสาหกรรมในประเทศไทย ซึ่งสาขาวิชาที่เปิดสอนระดับปริญญาบัณฑิตได้แก่\r\nสาขาวิชาปิโตรเคมีและวัสดุพอลิเมอร์ \r\nสาขาวิชาวิศวกรรมอุตสาหการ \r\nสาขาวิชาวิศวกรรมเครื่องกล \r\nสาขาวิชาวิศวกรรมเคมี \r\nสาขาวิชาวิศวกรรมอิเล็กทรอนิกส์และระบบคอมพิวเตอร์ \r\nสาขาวิชาวิศวกรรมการจัดการและโลจิสติกส์ \r\nสาขาวิชาวัสดุขั้นสูงและนาโนเทคโนโลยี \r\nสาขาวิชาวิศวกรรมกระบวนการชีวภาพ \r\nสาขาวิชาเทคโนโลยีอาหาร \r\nสาขาวิชาเทคโนโลยีชีวภาพ \r\nสาขาวิชาธุรกิจวิศวกรรม', 'poi130.jpg', ''),
(131, 78, 36, 'คณะวิทยาศาสตร์', 13.819245, 100.040972, 'คณะวิทยาศาสตร์ มหาวิทยาลัยศิลปากร (อังกฤษ: Faculty of Science, Silpakorn University) ก่อตั้งขึ้นเมื่อปี พ.ศ. 2515 เป็นคณะที่ 7 ของมหาวิทยาลัยศิลปากร และเป็นคณะวิชาแรกของมหาวิทยาลัยที่เปิดสอนด้านวิทยาศาสตร์ โดยเล็งเห็นถึงความจำเป็นและความก้าวหน้าของวิทยาศาสตร์และเทคโนโลยีในอนาคต ระยะแรกได้เปิดสอนระดับปริญญาบัณฑิตเพียง 3 สาขาวิชา ต่อมาได้เปิดสอนสาขาวิชาต่าง ๆ เพิ่มขึ้นอีก เพื่อให้ครอบคลุมวิทยาศาสตร์พื้นฐานทุกสาขาวิชาทั้งในระดับปริญญาบัณฑิต ระดับปริญญามหาบัณฑิต และระดับปริญญาดุษฎีบัณฑิต การจัดการเรียนการสอนของคณะวิทยาศาสตร์ จึงสอดคล้องกับนโยบายรัฐบาลในการเร่งรัดผลิตบัณฑิตสาขาวิชาต่าง ๆ เพื่อตอบสนองความต้องการกำลังคนทางด้านวิทยาศาสตร์และเทคโนโลยีของประเทศ\r\n	 คณะวิทยาศาสตร์ทำงานวิจัยในแขนงต่าง ๆ ซึ่งมีความสำคัญต่อการพัฒนาประเทศในหลายด้าน อาทิ การวิจัยเพื่อนำพลังงานแสงอาทิตย์มาใช้ประโยชน์อย่างมีประสิทธิภาพในการเกษตรและอุตสาหกรรม การวิจัยด้านวัสดุศาสตร์และเทคโนโลยีฟิล์มบาง การวิจัยด้านออปโตอิเล็กทรอนิกส์ การวิจัยด้านฟิสิกส์บรรยากาศ และผลิตภัณฑ์ธรรมชาติ ศึกษาวิจัยตัวเร่งปฏิกิริยาเคมีและตัวเร่งปฏิกิริยาชีวภาพ ซึ่งมีบทบาทสำคัญในการสังเคราะห์สารชนิดต่าง ๆ และงานวิจัยด้านอื่น ๆ ที่น่าสนใจ และยังเป็นศูนย์กลางการพัฒนาครู–นักเรียนทางวิทยาศาสตร์และคณิตศาสตร์ของโรงเรียนในพื้นที่ภูมิภาคตะวันตก และแหล่งบริการวิชาการ การตรวจวิเคราะห์ด้วยกระบวนการทางวิทยาศาสตร์ การใช้สถิติประยุกต์และระบบคอมพิวเตอร์เก็บและวินิจฉัยข้อมูลด้านวิทยาศาสตร์สิ่งแวดล้อมและศิลปวัฒนธรรมของภูมิภาคตะวันตก ตลอดจนจัดให้มีการประชุมสัมมนา การอบรม การบรรยายพิเศษ และการจัดงานสัปดาห์วิทยาศาสตร์', 'poi131.jpg', 'poi131_1.jpg'),
(132, 79, 37, 'พระพุทธนรเชษฐ์ ศิลปะทวารวดี', 13.818991, 100.060201, 'พระพุทธนรเชษฐ์ ประดิษฐาน ณ ลานชั้นลด (กะเปาะ) ด้านทิศใต้ขององค์พระปฐมเจดีย์ สร้างในสมัยทวาราวดี (พ.ศ. ๑๑๐๐-๑๖๐๐) ชาวบ้านเรียกว่า \"พระขาว หรือ \"หลวงพ่อขาว\" มีลักษณะและขนาดเช่นเดียว กับหลวงพ่อประทานพรองค์ที่ประดิษฐานในพระอุโบสถ เดิมอยู่ที่โบราณสถานวัดทุ่งพระเมรุ นครปฐม อยู่ห่างจากองค์พระปฐมเจดีย์ไปทางทิศตะวันออกเฉียงใต้ประมาณสองกิโลเมตร เป็นองค์หนึ่งในจำนวน พระพุทธรูปศิลาขาว ๔ องค์ ซึ่งองค์อื่นๆประดิษฐาน ณ ที่ต่างๆดังนี้ พระพุทธรูปศิลาขาว หรือหลวงพ่อประธานพร เป็นพระพุทธรูปปางปฐมเทศนา ประทับอยู่ในพระอุโบสถ วัดพระปฐมเจดีย์ ,องค์ที่ 3 นำมาประดิษฐาน ณ พิพิธภัณฑสถานแห่งชาติ กรุงเทพมหานคร ,องค์ที่4 ประดิษฐานอยู่ที่ พิพิธภัณฑสถานแห่งชาติเจ้าสามพระยา จังหวัด พระนครศรีอยุธยา', 'poi132.jpg', 'poi132_1.jpg,poi132_2.jpg'),
(133, 79, 37, 'สถูปจำลองพระปฐมเจดีย์องค์เก่า', 13.818883, 100.060554, 'ประวัติการสร้างพระปฐมเจดีย์นั้นไม่มีหลักฐานที่แน่ชัด แต่จากการพิจารณาจากพระเจดีย์องค์เดิมที่เป็นรูปคล้ายบาตรคว่ำ แบบเจดีย์สาญจีในอินเดีย ซึ่งสร้างในสมัยพระเจ้าอโศกมหาราช จึงมีผู้สันนิษฐานว่าพระเจดีย์องค์นี้อาจจะสร้างขึ้นในสมัยเดียวกัน แต่ทั้งนี้รูปลักษณะของพระเจดีย์องค์เดิมนั้น ก็จะเห็นได้ว่ามีการสร้างซ่อมแซมต่อเติมมาหลายยุคหลายสมัย นอกจากนั้น จากโบราณวัตถุและโบราณสถานที่พบมากในบริเวณนี้ อยู่ในสมัยทวารวดีประมาณพุทธศตวรรษที่ ๑๑-๑๖ จึงอาจสันนิษฐานได้ว่าอย่างน้อยที่สุดองค์พระปฐมเจดีย์คงจะมีอายุอยู่ในช่วงเวลานั้น อย่างไรก็ตาม ในสมัยที่พระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ ๔ ทรงผนวชอยู่นั้น ได้เสด็จธุดงค์มาที่นครปฐม และได้พบองค์พระสถูปเจดีย์ที่ปรักหักพัง ทรงสันนิษฐานว่าน่าจะเป็นเจดีย์องค์แรกสุดที่สร้างขึ้นในประเทศแถบนี้ จึงได้พระราชทานนามว่า ‘พระปฐมเจดีย์’ และความที่พระเจดีย์มีขนาดใหญ่ คือ สูง ๓๙ เมตร จึงทรงคิดว่าภายในน่าจะบรรจุพระบรมสารีริกธาตุ ดังนั้น เมื่อทรงขึ้นครองราชย์แล้ว จึงโปรดให้ก่อเป็นพระเจดีย์ใหญ่หุ้มองค์เจดีย์เดิมสูงประมาณ ๑๒๐ เมตร พร้อมทั้งสร้างวิหารทั้ง ๔ ทิศนั้นมีวิหารคตเชื่อมโดยรอบและมีพระพุทธรูปปางต่าง ๆ ประดิษฐานไว้ในวิหารด้วย และให้มีระเบียงล้อมรอบ รอบประกอบด้วยรูปจำลองพระปฐมเจดีย์อย่างองค์เก่าแต่ขนาดย่อกว่าไว้ทางทิศใต้ และพระเจดีย์อย่างเมืองนครศรีธรรมราชไว้ทางทิศตะวันตก หอระฆังด้านนอกพระระเบียง ๒๔ หอ พระอุโบสถ โรงธรรม อีกทั้งให้ปลูกต้นไม้ต่าง ๆ ล้วนแต่เกี่ยวกับพุทธประวัติ เช่น ต้นโพธิ์ ต้นไทร ต้นจิก ไว้รอบนอก แล้วโปรดสร้างพระราชวังที่ประทับไว้คู่กับวัด เรียกว่า วังปฐมนคร (ปัจจุบันเหลือแต่ตัวพระตำหนักเป็นที่ทำการเทศบาล จังหวัดนครปฐม) ต่อมาในสมัยรัชกาลที่ ๕ ได้เสด็จฯ มายกยอดพระปฐมเจดีย์ เมื่อ พ.ศ.๒๔๓๑ และโปรดให้ประดับกระเบื้องเคลือบสีทองพระมหาเจดีย์ทั้งองค์ ซึ่งงานทั้งหมดนั้นมาแล้วเสร็จในรัชกาลที่ ๖ ต่อจากนั้นก็มีการสร้างต่อเติมรายละเอียดต่าง ๆ อีกจนถึงสมัยรัชกาลที่ ๗', 'poi133.jpg', 'poi133_1.jpg,poi133_2.JPEG'),
(134, 80, 38, 'กหกหฟกหกหก', 13.669032254549172, 100.96589895313127, 'ฟหกหฟกหฟ', 'poi134.png', 'poi134_1.jpg'),
(135, 80, 38, 'กหดกหดก', 13.925096004099732, 101.41633840625627, 'ดกหดกหดกหด', 'poi135.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `main_location_app`
--

CREATE TABLE `main_location_app` (
  `main_location_app_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `main_location_app_name` varchar(200) NOT NULL,
  `main_location_app_pic` varchar(200) NOT NULL,
  `main_location_app_latitude` double NOT NULL,
  `main_location_app_longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_location_app`
--

INSERT INTO `main_location_app` (`main_location_app_id`, `app_id`, `main_location_app_name`, `main_location_app_pic`, `main_location_app_latitude`, `main_location_app_longitude`) VALUES
(1, 56, 'พระปฐมเจดีย์', 'mpoi1.png', 13.819861729835207, 100.060054063797),
(2, 56, 'มหาวิทยาลัยศิลปากร นครปฐม', 'mpoi2.jpg', 13.818973572098663, 100.04605293273926),
(6, 64, 'พระราชวังสนามจันทร์', 'mpoi6.jpeg', 13.818957944659502, 100.04606902599335),
(11, 68, 'กรุงศรีอยุธยา', 'mpoi11.jpg', 14.3566312, 100.58301080000001),
(35, 77, 'พระปฐมเจดีย์', 'mpoi35.png', 13.81986433439837, 100.060054063797),
(36, 78, 'มหาวิทยาลัยศิลปากร สนามจันทร์', 'mpoi36.jpg', 13.816924, 100.04115),
(37, 79, 'พระปฐมเจดีย์', 'mpoi37.png', 13.81986433439837, 100.060054063797),
(38, 80, 'หกหฟกหฟกฟ', 'mpoi38.jpeg', 13.686111837673797, 100.92195364063127);

-- --------------------------------------------------------

--
-- Table structure for table `question_app`
--

CREATE TABLE `question_app` (
  `question_app_id` int(11) NOT NULL,
  `location_app_id` int(11) NOT NULL,
  `question_app_type` int(1) NOT NULL,
  `question_app_text` text NOT NULL,
  `question_app_choice` text NOT NULL,
  `question_app_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `question_app`
--

INSERT INTO `question_app` (`question_app_id`, `location_app_id`, `question_app_type`, `question_app_text`, `question_app_choice`, `question_app_answer`) VALUES
(33, 66, 1, 'พระพุทธนรเชษฐ์ ณ ลานชั้นลด (กะเปาะ) ด้านทิศใต้ขององค์พระปฐมเจดีย์ เป็นพระพุทธรูปสมัยใด', 'สมัยทวารวดี_สมัยศรีวิชัย_สมัยลพบุรี_สมัยอู่ทอง', 'สมัยทวารวดี'),
(34, 73, 2, 'พระศิลาขาว ในพระปฐมเจดีย์มีกี่องค์', '1 องค์_2 องค์', '2 องค์'),
(38, 74, 4, 'ABCD', 'B_C_A_D', 'A_B_C_D'),
(39, 66, 2, 'ใช่พระหรือเปล่า\"?\"', 'พระ_ไม่ใช่พระ', 'พระ'),
(40, 75, 4, 'ย่าเหล สุนัขทรงเลี้ยงของใคร 1150', 'ร.2_ร.3_ร.5_ร.6', 'ร.6'),
(56, 97, 2, 'วัดไชยเป็นวัดไหม', 'วัด_โบสถ์', 'วัด'),
(58, 99, 2, 'ใช่พระหรือไม่', 'ใชพระ_ไม่ใช่พระ', 'ใชพระ'),
(65, 123, 1, 'พระพุทธนรเชษฐ์ ณ ลานชั้นลด (กะเปาะ) ด้านทิศใต้ขององค์พระปฐมเจดีย์ เป็นพระพุทธรูปสมัยใด', 'สมัยทวารวดี_สมัยศรีวิชัย_สมัยลพบุรี_สมัยอู่ทอง', 'สมัยทวารวดี'),
(66, 123, 2, 'พระศิลาขาว ในพระปฐมเจดีย์มีกี่องค์', '1 องค์_2 องค์', '2 องค์'),
(67, 123, 1, 'พระพุทธนรเชษฐ์ ณ ลานชั้นลด (กะเปาะ)เดิมอยู่ที่โบราณสถานใด', 'พระวิหารเมนดุต จันทิเมนดุต อินโดนีเซีย_วัดพระยากง อยุธยา_วัดทุ่งพระเมรุ นครปฐม_วัดหน้าพระเมรุ อยุธยา', 'วัดทุ่งพระเมรุ นครปฐม'),
(68, 124, 1, 'พระปฐมเจดีย์องค์ใหญ่หุ้มองค์เก่าไว้ด้านในรวมองค์ปัจจุบันทั้งหมดกี่ชั้น', '1 ชั้น_2 ชั้น_3 ชั้น_4 ชั้น', '3 ชั้น'),
(69, 124, 1, 'สถูปจําลองพระปฐมเจดีย์องค์เก่า อยู่ทางทิศใดของพระปฐมเจดีย์', 'ทิศเหนือ_ทิศตะวันตก_ทิศตะวันออก_ทิศใต้', 'ทิศใต้'),
(70, 124, 1, 'ในสมัยที่พระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว รัชกาลที่ ๔ ได้พบองค์พระสถูปเจดีย์ขนาดใหญ่ความสูงกี่เมตร', '20 เมตร_39 เมตร_55 เมตร_87 เมตร', '39 เมตร'),
(71, 125, 1, 'พระร่วงโรจนฤทธิ์เป็นพระพุทธรูปปางอะไร', 'ปางประทานพร_ปางห้ามญาติ_ปางปรินิพพาน_ปางอุ้มบาตร', 'ปางห้ามญาติ'),
(72, 125, 2, 'ใต้ฐานพระร่วงโรจนฤทธิ์บรรจุพระบรมราชสรีรางคารของพระมหากษัตริย์รัชสมัยใด', 'พระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัว_พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว', 'พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว'),
(73, 125, 3, 'พระร่วงโรจนฤทธิ์ได้รับการปั้นและหล่อขึ้นใหม่จนแล้วเสร็จ ในช่วงรัชสมัยใดบ้าง', 'พระบาทสมเด็จพระจอมเกล้าเจ้าอยู่หัว_พระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัว_พระบาทสมเด็จพระปกเกล้าเจ้าอยู่หัว_พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว', 'พระบาทสมเด็จพระจุลจอมเกล้าเจ้าอยู่หัว_พระบาทสมเด็จพระมงกุฎเกล้าเจ้าอยู่หัว'),
(74, 125, 4, 'จงลำดับเหตุการณ์ความเป็นมาของพระร่วงโรจนฤทธิ์', 'ร.6ถวายพระนามพระพุทธรูป_ร.6พบพระร่วงโรจนฤทธิ์_ร.6สถาปนาพระพุทธรูปที่วัดพระเชตุพน_บรรจุพระบรมราชสรีรางคาร ร.6ใต้ฐานพระ', 'ร.6พบพระร่วงโรจนฤทธิ์_ร.6สถาปนาพระพุทธรูปที่วัดพระเชตุพน_ร.6ถวายพระนามพระพุทธรูป_บรรจุพระบรมราชสรีรางคาร ร.6ใต้ฐานพระ'),
(75, 127, 1, 'หลักสูตรอักษรศาสตรบัณฑิต มีทั้งหมด กี่ หลักสูตรหลักสูตร', '8 หลักสูตร_10 หลักสูตร_12 หลักสูตร_15 หลักสูตร', '12 หลักสูตร'),
(76, 127, 1, 'ข้อใดไม่ใช่สาขาในคณะอักษรศาสตร์', 'สาขาวิชาภาษาเยอรมัน_สาขาวิชาภาษาอาหรับ_สาขาวิชาประวัติศาสตร์_สาขาวิชาภูมิศาสตร์', 'สาขาวิชาภาษาอาหรับ'),
(77, 128, 2, 'คณะศึกษาศาสตร์เป็นคณะวิชาลำดับที่ 6 ของมหาวิทยาลัยศิลปากร', 'ใช่_ไม่ใช่', 'ใช่'),
(78, 128, 1, 'ข้อใดไม่ใช่สาขาวิชาที่เปิดสอนในคณะศึกษาศาสตร์', 'สาขาวิชาการศึกษาปฐมวัย_สาขาวิชาจิตวิทยา_สาขาวิชาภูมิศาสตร์_สาขาวิชาภาษาอังกฤษ', 'สาขาวิชาภูมิศาสตร์'),
(79, 128, 1, 'ในระดับปริญญาบัณฑิตมีกี่สาขาวิชา', '8_10_12_15', '10'),
(80, 128, 2, 'ในระดับปริญญาบัณฑิตมีหลักสูตรการศึกษา 4 ปี  และ 5 ปี', 'ใช่_ไม่ใช่', 'ใช่'),
(81, 129, 1, 'คณะเภสัชศาสตร์มีกี่ภาควิชา', '6_8_10_12', '8'),
(82, 129, 1, 'ข้อใดไม่ใช่ภาควิชาของคณะเภสัชศาสตร์', 'ภาควิชาเภสัชกรรมชุมชน_ภาควิชาเภสัชกรรม_ภาควิชาสารสนเทศศาสตร์ทางสุขภาพ_ภาควิชาเภสัชกรรมคลินิก', 'ภาควิชาเภสัชกรรมคลินิก'),
(83, 129, 1, 'ข้อใดเกี่ยวข้อกับภาควิชาเภสัชเวท', 'ยา อาหาร และเครื่องสำอางที่ได้จากธรรมชาติ_ใช้ความรู้ด้านสังคมศาสตร์ เศรษฐศาสตร์_การเผยแพร่ข้อมูลยาและสุขภาพ_พยาธิวิทยา และจุลชีววิทยา', 'ยา อาหาร และเครื่องสำอางที่ได้จากธรรมชาติ'),
(84, 130, 1, 'ข้อใดไม่ใช่ภาควิชาในคณะวิศวกรรมศาสตร์', 'ภาควิชาเทคโนโลยีอาหาร_ภาควิชาวิศวกรรมเคมี_ภาควิชาเทคโนโลยีอัญมณี_ภาควิชาวิศวกรรมไฟฟ้า', 'ภาควิชาเทคโนโลยีอัญมณี'),
(85, 130, 2, 'คณะวิศวกรรมศาสตร์ มีทั้งหมดกี่ตึก', '1 ตึก_2 ตึก', '1 ตึก'),
(86, 131, 1, 'คณะวิทยาศาสตร์มีสีประจำคณะสีอะไร', 'เหลืองจำปาทอง_ชมพูอมแดง_ฟ้า_แดง', 'เหลืองจำปาทอง'),
(87, 131, 2, 'คณะวิทยาศาสตร์ศิลปากรมีเฉพาะที่วิทยาเขตพระราชวังสนามจันทร์', 'ถูกต้อง มีเพียงวิทยาเขตเดียว_ผิด คณะวิทยาศาสตร์มีที่วิทยาเขตท่าพระและพระราชวังสนามจันทร์', 'ถูกต้อง มีเพียงวิทยาเขตเดียว'),
(88, 131, 4, 'จงเรียงลำดับการก่อตั้งภาควิชาในคณะวิทยาศาสตร์', 'ภาควิชาคอมพิวเตอร์_ภาควิชาเคมี_ภาควิชาชีวะ_ภาควิชาคณิตศาสตร์', 'ภาควิชาคณิตศาสตร์_ภาควิชาชีวะ_ภาควิชาเคมี_ภาควิชาคอมพิวเตอร์'),
(89, 131, 3, 'คณะวิทยาศาสตร์มีภาควิชาใดบ้าง', 'ภาควิชาวิศวะเครื่องกล_ภาควิชาคอมพิวเตอร์_ภาควิชาโบราณคดี_ภาควิชาสถิติ', 'ภาควิชาคอมพิวเตอร์_ภาควิชาสถิติ'),
(90, 132, 4, 'น้อยไปมาก', '4_2_3_1', '1_2_3_4'),
(91, 132, 2, 'พระศิลาขาว ในพระปฐมเจดีย์มีกี่องค์', '1_2', '2'),
(92, 132, 1, 'พระพุทธนรเชษฐ์ ณ ลานชั้นลด (กะเปาะ)เดิมอยู่ที่โบราณสถานใด', 'พระวิหารเมนดุต จันทิเมนดุต อินโดนีเซีย_วัดพระยากง อยุธยา_วัดทุ่งพระเมรุ นครปฐม_วัดหน้าพระเมรุ อยุธยา', 'วัดทุ่งพระเมรุ นครปฐม'),
(93, 132, 3, 'เลือกจำนวนคู่', '2_1_6_5', '2_6'),
(94, 133, 1, 'พระปฐมเจดีย์องค์ใหญ่หุ้มองค์เก่าไว้ด้านในรวมองค์ปัจจุบันทั้งหมดกี่ชั้น', '1 ชั้น_2 ชั้น_3 ชั้น_4 ชั้น', '3 ชั้น'),
(95, 133, 2, 'สถูปจําลองพระปฐมเจดีย์องค์เก่า อยู่ทางทิศใด', 'ทิศเหนือ_ทิศใต้', 'ทิศใต้'),
(96, 134, 1, 'หฟกหฟกหฟก', 'กหกฟหกห_กหฟกห_ฟกหฟกหฟก_หฟกหฟกฟหก', 'กหกฟหกห'),
(97, 135, 2, 'ผิดไหม', 'ถูก_ผิด', 'ผิด');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 'customer', '202cb962ac59075b964b07152d234b70'),
(3, 'customer2', '202cb962ac59075b964b07152d234b70'),
(4, 'moss', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `app`
--
ALTER TABLE `app`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `location_app`
--
ALTER TABLE `location_app`
  ADD PRIMARY KEY (`location_app_id`);

--
-- Indexes for table `main_location_app`
--
ALTER TABLE `main_location_app`
  ADD PRIMARY KEY (`main_location_app_id`);

--
-- Indexes for table `question_app`
--
ALTER TABLE `question_app`
  ADD PRIMARY KEY (`question_app_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `app`
--
ALTER TABLE `app`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location_app`
--
ALTER TABLE `location_app`
  MODIFY `location_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `main_location_app`
--
ALTER TABLE `main_location_app`
  MODIFY `main_location_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `question_app`
--
ALTER TABLE `question_app`
  MODIFY `question_app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
