<?php
/* @var $this OrganisationsController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">
    <h3 class="text-center"><?php echo $organisation->name;?></h3>
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'users-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array(
            'enctype'=>'multipart/form-data'
        ),
    )); ?>


    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <?php echo $form->labelEx($model,'surname'); ?>
            </div>
            <?php echo $form->textField($model,'surname',array('size'=>70,'maxlength'=>50,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'surname'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
                <?php echo $form->labelEx($model,'name'); ?>
            </div>
            <?php echo $form->textField($model,'name',array('size'=>70,'maxlength'=>50,'class'=>'form-control')); ?>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>


    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon"><?php echo $form->labelEx($model,'midname'); ?></div>
        <?php echo $form->textField($model,'midname',array('size'=>70,'maxlength'=>50,'class'=>'form-control')); ?>
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
            <div class="input-group-addon">
        <?php echo $form->labelEx($model,'inn'); ?></div>
        <?php echo $form->textField($model,'inn',array('size'=>70,'maxlength'=>25,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'inn'); ?>
    </div></div>

    <div class="form-group">
        <div class="input-group">
            <div class="input-group-addon">
        <?php echo $form->labelEx($model,'post'); ?></div>
        <?php echo $form->textField($model,'post',array('size'=>70,'maxlength'=>50,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'post'); ?>
    </div></div>

    <div class="buttons">
        <?php echo CHtml::submitButton('Saqlash',array('class'=>'btn btn-success')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->