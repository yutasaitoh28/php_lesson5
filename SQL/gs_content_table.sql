-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2022 年 6 月 16 日 15:39
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_db5`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_content_table`
--

CREATE TABLE `gs_content_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL COMMENT '記事のタイトル',
  `content` varchar(256) NOT NULL COMMENT '記事の内容',
  `img` varchar(256) NOT NULL COMMENT '画像のPATH',
  `date` datetime NOT NULL COMMENT '登録日',
  `update_time` datetime DEFAULT NULL COMMENT '更新日（NULL許容）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='記事のテーブル';

--
-- テーブルのデータのダンプ `gs_content_table`
--

INSERT INTO `gs_content_table` (`id`, `title`, `content`, `img`, `date`, `update_time`) VALUES
(35, 'タイトルテスト', '記事内容記事内容記事内容', '', '2022-06-17 00:38:29', NULL),
(36, 'タイトル２', 'きじ２', '', '2022-06-17 00:38:50', NULL),
(37, '３３３３３', '３３３３３３', '', '2022-06-17 00:38:55', NULL);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_content_table`
--
ALTER TABLE `gs_content_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_content_table`
--
ALTER TABLE `gs_content_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
