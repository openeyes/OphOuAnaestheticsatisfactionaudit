<?php

class m121016_155738_fix_avpu extends CDbMigration
{
	public function up()
	{
		$this->delete('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',"name = 'New agitation confusion'");
	}

	public function down()
	{
		echo "***WARNING: data will not be restored, but original avpu options will be available***";
		$this->insert('et_ophauanaestheticsataudit_vitalsigns_conscious_lvl',array('name'=>'New agitation confusion','display_order'=>1, 'score' => 1));
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