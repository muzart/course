<?php
/* @var $this UserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tinglovchilar',
);

$this->menu=array(
	array('label'=>'Tinglovchi qo\'shish', 'url'=>array('create')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Tinglovchilar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
