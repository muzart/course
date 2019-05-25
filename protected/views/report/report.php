<?php
$this->widget('EExcelView', array(
    'id'=>'report-grid',
    'dataProvider'=>$model->bigCriteria(),
    'filter'=>$model,
    'title'=>'Hisobot',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
    'columns'=>array(
        array(
            'name' => 'id',
            'header' => 'No.',
            'htmlOptions' => array('style' => 'width:20px'),
        ),
        array(
            'name'=>'image',
            'class'=>'EImageColumn',
            'value'=>'substr($data->image,1,strlen($data->image)-1)',
            'htmlOptions'=>array('style'=>'	width: 70px; '),
        ),
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

        array(
            'name'=>'org_id',
            'value'=>'$data->org->name',
            'filter'=>CHtml::dropDownList(
                    'Users[org_id]',
                    $model->search()->model->attributes['org_id'],
                    array(''=>'')+Organisations::getAll())
        ),
        'post',
    ),
));
?>