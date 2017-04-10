CREATE TABLE `smf_cs_categories` (
  `id` int(12) UNSIGNED NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `smf_cs_categories` (`id`, `name`) VALUES
(1, 'Food'),
(2, 'Drinks');

ALTER TABLE `smf_cs_categories`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `smf_cs_categories`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT;
