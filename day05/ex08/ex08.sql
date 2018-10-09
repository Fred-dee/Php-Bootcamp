SELECT last_name, first_name, date(birthdate) FROM `db_mdilapi`.`user_card`  AS birthdate 
Where year(birthdate) = '1989' ORDER BY last_name;