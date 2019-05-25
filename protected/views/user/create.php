<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Tinglovchilar'=>array('index'),
	'Yangi tinglovchi',
);

$this->menu=array(
	array('label'=>'Tinglovchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Yangi tinglovchi</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>