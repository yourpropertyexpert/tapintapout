CREATE DATABASE IF NOT EXISTS tap;
USE tap;

DROP TABLE IF EXISTS `keys`;

CREATE TABLE `userkeys` (
  `userkey` varchar (255) NOT NULL,
  `user` varchar(255) NOT NULL,
  PRIMARY KEY (`userkey`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
