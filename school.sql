-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-11-28 14:47:08
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_goods`
--

CREATE TABLE IF NOT EXISTS `think_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` char(20) NOT NULL,
  `goods_time` datetime NOT NULL,
  `goods_type` char(1) DEFAULT NULL COMMENT '商品类型',
  `goods_img` blob COMMENT '商品图片',
  `goods_price` decimal(10,0) NOT NULL COMMENT '商品价格',
  `goods_detail` text NOT NULL COMMENT '商品详情',
  `goods_qq` char(11) NOT NULL COMMENT '商家QQ',
  `goods_tel` char(12) NOT NULL COMMENT '商家电话',
  `user_id` varchar(20) NOT NULL,
  PRIMARY KEY (`goods_id`),
  UNIQUE KEY `name` (`goods_name`),
  UNIQUE KEY `goods_id_2` (`goods_id`),
  KEY `goods_id` (`goods_id`),
  KEY `goods_id_3` (`goods_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=110 ;

--
-- 转存表中的数据 `think_goods`
--

INSERT INTO `think_goods` (`goods_id`, `goods_name`, `goods_time`, `goods_type`, `goods_img`, `goods_price`, `goods_detail`, `goods_qq`, `goods_tel`, `user_id`) VALUES
(106, '小米3', '2016-11-28 17:06:19', '2', 0x75706c6f61642f323031362d31312d32382f353833626633633661303139342e6a7067, '1234', '这是一个手机', '123456789', '12340456778', '19'),
(107, '小米4', '2016-11-28 17:10:50', '2', 0x75706c6f61642f323031362d31312d32382f353833626634653561393362652e6a7067, '124', '12454', '123456', '1234', '19'),
(108, 'vivox5m', '2016-11-28 17:50:10', '2', 0x75706c6f61642f323031362d31312d32382f353833626665303034386130342e6a7067, '2000', '这是一个好的手机', '123456789', '1234567890', '28'),
(109, 'vivox7', '2016-11-28 17:51:13', '2', 0x75706c6f61642f323031362d31312d32382f353833626665333562373466622e6a7067, '2345', '这是一个很不错的手机', '1234567', '1234567890', '28');

-- --------------------------------------------------------

--
-- 表的结构 `think_lost`
--

CREATE TABLE IF NOT EXISTS `think_lost` (
  `lost_id` int(11) NOT NULL AUTO_INCREMENT,
  `lost_name` char(20) NOT NULL,
  `lost_time` datetime NOT NULL,
  `lost_type` char(1) NOT NULL,
  `lost_img` blob NOT NULL,
  `lost_detail` text NOT NULL,
  `lost_qq` char(11) NOT NULL,
  `lost_tel` char(12) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  PRIMARY KEY (`lost_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `think_lost`
--

INSERT INTO `think_lost` (`lost_id`, `lost_name`, `lost_time`, `lost_type`, `lost_img`, `lost_detail`, `lost_qq`, `lost_tel`, `user_id`) VALUES
(1, '小米', '2016-11-24 10:24:00', '1', '', '这是一个手机', '123', '123', '27'),
(4, '饭卡', '0000-00-00 00:00:00', '3', '', '这是一个饭卡', '12345', '12445', '28'),
(5, '英语书', '0000-00-00 00:00:00', '1', 0x75706c6f61642f323031362d31312d32382f353833626531666238393237392e6a7067, '', '12345', '12345', '28');

-- --------------------------------------------------------

--
-- 表的结构 `think_user`
--

CREATE TABLE IF NOT EXISTS `think_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `username` char(20) NOT NULL COMMENT '用户名',
  `userpassword` varchar(20) NOT NULL COMMENT '用户密码',
  `userclass` char(20) NOT NULL COMMENT '学院',
  `useremail` varchar(40) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `think_user`
--

INSERT INTO `think_user` (`user_id`, `username`, `userpassword`, `userclass`, `useremail`) VALUES
(19, 'liuchang', 'lclc94530', 'liuchang', ''),
(22, '1', '1', '1', ''),
(23, '1', '1', '1', '1'),
(24, '123', '123', '1', '1126w836@qq.com'),
(25, 'dad', 'ad', 'da', 'daw'),
(26, 'liuchang1', '123', '213', '1126w83DASD6@qq.com'),
(27, 'lixiaoying', '123456', 'ruanjian', '123456@qq.com'),
(28, 'lxy', '123456', '软件学院', '1234567@qq.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
