<?php
/* @var $this OrganisationsController */
/* @var $model Organisations */

$this->breadcrumbs=array(
	'Tashkilotlar'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Tahrirlash',
);

$this->menu=array(
	array('label'=>'Tashkilotlar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi tashkilot', 'url'=>array('create')),
	array('label'=>'Ko\'rish', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Tahrirlash "<?php echo $model->name; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>