
<h3 class="subsection"><?php  echo $element->elementType->name ?></h4>
<div class="cols2 clearfix">
<div class="right">
<h4><?php echo CHtml::encode($element->getAttributeLabel('comments'))?></h4>
	<div class="eventHighlight medium">
	<h4><?php echo $element->comments ? CHtml::encode($element->comments) : 'None' ?></h4>
	</div>
</div>

<div class="left">
<h4><?php echo CHtml::encode($element->getAttributeLabel('ready_for_discharge_id'))?></h4>
	<div class="eventHighlight medium">
	<h4><?php echo $element->ready_for_discharge ? $element->ready_for_discharge->name : 'None'?></h4>
	</div>
</div>

</div>