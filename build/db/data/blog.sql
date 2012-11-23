SET foreign_key_checks = 0;

INSERT INTO `article` (`id`, `title`, `content`, `dateCreated`) VALUES
(1, 'dsafas', 'dsadsadsadsa\r\ndsa\r\nfd\r\ngsfdg\r\nfh\r\nghdyty\r\nbg\r\nfgfdsgfdgsdf', '2012-11-15 13:00:00');

INSERT INTO `blog_user` (`id`, `ctrlAuthUser_id`, `displayName`) VALUES
(1, 1, 'John Doe');

SET foreign_key_checks = 1;