SET foreign_key_checks = 0;

INSERT INTO  `ctrl_auth_resource` (`id`, `resource`)VALUES
(7 , 'routes.App\\Controller'),
(8 , 'routes.App\\Controller\\Index');

INSERT INTO  `ctrl_auth_permission` (`id` , `role_id` , `resource_id` , `isAllowed`) VALUES
(NULL , '1',  '7',  '1'),
(NULL , '2',  '7',  '1'),
(NULL , '2',  '8',  '1');

SET foreign_key_checks = 1;