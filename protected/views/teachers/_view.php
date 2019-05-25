<?php
/* @var $this TeachersController */
/* @var $data Teachers */
?>

<div class="col-lg 4 col-md-4 col-sm-12 teacher">
    <h5><?php echo CHtml::link($data->getFullName(),array('view', 'id'=>$data->id));?></h5>

    <?php echo CHtml::image($data->image,$data->getFullName(),array('style'=>'max-width:150px')); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
	<?php echo CHtml::encode($data->surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('midname')); ?>:</b>
	<?php echo CHtml::encode($data->midname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />
</div>