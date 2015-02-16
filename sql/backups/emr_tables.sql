CREATE TABLE `appointment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`physician_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`clinic_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`schedule` datetime NOT NULL,
	`end_time` datetime NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clinic` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`physician_id` int(10) unsigned NOT NULL,
	`name` varchar(200) NOT NULL,
	`intro_short` varchar(255) NOT NULL,
	`intro_full` text NOT NULL,
	`street` text NOT NULL,
	`locati`  NOT NULL,
	`timez`  NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clinic_availability` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`clinic_id` int(10) unsigned NOT NULL,
	`day` int(10) unsigned NOT NULL,
	`hour_start` int(10) unsigned NOT NULL,
	`hour_end` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clinic_emr` (
	`clinic_id`  unsigned NOT NULL,
	`emr_id` int(10) unsigned NOT NULL,
	`user_grant` int(10) unsigned NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`emr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clinic_patient` (
	`clinic_id`  unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`added_by` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `clinic_staff` (
	`clinic_id`  unsigned NOT NULL,
	`user_id` int(10) unsigned NOT NULL,
	`label` varchar(200) NOT NULL,
	`shift_start` int(10) unsigned NOT NULL,
	`shift_end` int(10) unsigned NOT NULL,
	`date_started` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`access` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`patient_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`start_time` datetime NOT NULL,
	`end_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_sub` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`staff_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`c`  NOT NULL,
	`source_type` int(10) unsigned NOT NULL,
	`source_id` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_obj_sys` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`staff_id` int(10) unsigned NOT NULL,
	`system` int(10) unsigned NOT NULL,
	`c`  NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_obj_dx` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`staff_id` int(10) unsigned NOT NULL,
	`diagnostic_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_assess` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`disease` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `emr_patient` (
	`emr_id` int(10) unsigned NOT NULL,
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
	`religi`  NOT NULL,
	`marital` text NOT NULL,
	`street` text NOT NULL,
	`locati`  NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`profile_pic` varchar(255) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`emr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `prescription` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`med_brand` text NOT NULL,
	`med_generic` text NOT NULL,
	`med_type` int(10) unsigned NOT NULL,
	`med_id` int(10) unsigned NOT NULL,
	`quantity` int(11) NOT NULL,
	`instructi`  NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `referral_diagnostic` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`diagnostic_id` int(10) unsigned NOT NULL,
	`diagnostic_name` text NOT NULL,
	`diagnostic_type` int(10) unsigned NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `referral_institution` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`referer_id` int(10) unsigned NOT NULL,
	`instituti`  NOT NULL,
	`admissi`  NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `referral_provider` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`emr_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`referer_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`physician_name` text NOT NULL,
	`purpose` text NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `location` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`fk_type` int(10) unsigned NOT NULL,
	`fk_id` int(10) unsigned NOT NULL,
	`city` varchar(200) NOT NULL,
	`state` varchar(100) NOT NULL,
	`zip` varchar(20) NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contact` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`fk_type` int(10) unsigned NOT NULL,
	`fk_id` int(10) unsigned NOT NULL,
	`label` varchar(100) NOT NULL,
	`value` varchar(100) NOT NULL,
	`remarks` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;