<?php

class m140815_145800_rename_event extends CDbMigration
{
	public function up()
	{
		$this->update('event_type',array('name' => 'Anaesthetic satisfaction audit'),"class_name = 'OphOuAnaestheticsatisfactionaudit'");
	}

	public function down()
	{
		$this->update('event_type',array('name' => 'Anaesthetic Satisfaction Audit'),"class_name = 'OphOuAnaestheticsatisfactionaudit'");
	}
}
