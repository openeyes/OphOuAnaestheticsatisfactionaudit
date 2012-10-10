
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pain'))?></td>
			<td><span class="big"><?php echo $element->pain?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('nausea'))?></td>
			<td><span class="big"><?php echo $element->nausea?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('vomited'))?></td>
			<td><span class="big"><?php $element->vomited ? 'Yes' : 'No'?></span></td>
		</tr>
	</tbody>
</table>
