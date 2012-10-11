<?php

class m121011_161035_add_null_anaesthetist_options extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophauanaestheticsataudit_anaesthetis', 'non_consultant', 'boolean NOT NULL DEFAULT False');
		$this->addColumn('et_ophauanaestheticsataudit_anaesthetis', 'no_anaesthetist', 'boolean NOT NULL DEFAULT False');
		$this->alterColumn('et_ophauanaestheticsataudit_anaesthetis', 'anaesthetist_id', 'int(10) unsigned');
	}

	public function down()
	{
		$this->dropColumn('et_ophauanaestheticsataudit_anaesthetis', 'non_consultant');
		$this->dropColumn('et_ophauanaestheticsataudit_anaesthetis', 'no_anaesthetist');
		$this->alterColumn('et_ophauanaestheticsataudit_anaesthetis', 'anaesthetist_id', 'int(10) unsigned not null');
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