-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 05, 2024 at 09:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int NOT NULL COMMENT 'Mã bình luận',
  `hh_id` int NOT NULL COMMENT 'Mã hàng hóa',
  `kh_id` int NOT NULL COMMENT 'Mã khách hàng',
  `noi_dung` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Nội dung bình luận',
  `ngay_bl` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Ngày bình luận',
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `trangthai`) VALUES
(10, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int NOT NULL,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `mau_id` int NOT NULL,
  `size_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int NOT NULL COMMENT 'Mã khách hàng',
  `ho_ten` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Tên khách hàng',
  `user` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tên đăng nhập',
  `mat_khau` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Mật khẩu tài khoản',
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Email',
  `hinh` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh',
  `diachi` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ',
  `dienthoai` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL COMMENT 'Số điện thoại',
  `vai_tro` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Vai trò tài khoản 0 là bình thường 1 là nhân viên',
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ho_ten`, `user`, `mat_khau`, `email`, `hinh`, `diachi`, `dienthoai`, `vai_tro`, `trangthai`) VALUES
(2, 'Lê Đức Anh', 'admin', '1', 'anh1280@gmail.com', 'uploads/users/1711386087-z4955896931080_f6c75c5bb1c98c55f23ed824cb8965a4.jpg', 'Vinh Phuc', '0979260932', 1, 1),
(3, 'Tung Lam', 'admin1', '1', 'lamndtph46170@fpt.edu.vn', 'uploads/users/1712138657-abfa9f415acb217b555b97021790c622--dont-let-you-from.jpg', 'hanoi', '0878555203', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `id` int NOT NULL COMMENT 'Mã loại ',
  `ten_loai` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'Tên loại',
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`id`, `ten_loai`, `trangthai`) VALUES
(1, 'Áo', 1),
(2, 'Quần', 1);

-- --------------------------------------------------------

--
-- Table structure for table `magiamgia`
--

CREATE TABLE `magiamgia` (
  `id` int NOT NULL,
  `voucher` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ngaybd` date NOT NULL,
  `ngayketthuc` date NOT NULL,
  `hh_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mauhh`
--

CREATE TABLE `mauhh` (
  `id` int NOT NULL,
  `hh_id` int NOT NULL,
  `mau` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `mauhh`
--

INSERT INTO `mauhh` (`id`, `hh_id`, `mau`, `trangthai`) VALUES
(21, 16, '#4e26ab', 1),
(22, 16, '#c15353', 1),
(23, 17, '#000000', 1),
(24, 17, '#000000', 1),
(25, 18, '#ffffff', 1),
(26, 18, '#000000', 1),
(27, 19, '#a19b9b', 1),
(28, 20, '#000000', 1),
(29, 20, '#c2bcbc', 1),
(30, 21, '#8f8f8f', 1),
(31, 21, '#e6e6e6', 1),
(32, 21, '#1b84a7', 1),
(33, 22, '#000000', 1),
(34, 22, '#837c7c', 1),
(35, 23, '#253e64', 1),
(36, 23, '#f6f1ed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oder_items`
--

CREATE TABLE `oder_items` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `size_id` int NOT NULL,
  `mau_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oder_items`
--

INSERT INTO `oder_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `trangthai`, `size_id`, `mau_id`) VALUES
(24, 30, 23, 1, 399000, 1, 128, 36),
(25, 31, 21, 2, 899000, 1, 113, 32),
(26, 32, 16, 1, 110000, 1, 63, 21),
(27, 33, 23, 2, 399000, 1, 128, 36),
(28, 34, 23, 1, 399000, 1, 128, 36),
(29, 35, 23, 1, 399000, 1, 128, 36),
(30, 36, 23, 1, 399000, 1, 128, 36),
(31, 37, 23, 1, 399000, 1, 128, 36),
(32, 38, 22, 1, 499000, 1, 120, 34),
(33, 39, 22, 1, 499000, 1, 120, 34),
(34, 40, 23, 1, 399000, 1, 128, 36),
(35, 41, 17, 4, 90000, 1, 77, 24),
(36, 41, 20, 3, 450000, 1, 101, 29),
(37, 42, 22, 2, 499000, 1, 120, 34),
(38, 43, 16, 1, 110000, 1, 66, 22),
(39, 44, 23, 1, 399000, 1, 128, 36),
(40, 45, 22, 1, 499000, 1, 120, 34),
(41, 46, 23, 1, 399000, 1, 121, 35),
(42, 47, 22, 1, 499000, 1, 120, 34),
(43, 48, 22, 1, 499000, 1, 120, 34),
(44, 49, 22, 1, 499000, 1, 120, 34),
(45, 50, 23, 20, 399000, 1, 125, 36);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `total_bill` int NOT NULL,
  `status_delivery` int NOT NULL COMMENT 'Trang thái vận chuyển đơn hàng: Dưới đây đang lấy theo trạng thái của shopee. 0: chờ xác nhận 1: chờ lấy hàng 2: chờ giao hàng 3: đã giao -1: đã hủy	',
  `status_payment` int NOT NULL COMMENT '0 là thanh toán khi nhận hàng 1 là thanh toán qua vnpay\r\n',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ngày tạo đơn hàng	',
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'ngày cập nhật cuối cùng	',
  `shipping` varchar(255) NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1',
  `thanhtoan` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 là chưa thanh toán 1 là đã thanh toán\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `user_email`, `user_phone`, `user_address`, `total_bill`, `status_delivery`, `status_payment`, `created_at`, `updated_at`, `shipping`, `trangthai`, `thanhtoan`) VALUES
(30, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, -1, 0, '2024-04-04 17:51:17', '2024-04-04 17:51:17', 'Giao hàng tiết kiệm', 1, 0),
(31, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 1798000, 3, 0, '2024-04-04 17:51:28', '2024-04-04 17:51:28', 'Giao hàng tiết kiệm', 1, 0),
(32, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 110000, 3, 0, '2024-04-04 18:24:48', '2024-04-04 18:24:48', 'Giao hàng tiết kiệm', 1, 0),
(33, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 798000, 3, 0, '2024-04-04 19:28:08', '2024-04-03 19:28:08', 'Giao hàng tiết kiệm', 1, 0),
(34, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 0, '2024-04-05 12:48:42', '2024-04-05 12:48:42', 'Giao hàng tiết kiệm', 1, 0),
(35, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 1, '2024-04-05 12:49:42', '2024-04-05 12:49:42', 'Giao hàng tiết kiệm', 1, 0),
(36, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 1, '2024-04-05 12:49:54', '2024-04-05 12:49:54', 'Giao hàng tiết kiệm', 1, 0),
(37, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 1, '2024-04-05 14:10:10', '2024-04-05 14:10:10', 'Giao hàng tiết kiệm', 1, 0),
(38, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 499000, 0, 1, '2024-04-05 14:11:29', '2024-04-05 14:11:29', 'Giao hàng tiết kiệm', 1, 0),
(39, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 499000, 0, 0, '2024-04-05 14:50:09', '2024-04-05 14:50:09', 'Giao hàng tiết kiệm', 1, 0),
(40, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 1, '2024-04-05 14:51:08', '2024-04-05 14:51:08', 'Giao hàng tiết kiệm', 1, 0),
(41, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 1350040, 0, 1, '2024-04-05 14:58:43', '2024-04-05 14:58:43', 'Giao hàng tiết kiệm', 1, 0),
(42, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 998000, 0, 1, '2024-04-05 14:59:48', '2024-04-05 14:59:48', 'Giao hàng tiết kiệm', 1, 0),
(43, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 110000, 0, 1, '2024-04-05 15:01:01', '2024-04-05 15:01:01', 'Giao hàng tiết kiệm', 1, 0),
(44, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 1, '2024-04-05 15:05:01', '2024-04-05 15:05:01', 'Giao hàng tiết kiệm', 1, 0),
(45, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 499000, 0, 1, '2024-04-05 15:10:29', '2024-04-05 15:10:29', 'Giao hàng tiết kiệm', 1, 0),
(46, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 399000, 0, 1, '2024-04-05 15:23:28', '2024-04-05 15:23:28', 'Giao hàng tiết kiệm', 1, 1),
(47, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 499000, 0, 1, '2024-04-05 15:26:08', '2024-04-05 15:26:08', 'Giao hàng tiết kiệm', 1, 1),
(48, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 499000, 0, 1, '2024-04-05 15:30:41', '2024-04-05 15:30:41', 'Giao hàng tiết kiệm', 1, 1),
(49, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 499000, 0, 1, '2024-04-05 15:31:54', '2024-04-05 15:31:54', 'Giao hàng tiết kiệm', 1, 1),
(50, 2, 'Lê Đức Anh', 'anh1280@gmail.com', '0979260932', 'Vinh Phuc', 7980000, 0, 1, '2024-04-05 15:41:48', '2024-04-05 15:41:48', 'Giao hàng tiết kiệm', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `ten_hh` varchar(255) NOT NULL,
  `don_gia` double(10,2) NOT NULL,
  `giam_gia` double(10,2) NOT NULL DEFAULT '0.00',
  `so_luot_xem` int NOT NULL DEFAULT '0',
  `mo_ta` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ngay_nhap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hinh` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `loai_id` int DEFAULT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `ten_hh`, `don_gia`, `giam_gia`, `so_luot_xem`, `mo_ta`, `ngay_nhap`, `hinh`, `loai_id`, `trangthai`) VALUES
(16, 'PITTI UOMO TROUSERS', 110000.00, 0.00, 1, 'BST \"Bloom\" Xuân/Hạ 2024 - Quần âu đúng chuẩn trai Ý, xếp li kỹ càng (Pitti Uomo: lễ hội thời trang bên Ý).\r\n\r\nForm dáng: Semi Wide.Chất liệu: Vải sợi tổng hợp.Quần có đai giả thắt lưng, có thể thắt cả thân trước và thân sau.Phần cơi túi sau được thiết kế cách điệu so với cơ bản.Hình thêu “ You look good“ tiệp màu vải chính, ở gấu quần bên trái khi mặc.3 màu: Nâu nhạt, Đen, Xám nhạt.', '06:08:05 26/03/2024', 'uploads/products/1711476485-1710834640700.jpeg,uploads/products/1711476485-1710834640712.jpeg,uploads/products/1711476485-1710834735562.jpeg,uploads/products/1711476485-1710834735751.jpeg', 2, 1),
(17, 'AMERICAN MINIMAL JACKET', 100000.00, 10.00, 6, 'American Minimal Jacket - Áo khoác da lộn có khóa kéo.\r\n\r\nMẫu Jacket mới nhất của SSStutter mang đến vẻ ngoài cổ điển và tối giản với chất liệu vải da lộn đẹp vượt thời gian và kiểu dáng vừa vặn thoải mái.\r\n\r\nForm dáng: Regular vừa vặn thoải mái.Chất liệu: Vải da lộn nhập khẩu.2 màu: Nâu đậm, Đen.Áo dài tay, chi tiết dây kéo ở cổ tay áo, túi 2 bên, k.hóa kéo cao cấp.Thiết kế tối giản.\r\n\r\nNgười mẫu cao 1m74, nặng 73 kg, số đo 92-71-90 cm, mặc size 2.', '06:00:38 26/03/2024', 'uploads/products/1711386634-1705658116011 - Copy - Copy.jpeg,uploads/products/1711386634-1705658116011.jpeg,uploads/products/1711386634-1705658122234 - Copy - Copy.jpeg,uploads/products/1711386634-1705658122234 - Copy (2).jpeg,uploads/products/1711386634-1705658136100 - Copy - Copy.jpeg,uploads/products/1711386634-1708329027044 - Copy - Copy.jpeg,uploads/products/1711386634-1708329027044.jpeg', 1, 1),
(18, 'FRESH POLO - BLOOM', 100000.00, 0.00, 1, 'BST \"Bloom\" Xuân/Hạ 2024 - Áo polo thêu hoạ tiết hoa Thủy Tiên.\r\nChất liệu: Vải lacoste mắt bé nhẹ, thoáng mát.\r\nĐã được xử lý hạn chế có sau giặt.\r\nForm dáng: Regular.\r\n3 màu: Trắng, Be, Nâu.\r\nHình thêu \"You look good\" tiệp màu vải chính ở tay trái.\r\nHình thêu hoa thuỷ tiên tiệp màu vải chính', '06:11:59 26/03/2024', 'uploads/products/1711476719-1710743360396.jpeg,uploads/products/1711476719-1710743360470.jpeg,uploads/products/1711476719-1710743395268.jpeg,uploads/products/1711476719-1710743395292.jpeg', 1, 1),
(19, 'SSS CHECKERED CARDIGAN', 100000.00, 0.00, 0, 'LEAN RAGLAN JACKET -  Chiếc áo khoác với vai Raglan có thiết kế Lean (tinh gọn), phù hợp với những chàng trai thích phong cách Minimalism (tối giản).\r\n\r\nChất liệu : Dạ cao cấp.Form: Crop, giúp các chàng trai hack dáng, kéo dài tỉ lệ cơ thể.Màu : Navy.Cổ bẻ, tay dài.Có túi nắp hai bên và một túi ở lớp lót bên trong.Nhiều chi tiết signature của SSStutter trong thiết kế áo.', '06:14:39 26/03/2024', 'uploads/products/1711476879-1702562350327.jpeg,uploads/products/1711476879-1702563600475.jpeg,uploads/products/1711476879-1702563600558.jpeg', 1, 1),
(20, 'WOOL HALF-ZIP SWEATER', 450000.00, 0.00, 1, 'WOOL HALF-ZIP SWEATER', '06:27:05 26/03/2024', 'uploads/products/1711477625-1703579511931.jpeg,uploads/products/1711477625-1703579512013.jpeg,uploads/products/1711477625-1703579532742.jpeg,uploads/products/1711477625-1703579532843.jpeg,uploads/products/1711477625-1703579542950.jpeg,uploads/products/1711477625-1703579543072.jpeg', 1, 1),
(21, 'SMART POCKET SHIRT', 899000.00, 0.00, 35, 'Áo thông minh có túi, 2 cổ linh hoạt và hình thêu Thỏ - linh vật của SSS.\r\n\r\nChất liệu: Oxford cao cấp, chống nhăn.Form dáng: Regular.2 cổ linh hoạt: Cổ áo có thể tháo rời, mặc được 2 kiểu cổ Đức hoặc cổ Tàu.Cảm giác mặc mềm mịn, thoáng mát.Có túi ở ngực, hình thêu thỏ tỉ mỉ trên túi, tiệp với màu vải.3 màu: Xanh lơ, Xám nhạt, Nâu nhạt.', '06:31:20 26/03/2024', 'uploads/products/1711477880-1703042380524.jpeg,uploads/products/1711477880-1703042380623.jpeg,uploads/products/1711477880-1703042448896.jpeg,uploads/products/1711477880-1703042449364.jpeg,uploads/products/1711477880-1703042701365.jpeg,uploads/products/1711477880-1703042701380.jpeg', 1, 1),
(22, 'PITTI UOMO TROUSERS', 499000.00, 0.00, 302, 'BST \"Bloom\" Xuân/Hạ 2024 - Quần âu đúng chuẩn trai Ý, xếp li kỹ càng (Pitti Uomo: lễ hội thời trang bên Ý).\r\n\r\nForm dáng: Semi Wide.Chất liệu: Vải sợi tổng hợp.Quần có đai giả thắt lưng, có thể thắt cả thân trước và thân sau.Phần cơi túi sau được thiết kế cách điệu so với cơ bản.Hình thêu “ You look good“ tiệp màu vải chính, ở gấu quần bên trái khi mặc.3 màu: Nâu nhạt, Đen, Xám nhạt.', '06:35:37 26/03/2024', 'uploads/products/1711478137-1710834678028.jpeg,uploads/products/1711478137-1710834703396.jpeg,uploads/products/1711478137-1710834703526.jpeg,uploads/products/1711478137-1710834735562.jpeg', 2, 1),
(23, '\"NARCISSUS\" TEE - BLOOM', 399000.00, 0.00, 86, 'BST \"Bloom\" Xuân/Hạ 2024 - Áo thun chủ đề hoa Thủy tiên - tên Tiếng Anh \"Narcissus\" cũng là tên của 1 thợ săn nổi tiếng với vẻ ngoài bảnh trai trong thần thoại Hy lạp.\r\nChất liệu: Cotton 250gsm dày dặn, thoáng khí - thấm hút mồ hôi.\r\nCải tiến vải áo thun 4D, co giãn tốt hơn và bề mặt mịn hơn.\r\nVải đã được xử lý hạn chế co sau giặt.\r\nForm dáng: Loose.\r\nPhiên bản cổ cao cải tiến 2,8 cm.\r\n2 màu: Be sáng phối hình xanh lá, Navy phối hình in vàng.\r\nHình in hoa thuỷ tiên in cao thành ở thân trước.\r\nYou look good thêu tiệp màu vải chính ở cửa tay bên trái khi mặc.\r\nHướng dẫn giặt: Giặt tay để giữ hình in được tốt nhất. Nếu giặt máy, lộn ngược áo lại để bảo quản hình in.', '06:38:14 26/03/2024', 'uploads/products/1711478294-1710734601174.jpeg,uploads/products/1711478294-1710734601174.jpeg,uploads/products/1711478294-1710734601342.jpeg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sizehh`
--

CREATE TABLE `sizehh` (
  `id` int NOT NULL,
  `hh_id` int NOT NULL,
  `mau_id` int NOT NULL,
  `size` varchar(10) NOT NULL,
  `soluong` int NOT NULL,
  `trangthai` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sizehh`
--

INSERT INTO `sizehh` (`id`, `hh_id`, `mau_id`, `size`, `soluong`, `trangthai`) VALUES
(63, 16, 21, 'S', 11, 1),
(64, 16, 22, 'S', 33, 1),
(65, 16, 21, 'L', 1, 1),
(66, 16, 22, 'XL', 3, 1),
(69, 17, 23, 'S', 1, 1),
(71, 17, 23, 'L', 20, 1),
(72, 17, 23, 'XXL', 10, 1),
(73, 17, 24, 'S', 20, 1),
(75, 17, 24, 'L', 15, 1),
(76, 17, 24, 'XL', 15, 1),
(77, 17, 24, 'XXL', 15, 1),
(78, 18, 25, 'S', 35, 1),
(79, 18, 25, 'M', 20, 1),
(80, 18, 25, 'L', 20, 1),
(81, 18, 25, 'XL', 20, 1),
(82, 18, 25, 'XXL', 10, 1),
(83, 18, 26, 'S', 35, 1),
(84, 18, 26, 'M', 20, 1),
(85, 18, 26, 'L', 20, 1),
(86, 18, 26, 'XL', 20, 1),
(87, 18, 26, 'XXL', 15, 1),
(88, 19, 27, 'S', 35, 1),
(89, 19, 27, 'M', 20, 1),
(90, 19, 27, 'L', 20, 1),
(91, 19, 27, 'XL', 20, 1),
(92, 19, 27, 'XXL', 10, 1),
(93, 20, 28, 'S', 22, 1),
(94, 20, 28, 'M', 34, 1),
(95, 20, 28, 'L', 11, 1),
(96, 20, 28, 'XL', 20, 1),
(97, 20, 29, 'S', 35, 1),
(98, 20, 29, 'M', 20, 1),
(99, 20, 29, 'L', 20, 1),
(100, 20, 29, 'XL', 20, 1),
(101, 20, 29, 'XXL', 15, 1),
(102, 21, 30, 'S', 35, 1),
(103, 21, 30, 'M', 20, 1),
(104, 21, 30, 'L', 20, 1),
(105, 21, 30, 'XL', 20, 1),
(106, 21, 31, 'S', 35, 1),
(107, 21, 31, 'M', 20, 1),
(108, 21, 31, 'L', 20, 1),
(109, 21, 31, 'XL', 20, 1),
(110, 21, 32, 'S', 35, 1),
(111, 21, 32, 'M', 11, 1),
(112, 21, 32, 'L', 22, 1),
(113, 21, 32, 'XL', 21, 1),
(114, 22, 33, 'S', 40, 1),
(115, 22, 33, 'M', 20, 1),
(116, 22, 33, 'L', 20, 1),
(117, 22, 34, 'S', 35, 1),
(118, 22, 34, 'M', 20, 1),
(119, 22, 34, 'L', 20, 1),
(120, 22, 34, 'XL', 15, 1),
(121, 23, 35, 'S', 22, 1),
(122, 23, 35, 'M', 11, 1),
(123, 23, 35, 'L', 12, 1),
(124, 23, 35, 'XL', 21, 1),
(125, 23, 36, 'S', 21, 1),
(126, 23, 36, 'M', 21, 1),
(127, 23, 36, 'L', 12, 1),
(128, 23, 36, 'XL', 32, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hh_id` (`hh_id`),
  ADD KEY `kh_id` (`kh_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `cart_items_ibfk_3` (`mau_id`),
  ADD KEY `cart_items_ibfk_4` (`size_id`);

--
-- Indexes for table `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ten_loai` (`ten_loai`);

--
-- Indexes for table `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hh_id` (`hh_id`);

--
-- Indexes for table `mauhh`
--
ALTER TABLE `mauhh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hh_id` (`hh_id`);

--
-- Indexes for table `oder_items`
--
ALTER TABLE `oder_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_fk_order1` (`mau_id`),
  ADD KEY `order_fk_order2` (`size_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loai_id` (`loai_id`);

--
-- Indexes for table `sizehh`
--
ALTER TABLE `sizehh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Fk_size_hh_id` (`hh_id`),
  ADD KEY `Fk_size_mau_id` (`mau_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Mã bình luận';

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'Mã loại ', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `magiamgia`
--
ALTER TABLE `magiamgia`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mauhh`
--
ALTER TABLE `mauhh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `oder_items`
--
ALTER TABLE `oder_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sizehh`
--
ALTER TABLE `sizehh`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`hh_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`kh_id`) REFERENCES `khach_hang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `khach_hang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_items_ibfk_3` FOREIGN KEY (`mau_id`) REFERENCES `mauhh` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `cart_items_ibfk_4` FOREIGN KEY (`size_id`) REFERENCES `sizehh` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `magiamgia`
--
ALTER TABLE `magiamgia`
  ADD CONSTRAINT `magiamgia_ibfk_1` FOREIGN KEY (`hh_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `mauhh`
--
ALTER TABLE `mauhh`
  ADD CONSTRAINT `mauhh_ibfk_1` FOREIGN KEY (`hh_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `oder_items`
--
ALTER TABLE `oder_items`
  ADD CONSTRAINT `order_fk_order1` FOREIGN KEY (`mau_id`) REFERENCES `mauhh` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_fk_order2` FOREIGN KEY (`size_id`) REFERENCES `sizehh` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_fk_order3` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_fk_order4` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_id1` FOREIGN KEY (`user_id`) REFERENCES `khach_hang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`loai_id`) REFERENCES `loai` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `sizehh`
--
ALTER TABLE `sizehh`
  ADD CONSTRAINT `Fk_size_hh_id` FOREIGN KEY (`hh_id`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Fk_size_mau_id` FOREIGN KEY (`mau_id`) REFERENCES `mauhh` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
