<?php

declare(strict_types = 1);

/**
CREATE USER 'test_user'@'localhost' IDENTIFIED BY  'testpass';

GRANT USAGE ON * . * TO  'test_user'@'localhost' IDENTIFIED BY  'testpass' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;

CREATE DATABASE IF NOT EXISTS  `test_user` ;

GRANT ALL PRIVILEGES ON  `test\_user` . * TO  'test_user'@'localhost';


--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`active` tinyint(1) DEFAULT '0',
`username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
`password` varchar(36) COLLATE utf8_unicode_ci NOT NULL,
`role_id` int(10) unsigned DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `user_username_unique` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
`user_id` int(10) unsigned NOT NULL,
`role_id` int(10) unsigned NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `user_roles_user_id_role_id_unique` (`user_id`,`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;


-- --------------------------------------------------------

ALTER TABLE `table_name`
 ADD CONSTRAINT index_name_unique UNIQUE (`field1`, `field2`);

ALTER TABLE `users` ADD `active` BOOLEAN DEFAULT '0' AFTER `id`;


SELECT u.*, CONCAT(u.`username`, ' has one to many related to ', u.role_id) as simple, GROUP_CONCAT(r.`id`) as roleIds
FROM `users` u
INNER JOIN `user_roles` ur ON u.`id` = ur.`user_id`
INNER JOIN `roles` r ON ur.`role_id` = r.`id`
GROUP BY u.`id`
ORDER BY u.`id`

 */

