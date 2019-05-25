<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Tinglovchilar'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Tinglovchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi tinglovchi', 'url'=>array('create')),
	array('label'=>'Tahrirlash', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'O\'chirish', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'O\'chirishga ishonchingiz komilmi?')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->fullName; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'surname',
		'midname',
		'inn',
        array(
            'name'=>'region_id',
            'value'=>$model->region->name
        ),'address',
		'phone',
		array(
            'name'=>'image',
            'value'=>CHtml::image($model->image,$model->getFullName(),array('style'=>'width: 150px')),
            'type'=>'html',
        ),
		array(
            'name'=>'org_id',
            'value'=>$model->org->name
        ),
		'post',
		array(
            'name'=>'created',
            'value'=>date('d-m-Y',$model->created)
        )
//		'login',
//		'password',
//		'activ_hash',
//		'is_active',
//		'role',
	),
)); ?>
