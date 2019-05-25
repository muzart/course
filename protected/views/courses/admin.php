<?php
/* @var $this CoursesController */
/* @var $model Courses */

$this->breadcrumbs=array(
	'Kurslar'=>array('index'),
	'Boshqaruv',
);

$this->menu=array(
	array('label'=>'Kurslar', 'url'=>array('index')),
	array('label'=>'Yangi kurs', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#courses-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Kurslarni boshqarish</h1>

<?php echo CHtml::link('Kengaytirilgan qidiruv','#',array('class'=>'search-button btn btn-warning btn-sm')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('EExcelView', array(
	'id'=>'courses-grid',
	'dataProvider'=>$model->search(),
    'title'=>'Kurslar',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
    'filter'=>$model,
    'afterAjaxUpdate' => 'function(){
    	    jQuery("#begin_date").datepicker({
        	 dateFormat: "dd/mm/yy",
                 changeYear:true
    	    });
    	    jQuery("#end_date").datepicker({
        	 dateFormat: "dd/mm/yy",
                 changeYear:true
    	    });
        }',
	'columns'=>array(
//		'id',
        array(
            'name'=>'name',
            'value'=>'$data->name',
            'htmlOptions'=>array('style'=>'	width: 180px; '),
        ),
		array(
            'name'=>'image',
            'class'=>'EImageColumn',
            'value'=>'substr($data->image,1,strlen($data->image)-1)',
            'htmlOptions'=>array('style'=>'	width: 50px; '),

        ),
        array(
            'name'=>'description',
            'value'=>'$data->description',
            'htmlOptions'=>array('style'=>'	width: 180px; '),
        ),
        array(
            'name' => 'begin_date',
            'type' => 'raw',
            'htmlOptions' => array('align' => 'center', 'style' => 'width: 100px;'),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'id' => 'begin_date',
                    'attribute' => 'begin_date',
                    'htmlOptions' => array('style' => 'width: 100px;'),
                    'options' => array(
                        'dateFormat' => 'dd/mm/yy',
                        'changeYear' => true
                    ),
                ), true)
        ),
        array(
            'name' => 'end_date',
            'type' => 'raw',
            'htmlOptions' => array('align' => 'center', 'style' => 'width: 100px;'),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model' => $model,
                    'id' => 'end_date',
                    'attribute' => 'end_date',
                    'htmlOptions' => array('style' => 'width: 100px;'),
                    'options' => array(
                        'dateFormat' => 'dd/mm/yy',
                        'changeYear' => true
                    ),
                ), true)
        ),

		/*
		'max_students',
		'teacher_id',
		'is_active',
		*/
        array(
            'name' => 'teacher_id',
            'value'=>'$data->teacher->getFullName()',
            'htmlOptions' => array('align' => 'center', 'style' => 'width: 100px;'),
            'filter' => CHtml::dropDownList(
                    'Courses[teacher_id]',
                    $model->search()->model->attributes['teacher_id'],
                    array(''=>'')+Teachers::getAll()
                )

        ),
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
