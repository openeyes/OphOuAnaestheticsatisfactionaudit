
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>
<div class="cols2 clearfix">
<div class="right"></div>
<div class="left">
<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('pain'))?></td>
			<td><span class="big"><?php echo $element->pain?></span></td>
		</tr>
		<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('nausea'))?></td>
			<td><span class="big"><?php echo $element->nausea?></span></td>
		</tr>
		<tr>
			<td width="50%"><?php echo CHtml::encode($element->getAttributeLabel('vomited'))?></td>
			<td><span class="big"><?php echo $element->vomited ? 'Yes' : 'No'?></span></td>
		</tr>
	</tbody>
</table>
</div>
</div>
