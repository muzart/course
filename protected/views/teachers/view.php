<?php
/* @var $this TeachersController */
/* @var $model Teachers */

$this->breadcrumbs=array(
	'O\'qituvchilar'=>array('index'),
	$model->getFullName(),
);

$this->menu=array(
    array('label'=>'O\'qituvchilar ro\'yhati', 'url'=>array('index')),
    array('label'=>'Yangi o\'qituvchi', 'url'=>array('create')),
	array('label'=>'Yangilash', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'O\'chirish', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->getFullName(); ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
        array(
            'name'=>'image',
            'value'=>CHtml::image($model->image,$model->getFullName(),array('style'=>'width: 150px')),
            'type'=>'html',
        ),
        'id',
        'name',
        'surname',
        'midname',
		'phone',
	),
)); ?>


<?php if(isset($model->courses)):?>
<h3 class="text-info text-center">Kurslar</h3>
    <?php $this->widget('EExcelView', array(
        'id'=>'courses-grid',
        'dataProvider'=>$dataProvider,
        'title'=>'Kurslar',
        'autoWidth'=>false,
        'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
//        'filter'=>$dataProvider->model,
//        'afterAjaxUpdate' => 'function(){
//    	    jQuery("#begin_date").datepicker({
//        	 dateFormat: "dd/mm/yy",
//                 changeYear:true
//    	    });
//    	    jQuery("#end_date").datepicker({
//        	 dateFormat: "dd/mm/yy",
//                 changeYear:true
//    	    });
//        }',
        'columns'=>array(
//		'id',

            array(
                'name'=>'image',
                'class'=>'EImageColumn',
                'value'=>'"images/".$data->image',
                'htmlOptions'=>array('style'=>'	width: 50px; '),
            ),
            array(
                'name'=>'name',
                'value'=>'$data->name',
                'htmlOptions'=>array('style'=>'	width: 180px; '),
            ),
            array(
                'name'=>'description',
                'value'=>'$data->description',
                'htmlOptions'=>array('style'=>'	width: 180px; '),
            ),
//            array(
//                'name' => 'begin_date',
//                'type' => 'raw',
//                'htmlOptions' => array('align' => 'center', 'style' => 'width: 100px;'),
//                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                        'model' => $dataProvider->model,
//                        'id' => 'begin_date',
//                        'attribute' => 'begin_date',
//                        'htmlOptions' => array('style' => 'width: 100px;'),
//                        'options' => array(
//                            'dateFormat' => 'dd/mm/yy',
//                            'changeYear' => true
//                        ),
//                    ), true)
//            ),
//            array(
//                'name' => 'end_date',
//                'type' => 'raw',
//                'htmlOptions' => array('align' => 'center', 'style' => 'width: 100px;'),
//                'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
//                        'model' => $dataProvider->model,
//                        'id' => 'end_date',
//                        'attribute' => 'end_date',
//                        'htmlOptions' => array('style' => 'width: 100px;'),
//                        'options' => array(
//                            'dateFormat' => 'dd/mm/yy',
//                            'changeYear' => true
//                        ),
//                    ), true)
//            ),

            /*
            'max_students',
            'teacher_id',
            'is_active',
            */
            array(
                'class' => 'zii.widgets.grid.CButtonColumn',
                'header'=>'Amallar',
                'htmlOptions' => array('style' => 'white-space: nowrap'),
                'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
                'template' => ' {view} ',
                'buttons' => array(
                    'view' => array(
                        'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Ko\'rish')),
                        'label' => '<i class="glyphicon glyphicon-eye-open"></i>',
                        'imageUrl' => '/images/view.png',
                    )
                )
            ),
        ),
    )); ?>
<?php endif;?>
