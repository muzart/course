<div class="course">
    <h3 class="text-center"><?php echo $model->name;?></h3>
<!--    <img src="/images/--><?php //echo $model->image?><!--">-->
    <br>
    <h4>
        O'qituvchi: <?php echo $model->teacher->getFullName();?>
    </h4>
    <p class="text-justify text-success">
        <?php echo $model->description;?>
    </p>
    <p>
        Kurs boshlanish sanasi: <?php echo $model->begin_date;?>
    </p>
    <p>
       Kurs tugallanish sanasi: <?php echo $model->end_date;?>
    </p>
    <?php if(!empty($model->students)):?>
        <h4>Tinglovchilar ro'yhati</h4>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Familiya</th>
                <th>Ism</th>
                <th>Sharif</th>
                <th>INN</th>
                <th>Viloyat</th>
                <th>Tashkilot</th>
                <th>Reyting ballari</th>
            </tr>
        <?php foreach($model->students as $user):?>
        <tr>
            <td><?php echo $user->surname;?></td>
            <td><?php echo $user->name;?></td>
            <td><?php echo $user->midname;?></td>
            <td><?php echo $user->inn;?></td>
            <td><?php echo $user->region->name;?></td>
            <td><?php echo $user->org->name;?></td>
            <td><?php echo isset($marks[$user->id])?$marks[$user->id]:"baholanmagan";?></td>
        </tr>
        <?php endforeach;?>
        </table>
        <a href="<?php echo Yii::app()->createUrl('courses/setmarks',array('course'=>$model->id))?>" class="btn btn-success">Kurs qatnashchilarini baholash</a>
        <a href="<?php echo Yii::app()->createUrl('courses/sertificate',array('course'=>$model->id))?>" class="btn btn-info">Sertifikat berish</a>
    <?php endif;?>
</div>
