-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016 年 10 朁E18 日 15:16
-- サーバのバージョン： 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamblelist`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bets`
--

CREATE TABLE `bets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `choice_item` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `win_lose` varchar(255) DEFAULT NULL,
  `dividend` int(11) DEFAULT NULL,
  `lost` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `bets`
--

INSERT INTO `bets` (`id`, `user_id`, `game_id`, `choice_item`, `payment`, `win_lose`, `dividend`, `lost`, `created`, `modified`) VALUES
(60, 86, 26, 1, 1192, NULL, NULL, NULL, '2016-10-17 23:06:20', '2016-10-17 23:09:23'),
(61, 86, 31, 3, 4649, NULL, NULL, NULL, '2016-10-17 23:07:10', '2016-10-17 23:09:23'),
(62, 86, 28, 3, 100, NULL, NULL, NULL, '2016-10-17 23:07:51', '2016-10-17 23:09:23'),
(63, 66, 26, 5, 5000, NULL, NULL, NULL, '2016-10-17 23:09:03', '2016-10-17 23:09:24'),
(64, 66, 31, 4, 555, NULL, NULL, NULL, '2016-10-17 23:09:23', '2016-10-17 23:09:24');

-- --------------------------------------------------------

--
-- テーブルの構造 `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `eventday` datetime DEFAULT NULL,
  `item_1` varchar(255) DEFAULT NULL,
  `item_2` varchar(255) DEFAULT NULL,
  `item_3` varchar(255) DEFAULT NULL,
  `item_4` varchar(255) DEFAULT NULL,
  `item_5` varchar(255) DEFAULT NULL,
  `odds_1` float DEFAULT NULL,
  `odds_2` float DEFAULT NULL,
  `odds_3` float DEFAULT NULL,
  `odds_4` float DEFAULT NULL,
  `odds_5` float DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  `done` tinyint(1) NOT NULL DEFAULT '0',
  `result` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `games`
--

INSERT INTO `games` (`id`, `title`, `eventday`, `item_1`, `item_2`, `item_3`, `item_4`, `item_5`, `odds_1`, `odds_2`, `odds_3`, `odds_4`, `odds_5`, `sum`, `done`, `result`, `user_id`, `created`, `modified`) VALUES
(25, '今日の天気は？', '2016-10-20 22:39:00', '晴れ', '曇り', '雨', '雪', '猫が降る', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 74, '2016-10-17 22:39:45', '2016-10-17 23:08:24'),
(26, '最強の動物は？', '2016-11-08 22:40:00', 'ライオン', '虎', '象', 'アメリカン・バッファロー', 'カバ', 1, NULL, NULL, NULL, NULL, 1192, 0, NULL, 66, '2016-10-17 22:41:17', '2016-10-17 23:08:24'),
(27, '来年のプロ野球の優勝チームは？', '2016-12-02 22:41:00', '巨人', '中日', '広島', '阪神', 'ヤクルト', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 72, '2016-10-17 22:43:17', '2016-10-17 23:08:24'),
(28, 'アメリカ大統領になるのは？', '2016-11-02 22:44:00', 'ヒラリークリントン', 'ドナルド・トランプ', 'どちらにもならない', '-', '-', NULL, NULL, 1, NULL, NULL, 100, 0, NULL, 71, '2016-10-17 22:46:16', '2016-10-17 23:08:24'),
(29, '一番人気の猫は？', '2017-01-17 22:47:00', 'アメショー', 'アビシニアン', 'スコティッシュフォールド', 'メイクーン', '日本猫', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 73, '2016-10-17 22:48:58', '2016-10-17 23:08:24'),
(30, '外国人に一番人気の料理は？', '2016-10-29 22:50:00', '寿司', 'ラーメン', 'そば', 'わらび餅', '天丼', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 70, '2016-10-17 22:51:22', '2016-10-17 23:08:24'),
(31, '今年一番になるゲームは？', '2016-11-17 22:53:00', 'FF15', '人喰い大鷲のトリコ', 'グラビティデイズ2', 'ドラクエ　ビルダーズ', 'ゲームやってる時間ない。。', NULL, NULL, 1, NULL, NULL, 4649, 0, NULL, 68, '2016-10-17 22:54:40', '2016-10-17 23:08:24'),
(32, '弁当がうまいコンビニは？', '2016-11-17 22:56:00', 'ファミリーマート', 'ローソン', 'セブンイレブン', 'ミニストップ', 'ポプラ', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 74, '2016-10-17 22:57:11', '2016-10-17 23:08:24');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `win_count` int(11) DEFAULT NULL,
  `lose_count` int(11) DEFAULT NULL,
  `average` float DEFAULT NULL,
  `sum_payment` int(11) DEFAULT NULL,
  `sum_dividend` int(11) DEFAULT NULL,
  `sum_lost` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`id`, `username`, `win_count`, `lose_count`, `average`, `sum_payment`, `sum_dividend`, `sum_lost`, `amount`, `password`, `role`, `created`, `modified`) VALUES
(66, 'admin', NULL, NULL, NULL, 5555, NULL, NULL, 0, '7b768dc47254a02594fd837d767a49c86eaf498125f9b3c1dc8621f72286ca9f', 'admin', '2016-10-17 22:30:56', '2016-10-18 06:21:24'),
(67, 'cake太郎', NULL, NULL, NULL, NULL, NULL, NULL, 0, '06a9f27b33c3b61975f74acf438cb7ea3ad49d91f3ad714cb19af2af32ba3ef3', 'author', '2016-10-17 22:32:30', '2016-10-18 06:21:24'),
(68, 'あきんこ', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'c43f62eb640f2934edeae3482dbaae87c6db5e3a30890f9967d77b98b1b65777', 'author', '2016-10-17 22:33:01', '2016-10-18 06:21:24'),
(69, 'ねこたろう', NULL, NULL, NULL, NULL, NULL, NULL, 0, '45e3be59a7a15424e9ed8454e77d147e20fabc104fee68e872aee3c93fd62434', 'author', '2016-10-17 22:34:31', '2016-10-18 06:21:24'),
(70, '百合子', NULL, NULL, NULL, NULL, NULL, NULL, 0, '4d2f636cfbae8642f0f6d8bd8eaaeb20ee72f82fbaed44e3e672e4d94e4341de', 'author', '2016-10-17 22:35:37', '2016-10-18 06:21:24'),
(71, 'ますぞえ', NULL, NULL, NULL, NULL, NULL, NULL, 0, '4b8954cc214d7d6b734a038aefa4b03aaa626d28f38a866422005e438038b1f6', 'author', '2016-10-17 22:35:59', '2016-10-18 06:21:24'),
(72, 'inose', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'a16e0617d30aef8286a638a2be9d4e3d246e0000fba1bc7cadf23f600b70e601', 'author', '2016-10-17 22:36:12', '2016-10-18 06:21:24'),
(73, 'ishihara', NULL, NULL, NULL, NULL, NULL, NULL, 0, '53c38550512492dc22b7696ad591eede054a0742909876701d2b4bc368098e38', 'author', '2016-10-17 22:36:32', '2016-10-18 06:21:24'),
(74, 'あおしま', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'cde75a6df4d177ba991a70b4c8ff3b6adbfaabe4ab2d3087f9262b8aae0da988', 'author', '2016-10-17 22:37:45', '2016-10-18 06:21:24'),
(75, 'すりの銀次', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'd755d84a230007f31701a91ad39238bb1a3eea1185a65a31230f4e6962bf71e4', 'author', '2016-10-17 22:57:51', '2016-10-18 06:21:24'),
(76, 'アルフィー', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0b6b7121600074f890d8bd1171a1330723d66269e80394f664ce8389c62d1797', 'author', '2016-10-17 22:58:57', '2016-10-18 06:21:24'),
(77, '長嶋茂雄', NULL, NULL, NULL, NULL, NULL, NULL, 0, '83fe7752a40bc74db300d4a0a4a7aaac3052e131820d64b5ad3c6112ada7d38e', 'author', '2016-10-17 22:59:43', '2016-10-18 06:21:24'),
(78, '鳥山明', NULL, NULL, NULL, NULL, NULL, NULL, 0, '373b15c22122c1457b769fc9ffcabfb4b99da585735dda9219f7841aaec3d361', 'author', '2016-10-17 23:00:28', '2016-10-18 06:21:24'),
(79, 'アレキサンダー大王', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'df2e494edfdab1126c8e38adb01e1f548df61cf10480d298b21ee3aa4c62a185', 'author', '2016-10-17 23:01:13', '2016-10-18 06:21:24'),
(80, 'チンギスハーン', NULL, NULL, NULL, NULL, NULL, NULL, 0, '093d184b3e2d9602f2e7bdb6b136b23c03aadf124407097817371de265f85a75', 'author', '2016-10-17 23:01:35', '2016-10-18 06:21:24'),
(81, '千代の富士', NULL, NULL, NULL, NULL, NULL, NULL, 0, '28a5edc461142a2de8830323f78e09c206e58392535516fa97ea35c7a244bccb', 'author', '2016-10-17 23:02:14', '2016-10-18 06:21:24'),
(82, '信玄', NULL, NULL, NULL, NULL, NULL, NULL, 0, '0b35eb0b2db28da5e4af5e1a62cc92e9ada2eaa050d349212f78cc3424ee5143', 'author', '2016-10-17 23:02:59', '2016-10-18 06:21:24'),
(83, 'クリアクリーン', NULL, NULL, NULL, NULL, NULL, NULL, 0, '125e5aae078bcce71615072f8e60fe3bb01b74cdff4d34bd77c76dc446478e67', 'author', '2016-10-17 23:03:31', '2016-10-18 06:21:24'),
(84, 'amazon', NULL, NULL, NULL, NULL, NULL, NULL, 0, '90ea0b2a4ba55ceb2bb88c13a3f92893fd6bf79cc676beb36d41cb1290005ff0', 'author', '2016-10-17 23:03:54', '2016-10-18 06:21:24'),
(85, 'ブッシュ', NULL, NULL, NULL, NULL, NULL, NULL, 0, '98e1d4a609cdc77ac9c785283f5a4bfe415c23ffd1416e3f35569445e126951a', 'author', '2016-10-17 23:04:41', '2016-10-18 06:21:24'),
(86, 'ポリンキー', NULL, NULL, NULL, 5941, NULL, NULL, 0, 'e96169e0606020a0b839a0d630abf3b8b5ab1b764a11101ec325020793392dae', 'author', '2016-10-17 23:05:11', '2016-10-18 06:21:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bets`
--
ALTER TABLE `bets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bets`
--
ALTER TABLE `bets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
