CREATE DATABASE IF NOT EXISTS tap;
USE tap;

DROP TABLE IF EXISTS userkeys;

CREATE TABLE userkeys (
  userkey varchar (255) NOT NULL,
  user varchar(255) NOT NULL,
  PRIMARY KEY (`userkey`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS currentlocation;

CREATE TABLE currentlocation (
  user varchar(255) NOT NULL,
  location varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;




currentlocation
