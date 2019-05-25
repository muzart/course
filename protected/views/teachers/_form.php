<?php
/* @var $this TeachersController */
/* @var $model Teachers */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teachers-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'htmlOptions'=>array(
        'enctype'=>'multipart/form-data',
    ),
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'name'); ?></div>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div></div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'surname'); ?></div>
		<?php echo $form->textField($model,'surname',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div></div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'midname'); ?></div>
		<?php echo $form->textField($model,'midname',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'midname'); ?>
	</div></div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'image'); ?></div>
        <?php if(!$model->isNewRecord) echo CHtml::image($model->image,$model->getFullName(),array('style'=>'height:150px')); ?>
		<?php echo $form->fileField($model,'image_file',array('size'=>60,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'image'); ?>
	</div></div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'phone'); ?></div>
		<?php echo $form->textField($model,'phone',array('size'=>50,'maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div></div>

	<div class="form-group buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Saqlash' : 'Saqlash',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->