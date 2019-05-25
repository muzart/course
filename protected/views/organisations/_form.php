<?php
/* @var $this OrganisationsController */
/* @var $model Organisations */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'organisations-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
        <div class="input-group">
    		<div class="input-group-addon"><?php echo $form->labelEx($model,'name'); ?></div>
            <?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
		    <?php echo $form->error($model,'name'); ?>
        </div>
    </div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'region_id'); ?></div>
            <?php echo $form->dropDownList($model,'region_id',Regions::getAll(),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'region_id'); ?>
	    </div>
    </div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Saqlash', array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->