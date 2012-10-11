<?php

class m121010_124852_create_anaesthetist_table extends CDbMigration
{
	public function up()
	{
		$this->createTable('et_ophauanaestheticsataudit_anaesthetist_lookup',array(
				'user_id' => 'int(10) unsigned NOT NULL',
				'last_modified_user_id' => 'int(10) unsigned NOT NULL DEFAULT \'1\'',
				'last_modified_date' => 'datetime NOT NULL DEFAULT \'1900-01-01 00:00:00\'',
				'created_user_id' => 'int(10) unsigned NOT NULL DEFAULT \'1\'',
				'created_date' => 'datetime NOT NULL DEFAULT \'1900-01-01 00:00:00\'',
				'PRIMARY KEY (`user_id`)',
				'KEY `et_ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk` (`last_modified_user_id`)',
				'KEY `et_ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk` (`created_user_id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetist_lookup_created_user_fk` FOREIGN KEY (`created_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetist_lookup_last_mod_user_fk` FOREIGN KEY (`last_modified_user_id`) REFERENCES `user` (`id`)',
				'CONSTRAINT `et_ophauanaestheticsataudit_anaesthetist_lookup_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)'
			),
			'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin'
		);
	}

	public function down()
	{
		$this->dropTable('et_ophauanaestheticsataudit_anaesthetist_lookup');
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}