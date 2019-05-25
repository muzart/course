<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="well-sm">
    <h1><i>"<?php echo CHtml::encode(Yii::app()->name); ?>" o'quv markaziga </i>xush kelibsiz! </h1>
</div>

<h3 class="text-center">Hozirda mavjud kurslar: </h3>
<?php $this->widget('application.widgets.CoursesWidget'); ?>
<h3 class="text-center"></h3>
