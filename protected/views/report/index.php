<form method="get" class="form" id="report-form">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="region">Familiya</label>
                <?php echo CHtml::textField("filter[surname]",
                    (isset($_GET["filter"]["surname"]))?$_GET["filter"]["surname"]:'',
                     array('class'=>'form-control','id'=>'surname'));
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="region">Ism</label>
                <?php echo CHtml::textField("filter[name]",
                    (isset($_GET["filter"]["name"]))?$_GET["filter"]["name"]:'',
                     array('class'=>'form-control','id'=>'name'));
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="region">Viloyat</label>
                <?php echo CHtml::dropDownList("filter[region]",
                    (isset($_GET["filter"]["region"]))?$_GET["filter"]["region"]:'',
                     $regions,
                     array('class'=>'form-control','id'=>'region'));
                ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="org">Tashkilot</label><br>
                <?php echo CHtml::dropDownList("filter[org]",
                    (isset($_GET["filter"]["org"]))?$_GET["filter"]["org"]:'',
                    $organisations,
                    array('class'=>'form-control','id'=>'org'));
                ?>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="course">O'quv kursi</label><br>
                <?php echo CHtml::dropDownList("filter[course]",
                    (isset($_GET["filter"]["course"]))?$_GET["filter"]["course"]:'',
                    $courses,
                    array('class'=>'form-control','id'=>'course'));
                ?>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="teacher">O'qituvchi</label><br>
                <?php echo CHtml::dropDownList("filter[teacher]",
                    (isset($_GET["filter"]["teacher"]))?$_GET["filter"]["teacher"]:'',
                    $teachers,
                    array('class'=>'form-control','id'=>'teacher'));
                ?>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="begin_date">Boshl. sana</label><br>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'value'=>(isset($_GET["filter"]["begin_date"]))?$_GET["filter"]["begin_date"]:'',
                    'name'=>'filter[begin_date]',
                    'options'=>array(
                        'showAnim'=>'fold',
                        'dateFormat'=>'dd/mm/yy',
                    ),
                    'htmlOptions'=>array(
                        'id'=>'begin_date',
                        'class'=>'form-control',
                    ),
                ));?>
            </div>
         </div>
        <div class="col-lg-3 col-md-3 col-sm-12">
            <div class="form-group">
                <label for="end_date">Tugal. sana</label><br>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                    'value'=>(isset($_GET["filter"]["end_date"]))?$_GET["filter"]["end_date"]:'',
                    'name'=>'filter[end_date]',
                    'options'=>array(
                        'showAnim'=>'show',
                        'dateFormat'=>'dd/mm/yy',
                    ),
                    'htmlOptions'=>array(
                        'id'=>'end_date',
                        'class'=>'form-control',
                    ),
                ));?>
            </div>
         </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-filter"></i> Filtrlash</button>
<!--            <button type="reset" class="btn btn-info"><i class="glyphicon glyphicon-filter"></i> Tozalash</button>-->
        </div>
    </div>
</form>
<script type="text/javascript">
//    $('select#region').on('change',
//        function(){
//            $('form.form').submit();
//        }
//    );
//    $('select#org').on('change',
//        function(){
//            $('form.form').submit();
//        }
//    );
//    $('select#course').on('change',
//        function(){
//            $('form.form').submit();
//        }
//    );
//    $('select#teacher').on('change',
//        function(){
//            $('form.form').submit();
//        }
//    );
//    $('input#begin_date').on('change',
//        function(){
//            $('form.form').submit();
//        }
//    );
//    $('input#end_date').on('change',
//        function(){
//            $('form.form').submit();
//        }
//    );
</script>
<?php
$this->widget('EExcelView', array(
    'id' => 'a-grid-id',
    'dataProvider' => $model,
    'title'=>'Tashkilotlar',
    'autoWidth'=>false,
    'template'=>"{summary}\n{items}\n{exportbuttons}\n{pager}",
    'ajaxUpdate' => true, //false if you want to reload aentire page (useful if sorting has an effect to other widgets)
    'filter' => null, //if not exist search filters
    'columns' => array(
        array(
            'header'=>'Rasm',
            'name'=>'Image',
            'type'=>'html',
            'value'=>'CHtml::image($data["Image"],"",array("width"=>"50px"))'
        ),
        array(
            'header' => 'ID',
            'name' => 'MAIN_ID',
            //'value'=>'$data["MAIN_ID"]', //in the case we want something custom
        ),
        array(
            'header' => 'Familiya',
            'name' => 'Familiya',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Ism',
            'name' => 'Ism',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Sharifi',
            'name' => 'Sharif',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Viloyat',
            'name' => 'Region',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Tashkilot',
            'name' => 'Tashkilot',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'INN',
            'name' => 'INN',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Kurs nomi',
            'name' => 'title',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Kurs boshl. sana',
            'name' => 'begin_date',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Kurs tugal. sana',
            'name' => 'end_date',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Reyting %',
            'name' => 'mark',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Sertifikat',
            'name' => 'Sertifikat',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),
        array(
            'header' => 'Trener o\'qituvchi',
            'name' => 'Teacher',
            //'value'=>'$data["title"]', //in the case we want something custom
        ),


//        array( //we have to change the default url of the button(s)(Yii by default use $data->id.. but $data in our case is an array...)
//            'class' => 'CButtonColumn',
//            'template' => '{delete}',
//            'buttons' => array(
//                'delete' => array('url' => '$this->grid->controller->createUrl("delete",array("id"=>$data["MAIN_ID"]))'),
//            ),
//        ),
    ),
));
?>