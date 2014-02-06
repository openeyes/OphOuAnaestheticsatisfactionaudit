<?php

class m140206_105146_remove_soft_deletion_from_models_that_dont_need_it extends CDbMigration
{
	public $tables = array(
		'et_ophouanaestheticsataudit_anaesthetis',
		'et_ophouanaestheticsataudit_notes',
		'et_ophouanaestheticsataudit_satisfactio',
		'et_ophouanaestheticsataudit_vitalsigns',
		'ophouanaestheticsataudit_notes_ready_for_discharge',
	);

	public function up()
	{
		$this->execute("CREATE TABLE `ophouanaestheticsataudit_anaesthetist_lookup_version` (
				`id` int(10) unsigned NOT NULL,
				`user_id` int(10) unsigned NOT NULL,
				`last_modified_user_id` int(10) unsigned NOT NULL DEFAULT '1',
				`last_modified_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
				`created_user_id` int(10) unsigned NOT NULL DEFAULT '1',
				`created_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
				`version_date` datetime NOT NULL DEFAULT '1900-01-01 00:00:00',
				`version_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
				PRIMARY KEY (`version_id`),
				KEY `acv_ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk` (`user_id`),
				KEY `acv_ophauanaestheticsataudit_anaesthetist_lookup_lmui_fk` (`last_modified_user_id`),
				KEY `acv_ophauanaestheticsataudit_anaesthetist_lookup_cui_fk` (`created_user_id`),
				KEY `ophouanaestheticsataudit_anaesthetist_lookup_aid_fk` (`id`),
				CONSTRAINT `acv_ophauanaestheticsataudit_anaesthetist_lookup_cui_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`),
				CONSTRAINT `acv_ophauanaestheticsataudit_anaesthetist_lookup_lmui_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`),
				CONSTRAINT `acv_ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
			) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin");

		$this->dropColumn('ophouanaestheticsataudit_anaesthetist_lookup','deleted');

		foreach ($this->tables as $table) {
			$this->dropColumn($table,'deleted');
			$this->dropColumn($table.'_version','deleted');

			$this->dropForeignKey("{$table}_aid_fk",$table."_version");
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'deleted','tinyint(1) unsigned not null');
			$this->addColumn($table."_version",'deleted','tinyint(1) unsigned not null');

			$this->addForeignKey("{$table}_aid_fk",$table."_version","id",$table,"id");
		}

		$this->addColumn('ophouanaestheticsataudit_anaesthetist_lookup','deleted','tinyint(1) unsigned not null');

		$this->dropTable('ophouanaestheticsataudit_anaesthetist_lookup_version');
	}
}
