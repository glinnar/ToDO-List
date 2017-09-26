drop database toDO;
create database toDO;
USE toDO;

CREATE TABLE List(
`id` int(10)unsigned NOT NULL AUTO_INCREMENT,
`item` text(100),
PRIMARY KEY(`id`)

)ENGINE=INNODB DEFAULT CHARSET=utf8;

SELECT * FROM List;