<?php
$this->header();
?>
<h3 class="withEventIcon">
    <?php echo $this->event_type->name ?>
</h3> 
 

    <div id="event_<?php echo $this->module->name ?>">
        <div id="elements" class="view">
            <?php $this->renderDefaultElements('view'); ?>
        </div>
    </div>
 
 

<?php $this->footer(); ?>