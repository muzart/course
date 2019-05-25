<?php
/* @var $this OrganisationsController */
/* @var $data Organisations */
?>

<div class="col-lg-4 col-md-4 col-sm-6">
	<h4><?php echo CHtml::link(CHtml::encode($data->name), array('view', 'id'=>$data->id)); ?></h4>
	<h5><?php echo CHtml::encode($data->getAttributeLabel('region_id')); ?>:
	<?php echo CHtml::encode($data->region->name); ?></h5>
</div>