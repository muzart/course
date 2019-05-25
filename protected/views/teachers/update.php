<?php
/* @var $this TeachersController */
/* @var $model Teachers */

$this->breadcrumbs=array(
	'O\'qituvchilar'=>array('index'),
	$model->getFullName()=>array('view','id'=>$model->id),
	'Yangilash',
);

$this->menu=array(
	array('label'=>'O\'qituvchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi o\'qituvchi', 'url'=>array('create')),
	array('label'=>'Ko\'rish', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->getFullName(); ?> ma'lumotlarini o'zgartirish</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>