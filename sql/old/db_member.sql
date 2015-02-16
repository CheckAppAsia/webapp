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

CREATE TABLE `emergency_contact` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`relation` int(10) unsigned NOT NULL,
	`title` varchar(50) NOT NULL,
	`first_name` varchar(200) NOT NULL,
	`middle_name` varchar(200) NOT NULL,
	`last_name` varchar(200) NOT NULL,
	`phonenum1` varchar(30) NOT NULL,
	`phonenum2` varchar(30) NOT NULL,
	`suffix` varchar(50) NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `health` (
	`user_id` int(10) unsigned NOT NULL,
	`hair` varchar(100) NOT NULL,
	`eyes` varchar(100) NOT NULL,
	`complexion` varchar(100) NOT NULL,
	`marks` varchar(200) NOT NULL,
	`height` varchar(50) NOT NULL,
	`weight` varchar(50) NOT NULL,
	`blood_type` varchar(20) NOT NULL,
	`allergies` text NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;