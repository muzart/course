<h2 class="text-center"><?php echo $course->name; ?> o'quv kursi qatnashchilariga sertifikat berish</h2>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Familiya</th>
            <th>Ism</th>
            <th>Sharif</th>
            <th>Viloyat</th>
            <th>Tashkilot</th>
            <th>Reyting</th>
            <th>Sertifikat №</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($students as $student):?>
            <tr>
                <td>
                    <?php echo $student->id;?>
                </td>
                <td>
                    <?php echo $student->surname;?>
                </td>
                <td>
                    <?php echo $student->name;?>
                </td>
                <td>
                    <?php echo $student->midname;?>
                </td>
                <td>
                    <?php echo $student->org->region->name;?>
                </td>
                <td>
                    <?php echo $student->org->name;?>
                </td>
                <td>
                    <?php if(!in_array($student->id,$keys)):?>
                        <?php $marked2[$student->id] = 0;?>
                        <a href="<?php echo Yii::app()->createUrl('courses/setmarks',array('course'=>$course->id));?>">Baholash</a>
                    <?php else:?>
                        <?php $marked2[$student->id] = $marked[$student->id];?>
                        <?php echo $marked[$student->id];?>
                    <?php endif;?>
                </td>
                <td>
                    <?php if(!in_array($student->id,$keys)):?>
                        <p class="text-warning">Reyting balli mavjud emas</p>
                    <?php else: ?>
                        <?php if($marked[$student->id]>=70):?>
                            <?php echo isset($sertificates[$student->id])?$sertificates[$student->id]:'Berilmagan';?>
                        <?php else:?>
                            <p class="text-danger">Sertifikat berilmaydi!</p>
                        <?php endif;?>
                    <?php endif;?>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
<p class="text-info">
<a href="<?php echo Yii::app()->request->urlReferrer;?>" class="btn btn-warning">Oldingi sahifaga</a></p>
