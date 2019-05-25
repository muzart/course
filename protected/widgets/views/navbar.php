<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/index.php"><?php echo Yii::app()->name;?></a>
    </div>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class=""><a href="<?php echo Yii::app()->createUrl('teachers/admin');?>">O'qituvchilar</a></li>
            <li class=""><a href="<?php echo Yii::app()->createUrl('courses/admin');?>">Kurslar</a></li>
            <li class=""><a href="<?php echo Yii::app()->createUrl('organisations/admin');?>">Tashkilotlar</a></li>
            <li class=""><a href="<?php echo Yii::app()->createUrl('user/admin');?>">Tinglovchilar</a></li>
            <li class=""><a href="<?php echo Yii::app()->createUrl('report/index');?>">Hisobot</a></li>
            <?php if(!Yii::app()->user->isGuest):?>
            <li class=""><a href="<?php echo Yii::app()->createUrl('site/logout');?>">Chiqish</a></li>
            <?php endif;?>
        </ul>
    </div>
</div>