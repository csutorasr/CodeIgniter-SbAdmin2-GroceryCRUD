CREATE TABLE `tomsteel`.`user_notifications` (
	`id` INT NOT NULL AUTO_INCREMENT ,
	`user_id` INT(10) UNSIGNED NOT NULL ,
	`text` VARCHAR(512) NOT NULL ,
	`created_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	`icon` VARCHAR(64) NULL DEFAULT NULL ,
	`link` VARCHAR(512) NULL DEFAULT NULL ,
	`color` VARCHAR(16) NOT NULL ,
	`seen` TINYINT NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`),
	INDEX (`user_id`),
	INDEX (`created_date`),
	INDEX (`user_id`)
) ENGINE = InnoDB;
