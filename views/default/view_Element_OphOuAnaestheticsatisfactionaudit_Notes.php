
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<?php if ($element->comments) {?>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('comments'))?></td>
			<td><span class="big"><?php echo CHtml::encode($element->comments)?></span></td>
		</tr>
		<?php } ?>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('ready_for_discharge_id'))?></td>
			<td><span class="big"><?php echo $element->ready_for_discharge ? $element->ready_for_discharge->name : 'None'?></span></td>
		</tr>
	</tbody>
</table>
