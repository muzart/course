<h2 class="text-center"><?php echo $course->name; ?> o'quv kursi qatnashchilarini baholash</h2>
<form method="post">
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
                        <input type="text" name="marks[<?php echo $student->id;?>]">
                    <?php else:?>
                        <?php $marked2[$student->id] = $marked[$student->id];?>
                        <?php echo $marked[$student->id];?>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <?php if($marked2 != $marked or empty($marked)):?>
        <input type="submit" name="sbmt" value="Tasdiqlash" class="btn btn-danger">
    <?php else:?>
        <p class="text-info">Hamma baholar qo'yilgan!
        <a href="<?php echo Yii::app()->request->urlReferrer;?>" class="btn btn-warning">Oldingi sahifaga</a></p>
    <?php endif;?>
</form>