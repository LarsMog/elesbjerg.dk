CREATE TABLE IF NOT EXISTS `#__ehl_members` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`name` VARCHAR(255)  NOT NULL ,
`address` VARCHAR(255)  NOT NULL ,
`zip` VARCHAR(255)  NOT NULL ,
`city` VARCHAR(255)  NOT NULL ,
`phone` VARCHAR(255)  NOT NULL ,
`mobile` VARCHAR(255)  NOT NULL ,
`workphone` VARCHAR(255)  NOT NULL ,
`email` VARCHAR(255)  NOT NULL ,
`email2` VARCHAR(255)  NOT NULL ,
`doublemember` VARCHAR(255)  NOT NULL ,
`gender` VARCHAR(255)  NOT NULL ,
`created` DATE NOT NULL DEFAULT '0000-00-00',
`birthyear` VARCHAR(255)  NOT NULL ,
`coname` VARCHAR(255)  NOT NULL ,
`memberstatus` VARCHAR(255)  NOT NULL ,
`placename` VARCHAR(255)  NOT NULL ,
`postbox` VARCHAR(255)  NOT NULL ,
`education` VARCHAR(255)  NOT NULL ,
`job` VARCHAR(255)  NOT NULL ,
`union1` VARCHAR(255)  NOT NULL ,
`affiliations` VARCHAR(255)  NOT NULL ,
`union2` VARCHAR(255)  NOT NULL ,
`affiliations_outside` VARCHAR(255)  NOT NULL ,
`materal` VARCHAR(255)  NOT NULL ,
`localnotes` VARCHAR(255)  NOT NULL ,
`localnotes2` VARCHAR(255)  NOT NULL ,
`updated` DATE NOT NULL DEFAULT '0000-00-00',
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

CREATE TABLE IF NOT EXISTS `#__ehl_members_stats` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,

`ordering` INT(11)  NOT NULL ,
`state` TINYINT(1)  NOT NULL ,
`checked_out` INT(11)  NOT NULL ,
`checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
`created_by` INT(11)  NOT NULL ,
`date` DATE NOT NULL DEFAULT '0000-00-00',
`members` INT(11)  NOT NULL ,
`memberswants` INT(11)  NOT NULL ,
`gender_f` INT(11)  NOT NULL ,
`gender_m` INT(11)  NOT NULL ,
`zip6600` INT(11)  NOT NULL ,
`zip6700` INT(11)  NOT NULL ,
`zip6705` INT(11)  NOT NULL ,
`zip6710` INT(11)  NOT NULL ,
`zip6715` INT(11)  NOT NULL ,
`zip6720` INT(11)  NOT NULL ,
`zip6731` INT(11)  NOT NULL ,
`zip6740` INT(11)  NOT NULL ,
`zip6760` INT(11)  NOT NULL ,
`zip6771` INT(11)  NOT NULL ,
PRIMARY KEY (`id`)
) DEFAULT COLLATE=utf8_general_ci;

