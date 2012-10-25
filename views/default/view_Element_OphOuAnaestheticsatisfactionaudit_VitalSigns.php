
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>
<div class="cols2 clearfix">
<div class="right">
<div id="liveMEWSContainer">
	<div class="whiteBox  MEWS <?php if ($element->calculateMEW() > 3) { echo "high"; } else { echo "ok"; } ?>">
		<h3>Calculated MEWS: <span id="liveMEWS"><?php echo $element->calculateMEW() ? $element->calculateMEW() : 'None'?></span></h3>
	</div>
</div>
</div>
<div class="left">
<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('respiratory_rate_id'))?></td>
			<td><span class="big score_<?php echo $element->respiratory_rate->score ?>"><?php echo $element->respiratory_rate ? $element->respiratory_rate->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('oxygen_saturation_id'))?></td>
			<td><span class="big score_<?php echo $element->oxygen_saturation->score ?>"><?php echo $element->oxygen_saturation ? $element->oxygen_saturation->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('systolic_id'))?></td>
			<td><span class="big score_<?php echo $element->systolic->score ?>"><?php echo $element->systolic ? $element->systolic->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('body_temp_id'))?></td>
			<td><span class="big score_<?php echo $element->body_temp->score ?>"><?php echo $element->body_temp ? $element->body_temp->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('heart_rate_id'))?></td>
			<td><span class="big score_<?php echo $element->heart_rate->score ?>"><?php echo $element->heart_rate ? $element->heart_rate->name : 'None'?></span></td>
		</tr>
				<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('conscious_lvl_id'))?></td>
			<td><span class="big score_<?php echo $element->conscious_lvl->score ?>"><?php echo $element->conscious_lvl ? $element->conscious_lvl->name : 'None'?></span></td>
		</tr>
	</tbody>

</table>
</div>
</div>