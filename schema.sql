
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `bid` (
  `id_bid` int(11) NOT NULL,
  `bid_date` date NOT NULL,
  `bid_sum` int(11) NOT NULL COMMENT 'сумма – цена, по которой пользователь готов приобрести лот',
  `id_user` int(11) NOT NULL,
  `id_goods` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `goods` (
  `id_goods` int(11) NOT NULL,
  `goods_date_reg` date NOT NULL,
  `goods_name` varchar(255) NOT NULL,
  `goods_info` varchar(535) NOT NULL,
  `goods_img` varchar(255) NOT NULL,
  `goods_price` int(11) NOT NULL,
  `goods_date_end` date NOT NULL,
  `goods_bid` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_winner` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `user_date_reg` date NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_avatar` varchar(255) DEFAULT NULL,
  `user_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `bid`
  ADD PRIMARY KEY (`id_bid`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_goods` (`id_goods`);


ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);


ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_goods`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_winner` (`id_winner`),
  ADD KEY `id_category` (`id_category`);


ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);


ALTER TABLE `bid`
  MODIFY `id_bid` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `goods`
  MODIFY `id_goods` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`id_goods`) REFERENCES `goods` (`id_goods`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `goods_ibfk_3` FOREIGN KEY (`id_winner`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


