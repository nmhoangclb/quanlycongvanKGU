-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 15, 2018 lúc 05:27 AM
-- Phiên bản máy phục vụ: 10.1.29-MariaDB
-- Phiên bản PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlycongvan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `userName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `passWord` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `userName`, `passWord`, `role`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'staff', '6ccb4b7c39a6e77f76ecfa935a855c6c46ad5611', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congvan`
--

CREATE TABLE `congvan` (
  `idcongvan` int(10) NOT NULL,
  `soHieu` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ngayVanBan` date NOT NULL,
  `ngayHieuLuc` date NOT NULL,
  `noiDung` varchar(145) COLLATE utf8_unicode_ci NOT NULL,
  `nguoiKy` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mataptin` int(100) NOT NULL,
  `conhieuluc` int(10) NOT NULL DEFAULT '1',
  `coquanbanhanh` int(11) NOT NULL,
  `hinhthucvanban` int(11) NOT NULL,
  `linhvuc` int(11) NOT NULL,
  `loaivanban` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='bảng công văn';

--
-- Đang đổ dữ liệu cho bảng `congvan`
--

INSERT INTO `congvan` (`idcongvan`, `soHieu`, `ngayVanBan`, `ngayHieuLuc`, `noiDung`, `nguoiKy`, `mataptin`, `conhieuluc`, `coquanbanhanh`, `hinhthucvanban`, `linhvuc`, `loaivanban`) VALUES
(75, '2275/SYT-NVY', '2017-12-19', '0000-00-00', 'V/v báo cáo nhanh số liệu người khuyết tật 2017', '', 51, 1, 4, 3, 1, 1),
(76, '5060/QĐ-SYT', '2017-12-20', '0000-00-00', 'Thành lập Tổ xây dựng Đề án tổ chức lại hệ thống tuyến tỉnh', '', 52, 1, 4, 13, 1, 1),
(77, '5059/QĐ-SYT', '2017-12-20', '0000-00-00', 'Thành lập tổ xây dựng Đề án tổ chức y tế tuyến huyện', '', 53, 1, 4, 13, 1, 1),
(79, '179/GM-SYT', '2017-12-20', '0000-00-00', 'Mời tập huấn quản lý Bệnh lao', '', 55, 1, 4, 7, 1, 1),
(81, '177/GM-SYT', '2017-12-20', '0000-00-00', 'Mời họp Kỷ niệm 56 năm Ngày dân số Việt Nam', '', 57, 1, 4, 7, 1, 1),
(83, '177/GM-SYT', '2017-12-20', '0000-00-00', 'Mời họp Kỷ niệm 56 năm Ngày dân số Việt Nam 2017', '', 57, 1, 4, 7, 1, 1),
(84, '5066/QĐ-SYT', '2017-12-21', '0000-00-00', 'V/v tặng giấy khen cho tập thể, cá nhân đạt thành tích hoàn thành tốt nhiệm vụ công tác 2017', '', 60, 1, 4, 13, 1, 1),
(85, '5065/QĐ-SYT', '2017-12-21', '0000-00-00', 'V/v công nhận danh hiệu thi đua tập thể đạt thành tích hoàn thành tốt nhiệm vụ công tác 2017', '', 61, 1, 4, 13, 1, 1),
(86, '5064_QĐ-SYT', '2017-12-21', '0000-00-00', 'V/v công nhận danh hiệu thi đua cá nhân đạt thành tích hoàn thành tốt nhiệm vụ công tác 2017', '', 62, 1, 4, 13, 1, 1),
(89, '416/TB-UBND', '2017-12-25', '0000-00-00', 'Hoãn Hội nghị trực tuyến tăng cường công tác phòng, chống dịch', '', 65, 1, 3, 15, 1, 1),
(90, '2314/TB-SYT', '2017-12-25', '0000-00-00', 'Yêu cầu hỗ trợ của Trung tâm y tế huyện, thị thành trong tỉnh', '', 66, 1, 4, 15, 1, 1),
(91, '2325/SYT-NVY', '2017-12-25', '0000-00-00', 'Chủ động triển khai công tác ứng phó với bão số 16', '', 67, 1, 4, 3, 1, 1),
(92, '2321/SYT-KHTC', '2017-12-25', '0000-00-00', 'Ứng phó khẩn cấp bão số 16', '', 68, 1, 4, 3, 1, 1),
(93, '2130/KH-SYT', '2017-12-26', '0000-00-00', 'Kế hoạch phòng chống tai nạn thương tích giai đoạn đến năm 2020', '', 69, 1, 4, 8, 1, 1),
(94, '373/TB-SYT', '2017-04-02', '0000-00-00', 'Thông báo danh sách viên chức cử đào tạo sau đại học 2017 chưa có quyết định', '', 70, 1, 4, 15, 1, 1),
(95, '2272/TB-SYT', '2017-12-26', '0000-00-00', 'Thay đổi mẫu dấu, Ban quản lý y tế khu vực tiểu vùng Mê công', '', 71, 1, 4, 15, 1, 1),
(96, '2307/SYT-NVY', '2017-12-26', '0000-00-00', 'Thực hiện Quyết định số 5703/QĐ-BYT', '', 72, 1, 4, 3, 1, 1),
(97, '2308/SYT-NVY', '2017-12-26', '0000-00-00', 'Thực hiện Quyết định số 5656/QĐ-BYT', '', 73, 1, 4, 3, 1, 1),
(98, '2309/SYT-NVY', '2017-12-26', '0000-00-00', 'Cung cấp thông tin học viên tham dự Lớp tập huấn (lần 2)', '', 74, 1, 4, 3, 1, 1),
(99, '45/TM-SYT', '2018-04-05', '0000-00-00', 'Mời họp tổ xây dựng kế hoạch lựa chọn nhà thầu', '', 75, 1, 4, 7, 1, 1),
(100, '43/GM-SYT', '2018-04-05', '0000-00-00', 'Mời tham dự cuộc họp nghiệm thu cơ sở NCKH năm 2018', '', 76, 1, 4, 7, 1, 1),
(101, '393/SYT-VP', '2018-04-05', '0000-00-00', 'Triển khai thực hiện Quyết định 6110/QĐ-BYT', '', 77, 1, 4, 3, 1, 1),
(102, '392/SYT-VP', '2018-04-05', '0000-00-00', 'Triển khai thực hiện Quyết định 1677/QĐ-BYT, 102/CNTT-YTĐTI', '', 78, 1, 4, 3, 1, 1),
(103, '391/SYT-TCCB', '2018-04-05', '0000-00-00', 'Triển khai thực hiện Quyết định 1677/QĐ-BYT, 102/CNTT-YTĐTI', '', 79, 1, 4, 3, 1, 1),
(104, '391/SYT-TCCB', '2018-04-05', '0000-00-00', 'Phân công người phụ trách công tác dân số tuyến xã', '', 79, 1, 4, 3, 1, 1),
(105, '1917/QĐ-SYT', '2018-04-04', '0000-00-00', 'Quyết định thành lập hội đồng xét duyệt đề cương NCKH', '', 81, 1, 4, 13, 1, 1),
(106, '1697/QĐ-SYT', '2018-04-04', '0000-00-00', 'Quyết định thành lập Tổ thẩm định kế hoạch lựa cho nhà thầu', '', 82, 1, 4, 13, 1, 1),
(107, '1695/QĐ-SYT', '2018-04-04', '0000-00-00', 'Quyết định thành lập tổ xây dựng kế hoạch lựa chọn nhà thầu', '', 83, 1, 4, 13, 1, 1),
(108, '1696/QĐ-SYT', '2018-04-04', '0000-00-00', 'Quyết định thành lập tổ chuyên gia xét thầu', '', 84, 1, 4, 13, 1, 1),
(109, '381/TB-SYT', '2018-04-04', '0000-00-00', 'Tuyển sinh sau đại học năm 2018	', '', 85, 1, 4, 15, 1, 1),
(110, '373/TB-SYT', '2018-04-02', '0000-00-00', 'Thông báo danh sách viên chức cử đào tạo sau đại học 2017 chưa có quyết định', '', 70, 1, 4, 15, 1, 1),
(111, '359/KH-SYT', '2018-03-30', '0000-00-00', 'Kế hoạch theo dõi tình hình thi hành pháp luật về y tế năm 2018', '', 87, 1, 4, 8, 1, 1),
(112, '342/SYT-NVY', '2017-11-26', '0000-00-00', 'Tổ chức tháng hành động về an toàn, vệ sinh lao động năm 2018', '', 88, 1, 4, 3, 1, 1),
(113, '367/SYT-TCCB', '2018-03-30', '0000-00-00', 'Báo cáo số liệu phục vụ xây dựng Thông tư quy định mã số', '', 89, 1, 4, 3, 1, 1),
(118, '2030/SYT-NVY', '2017-10-25', '0000-00-00', 'Báo cáo nhanh hoạt động Răng hàm Mặt', '', 113, 1, 3, 1, 2, 1),
(121, '1979/SYT-TCCB', '2017-10-17', '2017-10-17', 'Báo cáo số lượng Hộ sinh tại các cơ sở y tế', 'Nguyễn Văn Hải', 133, 1, 4, 3, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coquanbanhanh`
--

CREATE TABLE `coquanbanhanh` (
  `id` int(11) NOT NULL,
  `NameCQBH` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng cơ quan ban hành';

--
-- Đang đổ dữ liệu cho bảng `coquanbanhanh`
--

INSERT INTO `coquanbanhanh` (`id`, `NameCQBH`) VALUES
(1, 'Quốc hội'),
(2, 'Chính phủ'),
(3, 'UBND Tỉnh'),
(4, 'Sở y tế');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhthucvanban`
--

CREATE TABLE `hinhthucvanban` (
  `id` int(11) NOT NULL,
  `NameHTVB` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng hình thức văn bản';

--
-- Đang đổ dữ liệu cho bảng `hinhthucvanban`
--

INSERT INTO `hinhthucvanban` (`id`, `NameHTVB`) VALUES
(1, 'Báo cáo'),
(2, 'Công điện'),
(3, 'Công văn điều hành'),
(5, 'Chỉ thị'),
(6, 'Điều lệ'),
(7, 'Giấy mời'),
(8, 'Kế hoạch'),
(9, 'Luật'),
(10, 'Nghị định'),
(11, 'Nghị quyết'),
(12, 'Pháp lệnh'),
(13, 'Quyết định'),
(14, 'Tài liệu'),
(15, 'Thông báo'),
(16, 'Thông tư');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` int(11) NOT NULL,
  `NameLV` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng lĩnh vực';

--
-- Đang đổ dữ liệu cho bảng `linhvuc`
--

INSERT INTO `linhvuc` (`id`, `NameLV`) VALUES
(1, 'Y tế'),
(2, 'Lĩnh vực khác');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaivanban`
--

CREATE TABLE `loaivanban` (
  `id` int(11) NOT NULL,
  `NameLVB` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng loại văn bản';

--
-- Đang đổ dữ liệu cho bảng `loaivanban`
--

INSERT INTO `loaivanban` (`id`, `NameLVB`) VALUES
(1, 'Văn bản chỉ đạo điều hành'),
(2, 'Văn bản Quy phạm pháp luật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taptin`
--

CREATE TABLE `taptin` (
  `id` int(100) NOT NULL,
  `Name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Bảng tập tin quản lý tập tin tải lên của văn bản';

--
-- Đang đổ dữ liệu cho bảng `taptin`
--

INSERT INTO `taptin` (`id`, `Name`) VALUES
(51, '2275 SYT NVY.pdf'),
(52, '5060 qd syt.pdf'),
(53, '5059 qd syt.pdf'),
(54, '2287 bc syt.pdf'),
(55, '179 gm syt.pdf'),
(56, '2284 syt nvy.pdf'),
(57, '177 gm syt.pdf'),
(58, '2281_TB-SYT.pdf'),
(59, '177 gm syt.pdf'),
(60, '5066_QD-SYT.pdf'),
(61, '5065_QD-SYT.pdf'),
(62, '5064_QD-SYT.pdf'),
(63, '1967.pdf'),
(64, '745 gm ubnd.pdf'),
(65, '416.pdf'),
(66, '2314 tb syt.pdf'),
(67, '2325 syt nvy.pdf'),
(68, '2321 syt khtc.pdf'),
(69, '2130 kh syt.pdf'),
(70, '373 tbsyt.pdf'),
(71, '2272 tb syt.pdf'),
(72, '2307 syt nvy.pdf'),
(73, '2308 syt nvy.pdf'),
(74, '2309 syt nvy.pdf'),
(75, '45 gm hddt.pdf'),
(76, '43 tm syt.pdf'),
(77, '393 syt vp.pdf'),
(78, '392 syt vp.pdf'),
(79, '391 syt tccb.pdf'),
(80, '391 syt tccb.pdf'),
(81, '1917 qd syt.pdf'),
(82, '1697 qd syt.pdf'),
(83, '1695 qd syt.pdf'),
(84, '1696 qd syt.pdf'),
(85, '381 tb syt.pdf'),
(86, '373 tbsyt.pdf'),
(87, '359 kh syt.pdf'),
(88, '342 syt nvy.pdf'),
(89, '367 syt tccb.pdf'),
(90, '367 syt tccb.pdf'),
(91, '367 syt tccb.pdf'),
(92, '367 syt tccb.pdf'),
(93, '01 dl btc.pdf'),
(94, '01 dl btc.pdf'),
(95, '01 dl btc.pdf'),
(96, '01 dl btc.pdf'),
(97, '01 dl btc.pdf'),
(98, '01 dl btc.pdf'),
(99, '01 dl btc.pdf'),
(100, '01 dl btc.pdf'),
(101, '01 dl btc.pdf'),
(102, '01 dl btc.pdf'),
(103, '01 dl btc.pdf'),
(104, '01 dl btc.pdf'),
(105, '02 dl btc.pdf'),
(106, '02 syt nvd.pdf'),
(107, 'baocaothuctap_30_03_2018_ictkg'),
(108, ''),
(109, ''),
(110, 'nmhoang_thuctap_ictkg_06_04_20'),
(111, '5065_QD-SYT.pdf'),
(112, '393 syt vp.pdf'),
(113, '2030 syt nvy.pdf'),
(128, 'doanquanlycaphe_795.pdf'),
(129, 'doanquanlycaphe_795.pdf'),
(130, 'cafe-nhc3b3m-_03.pdf'),
(131, 'cafe-nhc3b3m-_03.pdf'),
(132, 'cafe-nhc3b3m-_03.pdf'),
(133, '1979 syt tccb.pdf');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `congvan`
--
ALTER TABLE `congvan`
  ADD PRIMARY KEY (`idcongvan`);

--
-- Chỉ mục cho bảng `coquanbanhanh`
--
ALTER TABLE `coquanbanhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hinhthucvanban`
--
ALTER TABLE `hinhthucvanban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaivanban`
--
ALTER TABLE `loaivanban`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taptin`
--
ALTER TABLE `taptin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `congvan`
--
ALTER TABLE `congvan`
  MODIFY `idcongvan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `coquanbanhanh`
--
ALTER TABLE `coquanbanhanh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hinhthucvanban`
--
ALTER TABLE `hinhthucvanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loaivanban`
--
ALTER TABLE `loaivanban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `taptin`
--
ALTER TABLE `taptin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
