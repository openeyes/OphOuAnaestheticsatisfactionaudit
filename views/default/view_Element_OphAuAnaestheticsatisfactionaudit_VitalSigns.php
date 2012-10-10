
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate'))?></td>
			<td><span class="big"><?php echo $element->respiratory_rate?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('oxygen_saturation'))?></td>
			<td><span class="big"><?php echo $element->oxygen_saturation?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('systolic_blood_pressure'))?></td>
			<td><span class="big"><?php echo $element->systolic_blood_pressure?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('body_temperature'))?></td>
			<td><span class="big"><?php echo $element->body_temperature?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate'))?></td>
			<td><span class="big"><?php echo $element->heart_rate?></span></td>
		</tr>
	</tbody>
</table>
