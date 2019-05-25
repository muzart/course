<?php
/* @var $this CoursesController */
/* @var $model Courses */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courses-form',
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
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div></div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'description'); ?></div>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'description'); ?>
	</div></div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'image'); ?></div>
            <?php if(!$model->isNewRecord) echo CHtml::image($model->image,$model->name,array('style'=>'height:150px')); ?>
            <?php echo $form->fileField($model,'image_file',array('size'=>60,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'image'); ?>
    </div></div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'begin_date'); ?></div>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'model'     => $model,
            'attribute' => 'begin_date',
            'language'=> 'ru',
            'options'=>array(
                'showButtonPanel'=>true,
                'dateFormat'=>'dd/mm/yy',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
            ),
            'htmlOptions'=>array(
                'id'=>'begin_date',
                'class'=>'form-control'
            )
        ));?>
		<?php echo $form->error($model,'begin_date'); ?>
        </div>
    </div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'end_date'); ?></div>
            <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'     => $model,
                'attribute' => 'end_date',
                'language'=> 'ru',
                'options'=>array(
                    'showButtonPanel'=>true,
                    'dateFormat'=>'dd/mm/yy',//Date format 'mm/dd/yy','yy-mm-dd','d M, y','d MM, y','DD, d MM, yy'
                ),
                'htmlOptions'=>array(
                    'id'=>'end_date',
                    'class'=>'form-control'
                )
            ));?>
            <?php echo $form->error($model,'end_date'); ?>
	    </div>
	</div>

	<div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'teacher_id'); ?></div>
            <?php echo $form->dropDownList($model,'teacher_id',Teachers::getAll(),array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'teacher_id'); ?>
	    </div>
    </div>


	<div class="buttons">
		<?php echo CHtml::submitButton('Saqlash',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->