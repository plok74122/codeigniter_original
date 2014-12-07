-- phpMyAdmin SQL Dump
-- version 4.2.1
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2014 年 12 月 07 日 22:56
-- 伺服器版本: 5.6.14-enterprise-commercial-advanced
-- PHP 版本： 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `file_server`
--

-- --------------------------------------------------------

--
-- 資料表結構 `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`no` int(11) NOT NULL,
  `file_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raw_name` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_ext` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_size` int(11) NOT NULL,
  `file_path` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upload_date` date NOT NULL,
  `file_md5` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` int(11) NOT NULL DEFAULT '24'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=10 ;

--
-- 資料表的匯出資料 `files`
--

INSERT INTO `files` (`no`, `file_name`, `raw_name`, `file_ext`, `file_size`, `file_path`, `upload_date`, `file_md5`, `user`) VALUES
(2, 'style.css', 'style', 'css', 294, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '6c330f006778e0be2ec24d7fe0bdf705', 24),
(3, 'bootstrap.min.css', 'bootstrap.min', 'css', 109518, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '385b964b68acb68d23cb43a5218fade9', 24),
(4, 'demo.css', 'demo', 'css', 1124, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '7d6392efbcd4e97529515fc39b9b1c93', 24),
(5, 'jquery.fileupload-ui-noscript.css', 'jquery.fileupload-ui-noscript', 'css', 371, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '0c769317554eae79220fc46f461949c8', 24),
(6, 'demo-ie8.css', 'demo-ie8', 'css', 396, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '7ca68f022842fbf2711854d9588f85df', 24),
(7, 'jquery.fileupload.css', 'jquery.fileupload', 'css', 655, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '4fa26ac9336e22afed27b17747fe73de', 24),
(8, 'jquery.fileupload-noscript.css', 'jquery.fileupload-noscript', 'css', 431, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '24196312ab7e70eaeb6014ba46f8d0f0', 24),
(9, 'jquery.fileupload-ui.css', 'jquery.fileupload-ui', 'css', 1102, 'C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\upload_dir\\', '2014-12-07', '41aef3334d38845a83c43f2dff2105eb', 24);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`no`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `files`
--
ALTER TABLE `files`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
