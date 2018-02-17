-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `uuid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'Email that must always matches the person''s email. If the value don''t match, then it means a replacement email is requsted.',
  `name` varchar(255) NOT NULL,
  `created_on` int(10) unsigned NOT NULL COMMENT 'Timestamp when the user was created',
  `updated_on` int(10) unsigned NOT NULL COMMENT 'Timestamp when the user was updated'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Users who can access the db tables, such as admins and membe';

INSERT INTO `user` (`uuid`, `email`, `name`, `created_on`, `updated_on`) VALUES
('5a144fd7-a8ef-3e34-9422-c4fafbd1f627',	'barz@bar.com',	'jon',	1505216746,	0);

-- 2017-09-12 18:03:55
