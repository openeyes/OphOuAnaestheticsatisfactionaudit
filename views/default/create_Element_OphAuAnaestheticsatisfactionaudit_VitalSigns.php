<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
 ?>
 
 <script type="text/javascript">
	 $(document).ready(function() {
	 	scoreData = {
	 		'respiratory_rate' : <?php echo CJavaScript::encode(CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_RespiratoryRate::model()->findAll(array('order'=> 'display_order asc')),'id','score')); ?>,
	 		'oxygen_saturation': <?php echo CJavaScript::encode(CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_OxygenSaturation::model()->findAll(array('order'=> 'display_order asc')),'id','score')); ?>,
	 		'systolic': <?php echo CJavaScript::encode(CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_Systolic::model()->findAll(array('order'=> 'display_order asc')),'id','score')); ?>,
	 		'body_temp': <?php echo CJavaScript::encode(CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_BodyTemp::model()->findAll(array('order'=> 'display_order asc')),'id','score')); ?>,
	 		'heart_rate': <?php echo CJavaScript::encode(CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_HeartRate::model()->findAll(array('order'=> 'display_order asc')),'id','score')); ?>,
	 		'conscious_lvl': <?php echo CJavaScript::encode(CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_ConsciousLvl::model()->findAll(array('order'=> 'display_order asc')),'id','score')); ?>
	 	};
	 	calculateScore();
	 });
 </script>
<div class="<?php echo $element->elementType->class_name?>">
	<h4 class="elementTypeName"><?php  echo $element->elementType->name; ?></h4>
	
	<?php echo $form->dropDownList($element, 'respiratory_rate_id', CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_RespiratoryRate::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'oxygen_saturation_id', CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_OxygenSaturation::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'systolic_id', CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_Systolic::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'body_temp_id', CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_BodyTemp::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'heart_rate_id', CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_HeartRate::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<?php echo $form->dropDownList($element, 'conscious_lvl_id', CHtml::listData(Element_OphAuAnaestheticsatisfactionaudit_VitalSigns_ConsciousLvl::model()->findAll(array('order'=> 'display_order asc')),'id','name'),array('empty'=>'- Please select -'))?>
	<div id="liveMEWSContainer">
		<div id="MEWS" style="display: none;">
			<span>Calculated MEWS:</span>
			<span id="liveMEWS"></span>
		</div>
	</div>
	
</div>

