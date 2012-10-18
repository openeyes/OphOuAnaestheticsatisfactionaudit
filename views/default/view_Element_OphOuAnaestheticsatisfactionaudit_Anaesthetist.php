
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anaesthetist_id'))?></td>
			<td><span class="big"><?php if ($element->anaesthetist) { echo $element->anaesthetist->fullNameAndTitle; } elseif ($element->non_consultant) { echo $element::NONCONSULTANT_DISP; } else { echo $element::NOANAESTHETIST_DISP; } ?></span></td>
		</tr>
	</tbody>
</table>
