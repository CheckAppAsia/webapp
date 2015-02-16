CREATE TABLE `chat` (
	`id` int(11) NOT NULL,
	`from` varchar(255) NOT NULL,
	`from_fullname` varchar(255) NOT NULL,
	`to` varchar(255) NOT NULL,
	`to_fullname` varchar(255) NOT NULL,
	`message` text NOT NULL,
	`sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`recd` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `thread` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`type_id` int(10) unsigned NOT NULL,
	`user_id_1` int(10) unsigned NOT NULL,
	`user_type_1` int(10) unsigned NOT NULL,
	`user_id_2` int(10) unsigned NOT NULL,
	`user_type_2` int(10) unsigned NOT NULL,
	`subject` text NOT NULL,
	`user_read_1` int(11) NOT NULL,
	`user_read_2` int(11) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `thread_message` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`thread_id` int(10) unsigned NOT NULL,
	`user_from` int(10) unsigned NOT NULL,
	`user_from_type` int(10) unsigned NOT NULL,
	`user_to` int(10) unsigned NOT NULL,
	`user_to_type` int(10) unsigned NOT NULL,
	`message` text NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;