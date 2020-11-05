-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2020 lúc 10:04 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `music`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album`
--

CREATE TABLE `album` (
  `albumID` int(255) NOT NULL,
  `albumName` varchar(255) NOT NULL,
  `lastUpdated` date NOT NULL,
  `authID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `album`
--

INSERT INTO `album` (`albumID`, `albumName`, `lastUpdated`, `authID`) VALUES
(1, 'Jack\'s first hand', '2000-11-25', 1),
(3, 'unknown', '2020-10-10', 9),
(20, 'ádasd', '2020-10-10', 1),
(21, '123', '2020-10-10', 1),
(23, 'test1', '2020-10-10', 1),
(24, 'test2', '2020-10-10', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `author`
--

CREATE TABLE `author` (
  `authID` int(255) NOT NULL,
  `authName` varchar(255) NOT NULL,
  `authDes` varchar(255) NOT NULL,
  `lastUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `author`
--

INSERT INTO `author` (`authID`, `authName`, `authDes`, `lastUpdated`) VALUES
(1, 'Jack', 'good', '2020-10-09'),
(2, 'Jax Jones, Bebe Rexha', 'good', '2020-10-09'),
(3, 'Martin Garrix & Troye Sivan', 'excellent', '2020-10-09'),
(4, 'Ava Max', 'strong', '2020-10-09'),
(5, 'BLACK PINK', 'dududdududdu', '2020-10-09'),
(9, 'unknown', 'for unknown album', '2020-10-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catName` varchar(255) NOT NULL,
  `catDes` varchar(255) NOT NULL,
  `lastUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catName`, `catDes`, `lastUpdated`) VALUES
('Chill', 'Relax and Listen ', '2020-10-09'),
('Indie', 'unknown', '2020-10-09'),
('Kpop', 'Korean Pop Music', '2020-10-09'),
('Lo-fi', 'beautiful', '2020-10-09'),
('Rap', 'Hot trend', '2020-10-09'),
('RnB', 'Rock and Bass', '2020-10-09'),
('US-UK', 'Hot ', '2020-10-10'),
('Vpop', 'Viet Nam Popular music', '2020-10-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderID` int(255) NOT NULL,
  `songID` int(255) NOT NULL,
  `songImg` varchar(255) NOT NULL,
  `songName` varchar(255) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`orderID`, `songID`, `songImg`, `songName`, `price`) VALUES
(55, 3, 'thichthiden.jpg', 'Thich Thi Den', 13),
(55, 33, 'howulikethat.png', 'How You Like That', 1),
(55, 15, 'amcdd.jpg', 'Ai Mang Co Don Di', 1),
(55, 32, 'hoahaiduong.jpg', 'Hoa Hai Duong', 1),
(55, 36, 'hnkm.jpg', 'Hoa Nở Không Màu', 40),
(56, 39, 'pirate.jpg', 'Pirate of the Caribbean ', 123123123),
(56, 34, 'bebe-rexha.jpg', 'Harder', 30),
(56, 38, 'monkeydance.jpg', 'Monkey Dance', 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `orderID` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `phone` text NOT NULL,
  `mail` text NOT NULL,
  `total_amount` text NOT NULL,
  `note` text NOT NULL,
  `payment_method` text NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`orderID`, `username`, `name`, `address`, `phone`, `mail`, `total_amount`, `note`, `payment_method`, `orderDate`) VALUES
(55, 'guest', 'Như Thị Ý', 'Số 120 Hàng Mã', '0908723641', 'nhuthiysinhdep1998@gmail.com', '56.00', '', 'ATM TP-Bank', '2020-11-05 19:34:23'),
(56, 'guest', 'Như Thị Ý', 'Số 120 Hàng Mã', '0908723641', 'nhuthiysinhdep1998@gmail.com', '123,123,193.00', 'Nhạc Hay vch', 'Visa', '2020-11-05 19:53:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `song`
--

CREATE TABLE `song` (
  `songID` int(255) NOT NULL,
  `songName` varchar(255) NOT NULL,
  `lastUpdated` date NOT NULL,
  `albumID` int(255) NOT NULL,
  `catName` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `songImg` varchar(255) NOT NULL,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `song`
--

INSERT INTO `song` (`songID`, `songName`, `lastUpdated`, `albumID`, `catName`, `price`, `songImg`, `audio`) VALUES
(3, 'Thich Thi Den', '2020-10-09', 3, 'Vpop', 13, 'thichthiden.jpg', 'thichthiden.mp3'),
(15, 'Ai Mang Co Don Di', '2020-10-05', 3, 'Vpop', 1, 'amcdd.jpg', 'amcdd.mp3'),
(32, 'Hoa Hai Duong', '2020-10-09', 1, 'Vpop', 1, 'hoahaiduong.jpg', 'a.mp3'),
(33, 'How You Like That', '2020-10-09', 3, 'Kpop', 1, 'howulikethat.png', 'howulikethat.mp3'),
(34, 'Harder', '2020-11-03', 3, 'US-UK', 30, 'bebe-rexha.jpg', 'Harder.mp3'),
(35, 'Salt', '2020-10-11', 3, 'RnB', 12, 'ava-max.png', 'Salt.mp3'),
(36, 'Hoa Nở Không Màu', '2020-11-02', 3, 'Vpop', 40, 'hnkm.jpg', 'hnkm.mp3'),
(37, 'Call You Mine', '2020-11-02', 3, 'Chill', 100000, 'callumine.jpg', 'CallYouMine.mp3'),
(38, 'Monkey Dance', '2020-11-02', 3, 'US-UK', 40, 'monkeydance.jpg', 'monkeydance.mp3'),
(39, 'Pirate of the Caribbean ', '2020-11-02', 3, 'Chill', 12, 'pirate.jpg', 'intro.mp3'),
(40, 'Play Date', '2020-11-02', 3, 'Chill', 40, 'playdate.jpg', '[Beat Match] 🔥 Melanie Martinez - Play Date (8D AUDIO).mp3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(25) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `mail` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `lastUpdated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `address`, `phone`, `mail`, `role`, `lastUpdated`) VALUES
('admin', '123', 'Nguyen Dinh Thanh', '37 Lang Ha', '01212121212', 'dinhthanh123@gmail.com', 'admin', '2020-10-10'),
('guest', '123', 'Như Thị Ý', 'Số 120 Hàng Mã', '0908723641', 'nhuthiysinhdep1998@gmail.com', 'guest', '2020-10-10'),
('heo con', 'Hello123', 'heo con', '170 Đội Cấn', '0909234027', 'heoconxingdep@gmail.com', 'guest', '2020-10-11'),
('Li pong', 'Hello123', 'Li pong', '90 Láng Hạ', '0904832027', 'lipongChina@gmail.com', 'guest', '2020-10-10'),
('tester', 'All123123', 'tester', '170 Doi Can', '0987754321', 'test123@gmail.com', 'guest', '2020-10-11'),
('TrungDinhCount', '123', 'Đinh Văn Lực', 'Ngách 24/11, Số 37 Cầu Gi', '0164347709', 'dinhluc2990@gmail.com', 'guest', '2020-10-10');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumID`),
  ADD KEY `authID` (`authID`);

--
-- Chỉ mục cho bảng `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`authID`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catName`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD KEY `orderID` (`orderID`),
  ADD KEY `songID` (`songID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`songID`),
  ADD KEY `albumID` (`albumID`),
  ADD KEY `catName` (`catName`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album`
--
ALTER TABLE `album`
  MODIFY `albumID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `author`
--
ALTER TABLE `author`
  MODIFY `authID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `song`
--
ALTER TABLE `song`
  MODIFY `songID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `authID` FOREIGN KEY (`authID`) REFERENCES `author` (`authID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `songID` FOREIGN KEY (`songID`) REFERENCES `song` (`songID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `albumID` FOREIGN KEY (`albumID`) REFERENCES `album` (`albumID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `catName` FOREIGN KEY (`catName`) REFERENCES `category` (`catName`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
