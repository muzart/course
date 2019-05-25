<?php
/* @var $this UserController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Tinglovchilar'=>array('index'),
	'Boshqaruv',
);

$this->menu=array(
	array('label'=>'Tinglovchilar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi tinglovchi', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>

<h1>Tinglovchilar ma'lumotlarini boshqarish</h1>


<?php echo CHtml::link('Kengaytirilgan qidiruv','#',array('class'=>'search-button btn btn-warning btn-sm')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('EExcelView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'title'=>'Tinglovchilar',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
	'columns'=>array(
//        array(
//            'name' => 'id',
//            'header' => 'No.',
//            'htmlOptions' => array('style' => 'width:20px'),
//        ),
        array(
            'name'=>'image',
            'class'=>'EImageColumn',
            'value'=>'substr($data->image,1,strlen($data->image)-1)',
            'htmlOptions'=>array('style'=>'	width: 70px; '),
        ),
		'surname',
		'name',
//		'midname',
//		'inn',
        array(
            'name'=>'region_id',
            'value'=>'$data->region->name',
            'filter'=>CHtml::dropDownList(
                    'Users[region_id]',
                    $model->search()->model->attributes['region_id'],
                    array(''=>'')+Regions::getAll())
        ),

//		'address',
//		'phone',
//		'image',
        array(
            'name'=>'org_id',
            'value'=>'$data->org->name',
            'filter'=>CHtml::dropDownList(
                    'Users[org_id]',
                    $model->search()->model->attributes['org_id'],
                    array(''=>'')+Organisations::getAll())
        ),
		'post',
//		'created',
//		'login',
//		'password',
//		'activ_hash',
//		'is_active',
//		'role',

        array(
            'class' => 'zii.widgets.grid.CButtonColumn',
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
