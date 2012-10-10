
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('score_id'))?></td>
			<td><span class="big"><?php echo $element->score ? $element->score->name : 'None'?></span></td>
		</tr>
	</tbody>
</table>
