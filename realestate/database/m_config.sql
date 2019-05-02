-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 02:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_config`
--

CREATE TABLE `m_config` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `value` text,
  `data_type` varchar(50) DEFAULT 'text',
  `is_common` tinyint(1) NOT NULL DEFAULT '1',
  `published` tinyint(4) DEFAULT NULL COMMENT 'thông số giành cho google',
  `is_ga` tinyint(4) DEFAULT NULL,
  `ordering` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_config`
--

INSERT INTO `m_config` (`id`, `name`, `title`, `value`, `data_type`, `is_common`, `published`, `is_ga`, `ordering`) VALUES
(1, 'site_name', 'Site Name', 'Thuốc ho Bảo Thanh - Bổ phế, Trừ ho, Tiêu đờm', 'text', 1, 1, NULL, 1),
(2, 'title', 'Title', 'Thuốc ho Bảo Thanh - Bổ phế, Trừ ho, Tiêu đờm', 'text', 1, 1, NULL, 2),
(3, 'meta_des', 'Meta des', 'Thuốc ho Bảo Thanh - Bổ phế, Trừ ho, Tiêu đờm', 'text', 1, 1, NULL, 3),
(4, 'meta_key', 'Meta key', 'Bổ phế, Trừ ho, Tiêu đờm', 'text', 1, 1, NULL, 4),
(5, 'admin_name', 'Admin name', 'Admin', 'text', 0, 1, NULL, 5),
(6, 'admin_email', 'Admin email', 'thuochobophe@gmail.com', 'text', 1, 1, NULL, 6),
(7, 'main_title', 'Đuôi tiêu đề', 'Bảo thanh', 'text', 1, 1, NULL, 7),
(8, 'main_meta_key', 'Thẻ meta_key chính', 'Bảo thanh', 'text', 1, 1, NULL, 8),
(9, 'main_meta_des', 'Thẻ meta_des chính', 'Bảo thanh', 'text', 1, 1, NULL, 9),
(13, 'google_analytics', 'Google analytics', '', 'text', 1, 1, NULL, 13),
(10, 'logo', 'Logo', 'images/config/logo_1532508782.png', 'image', 1, 1, NULL, 10),
(11, 'background_home', 'Background trang chủ', NULL, 'image', 1, 0, NULL, 11),
(12, 'background_inner', 'Background chung', 'images/config/logojpg_1405259122_1406701798.jpg', 'image', 1, 0, NULL, 12),
(14, 'contact', 'Liên hệ', '<p><span style=\"line-height: 20.7999992370605px;\">Địa chỉ: Ph&ograve;ng 103, Tầng 1, L&ocirc; 2bx3, khu đ&ocirc; thị Mỹ Đ&igrave;nh I - H&agrave; Nội.</span><br style=\"line-height: 20.7999992370605px;\" />\r\n<span style=\"line-height: 20.7999992370605px;\">Điện thoại: (04) 6287 2977 - (04) 6287 2932 .</span><br style=\"line-height: 20.7999992370605px;\" />\r\n<span style=\"line-height: 20.7999992370605px;\">Email: web@finalstyle.com</span><br style=\"line-height: 20.7999992370605px;\" />\r\n<span style=\"line-height: 20.7999992370605px;\">Website: www.gaumobile.com</span></p>', 'editor', 1, 0, NULL, 14),
(15, 'hotline1', 'Hotline', '0915085151', 'text', 1, 1, NULL, 15),
(19, 'email', 'Emai', '', 'text', 1, 0, NULL, 19),
(16, 'address', 'Địa chỉ', '<p>Tầng 2 - T&ograve;a Green Office, chung cư Meco &ndash; ng&otilde; 102 Trường Chinh, HN</p>', 'text', 1, 0, NULL, 16),
(17, 'phone', 'Điện thoại', '', 'text', 1, 0, NULL, 17),
(24, 'facebook', 'Facebook', 'https://www.facebook.com/thuochobophe/', 'text', 1, 1, NULL, 24),
(25, 'twitter', 'Twitter', 'https://www.twitter.com/thuochobophe', 'text', 1, 1, NULL, 25),
(26, 'googleplus', 'Google plus', 'https://www.googleplus.com/thuochobophe', 'text', 1, 1, NULL, 26),
(27, 'youtube', 'Youtube', 'https://www.youtube.com/thuochobophe', 'text', 1, 1, NULL, 27),
(28, 'zing', 'Zing', NULL, 'text', 1, 0, NULL, 28),
(18, 'fax', 'Fax', '', 'text', 1, 0, NULL, 18),
(20, 'website', 'Website', '', 'text', 1, 0, NULL, 20),
(30, 'copyright', 'Copyright', '© 2018 - Bản quyền thuộc Bảo Thanh', 'text', 1, 1, NULL, 30),
(31, 'footer_info', 'Thông tin chân trang', '', 'editor', 1, 1, NULL, 31),
(135, 'mail_order_countdown_subject', 'Tiêu đề email nhận đơn hàng countdown', 'Đơn hàng mua sản phẩm countdown', 'text', 1, 1, NULL, 134),
(134, 'mail_order_countdown_body', 'Mẫu email nhận đơn hàng countdown', '<div style=\"border:8px solid #55aee7; line-height:21px; padding:2px\">\r\n<div style=\"padding:10px\">\r\n<div><strong>Ch&agrave;o {name}!</strong></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Cảm ơn bạn đ&atilde; mua h&agrave;ng tr&ecirc;n : <a href=\"https://moonfood.com/\" target=\"_blank\">https://moonfood.com/</a></div>\r\n</div>\r\n\r\n<div style=\"background:none repeat scroll 0 0 #55aee7; color:#ffffff; font-weight:bold; line-height:25px; min-height:27px; padding-left:10px\">Th&ocirc;ng tin về đơn đặt h&agrave;ng của bạn</div>\r\n\r\n<div style=\"padding:10px\">\r\n<div>M&atilde; đơn h&agrave;ng: <strong>{ma_don_hang}</strong></div>\r\n</div>\r\n&nbsp;\r\n\r\n<table border=\"2\" cellspacing=\"0\" style=\"border-collapse:collapse; border-color:#ffffff; border-style:solid; width:100%\">\r\n	<thead>\r\n		<tr>\r\n			<td><strong>Th&ocirc;ng tin người đặt h&agrave;ng </strong></td>\r\n		</tr>\r\n	</thead>\r\n	<tbody>\r\n		<tr>\r\n			<td>{thong_tin_nguoi_dat}</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n&nbsp;\r\n\r\n<div style=\"background:none repeat scroll 0 0 #55aee7; color:#ffffff; font-weight:bold; line-height:25px; min-height:27px; padding-left:10px\">Chi tiết đơn h&agrave;ng</div>\r\n\r\n<div style=\"padding:10px\">{thong_tin_don_hang}</div>\r\n&nbsp;\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div style=\"font-weight:bold; margin-bottom:30px; padding:10px\">\r\n<div>Ch&acirc;n th&agrave;nh cảm ơn!</div>\r\n\r\n<div>Moonfood&nbsp;(<a href=\"https://moonfood.com/\" target=\"_blank\">https://moonfood.com/</a>)</div>\r\n\r\n<div class=\"yj6qo\">&nbsp;</div>\r\n\r\n<div class=\"adL\">&nbsp;</div>\r\n</div>\r\n\r\n<div class=\"adL\">&nbsp;</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', 'editor', 1, 1, NULL, 135),
(16, 'hotline2', 'Hotline 2', '', 'text', 1, 1, NULL, 16),
(136, 'ban_words_list', 'Từ cấm(VD:Ban quản trị, admin,....)', 'Ban quản trị, admin, lừa đảo, clickbuy, click buy,  đểu, tàu, trung quốc, xách tay, dm, địt mẹ, đụ má, fuck, dựng,', 'text', 1, 1, NULL, 136),
(137, 'footer_html_above', 'HTML dưới trang ( trên js khác)', '', 'textarea', 1, 1, NULL, 137),
(138, 'footer_html_below', 'HTML dưới trang ( dưới js khác)', '', 'textarea', 1, 1, NULL, 138),
(139, 'footer_html_below_user', 'HTML dưới trang ( dưới js khác) ( dành cho người dùng', '', 'textarea', 1, 1, NULL, 139),
(140, 'footer_html_above_user', 'HTML dưới trang ( trên js khác) 2 ( dành cho người dùng)', '', 'textarea', 1, 1, NULL, 140),
(141, 'hotline_detail_product', 'Hotline trong sản phẩm', '<p>Giờ l&agrave;m việc: 8h00-20h00 ( tất cả c&aacute;c ng&agrave;y)</p>', 'editor', 1, 1, NULL, 141),
(142, 'hotline_installment', 'Hotline trả góp', '0987 993 133', 'text', 1, 0, NULL, 142),
(143, 'thoi_gian_lam_viec', 'Điểm mạnh trong sp', '', 'editor', 1, 1, NULL, 143),
(144, 'mail_order_subject', 'Tiêu đề email nhận đơn hàng', 'Moonfood - Xác nhận đơn hàng', 'text', 1, 1, NULL, 144),
(145, 'mail_order_body', 'Mẫu email nhận đơn hàng', '<div style=\"border:8px solid #00b8e0; line-height:21px; padding:2px\">\r\n<div style=\"padding:10px\">\r\n<div><strong>Ch&agrave;o {name}!</strong></div>\r\n\r\n<div>&nbsp;</div>\r\n\r\n<div>Cảm ơn Qu&yacute; kh&aacute;ch&nbsp;đ&atilde; mua h&agrave;ng tr&ecirc;n: <a href=\"https://moonfood.com/\">https://moonfood.com/</a></div>\r\n</div>\r\n\r\n<div style=\"background:none repeat scroll 0 0 #00b8e0; color:#ffffff; font-weight:bold; line-height:25px; min-height:27px; padding-left:10px\">Th&ocirc;ng tin về đơn đặt h&agrave;ng của Qu&yacute; kh&aacute;ch</div>\r\n\r\n<div style=\"padding:10px\">\r\n<div>M&atilde; đơn h&agrave;ng: <strong>{ma_don_hang}</strong></div>\r\n{thong_tin_nguoi_dat}</div>\r\n&nbsp;\r\n\r\n<div style=\"background:none repeat scroll 0 0 #00b8e0; color:#ffffff; font-weight:bold; line-height:25px; min-height:27px; padding-left:10px\">Chi tiết đơn h&agrave;ng</div>\r\n\r\n<div style=\"padding:10px\">{thong_tin_don_hang}</div>\r\n\r\n<div style=\"padding:10px\">&nbsp;</div>\r\n\r\n<div style=\"padding:10px\">\r\n<p>Moonfood&nbsp;sẽ li&ecirc;n lạc với qu&yacute; kh&aacute;ch v&agrave; x&aacute;c nhận lại đơn h&agrave;ng trong thời gian sớm nhất.<br />\r\nCảm ơn Qu&yacute; Kh&aacute;ch,</p>\r\n\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>', 'editor', 1, 1, NULL, 145),
(146, 'link_bct', 'Link tới Bộ Công Thương', '', 'text', 1, 1, NULL, 146),
(147, 'address', 'Địa chỉ', '<p>Tầng 2 - T&ograve;a Green Office, chung cư Meco &ndash; ng&otilde; 102 Trường Chinh, HN</p>', 'editor', 1, 1, NULL, 147),
(148, 'promotion_content', 'Khuyến mãi', '', 'editor', 1, 1, NULL, 148),
(149, 'ship', 'Vận chuyển', '', 'editor', 1, 1, NULL, 149),
(150, 'warranty', 'Bảo hành', '', 'editor', 1, 1, NULL, 150),
(152, 'icon_play', 'icon_play', '<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" version=\"1.1\" id=\"Layer_1\" x=\"0px\" y=\"0px\" viewBox=\"0 0 310 310\" style=\"enable-background:new 0 0 310 310;\" xml:space=\"preserve\">\r\n							<g id=\"XMLID_822_\">\r\n								<path id=\"XMLID_823_\" d=\"M297.917,64.645c-11.19-13.302-31.85-18.728-71.306-18.728H83.386c-40.359,0-61.369,5.776-72.517,19.938   C0,79.663,0,100.008,0,128.166v53.669c0,54.551,12.896,82.248,83.386,82.248h143.226c34.216,0,53.176-4.788,65.442-16.527   C304.633,235.518,310,215.863,310,181.835v-53.669C310,98.471,309.159,78.006,297.917,64.645z M199.021,162.41l-65.038,33.991   c-1.454,0.76-3.044,1.137-4.632,1.137c-1.798,0-3.592-0.484-5.181-1.446c-2.992-1.813-4.819-5.056-4.819-8.554v-67.764   c0-3.492,1.822-6.732,4.808-8.546c2.987-1.814,6.702-1.938,9.801-0.328l65.038,33.772c3.309,1.718,5.387,5.134,5.392,8.861   C204.394,157.263,202.325,160.684,199.021,162.41z\"></path>\r\n							</g>\r\n							</svg>', 'text', 1, NULL, NULL, 0),
(151, 'link_route', 'Link chỉ đường', 'http://thuochobophe.vn/lien_he.html', 'text', 1, 1, NULL, 151);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_config`
--
ALTER TABLE `t_config`
  ADD PRIMARY KEY (`id`,`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_config`
--
ALTER TABLE `t_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
