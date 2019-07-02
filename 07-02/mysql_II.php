<?php

declare(strict_types = 1);

/*
 * CONSTRAINT constraint_name
FOREIGN KEY foreign_key_name (columns)
REFERENCES parent_table(columns)
ON DELETE action
ON UPDATE action
 */

/*
 * ALTER TABLE  `user_roles` ADD CONSTRAINT  `user_roles_role_id_foreign`
 *  FOREIGN KEY  `user_roles_role_id_foreign` (  `role_id` )
 *  REFERENCES  `roles` (  `id` )
 *  ON DELETE CASCADE ON UPDATE CASCADE
 *
 * ALTER TABLE `user_roles` DROP FOREIGN KEY `user_roles_role_id_foreign`;
 * DELETE FROM `user_roles`
WHERE NOT EXISTS (
	SELECT 1 FROM `roles` WHERE `roles`.`id` = `user_roles`.`role_id`
)
 */