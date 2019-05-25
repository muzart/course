<?php
/* @var $this OrganisationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tashkilotlar',
);

$this->menu=array(
	array('label'=>'Yangi tashkilot', 'url'=>array('create')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Tashkilotlar</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
