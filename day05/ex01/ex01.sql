CREATE TABLE IF NOT EXISTS ft_table
(
	`id` int(11) NOT NULL AUTO INCREMENT PRIMARY KEY,
	`login` varchar(8) NOT NULL DEFAULT 'toto',
	`group` ENUM NOT NULL ('staff', 'student', 'other'),
	`creation_date` DATE NOT NULL
);