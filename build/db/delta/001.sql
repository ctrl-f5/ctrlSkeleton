CREATE TABLE ctrl_blog_user (id INT AUTO_INCREMENT NOT NULL, displayName VARCHAR(255) NOT NULL, ctrlAuthUser_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_AA04D01DCFB6C36 (ctrlAuthUser_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE ctrl_blog_article (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, dateCreated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE ctrl_auth_role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, system TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_1EAC7D065E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE ctrl_auth_user_role (role_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_DC44D216D60322AC (role_id), INDEX IDX_DC44D216A76ED395 (user_id), PRIMARY KEY(role_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE ctrl_auth_resource (id INT AUTO_INCREMENT NOT NULL, resource VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C46703C7BC91F416 (resource), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE ctrl_auth_user (id INT AUTO_INCREMENT NOT NULL, system TINYINT(1) NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C4562125F85E0677 (username), UNIQUE INDEX UNIQ_C4562125E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
CREATE TABLE ctrl_auth_permission (id INT AUTO_INCREMENT NOT NULL, role_id INT DEFAULT NULL, resource_id INT DEFAULT NULL, isAllowed TINYINT(1) NOT NULL, INDEX IDX_5BB379BDD60322AC (role_id), INDEX IDX_5BB379BD89329D25 (resource_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB;
ALTER TABLE ctrl_blog_user ADD CONSTRAINT FK_AA04D01DCFB6C36 FOREIGN KEY (ctrlAuthUser_id) REFERENCES ctrl_auth_user (id) ON DELETE CASCADE;
ALTER TABLE ctrl_auth_user_role ADD CONSTRAINT FK_DC44D216D60322AC FOREIGN KEY (role_id) REFERENCES ctrl_auth_role (id);
ALTER TABLE ctrl_auth_user_role ADD CONSTRAINT FK_DC44D216A76ED395 FOREIGN KEY (user_id) REFERENCES ctrl_auth_user (id);
ALTER TABLE ctrl_auth_permission ADD CONSTRAINT FK_5BB379BDD60322AC FOREIGN KEY (role_id) REFERENCES ctrl_auth_role (id);
ALTER TABLE ctrl_auth_permission ADD CONSTRAINT FK_5BB379BD89329D25 FOREIGN KEY (resource_id) REFERENCES ctrl_auth_resource (id);

--//@UNDO

