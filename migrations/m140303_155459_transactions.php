<?php

class m140303_155459_transactions extends CDbMigration
{
	public $tables = array('et_ophouanaestheticsataudit_anaesthetis','et_ophouanaestheticsataudit_notes','et_ophouanaestheticsataudit_satisfactio','et_ophouanaestheticsataudit_vitalsigns','ophouanaestheticsataudit_anaesthetist_lookup','ophouanaestheticsataudit_notes_ready_for_discharge','ophouanaestheticsataudit_vitalsigns_body_temp','ophouanaestheticsataudit_vitalsigns_conscious_lvl','ophouanaestheticsataudit_vitalsigns_heart_rate','ophouanaestheticsataudit_vitalsigns_oxygen_saturation','ophouanaestheticsataudit_vitalsigns_respiratory_rate','ophouanaestheticsataudit_vitalsigns_systolic');

	public function up()
	{
		foreach ($this->tables as $table) {
			$this->addColumn($table,'hash','varchar(40) not null');
			$this->addColumn($table,'transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_tid',$table,'transaction_id');
			$this->addForeignKey($table.'_tid',$table,'transaction_id','transaction','id');

			$this->addColumn($table.'_version','hash','varchar(40) not null');
			$this->addColumn($table.'_version','transaction_id','int(10) unsigned null');
			$this->addColumn($table.'_version','deleted_transaction_id','int(10) unsigned null');
			$this->createIndex($table.'_vtid',$table.'_version','transaction_id');
			$this->addForeignKey($table.'_vtid',$table.'_version','transaction_id','transaction','id');
			$this->createIndex($table.'_dtid',$table.'_version','deleted_transaction_id');
			$this->addForeignKey($table.'_dtid',$table.'_version','deleted_transaction_id','transaction','id');
		}
	}

	public function down()
	{
		foreach ($this->tables as $table) {
			$this->dropColumn($table,'hash');
			$this->dropForeignKey($table.'_tid',$table);
			$this->dropIndex($table.'_tid',$table);
			$this->dropColumn($table,'transaction_id');

			$this->dropColumn($table.'_version','hash');
			$this->dropForeignKey($table.'_vtid',$table.'_version');
			$this->dropIndex($table.'_vtid',$table.'_version');
			$this->dropColumn($table.'_version','transaction_id');
			$this->dropForeignKey($table.'_dtid',$table.'_version');
			$this->dropIndex($table.'_dtid',$table.'_version');
			$this->dropColumn($table.'_version','deleted_transaction_id');
		}
	}
}
