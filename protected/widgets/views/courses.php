<div class="courses">
    <?php foreach($courses as $course):?>
        <div class="col-lg-4 col-md-4 col-sm-4 kurs">
            <a href="<?php echo Yii::app()->createUrl('courses/view',array('id'=>$course->id))?>">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h5 class="text-center"><?php echo $course->name;?></h5>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $course->description;?></p>
                        <br>
                        <img src="<?php echo ($course->image!="")?$course->image:"nophoto.jpg";?>" width="100%">
                    </div>
                    <div class="panel-footer">
                        <p>Davomiyligi: <?php echo $course->begin_date." - ".$course->end_date;?></p>
                    </div>
                </div>
            </a>
        </div>
    <?php endforeach;?>
</div>
<script>
    var msnry = new Masonry(".courses",{
        // options
        itemSelector: '.kurs'
    });
</script>
