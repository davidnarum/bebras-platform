ALTER TABLE `contest` ADD `rankGrades` TINYINT(1) NOT NULL DEFAULT '0' AFTER `allowTeamsOfTwo`, ADD `rankNbContestants` INT NOT NULL DEFAULT '0' AFTER `rankGrades`;