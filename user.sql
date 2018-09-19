
--
-- Table structure for table `user`
--


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(8) NOT NULL,
  `pass` varchar(8) NOT NULL,
  
  PRIMARY KEY (`id`)

) 

CREATE TABLE IF NOT EXISTS `environment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `indexLabel` varchar(11) NOT NULL,
  `markerType` varchar(11) NOT NULL,
  
  PRIMARY KEY (`id`)

) 

INSERT INTO `environment` (`id`, `year`, `month`, `day`, `y`, `indexLabel`, `markerType`) VALUES
(1, '2017', 5, 8, 120, '120', 'rainy'),
(2, '2017', 5, 9, 361, '361', 'rainy'),
(3, '2017', 5, 10, 125, '125', 'rainy'),
(4, '2017', 5, 11, 420, '420', 'rainy'),
(5, '2017', 5, 12, 316, '316', 'sunny'),
(6, '2017', 5, 13, 200, '200', 'rainy'),
(7, '2017', 5, 14, 377, '377', 'rainy');
