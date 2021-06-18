-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2021 lúc 04:58 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `cake`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

CREATE TABLE `manufactures` (
  `manu_id` int(11) NOT NULL,
  `manu_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Bánh ngọt'),
(2, 'Bánh kem'),
(3, 'Kem plan'),
(4, 'Carament'),
(5, 'pudding'),
(6, 'Phô mai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `customerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `created_at`, `customerid`) VALUES
(4, '2021-06-18 05:46:09', 22);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pro_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `created_at`) VALUES
(82, 'Bánh dâu vị carament', 4, 1, 120000, 'c-feature-1.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 0, '2021-05-22 02:51:07'),
(81, 'Bánh dâu kem phomai', 4, 1, 6990000, 'c-feature-2.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 0, '2021-05-22 01:17:18'),
(78, 'Banh dau kem pho mai', 3, 1, 7490000, 'c-feature-3.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 0, '2021-05-22 01:17:29'),
(76, 'Banh dau kem pho mai', 2, 1, 11490000, 'c-feature-4.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 0, '2021-05-22 01:18:30'),
(73, 'Banh dau kem pho mai', 2, 1, 23990000, 'c-feature-5.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 1, '2021-05-22 01:18:32'),
(71, 'Banh dau kem pho mai', 2, 1, 26990000, 'c-feature-6.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 1, '2021-05-22 01:18:34'),
(89, 'dqad', 1, 1, 12000, 'c-feature-8.jpg', 'not value', 1, '2021-05-22 06:47:38'),
(90, 'banh', 1, 0, 130000, 'c-feature-9.jpg', 'ewtgrewg', 1, '2021-05-22 06:47:38'),
(91, 'dqad', 1, 1, 12000, 'c-feature-8.jpg', 'not value', 1, '2021-05-22 06:47:41'),
(92, 'banh', 1, 4, 130000, 'arivals-1.jpg', 'ewtgrewg', 1, '2021-06-14 00:00:03'),
(69, 'Banh dau kem pho mai', 1, 1, 17490000, 'c-feature-7.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 0, '2021-05-22 01:18:39'),
(100, 'Bánh flan', 5, 2, 25000, 'flan2.jpg', 'Loại bánh được chế biến từ việc hấp chín với các nguyên liệu chính là trứng và sữa, nước caramen được gọi là bánh flan', 1, '2021-05-30 04:57:07'),
(101, 'Bánh Donut', 1, 2, 89000, 'ngot1.png', 'Bánh Donut được làm bằng socola, đường, kẹo, hạt hạnh nhân...với nhiều màu sắc bắt mắt.', 0, '2021-05-30 05:03:51'),
(102, 'Bánh Cheesecake', 6, 2, 120000, 'ngot2.jpg', 'Cheesecake hay còn được gọi là bánh kem phô mai, dù được biến tấu với nhiều phiên bản khác nhau nhưng thành phần chính không thể thiếu cream cheese.', 1, '2021-05-30 05:09:11'),
(103, 'Bánh Mousse', 4, 4, 59000, 'ngot3.jpg', 'Mousse là loại bánh chuyên dùng để tráng miệng với phần bánh gato mỏng bên dưới, bên trên là lớp kem chanh leo – cam, chocolate, caramel… mềm mại, mát lạnh.', 1, '2021-05-30 05:08:37'),
(105, 'Bánh Tiramisu', 2, 3, 67000, 'ngot4.jpg', 'Tiramisu là loại bánh tráng miệng nổi tiếng của người Ý với vị bánh mềm ẩm, ngọt thanh nhẹ nhàng. Bánh quy Savoiardi, cà phê, phô mai Mascarpone, rượu Rhum, trứng, đường là những nguyên liệu thành phần làm nên bánh tiramisu.', 0, '2021-05-30 05:11:53'),
(106, 'Bánh Pound cake', 3, 2, 119000, 'ngot5.jpg', 'Pound cake có hàm lượng chất béo, độ ngọt và bông xốp cao – được tạo hình với khuôn loaf hoặc bundt.', 1, '2021-05-30 05:13:50'),
(107, 'Bánh Tart', 2, 3, 62000, 'kem1.jpg', 'Bánh Tart được xem là “anh em họ” của bánh Pie, nhưng khác nhau ở cách tạo hình. Bánh Tart không có phần vỏ trên – được trang trí bằng kem tươi hoặc trái cây.', 1, '2021-05-30 05:16:23'),
(108, 'Bánh Pancake', 4, 4, 129000, 'kem2.png', 'Bánh Pancake được làm chín bằng cách tráng một lớp dầu ăn mỏng hoặc quét một lớp bơ lên mặt chào, sau đó cho bột vào – tạo hình dẹt, tròn. Bánh được ăn kèm với mật ong – các loại trái cây tươi hoặc các loại mứt trái cây.', 1, '2021-05-30 05:18:05'),
(109, 'Bánh Strawberry', 2, 1, 112000, 'kem3.jpg', 'Bánh xếp xen kẽ giữa kem và dâu tạo nên hương thêm đặc trưng', 0, '2021-05-30 05:22:07'),
(110, 'Bánh Black Forest', 2, 1, 350000, 'kem4.jpg', 'Bánh Black Forest của Đức có phần chocolate ẩm và kem tươi xốp xen các lớp trái anh đào. Người Đức cũng thêm vào loại rượu từ quả anh đào tên là Kirsch Wasser, giúp vị ngọt của bánh dịu đi.', 0, '2021-05-30 05:24:00'),
(111, 'Bánh Cupcake', 2, 1, 78000, 'kem5.jpg\r\n', 'Bánh dạng nhỏ dùng như một khẩu phần, bánh thường được bao quanh bởi lớp giấy hình cốc xinh xắn, đẹp mắt', 0, '2021-05-30 05:26:56'),
(112, 'Bánh Chiffon', 4, 3, 169000, 'cara1.jpg', 'Bánh chiffon có sử dụng dầu ăn để làm thành phần chất béo trong bánh. Cả lòng trắng và lòng đỏ đều được sử dụng nhưng tách riêng trong quá trình làm.', 1, '2021-05-30 05:28:37'),
(113, 'Bánh Flan Dâu Tằm', 3, 4, 35000, 'flan2.jpg', 'bánh được hấp chín từ các nguyên liệu chính là trứng, sữa và hương thơm của dâu tằm', 1, '2021-05-30 05:33:27'),
(114, 'Bánh Makowiec', 4, 4, 180000, 'trangmieng1.jpg', 'Makowiec là một loại bánh cuộn men ngọt được làm bằng hạt hoa anh túc và có khi cũng được phủ bằng kem.', 0, '2021-05-30 05:36:52'),
(115, 'Bánh Brigadeiros', 4, 3, 65000, 'trangmieng2.jpg', 'Brigadeiros là món tráng miệng được chế biến bằng socola bột, sữa đặc và bơ. Bánh có thể được ăn như một khối hỗn hợp nấu chín hoặc có khi được đúc thành từng quả bóng tròn nhỏ bọc đường hạt bên ngoài.', 1, '2021-05-30 05:38:36'),
(123, 'Phương Nguyễn', 1, 1, 123, 'street_city_movement_135248.jpg-1920x1080.jpg', '123', 1, '2021-06-16 17:38:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

CREATE TABLE `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(1, 'Bánh sinh nhật'),
(2, 'Bánh kem mềm'),
(3, 'Bánh tự chọn'),
(4, 'Bánh có sẵn ngon khong');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `reviewer_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `reviewer_email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`review_id`, `product_id`, `reviewer_name`, `reviewer_email`, `content`, `created_at`) VALUES
(1, 123, 'viet nguyen', 'vietnguyen@gmail.com', 'Banh tam chap nhan duọc', '2021-06-17 00:00:00'),
(2, 115, 'cfsf', 'fdsf@gmail.com', 'fdsf', '2021-06-17 00:00:00'),
(3, 115, 'gdsg', 'fdsf@gmail.com', 'gdfg', '2021-06-17 00:00:00'),
(4, 115, 'Nguyen Quoc Viet', 'nguyenquocviet@gmail.com', 'Banh rất là ngon cảm thấy hài lòng', '2021-06-17 00:00:00'),
(5, 115, 'kha như', 'khanuh@gmail.com', 'Tôi thấy bánh ở đây ngon bổ rẻ', '2021-06-17 00:00:00'),
(6, 123, 'phuong123', '123', '1', '2021-06-17 10:38:33'),
(7, 123, 'phuong123', 'phuong@gmail.com', 'asdad', '2021-06-17 10:50:11'),
(8, 123, 'phuong', '', '123', '2021-06-17 11:04:22'),
(9, 123, 'phuong123', 'phuong@gmail.com', 'udpate ', '2021-06-17 18:44:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `permission`) VALUES
(7, 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 'admin'),
(2, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'Admin'),
(9, '213', '202cb962ac59075b964b07152d234b70', 'User'),
(10, 'phuong', '202cb962ac59075b964b07152d234b70', 'User'),
(22, 'phuong123', '202cb962ac59075b964b07152d234b70', 'User');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`manu_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `protypes`
--
ALTER TABLE `protypes`
  ADD PRIMARY KEY (`type_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `manu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
