<?php
/* @var $this SertificateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sertificates',
);

$this->menu=array(
	array('label'=>'Create Sertificate', 'url'=>array('create')),
	array('label'=>'Manage Sertificate', 'url'=>array('admin')),
);
?>

<h1>Sertificates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
