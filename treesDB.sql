CREATE DATABASE IF NOT EXISTS `treesDB` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `treesDB`;

-- Table structure for table `t_tree`

DROP TABLE IF EXISTS `t_tree`;
CREATE TABLE IF NOT EXISTS `t_tree` (
  `TREE_ID` int(10) NOT NULL AUTO_INCREMENT,
  `TREE_NAME` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TREE_CATEGORY_ID` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TREE_HEIGHT` decimal(10,2) DEFAULT NULL,
  `TREE_LOCATION` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TREE_CARE` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `TREE_BLOSSOM_SEASON` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TREE_PIC` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `TREE_PRICE` int(10) DEFAULT NULL
  PRIMARY KEY (`TREE_ID`),
  KEY `TREE_CATEGORY_ID` (`TREE_CATEGORY_ID`),
  KEY `T_CATEGORYT_TREES` (`TREE_CATEGORY_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `t_tree`

INSERT INTO `t_tree` (`TREE_NAME`, `TREE_CATEGORY_ID`, `TREE_HEIGHT`, `TREE_LOCATION`, `TREE_CARE`, `TREE_BLOSSOM_SEASON`, `TREE_PIC`, `TREE_PRICE`)
VALUES
('Nhất chi mai', 1, 0.8, 'Sân vườn', 'Tưới nước đều đặn hàng ngày, bón phân mỗi tháng một lần', 'Mùa xuân', 'nhat_chi_mai.jpg', 500000000),
('Mai tứ quý', 1, 0.8, 'Sân vườn', 'Tưới nước đều đặn hàng ngày, bón phân mỗi tháng một lần', 'Mùa xuân', 'mai_tu_quy.jpg', 200000000),
('Đào phai', 2, 1.5, 'Nơi nhiều ánh sáng', 'Phun sương vào buổi sáng và chiều', 'Mùa xuân', 'dao_phai.jpg', 30000000),
('Trầu bà đế vương', 3, 0.5, 'Góc phòng', 'Tưới nước khi đất khô', 'Quanh năm', 'de_vuong.jpg', 2000000),
('Lan phi điệp', 4, 1.2, 'Bàn làm việc', 'Cắm bóng đèn nhẹ vào ban đêm', 'Mùa xuân - Mùa thu', 'phi_diep.jpg', 400000000),
('Tùng la hán', 4, 1.0, 'Sân vườn', 'Bón phân hữu cơ mỗi 2 tháng', 'Quanh năm', 'tung_la_han.jpg', 2000000000),
('Dương xỉ Nhật Bản', 6, 1.8, 'Vườn hoa', 'Kiểm tra lá cây đều đặn', 'Mùa xuân - Mùa hạ - Mùa thu', 'duong_xi_NB.jpeg', 700000),
('Cúc đại đoá', 7, 0.9, 'Sân thượng', 'Chống côn trùng bằng cách sử dụng các loại dầu thơm tự nhiên', 'Mùa hạ', 'cuc_dai_doa.jpg', 8000000);


-- --------------------------------------------------------
-- Table structure for table `t_category`

DROP TABLE IF EXISTS `t_category`;
CREATE TABLE IF NOT EXISTS `t_category` (
  `CATE_ID` int(10) NOT NULL AUTO_INCREMENT,
  `CATE_NAME` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `CATE_DESC` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`CATE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `t_category`

INSERT INTO `t_tree` (`TREE_NAME`, `TREE_CATEGORY_ID`, `TREE_HEIGHT`, `TREE_LOCATION`, `TREE_CARE`, `TREE_BLOSSOM_SEASON`)
VALUES
('Nhất chi mai', 1, 2.8, 'Sân vườn', 'Tưới nước đều đặn hàng ngày, bón phân mỗi tháng một lần', 'Mùa xuân'),
('Mai tứ quý', 1, 2.8, 'Sân vườn', 'Tưới nước đều đặn hàng ngày, bón phân mỗi tháng một lần', 'Mùa xuân'),
('Đào phai', 2, 1.0, 'Nơi nhiều ánh sáng', 'Phun sương vào buổi sáng và chiều', 'Mùa xuân'),
('Trầu bà đế vương', 3, 0.5, 'Góc phòng', 'Tưới nước khi đất khô', 'Quanh năm'),
('Lan phi điệp', 4, 0.2, 'Bàn làm việc', 'Cắm bóng đèn nhẹ vào ban đêm', 'Mùa xuân - Mùa thu'),
('Tùng la hán', 5, 2.0, 'Sân vườn', 'Bón phân hữu cơ mỗi 2 tháng', 'Quanh năm'),
('Dương xỉ Nhật Bản', 6, 0.8, 'Vườn hoa', 'Kiểm tra lá cây đều đặn', 'Mùa xuân - Mùa hạ - Mùa thu'),
('Cúc đại đoá', 7, 0.2, 'Sân thượng', 'Chống côn trùng bằng cách sử dụng các loại dầu thơm tự nhiên', 'Mùa hạ');

-- Table structure for table `t_user`

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE IF NOT EXISTS `t_user` (
  `USER_ID` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `USER_PASSWORD` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_NAME` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_PHONE` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_ADDRESS` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table `t_user`

INSERT INTO `t_user` (`USER_ID`, `USER_PASSWORD`, `USER_NAME`, `USER_PHONE`, `USER_ADDRESS`) VALUES
('admin', 'admin1234', 'Quản trị hệ thống', NULL, NULL),
('nvthinh', 'abc567', 'Người dùng 1', NULL, NULL),
('aloper', '98765', 'Người dùng 2', NULL, NULL);
COMMIT;
