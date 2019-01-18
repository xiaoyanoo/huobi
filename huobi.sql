-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2019-01-18 15:36:36
-- 服务器版本： 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `huobi`
--

-- --------------------------------------------------------

--
-- 表的结构 `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(10) NOT NULL,
  `pid` int(11) NOT NULL,
  `c_time` int(11) NOT NULL,
  `u_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `category`
--

INSERT INTO `category` (`id`, `name`, `pid`, `c_time`, `u_time`) VALUES
(1, '新闻', 0, 0, 1544973486),
(2, '集团新闻', 1, 0, 0),
(3, '媒体聚焦', 1, 0, 0),
(4, '公司报告', 1, 0, 0),
(5, '展会新闻', 1, 0, 0),
(6, '教育', 0, 0, 1544973499),
(11, 'it', 0, 0, 1544973506);

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `download_num` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `download_url` varchar(255) NOT NULL,
  `size` decimal(10,2) NOT NULL,
  `version` varchar(50) NOT NULL,
  `left_img` varchar(255) NOT NULL,
  `right_img` varchar(255) NOT NULL,
  `update_content` text NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `download_num`, `name`, `download_url`, `size`, `version`, `left_img`, `right_img`, `update_content`, `desc`) VALUES
(1, 0, '呆音', 'http://baidu.com', '2.00', '1.0.0', './public/admin/img/upload/4c1b4057cb0ffd7f4d1438205575f0ea_3961090.png', './public/admin/img/upload/8a9b51c033811cb773acffb48f63b552_9196350.png', '1，新增应用托管服务，提供专业的应用下载页面以及App后台接口。<br>\r\n        2，新增短链服务。<br>\r\n        3，支持修改昵称密码。<br>\r\n        4，支持上传投稿。<br>\r\n        5，MD风格图标，可自定义图标颜色。<br>\r\n        6，邮箱接口仅支持配置自己的SMTP。<br>\r\n        7，新增下载统计读取接口 。<br>\r\n        ', '1，新增应用托管服务，提供专业的应用下载页面以及App后台接口。\r\n2，新增短链服务。\r\n3，支持修改昵称密码');

-- --------------------------------------------------------

--
-- 表的结构 `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` char(20) NOT NULL,
  `url` char(30) NOT NULL,
  `hidden` tinyint(1) NOT NULL COMMENT '1为隐藏，0为显示',
  `pid` int(11) NOT NULL,
  `model` tinyint(1) NOT NULL COMMENT '区分前后台，1后台，0前台',
  `c_time` int(11) NOT NULL,
  `u_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `menus`
--

INSERT INTO `menus` (`id`, `name`, `url`, `hidden`, `pid`, `model`, `c_time`, `u_time`) VALUES
(1, '网址管理', 'News', 0, 0, 1, 1413659874, 1493003659),
(2, '网址列表', 'News/index', 0, 1, 1, 0, 0),
(3, '网址添加', 'News/add', 0, 1, 1, 0, 0),
(4, '网址修改', 'News/update', 1, 1, 1, 0, 0),
(5, '网址删除', 'News/delete', 1, 1, 1, 0, 0),
(6, '用户管理', 'User', 0, 0, 1, 0, 1493003670),
(7, '用户列表', 'User/index', 0, 6, 1, 0, 0),
(8, '用户添加', 'User/add', 0, 6, 1, 0, 0),
(9, '用户修改', 'User/update', 1, 6, 1, 0, 0),
(10, '用户删除', 'User/delete', 1, 6, 1, 0, 0),
(11, '菜单管理', 'Menus', 0, 0, 1, 0, 1493003680),
(12, '菜单列表', 'Menus/index', 0, 11, 1, 0, 0),
(13, '菜单添加', 'Menus/add', 0, 11, 1, 0, 0),
(14, '菜单修改', 'Menus/update', 1, 11, 1, 0, 0),
(15, '菜单删除', 'Menus/delete', 1, 11, 1, 0, 0),
(27, '权限管理', 'Privilege', 0, 0, 1, 1494293317, 0),
(28, '权限列表', 'Privilege/index', 0, 27, 1, 1494293340, 1494293434),
(29, '权限添加', 'Privilege/add', 0, 27, 1, 1494293359, 0),
(30, '权限修改', 'Privilege/update', 1, 27, 1, 1494293382, 0),
(31, '权限删除', 'Privilege/delete', 1, 27, 1, 1494293409, 0),
(32, '分类管理', 'Category', 0, 0, 1, 1494293317, 0),
(33, '分类列表', 'Category/index', 0, 32, 1, 1494293340, 1494293434),
(34, '分类添加', 'Category/add', 0, 32, 1, 1494293359, 0),
(35, '分类修改', 'Category/update', 1, 32, 1, 1494293382, 0),
(36, '分类删除', 'Category/delete', 1, 32, 1, 1494293409, 0);

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` char(30) NOT NULL,
  `content` text NOT NULL,
  `cid` int(10) UNSIGNED NOT NULL,
  `author` char(20) NOT NULL,
  `source1` char(10) NOT NULL,
  `source2` char(10) NOT NULL,
  `img` text NOT NULL,
  `c_time` int(11) NOT NULL,
  `u_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `cid`, `author`, `source1`, `source2`, `img`, `c_time`, `u_time`) VALUES
(25, '百度', '', 1, 'https://baidu.com', '', '', '', 1544973702, 1544973732),
(26, '今日头条', '', 1, 'https://www.toutiao.', '', '', '', 1544975469, 1544975469),
(27, '凤凰网', '', 1, 'http://news.ifeng.co', '', '', '', 1544975496, 1544975496),
(28, '搜狐新闻', '', 1, 'http://news.sohu.com', '', '', '', 1544975529, 1544975529),
(29, '新东方', '', 6, 'http://www.xdf.cn/', '', '', '', 1544976012, 1544976012),
(30, '奥鹏教育', '', 6, 'http://www.open.com.', '', '', '', 1544976035, 1544976035),
(31, '高思教育', '', 6, 'https://www.gaosiedu', '', '', '', 1544976067, 1544976067),
(32, '中学学科', '', 6, 'http://www.zxxk.com/', '', '', '', 1544976083, 1544976083),
(33, 'it之家', '', 11, 'https://www.ithome.c', '', '', '', 1544976106, 1544976106),
(34, 'CSDN', '', 11, 'https://www.csdn.net', '', '', '', 1544976123, 1544976123),
(35, '51CTO', '', 11, 'http://www.51cto.com', '', '', '', 1544976138, 1544976138),
(36, 'IT时代', '', 11, 'http://www.ityears.c', '', '', '', 1544976161, 1544976161);

-- --------------------------------------------------------

--
-- 表的结构 `privilege`
--

CREATE TABLE `privilege` (
  `id` int(10) UNSIGNED NOT NULL,
  `pri_name` char(20) NOT NULL,
  `privilege` varchar(255) NOT NULL,
  `c_time` int(11) NOT NULL,
  `u_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `privilege`
--

INSERT INTO `privilege` (`id`, `pri_name`, `privilege`, `c_time`, `u_time`) VALUES
(1, '超级管理员', '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,27,28,29,30,31,32,33,34,35,36', 1544977710, 1544977710),
(4, '网址管理员', '1,2,3,4,5', 1544978315, 1544978315);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` char(12) NOT NULL,
  `password` char(32) NOT NULL,
  `pid` tinyint(4) NOT NULL,
  `email` char(50) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `c_time` int(11) NOT NULL,
  `u_time` int(11) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `level` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `pid`, `email`, `sex`, `c_time`, `u_time`, `money`, `level`, `type`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1, '5616115@qq.com', 1, 1465987584, 1465987584, '0.00', 1, 1),
(2, 'other', 'e10adc3949ba59abbe56e057f20f883e', 4, '23423424@qq.com', 0, 1544978011, 1544978011, '4.00', 0, 0),
(3, 'xiaoyan', 'c33367701511b4f6020ec61ded352059', 0, '', 0, 1547738029, 1547738029, '3.00', 0, 1),
(87, 'ceshi', 'e10adc3949ba59abbe56e057f20f883e', 0, '', 0, 1547811813, 1547811813, '0.00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ID` (`cid`);

--
-- Indexes for table `privilege`
--
ALTER TABLE `privilege`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- 使用表AUTO_INCREMENT `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- 使用表AUTO_INCREMENT `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- 使用表AUTO_INCREMENT `privilege`
--
ALTER TABLE `privilege`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- 限制导出的表
--

--
-- 限制表 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_ID` FOREIGN KEY (`cid`) REFERENCES `category` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
