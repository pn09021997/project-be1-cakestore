-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2021 lúc 04:33 AM
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
(4, '2021-06-18 05:46:09', 22),
(5, '2021-06-18 10:39:51', 10),
(6, '2021-06-18 20:19:30', 23),
(7, '2021-06-18 20:41:28', 24),
(8, '2021-06-18 21:17:08', 25),
(9, '2021-06-18 23:03:56', 26),
(10, '2021-06-18 23:04:22', 27),
(11, '2021-06-18 23:37:05', 28),
(12, '2021-06-18 23:38:04', 29),
(13, '2021-06-18 23:40:13', 30),
(14, '2021-06-18 23:41:58', 31),
(15, '2021-06-18 23:44:20', 32),
(16, '2021-06-19 00:38:30', 33),
(17, '2021-06-19 07:40:35', 34);

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

--
-- Đang đổ dữ liệu cho bảng `ordersdetail`
--

INSERT INTO `ordersdetail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(5, 92, 9, 1430000),
(5, 113, 2, 70000),
(6, 123, 3, 369),
(16, 89, 12, 264000),
(16, 91, 1, 122000),
(16, 92, 12, 456000),
(6, 89, 1, 22000),
(6, 90, 1, 58000),
(6, 91, 1, 122000),
(6, 92, 1, 38000),
(7, 89, 1, 22000),
(7, 90, 1, 58000),
(7, 91, 1, 122000),
(7, 92, 1, 38000),
(4, 81, 6, 156000),
(4, 82, 1, 27000),
(4, 126, 102, 12546);

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
  `receipt` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`, `receipt`, `created_at`) VALUES
(82, 'Bánh dâu vị carament', 4, 1, 27000, 'c-feature-1.jpg', 'Bánh chứa hương vị đặc trưng từ lớp kem và tạo hình dễ thương', 0, 200, '2021-06-18 22:41:57'),
(81, 'Bánh kem matcha', 4, 1, 26000, 'c-feature-2.jpg', 'Bánh vị ngon thanh mát, thơm mùi trà xanh được trang trí theo dạng Layer. Rất phù hợp với những bạn thích ăn nhiều bánh ít kem. Thơm ngon mà không ngán!', 0, 100, '2021-06-18 21:37:35'),
(78, 'Bánh socola', 3, 1, 65000, 'c-feature-3.jpg', 'Bánh chứa hương vị đặc biệt của vị socola', 0, 100, '2021-06-18 21:37:35'),
(76, 'Bánh gato nướng', 2, 1, 28000, 'banhgato.jpg', 'Cupcake còn có tên gọi khác là banh 1234 với thành phần nguyên liệu chính là 1 cup bơ, 2 cup đường, 3 cup bột mì, 4 quả trứng gà.', 0, 100, '2021-06-18 21:37:35'),
(73, 'Bánh Socola mềm ', 2, 1, 88000, 'c-feature-5.jpg', 'Đặc trưng của loại bánh này là lớp nhân socola mềm và tươi mát.', 1, 100, '2021-06-18 21:37:35'),
(71, 'Bánh kem dâu tươi', 2, 1, 269000, 'c-feature-6.jpg', 'Bánh được trang trí độc đáo, tạo hình các bông hoa bằng kem và có vị dâu thơm ngon', 1, 100, '2021-06-18 21:37:35'),
(89, 'Bánh sừng bò', 1, 4, 22000, 'banhsungbo.jpg', 'Bánh sừng bò rất nổi tiếng ở Pháp, tuy nhiên nguồn gốc của nó là từ Áo. Loại bánh này còn có tên gọi khác là bánh con cua, với thành phần nguyên liệu làm từ bột mì, sữa, bơ, men và muối', 1, 100, '2021-06-18 21:37:35'),
(90, 'Bánh Muffin', 1, 4, 58000, 'muffin.jpg', 'bánh thường được tạo hình trong những chiếc cốc giấy xinh xắn với nhân mặn hoặc ngọt', 1, 100, '2021-06-18 21:37:35'),
(91, 'Bánh Coffee cake', 4, 2, 122000, 'coffee.jpg', 'bánh rất thích hợp để phục vụ trong các buổi tiệc trà… được tạo hình trong khuôn tròn, vuông hoặc hình chữ nhật.', 1, 100, '2021-06-18 21:37:35'),
(92, 'Bánh Crepes', 5, 3, 38000, 'crepe.jpg', 'bánh crepes thơm ngon và ấn tượng với những hương vị đặc biệt thu hút.', 1, 100, '2021-06-18 21:37:35'),
(100, 'Bánh flan', 5, 2, 25000, 'flan2.jpg', 'Loại bánh được chế biến từ việc hấp chín với các nguyên liệu chính là trứng và sữa, nước caramen được gọi là bánh flan', 1, 100, '2021-06-18 21:37:35'),
(101, 'Bánh Donut', 1, 2, 89000, 'ngot1.png', 'Bánh Donut được làm bằng socola, đường, kẹo, hạt hạnh nhân...với nhiều màu sắc bắt mắt.', 0, 100, '2021-06-18 21:37:35'),
(102, 'Bánh Cheesecake', 6, 2, 120000, 'ngot2.jpg', 'Cheesecake hay còn được gọi là bánh kem phô mai, dù được biến tấu với nhiều phiên bản khác nhau nhưng thành phần chính không thể thiếu cream cheese.', 1, 100, '2021-06-18 21:37:35'),
(103, 'Bánh Mousse', 4, 4, 59000, 'ngot3.jpg', 'Mousse là loại bánh chuyên dùng để tráng miệng với phần bánh gato mỏng bên dưới, bên trên là lớp kem chanh leo – cam, chocolate, caramel… mềm mại, mát lạnh.', 1, 100, '2021-06-18 21:37:35'),
(105, 'Bánh Tiramisu', 2, 3, 67000, 'ngot4.jpg', 'Tiramisu là loại bánh tráng miệng nổi tiếng của người Ý với vị bánh mềm ẩm, ngọt thanh nhẹ nhàng. Bánh quy Savoiardi, cà phê, phô mai Mascarpone, rượu Rhum, trứng, đường là những nguyên liệu thành phần làm nên bánh tiramisu.', 0, 100, '2021-06-18 21:37:35'),
(106, 'Bánh Pound cake', 3, 2, 119000, 'ngot5.jpg', 'Pound cake có hàm lượng chất béo, độ ngọt và bông xốp cao – được tạo hình với khuôn loaf hoặc bundt.', 1, 100, '2021-06-18 21:37:35'),
(107, 'Bánh Tart', 2, 3, 62000, 'kem1.jpg', 'Bánh Tart được xem là “anh em họ” của bánh Pie, nhưng khác nhau ở cách tạo hình. Bánh Tart không có phần vỏ trên – được trang trí bằng kem tươi hoặc trái cây.', 1, 100, '2021-06-18 21:37:35'),
(108, 'Bánh Pancake', 4, 4, 129000, 'kem2.png', 'Bánh Pancake được làm chín bằng cách tráng một lớp dầu ăn mỏng hoặc quét một lớp bơ lên mặt chào, sau đó cho bột vào – tạo hình dẹt, tròn. Bánh được ăn kèm với mật ong – các loại trái cây tươi hoặc các loại mứt trái cây.', 1, 100, '2021-06-18 21:37:35'),
(109, 'Bánh Strawberry', 2, 1, 112000, 'kem3.jpg', 'Bánh xếp xen kẽ giữa kem và dâu tạo nên hương thêm đặc trưng', 0, 100, '2021-06-18 21:37:35'),
(110, 'Bánh Black Forest', 2, 1, 350000, 'kem4.jpg', 'Bánh Black Forest của Đức có phần chocolate ẩm và kem tươi xốp xen các lớp trái anh đào. Người Đức cũng thêm vào loại rượu từ quả anh đào tên là Kirsch Wasser, giúp vị ngọt của bánh dịu đi.', 0, 100, '2021-06-18 21:37:35'),
(111, 'Bánh Cupcake', 2, 1, 78000, 'kem5.jpg\r\n', 'Bánh dạng nhỏ dùng như một khẩu phần, bánh thường được bao quanh bởi lớp giấy hình cốc xinh xắn, đẹp mắt', 0, 100, '2021-06-18 21:37:35'),
(112, 'Bánh Chiffon', 4, 3, 169000, 'cara1.jpg', 'Bánh chiffon có sử dụng dầu ăn để làm thành phần chất béo trong bánh. Cả lòng trắng và lòng đỏ đều được sử dụng nhưng tách riêng trong quá trình làm.', 1, 100, '2021-06-18 21:37:35'),
(113, 'Bánh Flan Dâu Tằm', 3, 4, 35000, 'flan2.jpg', 'bánh được hấp chín từ các nguyên liệu chính là trứng, sữa và hương thơm của dâu tằm', 1, 100, '2021-06-18 21:37:35'),
(114, 'Bánh Makowiec', 4, 4, 180000, 'trangmieng1.jpg', 'Makowiec là một loại bánh cuộn men ngọt được làm bằng hạt hoa anh túc và có khi cũng được phủ bằng kem.', 0, 100, '2021-06-18 21:37:35'),
(115, 'Bánh Brigadeiros', 4, 3, 65000, 'trangmieng2.jpg', 'Brigadeiros là món tráng miệng được chế biến bằng socola bột, sữa đặc và bơ. Bánh có thể được ăn như một khối hỗn hợp nấu chín hoặc có khi được đúc thành từng quả bóng tròn nhỏ bọc đường hạt bên ngoài.', 1, 100, '2021-06-18 21:37:35'),
(128, 'adssdsad', 1, 1, 123456, 'street_city_movement_135248.jpg-1920x1080.jpg', 'New adding', 1, 100456, '2021-06-18 20:09:27'),
(126, 'Phương Nguyễn', 1, 1, 123456, '4449026.jpg', '123456', 1, 100, '2021-06-18 19:57:04');

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
(12, 82, 'phuong123', 'phuong@gmail.com', 'dáhdjađá', '2021-06-19 07:39:15'),
(11, 82, 'phuong123', 'phuong@gmail.com', '213qew', '2021-06-19 07:38:50');

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
(10, 'phuong', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin'),
(22, 'phuong123', '202cb962ac59075b964b07152d234b70', 'User'),
(23, 'phuong97', '202cb962ac59075b964b07152d234b70', 'User'),
(24, 'phuong92', '202cb962ac59075b964b07152d234b70', 'User'),
(34, 'nhu123', '8ef41977a3cadd0ee7680fc49cf5b5d4', 'User');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT cho bảng `protypes`
--
ALTER TABLE `protypes`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
