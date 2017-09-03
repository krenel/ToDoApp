CREATE TABLE `users` (
	`user_id` INT NOT NULL AUTO_INCREMENT,
	`user_first_name` varchar(15) NOT NULL,
	`user_last_name` varchar(15) NOT NULL,
	`user_email` varchar(30) NOT NULL,
	`user_password` varchar(60) NOT NULL,
	`user_admin_status` BOOLEAN NOT NULL DEFAULT '0',
	PRIMARY KEY (`user_id`)
);

CREATE TABLE `users_lists` (
	`list_id` INT NOT NULL AUTO_INCREMENT,
	`list_user_id` INT NOT NULL,
	`list_title` varchar(30) NOT NULL,
	`list_delete_status` BOOLEAN NOT NULL DEFAULT '0',
	PRIMARY KEY (`list_id`)
);

CREATE TABLE `tasks` (
	`task_id` INT NOT NULL AUTO_INCREMENT,
	`task_list_id` INT NOT NULL,
	`task_status` BOOLEAN NOT NULL DEFAULT '0',
	`task_description` varchar(200) NOT NULL,
	`task_deadline` DATE NOT NULL,
	`task_created_at` DATE NOT NULL,
	PRIMARY KEY (`task_id`)
);

ALTER TABLE `users_lists` ADD CONSTRAINT `users_lists_fk0` FOREIGN KEY (`list_user_id`) REFERENCES `users`(`user_id`) ON DELETE CASCADE;

ALTER TABLE `tasks` ADD CONSTRAINT `tasks_fk0` FOREIGN KEY (`task_list_id`) REFERENCES `users_lists`(`list_id`) ON DELETE CASCADE;

INSERT INTO users (user_first_name, user_last_name, user_email, user_password,user_admin_status)
VALUES ('User','Someone' , 'user@xyz.com', '12dea96fec20593566ab75692c9949596833adc9',1);

-- password for user@xyz.com: user
