-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 
-- 伺服器版本: 5.7.15-log
-- PHP 版本： 7.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `project_5`
--

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL COMMENT '訊息表ID',
  `news_class_id` int(11) NOT NULL COMMENT '分類表ID',
  `news_title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '訊息標題',
  `news_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '訊息內容',
  `news_focus` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否為焦點;0-否 1-是',
  `news_show` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否顯示;0-否 1-是',
  `news_pic` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '訊息圖片',
  `news_pic_s` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '訊息圖片縮圖',
  `new_create_time` datetime NOT NULL COMMENT '文章創建時間',
  `new_modify_time` datetime DEFAULT NULL COMMENT '文章修改時間',
  `new_delete_time` datetime DEFAULT NULL COMMENT '文章刪除時間',
  `user_id` int(11) DEFAULT NULL COMMENT '文章創建人id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `news`
--

INSERT INTO `news` (`news_id`, `news_class_id`, `news_title`, `news_content`, `news_focus`, `news_show`, `news_pic`, `news_pic_s`, `new_create_time`, `new_modify_time`, `new_delete_time`, `user_id`) VALUES
(1, 3, '【大阪】一起去尋寶吧！四天王寺二手市集', '若是喜歡逛市集的朋友可能曾耳聞過京都「北野天滿宮天神市集」，或是大阪「萬博公園二手市集」，但這次要介紹的是位在百貨林立的大阪市天王寺區歷史悠久的四天王寺，每個月都會隨法會一同舉辦的二手市集「骨董市」。', 1, 1, 'news_photoBig.jpg', NULL, '2021-02-17 09:21:38', NULL, NULL, 2),
(2, 3, '【天母市集】好逛好挖寶', '台北士林旅遊景點推薦「天母二手市集/天母創意市集」，每週五、週六、週日三天在天母圓環這邊有熱鬧的二手市集，若是有空可以來這邊逛逛', 0, 1, 'news_photo1.jpeg', NULL, '2021-02-15 18:36:49', NULL, NULL, 3),
(3, 3, '【永春市場】．挖寶趣．', '每次出國，若碰到當地市集開張日子，我肯定不會錯過，享受挖寶的感覺，或者從這些舊東西中，感受前人的故事', 0, 1, 'news_photo2.jpg', NULL, '2021-02-17 11:28:31', NULL, NULL, 2),
(4, 3, '【77藝文町】．蚤寶趣二手市集', '家中不用的東西，可能是別人的寶貝。為了避免不必要的浪費，就讓物有所依；經過轉手之後，更能顯現新價值！', 0, 1, 'news_photo3.jpg', NULL, '2021-02-16 07:20:33', NULL, NULL, 2),
(5, 3, '【西門紅樓】創意市集', '於2007開始之後聚集了許多有理想有實力的台灣年輕創意藝術家來這裡擺攤，也吸引了好多喜歡文藝的朋友特別來這裡朝聖', 0, 1, 'news_photo4.jpg', NULL, '2021-02-16 08:40:19', NULL, NULL, 5),
(6, 3, '【義大利】 巴勒摩二手市集', '穿梭在二手市集中，一個轉身之下撞見那副心目中獨一無二的彩釉碗盤，彷彿命中註定一般，它也是經歷過歷史風雨來到這裡', 0, 1, 'news_photo5.jpeg', NULL, '2021-02-15 14:23:47', NULL, NULL, 4),
(7, 3, '【倫敦】波多貝羅古董市集', '到諾丁丘的重頭戲絕對是Portobello古董市集了，在主要營業日週六這天，長長的Portobello Road上滿滿的都是露天市集的攤販', 0, 1, 'news_photo6.jpg', NULL, '2021-02-14 07:37:28', NULL, NULL, 2),
(8, 3, '【摩洛哥】凱米斯市集', '彷彿見證當年沙漠貿易的繁榮！位於摩洛哥馬拉喀什的「凱米斯市集（Bab El Khemis）」是當地歷史悠久', 0, 1, 'news_photo7.jpg', NULL, '2021-02-15 05:44:34', NULL, NULL, 3),
(9, 3, '【美國】 布林菲德古董展', 'Brimfield古董和跳蚤市場始於1959年，是美國最古老的戶外古董市場。當時，創始人戈登·里德（Gordon Reid）', 0, 1, 'news_photo8.jpg', NULL, '2021-02-16 06:21:43', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- 資料表結構 `news_class`
--

CREATE TABLE `news_class` (
  `news_class_id` int(10) UNSIGNED NOT NULL COMMENT '訊息分類表ID',
  `news_class_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '分類名稱'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `news_class`
--

INSERT INTO `news_class` (`news_class_id`, `news_class_name`) VALUES
(1, '公告'),
(2, '廣告'),
(3, '資訊');

-- --------------------------------------------------------

--
-- 資料表結構 `ordertab`
--

CREATE TABLE `ordertab` (
  `order_id` int(10) UNSIGNED NOT NULL COMMENT '訂單表ID',
  `user_id` int(11) NOT NULL COMMENT '買家id',
  `order_amount` int(20) NOT NULL COMMENT '訂單金額',
  `total_amount` int(20) NOT NULL COMMENT '商品總金額',
  `order_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '商品狀態;0-訂單處理中 1-已出貨 2-已完成訂單 3-取消訂單',
  `order_ctime` datetime DEFAULT NULL COMMENT '下單時間',
  `ship_time` datetime NOT NULL COMMENT '發貨時間',
  `pay_mode` tinyint(1) NOT NULL DEFAULT '0' COMMENT '支付方式;0-貨到付款 1-線上信用卡 2-ATM',
  `ship_mode` tinyint(1) NOT NULL DEFAULT '0' COMMENT '物流方式;0-宅配 1-7-11運送 2-全家運送3-萊爾富運送',
  `ship_amount` int(20) NOT NULL COMMENT '運費'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `order_info`
--

CREATE TABLE `order_info` (
  `order_info_id` int(10) UNSIGNED NOT NULL COMMENT '訂單明細表ID',
  `order_id` int(11) NOT NULL COMMENT '訂單表ID',
  `prod_id` int(11) NOT NULL COMMENT '商品表ID',
  `prod_price` int(20) NOT NULL COMMENT '商品單價',
  `order_num` int(50) NOT NULL COMMENT '商品購買數量',
  `prod_pic` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品圖片'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `prod`
--

CREATE TABLE `prod` (
  `prod_id` int(11) UNSIGNED NOT NULL COMMENT '商品ID',
  `prod_class_id` int(11) NOT NULL COMMENT '商品分類表ID',
  `prod_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品名稱',
  `prod_price` int(50) NOT NULL COMMENT '商品單價',
  `prod_tnum` int(50) NOT NULL COMMENT '商品庫存數量',
  `prod_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '商品圖片',
  `prod_display` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否上架;0-未上架 1-上架',
  `prod_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '商品內容描述',
  `prod_create_time` datetime NOT NULL COMMENT '商品發布時間',
  `prod_modify_time` datetime DEFAULT NULL COMMENT '商品修改時間',
  `prod_delete_time` datetime DEFAULT NULL COMMENT '商品下架時間',
  `prod_view` int(20) NOT NULL COMMENT '商品瀏覽次數',
  `user_id` int(11) NOT NULL COMMENT '上架人員ID',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT '熱賣商品;0-否,1-是'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `prod`
--

INSERT INTO `prod` (`prod_id`, `prod_class_id`, `prod_name`, `prod_price`, `prod_tnum`, `prod_pic`, `prod_display`, `prod_content`, `prod_create_time`, `prod_modify_time`, `prod_delete_time`, `prod_view`, `user_id`, `is_hot`) VALUES
(1, 1, '撞色毛呢感圍巾', 1000, 3, 's0001.png', 1, '熱賣!!', '2021-02-17 10:00:00', NULL, NULL, 10, 1, 1),
(2, 6, '白色馬克杯', 300, 2, 's0002.png', 1, '熱賣!!', '2021-02-17 16:00:00', NULL, NULL, 17, 1, 1),
(3, 6, '鐵灰色造型帽', 450, 4, 's0003.png', 1, '熱賣品!!', '2021-02-17 16:20:00', NULL, NULL, 15, 1, 1),
(4, 4, '風格配飾', 1000, 5, 's0004.png', 1, '熱賣品!!', '2021-02-17 17:30:38', NULL, NULL, 8, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `prod_class`
--

CREATE TABLE `prod_class` (
  `prod_class_id` int(11) NOT NULL COMMENT '商品分類ID',
  `prod_class_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '商品分類名稱',
  `prod_class_level` int(11) NOT NULL COMMENT '排序用的編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `prod_class`
--

INSERT INTO `prod_class` (`prod_class_id`, `prod_class_name`, `prod_class_level`) VALUES
(1, '服飾', 1),
(2, '書籍', 2),
(3, '3C', 3),
(4, '飾品', 4),
(5, '鞋子', 5),
(6, '其他', 6);

-- --------------------------------------------------------

--
-- 資料表結構 `prod_collect`
--

CREATE TABLE `prod_collect` (
  `collect_id` int(10) UNSIGNED NOT NULL COMMENT '商品收藏表ID',
  `prod_id` int(11) NOT NULL COMMENT '收藏商品ID',
  `user_id` int(11) NOT NULL COMMENT '收藏人的ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `prod_comment`
--

CREATE TABLE `prod_comment` (
  `comment_id` int(10) UNSIGNED NOT NULL COMMENT '評論表ID',
  `user_id` int(11) NOT NULL COMMENT '評論人ID',
  `prod_content` text COLLATE utf8_unicode_ci NOT NULL COMMENT '評論內容',
  `prod_id` int(11) NOT NULL COMMENT '所屬商品ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `shipment`
--

CREATE TABLE `shipment` (
  `shipment_id` int(10) UNSIGNED NOT NULL COMMENT '寄貨資訊表id',
  `user_id` int(11) NOT NULL COMMENT '買家id',
  `ship_mode` tinyint(1) NOT NULL COMMENT '物流方式;0-宅配 1-7-11運送 2-全家運送3-萊爾富運送',
  `receipt_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '收貨人姓名',
  `ruser_tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '收貨人電話',
  `ruser_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '收貨住址',
  `store_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '超商收貨住址'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL COMMENT '用戶表ID',
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用戶登錄名',
  `user_real_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '用戶實際姓名',
  `user_sex` tinyint(1) DEFAULT '0' COMMENT '用戶性別;0-男 1-女',
  `user_pass` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '用戶密碼',
  `user_mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '用戶郵箱',
  `user_tel` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT '用戶電話',
  `user_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用戶住址',
  `create_time` datetime NOT NULL COMMENT '註冊時間',
  `modify_time` datetime DEFAULT NULL COMMENT '修改時間',
  `login_time` datetime DEFAULT NULL COMMENT '上次登錄時間',
  `chkcode` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用戶驗證碼',
  `user_grade` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用戶等級;0-未激活 1-一般用戶 2-商品管理員 9-超級管理員',
  `user_icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '用戶頭像'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_real_name`, `user_sex`, `user_pass`, `user_mail`, `user_tel`, `user_address`, `create_time`, `modify_time`, `login_time`, `chkcode`, `user_grade`, `user_icon`) VALUES
(1, 'admin001', 'Thomas', 0, '123456', 'admin@gmail.com', '12356879', NULL, '2021-02-16 11:17:00', '0000-00-00 00:00:00', '2021-02-16 15:27:32', '', 9, 'ad001.jpg'),
(2, 'admin002', 'Mary', 1, '123456', 'admin002@gmail.com', '12356879', NULL, '2021-02-15 11:16:00', NULL, NULL, NULL, 2, 'ad002.jpg'),
(3, 'admin003', 'Amy', 1, '123456', 'admin003@gmail.com', '12356879', NULL, '2021-02-14 15:15:32', NULL, NULL, NULL, 2, 'ad003.jpg'),
(4, 'admin004', 'Tim', 0, '123456', 'admin004@gmail.com', '12356879', NULL, '2021-02-01 07:28:08', NULL, NULL, NULL, 2, 'ad004.jpg'),
(5, 'admin005', 'Andy', 1, '123456', 'admin005@gmail.com', '12356879', NULL, '2021-01-31 21:20:00', NULL, NULL, NULL, 2, 'ad005.jpg'),
(6, 'admin006', 'Luna', 0, '123456', 'admin006@gmail.com', '12356879', NULL, '2021-02-16 11:17:40', NULL, NULL, NULL, 2, 'ad006.jpg'),
(7, 'admin007', 'Sam', 1, '123456', 'admin007@gmail.com', '12356879', NULL, '2021-02-17 07:22:13', NULL, NULL, NULL, 2, 'ad007.jpg');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- 資料表索引 `news_class`
--
ALTER TABLE `news_class`
  ADD PRIMARY KEY (`news_class_id`);

--
-- 資料表索引 `ordertab`
--
ALTER TABLE `ordertab`
  ADD PRIMARY KEY (`order_id`);

--
-- 資料表索引 `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`order_info_id`);

--
-- 資料表索引 `prod`
--
ALTER TABLE `prod`
  ADD PRIMARY KEY (`prod_id`);

--
-- 資料表索引 `prod_class`
--
ALTER TABLE `prod_class`
  ADD PRIMARY KEY (`prod_class_id`),
  ADD UNIQUE KEY `class_prod_name` (`prod_class_name`);

--
-- 資料表索引 `prod_collect`
--
ALTER TABLE `prod_collect`
  ADD PRIMARY KEY (`collect_id`);

--
-- 資料表索引 `prod_comment`
--
ALTER TABLE `prod_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- 資料表索引 `shipment`
--
ALTER TABLE `shipment`
  ADD PRIMARY KEY (`shipment_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '訊息表ID', AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `news_class`
--
ALTER TABLE `news_class`
  MODIFY `news_class_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '訊息分類表ID', AUTO_INCREMENT=4;
--
-- 使用資料表 AUTO_INCREMENT `ordertab`
--
ALTER TABLE `ordertab`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '訂單表ID';
--
-- 使用資料表 AUTO_INCREMENT `order_info`
--
ALTER TABLE `order_info`
  MODIFY `order_info_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '訂單明細表ID';
--
-- 使用資料表 AUTO_INCREMENT `prod`
--
ALTER TABLE `prod`
  MODIFY `prod_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品ID', AUTO_INCREMENT=5;
--
-- 使用資料表 AUTO_INCREMENT `prod_class`
--
ALTER TABLE `prod_class`
  MODIFY `prod_class_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分類ID', AUTO_INCREMENT=7;
--
-- 使用資料表 AUTO_INCREMENT `prod_collect`
--
ALTER TABLE `prod_collect`
  MODIFY `collect_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '商品收藏表ID';
--
-- 使用資料表 AUTO_INCREMENT `prod_comment`
--
ALTER TABLE `prod_comment`
  MODIFY `comment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '評論表ID';
--
-- 使用資料表 AUTO_INCREMENT `shipment`
--
ALTER TABLE `shipment`
  MODIFY `shipment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '寄貨資訊表id';
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '用戶表ID', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
