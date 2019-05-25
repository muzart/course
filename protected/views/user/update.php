<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Tinglovchilar'=>array('index'),
	$model->fullName=>array('view','id'=>$model->id),
	'Yangilash',
);

$this->menu=array(
	array('label'=>'Tinglovchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Tinglovchi qo\'shish', 'url'=>array('create')),
	array('label'=>'Ko\'rish', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->getFullName(); ?> ma'lumotlarini yangilash</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>