<?php

class m140205_101523_remove_orphaned_version_table extends CDbMigration
{
	public function up()
	{
		$this->dropTable('et_ophouanaestheticsataudit_anaesthetist_lookup_version');
	}

	public function down()
	{
		$this->execute("CREATE TABLE `et_ophouanaestheticsataudit_anaesthetist_lookup_version` (
	`user_id` int(10) unsigned NOT NULL,
	`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`last_modified_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
	`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
	`created_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
	`id` int(10) unsigned NOT NULL,
	`version_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
	`version_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`deleted` tinyint(1) unsigned NOT NULL,
	PRIMARY KEY (`version_id`),
	KEY `acv_phauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk` (`last_modified_user_id`),
	KEY `acv_phauanaestheticsataudit_anaesthetist_lookup_created_user_fk` (`created_user_id`),
	KEY `acv_et_ophouanaestheticsataudit_anaesthetist_lookup` (`user_id`),
	KEY `et_ophouanaestheticsataudit_anaesthetist_lookup_aid_fk` (`id`),
	CONSTRAINT `acv_et_ophouanaestheticsataudit_anaesthetist_lookup` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phauanaestheticsataudit_anaesthetist_lookup_created_user_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `acv_phauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
	CONSTRAINT `et_ophouanaestheticsataudit_anaesthetist_lookup_aid_fk` FOREIGN KEY (`id`) REFERENCES `ophouanaestheticsataudit_anaesthetist_lookup` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
	}
}
