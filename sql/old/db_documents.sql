CREATE TABLE `document` (
	`document_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`member_profile` int(10) unsigned NOT NULL,
	`provider_profile` int(10) unsigned NOT NULL,
	`institution_profile` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `simple` (
	`document_id` int(10) unsigned NOT NULL,
	`chief_complaint` text NOT NULL,
	`assessment` text NOT NULL,
	`plan` text NOT NULL,
	PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr` (
	`document_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_subjective` (
	`document_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`contents` text NOT NULL,
	`source` int(10) unsigned NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`document_id`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_system_based` (
	`document_id` int(10) unsigned NOT NULL,
	`body_system` int(10) unsigned NOT NULL,
	`content` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`document_id`,`body_system`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_diagnostic` (
	`document_id` int(10) unsigned NOT NULL,
	`diagnostic_type` int(10) unsigned NOT NULL,
	`diagnostic_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`document_id`,`diagnostic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_assessment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`document_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`disease_name` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_plan` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`document_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`contents` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `referral_diagnostic` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`document_id` int(10) unsigned NOT NULL,
	`diagnostic_name` text NOT NULL,
	`diagnostic_type` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `referral_institution` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`document_id` int(10) unsigned NOT NULL,
	`institution_name` text NOT NULL,
	`admission` boolean NOT NULL,
	`remarks` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `referral_provider` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`document_id` int(10) unsigned NOT NULL,
	`physician_name` text NOT NULL,
	`remarks` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_profile` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`user_type` int(10) unsigned NOT NULL,
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
	`street` varchar(200) NOT NULL,
	`city` varchar(200) NOT NULL,
	`state` varchar(100) NOT NULL,
	`zip` varchar(20) NOT NULL,
	`country` int(10) unsigned NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`profile_pic` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institution_profile` (
	`id` int(10) unsigned NOT NULL,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`address` text NOT NULL,
	`street` varchar(200) NOT NULL,
	`city` varchar(200) NOT NULL,
	`state` varchar(100) NOT NULL,
	`zip` varchar(20) NOT NULL,
	`country` int(10) unsigned NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;