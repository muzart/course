<?php
/* @var $this CoursesController */
/* @var $model Courses */


$this->menu=array(
	array('label'=>'Kurslar', 'url'=>array('index')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Yangi o'quv kurs</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>