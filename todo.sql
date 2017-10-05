drop database toDO;
create database toDO;
USE toDO;

CREATE TABLE Users(
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`username`varchar(40),
`password` varchar(255),
PRIMARY KEY(`id`)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

CREATE TABLE List(
`id` int(10)unsigned NOT NULL AUTO_INCREMENT,
`item` text(100),
PRIMARY KEY(`id`)

)ENGINE=INNODB DEFAULT CHARSET=utf8;

SELECT * FROM List;
SELECT * FROM Users;