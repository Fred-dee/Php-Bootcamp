SELECT last_name, first_name FROM 
	`db_mdilapi`.`user_card`
	INNER JOIN
	`db_mdilapi`.`member` ON member.id_user_card = user.id_user
	WHERE last_name LIKE "%-%" OR first_name LIKE "%-%"
	ORDER BY last_name ASC, first_name ASC; 