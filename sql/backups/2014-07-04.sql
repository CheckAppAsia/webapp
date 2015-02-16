CREATE TABLE `appointment` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`physician_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`schedule` datetime NOT NULL,
	`end_time` datetime NOT NULL,
	`patient_note` text NOT NULL,
	`diagnosis` text NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `appointment_meds` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`appointment_id` int(10) unsigned NOT NULL,
	`medicine` text NOT NULL,
	`notes` text NOT NULL,
	`amount_left` int(10) unsigned NOT NULL,
	`start_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
	`interval_hr` int(10) unsigned NOT NULL,
	`notification` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `appointment_record` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`appointment_id` int(10) unsigned NOT NULL,
	`record_name` text NOT NULL,
	`notes` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `country` (
	`country_id` int(10) unsigned NOT NULL,
	`name` varchar(50) NOT NULL,
	`active` boolean NOT NULL,
	PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institution` (
	`id` int(10) unsigned NOT NULL,
	`name` varchar(255) NOT NULL,
	`description` text NOT NULL,
	`address` text NOT NULL,
	`landline1` varchar(30) NOT NULL,
	`landline2` varchar(30) NOT NULL,
	`mobile1` varchar(30) NOT NULL,
	`mobile2` varchar(30) NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`profile_pic` varchar(255) NOT NULL,
	`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institution_admin` (
	`user_id` int(10) unsigned NOT NULL,
	`institution_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`user_id`,`institution_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institution_labs` (
	`institution_id` int(10) unsigned NOT NULL,
	`record_type` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`institution_id`,`record_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institution_physicians` (
	`institution_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`approver_id` int(10) unsigned NOT NULL,
	`since` varchar(50) NOT NULL,
	`position` varchar(100) NOT NULL,
	`visible_name` varchar(100) NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`institution_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `institution_services` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`institution_id` int(10) unsigned NOT NULL,
	`name` varchar(200) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `patient_exams` (
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

CREATE TABLE `patient_health` (
	`user_id` int(10) unsigned NOT NULL,
	`health_id` int(10) unsigned NOT NULL,
	`value` varchar(200) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`health_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `patient_profile` (
	`user_id` int(10) unsigned NOT NULL,
	`family_history` text NOT NULL,
	`known_allergies` text NOT NULL,
	`other` text NOT NULL,
	`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_clinic` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`physician_id` int(10) unsigned NOT NULL,
	`name` varchar(200) NOT NULL,
	`description` text NOT NULL,
	`num_landline` varchar(30) NOT NULL,
	`num_phone` varchar(30) NOT NULL,
	`address` text NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_clinic_labs` (
	`clinic_id` int(10) unsigned NOT NULL,
	`record_type` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`clinic_id`,`record_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_documents` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`physician_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`file` text NOT NULL,
	`status` int(11) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_patients` (
	`physician_id` int(10) unsigned NOT NULL,
	`patient_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`physician_id`,`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_profile` (
	`user_id` int(10) unsigned NOT NULL,
	`about` text NOT NULL,
	`specializations` text NOT NULL,
	`license_no` varchar(100) NOT NULL,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_school` (
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

CREATE TABLE `physician_secretary` (
	`user_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`clinic_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `post` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
	`user_id` int(10) unsigned NOT NULL,
	`message` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `post_like` (
	`post_id` int(10) unsigned NOT NULL,
	`user_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`post_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `physician_settings` (
	`physician_id` int(10) unsigned NOT NULL,
	`avail_sun` boolean NOT NULL,
	`avail_mon` boolean NOT NULL,
	`avail_tue` boolean NOT NULL,
	`avail_wed` boolean NOT NULL,
	`avail_thu` boolean NOT NULL,
	`avail_fri` boolean NOT NULL,
	`avail_sat` boolean NOT NULL,
	`hour_start` int(10) unsigned NOT NULL,
	`hour_end` int(10) unsigned NOT NULL,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `questionnaire` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`physician_id` int(10) unsigned NOT NULL,
	`name` varchar(200) NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `questionnaire_answer` (
	`user_id` int(10) unsigned NOT NULL,
	`question_id` int(10) unsigned NOT NULL,
	`answer` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `questionnaire_item` (
	`questionnaire_id` int(10) unsigned NOT NULL,
	`question_id` int(10) unsigned NOT NULL,
	PRIMARY KEY (`questionnaire_id`,`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `questionnaire_question` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`isDefault` boolean NOT NULL,
	`question` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `thread` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`type_id` int(10) unsigned NOT NULL,
	`user_id_1` int(10) unsigned NOT NULL,
	`user_id_2` int(10) unsigned NOT NULL,
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
	`user_to` int(10) unsigned NOT NULL,
	`message` text NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`email` varchar(200) NOT NULL,
	`username` varchar(32) NOT NULL,
	`password` varchar(32) NOT NULL,
	`activity` timestamp NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_friends` (
	`user_id_1` int(10) unsigned NOT NULL,
	`user_id_2` int(10) unsigned NOT NULL,
	`status_1` int(10) unsigned NOT NULL,
	`status_2` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id_1`,`user_id_2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_notifications` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`data` text NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`is_read` boolean NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_profile` (
	`user_id` int(10) unsigned NOT NULL,
	`title` varchar(50) NOT NULL,
	`first_name` varchar(200) NOT NULL,
	`middle_name` varchar(200) NOT NULL,
	`last_name` varchar(200) NOT NULL,
	`address1` text NOT NULL,
	`address2` text NOT NULL,
	`gender` int(10) unsigned NOT NULL,
	`birthdate` datetime NOT NULL,
	`num_landline` varchar(30) NOT NULL,
	`num_phone1` varchar(30) NOT NULL,
	`num_phone2` varchar(30) NOT NULL,
	`c_skype` varchar(100) NOT NULL,
	`c_msn` varchar(100) NOT NULL,
	`c_yahoo` varchar(100) NOT NULL,
	`c_gtalk` varchar(100) NOT NULL,
	`coord_lat` double NOT NULL,
	`coord_lng` double NOT NULL,
	`profile_pic` varchar(255) NOT NULL,
	`completion` int(10) unsigned NOT NULL,
	`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_settings` (
	`user_id` int(10) unsigned NOT NULL,
	`setting_id` int(10) unsigned NOT NULL,
	`value` varchar(100) NOT NULL,
	`updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_subscribe` (
	`user_id` int(10) unsigned NOT NULL,
	`physician_id` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`physician_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_verifications` (
	`user_id` int(10) unsigned NOT NULL,
	`type` int(10) unsigned NOT NULL,
	`code` varchar(500) NOT NULL,
	`status` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user_widgets` (
	`user_id` int(10) unsigned NOT NULL,
	`widget_id` int(10) unsigned NOT NULL,
	`sort_num` int(10) unsigned NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`user_id`,`widget_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `var_settings` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`name` varchar(100) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `var_exams` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`name` varchar(100) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `var_widgets` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`type` int(10) unsigned NOT NULL,
	`name` varchar(100) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `var_questionnaire` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `var_health` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;