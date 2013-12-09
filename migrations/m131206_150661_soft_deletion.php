<?php

class m131206_150661_soft_deletion extends CDbMigration
{
	public function up()
	{
		$this->addColumn('et_ophouanaestheticsataudit_anaesthetis','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_anaesthetis_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_anaesthetist_lookup','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_anaesthetist_lookup_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_notes','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_notes_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_notes_ready_for_discharge','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_notes_ready_for_discharge_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_satisfactio','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_satisfactio_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_body_temp','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_body_temp_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_conscious_lvl','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_heart_rate','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_heart_rate_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_respiratory_rate','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_systolic','deleted','tinyint(1) unsigned not null');
		$this->addColumn('et_ophouanaestheticsataudit_vitalsigns_systolic_version','deleted','tinyint(1) unsigned not null');
	}

	public function down()
	{
		$this->dropColumn('et_ophouanaestheticsataudit_anaesthetis','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_anaesthetis_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_anaesthetist_lookup','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_anaesthetist_lookup_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_notes','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_notes_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_notes_ready_for_discharge','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_notes_ready_for_discharge_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_satisfactio','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_satisfactio_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_body_temp','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_body_temp_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_conscious_lvl','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_conscious_lvl_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_heart_rate','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_heart_rate_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_oxygen_saturation_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_respiratory_rate','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_respiratory_rate_version','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_systolic','deleted');
		$this->dropColumn('et_ophouanaestheticsataudit_vitalsigns_systolic_version','deleted');
	}
}
