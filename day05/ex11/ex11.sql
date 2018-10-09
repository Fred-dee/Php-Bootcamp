SELECT UPPER(user_card.last_name) AS NAME, user_card.first_name, subscription.price
FROM `db_mdilapi`.`member` INNER JOIN 
	`db_mdilapi`.`user_card`
	ON member.id_member = user_card.id_user
	INNER JOIN
	`db_mdilapi`.subscription ON subscription.id_sub = member.id_sub
	WHERE subscription.price > 42
	ORDER BY user_card.last_name ASC, user_card.first_name ASC 