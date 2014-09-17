CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `points` double NOT NULL,
  `level` int(11) NOT NULL,
  `sharing` varchar(255) NOT NULL,
  `invite` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
);
