-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 26, 2024 lúc 04:38 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doancuoiky`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan1`
--

CREATE TABLE `binhluan1` (
  `mabl` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaybl` date NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan1`
--

INSERT INTO `binhluan1` (`mabl`, `mahh`, `makh`, `ngaybl`, `noidung`) VALUES
(24, 1, 1, '2024-02-21', 'wqfwegfwe'),
(25, 1, 1, '2024-02-21', 'wqfw'),
(26, 27, 1, '2024-02-21', 'agte'),
(27, 12, 1, '2024-02-21', 'wgwegweg'),
(28, 15, 1, '2024-02-23', 'wefge'),
(29, 30, 1, '2024-02-28', 'dfhrhrt'),
(30, 57, 1, '2024-02-28', 'ewgwegwegw'),
(31, 1, 1, '2024-03-26', 'viugb'),
(32, 1, 1, '2024-03-26', 'bdjskgbergjerbgjer');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `idsize` int(11) NOT NULL,
  `dongia` float NOT NULL,
  `soluongton` int(11) NOT NULL,
  `hinh` varchar(100) NOT NULL,
  `giamgia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthanghoa`
--

INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `idsize`, `dongia`, `soluongton`, `hinh`, `giamgia`) VALUES
(1, 1, 15, 20000000, 20, 'lptop2.jpg', 0),
(3, 1, 13, 20000000, 19, '../uploads/laptop3.jpg', 0),
(4, 1, 13, 20000000, 20, 'laptop4.jpg', 0),
(6, 1, 13, 20000000, 20, 'laptop6.jpg', 5000000),
(9, 1, 13, 20000000, 20, 'laptop7.jpg', 5000000),
(10, 1, 13, 20000000, 20, 'laptop9.png', 5000000),
(12, 1, 13, 20000000, 20, 'asus1.jpg', 5000000),
(15, 1, 13, 20000000, 20, 'asus2.jpg', 5000000),
(16, 1, 13, 20000000, 20, 'asus3.jpg', 5000000),
(17, 1, 13, 20000000, 20, 'ASUS-1-1.jpg', 5000000),
(20, 1, 13, 20000000, 20, 'laptop1.jpg', 0),
(21, 1, 13, 20000000, 20, 'laptop1.jpg', 0),
(22, 1, 13, 20000000, 20, 'laptop1.jpg', 0),
(24, 1, 13, 20000000, 20, 'laptop1.jpg', 0),
(25, 2, 10, 9490000, 200000, 'laptop-lenovo1.jpg', 2),
(26, 2, 10, 19200000, 200000, 'laptop-lenovo2.jpg', 2),
(27, 2, 10, 13490000, 200000, 'laptop-lenovo3.jpg', 2),
(28, 2, 10, 33990000, 500000, 'laptop-lenovo4.jpg', 2),
(29, 2, 8, 33500000, 500000, 'msi1.jpg', 2),
(30, 2, 8, 15200000, 200000, 'msi2.jpg', 2),
(31, 2, 8, 20790000, 200000, 'msi3.jpg', 2),
(32, 2, 8, 23500000, 200000, 'msi4.jpg', 2),
(56, 0, 0, 1, 30, 'lenovo-20.jpg', 2000000),
(57, 0, 0, 1000000000, 30, 'lenovo-20.jpg', 2000000),
(67, 0, 0, 1000000000, 45, 'ThinhPad.jpg', 2000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon1`
--

CREATE TABLE `cthoadon1` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon1`
--

INSERT INTO `cthoadon1` (`masohd`, `mahh`, `soluongmua`, `mausac`, `size`, `thanhtien`, `tinhtrang`) VALUES
(43, 1, 1, 'Màu Đen', 15, 20000000, 0),
(44, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(45, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(46, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(47, 15, 2, 'Màu Bạc', 13, 40000000, 0),
(49, 31, 1, 'Màu Xám', 15, 20790000, 0),
(50, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(52, 31, 2, 'Màu Xám', 15, 41580000, 0),
(53, 6, 1, 'Màu Xám', 13, 20000000, 0),
(53, 6, 6, 'Màu Đen', 13, 120000000, 0),
(53, 16, 4, 'Màu Bạc', 13, 80000000, 0),
(53, 27, 1, 'Màu Xám', 15, 13490000, 0),
(54, 26, 1, 'Màu Xám', 15, 19200000, 0),
(54, 26, 1, 'Màu Đen', 15, 19200000, 0),
(55, 6, 1, 'Màu Đen', 13, 20000000, 0),
(55, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(56, 6, 1, 'Màu Đen', 13, 20000000, 0),
(57, 31, 1, 'Màu Xám', 15, 20790000, 0),
(58, 31, 1, 'Màu Xám', 15, 20790000, 0),
(59, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(60, 10, 1, 'Màu Bạc', 13, 20000000, 0),
(61, 31, 1, 'Màu Xám', 15, 20790000, 0),
(62, 31, 1, 'Màu Xám', 15, 20790000, 0),
(63, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(64, 31, 1, 'Màu Xám', 15, 20790000, 0),
(65, 31, 1, 'Màu Xám', 15, 20790000, 0),
(66, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(67, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(68, 31, 1, 'Màu Xám', 15, 20790000, 0),
(69, 31, 1, 'Màu Xám', 15, 20790000, 0),
(70, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(71, 12, 1, 'Màu Bạc', 13, 20000000, 0),
(72, 25, 1, 'Màu Đen', 15, 9490000, 0),
(73, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(74, 9, 2, 'Màu Bạc', 13, 40000000, 0),
(75, 15, 1, 'Màu Bạc', 13, 20000000, 0),
(76, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(77, 6, 1, 'Màu Đen', 13, 20000000, 0),
(78, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(79, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(80, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(81, 16, 1, 'Màu Bạc', 13, 20000000, 0),
(82, 15, 1, 'Màu Bạc', 13, 20000000, 0),
(83, 17, 1, 'Màu Bạc', 13, 20000000, 0),
(84, 16, 1, 'Màu Bạc', 13, 20000000, 0),
(85, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(86, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(87, 6, 1, 'Màu Đen', 13, 20000000, 0),
(88, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(90, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(91, 9, 3, 'Màu Bạc', 13, 60000000, 0),
(92, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(93, 28, 1, 'Màu Xám', 15, 33990000, 0),
(94, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(95, 3, 3, 'Màu Bạc', 13, 60000000, 0),
(96, 57, 1, 'Màu Đen', 13, 1000000000, 0),
(97, 58, 1, 'Màu Trắng', 13, 12000000, 0),
(98, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(99, 15, 3, 'Màu Bạc', 13, 60000000, 0),
(100, 5, 1, 'Màu Bạc', 13, 20000000, 0),
(101, 10, 1, 'Màu Bạc', 13, 20000000, 0),
(102, 17, 1, 'Màu Bạc', 13, 20000000, 0),
(103, 9, 1, 'Màu Bạc', 13, 20000000, 0),
(104, 6, 6, 'Màu Đen', 13, 120000000, 0),
(105, 15, 4, 'Màu Bạc', 13, 80000000, 0),
(106, 67, 1, 'Màu Đen', 13, 1000000000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `dongia` float NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `Nhom` int(4) NOT NULL,
  `maloai` int(11) NOT NULL,
  `dacbiet` bit(1) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL,
  `soluongton` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `size` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `dongia`, `giamgia`, `hinh`, `Nhom`, `maloai`, `dacbiet`, `soluotxem`, `ngaylap`, `mota`, `soluongton`, `mausac`, `size`) VALUES
(1, 'Dell Inspiron 3580 i7 8565U', 20000000, 0, 'lptop2.jpg', 0, 1, b'0', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Bạc', 15),
(3, 'Dell Vostro 3580 i7 8565U', 20000000, 0, '../uploads/laptop3.jpg', 0, 1, b'0', 10, '2024-03-23', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 19, 'Bạc', 13),
(4, 'Dell Vostro 3580 i5 8265U', 20000000, 0, 'laptop4.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(6, 'Dell Alienware 17', 20000000, 5000000, 'laptop6.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 14, 'Màu Đen', 13),
(9, 'Dell Alienware 15 R3', 20000000, 5000000, 'laptop7.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 12, 'Màu Bạc', 13),
(10, 'Dell Precision 5510', 20000000, 5000000, 'laptop9.png', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 19, 'Màu Bạc', 13),
(12, 'Asus ROG Flow X13 2023 ', 20000000, 5000000, 'asus1.jpg', 0, 7, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(15, 'Asus ROG Strix G15 G513IH-HN015W', 20000000, 5000000, 'asus2.jpg', 0, 7, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 13, 'Màu Bạc', 13),
(16, 'Gigabyte G5 MF-F2VN313SH ', 20000000, 5000000, 'asus3.jpg', 0, 7, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(17, 'ASUS TUF Gaming F15 FX507VV4 LP382W', 20000000, 5000000, 'ASUS-1-1.jpg', 0, 7, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 19, 'Màu Bạc', 13),
(20, 'Laptop Dell Inspiron 16 5620', 20000000, 0, 'laptop1.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(21, 'Laptop Dell Latitude 3420', 20000000, 0, 'laptop1.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(22, 'Dell Latitude 7490 - Core i7-8650U', 20000000, 0, 'laptop1.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(24, 'Dell Xps 15 9500', 20000000, 0, 'laptop1.jpg', 0, 1, b'1', 10, '2023-12-01', 'Laptop Dell XPS 13 với thiết kế siêu mỏng và hiệu suất cao.', 20, 'Màu Bạc', 13),
(25, 'Laptop Lenovo Ideapad 3 15ITL05', 9490000, 200000, 'laptop-lenovo1.jpg', 2, 10, b'0', 30, '2023-12-06', 'Laptop Lenovo Ideapad 3 15ITL05 Core i3 dành cho ai?\r\n\r\nNếu bạn đang tìm kiếm một chiếc laptop \"hạt dẻ\" có màn hình 15.6 inch và bao gồm các tiêu chí: nhỏ gọn, sang trọng cùng những tính năng hấp dẫn thu hút nhiều sự quan tâm đến từ học sinh - sinh viên và nhân viên văn phòng. Thì xin chúc mừng bạn, chiếc Lenovo Ideapad 3 15ITL05 Core i3 là lựa chọn không thể tốt hơn với khoản đầu tư khoảng 10 triệu đồng.', 20, 'Màu Đen', 15),
(26, 'Laptop Lenovo ThinkPad E570 ', 19200000, 200000, 'laptop-lenovo2.jpg', 2, 10, b'0', 20, '2023-12-13', 'CPU: Intel Core i5-10300H (2.50GHz upto 4.50GHz, 8MB)\r\nRAM: 8GB DDR4 2933MHz (2 khe, tối đa 32GB)\r\nỔ cứng: 512GB M.2 NVMe PCIe 3.0 SSD\r\nVGA: NVIDIA GeForce GTX 1650 4GB GDDR6\r\nMàn hình: 15.6 inch FHD (1920×1080) 16:9, Value IPS-level, 144Hz, 45% NTSC, 62.5% SRGB, anti-glare display\r\nPin: 3-cell, 48WHrs\r\nHệ điều hành: Windows 11 Home\r\nBảo hành: 2 năm, pin 1 năm', 20, 'Màu Đen', 15),
(27, 'Laptop Lenovo IdeaPad Slim 3 14IAH8 83EQ0005VN', 13490000, 200000, 'laptop-lenovo3.jpg', 2, 10, b'0', 20, '2023-12-06', 'ĐẶC ĐIỂM NỔI BẬT\r\nMang thiết kế tối ưu và di động với trọng lượng nhẹ nhàng chỉ 1.37 kg\r\nCPU Intel Core i5-12450H mạnh mẽ, xử lý từ những tác vụ văn phòng đơn giản tới những công việc thiết kế hình ảnh\r\n16GB RAM đa nhiệm giúp làm việc với nhiều ứng dụng mà không lo lắng giật Lag\r\nỔ cứng SSD 512GB cho không gian lưu trữ lớn giúp khởi động máy hay mở tệp thư mục nhanh chóng\r\nMàn hình 14 inch Full HD đảm bảo hiển thị hình ảnh có độ sắc nét cao tới từng chi tiết\r\nLaptop Lenovo IdeaPad Slim 3 14IAH8 83EQ0005VN là dòng laptop văn phòng mỏng nhẹ với độ dày chỉ 17.9mm cùng trọng lượng 1.37kg có thể dễ dàng mang theo. Đồng thời, chiếc laptop này vẫn đảm bảo hiệu năng mạnh mẽ nhờ con chip Intel Core i5-12450H.', 20, 'Màu Xám', 15),
(28, 'Lenovo Gaming Legion 5 Pro 16ARH7H R7', 33990000, 500000, 'laptop-lenovo4.jpg', 2, 10, b'0', 10, '2023-12-20', '15.6 inch, 2560 x 1600 Pixels, IPS, 165 Hz, 500 nits, IPS LCD LED Backlit, True Tone\r\n\r\nAMD, Ryzen 7, 6800H\r\n\r\n16 GB (2 thanh 8 GB), DDR5, 4800 MHz\r\n\r\nSSD 512 GB\r\n\r\nNVIDIA GeForce RTX 3060 6GB; AMD Radeon Graphics', 19, 'Màu Xám', 15),
(29, 'Laptop Gaming MSI GE76 Raider', 33500000, 500000, 'msi1.jpg', 2, 8, b'0', 10, '2023-12-20', 'CPU          : 11th Intel® Core™ i7-11800H (8 core, 16 threads, 2.3GHz – 4.6GHz, 24MB Cache)\r\nRAM         : 16GB DDR4 3200MHz\r\nĐĩa cứng  : 1TB NVMe Solid State Drive\r\nMàn hình  : 17.3″ IPS FHD (1920 x 1080) 144Hz, IPS\r\nCard đồ họa  : NVIDIA® GeForce® RTX 3060 6GB GDDR6\r\nHệ điều hành : Windows 11 Pro\r\nQuà khuyến mãi\r\n Chuột quang không dây\r\n Ba lô/Túi xách khi mua laptop.\r\nSản phẩm được hỗ trợ cài đặt và xử lý phần mềm miễn phí', 20, 'Màu Xám', 15),
(30, 'MSI GP62-6QE Core i7-6700HQ, RAM 8GB, HDD 1TB', 15200000, 200000, 'msi2.jpg', 2, 8, b'0', 20, '2023-12-20', 'CPU Intel® Core ™ i7-6700HQ\r\nRam 8GB DDR4 2133MHz\r\nỔ cứng HDD 1TB\r\nMàn hình 15.6″ FHD\r\nVGA Nvidia Gefoce GTX 960M 2GB\r\nTrả Góp 80% Giá Trị Sản Phẩm\r\n✔ Tặng bộ quà tặng 650.000đ cho toàn bộ đơn hàng trên 5 triệu bao gồm: Balo thời trang, túi chống sốc, chuột không dây, lót di chuột\r\n✔ Trải nghiệm miễn phí 15 ngày đầu tiên.\r\n✔ Bảo hành 06 tháng 1 đổi 1\r\n✔ Miễn phí vận chuyển trong bán kính 10km từ cửa hàng LAPTOP TCC gần nhất\r\n✔ Miễn phí cân màu hình bằng Spyder X Elite', 20, 'Màu Đen', 15),
(31, 'Laptop MSI Katana GF66 12UCK 805VN', 20790000, 200000, 'msi3.jpg', 2, 8, b'0', 10, '2023-12-20', 'CPU Intel Core i7-12650H (24MB, up to 4.70GHz)\r\nRAM 16GB DDR4 3200MHz (8GB + 8GB AKC tặng)\r\nSSD 512GB NVMe PCIe Gen3x4\r\nVGA NVIDIA GeForce RTX 3050 4GB GDDR6\r\nDisplay 15.6Inch FHD IPS 144Hz 45%NTSC\r\nPin 3Cell 53.5WHrs\r\nColor Black (Đen)\r\nRGB Keyboard\r\nWeight 2.25 kg\r\nOS Windows 11 Home', 20, 'Màu Xám', 15),
(32, 'Laptop Gaming MSI GE63 7RD', 23500000, 200000, 'msi4.jpg', 2, 8, b'0', 10, '2023-12-20', 'Thông số cơ bản:\r\n- CPU : Intel Core i7 7700HQ\r\n- 2.8Ghz turbo boost 3.8Ghz\r\n- Ram : 16Gb DDR4 2400MHz\r\n- HDD + SSD :  1TB + 128Gb\r\n- Màn hình 15.6 inch FHD\r\n- Độ phân giải : 1920 x 1080 pixels\r\n- Card Reader : NVIDIA Geforce GTX 1050Ti\r\n- Tình trạng máy : New 100%; Full Box', 20, 'Màu Đen', 15),
(67, 'Laptop1111wqgerhewhb', 1000000000, 2000000, 'ThinhPad.jpg', 0, 8, b'1', 45, '2024-03-13', 'egwegwegesgewgwegwegwegwegwe', 44, 'Màu Đen', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon1`
--

CREATE TABLE `hoadon1` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `tenkh` varchar(255) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon1`
--

INSERT INTO `hoadon1` (`masohd`, `makh`, `tenkh`, `ngaydat`, `tongtien`) VALUES
(69, 0, '', '2024-02-21', 20790000),
(70, 0, '', '2024-02-21', 20000000),
(71, 0, '', '2024-02-21', 20000000),
(72, 0, '', '2024-02-21', 9490000),
(73, 0, '', '2024-02-21', 20000000),
(74, 0, '', '2024-02-23', 40000000),
(75, 0, '', '2024-02-23', 20000000),
(76, 0, '', '2024-02-23', 20000000),
(77, 0, '', '2024-02-23', 20000000),
(78, 0, '', '2024-02-23', 20000000),
(79, 0, '', '2024-02-23', 20000000),
(80, 0, '', '2024-02-23', 20000000),
(81, 0, '', '2024-02-23', 20000000),
(82, 0, '', '2024-02-23', 20000000),
(83, 0, '', '2024-02-23', 20000000),
(84, 0, '', '2024-02-26', 20000000),
(85, 0, '', '2024-02-26', 20000000),
(86, 0, '', '2024-02-26', 20000000),
(87, 0, '', '2024-02-26', 20000000),
(88, 0, '', '2024-02-26', 20000000),
(89, 0, '', '2024-02-26', 0),
(90, 0, '', '2024-02-26', 20000000),
(91, 0, '', '2024-02-26', 60000000),
(92, 0, '', '2024-02-28', 20000000),
(93, 0, '', '2024-02-28', 33990000),
(94, 0, '', '2024-02-28', 20000000),
(95, 0, '', '2024-02-28', 60000000),
(96, 0, '', '2024-02-28', 1000000000),
(97, 0, '', '2024-02-28', 12000000),
(98, 0, '', '2024-03-01', 20000000),
(99, 0, '', '2024-03-01', 60000000),
(100, 0, '', '2024-03-06', 20000000),
(101, 0, '', '2024-03-06', 20000000),
(102, 0, '', '2024-03-06', 20000000),
(103, 0, '', '2024-03-06', 20000000),
(104, 0, '', '2024-03-06', 120000000),
(105, 0, '', '2024-03-25', 80000000),
(106, 0, '', '2024-03-26', 1000000000),
(107, 0, '', '2024-03-26', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang1`
--

CREATE TABLE `khachhang1` (
  `makh` int(11) NOT NULL,
  `tenkh` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diachi` text NOT NULL,
  `sodienthoai` varchar(12) NOT NULL,
  `vaitro` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang1`
--

INSERT INTO `khachhang1` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`, `vaitro`) VALUES
(34, 'vul', 'vul', '$2y$10$338aCaSKti8CaBfXafI.A.GFJ569mjoazC3EbrqFd7dOA8BvYmh1m', 'vul7896@gmail.com', 'Thanh Hóa', '0398716016', 0),
(35, 'long', 'long', '$2y$10$PjqZZNCbhccXD7hJmSk/QeTYagSVoliAxnZ9CwJ32sFHeNz7OzuFW', 'longa962004@gmail.com', 'Thanh Hóa', '0398716016', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Laptop Dell', 3),
(7, 'Laptop Asus', 3),
(8, 'Laptop Msi', 3),
(10, 'Laptop Lenovo', 3),
(16, 'TUF', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'vu', '$2y$10$luxbS8p/a11NVvoerWxEXOGGA8OocpCq5SOlisnD0E2bdNgLpEZ8C', 'vul7896@gmail.com', 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `binhluan1`
--
ALTER TABLE `binhluan1`
  ADD PRIMARY KEY (`mabl`);

--
-- Chỉ mục cho bảng `cthoadon1`
--
ALTER TABLE `cthoadon1`
  ADD PRIMARY KEY (`masohd`,`mahh`,`mausac`,`size`),
  ADD KEY `fk_cthd_mahh` (`mahh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`),
  ADD KEY `FK_hanghoa_maloai` (`maloai`);

--
-- Chỉ mục cho bảng `hoadon1`
--
ALTER TABLE `hoadon1`
  ADD PRIMARY KEY (`masohd`),
  ADD KEY `fk_hoadon_kh` (`makh`);

--
-- Chỉ mục cho bảng `khachhang1`
--
ALTER TABLE `khachhang1`
  ADD PRIMARY KEY (`makh`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`),
  ADD KEY `FK_loai_menu` (`idmenu`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan1`
--
ALTER TABLE `binhluan1`
  MODIFY `mabl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `hoadon1`
--
ALTER TABLE `hoadon1`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `khachhang1`
--
ALTER TABLE `khachhang1`
  MODIFY `makh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
