-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2020 lúc 05:15 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webmail`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `block_user`
--

CREATE TABLE `block_user` (
  `USER_ID` int(11) NOT NULL,
  `BLOCK_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conversation`
--

CREATE TABLE `conversation` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `draft`
--

CREATE TABLE `draft` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail`
--

CREATE TABLE `mail` (
  `ID` int(11) NOT NULL,
  `CONVERSATION_ID` int(11) NOT NULL,
  `USER_ID_SEND` int(11) DEFAULT NULL,
  `USER_ID_RECEIVE` int(11) DEFAULT NULL,
  `SENT_TIME` datetime DEFAULT NULL,
  `CONTENT` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENCLOSED_FILE` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SEEN` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recyclebin`
--

CREATE TABLE `recyclebin` (
  `ID` int(11) NOT NULL,
  `DATE_EXPIRED` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spam`
--

CREATE TABLE `spam` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `star`
--

CREATE TABLE `star` (
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `AVATAR` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONENUMBER` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_MAIL_ADDRESS` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `PASSWORD` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `NAME`, `AVATAR`, `PHONENUMBER`, `USER_MAIL_ADDRESS`, `PASSWORD`) VALUES
(1, 'Nguyễn Thúy Hằng', 'asset/images/avatar/users-16.svg', '0908089819', 'ngthhang9102000@gmail', '9a9c78a7298a9291d61d9f78b3c0b290'),
(2, 'Đoàn Hồng Phương Ngọc', 'asset/images/avatar/users-14.svg', '0933288236', 'doanhongphuongngoc@gmail.com', '70b1494dd92373021278682c4ab43b6c'),
(3, 'Phạm Đức Duy', 'asset/images/avatar/users-2.svg', '0354726844', 'ptduy861@gmail.com', 'afb326ef435912992996400297fb5b46'),
(4, 'Nguyễn Quế Chi', 'asset/images/avatar/users-12.svg', '0915648965', 'quechi2461@gmail.com', '1cf6f87dce279bdc982c6315d76cb287'),
(5, 'Phan Hải Đăng', 'asset/images/avatar/users-15.svg', '0978645687', 'phdang3345@gmail.com', 'c96e3760a924df57306c17a022279d5f'),
(6, 'Trần Thu Ngân', 'asset/images/avatar/users-3.svg', '0999912459', 'ttngan74466@gmail.com', 'a6b9b222b2608b3858e5c94a2d2cdbec'),
(7, 'Tiêu Trí Kiên', 'asset/images/avatar/users-11.svg', '0988515975', 'tieuchikien1230@gmail.com', '81376b67fa44c9dd77a433b0299c827a'),
(8, 'Trần Vũ Ngân', 'asset/images/avatar/users-3.svg', '0985678549', 'tranvungan@gmail.com', '1aeb357a508af2792b37ef8717d96bc7'),
(9, 'Phạm Văn Lâm', 'asset/images/avatar/users-1.svg', '0975684895', 'phamvanlam@gmail.com', 'cb7ae94d9e85607ac9f5508210f17b74'),
(10, 'Nguyễn Hùng Dũng', 'asset/images/avatar/users-2.svg', '0945698759', 'nguyenhungdung@gmail.com', '9c3b2d4d36adcf71499f0a1df90b98d9'),
(11, 'Trần Tuấn Sang', 'asset/images/avatar/users-8.svg', '0978645415', 'trantuansang@gmail.com', 'eb1fd358cd3656440e6be7d69528ba06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `block_user`
--
ALTER TABLE `block_user`
  ADD PRIMARY KEY (`USER_ID`,`BLOCK_ID`),
  ADD KEY `BLOCK_ID` (`BLOCK_ID`);

--
-- Chỉ mục cho bảng `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `draft`
--
ALTER TABLE `draft`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_CONVERSATION_ID` (`CONVERSATION_ID`),
  ADD KEY `FK_USER_ID_SEND` (`USER_ID_SEND`),
  ADD KEY `FK_USER_ID_RECEIVE` (`USER_ID_RECEIVE`);

--
-- Chỉ mục cho bảng `recyclebin`
--
ALTER TABLE `recyclebin`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `spam`
--
ALTER TABLE `spam`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `conversation`
--
ALTER TABLE `conversation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `mail`
--
ALTER TABLE `mail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `block_user`
--
ALTER TABLE `block_user`
  ADD CONSTRAINT `block_user_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `block_user_ibfk_2` FOREIGN KEY (`BLOCK_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `draft`
--
ALTER TABLE `draft`
  ADD CONSTRAINT `FK_DRAFT_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `FK_CONVERSATION_ID` FOREIGN KEY (`CONVERSATION_ID`) REFERENCES `conversation` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID_RECEIVE` FOREIGN KEY (`USER_ID_RECEIVE`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID_SEND` FOREIGN KEY (`USER_ID_SEND`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `recyclebin`
--
ALTER TABLE `recyclebin`
  ADD CONSTRAINT `recyclebin_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `spam`
--
ALTER TABLE `spam`
  ADD CONSTRAINT `FK_SPAM_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `star`
--
ALTER TABLE `star`
  ADD CONSTRAINT `FK_IMPORTANT_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
