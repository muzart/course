<?php
/* @var $this CoursesController */
/* @var $model Courses */


$this->menu=array(
	array('label'=>'Kurslar', 'url'=>array('index')),
	array('label'=>'Yangi kurs', 'url'=>array('create')),
	array('label'=>'Kurslarni ko\'rish', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1> <?php echo $model->id; ?>-kursni tahrirlash</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>