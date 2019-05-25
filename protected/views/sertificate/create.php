<?php
/* @var $this SertificateController */
/* @var $model Sertificate */

$this->breadcrumbs=array(
	'Sertificates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sertificate', 'url'=>array('index')),
	array('label'=>'Manage Sertificate', 'url'=>array('admin')),
);
?>

<h1>Create Sertificate</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>