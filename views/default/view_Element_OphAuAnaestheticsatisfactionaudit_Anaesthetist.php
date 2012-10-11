
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anaesthetist_id'))?></td>
			<td><span class="big"><?php echo $element->anaesthetist ? $element->anaesthetist->fullNameAndTitle : 'None'?></span></td>
		</tr>
	</tbody>
</table>
