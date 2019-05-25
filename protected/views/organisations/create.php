<?php
/* @var $this OrganisationsController */
/* @var $model Organisations */

$this->menu=array(
	array('label'=>'Tashkilotlar', 'url'=>array('index')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1>Yangi Tashkilot</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>