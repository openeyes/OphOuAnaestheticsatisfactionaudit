
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>
<div class="eventHighlight big">
	<h4><?php if ($element->anaesthetist) { echo $element->anaesthetist->fullNameAndTitle; } elseif ($element->non_consultant) { echo $element::NONCONSULTANT_DISP; } else { echo $element::NOANAESTHETIST_DISP; } ?></h4>
</div>

