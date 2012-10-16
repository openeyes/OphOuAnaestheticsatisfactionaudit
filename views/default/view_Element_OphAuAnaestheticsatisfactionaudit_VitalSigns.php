
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate_id'))?></td>
			<td><span class="big"><?php echo $element->respiratory_rate ? $element->respiratory_rate->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('oxygen_saturation_id'))?></td>
			<td><span class="big"><?php echo $element->oxygen_saturation ? $element->oxygen_saturation->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('systolic_id'))?></td>
			<td><span class="big"><?php echo $element->systolic ? $element->systolic->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('body_temp_id'))?></td>
			<td><span class="big"><?php echo $element->body_temp ? $element->body_temp->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate_id'))?></td>
			<td><span class="big"><?php echo $element->heart_rate ? $element->heart_rate->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('conscious_lvl_id'))?></td>
			<td><span class="big"><?php echo $element->conscious_lvl ? $element->conscious_lvl->name : 'None'?></span></td>
		</tr>
		<tr <?php if ($element->calculateMEW() > 3) {?>class="highMEWS"<?php } ?>>
			<td width="30%">Calculated MEWS</td>
			<td><span class="big"><?php echo $element->calculateMEW() ? $element->calculateMEW() : 'None'?></span></td>
		</tr>
	</tbody>

</table>
