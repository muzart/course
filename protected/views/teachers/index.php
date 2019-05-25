<?php
/* @var $this TeachersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'O\'qituvchilar',
);

$this->menu=array(
	array('label'=>'Yangi o\'qituvchi', 'url'=>array('create')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>O'qituvchilar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
