<?php
/* @var $this TeachersController */
/* @var $model Teachers */

$this->breadcrumbs=array(
	'O\'qituvchilar'=>array('index'),
	'Yaratish',
);

$this->menu=array(
	array('label'=>'O\'qituvchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Yangi o'qituvchi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>