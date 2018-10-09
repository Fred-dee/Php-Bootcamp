CREATE TABLE IF NOT EXISTS `db_mdilapi`.`ft_table`(
	`id` int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL ,
	`login` varchar(8)  DEFAULT 'toto' NOT NULL,
	`group` ENUM ('staff', 'student', 'other') NOT NULL ,
	`creation_date` DATE NOT NULL
);