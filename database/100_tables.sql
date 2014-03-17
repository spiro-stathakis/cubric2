DROP DATABASE IF EXISTS `cubric`;
CREATE DATABASE `cubric`;
USE `cubric`; 
DROP TABLE IF EXISTS `ref_status`; 
CREATE TABLE `ref_status` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` varchar(512) NOT NULL,
  `title` varchar(128) default NULL,
  `display` int(11) default '1',
  `sort_order` int(11) default '100',
  `bit_flag` int(11) default '0',
  `modified_flag` int(10) unsigned default '0',
  `status_id` int(10) unsigned default '1',
  `create_time` int(10) unsigned NOT NULL,
  `create_usr_id` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned default NULL,
  `update_usr_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ref_status_status_id` (`status_id`),
  CONSTRAINT `fk_ref_status_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

INSERT INTO ref_status (`code` , `name` , `description` , `title` , `display` ) VALUES ('null' , 'null' , 'null' , 'no value' , 0 ); 
INSERT INTO ref_status (`code` , `name` , `description` , `title` , `display` ) VALUES ('active' , 'active' , 'active' , 'active'  , 1 ); 
INSERT INTO ref_status (`code` , `name` , `description` , `title` , `display` ) VALUES ('inactive' , 'inactive' , 'inactive' , 'inactive'  , 1 ); 
INSERT INTO ref_status (`code` , `name` , `description` , `title` , `display` ) VALUES ('cancelled' , 'cancelled' , 'cancelled' , 'cancelled'  , 1 );
INSERT INTO ref_status (`code` , `name` , `description` , `title` , `display` ) VALUES ('pending' , 'pending' , 'pending' , 'pending' , 1 );



DROP TABLE IF EXISTS `ref_filespace`; 
CREATE TABLE `ref_filespace` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `code` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `description` varchar(512) NOT NULL,
  `title` varchar(128) default NULL,
  `display` int(11) default '1',
  `sort_order` int(11) default '100',
  `bit_flag` int(11) default '0',
  `modified_flag` int(10) unsigned default '0',
  `status_id` int(10) unsigned default '1',
  `create_time` int(10) unsigned NOT NULL,
  `create_usr_id` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned default NULL,
  `update_usr_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_ref_filespace_status_id` (`status_id`),
  CONSTRAINT `fk_ref_filespace_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

INSERT INTO ref_filespace (`code` , `name` , `description` , `title` , `display` ) VALUES ('null' , 'null' , 'null' , 'no value' , 0 ); 
INSERT INTO ref_filespace (`code` , `name` , `description` , `title` , `display` ) VALUES ('home' , 'home' , 'home' , 'home' , 1 ); 
INSERT INTO ref_filespace (`code` , `name` , `description` , `title` , `display` ) VALUES ('scratch' , 'scratch' , 'scratch' , 'scratch' , 1 ); 


DROP TABLE IF EXISTS `user`; 
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `gender_id` int(10) unsigned default '1',
  `uid_number` int(10) unsigned NOT NULL,
  `gid_number` int(10) unsigned NOT NULL,
  `title_id` int(10) unsigned default '1',
  `logon_type_id` int(10) unsigned default '2',
  `forename` varchar(255) default NULL,
  `surname` varchar(255) default NULL,
  `known_as` varchar(255) default NULL,
  `id_man` varchar(255) default NULL,
  `hash` varchar(40) default NULL,
  `email` varchar(255) default NULL,
  `telephone` varchar(255) default NULL,
  `username` varchar(255) default NULL,
  `password` varchar(255) default NULL,
  `lang` varchar(8) default NULL,
  `dob` date default NULL,
  `modified_flag` int(10) unsigned default '0',
  `status_id` int(10) unsigned default '1',
  `create_time` int(10) unsigned NOT NULL,
  `create_user_id` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_user_status_id` (`status_id`),
  CONSTRAINT `fk_user_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;  


DROP TABLE IF EXISTS `disk_occupancy`; 
CREATE TABLE `disk_occupancy` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned NOT NULL,
  `filespace_id` int(10) unsigned NOT NULL,
  `occupancy` int(10) unsigned NOT NULL,
  `modified_flag` int(10) unsigned default '0',
  `status_id` int(10) unsigned default '1',
  `create_time` int(10) unsigned NOT NULL,
  `create_user_id` int(10) unsigned NOT NULL,
  `update_time` int(10) unsigned default NULL,
  `update_user_id` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `fk_disk_occupancy_status_id` (`status_id`),
  KEY `fk_disk_occupancy_user_id` (`user_id`),
  KEY `fk_disk_occupancy_filespace_id` (`filespace_id`),
  CONSTRAINT `fk_disk_occupancy_status_id` FOREIGN KEY (`status_id`) REFERENCES `ref_status` (`id`),
  CONSTRAINT `fk_disk_occupancy_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`), 
  CONSTRAINT `fk_disk_occupancy_filespace_id` FOREIGN KEY (`filespace_id`) REFERENCES `ref_filespace` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



