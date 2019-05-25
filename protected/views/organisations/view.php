<?php
/* @var $this OrganisationsController */
/* @var $model Organisations */

$this->breadcrumbs=array(
	'Tashkilotlar'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Tashkilotlar ro\'yhati', 'url'=>array('index')),
	array('label'=>'Yangi tashkilot', 'url'=>array('create')),
	array('label'=>'Tahrirlash', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'O\'chirish', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Boshqaruv', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        array(
            'name'=>'region_id',
            'value'=>$model->region->name
        ),
//        'workers_count',
	),
)); ?>
<br>
<?php if(Yii::app()->user->hasFlash('message')):?>
    <div class="well well-sm text-success">
        <?php echo Yii::app()->user->getFlash('message');?>
    </div>
<?php endif;?>
<a href="<?php echo Yii::app()->createUrl("organisations/newuser",array('org_id'=>$model->id));?>" class="btn btn-info pull-right">
    <i class="glyphicon glyphicon-plus-sign"></i> Yangi ishchi qo'shish
</a>
<div class="clearfix"></div>
<br>

<?php if(isset($model->workers)):?>

<?php
//      var_dump($dataProvider->getData());exit;
    $this->widget('EExcelView', array(
    'id'=>'users-grid',
    'dataProvider'=>$dataProvider,
//    'filter'=>$dataProvider->model,
    'title'=>'Tinglovchilar',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
    'columns'=>array(
        //		'image',
        array(
            'class'=>'EimageColumn',
            'name'=>'image',
            'value'=>'substr($data->image,1,strlen($data->image)-1)',
            'htmlOptions'=>array(
                'style'=>'height:100px;'
            )
        ),
//        array(
//            'name' => 'id',
//            'header' => 'No.',
//            'htmlOptions' => array('style' => 'width:20px'),
//        ),
        'surname',
        'name',
        'midname',
        'inn',
        array(
            'name'=>'region_id',
            'value'=>'$data->region->name',
            'filter'=>CHtml::dropDownList(
                    'Users[region_id]',
                    $model->search()->model->attributes['region_id'],
                    array(''=>'')+Regions::getAll())
        ),

//        'address',
//        'phone',
        'post',
        //		'created',
        //		'login',
        //		'password',
        //		'activ_hash',
        //		'is_active',
        //		'role',

        array(
            'class' => 'CButtonColumn',
            'header'=>'Amallar',
            'htmlOptions' => array('style' => 'white-space: nowrap'),
            'afterDelete' => 'function(link,success,data) { if (success && data) alert(data); }',
             'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'options' => array('rel' => 'tooltip', 'data-toggle' => 'tooltip', 'title' => Yii::t('app', 'Ko\'rish')),
                    'label' => '<i class="glyphicon glyphicon-eye-open"></i>',
                    'imageUrl' => '/images/view.png',
                ),
            )
        ),
    ),
    ));


?>
    <form action="<?php echo Yii::app()->createUrl('courses/attend')?>" method="post" class="form-inline">
        <div class="course-write">
            <div class="input-group">
                <div class="input-group-addon"><strong>Hamma xodimlarni</strong></div>
                <select name="course" class="form-control">
                    <?php foreach($courses as $course):?>
                        <option value="<?php echo $course->id;?>"><?php echo $course->name;?></option>
                    <?php endforeach;?>
                </select>
            </div>
            <input type="hidden" name="org" value="<?php echo $model->id;?>">
            <input type="submit" class="btn btn-success" value="kursiga yozish"/>
        </div>
    </form>
<?php endif;?>
