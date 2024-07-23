-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 23, 2024 lúc 07:48 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `bill_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL COMMENT 'Tổng giá',
  `bill_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '''0:đơn hàng mới,1:đang chờ xử lí,2:đăng giao hàng,3đã giao hàng, 4:Hủy đơn hàng',
  `payment_status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: thanh toán trực tiếp, 2:chuyể khoăn , 3 thanh toán online',
  `created_datetime` datetime NOT NULL COMMENT 'ngày giờ đã tạo',
  `bill_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'mã hoá đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`bill_id`, `user_id`, `full_name`, `email`, `phone_number`, `address`, `total_price`, `bill_status`, `payment_status`, `created_datetime`, `bill_code`) VALUES
(1, NULL, 'Nguyễn Phương', 'nguyenphuongnam.intern@gmail.com', '0337412617', 'Thanh Mỹ - Sơn Tây - Hà Nội', 30.00, 0, 1, '2024-07-22 16:18:16', 'BILL669e86483d2c2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_item`
--

CREATE TABLE `bill_item` (
  `bill_item_id` int NOT NULL,
  `bill_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_avatar` varchar(255) NOT NULL,
  `product_sale_price` decimal(10,2) NOT NULL COMMENT 'giá bán sản phẩm',
  `quantity` int NOT NULL COMMENT 'Số lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_item`
--

INSERT INTO `bill_item` (`bill_item_id`, `bill_id`, `product_id`, `product_name`, `product_avatar`, `product_sale_price`, `quantity`) VALUES
(1, 1, 11, 'bun cha', 'bun cha', 25.00, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL COMMENT 'Số lượng',
  `bill_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Cơm trưa'),
(13, 'Đồ ăn'),
(14, 'Thức uống'),
(15, 'Tráng miệng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int NOT NULL COMMENT 'ID sản phẩm',
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'tên sản phẩm',
  `product_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci COMMENT 'Mô tả Sản phẩm',
  `product_avatar_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ảnh sản phẩm_url',
  `product_import_price` decimal(10,3) NOT NULL COMMENT 'giá nhập sản phẩm',
  `product_sale_price` decimal(10,3) DEFAULT NULL COMMENT 'giá bán sản phẩm',
  `product_listed_price` decimal(10,3) DEFAULT NULL COMMENT 'giá niêm yết sản phẩm',
  `product_stock` int DEFAULT NULL COMMENT 'kho sản phẩm',
  `category_id` int DEFAULT NULL COMMENT 'Thể loại ID category'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_avatar_url`, `product_import_price`, `product_sale_price`, `product_listed_price`, `product_stock`, `category_id`) VALUES
(6, 'Cơm rang cà chua', 'Nguyên liệu gồm :\r\n1 tô cơm ( tô canh)\r\n100gr lạp xưởng\r\n6 quả trứng gà\r\n200gr đậu que\r\nCà rốt, tỏi\r\nGia vị: Nước mắm, nước tương, bột ngọt, tiêu', 'com_rang_ca_chua.png', 30.000, 30.000, 30.000, 999999, 2),
(7, 'Cơm trưa đầy đủ', 'Nguyên liệu gồm :\r\n 1 tô cơm ( tô canh) 200gr thịt bò 3 quả trứng gà 100gr rau cải Cà rốt, tỏi Gia vị: Nước mắm, nước tương, bột ngọt, tiêu', 'Com_trua_day-du.jpg', 35.000, 35.000, 35.000, 999999, 2),
(8, 'Cơm gà rán', 'Nguyên liệu gồm: \r\nGạo 250 gr\r\n(1 lon)\r\n Đùi gà 1 cái\r\n(350gr)\r\n Hành tây 1/2 củ\r\n Dầu ăn 50 ml\r\n Bột nghệ 1.5 muỗng cà phê\r\n Muối/ Hạt nêm 1 ít', 'com_trua_ga_ran.jpg', 25.000, 25.000, 23.000, 9999999, 2),
(9, 'Cơm gà cải xoăn', 'Nguyên liệu gồm:\r\n1/2 miếng thịt ức gà không lấy da, xắt sợi cỡ ngón tay\r\n4 lá cải xoăn tước bỏ cọng, xé miếng\r\n3 quả trứng gà\r\n3 chén cơm\r\nGia vị: dầu olive, hạt nêm, nước mắm, bột ngọt, đường, tiêu, ớt', 'com_trung_cai_xoan.png', 30.000, 30.000, 30.000, 999999999, 2),
(10, 'Cơm gà sốt cà ri với cải Kale', 'Thành phần gồm:\r\n1/2 miếng thịt ức gà không lấy da, xắt sợi cỡ ngón tay\r\n4 lá cải Kale tước bỏ cọng, xé miếng\r\n3 quả trứng gà\r\n3 chén cơm\r\n4 muỗng canh sốt cà ri\r\nGia vị: dầu olive, hạt nêm, nước mắm, bột ngọt, đường, tiêu, ớt', 'cơm-ga-sốt-ca-ri-với-cải-kale-recipe-step-7-photo.webp', 30.000, 30.000, 30.000, 30, 2),
(11, 'Bánh bofcowm nguội', 'Nguyên liệu gồm:\r\n90gr cơm nguội\r\n180gr bột gạo\r\n120ml nước dừa tươi\r\n40ml nước cốt dừa\r\n20ml nước ấm\r\n70gr đường\r\n2gr men', 'banh_bo_com_nguoi_doc_dao_moi.jpg', 20.000, 20.000, 20.000, 99999999, 2),
(12, 'bánh rán từ cơm nguội', 'Nguyên liệu:\r\n1 chén cơm nguội\r\n30g thịt bằm chay\r\nHành tím, ớt, mè trắng rang\r\nGia vị: Đường, hạt nêm chay, tương ớt, dầu ăn, nước mắm chay', 'banh_gao_com_nguoi_voi_me_den.jpg', 20.000, 20.000, 20.000, 9999999, 2),
(13, 'Cơm chiên tôm xúc xích', 'Nguyên liệu gồm: \r\nCơm nguội để tủ lạnh qua đêm\r\nTrứng gà\r\nTỏi xay\r\nSpam\r\nTôm lột vỏ\r\nMăng tây\r\nHành lá\r\nDầu hào\r\nNước tương\r\nGia vị (đường, tiêu, hạt nêm)', 'cơm-chien-cho-bữa-trưa-nhanh-gọn-recipe-main-photo.webp', 25.000, 25.000, 23.000, 25, 2),
(14, 'Cơm rang dưa bò', 'Nguyên liệu gồm:\r\n300 gram thịt bò\r\n1-2 quả cà chua\r\n1 bát dưa cải chua\r\n2-3 bát cơm nguội\r\n2 quả trứng\r\n1 mẩu cà rốt\r\n4 củ hành khô to\r\n1 củ tỏi\r\n1 thìa dầu hào\r\n2 thìa mắm ngon\r\n1 thìa bột nêm\r\n1 nhúm tiêu xay\r\n1 bát con dầu ăn', 'cơm-rang-dưa-bo-cơm-trưa-vp-recipe-main-photo.webp', 30.000, 30.000, 30.000, 9999999, 2),
(15, 'Cơm chiên hạt điều', 'Nguyên liệu gồm: \r\n1 tô cơm nguội\r\n1 nắm hạt điều vụn hoặc vỡ đôi\r\n10 cái nấm bào ngư (nấm sò)\r\n1 cây cải kale\r\nĐậu hũ Nhật (không bắt buộc)\r\nHạt nêm chay', 'cơm-chien-hạt-diều-recipe-main-photo.webp', 25.000, 25.000, 25.000, 25, 2),
(16, 'Cơm cá lóc cải xoăn', 'Nguyên liệu gồm:\r\nRau cải xoăn\r\nCá lóc thái bỏ xương\r\nHành tím băm nhuyễn', 'cơm-ca-loc-cải-xoan-recipe-main-photo.webp', 25.000, 25.000, 24.000, 999999, 2),
(17, 'Cơm Tấm Chay', 'Nguyên liệu gồm:\r\nTấm\r\n500 gr tấm thơm\r\n5 gr dầu ăn\r\n420 gr nước\r\nNước mắm cơm tấm\r\n150 gr nước mắm chay\r\n283 gr đường\r\n8.3 gr muối\r\n150 gr nước lọc\r\nĐồ chua\r\n30 gr cà rốt\r\n150 gr củ cải trắng\r\n40 gr đường\r\n3 gr muối\r\n15 gr giấm\r\nDưa rau muống\r\n300 gr rau muống\r\n30 gr tỏi\r\n10 gr ớt\r\n30 gr hành tím\r\n50 gr đường\r\n30 gr giấm\r\n60 gr nước lọc\r\nBì chay\r\n2 vắt miến\r\n15 gr thính\r\n40 gr đậu hủ chiên\r\n10 gr hủ ki chiên\r\n5 gr tỏi phi\r\n2 gr muối\r\n5 gr đường\r\n1 gr bột ngọt\r\n5 gr hạt nêm\r\nChả chay\r\n1 hộp đậu hủ non\r\n50 gr đậu gà\r\n60 gr bánh mì\r\n60 gr sữa đậu nành\r\n150 gr thịt xay chay\r\n30 gr nấm mèo\r\n20 gr hành lá\r\n20 gr hành tím\r\n20 gr tỏi\r\n30 gr dầu ăn\r\n8 gr hạt nêm\r\n3 gr bột ngọt\r\n3 gr dầu mè\r\n5 gr dầu điều', 'cơm-tấm-chay-recipe-main-photo.webp', 30.000, 30.000, 30.000, 10, 2),
(18, 'Cơm chiên xanh', 'Nguyên liệu gồm:\r\nCồi sò điệp\r\nTôm (em thay bằng càng ghẹ)\r\nBắp ngọt, đậu ve, ớt chuông, cà rốt\r\nBột cải kale', 'cơm-chien-xanh-recipe-main-photo.webp', 30.000, 30.000, 30.000, 100, 2),
(19, 'Cơm chiên Hải sản xanh', 'Nguyên liệu gồm:\r\n 30p\r\n Em bé/người lớn\r\nCơm nấu chín để nguội\r\n1 con mực\r\n1-2 con tôm sơ chế sạch\r\nRau cải kale hoặc bó xôi\r\n1 mẩu nhỏ Carrot\r\nHành, tỏi\r\nBột hành\r\nGia vị (hạt nêm/tương)\r\nDầu ăn', 'cơm-chien-hải-sản-xanh-recipe-main-photo.webp', 30.000, 30.000, 30.000, 100, 2),
(20, 'Cơm rang keto', 'Nguyên liệu gồm: \r\nSúp lơ trắng. Cà rốt. Lá hẹ hoặc hành. Hành tây.\r\n1 ít Giò chả hoặc xúc xích (giò chả xúc xích tất cả đều mình tự làm mình mới ăn chứ ko mua ngoài. Ai ko tự làm dc thì nên ăn ít đồ mua sẵn thôi ạ,)\r\nMắm muối tiêu', 'cơm-rang-keto-danh-cho-những-bạn-dang-giảm-can-như-tớ-recipe-main-photo.webp', 25.000, 25.000, 25.000, 1000000000, 2),
(21, 'Cơm gà nướng mật ong ', 'Nguyên Liệu\r\n1 con gà tầm 1 kg rưỡi\r\nCơm trắng hoặc chiên\r\nKetchup, mật ong,dầu hào, muối,xì dầu,bột nêm\r\nĐồ chua cà rốt làm chua ngọt hoặc dưa leo,cà chua,xà lách\r\n3 củ hành tím', 'cơm-ga-nướng-mật-ong-recipe-main-photo.webp', 35.000, 35.000, 35.000, 99999999, 2),
(22, 'Cơm gạo lứt chiên hạt sen', 'Nguyên Liệu\r\n 40 phút\r\n 1 phần ăn\r\nCơm gạo lứt hạt sen rau củ\r\n25 g gạo lứt đồ Simply\r\n25 g hạt sen\r\n25 g cà rốt thái sợi\r\n25 g bắp vàng tách hạt\r\nỨc gà xào cải thìa và nấm đông cô\r\n75 g ức gà\r\n15 g nấm hương khô\r\n50 g cải thìa\r\nGia vị: dầu hào, hạt nêm', 'com_ga_gao.jpg', 30.000, 30.000, 30.000, 9999999, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone_number` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `avatar_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'ảnh user',
  `role` tinyint NOT NULL DEFAULT '0' COMMENT 'vai trò của người dùng',
  `token` varchar(100) DEFAULT NULL,
  `status` enum('Inactive','Active') DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `phone_number`, `address`, `full_name`, `avatar_url`, `role`, `token`, `status`) VALUES
(1, 'nguyenphuongnam.intern@gmail.com', '12345', '0337412617', '123', 'admin', 'Screenshot 2024-07-11 165115.png', 1, NULL, 'Active'),
(32, 'namnpph32407@fpt.edu.vn', '123456', '0337412617', '123Thanh Mỹ - Sơn Tây ', 'Nguyễn Nam', '40796_iphone_12_pro_max_gold_ha1.jpg', 0, '', 'Active');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `bill_item`
--
ALTER TABLE `bill_item`
  ADD PRIMARY KEY (`bill_item_id`),
  ADD KEY `bill_id` (`bill_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD UNIQUE KEY `bill_id` (`bill_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bill_item`
--
ALTER TABLE `bill_item`
  MODIFY `bill_item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT COMMENT 'ID sản phẩm', AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `bill_item`
--
ALTER TABLE `bill_item`
  ADD CONSTRAINT `bill_item_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bill_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
