CREATE TABLE `user` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`email` varchar(200) NOT NULL,
	`username` varchar(32) NOT NULL,
	`password` varchar(32) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `location` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`city` varchar(200) NOT NULL,
	`state` varchar(100) NOT NULL,
	`zip` varchar(20) NOT NULL,
	`country` int(10) unsigned NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `versioning` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`table_name` text NOT NULL,
	`record_key` int(10) unsigned NOT NULL,
	`changes` text NOT NULL,
	`date_edited` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;