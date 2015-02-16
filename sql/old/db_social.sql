CREATE TABLE `post` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_type` int(10) unsigned NOT NULL,
	`user_id` int(10) unsigned NOT NULL,
	`target_type` int(10) unsigned NOT NULL,
	`target_id` int(10) unsigned NOT NULL,
	`message` text NOT NULL,
	`attach_type` int(10) unsigned NOT NULL,
	`attach_data` text NOT NULL,
	`privacy` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `post_comment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`post_id` int(10) unsigned NOT NULL,
	`user_type` int(10) unsigned NOT NULL,
	`user_id` int(10) unsigned NOT NULL,
	`message` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `post_like` (
	`post_id` int(10) unsigned NOT NULL,
	`user_type` int(10) unsigned NOT NULL,
	`user_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_photos` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`album_id` int(10) unsigned NOT NULL,
	`caption` text NOT NULL,
	`filename` text NOT NULL,
	`date_taken` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_albums` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`name` text NOT NULL,
	`description` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `friends` (
	`user_id_1` int(10) unsigned NOT NULL,
	`user_id_2` int(10) unsigned NOT NULL,
	`status_1` int(10) unsigned NOT NULL,
	`status_2` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id_1`,`user_id_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `subscription` (
	`user_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`status` boolean NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;