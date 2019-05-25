<?php

$this->breadcrumbs=array(
    'Kurslar',
);

$this->menu=array(
    array('label'=>'Yangi kurs', 'url'=>array('create')),
    array('label'=>'Boshqaruv', 'url'=>array('admin')),
);

?>
<?php $this->widget("application.widgets.CoursesWidget",array('limit'=>9));?>