SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE `smf_cs_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` decimal(13,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `smf_cs_items` (`id`, `title`, `description`, `image`, `price`) VALUES
(1, 'Bacon', 'Gotta have dat goodness.', 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg', '4.20'),
(2, 'Lettuce', 'Crips, refreshing lettuce..', 'http://www.rockcityeats.com/wp-content/uploads/2013/09/lettuce_iceberg.jpg', '4.20');

CREATE TABLE `smf_cs_item_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `smf_cs_item_comments` (`id`, `item_id`, `username`, `body`) VALUES
(1, 1, 'TehCraw', 'This is a comment'),
(2, 1, 'Antes', 'This is also a comment.'),
(3, 2, 'TehCraw', 'This is a comment'),
(4, 2, 'Antes', 'This is also a comment.');


ALTER TABLE `smf_cs_items`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `smf_cs_item_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);


ALTER TABLE `smf_cs_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
ALTER TABLE `smf_cs_item_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
