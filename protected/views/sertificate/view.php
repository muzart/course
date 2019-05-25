<?php
/* @var $this SertificateController */
/* @var $model Sertificate */

$this->breadcrumbs=array(
	'Sertificates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Sertificate', 'url'=>array('index')),
	array('label'=>'Create Sertificate', 'url'=>array('create')),
	array('label'=>'Update Sertificate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Sertificate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Sertificate', 'url'=>array('admin')),
);
?>

<h1>View Sertificate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'sertificate_number',
		'course_id',
		'given_date',
	),
)); ?>
