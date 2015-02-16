CREATE TABLE `institution` (
	`id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`address` text NOT NULL,
	`location` int(10) unsigned NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`profile_pic` varchar(255) NOT NULL,
	`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contact` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`institution_id` int(10) unsigned NOT NULL,
	`label` varchar(100) NOT NULL,
	`value` varchar(100) NOT NULL,
	`remarks` text NOT NULL,
	`by_staff_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `availability` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`institution_id` int(10) unsigned NOT NULL,
	`day` int(10) unsigned NOT NULL,
	`hour_start` int(10) unsigned NOT NULL,
	`hour_end` int(10) unsigned NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `services` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`institution_id` int(10) unsigned NOT NULL,
	`name` text NOT NULL,
	`remarks` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `staff` (
	`institution_id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`role` varchar(200) NOT NULL,
	`date_started` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`remarks` text NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`institution_id`,`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `staff_schedule` (
	`institution_id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`day` int(10) unsigned NOT NULL,
	`shift_start` int(10) unsigned NOT NULL,
	`shift_end` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`institution_id`,`provider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `staff_access` (
	`institution_id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`access_id` int(10) unsigned NOT NULL,
	`status` boolean NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`institution_id`,`provider_id`,`access_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `patient` (
	`institution_id` int(10) unsigned NOT NULL,
	`member_id` int(10) unsigned NOT NULL,
	`by_provider` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`institution_id`,`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `appointment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`institution_id` int(10) unsigned NOT NULL,
	`member_id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`schedule` datetime NOT NULL,
	`start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `appointment_log` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`appointment_id` int(10) unsigned NOT NULL,
	`staff_from` int(10) unsigned NOT NULL,
	`staff_to` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `document` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`appointment_id` int(10) unsigned NOT NULL,
	`institution_id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`member_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`,`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `document_simple` (
	`document_id` int(10) unsigned NOT NULL,
	`chief_complaint` text NOT NULL,
	`assessment` text NOT NULL,
	`plan` text NOT NULL,
	PRIMARY KEY (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `document_emr` (
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

CREATE TABLE `diagnostic_lab` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`title` varchar(200) NOT NULL,
	`summary` varchar(200) NOT NULL,
	`contents` text NOT NULL,
	`date_taken` datetime NOT NULL,
	`attachment` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `diagnostic_radiology` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`title` varchar(200) NOT NULL,
	`summary` varchar(200) NOT NULL,
	`contents` text NOT NULL,
	`date_taken` datetime NOT NULL,
	`attachment` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prescription` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`document_id` int(10) unsigned NOT NULL,
	`member_id` int(10) unsigned NOT NULL,
	`provider_id` int(10) unsigned NOT NULL,
	`med_brand` text NOT NULL,
	`med_generic` text NOT NULL,
	`med_type` int(10) unsigned NOT NULL,
	`med_id` int(10) unsigned NOT NULL,
	`quantity` int(11) NOT NULL,
	`instructions` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;