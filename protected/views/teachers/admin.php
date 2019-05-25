<?php
/* @var $this TeachersController */
/* @var $model Teachers */

$this->breadcrumbs=array(
	'O\'qituvchilar'=>array('index'),
	'Boshqaruv',
);

$this->menu=array(
	array('label'=>'O\'qituvchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi o\'qituvchi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#teachers-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>O'qituvchilar ma'lumotlarini boshqarish</h1>

<?php echo CHtml::link('Kengaytirilgan qidiruv','#',array('class'=>'search-button btn btn-warning btn-sm')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('EExcelView', array(
	'id'=>'teachers-grid',
	'dataProvider'=>$model->search(),
    'title'=>'O\'qituvchilar',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
	'filter'=>$model,
	'columns'=>array(
//		'id',
        array(
            'name'=>'image',
            'class'=>'EImageColumn',
            'value'=>'substr($data->image,1,strlen($data->image)-1)',
            'htmlOptions'=>array('style'=>'	width: 70px; '),
        ),
        'surname',
        'name',
		'midname',
		'phone',
		array(
			'class'=>'CButtonColumn',
            'header'=>'Amallar',
            'htmlOptions' => array('style' => 'white-space: nowrap'),
            'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
            // 'template' => '{plus} {view} {update} {delete}',
            'buttons' => array(
                'view' => array(
                    'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Ko\'rish')),
                    'label' => '<i class="glyphicon glyphicon-eye-open"></i>',
                    'imageUrl' => '/images/view.png',
                ),
                'update' => array(
                    'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Tahrirlash')),
                    'label' => '<i class="glyphicon glyphicon-pencil"></i>',
                    'imageUrl' => '/images/update.png',
                ),
                'delete' => array(
                    'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'O\'chirish')),
                    'label' => '<i class="glyphicon glyphicon-remove"></i>',
                    'imageUrl' => '/images/delete.png',
                )
            )
        ),
	),
)); ?>
