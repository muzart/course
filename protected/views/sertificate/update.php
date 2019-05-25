<?php
/* @var $this SertificateController */
/* @var $model Sertificate */

$this->breadcrumbs=array(
	'Sertificates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Sertificate', 'url'=>array('index')),
	array('label'=>'Create Sertificate', 'url'=>array('create')),
	array('label'=>'View Sertificate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Sertificate', 'url'=>array('admin')),
);
?>

<h1>Update Sertificate <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>