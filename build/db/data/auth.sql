SET foreign_key_checks = 0;

INSERT INTO  `ctrl_auth_resource` (`id`, `resource`)VALUES
(7 , 'routes.Ctrl\\Blog\\Controller\\Index'),
(8 , 'routes.Ctrl\\Blog\\Controller\\Article');

INSERT INTO  `ctrl_blog`.`ctrl_auth_permission` (`id` , `role_id` , `resource_id` , `isAllowed`) VALUES
(7 , '2',  '7',  '1'),
(8 , '2',  '8',  '1');

SET foreign_key_checks = 1;