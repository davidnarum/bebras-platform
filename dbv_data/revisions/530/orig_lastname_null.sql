ALTER TABLE  `contestant` CHANGE  `orig_lastName`  `orig_lastName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE  `contestant` CHANGE  `orig_firstName`  `orig_firstName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE  `history_contestant` CHANGE  `orig_lastName`  `orig_lastName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;# MySQL returned an empty result set (i.e. zero rows).
ALTER TABLE  `history_contestant` CHANGE  `orig_firstName`  `orig_firstName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;# MySQL returned an empty result set (i.e. zero rows).


ALTER TABLE  `user` CHANGE  `orig_lastName`  `orig_lastName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE  `user` CHANGE  `orig_firstName`  `orig_firstName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;
ALTER TABLE  `history_user` CHANGE  `orig_lastName`  `orig_lastName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;# MySQL returned an empty result set (i.e. zero rows).
ALTER TABLE  `history_user` CHANGE  `orig_firstName`  `orig_firstName` VARCHAR( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;# MySQL returned an empty result set (i.e. zero rows).

ALTER TABLE `history_school` CHANGE `orig_name` `orig_name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `history_school` CHANGE `orig_city` `orig_city` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;
ALTER TABLE `history_school` CHANGE `orig_country` `orig_country` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL;