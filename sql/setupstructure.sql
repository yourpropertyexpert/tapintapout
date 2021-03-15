CREATE DATABASE IF NOT EXISTS tap;
USE tap;

DROP TABLE IF EXISTS userkeys;

CREATE TABLE userkeys (
  userkey varchar (255) NOT NULL,
  userid BIGINT NOT NULL,
  PRIMARY KEY (userkey)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS currentlocation;

CREATE TABLE currentlocation (
  userid BIGINT NOT NULL,
  location varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS users;

CREATE TABLE users (
    userid BIGINT NOT NULL AUTO_INCREMENT,
    userstatus varchar(16) NOT NULL DEFAULT 'UNCONFIRMED',
    firstname varchar(255),
    familyname varchar(255),
    email varchar(255) NOT NULL,
    UNIQUE (email),
    PRIMARY KEY (userid)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;
