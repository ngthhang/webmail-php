-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2020 lúc 12:16 PM
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

--
-- Đang đổ dữ liệu cho bảng `block_user`
--

INSERT INTO `block_user` (`USER_ID`, `BLOCK_ID`) VALUES
(1, 15),
(2, 9),
(2, 16),
(2, 17),
(2, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `conversation`
--

CREATE TABLE `conversation` (
  `ID` int(11) NOT NULL,
  `SUBJECT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `conversation`
--

INSERT INTO `conversation` (`ID`, `SUBJECT`) VALUES
(1, 'Gửi bài tập ôn môn Toán'),
(2, 'Khảo sát ý kiến'),
(3, 'Cuộc thi \"Tìm hiểu biển đảo Việt Nam\"'),
(4, 'Hướng dẫn học trực tuyến lý thuyết môn toán'),
(5, 'Thông báo V/v ôn tập trực tuyến môn Tư tưởng HCM'),
(6, 'Cập nhật lịch học online Lý thuyết PPT'),
(7, 'Meeting online for online learning'),
(8, 'Cuộc thi học thuật online'),
(9, 'Cuộc thi Trải nghiệm văn hóa Trung Hoa'),
(10, 'Thông báo V/v bát buộc tham gia khảo sát'),
(11, 'Gửi bài kiểm duyệt'),
(12, 'Quảng cáo Khóa học ABC'),
(13, 'Quảng cáo khóa học lập trình'),
(14, 'Nhanh chân đăng ký khóa học nấu ăn'),
(15, 'Khóa học thực hành miễn phí'),
(16, 'Đơn xin nghỉ'),
(17, 'Đơn xin xem xét'),
(18, 'Đơn xin học bù');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `draft`
--

CREATE TABLE `draft` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `draft`
--

INSERT INTO `draft` (`ID`, `USER_ID`) VALUES
(31, 2),
(36, 2),
(37, 2),
(38, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mail`
--

CREATE TABLE `mail` (
  `ID` int(11) NOT NULL,
  `CONVERSATION_ID` int(11) DEFAULT NULL,
  `USER_ID_SEND` int(11) DEFAULT NULL,
  `USER_ID_RECEIVE` int(11) DEFAULT NULL,
  `SENT_TIME` datetime DEFAULT NULL,
  `CONTENT` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENCLOSED_FILE` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SEEN` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `mail`
--

INSERT INTO `mail` (`ID`, `CONVERSATION_ID`, `USER_ID_SEND`, `USER_ID_RECEIVE`, `SENT_TIME`, `CONTENT`, `ENCLOSED_FILE`, `SEEN`) VALUES
(1, 3, 2, 1, '2020-04-01 16:22:00', 'Your score has been released for CUỘC THI \"TÌM HIỂU VỀ BIỂN ĐẢO VIỆT NAM\" KHOA QTKD.', NULL, b'0'),
(2, 3, 2, 8, '2020-04-01 16:22:00', 'Your score has been released for CUỘC THI \"TÌM HIỂU VỀ BIỂN ĐẢO VIỆT NAM\" KHOA QTKD.', NULL, b'0'),
(3, 3, 2, 3, '2020-04-01 16:22:00', 'Your score has been released for CUỘC THI \"TÌM HIỂU VỀ BIỂN ĐẢO VIỆT NAM\" KHOA QTKD.', NULL, b'0'),
(4, 3, 2, 4, '2020-04-01 16:22:00', 'Your score has been released for CUỘC THI \"TÌM HIỂU VỀ BIỂN ĐẢO VIỆT NAM\" KHOA QTKD.', NULL, b'0'),
(5, 3, 2, 5, '2020-04-01 16:22:00', 'Your score has been released for CUỘC THI \"TÌM HIỂU VỀ BIỂN ĐẢO VIỆT NAM\" KHOA QTKD.', NULL, b'0'),
(6, 1, 1, 2, '2020-04-04 09:36:04', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nVivamus imperdiet elit at vulputate ornare.\r\nMorbi iaculis sem at arcu consequat egestas.\r\nAliquam ac leo id neque aliquet congue.', 'asset/uploads/HDGiaiBTToan.pdf', b'1'),
(7, 1, 1, 8, '2020-04-03 16:22:00', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nVivamus imperdiet elit at vulputate ornare.\r\nMorbi iaculis sem at arcu consequat egestas.\r\nAliquam ac leo id neque aliquet congue.', 'asset/uploads/HDGiaiBTToan.pdf', b'0'),
(8, 8, 15, 1, '2020-04-06 08:36:30', 'Lorem Ipsum là gì?\r\nLorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500', NULL, b'0'),
(9, 8, 3, 2, '2020-04-06 08:36:30', 'Lorem Ipsum là gì?\r\nLorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500', NULL, b'0'),
(10, 8, 3, 8, '2020-04-06 08:36:30', 'Lorem Ipsum là gì?\r\nLorem Ipsum chỉ đơn giản là một đoạn văn bản giả, được dùng vào việc trình bày và dàn trang phục vụ cho in ấn. Lorem Ipsum đã được sử dụng như một văn bản chuẩn cho ngành công nghiệp in ấn từ những năm 1500', NULL, b'0'),
(11, 6, 4, 2, '2020-04-02 08:42:37', 'Làm thế nào để có nó?\r\nCó rất nhiều biến thể của Lorem Ipsum mà bạn có thể tìm thấy, nhưng đa số được biến đổi bằng cách thêm các yếu tố hài hước, các từ ngẫu nhiên có khi không có vẻ gì là có ý nghĩa. Nếu bạn định sử dụng một đoạn Lorem Ipsum, bạn nên kiểm tra kĩ để chắn chắn là không có gì nhạy cảm được giấu ở giữa đoạn văn bản.', NULL, b'1'),
(12, 6, 4, 1, '2020-04-02 08:42:37', 'Làm thế nào để có nó?\r\nCó rất nhiều biến thể của Lorem Ipsum mà bạn có thể tìm thấy, nhưng đa số được biến đổi bằng cách thêm các yếu tố hài hước, các từ ngẫu nhiên có khi không có vẻ gì là có ý nghĩa. Nếu bạn định sử dụng một đoạn Lorem Ipsum, bạn nên kiểm tra kĩ để chắn chắn là không có gì nhạy cảm được giấu ở giữa đoạn văn bản.', NULL, b'1'),
(13, 6, 4, 8, '2020-04-02 08:42:37', 'Làm thế nào để có nó?\r\nCó rất nhiều biến thể của Lorem Ipsum mà bạn có thể tìm thấy, nhưng đa số được biến đổi bằng cách thêm các yếu tố hài hước, các từ ngẫu nhiên có khi không có vẻ gì là có ý nghĩa. Nếu bạn định sử dụng một đoạn Lorem Ipsum, bạn nên kiểm tra kĩ để chắn chắn là không có gì nhạy cảm được giấu ở giữa đoạn văn bản.', NULL, b'0'),
(14, 4, 9, 2, '2020-04-01 10:39:59', 'Trái với quan điểm chung của số đông, Lorem Ipsum không phải chỉ là một đoạn văn bản ngẫu nhiên. Người ta tìm thấy nguồn gốc của nó từ những tác phẩm văn học la-tinh cổ điển xuất hiện từ năm 45 trước Công Nguyên, nghĩa là nó đã có khoảng hơn 2000 tuổi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nPhasellus ut mi eu nibh volutpat molestie sed ut orci.\r\nNam fringilla dui a mi tempor suscipit.\r\nInteger non odio vitae est ornare fringilla a quis ipsum.\r\nCurabitur quis ipsum tristique, tincidunt est vel, blandit leo.\r\nCras sit amet nunc eu nibh iaculis ultrices sed eu urna.\r\nVivamus id neque quis dui posuere aliquet.\r\nUt quis arcu eget turpis placerat pulvinar sit amet quis arcu.\r\nNam imperdiet orci eu turpis imperdiet, id accumsan leo finibus.\r\nAenean a erat posuere, volutpat augue eget, porta urna.', NULL, b'0'),
(15, 4, 9, 1, '2020-04-01 10:39:59', 'Trái với quan điểm chung của số đông, Lorem Ipsum không phải chỉ là một đoạn văn bản ngẫu nhiên. Người ta tìm thấy nguồn gốc của nó từ những tác phẩm văn học la-tinh cổ điển xuất hiện từ năm 45 trước Công Nguyên, nghĩa là nó đã có khoảng hơn 2000 tuổi.\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nPhasellus ut mi eu nibh volutpat molestie sed ut orci.\r\nNam fringilla dui a mi tempor suscipit.\r\nInteger non odio vitae est ornare fringilla a quis ipsum.\r\nCurabitur quis ipsum tristique, tincidunt est vel, blandit leo.\r\nCras sit amet nunc eu nibh iaculis ultrices sed eu urna.\r\nVivamus id neque quis dui posuere aliquet.\r\nUt quis arcu eget turpis placerat pulvinar sit amet quis arcu.\r\nNam imperdiet orci eu turpis imperdiet, id accumsan leo finibus.\r\nAenean a erat posuere, volutpat augue eget, porta urna.', NULL, b'0'),
(16, 2, 7, 2, '2020-03-27 10:42:11', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"Không có ai muốn khổ đau cho chính mình, muốn tìm kiếm về nó và muốn có nó, bởi vì nó là sự đau khổ...\"', NULL, b'0'),
(17, 2, 7, 1, '2020-03-27 10:42:11', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"Không có ai muốn khổ đau cho chính mình, muốn tìm kiếm về nó và muốn có nó, bởi vì nó là sự đau khổ...\"', NULL, b'0'),
(19, 5, 10, 1, '2020-03-25 17:14:31', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan lacinia lacinia. Proin egestas purus non nulla auctor, nec rutrum magna dapibus. Donec tempus odio suscipit ex egestas vestibulum. Cras imperdiet ligula sed nisl interdum placerat. Ut interdum, magna non bibendum porttitor, diam massa ornare mauris, ut suscipit arcu augue eu mauris. Vivamus congue accumsan ante nec finibus. Morbi pharetra urna velit, eget posuere eros posuere eget. Etiam ultricies mauris ac maximus volutpat. Ut consequat ligula nibh, quis aliquam orci volutpat ac. Suspendisse non ante nibh.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc suscipit, ante non bibendum molestie, lorem urna vehicula ante, quis porttitor lacus turpis ut neque. Curabitur iaculis, mauris vel imperdiet lobortis, lacus mauris posuere nisi, ac elementum odio justo quis dolor. Suspendisse elit odio, finibus feugiat bibendum a, dictum nec ex. Nunc vitae bibendum nunc. Nullam viverra sem ut purus pellentesque, nec vulputate purus interdum. Sed tristique hendrerit nibh, ut aliquam massa maximus nec. Morbi laoreet porta felis. Duis auctor orci tortor, sit amet commodo tortor vulputate volutpat.', NULL, b'0'),
(20, 5, 10, 2, '2020-04-02 08:42:37', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan lacinia lacinia. Proin egestas purus non nulla auctor, nec rutrum magna dapibus. Donec tempus odio suscipit ex egestas vestibulum. Cras imperdiet ligula sed nisl interdum placerat. Ut interdum, magna non bibendum porttitor, diam massa ornare mauris, ut suscipit arcu augue eu mauris. Vivamus congue accumsan ante nec finibus. Morbi pharetra urna velit, eget posuere eros posuere eget. Etiam ultricies mauris ac maximus volutpat. Ut consequat ligula nibh, quis aliquam orci volutpat ac. Suspendisse non ante nibh.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc suscipit, ante non bibendum molestie, lorem urna vehicula ante, quis porttitor lacus turpis ut neque. Curabitur iaculis, mauris vel imperdiet lobortis, lacus mauris posuere nisi, ac elementum odio justo quis dolor. Suspendisse elit odio, finibus feugiat bibendum a, dictum nec ex. Nunc vitae bibendum nunc. Nullam viverra sem ut purus pellentesque, nec vulputate purus interdum. Sed tristique hendrerit nibh, ut aliquam massa maximus nec. Morbi laoreet porta felis. Duis auctor orci tortor, sit amet commodo tortor vulputate volutpat.', NULL, b'0'),
(21, 6, 12, 1, '2020-04-01 18:25:34', 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl.', NULL, b'1'),
(22, 6, 12, 2, '2020-04-02 08:42:37', 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl.', NULL, b'1'),
(23, 6, 12, 8, '2020-04-02 08:42:37', 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl.', NULL, b'1'),
(24, 7, 11, 1, '2020-03-31 18:28:37', 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl.', NULL, b'1'),
(25, 7, 11, 2, '2020-03-31 18:28:37', 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl.', NULL, b'1'),
(26, 7, 11, 8, '2020-04-02 08:42:37', 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl.', NULL, b'1'),
(27, 9, 13, 1, '2020-04-08 18:33:32', 'Lorem Ipsum\r\n\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"Không có ai muốn khổ đau cho chính mình, muốn tìm kiếm về nó và muốn có nó, bởi vì nó là sự đau khổ...\"\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan lacinia lacinia. Proin egestas purus non nulla auctor, nec rutrum magna dapibus. Donec tempus odio suscipit ex egestas vestibulum. Cras imperdiet ligula sed nisl interdum placerat. Ut interdum, magna non bibendum porttitor, diam massa ornare mauris, ut suscipit arcu augue eu mauris. Vivamus congue accumsan ante nec finibus. Morbi pharetra urna velit, eget posuere eros posuere eget. Etiam ultricies mauris ac maximus volutpat. Ut consequat ligula nibh, quis aliquam orci volutpat ac. Suspendisse non ante nibh.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc suscipit, ante non bibendum molestie, lorem urna vehicula ante, quis porttitor lacus turpis ut neque. Curabitur iaculis, mauris vel imperdiet lobortis, lacus mauris posuere nisi, ac elementum odio justo quis dolor. Suspendisse elit odio, finibus feugiat bibendum a, dictum nec ex. Nunc vitae bibendum nunc. Nullam viverra sem ut purus pellentesque, nec vulputate purus interdum. Sed tristique hendrerit nibh, ut aliquam massa maximus nec. Morbi laoreet porta felis. Duis auctor orci tortor, sit amet commodo tortor vulputate volutpat.', NULL, b'0'),
(28, 9, 13, 2, '2020-04-08 18:33:32', 'Lorem Ipsum\r\n\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"Không có ai muốn khổ đau cho chính mình, muốn tìm kiếm về nó và muốn có nó, bởi vì nó là sự đau khổ...\"\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan lacinia lacinia. Proin egestas purus non nulla auctor, nec rutrum magna dapibus. Donec tempus odio suscipit ex egestas vestibulum. Cras imperdiet ligula sed nisl interdum placerat. Ut interdum, magna non bibendum porttitor, diam massa ornare mauris, ut suscipit arcu augue eu mauris. Vivamus congue accumsan ante nec finibus. Morbi pharetra urna velit, eget posuere eros posuere eget. Etiam ultricies mauris ac maximus volutpat. Ut consequat ligula nibh, quis aliquam orci volutpat ac. Suspendisse non ante nibh.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc suscipit, ante non bibendum molestie, lorem urna vehicula ante, quis porttitor lacus turpis ut neque. Curabitur iaculis, mauris vel imperdiet lobortis, lacus mauris posuere nisi, ac elementum odio justo quis dolor. Suspendisse elit odio, finibus feugiat bibendum a, dictum nec ex. Nunc vitae bibendum nunc. Nullam viverra sem ut purus pellentesque, nec vulputate purus interdum. Sed tristique hendrerit nibh, ut aliquam massa maximus nec. Morbi laoreet porta felis. Duis auctor orci tortor, sit amet commodo tortor vulputate volutpat.', NULL, b'0'),
(29, 10, 4, 1, '2020-04-01 16:22:00', 'Lorem Ipsum\r\n\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"\r\n\"Không có ai muốn khổ đau cho chính mình, muốn tìm kiếm về nó và muốn có nó, bởi vì nó là sự đau khổ...\"\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan lacinia lacinia. Proin egestas purus non nulla auctor, nec rutrum magna dapibus. Donec tempus odio suscipit ex egestas vestibulum. Cras imperdiet ligula sed nisl interdum placerat. Ut interdum, magna non bibendum porttitor, diam massa ornare mauris, ut suscipit arcu augue eu mauris. Vivamus congue accumsan ante nec finibus. Morbi pharetra urna velit, eget posuere eros posuere eget. Etiam ultricies mauris ac maximus volutpat. Ut consequat ligula nibh, quis aliquam orci volutpat ac. Suspendisse non ante nibh.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc suscipit, ante non bibendum molestie, lorem urna vehicula ante, quis porttitor lacus turpis ut neque. Curabitur iaculis, mauris vel imperdiet lobortis, lacus mauris posuere nisi, ac elementum odio justo quis dolor. Suspendisse elit odio, finibus feugiat bibendum a, dictum nec ex. Nunc vitae bibendum nunc. Nullam viverra sem ut purus pellentesque, nec vulputate purus interdum. Sed tristique hendrerit nibh, ut aliquam massa maximus nec. Morbi laoreet porta felis. Duis auctor orci tortor, sit amet commodo tortor vulputate volutpat.', NULL, b'0'),
(30, 10, 7, 2, '2020-04-01 18:36:14', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam accumsan lacinia lacinia. Proin egestas purus non nulla auctor, nec rutrum magna dapibus. Donec tempus odio suscipit ex egestas vestibulum. Cras imperdiet ligula sed nisl interdum placerat. Ut interdum, magna non bibendum porttitor, diam massa ornare mauris, ut suscipit arcu augue eu mauris. Vivamus congue accumsan ante nec finibus. Morbi pharetra urna velit, eget posuere eros posuere eget. Etiam ultricies mauris ac maximus volutpat. Ut consequat ligula nibh, quis aliquam orci volutpat ac. Suspendisse non ante nibh.\r\n\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nunc suscipit, ante non bibendum molestie, lorem urna vehicula ante, quis porttitor lacus turpis ut neque. Curabitur iaculis, mauris vel imperdiet lobortis, lacus mauris posuere nisi, ac elementum odio justo quis dolor. Suspendisse elit odio, finibus feugiat bibendum a, dictum nec ex. Nunc vitae bibendum nunc. Nullam viverra sem ut purus pellentesque, nec vulputate purus interdum. Sed tristique hendrerit nibh, ut aliquam massa maximus nec. Morbi laoreet porta felis. Duis auctor orci tortor, sit amet commodo tortor vulputate volutpat.\r\n\r\nVivamus fermentum auctor blandit. Donec tristique aliquet nisl. Nullam quis vehicula nunc, sed porttitor ligula. Nam non ornare est. Nulla facilisi. Praesent posuere quis lacus ut rhoncus. Maecenas a consequat metus. Suspendisse at auctor mauris, et accumsan sapien. Nullam id diam consequat nulla tempus laoreet. Phasellus convallis mi augue, faucibus varius lectus imperdiet sit amet. Ut eget blandit lectus. Pellentesque eleifend orci eget auctor commodo. Quisque nec nulla sed sapien accumsan tempor non a magna. Praesent ultricies, enim ac porta sodales, velit risus luctus erat, in volutpat quam lectus eu massa. Quisque et maximus ex. Aliquam bibendum nisl ac nisi euismod, at hendrerit neque scelerisque.\r\n\r\nDonec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.\r\n\r\nPhasellus non dictum nisi. Nam nibh leo, maximus vel sagittis ac, tempor non libero. Sed sagittis, elit vitae laoreet elementum, nisi velit rutrum velit, vitae rhoncus diam ligula in nibh. Praesent ornare sapien odio, nec fringilla massa facilisis ac. Donec dapibus iaculis risus. Suspendisse iaculis, est eu vehicula pellentesque, nibh augue aliquam justo, sed venenatis nisi metus sit amet nisl. Ut at leo libero. Cras gravida malesuada felis. Ut consequat iaculis mauris vel mattis. Ut pharetra eget ipsum luctus porttitor. Quisque pharetra tellus at aliquet ultrices. Vivamus elementum rhoncus mi sit amet ultrices. Pellentesque vitae aliquet nisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean orci nunc, vehicula nec rhoncus vel, tempus id quam. Nulla ac sagittis quam, non iaculis sapien.', NULL, b'0'),
(31, 11, 2, NULL, NULL, 'Donec faucibus fermentum ex at eleifend. Fusce nisl massa, molestie at convallis sollicitudin, efficitur at nulla. Vivamus eu nisi nec dui mollis porta nec ac leo. Praesent imperdiet diam at nisi gravida, ac elementum odio semper. Ut ac mauris sed est hendrerit aliquet a iaculis erat. Proin commodo sem luctus, ullamcorper libero et, scelerisque lacus. Praesent neque magna, pulvinar blandit ornare quis, dapibus sed enim.', NULL, b'0'),
(32, 12, 6, 2, '2020-03-26 10:09:31', 'Phasellus rutrum fringilla dolor sed semper. Suspendisse sollicitudin dui vel tortor iaculis volutpat at malesuada risus. Nam sodales facilisis arcu vel pretium. Curabitur at nibh sit amet urna egestas convallis. Etiam hendrerit nisl felis, eget facilisis nibh tristique sit amet. Vivamus urna lorem, lacinia vitae mollis mattis, volutpat ac lacus. Vivamus aliquet nulla lacus, a tristique nibh tincidunt eu. Sed orci nunc, feugiat sed blandit at, vulputate ac eros. Ut elementum malesuada eros non tempus. Maecenas lacus sapien, varius eu lectus nec, pulvinar vestibulum mi. Aenean congue lacus a condimentum aliquam.', NULL, b'0'),
(33, 13, 6, 2, '2020-03-26 10:09:31', 'Phasellus rutrum fringilla dolor sed semper. Suspendisse sollicitudin dui vel tortor iaculis volutpat at malesuada risus. Nam sodales facilisis arcu vel pretium. Curabitur at nibh sit amet urna egestas convallis. Etiam hendrerit nisl felis, eget facilisis nibh tristique sit amet. Vivamus urna lorem, lacinia vitae mollis mattis, volutpat ac lacus. Vivamus aliquet nulla lacus, a tristique nibh tincidunt eu. Sed orci nunc, feugiat sed blandit at, vulputate ac eros. Ut elementum malesuada eros non tempus. Maecenas lacus sapien, varius eu lectus nec, pulvinar vestibulum mi. Aenean congue lacus a condimentum aliquam.', NULL, b'0'),
(34, 15, 9, 2, '2020-04-01 10:22:49', 'Fusce ornare non magna ac aliquet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non congue magna. Maecenas sodales ante et dolor fringilla blandit. Vestibulum mollis consequat massa, id egestas lorem rhoncus id. Duis vehicula ullamcorper pulvinar. In nec mi sit amet turpis tincidunt lobortis. Pellentesque lacinia accumsan dictum. Vestibulum ac felis ipsum. Sed blandit tempor ipsum, gravida facilisis neque mattis at. Donec rutrum quis odio et malesuada. Etiam mattis imperdiet purus, eget fringilla nunc iaculis ac.', NULL, b'0'),
(35, 14, 4, 2, '2020-04-01 10:22:49', 'Fusce ornare non magna ac aliquet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non congue magna. Maecenas sodales ante et dolor fringilla blandit. Vestibulum mollis consequat massa, id egestas lorem rhoncus id. Duis vehicula ullamcorper pulvinar. In nec mi sit amet turpis tincidunt lobortis. Pellentesque lacinia accumsan dictum. Vestibulum ac felis ipsum. Sed blandit tempor ipsum, gravida facilisis neque mattis at. Donec rutrum quis odio et malesuada. Etiam mattis imperdiet purus, eget fringilla nunc iaculis ac.', NULL, b'0'),
(36, 18, 2, NULL, NULL, NULL, NULL, b'0'),
(37, 16, 2, NULL, NULL, 'Maecenas facilisis enim et scelerisque tincidunt. Vivamus porttitor risus non purus pulvinar efficitur. Etiam semper convallis faucibus. Sed ante nisi, consequat et iaculis vitae, dictum quis nulla. Phasellus dignissim, mi et euismod bibendum, metus dolor placerat est, sit amet auctor lorem lectus vitae eros. Vestibulum tincidunt tristique felis. Donec id feugiat diam, a interdum lacus. Phasellus accumsan eget libero quis venenatis. Phasellus tempus tristique accumsan. Etiam at convallis nisi. Vivamus sed suscipit metus, tristique porttitor lacus.\r\n\r\nFusce ornare non magna ac aliquet. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam non congue magna. Maecenas sodales ante et dolor fringilla blandit. Vestibulum mollis consequat massa, id egestas lorem rhoncus id. Duis vehicula ullamcorper pulvinar. In nec mi sit amet turpis tincidunt lobortis. Pellentesque lacinia accumsan dictum. Vestibulum ac felis ipsum. Sed blandit tempor ipsum, gravida facilisis neque mattis at. Donec rutrum quis odio et malesuada. Etiam mattis imperdiet purus, eget fringilla nunc iaculis ac.\r\n\r\nSuspendisse scelerisque auctor augue, nec posuere nibh pellentesque at. Maecenas in condimentum lorem, ut cursus nisi. Aenean ac arcu quis justo pulvinar commodo. Mauris elementum et urna eget venenatis. Praesent elementum orci purus, eget tristique eros finibus id. Phasellus varius scelerisque neque. Pellentesque rhoncus libero nec quam dictum semper. Sed eros ipsum, dictum eget fringilla sit amet, aliquam sit amet ante. Praesent facilisis euismod diam, at faucibus libero congue ac.', NULL, b'0'),
(38, 17, 2, NULL, NULL, 'llentesque rhoncus libero nec quam dictum semper. Sed eros ipsum, dictum eget fringilla sit amet, aliquam sit amet ante. Praesent facilisis euismod diam, at faucibus libero congue ac.', NULL, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recyclebin`
--

CREATE TABLE `recyclebin` (
  `ID` int(11) NOT NULL,
  `DATE_EXPIRED` datetime NOT NULL,
  `USER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recyclebin`
--

INSERT INTO `recyclebin` (`ID`, `DATE_EXPIRED`, `USER_ID`) VALUES
(32, '2020-04-30 10:14:05', 2),
(33, '2020-04-29 10:14:05', 2),
(34, '2020-04-23 10:24:23', 2),
(35, '2020-04-23 10:24:23', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `spam`
--

CREATE TABLE `spam` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `spam`
--

INSERT INTO `spam` (`ID`, `USER_ID`) VALUES
(1, 1),
(21, 1),
(14, 2),
(22, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `star`
--

CREATE TABLE `star` (
  `ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `star`
--

INSERT INTO `star` (`ID`, `USER_ID`) VALUES
(6, 2),
(14, 2),
(16, 2),
(20, 2);

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
(1, 'Nguyễn Thúy Hằng', 'asset/images/avatar/users-16.svg', '0908089819', 'ngthhang9102000@gmail.com', '9a9c78a7298a9291d61d9f78b3c0b290'),
(2, 'Đoàn Hồng Phương Ngọc', 'asset/images/avatar/users-14.svg', '0933288236', 'doanhongphuongngoc@gmail.com', '70b1494dd92373021278682c4ab43b6c'),
(3, 'Phạm Đức Duy', 'asset/images/avatar/users-2.svg', '0354726844', 'ptduy861@gmail.com', 'afb326ef435912992996400297fb5b46'),
(4, 'Nguyễn Quế Chi', 'asset/images/avatar/users-12.svg', '0915648965', 'quechi2461@gmail.com', '1cf6f87dce279bdc982c6315d76cb287'),
(5, 'Phan Hải Đăng', 'asset/images/avatar/users-15.svg', '0978645687', 'phdang3345@gmail.com', 'c96e3760a924df57306c17a022279d5f'),
(6, 'Trần Thu Ngân', 'asset/images/avatar/users-5.svg', '0999912459', 'ttngan74466@gmail.com', 'a6b9b222b2608b3858e5c94a2d2cdbec'),
(7, 'Tiêu Trí Kiên', 'asset/images/avatar/users-11.svg', '0988515975', 'tieuchikien1230@gmail.com', '81376b67fa44c9dd77a433b0299c827a'),
(8, 'Trần Vũ Ngân', 'asset/images/avatar/users-3.svg', '0985678549', 'tranvungan@gmail.com', '1aeb357a508af2792b37ef8717d96bc7'),
(9, 'Phạm Văn Lâm', 'asset/images/avatar/users-1.svg', '0975684895', 'phamvanlam@gmail.com', 'cb7ae94d9e85607ac9f5508210f17b74'),
(10, 'Nguyễn Hùng Dũng', 'asset/images/avatar/users-4.svg', '0945698759', 'nguyenhungdung@gmail.com', '9c3b2d4d36adcf71499f0a1df90b98d9'),
(11, 'Trần Tuấn Sang', 'asset/images/avatar/users-8.svg', '0978645415', 'trantuansang@gmail.com', 'eb1fd358cd3656440e6be7d69528ba06'),
(12, 'Trần Bảo Long', 'asset/images/avatar/users-6.svg', '0975395186', 'tranbaolong@gmail.com', 'b1ab890c11bad9434bac7713c429785b'),
(13, 'Nguyễn Thị Thanh Nhàn', 'asset/images/avatar/users-9.svg', '0998488899', 'ngthanhnhan@gmail.com', '1f0a6517b776338267dbfd3f83478eff'),
(14, 'Chế Hoài Lộc', 'asset/images/avatar/users-10.svg', '094485596', 'chehoailoc@gmail.com', '621f97dc0e9022ecb2f56109fd62cbf9'),
(15, 'Trần Trung Hiếu', 'asset/images/avatar/users-13.svg', '0955955877', 'tthieu@gmail.com', '5718955a36cf7026072be649074d9873'),
(16, 'Nguyễn Văn Anh', NULL, '0908089833', 'ngvananh@gmail.com', '41270408db63fa433ded12a91b680069'),
(17, 'Nguyễn Văn Bình', NULL, '0988515123', 'ngvanbinh@gmail.com', 'a086eccff30b3bd14dbc132c79e08176'),
(18, 'Trần Cường', NULL, '0354726855', 'trancuong@gmail.com', 'de0fd71276a00a028be813d65b34da7c');

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_DRAFT_USER_USER_ID` (`USER_ID`);

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
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_RECYCLEBIN_USER_ID` (`USER_ID`);

--
-- Chỉ mục cho bảng `spam`
--
ALTER TABLE `spam`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_SPAM_USER_USERID` (`USER_ID`);

--
-- Chỉ mục cho bảng `star`
--
ALTER TABLE `star`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_STAR_USER_USER_ID` (`USER_ID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `mail`
--
ALTER TABLE `mail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  ADD CONSTRAINT `FK_DRAFT_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_DRAFT_USER_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `FK_USER_ID_RECEIVE` FOREIGN KEY (`USER_ID_RECEIVE`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USER_ID_SEND` FOREIGN KEY (`USER_ID_SEND`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `recyclebin`
--
ALTER TABLE `recyclebin`
  ADD CONSTRAINT `FK_RECYCLEBIN_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RECYCLEBIN_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `spam`
--
ALTER TABLE `spam`
  ADD CONSTRAINT `FK_SPAM_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SPAM_USER_USERID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `star`
--
ALTER TABLE `star`
  ADD CONSTRAINT `FK_STAR_MAIL_ID` FOREIGN KEY (`ID`) REFERENCES `mail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_STAR_USER_USER_ID` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
