<?php
/* @var $this OrganisationsController */
/* @var $model Organisations */

$this->breadcrumbs=array(
	'Tashkilotlar'=>array('index'),
	'Boshqaruv',
);

$this->menu=array(
	array('label'=>'Tashkilotlar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi tashkilot', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#organisations-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Tashkilotlarni boshqarish</h1>

<?php echo CHtml::link('Kengaytirilgan qidiruv','#',array('class'=>'search-button btn btn-warning btn-sm')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('EExcelView', array(
	'id'=>'organisations-grid',
	'dataProvider'=>$model->search(),
    'title'=>'Tashkilotlar',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'name',
		array(
            'name' => 'region_id',
            'value' => '$data->region->name',
            'filter' => CHtml::dropDownList(
                    'Organisations[region_id]',
                    $model->search()->model->attributes['region_id'],
                    array(''=>'')+Regions::getAll()
                )
        ),
//        'workers_count',
        array(
            'class' => 'zii.widgets.grid.CButtonColumn',
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
