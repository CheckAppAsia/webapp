CREATE TABLE `account` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`email` varchar(200) NOT NULL,
	`username` varchar(32) NOT NULL,
	`activity` timestamp NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `profile` (
	`user_id` int(10) unsigned NOT NULL,
	`title` varchar(50) NOT NULL,
	`first_name` varchar(200) NOT NULL,
	`middle_name` varchar(200) NOT NULL,
	`last_name` varchar(200) NOT NULL,
	`birthdate` datetime NOT NULL,
	`gender` int(10) unsigned NOT NULL,
	`language` text NOT NULL,
	`ethnicity` text NOT NULL,
	`race` text NOT NULL,
	`religion` text NOT NULL,
	`marital` text NOT NULL,
	`address` text NOT NULL,
	`location` int(10) unsigned NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`profile_pic` varchar(255) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `settings` (
	`user_id` int(10) unsigned NOT NULL,
	`setting_id` int(10) unsigned NOT NULL,
	`value` varchar(100) NOT NULL,
	`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `notification` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`data` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`is_read` boolean NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `verification` (
	`user_id` int(10) unsigned NOT NULL,
	`code` varchar(500) NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contact_detail` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`label` varchar(100) NOT NULL,
	`value` varchar(100) NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `verification_document` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`file` text NOT NULL,
	`status` int(11) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `medical_school` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`course` varchar(200) NOT NULL,
	`school_name` varchar(200) NOT NULL,
	`year_start` varchar(4) NOT NULL,
	`year_end` varchar(4) NOT NULL,
	`comments` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `license_number` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` varchar(200) NOT NULL,
	`number` varchar(200) NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `specialization` (
	`user_id` int(10) unsigned NOT NULL,
	`specialization_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`specialization_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `packages` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`label` text NOT NULL,
	`data` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;