SELECT REVERSE(SUBSTR(phone_number,2)) AS rebmunenohp FROM
	`db_mdilapi`.`distrib`
	WHERE phone_number LIKE "05%";