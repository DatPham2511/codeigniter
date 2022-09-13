-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 13, 2022 lúc 06:40 PM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pdo_web_dien_tu`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `image`, `status`, `slug`) VALUES
(4, 'Apple', 'Thương hiệu Apple', '1662388225apple.jpg', 1, 'apple'),
(5, 'Dell', 'Thương hiệu Dell', '1662388288Dell_Logo.png', 1, 'dell'),
(6, 'Samsung', 'Thương hiệu Samsung', '1662388383Samsung-Logo.png', 1, 'samsung'),
(7, 'Asus', 'Thương hiệu Asus', '1662388452logo-asus-inkythuatso-2-01-26-09-21-11.jpg', 1, 'asus'),
(8, 'Hp', 'Thương hiệu Hp', '1662388524logo-hp.png', 1, 'hp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `image`, `slug`) VALUES
(4, 'Điện thoại', 'Điện thoại', 1, '1662388575Galaxy-A50-Mat-truoc-3.jpg', 'dien-thoai'),
(5, 'Laptop', 'Laptop', 1, '1662388662laptop.jpg', 'laptop'),
(6, 'Tai nghe', 'Tai nghe', 1, '1662388706tainghe.jpg', 'tai-nghe'),
(7, 'Ti vi', 'Tivi', 1, '1662388768untitled-1-1.jpg', 'tivi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(5, 'Đạt', 'dat@gmail.com', '123', '0975175507', 'Đại La'),
(6, 'Hưng', 'hung@gmail.com', '123', '0923456789', 'Giải Phóng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_orders`
--

CREATE TABLE `import_orders` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_admin` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `import_orders`
--

INSERT INTO `import_orders` (`id`, `id_admin`, `date`, `product_id`, `product_quantity`, `product_price`) VALUES
(8, 4, '05-09-2022 10:43:11pm', 9, 1, '8000000'),
(9, 4, '07-09-2022 09:25:52pm', 10, 1, '5000000'),
(10, 4, '08-09-2022 11:31:36pm', 12, 2, '5000000');

--
-- Bẫy `import_orders`
--
DELIMITER $$
CREATE TRIGGER `trigger_import` AFTER INSERT ON `import_orders` FOR EACH ROW UPDATE product SET product.quantity=product.quantity+NEW.product_quantity
WHERE product.id=NEW.product_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `ship_id` int(11) NOT NULL,
  `date` varchar(200) NOT NULL,
  `cus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `status`, `ship_id`, `date`, `cus_id`) VALUES
(18, '974', 2, 20, '05-09-2022 10:42:13pm', 5),
(19, '369', 1, 21, '08-09-2022 11:17:43pm', 5);

--
-- Bẫy `orders`
--
DELIMITER $$
CREATE TRIGGER `trigger_shipping` AFTER DELETE ON `orders` FOR EACH ROW DELETE FROM shipping 
WHERE shipping.id=old.ship_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_code`, `product_id`, `quantity`) VALUES
(19, '974', 9, 1),
(20, '974', 10, 1),
(21, '369', 12, 1);

--
-- Bẫy `order_details`
--
DELIMITER $$
CREATE TRIGGER `trigger_order` AFTER INSERT ON `order_details` FOR EACH ROW UPDATE product SET product.quantity=product.quantity-NEW.quantity WHERE product.id=NEW.product_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `slug` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `title`, `description`, `image`, `status`, `category_id`, `brand_id`, `slug`, `quantity`, `price`) VALUES
(9, 'Iphone 12', 'Apple Iphone 12 - 64GB', '1662388889apple-iphone-12-mini-5.png', 1, 4, 4, 'iphone-12', 10, '15000000'),
(10, 'Samsung Galaxy Note 20', 'Samsung Galaxy Note 20 Ultra 5G', '1662389052yellow_final_2.jpg', 1, 4, 6, 'samsung-galaxy-note-20', 10, '18000000'),
(11, 'Tivi Samsung 65RU7100', 'Tivi Samsung 65RU7100', '1662389185tivi-samsung-65ru71001.jpg', 1, 7, 6, 'tivi-samsung-65ru7100', 10, '17000000'),
(12, 'Tivi Samsung UA75TU8100', 'TV 4K 75 inch', '1662389453AV_000991_FEATURE_57994.jpg', 1, 7, 6, 'tivi-samsung-ua75tu8100', 11, '22000000'),
(13, 'Laptop Dell XPS 13', 'i5 1135G7, Ram: 8GB, SSD: 512GB', '1662389906dell.jpg', 1, 5, 5, 'laptop-dell-xps', 10, '35000000'),
(15, 'Laptop Asus Vivobook', 'i5 12500H/8GB/512GB/Win11', '1662390344asus-vivoboo.jpg', 1, 5, 7, 'laptop-asus-vivobook', 10, '20000000'),
(16, 'Tai nghe Apple', 'Tai nghe AirPords Max', '1662390584silver.png', 1, 6, 4, 'tai-nghe-apple', 10, '9500000'),
(17, 'Tai nghe Asus', 'ROG STRIX FUSION 300', '16623907011.jpg', 1, 6, 7, 'tai-nghe-asus', 10, '3000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `phone`, `email`, `method`, `address`) VALUES
(20, 'Đạt', '0975175507', 'dat@gmail.com', 'cod', 'Đại La'),
(21, 'Đạt', '0975175507', 'dat@gmail.com', 'cod', 'Đại La');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(4, 'Hải', 'hai@gmail.com', '123'),
(6, 'Hoàng', 'hoang@gmail.com', '123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `import_orders`
--
ALTER TABLE `import_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`,`brand_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `import_orders`
--
ALTER TABLE `import_orders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
